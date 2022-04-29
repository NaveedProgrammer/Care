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
        $email=$_POST['email'];
        $number=$_POST['phone'];
        $address=$_POST['address'];
        $qualification=$_POST['qualification'];
        $password=$_POST['password'];
        $specialization=$_POST['specialization'];
        //$image=addslashes(file_get_contents($_FILES['img']['tmp_name']));
       
        
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
   
        $phoneRegex="/^[0-9]{11}+$/";   //phone validation
        
        if($number=="")
        {
          $error['number']="Number Is Required";
        }else if (!(preg_match($phoneRegex, $number)))
        {
          $error['number']="Invalid Number";
        }else
        {
         $error['number']='';
        }
   
        $emailRegex="/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/";   //email validation
        
        if($email=="")
        {
          $error['email']="Email Is Required";
        }else if (!(preg_match($emailRegex, $email)))
        {
          $error['email']="Invalid Email";
        }else
        {
         $error['email']='';
        }



           if(!empty($_FILES['img']['name']))
           {
            
             if(is_uploaded_file($_FILES['img']['tmp_name']))
             {
              $image=addslashes(file_get_contents($_FILES['img']['tmp_name']));
              //$db->update('hospitals',['hosp_name'=>$name,'hosp_location'=>$address,'hosp_image'=>$image,'hosp_web'=>$web,'city_idFK'=>$city],'hosp_id',$id);
              if($error['name']=='' && $error['number']=='' && $error['email']=='')
        {
              $res=mysqli_query($db->conn,"UPDATE `doctor` SET `doc_name`='$name',`doc_email`='$email',`doc_number`='$number',`doc_address`='$address',`doc_qualification`='$qualification',`doc_password`='$password',`spec_idFK`='$specialization',`doc_image`='$image' WHERE `doc_id`='$id'");
        }
             }

           }else
           {
            
          //  $db->update('hospitals',['hosp_name'=>$name,'hosp_location'=>$address,'hosp_web'=>$web,'city_idFK'=>$city],'hosp_id',$id);
          if($error['name']=='' && $error['number']=='' && $error['email']=='')
          {
          $res=mysqli_query($db->conn,"UPDATE `doctor` SET `doc_name`='$name',`doc_email`='$email',`doc_number`='$number',`doc_address`='$address',`doc_qualification`='$qualification',`doc_password`='$password',`spec_idFK`='$specialization' WHERE `doc_id`='$id'");
    if(!$res)
    {
      echo "<br>Error: ".mysqli_error($db->conn);
    }           
    }
 
           //$db->update('hospitals',['hosp_name'=>$name,'hosp_location'=>$address,'hosp_image'=>$image,'hosp_web'=>$web,'city_idFK'=>$city],'hosp_id',$id);


           if($res)
           {
               header('location:all_doctors.php');
           }
           else
           {
               echo "Error".mysqli_errno($db->conn);
           }
       }}
        
      
        // $db->select('hospitals',"*","hosp_id=$id");
        // $row=mysqli_fetch_assoc($db->result);
        $jresult=mysqli_query($db->conn,"Select * from `doctor` join `specialization` on doctor.spec_idFK=specialization.sp_id where doc_id=$id");
        $jrow=mysqli_fetch_assoc($jresult);
        
       
        include('header.php');

    ?>


<div class="container">
  <form method="post" enctype="multipart/form-data">
  
    <div class="row">
    <input type="hidden" name="id"  value="<?php echo $jrow['doc_id'];?>" >

      <div class="col-25">
        <label for="lname">Name</label>
      </div>
      <div class="col-75">
        <input type="text" id="lname" value="<?php echo $jrow['doc_name'];?>" name="name" placeholder="Enter Doctor Name..">
        <small style="color:red"><?php if(isset($_POST['BtnEdit'])) {echo $error['name'];}?></small>

      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="lname">Email</label>
      </div>
      <div class="col-75">
        <input type="text" id="lname" value="<?php echo $jrow['doc_email'];?>" name="email" placeholder="Enter Dcotor's Email..">
        <small style="color:red"><?php if(isset($_POST['BtnEdit'])) {echo $error['email'];}?></small>

      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="lname">Number</label>
      </div>
      <div class="col-75">
        <input type="text" id="lname" value="<?php echo $jrow['doc_number'];?>" name="phone" placeholder="Enter Doctor's Phone..">
        <small style="color:red"><?php if(isset($_POST['BtnEdit'])) {echo $error['number'];}?></small>

      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="lname">Address</label>
      </div>
      <div class="col-75">
        <input type="text" id="lname" value="<?php echo $jrow['doc_address'];?>" name="address" placeholder="Enter Doctors's address.." required>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="lname">Qualification</label>
      </div>
      <div class="col-75">
        <input type="text" id="lname" value="<?php echo $jrow['doc_qualification'];?>" name="qualification" placeholder="Enter Doctor's Qualification.." required>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="lname">Password</label>
      </div>
      <div class="col-75">
        <input type="text" value="<?php echo $jrow['doc_password'];?>" id="lname" name="password" placeholder="Enter Doctor's Password.." required>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="country">Specialization</label>
      </div>
      <div class="col-75">
        <select id="country" name="specialization" >
        <?php 
            $db->select('specialization',"*");
                while($row=mysqli_fetch_array($db->result))  
                {
                 if($row['0']==$jrow['spec_idFK'])
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
        <label for="country">Image</label>
      </div>
      <div class="col-75">
      <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($jrow['doc_image']);?>" width="100px" height="100px"/>
      <input type="file" id="lname" name="img">
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