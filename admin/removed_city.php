<?php
    session_start();

    if(!isset($_SESSION['a_id']))
    {
        header('location:login.php');
    }

    include('header.php');
    include('../OOP.php');
    $db=new Database();

    $db->select('cities',"*","`city_status`='nonactive'"); 
       
?>

<a href="removed_city.php" class="btn btn-primary" style="margin-left:3%">Deleted Record</a>

<div class="card">
             
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>

                    <th>City Id</th>
                    <th>City Name</th>
                    <th>City Status</th>
                    
                  </tr>
                  </thead>
                  <tbody>
<?php
  while($row=mysqli_fetch_array($db->result))
  {
?>
    <tr>

      <td><?php echo $row['city_id'];?></td>
      <td><?php echo $row['city_name'];?></td>
      <td><?php echo $row['city_status'];?></td>
      
    </tr>
<?php
  }
?>
    </tbody>
    <tfoot>
    <tr>

      <th>City Id</th>
      <th>City Name</th>
      <th>City Status</th>
      
    </tr>
    </tfoot>
  </table>
</div>
<!-- /.card-body -->
</div>

<?php
   include('footer.php');
 ?>