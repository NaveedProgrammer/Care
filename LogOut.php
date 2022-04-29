<?php
if(session_id()==null){
    session_start();
    session_destroy();
}
header("location:index.php");
?>