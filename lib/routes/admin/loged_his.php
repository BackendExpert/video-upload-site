<?php include("../../layouts/header.php") ?>
<?php include("../../function/function.php"); ?>
<?php include("../../layouts/dash_nav.php") ?>

<link rel="stylesheet" href="../../../css/style.css">
<?php 

    if(empty($_SESSION['loginSession'])){
        header("location:../../views/logout.php");
    }
    admin_access();
?>


<div class="container">
    <br>
    <a href="../admin.php"><button class="jkbtn jkbtn-blue">Back</button></a>
    <hr><br>
    <table class="table">
        <thead>
            <tr>
                <th>Username </th>
                <th>Email </th>
                <th>User Roll </th>
                <th>login Time </th>
            </tr>
        </thead>
        <tbody>

        </tbody>
    </table>
</div>