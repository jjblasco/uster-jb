<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use App\Models\Trip;
use App\Models\Vehicle;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TripController extends Controller
{
    public $rules = [
        'date' => 'required|date',
        'vehicle_id' => 'required|integer',
        'driver_id' => 'required|integer'
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $trips = Trip::orderBy('date', 'ASC')->get();
        return view('trips.list', compact('trips'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $vehicles = Vehicle::get();
        $drivers = Driver::get();
        return view('trips.create', compact('vehicles', 'drivers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate($this->rules);
        Trip::create($data);
        return redirect()->route('trips.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Trip  $trip
     * @return \Illuminate\Http\Response
     */
    public function show(Trip $trip)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Trip  $trip
     * @return \Illuminate\Http\Response
     */
    public function edit(Trip $trip)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Trip  $trip
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Trip $trip)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Trip  $trip
     * @return \Illuminate\Http\Response
     */
    public function destroy(Trip $trip)
    {
        $trip->delete();
        return redirect()->route('trips.index');
    }

    public function loadVehicles(Request $request){
        $date = $request->input('date');
        $carbonDate = Carbon::parse($date);

        $vehiclesWithTrips = Trip::whereDate('date', $carbonDate)->pluck('vehicle_id')->toArray();

        $vehiclesWithoutTrips = Vehicle::whereNotIn('id', $vehiclesWithTrips)->get();

        return $vehiclesWithoutTrips;
    }

    public function loadDrivers(Request $request){
        $vehicleId = $request->input('vehicle_id');

        $licenseVehicle = Vehicle::select('licenseRequired')->where('id', $vehicleId)->get();

        $drivers = Driver::whereIn('license', $licenseVehicle)->get();

        return $drivers;
    }
}
