<?php

namespace App\Jobs\NewParkinJobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\{Camera,ParkingSlot};
use App\Facades\TuyaApiFacade;
use DB;

class NewParkinDetectNumberPlates implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function handle(): void
    {
        $pythonExecutable = '/var/www/html/venv/bin/python3';
        $pythonScriptPath = public_path('scripts/ANPR_Yolov11/bulk_plate_detector_paddleocr.py');
        $folderPath = storage_path('app/public/new_parkin_slot_images');
        $modelPath = public_path('scripts/ANPR_Yolov11/best.pt');

        $command = "YOLO_CONFIG_DIR=/var/www/html/storage/tmp/yoloconfig PADDLEOCR_HOME=/var/www/html/storage/tmp/paddleocr MPLCONFIGDIR=/var/www/html/storage/tmp/matplotlib \"{$pythonExecutable}\" \"{$pythonScriptPath}\" \"{$folderPath}\" \"{$modelPath}\" 2>&1";

        $output = shell_exec($command);
        // \Log::info("Python script output: " . $output);
        // ✅ Extract only JSON part from output to ignore warnings
        $jsonStart = strpos($output, '[');
        $jsonEnd = strrpos($output, ']');

        if ($jsonStart === false || $jsonEnd === false) 
        {
            \Log::error("JSON output not found in script result.");
            return;
        }

        $jsonString = substr($output, $jsonStart, $jsonEnd - $jsonStart + 1);
        // \Log::info("Python script output: " . $jsonString);
        $json = json_decode($jsonString, true);

        if (!is_array($json)) 
        {
            \Log::error("Failed to decode JSON. Raw: " . $jsonString);
            return;
        }
        
        $casesStatus = "";
        $casesVehicle = "";
        $casesImage = "";
        $ids = [];

        foreach ($json as $data)
        {
            $id = (int) $data['slot_number'];
            $vehicleNumberRaw = $data['vehicle_number'];
            $vehicleNumber = preg_replace("/[^A-Za-z0-9]/", "", $vehicleNumberRaw);
            $status = ($vehicleNumber == "null") ? 1 : 2;
            $plateNumber = ($status == 1) ? NULL : $vehicleNumber;
            $imageValue = ($status == 1) ? NULL : $id;

            $casesStatus .= "WHEN {$id} THEN '{$status}' ";
            $casesVehicle .= "WHEN {$id} THEN " . ($plateNumber ? "'{$plateNumber}'" : "NULL") . " ";
            $casesImage .= "WHEN {$id} THEN " . ($plateNumber ? "'storage/new_parkin_slot_images/{$imageValue}.jpg'" : "NULL") . " ";

            $ids[] = $id;
        }

        if (count($ids) > 0) 
        {
            $idList = implode(',', $ids);
            $sql = "
                UPDATE parking_slots
                SET
                    status = CASE id {$casesStatus} END,
                    vehicle_number_plate = CASE id {$casesVehicle} END,
                    vehicle_image = CASE id {$casesImage} END
                WHERE id IN ({$idList})
            ";

            DB::statement($sql);

        }
    }
}
