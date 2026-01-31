<?php
namespace App\Jobs\ProcessCameraImageJoblist;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Bus;
use Symfony\Component\Process\Process;
use Illuminate\Bus\Batchable;
use App\Models\{Camera,ParkingSlot,BookParkingSlots};
use Illuminate\Support\Facades\Http;
use Carbon\Carbon;
use App\Services\NotificationService;
use App\Traits\PushNotification;
use Illuminate\Support\Facades\Log;

class ProcessBookingJobs implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels, Batchable,PushNotification; 

    public function handle()
    {
        $response = Http::get("https://parkin.pro/api/v4/vehicle-info-pgs/get-booking");
           
        $data = $response->json();
        
        date_default_timezone_set('Asia/Kolkata');
        Carbon::setLocale('en');
        Carbon::now('Asia/Kolkata');
            
        if ($data['status'] && !empty($data['bookings'])) 
        {
            foreach ($data['bookings'] as $booking) 
            {
                $bookingStart = Carbon::parse($booking['booking_start'])->timezone('Asia/Kolkata');
                $bookingEnd = Carbon::parse($booking['booking_end'])->timezone('Asia/Kolkata');
                    
                $now = Carbon::now('Asia/Kolkata');
        
                $startDiff = $now->diffInMinutes($bookingStart, false);
    
                if($booking['is_cancelled'] == 0 && $bookingEnd->greaterThanOrEqualTo($now) && $startDiff <= 10 && $startDiff >= 0) 
                {
                    // check if already exists
                    $already_booking = BookParkingSlots::where('booking_number', $booking['booking_number'])->first();
              
                    if (!$already_booking) 
                    {
                        BookParkingSlots::create([
                            'booking_number' => $booking['booking_number'],
                            'customer_vehicle_registration' => $booking['customer_vehicle_registration'],
                            'parking_lot_id' => $booking['parking_lot_id'],
                            'customer_vehicle_type_id' => $booking['customer_vehicle_type_id'],
                            'booking_start' => $booking['booking_start'],
                            'booking_end' => $booking['booking_end'],
                            'booking_status' => 1,
                        ]);
                          
                        // For Domestic
                        if($booking['parking_lot_id'] == 3)
                        {
                            $slot = ParkingSlot::where('status', 1)->where('parking_lot_id', 3)->first();
    
                            if ($slot) 
                            {
                                    $slot->status = 2;
                                    $slot->vehicle_number_plate = $booking['customer_vehicle_registration'];
                                    $slot->booking_number = $booking['booking_number'];
                                    $slot->save();
                            
                                    $blockName = optional($slot->block)->block_name; // Eloquent Relationship
                            
                                    $device_token = $booking['device_token'];
                            
                                    $text_message = "Slot Booked Successfully. Slot: {$slot->slot_number}, Block: {$blockName}";
    
                                    $response = Http::post("https://parkin.pro/api/v4/vehicle-info-pgs/slot-book-notification", [
                                        'text_message' => $text_message,
                                        'user_id' => $booking['customer_id']
                                    ]);
    
                                    $booking_update = Http::post("https://parkin.pro/api/v4/vehicle-info-pgs/slot-booking-update", [
                                        'block_name' => $blockName,
                                        'slot_number' => $slot->slot_number,
                                        'booking_number' => $booking['booking_number']
                                    ]);
                            
                                    $this->sendPushNotification(
                                        $device_token,
                                        'Parking Slot Booked.',
                                        $text_message
                                    );
                                }
                                
                            }
    
                            // For international
                            if($booking['parking_lot_id'] == 2)
                            {
                                $slot = ParkingSlot::where('status', 1)->where('parking_lot_id', 2)->first();
                              
                                if ($slot) 
                                {
                                    $slot->status = 2;
                                    $slot->vehicle_number_plate = $booking['customer_vehicle_registration'];
                                    $slot->booking_number = $booking['booking_number'];
                                    $slot->save();
    
                                    $blockName = optional($slot->block)->block_name;
                                    
                                    $device_token = $booking['device_token'];
                                    $text_message = "Slot Booked Successfully. Slot: {$slot->slot_number}, Block: {$blockName}";
    
                                    $response = Http::post("https://parkin.pro/api/v4/vehicle-info-pgs/slot-book-notification", [
                                        'text_message' => $text_message,
                                        'user_id' => $booking['customer_id']
                                    ]);
    
                                    $booking_update = Http::post("https://parkin.pro/api/v4/vehicle-info-pgs/slot-booking-update", [
                                        'block_name' => $blockName,
                                        'slot_number' => $slot->slot_number,
                                        'booking_number' => $booking['booking_number']
                                    ]);
                                    
    
                                    $this->sendPushNotification(
                                        $device_token,
                                        'Parking Slot Booked',
                                        $text_message
                                    );
                                }
                            }
                        }
                    }
                }
            }
    
            Log::info("Slot book successfully.");
        
    }
}
