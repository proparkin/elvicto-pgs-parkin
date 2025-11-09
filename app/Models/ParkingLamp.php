<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\TuyaAccount;

class ParkingLamp extends Model
{
    use HasFactory;

    protected $fillable = ['name','mac_address','ip_address'];

    public function tuyaAccount()
    {
        return $this->belongsTo(TuyaAccount::class);
    }
}
