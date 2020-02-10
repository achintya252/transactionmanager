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
<!DOCTYPE html>
<html>
<head>
	<title> Teacher's Profile</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<style>
.logbox button[type="button"]{
	border: none;
	outline: none;
	height: 40px;
	background: #c94344;
	color: #fff;
	font-size: 18px;
	border-radius: 10px;
	float: right;
	margin-right: 60px;

}
.logbox button[type="button"]:hover{
	cursor: pointer;
	background: #ffc107;
	color: #000;}
.logbox1{
width: 750px;
margin: 0px auto;

}
</style>
</head>
<body style="background-color: #004528">
<div class="logbox1">
	<?php
$q=mysqli_query($db1, "SELECT * FROM `users` WHERE Username= '$_SESSION[Username]';")
	?>
	<h1 style="text-align: center; color: white;">Profile Details:</h1>
	<?php
$row=mysqli_fetch_assoc($q);
$num=$row['O_Balance'];
$format=number_format($num);
	?>
	<?php
	echo "<b>";
echo "<table class='table table-bordered' style='color: white; font-size: 20px; font-family: Times New Roman; width: 80%; margin: auto auto;'>";
echo "<tr>";
echo "<td>"; echo " Name:";echo "</td>";
echo "<td>"; echo $row['Name']; echo "</td>";
echo "</tr>";


echo "<tr>";
echo "<td>"; echo " Username:";echo "</td>";
echo "<td>"; echo $row['Username']; echo "</td>";
echo "</tr>";

echo "<tr>";
echo "<td>"; echo " Sequirity Question:";echo "</td>";
echo "<td>"; echo $row['Seq_Q']; echo "</td>";
echo "</tr>";

echo "<tr>";
echo "<td>"; echo " Sequirity Answer:";echo "</td>";
echo "<td>"; echo $row['Seq_A']; echo "</td>";
echo "</tr>";

echo "<tr>";
echo "<td>"; echo " Opening Balance:";echo "</td>";
echo "<td>";?> <i class="fa fa-inr" aria-hidden="true" style="font-size: 20px;"></i><?php echo " ".$format; echo "</td>";
echo "</tr>";

echo "</table>";
echo"</b>";
	?>
</div>

</body>
</html>