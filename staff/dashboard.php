<?php

  $conn = mysqli_connect('localhost', 'root', '', 'sysengr');
  session_start();

  $user_number = $_SESSION['user_number'];

  if (mysqli_connect_errno()) {
    die(mysqli_connect_errno());
    }

    if (isset($_POST['approve'])) {

      $groupname = $_POST['groupname'];
      $location = $_POST['location'];
      $desc = $_POST['description'];

      $query = "INSERT INTO groups (Group_Name, Location) VALUES ('$groupname', '$location')";

      if (mysqli_query($conn, $query)) {
        
        header('Location: groups.php');

      } else {
        echo "Unable to add data";
      };

    };

    $sql1 = "SELECT * FROM clearance WHERE adviser_no = {$user_number} OR superviser_no = {$user_number}";
    $result1 = mysqli_query($conn, $sql1);
    $students = mysqli_fetch_all($result1, MYSQLI_ASSOC);
    mysqli_free_result($result1);

    $sql2 = "SELECT * FROM user WHERE user_number = {$user_number}";
    $result2 = mysqli_query($conn, $sql2);
    $current_user = mysqli_fetch_assoc($result2);

    mysqli_close($conn);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="img/logo.png" sizes="16*16">
    <title>pending</title>
    <link rel="stylesheet" href="../css/staffdashstyle.css">
    <link rel="stylesheet" href="../css/appstaff.css">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif&family=Source+Sans+Pro&display=swap" rel="stylesheet">


</head>
<body>
    <header>
        <div class="container">
          <div class="header-flex">
            <div class="logo-container">
              <img class="logos" src="../img/sys.png" alt="Logo">
              <img class="logos" src="../img/lag.png" alt="Logo">
              <div class="header-text">
                <p class="dept">DEPARTMENT OF SYSTEMS ENGINEERING</p>
                <h1 class="uni">UNIVERSITY OF LAGOS</h1>
              </div>
            </div>

            <div class="login-links">
              <ul class="login-list">
                <li class="login-list-item"><a href="#">Staff</a></li>
                <li class="login-list-item"><a href="#">Students</a></li>
                <li class="login-list-item"><a href="#">Alumni</a></li>
              </ul>
            </div>

            <div class="menu-container" id="dropdown">
              <p class="menu-text">MENU</p>
              <a class="menu" href="javascript:;" onclick="toggleDropdown()"><img src="../img/icon-hamburger.svg" alt="Icon"></a>
              <a class="menu2" href="javascript:;" onclick="toggleDropdown()"><img src="../img/icon-close2s.svg" alt="Icon"></a>
            </div>

            <div class="search" id="input">
              <div class="search-container">
                <input class="search-input" type="text" placeholder="Search...">
              </div>
              <a class="search-icon" href="javascript:;" onclick="showsearch()"><img class="find" src="../img/Search.svg"/></a>
              <!-- <a class="search-icon" href="#" onclick="showsearch()"><img class="see" src="https://img.icons8.com/material-sharp/24/ffffff/search.png"/></a> -->
            </div>

          </div>
        </div>
      </header>

      <nav class="navbar" id="navbar-toggle">
        <div class="container">
          <ul class="navbar-list" id="nav-list">
            <li class="nav-list-item"><a href="#">Dashboard</a></li>
            <li class="nav-list-item none"><a href="#">Home</a></li>
            <li class="nav-list-item"><a href="#">Gallery</a></li>
            <li class="nav-list-item"><a href="#">Projects</a></li>
            <li class="dropDown">
              <button class="drop-btn top">Programs <img class="drop" src="../img/chevron.svg"/></button>

              <div class="dropDown-content">
                <a class="filter obj" href="#">Obejctives</a>
                <a class="filter" href="#">Undergraduate</a>
                <a class="filter" href="#">Postgraduate</a>
                <a class="filter" href="#">Admission</a>
              </div>
            </li>
            <li class="dropDown2">
              <button class="drop-btn">About <img  class="drop" src="../img/chevron.svg"/></button>

              <div class="dropDown-content2">
                <a class="filter obj" href="#">The Executives</a>
                <a class="filter" href="#">ASES Programmes</a>
              </div>
            </li>

            <div class="line"></div>

            <li class="top student"><a href="#">Students</a></li>
            <li class="top"><a href="#">Staff</a></li>
            <li class="top"><a href="#">Alumni</a></li>
          </ul>
        </div>
      </nav>

    <div class="flex">
        <div class="my-flex" id="navt">
            <div class="details">
              <div class="image">
                <img class="myface" src="https://img.icons8.com/plasticine/100/000000/broken-robot.png"/>
              </div>

              <div class="nickname">
                <p class="boss"><?php echo $current_user['name']; ?></p>
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
                        <img class="choose" src="../img/iconfinder_ic_message_48px_3669330 1.png">
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
                    <div class="group3" ><h2> <a class="appr" href="approve.html">Approved request</a> <img src="../img/arrow forward icon.svg" alt=""></h2></div>
                    <div class="group3"><h2> Pending request </h2></div>

                </div>
                <div class="container2">
                    <div class="re"></div>
                    <div class="fe extra"><p class="nm smp" >Name</p></div>
                    <div class="ge extra"><p class="smp">Date</p> </div>
                    <div class="ae extra" id="group"><p class="smp">Course adviser</p><img class="lock" src="../img/lock.png" alt=""> </div>
                    <div class="pe extra"><p class="smp">Project supervisor</p> </div>
                </div>

                <div class="white-container">

                    <div class="flp">
                        <div class="re"><p class="smp">id</p></div>
                        <div class="fe">
                            <p class="nm lo smp">title</p>
                            <p class="nm lo smp">matric</p>
                        </div>

                        <div class="ge"><p class="smp">date_added</p></div>
                        <div class="ae" > <div class="blue-box"></div> </div>

                        <div class="pe"><a class="smp" href="#">Approve</a></div>
                    </div>
                    <?php foreach($students as $student) : ; ?>
                      <div class="flp">
                          <div class="re"><p class="smp"><?php echo $student['ID']; ?></p></div>
                          <div class="fe">
                              <p class="nm lo smp"><?php echo $student['title']; ?></p>
                              <p class="nm lo smp"><?php echo $student['matric']; ?></p>
                          </div>

                          <div class="ge"><p class="smp"><?php echo $student['date_added']; ?></p></div>
                          <div class="ae" > <div class="blue-box"></div> </div>

                          <div class="pe"><a class="smp" href="#">Approve</a></div>
                      </div>
                    <?php endforeach; ?>
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
