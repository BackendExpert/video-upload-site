<?php 
    include("config.php");
    session_start();


    function sign_up($username, $email, $pass, $cpass){
        $con = Connection();

        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            return  "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                    <strong>Email : </strong> invalid Email...!
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>";
        }
        elseif($pass != $cpass){
            return  "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                            <strong>Password Error : </strong> Password and Confirm Password not match...!
                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                    </div>";
        }
        else{
            $check_user = "SELECT * FROM user_tbl WHERE email = '$email' || username = '$username'";
            $check_user_result = mysqli_query($con, $check_user);
            $check_user_nor = mysqli_num_rows($check_user_result);

            if($check_user_nor > 0){
                return  "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                            <strong>User : </strong> already exists...!
                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                    </div>";
            }

            else{

                $insert_user = "INSERT INTO user_tbl(username,email,user_pass,user_type,is_active,is_un_access,join_at,update_at)VALUES('$username','$email','$pass','user',1,0,NOW(),NOW())";
                $insert_user_result = mysqli_query($con, $insert_user);

                if($insert_user_result){
                    header("location:login.php");
                }
                elseif(!$check_user_result){
                    return  "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                            <strong>ERROR : </strong> 
                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                    </div>";
                }
            }
        }        
    }

    function sign_in($username, $pass){
        $con = Connection();

        $check_login_user = "SELECT * FROM user_tbl WHERE username = '$username' && user_pass = '$pass' && is_active = '1' && is_un_access='0'";
        $check_login_user_result = mysqli_query($con, $check_login_user);
        $check_login_user_nor = mysqli_num_rows($check_login_user_result);
        $check_login_user_row = mysqli_fetch_assoc($check_login_user_result);

        $deactive_user  = "SELECT * FROM user_tbl WHERE username = '$username' && user_pass = '$pass' && is_active = '0' && is_un_access='1'";
        $deactive_result = mysqli_query($con, $deactive_user);
        $deactive_nor = mysqli_num_rows($deactive_result); 
        $deactive_row = mysqli_fetch_assoc($deactive_result);
       
        if($deactive_nor == 0){
            if($check_login_user_nor > 0){
                if($pass == $check_login_user_row['user_pass']){
                    if(($check_login_user_row['user_type'] == 'user')){
                        setcookie('login',$check_login_user_row['email'],time()+60*60,'/');
                        $_SESSION['loginSession'] = $check_login_user_row['email'];
                        login_data();
                        header("location:../../index.php");
                    }
                    elseif($check_login_user_row['user_type'] == 'admin'){
                        setcookie('login',$check_login_user_row['email'],time()+60*60,'/');
                        $_SESSION['loginSession'] = $check_login_user_row['email'];
                        login_data();
                        header("location:../routes/admin.php");
                    }
                }
                else{
                    return  "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                            <strong>Password : </strong> Not Match...!
                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                    </div>";
                }
            }
            else{
                return  "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                            <strong>User : </strong> Not Found...!
                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                    </div>";
            }
        }
        else{
            $deactive_email = $deactive_row['email'];
            $view_una_msg = "SELECT * FROM un_access_tbl WHERE email = '$deactive_email'";
            $view_result = mysqli_query($con, $view_una_msg);
            $msg_row = mysqli_fetch_assoc($view_result);

            return  "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                            <strong>User Account: Suspended...!</strong>".$msg_row['un_access_msg']." at <b></b>".$msg_row['un_access_at']."</b>
                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                    </div>";
        }

    }

    function view_name(){
        $con = Connection();

        $login_email = strval($_SESSION['loginSession']);

        $select_user = "SELECT * FROM user_tbl WHERE email='$login_email'";
        $select_result = mysqli_query($con, $select_user);
        $select_row = mysqli_fetch_assoc($select_result);

        echo $select_row['username'];
    }

    function admin_access(){
        $con = Connection();
        $login_email = strval($_SESSION['loginSession']);

        $check_admin = "SELECT * FROM user_tbl WHERE email = '$login_email'";
        $admin_result = mysqli_query($con, $check_admin);
        $admin_row = mysqli_fetch_assoc($admin_result);

        if($admin_row['user_type'] != 'admin'){
            $update_un_access = "UPDATE user_tbl SET is_active='0', is_un_access='1' WHERE email='$login_email'";
            $update_result = mysqli_query($con, $update_un_access);

            $msg_un_access = "You tried access to the admin account";
            
            $insert_un_access = "INSERT INTO un_access_tbl(email,un_access_msg,un_access_at)VALUES('$login_email','$msg_un_access',NOW())";
            $insert_result = mysqli_query($con, $insert_un_access);

            header("location:../views/logout.php");
        }

    }

    function user_access(){
        $con = Connection();
        $login_email = strval($_SESSION['loginSession']);

        $check_admin = "SELECT * FROM user_tbl WHERE email = '$login_email'";
        $admin_result = mysqli_query($con, $check_admin);
        $admin_row = mysqli_fetch_assoc($admin_result);

        if($admin_row['user_type'] != 'user'){
            header("location:../views/logout.php");
        }

    }

    function update_bio(){
        $con = Connection();
        $login_email = strval($_SESSION['loginSession']);

        $select_is_updated = "SELECT * FROM user_tbl WHERE email = '$login_email'";
        $select_result = mysqli_query($con, $select_is_updated);
        $select_row = mysqli_fetch_assoc($select_result);

        if($select_row['bio_status'] == 0){
            $my_bio = "
                <a href='add_bio.php'><button class='jkbtn jkbtn-yellow'><i class='fas fa-plus'></i> Add Bio</button></a> <p style='color:red;'>Update Your Bio</p>            
            ";
        }
        else{
            $my_bio = view_user_bio();
        }

        echo $my_bio;
    }

    function update_channel_info(){
        $con = Connection();

        $login_email = strval($_SESSION['loginSession']);

        $select_is_updated = "SELECT * FROM user_tbl WHERE email = '$login_email'";
        $select_result = mysqli_query($con, $select_is_updated);
        $select_row = mysqli_fetch_assoc($select_result);

        if($select_row['channel_status'] == 0){
            $ch_bio = "
                <a href='add_ch.php'><button class='jkbtn jkbtn-yellow'><i class='fas fa-plus'></i> Add Channel Info</button></a> <p style='color:red;'>Update Your Channel Info</p>            
            ";
        }
        else{
            $ch_bio = view_ch_data();
        }

        echo $ch_bio;
    }

    function go_back(){
        $con = Connection();
        $login_email = strval($_SESSION['loginSession']);

        $check_user = "SELECT * FROM user_tbl WHERE email = '$login_email'";
        $check_result = mysqli_query($con, $check_user);
        $check_row = mysqli_fetch_assoc($check_result);

        if($check_row['user_type'] == 'admin'){
            echo "<a href='admin.php'><button class='jkbtn jkbtn-blue'>Back</button></a>";
        }
        else if($check_row['user_type'] == 'user'){
            echo "<a href='user.php'><button class='jkbtn jkbtn-blue'>Back</button></a>";
        }
    }

    function bio_add_db($pimg, $temp_img, $pimg_size, $fn, $ln, $dob, $address){
        $con = Connection();
        $login_email = strval($_SESSION['loginSession']);

        $target_dir = "images/";

        $img_p = basename($pimg);
        $target_path = $target_dir . $img_p;
        $pimg_type = pathinfo($target_path, PATHINFO_EXTENSION);

        $allow_images = array('jpg','png','jpeg','gif');
        if(in_array($pimg_type, $allow_images)){
            if($pimg_size < 10000000){
                if(move_uploaded_file($temp_img, $target_path)){
                    $check_data = "SELECT * FROM user_bio_tbl WHERE email = '$login_email'";
                    $check_result = mysqli_query($con, $check_data);
                    $check_nor = mysqli_num_rows($check_result);

                    if($check_nor == 0){
                        $insert_bio = "INSERT INTO user_bio_tbl(email,p_img,fname,lname,dob,user_address,add_at,update_at)VALUES('$login_email','$img_p','$fn','$ln','$dob','$address',NOW(),NOW())";
                        $insert_result = mysqli_query($con, $insert_bio);
    
                        $select = "SELECT * FROM user_tbl WHERE email = '$login_email'";
                        $select_result = mysqli_query($con, $select);
                        $select_row = mysqli_fetch_assoc($select_result);

                        $update_data = "UPDATE user_tbl SET bio_status = '1' WHERE email = '$login_email'";
                        $update_data_result = mysqli_query($con, $update_data);
    
                        if($select_row['user_type'] == 'admin'){
                            header("location:admin.php");
                        }
                        else if($select_row['user_type'] == 'user'){
                            header("location:user.php");
                        }
                    }
                    else{
                        return  "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                                        <strong>Data Already Exists : </strong> User Already added data to databese...!
                                        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                </div>";
                    }


                }
                else{
                    return  "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                                <strong>ERROR : </strong> While Uploading Data...!
                                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                        </div>";
                }
            }else{
                return  "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                        <strong>Image ERROR : </strong> Image File is too large...!
                        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                </div>";
            }
        }
        else{
            return  "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                            <strong>Image ERROR : </strong> Image File Not supported...!
                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                    </div>";
        }

    }

    function chdata_add($ch_img, $ch_temp, $chimg_size, $ch_name, $ch_desc){
        $con = Connection();

        $login_email = strval($_SESSION['loginSession']);

        $target_dir = "images/";

        $img_ch = basename($ch_img);
        $target_path = $target_dir . $ch_img;
        $chimg_type = pathinfo($target_path, PATHINFO_EXTENSION);


        $allow_images = array('jpg','png','jpeg','gif');
        if(in_array($chimg_type, $allow_images)){
            if($chimg_size < 10000000){
                if(move_uploaded_file($ch_temp, $target_path)){
                    $check_data = "SELECT * FROM user_ch_tbl WHERE email = '$login_email'";
                    $check_result = mysqli_query($con, $check_data);
                    $check_nor = mysqli_num_rows($check_result);

                    if($check_nor == 0){
                        $insert_bio = "INSERT INTO user_ch_tbl(email,ch_img,ch_name,ch_desc,add_at,update_at)VALUES('$login_email','$img_ch','$ch_name','$ch_desc',NOW(),NOW())";
                        $insert_result = mysqli_query($con, $insert_bio);
    
                        $select = "SELECT * FROM user_tbl WHERE email = '$login_email'";
                        $select_result = mysqli_query($con, $select);
                        $select_row = mysqli_fetch_assoc($select_result);

                        $update_data = "UPDATE user_tbl SET channel_status = '1' WHERE email = '$login_email'";
                        $update_data_result = mysqli_query($con, $update_data);
    
                        if($select_row['user_type'] == 'admin'){
                            header("location:admin.php");
                        }
                        else if($select_row['user_type'] == 'user'){
                            header("location:user.php");
                        }
                    }
                    else{
                        return  "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                                        <strong>Data Already Exists : </strong> User Already added data to databese...!
                                        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                </div>";
                    }


                }
                else{
                    return  "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                                <strong>ERROR : </strong> While Uploading Data...!
                                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                        </div>";
                }
            }else{
                return  "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                        <strong>Image ERROR : </strong> Image File is too large...!
                        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                </div>";
            }
        }
        else{
            return  "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                            <strong>Image ERROR : </strong> Image File Not supported...!
                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                    </div>";
        }
    }


    function view_user_bio(){
        $con = Connection();

        $login_email = strval($_SESSION['loginSession']);

        $select_user_bio = "SELECT * FROM user_bio_tbl WHERE email = '$login_email'";
        $user_bio_result = mysqli_query($con, $select_user_bio);
        $user_bio_row = mysqli_fetch_assoc($user_bio_result);

        $select_data = "SELECT * FROM user_tbl WHERE email = '$login_email'";
        $select_result = mysqli_query($con, $select_data);
        $select_row = mysqli_fetch_assoc($select_result);

        $user_pro_img = 'images/'. $user_bio_row['p_img'];

        $user_bio_view = "
            <h4>User Profile Image : </h4>
            <img src='".$user_pro_img."' class='profile-imgs'><br><br>

            <p><h4>Username : ". $select_row['username']. "</h4></p></p>
            <p><h4>First Name : ". $user_bio_row['fname']. "</h4></p></p>
            <p><h4>Last Name : ". $user_bio_row['lname']. "</h4></p></p>
            <p><h4>Address : ". $user_bio_row['user_address']. "</h4></p></p>
            <br>
            <hr>

            <a href=''><button class='jkbtn jkbtn-blue'>Edit Data</button></a>
            
        ";

        echo $user_bio_view;
    }

    function view_ch_data(){
        $con = Connection();

        $login_email = strval($_SESSION['loginSession']);

        $select_ch_bio = "SELECT * FROM user_ch_tbl WHERE email = '$login_email'";
        $user_ch_result = mysqli_query($con, $select_ch_bio);
        $user_ch_row = mysqli_fetch_assoc($user_ch_result);

        $user_ch_img = 'images/'. $user_ch_row['ch_img'];

        $user_ch_view = "
            <h4>User Profile Image : </h4>
            <img src='".$user_ch_img."' class='profile-imgs'><br><br>

            <p><h4>Channel Name : ". $user_ch_row['ch_name']. "</h4></p></p>
            <p><h4>Channel Description : ". $user_ch_row['ch_desc']. "</h4></p></p>
            <p><h4>Created Date : ". $user_ch_row['add_at']. "</h4></p></p>
            <br>
            <hr>

            <a href=''><button class='jkbtn jkbtn-blue'>Edit Data</button></a>
            <a href='my_channel.php?id=".$login_email."'><button class='jkbtn jkbtn-green'>View Channel</button></a>
            
        ";

        echo $user_ch_view;
    }

    function new_admin_add($username, $email, $pass){
        $con = Connection();

        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            return  "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                    <strong>Email : </strong> invalid Email...!
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>";
        }

        $check_admin = "SELECT * FROM user_tbl WHERE username='$username'";
        $check_result = mysqli_query($con, $check_admin);
        $check_admin_nor = mysqli_num_rows($check_result);

        if($check_admin_nor == 0){
            $insert_admin = "INSERT INTO user_tbl(username,email,user_pass,user_type,is_active,is_un_access,channel_status,bio_status,join_at,update_at)VALUES('$username','$email','$pass','admin','1','0','0','0',NOW(),NOW())";
            $insert_result = mysqli_query($con, $insert_admin);

            header("location:../admin.php");
        }
        else{
            return  "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                            <strong>User : </strong> Already exists...!
                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                    </div>";
        }
    }

    function login_data(){
        $con = Connection();
        $login_email = strval($_SESSION['loginSession']);

        if(!empty($_SESSION['loginSession'])){
            $select_user = "SELECT * FROM user_tbl WHERE email = '$login_email'";
            $select_result = mysqli_query($con, $select_user);
            $select_row = mysqli_fetch_assoc($select_result);

            $login_username = $select_row['username'];
            $login_roll = $select_row['user_type'];

            $inset_login_data = "INSERT INTO login_data_tbl(username,email,user_type,login_at)VALUES('$login_username','$login_email','$login_roll',NOW())";
            $login_data_result = mysqli_query($con, $inset_login_data);            

        }else{
            return false;
        }
    }

    function view_login_data(){
        $con = Connection();
        
        $select_logins = "SELECT * FROM login_data_tbl";
        $logins_result = mysqli_query($con, $select_logins);

        while($row = mysqli_fetch_assoc($logins_result)){
            $view_logins = "
                <tr>
                    <td>".$row['username']."</td>
                    <td>".$row['email']."</td>
                    <td>".$row['user_type']."</td>
                    <td>".$row['login_at']."</td>
                </tr>
            ";

            echo $view_logins;
        }
    }

    function cout_all_users(){
        $con = Connection();

        $select_users = "SELECT * FROM user_tbl";
        $users_result = mysqli_query($con, $select_users);
        $users_nor = mysqli_num_rows($users_result);
        echo $users_nor;
    }

    function cout_admins(){
        $con = Connection();

        $select_users = "SELECT * FROM user_tbl WHERE user_type = 'admin'";
        $users_result = mysqli_query($con, $select_users);
        $admin_nor = mysqli_num_rows($users_result);
        echo $admin_nor;
    }

    function cout_users(){
        $con = Connection();

        $select_users = "SELECT * FROM user_tbl WHERE user_type = 'user'";
        $users_result = mysqli_query($con, $select_users);
        $user_nor = mysqli_num_rows($users_result);
        echo $user_nor;
    }

    function cout_users_suspended(){
        $con = Connection();

        $select_users = "SELECT * FROM user_tbl WHERE user_type = 'user' && is_un_access = '1'";
        $users_result = mysqli_query($con, $select_users);
        $user_sus_nor = mysqli_num_rows($users_result);
        echo $user_sus_nor;
    }

    function view_my_channel(){
        $con = Connection();
        $login_email = strval($_SESSION['loginSession']);

        $check_ch = "SELECT * FROM user_ch_tbl WHERE email = '$login_email'";
        $check_result = mysqli_query($con, $check_ch);
        $check_row = mysqli_fetch_assoc($check_result);

        $user = "SELECT * FROM user_tbl WHERE email='$login_email'";
        $result = mysqli_query($con, $user);
        $user_row = mysqli_fetch_assoc($result);

        $ch_img = 'images/'. $check_row['ch_img'];

        $my_channel = "
            <img src='".$ch_img."'><br><br>
            <h4>Channel Name : ".$check_row['ch_name']."</h4>
            <hr>
            <h4>Channel Subscribers : </h4>

            <h2>Videos : </h2>
            <a href='video/create.php'><button class='jkbtn jkbtn-blue'><i class='fas fa-plus'></i> Add New Videos</button></a>

        ";

        echo $my_channel;
    }

    function add_new_video($video, $video_temp, $vid_title, $vid_tag, $vid_desc, $vid_status){
        $con = Connection();

        $login_email = strval($_SESSION['loginSession']);

        $target_dir = "../videos/";

        $added_vid = basename($video);
        $target_path = $target_dir . $added_vid;
        $vid_type = pathinfo($target_path, PATHINFO_EXTENSION);

        $allowed_types = array('mp4','MOV');
        if(in_array($vid_type, $allowed_types)){
            if(move_uploaded_file($video_temp, $target_path)){
                $insert_vid = "INSERT INTO videos_tbl(email,video,vid_title,vid_tag,vid_desc,is_public,add_at,update_at)VALUES('$login_email','$added_vid','$vid_title','$vid_tag','$vid_desc','$vid_status',NOW(),NOW())";
                $vid_result = mysqli_query($con, $insert_vid);

                header("location:../my_channel.php");
            }
            else{
                return  "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                        <strong>ERROR : </strong> While Uploading Data...!
                        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                </div>";
            }
        }else{
            return  "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                            <strong>ERROR : </strong> This Type not valied...!
                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                    </div>";
        }
    }

    function public_videos(){
        $con = Connection();
        $login_email = strval($_SESSION['loginSession']);

        $select_vid = "SELECT * FROM videos_tbl WHERE email = '$login_email' && is_public = '1'";
        $select_result = mysqli_query($con, $select_vid);
        
        while($video_row = mysqli_fetch_assoc($select_result)){
            $video_view = "                          


            <div class='col-auto' style='margin-bottom:20px;'>
                <a href='video/video_info.php?id=".$video_row['id']."'>
                    <div class='card-body'>
                        <video src='videos/".$video_row['video']."' class='vid-small'></video>
                        <div class='title-video'>
                            <span class='title' >Video Title : ".$video_row['vid_title']."</span>
                        </div>
                    </div>
                </a>
            </div>   
            ";

            echo $video_view;
        }
    }

    function private_videos(){
        $con = Connection();

        $login_email = strval($_SESSION['loginSession']);

        $select_vid = "SELECT * FROM videos_tbl WHERE email = '$login_email' && is_public = '0'";
        $select_result = mysqli_query($con, $select_vid);
        
        while($video_row = mysqli_fetch_assoc($select_result)){
            $video_view = " 
            <div class='col-auto' style='margin-bottom:20px;'>
                <a href='video/video_info.php?id=".$video_row['id']."'>
                    <div class='card-body'>
                        <video src='videos/".$video_row['video']."' class='vid-small'></video>
                        <div class='title-video'>
                            <span class='title' >Video Title : ".$video_row['vid_title']."</span>
                        </div>
                    </div>
                </a>
            </div>   
            ";

            echo $video_view;
        }
    }

    function search_videos($video){
        $con = Connection();

        $_SESSION['video_search'] = $video;
    }

    function view_videos(){
        $con = Connection();

        $video_s = strval($_SESSION['video_search']);

        $search_vid = "SELECT * FROM videos_tbl WHERE vid_tag = '$video_s' && is_public = 1";
        $search_result = mysqli_query($con, $search_vid);
        $search_nor = mysqli_num_rows($search_result);

        if($search_nor != 0){
            while($row = mysqli_fetch_assoc($search_result)){
                $video_view = " 
                <div class='col-auto' style='margin-bottom:20px; text-decoration: none;'>
                    <a href='lib/routes/video/video_info.php?id=".$row['id']."'>
                        <div class='card-body'>
                            <video src='lib/routes/videos/".$row['video']."' class='vid-small'></video>
                            <div class='title-video'>
                                <h3>".$row['vid_title']."</h3>
                            </div>
                        </div>
                    </a>
                </div>   
                ";
                echo $video_view;
            }
        }
        else if($search_nor == 0){
            echo  "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                        <strong>No Videos Found: </strong> According to your search There are no Videos
                        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                </div>";
        }

    }

    function all_vides(){
        $con = Connection();

        $all_videos = "SELECT * FROM videos_tbl WHERE is_public = 1 ";
        $all_videos_result = mysqli_query($con, $all_videos);

        while($row = mysqli_fetch_assoc($all_videos_result)){
            $video_view = " 
            <div class='col-auto' style='margin-bottom:20px; text-decoration: none;'>
                <a href='lib/routes/video/video_info.php?id=".$row['id']."'>
                    <div class='card-body'>
                        <video src='lib/routes/videos/".$row['video']."' class='vid-small'></video>
                        <div class='title-video'>
                            <h3>".$row['vid_title']."</h3>
                        </div>
                    </div>
                </a>
            </div>   
            ";

            echo $video_view;
        }
    }

    function to_dashboard(){
        $con = Connection();

        $login_email = strval($_SESSION['loginSession']);

        $select_user = "SELECT * FROM user_tbl WHERE email = '$login_email'";
        $select_result = mysqli_query($con, $select_user);
        $select_row = mysqli_fetch_assoc($select_result);

        if($select_row['user_type'] == "admin"){
            echo "<a href='lib/routes/admin.php'><button class='jkbtn jkbtn-green'><i class='fas fa-tachometer-alt'></i> To Dashboard</button></a>";
        }
        elseif($select_row['user_type'] == "user"){
            echo "<a href='lib/routes/user.php'><button class='jkbtn jkbtn-green'><i class='fas fa-tachometer-alt'></i> To Dashboard</button></a>";
        }

    }



?>