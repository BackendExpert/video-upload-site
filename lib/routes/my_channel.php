<?php include("../layouts/header.php") ?>
<?php include("../function/function.php"); ?>
<?php include("../layouts/dash_nav.php") ?>

<link rel="stylesheet" href="../../css/style.css">
<?php 

    if(empty($_SESSION['loginSession'])){
        header("location:../views/logout.php");
    }
?>

<div class="container">
    <br>
    <?php go_back(); ?>
    <hr>
    <br>
    <?php view_my_channel() ?>

    <br><br>
    <ul>
        <li><a href="#public_vid">Public Videos</a></li>
        <li><a href="#private_vid">Private Videos</a></li>
    </ul>

    <section id="public_vid">
        <div class="row">        
            <h2>Public Videos</h2>
            <?php public_videos(); ?>
        </div>
    </section>
    <section id="private_vid">
        <div class="row">     
            <h2>Private Videos</h2>   
            <?php public_videos(); ?>
        </div>
    </section>
    
    


</div>