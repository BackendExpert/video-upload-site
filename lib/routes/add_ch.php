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

    <form action="" method="post" enctype="multipart/form-data">
        <label for="fname">Channel Profile Image : </label>
        <input type="file" name="ch_img" id="" class="form-control" accept="image/*"><br>

        <label for="chname">Channel Name : </label>
        <input type="text" name="ch_name" id="" class="form-control"><br>

        <label for="chennal_desc">Channel Description : </label>
        <textarea name="ch_desc" cols="30" rows="5" class="form-control" style="resize:none;" placeholder="Channel Description"></textarea><br>

        <div class="row">
            <div class="col-lg-6">
                <input type="reset" value="Clear" class="jkbtn jkbtn-gray" style="width:100%;">
            </div>
            <div class="col-lg-6">
                <input type="submit" value="Add Channel Data" class="jkbtn jkbtn-green" name="chdata_add" style="width:100%;">
            </div>
        </div>
    </form>
</div>