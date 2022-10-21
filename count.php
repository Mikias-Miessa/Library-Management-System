<?php
include "conn.php";

if(isset($_POST['count'])){

   $sql="UPDATE usage_count SET COUNTING = COUNTING+1";
     $result=mysqli_query($con,$sql);
    
}
?>