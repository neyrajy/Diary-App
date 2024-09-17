@extends('layouts.app')

@section('content')
    <div class="row py-1"></div>

    <div class="row mt-0">
        <!-- Parents Table -->
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">
                        Staffs
                        <span style="margin-top:-20px" class="d-flex justify-content-end">
                            <a class="btn btn-warning btn-sm" href="#" onclick="showMyForm(event)">Add Staff</a>
                        </span>
                    </h5>
                    <table class="table table-responsive table-striped">
                        <tr>
                            <th>S/N</th>
                            <th>Photo</th>
                            <th>Staff Name</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>Action</th>
                        </tr>
                        @foreach($staffs as $staff)
                        <tr>
                            <td>{{$staff->id}}</td>
                            <td><img src="{{$staff->photo ? asset('storage/' . $staff->photo) : asset('assets/images/profile.png')}}" alt="Profile" style="width:80px; height:50px;"></td>
                            <td>{{$staff->firstname}} {{$staff->lastname}}</td>
                            <td>{{$staff->phone}}</td>
                            <td>{{$staff->address}}</td>
                            <td class="td-tr-link">
                                <!-- <a href="#"><i class="fa fa-eye"></i></a> -->
                                <a href="#" style="color:green;" onclick="showEditDialog(event, {{$staff->id}})"><i class="fa fa-edit"></i></a>
                                <a href="#" style="color:red;" onclick="showDeleteDialog(event, {{$staff->id}})"><i class="fa fa-trash-alt"></i></a>
                                <form action="/staff/delete/{{$staff->id}}" method="POST" class="delete-staff hidden" id="delete-staff-{{$staff->id}}">
                                    @csrf
                                    @method('DELETE')
                                    <p>You are about to delete {{$staff->firstname}} {{$staff->lastname}} !!!</p>
                                    <button type="submit" class="sbt-btn">Confirm</button> <button type="button" class="close-btn-clo" onclick="closeDeleteDialog(event, {{$staff->id}})">&times;</button>
                                </form>

                                <form action="/staffs/edit/{{$staff->id}}" method="POST" class="staff-reg-edit hidden" id="staff-reg-edit-{{$staff->id}}" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="role_id" id="" value="{{$staff->role_id}}">
                                        <div class="first-input-holder">
                                            <section>
                                                <label for="">First Name</label><br>
                                                <input type="text" name="firstname" id="" value="{{$staff->firstname}}">
                                            </section>
                                            <section>
                                                <label for="">Second Name</label><br>
                                                <input type="text" name="secondname" id="" value="{{$staff->secondname}}">
                                            </section>
                                            <section>
                                                <label for="">Last Name</label><br>
                                                <input type="text" name="lastname" id="" value="{{$staff->lastname}}">
                                            </section>
                                        </div>
                                        <div class="second-input-holder">
                                            <section>
                                                <label for="">Email</label><br>
                                                <input type="email" name="email" id="" value="{{$staff->email}}">
                                            </section>
                                            <section>
                                                <label for="">Phone Number</label><br>
                                                <input type="number" name="phone" id="" value="{{$staff->phone}}">
                                            </section>
                                            <section>
                                                <label for="">Password</label><br>
                                                <input type="password" name="password" id="" value="{{$staff->password}}">
                                            </section>
                                        </div>
                                        <div class="third-input-holder">
                                            <section>
                                                <label for="">Age</label><br>
                                                <input type="date" name="dob" id="" value="{{$staff->dob}}">
                                            </section>
                                            <section>
                                                <label for="">Photo</label><br>
                                                <input type="file" name="photo" id="" value="{{$staff->photo}}" accept="image/*">
                                            </section>
                                            <section>
                                                <label for="">Gender</label><br>
                                                <select name="gender" id="">
                                                    <option value="{{$staff->gender}}">--select gender--</option>
                                                    <option value="Male">Male</option>
                                                    <option value="Female">Female</option>
                                                </select>
                                            </section>
                                        </div>
                                        <div class="fourth-input-holder">
                                            <section>
                                                <label for="">Nationality</label><br>
                                                <select name="nal_id" id="">
                                                    <option value="{{$staff->nal_id}}">--select region--</option>
                                                    @foreach($nationalities as $nationality)
                                                    <option value="{{$nationality->nal_id}}">{{$nationality->name}}</option>
                                                    @endforeach
                                                </select>
                                            </section>
                                            <section>
                                                <label for="">Region</label><br>
                                                <select name="region_id" id="">
                                                    <option value="{{$staff->region_id}}">--select region--</option>
                                                    @foreach($regions as $region)
                                                    <option value="{{$region->region_id}}">{{$region->name}}</option>
                                                    @endforeach
                                                </select>
                                            </section>
                                            <section>
                                                <label for="">District</label><br>
                                                <select name="district_id" id="">
                                                    <option value="{{$staff->district_id}}">--select gender--</option>
                                                    @foreach($districts as $district)
                                                    <option value="{{$district->district_id}}">{{$district->name}}</option>
                                                    @endforeach
                                                </select>
                                            </section>
                                        </div>
                                        <div class="fifth-input-holder">
                                            <section>
                                                <label for="">Street</label><br>
                                                <input type="text" name="street" id="" value="{{$staff->street}}">
                                            </section>
                                            <section>
                                                <label for="">Address</label><br>
                                                <input type="text" name="address" id="" value="{{$staff->address}}">
                                            </section>
                                        </div><br>
                                        <button type="submit" class="add-staff-btn" style="background-color: #007BFF;">Edit Staff</button>
                                        <button type="button" class="close-btn" style="background-color: red;" onclick="hideEditForm(event, {{$staff->id}})">&times;</button>
                                </form>


                            </td>
                        </tr>
                        @endforeach
                    </table>

                    <form action="/staffs" method="POST" class="staff-reg-ed hidden" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="role_id" id="" value="7">
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
                            </div>
                            <div class="fifth-input-holder">
                                <section>
                                    <label for="">Street</label><br>
                                    <input type="text" name="street" id="" value="{{old('street')}}">
                                </section>
                                <section>
                                    <label for="">Address</label><br>
                                    <input type="text" name="address" id="" value="{{old('address')}}">
                                </section>
                            </div><br>
                            <button type="submit" class="add-staff-btn" style="background-color: #007BFF;">Add Staff</button>
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
                window.showDeleteDialog = function(event, staffId){
                    const deleteDialog = document.getElementById(`delete-staff-${staffId}`);
                    event.preventDefault();
                    deleteDialog.style.display='block';
                }
                window.closeDeleteDialog = function(event, staffId){
                    const deleteDialog = document.getElementById(`delete-staff-${staffId}`);
                    event.preventDefault();
                    deleteDialog.style.display='none';
                }
                window.showEditDialog = function(event, staffEditId){
                    const editDialog = document.getElementById(`staff-reg-edit-${staffEditId}`);
                    editDialog.style.display='block';
                }

                window.hideEditForm = function(event, staffEditId){
                    const editDialog = document.getElementById(`staff-reg-edit-${staffEditId}`);
                    editDialog.style.display='none';
                }
            });
        </script>
    </div>
@endsection
