-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 23, 2019 at 10:21 PM
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
-- Table structure for table `image`
--

CREATE TABLE `image` (
  `image_id` int(11) NOT NULL,
  `image_file_name` varchar(256) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `caption` varchar(128) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `image`
--

INSERT INTO `image` (`image_id`, `image_file_name`, `date_added`, `caption`, `active`) VALUES
(1, 'dummy-640x400-AzukiBeans-plain.jpg', '2017-12-06 23:24:05', '', 1),
(2, 'dummy-640x400-Cherry-plain.jpg', '2017-12-06 23:24:05', '', 1),
(3, 'dummy-640x400-Chocolate-plain.jpg', '2017-12-06 23:24:58', '', 1),
(4, 'dummy-640x400-Eggs-plain.jpg', '2017-12-06 23:24:58', '', 1),
(5, 'dummy-640x400-Fish-plain.jpg', '2017-12-06 23:25:38', '', 1),
(6, 'dummy-640x400-FrozenRaspberry-plain.jpg', '2017-12-06 23:25:38', '', 1),
(7, 'dummy-640x400-Kiwi-plain.jpg', '2017-12-06 23:26:00', '', 1),
(8, 'dummy-640x400-KiwiSolo-plain.jpg', '2017-12-06 23:26:00', '', 1),
(9, 'dummy-640x400-Lecker-plain.jpg', '2017-12-06 23:26:29', '', 1),
(10, 'dummy-640x400-MandarinOrange-plain.jpg', '2017-12-06 23:26:29', '', 1),
(11, 'dummy-640x400-Orange-plain.jpg', '2017-12-06 23:26:52', '', 1),
(12, 'dummy-640x400-Spicery-plain.jpg', '2017-12-06 23:26:52', '', 1),
(13, 'dummy-640x400-Spreewald-plain.jpg', '2017-12-06 23:29:15', '', 1),
(14, 'dummy-640x400-Spuma-plain.jpg', '2017-12-06 23:29:15', '', 1),
(15, 'dummy-640x400-Strawberry-plain.jpg', '2017-12-06 23:29:37', '', 1),
(16, 'dummy-640x400-Wine-plain.jpg', '2017-12-06 23:29:37', '', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`image_id`),
  ADD UNIQUE KEY `image_file_name` (`image_file_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `image`
--
ALTER TABLE `image`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
