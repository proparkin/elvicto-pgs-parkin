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

    public function handle()
    {
        try {
            $totalSlots = 2376;
            $batchSize = 50;
            $totalBatches = ceil($totalSlots / $batchSize);

            $changed_since = Carbon::now()->subMinutes(3);

            for ($batch = 0; $batch < $totalBatches; $batch++) 
            {
                $start = ($batch * $batchSize) + 1;
                $end = min($start + $batchSize - 1, $totalSlots);

                Log::info("Processing batch {$batch} → Slots {$start} to {$end}");

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
                    ->whereBetween('parking_slots.id', [$start, $end])
                    ->where('parking_slots.is_reserved', 0)
                    ->whereNotNull('parking_slots.wiz_lamp_id')
                    ->where('parking_slots.change_slot', '>=', $changed_since)
                    ->groupBy('wiz_lamps.id', 'wiz_lamps.mac_address', 'wiz_lamps.ip_address')
                    ->get();

                $lamps_to_update = [];
                foreach ($slots_with_lamps as $lamp) 
                {
                    $cacheKey = "lamp_status_{$lamp->id}";
                    $previousStatus = Cache::get($cacheKey);

                    if ($previousStatus !== $lamp->status) 
                    {
                        $lamps_to_update[] = $lamp;
                        Cache::put($cacheKey, $lamp->status, now()->addMinutes(10));
                    }
                }

                if (!empty($lamps_to_update)) 
                {
                    $lamp_batches = array_chunk($lamps_to_update, 25);

                    foreach ($lamp_batches as $batchIndex => $batchData) 
                    {
                        $lamp_json = escapeshellarg(json_encode($batchData));
                        $pythonFile = '/var/www/html/public/scripts/ANPR_Yolov11/lamp_file.py';
                        $command = "python3 $pythonFile $lamp_json 2>&1";

                        $output = [];
                        $return_var = null;
                        exec($command, $output, $return_var);

                        usleep(200000); // 0.2s delay
                    }
                }

                usleep(200000);
            }

            Log::info("WifiLampJob completed successfully");

        } 
        catch (\Exception $e) 
        {
            Log::error('WifiLampJob failed', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);
        }
    }
}
