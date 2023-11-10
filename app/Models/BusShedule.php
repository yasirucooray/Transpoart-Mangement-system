<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusShedule extends Model
{
    use HasFactory;


    protected $fillable = [
        'id',
        'bus_id',
        'shedule_id',
        'date',
    ];

    protected $with = [
        'shedule'
    ];
    public function shedule()
    {
        return $this->belongsTo(Shedule::class,'shedule_id','id');
    }
}
