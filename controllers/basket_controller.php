<?php

	include_once '../services/product_service.php';
	include_once '../services/account_service.php';
	session_start();

	foreach ($_GET as $key => $value)
	{
		if ($key === "id")
			$product_id = $value;
		if ($key === "quantity")
			$quantity = $value;
	}

	echo("product_id: ".$product_id."quantity: ".$quantity."user: ".$_SESSION['loggued_on_user']);
	if ($product_id && $quantity && $_SESSION['loggued_on_user'])
		add_product_to_users_basket($_SESSION['loggued_on_user'], $product_id, $quantity);
	else
		//header("Location: ../index.php?error=failed_to_add_product_to_basket");
	//header("Location: ../basket.php?user=".$_SESSION['loggued_on_user']);
?>