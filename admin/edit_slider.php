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
            $title=$_POST['title'];
            $txt=$_POST['txt'];
            $link=$_POST['link'];
            $btn=$_POST['btn'];

          
          // echo "ID :".$id." Name : ".$name."address :".$address." Web : ".$web."city : ".$city;

           if(!empty($_FILES['Img']['name']))
           {
             echo "Uploaded";
             if(is_uploaded_file($_FILES['Img']['tmp_name']))
             {
              $image=addslashes(file_get_contents($_FILES['Img']['tmp_name']));
              //$db->update('hospitals',['hosp_name'=>$name,'hosp_location'=>$address,'hosp_image'=>$image,'hosp_web'=>$web,'city_idFK'=>$city],'hosp_id',$id);
              $res=mysqli_query($db->conn,"UPDATE `slider` SET `s_title`='$title',`s_text`='$txt',`s_link`='$link',`s_btn`='$btn',`s_image`='$image' WHERE `s_id`='$id'");

             }

           }else
           {
             echo "not uploaded";
          //  $db->update('hospitals',['hosp_name'=>$name,'hosp_location'=>$address,'hosp_web'=>$web,'city_idFK'=>$city],'hosp_id',$id);
          $res=mysqli_query($db->conn,"UPDATE `slider` SET `s_title`='$title',`s_text`='$txt',`s_link`='$link',`s_btn`='$btn' WHERE `s_id`='$id'");
          if(!$res)
    {
      echo "<br>Error: ".mysqli_error($db->conn);
    }           
    }
 
           //$db->update('hospitals',['hosp_name'=>$name,'hosp_location'=>$address,'hosp_image'=>$image,'hosp_web'=>$web,'city_idFK'=>$city],'hosp_id',$id);


           if($db->result)
           {
               header('location:all_slider.php');
           }
           else
           {
               echo "Error".mysqli_errno($db->conn);
           }
       }
        

        // $db->select('hospitals',"*","hosp_id=$id");
        // $row=mysqli_fetch_assoc($db->result);
        $result=mysqli_query($db->conn,"Select * from `slider` where s_id=$id");
        $row=mysqli_fetch_assoc($result);
        
        
        include('header.php');

    ?>



<div class="container">
  <form method="post" enctype="multipart/form-data">
    <div class="row">
    <input type="hidden" name="id"  value="<?php echo $row['s_id'];?>" >

      <div class="col-25">
        <label for="fname">Slide Title</label>
      </div>
      <div class="col-75">
        <input type="text" value="<?php echo $row['s_title'];?>" id="fname" name="title" placeholder="Enter Slide Name here.." required>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="fname">Slide Text</label>
      </div>
      <div class="col-75">
        <input type="text" value="<?php echo $row['s_text'];?>" id="fname" name="txt" placeholder="Enter Slide Text here.." required>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="fname">Slide Link</label>
      </div>
      <div class="col-75">
        <input type="text" value="<?php echo $row['s_link'];?>" id="fname" name="link" placeholder="Enter Link here.." required>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="fname">Slide Button</label>
      </div>
      <div class="col-75">
        <input type="text" value="<?php echo $row['s_button'];?>" id="fname" name="btn" placeholder="Enter Button Name here.." required >
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="country">Image</label>
      </div>
      <div class="col-75">
      <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['s_image']);?>" width="100px" height="100px"/>

      <input type="file" id="lname" name="Img" required>
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