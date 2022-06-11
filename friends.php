<?php
	include_once 'services/friend_service.php';
	session_start();
	$login = $_SESSION['loggued_on_user'];
?>

<html>
<head>
	<link rel="stylesheet" href="style.css" type="text/css">
</head>
<body>

<h1>Friends</h1>
	<h2>Friends list</h2>
	<?php print_user_friends($_SESSION['loggued_on_user'])?>
	<h2>Incoming friend requests</h2>
	<?php print_pending_requests($_SESSION['loggued_on_user'])?>
	<h2>Sent friend requests</h2>
	<?php print_sent_requests($_SESSION['loggued_on_user'])?>
	<div>
		<a href="logout.php">logout</a>
		<a href="chat.php">chat</a>
		<a href="friends.php">friends</a>
		<?php echo ("<a href='user.php?user=".$login."'> userpage"); ?>
	</div>
</body>
</html>