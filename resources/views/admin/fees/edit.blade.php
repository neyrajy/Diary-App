
@extends('layouts.app')

@section('content')
<div class="card-header">Edit Student Fee</div>
<form action="{{ route('admin.fees.update', $fee->id) }}" method="POST">
        @csrf
        @method('PUT')
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
        <div class="form-group">
            <label for="student_id">Student</label>
            <select name="student_id" class="form-control" required>
                @foreach($students as $student)
                    <option value="{{ $student->id }}" {{ $student->id == $fee->student_id ? 'selected' : '' }}>
                        {{ $student->firstname }} {{ $student->secondname }} {{ $student->lastname }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="fee_type_id">Fee Type</label>
            <select name="fee_type_id" id="fee_type_id" class="form-control" required>
                <option value="">Select Fee Type</option>
                @foreach ($feeTypes as $feeType)
                    <option value="{{ $feeType->id }}"
                        {{ $fee->fee_type_id == $feeType->id ? 'selected' : '' }}>
                        {{ $feeType->name }} - {{ $feeType->amount }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="fee_type_id">Fee Type</label>
            <select name="fee_type_id" id="fee_type_id" class="form-control" required>
                <option value="">Select Fee Type</option>
                @foreach ($feeTypes as $feeType)
                    @if ($feeType->annual_fee)
                        <option value="{{ $feeType->id }}">
                            Annual Fee: {{ number_format($feeType->annual_fee, 2) }}
                        </option>
                    @endif
                    @if ($feeType->term_fee_1)
                        <option value="{{ $feeType->id }}">
                            Term 1 Fee: {{ number_format($feeType->term_fee_1, 2) }}
                        </option>
                    @endif
                    @if ($feeType->term_fee_2)
                        <option value="{{ $feeType->id }}">
                            Term 2 Fee: {{ number_format($feeType->term_fee_2, 2) }}
                        </option>
                    @endif
                    @if ($feeType->term_fee_3)
                        <option value="{{ $feeType->id }}">
                            Term 3 Fee: {{ number_format($feeType->term_fee_3, 2) }}
                        </option>
                    @endif
                    @if ($feeType->term_fee_4)
                        <option value="{{ $feeType->id }}">
                            Term 4 Fee: {{ number_format($feeType->term_fee_4, 2) }}
                        </option>
                    @endif
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="paid_amount">Paid Amount</label>
            <input type="number" name="paid_amount" class="form-control" value="{{ $fee->paid_amount }}" required>
        </div>


        <div class="form-group">
            <label for="due_date">Due Date</label>
            <input type="date" name="due_date" class="form-control" value="{{ $fee->due_date }}" required>
        </div>

        <div class="form-group">
            <label for="paid_date">Paid Date</label>
            <input type="date" name="paid_date" class="form-control" value="{{ $fee->paid_date }}">
        </div>
        <div class="form-group">
            <button type="submit" style="background-color:#f1d016;" class="btn btn-kprimary">{{ __('Update Fees') }}</button>
        </div>
    </form>
@endsection
