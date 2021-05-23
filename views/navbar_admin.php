<?php


require_once('../php/session.php'); 

echo '<nav
        class="
          navbar navbar-dark
          align-items-start
          sidebar sidebar-dark
          accordion
          bg-gradient-primary
          p-0
        "
      >
        <div class="container-fluid d-flex flex-column p-0">
          <a
            class="
              navbar-brand
              d-flex
              justify-content-center
              align-items-center
              sidebar-brand
              m-0
            "
            href="#"
            ><div class="sidebar-brand-icon rotate-n-15">
              <i class="material-icons">local_movies</i>
            </div>
            <div class="sidebar-brand-text mx-3"><span>kinofiek</span></div></a
          >
          <hr class="sidebar-divider my-0" />
          <ul class="navbar-nav text-light" id="accordionSidebar">
            <li class="nav-item">
              <a class="nav-link active" href="index.php"
                ><i class="fas fa-tachometer-alt"></i
                ><span>KinoFIEK Dashboard</span></a
              ><a class="nav-link" href="movies.php"
                ><i class="fas  fa-list "></i><span>Filmat</span></a
              >
            </li>
            <li class="nav-item">
              <a class="nav-link" href="profile.html"
                ><i class="fas fa-user"></i><span>Eventet</span></a
              >
            </li>
            <li class="nav-item">
              <a class="nav-link" href="login.html"
                ><i class="far fa-user-circle"></i><span>Sallat</span></a
              >
            </li>
            <li class="nav-item">
              <a class="nav-link" href="register.html"
                ><i class="fas fa-user-circle"></i><span>Kontaktet</span></a
              >
            </li>
            <li class="nav-item"></li>
          </ul>
          <div class="text-center d-none d-md-inline">
            <button
              class="btn rounded-circle border-0"
              id="sidebarToggle"
              type="button"
            ></button>
          </div>
        </div>
      </nav>
      <div class="d-flex flex-column" id="content-wrapper">
        <div id="content">
          <nav
            class="
              navbar navbar-light navbar-expand
              bg-white
              shadow
              mb-4
              topbar
              static-top
            "
          >
            <div class="container-fluid">
              <button
                class="btn btn-link d-md-none rounded-circle me-3"
                id="sidebarToggleTop"
                type="button"
              >
                <i class="fas fa-bars"></i>
              </button>
            
              <ul class="navbar-nav flex-nowrap ms-auto"> 
                
                <div class="d-none d-sm-block topbar-divider"></div>
                <li class="nav-item dropdown no-arrow">
                  <div class="nav-item dropdown no-arrow">
                    <a
                      class="dropdown-toggle nav-link"
                      aria-expanded="false"
                      data-bs-toggle="dropdown"
                      href="#"
                      >';
                      if (isset($_SESSION["firstlast"])) {
                      echo 
                      '
                        <span class="d-none d-lg-inline me-2 text-gray-600 small"
                        >'.$_SESSION["firstlast"].'</span
                      ><img
                        class="border rounded-circle img-profile"
                        src="'.$_SESSION["avatar"].'"
                    />
                      ';
                    }else {
                      echo '<span class="d-none d-lg-inline me-2 text-gray-600 small"
                        >Ju nuk jeni kyqur</span
                      ><img
                        class="border rounded-circle img-profile"
                        src="../assets/img/avatars/avatar-default.png"
                    />';
                    }

                    echo '
                    </a>
                    <div
                      class="
                        dropdown-menu
                        shadow
                        dropdown-menu-end
                        animated--grow-in
                      "
                    >';

                    if (isset($_SESSION["firstlast"])) {
                      echo '
                      <a class="dropdown-item" href="../profile.php"
                        ><i
                          class="fas fa-user fa-sm fa-fw me-2 text-gray-400"
                        ></i
                        >&nbsp;Profile</a
                      >';
                      if (isset($_SESSION["user_type"]) && $_SESSION["user_type"] == "ADMIN"){
                        echo '
                      <a class="dropdown-item" href="/admin.php"
                        ><i
                          class="
                            fas
                            fa-cog fa-sm fa-fw
                            me-2
                            text-gray-400
                          "
                        ></i
                        >&nbsp;Admin Panel</a
                      >
                    ';
                      }

                        echo 
                        '
                        <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="../logout.php"
                        ><i
                          class="
                            fas
                            fa-sign-out-alt fa-sm fa-fw
                            me-2
                            text-gray-400
                          "
                        ></i
                        >&nbsp;Logout</a
                      >
                    ';
                    

                      }else {
                      echo '
                      <a class="dropdown-item" href="../login.php"
                        ><i
                          class="fas fa-key fa-sm fa-fw me-2 text-gray-400"
                        ></i
                        >&nbsp;Kyqu</a
                      ><a class="dropdown-item" href="../register.php"
                        ><i
                          class="fas fa-clipboard-check fa-sm fa-fw me-2 text-gray-400"
                        ></i
                        >&nbsp;Regjistrohu</a
                      >
                    ';
                    }

                  echo '
                  </div>
                </li>
              </ul>
            </div>
          </nav>
      ';
 ?>