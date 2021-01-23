@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Leadgn Campaign Customize</div>
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
                {!! Form::open(['action' => 'LeadgenCampaignController@lead_customize','id'=>'form']) !!} 
        {{ Form::token() }}
        <div class="box-body">
            <div class="row">
                {{ Form::hidden('lead_id', $inId,array('class' => 'form-control','required'=>'true')) }}
               
                <div class="col-md-12 form-group">
                    <label for="experience_type">What experience do you have with this company?</label> {{ Form::text('experience_type', '',array('class' => 'form-control','placeholder'
                    => 'Experience as','required'=>'true')) }}
                </div>
                <div class="col-md-12 form-group">
                    <label for="experience_descp">Your Experience </label> {{ Form::textarea('experience_descp', '',array('class' => 'form-control','placeholder'
                    => 'Experience Description','required'=>'true')) }}
                </div>
                <div class="col-md-12 form-group">
                    <label for="niche">Niche</label> {{ Form::text('niche', '',array('class' => 'form-control','placeholder'
                    => 'Niche','required'=>'true')) }}
                </div>
                <div class="col-md-12 form-group">
                    <label for="buyer_type">Buyer Type</label> {{ Form::text('buyer_type', '',array('class' => 'form-control','placeholder'
                    => 'Buyer Type','required'=>'true')) }}
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
