<?php
include 'conn.php';

if(isset($_POST['deletebook'])){

   $delid=$_POST['deletebook'];
   $reason = $_POST['reason'];
   
  $sqli= "SELECT * FROM book WHERE BOOK_ID = $delid";
  $result=mysqli_query($con,$sqli);

 while($row=mysqli_fetch_assoc($result)){
        $id=$row['BOOK_ID'];
        $title=$row['TITLE'];
        $catagory=$row['CATAGORY'];
        $author=$row['AUTHOR'];
        $grade=$row['GRADE_LEVEL'];
        $shelf=$row['SHELF_NUMBER'];
        $pub=$row['PUB_DATE'];
        $quan=$row['QUANTITY'];
    }
   
    $sql="INSERT INTO deletedbooks(BOOK_ID,TITLE,CATAGORY,AUTHOR,GRADE_LEVEL,SHELF_NUMBER,PUB_DATE,QUANTITY,REASON) 
    VALUES('$id', '$title', '$catagory', '$author', '$grade','$shelf','$pub','$quan','$reason')";
    $result= mysqli_query($con,$sql);

    $query="DELETE FROM book WHERE BOOK_ID = $delid";
    $result=mysqli_query($con,$query);
    if($result){

        echo"Book Deleted Successfully...";
    }
}

?>