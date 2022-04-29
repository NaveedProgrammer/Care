                                                            <?php
      session_start();
      if(!isset($_SESSION['a_id']))
      {
          header('location:login.php');
      }
      
      include('../OOP.php');
      $db=new Database();

      $id=$_GET['id'];
      $db->update('availability',['avail_status'=>"nonactive"],'avail_id',$id);
      if($db->result)
      {
        echo "<script>alert('Record Removed Successfully!');</script>";
      }
      else
      {
        echo "<script>alert('Something Went Wrong!');</script>";
      }

      header('location:all_availability.php');
?>
