<?php
session_start();
include_once 'include/config.php';
$timeslot = mysqli_real_escape_string($con,$_POST['timeslot']);
$patientid = mysqli_real_escape_string($con,$_POST['patientid']);
$departmentid = mysqli_real_escape_string($con,$_POST['departmentid']);
$doctorid = mysqli_real_escape_string($con,$_POST['doctorid']);
$date = mysqli_real_escape_string($con,$_POST['date']);
$msg = mysqli_real_escape_string($con,$_POST['msg']);
$status = mysqli_real_escape_string($con,$_POST['status']);

 $slotquery="SELECT patientid,departmentid,doctorid,appoinmentdate,appoinmenttime,status FROM  `appoinment` WHERE `appoinmentdate` = '$date' and appoinmenttime ='$timeslot' and status='Active'";
 $slot_fire=mysqli_query($con,$slotquery);
 $slot_count=mysqli_num_rows($slot_fire);
 if($slot_count ==1)
 {    echo 'already booked choose next';

 }
else{
$query = "INSERT INTO appoinment( patientid,departmentid,doctorid,appoinmentdate,appoinmenttime,symptom,appstatus,status)
VALUES ( '$patientid', '$departmentid', '$doctorid', '$date','$timeslot','$msg','Pending','$status') ";
$result = mysqli_query($con,$query);
 echo $result;
if( $result )

 echo "<script>swal('Successfull','Make a Appoinment','success')</script>";
}

?>