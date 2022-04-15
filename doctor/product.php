<?php
include "../config.php";
if(isset($_POST['btnAddPro']))
{
    $name=$_POST['txtName'];
    $cat=$_POST['txtCat'];
    $price=$_POST['txtPrice'];
    $qty=$_POST['txtQty'];

    $img=addslashes(file_get_contents($_FILES['image']['tmp_name']));
    $query="INSERT INTO `tbl_product`( `proName`, `proCategory`, `proImage`, `proPrice`, `proQty`)VALUES  ('$name','$cat','$img','$price','$qty')";
    $result=mysqli_query($conn,$query);
    if($result)
    {
        echo "<script>alert('New Product Added Successfully....!');</script>";
        header("location:Index.php");
    }
    else
    {
        echo mysqli_error($conn);
        echo "<script>alert('New Product Added Failed....!');</script>";
    }
}

$cat_query="SELECT * From `tbl_cat`";
$cat_result=mysqli_query($conn,$cat_query);
include "header.php";
?>
<div class="container">
    <div class="row mt-5">
        <h1 class=" text-center fw-bold text-primary opacity-50">ADD NEW PRODUCT</h1>
        <div class="col-sm-6 col-lg-8 m-auto">
        <form method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Product Name</label>
                <input type="text" class="form-control" name="txtName">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Product Category</label>
                <select name="txtCat" class="form-control">
                    <option value="">Select Category</option>
                    <?php
                    while($cat_row=mysqli_fetch_assoc($cat_result)){
                    ?>
                    <option value="<?php echo $cat_row['catId'] ?>"> <?php echo $cat_row['catName'] ?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Product Image</label>
                <input type="file" class="form-control" name="image">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Product Price</label>
                <input type="number" class="form-control" name="txtPrice">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Product Quantity</label>
                <input type="number" class="form-control" name="txtQty">
            </div>
            <input type="submit" class="btn btn-primary btn-block" name="btnAddPro" value="ADD PRODUCT">
        </form>
        </div>
    </div>
</div>
<?php
include "footer.php";
?>