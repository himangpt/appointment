<?php include_once '../admin/include/config.php'; 
session_start();
if(!isset($_SESSION['doctorid']))
{
    echo "<script>window.location='doctor-login.php';</script>";
}
//$_GET['patientid'];
//$_GET['appid'];
 if(isset($_GET['patientid']) && isset($_GET['appid']))
 {
 $query=mysqli_query($con,"UPDATE appoinment SET appstatus='Confirm' WHERE patientid='$_GET[patientid]' and appoinmentid='$_GET[appid]'");
  }
?>
<?php include_once 'header.php'; ?>
<div class="page-wrapper">
      <div class="content">
      <ul class="nav nav-pills nav-pills-primary nav-justified">
    <li class="nav-item">
    <a href="javascript:void();" data-target="#profile" data-toggle="pill" class="nav-link active"><i class="icon-user"></i> <span class="hidden-xs">Prescription Data</span></a>
    </li>
    <li class="nav-item">
    <a href="javascript:void();" data-target="#messages" data-toggle="pill" class="nav-link"><i class="fa fa-lock"></i> <span class="hidden-xs">Appoinment Data</span></a>
    </li>
    <li class="nav-item">
    <a href="javascript:void();" data-target="#edit" data-toggle="pill" class="nav-link"><i class="icon-note"></i> <span class="hidden-xs">Patient Data</span></a>
    </li>
    </ul>
    <div class="tab-content p-3">
    <div class="tab-pane active" id="profile">
       <div class="col-sm-12 col-9 text-right m-b-20">
                        <a href="add-prescription.php?patientid=<?php echo $_GET['patientid']; ?>&appid=<?php echo $_GET['appid']; ?>" 
                         class="btn btn btn-primary btn-rounded float-right"><i class="fa fa-plus"></i> Add Prescription</a>
                    </div>
              <div class="table-responsive">
            <table class="table table-striped custom-table" id="example">
                <thead>
                  <tr>
                    <th>Doctor Name</th>
                    <th>Patient Name</th>
                    <th>Prescription Date</th>
                    <th>Diagnose</th>
                    <th>Medicine</th>
                    <th>Test</th>
                    <th>Status</th>
                    <th>Print</th>
                    <th class="text-right">Action</th>
                  </tr>
                </thead>
                <tbody>
                                    <?php
                      $query=mysqli_query($con,"SELECT * from prescription_records AS pre 
                        INNER JOIN patient AS pat
                        ON pre.patientid=pat.patientid 
                        INNER JOIN doctor AS doc
                        ON pre.doctorid= doc.doctorid 
                        INNER JOIN appoinment AS app 
                        ON pre.appoinmentid=app.appoinmentid where pre.doctorid='$_SESSION[doctorid]' and pre.patientid='$_GET[patientid]' ORDER BY pre.prescriptionid DESC");
                      $sn=0;
                      while($row=mysqli_fetch_array($query)){
                      extract($row);              
                          ?>
                       <tr>
                    <td><?=$doctorname;?></td>
                    <td><?=$patientname;?></td>
                    <td><?=$prescriptiondate;?></td>
                    <td><?=$diagnose;?></td>
                    <td><?=$medicine;?></td>
                    <td><?=$test;?></td>
                    <?php if($status=='Active'){ ?>
                                        <td><span class="custom-badge status-green"><?=$status;?></span></td>
                                        <?php } ?>
                                        <?php if($status=='Inactive'){ ?>
                                            <td><span class="custom-badge status-red"><?=$status;?></span></td>
                                        <?php } ?>
                      <td><a href="presription.php?patientid=<?=$patientid;?>&appid=<?php echo $_GET['appid']; ?>&prescriptionid=<?=$prescriptionid;?>">Print</a></td>
                    <td class="text-right">
                      <div class="dropdown dropdown-action">
                        <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                        <div class="dropdown-menu dropdown-menu-right">
                          <a class="dropdown-item" href="edit-prescription.php?patientid=<?=$patientid;?>&appid=<?=$appoinmentid;?>"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                          <a class="dropdown-item" id="mybutton" href="#" data-toggle="modal" data-target="#delete_appointment" data-id="<?=$appoinmentid; ?>"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                        </div>
                      </div>
                    </td>
                  </tr>
                                <?php } ?>
                </tbody>
              </table>
            </div>
    </div>
    <div class="tab-pane" id="messages">
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
                        ON app.departmentid=dep.departmentid where app.doctorid='$_SESSION[doctorid]' and app.patientid='$_GET[patientid]' ORDER BY app.appoinmentid DESC");
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
    <div class="tab-pane" id="edit">
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
                                        $query=mysqli_query($con, "SELECT DISTINCT pat.patientname FROM appoinment AS app
          INNER JOIN patient AS pat
          ON app.patientid=pat.patientid 
          WHERE pat.status='Active' and doctorid='$_SESSION[doctorid]' and app.patientid='$_GET[patientid]'");
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
          </div>
            </div>
<?php include_once 'footer1.php'; ?>
