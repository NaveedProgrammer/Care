<?php
session_start();
include 'config.php';
if (isset($_POST['regBtn'])) {
    $p_name = $_POST['pName'];
    $p_email = $_POST['pEmail'];
    $p_pass = $_POST['pPass'];
    $p_contact = $_POST['pContact'];
    $p_address = $_POST['pAddress'];

    $p_img=addslashes(file_get_contents($_FILES['pImg']['tmp_name']));
    $userQuery="INSERT INTO `patient_tbl`(`PatientName`, `PatientEmail`, `PatientPassword`, `PatientImage`, `PatientContact`, `PatientAddress`) VALUES ('$p_name','$p_email','$p_pass','$p_img','$p_contact','$p_address')";

    $result=mysqli_query($conn,$userQuery);
    if($result){
        $_SESSION['msg']="Registeration Successfully...!";
        header('location:login.php');

    }
    else{
        $_SESSION['msg']="Registeration unSuccessfully...!";
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
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>

        <!-- Sign up form -->
        <!-- Sing in  Form -->
        <section class="sign-in mt-5">
            <div class="container">
                <p style="text-align: center;padding-top:10px;font-weight:bold;"><a style="text-decoration:none;color:#6dabe4; " href="index.php">Home</a>/<span style="font-weight:bolder;">Registration Page</span></p>
                <div class="signin-content">
                    <div class="signin-image mt-5">
                        <figure><img src="assets/img/logDoctor2" alt="sing up image"></figure>
                        <a href="login.php" class="signup-image-link">Login <span class="text-primary"> You Have Already Hav'nt Account</span></a>
                    </div>

                    <div class="signin-form">
                        <h2 class="form-title" style="color: #6dabe4;">Registration Form</h2>
                        <form method="POST" class="register-form" id="login-form" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="your_name"><i class="fa fa-user"></i></label>
                                <input type="text" name="pName" placeholder="Your Name" />
                            </div>
                            <div class="form-group">
                                <label for="your_pass"><i class="fa  fa-envelope"></i></label>
                                <input type="email" name="pEmail" placeholder="E-Mail example@abc.com" />
                            </div>
                            <div class="form-group">
                                <label for="your_name"><i class="fa fa-lock"></i></label>
                                <input type="password" name="pPass" placeholder="Your Password" />
                            </div>
                            <div class="form-group">
                                <label for="your_pass"><i class="fa fa-picture-o"></i></label>
                                <input type="file" name="pImg" class="form-control-file" id="your_pass" placeholder="Password" />
                            </div>
                            <div class="form-group">
                                <label for="your_pass"><i class="fa fa-mobile font-weight-bolder" style="font-size: 20px;"></i></label>
                                <input type="number" name="pContact" placeholder="Your Contact Number" />
                            </div>
                            <div class="form-group">
                                <label for="your_pass"><i class="fa fa-address-card-o font-weight-bolder" style="font-size: 15px;"></i></label>
                                <input type="text" name="pAddress" placeholder="Your Address" />
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="regBtn" id="signin" class="form-submit btn btn-block w-100" value="Register Here !" />
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