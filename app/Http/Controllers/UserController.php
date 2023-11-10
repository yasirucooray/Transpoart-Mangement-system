<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {

        $users = User::where('user_role','user')->get();
        return view('ADMIN.users.index', [
            'pageTitle' => 'Users',
            'users' =>  $users,
        ])->render();

    }
    public function create()
    {
        return view('ADMIN.users.create', [
            'pageTitle' => 'User',
        ])->render();
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'Name' => 'required',
            'email' => 'required',
        ]);

        $route = new User();
        $route->name = $request->Name;
        $route->email = $request->email;
        $route->password = bcrypt($request->password);
        $route->user_role = 'user';
        $route->save();



         return redirect()->back();
    }
}
