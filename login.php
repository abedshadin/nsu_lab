<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
    <title>
        Login and Registration
        System - LAMP Stack
    </title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css"
            href="style.css">
</head>
<body>
    <div class="header">
        <h2>Login Here!</h2>
    </div>
<div class="log">
    <form method="post" action="login.php">
<div class="error">

</div>
        <?php include('errors.php'); ?>

        <div class="input-group">
            <label>Enter ID</label>
            <input type="text" name="username" >
        </div>
        <div class="input-group">
            <label>Enter Password</label>
            <input type="password" name="password">
        </div>
        <div class="input-group">
            <button type="submit" class="btn"
                        name="login_user">
                Login
            </button>
        </div>



<p>
            New Here?
            <a href="register.php">
                Click here to register!
            </a>
        </p>



    </form>
    </div>
</body>

</html>
