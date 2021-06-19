<?php
        define("HOSTNAME","localhost");
        define("USERNAME","root");
        define("PASSWORD","");
        define("DBNAME","hosp");

        $con = mysqli_connect(HOSTNAME,USERNAME,PASSWORD,DBNAME) or die("can not connect to database.");
?>
<?php
date_default_timezone_set('Asia/Kolkata');
 $dt = date("d-m-Y H:i");
 $otp_str = str_shuffle("0123456789");
echo $otp_str;
 $otp = substr($otp_str,0,5);

 $act_str = rand(10000,100000);

 $activation_code = str_shuffle("abcdefghijklmn".$act_str);

if(isset($_POST['patientname']) && ($_POST['email']) && ($_POST['mobile']) && ($_POST['password']))
{
echo $patientname = $_POST['patientname'];
echo $email =mysqli_real_escape_string($con,$_POST['email']);
echo $mobile =mysqli_real_escape_string($con,$_POST['mobile']);
echo $password =mysqli_real_escape_string($con,$_POST['password']);
$emailquery = "select * from `users` where email='$email'";
$email_fire=mysqli_query($con,$emailquery);
echo $emailquery;
$email_count = mysqli_num_rows($email_fire);
if($email_count>0)
{
  echo '0';
}
}
?>