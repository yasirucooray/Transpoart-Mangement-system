<?php

namespace App\Http\Controllers;

use App\Models\Bus;
use App\Models\Driver;
use Illuminate\Http\Request;

class DriverController extends Controller
{
    public function index()
    {

        $drivers = Driver::all();
        return view('USER.driver.index', [
            'pageTitle' => 'Drivers',
            'drivers' =>  $drivers,
        ])->render();

    }
    public function create()
    {
        $bus = Bus::all();
        return view('USER.driver.create', [
            'pageTitle' => 'Bus',
            'buses' => $bus
        ])->render();
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'Name' => 'required',
            'bus' => 'required',
        ]);

        $route = new Driver();
        $route->bus_id = $request->bus;
        $route->name = $request->Name;
        $route->address = $request->address;
        $route->licnse_no = $request->license_no;
        $route->phone = $request->phone;
        $route->save();



         return redirect()->back();
    }
}
