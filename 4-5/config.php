<?php 
$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "sysengr";

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
if(!$conn){
    die('Error connecting to database').mysqli_error($conn);
}else{
    echo "";
}