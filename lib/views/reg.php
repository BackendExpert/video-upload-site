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

                            <label for="username">Username : </label><br>
                            <input type="text" name="username" id="" class="form-control" required><br>

                            <label for="pass">Password : </label><br>
                            <input type="password" name="password" id="" class="form-control" required><br>

                            <label for="pass">Password : </label><br>
                            <input type="password" name="password" id="" class="form-control" required><br>
                            
                            <div class="row">
                                <div class="col-lg-6">
                                    <input type="reset" value="CLear" class="btn btn-secondary">
                                </div>
                                <div class="col-lg-6">
                                    <input type="submit" value="SignUp" class="btn btn-success" name="signup_user">
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