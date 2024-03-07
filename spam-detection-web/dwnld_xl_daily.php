<?php  
include "db.php";
header("Content-Type: application/xls");    
header("Content-Disposition: attachment; filename=spam_.xls");  
header("Pragma: no-cache"); 
header("Expires: 0");
$sep = "\t"; //tabbed character
// Userid	No.of.post	No.of.reported post	No.of.comments	No.of.reported comments	class

print("\n");   
        $schema_insert = str_replace($sep."$", "", "Userid".$sep."No.of.post".$sep."No.of.reported post".$sep."No.of.comments".$sep."No.of.reported comments".$sep."class");
        $schema_insert = preg_replace("/\r\n|\n\r|\n|\r/", " ", $schema_insert);
        $schema_insert .= "\t";
        print(trim($schema_insert));
        print "\n";
        $sno = 0;
$result=mysqli_query($con,"select * from temp");
    while($row =$result->fetch_assoc())
    {
      $sno++;
        $schema_insert = "";
          $schema_insert=$row['uid'].$sep.$row['no_of_post'].$sep.$row['no_of_dislike'].$sep.$row['no_of_cmts'].$sep.$row['no_of_rc'].$sep."";
        
        $schema_insert = str_replace($sep."$", "", $schema_insert);
        $schema_insert = preg_replace("/\r\n|\n\r|\n|\r/", " ", $schema_insert);
        $schema_insert .= "\t";
        print(trim($schema_insert));
        print "\n";
    }  


 exit;
?>