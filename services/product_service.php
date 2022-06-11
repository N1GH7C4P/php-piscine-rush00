<?php

	include_once 'database_service.php';
	include_once 'account_service.php';
	include_once 'image_service.php';

	function add_product_to_basket($user_id, $product_id, $quantity)
	{
		$connection = connect_to_database();

		//Gets users basket
		$query = "SELECT * FROM `basket` WHERE `user_id`=".$user_id.";";
		$res = $connection->query($query);
		if(!$res)
			return -1;
		$basket_obj = $res->fetch_object();
		$basket_id = $basket_obj->id;

		//Inserts correct nb of items into the users basket.
		$query = "INSERT INTO `basket_item` (`id`, `basket_id`, `product_id`, `quantity`, `creation_time`) VALUES (NULL, ".$basket_id.", ".$product_id.", ".$quantity.", current_timestamp());";
		$connection->query($query);

		//Removes correct nb of products from inventory.
		$query = "UPDATE `products` SET `quantity`=`quantity`-".$quantity." WHERE `id`=".$product_id;
		$connection->close();
	}

	function create_basket($user_id)
	{
		$connection = connect_to_database();

		$query = "INSERT INTO `basket` (`id`, `user_id`, `price_total`, `creation_time`) VALUES (NULL, ".$user_id.", '0', current_timestamp());";
		$res = $connection->query($query);
		$connection->close();
		if(!$res)
			return -1;
		while ($obj = $res->fetch_object())
			return $obj;
	}

	function get_user_basket($id)
	{
		$connection = connect_to_database();
		$query = "SELECT * FROM `baskets` WHERE `user_id`=".$id.";";
		$res = $connection->query($query);
		if(!$res)
			return -1;
		while ($obj = $res->fetch_object())
			return $obj;
	}

	function get_products_in_users_basket($user_id)
	{
		$connection = connect_to_database();
		$query = "SELECT * FROM `products`
		LEFT JOIN `basket_item` ON `products`.`id`=`basket_item`.`product_id`
		LEFT JOIN `basket` ON `basket`.`id`=`basket_item`.`basket_id`
		LEFT JOIN `users` ON `users`.`id`=`basket`.`user_id`
		WHERE `users`.`id`=".$user_id.";";
		$res = $connection->query($query);
		if(!$res)
			return -1;
		while ($obj = $res->fetch_object())
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