<?php
  include ('../config/conn.php');
  include ('../config/session.php');

  $user_number = $_SESSION['user_number'];
  if(isset( $_SESSION['login_user'])){
    $user_number = $_SESSION['user_number'];

    //for supervisor
    $sql = "SELECT * FROM clearance WHERE superviser_no = {$user_number} AND status = 0";
    $result = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($result);
    if($count > 0){
        while($row = mysqli_fetch_assoc($result)) {
            $std_supervisor[] = $row;      
        }
    }
    mysqli_free_result($result);

    //for course adviser
    $sql = "SELECT * FROM clearance WHERE adviser_no = {$user_number} AND status = 1";
    $result = mysqli_query($conn, $sql);
    if($count > 0){
        while($row = mysqli_fetch_assoc($result)) {
            $std_advisor[] = $row;      
        }
    }
    mysqli_free_result($result);

    //for HOD 
    // $sql = "SELECT * FROM clearance WHERE status = 2";
    // $result = mysqli_query($conn, $sql);
    // $students = mysqli_fetch_all($result, MYSQLI_ASSOC);
    // mysqli_free_result($result);
    // $students = $students1;
    
    $sql2 = "SELECT * FROM user WHERE user_number = {$user_number}";
    $result2 = mysqli_query($conn, $sql2);
    $current_user = mysqli_fetch_assoc($result2);

    // mysqli_close($conn);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="img/logo.png" sizes="16*16">
    <title>Staff - Dashboard</title>
    <link rel="stylesheet" href="../css/staffdashstyle.css">
    <link rel="stylesheet" href="../css/appstaff.css">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif&family=Source+Sans+Pro&display=swap" rel="stylesheet">
    <style type="text/css">
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
<?php include ('../config/inc_header.php'); ?>


    <div class="flex">
        <div class="my-flex" id="navt">
            <div class="details">
              <div class="image">
                <img class="myface" src="https://img.icons8.com/plasticine/100/000000/broken-robot.png"/>
              </div>

              <div class="nickname">
                <p class="boss"><?= $current_user['name']; ?></p>
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

                <a href="../logout.php">
                    <button class="shepe"><h4>Logout</h4></button>
                </a>
            </div>
            </div>


        <div class="part2">
            <div class="dropdownLink" id="dropdownLink"><a onclick="toggleDropdow2()" href="javascript:;"><img src="../img/icon-close2.svg" alt="Img"> </a></div>
            <div class="dropdownLink2" id="dropdownLink2"><a onclick="toggleDropdow()" href="javascript:;"><img src="../img/chevron right.png" alt="Img"> </a></div>

            
             <div class="overall">
                <?php if (isset($msg)): ?>
                  <p class="<?= $msgClass; ?>"><?= $msg; ?></p>
                <?php endif; ?>
                 <div class="continop">
                    <div class="group3" ><h2> <a class="appr" href="approve.html">Approved request</a> <img src="../img/arrow forward icon.svg" alt=""></h2></div>
                    <div class="group3"><h2> Pending request </h2></div>
                </div>
               
                <div class="container2">
                    <div class="re"></div>
                    <div class="fe extra"><p class="nm smp" >Project Title / Name</p></div>
                    <div class="ge extra"><p class="smp">Date</p> </div>
                    <div class="ae extra" id="group"><p class="smp">Course adviser</p><img class="lock" src="../img/lock.png" alt=""> </div>
                    <div class="pe extra"><p class="smp">Action</p> </div>
                </div>

                <div class="white-container">

                    <?php if(isset($std_supervisor)) :  $j= 1; ?>
                      <?php foreach($std_supervisor as $student) : ; ?>
                        <div class="flp">
                            <div class="re"><p class="smp"><?= $j++; ?></p></div>
                            <div class="fe">
                                <p class="nm lo smp"><?= $student['title']; ?></p>
                                <p class="nm lo smp"><?= $student['matric']; ?></p>
                            </div>

                            <div class="ge"><p class="smp"><?= $student['date_added']; ?></p></div>
                            <div class="ae">
                              <?php
                                $supervisor = $student['adviser_no'];
                                $sqls = "SELECT * FROM user WHERE user_number = '$supervisor'";
                                $results = mysqli_query($conn, $sqls);
                                $sup = mysqli_fetch_assoc($results);
                                echo $sup['name'];
                              ?> 
                              
                            </div>

                            <div class="pe">
                              <form action="../server/approve.php" method="POST" style="margin: 0px; padding: 0px;">
                                <input type="hidden" name="id" value="<?= $student['id']; ?>">
                                <input type="hidden" name="matric" value="<?= $student['matric']; ?>">
                                <button type="submit" style="background-color: transparent; border: 0px;" name="approve"><span style="text-decoration: underline;">Approve</span></button>
                              </form>
                            </div>
                        </div>
                      <?php endforeach; ?>
                    <?php endif; ?>
                </div>

            </div>  

            <div class="overall">
                <?php if (isset($error)): ?>
                  <p class="<?= $error[0]; ?>"><?= $error[1]; ?></p>
                <?php endif; ?>
                <div class="continop">
                    <div class="group3"><h2> Pending request (As a course adviser)</h2></div>
                </div>
                <div class="container2">
                    <div class="re"></div>
                    <div class="fe extra"><p class="nm smp" >Project Title / Name</p></div>
                    <div class="ge extra"><p class="smp">Date</p> </div>
                    <div class="ae extra" id="group"><p class="smp">Project supervisor</p><img class="lock" src="../img/lock.png" alt=""> </div>
                    <div class="pe extra"><p class="smp">Action</p></div>
                </div>

                <div class="white-container">

                    <?php if(isset($std_advisor)) :  $j= 1; ?>
                      <?php foreach($std_advisor as $student) : ; ?>
                        <div class="flp">
                            <div class="re"><p class="smp"><?= $j++; ?></p></div>
                            <div class="fe">
                                <p class="nm lo smp"><?= $student['title']; ?></p>
                                <p class="nm lo smp"><?= $student['matric']; ?></p>
                            </div>

                            <div class="ge"><p class="smp"><?= $student['date_added']; ?></p></div>
                            <div class="ae">
                              <?php
                                $supervisor = $student['superviser_no'];
                                $sqls = "SELECT * FROM user WHERE user_number = '$supervisor'";
                                $results = mysqli_query($conn, $sqls);
                                $sup = mysqli_fetch_assoc($results);
                                echo $sup['name'];
                              ?> 
                            </div>

                            <div class="pe">
                              <form action="../server/approve.php" method="POST" style="margin: 0px; padding: 0px;">
                                <input type="hidden" name="id" value="<?= $student['id']; ?>">
                                <input type="hidden" name="matric" value="<?= $student['matric']; ?>">
                                <button type="submit" style="background-color: transparent; border: 0px;" name="approve"><span style="text-decoration: underline;">Approve</span></button>
                              </form>
                                <button type="submit" style="background-color: transparent; border: 0px;" name="reject"><span onclick="reject(event, reject<?=$student['id'];?>)">Reject</span></button>
                            </div>
                        </div>
                        <form method="POST" action="../server/approve.php" id="reject<?=$student['id'];?>" class="full-width reject<?=$student['id'];?>">
                          <input type="hidden" name="id" value="<?= $student['id']; ?>">
                          <input type="hidden" name="matric" value="<?= $student['matric']; ?>">
                          <textarea name="comment" rows="5" placeholder=" Enter a comment"></textarea>
                          <button type="submit" name="reject">Submit</button>
                        </form>  
                        
                      <?php endforeach; ?>
                    <?php endif; ?>
                </div>

            </div>

               


        </div>
    </div>



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




    <script type="text/javascript">
      function reject(event, id) {
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
      header("location:../login/index.php"); 
  } 
?>