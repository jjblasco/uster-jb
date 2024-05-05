@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Vehicles</h1>
    <a href="{{ route('vehicles.create') }}"><button class="btn btn-primary">add vehicle</button></a>
    <table class="table">
        <thead>
            <tr>
                <td>Brand</td>
                <td>Model</td>
                <td>Plate</td>
                <td>LicenseRequired</td>
                <td>Action</td>
                <td>Action</td>
            </tr>
        </thead>
        <tbody>
        @foreach ($vehicles as $vehicle)
        <tr>
            <td>{{ $vehicle->brand }}</td>
            <td>{{ $vehicle->model }}</td>
            <td>{{ $vehicle->plate }}</td>
            <td>{{ $vehicle->licenseRequired }}</td>
            <td><a href="{{ route('vehicles.edit', $vehicle->id) }}"><button class="btn btn-primary">edit</button></a></td>
            <td><form method="POST" action="{{ route('vehicles.destroy', $vehicle->id) }}">
                @csrf
                @method('DELETE')
                    <button class="btn btn-danger" id="{{ $vehicle->id }}">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection
