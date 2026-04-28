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
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `date` bigint(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `zip_code` int(7) NOT NULL,
  `phone` int(12) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `total_price` int(55) NOT NULL,
  `order_id` int(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `date`, `email`, `fname`, `country`, `address`, `city`, `state`, `zip_code`, `phone`, `lname`, `total_price`, `order_id`) VALUES
(60, 1777377621, 'alam@gmail.com', 'alam', 'India', 'Delhi', 'noida', 'District of Columbia', 765212, 2147483647, 'sb', 3310, 0),
(61, 1777377748, 'john@gmail.com', 'Lareina', 'India', 'Enim nostrud sunt at', 'Ratione ut ipsam mag', 'Voluptas consequat', 40910, 1391724356, 'Snider', 244, 0),
(63, 1777377981, 'hukatewes@mailinator.com', 'Morgan', 'India', 'Delhi', 'noida', 'District of Columbia', 765212, 2147483647, 'jack', 244, 0),
(64, 1777378098, 'gytexuvil@mailinator.com', 'Blossom', 'India', 'Delhi', 'noida', 'District of Columbia', 765212, 2147483647, 'Hardin', 244, 0),
(65, 1777379282, 'alammahfooz53356@gmail.com', 'Mahfooz', 'India', 'karol bagh', 'noida', 'Arizona', 110001, 2147483647, 'al', 488, 0),
(66, 1777379292, 'alammahfooz53356@gmail.com', 'Mahfooz', 'India', 'karol bagh', 'noida', 'Arizona', 110001, 2147483647, 'al', 488, 0),
(67, 1777379618, 'hddd@gmail.com', 'Mahfooz', 'India', 'karol bagh', 'noida', 'Select State', 110001, 2147483647, 'al', 732, 0),
(68, 1777379658, 'hddd@gmail.com', 'Mahfooz', 'India', 'karol bagh', 'noida', 'Select State', 110001, 2147483647, 'al', 732, 0),
(69, 1777379795, 'hddd@gmail.com', 'Mahfooz', 'India', 'karol bagh', 'noida', 'Select State', 110001, 2147483647, 'al', 732, 0),
(70, 1777379806, 'hddd@gmail.com', 'Mahfooz', 'India', 'karol bagh', 'noida', 'Select State', 110001, 2147483647, 'al', 732, 0),
(71, 1777379888, 'alam@gmail.com', 'alam', 'India', 'Delhi', 'noida', 'District of Columbia', 765212, 2147483647, 'alam', 732, 0),
(72, 1777379901, 'alam@gmail.com', 'alam', 'India', 'Delhi', 'noida', 'District of Columbia', 765212, 2147483647, 'alam', 732, 0),
(73, 1777379981, 'alam@gmail.com', 'alam', 'India', 'Delhi', 'noida', 'District of Columbia', 765212, 2147483647, 'alam', 732, 0),
(74, 1777379986, 'alam@gmail.com', 'alam', 'India', 'Delhi', 'noida', 'District of Columbia', 765212, 2147483647, 'alam', 732, 0),
(75, 1777379999, 'alam@gmail.com', 'alam', 'India', 'Delhi', 'noida', 'District of Columbia', 765212, 2147483647, 'alam', 732, 0),
(76, 1777380469, 'alammahfooz53356@gmail.com', 'Mahfooz', 'India', 'karol bagh', 'noida', 'Arizona', 110001, 2147483647, 'al', 244, 0),
(77, 1777380524, 'alammahfooz53356@gmail.com', 'Mahfooz', 'India', 'karol bagh', 'noida', 'Arizona', 110001, 2147483647, 'al', 244, 0),
(78, 1777380580, 'alammahfooz53356@gmail.com', 'Mahfooz', 'India', 'karol bagh', 'noida', 'Arizona', 110001, 2147483647, 'al', 244, 0),
(79, 1777380585, 'alammahfooz53356@gmail.com', 'Mahfooz', 'India', 'karol bagh', 'noida', 'Arizona', 110001, 2147483647, 'al', 244, 0),
(80, 1777380621, 'ggg@gmail.com', 'Alam', 'India', 'kjfn', 'gaya', 'Georgia', 387482, 2147483647, 'a', 1708, 0),
(81, 1777380764, 'ggg@gmail.com', 'Alam', 'India', 'kjfn', 'gaya', 'Georgia', 387482, 2147483647, 'a', 1708, 0),
(82, 1777380809, 'ggg@gmail.com', 'Alam', 'India', 'kjfn', 'gaya', 'Georgia', 387482, 2147483647, 'a', 1708, 0),
(83, 1777380836, 'hddd@gmail.com', 'Mahfooz', 'India', 'karol bagh', 'noida', 'Select State', 110001, 2147483647, 'al', 430, 0),
(84, 1777380912, 'alammahfooz53356@gmail.com', 'Mahfooz', 'India', 'karol bagh', 'noida', 'Arizona', 110001, 2147483647, 'al', 860, 0),
(85, 1777380932, 'alammahfooz53356@gmail.com', 'Mahfooz', 'India', 'karol bagh', 'noida', 'Arizona', 110001, 2147483647, 'al', 860, 0),
(86, 1777381179, 'abc@gmail.com', 'ABC', 'India', 'karol bagh', 'noida', 'Delhi', 110001, 2147483647, 'KEM', 357, 0),
(87, 1777381215, 'abc@gmail.com', 'ABC', 'India', 'karol bagh', 'noida', 'Delhi', 110001, 2147483647, 'KEM', 357, 0),
(88, 1777381456, 'hddd@gmail.com', 'Mahfooz', 'India', 'karol bagh', 'noida', 'Alabama', 110001, 2147483647, 'al', 108, 0),
(89, 1777381678, 'voqoqac@mailinator.com', 'alam', 'India', 'Delhi', 'noida', 'District of Columbia', 765212, 2147483647, 'alam', 972, 0),
(90, 1777382364, 'test@gmail.com', 'Test', 'India', 'sec 3', 'Noida', 'UP', 201301, 1391724356, 'test-last', 698, 0),
(91, 1777382521, '111@gmail.com', 'farhan', 'India', 'karol bagh', 'noida', 'Alaska', 110001, 2147483647, 'kdjf', 1047, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
