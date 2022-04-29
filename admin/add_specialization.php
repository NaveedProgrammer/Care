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
        $name=$_POST['Sname'];
        $description=$_POST['descript'];
        $image=addslashes(file_get_contents($_FILES['Img']['tmp_name']));
        $status="active";

        $nameRegex="/^([a-zA-Z' ]+)$/";  //name validation
     
      if($name=="")
      {
        $error['name']="Name Is Required";
      }else if (!(preg_match($nameRegex, $name)))
      {
        $error['name']="Invalid Name";
      }else
      {
        $error['name']='';
      }
 
      $msgRegex="/^[a-zA-Z]{10,}$/";   //message validation
      
      if($description=="")
      {
        $error['description']="Message Is Required";
      }else if (!(preg_match($msgRegex, $description)))
      {
        $error['description']="Invalid";
      }else
      {
       $error['description']='';
      }
       
      if($error['name']=='' && $error['description']=='')
      {
        $db->insert('specialization',['sp_name'=>$name,'sp_descrip'=>$description,'sp_image'=>$image,'sp_status'=>$status]);
      }

        if($db->result)
        {
            echo "<script>alert('Record Added!');</script>";
            header('location.php');
        }
        else
        {
            echo "<script>alert('Something Went Wrong!');</script>";
        }
    
    }

    include('header.php'); 
  
?>


<div class="container">
  <form method="post" enctype="multipart/form-data">
    <div class="row">
      <div class="col-25">
        <label for="fname">Speciality Name</label>
      </div>
      <div class="col-75">
        <input type="text" id="fname" name="Sname" placeholder="Enter Speciality Name here..">
        <small style="color:red"><?php if(isset($_POST['BtnAdd'])) {echo $error['name'];}?></small>

      </div>
    </div>

    <div class="row">
      <div class="col-25">
        <label for="country">Image</label>
      </div>
      <div class="col-75">
      <input type="file" id="lname" name="Img">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="subject">Description</label>
      </div>
      <div class="col-75">
        <textarea id="subject" name="descript" placeholder="Write Description Here.." style="height:200px"></textarea>
        <small style="color:red"><?php if(isset($_POST['BtnAdd'])) {echo $error['description'];}?></small>

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