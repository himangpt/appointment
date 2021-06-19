<?php include_once 'include/config.php'; 
session_start();
if(!isset($_SESSION['adminid']))
{
    echo "<script>window.location='adminlogin.php';</script>";
}
?>
<?php
    $doctor_id = $_GET['doctor_id'];
    $query1=mysqli_query($con,"SELECT * from doctor AS doc INNER JOIN department AS dep ON doc.departmentid = dep.departmentid where doctorid=$doctor_id");
    $row = mysqli_fetch_array($query1);
    extract($row);
    
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
                                        <input class="form-control" type="text" name="doctorname" value="<?=$doctorname;?>">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Mobile</label>
                                        <input class="form-control" type="text" name="mobile" value="<?=$mobile;?>">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Department</label>
                                                <select class="form-control select" name="departmentid" id="departmentidid" required="">
                                              <option value="" selected="selected" disabled="disabled">Select department</option>      
                                                    <?php
                                        $query=mysqli_query($con,"SELECT * from department");
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
                                        <input class="form-control" type="email" name="email" value="<?=$email;?>">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Password <span class="text-danger">*</span></label>
                                        <input class="form-control" type="password" name="password" value="<?=$password;?>">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Confirm Password</label>
                                        <input class="form-control" type="password" name="cpassword" value="<?=$cpassword;?>">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Date of Birth</label>
                                        <div class="cal-icon">
                                            <input type="text" class="form-control datetimepicker" name="dob" value="<?=$dob;?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Education/University</label>
                                        <input class="form-control" type="text" name="euniversity" placeholder="Enter University" value="<?=$euniversity;?>">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Education/Degree</label>
                                        <input class="form-control" type="text" name="edegree" placeholder="Enter Degree" value="<?=$edegree;?>">
                                    </div>
                                </div>
								<div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Experience</label>
                                            <input type="text" class="form-control" name="experience" value="<?=$experience;?>">
                                        
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Consultancy Charge <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="consultancy_charge" value="<?=$consultancy_charge;?>">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Avatar</label>
                                        <div class="profile-upload">
                                            <div class="upload-img">
                                                <img alt="" src="../admin/assets/img/<?php echo $image; ?>">
                                            </div>
                                            <div class="upload-input">
                                                <input type="file" class="form-control" name="img" value="<?=$image;?>">
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
                                                <input type="text" class="form-control" name="address" value="<?=$address;?>">
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
                                <button class="btn btn-primary submit-btn" name="submit">Edit Doctor</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
			<?php include_once 'footer1.php';?>
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
 
    $query = "UPDATE `doctor` set doctorname='$doctorname',mobile='$mobile',departmentid='$departmentid',email='$email',password = '$password',cpassword='$cpassword',dob='$dob',euniversity='$euniversity',edegree='$edegree',experience='$experience',consultancy_charge='$consultancy_charge',image='$image4',address='$address',status='$status' where doctorid='$doctor_id'";
   $fire=mysqli_query($con,$query);
   echo "<script>window.open('doctors.php','_self')</script>";
 
}
?>