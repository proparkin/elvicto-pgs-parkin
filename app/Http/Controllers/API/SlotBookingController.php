<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller as Controller;  
use App\Jobs\ProcessCameraImageJoblist\{ProcessBookingJobs,ProcessBookingRemoveJobs};
use Illuminate\Support\Facades\Bus;
use Illuminate\Bus\Batch;
use Throwable;

class SlotBookingController extends Controller  
{
    public function slotBookingAndRemove()
    {
            Bus::chain([
                new ProcessBookingJobs(),
                new ProcessBookingRemoveJobs()
            ])->dispatch();

        return response()->json(['message' => 'Processing slot Booking and remove System.']);
    }
}
