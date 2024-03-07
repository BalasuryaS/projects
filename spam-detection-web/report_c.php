<?php

$report=0;
 if(isset($_POST['report']))
 {
     $x=$_POST['cmt_p'];
     $result=mysqli_query($con,"select * from cmt where uid=$x");
     while($row=$result->fetch_assoc())
     {
         $report=$row['no_of_report'];
     }
     $report++;
     mysqli_query($con,"update post set no_of_report='$report' where post_id=$p_id");
     

 }

?>