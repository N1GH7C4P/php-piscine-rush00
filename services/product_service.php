<?php

	include_once 'database_service.php';
	include_once 'account_service.php';
	include_once 'image_service.php';

	function get_product_inventory($product_id)
	{
		$connection = connect_to_database();
		$query = "SELECT `quantity` FROM `products` WHERE `id`=".$product_id.";";
		$res = $connection->query($query);
		if(!$res)
			return -1;
		$product_obj = $res->fetch_object();
		if($product_obj)
			return($product_obj->quantity);
		return -1;
	}

	function remove_from_inventory($product_id, $quantity)
	{
		$connection = connect_to_database();
		$query = "UPDATE `products` SET `quantity`=`quantity`-".$quantity." WHERE `id`=".$product_id;
		$connection->query($query);	
		$connection->close();
	}

	
	function create_basket_item($basket_id, $product_id, $quantity)
	{
		$connection = connect_to_database();
		$query = "INSERT INTO `basket_item` (`id`, `basket_id`, `product_id`, `quantity`, `creation_time`) VALUES (NULL, ".$basket_id.", ".$product_id.", ".$quantity.", current_timestamp());";
		$connection->query($query);
		$connection->close();
	}

	function create_users_basket($user_id)
	{
		$connection = connect_to_database();
		$query = "INSERT INTO `basket` (`id`, `user_id`, `price_total`, `creation_time`) VALUES (NULL, ".$user_id.", '0', current_timestamp());";
		$connection->query($query);
		$connection->close();
	}

	function add_product_to_users_basket($login, $product_id, $quantity)
	{
		echo("adding product\n");
		$user_id = get_id_by_login($login);
		$basket_obj = get_user_basket($user_id);
		if(!$basket_obj)
		{
			create_basket($user_id);
			$basket_obj = get_user_basket($user_id);
		}
		print_r($basket_obj);
		$basket_id = $basket_obj->id;
		create_basket_item($basket_id, $product_id, $quantity);
		remove_from_inventory($product_id, $quantity);
	}

	function create_basket($user_id)
	{
		$connection = connect_to_database();

		$query = "INSERT INTO `basket` (`id`, `user_id`, `price_total`, `creation_time`) VALUES (NULL, ".$user_id.", '0', current_timestamp());";
		$res = $connection->query($query);
		$connection->close();
		if(!$res)
			return NULL;
		while ($obj = $res->fetch_object())
			return $obj;
	}

	function get_user_basket($id)
	{
		$connection = connect_to_database();
		$query = "SELECT * FROM `basket` WHERE `user_id`=".$id.";";
		$res = $connection->query($query);
		if(!$res)
			return -1;
		while ($obj = $res->fetch_object())
			return $obj;
	}

	function get_products_in_users_basket($user_id)
	{
		$connection = connect_to_database();
		$query = "SELECT `products`.`name`, `products`.`price`, `products`.`image_id`, `products`.`description` FROM `products`
		LEFT JOIN `basket_item` ON `products`.`id`=`basket_item`.`product_id`
		LEFT JOIN `basket` ON `basket`.`id`=`basket_item`.`basket_id`
		LEFT JOIN `users` ON `users`.`id`=`basket`.`user_id`
		WHERE `users`.`id`=".$user_id.";";
		$res = $connection->query($query);
		if(!$res)
			return -1;
		$i = 0;
		while ($obj[$i] = $res->fetch_object())
		{
			$i++;
		}
		return $obj;
	}

	function show_product($obj)
	{
		echo("<div> <b>".$obj->name."</b> </div>");
		show_image($obj->image_id);
		echo("<div>".$obj->description."</div>");
		echo("<div>".$obj->price."<div>");
		echo('
			<form action="controllers/product_controller.php?product_id='.$obj->id.'" method="post">
				<label for="field1"><span>Quantity <span class="required">*</span></span><input type="number" name="quantity" id="quantity" value="" required>
				<input type="submit" name=submit value="Add to basket">
			</form>'
		);
	}

	function show_products_of_category($category)
	{
		$connection = connect_to_database();
		$query = "SELECT * FROM `products` WHERE `category`=".$category.";";
		$res = $connection->query($query);
		$connection->close();
		if(!$res)
			return -1;
		while ($obj = $res->fetch_object())
			show_product($obj);
	}

	function get_product_by_id($id)
	{
		$connection = connect_to_database();
		$query = "SELECT * FROM `products` WHERE `id`=".$id.";";
		$res = $connection->query($query);
		$connection->close();
		if(!$res)
			return -1;
		while ($obj = $res->fetch_object())
			return($obj);
	}

	function show_all_products()
	{
		$connection = connect_to_database();
		$query = "SELECT * FROM `products`;";
		$res = $connection->query($query);
		$connection->close();
		if(!$res)
			return -1;
		while ($obj = $res->fetch_object())
			show_product($obj);
	}

	function get_all_products()
	{
		$connection = connect_to_database();
		$query = "SELECT * FROM `products`;";
		$res = $connection->query($query);
		$connection->close();
		if(!$res)
			return -1;
		$i = 0;
		while ($obj[$i] = $res->fetch_object())
			$i++;
		return $obj;
	}
?>