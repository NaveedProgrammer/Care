<?php
session_start();
include 'config.php';
if (isset($_POST['logBtn'])) {
    $p_email = $_POST['pEmail'];
    $p_pass = $_POST['pPass'];
    $patient = "SELECT * FROM `patient_tbl` WHERE `PatientEmail`='$p_email' && `PatientPassword`='$p_pass'";
    $admin = "SELECT * FROM `admin_tbl` WHERE `AdminEmail`='$p_email' && `AdminPassword`='$p_pass'";
    $doctor = "SELECT * FROM `doctor_tbl` WHERE `DoctorEmail`='$p_email' && `DoctorPassword`='$p_pass'";
    $p_result = mysqli_query($conn, $patient);
    $a_result = mysqli_query($conn, $admin);
    $d_result = mysqli_query($conn, $doctor);
    if (mysqli_num_rows($p_result) > 0) {
        $row = mysqli_fetch_assoc($p_result);
        $_SESSION['p_id'] = $row['PatientID'];
        $_SESSION['p_name'] = $row['PatientName'];
        $_SESSION['p_img'] = $row['PatientImage'];
        header("location:index.php");
    } else if ($a_result) {
        if (mysqli_num_rows($a_result) > 0) {
            $row = mysqli_fetch_assoc($a_result);
            $_SESSION['a_id'] = $row['AdminID'];
            $_SESSION['a_name'] = $row['AdminName'];
            $_SESSION['a_img'] = $row['AdminImage'];
            header("location:admin/index.php");
        } else {
            echo "<script>alert('Invalid Credentials....!');</script>";
        }
    }else if ($a_result) {
        if (mysqli_num_rows($a_result) > 0) {
            $row = mysqli_fetch_assoc($a_result);
            $_SESSION['d_id'] = $row['DoctorID'];
            $_SESSION['d_name'] = $row['DoctorName'];
            $_SESSION['d_img'] = $row['DoctorImage'];
            header("location:doctor/index.php");
        } else {
            echo "<script>alert('Invalid Credentials....!');</script>";
        }
    }else{
        
        echo "<script>alert('Invalid Credentials....!');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up Form by Colorlib</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/fonts/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Main css -->
    <link rel="stylesheet" href="assets/plugins/sweetalert2/sweetalert2.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="assets/plugins/sweetalert2/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>


    <section class="sign-in mt-5">
        <div class="container">
            <p style="text-align: center;padding-top:10px;font-weight:bold;"><a style="text-decoration:none;color:#6dabe4;" href="index.php">Home</a>/<span style="font-weight:bolder;">Login Page</span></p>
            <div class="signin-content">
                <div class="signin-image mt-5">
                    <figure><img src="assets/img/logDoctor.jfif" alt="sing up image"></figure>
                    <a href="register.php" class="signup-image-link">Create an account</a>
                </div>

                <div class="signin-form">
                    <h2 class="form-title" style="color:#6dabe4;">Login Form</h2>
                    <form method="POST" class="register-form" id="login-form">
                        <div class="form-group">
                            <label for="your_pass"><i class="fa  fa-envelope"></i></label>
                            <input type="email" name="pEmail" placeholder="E-Mail example@abc.com" />
                        </div>
                        <div class="form-group">
                            <label for="your_name"><i class="fa fa-lock"></i></label>
                            <input type="password" name="pPass" placeholder="Your Password" />
                        </div>
                        <div class="form-group form-button">
                            <input type="submit" name="logBtn" id="signin" class="form-submit btn btn-block w-100" value="Login" />
                        </div>
                    </form>
                    <div class="social-login">
                        <span class="social-label">Or login with</span>
                        <ul class="socials">
                            <li><a href="#"><i class="display-flex-center fa fa-facebook-f" style="font-size:24px;color:blue;"></i></a></li>
                            <li><a href="#"><i class="display-flex-center 	fa fa-google-plus" style="font-size:24px;color:green;"></i></a></li>
                            <li><a href="#"><i class="display-flex-center fa fa-twitter" style="font-size:24px;color:skyblue;"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- JS -->
    <script src="assets/vendor/jquery.min.js"></script>
    <script src="assets/js/main.js"></script>

</html>