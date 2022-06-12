<?php

include_once 'services/product_service.php';
include_once 'services/image_service.php';
include_once 'services/account_service.php';

?>

<html>
<head>
	<link rel="stylesheet" href="style.css" type="text/css">
</head>
<body>
<h1>Welcome to webshop!</h1>
	<div class="form-style-3">
		<h2> basket </h2>
		<div>
			<?php
				session_start();
				$user = $_SESSION['loggued_on_user'];
				if(!$user)
					header("Location: index.php?error=not_logged_in");
				$products = get_products_in_users_basket(get_id_by_login($user));
				//echo("<b> products in basket </b>");
				print_r($products);
				//$basket = get_user_basket(get_id_by_login($user));
				echo("img_id: ".$products[0]->image_id);
				show_image($products[0]->image_id);
				//echo("<b> products in basket </b>");
				//print_r($basket);
			?>
		</div>
	</div>
</body>
</html>