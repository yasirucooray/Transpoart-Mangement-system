<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
Auth::routes();
Route::group(['middleware' => ['user_role']], function () {

    //bus
Route::get('/bus', [App\Http\Controllers\BusController::class, 'index'])->name('bus');
Route::post('/bus/save', [App\Http\Controllers\BusController::class, 'store'])->name('bus.save');
Route::get('/bus/create', [App\Http\Controllers\BusController::class, 'create'])->name('bus.create');

//route
Route::get('/route', [App\Http\Controllers\RouteController::class, 'index'])->name('route');
Route::post('/route/create', [App\Http\Controllers\RouteController::class, 'store'])->name('rout.save');
Route::get('/route/create', [App\Http\Controllers\RouteController::class, 'create'])->name('route.create');

    //shedule
Route::get('/shedule', [App\Http\Controllers\SheduleController::class, 'index'])->name('shedule');
Route::post('/shedule/save', [App\Http\Controllers\SheduleController::class, 'store'])->name('shedule.save');
Route::get('/shedule/create', [App\Http\Controllers\SheduleController::class, 'create'])->name('shedule.create');

//busshedule
Route::get('/bus_shedule', [App\Http\Controllers\BusSheduleController::class, 'index'])->name('bus_shedule');
Route::post('/bus_shedule/save', [App\Http\Controllers\BusSheduleController::class, 'store'])->name('bus_shedule.save');
Route::get('/bus_shedule/create', [App\Http\Controllers\BusSheduleController::class, 'create'])->name('bus_shedule.create');

//driver
Route::get('/driver', [App\Http\Controllers\DriverController::class, 'index'])->name('driver');
Route::post('/driver/save', [App\Http\Controllers\DriverController::class, 'store'])->name('driver.save');
Route::get('/driver/create', [App\Http\Controllers\DriverController::class, 'create'])->name('driver.create');


//users
Route::get('/users', [App\Http\Controllers\UserController::class, 'index'])->name('users');
Route::post('/users/save', [App\Http\Controllers\UserController::class, 'store'])->name('users.save');
Route::get('/users/create', [App\Http\Controllers\UserController::class, 'create'])->name('users.create');

}
);
