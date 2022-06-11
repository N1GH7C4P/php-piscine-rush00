<?php
	session_start();
	$login = $_SESSION['loggued_on_user'];
	if($login === '')
		header("Location: index.php");
?>

<html>
<head>
	<link rel="stylesheet" href="style.css" type="text/css">
</head>
<body style="margin-left: 5%; margin-top: 5%; margin-right: 5%">
<div class="chat">
	<h1>Camagru chat</h1>
	<iframe src="chatbox.php" title="Chatbox" width=100% height="550px"></iframe>
	<iframe src="speak.php" title="Speak" width=100% height="70px"></iframe>
	<a href="logout.php">logout</a>
	<a href="chat.php">chat</a>
	<a href="friends.php">friends</a>
	<?php echo ("<a href='user.php?user=".$login."'> userpage"); ?>
</div>
</body>
</html>
