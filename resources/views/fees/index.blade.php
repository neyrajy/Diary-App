@extends('layouts.app')

@section('content')
<h5 class="card-title">
    Student Fees Management
    <span style="margin-top:-20px" class="d-flex justify-content-end">
        <a class="btn btn-warning btn-sm" href="{{ route('fees.create') }}">Add Student Fee</a>
    </span>
</h5>  
<table class="table mt-4">
    <thead>
        <tr>
            <th>Student Name</th>
            <th>Type</th>
            <th>Total Fee</th>
            <th>Paid Amount</th>
            <th>Status</th>
            <th>Due Date</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($fees as $fee)
        <tr>
            <td>{{ $fee->student->firstname }} {{ $fee->student->lastname }}</td>
            <td>{{ $fee->type }}</td>
            <td>{{ $fee->total_fee }}</td>
            <td>{{ $fee->paid_amount }}</td>
            <td>{{ $fee->status ?? 'Pending' }}</td>
            <td>{{ $fee->due_date }}</td>
            <td>
                <a href="{{ route('fees.edit', $fee->id) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('fees.destroy', $fee->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection
