-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 03, 2020 at 06:40 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.2.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mericafresh`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(200) DEFAULT NULL,
  `admin_email` varchar(200) DEFAULT NULL,
  `admin_password` varchar(200) DEFAULT NULL,
  `admin_image` varchar(200) DEFAULT NULL,
  `admin_status` enum('0','1') DEFAULT NULL,
  `created_at` date DEFAULT curdate(),
  `updated_at` date DEFAULT curdate()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_email`, `admin_password`, `admin_image`, `admin_status`, `created_at`, `updated_at`) VALUES
(1, NULL, 'mericafresh@gmail.com', '1234', 'admin.jpg', '1', '2020-10-22', '2020-10-22'),
(2, 'Gautam', 'mericafresh1@gmail.com', '61c2e24214f070955c504f3290d4384a', 'admin.jpg', '1', '2020-10-22', '2020-10-22');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(200) NOT NULL,
  `created_at` varchar(200) DEFAULT NULL,
  `updated_at` varchar(200) DEFAULT NULL,
  `category_status` enum('0','1') DEFAULT NULL,
  `added_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `created_at`, `updated_at`, `category_status`, `added_by`) VALUES
(6, 'Merica Fresh', '2020-10-23', NULL, '0', 1),
(7, 'Fresh1', '2020-10-23', NULL, '0', 1),
(8, 'Fresh2', '2020-10-23', NULL, '0', 1);

-- --------------------------------------------------------

--
-- Table structure for table `farmer`
--

CREATE TABLE `farmer` (
  `f_id` int(11) NOT NULL,
  `farmer_id` varchar(200) DEFAULT NULL,
  `farmer_name` varchar(200) DEFAULT NULL,
  `farmer_email` varchar(200) DEFAULT NULL,
  `farmer_phone` varchar(200) DEFAULT NULL,
  `farmer_website` varchar(200) DEFAULT NULL,
  `farmer_owner` varchar(200) DEFAULT NULL,
  `farmer_produce` varchar(200) DEFAULT NULL,
  `farmer_certifier` varchar(200) DEFAULT NULL,
  `farmer_status` enum('0','1') DEFAULT NULL,
  `created_at` varchar(200) DEFAULT NULL,
  `updated_at` varchar(200) DEFAULT NULL,
  `added_by` int(11) DEFAULT NULL,
  `farmer_bussiness_type` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `farmer`
--

INSERT INTO `farmer` (`f_id`, `farmer_id`, `farmer_name`, `farmer_email`, `farmer_phone`, `farmer_website`, `farmer_owner`, `farmer_produce`, `farmer_certifier`, `farmer_status`, `created_at`, `updated_at`, `added_by`, `farmer_bussiness_type`) VALUES
(1, 'MERICA0001', 'Gautam', 'gautam@gmail.com', '826378612', 'http://www.web.com', 'kumar', 'sdsad', 'NJDA Organic', '0', '2020-10-28', '2020-10-30', 2, 'Farms'),
(2, 'MERICA0001', 'kumar', 'kumar@gmail.com', '78937283896', 'fjghf', 'gfghj', 'jdsda', NULL, '0', '2020-10-28', '2020-10-30', 2, NULL),
(3, 'MERICA0003', 'hgh', 'hgh@gmail.com', 'ghgh', 'hjghgh', 'ghjghjgh', 'fdsfdsf', 'USDA Organic', '0', '2020-10-28', '2020-10-29', 2, 'Wholesaler');

-- --------------------------------------------------------

--
-- Table structure for table `farmer_address`
--

CREATE TABLE `farmer_address` (
  `address_id` int(11) NOT NULL,
  `farmer_country` varchar(200) DEFAULT NULL,
  `farmer_state` varchar(200) DEFAULT NULL,
  `farmer_city` varchar(200) DEFAULT NULL,
  `farmer_address` varchar(200) DEFAULT NULL,
  `farmer_zip` varchar(200) DEFAULT NULL,
  `created_at` varchar(200) DEFAULT NULL,
  `update_at` varchar(200) DEFAULT NULL,
  `added_by` int(11) DEFAULT NULL,
  `f_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `farmer_address`
--

INSERT INTO `farmer_address` (`address_id`, `farmer_country`, `farmer_state`, `farmer_city`, `farmer_address`, `farmer_zip`, `created_at`, `update_at`, `added_by`, `f_id`) VALUES
(1, 'India', 'Jharkhand', 'Ranchi', 'Ranchi', '230', '2020-10-28', NULL, 2, 1),
(2, '6767', 'hfghf', 'kfghfg', 'yghgh', 'ghfgh', '2020-10-28', NULL, 2, 2),
(3, 'ghg', 'hjghj', 'ghjg', 'hjghj', 'ghghg', '2020-10-28', NULL, 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `farmer_product`
--

CREATE TABLE `farmer_product` (
  `p_id` int(11) NOT NULL,
  `product_name` varchar(200) DEFAULT NULL,
  `product_category` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `product_image` varchar(200) DEFAULT NULL,
  `product_status` enum('0','1') DEFAULT NULL,
  `created_at` varchar(200) DEFAULT NULL,
  `updated_at` varchar(200) DEFAULT NULL,
  `added_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `farmer_product`
--

INSERT INTO `farmer_product` (`p_id`, `product_name`, `product_category`, `quantity`, `amount`, `product_image`, `product_status`, `created_at`, `updated_at`, `added_by`) VALUES
(3, 'newapple', 7, NULL, NULL, 'user8-128x128.jpg', '0', '2020-10-29', NULL, 2),
(4, 'fruites', 6, NULL, NULL, 'user1-128x128.jpg', '0', '2020-10-29', NULL, 2);

-- --------------------------------------------------------

--
-- Table structure for table `subcategory`
--

CREATE TABLE `subcategory` (
  `subcategory_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_name` varchar(200) NOT NULL,
  `created_at` varchar(200) DEFAULT NULL,
  `updated_at` varchar(200) DEFAULT NULL,
  `subcategory_status` enum('0','1') DEFAULT NULL,
  `added_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subcategory`
--

INSERT INTO `subcategory` (`subcategory_id`, `category_id`, `subcategory_name`, `created_at`, `updated_at`, `subcategory_status`, `added_by`) VALUES
(1, 7, 'desh1', NULL, '2020-10-23', '0', 1),
(2, 6, 'New Item', NULL, NULL, '0', 1),
(3, 6, 'Code2', NULL, '2020-10-23', '0', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `farmer`
--
ALTER TABLE `farmer`
  ADD PRIMARY KEY (`f_id`);

--
-- Indexes for table `farmer_address`
--
ALTER TABLE `farmer_address`
  ADD PRIMARY KEY (`address_id`),
  ADD KEY `f_id` (`f_id`);

--
-- Indexes for table `farmer_product`
--
ALTER TABLE `farmer_product`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `subcategory`
--
ALTER TABLE `subcategory`
  ADD PRIMARY KEY (`subcategory_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `farmer`
--
ALTER TABLE `farmer`
  MODIFY `f_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `farmer_address`
--
ALTER TABLE `farmer_address`
  MODIFY `address_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `farmer_product`
--
ALTER TABLE `farmer_product`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `subcategory`
--
ALTER TABLE `subcategory`
  MODIFY `subcategory_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `farmer_address`
--
ALTER TABLE `farmer_address`
  ADD CONSTRAINT `farmer_address_ibfk_1` FOREIGN KEY (`f_id`) REFERENCES `farmer` (`f_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
