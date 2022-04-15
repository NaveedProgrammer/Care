<?php
include '../config.php';
if (isset($_GET['del_id'])) {
    $id = $_GET['del_id'];
    $deleteQuery = "DELETE  FROM `tbl_product` WHERE `proId`='$id' ";
    $result = mysqli_query($conn, $deleteQuery);
    header('location:viewProduct.php');
}
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $findQuery = "SELECT * FROM `tbl_product`WHERE `proId`='$id' ";
    $result = mysqli_query($conn, $findQuery);
    $row = mysqli_fetch_row($result);
}
if (isset($_POST['btn_update_std'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $price = $_POST['course'];
    $qty = $_POST['img'];

    if ($conn) {
        $updateStdQuery = "UPDATE `tbl_product` SET `proName`='$name',`proImage`='$Img',`proPrice`='$price',`proQty`='$qty' WHERE `std_id`='$id'";
        $result = mysqli_query($conn, $updateStdQuery);
        if ($result) {
            echo "<script>alert('Student Updated  Success!');</script>";
            header('location:stdForm.php');
        } else {
            echo "<script>alert('OOPs Student Updated Failed...!');</script>";
        }
    } else {
        echo "<script>alert('OOPs DB Connection Failed...!');</script>";
    }
}

?>
<div class="container">
    <img class="card-img-top img-fluid " style="width:15%;height:200px;" src="data:image/jpg;base64,<?php echo base64_encode($row[3]); ?>" alt="Card image cap">
    <div class="row">
        <div class="col-sm-12">
            <h2 class="text-center fw-bold">Product Updation Form</h2>
            <form method="POST">
                <div class="mb-3 mt-3">
                    <input type="hidden" class="form-control" name="id" value="<?php echo $row[0] ?>">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" id="email" required placeholder="Enter Name" name="name" value="<?php echo $row[1] ?>">
                </div>
                <div class="mb-3 mt-3">
                    <label for="name">Course:</label>
                    <input type="text" class="form-control" id="email" required placeholder="Enter Course" name="price" value="<?php echo $row[2] ?>">
                </div>
                <div class="mb-3 mt-3">
                    <label for="email">Email:</label>
                    <input type="file" class="form-control" id="email" placeholder="Enter email" name="img"">
          </div>
          <div class=" mb-3">
                    <label for="pwd">Password:</label>
                    <input type="textt" class="form-control" id="pwd" required placeholder="Enter password" name="pswd" value="<?php echo $row[4] ?>">
                </div>
                <input type="submit" class="btn btn-primary" name="btn_update_std" value="UPDATE">
            </form>
        </div>
    </div>
</div>