<?php

namespace App\Http\Controllers;

use App\Models\Bus;
use App\Models\BusShedule;
use App\Models\Route;
use App\Models\Shedule;
use Illuminate\Http\Request;

class BusSheduleController extends Controller
{
    public function index()
    {

        $shedule = BusShedule::all();
        return view('USER.BusShedule.index', [
            'pageTitle' => 'Bus Shedule',
            'shedule' =>  $shedule,
        ])->render();

    }
    public function create()
    {
        $route = Shedule::all();
        $bus = Bus::all();
        return view('USER.BusShedule.create', [
            'pageTitle' => 'Bus',
            'route' =>  $route,
            'buses' => $bus
        ])->render();
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'shedule' => 'required',
            'bus' => 'required',
        ]);

        $route = new BusShedule();
        $route->shedule_id = $request->shedule;
        $route->bus_id = $request->bus;
        $route->date = $request->date;
        $route->save();



         return redirect()->back();
    }
}
