@extends('layouts.app')
@section('content')
<div class="container">
    <h1>create trip</h1>
    <form method="POST" action="{{ route('trips.store') }}">
    @csrf
        <div class="mb-3">
            <label for="name" class="form-label">date</label>
            <input type="date" id="date" name="date" class="form-control" required>
        </div>
        <div id="vehicle_div" class="mb-3" style="display: none" >
            <label for="vehicle_id" class="form-label">vehicle</label>
            <select name="vehicle_id" id="vehicle_id" class="form-select" onchange="loadDrivers()" required>
            </select>
        </div>
        <div id="driver_div" class="mb-3" style="display: none">
            <label for="driver_id" class="form-label">driver</label>
            <select name="driver_id" id="driver_id" class="form-select" required>
            </select>
        </div>
        <button class="btn btn-primary" style="width: 80px" type="submit">
            Save
        </button>
    </form>
    <a href="{{ route('trips.index') }}"><button class="btn btn-primary" style="width: 80px">
        Back
    </button></a>
</div>
@endsection
<script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
<script>
    $(document).ready(function() {
        let selector = document.querySelector('#date')
        const selectVehicle = document.getElementById('vehicle_id');


        selector.addEventListener('change', function() {
            if($('#date').val()){
                loadVehicles($('#date').val())
            }
        })

        function loadVehicles(date){
            selectVehicle.innerHTML = '';
            $.ajax({
                url: "{{ route('trips.loadVehicles') }}",
                method: 'GET',
                data: {date: date},
                success: function(response){
                    const defaultOption = document.createElement('option');
                    defaultOption.text = 'Select any vehicle';
                    defaultOption.value = '';
                    selectVehicle.appendChild(defaultOption);

                    vehicles = response
                    vehicles.forEach(vehicle => {
                        const option = document.createElement('option');
                        option.text = vehicle.brand + ' - ' + vehicle.model;
                        option.value = vehicle.id;
                        selectVehicle.appendChild(option);
                    });
                    document.getElementById('vehicle_div').style.display = ''
                },
                error: function(xhr, status, error){
                    console.log(error)
                }
            })
        }

    });
    function loadDrivers(){
        document.getElementById('driver_id').innerHTML = '';
        vehicle_id = $('#vehicle_id').val()
        $.ajax({
            url: "{{ route('trips.loadDrivers') }}",
            method: 'GET',
            data: {vehicle_id: vehicle_id},
            success: function(response){
                const defaultOption = document.createElement('option');
                defaultOption.text = 'Select any driver';
                defaultOption.value = '';
                document.getElementById('driver_id').appendChild(defaultOption);

                drivers = response
                drivers.forEach(driver => {
                    const option = document.createElement('option');
                    option.text = driver.name + ' - ' + driver.surname;
                    option.value = driver.id;
                    document.getElementById('driver_id').appendChild(option);
                });
                document.getElementById('driver_div').style.display = ''
            },
            error: function(xhr, status, error){
                console.log(error)
            }
        })
    }


</script>

