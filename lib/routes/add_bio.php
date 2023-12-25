<?php 
    include("../layouts/header.php");
    include("../function/function.php");
    include("../layouts/nav.php");

    if(empty($_SESSION['loginSession'])){
        header("location:../views/login.php");
    }
?>
