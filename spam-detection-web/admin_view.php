<?php 

session_start();
// include "navbar.php";
include "db.php";
?>
<!DOCTYPE html>
<html>
    <head>
        <title>admin</title>
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
            #input{
              width:30%;
            }
            .btn-primary {
    color: #fff;
    background-color: #2196f3;
    border-color: #2196f3;
}
.btn-primary:hover {
    background-color: #2196f3;
    border-color: #2196f3;
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
                <li><a href="admin.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
                        <!-- <li><a href="index.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                        <li><a href="signup.php"><span class="glyphicon glyphicon-hand-right"></span> Sign-up</a></li>
                        <li><a href="admin.php"><span class="glyphicon glyphicon-user"></span> Admin</a></li> -->
                    </ul>
               
              </div>
            </div>
          </nav>
         <br><br><br>
         <div class="container-fluid row">
            <div class="col-lg-8 col-lg-offset-2  col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 col-xs-12  ">
                <div class="" style="border-radius:none">
                    <br>
                    <br>    
                    <br>
                  
                    <!-- <div class="col-lg-8 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3 col-xs-8 col-xs-offset-2"> -->
                           <center>
                            <form  action="" method="POST">
                              <div class="form-group">
                               <a href="post_report.php" type="submit" class="btn btn-primary" id="input">Most Reported Post</a>
                               </div>
                               <div class="form-group">
                               <a href="cmt_report.php" type="submit" class="btn btn-primary" id="input">Most Reported Comment</a>
                               </div>
                               <div class="form-group">
                               <a href="spam_cmt.php" type="submit" class="btn btn-primary" id="input">Spam Comment</a>
                               </div>
                               <div class="form-group">
                               <a href="spam_user.php" type="submit" class="btn btn-primary" id="input">Spam User  </a>
                               </div>
                                <!-- <div class="form-group">
                               <a href="spam_sample.php" type="submit" class="btn btn-primary" id="input">All Users </a>
                               </div>           -->
                            </form>
                            </center>
                            <!-- </div> -->
                </div>
              
            </div>
        </div>
          


         
        </body>
        <html>   