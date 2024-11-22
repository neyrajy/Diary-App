@extends('layouts.app')

@section('content')
<div class="card-header">Register Staff</div>
    <form action="{{ route('admin.storestaff') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- Input fields for editing teacher information -->
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="firstname">First Name</label>
                    <input type="hidden" name="role_id" id="" value="5">
                    <input type="text" id="firstname" name="firstname" class="form-control">
                    @error('firstname')
                    <span id="error-code">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="secondname">Second Name</label>
                    <input type="text" id="secondname" name="secondname" class="form-control">
                    @error('secondname')
                    <span id="error-code">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="lastname">Last Name</label>
                    <input type="text" id="lastname" name="lastname" class="form-control">
                    @error('lastname')
                    <span id="error-code">{{ $message }}</span>
                    @enderror
                </div>
            </div>  
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="phone">Phone 1</label>
                    <input type="text" id="phone" name="phone" class="form-control">
                    @error('phone')
                    <span id="error-code">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="phone">Phone 2</label>
                    <input type="text" id="phone2" name="phone2" class="form-control">
                    @error('phone2')
                    <span id="error-code">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="">Email</label><br>
                    <input type="email" name="email" id="" value="{{old('email')}}">
                    @error('email')
                    <span id="error-code">{{ $message }}</span>
                    @enderror
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
                    @error('street')
                    <span id="error-code">{{ $message }}</span>
                    @enderror
                </div>
            </div> 
            <div class="col-md-6">
                <div class="form-group">
                    <label for="street">Password </label>
                    <input type="password" id="password" name="password" class="form-control">
                    @error('password')
                    <br>
                    <span id="error-code">{{$message}}</span>
                    @enderror
                </div>
            </div> 
            <div class="col-md-6">
                <div class="form-group">
                    <label for="street">Confirm Password </label>
                    <input type="password" id="confirm_password" name="confirm_password" class="form-control">
                    @error('confirm_password')
                    <br>
                    <span id="error-code">{{$message}}</span>
                    @enderror
                </div>
            </div> 
            <div class="col-md-6">
                <div class="form-group">
                    <label for="">Age</label><br>
                    <input type="date" name="dob" id="" value="{{old('dob')}}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                <label for="">Gender</label><br>
                <select name="gender" id="">
                    <option value="" selected disabled> Select Gender</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="">Photo</label><br>
                    <input type="file" name="photo" id="" value="{{old('photo')}}" accept="image/*">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="">Employment Type</label><br>
                    <select name="employment_type" id="">
                        <option value="" selected disabled>Select Option</option>
                        <option value="Full Time">Full Time</option>
                        <option value="Part Time">Part Time</option>
                    </select>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                <label for="">Salary (TZS)</label><br>
                <input type="number" name="salary" id=""  value="{{old('salary')}}" placeholder="Employee salary">
            </div>
            </div>
        </div> 
        
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                <label for="address">Address</label>
                <textarea id="address" name="address" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <button type="submit" style="background-color:#f1d016;" class="btn btn-kprimary">{{ __('Register') }}</button>
            </div>
        </div>
    </form>

@endsection


