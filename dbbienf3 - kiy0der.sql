-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 14, 2024 at 05:04 AM
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
-- Table structure for table `tblcoffee`
--

CREATE TABLE `tblcoffee` (
  `Coffee_ID` int(6) NOT NULL,
  `Coffee_Name` varchar(50) NOT NULL,
  `Description` varchar(50) NOT NULL,
  `Best_Use` varchar(50) NOT NULL,
  `Roast_Level` varchar(50) NOT NULL,
  `Price_Per_Bag` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblcoffee`
--

INSERT INTO `tblcoffee` (`Coffee_ID`, `Coffee_Name`, `Description`, `Best_Use`, `Roast_Level`, `Price_Per_Bag`) VALUES
(1, 'ARABICA - Light', 'Variable – distinctly not bitter', 'Brewed coffee', 'Light Roast', 25.16),
(2, 'ARABICA - Medium', 'Variable – distinctly not bitter', 'Brewed coffee', 'Medium Roast', 25.16),
(3, 'ARABICA - Dark', 'Variable – distinctly not bitter', 'Brewed coffee', 'Dark Roast', 25.16),
(4, 'ROBUSTA - Light', 'Bitter – woody or nutty', 'Coffee blends and espresso', 'Light Roast', 16),
(5, 'ROBUSTA - Medium', 'Bitter – woody or nutty', 'Coffee blends and espresso', 'Medium Roast', 16),
(6, 'ROBUSTA - Dark', 'Bitter – woody or nutty', 'Coffee blends and espresso', 'Dark Roast', 16),
(7, 'EXCELSA - Light', 'Complex – tart, fruity and dark', 'Brewed coffee and blends', 'Light Roast', 20),
(8, 'EXCELSA - Medium', 'Complex – tart, fruity and dark', 'Brewed coffee and blends', 'Medium Roast', 20),
(9, 'EXCELSA - Dark', 'Complex – tart, fruity and dark', 'Brewed coffee and blends', 'Dark Roast', 20),
(10, 'LIBERICA - Light', 'Unusual – nutty and woody', 'Brewed coffee and desserts', 'Light Roast', 20),
(11, 'LIBERICA - Medium', 'Unusual – nutty and woody', 'Brewed coffee and desserts', 'Medium Roast', 20),
(12, 'LIBERICA - Dark', 'Unusual – nutty and woody', 'Brewed coffee and desserts', 'Dark Roast', 20);

-- --------------------------------------------------------

--
-- Table structure for table `tblorder`
--

CREATE TABLE `tblorder` (
  `Order_ID` int(6) NOT NULL,
  `Customer_ID` int(6) NOT NULL,
  `Coffee_ID` int(6) NOT NULL,
  `Quantity` int(6) NOT NULL,
  `Total_Price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tblsubscription`
--

CREATE TABLE `tblsubscription` (
  `subscription_ID` int(11) NOT NULL,
  `account_ID` int(11) DEFAULT NULL,
  `plan_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblsubscription`
--

INSERT INTO `tblsubscription` (`subscription_ID`, `account_ID`, `plan_ID`) VALUES
(1, 1, 1),
(2, 2, 1), 
(3, 3, 2), 
(4, 4, 3), 
(5, 5, 1),
(6, 6, 3), 
(7, 7, 1), 
(8, 8, 2), 
(9, 9, 3), 
(10, 10, 1),
(11, 11, 2), 
(12, 12, 3), 
(13, 13, 1),
(14, 14, 2), 
(15, 15, 3); 

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

--
-- Dumping data for table `tblsubscriptionplan`
--

INSERT INTO `tblsubscriptionplan` (`Plan_ID`, `Plan_Name`, `Coffee_ID`, `Description`, `Price_Per_Month`) VALUES
(1, 'Light Roast Club', 0, 'Monthly delivery of light roast coffee beans.', 25.16),
(2, 'Medium Roast Club', 0, 'Monthly delivery of medium roast coffee beans', 16),
(3, 'Dark Roast Club', 0, 'Monthly delivery of dark roast coffee beans', 20);

-- --------------------------------------------------------

--
-- Table structure for table `tbluseraccount`
--

CREATE TABLE `tbluseraccount` (
  `acctID` int(6) NOT NULL,
  `emailAdd` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `is_deleted` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbluseraccount`
--

INSERT INTO `tbluseraccount` (`acctID`, `emailAdd`, `username`, `password`, `is_deleted`) VALUES
(1, 'kiyokun@email.com', 'kiyo', '123', 1),
(2, 'elisabeth@email.com', 'ellie', '123', 0), 
(3, 'daniel@email.com', 'danny', '123', 0), 
(4, 'sophia@email.com', 'sophie', '123', 0), 
(5, 'michael@email.com', 'mike', '123', 0),
(6, 'jennifer@email.com', 'jen', '123', 0), 
(7, 'amanda@email.com', 'mandy', '123', 0), 
(8, 'nathan@email.com', 'nate', '123', 0), 
(9, 'catherine@email.com', 'cat', '123', 0),
(10, 'jonathan@email.com', 'jon', '123', 0),
(11, 'phoebe@email.com', 'pheeb', '123', 0),
(12, 'elliot@email.com', 'eli', '123', 0),
(13, 'samuel@email.com', 'sam', '123', 0),
(14, 'grace@email.com', 'gracie', '123', 0),
(15, 'alfred@email.com', 'alf', '123', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbluserprofile`
--

CREATE TABLE `tbluserprofile` (
  `userID` int(6) NOT NULL,
  `acctID` int(11) DEFAULT NULL,
  `firstName` varchar(20) NOT NULL,
  `lastName` varchar(20) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `birthDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbluserprofile`
--

INSERT INTO `tbluserprofile` (`userID`, `acctID`, `firstName`, `lastName`, `gender`, `birthDate`) VALUES
(1, 1, 'kiyo', 'kiyono', 'male', '2001-06-20'),
(2, 2, 'Elisabeth', 'Hamilton', 'female', '1990-05-12'),
(3, 3, 'Daniel', 'Parker', 'male', '1987-09-17'),
(4, 4, 'Sophia', 'Lopez', 'female', '1995-01-23'),
(5, 5, 'Michael', 'Smith', 'male', '1984-11-05'),
(6, 6, 'Jennifer', 'Garnett', 'female', '1990-01-21'),
(7, 7, 'Amanda', 'Peterson', 'female', '1986-05-14'),
(8, 8, 'Nathan', 'Scott', 'male', '1989-09-02'),
(9, 9, 'Catherine', 'Hunt', 'female', '1985-03-16'),
(10, 10, 'Jonathan', 'Stewart', 'male', '1991-09-07'),
(11, 11, 'Phoebe', 'Perry', 'female', '1987-11-30'),
(12, 12, 'Elliot', 'Moore', 'male', '1992-01-31'),
(13, 13, 'Samuel', 'Ross', 'male', '1990-04-19'),
(14, 14, 'Grace', 'Hayes', 'female', '1986-08-25'),
(15, 15, 'Alfred', 'Bradley', 'male', '1991-05-10');

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
  ADD PRIMARY KEY (`Order_ID`),
  ADD KEY `Customer_ID` (`Customer_ID`);

--
-- Indexes for table `tblsubscription`
--
ALTER TABLE `tblsubscription`
  ADD PRIMARY KEY (`subscription_ID`),
  ADD KEY `account_ID` (`account_ID`);

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
  ADD PRIMARY KEY (`userID`),
  ADD KEY `acctID` (`acctID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblorder`
--
ALTER TABLE `tblorder`
  MODIFY `Order_ID` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblsubscription`
--
ALTER TABLE `tblsubscription`
  MODIFY `subscription_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbluseraccount`
--
ALTER TABLE `tbluseraccount`
  MODIFY `acctID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbluserprofile`
--
ALTER TABLE `tbluserprofile`
  MODIFY `userID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tblorder`
--
ALTER TABLE `tblorder`
  ADD CONSTRAINT `tblorder_ibfk_1` FOREIGN KEY (`Customer_ID`) REFERENCES `tbluseraccount` (`acctID`);

--
-- Constraints for table `tblsubscription`
--
ALTER TABLE `tblsubscription`
  ADD CONSTRAINT `tblsubscription_ibfk_1` FOREIGN KEY (`account_ID`) REFERENCES `tbluseraccount` (`acctID`);

--
-- Constraints for table `tbluserprofile`
--
ALTER TABLE `tbluserprofile`
  ADD CONSTRAINT `tbluserprofile_ibfk_1` FOREIGN KEY (`acctID`) REFERENCES `tbluseraccount` (`acctID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
