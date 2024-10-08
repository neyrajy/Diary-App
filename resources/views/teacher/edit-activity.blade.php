@extends('layouts.app')
@section('content')

<x-success_post_activity />

<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><h1>{{ __('Edit') }} {{__('Activity')}}</h1> 
                    </div>
                    
                    <center>
                    <div class="card-body">         
                        <form method="POST" action="/edit/activity/{{$activity->id}}" enctype="multipart/form-data" class="card-md-dealer">
                        @csrf
                        <input type="hidden" name="student_id" id="" value="{{$activity->student_id}}">
                        <input type="hidden" name="teacher_name" id="" value="{{$activity->teacher_name}}">
                        <input type="hidden" name="date_time" id="" value="{{$activity->date_time}}">
                        <div class="md-5-col-mod">
                            <label for="">{{__('Mood')}}</label>
                            <br>
                            <select name="mood" id="">
                                <option value="{{$activity->mood}}">--select--</option>
                                <option value="happy">Happy</option>
                                <option value="sad">Sad</option>
                                <option value="angry">Angry</option>
                                <option value="neutral">Neutral</option>
                                <option value="excited">Excited</option>
                            </select>
                            <br><br>
                            <label for="">{{__('Describe Learning Activities')}}</label><br>
                            <textarea name="learning_activities" id="" value="{{$activity->learning_activities}}"></textarea>
                            <br><br>
                            <label for="">Lessons Learnt</label><br>
                            <textarea name="lessons_learnt" id="" value="{{$activity->lessons_learnt}}"></textarea>
                            <br><br>
                            <label for="">Needs More Learning Time</label><br>
                            <select name="needs_more_time" id="">
                                <option value="{{$activity->needs_more_time}}">--select--</option>
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                            </select><br><br>
                            <label for="">Nap</label><br>
                            <select name="nap" id="">
                                <option value="{{$activity->nap}}">--select--</option>
                                <option value="1">1 Time</option>
                                <option value="2">2 Times</option>
                                <option value="3">3 Times</option>
                                <option value="4">4 Times</option>
                                <option value="More Than 4"> > 4 Times</option>
                            </select>
                        </div>

                        <div class="md-poop-susu-col">
                            <label for="">{{__('Milk & Bottle Feed Time')}}</label><br>
                            <select name="milk_times" id="">
                                <option value="{{$activity->milk_times}}">--select--</option>
                                <option value="1">1 Time</option>
                                <option value="2">2 Times</option>
                                <option value="3">3 Times</option>
                                <option value="4">4 Times</option>
                                <option value="5">More Than 4 Times</option>
                            </select><br><br>
                            <label for="">Milk & Bottle Feeds Finished</label><br>
                            <select name="milk_finished" id="">
                                <option value="{{$activity->milk_finished}}">--select--</option>
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                            </select>
                            <br><br>
                            <label for="">Snacks</label><br>
                            <input type="text" name="snack" id="" value="{{$activity->snack}}"><br><br>
                            <label for="">Snacks Quantity</label><br>
                            <input type="text" name="snack_quantity" id="" value="{{$activity->snack_quantity}}"><br><br>
                            <label for="">Snacks Finished</label><br>
                            <select name="snack_finished" id="">
                                <option value="{{$activity->snack_finished}}">--select--</option>
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                            </select>
                        </div>

                        <div class="md-nap-col-5">
                            <label for="">{{__('Breakfast')}}</label><br>
                            <input type="text" name="breakfast" id="" value="{{$activity->breakfast}}">
                            <br><br>
                            <label for="">Breakfast Quantity</label><br>
                            <input type="text" name="breakfast_quantity" id="" value="{{$activity->breakfast_quantity}}"><br><br>
                            <label for="">{{__('Breakfast Finished')}}</label><br>
                            <select name="breakfast_finished" id="">
                                <option value="{{$activity->breakfast_finished}}">--select--</option>
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                            </select><br><br>
                        </div>

                        <div class="md-meal-times-6">
                            <label for="">{{__('Lunch')}}</label><br>
                            <input type="text" name="lunch" id="" value="{{$activity->lunch}}">
                            <br><br>
                            <label for="">{{__('Lunch Quantity')}}</label><br>
                            <input type="text" name="lunch_quantity" id="" value="{{$activity->lunch_quantity}}">
                            <br><br>
                            <label for="">Lunch Finished</label><br>
                            <select name="lunch_finished" id="">
                                <option value="{{$activity->lunch_finished}}">--select--</option>
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                            </select><br><br>
                        </div>

                        <div class="md-dieper-7">
                            <div class="min-coop-1">
                                <label for="">{{__('Poop')}}</label><br>
                                <select name="poop" id="">
                                    <option value="{{$activity->poop}}">--select--</option>
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>
                            </div>
 
                            <div class="min-coop-2">
                                <label for="">Dieppers Used</label><br>
                                <select name="diapers_used" id="select-dipper">
                                    <option value="{{$activity->diapers_used}}">--select--</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="More Than 4">> 4</option>
                                </select> 
                            </div>
                            <div class="min-coop-3">
                                <label for="">{{__('Describe Poop')}}</label><br>
                                <input type="text" name="describe_poop" id="" value="{{$activity->describe_poop}}"><br><br>
                            </div>
                            
                        </div>
                        

                            <div class="row-md7">
                                <textarea name="general_observation" id="" value="{{$activity->general_observation}}"></textarea><br><br>
                                <div class="bottom-md7">
                                    <label for="">Photos</label><br>
                                    <input type="file" name="photos" id="" value="{{$activity->photos}}">
                                </div>
                                <div class="bottom-md8">
                                    <label for="">Videos</label><br>
                                    <input type="file" name="videos" id="" value="{{$activity->videos}}"><br><br>
                                </div>
                                <textarea name="milestones" id="" value="{{$activity->milestones}}"></textarea>
                            </div>
                            
                        
                            <div class="row">
                                <div class="col-md-6">
                                    <br>
                                    <button type="submit" style="background-color:#07025d;" class="btn-submit btn-primary">{{ __('Add Activity') }}</button>
                                </div>
                            </div><br>
                        </form>
                    </div>
                    </center> 
                </div>
                
<script>
    const currentDate = new Date();
    
    const year = currentDate.getFullYear();
    const month = String(currentDate.getMonth() + 1).padStart(2, '0');
    const day = String(currentDate.getDate()).padStart(2, '0');
    
    const formattedDate = `${year}-${month}-${day}`;
    
    document.querySelector('.currentDateValue').textContent = formattedDate;
    document.querySelector('.currentDateValue').value = formattedDate;
</script>
            </div>
        </div>
    </div>
@stop