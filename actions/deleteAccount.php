<?php

include "connection.php";

$activeUser = $_SESSION['username'];

$sql = "DELETE FROM users WHERE username = '$activeUser'";
$dirName = "../uploads/" . md5($_SESSION['username']);

if($mysqli->query($sql)){
    $_SESSION['loggedIn'] = FALSE;
    $_SESSION['accountDeleted'] = "You successfully deleted your account!";
    rmdir($dirName);
    header('location: ../index.php');
}
else{
    $_SESSION['errorDeletingAccount'] = "There is an error while deleting your account";
    header('location: ../account.php');
}