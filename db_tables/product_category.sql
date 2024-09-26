-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 18, 2020 at 07:01 PM
-- Server version: 5.7.27-0ubuntu0.16.04.1
-- PHP Version: 7.3.9-1+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `testdata`
--

-- --------------------------------------------------------

--
-- Table structure for table `product_category`
--

CREATE TABLE `product_category` (
  `row_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_category`
--

INSERT INTO `product_category` (`row_id`, `product_id`, `category_id`, `active`) VALUES
(1, 1, 1, 1),
(2, 2, 3, 1),
(3, 3, 4, 1),
(4, 4, 5, 1),
(5, 5, 6, 1),
(6, 6, 1, 1),
(7, 7, 3, 1),
(8, 8, 4, 1),
(9, 9, 5, 1),
(10, 10, 6, 1),
(11, 11, 1, 1),
(12, 12, 3, 1),
(13, 13, 4, 1),
(15, 15, 6, 1),
(16, 16, 1, 1),
(17, 17, 3, 1),
(18, 18, 4, 1),
(19, 19, 5, 1),
(20, 20, 6, 1),
(21, 21, 1, 1),
(22, 22, 3, 1),
(23, 23, 4, 1),
(24, 24, 5, 1),
(25, 25, 6, 1),
(26, 26, 1, 1),
(27, 27, 3, 1),
(28, 28, 4, 1),
(29, 29, 5, 1),
(30, 30, 3, 1),
(31, 31, 1, 1),
(32, 32, 3, 1),
(33, 33, 4, 1),
(34, 34, 5, 1),
(35, 35, 6, 1),
(36, 36, 1, 1),
(37, 37, 3, 1),
(38, 38, 4, 1),
(39, 39, 5, 1),
(40, 40, 6, 1),
(41, 40, 1, 1),
(42, 41, 3, 1),
(43, 42, 4, 1),
(44, 43, 5, 1),
(45, 44, 6, 1),
(46, 45, 1, 1),
(47, 46, 3, 1),
(48, 47, 4, 1),
(49, 48, 5, 1),
(50, 49, 3, 1),
(51, 50, 4, 1),
(52, 51, 1, 1),
(53, 52, 3, 1),
(54, 53, 4, 1),
(55, 54, 5, 1),
(56, 55, 6, 1),
(57, 56, 1, 1),
(58, 57, 3, 1),
(59, 58, 4, 1),
(60, 59, 5, 1),
(61, 60, 6, 1),
(62, 61, 1, 1),
(63, 62, 3, 1),
(64, 63, 4, 1),
(65, 64, 5, 1),
(66, 65, 6, 1),
(67, 66, 1, 1),
(68, 67, 3, 1),
(69, 68, 4, 1),
(70, 69, 5, 1),
(71, 70, 6, 1),
(72, 71, 1, 1),
(73, 72, 3, 1),
(74, 73, 4, 1),
(75, 74, 5, 1),
(76, 75, 6, 1),
(77, 76, 1, 1),
(78, 77, 3, 1),
(79, 78, 4, 1),
(80, 79, 5, 1),
(81, 80, 6, 1),
(82, 81, 1, 1),
(83, 74, 6, 1),
(84, 26, 5, 1),
(85, 80, 3, 1),
(88, 29, 4, 1),
(89, 61, 6, 1),
(93, 49, 6, 1),
(94, 43, 6, 1),
(95, 40, 3, 1),
(96, 80, 1, 1),
(98, 67, 4, 1),
(99, 80, 5, 1),
(100, 79, 1, 1),
(101, 13, 6, 1),
(102, 43, 4, 1),
(103, 48, 4, 1),
(104, 44, 5, 1),
(105, 53, 3, 1),
(106, 31, 3, 1),
(107, 9, 1, 1),
(108, 67, 1, 1),
(109, 35, 3, 1),
(110, 50, 3, 1),
(111, 51, 6, 1),
(113, 38, 6, 1),
(114, 81, 3, 1),
(115, 66, 6, 1),
(116, 53, 1, 1),
(117, 42, 3, 1),
(120, 71, 3, 1),
(121, 41, 6, 1),
(122, 8, 6, 1),
(123, 48, 6, 1),
(124, 37, 1, 1),
(125, 76, 3, 1),
(126, 19, 1, 1),
(127, 45, 6, 1),
(128, 7, 1, 1),
(130, 46, 5, 1),
(131, 10, 4, 1),
(132, 42, 5, 1),
(133, 71, 6, 1),
(135, 30, 6, 1),
(139, 37, 4, 1),
(140, 14, 4, 1),
(141, 55, 1, 1),
(142, 63, 5, 1),
(143, 66, 3, 1),
(144, 57, 6, 1),
(146, 57, 4, 1),
(151, 20, 1, 1),
(153, 29, 6, 1),
(156, 74, 1, 1),
(159, 28, 5, 1),
(160, 54, 4, 1),
(161, 56, 4, 1),
(163, 69, 4, 1),
(168, 10, 1, 1),
(169, 81, 5, 1),
(171, 56, 5, 1),
(174, 68, 3, 1),
(176, 31, 4, 1),
(177, 31, 6, 1),
(178, 51, 5, 1),
(180, 16, 3, 1),
(181, 41, 1, 1),
(182, 15, 1, 1),
(183, 69, 3, 1),
(185, 65, 5, 1),
(186, 18, 6, 1),
(187, 37, 6, 1),
(189, 53, 6, 1),
(190, 64, 6, 1),
(192, 12, 5, 1),
(193, 20, 5, 1),
(194, 8, 3, 1),
(195, 76, 4, 1),
(197, 18, 3, 1),
(199, 15, 3, 1),
(202, 1, 3, 1),
(204, 35, 4, 1),
(206, 61, 4, 1),
(207, 11, 3, 1),
(208, 1, 6, 1),
(211, 38, 1, 1),
(218, 41, 4, 1),
(219, 79, 4, 1),
(220, 4, 6, 1),
(222, 23, 6, 1),
(227, 11, 4, 1),
(228, 69, 6, 1),
(230, 4, 3, 1),
(234, 24, 1, 1),
(235, 72, 1, 1),
(236, 30, 1, 1),
(238, 14, 5, 1),
(240, 39, 6, 1),
(245, 9, 4, 1),
(248, 11, 5, 1),
(249, 48, 3, 1),
(250, 58, 1, 1),
(252, 62, 1, 1),
(253, 59, 3, 1),
(255, 79, 6, 1),
(256, 7, 4, 1),
(259, 80, 4, 1),
(260, 81, 6, 1),
(261, 2, 5, 1),
(264, 50, 5, 1),
(265, 66, 4, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product_category`
--
ALTER TABLE `product_category`
  ADD PRIMARY KEY (`row_id`),
  ADD KEY `product_id` (`product_id`,`category_id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `product_id_2` (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product_category`
--
ALTER TABLE `product_category`
  MODIFY `row_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=266;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `product_category`
--
ALTER TABLE `product_category`
  ADD CONSTRAINT `product_category_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`),
  ADD CONSTRAINT `product_category_ibfk_3` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
