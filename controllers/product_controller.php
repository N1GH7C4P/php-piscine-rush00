<?php

	include_once '../services/product_service.php';

	foreach ($_GET as $key => $value)
	{
		if ($key === "product_id")
			$product_id = filter_var($value,  FILTER_SANITIZE_FULL_SPECIAL_CHARS);
	}
	foreach ($_POST as $key => $value)
	{
		if($key === "quantity")
			$quantity = filter_var($value, FILTER_VALIDATE_INT);
	}
	$product = get_product_by_id($product_id);

	if(!$product)
		header("Location: ../index.php?error=no_such_product");
	if($quantity > $product[2])
		header("Location: ../index.php?error=insufficient_inventory");
	else
		header("Location: basket_controller.php?id=".$product_id."&quantity=".$quantity)
?>