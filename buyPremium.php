<?php include "actions/connection.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buy Premium</title>
    <style>
        body {
            width: 100%;
            height: 100vh;
            background-image: url("images/register.jpg");
            background-size: cover;
        }

        .body {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            height: 90%;
        }

        .card-group {
            width: 50%;
            height: 50%;
            background-color: aliceblue;
            display: flex;

        }

        .card {
            background-color: white;
            flex: 1;
            border: 1px solid black;
            display: flex;
            flex-direction: column;
        }

        .header {
            height: 70px;
            text-align: center;
            text-transform: uppercase;
        }

        .price {
            flex: 1;
            text-align: center;
        }

        .price p {
            margin-top: 50px;
            font-size: 24px;
        }

        .price input[type=submit] {
            padding: 10px;
            border: 0;
            border-radius: 2px;
            background-color: rgb(1, 23, 34);
            color: white;
        }

        .price input[type=submit]:hover {
            background-color: rgba(1, 23, 34, 0.8);
            color: white;
        }

        .description {
            flex: 1;
        }

        .description h4 {
            text-align: center;
        }

        .description p {
            margin-left: 10px;
            color: black;
            text-transform: uppercase;
        }

        .nav {
            text-align: center;
            color: white;
        }

        .nav a {
            text-decoration: none;
            color: gray;
        }

        .notifications {
            max-width: 400px;
            margin: auto;
            background-color: white;
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="nav">
        <p>
            Still don't want to upgrade your account?
            <a href="dashboard.php">Go back to YOUR PAGE</a>
        </p>
    </div>
    <div class="body">
        <div class="card-group">
            <div class="card">
                <div class="header">
                    <h3>Two Uploads</h3>
                </div>
                <div class="price">
                    <p>10$</p>
                    <form action="actions/upgradePremium.php" method="POST">
                        <input type="submit" name="level1" value="Buy Package 1">
                    </form>
                </div>
                <div class="description">
                    <h4>Description</h4>
                    <p>-Upload Images</p>
                    <p>-Upload Audio Files</p>
                </div>
            </div>
            <div class="card">
                <div class="header">
                    <h3>Three Uploads</h3>
                </div>
                <div class="price">
                    <p>20$</p>
                    <form action="actions/upgradePremium.php" method="POST">
                        <input type="submit" name="level2" value="Buy Package 2">
                    </form>
                </div>
                <div class="description">
                    <h4>Description</h4>
                    <p>-Upload Images</p>
                    <p>-Upload Audio Files</p>
                    <p>-Upload Text Files</p>
                </div>
            </div>
            <div class="card">
                <div class="header">
                    <h3>Four Uploads</h3>
                </div>
                <div class="price">
                    <p>30$</p>
                    <form action="actions/upgradePremium.php" method="POST">
                        <input type="submit" name="level3" value="Buy Package 3">
                    </form>
                </div>
                <div class="description">
                    <h4>Description</h4>
                    <p>-Upload Images</p>
                    <p>-Upload Audio Files</p>
                    <p>-Upload Text Files</p>
                    <p>-Upload Video Files</p>
                </div>
            </div>
        </div>
    </div>

    <div class="notifications">
        <?php

        if (isset($_SESSION['didntExpired'])) {
            echo $_SESSION['didntExpired'];
            unset($_SESSION['didntExpired']);
        }

        if(isset($_SESSION['successfullUpgrade'])){
            echo $_SESSION['successfullUpgrade'];
            unset($_SESSION['successfullUpgrade']);
        }

        if(isset($_SESSION['upgradeError'])){
            echo $_SESSION['upgradeError'];
            unset($_SESSION['upgradeError']);
        }

        if(isset($_SESSION['successfullUpdated'])){
            echo $_SESSION['successfullUpdated'];
            unset($_SESSION['successfullUpdated']);
        }

        if(isset($_SESSION['renewError'])){
            echo $_SESSION['renewError'];
            unset($_SESSION['renewError']);
        }
        ?>
    </div>
</body>

</html>