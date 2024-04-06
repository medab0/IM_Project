-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 17, 2024 at 02:58 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbbienf3`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbluseraccount`
--

CREATE TABLE `tbluseraccount` (
  `acctID` int(11) NOT NULL,
  `emailAdd` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `usertype` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbluseraccount`
--

INSERT INTO `tbluseraccount` (`acctID`, `emailAdd`, `username`, `password`, `usertype`) VALUES
(1, 'morielbien101@gmail.', 'medab', '123456', ''),
(2, 'rei@gmail.com', 'rei', '789456', ''),
(3, 'arci@gmail.com', 'arci', '456132', ''),
(4, 'hehexd@gmail.com', 'hehexd', '1234456', ''),
(5, 'gege@gmail.com', 'gege', '123', ''),
(6, 'deeznuts@gmail.com', 'dn', '123', ''),
(7, 'janedoe42@gmail.com', 'jane42', 'Jane42', ''),
(8, 'janky@gmail.com', 'janky69', 'Kiyo690', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbluserprofile`
--

CREATE TABLE `tbluserprofile` (
  `userID` int(11) NOT NULL COMMENT 'User''s ID',
  `firstName` varchar(20) NOT NULL COMMENT 'User''s first name',
  `lastName` varchar(20) NOT NULL COMMENT 'User''s last name',
  `gender` varchar(10) NOT NULL COMMENT 'User''s Gender',
  `birthDate` date NOT NULL COMMENT 'User''s date of birth'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbluserprofile`
--

INSERT INTO `tbluserprofile` (`userID`, `firstName`, `lastName`, `gender`, `birthDate`) VALUES
(1, 'Moriel', 'Bien', 'male', '0000-00-00'),
(2, 'rei', 'dael', 'male', '0000-00-00'),
(3, 'arci', 'dael', 'female', '0000-00-00'),
(4, 'hehe', 'xd', 'Others', '0000-00-00'),
(5, 'gege', 'nc', 'Male', '0000-00-00'),
(6, 'deez', 'nuts', '', '0000-00-00'),
(7, 'Jane', 'Doe', 'Female', '0000-00-00'),
(8, 'Jane', 'Kyono', 'Female', '0000-00-00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbluseraccount`
--
ALTER TABLE `tbluseraccount`
  ADD PRIMARY KEY (`acctID`);

--
-- Indexes for table `tbluserprofile`
--
ALTER TABLE `tbluserprofile`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbluseraccount`
--
ALTER TABLE `tbluseraccount`
  MODIFY `acctID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbluserprofile`
--
ALTER TABLE `tbluserprofile`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'User''s ID', AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
