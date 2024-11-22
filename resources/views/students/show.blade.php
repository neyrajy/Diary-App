@extends('layouts.app')

<link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">

@section('content')
    <!-- Nav tabs -->
    <ul class="nav nav-tabs" id="studentTab" role="tablist">
        <li class="nav-item" role="presentation">
            <a class="nav-link active" id="profile-tab" data-bs-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="true">Student Profile</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" id="activities-tab" data-bs-toggle="tab" href="#activities" role="tab" aria-controls="activities" aria-selected="false">Daily Activities</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" id="fees-tab" data-bs-toggle="tab" href="#fees" role="tab" aria-controls="fees" aria-selected="false">Fees</a>
        </li>
    </ul>

    <!-- Tab content -->
    <div class="tab-content mt-3" id="studentTabContent">
        <!-- Student Profile Tab -->
        <div class="tab-pane" id="profile" role="tabpanel" aria-labelledby="profile-tab">
            <div class="card">
                <div class="card-header">Student Profile</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            @if($student->photo)
                                <img class="rounded-circle" style="height: 130px; width: 130px;" src="{{ asset('storage/' . $student->photo) }}" alt="Student Photo" />
                                @else
                                <p>No photo available</p>
                            @endif
                            <br>
                            <strong>{{ ucfirst(strtolower($student->firstname)) }} {{ ucfirst(strtolower($student->secondname)) ?? 'N/A' }} {{ ucfirst(strtolower($student->lastname)) }}</strong>                           
                        </div>
                        <div class="col-md-4 mt-3">
                            <p><strong>Adm No:</strong> {{ $student->adm_no ?? 'N/A' }}</p>
                            <p><strong>Class:</strong> {{ $student->s_class->name ?? 'N/A' }}</p>
                            <p><strong>Section:</strong> {{ $student->section->name ?? 'N/A' }}</p>
                            <p><strong>Session:</strong> {{ $student->session }}</p>
                            <p><strong>Admission Date:</strong> {{ $student->admission_date ?? 'N/A' }}</p>
                        </div>
                        <div class="col-md-4 mt-3">
                            <p><strong>Gender:</strong> {{ ucfirst(strtolower($student->gender)) ?? 'N/A' }}</p>
                            <p><strong>Date of Birth:</strong> {{ $student->age ?? 'N/A' }}</p>
                            <p><strong>Blood Group:</strong> {{ $student->blood_group->name ?? 'N/A' }}</p>
                            <p><strong>Graduated:</strong> {{ $student->grad ? 'Yes' : 'No' }}</p>
                            <p><strong>Graduation Date:</strong> {{ $student->grad_date ?? 'N/A' }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <style>
            .tab-panel{
                display:none;
            }
            #profile{
                display:block;
            }
            .tab-paneel{
                display:none;
            }
        </style>

        <!-- Daily Activities Tab -->
        <div class="tab-panel" id="activities" role="tabpanel" aria-labelledby="activities-tab">
            <div class="card">
                <div class="card-header">Daily Activities</div>
                <div class="card-body">
                    @if($activities)
                        <div class="row">
                            <div class="col-md-4">
                                <p><strong>Date/Time:</strong> {{ $activities->date_time }}</p>
                            </div>
                            <div class="col-md-4">
                                <p><strong>Mood:</strong> {{ $activities->mood }}</p>
                            </div>
                            <div class="col-md-4">
                                <p><strong>Learning Activities:</strong> {{ $activities->learning_activities }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <p><strong>Lessons Learnt:</strong> {{ $activities->lessons_learnt }}</p>
                            </div>
                            <div class="col-md-4">
                                <p><strong>Needs More Time:</strong> {{ $activities->needs_more_time ? 'Yes' : 'No' }}</p>
                            </div>
                            <div class="col-md-4">
                                <p><strong>General Observation:</strong> {{ $activities->general_observation }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <p><strong>Milk Times (Baby Class only):</strong> {{ $activities->milk_times ?? 'N/A' }}</p>
                                <p><strong>Milk Finished:</strong> {{ $activities->milk_finished ? 'Yes' : 'No' }}</p>
                            </div>
                            <div class="col-md-4">
                                <p><strong>Breakfast:</strong> {{ $activities->breakfast }}</p>
                                <p><strong>Breakfast Quantity:</strong> {{ $activities->breakfast_quantity }}</p>
                                <p><strong>Breakfast Finished:</strong> {{ $activities->breakfast_finished ? 'Yes' : 'No' }}</p>
                            </div>
                            <div class="col-md-4">
                                <p><strong>Lunch:</strong> {{ $activities->lunch }}</p>
                                <p><strong>Lunch Quantity:</strong> {{ $activities->lunch_quantity }}</p>
                                <p><strong>Lunch Finished:</strong> {{ $activities->lunch_finished ? 'Yes' : 'No' }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <p><strong>Snack:</strong> {{ $activities->snack }}</p>
                                <p><strong>Snack Quantity:</strong> {{ $activities->snack_quantity }}</p>
                                <p><strong>Snack Finished:</strong> {{ $activities->snack_finished ? 'Yes' : 'No' }}</p>
                            </div>
                            <div class="col-md-4">
                                <p><strong>Poop:</strong> {{ $activities->poop ? 'Yes' : 'No' }}</p>
                                <p><strong>Description of Poop:</strong> {{ $activities->describe_poop }}</p>
                            </div>
                            <div class="col-md-4">
                                <p><strong>Nap:</strong> {{ $activities->nap }} Times</p>
                                <p><strong>Diapers Used (Baby Class only):</strong> {{ $activities->diapers_used ?? 'N/A' }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <p><strong>Photos:</strong></p>
                                @if($activities->photos)
                                    <img src="{{ asset('storage/' . $activities->photos) }}" alt="Activity Photo" class="img-fluid img-thumbnail" />
                                @else
                                    <p>No photos available</p>
                                @endif
                            </div>
                            <div class="col-md-6">
                                <p><strong>Videos:</strong></p>
                                @if($activities->videos)
                                    <video src="{{ asset('storage/' . $activities->videos) }}" controls class="img-fluid"></video>
                                @else
                                    <p>No videos available</p>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <p><strong>Milestones Achieved:</strong> {{ $activities->milestones }}</p>
                            </div>
                        </div>
                    @else
                        <p>No activities recorded for this student.</p>
                    @endif
                </div>
            </div>
        </div>

        <!-- Fees Tab -->
        <div class="tab-paneel" id="fees" role="tabpanel" aria-labelledby="fees-tab">
            <div class="card">
                <div class="card-header">Fees Information</div>
                <div class="card-body">
                    @if($fees)
                        <div class="row">
                            <div class="col-md-10">
                                <h2><strong>{{ ucfirst(strtolower($student->firstname)) }} {{ ucfirst(strtolower($student->secondname)) ?? 'N/A' }} {{ ucfirst(strtolower($student->lastname)) }}</strong> Fee Status: <b><i> {{ ucfirst($fees->status) }}</i></b></h2>
                                <p><strong>On {{ $fees->paid_date }} paid {{ $fees->paid_amount }}/= TZS, for {{ $fees->feeType->name}} to {{ $fees->due_date }}</strong></p>
                            </div>
                        </div>
                    @else
                        <p>No fee information available for this student.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>

<script>
    document.getElementById("activities-tab").addEventListener('click', function(event){
        event.preventDefault();
        const activitiesClass = document.querySelector('.tab-panel');
        activitiesClass.style.display='block';
        document.getElementById("profile").style.display='none';
        const feeView = document.querySelector('.tab-paneel');
        feeView.style.display='none';
    });

    document.getElementById("profile-tab").addEventListener('click', function(event){
        event.preventDefault();
        const activitiesClass = document.querySelector('.tab-panel');
        activitiesClass.style.display='none';
        document.getElementById("profile").style.display='block';
        const feeView = document.querySelector('.tab-paneel');
        feeView.style.display='none';
    });
    document.getElementById("fees-tab").addEventListener('click', function(event){
        event.preventDefault();
        const feeView = document.querySelector('.tab-paneel');
        feeView.style.display='block';
        document.getElementById("profile").style.display='none';
        const activitiesClass = document.querySelector('.tab-panel');
        activitiesClass.style.display='none';
    })
</script>
@endsection

<!-- Ensure scripts are loaded in the correct order -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.min.js"></script>
