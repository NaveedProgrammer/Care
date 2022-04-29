<?php
    session_start();

    if(!isset($_SESSION['a_id']))
    {
        header('location:login.php');
    }

    include('header.php');
    include('../OOP.php');
    $db=new Database();

    $db->select('slider',"*","`s_status`='active'"); 
       
 ?>

<a href="add_slider.php" class="btn btn-primary" style="margin-left:3%">Add More Slides</a>
<a href="removed_slider.php" class="btn btn-primary" style="margin-left:3%">Deleted Slides</a>
<div class="card">
             
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>

                    <th>Slide Id</th>
                    <th>Slide Title</th>
                    <th>Slide Text</th>
                    <th>Slide Link</th>
                    <th>Slide Button</th>
                    <th>Slide Image</th>
                    <th>Slide Status</th>
                    <th>Actions</th>
                    
                  </tr>
                  </thead>
                  <tbody>
<?php
  while($row=mysqli_fetch_array($db->result))
  {
?>
    <tr>

      <td><?php echo $row['s_id'];?></td>
      <td><?php echo $row['s_title'];?></td>
      <td><?php echo $row['s_text'];?></td>
      <td><?php echo $row['s_link'];?></td>
      <td><?php echo $row['s_button'];?></td>
      <td><img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['s_image']);?>" width="120px" height="150px"/></td>
      <td><?php echo $row['s_status'];?></td>
      <td>
          <a href="delete_slider.php?id=<?php echo $row[0];?>"><i class="fa fa-trash fa-lg" style="margin-left:10px"></i></a>
      </td>  

      
    </tr>
<?php
  }
?>
    </tbody>
    <tfoot>
    <tr>
                    <th>Slide Id</th>
                    <th>Slide Title</th>
                    <th>Slide Text</th>
                    <th>Slide Link</th>
                    <th>Slide Button</th>
                    <th>Slide Image</th>
                    <th>Slide Status</th>
                    <th>Actions</th>
      
    </tr>
    </tfoot>
  </table>
</div>
<!-- /.card-body -->
</div>

<?php
   include('footer.php');
 ?>