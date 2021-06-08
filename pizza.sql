-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 04, 2020 at 05:04 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pizza`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` int(11) NOT NULL,
  `Customer Name` varchar(10) NOT NULL,
  `Phone No` varchar(10) NOT NULL,
  `NIC` varchar(20) NOT NULL,
  `Delivery Date` varchar(20) NOT NULL,
  `Pizza Type` varchar(20) NOT NULL,
  `Pizza Size` varchar(20) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `status` enum('New Order','Delivered') NOT NULL DEFAULT 'New Order',
  `Bill` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `Customer Name`, `Phone No`, `NIC`, `Delivery Date`, `Pizza Type`, `Pizza Size`, `Quantity`, `status`, `Bill`) VALUES
(2, 'Saki', '0128939313', '9444444442V', '2020-01-01', 'non-veg', 'medium', 6, 'New Order', 12000),
(3, 'Ami', '3879890889', '8879779792V', '2020-02-02', 'non-veg', 'large', 6, 'New Order', 15000),
(4, 'egefe', '7990343434', '97823732V', '2020-02-12', 'non-veg', 'small', 2, 'New Order', 3000),
(5, 'Ami', '0979696931', '97823732V', '2020-02-12', 'non-veg', 'medium', 4, 'New Order', 8000),
(6, 'Saki', '7990343434', '787868879V', '2020-01-02', 'non-veg', 'medium', 6, 'New Order', 12000),
(7, 'xyz', '899901120', '9383567812V', '2020-02-12', 'non-veg', 'medium', 6, 'New Order', 12000),
(8, 'Ami', '0128939313', '9012288390V', '2020-12-03', 'non-veg', 'medium', 6, 'New Order', 12000),
(11, 'john', '9889968546', '89146634251V', '2020-01-01', 'non-veg', 'large', 6, 'New Order', 15000),
(12, 'Jue', '897969213', '999654654V', '2020-12-03', 'veg', 'small', 8, 'New Order', 8000),
(13, 'ss', '889115567', '99467676879V', '2020-01-01', 'non-veg', 'medium', 4, 'New Order', 8000);

-- --------------------------------------------------------

--
-- Table structure for table `memfordeliver`
--

CREATE TABLE `memfordeliver` (
  `id` int(11) NOT NULL,
  `Customer Name` varchar(10) NOT NULL,
  `Phone No` varchar(10) NOT NULL,
  `NIC` varchar(20) NOT NULL,
  `Delivery Date` varchar(20) NOT NULL,
  `Pizza Type` varchar(20) NOT NULL,
  `Pizza Size` varchar(20) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `status` enum('New Order','Delivered') NOT NULL DEFAULT 'New Order',
  `Bill` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `memfordeliver`
--

INSERT INTO `memfordeliver` (`id`, `Customer Name`, `Phone No`, `NIC`, `Delivery Date`, `Pizza Type`, `Pizza Size`, `Quantity`, `status`, `Bill`) VALUES
(2, 'Saki', '0128939313', '9444444442V', '2020-01-01', 'non-veg', 'medium', 6, 'New Order', 12000),
(3, 'Ami', '3879890889', '8879779792V', '2020-02-02', 'non-veg', 'large', 6, 'New Order', 15000),
(4, 'egefe', '7990343434', '97823732V', '2020-02-12', 'non-veg', 'small', 2, 'New Order', 3000),
(5, 'Ami', '0979696931', '97823732V', '2020-02-12', 'non-veg', 'medium', 4, 'New Order', 8000),
(6, 'Saki', '7990343434', '787868879V', '2020-01-02', 'non-veg', 'medium', 6, 'New Order', 12000),
(7, 'xyz', '899901120', '9383567812V', '2020-02-12', 'non-veg', 'medium', 6, 'New Order', 12000),
(8, 'Ami', '0128939313', '9012288390V', '2020-12-03', 'non-veg', 'medium', 6, 'New Order', 12000),
(9, 'hjug', '231', '885677668V', '2020-12-03', 'non-veg', 'medium', 7, 'New Order', 14000),
(11, 'john', '9889968546', '89146634251V', '2020-01-01', 'non-veg', 'large', 6, 'New Order', 15000),
(12, 'Jue', '897969213', '999654654V', '2020-12-03', 'veg', 'small', 8, 'New Order', 8000),
(13, 'ss', '889115567', '99467676879V', '2020-01-01', 'non-veg', 'medium', 4, 'New Order', 8000);

-- --------------------------------------------------------

--
-- Table structure for table `price`
--

CREATE TABLE `price` (
  `pizzatype` varchar(20) NOT NULL,
  `pizzasize` varchar(20) NOT NULL,
  `price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `price`
--

INSERT INTO `price` (`pizzatype`, `pizzasize`, `price`) VALUES
('veg', 'small', 1000),
('veg', 'medium', 1500),
('veg', 'large', 2000),
('non-veg', 'small', 1500),
('non-veg', 'medium', 2000),
('non-veg', 'large', 2500);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `memfordeliver`
--
ALTER TABLE `memfordeliver`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `memfordeliver`
--
ALTER TABLE `memfordeliver`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
