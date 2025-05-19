<?php
require './Config/menu.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin | <?= $title ?></title>
    <link rel="icon" type="image/x-icon" href="./public/admin/dist/img/chocopike-icon.png">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="./public/admin/plugins/fontawesome-free/css/all.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="./public/admin/plugins/overlayScrollbars/css/OverlayScrollbars.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="./public/admin/dist/css/responsive.css">
    <link rel="stylesheet" href="./public/site/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="./public/site/css/pagination.css">
    <link rel="stylesheet" href="./public/site/css/checkout.component.css">
    <link rel="stylesheet" href="./public/admin/dist/css/styles.css">


    <!-- Dashboard -->

    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">


</head>

<body class="hold-transition sidebar-mini layout-fixed">
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
                    <a href="" class="nav-link"><?= $title ?></a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">

                    <a href="?controller=verify&action=logout" class="nav-link">

                        <i class="fas fa-sign-out-alt" style="font-size: 14px;"></i>Đăng xuất

                    </a>

                </li>
                <li class="nav-item">

                    <a href="./" class="nav-link">

                        <i class="fas fa-home" style="font-size: 14px;"></i>Đến trang người dùng
                    </a>

                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-light-primary elevation-4" style="background-color: #f0e5d4;">
            <!-- Brand Logo -->
            <a href="./?module=admin&controller=dashboard" class="brand-link">
                <img src="./public/site/img/chocopike-icon.png" alt="AdminLTE Logo"
                    class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">Chocopike</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <?php
                $convertRole = [
                    'admin' => 'Quản trị viên',
                    'staff' => 'Nhân viên',
                    'customer' => 'Khách hàng'  
                ];
                $userRole = $_SESSION['user']['role'] ?? 'customer';
                $userRoleText = $convertRole[$userRole] ?? 'Khách hàng';
                 ?>
                <!-- Sidebar user (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="./public/site/img/userr.png" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">
                            <?= $_SESSION['user']['fname'] . ' ' . $_SESSION['user']['lname'] . ' (' . $userRoleText . ')' ?>
                        </a>

                    </div>
                </div>

                <!-- SidebarSearch Form -->
                <div class="form-inline">
                    <div class="input-group" data-widget="sidebar-search">
                        <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                            aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-sidebar">
                                <i class="fas fa-search fa-fw"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <?php
                        // Lấy role từ session, mặc định là 'customer' nếu không có
                        $userRole = $_SESSION['user']['role'] ?? 'customer';

                        foreach ($menus as $m):
                            // Kiểm tra menu item có tồn tại và có quyền truy cập
                            if (!empty($m['label']) && isset($m['roles']) && in_array($userRole, $m['roles'])):
                                // Xác định class active nếu cần
                                $isActive = false; // Bạn có thể thêm logic kiểm tra active tại đây
                                $navItemClass = $isActive ? 'nav-item menu-open' : 'nav-item';
                                ?>
                                <li class="<?= $navItemClass ?>">
                                    <a href="<?= htmlspecialchars($m['route'] ?? '#') ?>" class="nav-link">
                                        <i class="nav-icon fas <?= htmlspecialchars($m['icon'] ?? 'fa-circle') ?>"></i>
                                        <p>
                                            <?= htmlspecialchars($m['label']) ?>
                                            <?php if (!empty($m['items'])): ?>
                                                <i class="right fas fa-angle-left"></i>
                                            <?php endif; ?>
                                        </p>
                                    </a>

                                    <?php if (!empty($m['items'])): ?>
                                        <ul class="nav nav-treeview">
                                            <?php foreach ($m['items'] as $mit):
                                                // Kiểm tra submenu item có tồn tại và có quyền truy cập
                                                if (!empty($mit['label']) && (!isset($mit['roles']) || in_array($userRole, $mit['roles']))):
                                                    $isSubActive = false; // Logic kiểm tra active cho submenu
                                                    $navLinkClass = $isSubActive ? 'nav-link active' : 'nav-link';
                                                    ?>
                                                    <li class="nav-item">
                                                        <a href="<?= htmlspecialchars($mit['route'] ?? '#') ?>"
                                                            class="<?= $navLinkClass ?>">
                                                            <i class="far fa-circle nav-icon"></i>
                                                            <p><?= htmlspecialchars($mit['label']) ?></p>
                                                        </a>
                                                    </li>
                                                <?php endif;
                                            endforeach; ?>
                                        </ul>
                                    <?php endif; ?>
                                </li>
                            <?php endif;
                        endforeach; ?>
                    </ul>
                </nav>

                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->

            <!-- Main content -->
            <section class="content">

                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <!-- Default box -->
                            <div class="card">
                                <div class="card-body">