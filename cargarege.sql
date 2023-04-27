-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 25, 2023 at 02:38 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cargarege`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `isactive` tinyint(1) DEFAULT 0,
  `address` varchar(255) NOT NULL,
  `Branch` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `isactive`, `address`, `Branch`) VALUES
(1, 'Admin', '21232f297a57a5a743894a0e4a801fc3', 1, '25,Woody\'s Automotive,California,USA', 'California'),
(3, 'Admin1', 'e00cf25ad42683b3df678c61f42c6bda', 1, '125,Woody\'s Automotive,Florence,USA', 'Florence'),
(4, 'Amdin2', 'c84258e9c39059a89ab77d846ddab909', 1, '170,Woody\'s Automotive,Hawaii,USA', 'Hawaii'),
(5, 'Admin3', '84ff2c4b8b18c28f042557c0637c8528', 1, '225,Woody\'s Automotive,Kansas,USA', 'Kansas'),
(6, 'Admin4', 'fc1ebc848e31e0a68e868432225e3c82', 1, '55,Woody\'s Automotive,Washington,DC,USA', 'Washington');

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `userid` int(11) NOT NULL,
  `time` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT '0',
  `servicesid` int(11) NOT NULL,
  `appointmentid` int(6) NOT NULL,
  `location` varchar(255) NOT NULL,
  `paymentstatus` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `carbulid`
--

CREATE TABLE `carbulid` (
  `id` int(11) NOT NULL,
  `empid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `sparepartsquantity` int(10) NOT NULL,
  `sparepartsid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `carservices`
--

CREATE TABLE `carservices` (
  `id` int(11) NOT NULL,
  `servicesname` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `serviceprice` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `emp`
--

CREATE TABLE `emp` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `empid` int(4) NOT NULL,
  `statue` tinyint(4) NOT NULL DEFAULT 0,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `paymentdetails`
--

CREATE TABLE `paymentdetails` (
  `id` int(11) NOT NULL,
  `paymetid` bigint(12) NOT NULL,
  `cardnumber` bigint(12) NOT NULL,
  `userid` int(11) NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sparepartsdetails`
--

CREATE TABLE `sparepartsdetails` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `carno` varchar(10) NOT NULL,
  `email` varchar(255) NOT NULL,
  `upassword` varchar(255) NOT NULL,
  `isactive` tinyint(4) DEFAULT 0,
  `username` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `cardnumber` bigint(12) NOT NULL DEFAULT 0,
  `carmodel` varchar(255) NOT NULL,
  `cartype` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `phone`, `carno`, `email`, `upassword`, `isactive`, `username`, `address`, `cardnumber`, `carmodel`, `cartype`) VALUES
(1, '7854785478', 'GJ05AA1212', 'kishansavaliya9083@gmail.com', 'e60e81c4cbe5171cd654662d9887aec2', 1, 'kano', '155 muna,Franch,USA', 541254125412, 'kl2', 'COUPE');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `appointmentid` (`appointmentid`),
  ADD KEY `userid` (`userid`),
  ADD KEY `servicesid` (`servicesid`);

--
-- Indexes for table `carbulid`
--
ALTER TABLE `carbulid`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sparepartsid` (`sparepartsid`),
  ADD KEY `employeeid` (`empid`);

--
-- Indexes for table `carservices`
--
ALTER TABLE `carservices`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `servicesname` (`servicesname`);

--
-- Indexes for table `emp`
--
ALTER TABLE `emp`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `empid` (`empid`);

--
-- Indexes for table `paymentdetails`
--
ALTER TABLE `paymentdetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sparepartsdetails`
--
ALTER TABLE `sparepartsdetails`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `phone` (`phone`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `carno` (`carno`,`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `carbulid`
--
ALTER TABLE `carbulid`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `carservices`
--
ALTER TABLE `carservices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `emp`
--
ALTER TABLE `emp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `paymentdetails`
--
ALTER TABLE `paymentdetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sparepartsdetails`
--
ALTER TABLE `sparepartsdetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointment`
--
ALTER TABLE `appointment`
  ADD CONSTRAINT `servicesid` FOREIGN KEY (`servicesid`) REFERENCES `carservices` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `userid` FOREIGN KEY (`userid`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `carbulid`
--
ALTER TABLE `carbulid`
  ADD CONSTRAINT `employeeid` FOREIGN KEY (`empid`) REFERENCES `emp` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sparepartsid` FOREIGN KEY (`sparepartsid`) REFERENCES `sparepartsdetails` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
