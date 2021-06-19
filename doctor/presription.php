<?php include_once '../admin/include/config.php'; 
session_start();
if(!isset($_SESSION['doctorid']))
{
    echo "<script>window.location='doctor-login.php';</script>";
}
$_GET['prescriptionid'];
$query = "SELECT * from prescription_records AS pre 
                        INNER JOIN patient AS pat
                        ON pre.patientid=pat.patientid 
                        INNER JOIN doctor AS doc
                        ON pre.doctorid= doc.doctorid 
                        INNER JOIN appoinment AS app 
                        ON pre.appoinmentid=app.appoinmentid where pre.doctorid='$_SESSION[doctorid]' and pre.patientid='$_GET[patientid]' and pre.prescriptionid='$_GET[prescriptionid]' ORDER BY pre.prescriptionid DESC";
$fire = mysqli_query($con,$query);
$row=mysqli_fetch_array($fire,MYSQLI_ASSOC);
extract($row);
?>
<!DOCTYPE html>
<html lang="en">


<!-- invoice-view24:07-->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    <title>Preclinic - Medical & Hospital - Bootstrap 4 Admin Template</title>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <!--[if lt IE 9]>
        <script src="assets/js/html5shiv.min.js"></script>
        <script src="assets/js/respond.min.js"></script>
    <![endif]-->

</head>

<body>
        <div class="page-wrapper" style="margin-left:100px; margin-right:100px; margin-top:-51px;">
            <div class="content">
                <div class="row">
                    <div class="col-sm-5 col-4">
                        <h4 class="page-title">Invoice</h4>
                    </div>
                    <div class="col-sm-7 col-8 text-right m-b-30">
                        <div class="btn-group btn-group-sm">
                            <button class="btn btn-white">CSV</button>
                            <button class="btn btn-white">PDF</button>
                            <button class="btn btn-white" name="print" id="print" value="Print" onclick="myFunction()"><i class="fa fa-print fa-lg"></i> Print</button>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row custom-invoice">
                                    <div class="col-6 col-sm-6 m-b-20">
                                        <img src="assets/img/logo-dark.png" class="inv-logo" alt="">
                                        <ul class="list-unstyled">
                                            <li>PreClinic</li>
                                            <li>3864 Quiet Valley Lane,</li>
                                            <li>Sherman Oaks, CA, 91403</li>
                                            <li>GST No:</li>
                                        </ul>
                                    </div>
                                    <div class="col-6 col-sm-6 m-b-20">
                                        <div class="invoice-details">
                                            <h3 class="text-uppercase">Patient ID #INV-0001</h3>
                                            <ul class="list-unstyled">
                                                <li>Date: <span><?=$prescriptiondate;?></span></li>
                                                <li>Patient Name: <span><?=$patientname;?></span></li>
                                                <li>AGE/SEX: <span>34,<?=$gender;?></span></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6 col-lg-6 m-b-20">
										
											<h5>Diagnose:</h5>
											<ul class="list-unstyled">
												<li>
													<h5><strong><?=$symptom;?></strong></h5>
												</li>
												
											</ul>
										
                                    </div>
                                   
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Test</th>
                                                <th>Medicibe</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                           
                                            <tr>
                                                <td>1</td>
                                                <td><?=$test;?></td>
                                                <td><?=$medicine;?></td>
                                                
                                            </tr>
                                          
                                        </tbody>
                                 
                                    </table>
                                </div>
                                <div>
                                    
                                    <div class="invoice-info">
                                        <h5>Other information</h5>
                                        <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus sed dictum ligula, cursus blandit risus. Maecenas eget metus non tellus dignissim aliquam ut a ex. Maecenas sed vehicula dui, ac suscipit lacus. Sed finibus leo vitae lorem interdum, eu scelerisque tellus fermentum. Curabitur sit amet lacinia lorem. Nullam finibus pellentesque libero, eu finibus sapien interdum vel</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
     <?php include_once 'footer1.php';?>
    
<script type="text/javascript">
function myFunction() {
    window.print({  
    margins:77,
    });
}


</script>