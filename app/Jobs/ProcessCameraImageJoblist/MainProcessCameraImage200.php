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
use Illuminate\Support\Facades\Log;
use Storage;

class MainProcessCameraImage200 implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels, Batchable;

    protected $folders;
    protected $batchIndex;

    public $timeout = 900; // 15 mins per batch
    public $tries = 1;

    public function __construct(array $folders, int $batchIndex)
    {
        $this->folders = $folders;
        $this->batchIndex = $batchIndex;
    }

    public function handle()
    {
        $cameraImagesDir = storage_path('app/public/camera_images_upload');
        $imagesToProcess = [];

        foreach ($this->folders as $folder) 
        {
            $camera_ip = basename($folder);
            $files = Storage::disk('camera_uploads')->files($folder);
            $jpgFiles = array_filter($files, fn($file) => str_ends_with($file, '.jpg'));

            if (empty($jpgFiles)) continue;

            $latestFile = collect($jpgFiles)
                ->mapWithKeys(fn($file) => [$file => Storage::disk('camera_uploads')->lastModified($file)])
                ->sortByDesc(fn($timestamp, $file) => $timestamp)
                ->keys()
                ->first();

            $fileName = basename($latestFile);
            $camera = Camera::where('ip_address', $camera_ip)->first();
            if (!$camera) continue;

            if ($camera->filename !== $fileName) 
            {
                $camera->update(['filename' => $fileName]);
                $sourceImagePath = Storage::disk('camera_uploads')->path($latestFile);
                $cameraImagePath = $cameraImagesDir . '/' . $camera->id . '.jpg';

                try 
                {
                    $imagick = new \Imagick($sourceImagePath);
                    $imagick->resizeImage(1280, 720, \Imagick::FILTER_LANCZOS, 1, true);
                    $imagick->writeImage($cameraImagePath);
                    $imagick->clear();
                    $imagick->destroy();

                    $imagesToProcess[] = $cameraImagePath;
                } 
                catch (\Exception $e) 
                {
                    Log::error("[Batch {$this->batchIndex}] Camera {$camera_ip} error: " . $e->getMessage());
                }
            }
        }

        gc_collect_cycles();
        if (function_exists('opcache_reset')) @opcache_reset();

        $memory = round(memory_get_usage(true) / 1024 / 1024, 2);
        Log::info("✅ [Batch {$this->batchIndex}] Completed. Memory: {$memory} MB | Images: " . count($imagesToProcess));
    }
}

// class MainProcessCameraImage200 implements ShouldQueue
// {
//     use Dispatchable, InteractsWithQueue, Queueable, SerializesModels, Batchable;

//     protected int $startId;
//     protected int $endId;

//     public function __construct(int $startId, int $endId)
//     {
//         $this->startId = $startId;
//         $this->endId = $endId;
//     }

//     public function handle()
//     {
//         // Get only a subset of cameras
//         $camera_data = Camera::select('id', 'ip_address')
//             ->whereBetween('id', [$this->startId, $this->endId])
//             ->where('status', 1)
//             ->orderBy('id', 'asc')
//             ->get();

//         if ($camera_data->isEmpty()) 
//         {
//             logger("No cameras found between ID {$this->startId} and {$this->endId}");
//             return;
//         }

//         $camera_list = $camera_data->map(fn($cam) => ['id' => $cam->id, 'ip' => $cam->ip_address]);

//         $jsonFileName = "camera_list_{$this->startId}_{$this->endId}.json";
//         $jsonPath = storage_path("app/public/{$jsonFileName}");
//         file_put_contents($jsonPath, json_encode($camera_list));

//         $pythonExecutable = '/var/www/html/venv/bin/python3';
//         $pythonScriptPath = public_path('scripts/ANPR_Yolov11/capture_images_200.py');
//         $command = [
//             $pythonExecutable,
//             $pythonScriptPath,
//             $jsonPath
//         ];

//         $env = [
//             'YOLO_CONFIG_DIR' => '/tmp/yoloconfig',
//             'PADDLEOCR_HOME' => '/tmp/paddleocr',
//             'MPLCONFIGDIR' => '/tmp/matplotlib',
//         ];

//         $process = new Process($command, null, $env);
//         $process->setTimeout(600);

//         try 
//         {
//             $process->mustRun();

//         } 
//         catch (ProcessFailedException $exception) 
//         {
//             logger('Python script failed: ' . $exception->getMessage());
//         }
//     }
// }
