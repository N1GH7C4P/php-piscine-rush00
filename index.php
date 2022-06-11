<?php
	foreach ($_GET as $key => $value)
	{
		if ($key === "login" && $value === "success")
			echo '<div>Logged in as'.$_SESSION['loggued_on_user'].'</div>';
		else if ($key === "login" && $value === "failure")
			echo '<div>Login failed</div>';
		else if ($key === "logout")
			echo '<div> User '.$value.' logged out.</div>';
		else if ($key === "modif" && $value === "failure")
			echo '<div>Failed to update user password.</div>';
		else if ($key === "modif")
			echo '<div> User '.$value.' password has been updated.</div>';
		else if ($key === "create" && $value === "duplicant")
			echo '<div> Username has been already taken! </div>';
		else if ($key === "create")
			echo '<div> User '.$value.' created</div>';
		else if ($key === "error")
			echo '<div> Error: '.$value.'</div>';
	}
?>

<html>
<head>
	<link rel="stylesheet" href="style.css" type="text/css">
</head>
<body>

<h1>Welcome to webshop!</h1>
	<div class="form-style-3">
	<fieldset><legend>Please login</legend>
		<form action="controllers/login_controller.php" method="post">
			<label for="field1"><span>Username <span class="required">*</span></span><input type="text" name="login" id="login" value="" required>
			<label for="field2"><span>Password<span class="required">*</span></span><input type="password" name="passwd" id="passwd" value="" required>
			<input type="submit" name=submit value="OK">
			<br>
			<a href="create.html">create account</a>
			<br>
			<a href="modif.html">change password</a>
		</form>
	</div>
</body>
</html>