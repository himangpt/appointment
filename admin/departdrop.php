<?php
include_once 'include/config.php';
if(isset($_POST["department_id"]) && !empty($_POST["department_id"])){
    //Get all state data
    $query = $con->query("SELECT * FROM doctor WHERE departmentid = ".$_POST['department_id']." AND status = 'Active' ORDER BY doctorname ASC");
    
    //Count total number of rows
    $rowCount = $query->num_rows;
    
    //Display states list
    if($rowCount > 0){
        echo '<option value="">Select Doctor</option>';
        while($row = $query->fetch_assoc()){ 
            echo '<option value="'.$row['doctorid'].'">'.$row['doctorname'].'</option>';
        }
    }else{
        echo '<option value="">Doctor not available</option>';
    }
}
if(isset($_POST['id']))
 {
  $id = $_POST['id'];
  $query1="delete from doctor_timings where doctor_timings_id = '$id'"; 
  $fire1 = mysqli_query($con,$query1);
 }

?>