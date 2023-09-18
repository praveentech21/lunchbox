-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 17, 2023 at 02:57 AM
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
('8423662950', 'cx vb', 'fvbg', 'fd', '201009'),
('9052727402', 'Chinnamiram', 'Ravi Appartment', '1-149', '534204'),
('9052728123', 'Bank Colony', 'Sanjana Estates', '4-7g', '534204'),
('9052728844', 'Pedhamiram', 'Sai Baba  Towers ', '17 -K', '534204'),
('9052729565', 'Rayalam', 'Vinaly Classic', '31-C', '534204'),
('9052730286', 'Gunupudi', 'Sai Heights', '32 H', '534204'),
('9052731007', 'Rayalam', 'Seven Hours', '307', '534204'),
('9052731728', 'Balusumudi', 'Srinivasa Towers', '402', '534204'),
('9052732449', 'Asr Nagar', 'Four Seasons', '501', '534204'),
('9052733170', 'srkr College Road', 'Kalpana Towers ', '102', '534204'),
('9052733891', 'one town', 'Bhavani Heights', '402', '534204'),
('9052734612', 'Chinnamiram', 'Tillik Residencies', 'HK', '534204'),
('9052735333', 'Bank Colony', 'Ravi Appartment', 'GF-5', '534204'),
('9052736054', 'Pedhamiram', 'Sanjana Estates', 'TG-6', '534204'),
('9052736775', 'Rayalam', 'Sai Baba  Towers ', 'JN-2', '534204'),
('9052737496', 'Gunupudi', 'Vinaly Classic', '1-149', '534204'),
('9052738217', 'Rayalam', 'Sai Heights', '4-7g', '534204'),
('9052738938', 'Balusumudi', 'Seven Hours', '17 -K', '534204'),
('9052739659', 'Asr Nagar', 'Srinivasa Towers', '31-C', '534204'),
('9052740380', 'srkr College Road', 'Four Seasons', '32 H', '534204'),
('9052741101', 'one town', 'Kalpana Towers ', '307', '534204'),
('9052741822', 'Chinnamiram', 'Bhavani Heights', '402', '534204'),
('9052742543', 'Bank Colony', 'Tillik Residencies', '501', '534204'),
('9052743264', 'Pedhamiram', 'Ravi Appartment', '102', '534204'),
('9052743985', 'Rayalam', 'Sanjana Estates', '402', '534204'),
('9052744706', 'Gunupudi', 'Sai Baba  Towers ', 'HK', '534204'),
('9052745427', 'Rayalam', 'Vinaly Classic', 'GF-5', '534204'),
('9052746148', 'Balusumudi', 'Sai Heights', 'TG-6', '534204'),
('9052746869', 'Asr Nagar', 'Seven Hours', 'JN-2', '534204'),
('9052747590', 'srkr College Road', 'Srinivasa Towers', '1-149', '534204'),
('9052748311', 'one town', 'Four Seasons', '4-7g', '534204'),
('9052749032', 'Chinnamiram', 'Kalpana Towers ', '17 -K', '534204'),
('9052749753', 'Bank Colony', 'Bhavani Heights', '31-C', '534204'),
('9052750474', 'Pedhamiram', 'Tillik Residencies', '32 H', '534204'),
('9052751195', 'Rayalam', 'Ravi Appartment', '307', '534204'),
('9052751916', 'Gunupudi', 'Sanjana Estates', '402', '534204'),
('9052752637', 'Rayalam', 'Sai Baba  Towers ', '501', '534204'),
('9052753358', 'Balusumudi', 'Vinaly Classic', '102', '534204'),
('9052754079', 'Asr Nagar', 'Sai Heights', '402', '534204'),
('9052754800', 'srkr College Road', 'Seven Hours', 'HK', '534204'),
('9052755521', 'one town', 'Srinivasa Towers', 'GF-5', '534204'),
('9052756242', 'Chinnamiram', 'Four Seasons', 'TG-6', '534204'),
('9052756963', 'Bank Colony', 'Kalpana Towers ', 'JN-2', '534204'),
('9052757684', 'Pedhamiram', 'Bhavani Heights', '4-7g', '534204'),
('9052758405', 'Rayalam', 'Tillik Residencies', '17 -K', '534204'),
('9052759126', 'Gunupudi', 'Ravi Appartment', '31-C', '534204'),
('9052759847', 'Rayalam', 'Sanjana Estates', '32 H', '534204'),
('9052760568', 'Balusumudi', 'Sai Baba  Towers ', '307', '534204'),
('9052761289', 'Asr Nagar', 'Vinaly Classic', '402', '534204'),
('9052762010', 'srkr College Road', 'Sai Heights', '501', '534204'),
('9052762731', 'one town', 'Seven Hours', '102', '534204'),
('9052763452', 'Chinnamiram', 'Srinivasa Towers', '402', '534204'),
('9052764173', 'Bank Colony', 'Four Seasons', 'HK', '534204'),
('9052764894', 'Pedhamiram', 'Kalpana Towers ', 'GF-5', '534204'),
('9052765615', 'Rayalam', 'Bhavani Heights', 'TG-6', '534204'),
('9052766336', 'Gunupudi', 'Tillik Residencies', 'JN-2', '534204'),
('9052767057', 'Rayalam', 'Ravi Appartment', '1-149', '534204'),
('9052767778', 'Balusumudi', 'Sanjana Estates', '4-7g', '534204'),
('9052768499', 'Asr Nagar', 'Sai Baba  Towers ', '17 -K', '534204'),
('9052769220', 'srkr College Road', 'Vinaly Classic', '4-7g', '534204'),
('9052769941', 'one town', 'Sai Heights', '17 -K', '534204'),
('9052770662', 'Chinnamiram', 'Seven Hours', '31-C', '534204'),
('9052771383', 'Bank Colony', 'Srinivasa Towers', '32 H', '534204'),
('9052772104', 'Pedhamiram', 'Four Seasons', '307', '534204'),
('9052772825', 'Rayalam', 'Kalpana Towers ', '402', '534204'),
('9052773546', 'Gunupudi', 'Bhavani Heights', '501', '534204'),
('9052774267', 'Rayalam', 'Tillik Residencies', '102', '534204'),
('9052774988', 'Balusumudi', 'Ravi Appartment', '402', '534204'),
('9052775709', 'Asr Nagar', 'Sanjana Estates', 'HK', '534204'),
('9052776430', 'srkr College Road', 'Sai Baba  Towers ', 'GF-5', '534204'),
('9052777151', 'one town', 'Vinaly Classic', 'TG-6', '534204'),
('9052777872', 'Chinnamiram', 'Sai Heights', 'JN-2', '534204'),
('9052778593', 'Bank Colony', 'Seven Hours', '1-149', '534204'),
('9052779314', 'Pedhamiram', 'Srinivasa Towers', '4-7g', '534204');

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
('9052728123', '2023-08-19', 1, 1, 2),
('9052731728', '2023-08-19', 0, 2, 7),
('9052728123', '2023-08-25', 1, 3, 2),
('9052731728', '2023-08-25', 0, 4, 7);

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
('8423662950', '123456789', 'nitish', 'nitishupkr@gmail.com', '7054906820', NULL),
('9052727402', '123', 'ISUKAPATLA MANJULA', 'ravikumar_csd@srkrec.edu.in', '9052728123', 'https://goo.gl/maps/2pWjZ3v7nenMERH16'),
('9052728123', '9052728123', 'JARAPALA RAMA CHANDU NAIK', 'ravikumar_csd@srkrec.edu.in', '9052728844', 'https://goo.gl/maps/HkvkeKe8hCx8eMFx6'),
('9052728844', '9052728844', 'JAVVADI VINAY KUMAR', 'ravikumar_csd@srkrec.edu.in', '9052729565', 'https://goo.gl/maps/HkvkeKe8hCx8eMFx6'),
('9052729565', '9052729565', 'JUTTUKA MANOJ KUMAR', 'ravikumar_csd@srkrec.edu.in', '9052730286', 'https://goo.gl/maps/2nPCGhX8zSteo3bg6'),
('9052730286', '9052730286', 'JUVVALA DINESH', 'ravikumar_csd@srkrec.edu.in', '9052731007', 'https://goo.gl/maps/2nPCGhX8zSteo3bg6'),
('9052731007', '9052731007', 'KADALI KEERTHI PRIYA LAKSHMI', 'ravikumar_csd@srkrec.edu.in', '9052731728', 'https://goo.gl/maps/rXyDqsCEFdbYz8FM9'),
('9052731728', '9052731728', 'KADALI SHANMUK SANDEEP', 'ravikumar_csd@srkrec.edu.in', '9052732449', 'https://goo.gl/maps/rXyDqsCEFdbYz8FM9'),
('9052732449', '9052732449', 'KAGGA MOUNIKA', 'ravikumar_csd@srkrec.edu.in', '9052733170', 'https://goo.gl/maps/E5LgGnywBi4fxPBSA'),
('9052733170', '9052733170', 'KAKULAPATI LAKSHMI PHANI VARSHITHA', 'ravikumar_csd@srkrec.edu.in', '9052733891', 'https://goo.gl/maps/H1YMUqcW7B28M1RNA'),
('9052733891', '9052733891', 'KALAM ABHISHEK', 'ravikumar_csd@srkrec.edu.in', '9052734612', 'https://goo.gl/maps/AQ4HsgVWZ5FeVwx78'),
('9052734612', '9052734612', 'KALLAKURI KESAVA LAKSHMI', 'ravikumar_csd@srkrec.edu.in', '9052735333', 'https://goo.gl/maps/2pWjZ3v7nenMERH16'),
('9052735333', '9052735333', 'KALLEPALLI SAI CHARISHMA', 'ravikumar_csd@srkrec.edu.in', '9052736054', 'https://goo.gl/maps/HkvkeKe8hCx8eMFx6'),
('9052736054', '9052736054', 'KAMIREDDY JYOSNA RAM', 'ravikumar_csd@srkrec.edu.in', '9052736775', 'https://goo.gl/maps/HkvkeKe8hCx8eMFx6'),
('9052736775', '9052736775', 'KAMIREDDY VENKATA PAVANI', 'ravikumar_csd@srkrec.edu.in', '9052737496', 'https://goo.gl/maps/2nPCGhX8zSteo3bg6'),
('9052737496', '9052737496', 'KANCHARAPU KALYAN CHAKRAVARTHY', 'ravikumar_csd@srkrec.edu.in', '9052738217', 'https://goo.gl/maps/2nPCGhX8zSteo3bg6'),
('9052738217', '9052738217', 'KANDIBOINA AKHIL', 'ravikumar_csd@srkrec.edu.in', '9052738938', 'https://goo.gl/maps/rXyDqsCEFdbYz8FM9'),
('9052738938', '9052738938', 'KANNURU DHANUSH', 'ravikumar_csd@srkrec.edu.in', '9052739659', 'https://goo.gl/maps/rXyDqsCEFdbYz8FM9'),
('9052739659', '9052739659', 'KANTLA SRIBHAVYA', 'ravikumar_csd@srkrec.edu.in', '9052740380', 'https://goo.gl/maps/E5LgGnywBi4fxPBSA'),
('9052740380', '9052740380', 'KARANAM VIJAYA SAI', 'ravikumar_csd@srkrec.edu.in', '9052741101', 'https://goo.gl/maps/H1YMUqcW7B28M1RNA'),
('9052741101', '9052741101', 'KAREDLA HARI PURNA KUMAR', 'ravikumar_csd@srkrec.edu.in', '9052741822', 'https://goo.gl/maps/AQ4HsgVWZ5FeVwx78'),
('9052741822', '9052741822', 'KARRI JYOTHSNA CHANDANA', 'ravikumar_csd@srkrec.edu.in', '9052742543', 'https://goo.gl/maps/2pWjZ3v7nenMERH16'),
('9052742543', '9052742543', 'KARRI NEERAJ KUMAR', 'ravikumar_csd@srkrec.edu.in', '9052743264', 'https://goo.gl/maps/HkvkeKe8hCx8eMFx6'),
('9052743264', '9052743264', 'KARRI SAI CHAITANYA', 'ravikumar_csd@srkrec.edu.in', '9052743985', 'https://goo.gl/maps/HkvkeKe8hCx8eMFx6'),
('9052743985', '9052743985', 'KARUMURI SIVA RAMA KRISHNA', 'ravikumar_csd@srkrec.edu.in', '9052744706', 'https://goo.gl/maps/2nPCGhX8zSteo3bg6'),
('9052744706', '9052744706', 'KATHULA DURGA RATNAM', 'ravikumar_csd@srkrec.edu.in', '9052745427', 'https://goo.gl/maps/2nPCGhX8zSteo3bg6'),
('9052745427', '9052745427', 'KEELLA LAKSHMI PADMAJA', 'ravikumar_csd@srkrec.edu.in', '9052746148', 'https://goo.gl/maps/rXyDqsCEFdbYz8FM9'),
('9052746148', '9052746148', 'KETHIREDDY INDU', 'ravikumar_csd@srkrec.edu.in', '9052746869', 'https://goo.gl/maps/rXyDqsCEFdbYz8FM9'),
('9052746869', '9052746869', 'KOLA TULASI SRI SAI NANDINI', 'ravikumar_csd@srkrec.edu.in', '9052747590', 'https://goo.gl/maps/E5LgGnywBi4fxPBSA'),
('9052747590', '9052747590', 'KOMMISETTI SHANMUKH', 'ravikumar_csd@srkrec.edu.in', '9052748311', 'https://goo.gl/maps/H1YMUqcW7B28M1RNA'),
('9052748311', '9052748311', 'KONDEPU GIRIDHAR', 'ravikumar_csd@srkrec.edu.in', '9052749032', 'https://goo.gl/maps/AQ4HsgVWZ5FeVwx78'),
('9052749032', '9052749032', 'KORLA LIKHITA', 'ravikumar_csd@srkrec.edu.in', '9052749753', 'https://goo.gl/maps/2pWjZ3v7nenMERH16'),
('9052749753', '9052749753', 'KOSARAJU VEDA HIMAJA', 'ravikumar_csd@srkrec.edu.in', '9052750474', 'https://goo.gl/maps/HkvkeKe8hCx8eMFx6'),
('9052750474', '9052750474', 'KOTA TARUN RAJ', 'ravikumar_csd@srkrec.edu.in', '9052751195', 'https://goo.gl/maps/HkvkeKe8hCx8eMFx6'),
('9052751195', '9052751195', 'KOTIKALAPUDI MUKESH BABU', 'ravikumar_csd@srkrec.edu.in', '9052751916', 'https://goo.gl/maps/2nPCGhX8zSteo3bg6'),
('9052751916', '9052751916', 'KOTNI HEMA SAI LAKSHMI', 'ravikumar_csd@srkrec.edu.in', '9052752637', 'https://goo.gl/maps/2nPCGhX8zSteo3bg6'),
('9052752637', '9052752637', 'KOTTALANKA MERCY', 'ravikumar_csd@srkrec.edu.in', '9052753358', 'https://goo.gl/maps/rXyDqsCEFdbYz8FM9'),
('9052753358', '9052753358', 'KOTTIKALAPUDI BALA SAI RAM', 'ravikumar_csd@srkrec.edu.in', '9052754079', 'https://goo.gl/maps/rXyDqsCEFdbYz8FM9'),
('9052754079', '9052754079', 'KOVVURI NAVYA', 'ravikumar_csd@srkrec.edu.in', '9052754800', 'https://goo.gl/maps/E5LgGnywBi4fxPBSA'),
('9052754800', '9052754800', 'KOYA HARSHA MADHAVA', 'ravikumar_csd@srkrec.edu.in', '9052755521', 'https://goo.gl/maps/H1YMUqcW7B28M1RNA'),
('9052755521', '9052755521', 'KUDAPA SAI NIKILESH', 'ravikumar_csd@srkrec.edu.in', '9052756242', 'https://goo.gl/maps/AQ4HsgVWZ5FeVwx78'),
('9052756242', '9052756242', 'KUDUPUDI CHARISHMA PHANI MADHULIKA', 'ravikumar_csd@srkrec.edu.in', '9052756963', 'https://goo.gl/maps/2pWjZ3v7nenMERH16'),
('9052756963', '9052756963', 'KUDUPUDI MONISH RAM', 'ravikumar_csd@srkrec.edu.in', '9052757684', 'https://goo.gl/maps/HkvkeKe8hCx8eMFx6'),
('9052757684', '9052757684', 'LAKAMSANI SAI SIVA NAGA DIVYA SRI', 'ravikumar_csd@srkrec.edu.in', '9052758405', 'https://goo.gl/maps/HkvkeKe8hCx8eMFx6'),
('9052758405', '9052758405', 'LAKKOJU ANUSHA', 'ravikumar_csd@srkrec.edu.in', '9052759126', 'https://goo.gl/maps/2nPCGhX8zSteo3bg6'),
('9052759126', '9052759126', 'LAKSHMANA SAI GATTI', 'ravikumar_csd@srkrec.edu.in', '9052759847', 'https://goo.gl/maps/2nPCGhX8zSteo3bg6'),
('9052759847', '9052759847', 'LINGAM SWAMY SURENDRA', 'ravikumar_csd@srkrec.edu.in', '9052760568', 'https://goo.gl/maps/rXyDqsCEFdbYz8FM9'),
('9052760568', '9052760568', 'LOKARAPU VISHNU', 'ravikumar_csd@srkrec.edu.in', '9052761289', 'https://goo.gl/maps/rXyDqsCEFdbYz8FM9'),
('9052761289', '9052761289', 'MADICHARLA RUPESH KUMAR', 'ravikumar_csd@srkrec.edu.in', '9052762010', 'https://goo.gl/maps/E5LgGnywBi4fxPBSA'),
('9052762010', '9052762010', 'MAGANTI BHAVYA SRI', 'ravikumar_csd@srkrec.edu.in', '9052762731', 'https://goo.gl/maps/H1YMUqcW7B28M1RNA'),
('9052762731', '9052762731', 'MAHAMMAD ASIFF', 'ravikumar_csd@srkrec.edu.in', '9052763452', 'https://goo.gl/maps/AQ4HsgVWZ5FeVwx78'),
('9052763452', '9052763452', 'MAJJI SAI KRISHNA', 'ravikumar_csd@srkrec.edu.in', '9052764173', 'https://goo.gl/maps/2pWjZ3v7nenMERH16'),
('9052764173', '9052764173', 'MAKIREDDY VARA PRASAD REDDY', 'ravikumar_csd@srkrec.edu.in', '9052764894', 'https://goo.gl/maps/HkvkeKe8hCx8eMFx6'),
('9052764894', '9052764894', 'MALLA SAI RAM', 'ravikumar_csd@srkrec.edu.in', '9052765615', 'https://goo.gl/maps/HkvkeKe8hCx8eMFx6'),
('9052765615', '9052765615', 'MALLULA KALYANI', 'ravikumar_csd@srkrec.edu.in', '9052766336', 'https://goo.gl/maps/2nPCGhX8zSteo3bg6'),
('9052766336', '9052766336', 'MANDAPAKA SAI KRISHNA', 'ravikumar_csd@srkrec.edu.in', '9052767057', 'https://goo.gl/maps/2nPCGhX8zSteo3bg6'),
('9052767057', '9052767057', 'MANDAPATI VENKATA NAGA SAI', 'ravikumar_csd@srkrec.edu.in', '9052767778', 'https://goo.gl/maps/rXyDqsCEFdbYz8FM9'),
('9052767778', '9052767778', 'MANGIPUDI LAKSHMI HIRANYA', 'ravikumar_csd@srkrec.edu.in', '9052768499', 'https://goo.gl/maps/rXyDqsCEFdbYz8FM9'),
('9052768499', '9052768499', 'MAREEDU RAVINDRA BABU', 'ravikumar_csd@srkrec.edu.in', '9052769220', 'https://goo.gl/maps/E5LgGnywBi4fxPBSA'),
('9052769220', '9052769220', 'MARSAKATLA KIRAN KUMAR', 'ravikumar_csd@srkrec.edu.in', '9052769941', 'https://goo.gl/maps/H1YMUqcW7B28M1RNA'),
('9052769941', '9052769941', 'MEDABALA LILLY GRACE', 'ravikumar_csd@srkrec.edu.in', '9052770662', 'https://goo.gl/maps/AQ4HsgVWZ5FeVwx78'),
('9052770662', '9052770662', 'MEDIMUDI SRINIVASA RAVI TEJA', 'ravikumar_csd@srkrec.edu.in', '9052771383', 'https://goo.gl/maps/2pWjZ3v7nenMERH16'),
('9052771383', '9052771383', 'MEESALA BABA SASHANK', 'ravikumar_csd@srkrec.edu.in', '9052772104', 'https://goo.gl/maps/HkvkeKe8hCx8eMFx6'),
('9052772104', '9052772104', 'MEKALA MALYA VIJAYA NAGA DURGA', 'ravikumar_csd@srkrec.edu.in', '9052772825', 'https://goo.gl/maps/HkvkeKe8hCx8eMFx6'),
('9052772825', '9052772825', 'MENETI MANIKANTA', 'ravikumar_csd@srkrec.edu.in', '9052773546', 'https://goo.gl/maps/2nPCGhX8zSteo3bg6'),
('9052773546', '9052773546', 'MERUGU DHARANI', 'ravikumar_csd@srkrec.edu.in', '9052774267', 'https://goo.gl/maps/2nPCGhX8zSteo3bg6'),
('9052774267', '9052774267', 'MODE PRAMEELA', 'ravikumar_csd@srkrec.edu.in', '9052774988', 'https://goo.gl/maps/rXyDqsCEFdbYz8FM9'),
('9052774988', '9052774988', 'MOHAMMAD MAHABOOB ALI', 'ravikumar_csd@srkrec.edu.in', '9052775709', 'https://goo.gl/maps/rXyDqsCEFdbYz8FM9'),
('9052775709', '9052775709', 'MOHAMMAD SAHIL', 'ravikumar_csd@srkrec.edu.in', '9052776430', 'https://goo.gl/maps/E5LgGnywBi4fxPBSA'),
('9052776430', '9052776430', 'MOYYI PRASANNA KUMAR', 'ravikumar_csd@srkrec.edu.in', '9052777151', 'https://goo.gl/maps/H1YMUqcW7B28M1RNA'),
('9052777151', '9052777151', 'MUDAVATH RAVINDRA NAIK', 'ravikumar_csd@srkrec.edu.in', '9052777872', 'https://goo.gl/maps/AQ4HsgVWZ5FeVwx78'),
('9052777872', '9052777872', 'MUDDALA KAMAKSHI DEVI', 'ravikumar_csd@srkrec.edu.in', '9052778593', 'https://goo.gl/maps/2pWjZ3v7nenMERH16'),
('9052778593', '9052778593', 'MUDU KALYAN BABU', 'ravikumar_csd@srkrec.edu.in', '9052779314', 'https://goo.gl/maps/HkvkeKe8hCx8eMFx6'),
('9052779314', '9052779314', 'MUGGURALLA DURGA SREE', 'ravikumar_csd@srkrec.edu.in', '9052727402', 'https://goo.gl/maps/HkvkeKe8hCx8eMFx6');

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
(1, 'West Berry', NULL, 'Survey No. 173/1, Peda Amiram, Village, Bhimavaram, Andhra Pradesh 534204'),
(2, 'Euro Kids', NULL, 'Kallakuri, Darapu Vari St, near Chandrika Biryani Point, Sri Rama Puram, Balusumoodi, Bhimavaram, Andhra Pradesh 534202'),
(3, 'Bharathi Vidya Bhavans', NULL, 'Vidyashram, PP Rd, near GRK Hospital, Bhimavaram, Andhra Pradesh 534203');

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
(1, 'ACHANTA SREE GREESHMA\nACH', 1, '21B91A6201', 8, 'H6', 1, '1.png', '0000-00-00'),
(2, 'BAIRISETTI SAI GANGADHAR', 1, '21B91A0509', 2, 'B', 2, '2.png', '0000-00-00'),
(3, 'BHOKASKEDE BHAGAVATH', 1, '21B91A0532', 3, 'Star', 2, '3.png', '0000-00-00'),
(4, 'BODAPATI YASWANTH RAJ KUMAR', 2, '21B91A0539', 4, 'AS1', 2, '4.png', '0000-00-00'),
(5, 'BYRI ROHIT', 2, '21B91A0542', 5, 'PG2', 2, '5.png', '0000-00-00'),
(6, 'CHATRATHI RAVI KUMAR SATYA SAI', 3, '21B91A0545', 6, 'A', 2, '6.png', '0000-00-00'),
(7, 'CHENNAMSETTI ANUSHA', 2, '21B91A0563', 7, 'B', 1, '7.png', '0000-00-00'),
(8, 'CHITTURI KARTHIK', 1, '21B91A0566', 8, 'Star', 2, '8.png', '0000-00-00'),
(9, 'DANDU RAMA SIVA NAGA RAJU', 2, '21B91A0578', 9, 'W', 2, '9.png', '0000-00-00'),
(10, 'DANGETI VIVEK HARI BHASKAR PAP', 2, '21B91A0589', 10, 'D', 2, '10.png', '0000-00-00'),
(11, 'DEVADA LAVANYA', 1, '21B91A05A5', 2, 'A', 1, '11.png', '0000-00-00'),
(12, 'DUDDUKURI LAVANYA', 3, '21B91A05D8', 3, 'F', 1, '12.png', '0000-00-00'),
(13, 'GADIRAJU JANAKI RITHVIK VARMA', 3, '21B91A05E9', 4, 'A', 2, '13.png', '0000-00-00'),
(14, 'GOLVE YASWANTH SAI', 3, '21B91A05I1', 1, 'E', 2, '14.png', '0000-00-00'),
(15, 'GUDAPATI YAKSHINE ANANNYA', 3, '21B91A05I6', 4, 'C', 1, '15.png', '0000-00-00'),
(16, 'GUNTURU UDAY KIRAN', 3, '21B91A05I7', 5, 'D', 2, '16.png', '0000-00-00'),
(17, 'JALLELLA RAM SUMA SATHWIK', 1, '21B91A05I8', 3, 'A2', 2, '17.png', '0000-00-00'),
(18, 'JAVVADI BHARGAVI', 1, '21B91A05J3', 4, 'A1', 1, '18.png', '0000-00-00'),
(19, 'KATARI SAI GANESH', 2, '21B91A05J4', 7, 'A3', 2, '19.png', '0000-00-00'),
(20, 'KATURI SANJU', 2, '21B91A05K1', 8, 'FIR1', 2, '20.png', '0000-00-00'),
(21, 'KEDHARISETTI SURYANARAYANA', 2, '21B91A05M6', 6, 'FIR1', 2, '21.png', '0000-00-00'),
(22, 'KOMALI LAKSHMI PURNA SRI', 1, '21B91A05N4', 8, 'A', 1, '22.png', '0000-00-00'),
(23, 'KONAKALA VASANTHI', 1, '21B91A05N5', 3, 'B', 1, '23.png', '0000-00-00'),
(24, 'KOYYE SASANK', 1, '21B91A05N9', 5, 'Star', 2, '24.png', '0000-00-00'),
(25, 'KUNCHALA BALAJI SWAMY', 1, '21B91A05Q8', 6, 'AS1', 2, '25.png', '0000-00-00'),
(26, 'KUNCHANAPALLI HARSHA VARDHAN', 2, '21B91A05S4', 3, 'PG2', 2, '26.png', '0000-00-00'),
(27, 'MALLADI TEJASRI', 2, '21B91A05S6', 5, 'A', 1, '27.png', '0000-00-00'),
(28, 'MALLIPUDI RAJESH', 3, '21B91A05S8', 6, 'B', 2, '28.png', '0000-00-00'),
(29, 'MANEPALLI KALKI NAGA DURGA SAI', 3, '21B91A05S9', 3, 'Star', 2, '29.png', '0000-00-00'),
(30, 'MANKENA VENKATA NAGA SEETHARAM', 3, '21B91A05T4', 5, 'W', 2, '30.png', '0000-00-00'),
(31, 'MARISETTI BHANU TEJASWINI', 3, '21B91A05T5', 5, 'D', 1, '31.png', '0000-00-00'),
(32, 'MUDUNURI PRUDHVI SAI RAVIVARMA', 3, '21B91A05T6', 4, 'A', 2, '32.png', '0000-00-00'),
(33, 'MUNSHI ABDUL RAHEEM', 1, '21B91A05T8', 4, 'F', 2, '33.png', '0000-00-00'),
(34, 'NAGANABOYINA J N V S S SIVA SA', 1, '21B91A05V8', 2, 'A', 2, '34.png', '0000-00-00'),
(35, 'NETALA SRUJANA SRI', 1, '21B91A05W3', 2, 'E', 2, '35.png', '0000-00-00'),
(36, 'PADAVALA YOGITHA', 1, '21B91A05W9', 3, 'C', 1, '36.png', '0000-00-00'),
(37, 'PAGOLLU GRACY', 1, '22B95A0524', 3, 'D', 1, '37.png', '0000-00-00'),
(38, 'PATHIWADA REVATHI', 1, '21B91A6201', 2, 'A2', 1, '38.png', '0000-00-00'),
(39, 'PERE SRI VENKATA SIVA GANESH', 2, '21B91A6202', 3, 'A1', 2, '39.png', '0000-00-00'),
(40, 'PUDI CHAITANYA SRUJANA', 2, '21B91A6203', 4, 'A3', 1, '40.png', '0000-00-00'),
(41, 'RAMAGANI MALLESWARI', 2, '21B91A6204', 4, 'FIR1', 1, '41.png', '0000-00-00'),
(42, 'RAVURI UMA SUBHASHINI', 2, '21B91A6209', 4, 'FIR1', 1, '42.png', '0000-00-00'),
(43, 'REDDI MADHAVI', 2, '21B91A6211', 5, 'A', 1, '43.png', '0000-00-00'),
(44, 'REDDI SAHITHI PALLAVI', 2, '21B91A6212', 5, 'B', 1, '44.png', '0000-00-00'),
(45, 'SADHANALA MANASANTHI', 2, '21B91A6216', 5, 'Star', 1, '45.png', '0000-00-00'),
(46, 'SAMAVEDAM NAGASRI BHAGAVATI VI', 2, '21B91A6219', 6, 'AS1', 2, '46.png', '0000-00-00'),
(47, 'SHAIK ABDUL AZIZ', 1, '21B91A6220', 3, 'PG2', 2, '47.png', '0000-00-00'),
(48, 'SHAIK ABDUL LATHIF', 1, '21B91A6221', 7, 'A', 2, '48.png', '0000-00-00'),
(49, 'SIDAGAM VINAY PRASAD', 3, '21B91A6224', 8, 'B', 2, '49.png', '0000-00-00'),
(50, 'TALABATTULA HARSHA KUMARI', 3, '21B91A6226', 9, 'Star', 1, '50.png', '0000-00-00'),
(51, 'TANNEERU VASANTH KUMAR', 3, '21B91A6227', 6, 'W', 2, '51.png', '0000-00-00'),
(52, 'THATTUKOLLA SIVA KEERTHI', 2, '21B91A6230', 1, 'D', 1, '52.png', '0000-00-00'),
(53, 'UNNAMATLA NAVEEN RAHUL ROY', 1, '21B91A6231', 2, 'A', 2, '53.png', '0000-00-00'),
(54, 'UTADA LAKSHMI TULASI', 2, '21B91A6232', 3, 'F', 1, '54.png', '0000-00-00'),
(55, 'VADAPARTHI ANJANI NAGA SARANYA', 2, '21B91A6233', 4, 'A', 1, '55.png', '0000-00-00'),
(56, 'VANAPALLI SAI SIVA MANI', 2, '21B91A6235', 5, 'E', 2, '56.png', '0000-00-00'),
(57, 'VANGAPANDU ROHITH', 1, '21B91A6236', 6, 'C', 2, '57.png', '0000-00-00'),
(58, 'VASI HARSHA VARDHAN KRISHNA SA', 2, '21B91A6237', 7, 'D', 2, '58.png', '0000-00-00'),
(59, 'VEERAVALLI PUNEETH', 1, '21B91A6241', 8, 'A2', 2, '59.png', '0000-00-00'),
(60, 'VEMULA VARUN SURYA', 1, '21B91A6245', 9, 'A1', 2, '60.png', '0000-00-00'),
(61, 'VETCHA NAGA MANIKANTA RAMA SUB', 3, '21B91A6250', 10, 'A3', 2, '61.png', '0000-00-00'),
(62, 'YALAKALA GANESH', 3, '21B91A6251', 2, 'FIR1', 2, '62.png', '0000-00-00'),
(63, 'YELETI NODYA', 3, '21B91A6253', 3, 'FIR1', 1, '63.png', '0000-00-00'),
(64, 'ADABALA LOKENDRA DURGA SAI CHA', 1, '21B91A6254', 4, 'A', 2, '64.png', '0000-00-00'),
(65, 'ADDALA SAI PRANEETH', 1, '21B91A6255', 1, 'B', 2, '65.png', '0000-00-00'),
(66, 'AJAY KIKKISETTI', 1, '21B91A6259', 4, 'Star', 2, '66.png', '0000-00-00'),
(67, 'AKKABATHULA SPOORTHI', 2, '21B91A6260', 5, 'AS1', 1, '67.png', '0000-00-00'),
(68, 'AMARLAPUDI PRABHAS', 2, '21B91A6261', 3, 'PG2', 2, '68.png', '0000-00-00'),
(69, 'ANAND VARMA DATLA', 2, '21B91A6262', 4, 'A', 2, '69.png', '0000-00-00'),
(70, 'ANJANA MELAM', 3, '21B91A6263', 7, 'B', 1, '70.png', '0000-00-00'),
(71, 'ANNAM LAKSHMI JANARDHAN REDDY', 3, '22B95A6205', 8, 'Star', 2, '71.png', '0000-00-00'),
(72, 'ANNEPU SATISH', 3, '22B95A6207', 6, 'W', 2, '72.png', '0000-00-00'),
(73, 'APPADI VISWESWARA DHANABABU', 3, '21B91A6107', 8, 'D', 2, '73.png', '0000-00-00'),
(74, 'APPANA RAMA VENKATA GANESH', 3, '21B91A6114', 3, 'A', 2, '74.png', '0000-00-00'),
(75, 'ATCHULA NAVEEN', 1, '21B91A6119', 5, 'F', 2, '75.png', '0000-00-00'),
(76, 'BALIREDDY BHAGYASRI', 1, '21B91A6120', 6, 'A', 1, '76.png', '0000-00-00'),
(77, 'BALLA YASWANTH SAI SUBRAMANYAM', 2, '21B91A6126', 3, 'E', 2, '77.png', '0000-00-00'),
(78, 'BANDARU TEJA SAI RAM', 2, '21B91A6132', 5, 'C', 2, '78.png', '0000-00-00'),
(79, 'BATHULA SANDEEP', 2, '21B91A6136', 6, 'D', 2, '79.png', '0000-00-00'),
(80, 'BATTI KARTHIK', 1, '21B91A6137', 3, 'A2', 2, '80.png', '0000-00-00'),
(81, 'BHATRAJU NAGA VIGNESH', 1, '21B91A6141', 5, 'A1', 2, '81.png', '0000-00-00'),
(82, 'BODA VEERA NAGA VENKATA SAI RA', 1, '21B91A6144', 5, 'A3', 2, '82.png', '0000-00-00'),
(83, 'BODAPATI SARAN SAI ABHI RAM', 1, '21B91A6154', 4, 'FIR1', 2, '83.png', '0000-00-00'),
(84, 'BODAPATI SUBRAHMANYAM', 2, '21B91A5708', 4, 'FIR1', 2, '84.png', '0000-00-00'),
(85, 'BODDU GIRESH', 2, '21B91A5720', 2, 'A', 2, '85.png', '0000-00-00'),
(86, 'BOLLA PRAMOD KUMAR', 3, '21B91A5722', 2, 'B', 2, '86.png', '0000-00-00'),
(87, 'BORRA MANIKANTA SWAMY', 3, '21B91A5723', 3, 'Star', 2, '87.png', '0000-00-00'),
(88, 'BOTCHA DHANUSH', 3, '22B95A5702', 3, 'AS1', 2, '88.png', '0000-00-00'),
(89, 'BUDUMURU YUGANDHAR', 3, '22B95A5703', 2, 'PG2', 2, '89.png', '0000-00-00'),
(90, 'CHAGANTI SAIRAM', 3, '22B95A5704', 3, 'A', 2, '90.png', '0000-00-00'),
(91, 'CHARISHMA DASI', 3, '21B91A6206', 4, 'B', 1, '91.png', '0000-00-00'),
(92, 'CHELLABOINA PUSHPA SAI', 3, '21B91A6207', 4, 'Star', 2, '92.png', '0000-00-00'),
(93, 'CHELLUBOINA KARTHIK', 3, '21B91A6210', 4, 'W', 2, '93.png', '0000-00-00'),
(94, 'CHIMALADINNE MAHESH', 1, '21B91A6213', 5, 'D', 2, '94.png', '0000-00-00'),
(95, 'CHIMATA NIHAL KUMAR', 1, '21B91A6215', 5, 'A', 2, '95.png', '0000-00-00'),
(96, 'CHINTA ANAND DEVADAS', 2, '21B91A6217', 5, 'F', 2, '96.png', '0000-00-00'),
(97, 'CHINTA CHIRU VENKATASATYASYAMS', 2, '21B91A6222', 6, 'A', 1, '97.png', '0000-00-00'),
(98, 'CHIRAKALA VENKATA SAI', 2, '21B91A6228', 3, 'E', 2, '98.png', '0000-00-00'),
(99, 'CHITRA DURGA BHAVANI', 1, '21B91A6234', 7, 'C', 1, '99.png', '0000-00-00'),
(100, 'CHOLLANGI SHANMUKHA VENKATA SA', 1, '21B91A6242', 8, 'D', 2, '100.png', '0000-00-00'),
(101, 'CHUKKA SUDHEER', 1, '21B91A6244', 9, 'A2', 2, '101.png', '0000-00-00'),
(102, 'DARA PAVANI', 1, '21B91A6247', 6, 'A1', 1, '102.png', '0000-00-00'),
(103, 'DASARI HARI VIKASGOWD', 2, '21B91A6257', 10, 'A3', 2, '103.png', '0000-00-00'),
(104, 'DAYAM HASINI', 2, '21B91A1214', 10, 'FIR1', 1, '104.png', '0000-00-00'),
(105, 'DEVARAPU SRI SUSHMANJALI', 3, '21B91A1222', 10, 'FIR1', 1, '105.png', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

CREATE TABLE `subscriptions` (
  `pid` varchar(15) NOT NULL,
  `stdid` varchar(5) NOT NULL,
  `delivery_partner` int(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `subscriptions`
--

INSERT INTO `subscriptions` (`pid`, `stdid`, `delivery_partner`) VALUES
('9052727402', '1', 0),
('9052740380', '19', 1),
('9052749753', '102', 1),
('9052759847', '92', 1),
('9052760568', '47', 1),
('9052772825', '64', 1),
('9052728123', '2', 2),
('9052731728', '7', 2),
('9052741101', '20', 2),
('9052750474', '103', 2),
('9052751195', '80', 2),
('9052751916', '35', 2),
('9052760568', '93', 2),
('9052761289', '48', 2),
('9052773546', '65', 2),
('9052728844', '3', 3),
('9052733891', '10', 3),
('9052734612', '11', 3),
('9052737496', '15', 3),
('9052741822', '21', 3),
('9052743985', '94', 3),
('9052746869', '98', 3),
('9052751195', '104', 3),
('9052753358', '83', 3),
('9052754079', '38', 3),
('9052754079', '84', 3),
('9052754800', '39', 3),
('9052756963', '88', 3),
('9052757684', '43', 3),
('9052762010', '49', 3),
('9052774267', '66', 3),
('9052729565', '4', 4),
('9052732449', '8', 4),
('9052738217', '16', 4),
('9052742543', '22', 4),
('9052744706', '95', 4),
('9052747590', '99', 4),
('9052751916', '81', 4),
('9052752637', '36', 4),
('9052757684', '89', 4),
('9052758405', '44', 4),
('9052762731', '50', 4),
('9052770662', '61', 4),
('9052774988', '67', 4),
('9052730286', '5', 5),
('9052733170', '9', 5),
('9052735333', '12', 5),
('9052736054', '13', 5),
('9052743264', '23', 5),
('9052743985', '24', 5),
('9052745427', '96', 5),
('9052746148', '97', 5),
('9052749753', '78', 5),
('9052750474', '33', 5),
('9052752637', '82', 5),
('9052753358', '37', 5),
('9052754800', '85', 5),
('9052755521', '40', 5),
('9052755521', '86', 5),
('9052756242', '41', 5),
('9052763452', '51', 5),
('9052764173', '52', 5),
('9052775709', '68', 5),
('9052776430', '69', 5),
('9052731007', '6', 6),
('9052736775', '14', 6),
('9052744706', '25', 6),
('9052750474', '79', 6),
('9052751195', '34', 6),
('9052756242', '87', 6),
('9052756963', '42', 6),
('9052764894', '53', 6),
('9052777151', '70', 6),
('9052739659', '18', 7),
('9052745427', '26', 7),
('9052749032', '101', 7),
('9052759126', '91', 7),
('9052759847', '46', 7),
('9052765615', '54', 7),
('9052772104', '63', 7),
('9052777872', '71', 7),
('9052738938', '17', 8),
('9052746148', '27', 8),
('9052748311', '100', 8),
('9052758405', '90', 8),
('9052759126', '45', 8),
('9052766336', '55', 8),
('9052771383', '62', 8),
('9052776430', '105', 8),
('9052778593', '72', 8),
('9052746869', '28', 9),
('9052767057', '56', 9),
('9052779314', '73', 9),
('9052746869', '74', 10),
('9052747590', '29', 10),
('9052747590', '75', 10),
('9052748311', '30', 10),
('9052748311', '76', 10),
('9052749032', '31', 10),
('9052749032', '77', 10),
('9052749753', '32', 10),
('9052767778', '57', 10),
('9052768499', '58', 10),
('9052769220', '59', 10),
('9052769941', '60', 10);

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
(1, 'Veeravalli Balu', '9010872333', '9010872333', '1', NULL, NULL),
(2, 'Sai Praveen', '9052727402', '123', '1', NULL, NULL),
(3, 'Gowtham ', '8977862329', '8977862329', '2', NULL, NULL),
(4, 'Jagadish', '9581981888', '9581981888', '1', NULL, NULL),
(5, 'Babai garu', '9010972333', '9010972333', '2', NULL, NULL),
(6, 'Chaityana', '7995876676', '7995876676', '2', NULL, NULL),
(7, 'Vamsi', '9491072143', '9491072143', '2', NULL, NULL),
(8, 'Mahesh', '9133192081', '9133192081', '2', NULL, NULL),
(9, 'Bashker', '7671000962', '7671000962', '2', NULL, NULL),
(10, 'Suresh Mudhunuri', '9866600002', '9866600002', '2', NULL, NULL);

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
(1, 2, '2023-08-19', '04:19:36', '04:20:22', '2'),
(2, 7, '2023-08-19', '04:20:53', NULL, '2'),
(3, 2, '2023-08-25', '02:40:48', '03:23:00', '2'),
(4, 7, '2023-08-25', '03:13:53', NULL, '2');

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
  MODIFY `stdid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT for table `team`
--
ALTER TABLE `team`
  MODIFY `eid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `trips`
--
ALTER TABLE `trips`
  MODIFY `tripid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
