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

    <form action="" method="post">
        <label for="fname">First Name : </label>
        <input type="text" name="fn" id="" class="form-control" placeholder="First Name"><br>

        <label for="lname">First Name : </label>
        <input type="text" name=";n" id="" class="form-control" placeholder="Last Name"><br>
    </form>
</div>