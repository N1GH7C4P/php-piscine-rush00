-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: 11.06.2022 klo 13:50
-- Palvelimen versio: 10.4.21-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rush00`
--

-- --------------------------------------------------------

--
-- Rakenne taululle `basket`
--

CREATE TABLE `basket` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `price_total` int(11) NOT NULL,
  `creation_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Rakenne taululle `basket_item`
--

CREATE TABLE `basket_item` (
  `id` int(11) NOT NULL,
  `basket_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `creation_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Rakenne taululle `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `uploader_id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_profile_pic` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Vedos taulusta `images`
--

INSERT INTO `images` (`id`, `uploader_id`, `name`, `timestamp`, `is_profile_pic`) VALUES
(1, 2, 'Default', '2022-06-03 13:27:06', 1),
(8, 10, 'AnorakBlack', '2022-06-11 15:20:18', 0),
(9, 10, 'BasicTeeBlue', '2022-06-11 15:21:27', 0),
(10, 10, 'BasicTeeWhite', '2022-06-11 15:21:27', 0),
(11, 10, 'BeanieSpruce', '2022-06-11 15:22:25', 0),
(12, 10, 'BoxerFlower', '2022-06-11 15:22:25', 0),
(13, 10, 'BoxerShroom', '2022-06-11 15:23:05', 0),
(14, 10, 'BoxerShroomB', '2022-06-11 15:23:05', 0),
(15, 10, 'BoxerTieDye', '2022-06-11 15:23:41', 0),
(16, 10, 'BucketHatOrange', '2022-06-11 15:23:41', 0),
(17, 10, 'CampShirtPlaid', '2022-06-11 15:24:30', 0),
(18, 10, 'CapKhaki', '2022-06-11 15:24:30', 0),
(19, 10, 'JacketGreen', '2022-06-11 15:25:07', 0),
(20, 10, 'LongSleeveBlue', '2022-06-11 15:25:07', 0),
(21, 10, 'PantWhite', '2022-06-11 15:25:42', 0),
(22, 10, 'PocketShirtPlaid', '2022-06-11 15:25:42', 0),
(23, 10, 'PocketShirtRusset', '2022-06-11 15:26:45', 0),
(24, 10, 'PocketTeeMarigold', '2022-06-11 15:26:45', 0),
(25, 10, 'PocketTeeOlive', '2022-06-11 15:28:29', 0),
(26, 10, 'DenimShirtBlack', '2022-06-11 15:28:29', 0),
(27, 10, 'ShortsBlack', '2022-06-11 15:29:22', 0),
(28, 10, 'SockOatmeal', '2022-06-11 15:29:22', 0),
(29, 10, 'SockTurmeric', '2022-06-11 15:29:47', 0),
(30, 10, 'SockWhite', '2022-06-11 15:29:47', 0),
(31, 10, 'TarvasBlack', '2022-06-11 15:31:01', 0),
(32, 10, 'TarvasCanvas', '2022-06-11 15:31:01', 0),
(33, 10, 'TarvasOchre', '2022-06-11 15:31:29', 0);

-- --------------------------------------------------------

--
-- Rakenne taululle `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `total_sum` int(11) NOT NULL,
  `creation_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` varchar(20) NOT NULL DEFAULT '''pending''',
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Rakenne taululle `order_products`
--

CREATE TABLE `order_products` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Rakenne taululle `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `quantity` int(11) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp(),
  `image_id` int(11) NOT NULL,
  `category` int(11) NOT NULL,
  `description` varchar(100) NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Vedos taulusta `products`
--

INSERT INTO `products` (`id`, `name`, `quantity`, `date_added`, `image_id`, `category`, `description`, `price`) VALUES
(8, 'Anorak Black', 11, '2022-06-11 16:24:03', 8, 3, 'Water repellant taslan nylon. Comfy hand pockets. Deep zip on the right side. ', 285),
(9, 'Basic Tee Blue', 11, '2022-06-11 16:26:32', 9, 2, 'Classic fit. 30% Hemp. 70% Organic Cotton.', 44),
(10, 'Basic Tee White', 11, '2022-06-11 16:26:32', 10, 2, 'Classic fit. 30% Hemp. 70% Organic Cotton.', 44),
(11, 'Beanie Spruce', 11, '2022-06-11 16:29:29', 11, 4, 'Recycled Scottish cashmere yarn ribbed beanie.', 128),
(12, 'Boxer Flower', 11, '2022-06-11 16:29:29', 12, 6, '100% Organic Cotton lightweight woven boxer short.', 34),
(13, 'Boxer Shroom Olive', 11, '2022-06-11 16:31:29', 13, 6, '100% Organic Cotton lightweight woven boxer short.', 34),
(14, 'Boxer Shroom White', 11, '2022-06-11 16:31:29', 14, 6, '100% Organic Cotton lightweight woven boxer short.', 34),
(15, 'Boxer TieDye', 11, '2022-06-11 16:33:26', 15, 6, '100% Organic Cotton lightweight woven boxer short.', 34),
(16, 'Bucket Hat Orange', 11, '2022-06-11 16:33:26', 16, 4, 'Water-repellent Taslan Nylon (100% Nylon) bucket hat.', 70),
(17, 'Camp Shirt Plaid', 11, '2022-06-11 16:35:52', 17, 2, '100% cotton camp shirt. Made in NYC at a family run factory.\r\n', 198),
(18, 'Cap Khaki', 11, '2022-06-11 16:35:52', 18, 4, 'Cotton Twill (100% Cotton) cap. One size fits all.', 60),
(19, 'Jacket Green', 11, '2022-06-11 16:38:41', 19, 3, 'Green jacked made from water repellant taslan nylon.', 270),
(20, 'Long Sleeve Blue', 11, '2022-06-11 16:42:21', 20, 2, 'Long sleeve blue shirt made from 100% Japanese Cotton Twill.', 135),
(21, 'Pants White', 11, '2022-06-11 16:42:21', 21, 1, 'White pants made from 100% Japanese Cotton Twill.', 125),
(22, 'Pocket Shirt Plaid', 11, '2022-06-12 08:29:43', 22, 2, 'The Double Pocket Shirt is our take on a classic work shirt. 100% Deadstock Wool.', 295),
(23, 'Pocket Shirt Russet', 11, '2022-06-12 08:26:16', 23, 2, 'The Double Pocket Shirt is our take on a classic work shirt. 100% Deadstock Wool.', 295),
(24, 'Pocket Tee Marigold', 11, '2022-06-12 08:26:16', 24, 2, 'Classic fit tee with left chest pocket. 55% Hemp. 45% Organic Cotton.', 62),
(25, 'Pocket Tee Olive', 11, '2022-06-12 08:24:03', 25, 2, 'Classic fit tee with left chest pocket. 55% Hemp. 45% Organic Cotton.', 62),
(26, 'Denim Shirt Black', 11, '2022-06-11 16:38:41', 26, 2, 'Denim shirt made from a deadstock 100% cotton bull denim.', 225),
(27, 'Shorts Black', 11, '2022-06-12 08:24:03', 27, 1, 'Black drawstring shorts made from washed linen.', 78),
(28, 'Socks Oatmeal', 11, '2022-06-12 08:19:20', 28, 6, 'Recycled cotton & organic cotton tie-dye yarn melange sock.', 28),
(29, 'Socks Turmeric', 11, '2022-06-12 08:19:20', 29, 6, 'Organic cotton boot sock.', 28),
(30, 'Socks White', 11, '2022-06-12 08:16:17', 30, 6, 'Ethically sourced Merino Wool house sock.', 28),
(31, 'Tarvas Black', 11, '2022-06-12 08:16:17', 31, 5, 'Tarvas Black. Water repellant suede leather upper. Natural rubber sole. ', 290),
(32, 'Tarvas Canvas', 11, '2022-06-12 08:12:33', 32, 5, 'Tarvas Canvas. Beeswax treated canvas upper. Natural rubber sole.', 275),
(33, 'Tarvas Ochre', 11, '2022-06-12 08:12:33', 33, 5, 'Tarvas Ochre. Water repellant suede leather upper. Natural rubber sole.', 290);

-- --------------------------------------------------------

--
-- Rakenne taululle `product_categories`
--

CREATE TABLE `product_categories` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Vedos taulusta `product_categories`
--

INSERT INTO `product_categories` (`id`, `name`) VALUES
(1, 'pants'),
(2, 'shirts'),
(3, 'outerwear'),
(4, 'hats'),
(5, 'footwear'),
(6, 'socks & underwear'),
(7, 'all clothing');

-- --------------------------------------------------------

--
-- Rakenne taululle `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Vedos taulusta `users`
--

INSERT INTO `users` (`id`, `name`, `password`) VALUES
(1, 'root', 'B24ED07C262D6AF9CD8871CB0EB5CA344EC96A7A8D614D2BF8584A3D59EE4D6626299302A54A9477F252E42EBE89FBD606322A3599B9C11454AB33E3DBAEBC54'),
(2, 'Kimmo', 'b24ed07c262d6af9cd8871cb0eb5ca344ec96a7a8d614d2bf8584a3d59ee4d6626299302a54a9477f252e42ebe89fbd606322a3599b9c11454ab33e3dbaebc54'),
(3, 'Yomyssy', 'b24ed07c262d6af9cd8871cb0eb5ca344ec96a7a8d614d2bf8584a3d59ee4d6626299302a54a9477f252e42ebe89fbd606322a3599b9c11454ab33e3dbaebc54'),
(5, 'Leo', 'b24ed07c262d6af9cd8871cb0eb5ca344ec96a7a8d614d2bf8584a3d59ee4d6626299302a54a9477f252e42ebe89fbd606322a3599b9c11454ab33e3dbaebc54'),
(6, 'Anton', 'b24ed07c262d6af9cd8871cb0eb5ca344ec96a7a8d614d2bf8584a3d59ee4d6626299302a54a9477f252e42ebe89fbd606322a3599b9c11454ab33e3dbaebc54'),
(7, 'Lauri', 'b24ed07c262d6af9cd8871cb0eb5ca344ec96a7a8d614d2bf8584a3d59ee4d6626299302a54a9477f252e42ebe89fbd606322a3599b9c11454ab33e3dbaebc54'),
(8, 'Mari', 'b24ed07c262d6af9cd8871cb0eb5ca344ec96a7a8d614d2bf8584a3d59ee4d6626299302a54a9477f252e42ebe89fbd606322a3599b9c11454ab33e3dbaebc54'),
(10, 'balbaugh', '413fb23a489ffd80570faa2e63c65ae7daeece1e879b9079299391f34f4f1f0d660a53e33ef0432beceb0c6f008bd7e9b563424e5111a094f7c0ed1d8c951a32');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `basket`
--
ALTER TABLE `basket`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Users basket` (`user_id`);

--
-- Indexes for table `basket_item`
--
ALTER TABLE `basket_item`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Item in a basket` (`basket_id`),
  ADD KEY `Items product` (`product_id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Image uploader` (`uploader_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Customer` (`user_id`);

--
-- Indexes for table `order_products`
--
ALTER TABLE `order_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Orders products` (`product_id`),
  ADD KEY `Orders details` (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Products image` (`image_id`),
  ADD KEY `Products category` (`category`);

--
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `basket`
--
ALTER TABLE `basket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `basket_item`
--
ALTER TABLE `basket_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_products`
--
ALTER TABLE `order_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Rajoitteet vedostauluille
--

--
-- Rajoitteet taululle `basket`
--
ALTER TABLE `basket`
  ADD CONSTRAINT `Users basket` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Rajoitteet taululle `basket_item`
--
ALTER TABLE `basket_item`
  ADD CONSTRAINT `Item in a basket` FOREIGN KEY (`basket_id`) REFERENCES `basket` (`id`),
  ADD CONSTRAINT `Items product` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Rajoitteet taululle `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `Image uploader` FOREIGN KEY (`uploader_id`) REFERENCES `users` (`id`);

--
-- Rajoitteet taululle `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `Customer` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Rajoitteet taululle `order_products`
--
ALTER TABLE `order_products`
  ADD CONSTRAINT `Orders details` FOREIGN KEY (`order_id`) REFERENCES `order_details` (`id`),
  ADD CONSTRAINT `Orders products` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Rajoitteet taululle `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `Products category` FOREIGN KEY (`category`) REFERENCES `product_categories` (`id`),
  ADD CONSTRAINT `Products image` FOREIGN KEY (`image_id`) REFERENCES `images` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
