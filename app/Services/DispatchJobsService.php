<?php

namespace App\Services;

use App\Jobs\ProcessCameraImageJoblist\MainProcessCameraImage;
use App\Jobs\{ProcessCameraImage,DetectNumberPlates,ProcessParkingSlots};
use Illuminate\Support\Facades\Bus;

class DispatchJobsService
{
    public function dispatchJobs()
    {
        $jobs = [];

        // Dispatch Jobs
        $jobs[] = new MainProcessCameraImage(1, 100);
        $jobs[] = new MainProcessCameraImage(101, 200);
        $jobs[] = new MainProcessCameraImage(201, 300);
        $jobs[] = new MainProcessCameraImage(301, 400);
        $jobs[] = new MainProcessCameraImage(401, 500);
        $jobs[] = new MainProcessCameraImage(501, 600);
        $jobs[] = new MainProcessCameraImage(601, 700);
        $jobs[] = new MainProcessCameraImage(701, 803);

        // Batch dispatch
        Bus::batch($jobs)
            ->then(function () {
                // Call next job (ProcessParkingSlots) once all camera jobs finish
                ProcessParkingSlots::dispatch();
            })
            ->catch(function ($batch, Throwable $e) {
                logger('Batch failed: ' . $e->getMessage());
            })
            ->finally(function ($batch) {
                logger('Batch finished.');
            })
            ->dispatch();
    }
}
