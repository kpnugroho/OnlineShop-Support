<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>@yield('title')</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="/adminlte/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- datatables -->
  <link rel="stylesheet" href="{{ asset('/adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}">
  <link rel="stylesheet" href="/adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="/adminlte/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- Custom CSS -->
  <link rel="stylesheet" href="{{ asset('/custom/css/style.css') }}">

</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
      <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
          <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a class="nav-link menu-name" id="menu-title">@yield('menu')</a>
        </li>
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
          <!-- Sign Out Menu -->
        <a class="nav-link" href="{{ route('User_Logout') }}">
          <i class="fas fa-sign-out-alt"></i>
        </a>

        <li class="nav-item">
          <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
            <i class="fas fa-th-large"></i>
          </a>
        </li>
      </ul>
    </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('/home') }}" class="brand-link">
      <img src="/adminlte/img/logo-128X128.png"
           alt="OS Support Logo"
           class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">OS SUPPORT</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="/adminlte/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a class="d-block">{{strtoupper(Session('username'))}}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview" id="nav-group-master">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-server"></i>
              <p>
                Master
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('User_Edit', Session('userId'))}}" class="nav-link nav-button" id="nav-change-password" title="CHANGE PASSWORD">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Change Password</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('Ekspedisi_Index') }}" class="nav-link nav-button" id="nav-ekspedisi" title="EKSPEDISI">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Ekspedisi</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview" id="nav-group-transaction">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Transaction
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('ScanResi_Index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Scan Resi</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../layout/top-nav-sidebar.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Search Resi</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../layout/boxed.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>History Resi</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../layout/fixed-sidebar.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Omzet Expedisi</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../layout/fixed-topnav.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Upload Penjualan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../layout/fixed-footer.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Search Penjualan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../layout/collapsed-sidebar.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Upload Penghasilan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../layout/collapsed-sidebar.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Search Penghasilan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../layout/collapsed-sidebar.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Recon. Sales VS Income</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview" id="nav-group-report">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Report
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../charts/chartjs.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Reconcile</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" id="content-wrapper">
    <div class="row row-button-nav">
    <div class="col-md-12">
      <a href="" id="btn-view" class="button-nav nav-active"><span><i class="fas fa-eye"></i></span> VIEW</a>
      <a id="btn-new" class="button-nav"><span><i class="far fa-plus-square"></i></span> NEW</a>
      <a href="" id="btn-print" class="button-nav"><span><i class="fas fa-print"></i></span> PRINT</a>
      <a href="" id="btn-pdf" class="button-nav"><span><i class="fas fa-file-pdf"></i></span> PDF</a>
      <a href="" id="btn-excel" class="button-nav"><span><i class="fas fa-file-excel"></i></span> XLS</a>
    </div>
  </div>
   @yield('content')
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      Version<b> 1.0</b>
    </div>
    Copyright &copy; 2020 Project Plus</a>. <strong>All Rights
    Reserved.</strong>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="/adminlte/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- datatables-->
<script src="{{ asset('/adminlte/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('/adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('/adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('/adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="/adminlte/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="/adminlte/js/demo.js"></script>
<!-- Additional script -->
<script src="{{ asset('/custom/js/scriptMaster.js') }}"></script>
<script src="{{ asset('/custom/js/scriptUser.js') }}"></script>
@stack('scripts')
</body>
</html>
