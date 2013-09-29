<?php
$pageTitle = 'Web server';
$username = 'user';
require_once 'includes/header.php';
if (isset($_SESSION['isLogged'])) {
	//if (file_exists($filename))
	//$files = scandir($directory)
	if ($_POST) {
		if (count($_FILES>0)) {
			if (move_uploaded_file($_FILES['file']['tmp_name'], $username.DIRECTORY_SEPARATOR.$_FILES['file']['name'])) {
				echo 'Файлът е качен успешно в системата';
			}
			else {
				echo 'Грешка при качването';
			}
		}
	}
?>
	<form method="POST" enctype="multipart/form-data">
		<div>Качи файл: <input type="file" name="file" /></div>
		<div><input type="submit" value="Качи файла" /></div>
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
