<?php
session_start();

$msg1=''; $msg2=''; $msg3=''; $msg4=''; $msg5=''; $msg6='';

   include_once ('config.php');
   include_once ('function.php');
if(isset($_SESSION['username'])){
  $username = $_SESSION['username'];
   if(isset($_POST['submit'])) {
      $Number = mysqli_real_escape_string($conn, htmlspecialchars($_POST['numbers'], ENT_QUOTES, 'utf-8'));
      $project_name = mysqli_real_escape_string($conn, htmlspecialchars($_POST['projectname'], ENT_QUOTES, 'utf-8'));
      $project_status = mysqli_real_escape_string($conn, htmlspecialchars($_POST['projectstatus'], ENT_QUOTES, 'utf-8'));
      $project_link = mysqli_real_escape_string($conn, htmlspecialchars($_POST['projectlink'], ENT_QUOTES, 'utf-8'));
      $project_codes = $_FILES['project_codes'];


       if(empty($Number)) {
          $msg1 = "<div class='alert alert-danger'>Please Choose a class</div>";
       }elseif(empty($project_name)) {
          $msg2 = "<div class='alert alert-danger'>Select the name of the Project</div>";
       }elseif(empty($project_status) || empty($project_link)) {
         $msg3 = "<div class='alert alert-danger'>Both Project Status and Project Link are Required</div>";
       }else{
          $project_codes_name = $_FILES['project_codes']['name'];
          $project_codes_tmp = $_FILES['project_codes']['tmp_name'];
          $project_codes_size = $_FILES['project_codes']['size'];
         //  echo 'File name is:'.$project_codes_size;
          $filenameArray = explode( ".", $project_codes_name );
          $extension = end( $filenameArray);
          $ext = strtolower($extension);
          $uniqueName = rand(1, 1000).rand(1, 1000).time().'.'.$ext;
          $storagePath = "assets/images/Results/".$uniqueName;


          if ($ext === 'pdf') {

             if ($project_codes_name == '') {
               $msg4 = "<div class='alert alert-danger'>Please Select the PDF file of the Project in the result.</div>";
             }elseif(Upload($conn, $project_name, $project_status, $project_link)) {
                $msg5 = "<div>Result has already been uploaded for <span style='color: rgba(182, 17, 28, 1); font-weight: bold; font-size: 20px'>
                $project_name for $project_link $project_status</span>
               <meta http-equiv='refresh' content='3; Admin-dashboard.php'>
                </div>";
             }else {
                $upload_file = move_uploaded_file($project_codes_tmp, $storagePath);
                if ($upload_file) {
                  $sql = "INSERT INTO terminal_report(numbers, report_card, project_name, project_status, project_link)
                           VALUES ('$Number', '$uniqueName', '$project_name', '$project_status', '$project_link')";
                  $query = mysqli_query($conn, $sql);
                  if ($query) {
                     $msg6 = "<div class='alert alert-success'>Result Uploaded Successfully
                        <meta http-equiv='refresh' content='3; Admin-dashboard.php'>
                     </div>";
                  }else {
                     $msg6 = "<div class='alert alert-danger'>An Error Occured while uploading Result</div>";
               
                  }
                }else {
                  $msg6 = "<div class='alert alert-danger'>An Error Occured while uploading your file.</div>";
                   
                }
             }
             
          }else {
             $msg6 = "<div class='alert alert-danger'>Only PDF files are allowed</div>";
          }



       }
   //    $project_codes_name = $_FILES['project_codes']['name'];
      //    $project_codes_tmp = $_FILES['project_codes']['tmp_name'];
      //    $project_codes_size = $_FILES['project_codes']['size'];
      //    echo 'File name is:'.$project_codes_size;
      //    $filenameArray = explode( ".", $project_codes_name );
      //    $extension = end( $filenameArray);
      //    echo $extension;
         
      // }

}




?>





<!DOCTYPE html>
<html lang="en">
   <head>
      <title>upload </title>
      <!-- Meta tags -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="keywords" content="iuiok" />
        <script src="assets/js/jquery.js"></script>
      <!-- Meta tags -->
      <!--stylesheets-->
      <link href="assets/css/style.css" rel='stylesheet' type='text/css' media="all">
      <link href="assets/css/bootstrap.min.css" rel='stylesheet' >
      <!--//style sheet end here-->
      <link href="//fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,700" rel="stylesheet">
   </head>
<!-- <script>
   $(document).ready(function(){
      $('#numbers').on('change', function(){
         let numbers = $(this).val();
         if(numbers){
            $.ajax({
               type: 'POST',
               url: 'data.php',
               data: 'classesID=' +numbers,
               success: function(html){
                  $('#projectname').html(html);
               }
            })
         }else{
            $('#projectname').html('<option value="">Select Class First.</option>');
         }
      })


   })

</script> -->

   <body>
      <div class="mid-class">
         <div class="art-right-w3ls">
            <h1>Welcome <?php echo $username;  ?></h1>
            <h2>Please Use the form below to upload a project </h2>
            <form action="" method="post" enctype="multipart/form-data">
               <div class="main">
                  <div class="form-left-to-w3l">
                  </div>
                  <div class="form-left-to-w3l ">
                     <select type="year" name="projectname" placeholder="Project Name" id="projectname">
                  </div>
                  <div class="form-left-to-w3l">
                    <select type="year" name="projectstatus" id="projectstatus">
                      <option value="">
                            Enter Year
                        </option>
                        <option value="Done">
                            Done
                        </option>
                        <option value="Ongoing">
                            Ongoing
                        </option>
                        <option value="Opensource">
                           Opensource
                        </option>
                        <option value="Production">
                            Production
                        </option>
                        <option value="Development">
                            Development
                        </option>
                    </select>
                    

                 </div>
                 <div class="form-left-to-w3l">
                     <input type="file" name="projectlink" id="examterm" placeholder="Project Link>
                    <?php echo $msg3; ?>

                 </div>
                 <div class="form-left-to-w3l">
                     <span>Select PDF file</span>
                    <input type="file" name="project_codes" >
                    <?php echo $msg4; ?>

                 </div>
               </div>
               
               <div class="clear"></div>
               <div class="btnn">
                 <input class="button" name="submit" type="submit" value="Upload Result" > 
                    <?php echo $msg5; ?>

               </div>
            </form>
            
            <!-- popup-->
           
            <!-- //popup -->
         </div>

      <script>
         if( window.history.replaceState ){
        window.history.replaceState( null, null, window.location.href );
    }
   </script>
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