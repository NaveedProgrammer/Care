<?php
    session_start();
    if(!isset($_SESSION['a_id']))
    {
        header('location:../login.php');
    }

    include('../FunctionDB.php');
    $db=new Database();

    if(isset($_POST['BtnAdd']))
    {
        $name=$_POST['myCity'];
        $db->insert('city_tbl',['CityName'=>$name]);
        if($db->result)
        {
            echo "<script>alert('City Added!');</script>";
        }
        else
        {
            echo "<script>alert('Something Went Wrong!');</script>";
        }
    
    }

    include('header.php'); 
  
?>




<div class="container">
  <form method="POST">
    <div class="row">
      <div class="col-25">
        <label for="fname">City Name</label>
      </div>
      <div class="col-75">
        <input type="text" id="fname" name="myCity" placeholder="Enter City Name Here.. ">
      </div>
    </div>
    
    
    <div class="row">
     
      
    </div>
    <div class="row">
      <input type="submit" value="Submit" name="BtnAdd">
    </div>
  </form>
</div>

<?php
     include('footer.php');
?>