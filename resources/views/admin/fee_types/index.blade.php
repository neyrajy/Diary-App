@extends('layouts.app')

@section('content')
<h5 class="card-header">Fee Types  <span style="margin-top:-20px" class="d-flex justify-content-end"> 
        <a class="btn btn-warning btn-sm" href="{{ route('admin.fee-types.create') }}">Add Fee Type</a> </span></h5>

    <table class="table">
    <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Amount</th>
            <th>Annual Fee</th>
            <th>Term 1 Fee</th>
            <th>Term 2 Fee</th>
            <th>Term 3 Fee</th>
            <th>Term 4 Fee</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($feeTypes as $feeType)
            <tr>
                <td>{{ $feeType->id }}</td>
                <td>{{ $feeType->name }}</td>
                <td>{{ $feeType->amount }}</td>
                <td>{{ $feeType->annual_fee ?? ($feeType->term_fee_1 + $feeType->term_fee_2 + $feeType->term_fee_3 + $feeType->term_fee_4) }}</td>
                <td>{{ $feeType->term_fee_1 }}</td>
                <td>{{ $feeType->term_fee_2 }}</td>
                <td>{{ $feeType->term_fee_3 }}</td>
                <td>{{ $feeType->term_fee_4 }}</td>
                <td>
                   <a href="{{ route('admin.fee-types.edit', $feeType) }}" title="Edit">
                        <i class="fas fa-edit"></i> <!-- Edit icon -->
                    </a>

                    <form action="{{ route('admin.fee-types.destroy', $feeType) }}" method="POST" style="display: inline;" onsubmit="return confirm('Are you sure you want to delete this fee type?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" style="background: none; border: none; color: inherit;">
                            <i class="fas fa-trash-alt" title="Delete"></i> <!-- Trash icon -->
                        </button>
                    </form>
                </td>

            </tr>
        @endforeach
    </tbody>
</table>
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
@endsection
