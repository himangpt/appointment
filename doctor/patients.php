<?php include_once 'include/config.php'; 
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
                        <h4 class="page-title">Patients</h4>
                    </div>
                   
                </div>
				<div class="row">
					<div class="col-md-12">
						<div class="table-responsive">
							<table class="table table-border table-striped custom-table datatable mb-0">
								<thead>
									<tr>
                                        <th>#</th>
										<th>Name</th>
										<th>Date Of Birth</th>
										<th>Address</th>
										<th>Phone</th>
										<th>Email</th>
										<th>Status</th>
									</tr>
								</thead>
								<tbody>
									              <?php
                      $query=mysqli_query($con,"SELECT DISTINCT pat.patientname FROM appoinment AS app 
                        INNER JOIN patient AS pat
                        ON app.patientid=pat.patientid 
                        INNER JOIN doctor AS doc
                        ON app.doctorid= doc.doctorid 
                        INNER JOIN department AS dep 
                        ON app.departmentid=dep.departmentid where app.doctorid='$_SESSION[doctorid]'");
                      $sn=0;
                      while($row=mysqli_fetch_array($query)){
                      extract($row);              
                          ?>
                       <tr>
                        <td><?php 
                          $sn = $sn+1; 
                          echo "PAT-".$sn;
                      ?></td>
								
										<td><img width="28" height="28" src="assets/img/user.jpg" class="rounded-circle m-r-5" alt=""><?=$patientname;?></td>
										<td><?=$dob;?></td>
										<td><?=$address;?></td>
										<td><?=$mobile;?></td>
										<td><?=$email;?></td>
										<?php if($status=='Active'){ ?>
                                        <td><span class="custom-badge status-green"><?=$status;?></span></td>
                                        <?php } ?>
                                        <?php if($status=='Inactive'){ ?>
                                            <td><span class="custom-badge status-red"><?=$status;?></span></td>
                                        <?php } ?>
										
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
            