-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 18, 2021 at 04:21 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bookstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `BID` int(11) NOT NULL,
  `b_title` varchar(225) NOT NULL,
  `b_price` double NOT NULL,
  `b_quantity` int(11) NOT NULL,
  `author` varchar(100) NOT NULL,
  `version` varchar(50) NOT NULL,
  `b_img` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL,
  `b_sprice` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`BID`, `b_title`, `b_price`, `b_quantity`, `author`, `version`, `b_img`, `category`, `b_sprice`) VALUES
(1, 'These Hollow Vows', 2335, 50, 'Lesi Ryan', 'version1', 'img/books/img1.jpg', 'Children', 2700),
(2, 'The Hassel Wood', 1795, 20, 'Meliss Albert', 'version1', 'img/books/img2.jpg\r\n', 'Children', 1950),
(3, 'Dark And Hollow Star', 1795, 30, 'Shuttleworth Ashley', 'N/A', 'img/books/img3.jpg', 'Children', 1900),
(4, 'Girls of storm and shadow', 1750, 30, 'Ngan Natasha', 'N/A', 'img/books/img4.jpg', 'Children', 1800),
(5, 'Illusionary', 2495, 30, 'Cordova Zoraida', 'N/A', 'img/books/img7.jpg', 'Children', 2500);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `BID` int(11) DEFAULT NULL,
  `SID` int(11) DEFAULT NULL,
  `CID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_name`) VALUES
('Children'),
('Coffee_Table'),
('Cookery'),
('Education'),
('Novel');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `FID` int(11) NOT NULL,
  `F_name` varchar(100) NOT NULL,
  `F_email` varchar(200) NOT NULL,
  `F_feedback` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`FID`, `F_name`, `F_email`, `F_feedback`) VALUES
(11, 'Pasan', 'hfg@gahdvcjh', 'jgckjc');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `namecard` varchar(50) NOT NULL,
  `PID` int(11) NOT NULL,
  `P_amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`fname`, `lname`, `email`, `address`, `city`, `state`, `namecard`, `PID`, `P_amount`) VALUES
('rajith', 'kula', 'r@gmail.com', '456', 'matale', 'central', 'k.rajith', 1, 2500),
('rajith', 'sdsddsd', 'dsdsd', 'sdsd', 'dssd', 'sdd', 'sd', 4, 7800),
('', '', '', '', '', '', '', 11, 0),
('', '', '', '', '', '', '', 12, 0),
('', '', '', '', '', '', '', 14, 0),
('jlkvblk', 'yhvfciyfvk', 'j@c.com', 'fgjka', 'ihik;h', '', 'sfsfsd', 15, 0);

-- --------------------------------------------------------

--
-- Table structure for table `stationary`
--

CREATE TABLE `stationary` (
  `SID` int(11) NOT NULL,
  `s_name` varchar(100) NOT NULL,
  `s_price` double NOT NULL,
  `s_quantity` int(11) NOT NULL,
  `s_image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stationary`
--

INSERT INTO `stationary` (`SID`, `s_name`, `s_price`, `s_quantity`, `s_image`) VALUES
(1, 'Stick Glue', 30, 10, 'img/sta/img1.jpg'),
(2, 'Color Pens', 130, 20, 'img/sta/img2.jpg'),
(3, 'Kiddy Clay', 135, 50, 'img/sta/img3.jpg'),
(4, 'Pen', 15, 50, 'img/sta/img4.jpg'),
(5, 'Pencil', 35, 60, 'img/sta/img5.jpg'),
(6, 'Pens(Gel)', 112, 15, 'img/sta/img6.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `CID` int(11) NOT NULL,
  `Firstname` varchar(20) NOT NULL,
  `Lastname` varchar(20) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Address` varchar(200) NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `UserType` varchar(50) NOT NULL DEFAULT 'user',
  `Password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`CID`, `Firstname`, `Lastname`, `Email`, `Address`, `Gender`, `UserType`, `Password`) VALUES
(10, 'Pasan', 'Mahendra', 'hfg@gahd', 'arafa', 'Male', 'admin', '123'),
(11, 'John', 'TT', 'haghg@bhakbf', 'florida', 'Male', 'user', '789');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`BID`),
  ADD KEY `book_ibfk_2` (`category`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD KEY `cart_ibfk_1` (`BID`),
  ADD KEY `cart_ibfk_2` (`SID`),
  ADD KEY `cart_ibfk_3` (`CID`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_name`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`FID`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`PID`);

--
-- Indexes for table `stationary`
--
ALTER TABLE `stationary`
  ADD PRIMARY KEY (`SID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`CID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `BID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `FID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `PID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `stationary`
--
ALTER TABLE `stationary`
  MODIFY `SID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `CID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `book`
--
ALTER TABLE `book`
  ADD CONSTRAINT `book_ibfk_2` FOREIGN KEY (`category`) REFERENCES `category` (`cat_name`);

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`BID`) REFERENCES `book` (`BID`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`SID`) REFERENCES `stationary` (`SID`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `cart_ibfk_3` FOREIGN KEY (`CID`) REFERENCES `user` (`CID`) ON DELETE SET NULL ON UPDATE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
