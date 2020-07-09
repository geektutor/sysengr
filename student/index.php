<?php
  include ('../config/conn.php');
  include ('../config/session.php');

  if(isset( $_SESSION['login_user'])){
    $user_number = $_SESSION['user_number'];

  if (isset($_POST['clear'])) {
    if (!empty($_POST['superviser']) && !empty($_POST['adviser']) && !empty($_POST['title']) && !empty($_POST['matric'])) {

      $msg = '';
      $msgClass = '';

      $superviser = $_POST['superviser'];
      $adviser = $_POST['adviser'];
      $title = $_POST['title'];
      $matric = $_POST['matric'];
      // var_dump($title, $matric, $adviser, $superviser); die;

      $query = "INSERT INTO clearance (title, matric, adviser_no, superviser_no) 
                VALUES ('$title', '$matric', '$adviser', '$superviser')";
      $result = mysqli_query($conn, $query) or die('Cannot write to db');

      $msg = 'Clearance Submitted Successfully';
      $msgClass = 'alert alert-success';

    }
  }

  $sql1 = "SELECT * FROM clearance WHERE matric = {$user_number}";
  $result1 = mysqli_query($conn, $sql1);
  $attempts = mysqli_fetch_all($result1, MYSQLI_ASSOC);
  mysqli_free_result($result1);

  $sql2 = "SELECT * FROM user WHERE type != 0";
  $result2 = mysqli_query($conn, $sql2);
  $staffs = mysqli_fetch_all($result2, MYSQLI_ASSOC);
  mysqli_free_result($result2);

  // mysqli_close($conn);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student dashboard</title>
    <link rel="stylesheet" href="../css/dashstudentstyle.css">
    <link rel="stylesheet" href="../css/app2.css">
    <link rel="shortcut icon" href="../img/favicon.jpeg" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif&family=Source+Sans+Pro&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <style>
     .full-width{
        margin: 0 auto; 
        width: 90%;
        display: none;
      }
      .full-width textarea{
        width: 100%;
        text-align: justify;
      }
      form{
        padding-top: 0;
      }
    </style>
</head>
<body>
    <?php include ('../inc/inc_header.php'); ?>

    <div class="flex">
        <div class="my-flex" id="navt">
            <div class="details">
              <div class="image">
                <img class="myface" src="https://img.icons8.com/plasticine/100/000000/broken-robot.png"/>
              </div>

              <div class="nickname">
                <p class="boss"><?= $_SESSION['current_user']; ?></p>
              </div>
            </div>
            <div class="padder">

                <a href="" class="project"> <div class="project">
                        <div class="image">
                            <img class="choose" src="../img/iconfinder_ic_dashboard_48px_3669363 1.png"/>
                        </div>
                        <p class="txt">Project</p></a>
                </div>


                <div class="project">
                    <a href="" class="project"><div class="image">
                        <img class="choose" src="../img/iconfinder_document_text_accept_103510 1.png"/>
                    </div>
                    <p class="txt">Clearance</p> </a>
                </div>

                <div class="project">

                    <a href="" class="project"><div class="image">
                        <img class="choose" src="../img/Group 61.png"/>
                    </div>
                    <p class="txt">Project Supervisor</p></a>
                </div>

                <div class="project">
                    <a href="complain.php" class="project"><div class="image">
                        <img class="choose" src="../img/iconfinder_ic_message_48px_3669330 1.png">
                    </div>
                    <p class="txt">Complaint</p></a>
                </div>


                <a href="../logout.php"><button class="shepe"><h4>Logout</h4></button></a>





            </div>


    </div>


        <div class="part2">
            <div class="dropdownLink" id="dropdownLink"><a onclick="toggleDropdow2()" href="javascript:;"><img src="../img/icon-close.svg" alt="Img"> </a></div>
            <div class="dropdownLink2" id="dropdownLink2"><a onclick="toggleDropdow()" href="javascript:;"><img src="../img/chevron right.png" alt="Img"> </a></div>

            <h3>Request Clearance</h3>
            <?php if (isset($msg)): ?>
              <p class="<?= $msgClass; ?>"><?= $msg; ?></p>
            <?php endif; ?>
            <div class="white col-7">
                <form method="POST" class="row col-12">

                    <div class="col-lg-6 mb-3">
                      <label for="selc" style="font-size: medium; font-weight: bold;">Project Supervisor</label>
                      <select name="superviser">
                          <option value="">Select your supervisor</option>
                          <?php foreach ($staffs as $staff): ?>
                          <option value="<?=$staff['user_number'];?>"><?=$staff['name'];?></option>
                          <?php endforeach; ?>
                      </select>
                    </div>

                    <div class="col-lg-6 mb-3">
                      <label for="selc" style="font-size: medium; font-weight: bold;" >Course Adviser </label>
                      <select name="adviser">
                          <option value="">Select your adviser</option>
                          <?php foreach ($staffs as $staff): ?>
                          <option value="<?=$staff['user_number'];?>"><?=$staff['name'];?></option>
                          <?php endforeach; ?>
                      </select>
                    </div>

                    <div class="col-lg-6 mb-3">
                      <label for="selc" style="font-size: medium; font-weight: bold;" >Project Title </label>
                      <input type="text" class="form-control" required="" name="title">
                    </div>
                    <div class="col-lg-6 mb-3">
                      <label for="selc" style="font-size: medium; font-weight: bold;">Matric Number </label>
                      <input type="number" class="form-control" required="" name="matric" value="<?= $user_number; ?>" readonly>
                    </div>

                    <input type="submit" value="Request Clearance" name="clear">

                </form>

            </div>

            <h3 class="dop">Clearance Status</h3>
            <div class="white sec">
              <div class="seco">
                <h1 class="nan h l">Status</h1>
                <h1 class="nan h r">Date</h1>

              </div>

              <hr>
              <?php foreach($attempts as $item) : ; ?>
                <div class="seco">
                  <h1 class="nan">
                    <?php
                      if ($item['status'] == 0) {
                        echo "Not reviewed";
                      } elseif ($item['status'] == 1) {
                        echo "Reviewed by Supervisor";
                      } elseif ($item['status'] == 2) {
                        echo "Reviewed by Course Adviser";
                      } elseif ($item['status'] == 3) {
                        echo "Cleared";
                      }else{
                        echo "Rejected <button onclick='show(event, reason".$item['id']." )'>see why</button>";
                      }
                    ?>
                  </h1>
                  <h1 class="nan"><?= $item['date_added']; ?></h1>
                </div>
                <div id="reason<?=$item['id'];?>" class="full-width">
                  <textarea class="" readonly=""><?=$item['comment']; ?></textarea>
                </div>
              <?php endforeach; ?>

              <input type="submit" class="subba" value="Print Clearance">
            </div>



        </div>
    </div>
    
    <?php include ('../config/inc_footer.php'); ?>
    <script type="text/javascript">

        function show(event, id) {
          event.preventDefault();
          
          if (id.style.display == "block") {
            id.style.display = "none"
          } else {
            id.style.display="block"
          }
        }

        function toggleDropdow() {
                let navbarToggle = document.getElementById("navt");
                if (navbarToggle.className === 'my-flex') {
                    navbarToggle.className = 'respod';
                    document.getElementById("dropdownLink").style.display="block";

                } else if (navbarToggle.className === 'respod') {
                  navbarToggle.className += ' oya';

                } else if (navbarToggle.className === 'respod oya') {
                  navbarToggle.className = 'respod';
                  document.getElementById("dropdownLink").style.display="block";
                }

            }
        function toggleDropdow2() {
                let navbarToggle = document.getElementById("navt");
                if (navbarToggle.className === 'my-flex') {
                    navbarToggle.className = 'respod';
                    document.getElementById("dropdownLink").style.display="block";

                } else if (navbarToggle.className === 'respod') {
                  navbarToggle.className += ' oya';
                  document.getElementById("dropdownLink").style.display="none";
                } else if (navbarToggle.className === 'respod oya') {
                  navbarToggle.className = 'respod';
                  document.getElementById("dropdownLink").style.display="none";

                }

                else {
                    navbarToggle.className = 'my-flex';
                    document.getElementById("dropdownLink").style.display="none";
                }

            }


    </script>
    <script src="code.js"></script>
</body>
</html>
<?php
  }else{
      header("location:../login.php"); 
  } 
?>