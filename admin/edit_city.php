<?php
       session_start();
       if(!isset($_SESSION['a_id']))
       {
           header('location:login.php');
       }
       
       include('../OOP.php');
       $db=new Database();

        $id=$_GET['id'];

        $db->select('cities',"*","city_id=$id");
        $row=mysqli_fetch_assoc($db->result);
        
        if(isset($_POST['BtnEdit']))
        {
            $name=$_POST['city'];
           
            $db->update('cities',['city_name'=>$name],'city_id',$id);

           

            if($db->result)
            {
                header('location:all_city.php');
            }
            else
            {
                echo "<script>alert('Error : ".mysqli_error($conn)."');</script>";
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
        <input type="text" id="fname" value="<?php echo $row['city_name'];?>" name="city" placeholder="Enter City Name Here.. ">
      </div>
    </div>
    
    
    <div class="row">
      
    </div>
    <div class="row">
      <input type="submit" value="Submit" name="BtnEdit">
    </div>
  </form>
</div>

<?php
     include('footer.php');
?>