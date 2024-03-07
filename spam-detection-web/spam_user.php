<?php 

session_start();
// include "navbar.php";
include "db.php";
?>
<!DOCTYPE html>
<html>
    <head>
        <title>spam users</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width", initial-scale=1> 
        <link rel="stylesheet" href="./bootstrap-3.4.1/css/bootstrap.min.css"> 
       <link rel="stylesheet" href="./css/socialmedia.css">  
    </head>
    <body>
<style>
           .navbar-inverse
            {
                 background-color:#2196f3;
                 border-color:#2196f3;
            }
            .navbar-inverse .navbar-brand
            {
                 color: white;
            }
            .navbar-inverse .navbar-brand:hover
            {
                 color:midnightblue;
            }
            .navbar-inverse .navbar-nav>li>a 
            {
             color: white;
            }
            .navbar-inverse .navbar-nav>li>a:hover
            {
             color:midnightblue;
            }
           .navbar-inverse .navbar-toggle 
            {
            border-color:#2196f3;
            }
            .navbar-inverse .navbar-toggle:focus, .navbar-inverse .navbar-toggle:hover
            {
               background-color:#2196f3;  
            }
            .navbar-inverse .navbar-collapse, .navbar-inverse .navbar-form 
            {
                border-color:#2196f3;
            }
            body
{
    background-color: #F8F9F9;
}
            body
            {
               background-color: #F8F9F9;
            }

            </style>
         <body>
         <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container-fluid">
              <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>                        
                </button>
                <a class="navbar-brand" href="admin.php">Social Media</a>
              </div>
              <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav navbar-right">
                <li><a href="admin_view.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
                        <!-- <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                        <li><a href="signup.php"><span class="glyphicon glyphicon-hand-right"></span> Sign-up</a></li>
                        <li><a href="admin.php"><span class="glyphicon glyphicon-user"></span> Admin</a></li> -->
                    </ul>
               
              </div>
            </div>
          </nav>
         <br><br><br>
        <div class="container row">
            <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-1 col-xs-offset-0">

          <h2>SPAM USERS</h2>
          <form action="spam_user.php" method="POST">
          <table class="table table-bordered table-responsive">
            <thead>
              <tr>
                <th>USER ID</th>
                <th>User Name</th>
                <th>E-Mail</th>
                <th>Contact No.</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody>
            <?php
$uid=0;
$result=mysqli_query($con,"select distinct(uid) from cmt where spam_ham='spam'");
              while($row=$result->fetch_assoc())
              {
                $uid=$row['uid'];
                $result1=mysqli_query($con,"select f_name,mail,mobileno,status from login where uid=$uid");
              while($row1=$result1->fetch_assoc())
              {
            ?>

              <tr>
                <td ><?php echo $row['uid'];?></td>

                <td ><?php echo $row1['f_name'];?></td>
                <td ><?php echo $row1['mail'];?></td>
                <td ><?php echo $row1['mobileno'];?></td>
                <td><?php echo $row1['status'];?> <button value="<?php echo $row['uid'];?>" class="btn btn-danger" name="btn">Block</button>&nbsp;<button value="<?php echo $row['uid'];?>" class="btn btn-success" name="btn2">Unblock</button></td>
              </tr>
              <?php
           }
          }
          ?>
            </tbody>
          </table>
        </form>
         
          </div>
        </div>


         
        </body>
        <html>   
          <?php
          include('db.php');
          if(isset($_POST['btn']))
          {
            $up=mysqli_query($con,"update login set status='block' where uid='$_POST[btn]'  ");
            if($up)
            {
              // echo "updated";
              echo '<meta http-equiv="refresh" content="1;URL=admin_view.php">;  
      <script>alert("SUCCESSFULLY UPDATED"); </script>';
            }
            else
            {
             echo '<meta http-equiv="refresh" content="1;URL=spam_user.php">;  
      <script>alert("NOT UPDATED"); </script>';
            }
          }
          if(isset($_POST['btn2']))
          {
           $up=mysqli_query($con,"update login set status='unblock' where uid='$_POST[btn2]'  ");
            if($up)
            {
              echo '<meta http-equiv="refresh" content="1;URL=admin_view.php">;  
      <script>alert("SUCCESSFULLY UPDATED"); </script>';
            }
            else
            {
              echo '<meta http-equiv="refresh" content="1;URL=spam_user.php">;  
      <script>alert("NOT UPDATED"); </script>';
            }
          }
          ?>