@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"> Add Business Monthly Goal</div>
                <div class="col-md-12">
                    @foreach ($errors->all() as $error)
                    <div class="alert alert-danger">
                        <ul>
                            <li>{{ $error }}</li>
                        </ul>
                    </div>
                    @endforeach @if (Session::has("success"))
                    <div class="alert alert-success">
                        <ul>
                            <li>{{ Session::get("success") }}</li>
                        </ul>
                    </div>
                    @endif
                </div>
                {!! Form::open(['action' => 'BusinessController@monthly_goal','id'=>'form']) !!} 
        {{ Form::token() }}
        <div class="box-body">
            <div class="row">
                {{ Form::hidden('b_id', $inId,array('class' => 'form-control','required'=>'true')) }}
               
                    @foreach($social_platform as $social)
                    <div class="col-md-4 form-group">
                        <label for="monthly_goal-{{ $social->id }}">{{ $social->name }} Goals</label> {{ Form::number('monthly_goal-'.$social->id, '0',array('class' => 'form-control','placeholder'
                            => '0','required'=>'true')) }}
                    </div>
                    @endforeach
                
                <div class="col-md-12 form-group">
                    <label for="monday">Mon</label>{{ Form::hidden('monday', '0', false) }} {{ Form::checkbox('monday', '1', true) }} 
                    <label for="tueday">Tue</label> {{ Form::hidden('tuesday', '0', false) }} {{ Form::checkbox('tuesday', '1', true) }}
                    <label for="wednesday">wed</label>{{ Form::hidden('wednesday', '0', false) }} {{ Form::checkbox('wednesday', '1', true) }} 
                    <label for="thrusday">thr</label>  {{ Form::hidden('thrusday', '0', false) }} {{ Form::checkbox('thrusday', '1', true) }}
                    <label for="friday">fri</label>{{ Form::hidden('friday', '0', false) }} {{ Form::checkbox('friday', '1', true) }} 
                    <label for="saturday">sat</label>{{ Form::hidden('saturday', '0', false) }} {{ Form::checkbox('saturday', '1', true) }} 
                    <label for="sunday">sun</label>{{ Form::hidden('sunday', '0', false) }} {{ Form::checkbox('sunday', '1', true) }} 
                </div>
                <div class="col-md-12 form-group">
                    <label for="start_time">Start Time</label> {{ Form::select('start_time_hr',['01' => '01','02' => '02','03' => '03','04' => '04','05' => '05','06' => '06','07' => '07','08' => '08','09' => '09','10' => '10','11' => '11','12' => '12'] ,array('class' => 'form-control','placeholder'
                    => 'Start time','required'=>'true')) }}
                    {{ Form::select('start_time_min', ['00' => '00','15' => '15','30' => '30','45' => '45'],array('class' => 'form-control','placeholder'
                    => 'Start time','required'=>'true')) }}
                    {{ Form::select('start_time_am', ['AM' => 'AM','PM' => 'PM'],array('class' => 'form-control','placeholder'
                    => 'Start time','required'=>'true')) }}
                </div>
                <div class="col-md-12 form-group">
                    
                    <label for="end_time">End Time</label> {{ Form::select('end_time_hr',['01' => '01','02' => '02','03' => '03','04' => '04','05' => '05','06' => '06','07' => '07','08' => '08','09' => '09','10' => '10','11' => '11','12' => '12'] ,array('class' => 'form-control','placeholder'
                    => 'End time','required'=>'true')) }}
                    {{ Form::select('end_time_min', ['00' => '00','15' => '15','30' => '30','45' => '45'],array('class' => 'form-control','placeholder'
                    => 'End time','required'=>'true')) }}
                    {{ Form::select('end_time_am', ['AM' => 'AM','PM' => 'PM'],array('class' => 'form-control','placeholder'
                    => 'End time','required'=>'true')) }}
                </div>

                <div class="col-md-12 form-group">
                    
                    <label for="max_post">Max. Posts</label> {{ Form::select('max_post',['1' => '1','2' => '2','3' => '3','4' => '4','5' => '5'] ,array('class' => 'form-control','placeholder'
                    => 'Max Post','required'=>'true')) }}
                </div>

                <div class="col-md-12 form-group">
                    
                    <label for="time_zone">Time Zone</label> {{ Form::select('time_zone',$timezonelist ,array('class' => 'form-control','placeholder'
                    => 'Time Zone','required'=>'true')) }}
                </div>
                
                <div class="col-md-12 form-group">
                    {{ Form::submit('Next',array('class' => 'btn btn-primary')) }}
                </div>
            </div>
        </div>
        {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
