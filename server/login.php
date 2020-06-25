<?php

    if (isset($_POST['login'])) {
        
        $msg = '';
        $msgClass = '';

        if (!empty($_POST['number']) && !empty($_POST['password'])) {

            $number = $_POST['number'];
            $password = $_POST['password'];
            $type = $_POST['type'];

            $conn = mysqli_connect('localhost', 'root', '', 'sysengr') or die('Unable to connect');

            $sql = "SELECT user_number, password FROM user WHERE user_number = '$number'";

            $result = mysqli_query($conn, $sql) or die('Unable to fetch data from database');

            $user = mysqli_fetch_assoc($result);

            mysqli_free_result($result);

            mysqli_close($conn);

            if ($user == '') {

                if ($type == 0) {
                    $msg = 'Student Not Found';
                    $msgClass = 'alert alert-danger';
                } elseif ($type == 1) {
                    $msg = 'Staff Not Found';
                    $msgClass = 'alert alert-danger';
                } elseif ($type == 2) {
                    $msg = 'HOD Not Found';
                    $msgClass = 'alert alert-danger';
                }
            
            } else {

                if ($user['user_number'] == $number && $user['password'] == $password ) {
                
                    session_start();

                    $_SESSION['user_number'] = $user['user_number'];

                    // print_r($user);

                    if ($type == 0) {
                        header('Location: ../student/dashboard.php');
                    } elseif ($type == 1) {
                        header('Location: ../staff/dashboard.php');
                    } elseif ($type == 2) {
                        header('Location: ../staff/dashboard.php')
                    }
                    

                } else {

                    $msg = 'Incorrect Password';
                    $msgClass = 'alert alert-danger';

                };

            };

        } else {

            $msg = 'Please fill all fields';
            $msgClass = 'alert alert-danger';
        
        };

    };

?>