<?php
function connect_to_database()
{
	$db_host = 'localhost';
	$db_user = 'root';
	$db_pass = 'mh5KF7xd';
	$db_name = 'camagru';

	$connection = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
	return ($connection);
}
?>