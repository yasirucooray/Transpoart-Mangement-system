<?php

namespace App\Http\Controllers;

use App\Models\Bus;
use App\Models\BusDetail;
use App\Models\Route;
use Illuminate\Http\Request;

class BusController extends Controller
{
       /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $buses = Bus::all();
        return view('USER.buses.home', [
            'pageTitle' => 'Bus',
            'buses' =>  $buses,
        ])->render();
    }

    public function create()
    {
        $route = Route::all();
        return view('USER.buses.create', [
            'pageTitle' => 'Bus',
            'route' =>  $route,
        ])->render();
    }
    public function edit($id)
    {
        $route = Route::all();
        $bus = Bus::find($id);
        return view('USER.buses.edit', [
            'route' =>  $route,
            'bus' =>  $bus,
        ])->render();
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'Name' => 'required',
        ]);

        $bus = new Bus();
        $bus->bus_no = $request->Name;
        $bus->route_id = $request->route;
        $bus->save();

        $details = new BusDetail();
        $details->bus_id = $bus->id;
        $details->owner_name =$request->owner_Name;
        $details->phone =$request->phone;
        $details->save();

         return redirect()->back();
    }
    public function update(Request $request)
    {
        $this->validate($request, [
            'Name' => 'required',
        ]);

        $bus = Bus::find($request->id);
        $bus->bus_no = $request->Name;
        $bus->route_id = $request->route;
        $bus->update();


        $details = BusDetail::where('bus_id',$request->id)->first();
        $details->bus_id = $request->id;
        $details->owner_name =$request->owner_Name;
        $details->phone =$request->phone;
        $details->update();

         return redirect()->back();
    }

    public function delete($id)
    {
        $routes = Bus::find($id);
       $routes->delete();
       return redirect()->back();
    }
}
