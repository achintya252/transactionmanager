 <?php
 include "connection1.php";
 ?>
 <?php
if(isset($_POST['search'])){
	$count=0;
$res=mysqli_query($db1,"SELECT * FROM `users` where Username= '$_POST[username]';");
$count=mysqli_num_rows($res);
if($count==0){
	?>
<br>
<div class="alert alert-danger fade in" style="width: 90%;margin: auto auto;">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>  Incorrect Username</strong></div><br>

	<?php
$seq_Q="";
$user="";
$pass="";$seq_A="";
}else{
	
	$result= mysqli_query($db1,"SELECT * FROM `users` where Username= '$_POST[username]';") or die(mysql_error());
	while($row =mysqli_fetch_assoc($result))
	{
		$seq_Q=$row['Seq_Q'];
		$user=$row['Username'];
		$pass="";$seq_A="";
	}
}
}
?>
 <?php
if(isset($_POST['retrive'])){
	$count=0;
$res=mysqli_query($db1,"SELECT * FROM `users` where Seq_A= '$_POST[seq_A]';");
$count=mysqli_num_rows($res);
if($count==0){
	?><br>
<div class="alert alert-danger fade in" style="width: 90%;margin: auto auto;">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>  Incorrect Answer</strong></div><br>


	<?php
$seq_Q="";
$user="";
$pass="";
$seq_A="";
}else{
	
	$result= mysqli_query($db1,"SELECT * FROM `users` where Username= '$_POST[username]' &&  Seq_A= '$_POST[seq_A]';") or die(mysql_error());
	while($row =mysqli_fetch_assoc($result))
	{
		$seq_Q=$row['Seq_Q'];
		$user=$row['Username'];
		$seq_A=$row['Seq_A'];
		$pass=$row['Password'];
	}
}
}
?>
<?php
$username = filter_input(INPUT_POST, 'username');
$password = filter_input(INPUT_POST, 'seq_Q');
if (!empty($username)){
	
}else{

$seq_Q="";
$user="";
$pass="";
$seq_A="";
}
?>

<!DOCTYPE html>
<html>
<head>
	<title> Retrive Password</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<style>
  body{
  margin: 0px;
  padding: 0px;
  
  background-position: center;
  font-family: sans-serif;
  
}
  .retbox{
  width: 320px;
	height: 420px;
	background: #000;
	color: #fff;
	top: 50%;
	left: 50%;
	position: absolute;
	transform: translate(-50%, -50%);
	box-sizing: border-box;
	padding: 30px 30px;
}

.retbox p{
  margin: 0;
  padding: 0;
  font-weight: bold;
}
.retbox input{
  width: 100%;
  margin-bottom: 10px;
}
.retbox input[type="text"], input[type="password"]{
border: none;
border-bottom: 1px solid #fff;
background: transparent;
outline: none;
height: 30px;
color: #fff;
font-size: 16px;
}
.retbox input[type="submit"]{
  border: none;
  outline: none;
  height: 40px;
  background: #c94344;
  color: #fff;
  font-size: 18px;
  border-radius: 20px;
}
.retbox select{
border: none;
border-bottom: 1px solid #fff;
background: transparent;
outline: none;
height: 30px;
width: 100%;
color: #fff;
font-size: 16px;
}
.retbox option{
border: none;
border-bottom: 1px solid #fff;
background: transparent;
outline: none;
height: 30px;
width: 100%;
color: black;
font-size: 16px;
}
.retbox input[type="submit"]:hover{
  cursor: pointer;
  background: #ffc107;
  color: #000;
}
.retbox a{
  text-decoration: none;
  font-size: 15px;
  line-height: 18px;
  color: darkgrey;
}
.retbox a:hover{
  color: #ffc107;
}
h1{
margin: 0;
padding: 0 0 20px;
text-align: center;
font-size: 22px;
}
</style>
</head>
<body style="background-color: #004528">
<div class="retbox">
	
	
	<form name="" method="post" enctype="multipart/form-data">
		<p> Username:</p>
		<input type="text" name="username" placeholder="Enter your Username" value="<?php echo $user;?>"autocomplete="off" required="">
		
		<input type="submit" name="search" value="Search"><br>

		<p> Security Question:</p>
		<input type="text" name="seq_Q" value="<?php echo $seq_Q;?>"autocomplete="off" readonly="" placeholder="Your security question">
		<p> Answer:</p>
		<input type="text" name="seq_A" placeholder="Enter the Answer" value="<?php echo $seq_A;?>"autocomplete="off">
		<input type="submit" name="retrive" value="Retrive"><br>
		<p> Password:</p>
        <input type="text" name="password" value="<?php echo $pass;?>"autocomplete="off" readonly=""placeholder="Your password">
        
      &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  <a href="index.php" > Login </a>
	</form>
</div>

</body>
</html>