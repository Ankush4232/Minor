-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 16, 2026 at 08:10 AM
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
-- Database: `order_details`
--

-- --------------------------------------------------------

--
-- Table structure for table `delivery_address8899001`
--

CREATE TABLE `delivery_address8899001` (
  `id` int(6) NOT NULL,
  `name` varchar(255) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `pincode` varchar(10) NOT NULL,
  `locality` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `landmark` varchar(255) DEFAULT NULL,
  `alternate_phone` varchar(20) DEFAULT NULL,
  `payment_mode` varchar(255) NOT NULL,
  `order_summary` varchar(255) NOT NULL,
  `total_amount` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `delivery_address8899001`
--

INSERT INTO `delivery_address8899001` (`id`, `name`, `mobile`, `pincode`, `locality`, `address`, `city`, `state`, `landmark`, `alternate_phone`, `payment_mode`, `order_summary`, `total_amount`) VALUES
(1, 'Abhishek Saket', '08349094504', '485001', 'Satna MP', 'Satna', 'Satna', 'Madhya Pradesh', 'near bus stand', '08349094504', 'Cash on Delivery', '            Product : 1\r\n    Product Name: REFIT ANIMAL CARE Milk Booster,\r\n    Product Quantity: 1 ,\r\n    Actual Price: 361,\r\n        \r\n    Product : 2\r\n    Product Name: Fur Ball Story Nutrition Supplement,\r\n    Product Quantity: 1 ,\r\n    Actual Price: ', '707'),
(2, 'Abhishek Saket', '08349094504', '485001', 'rewa', 'Satna', 'Satna', 'Madhya Pradesh', 'sssssss', '1001001001', 'Cash on Delivery', '                Product : 1\r\n    Product Name: REFIT ANIMAL CARE Milk Booster,\r\n    Product Quantity: 1 ,\r\n    Actual Price: 361,\r\n        \r\n    \r\n    User ID: 8899001        Total Product : 1     \r\n        Total price of Product : 361', '371');

-- --------------------------------------------------------

--
-- Table structure for table `delivery_address8899014`
--

CREATE TABLE `delivery_address8899014` (
  `id` int(6) NOT NULL,
  `name` varchar(255) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `pincode` varchar(10) NOT NULL,
  `locality` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `landmark` varchar(255) DEFAULT NULL,
  `alternate_phone` varchar(20) DEFAULT NULL,
  `payment_mode` varchar(255) NOT NULL,
  `order_summary` text NOT NULL,
  `total_amount` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `delivery_address8899014`
--

INSERT INTO `delivery_address8899014` (`id`, `name`, `mobile`, `pincode`, `locality`, `address`, `city`, `state`, `landmark`, `alternate_phone`, `payment_mode`, `order_summary`, `total_amount`) VALUES
(1, 'anish gupta', '1011011100', '485001', 'Satna MP', 'bharhutnagar, bus stand', 'Satna', 'Madhya Pradesh', 'near savera hotel', '1000010000', 'Cash on Delivery', '            Product : 1\r\n    Product Name: REFIT ANIMAL CARE Milk Booster,\r\n    Product Quantity: 1 ,\r\n    Actual Price: 361,\r\n        \r\n    Product : 2\r\n    Product Name: Pet Care International (PCI) ImmuBoost for Essential Vitamins,\r\n    Product Quantity: 1 ,\r\n    Actual Price: 171,\r\n        \r\n        User ID: 8899014        Total Product : 2     \r\n        Total price of Product : 532', '542'),
(3, 'Abhishek Saket', '08349094504', '485001', 'Satna MP', 'Satna', 'Satna', 'Madhya Pradesh', 'near bus stand', '08349094504', 'Cash on Delivery', '                Product : 1\r\n    Product Name: REFIT ANIMAL CARE Milk Booster,\r\n    Product Quantity: 1 ,\r\n    Actual Price: 361,\r\n        \r\n    \r\n    User ID: 8899014        Total Product : 1     \r\n        Total price of Product : 361', '371'),
(4, 'Abhishek Saket', '08349094504', '485001', 'Satna MP', 'Satna', 'Satna', 'Madhya Pradesh', 'near bus stand', '08349094504', 'Cash on Delivery', '                Product : 1\r\n    Product Name: REFIT ANIMAL CARE Milk Booster,\r\n    Product Quantity: 1 ,\r\n    Actual Price: 361,\r\n        \r\n    \r\n    User ID: 8899014        Total Product : 1     \r\n        Total price of Product : 361', '371'),
(9, 'Abhishek Saket', '08349094504', '485001', 'rewabb', 'Satna', 'Satna', 'Madhya Pradesh', 'near savera hotel', '12345698', 'Cash on Delivery', '            Product : 1\r\n    Product Name: REFIT ANIMAL CARE Milk Booster,\r\n    Product Quantity: 1 ,\r\n    Actual Price: 361,\r\n        \r\n    Product : 2\r\n    Product Name: VETMIDO Fat Boomer for Cow, Buffalo Pet Health,\r\n    Product Quantity: 1 ,\r\n    Actual Price: 1164,\r\n        \r\n    Product : 3\r\n    Product Name: Pet Care International (PCI) ImmuBoost for Essential Vitamins,\r\n    Product Quantity: 1 ,\r\n    Actual Price: 171,\r\n        \r\n        User ID: 8899014,     Total Product : 3,     \r\n        Total price of Product : 1696', '1706');

-- --------------------------------------------------------

--
-- Table structure for table `delivery_address8899017`
--

CREATE TABLE `delivery_address8899017` (
  `id` int(6) NOT NULL,
  `name` varchar(255) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `pincode` varchar(10) NOT NULL,
  `locality` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `landmark` varchar(255) DEFAULT NULL,
  `alternate_phone` varchar(20) DEFAULT NULL,
  `payment_mode` varchar(255) NOT NULL,
  `order_summary` text NOT NULL,
  `total_amount` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `delivery_address8899017`
--

INSERT INTO `delivery_address8899017` (`id`, `name`, `mobile`, `pincode`, `locality`, `address`, `city`, `state`, `landmark`, `alternate_phone`, `payment_mode`, `order_summary`, `total_amount`) VALUES
(1, 'aman', '1234567890', '485001', 'Satna MP', 'Satna', 'Satna', 'Madhya Pradesh', 'near bus stand', '1001001001', 'Cash on Delivery', '            Product : 1\r\n    Product Name: Fur Ball Story Nutrition Supplement,\r\n    Product Quantity: 1 ,\r\n    Actual Price: 336,\r\n        \r\n    Product : 2\r\n    Product Name: REFIT ANIMAL CARE Cow Dewormer Supplements,\r\n    Product Quantity: 1 ,\r\n    Actual Price: 386,\r\n        \r\n        User ID: 8899017,     Total Product : 2,     \r\n        Total price of Product : 722', '732');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `delivery_address8899001`
--
ALTER TABLE `delivery_address8899001`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `delivery_address8899014`
--
ALTER TABLE `delivery_address8899014`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `delivery_address8899017`
--
ALTER TABLE `delivery_address8899017`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `delivery_address8899001`
--
ALTER TABLE `delivery_address8899001`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `delivery_address8899014`
--
ALTER TABLE `delivery_address8899014`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `delivery_address8899017`
--
ALTER TABLE `delivery_address8899017`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
