-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 15, 2024 at 04:15 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crmama`
--

-- --------------------------------------------------------

--
-- Table structure for table `address_tbl`
--

CREATE TABLE `address_tbl` (
  `address_id` int(11) NOT NULL,
  `address_line` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `province` varchar(255) NOT NULL,
  `zipcode` int(10) NOT NULL,
  `country` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `address_tbl`
--

INSERT INTO `address_tbl` (`address_id`, `address_line`, `city`, `province`, `zipcode`, `country`) VALUES
(27, 'Brgy.Margen NHA block 16 lot 13', '', '', 0, ''),
(28, 'margen', '', '', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `cart_tbl`
--

CREATE TABLE `cart_tbl` (
  `cart_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total_amount` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contact_tbl`
--

CREATE TABLE `contact_tbl` (
  `contact_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `number` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_tbl`
--

INSERT INTO `contact_tbl` (`contact_id`, `email`, `number`) VALUES
(70, 'joan@jojo.com', NULL),
(71, 'a@d', NULL),
(72, 'a@a', NULL),
(73, 'm@m', NULL),
(74, 'm@m', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customer_details`
--

CREATE TABLE `customer_details` (
  `customer_id` int(11) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `Id` int(11) NOT NULL,
  `contact_id` int(11) NOT NULL,
  `address_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer_details`
--

INSERT INTO `customer_details` (`customer_id`, `last_name`, `first_name`, `Id`, `contact_id`, `address_id`) VALUES
(27, 'Mike', 'Daguil', 109, 70, 27),
(28, 'john', 'doe', 111, 72, 28);

-- --------------------------------------------------------

--
-- Table structure for table `customer_tickets`
--

CREATE TABLE `customer_tickets` (
  `ticket_id` int(11) NOT NULL,
  `ticket_type` varchar(255) NOT NULL,
  `ticket_msg` text NOT NULL,
  `ticket_status` varchar(255) NOT NULL,
  `open_date` date NOT NULL,
  `close_date` date NOT NULL,
  `customer_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employees_tbl`
--

CREATE TABLE `employees_tbl` (
  `emp_id` int(11) NOT NULL,
  `emp_lname` varchar(255) NOT NULL,
  `emp_fname` varchar(255) NOT NULL,
  `emp_position` varchar(255) NOT NULL,
  `Id` int(11) NOT NULL,
  `contact_id` int(11) NOT NULL,
  `availability` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employees_tbl`
--

INSERT INTO `employees_tbl` (`emp_id`, `emp_lname`, `emp_fname`, `emp_position`, `Id`, `contact_id`, `availability`) VALUES
(46, 'Ragas', 'Josh', '', 110, 71, 1),
(47, 'Tribucio', 'Pio', '', 112, 73, 1),
(48, 'Daguil', 'Mike', '', 113, 74, 1);

-- --------------------------------------------------------

--
-- Table structure for table `item_tbl`
--

CREATE TABLE `item_tbl` (
  `item_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_desc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `item_tbl`
--

INSERT INTO `item_tbl` (`item_id`, `product_name`, `product_desc`) VALUES
(1, 'Shimmer', 'basta it is designed for humans, it will make you fly.'),
(2, 'Hex Crystal', 'Magic balls na makahatag og extra effects sa items.');

-- --------------------------------------------------------

--
-- Table structure for table `notifications_tbl`
--

CREATE TABLE `notifications_tbl` (
  `notif_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `description` varchar(100) NOT NULL,
  `date` varchar(200) NOT NULL,
  `type` varchar(50) NOT NULL,
  `isRead` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notifications_tbl`
--

INSERT INTO `notifications_tbl` (`notif_id`, `user_id`, `order_id`, `description`, `date`, `type`, `isRead`) VALUES
(55, 109, 259, 'order_processing', 'Sunday, December 15, 2024', 'user', 1),
(56, 109, 260, 'order_processing', 'Sunday, December 15, 2024', 'user', 1),
(57, 109, 261, 'order_processing', 'Sunday, December 15, 2024', 'user', 1),
(58, 109, 262, 'order_processing', 'Sunday, December 15, 2024', 'user', 1),
(59, 109, 263, 'order_processing', 'Sunday, December 15, 2024', 'user', 1),
(60, 109, 264, 'order_processing', 'Sunday, December 15, 2024', 'user', 1),
(61, 109, 265, 'order_processing', 'Sunday, December 15, 2024', 'user', 1),
(62, 109, 266, 'order_processing', 'Sunday, December 15, 2024', 'user', 1),
(63, 109, 259, 'order_shipping', 'Sunday, December 15, 2024', 'user', 1),
(64, 109, 260, 'order_shipping', 'Sunday, December 15, 2024', 'user', 1),
(65, 109, 261, 'order_shipping', 'Sunday, December 15, 2024', 'user', 1),
(66, 109, 262, 'order_shipping', 'Sunday, December 15, 2024', 'user', 1),
(67, 109, 263, 'order_shipping', 'Sunday, December 15, 2024', 'user', 1),
(68, 109, 264, 'order_shipping', 'Sunday, December 15, 2024', 'user', 1),
(69, 109, 265, 'order_shipping', 'Sunday, December 15, 2024', 'user', 1),
(70, 109, 266, 'order_shipping', 'Sunday, December 15, 2024', 'user', 1),
(71, 109, 259, 'order_delivered', 'Sunday, December 15, 2024', 'user', 1),
(72, 109, 260, 'order_delivered', 'Sunday, December 15, 2024', 'user', 1),
(73, 109, 261, 'order_delivered', 'Sunday, December 15, 2024', 'user', 1),
(74, 109, 262, 'order_delivered', 'Sunday, December 15, 2024', 'user', 1),
(75, 109, 263, 'order_delivered', 'Sunday, December 15, 2024', 'user', 1),
(76, 109, 264, 'order_delivered', 'Sunday, December 15, 2024', 'user', 1),
(77, 109, 265, 'order_delivered', 'Sunday, December 15, 2024', 'user', 1),
(78, 109, 266, 'order_delivered', 'Sunday, December 15, 2024', 'user', 1),
(79, 109, 267, 'order_processing', 'Sunday, December 15, 2024', 'user', 1),
(80, 109, 267, 'order_shipping', 'Sunday, December 15, 2024', 'user', 1),
(81, 109, 267, 'order_delivered', 'Sunday, December 15, 2024', 'user', 1),
(82, 109, 268, 'order_processing', 'Sunday, December 15, 2024', 'user', 1),
(83, 109, 269, 'order_processing', 'Sunday, December 15, 2024', 'user', 1),
(84, 109, 268, 'order_shipping', 'Sunday, December 15, 2024', 'user', 1),
(85, 109, 269, 'order_shipping', 'Sunday, December 15, 2024', 'user', 1),
(86, 109, 270, 'order_processing', 'Sunday, December 15, 2024', 'user', 1),
(87, 109, 270, 'order_shipping', 'Sunday, December 15, 2024', 'user', 1),
(88, 109, 268, 'order_delivered', 'Sunday, December 15, 2024', 'user', 1),
(89, 109, 269, 'order_delivered', 'Sunday, December 15, 2024', 'user', 1),
(90, 109, 271, 'order_processing', 'Sunday, December 15, 2024', 'user', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders_tbl`
--

CREATE TABLE `orders_tbl` (
  `order_id` int(11) NOT NULL,
  `order_number` int(11) NOT NULL,
  `cart_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `total_amount` int(100) NOT NULL,
  `date_ordered` varchar(200) NOT NULL,
  `date_processed` varchar(200) NOT NULL,
  `date_shipping` varchar(200) NOT NULL,
  `date_delivered` varchar(200) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders_tbl`
--

INSERT INTO `orders_tbl` (`order_id`, `order_number`, `cart_id`, `quantity`, `item_id`, `customer_id`, `total_amount`, `date_ordered`, `date_processed`, `date_shipping`, `date_delivered`, `status`) VALUES
(259, 265, 265, 1, 2, 27, 250, 'Sunday, December 15, 2024', '', '', '', 'Delivered'),
(260, 265, 266, 1, 2, 27, 250, 'Sunday, December 15, 2024', '', '', '', 'Delivered'),
(261, 265, 267, 1, 2, 27, 250, 'Sunday, December 15, 2024', '', '', '', 'Delivered'),
(262, 265, 268, 1, 2, 27, 250, 'Sunday, December 15, 2024', '', '', '', 'Delivered'),
(263, 265, 269, 1, 2, 27, 250, 'Sunday, December 15, 2024', '', '', '', 'Delivered'),
(264, 265, 270, 1, 2, 27, 250, 'Sunday, December 15, 2024', '', '', '', 'Delivered'),
(265, 265, 271, 1, 2, 27, 250, 'Sunday, December 15, 2024', '', '', '', 'Delivered'),
(266, 265, 272, 1, 2, 27, 250, 'Sunday, December 15, 2024', '', '', '', 'Delivered'),
(267, 273, 273, 1, 2, 27, 250, 'Sunday, December 15, 2024', '', '', '', 'Delivered'),
(268, 274, 274, 1, 2, 27, 250, 'Sunday, December 15, 2024', '', '', '', 'Delivered'),
(269, 275, 275, 1, 2, 27, 250, 'Sunday, December 15, 2024', '', '', '', 'Delivered'),
(270, 276, 276, 1, 2, 27, 250, 'Sunday, December 15, 2024', '', '', '', 'Shipping'),
(271, 277, 277, 1, 2, 27, 250, 'Sunday, December 15, 2024', 'Sunday, December 15, 2024', '', '', 'Cancelled');

-- --------------------------------------------------------

--
-- Table structure for table `task_tbl`
--

CREATE TABLE `task_tbl` (
  `task_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `task_name` varchar(200) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `task_tbl`
--

INSERT INTO `task_tbl` (`task_id`, `admin_id`, `order_id`, `task_name`, `status`) VALUES
(253, 46, 270, 'Process Order', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `users_tbl`
--

CREATE TABLE `users_tbl` (
  `Id` int(11) NOT NULL,
  `Username` varchar(200) NOT NULL,
  `Password` varchar(200) NOT NULL,
  `Role` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users_tbl`
--

INSERT INTO `users_tbl` (`Id`, `Username`, `Password`, `Role`) VALUES
(1, 'admin', '$2y$10$fFfu9q5dk4RHC0TM5PnXQ.yiCIk1Ed6HL..l2r.tKh6CMWDcB0qCa', 'admin'),
(109, 'a', '$2y$10$FypkDmR75gtYqU1VBEEGNufSnT8Y3PYwqhG1zqt7iFsqly3YJIa7W', 'user'),
(110, 'josh', '$2y$10$nVFj54LP1iEgdV8dpWSAQ.kqW21SUkM/5N2teOmAB3TTvpisqc1ci', 'employee'),
(111, 'b', '$2y$10$hyVYS0m3mHcQtFfM96m5FOfgkRTjI7vDj7JrwS5F565/NKf9d8epe', 'user'),
(112, 'pio', '$2y$10$aIIpBAhRwPSEqVW2WlWFFuBOcEksK.97tPP5mT40x19jn6wErDxV.', 'employee'),
(113, 'mike', '$2y$10$pb6Y8OdwTUfGc385FVejLe.QjCmUh1bQbGwjxkHimDcjAATY1.iuS', 'employee');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address_tbl`
--
ALTER TABLE `address_tbl`
  ADD PRIMARY KEY (`address_id`);

--
-- Indexes for table `cart_tbl`
--
ALTER TABLE `cart_tbl`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `item_id` (`item_id`);

--
-- Indexes for table `contact_tbl`
--
ALTER TABLE `contact_tbl`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `customer_details`
--
ALTER TABLE `customer_details`
  ADD PRIMARY KEY (`customer_id`),
  ADD UNIQUE KEY `Id_2` (`Id`),
  ADD KEY `contact_id` (`contact_id`),
  ADD KEY `address_id` (`address_id`);

--
-- Indexes for table `customer_tickets`
--
ALTER TABLE `customer_tickets`
  ADD PRIMARY KEY (`ticket_id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `admin_id` (`admin_id`);

--
-- Indexes for table `employees_tbl`
--
ALTER TABLE `employees_tbl`
  ADD PRIMARY KEY (`emp_id`),
  ADD UNIQUE KEY `Id` (`Id`) USING BTREE,
  ADD KEY `contact_id` (`contact_id`);

--
-- Indexes for table `item_tbl`
--
ALTER TABLE `item_tbl`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `notifications_tbl`
--
ALTER TABLE `notifications_tbl`
  ADD PRIMARY KEY (`notif_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `orders_tbl`
--
ALTER TABLE `orders_tbl`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `cart_id` (`cart_id`),
  ADD KEY `item_id` (`item_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `task_tbl`
--
ALTER TABLE `task_tbl`
  ADD PRIMARY KEY (`task_id`),
  ADD KEY `admin_id` (`admin_id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `users_tbl`
--
ALTER TABLE `users_tbl`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address_tbl`
--
ALTER TABLE `address_tbl`
  MODIFY `address_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `cart_tbl`
--
ALTER TABLE `cart_tbl`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=278;

--
-- AUTO_INCREMENT for table `contact_tbl`
--
ALTER TABLE `contact_tbl`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `customer_details`
--
ALTER TABLE `customer_details`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `customer_tickets`
--
ALTER TABLE `customer_tickets`
  MODIFY `ticket_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employees_tbl`
--
ALTER TABLE `employees_tbl`
  MODIFY `emp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `item_tbl`
--
ALTER TABLE `item_tbl`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `notifications_tbl`
--
ALTER TABLE `notifications_tbl`
  MODIFY `notif_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `orders_tbl`
--
ALTER TABLE `orders_tbl`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=272;

--
-- AUTO_INCREMENT for table `task_tbl`
--
ALTER TABLE `task_tbl`
  MODIFY `task_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=255;

--
-- AUTO_INCREMENT for table `users_tbl`
--
ALTER TABLE `users_tbl`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart_tbl`
--
ALTER TABLE `cart_tbl`
  ADD CONSTRAINT `cart_tbl_ibfk_2` FOREIGN KEY (`item_id`) REFERENCES `item_tbl` (`item_id`),
  ADD CONSTRAINT `cart_tbl_ibfk_3` FOREIGN KEY (`customer_id`) REFERENCES `customer_details` (`customer_id`);

--
-- Constraints for table `customer_details`
--
ALTER TABLE `customer_details`
  ADD CONSTRAINT `customer_details_ibfk_1` FOREIGN KEY (`Id`) REFERENCES `users_tbl` (`Id`),
  ADD CONSTRAINT `customer_details_ibfk_2` FOREIGN KEY (`contact_id`) REFERENCES `contact_tbl` (`contact_id`),
  ADD CONSTRAINT `customer_details_ibfk_3` FOREIGN KEY (`address_id`) REFERENCES `address_tbl` (`address_id`);

--
-- Constraints for table `customer_tickets`
--
ALTER TABLE `customer_tickets`
  ADD CONSTRAINT `customer_tickets_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer_details` (`customer_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `customer_tickets_ibfk_2` FOREIGN KEY (`admin_id`) REFERENCES `employees_tbl` (`emp_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `employees_tbl`
--
ALTER TABLE `employees_tbl`
  ADD CONSTRAINT `employees_tbl_ibfk_1` FOREIGN KEY (`Id`) REFERENCES `users_tbl` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `employees_tbl_ibfk_3` FOREIGN KEY (`contact_id`) REFERENCES `contact_tbl` (`contact_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `notifications_tbl`
--
ALTER TABLE `notifications_tbl`
  ADD CONSTRAINT `notifications_tbl_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users_tbl` (`Id`);

--
-- Constraints for table `orders_tbl`
--
ALTER TABLE `orders_tbl`
  ADD CONSTRAINT `orders_tbl_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer_details` (`customer_id`),
  ADD CONSTRAINT `orders_tbl_ibfk_2` FOREIGN KEY (`item_id`) REFERENCES `item_tbl` (`item_id`);

--
-- Constraints for table `task_tbl`
--
ALTER TABLE `task_tbl`
  ADD CONSTRAINT `task_tbl_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `employees_tbl` (`emp_id`),
  ADD CONSTRAINT `task_tbl_ibfk_2` FOREIGN KEY (`order_id`) REFERENCES `orders_tbl` (`order_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
