<?php


//writes the file to the server
function custom_upload_file() {
    try {

        if (empty($_FILES)) {
            throw new Exception('Invalid upload');
        }

        switch ($_FILES['file']['error']) {
            case UPLOAD_ERR_OK:
                break;
            case UPLOAD_ERR_NO_FILE:
                throw new Exception('No file uploaded');
                break;
            case UPLOAD_ERR_INI_SIZE:
                throw new Exception('File is too large from the server settings');
                break;
            default:
                throw new Exception('An error occured');
        }

        $mime_types = ['image/gif', 'image/png', 'image/jpeg', 'text/csv', 'text/html', 'text/plain', 'application/msword'];

        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $mime_type = finfo_file($finfo, $_FILES['file']['tmp_name']);

        if ( ! in_array($mime_type, $mime_types)) {
            throw new Exception('Invalid file type');
        }
        
        // $destination = $_SERVER['DOCUMENT_ROOT'] . "/file_uploader/uploads/" . $_FILES['file']['name'];
        $filename = $_FILES['file']['name'];
        $destination = $_SERVER['DOCUMENT_ROOT'] . "/file_uploader/uploads/" . $filename;


        if (file_exists($destination)) {
            $filename = "copy_of_" . $filename;
            $destination = $_SERVER['DOCUMENT_ROOT'] . "/file_uploader/uploads/" . $filename;
        }

        if (move_uploaded_file($_FILES['file']['tmp_name'], $destination)) {
            // echo "File uploaded successfully.";
            // connecting to the DB and writing data into the sql
            require 'db.php';
            $conn = getDB();
            // mysqli_query($conn, "INSERT INTO uploads (name, destination) VALUES ('$filename', '$destination')");
            
            $sql = "INSERT INTO uploads (name, destination) VALUES ('$filename', '$destination')";
            $results = mysqli_query($conn, $sql);

            if ($results === false) {
                echo mysqli_error($conn);
            }
        } else {
            throw new Exception('Unable to move uploaded file');
        }

    } catch (Exception $e) {
        echo $e;
    }
}