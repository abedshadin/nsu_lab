<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
    <title>
        Registration system PHP and MySQL
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css"
                    href="style.css">
</head>

<body>
    <div class="header">
        <h2>Register</h2>
    </div>
<div class="log">
    <form method="post" action="register.php">

        <?php include('errors.php'); ?>

        <div class="input-group">
            <label>Enter ID</label>
            <input type="text" name="username"
                value="<?php echo $username; ?>">
        </div>
        <!-- <div class="input-group">
            <label>Email</label>
            <input type="email" name="email"
                value="<?php echo $email; ?>">
        </div>
        <div class="input-group">
            <label>Phone Number</label>
            <input type="text" name="num"
              >
        </div> -->

        <div class="input-group">
            <label>Enter Password</label>
            <input type="password" name="password_1">
        </div>
        <div class="input-group">
            <label>Confirm password</label>
            <input type="password" name="password_2">
        </div>
        <div class="input-group">
            <button type="submit" class="btn"
                                name="reg_user">
                Register
            </button>
        </div>



<p>
            Already having an account?
            <a href="login.php">
                Login Here!
            </a>
        </p>



    </form>
    </div>
</body>
</html>
