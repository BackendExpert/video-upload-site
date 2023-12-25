<?php 
    include("../layouts/header.php");
    include("../function/function.php");
    include("../layouts/dash_nav.php");

    if(empty($_SESSION['loginSession'])){
        header("location:../views/login.php");
    }
?>

<div class="container">
    <br><br>
    <?php go_back(); ?>
    <hr>
</div>