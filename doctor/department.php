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
							<table class="table table-striped custom-table mb-0 datatable">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Department Name</th>
                                        <th>Department Description</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                      $query=mysqli_query($con,"SELECT * from doctor AS doc 
                      INNER JOIN department AS dep
                      ON dep.departmentid=doc.departmentid
                      where doc.doctorid='$_SESSION[doctorid]' ORDER BY dep.departmentid");
                      $sn=0;
                      while($row=mysqli_fetch_array($query)){
                      extract($row);              
                          ?>
                       <tr>
                        <td><?php 
                          $sn = $sn+1; 
                          echo $sn;
                      ?></td>
                             
                                        <td><?= $departmentname; ?></td>
                                        <td><?= $description; ?></td>
                                        <?php if($status=='Active'){ ?>
                                        <td><span class="custom-badge status-green"><?=$status;?></span></td>
                                        <?php } ?>
                                        <?php if($status=='Inactive'){ ?>
                                            <td><span class="custom-badge status-red"><?=$status;?></span></td>
                                        <?php } ?>
                                         <!-- <td class="text-right">
                                            <div class="dropdown dropdown-action">
                                                <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item edit_data" href="#" id="<?php echo $departmentid; ?>"  ><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                                    <a class="dropdown-item" id="mybutton" href="" data-toggle="modal" data-target="#delete_department" data-id="<?=$departmentid; ?>"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
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
            