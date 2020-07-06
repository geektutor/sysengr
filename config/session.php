<?php
 session_start(); 
 require('conn.php');
 $user_check = $_SESSION['login_user'];
 $sql = "SELECT * FROM user WHERE user_number = '$user_check'";
 $result = mysqli_query($conn, $sql); 
 $row = mysqli_fetch_array($result, MYSQLI_ASSOC); 
 $login_session = $row['id']; 
 if(!isset($_SESSION['login_user'])){ 
 	header("location:../index.html"); 
 } 

