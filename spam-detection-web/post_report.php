<?php 

session_start();
// include "navbar.php";
include "db.php";
?>
<!DOCTYPE html>
<html>
    <head>
        <title>reported post</title>
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
              <h2>MOST REPORTED POST</h2>
        <table class="table table-bordered table-responsive">
            <thead>
              <tr>
                <th>POST ID</th>
                <th>USER ID</th>
                <th>POST</th>
                <th>NO.OF.LIKE</th>
                <th>NO.OF.DISLIKE</th>
                <th>NO.OF.REPORTED POST</th>
              </tr>
            </thead>
            <tbody>
            <?php
              $result=mysqli_query($con,"select * from post order by report DESC");
              while($row=$result->fetch_assoc())
              {
            ?>

              <tr>
                <td ><?php echo $row['uid'];?></td>
                <td><?php echo $row['name'];?></td>
                <td><?php echo $row['text'];?></td>
                <td><?php echo $row['like_'];?></td>
                <td><?php echo $row['dislike'];?></td>
                <td><?php echo $row['report'];?></td>
              </tr>
              <?php
           }
          ?>
            </tbody>
          </table>
        </body>
        </html>