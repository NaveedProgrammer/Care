<?php
include "../config.php";
if(isset($_POST['btnAddCat']))
{
    $cat_name=$_POST['catName'];

    $query="INSERT INTO `tbl_cat`(`catName`) VALUES ('$cat_name')";
    $result=mysqli_query($conn,$query);
    if($result)
    {
        echo "<script>alert('Category Added Successfully....!');</script>";
        header("location:index.php");
    }
    else
    {
        echo "<script>alert('Category Added Failed....!');</script>";
    }
}
include "header.php";
?>
<div class="container">
    <div class="row mt-5">
        <h1 class=" text-center fw-bold text-success opacity-50">ADD NEW CATEGORY</h1>
        <div class="col-sm-6 col-lg-8 m-auto">
        <form method="POST">
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Category Name</label>
                <input type="text" class="form-control" name="catName">
            </div>
            <input type="submit" class="btn btn-primary btn-block" name="btnAddCat" value="ADD CATEGORY">
        </form>
        </div>
    </div>
</div>
<?php
include "footer.php";
?>