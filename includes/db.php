<?php

function getDB() {
    
    $db_host = 'localhost';
    $db_name = 'file_uploader';
    $db_user = 'uploader';
    $db_pass = 'RakpLx61zJSLds0Q';

    $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

    if (mysqli_connect_error()) {
        echo mysqli_connect_error();
        exit;
    }

    return $conn;
}