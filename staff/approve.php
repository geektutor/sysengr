<?php
  include ('../config/conn.php');
  include ('../config/session.php');

  if(isset( $_SESSION['login_user'])){
    $user_number = $_SESSION['user_number'];

     //for supervisor
    $sql = "SELECT * FROM clearance WHERE superviser_no = {$user_number} AND status = 1";
    $result = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($result);
    if($count > 0){
        while($row = mysqli_fetch_assoc($result)) {
            $std_supervisor[] = $row;      
        }
    }
    mysqli_free_result($result);

    //for course adviser
    $sql = "SELECT * FROM clearance WHERE adviser_no = {$user_number} AND status = 2";
    $result = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($result);
    if($count > 0){
        while($row = mysqli_fetch_assoc($result)) {
            $std_advisor[] = $row;      
        }
    }
    mysqli_free_result($result);

    //for HOD 
    $sql = "SELECT * FROM clearance WHERE status = 3";
    $result = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($result);
    if($count > 0){
        while($row = mysqli_fetch_assoc($result)) {
            $std_hod[] = $row;      
        }
    }
    mysqli_free_result($result);

    $sql2 = "SELECT * FROM user WHERE user_number = {$user_number}";
    $result2 = mysqli_query($conn, $sql2);
    $current_user = mysqli_fetch_assoc($result2);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Approved</title>

    <link rel="stylesheet" href="../css/staffdashstyle.css">
    <link rel="stylesheet" href="../css/appstaff.css">
    <link rel="icon" href="../img/logo.png" sizes="16*16">

    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif&family=Source+Sans+Pro&display=swap" rel="stylesheet">
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
                        <a href="complain.html" class="project"><div class="image">
                            <img class="choose" src="../img/iconfinder_ic_message_48px_3669330 1.png"/>
                        </div>
                        <p class="txt">Complaint</p></a>
                    </div>


                    <button class="shepe"><h4>Logout</h4></button>





                </div>


        </div>






        <div class="part2">
            <div class="dropdownLink" id="dropdownLink"><a onclick="toggleDropdow2()" href="javascript:;"><img src="../img/icon-close2.svg" alt="Img"> </a></div>
            <div class="dropdownLink2" id="dropdownLink2"><a onclick="toggleDropdow()" href="javascript:;"><img src="../img/chevron right.png" alt="Img"> </a></div>


            <div class="overall">

                <div class="continop">
                    <div class="group3" ><h2 class="smll"> <a class="appr" href="index.php">Pending request</a> <img src="../img/arrow forward icon.svg" alt=""></h2></div>
                    <div class="group3"><h2 class="smll"> Approve request </h2></div>

                </div>
                <div class="container2">
                    <div class="re"></div>
                    <div class="fe extra"><p class="nm smp" >Name</p></div>
                    <div class="ge extra"><p class="smp">Date</p> </div>
                    <div class="ae extra" id="group"><p class="smp">Course adviser</p><img class="lock" src="../img/lock.png" alt=""> </div>
                    <div class="pe extra"><p class="smp">Project supervisor</p> </div>
                    <div class="se extra" id="group2"><p class="smp">HOD</p> <img class="lock"  src="../img/lock.png" alt="">  </div>
                </div>

                <div class="white-container">
                  
                    <?php if(isset($std_supervisor)) :  $j= 1; ?>
                      <?php foreach($std_supervisor as $student) : ; ?>
                      <div class="flp">
                          <div class="re"><p class="smp">x</p></div>
                          <div class="fe">
                              <p class="nm lo smp" >
                                <?php
                                  $std = $student['matric'];
                                  $sqls = "SELECT * FROM user WHERE user_number = '$std'";
                                  $results = mysqli_query($conn, $sqls);
                                  $sup = mysqli_fetch_assoc($results);
                                  echo $sup['name'];
                                ?>
                              </p>
                              <p class="nm lo smp"><?=$student['matric'];?></p>
                          </div>

                          <div class="ge"><p class="smp"><?=$student['date_added'];?></p></div>
                          <div class="ae">
                            <?php
                              $std = $student['adviser_no'];
                              $sqls = "SELECT * FROM user WHERE user_number = '$std'";
                              $results = mysqli_query($conn, $sqls);
                              $sup = mysqli_fetch_assoc($results);
                              echo $sup['name'];
                            ?>
                          </div>

                          <div class="ae" > <div class="blue-box"></div> </div>
                          <div class="se">
                            <?php
                              $sqls = "SELECT * FROM user WHERE type = 3";
                              $results = mysqli_query($conn, $sqls);
                              $sup = mysqli_fetch_assoc($results);
                              echo $sup['name'];
                            ?>
                          </div>
                      </div>
                      <?php endforeach; ?>
                    <?php endif; ?>
                    
                    <?php 
                    if (isset($_SESSION['hod'])) {
                      if(isset($std_hod)) :  $j= 1; 
                        foreach($std_hod as $student) :  
                      ?>
                      <div class="flp">
                          <div class="re"><p class="smp">x</p></div>
                          <div class="fe">
                              <p class="nm lo smp" >
                                 <?php
                                  $std = $student['matric'];
                                  $sqls = "SELECT * FROM user WHERE user_number = '$std'";
                                  $results = mysqli_query($conn, $sqls);
                                  $sup = mysqli_fetch_assoc($results);
                                  echo $sup['name'];
                                ?> 
                              </p>
                              <p class="nm lo smp"><?=$student['matric'];?></p>
                          </div>

                          <div class="ge"><p class="smp"><?=$student['date_added'];?></p></div>
                          <div class="ae">
                            <?php
                                $std = $student['adviser_no'];
                                $sqls = "SELECT * FROM user WHERE user_number = '$std'";
                                $results = mysqli_query($conn, $sqls);
                                $sup = mysqli_fetch_assoc($results);
                                echo $sup['name'];
                              ?> 
                          </div>

                          <div class="ae">
                            <?php
                                $std = $student['superviser_no'];
                                $sqls = "SELECT * FROM user WHERE user_number = '$std'";
                                $results = mysqli_query($conn, $sqls);
                                $sup = mysqli_fetch_assoc($results);
                                echo $sup['name'];
                              ?> 
                          </div>
                          <div class="se" > <div class="blue-box"></div> </div>
                      </div>
                      <?php endforeach; 
                            endif; 
                      }else{
                        if(isset($std_advisor)):
                          foreach($std_advisor as $student) :  
                      ?>
                        <div class="flp">
                          <div class="re"><p class="smp">x</p></div>
                          <div class="fe">
                              <p class="nm lo smp" >
                                 <?php
                                  $std = $student['matric'];
                                  $sqls = "SELECT * FROM user WHERE user_number = '$std'";
                                  $results = mysqli_query($conn, $sqls);
                                  $sup = mysqli_fetch_assoc($results);
                                  echo $sup['name'];
                                ?> 
                              </p>
                              <p class="nm lo smp"><?=$student['matric'];?></p>
                          </div>

                          <div class="ge"><p class="smp">09-04-2020</p></div>
                          <div class="ae" > <div class="blue-box"></div> </div>

                          <div class="ae">
                            <?php
                              $std = $student['superviser_no'];
                              $sqls = "SELECT * FROM user WHERE user_number = '$std'";
                              $results = mysqli_query($conn, $sqls);
                              $sup = mysqli_fetch_assoc($results);
                              echo $sup['name'];
                            ?>
                          </div>
                          <div class="se">
                            <?php
                              $sqls = "SELECT * FROM user WHERE type = 3";
                              $results = mysqli_query($conn, $sqls);
                              $sup = mysqli_fetch_assoc($results);
                              echo $sup['name'];
                            ?>
                          </div>
                        </div>
                    <?php
                      endforeach;
                      endif; 
                      } 
                    ?>
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
<?php } ?>