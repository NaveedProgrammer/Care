<?php
$conn=mysqli_connect('localhost','root','','care');
if(!$conn)
{
    echo "<script>alert('Connection Failed')</script>";
}
?>