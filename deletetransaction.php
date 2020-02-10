 <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="style.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 <?php
 include "connection1.php";
 include "navbar.php" ;
 ob_start();
 ob_end_clean();
 if(isset($_SESSION["Username"])){

 }else{
  ob_start();
  header("location:index.php");
  ob_end_clean();
 }
    if(isset($_POST['deletetransaction']))
    {   
        $DDate=$_POST['dateinformat1'];
        $DId = $_POST['Id'];
        $DNature = $_POST['Nature'];
        $DD=$_POST['deposit'];
        $DW=$_POST['withdrawl'];
        $BALANCE=0; 
       
$sql="SELECT `bal`,`id` FROM transaction where username= '$_SESSION[Username]' and `date`>'$DDate' " ;
$res=mysqli_query($db1,$sql);
while($row=mysqli_fetch_assoc($res)){
	$TBAL=$row['bal'];
  $TID=$row['id'];


if ($DNature=="Deposit") {
echo "  ";echo $TID;echo "  ";
$BALANCE= $TBAL-$DD;
echo $BALANCE;
}
if ($DNature=="Withdrawl") {
echo "  ";echo $TID;echo "  ";
$BALANCE= $TBAL+$DW;
echo $BALANCE;
}
$query = "UPDATE transaction SET bal='$BALANCE' WHERE id='$TID'";
$query_run = mysqli_query($db1, $query);

}
                                          
$sql="SELECT `bal`,`id`,`date` FROM transaction where username= '$_SESSION[Username]' and `date`='$DDate' and `id`>'$DId'" ;
$res=mysqli_query($db1,$sql);
while($row=mysqli_fetch_assoc($res)){
	$TBAL=$row['bal'];
	
	$TID=$row['id'];

if ($DNature=="Deposit") {
	echo "  "; echo $TID;echo "  ";
    $BALANCE= $TBAL-$DD;
echo $BALANCE;
}
if ($DNature=="Withdrawl") {
echo "  ";echo $TID;echo "  ";
$BALANCE= $TBAL+$DW;
echo $BALANCE;
}
$query = "UPDATE transaction SET bal='$BALANCE' WHERE id='$TID'";
$query_run = mysqli_query($db1, $query);
}
   mysqli_query($db1, "DELETE from transaction WHERE id= $DId");
    
           header("Location:viewtransaction.php");
          


        }
?>
 
