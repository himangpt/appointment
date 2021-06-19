<?php include_once 'include/config.php'; 
session_start();
if(!isset($_SESSION['adminid']))
{
    echo "<script>window.location='adminlogin.php';</script>";
}
?>
<?php
    $patient_id = $_GET['patient_id'];
    $query1=mysqli_query($con,"SELECT * from patient  where patientid=$patient_id");
    $row = mysqli_fetch_array($query1);
    extract($row);
?>
<?php include_once 'header.php';?>
        <div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <h4 class="page-title">Edit Patient</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <form method="POST">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Name <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="name" id="name" value="<?=$patientname;?>">
                                    </div>
                                </div>
                                
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Mobile <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="mobile" id="mobile" value="<?=$mobile;?>">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Email <span class="text-danger">*</span></label>
                                        <input class="form-control" type="email" name="email" id="email" value="<?=$email;?>">
                                        <p id="emailerror"></p>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input class="form-control" type="password" name="password" id="password" value="<?=$password;?>">
                                        <p id="passworderror"></p>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Confirm Password</label>
                                        <input class="form-control" type="password" name="cpassword" id="cpassword" value="<?=$cpassword;?>">
                                        <p id="cpassworderror"></p>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Date of Birth</label>
                                        <div class="cal-icon">
                                            <input type="text" class="form-control datetimepicker" name="date" id="date" value="<?=$dob;?>">
                                            <p id="date_error"></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group gender-select">
                                        <label class="gen-label">Gender:</label>
                                        <div class="form-check-inline">
                                            <label class="form-check-label">
                                                <input type="radio" name="gender" value="Male" class="form-check-input" required="">Male
                                            </label>
                                        </div>
                                        <div class="form-check-inline">
                                            <label class="form-check-label">
                                                <input type="radio" name="gender" value="Female" class="form-check-input" required="">Female
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Address</label>
                                                <input type="text" class="form-control" name="address" id="address" value="<?=$address;?>">
                                            </div>
                                        </div>
                                    </div>
                                      <div class="form-group">
                                <label class="display-block">Status</label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="status" id="doctor_active" value="Active" checked>
                                    <label class="form-check-label" for="doctor_active">
                                    Active
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="status" id="doctor_inactive" value="Inactive">
                                    <label class="form-check-label" for="doctor_inactive">
                                    Inactive
                                    </label>
                                </div>
                            </div>
                                </div>
                            <div class="m-t-20 text-center">
                                <button class="btn btn-primary submit-btn" name="submit" id="submit">Edit Patient</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <?php include_once 'footer1.php';?>
            <?php
if(isset($_POST['submit']))
{
date_default_timezone_set('Asia/Kolkata');
$dt = date("d-m-Y H:i");

$name=mysqli_real_escape_string($con,$_POST['name']);
$mobile=mysqli_real_escape_string($con,$_POST['mobile']);
$email=mysqli_real_escape_string($con,$_POST['email']);
$password=mysqli_real_escape_string($con,$_POST['password']);
$cpassword=mysqli_real_escape_string($con,$_POST['cpassword']);
$date=mysqli_real_escape_string($con,$_POST['date']);
$gender=mysqli_real_escape_string($con,$_POST['gender']);
$address=mysqli_real_escape_string($con,$_POST['address']);
$status=mysqli_real_escape_string($con,$_POST['status']);
$dt=mysqli_real_escape_string($con,$dt);

 if($password!=$cpassword)
  {
   echo "<script>swal('Password Not Match','Enter Different','error')</script>"; 
  }
  else{
    $query = "UPDATE `patient` set patientname='$name',mobile='$mobile',email='$email',password = '$password',cpassword='$cpassword',dob='$date',gender='$gender',address='$address',status='$status' where patientid='$patient_id'";
   $fire=mysqli_query($con,$query);
   echo "<script>window.open('patients.php','_self')</script>";
 }
}
?>