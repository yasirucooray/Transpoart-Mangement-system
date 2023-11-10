<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'route_id',
        'departure_time',
        'arraival_time',
    ];

    protected $with = [
        'route'
    ];
    public function route()
    {
        return $this->belongsTo(Route::class,'route_id','id');
    }
}
