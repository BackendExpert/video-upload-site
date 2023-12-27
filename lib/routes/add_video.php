<?php 
    include("../layouts/header.php");
    include("../function/function.php");
    include("../layouts/dash_nav.php");

    if(empty($_SESSION['loginSession'])){
        header("location:../views/logout.php");
    }
?>


<div class="container">
    <br>
    <h2>Add New Video</h2>
    <hr>

    <form action="" method="post" enctype="multipart/form-data">
        <label for="video">Video : </label>
        <input type="file" name="video" id=""><br>

        <label for="video">Video Tag : </label>
        <input type="file" name="video" id=""><br>

        <label for="video">Video Description : </label>
        <input type="file" name="video" id=""><br>

        <label for="video">Video Public/Private: </label>
        <input type="file" name="video" id=""><br>
        
    </form>
</div>