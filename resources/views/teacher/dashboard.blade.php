@extends('layouts.app')

@section('content')
    <div class="rower-wrapper py-3">
        <div class="col-md-wrapper" id="col-md-3-wrapper">
            <div class="card text-white bg-primary" id="card-texter-wrapper">
                <div class="card-body">
                    <h5 class="card-title">Parents</h5>
                    <p class="card-text">{{ $parentCounter }}</p>
                    <a href="/teacher/parents" class="btn btn-light">View All</a>
                </div>
            </div>
            <div class="card-wrapper text-white bg-danger" id="card-wrapper-ajax">
                <div class="card-body">
                    <h5 class="card-title">Students</h5>
                    <p class="card-text">{{ count($students) }}</p>
                    <a href="/teacher/students" class="btn btn-light">View All</a>
                </div>
            </div>
            <div class="col-md-ajax">
                <div class="card-body-ajax text-white bg-warning">
                    <div class="card-body">
                        <h5 class="card-title">Student Activities</h5>
                        <p class="card-text">{{ count($activities) }}</p>
                        <a href="/teacher/drivers" class="btn btn-light">View All</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <br><br><br><br><br><br>
    <form action="/teacher" method="GET" class="wrapper-ajax-search">
        @csrf
        <input type="text" name="search" id="input-search" placeholder="Search a student ...."><button type="submit" class="search-btn">Search</button>
    </form><br><br>

    <script>
        document.addEventListener('DOMContentLoaded', function(){
            document.querySelector('.wrapper-ajax-search').addEventListener('submit', function(event){
                event.preventDefault();
                const inoutSearch = document.getElementById('input-search').value;

                if(inoutSearch === ""){
                    alert("This field can not be empty!");
                }
            });
        });
    </script>

    <div class="main-display-viewer">
        <div class="sub-min-viewer">
            <h1 class="specifier-activ">{{ __('Today') }} <span class="currentDate"></span> | {{ __('Students Activities') }}</h1>
            <a href="/activity" class="show-form-activ" style="text-decoration:none;"><i class="fa fa-plus"></i> {{ __('Add Activity') }}</a><br>
        </div>

        <table class="md-data-tabler">
            <tr class="head-tr-mod">
                <th>Id</th>
                <th>{{ __('Student Name') }}</th>
                <th>{{ __('Activities') }}</th>
                <th>{{__('Action')}}</th>
            </tr>
            
            @if(count($student_activities) == 0)
            <p>No activity today</p>
            @endif


            @foreach($student_activities as $activity)
            @if($nowDate == $activity->created_at->format('Y-m-d'))
                <tr class="data-tr-mod">
                    <td>{{$activity->id}}</td>
                    <td>
                        @foreach($students as $student)
                            @if($student->id == $activity->student_id && Auth::guard('web')->user()->class_name == $student->s_class_id)
                                <h1>{{ $student->firstname }}</h1>
                            @endif
                        @endforeach
                    </td>
                    <td class="data-tr-td">
                        <button class="view-btn-eye"  onclick="showDataDeep(event, $activity->id)" style="text-align:center; width:100%; background-color:#007BFF; color:#FFFFFF; padding:6px; border:none; cursor:pointer; border-radius:4px;"><a href="/teacher/view-activity/{{$activity->id}}"><i class="fa fa-eye"></i> View Activity</a></button>
                        <!-- <div class="viewable-class-holder" id="viewable-holder-{{$activity->id}}" hidden>
                            @if($activity->mood !='')
                            <p><strong>Mood:</strong> {{$activity->mood}}</p>
                            @endif
                            @if($activity->learning_activities !='')
                            <p><strong>Learning Activities:</strong> {{$activity->learning_activities}}</p>
                            @endif
                            @if($activity->lessons_learnt !='')
                            <p><strong>Learnt Lessons:</strong> {{$activity->lessons_learnt}}</p>
                            @endif
                            @if($activity->needs_more_time !='' && $activity->needs_more_time =='1')
                            <p><strong>{{__('Student Needs More Time')}}</strong>: Yes</p>
                            @elseif($activity->needs_more_time =='0')
                            <p><strong>{{__('Student does not need more time')}}</strong>: No</p>
                            @endif
                            @if($activity->milk_times !='')
                            <p><strong>Milk Time: </strong>{{$activity->milk_times}}</p>
                            @endif
                            @if($activity->milk_finished != '')
                            <p><strong>Milk Finished:</strong> {{$activity->milk_finished}}</p>
                            @endif
                            @if($activity->breakfast !='')
                            <p><strong>Breakfast:</strong> {{$activity->breakfast}}</p>
                            <p><strong>Breakfast Quantity:</strong> {{$activity->breakfast_quantity}}</p>
                            <p><strong>Breakfast Finished:</strong> {{$activity->breakfast_finished}}</p>
                            @endif
                            @if($activity->lunch !='')
                            <p><strong>Lunch:</strong> {{$activity->lunch}}</p>
                            <p><strong>Lunch Quantity:</strong> {{$activity->lunch_quantity}}</p>
                            <p><strong>Lunch Finished:</strong> {{$activity->lunch_finished}}</p>
                            @endif
                            @if($activity->snack != '')
                            <p><strong>Snacks:</strong> {{$activity->snack}}</p>
                            <p><strong>Snack Quantity:</strong> {{$activity->snack_quantity}}</p>
                            <p><strong>Snack Finished:</strong> {{$activity->snack_finished}}</p>
                            @endif
                            @if($activity->poop !='')
                            <p><strong>Poop:</strong> {{$activity->poop}}</p>
                            <p><strong>Description:</strong> {{$activity->describe_poop}}</p>
                            <p><strong>Diepers Used:</strong> {{$activity->diapers_used}}</p>
                            @endif
                            @if($activity->nap !='')
                            <p><strong>Nap:</strong> {{$activity->nap}} Time(s)</p>
                            @endif
                            @if($activity->milestones !='')
                            <p><strong>Milestones:</strong> {{$activity->milestones}}</p>
                            @endif
                            @if($activity->genaral_observation !='')
                            <p><strong>General Observation:</strong> {{$activity->genaral_observation}}</p>
                            @endif
                        </div> -->
                    </td>
                    <td>
                        <button class="view-btn-eye" style="text-align:center; width:100%; background-color:#007BFF; color:#FFFFFF; padding:6px; border:none; cursor:pointer; border-radius:4px;"><a href="/teacher/edit-activity/{{$activity->id}}"><i class="fa fa-pen"></i> Edit Activity</a></button>
                    </td>
                </tr>
                @endif
            @endforeach
        </table>

        <div class="paginate-builder">
            {{$student_activities->links()}}
        </div>

        <style>
            .hidden{
                display:none;
            }
        </style>

        <script>
            const currentDate = new Date();
            
            const year = currentDate.getFullYear();
            const month = String(currentDate.getMonth() + 1).padStart(2, '0');
            const day = String(currentDate.getDate()).padStart(2, '0');
            
            const formattedDate = `${year}-${month}-${day}`;
            
            document.querySelector('.currentDate').textContent = formattedDate;
        </script>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                window.showDataDeep = function(event, actId) {
                    event.preventDefault();
                    const actbuilder = document.getElementById(`viewable-holder-${actId}`);
                    if (actbuilder) { 
                        if (actbuilder.hidden) {
                            actbuilder.hidden = false; 
                        } else {
                            actbuilder.hidden = true; 
                        }
                    } else {
                        console.error('Element not found:', `viewable-holder-${actId}`);
                    }
                }
            });

        </script>
    </div>
    <center>
        <div class="paginate-builder">
            {{$student_activities->links()}}
        </div>
    </center>
@stop
