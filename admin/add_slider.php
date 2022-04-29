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
        $link=$_POST['link'];
        $btn=$_POST['btn'];
        $image=addslashes(file_get_contents($_FILES['Img']['tmp_name']));
        $status="active";
       
        $db->insert('slider',['s_title'=>$title,'s_text'=>$txt,'s_link'=>$link,'s_button'=>$btn,'s_image'=>$image,'s_status'=>$status]);
       
        if($db->result)
        {
            echo "<script>alert('Record Added!');</script>";
            header('location:all_slider.php');
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
        <input type="text" id="fname" name="title" placeholder="Enter Slider Detail here.." required>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="fname">Slide Text</label>
      </div>
      <div class="col-75">
        <input type="text" id="fname" name="txt" placeholder="Enter Slider Detail here.." required>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="fname">Slide Link</label>
      </div>
      <div class="col-75">
        <input type="text" id="fname" name="link" placeholder="Enter Slider Detail here.." required>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="fname">Slide Button</label>
      </div>
      <div class="col-75">
        <input type="text" id="fname" name="btn" placeholder="Enter Slider Detail here.." required>
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