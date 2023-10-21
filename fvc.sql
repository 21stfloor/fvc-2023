-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 21, 2023 at 07:42 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fvc`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `aemail` varchar(255) NOT NULL,
  `apassword` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`aemail`, `apassword`) VALUES
('admin@fvc.com', '123');

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `appoid` int(11) NOT NULL,
  `pid` int(10) DEFAULT NULL,
  `apponum` int(3) DEFAULT NULL,
  `scheduleid` int(10) DEFAULT NULL,
  `appodate` date DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`appoid`, `pid`, `apponum`, `scheduleid`, `appodate`, `status`) VALUES
(13, 4, 1, 13, '2023-10-19', 3),
(10, 3, 1, 12, '2023-04-15', 2);

-- --------------------------------------------------------

--
-- Table structure for table `breed`
--

CREATE TABLE `breed` (
  `breedId` int(11) NOT NULL,
  `speId` int(11) NOT NULL,
  `name` varchar(64) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `breed`
--

INSERT INTO `breed` (`breedId`, `speId`, `name`) VALUES
(1, 1, 'husky'),
(2, 1, 'jack russel terrier'),
(3, 2, 'ginger'),
(6, 1, 'shih tzu'),
(9, 1, 'aspin'),
(10, 2, 'orenj'),
(11, 4, 'rhode island red'),
(12, 4, 'jersey giant'),
(13, 3, 'embden goose'),
(14, 3, 'greylag goose'),
(15, 2, 'puspin'),
(16, 2, 'black');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` int(11) NOT NULL,
  `customer` int(11) NOT NULL,
  `product` float NOT NULL,
  `quantity` float NOT NULL,
  `price` float NOT NULL,
  `discount` float NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `payment_method` varchar(24) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `sname` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `sname`) VALUES
(1, 'Medicine');

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `docid` int(11) NOT NULL,
  `docemail` varchar(255) DEFAULT NULL,
  `docname` varchar(255) DEFAULT NULL,
  `docpassword` varchar(255) DEFAULT NULL,
  `doctel` varchar(15) DEFAULT NULL,
  `specialties` int(2) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`docid`, `docemail`, `docname`, `docpassword`, `doctel`, `specialties`) VALUES
(2, 'monicageller@fvc.com', 'Dra. Monica Geller', '123', '123', 1),
(3, 'rossgeller@fvc.com', 'Dr. Ross Geller', '123', '123', 5),
(4, 'rachellegreen@fvc.com', 'Dra. Rachelle Green', '123', '123', 4),
(6, 'phoebe@fvc.com', 'Phoebe Buffet', '123', '1234', 1);

-- --------------------------------------------------------

--
-- Table structure for table `gappointment`
--

CREATE TABLE `gappointment` (
  `gappoid` int(11) NOT NULL,
  `pid` int(10) DEFAULT NULL,
  `gapponum` int(3) DEFAULT NULL,
  `gscheduleid` int(10) DEFAULT NULL,
  `gappodate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gappointment`
--

INSERT INTO `gappointment` (`gappoid`, `pid`, `gapponum`, `gscheduleid`, `gappodate`) VALUES
(1, 4, 1, 1, '2023-04-15');

-- --------------------------------------------------------

--
-- Table structure for table `groomer`
--

CREATE TABLE `groomer` (
  `groomid` int(11) NOT NULL,
  `groomemail` varchar(255) DEFAULT NULL,
  `groomname` varchar(255) DEFAULT NULL,
  `groompassword` varchar(255) DEFAULT NULL,
  `groomtel` varchar(255) DEFAULT NULL,
  `specialties` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `groomer`
--

INSERT INTO `groomer` (`groomid`, `groomemail`, `groomname`, `groompassword`, `groomtel`, `specialties`) VALUES
(2, 'troy@fvc.com', 'Troy', '123', '1234', '7'),
(3, 'irene@fvc.com', 'Irene', '123', '123', '7'),
(4, 'cey@fvc.com', 'Cey ', '123', '1234', '7'),
(5, 'oca@fvc.com', 'Oca', '123', '1234', '7');

-- --------------------------------------------------------

--
-- Table structure for table `gschedule`
--

CREATE TABLE `gschedule` (
  `gscheduleid` int(11) NOT NULL,
  `groomid` int(100) DEFAULT NULL,
  `gtitle` varchar(255) DEFAULT NULL,
  `gscheduledate` date DEFAULT NULL,
  `gscheduletime` time DEFAULT NULL,
  `gnop` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gschedule`
--

INSERT INTO `gschedule` (`gscheduleid`, `groomid`, `gtitle`, `gscheduledate`, `gscheduletime`, `gnop`) VALUES
(1, 2, 'GROOM 9:00 AM', '2023-04-16', '09:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `invid` int(11) NOT NULL,
  `invcode` varchar(255) DEFAULT NULL,
  `invname` varchar(255) DEFAULT NULL,
  `invpassword` varchar(255) DEFAULT NULL,
  `invquantity` varchar(255) DEFAULT NULL,
  `invcategory` varchar(255) DEFAULT NULL,
  `invdescription` varchar(255) DEFAULT NULL,
  `invprice` varchar(255) DEFAULT NULL,
  `image` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`invid`, `invcode`, `invname`, `invpassword`, `invquantity`, `invcategory`, `invdescription`, `invprice`, `image`) VALUES
(2, 'FVC0002', 'Immune Booster 10ML', '123', '85', '1', 'This is for Dogs.', NULL, ''),
(3, 'FVC0003', 'Immune Booster 20ML', '123', '122', '1', '', '500', ''),
(4, 'FVC0004', 'Immune Booster 50ML', '123', '100', '1', 'This is for Dogs.', '500', ''),
(6, 'FVC0001', 'Immune Booster 5ML', '123', '97', '1', 'This is for Dogs.', '123', ''),
(7, 'FVC0005', 'Immune Booster 100ML', 'admin', '100', '1', 'This is for cats and dogs.', '1000', '../uploads/products/7/379559966_152352734599750_4754679250034332635_n.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `customer` int(11) NOT NULL,
  `product` float NOT NULL,
  `quantity` float NOT NULL,
  `price` float NOT NULL,
  `discount` float NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `status` varchar(24) NOT NULL,
  `payment_method` varchar(24) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer`, `product`, `quantity`, `price`, `discount`, `date`, `status`, `payment_method`) VALUES
(1, 4, 4, 6, 3000, 0, '2023-10-21', 'Pending', ''),
(2, 4, 7, 1, 1000, 0, '2023-10-21', 'Pending', 'Gcash');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `pid` int(11) NOT NULL,
  `pemail` varchar(255) DEFAULT NULL,
  `pname` varchar(255) DEFAULT NULL,
  `ppassword` varchar(255) DEFAULT NULL,
  `paddress` varchar(255) DEFAULT NULL,
  `pdob` date DEFAULT NULL,
  `ptel` varchar(15) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`pid`, `pemail`, `pname`, `ppassword`, `paddress`, `pdob`, `ptel`) VALUES
(3, 'mojicalord111@gmail.com', 'Lord Roland', '123', 'Paranaque', '1999-07-10', '09567256130'),
(4, 'charlottediane11@gmail.com', 'Charlotte Diane', '123', 'Paranaque', '2000-04-20', '09954261220');

-- --------------------------------------------------------

--
-- Table structure for table `pet`
--

CREATE TABLE `pet` (
  `petId` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `name` varchar(32) NOT NULL,
  `birthday` date NOT NULL,
  `speId` int(11) NOT NULL,
  `breedId` int(11) NOT NULL,
  `picturedir` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pet`
--

INSERT INTO `pet` (`petId`, `pid`, `name`, `birthday`, `speId`, `breedId`, `picturedir`) VALUES
(3, 4, 'Doggo', '2023-10-11', 1, 1, '../uploads/owners/4/3/379559966_152352734599750_4754679250034332635_n.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `invid` int(11) NOT NULL,
  `invcode` varchar(255) DEFAULT NULL,
  `invname` varchar(255) DEFAULT NULL,
  `invpassword` varchar(255) DEFAULT NULL,
  `invquantity` varchar(255) DEFAULT NULL,
  `invcategory` varchar(255) DEFAULT NULL,
  `invdescription` varchar(255) DEFAULT NULL,
  `invprice` varchar(255) DEFAULT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `scheduleid` int(11) NOT NULL,
  `docid` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `scheduledate` date DEFAULT NULL,
  `scheduletime` time DEFAULT NULL,
  `nop` int(4) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`scheduleid`, `docid`, `title`, `scheduledate`, `scheduletime`, `nop`) VALUES
(12, '6', '9:00 AM', '2023-04-16', '09:00:00', 1),
(13, '6', '2', '2023-10-31', '20:49:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `specialties`
--

CREATE TABLE `specialties` (
  `id` int(2) NOT NULL,
  `sname` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `specialties`
--

INSERT INTO `specialties` (`id`, `sname`) VALUES
(1, 'Dogs'),
(2, 'Cats'),
(3, 'Birds'),
(4, 'Rabbits'),
(5, 'Hamsters'),
(7, 'Grooming'),
(6, 'Front Desk');

-- --------------------------------------------------------

--
-- Table structure for table `species`
--

CREATE TABLE `species` (
  `speId` int(11) NOT NULL,
  `name` varchar(64) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `species`
--

INSERT INTO `species` (`speId`, `name`) VALUES
(1, 'dog'),
(2, 'cat'),
(3, 'goose'),
(4, 'chicken');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staffid` int(11) NOT NULL,
  `staffemail` varchar(255) DEFAULT NULL,
  `staffname` varchar(255) DEFAULT NULL,
  `staffpassword` varchar(255) DEFAULT NULL,
  `stafftel` varchar(255) DEFAULT NULL,
  `specialties` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staffid`, `staffemail`, `staffname`, `staffpassword`, `stafftel`, `specialties`) VALUES
(2, 'clarisse@fvc.com', 'Clarisse', '123', '1234', '6'),
(3, 'kurt@fvc.com', 'Kurt', '123', '1234', '6');

-- --------------------------------------------------------

--
-- Table structure for table `webuser`
--

CREATE TABLE `webuser` (
  `email` varchar(255) NOT NULL,
  `usertype` char(1) DEFAULT NULL,
  `code` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `webuser`
--

INSERT INTO `webuser` (`email`, `usertype`, `code`) VALUES
('admin@fvc.com', 'a', ''),
('monicageller@fvc.com', 'd', ''),
('oca@fvc.com', 'g', ''),
('phoebe@fvc.com', 'd', ''),
('mojicalord111@gmail.com', 'p', ''),
('rossgeller@fvc.com', 'd', ''),
('rachellegreen@fvc.com', 'd', ''),
('charlottediane11@gmail.com', 'p', ''),
('clarisse@fvc.com', 's', ''),
('troy@fvc.com', 'g', ''),
('cey@fvc.com', 'g', ''),
('kurt@fvc.com', 's', ''),
('irene@fvc.com', 'g', ''),
('123', 'i', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`aemail`);

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`appoid`),
  ADD KEY `pid` (`pid`),
  ADD KEY `scheduleid` (`scheduleid`);

--
-- Indexes for table `breed`
--
ALTER TABLE `breed`
  ADD PRIMARY KEY (`breedId`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`docid`),
  ADD KEY `specialties` (`specialties`);

--
-- Indexes for table `gappointment`
--
ALTER TABLE `gappointment`
  ADD PRIMARY KEY (`gappoid`),
  ADD KEY `pid` (`pid`),
  ADD KEY `gscheduleid` (`gscheduleid`);

--
-- Indexes for table `groomer`
--
ALTER TABLE `groomer`
  ADD PRIMARY KEY (`groomid`);

--
-- Indexes for table `gschedule`
--
ALTER TABLE `gschedule`
  ADD PRIMARY KEY (`gscheduleid`),
  ADD KEY `groomid` (`groomid`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`invid`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `pet`
--
ALTER TABLE `pet`
  ADD PRIMARY KEY (`petId`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`invid`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`scheduleid`),
  ADD KEY `docid` (`docid`);

--
-- Indexes for table `specialties`
--
ALTER TABLE `specialties`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `species`
--
ALTER TABLE `species`
  ADD PRIMARY KEY (`speId`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staffid`);

--
-- Indexes for table `webuser`
--
ALTER TABLE `webuser`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `appoid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `breed`
--
ALTER TABLE `breed`
  MODIFY `breedId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `docid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `gappointment`
--
ALTER TABLE `gappointment`
  MODIFY `gappoid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `groomer`
--
ALTER TABLE `groomer`
  MODIFY `groomid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `gschedule`
--
ALTER TABLE `gschedule`
  MODIFY `gscheduleid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `invid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pet`
--
ALTER TABLE `pet`
  MODIFY `petId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `invid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `scheduleid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `species`
--
ALTER TABLE `species`
  MODIFY `speId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `staffid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `gappointment`
--
ALTER TABLE `gappointment`
  ADD CONSTRAINT `gappointment_ibfk_1` FOREIGN KEY (`gscheduleid`) REFERENCES `gschedule` (`gscheduleid`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `gschedule`
--
ALTER TABLE `gschedule`
  ADD CONSTRAINT `gschedule_ibfk_1` FOREIGN KEY (`groomid`) REFERENCES `groomer` (`groomid`) ON DELETE SET NULL ON UPDATE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
