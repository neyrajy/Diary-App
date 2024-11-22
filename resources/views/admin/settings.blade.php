@extends('layouts.app')

@section('content')
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
    <div class="row py-3"></div>

    <div class="row mt-4">
        <div class="col-md-12">
            <div class="card"><h5 class="card-header">
            School Settings
                    <span style="margin-top:-20px" class="d-flex justify-content-end">
                        <a class="btn btn-warning btn-sm" href="{{ route('fees.index') }}">Fees Settings</a>
                    </span>
                </h5>
                <div class="card-body">
                    <form action="{{ route('admin.settings.update') }}" method="POST">
                        @csrf
                
                        @foreach($settings as $setting)
                            <div class="form-group">
                                <label for="{{ $setting->type }}">{{ ucfirst(str_replace('_', ' ', $setting->type)) }}</label>
                                <input type="text" name="{{ $setting->type }}" class="form-control" value="{{ $setting->description }}" required>
                            </div>
                        @endforeach
                
                        <button style="background-color:#0000FF;" type="submit" class="btn btn-primary">Update Settings</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection


