@extends('layouts.app')
@section('content')
<div class="container">
@if (isset($vehicle))
<h1>Edit vehicle</h1>
    <form method="POST" action="{{ route('vehicles.update', $vehicle->id) }}">
        @method('PUT')
@else
<h1>Create vehicle</h1>
    <form method="POST" action="{{ route('vehicles.store') }}">
@endif
@csrf
    <div class="mb-3">
        <label for="brand" class="form-label">Brand</label>
        <input type="text" id="brand" name="brand" class="form-control" @isset($vehicle) value="{{ $vehicle->brand }}" @endisset>
    </div>
    <div class="mb-3">
        <label for="model" class="form-label">Model</label>
        <input type="text" id="model" name="model" class="form-control" @isset($vehicle) value="{{ $vehicle->model }}" @endisset>
    </div>
    <div class="mb-3">
        <label for="plate" class="form-label">Plate</label>
        <input type="text" id="plate" name="plate" class="form-control" @isset($vehicle) value="{{ $vehicle->plate }}" @endisset>
    </div>
    <div class="mb-3">
        <label for="licenseRequired" class="form-label">LicenseRequired</label>
        <select id="licenseRequired" name="licenseRequired" class="form-select" @isset($vehicle) value="{{ $vehicle->licenseRequired }}" @endisset>
            <option value="">Select one option...</option>
            <option value="a">a</option>
            <option value="b">b</option>
            <option value="b1">b1</option>
        </select>
    </div>
    <div class="mb-3">
        <button class="btn btn-primary" style="width: 80px" type="submit">
        Save
        </button>
    </div>
</form>
<a href="{{ route('trips.index') }}"><button class="btn btn-primary" style="width: 80px">
    Back
</button></a>
</div>
@endsection
