-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 08, 2024 at 02:25 PM
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
(20, 'Brgy.Margen NHA block 16 lot 13', '', '', 0, ''),
(21, 'x', '', '', 0, ''),
(22, 's', '', '', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `admin_tbl`
--

CREATE TABLE `admin_tbl` (
  `admin_id` int(11) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `Id` int(11) NOT NULL,
  `contact_id` int(11) NOT NULL,
  `address_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_tbl`
--

INSERT INTO `contact_tbl` (`contact_id`, `email`, `number`) VALUES
(37, 'joan@jojo.com', 0),
(38, 'a@e', 0),
(39, 'a@a', 0),
(40, 'x@x', 0),
(41, 's', 0);

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
(20, 'Latifa Jehad Khamis', 'El Farra', 76, 37, 20),
(21, 'x', 'x', 79, 40, 21),
(22, 's', 'a', 80, 41, 22);

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
(20, 'Daguil', 'Mike', '', 77, 38, 0),
(21, 'a', 'a', '', 78, 39, 0);

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
(18, 9, 9, 1, 2, 20, 250, '', '', '', 'Processing'),
(19, 9, 10, 1, 1, 20, 250, '', '', '', 'Processing');

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
(22, 21, 18, 'Process Order', 'Pending'),
(23, 20, 19, 'Process Order', 'Pending');

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
(76, 'm', '$2y$10$Rdxnbvk3LAVY4lyIEuAnguCkLxKks1DNoIaRzIX9z6ySRcgi3Jj2.', 'user'),
(77, 'l', '$2y$10$Hw2wZyCbGBYrUTpuSD72B.wWDtY5xdxnbwot1aMTWd6FpYnnELCaO', 'employee'),
(78, 'a', '$2y$10$Jl9RAelUlMJm0.dV2EV99uUALLREgpFKJOPgf9jg4YHdpSiFTIWeu', 'employee'),
(79, 'x', '$2y$10$ED7nkPumfrkTmKkNRK74cu4aoEyTUtk1IUuttqAD1YahfNNLVUXti', 'user'),
(80, 's', '$2y$10$o3r.JCYP/YFJd6dqsOZlm.ZeKU7Qk/NPojRHCpkP8imMIAB/M/0MS', 'user');

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
  ADD KEY `cart_id` (`cart_id`);

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
  MODIFY `address_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `cart_tbl`
--
ALTER TABLE `cart_tbl`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `contact_tbl`
--
ALTER TABLE `contact_tbl`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `customer_details`
--
ALTER TABLE `customer_details`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `customer_tickets`
--
ALTER TABLE `customer_tickets`
  MODIFY `ticket_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employees_tbl`
--
ALTER TABLE `employees_tbl`
  MODIFY `emp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `item_tbl`
--
ALTER TABLE `item_tbl`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `orders_tbl`
--
ALTER TABLE `orders_tbl`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `task_tbl`
--
ALTER TABLE `task_tbl`
  MODIFY `task_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `ticket_details`
--
ALTER TABLE `ticket_details`
  MODIFY `details_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users_tbl`
--
ALTER TABLE `users_tbl`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

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
-- Constraints for table `ticket_details`
--
ALTER TABLE `ticket_details`
  ADD CONSTRAINT `ticket_details_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `employees_tbl` (`emp_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;