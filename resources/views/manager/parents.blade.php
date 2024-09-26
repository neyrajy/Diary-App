@extends('layouts.app')

@section('content')
    <div class="row py-3"></div>

    <div class="row mt-4">
        <!-- Parents Table -->
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">
                        Parents
                        <span style="margin-top:-20px" class="d-flex justify-content-end">
                            <!-- <a class="btn btn-warning btn-sm" href="{{ route('register.parent') }}">Add Parent</a> -->
                             <br>
                        </span>
                    </h5>
                    <table class="table table-responsive table-striped">
                        <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Parent Name</th>
                                <th>Child's Name</th>
                                <th>Fees Status</th>
                                <th>Mobile Phone</th>
                                <th>Address</th>
                                <th>Verified</th>
                                <!-- <th>Action</th> -->
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($parents as $parent)
                                <tr>
                                    <td>{{$parent->id}}</td>
                                    <td>{{$parent->firstname}}</td>
                                    <td>
                                    @foreach($students as $student)
                                    @if($student->id == $parent->student)
                                    
                                        {{$student->firstname}}

                                    
                                    @else
                                        
                                    @endif

                                    @if($student->id == $parent->student2)
                                         & {{$student->firstname}}
                                    @endif
                                    
                                    @endforeach
                                    </td>
                                    <td>
                                       @foreach($fees as $fee)
                                       @if($parent->student == $fee->student_id)
                                       <span>Tsh{{number_format($fee->amount,2)}}</span>
                                       @endif
                                       @endforeach
                                    </td>
                                    <td>{{ $parent->phone }}</td>
                                    <td>{{ $parent->address }}</td>
                                    <td>
                                        @if($parent->verified)
                                            <span class="badge bg-success">Verified</span>
                                        @else
                                            <span class="badge bg-warning">Pending</span>
                                        @endif
                                    </td>
                                    
                                </tr>
                        @endforeach   
                        </tbody>
                    </table>
                    <h4>Total Number of Parents: <b>{{ $parentsCount }}</b></h4> <div class="paginate-builder">{{$parents->links()}}</div>
                </div>
            </div>
        </div>
    </div>
@endsection
