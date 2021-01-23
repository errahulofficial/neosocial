@extends('layouts.master')

@section('content')
<style>
    .e-mail .nav-tabs .nav-link.active{background-color: #007bff!important; opacity: 1;}
 .e-mail .nav-tabs .nav-link li, .e-mail .nav-tabs .nav-link i{color: #fff; font-size: 14px;}
 .e-mail .nav-tabs .nav-link{border-bottom: 1px solid #adb5bd;}
 .note-editable.card-block {
     height: 190px;
}
    .badge {
    width: 35px;
    height: 35px;
    padding: 10px;
    font-size: 80%;
    border-radius: 50%;
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
                                        aria-selected="false"><i class="fas fa-share-alt mr-1"></i> Social Setup</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="custom-tabs-three-social-tab" data-toggle="pill"
                                        href="#custom-tabs-three-social" role="tab"
                                        aria-controls="custom-tabs-three-social" aria-selected="false"><i
                                            class="fas fa-cogs mr-1"></i> Customize</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="custom-tabs-three-email-tab" data-toggle="pill"
                                        href="#custom-tabs-three-email" role="tab"
                                        aria-controls="custom-tabs-three-email" aria-selected="false"><i
                                            class="fas fa-envelope mr-1"></i> Email</a>
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
                                        {!! Form::open(['action' => 'LeadgenCampaignController@store', 'id' => 'form'])
                                        !!}
                                        @csrf
                                        <div class="tab-content" id="custom-tabs-three-tabContent">

                                            <div class="tab-pane fade show active" id="custom-tabs-three-listing"
                                                role="tabpanel" aria-labelledby="custom-tabs-three-listing-tab">
                                                <div class="row">
                                                    <div class="col-lg-12">
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
                                                                                    <option>Accommodation Reservations
                                                                                    </option>
                                                                                    <option>Acupuncture & Acupressure
                                                                                    </option>
                                                                                    <option>Advertising </option>
                                                                                    <option>Aerial Photography </option>
                                                                                    <option>After School Programs
                                                                                    </option>
                                                                                    <option>Air Cleaning & Purifying
                                                                                        Equipment Dealers </option>
                                                                                    <option>Air Conditioning Contractors
                                                                                    </option>
                                                                                    <option>Air Conditioning Repair
                                                                                    </option>
                                                                                    <option>Air Duct Cleaning </option>
                                                                                    <option>Alarm Services </option>
                                                                                    <option>Alternative Medicine
                                                                                    </option>
                                                                                    <option>Animal Shelters </option>
                                                                                    <option>Antique Dealers </option>
                                                                                    <option>Appliance Repair </option>
                                                                                    <option>Appraisers </option>
                                                                                    <option>Architectural Services
                                                                                    </option>
                                                                                    <option>Artificial Stone & Brick
                                                                                    </option>
                                                                                    <option>Audio Hearing Aid Services
                                                                                    </option>
                                                                                    <option>Auto Body Parts </option>
                                                                                    <option>Auto Body Shops </option>
                                                                                    <option>Auto Detailing </option>
                                                                                    <option>Auto Electrical Repair
                                                                                    </option>
                                                                                    <option>Auto Leasing </option>
                                                                                    <option>Auto Motive </option>
                                                                                    <option>Auto Parts </option>
                                                                                    <option>Auto Recycling </option>
                                                                                    <option>Auto Restoration </option>
                                                                                    <option>Auto Title Loans </option>
                                                                                    <option>Auto Upholstery </option>
                                                                                    <option>Bail Bond Services </option>

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

                                                </div>
                                                <!--row-->

                                                <div class="card-footer clearfix">
                                                    <button type="button" class="btn btn-primary float-right"> Next Step
                                                        <i class="fas fa-chevron-right ml-2"></i></button>
                                                </div>
                                            </div>

                                            <!--business-listing-end-->
                                            <div class="tab-pane fade show " id="custom-tabs-three-post" role="tabpanel"
                                                aria-labelledby="custom-tabs-three-post-tab">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="card card-default">
                                                            <div class="card-header">
                                                                <h3 class="card-title">
                                                                    <i class="fas fa-share-alt text-primary mr-1"></i>
                                                                    Social Setup
                                                                </h3>

                                                            </div>
                                                            <!-- /.card-header -->
                                                            <div class="card-body">
                                                                <div class="form-group row mb-3">
                                                                    <label for="phone"
                                                                        class="col-sm-3 col-form-label">Facebook Page
                                                                        Link</label>
                                                                    <div class="col-sm-9">
                                                                        <div class="input-group">
                                                                            <div class="input-group-prepend">
                                                                                <span class="input-group-text"><i
                                                                                        class="fas fa-link"></i></span>
                                                                            </div>
                                                                            <input name="l_bus_phone" type="text"
                                                                                class="form-control">
                                                                        </div>
                                                                        <!-- /.input group -->
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                                <!--row-->

                                                <div class="card-footer">
                                                    <button type="button" class="btn btn-primary float-right"> Next Step
                                                        <i class="fas fa-chevron-right ml-2"></i></button>
                                                </div>
                                            </div>
                                            <!--Add-Social-end-->
                                            <div class="tab-pane fade" id="custom-tabs-three-social" role="tabpanel"
                                                aria-labelledby="custom-tabs-three-social-tab">
                                                <div class="row">
                                                    <div class="col-lg-12">

                                                        <div class="card card-default">
                                                            <div class="card-header">
                                                                <h3 class="card-title">
                                                                    <i class="fas fa-cogs text-primary mr-1"></i>
                                                                    Customize
                                                                </h3>
                                                            </div>
                                                            <!-- /.card-header -->
                                                            <div class="card-body">
                                                                <div class="form-group row mb-3">
                                                                    <label for="phone"
                                                                        class="col-sm-3 col-form-label">What Experience
                                                                        Do You Have With This Company?</label>
                                                                    <div class="col-sm-9">
                                                                        <div class="input-group">

                                                                            <select name="experience_type"
                                                                                class="form-control select2bs4"
                                                                                style="width: 100%;">
                                                                                <option value="1">I've Been A Customer
                                                                                </option>
                                                                                <option value="2">Referral From Someone
                                                                                    I Know </option>
                                                                                <option value="3">No Relationship, Cold
                                                                                    Campaign </option>

                                                                            </select>
                                                                        </div>
                                                                        <!-- /.input group -->
                                                                    </div>
                                                                </div>
                                                                <div class="experience_cat">

                                                                </div>
                                                                <!-- Form group end -->
                                                                <div class="form-group row mb-3">
                                                                    <label for="phone" class="col-sm-3 col-form-label">
                                                                        Niche</label>
                                                                    <div class="col-sm-9">
                                                                        <div class="input-group">

                                                                            <select name="niche"
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
                                                                        <!-- /.input group -->
                                                                    </div>
                                                                </div>
                                                                <!-- Form group end -->
                                                                <div class="form-group row mb-3">
                                                                    <label for="phone" class="col-sm-3 col-form-label">
                                                                        Choose The Buyer Type</label>
                                                                    <div class="col-sm-9">
                                                                        <div class="input-group">

                                                                            <select name="buyer_type"
                                                                                class="form-control select2bs4"
                                                                                style="width: 100%;">
                                                                                <option>Customer </option>
                                                                                <option>Client </option>
                                                                                <option>Guest </option>
                                                                                <option>Subscriber </option>
                                                                                <option>Patient </option>
                                                                                <option>Member </option>

                                                                            </select>
                                                                        </div>
                                                                        <!-- /.input group -->
                                                                    </div>
                                                                </div>
                                                                <!-- Form group end -->

                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>

                                                <div class="card-footer clearfix">
                                                    <button type="button" class="btn btn-primary float-right"> Next Step
                                                        <i class="fas fa-chevron-right ml-2"></i></button>
                                                </div>
                                            </div>
                                            <!--Customize-end-->
                                            <!--Map-Fields-end-->
                        <div class="tab-pane fade" id="custom-tabs-three-email" role="tabpanel" aria-labelledby="custom-tabs-three-email-tab">
                            <div class="row">
                              <div class="col-4 col-sm-3">
  
                                
                                 
                  
                                  <div class="color-palette-set e-mail">
                                    <h6 class="bg-primary color-palette m-0 p-2 text-center">EMAIL SEQUENCE</h6>
                                    <div class="bg-black disabled color-palette">
                                      <div class="nav flex-column nav-tabs h-100" id="vert-tabs-tab" role="tablist" aria-orientation="vertical">
                                        <a class="nav-link alert m-0 active text-white d-flex post" id="vert-tabs-post1-tab" data-toggle="pill" href="#vert-tabs-post1" role="tab" aria-controls="vert-tabs-post1" aria-selected="true"><span class="badge bg-white  mr-3 h-100">1</span>
                                          <ul class="icon-list ">
                                            <li ><i class="fas fa-envelope mr-2" ></i>Message </li>
                                            <li class="email1">5 Minute(s) </li>
                                          </ul>
                                          </a>
                                          
                                        <a class="nav-link alert text-white d-flex  m-0 " id="vert-tabs-post2-tab" data-toggle="pill" href="#vert-tabs-post2" role="tab" aria-controls="vert-tabs-post2" aria-selected="false"><span class="badge bg-white  mr-3 h-100">2</span>
                                          <ul class="icon-list ">
                                            <li ><i class="fas fa-envelope mr-2" ></i>Message </li>
                                            <li class="email2">1 Day(s) </li>
                                          </ul>
                                          </a>
                                        <a class="nav-link alert text-white d-flex m-0 " id="vert-tabs-post3-tab" data-toggle="pill" href="#vert-tabs-post3" role="tab" aria-controls="vert-tabs-post3" aria-selected="false"><span class="badge bg-white  mr-3 h-100">3</span>
                                          <ul class="icon-list ">
                                            <li ><i class="fas fa-envelope mr-2" ></i>Message </li>
                                            <li class="email3">2 Day(s) </li>
                                          </ul>
                                          </a>
                                        <a class="nav-link alert text-white d-flex m-0 " id="vert-tabs-post4-tab" data-toggle="pill" href="#vert-tabs-post4" role="tab" aria-controls="vert-tabs-post4" aria-selected="false"><span class="badge bg-white  mr-3 h-100">4</span>
                                          <ul class="icon-list ">
                                            <li ><i class="fas fa-envelope mr-2" ></i>Message </li>
                                            <li class="email4">4 Day(s) </li>
                                          </ul>
                                          </a>
                                          <a class="nav-link alert text-white d-flex m-0 " id="vert-tabs-post4-tab" data-toggle="pill" href="#vert-tabs-post5" role="tab" aria-controls="vert-tabs-post4" aria-selected="false"><span class="badge bg-white  mr-3 h-100">5</span>
                                            <ul class="icon-list ">
                                              <li ><i class="fas fa-envelope mr-2" ></i>Message </li>
                                              <li class="email5">5 Day(s) </li>
                                            </ul>
                                            </a>
                                      </div>
                                    </div>
                                  </div>
                                  
                                 
                              </div>
                              <div class="col-8 col-sm-9">
                                <div class="tab-content" id="vert-tabs-tabContent">
                                  <div class="tab-pane text-left fade show active" id="vert-tabs-post1" role="tabpanel" aria-labelledby="vert-tabs-post1-tab">
                                    <div class="card card-default">
                                      <div class="card-header">
                                        <h4 class="card-title inline-flex align-items-center">
                                         
                                          1st Message
                                          <div class="custom-control custom-switch  ml-2" >
                                            <input type="hidden" name="email1onoff" value="0">
                                            <input type="checkbox" name="email1onoff" class="custom-control-input" checked id="customSwitch1" value="1">
                                            <label class="custom-control-label" for="customSwitch1"></label>
                                          </div>
                                        </h4>
                            
                                        <div class="card-tools d-flex m-0">
                                          <div class="form-group d-flex align-items-center mb-0">
                                            <h6 class="m-0 mr-2">Send</h6>
                                            <select name="email1number" class="form-control p-0 h-100">
                                              <option>1</option>
                                              <option>2</option>
                                              <option selected>3</option>
                                             
                                            </select>
                                         
                                          </div>
                                          <div class="form-group d-flex align-items-center mb-0 ml-2">
                                           
                                            <select name="email1day" class="form-control p-0 h-100">
                                              <option>Minutes</option>
                                              <option>Hours</option>
                                              <option selected>Days</option>
                                             
                                            </select>
                                            </select>
                                            <h6 class="m-0 text-nowrap ml-2">After Adding To Campaign</h6>
                                         
                                          </div>
                                        </div>
                                      </div>
                                      <!-- /.card-header -->
                                      <div class="card-body">
                                        <div class="row">
                                          <div class="col-12">
                                            <div class="form-group row">
                                              <label for="name" class="col-sm-2 col-form-label">Subject</label>
                                              <div class="col-sm-10">
                                                <input type="text" name="email1subject" class="form-control" id="name" value="">
                                              </div>
                                            </div>
                                            <div class="form-group row">
                                              <label for="name" class="col-sm-2 col-form-label">Message</label>
                                              <div class="col-sm-10">
                                                <textarea id="compose-textarea-1" name="email1content" class="form-control" >
                                                  
                                             </textarea>
                                              </div>
                                            </div>
                                          
                                          
                                          </div>
                                          <!-- /.col -->
                                        </div>
                                        <!-- /.row -->
                                      </div>
                                      <!-- /.card-body -->
                                    
                                      <div class="card-footer clearfix text-right">
                                        <div class="button-group">
                                        <a class="btn  mb-0 bg-warning" data-toggle="modal" data-target="#reset-template">
                                          <i class="fas fa-redo"></i>
                                        </a>
                                        <a class="btn  mb-0 bg-primary" data-toggle="modal" data-target="#email-preview">
                                          <i class="fas fa-eye"></i> 
                                        </a>
                                        <a class="btn  mb-0 bg-success" data-toggle="modal" data-target="#send-test">
                                          <i class="fas fa-paper-plane"></i> 
                                        </a>
                                       </div>
                                      </div>
                                    </div><!--card-->
                                    </div><!--first-tab-->
                                    <div class="tab-pane text-left fade " id="vert-tabs-post2" role="tabpanel" aria-labelledby="vert-tabs-post2-tab">
                                      <div class="card card-default">
                                        <div class="card-header">
                                          <h4 class="card-title inline-flex align-items-center">
                                           
                                            2nd Message
                                            <div class="custom-control custom-switch  ml-2" >
                                              <input type="hidden" name="email2onoff" value="0">
                                              <input type="checkbox" name="email2onoff" value="1" checked class="custom-control-input" id="customSwitch2">
                                              <label class="custom-control-label" for="customSwitch2"></label>
                                            </div>
                                          </h4>
                              
                                          <div class="card-tools d-flex m-0">
                                            <div class="form-group d-flex align-items-center mb-0">
                                              <h6 class="m-0 mr-2">Send</h6>
                                              <select name="email2number" class="form-control p-0 h-100">
                                                <option>1</option>
                                                <option>2</option>
                                                <option selected>3</option>
                                               
                                              </select>
                                           
                                            </div>
                                            <div class="form-group d-flex align-items-center mb-0 ml-2">
                                             
                                              <select name="email2day" class="form-control p-0 h-100">
                                                <option>Minutes</option>
                                                <option>Hours</option>
                                                <option selected>Days</option>
                                               
                                              </select>
                                              </select>
                                              <h6 class="m-0 text-nowrap ml-2">After Adding To Campaign</h6>
                                           
                                            </div>
                                          </div>
                                        </div>
                                        <!-- /.card-header -->
                                        <div class="card-body">
                                          <div class="row">
                                            <div class="col-12">
                                              <div class="form-group row">
                                                <label for="name" class="col-sm-2 col-form-label">Subject</label>
                                                <div class="col-sm-10">
                                                  <input type="text" name="email2subject" class="form-control" id="name" value="I only have 2 spots left.">
                                                </div>
                                              </div>
                                              <div class="form-group row">
                                                <label for="name" class="col-sm-2 col-form-label">Message</label>
                                                <div class="col-sm-10">
                                                  <textarea id="compose-textarea-2" name="email2content" class="form-control" >
                                                   
                                               </textarea>
                                                </div>
                                              </div>
                                            
                                            
                                            </div>
                                            <!-- /.col -->
                                          </div>
                                          <!-- /.row -->
                                        </div>
                                        <!-- /.card-body -->
                                      
                                        <div class="card-footer clearfix text-right">
                                          <div class="button-group">
                                          <a class="btn  mb-0 bg-warning" data-toggle="modal" data-target="#reset-template">
                                            <i class="fas fa-redo"></i>
                                          </a>
                                          <a class="btn  mb-0 bg-primary" data-toggle="modal" data-target="#email-preview">
                                            <i class="fas fa-eye"></i> 
                                          </a>
                                          <a class="btn  mb-0 bg-success" data-toggle="modal" data-target="#send-test">
                                            <i class="fas fa-paper-plane"></i> 
                                          </a>
                                         </div>
                                        </div>
                                      </div><!--card-->
                                      </div><!--second-tab-->
  
                                      <div class="tab-pane text-left fade " id="vert-tabs-post3" role="tabpanel" aria-labelledby="vert-tabs-post3-tab">
                                        <div class="card card-default">
                                          <div class="card-header">
                                            <h4 class="card-title inline-flex align-items-center">
                                             
                                              3rd Message
                                              <div class="custom-control custom-switch  ml-2" >
                                                <input name="email3onoff" value="0" type="hidden">
                                                <input name="email3onoff" value="1" type="checkbox" checked class="custom-control-input" id="customSwitch3">
                                                <label class="custom-control-label" for="customSwitch3"></label>
                                              </div>
                                            </h4>
                                
                                            <div class="card-tools d-flex m-0">
                                              <div class="form-group d-flex align-items-center mb-0">
                                                <h6 class="m-0 mr-2">Send</h6>
                                                <select name="email3number" class="form-control p-0 h-100">
                                                  <option>1</option>
                                                  <option>2</option>
                                                  <option selected>3</option>
                                                 
                                                </select>
                                             
                                              </div>
                                              <div class="form-group d-flex align-items-center mb-0 ml-2">
                                               
                                                <select name="email3day" class="form-control p-0 h-100">
                                                  <option>Minutes</option>
                                                  <option>Hours</option>
                                                  <option selected>Days</option>
                                                 
                                                </select>
                                                </select>
                                                <h6 class="m-0 text-nowrap ml-2">After Adding To Campaign</h6>
                                             
                                              </div>
                                            </div>
                                          </div>
                                          <!-- /.card-header -->
                                          <div class="card-body">
                                            <div class="row">
                                              <div class="col-12">
                                                <div class="form-group row">
                                                  <label for="name" class="col-sm-2 col-form-label">Subject</label>
                                                  <div class="col-sm-10">
                                                    <input name="email3subject" type="text" class="form-control" id="name" value="I only have 2 spots left.">
                                                  </div>
                                                </div>
                                                <div class="form-group row">
                                                  <label for="name" class="col-sm-2 col-form-label">Message</label>
                                                  <div class="col-sm-10">
                                                    <textarea id="compose-textarea-3" name="email3content" class="form-control" >
                                                    
                                                 </textarea>
                                                  </div>
                                                </div>
                                              
                                              
                                              </div>
                                              <!-- /.col -->
                                            </div>
                                            <!-- /.row -->
                                          </div>
                                          <!-- /.card-body -->
                                        
                                          <div class="card-footer clearfix text-right">
                                            <div class="button-group">
                                            <a class="btn  mb-0 bg-warning" data-toggle="modal" data-target="#reset-template">
                                              <i class="fas fa-redo"></i>
                                            </a>
                                            <a class="btn  mb-0 bg-primary" data-toggle="modal" data-target="#email-preview">
                                              <i class="fas fa-eye"></i> 
                                            </a>
                                            <a class="btn  mb-0 bg-success" data-toggle="modal" data-target="#send-test">
                                              <i class="fas fa-paper-plane"></i> 
                                            </a>
                                           </div>
                                          </div>
                                        </div><!--card-->
                                        </div><!--third-tab-->
  
                                        <div class="tab-pane text-left fade " id="vert-tabs-post4" role="tabpanel" aria-labelledby="vert-tabs-post4-tab">
                                          <div class="card card-default">
                                            <div class="card-header">
                                              <h4 class="card-title inline-flex align-items-center">
                                               
                                                4th Message
                                                <div class="custom-control custom-switch  ml-2" >
                                                  <input name="email4onoff" value="0" type="hidden">
                                                  <input name="email4onoff" value="1" type="checkbox" checked class="custom-control-input" id="customSwitch4">
                                                  <label class="custom-control-label" for="customSwitch4"></label>
                                                </div>
                                              </h4>
                                  
                                              <div class="card-tools d-flex m-0">
                                                <div class="form-group d-flex align-items-center mb-0">
                                                  <h6 class="m-0 mr-2">Send</h6>
                                                  <select name="email4number" class="form-control p-0 h-100">
                                                    <option>1</option>
                                                    <option>2</option>
                                                    <option selected>3</option>
                                                   
                                                  </select>
                                               
                                                </div>
                                                <div class="form-group d-flex align-items-center mb-0 ml-2">
                                                 
                                                  <select name="email4day" class="form-control p-0 h-100">
                                                    <option>Minutes</option>
                                                    <option>Hours</option>
                                                    <option selected>Days</option>
                                                   
                                                  </select>
                                                  </select>
                                                  <h6 class="m-0 text-nowrap ml-2">After Adding To Campaign</h6>
                                               
                                                </div>
                                              </div>
                                            </div>
                                            <!-- /.card-header -->
                                            <div class="card-body">
                                              <div class="row">
                                                <div class="col-12">
                                                  <div class="form-group row">
                                                    <label for="name" class="col-sm-2 col-form-label">Subject</label>
                                                    <div class="col-sm-10">
                                                      <input name="email4subject" type="text" class="form-control" id="name" value="I only have 2 spots left.">
                                                    </div>
                                                  </div>
                                                  <div class="form-group row">
                                                    <label for="name" class="col-sm-2 col-form-label">Message</label>
                                                    <div class="col-sm-10">
                                                      <textarea name="email4content" id="compose-textarea-4" class="form-control" >
                                                       
                                                   </textarea>
                                                    </div>
                                                  </div>
                                                
                                                
                                                </div>
                                                <!-- /.col -->
                                              </div>
                                              <!-- /.row -->
                                            </div>
                                            <!-- /.card-body -->
                                          
                                            <div class="card-footer clearfix text-right">
                                              <div class="button-group">
                                              <a class="btn  mb-0 bg-warning" data-toggle="modal" data-target="#reset-template">
                                                <i class="fas fa-redo"></i>
                                              </a>
                                              <a class="btn  mb-0 bg-primary" data-toggle="modal" data-target="#email-preview">
                                                <i class="fas fa-eye"></i> 
                                              </a>
                                              <a class="btn  mb-0 bg-success" data-toggle="modal" data-target="#send-test">
                                                <i class="fas fa-paper-plane"></i> 
                                              </a>
                                             </div>
                                            </div>
                                          </div><!--card-->
                                          </div><!--fourth-tab-->
  
                                          <div class="tab-pane text-left fade " id="vert-tabs-post5" role="tabpanel" aria-labelledby="vert-tabs-post5-tab">
                                            <div class="card card-default">
                                              <div class="card-header">
                                                <h4 class="card-title inline-flex align-items-center">
                                                 
                                                  5th Message
                                                  <div class="custom-control custom-switch  ml-2" >
                                                    <input type="hidden" name="email5onoff" value="0">
                                                    <input type="checkbox" name="email5onoff" value="1" checked class="custom-control-input" id="customSwitch5">
                                                    <label class="custom-control-label" for="customSwitch5"></label>
                                                  </div>
                                                </h4>
                                    
                                                <div class="card-tools d-flex m-0">
                                                  <div class="form-group d-flex align-items-center mb-0">
                                                    <h6 class="m-0 mr-2">Send</h6>
                                                    <select name="email5number" class="form-control p-0 h-100">
                                                      <option>1</option>
                                                      <option>2</option>
                                                      <option selected>3</option>
                                                     
                                                    </select>
                                                 
                                                  </div>
                                                  <div class="form-group d-flex align-items-center mb-0 ml-2">
                                                   
                                                    <select name="email5day" class="form-control p-0 h-100">
                                                      <option>Minutes</option>
                                                      <option>Hours</option>
                                                      <option selected>Days</option>
                                                     
                                                    </select>
                                                    </select>
                                                    <h6 class="m-0 text-nowrap ml-2">After Adding To Campaign</h6>
                                                 
                                                  </div>
                                                </div>
                                              </div>
                                              <!-- /.card-header -->
                                              <div class="card-body">
                                                <div class="row">
                                                  <div class="col-12">
                                                    <div class="form-group row">
                                                      <label for="name" class="col-sm-2 col-form-label">Subject</label>
                                                      <div class="col-sm-10">
                                                        <input name="email5subject" type="text" class="form-control" id="name" value="I only have 2 spots left.">
                                                      </div>
                                                    </div>
                                                    <div class="form-group row">
                                                      <label for="name" class="col-sm-2 col-form-label">Message</label>
                                                      <div class="col-sm-10">
                                                        <textarea id="compose-textarea-5" name="email5content" class="form-control" >
                                                          
                                                     </textarea>
                                                      </div>
                                                    </div>
                                                  
                                                  
                                                  </div>
                                                  <!-- /.col -->
                                                </div>
                                                <!-- /.row -->
                                              </div>
                                              <!-- /.card-body -->
                                            
                                              <div class="card-footer clearfix text-right">
                                                <div class="button-group">
                                                <a class="btn  mb-0 bg-warning" data-toggle="modal" data-target="#reset-template">
                                                  <i class="fas fa-redo"></i>
                                                </a>
                                                <a class="btn  mb-0 bg-primary" data-toggle="modal" data-target="#email-preview">
                                                  <i class="fas fa-eye"></i> 
                                                </a>
                                                <a class="btn  mb-0 bg-success" data-toggle="modal" data-target="#send-test">
                                                  <i class="fas fa-paper-plane"></i> 
                                                </a>
                                               </div>
                                              </div>
                                            </div><!--card-->
                                            </div><!--fifth-tab-->
                                    </div><!--tab-content-->
                              </div>
                              
                            </div><!--row-->
                         
          <div class="card-footer clearfix">
            <button type="submit" class="btn orange-button float-right"><i class="fas fa-check mr-2"></i> FINISH </button>
           
          </div>
  
                          </div>
                          <!--Email-end-->

                                        </div>
                                        {!! Form::close() !!}
                                    </div>
                                    <!-- /.card -->


                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->
                        </div>

                    </div>
                    <!-- /.card-body -->
                </div>
            </section>
            <!-- /.Left col -->
        </div>
        <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
</section>

<div class="modal fade" id="send-email">
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
                                    <input type="text" class="form-control" placeholder="Webmaster First Name">
                                </div>
                            </div>
                            <!--column-6-->
                            <div class="col-sm-6">
                                <div class="input-group ">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-primary"><i class="fas fas fa-user"></i></span>
                                    </div>
                                    <input type="text" class="form-control" placeholder="Webmaster Last Name">
                                </div>
                            </div>
                            <!--column-6-->
                        </div>
                        <!--form-group-row-->

                        <div class="form-group row mb-2">
                            <div class="col-sm-6">
                                <div class="input-group ">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-primary">To</span>
                                    </div>
                                    <input type="email" class="form-control" placeholder="example@email.com">
                                </div>
                            </div>
                            <!--column-6-->
                            <div class="col-sm-6">
                                <div class="input-group ">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-primary">CC</span>
                                    </div>
                                    <input type="text" class="form-control" placeholder="example@email.com">
                                </div>
                            </div>
                            <!--column-6-->
                        </div>
                        <!--form-group-row-->
                        <div class="form-group row mb-2">
                            <div class="col-sm-12">
                                <div class="input-group ">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-primary"><i class="far fa-file-alt"></i></span>
                                    </div>
                                    <input type="email" class="form-control"
                                        value="Action Required: Connect Your Social Media">
                                </div>
                            </div>
                            <!--column-12-->

                        </div>
                        <!--form-group-row-->
                        <div class="form-group">
                            <textarea id="compose-textarea" class="form-control" style="height: 300px">

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
</div>
<!-- /.modal -->

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
        $('#compose-textarea-1').summernote()
  $(document).mouseup(function (e) {
      var dropdown = $(".dropdown");
      if (!dropdown.is(e.target) && dropdown.has(e.target).length === 0) {
          $('.dropdown-content').removeClass('show');
      }
  });
  $('#compose-textarea-2').summernote()
  $(document).mouseup(function (e) {
      var dropdown = $(".dropdown");
      if (!dropdown.is(e.target) && dropdown.has(e.target).length === 0) {
          $('.dropdown-content').removeClass('show');
      }
  });
  $('#compose-textarea-3').summernote()
  $(document).mouseup(function (e) {
      var dropdown = $(".dropdown");
      if (!dropdown.is(e.target) && dropdown.has(e.target).length === 0) {
          $('.dropdown-content').removeClass('show');
      }
  });
  $('#compose-textarea-4').summernote()
  $(document).mouseup(function (e) {
      var dropdown = $(".dropdown");
      if (!dropdown.is(e.target) && dropdown.has(e.target).length === 0) {
          $('.dropdown-content').removeClass('show');
      }
  });
  $('#compose-textarea-5').summernote()
  $(document).mouseup(function (e) {
      var dropdown = $(".dropdown");
      if (!dropdown.is(e.target) && dropdown.has(e.target).length === 0) {
          $('.dropdown-content').removeClass('show');
      }
  });
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
    $(document).ready(function () {
    var ex_body;
    ex_body = '<div class="form-group row mb-3">'+
                '<label for="phone" '+
                    'class="col-sm-3 col-form-label text-info"><i '+
                    'class="fas fa-arrow-right"> </i> Your Great Experience</label> '+
                '<div class="col-sm-9"> '+
                    '<div class="input-group"> '+
                        '<textarea type="text" name="exp_descp" rows="4"'+
                            'placeholder="Write Your Great Experience Ex: The last time I came in, you cleaned my teeth and the assistant gave me a 5 Star experience..." class="form-control"></textarea>'+
                    '</div>'+
                '</div>'+
            '</div>';
            $('.experience_cat').empty();         
            $('.experience_cat').append(ex_body);   
            var cont = '<p class="text-sm m-0">[POC First Name],</p><p class="text-sm m-0">I’m a [Customer Type] of yours and I wanted to email you because I had a really great experience with your company.</p><p class="text-sm m-0"><strong>[Your Great Experience]</strong></p><p class="text-sm m-0">I’m also a Social Media Analyst and wanted to return the favor and do something special for you and your business.</p><p class="text-sm m-0">I had my team do some research on your social media and this is what they found:</p><p class="text-sm m-0"><strong>[Profile Stats]</strong></p><p class="text-sm m-0">With just a few tweeks, I think you have a big opportunity to start using your social media to get more [Buyer Type]s</p><p class="text-sm m-0">Here’s an easy way you can do that.</p><p class="text-sm m-0">I would like to create 30 days of social media content for you to help your business to be more effective with your social media.</p><p class="text-sm m-0">There’s no catch. I will underwrite all the costs for the social media content package creation. We have a BETA program to help local businesses in the [City] area and I’ve got 1 spot that"s open and I want to give that spot to you to help.</p><p class="text-sm m-0">Before I can approve the costs, I just have a few more questions from my team.</p><p class="text-sm m-0">Reply back to let me know if you"re interested.</p><p class="text-sm m-0">You can use the 30-day engaging content to help your business convert more customers or use it for Facebook, Social Media, SEO or anything you want. The content is 100% yours to have.</p><p class="text-sm m-0">Again, just email me back either way and let me know if you’re interested.</p><p class="text-sm m-0">Sincerely,</p><p class="text-sm m-0">[Agency Signature]</p><p class="text-sm m-0">P.S. From time to time we have social media content spots open up where the content creation costs are already underwritten, so as part of a “BETA” program, we give these spots to [Business Type]s that we feel have excellent products and services. So let me know if you’re interested ASAP.</p>';
           $('textarea[name="email1content"]').html(cont);      
           $('input[name="email1subject"]').val("My Experience As Your [Buyer Type]");            
           $('textarea[name="email1content"]').siblings('.note-editor').find('.note-editable').append(cont);      
              
            var cont = '<p class="text-sm m-0">[POC First Name],</p><p class="text-sm m-0">I’m sorry I wasn’t able to get a hold of you yesterday.</p><p class="text-sm m-0">I hope you don’t mind a few questions.</p><p class="text-sm m-0">I did a search for [Company Name] online and this is what I found:</p><p class="text-sm m-0">[Profile Stats]</p><p class="text-sm m-0">As I mentioned yesterday, I have a few social media content creation spots available where all the costs are underwritten to create a 30 day engaging content for your social media.</p><p class="text-sm m-0">Before you think it’s “Too Good To Be True.” Let me explain “Why?”</p><p class="text-sm m-0">From time to time we have spots that open up to produce engaging content for local businesses. So we fill that time by giving the content away to a few small select businesses (We call it a Beta Program) and we cover all the costs.</p><p class="text-sm m-0">Email me back and I can send you an example.</p><p class="text-sm m-0">Your Invite To Our Beta Program Will Give You:</p><ol><li>30-day engaging social media content for your business pages online</li><li>Primetime Graphics</li><li>Professional Writers</li><li>Posted Directly On Your Social Media</li></ol><p class="text-sm m-0">Again there’s is no cost to you to take part in this BETA program as I just want your feedback as to how engaging social media posts work helping you generate leads and sales for your business.</p><p class="text-sm m-0">2 of the 5 available spots in [City] have been taken already and I expect the rest to be filled by tonight.</p><p class="text-sm m-0">Reply Back “YES” if you are interested and I’ll send you a 30 day social media content for free!</p><p class="text-sm m-0">We all know how powerful social media networks are and why big companies develop an extensive social media content strategy. It builds engagement and brand awareness.</p><p class="text-sm m-0">Now you can have your own professional social writers team to create the social media content for your business pages!</p><p class="text-sm m-0">Here are some of your competitors who also received this email.</p><p class="text-sm m-0">(List of Competitors)</p><p class="text-sm m-0">If you want to take 1 of the remaining 3 spots and have the edge over your competitors, reply “YES” to this email or call [Agency Phone].</p><p class="text-sm m-0">To your success,</p><p class="text-sm m-0"> <strong>[Agency Signature]</strong></p><p class="text-sm m-0">P.S. My goal of the 30 day social media content to help you engage and get more customers. It"s pretty likely, when we add engaging content to the social media you will get a lot of exposure online through the likes and shares on the social media.</p><p class="text-sm m-0">We"ve even had several beta testers experience a great response and new customers after seeing these features. Let me know.</p>';
           $('textarea[name="email2content"]').html(cont);      
           $('input[name="email2subject"]').val("Do you engage with your visitors online?");      
           $('textarea[name="email2content"]').siblings('.note-editor').find('.note-editable').append(cont); 
 
            var cont = '<p class="text-sm m-0">I just want to let you know only 2 spots are left in my BETA Program to receive a 30-day engaging content for your social media, at no charge.</p><p class="text-sm m-0">I’m reaching out to you to see if you would like to take one of the remaining 2 spots, because after researching your website [Company Website], I think you are a perfect fit for the program and would really benefit from the results.</p><p class="text-sm m-0">The reason you were chosen for this 30 day content supply for your social media at no cost is:</p><p class="text-sm m-0">[Profile Stats]</p><p class="text-sm m-0">So having an engaging posts on your social media pages can really help getting more customers.</p><p class="text-sm m-0">Again the content creation costs are completely underwritten by my company, so there is no expense to you for creating the social media content, I just want your feedback on how the engaging social media posts work for your business and what kind of increase in leads and engagement it generates.</p><p class="text-sm m-0">Your Invite To Our Beta Program Will Give You:</p><ol><li>30-day engaging social media content for your business pages online</li><li>Primetime Graphics</li><li>Professional Writers</li><li>Posted Directly On Your Social Media</li></ol><p class="text-sm m-0">If you would like to see a the content we created, reply back and I’ll send you the details.</p><p class="text-sm m-0"> <strong>NEW SOCIAL MEDIA STATS:</strong></p><p class="text-sm m-0"><strong>71% of consumers who have had a good social media experience with a brand are likely to recommend it to others.</strong></p><p class="text-sm m-0">That’s why the goal of our BETA program is to create the engaging social media content that would get likes and shares and can help you get more customers.</p><p class="text-sm m-0">After emailing a few other [1st Category]s in [City] like yourself, 3 spots have been taken.</p><p class="text-sm m-0">Reply back “Interested” to this email or call [Agency Phone] if you have any interest in reserving 1 of the 2 last remaining spots.</p><p class="text-sm m-0">To your success,</p><p class="text-sm m-0"> <strong>Agency Signature]</strong></p>';
           $('textarea[name="email3content"]').html(cont);      
           $('input[name="email3subject"]').val("I only have 2 spots left.");            
           $('textarea[name="email3content"]').siblings('.note-editor').find('.note-editable').append(cont);      
 
            var cont = '<p class="text-sm m-0">[POC First Name],</p><p class="text-sm m-0">I"ve tried for the last 4 days to get hold of you, and unfortunately 5 PM today is my deadline, and then I a have to close our schedule.</p><p class="text-sm m-0">We were excited about working with you, but if I can"t get a hold of you today then I"ll have to go with a potential competitor in the [POC City] area.</p><p class="text-sm m-0">Our team thought [POC Company Name] would be a good fit since all the content creation costs are already covered.</p><p class="text-sm m-0">So please reply back and let me know if your interested or call me at [Agency Phone].</p><p class="text-sm m-0">Just to recap, here are a few notes on the free offer:</p><ol><li>100% of all the content creation costs have been underwritten</li><li>30 days worth of engaging content that can be used on your Facebook Business page, LinkedIn, Twitter, Instagram</li><li>Written by professional copywriters</li><li>Primetime graphics and media</li><li>Again we only have 1 spot available for this feature and we have a few deadlines we have to meet so please reply back.</li></ol><p class="text-sm m-0">I look forward to speaking with you. Again my number is [Agency Phone].</p><p class="text-sm m-0">Sincerely,</p><p class="text-sm m-0">Agency Signature]</p><p class="text-sm m-0">P.S. My deadline is at 5 pm today. I look forward to speaking with you.</p>';
           $('textarea[name="email4content"]').html(cont);      
           $('input[name="email4subject"]').val("Deadline Today: 5 PM Your Free Social Media Content");           
           $('textarea[name="email4content"]').siblings('.note-editor').find('.note-editable').append(cont);      
    
            var cont = '<p class="text-sm m-0">[POC First Name],</p><p class="text-sm m-0">I just thought I"d send you an email letting you know we decided to go with someone else.</p><p class="text-sm m-0">They might be a competitor of yours, but you were one of our top choices.I spent a week trying to get a hold of you and I"m sorry we weren"t able to touch base and get you scheduled.</p><p class="text-sm m-0">Here"s a Link To A Case Study similar to your business [Case Study]</p><p class="text-sm m-0">Again, I"m sorry we weren"t able to connect and we"ve closed the opportunity.</p><p class="text-sm m-0">Sincerely,</p><p class="text-sm m-0">[Agency Signature]</p><p class="text-sm m-0">P.S. Moving forward, because my experience with your company, please just let me know if you"d be open to any beta spots that might open up 3-6 months from now.</p>';
           $('textarea[name="email5content"]').html(cont);      
           $('input[name="email5subject"]').val("Sorry, We Went With Someone Else");           
           $('textarea[name="email5content"]').siblings('.note-editor').find('.note-editable').append(cont);   


    $('select[name="experience_type"]').change(function () {
        if($(this).val() == 1){
            ex_body = '';
            ex_body = '<div class="form-group row mb-3">'+
                '<label for="phone" '+
                    'class="col-sm-3 col-form-label text-info"><i '+
                    'class="fas fa-arrow-right"> </i> Your Great Experience</label> '+
                '<div class="col-sm-9"> '+
                    '<div class="input-group"> '+
                        '<textarea type="text" name="exp_descp" rows="4"'+
                            'placeholder="Write Your Great Experience Ex: The last time I came in, you cleaned my teeth and the assistant gave me a 5 Star experience..." class="form-control"></textarea>'+
                    '</div>'+
                '</div>'+
            '</div>';
            $('.experience_cat').empty();         
            $('.experience_cat').append(ex_body);  
            $('textarea[name="email1content"]').empty();    
            var cont = '<p class="text-sm m-0">[POC First Name],</p><p class="text-sm m-0">I’m a [Customer Type] of yours and I wanted to email you because I had a really great experience with your company.</p><p class="text-sm m-0"><strong>[Your Great Experience]</strong></p><p class="text-sm m-0">I’m also a Social Media Analyst and wanted to return the favor and do something special for you and your business.</p><p class="text-sm m-0">I had my team do some research on your social media and this is what they found:</p><p class="text-sm m-0"><strong>[Profile Stats]</strong></p><p class="text-sm m-0">With just a few tweeks, I think you have a big opportunity to start using your social media to get more [Buyer Type]s</p><p class="text-sm m-0">Here’s an easy way you can do that.</p><p class="text-sm m-0">I would like to create 30 days of social media content for you to help your business to be more effective with your social media.</p><p class="text-sm m-0">There’s no catch. I will underwrite all the costs for the social media content package creation. We have a BETA program to help local businesses in the [City] area and I’ve got 1 spot that"s open and I want to give that spot to you to help.</p><p class="text-sm m-0">Before I can approve the costs, I just have a few more questions from my team.</p><p class="text-sm m-0">Reply back to let me know if you"re interested.</p><p class="text-sm m-0">You can use the 30-day engaging content to help your business convert more customers or use it for Facebook, Social Media, SEO or anything you want. The content is 100% yours to have.</p><p class="text-sm m-0">Again, just email me back either way and let me know if you’re interested.</p><p class="text-sm m-0">Sincerely,</p><p class="text-sm m-0">[Agency Signature]</p><p class="text-sm m-0">P.S. From time to time we have social media content spots open up where the content creation costs are already underwritten, so as part of a “BETA” program, we give these spots to [Business Type]s that we feel have excellent products and services. So let me know if you’re interested ASAP.</p>';
           $('textarea[name="email1content"]').html(cont);      
           $('input[name="email1subject"]').val("My Experience As Your [Buyer Type]");      
           $('textarea[name="email1content"]').siblings('.note-editor').find('.note-editable').empty();      
           $('textarea[name="email1content"]').siblings('.note-editor').find('.note-editable').append(cont);      
           
            $('textarea[name="email2content"]').empty();    
            var cont = '<p class="text-sm m-0">[POC First Name],</p><p class="text-sm m-0">I’m sorry I wasn’t able to get a hold of you yesterday.</p><p class="text-sm m-0">I hope you don’t mind a few questions.</p><p class="text-sm m-0">I did a search for [Company Name] online and this is what I found:</p><p class="text-sm m-0">[Profile Stats]</p><p class="text-sm m-0">As I mentioned yesterday, I have a few social media content creation spots available where all the costs are underwritten to create a 30 day engaging content for your social media.</p><p class="text-sm m-0">Before you think it’s “Too Good To Be True.” Let me explain “Why?”</p><p class="text-sm m-0">From time to time we have spots that open up to produce engaging content for local businesses. So we fill that time by giving the content away to a few small select businesses (We call it a Beta Program) and we cover all the costs.</p><p class="text-sm m-0">Email me back and I can send you an example.</p><p class="text-sm m-0">Your Invite To Our Beta Program Will Give You:</p><ol><li>30-day engaging social media content for your business pages online</li><li>Primetime Graphics</li><li>Professional Writers</li><li>Posted Directly On Your Social Media</li></ol><p class="text-sm m-0">Again there’s is no cost to you to take part in this BETA program as I just want your feedback as to how engaging social media posts work helping you generate leads and sales for your business.</p><p class="text-sm m-0">2 of the 5 available spots in [City] have been taken already and I expect the rest to be filled by tonight.</p><p class="text-sm m-0">Reply Back “YES” if you are interested and I’ll send you a 30 day social media content for free!</p><p class="text-sm m-0">We all know how powerful social media networks are and why big companies develop an extensive social media content strategy. It builds engagement and brand awareness.</p><p class="text-sm m-0">Now you can have your own professional social writers team to create the social media content for your business pages!</p><p class="text-sm m-0">Here are some of your competitors who also received this email.</p><p class="text-sm m-0">(List of Competitors)</p><p class="text-sm m-0">If you want to take 1 of the remaining 3 spots and have the edge over your competitors, reply “YES” to this email or call [Agency Phone].</p><p class="text-sm m-0">To your success,</p><p class="text-sm m-0"> <strong>[Agency Signature]</strong></p><p class="text-sm m-0">P.S. My goal of the 30 day social media content to help you engage and get more customers. It"s pretty likely, when we add engaging content to the social media you will get a lot of exposure online through the likes and shares on the social media.</p><p class="text-sm m-0">We"ve even had several beta testers experience a great response and new customers after seeing these features. Let me know.</p>';
           $('textarea[name="email2content"]').html(cont);      
           $('input[name="email2subject"]').val("Do you engage with your visitors online?");      
           $('textarea[name="email2content"]').siblings('.note-editor').find('.note-editable').empty(); 
           $('textarea[name="email2content"]').siblings('.note-editor').find('.note-editable').append(cont); 

            $('textarea[name="email3content"]').empty();    
            var cont = '<p class="text-sm m-0">I just want to let you know only 2 spots are left in my BETA Program to receive a 30-day engaging content for your social media, at no charge.</p><p class="text-sm m-0">I’m reaching out to you to see if you would like to take one of the remaining 2 spots, because after researching your website [Company Website], I think you are a perfect fit for the program and would really benefit from the results.</p><p class="text-sm m-0">The reason you were chosen for this 30 day content supply for your social media at no cost is:</p><p class="text-sm m-0">[Profile Stats]</p><p class="text-sm m-0">So having an engaging posts on your social media pages can really help getting more customers.</p><p class="text-sm m-0">Again the content creation costs are completely underwritten by my company, so there is no expense to you for creating the social media content, I just want your feedback on how the engaging social media posts work for your business and what kind of increase in leads and engagement it generates.</p><p class="text-sm m-0">Your Invite To Our Beta Program Will Give You:</p><ol><li>30-day engaging social media content for your business pages online</li><li>Primetime Graphics</li><li>Professional Writers</li><li>Posted Directly On Your Social Media</li></ol><p class="text-sm m-0">If you would like to see a the content we created, reply back and I’ll send you the details.</p><p class="text-sm m-0"> <strong>NEW SOCIAL MEDIA STATS:</strong></p><p class="text-sm m-0"><strong>71% of consumers who have had a good social media experience with a brand are likely to recommend it to others.</strong></p><p class="text-sm m-0">That’s why the goal of our BETA program is to create the engaging social media content that would get likes and shares and can help you get more customers.</p><p class="text-sm m-0">After emailing a few other [1st Category]s in [City] like yourself, 3 spots have been taken.</p><p class="text-sm m-0">Reply back “Interested” to this email or call [Agency Phone] if you have any interest in reserving 1 of the 2 last remaining spots.</p><p class="text-sm m-0">To your success,</p><p class="text-sm m-0"> <strong>Agency Signature]</strong></p>';
           $('textarea[name="email3content"]').html(cont);      
           $('input[name="email3subject"]').val("I only have 2 spots left.");      
           $('textarea[name="email3content"]').siblings('.note-editor').find('.note-editable').empty();      
           $('textarea[name="email3content"]').siblings('.note-editor').find('.note-editable').append(cont);      

            $('textarea[name="email4content"]').empty();    
            var cont = '<p class="text-sm m-0">[POC First Name],</p><p class="text-sm m-0">I"ve tried for the last 4 days to get hold of you, and unfortunately 5 PM today is my deadline, and then I a have to close our schedule.</p><p class="text-sm m-0">We were excited about working with you, but if I can"t get a hold of you today then I"ll have to go with a potential competitor in the [POC City] area.</p><p class="text-sm m-0">Our team thought [POC Company Name] would be a good fit since all the content creation costs are already covered.</p><p class="text-sm m-0">So please reply back and let me know if your interested or call me at [Agency Phone].</p><p class="text-sm m-0">Just to recap, here are a few notes on the free offer:</p><ol><li>100% of all the content creation costs have been underwritten</li><li>30 days worth of engaging content that can be used on your Facebook Business page, LinkedIn, Twitter, Instagram</li><li>Written by professional copywriters</li><li>Primetime graphics and media</li><li>Again we only have 1 spot available for this feature and we have a few deadlines we have to meet so please reply back.</li></ol><p class="text-sm m-0">I look forward to speaking with you. Again my number is [Agency Phone].</p><p class="text-sm m-0">Sincerely,</p><p class="text-sm m-0">Agency Signature]</p><p class="text-sm m-0">P.S. My deadline is at 5 pm today. I look forward to speaking with you.</p>';
           $('textarea[name="email4content"]').html(cont);      
           $('input[name="email4subject"]').val("Deadline Today: 5 PM Your Free Social Media Content");      
           $('textarea[name="email4content"]').siblings('.note-editor').find('.note-editable').empty();      
           $('textarea[name="email4content"]').siblings('.note-editor').find('.note-editable').append(cont);      

            $('textarea[name="email5content"]').empty();    
            var cont = '<p class="text-sm m-0">[POC First Name],</p><p class="text-sm m-0">I just thought I"d send you an email letting you know we decided to go with someone else.</p><p class="text-sm m-0">They might be a competitor of yours, but you were one of our top choices.I spent a week trying to get a hold of you and I"m sorry we weren"t able to touch base and get you scheduled.</p><p class="text-sm m-0">Here"s a Link To A Case Study similar to your business [Case Study]</p><p class="text-sm m-0">Again, I"m sorry we weren"t able to connect and we"ve closed the opportunity.</p><p class="text-sm m-0">Sincerely,</p><p class="text-sm m-0">[Agency Signature]</p><p class="text-sm m-0">P.S. Moving forward, because my experience with your company, please just let me know if you"d be open to any beta spots that might open up 3-6 months from now.</p>';
           $('textarea[name="email5content"]').html(cont);      
           $('input[name="email5subject"]').val("Sorry, We Went With Someone Else");      
           $('textarea[name="email5content"]').siblings('.note-editor').find('.note-editable').empty();      
           $('textarea[name="email5content"]').siblings('.note-editor').find('.note-editable').append(cont);      

        }
        if($(this).val() == 2){
            ex_body = '';
            ex_body = '<div class="form-group row mb-3">'+
                '<label for="phone" '+
                    'class="col-sm-3 col-form-label text-info"><i '+
                    'class="fas fa-arrow-right"> </i> Your Relationship With The Customer?</label> '+
                '<div class="col-sm-9"> '+
                    '<div class="input-group"> '+
                        '<select name="relation_with_customer" '+
                            'class="form-control select2bs4" '+
                            'style="width: 100%;"> '+
                            '<option>Friend </option> '+
                            '<option>Family Member </option> '+
                            '<option>Neighbour </option> '+
                            '<option>Colleague </option> '+
                            '<option>Patient </option> '+
                        '</select>'+
                    '</div>'+
                '</div>'+
                '</div>'+
                '<div class="form-group row mb-3">'+
                '<label for="phone" '+
                    'class="col-sm-3 col-form-label text-info"><i '+
                    'class="fas fa-arrow-right"> </i> Person’s First Name</label> '+
                '<div class="col-sm-9"> '+
                    '<div class="input-group"> '+
                        '<input type="text" name="person_name" '+
                            'placeholder="Type In Person"s First Name" class="form-control">'+
                    '</div>'+
                '</div>'+
                '</div>'+
                '<div class="form-group row mb-3">'+
                '<label for="phone" '+
                    'class="col-sm-3 col-form-label text-info"><i '+
                    'class="fas fa-arrow-right"> </i> Person’s Endorsement</label> '+
                '<div class="col-sm-9"> '+
                    '<div class="input-group"> '+
                        '<textarea type="text" name="person_endorsement" rows="3"'+
                            'placeholder="Type In Person"s Endorsement, Up to 3 lines." class="form-control"></textarea>'+
                    '</div>'+
                '</div>'+
            '</div>';
            $('.experience_cat').empty();         
            $('.experience_cat').append(ex_body); 

            $('textarea[name="email1content"]').empty();    
            var cont = '<p class="text-sm m-0">[POC First Name],</p><p class="text-sm m-0">My [Relationship], [Relationship Name] is a [Buyer Type] of yours and I wanted to email you because they were telling me about the 5 star experience they had with your company.</p><p class="text-sm m-0">Out of the 17 business we looked into, yours came to the top of the list. My [Relationship], [Relationship Name], has been a [Customer Type] of yours and let me know that he had a great experience with your company.</p><p class="text-sm m-0"> <strong> “[Endorsement]”</strong></p><p class="text-sm m-0">I’m a Social Media Analyst and since [Relationship Name] had such a great experience wanted to return the favor and do something special for you.</p><p class="text-sm m-0">I had my team do some research on your social media and it looks like you could reach a lot more customers with your business if you tweaked a few things.</p><p class="text-sm m-0">Here’s what my team found about [Company Name]:</p><p class="text-sm m-0"><strong>[Profile Stats]</strong></p><p class="text-sm m-0">With just a few tweeks, I think you have a big opportunity to start using your social media to get more [Buyer Type]s</p><p class="text-sm m-0">Here’s an easy way you can do that.</p><p class="text-sm m-0">I would like to create 30 days of social media content for you to help your business to be more effective with your social media.</p><p class="text-sm m-0">There’s no catch. I will underwrite all the costs for the social media content package creation. We have a BETA program to help local businesses in the [City] area and I’ve got 1 spot that"s open and I want to give that spot to you to help.</p><p class="text-sm m-0">Before I can approve the costs, I just have a few more questions from my team.</p><p class="text-sm m-0">Reply back to let me know if you"re interested.</p><p class="text-sm m-0">You can use the 30-day engaging content to help your business convert more customers or use it for Facebook, Social Media, SEO or anything you want. The content is 100% yours to have.</p><p class="text-sm m-0">Again, just email me back either way and let me know if you’re interested.</p><p class="text-sm m-0">Sincerely,</p><p class="text-sm m-0">[Agency Signature]</p><p class="text-sm m-0">P.S. From time to time we have social media content spots open up where the content creation costs are already underwritten, so as part of a “BETA” program, we give these spots to [Business Type]s that we feel have excellent products and services. So let me know if you’re interested ASAP.</p>';
           $('textarea[name="email1content"]').html(cont);      
           $('input[name="email1subject"]').val("My [Relationship] Had A Great Experience With You");      
           $('textarea[name="email1content"]').siblings('.note-editor').find('.note-editable').empty();      
           $('textarea[name="email1content"]').siblings('.note-editor').find('.note-editable').append(cont);      
           
            $('textarea[name="email2content"]').empty();    
            var cont = '<p class="text-sm m-0">[POC First Name],</p><p class="text-sm m-0">I’m sorry I wasn’t able to get a hold of you yesterday.</p><p class="text-sm m-0">I hope you don’t mind a few questions.</p><p class="text-sm m-0">I did a search for [Company Name] online and this is what I found:</p><p class="text-sm m-0"><strong>[Profile Stats]</strong></p><p class="text-sm m-0">As I mentioned yesterday, I have a few social media content creation spots available where all the costs are underwritten to create a 30 day engaging content for your social media.</p><p class="text-sm m-0">Before you think it’s “Too Good To Be True.” Let me explain “Why?”</p><p class="text-sm m-0">From time to time we have spots that open up to produce engaging content for local businesses. So we fill that time by giving the content away to a few small select businesses (We call it a Beta Program) and we cover all the costs.</p><p class="text-sm m-0">Email me back and I can send you an example.</p><p class="text-sm m-0">Your Invite To Our Beta Program Will Give You:</p><ol><li>30-day engaging social media content for your business pages online</li><li>Primetime Graphics</li><li>Professional Writers</li><li>Posted Directly On Your Social Media</li></ol><p class="text-sm m-0">Again there’s is no cost to you to take part in this BETA program as I just want your feedback as to how engaging social media posts work helping you generate leads and sales for your business.</p><p class="text-sm m-0">2 of the 5 available spots in [City] have been taken already and I expect the rest to be filled by tonight.</p><p class="text-sm m-0">Reply Back “YES” if you are interested and I’ll send you a 30 day social media content for free!</p><p class="text-sm m-0">We all know how powerful social media networks are and why big companies develop an extensive social media content strategy. It builds engagement and brand awareness.</p><p class="text-sm m-0">Now you can have your own professional social writers team to create the social media content for your business pages!</p><p class="text-sm m-0">Here are some of your competitors who also received this email.</p><p class="text-sm m-0">(List of Competitors)</p><p class="text-sm m-0">If you want to take 1 of the remaining 3 spots and have the edge over your competitors, reply “YES” to this email or call [Agency Phone].</p><p class="text-sm m-0">To your success,</p><p class="text-sm m-0">[Agency Signature]</p><p class="text-sm m-0">P.S. My goal of the 30 day social media content to help you engage and get more customers. It"s pretty likely, when we add engaging content to the social media you will get a lot of exposure online through the likes and shares on the social media.</p><p class="text-sm m-0">We"ve even had several beta testers experience a great response and new customers after seeing these features. Let me know.</p>';
           $('textarea[name="email2content"]').html(cont);      
           $('input[name="email2subject"]').val("Do you engage with your visitors online?");      
           $('textarea[name="email2content"]').siblings('.note-editor').find('.note-editable').empty(); 
           $('textarea[name="email2content"]').siblings('.note-editor').find('.note-editable').append(cont); 

            $('textarea[name="email3content"]').empty();    
            var cont = '<p class="text-sm m-0">I just want to let you know only 2 spots are left in my BETA Program to receive a 30-day engaging content for your social media, at no charge.</p><p class="text-sm m-0">I’m reaching out to you to see if you would like to take one of the remaining 2 spots, because after researching your website [Company Website], I think you are a perfect fit for the program and would really benefit from the results.</p><p class="text-sm m-0">The reason you were chosen for this 30 day content supply for your social media at no cost is:</p><p class="text-sm m-0">Your Facebook Profile has:</p><p class="text-sm m-0"><strong>[FB Followers] Followers & Last Post Updated [FB Lastpost]</strong></p><p class="text-sm m-0">So having an engaging posts on your social media pages can really help getting more customers.</p><p class="text-sm m-0">Again the content creation costs are completely underwritten by my company, so there is no expense to you for creating the social media content, I just want your feedback on how the engaging social media posts work for your business and what kind of increase in leads and engagement it generates.</p><p class="text-sm m-0">Your Invite To Our Beta Program Will Give You:</p><ol><li>30-day engaging social media content for your business pages online</li><li>Primetime Graphics</li><li>Professional Writers</li><li>Posted Directly On Your Social Media</li></ol><p class="text-sm m-0">If you would like to see a the content we created, reply back and I’ll send you the details.</p><p class="text-sm m-0"> <strong> NEW SOCIAL MEDIA STATS:</strong></p><p class="text-sm m-0"> <strong> 71% of consumers who have had a good social media experience with a brand are likely to recommend it to others.</strong></p><p class="text-sm m-0">That’s why the goal of our BETA program is to create the engaging social media content that would get likes and shares and can help you get more customers.</p><p class="text-sm m-0">After emailing a few other [1st Category]s in [City] like yourself, 3 spots have been taken.</p><p class="text-sm m-0">Reply back “Interested” to this email or call [Agency Phone] if you have any interest in reserving 1 of the 2 last remaining spots.</p><p class="text-sm m-0">To your success,</p><p class="text-sm m-0">[Agency Signature]</p>';
           $('textarea[name="email3content"]').html(cont);      
           $('input[name="email3subject"]').val("Do you want the last spot?");      
           $('textarea[name="email3content"]').siblings('.note-editor').find('.note-editable').empty();      
           $('textarea[name="email3content"]').siblings('.note-editor').find('.note-editable').append(cont);      

            $('textarea[name="email4content"]').empty();    
            var cont = '<p class="text-sm m-0">[POC First Name],</p><p class="text-sm m-0">I"ve tried for the last 4 days to get hold of you, and unfortunately 5 PM today is my deadline, and then I a have to close our schedule.</p><p class="text-sm m-0">We were excited about working with you, but if I can"t get a hold of you today then I"ll have to go with a potential competitor in the [POC City] area.</p><p class="text-sm m-0">Our team thought [POC Company Name] would be a good fit since all the content creation costs are already covered.</p><p class="text-sm m-0">So please reply back and let me know if your interested or call me at [Agency Phone].</p><p class="text-sm m-0">Just to recap, here are a few notes on the free offer:</p><ol><li>100% of all the content creation costs have been underwritten</li><li>30 days worth of engaging content that can be used on your Facebook Business page, LinkedIn, Twitter, Instagram</li><li>Written by professional copywriters</li><li>Primetime graphics and media</li><li>Here"s A Link To See a Case study on Engagement and Increase of Social Follower’s Base for a similar business [Case Study]</li></ol><p class="text-sm m-0">Again we only have 1 spot available for this feature and we have a few deadlines we have to meet so please reply back.</p><p class="text-sm m-0">I look forward to speaking with you. Again my number is [Agency Phone].</p><p class="text-sm m-0">Sincerely,</p><p class="text-sm m-0">[Agency Signature]</p><p class="text-sm m-0">P.S. My deadline is at 5 pm today. I look forward to speaking with you.';
           $('textarea[name="email4content"]').html(cont);      
           $('input[name="email4subject"]').val("Deadline Today: 5 PM Your Free Social Media Content");      
           $('textarea[name="email4content"]').siblings('.note-editor').find('.note-editable').empty();      
           $('textarea[name="email4content"]').siblings('.note-editor').find('.note-editable').append(cont);      

            $('textarea[name="email5content"]').empty();    
            var cont = '<p class="text-sm m-0">[POC First Name],</p><p class="text-sm m-0">I just thought I"d send you an email letting you know we decided to go with someone else.</p><p class="text-sm m-0">They might be a competitor of yours, but you were one of our top choices.I spent a week trying to get a hold of you and I"m sorry we weren"t able to touch base and get you scheduled.</p><p class="text-sm m-0">Here"s a Link To A Case Study similar to your business [Case Study]</p><p class="text-sm m-0">Again, I"m sorry we weren"t able to connect and we"ve closed the opportunity.</p><p class="text-sm m-0">Sincerely,</p><p class="text-sm m-0">[Agency Signature]</p><p class="text-sm m-0">P.S. Moving forward, because my experience with your company, please just let me know if you"d be open to any beta spots that might open up 3-6 months from now.</p>';
           $('textarea[name="email5content"]').html(cont);      
           $('input[name="email5subject"]').val("Sorry, We Went With Someone Else");      
           $('textarea[name="email5content"]').siblings('.note-editor').find('.note-editable').empty();      
           $('textarea[name="email5content"]').siblings('.note-editor').find('.note-editable').append(cont); 


        }
        if($(this).val() == 3){
            $('.experience_cat').empty(); 
            
            $('textarea[name="email1content"]').empty();    
            var cont = '<p class="text-sm m-0">[POC First Name],</p><p class="text-sm m-0">We were looking for a [1st Category] in [City] and we narrowed it down to you and a few other companies.</p><p class="text-sm m-0">I’m “Social Media Analyst” , so I did a little more research and found you had some good reviews, but when I reviewed your social media profiles to learn more about you, this is what I found:</p><p class="text-sm m-0"><strong>[Profile Stats]</strong></p><p class="text-sm m-0">With just a few tweeks, I think you have a big opportunity to start using your social media to get more [Buyer Type]s</p><p class="text-sm m-0">Here’s an easy way you can do that.</p><p class="text-sm m-0">I would like to create 30 days of social media content for you to help your business to be more effective with your social media.</p><p class="text-sm m-0">There’s no catch. I will underwrite all the costs for the social media content package creation. We have a BETA program to help local businesses in the [City] area and I’ve got 1 spot that"s open and I want to give that spot to you to help.</p><p class="text-sm m-0">Before I can approve the costs, I just have a few more questions from my team.</p><p class="text-sm m-0">Reply back to let me know if you"re interested.</p><p class="text-sm m-0">You can use the 30-day engaging content to help your business convert more customers or use it for Facebook, Social Media, SEO or anything you want. The content is 100% yours to have.</p><p class="text-sm m-0">Again, just email me back either way and let me know if you’re interested.</p><p class="text-sm m-0">Sincerely,</p><p class="text-sm m-0">[Agency Signature]</p><p class="text-sm m-0">P.S. From time to time we have social media content spots open up where the content creation costs are already underwritten, so as part of a “BETA” program, we give these spots to [Business Type]s that we feel have excellent products and services. So let me know if you’re interested ASAP.</p>';
           $('textarea[name="email1content"]').html(cont);      
           $('input[name="email1subject"]').val("I’m looking for a [1st Category]");      
           $('textarea[name="email1content"]').siblings('.note-editor').find('.note-editable').empty();      
           $('textarea[name="email1content"]').siblings('.note-editor').find('.note-editable').append(cont);      
           
            $('textarea[name="email2content"]').empty();    
            var cont = '<p class="text-sm m-0">[POC First Name],</p><p class="text-sm m-0">I’m sorry I wasn’t able to get a hold of you yesterday.</p><p class="text-sm m-0">I hope you don’t mind a few questions.</p><p class="text-sm m-0">I did a search for [Company Name] online and this is what I found:</p><p class="text-sm m-0"><strong>[Profile Stats]</strong></p><p class="text-sm m-0">As I mentioned yesterday, I have a few social media content creation spots available where all the costs are underwritten to create a 30 day engaging content for your social media.</p><p class="text-sm m-0">Before you think it’s “Too Good To Be True.” Let me explain “Why?”</p><p class="text-sm m-0">From time to time we have spots that open up to produce engaging content for local businesses. So we fill that time by giving the content away to a few small select businesses (We call it a Beta Program) and we cover all the costs.</p><p class="text-sm m-0">Email me back and I can send you an example.</p><p class="text-sm m-0">Your Invite To Our Beta Program Will Give You:</p><ol><li>30-day engaging social media content for your business pages online</li><li>Primetime Graphics</li><li>Professional Writers</li><li>Posted Directly On Your Social Media</li></ol><p class="text-sm m-0">Again there’s is no cost to you to take part in this BETA program as I just want your feedback as to how engaging social media posts work helping you generate leads and sales for your business.</p><p class="text-sm m-0">2 of the 5 available spots in [City] have been taken already and I expect the rest to be filled by tonight.</p><p class="text-sm m-0">Reply Back “YES” if you are interested and I’ll send you a 30 day social media content for free!</p><p class="text-sm m-0">We all know how powerful social media networks are and why big companies develop an extensive social media content strategy. It builds engagement and brand awareness.</p><p class="text-sm m-0">Now you can have your own professional social writers team to create the social media content for your business pages!</p><p class="text-sm m-0">Here are some of your competitors who also received this email.</p><p class="text-sm m-0">(List of Competitors)</p><p class="text-sm m-0">If you want to take 1 of the remaining 3 spots and have the edge over your competitors, reply “YES” to this email or call [Agency Phone].</p><p class="text-sm m-0">To your success,</p><p class="text-sm m-0">Agency Signature]</p><p class="text-sm m-0">P.S. My goal of the 30 day social media content to help you engage and get more customers. It"s pretty likely, when we add engaging content to the social media you will get a lot of exposure online through the likes and shares on the social media.</p><p class="text-sm m-0">We"ve even had several beta testers experience a great response and new customers after seeing these features. Let me know.</p>';
           $('textarea[name="email2content"]').html(cont);      
           $('input[name="email2subject"]').val("Do you engage with your visitors online?");      
           $('textarea[name="email2content"]').siblings('.note-editor').find('.note-editable').empty(); 
           $('textarea[name="email2content"]').siblings('.note-editor').find('.note-editable').append(cont); 

            $('textarea[name="email3content"]').empty();    
            var cont = '<p class="text-sm m-0">I just want to let you know only 2 spots are left in my BETA Program to receive a 30-day engaging content for your social media, at no charge.</p><p class="text-sm m-0">I’m reaching out to you to see if you would like to take one of the remaining 2 spots, because after researching your website [Company Website], I think you are a perfect fit for the program and would really benefit from the results.</p><p class="text-sm m-0">The reason you were chosen for this 30 day content supply for your social media at no cost is:</p><p class="text-sm m-0"><strong>[Profile Stats]</strong></p><p class="text-sm m-0">So having an engaging posts on your social media pages can really help getting more customers.</p><p class="text-sm m-0">Again the content creation costs are completely underwritten by my company, so there is no expense to you for creating the social media content, I just want your feedback on how the engaging social media posts work for your business and what kind of increase in leads and engagement it generates.</p><p class="text-sm m-0">Your Invite To Our Beta Program Will Give You:</p><ol><li>30-day engaging social media content for your business pages online</li><li>Primetime Graphics</li><li>Professional Writers</li><li>Posted Directly On Your Social Media</li></ol><p class="text-sm m-0">If you would like to see a the content we created, reply back and I’ll send you the details.</p><p class="text-sm m-0"><strong>NEW SOCIAL MEDIA STATS:</strong></p><p class="text-sm m-0"><strong>71% of consumers who have had a good social media experience with a brand are likely to recommend it to others.</strong></p><p class="text-sm m-0">That’s why the goal of our BETA program is to create the engaging social media content that would get likes and shares and can help you get more customers.</p><p class="text-sm m-0">After emailing a few other [1st Category]s in [City] like yourself, 3 spots have been taken.</p><p class="text-sm m-0">Reply back “Interested” to this email or call [Agency Phone] if you have any interest in reserving 1 of the 2 last remaining spots.</p><p class="text-sm m-0">To your success,</p><p class="text-sm m-0">[Agency Signature]</p>';
           $('textarea[name="email3content"]').html(cont);      
           $('input[name="email3subject"]').val("96% of consumers find this helpful");      
           $('textarea[name="email3content"]').siblings('.note-editor').find('.note-editable').empty();      
           $('textarea[name="email3content"]').siblings('.note-editor').find('.note-editable').append(cont);      

            $('textarea[name="email4content"]').empty();    
            var cont = '<p class="text-sm m-0">[POC First Name],</p><p class="text-sm m-0">I"ve tried for the last 4 days to get hold of you, and unfortunately 5 PM today is my deadline, and then I a have to close our schedule.</p><p class="text-sm m-0">We were excited about working with you, but if I can}t get a hold of you today then I"ll have to go with a potential competitor in the [POC City] area.</p><p class="text-sm m-0">Our team thought [POC Company Name] would be a good fit since all the content creation costs are already covered.</p><p class="text-sm m-0">So please reply back and let me know if your interested or call me at [Agency Phone].</p><p class="text-sm m-0">Just to recap, here are a few notes on the free offer:</p><ol><li>100% of all the content creation costs have been underwritten</li><li>30 days worth of engaging content that can be used on your Facebook Business page, LinkedIn, Twitter, Instagram</li><li>Written by professional copywriters</li><li>Primetime graphics and media</li><li>Here"s A Link To See a Case study on Engagement and Increase of Social Follower’s Base for a similar business [Case Study]</li></ol><p class="text-sm m-0">Again we only have 1 spot available for this feature and we have a few deadlines we have to meet so please reply back.</p><p class="text-sm m-0">I look forward to speaking with you. Again my number is [Agency Phone].</p><p class="text-sm m-0">Sincerely,</p><p class="text-sm m-0">[Agency Signature]</p><p class="text-sm m-0">P.S. My deadline is at 5 pm today. I look forward to speaking with you.</p>';
           $('textarea[name="email4content"]').html(cont);      
           $('input[name="email4subject"]').val("Deadline Today: 5 PM Your Free Social Media Content");      
           $('textarea[name="email4content"]').siblings('.note-editor').find('.note-editable').empty();      
           $('textarea[name="email4content"]').siblings('.note-editor').find('.note-editable').append(cont);      

            $('textarea[name="email5content"]').empty();    
            var cont = '<p class="text-sm m-0">[POC First Name],</p><p class="text-sm m-0">I just thought I"d send you an email letting you know we decided to go with someone else.</p><p class="text-sm m-0">They might be a competitor of yours, but you were one of our top choices.I spent a week trying to get a hold of you and I"m sorry we weren"t able to touch base and get you scheduled.</p><p class="text-sm m-0">Here"s a Link To A Case Study similar to your business [Case Study]</p><p class="text-sm m-0">Again, I"m sorry we weren"t able to connect and we"ve closed the opportunity.</p><p class="text-sm m-0">Sincerely,</p><p class="text-sm m-0">[Agency Signature]</p><p class="text-sm m-0">P.S. Moving forward, because my experience with your company, please just let me know if you"d be open to any beta spots that might open up 3-6 months from now.</p>';
           $('textarea[name="email5content"]').html(cont);      
           $('input[name="email5subject"]').val("Sorry, We Went With Someone Else ");      
           $('textarea[name="email5content"]').siblings('.note-editor').find('.note-editable').empty();      
           $('textarea[name="email5content"]').siblings('.note-editor').find('.note-editable').append(cont); 

 
        }
    });
var day = [1, 2, 3, 4, 5, 6, 7, 10, 14, 21];
var hours = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23];
var minutes = [0, 5, 10, 15, 20, 25, 30, 35, 40, 45, 50, 55, 60];
for (let i = 1; i <= 5; i++) {
      var $el = $('select[name="email'+i+'number"]');
      $el.empty(); 
      if(i == 1){
        $.each(minutes, function(key,value) {
            if(value == 5){
              $el.append($("<option selected></option>")
            .attr("value", value).text(value));
            $('select[name="email'+i+'day"]').val('Minutes');
            }
            else{
              $el.append($("<option></option>")
            .attr("value", value).text(value));
            }
        });
      }
      if(i == 2){
        $.each(day, function(key,value) {
            if(value == 1){
              $el.append($("<option selected></option>")
            .attr("value", value).text(value));
            $('select[name="email'+i+'day"]').val('Days');
            }
            else{
              $el.append($("<option></option>")
            .attr("value", value).text(value));
            }
        });
      }
      if(i == 3){
        $.each(day, function(key,value) {
            if(value == 2){
              $el.append($("<option selected></option>")
            .attr("value", value).text(value));
            $('select[name="email'+i+'day"]').val('Days');
            }
            else{
              $el.append($("<option></option>")
            .attr("value", value).text(value));
            }
        });
      }
      if(i == 4){
        $.each(day, function(key,value) {
            if(value == 4){
              $el.append($("<option selected></option>")
            .attr("value", value).text(value));
            $('select[name="email'+i+'day"]').val('Days');
            }
            else{
              $el.append($("<option></option>")
            .attr("value", value).text(value));
            }
        });
      }
      if(i == 5){
        $.each(day, function(key,value) {
            if(value == 5){
              $el.append($("<option selected></option>")
            .attr("value", value).text(value));
            $('select[name="email'+i+'day"]').val('Days');
            }
            else{
              $el.append($("<option></option>")
            .attr("value", value).text(value));
            }
        });
      }
    
}
for (let i = 1; i <= 5; i++) {
  
    $('select[name="email'+i+'day"]').change(function() {
      if($(this).val() == 'Minutes'){
        var $el = $('select[name="email'+i+'number"]');
        $el.empty(); 
        $.each(minutes, function(key,value) {
            
        $el.append($("<option></option>")
            .attr("value", value).text(value));
        });
      }
      if($(this).val() == 'Hours'){
        var $el = $('select[name="email'+i+'number"]');
        $el.empty(); 
        $.each(hours, function(key,value) {
            
        $el.append($("<option></option>")
            .attr("value", value).text(value));
        });
      }
      if($(this).val() == 'Days'){
        var $el = $('select[name="email'+i+'number"]');
        $el.empty(); 
        $.each(day, function(key,value) {
            
        $el.append($("<option></option>")
            .attr("value", value).text(value));
        });
      }
      $('.email'+i).empty();
      $('.email'+i).append($('select[name="email'+i+'number"]').val() +' '+ $('select[name="email'+i+'day"]').val());
      
    });
    $('select[name="email'+i+'number"]').change(function() {
      $('.email'+i).empty();
      $('.email'+i).append($('select[name="email'+i+'number"]').val() +' '+ $('select[name="email'+i+'day"]').val());
    });

    
}
});
        
</script>

@endsection