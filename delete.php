<?php 

if (!empty($_GET['filename'])) {
    $filename = $_SERVER['DOCUMENT_ROOT'] . "/file_uploader/uploads/" . $_GET['filename'];
    $filedata = @file_get_contents($filename);

    if ($filedata) {
        unlink($filename);
        header('Location:/file_uploader/list.php');
    } else {
        throw new Exception("Error: Unanble to open $filename");
    }
}