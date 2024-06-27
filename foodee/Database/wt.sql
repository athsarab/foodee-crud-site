-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 17, 2024 at 09:45 PM
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
-- Database: `wt`
--

-- --------------------------------------------------------

--
-- Table structure for table `authortable`
--

CREATE TABLE `authortable` (
  `authorid` int(11) NOT NULL,
  `authorname` varchar(100) NOT NULL,
  `authoremail` varchar(100) NOT NULL,
  `authoraddress` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `authortable`
--

INSERT INTO `authortable` (`authorid`, `authorname`, `authoremail`, `authoraddress`) VALUES
(5, 'Mohamed', 'mobamba@gmail.com', 'Susan Lawrence Hou'),
(6, 'Mona', 'mona@gmail.com', 'bahamas');

-- --------------------------------------------------------

--
-- Table structure for table `categorytable`
--

CREATE TABLE `categorytable` (
  `categoryid` int(15) NOT NULL,
  `categoryname` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categorytable`
--

INSERT INTO `categorytable` (`categoryid`, `categoryname`) VALUES
(6, 'Breakfast'),
(7, 'tea');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `recipe_id` int(11) NOT NULL,
  `recipe_rating` int(11) NOT NULL,
  `chef_rating` int(11) NOT NULL,
  `website_rating` int(11) NOT NULL,
  `comments` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `recipetable`
--

CREATE TABLE `recipetable` (
  `recipeid` int(20) NOT NULL,
  `recipename` varchar(50) NOT NULL,
  `categoryname` varchar(50) NOT NULL,
  `author` varchar(50) NOT NULL,
  `ingredients` varchar(100) NOT NULL,
  `prepmethod` varchar(100) NOT NULL,
  `preptime` varchar(20) NOT NULL,
  `cookingtime` varchar(50) NOT NULL,
  `servings` varchar(100) NOT NULL,
  `imagename` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `recipetable`
--

INSERT INTO `recipetable` (`recipeid`, `recipename`, `categoryname`, `author`, `ingredients`, `prepmethod`, `preptime`, `cookingtime`, `servings`, `imagename`) VALUES
(11, 'Canjeero', 'Breakfast', '𝐉𝐨𝐡𝐧', '1 cup white corn flour,½ cup sorghum flour,1 Tbsp Instant dry yeast,4 cups self-raising flour,¼ cup ', 'Mix All Ingredients , Then heat up a pan , drizzle the pan with oil and cook on each side for 3 minu', '10 minutes', '6 minutes', '4', 'canjeero.jpg'),
(12, 'Chocolate bar', 'Dessert', 'Faisel', 'Chocolate , Cocoa', 'Mix Ingredients and bake for 30 mins', '10 minutes', '20 minutes', '5', 'choco.webp');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` int(44) NOT NULL,
  `country` varchar(123) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `mobile`, `country`) VALUES
(20, 'kamal', '202cb962ac59075b964b07152d234b70', 'kamal@gmail.com', 776655432, 'Sri Lanka');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `authortable`
--
ALTER TABLE `authortable`
  ADD PRIMARY KEY (`authorid`);

--
-- Indexes for table `categorytable`
--
ALTER TABLE `categorytable`
  ADD PRIMARY KEY (`categoryid`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recipetable`
--
ALTER TABLE `recipetable`
  ADD PRIMARY KEY (`recipeid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `authortable`
--
ALTER TABLE `authortable`
  MODIFY `authorid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `categorytable`
--
ALTER TABLE `categorytable`
  MODIFY `categoryid` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `recipetable`
--
ALTER TABLE `recipetable`
  MODIFY `recipeid` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
