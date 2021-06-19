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
                    <div class="col-sm-4 col-3">
                        <h4 class="page-title">Schedule</h4>
                    </div>
                    <div class="col-sm-8 col-9 text-right m-b-20">
                        <a href="" class="btn btn btn-primary btn-rounded float-right" data-toggle="modal" data-target=".bd-example-modal-lg"><i class="fa fa-plus"></i> Add Schedule</a>
                    </div>
                </div>
                    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Doctor Schedule</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" id="insert_form">
                                 <div class="row">
                                    <div class="col-sm-4">
                                            <div class="form-group">
                                                <label>Department</label>
                                                <select class="form-control select" name="departmentid" id="departmentid">
                                              <option value="" selected="selected" disabled="disabled">Select department</option>      
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
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label>Doctor</label>
                                                <select class="form-control select" name="doctorid" id="doctorid">
                                              <option value="" selected="selected" disabled="disabled">Select doctor</option>      
                                                     <option value=""></option>
                                                    
                                                </select>
                                            </div>
                                        </div>
                                    <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Date of Appoinment</label>
                                        <div class="cal-icon">
                                            <input type="text" class="form-control datetimepicker " name="doa" id="doa">
                                        </div>
                                    </div>
                                </div>
                
                    </div>
                    <div class="form-group row">
    <label class="col-lg-3  form-control-label">Shift</label>
    <div class="col-lg-4">
<label for="myCheck">Morning:</label> 
<input type="checkbox" id="myCheck" value="Morning" data-toggle="collapse" data-target="#demo" >

<div id="demo" class="collapse">                        
  Start Time:<input class="form-control col-lg-8" id="morstarttime" name="morstarttime" type="text" required/>
End Time:<input class="form-control col-lg-8" id="morendtime" name="morendtime" type="text" required/>
 </div>
</div>

<div class="col-lg-4">
  <label for="myCheck">Evening:</label> 
<input type="checkbox" id="myCheck1" value="Evening" data-toggle="collapse" data-target="#demo1">

<div id="demo1" class="collapse">                                                     Start Time:<input class="form-control col-lg-8" id="evestarttime" name="evestarttime" type="text" required/>
End Time:<input class="form-control col-lg-8" id="eveendtime" name="eveendtime" type="text" required/>
 </div>
</div>
    </div>
                            <div class="form-group">
                                <label class="display-block">Department Status</label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="status" id="product_active" value="Active" checked>
                                    <label class="form-check-label" for="product_active">
                                    Active
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="status" id="product_inactive" value="Inactive">
                                    <label class="form-check-label" for="product_inactive">
                                    Inactive
                                    </label>
                                </div>
                            </div>
                            <div class="m-t-20 text-center"> 
                            <button class="btn btn-primary submit-btn" name="insert" id="insert">Create Schedule</button>
                            
                            </div>
                        </form>
      </div>
    </div>
  </div>
</div>
                
				<div class="row">
					<div class="col-md-12">
						<div class="table-responsive">
							<table class="table table-border table-striped custom-table mb-0" id="data_table">
								<thead>
									<tr>
                                        <th>#</th>
										<th>Doctor Name</th>
                                        <th>Department</th>
										<th>Date</th>
                                        <th>Shift</th>
										<th>Available Time</th>
                                        <th>Shift</th>
                                        <th>Available Time</th>
										
										<th class="text-right">Action</th>
									</tr>
								</thead>
								<tbody>
  <?php
                      $query=mysqli_query($con,"SELECT * from doctor_timings AS doc_time INNER JOIN doctor AS doc
                          ON doc_time.doctorid=doc.doctorid 
                        INNER JOIN department AS dep
                          ON doc_time.departmentid= dep.departmentid ORDER BY doc_time.doctor_timings_id DESC");
                      $sn=0;
                      while($row=mysqli_fetch_array($query)){
                      extract($row);              
                          ?>
                       <tr>
                        <td><?php 
                          $sn = $sn+1; 
                          echo $sn;
                      ?></td>
									
										<td><img width="28" height="28" src="../admin/assets/img/<?php echo $image; ?>" class="rounded-circle m-r-5" alt=""><?=$doctorname;?></td>
										<td><?=$departmentname;?></td>
										<td><?=$date;?></td>
                                        <td><?=$morning;?></td>
                                        <td><?=$mortime;?></td>
                                        <td><?=$evening;?></td>
                                        <td><?=$evetime;?></td>
										
										<td class="text-right">
											<div class="dropdown dropdown-action">
												<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
												<div class="dropdown-menu dropdown-menu-right">
													<a class="dropdown-item edit_data" href="#" id="<?php echo $doctor_timings_id; ?>" ><i class="fa fa-pencil m-r-5"></i> Edit</a>
													<a class="dropdown-item" id="mybutton" href="#" data-toggle="modal" data-target="#delete_schedule" data-id="<?=$doctor_timings_id; ?>"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
												</div>
											</div>
										</td>
									</tr>
                                <?php } ?>
								</tbody>
							</table>
						</div>
                </div>
                </div>
            </div>
            <div id="delete_schedule" class="modal fade delete-modal" role="dialog">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body text-center">
                        <img src="assets/img/sent.png" alt="" width="50" height="46">
                        <h3>Are you sure want to delete this Department?</h3>
                        <div class="m-t-20"> <a href="#" class="btn btn-white" data-dismiss="modal">Close</a>
                            <button type="submit" class="btn btn-danger" id="confirmbutton" data-id="<?=$doctor_timings_id;?>">Delete</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            <?php include_once 'footer1.php';?>
             <script>
            $(function () {
                $('#morstarttime').datetimepicker({
                    format: 'LT'
                });
                $('#morendtime').datetimepicker({
                    format: 'LT'
                });
                $('#evestarttime').datetimepicker({
                    format: 'LT'
                });
                $('#eveendtime').datetimepicker({
                    format: 'LT'
                });

         $('#departmentid').on('change',function(){
        var departmentID = $(this).val();
        if(departmentID){
            $.ajax({
                type:'POST',
                url:'departdrop.php',
                data:'department_id='+departmentID,
                success:function(html){
                    console.log(html);
                    $('#doctorid').html(html); 
                }
            }); 
        }else{
            $('#doctorid').html('<option value="">Select Department first</option>'); 
        }
    });
 $('#insert').click(function(){
var departmentid = $('#departmentid').val();
var doctorid = $('#doctorid').val();
var date = $('#doa').val();
var myCheck = $('#myCheck').val();
var morstarttime = $('#morstarttime').val();
var morendtime = $('#morendtime').val();
var myCheck1 = $('#myCheck1').val();
var evestarttime = $('#evestarttime').val();
var eveendtime = $('#eveendtime').val();
var status = $("input[name='status']:checked").val();
$.ajax({
url : "insert_schedule.php",
 type : "POST",
 data : { departmentid : departmentid,
          doctorid     : doctorid,
          date : date,
         myCheck : myCheck,
         morstarttime : morstarttime,
         morendtime   : morendtime,
         myCheck1     : myCheck1,
         evestarttime  : evestarttime,
         eveendtime    : eveendtime,
         status    : status,
                  
       },
 success : function(response){
           console.log(response);
           if(response == 1)
    {
        swal("succesfull","Schedule added","success");
        window.open('schedule.php','_self');
    }    
      else
      {
       console.log("error");
      }
         
 }      
});
             });
 $(document).on('click', '#mybutton', function(){
    var ID = $(this).data('id');
    $('#confirmbutton').data('id', ID); //set the data attribute on the modal button
});
$('#confirmbutton').click(function(){
    var ID = $(this).data('id');
    $.ajax({
        url: "departdrop.php",
        type: "POST",
        data:{id : ID},
        success: function (data) {
            console.log(data);
          $("#delete_department").modal('hide');
          window.location.href='schedule.php';
        }
      });
});

});
     </script>
