<?php
define("HOSTNAME","localhost");
        define("USERNAME","root");
        define("PASSWORD","");
        define("DBNAME","hosp");
 $con = mysqli_connect(HOSTNAME,USERNAME,PASSWORD,DBNAME) or die("can not connect to database.");
 session_start();
 if(!$_SESSION['userid'])
{
  echo "<script>window.location='index.php';</script>";
}
if(isset($_GET['code']))
{
$activation_code = $_GET['code'];
$query = "SELECT * from users where activation_code = '$activation_code'";
$fire = mysqli_query($con,$query);
$row=mysqli_fetch_array($fire,MYSQLI_ASSOC);
$_SESSION['userid'] = $row['userid'];
extract($row);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Medicio landing page template for Health niche</title>

  <!-- css -->
 <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
  <!-- <link rel="stylesheet" type="text/css" href="plugins/cubeportfolio/css/cubeportfolio.min.css"> 
  <link href="css/nivo-lightbox.css" rel="stylesheet" />
  <link href="css/nivo-lightbox-theme/default/default.css" rel="stylesheet" type="text/css" /> 
  <link href="css/owl.carousel.css" rel="stylesheet" media="screen" />
  <link href="css/owl.theme.css" rel="stylesheet" media="screen" />
  <link href="css/animate.css" rel="stylesheet" />-->
  <link href="css/style.css" rel="stylesheet">

  <!-- boxed bg -->
  <!-- <link id="bodybg" href="bodybg/bg1.css" rel="stylesheet" type="text/css" /> -->
  <!-- template skin -->
  <link id="t-colors" href="color/default.css" rel="stylesheet">
  <!-- =======================================================
    Theme Name: Medicio
    Theme URL: https://bootstrapmade.com/medicio-free-bootstrap-theme/
    Author: BootstrapMade
    Author URL: https://bootstrapmade.com
  ======================================================= -->

 <link href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>



<body id="page-top" data-spy="scroll" data-target=".navbar-custom">

  <div id="wrapper">

    <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
      <div class="top-area">
        <div class="container">
          <div class="row">
            <div class="col-sm-6 col-md-6">
              <p class="bold text-left">Monday - Saturday, 8am to 10pm </p>
            </div>
            <div class="col-sm-6 col-md-6">
              <p class="bold text-right">Call us now +00 000 00 000</p>
            </div>
          </div>
        </div>
      </div>
      <div class="container navigation">

        <div class="navbar-header page-scroll">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                    <i class="fa fa-bars"></i>
                </button>
          <a class="navbar-brand" href="index.php">
                    <img src="img/logo.png" alt="" width="150" height="40" />
                </a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#intro">Home</a></li>
            <li><a href="#service">Appointment</a></li>
          <!--   <li><a href="#doctor">Doctors</a></li>
            <li><a href="#facilities">Facilities</a></li>
            <li><a href="#pricing">Pricing</a></li> -->
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="badge custom-badge red pull-right">Extra</span><?=$patientname;?><b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="logout.php">Logout</a></li>
                <!-- <li><a href="index-form.html">Home Form</a></li>
                <li><a href="index-video.html">Home video</a></li>
 -->              </ul>
            </li>
          </ul>
        </div>
        <!-- /.navbar-collapse -->
      </div>
      <!-- /.container -->
    </nav>
    <section id="intro" class="intro">
      <div class="intro-content">
        <div class="container">
          <div class="row">
            <div class="col-lg-5">
              <div class="wow fadeInDown" data-wow-offset="0" data-wow-delay="0.1s">
                <h2 class="h-ultra">Medicio medical group</h2>
              </div>
              <div class="wow fadeInUp" data-wow-offset="0" data-wow-delay="0.1s">
                <h4 class="h-light">Provide <span class="color">best quality healthcare</span> for you</h4>
              </div>
              <div class="well well-trans">
                <div class="wow fadeInRight" data-wow-delay="0.1s">

                  <ul class="lead-list">
                    <li><span class="fa fa-check fa-2x icon-success"></span> <span class="list"><strong>Add Appointment for patient</strong><br />Check ur name / select Patient Name</span></li>
                    <li><span class="fa fa-check fa-2x icon-success"></span> <span class="list"><strong>Choose your Department</strong><br />Children Doctor/ENT Specialist...</span></li>
                    <li><span class="fa fa-check fa-2x icon-success"></span> <span class="list"><strong>Choose your Date and Slot</strong><br />Morning/Evening</span></li>
                  </ul>

                </div>
              </div>


            </div>
            <div class="col-lg-7">
              <div class="form-wrapper">
                <div class="wow fadeInRight" data-wow-duration="2s" data-wow-delay="0.2s">

                  <div class="panel panel-skin">
                    <div class="panel-heading">
                      <h3 class="panel-title"><span class="fa fa-pencil-square-o"></span> Make an appoinment <small>(It's free!)</small></h3>
                    </div>
                    <div class="panel-body">
                       
                <form action="" method="post"  id="register">
                        <div class="row">
             <input type="text" name="otp" value="<?=$otp; ?>">
            <input type="text" name="activation_code" value="<?=$activation_code; ?>">

                          <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="form-group">
                              <label>Patient Name</label>
                           <input type="text" name="patientid" id="patientid" value="<?=$patientname; ?>" class="form-control">  
                              
                            </div>
                          </div>
                          <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="form-group">
                              <label>Department Name</label>
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
                        </div>

                        <div class="row">
                          <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="form-group">
                              <label>Doctor</label>
                              <select class="form-control select" name="doctorid" id="doctorid">
											<option>Select</option>
											<option></option>
                                        </select>
                            </div>
                          </div>
                          <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="form-group">
                              <label>Date</label>
                             <input type="text" class="form-control datetimepicker" id="date" name="date">
                            </div>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="form-group">
                              <label>Symptom</label>
                       <textarea class="form-control"  id="msg" name="msg"></textarea>
                            
                            </div>
                          </div>
                          <div class="col-xs-6 col-sm-6 col-md-6">
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
                        </div>
                      </form>
                    
 
                    </div>
                  </div>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section id="service" class="home-section paddingtop-40">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="callaction bg-gray">
              <div class="row">
                <div class="col-md-12">
                  <div class="wow fadeInUp" data-wow-delay="0.1s">
                    <div class="cta-text">
                      <h3>In an emergency? Need help now?</h3>
                      <div class="table-responsive" id="myTable">
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
										<th class="text-right">Action</th>
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
                        ON app.departmentid=dep.departmentid ORDER BY app.appoinmentid DESC");
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
                                        <td><span class="badge custom-badge red">
                                        	<?=$appstatus;?></span></td>
                                        <?php } ?>
                                        <?php if($appstatus=='Pending'){ ?>
                                            <td><span class="badge custom-badge success"><?=$appstatus;?></span></td>
                                        <?php } ?>
										<td class="text-right">
											<div class="dropdown dropdown-action">
												
							
													<a class="dropdown-item" id="mybutton" href="#" data-toggle="modal" data-target="#delete_appointment" data-id="<?=$appoinmentid; ?>"><i class="fa fa-trash-o m-r-5"></i></a>&nbsp;&nbsp;&nbsp;
                          <a href="#"><i class="fa fa-file-pdf-o m-r-5"></i></a>
												
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
                <!-- <div class="col-md-2">
                  <div class="wow lightSpeedIn" data-wow-delay="0.1s">
                    <div class="cta-btn">
                      <a href="#" class="btn btn-skin btn-lg">Book an appoinment</a>
                    </div>
                  </div>
                </div> -->
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <div id="delete_appointment" class="modal fade delete-modal" role="dialog">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body text-center">
                        <img src="admin/assets/img/sent.png" alt="" width="50" height="46">
                        <h3>Are you sure want to delete this Department?</h3>
                        <div class="m-t-20"> <a href="#" class="btn btn-primary" data-dismiss="modal">Close</a>
                            <button type="submit" class="btn btn-danger" id="confirmbutton" >Delete</button>
                        </div>
                    </div>
                </div>
            </div>
            </div>
<?php include_once 'footer.php';?>
<script type="text/javascript">
$(document).ready(function(){
$.noConflict();
$('#example').DataTable();
$('#departmentid').on('change',function(){
 var departmentID = $(this).val();
 if(departmentID){
            $.ajax({
                type:'POST',
                url:'admin/departdrop.php',
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
        alert(shift);
        var patientid = $('#patientid').val();
        alert(patientid);
        var departmentid = $('#departmentid').val();
        alert(departmentid);
        var doctorid = $('#doctorid').val();
        alert(doctorid);
        var date = $('#date').val();
        alert(date);
        var msg = $('#msg').val();
        alert(msg);
        $.post(
         "admin/timeslot.php",
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
