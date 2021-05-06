-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 04, 2021 at 03:11 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cheif_information`
--

-- --------------------------------------------------------

--
-- Table structure for table `chefs`
--

CREATE TABLE `chefs` (
  `id` int(11) NOT NULL,
  `name` varchar(150) DEFAULT NULL,
  `experienceYear` int(11) DEFAULT NULL,
  `expectedSalary` double DEFAULT NULL,
  `specalist` varchar(150) DEFAULT NULL,
  `image` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chefs`
--

INSERT INTO `chefs` (`id`, `name`, `experienceYear`, `expectedSalary`, `specalist`, `image`) VALUES
(1, 'jubayer ahmed', 10, 20000, 'some specialist', 'download.jpg'),
(2, 'fdg', 100, 2000, 'some specialist g', '6-restaurant-facebook-covers-vol-26-.jpg'),
(3, 'fdgfdg', 1045, 4234, 'fdgfdgh', 'images.jpg'),
(4, 'fdgfdvf h', 4325, 4356, 'fdgfdghfsd', 'zzz.PNG');

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `id` int(11) NOT NULL,
  `chef_id` int(11) NOT NULL,
  `reviewer` varchar(255) NOT NULL,
  `rating` tinyint(4) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `comment_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`id`, `chef_id`, `reviewer`, `rating`, `comment`, `comment_date`) VALUES
(1, 2, 'Sabbir', 5, 'He is awesome.', '0000-00-00'),
(2, 2, 'Sabbir', 4, 'He is not so good at all. I ordered him a pizza but he burned it. So I am not satisfied at all.', '0000-00-00'),
(3, 1, 'Sabbir', 5, 'None of this happened', '0000-00-00'),
(4, 1, 'Mitu Ahmed', 5, 'Nice cook', '0000-00-00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chefs`
--
ALTER TABLE `chefs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chefs`
--
ALTER TABLE `chefs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
