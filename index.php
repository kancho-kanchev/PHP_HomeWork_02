<?php
session_start();
mb_internal_encoding('UTF-8');
$pageTitle = 'Логин';
include 'includes/header.php';
?>
	<form method="POST">
	<div>име:<input type="text" name="username" /></div>
	<div>телефон:<input type="text" name="phone" /></div>
	<div>
		<select name="group">
			<?php 
				foreach ($groups as $key=>$value) {
					echo'<option value="'.$key.'">'.$value.'</option>';
				}
			?>
		</select>
	</div>
	<div><input type="submit" value="Добави" /></div>
	</form>
<?php 
include 'includes/footer.php';
