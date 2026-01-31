<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\{Camera,ParkingSlot,BookParkingSlots};
use Illuminate\Support\Facades\Http;
use Carbon\Carbon;
use App\Services\NotificationService;
use App\Traits\PushNotification;

class CountAvaliableSlotController extends Controller
{
    use PushNotification; 
    public function getAvaliableSlots()
    {
        $domestic_slot = ParkingSlot::where('status', 1)
        ->whereBetween('id', [1, 1137])
        ->count();

        $international_slot = ParkingSlot::where('status', 1)
        ->whereBetween('id', [1138, 2376])
        ->count();

        $response = Http::post("https://parkin.pro/api/v4/vehicle-info-pgs/receive_slot_count", [
            'domestic_slots' => $domestic_slot,
            'international_slot' => $international_slot
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Available slot count sent successfully',
            'domestic_slots' => $domestic_slot,
            'international_slot' => $international_slot,
            'remote_response' => $response->json()
        ], 200);

    }

    public function bookingSlots()
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
                            'booking_status' => $booking['booking_status'],
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

        return response()->json([
            'success' => true,
            'message' => 'Slot book successfully', 
        ], 200);

    }

    public function bookingRemove()
    {
        // start new code
        $response = Http::get("https://parkin.pro/api/v4/vehicle-info-pgs/get-booking-remove-query");
               
        $data = $response->json();
    
        date_default_timezone_set('Asia/Kolkata');
        Carbon::setLocale('en');
        
        if ($data['status'] && !empty($data['bookings'])) 
        {
            foreach ($data['bookings'] as $booking) 
            {
                $bookingEnd = Carbon::parse($booking['booking_end'])->timezone('Asia/Kolkata');
                $now = Carbon::now('Asia/Kolkata');
                $removeAt = $bookingEnd->copy()->addMinutes(10);

                if($booking['is_cancelled'] == 0 && $now->greaterThanOrEqualTo($removeAt))
                {
                    $booking_exist = BookParkingSlots::where('booking_status', 1)->where('booking_number',$booking['booking_number'])->first();
        
                    if($booking_exist) 
                    {
                        ParkingSlot::where('booking_number', $booking_exist->booking_number)->update([
                            'status' => 1,
                            'vehicle_number_plate' => NULL,
                            'booking_number' => NULL
                        ]);
            
                        BookParkingSlots::where('booking_number', $booking_exist->booking_number)->update([
                            'booking_status' => 2,
                        ]);
            
                        $booking_update = Http::post("https://parkin.pro/api/v4/vehicle-info-pgs/slot-booking-remove", [
                            'booking_number' => $booking['booking_number']
                        ]);
                    }
                  
                }
            }
        }

        // end new code

        return response()->json([
                    'success' => true,
                    'message' => 'Slot remove successfully'  
                ], 200);
    }

    // public function bookingRemove()
    // {
    //     $response = Http::get("https://parkin.pro/api/v4/vehicle-info-pgs/get-booking");

    //     $data = $response->json();
        
    //     if ($data['status'] && !empty($data['bookings'])) 
    //     {
    //         foreach ($data['bookings'] as $booking) 
    //         {
    //             if($booking['is_cancelled'] == 0)
    //             {
    //                 // check if already exists
    //                 $booking_exist = BookParkingSlots::where('booking_number', $booking['booking_number'])->where('booking_end', '<', carbon::now())->first();
            
    //                 if($booking_exist) 
    //                 {
    //                     // For Domestic
    //                     if($booking['parking_lot_id'] == 3)
    //                     {
    //                         $domestic_slot = ParkingSlot::where('status', 2)
    //                             ->where('booking_number', $booking['booking_number'])
    //                             ->update([
    //                             'status' => 1,
    //                             'vehicle_number_plate' => NULL,
    //                             'booking_number' => NULL
    //                             ]);
    //                     }
    
    //                     // For international
    //                     if($booking['parking_lot_id'] == 2)
    //                     {
    //                         $int_slot = ParkingSlot::where('status', 2)
    //                             ->where('booking_number', $booking['booking_number'])
    //                             ->update([
    //                             'status' => 1,
    //                             'vehicle_number_plate' => NULL,
    //                             'booking_number' => NULL
    //                             ]);
    //                     }
                    
    //                 }
    //             }

    //             if($booking['is_cancelled'] == 1)
    //             {
    //                 // check if already exists
    //                 $booking_exist = BookParkingSlots::where('booking_number', $booking['booking_number'])->first();
            
    //                 if($booking_exist) 
    //                 {
    //                     // For Domestic
    //                     if($booking['parking_lot_id'] == 3)
    //                     {
    //                         $domestic_slot = ParkingSlot::where('status', 2)
    //                             ->where('booking_number', $booking['booking_number'])
    //                             ->update([
    //                             'status' => 1,
    //                             'vehicle_number_plate' => NULL,
    //                             'booking_number' => NULL
    //                             ]);
    //                     }
    
    //                     // For international
    //                     if($booking['parking_lot_id'] == 2)
    //                     {
    //                         $int_slot = ParkingSlot::where('status', 2)
    //                             ->where('booking_number', $booking['booking_number'])
    //                             ->update([
    //                             'status' => 1,
    //                             'vehicle_number_plate' => NULL,
    //                             'booking_number' => NULL
    //                         ]);
    //                     }
                    
    //                 }
    //             }
    //         }    
    //     }

    //     return response()->json([
    //         'success' => true,
    //         'message' => 'Slot remove successfully'  
    //     ], 200);
    // }
}
