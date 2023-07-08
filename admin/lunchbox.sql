-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 08, 2023 at 09:21 AM
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
-- Database: `lunchbox`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `pid` varchar(15) NOT NULL,
  `area` varchar(30) NOT NULL,
  `appartment` varchar(25) NOT NULL,
  `doorno` varchar(30) NOT NULL,
  `pincode` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`pid`, `area`, `appartment`, `doorno`, `pincode`) VALUES
('9052727402', 'Srkr College', 'Vinayal Classic', '1-149 third floor', '534247');

-- --------------------------------------------------------

--
-- Table structure for table `delivary`
--

CREATE TABLE `delivary` (
  `pid` varchar(15) NOT NULL,
  `date` date NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `tripid` int(11) NOT NULL,
  `stdid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `parent`
--

CREATE TABLE `parent` (
  `pid` varchar(15) NOT NULL,
  `pass` varchar(10) NOT NULL,
  `pname` varchar(50) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `altphone` varchar(15) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `parent`
--

INSERT INTO `parent` (`pid`, `pass`, `pname`, `email`, `altphone`, `address`) VALUES
('9052727402', '123', 'Shiva Bhavani', 'ravikumar_csd@srkrec.edu.in', '9866892957', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `schools`
--

CREATE TABLE `schools` (
  `sid` int(11) NOT NULL,
  `school_name` varchar(200) NOT NULL,
  `track_address` varchar(50) NOT NULL,
  `adress` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `schools`
--

INSERT INTO `schools` (`sid`, `school_name`, `track_address`, `adress`) VALUES
(1, 'Westberry School', 'Westberry', 'Pedamiram, Bhimavaram'),
(2, 'Bharatiya Vidya Bhavan', 'Bhavans', 'Munshi Marg, Three Town, Bhimvaram'),
(3, 'Eurokids Pre-School', 'Eurokids', 'Beside Chandrika Family Restaurant, Sriram Nagar, Bhimavaram');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `stdid` int(5) NOT NULL,
  `sname` varchar(30) NOT NULL,
  `school` int(11) NOT NULL,
  `rollno` varchar(15) NOT NULL,
  `sclass` int(11) NOT NULL,
  `sec` varchar(15) NOT NULL DEFAULT 'A',
  `gender` int(11) NOT NULL,
  `photo` varchar(70) NOT NULL,
  `subscription_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`stdid`, `sname`, `school`, `rollno`, `sclass`, `sec`, `gender`, `photo`, `subscription_date`) VALUES
(5, 'Ravi Kumar', 2, '21B91A6206', 9, 'SEM1', 0, 'IMG-64a6a6fec4bd78.08972181.jpg', '2023-07-06'),
(6, 'Bhanu Teja Ganesh', 2, '21B91A6207', 9, 'SE1', 0, 'IMG-64a6a7a978b545.95054770.jpg', '2023-07-06'),
(7, 'Shiva Mani', 1, '98668929HB', 8, 'EIG3', 0, 'IMG-64a6b43819c969.64688265.jpg', '2023-07-06');

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

CREATE TABLE `subscriptions` (
  `pid` varchar(15) NOT NULL,
  `stdid` varchar(5) NOT NULL,
  `delivery_partner` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `subscriptions`
--

INSERT INTO `subscriptions` (`pid`, `stdid`, `delivery_partner`) VALUES
('9052727402', '5', 2),
('9052727402', '6', 2),
('9052727402', '7', 2);

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE `team` (
  `eid` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `pass` varchar(15) NOT NULL,
  `type` varchar(15) NOT NULL,
  `address` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `team`
--

INSERT INTO `team` (`eid`, `name`, `mobile`, `pass`, `type`, `address`) VALUES
(1, 'Suresh', '9866600002', '123', 'F', NULL),
(2, 'Balu', '9010872333', '123', 'P', NULL),
(3, 'Jagadish', '9581981888', '123', 'F', NULL),
(4, 'Nani', '9010972333', '123', 'P', NULL),
(5, 'Chaitanya', '8143234177', '123', 'P', NULL),
(6, 'Madam', '9010772333', '123', 'P', NULL),
(8, 'Sai Praveen', '9052727402', '123', 'F', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `trips`
--

CREATE TABLE `trips` (
  `tripid` int(11) NOT NULL,
  `stdid` int(5) DEFAULT NULL,
  `date` date NOT NULL,
  `pickup_time` time DEFAULT NULL,
  `drop_time` time DEFAULT NULL,
  `delivery_by` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `delivary`
--
ALTER TABLE `delivary`
  ADD PRIMARY KEY (`date`,`stdid`),
  ADD KEY `fk_deli_Trips` (`tripid`);

--
-- Indexes for table `parent`
--
ALTER TABLE `parent`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `schools`
--
ALTER TABLE `schools`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`stdid`);

--
-- Indexes for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD PRIMARY KEY (`pid`,`stdid`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`eid`);

--
-- Indexes for table `trips`
--
ALTER TABLE `trips`
  ADD PRIMARY KEY (`tripid`),
  ADD KEY `fk_child_parent` (`stdid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `stdid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `team`
--
ALTER TABLE `team`
  MODIFY `eid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `trips`
--
ALTER TABLE `trips`
  MODIFY `tripid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `delivary`
--
ALTER TABLE `delivary`
  ADD CONSTRAINT `fk_deli_Trips` FOREIGN KEY (`tripid`) REFERENCES `trips` (`tripid`);

--
-- Constraints for table `trips`
--
ALTER TABLE `trips`
  ADD CONSTRAINT `fk_child_parent` FOREIGN KEY (`stdid`) REFERENCES `student` (`stdid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
