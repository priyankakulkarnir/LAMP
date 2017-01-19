<!-- Page for log out action -->
<?php 
	if (isset($_COOKIE['uid']) && $_COOKIE['uid']) {
		setcookie('uid', "", time() - 86400, "/");
		header("Location:login.php");
	}
?>
