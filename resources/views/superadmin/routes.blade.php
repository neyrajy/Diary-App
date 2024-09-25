@extends('layouts.app')

@section('content')
    <div class="row py-1"></div>

    <div class="row mt-0">
        <!-- Parents Table -->
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">
                        Car Routes
                        <span style="margin-top:-20px" class="d-flex justify-content-end">
                            <a class="btn btn-warning btn-sm" href="#" onclick="showMyForm(event)">Add New Route</a>
                        </span>
                    </h5>
                    <table class="table table-responsive table-striped">
                        <tr>
                            <th>S/N</th>
                            <th>Start Route</th>
                            <th>End Route</th>
                            <th>View On Map</th>
                            <th>Action</th>
                        </tr>
                        
                        @foreach($routes as $route)
                        <tr>
                            <td>{{$route->id}}</td>
                            <td>{{$route->from}}</td>
                            <td>{{$route->to}}</td>
                            <td><a href="https://www.google.com/maps/dir/?api=1&origin={{$route->from}}&destination={{$route->to}}" target="_blank"><i class="fa fa-eye" style="color:#0000FF;"></i> View</a></td>
                            <td>
                                <a href="#" class="edit-btn-link" onclick="showEditRoute(event, {{$route->id}})"><i class="fa fa-edit"></i></a>
                                <a href="#" class="delete-btn-link" onclick="showDeleteForm(event, {{$route->id}})"><i class="fa fa-trash"></i></a>

                                <form action="/delete/route/{{$route->id}}" method="POST" class="delete-form-route hidden" id="delete-form-route-{{$route->id}}">
                                    @method('DELETE')
                                    @csrf
                                    <h1>You are deleting {{$route->from}} to {{$route->to}} Route!</h1>
                                    <button type="submit" class="submit-btn-frm">Delete</button>
                                    <button type="button" class="close-btn-frm" onclick="hideDeleteForm(event, {{$route->id}})">&times;</button>
                                </form>


                                <form action="/edit/route/{{$route->id}}" method="POST" class="route-edit-form hidden" enctype="multipart/form-data" id="route-edit-{{$route->id}}">
                                @csrf
                                @method('PUT')
                                <h1 class="head-reference">Edit Route</h1>
                                    <div class="firsty-input-holder">
                                        <section>
                                            <label for="">Start From</label><br>
                                            <input type="text" name="from" id="" value="{{$route->from}}">
                                        </section>
                                        <section>
                                            <label for="">End To</label><br>
                                            <input type="text" name="to" id="" value="{{$route->to}}">
                                        </section>
                                    </div>
                                <br><br><br><br>
                                    <button type="submit" class="add-staff-btn" style="background-color: #007BFF;">Edit Route</button>
                                    <button type="button" class="close-btn" style="background-color: red;" onclick="hideEditForm(event, {{$route->id}})">&times;</button>
                            </form>
                            </td>
                        </tr>
                        @endforeach
                       
                    </table>

                    @if(count($routes) == 0)
                    <p>No route registered here!</p>
                    @endif
                </div>
            </div>
        </div>
        <form action="/storeroutes" method="POST" class="staff-reg-ed hidden" enctype="multipart/form-data">
            @csrf
            <h1 class="head-reference">Add New Route</h1>
                <div class="firsty-input-holder">
                    <section>
                        <label for="">Start From</label><br>
                        <input type="text" name="from" id="" value="Kiddie Junction Parking">
                    </section>
                    <section>
                        <label for="">End To</label><br>
                        <input type="text" name="to" id="" value="{{old('to')}}">
                    </section>
                </div>
               <br><br><br><br>
                <button type="submit" class="add-staff-btn" style="background-color: #007BFF;">Add Route</button>
                <button type="button" class="close-btn" style="background-color: red;" onclick="hideMyForm(event)">&times;</button>
        </form>
    </div>

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

                window.showEditRoute = function(event, routeId){
                    event.preventDefault();
                    const myRoute = document.getElementById(`route-edit-${routeId}`);
                    myRoute.style.display='block';
                }

                window.hideEditForm = function(event, routeIdEdi){
                    event.preventDefault();
                    const myRoute = document.querySelector('.route-edit-form');
                    myRoute.style.display='none';
                }

                window.showDeleteForm = function(event, routeId){
                    event.preventDefault();
                    const deleteDialog = document.getElementById(`delete-form-route-${routeId}`);
                    deleteDialog.style.display='block';
                }

                window.hideDeleteForm = function(event, routeId){
                    event.preventDefault();
                    const deleteDialog = document.getElementById(`delete-form-route-${routeId}`);
                    deleteDialog.style.display='none';
                }
        });
    </script>
@endsection
