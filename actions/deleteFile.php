<?php
include "connection.php";

if(isset($_REQUEST['file'])){
    $file = urldecode($_REQUEST['file']);
    $path = "../uploads/" . md5($_SESSION['username']) . "/" . $file;
    if(!unlink($path)){
        $_SESSION['deleteError'] = "Error while deleting this file";
        header("location: ../dashboard.php");
    }else{
        $_SESSION['deleted'] = "You have successfully deleted your file";
        header("location: ../dashboard.php");
    }
}


