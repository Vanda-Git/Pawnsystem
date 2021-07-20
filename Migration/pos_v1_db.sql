-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 20, 2021 at 03:49 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pos_v1_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `date_created` datetime DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `title`, `note`, `date_created`, `date_updated`) VALUES
(3, 'Drink', 'Noted', '2021-03-26 08:52:50', NULL),
(4, 'Food', 'Noted', '2021-03-26 08:52:50', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `date_created` datetime DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `title`, `note`, `created_by`, `updated_by`, `date_created`, `date_updated`) VALUES
(1, 'Admin', 'N/A', 1, 1, '2021-07-19 20:56:59', NULL),
(2, 'Operation', 'N/A', 1, NULL, '2021-07-19 21:16:54', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `group_mapping`
--

CREATE TABLE `group_mapping` (
  `id` int(11) NOT NULL,
  `p_group` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `date_created` datetime DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `group_mapping`
--

INSERT INTO `group_mapping` (`id`, `p_group`, `user`, `created_by`, `updated_by`, `date_created`, `date_updated`) VALUES
(1, 1, 1, 1, 1, '2021-07-19 21:29:43', NULL),
(2, 2, 1, 1, 1, '2021-07-19 21:29:43', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `main_menus`
--

CREATE TABLE `main_menus` (
  `id` int(11) NOT NULL,
  `caption` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `class` varchar(255) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `date_created` datetime DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `main_menus`
--

INSERT INTO `main_menus` (`id`, `caption`, `url`, `icon`, `class`, `note`, `created_by`, `updated_by`, `date_created`, `date_updated`) VALUES
(1, 'Customer', '#', '<i class=\"nav-icon fas fa-database\"></i>', 'nav-item', '', 1, NULL, '2021-07-10 21:50:06', NULL),
(2, 'Loan', '#', '<i class=\"nav-icon fas fa-database\"></i>', 'nav-item', '', 1, NULL, '2021-07-10 21:50:06', NULL),
(3, 'Report', '#', '<i class=\"nav-icon fas fa-database\"></i>', 'nav-item', '', 1, NULL, '2021-07-10 21:50:06', NULL),
(4, 'User Management', '#', '<i class=\"nav-icon fas fa-database\"></i>', 'nav-item', '', 1, NULL, '2021-07-10 21:50:06', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(11) NOT NULL,
  `sub_menu` varchar(255) DEFAULT NULL,
  `p_group` int(11) NOT NULL,
  `views` int(11) DEFAULT NULL,
  `adds` int(11) DEFAULT NULL,
  `updates` int(11) DEFAULT NULL,
  `deletes` int(11) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `date_created` datetime DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `sub_menu`, `p_group`, `views`, `adds`, `updates`, `deletes`, `note`, `created_by`, `updated_by`, `date_created`, `date_updated`) VALUES
(2, '2', 1, 1, 1, 1, 1, '', 1, NULL, '2021-07-10 21:52:28', NULL),
(3, '3', 1, 1, 1, 1, 1, '', 1, NULL, '2021-07-10 21:52:28', NULL),
(4, '4', 1, 1, 1, 1, 1, '', 1, NULL, '2021-07-10 21:52:28', NULL),
(5, '5', 1, 1, 1, 1, 1, '', 1, NULL, '2021-07-10 21:52:28', NULL),
(6, '6', 1, 1, 1, 1, 1, '', 1, NULL, '2021-07-10 21:52:29', NULL),
(7, '7', 1, 1, 1, 1, 1, '', 1, NULL, '2021-07-10 21:52:29', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `positions`
--

CREATE TABLE `positions` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `date_created` datetime DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `positions`
--

INSERT INTO `positions` (`id`, `title`, `note`, `created_by`, `updated_by`, `date_created`, `date_updated`) VALUES
(1, 'Admin', 'N/A', 1, 1, '2021-07-10 21:37:49', NULL),
(2, 'Operation', 'N/A', 1, NULL, '2021-07-19 20:26:13', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `code` varchar(10) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `brand` int(11) DEFAULT NULL,
  `catagory` int(11) DEFAULT NULL,
  `price` double DEFAULT NULL,
  `note` text DEFAULT NULL,
  `date_created` datetime DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `code`, `name`, `brand`, `catagory`, `price`, `note`, `date_created`, `date_updated`) VALUES
(4, '', '', 0, 0, 0, '', '2021-03-26 11:53:26', NULL),
(5, '', '', 0, 0, 0, '', '2021-03-26 11:53:35', NULL),
(6, '', '', 0, 0, 0, '', '2021-03-26 11:53:36', NULL),
(7, '', '', 0, 0, 0, '', '2021-03-26 11:53:37', NULL),
(10, 'P00001', 'Cocacola', 3, 3, 0.6, 'Noted', '2021-03-26 15:50:11', '2021-03-26 03:52:02');

-- --------------------------------------------------------

--
-- Table structure for table `sub_menus`
--

CREATE TABLE `sub_menus` (
  `id` int(11) NOT NULL,
  `main_menu` int(11) DEFAULT NULL,
  `caption` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `class` varchar(255) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `date_created` datetime DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sub_menus`
--

INSERT INTO `sub_menus` (`id`, `main_menu`, `caption`, `url`, `icon`, `class`, `note`, `created_by`, `updated_by`, `date_created`, `date_updated`) VALUES
(1, 1, 'Customer', '../Products/', '<i class=\"far fa-circle nav-icon\"></i>', 'nav-item', '', 1, NULL, '2021-07-10 21:58:30', NULL),
(2, 2, 'Loan', '../Products1/', '<i class=\"far fa-circle nav-icon\"></i>', 'nav-item', '', 1, NULL, '2021-07-10 21:58:30', NULL),
(3, 3, 'Report', '../Products2/', '<i class=\"far fa-circle nav-icon\"></i>', 'nav-item', '', 1, NULL, '2021-07-10 21:58:30', NULL),
(4, 4, 'Position', '../Positions/', '<i class=\"far fa-circle nav-icon\"></i>', 'nav-item', '', 1, NULL, '2021-07-10 21:58:30', NULL),
(5, 4, 'Permission', '../Permissions/', '<i class=\"far fa-circle nav-icon\"></i>', 'nav-item', '', 1, NULL, '2021-07-10 21:58:30', NULL),
(6, 4, 'User', '../Users/', '<i class=\"far fa-circle nav-icon\"></i>', 'nav-item', '', 1, NULL, '2021-07-10 21:58:30', NULL),
(7, 4, 'Group', '../Groups/', '<i class=\"far fa-circle nav-icon\"></i>', 'nav-item', '', 1, NULL, '2021-07-10 21:58:30', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `user` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `position` int(11) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `date_created` datetime DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `user`, `password`, `email`, `phone`, `status`, `image`, `position`, `note`, `created_by`, `updated_by`, `date_created`, `date_updated`) VALUES
(1, 'Vannyda', 'Bros', 'vanda', '123', 'vannyda.kh@gmail.com', 'phone', '1', 'blank.jpg', 1, '', 1, 1, '2021-07-10 21:39:58', NULL),
(2, 'Admin', 'Admin', 'admin', NULL, 'admin@gmail.com', NULL, '1', NULL, 1, NULL, 1, 1, '2021-07-18 17:31:03', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `group_mapping`
--
ALTER TABLE `group_mapping`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `main_menus`
--
ALTER TABLE `main_menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `positions`
--
ALTER TABLE `positions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_menus`
--
ALTER TABLE `sub_menus`
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
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `group_mapping`
--
ALTER TABLE `group_mapping`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `main_menus`
--
ALTER TABLE `main_menus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `positions`
--
ALTER TABLE `positions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `sub_menus`
--
ALTER TABLE `sub_menus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
