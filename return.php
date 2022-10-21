<?php
include 'conn.php';

//   $issed=$_POST['issid'];
//   $retid=$_POST['retid'];

//   echo $issed;
//   echo $retid;
if(isset($_POST['issid'])&&isset($_POST['retid'])){
    $retid=$_POST['retid'];
    $issid=$_POST['issid'];
    $sql="UPDATE book SET QUANTITY = QUANTITY+1 WHERE BOOK_ID=$retid ";
    $result=mysqli_query($con,$sql);

    $query="DELETE FROM issued_books WHERE ID = $issid ";
    $res=mysqli_query($con,$query);
}
?>