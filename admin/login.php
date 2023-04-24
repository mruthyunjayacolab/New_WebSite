<?php
session_start();
?>
<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> News Way</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="logo.png">
    <link rel="shortcut icon" href="logo.png">


    <link rel="stylesheet" href="vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="vendors/selectFX/css/cs-skin-elastic.css">

    <link rel="stylesheet" href="assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>



</head>

<body class="bg-dark">


    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
                <div class="login-logo">
                        
                </div>
                <div class="login-form">
                    <center><img class="align-content" src="logo.png" alt=""></center>
                    <br>
                    <?php
                        if (isset($_SESSION['success'])) {
                            ?>
                            <div class="alert alert-success"><?= $_SESSION['success'];?></div>
                            <?php
                            unset($_SESSION['success']);
                        }
                        elseif (isset($_SESSION['error'])) {
                            ?>
                            <div class="alert alert-danger"><?= $_SESSION['error'];?></div>
                            <?php
                            unset($_SESSION['error']);
                        }
                        ?>
                    <form action="validate.php" method="post">
                        <div class="form-group">
                            <label>User Name</label>
                            <input type="text" name="username" class="form-control" placeholder="User Name">
                        </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control" placeholder="Password">
                        </div>
                        <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30">Sign in</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <script src="vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="assets/js/main.js"></script>


</body>

</html>
