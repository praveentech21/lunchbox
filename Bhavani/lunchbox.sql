-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 10, 2023 at 07:55 AM
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
('9052727402', 'Srkr College', 'Vinayal Classic', '1-149 third floor', '534247'),
('9392871365', 'Krishna Nagar', 'Sri ram Towers', 'tall towers', '548798'),
('9393956956', 'Thota', 'Rama Nagar', 'gagra', '254114'),
('9640336946', 'Juvala Palam', 'Sri Devi Towers', '1-150 vijaya ', '534207'),
('9666273273', 'Bopal Nagar', 'Krishna Kolla Street', 'Nara towns', '755245'),
('9701502635', 'Rama Nagar', 'Krishna Heigh', '1-149 rama rama', '254164');

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

--
-- Dumping data for table `delivary`
--

INSERT INTO `delivary` (`pid`, `date`, `status`, `tripid`, `stdid`) VALUES
('9052727402', '2023-07-11', 1, 1, 1);

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
('9052727402', '123', 'Shiva Bhavani', 'ravikumar_csd@srkrec.edu.in', '9866892957', 'https://goo.gl/maps/yL731XTABCTi7FWa9'),
('9392871365', '123', 'Kesava', 'Kesava@gmail.com', '9392871365', NULL),
('9393956956', '123', 'Konda', 'konda@gmail.com', '9393956956', NULL),
('9640336946', '123', 'Shiva Mani', 'siva@gmail.com', '9640336946', NULL),
('9666273273', '123', 'J Satya Narayana ', 'Narayana@gmail.com', '9666273273', NULL),
('9701502635', '123', 'Rama Krishna', 'rama@gmail.com', '9701502635', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `schools`
--

CREATE TABLE `schools` (
  `sid` int(11) NOT NULL,
  `school_name` varchar(200) NOT NULL,
  `track_address` varchar(50) DEFAULT NULL,
  `school_address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `schools`
--

INSERT INTO `schools` (`sid`, `school_name`, `track_address`, `school_address`) VALUES
(1, 'Westberry School', NULL, 'Pedamiram, Bhimavaram\r\n'),
(2, 'Bhavans', NULL, 'Munshi Marg, Three Town, Bhimvaram\r\n'),
(3, 'Eurokids', NULL, 'Beside Chandrika Family Restaurant, Sriram Nagar, Bhimavaram\r\n');

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
(1, 'Ravi Kumar', 1, '21B91A6206', 9, 'SEM1', 2, 'IMG-64ace1c40d9583.49990636.png', '0000-00-00'),
(2, 'Sanju', 1, '21B91A6207', 3, 'ne2', 2, 'IMG-64ace5e82090c0.36072982.jpg', '0000-00-00'),
(3, 'Bhavani', 1, '45678', 6, 'SEM1', 1, 'IMG-64ad2dd58c3719.30700212.jpg', '0000-00-00'),
(4, 'Srinu', 2, '21B91A624', 6, 'SE1', 2, 'IMG-64ad2e0ee01fd7.40562221.jpg', '0000-00-00'),
(5, 'Bhanu', 1, '', 3, 'gh1', 1, '', '2023-07-11'),
(6, 'Ganga Tulasi', 3, '21B91A6245', 7, 'sc1', 1, 'IMG-64ad2ed593c0c1.64473837.jpg', '2023-07-11'),
(8, 'Aayapa', 1, '21', 9, 'S1q', 2, 'IMG-64ad30536a72a2.23348941.jpg', '2023-07-11'),
(9, 'Jagadish', 1, '21B91A6507', 9, 'Br1', 2, 'IMG-64ad30fdb99264.65952205.jpg', '2023-07-11');

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
('9052727402', '1', 1),
('9052727402', '2', 1),
('9392871365', '5', 2),
('9640336946', '3', 2),
('9666273273', '6', 2),
('9640336946', '4', 3),
('9393956956', '9', 4),
('9701502635', '8', 5);

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
  `address` varchar(150) DEFAULT NULL,
  `photo` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `team`
--

INSERT INTO `team` (`eid`, `name`, `mobile`, `pass`, `type`, `address`, `photo`) VALUES
(1, 'Jagadeesh', '9581981888', '9581981888', 'F', NULL, NULL),
(2, 'sanjay', '6304679588', '6304679588', 'P', NULL, NULL),
(3, 'siva', '8466075576', '8466075576', 'F', NULL, NULL),
(4, 'ganesh', '8143234177', '8143234177', 'P', NULL, NULL),
(5, 'dada', '9182555783', '9182555783', 'P', NULL, NULL),
(6, 'Sai Praveen', '9052727402', '123', '1', NULL, NULL);

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
-- Dumping data for table `trips`
--

INSERT INTO `trips` (`tripid`, `stdid`, `date`, `pickup_time`, `drop_time`, `delivery_by`) VALUES
(1, 1, '2023-07-11', '07:14:50', '07:15:32', '1');

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
  ADD KEY `tripid_delivary_trips` (`tripid`);

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
  ADD PRIMARY KEY (`stdid`),
  ADD KEY `stdid_schools_students` (`school`);

--
-- Indexes for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD PRIMARY KEY (`pid`,`stdid`),
  ADD KEY `sid_school_susb` (`delivery_partner`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`eid`);

--
-- Indexes for table `trips`
--
ALTER TABLE `trips`
  ADD PRIMARY KEY (`tripid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `schools`
--
ALTER TABLE `schools`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `stdid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `team`
--
ALTER TABLE `team`
  MODIFY `eid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `trips`
--
ALTER TABLE `trips`
  MODIFY `tripid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
