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

    <?php 
        if(isset($_POST['video_add'])){
            $result = add_new_video($_FILES['video']['name'], $_FILES['video']['tmp_name'], $_POST['video_title'], $_POST['video_tag'], $_POST['video_desc'], $_POST['is_public']);
            echo $result;
        }    
    ?>

    <form action="" method="post" enctype="multipart/form-data">
        <label for="video">Video : </label>
        <input type="file" name="video" id="" class="form-control" accept="video/*"><br>

        <label for="video_title">Video Title : </label>
        <input type="text" name="video_title" id="" class="form-control" placeholder="Video Title"><br>

        <label for="video_tag">Video Tag : </label>
        <input type="text" name="video_tag" id="" class="form-control" placeholder="Video Tag"><br>

        <label for="video_desc">Video Description : </label>
        <textarea name="video_desc" cols="30" rows="5" class="form-control" style="resize:none;" placeholder="Video Description"></textarea><br>

        <label for="vid_length">Video Length (in min) : </label>
        <input type="text" name="vid_length" id="" class="form-control" placeholder="Video Length"><br>

        <label for="video_q">Video Quality: </label>
        <select name="vid_qu" class="form-control">Video Public/Private : 
            <option value="360p">360p</option>
            <option value="480p">480p</option>
            <option value="720p">720p</option>
            <option value="1080p">1080p</option>
        </select><br>

        <label for="video_type">Video Public/Private: </label>
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

        <br><br>

    </form>
</div>