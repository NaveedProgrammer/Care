<?php
include "../config.php";
if (isset($_POST['btnAddPro'])) {
    $name = $_POST['txtName'];
    $cat = $_POST['txtCat'];
    $price = $_POST['txtPrice'];
    $qty = $_POST['txtQty'];

    $img = addslashes(file_get_contents($_FILES['image']['tmp_name']));
    $query = "INSERT INTO `doctor_tbl`(`DoctorName`, `DoctorEmail`, `DoctorPassword`, `DoctorImage`, `DoctorSpeciality`, `DoctorAvailability`, `DoctorCity`, `DoctorContact`) VALUES ('[value-1]','[value-2]','[value-3]','[value-4]','[value-5]','[value-6]','[value-7]','[value-8]')";
    $result = mysqli_query($conn, $query);
    if ($result) {
        echo "<script>alert('New Doctor Added Successfully....!');</script>";
    } else {
        echo "<script>alert('New Doctor Added Failed....!');</script>";
    }
}
$s_query="SELECT * From `speciality_tbl`";
$s_result=mysqli_query($conn,$s_query);
$a_query="SELECT * From `avialablity_tbl`";
$a_result=mysqli_query($conn,$a_query);
include "header.php";
?>
<div class="container">
    <div class="row mt-5">
        <h1 class=" text-center fw-bold text-primary opacity-50">ADD NEW Doctor</h1>
        <div class="col-sm-6 col-lg-8 m-auto">
            <form method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Doctor Name</label>
                    <input type="text" class="form-control" name="name">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Doctor E-Mail</label>
                    <input type="text" class="form-control" name="email">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Doctor Password</label>
                    <input type="text" class="form-control" name="pass">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Doctor Profile Image</label>
                    <input type="file" class="form-control-file" name="img">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Doctor Speciality</label>
                    <select name="speciality" class="form-control">
                        <option value="">Select Speciality</option>
                        <?php
                        while ($spec_row = mysqli_fetch_assoc($spec_result)) {
                        ?>
                            <option value="<?php echo $spec_row['SpecialityID'] ?>"> <?php echo $spec_row['SpecialityName'] ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Doctor Timimg</label>
                    <select name="availablity" class="form-control">
                        <option value="">Select Timming</option>
                        <?php
                        while ($a_row = mysqli_fetch_assoc($a_result)) {
                        ?>
                        <option value="<?php echo $a_row['AvialablityID']?>"> <?php echo $a_row['AvialablityDay'] ?> | <?php echo $a_row['AvialablityTime'] ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Doctor City</label>
                    <input type="text" class="form-control" name="txtName">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Doctor Contact</label>
                    <input type="text" class="form-control" name="txtName">
                </div>
                <input type="submit" class="btn btn-primary btn-block" name="btnAddPro" value="ADD PRODUCT">
            </form>
        </div>
    </div>
</div>
<?php
include "footer.php";
?>