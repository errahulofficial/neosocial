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
                    <li class="breadcrumb-item active">Add Business</li>
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
            <section class="col-lg-12 col-12 ">

                <div class="card card-default">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fas fas fa-briefcase mr-1"></i>
                            Add Business
                        </h3>

                        <div class="card-tools">
                            <ul class="nav nav-pills" id="custom-tabs-three-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="custom-tabs-three-listing-tab" data-toggle="pill"
                                        href="#custom-tabs-three-listing" role="tab"
                                        aria-controls="custom-tabs-three-listing" aria-selected="true"><i
                                            class=" fas fa-cogs mr-1"></i> Business Setup</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="custom-tabs-three-post-tab" data-toggle="pill"
                                        href="#custom-tabs-three-post" role="tab" aria-controls="custom-tabs-three-post"
                                        aria-selected="false"><i class="fas fa-comments mr-1"></i> Posting Goals</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="custom-tabs-three-social-tab" data-toggle="pill"
                                        href="#custom-tabs-three-social" role="tab"
                                        aria-controls="custom-tabs-three-social" aria-selected="false"><i
                                            class="fas fa-share-alt mr-1"></i>Social Setup</a>
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
                                        {!! Form::open(['action' => 'BusinessController@store', 'id' => 'form']) !!}
                                        @csrf
                                        <div class="tab-content" id="custom-tabs-three-tabContent">
                                           
                                            <div class="tab-pane fade show active" id="custom-tabs-three-listing"
                                                role="tabpanel" aria-labelledby="custom-tabs-three-listing-tab">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="card card-primary card-outline card-outline-tabs">
                                                            <div class="card-header p-0 border-bottom-0">

                                                                <ul class="nav  nav-tabs" id="custom-tabs-three-tab"
                                                                    role="tablist">
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
                                                            <input type="radio" name="business_type" value="local"
                                                                id="lo_rad" checked style="display: none">
                                                            <input type="radio" name="business_type" value="online"
                                                                id="on_rad" style="display: none">

                                                            <div class="card-body">
                                                                <div class="tab-content"
                                                                    id="custom-tabs-three-tabContent">
                                                                    <div class="tab-pane fade show active"
                                                                        id="custom-tabs-three-lbusiness" role="tabpanel"
                                                                        aria-labelledby="custom-tabs-three-lbusiness-tab">


                                                                        <div class="form-group row mb-3">
                                                                            <label for="name"
                                                                                class="col-sm-3 col-form-label">Business
                                                                                Name</label>
                                                                            <div class="col-sm-9">
                                                                                <div class="input-group ">
                                                                                    <div class="input-group-prepend">
                                                                                        <span
                                                                                            class="input-group-text"><i
                                                                                                class="fas far fa-building"></i></span>
                                                                                    </div>
                                                                                    <input type="text" name="l_bus_name"
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


                                                                                <select name="l_bus_category"
                                                                                    class="form-control select2bs4"
                                                                                    style="width: 100%;">
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
                                                                                    <div class="input-group-prepend">
                                                                                        <span
                                                                                            class="input-group-text"><i
                                                                                                class="fas fa-phone"></i></span>
                                                                                    </div>
                                                                                    <input name="l_bus_phone"
                                                                                        type="text" class="form-control"
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
                                                                                    <div class="input-group-prepend">
                                                                                        <span
                                                                                            class="input-group-text"><i
                                                                                                class="fas fa-map-marker-alt"></i></span>
                                                                                    </div>
                                                                                    <input name="l_bus_address"
                                                                                        type="text" class="form-control"
                                                                                        placeholder="Address..">
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col-sm-4">
                                                                                        <input name="l_bus_city"
                                                                                            type="text"
                                                                                            class="form-control"
                                                                                            placeholder="City..">
                                                                                    </div>
                                                                                    <div class="col-sm-4">
                                                                                        <input name="l_bus_state"
                                                                                            type="text"
                                                                                            class="form-control"
                                                                                            placeholder="State..">
                                                                                    </div>
                                                                                    <div class="col-sm-4">
                                                                                        <input name="l_bus_zip"
                                                                                            type="text"
                                                                                            class="form-control"
                                                                                            placeholder="Postal Code..">
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
                                                                                    <div class="input-group-prepend">
                                                                                        <span
                                                                                            class="input-group-text"><i
                                                                                                class=" fas fa-link"></i></span>
                                                                                    </div>
                                                                                    <input name="l_bus_website"
                                                                                        type="text" class="form-control"
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
                                                                                    <div class="input-group-prepend">
                                                                                        <span
                                                                                            class="input-group-text"><i
                                                                                                class="  fas fa-user"></i></span>
                                                                                    </div>
                                                                                    <input name="l_bus_fname"
                                                                                        type="text" class="form-control"
                                                                                        placeholder="First Name">
                                                                                    <input name="l_bus_lname"
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
                                                                                    <div class="input-group-prepend">
                                                                                        <span
                                                                                            class="input-group-text"><i
                                                                                                class=" fas fa-cog"></i></span>
                                                                                    </div>
                                                                                    <input name="l_bus_title"
                                                                                        type="text" class="form-control"
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
                                                                                    <div class="input-group-prepend">
                                                                                        <span
                                                                                            class="input-group-text"><i
                                                                                                class=" fas fa-envelope"></i></span>
                                                                                    </div>
                                                                                    <input name="l_bus_con_email"
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
                                                                                    <div class="input-group-prepend">
                                                                                        <span
                                                                                            class="input-group-text"><i
                                                                                                class="fas fa-phone"></i></span>
                                                                                    </div>
                                                                                    <input name="l_bus_con_phone"
                                                                                        type="text" class="form-control"
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
                                                                        id="custom-tabs-three-obusiness" role="tabpanel"
                                                                        aria-labelledby="custom-tabs-three-obusiness-tab">

                                                                        <div class="form-group row mb-3">
                                                                            <label for="name"
                                                                                class="col-sm-3 col-form-label">Business
                                                                                Name</label>
                                                                            <div class="col-sm-9">
                                                                                <div class="input-group ">
                                                                                    <div class="input-group-prepend">
                                                                                        <span
                                                                                            class="input-group-text"><i
                                                                                                class="fas fa-shopping-cart"></i></span>
                                                                                    </div>
                                                                                    <input name="o_bus_name" type="text"
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
                                                                                    <option>Ecommerce </option>
                                                                                    <option>Affiliate </option>
                                                                                    <option>Business Consulting Services
                                                                                    </option>
                                                                                    <option>Advertising </option>
                                                                                    <option>Business Brokers </option>
                                                                                    <option>Business Consultants
                                                                                    </option>
                                                                                    <option>Business Marketing </option>
                                                                                    <option>Business Management
                                                                                    </option>
                                                                                    <option>Marketing Services </option>
                                                                                    <option>Virtual assistant </option>
                                                                                    <option>Marketing Consultants
                                                                                    </option>
                                                                                    <option>Business Services </option>
                                                                                    <option>Call Centers </option>
                                                                                    <option>Business Marketing </option>
                                                                                    <option>Staffing Agencies </option>
                                                                                    <option>Staffing Agencies </option>
                                                                                    <option>Education </option>
                                                                                    <option>Financial Services </option>
                                                                                    <option>Accounting, Auditing, &
                                                                                        Bookkeeping Services </option>
                                                                                    <option>Accounting & Tax Consultants
                                                                                    </option>
                                                                                    <option>Certified Public Accountants
                                                                                    </option>
                                                                                    <option>Financial Counselors
                                                                                    </option>
                                                                                    <option>Financial Planning </option>
                                                                                    <option>Investment Services
                                                                                    </option>
                                                                                    <option>Life Coaching </option>
                                                                                    <option>Health & Wellness Programs
                                                                                    </option>
                                                                                    <option>Insurance Services </option>
                                                                                    <option>Health Insurance </option>
                                                                                    <option>Business Insurance </option>
                                                                                    <option>Car Insurance </option>
                                                                                    <option>Life Insurance </option>
                                                                                    <option>IT Services </option>
                                                                                    <option>Computer Security </option>
                                                                                    <option>Information Technology
                                                                                        Services </option>
                                                                                    <option>Internet Products & Services
                                                                                    </option>
                                                                                    <option>Multimedia Services
                                                                                    </option>
                                                                                    <option>Software Design &
                                                                                        Development </option>
                                                                                    <option>Website Design & Development
                                                                                    </option>
                                                                                    <option>Legal Services </option>
                                                                                    <option>Legal Consulting Services
                                                                                    </option>
                                                                                    <option>Weight Loss & Control
                                                                                    </option>
                                                                                    <option>Nutrition </option>
                                                                                    <option>Dietitians </option>
                                                                                    <option>Dance School </option>
                                                                                    <option>Printing Services </option>
                                                                                    <option>Private Education </option>
                                                                                    <option>Travel Accommodation
                                                                                        Services </option>
                                                                                    <option>Accommodation Reservations
                                                                                    </option>
                                                                                    <option>Travel Consultants </option>
                                                                                    <option>Travel Agents </option>
                                                                                    <option>Hotels and B&Bs </option>
                                                                                    <option>Wedding Services </option>
                                                                                    <option>Wedding Planners </option>
                                                                                    <option>Wedding Receptions & Parties
                                                                                    </option>
                                                                                    <option>Event Planning </option>

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
                                                                                    <option>Business & Finance </option>
                                                                                    <option>Communication </option>
                                                                                    <option>Computers / Internet
                                                                                    </option>
                                                                                    <option>Education </option>
                                                                                    <option>Empolyement Jobs </option>
                                                                                    <option>Food & Culinary </option>
                                                                                    <option>Green Products, </option>
                                                                                    <option>Health & Fitness </option>
                                                                                    <option>Marketing </option>
                                                                                    <option>Others </option>
                                                                                    <option>Parenting & Family </option>
                                                                                    <option>Self Help / Growth </option>
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
                                                                                    <div class="input-group-prepend">
                                                                                        <span
                                                                                            class="input-group-text"><i
                                                                                                class=" fas fa-link"></i></span>
                                                                                    </div>
                                                                                    <input name="o_bus_website"
                                                                                        type="text" class="form-control"
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
                                                                                    <div class="input-group-prepend">
                                                                                        <span
                                                                                            class="input-group-text"><i
                                                                                                class="  fas fa-user"></i></span>
                                                                                    </div>
                                                                                    <input name="o_bus_fname"
                                                                                        type="text" class="form-control"
                                                                                        placeholder="First Name">
                                                                                    <input name="o_bus_lname"
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
                                                                                    <div class="input-group-prepend">
                                                                                        <span
                                                                                            class="input-group-text"><i
                                                                                                class=" fas fa-cog"></i></span>
                                                                                    </div>
                                                                                    <input name="o_bus_title"
                                                                                        type="text" class="form-control"
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
                                                                                    <div class="input-group-prepend">
                                                                                        <span
                                                                                            class="input-group-text"><i
                                                                                                class=" fas fa-envelope"></i></span>
                                                                                    </div>
                                                                                    <input name="o_bus_con_email"
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
                                                                                    <div class="input-group-prepend">
                                                                                        <span
                                                                                            class="input-group-text"><i
                                                                                                class="fas fa-phone"></i></span>
                                                                                    </div>
                                                                                    <input name="o_bus_con_phone"
                                                                                        type="text" class="form-control"
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
                                                <!--row-->
                                                
                                                <div class="card-footer clearfix">
                                                    <button type="button" id="toPostGoal" class="btn btn-primary float-right"> Next Step
                                                        <i class="fas fa-chevron-right ml-2"></i></button>
                                                </div>
                                            </div>
                                            
                                            <!--business-listing-end-->
                                            <div class="tab-pane fade show " id="custom-tabs-three-post" role="tabpanel"
                                                aria-labelledby="custom-tabs-three-post-tab">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="card card-default">
                                                            <div class="card-header">
                                                                <h3 class="card-title">
                                                                    <i class="fas fa-comments text-primary mr-1"></i>
                                                                    Posting Goals
                                                                </h3>

                                                                <div class="card-tools">

                                                                </div>
                                                            </div>
                                                            <!-- /.card-header -->
                                                            <div class="card-body">
                                                                <div class="card card-primary ">
                                                                    <div class="card-header">
                                                                        <h3 class="card-title"><span
                                                                                class="mr-2">1</span>MONTHLY POSTING
                                                                            GOALS SETUP</h3>

                                                                        <div class="card-tools">
                                                                            <button type="button" class="btn btn-tool"
                                                                                data-card-widget="collapse"><i
                                                                                    class="fas fa-minus"></i>
                                                                            </button>
                                                                        </div>
                                                                        <!-- /.card-tools -->
                                                                    </div>
                                                                    <!-- /.card-header -->
                                                                    <div class="card-body">
                                                                        <div class="row">
                                                                            <div class="col-sm-3 border-right">
                                                                                <div class="description-block">
                                                                                    <div class="form-group  ">


                                                                                        <div class="input-group  ">
                                                                                            <div
                                                                                                class="input-group-prepend">
                                                                                                <span
                                                                                                    class="input-group-text bg-blue"><i
                                                                                                        class=" fab fa-facebook-f"></i></span>
                                                                                            </div>
                                                                                            <input
                                                                                                name="fb_monthly_share"
                                                                                                type="number"
                                                                                                class="form-control"
                                                                                                placeholder="0" min="0"
                                                                                                value="0">
                                                                                        </div>

                                                                                    </div>
                                                                                    <!--form-group-->
                                                                                </div>
                                                                                <!-- /.description-block -->
                                                                            </div>
                                                                            <!-- /.col -->
                                                                            <div class="col-sm-3 border-right">
                                                                                <div class="description-block">
                                                                                    <div class="form-group  ">


                                                                                        <div class="input-group  ">
                                                                                            <div
                                                                                                class="input-group-prepend">
                                                                                                <span
                                                                                                    class="input-group-text bg-lightblue"><i
                                                                                                        class=" fab fa-twitter"></i></span>
                                                                                            </div>
                                                                                            <input
                                                                                                name="tw_monthly_share"
                                                                                                type="number"
                                                                                                class="form-control"
                                                                                                placeholder="0" min="0"
                                                                                                value="0">
                                                                                        </div>

                                                                                    </div>
                                                                                    <!--form-group-->
                                                                                </div>
                                                                                <!-- /.description-block -->
                                                                            </div>
                                                                            <!-- /.col -->
                                                                            <div class="col-sm-3 border-right">
                                                                                <div class="description-block">
                                                                                    <div class="form-group ">


                                                                                        <div class="input-group  ">
                                                                                            <div
                                                                                                class="input-group-prepend">
                                                                                                <span
                                                                                                    class="input-group-text bg-orange"><i
                                                                                                        class=" fab fa-instagram"></i></span>
                                                                                            </div>
                                                                                            <input
                                                                                                name="in_monthly_share"
                                                                                                type="number"
                                                                                                class="form-control"
                                                                                                placeholder="0" min="0"
                                                                                                value="0">
                                                                                        </div>

                                                                                    </div>
                                                                                    <!--form-group-->
                                                                                </div>
                                                                                <!-- /.description-block -->
                                                                            </div>
                                                                            <!-- /.col -->
                                                                            <div class="col-sm-3 ">
                                                                                <div class="description-block">
                                                                                    <div class="form-group  ">


                                                                                        <div class="input-group  ">
                                                                                            <div
                                                                                                class="input-group-prepend">
                                                                                                <span
                                                                                                    class="input-group-text bg-success"><i
                                                                                                        class=" fab fab fa-google"></i></span>
                                                                                            </div>
                                                                                            <input
                                                                                                name="gb_monthly_share"
                                                                                                type="number"
                                                                                                class="form-control"
                                                                                                placeholder="0" min="0"
                                                                                                value="0">
                                                                                        </div>

                                                                                    </div>
                                                                                    <!--form-group-->
                                                                                </div>
                                                                                <!-- /.description-block -->
                                                                            </div>
                                                                            <!-- /.col -->
                                                                        </div>
                                                                    </div>
                                                                    <!-- /.card-body -->
                                                                </div>
                                                                <!-- /.card-posting-time -->

                                                                <div class="card card-primary ">
                                                                    <div class="card-header">
                                                                        <h3 class="card-title"><span
                                                                                class="mr-2">2</span>AUTO-SCHEDULE SETUP
                                                                        </h3>

                                                                        <div class="card-tools">
                                                                            <button type="button" class="btn btn-tool"
                                                                                data-card-widget="collapse"><i
                                                                                    class="fas fa-minus"></i>
                                                                            </button>
                                                                        </div>
                                                                        <!-- /.card-tools -->
                                                                    </div>
                                                                    <!-- /.card-header -->
                                                                    <div class="card-body">
                                                                        <div class="row">
                                                                            <div class="col-sm-12">
                                                                                <h3
                                                                                    class="card-title text-uppercase float-none">
                                                                                    <i
                                                                                        class="far fa-calendar-alt mr-2"></i>DAYS
                                                                                </h3>


                                                                                <div class=" btn-group-toggle mt-3 mb-3"
                                                                                    data-toggle="buttons">
                                                                                    <label class="btn bg-blue">
                                                                                        <input type="hidden"
                                                                                            name="monday" value="0">
                                                                                        <input type="checkbox"
                                                                                            name="monday" id="option1"
                                                                                            autocomplete="off"> MO
                                                                                    </label>
                                                                                    <label class="btn bg-blue">
                                                                                        <input type="hidden"
                                                                                            name="tuesday" value="0">
                                                                                        <input type="checkbox"
                                                                                            name="tuesday" id="option2"
                                                                                            autocomplete="off"> TU
                                                                                    </label>
                                                                                    <label class="btn bg-blue">
                                                                                        <input type="hidden"
                                                                                            name="wednesday" value="0">
                                                                                        <input type="checkbox"
                                                                                            name="wednesday"
                                                                                            id="option3"
                                                                                            autocomplete="off"> WE
                                                                                    </label>
                                                                                    <label class="btn bg-blue">
                                                                                        <input type="hidden"
                                                                                            name="thrusday" value="0">
                                                                                        <input type="checkbox"
                                                                                            name="thrusday" id="option4"
                                                                                            autocomplete="off">TH
                                                                                    </label>
                                                                                    <label class="btn bg-blue">
                                                                                        <input type="hidden"
                                                                                            name="friday" value="0">
                                                                                        <input type="checkbox"
                                                                                            name="friday" id="option4"
                                                                                            autocomplete="off">FR
                                                                                    </label>
                                                                                    <label class="btn bg-blue">
                                                                                        <input type="hidden"
                                                                                            name="saturday" value="0">
                                                                                        <input type="checkbox"
                                                                                            name="saturday" id="option4"
                                                                                            autocomplete="off">SA
                                                                                    </label>
                                                                                    <label class="btn bg-blue">
                                                                                        <input type="hidden"
                                                                                            name="sunday" value="0">
                                                                                        <input type="checkbox"
                                                                                            name="sunday" id="option4"
                                                                                            autocomplete="off">SU
                                                                                    </label>
                                                                                </div>
                                                                                <!-- /.week-days -->
                                                                            </div>
                                                                            <!--column-12-->
                                                                        </div>
                                                                        <!--row-->

                                                                        <div class="row">
                                                                            <div class="col-sm-12">
                                                                                <h3
                                                                                    class="card-title text-uppercase float-none">
                                                                                    <i
                                                                                        class="far fa-clock mr-2"></i>TIME
                                                                                </h3>


                                                                                <div class=" mt-2 mb-2">
                                                                                    <div class="row">
                                                                                        <div class="col-sm-5">
                                                                                            <div class="form-group">
                                                                                                <label>From:</label>
                                                                                                <div class="input-group date"
                                                                                                    id="timepicker1"
                                                                                                    data-target-input="nearest">
                                                                                                    <input
                                                                                                        name="start_time"
                                                                                                        type="text"
                                                                                                        class="form-control datetimepicker-input"
                                                                                                        data-target="#timepicker" />
                                                                                                    <div class="input-group-append"
                                                                                                        data-target="#timepicker1"
                                                                                                        data-toggle="datetimepicker">
                                                                                                        <div
                                                                                                            class="input-group-text">
                                                                                                            <i
                                                                                                                class="far fa-clock"></i>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <!-- /.input group -->
                                                                                            </div>
                                                                                            <!-- /.form group -->
                                                                                        </div>
                                                                                        <!--column-5-->
                                                                                        <div class="col-sm-5">
                                                                                            <div class="form-group">
                                                                                                <label>To:</label>
                                                                                                <div class="input-group date"
                                                                                                    id="timepicker2"
                                                                                                    data-target-input="nearest">
                                                                                                    <input
                                                                                                        name="end_time"
                                                                                                        type="text"
                                                                                                        class="form-control datetimepicker-input"
                                                                                                        data-target="#timepicker" />
                                                                                                    <div class="input-group-append"
                                                                                                        data-target="#timepicker2"
                                                                                                        data-toggle="datetimepicker">
                                                                                                        <div
                                                                                                            class="input-group-text">
                                                                                                            <i
                                                                                                                class="far fa-clock"></i>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <!-- /.input group -->
                                                                                            </div>
                                                                                            <!-- /.form group -->
                                                                                        </div>
                                                                                        <!--column-5-->
                                                                                        <div class="col-sm-2">
                                                                                            <div class="form-group">
                                                                                                <label>Max Post:</label>
                                                                                                <select name="max_post"
                                                                                                    class="form-control">
                                                                                                    <option> 1</option>
                                                                                                    <option> 2</option>
                                                                                                    <option> 3</option>
                                                                                                    <option> 4</option>
                                                                                                    <option> 5</option>
                                                                                                </select>
                                                                                            </div>
                                                                                        </div>
                                                                                        <!--column-2-->
                                                                                    </div>
                                                                                    <!--row-->
                                                                                    {{-- <button type="button"
                                                                                        class="btn  bg-gradient-primary btn-sm text-uppercase float-right"><i
                                                                                            class="fas fa-plus mr-2"></i>Add
                                                                                        Time</button> --}}
                                                                                </div>
                                                                            </div>
                                                                            <!--column-12-->
                                                                        </div>
                                                                        <!--row-->

                                                                        <div class="row">
                                                                            <div class="col-sm-12">
                                                                                <h3
                                                                                    class="card-title text-uppercase float-none">
                                                                                    <i
                                                                                        class="far fa-calendar-alt mr-2"></i>TIME
                                                                                    ZONE</h3>
                                                                                <div class="form-group  mb-2 mt-2">

{!! Form::select('time_zone',$timezones ,null, array('class'=>'form-control select2bs4', 'width'=> '100%')) !!}

                                                                                </div>
                                                                                <!--form-group-->



                                                                            </div>
                                                                            <!--column-12-->
                                                                        </div>
                                                                        <!--row-->
                                                                    </div>
                                                                    <!-- /.card-body -->
                                                                </div>
                                                                <!-- /.card-Select-Network -->



                                                            </div>
                                                            <!-- /.card-body -->


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
                                                <!--row-->
                                                
                                                <div class="card-footer">
                                                    <input type="submit" class="btn btn-primary float-right" value="Save">
                                                       
                                                </div>
                                            </div>
                                            {!! Form::close() !!}
                                            <!--Add-Posts-end-->
                                            <div class="tab-pane fade" id="custom-tabs-three-social" role="tabpanel"
                                                aria-labelledby="custom-tabs-three-social-tab">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        @php $id = '';
                                                        if(isset($_GET['id'])) $id = $_GET['id']; @endphp
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
                                                                                <ul
                                                                                    class="list-group list-group-unbordered mb-3">
                                                                                    <li class="list-group-item ">
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
                                                                                    <li class="list-group-item">
                                                                                    <a href="{{url('/facebook/'.$id)}}" class="text-muted">Facebook
                                                                                            Page<span
                                                                                            class="float-right"><span
                                                                                                class="btn bg-light btn-outline-danger"><i
                                                                                                    class="fab fa-facebook-f"></i>
                                                                                                Connect</span></span></a>
                                                                                    </li>
                                                                                    <li class="list-group-item">
                                                                                        <a href="{{url('/tweet/'.$id)}}"
                                                                                            class="text-muted">Twitter<span
                                                                                            class="float-right"><span
                                                                                                class="btn bg-light btn-outline-danger"><i
                                                                                                    class="fab fa-twitter"></i>
                                                                                                Connect</span></span></a>
                                                                                    </li>

                                                                                    <li class="list-group-item">
                                                                                        <a href="{{url('/instagram/'.$id)}}"
                                                                                            class="text-muted">Instagram<span
                                                                                            class="float-right"><span
                                                                                                class="btn bg-light btn-outline-danger"><i
                                                                                                    class="fab fa-instagram"></i>
                                                                                                Connect</span></span></a>
                                                                                    </li>
                                                                                    <li class="list-group-item">
                                                                                        <a href="{{url('/google/'.$id)}}" class="text-muted">Google
                                                                                            MyBusiness<span
                                                                                            class="float-right"><span
                                                                                                class="btn bg-light btn-outline-danger"><i
                                                                                                    class="fab fa-google"></i>
                                                                                                Connect</span></span></a>
                                                                                    </li>

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
                                                                        <span class="info-box-text">CONNECTED NETWORKS

                                                                        </span>


                                                                        <div class="progress ">
                                                                            <div class="progress-bar" style="width: 2%">
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
                                                                        <span class="info-box-text">Total Reach</span>
                                                                        <span class="info-box-number">0</span>
                                                                    </div>
                                                                    <!-- /.info-box-content -->
                                                                </div>
                                                            </div>
                                                            <!--column-6-->
                                                        </div>


                                                    </div>
                                                    <!--column-6-->
                                                    <!--column-6-->
                                                </div>
                                                <!--row-->
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="card">
                                                            <div class="card-header">
                                                                <h3 class="card-title text-uppercase"><i
                                                                        class="nav-icon fas fa-link mr-2"></i> SOCIAL
                                                                    CONNECT LINK </h3>
                                                                <div class="card-tools">
                                                                    <button type="button"
                                                                        class="btn  bg-gradient-primary btn-sm text-uppercase"
                                                                        data-toggle="modal" data-target="#send-email"><i
                                                                            class="far fa-envelope mr-2"></i>SEND
                                                                        EMAIL</button>
                                                                </div>
                                                            </div>
                                                             <div class="modal fade" id="send-email">
    {!!Form::open(['action' => ['MiscController@mailSend', $id]]) !!}
    {!!Form::token() !!}
    {!!Form::hidden('bus_id', $id) !!}
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
                        
                            <p><b>Step 1:</b> Click Here To ---> <a href="{{url('/social-setup/'.$id)}}"> Connect Your Social Media Accounts!</a></p>
                        
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
                    <!-- /.card-body -->



            </section>
            <!-- /.Left col -->



        </div>
        <!-- /.row (main row) -->


    </div><!-- /.container-fluid -->
</section>


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
    // $(document).ready(function (){
    //     var lastTab = document.location.hash; 
    // if (lastTab) {
    // $('a [href="' + lastTab + '"]').click();
    
    // }

    // });
        
</script>

@endsection