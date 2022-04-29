<?php
include "../config.php";
$query="SELECT * FROM `admin_tbl`";
$result=mysqli_query($conn,$query);
include "header.php";
?>
<div class="container">
    <table class="table table-responsive table-bordered table-striped">
        <thead>
            <tr>
                <th>Admin Name</th>
                <th>Admin E-MAil</th>
                <th>Admin Password</th>
                <th>Admin Image</th>
                <th>Admin Contact</th>
                <th>Actions</th>
            </tr>
        </thead>
        <?php
        while($row=mysqli_fetch_assoc($result))
        {
        ?>
         <tr>
                <td><?php echo $row['AdminName'] ?></td>
                <td><?php echo $row['AdminEmail'] ?></td>
                <td><?php echo $row['AdminPassword'] ?></td>
                <td><img src="data:image/jpg;base64,<?php echo base64_encode($row['AdminImage']); ?>" alt="AdminImage" style="width:80px;height:80px;background:transparent;"></td>
                <td><?php echo $row['AdminContact'] ?></td>
                <td><a class="dropdown-item" href="AdminEdit.php?del_id=<?php echo $row['AdminID'] ?>"><i class="fas fa-trash text-black"></i></a>
                <a class="dropdown-item" href="AdminEdit.php?p_id=<?php echo $row['AdminID'] ?>"><i class="fas fa-edit text-black"></i></a></td>
            </tr>
        <?php }
        ?>
    </table>
</div>
<?php
include "footer.php";
?>