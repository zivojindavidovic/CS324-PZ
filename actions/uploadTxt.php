<?php

include "connection.php";

$path = "../uploads/" . md5($_SESSION['username']) . "/";
$target_file = $path . basename($_FILES['text']['name']);
$uploadOk = 1;
$fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

if($fileType == "txt" || $fileType == "docx"){
    $uploadOk = 1;
}else{
    $uploadOk = 0;
}

if($_FILES['text']['size'] > 5000000){
    $uploadOk = 0;
}

if($uploadOk = 0){
    $_SESSION['fileNotUploaded'] = "Your file is not uploaded";
    header("location: ../dashboard.php");
}else{
    if($uploadImage = move_uploaded_file($_FILES['text']['tmp_name'], $target_file)){
        $_SESSION['message'] = "You successfully uploaded image!";
        header("location: ../dashboard.php");
    }else{
        $_SESSION['fileNotUploaded'] = "Your file is not uploaded";
        header("location: ../dashboard.php");
    }
}