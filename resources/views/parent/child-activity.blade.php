@extends('layouts.app')
@section('content')
<div class="row py-3"></div>
<div class="row mt-4">
    <div class="col-md-12">
    <div class="card">
        <div class="card-header header-elements-inline">
            <h6 class="card-title">My Children</h6>
            
        </div>

        <div class="card-body">
            <table class="table datatable-button-html5-columns">
                <thead>
                <tr>
                    <!-- <th>S/N</th>
                    <th>Photo</th>
                    <th>Name</th>
                    <th>ADM_No</th>
                    <th>Section</th>
                    <th>Fees</th>
                    <th>Profile</th> -->
                    <th>Photo</th>
                    <th>ADM_No</th>
                    <th>Name</th>
                    <th>Fees</th>
                    <th>Class</th>
                    <th>Section</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>

                @foreach($students as $student)
                @if(Auth::guard('web')->user()->student == $student->id)
                <tr>
                    <td><img src="{{asset('storage/' . $student->photo)}}" alt="Photo" style="width:80px; height:50px; border-radius:5px;"></td>
                    <td>{{$student->adm_no}}</td>
                    <td>{{$student->firstname}}</td>
                    <td>
                        @foreach($fees as $fee)
                        @if(Auth::guard('web')->user()->student == $fee->student_id)
                        Tsh {{number_format($fee->amount, 2)}}
                        @endif
                        @endforeach
                    </td>
                    <td>
                        @foreach($classes as $class)
                        @if($class->id == $student->s_class_id)
                        {{$class->name}}
                        @endif
                        @endforeach
                    </td>
                    <td>
                    @foreach($sections as $section)
                        @if($section->id == $student->s_class_id)
                        {{$section->name}}
                        @endif
                        @endforeach
                    </td>
                    <td style="color:#0000FF; text-decoration:underline;">
                        <a href="/my-child/{{$student->id}}">View Activity</a>
                    </td>
                </tr>
                @endif
                @if(Auth::guard('web')->user()->student2 == $student->id)
                <tr>
                <td><img src="{{asset('storage/' . $student->photo)}}" alt="Photo" style="width:80px; height:50px; border-radius:5px;"></td>
                    <td>{{$student->adm_no}}</td>
                    <td>{{$student->firstname}}</td>
                    <td>{{number_format('100000',0)}}/=</td>
                    <td>
                        @foreach($classes as $class)
                        @if($class->id == $student->s_class_id)
                        {{$class->name}}
                        @endif
                        @endforeach
                    </td>
                    <td>
                    @foreach($sections as $section)
                        @if($section->id == $student->s_class_id)
                        {{$section->name}}
                        @endif
                        @endforeach
                    </td>
                    <td style="color:#0000FF; text-decoration:underline;">
                        <a href="/my-child/{{$student->id}}">View Activity</a>
                    </td>
                </tr>
                @endif
                @endforeach
                    <!-- <tr>
                        <td>1</td>
                        <td><img class="rounded-circle" style="height: 40px; width: 40px;" src="" alt="photo"></td>
                        <td>nane</td>
                        <td>admiss</td>
                        <td>class name section</td>
                        <td>test</td>
                        <td class="text-center">
                            <div class="list-icons">
                                <div class="dropdown">
                                    <a href="#" class="list-icons-item" data-toggle="dropdown">
                                        <i class="icon-menu9"></i>
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-left">
                                        <a href="#" class="dropdown-item"><i class="icon-eye"></i> View Profile</a>
                                        <a target="_blank" href="" class="dropdown-item"><i class="icon-check"></i> Marksheet</a>

                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr> -->
                </tbody>
            </table>

        </div>
    </div>
    </div>
    </div>


@endsection
