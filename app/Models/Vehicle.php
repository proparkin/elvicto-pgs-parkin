<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ParkingSlot;

class Vehicle extends Model
{
    protected $fillable = ['vehicle_number_plate'];

    
    // A vehicle is parked in only one slot
    public function parkingSlot()
    {
        return $this->hasOne(ParkingSlot::class, 'vehicle_id');
    }
}
