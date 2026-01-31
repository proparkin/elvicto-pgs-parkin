<?php
namespace App\Jobs\FtpMotion;

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

class MainProcessCameraImageFtpMotion implements ShouldQueue
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

        // 🔥 Delete all old images once per batch
        // $oldImages = glob($cameraImagesDir . '/*.jpg');
        // foreach ($oldImages as $img) 
        // {
        //     @unlink($img);
        // }

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









