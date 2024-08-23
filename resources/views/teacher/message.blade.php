@extends('layouts.app')

@section('content')
<div class="row-modal mt-3">
    <!-- Calendar -->
      <!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Select2 CSS -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<!-- Select2 JS -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <div class="colom-md-6">
        <div class="card">
            <div class="card-body">
                <h1>{{__('Messages')}}</h1>
                <div id="calendar" class="calendar-col-5">
                <form action="/messages" method="POST" class="event-callendar-col mt-2">
                    @csrf
                    <input type="hidden" name="sender_name" value="{{ Auth::guard('web')->user()->lastname }}">

                    <div class="left-opt-col-5">
                        <label for="student-select">Receiver</label><br>
                        <select name="receiver" id="student-select" style="width: 100%;">
                            <option value="">--select child--</option>
                            @foreach($students as $student)
                                <option value="{{ $student->id }}">{{ $student->firstname }}</option>
                            @endforeach
                        </select>
                        @error('receiver')
                            <br><span>{{ __('Select child!') }}</span>
                        @enderror
                    </div>

                    <div class="middl-event-col-6">
                        <label for="message_category">Message Category</label><br>
                        <select name="message_category" id="message_category" style="width: 100%;">
                            <option value="">--select category--</option>
                            <option value="Nap">Nap</option>
                            <option value="Dieppers">Dieppers</option>
                        </select>
                        @error('message_category')
                            <br><span>{{ __('Select message category!') }}</span>
                        @enderror
                    </div><br><br><br><br>

                    <div class="right-event-col-7">
                        <label for="message_body">Message</label><br>
                        <textarea name="message_body" id="message_body" style="width: 100%;"></textarea>
                        @error('message_body')
                            <br><span>{{ __('Message body is required!') }}</span>
                        @enderror
                    </div><br>

                    <button type="submit" class="submit-event-recorder" style="background-color: #007BFF;"><i class="fa fa-paper-plane"></i> Send</button>
                    <button type="button" class="view-notif" style="color: #FFF; background-color: orange;">
                        <a href="/teacher/view-message" style="color: #FFF; text-decoration: none;"><i class="fa fa-eye"></i>View Messages</a>
                    </button>

                </form>

                <script>
                    $(document).ready(function() {
                        // Initialize Select2
                        $('#student-select').select2({
                            placeholder: "--select child--",
                            allowClear: true
                        });
                    });
                </script>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
