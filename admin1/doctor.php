<?php
include "../config.php";
$query="SELECT * FROM `tbl_doctor`";
$result=mysqli_query($conn,$query);
include "header.php";
?>
<div class="container">
    <div class="row">
        <?php
        while($row=mysqli_fetch_assoc($result))
        {
        ?>
        <div class="col-sm-4">
            <div class="card" style="width: 18rem;">
                <img class="card-img-top img-fluid "style="width:100%;height:300px;" src="data:image/jpg;base64,<?php echo base64_encode($row['proImage']); ?>" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $row['proName'] ?></h5>
                    <p class="card-text"><?php echo $row['proPrice']?></p>
                    <div class="text-center">
                    <a href="editProduct.php?id=<?php echo $row['proId'] ?>" class="btn btn-primary">EDIT</a>&nbsp;
                    <a href="editProduct.php?del_id=<?php echo $row['proId'] ?>" class="btn btn-danger">DELETE</a>
                </div>
                </div>
            </div>
        </div>
        <?php }
        ?>
    </div>
</div>
<?php
include "footer.php";
?>