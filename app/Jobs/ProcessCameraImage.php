<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\{Camera};
use FFMpeg;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use App\Jobs\{CaptureCameraImage,ProcessParkingSlots,DetectNumberPlates};
use Illuminate\Bus\Batch;
use Illuminate\Support\Facades\Artisan;
use Symfony\Component\Process\Process;
use Illuminate\Support\Facades\Bus;
use Throwable;
    
class ProcessCameraImage implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels; 
    
    public function handle()
    {
        // $camera_data = Camera::select('id', 'ip_address')->orderBy('id', 'asc')->get();
        $camera_data = Camera::select('id', 'ip_address')->whereBetween('id', [1, 803])->orderBy('id', 'asc')->get();
        $camera_list = $camera_data->map(fn($cam) => ['id' => $cam->id, 'ip' => $cam->ip_address]);
    
        $jsonPath = storage_path('app/public/camera_list.json');
        file_put_contents($jsonPath, json_encode($camera_list));
    
        $pythonExecutable = '/var/www/html/venv/bin/python3';
        $pythonScriptPath = public_path('scripts/ANPR_Yolov11/capture_images.py');
        $command = [
            $pythonExecutable,
            $pythonScriptPath,
            $jsonPath
        ];
    
        $env = [
                'YOLO_CONFIG_DIR' => '/tmp/yoloconfig',
                'PADDLEOCR_HOME' => '/tmp/paddleocr',
                'MPLCONFIGDIR' => '/tmp/matplotlib',
            ];
    
        $process = new Process($command, null, $env);
        $process->setTimeout(600); 
    
        try 
        {
            $process->mustRun();
    
            Bus::chain([
                new ProcessParkingSlots(),
                new DetectNumberPlates(),
            ])->dispatch();
    
            // Laravel Cache Clear
            Artisan::call('cache:clear');
            Artisan::call('config:clear');
            Artisan::call('route:clear');
            Artisan::call('view:clear');
    
            // Run kill commands
            // $killArtisan = new Process(['sudo', 'pkill', '-f', 'artisan']);
            // $killArtisan->run();
    
            // $killPython = new Process(['sudo', 'pkill', '-f', 'python']);
            // $killPython->run();
        
            \Log::info('✅ Artisan and Python processes killed after job.');
        } 
        catch (ProcessFailedException $exception) 
        {
            logger('Python script failed: ' . $exception->getMessage());
        }
    }
}
    

