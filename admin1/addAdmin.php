<?php
include "../config.php";
if (isset($_POST['btnAddAdmin'])) {
    $name = $_POST['a_name'];
    $email = $_POST['a_email'];
    $pass = $_POST['a_pass'];
    $contact = $_POST['a_contact'];

    $img = addslashes(file_get_contents($_FILES['a_img']['tmp_name']));
    $query = "INSERT INTO `admin_tbl`(`AdminName`, `AdminEmail`, `AdminPassword`, `AdminImage`, `AdminContact`) VALUES ('$name','$email','$pass','$img','$contact')";
    $result = mysqli_query($conn, $query);
    if ($result) {
        echo "<script>alert('Admin Added Successfully....!');</script>";
    } else {
        echo "<script>alert('Admin Added Failed....!');</script>";
    }
}
include "header.php";
?>
<div class="container">
    <div class="row mt-5">
        <h1 class=" text-center fw-bold text-primary opacity-50">Add Admin</h1>
        <div class="col-sm-6 col-lg-8 m-auto">
            <form method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Admin Name</label>
                    <input type="text" class="form-control" name="a_name">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Admin E-Mail</label>
                    <input type="text" class="form-control" name="a_email">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Admin Password</label>
                    <input type="text" class="form-control" name="a_pass">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Admin Profile Image</label>
                    <input type="file" class="form-control-file" name="a_img">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Admin Contact</label>
                    <input type="text" class="form-control" name="a_contact">
                </div>
                <input type="submit" class="btn btn-primary btn-block" name="btnAddAdmin" value="ADD Admin">
            </form>
        </div>
    </div>
</div>
<?php
include "footer.php";
?>