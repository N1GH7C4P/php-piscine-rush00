<?php
	include_once '../services/order_service.php';

	foreach ($_POST as $key => $value)
	{
		if($key === "submit" && $value === "OK")
			$submit = 1;
	}
	if($submit === 1)
	{
		session_start();
		$user = $_SESSION['loggued_on_user'];
		place_an_order($user);
		header("Location: orders.php?user=".$user);
	}
	header("Location: index.php?error=error_placing_order");
?>