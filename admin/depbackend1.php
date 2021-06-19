<?php
include_once 'include/config.php';

 $departmentname=mysqli_real_escape_string($con,$_POST['departmentname']); 
 $description=mysqli_real_escape_string($con,$_POST['description']);
 $status=mysqli_real_escape_string($con,$_POST['status']);

 $departquery="SELECT * FROM  `department` WHERE `departmentname` = '$departmentname'";
  $depart_fire=mysqli_query($con,$departquery);
  $depart_count=mysqli_num_rows($depart_fire);
  if($depart_count ==1)
  {    echo '1';

  }
  else{
    $query = "INSERT into `department`(departmentname,description,status) values('$departmentname','$description','$status')";
   $fire=mysqli_query($con,$query);
   echo '2';

 }

?>