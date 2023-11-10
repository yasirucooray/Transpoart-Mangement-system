<?php

namespace App\Http\Controllers;

use App\Models\Route;
use App\Models\RouteDetail;
use Illuminate\Http\Request;

class RouteController extends Controller
{
    public function index()
    {

        $routes = Route::all();
        return view('USER.routes.index', [
            'pageTitle' => 'Locations',
            'routes' =>  $routes,
        ])->render();

    }
    public function create()
    {
        return view('USER.routes.create');
    }

    public function edit($id)
    {
        $routes = Route::find($id);
        return view('USER.routes.edit', [
            'pageTitle' => 'Route',
            'routes' =>  $routes,
        ])->render();
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'Name' => 'required',
        ]);

        $route = new Route();
        $route->name = $request->Name;
        $route->save();

        $details = new RouteDetail();
        $details->route_id = $route->id;
        $details->point_one =$request->s_one;
        $details->point_two =$request->s_two;
        $details->distance = $request->distance;
        $details->count = $request->count;
        $details->save();

         return redirect()->back();
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'Name' => 'required',
        ]);

        $route = Route::find($request->id);
        $route->name = $request->Name;
        $route->update();


        $details = RouteDetail::where('route_id',$request->id)->first();
        $details->route_id = $route->id;
        $details->point_one =$request->s_one;
        $details->point_two =$request->s_two;
        $details->distance = $request->distance;
        $details->count = $request->count;
        $details->update();

         return redirect()->back();
    }

    public function delete($id)
    {
        $routes = Route::find($id);
       $routes->delete();
       return redirect()->back();
    }
}
