-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 31 يوليو 2023 الساعة 17:20
-- إصدار الخادم: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `qarayt`
--

-- --------------------------------------------------------

--
-- بنية الجدول `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `orderN` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `note` varchar(255) NOT NULL,
  `userNumber` varchar(255) NOT NULL,
  `addreces` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `order_page_name` varchar(255) NOT NULL,
  `page_name` varchar(255) NOT NULL,
  `statuse` varchar(50) NOT NULL,
  `Governorate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- إرجاع أو استيراد بيانات الجدول `orders`
--

INSERT INTO `orders` (`id`, `orderN`, `price`, `note`, `userNumber`, `addreces`, `user_id`, `order_page_name`, `page_name`, `statuse`, `Governorate`) VALUES
(91, '12', '90', 'text', '077.....', 'text', '13', 'زبون احمد ', '', '', '');

-- --------------------------------------------------------

--
-- بنية الجدول `tb_images`
--

CREATE TABLE `tb_images` (
  `id` int(11) NOT NULL,
  `name` varchar(30) DEFAULT NULL,
  `image` text DEFAULT NULL,
  `order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- إرجاع أو استيراد بيانات الجدول `tb_images`
--

INSERT INTO `tb_images` (`id`, `name`, `image`, `order_id`) VALUES
(112, '13', '[\"64c7cde09aa45.jpg\"]', 91);

-- --------------------------------------------------------

--
-- بنية الجدول `user_form`
--

CREATE TABLE `user_form` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `usertype` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- إرجاع أو استيراد بيانات الجدول `user_form`
--

INSERT INTO `user_form` (`id`, `name`, `email`, `password`, `image`, `usertype`) VALUES
(11, 'test', 'test@gmail.com', '098f6bcd4621d373cade4e832627b4f6', 'Koala.jpg', 'huzaifaD'),
(12, 'huzaifa', 'huzaifa2005rmz@gmail.com', '8122a9bf43eba9cf9fc5f2d09b278dfd', '300065081_5372568726169650_8414090678718783085_n.jpg', 'huzaifaD'),
(13, 'زبون احمد ', 'ahmed@gmail.com', '202cb962ac59075b964b07152d234b70', 'avatar-05.png', 'page');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_images`
--
ALTER TABLE `tb_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `user_form`
--
ALTER TABLE `user_form`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `tb_images`
--
ALTER TABLE `tb_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT for table `user_form`
--
ALTER TABLE `user_form`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- قيود الجداول المُلقاة.
--

--
-- قيود الجداول `tb_images`
--
ALTER TABLE `tb_images`
  ADD CONSTRAINT `tb_images_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `tb_images_ibfk_2` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
