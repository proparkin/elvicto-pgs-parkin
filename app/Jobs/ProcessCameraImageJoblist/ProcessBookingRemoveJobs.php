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

class ProcessBookingRemoveJobs implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels, Batchable,PushNotification; 

    public function handle()
    {
        $booking_exist = BookParkingSlots::where('booking_status', 1)->where('booking_end', '<=', Carbon::now('Asia/Kolkata')->subMinutes(15))->get();
        
        foreach ($booking_exist as $booking) 
        {
            ParkingSlot::where('booking_number', $booking['booking_number'])->update([
                'status' => 1,
                'vehicle_number_plate' => NULL,
                'booking_number' => NULL
            ]);

            BookParkingSlots::where('booking_number', $booking['booking_number'])->update([
                'booking_status' => 2,
            ]);

            $booking_update = Http::post("https://parkin.pro/api/v4/vehicle-info-pgs/slot-booking-remove", [
                'booking_number' => $booking['booking_number']
            ]);
        }
        Log::info("Slot remove successfully.");

    }
}