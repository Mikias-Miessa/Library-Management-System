<?php
include 'conn.php';

if(isset($_POST['editpage'])){
    $table='<table class=" container table border border-warning w-50 shadow ">
    <thead class="bg-warning text-dark">
        <tr>
           
            <th class="text-center" scope="col">#</th>
            <th class="text-center" scope="col">Catagory</th>
            <th class="text-center" scope="col">Action</th>
        </tr>
    </thead>';
    

    $sql="SELECT * FROM catagory";
    $result= mysqli_query($con,$sql);
    $num=1;
    while($row=mysqli_fetch_assoc($result)){
        $id=$row['ID'];
        $catagory=$row['CATAGORY_NAME'];
       
      
    $table.=' <tbody class="text-center">
    <tr>
    <td>'.$num.'</td>
    <td>'.$catagory.'</td> 
    <td>
    <button class="btn btn-warning"  onclick="editcat('.$id.')">Edit</button>
    </td> 
    </tr>
    </tbody>';
    $num++;
    }
    $table.='</table>';
    echo $table;
}


if(isset($_POST['eid'])){

    $bookData= $_POST['eid'];


    $sql="SELECT * FROM catagory WHERE ID=$bookData";
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




if(isset($_POST['newcatag'])&&isset($_POST['hiddencatag'])){

  $newcatag = $_POST['newcatag'];
  $hiddencatag = $_POST['hiddencatag'];


  $sql2= "SELECT * FROM catagory WHERE ID=$hiddencatag";
  $result=mysqli_query($con,$sql2);
  while($row=mysqli_fetch_assoc($result)){
        $catagname=$row['CATAGORY_NAME'];
    }
   $query="UPDATE book SET CATAGORY = '$newcatag' WHERE CATAGORY= '$catagname' ";
     $res=mysqli_query($con,$query);

   $sql="UPDATE catagory SET CATAGORY_NAME = '$newcatag' WHERE ID = '$hiddencatag' ";
     $result2=mysqli_query($con,$sql);

  

      $sql1= "SELECT * FROM catagory";
   $result1= mysqli_query($con,$sql1);
      while($row=mysqli_fetch_assoc($result1)){
  $catagory=$row['CATAGORY_NAME'];
  echo"<option value='$catagory'>$catagory</option>";
  
    }


    
}
?>