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

        $check_login_user = "SELECT * FROM user_tbl WHERE username = '$username' && user_pass = '$pass'";
        $check_login_user_result = mysqli_query($con, $check_login_user);
        $check_login_user_nor = mysqli_num_rows($check_login_user_result);
        $check_login_user_row = mysqli_fetch_assoc($check_login_user_result);

        if($check_login_user_row['is_un_access'] == 0){
            echo "deactive User";
        }
        else{
            if($check_login_user_row['is_active'] == 1){
                if($pass == $check_login_user_row['user_pass']){
                    if(($check_login_user_row['user_type'] == 'user')){
                        setcookie('login',$check_login_user_row['email'],time()+60*60,'/');
                        $_SESSION['loginSession'] = $check_login_user_row['email'];
                        header("location:../routes/user.php");
                    }
                    elseif($check_login_user_row['user_type'] == 'admin'){
                        setcookie('login',$check_login_user_row['email'],time()+60*60,'/');
                        $_SESSION['loginSession'] = $check_login_user_row['email'];
                        header("location:../routes/admin.php");
                    }
                }
                else{
                    return "<center>&nbsp<div class='alert alert-danger col-10' role='alert'>Password is Doesn't Match...!</div>&nbsp</center>"; 
                }
            }
            else{
                return "<center>&nbsp<div class='alert alert-danger col-10' role='alert'>No recodes found..!</div>&nbsp</center>"; 
            }
        }

        // if($check_login_user_nor > 0){
        //     if($pass == $check_login_user_row['user_pass']){
        //         if(($check_login_user_row['user_type'] == 'user')){
        //             setcookie('login',$check_login_user_row['email'],time()+60*60,'/');
        //             $_SESSION['loginSession'] = $check_login_user_row['email'];
        //             header("location:lib/routes/user.php");
        //         }
        //         elseif($check_login_user_row['user_type'] == 'admin'){
        //             setcookie('login',$check_login_user_row['email'],time()+60*60,'/');
        //             $_SESSION['loginSession'] = $check_login_user_row['email'];
        //             header("location:lib/routes/admin.php");
        //         }
        //     }
        //     else{
        //         return "<center>&nbsp<div class='alert alert-danger col-10' role='alert'>Password is Doesn't Match...!</div>&nbsp</center>"; 
        //     }
        // }
        // else{
        //     return "<center>&nbsp<div class='alert alert-danger col-10' role='alert'>No recodes found..!</div>&nbsp</center>"; 
        // }

        
    }

    function search_videos($video, $vid_len, $vid_qulty){
        $con = Connection();

        // echo $video, $vid_len, $vid_qulty;
    }

?>