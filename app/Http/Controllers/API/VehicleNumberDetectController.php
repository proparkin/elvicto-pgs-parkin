<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller as Controller;  
use App\Jobs\{DetectNumberPlateSlotsCoordinate,NewDetectNumberPlateSlotsCoordinateFour,WifiLampJob,FlaskDetectNumberPlateSlotsCoordinate,FlaskDetectNumberPlateSlotsCoordinateTwo};
use Illuminate\Support\Facades\Bus;
use Illuminate\Bus\Batch;
use Throwable;

class VehicleNumberDetectController extends Controller  
{
    public function getLiveStream()
    {
            Bus::chain([
                new FlaskDetectNumberPlateSlotsCoordinate(),
                new FlaskDetectNumberPlateSlotsCoordinateTwo(),
                // new DetectNumberPlateSlotsCoordinate(), 
                // new NewDetectNumberPlateSlotsCoordinateFour(),
                // new WifiLampJob(),

            ])->dispatch();

        return response()->json(['message' => 'Processing Parkin System.']);
    }
}
