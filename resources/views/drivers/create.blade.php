@extends('layouts.app')
@section('content')
<div class="container">
@if (isset($driver))
<h1>Edit driver</h1>
<form method="POST" action="{{ route('drivers.update', $driver->id) }}">
    @method('PUT')
@else
<h1>Create driver</h1>
<form method="POST" action="{{ route('drivers.store') }}">
@endif
@csrf
    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" id="name" name="name" class="form-control" @isset($driver) value="{{ $driver->name }}" @endisset>
    </div>
    <div class="mb-3">
        <label for="surname" class="form-label">Surname</label>
        <input type="text" id="surname" name="surname" class="form-control" @isset($driver) value="{{ $driver->surname }}" @endisset>
    </div>
    <div class="mb-3">
        <label for="license" class="form-label">License</label>
        <select id="license" name="license" class="form-select" @isset($driver) value="{{ $driver->license }}" @endisset>
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
<a href="{{ route('driver.index') }}"><button class="btn btn-primary" style="width: 80px">
    Back
</button></a>
</div>
@endsection
