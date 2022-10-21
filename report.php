<?php
include 'conn.php';

if(isset($_POST['report'])){

    //system usage count
     $querry="SELECT COUNTING FROM usage_count";
    $res=mysqli_query($con,$querry);
    
    $row=mysqli_fetch_assoc($res);
     $count=$row['COUNTING'];

    $report='<div id="divid" class="container w-75 mb-5">
    <h3>System Usage Count</h3>
    <h5>This system have been used '.$count.' times starting from 8-20-2022 to '.date('d-m-Y').' </h5> </div>';

     echo $report;


    // Deleted Books Report    
 $table='<div id="div" class="container w-75">
 <h3> Discarded Books </h3>
 <table class=" container table border border-warning w-100 shadow ">
    <thead class="bg-warning text-dark">
        <tr>
           
            <th class="text-center" scope="col">Title</th>
            <th class="text-center" scope="col">Author</th>
            <th class="text-center" scope="col">Reason</th>
           
        </tr>
    </thead>';
    $sql="SELECT * FROM deletedbooks";
    $result= mysqli_query($con,$sql);
    while($row=mysqli_fetch_assoc($result)){
        $id=$row['BOOK_ID'];
        $title=$row['TITLE'];
        $catagory=$row['CATAGORY'];
        $author=$row['AUTHOR'];
        $grade=$row['GRADE_LEVEL'];
        $shelf=$row['SHELF_NUMBER'];
        $pub=$row['PUB_DATE'];
        $quan=$row['QUANTITY'];
        $reason=$row['REASON'];
        
    $table.=' <tbody class="text-center">
    <tr>
    <td>'.$title.'</td>
    <td>'.$author.'</td>
    <td>'.$reason.'</td>
    
    </tr>
    </tbody>';
    }
    $table.='</table> </div>';
    echo $table;

        // BOOK USAGE FREQUENCY REPORT

    $table1='<div id="div" class="container w-75">
 <h3> Most Used Books </h3>
 <table class=" container table border border-warning w-100 shadow ">
    <thead class="bg-warning text-dark">
        <tr>
           
            <th class="text-center" scope="col">Title</th>
            <th class="text-center" scope="col">Author</th>
            <th class="text-center" scope="col">Grade Level</th>
            <th class="text-center" scope="col">Catagory</th>
            <th class="text-center" scope="col">TImes Being Used</th>
           
        </tr>
    </thead>';
    $sql="SELECT * FROM book ORDER BY FREQUENCY DESC LIMIT 3";
    $result= mysqli_query($con,$sql);
    while($row=mysqli_fetch_assoc($result)){
       
        $title=$row['TITLE'];   
        $author=$row['AUTHOR'];
        $freq=$row['FREQUENCY'];
        $grade=$row['GRADE_LEVEL'];
        $catag=$row['CATAGORY'];
       
    $table1.=' <tbody class="text-center">
    <tr>
    <td>'.$title.'</td>
    <td>'.$author.'</td>
    <td>'.$grade.'</td>
    <td>'.$catag.'</td>
    <td>'.$freq.'</td>
    
    </tr>
    </tbody>';
    }
    $table1.='</table> </div>';
    echo $table1;


     $table2='<div id="div" class="container w-75">
 <h3> Least Used Books </h3>
 <table class=" container table border border-warning w-100 shadow ">
    <thead class="bg-warning text-dark">
        <tr>
           
            <th class="text-center" scope="col">Title</th>
            <th class="text-center" scope="col">Author</th>
            <th class="text-center" scope="col">Grade Level</th>
            <th class="text-center" scope="col">Catagory</th>
            <th class="text-center" scope="col">TImes Being Used</th>
           
        </tr>
    </thead>';
    $sql1="SELECT * FROM book ORDER BY FREQUENCY ASC LIMIT 3";
    $result1= mysqli_query($con,$sql1);
    while($row=mysqli_fetch_assoc($result1)){
       
        $title1=$row['TITLE'];   
        $author1=$row['AUTHOR'];
        $freq1=$row['FREQUENCY'];
         $grade1=$row['GRADE_LEVEL'];
        $catag1=$row['CATAGORY'];
       
    $table2.=' <tbody class="text-center">
    <tr>
    <td>'.$title1.'</td>
    <td>'.$author1.'</td>
    <td>'.$grade1.'</td>
    <td>'.$catag1.'</td>
    <td>'.$freq1.'</td>
    
    </tr>
    </tbody>';
    }
    $table2.='</table> </div>';
    echo $table2;

  //Due books report
      $table='<div id="div" class="container w-75">
       <h3> Due Books </h3>
      <table class=" container table border border-warning w-100 shadow ">
    <thead class="bg-warning text-dark">
        <tr>
           
            <th class="text-center " scope="col">Student ID</th>
            
            <th class="text-center" scope="col">Title</th>
            <th class="text-center" scope="col">Issued Date</th>
            <th class="text-center" scope="col">Returned Date</th>
            <th class="text-center" scope="col">Fine</th>
            
        </tr>
    </thead>';
   $query="SELECT * FROM book,issued_books WHERE book.BOOK_ID = issued_books.BOOK_ID ORDER BY StID ASC";
    $result= mysqli_query($con,$query);
   
    while($row=mysqli_fetch_assoc($result)){
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
        
    $table.=' <tbody class="text-center">
    <tr>
  
    <td>'.$stid.'</td>
    <td>'.$title.'</td>
    <td>'.$issued_date.'</td>
    <td>'.$return_date.'</td>
    <td>'.$fine.'</td>
    
    </tr>
    </tbody>';
    }
    $table.='</table>
    <div class="text-center pb-5">
    <button class="btn btn-primary"  onclick="window.print()">Print Report</button>
    </div>
    </div>';
    echo $table;
 
}

?>