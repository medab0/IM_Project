-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 20, 2024 at 09:03 AM
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


-- Table structure for table `tbluseraccount`
CREATE TABLE `tbluseraccount` (
  `acctID` int(6) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `emailAdd` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL  
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


-- Table structure for table `tbluserprofile`
CREATE TABLE `tbluserprofile` (
  `userID` int(6) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `acctID` INT,
  `firstName` varchar(20) NOT NULL,
  `lastName` varchar(20) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `birthDate` date NOT NULL,
  FOREIGN KEY (`acctID`) REFERENCES `tbluseraccount`(`acctID`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


-- Table structure for table `tblsubscription`
CREATE TABLE `tblsubscription` (
  `subscription_ID` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `account_ID` INT,
  `plan_ID` INT,
  FOREIGN KEY (`account_ID`) REFERENCES `tbluseraccount`(`acctID`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


-- Table structure for table `tblorder`
CREATE TABLE `tblorder` (
  `Order_ID` int(6) NOT NULL  AUTO_INCREMENT PRIMARY KEY,
  `Customer_ID` int(6) NOT NULL,
  `Coffee_ID` int(6) NOT NULL,
  `Quantity` int(6) NOT NULL,
  `Total_Price` float NOT NULL,
  FOREIGN KEY (`Customer_ID`) REFERENCES `tbluseraccount`(`acctID`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


-- Table structure for table `tblsubscriptionplan`
CREATE TABLE `tblsubscriptionplan` (
  `Plan_ID` int(6) NOT NULL PRIMARY KEY,
  `Plan_Name` varchar(50) NOT NULL,
  `Coffee_ID` int(6) NOT NULL,
  `Description` varchar(50) NOT NULL,
  `Price_Per_Month` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `tblsubscriptionplan` (`Plan_ID`, `Plan_Name`, `Coffee_ID`, `Description`, `Price_Per_Month`) VALUES
(1, 'Light Roast Club', 0, 'Monthly delivery of light roast coffee beans.', 25.16),
(2, 'Medium Roast Club', 0, 'Monthly delivery of medium roast coffee beans', 16),
(3, 'Dark Roast Club', 0, 'Monthly delivery of dark roast coffee beans', 20);

-- Table structure for table `tblcoffee`
CREATE TABLE `tblcoffee` (
  `Coffee_ID` int(6) NOT NULL PRIMARY KEY,
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
