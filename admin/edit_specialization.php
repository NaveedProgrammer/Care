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
           $name=$_POST['name'];
           $descrip=$_POST['descrip'];


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
      

          
          // echo "ID :".$id." Name : ".$name."address :".$address." Web : ".$web."city : ".$city;

           if(!empty($_FILES['img']['name']))
           {
             echo "Uploaded";
             if(is_uploaded_file($_FILES['img']['tmp_name']))
             {
              $image=addslashes(file_get_contents($_FILES['img']['tmp_name']));
              //$db->update('hospitals',['hosp_name'=>$name,'hosp_location'=>$address,'hosp_image'=>$image,'hosp_web'=>$web,'city_idFK'=>$city],'hosp_id',$id);
              if($error['name']=='')
              {
              $res=mysqli_query($db->conn,"UPDATE `specialization` SET `sp_name`='$name',`sp_image`='$image',`sp_descrip`='$descrip' WHERE `sp_id`='$id'");
              }
             }

           }else
           {
             echo "not uploaded";
          //  $db->update('hospitals',['hosp_name'=>$name,'hosp_location'=>$address,'hosp_web'=>$web,'city_idFK'=>$city],'hosp_id',$id);
          if($error['name']=='')
          {
          $res=mysqli_query($db->conn,"UPDATE `specialization` SET `sp_name`='$name',`sp_descrip`='$descrip' WHERE `sp_id`='$id'");
    if(!$res)
    {
      echo "<br>Error: ".mysqli_error($db->conn);
    }           
    }
 
           //$db->update('hospitals',['hosp_name'=>$name,'hosp_location'=>$address,'hosp_image'=>$image,'hosp_web'=>$web,'city_idFK'=>$city],'hosp_id',$id);


           if($db->result)
           {
               header('location:all_specialization.php');
           }
           else
           {
               echo "Error".mysqli_errno($db->conn);
           }
       }}
        

        // $db->select('hospitals',"*","hosp_id=$id");
        // $row=mysqli_fetch_assoc($db->result);
        $result=mysqli_query($db->conn,"Select * from `specialization` where sp_id=$id");
        $row=mysqli_fetch_assoc($result);
        
        
        include('header.php');

    ?>



<div class="container">
  <form method="POST" enctype="multipart/form-data">
  <div class="row">
  <input type="hidden" name="id"  value="<?php echo $row['sp_id'];?>" >

      <div class="col-25">
        <label for="fname">Specialization</label>
      </div>
      <div class="col-75">
        <input type="text" id="fname" value="<?php echo $row['sp_name'];?>" name="name">
        <small style="color:red"><?php if(isset($_POST['BtnEdit'])) {echo $error['name'];}?></small>

      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="fname">Specialization Description</label>
      </div>
      <div class="col-75">
        <input type="text" id="fname" value="<?php echo $row['sp_descrip'];?>" name="descrip">

      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="country">Image</label>
      </div>
      <div class="col-75">
        <!-- <input type="hidden" name="img1" value="<?php //echo $jrow['hosp_image'];?>"/> -->
        <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['sp_image']);?>" width="100px" height="100px"/>
      <input type="file" id="lname" name="img">
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