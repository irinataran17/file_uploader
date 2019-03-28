<?php

// require 'includes/db.php';
require 'includes/upload.php';

// $conn = getDB();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    //var_dump($_FILES);
    custom_upload_file();
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

<body class="is-demo">

    <header id="header">
		<div class="inner">
			<a href="index.php" class="logo"><strong>File</strong> Uploader</a>
				<nav id="nav">
					<!-- <a href="/file_uploader/">Upload File</a> -->
					<a href="/file_uploader/list.php">File List</a>
				</nav>
			<a href="#navPanel" class="navPanelToggle"><span class="fa fa-bars"></span></a>
		</div>
	</header>

    <section id="banner">
		<div class="inner">
			<header>
					<h1>Welcome to the file uploader</h1>
			</header>

            <div class="flex"> 
                <div>
                    <h3>Upload files</h3>
                    <a href="/file_uploader/">Upload File</a>
                    <p>Please note that you can upload files up to 5M</p>
                </div>

                <div>
                    <h3>View File List</h3>
                    <a href="/file_uploader/list.php">File List</a>
                    <p>Click here if you'd like to view the list of available files</p>
                </div>
            </div>
		</div>
    </section>


    <div id="demo-main">
        <form method="post" enctype="multipart/form-data">

            <div class="field">
                <label for="file">File to be selected</label>
                <input type="file" name="file" id="file" class="button alt">
            </div>

            <button>Upload</button>

        </form>
    </div>

    <footer id="footer">
        © File Uploader. Irina Taran
    </footer>

</body>
</html>