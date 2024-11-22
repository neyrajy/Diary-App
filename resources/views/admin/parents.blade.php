@extends('layouts.app')

@section('content')
<h5 class="card-header">Parents  <span style="margin-top:-20px" class="d-flex justify-content-end"> 
        <a class="btn btn-warning btn-sm" href="{{ route('register.parent') }}">Add Parent</a> </span></h5>
   
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
                <th>View</th>
                <th>Edit</th>
                <th>Delete</th>
                <!-- <th>Action</th> -->
            </tr>
        </thead>
        <tbody>
        @foreach($parents as $parent)
                <tr>
                    <td>{{$parent->id}}</td>
                    <td>{{$parent->firstname}} {{$parent->lastname}}</td>
                    <td>
                    @foreach($students as $student)
                    @if($student->id == $parent->student)
                        {{$student->firstname}}  {{$student->lastname}}
                        @else
                        @endif
                    @if($student->id == $parent->student2)
                            & {{$student->firstname}}   {{$student->lastname}}
                    @endif                                    
                    @endforeach
                    </td>
                
                    <td>
                        @foreach($fees as $fee)
                            @if($parent->student == $fee->student_id)
                                <div>Total: {{ number_format($fee->total_fee, 2) }} Tsh</div>
                                <div>Paid: {{ number_format($fee->paid_amount, 2) }} Tsh</div>
                                @if($fee->status == 'Paid')
                                    <div><span class="badge bg-success">Paid</span></div>
                                @else
                                    <div>Remaining: {{ number_format($fee->remaining_balance, 2) }} Tsh</div>
                                    <div><span class="badge bg-warning">Partially Paid</span></div>
                                @endif
                            @endif
                        @endforeach
                    </td>
                    </td>
                    <td>{{ $parent->phone }}</td>
                    <td>{{ $parent->address }}</td>
                    <td>
                        @if($parent->verified)
                            <span class="badge bg-success">Verified</span>
                        @else
                            <span class="badge bg-warning">Pending</span>
                            <form action="{{ route('admin.verify-parent', $parent->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('PATCH')
                                <button style="background-color:#28a745;" type="submit" class="btn btn-success btn-sm">Verify</button>
                            </form>
                        @endif
                    </td>
                    <td style="text-align:center; color:#0000FF; text-decoration:none;"><a href="/admin/view-parent/{{$parent->id}}"><i class="fa fa-eye"></i></a></td>
                
                    <td>
                        <a href="{{ route('admin.edit-parent', $parent->id) }}" class="btn btn-primary btn-sm">Edit</a>
                    </td>
                    <td>
                        <form action="{{ route('admin.destroy-parent', $parent->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button style="background-color:#dc3545;" type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                    </tr>
        @endforeach   
        </tbody>
    </table>
    <h4>Total Number of Parents: <b>{{ $parentsCount }}</b></h4> <div class="paginate-builder">{{$parents->links()}}</div>

@endsection
