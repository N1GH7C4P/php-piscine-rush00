<?php

include_once 'services/product_service.php';
include_once 'services/image_service.php';

?>

<html>
<head>
	<link rel="stylesheet" href="style.css" type="text/css">
</head>
<body>
<h1>Welcome to webshop!</h1>
	<div class="form-style-3">
		<h2> Our products </h2>
		<div>
			<?php show_all_products()?>
			<br>
			<a href="logout.php">logout</a>
			<a href="shop.php">shop</a>
			<a href="checkout.php">checkout</a>
			<a href="basket.php">basket</a>
		</div>
	</div>
</body>
</html>