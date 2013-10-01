<?php
session_name('myfirstcookie');
session_set_cookie_params(0,'/','',false,true);
session_start();
if (isset($_SESSION['isLogged']) && $_SESSION['isLogged'] == true) {
	if (isset($_GET['file'])) {
		$FileName = DIRECTORY_SEPARATOR.trim($_GET['file']);
		$FilePath = trim($_SESSION['username']);
		$size = filesize($FilePath . $FileName) ;
		header("Content-Type: application/force-download; name=\"". $FileName ."\"");
		header("Content-Transfer-Encoding: binary");
		header("Content-Length: ". $size ."");
		header("Content-Disposition: attachment; filename=\"". $FileName ."\"");
		header("Expires: 0");
		header("Cache-Control: no-cache, must-revalidate");
		header("Pragma: no-cache");
		echo (readfile($FilePath . $FileName));
	}
}
else {
	header('Location: index.php');
	exit;
}
