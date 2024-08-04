@extends('layouts.app')
@section('content')

<x-success_post_activity />

<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><h1>{{ __('Add') }} {{$user->firstname}}'s {{__('Activity')}}</h1> 
                    </div>
                    
                    <center>
                    <div class="card-body">              
                        <form method="POST" action="/storeactivities" enctype="multipart/form-data" class="card-md-dealer">
                        @csrf
                        <input type="hidden" name="student_id" id="" value="{{$user->id}}">
                        <input type="hidden" name="teacher_name" id="" value="{{Auth::guard('web')->user()->firstname}}">
                        <input type="hidden" name="date_time" id="" class="currentDateValue">
                        <div class="md-5-col-mod">
                            <label for="">{{__('Bottle Feed')}}</label>
                            <br>
                            <select name="milk_bottle_feed" id="">
                                <option value="{{old('milk_bottle_feed')}}">Choose Option</option>
                                <option value="Completed">Completed</option>
                                <option value="Partial">Partial</option>
                                <option value="No">No</option>
                            </select>
                            <br><br>
                            <label for="">{{__('Describe Bottle Feed')}}</label><br>
                            <textarea name="describe_bootle_feed" id=""></textarea>
                        </div>

                        <div class="md-poop-susu-col">
                            <label for="">{{__('Poop or Susu')}}</label><br>
                            <select name="poop_susu" id="">
                                <option value="{{old('poop_susu')}}">Choose Option</option>
                                <option value="0 Time">0 Time</option>
                                <option value="1 Time">1 Time</option>
                                <option value="2 Times">2 Times</option>
                                <option value="3 Times">3 Times</option>
                                <option value="4 Times">4 Times</option>
                                <option value="5 Times">5 Times</option>
                                <option value="More Than 5">More Than 5</option>
                            </select>
                            <br><br>
                            <label for="">{{__('Describe More')}}</label><br>
                            <textarea name="describe_poop_susu" id=""></textarea>
                        </div>

                        <div class="md-nap-col-5">
                            <label for="">{{__('Nap')}}</label><br>
                            <select name="nap" id="">
                                <option value="{{old('nap')}}">Choose Option</option>
                                <option value="0 Time">0 Time</option>
                                <option value="1 Time">1 Time</option>
                                <option value="2 Times">2 Times</option>
                                <option value="3 Times">3 Times</option>
                                <option value="4 Times">4 Times</option>
                                <option value="5 Times">5 Times</option>
                                <option value="More Than 5">More Than 5</option>
                            </select>
                            <br><br>
                            <label for="">{{__('Describe The Nap')}}</label><br>
                            <textarea name="describe_nap" id=""></textarea>
                        </div>

                        <div class="md-meal-times-6">
                            <label for="">{{__('Meals/Food')}}</label><br>
                            <select name="meals" id="">
                                <option value="{{old('meals')}}">Choose Option</option>
                                <option value="Completed">Completed</option>
                                <option value="Partial">Partial</option>
                                <option value="No">No</option>
                            </select>
                            <br><br>
                            <label for="">{{__('Describe The Meal')}}</label><br>
                            <textarea name="describe_meals" id=""></textarea>
                        </div>

                        <div class="md-dieper-7">
                            <label for="">{{__('Dieppers')}}</label><br>
                            <select name="dieppers" id="">
                                <option value="{{old('dieppers')}}">Choose Option</option>
                                <option value="0 Time">0 Time</option>
                                <option value="1 Time">1 Time</option>
                                <option value="2 Times">2 Times</option>
                                <option value="3 Times">3 Times</option>
                                <option value="4 Times">4 Times</option>
                                <option value="5 Times">5 Times</option>
                                <option value="More Than 5">More Than 5</option>
                            </select>
                            <br><br>
                            <label for="">{{__('Describe Dieppers')}}</label><br>
                            <textarea name="describe_dieppers" id=""></textarea>
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