<?php

include_once 'services/account_service.php';

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
		else if($key === "newpw")
			$newpw = $value;
		else if($key === "oldpw")
			$oldpw = $value;
	}
	if($newpw === "")
	{
		echo("Error\n");
		return (-1);
	}
	echo("authentication: ");
	$ret = auth($login, $oldpw);
	echo("ret: ".$ret);
	if ($ret == 1)
	{
		$ret = set_new_password($login, $newpw);
		if($ret == 1)
		{
			echo("OK\n");
			header("Location: index.php?modif=".$login);
		}
		else
			header("Location: index.php?modif=failure");
	}
	else
		header("Location: index.php?modif=failure");
}
else
	header("Location: index.php?modif=failure");

?>