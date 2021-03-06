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
				$basket = get_user_basket(get_id_by_login($user));
				$i = 0;
				while($products[$i])
				{
					echo($products[$i]['name']."<br>");
					show_image($products[$i]['image_id']);
					echo($products[$i]['description']);
					$i++;
				}
				echo("<br> <b> total price: ".$basket['price_total']."</b>");
				echo('<form action="controllers/order_controller.php" method="post">
						<input type="submit" name=submit value="Order items">
					</form>');
			?>
			<br>
			<a href="logout.php">logout</a>
			<a href="shop.php">shop</a>
			<a href="basket.php">basket</a>
		</div>
	</div>
</body>
</html>