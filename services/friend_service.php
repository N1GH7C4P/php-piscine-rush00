<?php

include_once 'database_service.php';
include_once 'account_service.php';
include_once 'image_service.php';

function check_friendship($sender, $receiver)
	{
		if($sender && $receiver)
		{
			$sender_id = get_id_by_login($sender);
			$receiver_id = get_id_by_login($receiver);
		}
		else
			return (-1);
		if ($sender_id && $receiver_id)
		{
			$connection = connect_to_database();
			$query = "SELECT accept_status_receiver, accept_status_sender FROM `contacts` WHERE (sender_id = '".$sender_id."' OR sender_id = '".$receiver_id."') AND (receiver_id = '".$receiver_id."' OR receiver_id = '".$sender_id."');";
			$res = $connection->query($query);
			if(!$res)
				return -1;
			while($obj = $res->fetch_object())
			{
				$status_sender = $obj->accept_status_sender;
				$status_receiver = $obj->accept_status_receiver;
			}
			if ($status_sender === 'accepted' && $status_receiver === 'accepted')
				return 1;
			if ($status_sender === 'pending' || $status_receiver === 'pending')
				return 2;
			return 0;
		}
		return -1;
	}

function send_friend_request($sender, $receiver)
{
	if($sender && $receiver)
	{
		$sender_id = get_id_by_login($sender);
		$receiver_id = get_id_by_login($receiver);
	}
	else
		return (-1);
	if($sender_id && $receiver_id)
	{
		$connection = connect_to_database();
		$query = "INSERT INTO `contacts` (`id`, `sender_id`, `receiver_id`, `timestamp`) VALUES (NULL, '".$sender_id."','".$receiver_id."', current_timestamp());";
		echo($query);
		$connection->query($query);
		$connection->close;
		return (1);
	}
	else return (-1);
}

function remove_friend($sender, $receiver)
{
	if($sender && $receiver)
	{
		$sender_id = get_id_by_login($sender);
		$receiver_id = get_id_by_login($receiver);
	}
	else
		return (-1);
	if($sender_id && $receiver_id)
	{
		$connection = connect_to_database();
		$query = "DELETE FROM `contacts` WHERE (`sender_id`='".$sender_id."' AND `receiver_id`='".$receiver_id."') OR (`sender_id`='".$receiver_id."' AND `receiver_id`='".$sender_id."');";
		echo($query);
		$connection->query($query);
		$connection->close;
		return (1);
	}
	else return (-1);
}

function get_user_friends($user_id)
{
	$connection = connect_to_database();
	$query = "SELECT `users`.`name` FROM `users` LEFT JOIN `contacts` ON `contacts`.`sender_id` = `users`.`id` WHERE `contacts`.`receiver_id` ='".$user_id."' AND `contacts`.`accept_status_receiver` ='accepted' AND `contacts`.`accept_status_sender` ='accepted';";
	$res = $connection->query($query);
	if(!$res)
		return -1;

	$friends = array();
	while($obj = $res->fetch_object())
		array_push($friends, $obj->name);

	$query = "SELECT `users`.`name` FROM `users` LEFT JOIN `contacts` ON `contacts`.`receiver_id` = `users`.`id` WHERE `contacts`.`sender_id` ='".$user_id."' AND `contacts`.`accept_status_receiver` ='accepted' AND `contacts`.`accept_status_sender` ='accepted';";
	$res = $connection->query($query);
	if(!$res)
		return -1;

	while($obj = $res->fetch_object())
		array_push($friends, $obj->name);
	$connection->close;
	return($friends);
}

function get_incoming_pending_requests($user_id)
{
	$connection = connect_to_database();
	$query = "SELECT `users`.`name` FROM `users` LEFT JOIN `contacts` ON `contacts`.`sender_id` = `users`.`id` WHERE `contacts`.`receiver_id` ='".$user_id."' AND `contacts`.`accept_status_receiver` ='pending';";
	$res = $connection->query($query);
	if(!$res)
		return -1;
	$pending = array();
	while($obj = $res->fetch_object())
	{	
		array_push($pending, $obj->name);
	}
	return($pending);
	$connection->close;
}

function get_outgoing_pending_requests($user_id)
{
	$connection = connect_to_database();
	$query = "SELECT `users`.`name` FROM `users` LEFT JOIN `contacts` ON `contacts`.`receiver_id` = `users`.`id` WHERE `contacts`.`sender_id` ='".$user_id."' AND `contacts`.`accept_status_receiver` ='pending';";
	$res = $connection->query($query);
	if(!$res)
		return -1;
	$pending = array();
	while($obj = $res->fetch_object())
	{	
		array_push($pending, $obj->name);
	}
	return($pending);
	$connection->close;
}

function accept_friend_request($sender, $receiver)
{
	$connection = connect_to_database();

	if($connection && $sender && $receiver)
	{
		$sender_id = get_id_by_login($sender);
		$receiver_id = get_id_by_login($receiver);
		$query =  "UPDATE `contacts` SET `accept_status_receiver` = 'accepted' WHERE `receiver_id`='".$receiver_id."' AND `sender_id`='".$sender_id."'";
		$res = $connection->query($query);
		if(!$res)
			return -1;
		$connection->close;
	}
	return (-1);
}

function print_user_friends($login)
{
	$user_id = get_id_by_login($login);
	$friends = get_user_friends($user_id);
	foreach($friends as &$friend )
	{
		show_user_profile_pic($friend);
		echo("<a href='user.php?user=".$friend."' target='_parent'>".$friend."</a>");
	}
}

function handle_friend_request($user)
{	
	$friend_status = check_friendship($_SESSION['loggued_on_user'], $user);
	if(!$friend_status || $friend_status === 0)
	{
		send_friend_request($_SESSION['loggued_on_user'], $user);
		header("Location: ../user.php?user=".$user);
	}
	else
		echo("Error: ".$friend_status);
}

function print_pending_requests($login)
{
	$user_id = get_id_by_login($login);
	$pending=  get_incoming_pending_requests($user_id);
	foreach($pending as &$request )
	{
		show_user_profile_pic($request);
		echo("<a href='user.php?user=".$request."' target='_parent'>".$request."</a>");
		echo("<button onclick=\"location.href='controllers/friend_controller.php?user=".$request."&response=accept&function=respond'\">accept</button>");
		echo("<button onclick=\"location.href='controllers/friend_controller.php?user=".$request."&response=decline&function=respond'\">decline</button>");
	}
}

function print_sent_requests($login)
{
	$user_id = get_id_by_login($login);
	$pending=  get_outgoing_pending_requests($user_id);
	foreach($pending as &$request )
	{
		$image_id = get_user_profile_pic_id($pending);
		$image_url = "img/".$image_id.".png";
		echo('<img src=\''.$image_url.'\' alt="profilepic" width=90px height=90px></img>');
		echo("<a href='user.php?user=".$request."' target='_parent'>".$request."</a>");
		echo("<button onclick=\"location.href='controllers/friend_controller.php?user=".$request."&function=cancel'\">cancel</button>");
	}
}

?>