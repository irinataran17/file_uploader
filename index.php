<?php

require 'includes/db.php';

$conn = getDB();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    var_dump($_FILES);

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
        $mime_type = finfo_file($finfo, $_FILES['file']['tmt_name']);

        if (!in_array($mime_type, $mime_types)) {
            throw new Exception('Invalid file type');
        }

    } catch (Exception $e) {
        echo $e;
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>File uploader</title>
</head>
<body>
    <H1>Hey, welcome to the file uploader!</H1>
    <p>Please note that you can upload files up to 5M. Here another bla bla bla staff regarding the restrictions</p>

    <form method="post" enctype="multipart/form-data">

        <div>
            <label for="file">File to be selected</label>
            <input type="file" name="file" id="file">
        </div>

        <button>Upload</button>

    </form>

</body>
</html>