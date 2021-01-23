@extends('layouts.social')
@section('content')
    <div class="container">
        <div class="row">
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
        </div>
      <!-- Main row -->
      <div class="row">
         <!-- Left col -->
         <section class="col-12 ">
          
          <div class="card card-default">
            
            <!-- /.card-header -->
           
            <div class="card-body">
              <div class="row">
                <div class="col-12">
                  <div class="card card-primary card-outline card-tabs">
                    <div class="card-header p-0 pt-1 border-bottom-0">
                      
                    </div>
                    <div class="card-body">
                      <div class="tab-content" id="custom-tabs-three-tabContent">
                        
                       
                        <!--Add-Posts-end-->
                          <div class="row">
                            <div class="col-lg-12">

                              <div class="row">
                                <div class="col-sm-6">
                                  <div class="card card-default">
                                    <div class="card-header">
                                      <h3 class="card-title">
                                        <i class="fas fa-share-alt mr-1"></i>
                                        SOCIAL SETUP
                                      </h3>
                          
                                      <div class="card-tools">
                                      
                                      </div>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                      <div class="row">
                                        <div class="col-12">
                                          <ul class="list-group list-group-unbordered mb-3">
                                            <li class="list-group-item ">
                                              <a class="text-dark">Network</a><span class="float-right">API Connection</span>
                                            </li>
                                            
                                            @if ($business->hasfb == false)
                                            <li class="list-group-item">
                                                <a href="{{url('/facebook/'.$business->id)}}"
                                                    class="text-muted">Facebook
                                                    Page<span
                                                        class="float-right"><span
                                                            class="btn bg-light btn-outline-danger"><i
                                                                class="fab fa-facebook-f"></i>
                                                            Connect</span></span></a>
                                            </li>
                                            @else
                                            <li class="list-group-item">
                                                <a href="{{url('/social-facebook/delete/'.$business->id)}}"
                                                    class="text-muted">Facebook
                                                    Page<span
                                                        class="float-right"><span
                                                            class="btn bg-blue btn-outline-blue"><i
                                                                class="fab fa-facebook-f"></i>
                                                            Connected</span></span></a>
                                            </li>
                                            @endif
                                            @if ($business->hastw ==
                                            false)

                                            <li class="list-group-item">
                                                <a href="{{url('/tweet/'.$business->id)}}"
                                                    class="text-muted">Twitter<span
                                                        class="float-right"><span
                                                            class="btn bg-light btn-outline-danger"><i
                                                                class="fab fa-twitter"></i>
                                                            Connect</span></span></a>
                                            </li>
                                            @else

                                            <li class="list-group-item">
                                                <a href="{{url('/social-twitter/delete/'.$business->id)}}"
                                                    class="text-muted">Twitter<span
                                                        class="float-right"><span
                                                            class="btn bg-lightblue btn-outline-lightblue"><i
                                                                class="fab fa-twitter"></i>
                                                            Connected</span></span></a>
                                            </li>
                                            @endif
                                            @if ($business->hasinsta ==
                                            false)
                                            <li class="list-group-item">
                                                <a href="{{url('/instagram/'.$business->id)}}"
                                                    class="text-muted">Instagram<span
                                                        class="float-right"><span
                                                            class="btn bg-light btn-outline-danger"><i
                                                                class="fab fa-instagram"></i>
                                                            Connect</span></span></a>
                                            </li>
                                            @else
                                            <li class="list-group-item">
                                                <a href="{{url('/social-instagram/delete/'.$business->id)}}"
                                                    class="text-muted">Instagram<span
                                                        class="float-right"><span
                                                            class="btn bg-orange btn-outline-orange"><i
                                                                class="fab fa-instagram"></i>
                                                            Connected</span></span></a>
                                            </li>
                                            @endif
                                            @if ($business->hasgb ==
                                            false)
                                            <li class="list-group-item">
                                                <a href="{{url('/google/'.$business->id)}}"
                                                    class="text-muted">Google
                                                    MyBusiness<span
                                                        class="float-right"><span
                                                            class="btn bg-light btn-outline-danger"><i
                                                                class="fab fa-google"></i>
                                                            Connect</span></span></a>
                                            </li>
                                            @else
                                            <li class="list-group-item">
                                                <a href="{{url('/social-google/delete/'.$business->id)}}"
                                                    class="text-muted">Google
                                                    MyBusiness<span
                                                        class="float-right"><span
                                                            class="btn bg-success btn-outline-success"><i
                                                                class="fab fa-google"></i>
                                                            Connected</span></span></a>
                                            </li>
                                            @endif
                                           
                                          </ul>
                                        
                                        
                                        </div>
                                        <!-- /.col -->
                                      </div>
                                      <!-- /.row -->
                                    </div>
                                    <!-- /.card-body -->
                                  
                                 
                                  </div>
                                  <!-- /.card -->
                                </div><!--column-6-->
                                <div class="col-sm-6">
                                  <div class="info-box bg-primary m-0">
                                    <span class="info-box-icon"><i class="fas fa-network-wired"></i></span>
                      
                                    <div class="info-box-content">
                                      <span class="info-box-text">CONNECTED NETWORKS

                                      </span>
                                      
                      
                                      <div class="progress ">
                                        <div class="progress-bar" style="width: 2%"></div>
                                      </div>
                                      <span class="progress-description">
                                        0% 
                                      </span>
                                    </div>
                                    <!-- /.info-box-content -->
                                  </div><!--info box-->

                                  <div class="info-box mt-3">
                                    <span class="info-box-icon bg-primary"><i class="fas fa-users"></i></span>
                      
                                    <div class="info-box-content">
                                      <span class="info-box-text">Total Reach</span>
                                      <span class="info-box-number">0</span>
                                    </div>
                                    <!-- /.info-box-content -->
                                  </div>
                                </div><!--column-6-->
                              </div>
                         
                         
                          </div><!--column-6-->
                          
                          </div><!--row-->
                          
                        <!--Social-end-->
                       
                      </div>
                    </div>
                    <!-- /.card -->
                
                
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
          </div>
          
        </section>
        <!-- /.Left col -->
       
      </div>
      <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>


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
<!-- InputMask -->
<script src="../../plugins/moment/moment.min.js"></script>
<script src="../../plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>
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
<!-- Bootstrap4 Duallistbox -->
<script src="../../plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<!-- Bootstrap Switch -->
<script src="../../plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<!-- Toastr -->
<script src="../../plugins/toastr/toastr.min.js"></script>
<!-- Ekko Lightbox -->
<script src="../../plugins/ekko-lightbox/ekko-lightbox.min.js"></script>
<!-- DataTables -->
<script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script>
  $(function () {
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

    

</script>

<!-- Code injected by live-server -->
<script>
 

  
</script>

@endsection
