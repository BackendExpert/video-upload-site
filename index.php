<?php include("lib/layouts/header.php"); ?>
<link rel="stylesheet" href="css/style.css">
<?php include("lib/layouts/nav.php");?>
<link rel="stylesheet" href="node_modules/@jehankandy/jkcss/index.css">

    <div class="container">
        <?php 
            if(isset($_SESSION['loginSession'])){
        ?>
        <h2 class="site-title">Welcome Back, <?php view_name(); ?></h2>
        <?php
            }else{
        ?>
        <h2 class="site-title">Welcome to Site</h2>
        <?php        
            }
        ?>

        <hr>

        <div class="row">
            <div class="card">
                <div class="search-filter">
                    <?php   
                        
                        if(isset($_POST['search_vid'])){
                            $result = search_videos($_POST['search']);
                            echo $result;
                        }
                    ?>

                    <form action="" method="post">
                        <div class="row">
                            <div class="col-lg-12">
                                <input type="text" name="search" id="" placeholder="Search" class="form-control" required>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-lg-12">
                                <input type="submit" value="Search Videos" name="search_vid" class="jkbtn jkbtn-green">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <br>
        <?php 
            if(isset($_SESSION['loginSession'])){
        ?>
            <a href="lib/routes/video/create.php"><button class="jkbtn jkbtn-blue"><i class="fas fa-plus"></i> Add New Video</button></a>
            <button class="jkbtn jkbtn-green"><i class="fas fa-tachometer-alt"></i> To Dashboard <?php to_dashboard(); ?></button>
            <hr>

        <?php
            if(isset($_POST['search_vid'])){
        ?>
            <div class="row">
                <?php view_videos(); ?>
            </div>            
        <?php
            }
            else{
        ?>
            <div class="row">
                <?php all_vides(); ?>
            </div>
                
        <?php
            }
            }else{
        ?>
            <div class="row">
                <?php all_vides(); ?>
            </div>
        <?php
            }      
        ?>



        <br><br>       

    </div>


<script src="js/script.js"></script>