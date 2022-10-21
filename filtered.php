<?php

include "conn.php";

if(isset($_POST['value'])){

    $value=$_POST['value'];

   $table='<table class="  table border border-warning w-100 shadow ">
    <thead class="bg-warning text-dark">
        <tr>
           
            <th class="text-center" scope="col">Book ID</th>
            <th class="text-center" scope="col">Title</th>
            <th class="text-center" scope="col">Catagory</th>
            <th class="text-center" scope="col">Author</th>
            <th class="text-center" scope="col">Grade Level</th>
            <th class="text-center" scope="col">Shelf Number</th>
            <th class="text-center" scope="col">Publication Date</th>
            <th class="text-center" scope="col">Quantity</th>
            <th class="text-center" scope="col">Availability</th>
            <th class="text-center" scope="col">Action</th>
        </tr>
    </thead>';
    

    $sql="SELECT * FROM book WHERE CATAGORY='$value'";
    $result= mysqli_query($con,$sql);
    $num=1;
    while($row=mysqli_fetch_assoc($result)){
        $id=$row['BOOK_ID'];
        $title=$row['TITLE'];
        $catagory=$row['CATAGORY'];
        $author=$row['AUTHOR'];
        $grade=$row['GRADE_LEVEL'];
        $shelf=$row['SHELF_NUMBER'];
        $pub=$row['PUB_DATE'];
        $quan=$row['QUANTITY'];
       
   
if($quan>0){
    $avail="Available";
}
else{
    $avail="Unavaiable";
}
        
    $table.=' <tbody class="text-center">
    <tr>
  
    <td>'.$num.'</td>
    <td>'.$title.'</td>
    <td>'.$catagory.'</td>
    <td>'.$author.'</td>
    <td>'.$grade.'</td>
    <td>'.$shelf.'</td>
    <td>'.$pub.'</td>
    <td>'.$quan.'</td> 
    <td>'.$avail.'</td> 
    <td>
    <button class="btn btn-warning"  onclick="editBook('.$id.')">Edit</button>
    <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#DeleteModal" onclick="deletemodal('.$id.')">Delete</button>
    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#IssueModal" onclick="IssueBook('.$id.')">Issue</button>
    </td> 
    </tr>
    </tbody>';
    $num++;
    }
    $table.='</table>';
    echo $table;
}



?>