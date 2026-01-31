<?php

namespace App\Http\Controllers\API;
 
use Illuminate\Http\Request;
use App\Http\Controllers\Controller as Controller;
use thiagoalessio\TesseractOCR\TesseractOCR;
use Illuminate\Support\Facades\Storage; 
use FFMpeg;
use FFMpeg\Filters\VideoFilters;
use FFMpeg\Exception\RuntimeException;
use Intervention\Image\Facades\Image;
use Imagick;
use Intervention\Image\ImageManagerStatic;
use Spatie\Image\Image as ImageToText;
use App\Models\{Vehicle,ParkingSlot,Camera,ParkingLamp};
use Illuminate\Support\Facades\Http;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Spatie\Async\Pool;

class CameraController extends Controller 
{
    public function getLiveStream() 
    {
        set_time_limit(1200);
        try 
        {
            // Get all camera data (ID, name, IP address)
            $camera_datas = Camera::select('id', 'name', 'ip_address')->orderBy('id', 'asc')->take(100)->get();
            // $camera_datas = Camera::select('id', 'name', 'ip_address')->whereBetween('id', [804, 1007])->orderBy('id', 'asc')->get();

            // $camera_datas = Camera::select('id', 'name', 'ip_address')
            //     ->whereBetween('id', [785, 1007])
            //     ->orderBy('id', 'asc')
            //     ->get();
            // return $camera_datas;
            $allSlotsAnalysis = []; // Store the analysis results for all cameras

            foreach ($camera_datas as $camera_data) 
            {
                // $outputImage = storage_path('app/public/captured_frame_15.jpeg'); 
                $outputImage = storage_path('app/public/new_parkin_camera_images/camera_' . $camera_data->id . '.jpg');  // Store output image with camera_id
                // $cameraUrl = "rtsp://admin:Parkin@321@$camera_data->ip_address/cam/realmonitor?channel=1&subtype=0";
                $cameraUrl = "rtsp://admin:Elvicto@123@$camera_data->ip_address/cam/realmonitor?channel=1&subtype=0";

                $ffmpegCommand = "ffmpeg -rtsp_transport tcp -i \"$cameraUrl\" -vf scale=1280:720 -q:v 2 -frames:v 1 \"$outputImage\" -y";
                shell_exec($ffmpegCommand);

                if (!file_exists($outputImage)) 
                {
                    return response()->json(['error' => 'Failed to capture image from camera ' . $camera_data->name . ' - ip_address - '. $camera_data->ip_address], 500);
                }

                $allSlotsAnalysis[$camera_data->name] = $outputImage;
            }

            // Return a response with the parking slots analysis for all cameras
            return response()->json([
                'slots' => $allSlotsAnalysis,
            ]);
        }
        catch (RuntimeException $e) 
        {
            return response()->json([
                'success' => false,
                'message' => 'Unable to probe the video stream',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    // Get slot from the image.

    public function getSlotImages()
    {
        $camera_data = Camera::select('id')->orderBy('id', 'asc')->get();
        $pool = Pool::create()->concurrency(50); 
    
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
    }

    public function analyzeParkingSlots()
    {
        $image_path = storage_path('app/public/camera_images_upload/100.jpg');
       
        // Load the image for processing
        $imagick = new Imagick($image_path);
        $image_width = $imagick->getImageWidth();
        $image_height = $imagick->getImageHeight();
    
        $results = [];
        $slotImagesPath = storage_path("app/public/elvicto_parkin_slot_images"); 
        if (!file_exists($slotImagesPath)) 
        {
            mkdir($slotImagesPath, 0777, true); 
        }
        $slotCoordinates = [

            // "2001": { "x": 110, "y":145, "w": 320, "h": 450 },
            // "2002": { "x": 390, "y": 175, "w": 450, "h": 450 },
            // "2003": { "x": 830, "y": 145, "w": 350, "h": 450 },

            1 => ['x' => 190, 'y' => 320, 'w' => 450, 'h' => 450], 
            2 => ['x' => 390, 'y' => 175, 'w' => 450, 'h' => 450],
            3 => ['x' => 830, 'y' => 145, 'w' => 350, 'h' => 450], 
        ];
    
        foreach ($slotCoordinates as $slotNumber => $coords) 
        {
            $slotImage = clone $imagick;
            $slotImage->cropImage($coords['w'], $coords['h'], $coords['x'], $coords['y']);
    
            $slotImagePath = $slotImagesPath . '/' . $slotNumber . '.jpg';
            $slotImage->writeImage($slotImagePath);
    
            // $vehicle_parkin_data = $this->getNumberPlateFromPythonImage($slotImagePath);
    
            $results[$slotNumber] = [
                // 'vehicle_info' => $vehicle_parkin_data,
                'image_path' => "storage/elvicto_parkin_slot_images/{$slotNumber}.jpg",
            ];
    
            $slotImage->clear();
            $slotImage->destroy();
        }
    
        $imagick->clear();
        $imagick->destroy();
    
        return $results;
    }
    

    public function runNumberPlateDetection()
    {
        try 
        {
            // Set environment variables
            putenv("HOME=/tmp");
        
            $pythonExecutable = '/var/www/html/venv/bin/python3';
            $pythonScriptPath = public_path('scripts/ANPR_Yolov11/bulk_plate_detector_paddleocr.py');
            $folderPath = storage_path('app/public/slot_images');
            $modelPath = public_path('scripts/ANPR_Yolov11/best.pt');
        
            $command = "YOLO_CONFIG_DIR=/var/www/html/storage/tmp/yoloconfig PADDLEOCR_HOME=/var/www/html/storage/tmp/paddleocr MPLCONFIGDIR=/var/www/html/storage/tmp/matplotlib \"{$pythonExecutable}\" \"{$pythonScriptPath}\" \"{$folderPath}\" \"{$modelPath}\" 2>&1";
        
            $output = shell_exec($command);
        
            // Extract only the JSON part (starting from first [ to last ])
            $jsonStart = strpos($output, '[');
            $jsonEnd = strrpos($output, ']');
        
            if ($jsonStart !== false && $jsonEnd !== false) 
            {
                $jsonString = substr($output, $jsonStart, $jsonEnd - $jsonStart + 1);
                $json = json_decode($jsonString, true);
                return response()->json($json);
            } 
            else 
            {
                return response()->json(['error' => 'JSON output not found in script result'], 500);
            }
        } 
        catch (\Exception $e) 
        {
            return response()->json(['error' => $e->getMessage()], 500);
        }
        
    }

  
    
   

}

