<?php include_once '../admin/include/config.php'; 
session_start();
if(!isset($_SESSION['doctorid']))
{
    echo "<script>window.location='doctor-login.php';</script>";
}
$appid=$_GET['appid'];
?>
<?php include_once 'header.php'; ?>
        <div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <h4 class="page-title">Add Prescription</h4>
                    </div>
                    <a href="patient-report.php?patientid=<?php echo $_GET['patientid']; ?>&appid=<?php echo $_GET['appid']; ?>" 
                         class="btn btn btn-primary btn-rounded float-right"><i class="fa fa-eye"></i> View Prescription</a>
                </div>
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <form method="post">
    <!--  <input type="hidden" name="patientid" value="<?php echo $_GET[patientid]; ?>"  />-->
     <input type="hidden" name="appid" id="appid" value="<?php echo $appid; ?>"  />
 
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                                <label>Patient Name</label>
                                                <select class="form-control select" name="patientid" id="patientid">
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
                                                <select class="form-control select" name="doctorid" id="doctorid">
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
                                        <textarea class="form-control" type="text" cols="4" name="symptom" id="symptom"></textarea>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Medicine <span class="text-danger">*</span></label>
                                        <textarea class="form-control" type="text" cols="4" name="medicine" id="medicine"></textarea>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Diagnose</label>
                                        <textarea class="form-control" type="text" cols="4" name="diagnose" id="diagnose"></textarea>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Test <span class="text-danger">*</span></label>
                                        <textarea class="form-control" type="text" cols="4" name="test" id="test"></textarea>
                                    </div>
                                </div>
								<div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Date of Prescription</label>
                                        <div class="cal-icon">
                                            <input type="text" class="form-control datetimepicker" name="dop" id="dop">
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
                                
                                <button
                                class="btn btn-primary submit-btn" name="submit" id="submit">Create Doctor</a>
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
                 }