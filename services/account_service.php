<?php
include_once "database_service.php";
include_once "product_service.php"; 

function set_new_password($login, $newpw)
{
	$connection = connect_to_database();
	$query = "SELECT `name` FROM USERS WHERE `name`='".$login."'";
	$result = $connection->query($query);
	while ($obj = $result->fetch_object())
		$name = $obj->name;
	if($name)
	{
		$hash = strtolower(hash('whirlpool', $newpw));
		$query = "UPDATE `users` SET `password` = '".$hash."' WHERE `users`.`name`='".$login."'";
		$connection->query($query);
		$connection->close();
		return(1);
	}
	else
	{
		echo($login." not in database.");
		return(-1);
	}
}

function create_account($login, $passwd, $connection)
{
	$hash = strtolower(hash('whirlpool', $passwd));
	$query = "INSERT INTO `users` (`id`, `name`, `password`) VALUES (NULL,'".$login."','".$hash."')";
	$user_id = get_id_by_login($login);
	create_basket($user_id);
	$connection->query($query);
}

function add_account($login, $passwd)
{
	$connection = connect_to_database();
	$query = "SELECT `name` FROM USERS WHERE `name`='".$login."'";
	$result = $connection->query($query);
	while ($obj = $result->fetch_object())
		$name = $obj->name;
	if($name)
	{
		echo($name);
		return(-1);
	}
	create_account($login, $passwd, $connection);
	$connection-> close();
	return (1);
}

function get_id_by_login($login)
	{
		$connection = connect_to_database();
		$query = "SELECT `id` FROM USERS WHERE `name`='".$login."'";
		$result = $connection->query($query);
		while ($obj = $result->fetch_object())
			$id = $obj->id;
		$connection-> close();
		return $id;
	}

function get_pass_by_login($login)
{
	$connection = connect_to_database();
	$query = "SELECT `password` FROM USERS WHERE `name`='".$login."'";
	$result = $connection->query($query);
	while ($obj = $result->fetch_object())
		$password = $obj->password;
	$connection-> close();
	return $password;
}

function auth($login, $password)
{
	$hash = strtolower(hash('whirlpool', $password));
	$password = strtolower(get_pass_by_login($login));
	if ($hash === $password)
		return (1);
	else
		return (0);
}

?>