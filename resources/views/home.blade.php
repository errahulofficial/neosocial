@extends('layouts.master')

@section('content')
<style>
  .blur {
    filter: blur(100px);
  }

  /* .table-bordered td{
    min-width: 80px;
  } */
  .today {
    font-weight: bold;
  }

  .bg-orange,
  .bg-orange>a {
    color: #fff !important;
  }

  .couponcode:hover .coupontooltip {
    display: block;
  }

  .coupontooltip ul li {
    color: black;
  }

  .coupontooltip {
    display: none;
    background: #C8C8C8;
    padding: 10px;
    position: absolute;
    z-index: 1;
    color: black;
    margin-top: -75px;
    left: 35%;

  }

  span.coupontooltip:after {
    content: "";
    position: absolute;
    top: 100%;
    left: 50%;
    margin-left: -5px;
    border-width: 5px;
    border-style: solid;
    border-color: #C8C8C8 transparent transparent transparent;
  }

  .couponcode1:hover .coupontooltip1 {
    display: block;
  }

  .coupontooltip1 ul li {
    color: black;
  }

  .coupontooltip1 {
    display: none;
    background: #C8C8C8;
    padding: 10px;
    position: absolute;
    z-index: 1;
    color: black;
    margin-top: -220px;
    right: 5%;

  }

  span.coupontooltip1:after {
    content: "";
    position: absolute;
    top: 100%;
    right: 20%;
    margin-left: -5px;
    border-width: 5px;
    border-style: solid;
    border-color: #C8C8C8 transparent transparent transparent;
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
          <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-lg-4 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
          <div class="inner">
            <h3>MANAGING</h3>
            <div class="row">
              <div class="col-sm-6 text-center">
                <h5>{{$business->count()}}</h5>
                <h6>BUSINESSES</h6>
              </div>
              <div class="col-sm-6 text-center">
                <h5>{{$social->count()}}</h5>
                <h6>Profiles</h6>
              </div>
            </div>

          </div>
          <div class="icon">
            <i class="fas fa-cogs"></i>
          </div>

        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-4 col-6">
        <!-- small box -->
        <div class="small-box bg-green">
          <div class="inner">
            <h3> Posting Goals
            </h3>
            <div class="row">
              <div class="col-sm-6 text-center">
                @php $count=0; @endphp
                <h5>@foreach ($business as $bus)
                  @if($bus->fb_monthly_goals == $bus->fb_posted_goals && $bus->tw_monthly_goals == $bus->tw_posted_goals && $bus->in_monthly_goals == $bus->in_posted_goals && $bus->gb_monthly_goals == $bus->gb_posted_goals)
                  @php $count++ @endphp
                  @endif
                  @endforeach</h5>
                {{$count}}
                <h6> Achieved Goals</h6>
              </div>
              <div class="col-sm-6 text-center">
                <h5>{{$posts->where('check_posted', false)->count()}}</h5>
                <h6> Need Posts</h6>
              </div>
            </div>

          </div>
          <div class="icon">
            <i class="nav-icon fas fa-flag"></i>
          </div>

        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-4 col-6">
        <!-- small box -->
        <div class="small-box  bg-gradient-secondary">
          <div class="inner">
            <h3 class=""> ACCOUNT
            </h3>
            <div>
              <span class="">Basic Account</span>
              <span class="float-right">5000</span>
            </div>
            <div class="progress-group ">
              <span class="badge bg-navy">{{$social->count()}}</span> Used
              <span class="float-right"><span class="badge bg-info">{{5000-$social->count()}}</span>Availabel</span>
              <div class="progress progress-xxs">
                <div class="progress-bar bg-navy" style="width: {{$social->count()}}%"></div>
                <div class="progress-bar bg-info" style="width: {{100-$social->count()}}%"></div>
              </div>
            </div>

          </div>
          <div class="icon">
            <i class="nav-icon fas fa-user-alt"></i>
          </div>

        </div>
      </div>
      <!-- ./col -->

      <!-- ./col -->
    </div>
    <!-- /.row -->
    <!-- Main row -->
    <div class="row">
      <!-- Left col -->
      <section class="col-lg-12 col-6 connectedSortable">
        <!-- Custom tabs (Charts with tabs)-->
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">
              <i class="far fas fa-calendar-alt mr-1"></i>
              POSTING SCHEDULE
            </h3>
            <div class="card-tools">
              <div class="form-group m-0">
              

              </div>
            </div>
          </div><!-- /.card-header -->
          <div class="card-body">
           
            <div id="interactive" style="height: 300px;"></div>
          </div>
          <!-- /.card-body-->
        </div>
        <!-- /.card -->




      </section>
      <!-- /.Left col -->

    </div>
    <!-- /.row (main row) -->
    <!-- Main row -->
    <div class="row">
      <!-- Left col -->
      <section class="col-lg-12 col-6 ">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">
              <i class="far fas fa-users mr-1"></i>TOP MISSING POSTING GOALS
            </h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body p-0">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th style="">#</th>
                  <th>Task</th>
                  <th>Progress</th>
                  <th style="">Label</th>
                  <th>Progress</th>
                  <th style="">Label</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($business as $key => $busin)

                <tr>
                  <td>{{$key+1}}.</td>
                  <td>
                    <div class="address">

                      <div class="address-name list-style-none"><i class="nav-icon far fa-building mr-1"></i><a
                          href="#">{{$busin->b_name}}</a></div>
                      <div class="address-street"><i class="nav-icon fas fa-map-marker-alt mr-1"></i>{{$busin->address}}
                      </div>
                      <div class="address-street"><i class="nav-icon fas fa-map-marker-alt mr-1"></i>{{$busin->city}},
                        {{$busin->state}}, {{$busin->zip}}</div>

                    </div>
                  </td>
                  <td>
                    <div class="info-box bg-blue m-0">
                      <span class="info-box-icon"><i class="fab fa-facebook-f"></i></span>

                      <div class="info-box-content">
                        <span class="info-box-text">Events</span>
                        <span class="info-box-number">{{$busin->fb_posted_goals}}/{{$busin->fb_monthly_goals}}</span>

                        <div class="progress">
                          <div class="progress-bar"
                            style="width:  {{$busin->fb_posted_goals == '0' ? ($busin->fb_monthly_goals == '0' ? '0' : '0') : ($busin->fb_monthly_goals == '0' ? '0' : $busin->fb_posted_goals/$busin->fb_monthly_goals*100)}}%">
                          </div>
                        </div>
                        <span class="progress-description">
                          {{$busin->fb_posted_goals == '0' ? ($busin->fb_monthly_goals == '0' ? '0' : '0') : ($busin->fb_monthly_goals == '0' ? '0' : round($busin->fb_posted_goals/$busin->fb_monthly_goals*100))}}%
                          Completed in 30 Days
                        </span>
                      </div>
                      <!-- /.info-box-content -->
                    </div>
                  </td>
                  <td>
                    <div class="info-box bg-lightblue m-0">
                      <span class="info-box-icon"><i class="fab fa-twitter"></i></span>

                      <div class="info-box-content">
                        <span class="info-box-text">Events</span>
                        <span class="info-box-number">{{$busin->tw_posted_goals}}/{{$busin->tw_monthly_goals}}</span>

                        <div class="progress">
                          <div class="progress-bar"
                            style="width:  {{$busin->tw_posted_goals == '0' ? ($busin->tw_monthly_goals == '0' ? '0' : '0') : ($busin->tw_monthly_goals == '0' ? '0' : $busin->tw_posted_goals/$busin->tw_monthly_goals*100)}}%">
                          </div>
                        </div>
                        <span class="progress-description">
                          {{$busin->tw_posted_goals == '0' ? ($busin->tw_monthly_goals == '0' ? '0' : '0') : ($busin->tw_monthly_goals == '0' ? '0' : round($busin->tw_posted_goals/$busin->tw_monthly_goals*100))}}%
                          Completed in 30 Days
                        </span>
                      </div>
                      <!-- /.info-box-content -->
                    </div>

                  </td>
                  <td>
                    <div class="info-box bg-orange m-0">
                      <span class="info-box-icon"><i class="fab fa-instagram"></i></span>

                      <div class="info-box-content">
                        <span class="info-box-text">Events</span>
                        <span class="info-box-number">{{$busin->in_posted_goals}}/{{$busin->in_monthly_goals}}</span>

                        <div class="progress">
                          <div class="progress-bar"
                            style="width:  {{$busin->in_posted_goals == '0' ? ($busin->in_monthly_goals == '0' ? '0' : '0') : ($busin->in_monthly_goals == '0' ? '0' : $busin->in_posted_goals/$busin->in_monthly_goals*100)}}%">
                          </div>
                        </div>
                        <span class="progress-description">
                          {{$busin->in_posted_goals == '0' ? ($busin->in_monthly_goals == '0' ? '0' : '0') : ($busin->in_monthly_goals == '0' ? '0' : round($busin->in_posted_goals/$busin->in_monthly_goals*100))}}%
                          Completed in 30 Days
                        </span>
                      </div>
                      <!-- /.info-box-content -->
                    </div>
                  </td>
                  <td>
                    <div class="info-box bg-success m-0">
                      <span class="info-box-icon"><i class="fab fa-google"></i></span>

                      <div class="info-box-content">
                        <span class="info-box-text">Events</span>
                        <span class="info-box-number">{{$busin->gb_posted_goals}}/{{$busin->gb_monthly_goals}}</span>

                        <div class="progress">
                          <div class="progress-bar"
                            style="width:  {{$busin->gb_posted_goals == '0' ? ($busin->gb_monthly_goals == '0' ? '0' : '0') : ($busin->gb_monthly_goals == '0' ? '0' : $busin->gb_posted_goals/$busin->gb_monthly_goals*100)}}%">
                          </div>
                        </div>
                        <span class="progress-description">
                          {{$busin->gb_posted_goals == '0' ? ($busin->gb_monthly_goals == '0' ? '0' : '0') : ($busin->gb_monthly_goals == '0' ? '0' : round($busin->gb_posted_goals/$busin->gb_monthly_goals*100))}}%
                          Completed in 30 Days
                        </span>
                      </div>
                      <!-- /.info-box-content -->
                    </div>
                  </td>

                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </section>
    </div>
    <!--row-->


    <div class="row">
      <!-- Left col -->
      <section class="col-lg-12 col-6 ">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">
              <i class="far fas fa-users mr-1"></i>TOP MISSING POSTING GOALS
            </h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body p-0">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th style="">#</th>
                  <th>Task</th>
                  <th>Progress</th>
                  <th style="">Label</th>
                  <th>Progress</th>
                  <th style="">Label</th>
                </tr>
              </thead>
              <tbody>

                @foreach ($business as $key => $busin)
                <tr>
                  <td>{{$key+1}}.</td>
                  <td>
                    <div class="address">

                      <div class="address-name list-style-none"><i class="nav-icon far fa-building mr-1"></i><a
                          href="#">{{$busin->b_name}}</a></div>
                      <div class="address-street"><i class="nav-icon fas fa-map-marker-alt mr-1"></i>{{$busin->address}}
                      </div>
                      <div class="address-street"><i class="nav-icon fas fa-map-marker-alt mr-1"></i>{{$busin->city}},
                        {{$busin->state}}, {{$busin->zip}}</div>

                    </div>
                  </td>
                  <td>
                    <span class="couponcode">
                      <div class="info-box m-0">

                        <span class="info-box-icon bg-blue"><i class="fab fa-facebook-f"></i></span>
                        <div class="info-box-content">
                          <span class="info-box-text">Total Facebook <br>posts this Month</span>
                          <span class="info-box-number">{{$fb[$key]}}</span>
                          {{-- <span class="coupontooltip">
                            <table class="table bg-transparent table-bordered"><b>Score</b>
                            </table>
                          </span> --}}
                        </div>
                      </div>
                    </span>
                    <!-- /.info-box-content -->
                  </td>
                  <td>

                    <span class="couponcode">
                      <div class="info-box m-0">
                        <span class="info-box-icon bg-lightblue"><i class="fab fa-twitter"></i></span>

                        <div class="info-box-content">
                          <span class="info-box-text">Total Twitter <br>posts this Month</span>
                          <span class="info-box-number">{{$tw[$key]}}</span>
                          {{-- <span class="coupontooltip">
                            <table class="table bg-transparent table-bordered"><b>Score</b>
                            </table>
                          </span> --}}
                        </div>
                      </div>
                    </span>
                    <!-- /.info-box-content -->
                  </td>
                  <td>

                    <span class="couponcode">
                      <div class="info-box m-0">
                        <span class="info-box-icon bg-orange"><i class="fab fa-instagram"></i></span>

                        <div class="info-box-content">
                          <span class="info-box-text">Total Instagram <br>posts this Month</span>
                          <span class="info-box-number">{{$in[$key]}}</span>
                          {{-- <span class="coupontooltip">
                            <table class="table bg-transparent table-bordered"><b>Score</b>
                            </table>
                          </span> --}}
                        </div>
                        <!-- /.info-box-content -->
                      </div>
                    </span>
                  </td>
                  <td>
                    <span class="couponcode1">

                      <div class="info-box m-0">
                        <span class="info-box-icon bg-success"><i class="fab fa-google"></i></span>

                        <div class="info-box-content">
                          <span class="info-box-text">Total Google Business <br>posts this Month</span>
                          <span class="info-box-number">{{$gb[$key]}}</span>
                          {{-- <span class="coupontooltip1">
                            <table class="table bg-transparent table-bordered">
                              <tr>
                                @php
                                if(isset($bustrack[$busin->id])) {
                                foreach ($bustrack[$busin->id] as $key => $value) {
                                  
                                  for($i=1; $i<=$days; $i++){ 
                                    if(date('j', strtotime($value->posting_time)) == $i){
                                      $noim[$i] = 'sd';
                                    }
                                    else {
                                      $noim[$i] = '';
                                    }

                                  }
                                }
                                for($i=1; $i<=$days; $i++){ 
                                  echo '<td>'.$i.'  '. $noim[$i].'</td>';
                                 
                                  }
                              }
                                  @endphp
                              </tr>
                            </table>
                          </span> --}}
                        </div>
                        <!-- /.info-box-content -->
                      </div>
                    </span>
                  </td>
                </tr>
                <tr>
                  @endforeach

              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </section>
    </div>
    <!--row-->


  </div><!-- /.container-fluid -->
</section>

</section>

<!-- jQuery -->
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
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

<!-- Code injected by live-server -->
<script>
  $(function () {
    /*
     * Flot Interactive Chart
     * -----------------------
     */
    // We use an inline data source in the example, usually data would
    // be fetched from a server
    var data        = [],
        totalPoints = 7

    function getRandomData() {
      <?php foreach($graph as $key => $val){ ?>
        data.push('<?php echo $val; ?>');
    <?php } ?>

      // Zip the generated y values with the x values
      var res = []
      for (var i = 0; i < data.length; ++i) {
        res.push([i, data[i]])
      }

      return res
    }

    var interactive_plot = $.plot('#interactive', [
        {
          data: getRandomData(),
        }
      ],
      {
        grid: {
          borderColor: '#f3f3f3',
          borderWidth: 1,
          tickColor: '#f3f3f3'
        },
        series: {
          color: '#3b5998',
          lines: {
            lineWidth: 2,
            show: true,
            fill: true,
          },
        },
        yaxis: {
          min: 0,
          max: 100,
          show: true
        },
        xaxis: {
          show: true
        }
      }
    )

    var updateInterval = 500 //Fetch data ever x milliseconds
    var realtime       = 'on' //If == to on then fetch data every x seconds. else stop fetching
    function update() {

      interactive_plot.setData([getRandomData()])

      // Since the axes don't change, we don't need to call plot.setupGrid()
      interactive_plot.draw()
      if (realtime === 'on') {
        setTimeout(update, updateInterval)
      }
    }

    //INITIALIZE REALTIME DATA FETCHING
    if (realtime === 'on') {
      update()
    }
    //REALTIME TOGGLE
    $('#realtime .btn').click(function () {
      if ($(this).data('toggle') === 'on') {
        realtime = 'on'
      }
      else {
        realtime = 'off'
      }
      update()
    })
    /*
     * END INTERACTIVE CHART
     */



  })

  /*
   * Custom Label formatter
   * ----------------------
   */
  function labelFormatter(label, series) {
    return '<div style="font-size:13px; text-align:center; padding:2px; color: #fff; font-weight: 600;">'
      + label
      + '<br>'
      + Math.round(series.percent) + '%</div>'
  }
</script>
@endsection