<?php include_once 'include/config.php'; 
session_start();
if(!isset($_SESSION['adminid']))
{
    echo "<script>window.location='adminlogin.php';</script>";
}
?>
<?php include_once 'header.php'; ?>
        <div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <h4 class="page-title">Add Patient</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <form method="POST">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Name <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="name" id="name" required="">
                                        <p id="nameerror"></p>
                                    </div>
                                </div>
                                
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Mobile <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="mobile" id="mobile" required="">
                                        <p id="mobileerror"></p>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Email <span class="text-danger">*</span></label>
                                        <input class="form-control" type="email" name="email" id="email">
                                        <p id="emailerror"></p>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input class="form-control" type="password" name="password" id="password">
                                        <p id="passworderror"></p>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Confirm Password</label>
                                        <input class="form-control" type="password" name="cpassword" id="cpassword">
                                        <p id="cpassworderror"></p>
                                    </div>
                                </div>
								<div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Date of Birth</label>
                                        <div class="cal-icon">
                                            <input type="text" class="form-control datetimepicker" name="date" id="date">
                                            <p id="date_error"></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
									<div class="form-group gender-select">
										<label class="gen-label">Gender:</label>
										<div class="form-check-inline">
											<label class="form-check-label">
												<input type="radio" name="gender" value ="Male" class="form-check-input">Male
											</label>
										</div>
										<div class="form-check-inline">
											<label class="form-check-label">
												<input type="radio" name="gender" value="Female" class="form-check-input">Female
											</label>
										</div>
									</div>
                                </div>
								<div class="col-sm-12">
									<div class="row">
										<div class="col-sm-12">
											<div class="form-group">
												<label>Address</label>
												<input type="text" class="form-control" name="address" id="address">
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
                                <button class="btn btn-primary submit-btn" name="submit" id="submit">Create Patient</button>
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
$dt = date("d/m/Y");
$time =date("H:i");
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
$tm=mysqli_real_escape_string($con,$time);

$emailquery="SELECT * FROM  `patient` WHERE `email` = '$email'";
 $email_fire=mysqli_query($con,$emailquery);
 $email_count=mysqli_num_rows($email_fire);
 if($email_count ==1)
 {    
    echo'<script>swal("Email already exist","try another","error");</script>';

 }
 else if($password!=$cpassword)
  {
   echo "<script>swal('Password Not Match','Enter Different','error')</script>"; 
  }
 else{
    $query = "INSERT into patient(patientname,mobile,email,password,cpassword,address,gender,dob,logdate,logtime,status) values('$name','$mobile','$email','$password','$cpassword','$address','$gender','$date','$dt','$tm','$status')";
   $fire=mysqli_query($con,$query);
  echo '<script>swal("Registration successfull","please login","success");</script>';
  $insid= mysqli_insert_id($con);
  echo $insid;
        if(isset($_SESSION['adminid']))
        {
        echo "<script>window.location='add-appointment.php?patid=$insid';</script>";  
        }
        else
        {
        echo "<script>window.location='patientlogin.php';</script>";    
        }   
      $chartquery = "INSERT into chart(month,patientcount)VALUES(
'July', (SELECT count(patientid) FROM patient where logdate BETWEEN '01/07/2020' and '31/07/2020')),
'August', (SELECT count(patientid) FROM patient where logdate BETWEEN '01/08/2020' and '30/08/2020'))";
    $data=mysqli_query($con,$chartquery);
 }
}
?>
<script type="text/javascript">
 $(document).ready(function(){
$('#nameerror').hide();
$('#emailerror').hide();
 $('#passworderror').hide();
 $('#cpassworderror').hide();
 $('#mobileerror').hide(); 

var name_err = true;
var email_err = true;
var password_err = true;
var cpassword_err = true;
var mobile_err = true;

$('#name').keyup(function(){
 name_check();
 });

function name_check(){
var name = $('#name').val();
var name_regex = /^[a-zA-Z]+$/;

if(name == ''){
 $('#nameerror').show();
 $('#nameerror').html("**Please Fill the name");
 $('#nameerror').focus();
 $('#nameerror').css("color","red");
 name_err = false;
 return false;

}
else if((!name.match(name_regex) || name.length == 0))
{
$('#nameerror').show();
 $('#nameerror').html("**Please Fill alphabetical");
 $('#nameerror').focus();
 $('#nameerror').css("color","red");
 name_err = false;
 return false;
}
else{
 $('#nameerror').hide();
 }
}
$('#mobile').keyup(function(){
mobile_check();
});
function mobile_check(){
  var mobile = $('#mobile').val();
  var mobile_regex = /^[0-9\s]*$/;
if(mobile == ''){
 $('#mobileerror').show();
 $('#mobileerror').html("**Please Fill the Number");
 $('#mobileerror').focus();
 $('#mobileerror').css("color","red");
 mobile_err = false;
 return false;
}
else if((!mobile.match(mobile_regex) || mobile.length == 0))
{
$('#mobileerror').show();
 $('#mobileerror').html("**Please Fill Digit");
 $('#mobileerror').focus();
 $('#mobileerror').css("color","red");
 mobile_err = false;
 return false;

}
else{
 $('#mobileerror').hide();
 }
}
$('#email').keyup(function(){
 email_check();
 });

function email_check(){

var email = $('#email').val();
var email_regex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;

                 $.ajax({
                        url:"patient_checkmail.php",
                        method:"POST",
                        data:{email:email},
                        success:function(data){
                          if(data == '0')
                         {
 $('#emailerror').show();
 $('#emailerror').html("**email already exist");
 $('#emailerror').focus();
 $('#emailerror').css("color","red");
 
 email_err = false;
 return false;
  $('#submit').attr("disabled",true);
                          }                         
                       }
                 }); 
if(email == ''){
 $('#emailerror').show();
 $('#emailerror').html("**Please Fill the email");
 $('#emailerror').focus();
 $('#emailerror').css("color","red");
 email_err = false;
 return false;

}
else if((!email.match(email_regex) || email.length == 0))
{
 $('#emailerror').show();
 $('#emailerror').html("**Please Fill the valid email");
 $('#emailerror').focus();
 $('#emailerror').css("color","red");
 
 email_err = false;
 return false;
}
else {
$('#emailerror').hide();  
} 
}
$('#password').keyup(function(){
 password_check();
 });

function password_check(){

var password = $('#password').val();

if(password == ''){
 $('#passworderror').show();
 $('#passworderror').html("**Please Fill the password");
 $('#passworderror').focus();
 $('#passworderror').css("color","red");
 pass_err = false;
 return false;

}else{
 $('#passworderror').hide();
 } 

if((password.length < 3 ) || (password.length > 10 ) ){
 $('#passworderror').show();
 $('#passworderror').html("**password length must be between 3 and 10");
 $('#passworderror').focus();
 $('#passworderror').css("color","red");
 pass_err = false;
 return false;

}else{
 $('#passworderror').hide();
 }
 }

$('#cpassword').keyup(function(){
 cpassword_check();
 });

function cpassword_check(){

var cpassword = $('#cpassword').val();
 var password = $('#password').val();

if(password != cpassword){
 $('#cpassworderror').show();
 $('#cpassworderror').html("** Password are not Matching");
 $('#cpassworderror').focus();
 $('#cpassworderror').css("color","red");
 cpassword_err = false;
 return false;

}else{
 $('#cpassworderror').hide();
 } 
}
});
</script>
