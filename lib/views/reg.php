<?php 
    include("../function/function.php");
    include("../layouts/header.php");
?>
<link rel="stylesheet" href="../../css/style.css">

<div class="container">
    <div class="form-login">
        <div class="row">
            <div class="col-lg-3"></div>
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <i class="fas fa-user-plus"></i> SignUp Here
                    </div>
                    <div class="card-body">
                        <?php 
                            if(isset($_POST['signup_user'])){
                                $result = sign_up($_POST['username'],$_POST['email'],md5($_POST['password']),md5($_POST['cpassword']));
                                echo $result;
                            }
                        ?>
                        <form action="" method="post">
                            <label for="username">Username : </label><br>
                            <input type="text" name="username" id="" class="form-control" required><br>

                            <label for="username">Email : </label><br>
                            <input type="email" name="email" id="" class="form-control" required><br>

                            <label for="pass">Password : </label><br>
                            <input type="password" name="password" id="" class="form-control" required><br>

                            <label for="pass">Confirm Password : </label><br>
                            <input type="password" name="cpassword" id="" class="form-control" required><br>
                            
                            <div class="row">
                                <div class="col-lg-6">
                                    <input type="reset" value="CLear" class="jkbtn jkbtn-gray" style="width:100%;">
                                </div>
                                <div class="col-lg-6">
                                    <input type="submit" value="SignUp" class="jkbtn jkbtn-green" name="signup_user" style="width:100%;">
                                </div>
                            </div>

                        </form>
                        <br>
                        Already have an Account ? <a href="login.php">SignIn</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3"></div>
        </div>
    </div>
</div>

<script src="../../js/script.js"></script>