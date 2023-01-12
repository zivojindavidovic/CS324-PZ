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
    <title>Sign Up</title>
</head>

<body>
    <div class="image">

    </div>
    <div class="register-form">
        <div class="signup-header">
            <h1>Sign Up</h1>
        </div>
        <div class="form">
            <form action="actions/register.php" method="POST">
                <label for="name">Full Name</label>
                <input type="text" id="name" name="fullname">
                <label for="email">Email</label>
                <input type="email" id="email" name="email">
                <div class="regErrors">
                    <?php if (isset($_SESSION['emailExists'])) { ?>
                    <p>
                        <?php echo $_SESSION['emailExists'] ?>
                    </p>
                    <?php
                        unset($_SESSION['emailExists']);
                    } ?>
                </div>
                <label for="username">Username</label>
                <input type="text" id="username" name="username">
                <div class="regErrors">
                    <?php if (isset($_SESSION['usernameExists'])) { ?>
                    <p>
                        <?php echo $_SESSION['usernameExists'] ?>
                    </p>
                    <?php
                        unset($_SESSION['usernameExists']);
                    } ?>
                </div>
                <label for="password">Password</label>
                <input type="password" id="password" name="password">
                <div class="regErrors">
                    <?php if (isset($_SESSION['emptyPassword'])) { ?>
                    <p>
                        <?php echo $_SESSION['emptyPassword']
                            ?>
                    </p>
                    <?php
                        unset($_SESSION['emptyPassword']);
                    } ?>
                </div>
                <label for="repeat-password">Repeat Password</label>
                <input type="password" id="repeat-password" name="repeat-password">
                <div class="regErrors">
                    <?php if (isset($_SESSION['rPasswordError'])) { ?>
                    <p>
                        <?php echo $_SESSION['rPasswordError'] ?>
                    </p>
                    <?php
                    unset($_SESSION['rPasswordError']);
                } ?>
                </div>
                <input type="submit" value="Sign Up">
                <a href="signIn.php">Sign in &#8594</a>
                <div class="deleteAccount">
                    <?php if(isset($_SESSION['accountDeleted'])){?>
                    <p><?php echo $_SESSION['accountDeleted']?></p>
                    <?php } ?>
                </div>
            </form>
        </div>
    </div>
</body>

</html>