-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 16, 2022 at 01:56 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(15) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `birthDate` date NOT NULL,
  `nid` varchar(255) NOT NULL,
  `religion` varchar(255) NOT NULL,
  `registrationDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `firstName`, `lastName`, `gender`, `contact`, `email`, `password`, `address`, `birthDate`, `nid`, `religion`, `registrationDate`) VALUES
(1, 'main', 'admin', 'Male', '01852088728', 'admin@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'CTG', '2022-09-01', '1587946646464', 'Hindu', '2022-09-30');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(15) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `registrationDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `firstName`, `lastName`, `gender`, `contact`, `email`, `password`, `address`, `registrationDate`) VALUES
(1, 'Pratik', 'Dav', 'Male', '018525088728', 'azizur@gmail.com', '25f9e794323b453885f5181f1b624d0b', 'Munsef Bazar, Patiya', '2022-09-08'),
(2, 'Arjun', 'Dav', 'Male', '021411414', 'royonup@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Munsef Bazar, Patiya', '2022-09-09'),
(3, 'sima', 'dey', 'Male', '214354135415', 'sima@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'sfsdsdsdfg', '2022-09-10'),
(4, 'arnob', 'dey', 'Male', '3464464', 'min@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'dsdadasfdf', '2022-09-12');

-- --------------------------------------------------------

--
-- Table structure for table `customercart`
--

CREATE TABLE `customercart` (
  `cartId` int(11) NOT NULL,
  `customerId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customercart`
--

INSERT INTO `customercart` (`cartId`, `customerId`, `productId`, `productName`, `price`, `quantity`, `image`) VALUES
(1, 1, 2, 'TV-4k Android- 90 inch', '90000', '2', 'productImage/.28bd9f4367.png'),
(19, 1, 5, 'Soyabean Oil - (5-liter)', '2750', '2', 'productImage/.1be9f1e710.png'),
(22, 1, 2, 'TV-4k Android- 90 inch', '90000', '2', 'productImage/.28bd9f4367.png'),
(36, 1, 9, 'Gaming Earphone', '600', '2', 'productImage/.13d19b6301.jpg'),
(37, 1, 7, 'Headphone', '600', '1', 'productImage/.ac15d7693c.png'),
(38, 1, 7, 'Headphone', '600', '1', 'productImage/.ac15d7693c.png'),
(41, 3, 5, 'Soyabean Oil - (5-liter)', '1375', '1', 'productImage/.1be9f1e710.png'),
(42, 3, 2, 'TV-4k Android- 90 inch', '45000', '1', 'productImage/.28bd9f4367.png');

-- --------------------------------------------------------

--
-- Table structure for table `payment_details`
--

CREATE TABLE `payment_details` (
  `paymentId` int(11) NOT NULL,
  `customerId` int(11) NOT NULL,
  `customerName` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `cartId` int(11) NOT NULL,
  `productName` text NOT NULL,
  `quantity` text NOT NULL,
  `price` text NOT NULL,
  `cardNumber` int(11) NOT NULL,
  `cardCVC` int(11) NOT NULL,
  `expiryDate` date NOT NULL,
  `paymentDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment_details`
--

INSERT INTO `payment_details` (`paymentId`, `customerId`, `customerName`, `email`, `contact`, `address`, `city`, `cartId`, `productName`, `quantity`, `price`, `cardNumber`, `cardCVC`, `expiryDate`, `paymentDate`) VALUES
(1, 3, 'sima', 'sima@gmail.com', '214354135415', 'sfsdsdsdfg', 'fddfdfd', 40, 'TV-4k Android- 90 inch', '1', '45000', 123234, 1234, '2022-11-16', '2022-11-16');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(15) NOT NULL,
  `productCategory` varchar(250) NOT NULL,
  `productName` varchar(250) NOT NULL,
  `image` varchar(250) NOT NULL,
  `quantity` varchar(250) NOT NULL,
  `totalBuyPrice` varchar(250) NOT NULL,
  `totalSellPrice` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `productCategory`, `productName`, `image`, `quantity`, `totalBuyPrice`, `totalSellPrice`) VALUES
(2, 'Electronics', 'TV-4k Android- 90 inch', 'productImage/.28bd9f4367.png', '11', '462000', '495000'),
(4, 'Grocery', 'Oats-(kg)', 'productImage/.23b8a10306.jpg', '2', '400', '440'),
(5, 'Grocery', 'Soyabean Oil - (5-liter)', 'productImage/.1be9f1e710.png', '1', '1350', '1375'),
(7, 'Accessory', 'Headphone', 'productImage/.ac15d7693c.png', '0', '0', '0'),
(9, 'Accessory', 'Gaming Earphone', 'productImage/.7e6b35f5a0.jpg', '0', '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `stuff`
--

CREATE TABLE `stuff` (
  `id` int(15) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `birthDate` date NOT NULL,
  `nid` varchar(255) NOT NULL,
  `religion` varchar(255) NOT NULL,
  `registrationDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stuff`
--

INSERT INTO `stuff` (`id`, `firstName`, `lastName`, `gender`, `contact`, `email`, `password`, `address`, `birthDate`, `nid`, `religion`, `registrationDate`) VALUES
(3, 'Pronoy', 'Dav', 'Male', '4445444', 'test@demo.com', 'e10adc3949ba59abbe56e057f20f883e', 'Munsef Bazar, Patiya', '2022-09-09', '6546454654', 'Hindu', '2022-09-09'),
(4, 'munni', 'das', 'Female', '05234654564', 'onuradha@gmail.com', '25f9e794323b453885f5181f1b624d0b', 'jkgikgkugkg', '2022-09-10', 'hgdhgdhgffhg', 'Hindu', '2022-09-10'),
(5, 'mona', 'ray', 'Male', '05456654', 'me@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'hjfgshdhg', '2022-09-10', '354654654', 'Hindu', '2022-09-10'),
(6, 'joni joni', 'yes papa', 'Male', '231511115', 'joni@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'eating sugar no papa', '2022-09-10', '65465465454', 'Hindu', '2022-09-10'),
(7, 'rofik', 'khan', 'Male', '657774', 'ro@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'hfghgfsdhgsh', '2022-09-10', 'sdhgdshfsdhgfds', '1', '2022-09-10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customercart`
--
ALTER TABLE `customercart`
  ADD PRIMARY KEY (`cartId`);

--
-- Indexes for table `payment_details`
--
ALTER TABLE `payment_details`
  ADD PRIMARY KEY (`paymentId`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stuff`
--
ALTER TABLE `stuff`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `customercart`
--
ALTER TABLE `customercart`
  MODIFY `cartId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `payment_details`
--
ALTER TABLE `payment_details`
  MODIFY `paymentId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `stuff`
--
ALTER TABLE `stuff`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
