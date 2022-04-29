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
    $result=mysqli_query($db->conn,"Select * from `hospitals` join `cities` on hospitals.city_idFK=cities.city_id where `hosp_status`='nonactive'");
 ?>

<a href="removed_hospital.php" class="btn btn-primary" style="margin-left:3%">Deleted Record</a>
<div class="card">
             
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>

                    <th>Hospital Id</th>
                    <th>Hospital Name</th>
                    <th>Hospital City</th>
                    <th>Hospital Address</th>
                    <th>Hospital's Website</th>
                    <th>Hospital's Image</th>
                    <th>Hospital's Status</th>
                   
                    
                  </tr>
                  </thead>
                  <tbody>
<?php
  while($row=mysqli_fetch_array($result))
  {
?>
    <tr>

      <td><?php echo $row['hosp_id'];?></td>
      <td><?php echo $row['hosp_name'];?></td>
      <td><?php echo $row['city_name'];?></td>
      <td><?php echo $row['hosp_location'];?></td>
      <td><?php echo $row['hosp_web'];?></td>
      <td><img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['hosp_image']);?>" width="120px" height="150px"/></td>
      <td><?php echo $row['hosp_status'];?></td>
      
      
      
    </tr>
<?php
  }
?>
    </tbody>
    <tfoot>
    <tr>

        <th>Hospital Id</th>
        <th>Hospital Name</th>
        <th>Hospital City</th>
        <th>Hospital Address</th>
        <th>Hospital's Website</th>
        <th>Hospital's Image</th>
        <th>Hospital's Status</th>
       
      
    </tr>
    </tfoot>
  </table>
</div>
<!-- /.card-body -->
</div>

<?php
   include('footer.php');
 ?>