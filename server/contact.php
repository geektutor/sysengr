<?php
	//Setting the type of response users recieves
	$msg = '';
	$msgClass = '';

	//Connecting to the db
  	include ('../config/conn.php');
	
	
	//Check that we actually have a submit button
	if (isset($_POST['submit'])) {

		//Check to see if the stuffs are not empty
		if (!empty($_POST['complaint']) && !empty($_POST['reciever'])) {
			
			//Set the user input to variables
			$email = $_POST['email'];
			$complaint = $_POST['complaint'];
			$reciever = $_POST['reciever'];
			$who = $_POST['who'];

			if ($email) {
				$sql = "INSERT INTO complaints (email, complaint, reciever) VALUES ('$email', '$complaint', '$reciever')" or die('Cannot insert');
				$result = mysqli_query($conn, $sql) or die('Cannot write to db');
				mail('sodiq.akinjobi@gmail.com', 'Complaint', $complaint, 'From: '.$email);
			} else {
				$sql = "INSERT INTO complaints (email, complaint, reciever) VALUES ('Anonymous', '$complaint', '$reciever')" or die('Cannot insert');
				$result = mysqli_query($conn, $sql) or die('Cannot write to db');
				mail('sodiq.akinjobi@gmail.com', 'Complaint', $complaint, 'From: Anonymous');
			}

			header('Location: ../'.$who.'/dashboard.php');

		};

	};

	mysqli_close($conn);	

?>