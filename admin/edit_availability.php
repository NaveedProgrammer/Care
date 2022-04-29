<?php
       session_start();
       if(!isset($_SESSION['a_id']))
       {
           header('location:login.php');
       }
       
       include('../OOP.php');
       $db=new Database();
       $id=$_GET['id'];

       if(isset($_POST['BtnEdit']))
       {
        $id=$_POST['id'];
        $day=$_POST['day'];
        $Stime=$_POST['Stime'];
        $Etime=$_POST['Etime'];
        $docFK=$_POST['docFK'];
        $hopsFK=$_POST['hopsFK'];



        if(!empty($_FILES['img']['name']))
        {
         
          if(is_uploaded_file($_FILES['img']['tmp_name']))
          {
           $image=addslashes(file_get_contents($_FILES['img']['tmp_name']));
           //$db->update('hospitals',['hosp_name'=>$name,'hosp_location'=>$address,'hosp_image'=>$image,'hosp_web'=>$web,'city_idFK'=>$city],'hosp_id',$id);
           $res=mysqli_query($db->conn,"UPDATE `doctor` SET `doc_name`='$name',`doc_email`='$email',`doc_number`='$number',`doc_address`='$address',`doc_qualification`='$qualification',`doc_password`='$password',`spec_idFK`='$specialization',`doc_image`='$image',`doc_status`='$status' WHERE `doc_id`='$id'");

          }

        }else
        {
         
       //  $db->update('hospitals',['hosp_name'=>$name,'hosp_location'=>$address,'hosp_web'=>$web,'city_idFK'=>$city],'hosp_id',$id);
 $res=mysqli_query($db->conn,"UPDATE `availability` SET `avail_day`='$day',`avail_Stime`='$Stime',`avail_Etime`='$Etime',`doc_idFK`='$docFK',`hops_idFK`='$hopsFK' WHERE `avail_id`='$id'");
 if(!$res)
 {
   echo "<br>Error: ".mysqli_error($db->conn);
 }           
 }

        //$db->update('hospitals',['hosp_name'=>$name,'hosp_location'=>$address,'hosp_image'=>$image,'hosp_web'=>$web,'city_idFK'=>$city],'hosp_id',$id);


        if($res)
        {
            header('location:all_availability.php');
        }
        else
        {
            echo "Error".mysqli_errno($db->conn);
        }
    }
     
  
     // $db->select('hospitals',"*","hosp_id=$id");
     // $row=mysqli_fetch_assoc($db->result);
     $jresult=mysqli_query($db->conn,"Select * from `doctor` join `availability` on doctor.doc_id=availability.doc_idFK 
     join `hospitals` on availability.hops_idFK=hospitals.hosp_id");
     $jrow=mysqli_fetch_assoc($jresult);
     
     
     include('header.php');


       
?>

<div class="container">
  <form method="post" enctype="multipart/form-data">
    <div class="row">
    <input type="hidden" name="id"  value="<?php echo $jrow['avail_id'];?>" >

      <div class="col-25">
        <label for="fname">Available Day</label>
      </div>
      <div class="col-75">
        <select name="day">
        <?php 
            $db->select('availability',"*");
                while($row=mysqli_fetch_array($db->result))  
                {
                 if($row['0']==$jrow['avail_id'])
                 {
            ?>
          <option value="<?php echo $row[0];?>" selected> <?php echo $row[1];?></option>
          <?php 
                }else{
          ?>
            <option value="Monday">Monday</option>
            <option value="Tuesday">Tuesday</option>
            <option value="Wednesday">Wednesday</option>
            <option value="Thursday">Thursday</option>
            <option value="Friday">Friday</option>
            <option value="Saturday">Saturday</option>
            <option value="Sunday">Sunday</option>          
          <?php 
                }
              }
          ?>
        </select>      
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="lname">Available Start Time</label>
      </div>
      <div class="col-75">
        <input type="time" value="<?php echo $jrow['avail_Stime'];?>" id="lname" name="Stime" placeholder="Enter start time.." required>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="subject">Available End Time</label>
      </div>
      <div class="col-75">
      <input type="time" value="<?php echo $jrow['avail_Etime'];?>"  id="lname"  name="Etime" placeholder="Enter end time.." required>
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
                 if($row['0']==$jrow['doc_idFK'])
                 {
            ?>
          <option value="<?php echo $row[0];?>" selected> <?php echo $row[1];?></option>
          <?php 
                }else{
          ?>
          <option value="<?php echo $row[0];?>"> <?php echo $row[1];?></option>
          <?php 
                }
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
                 if($row['0']==$jrow['hops_idFK'])
                 {
            ?>
          <option value="<?php echo $row[0];?>" selected> <?php echo $row[1];?></option>
          <?php 
                }else{
          ?>
          <option value="<?php echo $row[0];?>"> <?php echo $row[1];?></option>
          <?php 
                }
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
    include('footer.php');
?>