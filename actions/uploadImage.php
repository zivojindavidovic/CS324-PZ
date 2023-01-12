<?php

include "connection.php";

$path = "../uploads/" . md5($_SESSION['username']) . "/";
$target_file = $path . basename($_FILES['image']['name']);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

#check if image is image
$check = getimagesize($_FILES['image']['tmp_name']);
if($check !== false){
    $uploadOk = 1;
}else{
    $uploadOk = 0;
}

#check image extension
if($imageFileType == 'jpg' || $imageFileType == 'jpeg' || $imageFileType == 'png'){
    $uploadOk = 1;
}else{
    $uploadOk = 0;
}

if($_FILES['image']['size'] > 500000){
    $uploadOk = 0;
}

if($uploadOk == 0){
    $_SESSION['fileNotUploaded'] = "Your file is not uploaded";
    header("location: ../dashboard.php");
}else{
    if($uploadImage = move_uploaded_file($_FILES['image']['tmp_name'], $target_file)){
        $_SESSION['message'] = "You successfully uploaded image!";
        header("location: ../dashboard.php");
    }else{
        $_SESSION['fileNotUploaded'] = "Your file is not uploaded";
        header("location: ../dashboard.php");
    }
}