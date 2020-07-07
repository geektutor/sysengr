<?php
  include ('../config/conn.php');
  include ('../config/session.php');

  $user_number = $_SESSION['user_number'];
  if(isset( $_SESSION['login_user'])){
    $user_number = $_SESSION['user_number'];

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="shortcut icon" href="../img/favicon.jpeg" type="image/x-icon">
    <link rel="stylesheet" href="../css/appstudent.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" integrity="sha256-h20CPZ0QyXlBuAw7A+KluUYx/3pK+c7lYEpqLTlxjYQ=" crossorigin="anonymous" />
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif&family=Source+Sans+Pro&display=swap" rel="stylesheet">

    <title>Systems Engineering Website</title>
  </head>
  <body>
    <?php include ('../inc/inc_header.php'); ?>
    

    <section>
      <div class="container">
        <div class="form-flex">
          <div class="nothing"></div>

          <div class="from-container">
            <form class="this-form" action="../server/contact.php" method="POST">
              <div class="logo-form-container">
                <img class="logo-form" src="../img/sys.png" alt="Logo">
                <img class="logo-form" src="../img/lag.png" alt="Logo">
              </div>
              <h1 class="comp">Complaint Form</h1>
              <?php if (isset($msg)) : ; ?>
                <p class="<?= $msgClass; ?>"><?= $msg; ?></p>
              <?php endif; ?>
              <input id="email" class="email-input" type="email" placeholder="Enter your email..." required name="email">
              <p class="or">OR</p>
              <div class="check-container">
                <input id="checkbox" type="checkbox"> <p class="anonymous">Send as anonymous</p>
              </div>
              <input type="hidden" name="who" value="student">
              <a class="dasho" href="dashboard.html">To dashboard</a>
              <textarea rows="8" cols="80" placeholder="Enter complaint..." required name="complaint"></textarea>
              <div class="submit-container">
                <p class="paragraph">Send to: </p>
                <?php include '../config/constants.php'; ?>
                <select class="form-select" class="sender" name="reciever">
                  <?php foreach($lecturers as $name => $mail) : ; ?>
                    <option value="<?= $mail; ?>"><?= $name; ?></option>
                  <?php endforeach; ?>
                  <option value="themanmail@gmail.com">Course Adviser</option>
                  <option value="mymail@gmail.com">Supervisor</option>
                  <input class="btn" type="submit" value="SUBMIT" name="submit">
                  
                </select>
              </div>

            </form>
          </div>
        </div>

      </div>

    </section>

    <footer>
      <div class="container">
        <div class="go">
          <div class="goop">
            <img class="footer-logos" src="../img/sys.png" alt="Logo">
            <img class="footer-logos" src="../img/lag.png" alt="Logo">
            <div class="header-text footer">
              <p class="footer-dept">DEPARTMENT OF <br>SYSTEMS ENGINEERING</p>
              <h1 class="footer-uni">UNIVERSITY OF LAGOS</h1>
            </div>
          </div>

          <div class="others">
            <ul>
              <li><a href="#">Home</a></li>
              <li><a href="#">History</a></li>
              <li><a href="#">VOSO CFP</a></li>
              <li><a href="#">Downloads</a></li>
              <li><a href="#">News</a></li>
              <li><a href="#">Jobs</a></li>
            </ul>
          </div>

          <div class="others">
            <ul>
              <li><a href="#">Gallery</a></li>
                <li><a href="#">Staff</a></li>
                  <li><a href="#">Seminars</a></li>
                  <li><a href="#">Projects</a></li>
                  <li><a href="#">Alumni page</a></li>
                  <li><a href="#">Archives</a></li>
                </ul>
            </div>

            <div class="others">
              <button class="pro">Programs <img src="../img/chevron.svg" alt=""></button>
              <div class="saved">
                <a class="over" href="#">Objectives</a>
                <a class="over" href="#">Undergraduate</a>
                <a class="over" href="#">Postgraduate</a>
                <a class="over" href="#">Admission</a>
              </div>
            </div>

            <div class="others">
              <button class="pro">About ASES <img src="../img/chevron.svg" alt=""></button>
              <div class="saved">
                <a class="over" href="#">The Executives</a>
                <a class="over" href="#">ASES Programmes</a>
              </div>
            </div>

            <div class="logo-container yeba">
              <img class="logos" src="../img/sys.png" alt="Logo">
              <img class="logos" src="../img/lag.png" alt="Logo">
              <div class="header-text">
                <p class="dept">DEPARTMENT OF SYSTEMS ENGINEERING</p>
                <h1 class="uni">UNIVERSITY OF LAGOS</h1>
              </div>
            </div>
        </div>
      </div>

    </footer>


    <script src="code.js" charset="utf-8"></script>
  </body>
</html>
<?php
  }else{
      header("location:../login.php"); 
  } 
?>