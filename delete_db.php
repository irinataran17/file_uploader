<?php 

require 'includes/db.php';


if (!empty($_GET['filename'])) {
    $filename = $_SERVER['DOCUMENT_ROOT'] . "/file_uploader/uploads/" . $_GET['filename'];
    $filedata = @file_get_contents($filename);

    if ($filedata) {
        unlink($filename);
        
        $conn = getDB();
        $sql = "DELETE FROM uploads WHERE name='$filename'";
        $results = mysqli_query($conn, $sql);

        // if ($results === false) {
        //     throw new Exception('something went terribly wrong');
        // } else {
        //     echo "Record deleted successfully";
        //     header('Location:/file_uploader/list_db.php');
        // }

        if ($results === true) {
            echo "Record deleted successfully";
            header('Location:/file_uploader/list_db.php');
        } else {
            throw new Exception('something went terribly wrong');
        }

        // header('Location:/file_uploader/list_db.php');
    } else {
        throw new Exception("Error: Unanble to open $filename");
    }
}