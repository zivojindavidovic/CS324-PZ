<?php
include 'connection.php';

$userId = $_SESSION['user_id'];
$today = strtotime(date('Y-m-d'));

if (isset($_POST['level1'])) {
    $level = '1';

    $sql = "SELECT * FROM premium WHERE user_id = '$userId'";
    $result = $mysqli->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $subEnd = strtotime($row['date']);

        if ($today < $subEnd) {
            $_SESSION['didntExpired'] = "You are already subscribed and subscription didn't expired";
            header("location: ../buyPremium.php");
        }else{
            $updateToday = date('Y-m-d');
            $addDays = date('Y-m-d', strtotime($updateToday . '+30 days'));
            $sql = "UPDATE premium SET date = '$addDays', level = '$level' WHERE user_id = '$userId'";
            
            if ($mysqli->query($sql)) {
                $_SESSION['successfullUpdated'] = "You renewed your subscription successfully";
                header("location: ../buyPremium.php");
            } else {
                $_SESSION['renewError'] = "Error renewing subscription";
                header("location: ../buyPremium.php");
            }
        }
    } else {
        $addDays = date('Y-m-d', strtotime($today . '+30 days'));
        $sql = "INSERT INTO premium (user_id, level, date) VALUES ('$userId', '$level', '$addDays')";

        if ($mysqli->query($sql)) {
            $_SESSION['successfullUpgrade'] = "You upgraded your account successfully";
            header("location: ../buyPremium.php");
        } else {
            $_SESSION['upgradeError'] = "Your account is not upgraded";
            header("location: ../buyPremium.php");
        }
    }
} else if (isset($_POST['level2'])) {
    $level = '2';

    $sql = "SELECT * FROM premium WHERE user_id = '$userId'";
    $result = $mysqli->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $subEnd = strtotime($row['date']);
        $today = strtotime(date('Y-m-d'));
        if ($today < $subEnd) {
            $_SESSION['didntExpired'] = "You are already subscribed and subscription didn't expired";
            header("location: ../buyPremium.php");
        }else{
            $updateToday = date('Y-m-d');
            $addDays = date('Y-m-d', strtotime($updateToday . '+30 days'));
            $sql = "UPDATE premium SET date = '$addDays', level = '$level' WHERE user_id = '$userId'";
            
            if ($mysqli->query($sql)) {
                $_SESSION['successfullUpdated'] = "You renewed your subscription successfully";
                header("location: ../buyPremium.php");
            } else {
                $_SESSION['renewError'] = "Error renewing subscription";
                header("location: ../buyPremium.php");
            }
        }
    } else {
        $addDays = date('Y-m-d', strtotime($today . '+30 days'));
        $sql = "INSERT INTO premium (user_id, level, date) VALUES ('$userId', '$level', '$addDays')";

        if ($mysqli->query($sql)) {
            $_SESSION['successfullUpgrade'] = "You upgraded your account successfully";
            header("location: ../buyPremium.php");
        } else {
            echo "Nije uneto";
            $_SESSION['upgradeError'] = "Your account is not upgraded";
            header("location: ../buyPremium.php");
        }
    }
} else if (isset($_POST['level3'])) {
    $level = '3';

    $sql = "SELECT * FROM premium WHERE user_id = '$userId'";
    $result = $mysqli->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $subEnd = strtotime($row['date']);
        $today = strtotime(date('Y-m-d'));
        if ($today < $subEnd) {
            $_SESSION['didntExpired'] = "You are already subscribed and subscription didn't expired";
            header("location: ../buyPremium.php");
        }else{
            $updateToday = date('Y-m-d');
            $addDays = date('Y-m-d', strtotime($updateToday . '+30 days'));
            $sql = "UPDATE premium SET date = '$addDays', level = '$level' WHERE user_id = '$userId'";
            
            if ($mysqli->query($sql)) {
                $_SESSION['successfullUpdated'] = "You renewed your subscription successfully";
                header("location: ../buyPremium.php");
            } else {
                $_SESSION['renewError'] = "Error renewing subscription";
                header("location: ../buyPremium.php");
            }
        }
    } else {
        $addDays = date('Y-m-d', strtotime($today . '+30 days'));
        $sql = "INSERT INTO premium (user_id, level, date) VALUES ('$userId', '$level', '$addDays')";

        if ($mysqli->query($sql)) {
            $_SESSION['successfullUpgrade'] = "You upgraded your account successfully";
            header("location: ../buyPremium.php");
        } else {
            $_SESSION['upgradeError'] = "Your account is not upgraded";
            header("location: ../buyPremium.php");
        }
    }
}