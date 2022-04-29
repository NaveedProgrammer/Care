<?php
    session_start();

    if(!isset($_SESSION['a_id']))
    {
        header('location:login.php');
    }

    include('header.php');
    include('../OOP.php');
    $db=new Database();
    
    $result=mysqli_query($db->conn,"Select * from `doctor` join `availability` on doctor.doc_id=availability.doc_idFK 
    join `hospitals` on availability.hops_idFK=hospitals.hosp_id where `avail_status`='nonactive'");
    
 ?>

<div class="card">
             
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>

                    <th>Available Id</th>
                    <th>Available Day</th>
                    <th>Available Start Time</th>
                    <th>Available End Time</th>
                    <th>Doctor's Name</th>
                    <th>Hospital's Name</th>
                    <th>Availability status</th>
                    
                  </tr>
                  </thead>
                  <tbody>
<?php
  while($row=mysqli_fetch_assoc($result))
  {
?>
    <tr>

      <td><?php echo $row['avail_id'];?></td>
      <td><?php echo $row['avail_day'];?></td>
      <td><?php echo $row['avail_Stime'];?></td>
      <td><?php echo $row['avail_Etime'];?></td>
      <td><?php echo $row['doc_name'];?></td>
      <td><?php echo $row['hosp_name'];?></td>
      <td><?php echo $row['avail_status'];?></td>
    

      
    </tr>
<?php
  }
?>
    </tbody>
    <tfoot>
    <tr>

              <th>Available Id</th>
              <th>Available Day</th>
              <th>Available Start Time</th>
              <th>Available End Time</th>
              <th>Doctor's Name</th>
              <th>Hospital's Name</th>
              <th>Availability status</th>

    </tr>
    </tfoot>
  </table>
</div>
<!-- /.card-body -->
</div>

<?php
   include('footer.php');
 ?>