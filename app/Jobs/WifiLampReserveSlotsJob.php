<?php 

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log; // ✅ Add this
use App\Models\{Camera, ParkingSlot};
use DB;

class WifiLampReserveSlotsJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    
    public $customDelay = 180; // 3 minutes delay (you can handle via ->delay() too)

    public function handle()
    {
        try 
        {
            Log::info('✅ WifiLampJob started...');
    
            $slots_with_lamps = DB::table('parking_slots')
                ->select(
                    'wiz_lamps.id',
                    'wiz_lamps.mac_address',
                    'wiz_lamps.ip_address',
                    'parking_slots.status'
                )
                ->join('wiz_lamps', 'parking_slots.wiz_lamp_id', '=', 'wiz_lamps.id')
                ->whereBetween('parking_slots.id', [1, 20])
                ->whereNotNull('parking_slots.wiz_lamp_id')
                // ->where('parking_slots.id', 9)
                ->where('parking_slots.is_reserved', 1)
                ->get();
    
            $lamp_json = escapeshellarg(json_encode($slots_with_lamps));
            $pythonFile = '/var/www/html/public/scripts/ANPR_Yolov11/lamp_file.py';
            $command = "python3 $pythonFile $lamp_json 2>&1";
    
            $output = [];
            $return_var = null;
            exec($command, $output, $return_var);
    
            $jsonString = implode("\n", $output);
            $data = json_decode($jsonString, true);
    
            return response()->json([
                'status' => $return_var,
                'output' => $data
            ]);
        } 
        catch (\Exception $e) 
        {
            Log::error('❌ WifiLampJob failed: '.$e->getMessage());
    
            return response()->json([
                'status' => false,
                'error' => $e->getMessage()
            ], 500);
        }
    }
    
}