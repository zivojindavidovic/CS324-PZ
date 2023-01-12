<?php
include "actions/connection.php";
if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn']) {
    header("location: dashboard.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Sign In</title>
</head>

<body>
    <div class="image">

    </div>
    <div class="register-form">
        <div class="signup-header">
            <h1>Sign In</h1>
        </div>
        <div class="form">
            <form action="actions/login.php" method="POST">
                <label for="username">Username</label>
                <input type="text" id="username" name="username">
                <label for="password">Password</label>
                <input type="password" id="password" name="password">
                <input type="submit" value="Sign In">
                <a href="index.php">Sign Up &#8594</a>
            </form>
            <div class="error">
                <?php if (isset($_SESSION['error'])) { ?>

                <p>
                    <?php echo $_SESSION['error'] ?>
                </p>
                <?php

                    unset($_SESSION['error']);

                } ?>

                <?php if (isset($_SESSION['message'])) { ?>

                <p>
                    <?php echo $_SESSION['message'] ?>
                </p>
                <?php

                    unset($_SESSION['message']);

                } ?>
            </div>
        </div>

    </div>
</body>

</html>