<?php
	//Setting the type of response users recieves
	$msg = '';
	$msgClass = '';

	//Connecting to the db
	$conn = mysqli_connect('localhost', 'root', '', 'sysengr') or die('Uanble to connect to db');
	
	//Check that we actually have a submit button
	if (isset($_POST['submit'])) {

		//Check to see if the stuffs are not empty
		if (!empty($_POST['email']) && !empty($_POST['complaint']) && !empty($_POST['reciever'])) {
			
			//Set the user input to variables
			$email = $_POST['email'];
			$complaint = $_POST['complaint'];
			$reciever = $_POST['reciever'];
			$who = $_POST['who'];

			if ($reciever == 1) {
				$reciever = 'HOD'; // I need the HODs mail
			} elseif ($reciever == 2) {
				$reciever = 'Course Advisor'; // I need the Course Advisor's mail
			} else {
				$reciever = 'Supervisor'; // And the supervisor mail
			};
			

			$sql = "INSERT INTO complaints (email, complaint, reciever) VALUES ('$email', '$complaint', '$reciever')" or die('Cannot insert');

			$result = mysqli_query($conn, $sql) or die('Cannot write to db');

			mail('zubairidrisaweda@gmail.com', 'Conplaint', $complaint, 'From: '.$email);

			header('Location: ../'.$who.'/complain.html');

		};

	};

	mysqli_close($conn);	

?>