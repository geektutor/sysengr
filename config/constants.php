<?php

	$hod_mail = 'test@test.com';
	$superviser_mail = 'mumu@mumu.com';
	$course_adviser_mail = 'zubairidrisaweda@gmail.com';

	$sql2 = "SELECT * FROM user WHERE type != 0";
  	$result2 = mysqli_query($conn, $sql2);
  	$count = mysqli_num_rows($result2);
  	// $lecturers = mysqli_fetch_array($result2, MYSQLI_ASSOC);

  	if ($count > 0) {
        while($row = mysqli_fetch_assoc($result2)) {
  			$lecturers[] = $row;
  		}
  	}
	// $lecturers = [
	// 	'Mr. Dele' => 'dele1@gmail.com',
	// 	'Prof. Yomi' => 'yomishow@gmail.com',
	// 	'Dr. Geek' => 'daddysodiq@gmail.com'
	// ];

?>