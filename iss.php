<?php
include 'conn.php';
// $aa = $_POST['stdID'];
// $bb =$_POST['bID'];
// $cc =$_POST['finee'];
// echo $aa;
// echo $bb;
// echo $cc;
if(isset($_POST['setfine'])){

    //$bookData= $_POST['setfine'];

    $sql="SELECT * FROM fine";
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


if(isset($_POST['stdID'])&&isset($_POST['bID'])
&&isset($_POST['issuedate'])&&isset($_POST['returned'])&&isset($_POST['fine'])){
    $bid=$_POST['bID'];
    $stid=$_POST['stdID'];
    $issuedate=$_POST['issuedate'];
    $return=$_POST['returned'];
    $FINE=$_POST['fine'];

  
     $sql= "SELECT * FROM issued_books WHERE BOOK_ID=$bid AND StID=$stid";
     $result=mysqli_query($con,$sql);
    $data = mysqli_fetch_array($result, MYSQLI_NUM);
  //  if($data[0] > 1)
     if(!empty($data)) {
    echo "Return book first";
             }
    else{
       

    $query= "SELECT QUANTITY as quan FROM book WHERE BOOK_ID=$bid";
    $result= mysqli_query($con,$query);

    $row = mysqli_fetch_assoc($result);
    $quan=$row['quan'];

   if($quan>0){
     $sql="UPDATE book SET QUANTITY = QUANTITY-1 , FREQUENCY = FREQUENCY+1 WHERE BOOK_ID=$bid ";
     $result=mysqli_query($con,$sql);
     
     if($result){
       $querry="INSERT INTO issued_books(StID,BOOK_ID,ISSUED_DATE,RETURNED_DATE,FINE) VALUES('$stid',$bid,'$issuedate','$return','$FINE')";
        $res= mysqli_query($con,$querry);

  //       $quer="SELECT (To_days(RETURNED_DATE) - To_days(ISSUED_DATE)) as diff FROM issued_books WHERE StID='$stid' AND BOOK_ID='$bid' ";
	//     $result=mysqli_query($con, $quer);

	// if(mysqli_num_rows($result)>0){

	// 	while($row=mysqli_fetch_assoc($result)){

	// 		$difference=$row['diff'];
	// 	}
	// }

	// $difference=intval($difference);

	// if($difference > 7){
	// 	$df=8;
	// 	$FINE=10;
	// 	if($df<$difference){

	// 		while ($df!=$difference) {
				
	// 			$FINE=$FINE+2;
	// 			$df=$df+1;
	// 		}
	// 	}
	// }

	// $sql="UPDATE issued_books SET FINE=$FINE WHERE StID=$stid AND BOOK_ID='$bid' ";
	// $result=mysqli_query($con, $sql);
     }
   echo "Book Issued Successfully";
    }
   else{
        
         echo "Not Enough Books";
   }
  }

}
    
  


    