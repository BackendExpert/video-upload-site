<?php include("../../layouts/header.php") ?>
<?php include("../../function/function.php"); ?>
<?php include("../../layouts/dash_nav.php") ?>

<?php 

    if(empty($_SESSION['loginSession'])){
        header("location:../../views/logout.php");
    }
    admin_access();
?>

<br>
<div class="container">
    <a href="../admin.php"><button class="jkbtn jkbtn-blue"> Back</button></a>
    <hr><br>
    <h2><i class="fas fa-plus"></i><i class="fas fa-user-shield"></i> Add Admin</h2><br>

    <form action="" method="post">
        <label for="Username">Admin Username : </label>
        <input type="text" name="admin_username" id="" class="form-control" placeholder="Admin Username"><br>

        <label for="email">Admin Email : </label>
        <input type="text" name="admin_email" id="" class="form-control"><br>

        <label for="password">Admin Password : </label>
        <input type="password" name="admi_pass" id="" class="form-control">

        <div class="row">
            <div class="col-lg-6">
                <input type="reset" value="Clear" class="jkbtn jkbtn-gray">
            </div>
            <div class="col-lg-6"></div>
        </div>
    </form>
</div>