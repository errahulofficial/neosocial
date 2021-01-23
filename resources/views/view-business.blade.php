@extends('layouts.master')
@section('content')
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
<meta name="_token" content="{{ csrf_token() }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.css" integrity="sha256-jKV9n9bkk/CTP8zbtEtnKaKf+ehRovOYeKoyfthwbC8=" crossorigin="anonymous" />
  
<style>
.preview {
  overflow: hidden;
  width: 160px; 
  height: 160px;
  margin: 10px;
  border: 1px solid red;
}
.img-container{
    display: none
}
   
    .nav {
        display: inline-flex !important;
    }

    .op-6 {
        opacity: 0.6;
    }
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

    .table-unstriped  > thead > tr:nth-of-type(odd),
    .table-unstriped  > tbody > tr:nth-of-type(odd),
    .table-unstriped > tbody > tr:nth-of-type(even) {
    background-color: transparent !important ;
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
                    <li class="breadcrumb-item active">Landing Pages</li>
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
            <section class="col-lg-12 connectedSortable business-content">

                <div class="card">
                    <div class="card-header">
                        <ul class="nav nav-pills inline-flex" id="custom-tabs-three-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="custom-tabs-three-summary-tab" data-toggle="pill"
                                    href="#custom-tabs-three-summary" role="tab"
                                    aria-controls="custom-tabs-three-summary" aria-selected="true"><i
                                        class="fas fa-chart-bar  mr-1"></i> SUMMARY</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" id="custom-tabs-three-schduling-tab" data-toggle="pill"
                                    href="#custom-tabs-three-schduling" role="tab"
                                    aria-controls="custom-tabs-three-schduling" aria-selected="false"><i
                                        class="fas fa-calendar-day mr-1"></i> CONTENT SCHDULING
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" id="custom-tabs-three-setup-tab" data-toggle="pill"
                                    href="#custom-tabs-three-setup" role="tab" aria-controls="custom-tabs-three-setup"
                                    aria-selected="false"><i class="fas fa-cogs mr-1"></i> SETUP
                                </a>
                            </li>

                        </ul>
                        <div class="card-tools">
                            <div class="btn-group">
                                <a type="button" href="{{url('/post/add-single')}}"
                                    class="btn mr-2  bg-gradient-warning text-uppercase nav-link btn-sm"><i
                                        class="nav-icon fas fa-plus mr-1"></i> Single-post</a>
                                <a type="button" href="{{url('/post-multiple/add')}}"
                                    class="btn bg-gradient-primary text-uppercase nav-link btn-sm"><i
                                        class="nav-icon fas fa-plus mr-1"></i> Multi-post</a>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="tab-content" id="custom-tabs-three-tabContent">
                            <div class="tab-pane fade show active" id="custom-tabs-three-summary" role="tabpanel"
                                aria-labelledby="custom-tabs-three-summary-tab">
                                <div class="card card-outline card-primary">
                                    <div class="card-header justify-content-between align-items-center ui-sortable-handle"
                                        style="cursor: move;">
                                        <h3 class="card-title text-uppercase"><i
                                                class="nav-icon far fa-clock text-danger mr-2"></i> UPCOMING POSTS</h3>


                                        <div class="card-tools">
                                            <button type="button"
                                                class="btn  bg-gradient-primary btn-sm text-uppercase"><i
                                                    class="fas fas fa-eye mr-2"></i>ALL POSTS</button>
                                        </div>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">

                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>POST DATE</th>
                                                    <th>POSTING NETWORKS</th>
                                                    <th>POST</th>
                                                    <th>TYPE</th>
                                                    <th>ACTIONS</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($upcoming_posts as $u_post)
                                                <tr>
                                                    <td>
                                                        <ul class="icon-list">
                                                            <li class="address-street"><i
                                                                    class="nav-icon fas fa-calendar-alt"></i>
                                                                {{date('d/m/Y', strtotime($u_post->posting_time))}}
                                                            </li>
                                                            <li class="address-street"><i
                                                                    class="nav-icon fas fa-clock"></i>
                                                                {{date('h:i A', strtotime($u_post->posting_time))}}</li>
                                                        </ul>
                                                    </td>
                                                    <td>
                                                        <div class="social-icons">
                                                            <ul>
                                                                @if($u_post->fb_share_active != false)
                                                                <li class="bg-blue"><i
                                                                        class="nav-icon fab fa-facebook-f"></i></li>

                                                                @else
                                                                <li class="bg-gray op-6"><i
                                                                        class="nav-icon fab fa-facebook-f"></i></li>

                                                                @endif
                                                                @if($u_post->tw_share_active != false)
                                                                <li class="bg-lightblue"><i
                                                                        class="nav-icon fab fa-twitter"></i></li>

                                                                @else
                                                                <li class="bg-gray op-6"><i
                                                                        class="nav-icon fab fa-twitter"></i></li>

                                                                @endif
                                                                @if($u_post->in_share_active != false)
                                                                <li class="bg-orange"><i
                                                                        class="nav-icon fab fa-instagram"></i></li>

                                                                @else
                                                                <li class="bg-gray op-6"><i
                                                                        class="nav-icon fab fa-instagram"></i></li>

                                                                @endif
                                                                @if($u_post->gb_share_active != false)
                                                                <li class="bg-success"><i
                                                                        class="nav-icon fab fa-google"></i></li>

                                                                @else
                                                                <li class="bg-gray op-6"><i
                                                                        class="nav-icon fab fa-google"></i></li>

                                                                @endif


                                                            </ul>
                                                        </div>
                                                    </td>
                                                    <td>
                                                    <img width="60px" src="{{$u_post->image_link == '' ? '/'.$u_post->img_dir.'/'.$u_post->image : $u_post->image_link}}" alt=""> {{$u_post->post}} {{$u_post->post_link}}
                                                    </td>
                                                    <td>

                                                        <h6> <i
                                                                class="nav-icon fas fa-comment text-primary mr-2"></i>{{$u_post->type}}
                                                        </h6>


                                                    </td>
                                                    <td>
                                                        <div class="btn-group btn-group-sm">
                                                            <div href="#" class="btn bg-white mr-1"><i
                                                                    class="nav-icon fas fa-eye "></i></div>
                                                            <div href="#" class="btn bg-white mr-1" data-toggle="modal"
                                                                data-target="#edit-posts{{$u_post->id}}"><i
                                                                    class="nav-icon fas fa-edit"></i></div>
                                                            <!--Modal-Edit-Post-->
                                                            {!!Form::open(['action' => ['PostController@update', $u_post->id] , 'id' => 'form'])!!}
                                                            {!!Form::token()!!}
                                                            <div class="modal fade" id="edit-posts{{$u_post->id}}">
                                                                <div class="modal-dialog modal-lg">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h4 class="modal-title"> <i
                                                                                    class="nav-icon fas fa-comment text-primary mr-2"></i>Post
                                                                            </h4>
                                                                            <button type="button" class="close"
                                                                                data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <div class="card card-primary card-outline">

                                                                                <!-- /.card-header -->
                                                                                <div class="card-header">
                                                                                    <h3 class="card-title">
                                                                                        <i
                                                                                            class="nav-icon fas fa-edit mr-2"></i>
                                                                                        Edit Post
                                                                                    </h3>

                                                                                    <div class="card-tools">

                                                                                    </div>
                                                                                </div>
                                                                                <div class="card-body">

                                                                                    <table class="table table-unstriped">
                                                                                        <thead>
                                                                                            <tr>
                                                                                                <th style="width: 50%;">
                                                                                                    {{$u_post->link}}</th>
                                                                                                <th> <i class=" fas far fa-clock mr-1"></i>{{date('h:i A', strtotime($u_post->posting_time))}}</th>
                                                                                                    <th><i class=" fas fa-calendar-alt mr-1"></i>{{date('Y-m-d', strtotime($u_post->posting_time))}}</th>
                                                                                                    <th><i class=" fas fa-map-marker-alt mr-1"></i>{{$business->time_zone}}</th>
                                                                                            </tr>

                                                                                        </thead>
                                                                                        <tbody>

                                                                                            <tr class="text-center">
                                                                                                <td colspan="4"><img width="360px"
                                                                                                        class="img-fluid"
                                                                                                        src="{{$u_post->image_link == '' ? asset('/'.$u_post->img_dir.'/'.$u_post->image) : $u_post->image_link}}">
                                                                                                    <input type="hidden"
                                                                                                        name="img_link{{$u_post->id}}"
                                                                                                        value="{{$u_post->image_link == '' ? asset('/'.$u_post->img_dir.'/'.$u_post->image) : $u_post->image_link}}">
                                                                                                    <button
                                                                                                        onclick="return false"
                                                                                                        class="btn orange-button btn-block mt-2"
                                                                                                        data-toggle="modal"
                                                                                                        data-target="#modal-upload{{$u_post->id}}"><i
                                                                                                            class=" fas fa-cloud-upload-alt mr-2"></i>
                                                                                                        Update
                                                                                                        Image</button>
                                                                                                </td>


                                                                                                <!-- Modal-preview -->
                                                                                                <div class="modal fade"
                                                                                                    id="modal-upload{{$u_post->id}}">
                                                                                                    <div
                                                                                                        class="modal-dialog modal-lg">
                                                                                                        <div
                                                                                                            class="modal-content">
                                                                                                            <div
                                                                                                                class="modal-header">
                                                                                                                <h4
                                                                                                                    class="modal-title">
                                                                                                                </h4>
                                                                                                                <button
                                                                                                                    type="button"
                                                                                                                    class="close"
                                                                                                                    data-dismiss="modal"
                                                                                                                    aria-label="Close">
                                                                                                                    <span
                                                                                                                        aria-hidden="true">&times;</span>
                                                                                                                </button>
                                                                                                            </div>
                                                                                                            <div
                                                                                                                class="modal-body">
                                                                                                                <div
                                                                                                                    class="card card-primary card-outline card-outline-tabs">
                                                                                                                    <div
                                                                                                                        class="card-header p-0 border-bottom-0">
                                                                                                                        <ul class="nav nav-tabs"
                                                                                                                            id="custom-tabs-four-tab"
                                                                                                                            role="tablist">
                                                                                                                            <li
                                                                                                                                class="nav-item">
                                                                                                                                <a class="nav-link active"
                                                                                                                                    id="custom-tabs-four-image-tab{{$u_post->id}}"
                                                                                                                                    data-toggle="pill"
                                                                                                                                    href="#custom-tabs-four-image{{$u_post->id}}"
                                                                                                                                    role="tab"
                                                                                                                                    aria-controls="custom-tabs-four-image{{$u_post->id}}"
                                                                                                                                    aria-selected="true">Image</a>
                                                                                                                            </li>
                                                                                                                            <li
                                                                                                                                class="nav-item">
                                                                                                                                <a class="nav-link"
                                                                                                                                    id="custom-tabs-four-video-tab"
                                                                                                                                    data-toggle="pill"
                                                                                                                                    href="#custom-tabs-four-video{{$u_post->id}}"
                                                                                                                                    role="tab"
                                                                                                                                    aria-controls="custom-tabs-four-video{{$u_post->id}}"
                                                                                                                                    aria-selected="false">Video</a>
                                                                                                                            </li>
                                                                                                                            <li
                                                                                                                                class="nav-item">
                                                                                                                                <a class="nav-link"
                                                                                                                                    id="custom-tabs-four-gifs-tab"
                                                                                                                                    data-toggle="pill"
                                                                                                                                    href="#custom-tabs-four-gifs{{$u_post->id}}"
                                                                                                                                    role="tab"
                                                                                                                                    aria-controls="custom-tabs-four-gifs{{$u_post->id}}"
                                                                                                                                    aria-selected="false">Gifs</a>
                                                                                                                            </li>

                                                                                                                        </ul>
                                                                                                                    </div>
                                                                                                                    <div
                                                                                                                        class="card-body">
                                                                                                                        <div class="tab-content"
                                                                                                                            id="custom-tabs-four-tabContent">
                                                                                                                            <div class="tab-pane fade show active"
                                                                                                                                id="custom-tabs-four-image{{$u_post->id}}"
                                                                                                                                role="tabpanel"
                                                                                                                                aria-labelledby="custom-tabs-four-image-tab{{$u_post->id}}">
                                                                                                                                <div
                                                                                                                                    class=" card-tabs">
                                                                                                                                    <div
                                                                                                                                        class="card-header p-0 pt-1 border-bottom-0">
                                                                                                                                        <ul class="nav "
                                                                                                                                            id="custom-tabs-three-tab"
                                                                                                                                            role="tablist">

                                                                                                                                            <li
                                                                                                                                                class="nav-item">
                                                                                                                                                <a class="nav-link active"
                                                                                                                                                    id="custom-tabs-three-current-tab{{$u_post->id}}"
                                                                                                                                                    data-toggle="pill"
                                                                                                                                                    href="#custom-tabs-three-current{{$u_post->id}}"
                                                                                                                                                    role="tab"
                                                                                                                                                    aria-controls="custom-tabs-three-current{{$u_post->id}}"
                                                                                                                                                    aria-selected="true">Current
                                                                                                                                                    Image</a>
                                                                                                                                            </li>
                                                                                                                                            <li
                                                                                                                                                class="nav-item">
                                                                                                                                                <a class="nav-link"
                                                                                                                                                    id="custom-tabs-three-gallery-tab"
                                                                                                                                                    data-toggle="pill"
                                                                                                                                                    href="#custom-tabs-three-gallery{{$u_post->id}}"
                                                                                                                                                    role="tab"
                                                                                                                                                    aria-controls="custom-tabs-three-gallery{{$u_post->id}}"
                                                                                                                                                    aria-selected="false">My
                                                                                                                                                    Gallery</a>
                                                                                                                                            </li>
                                                                                                                                            <li
                                                                                                                                                class="nav-item">
                                                                                                                                                <a class="nav-link"
                                                                                                                                                    id="custom-tabs-three-stock-tab"
                                                                                                                                                    data-toggle="pill"
                                                                                                                                                    href="#custom-tabs-three-stock{{$u_post->id}}"
                                                                                                                                                    role="tab"
                                                                                                                                                    aria-controls="custom-tabs-three-stock{{$u_post->id}}"
                                                                                                                                                    aria-selected="false">Stock
                                                                                                                                                    Gallery</a>
                                                                                                                                            </li>
                                                                                                                                            <li
                                                                                                                                                class="nav-item">
                                                                                                                                                <a class="nav-link"
                                                                                                                                                    id="custom-tabs-three-icon-tab"
                                                                                                                                                    data-toggle="pill"
                                                                                                                                                    href="#custom-tabs-three-icon{{$u_post->id}}"
                                                                                                                                                    role="tab"
                                                                                                                                                    aria-controls="custom-tabs-three-icon{{$u_post->id}}"
                                                                                                                                                    aria-selected="false">Icons</a>
                                                                                                                                            </li>
                                                                                                                                        </ul>
                                                                                                                                    </div>
                                                                                                                                    <div
                                                                                                                                        class="card-body">
                                                                                                                                        <div class="tab-content"
                                                                                                                                            id="custom-tabs-three-tabContent">
                                                                                                                                            <div class="tab-pane fade show active"
                                                                                                                                                id="custom-tabs-three-current{{$u_post->id}}"
                                                                                                                                                role="tabpanel"
                                                                                                                                                aria-labelledby="custom-tabs-three-current-tab{{$u_post->id}}">
                                                                                                                                                No
                                                                                                                                                Current
                                                                                                                                                Image
                                                                                                                                                <button
                                                                                                                                                    class="btn btn-success block  mt-5"><i
                                                                                                                                                        class=" fas fa-cloud-upload-alt mr-2"></i>
                                                                                                                                                    Upload
                                                                                                                                                    Image</button>
                                                                                                                                            </div>
                                                                                                                                            <div class="tab-pane fade"
                                                                                                                                                id="custom-tabs-three-gallery{{$u_post->id}}"
                                                                                                                                                role="tabpanel"
                                                                                                                                                aria-labelledby="custom-tabs-three-gallery-tab{{$u_post->id}}">
                                                                                                                                                <!--gallery-start-->
                                                                                                                                                <div
                                                                                                                                                    class="row">
                                                                                                                                                    @foreach ($images as $img)
                                                                                                                                                        
                                                                                                                                                    <div class="col-sm-2">
                                                                                                                                                        <label>
                                                                                                                                                            <input type="radio"
                                                                                                                                                                name="image_select{{$u_post->id}}" 
                                                                                                                                                                value="{{$img->id}}" 
                                                                                                                                                                alt="/{{$img->img_dir}}/{{$img->image}}"> 
                                                                                                                                                            <img src="/{{$img->img_dir}}/{{$img->image}}" 
                                                                                                                                                                class="img-fluid mb-2"
                                                                                                                                                                alt="white sample" />
                                                                                                                                                        </label>
                                                                                                                                                    </div>
                                                                                                                                                    @endforeach

                                                                                                                                                </div>
                                                                                                                                                <!--gallery-end-->
                                                                                                                                            </div>
                                                                                                                                            <div class="tab-pane fade"
                                                                                                                                                id="custom-tabs-three-stock{{$u_post->id}}"
                                                                                                                                                role="tabpanel"
                                                                                                                                                aria-labelledby="custom-tabs-three-stock-tab{{$u_post->id}}">
                                                                                                                                                <!--gallery-start-->
                                                                                                                                                <div
                                                                                                                                                    class="row">
                                                                                                                                                    <div
                                                                                                                                                        class="col-sm-2">
                                                                                                                                                        <a href="https://via.placeholder.com/1200/FFFFFF.png?text=1"
                                                                                                                                                            data-toggle="lightbox"
                                                                                                                                                            data-title="sample 1 - white"
                                                                                                                                                            data-gallery="gallery">
                                                                                                                                                            <img src="https://via.placeholder.com/300/FFFFFF?text=1"
                                                                                                                                                                class="img-fluid mb-2"
                                                                                                                                                                alt="white sample" />
                                                                                                                                                        </a>
                                                                                                                                                    </div>

                                                                                                                                                </div>
                                                                                                                                                <!--gallery-end-->
                                                                                                                                            </div>
                                                                                                                                            <div class="tab-pane fade"
                                                                                                                                                id="custom-tabs-three-icon{{$u_post->id}}"
                                                                                                                                                role="tabpanel"
                                                                                                                                                aria-labelledby="custom-tabs-three-icon-tab{{$u_post->id}}">
                                                                                                                                                Icons
                                                                                                                                            </div>
                                                                                                                                        </div>
                                                                                                                                    </div>
                                                                                                                                    <!-- /.card -->
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                            <div class="tab-pane fade"
                                                                                                                                id="custom-tabs-four-video{{$u_post->id}}"
                                                                                                                                role="tabpanel"
                                                                                                                                aria-labelledby="custom-tabs-four-video-tab{{$u_post->id}}">
                                                                                                                                Video
                                                                                                                            </div>
                                                                                                                            <div class="tab-pane fade"
                                                                                                                                id="custom-tabs-four-gifs{{$u_post->id}}"
                                                                                                                                role="tabpanel"
                                                                                                                                aria-labelledby="custom-tabs-four-gifs-tab{{$u_post->id}}">
                                                                                                                                Gifs
                                                                                                                            </div>

                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                    <!-- /.card -->
                                                                                                                </div>
                                                                                                                <!-- /.card -->
                                                                                                            </div>
                                                                                                            <div
                                                                                                                class="modal-footer justify-content-between">

                                                                                                                <button
                                                                                                                    onclick="return false"
                                                                                                                    class="btn btn-primary">
                                                                                                                    Select</button>
                                                                                                            </div>

                                                                                                        </div>
                                                                                                        <!-- /.modal-content -->
                                                                                                    </div>
                                                                                                    <!-- /.modal-dialog -->
                                                                                                </div>
                                                                                                <!-- /.modal -->

                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td>
                                                                                                    <div
                                                                                                        class="form-group">
                                                                                                        <select
                                                                                                            class="form-control token"
                                                                                                            name="token{{$u_post->id}}">
                                                                                                            <option
                                                                                                                value="[Company Name]">
                                                                                                                Company
                                                                                                                Name
                                                                                                            </option>
                                                                                                            <option
                                                                                                                value="[Niche]">
                                                                                                                Niche
                                                                                                            </option>
                                                                                                            <option
                                                                                                                value="[Phone Number]">
                                                                                                                Phone
                                                                                                                Number
                                                                                                            </option>
                                                                                                            <option
                                                                                                                value="[Address]">
                                                                                                                Address
                                                                                                            </option>
                                                                                                            <option
                                                                                                                value="[Owner's Name]">
                                                                                                                Owner"s
                                                                                                                Name
                                                                                                            </option>

                                                                                                        </select>
                                                                                                    </div>
                                                                                                </td>
                                                                                                <td colspan="3">
                                                                                                    <div
                                                                                                        class="float-right">
                                                                                                        <i
                                                                                                            class=" fab fa-twitter text-info mr-1"></i>Twitter:<span
                                                                                                            class="text-info mr-1 ml-1 count{{$u_post->id}}">0</span>/
                                                                                                        <span>280</span>
                                                                                                    </div>
                                                                                                </td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td colspan="4">
                                                                                                    <div
                                                                                                        class="form-group">

                                                                                                        <textarea
                                                                                                        id="post{{$u_post->id}}"
                                                                                                            name="post{{$u_post->id}}"
                                                                                                            class="form-control "
                                                                                                            rows="3" maxlength="280" 
                                                                                                            placeholder="Post text here ... ">{{$u_post->post}}</textarea>
                                                                                                    </div>
                                                                                                </td>
                                                                                            </tr>

                                                                                        </tbody>
                                                                                    </table>
                                                                                    
          <script>
                                                                                        $("#post{{ $u_post->id }}").keyup(function () {
                                                                                            var max = 280;
                                                                                            var len = $(this).val().length;
                                                                                            if (len > max) {
                                                                                              $(".count{{ $u_post->id }}").text(len).removeClass("text-info").addClass("text-danger");
                                                                                            }
                                                                                            else if (len < max) {
                                                                                              $(".count{{ $u_post->id }}").text(len).removeClass("text-danger").addClass("text-info");
                                                                                            }
                                                                                          });
                                                                                          </script>

                                                                                    
            <div class="row justify-content-around">
                <div class="social-share">
                  <label class="mr-2">Share On</label>
                  <div class="btn-group btn-group-toggle" data-toggle="buttons">
                    <label class="btn bg-blue">
                      <input type="hidden" name="facebook" value="0">
                      <input type="checkbox" name="facebook" value="1" checked > <i class="nav-icon fab fa-facebook-f"></i>
                    </label>
                    <label class="btn bg-lightblue">
                      <input type="hidden" name="twitter" value="0">
                      <input type="checkbox" name="twitter" value="1" checked > <i class="nav-icon fab fa-twitter"></i>
                    </label>
                    <label class="btn bg-orange">
                      <input type="hidden" name="instagram" value="0">
                      <input type="checkbox" name="instagram" value="1" checked > <i class="nav-icon fab fa-instagram"></i>
                    </label>
                    <label class="btn bg-success">
                      <input type="hidden" name="google" value="0">
                      <input type="checkbox" name="google" value="1" checked ><i class="nav-icon fab fa-google"></i>
                    </label>
                  </div>
                </div><!--social-share-->
                <div class="toggle d-flex align-items-center">
                  <div class="form-group m-0 ">
                    <label  class="mr-2"> LOGO</label>
                    <input type="hidden" name="my-logo" value="0">
              <input type="checkbox" name="my-logo" value="1" checked data-bootstrap-switch data-off-color="danger" data-on-color="success">
              </div>
                </div>
                <div class="form-group d-flex align-items-center mb-0">
                  <label class="mr-2">Select</label>
                  <select name="logo_type" class="form-control">
                    <option value="">- Select Type -</option>
                    <option>Light Logo</option>
                    <option>Original Logo</option>
                    <option>Dark Logo</option>
                   
                  </select>
                </div>

                <div class="form-group d-flex align-items-center mb-0">
                    <select class="form-control" name="logo_position">
                        <option value="">- Select Position -</option>
                        <option value="bottom-left">Bottom Left</option>
                        <option value="bottom-right">Bottom Right</option>
                        <option value="center">Center</option>
                        <option value="top-center">Center Top</option>
                        <option value="bottom-center">Center Bottom</option>
                        <option value="center-left">Center Left</option>
                        <option value="center-right">Center Right</option>
                        <option value="top-left">Top Left</option>
                        <option value="top-right">Top Right</option>
                    </select>
                </div>
                </div>
                                                                                    
                                                                                </div>
                                                                                <!-- card-body -->

                                                                            </div>
                                                                            <!-- card -->
                                                                        </div>
                                                                        <div
                                                                            class="modal-footer justify-content-between">
                                                                            <button type="button" data-toggle="modal" data-target="#reschduled{{$u_post->id}}" class="btn orange-button"><i class=" fas fa-calendar-alt"></i>  Reschedule</button>
                                                                            <!--Modal-Reschduled-Post-->
 <div class="modal fade" id="reschduled{{$u_post->id}}">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title"> <i class="nav-icon fas fa-calendar-alt text-primary mr-2"></i> RESCHEDULE POST</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="card card-primary card-outline">
            
            <!-- /.card-header -->
            <div class="card-header">
              <h3 class="card-title">
                <i class="nav-icon fas fa-calendar-alt mr-2"></i>
                RESCHEDULE POST
              </h3>
   
               <div class="card-tools">
               
               </div>
             </div>
           <div class="card-body">
             <div class="row">
               <div class="col-sm-12">
                <div class="card card-primary ">
                  <div class="card-header">
                    <h3 class="card-title"> POSTING DATE AND TIME</h3>
    
                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                      </button>
                    </div>
                    <!-- /.card-tools -->
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                    <div class="row">
                      <div class="col-sm-12">
                       
                        <div class="form-group row">
                          <label for="name" class="col-sm-3 col-form-label"><i class="fas fa-calendar-alt mr-2"></i>Date</label>
                          <div class="col-sm-9">
                            <div class="input-group date" id="reservationdate{{$u_post->id}}" data-target-input="nearest">
                              <input type="text" name="date" class="form-control datetimepicker-input" data-target="#reservationdate{{$u_post->id}}"/>
                              <div class="input-group-append" data-target="#reservationdate{{$u_post->id}}" data-toggle="datetimepicker">
                                  <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                              </div>
                          </div>
                          </div>
                        </div><!--form-group-->
                        <div class="form-group row">
                          <label for="name" class="col-sm-3 col-form-label"><i class=" far fa-clock mr-2"></i>Time</label>
                          <div class="col-sm-9">
                            <div class="input-group date" id="timepicker{{$u_post->id}}" data-target-input="nearest">
                              <input type="text" name="time" class="form-control datetimepicker-input" data-target="#timepicker{{$u_post->id}}"/>
                              <div class="input-group-append" data-target="#timepicker{{$u_post->id}}" data-toggle="datetimepicker">
                                  <div class="input-group-text"><i class="far fa-clock"></i></div>
                              </div>
                              </div>
                            <!-- /.input group -->
                          </div>
                        </div><!--form-group-->
                        </div><!--column-12-->
                        </div><!--row-->
  
                       
                           
                  </div>
                  <!-- /.card-body -->
                </div><!--card-->

               </div>
               
             </div>
             
           </div>
            <!-- /.card-body -->
          
          </div>
          <!-- /.card -->
        </div>
       
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->
  

                                                                            
                                                                            <button type="submit"
                                                                                class="btn btn-primary"><i
                                                                                    class=" fa fa-check"></i>
                                                                                Save</button>
                                                                        </div>

                                                                        
                                                                    </div>
                                                                    <!--modal-content -->
                                                                </div>
                                                                <!-- modal-dialog -->
                                                            </div>
                                                            <!-- modal -->
                                                            {!!Form::close()!!}

                                                            <a href="{{url('/post/delete-single/'.$u_post->id)}}"
                                                                class="btn bg-white"><i
                                                                    class="nav-icon fas fa-trash-alt"></i></a>
                                                        </div>
                                                    </td>

                                                </tr>
                                                
                                                <script>
                                                    
                                                    $(document).ready(function () {
                                                      //Date range picker
							 $("#reservationdate{{$u_post->id}}").datetimepicker({
							      format: "L"
							  });
							
							  //Timepicker
							  $("#timepicker{{$u_post->id}}").datetimepicker({
							    format: "LT"
							  });
  
                                                    $('select[name="token{{$u_post->id}}"]').change(function(){
                                                        var token = $(this).children("option:selected").val();
                                                        var post = $('textarea[name="post{{$u_post->id}}"]').val();
                                                        var newpost = post +' '+ token;
                                                        $('textarea[name="post{{$u_post->id}}"]').val(newpost);
                                                        });
                                                        });
                                                    </script>
                                                @endforeach

                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /.card-body -->
                                    <!-- /.card-body -->
                                </div>
                            </div>
                            <!---summary-->

                            <div class="tab-pane fade show " id="custom-tabs-three-schduling" role="tabpanel"
                                aria-labelledby="custom-tabs-three-schduling-tab">

                                <ul class="nav nav-tabs inline-flex" id="custom-tabs-three-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="custom-tabs-three-posting-tab" data-toggle="pill"
                                            href="#custom-tabs-three-posting" role="tab"
                                            aria-controls="custom-tabs-three-posting" aria-selected="true"><i
                                                class="fas fa-calendar-day  mr-1"></i>POSTING SCHEDULE </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="custom-tabs-three-posted-tab" data-toggle="pill"
                                            href="#custom-tabs-three-posted" role="tab"
                                            aria-controls="custom-tabs-three-posted" aria-selected="false"><i
                                                class="fas fa-list mr-1"></i> POSTED LOG
                                        </a>
                                    </li>

                                </ul>

                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="card">




                                            <div class="card-body">
                                                <div class="tab-content" id="custom-tabs-three-tabContent">
                                                    <div class="tab-pane fade show active"
                                                        id="custom-tabs-three-posting" role="tabpanel"
                                                        aria-labelledby="custom-tabs-three-posting-tab">

                                                        <ul class="nav nav-pills mb-2" id="custom-tabs-three-tab"
                                                            role="tablist">
                                                            <li class="nav-item">
                                                                <a class="nav-link active"
                                                                    id="custom-tabs-three-calendar-tab"
                                                                    data-toggle="pill"
                                                                    href="#custom-tabs-three-calendar" role="tab"
                                                                    aria-controls="custom-tabs-three-calendar"
                                                                    aria-selected="true"><i
                                                                        class="fas fa-calendar-alt mr-1"></i>
                                                                    Calendar</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link" id="custom-tabs-three-agenda-tab"
                                                                    data-toggle="pill" href="#custom-tabs-three-agenda"
                                                                    role="tab" aria-controls="custom-tabs-three-agenda"
                                                                    aria-selected="false"><i
                                                                        class=" fas fa-bars mr-1"></i> Agenda</a>
                                                            </li>


                                                        </ul>
                                                        <div class="tab-content" id="custom-tabs-three-tabContent">
                                                            <div class="tab-pane fade show active"
                                                                id="custom-tabs-three-calendar" role="tabpanel"
                                                                aria-labelledby="custom-tabs-three-calendar-tab">
                                                                <div class="card card-primary">
                                                                    <div class="card-body p-0">
                                                                        <!-- the events -->
                                                                        <div id="external-events">

                                                                        </div>
                                                                        <!-- THE CALENDAR -->
                                                                        <div id="calendar"></div>
                                                                    </div>
                                                                    <!-- /.card-body -->
                                                                </div>
                                                                <!-- /.card -->
                                                            </div>
                                                            <!--custom-tabs-three-research-->
                                                            <div class="tab-pane fade show "
                                                                id="custom-tabs-three-agenda" role="tabpanel"
                                                                aria-labelledby="custom-tabs-three-agenda-tab">
                                                                <div class="card">
                                                                    <div class="card-header ui-sortable-handle"
                                                                        style="cursor: move;">

                                                                        <div class="card-tools">
                                                                            <div class="dropdown tir">
                                                                                <button
                                                                                    class="box-whir dropbtn orange-button">
                                                                                    <i class="nav-icon fas fa-cog"></i>
                                                                                    Action <img
                                                                                        src="assets/img/dots.svg"
                                                                                        alt=""> <i
                                                                                        class="nav-icon fas fa-chevron-down"></i></button>
                                                                                <div id="myDropdown"
                                                                                    class="dropdown-content">
                                                                                    <a href="" class="td-none"
                                                                                        data-toggle="modal"
                                                                                        data-target="#modal-default">
                                                                                        <div class="box407AFE"> <i
                                                                                                class="nav-icon fas fa-play"></i>
                                                                                            Restart Selected Posts</div>
                                                                                    </a>
                                                                                    <a href="" class="td-none">
                                                                                        <div class="box407AFE"><i
                                                                                                class="nav-icon fas fa-pause"></i>
                                                                                            Pause Selected Posts</div>
                                                                                    </a>
                                                                                    <a href="" class="td-none">
                                                                                        <div class="box407AFE"><i
                                                                                                class="nav-icon fas fa-edit"></i>
                                                                                            Update Posting Networks
                                                                                        </div>
                                                                                    </a>
                                                                                    <a href="" class="td-none">
                                                                                        <div class="box407AFE"><i
                                                                                                class="nav-icon fas fa-cloud-download-alt"></i>
                                                                                            Export Selected</div>
                                                                                    </a>
                                                                                    <a href="" class="td-none">
                                                                                        <div class="box407AFE"><i
                                                                                                class="nav-icon fas fa-times"></i>
                                                                                            Delete Selected</div>
                                                                                    </a>

                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="card-body">
                                                                        <table class="table table-striped">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th>
                                                                                        <div class=" custom-checkbox">
                                                                                            <input class=""
                                                                                                type="checkbox"
                                                                                                id="customCheckbox1"
                                                                                                value="option1">
                                                                                        </div>
                                                                                    </th>
                                                                                    <th>POST DATE</th>
                                                                                    <th>POSTING NETWORKS</th>
                                                                                    <th>POST</th>
                                                                                    <th>TYPE</th>
                                                                                    <th>STATUS</th>
                                                                                    <th>ACTIONS</th>

                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>

                                                                                @foreach ($upcoming_posts as $u_post)
                                                                                <tr>
                                                                                    <td>
                                                                                        <div class=" custom-checkbox">
                                                                                            <input name="action[]"
                                                                                                class="" type="checkbox"
                                                                                                id="customCheckbox1"
                                                                                                value="{{$u_post->id}}">
                                                                                        </div>
                                                                                    </td>
                                                                                    <td>
                                                                                        <ul class="icon-list">
                                                                                            <li class="address-street">
                                                                                                <i
                                                                                                    class="nav-icon fas fa-calendar-alt"></i>
                                                                                                {{date('d/m/Y', strtotime($u_post->posting_time))}}
                                                                                            </li>
                                                                                            <li class="address-street">
                                                                                                <i
                                                                                                    class="nav-icon fas fa-clock"></i>
                                                                                                {{date('h:i A', strtotime($u_post->posting_time))}}
                                                                                            </li>
                                                                                        </ul>
                                                                                    </td>
                                                                                    <td>
                                                                                        <div class="social-icons">
                                                                                            <ul>
                                                                                                @if($u_post->fb_share_active
                                                                                                != false)
                                                                                                <li class="bg-blue"><i
                                                                                                        class="nav-icon fab fa-facebook-f"></i>
                                                                                                </li>

                                                                                                @else
                                                                                                <li
                                                                                                    class="bg-gray op-6">
                                                                                                    <i
                                                                                                        class="nav-icon fab fa-facebook-f"></i>
                                                                                                </li>

                                                                                                @endif
                                                                                                @if($u_post->tw_share_active
                                                                                                != false)
                                                                                                <li
                                                                                                    class="bg-lightblue">
                                                                                                    <i
                                                                                                        class="nav-icon fab fa-twitter"></i>
                                                                                                </li>

                                                                                                @else
                                                                                                <li
                                                                                                    class="bg-gray op-6">
                                                                                                    <i
                                                                                                        class="nav-icon fab fa-twitter"></i>
                                                                                                </li>

                                                                                                @endif
                                                                                                @if($u_post->in_share_active
                                                                                                != false)
                                                                                                <li class="bg-orange"><i
                                                                                                        class="nav-icon fab fa-instagram"></i>
                                                                                                </li>

                                                                                                @else
                                                                                                <li
                                                                                                    class="bg-gray op-6">
                                                                                                    <i
                                                                                                        class="nav-icon fab fa-instagram"></i>
                                                                                                </li>

                                                                                                @endif
                                                                                                @if($u_post->gb_share_active
                                                                                                != false)
                                                                                                <li class="bg-success">
                                                                                                    <i
                                                                                                        class="nav-icon fab fa-google"></i>
                                                                                                </li>

                                                                                                @else
                                                                                                <li
                                                                                                    class="bg-gray op-6">
                                                                                                    <i
                                                                                                        class="nav-icon fab fa-google"></i>
                                                                                                </li>

                                                                                                @endif


                                                                                            </ul>
                                                                                        </div>
                                                                                    </td>
                                                                                    <td>
                                                                                        {{$u_post->post}}
                                                                                        {{$u_post->post_link}}
                                                                                    </td>
                                                                                    <td>

                                                                                        <h6> <i
                                                                                                class="nav-icon fas fa-comment text-primary mr-2"></i>{{$u_post->type}}
                                                                                        </h6>


                                                                                    </td>
                                                                                    <td>
                                                                                        <h6>
                                                                                            @if($u_post->schedule_status
                                                                                            ==
                                                                                            true)
                                                                                            <i
                                                                                                class="nav-icon fas fa-calendar-check text-success mr-2"></i>Schduled
                                                                                            @else
                                                                                            <i
                                                                                                class="nav-icon fas fa-calendar-times text-gray mr-2"></i>Not
                                                                                            Scheduled
                                                                                            @endif
                                                                                        </h6>
                                                                                    </td>
                                                                                    <td>
                                                                                        <div
                                                                                            class="btn-group btn-group-sm">
                                                                                            <a href="#"
                                                                                                class="btn bg-white mr-1"><i
                                                                                                    class="nav-icon far fa-calendar-alt "></i></a>
                                                                                            <a href="#"
                                                                                                class="btn bg-white mr-1"><i
                                                                                                    class="nav-icon fas fa-pause "></i></a>
                                                                                            <a href="#"
                                                                                                class="btn bg-white mr-1"><i
                                                                                                    class="nav-icon fas fa-eye "></i></a>
                                                                                            <a href="#"
                                                                                                class="btn bg-white mr-1"><i
                                                                                                    class="nav-icon fas fa-edit"></i></a>
                                                                                            <a href="{{url('/post/delete-single/'.$u_post->id)}}"
                                                                                                class="btn bg-white"><i
                                                                                                    class="nav-icon fas fa-trash-alt"></i></a>
                                                                                        </div>
                                                                                    </td>

                                                                                </tr>
                                                                                @endforeach



                                                                            </tbody>
                                                                        </table>

                                                                    </div>




                                                                </div>
                                                                <!-- /.card -->
                                                            </div>
                                                            <!--custom-tabs-three-content-->




                                                        </div>
                                                        <!--custom-tabs-three-tabContent-->


                                                    </div>
                                                    <!--tab-Posting-->

                                                    <div class="tab-pane fade show " id="custom-tabs-three-posted"
                                                        role="tabpanel" aria-labelledby="custom-tabs-three-posted-tab">

                                                        <div class="card-body">
                                                            <table class="table table-striped">
                                                                <thead>
                                                                    <tr>

                                                                        <th>POST DATE</th>
                                                                        <th>POSTING NETWORKS</th>
                                                                        <th>POST</th>
                                                                        <th>TYPE</th>

                                                                        <th>ACTIONS</th>

                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @foreach ($log_posts as $l_post)
                                                                    <tr>
                                                                        <td>
                                                                            <ul class="icon-list">
                                                                                <li class="address-street"><i
                                                                                        class="nav-icon fas fa-phone-alt"></i>
                                                                                    {{date('d/m/Y', strtotime($l_post->posting_time))}}
                                                                                </li>
                                                                                <li class="address-street"><i
                                                                                        class="nav-icon fas fa-clock"></i>
                                                                                    {{date('h:i A', strtotime($l_post->posting_time))}}
                                                                                </li>
                                                                            </ul>
                                                                        </td>
                                                                        <td>
                                                                            <div class="social-icons">
                                                                                <ul>
                                                                                    @if($l_post->fb_share_active
                                                                                    != false)
                                                                                    <li class="bg-blue"><i
                                                                                            class="nav-icon fab fa-facebook-f"></i>
                                                                                    </li>

                                                                                    @else
                                                                                    <li class="bg-gray op-6">
                                                                                        <i
                                                                                            class="nav-icon fab fa-facebook-f"></i>
                                                                                    </li>

                                                                                    @endif
                                                                                    @if($l_post->tw_share_active
                                                                                    != false)
                                                                                    <li class="bg-lightblue">
                                                                                        <i
                                                                                            class="nav-icon fab fa-twitter"></i>
                                                                                    </li>

                                                                                    @else
                                                                                    <li class="bg-gray op-6">
                                                                                        <i
                                                                                            class="nav-icon fab fa-twitter"></i>
                                                                                    </li>

                                                                                    @endif
                                                                                    @if($l_post->in_share_active
                                                                                    != false)
                                                                                    <li class="bg-orange"><i
                                                                                            class="nav-icon fab fa-instagram"></i>
                                                                                    </li>

                                                                                    @else
                                                                                    <li class="bg-gray op-6">
                                                                                        <i
                                                                                            class="nav-icon fab fa-instagram"></i>
                                                                                    </li>

                                                                                    @endif
                                                                                    @if($l_post->gb_share_active
                                                                                    != false)
                                                                                    <li class="bg-success">
                                                                                        <i
                                                                                            class="nav-icon fab fa-google"></i>
                                                                                    </li>

                                                                                    @else
                                                                                    <li class="bg-gray op-6">
                                                                                        <i
                                                                                            class="nav-icon fab fa-google"></i>
                                                                                    </li>

                                                                                    @endif


                                                                                </ul>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            {{$l_post->post}}
                                                                            {{$l_post->post_link}}
                                                                        </td>
                                                                        <td>

                                                                            <h6> <i
                                                                                    class="nav-icon fas fa-comment text-primary mr-2"></i>{{$l_post->type}}
                                                                            </h6>


                                                                        </td>
                                                                        <td>
                                                                            <div class="btn-group btn-group-sm">
                                                                                <a href="#" class="btn bg-white mr-1"><i
                                                                                        class="nav-icon fas fa-sync-alt "></i></a>
                                                                                <a href="#" class="btn bg-white mr-1"><i
                                                                                        class="nav-icon fas fa-eye "></i></a>
                                                                                <a href="{{url('/post/delete-single/'.$l_post->id)}}"
                                                                                    class="btn bg-white"><i
                                                                                        class="nav-icon fas fa-trash-alt"></i></a>
                                                                            </div>
                                                                        </td>
                                                                    </tr>

                                                                    @endforeach



                                                                </tbody>
                                                            </table>

                                                        </div>
                                                        <!--Card-Body-->

                                                    </div>
                                                    <!--tab-posted-->
                                                </div>
                                                <!--tab-content-->
                                            </div>
                                            <!--card-body-->

                                        </div>
                                        <!-- /.card -->
                                    </div>
                                    <!--column-12-->
                                </div>
                                <!--row-->
                            </div>
                            <!---Schduling-->

                            <div class="tab-pane fade show " id="custom-tabs-three-setup" role="tabpanel"
                                aria-labelledby="custom-tabs-three-setup-tab">

                                <ul class="nav nav-tabs inline-flex" id="custom-tabs-three-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="custom-tabs-three-account-tab" data-toggle="pill"
                                            href="#custom-tabs-three-account" role="tab"
                                            aria-controls="custom-tabs-three-account" aria-selected="true"><i
                                                class="fas fa-calendar-day  mr-1"></i>ACCOUNT </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="custom-tabs-three-social-tab" data-toggle="pill"
                                            href="#custom-tabs-three-social" role="tab"
                                            aria-controls="custom-tabs-three-social" aria-selected="false"><i
                                                class="fas fa-list mr-1"></i> SOCIAL
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="custom-tabs-three-logo-tab" data-toggle="pill"
                                            href="#custom-tabs-three-logo" role="tab"
                                            aria-controls="custom-tabs-three-logo" aria-selected="false"><i
                                                class="fas fa-list mr-1"></i> LOGO SETUP
                                        </a>
                                    </li>

                                </ul>

                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="card">


                                            <div class="card-body">
                                                <div class="tab-content" id="custom-tabs-three-tabContent">
                                                    <div class="tab-pane fade show active"
                                                        id="custom-tabs-three-account" role="tabpanel"
                                                        aria-labelledby="custom-tabs-three-account-tab">
                                                        {!! Form::open(['action' => ['BusinessController@update',
                                                        $business->id], 'id' => 'form']) !!}
                                                        @csrf
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <div
                                                                    class="card card-primary card-outline card-outline-tabs">
                                                                    <div class="card-header p-0 border-bottom-0">

                                                                        <ul class="nav  nav-tabs"
                                                                            id="custom-tabs-three-tab" role="tablist">
                                                                            <li class="nav-item" id="local">
                                                                                <a class="nav-link  active"
                                                                                    id="custom-tabs-three-lbusiness-tab"
                                                                                    data-toggle="pill"
                                                                                    href="#custom-tabs-three-lbusiness"
                                                                                    role="tab"
                                                                                    aria-controls="custom-tabs-three-lbusiness"
                                                                                    aria-selected="true"> <i
                                                                                        class="nav-icon far fa-building mr-1"></i>Local
                                                                                    Business</a>
                                                                            </li>

                                                                            <li class="nav-item" id="online">
                                                                                <a class="nav-link"
                                                                                    id="custom-tabs-three-obusiness-tab"
                                                                                    data-toggle="pill"
                                                                                    href="#custom-tabs-three-obusiness"
                                                                                    role="tab"
                                                                                    aria-controls="custom-tabs-three-obusiness"
                                                                                    aria-selected="false"> <i
                                                                                        class="nav-icon fas fa-shopping-cart mr-1"></i>Online
                                                                                    Business</a>
                                                                            </li>

                                                                        </ul>

                                                                    </div>
                                                                    <input type="radio" name="business_type"
                                                                        value="local" id="lo_rad" checked
                                                                        style="display: none">
                                                                    <input type="radio" name="business_type"
                                                                        value="online" id="on_rad"
                                                                        style="display: none">

                                                                    <div class="card-body">
                                                                        <div class="tab-content"
                                                                            id="custom-tabs-three-tabContent">
                                                                            <div class="tab-pane fade show active"
                                                                                id="custom-tabs-three-lbusiness"
                                                                                role="tabpanel"
                                                                                aria-labelledby="custom-tabs-three-lbusiness-tab">


                                                                                <div class="form-group row mb-3">
                                                                                    <label for="name"
                                                                                        class="col-sm-3 col-form-label">Business
                                                                                        Name</label>
                                                                                    <div class="col-sm-9">
                                                                                        <div class="input-group ">
                                                                                            <div
                                                                                                class="input-group-prepend">
                                                                                                <span
                                                                                                    class="input-group-text"><i
                                                                                                        class="fas far fa-building"></i></span>
                                                                                            </div>
                                                                                            <input type="text"
                                                                                                name="l_bus_name"
                                                                                                class="form-control"
                                                                                                value="{{$business->b_name}}">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <!--form-group-->

                                                                                <div class="form-group row mb-3">
                                                                                    <label for="category"
                                                                                        class="col-sm-3 col-form-label">Business
                                                                                        Category</label>
                                                                                    <div class="col-sm-9">


                                                                                        <select id="b_category"
                                                                                            name="l_bus_category"
                                                                                            class="form-control select2bs4"
                                                                                            style="width: 100%;">
                                                                                            <option selected>
                                                                                                {{$business->category}}
                                                                                            <option>Accounting</option>
    <option>Chiropractor</option>
        <option>Dentist</option>
            <option>Dermatology</option>
                <option>Driving schools</option>
                    <option>Hairdressers - Ladies</option>
                        <option>Hairdressers - Men</option>
                            <option>Laser Hair Removal</option>
                                <option>Massage Therapist</option>
                                    <option>Naturopath</option>
                                        <option>Obstetrics and Gynecology</option>
                                            <option>Orthodontics</option>
                                                <option>Pediatrics</option>
<option>Pilates</option>
<option>Plastic surgery</option>
<option>Real Estate Agency</option>
<option>Used Car dealers</option>
<option>Veterinarian</option>
<option>Yoga</option>

                                                                                        </select>

                                                                                    </div>
                                                                                </div>
                                                                                <!--form-group-->

                                                                                <div class="form-group row mb-3">
                                                                                    <label for="phone"
                                                                                        class="col-sm-3 col-form-label">Phone</label>
                                                                                    <div class="col-sm-9">
                                                                                        <div class="input-group">
                                                                                            <div
                                                                                                class="input-group-prepend">
                                                                                                <span
                                                                                                    class="input-group-text"><i
                                                                                                        class="fas fa-phone"></i></span>
                                                                                            </div>
                                                                                            <input name="l_bus_phone"
                                                                                                value="{{$business->phone}}"
                                                                                                type="text"
                                                                                                class="form-control"
                                                                                                data-inputmask='"mask": "(999) 999-9999"'
                                                                                                data-mask>
                                                                                        </div>
                                                                                        <!-- /.input group -->
                                                                                    </div>
                                                                                </div>
                                                                                <!--form-group-->

                                                                                <div class="form-group row mb-3">
                                                                                    <label for="address"
                                                                                        class="col-sm-3 col-form-label">Address</label>
                                                                                    <div class="col-sm-9">
                                                                                        <div class="input-group mb-2">
                                                                                            <div
                                                                                                class="input-group-prepend">
                                                                                                <span
                                                                                                    class="input-group-text"><i
                                                                                                        class="fas fa-map-marker-alt"></i></span>
                                                                                            </div>
                                                                                            <input name="l_bus_address"
                                                                                                type="text"
                                                                                                class="form-control"
                                                                                                value="{{$business->address}}">
                                                                                        </div>
                                                                                        <div class="row">
                                                                                            <div class="col-sm-4">
                                                                                                <input name="l_bus_city"
                                                                                                    type="text"
                                                                                                    class="form-control"
                                                                                                    value="{{$business->city}}">
                                                                                            </div>
                                                                                            <div class="col-sm-4">
                                                                                                <input
                                                                                                    name="l_bus_state"
                                                                                                    type="text"
                                                                                                    class="form-control"
                                                                                                    value="{{$business->state}}">
                                                                                            </div>
                                                                                            <div class="col-sm-4">
                                                                                                <input name="l_bus_zip"
                                                                                                    type="text"
                                                                                                    class="form-control"
                                                                                                    value="{{$business->zip}}">
                                                                                            </div>
                                                                                        </div>

                                                                                    </div>
                                                                                </div>
                                                                                <!--form-group-->

                                                                                <div class="form-group row mb-3">
                                                                                    <label for="url"
                                                                                        class="col-sm-3 col-form-label">Website
                                                                                        URL</label>
                                                                                    <div class="col-sm-9">
                                                                                        <div class="input-group ">
                                                                                            <div
                                                                                                class="input-group-prepend">
                                                                                                <span
                                                                                                    class="input-group-text"><i
                                                                                                        class=" fas fa-link"></i></span>
                                                                                            </div>
                                                                                            <input name="l_bus_website"
                                                                                                type="text"
                                                                                                class="form-control"
                                                                                                value="{{$business->website}}">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <!--form-group-->

                                                                                <div class="form-group row mb-3">
                                                                                    <label for="Name"
                                                                                        class="col-sm-3 col-form-label">Contact
                                                                                        Name</label>
                                                                                    <div class="col-sm-9">
                                                                                        <div class="input-group ">
                                                                                            <div
                                                                                                class="input-group-prepend">
                                                                                                <span
                                                                                                    class="input-group-text"><i
                                                                                                        class="  fas fa-user"></i></span>
                                                                                            </div>
                                                                                            <input name="l_bus_fname"
                                                                                                type="text"
                                                                                                class="form-control"
                                                                                                value="{{$business->contact_fname}}">
                                                                                            <input name="l_bus_lname"
                                                                                                type="text"
                                                                                                class="form-control ml-2"
                                                                                                value="{{$business->contact_lname}}">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <!--form-group-->

                                                                                <div class="form-group row mb-3">
                                                                                    <label for="title"
                                                                                        class="col-sm-3 col-form-label">Title</label>
                                                                                    <div class="col-sm-9">
                                                                                        <div class="input-group ">
                                                                                            <div
                                                                                                class="input-group-prepend">
                                                                                                <span
                                                                                                    class="input-group-text"><i
                                                                                                        class=" fas fa-cog"></i></span>
                                                                                            </div>
                                                                                            <input name="l_bus_title"
                                                                                                type="text"
                                                                                                class="form-control"
                                                                                                value="{{$business->contact_title}}">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <!--form-group-->

                                                                                <div class="form-group row mb-3">
                                                                                    <label for="email"
                                                                                        class="col-sm-3 col-form-label">Email</label>
                                                                                    <div class="col-sm-9">
                                                                                        <div class="input-group ">
                                                                                            <div
                                                                                                class="input-group-prepend">
                                                                                                <span
                                                                                                    class="input-group-text"><i
                                                                                                        class=" fas fa-envelope"></i></span>
                                                                                            </div>
                                                                                            <input
                                                                                                name="l_bus_con_email"
                                                                                                type="email"
                                                                                                class="form-control"
                                                                                                value="{{$business->contact_email}}">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <!--form-group-->

                                                                                <div class="form-group row mb-3">
                                                                                    <label for="phone"
                                                                                        class="col-sm-3 col-form-label">Contact
                                                                                        Phone</label>
                                                                                    <div class="col-sm-9">
                                                                                        <div class="input-group">
                                                                                            <div
                                                                                                class="input-group-prepend">
                                                                                                <span
                                                                                                    class="input-group-text"><i
                                                                                                        class="fas fa-phone"></i></span>
                                                                                            </div>
                                                                                            <input
                                                                                                value="{{$business->contact_phone}}"
                                                                                                name="l_bus_con_phone"
                                                                                                type="text"
                                                                                                class="form-control"
                                                                                                data-inputmask='"mask": "(999) 999-9999"'
                                                                                                data-mask>
                                                                                        </div>
                                                                                        <!-- /.input group -->
                                                                                    </div>
                                                                                </div>
                                                                                <!--form-group-->






                                                                            </div>
                                                                            <!--local-business-End-->

                                                                            <div class="tab-pane fade show "
                                                                                id="custom-tabs-three-obusiness"
                                                                                role="tabpanel"
                                                                                aria-labelledby="custom-tabs-three-obusiness-tab">

                                                                                <div class="form-group row mb-3">
                                                                                    <label for="name"
                                                                                        class="col-sm-3 col-form-label">Business
                                                                                        Name</label>
                                                                                    <div class="col-sm-9">
                                                                                        <div class="input-group ">
                                                                                            <div
                                                                                                class="input-group-prepend">
                                                                                                <span
                                                                                                    class="input-group-text"><i
                                                                                                        class="fas fa-shopping-cart"></i></span>
                                                                                            </div>
                                                                                            <input name="o_bus_name"
                                                                                                value="{{$business->b_name}}"
                                                                                                type="text"
                                                                                                class="form-control"
                                                                                                placeholder="Business Name">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <!--form-group-->

                                                                                <div class="form-group row mb-3">
                                                                                    <label for="category"
                                                                                        class="col-sm-3 col-form-label">Business
                                                                                        Category</label>
                                                                                    <div class="col-sm-9">


                                                                                        <select name="o_bus_category"
                                                                                            class="form-control select2bs4"
                                                                                            style="width: 100%;">
                                                                                            <option selected>
                                                                                                {{$business->category}}
                                                                                            </option>
                                                                                            <option>Ecommerce </option>
                                                                                            <option>Affiliate </option>
                                                                                            <option>Business Consulting
                                                                                                Services
                                                                                            </option>
                                                                                            <option>Advertising
                                                                                            </option>
                                                                                            <option>Business Brokers
                                                                                            </option>
                                                                                            <option>Business Consultants
                                                                                            </option>
                                                                                            <option>Business Marketing
                                                                                            </option>
                                                                                            <option>Business Management
                                                                                            </option>
                                                                                            <option>Marketing Services
                                                                                            </option>
                                                                                            <option>Virtual assistant
                                                                                            </option>
                                                                                            <option>Marketing
                                                                                                Consultants
                                                                                            </option>
                                                                                            <option>Business Services
                                                                                            </option>
                                                                                            <option>Call Centers
                                                                                            </option>
                                                                                            <option>Business Marketing
                                                                                            </option>
                                                                                            <option>Staffing Agencies
                                                                                            </option>
                                                                                            <option>Staffing Agencies
                                                                                            </option>
                                                                                            <option>Education </option>
                                                                                            <option>Financial Services
                                                                                            </option>
                                                                                            <option>Accounting,
                                                                                                Auditing, &
                                                                                                Bookkeeping Services
                                                                                            </option>
                                                                                            <option>Accounting & Tax
                                                                                                Consultants
                                                                                            </option>
                                                                                            <option>Certified Public
                                                                                                Accountants
                                                                                            </option>
                                                                                            <option>Financial Counselors
                                                                                            </option>
                                                                                            <option>Financial Planning
                                                                                            </option>
                                                                                            <option>Investment Services
                                                                                            </option>
                                                                                            <option>Life Coaching
                                                                                            </option>
                                                                                            <option>Health & Wellness
                                                                                                Programs
                                                                                            </option>
                                                                                            <option>Insurance Services
                                                                                            </option>
                                                                                            <option>Health Insurance
                                                                                            </option>
                                                                                            <option>Business Insurance
                                                                                            </option>
                                                                                            <option>Car Insurance
                                                                                            </option>
                                                                                            <option>Life Insurance
                                                                                            </option>
                                                                                            <option>IT Services
                                                                                            </option>
                                                                                            <option>Computer Security
                                                                                            </option>
                                                                                            <option>Information
                                                                                                Technology
                                                                                                Services </option>
                                                                                            <option>Internet Products &
                                                                                                Services
                                                                                            </option>
                                                                                            <option>Multimedia Services
                                                                                            </option>
                                                                                            <option>Software Design &
                                                                                                Development </option>
                                                                                            <option>Website Design &
                                                                                                Development
                                                                                            </option>
                                                                                            <option>Legal Services
                                                                                            </option>
                                                                                            <option>Legal Consulting
                                                                                                Services
                                                                                            </option>
                                                                                            <option>Weight Loss &
                                                                                                Control
                                                                                            </option>
                                                                                            <option>Nutrition </option>
                                                                                            <option>Dietitians </option>
                                                                                            <option>Dance School
                                                                                            </option>
                                                                                            <option>Printing Services
                                                                                            </option>
                                                                                            <option>Private Education
                                                                                            </option>
                                                                                            <option>Travel Accommodation
                                                                                                Services </option>
                                                                                            <option>Accommodation
                                                                                                Reservations
                                                                                            </option>
                                                                                            <option>Travel Consultants
                                                                                            </option>
                                                                                            <option>Travel Agents
                                                                                            </option>
                                                                                            <option>Hotels and B&Bs
                                                                                            </option>
                                                                                            <option>Wedding Services
                                                                                            </option>
                                                                                            <option>Wedding Planners
                                                                                            </option>
                                                                                            <option>Wedding Receptions &
                                                                                                Parties
                                                                                            </option>
                                                                                            <option>Event Planning
                                                                                            </option>

                                                                                        </select>

                                                                                    </div>
                                                                                </div>
                                                                                <!--form-group-->

                                                                                <div class="form-group row mb-3">
                                                                                    <label for="niche"
                                                                                        class="col-sm-3 col-form-label">Niche</label>
                                                                                    <div class="col-sm-9">


                                                                                        <select name="o_bus_niche"
                                                                                            class="form-control select2bs4"
                                                                                            style="width: 100%;">
                                                                                            <option selected>
                                                                                                {{$business->niche}}
                                                                                            </option>
                                                                                            <option>Business & Finance
                                                                                            </option>
                                                                                            <option>Communication
                                                                                            </option>
                                                                                            <option>Computers / Internet
                                                                                            </option>
                                                                                            <option>Education </option>
                                                                                            <option>Empolyement Jobs
                                                                                            </option>
                                                                                            <option>Food & Culinary
                                                                                            </option>
                                                                                            <option>Green Products,
                                                                                            </option>
                                                                                            <option>Health & Fitness
                                                                                            </option>
                                                                                            <option>Marketing </option>
                                                                                            <option>Others </option>
                                                                                            <option>Parenting & Family
                                                                                            </option>
                                                                                            <option>Self Help / Growth
                                                                                            </option>
                                                                                            <option>Software </option>
                                                                                            <option>Travel </option>


                                                                                        </select>

                                                                                    </div>
                                                                                </div>
                                                                                <!--form-group-->

                                                                                <div class="form-group row mb-3">
                                                                                    <label for="url"
                                                                                        class="col-sm-3 col-form-label">Website
                                                                                        URL</label>
                                                                                    <div class="col-sm-9">
                                                                                        <div class="input-group ">
                                                                                            <div
                                                                                                class="input-group-prepend">
                                                                                                <span
                                                                                                    class="input-group-text"><i
                                                                                                        class=" fas fa-link"></i></span>
                                                                                            </div>
                                                                                            <input name="o_bus_website"
                                                                                                value="{{$business->website}}"
                                                                                                type="text"
                                                                                                class="form-control"
                                                                                                placeholder="http://www.example.com">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <!--form-group-->

                                                                                <div class="form-group row mb-3">
                                                                                    <label for="Name"
                                                                                        class="col-sm-3 col-form-label">Contact
                                                                                        Name</label>
                                                                                    <div class="col-sm-9">
                                                                                        <div class="input-group ">
                                                                                            <div
                                                                                                class="input-group-prepend">
                                                                                                <span
                                                                                                    class="input-group-text"><i
                                                                                                        class="  fas fa-user"></i></span>
                                                                                            </div>
                                                                                            <input name="o_bus_fname"
                                                                                                value="{{$business->contact_fname}}"
                                                                                                type="text"
                                                                                                class="form-control"
                                                                                                placeholder="First Name">
                                                                                            <input name="o_bus_lname"
                                                                                                value="{{$business->contact_lname}}"
                                                                                                type="text"
                                                                                                class="form-control ml-2"
                                                                                                placeholder="Last Name">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <!--form-group-->

                                                                                <div class="form-group row mb-3">
                                                                                    <label for="title"
                                                                                        class="col-sm-3 col-form-label">Title</label>
                                                                                    <div class="col-sm-9">
                                                                                        <div class="input-group ">
                                                                                            <div
                                                                                                class="input-group-prepend">
                                                                                                <span
                                                                                                    class="input-group-text"><i
                                                                                                        class=" fas fa-cog"></i></span>
                                                                                            </div>
                                                                                            <input name="o_bus_title"
                                                                                                value="{{$business->contact_title}}"
                                                                                                type="text"
                                                                                                class="form-control"
                                                                                                placeholder="Contact Title, Position">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <!--form-group-->

                                                                                <div class="form-group row mb-3">
                                                                                    <label for="email"
                                                                                        class="col-sm-3 col-form-label">Email</label>
                                                                                    <div class="col-sm-9">
                                                                                        <div class="input-group ">
                                                                                            <div
                                                                                                class="input-group-prepend">
                                                                                                <span
                                                                                                    class="input-group-text"><i
                                                                                                        class=" fas fa-envelope"></i></span>
                                                                                            </div>
                                                                                            <input
                                                                                                name="o_bus_con_email"
                                                                                                value="{{$business->contact_email}}"
                                                                                                type="email"
                                                                                                class="form-control"
                                                                                                placeholder="Email Address ...">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <!--form-group-->

                                                                                <div class="form-group row mb-3">
                                                                                    <label for="phone"
                                                                                        class="col-sm-3 col-form-label">Contact
                                                                                        Phone</label>
                                                                                    <div class="col-sm-9">
                                                                                        <div class="input-group">
                                                                                            <div
                                                                                                class="input-group-prepend">
                                                                                                <span
                                                                                                    class="input-group-text"><i
                                                                                                        class="fas fa-phone"></i></span>
                                                                                            </div>
                                                                                            <input
                                                                                                value="{{$business->contact_phone}}"
                                                                                                name="o_bus_con_phone"
                                                                                                type="text"
                                                                                                class="form-control"
                                                                                                data-inputmask='"mask": "(999) 999-9999"'
                                                                                                data-mask>
                                                                                        </div>
                                                                                        <!-- /.input group -->
                                                                                    </div>
                                                                                </div>
                                                                                <!--form-group-->


                                                                            </div>
                                                                            <!--online-business-End-->
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--column-6-->
                                                            <div class="col-lg-6">
                                                                <div class="card card-default">
                                                                    <div class="card-header">
                                                                        <h3 class="card-title">
                                                                            <i class="fas fa-play-circle mr-1"></i>
                                                                            Expert Tips Help Video
                                                                        </h3>

                                                                        <div class="card-tools">

                                                                        </div>
                                                                    </div>
                                                                    <!-- /.card-header -->
                                                                    <div class="card-body">
                                                                        <div class="row">
                                                                            <div class="col-12">



                                                                            </div>
                                                                            <!-- /.col -->
                                                                        </div>
                                                                        <!-- /.row -->
                                                                    </div>
                                                                    <!-- /.card-body -->


                                                                </div>
                                                                <!-- /.card -->
                                                            </div>
                                                        </div>

                                                        <div class="card-footer clearfix">
                                                            <button type="submit" class="btn btn-primary float-right">
                                                                Save
                                                                <i class="fas fa-chevron-right ml-2"></i></button>
                                                        </div>
                                                        {!! Form::close() !!}

                                                    </div>
                                                    <!--tab-Account-->

                                                    <div class="tab-pane fade show " id="custom-tabs-three-social"
                                                        role="tabpanel" aria-labelledby="custom-tabs-three-social-tab">

                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <div class="row">
                                                                    <div class="col-sm-6">
                                                                        <div class="card card-default">
                                                                            <div class="card-header">
                                                                                <h3 class="card-title">
                                                                                    <i
                                                                                        class="fas fa-share-alt mr-1"></i>
                                                                                    SOCIAL SETUP
                                                                                </h3>

                                                                                <div class="card-tools">

                                                                                </div>
                                                                            </div>
                                                                            <!-- /.card-header -->
                                                                            <div class="card-body">
                                                                                <div class="row">
                                                                                    <div class="col-12">
                                                                                        <ul
                                                                                            class="list-group list-group-unbordered mb-3">
                                                                                            <li
                                                                                                class="list-group-item ">
                                                                                                <a
                                                                                                    class="text-dark">Network</a><span
                                                                                                    class="float-right">API
                                                                                                    Connection</span>
                                                                                            </li>
                                                                                            {{-- <li class="list-group-item">
                                                                                    <a class="text-muted">Facebook
                                                                                        Profile</a><span
                                                                                        class="float-right"><button
                                                                                            class="btn bg-light btn-outline-danger"><i
                                                                                                class="fab fa-facebook-f"></i>
                                                                                            Connect</button></span>
                                                                                </li> --}}
                                                                                            @if ($business->hasfb ==
                                                                                            false)
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
                                                                                                <a href="{{url('/facebook/delete/'.$business->id)}}"
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
                                                                                                <a href="{{url('/twitter/delete/'.$business->id)}}"
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
                                                                                                <a href="{{url('/instagram/delete/'.$business->id)}}"
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
                                                                                                <a href="{{url('/google/delete/'.$business->id)}}"
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
                                                                    </div>
                                                                    <!--column-6-->
                                                                    <div class="col-sm-6">
                                                                        <div class="info-box bg-primary m-0">
                                                                            <span class="info-box-icon"><i
                                                                                    class="fas fa-network-wired"></i></span>

                                                                            <div class="info-box-content">
                                                                                <span class="info-box-text">CONNECTED
                                                                                    NETWORKS

                                                                                </span>


                                                                                <div class="progress ">
                                                                                    <div class="progress-bar"
                                                                                        style="width: 2%">
                                                                                    </div>
                                                                                </div>
                                                                                <span class="progress-description">
                                                                                    0%
                                                                                </span>
                                                                            </div>
                                                                            <!-- /.info-box-content -->
                                                                        </div>
                                                                        <!--info box-->

                                                                        <div class="info-box mt-3">
                                                                            <span class="info-box-icon bg-primary"><i
                                                                                    class="fas fa-users"></i></span>

                                                                            <div class="info-box-content">
                                                                                <span class="info-box-text">Total
                                                                                    Reach</span>
                                                                                <span class="info-box-number">0</span>
                                                                            </div>
                                                                            <!-- /.info-box-content -->
                                                                        </div>
                                                                    </div>
                                                                    <!--column-6-->
                                                                </div>


                                                            </div>
                                                            <!--column-6-->
                                                        </div>
                                                        <!--row-->
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <div class="card">
                                                                    <div class="card-header">
                                                                        <h3 class="card-title text-uppercase"><i
                                                                                class="nav-icon fas fa-link mr-2"></i>
                                                                            SOCIAL
                                                                            CONNECT LINK </h3>
                                                                        <div class="card-tools">
                                                                            <button type="button"
                                                                                class="btn  bg-gradient-primary btn-sm text-uppercase"
                                                                                data-toggle="modal"
                                                                                data-target="#send-email"><i
                                                                                    class="far fa-envelope mr-2"></i>SEND
                                                                                EMAIL</button>
                                                                        </div>
                                                                    </div>
                                                                     <div class="modal fade" id="send-email">
    {!!Form::open(['action' => ['MiscController@mailSend', $business->id]]) !!}
    {!!Form::token() !!}
    {!!Form::hidden('bus_id', $business->id) !!}
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title"><i class="far fa-envelope mr-3"></i>Send To Webmaster</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="card card-primary card-outline">
              
              <!-- /.card-header -->
              <div class="card-body">
  
                <div class="form-group row mb-2">
                  <div class="col-sm-6">
                    <div class="input-group ">
                      <div class="input-group-prepend">
                        <span class="input-group-text bg-primary"><i class="fas fas fa-user"></i></span>
                      </div>
                      <input name="fname" type="text" class="form-control" placeholder="Webmaster First Name">
                    </div>
                    </div><!--column-6-->
                  <div class="col-sm-6">
                  <div class="input-group ">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-primary"><i class="fas fas fa-user"></i></span>
                    </div>
                    <input name="lname" type="text" class="form-control" placeholder="Webmaster Last Name">
                  </div>
                  </div><!--column-6-->
                  </div><!--form-group-row-->
  
                  <div class="form-group row mb-2">
                    <div class="col-sm-6">
                      <div class="input-group ">
                        <div class="input-group-prepend">
                          <span class="input-group-text bg-primary">To</span>
                        </div>
                        <input name="sendto" type="email" class="form-control" placeholder="example@email.com" required>
                      </div>
                      </div><!--column-6-->
                    <div class="col-sm-6">
                    <div class="input-group ">
                      <div class="input-group-prepend">
                        <span class="input-group-text bg-primary">CC</span>
                      </div>
                      <input name="ccto" type="text" class="form-control" placeholder="example@email.com">
                    </div>
                    </div><!--column-6-->
                    </div><!--form-group-row-->
                    <div class="form-group row mb-2">
                      <div class="col-sm-12">
                        <div class="input-group ">
                          <div class="input-group-prepend">
                            <span class="input-group-text bg-primary"><i class="far fa-file-alt" ></i></span>
                          </div>
                          <input name="subject" type="text" class="form-control" value="Action Required: Connect Your Social Media">
                        </div>
                        </div><!--column-12-->
                     
                      </div><!--form-group-row-->
                <div class="form-group">
                    <textarea id="compose-textarea" name="mail_body" class="form-control" style="max-height: 300px">
                        
                        <p>Great News [Contact First Name],</p>

                        <p>We are ready to begin your social media management and get started posting to your social accounts.</p>
                        
                            <p>The problem is, we can’t access your social accounts and start engaging your customers until you connect them for us.</p>
                        
                            <p>INSTRUCTIONS:</p>
                        
                            <p><b>Step 1:</b> Click Here To ---> <a href="{{url('/social-setup/'.$business->id)}}">Connect Your Social Media Accounts!</a></p>
                        
                            <p><b>Step 2:</b> Click the social network you want to connect</p>
                        
                                <p><b>Step 3:</b> Each social network will ask you to sign in and then ask that you grant access to the app.</p>
                        
                        <p>Once you have connected your accounts you will start seeing your posts updated on your social networks!</p>
                        
                        <p>Please, If you have any questions call us at [Agency Phone number] or email us at [Agency email]</p>
                        
                        <p>Warm Regards,</p>
                        
                        <p>[Agency owner name]</p>
                        <img src="{{ asset('/img/blank.png') }}" hidden width="1" height="1" style="opacity: 0">
                        
                    </textarea>
                </div>
               
              </div>
              <!-- /.card-body -->
            
            </div>
            <!-- /.card -->
          </div>
          <div class="modal-footer text-right">
            
            <button type="submit" class="btn btn-primary"><i class="far fa-envelope"></i> Send</button>
          </div>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
      {!!Form::close() !!}
    </div>
    <!-- /.modal -->
                                                                    <!-- /.card-header -->
                                                                    <div class="card-body">
                                                                        <table id="social-connect"
                                                                            class="table table-bordered table-striped">
                                                                            <thead>
                                                                                <tr>

                                                                                    <th> EMAIL</th>
                                                                                    <th>SENT</th>
                                                                                    <th>OPEN</th>
                                                                                    <th>CLICKS</th>
                                                                                    <th>ACTIONS</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                            @foreach ($emails as $email)
                                                                                    <tr>
                                                                                        <td>
                                                                                            {{ $email->sendto }}
                                                                                        </td>
                                                                                        <td>
                                                                                            {{ date('d/m/Y', strtotime($email->sent_on)) }}
                                                                                        </td>
                                                                                        <td>
                                                                                            {{ $email->opened_on == '' ? '' : date('d/m/Y', strtotime($email->opened_on)) }}
                                                                                        </td>
                                                                                        <td>
                                                                                            {{ $email->clicked_on == '' ? '' : date('d/m/Y', strtotime($email->clicked_on)) }}
                                                                                        </td>
                                                                                        <td>
                                                                                            <a href="#" data-toggle="modal"
                                                                                            data-target="#view-email" ><i class="fas fa-paper-plane ml-2"></i></a>
                                                                                        </td>
                                                                                    </tr>
                                                                                    
  <div class="modal fade" id="view-email">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title"><i class="far fa-envelope mr-3"></i>Send To Webmaster</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="card card-primary card-outline">
            
            <!-- /.card-header -->
            <div class="card-body">

              <div class="form-group row mb-2">
                <div class="col-sm-6">
                  <div class="input-group ">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-primary"><i class="fas fas fa-user"></i></span>
                    </div>
                    <input type="text" class="form-control" placeholder="Webmaster First Name" disabled value="{{ $email->fname }}">
                  </div>
                  </div><!--column-6-->
                <div class="col-sm-6">
                <div class="input-group ">
                  <div class="input-group-prepend">
                    <span class="input-group-text bg-primary"><i class="fas fas fa-user"></i></span>
                  </div>
                  <input type="text" class="form-control" placeholder="Webmaster Last Name" disabled value="{{ $email->lname }}">
                </div>
                </div><!--column-6-->
                </div><!--form-group-row-->

                <div class="form-group row mb-2">
                  <div class="col-sm-6">
                    <div class="input-group ">
                      <div class="input-group-prepend">
                        <span class="input-group-text bg-primary">To</span>
                      </div>
                      <input type="email" class="form-control" placeholder="example@email.com" disabled value="{{ $email->sendto }}">
                    </div>
                    </div><!--column-6-->
                  <div class="col-sm-6">
                  <div class="input-group ">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-primary">CC</span>
                    </div>
                    <input type="text" class="form-control" placeholder="example@email.com" disabled value="{{ $email->ccto }}">
                  </div>
                  </div><!--column-6-->
                  </div><!--form-group-row-->
                  <div class="form-group row mb-2">
                    <div class="col-sm-12">
                      <div class="input-group ">
                        <div class="input-group-prepend">
                          <span class="input-group-text bg-primary"><i class="far fa-file-alt" ></i></span>
                        </div>
                        <input type="email" class="form-control" value="Action Required: Connect Your Social Media" disabled value="{{ $email->subject }}">
                      </div>
                      </div><!--column-12-->
                   
                    </div><!--form-group-row-->
              <div class="form-group">
                  <textarea id="compose-textarea1" class="form-control" style="height: 300px" disabled>
                   {{ $email->content }}
                  </textarea>
              </div>
             
            </div>
            <!-- /.card-body -->
          
          </div>
          <!-- /.card -->
        </div>
        {{-- <div class="modal-footer text-right">
          
          <button type="submit" class="btn btn-primary"><i class="far fa-envelope"></i> Send</button>
        </div> --}}
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->

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
                                                            </div>
                                                            <!--column-12-->
                                                        </div>


                                                    </div>
                                                    <!--tab-Social-->
                                                    <div class="tab-pane fade show " id="custom-tabs-three-logo"
                                                        role="tabpanel" aria-labelledby="custom-tabs-three-logo-tab">
                                                        <div class="container my-2 p-2" style="background-color: #dee2e6">
                                                            <div class="row">
                                                                <div class="col-md-8 align-self-center">
                                                                    <div class="text-center">
                                                                        <div><label for="exampleInputImage">Upload Logo: </label></div>
                                                                        <input type="hidden" name="bu_id" id="bu_id" value="{{ $business->id }}">
                                                                        <input type="file" name="image" id="image_up" class="image" required style="border: 1px solid;border-radius: 20px;">
                                                                        
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4 text-center">
                                                                    @if($business->business_logo == '')
                                                                    <span class="text-danger">{{ 'No Logo Selected' }} </span>
                                                                    @else
                                                                    <div>
                                                                        <label for="exampleInputImage">Business Logo: </label>
                                                                        </div>
                                                                    <img src="{{ asset('business-logo/'.$business->business_logo) }}" alt="">
                                                                    @endif
                                                                </div>
                                                                    
                                                            </div>
                                                        </div>
                                                                
                                                            <div class="img-container">
                                                                <div class="row">
                                                                    <div class="col-md-8">
                                                                        <img id="image" src="">
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="preview"></div>
                                                                        <div>
                                                                            <button style="margin-left: 10px" type="button" class="btn btn-primary" id="crop">Crop and Save</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                    </div>
                                                </div>
                                                <!--tab-content-->
                                            </div>
                                            <!--card-body-->

                                        </div>
                                        <!-- /.card -->
                                    </div>
                                    <!--column-12-->
                                </div>
                                <!--row-->
                            </div>
                            <!---Setup-->

                        </div>
                        <!---tab-content-->
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
<!-- Toastr -->
<script src="../../plugins/toastr/toastr.min.js"></script>
<!-- Select2 -->
<script src="../../plugins/select2/js/select2.full.min.js"></script>
<script src="{{asset('plugins/inputmask/min/jquery.inputmask.bundle.min.js')}}"></script>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.js" integrity="sha256-CgvH7sz3tHhkiVKh05kSUgG97YtzYNnWt6OXcmYzqHY=" crossorigin="anonymous"></script>


<script>
    $(document).ready(function () {


        $('#local').on('click' , function(){
    $('#lo_rad').prop('checked',true);
 
    });
  $('#online').on('click' , function(){
    $('#on_rad').prop('checked',true);
    
    });

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
  $('#compose-textarea1').summernote()
  $(document).mouseup(function (e) {
      var dropdown = $(".dropdown");
      if (!dropdown.is(e.target) && dropdown.has(e.target).length === 0) {
          $('.dropdown-content').removeClass('show');
      }
  });
</script>

<script>
    $(function () {
                
        if ( document.location.hash)
        {
            $(document.location.hash).addClass("active show").siblings().removeClass('active show');
            $('[href="'+document.location.hash+'"]').addClass("active").parents('.nav-item').siblings().find('.nav-link').removeClass('active');
            $('[href="'+document.location.hash+'"]').parents('.tab-pane').addClass('show active').siblings().removeClass('show active');
            var parentId = $('[href="'+document.location.hash+'"]').parents('.tab-pane').attr('id');
            $('[href="#'+parentId+'"]').addClass("active").parents('.nav-item').siblings().find('.nav-link').removeClass('active');
            $('[href="' + document.location.hash + '"]').tab('show');
            
            
        }
        
//Money Euro
$('[data-mask]').inputmask()

    /* initialize the external events
     -----------------------------------------------------------------*/
    function ini_events(ele) {
      ele.each(function () {

        // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
        // it doesn't need to have a start or end
        var eventObject = {
          title: $.trim($(this).text()) // use the element's text as the event title
        }

        // store the Event Object in the DOM element so we can get to it later
        $(this).data('eventObject', eventObject)

        // make the event draggable using jQuery UI
        $(this).draggable({
          zIndex        : 1070,
          revert        : true, // will cause the event to go back to its
          revertDuration: 0  //  original position after the drag
        })

      })
    }

    ini_events($('#external-events div.external-event'))

    /* initialize the calendar
     -----------------------------------------------------------------*/
    //Date for the calendar events (dummy data)
    var date = new Date()
    var d    = date.getDate(),
        m    = date.getMonth(),
        y    = date.getFullYear()

    var Calendar = FullCalendar.Calendar;
    var Draggable = FullCalendarInteraction.Draggable;

    var containerEl = document.getElementById('external-events');
    var checkbox = document.getElementById('drop-remove');
    var calendarEl = document.getElementById('calendar');

    // initialize the external events
    // -----------------------------------------------------------------

    new Draggable(containerEl, {
      itemSelector: '.external-event',
      eventData: function(eventEl) {
        console.log(eventEl);
        return {
          title: eventEl.innerText,
          backgroundColor: window.getComputedStyle( eventEl ,null).getPropertyValue('background-color'),
          borderColor: window.getComputedStyle( eventEl ,null).getPropertyValue('background-color'),
          textColor: window.getComputedStyle( eventEl ,null).getPropertyValue('color'),
        };
      }
    });

    var calendar = new Calendar(calendarEl, {
      plugins: [ 'bootstrap', 'interaction', 'dayGrid', 'timeGrid' ],
      header    : {
        left  : 'prev,next today',
        center: 'title',
        right : 'dayGridMonth,timeGridWeek,timeGridDay'
      },
      'themeSystem': 'bootstrap',
      //Random default events
      events    : [
        {
          title          : 'All Day Event',
          start          : new Date(y, m, 1),
          backgroundColor: '#f56954', //red
          borderColor    : '#f56954', //red
          allDay         : true
        },
        {
          title          : 'Long Event',
          start          : new Date(y, m, d - 5),
          end            : new Date(y, m, d - 2),
          backgroundColor: '#f39c12', //yellow
          borderColor    : '#f39c12' //yellow
        },
        {
          title          : 'Meeting',
          start          : new Date(y, m, d, 10, 30),
          allDay         : false,
          backgroundColor: '#0073b7', //Blue
          borderColor    : '#0073b7' //Blue
        },
        {
          title          : 'Lunch',
          start          : new Date(y, m, d, 12, 0),
          end            : new Date(y, m, d, 14, 0),
          allDay         : false,
          backgroundColor: '#00c0ef', //Info (aqua)
          borderColor    : '#00c0ef' //Info (aqua)
        },
        {
          title          : 'Birthday Party',
          start          : new Date(y, m, d + 1, 19, 0),
          end            : new Date(y, m, d + 1, 22, 30),
          allDay         : false,
          backgroundColor: '#00a65a', //Success (green)
          borderColor    : '#00a65a' //Success (green)
        },
        {
          title          : 'Click for Google',
          start          : new Date(y, m, 28),
          end            : new Date(y, m, 29),
          url            : 'http://google.com/',
          backgroundColor: '#3c8dbc', //Primary (light-blue)
          borderColor    : '#3c8dbc' //Primary (light-blue)
        }
      ],
      editable  : true,
      droppable : true, // this allows things to be dropped onto the calendar !!!
      drop      : function(info) {
        // is the "remove after drop" checkbox checked?
        if (checkbox.checked) {
          // if so, remove the element from the "Draggable Events" list
          info.draggedEl.parentNode.removeChild(info.draggedEl);
        }
      }    
    });

    calendar.render();
    // $('#calendar').fullCalendar()

    /* ADDING EVENTS */
    var currColor = '#3c8dbc' //Red by default
    //Color chooser button
    var colorChooser = $('#color-chooser-btn')
    $('#color-chooser > li > a').click(function (e) {
      e.preventDefault()
      //Save color
      currColor = $(this).css('color')
      //Add color effect to button
      $('#add-new-event').css({
        'background-color': currColor,
        'border-color'    : currColor
      })
    })
    $('#add-new-event').click(function (e) {
      e.preventDefault()
      //Get value and make sure it is not null
      var val = $('#new-event').val()
      if (val.length == 0) {
        return
      }

      //Create events
      var event = $('<div />')
      event.css({
        'background-color': currColor,
        'border-color'    : currColor,
        'color'           : '#fff'
      }).addClass('external-event')
      event.html(val)
      $('#external-events').prepend(event)

      //Add draggable funtionality
      ini_events(event)

      //Remove event from text input
      $('#new-event').val('')
    })
  })
</script>
<script>
    $(document).ready(function(){
    var image = document.getElementById('image');
    var cropper;
      
    $("#image_up").change( function(e){
        if(cropper){
            cropper.destroy();
            cropper = null;
        }
        var files = e.target.files;
        var done = function (url) {
          image.src = url;
        };
        var reader;
        var file;
        var url;
    
        if (files && files.length > 0) {
          file = files[0];
          $('.img-container').css('display', 'block');
          if (URL) {
            done(URL.createObjectURL(file));
          } else if (FileReader) {
            reader = new FileReader();
            reader.onload = function (e) {
              done(reader.result);
            };
            reader.readAsDataURL(file);
          }
        }
        else{
            $('.img-container').css('display', 'none');
        }
        cropper = new Cropper(image, {
          aspectRatio: 1,
          viewMode: 1,
          preview: '.preview',
        });
    });  
    
    $("#crop").click(function(){
        canvas = cropper.getCroppedCanvas({
            width: 120,
            height: 120,
          });
    
        canvas.toBlob(function(blob) {
            url = URL.createObjectURL(blob);
            var reader = new FileReader();
             reader.readAsDataURL(blob); 
             reader.onloadend = function() {
                var base64data = reader.result;	
    
                $.ajax({
                    type: "POST",
                    dataType: "json",
                    url: "{{ url('logo-upload') }}",
                    data: {'_token': $('meta[name="_token"]').attr('content'), 'image': base64data, 'bid':$('#bu_id').val()},
                    beforeSend: function() {
                            toastr.success('Please Wait');
                    },
                    success: function(data){
                            toastr.success('Successfully Uploaded');
                            window.location.href = '{{ url("business/21/setup#custom-tabs-three-logo") }}';
                            location.reload();
                    }
                  });
             }
        });
    });
    });
    
    </script>
@endsection