@extends('layouts.master')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Email Setup</div>
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
                {!! Form::open(['action' => 'LeadgenCampaignController@leademailsave','id'=>'form']) !!}
                {{ Form::token() }}

                {{ Form::hidden('lead_id', $inId,array('class' => 'form-control','required'=>'true')) }}

                @foreach($email as $key => $eml)
                <div class="box-body">
                    <h3>Message {{$key+1}}</h3>
                    <div class="row">
                        <div class="col-md-4 form-group">
                            <label for="active_status-{{$key}}"> ON/OFF</label>
                            {{ Form::hidden('active_status-'.$key, '0', false) }}
                            {{ Form::checkbox('active_status-'.$key, '1', true) }}
                        </div>

                        @if ($key == 0)
                        <div class="col-md-8 form-group d-flex">
                            <label for="numbers-{{$key}}"> Send </label>
                            {{ Form::select('numbers-'.$key,[] , '5',array('class' => 'form-control','required'=>'true','id'=>"numbers".$key)) }}
                            {{ Form::select('hr-min-'.$key,['minutes'=>'Minute(s)', 'hours'=>'Hour(s)', 'days'=>'Day(s)'] ,'minutes',array('class' => 'form-control','required'=>'true','id'=>"timeformat".$key)) }}
                        </div>
                        <div class="col-md-12 form-group">
                            <label for="subject-{{$key}}">Subject</label> {{ Form::text('subject-'.$key, 'My Experience As Your [Buyer Type]',array('class' => 'form-control','placeholder'
                    => 'Your Subject title here...','required'=>'true')) }}
                        </div>
                        @elseif ($key == 1)
                        <div class="col-md-8 form-group d-flex">
                            <label for="numbers-{{$key}}"> Send </label>
                            {{ Form::select('numbers-'.$key,[] , '1',array('class' => 'form-control','required'=>'true','id'=>"numbers".$key)) }}
                            {{ Form::select('hr-min-'.$key,['minutes'=>'Minute(s)', 'hours'=>'Hour(s)', 'days'=>'Day(s)'] ,'days',array('class' => 'form-control','required'=>'true','id'=>"timeformat".$key)) }}
                        </div>
                        <div class="col-md-12 form-group">
                            <label for="subject-{{$key}}">Subject</label> {{ Form::text('subject-'.$key, 'Do you engage with your visitors online?',array('class' => 'form-control','placeholder'
                    => 'Your Subject title here...','required'=>'true')) }}
                        </div>
                        @elseif ($key == 2)
                        <div class="col-md-8 form-group d-flex">
                            <label for="numbers-{{$key}}"> Send </label>
                            {{ Form::select('numbers-'.$key,[] , '2',array('class' => 'form-control','required'=>'true','id'=>"numbers".$key)) }}
                            {{ Form::select('hr-min-'.$key,['minutes'=>'Minute(s)', 'hours'=>'Hour(s)', 'days'=>'Day(s)'] ,'days',array('class' => 'form-control','required'=>'true','id'=>"timeformat".$key)) }}
                        </div>
                        <div class="col-md-12 form-group">
                            <label for="subject-{{$key}}">Subject</label> {{ Form::text('subject-'.$key, 'I only have 2 spots left.',array('class' => 'form-control','placeholder'
                    => 'Your Subject title here...','required'=>'true')) }}
                        </div>
                        @elseif ($key == 3)
                        <div class="col-md-8 form-group d-flex">
                            <label for="numbers-{{$key}}"> Send </label>
                            {{ Form::select('numbers-'.$key,[] , '4',array('class' => 'form-control','required'=>'true','id'=>"numbers".$key)) }}
                            {{ Form::select('hr-min-'.$key,['minutes'=>'Minute(s)', 'hours'=>'Hour(s)', 'days'=>'Day(s)'] ,'days',array('class' => 'form-control','required'=>'true','id'=>"timeformat".$key)) }}
                        </div>
                        <div class="col-md-12 form-group">
                            <label for="subject-{{$key}}">Subject</label> {{ Form::text('subject-'.$key, 'Deadline Today: 5 PM Your Free Social Media Content',array('class' => 'form-control','placeholder'
                    => 'Your Subject title here...','required'=>'true')) }}
                        </div>
                        @elseif ($key == 4)
                        <div class="col-md-8 form-group d-flex">
                            <label for="numbers-{{$key}}"> Send </label>
                            {{ Form::select('numbers-'.$key,[] , '5',array('class' => 'form-control','required'=>'true','id'=>"numbers".$key)) }}
                            {{ Form::select('hr-min-'.$key,['minutes'=>'Minute(s)', 'hours'=>'Hour(s)', 'days'=>'Day(s)'] ,'days',array('class' => 'form-control','required'=>'true','id'=>"timeformat".$key)) }}
                        </div>
                        <div class="col-md-12 form-group">
                            <label for="subject-{{$key}}">Subject</label> {{ Form::text('subject-'.$key, 'Sorry, We Went With Someone Else',array('class' => 'form-control','placeholder'
                    => 'Your Subject title here...','required'=>'true')) }}
                        </div>
                        @endif

                        <div class="col-md-12 form-group">
                            <label for="message{{$key}}">Message </label> {{ Form::textarea('message'.$key, $eml,array('class' => 'form-control','placeholder'
                    => 'Experience Description','required'=>'true')) }}
                        </div>

                    </div>
                </div>
                <hr style="border-top: 10px solid rgba(0, 0, 0, 0.1)">
                <script>
                    var day = JSON.parse('<?=json_encode($days)?>');
                    var hour = JSON.parse('<?=json_encode($hours)?>');
                    var minute = JSON.parse('<?=json_encode($minutes)?>');
                    $( document ).ready(function() {
                        if($('#timeformat<?=$key?>').val() == 'days'){
                          
                          var $el = $("#numbers<?=$key?>");
                          $el.empty(); 
                          $.each(day, function(key,value) {
                              
                          $el.append($("<option></option>")
                              .attr("value", value).text(key));
                          });
                        }
                        else if($('#timeformat<?=$key?>').val() == 'hours'){
                          var $el = $("#numbers<?=$key?>");
                          $el.empty(); 
                          $.each(hour, function(key,value) {
                              
                          $el.append($("<option></option>")
                              .attr("value", value).text(key));
                          });
                        }
                        else if($('#timeformat<?=$key?>').val() == 'minutes'){
                          var $el = $("#numbers<?=$key?>");
                          $el.empty(); 
                          $.each(minute, function(key,value) {
                              
                          $el.append($("<option></option>")
                              .attr("value", value).text(key));
                          });
                        }

                        if('<?=$key?>' == 0) $("#numbers<?=$key?>").val("5");
                        if('<?=$key?>' == 1) $("#numbers<?=$key?>").val("1");
                        if('<?=$key?>' == 2) $("#numbers<?=$key?>").val("2");
                        if('<?=$key?>' == 3) $("#numbers<?=$key?>").val("4");
                        if('<?=$key?>' == 4) $("#numbers<?=$key?>").val("5");


                    });

                    $('#timeformat<?=$key?>').on('change', function() {
                      if(this.value == 'days'){
                          
                        var $el = $("#numbers<?=$key?>");
                        $el.empty(); 
                        $.each(day, function(key,value) {
                            
                        $el.append($("<option></option>")
                            .attr("value", value).text(key));
                        });
                      }
                      else if(this.value == 'hours'){
                        var $el = $("#numbers<?=$key?>");
                        $el.empty(); 
                        $.each(hour, function(key,value) {
                            
                        $el.append($("<option></option>")
                            .attr("value", value).text(key));
                        });
                      }
                      else if(this.value == 'minutes'){
                        var $el = $("#numbers<?=$key?>");
                        $el.empty(); 
                        $.each(minute, function(key,value) {
                            
                        $el.append($("<option></option>")
                            .attr("value", value).text(key));
                        });
                      }
                    });
                </script>
                @endforeach
                <div class="col-md-12 form-group">
                    {{ Form::submit('Next',array('class' => 'btn btn-primary')) }}
                </div>

                {!! Form::close() !!}

            </div>
        </div>
    </div>
</div>
</div>

@endsection