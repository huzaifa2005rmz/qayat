-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 31 يوليو 2023 الساعة 23:49
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
  `price` int(255) NOT NULL,
  `note` varchar(255) NOT NULL,
  `userNumber` varchar(255) NOT NULL,
  `addreces` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `order_page_name` varchar(255) NOT NULL,
  `page_name` varchar(255) NOT NULL,
  `statuse` varchar(50) NOT NULL,
  `priceAd` int(255) NOT NULL,
  `Governorate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- إرجاع أو استيراد بيانات الجدول `orders`
--

INSERT INTO `orders` (`id`, `orderN`, `price`, `note`, `userNumber`, `addreces`, `user_id`, `order_page_name`, `page_name`, `statuse`, `priceAd`, `Governorate`) VALUES
(93, '12', 95, 'اهداء /من العقيد امجد حميد سلطان مدير قسم حمايه شخصيات واسط \r\nالى /الفريق عادل جواد امين', '07901655897', 'زيونه قفرب دار الازياء ', '12', 'huzaifa', 'لطافة', '1', 70, 'بغداد'),
(94, '12', 95000, '3224', '077.....', 'text', '13', 'زبون احمد ', '', '', 0, '');

-- --------------------------------------------------------

--
-- بنية الجدول `products`
--

CREATE TABLE `products` (
  `imageProduct` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- إرجاع أو استيراد بيانات الجدول `products`
--

INSERT INTO `products` (`imageProduct`, `title`, `contact`, `price`) VALUES
('photo_2023-07-31_13-45-2908a4415e9d594ff960030b921d42b91eee.jpg', 'ee', 'test2', 'test3'),
('08a4415e9d594ff960030b921d42b91eee.jpg', 'ee', 'test2', 'test3');

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
(114, '12', '[\"64c82561c5cb9.jpg\"]', 93),
(115, '13', '[\"64c829f562d64.jpg\"]', 94);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT for table `tb_images`
--
ALTER TABLE `tb_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

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
