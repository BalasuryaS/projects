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
          <table class="table table-bordered table-responsive">
            <thead>
              <tr>
                <th>USER ID</th>
                <!-- <th>NO OF POST</th>
                <th>NO OF DISLIKE</th>
                <th>NO OF COMMENTS </th>
                <th>NO OF REPORTED COMMENTS</th> -->
                <th>CLASS</th>
              </tr>
            </thead>
            <tbody>
            <?php
            $isempty=0;
            
      mysqli_query($con,"delete from temp");
      	$result1=mysqli_query($con,"select * from temp");
        while($row1=$result1->fetch_assoc())
        {
          if($row1['class']!="")
          $isempty++;
        }

        if($isempty==0)
        {
      $uid="";
      $no_of_post=0;
      $no_of_dislike=0;
      $no_of_cmts=0;
      $no_of_rc=0;
			$result = mysqli_query($con,"select * from login");
			while($row=$result->fetch_assoc())
			{
        $uid="";
      $no_of_post=0;
      $no_of_dislike=0;
      $no_of_cmts=0;
      $no_of_rc=0;
        $uid=$row['uid'];
				// mysqli_query($con,"insert into temp(uid) values('$uid')");
				$result1=mysqli_query($con,"select * from post where name='$uid'");
        while($row1=$result1->fetch_assoc())
        {
          $no_of_post++;
          if($row1['dislike']!="")
          $no_of_dislike+=$row1['dislike'];
        }
       
        $result1=mysqli_query($con,"select * from cmt where uid='$uid'");
        while($row1=$result1->fetch_assoc())
        {
          $no_of_cmts++;
          if($row1['no_of_report']!="")
          $no_of_rc+=$row1['no_of_report'];
        }
      mysqli_query($con,"insert into temp(uid,no_of_post,no_of_dislike,no_of_cmts,no_of_rc) 
                      values('$uid','$no_of_post',' $no_of_dislike','$no_of_cmts',' $no_of_rc')");
				
      }
    }
              $result=mysqli_query($con,"select * from temp");
              while($row=$result->fetch_assoc())
              {

            ?>

              <tr> 
                 <td ><?php
                 echo $row['uid'];?></td>
                <!-- <td ><?php 
                // echo $row['no_of_post'];?></td>
                <td><?php 
                // echo $row['no_of_dislike'];?></td>
                <td><?php 
                // echo $row['no_of_cmts'];?></td>
                <td><?php
                //  echo $row['no_of_rc'];?></td> -->
                <td><?php
                if($row['class']>=0.5)
                 echo "Spam Account";
                else
                 echo "Not A Spam";
                ?></td>
              </tr>
              <?php
           }
          ?>
            </tbody>
          </table>
          <?php
          // }
          ?>
          <form action="" method="POST">
           <button type="submit" name="btn" class="btn btn-primary col-lg-offset-10 col-md-offset-10 col-sm-offset-8 col-xs-offset-8">Download</button>
           <br><br>
           <button type="submit" name="clear" class="btn btn-primary col-lg-offset-10 col-md-offset-10 col-sm-offset-8 col-xs-offset-8">Clear</button>
           </form>
          </div>
        </div>
        <?php
        if(isset($_POST['btn']))
        {
           echo '<meta http-equiv="refresh" content="1;URL=dwnld_xl_daily.php">';
        }
        if(isset($_POST['clear']))
        {
           mysqli_query($con,"delete from temp");
        }
       ?>
         
        </body>
        <html>   