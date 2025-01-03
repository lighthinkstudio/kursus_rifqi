<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{ $title ? $title : 'Lighthink Studio' }}</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ asset('assets/adminlte/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('assets/adminlte/dist/css/adminlte.min.css') }}">
  <!-- jQuery -->
  <script src="{{ asset('assets/adminlte/plugins/jquery/jquery.min.js') }}"></script>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  @php
  use App\Models\User;
  $user = new User;
  $pengguna = $user->where('id', Auth::user()->id)->first();
  @endphp

  @include('admin.layouts.adminlte.navbar')

  @include('admin.layouts.adminlte.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Starter Page</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Starter Page</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">

        @yield('content')

      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  @include('admin.layouts.adminlte.footer')
  
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

  <!-- Bootstrap 4 -->
  <script src="{{ asset('assets/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <!-- AdminLTE App -->
  <script src="{{ asset('assets/adminlte/dist/js/adminlte.min.js') }}"></script>
  <script>
    // Tooltip
    $(document).ready(function() {
      $('[data-toggle="tooltip"]').tooltip();
    });

    // Add active class and stay opened when selected
    var url = "{{ URL::to(Request::segment(1).'/'.Request::segment(2)) }}";

    // Sidebar menu entirely but not cover treeview
    $('ul.nav-sidebar a').filter(function(){
      return this.href == url;
    }).addClass('active');

    // Treeview
    $('ul.nav-treeview a').filter(function(){
      return this.href == url;
    }).parentsUntil(".nav-item .has-treeview").addClass('menu-open').prev('a').addClass('active');

    //Enable check and uncheck all functionality
    $('.checkbox-toggle').click(function () {
      var clicks = $(this).data('clicks')
      if (clicks)
      {
        //Uncheck all checkboxes
        $('.data-list-check input[type=\'checkbox\']').prop('checked', false)
        $('.checkbox-toggle .far.fa-check-square').removeClass('fa-check-square').addClass('fa-square')
      }
      else
      {
        //Check all checkboxes
        $('.data-list-check input[type=\'checkbox\']').prop('checked', true)
        $('.checkbox-toggle .far.fa-square').removeClass('fa-square').addClass('fa-check-square')
      }
      $(this).data('clicks', !clicks)
    })
  </script>
</body>
</html>
