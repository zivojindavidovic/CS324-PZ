<?php include "actions/connection.php"; ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <title>Account</title>
</head>
<body>
    <div class='main'>
        <div class="account-details">
            <table>
                <tr>
                    <td>Full Name</td>
                    <td><?php echo $_SESSION['fullname']; ?></td>
                </tr>
                <tr>
                    <td>Username</td>
                    <td><?php echo $_SESSION['username']; ?></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><?php echo $_SESSION['email']; ?></td>
                </tr>
            </table>
            <form action="actions/deleteAccount.php" method="POST">
                <button type="submit" name="deleteAccount">Delete Account</button>
            </form>
            <div class="notification">
                <?php
                if(isset($_SESSION['errorDeletingAccount'])){
                    ?>
                <p><?php $_SESSION['errorDeletingAccount']?></p>
                <?php }
                ?>
            </div>
        </div>
    </div>
</body>
</html>