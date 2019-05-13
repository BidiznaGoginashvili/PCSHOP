-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 13, 2019 at 03:01 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bidzinagoginashvili`
--

-- --------------------------------------------------------

--
-- Table structure for table `card`
--

CREATE TABLE `card` (
  `Id` int(11) NOT NULL,
  `ProductId` int(11) NOT NULL,
  `UserName` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `card`
--

INSERT INTO `card` (`Id`, `ProductId`, `UserName`) VALUES
(1, 6, ''),
(2, 6, ''),
(3, 6, ''),
(4, 6, ''),
(5, 6, ''),
(6, 6, 'bidzinagoginashvili'),
(7, 13, 'bidzinagoginashvili'),
(8, 13, 'bidzinagoginashvili'),
(9, 13, 'bidzinagoginashvili');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `Id` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`Id`, `Name`) VALUES
(1, 'Computers'),
(2, 'Laptops'),
(3, 'Monitors'),
(4, 'Tablets&Smartphones'),
(5, 'Connectivity'),
(6, 'Periphery'),
(7, 'Power Products'),
(8, 'Accessories'),
(9, 'Consumables'),
(10, 'Electronics'),
(11, 'Software');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `Id` int(11) NOT NULL,
  `Name` varchar(400) NOT NULL,
  `CategoryId` int(11) NOT NULL,
  `ImagePath` varchar(500) NOT NULL,
  `Price` decimal(10,0) NOT NULL,
  `Full Info` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`Id`, `Name`, `CategoryId`, `ImagePath`, `Price`, `Full Info`) VALUES
(6, 'One Touch', 8, 'https://images-na.ssl-images-amazon.com/images/I/41tqrbHa9ZL._AC_UX500_SY400_.jpg', '25', 'Enhanced universal Easy One Touch mounting system locks and releases the device with just a push of a finger'),
(13, 'Ryzen 7 1700 8-CORE', 1, 'https://images-na.ssl-images-amazon.com/images/I/41mQ9OxA%2BfL.jpg', '960', ' Ryzen 7 1700 8-Core 3.0 GHz (3.7 GHz Turbo) CPU Processor | 500GB SSD  Up to 30x Faster Than Traditional HDD | B450M Motherboard '),
(14, 'Intel i7 9700K', 1, 'https://images-na.ssl-images-amazon.com/images/I/51CPR%2BaBMuL._AC_SY400_.jpg', '3400', 'Intel i7 9700K 8-Core 3.6 GHz (Max Boost 4.90GHz) Processor | 500GB SSD w/ 3D NAND | Z390 Motherboard '),
(15, 'Intel i7 9700K', 1, 'https://static.techspot.com/images2/news/bigimage/2019/02/2019-02-22-image-2.jpg', '1400', 'System: Intel Core i7-9700k 8-Core Processor 3. 6 GHz (4. 9 GHz Max Turbo) | Intel Z370 Express Chipset | 16GB DDR4 2666MHz RAM | 1TB 7200Rpm HDD | 240GB SSD | Genuine Windows 10 Home 64-bit high-end '),
(16, 'Rockville HTS56 1000w 5.1', 9, 'https://images-na.ssl-images-amazon.com/images/I/61k3EzwbRQL._SL1500_.jpg', '45', ' 50mm speaker diameter, high precision 50mm magnetic neodymium driver, bring you vivid sound field, sound clarity, sound shock feeling, capable of various games.\r\nSuper soft over-ear pads, earmuffs used with skin-friendly leather material, that is more comfortable for Long time wear. '),
(17, 'Curved UHD', 3, 'https://images.samsung.com/is/image/samsung/uk-uhd-mu6500-ue65mu6500uxxu-silver-63713889?$PD_GALLERY_L_JPG$', '3400', ' Dynamic Crystal Color: Millions of shades of color reveal a vibrant, lifelike picture that HDTV can’t create\r\n4K UHD Processor: A powerful processor optimizes your TV’s performance with 4K picture quality '),
(19, 'Puppy Jenx', 10, 'https://images-na.ssl-images-amazon.com/images/I/61dWNtal-UL._SX522_.jpg', '123', 'Robot Interactive Puppy Jenx Voice Recognition Intelligent Electronic Toy Dog The Puppy is Going to be in a New World.The Puppy can Voice Recognize 15 Instructions\"Hello\", \"Follow Me\", \"Sing a Song\", \"Dancing\", \"Forward\", \"Backward\", \"Turn Left\", \"Turn Right\",\"To Turn Around\", \"Follow Me\", \"Protect Me\", \"I Love You\", \"Kiss Me\", \"You are so Beautiful\", \"Tell Jokes\",\"Go To Sleep\". '),
(20, 'The RockVille HTS56', 9, 'https://images-na.ssl-images-amazon.com/images/I/51UxmFzaAgL.01_SL500_.jpg', '12', 'The Rockville HTS56 5.1 Channel Home Theater System is the solution to your surround sound needs. The system is capable of 1000 watts peak power and 500 watts program'),
(21, ' Galaxy S8 Screen Protector', 9, 'https://images-na.ssl-images-amazon.com/images/I/61L9ILNo6OL._SL1000_.jpg', '12', 'The IQ Shield Galaxy S8 Screen Protector includes our proprietary screen protector, installation tray or spray solution, squeegee, lint-free cloth, and intuitive installation instructions');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `Id` int(11) NOT NULL,
  `FullName` varchar(100) NOT NULL,
  `Email` varchar(150) NOT NULL,
  `Password` varchar(32) NOT NULL,
  `IsAdmin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`Id`, `FullName`, `Email`, `Password`, `IsAdmin`) VALUES
(1, 'bidzinagoginashvili', 'bidzinabuka@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 1),
(2, 'BD', 'BD@GMAIL.COM', '202cb962ac59075b964b07152d234b70', 0),
(3, 'irakli', 'nozadze@gmail.com', '202cb962ac59075b964b07152d234b70', 1),
(5, 'asd', 'asd@gmail.com', '202cb962ac59075b964b07152d234b70', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `card`
--
ALTER TABLE `card`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `card`
--
ALTER TABLE `card`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
