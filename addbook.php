<?php
include 'conn.php';

extract($_POST);

if(isset($_POST['bookname'])&&isset($_POST['author'])
&&isset($_POST['catagory'])&&isset($_POST['shelfNumber'])
&&isset($_POST['quantity'])&&isset($_POST['pub_date'])&&isset($_POST['grade'])){
    
$freq='0';

$fixedQuan=$_POST['quantity'];

    $sql="INSERT INTO book(TITLE,CATAGORY,AUTHOR,GRADE_LEVEL,SHELF_NUMBER,PUB_DATE,QUANTITY,FIXED_QUANTITY,FREQUENCY)
    VALUES('$bookname','$catagory','$author','$grade','$shelfNumber','$pub_date',$quantity,$fixedQuan,'$freq')";

    $result=mysqli_query($con,$sql);

  if($result){
    echo "Book Added Successfully...";
  }
}
    


?>