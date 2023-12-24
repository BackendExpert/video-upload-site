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
                            $result = search_videos($_POST['search'], $_POST['vid_len'], $_POST['vid_qualty']);
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
                            <div class="col-lg-6">
                                <label for="lenvid">Video Length</label>
                                <select name="vid_len" id="" class="form-control">
                                    <option value="les10">1 min - 10 min</option>
                                    <option value="10to20">11 min - 20 min</option>
                                    <option value="20up">20 min+</option>
                                </select>
                            </div>
                            <div class="col-lg-6">
                                <label for="queltyvid">Video Quality</label>
                                <select name="vid_qualty" id="" class="form-control">
                                    <option value="360p">360p</option>
                                    <option value="480p">480p</option>
                                    <option value="720p">720p</option>
                                    <option value="1080p">1080p</option>
                                </select>
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
            <hr>
        <?php
            }
        ?>
        



    </div>


<script src="js/script.js"></script>