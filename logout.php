<?php
	session_start();
	$logging_out_user = $_SESSION['loggued_on_user'];
	$_SESSION['loggued_on_user'] = "";
	header('Location: index.php?logout='.$logging_out_user)
?>