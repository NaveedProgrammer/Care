<?php
include "../config.php";
$query="SELECT * FROM `speciality_tbl`";
$result=mysqli_query($conn,$query);
include "header.php";
?>
<div class="container">
    <table class="table table-responsive table-bordered table-striped">
        <thead>
            <tr>
                <th>Speciality Name</th>
                <th>Admin Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <?php
        while($row=mysqli_fetch_assoc($result))
        {
        ?>
         <tr>
                <td><?php echo $row['SpecialityName'] ?></td>
                <td><img src="data:image/jpg;base64,<?php echo base64_encode($row['SpecialityImage']); ?>" alt="AdminImage" style="width:80px;height:80px;background:transparent;"></td>
                <td><a class="dropdown-item" href="SpecialityEdit.php?del_id=<?php echo $row['AdminID'] ?>"><i class="fas fa-trash text-black"></i></a>
                <a class="dropdown-item" href="SpecialityEdit.php?s_id=<?php echo $row['AdminID'] ?>"><i class="fas fa-edit text-black"></i></a></td>
            </tr>
        <?php }
        ?>
    </table>
</div>
<?php
include "footer.php";
?>