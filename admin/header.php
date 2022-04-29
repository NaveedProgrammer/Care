<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Dashboard</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

  <link rel="stylesheet" href="form.css">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <!-- Preloader -->
    <!--<div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div> -->

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="index.php" class="nav-link">Home</a>
        </li>
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <!-- Navbar Search -->
        <li class="nav-item">
          <a class="nav-link" data-widget="navbar-search" href="#" role="button">
            <i class="fas fa-search"></i>
          </a>
          <div class="navbar-search-block">
            <form class="form-inline">
              <div class="input-group input-group-sm">
                <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                  <button class="btn btn-navbar" type="submit">
                    <i class="fas fa-search"></i>
                  </button>
                  <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
            </form>
          </div>
        </li>
        <?php
        if (isset($_SESSION['a_id'])) {
        ?>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <img src="data:image/jpg;base64,<?php echo base64_encode($_SESSION['a_img']); ?>" width="40" height="40" class="rounded-circle">
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item"><?php echo $_SESSION['a_name'] ?></a>
              <a class="dropdown-item" href="AdminEdit.php?p_id=<?php echo $_SESSION['a_id'] ?>">Profile</a>
              <a class="dropdown-item" href="../LogOut.php">Logout</a>
            </div>
          </li>
        <?php } else {
          header("location:../index.php");
        } ?>

      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar bg-white elevation-4">
      <!-- Brand Logo -->
      <a class="navbar-brand ps-3" href="index.php">
        <img src="../assets/img/logo.png" alt="Life Care" class=" ml-2 border-bottom img-fluid" style="height: 30px;">
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <!-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="index.php" class="d-block"><?php echo $_SESSION['admin']; ?></a>
          </div>
        </div> -->

        <!-- SidebarSearch Form -->
        <div class="form-inline">

        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

               <br>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon far fa-user"></i>
                <p>
                  Doctors
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="add_doctors.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Add Doctor</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="all_doctors.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>All Doctors</p>
                  </a>
                </li>

              </ul>
            </li>
            <br>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-book"></i>
                <p>
                  Appointments
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="all_appointment.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>All Appointments</p>
                  </a>
                </li>

              </ul>
            </li>
            <br>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon far fa-clock"></i>
                <p>
                  Availability
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">

                <li class="nav-item">
                  <a href="add_availability.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Add Availability</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="all_availability.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>All Availabilities</p>
                  </a>
                </li>


              </ul>
            </li>
            <br>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon far fa-eye"></i>
                <p>
                  Speciality
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">

                <li class="nav-item">
                  <a href="add_specialization.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Add Speciality</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="all_specialization.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>All Specialities</p>
                  </a>
                </li>


              </ul>
            </li>
            <br>

            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-plus-square"></i>
                <p>
                  Patients
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">

                <li class="nav-item">
                  <a href="all_patient.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>All Patients</p>
                  </a>
                </li>
              </ul>
            </li>
            <br>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-city"></i>
                <p>
                  Cities
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="add_city.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Add City</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="all_city.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>All Cities</p>
                  </a>
                </li>
              </ul>
            </li>
            <br>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-phone"></i>
                <p>
                  Contact Info
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">

                <li class="nav-item">
                  <a href="all_contact.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Inbox</p>
                  </a>
                </li>
              </ul>
            </li>
            <br>
            <li class="nav-item">
              <a href="logout.php" class="nav-link">
                <i class="nav-icon fas fa-arrow-right"></i>
                <p>
                  Logout
                </p>
              </a>
            </li>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Dashboard</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Dashboard v1</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->