<?php
$pageTitle = 'Логин';
$message = '';
require_once 'includes/header.php';
if (isset($_SESSION['isLogged'])) {
	header('Location: files.php');
	exit;
}
else {
	if ($_POST) {
		$username = trim($_POST['username']);
		$password = trim($_POST['password']);
		if ($username == 'user' && $password == 'qwerty') {
			$_SESSION['isLogged'] = true;
			header('Location: files.php');
			exit;
		}
		else {
			$message = 'Невалидно потребителско име или парола.';
		}
	}
?>
	<form method="POST">
	<div>Потребител:<input type="text" name="username" /></div>
	<div>Парола:<input type="password" name="password" /></div>
	<div>
		<a href="#">Регистрирай се</a>
		<input type="submit" value="Влез" /></div>
	</form>
<?php 
	echo $message;
	include_once 'includes/footer.php';
}
