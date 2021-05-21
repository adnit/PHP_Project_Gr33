<?php
require_once('./php/session.php'); 
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
              <a id="ballina" class="nav-link" href="index.php"
                ><i class="fas fa-tachometer-alt"></i><span>Ballina</span></a
              >
            </li>
            <li class="nav-item">
              <a id="eventet"  class="nav-link" href="eventet.php"
                ><i class="fas fa-user"></i><span>Evente</span></a
              >
            </li>
            <li class="nav-item">
              <a id="sallat" class="nav-link" href="sallat.php"
                ><i class="fas fa-table"></i><span>Sallat</span></a
              >
            </li>
            <li class="nav-item">
              <a id="kontakto" class="nav-link" href="kontakto.php"
                ><i class="far fa-user-circle"></i><span>Kontakti</span></a
              >
            </li>
            <li class="nav-item">
              <a class="nav-link" href="about%20EDIT!!!.html"
                ><i class="fas fa-user-circle"></i
                ><span>Rreth kinemase tone</span></a
              >
            </li>
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
              <form
                class="
                  d-none d-sm-inline-block
                  me-auto
                  ms-md-3
                  my-2 my-md-0
                  mw-100
                  navbar-search
                "
              >
                <div class="input-group">
                  <input
                  id="searchmovie"
                    class="bg-light form-control border-0 small"
                    type="text"
                    placeholder="Kerkoni Filmin"
                  />
                  <ul id="results"></ul>
                </div>
              </form>
              <ul class="navbar-nav flex-nowrap ms-auto">
                <li class="nav-item dropdown d-sm-none no-arrow">
                  <a
                    class="dropdown-toggle nav-link"
                    aria-expanded="false"
                    data-bs-toggle="dropdown"
                    href="#"
                    ><i class="fas fa-search"></i
                  ></a>
                  <div
                    class="
                      dropdown-menu dropdown-menu-end
                      p-3
                      animated--grow-in
                    "
                    aria-labelledby="searchDropdown"
                  >
                    <form class="me-auto navbar-search w-100">
                      <div class="input-group">
                        <input
                          class="bg-light form-control border-0 small"
                          type="text"
                          placeholder="Kerko filim..."
                        />
                        <div class="input-group-append">
                          <button class="btn btn-primary py-0" type="button">
                            <i class="fas fa-search"></i>
                          </button>
                        </div>
                      </div>
                    </form>
                  </div>
                </li>
                <li class="nav-item dropdown no-arrow mx-1">
                  <div class="nav-item dropdown no-arrow">
                    <a
                      class="dropdown-toggle nav-link"
                      aria-expanded="false"
                      data-bs-toggle="dropdown"
                      href="#"
                      ><span class="badge bg-danger badge-counter">3+</span
                      ><i class="fas fa-bell fa-fw"></i
                    ></a>
                    <div
                      class="
                        dropdown-menu dropdown-menu-end dropdown-list
                        animated--grow-in
                      "
                    >
                      <h6 class="dropdown-header">alerts center</h6>
                      <a
                        class="dropdown-item d-flex align-items-center"
                        href="#"
                        ><div class="me-3">
                          <div class="bg-primary icon-circle">
                            <i class="fas fa-file-alt text-white"></i>
                          </div>
                        </div>
                        <div>
                          <span class="small text-gray-500"
                            >December 12, 2019</span
                          >
                          <p>A new monthly report is ready to download!</p>
                        </div></a
                      ><a
                        class="dropdown-item d-flex align-items-center"
                        href="#"
                        ><div class="me-3">
                          <div class="bg-success icon-circle">
                            <i class="fas fa-donate text-white"></i>
                          </div>
                        </div>
                        <div>
                          <span class="small text-gray-500"
                            >December 7, 2019</span
                          >
                          <p>$290.29 has been deposited into your account!</p>
                        </div></a
                      ><a
                        class="dropdown-item d-flex align-items-center"
                        href="#"
                        ><div class="me-3">
                          <div class="bg-warning icon-circle">
                            <i
                              class="fas fa-exclamation-triangle text-white"
                            ></i>
                          </div>
                        </div>
                        <div>
                          <span class="small text-gray-500"
                            >December 2, 2019</span
                          >
                          <p>
                            Spending Alert: We\'ve noticed unusually high
                            spending for your account.
                          </p>
                        </div></a
                      ><a
                        class="dropdown-item text-center small text-gray-500"
                        href="#"
                        >Show All Alerts</a
                      >
                    </div>
                  </div>
                </li>
                <li class="nav-item dropdown no-arrow mx-1">
                  <div class="nav-item dropdown no-arrow">
                    <a
                      class="dropdown-toggle nav-link"
                      aria-expanded="false"
                      data-bs-toggle="dropdown"
                      href="#"
                      ><span class="badge bg-danger badge-counter">7</span
                      ><i class="fas fa-envelope fa-fw"></i
                    ></a>
                    <div
                      class="
                        dropdown-menu dropdown-menu-end dropdown-list
                        animated--grow-in
                      "
                    >
                      <h6 class="dropdown-header">alerts center</h6>
                      <a
                        class="dropdown-item d-flex align-items-center"
                        href="#"
                        ><div class="dropdown-list-image me-3">
                          <img
                            class="rounded-circle"
                            src="assets/img/avatars/avatar4.jpeg"
                          />
                          <div class="bg-success status-indicator"></div>
                        </div>
                        <div class="fw-bold">
                          <div class="text-truncate">
                            <span
                              >Hi there! I am wondering if you can help me with
                              a problem I\'ve been having.</span
                            >
                          </div>
                          <p class="small text-gray-500 mb-0">
                            Emily Fowler - 58m
                          </p>
                        </div></a
                      ><a
                        class="dropdown-item d-flex align-items-center"
                        href="#"
                        ><div class="dropdown-list-image me-3">
                          <img
                            class="rounded-circle"
                            src="assets/img/avatars/avatar2.jpeg"
                          />
                          <div class="status-indicator"></div>
                        </div>
                        <div class="fw-bold">
                          <div class="text-truncate">
                            <span
                              >I have the photos that you ordered last
                              month!</span
                            >
                          </div>
                          <p class="small text-gray-500 mb-0">Jae Chun - 1d</p>
                        </div></a
                      ><a
                        class="dropdown-item d-flex align-items-center"
                        href="#"
                        ><div class="dropdown-list-image me-3">
                          <img
                            class="rounded-circle"
                            src="assets/img/avatars/avatar3.jpeg"
                          />
                          <div class="bg-warning status-indicator"></div>
                        </div>
                        <div class="fw-bold">
                          <div class="text-truncate">
                            <span
                              >Last month\'s report looks great, I am very happy
                              with the progress so far, keep up the good
                              work!</span
                            >
                          </div>
                          <p class="small text-gray-500 mb-0">
                            Morgan Alvarez - 2d
                          </p>
                        </div></a
                      ><a
                        class="dropdown-item d-flex align-items-center"
                        href="#"
                        ><div class="dropdown-list-image me-3">
                          <img
                            class="rounded-circle"
                            src="assets/img/avatars/avatar5.jpeg"
                          />
                          <div class="bg-success status-indicator"></div>
                        </div>
                        <div class="fw-bold">
                          <div class="text-truncate">
                            <span
                              >Am I a good boy? The reason I ask is because
                              someone told me that people say this to all dogs,
                              even if they aren\'t good...</span
                            >
                          </div>
                          <p class="small text-gray-500 mb-0">
                            Chicken the Dog · 2w
                          </p>
                        </div></a
                      ><a
                        class="dropdown-item text-center small text-gray-500"
                        href="#"
                        >Show All Alerts</a
                      >
                    </div>
                  </div>
                  <div
                    class="shadow dropdown-list dropdown-menu dropdown-menu-end"
                    aria-labelledby="alertsDropdown"
                  ></div>
                </li>
                <div class="d-none d-sm-block topbar-divider"></div>
                <li class="nav-item dropdown no-arrow">
                  <div class="nav-item dropdown no-arrow">
                    <a
                      class="dropdown-toggle nav-link"
                      aria-expanded="false"
                      data-bs-toggle="dropdown"
                      href="#"
                      >
                      ';
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
                        src="assets/img/avatars/avatar-default.png"
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
                      <a class="dropdown-item" href="/profile.php"
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
                      <a class="dropdown-item" href="/logout.php"
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
                      <a class="dropdown-item" href="/login.php"
                        ><i
                          class="fas fa-key fa-sm fa-fw me-2 text-gray-400"
                        ></i
                        >&nbsp;Kyqu</a
                      ><a class="dropdown-item" href="/register.php"
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