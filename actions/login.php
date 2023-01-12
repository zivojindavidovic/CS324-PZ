<?php

include "connection.php";

$username = $mysqli->real_escape_string(strip_tags($_POST["username"]));
$password = $mysqli->real_escape_string(strip_tags($_POST["password"]));

$sql = "SELECT * FROM users WHERE username = '$username'";
$result = $mysqli->query($sql);

if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();

    if (password_verify($password, $row['password'])) {
        $_SESSION['loggedIn'] = TRUE;
        $_SESSION['username'] = $row['username'];
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['fullname'] = $row['fullname'];

        header("location: ../dashboard.php");
    } else {
        $_SESSION['error'] = "Username or Password is incorrect!";
        header("location: ../signIn.php");
    }
} else {
    $_SESSION['error'] = "Username or Password is incorrect!";
    header("location: ../signIn.php");
}