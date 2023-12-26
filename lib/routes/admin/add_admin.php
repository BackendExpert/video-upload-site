<?php include("../../layouts/header.php") ?>
<?php include("../../function/function.php"); ?>

<?php 

    if(empty($_SESSION['loginSession'])){
        header("location:../../views/logout.php");
    }
    admin_access();
?>