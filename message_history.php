<?php

include_once 'services/message_service.php';

foreach ($_GET as $key => $value)
{
	if ($key === "user")
		$user = $value;
}

?>

<div>
	<?php print_users_messages($user);?>
</div>