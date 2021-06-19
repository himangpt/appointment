<?php 
session_start();
session_destroy();
 unset($_SESSION['doctorid']);
 header("Location:doctor-login.php");
?>