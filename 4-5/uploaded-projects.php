<?php
session_start();
   include_once ('config.php');
   include_once ('function.php');
if(isset($_SESSION['username'])){
  $username = $_SESSION['username'];





?>


<!DOCTYPE html>
<html lang="en">
   <head>
      <title>  View Uploaded  </title>
      <!-- Meta tags -->
      <meta name="viewport" content="width=device-width, initial-scale=1" />
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <meta name="keywords" content=""
         />
      <script>
         addEventListener("load", function () { setTimeout(hideURLbar, 0); }, false); function hideURLbar() { window.scrollTo(0, 1); }
      </script>
      <!-- Meta tags -->
      <!--stylesheets-->
      <link href="assets/css/style.css" rel='stylesheet' type='text/css' media="all">
      <link href="assets/css/bootstrap.min.css" rel='stylesheet' type='text/css' media="all">
      <!--//style sheet end here-->
      <link href="//fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,700" rel="stylesheet">
   </head>
   <body style="overflow-x: hidden;">
      <div class="mid-class">
         <div class="art-right-w3ls">

           <div class="table-responsive " style="background-color: #fbf4f4">
               <table class="table table-hover" style=" width: 1200px; color: #000 background-color: transparent;">
                  <tr class="table-dark" style="color: #fff; font-weight: bold;">
                     <th style="text-align:center;">S/N</th>
                     <th style="text-align:center;">numbers</th>
                     <th style="text-align:center;">Project Name</th>
                     <th style="text-align:center;">Project Status</th>
                     <th style="text-align:center;">Project Link</th>
                     <th style="text-align:center;">Action</th>
                  </tr>
                     <?php 
                        $i = 1;
                        $sql = "SELECT * FROM terminal_report ORDER BY id DESC";
                        $query = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($query) > 0) {
                           while ($row = mysqli_fetch_array($query)) {
                              $numbers = $row['numbers'];
                              $project_name = $row['project_name'];
                              $project_status = $row['project_status'];
                              $project_link = $row['project_link'];

                              ?> 
                                 <tr>
                                    <td style="text-align:center;"><?php echo $i; ?></td>
                                    <td style="text-align:center;"><?php echo $class; ?></td>
                                    <td style="text-align:center;"><?php echo $project_name; ?></td>
                                    <td style="text-align:center;"><?php echo $project_status; ?></td>
                                    <td style="text-align:center;"><?php echo $project_link; ?></td>
                                    <td style="text-align:center;">
                                       <a href="delete.php>?name=<?php echo $project_name;?>&year=<?php echo $project_status;?>" class="btn btn-danger">Delete</a>


                                    </td>

                                 </tr>
                              
                              <?php

                              $i++;

                              
                           }
                        }else {
                           ?>  
                              <tr>
                                 <td colspan="6" style="text-align: center;">You haven't Uploaded any Projectss  Yet.</td>
                              </tr>
                           
                           <?php
                        }
                     ?>

               </table>
           </div>
          
            <!-- <form >
               <div class="main">
                  <div class="form-left-to-w3l">
                     <input type="text" name="name" placeholder="Enter Card Serial No" required="">
                  </div>
                  <div class="form-left-to-w3l ">
                     <input type="password" name="password" placeholder="Enter Generated Pin" required="">
                     <div class="clear"></div>
                  </div>
                  <div class="form-left-to-w3l">
                    <select type="year" name="" id="">
                        <option >
                            Enter Year
                        </option>
                        <option >
                            2021
                        </option>
                        <option >
                            2022
                        </option>
                        <option >
                           2023
                        </option>
                        <option >
                            2024
                        </option>
                        <option >
                            2025
                        </option>
                        <option >
                            2026
                        </option>
                        <option >
                           2027
                        </option>
                    </select>
                 </div>
                 <div class="form-left-to-w3l">
                    <select type="year" name="" id="">
                        <option >
                            Enter Term
                        </option>
                        <option >
                            First Term
                        </option>
                        <option >
                            Second Term
                        </option>
                        <option >
                            Third Term
                        </option>
                    </select>
                 </div>
               </div>
               
               <div class="clear"></div><br><br>
               <div class="btnn">
                 <a class="button" type="submit" href="terminal.html"> Check Result</a>
               </div>
            </form> -->
            <!-- <div class="w3layouts_more-buttn">
               <h3>Your Generated Pin is : 17256
               </h3>
            </div> -->
            <!-- popup-->
          
            <!-- //popup -->
         </div>
         <!-- <div class="art-left-w3ls">
            <h1 class="header-w3lse">
               Please Note you have to have a scratch card from the school 
               to check your result.
            </h1><br><br>
            <h1 class="header-w3lse">
                You are allowed to use scratch card as many times as possible
             </h1><br><br>
             <h1 class="header-w3lse">
                Scratch Card Expires at the end of each term
             </h1><br><br>

             <h1 class="header-w3lse">
                <a href="check-result.html">DashBoard</a>
             </h1><br><br>
             <h1 class="header-w3lse">
                <a href="login.html">Logout</a>
             </h1><br><br>
             
         </div> -->
      </div>
      <!-- <footer class="bottem-wthree-footer">
         <p>
            © 2021 Command Day secondary school Akure. All Rights Reserved | Created by
            <a href="http://www.johnoseni.com">John Oseni</a>
         </p>
      </footer> -->
   </body>
</html>
<?php }else{
   
   ?>
   <head>
     <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="keywords" content="" />
     
      <!-- Meta tags -->
      <!--stylesheets-->
      <link href="assets/css/bootstrap.min.css" rel='stylesheet' type='text/css'>
      <link href="assets/css/style.css" rel='stylesheet' type='text/css' media="all">
      <!--//style sheet end here-->
      <link href="//fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,700" rel="stylesheet">
   </head>
   <body >
      <div class="container">
      <div class="jumbotron">
         <h1 class="alert alert-danger">You Must Login to access this page</h1>
      </div>
      <p class="text-center" style="color: #fff">You will be redirected to the login Page in 4s.</p>
      <meta http-equiv="refresh" content="4; Admin-Login.php">
      </div> 
   </body>
   <?php


}?>