<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\{Camera,ParkingSlot,BookParkingSlots};
use Illuminate\Support\Facades\Http;
use Carbon\Carbon;

class CountAvaliableSlotController extends Controller
{
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

        if ($data['status'] && !empty($data['bookings'])) 
        {
            foreach ($data['bookings'] as $booking) 
            {
                if($booking['is_cancelled'] == 0 && Carbon::parse($booking['booking_end'])->greaterThanOrEqualTo(Carbon::now()))
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
                            $domestic_slot = ParkingSlot::where('status', 1)
                            ->where('parking_lot_id', 3)
                            ->limit(1) 
                            ->update([
                                'status' => 2,
                                'vehicle_number_plate' => $booking['customer_vehicle_registration'],
                                'booking_number' => $booking['booking_number']
                            ]);
                        }

                        // For international
                        if($booking['parking_lot_id'] == 2)
                        {
                            $domestic_slot = ParkingSlot::where('status', 1)
                            ->where('parking_lot_id', 2)
                            ->update([
                                'status' => 2,
                                'vehicle_number_plate' => $booking['customer_vehicle_registration'],
                                'booking_number' => $booking['booking_number']
                            ]);
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
        $response = Http::get("https://parkin.pro/api/v4/vehicle-info-pgs/get-booking");

        $data = $response->json();
        
        if ($data['status'] && !empty($data['bookings'])) 
        {
            foreach ($data['bookings'] as $booking) 
            {
                if($booking['is_cancelled'] == 0)
                {
                    // check if already exists
                    $booking_exist = BookParkingSlots::where('booking_number', $booking['booking_number'])->where('booking_end', '<', carbon::now())->first();
            
                    if($booking_exist) 
                    {
                        // For Domestic
                        if($booking['parking_lot_id'] == 3)
                        {
                            $domestic_slot = ParkingSlot::where('status', 2)
                                ->where('booking_number', $booking['booking_number'])
                                ->update([
                                'status' => 1,
                                'vehicle_number_plate' => NULL,
                                'booking_number' => NULL
                                ]);
                        }
    
                        // For international
                        if($booking['parking_lot_id'] == 2)
                        {
                            $int_slot = ParkingSlot::where('status', 2)
                                ->where('booking_number', $booking['booking_number'])
                                ->update([
                                'status' => 1,
                                'vehicle_number_plate' => NULL,
                                'booking_number' => NULL
                                ]);
                        }
                    
                    }
                }

                if($booking['is_cancelled'] == 1)
                {
                    // check if already exists
                    $booking_exist = BookParkingSlots::where('booking_number', $booking['booking_number'])->first();
            
                    if($booking_exist) 
                    {
                        // For Domestic
                        if($booking['parking_lot_id'] == 3)
                        {
                            $domestic_slot = ParkingSlot::where('status', 2)
                                ->where('booking_number', $booking['booking_number'])
                                ->update([
                                'status' => 1,
                                'vehicle_number_plate' => NULL,
                                'booking_number' => NULL
                                ]);
                        }
    
                        // For international
                        if($booking['parking_lot_id'] == 2)
                        {
                            $int_slot = ParkingSlot::where('status', 2)
                                ->where('booking_number', $booking['booking_number'])
                                ->update([
                                'status' => 1,
                                'vehicle_number_plate' => NULL,
                                'booking_number' => NULL
                            ]);
                        }
                    
                    }
                }
            }    
        }

        return response()->json([
            'success' => true,
            'message' => 'Slot remove successfully'  
        ], 200);
    }
}
