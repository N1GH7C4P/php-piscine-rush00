<?php
	include_once '../services/account_service.php';

	foreach ($_POST as $key => $value)
	{
		if ($key === "submit" && $value === "OK")
			$submit_ok = 1;
	}
	if ($submit_ok == 1)
	{
		foreach ($_POST as $key => $value)
		{
			if($key === "login")
				$login = $value;
			else if($key === "passwd")
				$password = $value;
		}
		if($password === "")
		{
			echo("Error\n");
			return (-1);
		}
		$ret = add_account($login, $password);
		if ($ret == 1)
		{
			echo("OK\n");
			header("Location: ../index.php?create=".$login);
		}
	}
	else if ($ret == -1)
		header("Location: index.php?create=duplicant");
?>