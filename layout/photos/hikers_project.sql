-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 25, 2021 at 10:28 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `userID` int(11) NOT NULL,
  `fullname` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `city` varchar(10) NOT NULL,
  `address` varchar(50) NOT NULL,
  `street` varchar(30) NOT NULL,
  `building` int(11) NOT NULL,
  `floor` int(11) NOT NULL,
  `orderID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`userID`, `fullname`, `email`, `phone`, `city`, `address`, `street`, `building`, `floor`, `orderID`) VALUES
(9, 'kareem hesham elantably', 'z', '01025649950', 'cairo', '1st settlement banafseg 9 villa 138', 'التجمع الاول البنفسج ٩ فيلا ١٣', 138, 4, 2),
(9, 'kareem hesham elantably', 'kelantably@yahoo.com', '01025649950', 'cairo', '1st settlement banafseg 9 villa 138', 'التجمع الاول البنفسج ٩ فيلا ١٣', 138, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `ID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `productID` int(11) NOT NULL,
  `quantity` int(2) NOT NULL,
  `sum` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`ID`, `userID`, `productID`, `quantity`, `sum`) VALUES
(54, 9, 1, 1, 300),
(55, 9, 2, 1, 300);

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
(15, 'our group aims to achive a great number of hikings and make a great comunity and a freindly one', 'Hiking lovers', 'canada', 0, 0, '1399005.jpg'),
(16, 'we love hiking very much and we seek to accomplish great prizes from it', 'legandary hikers', 'los angeles', 0, 0, '3.jpg');

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

-- --------------------------------------------------------

--
-- Table structure for table `investigation`
--

CREATE TABLE `investigation` (
  `auditorID` int(11) NOT NULL,
  `adminID` int(11) NOT NULL,
  `adName` varchar(20) NOT NULL,
  `Description` text NOT NULL,
  `approval` int(11) NOT NULL,
  `ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `investigation`
--

INSERT INTO `investigation` (`auditorID`, `adminID`, `adName`, `Description`, `approval`, `ID`) VALUES
(36, 22, 'zo3', 'Description', 1, 1),
(37, 23, 'anas', 'gamed bzyadaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaabb', 0, 10),
(37, 22, 'zo3', '', 0, 11),
(37, 23, 'anas', 'gamed bzyadaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaabb', 0, 12),
(37, 22, 'zo3', '', 0, 13),
(22, 23, 'anas', '', 0, 14),
(22, 22, 'zo3', '', 0, 15),
(22, 38, 'ahmed', 'gamed bzyadaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaabb', 0, 16),
(22, 22, 'zo3', '', 0, 17),
(36, 22, 'zo3', 'eeeeee', 1, 18);

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
(41, 15, 9);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `name` varchar(10) NOT NULL,
  `hikerID` int(11) NOT NULL,
  `subject` text NOT NULL,
  `message` text NOT NULL,
  `adminID` int(11) NOT NULL,
  `time` datetime NOT NULL,
  `ID` int(11) NOT NULL,
  `status` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`name`, `hikerID`, `subject`, `message`, `adminID`, `time`, `ID`, `status`) VALUES
('kareem', 9, 'ssss', 'tmam1', 0, '2021-02-19 14:41:01', 1, 'seen'),
('kareem', 9, 'ssss', 'tmam2', 0, '2021-02-19 14:41:33', 2, 'seen'),
('kareem', 9, 'sdddddd', 'tmam3', 0, '2021-02-19 14:43:39', 3, 'seen'),
('Hesham', 22, 'd', 'admin', 0, '2021-02-19 16:15:54', 4, 'seen'),
('kareem', 9, 'test', 'tmam4', 22, '2021-02-19 18:27:00', 6, 'seen'),
('', 9, '', 'tmam5', 22, '2021-02-20 03:21:46', 7, 'seen'),
('', 9, '', 'tmam6', 22, '2021-02-20 03:24:17', 8, 'seen'),
('', 9, '', 'sha8al?', 22, '2021-02-20 19:33:32', 11, 'seen'),
('kareem', 21, 'ssss', 'okkkkk', 0, '2021-02-20 19:35:07', 12, 'seen'),
('', 21, '', 'adadadadadada', 22, '2021-02-20 19:36:27', 13, 'seen'),
('kareem', 9, 'test', 'test tany', 0, '2021-02-24 13:03:16', 15, 'seen'),
('', 9, '', 'eeeeee', 22, '2021-02-24 13:06:47', 16, 'seen'),
('kareem', 9, 'test', 'test bold?', 0, '2021-02-24 20:08:44', 17, 'seen'),
('kareem', 22, 'test2', 'test bold?2', 0, '2021-02-24 20:11:03', 18, 'seen'),
('hesham', 9, 'time', 'ana 3aiz avdfsajbhfjskjd', 0, '2021-02-25 02:47:23', 19, 'seen'),
('antably', 21, 'test', 'htyjtyjtjt', 0, '2021-02-25 02:48:22', 20, 'seen'),
('antably', 21, 'hyh', 'thytyhtyhth', 0, '2021-02-25 02:48:34', 21, 'seen');

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
(1, 'Bag', 'comfyy', 400, 'bag.jpg', 'Supplies', 5),
(2, 'Gloves', 'unisex', 300, 'gloves.jpg', 'Fahion', 5),
(3, 'Camp Shower', 'shower', 200, 'shower.jpg', 'Cleaning', 5),
(4, 'Shoes', 'unisex', 300, 'shoes.jpg', 'Fashion', 1),
(12, 'First Aid', 'health', 150, 'aid.jpg', 'Medical', 0);

-- --------------------------------------------------------

--
-- Table structure for table `rating_system`
--

CREATE TABLE `rating_system` (
  `ID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `productID` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `comment` text NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rating_system`
--

INSERT INTO `rating_system` (`ID`, `userID`, `productID`, `rating`, `comment`, `date`) VALUES
(3, 9, 3, 5, 'gamed', '2021-02-25 00:28:23'),
(8, 9, 1, 5, 'test', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `surveytable`
--

CREATE TABLE `surveytable` (
  `username` varchar(25) NOT NULL,
  `radio1` varchar(30) NOT NULL,
  `radio2` varchar(30) NOT NULL,
  `radio3` varchar(30) NOT NULL,
  `radio4` varchar(30) NOT NULL,
  `radio5` varchar(30) NOT NULL,
  `radio6` varchar(30) NOT NULL,
  `radio7` varchar(30) NOT NULL,
  `radio8` varchar(30) NOT NULL,
  `comment` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `surveytable`
--

INSERT INTO `surveytable` (`username`, `radio1`, `radio2`, `radio3`, `radio4`, `radio5`, `radio6`, `radio7`, `radio8`, `comment`) VALUES
(' anas', 'not bad', 'perfect', 'perfect', 'perfect', 'perfect', 'not bad', 'NO', 'Nice', 'kollo kwiis'),
(' anas', 'not bad', 'not bad', 'Nice', 'Nice', 'Nice', 'Nice', 'NO', 'perfect', 'kollo kwis'),
(' seif', 'Nice', 'Nice', 'perfect', 'perfect', 'not bad', 'NO', 'perfect', 'perfect', 'kkkkkkkk'),
(' anas', 'not bad', 'perfect', 'perfect', 'perfect', 'perfect', 'not bad', 'NO', 'Nice', 'kollo kwiis'),
(' anas', 'not bad', 'not bad', 'Nice', 'Nice', 'Nice', 'Nice', 'NO', 'perfect', 'kollo kwis'),
(' seif', 'Nice', 'Nice', 'perfect', 'perfect', 'not bad', 'NO', 'perfect', 'perfect', 'kkkkkkkk');

-- --------------------------------------------------------

--
-- Table structure for table `trip-user`
--

CREATE TABLE `trip-user` (
  `ID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `tripID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(2, 'Oregon Ridge Park', 'Start from the parking lot and hike toward the Nature Center, then cross the bridge and turn right ohhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh', 1500, 'hike2.jpg', 3.5),
(3, 'High-Desert Argentina and Chile', 'Explora is best known for its high-luxury adventure lodges in Chile and Peru, but for those who really want to get remote, the company offers several travesías, or journeys, that are done largely by foot.', 2000, 'hike1.jpg', 5),
(5, 'The Tour du Mont-Blanc', ' A trip around one of the world’s most famous mountains rather than up it.', 3000, '3.jpg', 4),
(6, 'Bosnia and Herzegovina & Montenegro', 'Eastern Europe is becoming the new Western Europe, and as the first North American travel company to offer hiking trips to Bosnia and Montenegro, Mountain Travel Sobek argues that the Dinaric Alps are Europe’s best-kept secret.', 1200, 'hike3.jpg', 2.5),
(8, 'Central Bhutan', 'The typical Bhutan itinerary hopscotches around the country’s major settlements. But GeoEx—one of the first U.S. tour operators to offer trips to the kingdom and still a specialist in the destination—takes clients deeper into the untouched wilderness and culture of the country’s central mountains.', 2000, 'hike4.jpg', 5),
(9, 'The Sacred Valley', 'The word is out on the Salkantay Trail—the (somewhat) less crowded, equally stunning alternative to following the Inca Trail through the Sacred Valley to Machu Picchu. Launched some ten years ago, Mountain Lodges of Peru upended the usual pop-tent camping situation by building highly luxurious lodges—think private hot tubs on the terraces—along their own, slightly different route.', 1400, 'hike5.jpg', 6);

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
  `profilePic` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `username`, `age`, `Email`, `password`, `type`, `profilePic`) VALUES
(9, 'Hiker', 0, 'hiker@gmail.com', 'Hiker1234', 'hiker', 'stock-vector-b-initial-circle-company-or-bo-ob-logo-black-background-325478303.jpg'),
(36, 'Auditor', 25, 'auditor@gmail.com', 'Auditor1234', 'auditor', ''),
(37, 'Hr', 30, 'hr@gmail.com', 'Hr123456', 'HR', ''),
(40, 'Admin', 2021, 'admin@gmail.com', 'Admin1234', 'admin', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`orderID`),
  ADD KEY `uid` (`userID`);

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
-- Indexes for table `investigation`
--
ALTER TABLE `investigation`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `adminID` (`adminID`),
  ADD KEY `auditorID` (`auditorID`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `groupID` (`groupID`,`userID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `hikerID` (`hikerID`),
  ADD KEY `adminID` (`adminID`);

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
-- Indexes for table `trip-user`
--
ALTER TABLE `trip-user`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `uid` (`userID`),
  ADD KEY `tid` (`tripID`);

--
-- Indexes for table `trips`
--
ALTER TABLE `trips`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `orderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `groups_rating`
--
ALTER TABLE `groups_rating`
  MODIFY `unique` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `investigation`
--
ALTER TABLE `investigation`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `rating_system`
--
ALTER TABLE `rating_system`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `trip-user`
--
ALTER TABLE `trip-user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `trips`
--
ALTER TABLE `trips`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `address`
--
ALTER TABLE `address`
  ADD CONSTRAINT `address_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`productID`) REFERENCES `products` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

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
-- Constraints for table `trip-user`
--
ALTER TABLE `trip-user`
  ADD CONSTRAINT `trip-user_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `trip-user_ibfk_2` FOREIGN KEY (`tripID`) REFERENCES `trips` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
