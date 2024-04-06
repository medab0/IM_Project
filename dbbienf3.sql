-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 06, 2024 at 08:43 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

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
-- Table structure for table `tblcoffee`
--

CREATE TABLE `tblcoffee` (
  `Coffee_ID` int(6) NOT NULL,
  `Coffee_Name` varchar(50) NOT NULL,
  `Description` varchar(50) NOT NULL,
  `Roast_Level` varchar(50) NOT NULL,
  `Price_Per_Bag` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tblorder`
--

CREATE TABLE `tblorder` (
  `Order_ID` int(6) NOT NULL,
  `Customer_ID` int(6) NOT NULL,
  `Plan_ID` int(6) NOT NULL,
  `Quantity` int(6) NOT NULL,
  `Total_Price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tblsubscriptionplan`
--

CREATE TABLE `tblsubscriptionplan` (
  `Plan_ID` int(6) NOT NULL,
  `Plan_Name` varchar(50) NOT NULL,
  `Coffee_ID` int(6) NOT NULL,
  `Description` varchar(50) NOT NULL,
  `Price_Per_Month` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbluseraccount`
--

CREATE TABLE `tbluseraccount` (
  `acctID` int(6) NOT NULL,
  `emailAdd` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `Subscription_Plan` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbluseraccount`
--

INSERT INTO `tbluseraccount` (`acctID`, `emailAdd`, `username`, `password`, `Subscription_Plan`) VALUES
(1, 'morielbien101@gmail.', 'medab', '123456', 0),
(2, 'johndoe@gmail.com', 'johndoe', '789456', 0),
(3, 'dael@gmail.com', 'arci', '456132', 0),
(4, 'hehexd@gmail.com', 'hehexd', '1234456', 0),
(5, 'gausse@gmail.com', 'el', '123', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbluserprofile`
--

CREATE TABLE `tbluserprofile` (
  `userID` int(6) NOT NULL COMMENT 'User''s ID',
  `firstName` varchar(20) NOT NULL COMMENT 'User''s first name',
  `lastName` varchar(20) NOT NULL COMMENT 'User''s last name',
  `gender` varchar(10) NOT NULL COMMENT 'User''s Gender',
  `birthDate` date NOT NULL COMMENT 'User''s date of birth'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbluserprofile`
--

INSERT INTO `tbluserprofile` (`userID`, `firstName`, `lastName`, `gender`, `birthDate`) VALUES
(1, 'Moriel', 'Bien', 'on', '0000-00-00'),
(2, 'John', 'Doe', 'on', '0000-00-00'),
(3, 'arci', 'dael', 'male', '0000-00-00'),
(4, 'hehe', 'xd', 'Others', '0000-00-00'),
(5, 'el', 'belleza', 'Others', '0000-00-00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblcoffee`
--
ALTER TABLE `tblcoffee`
  ADD PRIMARY KEY (`Coffee_ID`);

--
-- Indexes for table `tblorder`
--
ALTER TABLE `tblorder`
  ADD PRIMARY KEY (`Order_ID`);

--
-- Indexes for table `tblsubscriptionplan`
--
ALTER TABLE `tblsubscriptionplan`
  ADD PRIMARY KEY (`Plan_ID`);

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
-- AUTO_INCREMENT for table `tblcoffee`
--
ALTER TABLE `tblcoffee`
  MODIFY `Coffee_ID` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblorder`
--
ALTER TABLE `tblorder`
  MODIFY `Order_ID` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblsubscriptionplan`
--
ALTER TABLE `tblsubscriptionplan`
  MODIFY `Plan_ID` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbluseraccount`
--
ALTER TABLE `tbluseraccount`
  MODIFY `acctID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbluserprofile`
--
ALTER TABLE `tbluserprofile`
  MODIFY `userID` int(6) NOT NULL AUTO_INCREMENT COMMENT 'User''s ID', AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
