<?php
$pageTitle = 'Upload';
require_once 'includes/header.php';
if (isset($_SESSION['isLogged'])) {
	

?>

<?php
	include_once 'includes/footer.php';
}
else {
	header('Location: index.php');
	exit;
}
