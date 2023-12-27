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
        <input type="file" name="video" id="" class="form-control"><br>

        <label for="video">Video Tag : </label>
        <input type="text" name="video_tag" id="" class="form-control" placeholder="Video Tag"><br>

        <label for="video">Video Description : </label>
        <textarea name="video_desc" cols="30" rows="5" class="form-control" style="resize:none;" placeholder="Video Description"></textarea><br>

        <label for="video">Video Public/Private: </label>
        <select name="is_public" class="form-control">Video Public/Private : 
            <option value="1">Public</option>
            <option value="0">Private</option>
        </select><br>
            
        <div class="row">
            <div class="col-lg-6">
                <input type="reset" value="Clear" class="jkbtn jkbtn-gray" style="width:100%;">
            </div>
            <div class="col-lg-6">
                <input type="submit" value="Add Video" name="video_add" class="jkbtn jkbtn-green" style="width:100%;">
            </div>
        </div>

    </form>
</div>