<?php
    session_start();

    if(!isset($_SESSION['a_id']))
    {
        header('location:login.php');
    }
    
    include('../OOP.php');
    $db=new Database();

    if(isset($_POST['BtnAdd']))
    {
        $title=$_POST['title'];
        $txt=$_POST['txt'];
        $image=addslashes(file_get_contents($_FILES['Img']['tmp_name']));
        $status="active";
       
        $db->insert('gallery',['g_title'=>$title,'g_text'=>$txt,'g_image'=>$image,'g_status'=>$status]);
       
        if($db->result)
        {
            echo "<script>alert('Record Added!');</script>";
            header('location:all_gallery.php');
        }
        else
        {
            echo "<br>Error: ".mysqli_error($db->conn);
        }
    
    }

    include('header.php'); 
  
?>


<div class="container">
  <form method="post" enctype="multipart/form-data">
    <div class="row">
      <div class="col-25">
        <label for="fname">Slide Title</label>
      </div>
      <div class="col-75">
        <input type="text" id="fname" name="title" placeholder="Enter Image Title here.." required>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="fname">Slide Text</label>
      </div>
      <div class="col-75">
        <input type="text" id="fname" name="txt" placeholder="Enter Image Text here.." required>
      </div>
    </div>
    
    <div class="row">
      <div class="col-25">
        <label for="country">Image</label>
      </div>
      <div class="col-75">
      <input type="file" id="lname" name="Img" required>
      </div>
    </div>
    
    <div class="row">
      <input type="submit" value="Submit" name="BtnAdd">
    </div>
  </form>
</div>

<?php 
    include('footer.php');
?>