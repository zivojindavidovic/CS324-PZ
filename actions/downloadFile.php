<?php

include "connection.php";

if (isset($_REQUEST['file'])) {
    $file = urldecode($_REQUEST['file']);

    $path = "../uploads/" . md5($_SESSION['username']) . "/" . $file;
    if (file_exists($path)) {
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="' . basename($path) . '"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($path));
        flush();
        readfile($path);
        die();
    } else {
        http_response_code(404);
        die();
    }

}