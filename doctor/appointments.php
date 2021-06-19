<?php include_once '../admin/include/config.php'; 
session_start();
if(!isset($_SESSION['doctorid']))
{
    echo "<script>window.location='doctor-login.php';</script>";
}
?>
<?php include_once 'header.php'; ?>
        <div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-sm-4 col-3">
                        <h4 class="page-title">Appointments</h4>
                    </div>
              
                </div>
				<div class="row">
					<div class="col-md-12">
						<div class="table-responsive">
							<table class="table table-striped custom-table" id="example">
								<thead>
									<tr>
										<th>Appointment ID</th>
										<th>Patient Name</th>
										<th>Doctor Name</th>
										<th>Department</th>
										<th>Appointment Date</th>
										<th>Appointment Time</th>
										<th>Status</th>
                    <th>Appointment Confirm</th>
										<!-- <th class="text-right">Action</th> -->
									</tr>
								</thead>
								<tbody>
                                    <?php
                      $query=mysqli_query($con,"SELECT * from appoinment AS app 
                        INNER JOIN patient AS pat
                        ON app.patientid=pat.patientid 
                        INNER JOIN doctor AS doc
                        ON app.doctorid= doc.doctorid 
                        INNER JOIN department AS dep 
                        ON app.departmentid=dep.departmentid where app.appstatus='Pending' and app.doctorid='$_SESSION[doctorid]' ORDER BY app.appoinmentid DESC");
                      $sn=0;
                      while($row=mysqli_fetch_array($query)){
                      extract($row);              
                          ?>
                       <tr>
                        <td><?php 
                          $sn = $sn+1; 
                          echo "APT-".$sn;
                      ?></td>
										<td><?=$patientname;?></td>
										<td><?=$doctorname;?></td>
										<td><?=$departmentname;?></td>
										<td><?=$appoinmentdate;?></td>
										<td><?=$appoinmenttime;?></td>
										<?php if($appstatus=='Confirm'){ ?>
                                        <td><span class="custom-badge status-green"><?=$appstatus;?></span></td>
                                        <?php } ?>
                                        <?php if($appstatus=='Pending'){ ?>
                                            <td><span class="custom-badge status-red"><?=$appstatus;?></span></td>
                                        <?php } ?>
                                        <td>
                                          <a href="patient-report.php?patientid=<?=$patientid;?>&appid=<?=$appoinmentid;?>">Confirm</a>
                                        </td>
										<!-- <td class="text-right">
											<div class="dropdown dropdown-action">
												<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
												<div class="dropdown-menu dropdown-menu-right">
													<a class="dropdown-item" href="patient-report.php?patientid=<?=$patientid;?>&appid=<?=$appoinmentid;?>"><i class="fa fa-pencil m-r-5"></i>View</a>
													<a class="dropdown-item" id="mybutton" href="#" data-toggle="modal" data-target="#delete_appointment" data-id="<?=$appoinmentid; ?>"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
												</div>
											</div>
										</td> -->
									</tr>
                                <?php } ?>
								</tbody>
							</table>
						</div>
					</div>
                </div>
                <!-- <div id="delete_appointment" class="modal fade delete-modal" role="dialog">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body text-center">
                        <img src="assets/img/sent.png" alt="" width="50" height="46">
                        <h3>Are you sure want to delete this Department?</h3>
                        <div class="m-t-20"> <a href="#" class="btn btn-white" data-dismiss="modal">Close</a>
                            <button type="submit" class="btn btn-danger" id="confirmbutton" >Delete</button>
                        </div>
                    </div>
                </div>
            </div>
            </div> -->
              <?php include_once 'footer1.php'; ?>
             

              <script type="text/javascript">
    
       $(document).ready(function() {

    $('#example').DataTable();
  });
</script>
    <!--
$(document).on('click', '#mybutton', function(){
    var ID = $(this).data('id');
    $('#confirmbutton').data('id', ID); //set the data attribute on the modal button
});
$('#confirmbutton').click(function(){
    var ID = $(this).data('id');
    $.ajax({
        url: "appoinment_backend.php",
        type: "POST",
        data:{id : ID},
        success: function (data) {
          console.log(data);
          $("#delete_appointment").modal('hide');
          window.location.href='../admin/appointments.php';
        }
      });
});

} );

</script>  -->
       