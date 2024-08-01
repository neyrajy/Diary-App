@extends('layouts.app')

@section('content')
<div class="row py-3"></div>
<div class="row mt-4">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Welcome, {{ $user->firstname }} {{ $user->lastname }}!</h5>
                @if(!$user->verified)
                    <div class="alert alert-info">
                        <p>Your account is currently pending verification by the admin.
                        Once verified, you will be able to view your child's activity.</p>
                    </div>
                @else
                    <div class="alert alert-success notification">
                        <p>Your account has been verified! You can now view your child's activity.</p>
                    </div>
                    @include('parent.child-activity')
                @endif
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var notification = document.querySelector('.notification');
        if (notification) {
            setTimeout(function() {
                notification.style.display = 'none';
            }, 5000); // 5 seconds
        }
    });
</script>

@stop
