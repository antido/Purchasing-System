-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 03, 2018 at 03:52 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `purchasing_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `account_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `username` varchar(45) CHARACTER SET utf8 NOT NULL,
  `password` varchar(45) CHARACTER SET utf8 NOT NULL,
  `account_type` varchar(45) CHARACTER SET utf8 NOT NULL,
  `createdDate` datetime DEFAULT NULL,
  `updatedDate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`account_id`, `user_id`, `username`, `password`, `account_type`, `createdDate`, `updatedDate`) VALUES
(1, 1, 'christ', 'antido', 'Admin', '2018-04-17 19:41:13', '2018-04-17 19:41:13'),
(2, 2, '09276487436', 'Manalo', 'Public', '2018-04-17 19:42:07', '2018-04-17 19:42:07'),
(3, 3, 'juan', 'juan12345', 'Public', '2018-04-17 19:48:59', '2018-04-17 19:48:59'),
(4, 4, 'kamille', 'david', 'Admin', '2018-04-23 20:57:31', '2018-04-23 20:57:31'),
(5, 5, 'ben', 'ben123456', 'Public', '2018-04-24 19:52:37', '2018-05-03 21:51:50'),
(7, 7, 'roger', 'roger12345', 'Public', '2018-04-29 12:23:11', '2018-04-29 12:23:11'),
(8, 8, 'rita', 'ritaadmin', 'Admin', '2018-04-29 12:25:00', '2018-04-29 12:25:00');

-- --------------------------------------------------------

--
-- Table structure for table `activity`
--

CREATE TABLE `activity` (
  `activity_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `activity_description` varchar(45) CHARACTER SET utf8 NOT NULL,
  `activity_createdDate` datetime NOT NULL,
  `activity_updatedDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `activity`
--

INSERT INTO `activity` (`activity_id`, `user_id`, `activity_description`, `activity_createdDate`, `activity_updatedDate`) VALUES
(1, 1, 'Logged In', '2018-05-03 00:00:00', '2018-05-03 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `stocks`
--

CREATE TABLE `stocks` (
  `stock_id` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `stock_name` varchar(45) CHARACTER SET utf8 NOT NULL,
  `stock_quantity` int(11) NOT NULL,
  `stock_price` float NOT NULL,
  `stock_description` varchar(45) CHARACTER SET utf8 NOT NULL,
  `createdDate` datetime NOT NULL,
  `updatedDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stocks`
--

INSERT INTO `stocks` (`stock_id`, `supplier_id`, `stock_name`, `stock_quantity`, `stock_price`, `stock_description`, `createdDate`, `updatedDate`) VALUES
(1, 1, 'Candy', 40, 10, 'Candy for you', '2018-04-13 00:00:00', '2018-04-29 12:29:13'),
(2, 2, 'Chips', 26, 20, 'Chips for you all', '2018-04-18 23:14:58', '2018-05-03 21:43:04'),
(3, 3, 'Jacket', 13, 400, 'Jacket for fashion ware.', '2018-04-25 21:47:58', '2018-04-29 11:57:12'),
(4, 1, 'Chocolate Bar', 30, 12, 'Chocolate Bar for relaxation.', '2018-04-29 12:26:02', '2018-04-30 22:00:53');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `supplier_id` int(111) NOT NULL,
  `supplier_name` varchar(45) CHARACTER SET utf8 NOT NULL,
  `supplier_address` varchar(45) CHARACTER SET utf8 NOT NULL,
  `supplier_number` varchar(45) CHARACTER SET utf8 NOT NULL,
  `createdDate` datetime NOT NULL,
  `updatedDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`supplier_id`, `supplier_name`, `supplier_address`, `supplier_number`, `createdDate`, `updatedDate`) VALUES
(1, 'Nestle', 'Quezon City ', '02964756534', '2018-04-18 00:00:00', '2018-04-18 00:00:00'),
(2, 'Jack n Jill', 'Ayala Avenue Makati City', '09275463543', '2018-04-18 00:00:00', '2018-04-18 00:00:00'),
(3, 'BnY', 'New York, new York', '09273847634', '2018-04-25 21:47:24', '2018-04-25 21:47:24');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(45) CHARACTER SET utf8 NOT NULL,
  `middle_name` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  `last_name` varchar(45) CHARACTER SET utf8 NOT NULL,
  `age` int(11) NOT NULL,
  `gender` varchar(45) CHARACTER SET utf8 NOT NULL,
  `contact_number` varchar(45) CHARACTER SET utf8 NOT NULL,
  `home_address` varchar(45) CHARACTER SET utf8 NOT NULL,
  `profession` varchar(45) CHARACTER SET utf8 NOT NULL,
  `createdDate` datetime DEFAULT NULL,
  `updatedDate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `middle_name`, `last_name`, `age`, `gender`, `contact_number`, `home_address`, `profession`, `createdDate`, `updatedDate`) VALUES
(1, 'Christian', 'Lerry', 'Antido', 23, 'Male', '09296487564', 'Upper Quezon Hill Baguio City', 'IT', '2018-04-17 19:41:13', '2018-04-17 19:41:13'),
(2, 'Jose', 'Miguel', 'Manalo', 25, 'Male', '09276487436', 'Irisan Baguio City', 'Engineer', '2018-04-17 19:42:07', '2018-04-17 19:42:07'),
(3, 'Juan', 'Dela Cruz', 'Gapuz', 34, 'Male', '09275486342', 'San Carlos Heights Baguio City', 'Doctor', '2018-04-17 19:48:58', '2018-04-17 19:48:58'),
(4, 'Kamille', 'Kaye', 'David', 23, 'Female', '09287463543', 'Middle Fairview Baguio City', 'Nurse', '2018-04-23 20:57:31', '2018-04-23 20:57:31'),
(5, 'Ben', 'Tenison', 'Gutierez', 24, 'Male', '09286475643', 'ben@gmail.com', 'Scientist', '2018-04-24 19:52:37', '2018-04-24 19:52:37'),
(7, 'Roger', 'Estrada', 'San Miguel', 45, 'Male', '09287564536', 'Lower Rock Quary Baguio City', 'Architect', '2018-04-29 12:23:11', '2018-04-29 12:23:11'),
(8, 'Rita', 'San Miguel', 'Bernardo', 34, 'Female', '09287645382', 'Quezon Hill Baguio City', 'Office Supervisor', '2018-04-29 12:25:00', '2018-04-29 12:25:00');

-- --------------------------------------------------------

--
-- Table structure for table `user_purchase`
--

CREATE TABLE `user_purchase` (
  `user_purchase_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `stock_id` int(11) NOT NULL,
  `purchase_quantity` int(11) NOT NULL,
  `purchase_createdDate` datetime NOT NULL,
  `purchase_updatedDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_purchase`
--

INSERT INTO `user_purchase` (`user_purchase_id`, `user_id`, `stock_id`, `purchase_quantity`, `purchase_createdDate`, `purchase_updatedDate`) VALUES
(1, 3, 1, 5, '2018-04-29 11:56:55', '2018-04-29 11:56:55'),
(2, 3, 3, 2, '2018-04-29 11:57:12', '2018-04-29 11:57:12'),
(3, 3, 2, 2, '2018-04-29 11:57:51', '2018-04-29 11:57:51'),
(4, 7, 1, 5, '2018-04-29 12:23:31', '2018-04-29 12:23:31'),
(5, 5, 4, 10, '2018-04-30 22:00:53', '2018-04-30 22:00:53'),
(6, 5, 2, 2, '2018-05-03 21:43:04', '2018-05-03 21:43:04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`account_id`),
  ADD UNIQUE KEY `account_id` (`account_id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `activity`
--
ALTER TABLE `activity`
  ADD PRIMARY KEY (`activity_id`),
  ADD UNIQUE KEY `activity_id` (`activity_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `stocks`
--
ALTER TABLE `stocks`
  ADD PRIMARY KEY (`stock_id`),
  ADD UNIQUE KEY `stock_id` (`stock_id`),
  ADD KEY `supplier_id` (`supplier_id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`supplier_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- Indexes for table `user_purchase`
--
ALTER TABLE `user_purchase`
  ADD PRIMARY KEY (`user_purchase_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `stock_id` (`stock_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `account_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `activity`
--
ALTER TABLE `activity`
  MODIFY `activity_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `stocks`
--
ALTER TABLE `stocks`
  MODIFY `stock_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `supplier_id` int(111) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user_purchase`
--
ALTER TABLE `user_purchase`
  MODIFY `user_purchase_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `accounts`
--
ALTER TABLE `accounts`
  ADD CONSTRAINT `accounts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON UPDATE CASCADE;

--
-- Constraints for table `activity`
--
ALTER TABLE `activity`
  ADD CONSTRAINT `activity_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `stocks`
--
ALTER TABLE `stocks`
  ADD CONSTRAINT `stocks_ibfk_1` FOREIGN KEY (`supplier_id`) REFERENCES `supplier` (`supplier_id`);

--
-- Constraints for table `user_purchase`
--
ALTER TABLE `user_purchase`
  ADD CONSTRAINT `user_purchase_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `user_purchase_ibfk_2` FOREIGN KEY (`stock_id`) REFERENCES `stocks` (`stock_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
