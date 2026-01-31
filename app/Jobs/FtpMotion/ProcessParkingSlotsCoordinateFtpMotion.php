<?php

namespace App\Jobs\FtpMotion;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\{Camera, ParkingSlot};
use Spatie\Async\Pool;

class ProcessParkingSlotsCoordinateFtpMotion implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function handle(): void
    {
        $totalCameras = 300;
        $batchSize = 300;
        $slotCoordinatesPath = storage_path('app/slot_coordinates.json');

        for ($start = 1; $start <= $totalCameras; $start += $batchSize) 
        {
            $end = min($start + $batchSize - 1, $totalCameras);

            $currentCropPath = storage_path("app/public/new_parkin_slot_images_1_1007");
            $archiveCropPath = storage_path("app/public/archive_crop_images_1_1007");
            $remoteFolder = "/root/slot_images/new_parkin_slot_images_1_1007";

            // 🧹 Clean current cropped images SAFELY
            // if (is_dir($currentCropPath)) 
            // {
            //     foreach (glob($currentCropPath . '/*.jpg') as $img) 
            //     {
            //         @unlink($img);
            //     }
            // } 
            // else 
            // {
            //     mkdir($currentCropPath, 0777, true);
            // }

            // 🔹 Get camera data
            $camera_data = Camera::select('id', 'ip_address')
                ->whereBetween('id', [$start, $end])
                ->where('status', 1)
                ->orderBy('id', 'asc')
                ->get();

            if ($camera_data->isEmpty()) continue;

            $pool = Pool::create()->concurrency(25);

            foreach ($camera_data as $camera) 
            {
                $output_image = storage_path('app/public/camera_images_upload/' . $camera->id . '.jpg');
                if (!file_exists($output_image)) continue;

                $parkingSlots = ParkingSlot::where('camera_id', $camera->id)->get()->map(function ($slot) {
                    return [
                        'id' => $slot->id,
                        'camera_id' => $slot->camera_id
                    ];
                })->toArray();

                $pool->add(function () use ($output_image, $parkingSlots, $slotCoordinatesPath, $currentCropPath, $archiveCropPath) 
                {
                    $imagick = new \Imagick($output_image);
                    $slotCoordinates = json_decode(file_get_contents($slotCoordinatesPath), true);

                    foreach ($parkingSlots as $slot) 
                    {
                        if (!isset($slotCoordinates[$slot['id']])) continue;

                        $coords = $slotCoordinates[$slot['id']];
                        $slotFileName = $slot['id'] . '.jpg';

                        $slotPathCurrent = $currentCropPath . '/' . $slotFileName;
                        $slotPathArchive = $archiveCropPath . '/' . $slotFileName;

                        $slotImagick = clone $imagick;
                        $slotImagick->cropImage($coords['w'], $coords['h'], $coords['x'], $coords['y']);
                        $slotImagick->writeImage($slotPathCurrent);

                        // 🧭 Copy to archive folder (replace if exists)
                        copy($slotPathCurrent, $slotPathArchive);

                        $slotImagick->clear();
                        $slotImagick->destroy();
                    }

                    $imagick->clear();
                    $imagick->destroy();
                });
            }

            $pool->wait();

            // 🔁 Transfer only current cropped images to remote YOLO server
            exec("scp -r {$currentCropPath}/* root@10.0.1.123:{$remoteFolder}");
        }
    }
}
