@extends('layouts.master')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Dashboard</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Leadgen Compaigns</li>
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
        <div class="row first-row">
            <!-- Left col -->
            <section class="col-lg-5 connectedSortable business-content">

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title text-uppercase"><i class="nav-icon fas fa-bullhorn mr-2"></i> LEADGEN
                            CAMPAIGN SUMMARY

                            <div class="card-tools">

                            </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row">
                            <div
                                class="col-md-6 d-flex align-items-center justify-content-center flex-direction-column">
                                <div class="text-center">
                                <h4 class="text-navy">0% </h4>
                                <h4 class="text-muted"> Sent</h4>
                                </div>

                            </div>
                            <!-- /.col -->
                            <div class="col-md-6">
                                <ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item">
                                        <a class="text-dark"><i class="fas fa-square text-navy mr-2"></i>Sent</a><span
                                            class="float-right">0</span>
                                    </li>
                                    <li class="list-group-item">
                                        <a class="text-dark"><i
                                                class="fas fa-square text-success mr-2"></i>Opens</a><span
                                            class="float-right">0</span>
                                    </li>
                                    <li class="list-group-item">
                                        <a class="text-dark"><i class="fas fa-square text-danger mr-2"></i>Clicks</a><span
                                            class="float-right">0</span>
                                    </li>
                                </ul>



                            </div>
                            <!-- /.col -->
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
                <!-- /.card -->



            </section>
            <!-- /.Left col -->

            <!-- right col -->
            <section class="col-lg-7 connectedSortable business-content">

                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h3 class="card-title text-uppercase"><i class="nav-icon fas fa-dollar-sign mr-2"></i> LEADGEN
                            CREDITS</h3>
                        <div class="progress-group ">
                            <span class="badge bg-warning mr-1">{{$leads->count()}}</span> <span class="mr-5">Used</span>
                            <span class="float-right"><span class="badge bg-success mr-1">20</span>Availabel</span>
                            <div class="progress progress-xxs">
                                <div class="progress-bar bg-warning" style="width: {{($leads->count()/20)*100}}%"></div>
                                <div class="progress-bar bg-success" style="width: {{((20-$leads->count())/20)*100}}%"></div>
                            </div>
                        </div>

                        <div class="card-tools">
                            <button type="button" class="btn  bg-gradient-primary btn-sm text-uppercase"
                                data-toggle="modal" data-target="#modal-setting"><i
                                    class="fas fa-cog mr-2"></i>Settings</button>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <h3 class="card-title text-uppercase"><i class="nav-icon fas fa-fire mr-2"></i>HOTTEST LEADS
                        </h3>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>COMAPNY NAME</th>
                                    <th>EMAIL</th>
                                    <th>PHONE</th>
                                    <th>ACTIONS</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>



                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
                <!-- /.card -->



            </section>
            <!-- /.right col -->

        </div>
        <!-- /.row (main row) -->

        <!--Second Row-->

        <div class="row first-row">
            <!-- Left col -->
            <section class="col-lg-12 connectedSortable business-content ui-sortable">


                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title text-uppercase"></h3>
                        <div class="card-tools">
                            <a type="button" href="{{url('/leadgen-campaign/add')}}"
                                class="btn  orange-button text-uppercase nav-link"><i
                                    class="nav-icon fas fa-plus mr-1"></i> create leadgen campaign</a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="leadgen-compaign" class="table table-bordered table-striped">
                            <thead>
                                <tr>

                                    <th> CAMPAIGN NAME</th>
                                    <th>STATUS</th>
                                    <th>OPENS</th>
                                    <th>CLICKS</th>
                                    <th>ACTION DATE</th>
                                    <th>ACTIONS</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($leads as $lead)
                                <tr>
                                    <td>{{$lead->b_name}}</td>
                                    <td><ul class="icon-list">

                                        <li class="address-street"><i
                                                class="nav-icon fas fa-cogs"></i>{{$lead->status}}</li>
                                    </ul></td>
                                    <td>{{$lead->opnes}}</td>
                                    <td>{{$lead->clicks}}</td>
                                    <td>
                                        <ul class="icon-list">

                                            <li class="address-street"><i
                                                    class="nav-icon fas fa-calendar-alt"></i>{{$lead->action_date}}</li>
                                        </ul>
                                    </td>
                                    <td>
                                        <div class="btn-group btn-group-sm">
                                            <a href="#" class="btn bg-white mr-1"><i class="nav-icon fas fa-pause "></i></a>
                                            <a href="#" class="btn bg-white mr-1"><i class="nav-icon fas fa-id-card"></i></a>
                                            <a href="{{url('/leadgen-campaign/delete/'.$lead->id)}}" class="btn bg-white"><i class="nav-icon fas fa-trash"></i></a>
                                          </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.card-body -->
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->



            </section>
            <!-- /.Left col -->

        </div>

        <!-- / .Second Row-->

    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->

<!--Modal-Add-New-Group-->
<div class="modal fade" id="modal-setting">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"> Leads Notifications Settings</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card card-primary card-outline">

                    <p class="text-center mt-3 text-muted">Please give us your best contact information to send you
                        alerts.</p>
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="name" class="col-sm-3 col-form-label">Phone</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="name" placeholder="Phone Number">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-sm-3 col-form-label">Email</label>
                            <div class="col-sm-9">
                                <input type="email" class="form-control" id="name" placeholder="Email Address">
                            </div>
                        </div>
                        <p class="text-left mt-2">Choose the ways you want to be contacted</p>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" checked>
                            <label class="form-check-label">Send me SMS Notification.</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" checked>
                            <label class="form-check-label"> Call me and connect me to the company.</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" checked>
                            <label class="form-check-label">Email me.</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" checked>
                            <label class="form-check-label"> I understand that the best time to contact a company is
                                within 2 minutes of opening my email</label>
                        </div>







                    </div>
                    <!-- /.card-body -->

                </div>
                <!-- /.card -->
            </div>
            <div class="modal-footer text-right">

                <button type="submit" class="btn btn-primary"><i class=" fa fa-check"></i> Save</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->


<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
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
<!-- DataTables -->
<script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script>
    $(function () {
    $("#leadgen-compaign").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
   
  });
 
</script>


@endsection