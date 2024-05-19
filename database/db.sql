-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 19, 2024 at 11:43 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `brillance`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `client_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `created_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `client_id`, `product_id`, `quantity`, `created_date`) VALUES
(1, NULL, NULL, NULL, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Fossil'),
(2, 'Mineral'),
(3, 'Meteorite'),
(4, 'Jewelry');

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `client_id` int(11) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `company_name` varchar(255) DEFAULT NULL,
  `company_type` varchar(255) DEFAULT NULL,
  `company_address` varchar(255) DEFAULT NULL,
  `legal_company` varchar(255) DEFAULT NULL,
  `TAX_id` varchar(255) DEFAULT NULL,
  `created_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`client_id`, `email`, `password`, `company_name`, `company_type`, `company_address`, `legal_company`, `TAX_id`, `created_date`) VALUES
(10, 'yassineaityassine777@gmail.com', 'yassinevapwirl1', 'dfwf', 'qwefqw', 'qwfvqev', 'legal', 'wef4668', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `name` varchar(50) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `seen` tinyint(1) DEFAULT 0,
  `receive_at` datetime DEFAULT NULL,
  `message_id` int(11) NOT NULL,
  `starred` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`name`, `email`, `message`, `subject`, `seen`, `receive_at`, `message_id`, `starred`) VALUES
('Bob Johnson', 'bob.johnson@example.org', 'I encountered an issue with my order.', 'Order Issue', 0, '2024-05-03 08:30:00', 45, 0),
('Alice Williams', 'alice.williams@example.com', 'Can I get a quote for your services?', 'Quote Request', 0, '2024-05-04 11:20:00', 46, 0),
('Charlie Brown', 'charlie.brown@example.edu', 'What are your office hours?', 'General Inquiry', 0, '2024-05-05 09:50:00', 47, 0),
('Medieval Scribe', 'medieval.scribe@example.com', 'Requesting ancient manuscript.', 'Historical Inquiry', 0, '1024-05-18 12:00:00', 48, 0);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `order_id` int(11) NOT NULL,
  `client_id` int(11) DEFAULT NULL,
  `cart_id` int(11) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `postal_code` varchar(10) DEFAULT NULL,
  `bank_name` varchar(255) DEFAULT NULL,
  `ship_cost` decimal(10,2) DEFAULT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `seen` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `sub_category_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `mineral_envirement` varchar(255) DEFAULT NULL,
  `fossile_period` varchar(255) DEFAULT NULL,
  `rock_type` varchar(255) DEFAULT NULL,
  `price` double DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `created_date` date NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `qr_code` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `sub_category_id`, `name`, `mineral_envirement`, `fossile_period`, `rock_type`, `price`, `quantity`, `created_date`, `image`, `qr_code`, `description`) VALUES
(171, 21, 'asdv', NULL, NULL, NULL, 15, 16, '0000-00-00', '../../uploads/product/500938.jpg', '../../uploads/product/jossuha-theophile-ZhVKeFCb6NE-unsplash.jpg', 'sdav\r\nsdv\r\nasdv'),
(173, 21, 'bij', NULL, NULL, NULL, 10, 12, '0000-00-00', '../../uploads/product/Mastercard-logo.svg.png', '../../uploads/product/windowsclosedthesessionkey_keyword_windowscierrenlasesion_11874.png', 'opun'),
(174, 1, 'RYDER', NULL, '15', NULL, 1, 1, '0000-00-00', '../../uploads/product/aodfbhpoiawheoi.jpg', '../../uploads/product/aodfbhpoiawheoi.jpg', 'qwvfq\r\nwev\r\nwerv'),
(175, 21, 'wihekfb', NULL, NULL, NULL, 195, 10, '0000-00-00', '../../uploads/product/jossuha-theophile-ZhVKeFCb6NE-unsplash.jpg', '../../uploads/product/shop.drawio.png', 'asdvadv\r\nasdv\r\nasdv'),
(176, 12, 'hello', 'SDVFAS', NULL, NULL, 100, 100, '0000-00-00', '../../uploads/product/aodfbhpoiawheoi.jpg', '', 'yeaaaaaaaah normally the id should be 176'),
(177, 1, 'CJ', NULL, '15', NULL, 120, 120, '0000-00-00', '../../uploads/product/windowsclosedthesessionkey_keyword_windowscierrenlasesion_11874.png', '005_file_6bb72f9316339a5063bc5218eeda644d.png', 'yeah bro'),
(178, 12, 'NIGGA', 'SDVFAS', NULL, NULL, 8100, 999, '0000-00-00', '../../uploads/product/Mastercard-logo.svg.png', '005_file_6bb72f9316339a5063bc5218eeda644d.png', 'adcv'),
(179, 13, 'NIGGA', 'SDVFAS', NULL, NULL, 999, 120, '0000-00-00', '../../uploads/product/15762_48x48_money_icon.png', '005_file_6bb72f9316339a5063bc5218eeda644d.png', 'wef'),
(180, 13, 'NIGGA', 'SDVFAS', NULL, NULL, 999, 120, '0000-00-00', '../../uploads/product/15762_48x48_money_icon.png', '005_file_6bb72f9316339a5063bc5218eeda644d.png', 'wef'),
(181, 1, 'nigger', NULL, '150', NULL, 888, 888, '0000-00-00', '../../uploads/product/aodfbhpoiawheoi.jpg', '005_file_6bb72f9316339a5063bc5218eeda644d.png', 'avdsf'),
(182, 1, '', NULL, '', NULL, 0, 0, '0000-00-00', '../../uploads/product/', '005_file_6bb72f9316339a5063bc5218eeda644d.png', ''),
(183, 1, '', NULL, '', NULL, 0, 0, '0000-00-00', '../../uploads/product/', '005_file_751bbd2e0f7d33a9a7fe58532339afc1.png', ''),
(184, 1, '', NULL, '', NULL, 0, 0, '0000-00-00', '../../uploads/product/', '005_file_6bb72f9316339a5063bc5218eeda644d.png', ''),
(185, 1, 'NIGGAAAAAAAAA', NULL, '1245', NULL, 99999, 9999, '0000-00-00', '../../uploads/product/', '005_file_6bb72f9316339a5063bc5218eeda644d.png', ''),
(186, 1, '', NULL, '', NULL, 0, 0, '0000-00-00', '../../uploads/product/', '005_file_751bbd2e0f7d33a9a7fe58532339afc1.png', ''),
(187, 1, '', NULL, '', NULL, 0, 0, '0000-00-00', '../../uploads/product/', '005_file_751bbd2e0f7d33a9a7fe58532339afc1.png', ''),
(188, 1, '', NULL, '', NULL, 0, 0, '0000-00-00', '../../uploads/product/', '005_file_751bbd2e0f7d33a9a7fe58532339afc1.png', ''),
(189, 1, '', NULL, '', NULL, 0, 0, '0000-00-00', '../../uploads/product/', '005_file_751bbd2e0f7d33a9a7fe58532339afc1.png', ''),
(190, 1, '', NULL, '', NULL, 0, 0, '0000-00-00', '../../uploads/product/', '005_file_751bbd2e0f7d33a9a7fe58532339afc1.png', ''),
(191, 1, '', NULL, '', NULL, 0, 0, '0000-00-00', '../../uploads/product/', '005_file_751bbd2e0f7d33a9a7fe58532339afc1.png', ''),
(192, 12, 'NIGGA', 'SDVFAS', NULL, NULL, 1220, 333, '0000-00-00', '../../uploads/product/', '005_file_751bbd2e0f7d33a9a7fe58532339afc1.png', ''),
(193, 12, 'sadbza', '', NULL, NULL, 0, 0, '0000-00-00', '../../uploads/product/', '005_file_751bbd2e0f7d33a9a7fe58532339afc1.png', ''),
(194, 12, 'sadbza', '', NULL, NULL, 0, 0, '0000-00-00', '../../uploads/product/', '005_file_751bbd2e0f7d33a9a7fe58532339afc1.png', ''),
(195, 1, '', NULL, '', NULL, 0, 0, '0000-00-00', '../../uploads/product/', '005_file_751bbd2e0f7d33a9a7fe58532339afc1.png', ''),
(196, 1, '', NULL, '', NULL, 0, 0, '0000-00-00', '../../uploads/product/', '005_file_751bbd2e0f7d33a9a7fe58532339afc1.png', ''),
(197, 1, '', NULL, '', NULL, 0, 0, '0000-00-00', '../../uploads/product/', '005_file_751bbd2e0f7d33a9a7fe58532339afc1.png', ''),
(198, 1, '', NULL, '', NULL, 0, 0, '0000-00-00', '../../uploads/product/', '005_file_751bbd2e0f7d33a9a7fe58532339afc1.png', ''),
(199, 1, '', NULL, '', NULL, 0, 0, '0000-00-00', '../../uploads/product/', '005_file_751bbd2e0f7d33a9a7fe58532339afc1.png', ''),
(200, 1, '', NULL, '', NULL, 0, 0, '0000-00-00', '../../uploads/product/', '005_file_751bbd2e0f7d33a9a7fe58532339afc1.png', ''),
(201, 1, '', NULL, '', NULL, 0, 0, '0000-00-00', '../../uploads/product/', '005_file_751bbd2e0f7d33a9a7fe58532339afc1.png', ''),
(202, 1, '', NULL, '', NULL, 0, 0, '0000-00-00', '../../uploads/product/', '005_file_1aa0e8c861cfd1549c1d851d96807aa8.png', ''),
(203, 2, '', NULL, 'erber', NULL, 0, 0, '0000-00-00', '../../uploads/product/', '005_file_95883d74538f1c4684e316280f343bfb.png', ''),
(204, 1, '', NULL, '', NULL, 0, 0, '0000-00-00', '../../uploads/product/', '005_file_91e644faaa25ef891e1ca12511dd0f13.png', ''),
(205, 1, '', NULL, '', NULL, 0, 0, '0000-00-00', '../../uploads/product/', '005_file_ac923752fcdac9a583554044d2aa67d7.png', ''),
(206, 1, '', NULL, '', NULL, 0, 0, '0000-00-00', '../../uploads/product/', '../../005_file_256f383163def7854e9abf1359dff2f3.png', ''),
(207, 1, '', NULL, '', NULL, 0, 0, '0000-00-00', '', '', 'aspkcn'),
(208, 1, '', NULL, '', NULL, 0, 0, '0000-00-00', '', '005_file_bce68e1d3dce01c44532b0b9305b0ae6.png', 'aspkcn'),
(209, 1, '', NULL, '', NULL, 0, 0, '0000-00-00', '', '005_file_bce68e1d3dce01c44532b0b9305b0ae6.png', ''),
(210, 1, '', NULL, '', NULL, 0, 0, '0000-00-00', '../../uploads/products/15762_48x48_money_icon.png', '005_file_bce68e1d3dce01c44532b0b9305b0ae6.png', ''),
(211, 1, '00000', NULL, '0000', NULL, 0, 0, '0000-00-00', '../../uploads/products/Mastercard-logo.svg.png', '005_file_bce68e1d3dce01c44532b0b9305b0ae6.png', 'nigga'),
(212, 1, '', NULL, '', NULL, 0, 0, '0000-00-00', '../../uploads/products/', '005_file_bce68e1d3dce01c44532b0b9305b0ae6.png', '');

-- --------------------------------------------------------

--
-- Table structure for table `sub_category`
--

CREATE TABLE `sub_category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `category_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sub_category`
--

INSERT INTO `sub_category` (`id`, `name`, `category_id`) VALUES
(1, 'Bacteria', 1),
(2, 'Fungi', 1),
(3, 'Invertebrates', 1),
(4, 'Plants', 1),
(5, 'Protists', 1),
(6, 'Trace', 1),
(7, 'Vertebrates', 1),
(8, 'Jewelry_Arms', 4),
(9, 'Jewelry_Hair', 4),
(10, 'Jewelry_Earring', 4),
(11, 'Jewelry_Hands', 4),
(12, 'Carbonates', 2),
(13, 'Halides', 2),
(14, 'Native', 2),
(15, 'Organic', 2),
(16, 'Oxides', 2),
(17, 'Phosphates', 2),
(18, 'Silicates', 2),
(19, 'Sulfates', 2),
(20, 'Sulfides', 2),
(21, 'Gallery', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `panier_ibfk_1` (`client_id`),
  ADD KEY `panier_ibfk_2` (`product_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`client_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`message_id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `achat_ibfk_1` (`client_id`),
  ADD KEY `achat_ibfk_2` (`cart_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `fk_sub_categorty` (`sub_category_id`);

--
-- Indexes for table `sub_category`
--
ALTER TABLE `sub_category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_categorty` (`category_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `client_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=213;

--
-- AUTO_INCREMENT for table `sub_category`
--
ALTER TABLE `sub_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `client` (`client_id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `client` (`client_id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `order_ibfk_2` FOREIGN KEY (`cart_id`) REFERENCES `cart` (`cart_id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `fk_sub_categorty` FOREIGN KEY (`sub_category_id`) REFERENCES `sub_category` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `sub_category`
--
ALTER TABLE `sub_category`
  ADD CONSTRAINT `fk_categorty` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
