
@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Drivers</h1>
    <a href="{{ route('drivers.create') }}"><button class="btn btn-primary">add driver</button></a>
    <table class="table">
        <thead>
            <tr>
                <td>Name</td>
                <td>Surname</td>
                <td>License</td>
                <td>Action</td>
                <td>Action</td>
            </tr>
        </thead>
        <tbody>
        @foreach ($drivers as $driver)
        <tr>
            <td>{{ $driver->name }}</td>
            <td>{{ $driver->surname }}</td>
            <td>{{ $driver->license }}</td>
            <td><a href="{{ route('drivers.edit', $driver->id) }}"><button class="btn btn-primary">Edit</button></a></td>
            <td><form method="POST" action="{{ route('drivers.destroy', $driver->id) }}">
                @csrf
                @method('DELETE')
                    <button id="{{ $driver->id }}" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection
