-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 07, 2025 at 09:58 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shoper`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(255) NOT NULL,
  `category_name` varchar(255) DEFAULT NULL,
  `category_url` varchar(255) DEFAULT NULL,
  `create_category` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category_name`, `category_url`, `create_category`) VALUES
(5, 'MOBILES', 'mobiles', '2025-01-03'),
(6, 'COMPUTERS AND LAPTOPS', 'computers-and-laptops', '2025-01-03'),
(7, 'FASHIONS', 'fashions', '2025-01-03'),
(8, 'ARTS', 'arts', '2025-01-03');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(255) NOT NULL,
  `customerName` varchar(255) DEFAULT NULL,
  `customerEmail` varchar(255) DEFAULT NULL,
  `customerPhone` varchar(255) DEFAULT NULL,
  `customerGender` varchar(255) DEFAULT NULL,
  `customerAddress` varchar(255) DEFAULT NULL,
  `customerPassword` varchar(255) DEFAULT NULL,
  `customerStatus` varchar(255) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `customerName`, `customerEmail`, `customerPhone`, `customerGender`, `customerAddress`, `customerPassword`, `customerStatus`) VALUES
(1, 'admin', 'admin@gmail.com', '1234567890', 'male', 'jaora', '1234', '0'),
(2, 'admin2', 'admin2@gmail.com', '01234567894', 'male', 'jaora', 'papa', '0'),
(3, 'user', 'user@gmail.com', '1234566789', 'male', 'mp', '1234', '0');

-- --------------------------------------------------------

--
-- Table structure for table `management`
--

CREATE TABLE `management` (
  `id` int(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `management`
--

INSERT INTO `management` (`id`, `email`, `password`) VALUES
(1, 'admin@gmail.com', 'password');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(255) NOT NULL,
  `product_pic` varchar(255) DEFAULT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `product_amount` varchar(255) DEFAULT NULL,
  `product_qty` varchar(255) DEFAULT NULL,
  `p_total_amount` varchar(255) DEFAULT NULL,
  `customerName` varchar(255) DEFAULT NULL,
  `customerEmail` varchar(255) DEFAULT NULL,
  `customerPhone` varchar(255) DEFAULT NULL,
  `customerAddress` varchar(255) DEFAULT NULL,
  `payment_method` varchar(255) DEFAULT NULL,
  `payment_status` varchar(255) DEFAULT NULL,
  `order_status` varchar(255) DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `product_pic`, `product_name`, `product_amount`, `product_qty`, `p_total_amount`, `customerName`, `customerEmail`, `customerPhone`, `customerAddress`, `payment_method`, `payment_status`, `order_status`) VALUES
(2, '2.webp', 'REDMI 13c 5G (Starlight Black, 128 GB)', '9793', '1', '9793', 'admin', 'admin@gmail.com', '6266328578', 'jaora', 'cod', 'pending', 'completed'),
(3, 'lenovo-v14-g3-laptop-lenovo-original-imah34rsm7bxeswg.webp', 'Lenovo V14 Intel Core i5 12th Gen 1235U', '37659', '1', '37659', 'admin', 'admin@gmail.com', '6266328578', 'jaora', 'cod', 'pending', 'pending'),
(4, '-original-imahyytukhkky5ew.webp', 'vivo T3x 5G (Crimson Bliss, 128 GB)', '13999', '1', '13999', 'user', 'user@gmail.com', '1234566789', 'mp', 'cod', 'completed', 'completed'),
(5, '30-5-f5p-3004-sndart-original-imah3ftecxehyhxa.webp', 'saf Radha krishna religious for living room', '395', '2', '790', 'user', 'user@gmail.com', '1234566789', 'mp', 'cod', 'pending', 'pending'),
(6, '50-5-sanfbl35462-saf-original-imahf7udsdpxfxy2.webp', 'saf dancing deer wall painting for living room', '212', '3', '636', 'user', 'user@gmail.com', '1234566789', 'mp', 'cod', 'pending', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(255) NOT NULL,
  `product_category` varchar(255) DEFAULT NULL,
  `product_pic` varchar(255) DEFAULT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `product_amount` varchar(255) DEFAULT NULL,
  `product_qty` varchar(255) DEFAULT NULL,
  `p_total_amount` varchar(255) DEFAULT NULL,
  `product_desc` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `product_category`, `product_pic`, `product_name`, `product_amount`, `product_qty`, `p_total_amount`, `product_desc`) VALUES
(1, 'mobiles', '-original-imagyr3vfpqrpkbv.webp', 'Nothing Phone (2a) 5G (White, 128 GB)', '23999', '3', '71997', '        <ul>     \r\n        <li>In The Box : Mobile Phone, Power Adapter, SIM Tray Ejector, USB Cable, Warranty Card</li>\r\n        <li>Model Number : 23124RN87I </li>\r\n        <li>Model Name : 13c 5G <li>\r\n        <li>Color : Starlight Black </li>\r\n       '),
(2, 'mobiles', '2.webp', 'REDMI 13c 5G (Starlight Black, 128 GB)', '9793', '3', '29379', ' <ul>     \r\n<li>In The Box : Mobile Phone, Power Adapter, SIM Tray Ejector, USB Cable, Warranty Card\r\n<li>Model Number : 23124RN87I </li>\r\n<li>Model Name : 13c 5G <li>\r\n<li>Color : Starlight Black </li>\r\n<li> Browse Type :Smartphones </li>\r\n<li> SIM Type '),
(3, 'mobiles', '-original-imahyytukhkky5ew.webp', 'vivo T3x 5G (Crimson Bliss, 128 GB)', '13999', '3', '41997', '        <ul>     \r\n        <li>In The Box : Mobile Phone, Power Adapter, SIM Tray Ejector, USB Cable, Warranty Card</li>\r\n        <li>Model Number : 23124RN87I </li>\r\n        <li>Model Name : 13c 5G <li>\r\n        <li>Color : Starlight Black </li>\r\n       '),
(4, 'mobiles', '-original-imagzcfjsdxtrnnz.webp', 'POCO C61 (Mystical Green, 64 GB) ', '10999', '3', '32997', '        <ul>     \r\n        <li>In The Box : Mobile Phone, Power Adapter, SIM Tray Ejector, USB Cable, Warranty Card</li>\r\n        <li>Model Number : 23124RN87I </li>\r\n        <li>Model Name : 13c 5G <li>\r\n        <li>Color : Starlight Black </li>\r\n       '),
(5, 'computers-and-laptops', '-original-imahyusrsex3y8zz.webp', 'CHUWI Intel Celeron Dual Core 11th Gen N4020 ', '19990', '3', '59970', '        <ul>     \r\n        <li>Model Number : HeroBook Plus</li>\r\n        <li>Color : grey </li>\r\n        <li> Battery Backup : Upto 9 hours </li>\r\n        <li>Processer Name: Celeron Dual Core<li>\r\n        <li>Processer Brand: Intel<li>\r\n         <li>OS '),
(6, 'computers-and-laptops', '-original-imagwhg3farcxwxs.webp', 'CHUWI Intel Celeron Quad Core 12th Gen N100', '21990', '3', '65970', '        <ul>     \r\n        <li>Model Number : HeroBook Plus</li>\r\n        <li>Color : grey </li>\r\n        <li> Battery Backup : Upto 9 hours </li>\r\n        <li>Processer Name: Celeron Dual Core<li>\r\n        <li>Processer Brand: Intel<li>\r\n         <li>OS '),
(7, 'computers-and-laptops', 'lenovo-v14-g3-laptop-lenovo-original-imah34rsm7bxeswg.webp', 'Lenovo V14 Intel Core i5 12th Gen 1235U', '37659', '3', '112977', '        <ul>     \r\n        <li>Model Number : HeroBook Plus</li>\r\n        <li>Color : grey </li>\r\n        <li> Battery Backup : Upto 9 hours </li>\r\n        <li>Processer Name: Celeron Dual Core<li>\r\n        <li>Processer Brand: Intel<li>\r\n         <li>OS '),
(8, 'fashions', '4xl-bul-24bhf120-bullmer-original-imah4zsaggxrfgyg.webp', 'Men Striped Polo Neck Cotton Blend Green T-Shirt', '499', '5', '2495', 'ok'),
(9, 'fashions', 'xl-110135271navy-sf-jeans-by-pantaloons-original-imagry84cdgfhbun.webp', 'Men Typography Round Neck Pure Cotton Dark Blue T-Shirt', '608', '5', '3040', 'ok'),
(10, 'fashions', '-original-imagxusjkcsccmyr.webp', 'Men Printed Round Neck Pure Cotton Green T-Shirt', '594', '5', '2970', 'ok'),
(11, 'fashions', 'm-t599-whbl-eyebogler-original-imah46h9vwtyzkr8.webp', 'Men Checkered Hooded Neck Cotton Blend White T-Shirt', '269', '5', '1345', 'ok'),
(12, 'fashions', 'l-ad-1-sti-original-imah7fha3yknjff4.webp', 'Men Printed Round Neck Polyester Multicolor T-Shirt', '249', '5', '1245', 'ok'),
(13, 'fashions', 'xxl-hsb11-mrn-boys-b-trends-tower-original-imagtatwgtefhnjy.webp', 'Men Typography Round Neck Pure Cotton Maroon T-Shirt', '259', '5', '1295', 'ok'),
(14, 'fashions', 'yes-2-5-m-unstitched-2-36-m-aurik1001-rosniya-original-imah85tq8pyrfdf2.webp', 'Unstitched Wool Salwar Suit Material Printed', '2390', '5', '11950', 'ok'),
(15, 'fashions', 'yes-2-m-unstitched-2-2-m-ac-jalpa-black-priyashi-original-imagnzchvxu6tkam.webp', 'Unstitched Crepe Salwar Suit Material Solid, Floral Print, Printed, Geometric Print', '1490', '5', '7450', 'ok'),
(16, 'fashions', 'free-half-sleeve-arambh-p-d-green-niyaimpex-original-imah6k2x4mgxmuxh.webp', 'Printed Semi Stitched Lehenga Choli Dark Green', '899', '5', '4495', 'ok'),
(17, 'fashions', 'free-full-sleeve-women-lehenga-choli-rani-03-e-mart-original-imahyq6tr7vxyjuz.webp', 'Embellished Semi Stitched Lehenga Choli Dark Green', '699', '5', '3495', 'ok'),
(18, 'fashions', 'free-turky-flower-patta-wine33-jihana-fab-unstitched-original-imah6k4fvk6atr9q.webp', 'Printed Kanjivaram Georgette, Silk Blend Saree Maroon', '600', '5', '3000', 'ok'),
(19, 'fashions', 'free-3952s463j-siril-unstitched-original-imah5pbnazkg8jxw.webp', 'Self Design, Woven Banarasi Silk Blend Saree Green, Gold', '499', '5', '2495', 'ok'),
(20, 'arts', '30-5-f5p-3004-sndart-original-imah3ftecxehyhxa.webp', 'saf Radha krishna religious for living room', '395', '5', '1975', 'ok'),
(21, 'arts', '20-1-fap-seven-horse-2-left-side-with-moon-frizzy-arts-original-imag9xthqhd9vy9r.webp', 'FRIZZY ARTS seven horse|photo|paintings Digital Reprint', '255', '5', '1275', 'ok'),
(22, 'arts', '12-1-gautam-buddha-poster-for-wall-decor-fliptic-original-imah7qf8hmmy3rnt.webp', 'Fliptic Gautam Buddha Poster for Wall Decor Digital Reprint ', '299', '5', '1495', 'ok'),
(23, 'arts', '50-5-sanfbl35462-saf-original-imahf7udsdpxfxy2.webp', 'saf dancing deer wall painting for living room', '212', '5', '1060', 'ok'),
(24, 'arts', '11-1-9x12-copper-gold-frame-23669-dharvika-prime-original-imah732sausygsyh.webp', 'Dharvika Prime Ganapati/ganesha photo frame ', '284', '5', '1420', 'ok'),
(25, 'arts', '13-1-gtsfra10786-s-gbn-indianara-original-imagw82eznaezpb2.webp', 'Indianara Radha Krishna Without Glass Framed Art Print', '245', '5', '1225', 'ok'),
(26, 'arts', '14-fap-280-frizzy-arts-original-imag3ze9uupvrqp7.webp', 'FRIZZY ARTS Hanuman Ji Framed Painting', '340', '5', '1700', 'ok');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `management`
--
ALTER TABLE `management`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `management`
--
ALTER TABLE `management`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
