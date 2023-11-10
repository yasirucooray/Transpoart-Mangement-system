<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RouteDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'distance',
        'point_one',
        'pont_two',
        'route_id'
    ];
}
