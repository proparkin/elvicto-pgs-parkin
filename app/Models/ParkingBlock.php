<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ParkingSlot;

class ParkingBlock extends Model
{
    use HasFactory;

    protected $fillable = ['block_name','lot_name'];

    public function slots()
    {
        return $this->hasMany(ParkingSlot::class, 'block_id');
    }
}
