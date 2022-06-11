<?php
	include_once 'services/friend_service.php';
	include_once 'services/image_service.php';

	foreach ($_GET as $key => $value)
	{
		if ($key === "user")
			$user = $value;
	}
?>
<html>
<head>
	<link rel="stylesheet" href="style.css" type="text/css">
</head>
<body>
	<?php 
		session_start();
		if ($user !== $_SESSION['loggued_on_user'])
		{
			$friend_status = check_friendship($_SESSION['loggued_on_user'], $user);
			if($friend_status === 2)
				$color = 'yellow';
			else if($friend_status === 1)
				$color = 'green';
			else if($friend_status === 3)
				$color = 'red';
			else
				$friend_status = 0;
		}
		else
		{
			$color = 'default';
			$friend_status = 'self';
		}
		echo('<h1 style="color:'.$color.';">'.$user.'</h1>');
		$image_id = get_user_profile_pic_id($user);
		$image_url = "img/".$image_id.".png";
		echo('<img src=\''.$image_url.'\' alt="profilepic" width=90px height=90px></img>');
	?>
	
	<h2>Message history</h2>
	<?php echo "<iframe src='message_history.php?user=".$user."' title=Message history width=100% height=550px></iframe>";?>
	<a href="logout.php">logout</a>
	<a href="chat.php">chat</a>
	<a href="friends.php">friends</a>
	<a href="upload_image_form.html">Upload</a>
	<?php
		if (!$friend_status || $friend_status === 0)
			echo "<a href='controllers/friend_controller.php?function=send_request&user=".$user."'>Send a friend request</a>";
	?>
</body>
</html>