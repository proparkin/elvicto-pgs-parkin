<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\{Camera,ParkingSlot};
use Spatie\Async\Pool;
use Imagick;

class ParkingSlotsCoordinateFtpImages implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function handle(): void
    {
        $totalCameras = 100;
        $batchSize = 500;

        // Load slot coordinates ONCE at the start
        $slotCoordinatesPath = storage_path('app/slot_coordinates.json');
        $slotCoordinates = json_decode(file_get_contents($slotCoordinatesPath), true);

        for ($start = 1; $start <= $totalCameras; $start += $batchSize) 
        {
            $end = min($start + $batchSize - 1, $totalCameras);

            if ($end === $totalCameras && ($end - $start + 1) < $batchSize) 
            {
                $prevStart = $start - $batchSize;
                $prevEnd = $start - 1;
                // $slotImageBasePath = storage_path("app/public/new_parkin_slot_images_{$prevStart}_{$prevEnd}");
                // $remoteImageFolder = "/root/slot_images/new_parkin_slot_images_{$prevStart}_{$prevEnd}";
                $slotImageBasePath = storage_path("app/public/baywise_parkin_slot_images");
                $remoteImageFolder = "/root/slot_images/baywise_parkin_slot_images";
            } 
            else 
            {
                $slotImageBasePath = storage_path("app/public/baywise_parkin_slot_images");
                $remoteImageFolder = "/root/slot_images/baywise_parkin_slot_images}";
            }

            if (!file_exists($slotImageBasePath)) 
            {
                mkdir($slotImageBasePath, 0777, true);
            }

            // Optimized query: get cameras with their slots in one query using eager loading
            $cameras = Camera::select('id', 'ip_address')
                ->with(['parking_slots:id,camera_id'])
                ->whereBetween('id', [$start, $end])
                ->where('status', 1)
                ->whereHas('parking_slots')
                ->orderBy('id', 'asc')
                ->get();

            if ($cameras->isEmpty()) 
            {
                continue;
            }

            // Increase concurrency for faster processing
            $pool = Pool::create()->concurrency(50);

            foreach ($cameras as $camera) 
            {
                $output_image = storage_path('app/public/camera_images_baywise/camera_' . $camera->id . '.jpg');

                if (!file_exists($output_image)) 
                {
                    continue;
                }

                $parkingSlots = $camera->parking_slots->pluck('id')->toArray();
                if (empty($parkingSlots)) 
                {
                    continue;
                }

                $pool->add(function () use ($output_image, $parkingSlots, $slotImageBasePath, $slotCoordinates) {
                    $imagick = new \Imagick($output_image);
                    $imagick->setIteratorIndex(0);
                    $imagick->setImageCompression(\Imagick::COMPRESSION_JPEG);
                    $imagick->setImageCompressionQuality(85);
                    $imagick->setImageFormat('jpeg');

                foreach ($parkingSlots as $slotId) 
                {
                    if (!isset($slotCoordinates[$slotId])) continue;

                    $coords = $slotCoordinates[$slotId];
                    $slotPath = $slotImageBasePath . '/' . $slotId . '.jpg';

                    $slotImagick = clone $imagick;
                    $slotImagick->cropImage($coords['w'], $coords['h'], $coords['x'], $coords['y']);
                    $slotImagick->stripImage();
                    $slotImagick->writeImage($slotPath);
                    $slotImagick->clear();
                    $slotImagick->destroy();
                }

                $imagick->clear();
                $imagick->destroy();
            })->catch(function ($exception) {
                \Log::error('Image processing error: ' . $exception->getMessage());
            });
        }

            $pool->wait();

            // Use rsync instead of scp for faster transfer with compression
            // -a: archive mode, -z: compress, -q: quiet
            // exec("rsync -azq {$slotImageBasePath}/  root@10.0.1.123:{$remoteImageFolder}/");
            exec("rsync -aq --inplace --no-compress {$slotImageBasePath}/ root@10.0.1.123:{$remoteImageFolder}/");

        }
    }
    
    

}
