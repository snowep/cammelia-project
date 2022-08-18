<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?= BASEURL ?>/dist/css/style.min.css" rel="stylesheet">
    <link href="<?= BASEURL ?>/assets/extra-libs/c3/c3.min.css" rel="stylesheet">
    <link href="<?= BASEURL ?>/assets/libs/chartist/dist/chartist.min.css" rel="stylesheet">
    <link href="<?= BASEURL ?>/assets/extra-libs/jvector/jquery-jvectormap-2.0.2.css" rel="stylesheet" />
    <link href="<?= BASEURL ?>/assets/extra-libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">
    <link rel="icon" type="image/png" sizes="16x16" href="https://demos.wrappixel.com/premium-admin-templates/bootstrap/flexy-bootstrap/package/assets/images/favicon.png">
    <!-- Custom CSS -->
    <link href="<?= BASEURL ?>/dist/css/style.min.css" rel="stylesheet">

    <!-- Different Template -->
    <script src="<?= BASEURL ?>/assets/libs/apexcharts/dist/apexcharts.min.js"></script>
    <title>Superuser | <?= $data['title'] ?></title>
</head>

<body>
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
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
                                        <span class="text-dark fw-bold"><?= $data['name'] ?></span>
                                    </span>
                                    <span>
                                        <i data-feather="chevron-down" class="feather feather-chevron-down feather-sm"></i>
                                    </span>
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end mailbox dropdown-menu-animate-up">
                                <a class="dropdown-item" href="javascript:void(0)"><i data-feather="user" class="svg-icon mr-2 ml-1"></i>
                                    My Profile</a>
                                <a class="dropdown-item" href="javascript:void(0)"><i data-feather="credit-card" class="svg-icon mr-2 ml-1"></i>
                                    My Balance</a>
                                <a class="dropdown-item" href="javascript:void(0)"><i data-feather="mail" class="svg-icon mr-2 ml-1"></i>
                                    Inbox</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="javascript:void(0)"><i data-feather="settings" class="svg-icon mr-2 ml-1"></i>
                                    Account Setting</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#"><i data-feather="power" class="svg-icon mr-2 ml-1"></i>
                                    Logout</a>
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
                            <a class="sidebar-link sidebar-link" href="<?= BASEURL ?>/" aria-expanded="false">
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
                                    <a href="<?= BASEURL ?>/user" class="sidebar-link">
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