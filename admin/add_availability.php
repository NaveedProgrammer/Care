<?php
    session_start();

    include('../FunctionDB.php');
    $db=new Database();

    

    if(isset($_POST['BtnAdd']))
    {
        $day=$_POST['day'];
        $Stime=$_POST['Stime'];
        $Etime=$_POST['Etime'];
        $docFK=$_POST['docFK'];
        $hopsFK=$_POST['hopsFK'];
        $status="active";
        $db->insert('availability_tbl',['AvailablilityDay'=>$day,'AvailablilityStartTime'=>$Stime,'AvailablilityEndTime'=>$Etime,'DoctorID'=>$docFK]);
       
        if($db->result)
        {
            echo "<script>alert('Record Added!');</script>";
            header('location:all_availability.php');
        }
        else
        {
            echo mysqli_error($db->conn);
        }
    
    }
   
    include('header.php'); 
    
  
?>
<?php
if(isset($_SESSION['a_id'])){
?>
<div class="container">
  <form method="post" enctype="multipart/form-data">
    <div class="row">
      <div class="col-25">
        <label for="fname">Available Day</label>
      </div>
      <div class="col-75">
        <select name="day">
          <option value="Monday">Monday</option>
          <option value="Tuesday">Tuesday</option>
          <option value="Wednesday">Wednesday</option>
          <option value="Thursday">Thursday</option>
          <option value="Friday">Friday</option>
          <option value="Saturday">Saturday</option>
          <option value="Sunday">Sunday</option>
        </select>      
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="lname">Available Start Time</label>
      </div>
      <div class="col-75">
        <input type="time" id="lname" name="Stime" placeholder="Enter start time.." required>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="subject">Available End Time</label>
      </div>
      <div class="col-75">
      <input type="time" id="lname" name="Etime" placeholder="Enter end time.." required>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="country">Doctor's Name</label>
      </div>
      <div class="col-75">
        <select id="country" name="docFK" >
            <?php 
            
    $db->select('doctor',"*");  
                while($row=mysqli_fetch_array($db->result))  
                {
                 
            ?>

          <option value="<?php echo $row[0];?>"> <?php echo $row[1];?></option>
          
          <?php 
                }
          ?>
        </select>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="country">Hospital's Name</label>
      </div>
      <div class="col-75">
        <select id="country" name="hopsFK" >
            <?php 
               $db->select('hospitals',"*");
 
                while($row=mysqli_fetch_array($db->result))  
                {
            ?>

            <option value="<?php echo $row[0];?>"> <?php echo $row[1];?></option>

          <?php 
                }
          ?>
        </select>
      </div>
    </div>
    <div class="row">
      <input type="submit" value="Submit" name="BtnAdd">
    </div>
</form>

<?php 
}
else{
  header("locatiopn:../login.php");
}
    include('footer.php');
?>