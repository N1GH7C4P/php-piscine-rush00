<?php

include_once 'database_service.php';
include_once 'image_service.php';

function add_message($message)
{
	session_start();
	if($_SESSION['loggued_on_user'] === "" || !$_SESSION['loggued_on_user'])
		return(-1);
	$user_id = get_id_by_login($_SESSION['loggued_on_user']);
	$query = "INSERT INTO `messages` (`id`, `content`, `timestamp`, `user_id`) VALUES (NULL, '".$message."', current_timestamp(), '".$user_id."')";
	$connection = connect_to_database();
	$connection->query($query);
	$connection->close();
	return (1);
}

function print_users_messages($username)
{
	$connection = connect_to_database();
	$query = "SELECT `messages`.`content`, `messages`.`timestamp`, `users`.`name` FROM `messages` LEFT JOIN `users` ON `messages`.`user_id` = `users`.`id` WHERE `users`.`name`='".$username."';";
	
	$result = $connection->query($query);
	while ($obj = $result->fetch_object())
	{
		$timestamp = $obj->timestamp;
		$user = $obj->name;
		$content = $obj->content;
		echo("[".$timestamp."]<br><b>".$user.": </b>".$content."<br><br>");
	}
	$connection-> close();
}

function print_all_messages()
{
	$connection = connect_to_database();
	$query = "SELECT `messages`.`content`, `messages`.`timestamp`, `users`.`name` FROM `messages` LEFT JOIN `users` ON `messages`.`user_id` = `users`.`id`;";
	
	$result = $connection->query($query);
	while ($obj = $result->fetch_object())
	{
		$timestamp = $obj->timestamp;
		$user = $obj->name;
		$content = $obj->content;
		show_user_profile_pic($user);
		echo("[".$timestamp."]<br><a href='user.php?user=".$user."' target='_parent'>".$user.": </a>".$content."<br><br>");
	}
	$connection-> close();
}

?>