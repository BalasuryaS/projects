<?php 

session_start();
// include "navbar.php";
include "db.php";
?>
<!DOCTYPE html>
<html>
    <head>
        <title>spam comments</title>
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

          <h2>SPAM COMMENTS</h2>
          <table class="table table-bordered table-responsive">
            <thead>
              <tr>
                <th>USER ID</th>
                <th>POST ID</th>
                <th>COMMENT</th>
                <th>SPAM / HAM </th>
                <th>PERCENTAGE</th>
              </tr>
            </thead>
            <tbody>
            <?php
              $result=mysqli_query($con,"select * from cmt order by no_of_report DESC");
              while($row=$result->fetch_assoc())
              {
            ?>

              <tr>
                <td ><?php echo $row['uid'];?></td>
                <td ><?php echo $row['post_id'];?></td>
                <td><?php echo $row['comment'];?></td>
                <td><?php echo $row['spam_ham'];?></td>
                <td><?php echo $row['percentage'];?></td>
              </tr>
              <?php
           }
          ?>
            </tbody>
          </table>

         
          </div>
        </div>


         
        </body>
        <html>   