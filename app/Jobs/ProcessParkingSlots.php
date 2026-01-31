<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\{Camera,ParkingSlot};
use Spatie\Async\Pool;
use FFMpeg;
use Imagick;
use App\Jobs\DetectNumberPlates;

class ProcessParkingSlots implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
   
    public function handle(): void
    {
        // $camera_data = Camera::select('id')->orderBy('id', 'asc')->get();
        $camera_data = Camera::select('id', 'ip_address')->whereBetween('id', [1, 803])->orderBy('id', 'asc')->get();
        
        $pool = Pool::create()->concurrency(150); 
    
        foreach ($camera_data as $camera) 
        {
            $output_image = storage_path('app/public/camera_images/camera_' . $camera->id . '.jpg');
    
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
    
            $slotImageBasePath = storage_path('app/public/slot_images');
            $remoteImageFolder = '/root/slot_images/slot_images';
    
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
        exec("scp -r {$slotImageBasePath}/* root@10.0.1.123:{$remoteImageFolder}");
        DetectNumberPlates::dispatch();
    }
}
