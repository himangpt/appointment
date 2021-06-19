<?php
        define("HOSTNAME","localhost");
        define("USERNAME","root");
        define("PASSWORD","");
        define("DBNAME","hosp");

        $con = mysqli_connect(HOSTNAME,USERNAME,PASSWORD,DBNAME) or die("can not connect to database.");

$email=$_POST['email'];
 $emailquery="select * from `patient` where email='$email'";
 $email_fire=mysqli_query($con,$emailquery);
 $email_count=mysqli_num_rows($email_fire);
 if($email_count == 1)
 {  	echo '0';

 }