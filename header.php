<?php
if (session_id() == null) {
  session_start();
}
if (!isset($_SESSION['cart'])) {
  $_SESSION['cart'] = array();
  $_SESSION['qty'] = array();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="copyright" content="MACode ID, https://macodeid.com/">
  <title>One Health - Medical Center HTML5 Template</title>
  <link rel="stylesheet" href="assets/css/maicons.css">
  <link rel="stylesheet" href="assets/css/bootstrap.css">
  <link rel="stylesheet" href="assets/vendor/owl-carousel/css/owl.carousel.css">
  <link rel="stylesheet" href="assets/vendor/animate/animate.css">
  <link rel="stylesheet" href="assets/css/theme.css">
  <link rel="shortcut icon" href="assets/img/logo.png" type="image/x-icon">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
  <link rel="stylesheet" href="assets/plugins/sweetalert2/sweetalert2.min.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="assets/plugins/sweetalert2/sweetalert2.min.js"></script>
</head>

<body>
  <!-- Back to top button -->
  <div class="back-to-top"></div>
  <header>
    <div class="topbar">
      <div class="container">
        <div class="row">
          <div class="col-sm-8 text-sm">
            <div class="site-info">
              <a href="#"><span class="mai-call text-primary"></span> +92 302-1120550 </a>
              <span class="divider">|</span>
              <a href="#"><span class="mai-mail text-primary"></span> lifecare@gmail.com</a>
            </div>
          </div>
          <div class="col-sm-4 text-right text-sm">
            <div class="social-mini-button">
              <a href="#"><span class="mai-logo-facebook-f"></span></a>
              <a href="#"><span class="mai-logo-twitter"></span></a>
              <a href="#"><span class="mai-logo-dribbble"></span></a>
              <a href="#"><span class="mai-logo-instagram"></span></a>
            </div>
          </div>
        </div> <!-- .row -->
      </div> <!-- .container -->
    </div> <!-- .topbar -->

    <nav class="navbar navbar-expand-lg navbar-light shadow-sm">
      <div class="container">
        <a class="navbar-brand" href="#">
          <img src="assets/img/logo.png" alt="Life Care" class="img-fluid" style="height: 30px;">
          <!-- *<span class="text-primary">One</span>-Health*/ -->
        </a>

        <!-- <form action="#">
          <div class="input-group input-navbar">
            <div class="input-group-prepend">
              <span class="input-group-text" id="icon-addon1"><span class="mai-search"></span></span>
            </div>
            <input type="text" class="form-control" placeholder="Enter keyword.." aria-label="Username" aria-describedby="icon-addon1">
          </div>
        </form> -->

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupport" aria-controls="navbarSupport" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse " id="navbarSupport">
          <ul class="navbar-nav">
            <li class="nav-item active">
              <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="about.php">About Us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="doctors.php">Doctors</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="blog.php">News</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="contact.php">Contact</a>
            </li>
          </ul>
          <?php
          if (isset($_SESSION['p_name'])) {
          ?>
            <ul class="navbar-nav ml-auto">
              <li class="nav-item">
                <a class="btn btn-info ml-lg-3" href="appoiment.php">Make Appoiment</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <img src="data:image/jpg;base64,<?php echo base64_encode($_SESSION['p_img']); ?>" width="40" height="40" class="rounded-circle">
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="#"><?php echo $_SESSION['p_name']?></a>
                  <a class="dropdown-item" href="PatientEdit.php?p_id=<?php echo $_SESSION['p_id']?>">Edit Profile</a>
                  <a class="dropdown-item" href="LogOut.php#">Log Out</a>
                </div>
              </li>
            </ul>
          <?php
          } else {
          ?>
            <ul class="navbar-nav ml-auto">
              <li class="nav-item">
                <a class="btn btn-primary ml-lg-3" href="login.php">Login</a>
              </li>
              <li class="nav-item">
                <a class="btn btn-info ml-lg-3" href="register.php">Register</a>
              </li>
            </ul>
          <?php
          }
          ?>
        </div> <!-- .navbar-collapse -->
      </div> <!-- .container -->
    </nav>
  </header>