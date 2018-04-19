-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 19, 2018 at 08:36 AM
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
(3, 3, 'juan', 'juan12345', 'Public', '2018-04-17 19:48:59', '2018-04-17 19:48:59');

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
(1, 1, 'Chips', 30, 25, 'Chips for you', '2018-04-13 00:00:00', '2018-04-13 00:00:00'),
(2, 2, 'Chips', 24, 20, 'Chips for you all', '2018-04-18 23:14:58', '2018-04-18 23:14:58');

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
(2, 'Jack n Jill', 'Ayala Avenue Makati City', '09275463543', '2018-04-18 00:00:00', '2018-04-18 00:00:00');

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
(3, 'Juan', 'Dela Cruz', 'Gapuz', 34, 'Male', '09275486342', 'San Carlos Heights Baguio City', 'Doctor', '2018-04-17 19:48:58', '2018-04-17 19:48:58');

-- --------------------------------------------------------

--
-- Table structure for table `user_purchase`
--

CREATE TABLE `user_purchase` (
  `user_purchase_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `stock_id` int(11) NOT NULL,
  `purchase_quantity` int(11) NOT NULL,
  `createdDate` datetime NOT NULL,
  `updatedDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  MODIFY `account_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `stocks`
--
ALTER TABLE `stocks`
  MODIFY `stock_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `supplier_id` int(111) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_purchase`
--
ALTER TABLE `user_purchase`
  MODIFY `user_purchase_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `accounts`
--
ALTER TABLE `accounts`
  ADD CONSTRAINT `accounts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON UPDATE CASCADE;

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
