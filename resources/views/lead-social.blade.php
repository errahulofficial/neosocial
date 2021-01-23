@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"> Social Setup</div>
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
                {!! Form::open(['action' => 'LeadgenCampaignController@lead_social','id'=>'form']) !!} 
        {{ Form::token() }}
        <div class="box-body">
            <div class="row">
                {{ Form::hidden('lead_id', $inId,array('class' => 'form-control','required'=>'true')) }}
               
                <div class="col-md-12 form-group">
                    <label for="fb_page">Facebook Page link</label> {{ Form::text('fb_page', '',array('class' => 'form-control','placeholder'
                    => 'Facebook Page URL','required'=>'true')) }}
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
