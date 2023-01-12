<?php
include "actions/connection.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Dashboard</title>
</head>

<body>
    <div class="navigation">
        <div class="logo">
            <p>Online Storage</p>
        </div>
        <div class="user">
            <div class="container">
                <p>
                    <?php echo $_SESSION['username']; ?>
                </p>
                <div class="options-dropdown">
                    <a href="account.php">Account</a>
                    <a href="buyPremium.php">Premium</a>
                    <a href="actions/logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <div class="side-menu">
        <div class="add-item first-item">
            <form action="actions/uploadImage.php" method="POST" id="imageUpload" enctype="multipart/form-data">
                <div>
                    <input type="file" name="image" id="image">
                </div>
                <button type="submit" id="uploadImgBtn">Upload Image</button>
            </form>
        </div>
        <?php
        $userId = $_SESSION['user_id'];

        $sql = "SELECT * FROM premium WHERE user_id = '$userId'";
        $result = $mysqli->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();

            $subEnd = strtotime($row['date']);
            $today = strtotime(date('Y-m-d'));
            if ($row['level'] == 1 && $today < $subEnd) { ?>

        <div class='add-item'>
            <form action='actions/uploadTxt.php' method='POST' id='textUpload' enctype='multipart/form-data'>
                <div>
                    <?php echo "<input type='file' name='text' id='text'>" ?>
                </div>
                <?php echo "<button type='submit' id='uploadTxtBtn'>Upload Text</button>" ?>
            </form>
        </div>
        <?php } else if ($row['level'] == 2 && $today < $subEnd) { ?>

        <div class='add-item'>
            <form action='actions/uploadTxt.php' method='POST' id='textUpload' enctype='multipart/form-data'>
                <div>
                    <?php echo "<input type='file' name='text' id='text'>" ?>
                </div>
                <?php echo "<button type='submit' id='uploadTxtBtn'>Upload Text</button>" ?>
            </form>
        </div>
        <div class='add-item'>
            <form action='actions/uploadAudio.php' method='POST' id='audioUpload' enctype='multipart/form-data'>
                <div>
                    <?php echo "<input type='file' name='audio' id='audio'>" ?>
                </div>
                <?php echo "<button type='submit' id='uploadAudioBtn'>Upload Audio</button>" ?>
            </form>
        </div>
        <?php
            } else if ($row['level'] == 3 && $today < $subEnd) { ?>
        <div class='add-item'>
            <form action='actions/uploadTxt.php' method='POST' id='textUpload' enctype='multipart/form-data'>
                <div>
                    <?php echo "<input type='file' name='text' id='text'>" ?>
                </div>
                <?php echo "<button type='submit' id='uploadTxtBtn'>Upload Text</button>" ?>
            </form>
        </div>
        <div class='add-item'>
            <form action='actions/uploadAudio.php' method='POST' id='audioUpload' enctype='multipart/form-data'>
                <div>
                    <?php echo "<input type='file' name='audio' id='audio'>" ?>
                </div>
                <?php echo "<button type='submit' id='uploadAudioBtn'>Upload Audio</button>" ?>
            </form>
        </div>
        <div class='add-item'>
            <form action='actions/uploadVideo.php' method='POST' id='videoUpload' enctype='multipart/form-data'>
                <div>
                    <?php echo "<input type='file' name='video' id='video'>" ?>
                </div>
                <?php echo "<button type='submit' id='uploadVideoBtn'>Upload Video</button>" ?>
            </form>
        </div>
        <?php
            }
        } ?>

        <div class="notification">
            <?php
            if (isset($_SESSION['message'])) { ?>
            <p>
                <?php echo $_SESSION['message'] ?>
            </p>
            <?php
                unset($_SESSION['message']);
            } ?>

            <?php
            if (isset($_SESSION['fileNotUploaded'])) { ?>
                <p>
                    <?php echo $_SESSION['fileNotUploaded'] ?>
                </p>
                <?php unset($_SESSION['fileNotUploaded']);
            }?>
        </div>


    </div>

    <div class="content">
        <?php
        $username = $_SESSION['username'];
        $target_dir = "uploads/" . md5($username) . "/";

        if ($opendir = opendir($target_dir)) {
            while (($file = readdir($opendir)) !== FALSE) {
                if ($file != "." && $file != "..") {
                    $_SESSION['fileName'] = $file;
        ?>
        <div class="item">
            <div class="head">
                <?php echo "<a href='$target_dir/$file'><img src='$target_dir/$file'></a>" ?>
            </div>
            <div class="data">
                <?php echo "<p>$file</p>" ?>
                <?php
                echo '<a class="downloadButton" href="actions/downloadFile.php?file=' . urlencode($file) . '">Download</a>'
                ?>
                <?php echo '<a class="deleteButton" href="actions/deleteFile.php?file=' . urlencode($file) . '">Delete</a>'?>
            </div>            
        </div>
        <?php
                }
            }
        }
        ?>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="scripts/main.js"></script>

</body>

</html>