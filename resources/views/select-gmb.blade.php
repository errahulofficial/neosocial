@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header mb-2"> Select Google My Business</div>
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
                @foreach ($location_name as $loc)
                {!! Form::open(['action' => 'SocialController@saveGoogle','id'=>'form']) !!} 
                {{ Form::token() }}
                <div class="box-body">
                    <div class="row justify-content-center" >
                        <div class="col-6">
                        {{ Form::hidden('bid',$id,array('class' => 'form-control','required'=>'true')) }}
                        {{ Form::hidden('uid',$loc['name'],array('class' => 'form-control','required'=>'true')) }}
                        @if (array_key_exists("newReviewUrl",$loc['metadata']))
                        {{ Form::hidden('link',$loc['metadata']['newReviewUrl'] ,array('class' => 'form-control','required'=>'true')) }}
                        @else
                        {{ Form::hidden('link','' ,array('class' => 'form-control','required'=>'true')) }}
                            @endif
                        <div class="col-md-12 form-group">
                            {{ Form::submit($loc['locationName'],array('class' => 'btn btn-primary', 'style'=>'width: -webkit-fill-available')) }}
                        </div>
                        </div>
                    </div>
                </div>
                {!! Form::close() !!}
                @endforeach
                

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
