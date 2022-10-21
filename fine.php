<?php
include "conn.php";

if(isset($_POST['setfine'])){

  $fine = $_POST['setfine'];

   $sql="UPDATE fine SET Fine = $fine ";
     $result=mysqli_query($con,$sql);

      if($result){

      echo "Fine set successfully...";
     }
}
?>