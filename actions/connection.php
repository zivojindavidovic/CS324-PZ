<?php

session_start();

$servername = "localhost";
$username = "id20130177_ossystem";
$password = "Onlinestorage123#@!";
$dbname = "id20130177_onlinestorage	";

$mysqli = new mysqli($servername, $username, $password, $dbname);

if($mysqli->connect_error){
    die("Couln't connect: " . $mysqli->connect_error);
}

