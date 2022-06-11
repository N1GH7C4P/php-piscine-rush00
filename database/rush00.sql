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
(2, 5, 'hylje', '2022-06-10 12:08:51', 1),
(4, 6, 'Kasvi', '2022-06-10 12:08:32', 1),
(5, 8, 'saukko', '2022-06-10 12:09:43', 1),
(6, 2, 'Shirt', '2022-06-11 12:33:47', 0),
(7, 2, 'Pants', '2022-06-11 12:35:00', 0);

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
(1, 'Cool pants', 12, '2022-06-11 12:45:29', 7, 1, 'Very trendy, brown pants with preinstalled pockets for all of your butt covering needs.', 29.95),
(2, 'Work shirt', 9, '2022-06-11 12:47:01', 6, 2, 'A blue, workplace safe shirt to impress your co-workers and boss.', 14.95);

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
(2, 'shirts');

-- --------------------------------------------------------

--
-- Rakenne taululle `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Vedos taulusta `users`
--

INSERT INTO `users` (`id`, `name`, `password`, `email`) VALUES
(1, 'root', 'B24ED07C262D6AF9CD8871CB0EB5CA344EC96A7A8D614D2BF8584A3D59EE4D6626299302A54A9477F252E42EBE89FBD606322A3599B9C11454AB33E3DBAEBC54', ''),
(2, 'Kimmo', 'b24ed07c262d6af9cd8871cb0eb5ca344ec96a7a8d614d2bf8584a3d59ee4d6626299302a54a9477f252e42ebe89fbd606322a3599b9c11454ab33e3dbaebc54', ''),
(3, 'Yomyssy', 'b24ed07c262d6af9cd8871cb0eb5ca344ec96a7a8d614d2bf8584a3d59ee4d6626299302a54a9477f252e42ebe89fbd606322a3599b9c11454ab33e3dbaebc54', ''),
(5, 'Leo', 'b24ed07c262d6af9cd8871cb0eb5ca344ec96a7a8d614d2bf8584a3d59ee4d6626299302a54a9477f252e42ebe89fbd606322a3599b9c11454ab33e3dbaebc54', ''),
(6, 'Anton', 'b24ed07c262d6af9cd8871cb0eb5ca344ec96a7a8d614d2bf8584a3d59ee4d6626299302a54a9477f252e42ebe89fbd606322a3599b9c11454ab33e3dbaebc54', ''),
(7, 'Lauri', 'b24ed07c262d6af9cd8871cb0eb5ca344ec96a7a8d614d2bf8584a3d59ee4d6626299302a54a9477f252e42ebe89fbd606322a3599b9c11454ab33e3dbaebc54', ''),
(8, 'Mari', 'b24ed07c262d6af9cd8871cb0eb5ca344ec96a7a8d614d2bf8584a3d59ee4d6626299302a54a9477f252e42ebe89fbd606322a3599b9c11454ab33e3dbaebc54', '');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
