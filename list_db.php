<?php

require 'includes/db.php';
$conn = getDB();

$sql = "SELECT * FROM uploads";
$results = mysqli_query($conn, $sql);

if ($results === false) {
    echo mysqli_error();
} else {
    $documets = mysqli_fetch_all($results);
    // var_dump($documets);
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="assets/css/main.css" />
    <title>File uploader</title>
</head>
<body class="subpage">

    <header id="header">
		<div class="inner">
			<a href="index.php" class="logo"><strong>File</strong> Uploader</a>
				<nav id="nav">
                    <a href="/file_uploader/">Upload File</a>
					<!-- <a href="/file_uploader/list.php">File List</a> -->
				</nav>
			<a href="#navPanel" class="navPanelToggle"><span class="fa fa-bars"></span></a>
		</div>
	</header>

    
    <table>
        <thead>
            <tr>
                <td>id</td>
                <td>File Name</td>
                <td>File path</td>
                <td>Actions</td>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($documets as $document): ?>
            <tr>
                <td><?= $document[0] ?></td>
                <td><?= $document[1] ?></td>
                <td><?= $document[2] ?></td>
                <td>
                    <a href="/file_uploader/download.php">Download</a> 
                    | 
                    <a href="/file_uploader/delete.php">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

</body>
</html>