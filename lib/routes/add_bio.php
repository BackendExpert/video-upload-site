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

    <?php 
        if(isset($_POST['bio_add'])){
            $result = bio_add_db($_FILES['p_img']['name'], $_FILES['p_img']['tmp_name'], $_FILES['p_img']['size'], $_POST['fn'], $_POST['ln'], $_POST['dob'], $_POST['user_address']);
            echo $result;
        }
    ?>

    <form action="" method="post" enctype="multipart/form-data">
        <label for="fname">Profile Image : </label>
        <input type="file" name="p_img" id="" class="form-control" accept="image/*"><br>

        <label for="fname">First Name : </label>
        <input type="text" name="fn" id="" class="form-control" placeholder="First Name"><br>

        <label for="lname">Last Name : </label>
        <input type="text" name="ln" id="" class="form-control" placeholder="Last Name"><br>

        <label for="data_birth">Date of Birth : </label>
        <input type="date" name="dob" id="" class="form-control" min="1950-01-01" max="2020-12-31"><br>

        <label for="address">Address : </label>
        <textarea name="user_address" cols="30" rows="5" class="form-control" style="resize:none;" placeholder="User Address"></textarea><br>

        <div class="row">
            <div class="col-lg-6">
                <input type="reset" value="Clear" class="jkbtn jkbtn-gray" style="width:100%;">
            </div>
            <div class="col-lg-6">
                <input type="submit" value="Add Bio" class="jkbtn jkbtn-green" name="bio_add" style="width:100%;">
            </div>
        </div>

    </form>
</div>