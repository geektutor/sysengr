<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" type="image/png" sizes="32x32" href="./img/favicon-32x32.png">
    <link rel="stylesheet" href="css/app.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" integrity="sha256-h20CPZ0QyXlBuAw7A+KluUYx/3pK+c7lYEpqLTlxjYQ=" crossorigin="anonymous" />
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif&family=Source+Sans+Pro&display=swap" rel="stylesheet">

    <title>Systems Engineering Website</title>
  </head>
  <body>
    <header>
        <div class="container">
          <div class="header-flex">
            <div class="logo-container">
              <img class="logos" src="img/sys.png" alt="Logo">
              <img class="logos" src="img/uni.png" alt="Logo">
              <div class="header-text">
                <p class="dept">DEPARTMENT OF SYSTEMS ENGINEERING</p>
                <h1 class="uni">UNIVERSITY OF LAGOS</h1>
              </div>
            </div>

            <div class="login-links">
              <ul class="login-list">
                <li class="login-list-item"><a href="staff/">Staff</a></li>
                <li class="login-list-item"><a href="student/">Students</a></li>
                <li class="login-list-item"><a href="#">Alumni</a></li>
              </ul>
            </div>

            <div class="menu-container" id="dropdown">
              <p class="menu-text">MENU</p>
              <a class="menu" href="javascript:;" onclick="toggleDropdown()"><img src="img/icon-hamburger.svg" alt="Icon"></a>
              <a class="menu2" href="javascript:;" onclick="toggleDropdown()"><img src="img/icon-close2.svg" alt="Icon"></a>
            </div>

            <div class="search" id="input">
              <div class="search-container">
                <input class="search-input" type="text" placeholder="Search...">
              </div>
              <a class="search-icon" href="javascript:;" onclick="showsearch()"><img class="find" src="img/Search.svg"/></a>
              <!-- <a class="search-icon" href="#" onclick="showsearch()"><img class="see" src="https://img.icons8.com/material-sharp/24/ffffff/search.png"/></a> -->
            </div>

          </div>
        </div>
      </header>

      <nav class="navbar" id="navbar-toggle">
        <div class="container">
          <ul class="navbar-list" id="nav-list">
            <li class="nav-list-item"><a href="login/">Dashboard</a></li>
            <li class="nav-list-item none"><a href="https://unilagsysegr.com">Home</a></li>
            <li class="nav-list-item"><a href="gallery/">Gallery</a></li>
            <li class="nav-list-item"><a href="#">Projects</a></li>
            <li class="dropDown">
              <button class="drop-btn top">Programs <img class="drop" src="img/chevron.svg"/></button>

              <div class="dropDown-content">
                <a class="filter obj" href="#">Obejctives</a>
                <a class="filter" href="#">Undergraduate</a>
                <a class="filter" href="#">Postgraduate</a>
                <a class="filter" href="#">Admission</a>
              </div>
            </li>
            <li class="dropDown2">
              <button class="drop-btn">About <img  class="drop" src="img/chevron.svg"/></button>

              <div class="dropDown-content2">
                <a class="filter obj" href="#">The Executives</a>
                <a class="filter" href="#">ASES Programmes</a>
              </div>
            </li>
            <li class="nav-list-item"><a href="logout.php">Logout</a></li>
            <div class="line"></div>

            <li class="top student"><a href="student/">Students</a></li>
            <li class="top"><a href="staff/">Staff</a></li>
            <li class="top"><a href="#">Alumni</a></li>
          </ul>
        </div>
      </nav>
    <section class="my-carousel">
      <div class="owl-container">
        <h1 class="news">NEWS</h1>
        <p class="all">All News</p>

        <div class="slideshow-container">
          <div class="mySlides fade">
            <img src="img/slider-3.jpg" class="owl-img">
            <div class="text">
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            </div>
          </div>

          <div class="mySlides fade">
            <img src="img/slider-2.jpg" class="owl-img">
            <div class="text">
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            </div>
          </div>

          <div class="mySlides fade">
            <img src="img/slider-1.jpg" class="owl-img">
            <div class="text">
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            </div>
          </div>

          <div class="mySlides fade">
            <img src="img/slider-3.jpg" class="owl-img">
            <div class="text">
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            </div>
          </div>

          <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
          <a class="next" onclick="plusSlides(1)">&#10095;</a>

          <div class="round">
            <span class="dot" onclick="currentSlide(1)"></span>
            <span class="dot" onclick="currentSlide(2)"></span>
            <span class="dot" onclick="currentSlide(3)"></span>
            <span class="dot" onclick="currentSlide(4)"></span>
          </div>
        </div>
      </div>
    </section>

    <section class="words">
      <div class="container">
        <div class="wrap">
          <div class="box">
              <div class="boxx">
                  <h1>Welcome to Systems Engineering</h1>
                  <div class="one"></div>
                  <i class="fa  fa-quote-right"></i>
                  <p>The Systems Engineering Department of the University of Lagos is indeed an extraordinary one in this great institution, known for its academic excellence and beneficial national service.</p>
                  <p>“Unilag Systems Engineering” is well equipped and poised to disseminate knowledge for technological growth and advancement in this millennium. The department is staffed with competent personnel from the junior technical grade to distinguished academics. We are blessed with reknown Professors of international repute, as well as promising, trail blazing young academics. Our laboratories and facilities are also of standard, and we take advantage of UNILAG’s international exchange agreements with other universities for personnel and student development. It is not surprising that we are one of the most sought after departments in the faculty, attracting top students from across the nation even from other engineering disciplines.</p>
                  <p>I sincerely hope you will create the time to visit our beautiful campus and to learn more about us. We’ll be happy to provide additional information and help you discover excellence at ‘SysEngr,’ University of Lagos.</p>
                  <i class="fa  fa-quote-left"></i>
                  <div class="two">
                      <div> <img src="img/img16.png" alt="Ag. Head of department"></div>
                      <div class="three">
                          <h1 class="lecturer">Dr. Fashanu TA</h1>
                          <h1>(Ag. Head of Department)</h1>
                          <div class="one"></div>
                      </div>
                  </div>
              </div>
              <div class="boxx2">
                      <h1>Vision and Mission</h1>
                      <div class="one"></div>
                      <p>Our mission and vision are same with that of the larger UNILAG institution. We produce versatile or multi-skilled engineers who are ever-ready and willing to contribute to societal development by optimally harnessing available resources.</p>
              </div>
              <div class="boxx5">
                <form class="my-form">
                  <h1>Contact Us</h1>
                  <div class="one"></div>
                    <textarea placeholder="Enter complaint" id="test"></textarea><br>
                    <input type="submit" class="btn" value="SUBMIT"></input>
                </form>



              </div>

          </div>
          <div class="wrap2">
              <div class="box2">
                  <div><img src="img/job-opportunities.svg" alt=""> <h1>Job Opportunities</h1></div>
                  <p><a href="#">2016 Air Liquid Nigerian Graduate Internship Program</a></p>
                  <p><a href="#">Enextgen Wireless Job Opportunities</a></p>
              </div>
              <div class="box3">
                  <div><img class="shift" src="img/categories-icon.svg" alt=""> <h1>Categories</h1></div>
                  <p><a href="#">PROFESSOR OLUNLOYO CALL FOR PAPERS</a></p>
                  <p><a href="#">Graduates with 4 years Experience can now register with NSE and COREN</a></p>
                  <p><a href="#">The Role of Engineering Education in Solving Global Society Problems: A World Systems Approach</a></p>
                  <p><a href="#">Update on January in the Department</a></p>
                  <p><a href="#">2016 Student Projects</a></p>
              </div>
              <div class="box4">
                  <div><img class="shift" src="img/Archives.svg" alt=""> <h1>Archives</h1></div>
                  <p><a href="#">PROFESSOR OLUNLOYO CALL FOR PAPERS</a></p>
                  <p><a href="#">Graduates with 4 years Experience can now register with NSE and COREN</a></p>
                  <p><a href="#">The Role of Engineering Education in Solving Global Society Problems: A World Systems Approach</a></p>
                  <p><a href="#">Update on January in the Department</a></p>
                  <p><a href="#">2016 Student Projects</a></p>
                  <p><a href="#">PROFESSOR OLUNLOYO CALL FOR PAPERS</a></p>
                  <p><a href="#">Graduates with 4 years Experience can now register with NSE and COREN</a></p>
                  <p><a href="#">The Role of Engineering Education in Solving Global Society Problems: A World Systems Approach</a></p>
                  <p><a href="#">Update on January in the Department</a></p>
                  <p><a href="#">2016 Student Projects</a></p>

              </div>
          </div>
        </div>

      </div>

    </section>


    <footer>
        <div class="container">
          <div class="go">
            <div class="goop">
              <img class="footer-logos" src="img/sys.png" alt="Logo">
              <img class="footer-logos" src="img/lag.png" alt="Logo">
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
                <button class="pro">Programs <img src="img/chevron.svg" alt=""></button>
                <div class="saved">
                  <a class="over" href="#">Objectives</a>
                  <a class="over" href="#">Undergraduate</a>
                  <a class="over" href="#">Postgraduate</a>
                  <a class="over" href="#">Admission</a>
                </div>
              </div>

              <div class="others">
                <button class="pro">About ASES <img src="img/chevron.svg" alt=""></button>
                <div class="saved">
                  <a class="over" href="#">The Executives</a>
                  <a class="over" href="#">ASES Programmes</a>
                </div>
              </div>

              <div class="logo-container yeba">
                <img class="logos" src="img/sys.png" alt="Logo">
                <img class="logos" src="img/lag.png" alt="Logo">
                <div class="header-text">
                  <p class="dept">DEPARTMENT OF SYSTEMS ENGINEERING</p>
                  <h1 class="uni">UNIVERSITY OF LAGOS</h1>
                </div>
              </div>
          </div>
        </div>
    </footer>
    <script src="config/code.js" charset="utf-8"></script>
  </body>
</html>
