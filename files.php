<?php
$pageTitle = 'Web server';
$username = 'user';
require_once 'includes/header.php';
if (isset($_SESSION['isLogged'])) {
	//if (file_exists($filename))
	//$files = scandir($directory)
	if ($_POST) {
		if (count($_FILES>0)) {
			echo "Upload: " . $_FILES["file"]["name"] . "<br>";
			echo "Type: " . $_FILES["file"]["type"] . "<br>";
			echo "Size: " . (round($_FILES["file"]["size"] / 1024, 2)) . " kB<br>";
			echo "Stored in: " . $_FILES["file"]["tmp_name"] . "<br>";
			if (move_uploaded_file($_FILES['file']['tmp_name'], $username.DIRECTORY_SEPARATOR.$_FILES['file']['name'])) {
				echo 'Файлът е качен успешно в системата';
			}
			else {
				echo 'Грешка при качването';
			}
		}
	}
?>
	<form method="POST" action="files.php" enctype="multipart/form-data">
		<div>Качи файл: <input type="file" name="file" /></div>
		<div><input type="submit" name="submit" value="Качи файла" /></div>
	</form>
	<div>
		<a href="destroy.php">Изход</a>
	</div>
	<?php 
	include_once 'includes/footer.php';
}
else {
	header('Location: index.php');
	exit;
}
