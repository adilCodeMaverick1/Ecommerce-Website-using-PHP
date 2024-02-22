-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 22, 2024 at 11:40 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `brand_id` int(10) NOT NULL,
  `brand_title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`brand_id`, `brand_title`) VALUES
(1, 'Al fajar'),
(2, 'Zara'),
(3, 'j.'),
(4, 'Al karam'),
(5, 'Amazon');

-- --------------------------------------------------------

--
-- Table structure for table `caart`
--

CREATE TABLE `caart` (
  `product_id` int(11) NOT NULL,
  `ip_add` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `catagories`
--

CREATE TABLE `catagories` (
  `cat_id` int(10) NOT NULL,
  `cat_title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `catagories`
--

INSERT INTO `catagories` (`cat_id`, `cat_title`) VALUES
(1, 'New Born Baba'),
(2, 'b boys'),
(3, 'c boys'),
(4, 'd boys'),
(5, 'New Born Baby');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(10) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `customer_email` varchar(100) NOT NULL,
  `customer_pass` varchar(100) NOT NULL,
  `customer_country` text NOT NULL,
  `customer_city` text NOT NULL,
  `customer_contact` int(100) NOT NULL,
  `customer_address` text NOT NULL,
  `customer_image` text NOT NULL,
  `customer_ip` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `customer_name`, `customer_email`, `customer_pass`, `customer_country`, `customer_city`, `customer_contact`, `customer_address`, `customer_image`, `customer_ip`) VALUES
(1, 'Muhammad Adil', 'user@icloud.com', 'user123', 'pakistan', 'karachi', 222194642, '13/19 !!d new karachi', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(10) NOT NULL,
  `catagory_id` int(10) NOT NULL,
  `brand_id` int(10) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `prduct_title` text NOT NULL,
  `product_img1` text NOT NULL,
  `product_img2` text NOT NULL,
  `product_img3` text NOT NULL,
  `product_price` int(10) NOT NULL,
  `product_description` text NOT NULL,
  `product_keywords` text NOT NULL,
  `product_status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `catagory_id`, `brand_id`, `date`, `prduct_title`, `product_img1`, `product_img2`, `product_img3`, `product_price`, `product_description`, `product_keywords`, `product_status`) VALUES
(4, 1, 0, '2023-08-10 08:51:00', 'Blue Boy', '263210994_978546196412316_1387046888238225884_n.jpg', '8342328a-915d-4e9c-93e6-7baad4a3c28b.jfif', 'bg.jfif', 3000, '', 'New,baby sets,cloth,trend', 'on'),
(5, 3, 0, '2023-08-10 08:51:52', 'Royal  set', 'img 2.jpg', 'download.jpg', 'istockphoto-931577634-612x612.jpg', 5000, '', 'New,baby sets,cloth,clothes', 'on'),
(6, 1, 0, '2023-08-02 03:55:26', 'Butterfly Set', 'download.jpg', 'istockphoto-931577634-612x612.jpg', 'img 2.jpg', 2500, '', 'New,baby sets,', 'on'),
(7, 4, 0, '2023-08-10 08:52:29', '14 August outfit', 'istockphoto-931577634-612x612.jpg', 'download.jpg', 'img 2.jpg', 600, '', 'boys,cloth,clothes,leather', 'on'),
(8, 1, 0, '2023-08-02 03:56:14', 'Leather Jacket', 'lether1.jpg', 'lether 2.jpg', 'lether 3.jpg', 4000, '', 'Man,new,leather jacket', 'on'),
(9, 1, 0, '2023-08-02 03:56:45', 'Leather Jacket', 'lether1.jpg', 'lether 2.jpg', 'lether 3.jpg', 4000, '', 'Man,new,leather jacket', 'on'),
(10, 2, 1, '2023-08-10 08:52:02', 'Magma Jacket', 'lether 3.jpg', 'lether1.jpg', 'lether 2.jpg', 5000, '', 'Man,new,leather jacket,clothes', 'on'),
(11, 3, 2, '2023-08-02 03:40:35', 'Insane Jacket', 'lether 2.jpg', 'lether 3.jpg', 'lether1.jpg', 5000, '', '', 'on');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `catagories`
--
ALTER TABLE `catagories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `brand_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `catagories`
--
ALTER TABLE `catagories`
  MODIFY `cat_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
