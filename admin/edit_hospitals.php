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
           $name=$_POST['Hname'];
           $address=$_POST['address'];
           $web=$_POST['web'];
           $city=$_POST['city'];
          // echo "ID :".$id." Name : ".$name."address :".$address." Web : ".$web."city : ".$city;

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

           if(!empty($_FILES['img']['name']))
           {
             echo "Uploaded";
             if(is_uploaded_file($_FILES['img']['tmp_name']))
             {
              $image=addslashes(file_get_contents($_FILES['img']['tmp_name']));
              //$db->update('hospitals',['hosp_name'=>$name,'hosp_location'=>$address,'hosp_image'=>$image,'hosp_web'=>$web,'city_idFK'=>$city],'hosp_id',$id);
              if($error['name']=='')
             {
              $res=mysqli_query($db->conn,"UPDATE `hospitals` SET `hosp_name`='$name',`hosp_image`='$image',`hosp_location`='$address',`hosp_web`='$web',`city_idFK`='$city' WHERE `hosp_id`='$id'");
             }

             }

           }else
           {
             echo "not uploaded";
          //  $db->update('hospitals',['hosp_name'=>$name,'hosp_location'=>$address,'hosp_web'=>$web,'city_idFK'=>$city],'hosp_id',$id);
          if($error['name']=='')
          {
          $res=mysqli_query($db->conn,"UPDATE `hospitals` SET `hosp_name`='$name',`hosp_location`='$address',`hosp_web`='$web',`city_idFK`='$city' WHERE `hosp_id`='$id'");
    if(!$res)
    {
      echo "<br>Error: ".mysqli_error($db->conn);
    }           
    }
 
           //$db->update('hospitals',['hosp_name'=>$name,'hosp_location'=>$address,'hosp_image'=>$image,'hosp_web'=>$web,'city_idFK'=>$city],'hosp_id',$id);


           if($db->result)
           {
               header('location:all_hospitals.php');
           }
           else
           {
               echo "Error".mysqli_errno($db->conn);
           }
       }}
        

        // $db->select('hospitals',"*","hosp_id=$id");
        // $row=mysqli_fetch_assoc($db->result);
        $jresult=mysqli_query($db->conn,"Select * from `hospitals` join `cities` on hospitals.city_idFK=cities.city_id where hosp_id=$id");
        $jrow=mysqli_fetch_assoc($jresult);
        
        
        include('header.php');

    ?>


<div class="container">
  <form method="post" enctype="multipart/form-data">
    <div class="row">
    <input type="hidden" name="id"  value="<?php echo $jrow['hosp_id'];?>" >
      <div class="col-25">
        <label for="fname">Hospital Name</label>
      </div>
      <div class="col-75">
        <input type="text" id="fname" value="<?php echo $jrow['hosp_name'];?>" name="Hname" placeholder="Enter Hospital Name here..">
        <small style="color:red"><?php if(isset($_POST['BtnEdit'])) {echo $error['name'];}?></small>

      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="country">City</label>
      </div>
      <div class="col-75">
        <select id="country" name="city" >
            <?php 
            $db->select('cities',"*");
                while($row=mysqli_fetch_array($db->result))  
                {
                 if($row['0']==$jrow['city_idFK'])
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
        <label for="lname">Address</label>
      </div>
      <div class="col-75">
        <input type="text" id="lname" value="<?php echo $jrow['hosp_location'];?>" name="address" placeholder="Enter Hospital's address.." required>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="country">Image</label>
      </div>
      <div class="col-75">
        <!-- <input type="hidden" name="img1" value="<?php //echo $jrow['hosp_image'];?>"/> -->
        <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($jrow['hosp_image']);?>" width="100px" height="100px"/>
      <input type="file" id="lname" name="img">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="subject">Web Address</label>
      </div>
      <div class="col-75">
      <input type="text" id="lname" value="<?php echo $jrow['hosp_web'];?>" name="web" placeholder="Enter Hospital's web address.." required>
      </div>
    </div>
    <div class="row">
      <input type="submit" value="Submit" name="BtnEdit">
    </div>
  </form>
</div>
<?php 
    include('footer.php');
?>