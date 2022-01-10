-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 10, 2022 at 12:28 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tevos`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `session_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `user_id`, `session_id`) VALUES
(1, 10, 12),
(2, 14, 0),
(3, 7, 0),
(4, 0, 0),
(5, 29, 0);

-- --------------------------------------------------------

--
-- Table structure for table `cart_items`
--

CREATE TABLE `cart_items` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `cart_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart_items`
--

INSERT INTO `cart_items` (`id`, `product_id`, `cart_id`, `quantity`, `created_at`) VALUES
(1, 2, 1, 1, '2021-12-26 23:11:54'),
(11, 1, 1, 1, NULL),
(12, 7, 1, 1, NULL),
(13, 8, 1, 1, NULL),
(14, 9, 1, 1, NULL),
(15, 1, 2, 6, '2021-12-27 15:01:02'),
(16, 4, 2, 7, '2021-12-27 15:01:02');

-- --------------------------------------------------------

--
-- Table structure for table `postal_codes`
--

CREATE TABLE `postal_codes` (
  `id` int(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `postal_code` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `postal_codes`
--

INSERT INTO `postal_codes` (`id`, `city`, `postal_code`) VALUES
(2, 'Akarawita', 10732),
(3, 'Angamuwa', 10150),
(4, 'Avissawella', 10700),
(5, 'Batawala', 10513),
(6, 'Battaramulla', 10120),
(7, 'Batugampola', 10526),
(8, 'Bope', 10522),
(9, 'Boralesgamuwa', 10290),
(10, 'Borella', 800),
(11, 'Dedigamuwa', 10656),
(12, 'Dehiwala', 10350),
(13, 'Deltara', 10302),
(14, 'Habarakada', 10204),
(15, 'Handapangoda', 10524),
(16, 'Hanwella', 10650),
(17, 'Hewainna', 10714),
(18, 'Hiripitya', 10232),
(19, 'Hokandara', 10118),
(20, 'Homagama', 10200),
(21, 'Horagala', 10502),
(22, 'Kaduwela', 10640),
(23, 'Kahawala', 10508),
(24, 'Kalatuwawa', 10718),
(25, 'Madapatha', 10306),
(26, 'Maharagama', 10280),
(27, 'Malabe', 10115),
(28, 'Meegoda', 10504),
(29, 'Padukka', 10500),
(30, 'Pannipitiya', 10230),
(31, 'Piliyandala', 10300),
(32, 'Pitipana Homagama', 10206),
(33, 'Polgasowita', 10320),
(34, 'Puwakpitiya', 10712),
(35, 'Ranala', 10654),
(36, 'Siddamulla', 10304),
(37, 'Slave Island', 200),
(38, 'Sri Jayawardenapura', 10100),
(39, 'Talawatugoda', 10116),
(40, 'Tummodara', 10682),
(41, 'Waga', 10680),
(42, 'Watareka', 10511),
(43, 'Akurana', 20850),
(44, 'Alawatugoda', 20140),
(45, 'Aludeniya', 20062),
(46, 'Ambagahapelessa', 20986),
(47, 'Ambatenna', 20136),
(48, 'Ampitiya', 20160),
(49, 'Ankumbura', 20150),
(50, 'Atabage', 20574),
(51, 'Balana', 20308),
(52, 'Bambaragahaela', 20644),
(53, 'Barawardhana Oya', 20967),
(54, 'Batagolladeniya', 20154),
(55, 'Batugoda', 20132),
(56, 'Batumulla', 20966),
(57, 'Bawlana', 20218),
(58, 'Bopana', 20932),
(59, 'Danture', 20465),
(60, 'Dedunupitiya', 20068),
(61, 'Dekinda', 20658),
(62, 'Deltota', 20430),
(63, 'Dolapihilla', 20126),
(64, 'Dolosbage', 20510),
(65, 'Doluwa', 20532),
(66, 'Doragamuwa', 20816),
(67, 'Dunuwila', 20824),
(68, 'Ekiriya', 20732),
(69, 'Handessa', 20480),
(70, 'Hanguranketha', 20710),
(71, 'Harankahawa', 20092),
(72, 'Hasalaka', 20960),
(73, 'Hataraliyadda', 20060),
(74, 'Hewaheta', 20440),
(75, 'Hindagala', 20414),
(76, 'Hondiyadeniya', 20524),
(77, 'Hunnasgiriya', 20948),
(78, 'Jambugahapitiya', 20822),
(79, 'Kadugannawa', 20300),
(80, 'Kahataliyadda', 20924),
(81, 'Kalugala', 20926),
(82, 'Kandy', 20000),
(83, 'Kapuliyadde', 20206),
(84, 'Karandagolla', 20738),
(85, 'Leemagahakotuwa', 20482),
(86, 'lhala Kobbekaduwa', 20042),
(87, 'lllagolla', 20724),
(88, 'Lunuketiya Maditta', 20172),
(89, 'Madawala Bazaar', 20260),
(90, 'Madugalla', 20938),
(91, 'Madulkele', 20840),
(92, 'Mahadoraliyadda', 20945),
(93, 'Mahamedagama', 20216),
(94, 'Mailapitiya', 20702),
(95, 'Paradeka', 20578),
(96, 'Pasbage', 20654),
(97, 'Pattitalawa', 20511),
(98, 'Peradeniya', 20400),
(99, 'Pilawala', 20196),
(100, 'Pilimatalawa', 20450),
(101, 'Poholiyadda', 20106),
(102, 'Polgolla', 20250),
(103, 'Pujapitiya', 20112),
(104, 'Pupuressa', 20546),
(105, 'Pussellawa', 20580),
(106, 'Putuhapuwa', 20906),
(107, 'Rajawella', 20180),
(108, 'Rambukpitiya', 20676),
(109, 'Rambukwella', 20128),
(110, 'Rangala', 20922),
(111, 'Rantembe', 20990),
(112, 'Rathukohodigala', 20818),
(113, 'Rikillagaskada', 20730),
(114, 'Sangarajapura', 20044),
(115, 'Senarathwela', 20904),
(116, 'Talatuoya', 20200),
(117, 'Tawalantenna', 20838),
(118, 'Teldeniya', 20900),
(119, 'Tennekumbura', 20166),
(120, 'Uda Peradeniya', 20404),
(121, 'Elamulla', 20742),
(122, 'Etulgama', 20202),
(123, 'Galaboda', 20664),
(124, 'Galagedara', 20100),
(125, 'Galaha', 20420),
(126, 'Galhinna', 20152),
(127, 'Gallellagama', 20095),
(128, 'Gampola', 20500),
(129, 'Gelioya', 20620),
(130, 'Godamunna', 20214),
(131, 'Gomagoda', 20184),
(132, 'Gonagantenna', 20712),
(133, 'Gonawalapatana', 20656),
(134, 'Gunnepana', 20270),
(135, 'Gurudeniya', 20189),
(136, 'Halloluwa', 20032),
(137, 'Handaganawa', 20984),
(138, 'Handawalapitiya', 20438),
(139, 'Makkanigama', 20828),
(140, 'Makuldeniya', 20921),
(141, 'Mandaram Nuwara', 20744),
(142, 'Mapakanda', 20662),
(143, 'Marassana', 20210),
(144, 'Marymount Colony', 20714),
(145, 'Maturata', 20748),
(146, 'Mawatura', 20564),
(147, 'Medamahanuwara', 20940),
(148, 'MedawalaHarispattuwa', 20120),
(149, 'Meetalawa', 20512),
(150, 'Megoda Kalugamuwa', 20409),
(151, 'Menikdiwela', 20470),
(152, 'Menikhinna', 20170),
(153, 'Pallebowala', 20734),
(154, 'Pallekotuwa', 20084),
(155, 'Panvila', 20830),
(156, 'Panwilatenna', 20544),
(157, 'Udahentenna', 20506),
(158, 'Udahingulwala', 20094),
(159, 'Udatalawinna', 20802),
(160, 'Udawatta', 20722),
(161, 'Udispattuwa', 20916),
(162, 'Ududumbara', 20950),
(163, 'Uduwa', 20052),
(164, 'Uduwahinna', 20934),
(165, 'Uduwela', 20164),
(166, 'Ulapane', 20562),
(167, 'Ulpothagama', 20965),
(168, 'Unuwinna', 20708),
(169, 'Velamboda', 20640),
(170, 'Wattappola', 20454),
(171, 'Wattegama', 20810),
(172, 'Yahalatenna', 20234),
(173, 'Yatihalagala', 20034);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `productname` varchar(100) NOT NULL,
  `description` varchar(200) NOT NULL,
  `picture` varchar(100) NOT NULL,
  `price` varchar(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `productname`, `description`, `picture`, `price`, `user_id`) VALUES
(1, 'Smart watch', 'a very smart wrist watch', 'Smart_Watch.jpg', '349', 12),
(2, 'Long Sleeve Polo', 'Ash color long sleeve polo', '14.jpg', '300', 10),
(4, 'M1 macbook', 'space grey M1 Macbook pro', 'mbp-spacegray-gallery1-202011.jfif', '56789', 12),
(6, 'Badge', 'desc', 'azure-fundamentals-600x600.png', '345', 12),
(7, 'Eyeglass', 'Anti-blue light eyeglass', 'Eye glass.jpg', '345', 12),
(8, 'Shekere', 'Shekere music at it\'s best', 'IMG_20210420_215032.jpg', '345', 12),
(9, 'Denim Jacket', 'This is an authentic denim jacket', '15.jpg', '340', 8);

-- --------------------------------------------------------

--
-- Table structure for table `sellers`
--

CREATE TABLE `sellers` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `shopname` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sellers`
--

INSERT INTO `sellers` (`id`, `firstname`, `lastname`, `email`, `shopname`, `password`) VALUES
(0, 'Omoba', 'John', 'Omoba@email.com', 'Omoba Enterprises', '$2y$10$VuwYQfD3lwxRRoWe5wFQfuoKA32CFl/ajMbdr5XF91MZOfLjVmfnG'),
(0, 'Aloa', 'Vishwa', 'aloavishwa@gmail.com', 'visha supermart', '$2y$10$c.bKCORwgH.Z5/B8XXyTo.aZFyGfMxDen4FtrqjcS5g3iX7uDAF1S'),
(0, 'Donald', 'Don', 'don@email.com', 'don donald mini mart', '$2y$10$mQlseFm41BOqQ3tZLDkKb.hiCEM7hGKDgDlUW7JAZ5K2/Cez/8faO');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `api_key` varchar(255) DEFAULT NULL,
  `is_admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `password`, `api_key`, `is_admin`) VALUES
(7, 'Dan', 'Burrow', 'akorneth16@gmail.com', '$2y$10$REJe0OfWfyMsgevYHCi19edOarZyXUs1XRN7ycfbsBXyQ6Z2OrbiO', '1d52d1dd5e7f9a6232c4', 1),
(10, 'Kenneth ', 'Akor', 'ebujakes@yahoo.com', '$2y$10$EVkIQoa8ebDIWmMv1XKzZ.tG3tkRXSeS55FuQmsek4JTEYDyUeSy6', NULL, 0),
(13, 'Omoba', 'John', 'Omoba@email.com', '$2y$10$JFgxe/ZFhD6mB1d0h/7pJON2nCnusxE6ls1SptzloVouf9XMrV9PO', NULL, 0),
(14, 'Ade', 'Tiger', 'ada@f.c', '$2y$10$QNAzRXk5MFL51Ihhpv6/RuTkrdPgw80E8C9rIyp3dwEn66XEzxLBu', NULL, 0),
(29, 'Kenneth', 'Akor', 'test1@email.com', '$2y$10$s6EuXWoRDcNneBhHtZCVoOPAlhZQZGGEE0gWHO25e4I0i6XgnKErm', NULL, 0),
(33, 'Dwayne', 'Johnson', 'chenemiken15@gmail.com', '$2y$10$Xzhb2l.pZgs.qlsEsokCVOOS7oSJjuSDnqtB/GetL/Q2YzdfYGu3W', NULL, 0),
(34, 'Dwayne', 'Jude', 'Dwaynejude@gmail.com', '$2y$10$9OrVfus/pdjwsAa9rf6gIulqHWyiDzT0nZMceL4.iOWbAhYdm7UUu', NULL, 0),
(35, 'qartz', 'melon', 'quartzmelon@gmail.com', '$2y$10$JzM2FMSe5RNi7H8c0W1ugeEIUDm9AXGuTTdgtbj1Q4tl1gZ3K1zt6', NULL, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart_items`
--
ALTER TABLE `cart_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `postal_codes`
--
ALTER TABLE `postal_codes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `cart_items`
--
ALTER TABLE `cart_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `postal_codes`
--
ALTER TABLE `postal_codes`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=174;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
