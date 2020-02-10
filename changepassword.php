 <?php
 include "connection1.php";
 include "navbar.php";
 ob_start();
 ob_end_clean();
 if(isset($_SESSION["Username"])){

 }else{
 	ob_start();
 	header("location:index.php");
 	ob_end_clean();
 }
 ?>
 <?php
 $USERNAME="";
if(isset($_POST['save'])){
$USERNAME=$_POST['username'];
	$count=0;
$res=mysqli_query($db1,"SELECT * FROM `users` where Username= '$_POST[username]';");
$count=mysqli_num_rows($res);
if($count==0){
	?>
<div class="alert alert-danger fade in" style="width:90%;margin: auto auto;">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>  Incorrect Username</strong>
</div><br>

	<?php

$USERNAME="";
}else{
	$v=mysqli_query($db1, "UPDATE `users` SET `Password`='$_POST[password]' WHERE Username='$USERNAME';");
	?>
<div class="alert alert-success fade in" style="width: 90%;margin: auto auto;">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>  Password Changed</strong>
</div><br>
	<?php
}
}
?>
 
<!DOCTYPE html>
<html>
<head>
	<title> Change Password</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<style >
	.logbox{
	width: 320px;
	height: 270px;
	background: #000;
	color: #fff;
	top:45%;
	left: 50%;
	position: absolute;
	transform: translate(-50%, -50%);
	box-sizing: border-box;
	padding: 40px 30px;
	
}

.logbox p{
	margin: 0;
	padding: 0;
	font-weight: bold;
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
<div class="logbox">
	
	
	<form name="" method="post" enctype="multipart/form-data">
		<p> Username:</p>
		<input type="text" name="username" placeholder="Enter your Username" value="<?php echo $_SESSION['Username'];?>" required="" autocomplete="off" readonly="">
		
		

		<p> New password:</p>
		<input type="password" name="password" placeholder="Enter your new password" required="" >
		
		<input type="submit" name="save" value="Update"><br>
		
      
	</form>
</div>

</body>
</html>