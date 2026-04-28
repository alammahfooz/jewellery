-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 28, 2026 at 03:27 PM
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
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `date` bigint(20) NOT NULL,
  `product_id` int(11) NOT NULL,
  `order_status` enum('Pending','Processing','Shipped','Delivered','Cancelled') DEFAULT 'Processing',
  `qty` int(55) NOT NULL,
  `product_price` int(55) NOT NULL,
  `order_id` int(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `date`, `product_id`, `order_status`, `qty`, `product_price`, `order_id`) VALUES
(80, 0, 51, '', 1, 317, 60),
(81, 0, 54, '', 3, 711, 60),
(82, 0, 59, '', 2, 430, 60),
(83, 1777377748, 60, '', 1, 244, 61),
(85, 1777377981, 60, 'Processing', 1, 244, 63),
(86, 1777378098, 60, 'Processing', 1, 244, 64),
(87, 1777379282, 60, 'Processing', 2, 244, 65),
(88, 1777379292, 60, 'Processing', 2, 244, 66),
(89, 1777379618, 60, 'Processing', 3, 244, 67),
(90, 1777379658, 60, 'Processing', 3, 244, 68),
(91, 1777379795, 60, 'Processing', 3, 244, 69),
(92, 1777379806, 60, 'Processing', 3, 244, 70),
(93, 1777379888, 60, 'Processing', 3, 244, 71),
(94, 1777379901, 60, 'Processing', 3, 244, 72),
(95, 1777379981, 60, 'Processing', 3, 244, 73),
(96, 1777379986, 60, 'Processing', 3, 244, 74),
(97, 1777379999, 60, 'Processing', 3, 244, 75),
(98, 1777380469, 60, 'Processing', 1, 244, 76),
(99, 1777380524, 60, 'Processing', 1, 244, 77),
(100, 1777380580, 60, 'Processing', 1, 244, 78),
(101, 1777380585, 60, 'Processing', 1, 244, 79),
(102, 1777380621, 60, 'Processing', 7, 244, 80),
(103, 1777380764, 60, 'Processing', 7, 244, 81),
(104, 1777380809, 60, 'Processing', 7, 244, 82),
(105, 1777380836, 59, 'Processing', 1, 430, 83),
(106, 1777380912, 59, 'Processing', 2, 430, 84),
(107, 1777380932, 59, 'Processing', 2, 430, 85),
(108, 1777381179, 87, 'Processing', 1, 357, 86),
(109, 1777381215, 87, 'Processing', 1, 357, 87),
(110, 1777381456, 27, 'Processing', 1, 108, 88),
(111, 1777381678, 27, 'Processing', 9, 108, 89),
(112, 1777382364, 32, 'Processing', 2, 349, 90),
(113, 1777382521, 32, 'Processing', 3, 349, 91);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
