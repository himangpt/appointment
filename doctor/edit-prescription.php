<?php include_once '../admin/include/config.php'; 
session_start();
if(!isset($_SESSION['doctorid']))
{
    echo "<script>window.location='doctor-login.php';</script>";
}
?>
<?php
    $patientid = $_GET['patientid'];
    $appoinmentid =$_GET['appid'];

    $query1=mysqli_query($con,"SELECT * from prescription_records AS pre 
                        INNER JOIN patient AS pat
                        ON pre.patientid=pat.patientid 
                        INNER JOIN doctor AS doc
                        ON pre.doctorid= doc.doctorid 
                        INNER JOIN appoinment AS app 
                        ON pre.appoinmentid=app.appoinmentid where pre.doctorid='$_SESSION[doctorid]' and pre.patientid='$_GET[patientid]' and pre.appoinmentid='$_GET[appid]'");
    $row = mysqli_fetch_array($query1);
    extract($row);
?>
<?php include_once 'header.php'; ?>
        <div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <h4 class="page-title">Add Prescription</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <form method="post">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                                <label>Patient Name</label>
                                                <select class="form-control select" name="patientid">
                                                    <?php
                                        $query=mysqli_query($con,"SELECT * from patient where patientid='$_GET[patientid]' and status='Active'");
                                        while($row=mysqli_fetch_array($query)){
                                        extract($row);              
                                                    ?>
                                                     <option value="<?=$patientid;?>"><?=$patientname;?></option>
                                                    
                                                <?php } ?>
                                                </select>
                                                    
                                            </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                                <label>Doctor Name</label>
                                                <select class="form-control select" name="doctorid">
                                                    <?php
                                        $query=mysqli_query($con,"SELECT * from doctor where doctorid='$_SESSION[doctorid]' and status='Active'");
                                        while($row=mysqli_fetch_array($query)){
                                        extract($row);              
                                                    ?>
                                                     <option value="<?=$doctorid;?>"><?=$doctorname;?></option>
                                                    
                                                <?php } ?>
                                                </select>
                                            </div>
                                </div>
                                
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Symptom <span class="text-danger">*</span></label>
                                        <textarea class="form-control" type="text" cols="4" name="symptom" value="<?=$symptom;?>"></textarea>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Medicine <span class="text-danger">*</span></label>
                                        <textarea class="form-control" type="text" cols="4" name="medicine" value="<?=$medicine;?>"><?=$medicine;?></textarea>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Diagnose</label>
                                        <textarea class="form-control" type="text" cols="4" name="diagnose"></textarea>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Test <span class="text-danger">*</span></label>
                                        <textarea class="form-control" type="text" cols="4" name="test"></textarea>
                                    </div>
                                </div>
								<div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Date of Prescription</label>
                                        <div class="cal-icon">
                                            <input type="text" class="form-control datetimepicker" name="dop">
                                        </div>
                                    </div>
                                </div>
                               
                            <div class="form-group">
                                <label class="display-block">Status</label>
								<div class="form-check form-check-inline">
									<input class="form-check-input" type="radio" name="status" id="patient_active" value="Active" checked>
									<label class="form-check-label" for="patient_active">
									Active
									</label>
								</div>
								<div class="form-check form-check-inline">
									<input class="form-check-input" type="radio" name="status" id="patient_inactive" value="Inactive">
									<label class="form-check-label" for="patient_inactive">
									Inactive
									</label>
								</div>
                            </div>
                            <div class="m-t-20 text-center">
                                <button class="btn btn-primary submit-btn" name="submit">Create Prescription</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <?php include_once 'footer1.php'; ?>
			<?php
            if(isset($_POST['submit']))
            {
                $patientid=mysqli_real_escape_string($con,$_POST['patientid']);
                $doctorid=mysqli_real_escape_string($con,$_POST['doctorid']);
                $symptom=mysqli_real_escape_string($con,$_POST['symptom']);
                $medicine=mysqli_real_escape_string($con,$_POST['medicine']);
                $diagnose=mysqli_real_escape_string($con,$_POST['diagnose']);
                $test=mysqli_real_escape_string($con,$_POST['test']);
                $dop=mysqli_real_escape_string($con,$_POST['dop']);
                $status=mysqli_real_escape_string($con,$_POST['status']);
        
                 $sql ="INSERT INTO prescription_records(doctorid,patientid,appoinmentid,prescriptiondate,symptom,medicine,diagnose,test,status) values('$doctorid','$patientid','$_GET[appid]','$dop','$symptom','$medicine','$diagnose','$test','$status')";
               $fire=mysqli_query($con,$sql);
                 echo "<script>swal('Registration Successfull','login','success')</script>";
               echo "<script>window.open('patient-report.php','_self')</script>";

                $query = "UPDATE `doctor` set doctorname='$doctorname',mobile='$mobile',departmentid='$departmentid',email='$email',password = '$password',cpassword='$cpassword',dob='$dob',euniversity='$euniversity',edegree='$edegree',experience='$experience',consultancy_charge='$consultancy_charge',image='$image4',address='$address',status='$status' where doctorid='$doctor_id'";
   $fire=mysqli_query($con,$query);
   echo "<script>window.open('doctors.php','_self')</script>";
            }