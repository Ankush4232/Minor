-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 16, 2026 at 08:09 AM
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
-- Database: `signup_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `adoption_requests`
--

CREATE TABLE `adoption_requests` (
  `product_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `appointment_date` date NOT NULL,
  `address` varchar(255) NOT NULL,
  `additional_message` varchar(255) DEFAULT NULL,
  `animal_details` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `adoption_requests`
--

INSERT INTO `adoption_requests` (`product_id`, `name`, `email`, `phone`, `appointment_date`, `address`, `additional_message`, `animal_details`) VALUES
(2, 'Abhishek Saket', 'abhisheksaket2153@gmail.com', '08349094504', '2025-04-03', 'Satna', 'good', 'Name: Milo,	Age: 3,	Category: Dog,	Breed: Dalmatian,	Gender: Female,   Animal Id: ANIMALS003'),
(3, 'Ankush mishra', 'asdA@ghh.com', '08349095555', '2025-04-04', 'Satna', 'nice', 'Name: Fluffy,	Age: 2,	Category: Cat,	Breed: Siberian cat,	Gender: Female,   Animal Id: ANIMALS004'),
(10, 'Abhishek Saket', 'a2315sdA@AAA213ghh.com', '08349094504', '2025-04-08', 'Satna', '52', 'Name: Bruno,              Age: 2,	\nCategory: Dog,	          Breed: Golden Retriever,	\nGender: Male,             Animal Id: ANIMALS001 ,   \nUSER-UID: 8899001 \n'),
(34, 'Abhishek Saket', 'abhi2@gmail.com', '08349094504', '2025-04-11', 'Satna', 'ghjk', 'Name: Bruno,              Age: 2,	\r\nCategory: Dog,	          Breed: Golden Retriever,	\r\nGender: Male,             Animal Id: ANIMALS001 ,   \r\nUSER-UID: 8899010 \r\n');

-- --------------------------------------------------------

--
-- Table structure for table `animals`
--

CREATE TABLE `animals` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `image_name` varchar(250) DEFAULT NULL,
  `category` varchar(50) DEFAULT NULL,
  `breed` varchar(100) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `gender` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `animals`
--

INSERT INTO `animals` (`id`, `name`, `image_name`, `category`, `breed`, `age`, `gender`) VALUES
(1, 'Bruno', 'image1.jpg', 'Dog', 'Golden Retriever', 2, 'Male'),
(2, 'Cooper', 'image2.jpg', 'Dog', 'Pug', 1, 'Male'),
(3, 'Milo', 'image3.jpg', 'Dog', 'Dalmatian', 3, 'Female'),
(4, 'Fluffy', 'image4.jpg\r\n', 'Cat', 'Siberian cat', 2, 'Female'),
(5, 'Luna', 'image5.jpg', 'Cat', 'British Shorthair', 3, 'Female'),
(6, 'Max', 'image6.jpg', 'Cat', 'Maine Coon', 2, 'Male'),
(7, 'Nibbles', 'image7.jpg', 'Other', 'Sciurus carolinensis', 1, 'Male'),
(8, 'Sunny', 'image8.jpg', 'Other', 'Cockatiel', 1, 'Female'),
(9, 'Bessie', 'image9.jpg\r\n', 'Cow', 'Holstein', 2, 'Female'),
(10, 'Daisy', 'image10.jpg', 'Cow', 'Jersey', 1, 'Female');

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `mobile` varchar(20) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `landmark` varchar(100) DEFAULT NULL,
  `pincode` varchar(20) DEFAULT NULL,
  `pet_name` varchar(100) DEFAULT NULL,
  `pet_type` varchar(100) DEFAULT NULL,
  `pet_age` int(11) DEFAULT NULL,
  `appointment_date` date DEFAULT NULL,
  `appointment_time` varchar(100) DEFAULT NULL,
  `checkup_mode` varchar(100) DEFAULT NULL,
  `problem_summary` text DEFAULT NULL,
  `user_uid` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `name`, `mobile`, `address`, `city`, `state`, `landmark`, `pincode`, `pet_name`, `pet_type`, `pet_age`, `appointment_date`, `appointment_time`, `checkup_mode`, `problem_summary`, `user_uid`) VALUES
(1, 'Abhishek Saket', '08349094504', 'bharhutnagar, bus stand', 'Satna', 'Madhya Pradesh', 'near bus stand', '485001', 'tomy', 'dog', 2, '2025-04-30', 'AfterNoon (12 to 4)', 'Pet Animal Vaccination', 'I wanted to vaccinate my pet\r\n', '8899014'),
(6, 'Ankush mishra', '1234567890', 'bharhutnagar, bus stand', 'Satna', 'Madhya Pradesh', 'near bus stand', '485001', 'julie', 'dog', 3, '2025-04-30', 'Evening (4 to 7)', 'Animal Hospitalization', 'fever\r\n', '8899014');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `product_detail` varchar(255) DEFAULT NULL,
  `actual_price` int(11) DEFAULT NULL,
  `sell_price` int(11) DEFAULT NULL,
  `discount` int(11) DEFAULT NULL,
  `image_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `product_name`, `product_detail`, `actual_price`, `sell_price`, `discount`, `image_name`) VALUES
(32, 'Fur Ball Story Nutrition Supplement', 'For Dogs ,Liquid Supplement   (200 ml)', 349, 336, 3, 'image2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `cart8899001`
--

CREATE TABLE `cart8899001` (
  `id` int(6) NOT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `product_detail` varchar(255) DEFAULT NULL,
  `actual_price` int(11) DEFAULT NULL,
  `sell_price` int(11) DEFAULT NULL,
  `discount` int(11) DEFAULT NULL,
  `image_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart8899001`
--

INSERT INTO `cart8899001` (`id`, `product_name`, `product_detail`, `actual_price`, `sell_price`, `discount`, `image_name`) VALUES
(1, 'REFIT ANIMAL CARE Milk Booster', 'For Cow, Buffalo, Cattle, Goat Pet Health Supplements (1 kg)', 419, 361, 13, 'image1.jpg'),
(2, 'Fur Ball Story Nutrition Supplement', 'For Dogs ,Liquid Supplement   (200 ml)', 349, 336, 3, 'image2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `cart8899010`
--

CREATE TABLE `cart8899010` (
  `id` int(6) NOT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `product_detail` varchar(255) DEFAULT NULL,
  `actual_price` int(11) DEFAULT NULL,
  `sell_price` int(11) DEFAULT NULL,
  `discount` int(11) DEFAULT NULL,
  `image_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cart8899012`
--

CREATE TABLE `cart8899012` (
  `id` int(6) NOT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `product_detail` varchar(255) DEFAULT NULL,
  `actual_price` int(11) DEFAULT NULL,
  `sell_price` int(11) DEFAULT NULL,
  `discount` int(11) DEFAULT NULL,
  `image_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cart8899014`
--

CREATE TABLE `cart8899014` (
  `id` int(6) NOT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `product_detail` varchar(255) DEFAULT NULL,
  `actual_price` int(11) DEFAULT NULL,
  `sell_price` int(11) DEFAULT NULL,
  `discount` int(11) DEFAULT NULL,
  `image_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart8899014`
--

INSERT INTO `cart8899014` (`id`, `product_name`, `product_detail`, `actual_price`, `sell_price`, `discount`, `image_name`) VALUES
(1, 'Fur Ball Story Nutrition Supplement', 'For Dogs ,Liquid Supplement   (200 ml)', 349, 336, 3, 'image2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `cart8899017`
--

CREATE TABLE `cart8899017` (
  `id` int(6) NOT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `product_detail` varchar(255) DEFAULT NULL,
  `actual_price` int(11) DEFAULT NULL,
  `sell_price` int(11) DEFAULT NULL,
  `discount` int(11) DEFAULT NULL,
  `image_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `product_detail` varchar(255) DEFAULT NULL,
  `actual_price` int(11) DEFAULT NULL,
  `sell_price` int(11) DEFAULT NULL,
  `discount` int(11) DEFAULT NULL,
  `highlight1` varchar(255) DEFAULT NULL,
  `highlight2` varchar(255) DEFAULT NULL,
  `highlight3` varchar(255) DEFAULT NULL,
  `highlight4` varchar(255) DEFAULT NULL,
  `image_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `product_detail`, `actual_price`, `sell_price`, `discount`, `highlight1`, `highlight2`, `highlight3`, `highlight4`, `image_name`) VALUES
(1, 'REFIT ANIMAL CARE Milk Booster', 'For Cow, Buffalo, Cattle, Goat Pet Health Supplements (1 kg)', 419, 361, 13, 'Boost Milk Production', 'Growth Promoter', 'Milk Boosting Granules', 'Overall Growth', 'image1.jpg'),
(3, 'Fur Ball Story Nutrition Supplement', 'For Dogs ,Liquid Supplement   (200 ml)', 349, 336, 3, 'Nutrition Supplement', 'Suitable For: Adult Dog', 'Liquid Form', 'Quantity: 200 ml', 'image2.jpg'),
(4, 'REFIT ANIMAL CARE Cow Dewormer Supplements', 'Pet Health Supplements  (10 Pieces)', 720, 386, 46, 'Veterinary Dewormer', 'Suitable For: Adult Dog', 'Safe for pregnant Cow', 'Cattle Feed Supplement', 'image3.jpg'),
(5, 'Oatem Skin & Coat Care Liquid ', 'Skin Care Liquid Supplements (4 ml)', 1000, 836, 16, 'Skin & Coat Care', 'Suitable For: Adult Dog, Cat', 'Liquid Form', 'Quantity: 4 ml', 'image4.jpg'),
(6, 'REFIT ANIMAL CARE Vitamin H', 'for Cow, Buffalo, Birds, Multivitamins H, E, A & D3 Pet Health Supplements  (1 L)', 1499, 724, 51, 'Vitamin H For Animals', 'Vitamin H, E, A & D', 'Growth of Young Calves', 'Udder Growth', 'image5.jpg'),
(7, 'Pet Care International (PCI) ImmuBoost for Essential Vitamins', 'Vitamins for Healthy Bird Healthcare Pet Health Supplements  (100 ml)', 200, 171, 14, 'Source Of Vitamin', 'Balanced Blend', 'Good nutrition', 'Strong antioxidant', 'image6.jpg'),
(8, 'VETMIDO Fat Boomer for Cow, Buffalo Pet Health', 'Rumen Bypass Fat, Energy & Milk Booster Supplement (5 kg) ', 1699, 1164, 31, 'Fat Energy & Milk Boost Powder Supplement', 'for Cattle, Cows, Buffalo and Farm Animals', 'It Increases FAT, SNF in milk', ' Fat Boomer', 'image7.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `uid` int(10) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `username`, `email`, `password`) VALUES
(8899001, 'Abhi', 'abhi@gmail.com', '123456'),
(8899010, 'Rajnish', 'abhi2@gmail.com', '123456'),
(8899012, 'Ankush', 'ankush@gmail.com', '654321'),
(8899014, 'Anish', 'anish@gmail.com', '12427'),
(8899015, 'Ramesh', 'ramesh@gmail.com', '100100'),
(8899016, 'Suraj', 'suraj@gmail.com', '123456'),
(8899017, 'aman', 'aman@yahoo.com', '123456'),
(8899018, 'sahil', 'sahil@gmail.com', '000000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adoption_requests`
--
ALTER TABLE `adoption_requests`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `animals`
--
ALTER TABLE `animals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart8899001`
--
ALTER TABLE `cart8899001`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart8899010`
--
ALTER TABLE `cart8899010`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart8899012`
--
ALTER TABLE `cart8899012`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart8899014`
--
ALTER TABLE `cart8899014`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart8899017`
--
ALTER TABLE `cart8899017`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adoption_requests`
--
ALTER TABLE `adoption_requests`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `animals`
--
ALTER TABLE `animals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `cart8899001`
--
ALTER TABLE `cart8899001`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cart8899010`
--
ALTER TABLE `cart8899010`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cart8899012`
--
ALTER TABLE `cart8899012`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cart8899014`
--
ALTER TABLE `cart8899014`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cart8899017`
--
ALTER TABLE `cart8899017`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `uid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8899019;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
