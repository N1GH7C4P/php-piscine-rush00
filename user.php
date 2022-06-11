<?php
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
			header("Location: index.php?error=access_violation");
		echo('<h1>'.$user.'</h1>');
		$image_id = get_user_profile_pic_id($user);
		$image_url = "img/".$image_id.".png";
		echo('<img src=\''.$image_url.'\' alt="profilepic" width=90px height=90px></img>');
	?>
	<h2>Shopping history</h2>
	<?php echo "<iframe src='history.php?user=".$user."' title=Shopping history width=100% height=550px></iframe>";?>
	<a href="logout.php">logout</a>
	<a href="shop.php">shop</a>
	<a href="checkout.php">checkout</a>
</body>
</html>