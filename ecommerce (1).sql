-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 08, 2026 at 03:10 PM
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
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `category_slug` text NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `date` bigint(22) NOT NULL,
  `category_link` varchar(255) NOT NULL,
  `parent_id` int(11) DEFAULT 0,
  `category_image` text NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category_slug`, `category_name`, `date`, `category_link`, `parent_id`, `category_image`, `status`) VALUES
(32, 'rings', 'Ring', 1771248022, '', 0, '1770273815_img.webp', '1'),
(37, 'nacklaces', 'Necklaces', 0, '', 0, '1770287487_img.webp', '1'),
(38, 'bracelets', 'Bracelets', 0, '', 0, '1770275480_img.webp', '1'),
(40, 'bangles', 'Bangles', 0, '', 38, '', '1'),
(41, 'cluster', 'Cluster', 0, '', 38, '', '1'),
(43, 'tennis', 'Tennis', 0, '', 38, '', '1'),
(44, 'pearl-bracelets', 'Pearl Bracelets', 0, '', 38, '', '1'),
(45, 'diamond-shoulders ', 'Diamond Shoulders ', 0, '', 0, '1770287830_img.jpg', '1'),
(49, 'diamond-necklaces', 'Diamond Necklaces', 0, '', 37, '', '1'),
(50, 'gemstone-necklaces', 'Gemstone Necklaces', 0, '', 37, '', '1'),
(51, 'pearl-necklaces', 'Pearl Necklaces', 0, '', 37, '', '1'),
(52, 'diamond-pendants', 'Diamond Pendants', 0, '', 37, '', '1'),
(53, 'earrings', 'Earrings', 0, '', 0, '1770287997_img.jpg', '1'),
(54, 'diamond-earrings', 'Diamond Earrings', 0, '', 53, '', '1'),
(55, 'gemstone-earrings', 'Gemstone Earrings', 0, '', 53, '', '1'),
(56, 'pearl-earrings', 'Pearl Earrings', 0, '', 53, '', '1'),
(57, 'studs ', 'Studs ', 0, '', 53, '', '1'),
(58, 'gemstone', 'Gemstone ', 0, '', 0, '1770288058_img.jpg', '1'),
(59, 'gemstone-earrings', 'Gemstone Earrings', 0, '', 58, '', '1'),
(60, 'gemstone-eternity-rings', 'Gemstone Eternity Rings', 0, '', 58, '', '1'),
(61, 'wedding-bands ', 'Wedding Bands ', 0, '', 0, '1770288342_img.jpg', '1'),
(62, 'diamond-set ', 'Diamond Set ', 0, '', 61, '', '1'),
(63, 'signet-rings', 'Signet Rings', 0, '', 61, '', '1'),
(72, 'solitaire ', 'Solitaire ', 1775211838, '', 0, '1775211838_img.png', '1'),
(76, 'trilogy ', 'Trilogy ', 0, '', 32, '', '1'),
(78, 'vintage ', 'Vintage ', 0, '', 32, '', '1');

-- --------------------------------------------------------

--
-- Table structure for table `contact_requests`
--

CREATE TABLE `contact_requests` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `teams` varchar(255) NOT NULL,
  `phone` bigint(255) NOT NULL,
  `address1` text NOT NULL,
  `address2` text NOT NULL,
  `country` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `designation` int(255) NOT NULL,
  `message` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_requests`
--

INSERT INTO `contact_requests` (`id`, `name`, `teams`, `phone`, `address1`, `address2`, `country`, `state`, `city`, `designation`, `message`, `email`, `date`) VALUES
(10, 'Valentine Gamble', 'teams9', 21218384327, '52 Hague Drive', 'Expedita aliquip con', '', '', '', 0, 'Eos in excepturi mo', 'qulix@mailinator.com', '0000-00-00'),
(11, 'Tatiana Mendez', 'teams3', 9821787621, '918 New Court', 'Ullamco rem repudian', '', '', '', 0, 'Ut tenetur placeat ', 'bizulopiz@mailinator.com', '0000-00-00'),
(14, 'Sopoline Hurley', 'teams6', 1, '63 South Green Fabien Drive', 'In ipsa nesciunt v', '', '', '', 0, 'Sopoline Hurley', 'vewyjobap@mailinator.com', '0000-00-00'),
(15, 'Jael Hopkins', 'teams2', 1, '379 West First Freeway', 'Labore perspiciatis', 'newziland', 'Urisa', 'patna', 0, 'Jael Hopkins', 'kidoky@mailinator.com', '0000-00-00'),
(16, 'Alan Murphy', 'teams4', 1, '10 Green First Extension', 'Suscipit explicabo ', '', '', '', 0, 'Alan Murphy', 'besihiwili@mailinator.com', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `home_banner`
--

CREATE TABLE `home_banner` (
  `id` int(11) NOT NULL,
  `add_date` bigint(22) NOT NULL,
  `banner_title` varchar(256) NOT NULL,
  `banner_slug` varchar(256) NOT NULL,
  `banner_sub_title` longtext NOT NULL,
  `banner_image` text NOT NULL,
  `sort_order` int(12) NOT NULL,
  `banner_btn` text NOT NULL,
  `status` enum('1','0') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `home_banner`
--

INSERT INTO `home_banner` (`id`, `add_date`, `banner_title`, `banner_slug`, `banner_sub_title`, `banner_image`, `sort_order`, `banner_btn`, `status`) VALUES
(7, 1773398471, 'Do not miss our amazing grocery deals', 'Do not miss our amazing grocery deals', 'Get up to 30% off on your first $150 purchase', '1773398471_img.png', 0, 'Shop Now', '1'),
(8, 1773398518, 'Get up to 30% off on your first $150 purchase', 'Get up to 30% off on your first $150 purchase', 'Do not miss our amazing  grocery deals', '1773398518_img.png', 1, 'Shop Now', '1'),
(10, 1773398606, 'Aliquid sint sunt n', 'Ab consectetur dolor', 'Unde eu fugit minim', '1773398556_img.png', 223, 'Ipsam aliquip at com', '1'),
(11, 1773398633, 'Consequatur et impe', 'Ad in fugit sit de', 'Aut nesciunt libero', '1773398633_img.webp', 19, 'Praesentium unde iru', '1'),
(12, 1773398669, 'Fugiat magni cillum ', 'Culpa esse quaerat ', 'Est impedit minus ', '1773398669_img.webp', 4, 'Pariatur Dolor volu', '1');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `full name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `password`, `full name`) VALUES
(1, 'Mahfooz ', '123456', 'Mahfooz Alam');

-- --------------------------------------------------------

--
-- Table structure for table `page`
--

CREATE TABLE `page` (
  `id` int(11) NOT NULL,
  `add_date` bigint(22) NOT NULL,
  `title` varchar(256) NOT NULL,
  `slug` varchar(256) NOT NULL,
  `description` longtext NOT NULL,
  `banner_image` text NOT NULL,
  `sort_order` int(12) NOT NULL,
  `content` longtext NOT NULL,
  `status` enum('1','0') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `add_date` bigint(20) NOT NULL,
  `product_title` varchar(256) NOT NULL,
  `product_sku` varchar(256) NOT NULL,
  `product_slug` varchar(256) NOT NULL,
  `product_price` int(55) NOT NULL,
  `product_short_des` longtext NOT NULL,
  `product_long_des` longtext NOT NULL,
  `product_qty` int(55) NOT NULL,
  `product_image` text NOT NULL,
  `category_id` varchar(12) NOT NULL,
  `product_sort_order` int(12) NOT NULL,
  `product_details` longtext NOT NULL,
  `product_additional_info` longtext NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `add_date`, `product_title`, `product_sku`, `product_slug`, `product_price`, `product_short_des`, `product_long_des`, `product_qty`, `product_image`, `category_id`, `product_sort_order`, `product_details`, `product_additional_info`, `status`) VALUES
(1, 1771244754, 'Rings-yttts-TTP', 'RN093', 'ring', 25, 'This is a onion -T', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 1, '1770283974_img.webp', '32', 34534, '', ' <table class=\"table\">\r\n                                                    <thead>\r\n                                                        <tr>\r\n                                                            <th>Kitchen Fade Defy</th>\r\n                                                            <th>50KG</th>\r\n                                                        </tr>\r\n                                                    </thead>\r\n                                                    <tbody>\r\n                                                        <tr>\r\n                                                            <td>PRAN Full Cream Milk Powder</td>\r\n                                                            <td>3KG</td>\r\n                                                        </tr>\r\n                                                        <tr>\r\n                                                            <td>Net weight</td>\r\n                                                            <td>8KG</td>\r\n                                                        </tr>\r\n                                                        <tr>\r\n                                                            <td>Brand</td>\r\n                                                            <td>Reactheme</td>\r\n                                                        </tr>\r\n                                                        <tr>\r\n                                                            <td>Item code</td>\r\n                                                            <td>4000000005</td>\r\n                                                        </tr>\r\n                                                        <tr>\r\n                                                            <td>Product type</td>\r\n                                                            <td>Powder milk</td>\r\n                                                        </tr>\r\n                                                    </tbody>\r\n                                                </table>', '1'),
(2, 1771244680, 'R-3423', 'Pa02', 'r1234', 20, 'This is poptato', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 1, '1770287316_img.webp', '37', 2, '', ' ', '1'),
(3, 1771244698, 'Quo rerum aliquid in', 'Laboris molestiae es', 'Harum similique quae', 620, 'Et et accusantium qu', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 1, '1770285793_img.webp', '32', 62, '', '', '1'),
(4, 0, 'Id quisquam est dign', 'Mollitia corrupti o', 'Molestias aliqua As', 592, 'Et quod aut voluptas', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 1, '1770286697_img.webp', '32', 55, '', '', '1'),
(5, 0, 'Quod et ut voluptati', 'Facilis veniam vita', 'Ipsum Nam id libero ', 29, 'Totam iusto dolorum ', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 1, '1770286845_img.webp', '32', 66, '', '', '1'),
(6, 0, 'Qui vel minima illum', 'Minim fugit dolorib', 'Aut ex deserunt duci', 258, 'Beatae dolor in aut ', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 1, '1770286859_img.webp', '32', 73, '', '', '1'),
(7, 0, 'Voluptates incididun', 'Aute sed ad placeat', 'Alias rerum fugiat ', 778, 'Aut voluptas ullamco', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 1, '1770286873_img.webp', '32', 84, '', '', '1'),
(8, 0, 'Aut ipsa quia reici', 'Nam commodi possimus', 'Ut dignissimos atque', 347, 'Quis ut vero tempor ', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 1, '1770286933_img.webp', '32', 99, '', '', '1'),
(9, 0, 'In magnam voluptatem', 'Fugit possimus eu ', 'Voluptates fugiat si', 634, 'Consequat Optio in', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 1, '1770286967_img.webp', '32', 28, '', '', '1'),
(10, 0, 'Laudantium consequa', 'Corporis eveniet ul', 'Doloremque aute dign', 268, 'Sed ut unde ullamco ', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 1, '1770286991_img.webp', '32', 96, '', '', '1'),
(11, 0, 'Cupidatat error volu', 'Ut dolore adipisicin', 'Sint sit reiciendis', 883, 'Sit quis sit aliquid', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 1, '1770287002_img.webp', '32', 84, '', '', '1'),
(12, 0, 'Iste incididunt inci', 'Neque iste consectet', 'A excepteur aut repu', 926, 'Error id tempora ape', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 1, '1770287102_img.webp', '38', 89, '', '', '1'),
(13, 0, 'Ea est cupidatat con', 'Anim sed id volupta', 'Tempora nulla qui na', 820, 'Neque eveniet rem v', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 1, '1770287118_img.webp', '38', 32, '', '', '1'),
(14, 0, 'Ad dolore tenetur su', 'Dolorem deserunt qui', 'Dolor ad aspernatur ', 678, 'Mollitia eiusmod qua', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 1, '1770287134_img.webp', '38', 93, '', '', '1'),
(15, 0, 'Maiores et qui volup', 'Beatae quam incidunt', 'Adipisci consequatur', 64, 'Et pariatur Fugiat', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 1, '1770287153_img.webp', '38', 81, '', '', '1'),
(16, 0, 'Tenetur aut voluptat', 'Itaque dolores sunt ', 'Qui sit minus dignis', 823, 'Ut irure recusandae', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 1, '1770287176_img.webp', '38', 50, '', '', '1'),
(17, 0, 'Voluptate ipsum inve', 'Est consequatur fac', 'Officia sit aliquam', 570, 'Omnis sit laboris do', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 1, '1770287208_img.webp', '38', 90, '', '', '1'),
(18, 0, 'Est voluptate velit', 'Quia sint voluptatem', 'Ex tempore at commo', 788, 'Excepturi temporibus', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 1, '1770287223_img.webp', '38', 64, '', '', '1'),
(19, 0, 'Eligendi numquam nul', 'Nobis culpa lorem q', 'Omnis tenetur error ', 87, 'Accusamus sed totam ', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 1, '1770287235_img.webp', '38', 23, '', '', '1'),
(20, 0, 'Magnam reprehenderit', 'Distinctio Odio dol', 'Aut in aut aspernatu', 21, 'Voluptatum reprehend', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 1, '1770287256_img.webp', '38', 88, '', '', '1'),
(21, 0, 'Doloremque dolor har', 'Sint non possimus s', 'Sapiente voluptate q', 203, 'Et amet vero dolore', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 1, '1770287272_img.webp', '38', 97, '', '', '1'),
(22, 0, 'Voluptas dolores mag', 'Ea aut dolore possim', 'Quo id quo consequa', 582, 'Amet optio officia', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 1, '1770287503_img.webp', '37', 81, '', '', '1'),
(23, 0, 'Id et architecto id', 'Cumque vel vero dolo', 'Ea amet fugiat natu', 533, 'Rem beatae esse sed ', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 1, '1770287544_img.webp', '37', 40, '', '', '1'),
(24, 0, 'Eius dignissimos et ', 'Deleniti eius ut eum', 'Nobis est molestiae ', 637, 'Sit ipsum temporibu', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 1, '1770287601_img.webp', '37', 32, '', '', '1'),
(25, 0, 'A qui perspiciatis ', 'Laboris explicabo L', 'Quibusdam eu officia', 138, 'Aperiam sunt ad et ', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 1, '1770287614_img.webp', '37', 82, '', '', '1'),
(26, 0, 'Quia accusantium ut ', 'Sequi voluptate labo', 'Non excepteur nostru', 553, 'Amet quas ea omnis ', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 1, '1770287625_img.webp', '37', 100, '', '', '1'),
(27, 0, 'Adipisci recusandae', 'Vitae unde ipsam vel', 'Animi culpa illo an', 108, 'Nam quod molestiae q', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 1, '1770287634_img.webp', '37', 18, '', '', '1'),
(28, 0, 'Quam cum sed aut lab', 'Enim aut hic rerum u', 'Asperiores iure veli', 364, 'Voluptas consequatur', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 1, '1770287801_img.png', '45', 15, '', '', '1'),
(29, 0, 'Voluptas atque eiusm', 'Voluptatem sunt sun', 'Enim in et nisi cumq', 284, 'Vel et labore tempor', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 1, '1770287858_img.jpg', '45', 79, '', '', '1'),
(30, 0, 'Tempor incidunt eos', 'Incidunt ex incidun', 'Harum est esse adip', 783, 'Tenetur eu cumque de', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 1, '1770287869_img.jpg', '45', 83, '', '', '1'),
(31, 0, 'Enim at quisquam fug', 'Consectetur dolor s', 'Esse illo sint dele', 86, 'Nesciunt quas volup', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 1, '1770287950_img.jpg', '53', 42, '', '', '1'),
(32, 0, 'Impedit nemo enim v', 'Id exercitationem a', 'Porro quia architect', 349, 'Laboris unde maiores', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 1, '1770287968_img.jpg', '53', 96, '', '', '1'),
(33, 0, 'Omnis omnis voluptat', 'Suscipit rerum et mo', 'Nostrud obcaecati cu', 513, 'Dolores reprehenderi', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 1, '1770288072_img.jpg', '58', 72, '', '', '1'),
(34, 0, 'Sed eum dolor nihil ', 'Distinctio Temporib', 'Eum ut Nam et maxime', 75, 'Magna architecto in ', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 1, '1770288085_img.jpg', '58', 7, '', '', '1'),
(35, 0, 'Sint rerum laboriosa', 'Laborum Proident n', 'Quo doloremque dolor', 293, 'Ex labore qui proide', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 1, '1770288097_img.jpg', '58', 53, '', '', '1'),
(36, 0, 'Et reprehenderit eum', 'Doloremque aute non ', 'Nihil minim dolor es', 944, 'Hic pariatur Qui et', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 1, '1770288117_img.jpg', '58', 57, '', '', '1'),
(37, 0, 'Et dignissimos velit', 'Ad commodo doloribus', 'Adipisci officiis ne', 496, 'Consequuntur nobis r', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 1, '1770288378_img.webp', '61', 12, '', '', '1'),
(38, 0, 'Quod nostrum accusam', 'Dolores eum corrupti', 'Voluptates quibusdam', 893, 'Est magnam voluptas ', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 1, '1770288389_img.webp', '61', 87, '', '', '1'),
(39, 0, 'Delectus esse dolo', 'Doloribus autem ex i', 'Fugit aut est paria', 893, 'Totam in dolor fugia', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 1, '1770288419_img.webp', '61', 7, '', '', '1'),
(46, 1775210782, 'Reprehenderit doloru', 'Eos est et laudanti', 'Recusandae Quia sit', 695, 'Ducimus labore prae', '', 286, '1775210782_img.jpg', '58', 9, 'Omnis iure et nulla ', 'Nemo recusandae Fug', '1'),
(48, 1771322429, 'product 2', 'Earum impedit est c', 'Iste eiusmod natus d', 861, 'Velit sed debitis nu', '', 695, '1771322429_img.jpg', '76', 69, 'Velit perferendis od', 'Omnis pariatur Moll', '1'),
(49, 1771322585, 'Trilogy', 'Quia ea ut beatae co', 'trilogy', 395, 'Soluta distinctio N', '', 136, '1771322585_img.jpg', '76', 21, 'Quia consequat Itaq', 'Excepteur dignissimo', '1'),
(50, 1771322654, 'Bangles', 'Dolor architecto qua', 'Bangles', 678, 'Irure rerum expedita', '', 594, '1771322654_img.webp', '40', 75, 'Ea qui sit magna qu', 'Ut reprehenderit ali', '1'),
(51, 1771322748, 'Cluster', 'Voluptatem tenetur s', 'Cluster', 317, 'Et magna adipisci du', '', 478, '1771322748_img.jpg', '41', 11, 'Qui quas sunt expedi', 'Deleniti vero distin', '1'),
(52, 1771322811, 'Tennis', 'A velit consequuntu', 'Tennis', 320, 'Tenetur deserunt eaq', '', 218, '1771322811_img.jpg', '43', 25, 'Laboris debitis et e', 'Id aut id qui tempor', '1'),
(53, 1771322899, 'Pearl Bracelets', 'Eveniet exercitatio', 'Pearl Bracelets', 539, 'Culpa recusandae I', '', 384, '1771322899_img.webp', '44', 14, 'Aliquip sit vel rep', 'Nihil irure aut mole', '1'),
(54, 1771322988, 'Perspiciatis ad fug', 'Velit ipsum commodo ', 'Pariatur Magnam acc', 711, 'Et et beatae et culp', '', 673, '1771322988_img.jpg', '49', 68, 'Culpa qui enim volu', 'Nisi enim lorem dolo', '1'),
(55, 1771323046, 'Gemstone Necklaces', 'Officia ut facere et', 'Gemstone Necklaces', 285, 'Eiusmod tempora id n', '', 787, '1771323046_img.webp', '50', 12, 'Sit dicta hic quas ', 'Aut consequatur Lab', '1'),
(56, 1771323227, 'Pearl Necklaces', 'Sint rerum amet fug', 'Pearl Necklaces', 494, 'Qui unde veniam aut', '', 249, '1771323227_img.webp', '51', 99, 'Quidem numquam incid', 'Et fugiat non ullamc', '1'),
(57, 1771323346, 'Diamond Pendants', 'Quos ducimus possim', 'Diamond Pendants', 585, 'Iure quas dolorem as', '', 726, '1771323346_img.png', '52', 81, 'Ea sapiente dolor ma', 'Cum magna aut earum ', '1'),
(58, 1771323418, 'Diamond Earrings', 'Do sed a amet dolor', 'Diamond Earrings', 264, 'Anim ipsum rem minim', '', 877, '1771323418_img.jpg', '54', 33, 'Velit eu sed vero ad', 'Minim consequatur o', '1'),
(59, 1771323500, 'Gemstone Earrings', 'Debitis et blanditii', 'Gemstone Earrings', 430, 'Ut rerum est sunt a', '', 140, '1771323500_img.png', '55', 8, 'Sint duis voluptate ', 'Accusantium molestia', '1'),
(60, 1771323886, 'Pearl Earrings', 'Qui Nam fugiat sit ', 'Pearl Earrings', 244, 'Adipisicing reiciend', '', 237, '1771323886_img.jpg', '56', 12, 'Vel est sunt tempor', 'Esse repellendus Q', '1'),
(61, 1771323952, 'Studs', 'Consequat Voluptas ', 'Studs', 976, 'Fugit aut sit quod', '', 145, '1771323952_img.jpg', '57', 22, 'Debitis blanditiis q', 'Quia aspernatur dolo', '1'),
(62, 1771324027, 'Gemstone Earrings', 'Quis delectus omnis', 'Gemstone Earrings', 788, 'Minima eiusmod ut al', '', 80, '', '55', 49, 'Delectus eius velit', 'Non saepe ullam et n', '1'),
(63, 1771324274, 'Gemstone Eternity Rings', 'Tempor cupidatat qui', 'Gemstone Eternity Rings', 8, 'Accusantium enim vol', '', 195, '1771324274_img.png', '60', 1, 'Dolorum ipsa beatae', 'Natus dicta incidunt', '1'),
(64, 1771324355, 'Diamond Set', 'Odio magna qui numqu', 'Diamond Set', 463, 'Amet ducimus tempo', '', 350, '1771324355_img.png', '62', 33, 'Ut perferendis dolor', 'Aperiam eu in sed ab', '1'),
(65, 1771324404, 'Signet Rings', 'Ipsam officiis debit', 'Signet Rings', 186, 'Aspernatur sunt quia', '', 422, '1771324404_img.webp', '63', 61, 'Sed recusandae Cons', 'Nulla deserunt Nam i', '1'),
(66, 1771324457, 'Vintage', 'Quia reprehenderit ', 'Vintage', 55, 'Aut tenetur at nisi ', '', 715, '1771324457_img.png', '78', 59, 'Voluptatibus quibusd', 'Id beatae commodi m', '1'),
(67, 1775211204, 'Quo voluptatem Qui ', 'Enim illo eum volupt', 'Soluta pariatur Do ', 279, 'Quia blanditiis temp', '', 214, '1775211204_img.png', '72', 49, 'Voluptatem sit volup', 'Vero eiusmod deserun', '1'),
(68, 1775211283, 'Nam est sunt nihil c', 'Voluptates Nam place', 'Et adipisci quam vel', 63, 'Laboris impedit lab', '', 300, '1775211283_img.webp', '72', 99, 'Incidunt minus mini', 'Deserunt id quia ma', '1');

-- --------------------------------------------------------

--
-- Table structure for table `product_order`
--

CREATE TABLE `product_order` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `teams` varchar(255) NOT NULL,
  `phone` bigint(255) NOT NULL,
  `address1` text NOT NULL,
  `address2` text NOT NULL,
  `country` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `designation` int(255) NOT NULL,
  `message` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_requests`
--
ALTER TABLE `contact_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_banner`
--
ALTER TABLE `home_banner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page`
--
ALTER TABLE `page`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_order`
--
ALTER TABLE `product_order`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `contact_requests`
--
ALTER TABLE `contact_requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `home_banner`
--
ALTER TABLE `home_banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `page`
--
ALTER TABLE `page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `product_order`
--
ALTER TABLE `product_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
