<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Axima Dashboard</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="<?= base_url('assets/vendors/feather/feather.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/vendors/mdi/css/materialdesignicons.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/vendors/ti-icons/css/themify-icons.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/vendors/font-awesome/css/font-awesome.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/vendors/typicons/typicons.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/vendors/simple-line-icons/css/simple-line-icons.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/vendors/css/vendor.bundle.base.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
    <link rel="shortcut icon" href="<?= base_url('assets/images/favicon.png') ?>">
</head>
<body class="with-welcome-text">
    <div class="container-scroller">
    <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex align-items-top flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
          <div class="me-3">
            <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-bs-toggle="minimize">
              <span class="icon-menu"></span>
            </button>
          </div>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-top">
          <ul class="navbar-nav">
            <li class="nav-item fw-semibold d-none d-lg-block ms-0">
              <h1 class="welcome-text">Welcome, <span class="text-black fw-bold">Luqman Hakim</span></h1>
              <h3 class="welcome-sub-text">Your performance summary this week</h3>
            </li>
          </ul>
          <ul class="navbar-nav ms-auto">
            <li class="nav-item d-none d-lg-block">
              <div id="datepicker-popup" class="input-group date datepicker navbar-date-picker">
                <span class="input-group-addon input-group-prepend border-right">
                  <span class="icon-calendar input-group-text calendar-icon"></span>
                </span>
                <input type="text" class="form-control" />
              </div>
            </li>
            <li class="nav-item">
              <form class="search-form" action="#">
                <i class="icon-search"></i>
                <input type="search" class="form-control" placeholder="Search Here" title="Search here" />
              </form>
            </li>
            <li class="nav-item dropdown d-none d-lg-block user-dropdown">
              <a class="nav-link" id="UserDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                <img class="img-xs rounded-circle" src="assets/images/faces/elkecil.jpg" alt="Profile image" />
              </a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                <div class="dropdown-header text-center">
                  <img class="img-md rounded-circle" src="assets/images/faces/elkecil.jpg" alt="Profile image" />
                  <p class="mb-1 mt-3 fw-semibold">Luqman Hakim</p>
                  <p class="fw-light text-muted mb-0">luq.elha@gmail.com</p>
                </div>
            </li>
          </ul>
          <button
            class="navbar-toggler navbar-toggler-right d-lg-none align-self-center"
            type="button"
            data-bs-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
          </button>
        </div>
      </nav>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <!-- Dashboard -->
            <li class="nav-item">
              <a class="nav-link" href="<?= base_url(); ?>">
                <i class="mdi mdi-grid-large menu-icon"></i>
                <span class="menu-title">Dashboard</span>
              </a>
            </li>

            <!-- Weight Product -->
            <li class="nav-item">
              <a class="nav-link" href="#" data-bs-toggle="collapse" data-bs-target="#weightProduct" aria-expanded="false" aria-controls="weightProduct">
                <i class="mdi mdi-scale-balance menu-icon"></i>
                <span class="menu-title">Weight Product</span>
                <i class="menu-arrow mdi mdi-chevron-down"></i>
              </a>
              <div class="collapse" id="weightProduct">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <a class="nav-link" href="javascript:void(0);" onclick="toggleMasterData()">
                      <i class="mdi mdi-folder-open-outline menu-icon"></i>
                      <span class="menu-title">Master Data</span>
                      <i class="menu-arrow mdi mdi-chevron-down" id="masterDataArrow"></i>
                    </a>
                    <div id="masterDataContent" style="display:none;">
                      <a class="nav-link" href="<?= base_url('karyawanbaru'); ?>">
                        <i class="mdi mdi-chevron-right"></i>Data Calon Karyawan
                      </a>
                      <a class="nav-link" href="<?= base_url('datakriteria'); ?>">
                        <i class="mdi mdi-chevron-right"></i>Data Kriteria
                      </a>
                      <a class="nav-link" href="<?= base_url('penilaiankaryawan'); ?>">
                        <i class="mdi mdi-chevron-right"></i>Data Penilaian Karyawan
                      </a>
                    </div>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('vektorsv'); ?>">Kalkulasi Nilai Vektor S & V</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('perangkingan'); ?>">Perangkingan</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('hasilkeputusan'); ?>">Hasil Keputusan</a>
                  </li>
                </ul>
              </div>
            </li>
        </nav>