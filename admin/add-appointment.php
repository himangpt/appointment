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
                        <h4 class="page-title">Add Appointment</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <form>
                            <div class="row">
                                <div class="col-md-12">
									<div class="form-group">
										<label>Patient Name</label>
										<select class="select" name="patientid" id="patientid">
											<option>Select</option>
                                            <?php
                                            if(isset($_GET[patid])){ 
                                             $query1=mysqli_query($con,"SELECT * from patient where patientid='$_GET[patid]' and status='Active'");
                                             $row = mysqli_fetch_array($query1);
                                              extract($row);  ?>
                                              <option value="<?=$patientid;?>">[Patient ID -<?=$patientid;?>]<?=$patientname;?></option>   
                                              <?php } 
                                                 else{ 
                                        $query=mysqli_query($con,"SELECT * from patient where status ='Active'");
                                        while($row=mysqli_fetch_array($query)){
                                        extract($row);              
                                                    ?>
                                                    <option value="<?=$patientid;?>">[Patient ID -<?=$patientid;?>]<?=$patientname;?></option>
                                                    
                                                <?php } ?>
                                            <?php } ?>
                                                </select>
									</div>
                                </div>
                                
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Department</label>
                                        <select class="form-control select" name="departmentid" id="departmentid">

                                            <option>Select</option>
                                             <?php
                                        $query=mysqli_query($con,"SELECT * from department where status ='Active'");
                                        while($row=mysqli_fetch_array($query)){
                                        extract($row);              
                                                    ?>
                                                    <option value="<?=$departmentid;?>"><?=$departmentname;?></option>
                                                    
                                                <?php } ?>
                                                </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Doctor</label>
                                        <select class="form-control select" name="doctorid" id="doctorid">
											<option>Select</option>
											<option></option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Date</label>
                                        <div class="cal-icon">
                                            <input type="text" class="form-control datetimepicker" id="date" name="date">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                <div class="form-group">
                                <label>Symptoms</label>
                                <input class="form-control" type="text" id="msg" name="msg">
                            </div>
                            </div>
                            </div>
                            <div class="row">
                            <div class="col-md-6">
                            <div class="form-group">
                                <label class="display-block">Appointment Status</label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="status" id="product_active" value="Active" checked>
                                    <label class="form-check-label" for="product_active">
                                    Active
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="status" id="product_inactive" value="Active">
                                    <label class="form-check-label" for="product_inactive">
                                    Inactive
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                        <label>Shift</label>
                                        <select class="form-control select" name="shift" id="shift">
                                            <option>Select</option>
                                            <option value="Morning">Morning</option>
                                            <option value="Evening">Evening</option>
                                        </select>
                                    </div>
                                </div>
                                     <div class="form-group">
                                <p id="time" name="time"></p>
                            </div>
                            
                        </form>
                    </div>
                </div>
            </div>
 <?php include_once 'footer1.php';?>
 <script type="text/javascript">
    $(document).ready(function(){
   $('#departmentid').on('change',function(){
        var departmentID = $(this).val();
        if(departmentID){
            $.ajax({
                type:'POST',
                url:'departdrop.php',
                data:'department_id='+departmentID,
                success:function(html){
                    $('#doctorid').html(html); 
                }
            }); 
        }else{
            $('#doctorid').html('<option value="">Select Department first</option>'); 
        }
    });
   $('#shift').on('change',function(){
        var shift = $(this).val();
        var patientid = $('#patientid').val();
        var departmentid = $('#departmentid').val();
        var doctorid = $('#doctorid').val();
        var date = $('#date').val();
        var msg = $('#msg').val();
         $.post(
         "timeslot.php",
         {shift : shift,
          patientid    : patientid,
          departmentid : departmentid,
          doctorid     : doctorid,
          date : date,
          msg : msg},
          function(data){
            console.log(data);
         $('#time').html(data);
          }
    ); 
    });
});
 </script>