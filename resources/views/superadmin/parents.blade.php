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
                            <a class="btn btn-warning btn-sm" href="{{ route('register.parent') }}">Add Parent</a>
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
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($parents as $parent)
                            @foreach($parent->students as $student)
                                <tr>
                                    <td>{{ $parent->id }}</td>
                                    <td>{{ $parent->firstname }} {{ $parent->lastname }}</td>
                                    <td>{{ $student->firstname }} {{ $student->lastname }}</td>
                                    
                                    <td>
                                        @php
                                            $totalPaid = $student->fees->sum('amount_paid');
                                            $totalFees = $student->fees->sum('amount');
                                            $balance = $totalFees - $totalPaid;
                                        @endphp
                                        Amount Paid: {{ $totalPaid }}<br>
                                        Balance: {{ $balance }}
                                    
                                    </td>
                                    <td>{{ $parent->phone }}</td>
                                    <td>{{ $parent->address }}</td>
                                    <td>
                                        @if($parent->verified)
                                            <span class="badge bg-success">Verified</span>
                                        @else
                                            <span class="badge bg-warning">Pending</span>
                                            <form action="{{ route('superadmin.verify-parent', $parent->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('PATCH')
                                                <button style="background-color:#28a745;" type="submit" class="btn btn-success btn-sm">Verify</button>
                                            </form>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('superadmin.edit-parent', $parent->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                    </td>
                                    <td>
                                        <form action="{{ route('superadmin.destroy-parent', $parent->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button style="background-color:#dc3545;" type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        @endforeach   
                        </tbody>
                    </table>
                    <h4>Total Number of Parents: <b>{{ $parentsCount }}</b></h4>
                </div>
            </div>
        </div>
    </div>
@endsection
