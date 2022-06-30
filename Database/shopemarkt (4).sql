-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 30, 2022 at 11:28 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shopemarkt`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `CategoryID` int(11) NOT NULL,
  `Category` varchar(50) NOT NULL,
  `catogry_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`CategoryID`, `Category`, `catogry_date`) VALUES
(1, 'أجهزة إلكترونية', '2022-06-10 15:37:26'),
(2, 'السيارات', '2022-06-05 09:18:06'),
(3, 'ملابس', '2022-06-05 09:18:18'),
(4, 'خضروات', '2022-06-16 10:39:27');

-- --------------------------------------------------------

--
-- Table structure for table `companie`
--

CREATE TABLE `companie` (
  `CompanieID` int(11) NOT NULL,
  `Companie` varchar(50) NOT NULL,
  `Address` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `delivery`
--

CREATE TABLE `delivery` (
  `DeliveryID` int(11) NOT NULL,
  `Delivery` varchar(50) NOT NULL,
  `CompanieID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `HistoryID` int(11) NOT NULL,
  `DeliveryID` int(11) NOT NULL,
  `OrderID` int(11) NOT NULL,
  `PayDtae` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `OrderID` int(11) NOT NULL,
  `proudect_id` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `date_order` timestamp NOT NULL DEFAULT current_timestamp(),
  `cont_item` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`OrderID`, `proudect_id`, `UserID`, `date_order`, `cont_item`) VALUES
(2, 1, 6, '2022-06-27 08:09:06', 1),
(3, 3, 6, '2022-06-27 08:58:19', 0),
(6, 2, 5, '2022-06-30 08:56:28', 0),
(7, 2, 5, '2022-06-30 08:56:44', 0),
(8, 3, 6, '2022-06-30 11:18:31', 0);

-- --------------------------------------------------------

--
-- Table structure for table `package`
--

CREATE TABLE `package` (
  `PackageID` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Price` int(11) NOT NULL,
  `description` varchar(10000) NOT NULL,
  `Image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `ProductID` int(11) NOT NULL,
  `Product` varchar(50) NOT NULL,
  `Price` double NOT NULL,
  `AddedDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Quantity` int(11) NOT NULL,
  `description` varchar(10000) NOT NULL,
  `discount` int(11) NOT NULL,
  `Image` varchar(200) NOT NULL,
  `CategoryID` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`ProductID`, `Product`, `Price`, `AddedDate`, `Quantity`, `description`, `discount`, `Image`, `CategoryID`, `user_id`) VALUES
(1, 'قميص', 100, '2022-06-07 21:00:00', 10, 'قميص لونه أبيض و مقاساته S,M فقط', 0, ' jacket-02.jpg shirt-03.jpg shirt-04.jpg ', 3, 1),
(2, 'تيوتا فور رنر', 2000000, '0000-00-00 00:00:00', 1, 'السيارة حديثة وبها الكثير من المزايا', 0, ' car-01.jpg car-02.jpg car-03.jpg car-04.jpg ', 2, 6),
(3, 'قميص', 100, '0000-00-00 00:00:00', 1, 'gbbbg', 0, ' shirt-03.jpg shirt-04.jpg ', 3, 1),
(6, 'قميص', 100, '0000-00-00 00:00:00', 1, 'dssdas', 0, ' jacket-01.jpg jacket-02.jpg shirt-03.jpg ', 3, 6),
(7, 'تيوتا', 100222, '2022-06-22 17:09:58', 1, 'إستراد حيث و جمرك', 0, ' car-03.jpg car-04.jpg ', 2, 6),
(8, 'قميص', 100, '2022-06-23 10:15:25', 5, 'قميص قميص', 0, ' jacket-02.jpg ', 3, 6);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `UserID` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Address` varchar(50) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `Rank` int(11) NOT NULL,
  `Image` varchar(50) NOT NULL,
  `PackageID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UserID`, `Name`, `Email`, `Password`, `Address`, `phone`, `Rank`, `Image`, `PackageID`) VALUES
(1, 'محمد علي', 'mohamed1@gmail.com', 'dTRg1xBNPwPXFVQRHO8gcA==', 'زليتن', '0922043696', 3, 'user-01.jpg', NULL),
(5, 'معاذ فرحات', 'moad@gmail.com', 'dTRg0BNeSxbAJixV', 'زليتن', '0910051896', 12, 'user-01.jpg', NULL),
(6, 'محمد فرج الشريدي', 'mohamed24@gmail.com', 'dTcQzwRgT1I=', 'ليبيا - زليتن', '0943789901', 3, '21372076.jpg', NULL),
(7, 'معاذ فرحات', 'hgbgt@tbrf', 'TjsX0xN3bVI=', 'aaaaaa', '0910086070', 3, 'user.jpg', NULL),
(11, 'احمد', 'ahmed@aa', 'TjQf0BBLM1I=', 'زليتن', '0947878887', 2, 'user.jpg', NULL),
(13, 'أحمد باوى', 'ahmedbawa2000@gmail.com', 'WjcQwgdeW1I=', 'الجفرة', '0919586884', 1, 'user.jpg', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`CategoryID`);

--
-- Indexes for table `companie`
--
ALTER TABLE `companie`
  ADD PRIMARY KEY (`CompanieID`);

--
-- Indexes for table `delivery`
--
ALTER TABLE `delivery`
  ADD PRIMARY KEY (`DeliveryID`),
  ADD KEY `company` (`CompanieID`);

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`HistoryID`),
  ADD KEY `order` (`OrderID`),
  ADD KEY `delevery` (`DeliveryID`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`OrderID`),
  ADD KEY `users` (`UserID`),
  ADD KEY `proudectcons` (`proudect_id`);

--
-- Indexes for table `package`
--
ALTER TABLE `package`
  ADD PRIMARY KEY (`PackageID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`ProductID`),
  ADD KEY `catogary` (`CategoryID`),
  ADD KEY `userconstrent` (`user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UserID`),
  ADD KEY `packeg` (`PackageID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `CategoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `companie`
--
ALTER TABLE `companie`
  MODIFY `CompanieID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `delivery`
--
ALTER TABLE `delivery`
  MODIFY `DeliveryID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `HistoryID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `OrderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `package`
--
ALTER TABLE `package`
  MODIFY `PackageID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `ProductID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `delivery`
--
ALTER TABLE `delivery`
  ADD CONSTRAINT `company` FOREIGN KEY (`CompanieID`) REFERENCES `companie` (`CompanieID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `history`
--
ALTER TABLE `history`
  ADD CONSTRAINT `delevery` FOREIGN KEY (`DeliveryID`) REFERENCES `delivery` (`DeliveryID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order` FOREIGN KEY (`OrderID`) REFERENCES `order` (`OrderID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `proudectcons` FOREIGN KEY (`proudect_id`) REFERENCES `product` (`ProductID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `userser` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `catogary` FOREIGN KEY (`CategoryID`) REFERENCES `category` (`CategoryID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `userconstrent` FOREIGN KEY (`user_id`) REFERENCES `user` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `packeg` FOREIGN KEY (`PackageID`) REFERENCES `package` (`PackageID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
