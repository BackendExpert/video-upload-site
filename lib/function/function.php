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
                        header("location:../../index.php");
                    }
                    elseif($check_login_user_row['user_type'] == 'admin'){
                        setcookie('login',$check_login_user_row['email'],time()+60*60,'/');
                        $_SESSION['loginSession'] = $check_login_user_row['email'];
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

    function update_bio(){
        $con = Connection();
    }

    function update_channel_info(){
        $con = Connection();
    }

    function search_videos($video, $vid_len, $vid_qulty){
        $con = Connection();

        // echo $video, $vid_len, $vid_qulty;
    }

?>