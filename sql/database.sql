-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 28, 2022 at 09:20 AM
-- Server version: 5.6.38
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `miniframework`
--

-- --------------------------------------------------------

--
-- Table structure for table `provinces`
--

CREATE TABLE `provinces` (
  `id` int(11) NOT NULL,
  `province_name` varchar(20) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `provinces`
--

INSERT INTO `provinces` (`id`, `province_name`, `status`) VALUES
(1, 'ชัยภูมิ', 1),
(2, 'กรุงเทพมหานคร', 1),
(3, 'เชียงใหม่', 1),
(4, 'เชียงราย', 1);

-- --------------------------------------------------------

--
-- Table structure for table `restaurants`
--

CREATE TABLE `restaurants` (
  `id` int(11) NOT NULL,
  `restaurant_type_id` int(11) NOT NULL DEFAULT '0',
  `title` varchar(255) NOT NULL,
  `staff_id` int(11) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `restaurants`
--

INSERT INTO `restaurants` (`id`, `restaurant_type_id`, `title`, `staff_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'ส้มตำเจ้น้ำ', 2, 1, '2022-11-28 00:00:00', '2022-11-28 16:16:33');

-- --------------------------------------------------------

--
-- Table structure for table `restaurant_types`
--

CREATE TABLE `restaurant_types` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `restaurant_types`
--

INSERT INTO `restaurant_types` (`id`, `title`, `status`, `created_at`, `updated_at`) VALUES
(1, 'อาหารอีสาน', 1, '2022-11-28 16:04:15', '2022-11-28 16:16:22'),
(2, 'อาหารอินเดีย', 0, '2022-11-28 00:00:00', '2022-11-28 16:05:32'),
(3, 'อาหารใต้', 1, '2022-11-28 00:00:00', '0000-00-00 00:00:00'),
(4, 'อาหารไทย', 0, '2022-11-28 00:00:00', '0000-00-00 00:00:00'),
(5, 'อาหารเหนือ', 1, '2022-11-28 00:00:00', '0000-00-00 00:00:00'),
(7, 'อาหารนานาชาติ', 1, '2022-11-28 00:00:00', '0000-00-00 00:00:00'),
(8, 'อาหารสุขภาพ', 0, '2022-11-28 00:00:00', '0000-00-00 00:00:00'),
(9, 'อาหารตามสั่ง', 0, '2022-11-28 00:00:00', '0000-00-00 00:00:00'),
(10, 'อาหารทะเล', 1, '2022-11-28 00:00:00', '0000-00-00 00:00:00'),
(11, 'แฮมเบอร์เกอร์', 0, '2022-11-28 00:00:00', '0000-00-00 00:00:00'),
(12, 'ไก่ทอด', 0, '2022-11-28 00:00:00', '0000-00-00 00:00:00'),
(13, 'ชาบู/สุกี้', 0, '2022-11-28 00:00:00', '0000-00-00 00:00:00'),
(14, 'ชานมไข่มุก', 0, '2022-11-28 00:00:00', '0000-00-00 00:00:00'),
(15, 'เบเกอรี่', 0, '2022-11-28 00:00:00', '0000-00-00 00:00:00'),
(16, 'เครื่องดื่ม', 0, '2022-11-28 00:00:00', '0000-00-00 00:00:00'),
(17, 'ของหวาน', 0, '2022-11-28 00:00:00', '0000-00-00 00:00:00'),
(18, 'ของทอด', 0, '2022-11-28 00:00:00', '0000-00-00 00:00:00');

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
  `zip_code` varchar(5) COLLATE utf8_bin NOT NULL,
  `province_id` int(11) NOT NULL DEFAULT '1',
  `mobile_no` varchar(50) COLLATE utf8_bin NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `password`, `email`, `firstname`, `lastname`, `user_type`, `thumbnail`, `address`, `zip_code`, `province_id`, `mobile_no`, `status`, `created_at`, `updated_at`) VALUES
(1, '969d4e0dac684705b014dd00b501e63c', 'admin@demo.com', 'admin', 'demo', 'admin', '/storage/profiles/no-thumbnail.jpg', '240 Nai Mueang, Mueang, Chaiyaphum', '36000', 2, '096-520-7008', 1, '2022-11-21 04:02:24', '2022-11-28 11:03:03'),
(2, '969d4e0dac684705b014dd00b501e63c', 'staff@demo.com', 'staff', 'demo', 'staff', '/storage/profiles/no-thumbnail.jpg', '', '', 1, '', 1, '2022-11-21 04:02:24', '2022-11-21 04:02:24'),
(3, '969d4e0dac684705b014dd00b501e63c', 'rider@demo.com', 'rider', 'demo', 'rider', '/storage/profiles/no-thumbnail.jpg', '18/116 ซอยสุขสวัสดิ์ 30 แยก 8-2', '10140', 1, '0965207008', 1, '2022-11-21 04:02:24', '2022-11-28 15:05:47'),
(4, '969d4e0dac684705b014dd00b501e63c', 'customer@demo.com', 'customer', 'demo', 'customer', '/storage/profiles/no-thumbnail.jpg', '18/116 ซอยสุขสวัสดิ์ 30 แยก 8-2', '10140', 1, '0965207008', 1, '2022-11-21 04:02:24', '2022-11-28 15:03:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `provinces`
--
ALTER TABLE `provinces`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `restaurants`
--
ALTER TABLE `restaurants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `restaurant_types`
--
ALTER TABLE `restaurant_types`
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
-- AUTO_INCREMENT for table `provinces`
--
ALTER TABLE `provinces`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `restaurants`
--
ALTER TABLE `restaurants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `restaurant_types`
--
ALTER TABLE `restaurant_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
