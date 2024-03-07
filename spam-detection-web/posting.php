<?php 
session_start();
include "navbar.php";
include "db.php";
?>
<html>
    <head>
        <title>posting</title>
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
            .form3
            {
            background-image: linear-gradient(#2196f3,#2196f3);
           box-shadow: 2px 2px 2px gray;
           height:90%;
            width:100%;
    /* border-radius: 17px; */
            }
            h1{
                color:white;
            }
    </style>
    <body>


        <br><br><br>
        
        <div class="container-fluid row">
        <br>
                        
            <div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 col-xs-10 col-xs-offset-1 ">
                <div class="form3">
                    <br>
                    <br>  
                   <center> <h1>POST</h1>  </center>
                    <br>
                    <br>
                    <h3></h3>
                    <div class="col-lg-8 col-lg-offset-2 col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3 col-xs-8 col-xs-offset-2">
                        <form class="" action="" method="POST">
                                        <div class="form-group">
                                            <label for="">Enter the text</label>
                                            <div class="input-group">
                                                <textarea id="" cols="75" rows="10" class="form-control" name="text"></textarea>
                                                <!-- <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span> -->
                                            </div>
                                        </div>
                                          <br> <br>
                                      
                                        <input type="submit" name="btn" value="Post" class="btn btn-success col-lg-offset-8 col-md-offset-3 col-sm-offset-5 col-xs-offset-3">
                                       </div>
                        </form>
                        
                    </div>
                </div>
            </div>
        </div>
<?php

$name=$_SESSION['u_id'];
$text="";
$uid=0;
    if(isset($_POST['btn']))
    {
        $text=$_POST['text'];
        $result=mysqli_query($con,"select uid from post ");
        while($row=$result->fetch_assoc())
        {
            $uid=$row['uid'];
        }
        $uid++;
        mysqli_query($con,"insert into post(uid,name,text) values('$uid','$name','$text') ");
        echo '<script>alert("Posted");</script>';
        // mysqli_query($con,"update post set text='$text' where name='$name'");
        echo '<meta http-equiv="refresh" content="1;URL=posting.php">'; 
    }


?>

    </body>
</html>