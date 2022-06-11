<?php

include_once 'services/account_service.php';
include_once 'services/message_service.php';

foreach ($_GET as $key => $value)
{
	if ($key === "speak" && $value === "failure")
		echo '<div>Failed to post message.</div>';
}

foreach ($_POST as $key => $value)
{
	if ($key === "submit" && $value === "OK")
		$submit_ok = 1;
	if ($submit_ok == 1)
	{
		foreach ($_POST as $key => $value)
		{
			if($key === "msg")
				$message = $value;
		}
		$ret = add_message($message);
		if ($ret == 1);
		else
		{
			header("Location: speak.php?speak=failure");
		}
	}
}
?>
<script language="javascript" type="text/javascript">
	top.frames[0].location = 'chatbox.php';
</script>
<html>
<head>
	<link rel="stylesheet" href="style.css" type="text/css">
</head>
<body>
	<div class="form-style-3">
	<form style="width:80%" action="speak.php" method="post">
		<b>Message:</b> <input id="focus" type="text" name="msg" id="msg" value="" required>
		<input type="submit" name=submit value="OK">
	</form>
	</div>
</body>
</html>