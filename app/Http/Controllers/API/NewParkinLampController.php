<?php

namespace App\Http\Controllers\API;
 
use Illuminate\Http\Request;
use App\Http\Controllers\Controller as Controller;
use App\Models\{ParkingLamp};
use Illuminate\Support\Facades\Http;
use App\Services\{MultiAccountTuyaApiService};
use Symfony\Component\Process\Exception\ProcessFailedException;

class NewParkinLampController extends Controller 
{
    public function checkMultipleAccountParkingLightStatus()
    {
        $devices = ParkingLamp::with('tuyaAccount')->where('tuya_account_id', 1)->get();

        return $devices;

        if ($devices->isEmpty()) 
        {
            return response()->json(['error' => 'No devices found'], 404);
        }

        $responses = [];

        foreach ($devices as $device) 
        {
                if (!$device->tuyaAccount) 
                {
                    $responses[] = [
                        'device_id' => $device->lamp_device_id,
                        'status' => 'Tuya account not found'
                    ];
                    continue;
                }

            $multiTuya = new MultiAccountTuyaApiService(
                $device->tuyaAccount->client_id,
                $device->tuyaAccount->secret,
                $device->tuyaAccount->api_url
            );

            $code = 'colour_data_v2';
            $value = '{"h": 0, "s": 1000, "v": 1000}'; // Red color

            $response = $multiTuya->setDeviceInteraction($code, $value, $device->lamp_device_id);

            $responses[] = [
                'device_name' => $device->name,
                'device_id' => $device->lamp_device_id,
                'status' => $response['success'] ?? false,
                'message' => $response['msg'] ?? 'No message',
            ];
        }

        return response()->json([
            'message' => 'Color updated for all devices',
            'results' => $responses
        ]);

    }

}