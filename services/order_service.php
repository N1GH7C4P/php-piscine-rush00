<?php

	include_once 'database_service.php';
	include_once 'account_service.php';
	include_once 'product_service.php';

	function place_an_order($user_id)
	{
		$basket = get_user_basket($user_id);
		create_order($user_id, $basket->total_sum);
		remove_basket($basket->id);
	}

	function get_user_orders($user_id)
	{
		$connection = connect_to_database();
		$query = "SELECT * FROM `order_details` LEFT JOIN `users` ON `order_details`.`user_id`=`users`.`id` WHERE `users`.`id`=".$user_id.";";
		$res = $connection->query($query);
		$i = 0;
		while ($obj[$i] = $res->fetch_array())
			$i++;
		return $obj;
	}

	function create_order($user_id, $total_sum)
	{
		$connection = connect_to_database();
		$query = "INSERT INTO `order_details` (`id`, `total_sum`, `creation_time`, `status`, `user_id`) VALUES (NULL, ".$total_sum.", current_timestamp(), 'pending', ".$user_id.");";
		$connection->query($query);
	}

	function cancel_order($order_id)
	{
		$connection = connect_to_database();
		$query = "DELETE * FROM `order_details` WHERE id=".$order_id.");";
		$connection->query($query);
	}

?>