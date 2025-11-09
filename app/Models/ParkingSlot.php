<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParkingSlot extends Model
{
    protected $fillable = ['block_id','camera_id','parking_lamp_id','slot_number', 'status','vehicle_number_plate','vehicle_image'];

    public function block()
    {
        return $this->belongsTo(ParkingBlock::class);
    }
}
