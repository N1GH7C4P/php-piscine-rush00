<?php

	include_once 'database_service.php';
	include_once 'account_service.php';
	include_once 'image_service.php';

	function add_product_to_basket($user_id, $product_id, $quantity)
	{

	}

	function get_user_basket($id)
	{
		
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
		if(!$res)
			return -1;
		while ($obj = $res->fetch_object())
			show_product($obj);
	}

?>