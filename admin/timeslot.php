<?php
session_start();
 include_once 'include/config.php'; 

$shift = $_POST['shift'];
$patientid = $_POST['patientid'];
$departmentid = $_POST['departmentid'];
$doctorid = $_POST['doctorid'];
$date = $_POST['date'];
date_default_timezone_set('Asia/Kolkata');
$dt = date("d/m/Y");

if($shift === "Morning")
{
  if($dt!=$date)
  {
    echo "<script>swal('doctor not Available','These Date','error')</script>";
 exit();
  }

 $query  = mysqli_query($con,"SELECT mortime from doctor_timings where departmentid='$departmentid' AND doctorid='$doctorid' AND date='$date' AND status='Active'");   
  while($row=mysqli_fetch_array($query)){
     if($row['mortime']=="-")
  {
    echo "<script>swal('doctor not Available','Morning','error')</script>";
    exit();
  }
  $get_mslots = explode('-',$row['mortime']);
 }

  $morning_start_slot = $get_mslots[0];
 $morning_end_slot = $get_mslots[1];
 $duration = '15';
 $array_mslot_time = array();
$start_time    = strtotime ($morning_start_slot); //change to strtotime
$end_time      = strtotime ($morning_end_slot); //change to strtotime

$add_mins  = $duration * 60;

while ($start_time <= $end_time) // loop between time
{
   $array_of_time[] = date ("h:i", $start_time);
   $start_time += $add_mins; // to check endtie=me
 }
 echo '<div class="row">';
  foreach($array_of_time as $ts_id => $ts_morning){
  $slotquery="SELECT patientid,departmentid,doctorid,appoinmentdate,appoinmenttime,status FROM  `appoinment` WHERE `appoinmentdate` = '$date' and appoinmenttime ='".$ts_morning."' and status='Active'";
 $slot_fire=mysqli_query($con,$slotquery);
 $slot_count=mysqli_num_rows($slot_fire);
  if($slot_count ==1)
 {   
echo '<div class="col-md-2">';
echo '<div class="form-group">';
echo '<button class="btn btn-danger slot" type="button"  data-timeslot="'.$ts_morning.'"  id="'.$ts_id.'" disabled>'.$ts_morning.'</button>';
echo '</div>';
echo '</div>';
 }
 else{
echo '<div class="col-md-2">';
echo '<div class="form-group">';
echo '<button class="btn btn-primary slot" type="button"  data-timeslot="'.$ts_morning.'"  id="'.$ts_id.'">'.$ts_morning.'</button>';
echo '</div>';
echo '</div>';
}
}
echo '</div>';

}else if($shift === "Evening"){
  if($dt!=$date)
  {
   echo "<script>swal('doctor not Available','These Date','error')</script>";
 exit();
  }
 $query1 = mysqli_query($con,"SELECT evetime from doctor_timings where departmentid='$departmentid' AND doctorid='$doctorid' AND date='$date' AND status='Active'");       
                    while($row1=mysqli_fetch_array($query1)){
  if($row1['evetime']=="-")
  {
    echo "<script>swal('doctor not Available','Evening','error')</script>";
    exit();
  }
 $get_eveslots = explode('-',$row1['evetime']);
}
$evening_start_slot = $get_eveslots[0];
$evening_end_slot = $get_eveslots[1];
 $duration = '15';
$array_mslot_time = array();
$start_time    = strtotime ($evening_start_slot); //change to strtotime
$end_time      = strtotime ($evening_end_slot); //change to strtotime

$add_mins  = $duration * 60;

while ($start_time <= $end_time) // loop between time
{
   $array_of_time[] = date ("h:i", $start_time);
   $start_time += $add_mins; // to check endtie=me
}

 echo '<div class="row">';
  foreach($array_of_time as $ts_id => $ts_evening){

 $slotquery="SELECT patientid,departmentid,doctorid,appoinmentdate,appoinmenttime,status FROM  `appoinment` WHERE `appoinmentdate` = '$date' and appoinmenttime ='".$ts_evening."' and status='Active'";
 $slot_fire=mysqli_query($con,$slotquery);
 $slot_count=mysqli_num_rows($slot_fire);
  if($slot_count ==1)
 {   
echo '<div class="col-md-2">';
echo '<div class="form-group">';
echo '<button class="btn btn-danger slot" type="button"  data-timeslot="'.$ts_evening.'"  id="'.$ts_id.'" disabled>'.$ts_evening.'</button>';
echo '</div>';
echo '</div>';
 }
 else{
echo '<div class="col-md-2">';
echo '<div class="form-group">';
echo '<button class="btn btn-primary slot" type="button"  data-timeslot="'.$ts_evening.'"  id="'.$ts_id.'">'.$ts_evening.'</button>';
echo '</div>';
echo '</div>';
}
}
echo '</div>';
 } 
 else{
  echo "Doctor Not Available At the Moment";
 }
 
 ?>
  <script type="text/javascript">
    $('.slot').click(function(){
   var timeslot = $(this).data('timeslot');
   var patientid = $('#patientid').val();
   var departmentid = $('#departmentid').val();
   var doctorid = $('#doctorid').val();
   var date = $('#date').val();
   var msg = $('#msg').val();
   var status = $("input[name='status']:checked").val();
    $.post(
          "insertappoinment.php",
        {timeslot :timeslot,
        patientid :patientid,
        departmentid :departmentid,
        doctorid :doctorid,
        date     :date,
        msg      :msg,
        status   :status},
          function(data){
            console.log(data);
            alert(data);
       window.open('appointments.php','_self');
          }
    ); 
  });
 </script> 