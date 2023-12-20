-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 31, 2023 at 10:53 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `my_drive`
--

-- --------------------------------------------------------

--
-- Table structure for table `drive`
--

CREATE TABLE `drive` (
  `id` int(11) NOT NULL,
  `name` varchar(264) NOT NULL,
  `last_modified` varchar(30) NOT NULL,
  `size` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `drive`
--

INSERT INTO `drive` (`id`, `name`, `last_modified`, `size`) VALUES
(434, '5-Singin-WebDesign-2021.png', 'Mar 31, 2023 10:50 PM', '55 KB'),
(435, '6-Floated-Blogs-WebDesign-2021.png', 'Mar 31, 2023 10:50 PM', '727 KB'),
(438, '1-Home-WebDesign-2021.png', 'Mar 31, 2023 10:50 PM', '1.0 MB'),
(439, '6-Floated-Blogs-WebDesign-2021.png', 'Mar 31, 2023 10:50 PM', '727 KB'),
(440, 'google-fonts.png', 'Mar 31, 2023 10:50 PM', '67 KB'),
(441, 'dropdown-layout-menu.png', 'Mar 31, 2023 10:51 PM', '3.7 MB'),
(442, 'google-fonts.png', 'Mar 31, 2023 10:51 PM', '67 KB'),
(446, 'rental-boats.jpg', 'Mar 31, 2023 10:52 PM', '167 KB'),
(447, 'image-removebg-preview.png', 'Mar 31, 2023 10:52 PM', '68 KB'),
(450, '4-Signup-WebDesign-2021.png', 'Mar 31, 2023 10:53 PM', '253 KB'),
(451, '', 'Jan 1, 1970 1:00 AM', '0 KB');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `drive`
--
ALTER TABLE `drive`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `drive`
--
ALTER TABLE `drive`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=452;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
