<?php

namespace App\Http\Controllers;

use App\Models\Route;
use App\Models\Shedule;
use Illuminate\Http\Request;

class SheduleController extends Controller
{
    public function index()
    {

        $shedule = Shedule::all();
        return view('USER.shedule.index', [
            'pageTitle' => 'Shedule',
            'shedule' =>  $shedule,
        ])->render();

    }
    public function create()
    {
        $route = Route::all();
        return view('USER.shedule.create', [
            'pageTitle' => 'Bus',
            'route' =>  $route,
        ])->render();
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'd_time' => 'required',
            'a_time' => 'required',
        ]);

        $route = new Shedule();
        $route->route_id = $request->route;
        $route->departure_time = $request->d_time;
        $route->arraival_time = $request->a_time;
        $route->save();



         return redirect()->back();
    }
}
