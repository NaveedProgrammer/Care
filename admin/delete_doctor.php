<?php
      session_start();
      if(!isset($_SESSION['a_id']))
      {
          header('location:login.php');
      }
      
      include('../OOP.php');
      $db=new Database();

      $id=$_GET['id'];
      $db->update('doctor',['doc_status'=>"nonactive"],'doc_id',$id);
      if($db->result)
      {
        echo "<script>alert('Doctor Removed Successfully!');</script>";
      }
      else
      {
        echo "<script>alert('Something Went Wrong!');</script>";
      }

      header('location:all_doctors.php');
?>