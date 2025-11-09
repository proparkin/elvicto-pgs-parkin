<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WizLamp extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'mac_address',
        'ip_address',
        'status',
        'last_seen'
       
    ];
}
