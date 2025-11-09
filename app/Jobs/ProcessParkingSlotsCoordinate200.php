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

class ProcessParkingSlotsCoordinate200 implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function handle(): void
    {
        $totalCameras = 1007;
        $batchSize = 1007;

        $slotCoordinatesPath = storage_path('app/slot_coordinates.json');
    
        for ($start = 1; $start <= $totalCameras; $start += $batchSize) 
        {
            $end = min($start + $batchSize - 1, $totalCameras);

            $slotImageBasePath = storage_path("app/public/new_parkin_slot_images_{$start}_{$end}");
            $currentFolder = $slotImageBasePath;
            $remoteImageFolder = "/root/slot_images/new_parkin_slot_images_{$start}_{$end}";

            // ensure local folders exist and have proper perms
            if (!file_exists($slotImageBasePath)) 
            {
                mkdir($slotImageBasePath, 0775, true);
            }
            if (!file_exists($currentFolder)) 
            {
                mkdir($currentFolder, 0775, true);
            }
            // safe: ensure folder perms/ownership (runs best when this PHP process can chown)
            @chown($slotImageBasePath, 'test');
            @chgrp($slotImageBasePath, 'test');
            @chmod($slotImageBasePath, 0775);

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
                $output_image = storage_path('app/public/camera_images_upload/' . $camera->id . '.jpg');
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

                $pool->add(function () use ($output_image, $parkingSlots, $currentFolder, $slotCoordinatesPath) 
                {
                    $old_umask = umask(000); // new files will get 777 bits (owner/group/others can be restricted later by chmod)
                    try 
                    {
                        $imagick = new \Imagick($output_image);
                        $slotCoordinates = json_decode(file_get_contents($slotCoordinatesPath), true);

                        foreach ($parkingSlots as $slot) {
                            if (!isset($slotCoordinates[$slot['id']])) continue;

                            $coords = $slotCoordinates[$slot['id']];
                            $slotCurrentPath = $currentFolder . '/' . $slot['id'] . '.jpg';

                            $slotImagick = clone $imagick;
                            $slotImagick->cropImage($coords['w'], $coords['h'], $coords['x'], $coords['y']);
                            $slotImagick->writeImage($slotCurrentPath);

                        
                            @chmod($slotCurrentPath, 0775);            
                            @chown($slotCurrentPath, 'test'); 
                            @chgrp($slotCurrentPath, 'test');     

                            $slotImagick->clear();
                            $slotImagick->destroy();
                        }

                        $imagick->clear();
                        $imagick->destroy();
                    } finally {
                        umask($old_umask);
                    }
                });
            }

            // wait for cropping tasks to finish
            $pool->wait();

            // create temporary send folder and copy only files that exist (ensures permissions are set)
            $tmpSendFolder = $slotImageBasePath . '/to_send';
            if (!file_exists($tmpSendFolder)) mkdir($tmpSendFolder, 0775, true);

            // copy all current images to tmpSendFolder (we could filter by changed slots in future)
            $files = glob($currentFolder . '/*.jpg');
            foreach ($files as $f) 
            {
                $base = basename($f);
                copy($f, $tmpSendFolder . '/' . $base);
                @chmod($tmpSendFolder . '/' . $base, 0775);
                @chown($tmpSendFolder . '/' . $base, 'parkin_pgsold');
                @chgrp($tmpSendFolder . '/' . $base, 'www-data');
            }

            // scp to remote (use key-based auth). After scp, run remote chmod recursively to ensure permissions there.
            $scpCmd = "scp -r " . escapeshellarg($tmpSendFolder) . "/* test:" . escapeshellarg($remoteImageFolder);
            exec($scpCmd, $scpOut, $scpRet);

        
                // run remote chmod via ssh to enforce perms remotely
                $sshCmd = "ssh test 'mkdir -p " . escapeshellarg($remoteImageFolder) . " && chmod -R 0775 " . escapeshellarg($remoteImageFolder) . "'";
                exec($sshCmd, $sshOut, $sshRet);
                if ($sshRet !== 0) 
                {
                    \Log::error("Remote chmod failed: " . implode("\n", $sshOut));
                }
            

            // cleanup local tmpSendFolder files (keep current folder for debug if you want)
            $tmpFiles = glob($tmpSendFolder . '/*');
            foreach ($tmpFiles as $tf) 
            {
                @unlink($tf);
            }
            @rmdir($tmpSendFolder);
        } // end batches
    }

  

}
