<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>Kominfo Arsip</title>
    @toastr_css
    <!-- Font Awesome Icons -->
    <link rel="icon" type="image/png" sizeof="32x32" href="assets/dist/img/favicon-32x32.png">
   <link rel="icon" type="image/png" sizeof="16x16" href="assets/dist/img/favicon-16x16.png">

    <link rel="stylesheet" href="{{asset('assets/plugins/fontawesome-free/css/all.min.css')}}">
    <!--Font awesome 4.7-->
    <link rel="stylesheet" href="{{asset('assets/font-awesome-4.7.0/path/to/font-awesome/css/font-awesome.min.css')}}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{asset('assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('assets/dist/css/adminlte.min.css')}}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <link rel="stylesheet" href="../../plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- Toastr -->
     <link rel="stylesheet" href="../../plugins/toastr/toastr.min.css">
     <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
     <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.css">
     <style>
        #gas{

            font-family:'Times New Roman', Times, serif;
            /* font-weight: bold; */
            font-size: 1em;
            position:absolute;
            top: 10px;
            margin: auto 7px;
        }

        #gas1{
            font-family:'Times New Roman', Times, serif;
            /* font-weight: bold; */
            font-size: 1em;
            position:absolute;
            top: 32px;
            margin: auto 7px;
        }

     </style>
     @toastr_css
</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="logo_warp" data-widget="pushmenu" class="d-block" role="button"> <img src="{{asset('assets/dist/img/toba.jpg')}}" class="img-circle elevation-2" width="50" height="50">
                    <table align="right">
                            <td >
                          <span id="gas" >DINAS KOMUNIKASI DAN INFORMATIKA<BR> </span>
                         <span id="gas1">KABUPATEN TOBA<BR> </span>
                           </td>
                           </table>
                    </a>

                </li>

            </ul>

            <!-- SEARCH FORM -->
            <!--     <form class="form-inline ml-3">
                <div class="input-group input-group-sm">
                    <input class="form-control form-control-navbar" type="search" placeholder="Search"
                        aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-navbar" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>
-->
            <!-- Right navbar links -->

            <ul class="navbar-nav ml-auto">


                <!-- Messages Dropdown Menu -->

                <!-- Notifications Dropdown Menu -->
                @if(auth()->user()->role=='skdi')
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-bell fa-2x"></i>


                        <span class="badge badge-warning navbar-badge">{{count($skdi)}}</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-item dropdown-header">Notifikasi Konfirmasi</span>
                        @foreach($skdi as $disposisi => $hasil)
                        <a href="/disposisi-show/{{$hasil->id}}" class="dropdown-item">
                            <i class="fas fa-envelope mr-2"></i> {{$hasil->nomor_surat}}
                            <span class="float-right text-muted text-sm">3 mins</span>
                        </a>
                        @endforeach

                </li>

                @endif
                @if(auth()->user()->role=='aplikasi')
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-bell fa-2x"></i>


                        <span class="badge badge-warning navbar-badge">{{count($aplikasi)}}</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-item dropdown-header">Notifikasi Konfirmasi</span>
                        @foreach($aplikasi as $disposisi => $hasil)
                        <a href="/disposisi-show/{{$hasil->id}}" class="dropdown-item">
                            <i class="fas fa-envelope mr-2"></i> {{$hasil->nomor_surat}}
                        </a>
                        @endforeach

                </li>

                @endif

                @if(auth()->user()->role=='statistik')
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-bell fa-2x"></i>

                        <?php
                           $data=\DB::select("SELECT * FROM disposisis WHERE disposisi='statistik' AND status_kabid='Menunggu'");
                        ?>
                        <span class="badge badge-warning navbar-badge">{{count($statistik)}}</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-item dropdown-header">Notifikasi Konfirmasi</span>
                        @foreach($statistik as $disposisi => $hasil)
                        <a href="/disposisi-show/{{$hasil->id}}" class="dropdown-item">
                            <i class="fas fa-envelope mr-2"></i> {{$hasil->nomor_surat}}
                        </a>
                        @endforeach

                </li>

                @endif
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="fa fa-user-circle fa-2x"  aria-hidden="true"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-item dropdown-header">{{auth()->user()->name}}</span>

                        <a href="/logout" class="dropdown-item">

                         Logout
                            <span class="float-right text-muted text-sm">  <i class="fa fa-sign-out fa-2x" ></i></span>
                        </a>


                </li>


            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <div class="brand-link">
                <center> <span class="brand-text-center font-weight-light">Aplikasi Arsip Surat</span> </center>
            </div>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="{{asset('assets/dist/img/KOMINFO.PNG')}}" class="img-circle elevation-2"
                            alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">Kominfo Toba</a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
                            with font-awesome or any other icon font library -->
                        <li class="nav-item has-treeview menu-open">
                            <a href="/dashboard" class="nav-link {{'dashboard' == request()->path() ? 'active' : ''}}">
                                <i class="fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>
                        @if(auth()->user()->role=='admin')
                        <li class="nav-item has-treeview">
                            <a href="/surat_masuk" class="nav-link {{'surat_masuk' == request()->path() ? 'active' : ''}}">
                                <i class="fa fa-envelope" alt=""></i>
                                <p>
                                    Surat Masuk
                                </p>
                            </a>
                        </li>

                        <li class="nav-item has-treeview {{'disposisi' == request()->path() ? 'menu-open' : ''}}{{'disposisi-telah' == request()->path() ? 'menu-open' : ''}}">
                            <a href="#" class="nav-link  ">
                                <i class="fa fa-clipboard" alt=""></i>
                                <p>
                                    Disposisi
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="/disposisi" class="nav-link {{'disposisi' == request()->path() ? 'active' : ''}}">
                                    <i class="fa fa-share-square" alt=""></i>
                                        <p>Belum Terdisposisi</p>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="/disposisi-telah" class="nav-link {{'disposisi-telah' == request()->path() ? 'active' : ''}}">
                                        <i class="far fa-list-alt"></i>
                                        <p>Telah Terdisposisi</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        @endif
                        @if(auth()->user()->role=='skdi'||auth()->user()->role=='aplikasi'||auth()->user()->role=='statistik')
                        <li class="nav-item has-treeview {{'disposisi' == request()->path() ? 'menu-open' : ''}}{{'disposisi-semua' == request()->path() ? 'menu-open' : ''}}">
                            <a href="#" class="nav-link ">
                            <i class="fa fa-clipboard" alt=""></i>
                                <p>
                                    Disposisi
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="/disposisi" class="nav-link {{'disposisi' == request()->path() ? 'active' : ''}}">
                                    <i class="fa fa-share-square" alt=""></i>
                                        <p>Konfirmasi</p>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="/disposisi-semua" class="nav-link {{'disposisi-semua' == request()->path() ? 'active' : ''}}">
                                    <i class="far fa-list-alt"></i>
                                        <p>Semua Disposisi</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        @endif
                        @if(auth()->user()->role=='sekdis'||auth()->user()->role=='kadis')
                        <li class="nav-item has-treeview">
                            <a href="/disposisi-semua" class="nav-link {{'disposisi-semua' == request()->path() ? 'active' : ''}} ">
                            <i class="fa fa-clipboard" alt=""></i>
                                <p>
                                    Disposisi

                                </p>
                            </a>
                        </li>
                        @endif
                        @if(auth()->user()->role=='admin')
                        <li class="nav-item has-treeview {{'surat_keluar' == request()->path() ? 'menu-open' : ''}}{{'formsurat' == request()->path() ? 'menu-open' : ''}} ">
                            <a href="#" class="nav-link">
                                <i class="fas fa-envelope-open" alt=""></i>
                                <p>
                                    Surat Keluar
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="./surat_keluar" class="nav-link {{'surat_keluar' == request()->path() ? 'active' : ''}}">
                                    <i class="fa fa-list" aria-hidden="true"></i>
                                        <p>Daftar Surat Keluar</p>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item ">
                                    <a href="./formsurat" class="nav-link {{'formsurat' == request()->path() ? 'active' : ''}}">
                                        <i class="fa fa-sticky-note"></i>
                                        <p>
                                            Buat Surat Keluar
                                        </p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        @endif


                        <li class="nav-item has-treeview {{'agenda_masuk' == request()->path() ? 'menu-open' : ''}}{{'agenda_keluar' == request()->path() ? 'menu-open' : ''}}">
                            <a href="#" class="nav-link">
                                <i class="fa fa-book fa" alt="Agenda"></i>
                                <p>
                                    Agenda Surat
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>

                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="/agenda_masuk" class="nav-link {{'agenda_masuk' == request()->path() ? 'active' : ''}}">
                                    <i class="fa fa-envelope" alt=""></i>
                                        <p>Agenda Surat Masuk</p>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="/agenda_keluar" class="nav-link {{'agenda_keluar' == request()->path() ? 'active' : ''}}">
                                    <i class="fas fa-envelope-open" alt=""></i>
                                        <p>Agenda Surat Keluar</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        @if(auth()->user()->role=='admin')
                        <li class="nav-item has-treeview {{'kabid' == request()->path() ? 'menu-open' : ''}}">
                            <a href="#" class="nav-link ">
                            <i class="fa fa-user" aria-hidden="true"></i>
                                <p>
                                   Pengguna
                                <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="/kabid" class="nav-link {{'kabid' == request()->path() ? 'active' : ''}}">
                                    <i class="fa fa-user-plus" aria-hidden="true"></i>
                                        <p>Tambah Pengguna  </p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        @endif

                    </ul>
                </nav>
            </div>
        </aside>


        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            @yield('content')
        </div>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        <footer class="main-footer">
            <strong>Copyright &copy; 2020 <a>Kominfo</a></strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>302-B</b>
            </div>
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->
    <!-- jQuery -->
    <script src="{{asset('assets/plugins/jquery/jquery.min.js')}}"></script>
    <!-- Bootstrap -->
    <script src="{{asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- overlayScrollbars -->
    <script src="{{asset('assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('assets/dist/js/adminlte.js')}}"></script>

    <!-- OPTIONAL SCRIPTS -->
    <script src="{{asset('assets/dist/js/demo.js')}}"></script>

    <!-- PAGE PLUGINS -->
    <!-- jQuery Mapael -->
    <script src="{{asset('assets/plugins/jquery-mousewheel/jquery.mousewheel.js')}}"></script>
    <script src="{{asset('assets/plugins/raphael/raphael.min.js')}}"></script>
    <script src="{{asset('assets/plugins/jquery-mapael/jquery.mapael.min.js')}}"></script>
    <script src="{{asset('assets/plugins/jquery-mapael/maps/usa_states.min.js')}}"></script>
    <!-- ChartJS -->
    <script src="{{asset('assets/plugins/chart.js/Chart.min.js')}}"></script>

    <!-- PAGE SCRIPTS -->
    <script src="{{asset('assets/dist/js/pages/dashboard2.js')}}"></script>
    <script src="{{asset('assets/plugins/toastr/toastr.min.js')}}"></script>
    <script src="{{asset('assets/plugins/sweetalert2/sweetalert2.min.js')}}"></script>
    <script src="../../plugins/toastr/toastr.min.js"></script>

    <script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>



</body>
@jquery
@toastr_js
@toastr_render
</html>
