<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Neovora Social | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
   <!-- Toastr -->
   <link rel="stylesheet" href="{{asset('plugins/toastr/toastr.min.css')}}">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="{{asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{asset('plugins/jqvmap/jqvmap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{asset('plugins/daterangepicker/daterangepicker.css')}}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{asset('plugins/summernote/summernote-bs4.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
   <!-- Bootstrap Color Picker -->
   <link rel="stylesheet" href="{{asset('plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css')}}">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <!-- Select2 -->
  <link rel="stylesheet" href="{{asset('plugins/select2/css/select2.min.css')}}">
  <link rel="stylesheet" href="{{asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
    <!-- fullCalendar -->
    <link rel="stylesheet" href="{{asset('plugins/fullcalendar/main.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/fullcalendar-daygrid/main.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/fullcalendar-timegrid/main.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/fullcalendar-bootstrap/main.min.css')}}">
   <!-- custom style -->
   <link rel="stylesheet" href="{{asset('style/style.css')}}">
</head>
<style>
 
</style>

<body id="{{ Request::segment(1) == 'business' ? 'business-listing' : ''}}{{ Request::segment(1) == 'group' ? 'group' : ''}}" class="hold-transition sidebar-mini layout-fixed">
<div  id="loading-image" style="display: none">
    <div style="
        position: fixed;
        display: flex;
        width: 100%;
        height: 100%;
        justify-content: center;
        align-items: center;
        z-index: 1;
        background: #00000061;
    ">
    <img style="width: 70px" src="https://mir-s3-cdn-cf.behance.net/project_modules/disp/585d0331234507.564a1d239ac5e.gif">
    
    </div>
    </div>
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
      <a href="{{url('/')}}" class="nav-link"> Dashboard
        </a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
      <a href="{{url('/business/add')}}" class="nav-link">  Add business
        
        </a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link"> Help
            
        </a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{url('/settings')}}" class="nav-link"> Settings
        
        </a>
      </li>
    </ul>

   

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
     
      <!-- Notifications Dropdown Menu -->
      {{-- <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li> --}}
      <li class="nav-item">
        <a class="nav-link"  href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" role="button">
          <i class="fas fa-power-off"></i>
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
          </form>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{url('/')}}" class="brand-link">
      <img src="{{asset('dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Neovora Social</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
         
          <li class="nav-item">
            <a href="{{url('/business')}}" class="nav-link {{ Request::segment(1) == 'business' ? 'active' : '' }}">
              <i class="nav-icon fas fa-briefcase"></i>
              <p>
                Businesses 
                </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url('/group')}}" class="nav-link {{ Request::segment(1) == 'group' ? 'active' : '' }}">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Groups 
                </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url('/posting-schedule')}}" class="nav-link {{ Request::segment(1) == 'posting-schedule' ? 'active' : '' }}">
              <i class="nav-icon fas fa-calendar-week"></i>
              <p>
                Posting Schedule  
                </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url('/post/add-single')}}" class="nav-link {{ Request::segment(1) == 'post' ? 'active' : '' }}">
              <i class="nav-icon fas fa-comment"></i>
              <p>
                Single Post  
                </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url('/post-multiple/add')}}" class="nav-link {{ Request::segment(1) == 'post-multiple' ? 'active' : '' }}">
              <i class="nav-icon fas fa-comments"></i>
              <p>
                Multi Post
            
                </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url('/content-designer')}}" class="nav-link {{ Request::segment(1) == 'content-designer' ? 'active' : '' }}" class="nav-link">
              <i class="nav-icon fas fa-rss"></i>
              <p>
               
                Content Designer
              
                </p>
            </a>
          </li>
          <li class="nav-item">
          <a href="{{url('calendar')}}" class="nav-link">
              <i class="nav-icon fas fa-calendar-alt"></i>
              <p>
                Calendar 
                </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-file-alt"></i>
              <p>
                Landing Pages    
                </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url('/leadgen-campaign')}}" class="nav-link {{ Request::segment(1) == 'leadgen-campaign' ? 'active' : '' }}">
              <i class="nav-icon fas fa-user-alt"></i> 
              <p>
                leadgen Campaigns 
                </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Sales Training 
                </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @yield('content')
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2020 <a href="{{url('/')}}">NeoSocial</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      {{-- <b>Version</b> 3.0.5 --}}
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

</body>
</html>
