<?php 
session_start();
// include "navbar.php";
include "db.php";
?>
<html>
    <head>
        <title>timeline</title>
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
     height:100%;
    width:130%;
}
#in{
 width:150%;
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
                        <li><a href="#"><span class="glyphicon glyphicon-home"></span> Home</a></li>
                        <li><a href="index.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                        <li><a href="signup.php"><span class="glyphicon glyphicon-hand-right"></span> Sign-up</a></li>
                        <li><a href="admin.php"><span class="glyphicon glyphicon-user"></span> Admin</a></li>
                    </ul>
               
              </div>
            </div>
          </nav>
    <?php 
    $i=0;
    $cmt="";
      $result=mysqli_query($con,"select * from post");
       while($row=$result->fetch_assoc())
       {  
           $cmt=$row['comment'];
           $i++;
    ?>

        <br><br>  
        <div class="container-fluid row">
            <div class="col-lg-8 col-lg-offset-1  col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 col-xs-12  ">
                <div class="form4" style="border-radius:none">
                    <br>
                    <br>    
                    <div class="col-lg-8 col-lg-offset-2 col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3 col-xs-8 col-xs-offset-2">
                        <form  action="" method="POST">
                                        <div class="form-group">
                                            
                                        <label style="color:white;"><?php echo "POST: $i";?></label>
                                            <label  style="font-size:30px;"><?php echo $row['name'] ?></label>
                                            <input type="text" name="uid" value=<?php echo $row['uid'] ?> hidden >
                                            <div class="input-group">

                                                <h2 style="color:white;"><?php echo $row['text']?></h2>
                                            </div>
                                        </div>
                                          <br>
                                        <input type="submit" class="btn btn-primary" value="Like" name="like">
                                        <input type="submit" value="Dislike" class="btn btn-danger" name="dislike">
                                        <input type="button" value="Comment" class="btn btn-default" onclick="show()">  
                                        <input type="submit" value="Report" class="btn btn-info" name="report" onclick="alert('This post is reported')">

                                        <div style="display:" id="comment">
                                            <br>
                                        <div class="form-group">
                                            <label>Comment</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="in" name="comment" placeholder="Enter the Comment">
                                                <!-- <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span> -->
                                            </div>  <br>
                                            <input type="submit" value="Enter" class="btn btn-success"  name="enter">
                                        </div> 



                                        
                                      
                        </form>
<form action="cmt.php" method="POST">
<input type="text" name="uid1" value=<?php echo $row['uid'] ?> hidden >

<br>
<input type="submit" value="view comments" class="btn btn-info" name="c_report">
       </form>
                    </div>
                </div>
              
            </div>
        </div>
        <?php
                } 
                ?>
    
<?php
  
  
 

  $like=0;
// $_SESSION['post_id']="";
  if(isset($_POST['enter']))
  {
    $postid=$_POST['uid'];
    $_SESSION["post_id"]=$postid;
     $uid=$_SESSION['u_id'];
      $cmt=$_POST['comment'];
      mysqli_query($con,"insert into cmt(uid,post_id,comment,no_of_report,spam_ham) values('$uid','$postid','$cmt','0','ham')");
    //   mysqli_query($con,"update post set comment='$cmt' where uid=$uid");
  }
  
  
 
    if(isset($_POST['like']))
    {
        $uid=$_POST['uid'];
        $result=mysqli_query($con,"select * from post where uid=$uid");
        while($row=$result->fetch_assoc())
        {
            $like=$row['like_'];
        }
        $like++;
        mysqli_query($con,"update post set like_='$like' where uid=$uid");
        

    }

    if(isset($_POST['dislike']))
    {
        $uid=$_POST['uid'];
        $result=mysqli_query($con,"select * from post where uid=$uid");
        while($row=$result->fetch_assoc())
        {
            $like=$row['dislike'];
        }
        $like++;
        mysqli_query($con,"update post set dislike='$like' where uid=$uid");
        

    }

    if(isset($_POST['report']))
    {
        $uid=$_POST['uid'];
        $result=mysqli_query($con,"select * from post where uid=$uid");
        while($row=$result->fetch_assoc())
        {
            $like=$row['report'];
        }
        $like++;
        mysqli_query($con,"update post set report='$like' where uid=$uid");
        

    }

    if(isset($_POST['c_report']))
    {
     echo '<meta http-equiv="refresh" content="1;URL=cmt.php">';

    }

?>

    </body>
    <script>
        function show()
        {
            x=document.getElementById("comment");
            if(x.style.display==="none")
            {
                x.style.display="block";
            }
            else
            {
                x.style.display="none";
            }
        }
    </script>
</html>