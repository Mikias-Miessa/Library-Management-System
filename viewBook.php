<?php
include 'conn.php';
$record_per_page = 4;  
 $page = '';  
 $output = '';  
  if(isset($_POST["page"]))  
 {  
      $page = $_POST["page"];  
 }  
 else  
 {  
      $page = 1;  
 }  
  $start_from = ($page - 1)*$record_per_page; 
  // if($page>1){
  // $prev = $page - 1;
  //  }
  // else{
  //   $prev = 1;
  // }
  // $next = $page + 1;

    $table='<table class="  table border border-warning w-100 shadow mt-5 ">
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
    

    $sql="SELECT * FROM book ORDER BY BOOK_ID DESC LIMIT $start_from, $record_per_page";
    $result= mysqli_query($con,$sql);
    $num=($page*$record_per_page) - ($record_per_page-1);
    while($row=mysqli_fetch_assoc($result)){
        $id=$row['BOOK_ID'];
        $title=$row['TITLE'];
        $catagory=$row['CATAGORY'];
        $author=$row['AUTHOR'];
        $grade=$row['GRADE_LEVEL'];
        $shelf=$row['SHELF_NUMBER'];
        $pub=$row['PUB_DATE'];
        $date=explode('-',$pub);
        $day=$date[2];
        $month=$date[1];
        $year=$date[0];
        $pub_date=$day.'-'.$month.'-'.$year;
        $quan=$row['QUANTITY'];
        $fixedquan=$row['FIXED_QUANTITY'];
   
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
    <td>'.$pub_date.'</td>
    <td>'.$fixedquan.'</td> 
    <td>'.$avail.' ('.$quan.')</td> 
    <td>
    <button class="btn btn-warning"  onclick="editBook('.$id.')">Edit</button>
    <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#DeleteModal" onclick="deletemodal('.$id.')">Delete</button>
    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#IssueModal" onclick="IssueBook('.$id.')">Issue</button>
    </td> 
    </tr>
    </tbody>';
    $num++;
    
    }
    $table.='</table><br /><div align="center"><ul class="pagination justify-content-center">';
    if($page > 1){
     $prev = $page - 1;
      $table.='<li class="page-item id" id="1"><span class="page-link">First Page</span></li>';
     $table.=' <li><a class="page-link id" id="'.$prev.'" aria-label="Previous">
               <span aria-hidden="true">&laquo;</span> </a> </li>';}

 $page_query = "SELECT * FROM book ORDER BY BOOK_ID DESC";  
 $page_result = mysqli_query($con, $page_query);  
 $total_records = mysqli_num_rows($page_result);  
 $total_pages = ceil($total_records/$record_per_page);  

  for($i=1; $i<=$total_pages; $i++)  
 {  $active_class="";

  if($i == $page){
      $active_class = "active";
      
  }
      $table .= '<li class="page-item id '.$active_class.'" id="'.$i.'"><span class="page-link">'.$i.'</span></li>';  
      
 }  
 if($page < $total_pages){
  $page++;
  $table.=' <li><a class="page-link id" id="'.$page.'" aria-label="Next">
               <span aria-hidden="true">&raquo;</span> </a> </li>';
  $table .='<li class="page-item id" id="'.$total_pages.'"><span class="page-link">Last Page</span></li>';
 }
 $table .= '</ul></div><br /><br />';  

    echo $table;
// <span class='page_link' style='cursor:pointer; padding:6px; border:1px solid #ccc; ' id='".$i."'>".$i."</span>

?>



