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
    $result=mysqli_query($db->conn,"Select * from `doctor` join `specialization` on doctor.spec_idFK=specialization.sp_id where `doc_status`='nonactive'");
 ?>

<a href="removed_doctor.php" class="btn btn-primary" style="margin-left:3%">Deleted Record</a>
<div class="card">
             
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>

                    <th>Doctor Id</th>
                    <th>Doctor Name</th>
                    <th>Doctor email</th>
                    <th>Doctor number</th>
                    <th>Doctor address</th>
                    <th>Doctor qualification</th>
                    <th>Doctor password</th>
                    <th>Doctor's specialization</th>
                    <th>Doctor image</th>
                    <th>Doctor status</th>
                   
                    
                  </tr>
                  </thead>
                  <tbody>
<?php
  while($row=mysqli_fetch_array($result))
  {
?>
    <tr>

      <td><?php echo $row['doc_id'];?></td>
      <td><?php echo $row['doc_name'];?></td>
      <td><?php echo $row['doc_email'];?></td>
      <td><?php echo $row['doc_number'];?></td>
      <td><?php echo $row['doc_address'];?></td>
      <td><?php echo $row['doc_qualification'];?></td>
      <td><?php echo $row['doc_password'];?></td>
      <td><?php echo $row['sp_name'];?></td>
      <td><img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['doc_image']);?>" width="120px" height="150px"/></td>
      <td><?php echo $row['doc_status'];?></td>
       
      
      
    </tr>
<?php
  }
?>
    </tbody>
    <tfoot>
    <tr>

    
                    <th>Doctor Id</th>
                    <th>Doctor Name</th>
                    <th>Doctor email</th>
                    <th>Doctor number</th>
                    <th>Doctor address</th>
                    <th>Doctor qualification</th>
                    <th>Doctor password</th>
                    <th>Doctor's specialization</th>
                    <th>Doctor image</th>
                    <th>Doctor status</th>
             
    </tr>
    </tfoot>
  </table>
</div>
<!-- /.card-body -->
</div>

<?php
   include('footer.php');
 ?>