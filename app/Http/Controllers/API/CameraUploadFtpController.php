<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Jobs\{
    ProcessCameraImage,
    ProcessParkingSlotsCoordinate200,
    DetectNumberPlateSlotsCoordinate200,
    WifiLampJob200,
    DetectNumberPlateSlotsCoordinate
};
use App\Models\{Vehicle,ParkingSlot,Camera}; 
use App\Jobs\ProcessCameraImageJoblist\MainProcessCameraImage200;
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

class CameraUploadFtpController extends Controller
{
    public function getLiveStream()
    {
        $folders = Storage::disk('camera_uploads')->directories();
        $slotCoordinatesPath = storage_path('app/slot_coordinates.json');

        $cameraImagesDir = storage_path('app/public/camera_images_upload');

        

        // if (file_exists($cameraImagesDir)) 
        // {
        //     $this->deleteDirectory($cameraImagesDir);
        // }
        // mkdir($cameraImagesDir, 0777, true);

        $imagesToProcess = [];

        foreach ($folders as $folder) 
        {
            $camera_ip = basename($folder);
            $files = Storage::disk('camera_uploads')->files($folder);
            $jpgFiles = array_filter($files, fn($file) => str_ends_with($file, '.jpg'));

            if (empty($jpgFiles)) continue;

            // Get latest image
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
                    \Log::error("Error resizing image for camera {$camera_ip}: " . $e->getMessage());
                }
            }
        }

        return response()->json([
            'message' => '✅ Old images removed. New camera images saved at 1280x720 resolution and ready for processing.',
            'images' => $imagesToProcess
        ]);
    }

    // private function deleteDirectory($dir)
    // {
    //     if (!file_exists($dir)) return;
    //     $it = new \RecursiveDirectoryIterator($dir, \FilesystemIterator::SKIP_DOTS);
    //     $files = new \RecursiveIteratorIterator($it, \RecursiveIteratorIterator::CHILD_FIRST);
    //     foreach ($files as $file) 
    //     {
    //         if ($file->isDir()) 
    //         {
    //             rmdir($file->getRealPath());
    //         } 
    //         else 
    //         {
    //             unlink($file->getRealPath());
    //         }
    //     }
    //     rmdir($dir);
    // }

    // public function ProcessParkingSlotsCoordinate()
    // {
    //     ProcessParkingSlotsCoordinate200::dispatch();
    // }

    // public function DetectNumberPlateSJob()
    // {
    //     DetectNumberPlateSlotsCoordinate200::dispatch();
    // }

    // public function WifiLampJob()
    // {
    //     WifiLampJob::dispatch();
    // }

   


    // Final Job Run
    // public function getLiveStream()
    // {
    //     $folders = Storage::disk('camera_uploads')->directories();
    //     $total = count($folders);

    //     if ($total === 0) 
    //     {
    //         return response()->json(['message' => 'No camera folders found.']);
    //     }

    //     $batchSize = ceil($total / 5);
    //     $batches = array_chunk($folders, $batchSize);

    //     $cameraJobs = [];
    //     foreach ($batches as $index => $batchFolders) 
    //     {
    //         $cameraJobs[] = new MainProcessCameraImage200($batchFolders, $index + 1);
    //     }

    //     $batch = Bus::batch($cameraJobs)
    //         ->then(function (Batch $batch) {
    //             logger('✅ All MainProcessCameraImage200 jobs completed.');

    //             ProcessParkingSlotsCoordinate200::dispatch();

    //             DetectNumberPlateSlotsCoordinate200::dispatch();

    //             WifiLampJob200::dispatch();

    //         })
    //         ->catch(function (Batch $batch, Throwable $e) 
    //         {
    //             logger('Batch failed: ' . $e->getMessage());
    //         })
    //         ->finally(function (Batch $batch) 
    //         {
    //             logger('Batch process completed (success or failure).');
    //         })
    //         ->name('camera_batch_200')
    //         ->dispatch();

    //     return response()->json([
    //         'message' => "{$total} cameras dispatched in " . count($batches) . " parallel jobs (Batch ID: {$batch->id})",
    //     ]);
    // }
}
