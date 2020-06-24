<?php
	//Setting the type of response users recieves
	$msg = '';
	$msgClass = '';

	//Connecting to the db
	$conn = mysqli_connect('localhost', 'root', '', 'sysengr') or die('Uanble to connect to db');
	
	//Check that we actually have a submit button
	if (isset($_POST['approve'])) {

		//Set the user input to variables
		$matric = $_POST['matric'];
		$id = $_POST['id'];

		$query = "SELECT * FROM clearance WHERE ID = {$id} AND matric = {$matric}";
		$answer = mysqli_query($conn, $query);
  		$status = mysqli_fetch_all($answer, MYSQLI_ASSOC);
  		mysqli_free_result($answer);

  		$new_status = $answer['status'] + 1;

		$query2 = "UPDATE clearance SET status = {$new_status} WHERE ID = {$id} AND matric = {$matric}";

		$result = mysqli_query($conn, $query2) or die('Cannot write to db');

		header('Location: ../staff/dashboard.php');

	};

	mysqli_close($conn);	

?>