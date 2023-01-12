<?php

include "connection.php";

$fullname = $mysqli->real_escape_string(strip_tags($_POST['fullname']));
$email = $mysqli->real_escape_string(strip_tags($_POST['email']));
$username = $mysqli->real_escape_string(strip_tags($_POST['username']));
$password = $mysqli->real_escape_string(strip_tags($_POST['password']));
$repeatPassword = $mysqli->real_escape_string(strip_tags($_POST['repeat-password']));

$sql = "SELECT * FROM users WHERE username = '$username'";
$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
    $_SESSION['usernameExists'] = "Username already exists";
    header("location: ../index.php");
} else {
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = $mysqli->query($sql);

    if ($result->num_rows > 0) {
        $_SESSION['emailExists'] = "Email is already registered";
        header("location: ../index.php");
    } else {
        if (empty($password)) {
            $_SESSION["emptyPassword"] = "Your Password can not be empty!";
            header("location: ../index.php");
        } else {
            if ($password == $repeatPassword) {

                $password = password_hash($password, PASSWORD_BCRYPT);
                $sql = "INSERT INTO users (fullname, email, username, password) VALUES ('$fullname', '$email', '$username', '$password')";

                if ($mysqli->query($sql)) {
                    $_SESSION['message'] = "Account successfully created!";
                    mkdir("../uploads/" . md5($username) . "/", 0777, true);
                    header("location: ../signIn.php");
                } else {
                    echo "Error while creating your account";
                }

            } else {
                $_SESSION['rPasswordError'] = "Your passwords don't match";
                header("location: ../index.php");
            }

        }

    }

}