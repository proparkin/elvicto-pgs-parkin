<?php
namespace App\Jobs\ProcessCameraImageJoblist;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\Camera;
use Illuminate\Support\Facades\Bus;
use Symfony\Component\Process\Process;
use Illuminate\Bus\Batchable;

class MainProcessCameraImage implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels, Batchable;

    protected int $startId;
    protected int $endId;

    public function __construct(int $startId, int $endId)
    {
        $this->startId = $startId;
        $this->endId = $endId;
    }

    public function handle()
    {
        // Get only a subset of cameras
        $camera_data = Camera::select('id', 'ip_address')
            ->whereBetween('id', [$this->startId, $this->endId])
            // ->where('status', 1)
            ->orderBy('id', 'asc')
            ->get();

        if ($camera_data->isEmpty()) 
        {
            logger("No cameras found between ID {$this->startId} and {$this->endId}");
            return;
        }

        $camera_list = $camera_data->map(fn($cam) => ['id' => $cam->id, 'ip' => $cam->ip_address]);

        $jsonFileName = "camera_list_{$this->startId}_{$this->endId}.json";
        $jsonPath = storage_path("app/public/{$jsonFileName}");
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
        } 
        catch (ProcessFailedException $exception) 
        {
            logger('Python script failed: ' . $exception->getMessage());
        }
    }
} 
