<?php
include "connection1.php";
?>
<!DOCTYPE html>
<head>
  <title>Registration Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="style.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
    .logbox{
  width: 340px;
  height: 620px;
  background: #000;
  color: #fff;
  top: 50%;
  left: 50%;
  position: absolute;
  transform: translate(-50%, -50%);
  box-sizing: border-box;
  padding: 10px 20px;
  
}
.logbox select{
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
.logbox option{
border: none;
border-bottom: 1px solid #fff;
background: transparent;
outline: none;
height: 30px;
width: 100%;
color: black;
font-size: 16px;
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
  margin-bottom: 10px;
}
.logbox input[type="text"], input[type="password"], input[type="file"]{
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
    
    <h1>Register Here</h1>
    <form method="post" action="" enctype="multipart/form-data">
    <p>Image:</p>
    <input type="file" name="image" required="">
    <p> Name:</p>
    <input type="text" name="name" placeholder="Enter Name" required="" autocomplete="off"> 
    <p> Username:</p>
    <input type="text" name="username" placeholder="Enter Username" required="" autocomplete="off">
    <p> Password:</p>
        <input type="password" name="password" placeholder="Enter Password" required="" autocomplete="off"> 
    <p> Security Question:</p>
   <select name="Seq_Q">
        <option>Choose an Option:</option>
        <option value="What is your nick name?"> What is your nick name?</option>
        <option value="What is the name of your best friend?"> Who is your best friend?</option>
        <option value="What is your pet's name?"> What is your pet's name?</option>
        <option value="What is your favorite dish?"> What is your favorite dish?</option>
        <option value="What is your favorite movie?"> What is your favorite movie?</option>
        <option value="What is your mother's maiden name?"> What is your mother's maiden name?</option>
        <option value="What is the name of the first school you attended?"> What is the name of the first school you attended?</option>
        <option value="What is your sibling's middle name? dish?"> What is your sibling's middle name? dish?</option>
        <option value=" What is the name of your favorite childhood teacher?"> What is the name of your favorite childhood teacher?</option>
    </select>
    <p> Answer:</p>
    <input type="text" name="Seq_A" placeholder="Enter Answer" required="" autocomplete="off">
    <p> Opening Balance:</p>
    <input type="text" name="oBalance" placeholder="Enter opening balance" required="" autocomplete="off">
    <input type="submit" name="register" value="Register">
    <a href="index.php"> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  Login</a><br>
    
    </form>
  </div>
  <!--button coding-->
  <!-- 1st to check wether the username is unique or not-->
<?php
if (isset($_POST['register'])) {

  $count=0;
$sql="SELECT `Username`  FROM users";
$res=mysqli_query($db1,$sql);
while($row=mysqli_fetch_assoc($res)){
  if($row['Username']==$_POST['username']){
    $count=$count+1;
  }
}if($count==0){
$uname=$_POST['username'];
$filename = $uname." ".$_FILES['image']['name'];
$filetmpname = $_FILES['image']['tmp_name'];
//folder where images will be uploaded
$folder = 'users/';
//function for saving the uploaded images in a specific folder
move_uploaded_file($filetmpname, $folder.$filename);
//inserting image details (ie image name) in the database
mysqli_query($db1,"INSERT INTO `users` (`Username`, `Password`, `Name`, `Seq_Q`, `Seq_A`, `Image`, `O_Balance`) VALUES ('$_POST[username]', '$_POST[password]', '$_POST[name]', '$_POST[Seq_Q]', '$_POST[Seq_A]', '$filename', '$_POST[oBalance]');");


   
 ?>
<script type="text/javascript">
  alert("Account Created");

</script>
 <?php 


}else{
  ?>
<script type="text/javascript">
  alert("Username is not unique!!!");
</script>
  <?php
}}
?>
  <!-- 2nd th check wether the image name is unique or not-->
</body>
    
</html>