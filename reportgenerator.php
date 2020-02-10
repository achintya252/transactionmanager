 <?php
 include "connection.php";
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
<!DOCTYPE html>
<html>
<head>
	<title> Report Generator</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
    	.logbox{
	width: 320px;
	height: 350px;
	background: #000;
	color: #fff;
	top: 50%;
	left: 50%;
	position: absolute;
	transform: translate(-50%, -50%);
	box-sizing: border-box;
	padding: 30px 30px;
	
}

h1{
margin: 0;
padding: 0 0 20px;
text-align: center;
font-size: 22px;
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
.logbox input[type="text"],input[type="date"]{
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
	
	<h1> Generate Report</h1>
	<form method="get" action="generatepdf.php">
		<p> From:</p>
		<input autocomplete="off" type="date" name="from" placeholder="Enter the date" required="">
		<p> To:</p>
        <input autocomplete="off" type="date" name="to" placeholder="Enter the date" required="" >
        <input type="submit" name="generatepdf" value="Generate Pdf"><br>

	</form>
	<?php
	if (isset($_GET['generatepdf'])) {
		
	

	}
	?>
</div>
</body>
</html>