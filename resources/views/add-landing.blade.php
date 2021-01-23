@extends('layouts.master')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"> Add Landing Page</div>
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
                {!! Form::open(['action' => 'LandingPageController@store','id'=>'form']) !!}
                {{ Form::token() }}
                <div class="box-body">
                    <div class="row">


                        <div class="col-md-12 form-group">
                            <div id="color-picker-1" class="mx-auto"></div>
                            <label for="name">Page Name</label> {{ Form::text('name', '',array('class' => 'form-control','placeholder'
                    => 'Page Name','required'=>'true')) }}
                        </div>

                        <div class="col-md-12 form-group">
                            <label for="days">Days of Content</label> {{ Form::number('days', '',array('class' => 'form-control','placeholder'
                    => 'Days of Content','required'=>'true')) }}
                        </div>

                        <div class="col-md-12 ">
                            <label for="">Choose Template</label>
                        </div>
                        <div class="col-md-12 form-group">
                            {{ Form::hidden('temp', '0', false ,array('class' => 'form-control sr-only')) }}
                            @foreach ($temp as $t)
                            
                            {{ Form::radio('temp', $t->id, false ,array('class' => 'form-control sr-only', 'id' => 'temp-'.$t->id)) }}
                            <label for="temp-{{$t->id}}"><img src='{{url($t->img_dir.'/'.$t->images)}}' height="100"
                                    width="200"></label>
                            @endforeach
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
<style>
    label img {
        cursor: pointer;
        filter: brightness(1);
    }

    label img:hover {
        filter: brightness(0.5);
    }

    input[type="radio"]:checked+label {
        filter: brightness(0.5);
    }
</style>
@endsection