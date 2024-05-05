@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Trips</h1>
    <a href="{{ route('trips.create') }}"><button class="btn btn-primary">add trip</button></a>
    <table class="table">
        <thead>
            <tr>
                <td>Date</td>
                <td>Vehicle</td>
                <td>Driver</td>
                <td>Action</td>
                <td>Action</td>
            </tr>
        </thead>
        <tbody>
        @foreach ($trips as $trip)
            <tr>
                <td>{{ $trip->date }}</td>
                <td>{{ $trip->vehicle->brand }}</td>
                <td>{{ $trip->driver->name }}</td>
                <td><a href="{{ route('trips.edit', $trip->id) }}"><button class="btn btn-primary">Edit</button></a></td>
                <td><form method="POST" action="{{ route('trips.destroy', $trip->id) }}">
                    @csrf
                    @method('DELETE')
                        <button id="{{ $trip->id }}" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection
