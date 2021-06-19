<?php
define("HOSTNAME","localhost");
        define("USERNAME","root");
        define("PASSWORD","");
        define("DBNAME","hosp");
 $con = mysqli_connect(HOSTNAME,USERNAME,PASSWORD,DBNAME) or die("can not connect to database.");
session_start();
if (isset($_SESSION['userid']) == "") {
header("Location: home.php");
}

if(isset($_GET['code']))
{
echo $activation_code = $_GET['code'];
$query = "SELECT * from users where activation_code = '$activation_code'";
$fire = mysqli_query($con,$query);
$row=mysqli_fetch_array($fire,MYSQLI_ASSOC);
echo  $_SESSION['userid'] = $row['userid'];
}

?>
<!DOCTYPE html>
<html >
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
	<h2>Home</h2><?php if(isset($_COOKIE['username'])) {echo $_COOKIE['username'];} ?></h2>
	<a href="logout.php">Logout</a>
<form method="post" action="">
<input type="text" name="otp" value="<?=$otp; ?>">
<input type="text" name="activation_code" value="<?=$activation_code; ?>">
<input type="text" name="name" placeholder="enater name" required="">
<input type="email" name="email" placeholder="enater email" required="">
<input type="password" name="password" placeholder="enater password" required=""> 

 <input type="submit" name="register">              
           </form>

    	<h2>Login</h2>
<form method="post" action="">
<input type="email" name="email" placeholder="enater email" required="">
<input type="password" name="password" placeholder="enater password" required=""> 
<input type="checkbox" name="rememberme">remember
 <input type="submit" name="login">
 
  </body>
</html>