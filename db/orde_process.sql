-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 27, 2026 at 03:27 PM
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
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `orde_process`
--

CREATE TABLE `orde_process` (
  `id` int(11) NOT NULL,
  `date` bigint(20) NOT NULL,
  `product_id` int(11) NOT NULL,
  `order_status` enum('0','1') NOT NULL,
  `total_price` int(55) NOT NULL,
  `qty` int(55) NOT NULL,
  `email` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `zip_code` int(7) NOT NULL,
  `phone` int(12) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `product_price` int(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orde_process`
--

INSERT INTO `orde_process` (`id`, `date`, `product_id`, `order_status`, `total_price`, `qty`, `email`, `fname`, `country`, `address`, `city`, `state`, `zip_code`, `phone`, `lname`, `product_price`) VALUES
(22, 1777293639, 0, '0', 0, 0, 'alammahfooz53356@gmail.com', 'Mahfooz', 'India', 'karol bagh', 'noida', 'Arizona', 110001, 2147483647, 'al', 0),
(23, 0, 0, '0', 0, 0, '{$email}', '{$fname}', '{$country}', '{$address}', '{$city}', '{$state}', 0, 0, '{$lname}', 0),
(24, 1777294279, 0, '0', 0, 0, 'john@gmail.com', 'a', 'jjj', 'kjasnfs asndnka', 'd', 'f', 87667, 2147483647, 'b', 0),
(25, 1777294294, 0, '0', 0, 0, 'cawoxosuvy@mailinator.com', 'Herman', 'Distinctio Qui reru', 'Autem beatae nesciun', 'Praesentium reiciend', 'Est delectus numqu', 98604, 1, 'Valentine', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orde_process`
--
ALTER TABLE `orde_process`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orde_process`
--
ALTER TABLE `orde_process`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
