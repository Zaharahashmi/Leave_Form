-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2023 at 07:30 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `form`
--

-- --------------------------------------------------------

--
-- Table structure for table `sub`
--

CREATE TABLE `sub` (
  `name` varchar(100) NOT NULL,
  `roll_no` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `reason` varchar(200) NOT NULL,
  `status` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_danish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sub`
--

INSERT INTO `sub` (`name`, `roll_no`, `email`, `start_date`, `end_date`, `reason`, `status`) VALUES
('abirame', '21cse001', '21cse001.abirames@gmail.com', '2023-04-28', '2023-04-30', 'attend function', 'Approved'),
('lakshmi shri', '21cse018', '21cse018.lakshmishri@gmail.com', '2023-04-21', '2023-04-27', 'going to temple', 'Approved'),
('subhashree', '21cse030', '21cse030subhashree@gmail.com', '2023-06-05', '2023-06-09', 'brothers marriage', ''),
('sudha', '21cse031', '21cse031sudharshini@gmail.com', '2023-04-22', '2023-04-30', 'function', 'Approved'),
('zahara', '21cse033', '21cse033zaharahashmi@gmail.com', '2023-04-30', '2023-05-03', 'to attend brother marriage', 'Approved'),
('sss', '21cse055', 'saranyageetha09@gmail.com', '2023-02-22', '2023-02-24', 'cold', 'Approved');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sub`
--
ALTER TABLE `sub`
  ADD PRIMARY KEY (`roll_no`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
