<?php 
session_start();
// include "navbar.php";
include "db.php";
?>
<html>
    <head>
        <title>cmts</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width", initial-scale=1> 
        <link rel="stylesheet" href="./bootstrap-3.4.1/css/bootstrap.min.css"> 
        <link rel="stylesheet" href="./css/socialmedia.css">
    </head>
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
            .form4
{
    background-image: linear-gradient(#2196f3,#2196f3);
    box-shadow: 2px 2px 2px gray;
    height:70%;
    width:100%;
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
                <a class="navbar-brand" href="#">Social Media</a>
              </div>
              <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav navbar-right">
                        <li><a href="posting.php"><span class="glyphicon glyphicon-phone"></span> Post</a></li>
                        <li><a href="show.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
                        <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                        <li><a href="signup.php"><span class="glyphicon glyphicon-hand-right"></span> Sign-up</a></li>
                        <li><a href="admin.php"><span class="glyphicon glyphicon-user"></span> Admin</a></li>
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
                  
                    <div class="col-lg-8 col-lg-offset-2 col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3 col-xs-8 col-xs-offset-2">
                        <?php
                        
                          if(isset($_POST['c_report']))
                          {
                          $u_id=$_SESSION['u_id'];
                            $p_id=$_POST['uid1'];
                          $result=mysqli_query($con,"select * from cmt where post_id='$p_id' ");
                          while($row=$result->fetch_assoc())
                          {
                            
                          
                        ?>
                        <form  action="" method="POST">
                                
                            <h3 style="color:black"><b><?php echo $row['uid'];?></b></h3>
                               <h4 style="color:black"><?php echo $row['comment'];?></h4>

                               <input type="text" name="user" value=<?php echo $row['uid']; ?> hidden >
                               <input type="text" name="cmt" value=<?php echo $row['comment']; ?> hidden >
                                       <input type="text" name="cmt_p" value=<?php echo $p_id; ?> hidden >

                                <input type="submit" value="Report" class="btn btn-danger" name="report">
                                       
                                       
                        </form>
                            <?php
                            }
                       }
                            ?>
                    </div>
                </div>
              
            </div>
        </div>
        <?php

$report=0;
 if(isset($_POST['report']))
 {
     $x=$_POST['cmt'];
     $y=$_POST['user'];
     $z=$_POST['cmt_p'];
    //  echo $x.$y.$z;
     $result=mysqli_query($con,"select * from cmt where comment='$x'");
     while($row=$result->fetch_assoc())
     {
         $report=$row['no_of_report'];
        
     }

     $report++;
    //  echo $report;
     mysqli_query($con,"update cmt set no_of_report=$report where comment='$x'");
     echo '<meta http-equiv="refresh" content="1;URL=show.php">'; 

 }

?>



</body>
<html> 