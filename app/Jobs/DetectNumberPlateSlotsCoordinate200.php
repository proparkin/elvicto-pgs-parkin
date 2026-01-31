<?php 

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\{Camera, ParkingSlot};
use DB;
use phpseclib3\Net\SSH2;
use phpseclib3\Crypt\RSA;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class DetectNumberPlateSlotsCoordinate200 implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function handle()
    {
        $timeoutSeconds = 300;

        try 
        {
            $response = Http::timeout($timeoutSeconds)->post('http://10.0.1.123:6000/process', [
                'current_folder' => '/root/slot_images/baywise_parkin_slot_images',
                'previous_folder' => '/root/previous_slot_images',
            ]);
            Log::info('Flask API raw response', [
                'status' => $response->status(),
                'body'   => $response->body(),
                'json'   => $response->json()
            ]);
            

            if (!$response->successful()) 
            {
                Log::error("Flask API call failed with status {$response->status()} : {$response->body()}");
                throw new \Exception("Flask API call failed: {$response->body()}");
            }

            $data = $response->json('data');
          
             
            
            if (empty($data) || !is_array($data)) 
            {
                Log::error("Invalid JSON received from Flask First API");
                throw new \Exception("Invalid JSON received from Flask API");
            }

  
            

            $casesStatus = "";
            $casesVehicle = "";
            $casesImage = "";
            $casesChangeSlot = "";
            $ids = [];

            foreach ($data as $slot) 
            {
                $id = (int) ($slot['slot_number'] ?? 0);
                $vehicleNumberRaw = $slot['vehicle_number'] ?? null;
                $status = (int) ($slot['status'] ?? 1);

                if (!$id) continue;

                $vehicleNumber = preg_replace("/[^A-Za-z0-9]/", "", $vehicleNumberRaw ?? '');

                if (strtoupper(substr($vehicleNumber, 0, 1)) === 'E' || strtoupper(substr($vehicleNumber, 0, 1)) === 'F') 
                {
                    $vehicleNumber = substr($vehicleNumber, 1);
                }

                $plateNumber = ($status == 1) ? NULL : $vehicleNumber;
                $imageValue = ($status == 1) ? NULL : $id;

                $casesStatus .= "WHEN {$id} THEN '{$status}' ";
                $casesVehicle .= "WHEN {$id} THEN " . ($plateNumber ? "'{$plateNumber}'" : "NULL") . " ";
                $casesImage .= "WHEN {$id} THEN " . ($plateNumber ? "'storage/new_parkin_slot_images_1_500/{$imageValue}.jpg'" : "NULL") . " ";
                $casesChangeSlot .= "WHEN {$id} THEN '" . now() . "' ";

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
                        vehicle_image = CASE id {$casesImage} END,
                        change_slot = CASE id {$casesChangeSlot} END
                    WHERE id IN ({$idList})
                ";

                DB::statement($sql);
                Log::info("Test batch Parking slots updated successfully: " . count($ids));
            } 
            else 
            {
                Log::warning("No valid slot IDs found in Flask API data.");
            }
        }
        catch (\Exception $e) 
        {
            Log::error("Batch test Flask First DetectNumberPlateSlotsCoordinate Job Failed: " . $e->getMessage());
        }
        finally 
        {
            ParkingSlot::where('id', 1)->update(['is_checked' => 0]);
        }
    }
}
