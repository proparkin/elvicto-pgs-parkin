<?php

namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Http\Controllers\Controller as Controller;
use App\Models\{Vehicle,ParkingSlot,Camera,ParkingLamp,WizLamp,ParkingBlock};
use Illuminate\Support\Facades\Http;
use DB;

class SetupIpAddressController extends Controller 
{
    public function setupCameraIp()
    {
        $datas = Camera::Count();
        
        return view('camera_ip',compact('datas'));
    }

    public function cameraIpUpdate(Request $request)
    {
        
        $data = Camera::where('id', $request->camera_id)->first();

        if ($data) 
        {
            $data->ip_address = $request->camera_ip;
            $data->save();
        }

        // ✅ Redirect back with success message
        return redirect()->back()->with('success', 'Camera IP address updated successfully!');
    }

    public function createLampIp()
    {
      return view('lamp_create');
    }

    public function lampIpUpdate(Request $request)
    {
        $data = WizLamp::where('name', $request->lamp_name)->first();

        if ($data) 
        {
            $data->ip_address = $request->lamp_ip;
            $data->save();
        }
        else
        {
            WizLamp::create([
                'name'        => strtoupper($request->lamp_name),
                'ip_address'  => $request->lamp_ip,
                'mac_address' => $request->mac_address,
            ]);
        }

        // ✅ Redirect back with success message
        return redirect()->back()->with('success', 'Lamp IP address updated successfully!');
    }

    public function createSlot()
    {
        $datas = ParkingBlock::orderBy('block_name', 'asc')->get();
        $lamps = WizLamp::orderBy('name', 'asc')->get();
        
        return view('slot_create',compact('datas','lamps'));
    }

    public function getSlots($id)
    {
        $slots = ParkingSlot::where('block_id',$id)->get();
        return response()->json($slots);
    }

    public function slotUpdate(Request $request)
    {
        $slots = ParkingSlot::where('block_id', $request->block_id)  
               ->whereIn('slot_number', $request->slots) 
               ->update([
                   'wiz_lamp_id' => $request->lamp_id
               ]);

        return redirect()->back()->with('success', 'Lamp assigned to selected slots successfully!');
    }

    public function checkLampStatus()
    {
        $datas = WizLamp::select('name','id','ip_address')->get();
        return view('lamp_view',compact('datas'));
    }

    public function getLampSlots($id)
    {
        $slots = ParkingSlot::join('wiz_lamps', 'parking_slots.wiz_lamp_id', '=', 'wiz_lamps.id')
        ->where('wiz_lamps.id', $id)
        ->whereBetween('parking_slots.id', [1, 2376])
        ->select('parking_slots.*', 'wiz_lamps.ip_address', 'wiz_lamps.mac_address') // optional
        ->get();
        return response()->json($slots);
    }

    public function lampControl(Request $request)
    {
        $slots_with_lamps = DB::table('parking_slots')
            ->select('wiz_lamps.id','wiz_lamps.mac_address', 'wiz_lamps.ip_address')
            ->selectRaw("
                CASE
                    WHEN SUM(CASE WHEN parking_slots.status = 1 THEN 1 ELSE 0 END) > 0 THEN 2
                    WHEN SUM(CASE WHEN parking_slots.status = 2 THEN 1 ELSE 0 END) > 0 THEN 1
                    ELSE 1
                END AS status
            ")
            // ->selectRaw("
            //     CASE 
            //         WHEN SUM(CASE WHEN parking_slots.status = 1 THEN 1 ELSE 0 END) > 0 THEN 1
            //         WHEN SUM(CASE WHEN parking_slots.status = 2 THEN 1 ELSE 0 END) = COUNT(*) THEN 2
            //         ELSE 1
            //     END AS status
            // ")
            ->leftJoin('wiz_lamps', 'parking_slots.wiz_lamp_id', '=', 'wiz_lamps.id')
            ->whereBetween('parking_slots.id', [1, 2376])
            ->whereNotNull('parking_slots.wiz_lamp_id')
            ->whereIn('parking_slots.status', [1, 2])
            ->where('parking_slots.id',$request->slot_id)
            ->groupBy('wiz_lamps.mac_address', 'wiz_lamps.ip_address')
            ->get();

        
            
    
        // ✅ Call Python with updated IPs
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