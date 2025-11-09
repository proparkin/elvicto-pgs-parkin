<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller as Controller;  
use App\Jobs\{WifiLampJob,WifiLampReserveSlotsJob};
use Illuminate\Support\Facades\Bus;
use Illuminate\Bus\Batch;
use Throwable;

class WizLampJobController extends Controller  
{
    public function getLiveStream()
    {
            Bus::chain([
                new WifiLampReserveSlotsJob(),
                new WifiLampJob()
            ])->dispatch();

        return response()->json(['message' => 'Processing Parkin System.']);
    }
}
