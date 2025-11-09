<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\DispatchJobsService;

class DispatchCameraJobs extends Command
{
    protected $signature = 'camera:dispatch-jobs';
    protected $description = 'Dispatch Camera Image Jobs Automatically';

    protected $dispatchJobsService;

    public function __construct(DispatchJobsService $dispatchJobsService)
    {
        parent::__construct();
        $this->dispatchJobsService = $dispatchJobsService;
    }

    public function handle()
    {
        // Dispatch all jobs through the Service
        $this->dispatchJobsService->dispatchJobs();
        $this->info('Camera Jobs dispatched successfully!');
    }
}
