<?php
include 'conn.php';

if(isset($_POST['hiddenData'])){

    $editID= $_POST['hiddenData'];
    $newTitle= $_POST['newTitle'];
    $newAuthor= $_POST['newAuthor'];
    $newCatagory= $_POST['newCatagory'];
    $newShelfNo= $_POST['newShelfNo'];
    $newQuantity= $_POST['newQuantity'];
    $newPubDate= $_POST['newPubDate'];
    $newGrade= $_POST['newGrade'];

    $query="UPDATE book SET BOOK_TITLE='$newTitle', AUTHOR='$newAuthor', CATAGORY='$newCatagory',
        SHELF_NUMBER='$newShelfNo', QUANTITY='$newQuantity', PUB_DATE='$newPubDate', GRADE_LEVEL='$newGrade' WHERE BOOK_ID=$idedit";
   
        $res=mysqli_query($con,$query);
}
?>