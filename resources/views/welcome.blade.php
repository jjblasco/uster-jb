@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>uster home</h1>
        <a href="{{ route('vehicles.index') }}"><h4>Vehicles</h4></a>
        <a href="{{ route('drivers.index') }}"><h4>Drivers</h4></a>
        <a href="{{ route('trips.index') }}"><h4>Trips</h4></a>
    </div>
@endsection
