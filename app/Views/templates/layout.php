<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php if (!isset($title)) : ?>
        <?php $title = 'Redirecting' ?>
    <?php endif; ?>

    <title><?= 'Inventaris | ' . $title ?></title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/58537ee19d.js" crossorigin="anonymous"></script>
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="/adminlte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="/adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="/adminlte/plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/adminlte/dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="/adminlte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="/adminlte/plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="/adminlte/plugins/summernote/summernote-bs4.min.css">

    <link rel="stylesheet" href="/adminlte/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="/adminlte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="/img/logo_transparan.png" alt="AdminLTELogo" height="60" width="60">
        </div>

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block text-center">
                    <h4 class="mt-2 text-center"><?= $title ?></h4>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">


                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>

            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="/" class="brand-link">
                <img src="/img/logo_sekolah.jpeg" class="brand-image img-circle elevation-3">
                <span class="brand-text font-weight-light">Harum Sentosa</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 text-center">

                    <div class="info ">
                        <a href="/user" class="d-block text-center">
                            <?= (session()->get('nama')) ? session()->get('nama') : '' ?>
                        </a>
                    </div>
                </div>


                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

                        <li class="nav-header">BARANG</li>
                        <li class="nav-item">
                            <a href="/barang" class="nav-link  <?= ($title == 'Data Barang' || $title == 'Tambah Barang' || $title == 'Bulk Tambah Barang' || $title == 'Edit Barang') ? 'active' : '' ?>">
                                <i class="nav-icon fa-solid fa-box"></i>

                                <p>
                                    Data Barang

                                </p>
                            </a>
                        </li>


                        <li class="nav-header">PEMINJAMAN</li>
                        <li class="nav-item">
                            <a href="/pinjam" class="nav-link <?= ($title == 'Data Peminjaman Barang' || $title == 'Detail Data Pinjam Barang' || $title == 'Tambah Peminjaman' || $title == 'Edit Pinjam') ? 'active' : '' ?>">
                                <i class="nav-icon fa-solid fa-box"></i>
                                <p>
                                    Peminjaman Barang
                                </p>
                            </a>
                        </li>


                        <li class="nav-header">Laporan</li>
                        <li class="nav-item">
                            <a href="/laporan" class="nav-link <?= ($title == 'Laporan') ? 'active' : '' ?>">
                                <i class="nav-icon fa-solid fa-print"></i>
                                <p>
                                    Laporan
                                </p>
                            </a>
                        </li>




                        <li class="nav-header">PENGATURAN</li>

                        <li class="nav-item">
                            <a href="/unit" class="nav-link  <?= ($title == 'Data Unit' || $title == 'Tambah Unit' || $title == 'Edit Unit') ? 'active' : '' ?>">
                                <i class="fas fa-circle nav-icon"></i>
                                <p>Unit</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="/lokasi" class="nav-link <?= ($title == 'Data Lokasi/Ruangan' || $title == 'Tambah Lokasi/Ruangan' || $title == 'Edit Data Lokasi/Ruangan') ? 'active' : '' ?> ">
                                <i class="fas fa-circle nav-icon"></i>
                                <p>Lokasi</p>
                            </a>
                        </li>


                        <?php if ((session()->get('nama'))) : ?>
                            <li>
                                <a onclick="return confirm('Apakah anda ingin keluar');" href="/login/detach" class="btn btn-danger btn-block mt-4">Logout</a>
                            </li>
                        <?php endif; ?>

                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>


        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">

                </div>
            </div>



            <section class="content">
                <div class="container-fluid">
                    <?= $this->renderSection('content') ?>
                </div>
            </section>

        </div>

        <footer class="main-footer text-center">
            <strong>Copyright &copy; <?= date('Y') ?> Tim Kedaireka USU.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 1.0.0
            </div>
        </footer>


        <aside class="control-sidebar control-sidebar-dark">

        </aside>

    </div>


    <!-- jQuery -->
    <script src="/adminlte/plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="/adminlte/plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/adminlte/plugins/select2/js/select2.full.min.js"></script>

    <!-- ChartJS -->
    <script src="/adminlte/plugins/chart.js/Chart.min.js"></script>
    <!-- Sparkline -->
    <script src="/adminlte/plugins/sparklines/sparkline.js"></script>
    <!-- JQVMap -->
    <script src="/adminlte/plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="/adminlte/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="/adminlte/plugins/jquery-knob/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="/adminlte/plugins/moment/moment.min.js"></script>
    <script src="/adminlte/plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="/adminlte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Summernote -->
    <script src="/adminlte/plugins/summernote/summernote-bs4.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="/adminlte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="/adminlte/dist/js/adminlte.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.js">


    </script>

    <script>
        $(document).ready(function() {
            bsCustomFileInput.init()
        })

        console.log('andrian');
        $('#reservationdate').datetimepicker({
            format: 'Y-MM-DD'
        })

        $('#reservationdate2').datetimepicker({
            format: 'Y-MM-DD'
        })

        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })
    </script>


</body>

</html>