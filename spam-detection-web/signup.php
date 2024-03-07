<?php 
session_start();
// include "navbar.php";
include "db.php";
?>

<html>
   <head>
       <title>login</title>
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
.form
{
    background-image: linear-gradient(#2196f3,#2196f3);
    box-shadow: 2px 2px 2px gray;
      height:130%;
    width:100%;
    /* border-radius: 17px; */
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
                        <li><a href="index.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li> -->
                        <li><a href="index.php"><span class="glyphicon glyphicon-hand-right"></span>Log-in</a></li>
                        <li><a href="admin.php"><span class="glyphicon glyphicon-user"></span> Admin</a></li>
                    </ul>
               
              </div>
            </div>
          </nav>

    <br><br><br>
<div class="container-fluid row">
    <div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 col-xs-10 col-xs-offset-1 ">
        <div class="form">
                <br> <br>      <center><h1 style="color:white;">SIGN UP</h1> </center>  <br>  <br>
            <div class="col-lg-8 col-lg-offset-2 col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3 col-xs-8 col-xs-offset-2">
                 
                            <form class="" action="" method="POST">
                                <div class="form-group">
                                    <label>Name</label>
                                    <div class="input-group">
                                        <input type="text" name="f_name" class="form-control" placeholder="Enter the First Name">
                                        <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                                    </div>                               
                                </div>
                                 <div class="form-group">
                                    <label>Age</label>
                                    <div class="input-group">
                                        <input type="text"  name="age"  class="form-control" placeholder="Enter the Age">
                                        <span class="input-group-addon"><span class="glyphicon glyphicon-sunglasses"></span></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Date of Birth</label>
                                    <div class="input-group">
                                        <input type="date-time" name="dob" class="form-control" placeholder="Enter the Date of Birth">
                                        <span class="input-group-addon"><span class="glyphicon glyphicon-question-sign"></span></span>
                                    </div>
                                </div>
                                 
                                <div class="form-group">
                                    <label>Gender</label> &nbsp;&nbsp;&nbsp;  
                                        <input class="" type="radio" name="gender" value="male">&nbsp;<label for="">&nbsp;<span class="glyphicon glyphicon-king"></span> Male</label>
                                        <input class="" type="radio" name="gender" value="female">&nbsp;<label for="">&nbsp;<span class="glyphicon glyphicon-queen"></span> Female</label>                                  
                                </div>
                                <div class="form-group">
                                    <label>Address</label>
                                    <div class="input-group">
                                        <input type="text" name="address" class="form-control" placeholder="Enter the Address">
                                        <span class="input-group-addon"><span class="glyphicon glyphicon-question-sign"></span></span>
                                    </div>
                                </div> 
                                <div class="form-group">
                                    <label>Mobile No </label>
                                    <div class="input-group">
                                        <input type="text" name="mobileno" class="form-control" placeholder="Enter the Mobile No ">
                                        <span class="input-group-addon"><span class="glyphicon glyphicon-phone"></span></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Mail</label>
                                    <div class="input-group">
                                        <input type="mail" name="mail" class="form-control" placeholder="Enter the Mail">
                                        <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <div class="input-group">
                                        <input type="password" name="pwd" class="form-control" placeholder="Enter the Password">
                                        <span class="input-group-addon"><span class="glyphicon glyphicon-eye-open"></span></span>
                                    </div>
                                </div>                            
                                </div>
                               <div class="row">
                                <input type="submit" name="btn" class="btn btn-default col-lg-offset-8 col-md-offset-3 col-sm-offset-5 col-xs-offset-3">
                                </div>
                    </form>
            </div>
        </div>
    </div>
</div>

<?php

   if(isset($_POST['btn']))
   {
       $uid=0;
       $result=mysqli_query($con,"select uid from login");
       while($row=$result->fetch_assoc())
       {
            $uid=$row['uid'];
       }
    $uid++;
      $f_name=$_POST['f_name'];    
      $age   =$_POST['age'];
      $dob   =$_POST['dob'];
      $gender=$_POST['gender'];
      $address=$_POST['address'];
      $mobileno=$_POST['mobileno'];
      $mail   =$_POST['mail'];
      $password=md5($_POST['pwd']);


      mysqli_query($con,"insert into login (uid,f_name,age,dob,gender,address,mobileno,mail,password) 
                  values($uid,'$f_name',$age,'$dob','$gender','$address','$mobileno','$mail','$password')");
      echo "<script> alert('sign up succesfully user ID : '+".$uid.")</script>";

   }
?>
</body>
</html>