<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="preconnect" href="https://fonts.googleapis.com" />
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
		<link
			href="https://fonts.googleapis.com/css2?family=Pacifico&family=Montserrat:wght@400;600&display=swap"
			rel="stylesheet"
		/>
		<link rel="stylesheet" href="styles.css" />
		<title>Product</title>
	</head>
	<body>
		<h1>Product template</h1>
		<div class="product-container">
			<div class="product-card">
				<div class="product-name">
					<h2>fjällräven vardag</h2>
				</div>
				<div class="product-img">
					<img
						src="https://scandinavianoutdoor.imgix.net/dynamic/productimages/sizes/full/d125cbe2-1b60-4f79-bce6-59a0a0bf0499.jpeg?w=1090&h=595&auto=compress,format&trim=auto&trim-sd=1"
						alt=""
					/>
				</div>
				<p>
					Lorem ipsum dolor sit amet consectetur adipisicing elit. Commodi placeat adipisci architecto omnis
					quod ipsa et quia natus possimus id?
				</p>
				<?php
				echo('
				<form action="basket_controller.php?id='.$product_id.' method="POST">
					<label for="qty">Quantity</label>
					<input type="number" name="qty" id="qty" value="" />
					<input type="submit" name="submit" value="Add to basket" />
				</form>
				')
				?>
			</div>
			<?php foreach ($array as $product=>$value) : ?>
			<div class="product-card">
				<div class="product-name">
					<h2><?php echo $product ?></h2>
				</div>
				<div class="product-img">
					<img
						src="https://scandinavianoutdoor.imgix.net/dynamic/productimages/sizes/full/d125cbe2-1b60-4f79-bce6-59a0a0bf0499.jpeg?w=1090&h=595&auto=compress,format&trim=auto&trim-sd=1"
						alt=""
					/>
				</div>
				<p>
					Lorem ipsum dolor sit amet consectetur adipisicing elit. Commodi placeat adipisci architecto omnis
					quod ipsa et quia natus possimus id?
				</p>
				<form action="" method="POST">
					<label for="qty">Quantity</label>
					<input type="number" name="qty" id="qty" value="" />
					<input type="submit" name="submit" value="Add to basket" />
				</form>
			</div>
			<?php endforeach; ?>

			<div class="product-card">
				<div class="product-name">
					<h2>fjällräven vardag</h2>
				</div>
				<div class="product-img">
					<img
						src="https://scandinavianoutdoor.imgix.net/dynamic/productimages/sizes/full/d125cbe2-1b60-4f79-bce6-59a0a0bf0499.jpeg?w=1090&h=595&auto=compress,format&trim=auto&trim-sd=1"
						alt=""
					/>
				</div>
				<p>
					Lorem ipsum dolor sit amet consectetur adipisicing elit. Commodi placeat adipisci architecto omnis
					quod ipsa et quia natus possimus id?
				</p>
				<form action="" method="POST">
					<label for="qty">Quantity</label>
					<input type="number" name="qty" id="qty" value="" />
					<input type="submit" name="submit" value="Add to basket" />
				</form>
			</div>

			<div class="product-card">
				<div class="product-name">
					<h2>fjällräven vardag</h2>
				</div>
				<div class="product-img">
					<img
						src="https://scandinavianoutdoor.imgix.net/dynamic/productimages/sizes/full/d125cbe2-1b60-4f79-bce6-59a0a0bf0499.jpeg?w=1090&h=595&auto=compress,format&trim=auto&trim-sd=1"
						alt=""
					/>
				</div>
				<p>
					Lorem ipsum dolor sit amet consectetur adipisicing elit. Commodi placeat adipisci architecto omnis
					quod ipsa et quia natus possimus id?
				</p>
				<form action="" method="POST">
					<label for="qty">Quantity</label>
					<input type="number" name="qty" id="qty" value="" />
					<input type="submit" name="submit" value="Add to basket" />
				</form>
			</div>

			<div class="product-card">
				<div class="product-name">
					<h2>fjällräven vardag</h2>
				</div>
				<div class="product-img">
					<img
						src="https://scandinavianoutdoor.imgix.net/dynamic/productimages/sizes/full/d125cbe2-1b60-4f79-bce6-59a0a0bf0499.jpeg?w=1090&h=595&auto=compress,format&trim=auto&trim-sd=1"
						alt=""
					/>
				</div>
				<p>
					Lorem ipsum dolor sit amet consectetur adipisicing elit. Commodi placeat adipisci architecto omnis
					quod ipsa et quia natus possimus id?
				</p>
				<form action="" method="POST">
					<label for="qty">Quantity</label>
					<input type="number" name="qty" id="qty" value="" />
					<input type="submit" name="submit" value="Add to basket" />
				</form>
			</div>

			<div class="product-card">
				<div class="product-name">
					<h2>fjällräven vardag</h2>
				</div>
				<div class="product-img">
					<img
						src="https://scandinavianoutdoor.imgix.net/dynamic/productimages/sizes/full/d125cbe2-1b60-4f79-bce6-59a0a0bf0499.jpeg?w=1090&h=595&auto=compress,format&trim=auto&trim-sd=1"
						alt=""
					/>
				</div>
				<p>
					Lorem ipsum dolor sit amet consectetur adipisicing elit. Commodi placeat adipisci architecto omnis
					quod ipsa et quia natus possimus id?
				</p>
				<form action="" method="POST">
					<label for="qty">Quantity</label>
					<input type="number" name="qty" id="qty" value="" />
					<input type="submit" name="submit" value="Add to basket" />
				</form>
			</div>

			<div class="product-card">
				<div class="product-name">
					<h2>fjällräven vardag</h2>
				</div>
				<div class="product-img">
					<img
						src="https://scandinavianoutdoor.imgix.net/dynamic/productimages/sizes/full/d125cbe2-1b60-4f79-bce6-59a0a0bf0499.jpeg?w=1090&h=595&auto=compress,format&trim=auto&trim-sd=1"
						alt=""
					/>
				</div>
				<p>
					Lorem ipsum dolor sit amet consectetur adipisicing elit. Commodi placeat adipisci architecto omnis
					quod ipsa et quia natus possimus id?
				</p>
				<form action="" method="POST">
					<label for="qty">Quantity</label>
					<input type="number" name="qty" id="qty" value="" />
					<input type="submit" name="submit" value="Add to basket" />
				</form>
			</div>
		</div>
	</body>
</html>