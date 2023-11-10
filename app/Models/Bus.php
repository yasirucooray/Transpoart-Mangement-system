<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bus extends Model
{
    use HasFactory;

    protected $fillable = [
        'route_id',
        'bus_no',
        'owner_name',
        'phone'
    ];
    protected $with = [
        'infor'
    ];
    public function infor()
    {
        return $this->belongsTo(BusDetail::class,'id','bus_id');
    }
}
