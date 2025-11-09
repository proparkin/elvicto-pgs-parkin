<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookParkingSlots extends Model
{
    use HasFactory;

    protected $fillable = ['booking_number','customer_vehicle_registration','parking_lot_id','customer_vehicle_type_id','booking_start','booking_end','booking_status','is_cancelled'];
}
