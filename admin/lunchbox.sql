-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 30, 2023 at 01:05 PM
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
  `door_no` varchar(10) NOT NULL,
  `address` varchar(30) NOT NULL,
  `pincode` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`pid`, `area`, `appartment`, `door_no`, `address`, `pincode`) VALUES
('7093525985', 'One Town', '', '', 'Annapurna Nilayam', '534204'),
('7702014847', 'ASR Nagar', '', '', 'Gopi krishna towers 203', '534202'),
('7989264811', 'Balusumudi', '', '', 'Venkateswara Towers', '534204'),
('8008833997', 'Mavullamma Temple', '', '', 'SK bookstall opposite', '534201'),
('8297999699', 'Pedamiram', '', '', 'Psr green city 3rd left side a', '534202'),
('8328621506', 'ASR Nagar', '', '', 'vishnu towers 5th floor 402', '534202'),
('8374665666', 'Rayalam', '', '', 'Ramakrishna Residency 302 4th ', '534204'),
('8754448634', 'Chinna Amiram', '', '', 'Siri Icon 403', '534204'),
('8886088449', 'ASR Nagar', '', '', 'lotus residency c 401 5th floo', '534202'),
('8978411400', 'Gunupudi', '', '', 'Municipal office opposite', '534201'),
('8985321414', 'Chinna Amiram', '', '', 'VishnuPriya Towers (chinnamira', '534204'),
('9000057688', 'Gunupudi', '', '', 'Lalitha jewellery', '534201'),
('9000188551', 'Gunupudi', '', '', 'Bethany church Gunupudi', '534201'),
('9059114499', 'Chinna Amiram', '', '', '32 Dental Care road Green Hous', '534204'),
('9100634444', 'Rayalam', '', '', 'Sampath Paradise 302', '534204'),
('9177155457', 'Chinna Amiram', 'GRK Vinay Classic', '', 'Flat 307, Opp SRKR Engineering', '534204'),
('9391887888', 'Gunupudi', '', '', 'SK bookstall', '534201'),
('9393234119', 'ASR Nagar', '', '', 'shreya towers 302', '534202'),
('9397676677', 'ASR Nagar', '', '', 'lotus residency A 103', '534202'),
('9440622003', 'Gunupudi', '', '', 'SBI main branch', '534201'),
('9441116444', 'Pedamiram', '', '', 'Psr green city 3rd right side ', '534202'),
('9441235555', 'ASR Nagar', '', '', 'Slv Gangotri towers 404', '534202'),
('9493475111', 'ASR Nagar', '', '', 'vivekanda homes 402', '534202'),
('9493855599', 'ASR Nagar', '', '', 'lotus residency c 202 3th floo', '534202'),
('9494266789', 'Chinna Amiram', '', '', 'Sri Krishna Nilayam (Ramprasad', '534204'),
('9494492599', 'Gunupudi', '', '', 'SBI main branch', '534201'),
('9494923625', 'Chinna Amiram', '', '', 'Municipal office backside', '534204'),
('9505421188', 'ASR Nagar', '', '', 'Asr statue back side house (ki', '534202'),
('9515851883', 'Rayalam', '', '', 'Alpha Towers A Block 208', '534204'),
('9542672234', 'ASR Nagar', '', '', 'Elite towers opposite road 2nd', '534202'),
('9553444457', 'Chinna Amiram', '', '', 'MS Narasimha Raju Building 3rd', '534204'),
('9554522222', 'Sivaraopeta', '', '', 'Sivaraopeta', '534204'),
('9573407666', 'Rayalam', '', '', 'Alpha Towers A Block 204', '534204'),
('9577595776', 'ASR Nagar', '', '', 'lotus residency c 403 5th floo', '534202'),
('9618110459', 'ASR Nagar', '', '', 'vivekanda homes 102', '534202'),
('9642803277', 'Chinna Amiram', '', '', 'Sri Lakshmi Nilayam (Hansi)', '534204'),
('9652753739', 'Gunupudi', '', '', 'SK bookstall opposite', '534201'),
('9652822235', 'Gunupudi', '', '', 'Masjid opposite', '534201'),
('9676222224', 'Chinna Amiram', '', '', 'Rekha garu Duplex House', '534204'),
('9701314877', 'Rayalam', '', '', 'Alpha Towers B Block 403', '534204'),
('9704534455', 'Chinna Amiram', '', '', 'Seetha Mansion', '534204'),
('9866136008', 'ASR Nagar', '', '', 'satya homes 5th floor (D1)', '534202'),
('9885394144', 'Chinna Amiram', '', '', 'Chettu Kinda Sai baba', '534204'),
('9885670571', 'Gunupudi', '', '', 'DTDC opposite black house', '534201'),
('9908034500', 'Chinna Amiram', '', '', 'Chicken shop opposite road', '534204'),
('9908144655', 'ASR Nagar', '', '', 'punnami towers 3rd floor', '534202'),
('9908954783', 'ASR Nagar', '', '', 'MSR towers 305 4th floor', '534202'),
('9948817092', 'Chinna Amiram', '', '', 'Baroda bank', '534201'),
('9949414757', 'Chinna Amiram', '', '', 'Mahesh Garu (Ramprasad Avenue)', '534204'),
('9949432244', 'ASR Nagar', '', '', 'Gopi krishna towers 101', '534202'),
('9949700007', 'Chinna Amiram', '', '', 'Blossom', '534204'),
('9949834977', 'Rayalam', '', '', 'Surya Teja Towers', '534204'),
('9949899498', 'Gunupudi', '', '', 'Simhadripuram Gudi', '534201'),
('9949941133', 'Chinna Amiram', '', '', 'VR Towers 103 (chinnamiram)', '534204'),
('9959611117', 'ASR Nagar', '', '', 'Krishna residency 5th floor (4', '534202'),
('9963609788', 'Chinna Amiram', '', '', 'Bhimavaram Hospital road', '534204'),
('9966028333', 'Chinna Amiram', '', '', 'Sai Sri Towers 5th Floor 412', '534204'),
('9966066668', 'ASR Nagar', '', '', 'Canara Bank Backside (Manjusa)', '534202'),
('9966775218', 'Chinna Amiram', '', '', 'SLV TR Archade 309 (chinnamira', '534204'),
('9985921927', 'Gunupudi', '', '', 'vididhillu duplex', '534201'),
('9989804141', 'ASR Nagar', '', '', 'vivekanda homes 302', '534202'),
('9989994199', 'ASR Nagar', '', '', 'Prince towers 202', '534202');

-- --------------------------------------------------------

--
-- Table structure for table `delivary`
--

CREATE TABLE `delivary` (
  `pid` varchar(15) NOT NULL,
  `date` date NOT NULL,
  `status` int(5) NOT NULL DEFAULT 0,
  `trp_id` int(5) NOT NULL,
  `std_id` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `parent`
--

CREATE TABLE `parent` (
  `pid` varchar(15) NOT NULL,
  `pass` varchar(10) NOT NULL,
  `pname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `parent`
--

INSERT INTO `parent` (`pid`, `pass`, `pname`, `email`, `address`) VALUES
('9052727402', '123', 'Shiva Bhavani', 'ravikumar_csd@srkrec.edu.in', NULL);

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
  `stdid` varchar(5) NOT NULL,
  `sname` varchar(30) NOT NULL,
  `school` int(2) NOT NULL,
  `rollno` varchar(15) NOT NULL,
  `sclass` int(2) NOT NULL,
  `gender` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

CREATE TABLE `subscriptions` (
  `pid` varchar(15) NOT NULL,
  `child_id` varchar(5) NOT NULL,
  `school` int(3) NOT NULL,
  `alternate_mobile` varchar(15) DEFAULT NULL,
  `delivery_partner` int(11) NOT NULL,
  `subscribed_on` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `subscriptions`
--

INSERT INTO `subscriptions` (`pid`, `child_id`, `school`, `alternate_mobile`, `delivery_partner`, `subscribed_on`) VALUES
('7093525985', 'Child', 1, '', 4, '2023-06-24 16:57:45'),
('7702014847', 'Child', 1, '', 3, '2023-06-24 16:57:74'),
('7989264811', 'Child', 1, '', 4, '2023-06-24 16:57:46'),
('8008833997', 'Child', 1, '', 5, '2023-06-24 16:57:34'),
('8297999699', 'Child', 1, '', 3, '2023-06-24 16:57:90'),
('8328621506', 'Child', 1, '', 3, '2023-06-24 16:57:81'),
('8374665666', 'Child', 1, '', 6, '2023-06-24 16:57:61'),
('8754448634', 'Child', 1, '', 6, '2023-06-24 16:57:58'),
('8886088449', 'Child', 1, '', 3, '2023-06-24 16:57:86'),
('8978411400', 'Child', 1, '', 5, '2023-06-24 16:57:41'),
('8985321414', 'Child', 1, '', 4, '2023-06-24 16:57:53'),
('9000057688', 'Child', 1, '', 5, '2023-06-24 16:57:35'),
('9000188551', 'Child', 1, '', 5, '2023-06-24 16:57:30'),
('9052727402', '1', 1, NULL, 1, NULL),
('9052727402', '2', 1, NULL, 1, NULL),
('9059114499', 'Child', 1, '', 4, '2023-06-24 16:57:50'),
('9100634444', 'Child', 1, '', 6, '2023-06-24 16:57:59'),
('9177155457', 'Tanvi', 1, '', 6, '2023-06-24 16:57:67'),
('9391887888', 'Child', 1, '', 5, '2023-06-24 16:57:32'),
('9393234119', 'Child', 1, '', 3, '2023-06-24 16:57:85'),
('9397676677', 'Child', 1, '', 3, '2023-06-24 16:57:89'),
('9440622003', 'Child', 1, '', 5, '2023-06-24 16:57:38'),
('9441116444', 'Child', 1, '', 3, '2023-06-24 16:57:91'),
('9441235555', 'Child', 1, '', 3, '2023-06-24 16:57:80'),
('9493475111', 'Child', 1, '', 3, '2023-06-24 16:57:77'),
('9493855599', 'Child', 1, '', 3, '2023-06-24 16:57:88'),
('9494266789', 'Child', 1, '', 6, '2023-06-24 16:57:65'),
('9494492599', 'Child', 1, '', 5, '2023-06-24 16:57:39'),
('9494923625', 'Child', 1, '', 4, '2023-06-24 16:57:43'),
('9505421188', 'Child', 1, '', 3, '2023-06-24 16:57:82'),
('9515851883', 'Child', 1, '', 6, '2023-06-24 16:57:64'),
('9542672234', 'Child', 1, '', 3, '2023-06-24 16:57:83'),
('9553444457', 'Child', 1, '', 4, '2023-06-24 16:57:55'),
('9554522222', 'Child', 1, '', 6, '2023-06-24 16:57:56'),
('9573407666', 'Child', 1, '', 6, '2023-06-24 16:57:62'),
('9577595776', 'Child', 1, '', 3, '2023-06-24 16:57:87'),
('9618110459', 'Child', 1, '', 3, '2023-06-24 16:57:79'),
('9642803277', 'Child', 1, '', 4, '2023-06-24 16:57:48'),
('9652753739', 'Child', 1, '', 5, '2023-06-24 16:57:33'),
('9652822235', 'Child', 1, '', 5, '2023-06-24 16:57:31'),
('9676222224', 'Child', 1, '', 4, '2023-06-24 16:57:51'),
('9701314877', 'Child', 1, '', 6, '2023-06-24 16:57:63'),
('9704534455', 'Child', 1, '', 4, '2023-06-24 16:57:49'),
('9866136008', 'Child', 1, '', 3, '2023-06-24 16:57:84'),
('9885394144', 'Child', 1, '', 4, '2023-06-24 16:57:47'),
('9885670571', 'Child', 1, '', 5, '2023-06-24 16:57:40'),
('9908034500', 'Child', 1, '', 4, '2023-06-24 16:57:44'),
('9908144655', 'Child', 1, '', 3, '2023-06-24 16:57:76'),
('9908954783', 'Child', 1, '', 3, '2023-06-24 16:57:71'),
('9948817092', 'Child', 1, '', 4, '2023-06-24 16:57:42'),
('9949414757', 'Child', 1, '', 6, '2023-06-24 16:57:66'),
('9949432244', 'Child', 1, '', 3, '2023-06-24 16:57:73'),
('9949700007', 'Child', 1, '', 6, '2023-06-24 16:57:57'),
('9949834977', 'Child', 1, '', 6, '2023-06-24 16:57:60'),
('9949899498', 'Child', 1, '', 5, '2023-06-24 16:57:36'),
('9949941133', 'Child', 1, '', 4, '2023-06-24 16:57:54'),
('9959611117', 'Child', 1, '', 3, '2023-06-24 16:57:75'),
('9963609788', 'Child', 1, '', 6, '2023-06-24 16:57:69'),
('9966028333', 'Child', 1, '', 6, '2023-06-24 16:57:68'),
('9966066668', 'Child', 1, '', 3, '2023-06-24 16:57:70'),
('9966775218', 'Child', 1, '', 4, '2023-06-24 16:57:52'),
('9985921927', 'Child', 1, '', 5, '2023-06-24 16:57:37'),
('9989804141', 'Child', 1, '', 3, '2023-06-24 16:57:78'),
('9989994199', 'Child', 1, '', 3, '2023-06-24 16:57:72');

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE `team` (
  `eid` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `type` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `team`
--

INSERT INTO `team` (`eid`, `name`, `mobile`, `type`) VALUES
(1, 'Suresh', '9866600002', 'F'),
(2, 'Balu', '9010872333', 'P'),
(3, 'Jagadish', '9581981888', 'F'),
(4, 'Nani', '9010872333', 'P'),
(5, 'Chaitanya', '8143234177', 'P'),
(6, 'Madam', '9010872333', 'P');

-- --------------------------------------------------------

--
-- Table structure for table `trips`
--

CREATE TABLE `trips` (
  `tripid` int(11) NOT NULL,
  `pid` varchar(15) NOT NULL,
  `school` int(11) DEFAULT NULL,
  `date` date NOT NULL,
  `pickup_time` timestamp NULL DEFAULT NULL,
  `drop_time` timestamp NULL DEFAULT NULL,
  `delivery_by` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `trips`
--

INSERT INTO `trips` (`tripid`, `pid`, `school`, `date`, `pickup_time`, `drop_time`, `delivery_by`) VALUES
(1, '9177155456', 1, '2023-06-25', '2023-06-25 06:37:50', '2023-06-25 06:30:00', NULL),
(2, '9100634444', 1, '2023-06-25', '2023-06-25 05:30:00', '2023-06-25 12:35:31', NULL),
(3, '7093525985', 1, '2023-06-25', '2023-06-25 09:50:14', '2023-06-25 10:34:35', NULL),
(4, '7702014847', 1, '2023-06-25', '2023-06-25 10:34:41', '2023-06-25 11:02:21', NULL),
(5, '7989264811', 1, '2023-06-25', '2023-06-25 11:03:24', '2023-06-25 11:03:27', NULL),
(6, '8008833997', 1, '2023-06-25', '2023-06-25 11:08:10', '2023-06-25 11:54:54', NULL),
(7, '8328621506', 1, '2023-06-25', '2023-06-25 11:35:13', '2023-06-25 15:27:07', NULL),
(8, '9948817092', 1, '2023-06-25', '2023-06-25 12:34:50', '2023-06-25 16:14:03', NULL),
(9, '9989994199', 1, '2023-06-25', '2023-06-25 12:37:58', NULL, NULL),
(10, '9177155457', 1, '2023-06-25', '2023-06-25 15:26:54', '2023-06-25 16:13:36', NULL),
(11, '8297999699', 1, '2023-06-25', '2023-06-25 16:12:58', NULL, NULL),
(12, '8374665666', 1, '2023-06-25', '2023-06-25 16:13:00', NULL, NULL),
(13, '8754448634', 1, '2023-06-25', '2023-06-25 16:13:02', NULL, NULL),
(14, '9966775218', 1, '2023-06-25', '2023-06-25 16:13:29', NULL, NULL),
(15, '8978411400', 1, '2023-06-26', '2023-06-26 02:07:51', '2023-06-26 02:07:57', NULL),
(16, '9000057688', 1, '2023-06-26', '2023-06-26 02:07:55', NULL, NULL),
(17, '9000188551', 1, '2023-06-26', '2023-06-26 02:08:04', NULL, NULL),
(18, '8008833997', 1, '2023-06-26', '2023-06-26 02:08:06', NULL, NULL),
(19, '9652753739', 1, '2023-06-26', '2023-06-26 11:00:55', NULL, NULL),
(20, '9177155457', 1, '2023-06-26', '2023-06-26 11:10:40', '2023-06-26 11:11:23', NULL),
(21, '7093525985', 1, '2023-06-26', '2023-06-26 11:13:11', '2023-06-26 11:15:37', NULL),
(22, '7093525985', 1, '2023-06-27', '2023-06-27 07:46:23', '2023-06-27 07:46:29', NULL),
(23, '8008833997', 1, '2023-06-28', '2023-06-28 08:28:53', '2023-06-28 08:28:59', NULL),
(24, '9000057688', 1, '2023-06-28', '2023-06-28 08:30:14', NULL, NULL),
(25, '9000188551', 1, '2023-06-28', '2023-06-28 08:30:17', NULL, NULL),
(26, '9391887888', 1, '2023-06-28', '2023-06-28 08:30:20', NULL, NULL),
(27, '8328621506', 1, '2023-06-28', '2023-06-28 08:33:55', '2023-06-28 08:34:09', NULL),
(28, '7093525985', 1, '2023-06-28', '2023-06-28 08:59:04', NULL, NULL),
(29, '7702014847', 1, '2023-06-28', '2023-06-28 08:59:14', '2023-06-28 08:59:19', NULL),
(30, '7989264811', 1, '2023-06-28', '2023-06-28 09:04:21', '2023-06-28 09:04:24', NULL),
(31, '9985921927', 1, '2023-06-30', '2023-06-30 09:05:39', NULL, NULL),
(32, '7702014847', 1, '2023-06-30', '2023-06-30 09:22:59', '2023-06-30 10:02:57', NULL),
(33, '8297999699', 1, '2023-06-30', '2023-06-30 10:02:22', NULL, NULL);

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
  ADD PRIMARY KEY (`pid`,`date`,`std_id`);

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
  ADD PRIMARY KEY (`pid`,`child_id`);

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
-- AUTO_INCREMENT for table `trips`
--
ALTER TABLE `trips`
  MODIFY `tripid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
