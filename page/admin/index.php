<!DOCTYPE html>
<html lang="en">
<head>
  <title>Uniqlouse | Admin Dashboard</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="Mantis is made using Bootstrap 5 design framework.">
  <meta name="author" content="CodedThemes">

  <link rel="icon" href="./assets/images/favicon.svg" type="image/x-icon"> 
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@300;400;500;600;700&display=swap" id="main-font-link">
  <link rel="stylesheet" href="./assets/fonts/tabler-icons.min.css" >
  <link rel="stylesheet" href="./assets/fonts/feather.css" >
  <link rel="stylesheet" href="./assets/fonts/fontawesome.css" >
  <link rel="stylesheet" href="./assets/fonts/material.css" >
  <link rel="stylesheet" href="./assets/css/style.css" id="main-style-link" >
  <link rel="stylesheet" href="./assets/css/style-preset.css" >
</head>
<body data-pc-preset="preset-1" data-pc-direction="ltr" data-pc-theme="light">
  
  <div class="loader-bg">
    <div class="loader-track">
      <div class="loader-fill"></div>
    </div>
  </div>
  <nav class="pc-sidebar">
    <div class="navbar-wrapper">
      <div class="m-header">
        <a href="?page=dashboard" class="b-brand text-primary">
          <span class="fw-bold fs-4 text-primary" style="letter-spacing: 0.5px;">Uniqlouse</span>
        </a>
      </div>

      <div class="navbar-content">
        <ul class="pc-navbar">
          <li class="pc-item">
            <a href="?page=dashboard" class="pc-link">
              <span class="pc-micon"><i class="ti ti-dashboard"></i></span>
              <span class="pc-mtext">Dashboard</span>
            </a>
          </li>

          <li class="pc-item pc-caption">
            <label>Master Data</label>
          </li>

          <li class="pc-item">
            <a href="?page=kategori&action=index" class="pc-link">
              <span class="pc-micon"><i class="ti ti-category"></i></span>
              <span class="pc-mtext">Kategori</span>
            </a>
          </li>

          <li class="pc-item">
            <a href="?page=produk&action=index" class="pc-link">
              <span class="pc-micon"><i class="ti ti-shirt"></i></span>
              <span class="pc-mtext">Produk</span>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <header class="pc-header">
    <div class="header-wrapper"> 
      
      <div class="me-auto pc-mob-drp">
        <ul class="list-unstyled d-flex align-items-center mb-0">
          <li class="pc-h-item pc-sidebar-collapse">
            <a href="#" class="pc-head-link ms-0" id="sidebar-hide">
              <i class="ti ti-menu-2"></i>
            </a>
          </li>
          <li class="pc-h-item pc-sidebar-popup">
            <a href="#" class="pc-head-link ms-0" id="mobile-collapse">
              <i class="ti ti-menu-2"></i>
            </a>
          </li>
          
          <li class="pc-h-item d-none d-md-inline-flex ms-2">
            <span class="text-primary fw-semibold fs-4" style="letter-spacing: 0.5px;">Uniqlouse</span>
          </li>

          <li class="pc-h-item ms-4 d-none d-md-inline-flex">
            <div class="input-group align-items-center" style="max-width: 300px;">
              <span class="input-group-text bg-transparent border-0 pe-1">
                <i class="ti ti-search text-muted fs-5"></i>
              </span>
              <input type="search" class="form-control border-0 bg-transparent shadow-none" placeholder="Search here. . .">
            </div>
          </li>
        </ul>
      </div>

      <div class="ms-auto">
        <ul class="list-unstyled d-flex align-items-center mb-0">
          <li class="dropdown pc-h-item me-2">
            <a class="pc-head-link dropdown-toggle arrow-none me-0" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
              <i class="ti ti-mail"></i>
            </a>
            <div class="dropdown-menu dropdown-notification dropdown-menu-end pc-h-dropdown">
              <div class="dropdown-header d-flex align-items-center justify-content-between">
                <h5 class="m-0">Message</h5>
                <a href="#!" class="pc-head-link bg-transparent"><i class="ti ti-x text-danger"></i></a>
              </div>
              <div class="dropdown-divider"></div>
              <div class="dropdown-header px-0 text-wrap header-notification-scroll position-relative" style="max-height: calc(100vh - 215px)">
                <div class="list-group list-group-flush w-100">
                  <a class="list-group-item list-group-item-action">
                    <div class="d-flex">
                      <div class="flex-shrink-0">
                        <img src="../assets/images/user/avatar-2.jpg" alt="user-image" class="user-avtar">
                      </div>
                      <div class="flex-grow-1 ms-1">
                        <span class="float-end text-muted">3:00 AM</span>
                        <p class="text-body mb-1">It's <b>Cristina danny's</b> birthday today.</p>
                        <span class="text-muted">2 min ago</span>
                      </div>
                    </div>
                  </a>
                </div>
              </div>
            </div>
          </li>

          <li class="dropdown pc-h-item header-user-profile">
            <a class="pc-head-link dropdown-toggle arrow-none me-0 d-flex align-items-center gap-2" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" data-bs-auto-close="outside" aria-expanded="false">
              <img src="../../img/pp.jpg" onerror="this.src='../assets/images/user/avatar-1.jpg'" alt="user-image" class="user-avtar m-0" style="width: 35px; height: 35px; object-fit: cover;">
              <span class="fw-semibold text-dark d-none d-sm-inline">Admin Uniqlouse</span>
            </a>
            <div class="dropdown-menu dropdown-user-profile dropdown-menu-end pc-h-dropdown">
              <div class="dropdown-header">
                <div class="d-flex mb-1 align-items-center">
                  <div class="flex-shrink-0">
                    <img src="../../img/pp.jpg" onerror="this.src='../assets/images/user/avatar-1.jpg'" alt="user-image" class="user-avtar wid-35">
                  </div>
                  <!-- <div class="flex-grow-1 ms-3">
                    <h6 class="mb-0">Admin Uniqlou</h6>
                    <span class="text-muted fs-7">okella / trias</span>
                  </div> -->
                  <a href="#!" class="pc-head-link bg-transparent"><i class="ti ti-power text-danger"></i></a>
                </div>
              </div>
              <div class="dropdown-divider"></div>
              <a href="#!" class="dropdown-item"><i class="ti ti-user"></i> <span>View Profile</span></a>
              <a href="#!" class="dropdown-item"><i class="ti ti-settings"></i> <span>Settings</span></a>
              <a href="#!" class="dropdown-item"><i class="ti ti-power"></i> <span>Logout</span></a>
            </div>
          </li>
        </ul>
      </div>

    </div>
  </header>
  <div class="pc-container">
    <div class="pc-content">
      <?php include(__DIR__. '/../../routes/admin.php'); ?>
    </div>
  </div>
  <footer class="pc-footer">
    <div class="footer-wrapper container-fluid">
      <div class="row">
        <div class="col-sm my-1">
          <p class="m-0">Mantis &hearts; crafted by Team <a href="https://themeforest.net/user/codedthemes" target="_blank">Codedthemes</a></p>
        </div>
        <div class="col-auto my-1">
          <ul class="list-inline footer-link mb-0">
            <li class="list-inline-item"><a href="?page=dashboard">Home</a></li>
          </ul>
        </div>
      </div>
    </div>
  </footer>
  <script src="./assets/js/plugins/popper.min.js"></script>
  <script src="./assets/js/plugins/simplebar.min.js"></script>
  <script src="./assets/js/plugins/bootstrap.min.js"></script>
  <script src="./assets/js/fonts/custom-font.js"></script>
  <script src="./assets/js/pcoded.js"></script>
  <script src="./assets/js/plugins/feather.min.js"></script>

  <script>layout_change('light');</script>
  <script>change_box_container('false');</script>
  <script>layout_rtl_change('false');</script>
  <script>preset_change("preset-1");</script>
  <script>font_change("Public-Sans");</script>

</body>
</html>