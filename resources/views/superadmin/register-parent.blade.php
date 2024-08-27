@extends('layouts.app')

@section('content')
<div class="row py-3"></div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Register Parent') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('superadmin.store-parent') }}" enctype="multipart/form-data">
                        @csrf
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="firstname">{{ __('First Name') }}</label>
                                    <input id="firstname" type="text" class="form-control @error('firstname') is-invalid @enderror" name="firstname" value="{{ old('firstname') }}" required autocomplete="firstname" autofocus>
                                    @error('firstname')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <label for="secondname">{{ __('Second Name') }}</label>
                                    <input id="secondname" type="text" class="form-control @error('secondname') is-invalid @enderror" name="secondname" value="{{ old('secondname') }}" autocomplete="secondname">
                                    @error('secondname')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <label for="lastname">{{ __('Last Name') }}</label>
                                    <input id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ old('lastname') }}" required autocomplete="lastname" autofocus>
                                    @error('lastname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div><br>
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="email">{{ __('Email Address') }}</label>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"  autocomplete="email">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <label for="phone">{{ __('Phone Number 1') }}</label>
                                    <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone">
                                    @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <label for="phone2">{{ __('Phone Number 2') }}</label>
                                    <input id="phone2" type="text" class="form-control @error('phone2') is-invalid @enderror" name="phone2" value="{{ old('phone2') }}" autocomplete="phone2">
                                    @error('phone2')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div><br>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="gender">{{ __('Gender') }}</label>
                                    <select id="gender" class="form-control @error('gender') is-invalid @enderror" name="gender" required>
                                        <option value="">Select Gender</option>
                                        <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
                                        <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female</option>
                                    </select>
                                    @error('gender')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="photo">{{ __('Photo') }}</label>
                                    <input id="photo" type="file" class="form-control-file @error('photo') is-invalid @enderror" name="photo" accept="image/*">
                                    @error('photo')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>    
                            </div><br>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="nationality">{{ __('Nationality') }}</label>
                                    <select id="nationality" class="form-control @error('nationality') is-invalid @enderror" name="nationality" required>
                                        <option value="">Select Nationality</option>
                                        @foreach($nationalities as $nationality)
                                            <option value="{{ $nationality->id }}" {{ old('nationality') == $nationality->id ? 'selected' : '' }}>{{ $nationality->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('nationality')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="region">{{ __('Region') }}</label>
                                    <select id="region" class="form-control @error('region') is-invalid @enderror" name="region" required>
                                        <option value="">Select Region</option>
                                        @foreach($regions as $region)
                                            <option value="{{ $region->id }}" {{ old('region') == $region->id ? 'selected' : '' }}>{{ $region->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('region')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>    
                            </div><br>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="district">{{ __('District') }}</label>
                                    <select id="district" class="form-control @error('district') is-invalid @enderror" name="district" required>
                                        <option value="">Select District</option>
                                        @foreach($districts as $district)
                                            <option value="{{ $district->id }}" {{ old('district') == $district->id ? 'selected' : '' }}>{{ $district->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('district')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="street">{{ __('Street') }}</label>
                                    <input id="street" type="text" class="form-control @error('street') is-invalid @enderror" name="street" value="{{ old('street') }}" autocomplete="street">
                                    @error('street')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>    
                            </div><br>
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="address">{{ __('Address') }}</label>
                                    <textarea id="address" class="form-control @error('address') is-invalid @enderror" name="address" rows="3">{{ old('address') }}</textarea>
                                    @error('address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>  
                            </div><br>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="password">{{ __('Password') }}</label>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="password-confirm">{{ __('Confirm Password') }}</label>
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>    
                            </div><br>
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="class">{{ __('Select Class') }}</label>
                                    <select id="class" class="form-control @error('class') is-invalid @enderror" name="class" required>
                                        <option value="">Select Class</option>
                                        @foreach($classes as $class)
                                            <option value="{{ $class->id }}" {{ old('class') == $class->id ? 'selected' : '' }}>{{ $class->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('class')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <label for="section">{{ __('Select Section') }}</label>
                                    <select id="section" class="form-control @error('section') is-invalid @enderror" name="section" required>
                                        <option value="">Select Class Section</option>
                                        @foreach($sections as $section)
                                            <option value="{{ $section->id }}" {{ old('section') == $section->id ? 'selected' : '' }}>{{ $section->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('section')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
<br><br><br><br>
                                <div class="row" style="float:left; margin-left:0%;">
                                    <div class="col-md-5">
                                        <label for="student">{{ __('Student') }}</label>
                                        <select id="student" class="form-control @error('student') is-invalid @enderror" name="student" required>
                                                <option value="">--select--</option>
                                                @foreach($students as $student)
                                                <option value="{{$student->id}}">{{$student->firstname}}, {{$student->lastname}}</option>
                                                @endforeach
                                        </select>
                                        @error('student')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        
                                    </div>  
                                </div>
                                
                            <br>
                           
                            <button type="button" class="button-btn" onclick="addSelector()" style="color:#0000FF; border:none;"><i class="fa fa-plus"></i> Add Kid / Student</button>  
                            <br><br><br>
                            <div class="row">   
                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="is_guardian" id="is_guardian" {{ old('is_guardian') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="is_guardian">
                                            {{ __('Check if Guardian') }}
                                        </label>
                                    </div>
                                </div>
                            </div><br><br>
                            <div class="row">
                                <div class="col-md-6">
                                    <button type="submit" style="background-color:#07025d;" class="btn btn-primary">{{ __('Register') }}</button>
                                </div>    
                            </div><br>
                        </form>
                    </div>
                    <script>
                                document.addEventListener('DOMContentLoaded', function(){
                                    window.addSelector = function(){
                                        const appendChild = document.createElement('div');
                                        appendChild.innerHTML = `
                                        <div class="col-md-5" style="float:left; margin-left:0%;">
                                        <br>
                                            <label for="student">{{ __('Student') }}</label>
                                            <select class="form-control @error('student') is-invalid @enderror" name="student2" required>
                                                <option value="">--select--</option>
                                                @foreach($students as $student)
                                                <option value="{{ $student->id }}">{{ $student->firstname }}, {{ $student->lastname }}</option>
                                                @endforeach
                                            </select>
                                            @error('student')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                            </div>
                                            <br>
                                        `;
                                        document.querySelector('.col-md-5').appendChild(appendChild);
                                    }
                                });
                            </script>
                </div>
            </div>
        </div>
    </div>
@endsection
