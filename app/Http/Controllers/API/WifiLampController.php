<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\{WizLamp,ParkingSlot};
use DB;

class WifiLampController extends Controller
{
    public function lampControl()
    {
        $slots_with_lamps = DB::table('parking_slots')
            ->select('wiz_lamps.id', 'wiz_lamps.mac_address', 'wiz_lamps.ip_address')
            ->selectRaw("
                CASE 
                    WHEN SUM(CASE WHEN parking_slots.status = 2 THEN 1 ELSE 0 END) >= COUNT(*)
                        THEN 2  -- 🔴 All occupied or single slot occupied
                    WHEN SUM(CASE WHEN parking_slots.status = 1 THEN 1 ELSE 0 END) > 0
                        THEN 1  -- 🟢 At least one empty
                    ELSE 1
                END AS status
            ")
            ->Join('wiz_lamps', 'parking_slots.wiz_lamp_id', '=', 'wiz_lamps.id')
            ->whereBetween('parking_slots.id', [1, 400])
            ->where('parking_slots.is_reserved',0)
            // ->where('parking_slots.id',586)
            ->groupBy('wiz_lamps.id', 'wiz_lamps.mac_address', 'wiz_lamps.ip_address')
            // ->limit(1)
            ->get();

            // return $slots_with_lamps->Count();

          

            
        $updated_lamps = [];
    
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

    public function testLampControl()
    {
        $slots_with_lamps = DB::table('parking_slots')
            ->select(
                'wiz_lamps.id',
                'wiz_lamps.mac_address',
                'wiz_lamps.ip_address',
                'parking_slots.status'
            )
            ->Join('wiz_lamps', 'parking_slots.wiz_lamp_id', '=', 'wiz_lamps.id')
            ->whereBetween('parking_slots.id', [1, 2376])
            ->whereNotNull('parking_slots.wiz_lamp_id')
            // ->where('parking_slots.id',9)
            ->where('parking_slots.is_reserved',1)
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
    
  
    

}
