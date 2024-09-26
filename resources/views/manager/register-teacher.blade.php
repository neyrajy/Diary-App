@extends('layouts.app')

@section('content')

<x-success_teacher_reg />

    <div class="row py-3"></div>

    <div class="row mt-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Register Teacher</div>
                <div class="card-body">
                    <form action="{{ route('superadmin.storeteachers') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <!-- Input fields for editing teacher information -->
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="firstname">First Name</label>
                                    <input type="hidden" name="role_id" id="" value="5">
                                    <input type="text" id="firstname" name="firstname" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="secondname">Second Name</label>
                                    <input type="text" id="secondname" name="secondname" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="lastname">Last Name</label>
                                    <input type="text" id="lastname" name="lastname" class="form-control">
                                </div>
                            </div>  
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="phone">Phone 1</label>
                                    <input type="text" id="phone" name="phone" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="phone">Phone 2</label>
                                    <input type="text" id="phone2" name="phone2" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nal_id">Nationality</label>
                                    <select id="nal_id" name="nal_id" class="form-control">
                                        <option value="" disabled selected>Select Nationality</option>
                                        @foreach($nationalities as $nation)
                                        <option value="{{$nation->id}}">{{$nation->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                            <div class="form-group">
                                <label for="region_id">Region</label>
                                <select id="region_id" name="region_id" class="form-control">
                                    <option value="" disabled selected>Select Region</option>
                                    @foreach($regions as $region)
                                    <option value="{{$region->id}}">{{$region->name}}</option>
                                    @endforeach
                                </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="district_id">District</label>
                                    <select id="district_id" name="district_id" class="form-control">
                                        <option value="" disabled selected>Select Disctrict</option>
                                        @foreach($disctricts as $district)
                                        <option value="{{$district->id}}">{{$district->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="street">Street Location </label>
                                    <input type="text" id="street" name="street" class="form-control">
                                </div>
                            </div> 
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="street">Password </label>
                                    <input type="password" id="password" name="password" class="form-control">
                                    @error('password')
                                    <br>
                                    <span>{{$message}}</span>
                                    @enderror
                                </div>
                            </div> 
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="street">Confirm Password </label>
                                    <input type="password" id="confirm_password" name="confirm_password" class="form-control">
                                    @error('confirm_password')
                                    <br>
                                    <span>{{$message}}</span>
                                    @enderror
                                </div>
                            </div> 
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nal_id">Assign Class</label>
                                    <select id="class_name" name="class_name" class="form-control">
                                        <option value="" disabled selected>Assign Class</option>
                                        @foreach($classes as $class)
                                        <option value="{{$class->id}}">{{$class->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nal_id">Assign Section</label>
                                    <select id="section_name" name="section_name" class="form-control">
                                        <option value="" disabled selected>Assign Section</option>
                                        @foreach($sections as $section)
                                        <option value="{{$section->id}}">{{$section->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div> 
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                <label for="address">Address</label>
                                <textarea id="address" name="address" class="form-control"></textarea>
                            </div>
                            <label for="">Guardian</label>
                            <input type="checkbox" name="guardian" id="" value="1"><br>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary" style="background-color:#0000FF;">Register Teacher</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection


