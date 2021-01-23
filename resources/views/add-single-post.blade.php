@extends('layouts.master')

@section('content')
<style>
    .h182 {
        height: 268px;
    }

    .preview_img {
        max-height: 182px;
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

    .hide_bus {
        display: none;
    }

    .bg-blue.onoff {
        background-color: rgba(0, 123, 255, 0.6) !important;
    }

    .bg-lightblue.onoff {
        background-color: rgba(60, 142, 190, 0.6) !important;
        ;
    }

    .bg-orange.onoff {
        background-color: #fd7e1499 !important;
    }

    .bg-success.onoff {
        background-color: #28a74599 !important;
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
                    <li class="breadcrumb-item active">Groups</li>
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


{!! Form::open(['action' => 'PostController@store','id'=>'form','files'=>'true']) !!}
{{ Form::token() }}
<section class="content">
    <div class="container-fluid">


        <!-- Main row -->
        <div class="row first-row">
            <!-- Left col -->
            <section class="col-lg-8 col-6 ">

                <div class="card card-default">
                    <div class="card-header">
                        <span class="badge bg-navy ">1</span> Create Your Post

                        <div class="card-tools">

                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label>TOKENS</label>
                                     <div class="float-right"><i class=" fab fa-twitter text-info mr-1"></i>Twitter:<span
                                        class="text-info count mr-1 ml-1">0</span>/ <span>280</span></div>
                                        
                                    <select class="form-control token" name="token">
                                        <option value="[Company Name]">Company Name</option>
                                        <option value="[Niche]">Niche</option>
                                        <option value="[Phone Number]">Phone Number</option>
                                        <option value="[Address]">Address</option>
                                        <option value="[Owner's Name]">Owner's Name</option>

                                    </select>
                                </div>
                                <!-- /.form-group -->
                                <div class="form-group">

                                    <textarea name="post" class="form-control" maxlength="280"  rows="3"
                                        placeholder="Enter Your Post Text Here ..." required></textarea>
                                </div>
                                <div class="row justify-content-around">
                                    <div class="social-share">
                                        <label class="mr-2">Share On</label>
                                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                            <label class="btn bg-blue onoff">
                                                <input type="hidden" name="fb_share" value="0">
                                                <input type="checkbox" checked name="fb_share" id="option1" value="1"> <i
                                                    class="nav-icon fab fa-facebook-f"></i>
                                            </label>
                                            <label class="btn bg-lightblue onoff">
                                                <input type="hidden" name="tw_share" value="0">
                                                <input type="checkbox" checked name="tw_share" id="option2" value="1"> <i
                                                    class="nav-icon fab fa-twitter"></i>
                                            </label>
                                            <label class="btn bg-orange onoff">
                                                <input type="hidden" name="in_share" value="0">
                                                <input type="checkbox" checked name="in_share" id="option3" value="1"> <i
                                                    class="nav-icon fab fa-instagram"></i>
                                            </label>
                                            <label class="btn bg-success onoff">
                                                <input type="hidden" name="gb_share" value="0">
                                                <input type="checkbox" checked name="gb_share" id="option4" value="1"><i
                                                    class="nav-icon fab fa-google"></i>
                                            </label>
                                        </div>
                                    </div>
                                    <!--social-share-->
                                    <div class="toggle d-flex align-items-center">
                                        <div class="form-group m-0 ">
                                            <label class="mr-2"> LOGO</label>
                                            <input type="hidden" name="logo_active" value="0">
                                            <input type="checkbox" name="logo_active" value="1" checked
                                                data-bootstrap-switch data-off-color="danger" data-on-color="success">
                                        </div>
                                    </div>
                                    <div class="form-group d-flex align-items-center mb-0">
                                        <select class="form-control" name="logo_type">
                                            <option value="">- Select Logo Type -</option>
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
                                <!--row-->
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.card-body -->

                </div>
                <!-- /.card -->


            </section>
            <!-- /.Left col -->

            <!-- right col -->
            <section class="col-lg-4 col-6 ">

                <div class="card card-default">
                    <div class="card-header">
                        <h3 class="card-title" data-toggle="modal" data-target="#modal-preview">
                            <i class="fas fa-eye mr-1"></i>
                            Preview
                        </h3>

                        <div class="card-tools">

                        </div>
                    </div>
                    <!--Modal-preview-->
                    <div class="modal fade" id="modal-preview">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title"> </h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="card card-primary card-outline">
                                        <div class="card-header">
                                            <h3 class="card-title">
                                                <i class="fas fa-eye mr-1"></i>
                                                Post Preview
                                            </h3>
                                        </div>
                                        <div class="card-body">

                                            <div class="row">
                                                <div class="col-5 col-sm-3">
                                                    <div class="nav flex-column nav-tabs h-100" id="vert-tabs-tab"
                                                        role="tablist" aria-orientation="vertical">
                                                        <a class="nav-link active" id="vert-tabs-fb-tab"
                                                            data-toggle="pill" href="#vert-tabs-fb" role="tab"
                                                            aria-controls="vert-tabs-fb" aria-selected="true">
                                                            Facebook</a>
                                                        <a class="nav-link" id="vert-tabs-tw-tab" data-toggle="pill"
                                                            href="#vert-tabs-tw" role="tab" aria-controls="vert-tabs-tw"
                                                            aria-selected="false"> Twitter</a>
                                                        <a class="nav-link" id="vert-tabs-in-tab" data-toggle="pill"
                                                            href="#vert-tabs-in" role="tab" aria-controls="vert-tabs-in"
                                                            aria-selected="false"> Instagram</a>
                                                        <a class="nav-link" id="vert-tabs-go-tab" data-toggle="pill"
                                                            href="#vert-tabs-go" role="tab" aria-controls="vert-tabs-go"
                                                            aria-selected="false"> Google My Business</a>
                                                    </div>
                                                </div>
                                                <div class="col-7 col-sm-9">
                                                    <div class="tab-content" id="vert-tabs-tabContent">
                                                        <div class="tab-pane text-left fade show active"
                                                            id="vert-tabs-fb" role="tabpanel"
                                                            aria-labelledby="vert-tabs-fb-tab">
                                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                                            Proin malesuada lacus ullamcorper dui molestie, sit amet
                                                            congue quam finibus. Etiam ultricies nunc non magna feugiat
                                                            commodo. Etiam odio magna, mollis auctor felis vitae,
                                                            ullamcorper ornare ligula. Proin pellentesque tincidunt
                                                            nisi, vitae ullamcorper felis aliquam id. Pellentesque
                                                            habitant morbi tristique senectus et netus et malesuada
                                                            fames ac turpis egestas. Proin id orci eu lectus blandit
                                                            suscipit. Phasellus porta, ante et varius ornare, sem enim
                                                            sollicitudin eros, at commodo leo est vitae lacus. Etiam ut
                                                            porta sem. Proin porttitor porta nisl, id tempor risus
                                                            rhoncus quis. In in quam a nibh cursus pulvinar non
                                                            consequat neque. Mauris lacus elit, condimentum ac
                                                            condimentum at, semper vitae lectus. Cras lacinia erat eget
                                                            sapien porta consectetur.
                                                        </div>
                                                        <div class="tab-pane fade" id="vert-tabs-tw" role="tabpanel"
                                                            aria-labelledby="vert-tabs-tw-tab">
                                                            Mauris tincidunt mi at erat gravida, eget tristique urna
                                                            bibendum. Mauris pharetra purus ut ligula tempor, et
                                                            vulputate metus facilisis. Lorem ipsum dolor sit amet,
                                                            consectetur adipiscing elit. Vestibulum ante ipsum primis in
                                                            faucibus orci luctus et ultrices posuere cubilia Curae;
                                                            Maecenas sollicitudin, nisi a luctus interdum, nisl ligula
                                                            placerat mi, quis posuere purus ligula eu lectus. Donec nunc
                                                            tellus, elementum sit amet ultricies at, posuere nec nunc.
                                                            Nunc euismod pellentesque diam.
                                                        </div>
                                                        <div class="tab-pane fade" id="vert-tabs-in" role="tabpanel"
                                                            aria-labelledby="vert-tabs-in-tab">
                                                            Morbi turpis dolor, vulputate vitae felis non, tincidunt
                                                            congue mauris. Phasellus volutpat augue id mi placerat
                                                            mollis. Vivamus faucibus eu massa eget condimentum. Fusce
                                                            nec hendrerit sem, ac tristique nulla. Integer vestibulum
                                                            orci odio. Cras nec augue ipsum. Suspendisse ut velit
                                                            condimentum, mattis urna a, malesuada nunc. Curabitur
                                                            eleifend facilisis velit finibus tristique. Nam vulputate,
                                                            eros non luctus efficitur, ipsum odio volutpat massa, sit
                                                            amet sollicitudin est libero sed ipsum. Nulla lacinia, ex
                                                            vitae gravida fermentum, lectus ipsum gravida arcu, id
                                                            fermentum metus arcu vel metus. Curabitur eget sem eu risus
                                                            tincidunt eleifend ac ornare magna.
                                                        </div>
                                                        <div class="tab-pane fade" id="vert-tabs-go" role="tabpanel"
                                                            aria-labelledby="vert-tabs-go-tab">
                                                            Pellentesque vestibulum commodo nibh nec blandit. Maecenas
                                                            neque magna, iaculis tempus turpis ac, ornare sodales
                                                            tellus. Mauris eget blandit dolor. Quisque tincidunt
                                                            venenatis vulputate. Morbi euismod molestie tristique.
                                                            Vestibulum consectetur dolor a vestibulum pharetra. Donec
                                                            interdum placerat urna nec pharetra. Etiam eget dapibus
                                                            orci, eget aliquet urna. Nunc at consequat diam. Nunc et
                                                            felis ut nisl commodo dignissim. In hac habitasse platea
                                                            dictumst. Praesent imperdiet accumsan ex sit amet facilisis.
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <!-- /.card -->
                                    </div>
                                    <!-- /.card -->
                                </div>

                            </div>
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>
                    <!-- /.modal -->


                    <!-- /.card-header -->
                    <div class="card-body h182">
                        <div class="row">
                            <div class="col-12 text-center">

                                <div class="form-group" style="min-height: 182px; background: rgb(201, 201, 201, 0.2)">

                                    <img class="img-fluid preview_img" src="" alt="">
                                </div>
                                <button type="button" class="btn  bg-gradient-primary btn-sm text-uppercase"
                                    data-toggle="modal" data-target="#modal-upload"><i
                                        class="fas fa-image mr-2"></i>upload image</button>

                            </div>
                            <!--Modal-preview-->
                            <div class="modal fade" id="modal-upload">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title"> </h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="card card-primary card-outline card-outline-tabs">
                                                <div class="card-header p-0 border-bottom-0">
                                                    <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                                                        <li class="nav-item">
                                                            <a class="nav-link active" id="custom-tabs-four-image-tab"
                                                                data-toggle="pill" href="#custom-tabs-four-image"
                                                                role="tab" aria-controls="custom-tabs-four-image"
                                                                aria-selected="true">Image</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" id="custom-tabs-four-video-tab"
                                                                data-toggle="pill" href="#custom-tabs-four-video"
                                                                role="tab" aria-controls="custom-tabs-four-video"
                                                                aria-selected="false">Video</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" id="custom-tabs-four-gifs-tab"
                                                                data-toggle="pill" href="#custom-tabs-four-gifs"
                                                                role="tab" aria-controls="custom-tabs-four-gifs"
                                                                aria-selected="false">Gifs</a>
                                                        </li>

                                                    </ul>
                                                </div>
                                                <div class="card-body">
                                                    <div class="tab-content" id="custom-tabs-four-tabContent">
                                                        <div class="tab-pane fade show active"
                                                            id="custom-tabs-four-image" role="tabpanel"
                                                            aria-labelledby="custom-tabs-four-image-tab">
                                                            <div class=" card-tabs">
                                                                <div class="card-header p-0 pt-1 border-bottom-0">
                                                                    <ul class="nav " id="custom-tabs-three-tab"
                                                                        role="tablist">
                                                                        <li class="nav-item">
                                                                            <a class="nav-link active"
                                                                                id="custom-tabs-three-current-tab"
                                                                                data-toggle="pill"
                                                                                href="#custom-tabs-three-current"
                                                                                role="tab"
                                                                                aria-controls="custom-tabs-three-current"
                                                                                aria-selected="true">Current Image</a>
                                                                        </li>
                                                                        <li class="nav-item">
                                                                            <a class="nav-link"
                                                                                id="custom-tabs-three-gallery-tab"
                                                                                data-toggle="pill"
                                                                                href="#custom-tabs-three-gallery"
                                                                                role="tab"
                                                                                aria-controls="custom-tabs-three-gallery"
                                                                                aria-selected="false">My Gallery</a>
                                                                        </li>
                                                                        <li class="nav-item">
                                                                            <a class="nav-link"
                                                                                id="custom-tabs-three-stock-tab"
                                                                                data-toggle="pill"
                                                                                href="#custom-tabs-three-stock"
                                                                                role="tab"
                                                                                aria-controls="custom-tabs-three-stock"
                                                                                aria-selected="false">Stock Gallery</a>
                                                                        </li>
                                                                        <li class="nav-item">
                                                                            <a class="nav-link"
                                                                                id="custom-tabs-three-icon-tab"
                                                                                data-toggle="pill"
                                                                                href="#custom-tabs-three-icon"
                                                                                role="tab"
                                                                                aria-controls="custom-tabs-three-icon"
                                                                                aria-selected="false">Icons</a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                                <div class="card-body">
                                                                    <div class="tab-content"
                                                                        id="custom-tabs-three-tabContent">
                                                                        <div class="tab-pane fade show active"
                                                                            id="custom-tabs-three-current"
                                                                            role="tabpanel"
                                                                            aria-labelledby="custom-tabs-three-current-tab">

                                                                            <div id="message">
                                                                                <div id="uploaded_image">
                                                                                </div>
                                                                            </div>

                                                                            No Current Image
                                                                            <div>
                                                                                <label
                                                                                    for="image">{{ Form::file('image',array('class' => 'form-control')) }}</label>
                                                                            </div>
                                                                            {{-- </form> --}}
                                                                        </div>

                                                                        <div class="tab-pane fade"
                                                                            id="custom-tabs-three-gallery"
                                                                            role="tabpanel"
                                                                            aria-labelledby="custom-tabs-three-gallery-tab">
                                                                            <!--gallery-start-->
                                                                            <div class="row">
                                                                                @foreach($imgs->where('category','image')
                                                                                as
                                                                                $img)
                                                                                <div class="col-sm-2">
                                                                                    <label>
                                                                                        <input type="radio"
                                                                                            name="image_select"
                                                                                            value="{{$img->id}}"
                                                                                            alt="{{url('/'.$img->img_dir.'/'.$img->image)}}">
                                                                                        <img src="{{url('/'.$img->img_dir.'/'.$img->image)}}"
                                                                                            class="img-fluid mb-2"
                                                                                            alt="white sample" />
                                                                                    </label>
                                                                                </div>
                                                                                @endforeach

                                                                            </div>
                                                                            <!--gallery-end-->
                                                                        </div>
                                                                        <div class="tab-pane fade"
                                                                            id="custom-tabs-three-stock" role="tabpanel"
                                                                            aria-labelledby="custom-tabs-three-stock-tab">
                                                                            <!--gallery-start-->
                                                                            <div class="row">
                                                                                <div class="col-sm-2">
                                                                                    <a href="https://via.placeholder.com/1200/FFFFFF.png?text=1"
                                                                                        data-toggle="lightbox"
                                                                                        data-title="sample 1 - white"
                                                                                        data-gallery="gallery">
                                                                                        <img src="https://via.placeholder.com/300/FFFFFF?text=1"
                                                                                            class="img-fluid mb-2"
                                                                                            alt="white sample" />
                                                                                    </a>
                                                                                </div>
                                                                                <div class="col-sm-2">
                                                                                    <a href="https://via.placeholder.com/1200/000000.png?text=2"
                                                                                        data-toggle="lightbox"
                                                                                        data-title="sample 2 - black"
                                                                                        data-gallery="gallery">
                                                                                        <img src="https://via.placeholder.com/300/000000?text=2"
                                                                                            class="img-fluid mb-2"
                                                                                            alt="black sample" />
                                                                                    </a>
                                                                                </div>
                                                                                <div class="col-sm-2">
                                                                                    <a href="https://via.placeholder.com/1200/FF0000/FFFFFF.png?text=3"
                                                                                        data-toggle="lightbox"
                                                                                        data-title="sample 3 - red"
                                                                                        data-gallery="gallery">
                                                                                        <img src="https://via.placeholder.com/300/FF0000/FFFFFF?text=3"
                                                                                            class="img-fluid mb-2"
                                                                                            alt="red sample" />
                                                                                    </a>
                                                                                </div>
                                                                                <div class="col-sm-2">
                                                                                    <a href="https://via.placeholder.com/1200/FF0000/FFFFFF.png?text=4"
                                                                                        data-toggle="lightbox"
                                                                                        data-title="sample 4 - red"
                                                                                        data-gallery="gallery">
                                                                                        <img src="https://via.placeholder.com/300/FF0000/FFFFFF?text=4"
                                                                                            class="img-fluid mb-2"
                                                                                            alt="red sample" />
                                                                                    </a>
                                                                                </div>
                                                                                <div class="col-sm-2">
                                                                                    <a href="https://via.placeholder.com/1200/000000.png?text=5"
                                                                                        data-toggle="lightbox"
                                                                                        data-title="sample 5 - black"
                                                                                        data-gallery="gallery">
                                                                                        <img src="https://via.placeholder.com/300/000000?text=5"
                                                                                            class="img-fluid mb-2"
                                                                                            alt="black sample" />
                                                                                    </a>
                                                                                </div>
                                                                                <div class="col-sm-2">
                                                                                    <a href="https://via.placeholder.com/1200/FFFFFF.png?text=6"
                                                                                        data-toggle="lightbox"
                                                                                        data-title="sample 6 - white"
                                                                                        data-gallery="gallery">
                                                                                        <img src="https://via.placeholder.com/300/FFFFFF?text=6"
                                                                                            class="img-fluid mb-2"
                                                                                            alt="white sample" />
                                                                                    </a>
                                                                                </div>
                                                                                <div class="col-sm-2">
                                                                                    <a href="https://via.placeholder.com/1200/FFFFFF.png?text=7"
                                                                                        data-toggle="lightbox"
                                                                                        data-title="sample 7 - white"
                                                                                        data-gallery="gallery">
                                                                                        <img src="https://via.placeholder.com/300/FFFFFF?text=7"
                                                                                            class="img-fluid mb-2"
                                                                                            alt="white sample" />
                                                                                    </a>
                                                                                </div>
                                                                                <div class="col-sm-2">
                                                                                    <a href="https://via.placeholder.com/1200/000000.png?text=8"
                                                                                        data-toggle="lightbox"
                                                                                        data-title="sample 8 - black"
                                                                                        data-gallery="gallery">
                                                                                        <img src="https://via.placeholder.com/300/000000?text=8"
                                                                                            class="img-fluid mb-2"
                                                                                            alt="black sample" />
                                                                                    </a>
                                                                                </div>
                                                                                <div class="col-sm-2">
                                                                                    <a href="https://via.placeholder.com/1200/FF0000/FFFFFF.png?text=9"
                                                                                        data-toggle="lightbox"
                                                                                        data-title="sample 9 - red"
                                                                                        data-gallery="gallery">
                                                                                        <img src="https://via.placeholder.com/300/FF0000/FFFFFF?text=9"
                                                                                            class="img-fluid mb-2"
                                                                                            alt="red sample" />
                                                                                    </a>
                                                                                </div>
                                                                                <div class="col-sm-2">
                                                                                    <a href="https://via.placeholder.com/1200/FFFFFF.png?text=10"
                                                                                        data-toggle="lightbox"
                                                                                        data-title="sample 10 - white"
                                                                                        data-gallery="gallery">
                                                                                        <img src="https://via.placeholder.com/300/FFFFFF?text=10"
                                                                                            class="img-fluid mb-2"
                                                                                            alt="white sample" />
                                                                                    </a>
                                                                                </div>
                                                                                <div class="col-sm-2">
                                                                                    <a href="https://via.placeholder.com/1200/FFFFFF.png?text=11"
                                                                                        data-toggle="lightbox"
                                                                                        data-title="sample 11 - white"
                                                                                        data-gallery="gallery">
                                                                                        <img src="https://via.placeholder.com/300/FFFFFF?text=11"
                                                                                            class="img-fluid mb-2"
                                                                                            alt="white sample" />
                                                                                    </a>
                                                                                </div>
                                                                                <div class="col-sm-2">
                                                                                    <a href="https://via.placeholder.com/1200/000000.png?text=12"
                                                                                        data-toggle="lightbox"
                                                                                        data-title="sample 12 - black"
                                                                                        data-gallery="gallery">
                                                                                        <img src="https://via.placeholder.com/300/000000?text=12"
                                                                                            class="img-fluid mb-2"
                                                                                            alt="black sample" />
                                                                                    </a>
                                                                                </div>
                                                                            </div>
                                                                            <!--gallery-end-->
                                                                        </div>
                                                                        <div class="tab-pane fade"
                                                                            id="custom-tabs-three-icon" role="tabpanel"
                                                                            aria-labelledby="custom-tabs-three-icon-tab">
                                                                            Pellentesque vestibulum commodo nibh nec
                                                                            blandit. Maecenas neque magna, iaculis
                                                                            tempus turpis ac, ornare sodales tellus.
                                                                            Mauris eget blandit dolor. Quisque tincidunt
                                                                            venenatis vulputate. Morbi euismod molestie
                                                                            tristique. Vestibulum consectetur dolor a
                                                                            vestibulum pharetra. Donec interdum placerat
                                                                            urna nec pharetra. Etiam eget dapibus orci,
                                                                            eget aliquet urna. Nunc at consequat diam.
                                                                            Nunc et felis ut nisl commodo dignissim. In
                                                                            hac habitasse platea dictumst. Praesent
                                                                            imperdiet accumsan ex sit amet facilisis.
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!-- /.card -->
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane fade" id="custom-tabs-four-video"
                                                            role="tabpanel"
                                                            aria-labelledby="custom-tabs-four-video-tab">
                                                            <!--gallery-start-->
                                                            <div class="row">
                                                                @foreach ($imgs->where('category','video') as $vid)
                                                                <div class="col-sm-2">
                                                                    <a href="{{url('/'.$vid->img_dir.'/'.$vid->image)}}"
                                                                        data-toggle="lightbox"
                                                                        data-title="sample 1 - white"
                                                                        data-gallery="gallery">
                                                                        <img src="{{url('/'.$vid->img_dir.'/'.$vid->image)}}"
                                                                            class="img-fluid mb-2" alt="white sample" />
                                                                    </a>
                                                                </div>
                                                                @endforeach

                                                            </div>
                                                            <!--gallery-end-->
                                                        </div>
                                                        <div class="tab-pane fade" id="custom-tabs-four-gifs"
                                                            role="tabpanel" aria-labelledby="custom-tabs-four-gifs-tab">
                                                            Morbi turpis dolor, vulputate vitae felis non, tincidunt
                                                            congue mauris. Phasellus volutpat augue id mi placerat
                                                            mollis. Vivamus faucibus eu massa eget condimentum. Fusce
                                                            nec hendrerit sem, ac tristique nulla. Integer vestibulum
                                                            orci odio. Cras nec augue ipsum. Suspendisse ut velit
                                                            condimentum, mattis urna a, malesuada nunc. Curabitur
                                                            eleifend facilisis velit finibus tristique. Nam vulputate,
                                                            eros non luctus efficitur, ipsum odio volutpat massa, sit
                                                            amet sollicitudin est libero sed ipsum. Nulla lacinia, ex
                                                            vitae gravida fermentum, lectus ipsum gravida arcu, id
                                                            fermentum metus arcu vel metus. Curabitur eget sem eu risus
                                                            tincidunt eleifend ac ornare magna.
                                                        </div>

                                                    </div>
                                                </div>
                                                <!-- /.card -->
                                            </div>
                                            <!-- /.card -->
                                        </div>
                                        <div class="modal-footer justify-content-between">

                                            <button class="btn btn-primary" data-dismiss="modal"
                                                aria-label="Close"> Select</button>
                                        </div>

                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                            <!-- /.modal -->

                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.card-body -->


                </div>
                <!-- /.card -->
                <!--upload-image-end-->


            </section>
            <!-- /.right col -->

        </div>
        <!-- /.row (main row) -->



        <!-- Main row -->
        <div class="row first-row">
            <!-- main col -->
            <section class="col-lg-12 col-12 ">

                <div class="card card-default">
                    <div class="card-header">
                        <h3 class="card-title">
                            <span class="badge bg-navy ">2</span> Add Your Social Post To A Business
                        </h3>


                        <div class="card-tools">
                            <button type="button" class="btn  bg-gradient-primary btn-sm text-uppercase"
                                data-toggle="modal" data-target="#add-business"><i class="fas fa-plus mr-2"></i>Add A
                                Business</button>
                        </div>


                        <!--Modal-Add-business-->
                        <div class="modal fade" id="add-business">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title"> <i class="nav-icon fas fa-plus mr-2"></i>ADD A BUSINESS
                                        </h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">



                                        <div class="card card-primary card-outline card-tabs">
                                            <div class="card-header p-0 pt-1 border-bottom-0">
                                                <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
                                                    <li class="nav-item">
                                                        <a class="nav-link active" id="custom-tabs-three-business-tab"
                                                            data-toggle="pill" href="#custom-tabs-three-business"
                                                            role="tab" aria-controls="custom-tabs-three-business"
                                                            aria-selected="true">Business</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" id="custom-tabs-three-group-tab"
                                                            data-toggle="pill" href="#custom-tabs-three-group"
                                                            role="tab" aria-controls="custom-tabs-three-group"
                                                            aria-selected="false">Group</a>
                                                    </li>

                                                </ul>
                                            </div>
                                            <div class="card-body">
                                                <div class="tab-content" id="custom-tabs-three-tabContent">
                                                    <div class="tab-pane fade show active"
                                                        id="custom-tabs-three-business" role="tabpanel"
                                                        aria-labelledby="custom-tabs-three-business-tab">

                                                        <div class="form-group">
                                                            <label>Search or Choose</label>
                                                            {{ Form::select('business[]',$b_data,'',array('class' => 'form-control select2bs4 bus_list', 'multiple' =>true)) }}
                                                        </div>
                                                        <!--form-group-->
                                                        <button id="save_bus" onclick="return false" type="button"
                                                            class="btn  bg-gradient-primary btn-sm text-uppercase float-right toastrDefaultAdded"
                                                            data-dismiss="modal" aria-label="Close"><i
                                                                class="fas fa-plus mr-1"></i>Add</button>
                                                    </div>

                                                    <div class="tab-pane fade" id="custom-tabs-three-group"
                                                        role="tabpanel" aria-labelledby="custom-tabs-three-group-tab">
                                                        <div class="form-group">
                                                            <label>Search or Choose</label>
                                                            {{ Form::select('group',$g_data,'',array('class' => 'form-control' , 'placeholder' => '- Select Group -')) }}
                                                        </div>
                                                        <!--form-group-->
                                                        <button id="save_grp" onclick="return false" type="button"
                                                            class="btn  bg-gradient-primary btn-sm text-uppercase float-right toastrDefaultAdded"
                                                            data-dismiss="modal" aria-label="Close"><i
                                                                class="fas fa-plus mr-1"></i>Add</button>
                                                    </div>

                                                </div>
                                            </div>
                                            <!-- /.card -->
                                        </div>

                                    </div>

                                </div>
                                <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                        </div>
                        <!-- /.modal -->
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ACCOUNTS</th>
                                    <th>CITY/STATE</th>
                                    <th>POST TO
                                        SOCIAL NETWORKS</th>
                                    <th>POSTING DATE</th>
                                    <th>SCHEDULE</th>
                                    <th>STATUS</th>
                                    <th>ACTIONS</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($business as $bus)
                                <tr class="alert hide_bus" id="bus{{$bus->id}}">
                                    <td>
                                        <div class="address">
                                            <ul class="icon-list">
                                                <input type="hidden" name="business_id" value="">
                                                <li class="address-name"><i class="nav-icon far fa-building"></i>
                                                    {{$bus->b_name}}</li>

                                            </ul>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="address">
                                            <ul class="icon-list">
                                                <li class="address-street"><i
                                                        class="nav-icon fas fa-map-marker-alt"></i>{{$bus->address}}
                                                </li>

                                            </ul>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="social-icons">
                                            <ul>
                                                @foreach ($social as $item)
                                                @foreach ($socon->where('business_id', $bus->id) as $scon)

                                                @if($item->id == $scon->social_platforms_id && $scon->name ==
                                                'Facebook')
                                                <li class="bg-blue"><i class="nav-icon fab fa-facebook-f"></i></li>
                                                @endif
                                                @if($item->id == $scon->social_platforms_id && $scon->name == 'Twitter')
                                                <li class="bg-lightblue"><i class="nav-icon fab fa-twitter"></i></li>
                                                @endif
                                                @if($item->id == $scon->social_platforms_id && $scon->name ==
                                                'Instagram')
                                                <li class="bg-orange"><i class="nav-icon fab fa-instagram"></i></li>
                                                @endif
                                                @if($item->id == $scon->social_platforms_id && $scon->name == 'Google Business')
                                                <li class="bg-success"><i class="nav-icon fab fa-google"></i></li>
                                                @endif
                                                @endforeach
                                                @endforeach

                                            </ul>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="address">
                                            <ul class="icon-list">
                                                <li class="date_show"><i
                                                        class="nav-icon fas fa-calendar-alt"></i>
                                                        <span class="datesched">{{date('d/m/Y', strtotime('+1 day'.$post_time[$bus->id]['posting_time']))}}</span>{{ Form::hidden('date_schedule'.$bus->id , date('d-m-Y', strtotime('+1 day'.$post_time[$bus->id]['posting_time'])), ['class'=> 'form-group'])}}
                                                </li>
                                                <li class="time_show"><i class="nav-icon far fa-clock"></i>
                                                <span class="timesched">{{date('h:i a', strtotime($post_time[$bus->id]['posting_time']))}}</span>{{ Form::hidden('time_schedule'.$bus->id , date('h:i a', strtotime($post_time[$bus->id]['posting_time'])), ['class'=> 'form-group'])}}</li>
                                                <li class="time_zone_show"><i
                                                        class="nav-icon fas fa-map-marker-alt"></i>{{$bus->time_zone}}</li>

                                            </ul>
                                        </div>
                                    </td>
                                    <td>
                                        <ul class="icon-list">
                                            {{ Form::checkbox('schedule_status'.$bus->id,  '1', true) }}
                                            <li class=""><i class="nav-icon fas fa-check text-success"></i>Good</li>


                                        </ul>
                                    </td>
                                    <td>
                                        <ul class="icon-list">
                                            {{ Form::checkbox('post_status'.$bus->id,  '1', true) }}
                                            <li class=""><i class="nav-icon fas fa-check text-success"></i>Good</li>


                                        </ul>
                                    </td>
                                    <td>
                                        {{-- <a href="#" class="btn bg-white" data-dismiss="alert" aria-hidden="true"><i
                                                class="nav-icon fas fa-times"></i></a> --}}
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
            <!-- /.one col -->



        </div>
        <!-- /.row (second row) -->

        <!-- Main row -->
        <div class="row first-row">
            <!-- main col -->
            <section class="col-lg-12 col-12 ">
                <div class="row">

                    <div class="col-md-6">
                        <!-- Widget: user widget style 1 -->
                        <div class="card card-widget widget-user">
                            <!-- Add the bg color to the header using any of the bg-* classes -->
                            <div class="widget-user-header bg-info">
                                <h3 class="widget-user-username"><span class="badge bg-navy mr-2 ">3</span>Set Posting
                                    Time</h3>

                            </div>

                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-sm-4 border-right">
                                        <div class="description-block">
                                            <button type="button"
                                                class="btn  btn-outline-info btn-sm text-uppercase toastrDefaultSuccess"><i
                                                    class="fas fa-list-ol mr-2"></i>Add
                                                To
                                                Queue
                                            </button>
                                        </div>
                                        <!-- /.description-block -->
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-sm-4 border-right">
                                        <div class="description-block">
                                            <h5 class="description-header">OR</h5>

                                        </div>
                                        <!-- /.description-block -->
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-sm-4">
                                        <div class="description-block">
                                            <button type="button" class="btn  btn-outline-info btn-sm text-uppercase"
                                                data-toggle="modal" data-target="#date-time"><i
                                                    class="nav-icon fas fa-calendar-alt mr-2"></i>Date & Time
                                            </button>
                                        </div>
                                        <!-- /.description-block -->

                                        <!--Modal-Date-Time-->
                                        <div class="modal fade" id="date-time">
                                            <div class="modal-dialog modal-md">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title"> <i
                                                                class="nav-icon fas fa-calendar-alt mr-2"></i> POSTING
                                                            DATE AND TIME</h4>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="card card-primary card-outline">

                                                            <!-- /.card-header -->
                                                            <div class="card-header">
                                                                <h3 class="card-title">
                                                                    <i class="nav-icon fas fa-calendar-alt mr-2"></i>
                                                                    POSTING DATE AND TIME
                                                                </h3>

                                                                <div class="card-tools">

                                                                </div>
                                                            </div>
                                                            <div class="card-body">
                                                                <!-- Date -->
                                                                <div class="form-group">
                                                                    <label>Date:</label>
                                                                    <div class="input-group date" id="reservationdate"
                                                                        data-target-input="nearest">
                                                                        <input type="text" name="date"
                                                                            class="form-control datetimepicker-input"
                                                                            data-target="#reservationdate" />
                                                                        <div class="input-group-append"
                                                                            data-target="#reservationdate"
                                                                            data-toggle="datetimepicker">
                                                                            <div class="input-group-text"><i
                                                                                    class="fa fa-calendar"></i></div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!-- /.form group -->

                                                                <div class="form-group">
                                                                    <label>Time:</label>

                                                                    <div class="input-group date" id="timepicker"
                                                                        data-target-input="nearest">
                                                                        <input type="text" name="time"
                                                                            class="form-control datetimepicker-input"
                                                                            data-target="#timepicker" />
                                                                        <div class="input-group-append"
                                                                            data-target="#timepicker"
                                                                            data-toggle="datetimepicker">
                                                                            <div class="input-group-text"><i
                                                                                    class="far fa-clock"></i></div>
                                                                        </div>
                                                                    </div>
                                                                    <!-- /.input group -->
                                                                </div>
                                                                <!-- /.form group -->


                                                            </div>
                                                            <!-- /.card-body -->

                                                        </div>
                                                        <!-- /.card -->
                                                    </div>
                                                    <div class="modal-footer justify-content-between">

                                                        <button onclick="return false" class="btn btn-primary"
                                                            data-dismiss="modal" aria-label="Close"><i
                                                                class=" fa fa-check"></i> Save</button>
                                                    </div>
                                                </div>
                                                <!-- /.modal-content -->
                                            </div>
                                            <!-- /.modal-dialog -->
                                        </div>
                                        <!-- /.modal -->

                                    </div>
                                    <!-- /.col -->
                                </div>
                                <!-- /.row -->
                            </div>
                        </div>
                        <!-- /.widget-user -->
                    </div>
                    <!-- /.col -->

                    <div class="col-md-6">
                        <!-- Widget: user widget style 1 -->
                        <div class="card card-widget widget-user">
                            <!-- Add the bg color to the header using any of the bg-* classes -->
                            <div class="widget-user-header bg-warning">
                                <h3 class="widget-user-username"><span class="badge bg-navy mr-2 ">4</span>Send To
                                    Schedule</h3>

                            </div>

                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-sm-6 border-right">
                                        <div class="description-block">
                                            <h5 class="description-header">After You’ve Completed The Steps, Now It’s
                                                Time To Schedule Your Post.</h5>
                                        </div>
                                        <!-- /.description-block -->
                                    </div>
                                    <!-- /.col -->

                                    <!-- /.col -->
                                    <div class="col-sm-6">
                                        <div class="description-block">
                                            <button type="submit"
                                                class="btn btn-outline-warning btn-sm text-uppercase toastrDefaultWarning"><i
                                                    class="fas fa-paper-plane mr-2"></i>Send To Schedule
                                            </button>
                                        </div>
                                        <!-- /.description-block -->
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <!-- /.row -->
                            </div>
                        </div>
                        <!-- /.widget-user -->
                    </div>
                    <!-- /.col -->

                </div>
                <!--row-->
            </section>
            <!-- /.one col -->



        </div>
        <!-- /.row (second row) -->



    </div><!-- /.container-fluid -->

</section>

{!! Form::close() !!}

<!-- /.content -->
</div>
<!-- /.content-wrapper -->


<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<!-- Code injected by live-server -->


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
    });


//Date range picker
$('#reservationdate').datetimepicker({
      format: 'L'
  });

  //Timepicker
  $('#timepicker').datetimepicker({
    format: 'LT'
  });

 
    //Initialize Select2 Elements
    $('select[name="token"]').change(function(){
    var token = $(this).children("option:selected").val();
    var post = $('textarea[name="post"]').val();
    var newpost = post +' '+ token;
    $('textarea[name="post"]').val(newpost);
    });

    //Initialize Select2 Elements
    $('#save_bus').click(function(){
        
    $('.hide_bus').css('display', 'none');
    var bus_list = $('.bus_list').val();
    $.each( bus_list, function( key, value ) {
     $('#bus'+value).css('display', 'table-row');
});
    
    });
    //Initialize Select2 Elements
    $('#save_grp').click(function(){
    var grp_list = $('select[name="group"]').val();
    $('.hide_bus').css('display', 'none');
    $.ajax({url: "/ajax/group/"+grp_list, success: function(result){
        $.each(result, function( key, value ) {
        $.each(value, function( ind, res ) {
        $('#bus'+res).css('display', 'table-row');
 });
 });
    
  }});
  
  
    
    });

  
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


  $(function () {
  $(document).on('click', '[data-toggle="lightbox"]', function(event) {
    event.preventDefault();
    $(this).ekkoLightbox({
      alwaysShowClose: true
    });
  });

  $('.filter-container').filterizr({gutterPixels: 3});
  $('.btn[data-filter]').on('click', function() {
    $('.btn[data-filter]').removeClass('active');
    $(this).addClass('active');
  });
});
$(document).ready(function(){

$('input[name="image_select"]').change(function (){
    var img_src = $('input[name="image_select"]:checked').attr('alt');
    $('.preview_img').attr('src', img_src); 
});
$('input[name="image"]').change(function (){
    var img_src = window.URL.createObjectURL(this.files[0]);
    $('.preview_img').attr('src', img_src); 
    console.log(window.URL.createObjectURL(this.files[0]));
    console.log(this.files[0]);
    });
    
    $('textarea').keyup(function () {
  var max = 280;
  var len = $(this).val().length;
  if (len > max) {
    $('.count').text(len).removeClass('text-info').addClass('text-danger');
  }
  else if (len < max) {
    $('.count').text(len).removeClass('text-danger').addClass('text-info');
  }
});
});

</script>


@endsection