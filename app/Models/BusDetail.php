<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'register_number',
        'owner_name',
        'phone',
        'bus_id'
    ];

}
