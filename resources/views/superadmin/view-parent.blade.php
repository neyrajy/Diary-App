@extends('layouts.app')

@section('content')
    <div class="row py-3"></div>

    <div class="row mt-4">
        <!-- Parents Table -->
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">
                        Parent / {{$parent->firstname}}
                        <span style="margin-top:-20px" class="d-flex justify-content-end">
                            <a class="btn btn-warning btn-sm" href="{{ route('superadmin.parents') }}"><span>&#8592;</span> Back</a>
                        </span>
                    </h5>
                    <table class="table table-responsive table-striped">
                        <tr>
                            <th>S/N</th>
                            <th>Child's Name</th>
                            <th>Fees Status</th>
                            <th>Mobile Phone</th>
                            <th>Address</th>
                        </tr>
                        <tr>
                            <td>{{$parent->id}}</td>
                            <td>
                            @foreach($students as $student)
                            @if($student->id == $parent->student)
                                    
                                {{$student->firstname}}
                            
                            @else
                                
                            @endif
                            @endforeach
                            </td>
                            <td>{{number_format('1000000',2)}}/=</td>
                            <td>{{$parent->phone}}</td>
                            <td>{{$parent->address}}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
