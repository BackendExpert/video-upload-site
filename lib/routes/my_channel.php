<?php include("../layouts/header.php") ?>
<?php include("../function/function.php"); ?>
<?php include("../layouts/dash_nav.php") ?>

<link rel="stylesheet" href="../../css/style.css">
<?php 

    if(empty($_SESSION['loginSession'])){
        header("location:../views/logout.php");
    }
?>
