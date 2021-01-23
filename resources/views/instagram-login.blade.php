@extends('layouts.master')
@section('content')
<div class="container">
    <div class="row justify-content-center align-content-center pt-5">
        <div class="col-md-12">
            @if (Session::has("error"))
            <div class="alert alert-danger">
                <ul>
                    <li>{{ Session::get("error")}}</li>
                </ul>
            </div>
            @endif @if (Session::has("success"))
            <div class="alert alert-success">
                <ul>
                    <li>{{ Session::get("success") }}</li>
                </ul>
            </div>
            @endif
        </div>
        <div class="col-6">
            <div class="widget-box-add-account">
                
                <div class="headline m-b-30">
                    <div class="title fs-18 fw-5 text-info"><i class="far fa-plus-square"></i> {{ 'Add profile' }}</div>
                    
                </div>
                <p class="text-danger"><i class="fa fa-exclamation-triangle"> </i> Please Make Sure, Instagram TwoFactorAuthentication should be OFF.</p>

                <div class="tab-content p-t-25" id="myTabContent">
                    <div class="tab-pane fade show active" id="instagram-user" role="tabpanel" aria-labelledby="instagram-user-tab">
                       <span class="text-danger bold"> @if ($response ?? '')<i class="fa fa-exclamation-triangle"> </i> {{ $response ?? ''['message'] }} @endif</span>
                       <span class="text-danger bold"> @if ($phone_number != '')<i class="fa fa-exclamation-triangle"> </i> {{ 'Enter the 6 digit code we sent to the number ending in '. $phone_number }} @endif</span>
                       <span class="text-danger bold"> @if ($security_number != '')<i class="fa fa-exclamation-triangle"> </i> {{ 'Enter the 6 digit code we sent to the number ending in '. $security_number }} @endif</span>
                       {!! Form::open(['action' => ['InstagramController@save',$id], 'id' => 'form']) !!} 
                       {{-- <form class="actionForm" action="{{ url('instagram/') }}" method="POST" > --}}
                            {!! Form::token() !!}
                            {!! Form::hidden('bus_id', $id, array()) !!}
                            <div class="form-group">
                                <label for="username">{{"Instagram username"}}</label>
                                @if($username != '')
                                <input type="text" class="form-control" id="username" name="username" value="{{ $username }}" disabled>
                                <input type="hidden" class="form-control" id="username" name="username" value="{{ $username }}">
                                @else
                                <input type="text" class="form-control" id="username" name="username" >
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="password">{{"Instagram password"}}</label>
                                @if($password != '')
                                <input type="password" class="form-control" id="password" name="password" value="{{ $password }}" disabled>
                                <input type="hidden" class="form-control" id="password" name="password" value="{{ $password }}">
                                @else
                                <input type="password" class="form-control" id="password" name="password">
                                @endif
                            </div>
                            

                            <div class="form-group security-code @if ($security_number == '')  {{'d-none' }}@endif">
                                <label for="security_code">{{"Security Code"}}</label>
                                <input type="text" class="form-control" id="security_code" name="security_code">
                            </div>

                           @if($ver_code == '')
                            <div class="form-group verification-code @if ($phone_number == '') {{ 'd-none' }}@endif">
                                <label for="verification_code">{{"Verification Code"}}</label>
                                <input type="text" class="form-control" id="verification_code" name="verification_code">
                            </div>
                            @else
                            <div class="form-group verification-code">
                                <label for="verification_code">{{"Verification Code"}}</label>
                                <input type="text" class="form-control" id="verification_code" name="verification_code" value="{{$ver_code}}" disabled>
                                <input type="hidden" class="form-control" id="verification_code" name="verification_code" value="{{$ver_code}}">
                            </div>
                            @endif
                            
                            <button type="submit" class="btn btn-block btn-info m-t-15">{{'Add profile'}}</button>
                        </form>

                    </div>
                    
                </div>
            </div>
        </div> 
    </div>
    </div>
    <!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>

<!-- jQuery -->
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>


<!-- Bootstrap 4 -->
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{asset('plugins/chart.js/Chart.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{asset('plugins/sparklines/sparkline.js')}}"></script>
<!-- JQVMap -->
<script src="{{asset('plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{asset('plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('plugins/jquery-knob/jquery.knob.min.js')}}"></script>
<!-- InputMask -->
<script src="{{asset('plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('plugins/inputmask/min/jquery.inputmask.bundle.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{asset('plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- Summernote -->
<script src="{{asset('plugins/summernote/summernote-bs4.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('dist/js/adminlte.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('dist/js/pages/dashboard.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('dist/js/demo.js')}}"></script>
<!-- FLOT CHARTS -->
<script src="{{asset('plugins/flot/jquery.flot.js')}}"></script>
<!-- FLOT RESIZE PLUGIN - allows the chart to redraw when the window is resized -->
<script src="{{asset('plugins/flot-old/jquery.flot.resize.min.js')}}"></script>
<!-- FLOT PIE PLUGIN - also used to draw donut charts -->
<script src="{{asset('plugins/flot-old/jquery.flot.pie.min.js')}}"></script>
<!-- bootstrap color picker -->
<script src="{{asset('plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js')}}"></script>
<!-- Select2 -->
<script src="{{asset('plugins/select2/js/select2.full.min.js')}}"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="{{asset('plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js')}}"></script>
<!-- Bootstrap Switch -->
<script src="{{asset('plugins/bootstrap-switch/js/bootstrap-switch.min.js')}}"></script>
<!-- Toastr -->
<script src="{{asset('plugins/toastr/toastr.min.js')}}"></script>
<!-- Ekko Lightbox -->
<script src="{{asset('plugins/ekko-lightbox/ekko-lightbox.min.js')}}"></script>
<!-- DataTables -->
<script src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script>
    $(function () {
        if ( document.location.hash)
        {
            // if(document.location.hash != ''){
            // $("a [href='#custom-tags-three-social']").click();
            // }
            console.log(document.location.hash);
            $(".tab-pane").removeClass("active show");
            $(document.location.hash).addClass("active show");
            $('[href="'+document.location.hash+'"]').addClass("active").parents('.nav-item').siblings().find('.nav-link').removeClass('active').addClass('disabled');
        $('.nav-link a[href="' + document.location.hash + '"]').tab('show');
        }
    // social tab table
    $("#social-connect").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    
//Money Euro
$('[data-mask]').inputmask()
   //Initialize Select2 Elements
   $('.select2').select2()
  //Initialize Select2 Elements
  $('.select2bs4').select2({
      theme: 'bootstrap4'
    })
 
  //Date range picker
  $('#reservationdate').datetimepicker({
        format: 'L'
    });

    //Timepicker
    $('#timepicker1').datetimepicker({
      format: 'LT'
    })

    $('#timepicker2').datetimepicker({
      format: 'LT'
    })

    
    
  });
 

  $('#compose-textarea').summernote()
  $(document).mouseup(function (e) {
      var dropdown = $(".dropdown");
      if (!dropdown.is(e.target) && dropdown.has(e.target).length === 0) {
          $('.dropdown-content').removeClass('show');
      }
  });

  $('#local').on('click' , function(){
    $('#lo_rad').prop('checked',true);
 
    });
  $('#online').on('click' , function(){
    $('#on_rad').prop('checked',true);
    
    });
    
</script>

<script>
    
        
    $(document).ready(function (){
        $('#toPostGoal').click(function(){
            $('[aria-controls="custom-tabs-three-post"]').click();
        });

    });
        
</script>
@endsection