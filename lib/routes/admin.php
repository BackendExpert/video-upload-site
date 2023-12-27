<?php include("../layouts/header.php") ?>
<?php include("../function/function.php"); ?>

<?php 

    if(empty($_SESSION['loginSession'])){
        header("location:../views/logout.php");
    }
    admin_access();
?>

<link rel="stylesheet" href="../../css/style.css">

    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/dashboard/">   
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
    <link rel="stylesheet" href="../../css/dashboard.css">
    <link rel="stylesheet" href="../../css/style.csss">


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .b-example-divider {
        width: 100%;
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }

      .btn-bd-primary {
        --bd-violet-bg: #712cf9;
        --bd-violet-rgb: 112.520718, 44.062154, 249.437846;

        --bs-btn-font-weight: 600;
        --bs-btn-color: var(--bs-white);
        --bs-btn-bg: var(--bd-violet-bg);
        --bs-btn-border-color: var(--bd-violet-bg);
        --bs-btn-hover-color: var(--bs-white);
        --bs-btn-hover-bg: #6528e0;
        --bs-btn-hover-border-color: #6528e0;
        --bs-btn-focus-shadow-rgb: var(--bd-violet-rgb);
        --bs-btn-active-color: var(--bs-btn-hover-color);
        --bs-btn-active-bg: #5a23c8;
        --bs-btn-active-border-color: #5a23c8;
      }

      .bd-mode-toggle {
        z-index: 1500;
      }

      .bd-mode-toggle .dropdown-menu .active .bi {
        display: block !important;
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->

  </head>
  <body>
  

<header class="navbar sticky-top bg-dark flex-md-nowrap p-0 shadow" data-bs-theme="dark">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6 text-white" href="#">Video Uplaod System</a>

  <ul class="navbar-nav flex-row d-md-none">
    <li class="nav-item text-nowrap">
      <button class="nav-link px-3 text-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSearch" aria-controls="navbarSearch" aria-expanded="false" aria-label="Toggle search">
        <svg class="bi"><use xlink:href="#search"/></svg>
      </button>
    </li>
    <li class="nav-item text-nowrap">
      <button class="nav-link px-3 text-white" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
        <svg class="bi"><use xlink:href="#list"/></svg>
      </button>
    </li>
  </ul>

  <div id="navbarSearch" class="navbar-search w-100 collapse">
    <input class="form-control w-100 rounded-0 border-0" type="text" placeholder="Search" aria-label="Search">
  </div>
</header>

<div class="container-fluid">
  <div class="row">
    <div class="sidebar border border-right col-md-3 col-lg-2 p-0 bg-body-tertiary">
      <div class="offcanvas-md offcanvas-end bg-body-tertiary" tabindex="-1" id="sidebarMenu" aria-labelledby="sidebarMenuLabel">
        <div class="offcanvas-header">
          <h5 class="offcanvas-title" id="sidebarMenuLabel">Video Uplaod System</h5>
          <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#sidebarMenu" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto">
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2 active" aria-current="page" href="#">
                <i class="fas fa-tachometer-alt"></i>
                Dashboard
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2" href="#">
                <i class="fas fa-users"></i>
                Users
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2" href="#">
                <i class="fas fa-chalkboard-teacher"></i>
                Channels
              </a>
            </li>
            <br>

            

          </ul>

          <hr class="my-3">

          <ul class="nav flex-column mb-auto">
            <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2" href="#" style="color: black;">                        
                        Admin : <?php view_name(); ?>
                    </a>
            </li>
            <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2" href="../views/logout.php" style="color: red;;">
                        <i class="fas fa-sign-out-alt"></i>
                        Sign out
                    </a>
            </li>
          </ul>
        </div>
      </div>
    </div>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Admin Dashboard</h1>

        <h5>Date : 
        <?php 
          $currentDate = date('l, F j, Y');
          // $currentDate = date("Y-m-d");
          echo $currentDate;
        ?>     

      </h5>
      </div>
      
      <a href="admin/add_admin.php"><button class="jkbtn jkbtn-green"><i class="fas fa-plus"></i><i class="fas fa-user-shield"></i> Add Admin User</button></a>
      <a href="admin/loged_his.php"><button class="jkbtn jkbtn-blue"><i class="fas fa-user"></i> User Login History</button></a>
      
      <br><hr><br>
      <h3><i class="fas fa-code"></i> Admin Controls</h3><br>
      <div class="row">
        <div class="col-lg-3">
          <div class="card text-bg-primary mb-3" style="max-width: 18rem;">
            <div class="card-header"><i class="fas fa-video"></i> Users and Admins</div>
            <div class="card-body">
              <h5 class="card-title">All User(admin and users)</h5>
              <h4><?php cout_all_users(); ?></h4>
            </div>
          </div>
        </div>
        <div class="col-lg-3">
          <div class="card text-bg-success mb-3" style="max-width: 18rem;">
            <div class="card-header"><i class="fas fa-video"></i> Active Admins </div>
            <div class="card-body">
              <h5 class="card-title">Active Admins</h5>
              <h4><?php cout_admins(); ?></h4>
            </div>
          </div>
        </div>
        <div class="col-lg-3">
          <div class="card text-bg-info mb-3" style="max-width: 18rem;">
            <div class="card-header"><i class="fas fa-video"></i> Active Users</div>
            <div class="card-body">
              <h5 class="card-title">All Active Users</h5>
              <h4><?php cout_users(); ?></h4>
            </div>
          </div>
        </div>
        <div class="col-lg-3">
          <div class="card text-bg-danger mb-3" style="max-width: 18rem;">
            <div class="card-header"><i class="fas fa-video"></i> Suspended Users</div>
            <div class="card-body">
              <h5 class="card-title">All Suspended Users</h5>
              <h4><?php cout_users_suspended(); ?></h4>
            </div>
          </div>
        </div>
      </div>

      
      <hr>
      <br>
      <h3><i class="fas fa-chart-bar"></i> Channel Stats</h3>
      <br>
      <div class="row">
        <div class="col-lg-3">
          <div class="card text-bg-primary mb-3" style="max-width: 18rem;">
            <div class="card-header"><i class="fas fa-video"></i> My Videos</div>
            <div class="card-body">
              <h5 class="card-title">Public Videos</h5>
              <h4>5</h4>
            </div>
          </div>
        </div>
        <div class="col-lg-3">
          <div class="card text-bg-success mb-3" style="max-width: 18rem;">
            <div class="card-header"><i class="fas fa-video"></i> My Subscribers </div>
            <div class="card-body">
              <h5 class="card-title">All Subscribers</h5>
              <h4>1000</h4>
            </div>
          </div>
        </div>
        <div class="col-lg-3">
          <div class="card text-bg-info mb-3" style="max-width: 18rem;">
            <div class="card-header"><i class="fas fa-video"></i> My Likes</div>
            <div class="card-body">
              <h5 class="card-title">All Videos Likes</h5>
              <h4>50000</h4>
            </div>
          </div>
        </div>
        <div class="col-lg-3">
          <div class="card text-bg-warning mb-3" style="max-width: 18rem;">
            <div class="card-header"><i class="fas fa-video"></i> My Comments</div>
            <div class="card-body">
              <h5 class="card-title">All Comments</h5>
              <h4>12000</h4>
            </div>
          </div>
        </div>
      </div>

      <hr>

      <div class="row">
        <div class="col-lg-6">
          <h3>Personal Info</h3>
          <div class="card">
            <div class="bio">
            <?php update_bio(); ?>
            </div>
          </div>
        </div>
        <div class="col-lg-6">
          <h3>Channel Info</h3>
          <div class="card">
            <div class="bio">
            <?php update_channel_info(); ?>
            </div>
          </div>
        </div>
      </div>




    </main>
  </div>
</div>

    <script src="../../js/dashboard.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.3.2/dist/chart.umd.js" integrity="sha384-eI7PSr3L1XLISH8JdDII5YN/njoSsxfbrkCTnJrzXt+ENP5MOVBxD+l6sEG4zoLp" crossorigin="anonymous"></script><script src="dashboard.js"></script></body>
</html>
