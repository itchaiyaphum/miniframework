SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

##
## Database: `miniframework`
##


############################ TABLE: users ##############################
CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `password` varchar(255) COLLATE utf8_bin NOT NULL,
  `email` varchar(100) COLLATE utf8_bin NOT NULL,
  `firstname` varchar(50) COLLATE utf8_bin NOT NULL,
  `lastname` varchar(50) COLLATE utf8_bin NOT NULL,
  `user_type` varchar(20) COLLATE utf8_bin NOT NULL DEFAULT 'customer',
  `thumbnail` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '/storage/profiles/no-thumbnail.jpg',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO `users` (`id`, `password`, `email`, `firstname`, `lastname`, `user_type`, `thumbnail`, `status`, `created_at`, `updated_at`) VALUES
(1, '969d4e0dac684705b014dd00b501e63c', 'admin@demo.com', 'admin', 'demo', 'admin', '/storage/profiles/no-thumbnail.jpg', 1, '2022-11-21 04:02:24', '2022-11-21 04:02:24'),
(2, '969d4e0dac684705b014dd00b501e63c', 'staff@demo.com', 'staff', 'demo', 'staff', '/storage/profiles/no-thumbnail.jpg', 1, '2022-11-21 04:02:24', '2022-11-21 04:02:24'),
(3, '969d4e0dac684705b014dd00b501e63c', 'rider@demo.com', 'rider', 'demo', 'rider', '/storage/profiles/no-thumbnail.jpg', 1, '2022-11-21 04:02:24', '2022-11-21 04:02:24'),
(4, '969d4e0dac684705b014dd00b501e63c', 'customer@demo.com', 'customer', 'demo', 'customer', '/storage/profiles/no-thumbnail.jpg', 1, '2022-11-21 04:02:24', '2022-11-21 04:02:24');
