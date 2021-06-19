<?php
include_once 'include/config.php';

 $departmentid=mysqli_real_escape_string($con,$_POST['departmentid']);
 $doctorid=mysqli_real_escape_string($con,$_POST['doctorid']); 
 $date=mysqli_real_escape_string($con,$_POST['date']);
 $myCheck = mysqli_real_escape_string($con,$_POST['myCheck']);
 $morstarttime=mysqli_real_escape_string($con,$_POST['morstarttime']);
 $morendtime=mysqli_real_escape_string($con,$_POST['morendtime']);
 $myCheck1 = mysqli_real_escape_string($con,$_POST['myCheck1']);
 $evestarttime=mysqli_real_escape_string($con,$_POST['evestarttime']);
 $eveendtime=mysqli_real_escape_string($con,$_POST['eveendtime']);
 $status=mysqli_real_escape_string($con,$_POST['status']);
{
	$arr=array ($_POST['morstarttime'],$_POST['morendtime']);
	$mortime = implode('-', $arr);
	$arr1=array ($_POST['evestarttime'],$_POST['eveendtime']);
	$evetime = implode('-', $arr1);
    $query = "INSERT into `doctor_timings`(departmentid,doctorid,date,morning,mortime,evening,evetime,status) values('$departmentid','$doctorid','$date','$myCheck','$mortime','$myCheck1','$evetime','$status')";

   $fire=mysqli_query($con,$query);
   echo "1";

 }

?>