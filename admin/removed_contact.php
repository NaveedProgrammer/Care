<?php
    session_start();

    if(!isset($_SESSION['a_id']))
    {
        header('location:login.php');
    }

    include('header.php');
    include('../OOP.php');
    $db=new Database();

    $db->select('contact',"*","`ct_status`='nonactive'"); 
       
 ?>
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
                    
      
    </tr>
    </tfoot>
  </table>
</div>
<!-- /.card-body -->
</div>

<?php
   include('footer.php');
 ?>