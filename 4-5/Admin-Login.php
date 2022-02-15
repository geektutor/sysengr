<?php 
   session_start();
   require_once ('config.php');
   require_once ('function.php');

   $msg1=''; $msg2=''; $msg3=''; $username=''; $password='';

   if (isset($_POST['login'])) {
         $username = mysqli_real_escape_string($conn, htmlspecialchars($_POST['username'], flags: ENT_QUOTES, encoding: 'utf-8'));
         $password = mysqli_real_escape_string($conn, htmlspecialchars($_POST['password'], flags: ENT_QUOTES, encoding: 'utf-8'));

      if(empty($username)) {
         $msg1 = "<div class='alert alert-danger' style='width: 351px; height: auto; padding-top: 0; margin-top: 2px;'>
         Username is Required</div>";
      }elseif (empty($password)) {
         $msg2 = "<div class='alert alert-danger' style='width: 351px; height: auto; padding-top: 0; margin-top: 2px;'>
         Password can't be empty</div>";
      }elseif(!loginCheck($conn, $username, $password)) {
         $msg3 = "<div class='alert alert-danger' style='width: 351px; height: auto; padding-top: 0; margin-top: 2px;'>
         Please double check your details.</div>";
      }else{
         $sql = "SELECT * FROM admin WHERE username = '$username'";
         $query = mysqli_query($conn, $sql);
         if($query){
            $result = mysqli_fetch_array($query);
            $_SESSION['username'] = $result['username'];
         }

         $msg3 = "<div class='alert alert-success' style='text-align: center;'>
            <p>Login Successful.... <span style='color: #4b7f80';>redirecting....</span></p>
            <meta http-equiv='refresh' content='3; Admin-dashboard.php'>        
         </div>";
      }

   }


?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <title>Admin Login </title>
      <!-- Meta tags -->
      <meta name="viewport" content="width=device-width, initial-scale=1" />
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <meta name="keywords" content="Gaze Sign up & login Form Responsive Widget, Audio and Video players, Login Form Web Template, Flat Pricing Tables, Flat Drop-Downs, Sign-Up Web Templates, Flat Web Templates, Login Sign-up Responsive Web Template, Smartphone Compatible Web Template, Free Web Designs for Nokia, Samsung, LG, Sony Ericsson, Motorola Web Design"
         />
      <script>
         addEventListener("load", function () { setTimeout(hideURLbar, 0); }, false); function hideURLbar() { window.scrollTo(0, 1); }
      </script>
      <!-- Meta tags -->
      <!--stylesheets-->
      <link href="assets/css/style.css" rel='stylesheet' type='text/css' media="all">
      <link href="assets/css/bootstrap.min.css" rel='stylesheet' >

      <!--//style sheet end here-->
      <link href="//fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,700" rel="stylesheet">
   </head>
   <body>
      <div class="mid-class">
         <div class="art-right-w3ls">
<div class="admin-log">
    <h1>Welcome Admin </h1>
    <h2>Please Enter your username and password to login</h2>
    <?php echo $msg3; ?>
    <form action="Admin-Login.php" method="post" > 
       <div class="main">
          <div class="form-left-to-w3l">
             <input type="text" name="username" placeholder="Enter Username" >
             <span></span>
             <?php echo $msg1; ?>
          </div>
          <div class="form-left-to-w3l ">
             <input type="password" name="password" placeholder="Enter Password" >
             <div class="clear"></div>
             <?php echo $msg2; ?>
          </div>
       </div>

       
       <div class="clear"></div>
       <div class="btnn">
         <input class="button" type="submit" name="login" value="Login" > 
       </div>
    </form>
</div>
          
            <!-- popup-->
            <div id="content1" class="popup-effect">
               
                  <!--//login form-->
                  <a class="close" href="#">&times;</a>
               </div>
            </div>
            <!-- //popup -->
         </div>
        
      </div>
      <!-- <footer class="bottem-wthree-footer">
         <p>
            © 2021 Command Day secondary school Akure. All Rights Reserved | Created by
            <a href="http://www.johnoseni.com">John Oseni</a>
         </p>
      </footer> -->
   </body>
</html>