-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 18, 2021 at 04:16 AM
-- Server version: 10.1.39-MariaDB
-- PHP Version: 7.1.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hikers project`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `ID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `productID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`ID`, `userID`, `productID`) VALUES
(19, 9, 2),
(20, 9, 3),
(21, 9, 1),
(23, 3, 2),
(24, 3, 5),
(25, 3, 8);

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `ID` int(10) NOT NULL,
  `description` text NOT NULL,
  `name` varchar(30) NOT NULL,
  `location` varchar(20) NOT NULL,
  `memberNo` int(11) NOT NULL,
  `rating` int(10) NOT NULL,
  `imgName` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`ID`, `description`, `name`, `location`, `memberNo`, `rating`, `imgName`) VALUES
(1, 'good group', 'A group', 'egypt', 0, 5, 'layout/photos/group1.jpg'),
(2, 'good group...', 'B group', 'los angeles', 0, 2, 'Familie_Wandern_2020-saalbach.com, Mia Knoll (11).jpg'),
(3, 'good group', 'C group', 'canada', 0, 3, '3.jpg'),
(4, '', 'E group', 'uk', 0, 3, '3.jpg'),
(5, 'good group', 'G group', 'india', 0, 2, '3.jpg'),
(6, 'good group', 'D group', 'usa', 0, 5, '3.jpg'),
(8, '', 'test', 'test', 0, 1, '3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `groups_rating`
--

CREATE TABLE `groups_rating` (
  `groupID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `comment` text NOT NULL,
  `unique` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `groups_rating`
--

INSERT INTO `groups_rating` (`groupID`, `userID`, `rating`, `comment`, `unique`) VALUES
(1, 3, 5, '', 1),
(2, 3, 2, 'bad', 7),
(3, 3, 1, 'k', 8),
(4, 3, 5, '', 14),
(6, 9, 5, 'aaa', 17),
(1, 9, 2, 'bad', 18);

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `ID` int(11) NOT NULL,
  `groupID` int(11) NOT NULL,
  `userID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`ID`, `groupID`, `userID`) VALUES
(17, 1, 9),
(19, 3, 3),
(9, 6, 9),
(20, 8, 3);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `ID` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(250) NOT NULL,
  `price` float NOT NULL,
  `imgName` varchar(200) NOT NULL,
  `category` varchar(20) NOT NULL,
  `rating` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`ID`, `name`, `description`, `price`, `imgName`, `category`, `rating`) VALUES
(1, 'bag', 'comfyy', 300, '', 'x', 4),
(2, 'gloves', 'unisex', 200, '', 'z', 5),
(3, 'bandage', '100% cotton', 50, '', 'medical', 5),
(4, 'shoes', 'unisex', 500, '', 'fashion', 1),
(5, 'hhhhhhh', 'aaaaaaaa', 200, 'LJPS4454.JPG', 'grg', 1),
(6, 'begz', 'hhyyh', 200, 'IMG_5657.JPG', 'gvg', 0),
(7, 'hbd', 'hbd', 0, 'IMG_5659.JPG', 'hbd', 0),
(8, 'dw', 'c', 78, 'IMG_5655.JPG', 'cw', 0);

-- --------------------------------------------------------

--
-- Table structure for table `rating_system`
--

CREATE TABLE `rating_system` (
  `ID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `productID` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rating_system`
--

INSERT INTO `rating_system` (`ID`, `userID`, `productID`, `rating`, `comment`) VALUES
(1, 9, 5, 5, ''),
(2, 3, 5, 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `trips`
--

CREATE TABLE `trips` (
  `ID` int(11) NOT NULL,
  `location` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `fees` float NOT NULL,
  `tripImg` varchar(100) NOT NULL,
  `distance` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trips`
--

INSERT INTO `trips` (`ID`, `location`, `description`, `fees`, `tripImg`, `distance`) VALUES
(2, 'Oregon Ridge Park', 'Start from the parking lot and hike toward the Nature Center, then cross the bridge and turn right ohhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh', 1500, '', 3.5),
(3, 'Mount Wire via George\'s Hollow', 'This is a steep, sometimes rocky hike that is easily accessed from the campus at the University of U', 2000, '', 50);

-- --------------------------------------------------------

--
-- Table structure for table `tripuser`
--

CREATE TABLE `tripuser` (
  `ID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `tripID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tripuser`
--

INSERT INTO `tripuser` (`ID`, `userID`, `tripID`) VALUES
(1, 9, 2),
(2, 3, 2),
(3, 3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(10) NOT NULL,
  `username` varchar(20) NOT NULL,
  `age` int(5) NOT NULL,
  `Email` varchar(40) NOT NULL,
  `password` varchar(20) NOT NULL,
  `type` varchar(10) NOT NULL,
  `profilePic` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `username`, `age`, `Email`, `password`, `type`, `profilePic`) VALUES
(3, 'admin', 20, 'a', '123', 'hiker', 'IMG_5673.JPG'),
(9, 'z', 0, 'z', '1', 'admin', 'group1.jpg'),
(22, 'mahmoud', 21, 'mahmoud282@live.com', '123', 'admin', ''),
(23, 'anas', 21, 'anas@gmail.com', '1', 'hiker', ''),
(29, 'b', 2021, 'p', '123', 'hiker', ''),
(34, '', 0, '', '', '', 'IMG_5658.JPG');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `uID` (`userID`),
  ADD KEY `pID` (`productID`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `groups_rating`
--
ALTER TABLE `groups_rating`
  ADD UNIQUE KEY `un` (`unique`),
  ADD KEY `gID` (`groupID`),
  ADD KEY `uID` (`userID`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `groupID` (`groupID`,`userID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `rating_system`
--
ALTER TABLE `rating_system`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `uid` (`userID`),
  ADD KEY `pid` (`productID`);

--
-- Indexes for table `trips`
--
ALTER TABLE `trips`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tripuser`
--
ALTER TABLE `tripuser`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `uid` (`userID`),
  ADD KEY `tid` (`tripID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `groups_rating`
--
ALTER TABLE `groups_rating`
  MODIFY `unique` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `rating_system`
--
ALTER TABLE `rating_system`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `trips`
--
ALTER TABLE `trips`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tripuser`
--
ALTER TABLE `tripuser`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`productID`) REFERENCES `products` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`userID`) REFERENCES `users` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `groups_rating`
--
ALTER TABLE `groups_rating`
  ADD CONSTRAINT `groups_rating_ibfk_1` FOREIGN KEY (`groupID`) REFERENCES `groups` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `groups_rating_ibfk_2` FOREIGN KEY (`userID`) REFERENCES `users` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `members`
--
ALTER TABLE `members`
  ADD CONSTRAINT `members_ibfk_1` FOREIGN KEY (`groupID`) REFERENCES `groups` (`ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `members_ibfk_2` FOREIGN KEY (`userID`) REFERENCES `users` (`ID`) ON DELETE CASCADE;

--
-- Constraints for table `rating_system`
--
ALTER TABLE `rating_system`
  ADD CONSTRAINT `rating_system_ibfk_1` FOREIGN KEY (`productID`) REFERENCES `products` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rating_system_ibfk_2` FOREIGN KEY (`userID`) REFERENCES `users` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tripuser`
--
ALTER TABLE `tripuser`
  ADD CONSTRAINT `tripuser_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tripuser_ibfk_2` FOREIGN KEY (`tripID`) REFERENCES `trips` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
