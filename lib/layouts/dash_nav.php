

<link rel="stylesheet" href="css/style.css">
<nav class="navbar navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"><i class="fas fa-video"></i>  Video Site</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <!-- <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Features</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Pricing</a>
        </li> -->
      </ul>
      <span class="navbar-text">
        <!-- <a href=""><button class="btn btn-primary"><i class="fas fa-user-alt"></i> Login</button></a> -->
        <?php 
          include("../function/function.php");
          if(isset($_SESSION['loginSession'])){
        ?>
        <?php view_name(); ?>
        <a href="lib/views/logout.php" style="text-decoration:none;"><button class="jkbtn jkbtn-red"><i class="fas fa-sign-out-alt"></i> SignOut</button></a>
        <?php
          }else{
        ?>
        <a href="lib/views/login.php" style="text-decoration:none;"><button class="jkbtn jkbtn-blue"><i class="fas fa-user-alt"></i> Login</button></a>
        <?php
          }
        ?>

        
      </span>
    </div>
  </div>
</nav>

<script src="js/script.js"></script>