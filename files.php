<?php
$pageTitle = 'Web server';
$message = '';
require_once 'includes'.DIRECTORY_SEPARATOR.'header.php';
if (isset($_SESSION['isLogged']) && $_SESSION['isLogged'] == true) {
	$username = trim($_SESSION['username']);
	if (!file_exists($username)) {
		mkdir($username);
	}
?>
	<div>
		<a href="destroy.php">Изход</a>
	</div>
<?php
	echo 'Моля качвайте малки файлове (по подразбиране системите са до 2МБ). Системата не извежда коректни съобщения за файлове по големи от максимално допустимото.';
	//echo '<pre>'.print_r($_FILES, true).'</pre>';
	if ($_POST) {
		if (count($_FILES>0)) {
			if(!$username) {
				$username = $_SESSION['username'];
				
			}
			//echo "Upload: " . $_FILES["file"]["name"] . "<br>";
			//echo "Type: " . $_FILES["file"]["type"] . "<br>";
			//echo "Size: " . (round($_FILES["file"]["size"] / 1024, 2)) . " kB<br>";
			//echo "Stored in: " . $_FILES["file"]["tmp_name"] . "<br>";
			$exists = false;
			if (file_exists($username.DIRECTORY_SEPARATOR.$_FILES['file']['name'])) {
				$exists = true;
			}
			if (move_uploaded_file($_FILES['file']['tmp_name'], $username.DIRECTORY_SEPARATOR.$_FILES['file']['name'])) {
				if ($exists) {
					$message = 'Файлът е ПРЕЗАПИСАН успешно в системата';
				}
				else {
					$message = 'Файлът е качен успешно в системата';
				}
			}
			else {
				$message = 'Грешка при качването';
			}
		}
	}
?>
	<form method="POST" action="files.php" enctype="multipart/form-data">
		<div>
			<span>Качи файл: </span><input type="file" name="file" />
			<input type="submit" name="submit" value="Качи файла" />
		</div>
	</form>
	<div><?= $message; ?></div>
<?php 
	$files = scandir($username);
	natcasesort($files);
	echo '<table>'."\n";
	foreach ($files as $value) {
		if (!($value == '.' || $value == '..')) {
			echo '<tr><td><pre><a href="download.php?file='.$value.'">'.$value.'</a></pre></td>';
			$size= filesize($username.DIRECTORY_SEPARATOR.$value);
			echo '<td><pre>'.round($size / 1024, 2) . " kB</pre></td></tr>"."\n";
		}
	}
	echo '</pre>'."\n";
	include_once 'includes'.DIRECTORY_SEPARATOR.'footer.php';
}
else {
	header('Location: index.php');
	exit;
}
