@extends('layouts.master')

@section('content')
<style>
    .fb_single{
        height: 12px;
        width: 8px;
        background-color: #007bff!important;
        color: #007bff!important;
    }
    .gb_single{
        height: 12px;
        width: 8px;
        background-color: #28a745!important;
        color: #28a745!important;
    }
    .in_single{
        height: 12px;
        width: 8px;
        background-color: #fd7e14!important;
        color: #fd7e14!important;
    }
    .tw_single{
        height: 12px;
        width: 8px;
        background-color: #3c8dbc!important;
        color: #3c8dbc!important;
    }
    .plr-1px{
        padding-left: 1px;
        padding-right: 1px;
    }
    .dropdown-content.show {
    display: block !important;
}
.dropdown-content {
    display: none;
    position: absolute;
    z-index: 1;
    background-color: rgb(255, 255, 255);
    width: 200px;
    right: -10px;
    border-width: 1px;
    border-style: solid;
    border-color: rgb(59, 89, 152);
    border-image: initial;
    border-radius: 10px;
}
.dropdown-content::before {
    content: "";
    position: absolute;
    right: 45px;
    top: -10px;
    width: 0px;
    height: 0px;
    z-index: 9999;
    border-style: solid;
    border-width: 0px 10px 10px;
    border-color: transparent transparent rgb(255, 255, 255);
}
.dropdown-content a .box407AFE {
    color: rgb(255, 255, 255);
    font-size: 12px;
    background: rgb(59, 89, 152);
    border-radius: 30px;
    padding: 5px 15px;
    margin: 10px;
}
</style>
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Dashboard</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Calender</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->
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
 <!-- Main content -->
 <section class="content">
  <div class="container-fluid">
  
   
    <!-- Main row -->

    <div class="row">
      <!-- Left col -->
      <section class="col-lg-12 col-6 ">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">
              <i class="far fas fa-users mr-1"></i>TOP MISSING POSTING GOALS
            </h3>

            <div class="card-tools">
              <div class="dropdown tir">
                <button class="box-whir dropbtn orange-button"> <i class="nav-icon fas fa-cog"></i> Action <img src="assets/img/dots.svg" alt=""> <i class="nav-icon fas fa-chevron-down"></i></button>
                <div id="myDropdown" class="dropdown-content">
                    <a href="" class="td-none" data-toggle="modal" data-target="#modal-default">
                        <div class="box407AFE"> <i class="nav-icon fas fa-plus mr-1"> </i> Single-Post</div>
                    </a>
                    <a href="" class="td-none">
                        <div class="box407AFE"><i class="nav-icon fas fa-plus mr-1"> </i> Multiple Post</div>
                    </a>
                   
                </div>
            </div>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body p-0">
            
            <table   class="table custom-table">
              <thead>
                <tr>
                  <th width="2%"><div class=" custom-checkbox">
                    <input class="" type="checkbox" id="customCheckbox1" value="option1">
                  </div></th>
                  <th width="20%">COMPANY</th>
                  <th width="20%">MONTHLY POSTS</th>
                  <th  width="56%"><span class="ml-md-5">CALENDAR</span></th>
                  <th width="2%" ></th>
                 
                </tr>
              </thead>
              <tbody>
                  @foreach ($business as $bus)
                      
                <tr>
                  <td><div class=" custom-checkbox">
                    <input class="" type="checkbox" id="customCheckbox1" value="option1">
                  </div></td>
                  <td><div class="address">
                    <ul class="icon-list">
                        <li class="address-name"><i class="nav-icon far fa-building"></i><a
                                href="{{url('/business/'.$bus->id.'/setup')}}"> {{$bus->b_name}}</a></li>
                        <li class="address-street"><i class="nav-icon fas fa-map-marker"></i>
                            {{$bus->address}}</li>
                        <li class="address-street"><i class="nav-icon fas fa-map-marker"></i>
                            {{$bus->city}}, {{$bus->state}} {{$bus->zip}}</li>
                    </ul>
                    
                  </div></td>
                 
                  <td>
                      <div class="row">
                          <div class="col-3 text-center plr-1px">
                            <div class="border border-bottom-0 rounded-top" style="background-color: rgba(128, 128, 128, 0.082);"><span class=" @if($bus->fb_posted_goals >=  $bus->fb_monthly_goals ) {{ 'text-success' }} @else {{ 'text-danger' }} @endif">{{ $bus->fb_posted_goals }} / </span>{{ $bus->fb_monthly_goals }}</div>

                            <div class="bg-blue"><i class="fab fa-facebook-f"></i></div>

                            <div class="border border-top-0  rounded-bottom" style="background-color: rgba(128, 128, 128, 0.082);">{{ $posts->where('business',$bus->id)->where('fb_share_active', true)->count() }}</div>
                          </div>
                          <div class="col-3 text-center plr-1px">
                            <div class="border border-bottom-0 rounded-top" style="background-color: rgba(128, 128, 128, 0.082);"><span class=" @if($bus->tw_posted_goals >=  $bus->tw_monthly_goals ) {{ 'text-success' }} @else {{ 'text-danger' }} @endif">{{ $bus->tw_posted_goals }} / </span>{{ $bus->tw_monthly_goals }}</div>

                            <div class="bg-lightblue"><i class="fab fa-twitter"></i></div>

                            <div class="border border-top-0 rounded-bottom" style="background-color: rgba(128, 128, 128, 0.082);">{{ $posts->where('business',$bus->id)->where('tw_share_active', true)->count() }}</div>
                          </div>
                          <div class="col-3 text-center plr-1px">
                            <div class="border border-bottom-0 rounded-top" style="background-color: rgba(128, 128, 128, 0.082);"><span class=" @if($bus->in_posted_goals >=  $bus->in_monthly_goals ) {{ 'text-success' }} @else {{ 'text-danger' }} @endif">{{ $bus->in_posted_goals }} / </span>{{ $bus->in_monthly_goals }}</div>

                            <div class="bg-orange"><i class="fab fa-instagram" style="color:white"></i></div>

                            <div class="border border-top-0 rounded-bottom" style="background-color: rgba(128, 128, 128, 0.082);">{{ $posts->where('business',$bus->id)->where('in_share_active', true)->count() }}</div>
                          </div>
                          <div class="col-3 text-center plr-1px">
                            <div class="border border-bottom-0 rounded-top" style="background-color: rgba(128, 128, 128, 0.082);"><span class=" @if($bus->gb_posted_goals >=  $bus->gb_monthly_goals ) {{ 'text-success' }} @else {{ 'text-danger' }} @endif">{{ $bus->gb_posted_goals }} / </span>{{ $bus->gb_monthly_goals }}</div>

                            <div class="bg-success"><i class="fab fa-google"></i></div>

                            <div class="border border-top-0 rounded-bottom" style="background-color: rgba(128, 128, 128, 0.082);">{{ $posts->where('business',$bus->id)->where('gb_share_active', true)->count() }}</div>
                          </div>

                      </div>
                  </td>
                  <td style="vertical-align: bottom;">
                      <div class="row justify-content-center">
                    @php
                    for($i=1; $i<=date('t');$i++){
                        @endphp
                        
                        <div class="mr-1 border">
                            <div  style="padding-bottom: 1px;text-align: -moz-center;text-align: -webkit-center;"> 
                                @if(array_key_exists($bus->id, $post) && array_key_exists($i, $post[$bus->id])) 
                                    @if($post[$bus->id][$i] >= 1 && $gb[$bus->id][$i] == 1)
                                        <div class="gb_single"></div> 
                                    @else 
                                        <div style="font-size: 8px;visibility: hidden;">.</div>
                                    @endif 
                                @else 
                                    <div style="font-size: 8px;visibility: hidden;">.</div>  
                                @endif 
                            </div>

                            <div  style="padding-bottom: 1px;text-align: -moz-center;text-align: -webkit-center;">
                                @if(array_key_exists($bus->id, $post) && array_key_exists($i, $post[$bus->id])) 
                                    @if($post[$bus->id][$i] >= 1 && $in[$bus->id][$i] == 1)
                                        <div class="in_single"></div> 
                                    @else 
                                        <div style="font-size: 8px;visibility: hidden;">.</div> 
                                    @endif
                                @else 
                                    <div style="font-size: 8px;visibility: hidden;">.</div>  
                                @endif 
                            </div>

                            <div  style="padding-bottom: 1px;text-align: -moz-center;text-align: -webkit-center;">
                                @if(array_key_exists($bus->id, $post) && array_key_exists($i, $post[$bus->id])) 
                                    @if($post[$bus->id][$i] >= 1 && $tw[$bus->id][$i] == 1)
                                        <div class="tw_single"></div>
                                    @else 
                                        <div style="font-size: 8px;visibility: hidden;">.</div> 
                                    @endif 
                                @else 
                                    <div style="font-size: 8px;visibility: hidden;">.</div> 
                                @endif 
                                </div>

                            <div  style="text-align: -moz-center;text-align: -webkit-center;"> 
                                @if(array_key_exists($bus->id, $post) && array_key_exists($i, $post[$bus->id])) 
                                    @if($post[$bus->id][$i] >= 1 && $fb[$bus->id][$i] == 1)
                                        <div class="fb_single"></div>
                                    @else 
                                        <div style="font-size: 8px;visibility: hidden;">.</div> 
                                    @endif 
                                @else 
                                    <div style="font-size: 8px;visibility: hidden;">.</div>  
                                @endif 
                                </div>
                            
                            <span class="border-top font-13">{{ $i }}</span></div>
                        @php
                    }
                    @endphp
                        
                    </div>                    
                  </td>
                  <td>
                    <a href="#" class="btn bg-gray " data-toggle="modal" data-target="#edit-monthly-{{ $bus->id }}"><i class="nav-icon fas fa fa-edit "></i></a>
                  </td>
                 
                 <!--Modal-Add-business-->
  <div class="modal fade" id="edit-monthly-{{ $bus->id }}">
    {!! Form::open(['action' => "BusinessController@updateMG", 'id' => 'form']) !!}
    {!! Form::token() !!}
    {!! Form::hidden('bid', $bus->id) !!}
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title"> <i class="nav-icon fas fa fa-edit mr-2"></i>EDIT MONTHLY POSTS GOALS</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
         
            
          <div class="row">
            <div class="col-sm-3 border-right">
              <div class="description-block">
                <div class="form-group  ">
                 
                  
                  <div class="input-group  ">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-blue"><i class=" fab fa-facebook-f"></i></span>
                    </div>
                    <input name="fb_goal" type="number" class="form-control"  min="0" value="{{ $bus->fb_monthly_goals }}">
                  </div>
                 
                  </div><!--form-group-->
              </div>
              <!-- /.description-block -->
            </div>
            <!-- /.col -->
            <div class="col-sm-3 border-right">
              <div class="description-block">
                <div class="form-group  ">
                 
                  
                  <div class="input-group  ">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-lightblue"><i class=" fab fa-twitter"></i></span>
                    </div>
                    <input name="tw_goal" type="number" class="form-control" min="0" value="{{ $bus->tw_monthly_goals }}">
                  </div>
                 
                  </div><!--form-group-->
              </div>
              <!-- /.description-block -->
            </div>
            <!-- /.col -->
            <div class="col-sm-3 border-right">
              <div class="description-block">
                <div class="form-group ">
                 
                  
                  <div class="input-group  ">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-orange"><i class=" fab fa-instagram"></i></span>
                    </div>
                    <input name="in_goal" type="number" class="form-control" min="0" value="{{ $bus->tw_monthly_goals }}">
                  </div>
                 
                  </div><!--form-group-->
              </div>
              <!-- /.description-block -->
            </div>
            <!-- /.col -->
            <div class="col-sm-3 ">
              <div class="description-block">
                <div class="form-group  ">
                 
                  
                  <div class="input-group  ">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-success"><i class=" fab fab fa-google"></i></span>
                    </div>
                    <input name="gb_goal" type="number" class="form-control" min="0" value="{{ $bus->gb_monthly_goals }}">
                  </div>
                 
                  </div><!--form-group-->
              </div>
              <!-- /.description-block -->
            </div>
            <!-- /.col -->
          </div>
          
         
        </div>
        <div class="modal-footer justify-content-end">
          
          <button type="submit" class="btn btn-primary"><i class=" fa fa-check mr-1"></i> Save</button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
    {!! Form::close() !!}
  </div>
  <!-- /.modal -->
               
                </tr>
                
                @endforeach
              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </section>
      </div><!--row-->
  </div><!-- /.container-fluid -->
</section>


<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="../../plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="../../plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="../../plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="../../plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="../../plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="../../plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="../../plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<!-- daterangepicker -->
<script src="../../plugins/moment/moment.min.js"></script>
<script src="../../plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="../../plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="../../plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="../../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../../dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<!-- FLOT CHARTS -->
<script src="../../plugins/flot/jquery.flot.js"></script>
<!-- FLOT RESIZE PLUGIN - allows the chart to redraw when the window is resized -->
<script src="../../plugins/flot-old/jquery.flot.resize.min.js"></script>
<!-- FLOT PIE PLUGIN - also used to draw donut charts -->
<script src="../../plugins/flot-old/jquery.flot.pie.min.js"></script>
<!-- bootstrap color picker -->
<script src="../../plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<!-- Select2 -->
<script src="../../plugins/select2/js/select2.full.min.js"></script>

<!-- fullCalendar 2.2.5 -->
<script src="../../plugins/moment/moment.min.js"></script>
<script src="../../plugins/fullcalendar/main.min.js"></script>
<script src="../../plugins/fullcalendar-daygrid/main.min.js"></script>
<script src="../../plugins/fullcalendar-timegrid/main.min.js"></script>
<script src="../../plugins/fullcalendar-interaction/main.min.js"></script>
<script src="../../plugins/fullcalendar-bootstrap/main.min.js"></script>
<!-- DataTables -->
<script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script>
   $(document).ready(function () {
      $('.dropdown.tir').click(function () {
          $(this).find('.dropdown-content').toggleClass('show');
      });
  });
 
   $(document).ready(function(){
   

    $(".fc-event-container").find(".fc-day-grid-event").hover(
          function() {
          $('.fc-day-grid-event').append('<button id="but1">Button1</button>' 
          + '<button id="but2">Button1</button>');}, 
           function(){
                $('#but1').remove();
                $('#but2').remove();
      });



    $(".fc-event-container").hover(function(){
    $(".fc-day-grid-event").append("<button>Appended item</button>");
  });
});
</script>
@endsection

