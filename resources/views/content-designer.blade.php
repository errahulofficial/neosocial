@extends('layouts.master')
@section('content')
<style>
    .select2-container {
    width: 100% !important;
    }
    .nav-tabs {
        justify-content: space-around;
    }

    .nav-tabs .nav-item {
        min-width: 50%;
        text-align: -webkit-center;
    }

    .position-unset {
        position: unset !important;
    }

    .btnhover {
        width: fit-content;
        padding: 4px;
        border: #a3d9ff 1px solid;
        border-radius: 6px;
    }

    #example2 {
        display: none;
    }

    .viewhover {
        display: none;
    }

    .content_post:hover .viewhover {
        display: block;
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
                    <li class="breadcrumb-item active">Content Designer</li>
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
            <li id="alert-success">{{ Session::get("success") }}</li>
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
            <section class="col-lg-12 ">
                <div class="row">

                    <div class="col-lg-12">
                        <ul class="nav nav-pills mb-2" id="custom-tabs-three-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="custom-tabs-three-research-tab" data-toggle="pill"
                                    href="#custom-tabs-three-research" role="tab"
                                    aria-controls="custom-tabs-three-research" aria-selected="true"><i
                                        class="fas fa fa-rss mr-1"></i> research content</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="custom-tabs-three-content-tab" data-toggle="pill"
                                    href="#custom-tabs-three-content" role="tab"
                                    aria-controls="custom-tabs-three-content" aria-selected="false"><i
                                        class=" fas fa-bars mr-1"></i> content package library</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="custom-tabs-three-marketplace-tab" data-toggle="pill"
                                    href="#custom-tabs-three-marketplace" role="tab"
                                    aria-controls="custom-tabs-three-marketplace" aria-selected="false"><i
                                        class="fas fa fa-gift mr-1"></i> marketplace packages</a>
                            </li>


                        </ul>
                        <div class="tab-content" id="custom-tabs-three-tabContent">
                            <div class="tab-pane fade show active" id="custom-tabs-three-research" role="tabpanel"
                                aria-labelledby="custom-tabs-three-research-tab">
                                <div class="row">
                                    <div class="col-lg-3">
                                        <div class="card card-default">
                                            <div class="card-header">
                                                <h3 class="card-title">
                                                    <i class="fas fa fa-comment text-info mr-1"></i>
                                                    Content Designer
                                                </h3>

                                                <div class="card-tools">

                                                </div>
                                            </div>
                                            <!-- /.card-header -->
                                            <div class="card-body">
                                                <div class="card card-info package_scroll ">
                                                    <div class="card-header">
                                                        <h3 class="card-title"><span class="mr-2">1</span>CONTENT
                                                            PACKAGE</h3>

                                                        <div class="card-tools">
                                                            <button type="button" class="btn btn-tool"
                                                                data-card-widget="collapse"><i class="fas fa-minus"></i>
                                                            </button>
                                                        </div>
                                                        <!-- /.card-tools -->
                                                    </div>
                                                    <!-- /.card-header -->
                                                    <div class="card-body">
                                                        <div class="form-group">
                                                            <label>Select Your Package</label>
                                                            {{ Form::select('package',$package,'',array('class' => 'form-control select2bs4', 'width' => '100%' )) }}
                                                            <p id="package_error" style="color:red;"></p>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Create New Package</label>
                                                            {{ Form::text('new_package','',array('class' => 'form-control', 'placeholder' => 'New Package Name', 'width' => '100%' )) }}
                                                            <p id="new_pack_error" style="color:red;"></p>
                                                        </div>
                                                        <div class="form-group">
                                                            <button id="new_pack" class="btn btn-primary float-right"> Create New Package</button>
                                                        </div>
                                                    </div>
                                                    <!-- /.card-body -->
                                                </div>
                                                <!-- /.card-posting-time -->

                                                <div class="card card-warning ">
                                                    <div class="card-header">
                                                        <h3 class="card-title"><span class="mr-2">2</span>CONTENT SOURCE
                                                        </h3>

                                                        <div class="card-tools">
                                                            <button type="button" class="btn btn-tool"
                                                                data-card-widget="collapse"><i class="fas fa-minus"></i>
                                                            </button>
                                                        </div>
                                                        <!-- /.card-tools -->
                                                    </div>
                                                    <!-- /.card-header -->
                                                    <div class="card-body ">
                                                        <div class="row text-center">
                                                            <div class="col-sm-12 border-right">
                                                                <div class="btn-group btn-group-toggle"
                                                                    data-toggle="buttons">
                                                                    <label class="btn btn-secondary active">
                                                                        <input type="radio" name="content_source"
                                                                            id="option1" value="feed" autocomplete="off"
                                                                            checked> <i class="fas fa-file-alt"></i>
                                                                    </label>
                                                                    <label class="btn btn-secondary">
                                                                        <input type="radio" name="content_source"
                                                                            id="option2" value="youtube"
                                                                            autocomplete="off"> <i
                                                                            class="fab fa-youtube"></i>
                                                                    </label>

                                                                    <label class="btn btn-warning">
                                                                        <input type="radio" name="content_source"
                                                                            id="option1" value="myfeed"
                                                                            autocomplete="off"> <i
                                                                            class="fas fa-user mr-2"></i>My Feeds
                                                                    </label>

                                                                </div>
                                                            </div>
                                                            <!-- /.col -->
                                                        </div>
                                                    </div>
                                                    <!-- /.card-body -->
                                                </div>
                                                <!-- /.card-Select-Network -->

                                                <div class="card card-purple ">
                                                    <div class="card-header">
                                                        <h3 class="card-title"><span class="mr-2">3</span>SEARCH CONTENT
                                                        </h3>

                                                        <div class="card-tools">
                                                            <button type="button" class="btn btn-tool"
                                                                data-card-widget="collapse"><i class="fas fa-minus"></i>
                                                            </button>
                                                        </div>
                                                        <!-- /.card-tools -->
                                                    </div>
                                                    <!-- /.card-header -->
                                                    <div class="card-body">
                                                        <ul class="nav nav-tabs">
                                                            <li class="nav-item">
                                                                <a class="nav-link active" data-toggle="tab"
                                                                    href="#search"> <i
                                                                        class="fas fa-search align-self-center"></i>
                                                                    SEARCH</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link" data-toggle="tab" href="#topic"><i
                                                                        class="fas fa-list align-self-center"></i>
                                                                    TOPICS</a>
                                                            </li>
                                                        </ul>
                                                        <div class="tab-content">
                                                            <div class="tab-pane active container pt-3" id="search">
                                                                <div class="form-group ">
                                                                    <span class="d-flex">
                                                                        <input class="form-control" type="text"
                                                                            name="search_text"
                                                                            placeholder="Search text"><i
                                                                            class="fas fa-search align-self-center feed-submit"></i>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <div class="tab-pane container pt-3" id="topic">
                                                                <div class="form-group">
                                                                    <select name="search-topic"
                                                                        class="form-control select2bs4"
                                                                        style="width: 100%;">
                                                                        <option>Automotive</option>
                                                                        <option>Business </option>
                                                                        <option>Child Care</option>
                                                                        <option>Comics / Humor </option>
                                                                        <option>Dental </option>
                                                                        <option>Eye Care / Optical</option>
                                                                        <option> Fashion </option>
                                                                        <option> Finance</option>
                                                                        <option> Fitness </option>
                                                                        <option>Food / Recipes </option>
                                                                        <option>Gaming </option>
                                                                        <option> General Health / Medical </option>
                                                                        <option> Home Improvement </option>
                                                                        <option> Legal </option>
                                                                        <option> Marketing </option>
                                                                        <option> Pet Care / Health </option>
                                                                        <option> Social Media </option>
                                                                        <option> Tech </option>
                                                                        <option> Trending News </option>
                                                                        <option> World News </option>
                                                                        <option> inspirational </option>
                                                                        <option> recreational </option>
                                                                        <option> conversational </option>
                                                                        <option> tips and tricks </option>
                                                                        <option> latest news </option>
                                                                        <option> travel </option>
                                                                        <option> dentist </option>
                                                                        <option> healthcare </option>
                                                                        <option> hvac </option>
                                                                        <option> veterinarian </option>
                                                                        <option> chiropractor </option>
                                                                        <option> auto repair </option>
                                                                        <option> landscaping </option>
                                                                        <option> spa health & beauty </option>
                                                                        <option> lawyer </option>
                                                                        <option> accountant </option>
                                                                        <option> moving </option>
                                                                        <option> pest control </option>
                                                                        <option> roofing </option>
                                                                        <option> carpet cleaning </option>
                                                                        <option> cosmetic surgery </option>
                                                                        <option> weight loss </option>
                                                                        <option> residential cleaning </option>
                                                                        <option> residential contractor </option>
                                                                        <option>child care </option>
                                                                        <option> gym </option>
                                                                        <option> plumbing </option>
                                                                        <option> pet grooming </option>
                                                                        <option> audio - hearing aids </option>
                                                                        <option>electrician </option>
                                                                        <option> painting </option>
                                                                        <option> dermatologyst </option>
                                                                        <option>patio / paving contractor </option>
                                                                        <option>physical therapy </option>
                                                                        <option> fence company </option>
                                                                        <option>architect </option>
                                                                        <option>water damage restoration services
                                                                        </option>
                                                                        <option>property management companies </option>
                                                                        <option> interior decorator </option>
                                                                        <option> divorce lawyer </option>
                                                                        <option> realtor </option>
                                                                        <option> mortgage loan companies </option>
                                                                        <option> martial arts school </option>
                                                                        <option> orthodontist </option>
                                                                        <option>hair replacement </option>
                                                                        <option> tile company </option>
                                                                        <option> cafe/restaurant </option>
                                                                        <option> private schools </option>
                                                                        <option> storage </option>
                                                                        <option> locksmith </option>
                                                                        <option> personal injury attorney </option>
                                                                        <option> bankruptcy attorney </option>
                                                                        <option> family law </option>
                                                                        <option> financial planning </option>
                                                                        <option> it companies </option>
                                                                        <option>hr / payroll services </option>
                                                                        <option> appliance repair </option>
                                                                        <option> security alarm </option>
                                                                        <option> curtains, blinds, shutters </option>
                                                                        <option> bail bond </option>
                                                                        <option> civil engeneer services </option>
                                                                        <option> funeral services </option>
                                                                        <option> printing services </option>
                                                                        <option> mattress </option>
                                                                        <option> window / doors company </option>
                                                                        <option> automotive sales </option>
                                                                        <option> fire protection </option>
                                                                        <option> home inspection </option>
                                                                        <option> tire sales </option>
                                                                        <option> solar company </option>
                                                                        <option> sign company </option>
                                                                        <option>dry clearners </option>
                                                                        <option> pharmacy </option>
                                                                        <option> obgyn </option>
                                                                        <option> bed & breaksfast</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>


                                                    </div>
                                                    <!-- /.card-body -->
                                                </div>
                                                <!-- /.card-posting-time -->

                                            </div>
                                            <!-- /.card-body -->


                                        </div>
                                        <!-- /.card -->
                                    </div>
                                    <!--column-4-->
                                    <div class="col-lg-9">
                                        <div class="card">
                                            <div class="card-header">
                                                <h3 class="card-title text-uppercase"><i class="fas fa-bars mr-2"></i>
                                                    Content Sites Found <span class="badge bg-navy feed-count"> 0</span>
                                                </h3>
                                                <div class="card-tools">
                                                    <div class="dropdown tir">
                                                        <button class="box-whir dropbtn orange-button"> <i
                                                                class="nav-icon fas fa-cog"></i> Action <img
                                                                src="assets/img/dots.svg" alt=""> <i
                                                                class="nav-icon fas fa-chevron-down"></i></button>
                                                        <div id="myDropdown" class="dropdown-content">
                                                            <a href="" class="td-none">
                                                                <div class="box407AFE"> <i
                                                                        class="nav-icon fas fa-plus"></i> Add To My
                                                                    Feeds</div>
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
                                                                    <input class="" type="checkbox" id="customCheckbox1"
                                                                        value="option1">
                                                                </div>
                                                            </th>
                                                            <th>SITE NAME</th>
                                                            <th>SITE URL</th>
                                                            <th>POST</th>
                                                            <th>LAST UPDATE DATE
                                                                OF RSS</th>
                                                            <th>ACTIONS</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="conres">

                                                    </tbody>
                                                    </tfoot>
                                                </table>
                                                <table id="example2" class="table table-bordered table-striped">
                                                    <thead>
                                                        <tr class="float-right">
                                                            <td>
                                                                <button class="btn btn-secondary" id="backtofeed"><i
                                                                        class="fa fa-arrow-left"></i> Back</button>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th>
                                                                <div class=" custom-checkbox">
                                                                    <input class="" type="checkbox" id="customCheckbox1"
                                                                        value="option1">
                                                                </div>
                                                            </th>
                                                            <th>SITE NAME</th>
                                                            <th>POST IMAGE</th>
                                                            <th>POST CONTENT</th>
                                                            <th>DATE</th>
                                                            <th>ACTIONS</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="conres2">

                                                    </tbody>
                                                    </tfoot>
                                                </table>
                                            </div>
                                            <!-- /.card-body -->
                                            <div class="card-footer clearfix">

                                                <button type="button" class="btn btn-danger float-right ml-2"> <i
                                                        class="nav-icon fas fa-thumbs-down mr-2"></i> Disapprove
                                                    All</button>
                                                <button type="button" class="btn btn-primary float-right"> <i
                                                        class="nav-icon fas fa-eye mr-2"></i> View Selected</button>
                                            </div>
                                        </div>
                                        <!-- /.card -->
                                    </div>
                                    <!--column-8-->
                                </div>
                                <!--row-->
                            </div>
                            <!--custom-tabs-three-research-->
                            <div class="tab-pane fade show " id="custom-tabs-three-content" role="tabpanel"
                                aria-labelledby="custom-tabs-three-content-tab">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title text-uppercase"><i class="fas fa-bars mr-2"></i> Total
                                            Content Packages
                                            <span class="badge bg-navy ml-2">14</span></h3>
                                        <div class="card-tools">

                                        </div>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <table id="content-package" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Content Package Name</th>
                                                    <th>Date Created</th>
                                                    <th>Type</th>
                                                    <th># of posts</th>

                                                    <th>ACTIONS</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <!--row-start-1-->
                                                @foreach ($con_pack as $pack)
                                                <tr>
                                                    <td>
                                                        <ul class="icon-list">
                                                            <li class="address-name"><i
                                                                    class="nav-icon fa fa-user"></i><a href="#">
                                                                    {{$pack->name}}</a></li>

                                                        </ul>
                                                    </td>
                                                    <td>
                                                        <div class="address">
                                                            <ul class="icon-list">

                                                                <li class="address-street"><i
                                                                        class="nav-icon fas fa-calendar-alt"></i>{{date('m/d/Y', strtotime($pack->created_at))}}
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </td>
                                                    <td>Me
                                                    </td>
                                                    <td>{{$pack->post_count}}</td>

                                                    <td>
                                                        <div class="btn-group btn-group-sm">
                                                            <a href="#" class="btn bg-white mr-1"><i
                                                                    class="nav-icon fas fa-eye "></i></a>
                                                            <a href="#" class="btn bg-white mr-1"><i
                                                                    class="nav-icon fas fa fa-edit"></i></a>
                                                            <a href="{{url('/post-package/delete/'.$pack->id)}}" class="btn bg-white"><i
                                                                    class="nav-icon fas fa-trash-alt"></i></a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                @endforeach

                                                <!--row-end-->
                                                </tfoot>
                                        </table>
                                    </div>
                                    <!-- /.card-body -->

                                </div>
                                <!-- /.card -->
                            </div>
                            <!--custom-tabs-three-content-->


                            <div class="tab-pane fade show " id="custom-tabs-three-marketplace" role="tabpanel"
                                aria-labelledby="custom-tabs-three-marketplace-tab">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title text-uppercase"><i class="fas fa-bars mr-2"></i> Total
                                            Content Packages
                                            <span class="badge bg-navy ml-2">43</span></h3>
                                        <div class="card-tools">

                                        </div>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <table id="marketplace" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>CONTANT PACKAGE NAME</th>
                                                    <th>CATEGORY</th>
                                                    <th>PACKAGE DESCRIPTION</th>
                                                    <th># of posts</th>

                                                    <th>ACTIONS</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <!--row-start-1-->
                                                <tr>
                                                    <td>5881</td>
                                                    <td>
                                                        <ul class="icon-list">
                                                            <li class="address-name"><i
                                                                    class="nav-icon fa fa-gift"></i><a href="#">
                                                                    Automotive BONUS 30 posts</a></li>

                                                        </ul>
                                                    </td>

                                                    <td>Automotive BONUS 30 posts
                                                    </td>
                                                    <td>This is a Community Bonus Package for Automotive 30 posts</td>
                                                    <td>30</td>
                                                    <td>
                                                        <div class="btn-group btn-group-sm">
                                                            <a href="#" class="btn bg-white mr-1"><i
                                                                    class="nav-icon fas fa-eye "></i></a>

                                                            <a href="#" class="btn bg-white"><i
                                                                    class="nav-icon fas fa-plus"></i></a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <!--row-end-->
                                                <!--row-start-2-->
                                                <tr>
                                                    <td>3787</td>
                                                    <td>
                                                        <ul class="icon-list">
                                                            <li class="address-name"><i
                                                                    class="nav-icon fa fa-gift"></i><a href="#"> Lawyer
                                                                    90 Days</a></li>

                                                        </ul>
                                                    </td>

                                                    <td>Lawyer
                                                    </td>
                                                    <td>Lawyer Package for 90 posts</td>
                                                    <td>95</td>
                                                    <td>
                                                        <div class="btn-group btn-group-sm">
                                                            <a href="#" class="btn bg-white mr-1"><i
                                                                    class="nav-icon fas fa-eye "></i></a>

                                                            <a href="#" class="btn bg-white"><i
                                                                    class="nav-icon fas fa-plus"></i></a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <!--row-end-->
                                                <!--row-start-3-->
                                                <tr>
                                                    <td>3787</td>
                                                    <td>
                                                        <ul class="icon-list">
                                                            <li class="address-name"><i
                                                                    class="nav-icon fa fa-gift"></i><a href="#">
                                                                    Accountact 90 Days</a></li>

                                                        </ul>
                                                    </td>

                                                    <td>Accountant
                                                    </td>
                                                    <td>Accountant Package for 90 Posts</td>
                                                    <td>90</td>
                                                    <td>
                                                        <div class="btn-group btn-group-sm">
                                                            <a href="#" class="btn bg-white mr-1"><i
                                                                    class="nav-icon fas fa-eye "></i></a>

                                                            <a href="#" class="btn bg-white"><i
                                                                    class="nav-icon fas fa-plus"></i></a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <!--row-end-->



                                                </tfoot>
                                        </table>
                                    </div>
                                    <!-- /.card-body -->

                                </div>
                                <!-- /.card -->
                            </div>
                            <!--custom-tabs-three-marketplace-->

                        </div>
                        <!--custom-tabs-three-tabContent-->
                    </div>
                    <!--column-8-->




            </section>
            <!-- /.Left col -->

        </div>
        <!-- /.row (main row) -->

    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->

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
<script src="../../plugins/toastr/toastr.min.js"></script>
<!-- DataTables -->
<script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script>
    $(function () {
   
   
    $("#content-package").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
   
    $("#marketplace").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
   
  });
  //Initialize Select2 Elements
  $('.select2bs4').select2({
      theme: 'bootstrap4'
    })
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

       //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    $('.my-colorpicker2').on('colorpickerChange', function(event) {
      $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
    });

    $("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    });

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
<script>
    $(document).ready(function () {
    var tab_body = $('#conres');
    var post_body = $('#conres2');
    var trbody = '';
    var result;
    var feedval;
    var consrc = $('input[name="content_source"]:checked').val();
    $('.feed-submit').on('click', function() {
        tab_body.empty();
        $('#example2').css('display', 'none');
        $("#example2").dataTable().fnDestroy()
        trbody= '';
        var fcount;
        var que = $('input[name="search_text"]').val();
        if(consrc == 'feed' && que != ''){
            $.ajax({
                url:"https://cloud.feedly.com/v3/search/feeds?query="+que+"&count=100",
                method:"GET",
                dataType:false,
                contentType:false,
                cache:false,
                processData:false,
                    success: function(tr){  
                        $('#example1').css('display', 'block');

                        result = tr['results'];
                        $.each(result, function(key, value) {
                            var date;
                            date = new Date(value['lastUpdated']);
                            year  = date.getFullYear();
                            month = (date.getMonth() + 1).toString().padStart(2, "0");
                            day   = date.getDate().toString().padStart(2, "0");
                            
                            trbody = trbody + ' <tr>'+
                                        '<td>'+
                                            '<div class=" custom-checkbox">'+
                                                '<input class="" type="checkbox" id="customCheckbox1" '+
                                                    'value="'+key+'">'+
                                           '</div>'+
                                        '</td>'+
                                        '<td>'+
                                            '<div class="address">'+
                                                '<ul class="icon-list">'+
                                                    '<li class="address-name" value="'+value['feedId']+'"><i '+
                                                            'class="nav-icon fas fa-file-alt"></i><a '+
                                                           'href="#"> '+value['title']+'</a></li>'+

                                                '</ul>'+
                                            '</div>'+
                                        '</td>'+
                                        '<td>'+
                                            '<div class="address">'+
                                                '<ul class="icon-list">'+

                                                    '<li class="address-street"><i '+
                                                            'class="nav-icon fas fa-globe-europe"></i>'+
                                                        ''+value['website']+'</li>'+
                                                '</ul>'+
                                            '</div>'+
                                        '</td>'+
                                        '<td>50+</td>'+
                                        '<td>'+
                                            '<ul class="icon-list">'+

                                                '<li class="address-street"><i '+
                                                        'class="nav-icon fas fa-calendar-alt"></i>'+month + '/' + day + '/' + year+
                                                '</li>'+
                                            '</ul>'+
                                        '</td>'+
                                        '<td>'+
                                            '<div class="btn-group btn-group-sm">'+
                                                '<a href="#" class="btn bg-white mr-1 address-name" value="'+value['feedId']+'"><i '+
                                                        'class="nav-icon fas fa-eye "></i></a>'+
                                                '<a href="#" class="btn bg-white mr-1"><i '+
                                                        'class="nav-icon fas fa-thumbs-up"></i></a>'+
                                                '<a href="#" class="btn bg-white"><i '+
                                                        'class="nav-icon fas fa-thumbs-down"></i></a>'+
                                            '</div>'+
                                        '</td>'+
                                    '</tr>';

                        });
                        
                        $('.feed-count').empty();
                        $('.feed-count').text(result.length);
                        $("#example1").dataTable().fnDestroy()
                        tab_body.empty();
                        post_body.empty();
                        tab_body.append(trbody);
                        // $.each(fcount, function(k, val) {
                        //     $("#fcount"+k).text(fcount[k]);
                        // });
                        $("#example1").DataTable({
                            "responsive": true,
                            "autoWidth": false,
                            });
                },
                    error: function(jq,status,message){
                        console.log(message+"error");
                        
                    // tab_body.empty();
                    //        tab_body.append(tr);
                        
                },

                complete: function() {
                    $('#example1').on('click','.address-name',function () {
                        $('#example1').css('display', 'none');
                        var postbody = '';
                        console.log(feedval = $(this).attr('value'));
                        $.ajax({
                        url:"https://cloud.feedly.com/v3/streams/contents?streamId="+feedval+"&count=100",
                        method:"GET",
                        dataType:false,
                        contentType:false,
                        cache:false,
                        processData:false,
                            success: function(feedcount){  
                                $('#example2').css('display', 'block');
                                fcount =  feedcount['items'];
                                console.log(fcount.length);
                                console.log(fcount);

                                $.each(fcount, function(key, value) {
                            var date;
                            date = new Date(value['published']);
                            year  = date.getFullYear();
                            month = (date.getMonth() + 1).toString().padStart(2, "0");
                            day   = date.getDate().toString().padStart(2, "0");
                            var hours = date.getHours();
                            var minutes = date.getMinutes();
                            var ampm = hours >= 12 ? 'pm' : 'am';
                            hours = hours % 12;
                            hours = hours ? hours : 12; // the hour '0' should be '12'
                            minutes = minutes < 10 ? '0'+minutes : minutes;
                            var time = hours + ':' + minutes + ' ' + ampm;
                            var image = '';
                            var content = '';
                            if(value.hasOwnProperty('visual')){
                                if(value['visual']['url'] == 'none'){
                                    image = 'https://upload.wikimedia.org/wikipedia/commons/thumb/a/ac/No_image_available.svg/1200px-No_image_available.svg.png';
                                }
                                else {
                                    image = value['visual']['url'];
                                }
                            }
                            else {
                                image = 'https://upload.wikimedia.org/wikipedia/commons/thumb/a/ac/No_image_available.svg/1200px-No_image_available.svg.png';
                            }
                            if(value.hasOwnProperty('summary')){
                                content = value['summary']['content'].replace( /(<([^>]+)>)/ig, '').split(' ').slice(0,100).join(' ');
                            }
                            else if(value.hasOwnProperty('content')){
                                content = value['content']['content'].replace( /(<([^>]+)>)/ig, '').split(' ').slice(0,100).join(' ');
                            }
                            
                            postbody = postbody + ' <tr>'+
                                        '<td>'+
                                            '<div class=" custom-checkbox">'+
                                                '<input class="" type="checkbox" id="customCheckbox1" '+
                                                    'value="'+key+'">'+
                                           '</div>'+
                                        '</td>'+
                                        '<td>'+
                                            '<div class="address">'+
                                                '<ul class="icon-list">'+
                                                    '<li><i '+
                                                            'class="nav-icon fas fa-file-alt"></i><a '+
                                                           'href="#"> '+value['title']+'</a></li>'+

                                                '</ul>'+
                                            '</div>'+
                                        '</td>'+
                                        '<td>'+
                                            '<div class="address">'+
                                                '<ul class="icon-list">'+

                                                    '<li class="address-street">'+
                                                        '<img width="150px" class="img-fluid" src="'+image+'"></li>'+
                                                '</ul>'+
                                            '</div>'+
                                        '</td>'+
                                        '<td><div class="content_post">'+
                                                '<ul class="icon-list">'+

                                                    '<li class="address-street">'+
                                                        ''+content+'</li>'+
                                                    '<li class="viewhover">'+
                                                        '<div class="btnhover"><i class="fas fa-eye position-unset"></i> 100 Word Exerpt '+
                                                        '<a href="'+value['alternate']['0']['href']+'" class="btn btn-warning text-white" >View full Content</a></div>'+
                                                        '</li>'+
                                                '</ul>'+
                                            '</div>'+
                                        '<td>'+
                                            '<ul class="icon-list">'+

                                                '<li class="address-street"><i '+
                                                        'class="nav-icon fas fa-calendar-alt"></i>'+month + '/' + day + '/' + year+
                                                '</li>'+
                                                '<li class="address-street"><i '+
                                                        'class="nav-icon fas fa-calendar-alt"></i>'+time+
                                                '</li>'+
                                            '</ul>'+
                                        '</td>'+
                                        '<td>'+
                                            '<div class="btn-group btn-group-sm">'+
                                                '<a href="'+value['alternate']['0']['href']+'" class="btn bg-white mr-1"><i '+
                                                        'class="nav-icon fas fa-link "></i></a>'+
                                                '<a href="#" class="btn bg-white mr-1"><i '+
                                                        'class="nav-icon fas fa-eye"></i></a>'+
                                                '<a href="#" class="btn bg-white"><i '+
                                                        'class="nav-icon fas fa-edit"></i></a>'+
                                                '<a href="#" class="btn bg-white mr-1"><i '+
                                                        'class="nav-icon fa fa-plus "></i></a>'+
                                                '<a href="#" class="btn bg-white mr-1"><i '+
                                                        'class="nav-icon fas fa-thumbs-up"></i></a>'+
                                                '<a href="#" class="btn bg-white"><i '+
                                                        'class="nav-icon fas fa-thumbs-down"></i></a>'+
                                                '<a href="#" class="btn bg-white"><i '+
                                                        'class="nav-icon fa fa-comment"></i></a>'+
                                            '</div>'+
                                        '</td>'+
                                    '</tr>';

                        });
                        $('.feed-count').empty();
                        $('.feed-count').text(fcount.length);
                        $("#example2").dataTable().fnDestroy()
                        $("#example1").dataTable().fnDestroy()
                        post_body.empty();
                        post_body.append(postbody);
                        // $.each(fcount, function(k, val) {
                        //     $("#fcount"+k).text(fcount[k]);
                        // });
                        $("#example2").DataTable({
                            "responsive": true,
                            "autoWidth": false,
                            });
                                
                            },
                    }); 
                        
                    });
                            }
                        });
        }
        
    });
    $('#backtofeed').click(function (){
        $('.feed-count').empty();
        $('.feed-count').text(result.length);
        $('#example2').css('display', 'none');
        $("#example2").dataTable().fnDestroy()
        $('#example1').css('display', 'block');
        $("#example1").DataTable({
            "responsive": true,
            "autoWidth": false,
            });
    });

    $('#new_pack').click(function() {
        var newpack = $('input[name="new_package"]').val();
        var options ="";
        if(newpack == ''){
            $('#new_pack_error').append("Please Enter Name of New Package");
        }
        else{
            $.ajax({
                type: "POST",
                url: '/ajax-add-package',
                data: {"_token": "{{ csrf_token() }}", newpack:newpack},
                success: function( msg ) {
                        toastr.success(msg['success']);
                        $('input[name="new_package"]').val('');
                        console.log(msg['package']);
                        $('select[name="package"]').empty();
                        $.each(msg['package'], function(key, value) {
                            if(value == newpack){
                            options = options + "<option selected value='"+key+"'>"+value+"</option>";
                            }
                            else{
                            options = options + "<option value='"+key+"'>"+value+"</option>";
                            }
                        });
                        $('select[name="package"]').append(options);
                }
            });

        }
    });

    $('select[name="search-topic"]').change(function (){
        tab_body.empty();
        $('#example2').css('display', 'none');
        $("#example2").dataTable().fnDestroy()
        trbody = '';
        var fcount;
        var que = $(this).children('option:selected').val();
        if(consrc == 'feed' && que != ''){
            $.ajax({
                url:"https://cloud.feedly.com/v3/search/feeds?query="+que+"&count=100",
                method:"GET",
                dataType:false,
                contentType:false,
                cache:false,
                processData:false,
                    success: function(tr){  
                        $('#example1').css('display', 'block');

                        result = tr['results'];
                        $.each(result, function(key, value) {
                            var date;
                            date = new Date(value['lastUpdated']);
                            year  = date.getFullYear();
                            month = (date.getMonth() + 1).toString().padStart(2, "0");
                            day   = date.getDate().toString().padStart(2, "0");
                            
                            trbody = trbody + ' <tr>'+
                                        '<td>'+
                                            '<div class=" custom-checkbox">'+
                                                '<input class="" type="checkbox" id="customCheckbox1" '+
                                                    'value="'+key+'">'+
                                           '</div>'+
                                        '</td>'+
                                        '<td>'+
                                            '<div class="address">'+
                                                '<ul class="icon-list">'+
                                                    '<li class="address-name" value="'+value['feedId']+'"><i '+
                                                            'class="nav-icon fas fa-file-alt"></i><a '+
                                                           'href="#"> '+value['title']+'</a></li>'+

                                                '</ul>'+
                                            '</div>'+
                                        '</td>'+
                                        '<td>'+
                                            '<div class="address">'+
                                                '<ul class="icon-list">'+

                                                    '<li class="address-street"><i '+
                                                            'class="nav-icon fas fa-globe-europe"></i>'+
                                                        ''+value['website']+'</li>'+
                                                '</ul>'+
                                            '</div>'+
                                        '</td>'+
                                        '<td>50+</td>'+
                                        '<td>'+
                                            '<ul class="icon-list">'+

                                                '<li class="address-street"><i '+
                                                        'class="nav-icon fas fa-calendar-alt"></i>'+month + '/' + day + '/' + year+
                                                '</li>'+
                                            '</ul>'+
                                        '</td>'+
                                        '<td>'+
                                            '<div class="btn-group btn-group-sm">'+
                                                '<a href="#" class="btn bg-white mr-1 address-name" value="'+value['feedId']+'"><i '+
                                                        'class="nav-icon fas fa-eye "></i></a>'+
                                                '<a href="#" class="btn bg-white mr-1"><i '+
                                                        'class="nav-icon fas fa-thumbs-up"></i></a>'+
                                                '<a href="#" class="btn bg-white"><i '+
                                                        'class="nav-icon fas fa-thumbs-down"></i></a>'+
                                            '</div>'+
                                        '</td>'+
                                    '</tr>';

                        });
                        $('.feed-count').empty();
                        $('.feed-count').text(result.length);
                        $("#example1").dataTable().fnDestroy()
                        tab_body.empty();
                        post_body.empty();
                        tab_body.append(trbody);
                        // $.each(fcount, function(k, val) {
                        //     $("#fcount"+k).text(fcount[k]);
                        // });
                        $("#example1").DataTable({
                            "responsive": true,
                            "autoWidth": false,
                            });
                },
                    error: function(jq,status,message){
                        console.log(message+"error");
                        
                    // tab_body.empty();
                    //        tab_body.append(tr);
                        
                },

                complete: function() {
                    $('#example1').on('click','.address-name',function () {
                        $('#example1').css('display', 'none');
                        var postbody = '';
                        console.log(feedval = $(this).attr('value'));
                        $.ajax({
                        url:"https://cloud.feedly.com/v3/streams/contents?streamId="+feedval+"&count=100",
                        method:"GET",
                        dataType:false,
                        contentType:false,
                        cache:false,
                        processData:false,
                            success: function(feedcount){  
                                $('#example2').css('display', 'block');
                                fcount =  feedcount['items'];
                                console.log(fcount.length);
                                console.log(fcount);

                                $.each(fcount, function(key, value) {
                            var date;
                            date = new Date(value['published']);
                            year  = date.getFullYear();
                            month = (date.getMonth() + 1).toString().padStart(2, "0");
                            day   = date.getDate().toString().padStart(2, "0");
                            var hours = date.getHours();
                            var minutes = date.getMinutes();
                            var ampm = hours >= 12 ? 'pm' : 'am';
                            hours = hours % 12;
                            hours = hours ? hours : 12; // the hour '0' should be '12'
                            minutes = minutes < 10 ? '0'+minutes : minutes;
                            var time = hours + ':' + minutes + ' ' + ampm;
                            var image = '';
                            var content = '';
                            if(value.hasOwnProperty('visual')){
                                if(value['visual']['url'] == 'none'){
                                    image = 'https://upload.wikimedia.org/wikipedia/commons/thumb/a/ac/No_image_available.svg/1200px-No_image_available.svg.png';
                                }
                                else {
                                    image = value['visual']['url'];
                                }
                            }
                            else {
                                image = 'https://upload.wikimedia.org/wikipedia/commons/thumb/a/ac/No_image_available.svg/1200px-No_image_available.svg.png';
                            }
                            if(value.hasOwnProperty('summary')){
                                content = value['summary']['content'].replace( /(<([^>]+)>)/ig, '').split(' ').slice(0,100).join(' ');
                            }
                            else if(value.hasOwnProperty('content')){
                                content = value['content']['content'].replace( /(<([^>]+)>)/ig, '').split(' ').slice(0,100).join(' ');
                            }
                            
                            postbody = postbody + ' <tr>'+
                                        '<td>'+
                                            '<div class=" custom-checkbox">'+
                                                '<input class="" type="checkbox" id="customCheckbox1" '+
                                                    'value="'+key+'">'+
                                           '</div>'+
                                        '</td>'+
                                        '<td>'+
                                            '<div class="address">'+
                                                '<ul class="icon-list">'+
                                                    '<li><i '+
                                                            'class="nav-icon fas fa-file-alt"></i><a '+
                                                           'href="#"> '+value['title']+'</a></li>'+
                                                           '<input name="title" type="hidden" '+
                                                    'value="'+value['title']+'">'+
                                                '</ul>'+
                                            '</div>'+
                                        '</td>'+
                                        '<td>'+
                                            '<div class="address">'+
                                                '<ul class="icon-list">'+

                                                    '<li class="address-street">'+
                                                        '<img width="150px" class="img-fluid" src="'+image+'"></li>'+
                                                        '<input name="img_link" type="hidden" '+
                                                    'value="'+image+'">'+
                                                '</ul>'+
                                            '</div>'+
                                        '</td>'+
                                        '<td><div class="content_post">'+
                                                '<ul class="icon-list">'+
                                                    '<input name="content" type="hidden" '+
                                                    'value="'+content+'">'+
                                                    '<input name="post_link" type="hidden" '+
                                                    'value="'+value['alternate']['0']['href']+'">'+
                                                    '<li class="address-street">'+
                                                        ''+content+'</li>'+
                                                    '<li class="viewhover">'+
                                                        '<div class="btnhover"><i class="fas fa-eye position-unset"></i> 100 Word Exerpt '+
                                                        '<a href="'+value['alternate']['0']['href']+'" class="btn btn-warning text-white" >View full Content</a></div>'+
                                                        '</li>'+
                                                '</ul>'+
                                            '</div>'+
                                        '<td>'+
                                            '<ul class="icon-list">'+

                                                '<li class="address-street"><i '+
                                                        'class="nav-icon fas fa-calendar-alt"></i>'+month + '/' + day + '/' + year+
                                                '</li>'+
                                                '<li class="address-street"><i '+
                                                        'class="nav-icon fas fa-calendar-alt"></i>'+time+
                                                '</li>'+
                                            '</ul>'+
                                        '</td>'+
                                        '<td>'+
                                            '<div class="btn-group btn-group-sm">'+
                                                '<a href="'+value['alternate']['0']['href']+'" class="btn bg-white mr-1"><i '+
                                                        'class="nav-icon fas fa-link "></i></a>'+
                                                '<a href="#" class="btn bg-white mr-1"><i '+
                                                        'class="nav-icon fas fa-eye"></i></a>'+
                                                '<a href="#" class="btn bg-white"><i '+
                                                        'class="nav-icon fas fa-edit"></i></a>'+
                                                '<a href="javascript:void(0);" class="btn bg-white mr-1 submitform"><i '+
                                                        'class="nav-icon fa fa-plus "></i></a>'+
                                                '<a href="#" class="btn bg-white mr-1"><i '+
                                                        'class="nav-icon fas fa-thumbs-up"></i></a>'+
                                                '<a href="#" class="btn bg-white"><i '+
                                                        'class="nav-icon fas fa-thumbs-down"></i></a>'+
                                                '<a href="#" class="btn bg-white"><i '+
                                                        'class="nav-icon fa fa-comment"></i></a>'+
                                            '</div>'+
                                        '</td>'+
                                    '</tr>';

                        });
                        $('.feed-count').empty();
                        $('.feed-count').text(fcount.length);
                        $("#example2").dataTable().fnDestroy()
                        $("#example1").dataTable().fnDestroy()
                        post_body.empty();
                        post_body.append(postbody);
                        // $.each(fcount, function(k, val) {
                        //     $("#fcount"+k).text(fcount[k]);
                        // });
                        $("#example2").DataTable({
                            "responsive": true,
                            "autoWidth": false,
                            });
                                
                            },


                            complete: function() {
                                $('.submitform').click(function() {
                                    if($('select[name="package"]').val() == 0 ){
                                        $('#package_error').empty();
                                        $('#package_error').append("Please Select Package to Save Post")
                                        $('html, body').animate({
                                            scrollTop: $(".package_scroll").offset().top
                                        }, 20);
                                    }
                                    else{
                                        $('#package_error').empty();
                                        var package = $('select[name="package"]').val();
                                        var title = $(this).parents('tr').find('input[name="title"]').val();
                                        var content = $(this).parents('tr').find('input[name="content"]').val();
                                        var post_link = $(this).parents('tr').find('input[name="post_link"]').val();
                                        var img_link = $(this).parents('tr').find('input[name="img_link"]').val();

                                    $.ajax({
                                        type: "POST",
                                        url: '/ajax-add-content',
                                        data: {"_token": "{{ csrf_token() }}", package:package ,title:title, content:content, post_link:post_link, img_link:img_link},
                                        success: function( msg ) {
                                                toastr.success(msg['success']);
                                        }
                                    });
                                    }
                                });
                            },
                    }); 
                        
                    });
                            }
                        });
        }
    });
   
});

</script>

@endsection