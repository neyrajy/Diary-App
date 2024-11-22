@extends('layouts.app')

@section('content')
<h5 class="card-header">Staff  <span style="margin-top:-20px" class="d-flex justify-content-end"> 
        <a class="btn btn-warning btn-sm" href="{{ route('admin.register-staff') }}">Add Staff</a> </span></h5> 

<table class="table table-responsive table-striped">
    <tr>
        <th>S/N</th>
        <th>Photo</th>
        <th>Staff Name</th>
        <th>Phone</th>
        <th>Address</th>
        <th>Salary</th>
        <th>Contract Type</th>
        <th>Action</th>
    </tr>
    @foreach($staffs as $staff)
    <tr>
        <td>{{$staff->id}}</td>
        <td><img src="{{$staff->photo ? asset('storage/' . $staff->photo) : asset('assets/images/profile.png')}}" alt="Profile" style="width:60px; height:40px;"></td>
        <td>{{$staff->firstname}} {{$staff->lastname}}</td>
        <td>{{$staff->phone}}</td>
        <td>{{$staff->address}}</td>
        <td>Tsh {{number_format($staff->salary,2)}}</td>
        <td>{{$staff->employment_type}}</td>
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
                                <option value="{{$staff->region_id}}" selected disabled>--select region--</option>
                                @foreach($regions as $region)
                                <option value="{{$region->region_id}}">{{$region->name}}</option>
                                @endforeach
                            </select>
                        </section>
                        <section>
                            <label for="">District</label><br>
                            <select name="district_id" id="">
                                <option value="{{$staff->district_id}}" selected disabled>--select gender--</option>
                                @foreach($districts as $district)
                                <option value="{{$district->district_id}}">{{$district->name}}</option>
                                @endforeach
                            </select>
                        </section>
                        <section>
                            <label for="">Employment Type</label><br>
                            <select name="employment_type" id="">
                                <option value="{{$staff->employment_type}}" selected disabled>--select option--</option>
                                <option value="Full Time">Full Time</option>
                                <option value="Part Time">Part Time</option>
                            </select>
                        </section>
                        <section>
                            <label for="">Salary (TSH)</label><br>
                            <input type="number" name="salary" id=""  value="{{$staff->salary}}" placeholder="Employee salary">
                        </section>
                        <section>
                            <label for="">Street</label><br>
                            <input type="text" name="street" id="" value="{{$staff->street}}">
                        </section>
                    </div>
                    <div class="fifth-input-holder">
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

@endsection
