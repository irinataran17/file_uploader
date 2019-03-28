<?php 

if (!empty($_GET['filename'])) {
    $filename = $_SERVER['DOCUMENT_ROOT'] . "/file_uploader/uploads/" . $_GET['filename'];
    $filedata = @file_get_contents($filename);

    if ($filedata) {
        
        $basename = $_GET['filename'];

        header("Content-Type: application-x/force-download");
        header("Content-Disposition: attachment; filename=$basename");
        header("Content-length: " . (string)(strlen($filedata)));
        header("Expires: ".gmdate("D, d M Y H:i:s", mktime(date("H")+2, date("i"), date("s"), date("m"), date("d"), date("Y")))." GMT");
        header("Last-Modified: ".gmdate("D, d M Y H:i:s")." GMT");
        header("Pragma: no-cache");

        flush();

        ob_start();
        echo $filedata;
    } else {
        throw new Exception("Error: Unanble to open $filename");
    }
}