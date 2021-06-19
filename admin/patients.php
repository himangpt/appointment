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
                    <div class="col-sm-4 col-3">
                        <h4 class="page-title">Patients</h4>
                    </div>
                    <div class="col-sm-8 col-9 text-right m-b-20">
                        <a href="add-patient.php" class="btn btn btn-primary btn-rounded float-right"><i class="fa fa-plus"></i> Add Patient</a>
                    </div>
                </div>
				<div class="row">
					<div class="col-md-12">
						<div class="table-responsive">
							<table class="table table-border table-striped custom-table datatable mb-0">
								<thead>
									<tr>
										<th>Name</th>
										<th>Age</th>
										<th>Address</th>
										<th>Phone</th>
										<th>Email</th>
										<th>Status</th>
										<th class="text-right">Action</th>
									</tr>
								</thead>
								<tbody>
									<?php
                      $query=mysqli_query($con,"SELECT * from patient ORDER BY patientid ");
                      while($row=mysqli_fetch_array($query)){
                      extract($row);              
                          ?>
									<tr>
										<td><img width="28" height="28" src="assets/img/user.jpg" class="rounded-circle m-r-5" alt=""><?=$patientname;?></td>
										<td>35</td>
										<td><?=$address;?></td>
										<td><?=$mobile;?></td>
										<td><?=$email;?></td>
										<?php if($status=='Active'){ ?>
                                        <td><span class="custom-badge status-green"><?=$status;?></span></td>
                                        <?php } ?>
                                        <?php if($status=='Inactive'){ ?>
                                            <td><span class="custom-badge status-red"><?=$status;?></span></td>
                                        <?php } ?>
										<td class="text-right">
											<div class="dropdown dropdown-action">
												<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
												<div class="dropdown-menu dropdown-menu-right">
													<a class="dropdown-item" href="edit-patient.php?patient_id=<?=$patientid;?>"><i class="fa fa-pencil m-r-5"></i> Edit</a>
													<a class="dropdown-item" id="mybutton" href="#" data-toggle="modal" data-target="#delete_patient" data-id="<?=$patientid; ?>"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
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
                <div id="delete_patient" class="modal fade delete-modal" role="dialog">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body text-center">
                        <img src="assets/img/sent.png" alt="" width="50" height="46">
                        <h3>Are you sure want to delete this Department?</h3>
                        <div class="m-t-20"> <a href="#" class="btn btn-white" data-dismiss="modal">Close</a>
                            <button type="submit" class="btn btn-danger" id="confirmbutton">Delete</button>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            <?php include_once 'footer1.php';?>
            <script type="text/javascript">
$(document).ready(function(){
$(document).on('click', '#mybutton', function(){
    var ID = $(this).data('id');
    $('#confirmbutton').data('id', ID); //set the data attribute on the modal button
});
$('#confirmbutton').click(function(){
    var ID = $(this).data('id');
     alert(ID);
    $.ajax({
        url: "patient_backend.php",
        type: "POST",
        data:{id : ID},
        success: function (data) {
            console.log(data);
          window.location.href='patients.php';
        }
      });
});
});
</script>