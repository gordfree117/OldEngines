-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 05, 2019 at 02:22 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 5.6.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `old_engines`
--

-- --------------------------------------------------------

--
-- Table structure for table `engines`
--

CREATE TABLE `engines` (
  `engineID` int(11) NOT NULL,
  `title` varchar(64) NOT NULL,
  `description` text,
  `year` int(11) DEFAULT NULL,
  `manufacturer` varchar(30) DEFAULT NULL,
  `modelNumber` varchar(30) DEFAULT NULL,
  `volume` varchar(10) DEFAULT NULL,
  `weight` varchar(10) DEFAULT NULL,
  `mileage` int(11) DEFAULT NULL,
  `cylinderConfig` varchar(10) DEFAULT NULL,
  `torque` varchar(10) DEFAULT NULL,
  `horsepower` varchar(10) DEFAULT NULL,
  `city` varchar(30) NOT NULL,
  `state` varchar(30) NOT NULL,
  `zipCode` varchar(12) NOT NULL,
  `fuelType` varchar(20) DEFAULT NULL,
  `OEM` int(11) DEFAULT '0',
  `Price` decimal(18,2) NOT NULL,
  `userID` int(11) NOT NULL,
  `dateListed` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `category` varchar(30) NOT NULL DEFAULT 'other',
  `imagePath` varchar(64) DEFAULT NULL,
  `imagePathThumb` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `engines`
--

INSERT INTO `engines` (`engineID`, `title`, `description`, `year`, `manufacturer`, `modelNumber`, `volume`, `weight`, `mileage`, `cylinderConfig`, `torque`, `horsepower`, `city`, `state`, `zipCode`, `fuelType`, `OEM`, `Price`, `userID`, `dateListed`, `category`, `imagePath`, `imagePathThumb`) VALUES
(41, '2001 Camry Engine', 'I bought a Camry but never used it. Them someone stole it and smeared food all over the inside, so I\'m scrapping it.', 2001, 'Toyota', 'TC67a', '', '', 0, '', '', '', 'Tel Aviv', 'MT', '74523', '', 0, '800.00', 21, '2019-04-17 13:18:56', 'Cars', 'uploads/Rumbler43/2.jpg', 'uploads/Rumbler43/2thumb.jpg'),
(42, 'Liberty ', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 2011, 'Jeep', '318', '6.1', '250', 14, 'v8', '78', '5', 'University Park', 'CT', '16802-1200', 'Gasoline', 2, '450.00', 21, '2019-04-17 20:30:31', 'Cars', 'uploads/Rumbler43/4.jpg', 'uploads/Rumbler43/4thumb.jpg'),
(43, 'bill\'s optima', 'kia kia kia kia', 2000, 'kia', 'kia', '', '', 0, '', '', '', 'drugs town', 'ID', '90210', '', 0, '69.00', 24, '2019-04-18 01:35:12', 'Cars', 'uploads/bill40/0.pdf', 'uploads/bill40/0thumb.jpg'),
(44, 'bill\'s moped', 'i\'m a dumb blonde selling my moped engine. no spam. no tire kickerz', 2019, 'blonde', '', '9173645967', 'heavy', 9, '', '', '156', 'lid', 'KS', '33322', '', 0, '420420.54', 24, '2019-04-18 01:41:21', 'Handheld Appliances', 'uploads/bill40/1.', ''),
(45, 'camryengine Bill', '', 2018, 'toyota', '', '', '', 0, '', '', '', 'f', 'DE', '90084', '', 0, '0.00', 24, '2019-04-18 01:44:46', 'Cars', 'uploads/bill40/1.', ''),
(46, 'boats != fun', 'looking to sell this boat for some pepto bismol', 2011, 'boston whaler', '', '69', '69', 0, '92', '1', '1', 'pgh', 'PA', '15212', 'Jet Fuel', 0, '9.00', 23, '2019-04-18 01:52:03', 'Trucks', 'uploads/jmnussbaum/0.', ''),
(47, 'cessna 172', 'Cessna aircraft engine. Engine was taken off a cessna 172 after the plane had a turbulent takeoff, causing damage to the tail which totalled the aircraft. Might also fit on a Cessna 182 plane. Cesssnas are cool and I like Cessnas and flying drives the economy cuz i\'m a boss rock on God bless America. My favorite song is \"Ultimate Sin\" by Ozzy Osbourne. Cash sale only. No checks. No money order. No trades. No tire kickers. No loitering. No solicitors. I\'m on the do not call list so I\'ll sue if you try to call me.', 1972, 'cessna', '', '', '', 0, '', '', '', 'butler', 'PA', '16002', '', 0, '3210.00', 25, '2019-04-18 02:00:07', 'Aircraft', 'uploads/greenlight/0.exe', 'uploads/greenlight/0thumb.jpg'),
(48, 'john\'s toro', 'small engine for a red toro lawn mower', 2019, 'toro', '666', '', '', 0, '', '', '', 'warrendale', 'PA', '12345', '', 0, '0.00', 25, '2019-04-18 02:06:03', 'Lawn Mowers', 'uploads/greenlight/1.', ''),
(49, 'john\'s toro', 'small engine for a red toro lawn mower', 2019, 'toro', '666', '', '', 0, '', '', '', 'warrendale', 'PA', '12345', '', 0, '555555.00', 25, '2019-04-18 02:06:38', 'Lawn Mowers', 'uploads/greenlight/1.', ''),
(50, 'ford bronco 2', 'bronco is red. I wanted a blue one. ', 1985, 'ford', 'bronco', '', '', 0, '', '', '', 'cranberry', 'OH', '12333', '', 0, '-998.00', 25, '2019-04-18 02:09:22', 'Trucks', 'uploads/greenlight/1.png', 'uploads/greenlight/1thumb.jpg'),
(55, 'F-150 Engine', 'This engine pulled weight twice its rating. ', 2007, 'Ford', '345', '', '', 0, '', '', '', 'Seattle', 'WA', '56345', '', 0, '700.00', 26, '2019-04-25 14:57:14', 'Trucks', 'uploads/Trucker145/8.jpg', 'uploads/Trucker145/8thumb.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `phones`
--

CREATE TABLE `phones` (
  `userID` int(11) NOT NULL,
  `phone1` varchar(20) NOT NULL,
  `phone2` varchar(20) NOT NULL,
  `phone3` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `FName` varchar(30) NOT NULL,
  `LName` varchar(30) NOT NULL,
  `Phone1` varchar(20) NOT NULL,
  `dateJoined` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `username`, `password`, `email`, `FName`, `LName`, `Phone1`, `dateJoined`) VALUES
(21, 'Rumbler43', '$2y$10$Z.mDTkL4gT/bd3OsuoRQ8umiIPphvFIhspb14OwxhMFEhFIsnrKZm', 'rumble@fish.com', 'Dorkus', 'Duckworth', '412-546-7634', '2019-04-17 11:56:46'),
(22, 'Leysams2016', '$2y$10$Cu7VkPZiQ6er6qqyYeALJ.ozQ23my.EOW5meWlUWwzHhn/oxCypHG', 'Leysams2016@gmail.com', 'Leyland', 'Sams', '878-543-8765', '2019-04-17 20:46:56'),
(23, 'jmnussbaum', '$2y$10$shhCCmcNfSDyU2QgSBGcOOUxN3zQnBABugAou0yVEOOE99kUQ2mey', 'jmnussbaum@outlook.com', '', '', '654-876-5362', '2019-04-18 01:28:00'),
(24, 'bill40', '$2y$10$gOZxVhyoI2T.37pT.1hid.g/JZIyJTwalJUUq9HE3DuA0zTfTueo.', 'bill40@aol.com', '', '', '654-876-7765', '2019-04-18 01:32:31'),
(25, 'greenlight', '$2y$10$4f3xMTJlcWcFgYj6lvm8o.zhAzcvtME2dL/DdVb8A2mRRXT27Mo3y', 'piss@shit.com', '', '', '724-765-9876', '2019-04-18 01:55:16'),
(26, 'Trucker145', '$2y$10$HpBMhnWTKWrecf62GlMZ5utMb.PIfhO8yxBC.Y9bvAN2hSFczWMxi', 'email@password.com', '', '', '724-768-9876', '2019-04-25 14:54:36');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `engines`
--
ALTER TABLE `engines`
  ADD PRIMARY KEY (`engineID`);
ALTER TABLE `engines` ADD FULLTEXT KEY `title` (`title`);
ALTER TABLE `engines` ADD FULLTEXT KEY `manufacturer` (`manufacturer`);
ALTER TABLE `engines` ADD FULLTEXT KEY `description` (`description`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `engines`
--
ALTER TABLE `engines`
  MODIFY `engineID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
