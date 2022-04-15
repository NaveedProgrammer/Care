<?php
include "../config.php";
if (isset($_POST['btnAddSpeciality'])) {
    $name = $_POST['name'];
    $img = addslashes(file_get_contents($_FILES['img']['tmp_name']));
    $query = "INSERT INTO `speciality_tbl`(`specialityName`, `specialityImage`) VALUES ('$name','$img')";
    $result = mysqli_query($conn, $query);
    if ($result) {
        echo "<script>alert('New Speciality Added Successfully....!');</script>";
    } else {
        echo "<script>alert('New Speciality Added Failed....!');</script>";
    }
}
include "header.php";
?>
<div class="container">
    <div class="row mt-5">
        <h1 class=" text-center fw-bold text-primary opacity-50">ADD Speciality Of Doctor</h1>
        <div class="col-sm-6 col-lg-8 m-auto">
            <form method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Doctor Speciality Name</label>
                    <input type="text" class="form-control" name="name">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Doctor Speciality Image</label>
                    <input type="file" class="form-control-file" name="img">
                </div>
                <input type="submit" class="btn btn-primary btn-block" name="btnAddSpeciality" value="ADD PRODUCT">
            </form>
        </div>
    </div>
</div>
<?php
include "footer.php";
?>