
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
    if(isset($_POST['edittransaction']))
    { 
$NAmount=0;$Diff=0;$EBAL=0;$TBAL=0;$TBAL1=0;
$ETDate=$_POST['dateinformat'];
$EId = $_POST['Id'];
$NAmount=$_POST['amount'];
$EDescription = $_POST['description'];
$ENature = $_POST['Nature'];
$sql2="SELECT `amt`,`bal` FROM transaction where username= '$_SESSION[Username]' and `id`='$EId'" ;
$res2=mysqli_query($db1,$sql2);
while($row2=mysqli_fetch_assoc($res2)){
$Amount=$row2['amt'];
$EBAL=$row2['bal'];
$Diff=$NAmount-$Amount;


}

$sql="SELECT `bal`,`id`,`date` FROM transaction where username= '$_SESSION[Username]' and `date`>'$ETDate'" ;
$res=mysqli_query($db1,$sql);
while($row=mysqli_fetch_assoc($res)){
  $IDS=$row['id'];
  $TBAL=$row['bal'];
  if($ENature=="Deposit"){
  $TBAL=$TBAL+$Diff;
}if($ENature=="Withdrawl"){
  $TBAL=$TBAL-$Diff;}

  $v=mysqli_query($db1, "UPDATE transaction SET bal= '$TBAL' WHERE id='$IDS';");
 }
$EId = $_POST['Id'];
$ETDate=$_POST['dateinformat'];
$sql1="SELECT `bal`,`id`,`date` FROM transaction where username= '$_SESSION[Username]' and `date`='$ETDate' and id> '$EId' " ;
$res1=mysqli_query($db1,$sql1);
while($row1=mysqli_fetch_assoc($res1)){
  $IDS1=$row1['id'];
  $TBAL1=$row1['bal'];
  if($ENature=="Deposit"){
  $TBAL1=$TBAL1+$Diff;
}if($ENature=="Withdrawl"){
  $TBAL1=$TBAL1-$Diff;
}  
$u=mysqli_query($db1, "UPDATE transaction SET bal= '$TBAL1' WHERE id='$IDS1';");
}
if($ENature=="Deposit"){
  $EBAL=$EBAL+$Diff;
$x=mysqli_query($db1, "UPDATE transaction SET description= '$EDescription', amt='$NAmount', d_amt='$NAmount',bal='$EBAL' WHERE id='$EId';");


}if($ENature=="Withdrawl"){
  $EBAL=$EBAL-$Diff;
$x=mysqli_query($db1, "UPDATE transaction SET description= '$EDescription', amt='$NAmount', w_amt='$NAmount',bal='$EBAL' WHERE id='$EId';");
}

 header("Location:viewtransaction.php");


      
       /* $EId = $_POST['Id'];
        
        echo"<br>";echo $EId;echo"<br>";echo $EDescription;
        
       */
          
        }
?>
 
