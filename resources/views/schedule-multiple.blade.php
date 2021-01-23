@extends('layouts.master')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.min.css"
    rel="stylesheet" />
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"> Schedule Multiple Posts</div>
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
                {!! Form::open() !!}
                {{ Form::token() }}

                @foreach($posts as $key => $post)
                <div class="box-body">
                    <div class="row">
                        {{ Form::hidden('post_id',$post->id ,array('class' => 'form-control','required'=>'true')) }}

                        <div class="col-md-12 form-group">
                            <h3>{{$key+1}} <label for="">{{$post->title}}</label></h3>
                        </div>

                        <div class="col-md-6 form-group">
                            <label for="schedule_status">Approve Schedule Status</label>
                            {{ Form::hidden('schedule_status-'.$post->id, '0', false) }}
                            {{ Form::checkbox('schedule_status-'.$post->id,  '1', true) }}
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="post_status">Approve Post Status</label>
                            {{ Form::hidden('post_status-'.$post->id, '0', false) }}
                            {{ Form::checkbox('post_status-'.$post->id,  '1', true) }}
                        </div>
                        <div class="col-md-12 form-group">
                            <label for="share">Share On</label>
                            @foreach ($social as $share)
                            {{ Form::hidden('share-'.$share->id.'-'.$post->id, '0', false) }}
                            {{$share->name}} {{ Form::checkbox('share-'.$share->id.'-'.$post->id, '1', false) }}
                            @endforeach
                        </div>
                        <div class="col-md-4 form-group">

                            <label for="logo_active"></label>
                            {{ Form::hidden('logo_active-'.$post->id, '0', false) }}{{ Form::checkbox('logo_active-'.$post->id, '1', false) }}
                            Logo ON/OFF
                        </div>
                        <div class="col-md-4 form-group">

                            <label for="logo_type"></label>
                            {{ Form::select('logo_type-'.$post->id, ['default'=>'default','dark'=>'dark','bright'=>'bright'], null,array('class' => 'form-control','required'=>'true'))}}
                        </div>
                        <div class="col-md-4 form-group">

                            <label for="logo_position"></label>
                            {{ Form::select('logo_position-'.$post->id, ['topleft' => 'topleft','topright' => 'topright','bottomleft' =>'bottomleft','bottomright' =>'bottomright'], null,array('class' => 'form-control','required'=>'true'))}}
                        </div>

                        <div class="col-md-6 form-group">
                            <label for="date-{{$post->id}}">Date</label> {{ Form::text('date-'.$post->id,'' ,array('class' => 'form-control','id' => 'date-'.$post->id,'placeholder'
                            => 'date','required'=>'true')) }}
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="start_time">Time</label> {{ Form::select('time_hr-'.$post->id,['01' => '01','02' => '02','03' => '03','04' => '04','05' => '05','06' => '06','07' => '07','08' => '08','09' => '09','10' => '10','11' => '11','12' => '12'] ,array('class' => 'form-control','placeholder'
                            => 'Hr.','required'=>'true')) }}
                            {{ Form::select('time_min-'.$post->id, ['00' => '00','15' => '15','30' => '30','45' => '45'],array('class' => 'form-control','placeholder'
                            => 'Min.','required'=>'true')) }}
                            {{ Form::select('time_am-'.$post->id, ['AM' => 'AM','PM' => 'PM'],array('class' => 'form-control','placeholder'
                            => 'AM/PM','required'=>'true')) }}
                        </div>


                        <script type="text/javascript">
                            $('#date-<?=$post->id ?>').datepicker({
                            autoclose:true,
                            format:'dd-mm-yyyy'
                        });
                        </script>
                    </div>

                </div>
                <hr>

                @endforeach
                <div class="col-md-12 form-group">
                    <a href="{{url('add_multiple/'.$post->post_package_id)}}">
                        {{ Form::submit('Schedule',array('class' => 'btn btn-primary')) }}
                    </a></div>

                {!! Form::close() !!}

            </div>
        </div>
    </div>
</div>

@endsection