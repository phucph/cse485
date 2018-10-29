-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 29, 2018 at 03:33 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

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
(' ¢¼†eIV©\"@çåƒf-ý‚mN', 3, 'admin1', '$2y$10$PSxjBaJXX1BkDxKnjQZizO5W8JdsXMBQbVtNuYNHay0', 'phuc', 'phucph62@wru.vn', '', 1);

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
  `bv_file` varchar(200) DEFAULT NULL,
  `bv_ngaydang` date DEFAULT NULL,
  `dm_id` int(11) DEFAULT NULL,
  `acc_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `baiviet`
--

INSERT INTO `baiviet` (`bv_id`, `bv_title`, `bv_tomtat`, `bv_noidung`, `bv_trangthai`, `bv_anh`, `bv_file`, `bv_ngaydang`, `dm_id`, `acc_id`) VALUES
(27, 'HongPhuc', 'tao bang cho co so du lieu 12', 'xin chao', 1, 'upload/Screenshot (10).png', 'upload/Screenshot (10).png', '2018-10-29', 7, 1);

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
(106, 'chao phuc', NULL, 1, 'phuc', '2018-10-22 04:56:19', 0),
(107, 'How are you?', NULL, 1, 'Question ?', '2018-10-22 05:10:04', 0),
(126, 'a', NULL, 2, 'toi la', '2018-10-22 05:21:32', 0),
(127, 'chao nha ', NULL, 1, 'phuc', '2018-10-22 06:01:43', 0);

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
(1, 'Đồ án tốt nghiệp', 1),
(2, 'Cơ sở dữ liệu', 1),
(3, 'Lập trình WEB', 1),
(4, 'Tin học văn phòng', 1),
(5, 'Khoa học dữ liệu', 1),
(6, 'Các chủ đề khác', 1),
(7, 'Đồ án tốt nghiệp', 2),
(8, 'Cơ sở dữ liệu', 2),
(9, 'Lập trình WEB', 2),
(10, 'Tin học văn phòng', 2),
(11, 'Khoa học dữ liệu', 2),
(12, 'Các chủ đề khác', 2);

-- --------------------------------------------------------

--
-- Table structure for table `nhatky`
--

CREATE TABLE `nhatky` (
  `nk_id` int(11) NOT NULL,
  `nk_title` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nk_tomtat` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nk_noidung` text COLLATE utf8_unicode_ci,
  `nk_trangthai` int(1) DEFAULT NULL,
  `nk_anh` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nk_file` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nk_ordernum` int(10) DEFAULT NULL,
  `nk_view` int(10) DEFAULT NULL,
  `nk_ngaydang` date DEFAULT NULL,
  `bv_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
  ADD KEY `dm_id` (`dm_id`),
  ADD KEY `acc_id` (`acc_id`);

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
  ADD KEY `acc_id` (`acc_id`);

--
-- Indexes for table `nhatky`
--
ALTER TABLE `nhatky`
  ADD PRIMARY KEY (`nk_id`),
  ADD KEY `bv_id` (`bv_id`);

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
  MODIFY `acc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `baiviet`
--
ALTER TABLE `baiviet`
  MODIFY `bv_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `cm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;

--
-- AUTO_INCREMENT for table `danhmucbaiviet`
--
ALTER TABLE `danhmucbaiviet`
  MODIFY `Dm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `nhatky`
--
ALTER TABLE `nhatky`
  MODIFY `nk_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

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
  ADD CONSTRAINT `acc_id` FOREIGN KEY (`acc_id`) REFERENCES `account` (`acc_id`),
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
-- Constraints for table `nhatky`
--
ALTER TABLE `nhatky`
  ADD CONSTRAINT `nhatky_ibfk_1` FOREIGN KEY (`bv_id`) REFERENCES `baiviet` (`bv_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
