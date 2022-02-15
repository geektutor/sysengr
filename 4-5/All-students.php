<?php
session_start();
include 'config.php';
include 'function.php';
if(isset($_SESSION['username'])){
    //results per page
    $result_per_page = 10;
    //find out the number of results stored in database
    $sql = "SELECT * FROM student" ;
    $query = mysqli_query($conn, $sql);
    $num_of_results = mysqli_num_rows($query);

    //determine the total number of pages available
    $num_of_pages = ceil($num_of_results / $result_per_page);
    //determine which page number visitor is currently on
     if(!isset($_GET['page'])){
         $page = 1;
     }else{
         $page = $_GET['page'];
     }

     //determine the SQL Limit starting number for the results on the displaying page(offset)
    $page_first_result = ($page-1)*$result_per_page;

    //retrieve selected results from database and display them on the page(last step)

   //display the link to the pages

    //display search results to user
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Admin | View All Students</title>
<!-- custom-theme -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="best school in Olodi Apapa, Prince Charles International School." />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //custom-theme -->
<!-- css files -->
<link href="assets/css/bootstrap.min.css" type="text/css" rel="stylesheet">
<link href="assets/css/style.css" type="text/css" rel="stylesheet" media="all">
<link href="assets/css/datatables.css" type="text/css" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Ubuntu:300,300i,400,400i,500,500i,700,700i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <!-- //css files -->
    <style>
      
        .pagination>li>a{
            left: 45% !important;
        }
        .table-responsive{
            clear: both;
        }
        .form-control{
            display: inline;
            width: 70% !important;
            height: 36px;
        }
        /*@media only screen and (max-width: 768px) {*/
        /*    .pagination>li>a{*/
        /*        left: 45% !important;*/
        /*    }*/
        /*}*/

        div.dataTables_wrapper div.dataTables_paginate{
          text-align: center !important;
        }
    </style>
</head>
<!-- body starts -->
<body style="height: 100vh; font-family: Ubuntu;">
  <div class="container">
      <div class="row">
       <h1 class="welcomemsg" style="font-size: 20px; color:#fff; padding-top:40px;">STUDENTS' INFORMATION</h1>
   
          <div class="col-lg-12 welcome" style="margin-top: 50px; border-radius: 10px; background: #FBF4F4D8; padding-top:20px; margin-bottom: 90px;">
          <div class="btnn">
                <a class="button" type="submit" href="Admin-dashboard.php"> Back to dashborad</a>
              </div>
            <h3 class="text-center header" style="color:#000; margin-bottom: 40px;">View All Students Data</h3>
            
              <div id="result"></div>
              <div class="table-responsive">

                  <table class="table table-bordered table-striped table-hover" id="basic">
                    <thead>
                      <tr class="table-dark" style="color: #fff; font-weight: bold;">
                          <th>S/n</th>
                          <th style="text-align: center;">Name</th>
                          <th style="text-align: center;">Sex</th>
                          <th style="text-align: center;">Class</th>
                          <th style="text-align: center;">Registration No</th>
                          <th style="text-align: center;">Username</th>
                          <th style="text-align: center;">Pin No</th>
                          <th style="text-align: center;">Card Serial No</th>
                          <th style="text-align: center;">Action</th>
                        </tr>
                      </thead>
                          <?php
                             $std_class = array('year 7', 'year 8', 'year 9', 'year 10', 'year 11', 'year 12');
                             $sql = "SELECT * FROM student";
                             $query = mysqli_query($conn, $sql);
                             if(mysqli_num_rows($query) > 0){
                             while($result = mysqli_fetch_array($query)){
                                 $id = $result['studentID'];
                                  $name = $result['name'];
                                  $sex = $result['sex'];
                                  $class = $result['classesID'];
                                  $reg_no = $result['registerNO'];
                                  $username = $result['username'];
                                  $pin = $result['exam_pin'];
                                  $card_serial = $result['card_Serial_no'];

                                  if($class == 1){
                                      $std_current_class = $std_class[0];
                                  }elseif($class == 2){
                                      $std_current_class = $std_class[1];
                                  }elseif($class == 3){
                                      $std_current_class = $std_class[2];
                                  }elseif($class == 4){
                                      $std_current_class = $std_class[3];
                                  }elseif($class == 5){
                                      $std_current_class = $std_class[4];
                                  }else{
                                      $std_current_class = $std_class[5];
                                  }


                                  ?>

                      <tr>
                          <td><?php  echo $id; ?></td>
                          <td style="text-align: center;"><?php  echo $name; ?></td>
                          <td style="text-align: center;"><?php  echo $sex; ?></td>
                          <td style="text-align: center;"><?php  echo $std_current_class; ?></td>
                          <td style="text-align: center;"><?php  echo $reg_no; ?></td>
                          <td style="text-align: center;"><?php  echo $username; ?></td>
                          <td style="text-align: center;"><?php  echo $pin; ?></td>
                          <td style="text-align: center;"><?php  echo $card_serial; ?></td>
                          <td style="text-align: center;">
                              <a href="javascript:void(0)"  data-toggle="modal" data-target="#edit<?php echo $result['studentID'] ?>"><i class="fa fa-edit"></i></a>
                              <a href="delete-student.php?delete=<?=$username;?>"><i class="fa fa-trash"></i></a>
                          </td>
                      </tr>
                                 <?php
                             }
                                 }else{
                          ?>
                      <tr>
                          <td colspan="8" align="center"><?php echo "No Students Found."; ?></td>
                      </tr>
                      <?php
                             }

                          ?>

                  </table>


              </div>

          </div>
      </div>

  </div>

  <!-- copyright -->
  <footer>
      <p class="footer panel-footer navbar-fixed-bottom text-center" style="color: #fff; ">@ 2021 CDSSA. All Rights Reserved | Created by <a href="https://johnoseni.com/" >John Oseni</a></p>
      <!-- //copyright -->
  </footer>

   <script src="assets/js/jquery.js"></script>
   <script src="assets/js/jquery.dataTables.min.js"></script>
   <script src="assets/js/bootstrap.min.js"></script> 

    


<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>

   <script>
$(document).ready(function() {

    $('#basic').dataTable( {
    "responsive": true,
    "language": {
      "paginate": {
        "previous": '<i class="fa fa-angle-left"></i>',
        "next": '<i class="fa fa-angle-right"></i>'
      }
    }
  } );
} );
</script>

<!-- Student Profile Edit Modal start-->
  <!-- Modal -->

  <?php 
     //start PHP while loop
    if(mysqli_num_rows($query) > 0){

       foreach($query as $result){

      ?>

  <div class="modal fade" id="edit<?php echo $result['studentID'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                  <h4 class="modal-title" id="myModalLabel">You are editing <span class="bg-success"><?php  echo $result['name'] . '\'s ' ?></span> Information</h4>
              </div>
              <div class="modal-body">
            
                 <form action="view-all-students.php" method="post">
                   
                       <div class="row">
                          <div class="col-md-6">
                            
                             <div class="form-group">
                              <label for="name">Name</label>
                              <input type="text" name="name" value="<?php echo $result['name']; ?>" class='form-control'>
                           </div>

                            <div class="form-group">
                              <input type="hidden" name="id"  class='form-control' value="<?php echo $result['studentID']; ?>">
                           </div>


                          </div>

                           <div class="col-md-6">
                            
                             <div class="form-group">
                              <label for="sex">Sex</label>
                              <input type="text" name="sex" value="<?php echo $result['sex']; ?>" class='form-control'>
                           </div>
                          </div>

                           <div class="col-md-4">
                            
                             <div class="form-group">
                              <label for="class">Class</label>
                              <input type="text" name="class" value="<?php echo $std_current_class; ?>" class='form-control' readonly>
                           </div>
                          </div>

                           <div class="col-md-8">
                            
                             <div class="form-group">
                              <label for="username" class="control-label">Username</label>
                              <input type="text" name="username" value="<?php echo $result['username'] ; ?>" class='form-control'>
                           </div>
                          </div>


                          <div class="col-md-12 text-center">
                            
                             <div class="form-group">
                              <input type="submit" name="update" value="Update Details" class='btn btn-success btn-lg'>
                           </div>
                           	<p id="display_result"></p>
                          </div>


                   </div>
                 </form>
          
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
          </div>
      </div>
  </div>

  <!-- Student Profile Edit Modal End-->
  <?php
   //end while loop
    }}
  ?>


  <!-- Run the modal user form edit query -->

  <?php
     if(isset($_POST['update'])){
       $id = $_POST['id'];
       $name = mysqli_real_escape_string($conn, htmlspecialchars($_POST['name'], ENT_QUOTES, 'utf-8'));
       $sex = mysqli_real_escape_string($conn, htmlspecialchars($_POST['sex'], ENT_QUOTES, 'utf-8'));
       $username = mysqli_real_escape_string($conn, htmlspecialchars($_POST['username'], ENT_QUOTES, 'utf-8'));
       
       //check if useername already exists for another user

       if(usernameCheck($conn, $username)){
            
            ?> 
             <script>
                     alert('Username already Exist.');
             </script>
            
           <?php

       }else{
             //SQL 
      $sql = "UPDATE student SET name = '$name', sex = '$sex', username = '$username' WHERE studentID = '$id'";
     
       //query

      $query = mysqli_query($conn, $sql);

      if($query){
           
           ?> 
             <script>
                     alert('Your Details was Updated Successfully');
                     window.location.href= 'view-all-students.php';

             </script>
            
           <?php

      }else{
      	echo "An error occured".mysqli_error($conn);
      }

       }
   

     }

   ?>

</body>
<!-- //body ends -->
</html>

<?php }else{

    header('location: index.php');
}?>











