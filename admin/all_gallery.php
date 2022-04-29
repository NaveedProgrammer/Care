<?php
    session_start();

    if(!isset($_SESSION['a_id']))
    {
        header('location:login.php');
    }

    include('header.php');
    include('../OOP.php');
    $db=new Database();

    $db->select('gallery',"*","`g_status`='active'"); 
       
 ?>

<a href="add_gallery.php" class="btn btn-primary" style="margin-left:3%">Add More Images</a>
<div class="card">
             
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>

                    <th>Image Id</th>
                    <th>Image Title</th>
                    <th>Image Text</th>
                    <th>Image</th>
                    <th>Image Status</th>
                    <th>Actions</th>
                    
                  </tr>
                  </thead>
                  <tbody>
<?php
  while($row=mysqli_fetch_array($db->result))
  {
?>
    <tr>

      <td><?php echo $row['g_id'];?></td>
      <td><?php echo $row['g_title'];?></td>
      <td><?php echo $row['g_text'];?></td>
      <td><img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['g_image']);?>" width="120px" height="150px"/></td>
      <td><?php echo $row['g_status'];?></td>
      <td>
          <a href="delete_gallery.php?id=<?php echo $row[0];?>"><i class="fa fa-trash fa-lg" style="margin-left:10px"></i></a>
      </td>  

      
    </tr>
<?php
  }
?>
    </tbody>
    <tfoot>
    <tr>
                    <th>Image Id</th>
                    <th>Image Title</th>
                    <th>Image Text</th>
                    <th>Image</th>
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