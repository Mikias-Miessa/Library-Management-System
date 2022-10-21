<?php
include 'conn.php';

if(isset($_POST['issuedBook'])){
    $table='<table class=" container table border border-warning w-100 shadow ">
    <thead class="bg-warning text-dark">
        <tr>
           
            <th class="text-center " scope="col">Student ID</th>
            
            <th class="text-center" scope="col">Title</th>
            <th class="text-center" scope="col">Issued Date</th>
            <th class="text-center" scope="col">Returned Date</th>
       
            <th class="text-center" scope="col">Fine</th>
            <th class="text-center" scope="col">Action</th>
        </tr>
    </thead>';
//    $sql="SELECT CAST( GETDATE() AS Date )";
//    $res= mysqli_query($con,$sql);
//    while($row=mysqli_fetch_assoc($res)){
//     $today = $row['Date'];
//    }

   $today = date("Y-m-d");

   $query="SELECT * FROM book,issued_books WHERE book.BOOK_ID = issued_books.BOOK_ID ORDER BY StID ASC";
    $result= mysqli_query($con,$query);
   
    while($row=mysqli_fetch_assoc($result)){
        $primary=$row['ID'];
        $stid=$row['StID'];
        $id=$row['BOOK_ID'];
        $title=$row['TITLE'];
        $issue=$row['ISSUED_DATE'];
        $date=explode('-',$issue);
        $day=$date[2];
        $month=$date[1];
        $year=$date[0];
        $issued_date=$day.'-'.$month.'-'.$year;
        $return=$row['RETURNED_DATE'];
        $date=explode('-',$return);
        $day=$date[2];
        $month=$date[1];
        $year=$date[0];
        $return_date=$day.'-'.$month.'-'.$year;
        $fine=$row['FINE'];
        $today = date("Y-m-d"); 
  if ($today > $return){
    $earlier = new DateTime($return);
    $later = new DateTime($today);
      
      $abs_diff = $later->diff($earlier)->format("%a");
      $newfine = $fine*$abs_diff;
      
  }
  else{
    $newfine="0";
  }

    $table.=' <tbody class="text-center">
    <tr>
  
    <td>'.$stid.'</td>
    <td>'.$title.'</td>
    <td>'.$issued_date.'</td>
    <td>'.$return_date.'</td>
   
    <td>'.$newfine.'</td>
    
    <td>
    <button class="btn btn-success"  onclick="ReturnBook('.$primary.','.$id.')">Return</button>
    
    </td> 
    </tr>
    </tbody>';
    }
    $table.='</table>';
    echo $table;
}

?>