<?php
require('fpdf17/fpdf.php');
include "connection1.php";

ob_start();
session_start();
 ob_end_clean();
 if(isset($_SESSION["Username"])){

 }else{
  ob_start();
  header("location:index.php");
  ob_end_clean();
   }
   $name;
   

class PDF extends FPDF {
  function Header(){
   ;
    $this->SetTitle($_SESSION['Username']." Transaction Details");
    $this->SetFont('Courier','B',30);
    $this->AddFont('Rupee','','Rupee_Foradian.php');
    $this->AddFont('Agency','','AGENCYR.php');
//Cell(width , height , text , border , end line , [align] )

$this->Cell(287 ,5,"Transaction Details",0,1, 'C');
$this->Ln(10);
    
  }
  function Footer(){
    
    //Go to 1.5 cm from bottom
    $this->SetY(-15);
        
    $this->SetFont('Arial','B',12);
    
    //width = 0 means the cell is extended up to the right margin
    $this->Cell(0,10,'Page '.$this->PageNo()." of {pages}",0,0,'C');
  }
}


//A4 width : 219mm
//default margin : 10mm each side
//writable horizontal : 219-(10*2)=189mm

$pdf = new PDF('L','mm','A4'); //use new class

//define new alias for total page numbers
$pdf->AliasNbPages('{pages}');

$pdf->AddPage();

$from=$_GET['from'];
$FROM=explode('-', $from);
$d=$FROM[2];
$m=$FROM[1];
$y=$FROM[0];
$FROM1=$d.'-'.$m.'-'.$y;

$to=$_GET['to'];
$TO=explode('-', $to);
$d1=$TO[2];
$m1=$TO[1];
$y1=$TO[0];
$TO1=$d1.'-'.$m1.'-'.$y1;
  

$pdf->SetFont('Agency','',20);

$pdf->Cell(70 ,10,'Transactions From:',0,0);
$pdf->Cell(100,10,$FROM1,0,1);
$pdf->Ln(5);

$pdf->Cell(70 ,10,'Transactions To:',0,0);
$pdf->Cell(100,10,$TO1,0,1);
$pdf->Ln(10);

$q="SELECT * FROM users where username ='$_SESSION[Username]'"; 
$query=mysqli_query($db1,$q);
while ($res= mysqli_fetch_array($query)) {
$OB=$res['O_Balance'];
$OBalance=number_format($OB);

  
  }
  $pdf->SetFillColor(180,180,255);
    $pdf->SetDrawColor(180,180,255);
$pdf->Cell(250,10,"Opening Balance:",0,0,'R');
$pdf->SetFont('Rupee','',14);

$pdf->Cell(30,10,"` ".$OBalance." ",1,1,'R',true);
$pdf->Ln(5);
$pdf->SetFont('times','',14);
$pdf->SetFillColor(180,180,255);
    $pdf->SetDrawColor(180,180,255);
   // $pdf->Cell(19.5,5,'',1,0);
    $pdf->Cell(45,8,'Date',1,0,'C',true);
    $pdf->Cell(45,8,'Amount Deposited',1,0,'C',true);
    $pdf->Cell(45,8,'Amount Withdrawn',1,0,'C',true);
    $pdf->Cell(45,8,'Balance',1,0,'C',true);
    $pdf->Cell(100,8,'Description',1,1,'C',true);

$q1="SELECT * FROM transaction where username ='$_SESSION[Username]' and `date`>='$_GET[from]' and `date`<='$_GET[to]'ORDER BY `transaction`.`date` ASC "; 
$query1=mysqli_query($db1,$q1);
while ($res1= mysqli_fetch_array($query1)) {
$A=$res1['date'];
$A1=explode('-', $A);
$d2=$A1[2];
$m2=$A1[1];
$y2=$A1[0];
$A2=$d2.'-'.$m2.'-'.$y2;
$num=$res1['d_amt'];
$format=number_format($num);
$num1=$res1['w_amt'];
$num2=$res1['bal'];
$format1=number_format($num1);
$format2=number_format($num2);
  //$pdf->Cell(19.5,5,'',0,0);
  $pdf->SetFont('times','',14);
  $pdf->Cell(45,8,$A2,1,0,'C');
  $pdf->SetFont('Rupee','',14);
  $pdf->Cell(45,8,"` ".$format,1,0,'C');
  $pdf->Cell(45,8,"` ".$format1,1,0,'C');
  $pdf->Cell(45,8,"` ".$format2,1,0,'C');
  $pdf->SetFont('times','',14);
  $pdf->Cell(100,8,$res1['description'],1,1,'C');
  
  }



$pdf->Output();
?>
