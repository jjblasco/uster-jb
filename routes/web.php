<?php

use App\Http\Controllers\DriverController;
use App\Http\Controllers\TripController;
use App\Http\Controllers\VehicleController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::resource('vehicles', VehicleController::class);
Route::resource('drivers', DriverController::class);
Route::get('trips/date', [TripController::class, 'loadVehicles'])->name('trips.loadVehicles');
Route::get('trips/vehicle_id', [TripController::class, 'loadDrivers'])->name('trips.loadDrivers');
Route::resource('trips', TripController::class);
