<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
    ];
    protected $with = [
        'infor'
    ];
    public function infor()
    {
        return $this->belongsTo(RouteDetail::class,'id','route_id');
    }
}
