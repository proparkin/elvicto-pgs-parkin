<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller as Controller;  
use App\Jobs\NewParkinJobs\{NewParkinProcesssCameraImage,NewParkinProcessParkingSlots,NewParkinDetectNumberPlates};
use App\Jobs\NewElvictoJobsOne\{NewElvictoProcessParkingSlotsOne,NewElvictoDetectNumberPlatesOne};
use App\Jobs\NewElvictoJobsTwo\NewElvictoProcessParkingSlotsTwo;
use App\Jobs\NewElvictoJobsThree\NewElvictoProcessParkingSlotsThree;
use App\Jobs\NewElvictoJobsFour\NewElvictoProcessParkingSlotsFour;
use App\Jobs\NewElvictoJobsFive\NewElvictoProcessParkingSlotsFive;
use App\Jobs\{ProcessCameraImage};
use App\Jobs\ProcessCameraImageJoblist\{MainProcessCameraImage};
use App\Models\{Vehicle,ParkingSlot,Camera}; 

class NewParkinCameraQueueController extends Controller  
{
    public function getLiveStream()
    {
       
        $batchSize = 100;
        $total = Camera::count();

        $batchCount = ceil($total / $batchSize); 

        for ($i = 0; $i < $batchCount; $i++) 
        {
            $start = $i * $batchSize + 1;
            $end = ($i + 1) * $batchSize;
            // $start = 1;
            // $end = 200;

            MainProcessCameraImage::dispatch($start, $end);
           
        }

        //NewElvictoDetectNumberPlatesOne::dispatch();
        NewElvictoProcessParkingSlotsOne::dispatch();
        // NewElvictoProcessParkingSlotsTwo::dispatch();
        // NewElvictoProcessParkingSlotsThree::dispatch();
        // NewElvictoProcessParkingSlotsFour::dispatch();
        
        // NewElvictoProcesssCameraImageFive::dispatch();
        // NewParkinProcesssCameraImage::dispatch();

        // NewParkinProcessParkingSlots::dispatch();

        // NewParkinDetectNumberPlates::dispatch();

        return response()->json(['message' => 'Processing New Parkin System.']);
    }
}
