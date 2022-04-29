<?php include 'header.php';
include 'config.php';
//   if (isset($_GET['del_id'])) {
//     $id = $_GET['del_id'];
//     $conn = mysqli_connect('localhost', 'root', '', 'abcinstitute');
//     if ($conn) {
//       $deleteQuery = "DELETE  FROM `student`WHERE `std_id`='$id' ";
//       $result = mysqli_query($conn, $deleteQuery);
//       header('location:stdForm.php');

//     } 
//     else {
//       echo "<script>alert('OOPs DB Connection Failed...!');</script>";
//     }
//   }

if (isset($_POST['patientBtnUpdate'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $contact = $_POST['contact'];
    $address = $_POST['address'];
    if ($conn) {
        if (empty($_FILES['img']['name'])) {
            $PatientUpdateQuery = "UPDATE `patient_tbl` SET `PatientName`='$name',`PatientEmail`='$email',`PatientPassword`='$pass',`PatientContact`='$contact',`PatientAddress`='$address' WHERE `PatientID`='$id'";
           $result = mysqli_query($conn, $PatientUpdateQuery);
            if ($result) {
                $_SESSION['msg'] = "Your Profile Updated!";
            } else {
                $_SESSION['msg'] = "Your Profile Updated Failed...!";
            }
        } else {
            $p_img = addslashes(file_get_contents($_FILES['img']['tmp_name']));
            $PatientUpdateQuery = "UPDATE `patient_tbl` SET `PatientName`='$name',`PatientEmail`='$email',`PatientPassword`='$pass',`PatientContact`='$contact',`PatientImage`='$p_img',`PatientAddress`='$address' WHERE `PatientID`='$id'";
            
            $result = mysqli_query($conn, $PatientUpdateQuery);
            if ($result) {
                $_SESSION['msg'] = "Your Profile Updated!";
            } else {
                $_SESSION['msg'] = "Your Profile Updated Failed...!".mysqli_error($conn);
            }
        }
    } else {
        $_SESSION['msg'] = "OOPs DB Connection Failed...!";
    }
}
if (isset($_GET['p_id'])) {
    $id = $_GET['p_id'];
    if ($conn) {
        $findPatient = "SELECT * FROM `patient_tbl`WHERE `PatientID`='$id' ";
        $result = mysqli_query($conn, $findPatient);
        $row = mysqli_fetch_assoc($result);
    } else {
        $_SESSION['msg'] = "DB Connection Failed...!";
    }
} else {
    $_SESSION['msg'] = "Patient Not Find";
}

?>
<?php
if(isset($_SESSION['msg']) && $_SESSION['msg'] !== null)
{
echo "<script>alert('" . $_SESSION['msg'] . "');</script>";
unset($_SESSION['msg']);
}
?>
<div class="container rounded bg-white mt-5 mb-5">
    <div class="row">
        <div class="col-md-5 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                <img class="rounded-circle mt-5" src="data:image/jpg;base64,<?php echo base64_encode($row['PatientImage']); ?>" width="200px" height="200px">
                <span class="font-weight-bold"><?php echo $row['PatientName'] ?></span>
                <span class="text-black-50"><?php echo $row['PatientEmail'] ?></span>
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
                            <input type="hidden" class="form-control" name="id" placeholder="enter phone number" value="<?php echo $row['PatientID'] ?>">
                        </div>
                        <div class="col-md-12">
                            <label class="labels">Address</label>
                            <input type="text" class="form-control" name="name" placeholder="enter Name" value="<?php echo $row['PatientName'] ?>">
                        </div>
                        <div class="col-md-12">
                            <label class="labels">Email ID</label>
                            <input type="email" class="form-control" name="email" placeholder="enter email id" value="<?php echo $row['PatientEmail'] ?>">
                        </div>
                        <div class="col-md-12">
                            <label class="labels">Password</label>
                            <input type="text" class="form-control" name="pass" placeholder="education" value="<?php echo $row['PatientPassword'] ?>">
                        </div>
                        <br>
                        <div class="col-md-12">
                            <label>Profile Image</label>
                            <input type="file" name="img" class="form-control-file">
                        </div>
                        <div class="col-md-12">
                            <label class="labels">PhoneNumber</label>
                            <input type="number" class="form-control" name="contact" placeholder="enter phone number" value="<?php echo $row['PatientContact'] ?>">
                        </div>
                        <div class="col-md-12">
                            <label class="labels">Address</label>
                            <input type="text" class="form-control" name="address" placeholder="enter address" value="<?php echo $row['PatientAddress'] ?>">
                        </div>
                    </div><br>
                    <input type="submit" name="patientBtnUpdate" class="w-100 btn-block btn-lg btn btn-primary profile-button" value="Save Profile">
                </form>

            </div>
        </div>
    </div>
</div>
<?php include 'footer.php' ?>