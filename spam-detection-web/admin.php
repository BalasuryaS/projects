<?php 

session_start();
include "navbar.php";
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
               background-color:#4d4dff;  
            }
            .navbar-inverse .navbar-collapse, .navbar-inverse .navbar-form 
            {
                border-color:#4d4dff;
            }
            body
            {
               background-color: #F8F9F9;
            }
    .form2
    {
    background-image: linear-gradient(#2196f3,#2196f3);
    box-shadow: 2px 2px 2px gray;
    height:60%;
    width:100%;
    /* border-radius: 17px; */
    }
    
</style>

        <br><br><br>
        <div class="container-fluid row">
            <div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 col-xs-10 col-xs-offset-1 ">
                <div class="form2">
                    <br>
                    <br>    
                    <br>
                    <br>
                    <div class="col-lg-8 col-lg-offset-2 col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3 col-xs-8 col-xs-offset-2">
                        <form class="" action="" method="POST">
                                        <div class="form-group">
                                            <label for="">ADMIN ID</label>
                                            <div class="input-group">
                                                <input type="text" name="admin" class="form-control" placeholder="Enter the ID">
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

                                       <br> <br>
                                        <input type="submit" name="btn" class="btn btn-default col-lg-offset-8 col-md-offset-3 col-sm-offset-5 col-xs-offset-3">
                                       </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

<?php
$temp=0;

if(isset($_POST['btn']))
{
   
    $admin=$_POST['admin'];
    $password=$_POST['pwd'];
    $result=mysqli_query($con,"select * from admin");

    while($row=$result->fetch_assoc())
    {
       
        if(($admin == $row['admin'] )&&( $password== $row['pwd']))
          {
              $temp++;
          }
    }


 if($temp==1)
 {
    echo '<meta http-equiv="refresh" content="1;URL=admin_view.php">;  
      <script>alert("LOGIN SUCCESSFULLY"); </script>';
   
 }
 else{
    echo "<script> alert('INVALID ACCOUNT') </script>";
 }
}
?>
    </body>
</html>