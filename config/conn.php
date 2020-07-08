<?php
$hostname = 'localhost';
$username = 'systemse';
$password = '1234systems';
$db_name = 'systemse_test';

$conn = mysqli_connect($hostname,$username,$password,$db_name);
if (!$conn) {
	die ('Failed to connect to MySQL: ' . mysqli_connect_error());	
}

?>
