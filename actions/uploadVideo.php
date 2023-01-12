<?php

include "connection.php";

$path = "../uploads/" . md5($_SESSION['username']) . "/";
$target_file = $path . basename($_FILES['video']['name']);
$uploadOk = 1;
$videoFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

if($videoFileType == "mp4"){
    $uploadOk = 1;
}else{
    $uploadOk = 0;
}

if($_FILES['video']['size'] > 40000000){
    $uploadOk = 0;
}

if($uploadOk == 0){
    $_SESSION['fileNotUploaded'] = "Your file is not uploaded";
    header("location: ../dashboard.php");
}else{
    if($uploadImage = move_uploaded_file($_FILES['video']['tmp_name'], $target_file)){
        $_SESSION['message'] = "You successfully uploaded video!";
        header("location: ../dashboard.php");
    }else{
        $_SESSION['fileNotUploaded'] = "Your file is not uploaded";
        header("location: ../dashboard.php");
    }
}