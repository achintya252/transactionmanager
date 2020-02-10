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
	<title>View Transaction</title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="style.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  
</head>
<body style="background-color: #004528">
  <div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title" id="exampleModalLabel"> Delete Transaction 
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="font-size: 40px;">
          <span aria-hidden="true">&times;</span>
        </button></h1>
      </div>

        <form action="deletetransaction.php" method="POST">

            <div class="modal-body">
               <div class="form-group">
                    <input class="hidden" type="text" name="dateinformat1" id="Date3" class="form-control"  readonly="" >
                    <input class="hidden" type="text" name="Id" id="Id" class="form-control"  readonly="" >
               </div>

                <div class="form-group">
                   
                    <input class="hidden" type="text" name="Nature" id="Nature" class="form-control"  readonly="" >
                </div>                
                
                <div class="form-group">
                    <label> Date: </label>
                    <input type="text" name="date" id="Date" class="form-control"  readonly="">
                </div>

               <div class="form-group">
                    <label> Deposit Amount: </label>
                    <input type="text" name="deposit" id="Deposit" class="form-control"readonly="">
                </div>

                
                <div class="form-group">
                    <label> Withdrawl Amount: </label>
                    <input type="text" name="withdrawl" id="Withdrawl" class="form-control" readonly="" >
                </div>

                <div class="form-group">
                    <label> Description: </label>
                    <input type="text" name="description" id="Description" class="form-control" readonly="" >
                </div></div>

                      
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name="deletetransaction" class="btn btn-danger">Delete Transaction</button>
            </div>
        </form>

    </div>
  </div>
</div>

<div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title" id="exampleModalLabel"> Edit Transaction 
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="font-size:40px;">
          <span aria-hidden="true">&times;</span>
        </button></h1>
      </div>

        <form action="edittransaction.php" method="POST">

            <div class="modal-body">
              <input class="hidden" type="text" name="dateinformat" id="Date2" class="form-control"  readonly="" >
              <input class="hidden" type="text" name="Id" id="Id1" class="form-control"  readonly="" >
             
               
            <div class="form-group">
              <label> Date: </label>
              <input type="text" name="date" id="Date1" class="form-control"  readonly="">
            </div>

            <div class="form-group">
              <label> Nature: </label>
               <input type="text" name="Nature" id="Nature1" class="form-control"  readonly="" >
            </div>
            
            <div class="form-group">
              <label>  Amount: </label>
              <input type="text" name="amount" id="AMT" class="form-control" autocomplete="off" required="">
            </div>

            <div class="form-group">
              <label> Description: </label>
              <input type="text" name="description" id="Description1" class="form-control" autocomplete="off" required="" >
            </div></div>

                      
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name="edittransaction" class="btn btn-primary">Save Changes</button>
            </div>
        </form>

    </div>
  </div>
</div>

<input class="form-control" id="myInput" type="text" placeholder="Search.." style="width: 500px; margin: auto auto;font-weight: bold;"><br><br>

<?php
echo "<table class='table table-bordered' style='width: 90%;margin:50px 50px; color:white; padding=20px;'>";
echo "<thead>";
  echo "<tr align=center>"; 

    echo "<th style='width: 100px;'class='hidden'>"; echo "Date"; "</th>";
    echo "<th style='width: 100px;'class='hidden'>"; echo "Date"; "</th>";
    echo "<th style='width: 100px;'>"; echo "Date"; "</th>";
    echo "<th style='width: 120px;'>"; echo "Deposit Amount"; echo"</th>";
    echo "<th style='width: 120px;'>"; echo "Withdrawl Amount"; echo "</th>";
    echo "<th align=center>"; echo "Description"; "</th>";
    echo "<th style='width: 100px;'>"; echo "Balance"; echo"</th>";
    echo "<th style='width: 100px;'>"; echo "EDIT"; echo "</th>";
    echo "<th style='width: 100px;'>"; echo "DELETE"; echo "</th>";
    echo "<th style='width: 100px;'class='hidden'>"; echo "Date"; "</th>";
    echo "<th style='width: 100px;'class='hidden'>"; echo "Date"; "</th>";
    echo "</tr>";echo "</theah>";
   /*Coding for geting the data*/

$q1="SELECT * FROM transaction where username='$_SESSION[Username]' ORDER BY `transaction`.`date` ASC";

$query1=mysqli_query($db1,$q1);
while ($res1= mysqli_fetch_array($query1)) {
    $DATE=$res1['date'];
    $DATE1=explode('-', $DATE);
$d=$DATE1[2];
$m=$DATE1[1];
$y=$DATE1[0];
$DATE2=$d.'-'.$m.'-'.$y;
    echo "<tbody id='myTable' align=center>";
    echo "<tr>";
    echo "<td class='hidden'>"; echo $res1['id'];   echo"</td>";
     echo "<td class='hidden'>"; echo $res1['nature'];   echo"</td>";
    echo "<td>"; echo $DATE2;  echo "</td>";
    echo "<td>";?><i class="fa fa-inr" aria-hidden="true" style="font-size: 15px;"></i><?php echo" ".$res1['d_amt'];  echo "</td>";
    echo "<td>";?><i class="fa fa-inr" aria-hidden="true" style="font-size: 15px;"></i><?php echo" ".$res1['w_amt']; echo "</td>";
    echo "<td align=center>"; echo $res1['description']; echo "</td>";
    echo "<td class='hidden'>"; echo $res1['amt'];   echo"</td>";
    echo "<td>";?><i class="fa fa-inr" aria-hidden="true" style="font-size: 15px;"></i><?php echo" ".$res1['bal']; echo "</td>";
    echo "<td>"; echo "<button type='button' class='btn btn-primary editbtn'> EDIT </button>"; ?><?php echo "</td> ";
    echo "<td>"; echo "<button type='button' class='btn btn-danger deletebtn'> DELETE </button>"; ?><?php echo "</td> ";
    echo "<td class='hidden'>"; echo $res1['date'];   echo"</td>";
    echo "<td class='hidden'>"; echo $res1['amt'];   echo"</td>";
    echo "</tr>";
    echo"</tbody>";
    /*data saved in the table*/
 } /* Coding over*/
echo "</table>";
?> <script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
<script>

$(document).ready(function () {
    $('.deletebtn').on('click', function() {
        
        $('#deletemodal').modal('show');

        
            $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function() {
                return $(this).text();
            }).get();

            console.log(data);
            $('#Id').val(data[0]);
            $('#Nature').val(data[1]);

            $('#Date').val(data[2]);
            $('#Deposit').val(data[3]);
            
            $('#Withdrawl').val(data[4]);
            $('#Description').val(data[5]);
             $('#Date3').val(data[10]);
    });
});

</script>

<script>

$(document).ready(function () {
    $('.editbtn').on('click', function() {
        
        $('#editmodal').modal('show');

        
            $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function() {
                return $(this).text();
            }).get();

            console.log(data);
            $('#Id1').val(data[0]);
            $('#Nature1').val(data[1]);

            $('#Date1').val(data[2]);
            $('#Deposit1').val(data[3]);
            
            $('#Withdrawl1').val(data[4]);
            $('#Description1').val(data[5]);
            $('#Date2').val(data[10]);
            $('#AMT').val(data[11]);
    });
});

</script>
</body>
</html>
