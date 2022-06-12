<?php

function connect_to_database()
{
	$db_host = 'localhost';
	$db_user = 'root';
	$db_pass = 'mh5KF7xd';
	$db_name = 'rush00';

	$connection = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
	return ($connection);
}

function init_database()
{
	$db_host = 'localhost';
	$db_user = 'root';
	$db_pass = 'mh5KF7xd';
	$db_name = 'rush00';

	$conn = new mysqli($db_host, $db_user, $db_pass);
	if ($conn->connect_error)
	{
  		die("Connection failed: " . $conn->connect_error);
	}
	$sql = "CREATE DATABASE ".$db_name;
	if ($conn->query($sql) === TRUE)
		echo "Database created successfully";
	else
	{
		echo "Error creating database: " . $conn->error;
		die(-1);
	}
	$conn = connect_to_database();
	$fp = file('database/rush00_original.sql', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
	$query = '';
	foreach ($fp as $line)
	{
		if ($line != '' && strpos($line, '--') === false)
		{
			$query .= $line;
			if (substr($query, -1) == ';')
			{
				if ($conn->query($query) === TRUE)
					echo "populating successfully\n";
				else
					echo "Error populating database: " . $conn->error . "\n";
				$query = '';
			}
		}
	}
}

?>