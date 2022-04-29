<?php
    session_start();

    if(!isset($_SESSION['a_id']))
    {
        header('location:login.php');
    }

    include('header.php');
    include('../OOP.php');
    $db=new Database();

    $db->select('patient',"*","`pt_status`='active'"); 
    
       
 ?>

<a href="removed_patient.php" class="btn btn-primary" style="margin-left:3%">Deleted Record</a>
<div class="card">
             
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>

                    <th>Patient Id</th>
                    <th>Patient Name</th>
                    <th>Patient Disease</th>
                    <th>Date-of-Birth</th>
                    <th>Patient Email</th>
                    <th>Patient Phone</th>
                    <th>Patient Password</th>
                    <th>Patient Status</th>
                    <th>Action</th>
                    
                  </tr>
                  </thead>
                  <tbody>
<?php
  while($row=mysqli_fetch_array($db->result))
  {
?>
    <tr>

      <td><?php echo $row['pt_id'];?></td>
      <td><?php echo $row['pt_name'];?></td>
      <td><?php echo $row['pt_disease'];?></td>
      <td><?php echo $row['pt_dob'];?></td>
      <td><?php echo $row['pt_email'];?></td>
      <td><?php echo $row['pt_contact'];?></td>
      <td><?php echo $row['pt_password'];?></td>
      <td><?php echo $row['pt_status'];?></td>

      <td>
          <a href="delete_patient.php?id=<?php echo $row[0];?>"><i class="fa fa-trash fa-lg" style="margin-left:10px"></i></a>
      </td>  

      
    </tr>
<?php
  }
?>
    </tbody>
    <tfoot>
    <tr>

                    <th>Patient Id</th>
                    <th>Patient Name</th>
                    <th>Patient Disease</th>
                    <th>Date-of-Birth</th>
                    <th>Patient Email</th>
                    <th>Patient Phone</th>
                    <th>Patient Password</th>
                    <th>Patient Status</th>
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