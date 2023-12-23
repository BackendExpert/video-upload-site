<?php 

    if(empty($_SESSION['loginSession'])){
        header("location:../../login.php");
    }

?>