<?php 
    include("../layouts/header.php");
    include("../function/function.php");
    include("../layouts/nav.php");

    if(empty($_SESSION['loginSession'])){
        header("location:../views/login.php");
    }
?>

<div class="container">
    <a href=""><button class="btn btn-primary">Back</button></a>
</div>