<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;
use Carbon\Carbon;

class WifiLampJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $timeout = 120;

    public function handle()
    {
        try 
        {
            $changed_since = Carbon::now()->subMinutes(4);

            // Single query to get all lamps with their status
            $slots_with_lamps = DB::table('parking_slots')
                ->select('wiz_lamps.id', 'wiz_lamps.mac_address', 'wiz_lamps.ip_address')
                ->selectRaw("
                    CASE 
                        WHEN SUM(CASE WHEN parking_slots.status = 2 THEN 1 ELSE 0 END) >= COUNT(*)
                            THEN 2 
                        WHEN SUM(CASE WHEN parking_slots.status = 1 THEN 1 ELSE 0 END) > 0
                            THEN 1 
                        ELSE 1
                    END AS status
                ")
                ->join('wiz_lamps', 'parking_slots.wiz_lamp_id', '=', 'wiz_lamps.id')
                ->where('parking_slots.is_reserved', 0)
                ->whereNotNull('parking_slots.wiz_lamp_id')
                ->where('parking_slots.change_slot', '>=', $changed_since)
                ->groupBy('wiz_lamps.id', 'wiz_lamps.mac_address', 'wiz_lamps.ip_address')
                ->get();

            Log::info("Found {$slots_with_lamps->count()} lamps to check");

            // Filter lamps that need updating based on cache
            $lamps_to_update = [];
            $cache_keys = [];
            
            foreach ($slots_with_lamps as $lamp) 
            {
                $cacheKey = "lamp_status_{$lamp->id}";
                $cache_keys[$lamp->id] = $cacheKey;
            }

            // Batch get cache values (more efficient than individual gets)
            $cached_statuses = Cache::many($cache_keys);

            foreach ($slots_with_lamps as $lamp) 
            {
                $cacheKey = $cache_keys[$lamp->id];
                $previousStatus = $cached_statuses[$cacheKey] ?? null;

                if ($previousStatus !== $lamp->status) 
                {
                    $lamps_to_update[] = [
                        'id' => $lamp->id,
                        'mac_address' => $lamp->mac_address,
                        'ip_address' => $lamp->ip_address,
                        'status' => $lamp->status
                    ];
                }
            }

            if (empty($lamps_to_update)) 
            {
                Log::info("No lamps need updating");
                return;
            }

            Log::info("Updating " . count($lamps_to_update) . " lamps");

            // Update cache in batch
            $cache_updates = [];
            foreach ($lamps_to_update as $lamp) 
            {
                $cache_updates["lamp_status_{$lamp['id']}"] = $lamp['status'];
            }
            Cache::putMany($cache_updates, now()->addMinutes(10));

            // Single Python call with all lamps
            $lamp_json = json_encode($lamps_to_update);
            $pythonFile = '/var/www/html/public/scripts/ANPR_Yolov11/lamp_file.py';
            
            // Use process to avoid shell escaping issues
            $descriptorspec = [
                0 => ["pipe", "r"],  // stdin
                1 => ["pipe", "w"],  // stdout
                2 => ["pipe", "w"]   // stderr
            ];

            $process = proc_open("python3 $pythonFile", $descriptorspec, $pipes);

            if (is_resource($process)) {
                // Write JSON to stdin
                fwrite($pipes[0], $lamp_json);
                fclose($pipes[0]);

                // Read output
                $output = stream_get_contents($pipes[1]);
                $errors = stream_get_contents($pipes[2]);
                
                fclose($pipes[1]);
                fclose($pipes[2]);

                $return_value = proc_close($process);

                if ($return_value !== 0) {
                    Log::error('Python script failed', [
                        'return_code' => $return_value,
                        'errors' => $errors
                    ]);
                } 
                else 
                {
                    Log::info('Lamps updated successfully', ['output' => $output]);
                }
            }

            Log::info("WifiLampJob completed successfully");

        } catch (\Exception $e) {
            Log::error('WifiLampJob failed', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);
        }
    }
}