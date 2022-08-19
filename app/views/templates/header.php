<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?= BASEURL ?>/dist/css/style.min.css" rel="stylesheet">
    <link href="<?= BASEURL ?>/assets/extra-libs/c3/c3.min.css" rel="stylesheet">
    <link href="<?= BASEURL ?>/assets/libs/apexcharts/dist/apexcharts.css" rel="stylesheet">
    <link href="<?= BASEURL ?>/assets/extra-libs/jvector/jquery-jvectormap-2.0.2.css" rel="stylesheet" />
    <link href="<?= BASEURL ?>/assets/extra-libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">
    <link rel="icon" type="image/png" sizes="16x16" href="https://demos.wrappixel.com/premium-admin-templates/bootstrap/flexy-bootstrap/package/assets/images/favicon.png">
    <!-- Custom CSS -->
    <link href="<?= BASEURL ?>/dist/css/style.min.css" rel="stylesheet">

    <!-- Different Template -->
    <script src="<?= BASEURL ?>/assets/libs/apexcharts/dist/apexcharts.min.js"></script>
    <title><?= ucfirst($data['role']) ?> | <?= $data['title'] ?></title>
</head>

<body>
    <div class="preloader">
        <svg class="tea lds-ripple" width="37" height="48" viewBox="0 0 37 48" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M27.0819 17H3.02508C1.91076 17 1.01376 17.9059 1.0485 19.0197C1.15761 22.5177 1.49703 29.7374 2.5 34C4.07125 40.6778 7.18553 44.8868 8.44856 46.3845C8.79051 46.79 9.29799 47 9.82843 47H20.0218C20.639 47 21.2193 46.7159 21.5659 46.2052C22.6765 44.5687 25.2312 40.4282 27.5 34C28.9757 29.8188 29.084 22.4043 29.0441 18.9156C29.0319 17.8436 28.1539 17 27.0819 17Z" stroke="#fec80e" stroke-width="2"></path>
            <path d="M29 23.5C29 23.5 34.5 20.5 35.5 25.4999C36.0986 28.4926 34.2033 31.5383 32 32.8713C29.4555 34.4108 28 34 28 34" stroke="#fec80e" stroke-width="2"></path>
            <path id="teabag" fill="#fec80e" fill-rule="evenodd" clip-rule="evenodd" d="M16 25V17H14V25H12C10.3431 25 9 26.3431 9 28V34C9 35.6569 10.3431 37 12 37H18C19.6569 37 21 35.6569 21 34V28C21 26.3431 19.6569 25 18 25H16ZM11 28C11 27.4477 11.4477 27 12 27H18C18.5523 27 19 27.4477 19 28V34C19 34.5523 18.5523 35 18 35H12C11.4477 35 11 34.5523 11 34V28Z"></path>
            <path id="steamL" d="M17 1C17 1 17 4.5 14 6.5C11 8.5 11 12 11 12" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" stroke="#fec80e"></path>
            <path id="steamR" d="M21 6C21 6 21 8.22727 19 9.5C17 10.7727 17 13 17 13" stroke="#fec80e" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
        </svg>
    </div>

    <div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">

        <header class="topbar" data-navbarbg="skin6">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <div class="navbar-header" data-logobg="skin6">
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)">
                        <i class="ri-close-line ri-menu-2-line fs-6"></i>
                    </a>
                    <!-- Logo icon -->
                    <a class="navbar-brand" href="<?= BASEURL ?>">
                        <b class="logo-icon">
                            <span class="dark-logo">ASys</span>
                            <span class="light-logo">ASys</span>
                        </b>
                        <span class="logo-text">
                            <span class="dark-logo">V1</span>
                            <span class="light-logo">V1</span>
                        </span>
                    </a>
                    <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="ti-more"></i>
                    </a>
                </div>
                <div class="navbar-collapse collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a href="javascript:void(0)" class="nav-link sidebartoggler d-none d-md-block">
                                <i data-feather="menu" class="feather feather-menu"></i>
                            </a>
                        </li>
                    </ul>
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown profile-dropdown">
                            <a class="nav-link dropdown-toggle d-flex align-items-center" href="javascript:void(0)" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="<?= BASEURL ?>/assets/images/users/profile-pic.jpg" alt="user" class="profile-pic rounded-circle" width="30">
                                <div class="d-none d-md-flex">
                                    <span class="ms-2">Hello,
                                        <span class="text-dark fw-bold">
                                            <?php
                                            $name = explode(" ", $data['info']['fullname']);
                                            echo $name[0];
                                            ?>
                                        </span>
                                    </span>
                                    <span>
                                        <i data-feather="chevron-down" class="feather feather-chevron-down feather-sm"></i>
                                    </span>
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end mailbox dropdown-menu-animate-up">
                                <ul class="list-style-none">
                                    <li class="p-30 pb-2">
                                        <div class="rounded-top d-flex align-items-center">
                                            <h3 class="card-title mb-0">User Profile</h3>
                                        </div>
                                        <div class="d-flex align-items-center mt-4 pt-3 pb-4 border-bottom">
                                            <img src="<?= BASEURL ?>/assets/images/users/profile-pic.jpg" alt="user-profile" width="90" class="rounded-circle">
                                            <div class="ms-4">
                                                <h4 class="mb-0"><?= $data['info']['fullname'] ?></h4>
                                                <span class="text-muted"><?= ucfirst($data['role']) ?></span>
                                                <p class="text-muted mb-0 mt-1">
                                                    <span class="badge bg-<?= ($data['info']['status'] == 'active') ? 'success' : (($data['info']['status'] == 'pending') ? 'warning' : 'danger') ?>">
                                                        <?= ucfirst($data['info']['status']) ?></span>
                                                </p>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="p-30 pt-0">
                                        <div class="message-center message-body position-relative ps-container ps-theme default" style="height: 210px;">
                                            <!-- Message -->
                                            <a href="#" class="message-item px-2 d-flex align-items-center border-bottom py-3">
                                                <span class="btn btn-light0info btn-rounded lg text-info">
                                                    <i class="feather-icon" data-feather="user"></i>
                                                </span>
                                                <div class="w-75 d-inline-block v-middle ps-3 ms-1">
                                                    <h5 class="message-title mb-0 mt-1 fs-4 font-weight-medium">Profil Saya</h5>
                                                    <span class="fs-3 text-nowrap d-block time text-truncate fw-normal mt-1 text-muted">
                                                        Pengaturan Akun
                                                    </span>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="mt-4">
                                            <a href="<?= BASEURL ?>/auth/logout" class="btn btn-danger text-white">Keluar</a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <aside class="left-sidebar" data-sidebarbg="skin6">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar" data-sidebarbg="skin6">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="sidebar-item">
                            <a class="sidebar-link sidebar-link" href="<?= BASEURL ?>/<?= $_SESSION['role'] ?>/dashboard" aria-expanded="false">
                                <i data-feather="pie-chart" class="feather-icon"></i>
                                <span class="hide-menu">Dashboard</span>
                            </a>
                        </li>
                        <li class="list-divider"></li>
                        <li class="nav-small-cap">
                            <i class="nav-small-line"></i>
                            <span class="hide-menu">Administrasi</span>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
                                <i data-feather="file-text" class="feather-icon"></i>
                                <span class="hide-menu">Data </span>
                            </a>
                            <ul aria-expanded="false" class="collapse  first-level base-level-line">
                                <li class="sidebar-item">
                                    <a href="<?= BASEURL ?>/superuser/user_list" class="sidebar-link">
                                        <span class="hide-menu">User</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="<?= BASEURL ?>/school" class="sidebar-link">
                                        <span class="hide-menu">Sekolah</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <div class="page-wrapper">