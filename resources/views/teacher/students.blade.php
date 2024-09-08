@extends('layouts.app')

@section('content')
    <div class="row py-1"></div>

    <div class="row mt-0">
        <!-- Parents Table -->
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">
                        My Students / {{Auth::guard('web')->user()->lastname}}
                        <span style="margin-top:-20px" class="d-flex justify-content-end">
                            <a class="btn btn-warning btn-sm" href="{{ route('superadmin.parents') }}"><span>&#8592;</span> Back</a>
                        </span>
                    </h5>
                    <table class="table table-responsive table-striped">
                        <tr>
                            <th>S/N</th>
                            <th>Photo</th>  
                            <th>Names</th>
                            <th>Adm No</th>
                            <th>Age</th>
                            <th>Reg Date</th>
                        </tr>
                        @foreach($students as $student)
                        @if(Auth::guard('web')->user()->class_name == $student->s_class_id)
                        <tr>
                            <td>
                                {{$student->id}}
                            </td>
                            <td><img src="{{$student->photo ? asset('storage/' . $student->photo) : asset('assets/images/profuile.png')}}" alt="Image" style="width:80px; height:50px"></td>
                            <td>{{$student->firstname}} {{$student->lastname}}</td>
                            <td>{{$student->adm_no}}</td>
                            <td>{{$student->age}}</td>
                            <td>{{$student->created_at->format('Y-m-d')}}</td>
                        </tr>
                        @endif
                        @endforeach
                    </table>
                    @if(count($students) == 0)
                    <p>No student found here!</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
