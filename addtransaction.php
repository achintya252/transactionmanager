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
  <title>Add Transaction</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="style.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <style>
    .TransactionDetails{
  width: 320px;
  height: 420px;
  background: black;
  color: #fff;
  top: 55%;
  left: 50%;
  position: absolute;
  transform: translate(-50%, -50%);
  box-sizing: border-box;
  padding: 30px 30px;
  opacity: 100%;
}

}
h1{
margin: 0;
padding: 0 0 20px;
text-align: center;
font-size: 30px;
}
.TransactionDetails p{
  margin: 0;
  padding: 0;
  font-weight: bold;
}
.TransactionDetails input{
  width: 100%;
  margin-bottom: 20px;
}
.TransactionDetails input[type="text"], input[type="password"],input[type="date"]{
border: none;
border-bottom: 1px solid #fff;
background: transparent;
outline: none;
height: 40px;
color: #fff;
font-size: 16px;
}
.TransactionDetails input[type="submit"]{
  border: none;
  outline: none;
  height: 40px;
  background: #c94344;
  color: #fff;
  font-size: 18px;
  border-radius: 20px;
}
.TransactionDetails input[type="submit"]:hover{
  cursor: pointer;
  background: #ffc107;
  color: #000;
}
.TransactionDetails a{
  text-decoration: none;
  font-size: 15px;
  line-height: 20px;
  color: darkgrey;
}
.TransactionDetails a:hover{
  color: #ffc107;
}
.TransactionDetails select{
border: none;
border-bottom: 1px solid #fff;
background: transparent;
outline: none;
height: 30px;
width: 100%;
color: #fff;
font-size: 16px;
margin-bottom: 10px;
}
.TransactionDetails option{
border: none;
border-bottom: 1px solid #fff;
background: transparent;
outline: none;
height: 30px;
width: 100%;
color: black;
font-size: 16px;
}
  </style>
</head>
<body style="background-color: #004528">
<div class="TransactionDetails">
  <form method="post">
    <p>Nature of the transaction:</p>
        <select name="nature" autocomplete="off">
        <option>Choose an Option:</option>
        <option value="Deposit"> Deposit</option>
        <option value="Withdrawl"> Withdrawl</option>
        </select>
    <p>Date:</p>
    <input type="date" name="date" placeholder="Enter the date" required=""autocomplete="off">
        <p>Amount ( <i class="fa fa-inr" aria-hidden="true" style="font-size: 14px;"></i> ):</p>
    <input type="text" name="amt" placeholder="Enter the amount" required=""autocomplete="off">
    <p>Description:</p>
    <input type="text" name="desc" placeholder="Enter the description" required="" autocomplete="off">
    <input type="submit" name="save" value="save">
  </form>
  
</div>
<?php
if (isset($_POST['save'])){
  //to check the selected nature of the transaction:
  if($_POST['nature']=="Choose an Option:"){
    ?>
<div class="alert alert-danger fade in" style="width: 90%; margin: auto auto;">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>  Please choose the nature of the transaction!!!</strong>
</div><br><?php
}else{
  $DATE=$_POST['date'];
  //to insert the transaction
  $D=0;$W=0;$B=0;$OB=0;
$sql="SELECT `O_Balance` FROM users where username= '$_SESSION[Username]' " ;
$res=mysqli_query($db1,$sql);
while($row=mysqli_fetch_assoc($res)){
  $OB=$row['O_Balance'];
}
$sql1="SELECT `nature`,`amt` FROM transaction where username= '$_SESSION[Username]' and `date`<='$_POST[date]'" ;
$res1=mysqli_query($db1,$sql1);
while($row1=mysqli_fetch_assoc($res1)){
  if($row1['nature']=="Deposit"){
    $Amount=$row1['amt'];
    $D=$D+$Amount;
  }
if($row1['nature']=="Withdrawl"){
   $Amount1=$row1['amt'];
    $W=$W+$Amount1;
  }}
  $B=$OB+$D-$W;
  if($_POST['nature']=="Deposit"){
  $B1=$B+$_POST['amt'];  
  mysqli_query($db1,"INSERT INTO `transaction` (`Username`, `date`, `nature`, `amt`, `description`, `bal`,`d_amt`) VALUES ('$_SESSION[Username]', '$_POST[date]', '$_POST[nature]', '$_POST[amt]', '$_POST[desc]', $B1, '$_POST[amt]');");
  }
  if($_POST['nature']=="Withdrawl"){
  $B1=$B-$_POST['amt'];  
  mysqli_query($db1,"INSERT INTO `transaction` (`Username`, `date`, `nature`, `amt`, `description`, `bal`,`w_amt`) VALUES ('$_SESSION[Username]', '$_POST[date]', '$_POST[nature]', '$_POST[amt]', '$_POST[desc]', $B1, '$_POST[amt]');");
  }?>
<div class="alert alert-success fade in" style="width: 90%; margin: auto auto;">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>  Transaction saved!!!</strong>
</div><br>
  <?php
  //to update the balance of the future dates:

$q1="SELECT * FROM transaction where username= '$_SESSION[Username]' and `date`> '$_POST[date]' ";
$query1=mysqli_query($db1,$q1);
while ($res3= mysqli_fetch_array($query1)) {

$sql3="SELECT `nature`,`amt`,`date`,`id`,`bal` FROM transaction where username= '$_SESSION[Username]' and `date`>'$_POST[date]'" ;
 $ID=$res3['id'];
 $BAL=$res3['bal'];
 $DATE=$res3['date'];
if($_POST['nature']=="Deposit"){
    $Amount1=$_POST['amt'];
    $BAL=$BAL+$Amount1;
  }
if($_POST['nature']=="Withdrawl"){
   $Amount1=$_POST['amt'];
    $BAL=$BAL-$Amount1;
  }
  $v=mysqli_query($db1, "UPDATE `transaction` SET `bal`=$BAL WHERE Username='$_SESSION[Username]'and `date`='$res3[date]' and `id`='$ID';");


}


}
}

?> 
</body>
</html>