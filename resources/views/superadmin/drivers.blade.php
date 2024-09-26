@extends('layouts.app')

@section('content')
    <div class="row py-1"></div>

    <div class="row mt-0">
        <!-- Parents Table -->
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">
                        Drivers
                        <span style="margin-top:-20px" class="d-flex justify-content-end">
                            <a class="btn btn-warning btn-sm" href="#" onclick="showMyForm(event)">Add Driver</a>
                        </span>
                    </h5>
                    <table class="table table-responsive table-striped">
                        <tr>
                            <th>S/N</th>
                            <th>Photo</th>
                            <th>Driver Name</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>Salary</th>
                            <th>Contract Type</th>
                            <th>Action</th>
                        </tr>
                        @foreach($drivers as $driver)
                        <tr>
                            <td>{{$driver->id}}</td>
                            <td><img src="{{$driver->photo ? asset('storage/' . $driver->photo) : asset('assets/images/profile.png')}}" alt="Profile" style="width:80px; height:50px;"></td>
                            <td>{{$driver->firstname}} {{$driver->lastname}}</td>
                            <td>{{$driver->phone}}</td>
                            <td>{{$driver->address}}</td>
                            <td>Tsh {{number_format($driver->salary,2)}}</td>
                            <td>{{$driver->employment_type}}</td>
                            <td class="td-tr-link">
                                <!-- <a href="#"><i class="fa fa-eye"></i></a> -->
                                <a href="#" style="color:green;" onclick="showEditDialog(event, {{$driver->id}})"><i class="fa fa-edit"></i></a>
                                <a href="#" style="color:red;" onclick="showDeleteDialog(event, {{$driver->id}})"><i class="fa fa-trash-alt"></i></a>
                                <form action="/driver/delete/{{$driver->id}}" method="POST" class="delete-staff hidden" id="delete-staff-{{$driver->id}}">
                                    @csrf
                                    @method('DELETE')
                                    <p>You are about to delete {{$driver->firstname}} {{$driver->lastname}} !!!</p>
                                    <button type="submit" class="sbt-btn">Confirm</button> <button type="button" class="close-btn-clo" onclick="closeDeleteDialog(event, {{$driver->id}})">&times;</button>
                                </form>

                                <form action="/drivers/edit/{{$driver->id}}" method="POST" class="staff-reg-edit hidden" id="staff-reg-edit-{{$driver->id}}" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="role_id" id="" value="{{$driver->role_id}}">
                                        <div class="first-input-holder">
                                            <section>
                                                <label for="">First Name</label><br>
                                                <input type="text" name="firstname" id="" value="{{$driver->firstname}}">
                                            </section>
                                            <section>
                                                <label for="">Second Name</label><br>
                                                <input type="text" name="secondname" id="" value="{{$driver->secondname}}">
                                            </section>
                                            <section>
                                                <label for="">Last Name</label><br>
                                                <input type="text" name="lastname" id="" value="{{$driver->lastname}}">
                                            </section>
                                        </div>
                                        <div class="second-input-holder">
                                            <section>
                                                <label for="">Email</label><br>
                                                <input type="email" name="email" id="" value="{{$driver->email}}">
                                            </section>
                                            <section>
                                                <label for="">Phone Number</label><br>
                                                <input type="number" name="phone" id="" value="{{$driver->phone}}">
                                            </section>
                                            <section>
                                                <label for="">Password</label><br>
                                                <input type="password" name="password" id="" value="{{$driver->password}}">
                                            </section>
                                        </div>
                                        <div class="third-input-holder">
                                            <section>
                                                <label for="">Age</label><br>
                                                <input type="date" name="dob" id="" value="{{$driver->dob}}">
                                            </section>
                                            <section>
                                                <label for="">Photo</label><br>
                                                <input type="file" name="photo" id="" value="{{$driver->photo}}" accept="image/*">
                                            </section>
                                            <section>
                                                <label for="">Gender</label><br>
                                                <select name="gender" id="">
                                                    <option value="{{$driver->gender}}" selected disabled>--select gender--</option>
                                                    <option value="Male">Male</option>
                                                    <option value="Female">Female</option>
                                                </select>
                                            </section>
                                        </div>
                                        <div class="fourth-input-holder">
                                        <section>
                                            <label for="">Nationality</label><br>
                                            <select name="nal_id" id="">
                                                <option value="{{$nationality->nal_id}}">--select region--</option>
                                                @foreach($nationalities as $nationality)
                                                <option value="{{$driver->nal_id}}">{{$nationality->name}}</option>
                                                @endforeach
                                            </select>
                                        </section>
                                        <section>
                                            <label for="">Region</label><br>
                                            <select name="region_id" id="">
                                                <option value="{{$driver->region_id}}" selected disabled>--select region--</option>
                                                @foreach($regions as $region)
                                                <option value="{{$region->region_id}}">{{$region->name}}</option>
                                                @endforeach
                                            </select>
                                        </section>
                                        <section>
                                            <label for="">District</label><br>
                                            <select name="district_id" id="">
                                                <option value="{{$driver->district_id}}" selected disabled>--select gender--</option>
                                                @foreach($districts as $district)
                                                <option value="{{$district->district_id}}">{{$district->name}}</option>
                                                @endforeach
                                            </select>
                                        </section>
                                        <section>
                                            <label for="">Employment Type</label><br>
                                            <select name="employment_type" id="">
                                                <option value="{{$driver->employment_type}}" selected disabled>--select option--</option>
                                                <option value="Full Time">Full Time</option>
                                                <option value="Part Time">Part Time</option>
                                            </select>
                                        </section>
                                        <section>
                                            <label for="">Salary (TSH)</label><br>
                                            <input type="number" name="salary" id=""  value="{{$driver->salary}}" placeholder="Employee salary">
                                        </section>
                                        <section>
                                            <label for="">Street</label><br>
                                            <input type="text" name="street" id="" value="{{$driver->street}}">
                                        </section>
                                    </div>
                                    <div class="fifth-input-holder">
                                        <section>
                                            <label for="">Address</label><br>
                                            <input type="text" name="address" id="" value="{{$driver->address}}">
                                        </section>
                                    </div><br>
                                        <button type="submit" class="add-staff-btn" style="background-color: #007BFF;">Edit Driver</button>
                                        <button type="button" class="close-btn" style="background-color: red;" onclick="hideEditForm(event, {{$driver->id}})">&times;</button>
                                </form>


                            </td>
                        </tr>
                        @endforeach
                    </table>

                    <form action="/drivers" method="POST" class="staff-reg-ed hidden" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="role_id" id="" value="6">
                            <div class="first-input-holder">
                                <section>
                                    <label for="">First Name</label><br>
                                    <input type="text" name="firstname" id="" value="{{old('firstname')}}">
                                </section>
                                <section>
                                    <label for="">Second Name</label><br>
                                    <input type="text" name="secondname" id="" value="{{old('secondname')}}">
                                </section>
                                <section>
                                    <label for="">Last Name</label><br>
                                    <input type="text" name="lastname" id="" value="{{old('lastname')}}">
                                </section>
                            </div>
                            <div class="second-input-holder">
                                <section>
                                    <label for="">Email</label><br>
                                    <input type="email" name="email" id="" value="{{old('email')}}">
                                </section>
                                <section>
                                    <label for="">Phone Number</label><br>
                                    <input type="number" name="phone" id="" value="{{old('phone')}}">
                                </section>
                                <section>
                                    <label for="">Password</label><br>
                                    <input type="password" name="password" id="" value="{{old('password')}}">
                                </section>
                            </div>
                            <div class="third-input-holder">
                                <section>
                                    <label for="">Age</label><br>
                                    <input type="date" name="dob" id="" value="{{old('dob')}}">
                                </section>
                                <section>
                                    <label for="">Photo</label><br>
                                    <input type="file" name="photo" id="" value="{{old('photo')}}" accept="image/*">
                                </section>
                                <section>
                                    <label for="">Gender</label><br>
                                    <select name="gender" id="">
                                        <option value="" selected disabled>--select gender--</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                </section>
                            </div>
                            <div class="fourth-input-holder">
                                <section>
                                    <label for="">Nationality</label><br>
                                    <select name="nal_id" id="">
                                        <option value="" selected disabled>--select region--</option>
                                        @foreach($nationalities as $nationality)
                                        <option value="{{$nationality->nal_id}}">{{$nationality->name}}</option>
                                        @endforeach
                                    </select>
                                </section>
                                <section>
                                    <label for="">Region</label><br>
                                    <select name="region_id" id="">
                                        <option value="" selected disabled>--select region--</option>
                                        @foreach($regions as $region)
                                        <option value="{{$region->region_id}}">{{$region->name}}</option>
                                        @endforeach
                                    </select>
                                </section>
                                <section>
                                    <label for="">District</label><br>
                                    <select name="district_id" id="">
                                        <option value="" selected disabled>--select gender--</option>
                                        @foreach($districts as $district)
                                        <option value="{{$district->district_id}}">{{$district->name}}</option>
                                        @endforeach
                                    </select>
                                </section>
                                <section>
                                    <label for="">Employment Type</label><br>
                                    <select name="employment_type" id="">
                                        <option value="" selected disabled>--select option--</option>
                                        <option value="Full Time">Full Time</option>
                                        <option value="Part Time">Part Time</option>
                                    </select>
                                </section>
                                <section>
                                    <label for="">Salary (TSH)</label><br>
                                    <input type="number" name="salary" id=""  value="{{old('salary')}}" placeholder="Employee salary">
                                </section>
                                <section>
                                    <label for="">Street</label><br>
                                    <input type="text" name="street" id="" value="{{old('street')}}">
                                </section>
                            </div>
                            <div class="fifth-input-holder">
                                <section>
                                    <label for="">Address</label><br>
                                    <input type="text" name="address" id="" value="{{old('address')}}">
                                </section>
                            </div><br>
                            <button type="submit" class="add-staff-btn" style="background-color: #007BFF;">Add Driver</button>
                            <button type="button" class="close-btn" style="background-color: red;" onclick="hideMyForm(event)">&times;</button>
                    </form>
                </div>
            </div>
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
                window.showDeleteDialog = function(event, driverId){
                    const deleteDialog = document.getElementById(`delete-staff-${driverId}`);
                    event.preventDefault();
                    deleteDialog.style.display='block';
                }
                window.closeDeleteDialog = function(event, driverId){
                    const deleteDialog = document.getElementById(`delete-staff-${driverId}`);
                    event.preventDefault();
                    deleteDialog.style.display='none';
                }
                window.showEditDialog = function(event, driverEditId){
                    const editDialog = document.getElementById(`staff-reg-edit-${driverEditId}`);
                    editDialog.style.display='block';
                }

                window.hideEditForm = function(event, driverEditId){
                    const editDialog = document.getElementById(`staff-reg-edit-${driverEditId}`);
                    editDialog.style.display='none';
                }
            });
        </script>
    </div>
@endsection
