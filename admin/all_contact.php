<?php
    session_start();

    if(!isset($_SESSION['a_id']))
    {
        header('location:login.php');
    }

    include('header.php');
    include('../OOP.php');
    $db=new Database();

    $db->select('contact',"*","`ct_status`='active'"); 
       
 ?>

<a href="removed_contact.php" class="btn btn-primary" style="margin-left:3%">Deleted Record</a>


<div class="card">
             
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>

                    <th>Contact Id</th>
                    <th>Contact Name</th>
                    <th>Contact Email</th>
                    <th>Contact Phone</th>
                    <th>Contact Message</th>
                    <th>Contact status</th>
                    <th>Action</th>
                    
                  </tr>
                  </thead>
                  <tbody>
<?php
  while($row=mysqli_fetch_array($db->result))
  {
?>
    <tr>

      <td><?php echo $row['ct_id'];?></td>
      <td><?php echo $row['ct_name'];?></td>
      <td><?php echo $row['ct_email'];?></td>
      <td><?php echo $row['ct_phone'];?></td>
      <td><?php echo $row['ct_msg'];?></td>
      <td><?php echo $row['ct_status'];?></td>

      <td>
          <a href="delete_contact.php?id=<?php echo $row[0];?>"><i class="fa fa-trash fa-lg" style="margin-left:10px"></i></a>
      </td>  
      
    </tr>
<?php
  }
?>
    </tbody>
    <tfoot>
    <tr>

                    <th>Contact Id</th>
                    <th>Contact Name</th>
                    <th>Contact Email</th>
                    <th>Contact Phone</th>
                    <th>Contact Message</th>
                    <th>Contact status</th>
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