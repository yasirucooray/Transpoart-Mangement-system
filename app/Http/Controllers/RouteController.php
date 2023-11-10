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
}
