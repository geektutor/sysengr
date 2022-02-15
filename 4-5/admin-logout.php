<?php 

session_start();

if(isset($_GET['logout'])) {
    ?>
        <div class="jumbotron">
            <p style="color: lightseagreen;">Logout Successful..</p>
            <p>You will be redirected to the Login Page in 3s.</p>
            <meta http-equiv='refresh' content='3; Admin-Login.php'>
        </div>

    <?php
    session_destroy();
    
}else {
    header('location: Admin-Login.php'); 
}