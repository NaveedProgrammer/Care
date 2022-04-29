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
    $result=mysqli_query($db->conn,"Select * from `appointment` join `doctor` on appointment.doc_idFK=doctor.doc_id where `appoint_status`='nonactive'");
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
                    <th>Patient Phone</th>
                    <th>Patient Email</th>
                    <th>Patient Disease</th>
                    <th>Doctor Name</th>
                    <th>Appointment Date</th>
                    <th>Patient Message</th>
                    <th>Patient Status</th>
                    <th>Appointment Status</th>
                    
                    
                   
                    
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
      <td><?php echo $row['patient_phone'];?></td>
      <td><?php echo $row['patient_email'];?></td>
      <td><?php echo $row['patient_disease'];?></td>
      <td><?php echo $row['doc_name'];?></td>
      <td><?php echo $row['apt_date'];?></td>
      <td><?php echo $row['patient_msg'];?></td>
      <td><?php echo $row['pt_status'];?></td>
      <td><?php echo $row['appoint_status'];?></td>

      
      
    </tr>
<?php
  }
?>
    </tbody>
    <tfoot>
    <tr>

            <th>Appointment Id</th>
            <th>Patient Name</th>
            <th>Patient Phone</th>
            <th>Patient Email</th>
            <th>Patient Disease</th>
            <th>Doctor Name</th>
            <th>Appointment Date</th>
            <th>Patient Message</th>
            <th>Patient Status</th>
            <th>Appointment Status</th>
           
            
      
    </tr>
    </tfoot>
  </table>
</div>
<!-- /.card-body -->
</div>

<?php
   include('footer.php');
 ?>