<?php

$host = "127.0.0.1";
$dbusername = "root";
$dbpassword = "";
$dbname = "money";
$db1 = mysqli_connect($host, $dbusername, $dbpassword, $dbname);
if (!$db1){
die("Connection Error: " . mysqli_connect_error());
}
 //echo "connected successfully";


?>