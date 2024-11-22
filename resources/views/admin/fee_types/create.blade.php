@extends('layouts.app')

@section('title', 'Create Fee Type')

@section('content')
<div class="card-header">Create Fee Type</div>
    <form action="{{ route('admin.fee-types.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="class_id">Set Class Fee</label>
            <select id="class_id" class="form-control" name="class_id" required>
                <option value="">Select Class</option>
                @foreach($classes as $class)
                    <option value="{{ $class->id }}">{{ $class->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="name">Fee Type Name</label>
            <input type="text" name="name" id="name" class="form-control" placeholder="Enter Fee Type Name" required>
        </div>

        <div class="form-group">
            <label for="amount">Default Amount</label>
            <input type="number" name="amount" id="amount" class="form-control" placeholder="Enter Default Amount" step="0.01" required>
        </div>

        <div class="form-group">
            <label for="term_fee_1">Term Fee 1</label>
            <input type="number" name="term_fee_1" id="term_fee_1" class="form-control" placeholder="Enter Term Fee 1" step="0.01">
        </div>

        <div class="form-group">
            <label for="term_fee_2">Term Fee 2</label>
            <input type="number" name="term_fee_2" id="term_fee_2" class="form-control" placeholder="Enter Term Fee 2" step="0.01">
        </div>

        <div class="form-group">
            <label for="term_fee_3">Term Fee 3</label>
            <input type="number" name="term_fee_3" id="term_fee_3" class="form-control" placeholder="Enter Term Fee 3" step="0.01">
        </div>

        <div class="form-group">
            <label for="term_fee_4">Term Fee 4</label>
            <input type="number" name="term_fee_4" id="term_fee_4" class="form-control" placeholder="Enter Term Fee 4" step="0.01">
        </div>

        <div class="form-group">
            <label for="annual_fee">Annual Fee</label>
            <input type="number" name="annual_fee" id="annual_fee" class="form-control" placeholder="Enter Annual Fee" step="0.01">
        </div>
        <div class="form-group">
            <button type="submit" style="background-color:#f1d016;" class="btn btn-kprimary">{{ __('Create Fee Type') }}</button>
        </div>
    </form>

@endsection
