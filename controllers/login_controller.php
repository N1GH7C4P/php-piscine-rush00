<?php
	include_once '../services/account_service.php';

	session_start();
	foreach ($_POST as $key => $value)
	{
		if($key === "submit" && $value === "OK")
			$submit = 1;
	}
	if ($submit == 1)
	{
		foreach ($_POST as $key => $value)
		{
			if($key === "login")
				$login = filter_var($value,  FILTER_SANITIZE_FULL_SPECIAL_CHARS);
			else if($key === "passwd")
				$passwd = filter_var($value,  FILTER_SANITIZE_FULL_SPECIAL_CHARS);
		}
		$ret = auth($login, $passwd);
		if ($ret == 1)
		{
			$_SESSION['loggued_on_user'] = $login;
			echo '<div> User '.$login.' logged in.</div>';
			header("Location: ../shop.php");
		}
		else
		{
			$_SESSION['loggued_on_user'] = "";
			echo("ERROR\n");
			header("Location: ../index.php?login=failure");
		}
	}
	if($_SESSION['loggued_on_user'] === "")
		header("Location: ../index.php?login=failure");
?>
