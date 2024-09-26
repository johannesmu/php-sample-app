-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 23, 2019 at 10:22 PM
-- Server version: 5.7.25-0ubuntu0.16.04.2
-- PHP Version: 7.2.15-1+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `data`
--

-- --------------------------------------------------------

--
-- Table structure for table `product_image`
--

CREATE TABLE `product_image` (
  `product_image_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `image_id` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_image`
--

INSERT INTO `product_image` (`product_image_id`, `product_id`, `image_id`, `active`) VALUES
(1, 22, 11, 1),
(2, 20, 7, 1),
(3, 38, 14, 1),
(4, 18, 15, 1),
(5, 2, 14, 1),
(6, 27, 6, 1),
(7, 16, 3, 1),
(8, 28, 4, 1),
(9, 47, 13, 1),
(10, 33, 10, 1),
(11, 48, 13, 1),
(12, 69, 2, 1),
(13, 13, 1, 1),
(14, 14, 3, 1),
(15, 57, 1, 1),
(16, 26, 1, 1),
(17, 15, 3, 1),
(18, 55, 6, 1),
(19, 68, 15, 1),
(20, 17, 3, 1),
(21, 66, 8, 1),
(22, 17, 12, 1),
(23, 50, 5, 1),
(24, 4, 2, 1),
(25, 21, 7, 1),
(26, 80, 3, 1),
(28, 33, 3, 1),
(29, 68, 7, 1),
(30, 32, 4, 1),
(31, 66, 16, 1),
(32, 18, 10, 1),
(33, 29, 1, 1),
(34, 77, 5, 1),
(35, 15, 10, 1),
(36, 42, 10, 1),
(37, 44, 16, 1),
(38, 25, 12, 1),
(39, 20, 9, 1),
(40, 49, 2, 1),
(41, 33, 7, 1),
(42, 44, 8, 1),
(43, 15, 6, 1),
(44, 48, 7, 1),
(45, 30, 2, 1),
(46, 25, 14, 1),
(47, 79, 1, 1),
(48, 64, 4, 1),
(49, 14, 12, 1),
(50, 62, 1, 1),
(51, 35, 6, 1),
(52, 71, 12, 1),
(53, 47, 16, 1),
(54, 79, 12, 1),
(55, 54, 16, 1),
(56, 68, 13, 1),
(57, 31, 5, 1),
(58, 1, 14, 1),
(59, 20, 2, 1),
(60, 77, 1, 1),
(61, 42, 3, 1),
(62, 27, 11, 1),
(63, 63, 10, 1),
(64, 31, 13, 1),
(65, 39, 8, 1),
(66, 59, 4, 1),
(67, 70, 11, 1),
(68, 64, 12, 1),
(70, 56, 16, 1),
(71, 6, 1, 1),
(72, 68, 8, 1),
(73, 79, 5, 1),
(74, 78, 16, 1),
(75, 76, 11, 1),
(76, 29, 7, 1),
(77, 36, 16, 1),
(78, 42, 12, 1),
(79, 33, 5, 1),
(80, 10, 6, 1),
(81, 23, 10, 1),
(82, 37, 10, 1),
(83, 59, 13, 1),
(84, 48, 8, 1),
(85, 69, 9, 1),
(86, 64, 11, 1),
(87, 50, 14, 1),
(88, 28, 7, 1),
(89, 74, 6, 1),
(90, 33, 9, 1),
(91, 25, 11, 1),
(92, 64, 14, 1),
(93, 11, 8, 1),
(94, 24, 7, 1),
(95, 47, 14, 1),
(96, 58, 6, 1),
(97, 2, 13, 1),
(98, 56, 9, 1),
(99, 12, 2, 1),
(100, 59, 2, 1),
(101, 70, 9, 1),
(102, 30, 6, 1),
(103, 1, 1, 1),
(104, 2, 2, 1),
(105, 3, 3, 1),
(106, 4, 4, 1),
(107, 5, 5, 1),
(108, 6, 6, 1),
(109, 7, 7, 1),
(110, 8, 8, 1),
(111, 9, 9, 1),
(112, 10, 10, 1),
(113, 11, 11, 1),
(114, 12, 12, 1),
(115, 13, 13, 1),
(116, 14, 14, 1),
(117, 15, 15, 1),
(118, 16, 16, 1),
(119, 17, 1, 1),
(120, 18, 2, 1),
(121, 19, 3, 1),
(122, 20, 4, 1),
(123, 81, 4, 1),
(124, 65, 7, 1),
(125, 34, 9, 1),
(126, 40, 9, 1),
(127, 41, 10, 1),
(128, 43, 13, 1),
(129, 45, 9, 1),
(130, 46, 10, 1),
(131, 51, 3, 1),
(132, 52, 4, 1),
(133, 53, 5, 1),
(134, 60, 5, 1),
(135, 61, 6, 1),
(136, 67, 1, 1),
(137, 72, 7, 1),
(138, 73, 8, 1),
(139, 75, 9, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product_image`
--
ALTER TABLE `product_image`
  ADD PRIMARY KEY (`product_image_id`),
  ADD UNIQUE KEY `product_id_2` (`product_id`,`image_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `image_id` (`image_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product_image`
--
ALTER TABLE `product_image`
  MODIFY `product_image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=140;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `product_image`
--
ALTER TABLE `product_image`
  ADD CONSTRAINT `images_image_id` FOREIGN KEY (`image_id`) REFERENCES `image` (`image_id`),
  ADD CONSTRAINT `product_image_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
