@extends('layouts.app')

@section('content')
    <h5 class="card-header">Manage Student Fees  <span style="margin-top:-20px" class="d-flex justify-content-end"> 
    <a class="btn btn-warning btn-sm" href="{{ route('admin.fee-types.create') }}">Add Fee Type</a>&nbsp; &nbsp;     
    <a class="btn btn-warning btn-sm" href="{{ route('admin.fees.create') }}">Add Fee for Student</a> </span></h5>
          
    <!-- <table class="table">
    <thead>
        <tr>
            <td>#</td>
            <th>Student Name</th>
            <th>Fee Type</th>
            <th>Paid Amount</th>
            <th>Status</th>
            <th>Due Date</th>
            <th>Receipt <i class="fa fa-print"></i></th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($fees as $fee)
            <tr>
                <td>{{ $fee->id }}</td>
                <td>{{ $fee->student->firstname }} {{ $fee->student->secondname }} {{ $fee->student->lastname }}</td>
                <td>{{ $fee->feeType->name }}</td>
                
                <td>{{ $fee->paid_amount }}</td>
                <td>
                    {{ ucfirst($fee->status) }}
                </td>
                
                <td>{{ $fee->due_date }}</td>
                <td>
                    <a href="{{ route('admin.fees.receipt', $fee->id) }}" target="_blank">{{ $fee->receipt }}</a>
                </td>
                <td>
                    <a href="{{ route('admin.fees.show', $fee) }}" class="text-primary">
                        <i class="fas fa-eye"></i>
                    </a>
                    <a href="{{ route('admin.fees.edit', $fee) }}" class="text-warning">
                        <i class="fas fa-edit"></i>
                    </a>
                    <form action="{{ route('admin.fees.destroy', $fee) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-link text-danger" onclick="return confirm('Are you sure you want to delete this fee?')">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table> -->

<table class="table">
    <thead>
        <tr>
            <th>#</th>
            <th>Student Name</th>
            <th>Adm No</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($students as $student)
            <tr>
               <td>{{ $loop->iteration }}</td>
               <td>{{ $student->firstname }} {{ $student->lastname }}</td>
               <td> {{ $student->adm_no }}</td>
               <td><a href="/admin/student-fees/{{ $student->id }}"><i class="fa fa-eye"></i> View</a></td>
            </tr>
        @endforeach
    </tbody>
</table>

@endsection
