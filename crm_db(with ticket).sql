-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2024 at 07:37 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crm_db`
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `admin_tbl`
--

CREATE TABLE `admin_tbl` (
  `admin_id` int(11) NOT NULL,
  `admin_lname` varchar(255) NOT NULL,
  `admin_fname` varchar(255) NOT NULL,
  `admin_position` varchar(255) NOT NULL,
  `Id` int(11) NOT NULL,
  `contact_id` int(11) NOT NULL,
  `address_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `cart_tbl`
--

CREATE TABLE `cart_tbl` (
  `cart_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `contact_tbl`
--

CREATE TABLE `contact_tbl` (
  `contact_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `item_tbl`
--

CREATE TABLE `item_tbl` (
  `item_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_desc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `orders_tbl`
--

CREATE TABLE `orders_tbl` (
  `order_id` int(11) NOT NULL,
  `cart_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users_tbl`
--

CREATE TABLE `users_tbl` (
  `Id` int(11) NOT NULL,
  `Username` varchar(200) NOT NULL,
  `Password` varchar(200) NOT NULL,
  `Role` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users_tbl`
--

INSERT INTO `users_tbl` (`Id`, `Username`, `Password`, `Role`) VALUES
(1, 'admin', '$2y$10$fFfu9q5dk4RHC0TM5PnXQ.yiCIk1Ed6HL..l2r.tKh6CMWDcB0qCa', 'admin'),
(32, 'a', '$2y$10$MmMwTDmPebkHzJirxNcIZeLKvnYZbdttnYb2ohWhBf3xjqukpSqgW', 'admin'),
(33, 'ac', '$2y$10$hXqJIyVWBMY5HkXtm4t/YeGxKydXKmNaEFCcudyHyB8lT.M915FjS', 'admin'),
(34, 'abc', '$2y$10$.qgdlQT7tDwQQx5HyYd.WeEtaZQokkI1pKMuxZTeZHjDizNYByf5m', 'user'),
(35, 'qwerty', '$2y$10$GHsRJHgaIKGPR2YHVmgsyegIHUV0eIbh8gBx/99AuW.3vbYidBfTm', 'user'),
(36, 'pp', '$2y$10$H5C8keN98wFuoL3576GVk.ocV23wjiWjbBKIHUR5S1BGnM2R1ieGi', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address_tbl`
--
ALTER TABLE `address_tbl`
  ADD PRIMARY KEY (`address_id`);

--
-- Indexes for table `admin_tbl`
--
ALTER TABLE `admin_tbl`
  ADD PRIMARY KEY (`admin_id`),
  ADD KEY `Id` (`Id`),
  ADD KEY `contact_id` (`contact_id`),
  ADD KEY `address_id` (`address_id`);

--
-- Indexes for table `cart_tbl`
--
ALTER TABLE `cart_tbl`
  ADD PRIMARY KEY (`cart_id`),
  ADD UNIQUE KEY `checkout_id` (`cart_id`,`customer_id`),
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
-- Indexes for table `item_tbl`
--
ALTER TABLE `item_tbl`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `orders_tbl`
--
ALTER TABLE `orders_tbl`
  ADD PRIMARY KEY (`order_id`),
  ADD UNIQUE KEY `checkout_id` (`cart_id`,`customer_id`),
  ADD KEY `cart_id` (`cart_id`),
  ADD KEY `customer_id` (`customer_id`);

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
  MODIFY `address_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `admin_tbl`
--
ALTER TABLE `admin_tbl`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cart_tbl`
--
ALTER TABLE `cart_tbl`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contact_tbl`
--
ALTER TABLE `contact_tbl`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customer_details`
--
ALTER TABLE `customer_details`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customer_tickets`
--
ALTER TABLE `customer_tickets`
  MODIFY `ticket_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `item_tbl`
--
ALTER TABLE `item_tbl`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders_tbl`
--
ALTER TABLE `orders_tbl`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ticket_details`
--
ALTER TABLE `ticket_details`
  MODIFY `details_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users_tbl`
--
ALTER TABLE `users_tbl`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin_tbl`
--
ALTER TABLE `admin_tbl`
  ADD CONSTRAINT `admin_tbl_ibfk_1` FOREIGN KEY (`Id`) REFERENCES `users_tbl` (`Id`),
  ADD CONSTRAINT `admin_tbl_ibfk_2` FOREIGN KEY (`address_id`) REFERENCES `address_tbl` (`address_id`),
  ADD CONSTRAINT `admin_tbl_ibfk_3` FOREIGN KEY (`contact_id`) REFERENCES `contact_tbl` (`contact_id`);

--
-- Constraints for table `cart_tbl`
--
ALTER TABLE `cart_tbl`
  ADD CONSTRAINT `cart_tbl_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer_details` (`customer_id`),
  ADD CONSTRAINT `cart_tbl_ibfk_2` FOREIGN KEY (`item_id`) REFERENCES `item_tbl` (`item_id`),
  ADD CONSTRAINT `cart_tbl_ibfk_3` FOREIGN KEY (`cart_id`,`customer_id`) REFERENCES `orders_tbl` (`cart_id`, `customer_id`);

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
  ADD CONSTRAINT `customer_tickets_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `admin_tbl` (`admin_id`),
  ADD CONSTRAINT `customer_tickets_ibfk_2` FOREIGN KEY (`customer_id`) REFERENCES `customer_details` (`customer_id`);

--
-- Constraints for table `ticket_details`
--
ALTER TABLE `ticket_details`
  ADD CONSTRAINT `ticket_details_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `admin_tbl` (`admin_id`),
  ADD CONSTRAINT `ticket_details_ibfk_2` FOREIGN KEY (`ticket_id`) REFERENCES `customer_tickets` (`ticket_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
