<?php
    session_start();

    if(!isset($_SESSION['a_id']))
    {
        header('location:login.php');
    }

    include('header.php');
    include('../OOP.php');
    $db=new Database();

    $db->select('specialization',"*","`sp_status`='active'"); 
       
 ?>

<a href="removed_specialization.php" class="btn btn-primary" style="margin-left:3%">Deleted Record</a>
<div class="card">
             
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>

                    <th>Specialization Id</th>
                    <th>Specialization Name</th>
                    <th>Specialization Description</th>
                    <th>Specialization Image</th>
                    <th>Specialization Status</th>
                    <th>Action</th>
                    
                  </tr>
                  </thead>
                  <tbody>
<?php
  while($row=mysqli_fetch_array($db->result))
  {
?>
    <tr>

      <td><?php echo $row['sp_id'];?></td>
      <td><?php echo $row['sp_name'];?></td>
      <td><?php echo $row['sp_descrip'];?></td>
      <td><img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['sp_image']);?>" width="120px" height="150px"/></td>
      <td><?php echo $row['sp_status'];?></td>
      <td>
          <a href="edit_specialization.php?id=<?php echo $row[0];?>"><i class="fas fa-edit fa-lg"></i></a>
          <a href="delete_specialization.php?id=<?php echo $row[0];?>"><i class="fa fa-trash fa-lg" style="margin-left:10px"></i></a>
      </td>  
      
      
    </tr>
<?php
  }
?>
    </tbody>
    <tfoot>
    <tr>

                    <th>Specialization Id</th>
                    <th>Specialization Name</th>
                    <th>Specialization Description</th>
                    <th>Specialization Image</th>
                    <th>Specialization Status</th>
                    <th>Action</th>
      
    </tr>
    </tfoot>
  </table>
</div>
<!-- /.card-body -->
</div>

<?php
   include('footer.php');
 ?>