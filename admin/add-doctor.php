<?php include_once 'include/config.php'; 
session_start();
if(!isset($_SESSION['adminid']))
{
    echo "<script>window.location='adminlogin.php';</script>";
}
?>
<?php include_once 'header.php';?>
        <div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <h4 class="page-title">Add Doctor</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <form method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Name <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="doctorname" id="doctorname" required="">
                                        <p id="nameerror"></p>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Mobile</label>
                                        <input class="form-control" type="text" name="mobile" id="mobile" required="">
                                        <p id="mobileerror"></p>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Department</label>
                                                <select class="form-control select" name="departmentid" id="departmentidid" required="">
                                              <option value="" selected="selected" disabled="disabled">Select department</option>      
                                                    <?php
                                        $query=mysqli_query($con,"SELECT * from department where status='Active'");
                                        while($row=mysqli_fetch_array($query)){
                                        extract($row);              
                                                    ?>
                                                     <option value="<?=$departmentid;?>"><?=$departmentname;?></option>
                                                    
                                                <?php } ?>
                                                </select>
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
                                        <label>Password <span class="text-danger">*</span></label>
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
                                            <input type="text" class="form-control datetimepicker" name="dob">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Education/University</label>
                                        <input class="form-control" type="text" name="euniversity" placeholder="Enter University">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Education/Degree</label>
                                        <input class="form-control" type="text" name="edegree" placeholder="Enter Degree">
                                    </div>
                                </div>
								<div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Experience</label>
                                            <input type="text" class="form-control" name="experience">
                                        
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Consultancy Charge <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="consultancy_charge">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Avatar</label>
                                        <div class="profile-upload">
                                            <div class="upload-img">
                                                <img alt="" src="assets/img/user.jpg">
                                            </div>
                                            <div class="upload-input">
                                                <input type="file" class="form-control" name="img">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                <div class="col-sm-12">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Address</label>
                                                <input type="text" class="form-control" name="address">
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
                            <div class="m-t-20 text-center">
                                <button class="btn btn-primary submit-btn" name="submit" id="submit">Create Doctor</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
	
<?php include_once 'footer1.php'; ?>
<?php
if(isset($_POST['submit'])){
  $doctorname = mysqli_real_escape_string($con,$_POST['doctorname']);
  $mobile     = mysqli_real_escape_string($con,$_POST['mobile']);
  $departmentid = mysqli_real_escape_string($con,$_POST['departmentid']);
  $email        = mysqli_real_escape_string($con,$_POST['email']);
  $password     = mysqli_real_escape_string($con,$_POST['password']);
  $cpassword    = mysqli_real_escape_string($con,$_POST['cpassword']);
  $dob          = mysqli_real_escape_string($con,$_POST['dob']);
  $euniversity  = mysqli_real_escape_string($con,$_POST['euniversity']);
  $edegree      = mysqli_real_escape_string($con,$_POST['edegree']);
  $experience   = mysqli_real_escape_string($con,$_POST['experience']);
  $consultancy_charge = mysqli_real_escape_string($con,$_POST['consultancy_charge']);
  $image4=$_FILES['img']['name'];
  $imagetmp4=$_FILES['img']['tmp_name'];
  $targetpath4="../admin/assets/img".$image4;
  move_uploaded_file($imagetmp4,$targetpath4);
   $address   = mysqli_real_escape_string($con,$_POST['address']); 
   $status   = mysqli_real_escape_string($con,$_POST['status']);
 $emailquery="SELECT * FROM  `doctor` WHERE `email` = '$email'";
  $email_fire=mysqli_query($con,$emailquery);
 $email_count=mysqli_num_rows($email_fire);
  if($email_count ==1)
  {    
    echo "<script>swal('Email already Exist','Enter Different','error')</script>";

  }
  if($password!=$cpassword)
  {
   echo "<script>swal('Password Not Match','Enter Different','error')</script>"; 
  }
  else{
    $query = "INSERT into `doctor`(doctorname,mobile,departmentid,email,password,cpassword,dob,euniversity,edegree,experience,consultancy_charge,image,address,status) values('$doctorname','$mobile','$departmentid','$email','$password','$cpassword','$dob','$euniversity','$edegree','$experience','$consultancy_charge','$image4','$address','$status')";
   $fire=mysqli_query($con,$query);
 echo "<script>swal('Registration Successfull','login','success')</script>";
  echo "<script>window.open('doctors.php','_self')</script>";
          
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

$('#doctorname').keyup(function(){
 name_check();
 });

function name_check(){
var name = $('#doctorname').val();
var name_regex = /^[a-z A-Z]+$/;

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
 $('#mobileerror').html("**Please Fill the Mobile Number");
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

  

                        url:"doc_checkmail.php",

                        method:"POST",

                     data:{email:email},

                        success:function(data){
                          //console.log(data);

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