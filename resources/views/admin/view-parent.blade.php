@extends('layouts.app')

@section('content')

                    <h5 class="card-header">
                        Parent: {{ $parent->firstname }} {{ $parent->secondname } }{{ $parent->lastname }}
                        <span style="margin-top:-20px" class="d-flex justify-content-end">
                            <a class="btn btn-warning btn-sm" href="{{ route('admin.parents') }}"><span>&#8592;</span> Back</a>
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
                                    
                                {{$student->firstname}} {{$student->secondname}}  {{$student->lastname}} 
                            
                            @else
                            
                            @endif
                            @endforeach
                            </td>
                            <td>{{number_format('1000000',2)}}/=</td>
                            <td>{{$parent->phone}}</td>
                            <td>{{$parent->address}}</td>
                        </tr>
                    </table>
 
@endsection
