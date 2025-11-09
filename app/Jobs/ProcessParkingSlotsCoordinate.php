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

class ProcessParkingSlotsCoordinate implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function handle(): void
{
    $totalCameras = 1007;
    $batchSize = 500;  

    $slotCoordinatesPath = storage_path('app/slot_coordinates.json');
    
    for ($start = 1; $start <= $totalCameras; $start += $batchSize) 
    {
        $end = min($start + $batchSize - 1, $totalCameras);

        
        if ($end === $totalCameras && ($end - $start + 1) < $batchSize) 
        {
          
            $prevStart = $start - $batchSize;
            $prevEnd   = $start - 1;

            $slotImageBasePath = storage_path("app/public/new_parkin_slot_images_{$prevStart}_{$prevEnd}");
            $remoteImageFolder = "/root/slot_images/new_parkin_slot_images_{$prevStart}_{$prevEnd}";
        } 
        else 
        {
            $slotImageBasePath = storage_path("app/public/new_parkin_slot_images_{$start}_{$end}");
            $remoteImageFolder = "/root/slot_images/new_parkin_slot_images_{$start}_{$end}";
        }

        if (!file_exists($slotImageBasePath)) 
        {
            mkdir($slotImageBasePath, 0777, true);
        }

        $camera_data = Camera::select('id', 'ip_address')
            ->whereBetween('id', [$start, $end])
            ->where('status', 1)
            ->orderBy('id', 'asc')
            ->get();

        if ($camera_data->isEmpty()) 
        {
            continue;
        }

        $pool = Pool::create()->concurrency(25);

        foreach ($camera_data as $camera) 
        {
            $output_image = storage_path('app/public/camera_images/camera_' . $camera->id . '.jpg');

            if (!file_exists($output_image)) 
            {
                continue;
            }

            $parkingSlots = ParkingSlot::where('camera_id', $camera->id)->get()->map(function ($slot) {
                return [
                    'id' => $slot->id,
                    'camera_id' => $slot->camera_id
                ];
            })->toArray();         
        


            $pool->add(function () use ($output_image, $parkingSlots, $slotImageBasePath, $slotCoordinatesPath) {
                $imagick = new \Imagick($output_image);
                $slotCoordinates = json_decode(file_get_contents($slotCoordinatesPath), true);

                foreach ($parkingSlots as $slot) 
                {
                    if (!isset($slotCoordinates[$slot['id']])) continue;

                    $coords = $slotCoordinates[$slot['id']];
                    $slotPath = $slotImageBasePath . '/' . $slot['id'] . '.jpg';

                    $slotImagick = clone $imagick;
                    $slotImagick->cropImage($coords['w'], $coords['h'], $coords['x'], $coords['y']);
                    $slotImagick->writeImage($slotPath);
                    $slotImagick->clear();
                    $slotImagick->destroy();
                }

                $imagick->clear();
                $imagick->destroy();
            });
        }

       
        $pool->wait();

        exec("scp -r {$slotImageBasePath}/* root@test:{$remoteImageFolder}");
    }
}

}
