<?php include_once '../admin/include/config.php'; 
session_start();
if(!isset($_SESSION['doctorid']))
{
    echo "<script>window.location='doctor-login.php';</script>";
}
?>
<?php
    $doctorid = $_SESSION['doctorid'];
    $query1=mysqli_query($con,"SELECT * from doctor AS doc INNER JOIN department AS dep ON doc.departmentid = dep.departmentid where doc.doctorid=$doctorid");
    $row = mysqli_fetch_array($query1);
    extract($row);
?>
<?php include_once 'header.php'; ?>
        <div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-sm-7 col-6">
                        <h4 class="page-title">My Profile</h4>
                    </div>

                    <div class="col-sm-5 col-6 text-right m-b-30">
                        <a href="edit-doctor.php?doctor_id=<?=$doctorid;?>" class="btn btn-primary btn-rounded"><i class="fa fa-plus"></i> Edit Profile</a>
                    </div>
                </div>
                <div class="card-box profile-header">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="profile-view">
                                <div class="profile-img-wrap">
                                    <div class="profile-img">
                                        <a href="#"><img class="avatar" src="../admin/assets/img/<?php echo $image; ?>" alt=""></a>
                                    </div>
                                </div>
                                <div class="profile-basic">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="profile-info-left">
                                                <h3 class="user-name m-t-0 mb-0"><?=$doctorname;?></h3>
                                                <small class="text-muted"><?=$departmentname;?></small>
                                                <div class="staff-id">Employee ID : DR-000<?=$doctorid;?></div>
                                                <div class="staff-msg"><a href="chat.html" class="btn btn-primary">Send Message</a></div>
                                            </div>
                                        </div>
                                        <div class="col-md-7">
                                            <ul class="personal-info">
                                                <li>
                                                    <span class="title">Phone:</span>
                                                    <span class="text"><a href="#"><?=$mobile;?></a></span>
                                                </li>
                                                <li>
                                                    <span class="title">Email:</span>
                                                    <span class="text"><a href="#"><?=$email;?></a></span>
                                                </li>
                                                <li>
                                                    <span class="title">Birthday:</span>
                                                    <span class="text">3rd March</span>
                                                </li>
                                                <li>
                                                    <span class="title">Address:</span>
                                                    <span class="text">714 Burwell Heights Road, Bridge City, TX, 77611</span>
                                                </li>
                                                <li>
                                                    <span class="title">Status</span>
                                                    <span class="text"><a href="#"><?=$status;?></a></span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>                        
                        </div>
                    </div>
                </div>
				<div class="profile-tabs">
					<ul class="nav nav-tabs nav-tabs-bottom">
						<li class="nav-item"><a class="nav-link active" href="#about-cont" data-toggle="tab">About</a></li>
						<li class="nav-item"><a class="nav-link" href="#bottom-tab2" data-toggle="tab">Profile</a></li>
						<li class="nav-item"><a class="nav-link" href="#bottom-tab3" data-toggle="tab">Messages</a></li>
					</ul>

					<div class="tab-content">
						<div class="tab-pane show active" id="about-cont">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card-box">
                            <h3 class="card-title">Education Informations</h3>
                            <div class="experience-box">
                                <ul class="experience-list">
                                    <li>
                                        <div class="experience-user">
                                            <div class="before-circle"></div>
                                        </div>
                                        <div class="experience-content">
                                            <div class="timeline-content">
                                                <a href="#/" class="name"><?=$euniversity;?></a>
                                                <div><?=$edegree;?></div>
                                                <!-- <span class="time">2001 - 2003</span> -->
                                            </div>
                                        </div>
                                    </li>
                                    <!-- <li>
                                        <div class="experience-user">
                                            <div class="before-circle"></div>
                                        </div>
                                        <div class="experience-content">
                                            <div class="timeline-content">
                                                <a href="#/" class="name">International College of Medical Science (PG)</a>
                                                <div>MD - Obstetrics & Gynaecology</div>
                                                <span class="time">1997 - 2001</span>
                                            </div>
                                        </div>
                                    </li> -->
                                </ul>
                            </div>
                        </div>
                        <div class="card-box mb-0">
                            <h3 class="card-title">Experience</h3>
                            <div class="experience-box">
                                <ul class="experience-list">
                                    <li>
                                        <div class="experience-user">
                                            <div class="before-circle"></div>
                                        </div>
                                        <div class="experience-content">
                                            <div class="timeline-content">
                                                <a href="#/" class="name"><?=$experience;?></a>
                                               <!--  <span class="time">Jan 2014 - Present (4 years 8 months)</span> -->
                                            </div>
                                        </div>
                                    </li>
                                    <!-- <li>
                                        <div class="experience-user">
                                            <div class="before-circle"></div>
                                        </div>
                                        <div class="experience-content">
                                            <div class="timeline-content">
                                                <a href="#/" class="name">Consultant Gynecologist</a>
                                                <span class="time">Jan 2009 - Present (6 years 1 month)</span>
                                            </div>
                                        </div>
                                    </li> -->
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
						</div>
						<div class="tab-pane" id="bottom-tab2">
							Tab content 2
						</div>
						<div class="tab-pane" id="bottom-tab3">
							Tab content 3
						</div>
					</div>
				</div>
            </div>
            <?php include_once 'footer1.php';?>