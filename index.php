<?php
include "connection1.php";
session_start();
?>
<!DOCTYPE html>
<head>
  <title>Login Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="style.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
    .logbox{
  width: 320px;
  height: 450px;
  background: #000;
  color: #fff;
  top: 50%;
  left: 50%;
  position: absolute;
  transform: translate(-50%, -50%);
  box-sizing: border-box;
  padding: 70px 30px;
  opacity: 100%;
}
.avatar{
  width: 100px;
  height: 100px;
  border-radius: 50%;
  position: absolute;
  top: -50px;
  left: calc(50% - 50px);
}
h1{
margin: 0;
padding: 0 0 20px;
text-align: center;
font-size: 30px;
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
.logbox a{
  text-decoration: none;
  font-size: 15px;
  line-height: 20px;
  color: darkgrey;
}
.logbox a:hover{
  color: #ffc107;
}
  </style>
</head>

<body style="background-color: #004528">
  <div class="logbox">
    <img src="admin.jpg" class="avatar">
    <h1>Login Here</h1>
    <form method="post" action="">
      <p>Username:</p>
     <input type="text" name="uname" placeholder="Enter your username" required="" autocomplete="off">
     <p>Password:</p>
     <input type="password" name="pword" placeholder="Enter your password" required="" autocomplete="off">
     <input type="submit" name="login" value="Login">
     <a href="retrivepassword.php">Forgot your password?</a><br>
     <a href="registration.php">Do not have an account?</a>
    </form>
  </div>
  <?php
   if(isset($_POST['login'])){
$count=0;
$res=mysqli_query($db1,"SELECT * FROM `users` where Username= '$_POST[uname]' and Password= '$_POST[pword]';");
$count=mysqli_num_rows($res);
if($count==0){
  ?><br>
<div class="alert alert-danger fade in" style="width: 90%;margin: auto auto;">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>  Incorrect Username or Password</strong>
</div><br>

  <?php

}else{
  $img;
  $result= mysqli_query($db1,"SELECT * FROM `users` where Username= '$_POST[uname]';") or die(mysql_error());
  while($row =mysqli_fetch_assoc($result))
  {
    $img=$row['Image'];
    
  }
  $_SESSION['Username']=$_POST['uname'];
  $_SESSION['image']=$img;
   
  ?>
<script type="text/javascript">

window.location="profile.php";
</script>
<?php
}
}
  ?>
</body>
    
</html>
