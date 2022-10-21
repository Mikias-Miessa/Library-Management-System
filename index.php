<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library Mangement System</title>
    <!-- Bootstrap css -->
      <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous"> -->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
       
   <!-- parsley style -->
        <style>
          input.parsley-success,
          select.parsley-success,
          textarea.parsler-success {
            color: #468847;
            background-color: #DFF0D8;
            border: 1px solid #D6E9C6;
          }
          input.parsley-error,
          select.parsley-error,
          textarea.parsley-error {
            color: #B94A48;
            background-color: #F2DEDE;
            border: 1px solid #EED3D7;
          }
          .parsley-error-list{
            margin: 2px 0 3px;
            padding: 0;
            list-style-type: none;
            font-size: 0.9em;
            line-height: 0.9em;
            opacity: 0;

            transition: all .3s ease-in;
            -o transition: all .3s ease-in;
            -moz-transition: all .3s ease-in;
            -webkit-transition: all .3s ease-in;
          }
          .parsley-errors-list.filled{
            opacity: 1;
          }
          .parsley-type, .parsley-required, .parsley-equalto, .parsley-min, .parsley-mindate{
            color:#ff0000;
          }
          
          .page-link {
             z-index: 1;
             color: #4c5054;
             background-color: #fff;
             border-color: orange;
          }
         

        </style>
 <script src="assets/js/jquery-3.6.1.min.js"></script>

</head>
<body>
<!-- import modal  -->
 <form id="importform" method="post" enctype="multipart/form-data">
 <div class="modal fade" id="ImportModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content  border border-warning border-3  rounded-3 shadow">
      <div class="modal-header bg-warning text-dark">
        <h5 class="modal-title  text-dark font-weight-bold"  id="exampleModalLabel">Import Books</h5>
        <button type="button" class="btn-close bg-danger" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
         <div class="col-md-12">
            <label for="file" class="form-label text-dark">select excel file here</label>
            <input type="file" name="file"  id="file" required value="" class="form-control ">
        </div>
        
      <div class="modal-footer">
        <!-- <button type="submit" name="import" class="btn btn-primary ">Import</button> -->
         <input type="button" id="submit7"  value="Import"  class="btn btn-primary"> 
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
         <!-- <input type="hidden" id="hiddenData2"> -->
       
      </div>
    </div>
  </div>
  </div>
  </div>
  </form>
<!-- Manage Modal  -->

 <div class="modal fade" id="ManageModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content  border border-warning border-3  rounded-3 shadow">
      <div class="modal-header bg-warning text-dark">
        <h5 class="modal-title  text-dark font-weight-bold" id="exampleModalLabel">Manage Catagory</h5>
        <button type="button" class="btn-close bg-danger" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
       <div class="col-md-6 my-3">
              <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#CatagoryModal">Add Catagory</button>
            </div>
       <div class="col-md-6 my-3">
              <button class="btn btn-warning" onclick="editCatag()">Edit Catagory</button>
            </div>
        
      <div class="modal-footer">
          <!-- <input type="submit" id="submit6"  value="Edit Catagory"  class="btn btn-success"> -->
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
       
      </div>
    </div>
  </div>
  </div>
  </div>
<!-- Edit catagory modal  -->
 <form id="editcatagform">
 <div class="modal fade" id="EditCatagModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content  border border-warning border-3  rounded-3 shadow">
      <div class="modal-header bg-warning text-dark">
        <h5 class="modal-title  text-dark font-weight-bold" id="exampleModalLabel">Edit Catagory</h5>
        <button type="button" class="btn-close bg-danger" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="col-md-12">
            <label for="Edit_Catagory2" class="form-label text-dark">Catagory</label>
            <input type="text" class="form-control" id="Edit_Catagory2" placeholder="" required>
        </div> 
        <div class="col-md-12">
            
            <input type="hidden" class="form-control" id="hiddenCatagory" placeholder="" >
        </div> 
        
      <div class="modal-footer">
          <input type="submit" id="submit6"  value="Edit Catagory"  class="btn btn-success">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
       
      </div>
    </div>
  </div>
  </div>
  </div>
  </form>
<!-- Fine modal  -->
 <form id="fineform" method="post">
 <div class="modal fade" id="FineModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content  border border-warning border-3  rounded-3 shadow">
      <div class="modal-header bg-warning text-dark">
        <h5 class="modal-title  text-dark font-weight-bold"  id="exampleModalLabel">Set Fine</h5>
        <button type="button" class="btn-close bg-danger" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
         <div class="col-md-12">
            <label for="reason" class="form-label text-dark">Enter Fine per day </label>
            <input type="Number" class="form-control" id="setfine" placeholder="enter fine here" name="reason" required data-parsley-trigger="keyup" min="0">
        </div>
        
      <div class="modal-footer">
         <input type="submit" id="submit5"  value="Set Fine"  class="btn btn-primary"> 
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
         <!-- <input type="hidden" id="hiddenData2"> -->
       
      </div>
    </div>
  </div>
  </div>
  </div>
  </form>
<!-- Quantity modal -->
  <div class="modal fade" id="QuantityModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content  border border-warning border-3  rounded-3 shadow">
      <div class="modal-header bg-warning text-dark">
        <h5 class="modal-title  text-dark font-weight-bold" id="exampleModalLabel">Edit Quantity</h5>
        <button type="button" class="btn-close bg-danger" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
         <div class="col-md-12">
            <label for="Edit_Fixed_Quantity" class="form-label text-dark">Enter Quantity</label>
            <input type="text" class="form-control" id="Edit_Fixed_Quantity" placeholder="enter quantity here" name="fixedquantity">
        </div>
         <div class="col-md-12">
            <label for="Edit_Available_Quantity" class="form-label text-dark">Enter Aviailable Quantity</label>
            <input type="text" class="form-control" id="Edit_Available_Quantity" placeholder="enter available quantity here" name="availablequantity" max="#Edit_Fixed_Quantity">
        </div>
        
      <div class="modal-footer">
          <input type="submit" id="submit4"  value="Edit Quantity"  class="btn btn-success">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
       
      </div>
    </div>
  </div>
  </div>
  </div>
<!-- Catagory modal  -->
 <div class="modal fade" id="CatagoryModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content  border border-warning border-3  rounded-3 shadow">
      <div class="modal-header bg-warning text-dark">
        <h5 class="modal-title  text-dark font-weight-bold" id="exampleModalLabel">Add Catagory</h5>
        <button type="button" class="btn-close bg-danger" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
         <div class="col-md-12">
            <label for="Addcatagory" class="form-label text-dark">Enter new catagory</label>
            <input type="text" class="form-control" id="Addcatagory" placeholder="enter catagory here" name="reason">
        </div>
        
      <div class="modal-footer">
         <button type="button" class="btn btn-danger" onclick="addCatagory()">Add Catagory</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
       
      </div>
    </div>
  </div>
  </div>
  </div>

<!-- Add Modal -->
 <form  id="addform" >
 <div class="modal fade" id="AddModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content  border border-warning border-3  rounded-3 shadow">
      <div class="modal-header bg-warning text-dark">
        <h5 class="modal-title  text-dark font-weight-bold" id="exampleModalLabel">Add Book</h5>
        <button type="button" class="btn-close bg-danger" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
     
         <div class="col-md-12">
            <label for="bookname" class="form-label text-dark">Book Name</label>
            <input type="text" class="form-control " id="bookname"placeholder="Book Name" name="TITLE" required data-parsley-trigger="keyup">
           
        </div>
         <div class="col-md-12 " >
            <label for="author" class="form-label text-dark">Author</label>
            <input type="text" class="form-control" id="author"placeholder="Author Name" name="AUTHOR" required data-parsley-trigger="keyup">
           
        </div>
        
         <div class="col-md-6 mt-4">
            <label for="catagory" class="form-label text-dark">Catagory</label>
            <select id="catagory" class="form-select" name="CATAGORY" required data-parsley-trigger="keyup">
               
            </select>
           
        </div>
        <!-- <div class="col-md-6 my-3">
              <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#CatagoryModal">Add Catagory</button>
            </div> -->
         <div class="col-md-12">
            <label for="shelfNumber" class="form-label text-dark">Shelf Number</label>
            <input type="text" class="form-control" id="shelfNumber"placeholder="Shelf Code" name="SHELF_NUMBER" required data-parsley-trigger="keyup">
           
        </div>
         <div class="col-md-12">
            <label for="quantity" class="form-label text-dark">Quantity</label>
            <input type="number" class="form-control" id="quantity"placeholder="Quantity" name="QUANTITY" required data-parsley-type="integer" min="0" data-parsley-trigger="keyup">
           
        </div>
        <div class="col-md-12">
            <label for="pub_date" class="form-label text-dark">Publication Date</label>
            <input type="date" class="form-control" id="pub_date"placeholder="pub_date" name="PUB_DATE" required data-parsley-trigger="keyup">
           
        </div>
      
         <div class="col-md-12 mt-4">
            <label for="grade" class="form-label text-dark">Grade Level</label>
            <select id="grade" class="form-select" name="GRADE_LEVEL" required data-parsley-trigger="keyup">
                <!-- <option selected></option>
                <option value="Nursery">Nursery</option>
                <option value="L-KG">L-kg</option>
                <option value="U-KG">U-kg</option>
                <option value="1-12 Grades">1-12</option> -->
            </select>
           
        </div>
     
        </form>
      </div>
      <div class="modal-footer">
        <input type="submit" id="submit"  value="Add book"  class="btn btn-success"> 
          
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
       
      </div>
    </div>
  </div>
  </div>
  </form>
<!-- Delete Modal -->
 <form id="deleteform" method="post">
 <div class="modal fade" id="DeleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content  border border-warning border-3  rounded-3 shadow">
      <div class="modal-header bg-warning text-dark">
        <h5 class="modal-title text-dark font-weight-bold" id="exampleModalLabel">Delete Book</h5>
        <button type="button" class="btn-close bg-danger" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
         <div class="col-md-12">
            <label for="reason" class="form-label text-dark">Enter Reason</label>
            <input type="textarea" class="form-control" id="reason"placeholder="enter reason here" name="reason" required data-parsley-trigger="keyup">
        </div>
        
      <div class="modal-footer">
         <input type="submit" id="submit2"  value="Delete Book"  class="btn btn-danger"> 
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
         <input type="hidden" id="hiddenData2">
       
      </div>
    </div>
  </div>
  </div>
  </div>
  </form>
<!-- Issue Modal -->
 <form id="issueform" method="post">
 <div class="modal fade" id="IssueModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content  border border-warning border-3  rounded-3 shadow">
      <div class="modal-header bg-warning text-dark">
        <h5 class="modal-title  text-dark font-weight-bold" id="exampleModalLabel">Issue Book</h5>
        <button type="button" class="btn-close bg-danger" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          <div class="col-md-12">
                <label for="stdID" class="form-label text-dark">Student ID</label>
                <input type="text" class="form-control" id="stdID" placeholder="StID" name="StID" required data-parsley-trigger="keyup">
            </div>
            <!-- <div class="col-md-12">
                <label for="BID" class="form-label text-dark">Book ID</label>
                <input type="text" class="form-control" id="BID" placeholder="Book ID" name="BOOK_ID"required>
            </div> -->
            <div class="col-md-12">
                <label for="issuedate" class="form-label text-dark">Issued Date</label>
                <input type="date" class="form-control" id="issuedate"  name="ISSUED_DATE" data-parsley-trigger="keyup" required>
            </div>
            <div class="col-md-12">
                <label for="returned" class="form-label text-dark">Return Date</label>
                <input type="date" class="form-control" id="returned"  name="RETURNED_DATE" data-parsley-trigger="keyup" required data-parsley-mindate="#issuedate" >
            </div>
            <div class="col-md-12">
            <label for="fine" class="form-label text-dark">Fine/Day</label>
            <input type="number" class="form-control" id="fine"placeholder="Enter fine per day" name="fine" required data-parsley-type="integer" min="0" data-parsley-trigger="keyup"> 
            </div>
      </div>
      <div class="modal-footer">
          <input type="submit" id="submit3"  value="Issue Book"  class="btn btn-success"> 
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
       <input type="hidden" id="hiddenData1">
      </div>
    </div>
  </div>
  </div>
 
 </form>
<!-- Edit Modal -->
 <form id="editform" method="post">
  <div class="modal fade" id="EditModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content  border border-warning border-3  rounded-3 shadow">
      <div class="modal-header bg-warning text-dark">
        <h5 class="modal-title  text-dark font-weight-bold" id="exampleModalLabel">Edit Book</h5>
        <button type="button" class="btn-close bg-danger" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
         <div class="col-md-12">
            <label for="Edit_bookname" class="form-label text-dark">Book Name</label>
            <input type="text" class="form-control" id="Edit_bookname"placeholder="Book Name" name="TITLE" required data-parsley-trigger="keyup">
        </div>
         <div class="col-md-12">
            <label for="Edit_author" class="form-label text-dark">Author</label>
            <input type="text" class="form-control" id="Edit_author"placeholder="Author Name" name="AUTHOR" required data-parsley-trigger="keyup">
        </div>
         <div class="col-md-12 mt-4">
            <label for="Edit_catagory" class="form-label text-dark">Catagory</label>
            <select id="Edit_catagory" class="form-select" name="CATAGORY" required data-parsley-trigger="keyup">
            </select>
        </div>
        
        <!-- <div class="col-md-6 my-3">
              <input type="submit" class="btn btn-warning" value="Edit Catagory" onclick="editCatagorymodal()">
            </div> -->
         
         <div class="col-md-12">
            <label for="Edit_shelfNumber" class="form-label text-dark">Shelf Number</label>
            <input type="text" class="form-control" id="Edit_shelfNumber"placeholder="Shelf Code" name="SHELF_NUMBER" required data-parsley-trigger="keyup">
        </div>
        <!-- <div class="col-md-6 my-3">
              <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#QuantityModal">Edit Quantity</button>
            </div> -->
         <div class="col-md-12">
            <label for="Edit_quantity" class="form-label text-dark">Quantity</label>
            <input type="number" class="form-control" id="Edit_quantity"placeholder="Quantity" name="QUANTITY" required data-parsley-type="integer" min="0" data-parsley-trigger="keyup">
        </div>
        <div class="col-md-12">
            <label for="Edit_pub_date" class="form-label text-dark">Publication Date</label>
            <input type="date" class="form-control" id="Edit_pub_date"placeholder="pub_date" name="PUB_DATE" required data-parsley-trigger="keyup">
        </div>
         <div class="col-md-12 mt-4">
            <label for="Edit_grade" class="form-label text-dark">Grade Level</label>
            <select id="Edit_grade" class="form-select" name="GRADE_LEVEL" required data-parsley-trigger="keyup">
                <!-- <option selected></option>
                <option value="Nursery">Nursery</option>
                <option value="L-KG">L-kg</option>
                <option value="U-KG">U-kg</option>
                <option value="1-12 Grades">1-12</option> -->
            </select>
        </div>
      </div>
      <div class="modal-footer">
        <input type="submit" id="submit1"  value="Edit Book"  class="btn btn-success">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <input type="hidden" id="hiddenData">
      </div>
    </div>
  </div>
  </div>
  </form>
<!-- Navbar -->
     <nav class="navbar navbar-expand-lg bg-light navbar-light mb-5 shadow sticky-top ">
        <div class="container-fluid px-0 mx-0" >
            <a class="navbar-brand text-warning mx-5 text-center shadow px-3"  onclick="viewBook()">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-book"
                    viewBox="0 0 16 16">
                    <path
                        d="M1 2.828c.885-.37 2.154-.769 3.388-.893 1.33-.134 2.458.063 3.112.752v9.746c-.935-.53-2.12-.603-3.213-.493-1.18.12-2.37.461-3.287.811V2.828zm7.5-.141c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492V2.687zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783z" />
                </svg>
               
                Library</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse " id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  
                    <li class="nav-item dropdown px-5  ">
                        <a class="nav-link dropdown-toggle  shadow-sm rounded font-weight-bold text-secondary" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Manage Books
                        </a>
                        <ul class="dropdown-menu">
                             <li><a class="dropdown-item btn-warning " data-bs-toggle="modal" data-bs-target="#AddModal">Add Books</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                       
                      
                        </li>
                        <li><a class="dropdown-item btn-warning " data-bs-toggle="modal" data-bs-target="#ImportModal">Import Books</a></li>
                             <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item btn-warning" onclick="issuedBook()">Issued Books</a></li>
                             <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item btn-warning " data-bs-toggle="modal" data-bs-target="#FineModal">Set Fine</a></li>
                        <li>
                          <hr class="dropdown-divider">
                        </li>
                         <li><a class="dropdown-item btn-warning " data-bs-toggle="modal" data-bs-target="#ManageModal">Manage Catagory</a></li>
                         
                       </ul>
                    </li>

                        <a class="nav-link text-secondary shadow-sm rounded font-weight-bold"  role="button" onclick="report()">
                        Report
                        </a>
                       
                        <a class="nav-link mx-5 text-secondary shadow-sm rounded font-weight-bold"  role="button" onclick="viewBook()" aria-expanded="false">
                            View All Books
                        </a>
                        <div class="mt-2 shadow-sm px-2 font-weight-bold "><label for="filter" class="text-secondary ">Filter by</label>
                           <select  id="filter" class="rounded border border-warning" onclick="viewCatagory()"> </select>
                      
                      </div>
 
                    </ul>
                    
                   <div class="w-25 ml-5" >
                
                     <input class=" rounded w-100 py-1 border border-warning px-2"  id="search" type="search" placeholder="     Search here by Title, Author, G-level" aria-label="Search" name="searchquery">
                   </div>

                    <!-- <button class="btn btn-outline-warning ml-2 py-0" type="submit" >Search</button> -->
                    </div>
                  
                      
               
                     </div>
    </nav>
<!-- Body  -->  
  
 
    <div >
     
  <div id="displayHere"></div>
  </div>

	


<!-- Bootstrap Javascript -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa"
    crossorigin="anonymous"></script>
  <!-- <script src="assets/js/bootstrap.bundle.min.js"></script> -->

    
<!-- Parsley Script include  -->
    <script src="assets/js/parsley.min.js"></script>



<!-- SCRIPTS -->
<!-- parsley script  -->
 <script>
 
  var parseRequirement = function (requirement) {
  if (isNaN(+requirement))
    return Date.parse(jQuery(requirement).val());
  else
    return +requirement;
 };

  // Greater than or equal to validator
 window.Parsley.addValidator('mindate', {
  validateString: function (value, requirement) {
    return Date.parse(value) >= parseRequirement(requirement);
  },
  priority: 32
 }) .addMessage('en', 'mindate',
				'This date should be greater than Issued date');
 
 </script>
    <script>
// Document Ready Function.......***********..............**************...........***********...........**********...........***********
    $(document).ready(function(){
 // Add Book
      $("#addform").on('submit', function(event){
      event.preventDefault();
      var form = $(this);
      form.parsley().validate();
      if(form.parsley().isValid()){
       
        var bookname=$('#bookname').val();
          var author=$('#author').val();
          var catagory=$('#catagory').val();
          var shelfNumber=$('#shelfNumber').val();
          var quantity=$('#quantity').val();
          var pub_date=$('#pub_date').val();
          var grade=$('#grade').val();
          $.ajax({
        url:"addbook.php",
        type:'post',
        data:{
           bookname:bookname,
           author:author,
           catagory:catagory,
           shelfNumber:shelfNumber,
           quantity:quantity,
           pub_date:pub_date,
           grade:grade
        },
        beforeSend:function(){
          $('#submit').attr('disabled','disabled');
          $('#submit').val('Adding...');
        },
         success:function(data,status){
         //$('#AddModal').modal('hide');
            $('#addform')[0].reset();
            $('#addform').parsley().reset();
            $('#submit').attr('disabled', false);
            $('#submit').val('Add Book');
            alert(data);
            viewBook();
         }
         });
      }
   
      });
 // Edit Catagory 
  $("#editcatagform").on('submit', function(event){
      event.preventDefault();
      var form = $(this);
      form.parsley().validate();
      if(form.parsley().isValid()){
       
        var newcatag =$('#Edit_Catagory2').val();
        var hiddencatag =$('#hiddenCatagory').val();
          
          $.ajax({
        url:"editCatagory.php",
        type:'post',
        data:{
           newcatag:newcatag,
           hiddencatag:hiddencatag
        },
        // beforeSend:function(){
        //   $('#submit').attr('disabled','disabled');
        //   $('#submit').val('Adding...');
        // },
         success:function(data,status){
         $('#EditCatagModal').modal('hide');
        // $('#EditModal').modal('show');
            $('#editcatagform')[0].reset();
            $('#editcatagform').parsley().reset();
             $('#catagory').html(data);
            $('#filter').html(data);
            $('#Edit_catagory').html(data);
            editCatag();
           
         }
         });
      }
   
      });

 // Edit Book
        $("#editform").on('submit', function(event){
      event.preventDefault();
      var form = $(this);
      form.parsley().validate();
      if(form.parsley().isValid()){
       
    var newTitle=$('#Edit_bookname').val();
    var newAuthor=$('#Edit_author').val();
    var newCatagory=$('#Edit_catagory').val();
    var newShelfNo=$('#Edit_shelfNumber').val();
    var newQuantity=$('#Edit_quantity').val();
    var newPubDate=$('#Edit_pub_date').val();
    var newGrade=$('#Edit_grade').val();
    var hiddenData=$('#hiddenData').val();
          $.ajax({
        url:"editBook.php",
        type:'post',
        data:{
           newTitle:newTitle,
           newAuthor:newAuthor,
           newCatagory:newCatagory,
           newShelfNo:newShelfNo,
           newQuantity:newQuantity,
           newPubDate:newPubDate,
           newGrade:newGrade,
           hiddenData:hiddenData
        },
         beforeSend:function(){
          $('#submit1').attr('disabled','disabled');
          $('#submit1').val('Editing Book...');
        },
        success:function(data,status){
          $('#EditModal').modal('hide');
         $('#editform')[0].reset();
            $('#editform').parsley().reset();
            $('#submit1').attr('disabled', false);
            $('#submit1').val('Edit Book');
            alert(data);
            viewBook();
        }

    });
      }
   
      });

 // Delete Book       
        $("#deleteform").on('submit', function(event){
      event.preventDefault();
      var form = $(this);
      form.parsley().validate();
      if(form.parsley().isValid()){
       
   var reason = $('#reason').val();
    var deletebook = $('#hiddenData2').val();
  $.ajax({
    url:"del.php",
    type:'post',
    data:{
        deletebook:deletebook,
        reason:reason
    },
     beforeSend:function(){
          $('#submit2').attr('disabled','disabled');
          $('#submit2').val('Deleting Book...');
        },
    success:function(data,status){
      $('#DeleteModal').modal('hide');
     report();
       $('#deleteform')[0].reset();
            $('#deleteform').parsley().reset();
            $('#submit2').attr('disabled', false);
            $('#submit2').val('Delete Book');
            alert(data);
    }
  });
      }
   
      });
 // Issue Book 
        $("#issueform").on('submit', function(event){
      event.preventDefault();
      var form = $(this);
      form.parsley().validate();
      if(form.parsley().isValid()){
       
   var stdID = $('#stdID').val();
    var issuedate=$('#issuedate').val();
    var returned=$('#returned').val();
    var bID=$('#hiddenData1').val();
    var fine=$('#fine').val();
   
    $.ajax({
      url:"iss.php",
      type:'post',
      data:{
        stdID:stdID,
        issuedate:issuedate,
        returned:returned,
        fine:fine,
        bID:bID
      },
       beforeSend:function(){
          $('#submit3').attr('disabled','disabled');
          $('#submit3').val('Issuing Book...');
        },
      success:function(data,status){
        $('#IssueModal').modal('hide'); 
        
    
       $('#issueform')[0].reset();
            $('#issueform').parsley().reset();
            $('#submit3').attr('disabled', false);
            $('#submit3').val('Issue Book');
            alert(data);
         issuedBook();
        
      }
    });
      }
   
      });

 // Set fine       
        $("#fineform").on('submit', function(event){
      event.preventDefault();
      var form = $(this);
      form.parsley().validate();
      if(form.parsley().isValid()){
       
   var setfine = $('#setfine').val();
    
  $.ajax({
    url:"fine.php",
    type:'post',
    data:{
        setfine:setfine
    },
     beforeSend:function(){
          $('#submit5').attr('disabled','disabled');
          $('#submit5').val('Setting fine...');
        },
    success:function(data,status){
      $('#FineModal').modal('hide');
     
       $('#fineform')[0].reset();
            $('#fineform').parsley().reset();
            $('#submit5').attr('disabled', false);
            $('#submit5').val('Set fine');
            alert(data);
    }
  });
      }
   
      });
 // print button function 
  $('#prt').on('click', function() {
  printData();
  window.location = window.location.href;
   });

// Import Book 
  $("#submit7").on('click', function(event){
      event.preventDefault();
      var form = $(this);
      form.parsley().validate();
      if(form.parsley().isValid()){
       
   let formData = new FormData();
   let file = $('#file')[0].files[0];
   formData.append('file',file);
  $.ajax({
    url:"impBook.php",
    type:'post',
    data: formData,
    contentType: false,
    processData: false,
     beforeSend:function(){
          $('#submit7').attr('disabled','disabled');
          $('#submit7').val('Importing fine...');
        },
    success:function(data,status){
      $('#ImportModal').modal('hide');
     
       $('#importform')[0].reset();
            $('#importform').parsley().reset();
            $('#submit7').attr('disabled', false);
            $('#submit7').val('Import');
            viewBook();
            alert(data);
    }
    });
      }
   
      });
// pagination 
 $(document).on('click', '.id', function(){  
           var page = $(this).attr("id");  
           viewBook(page);  
      })
 $(document).on('click', '.nxt', function(){  
           var page = $(this).attr("id"); 
             
           Next(page);  
      })
 
viewCatagory();
 count();
 viewGrade();

 });

 


// view function 
     function viewBook(page){
       // var viewBook="true";
          
        $.ajax({
          url:"viewBook.php",
          type:'post',
          data:{
            page:page
          },
          success:function(data,status){
            $('#displayHere').html(data);
          }
        });

    }
     function Next(page){
       // var viewBook="true";
          
        $.ajax({
          url:"viewBook.php",
          type:'post',
          data:{
            page:page
          },
          success:function(data,status){
            $('#displayHere').html(data);
          }
        });

    }
     function prev(page){
       // var viewBook="true";
          
        $.ajax({
          url:"viewBook.php",
          type:'post',
          data:{
            page:page
          },
          success:function(data,status){
            $('#displayHere').html(data);
          }
        });

    }
      
// Search Function
   $("#search").keypress(function(){
    $.ajax({
        type:'POST',
        url:'search.php',
        data:{
          name:$("#search").val(),
        },
        success:function(data){
           $('#displayHere').html(data);
        }
     });
 })
       
// Add function 
     function addBook() {
      
  $('#addform').parsley();
 // event.preventDefault();
 if($('#addform').parsley().isValid()){
    var bookname=$('#bookname').val();
    var author=$('#author').val();
    var catagory=$('#catagory').val();
    var shelfNumber=$('#shelfNumber').val();
    var quantity=$('#quantity').val();
    var pub_date=$('#pub_date').val();
    var grade=$('#grade').val();

    $.ajax({
        url:"addbook.php",
        type:'post',
        data:{
           bookname:bookname,
           author:author,
           catagory:catagory,
           shelfNumber:shelfNumber,
           quantity:quantity,
           pub_date:pub_date,
           grade:grade
        },
       // data:($this).serialize(),
        success:function(data,status){
        //   $('#addform')[0].reset();
        //   $('#addform').parsley().reset();
        //  $('#AddModal').modal('hide');
        //   console.log(status);
          //viewBook();
          //alert(data);
            //$('#validation').html(data);
           // alert("Book added Successfully");
        }

    });

 } 
     }

//Delete modal
     function deletemodal(delID){
    
    $('#hiddenData2').val(delID);
    $('#DeleteModal').modal('show');
  
 }
  
// Delete function 
 function deleteBook(){
  $('#deleteform').parsley();
    if($('#deleteform').parsley().isValid()){
    var reason = $('#reason').val();
    var deletebook = $('#hiddenData2').val();
  $.ajax({
    url:"del.php",
    type:'post',
    data:{
        deletebook:deletebook,
        reason:reason
    },
    success:function(data,status){
      $('#DeleteModal').modal('hide');
      viewBook();
      alert("Book deleted successfully!")
    }
  });
 }}

// edit function
 function editBook(editid){
 
  $('#hiddenData').val(editid);

  $.post("editBook.php",{editid:editid}, function(data,status){
  var bookData= JSON.parse(data);
  $('#Edit_bookname').val(bookData.TITLE);
  $('#Edit_author').val(bookData.AUTHOR);
  $('#Edit_catagory').val(bookData.CATAGORY);
  $('#Edit_shelfNumber').val(bookData.SHELF_NUMBER);
  $('#Edit_quantity').val(bookData.FIXED_QUANTITY);
  $('#Edit_pub_date').val(bookData.PUB_DATE);
  $('#Edit_grade').val(bookData.GRADE_LEVEL);
  });
  $('#EditModal').modal('show');
 }
// edit catagory modal 
 function editCatagorymodal(){
  event.preventDefault();
  var click = $('#hiddenData').val();
  $.post("editCatagory.php",{click:click}, function(data,status){

  var bookData= JSON.parse(data);
  $('#Edit_Catagory2').val(bookData.CATAGORY);
  $('#hiddenCatagory').val(bookData.CATAGORY);
  
  });
  $('#EditModal').modal('hide');
  $('#EditCatagModal').modal('show');
 }

 

//update function
  function update(){
      $('#editform').parsley();
      
    if($('#editform').parsley().isValid()){
    var newTitle=$('#Edit_bookname').val();
    var newAuthor=$('#Edit_author').val();
    var newCatagory=$('#Edit_catagory').val();
    var newShelfNo=$('#Edit_shelfNumber').val();
    var newQuantity=$('#Edit_quantity').val();
    var newPubDate=$('#Edit_pub_date').val();
    var newGrade=$('#Edit_grade').val();
    var hiddenData=$('#hiddenData').val();
    
     $.ajax({
        url:"editBook.php",
        type:'post',
        data:{
           newTitle:newTitle,
           newAuthor:newAuthor,
           newCatagory:newCatagory,
           newShelfNo:newShelfNo,
           newQuantity:newQuantity,
           newPubDate:newPubDate,
           newGrade:newGrade,
           hiddenData:hiddenData
        },
        success:function(data,status){
         
          $('#EditModal').modal('hide');
          viewBook();
          alert(data);
        }

    });
  }
  }
 
//ISSUED BOOK
  function issuedBook(){
        var issuedBook="true";

        $.ajax({
          url:"issuedBook.php",
          type:'post',
          data:{
            issuedBook:issuedBook
          },
          success:function(data,status){
            $('#displayHere').html(data);
          }
        });

  }

//show IssueModal  
  function IssueBook(bID){
      var setfine= "True";
      $('#hiddenData1').val(bID);
 $.post("iss.php",{setfine:setfine}, function(data,status){
  var bookData= JSON.parse(data);
  $('#fine').val(bookData.Fine);
 
  });
    $('#IssueModal').modal('show');  
 }

//issue Book
  function Issue(){
     $('#issueform').parsley();
    if($('#issueform').parsley().isValid()){
    var stdID = $('#stdID').val();
    var issuedate=$('#issuedate').val();
    var returned=$('#returned').val();
    var finee=$('#finee').val();
    
    var bID=$('#hiddenData1').val();
   
    $.ajax({
      url:"iss.php",
      type:'post',
      data:{
        stdID:stdID,
        issuedate:issuedate,
        returned:returned,
        finee:finee,
        bID:bID
      },
      success:function(data,status){
        $('#IssueModal').modal('hide'); 
         $('#issueform').parsley().reset();
        // console.log(stdID);
        // console.log(bID);
        // console.log(issuedate);
        console.log(returned);
         console.log(fine);
        // $('#displayHere').html(data);
         issuedBook();
         alert(data);
      }
    });
  }
  }

//return book function
  function ReturnBook(issid,retid){
   $.ajax({
    url:"return.php",
    type:'post',
    data:{
        issid:issid,
        retid:retid
    },
    success:function(data,status){
      console.log(issid);
      console.log(retid);
      issuedBook();
      // $('#displayHere').html(data);
    }
    });
  }

//report function
 function report(){
  var report='true';
  $.ajax({
    url:"report.php",
    type:'post',
    data:{
      report:report
    },
    success:function(data,status){
      $('#displayHere').html(data);
    }
  })
  }

//add catagory function
  function addCatagory(){
  var catag = $('#Addcatagory').val();
  $.ajax({
    url:"catagory.php",
    type:'post',
    data:{
      catag:catag
    },
    success:function(data,status){
       //$('#AddModal').modal('show');  
       $('#CatagoryModal').modal('hide');  
        viewCatagory();
        alert(data);
    }
  })
  }

//View Catagory function
  function viewCatagory(){
  var catagory='true';
  $.ajax({
    url:"catagory.php",
    type:'post',
    data:{
      catagory:catagory
    },
    success:function(data,status){
       $('#catagory').html(data);
      $('#filter').html(data);
      $('#Edit_catagory').html(data);
    }
  })
  }
// view grade function 
  function viewGrade(){
  var grade='true';
  $.ajax({
    url:"catagory.php",
    type:'post',
    data:{
      grade:grade
    },
    success:function(data,status){
       $('#grade').html(data);
      //$('#filter').html(data);
      $('#Edit_grade').html(data);
    }
  })

  }

//Filter Function
  $("#filter").on('change',function(){

  var value = $(this).val();
  //alert(value);
  $.ajax({
    url:"filtered.php",
    type:'post',
    data:{
      value:value
    },
    success:function(data,status){
    $('#displayHere').html(data);
    console.log(value);
    }
  });
  });

//Usage Counter Function
  function count(){
  var count = "true";
  $.ajax({
    url:"count.php",
    type:'post',
    data:{
      count:count
    },
    success:function(data,status){
      viewBook();
    }
  })
  }

// Edit catagory page 
 function editCatag(){
  var editpage = "true";
   $.ajax({
    url:"editCatagory.php",
    type:'post',
    data:{
      editpage:editpage
    },
    success:function(data,status){
       $('#displayHere').html(data);
        $('#ManageModal').modal('hide');

    }
  })
  }
// fetch catagory 
  function editcat(eid){
    $('#hiddenCatagory').val(eid);

  $.post("editCatagory.php",{eid:eid}, function(data,status){
  var bookData= JSON.parse(data);
 
  $('#Edit_Catagory2').val(bookData.CATAGORY_NAME);
 
  });
  $('#EditCatagModal').modal('show');

  }
// import Books function 
   function importBooks(){

        var importBook="true";

        $.ajax({
          url:"import.php",
          type:'post',
          data:{
            importBook:importBook
          },
          success:function(data,status){
            $('#displayHere').html(data);
          }
        });

  }
   


</script>
</body>
</html>
  