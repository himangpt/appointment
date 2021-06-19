<?php
include_once 'include/config.php';
if(isset($_POST['id']))
 {
  $id = $_POST['id'];
  $query1="delete from patient where patientid = '$id'"; 
  $fire1 = mysqli_query($con,$query1);
 }

?>
