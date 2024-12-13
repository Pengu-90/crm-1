-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 12, 2024 at 11:27 PM
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
(25, 'margen', 'Ormoc city', 'leyte', 2, 'Daguil');

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
(60, 'a@as', 0),
(61, 'a@as', 0),
(62, 'm@m', 0),
(63, 'k@a', NULL);

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
(25, 'Daguil', 'Mike', 99, 60, 25);

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
(38, 'a', 'a', '', 100, 61, 0),
(39, 'Tribucio', 'Pio', '', 101, 62, 0),
(40, 'kk', 'k', '', 102, 63, 1);

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
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders_tbl`
--

INSERT INTO `orders_tbl` (`order_id`, `order_number`, `cart_id`, `quantity`, `item_id`, `customer_id`, `total_amount`, `date_ordered`, `date_processed`, `date_shipping`, `status`) VALUES
(110, 110, 110, 1, 2, 25, 250, '', '', '', 'Delivered'),
(111, 110, 111, 1, 1, 25, 250, '', '', '', 'Delivered'),
(112, 110, 112, 1, 2, 25, 250, '', '', '', 'Processing'),
(113, 110, 113, 1, 2, 25, 250, '', '', '', 'Delivered'),
(114, 110, 114, 1, 1, 25, 250, '', '', '', 'Delivered'),
(115, 115, 115, 1, 1, 25, 250, '', '', '', 'Delivered'),
(116, 115, 116, 1, 2, 25, 250, '', '', '', 'Processing'),
(117, 115, 117, 1, 1, 25, 250, '', '', '', 'Shipping'),
(118, 115, 118, 1, 2, 25, 250, '', '', '', 'Processing'),
(119, 115, 119, 1, 2, 25, 250, '', '', '', 'Processing');

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
(123, 38, 110, 'Process Order', 'Pending'),
(124, 39, 115, 'Process Order', 'Pending'),
(125, 38, 111, 'Process Order', 'Pending'),
(126, 39, 112, 'Process Order', 'Pending'),
(127, 38, 113, 'Process Order', 'Pending'),
(128, 39, 114, 'Process Order', 'Pending'),
(129, 38, 116, 'Process Order', 'Pending'),
(130, 39, 117, 'Process Order', 'Pending'),
(131, 38, 118, 'Process Order', 'Pending'),
(132, 40, 119, 'Process Order', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `ticket_details`
--

CREATE TABLE `ticket_details` (
  `details_id` int(11) NOT NULL,
  `ticket_id` int(11) NOT NULL,
  `description` text NOT NULL,
  `start_workdate` date NOT NULL,
  `end_workdate` date NOT NULL,
  `attachment` varchar(255) NOT NULL,
  `admin_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(99, 'qwerty', '$2y$10$hDiqa2VoTn801qK6Jbab3O9MuIBaFJCte6QfOvHYRH8IujQD/wAWa', 'user'),
(100, 'josh123', '$2y$10$b4ZUzhqORHsfSR8USxfS5uRo6kA6ogXaMq4l9exBmOATtS.OdM26C', 'employee'),
(101, 'pio123', '$2y$10$OqOrMV0GlAUe8N4qlOKvE.emcrIsWhFDtTDO8Ir9bAFvgeEQmWgPi', 'employee'),
(102, 'k', '$2y$10$.dvR.hl7zA42XXrXsR79lenSVLi0EPFxpt0RBMHofkz/aJklhZXLe', 'employee');

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
  ADD KEY `Id` (`Id`),
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
-- Indexes for table `ticket_details`
--
ALTER TABLE `ticket_details`
  ADD PRIMARY KEY (`details_id`),
  ADD KEY `admin_id` (`admin_id`),
  ADD KEY `ticket_id` (`ticket_id`);

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
  MODIFY `address_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `cart_tbl`
--
ALTER TABLE `cart_tbl`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;

--
-- AUTO_INCREMENT for table `contact_tbl`
--
ALTER TABLE `contact_tbl`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `customer_details`
--
ALTER TABLE `customer_details`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `customer_tickets`
--
ALTER TABLE `customer_tickets`
  MODIFY `ticket_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employees_tbl`
--
ALTER TABLE `employees_tbl`
  MODIFY `emp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `item_tbl`
--
ALTER TABLE `item_tbl`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `orders_tbl`
--
ALTER TABLE `orders_tbl`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;

--
-- AUTO_INCREMENT for table `task_tbl`
--
ALTER TABLE `task_tbl`
  MODIFY `task_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;

--
-- AUTO_INCREMENT for table `ticket_details`
--
ALTER TABLE `ticket_details`
  MODIFY `details_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users_tbl`
--
ALTER TABLE `users_tbl`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

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
-- Constraints for table `orders_tbl`
--
ALTER TABLE `orders_tbl`
  ADD CONSTRAINT `orders_tbl_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer_details` (`customer_id`),
  ADD CONSTRAINT `orders_tbl_ibfk_2` FOREIGN KEY (`item_id`) REFERENCES `item_tbl` (`item_id`);

--
-- Constraints for table `ticket_details`
--
ALTER TABLE `ticket_details`
  ADD CONSTRAINT `ticket_details_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `employees_tbl` (`emp_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
