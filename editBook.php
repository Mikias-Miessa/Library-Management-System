<?php
include 'conn.php';
if(isset($_POST['editid'])){

    $bookData= $_POST['editid'];

    $sql="SELECT * FROM book WHERE BOOK_ID=$bookData";
    $result=mysqli_query($con,$sql);

    $response=array();
    while($row=mysqli_fetch_assoc($result)){
        $response=$row;
    }
    echo json_encode($response);
}
else{
    $response['status']=200;
    $response['message']="Data not found";
}

                // update query
//extract($_POST);
if(isset($_POST['hiddenData'])){

    $idedit= $_POST['hiddenData'];

    $newTitle= $_POST['newTitle'];
    $newAuthor= $_POST['newAuthor'];
    $newCatagory= $_POST['newCatagory'];
    $newShelfNo= $_POST['newShelfNo'];
    $newQuantity= $_POST['newQuantity'];
    $newPubDate= $_POST['newPubDate'];
    $newGrade= $_POST['newGrade'];

        $query="UPDATE book SET TITLE='$newTitle', AUTHOR='$newAuthor', CATAGORY='$newCatagory',
        SHELF_NUMBER='$newShelfNo', FIXED_QUANTITY='$newQuantity', PUB_DATE='$newPubDate', GRADE_LEVEL='$newGrade' WHERE BOOK_ID=$idedit";
   
        $res=mysqli_query($con,$query);

        if($res){
      echo "Book Edited Successfully...";
        }
    
}
?>
