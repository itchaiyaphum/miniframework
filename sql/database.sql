-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 11, 2022 at 06:10 PM
-- Server version: 5.6.38
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `miniframework`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `restaurant_id` int(11) NOT NULL,
  `food_id` int(11) NOT NULL,
  `food_amount` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `food_categories`
--

CREATE TABLE `food_categories` (
  `id` int(11) NOT NULL,
  `restaurant_id` int(11) NOT NULL DEFAULT '0',
  `title` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `food_categories`
--

INSERT INTO `food_categories` (`id`, `restaurant_id`, `title`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 'ประเภทต้ม', 1, '2022-11-28 00:00:00', '2022-12-11 15:19:43'),
(2, 2, 'ประเภทผัด', 1, '2022-11-28 00:00:00', '2022-12-11 15:27:21'),
(4, 2, 'ประเภททอด', 1, '2022-12-11 15:30:08', '2022-12-11 15:30:08'),
(5, 0, 'ประเภทเผา', 1, '2022-12-11 16:32:52', '2022-12-11 16:32:52');

-- --------------------------------------------------------

--
-- Table structure for table `food_menus`
--

CREATE TABLE `food_menus` (
  `id` int(11) NOT NULL,
  `restaurant_id` int(11) NOT NULL DEFAULT '0',
  `food_category_id` int(11) NOT NULL DEFAULT '0',
  `title` varchar(255) NOT NULL,
  `price` int(11) NOT NULL DEFAULT '0',
  `discount_percent` tinyint(2) NOT NULL DEFAULT '0',
  `thumbnail` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `food_menus`
--

INSERT INTO `food_menus` (`id`, `restaurant_id`, `food_category_id`, `title`, `price`, `discount_percent`, `thumbnail`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 'ต้มยำปลากระบอก (หม้อไฟ)', 100, 10, '/storage/food/91d2cd2b1e21143db7580cc3b956fffb.png', 1, '2022-11-28 00:00:00', '2022-12-11 16:30:52'),
(2, 2, 4, 'ปลากระพงทอดน้ำปลา', 300, 0, '/storage/food/ebbb2f0e5d0f2c548962073afd26b2d9.png', 1, '2022-11-28 00:00:00', '2022-12-11 16:31:22'),
(4, 2, 5, 'กุ้งเผา', 500, 10, '/storage/food/d13ccbfb9d1edc2803c569a0667f5883.png', 1, '2022-12-11 16:31:45', '2022-12-11 16:32:58');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL DEFAULT '0',
  `restaurant_id` int(11) NOT NULL DEFAULT '0',
  `total_price` double NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `restaurant_id`, `total_price`, `created_at`, `updated_at`, `status`) VALUES
(4, 4, 2, 2040, '2022-12-12 00:34:20', '2022-12-12 00:34:20', 0),
(5, 4, 2, 90, '2022-12-12 00:59:36', '2022-12-12 00:59:36', 0);

-- --------------------------------------------------------

--
-- Table structure for table `orders_items`
--

CREATE TABLE `orders_items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL DEFAULT '0',
  `food_id` int(11) NOT NULL DEFAULT '0',
  `food_price` double NOT NULL DEFAULT '0',
  `food_discount_price` double NOT NULL DEFAULT '0',
  `food_amount` double NOT NULL,
  `food_total` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders_items`
--

INSERT INTO `orders_items` (`id`, `order_id`, `food_id`, `food_price`, `food_discount_price`, `food_amount`, `food_total`) VALUES
(3, 3, 1, 100, 90, 1, 90),
(4, 3, 1, 100, 90, 1, 90),
(5, 3, 1, 100, 90, 1, 90),
(6, 3, 1, 100, 90, 1, 90),
(7, 3, 1, 100, 90, 1, 90),
(8, 3, 1, 100, 90, 1, 90),
(9, 3, 2, 300, 300, 1, 300),
(10, 3, 2, 300, 300, 1, 300),
(11, 3, 4, 500, 450, 1, 450),
(12, 3, 4, 500, 450, 1, 450),
(13, 4, 1, 100, 90, 1, 90),
(14, 4, 1, 100, 90, 1, 90),
(15, 4, 1, 100, 90, 1, 90),
(16, 4, 1, 100, 90, 1, 90),
(17, 4, 1, 100, 90, 1, 90),
(18, 4, 1, 100, 90, 1, 90),
(19, 4, 2, 300, 300, 1, 300),
(20, 4, 2, 300, 300, 1, 300),
(21, 4, 4, 500, 450, 1, 450),
(22, 4, 4, 500, 450, 1, 450),
(23, 5, 1, 100, 90, 1, 90);

-- --------------------------------------------------------

--
-- Table structure for table `restaurant_types`
--

CREATE TABLE `restaurant_types` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `thumbnail` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `restaurant_types`
--

INSERT INTO `restaurant_types` (`id`, `title`, `thumbnail`, `status`, `created_at`, `updated_at`) VALUES
(1, 'อาหารอีสาน1', '/storage/restaurant_type/eaa8275c0a8a016093a0034500ef722d.png', 1, '2022-11-28 16:04:15', '2022-12-11 13:25:18'),
(2, 'อาหารอินเดีย', '/storage/restaurant_type/dfb67fb48d9da0004a7e738809651979.png', 1, '2022-11-28 00:00:00', '2022-12-11 13:25:54'),
(3, 'อาหารใต้', '/storage/restaurant_type/1d5d39888193bdb72ab7fc1c9ce8302e.png', 1, '2022-11-28 00:00:00', '2022-12-11 13:26:27'),
(19, 'อาหารไทย', '/storage/restaurant_type/af895fbe81a26191cdc7d8e122a8b99b.png', 1, '2022-12-11 13:32:51', '2022-12-11 13:33:40'),
(20, 'อาหารนานาชาติ', '/storage/restaurant_type/3ac449820d44c18443b349046c62fb59.png', 1, '2022-12-11 13:34:34', '2022-12-11 13:34:34');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL DEFAULT '0',
  `user_id` int(11) NOT NULL DEFAULT '0',
  `restaurant_id` int(11) NOT NULL DEFAULT '0',
  `detail` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `order_id`, `user_id`, `restaurant_id`, `detail`, `created_at`, `updated_at`) VALUES
(1, 1, 4, 2, 'สมคำลำรือกับร้านจริงๆครับ', '2022-12-11 00:00:00', '0000-00-00 00:00:00'),
(2, 2, 4, 2, 'อร่อยที่สุดเลย', '2022-12-07 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `password` varchar(255) COLLATE utf8_bin NOT NULL,
  `email` varchar(100) COLLATE utf8_bin NOT NULL,
  `firstname` varchar(50) COLLATE utf8_bin NOT NULL,
  `lastname` varchar(50) COLLATE utf8_bin NOT NULL,
  `user_type` varchar(20) COLLATE utf8_bin NOT NULL DEFAULT 'customer',
  `thumbnail` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '/storage/profiles/no-thumbnail.jpg',
  `address` varchar(255) COLLATE utf8_bin NOT NULL,
  `restaurant_name` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `restaurant_type_id` int(11) NOT NULL DEFAULT '0',
  `restaurant_address` varchar(255) COLLATE utf8_bin NOT NULL,
  `restaurant_thumbnail` varchar(255) COLLATE utf8_bin NOT NULL,
  `mobile_no` varchar(50) COLLATE utf8_bin NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `password`, `email`, `firstname`, `lastname`, `user_type`, `thumbnail`, `address`, `restaurant_name`, `restaurant_type_id`, `restaurant_address`, `restaurant_thumbnail`, `mobile_no`, `status`, `created_at`, `updated_at`) VALUES
(1, '969d4e0dac684705b014dd00b501e63c', 'admin@demo.com', 'admin', 'demo', 'admin', '/storage/profile/ecf308c276207a3a93d8550b5b833c71.png', '240 Nai Mueang, Mueang, Chaiyaphum', '', 0, '', '', '096-520-7008', 1, '2022-11-21 04:02:24', '2022-12-11 11:57:29'),
(2, '969d4e0dac684705b014dd00b501e63c', 'staff@demo.com', 'staff', 'demo', 'staff', '/storage/profile/4cd333703b7266c1ff58fb20b216bb2c.png', '18/116 ซอยสุขสวัสดิ์ 30 แยก 8-2', 'ร้านไก่ย่าง 1', 1, '18/116 ซอยสุขสวัสดิ์ 30 แยก 8-2', '/storage/restaurant/6f8225107bc367e850760bfbc5a689fb.png', '0965207008', 1, '2022-11-21 04:02:24', '2022-12-11 12:49:17'),
(3, '969d4e0dac684705b014dd00b501e63c', 'rider@demo.com', 'rider', 'demo', 'rider', '/storage/profile/e8c3fac855dc95fd78a08363cf459a5f.png', '18/116 ซอยสุขสวัสดิ์ 30 แยก 8-2', '', 0, '', '', '0965207008', 1, '2022-11-21 04:02:24', '2022-12-11 15:06:50'),
(4, '969d4e0dac684705b014dd00b501e63c', 'customer@demo.com', 'customer', 'demo', 'customer', '/storage/profile/2dd345c57ed613648079d161721700fd.png', '18/116 ซอยสุขสวัสดิ์ 30 แยก 8-2', '', 0, '', '', '0965207008', 1, '2022-11-21 04:02:24', '2022-12-11 15:01:56');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `food_categories`
--
ALTER TABLE `food_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `food_menus`
--
ALTER TABLE `food_menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders_items`
--
ALTER TABLE `orders_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `restaurant_types`
--
ALTER TABLE `restaurant_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `food_categories`
--
ALTER TABLE `food_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `food_menus`
--
ALTER TABLE `food_menus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `orders_items`
--
ALTER TABLE `orders_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `restaurant_types`
--
ALTER TABLE `restaurant_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
