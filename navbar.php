<?php
session_start();
  ?>
  <style>
    .avatar{
  width: 20px;
  height: 20px;
  border-radius: 50%;
 
  
}
  </style>
  <nav class="navbar navbar-inverse" style="width: auto; height: auto;" >
  <div class="container-fluid">
    <div class="navbar-header">
      
    </div>
    <ul class="nav navbar-nav">
       <li class=""><a href="profile.php"><span class="glyphicon glyphicon-home"></span> Home </a>
       <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Profile
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="editprofile.php"><span class="glyphicon glyphicon-edit"></span> Edit Profile</a></li>
          <li><a href="changepassword.php"><span class="glyphicon glyphicon-pencil"></span> Change Passoword</a></li>
         <li><a href="deleteprofile.php"><span class="glyphicon glyphicon-trash"></span> Delete Profile</a></li>
        </ul>

      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Transaction
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="addtransaction.php"><span class="glyphicon glyphicon-plus"></span> Add transaction</a></li>
         
         <li><a href="viewtransaction.php"><span class="glyphicon glyphicon-th-list  
         "></span> View transactions</a></li>
         <li><a href="reportgenerator.php"><span class="glyphicon glyphicon-file"></span> Generate transaction report</a></li>
         
        </ul> 
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="">
        <div style="color: white">
      <?php echo $_SESSION['Username'];?>
     
      </div>
      </a></li>
      <li><a href="">
        <div>
      <?php echo "<img src='users/$_SESSION[image]' class='avatar'>";?>
      </div>
      </a></li>
      <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
    </ul>
  </div> 
</nav>