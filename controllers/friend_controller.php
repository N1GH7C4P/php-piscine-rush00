<?php

	include_once '../services/friend_service.php';

	session_start();

	foreach ($_GET as $key => $value)
	{
		if ($key === "user")
			$user = $value;
		if ($key === "function")
			$function = $value;
		if ($key === "response")
			$response = $value;
	}
	echo("function: ".$function."user: ".$user. ".\n");
	if($function === 'cancel' || $function === 'remove')
		remove_friend($_SESSION['loggued_on_user'], $user);
	if($function === 'send_request')
		handle_friend_request($user);
	if($function === 'respond' && $response === 'accept')
		accept_friend_request($user, $_SESSION['loggued_on_user']);
	if($function === 'respond' && $response === 'decline')
		remove_friend($user, $_SESSION['loggued_on_user']);
	header("Location: ../friends.php");
?>