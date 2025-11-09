<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller as Controller;  
use App\Jobs\{ProcessCameraImage,DetectNumberPlates,ProcessParkingSlots,ProcessParkingSlotsCoordinate,NewProcessParkingSlotsCoordinate,NewProcessParkingSlotsCoordinateThree,NewProcessParkingSlotsCoordinateFour,
    DetectNumberPlateSlotsCoordinate,NewDetectNumberPlateSlotsCoordinate,NewDetectNumberPlateSlotsCoordinateThree,NewDetectNumberPlateSlotsCoordinateFour,DetectVehicleone,DetectVehicletwo,DetectVehiclethree};
use App\Models\{Vehicle,ParkingSlot,Camera}; 
use App\Jobs\ProcessCameraImageJoblist\{MainProcessCameraImage};
use Illuminate\Support\Facades\Bus;
use Illuminate\Bus\Batch;
use Throwable;

class CameraQueueController extends Controller  
{
    public function getLiveStream()
    {
        //    ProcessCameraImage::dispatch();
        $batchSize = 100;
        $total = Camera::count();

        $batchCount = ceil($total / $batchSize); 
        $jobs = [];
   
        for ($i = 0; $i < $batchCount; $i++) 
        {
            $start = $i * $batchSize + 1;
            $end = ($i + 1) * $batchSize;
            // $start = 1;
            // $end = 200;

            //MainProcessCameraImage::dispatch($start, $end);
            $jobs[] = new MainProcessCameraImage($start, $end);
        
        }
        //ProcessParkingSlots::dispatch();

        Bus::batch($jobs)
        ->then(function (Batch $batch) 
        {
           
            // ProcessParkingSlots::dispatch();
            // ProcessParkingSlotsCoordinate::dispatch();
            Bus::chain([
                new ProcessParkingSlotsCoordinate(),
                
                new DetectNumberPlateSlotsCoordinate(),
                 
                new NewDetectNumberPlateSlotsCoordinate(),

                new NewDetectNumberPlateSlotsCoordinateThree(),
                
                new NewDetectNumberPlateSlotsCoordinateFour(),

                // new DetectVehicleone(),
                // new DetectVehicletwo(),
                // new DetectVehiclethree()
              
            ])->dispatch();
        })

      
        ->catch(function (Batch $batch, Throwable $e) 
        {
          
            logger('Batch failed: ' . $e->getMessage());
        })
        ->finally(function (Batch $batch) {
            logger('Batch finished.');
        })
        ->dispatch();

        return response()->json(['message' => 'Processing Parkin System.']);
    }
}
