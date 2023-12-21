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
                        <i class="fas fa-user"></i> Login Here
                    </div>
                    <div class="card-body">
                        <form action="" method="post">
                            <label for="username">Username : </label><br>
                            <input type="text" name="username" id="" class="form-control" required><br>

                            <label for="pass">Password : </label><br>
                            <input type="password" name="password" id="" class="form-control" required><br>

                            <input type="submit" value="Login" class="jk-btn jk-green" name="login_user" style="width:100%;">
                        </form>
                        <br>
                        <a href="">forgent Password ?</a><br>
                        Don't have an Account ? <a href="reg.php">SignUp</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3"></div>
        </div>
    </div>
</div>

<script src="../../js/script.js"></script>