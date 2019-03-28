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
                <td>File Name</td>
                <td>Actions</td>
            </tr>
        </thead>
        <tbody>
        <?php  
            if ($handle = opendir($_SERVER['DOCUMENT_ROOT'] . "/file_uploader/uploads/")) {

                while (false !== ($entry = readdir($handle))) {
                    if ($entry != "." && $entry != "..") {
                    ?>
                    <tr>
                        <td><?php echo $entry; ?></td>
                        <td>
                        <a href="/file_uploader/download.php?filename=<?php print $entry; ?>">Download</a> 
                        | 
                        <a href="/file_uploader/delete.php?filename=<?php print $entry; ?>">Delete</a></td>
                    </tr>
                    <?php
                    }
                }
                closedir($handle);
            }
        ?>
        </tbody>
    </table>

</body>
</html>