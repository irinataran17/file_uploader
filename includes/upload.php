<?php

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
        
        $destination = $_SERVER['DOCUMENT_ROOT'] . "/file_uploader/uploads/" . $_FILES['file']['name'];
        if (move_uploaded_file($_FILES['file']['tmp_name'], $destination)) {
            // echo "File uploaded successfully.";
        } else {
            throw new Exception('Unable to move uploaded file');
        }

    } catch (Exception $e) {
        echo $e;
    }
}