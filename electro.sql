-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 24, 2024 at 02:13 PM
-- Server version: 8.2.0
-- PHP Version: 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `electro`
--
CREATE DATABASE IF NOT EXISTS `electro` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `electro`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `create_at` timestamp NOT NULL ON UPDATE CURRENT_TIMESTAMP,
  `update_at` timestamp NOT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `image`, `slug`, `create_at`, `update_at`) VALUES
(1, 'Laptops', 'laptop1.png', 'lap-top', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Camera', 'camera1.png', 'camera', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'Headphones', 'tainghe1.png', 'tai-nghe', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'Phones', 'dt1.png', 'dien-thoai', '2024-03-21 12:24:52', '2024-03-21 12:24:52');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `price` double NOT NULL,
  `image` varchar(100) NOT NULL,
  `content` varchar(9999) NOT NULL,
  `user_id` int NOT NULL,
  `category_id` int NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `slug`, `price`, `image`, `content`, `user_id`, `category_id`, `create_at`) VALUES
(1, 'Laptop MSI', 'lap-top', 10000000, 'laptop1.png', 'Laptop chơi game chuyên dụng', 0, 1, '2024-03-24 13:11:55'),
(2, 'iPhone 14 Pro Max', 'dien-thoai', 30000000, 'dt1.png', 'Điện thoại iPhone 14 Pro Max thiết kế sang trọng', 0, 4, '2024-03-24 13:12:08'),
(3, 'Laptop Asus', 'lap-top', 20000000, 'laptop2.png', 'Laptop văn phòng', 0, 1, '2024-03-24 13:34:44'),
(4, 'Tai Nghe MSI', 'tai-nghe', 123123123, 'tainghe1.png', 'Tai nghe thông dụng ', 0, 3, '2024-03-24 13:34:44'),
(5, 'Camera Sony', 'camera', 11111111, 'camera1.png', 'Camera chụp hình sống động', 0, 2, '2024-03-24 13:35:44');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

DROP TABLE IF EXISTS `transaction`;
CREATE TABLE IF NOT EXISTS `transaction` (
  `id` int NOT NULL AUTO_INCREMENT,
  `status` int NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_phone` varchar(100) NOT NULL,
  `amount` decimal(10,0) NOT NULL,
  `payment_info` varchar(100) NOT NULL,
  `message` varchar(100) NOT NULL,
  `security` varchar(100) NOT NULL,
  `created` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `address` varchar(9999) NOT NULL,
  `password` varchar(100) NOT NULL,
  `created` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
