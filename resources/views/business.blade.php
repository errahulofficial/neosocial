@extends('layouts.master')

@section('content')
<style>
    .bg-grey {
        background-color: #6c757d73 !important;
    }
</style>
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Dashboard</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                    <li class="breadcrumb-item active">Business</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">


        <!-- Main row -->
        <div class="row first-row">
            <!-- Left col -->
            <section class="col-lg-12 connectedSortable business-content">

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title text-uppercase"><i class="nav-icon fas fa-check mr-2"></i>Active
                            Businesses <span class="badge bg-navy ">{{ $business->count() }}</span></h3>
                        <div class="card-tools">
                            <div class="dropdown tir">
                                <button class="box-whir dropbtn orange-button"> <i class="nav-icon fas fa-cog"></i>
                                    Action <img src="assets/img/dots.svg" alt=""> <i
                                        class="nav-icon fas fa-chevron-down"></i></button>
                                <div id="myDropdown" class="dropdown-content">
                                    <a href="" class="td-none" data-toggle="modal" data-target="#modal-default">
                                        <div class="box407AFE"> <i class="nav-icon fas fa-paper-plane"></i>Send An Email
                                        </div>
                                    </a>
                                    <a href="" class="td-none">
                                        <div class="box407AFE"><i class="nav-icon fas fa-external-link-alt"></i>Single
                                            Post</div>
                                    </a>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>
                                        <div class=" custom-checkbox">
                                            <input class="" type="checkbox" id="customCheckbox1" value="option1">
                                        </div>
                                    </th>
                                    <th>COMPANY</th>
                                    <th>ADDRESS</th>
                                    <th>CATEGORY</th>
                                    <th>CONNECTED NETWORKS</th>
                                    <th>ACTIONS</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!--row-start-1-->
                                @foreach ($business as $bus)
                                <tr>
                                    <td>
                                        <div class=" custom-checkbox">
                                            <input class="" type="checkbox" id="customCheckbox1" value="option1">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="address">
                                            <ul class="icon-list">
                                                <li class="address-name"><i class="nav-icon far fa-building"></i><a
                                                        href="{{url('/business/'.$bus->id.'/setup')}}"> {{$bus->b_name}}</a></li>
                                                <li class="address-street"><i class="nav-icon fas fa-phone-alt"></i>
                                                    {{$bus->phone}}</li>
                                            </ul>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="address">
                                            <ul class="icon-list">
                                                <li class="address-street"><i
                                                        class="nav-icon fas fa-map-marker-alt"></i>{{$bus->address}}
                                                </li>
                                                <li class="address-street"><i
                                                        class="nav-icon fas fa-globe-europe"></i>{{$bus->website}}
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                    <td>{{$bus->category}}</td>
                                    <td>
                                        <div class="social-icons">
                                            <ul>

                                                @if($facebook[$bus->id] != null)
                                                <a href="{{$facebook[$bus->id]->links}}" target="_blank">
                                                    <li class="bg-blue"><i class="nav-icon fab fa-facebook-f"></i></li>
                                                </a>
                                                @else
                                                <a aria-disabled="true">
                                                    <li class="bg-grey"><i class="nav-icon fab fa-facebook-f"></i></li>
                                                </a>
                                                @endif
                                                
                                                @if($twitter[$bus->id] != null)
                                                <a href="{{$twitter[$bus->id]->links}}" target="_blank">
                                                    <li class="bg-lightblue"><i class="nav-icon fab fa-twitter"></i>
                                                    </li>
                                                </a>
                                                @else
                                                <a aria-disabled="true">
                                                    <li class="bg-grey"><i class="nav-icon fab fa-twitter"></i></li>
                                                </a>
                                                @endif
                                               

                                                @if($insta[$bus->id] != null)
                                                <a href="{{$insta[$bus->id]->links}}" target="_blank">
                                                    <li class="bg-orange"><i class="nav-icon fab fa-instagram"></i></li>
                                                </a>
                                                @else
                                                <a aria-disabled="true">
                                                    <li class="bg-grey"><i class="nav-icon fab fa-instagram"></i></li>
                                                </a>
                                                @endif
                                               
                                                @if($google[$bus->id] != null)
                                                <a href="{{$google[$bus->id]->links}}" target="_blank">
                                                    <li class="bg-success"><i class="nav-icon fab fa-google"></i></li>
                                                </a>
                                                @else
                                                <a aria-disabled="true">
                                                    <li class="bg-grey"><i class="nav-icon fab fa-google"></i></li>
                                                </a>
                                                @endif
                                               

                                            </ul>
                                        </div>
                                        <!--social-icons-->
                                    </td>
                                    <td>
                                        <div class="btn-group btn-group-sm">
                                            <a href="{{url('/business/'.$bus->id.'/setup')}}" class="btn bg-white"><i class="nav-icon fas fa-cogs"></i></a>
                                            <a href="#" class="btn bg-white"><i class="nav-icon fas fa-file-alt"></i></a>
                                            <a href="{{url('/business/delete/'.$bus->id)}}" class="btn bg-white"><i class="nav-icon fas fa-trash-alt"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                <!--row-end-->
                                @endforeach

                                </tfoot>
                        </table>
                    </div>
                    <!-- /.card-body -->
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
                <!-- /.card -->



            </section>
            <!-- /.Left col -->

        </div>
        <!-- /.row (main row) -->

    </div><!-- /.container-fluid -->
</section>
      <div class="modal fade" id="modal-default">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Compose New Message</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card card-primary card-outline">

                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="form-group">
                            <input class="form-control" placeholder="To:">
                        </div>
                        <div class="form-group">
                            <input class="form-control" placeholder="Subject:">
                        </div>
                        <div class="form-group">
                            <textarea id="compose-textarea" class="form-control" style="height: 300px">

                  </textarea>
                        </div>

                    </div>
                    <!-- /.card-body -->

                </div>
                <!-- /.card -->
            </div>
            <div class="modal-footer justify-content-between">

                <button type="submit" class="btn btn-primary"><i class="far fa-envelope"></i> Send</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
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
<script src="{{asset('/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="../../plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
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
<!-- DataTables -->
<script src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script>
    $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
  $(document).ready(function () {
      $('.dropdown.tir').click(function () {
          $(this).find('.dropdown-content').toggleClass('show');
      });
  });
  $('#compose-textarea').summernote()
  $(document).mouseup(function (e) {
      var dropdown = $(".dropdown");
      if (!dropdown.is(e.target) && dropdown.has(e.target).length === 0) {
          $('.dropdown-content').removeClass('show');
      }
  });
</script>

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
        totalPoints = 100

    function getRandomData() {

      if (data.length > 0) {
        data = data.slice(1)
      }

      // Do a random walk
      while (data.length < totalPoints) {

        var prev = data.length > 0 ? data[data.length - 1] : 50,
            y    = prev + Math.random() * 10 - 5

        if (y < 0) {
          y = 0
        } else if (y > 100) {
          y = 100
        }

        data.push(y)
      }

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
