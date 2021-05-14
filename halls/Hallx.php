<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../styles/rezervo.css">
    <link rel="stylesheet" href="./hall.css">
    <meta charset="UTF-8" />
    <meta
      name="description"
      content="Online cinema catalog and ticket ordering website"
    />
    <title>Kino FIEK</title>
    <style>
        * {
          box-sizing: border-box;
          padding: 0px;
          margin: 0px;
        }
        .dark-mode {
          --text-color: rgb(255, 255, 255);
          --body-bg: #121212;
          --footer-bg: #111111;
          --tabs-bg: #111111;
          --tabs-hover: #174539;
          --tabs-text: white;
          --sld-btn: #2f4f4f;
          --sld-tittle: #fff;
          --btn-color: #bbc7cc;
          --btn-color-hover: #408c99;
          --shadow-color: #98a6a8;
          --shadow-color-hover: #4f7479;
          --catbtn-c1: #84a2ad;
          --catbtn-c2: #91a9ad;
          --catbtn-c1-hover: #84a2ad;
          --catbtn-c2-hover: #91a9ad;
        }
        :root {
          --text-color: rgb(0, 0, 0);
          --body-bg: #edfdff;
          --footer-bg: #c9edfc;
          --tabs-bg: #f1f1f1;
          --tabs-text: black;
          --tabs-hover: #ddd;
          --sld-btn: #2f4f4f;
          --sld-tittle: #fff;
          --btn-color: #bbc7cc;
          --btn-color-hover: #7d9296;
          --shadow-color: #add3d8;
          --shadow-color-hover: #687a7c;
          --catbtn-c1: #84a2ad;
          --catbtn-c2: #91a9ad;
          --catbtn-c1-hover: #84a2ad;
          --catbtn-c2-hover: #91a9ad;
        }
        #darkModeBtn {
          z-index: 40;
          position: fixed;
          bottom: 0%;
          right: 1%;
        }
        body {
          font-family: "Montserrat", sans-serif;
          background-color: var(--body-bg);
          transition: background 1s;
        }
      .form-control {
          box-shadow: none;
          font-weight: normal;
          font-size: 13px;
      }
      .form-control:focus {
          box-shadow: 0 0 8px rgba(0,0,0,0.1);
      }
      .navbar {
        background-color: var(--body-bg);
        transition: 1s;
        padding-left: 16px;
        padding-right: 16px;
        font-size: 20px;
        height: 100px;
        padding-top: 20px;
        justify-content: space-around;
        border: none;
      }
      .nav img {
          width: 36px;
          height: 36px;
          margin: -8px 0;
          float: left;
          margin-right: 10px;
      }
      .navbar .navbar-brand, .navbar .navbar-brand:hover, .navbar .navbar-brand:focus {
          padding-left: 0;
          font-size: 20px;
          padding-right: 50px;
      }
      .navbar .navbar-brand b {
          font-weight: bold;
          color: var(--text-color);	
      }
      .navbar .form-inline {
          display: inline-block;
      }
      .navbar .nav li {
          position: relative;
      }
      .navbar .nav li a {
        color: var(--text-color)
      }
      .search-box {
          position: relative;
      }
      .search-box input {
          padding-right: 35px;
          border-radius: 4px !important;
          background-color: var(--body-bg);
          box-shadow: none
      }
      .search-box .input-group-addon {
          min-width: 35px;
          border: none;
          background: transparent;
          position: absolute;
          color: var(--text-color);
          background-position: 96% 6px;
          background-color: var(--search-bg);
          right: 0;
          z-index: 9;
          padding: 7px;
          height: 100%;
      }
      .search-box i {
          color: #a0a5b1;
          font-size: 19px;
      }
      .navbar .nav .btn-primary, .navbar .nav .btn-primary:active {
          color: var(--text-color);
          background: #33cabb; 
          padding-top: 8px;
          padding-bottom: 6px;
          vertical-align: middle;
          border: none;
      }
      .navbar .nav .btn-primary:hover, .navbar .nav .btn-primary:focus {
          color: var(--text-color);
          outline: none;
          background: #31bfb1;
      }
      .navbar .navbar-right li:first-child a {
          padding-right: 30px;
      }
      .navbar ul li i {
          font-size: 18px;
      }
      .navbar .dropdown-menu i {
          font-size: 16px;
          min-width: 22px;
          color: var(--text-color);
      }
      .navbar ul.nav li.active a, .navbar ul.nav li.open > a {
          background-color: var(--body-bg);
          color: var(--text-color);
      } 
      .navbar .nav .get-started-btn {
          min-width: 120px;
          margin-top: 8px;
          margin-bottom: 8px;
      }
      .navbar ul.nav li.open > a.get-started-btn {
          color: var(--text-color);
          background: #31bfb1 !important;
          font-size: 20px;
      }
      .navbar .dropdown-menu {
          border-radius: 1px;
          box-shadow: 0 2px 8px rgba(0,0,0,.05);
      }
      .navbar .nav .dropdown-menu li {
          color: var(--text-color);
          font-weight: normal;
      }
      .navbar .nav .dropdown-menu li a, .navbar .nav .dropdown-menu li a:hover, .navbar .nav .dropdown-menu li a:focus {
          padding: 8px 20px;
          line-height: normal;
          color: var(--text-color);
          background-color: var(--body-bg);
      }
      .dropdown-menu li a{
        color: var(--text-color);
        background-color: var(--body-bg);
      }
      .navbar .navbar-form {
          border: none;
      }
      .navbar .dropdown-menu.form-wrapper {
          width: 280px;
          padding: 20px;
          left: auto;
          right: 0;
          font-size: 14px;
          color: var(--text-color);
      }
      .navbar .dropdown-menu.form-wrapper a {
          color: var(--text-color);
          padding: 0 !important;
      }
      .navbar .dropdown-menu.form-wrapper a:hover{
          text-decoration: underline;
          color: var(--text-color);
      }
      .navbar .form-wrapper .hint-text {
          text-align: center;
          color: black;
          margin-bottom: 15px;
          font-size: 13px;
      }
      .navbar .form-wrapper .social-btn .btn, .navbar .form-wrapper .social-btn .btn:hover {
          color: var(--text-color);
          margin: 0;
          padding: 0 !important;
          font-size: 13px;
          border: none;
          transition: all 0.4s;
          text-align: center;
          line-height: 34px;
          width: 47%;
          text-decoration: none;
      }
      .navbar .social-btn .btn-primary {
          background: var(--body-bg);
      }
      .navbar .social-btn .btn-primary:hover {
          background: #4676bd;
      }
      .navbar .social-btn .btn-info {
          background: var(--body-bg);
      }
      .navbar .social-btn .btn-info:hover {
          background: #4ec7ef;
      }
      .navbar .social-btn .btn i {
          margin-right: 5px;
          font-size: 16px;
          position: relative;
          top: 2px;
      }
      .navbar .form-wrapper .form-footer {
          text-align: center;
          padding-top: 10px;
          font-size: 13px;
      }
      .navbar .form-wrapper .form-footer a:hover{
          text-decoration: underline;
      }
      .navbar .form-wrapper .checkbox-inline input {
          margin-top: 3px;
      }
      .navbar .checkbox-inline {
          font-size: 13px;
      }
      .navbar .navbar-right .dropdown-toggle::after {
          display: none;
      }
      @media (min-width: 1200px){
          .form-inline .input-group {
              width: 300px;
              margin-left: 30px;
          }
      }
      @media (max-width: 768px){
          .navbar .dropdown-menu.form-wrapper {
              width: 100%;
              padding: 10px 15px;
              background: transparent;
              border: none;
          }
          .navbar .form-inline {
              display: block;
          }
          .navbar .input-group {
              width: 100%;
          }
          .navbar .nav .btn-primary, .navbar .nav .btn-primary:active {
              display: block;
          }
    
    
      }
      </style>
</head>
<body>
    <nav class="navbar navbar-default navbar-expand-lg navbar-light">
        <div class="navbar-header">
          <a class="navbar-brand" href="#">Kino<b>FIEK</b></a>
          <button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
            <span class="navbar-toggler-icon"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <div id="navbarCollapse" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a href="../index.html">Home</a></li>
            <li><a href="../katalogu.html">Katalogu</a></li>
            <li><a href="../events.html">Evente</a></li>
            <li><a href="../kontakti.html">Kontakti</a></li>
            <li class="dropdown">
              <a data-toggle="dropdown" class="dropdown-toggle" href="#">Sallat<b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="#">Salla 1</a></li>
                <li><a href="#">Salla 2</a></li>
                <li><a href="#">Salla 3</a></li>
                <li><a href="#">Salla 4</a></li>
              </ul>
            </li>
          </ul>
          <form class="navbar-form form-inline">
            <div class="input-group search-box">
              <input type="text" id="search" class="form-control" placeholder="Search here...">
              <span class="input-group-addon"><i class="material-icons">&#xE8B6;</i></span>
            </div> 
          </form>
          <ul class="nav navbar-nav navbar-right">
            <li>
              <a data-toggle="dropdown" class="dropdown-toggle" href="#">Login</a>
              <ul class="dropdown-menu form-wrapper">
                <li>
                  <form action="" method="post">
                    <p class="hint-text">Plotesone kete forme qe te kyceni!</p>
                    <div class="form-group">
                      <input type="text" class="form-control" placeholder="Username" required="required">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control" placeholder="Password" required="required">
                    </div>
                    <input type="submit" class="btn btn-primary btn-block" value="Login">
                  </form>
                </li>
              </ul>
            </li>
            <li>
              <a href="#" data-toggle="dropdown" class="dropdown-toggle">Sign up</a>
              <ul class="dropdown-menu form-wrapper">
                <li>
                  <form action="" method="post">
                    <p class="hint-text">Plotesone kete forme qe te regjistroheni!</p>
                    <div class="form-group">
                      <input type="text" class="form-control" placeholder="First Name" required="required">
                    </div>
                    <div class="form-group">
                      <input type="text" class="form-control" placeholder="Last Name" required="required">
                    </div>
                    <div class="form-group">
                      <input type="email" class="form-control" placeholder="Email" required="required">
                    </div>
                    <div class="form-group">
                      <input type="text" class="form-control" placeholder="Username" required="required">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control" placeholder="Password" required="required">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control" placeholder="Confirm Password" required="required">
                    </div>
                    <input type="submit" class="btn btn-primary btn-block" value="Sign up">
                  </form>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </nav>
      <div class="timeline_box">
        <div id="flex_box1">
          <div class="time_box" id="date"></div>
          <?php
          
            $H = (int)date("H");

            if($H == 0){
              $HP = 22;
            }elseif($H == 1){
              $HP = 23;
            }else{
              $HP = $H - 2;
            }
               
            for($i = 0; $i < 5; $i++){
              if($HP == 24){
                $HP = 0;
              }

              if($HP < 10){
                echo "<div class=\"time_interval\">0$HP:00</div><br>";
              }else {
                echo "<div class=\"time_interval\">$HP:00</div><br>";
              }
              $HP++;   
            }

          ?>
        </div>
        <div id="flex_box2">
          <div class="time_box" style="display:inline-block; padding:2%; padding-left:7%;">Filmi</div>
          <div id="box">
          <a href="#" class="button_movie" id="button" style="display:inline-block; padding:2%; padding-left:4%;">"Filmi X"</a>
          <form action="" id="form">
           <h1 style="text-align:center;">Info</h1>
          </form>
          </div>
        </div>
      </div>

      <div class="box2-area">
      <div class="hallpic_box">
        <h1 style="text-align: center;">Hall pic</h1>
      </div>
      <div class="halldesc_box">
        <h1 style="text-align: center;">Hall Desc</h1>
      </div>

      </div>

 <script src="hall_js.js"></script>
</body>

</html>