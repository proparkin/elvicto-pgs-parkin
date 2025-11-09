<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Models\ParkingSlot;
use Illuminate\Support\Facades\Log;

class DetectNumberPlateSlotsCoordinate implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function handle()
    {
        $timeoutSeconds = 300;

        try 
        {
            $response = Http::timeout($timeoutSeconds)->post('http://test:test/process', [
                'current_folder' => '/root/slot_images/new_parkin_slot_images_1_500',
                'previous_folder' => '/root/previous_slot_images',
            ]);

            if (!$response->successful()) 
            {
                Log::error("Flask API call failed with status {$response->status()} : {$response->body()}");
                throw new \Exception("Flask API call failed: {$response->body()}");
            }

            // $data = $response->json();
            $data = $response->json('data');

            if (empty($data) || !is_array($data)) 
            {
                Log::error("Invalid JSON received from Flask API");
                throw new \Exception("Invalid JSON received from Flask API");
            }

            Log::info("Flask API processed successfully. Total slots: " . count($data));

            foreach ($data as $slot) 
            {
                $slotId = $slot['slot_id'] ?? null;
                $numberPlate = $slot['number_plate'] ?? null;
                $status = $slot['status'] ?? null;

                if (!$slotId) continue;

                $parkingSlot = ParkingSlot::where('slot_id', $slotId)->first();

                if ($parkingSlot) 
                {
                    $parkingSlot->number_plate = $numberPlate;
                    $parkingSlot->status = $status;
                    $parkingSlot->last_detected_at = now();
                    $parkingSlot->save();

                    Log::info("Slot {$slotId} updated: Plate={$numberPlate}, Status={$status}");
                } 
                else 
                {
                    Log::warning("Slot ID {$slotId} not found in DB.");
                }
            }

            Log::info("Job completed successfully for folder:");

        } 
        catch (\Exception $e) 
        {
            Log::error("DetectNumberPlateSlotsCoordinate Job Failed: " . $e->getMessage());
        }
    }
}
