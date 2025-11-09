<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Jobs\{ProcessCameraImage};
use App\Jobs\NewElvictoJobsOne\NewElvictoProcesssCameraImageOne;
use App\Jobs\NewElvictoJobsTwo\NewElvictoProcesssCameraImageTwo;
use App\Jobs\NewElvictoJobsThree\NewElvictoProcesssCameraImageThree;
use App\Jobs\NewElvictoJobsFour\NewElvictoProcesssCameraImageFour;
use App\Jobs\{WifiLampJob,WifiLampJobTwo,DetectNumberPlateSlotsCoordinate,NewDetectNumberPlateSlotsCoordinateFour};
use Illuminate\Support\Facades\Log;


class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        $schedule->call(function () 
        {
            try 
            {
                app()->call('App\Http\Controllers\API\ProcessCameraImageQueueController@getLiveStream');
            } 
            catch (\Throwable $e) 
            {
                Log::error('process_camera_live_stream_job error: '.$e->getMessage());
            } 
            finally 
            {
                static::releaseMemory('process_camera_live_stream_job');
            }
        })
        ->name('process_camera_live_stream_job')
        ->everyMinute()
        ->withoutOverlapping()
        ->onOneServer();

        $schedule->call(function () 
        {
            try 
            {
                app()->call('App\Http\Controllers\API\VehicleNumberDetectController@getLiveStream');
            } 
            catch (\Throwable $e) 
            {
                Log::error('python_detect_object_number_job error: '.$e->getMessage());
            } 
            finally 
            {
                static::releaseMemory('python_detect_object_number_job');
            }
        })
        ->name('python_detect_object_number_job')
        ->everyMinute()
        ->withoutOverlapping()
        ->onOneServer();

        $schedule->call(function () 
        {
            try 
            {
                // \App\Jobs\WifiLampJob::dispatch()->onQueue('lamp');
                \App\Jobs\WifiLampJob::dispatch();
            } 
            catch (\Throwable $e) 
            {
                Log::error('wifi_lamp_job dispatch error: '.$e->getMessage());
            } 
            finally 
            {
                static::releaseMemory('wifi_lamp_job');
            }
        })
        ->name('wifi_lamp_job')
        // ->everyFiveMinutes()
        ->everyThreeMinutes()
        ->withoutOverlapping()
        ->onOneServer();

        // $schedule->call(function () 
        // {
        //     try 
        //     {
        //         app()->call('App\Http\Controllers\API\CameraQueueController200@getLiveStream');
        //     } 
        //     catch (\Throwable $e) 
        //     {
        //         Log::error('process_camera_live_stream_job error: '.$e->getMessage());
        //     } 
        //     finally 
        //     {
        //         static::releaseMemory('process_camera_live_stream_job');
        //     }
        // })
        // ->name('process_camera_live_stream_job_200')
        // ->everyMinute()
        // ->withoutOverlapping()
        // ->onOneServer();

        // $schedule->exec('/usr/local/bin/cleanup_camera_uploads.sh')
        // ->everyTenMinutes()
        // ->appendOutputTo(storage_path('logs/camera_cleanup.log'));

 
        //  $schedule->call(function () 
        //  {
        //      WifiLampJobTwo::dispatch();
        //  })->everyTwoMinutes();
       
        $schedule->call(function () 
        {
            try 
            {
                Artisan::call('queue:restart');
                Artisan::call('cache:clear');

                $workerLog = storage_path('logs/worker.log');
                if (file_exists($workerLog) && filesize($workerLog) > 50 * 1024 * 1024) 
                {
                    @copy($workerLog, $workerLog.'.'.date('YmdHis').'.bak');
                    @file_put_contents($workerLog, '');
                }
            } 
            catch (\Throwable $e) 
            {
                Log::error('auto_refresh_system failed: '.$e->getMessage());
            } 
            finally 
            {
                static::releaseMemory('auto_refresh_system');
            }
        })
        ->hourly()
        ->name('auto_refresh_system')
        ->onOneServer();

        $schedule->exec('sudo supervisorctl restart laravel-worker:*')
        ->everyThreeHours()
        ->appendOutputTo(storage_path('logs/supervisor_restart.log'))
        ->when(function () {
            return true;
        });

        // Remove all old logs, keep only last 3 hours
        $schedule->call(function () 
        {
            try 
            {
                $logPath = storage_path('logs');
                $now = time();
                $keepHours = 2;

                foreach (glob($logPath . '/*') as $file) 
                {
                    if (!is_file($file)) continue;

                    if ($now - filemtime($file) > ($keepHours * 3600)) 
                    {
                        @unlink($file);
                    }
                }
            } 
            catch (\Throwable $e) 
            {
                Log::error('log_cleanup_job error: ' . $e->getMessage());
            } 
            finally 
            {
                static::releaseMemory('log_cleanup_job');
            }
        })
        ->everyThirtyMinutes() 
        ->name('log_cleanup_job')
        ->withoutOverlapping()
        ->appendOutputTo(storage_path('logs/log_cleanup.log'))
        ->onOneServer();
        
        $schedule->call(function () 
        {
            try 
            {
                Redis::command('FLUSHALL');
            } 
            catch (\Throwable $e) 
            {
                Log::error('redis_flush error: '.$e->getMessage());
            } 
            finally 
            {
                static::releaseMemory('redis_flush');
            }
        })
        ->dailyAt('03:00')
        ->appendOutputTo(storage_path('logs/redis_flush.log'));
        // ->onOneServer();
        

    }

    protected static function releaseMemory(string $taskName): void
    {
        try 
        {
            gc_collect_cycles();
            @exec('find /tmp -type f -name "*.tmp" -delete');
            if (function_exists('opcache_reset')) 
            {
                @opcache_reset();
            }
            $usage = round(memory_get_usage(true) / 1024 / 1024, 2);
        } 
        catch (\Throwable $e) 
        {
            Log::warning("[{$taskName}] Memory release error: ".$e->getMessage());
        }
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
