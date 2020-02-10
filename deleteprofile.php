<?php
include "navbar.php";
include "connection1.php";include "connection.php";
ob_start();
 ob_end_clean();
 if(isset($_SESSION["Username"])){

 }else{
  ob_start();
  header("location:index.php");
  ob_end_clean();
 }
?>
<!DOCTYPE html>
<html>
<head><title> Delete  Profile</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script><style>
.logbox{
	width: 320px;
	height: 250px;
	background: black;
	color: #fff;
	top: 40%;
	left: 50%;
	position: absolute;
	transform: translate(-50%, -50%);
	box-sizing: border-box;
	padding: 30px 30px;
	
}

.logbox p{
  margin: 0;
  padding: 0;
  font-weight: bold;
  font-size: 16px;
}
.logbox input{
  width: 100%;
  margin-bottom: 20px;
}
.logbox input[type="text"], input[type="password"]{
border: none;
border-bottom: 1px solid #fff;
background: transparent;
outline: none;
height: 40px;
color: #fff;
font-size: 16px;
}
.logbox input[type="submit"]{
  border: none;
  outline: none;
  height: 40px;
  background: #c94344;
  color: #fff;
  font-size: 18px;
  border-radius: 20px;
}
.logbox input[type="submit"]:hover{
  cursor: pointer;
  background: #ffc107;
  color: #000;
}
</style>
</head>
<body style="background-color: #004528">
	<div class="logbox"> <form method="post">
    <p>Username:</p>
  <input type="text" name="username" value="<?php echo $_SESSION['Username']?>" readonly="">
  <p>Password:</p>
  <input type="password" name="password" placeholder="Enter your password" required="">
  <input type="submit" name="Delete" value="Delete Profile"></form>
</div>
<?php
if (isset($_POST['Delete'])){
  $count=0;
$res=mysqli_query($db1,"SELECT * FROM `users` where Username= '$_POST[username]' and Password='$_POST[password]' ;");
$count=mysqli_num_rows($res);
if($count==1){
  $q1=mysql_query("Select* from users where Username='$_SESSION[Username]'");
    $row1=mysql_fetch_array($q1);
    $img=$row1["Image"];
    unlink("users/".$img);
mysqli_query($db1, "DELETE from users WHERE Username= '$_SESSION[Username]'");
mysqli_query($db1, "DELETE from transaction WHERE Username= '$_SESSION[Username]'");
 
session_destroy();
?>
<script type="text/javascript">
  window.location="index.php";
</script>
<?php
}
else{
  ?>
<div class="alert alert-danger fade in" style="width: 500px;margin: auto auto;">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>  Incorrect Password </strong>

<?php
}}
?>
</body>
</html>