@extends('layouts.app')

@section('content')
<h5 class="card-title">
    Fees
    <span style="margin-top:-20px" class="d-flex justify-content-end">
    <a href="{{ route('sections.index') }}" class="btn btn-secondary mb-3">Back to Fee Types</a>
</h5>
<form action="{{ route('fees.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="student_id">Student</label>
        <select name="student_id" class="form-control">
            @foreach($students as $student)
                <option value="{{ $student->id }}">{{ $student->firstname }} {{ $student->lastname }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="type">Fee Type</label>
        <input type="text" name="type" class="form-control" value="{{ old('type') }}">
    </div>

    <div class="form-group">
        <label for="total_fee">Total Fee</label>
        <input type="number" name="total_fee" class="form-control" value="{{ old('total_fee') }}">
    </div>

    <div class="form-group">
        <label for="due_date">Due Date</label>
        <input type="date" name="due_date" class="form-control" value="{{ old('due_date') }}">
    </div>

    <div class="form-group">
        <label for="receipt">Receipt</label>
        <input type="text" name="receipt" class="form-control" value="{{ old('receipt') }}">
    </div>

    <div class="form-group">
        <label for="paid_amount">Paid Amount</label>
        <input type="number" name="paid_amount" class="form-control" value="{{ old('paid_amount') }}">
    </div>

    <div class="form-group">
        <label for="status">Status</label>
        <input type="text" name="status" class="form-control" value="{{ old('status') }}">
    </div>

    <div class="form-group">
        <label for="description">Description (optional)</label>
        <textarea name="description" class="form-control">{{ old('description') }}</textarea>
    </div>

    <div class="form-group">
        <button type="submit" style="background-color:#f1d016;" class="btn btn-kprimary">{{ __('Register Fee') }}</button>
    </div>
</form>
@endsection
