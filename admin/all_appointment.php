<?php
    session_start();

    if(!isset($_SESSION['a_id']))
    {
        header('location:login.php');
    }

    include('header.php');
    include('../OOP.php');
    $db=new Database();

    //$db->select('hospitals',"*","hospitals join cities on hospitals.city_idFK=cities.city_id"); 
    $result=mysqli_query($db->conn,"Select * from `appointment` join `doctor` on appointment.doc_idFK=doctor.doc_id join `availability` on appointment.appointment=availability.avail_id where `appoint_status`='active'");
 ?>

<a href="removed_appointment.php" class="btn btn-primary" style="margin-left:3%">Deleted Record</a>

<div class="card">
             
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>

                    <th>Appointment Id</th>
                    <th>Patient Name</th>
                    <th>Doctor Name</th>
                    <th>Appointment Date</th>
                    <th>Appointment Day</th>
                    <th>Appointment Time</th>
                    <th>Patient Message</th>
                    <th>Appointment Status</th>
                    <th>Action</th>
                      
                  </tr>
                  </thead>
                  <tbody>
<?php
  while($row=mysqli_fetch_array($result))
  {
?>
    <tr>

      <td><?php echo $row['apt_id'];?></td>
      <td><?php echo $row['patient_name'];?></td>
      <td><?php echo $row['doc_name'];?></td>
      <td><?php echo $row['apt_date'];?></td>
      <td><?php echo $row['avail_day'];?></td>
      <td><?php echo $row['avail_Stime'];?></td>
      <td><?php echo $row['patient_msg'];?></td>
      <td><?php echo $row['appoint_status'];?></td>

      <td>
          <a href="delete_appointment.php?id=<?php echo $row[0];?>"> <i class="fa fa-trash fa-lg" style="margin-left:10px"></i></a>
      </td>  
      
      
    </tr>
<?php
  }
?>
    </tbody>
    <tfoot>
    <tr>

                    <th>Appointment Id</th>
                    <th>Patient Name</th>
                    <th>Doctor Name</th>
                    <th>Appointment Date</th>
                    <th>Appointment Day</th>
                    <th>Appointment Time</th>
                    <th>Patient Message</th>
                    <th>Appointment Status</th>
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