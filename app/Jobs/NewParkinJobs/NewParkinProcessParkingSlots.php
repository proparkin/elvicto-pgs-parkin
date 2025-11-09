<?php

namespace App\Jobs\NewParkinJobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\{Camera,ParkingSlot};
use Spatie\Async\Pool;
use FFMpeg;
use Imagick;

class NewParkinProcessParkingSlots implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
   
    public function handle(): void
    {
        $camera_data = Camera::select('id')->whereBetween('id', [804, 1007])->orderBy('id', 'asc')->get();
        $pool = Pool::create()->concurrency(50); 
    
        foreach ($camera_data as $camera) 
        {
            $output_image = storage_path('app/public/new_parkin_camera_images/camera_' . $camera->id . '.jpg');
    
            if (!file_exists($output_image)) 
            {
                continue; 
            }
    
            $parkingSlots = ParkingSlot::where('camera_id', $camera->id)->get()->map(function ($slot) 
            {
                return [
                    'id' => $slot->id,
                    'camera_id' => $slot->camera_id
                ];
            })->toArray();
    
            $slotImageBasePath = storage_path('app/public/new_parkin_slot_images');
    
            $pool->add(function () use ($output_image, $parkingSlots, $slotImageBasePath) 
            {
                $imagick = new Imagick($output_image);
                $width = $imagick->getImageWidth();
                $height = $imagick->getImageHeight();
                $totalSlots = count($parkingSlots);
    
                if ($totalSlots === 0) return;
    
                $slotWidth = $width / $totalSlots;
    
                foreach ($parkingSlots as $index => $slot) 
                {
                    $x = $index * $slotWidth;
                    $y = 0;
    
                    $slotPath = $slotImageBasePath . '/' . $slot['id'] . '.jpg';
                    // exec("chown parkin:www-data {$slotPath}");
    
                    $slotImagick = clone $imagick;
                    $slotImagick->cropImage($slotWidth, $height, $x, $y);
                    $slotImagick->writeImage($slotPath);
                    $slotImagick->clear();
                    $slotImagick->destroy();
                }
    
                    $imagick->clear();
                    $imagick->destroy();
            });
        }
        $pool->wait(); 
    }
}
