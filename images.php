<?php
include "connection.php";
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
    
  </style>
</head>

<body><form method="post" action="images.php" enctype="multipart/form-data">
  <input type="text" name="name">
<input type="file" name="image">
<input type="submit" name="save" value="save">
<input type="submit" name="delete" value="delete">
<input type="submit" name="see" value="see">
</form>
<?php


if(isset($_POST['save'])){echo "string";
  $name=$_POST['name'];
  $img= $name."".$_FILES['image']['name'];
  $insert= "insert into image values ('NULL', '$name', '$img')";
  if(mysql_query($insert)){
   move_uploaded_file($_FILES['image']['tmp_name'], "users/$img" );
   }}
   if(isset($_POST['delete'])){
    $q1=mysql_query("select* from image where name='dsdsdfsdfs'");
    $row1=mysql_fetch_array($q1);
    $img=$row1["dir"];
    unlink("users/".$img);
   }
   if(isset($_POST['see'])){
    include "connection1.php";
    $result= mysqli_query($db1,"SELECT * FROM `image` where Name= 'dsdsdfsdfs';") or die(mysql_error());
  while($row =mysqli_fetch_assoc($result))
  {
    $IMAGE=$row['dir'];
    
  }
 echo "<img src='users/$_SESSION[image]' class='avatar'>";
   }
?>
















</body>
</html>