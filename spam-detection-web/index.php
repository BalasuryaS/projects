<?php 

session_start();
include "navbar.php";
include "db.php";
?>
<!DOCTYPE html>
<html>
    <head>
        <title>sign-up</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width", initial-scale=1> 
        <link rel="stylesheet" href="./bootstrap-3.4.1/css/bootstrap.min.css"> 
       <link rel="stylesheet" href="./css/socialmedia.css">  
    </head>
<style>
                .navbar-inverse
            {
                 background-color:#2196f3;
                 border-color: #2196f3;
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
            border-color: #2196f3;
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
            .form2
            {
              background-image: linear-gradient(#2196f3,#2196f3);
              box-shadow: 2px 2px 2px gray;
              height:80%;
              width:100%;
              /* border-radius: 17px; */
            }
            a{
             color:white;
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
                <!-- <li><a href="#"><span class="glyphicon glyphicon-home"></span> Home</a></li>
                        <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                        <li><a href="signup.php"><span class="glyphicon glyphicon-hand-right"></span> Sign-up</a></li> -->
                        <li><a href="admin.php"><span class="glyphicon glyphicon-user"></span> Admin</a></li>
                    </ul>
               
              </div>
            </div>
          </nav>

        <br><br>
        <div class="container-fluid row">
            <div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 col-xs-10 col-xs-offset-1 ">
                <div class="form2">
                    <br>
                    <br>  
                     <center><h1 style="color:white;">LOGIN </h1> </center> 
                    <br>
                    <br>
                    <div class="col-lg-8 col-lg-offset-2 col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3 col-xs-8 col-xs-offset-2">
                        <form class="" action="" method="POST">
                                        <div class="form-group">
                                            <label for="">User ID</label>
                                            <div class="input-group">
                                                <input type="text" name="mobileno" class="form-control" placeholder="Enter the ID">
                                                <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                                            </div>
                                        </div>
                                         <div class="form-group">
                                            <label for="">Password</label>
                                            <div class="input-group">
                                                <input type="password" name="pwd" class="form-control" placeholder="Enter the password">
                                                <span class="input-group-addon"><span class="glyphicon glyphicon-eye-open"></span></span>
                                            </div>
                                        </div>
                                        <br>
                                       <div class="row">
                                            <div class="col-lg-offset-4 col-md-offset-4 col-sm-offset-2 col-xs-offset-3">
                                                <!-- <a href="#"><span class="glyphicon glyphicon-question-sign"></span> Forgot Password</a> <br> <br> -->
                                                <a href="signup.php"><span class="glyphicon glyphicon glyphicon-user"></span>Create a new account</a>
                                            </div>
                                       </div>  <br> <br>
                                      
                                        <input type="submit" name="btn" class="btn btn-default col-lg-offset-8 col-md-offset-3 col-sm-offset-5 col-xs-offset-3">
                                       </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

<?php
$temp=0;
$_SESSION['u_id']="";
if(isset($_POST['btn']))
{
    $name="";
    $un="";
    $mobileno=$_POST['mobileno'];
    $password=md5($_POST['pwd']);
    // echo $password;
    $result=mysqli_query($con,"select * from login");

    while($row=$result->fetch_assoc())
    {
        if($mobileno == $row['uid'] && $password== $row['password'])
          {
              $name=$row['f_name'];
              $un=$row['uid'];
              $temp++;
              
          }
    }


 if($temp==1)
 {
    echo '<meta http-equiv="refresh" content="1;URL=show.php">;  
      <script>alert("LOGIN SUCCESSFULLY"); </script>';
      $_SESSION['u_id']=$un;
      $_SESSION["username"]=$name;
   
 }
 else{
    echo "<script> alert('INVALID ACCOUNT') </script>";
 }
}
?>
    </body>
</html>