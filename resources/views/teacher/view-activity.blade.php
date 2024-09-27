@extends('layouts.app')

@section('content')
    

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
<br>
    <div class="main-display-viewer">

            @if($nowDate == $activity->created_at->format('Y-m-d'))
                
                <div class="viewable-class-holder" id="viewable-holder-{{$activity->id}}">
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
                    <p><strong>Milk Time: </strong>{{$activity->milk_times}} Times</p>
                    @endif
                    @if($activity->milk_finished != '' && $activity->milk_finished = '1')
                    <p><strong>Milk Finished:</strong> Yes</p>
                    @endif
                    @if($activity->breakfast !='' && $activity->breakfast == '1')
                    <p><strong>Breakfast:</strong> {{$activity->breakfast}}</p>
                    <p><strong>Breakfast Quantity:</strong> {{$activity->breakfast_quantity}}</p>
                    <p><strong>Breakfast Finished:</strong> Yes</p>
                    @else
                    <p><strong>Breakfast:</strong> {{$activity->breakfast}}</p>
                    <p><strong>Breakfast Quantity:</strong> {{$activity->breakfast_quantity}}</p>
                    <p><strong>Breakfast Finished:</strong> No</p>
                    @endif
                    @if($activity->lunch !='' && $activity->lunch == '1')
                    <p><strong>Lunch:</strong> {{$activity->lunch}}</p>
                    <p><strong>Lunch Quantity:</strong> {{$activity->lunch_quantity}}</p>
                    <p><strong>Lunch Finished:</strong> Yes</p>
                    @else
                    <p><strong>Lunch:</strong> {{$activity->lunch}}</p>
                    <p><strong>Lunch Quantity:</strong> {{$activity->lunch_quantity}}</p>
                    <p><strong>Lunch Finished:</strong> No</p>
                    @endif
                    @if($activity->snack != '' && $activity->snack_finished)
                    <p><strong>Snacks:</strong> {{$activity->snack}}</p>
                    <p><strong>Snack Quantity:</strong> {{$activity->snack_quantity}}</p>
                    <p><strong>Snack Finished:</strong> Yes</p>
                    @else
                    <p><strong>Snacks:</strong> {{$activity->snack}}</p>
                    <p><strong>Snack Quantity:</strong> {{$activity->snack_quantity}}</p>
                    <p><strong>Snack Finished:</strong> No</p>
                    @endif
                    @if($activity->poop !='')
                    <p><strong>Poop:</strong> {{$activity->poop}} Times</p>
                    <p><strong>Description:</strong> {{$activity->describe_poop}}</p>
                    <p><strong>Diepers Used:</strong> {{$activity->diapers_used}} Diepers</p>
                    @endif
                    @if($activity->nap !='')
                    <p><strong>Nap:</strong> {{$activity->nap}} Times</p>
                    @endif
                    @if($activity->milestones !='')
                    <p><strong>Milestones:</strong> {{$activity->milestones}}</p>
                    @endif
                    @if($activity->general_observation !='')
                    <p><strong>General Observation:</strong> {{$activity->general_observation}}</p>
                    @endif
                </div>
                @endif
        <script>
            const currentDate = new Date();
            
            const year = currentDate.getFullYear();
            const month = String(currentDate.getMonth() + 1).padStart(2, '0');
            const day = String(currentDate.getDate()).padStart(2, '0');
            
            const formattedDate = `${year}-${month}-${day}`;
            
            document.querySelector('.currentDate').textContent = formattedDate;
        </script>
    </div>
@stop
