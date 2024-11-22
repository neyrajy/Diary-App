@extends('layouts.app')

@section('content')
    <div class="row py-1"></div>

    <x-car_exists_flash />
    <x-route_exists />
  
<h5 class="card-title">
    School Bus Management
    <span style="margin-top:-20px" class="d-flex justify-content-end">
        <a class="btn btn-warning btn-sm" href="#" onclick="showMyForm(event)">Add New Bus</a>
    </span>
</h5>
<table class="table table-responsive table-striped">
    <tr>
        <th>S/N</th>
        <th>Number</th>
        <th>Bus / Car Name</th>
        <th>Driver</th>
        <th>Route</th>
        <th>Action</th>
    </tr>
    
    @foreach($cars as $car)
    <tr>
        <td>{{$car->id}}</td>
        <td>{{$car->carnumber}}</td>
        <td>{{$car->carname}}</td>
        <td>
            @foreach($drivers as $driver)
            @if($driver->id == $car->driverid)
            {{$driver->firstname}} {{$driver->lastname}}
            @endif
            @endforeach
        </td>
        <td>
            @foreach($routes as $route)
            @if($route->id == $car->route)
            From {{$route->from}} to {{$route->to}}
            @endif
            @endforeach
        </td>
        <td>
            <a href="#" class="edit-btn-link" onclick="showEditRoute(event, {{$car->id}})"><i class="fa fa-edit"></i></a>
            <a href="#" class="delete-btn-link" onclick="showDeleteForm(event, {{$car->id}})"><i class="fa fa-trash"></i></a>

            <form action="/delete/car/{{$car->id}}" method="POST" class="delete-form-route hidden" id="delete-form-route-{{$car->id}}">
                @method('DELETE')
                @csrf
                <h1>You are deleting {{$car->carname}} with No: {{$car->carnumber}}!</h1>
                <button type="submit" class="submit-btn-frm">Delete</button>
                <button type="button" class="close-btn-frm" onclick="hideDeleteForm(event, {{$car->id}})">&times;</button>
            </form>


            <form action="/edit/car/{{$car->id}}" method="POST" class="car-edit-act hidden" enctype="multipart/form-data" id="car-mgt-edt-{{$car->id}}">
                @csrf
                @method('PUT')
                <div class="first-input-holder">
                    <section>
                        <label for="">Car Name</label><br>
                        <input type="text" name="carname" id="" value="{{$car->carname}}">
                    </section>
                    <section>
                        <label for="">Car Number</label><br>
                        <input type="text" name="carnumber" id="" value="{{$car->carnumber}}">
                    </section>
                    <section>
                        <label for="">Driver Name <span style="color:maroon; font-size:12px; font-style:italic;">(Assign a driver)</span></label><br>
                        <select name="driverid" id="">
                            <option value="{{$car->driverid}}">--select driver--</option>
                            @foreach($drivers as $driver)
                            <option value="{{$driver->id}}">{{$driver->firstname}} {{$driver->lastname}}</option>
                            @endforeach
                        </select>
                    </section>
                </div>
                <div class="fourth-input-holder" style="width:100%;">
                    <section style="width:95%;">
                        <label for="">Car Route <span style="color:maroon; font-size:12px; font-style:italic;">(Assign a route)</span></label><br>
                        <select name="route" id="">
                            <option value="{{$car->route}}">--select a route--</option>
                            @foreach($routes as $route)
                            <option value="{{$route->id}}">From {{$route->from}} To {{$route->to}}</option>
                            @endforeach
                        </select>
                    </section>
                </div><br>
                <button type="submit" class="add-staff-btn" style="background-color: #007BFF;">Edit A Car</button>
                <button type="button" class="close-btn" style="background-color: red;" onclick="hideEditForm(event, {{$car->id}})">&times;</button>
            </form>

        </td>
    </tr>
    @endforeach
</table>
<form action="/storecars" method="POST" class="staff-reg-ed hidden" enctype="multipart/form-data">
@csrf
<div class="first-input-holder">
    <section>
        <label for="">Bus / Car Name</label><br>
        <input type="text" name="carname" id="" value="{{old('carname')}}">
    </section>
    <section>
        <label for="">Bus / Car Number</label><br>
        <input type="text" name="carnumber" id="" value="{{old('carnumber')}}">
    </section>
    <section>
        <label for="">Driver's Name <span style="color:maroon; font-size:12px; font-style:italic;">(Assign a driver)</span></label><br>
        <select name="driverid" id="">
            <option value="">--select driver--</option>
            @foreach($drivers as $driver)
            <option value="{{$driver->id}}">{{$driver->firstname}} {{$driver->lastname}}</option>
            @endforeach
        </select>
    </section>
</div>
<div class="fourth-input-holder" style="width:100%;">
    <section style="width:95%;">
        <label for="">Bus / Car Route <span style="color:maroon; font-size:12px; font-style:italic;">(Assign a route)</span></label><br>
        <select name="route" id="">
            <option value="" selected disabled>--select a route--</option>
            @foreach($routes as $route)
            <option value="{{$route->id}}">From {{$route->from}} To {{$route->to}}</option>
            @endforeach
        </select>
    </section>
</div><br>
<button type="submit" class="add-staff-btn" style="background-color: #007BFF;">Add a Bus / Car</button>
<button type="button" class="close-btn" style="background-color: red;" onclick="hideMyForm(event)">&times;</button>
</form>
<script>
    document.addEventListener('DOMContentLoaded', function(){
        window.showMyForm = function(event){
                event.preventDefault();
                const myForm = document.querySelector('.staff-reg-ed');
                myForm.style.display='block';
            }

            window.hideMyForm = function(event){
                event.preventDefault();
                const myForm = document.querySelector('.staff-reg-ed');
                myForm.style.display='none';
            }

            window.showEditRoute = function(event, carId){
                const formDataEdit = document.getElementById(`car-mgt-edt-${carId}`);
                formDataEdit.style.display='block';
            }
            window.hideEditForm = function(event, carId){
                const formDataEdit = document.getElementById(`car-mgt-edt-${carId}`);
                formDataEdit.style.display='none';
            }

            window.showDeleteForm = function(event, carId){
                const deleteDialog = document.getElementById(`delete-form-route-${carId}`);
                deleteDialog.style.display='block';
            }

            window.hideDeleteForm = function(event, carId){
                const deleteDialog = document.getElementById(`delete-form-route-${carId}`);
                deleteDialog.style.display='none';
            }
    });
</script>
@endsection
