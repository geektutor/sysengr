<?php
    include ('../config/conn.php');

    if (isset($_POST['login'])) {
        
        $msg = '';
        $msgClass = '';

        if (!empty($_POST['number']) && !empty($_POST['password'])) {

            $number = $_POST['number'];
            $password = mysqli_real_escape_string($conn, $_POST['password']);

            $sql = "SELECT * FROM user WHERE user_number = '$number'";
            $result = mysqli_query($conn, $sql) or die('Unable to fetch data from database');
            $user = mysqli_fetch_assoc($result);
            // mysqli_free_result($result);
            // mysqli_close($conn);

            if ($user == '') {
                $msg = 'Student/Staff Not Found';
                $msgClass = 'alert alert-danger';
            
            } else {
                if ($user['user_number'] == $number &&  password_verify($password, $user['password'])) {
                
                    session_start();
                    $_SESSION['user_number'] = $user['user_number'];
                    $_SESSION['login_user'] = $user['user_number'];
                    $_SESSION['current_user'] = $user['name'];
                    if ($user['type'] == 0) {
                        header('Location: ../student/index.php');
                    }else if($user['type'] !== 0){
                        if ($user['type'] == 3) {
                            $_SESSION['hod'] = true;
                        }
                        header('Location: ../staff/index.php');
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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="icon" href="../img/logo.png" sizes="16*16">
    <link rel="stylesheet" href="../css/stylestudent.css">
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro&display=swap" rel="stylesheet">
    <style>
        .alert {
            padding: 10px; border: 1px solid grey; border-radius: 10px;
        }
        .alert-success {background-color: rgba(0, 255, 0, 0.2);}
        .alert-danger {background-color: rgba(255, 0, 0, 0.2);}
    </style>
</head>
<body>                                                                                                                                            
    <div class="box">
        
        <p class="signin">Access Login</p>
        <div class="signin-row">
            <img class="logo" alt="" src="../img/lag.png"/>
            <img class="logo" alt="" src="../img/logo.png"/>
        </div>
        <p class="signin-tex">UNIVERSITY OF LAGOS</p>
        <p class="signin-text">DEPARTMENT OF SYSTEM ENGINEERING</p>
        <?php if(isset($msg)) : ; ?>
            <p style="margin: 0px 5px;" class="<?php echo $msgClass; ?>"><?php echo $msg; ?></p>
        <?php endif; ?>
        
        <form style="margin-left: 40px;" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <input name="number" type="text" placeholder="Enter matric number or staff number" required="" autofocus="">
            <br/>
            <input name="password" type="password" placeholder="Enter Your Password" required="">
            
            <button type="submit" name="login">Log In</button>
            <p class="foot-txt">Forgot your password?</p>
        </form>
      </div>
        </body>
    </html>
