-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 10, 2022 at 06:41 PM
-- Server version: 5.7.33
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `result-management`
--

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE `result` (
  `id` int(11) NOT NULL,
  `stud_name` varchar(20) NOT NULL,
  `stud_roll` int(20) NOT NULL,
  `stud_reg` int(11) NOT NULL,
  `sub_java` int(20) NOT NULL,
  `sub_cs` int(20) NOT NULL,
  `sub_dataSt` int(20) NOT NULL,
  `sub_webDev` int(20) NOT NULL,
  `sub_dbM` int(20) NOT NULL,
  `sub_ecomM` int(20) NOT NULL,
  `sub_softDev` int(20) NOT NULL,
  `sub_bussOrg` int(20) NOT NULL,
  `stud_grade` float NOT NULL,
  `stud_stand` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `result`
--

INSERT INTO `result` (`id`, `stud_name`, `stud_roll`, `stud_reg`, `sub_java`, `sub_cs`, `sub_dataSt`, `sub_webDev`, `sub_dbM`, `sub_ecomM`, `sub_softDev`, `sub_bussOrg`, `stud_grade`, `stud_stand`) VALUES
(10, 'Shohan Rahman', 20021, 212221, 56, 62, 51, 75, 65, 80, 63, 80, 3.5625, 'Pass'),
(12, 'Ali Hassan', 20022, 212222, 45, 40, 65, 55, 20, 20, 25, 68, 0, 'Fail');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `stud_name` varchar(20) NOT NULL,
  `stud_roll` int(20) NOT NULL,
  `stud_reg` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `stud_name`, `stud_roll`, `stud_reg`) VALUES
(13, 'Shohan Rahman', 20021, 212221),
(14, 'Ali Hassan', 20022, 212222),
(15, 'Ali Hassan', 20022, 212222);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `user_fname` varchar(10) NOT NULL,
  `user_lname` varchar(10) NOT NULL,
  `user_phone` int(12) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_pass` varchar(255) NOT NULL,
  `user_role` text NOT NULL,
  `user_status` int(20) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `user_fname`, `user_lname`, `user_phone`, `user_name`, `user_email`, `user_pass`, `user_role`, `user_status`) VALUES
(14, 'Awal', 'Bashar', 1631483563, 'bashar', 'awal@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Manager', 1),
(15, 'Marjiya ', 'Yesmin', 1771262094, 'marjiya', 'marjiya@gmail.com', '6ebe76c9fb411be97b3b0d48b791a7c9', 'Manager', 0),
(16, 'Rohan', 'Khan', 1834483563, 'rohan', 'rohan@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Staff', 0),
(17, 'Awal', 'Bashar', 1834483563, 'bashar', 'awal2@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Manager', 0),
(18, 'Johan', 'Bee', 1834483563, 'Johan', 'Johan@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Staff', 0),
(19, 'Rohan', 'Bashar', 1834483563, 'vydezebe', 'awal3@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Staff', 0),
(20, 'Monirul', 'Islam', 123, 'monir', 'monir@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Staff', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `result`
--
ALTER TABLE `result`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `result`
--
ALTER TABLE `result`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
