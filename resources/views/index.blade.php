<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Dashboard</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css')}}">
  <!-- Tempusdominus Bootstrap 4 -->
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
  <link rel="stylesheet" href="{{asset('plugins/summernote/summernote-bs4.min.css')}}">
  <style>
     .container {
        max-width: 1200px;
        margin: 0 auto;
        background-color: #fff;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
    }
    h1,h2 {
        color: #4CAF50;
        font-size: 2.5em;
        margin-bottom: 20px;
        text-align: center;
    }
    .section {
        margin-bottom: 40px;
    }
    .section h2 {
        color: #333;
        border-bottom: 2px solid #4CAF50;
        padding-bottom: 10px;
        margin-bottom: 20px;
        font-size: 1.5em;
    }
    .activity-list {
        list-style-type: none;
        padding: 0;
    }
    .activity-list li {
        background-color: #f9f9f9;
        margin-bottom: 10px;
        padding: 15px;
        border-radius: 5px;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
    }
    .activity-list li h3 {
        margin: 0;
        font-size: 1.2em;
        color: #333;
    }
    .activity-list li p {
        margin: 5px 0;
        color: #555;
    }
    .activity-list li .timestamp {
        font-size: 0.9em;
        color: #999;
    }
  </style>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="{{asset('dist/img/AdminLTELogo.png')}}" alt="AdminLTELogo" height="60" width="60">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>

    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->


      <!-- Messages Dropdown Menu -->

      <!-- Notifications Dropdown Menu -->

      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="btn btn-danger" href="{{ route('logout') }}"
            onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    {{-- <a href="index3.html" class="brand-link">
      <img src="{{asset('dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a> --}}

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Thet Htar</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->

      @if(Auth::check() && Auth::user()->role !== 'student')
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                 with font-awesome or any other icon font library -->
                 {{-- <li class="nav-item">
                    <a href="pages/widgets.html" class="nav-link">
                      <i class="nav-icon fas fa-th"></i>
                      <p>
                        Widgets
                        <span class="right badge badge-danger">New</span>
                      </p>
                    </a>
                  </li> --}}
                  <li class="nav-item">
                    <a href="{{ route('home.index') }}" class="nav-link">
                      <i class="nav-icon fas fa-th"></i>
                      <p>
                       Home
                      </p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('user.create') }}" class="nav-link">
                      <i class="nav-icon fas fa-th"></i>
                      <p>
                        Create User
                      </p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('user.index') }}" class="nav-link">
                      <i class="nav-icon fas fa-th"></i>
                      <p>
                        User List

                      </p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('year.create') }}" class="nav-link">
                      <i class="nav-icon fas fa-th"></i>
                      <p>
                         Year Create

                      </p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('year.index') }}" class="nav-link">
                      <i class="nav-icon fas fa-th"></i>
                      <p>
                        Year List

                      </p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('tutorial.create') }}" class="nav-link">
                      <i class="nav-icon fas fa-th"></i>
                      <p>
                        Tutorial Create

                      </p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('tutorial.index') }}" class="nav-link">
                      <i class="nav-icon fas fa-th"></i>
                      <p>
                        Tutorial List
                      </p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('event.create') }}" class="nav-link">
                      <i class="nav-icon fas fa-th"></i>
                      <p>
                        Event Create

                      </p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('event.index') }}" class="nav-link">
                      <i class="nav-icon fas fa-th"></i>
                      <p>
                        Event List
                      </p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('book.create') }}" class="nav-link">
                      <i class="nav-icon fas fa-th"></i>
                      <p>
                        Book Create

                      </p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('book.index') }}" class="nav-link">
                      <i class="nav-icon fas fa-th"></i>
                      <p>
                        Book List
                      </p>
                    </a>
                  </li>
          </ul>
      </nav>
      @else
     <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">


                  <li class="nav-item">
                    <a href="{{ route('user.index') }}" class="nav-link">
                      <i class="nav-icon fas fa-th"></i>
                      <p>
                        User List

                      </p>
                    </a>
                  </li>

                  <li class="nav-item">
                    <a href="{{ route('year.index') }}" class="nav-link">
                      <i class="nav-icon fas fa-th"></i>
                      <p>
                        Year List

                      </p>
                    </a>
                  </li>

                  <li class="nav-item">
                    <a href="{{ route('tutorial.index') }}" class="nav-link">
                      <i class="nav-icon fas fa-th"></i>
                      <p>
                        Tutorial List
                      </p>
                    </a>
                  </li>

                  <li class="nav-item">
                    <a href="{{ route('event.index') }}" class="nav-link">
                      <i class="nav-icon fas fa-th"></i>
                      <p>
                        Event List
                      </p>
                    </a>
                  </li>

                  <li class="nav-item">
                    <a href="{{ route('book.index') }}" class="nav-link">
                      <i class="nav-icon fas fa-th"></i>
                      <p>
                        Book List
                      </p>
                    </a>
                  </li>
          </ul>
      </nav>
      @endif
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <!-- /.row -->



        @yield('content')


      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->

        <!-- /.row -->
        <!-- Main row -->

        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  {{-- <footer class="main-footer">
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.2.0
    </div>
  </footer> --}}

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

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
<script src="{{asset('plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{asset('plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
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
<!-- AdminLTE for demo purposes -->
<script src="{{asset('dist/js/demo.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('dist/js/pages/dashboard.js')}}"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const roleStudent = document.getElementById('roleStudent');
        const roleTeacher = document.getElementById('roleTeacher');
        const rollNumberField = document.getElementById('roll_number');
        const yearField = document.getElementById('year_id');
        const positionField = document.getElementById('position');

        const toggleFields = () => {
            if (roleStudent.checked) {
                rollNumberField.disabled = false;
                yearField.disabled = false;
                positionField.disabled = true;
            } else if (roleTeacher.checked) {
                rollNumberField.disabled = true;
                yearField.disabled = true;
                positionField.disabled = false;
            } else {
                rollNumberField.disabled = true;
                yearField.disabled = true;
                positionField.disabled = true;
            }
        };

        // Initial check
        toggleFields();

        // Add event listener to role radio buttons
        document.querySelectorAll('input[name="role"]').forEach(radio => {
            radio.addEventListener('change', toggleFields);
        });
    });
</script>
</body>
</html>
