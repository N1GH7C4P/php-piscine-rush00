<?php

	include_once '../services/product_service.php';

	foreach ($_GET as $key => $value)
	{
		if ($key === "product_id")
			$product_id = $value;
	}
	foreach ($_POST as $key => $value)
	{
		if($key === "quantity")
			$quantity = $value;
	}

	$product = get_product_by_id($product_id);

	if(!$product)
		header("Location: ../index.php?error=no_such_product");
	if($quantity > $product->quantity)
		header("Location: ../index.php?error=insufficient_inventory");
	else
		header("Location: basket_controller.php?id=".$product_id."&quantity=".$quantity)
?>