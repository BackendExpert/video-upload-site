<?php 
    include("../function/function.php");
    if(empty($_SESSION['loginSession'])){
        header("location:../views/login.php");
    }
?>