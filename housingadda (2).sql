-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 10, 2023 at 09:43 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `housingadda`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `id` int(11) NOT NULL,
  `content` longtext CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`id`, `content`) VALUES
(1, 'hey');

-- --------------------------------------------------------

--
-- Table structure for table `clicked`
--

CREATE TABLE `clicked` (
  `id` int(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `post_id` int(10) NOT NULL,
  `time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clicked`
--

INSERT INTO `clicked` (`id`, `username`, `post_id`, `time`) VALUES
(1, '1', 1, '2023-03-22 06:03:34'),
(2, '1', 65, '2023-03-22 04:03:39'),
(3, '9167770980', 65, '2023-03-20 07:03:03'),
(4, '1', 84, '2023-03-22 04:03:10'),
(5, '9372642011', 99, '2023-03-22 07:03:59'),
(6, '9372642011', 102, '2023-03-22 07:03:34'),
(7, '9372642011', 103, '2023-03-22 07:03:12'),
(8, '9372642011', 113, '2023-03-22 08:03:03'),
(9, '1', 111, '2023-03-24 08:03:47'),
(10, '1', 112, '2023-03-28 06:03:17'),
(11, '1', 114, '2023-03-24 06:03:49'),
(12, '1', 113, '2023-03-24 06:03:38'),
(13, '9372642011', 111, '2023-03-24 07:03:52'),
(14, '9372642011', 112, '2023-03-25 01:03:50');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` int(11) NOT NULL,
  `cust_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` bigint(13) NOT NULL,
  `message` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(25) NOT NULL DEFAULT 'member',
  `status` varchar(10) NOT NULL DEFAULT 'no',
  `provider` varchar(20) NOT NULL DEFAULT 'email'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `username`, `password`, `role`, `status`, `provider`) VALUES
(7, '1', '$2y$10$lgLUo6hz8BH2LWGeNgBjf.GvUSYpzdShXrGqbOcWPWCpPJOVVtzWS', 'admin', 'yes', 'email'),
(8, '2', '$2y$10$dBGpq0GdCbTEMsnSDKf9uOA8rv0Kzw9dTuq19ji/deBsHoBmK3BIq', 'member', 'no', 'email'),
(9, '9372642011', '$2y$10$NWurzi0zsuwdQ634ubdeUe3w/ibjIPeWugt/3BRfdY8oo8pTHqknm', 'member', 'yes', 'email'),
(10, '9167770980', '$2y$10$6MrI3TGgue8z/nw8x5Pa.O2Mj2E7IRX8ybjn..t2XfSO4SRcQijFi', 'member', 'no', 'email');

-- --------------------------------------------------------

--
-- Table structure for table `cust_info`
--

CREATE TABLE `cust_info` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `name` varchar(150) NOT NULL,
  `email` varchar(100) NOT NULL,
  `location` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cust_info`
--

INSERT INTO `cust_info` (`id`, `username`, `name`, `email`, `location`) VALUES
(6, '1', 'Vandan Savla', 'vdsavla@rediff.com', '0thane'),
(7, '2', 'siddharth', 'sidsinghcs@gmail.com', '0'),
(8, '9372642011', 'Siddharth', 'sidsingh0@gmail.com', '0'),
(9, '9167770980', 'Jainam', 'vandangay@gmail.com', '');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `path` varchar(500) NOT NULL,
  `username` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `post_id`, `path`, `username`) VALUES
(133, 111, './images/img_1.jpg', '9372642011'),
(134, 111, './images/img_2.jpg', '9372642011'),
(137, 113, './images/hero_bg_1.jpg', '9372642011'),
(141, 112, './images/img_6.jpg', '1'),
(142, 114, './images/default.jpg', '1');

-- --------------------------------------------------------

--
-- Table structure for table `offers`
--

CREATE TABLE `offers` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `offer` varchar(600) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `offers`
--

INSERT INTO `offers` (`id`, `post_id`, `offer`) VALUES
(1, 65, '10% offer when you buy from us, Registration is free for this property');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `post_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `title` varchar(250) NOT NULL,
  `description` text NOT NULL,
  `location` varchar(250) NOT NULL,
  `price` float NOT NULL,
  `date` date NOT NULL DEFAULT '2023-03-23',
  `area` varchar(50) NOT NULL,
  `bhk` varchar(10) NOT NULL,
  `floor` int(11) NOT NULL,
  `furnished` varchar(5) NOT NULL,
  `possesion` varchar(20) NOT NULL,
  `district` varchar(50) NOT NULL,
  `pincode` int(6) NOT NULL,
  `offer` varchar(600) NOT NULL,
  `featured` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`post_id`, `username`, `title`, `description`, `location`, `price`, `date`, `area`, `bhk`, `floor`, `furnished`, `possesion`, `district`, `pincode`, `offer`, `featured`) VALUES
(111, '9372642011', '2 BHK Shreeji Splendor', 'Lodha Urbania is a residential complex located in Thane, Mumbai, India, developed by Lodha Group, one of India&#039;s leading real estate developers. The complex offers a range of luxurious apartments, including 1 BHK, 2 BHK, and 3 BHK units, designed to cater to different family sizes and budgets.', 'Majiwada,Thane', 800000, '2023-03-23', '1150', '2.5', 11, 'yes', '2023-03', 'Thane', 400607, '10% offer when you buy from us, Registration free', 1),
(112, '9372642011', 'Taximens colony', 'Lodha Urbania is a residential complex located in Thane, Mumbai, India, developed by Lodha Group, one of India&#039;s leading real estate developers. The complex offers a range of luxurious apartments, including 1 BHK, 2 BHK, and 3 BHK units, designed to cater to different family sizes and budgets.', 'LBS Marg, kurla', 4213120, '2023-03-23', '1150', '2', 5, 'yes', '2023-03', 'Mumbai', 400070, '10% offer when you buy from us, Registration free', 1),
(113, '9372642011', 'Commercial Space in Patlipada', 'A house is a single-unit residential building. It may range in complexity from a rudimentary hut to a complex structure of wood, masonry, concrete or other material, outfitted with plumbing, electrical, and heating, ventilation, and air conditioning systems.', 'Majiwada,Thane', 124124000, '2023-03-23', '312', '31', 31, 'yes', '2023-03', 'Thane', 400615, '10% offer when you buy from us, Registration free', 1),
(114, '9372642011', 'Rustomjee Athena', 'Lodha Urbania is a residential complex located in Thane, Mumbai, India, developed by Lodha Group, one of India&#039;s leading real estate developers. The complex offers a range of luxurious apartments, including 1 BHK, 2 BHK, and 3 BHK units, designed to cater to different family sizes and budgets.', 'Chembur', 123123, '2023-03-23', '3000', '4', 1, 'yes', '2023-03', 'Mumbai', 400070, '10% offer when you buy from us, Registration free', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clicked`
--
ALTER TABLE `clicked`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_id` (`post_id`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `cust_info`
--
ALTER TABLE `cust_info`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_image1` (`post_id`);

--
-- Indexes for table `offers`
--
ALTER TABLE `offers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`post_id`),
  ADD UNIQUE KEY `post_id` (`post_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clicked`
--
ALTER TABLE `clicked`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `cust_info`
--
ALTER TABLE `cust_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=143;

--
-- AUTO_INCREMENT for table `offers`
--
ALTER TABLE `offers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
