<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller as Controller;  
use App\Jobs\{ProcessParkingSlotsCoordinate};
use App\Models\{Vehicle,ParkingSlot,Camera}; 
use App\Jobs\ProcessCameraImageJoblist\{MainProcessCameraImage};
use Illuminate\Support\Facades\Bus;
use Illuminate\Bus\Batch;
use Throwable;

class ProcessCameraImageQueueController extends Controller  
{
    public function getLiveStream()
    {
        $batchSize = 100;
        $total = Camera::count();

        $batchCount = ceil($total / $batchSize); 
        $jobs = [];
   
        for ($i = 0; $i < $batchCount; $i++) 
        {
            $start = $i * $batchSize + 1;
            $end = ($i + 1) * $batchSize;
            
            $jobs[] = new MainProcessCameraImage($start, $end);
        
        }
      
        Bus::batch($jobs)
        ->then(function (Batch $batch) 
        {
            Bus::chain([
                new ProcessParkingSlotsCoordinate()
              
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
