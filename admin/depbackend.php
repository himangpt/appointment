<?php
include_once 'include/config.php';
if(isset($_POST['departmentid']) && isset($_POST['departmentid']) != "")
{
	$user_id = $_POST['departmentid'];
	$query = "SELECT *from department where departmentid = '$user_id'";
	if(!$fire = mysqli_query($con,$query))
	{
		exit(mysqli_error());
	}
	$response = array();
	if(mysqli_num_rows($fire)>0)
	{
		while($row = mysqli_fetch_assoc($fire)){
			$response = $row;
		}

	}
	echo json_encode($response);
}
if(isset($_POST['hidden_departmentid'])){
	$hidden_departmentid = $_POST['hidden_departmentid'];
	$departmentname = $_POST['departmentname'];
	$description = $_POST['description'];
	$status = $_POST['status'];
	$query2="UPDATE department set departmentname='$departmentname',description = '$description',status = '$status' where departmentid= '$hidden_departmentid'";
	$fire2= mysqli_query($con,$query2);
}

if(isset($_POST['id']))
 {
  $id = $_POST['id'];
  $query1="delete from department where departmentid = '$id'"; 
  $fire1 = mysqli_query($con,$query1);
 }

?>
