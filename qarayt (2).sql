-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 01 أغسطس 2023 الساعة 22:12
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
(93, '12', 105, 'اهداء /من العقيد امجد حميد سلطان مدير قسم حمايه شخصيات واسط \r\nالى /الفريق عادل جواد امين', '07901655897', 'زيونه قفرب دار الازياء ', '12', 'huzaifa', 'لطافة', '3', 76, 'بغداد'),
(94, '12', 105, '3224', '077.....', 'text', '13', 'زبون احمد ', '', '3', 76, ''),
(95, '3', 105, 'عرض السيف والزوليه \r\nسيف ذو الفقار علبه لون نيلي طباعه صورة ومن جهه ثانيه شعار مستشاريه الامن القومي \r\n( اهداء الى\r\nالدكتور الحقوقي فراس الربيعي\r\nاهداء من الاخ أحمد الربيعي \r\n\r\nالسَيف لا يُهدى إلى كل الرجال السَيف يُهدى للرجَال الكَريمة \r\nالي لها قُدرة مَ', '07717748931', ' حي العدل', '12', 'huzaifa', 'الهدايا الفاخره', '1', 80, 'بغداد'),
(98, '3', 95000, 'سيف ذو الفقار علبه لون نيلي طباعه صورة ومن جهه ثانيه شعار مستشاريه الامن القومي \r\n\r\n( اهداء الى\r\nالدكتور الحقوقي فراس الربيعي\r\nاهداء من الاخ أحمد الربيعي \r\n\r\nالسَيف لا يُهدى إلى كل الرجال السَيف يُهدى للرجَال الكَريمة \r\nالي لها قُدرة مَكانة ومِنزال اهل ال', '077.....', 'بغداد زيونه قرب دار الازياء ', '14', 'طوكيو', '', '1', 0, ''),
(99, '6', 100, 'عرض السيف والعصا  سيف ذو الفقار طباعه صورة ومن جهه لخ شعار جمهورية العراق \r\n( اهداء الى \r\nالعقيد عيسى خلف محمد المعموري\r\n\r\nالسَيف لا يُهدى إلى كل الرجال السَيف يُهدى للرجَال الكَريمة \r\nالي لها قُدرة مَكانة ومِنزال اهل الوَفاء واهل الفعول العَظيمة ) \r\n\r\nمش', '07811930693', 'الرمادي', '12', 'huzaifa', ' الهدايا الفاخره', '1', 80, 'الأنبار');

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
(115, '13', '[\"64c829f562d64.jpg\"]', 94),
(116, '12', '[\"64c8dfdd3a112.jpg\",\"64c8dfdd3a600.jpg\"]', 95),
(118, '14', '[\"64c8e58603980.jpg\",\"64c8e58603b67.jpg\"]', 98),
(119, '12', '[\"64c8e67538553.jpg\",\"64c8e67538724.jpg\"]', 99);

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
(14, 'طوكيو', 'toko@gmail.com', 'fcea920f7412b5da7be0cf42b8c93759', 'kkkkkkkkkkkk.jpg', 'page');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `tb_images`
--
ALTER TABLE `tb_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;

--
-- AUTO_INCREMENT for table `user_form`
--
ALTER TABLE `user_form`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

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
