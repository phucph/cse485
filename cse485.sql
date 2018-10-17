-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 17, 2018 at 10:29 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cse485`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `acc_salt` varchar(100) NOT NULL,
  `acc_id` int(11) NOT NULL,
  `acc_usename` varchar(50) NOT NULL,
  `acc_pass` varchar(50) NOT NULL,
  `acc_fullname` varchar(50) NOT NULL,
  `acc_email` varchar(50) NOT NULL,
  `acc_image` varchar(50) NOT NULL,
  `acc_role` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`acc_salt`, `acc_id`, `acc_usename`, `acc_pass`, `acc_fullname`, `acc_email`, `acc_image`, `acc_role`) VALUES
('', 1, 'PhucPH', '241198', 'Phan Hong Phuc', 'phuctp14@gmail.com', '', 1),
('', 2, 'admin', '1', 'admin', 'admin@wru.vn', '', 1),
(' ¢¼†eIV©\"@çåƒf-ý‚mN', 3, 'admin1', '$2y$10$PSxjBaJXX1BkDxKnjQZizO5W8JdsXMBQbVtNuYNHay0', 'phuc', 'phucph62@wru.vn', '', 1),
('¦áhmø¿jåÌÚ²ÓŸN$–û¨', 4, 'admin', '$2y$10$dovM35J5rUWjJ4Ua8EXy1elXsj.LZPV9Q/adFHGP.FU', 'phuc', 'phuctp14@gmail.com', '', 1),
('¾–\",ì5ØNöÚ\rMòûrï´”', 5, 'phucc', '$2y$10$PaXZiKLwswWjLALd.904auLLsKV93DST595J.2Rpm5s', 'phuc phan hong', 'phucph62@wru.vn', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `baiviet`
--

CREATE TABLE `baiviet` (
  `bv_id` int(11) NOT NULL,
  `bv_title` varchar(100) DEFAULT NULL,
  `bv_tomtat` varchar(200) DEFAULT NULL,
  `bv_noidung` text,
  `bv_trangthai` int(1) DEFAULT NULL,
  `bv_anh` varchar(200) DEFAULT NULL,
  `bv_anhthumb` varchar(200) DEFAULT NULL,
  `bv_ordernum` int(10) DEFAULT NULL,
  `bv_view` int(10) DEFAULT NULL,
  `bv_ngaydang` date DEFAULT NULL,
  `dm_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `brand_id` int(11) NOT NULL,
  `brand_name` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`brand_id`, `brand_name`) VALUES
(1, 'Samsung'),
(2, 'Sony'),
(3, 'Motorola'),
(4, 'Xiaomi');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `cm_id` int(11) NOT NULL,
  `cm_noidung` text,
  `bv_id` int(11) DEFAULT NULL,
  `acc_id` int(11) DEFAULT NULL,
  `cm_subject` varchar(100) DEFAULT NULL,
  `cm_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `parent_comment_id` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`cm_id`, `cm_noidung`, `bv_id`, `acc_id`, `cm_subject`, `cm_date`, `parent_comment_id`) VALUES
(1, ' ban nghi sao ', NULL, 1, 'hello', '2018-10-16 07:28:52', 0),
(2, 'dada', NULL, 1, 'test', '2018-10-16 07:56:22', 0),
(3, 'asa', NULL, 1, 'test', '2018-10-16 08:28:07', 0),
(4, 'asada', NULL, 1, 'p02h00p00', '2018-10-16 08:39:47', 0);

-- --------------------------------------------------------

--
-- Table structure for table `danhmucbaiviet`
--

CREATE TABLE `danhmucbaiviet` (
  `Dm_id` int(11) NOT NULL,
  `Dm_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `acc_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `danhmucbaiviet`
--

INSERT INTO `danhmucbaiviet` (`Dm_id`, `Dm_name`, `acc_id`) VALUES
(1, 'Kho tài liệu', 1),
(2, 'Đồ án tốt nghiệp', 2),
(3, 'Cơ sở dữ liệu', 3),
(4, 'Lập trình WEB', 4),
(5, 'Tin học văn phòng', NULL),
(6, 'Khoa học dữ liệu', NULL),
(7, 'Các chủ đề khác', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(250) NOT NULL,
  `brand_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `brand_id`) VALUES
(1, 'Samsung Galaxy A9', 1),
(2, 'Samsung Galaxy S7', 1),
(3, 'Samsung Galaxy S6 edge', 1),
(4, 'Xperia Z5 Premium', 2),
(5, 'Xperia M5 Dual', 2),
(6, 'Xperia C5 uplta', 2),
(7, 'Moto G Turbo', 3),
(8, 'Moto X Force', 3),
(9, 'Redmi 3 Pro', 4),
(10, 'Mi 5', 4);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `role_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`role_id`, `name`, `description`) VALUES
(1, 'admin', 'Cao Nhat'),
(2, 'user', 'Nguoi Dung');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`acc_id`);

--
-- Indexes for table `baiviet`
--
ALTER TABLE `baiviet`
  ADD PRIMARY KEY (`bv_id`),
  ADD KEY `dm_id` (`dm_id`);

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`cm_id`),
  ADD KEY `bv_id` (`bv_id`),
  ADD KEY `acc_id` (`acc_id`);

--
-- Indexes for table `danhmucbaiviet`
--
ALTER TABLE `danhmucbaiviet`
  ADD PRIMARY KEY (`Dm_id`),
  ADD UNIQUE KEY `Dm_name` (`Dm_name`),
  ADD KEY `acc_id` (`acc_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `acc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `baiviet`
--
ALTER TABLE `baiviet`
  MODIFY `bv_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `cm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `danhmucbaiviet`
--
ALTER TABLE `danhmucbaiviet`
  MODIFY `Dm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `baiviet`
--
ALTER TABLE `baiviet`
  ADD CONSTRAINT `baiviet_ibfk_1` FOREIGN KEY (`dm_id`) REFERENCES `danhmucbaiviet` (`Dm_id`);

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`bv_id`) REFERENCES `baiviet` (`bv_id`),
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`acc_id`) REFERENCES `account` (`acc_id`);

--
-- Constraints for table `danhmucbaiviet`
--
ALTER TABLE `danhmucbaiviet`
  ADD CONSTRAINT `danhmucbaiviet_ibfk_1` FOREIGN KEY (`acc_id`) REFERENCES `account` (`acc_id`);


--
-- Metadata
--
USE `phpmyadmin`;

--
-- Metadata for table account
--

--
-- Dumping data for table `pma__table_uiprefs`
--

INSERT INTO `pma__table_uiprefs` (`username`, `db_name`, `table_name`, `prefs`, `last_update`) VALUES
('root', 'cse485', 'account', '[]', '2018-10-04 11:42:27');

--
-- Metadata for table baiviet
--

--
-- Metadata for table brand
--

--
-- Metadata for table comment
--

--
-- Metadata for table danhmucbaiviet
--

--
-- Metadata for table product
--

--
-- Dumping data for table `pma__table_uiprefs`
--

INSERT INTO `pma__table_uiprefs` (`username`, `db_name`, `table_name`, `prefs`, `last_update`) VALUES
('root', 'cse485', 'product', '{\"sorted_col\":\"`product`.`brand_id` ASC\"}', '2018-10-11 08:18:53');

--
-- Metadata for table role
--

--
-- Metadata for database cse485
--

--
-- Dumping data for table `pma__relation`
--

INSERT INTO `pma__relation` (`master_db`, `master_table`, `master_field`, `foreign_db`, `foreign_table`, `foreign_field`) VALUES
('cse485', 'account', 'acc_role', 'cse485', 'role', 'role_id');

--
-- Dumping data for table `pma__pdf_pages`
--

INSERT INTO `pma__pdf_pages` (`db_name`, `page_descr`) VALUES
('cse485', 'cse485account');

SET @LAST_PAGE = LAST_INSERT_ID();

--
-- Dumping data for table `pma__table_coords`
--

INSERT INTO `pma__table_coords` (`db_name`, `table_name`, `pdf_page_number`, `x`, `y`) VALUES
('cse485', 'account', @LAST_PAGE, 256, 488),
('cse485', 'role', @LAST_PAGE, 333, 113);
SET FOREIGN_KEY_CHECKS=1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
