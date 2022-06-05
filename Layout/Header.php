<?php
require_once '../Config/Database.php';
require_once '../Config/Authorize.php';

if (@$_GET["islogout"] == true) {
  session_destroy();
  header("Location: ../");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Dashboard</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="../plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="../plugins/summernote/summernote-bs4.min.css">
  <!-- Custome Style Funan -->
  <!-- <link rel="stylesheet" href="../dist\css\custome_color.css"> -->
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <!-- Preloader -->
    <!-- <div class="preloader flex-column justify-content-center align-items-center">
      <img class="animation__shake" src="../dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
    </div> -->

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li class="nav-item">
        
        <li class="nav-item d-none d-sm-inline-block">
          <a href="#" class="nav-link"><b><?=@$_SESSION["user_firstname"]?> <?=@$_SESSION["user_lastname"]?> | Operation Date <font class="mytime">01-Jan-1990 00:00:00</font></b></a>
        </li>
        <!-- <li class="nav-item d-none d-sm-inline-block">
          <a href="#" class="nav-link">Contact</a>
        </li> -->
      </ul>
      
      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="far fa-bell"></i>
            <span class="badge badge-warning navbar-badge">15</span>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <span class="dropdown-item dropdown-header">4 Notifications</span>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-envelope mr-2"></i> 4 Pending Loan
              <span class="float-right text-muted text-sm">3 mins</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
          </div>
        </li>
        <li class="nav-item">
          <a class="btn btn-link" href="../ChangePassword/" title="Change Password">
            <i class="fas fa-lock "></i>
          </a>
        </li>
        <li class="nav-item">
          <a class="btn btn-link" href="../Dashboard/" title="Home Page">
            <i class="fas fa-home "></i>
          </a>
        </li>
        <li class="nav-item">
          <a class="btn btn-link" href="../migrations/" title="Backup & Migration">
            <i class="fas fa-cog"></i>
          </a>
        </li>
        <li class="nav-item">
          <a class="btn btn-link" href="?islogout=true" title="LogOut">
            <i class="fas fa-power-off"></i>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-widget="fullscreen" href="#" role="button">
            <i class="fas fa-expand-arrows-alt"></i>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
            <i class="fas fa-th-large"></i>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-light-dark elevation-4">
      <!-- Sidebar -->
      <div class="sidebar no_padding_left no_padding_right">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="../Asset/System/Logo.png" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block"><?= @$parameters["CompanyName"] ?></a>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <?php
            $datas = fetch_all($conn, "select id,caption,icon,url from main_menus order by rank asc");
            foreach ($datas as $data) {
            ?>
              <li class="nav-item">
                <a href="<?= @$data['url'] ?>" class="nav-link">
                  <?= @$data['icon'] ?>
                  <p>
                    <?= @$data['caption'] ?>
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <?php
                  $group = $_SESSION["user_group"];
                  $sql = "select
                              t1.id,
                              t1.caption,
                              t1.icon,
                              t1.url
                          from sub_menus t1
                          inner join permissions t2 on t1.id = t2.sub_menu and t2.views=1
                          where main_menu = '" . $data['id'] . "' and t2.p_group in ($group) order by t1.rank asc";
                  echo "<script>alert(" . $sql . ");</script>";
                  $sub_datas = fetch_all($conn, "select
                                                    t1.id,
                                                    t1.caption,
                                                    t1.icon,
                                                    t1.url
                                                from sub_menus t1
                                                inner join permissions t2 on t1.id = t2.sub_menu and t2.views=1
                                                where main_menu = '" . $data['id'] . "' and t2.p_group in ($group) group by t1.id");
                  foreach ($sub_datas as $sub_data) {
                  ?>
                    <li class="nav-item">
                      <a href="<?= @$sub_data['url'] ?>" class="nav-link">
                        <?= @$sub_data['icon'] ?>
                        <p><?= @$sub_data['caption'] ?></p>
                      </a>
                    </li>
                  <?php
                  }
                  ?>
                </ul>
              </li>
            <?php
            }
            ?>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->