<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Jobs\{
    ProcessCameraImage,
    ProcessParkingSlotsCoordinate200,
    DetectNumberPlateSlotsCoordinate200,
    WifiLampJob200,
    DetectNumberPlateSlotsCoordinate,
    
};
use App\Models\{Vehicle,ParkingSlot,Camera}; 
use App\Jobs\ProcessCameraImageJoblist\{MainProcessCameraImage200,MainProcessCameraImage,MainProcessCameraImageOne};
use Illuminate\Support\Facades\Bus;
use Illuminate\Bus\Batch;
use Throwable;
use Storage;
use Spatie\Async\Pool;
use Imagick;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use DB;
use Carbon\Carbon;

class CameraQueueController200 extends Controller
{
    
    public function getLiveStream()
    {
        $batches = [];
        $batchSize = 200;
        $totalCameras = 1000; // adjust as needed
    
        for ($i = 1; $i <= $totalCameras; $i += $batchSize) 
        {
            $startId = $i;
            $endId = min($i + $batchSize - 1, $totalCameras);
            $batches[] = new MainProcessCameraImageOne($startId, $endId);
        }
    
        Bus::batch($batches)
            ->then(function () 
            {
                Bus::chain([
                    new ProcessParkingSlotsCoordinate200(),
                    new DetectNumberPlateSlotsCoordinate200(),
                   
                  
                ])->dispatch();
                logger('✅ All camera batches completed successfully.');
            })
            ->catch(function ($batch, $e) 
            {
                logger('❌ Some camera batches failed: ' . $e->getMessage());
            })
            ->dispatch();
    
        // $this->info('🚀 Camera capture batch dispatched!');
    }

    public function ProcessParkingSlotsCoordinate()
    {
        ProcessParkingSlotsCoordinate200::dispatch();
        return "Job dispatched successfully";
    }

    public function DetectNumberPlateSJob()
    {
        DetectNumberPlateSlotsCoordinate200::dispatch();
        return "Job dispatched successfully";
    }

}