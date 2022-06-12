<?php

	include_once 'services/database_service.php';

	$connection = connect_to_database();
	$sql = file_get_contents('database/rush00_original.sql');
	$qr = $db->exec($sql);

?>