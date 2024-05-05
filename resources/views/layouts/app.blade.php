<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
        <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
          <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
          <span class="fs-4">Uster</span>
        </a>
        <ul class="nav nav-pills">
          <li class="nav-item"><a href="{{ route('home') }}" class="nav-link active" aria-current="page">Home</a></li>
          <li class="nav-item"><a href="{{ route('vehicles.index') }}" class="nav-link">Vehicles</a></li>
          <li class="nav-item"><a href="{{ route('drivers.index') }}" class="nav-link">Drivers</a></li>
          <li class="nav-item"><a href="{{ route('trips.index') }}" class="nav-link">Trips</a></li>
        </ul>
    </header>
    @yield('content')
</body>
<script src="{{ asset('js/app.js') }}" defer></script>
</html>
