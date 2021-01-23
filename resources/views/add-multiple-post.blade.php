@extends('layouts.master')
@section('content')
<style>
    [type=radio] {
        position: absolute;
        opacity: 0;
        width: 0;
        height: 0;
    }

    /* IMAGE STYLES */
    [type=radio]+img {
        cursor: pointer;
    }

    /* CHECKED STYLES */
    [type=radio]:checked+img {
        outline: 2px solid #f00;
    }

    .callout.callout-primary {
        border-left-color: #0080ff;
    }

    .hide_bus {
        display: none;
    }

    .alert a {
        color: #007bff;
        text-decoration: none;
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
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Multi Post</li>
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
        <form method="post" action="/post-multiple/save">
            @csrf
            <!-- Main row -->
            <div class="row first-row">
                <!-- Left col -->
                <section class="col-lg-12 col-12 ">

                    <div class="card card-default">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-cloud-upload-alt mr-1"></i>
                                UPLOAD POSTS
                            </h3>

                            <div class="card-tools">
                                <ul class="nav nav-pills" id="custom-tabs-three-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="custom-tabs-three-listing-tab" data-toggle="pill"
                                            href="#custom-tabs-three-listing" role="tab"
                                            aria-controls="custom-tabs-three-listing" aria-selected="true"><i
                                                class="fas fa-plus mr-1"></i> Add Listings</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="custom-tabs-three-post-tab" data-toggle="pill"
                                            href="#custom-tabs-three-post" role="tab"
                                            aria-controls="custom-tabs-three-post" aria-selected="false"><i
                                                class="fas fa-quote-right mr-1"></i> Add Posts</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="custom-tabs-three-map-tab" data-toggle="pill"
                                            href="#custom-tabs-three-map" role="tab"
                                            aria-controls="custom-tabs-three-map" aria-selected="false"><i
                                                class="fas fa-th-list mr-1"></i>Map Fields</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="custom-tabs-three-preview-tab" data-toggle="pill"
                                            href="#custom-tabs-three-preview" role="tab"
                                            aria-controls="custom-tabs-three-preview" aria-selected="false"><i
                                                class="fas fa-eye mr-1"></i> Preview</a>
                                    </li>

                                </ul>
                            </div>
                        </div>
                        <!-- /.card-header -->

                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card card-primary card-outline card-tabs">
                                        <div class="card-header p-0 pt-1 border-bottom-0">

                                        </div>
                                        <div class="card-body">
                                            <div class="tab-content" id="custom-tabs-three-tabContent">
                                                <div class="tab-pane fade show active" id="custom-tabs-three-listing"
                                                    role="tabpanel" aria-labelledby="custom-tabs-three-listing-tab">
                                                    <div class="row">
                                                        <div class="col-lg-12">

                                                            <ul class="nav " id="custom-tabs-three-tab" role="tablist">
                                                                <li class="nav-item">
                                                                    <a class="nav-link text-success active"
                                                                        id="custom-tabs-three-business-tab"
                                                                        data-toggle="pill"
                                                                        href="#custom-tabs-three-business" role="tab"
                                                                        aria-controls="custom-tabs-three-business"
                                                                        aria-selected="true"> <i
                                                                            class="nav-icon fas fa-briefcase mr-1"></i>Business</a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="nav-link" id="custom-tabs-three-group-tab"
                                                                        data-toggle="pill"
                                                                        href="#custom-tabs-three-group" role="tab"
                                                                        aria-controls="custom-tabs-three-group"
                                                                        aria-selected="false"> <i
                                                                            class="nav-icon fas fa-th mr-1"></i>Groups</a>
                                                                </li>


                                                            </ul>
                                                            <div class="tab-content" id="custom-tabs-three-tabContent">
                                                                <div class="tab-pane fade show active"
                                                                    id="custom-tabs-three-business" role="tabpanel"
                                                                    aria-labelledby="custom-tabs-three-business-tab">

                                                                    <div class="form-group">
                                                                        <label>Select Business</label>
                                                                        {{ Form::select('business[]',$b_data,'',array('class' => 'form-control select2bs4 bus_list', 'multiple' =>true)) }}
                                                                    </div>
                                                                    <!--form-group-->
                                                                    <div class="callout callout-success alert">
                                                                        <button type="button" class="close"
                                                                            data-dismiss="alert"
                                                                            aria-hidden="true">&times;</button>
                                                                        <h5><i
                                                                                class="nav-icon fas fa-briefcase mr-1 text-success"></i><span
                                                                                class="badge bg-green ml-2 ">1</span>
                                                                        </h5>

                                                                        <p>Black Cap IT</p>
                                                                    </div>

                                                                    <div class="callout callout-primary alert">
                                                                        <button type="button" class="close"
                                                                            data-dismiss="alert"
                                                                            aria-hidden="true">&times;</button>
                                                                        <h5><i
                                                                                class="nav-icon fas fa-briefcase mr-1 text-primary"></i><span
                                                                                class="badge bg-primary ml-2 ">2</span>
                                                                        </h5>

                                                                        <p>Marthedal Solar, Air & Heating</p>
                                                                    </div>

                                                                </div>
                                                                <!--business-End-->

                                                                <div class="tab-pane fade show "
                                                                    id="custom-tabs-three-group" role="tabpanel"
                                                                    aria-labelledby="custom-tabs-three-group-tab">

                                                                    <div class="form-group">
                                                                        <label>Select Groups</label>
                                                                        {{ Form::select('group[]',$g_data,'',array('class' => 'form-control select2bs4 grp_list', 'multiple' =>true,)) }}
                                                                    </div>
                                                                    <!--form-group-->

                                                                    <div class="callout callout-success alert">
                                                                        <button type="button" class="close"
                                                                            data-dismiss="alert"
                                                                            aria-hidden="true">&times;</button>
                                                                        <h5><i
                                                                                class="nav-icon fas fa-briefcase mr-1 text-success"></i><span
                                                                                class="badge bg-green ml-2 ">1</span>
                                                                        </h5>

                                                                        <p>Neovora</p>
                                                                    </div>

                                                                    <div class="callout callout-primary alert">
                                                                        <button type="button" class="close"
                                                                            data-dismiss="alert"
                                                                            aria-hidden="true">&times;</button>
                                                                        <h5><i
                                                                                class="nav-icon fas fa-briefcase mr-1 text-primary"></i><span
                                                                                class="badge bg-primary ml-2 ">2</span>
                                                                        </h5>

                                                                        <p>Neovora Brasil</p>
                                                                    </div>

                                                                </div>
                                                                <!--group-End-->
                                                            </div>
                                                        </div>
                                                        <!--column-8-->

                                                    </div>

                                                    <div class="">
                                                        <button type="button" class="btn btn-primary float-right"
                                                            id="listing_next"> Next Step <i
                                                                class="fas fa-chevron-right ml-2"></i></button>
                                                    </div>
                                                    <!--row-->
                                                </div>
                                                <!--business-listing-end-->
                                                <div class="tab-pane fade show " id="custom-tabs-three-post"
                                                    role="tabpanel" aria-labelledby="custom-tabs-three-post-tab">
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <ul class="nav " id="custom-tabs-three-tab" role="tablist">
                                                                <li class="nav-item">
                                                                    <a class="nav-link text-success"
                                                                        id="custom-tabs-three-package-tab"
                                                                        data-toggle="pill"
                                                                        href="#custom-tabs-three-package" role="tab"
                                                                        aria-controls="custom-tabs-three-package"
                                                                        aria-selected="true"> <i
                                                                            class="fas fa-quote-right mr-1"></i>Post
                                                                        Package</a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="nav-link active"
                                                                        id="custom-tabs-three-upload-tab"
                                                                        data-toggle="pill"
                                                                        href="#custom-tabs-three-upload" role="tab"
                                                                        aria-controls="custom-tabs-three-upload"
                                                                        aria-selected="false"> <i
                                                                            class="fas fa-cloud-upload-alt mr-1"></i>Upload</a>
                                                                </li>


                                                            </ul>
                                                            <div class="tab-content" id="custom-tabs-three-tabContent">
                                                                <div class="tab-pane fade show"
                                                                    id="custom-tabs-three-package" role="tabpanel"
                                                                    aria-labelledby="custom-tabs-three-package-tab">

                                                                    <div class="form-group">
                                                                        <label>Select Package</label>
                                                                        {{ Form::select('package',$pack_data,'',array('class' => 'form-control select2bs4 pack_list')) }}

                                                                    </div>
                                                                    <!--form-group-->

                                                                    <div class="">
                                                                        <button type="button"
                                                                            class="btn btn-primary float-right"
                                                                            id="package_next"> Next Step
                                                                            <i
                                                                                class="fas fa-chevron-right ml-2"></i></button>
                                                                    </div>
                                                                </div>
                                                                <!--package-End-->

                                                                <div class="tab-pane fade show active"
                                                                    id="custom-tabs-three-upload" role="tabpanel"
                                                                    aria-labelledby="custom-tabs-three-upload-tab">
                                                                    <meta name="csrf-token"
                                                                        content="{{ csrf_token() }}">
                                                                    <div class="form-group">
                                                                        <label for="customFile">Please Select File
                                                                            (csv)</label>

                                                                        <div class="custom-file">
                                                                            <input type="file" class="custom-file-input"
                                                                                name="customFile" id="customFile">
                                                                            <label class="custom-file-label"
                                                                                for="csv_file">Select File
                                                                                (csv)</label>
                                                                        </div>
                                                                    </div>
                                                                    <!--form-group-->
                                                                    <h3 class="card-title text-uppercase"><i
                                                                            class="nav-icon fas fa-file mr-2 text-primary"></i>
                                                                        SAMPLE SPREADSHEET </h3>
                                                                    <table class="table table-striped">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>HEADER</th>
                                                                                <th>#</th>
                                                                                <th>CATEGORY</th>
                                                                                <th>TYPE</th>
                                                                                <th>ELEMENTS</th>
                                                                                <th>MESSAGE</th>
                                                                                <th>IMAGE_LINK URL</th>
                                                                                <th>CONTENT_LINK URL</th>
                                                                                <th>LOGO URL</th>
                                                                                <th>POSITION URL</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr class="alert">
                                                                                <td>post title header</td>
                                                                                <td>1</td>
                                                                                <td>
                                                                                    Educational
                                                                                </td>
                                                                                <td>Quotes</td>
                                                                                <td> Text + Article Link</td>
                                                                                <td>Your post content is here</td>
                                                                                <td>http://bit.ly/2gD5qxL</td>
                                                                                <td>http://bit.ly/2gD5qxL</td>
                                                                                <td>default</td>
                                                                                <td>Top</td>
                                                                            </tr>
                                                                            <tr class="alert">
                                                                                <td>post title header</td>
                                                                                <td>2</td>
                                                                                <td>
                                                                                    Educational
                                                                                </td>
                                                                                <td>Quotes</td>
                                                                                <td> Text + Article Link</td>
                                                                                <td>Your post content is here</td>
                                                                                <td>http://bit.ly/2gD5qxL</td>
                                                                                <td>http://bit.ly/2gD5qxL</td>
                                                                                <td>default</td>
                                                                                <td>Top</td>
                                                                            </tr>
                                                                            <tr class="alert">
                                                                                <td>post title header</td>
                                                                                <td>1</td>
                                                                                <td>
                                                                                    Educational
                                                                                </td>
                                                                                <td>Quotes</td>
                                                                                <td> Text + Article Link</td>
                                                                                <td>Your post content is here</td>
                                                                                <td>http://bit.ly/2gD5qxL</td>
                                                                                <td>http://bit.ly/2gD5qxL</td>
                                                                                <td>default</td>
                                                                                <td>Top</td>
                                                                            </tr>


                                                                        </tbody>
                                                                        <div>
                                                                            <a href="{{ asset('/post-format/posts_format.csv') }}">
                                                                            <button type="button"
                                                                                class="btn  orange-button btn-sm text-uppercase float-right"><i
                                                                                    class="fas fa-cloud-download-alt mr-1"></i>
                                                                                Download Sample Spreadsheet</button>
                                                                            </a>
                                                                        </div>
                                                                    </table>

                                                                    <div class="">
                                                                        <button type="button"
                                                                            class="btn btn-primary float-right"
                                                                            id="upload_next"> Next Step
                                                                            <i
                                                                                class="fas fa-chevron-right ml-2"></i></button>
                                                                    </div>
                                                                </div>
                                                                <!--upload-End-->
                                                            </div>
                                                        </div>
                                                        <!--column-8-->


                                                    </div>
                                                    <!--row-->

                                                </div>
                                                <!--Add-Posts-end-->
                                                <div class="tab-pane fade" id="custom-tabs-three-map" role="tabpanel"
                                                    aria-labelledby="custom-tabs-three-map-tab">
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="d-flex justify-content-around">
                                                                <h6> <i
                                                                        class="fas fa-arrow-right text-primary mr-1"></i>=
                                                                    Fields Matched</h6>
                                                                <h6> <i
                                                                        class="fas fa-exclamation-triangle  text-warning mr-1"></i>=
                                                                    Fields Not Matched</h6>
                                                                <h6> <i class="fas fa-ban text-danger mr-1"></i>= Don't
                                                                    Import</h6>
                                                            </div>
                                                            <table class="table table-striped mapping-data">
                                                                <thead>
                                                                    <tr>
                                                                        <th><i class="fas fa-bars mr-2 "></i> YOUR
                                                                            FIELDS
                                                                        </th>
                                                                        <th><i class="fas fa-folder-open mr-2"></i>YOUR
                                                                            DATA
                                                                        </th>
                                                                        <th></th>
                                                                        <th>MAPED FIELDS</th>

                                                                    </tr>
                                                                </thead>
                                                                <tbody class="file_content">
                                                                    {{-- Content Ajax --}}
                                                                </tbody>
                                                            </table>
                                                        </div>

                                                        <!--column-12-->
                                                    </div>
                                                    <!--row-->

                                                    <div class="">
                                                        <button type="button"
                                                            class="btn btn-primary filetoprev float-right"> Next
                                                            Step
                                                            <i class="fas fa-chevron-right ml-2"></i></button>
                                                    </div>
                                                </div>

                                                <div class="tab-pane fade" id="custom-tabs-three-preview"
                                                    role="tabpanel" aria-labelledby="custom-tabs-three-preview-tab">

                                                </div>

                                                <!--Preview-end-->
                                            </div>
                                        </div>
                                        <!-- /.card -->


                                    </div>
                                    <!-- /.col -->
                                </div>
                                <!-- /.row -->
                            </div>
                        </div>
                        <!-- /.card-body -->

                </section>
                <!-- /.Left col -->



            </div>
            <!-- /.row (main row) -->








    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->



<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>

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
<!-- Ekko Lightbox -->
<script src="../../plugins/ekko-lightbox/ekko-lightbox.min.js"></script>
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
<!-- DataTables -->
<script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>

<script>
    $(function () {
     
    //Initialize Select2 Elements
    $('.select2bs4').select2({
        theme: 'bootstrap4'
      })
   
     

  
       $("input[data-bootstrap-switch]").each(function(){
        $(this).bootstrapSwitch('state', $(this).prop('checked'));
      });  

      $('select[name="token"]').change(function(){
    var token = $(this).children("option:selected").val();
    var post = $('textarea[name="post"]').val();
    var newpost = post +' '+ token;
    $('textarea[name="post"]').val(newpost);
    });

      
    });
    $(function () {
      $(document).on('click', '[data-toggle="lightbox"]', function (event) {
        event.preventDefault();
        $(this).ekkoLightbox({
          alwaysShowClose: true
        });
      });

      $('.filter-container').filterizr({ gutterPixels: 3 });
      $('.btn[data-filter]').on('click', function () {
        $('.btn[data-filter]').removeClass('active');
        $(this).addClass('active');
      });
    })
    $('.toastrDefaultQueue').click(function() {
        toastr.success('Added to queue')
      });
    $('.toastrDefaultSuccess').click(function() {
        toastr.success('Added to queue')
      });
      $('.toastrDefaultAdded').click(function() {
        toastr.success('Added Listing')
      });
  
      $('.toastrDefaultWarning').click(function() {
        toastr.warning('Congrats Your Post has been Schduled')
      });
  
      $('.toastrDefaultrandom').click(function() {
        toastr.warning('you have made to content and network selections, are you sure ?')
      });

      $('#custom-tabs-three-package-tab').click(function(){
          $('#custom-tabs-three-map-tab').css('display','none');
      });
      $('#custom-tabs-three-upload-tab').click(function(){
          $('#custom-tabs-three-map-tab').css('display','block');
      });

    //   $('#listing_next').click(function(){
    //     $('.hide_bus').css('display', 'none');
    //     var bus_list = $('.bus_list').val();
    //     var grp_list = $('.grp_list').val();
    //     $.each( bus_list, function( key, value ) {
    //         $('#bus'+value).css('display', 'table-row');
    //     });        
    //     $.each(grp_list, function( grp_id, grp_val ) {
    //         $.ajax({url: "/ajax/group/"+grp_val, success: function(result){
    //             $.each(result, function( key, value ) {
    //                 $.each(value, function( ind, res ) {
    //                 $('#bus'+res).css('display', 'table-row');
    //             });
    //         });
    //     }});
    // });
    // });
    $(document).ready(function(){
      
      $('#package_next').click(function(){
        var bus_list = $('.bus_list').val() == '' ? '0' : $('.bus_list').val();
        var grp_list = $('.grp_list').val() == '' ? '0' : $('.grp_list').val();
        var pack_id = $('.pack_list').val() == '' ? '0' : $('.pack_list').val();
        var tbody = $('#custom-tabs-three-preview');
              
        $.ajax({url: "/ajax/busgrp/"+bus_list+'/'+grp_list+'/'+pack_id,
        beforeSend: function() {
              $("#loading-image").show();
           },
            success: function(business){
            tbody.empty();
                   tbody.append(business);
                   $('[aria-controls="custom-tabs-three-preview"]').click();
                   $("#loading-image").hide();
                   
        }});
    });


      $('#upload_next').click(function(){
          var tab_body = $('.file_content');
        var fd = new FormData();
        var customFile = document.getElementById("customFile").files[0];
        fd.append('file', customFile); 
         
        $.ajax({
        url:"/get-formatted-csv",
        enctype: 'multipart/form-data',
        method:"POST",
        headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                },
        data: fd,
        dataType:false,
        contentType:false,
        cache:false,
        processData:false,
        beforeSend: function() {
              $("#loading-image").show();
           },
            success: function(tr){                
            tab_body.empty();
                   tab_body.append(tr);
                   $('[aria-controls="custom-tabs-three-map"]').click();
                   $("#loading-image").hide();
        },
            error: function(jq,status,message){
                console.log(message+"error");
                
            // tab_body.empty();
            //        tab_body.append(tr);
                   
        }
        });
});
      $('.filetoprev').click(function(){
            var bus_list = $('.bus_list').val() == '' ? '0' : $('.bus_list').val();
            var grp_list = $('.grp_list').val() == '' ? '0' : $('.grp_list').val();
            var tab_body = $('.file_content');
            var count, i, select;
            var selectVal = '';
            var tbody = $('#custom-tabs-three-preview');
        $.ajax({
        url:"/filetoprev",
        enctype: 'multipart/form-data',
        method:"GET",
        dataType:'json',
        contentType:false,
        cache:false,
        processData:false,
        beforeSend: function() {
              $("#loading-image").show();
           },
            success: function(tr){   
                console.log(count = JSON.parse(tr[0]).length);
                for(i=0;i<count;i++){
                    if(i==0){
                        selectVal = $("#select"+i).val();
                    }
                    else{
                    selectVal = selectVal +','+$("#select"+i).val();
                    }
                }   
                   
                $.ajax({
        url:"/fileprev/"+bus_list+'/'+grp_list,
        method:"POST",
        headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                },
        data: {data : selectVal},
            success: function(prev){   
                tbody.empty();
                   tbody.append(prev);
                   $('[aria-controls="custom-tabs-three-preview"]').click();
                   $("#loading-image").hide();
                                    
        },
            error: function(jq,status,message){
                console.log(message+"error");
                
              
        }
        });

               
        },
            error: function(jq,status,message){
                console.log(message+"error");
                
           
        },
        });
});

$('#listing_next').click(function(){
            $('[aria-controls="custom-tabs-three-post"]').click();
        });
 
    });

function removetab(){
    console.log($(this).parents('.alert').attr('class'));
    
}

  
</script>

@endsection