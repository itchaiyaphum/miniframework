## phpMyAdmin SQL Dump
## version 4.7.7
## https://www.phpmyadmin.net/
##
## Host: localhost:3306
## Generation Time: Nov 26, 2022 at 11:24 AM
## Server version: 5.6.38
## PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

##
## Database: `miniframework`
##

## ########################################################

##
## Table structure for table `provinces`
##

CREATE TABLE `provinces` (
  `id` int(11) NOT NULL,
  `province_name` varchar(20) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

##
## Dumping data for table `provinces`
##

INSERT INTO `provinces` (`id`, `province_name`, `status`) VALUES
(1, 'ชัยภูมิ', 1),
(2, 'กรุงเทพมหานคร', 1),
(3, 'เชียงใหม่', 1),
(4, 'เชียงราย', 1);

## ########################################################

##
## Table structure for table `users`
##

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

##
## Dumping data for table `users`
##

INSERT INTO `users` (`id`, `password`, `email`, `firstname`, `lastname`, `user_type`, `thumbnail`, `address`, `zip_code`, `province_id`, `mobile_no`, `status`, `created_at`, `updated_at`) VALUES
(1, '969d4e0dac684705b014dd00b501e63c', 'admin@demo.com', 'admin', 'demo', 'admin', '/storage/profiles/no-thumbnail.jpg', '', '', 2, '', 1, '2022-11-21 04:02:24', '2022-11-26 18:15:41'),
(2, '969d4e0dac684705b014dd00b501e63c', 'staff@demo.com', 'staff', 'demo', 'staff', '/storage/profiles/no-thumbnail.jpg', '', '', 1, '', 1, '2022-11-21 04:02:24', '2022-11-21 04:02:24'),
(3, '969d4e0dac684705b014dd00b501e63c', 'rider@demo.com', 'rider', 'demo', 'rider', '/storage/profiles/no-thumbnail.jpg', '', '', 1, '', 1, '2022-11-21 04:02:24', '2022-11-21 04:02:24'),
(4, '969d4e0dac684705b014dd00b501e63c', 'customer@demo.com', 'customer', 'demo', 'customer', '/storage/profiles/no-thumbnail.jpg', '', '', 1, '', 1, '2022-11-21 04:02:24', '2022-11-26 18:20:48');

##
## Indexes for dumped tables
##

##
## Indexes for table `provinces`
##
ALTER TABLE `provinces`
  ADD PRIMARY KEY (`id`);

##
## Indexes for table `users`
##
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

##
## AUTO_INCREMENT for dumped tables
##

##
## AUTO_INCREMENT for table `provinces`
##
ALTER TABLE `provinces`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

##
## AUTO_INCREMENT for table `users`
##
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
