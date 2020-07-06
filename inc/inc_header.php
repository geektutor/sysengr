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
              <a class="menu2" href="javascript:;" onclick="toggleDropdown()"><img src="../img/icon-close2.svg" alt="Icon"></a>
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
            <li class="nav-list-item"><a href="dashboard.php">Dashboard</a></li>
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
            <li class="nav-list-item"><a href="../logout.php">Logout</a></li>
            <div class="line"></div>

            <li class="top student"><a href="#">Students</a></li>
            <li class="top"><a href="#">Staff</a></li>
            <li class="top"><a href="#">Alumni</a></li>
          </ul>
        </div>
      </nav>