<?php
require_once("../includes/initialize.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">


    <title>Midway Minkay Restobar and Catering Services</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/signin.css" rel="stylesheet">

    <link rel="icon" type="image/png" href="<?php echo WEB_ROOT; ?>favicon_midway-modified.png">
</head>
<style>
    body {
        background-image: url('<?php echo WEB_ROOT; ?>images_copy/cover-photo.jpg');
        background-size: 100vw 100vh;
        background-repeat: no-repeat;
    }
</style>
<body>
    <?php
    if (admin_logged_in()) {
    ?>
        <script type="text/javascript">
            redirect('progressbar.php');
        </script>
        <?php
    }
    if (isset($_POST['btnlogin'])) {
        //form has been submitted1

        $uname = trim($_POST['email']);
        $upass = trim($_POST['password']);

        $h_upass = sha1($upass);
        //check if the email and password is equal to nothing or null then it will show message box
        if ($uname == '' or $upass == '') {
        ?> <script type="text/javascript">
                alert("Invalid Username and Password!");
            </script>
            <?php

        } else {
            //it creates a new objects of member
            $user = new User();
            //make use of the static function, and we passed to parameters
            $res = $user::AuthenticateUser($uname, $h_upass);
            //then it check if the function return to true
            if ($res == true) {
            ?> <script type="text/javascript">
                    //then it will be redirected to home.php
                    window.location = "index.php";
                </script>
            <?php


            } else {
            ?> <script type="text/javascript">
                    alert("Username or Password Not Registered! Contact Your administrator.");
                    window.location = "index.php";
                </script>
    <?php
            }
        }
    } else {

        $email = "";
        $upass = "";
    }

    ?>
    <div class="container">

        <div class="row">
            <div style="position: absolute; top: 20px; left: 20px; padding: 10px; background-color: #fff; border-radius: 10px;">
                <a href="<?php echo WEB_ROOT; ?>index.php" title="Midway Minkay">
                    <img src="<?php echo WEB_ROOT; ?>admin/images/logo_minkay.png" alt="Midway Minkay" style="border-radius: 10px;">
                </a>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Please Sign In</h3>
                    </div>
                    <div class="panel-body">
                    <form role="form" method="POST" action="login.php">
                        <fieldset>
                            <div class="form-group">
                                <input class="form-control" placeholder="Username" name="email" type="text" autofocus>
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Password" name="password" type="password" id="passwordField" value="">
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input name="remember" type="checkbox" id="showPasswordCheckbox" onchange="togglePassword()"> Show Password
                                </label>
                            </div>
                            <button type="submit" name="btnlogin" class="btn btn-lg btn-success btn-block">Login</button>
                        </fieldset>
                    </form>
                    <script>
                        function togglePassword() {
                            var passwordField = document.getElementById("passwordField");
                            var showPasswordCheckbox = document.getElementById("showPasswordCheckbox");

                            if (showPasswordCheckbox.checked) {
                                passwordField.type = "text";
                            } else {
                                passwordField.type = "password";
                            }
                        }
                    </script>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
</body>

</html>