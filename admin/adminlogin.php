<?php include_once 'include/config.php'; 
session_start();
if (isset($_SESSION['adminid']) != "") {
header("Location: index.php");
}
?>
<html>
<head>
  <style type="text/css">
@import url(http://weloveiconfonts.com/api/?family=entypo);
@import url(https://fonts.googleapis.com/css?family=Roboto);

/* zocial */
[class*="entypo-"]:before {
  font-family: 'entypo', sans-serif;
}

*,
*:before,
*:after {
  -moz-box-sizing: border-box;
  -webkit-box-sizing: border-box;
  box-sizing: border-box; 
}


h2 {
  color:rgba(255,255,255,.8);
  margin-left:12px;
}

body {
  background: #272125;
  font-family: 'Roboto', sans-serif;
  
}

form {
  position:relative;
  margin: 50px auto;
  width: 380px;
  height: auto;
}

input {
  padding: 16px;
  border-radius:7px;
  border:0px;
  background: rgba(255,255,255,.2);
  display: block;
  margin: 15px;
  width: 300px;  
  color:white;
  font-size:18px;
  height: 54px;
}

input:focus {
  outline-color: rgba(0,0,0,0);
  background: rgba(255,255,255,.95);
  color: #e74c3c;
}

button {
  float:right;
  height: 121px;
  width: 50px;
  border: 0px;
  background: #e74c3c;
  border-radius:7px;
  padding: 10px;
  color:white;
  font-size:22px;
}

.inputUserIcon {
  position:absolute;
  top:68px;
  right: 80px;
  color:white;
}

.inputPassIcon {
  position:absolute;
  top:136px;
  right: 80px;
  color:white;
}

input::-webkit-input-placeholder {
  color: white;
}

input:focus::-webkit-input-placeholder {
  color: #e74c3c;
}

  </style>
</head>
<body>
<form action="" method="POST">
  <h2><span class="entypo-login"><i class="fa fa-sign-in"></i></span> Admin Login</h2>
  <button class="submit" name="submit"><span class="entypo-lock"><i class="fa fa-lock"></i></span></button>
  <span class="entypo-user inputUserIcon">
     <i class="fa fa-user"></i>
   </span>
  <input type="text" class="user" name="username" placeholder="ursername"/>
  <span class="entypo-key inputPassIcon">
     <i class="fa fa-key"></i>
   </span>
  <input type="password" class="pass" name="password" placeholder="password"/>
</form>
</body>
</html>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
<script type="text/javascript">

$(".user").focusin(function(){
  $(".inputUserIcon").css("color", "#e74c3c");
}).focusout(function(){
  $(".inputUserIcon").css("color", "white");
});

$(".pass").focusin(function(){
  $(".inputPassIcon").css("color", "#e74c3c");
}).focusout(function(){
  $(".inputPassIcon").css("color", "white");
});
</script>
<?php
if (isset($_POST['submit'])){
  $username = mysqli_real_escape_string($con,$_POST['username']);
$password  = mysqli_real_escape_string($con,$_POST['password']);
$query = "SELECT * FROM admin WHERE username = '$username' and password ='$password'";
$fire = mysqli_query($con,$query);
$row=mysqli_fetch_array($fire,MYSQLI_ASSOC);
if ($row['password'] == $password)
{
$_SESSION['adminid'] = $row['adminid'];
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