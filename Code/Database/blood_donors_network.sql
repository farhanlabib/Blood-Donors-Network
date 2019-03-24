-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 30, 2018 at 08:20 PM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blood donors network`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Id` int(10) NOT NULL,
  `FirstName` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `EmailID` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `PhoneNumber` varchar(50) NOT NULL,
  `BirthDate` date NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `BloodGroup` varchar(10) NOT NULL,
  `Division` varchar(50) NOT NULL,
  `District` varchar(50) NOT NULL,
  `Area` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Id`, `FirstName`, `LastName`, `EmailID`, `Password`, `PhoneNumber`, `BirthDate`, `Gender`, `BloodGroup`, `Division`, `District`, `Area`) VALUES
(8, 'admin', 'admin', 'admin@ewu.edu', '$2y$10$Vu1DUJeePm2CXAXHmK3rN.AHKDmu1yOoCeaj8lSdtWuO87bj/zVfO', '017xxxxxxxxxx', '2018-01-01', 'male', 'AB-', 'Dhaka', 'Dhaka', 'Badda'),
(9, 'admin2', 'admin2', 'admin@gmail.com', 'uRbana86', '01740127697', '1996-02-13', 'Male', 'B+', 'Dhaka', 'Dhaka', 'Merul Badda');

-- --------------------------------------------------------

--
-- Table structure for table `bloodgroup`
--

CREATE TABLE `bloodgroup` (
  `Id` int(255) NOT NULL,
  `BloodGroupName` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bloodgroup`
--

INSERT INTO `bloodgroup` (`Id`, `BloodGroupName`) VALUES
(1, 'A+'),
(2, 'A-'),
(3, 'AB+'),
(4, 'AB-'),
(5, 'O+'),
(6, 'O-'),
(7, 'B+'),
(8, 'B-');

-- --------------------------------------------------------

--
-- Table structure for table `distancevector`
--

CREATE TABLE `distancevector` (
  `Id` double NOT NULL,
  `Area1` varchar(100) NOT NULL,
  `FromDistance` double NOT NULL,
  `Area2` varchar(100) NOT NULL,
  `ToDistance` double NOT NULL,
  `PathCost` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `distancevector`
--

INSERT INTO `distancevector` (`Id`, `Area1`, `FromDistance`, `Area2`, `ToDistance`, `PathCost`) VALUES
(1, 'Badda', 0, 'Mohakhali', 0, 10),
(2, 'Khilkhet', 0, 'Uttara', 0, 5),
(3, 'Mohammadpur', 0, 'Mohakhali', 0, 19),
(4, 'Badda', 0, 'Merul Badda', 0, 5),
(5, 'Merul Badda', 0, 'Bishawroad', 0, 4),
(6, 'Khilkhet', 0, 'Rampura', 0, 19),
(11, 'Uttara', 0, 'Abdullahpur', 0, 1),
(12, 'Badda', 0, 'Malibag', 0, 10),
(13, 'Badda', 0, 'Badda', 0, 0),
(15, 'Malibag', 0, 'Malibag', 0, 0),
(16, 'Khilkhet', 0, 'Khilkhet', 0, 0),
(17, 'Merul Badda', 0, 'Badda', 0, 5),
(18, 'Merul Badda', 0, 'Merul Badda', 0, 0),
(19, 'Khilkhet', 0, 'Badda', 0, 7.4),
(20, 'Badda', 0, 'Khilkhet', 0, 7.4),
(21, 'Mohakhali', 0, 'Mohammadpur', 0, 19),
(22, 'Mohakhali', 0, 'Mohakhali', 0, 0),
(23, 'Kuril', 0, 'Kakrail', 0, 50),
(24, 'Kakrail', 0, 'Kuril', 0, 50);

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `Id` int(4) NOT NULL,
  `UserId` int(4) NOT NULL,
  `Rating` float DEFAULT NULL,
  `RatingById` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`Id`, `UserId`, `Rating`, `RatingById`) VALUES
(4, 11, 4, 2),
(5, 21, 5, 2),
(6, 5, 5, 2),
(7, 5, 4, 2),
(8, 5, 3, 2),
(9, 5, 5, 2),
(10, 5, 5, 2),
(11, 2, 5, 6),
(12, 2, 3, 6),
(13, 8, 5, 2),
(14, 5, 5, 2),
(15, 6, 5, 2),
(16, 6, 5, 2),
(17, 6, 3, 2),
(18, 5, 4, 2),
(19, 5, 5, 2),
(20, 18, 4, 2),
(21, 5, 4, 2),
(22, 5, 3, 2),
(23, 5, 5, 2),
(24, 19, 5, 23),
(25, 19, 5, 23),
(26, 19, 1, 23),
(27, 7, 3, 8),
(28, 7, 5, 26);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `Id` int(10) NOT NULL,
  `FirstName` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `EmailID` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `PhoneNumber` varchar(50) NOT NULL,
  `BirthDate` date NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `BloodGroup` varchar(10) NOT NULL,
  `Division` varchar(50) NOT NULL,
  `District` varchar(50) NOT NULL,
  `Area` varchar(50) NOT NULL,
  `Status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`Id`, `FirstName`, `LastName`, `EmailID`, `Password`, `PhoneNumber`, `BirthDate`, `Gender`, `BloodGroup`, `Division`, `District`, `Area`, `Status`) VALUES
(2, 'Jame', 'Ahmed', 'jameahmed125@yahoo.com', '$2y$10$Vu1DUJeePm2CXAXHmK3rN.AHKDmu1yOoCeaj8lSdtWuO87bj/zVfO', '01521434331', '1994-07-08', 'Male', 'O-', 'Dhaka', 'Dhaka', 'Khilkhet', 'Yes'),
(5, 'Farhan', 'Labib', 'farhanlabib72@gmail.com', '$2y$10$TfzXjMaVsIScihsKuY6nJuSNvkQK7ZKNkip3x9I3sKAn91eB9kKKW', '01740127697', '1995-01-01', 'Male', 'B+', 'Dhaka', 'Dhaka', 'Mohakhali', 'Yes'),
(6, 'Sadia', 'Afroz', 'sadia@ewu.edu', '$2y$10$u2gvAsRtNQyVNHqq3gqgZ.Vmo/88MlV53i20EwmeUvBboXVbNfClO', '017XXXXXXXXX', '1996-01-01', 'Female', 'O+', 'Dhaka', 'Dhaka', 'Malibag', 'Yes'),
(7, 'Raisul', 'Islam', 'raisul@nbmch.com', '$2y$10$pcNy5sXRDZGCNYem7UiCh.fWUtcY3aOKmubYxxSxCM74suexV8xSy', '01891964151', '1994-01-01', 'Male', 'AB+', 'Dhaka', 'Dhaka', 'Badda', 'Yes'),
(8, 'Zahangir', 'H. Shakil', 'shakil710@gmail.com', '$2y$10$vl.dmzsAO5cnSjRwlwFIC.vhCt1qLku7Z1Puf42z5LXRcOAZjaJHW', '01737899937', '1995-12-07', 'Male', 'O+', 'Dhaka', 'Dhaka', 'Badda', 'Yes'),
(11, 'Maisha', 'Haque', 'maisha@ewu.edu', '$2y$10$jcURlsOPNaC006w5Kut.COad8ASfDJ6r8x1FBX7/lF8gPk5QU9Ngy', '017XXXXXXXXX', '1995-01-01', 'Female', 'B-', 'Dhaka', 'Dhaka', 'Uttara', 'Yes'),
(12, 'Ridita', 'Islam', 'ridita@ewu.edu', '$2y$10$.PXXbb1CCsq7dlR24SqckOZL8yKQ.yjAfOT5L9ELYiD.l/VdRdCza', '017XXXXXXXXX', '1995-01-01', 'Female', 'AB-', 'Dhaka', 'Dhaka', 'Uttara', 'Yes'),
(14, 'Fa', 'Ha', 'gojamil560@gmail.com', '$2y$10$jTZTeF3EztzIi31/mCl5jOAMfKB5Sjg0sBUyXxOqM/Tq3rsQx2A/m', '01899999999', '1996-11-07', 'Male', 'A+', 'Dhaka', 'Dhaka', 'Badda', 'Yes'),
(15, 'Farhan', 'Labib', 'farhanlabibbrinto786@gmail.com', '$2y$10$ddNwLF2hDhh.bTQFfeY9KOeJkA6A5q.w7/PraT9WS9QWuOBEStt6O', '01740127697', '1994-12-07', 'Male', 'B+', 'Dhaka', 'Dhaka', 'Merul Badda', 'Yes'),
(16, 'Sajib', 'Hasan', 'sajib@ewu.edu', '$2y$10$ShaDUF6mrHbkc982sKbKz.mCoMixU7JAmlYe3utqzaTN12gFTWr8.', '017XXXXXXXXX', '1990-01-01', 'Male', 'B+', 'Dhaka', 'Dhaka', 'Merul Badda', 'Yes'),
(17, 'Momin', 'Sarker', 'mobin@gmail.com', '$2y$10$5jMCmHmIeBk6cHy4MDo8Dur7SHpRoRizCEtEASUqzFDRjXDHkzdku', '017XXXXXXXXX', '1990-01-01', 'Male', 'AB-', 'Dhaka', 'Dhaka', 'Mirpur', 'Yes'),
(18, 'Kamal', 'Hasan', 'kamal@gmail.com', '$2y$10$WUqOqHjOycyh2c/t6a9t8uH61zouLWPpsQNlugnR1vwp.AJ0NDAqC', '01', '1990-01-01', 'Male', 'A+', 'Dhaka', 'Dhaka', 'Khilkhet', 'Yes'),
(19, 'Kamal', 'Hasan', 'kamal.hasan@gmail.com', '$2y$10$zAVL3CbOZZeCm3IPpiSmXu9ir20nGAUSeKqStj7OMumcEoCA6j6ie', '01', '1990-01-01', 'Male', 'A+', 'Dhaka', 'Dhaka', 'Badda', 'Yes'),
(20, 'x', 'x', 'x@x.x', '$2y$10$1AY2J2OGqgg9Jpp/MFFZIeYrROgqjBOI8yUggRRL04RbOkVbqGqXG', '017XXXXXXXXX', '1990-01-01', 'Male', 'AB+', 'Dhaka', 'a', 'Khilkhet', 'Yes'),
(21, 'Farhan', 'Labib', 'gamu@gmail.com', '$2y$10$ccfmcxuZBnlBEAMjAt/UJ.Eujv3dslftzgUfg/003xSNKqm1y/G/C', '017XXXXXXXXX', '1986-02-20', 'Male', 'AB-', 'Dhaka', 'Dhaka', 'Merul Badda', 'Yes'),
(22, 'm', 'm', 'm@m.m', '$2y$10$kRRqjl2eNuullwhoy.VwceRtD/YODS1Nh2ZOEFR1MOvPoatgh9Cw.', 'm', '1994-01-01', 'Male', 'AB+', 'Dhaka', 'Dhaka', 'Mohakhali', 'Yes'),
(23, 'Ramisa', 'Hassan', 'ramisa810@gmail.com', '$2y$10$ePk9hLfYWbdgzWVAWVPkAuMAYLfohOf/.6GHcTRqoEmtUbM0vaMa2', '01740127697', '1996-01-04', 'Female', 'AB+', 'Dhaka', 'Dhaka', 'Dhanmondi', 'Yes'),
(24, 'Shahrier', 'Sarder', 'sha@gmail.com', 'sdhfshdj', '01826767261131', '1994-07-09', 'Male', 'A+', 'Dhaka', 'Dhaka', 'Khilkhet', 'Yes'),
(25, 'Ishtiak', 'Shovon', 'shovon@gmail.com', 'sdklhsjfb', '01723932984', '1994-07-07', 'Male', 'A+', 'Dhaka', 'Dhaka', 'Merul Badda', 'Yes'),
(26, 'Nill', 'Akash', 'whoareyou@gmail.com', '$2y$10$7MApzTatznlvcq6ednLeCe.MtxEKNa7L806uRU13O6KEob1iRCbD2', '01755669566', '1996-01-07', 'Male', 'B+', 'Dhaka', 'Dhaka', 'Khilkhet', 'Yes'),
(27, 'hh', 'hh', 'hh@gmail.com', '$2y$10$vX1xruIYMEPC2bTgRaUjU.SVkpLy23MZpvD1xFictGGlu86N.kP0i', '0155888', '1996-01-01', 'Male', 'A+', 'Dhaka', 'effee', 'Kakrail', 'Yes');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `EmailID` (`EmailID`);

--
-- Indexes for table `bloodgroup`
--
ALTER TABLE `bloodgroup`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `distancevector`
--
ALTER TABLE `distancevector`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `fk_Rating` (`UserId`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `EmailID` (`EmailID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `bloodgroup`
--
ALTER TABLE `bloodgroup`
  MODIFY `Id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `distancevector`
--
ALTER TABLE `distancevector`
  MODIFY `Id` double NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `Id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `rating`
--
ALTER TABLE `rating`
  ADD CONSTRAINT `fk_Rating` FOREIGN KEY (`UserId`) REFERENCES `user` (`Id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
