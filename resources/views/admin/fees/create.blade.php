@extends('layouts.app') 

@section('content')
<div class="card-header">Create Student Fee </div>
    <!-- Display Validation Errors -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Form for creating a new fee -->
    <form action="{{ route('admin.fees.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="class_id">Class</label>
            <select id="class_id" class="form-control" name="class_id" required>
                <option value="">Select Class</option>
                @foreach($classes as $class)
                    <option value="{{ $class->id }}">{{ $class->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="section_id">Section</label>
            <select id="section_id" class="form-control" name="section_id" required>
                <option value="">Select Section</option>
                @foreach($sections as $section)
                    <option value="{{ $section->id }}">{{ $section->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="student_id">Student</label>
            <select name="student_id" id="student_id" class="form-control" required>
                <option value="">Select Student</option>
                @foreach ($students as $student)
                    <option value="{{ $student->id }}">{{ $student->firstname }} {{ $student->secondname }} {{ $student->lastname }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="fee_type_id">Fee Type</label>
            <select name="fee_type_id" id="fee_type_id" class="form-control" required>
                <option value="">Select Fee Type</option>
                @foreach ($feeTypes as $feeType)
                    <option value="{{ $feeType->id }}">{{ $feeType->name }} - {{ $feeType->amount }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="fee_type_id">Fee Type</label>
            <select name="fee_type_id" id="fee_type_id" class="form-control" required>
                <option value="">Select Fee Term</option>
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
            <input type="number" name="paid_amount" class="form-control" value="{{ old('paid_amount') }}" required>
        </div>

       
        <div class="form-group">
            <label for="paid_date">Paid Date</label>
            <input type="date" name="paid_date" class="form-control" value="{{ old('paid_date') }}">
        </div>

        <div class="form-group">
            <label for="due_date">Due Date</label>
            <input type="date" name="due_date" class="form-control" value="{{ old('due_date') }}" required>
        </div>
        <div class="form-group">
            <button type="submit" style="background-color:#f1d016;" class="btn btn-kprimary">{{ __('Save Fee') }}</button>
        </div>
    </form>
@endsection
