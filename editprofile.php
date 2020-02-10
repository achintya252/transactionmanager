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
 $IOB=0;
$result= mysqli_query($db1,"SELECT * FROM `users` where Username= '$_SESSION[Username]';") or die(mysql_error());
	while($row =mysqli_fetch_assoc($result))
	{
		$NAME=$row['Name'];
		$O_BALANCE=$row['O_Balance'];
		$SEQ_Q=$row['Seq_Q'];
		$SEQ_A=$row['Seq_A'];
		$IOB=$row['O_Balance'];
	}
if(isset($_POST['update'])){ 

	
$q1="SELECT * FROM transaction where username='$_SESSION[Username]'";

$query1=mysqli_query($db1,$q1);
while ($res1= mysqli_fetch_array($query1)) {
$UB=$_POST['O_BALANCE'];	
$NB=$UB-$IOB;
$NB1=$res1['bal']+$NB;
$ID=$res1['id'];
$v1=mysqli_query($db1, "UPDATE `transaction` SET `bal`='$NB1' WHERE id='$ID';");
}$v=mysqli_query($db1, "UPDATE `users` SET `Name`='$_POST[name]', `O_BALANCE`='$_POST[O_BALANCE]', `Seq_A`='$_POST[seq_a]' WHERE Username='$_POST[username]';");
$result1= mysqli_query($db1,"SELECT * FROM `users` where Username= '$_SESSION[Username]';") or die(mysql_error());
	while($row1 =mysqli_fetch_assoc($result1))
	{
		$NAME=$row1['Name'];
		$O_BALANCE=$row1['O_Balance'];
		$SEQ_Q=$row1['Seq_Q'];
		$SEQ_A=$row1['Seq_A'];
	}
	?>
	<div class="alert alert-success fade in" style="width: 90%;margin: auto auto;">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>  Profile Updated</strong>
</div><br>
<?php

}
?>
 

<!DOCTYPE html>
<html>
<head>
	<title> Edit Teacher's Profile</title>
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
	width: 350px;
	height: 500px;
	background: #000;
	color: #fff;
	top: 60%;
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
		<input type="text" name="username" placeholder="Enter your Username" value="<?php echo $_SESSION['Username'];?>" readonly="" autocomplete="off">
		
		<p> Name:</p>
		<input type="text" name="name" placeholder="Enter name" value="<?php echo $NAME;?>" autocomplete="off" required="">
		
		 <p> Security Question:</p>
		<input type="text" name="seq_q" placeholder="" readonly="" value="<?php echo $SEQ_Q;?>" autocomplete="off"required="">
    	<p> Answer:</p>
		<input type="text" name="seq_a" placeholder="Enter Answer" value="<?php echo $SEQ_A;?>" autocomplete="off"required="">
       
        <p> Opening Balance:</p>
		<input type="text" name="O_BALANCE" placeholder="Enter class" value="<?php echo $O_BALANCE;?>" autocomplete="off"required="">
       <input type="submit" name="update" value="Update"><br>
	</form>
</div>

	
</body>
</html>