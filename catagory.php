 <?php
  include 'conn.php';

if(isset($_POST['catagory'])){
  $sql= "SELECT * FROM catagory";
   $result= mysqli_query($con,$sql);
   echo"<option selected>Choose...</option>";
   while($row=mysqli_fetch_assoc($result)){
  $catagory=$row['CATAGORY_NAME'];
  echo"<option value='$catagory'>$catagory</option>";
  // echo"<li><a class='dropdown-item' value='$catagory'>$catagory</a></li>";
    }
}

if(isset($_POST['catag'])){
  
    $catag=$_POST['catag'];

  $query="INSERT INTO catagory(CATAGORY_NAME) VALUES('$catag')";
  $res=mysqli_query($con,$query);

  if($res){
    echo"Catagory added successfully...";
  }

}

// view Grades in the drop down menu 

if(isset($_POST['grade'])){
  $sql= "SELECT * FROM grades ORDER BY GrOrder ASC";
   $result= mysqli_query($con,$sql);
   echo"<option selected>Choose...</option>";
   while($row=mysqli_fetch_assoc($result)){
  $grade=$row['Grade'];
  echo"<option value='$grade'>$grade</option>";
  // echo"<li><a class='dropdown-item' value='$catagory'>$catagory</a></li>";
    }
}



  ?>
