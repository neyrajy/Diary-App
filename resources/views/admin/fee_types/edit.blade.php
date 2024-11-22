@extends('layouts.app')

@section('title', 'Edit Fee Type')

@section('content')
<div class="card-header">Edit Fee Type</div>
    <form action="{{ route('admin.fee-types.update', $feeType->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Fee Type Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $feeType->name) }}" required>
        </div>

        <div class="form-group">
            <label for="amount">Default Amount</label>
            <input type="number" name="amount" id="amount" class="form-control" value="{{ old('amount', $feeType->amount) }}" step="0.01" required>
        </div>

        <div class="form-group">
            <label for="term_fee_1">Term Fee 1</label>
            <input type="number" name="term_fee_1" id="term_fee_1" class="form-control" value="{{ old('term_fee_1', $feeType->term_fee_1) }}" step="0.01">
        </div>

        <div class="form-group">
            <label for="term_fee_2">Term Fee 2</label>
            <input type="number" name="term_fee_2" id="term_fee_2" class="form-control" value="{{ old('term_fee_2', $feeType->term_fee_2) }}" step="0.01">
        </div>

        <div class="form-group">
            <label for="term_fee_3">Term Fee 3</label>
            <input type="number" name="term_fee_3" id="term_fee_3" class="form-control" value="{{ old('term_fee_3', $feeType->term_fee_3) }}" step="0.01">
        </div>

        <div class="form-group">
            <label for="term_fee_4">Term Fee 4</label>
            <input type="number" name="term_fee_4" id="term_fee_4" class="form-control" value="{{ old('term_fee_4', $feeType->term_fee_4) }}" step="0.01">
        </div>

        <div class="form-group">
            <label for="annual_fee">Annual Fee</label>
            <input type="number" name="annual_fee" id="annual_fee" class="form-control" value="{{ old('annual_fee', $feeType->annual_fee) }}" step="0.01">
        </div>

        <button type="submit" class="btn btn-primary">Update Fee Type</button>
    </form>
@endsection
