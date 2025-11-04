<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="csrf-token" content="<?= csrf_hash() ?>">
  <meta name="csrf-header" content="<?= csrf_header() ?>">
  <meta name="csrf-name" content="<?= csrf_token() ?>">
  <title><?= $title ?? 'AdminLTE 4' ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Fonts e Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.11.0/styles/overlayscrollbars.min.css">

  <!-- AdminLTE CSS -->
  <link rel="stylesheet" href="<?= base_url('css/adminlte.css') ?>">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>

<body class="fixed-header sidebar-expand-lg sidebar-open bg-body-tertiary">
  <div class="position-fixed top-0 end-0 p-3" style="z-index: 1100">
    <div id="liveToast" class="toast align-items-center text-bg-danger border-0 shadow-lg" role="alert" aria-live="assertive" aria-atomic="true">
      <div class="d-flex">
        <div class="toast-body fw-semibold">
          <?= session('toast_error') ?>
        </div>
        <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Fechar"></button>
      </div>
    </div>
  </div>

  <div class="app-wrapper">
    <!-- Header -->
    <nav class="app-header navbar navbar-expand bg-body">
      <div class="container-fluid">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" data-lte-toggle="sidebar" href="#" role="button"><i class="bi bi-list"></i></a>
          </li>
          <li class="nav-item d-none d-md-block"><a href="<?= base_url('/') ?>" class="nav-link">Home</a></li>
          <li class="nav-item d-none d-md-block"><a href="<?= base_url('/contact') ?>" class="nav-link">Contact</a></li>
        </ul>

        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link" data-widget="navbar-search" href="#" role="button">
              <i class="bi bi-search"></i>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('Access/logout') ?>">
              <i class="bi bi-box-arrow-right"></i> Logout
            </a>
          </li>
        </ul>
      </div>
    </nav>
    <!-- Sidebar -->
    <aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
      <div class="sidebar-brand">
        <a href="<?= base_url('/') ?>" class="brand-link">
          <img src="<?= base_url('assets/img/AdminLTELogo.png') ?>" alt="AdminLTE Logo" class="brand-image opacity-75 shadow">
          <span class="brand-text fw-light">AdminLTE 4</span>
        </a>
      </div>
      <div class="sidebar-wrapper">
        <nav class="mt-2">
          <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="navigation" aria-label="Main navigation" data-accordion="false">
            <li class="nav-item">
              <a href="<?= base_url('VideoController') ?>" class="nav-link active">
                <i class="nav-icon bi bi-play"></i>
                <p>Filmes</p>
              </a>
            </li>
          </ul>
        </nav>
      </div>
    </aside>

    <!-- Main Content -->
    <main class="app-main">
      <div class="app-content-header">
        <div class="container-fluid">
          <div class="row">
            <div class="col-sm-6 d-flex align-items-center gap-2">
              <h3 class="mb-0">
                <?= $page_head['title'] ?>
                <?= !empty($page_head['subtitle']) ? '| ' . $page_head['subtitle'] : '' ?>
              </h3>

              <?php if (!empty($page_head['btn_novo'])): ?>
                <a href="<?= base_url($page_head['btn_novo']) ?>" class="btn btn-primary btn-sm ms-3">
                  <i class="bi bi-plus-circle"></i> Novo
                </a>
              <?php endif; ?>
            </div>

            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-end">
                <li class="breadcrumb-item"><a href="<?= base_url('/') ?>">Home</a></li>
                <li class="breadcrumb-item active"><?= $title ?? 'Dashboard' ?></li>
              </ol>
            </div>
          </div>
        </div>
      </div>
      <div class="app-content">