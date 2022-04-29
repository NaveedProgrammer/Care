<?php
      session_start();
      if(!isset($_SESSION['a_id']))
      {
          header('location:login.php');
      }
      
      include('../OOP.php');
      $db=new Database();

      $id=$_GET['id'];
      $db->update('appointment',['appoint_status'=>"nonactive"],'apt_id',$id);

      if($db->result)
      {
        echo "<script>alert('Appointment Removed Successfully!');</script>";
      }
      else
      {
        echo "<script>alert('Something Went Wrong!');</script>";
      }

      header('location:all_appointment.php');
?>