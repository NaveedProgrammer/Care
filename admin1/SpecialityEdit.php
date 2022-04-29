<?php include 'header.php';
include '../config.php';
  if (isset($_GET['del_id'])) {
    $id = $_GET['del_id'];
    
    $deleteQuery = "DELETE  FROM `speciality_tbl`WHERE `SpecialityID`='$id' ";
    $result = mysqli_query($conn, $deleteQuery);
    if($result)
    {
        header("location:index.php");
    }
    else
    {
        echo "<script>alert('Admin Deleted Failed...!')</script>";
    }
  }

if (isset($_POST['patientBtnUpdate'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    if ($conn) {
        if (empty($_FILES['img']['name'])) {
            $PatientUpdateQuery = "UPDATE `speciality_tbl` SET `AdminName`='$name',`AdminEmail`='$email',`AdminPassword`='$pass',`AdminContact`='$contact' WHERE `AdminID`='$id'";
            $result = mysqli_query($conn, $PatientUpdateQuery);
            if ($result) {
                echo "<script>alert('Your Profile Updated!')</script>";
            } else {
                echo "<script>alert('Your Profile Updated Failed...!')</script>";
            }
        } else {
            $p_img = addslashes(file_get_contents($_FILES['img']['tmp_name']));
            $PatientUpdateQuery = "UPDATE `Admin_tbl` SET `AdminName`='$name',`AdminEmail`='$email',`AdminImage`='$p_img',`AdminPassword`='$pass',`AdminContact`='$contact' WHERE `AdminID`='$id'";

            $result = mysqli_query($conn, $PatientUpdateQuery);
            if ($result) {
                echo "<script>alert('Your Profile Updated!')</script>";
            } else {
                echo "<script>alert('Your Profile Updated Failed...!')</script>";
            }
        }
    } else {
        $_SESSION['msg'] = "OOPs DB Connection Failed...!";
    }
}
if (isset($_GET['a_id'])) {
    $id = $_GET['a_id'];
    if ($conn) {
        $findPatient = "SELECT * FROM `speciality_tbl`WHERE `SpecialityID`='$id' ";
        $result = mysqli_query($conn, $findPatient);
        $row = mysqli_fetch_assoc($result);
        echo "<script>alert('".$row ['AdminName']."')</script>";
    } else {
        $_SESSION['msg'] = "DB Connection Failed...!";
    }
} else {
    $_SESSION['msg'] = "Patient Not Find";
}

?>
<div class="container rounded bg-white ">
    <div class="row">
        <div class="col-md-5 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                <img class="rounded-circle mt-5" src="data:image/jpg;base64,<?php echo base64_encode($row['AdminImage']); ?>" width="200px" height="200px">
                <span class="font-weight-bold"><?php echo $row['AdminName'] ?></span>
                <span class="text-black-50"><?php echo $row['AdminEmail'] ?></span>
            </div>
        </div>
        <div class="col-md-7 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Profile Settings</h4>
                </div>
                <form method="post" enctype="multipart/form-data">
                    <div class="row mt-3">
                        <div class="col-md-12">
                            <input type="hidden" class="form-control" name="id" placeholder="enter phone number" value="<?php echo $row['AdminID'] ?>">
                        </div>
                        <div class="col-md-12">
                            <label class="labels">Address</label>
                            <input type="text" class="form-control" name="name" placeholder="enter Name" value="<?php echo $row['AdminName'] ?>">
                        </div>
                        <div class="col-md-12">
                            <label class="labels">Email ID</label>
                            <input type="email" class="form-control" name="email" placeholder="enter email id" value="<?php echo $row['AdminEmail'] ?>">
                        </div>
                        <div class="col-md-12">
                            <label class="labels">Password</label>
                            <input type="text" class="form-control" name="pass" placeholder="education" value="<?php echo $row['AdminPassword'] ?>">
                        </div>
                        <br>
                        <div class="col-md-12">
                            <label>Profile Image</label>
                            <input type="file" name="img" class="form-control-file">
                        </div>
                        <div class="col-md-12">
                            <label class="labels">PhoneNumber</label>
                            <input type="number" class="form-control" name="contact" placeholder="enter phone number" value="<?php echo $row['AdminContact'] ?>">
                        </div>  
                    </div><br>
                    <input type="submit" name="patientBtnUpdate" class="w-100 btn-block btn-lg btn btn-primary profile-button" value="Save Profile">
                </form>

            </div>
        </div>
    </div>
</div>
<?php include 'footer.php' ?>