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

        <label for="lname">Last Name : </label>
        <input type="text" name=";n" id="" class="form-control" placeholder="Last Name"><br>

        <label for="data_birth">Date of Birth : </label>
        <input type="date" name="dob" id="" class="form-control" min="1950-01-01" max="2020-12-31"><br>

        <label for="address">Address : </label>
        <textarea name="user_address" cols="30" rows="5" class="form-control" style="resize:none;" placeholder="User Address"></textarea>

    </form>
</div>