<?php include_once '../admin/include/config.php'; 
session_start();
if(isset($_SESSION['doctorid'])!="")
{
header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">


<!-- login23:11-->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="../admin/assets/img/favicon.ico">
    <title>Preclinic - Medical & Hospital - Bootstrap 4 Admin Template</title>
    <link rel="stylesheet" type="text/css" href="../admin/assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../admin/assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../admin/assets/css/style.css">
    <!--[if lt IE 9]>
		<script src="assets/js/html5shiv.min.js"></script>
		<script src="assets/js/respond.min.js"></script>
	<![endif]-->
</head>

<body>
    <div class="main-wrapper account-wrapper">
        <div class="account-page">
			<div class="account-center">
				<div class="account-box">
                    <form action="" class="form-signin" method="post">
						<div class="account-logo">
                            <a href="index-2.html"><img src="assets/img/logo-dark.png" alt=""></a>
                        </div>
                        <div class="form-group">
                            <label>Username or Email</label>
                            <input type="text" autofocus="" class="form-control" name="username" required="">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" name="password">
                        </div>
                        <div class="form-group text-center">
                            <button type="submit" name="submit" class="btn btn-primary account-btn">Login</button>
                        </div>
                    </form>
                </div>
			</div>
        </div>
    </div>
    <script src="../admin/assets/js/jquery-3.2.1.min.js"></script>
	<script src="../admin/assets/js/popper.min.js"></script>
    <script src="../admin/assets/js/bootstrap.min.js"></script>
    <script src="../admin/assets/js/app.js"></script>
</body>


<!-- login23:12-->
</html>
<?php
if (isset($_POST['submit'])){
  $username = mysqli_real_escape_string($con,$_POST['username']);
$password  = mysqli_real_escape_string($con,$_POST['password']);
$query = "SELECT * FROM doctor WHERE email = '$username' and password ='$password'";
$fire = mysqli_query($con,$query);
$row=mysqli_fetch_array($fire,MYSQLI_ASSOC);
if ($row['password'] == $password)
{
$_SESSION['doctorid'] = $row['doctorid'];
?>
<script type="text/javascript">
console.log('Login Success');
</script>
<?php
header("Location: index.php");
} else {
?>
<script type="text/javascript">
    console.log("Wrong input");
    swal("Wrong password","Enter Correct password","error");
</script>
<?php
}
}
?>