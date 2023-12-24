<?php include("../function/function.php"); ?>

<?php 

    if(empty($_SESSION['loginSession'])){
        header("location:../views/login.php");
    }

?>

hi all