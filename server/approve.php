<?php
  
  include ('../config/conn.php');

  if (isset($_POST['approve'])) {
  	$id = $_POST['id'];
  	$matric = $_POST['matric'];

  	$query = "SELECT * FROM clearance WHERE id = {$id}";

  	$answer = mysqli_query($conn, $query);

  	$status = mysqli_fetch_assoc($answer);

  	mysqli_free_result($answer);

  	$new_status = $status['status'] + 1;


  	$query2 = "UPDATE clearance SET status = {$new_status} WHERE id = {$id} AND matric = {$matric}";

    if($conn->query($query2)){
      header('Location: ../staff/dashboard.php');
    }else{
      $msg = 'Clearance Submitted Successfully';
      $msgClass = 'alert alert-success';
      return $error = [$msg, $msgClass];
    }

  	

  }else if(isset($_POST['reject'])){
    $id = $_POST['id'];
    $matric = $_POST['matric'];
    $comment = $_POST['comment'];

    $query = "SELECT * FROM clearance WHERE id = {$id}";

    $answer = mysqli_query($conn, $query);

    $status = mysqli_fetch_assoc($answer);

    mysqli_free_result($answer);

    $new_status = 4;


    $query2 = "UPDATE clearance SET status = {$new_status}, comment = '$comment' WHERE id = {$id} AND matric = {$matric}";

    if($conn->query($query2)){
      header('Location: ../staff/dashboard.php');
    }else{
      $msg = 'Clearance Submitted Successfully';
      $msgClass = 'alert alert-success';
      return $error = [$msg, $msgClass];
    }

  }

  mysqli_close($conn);

?>