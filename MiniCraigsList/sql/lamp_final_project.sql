-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 09, 2016 at 07:09 AM
-- Server version: 5.1.41
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `lamp_final_project`
--


-- Drop Tables
DROP TABLE IF EXISTS `posts`;
DROP TABLE IF EXISTS `subcategory`;
DROP TABLE IF EXISTS `category`;
DROP TABLE IF EXISTS `location`;
DROP TABLE IF EXISTS `region`;
DROP TABLE IF EXISTS `users`;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--
-- Creation: Sep 08, 2016 at 07:43 PM
--


CREATE TABLE IF NOT EXISTS `category` (
  `CATEGORY_ID` int(11) NOT NULL,
  `CATEGORYNAME` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`CATEGORY_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`CATEGORY_ID`, `CATEGORYNAME`) VALUES
(1, 'Housing'),
(2, 'For Sale'),
(3, 'Jobs');

-- --------------------------------------------------------

--
-- Table structure for table `location`
--
-- Creation: Sep 08, 2016 at 07:43 PM
--


CREATE TABLE IF NOT EXISTS `location` (
  `LOCATION_ID` int(11) NOT NULL,
  `REGION_ID` int(11) DEFAULT NULL,
  `LOCATIONNAME` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`LOCATION_ID`),
  KEY `REGION_ID` (`REGION_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS FOR TABLE `location`:
--   `REGION_ID`
--       `region` -> `REGION_ID`
--

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`LOCATION_ID`, `REGION_ID`, `LOCATIONNAME`) VALUES
(1, 1, 'Mumbai'),
(2, 1, 'Delhi'),
(3, 1, 'Chennai'),
(4, 2, 'Norwich'),
(5, 2, 'Oxford'),
(6, 2, 'Durham'),
(7, 3, 'San Jose'),
(8, 3, 'Union City'),
(9, 3, 'Santa Clara');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--
-- Creation: Sep 08, 2016 at 10:02 PM
--


CREATE TABLE IF NOT EXISTS `posts` (
  `POST_ID` int(11) NOT NULL AUTO_INCREMENT,
  `TITLE` varchar(40) DEFAULT NULL,
  `PRICE` float DEFAULT NULL,
  `DESCRIPTION` varchar(40) DEFAULT NULL,
  `EMAIL` varchar(50) DEFAULT NULL,
  `AGREEMENT` varchar(40) DEFAULT NULL,
  `TIMESTAMP` varchar(100) DEFAULT NULL,
  `IMAGE_1` varchar(100) DEFAULT NULL,
  `IMAGE_2` varchar(100) DEFAULT NULL,
  `IMAGE_3` varchar(100) DEFAULT NULL,
  `IMAGE_4` varchar(100) DEFAULT NULL,
  `SUBCATEGORY_ID` int(11) DEFAULT NULL,
  `LOCATION_ID` int(11) DEFAULT NULL,
  PRIMARY KEY (`POST_ID`),
  KEY `SUBCATEGORY_ID` (`SUBCATEGORY_ID`),
  KEY `LOCATION_ID` (`LOCATION_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`POST_ID`, `TITLE`, `PRICE`, `DESCRIPTION`, `EMAIL`, `AGREEMENT`, `TIMESTAMP`, `IMAGE_1`, `IMAGE_2`, `IMAGE_3`, `IMAGE_4`, `SUBCATEGORY_ID`, `LOCATION_ID`) VALUES
(1, '2Bed/1Bath for Rent', 4000, ' 2Bed/1Bath for Rent in Mulund Mumbai', 'lampuser1@gmail.com', '1 Year', '2016-08-09 06:06:16', '', '', '', '', 1, 1),
(2, '1Bed/1Bath for Rent', 220, ' 1Bed/1Bath Near India Gate Delhi', 'lampuser2@gmail.com', '11 Months', '2016-08-02 09:42:23', '', '', '', '', 1, 2),
(3, '3Bed/2Bath for Sale', 899000, '3Bed/2Bath for Sale Near Chennai Interna', 'lampuser3@gmail.com', '2 Year', '2016-01-12 09:26:37', '', '', '', '', 1, 3),
(4, '1000sqft for rent', 500, 'Place for rent for commercial purpose on', 'lampuser1@gmail.com', '6 Months', '2016-01-10 09:04:23', '', '', '', '', 2, 4),
(5, '1225sqft for sale', 800000, 'Commercial place in Oxford Mall 3 Years ', 'lampuser2@gmail.com', '1 Year', '2016-12-05 03:44:46', '', '', '', '', 2, 5),
(6, '800sqft for 5 year rent', 50000, 'Place for rent near tram station', 'lampuser3@gmail.com', '5 Year', '2016-11-11 03:02:11', '', '', '', '', 2, 6),
(7, 'TownHouse for Sale', 100, 'TownHouse for Sale in San Jose', 'lampuser4@gmail.com', '2 Year', '2016-07-10 10:27:08', '', '', '', '', 3, 7),
(8, 'TownHouse with Storage for Sale', 350, 'TownHouse with Storage for Sale 1Mile Fr', 'lampuser5@gmail.com', '11 Months', '2016-10-01 09:47:31', '', '', '', '', 3, 8),
(9, 'Individual House For Sale', 10000, 'Individual House For Sale near Caltrain', 'lampuser6@gmail.com', '6 Months', '2016-09-12 08:52:33', '', '', '', '', 3, 9),
(10, 'Mac Book Pro 15.4', 1799, 'Mac Book Pro 13.3', 'lampuser4@gmail.com', '3 Years', '2016-08-06 12:58:54', '', '', '', '', 4, 1),
(11, 'Mac Book Pro 13.3', 1029, 'Mac Book Pro 13.3', 'lampuser5@gmail.com', '5 Years', '2016-01-06 10:59:11', '', '', '', '', 4, 2),
(12, 'Refurbished Mac Book Air 13.3', 662, 'Mac Book Air 13.3', 'lampuser6@gmail.com', '1 Year', '2016-12-02 09:59:35', '', '', '', '', 4, 3),
(13, 'IPhone5', 1500, 'IPhone5 Unlocked', 'lampuser7@gmail.com', '11 Months', '2016-01-01 08:02:30', '', '', '', '', 5, 4),
(14, 'Samsumg Galaxy', 500, '2 Years Old In good condition', 'lampuser8@gmail.com', '1 Year', '2016-03-03 06:02:39', '', '', '', '', 5, 5),
(15, 'Google Nexus', 900, 'Latest Model Of Nexus 1 Month old', 'lampuser9@gmail.com', '6 Month', '2016-01-12 02:03:00', '', '', '', '', 5, 6),
(16, 'XBox-2', 550, 'XBox-2', 'lampuser7@gmail.com', '1', '2016-05-04 09:12:03', '', '', '', '', 6, 7),
(17, 'XBox-5', 1000, 'Brand new XBox-5 for sale', 'lampuser8@gmail.com', '2 Year', '2016-11-04 01:12:18', '', '', '', '', 6, 8),
(18, 'Samsung Video Game', 700, 'Samsung Video Game with virtual reality', 'lampuser9@gmail.com', '1 Year', '2016-01-03 07:08:34', '', '', '', '', 6, 9),
(19, 'Accounting Job', 8000, 'Hiring freshers at Mumbai', 'lampuser10@gmail.com', '11 Months', '2016-06-01 09:02:15', '', '', '', '', 7, 1),
(20, 'Jr Accountant', 10000, 'Candidate needs to have basic excel and ', 'lampuser11@gmail.com', '1 Year', '2016-09-11 08:30:21', '', '', '', '', 7, 2),
(21, 'Sr Accountant', 150000, 'Must Have 5 years Experience in Finance', 'lampuser12@gmail.com', '5 Years', '2016-08-09 06:30:27', '', '', '', '', 7, 3),
(22, 'Software Tester', 15000, 'QA Certification required', 'lampuser10@gmail.com', '3 Years', '2016-05-05 04:35:37', '', '', '', '', 8, 4),
(23, 'Java Developer', 25000, 'Hibernate,spring required', 'lampuser11@gmail.com', '1 Year', '2016-01-12 03:35:42', '', '', '', '', 8, 5),
(24, 'Front End Developer', 30000, 'Required Skills-PHP,HTML,CSS', 'lampuser12@gmail.com', '2 Year', '2016-11-10 02:05:49', '', '', '', '', 8, 6),
(25, 'Logistics Handling', 1600, 'Assistant for documentation', 'lampuser1@gmail.com', '1 Year', '2016-12-12 09:38:28', '', '', '', '', 9, 7),
(26, 'Human Resourse', 1350, 'Good Communication skills with 2 years e', 'lampuser4@gmail.com', '2 Years', '2016-08-02 02:18:11', '', '', '', '', 9, 8),
(27, 'Professor', 1400, 'English professor required in santa clar', 'lampuser7@gmail.com', '1 Year', '2016-08-01 10:09:12', '', '', '', '', 9, 9);

-- --------------------------------------------------------

--
-- Table structure for table `region`
--
-- Creation: Sep 08, 2016 at 07:43 PM
--


CREATE TABLE IF NOT EXISTS `region` (
  `REGION_ID` int(11) NOT NULL,
  `REGIONNAME` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`REGION_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `region`
--

INSERT INTO `region` (`REGION_ID`, `REGIONNAME`) VALUES
(1, 'India'),
(2, 'United Kingdom'),
(3, 'United States');

-- --------------------------------------------------------

--
-- Table structure for table `subcategory`
--
-- Creation: Sep 08, 2016 at 07:46 PM
--


CREATE TABLE IF NOT EXISTS `subcategory` (
  `SUBCATEGORY_ID` int(11) NOT NULL,
  `CATEGORY_ID` int(11) DEFAULT NULL,
  `SUBCATEGORYNAME` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`SUBCATEGORY_ID`),
  KEY `CATEGORY_ID` (`CATEGORY_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS FOR TABLE `subcategory`:
--   `CATEGORY_ID`
--       `category` -> `CATEGORY_ID`
--

--
-- Dumping data for table `subcategory`
--

INSERT INTO `subcategory` (`SUBCATEGORY_ID`, `CATEGORY_ID`, `SUBCATEGORYNAME`) VALUES
(1, 1, 'Apartment'),
(2, 1, 'Commercial'),
(3, 1, 'Individual'),
(4, 2, 'Laptops'),
(5, 2, 'Mobiles'),
(6, 2, 'Video Game'),
(7, 3, 'Finance'),
(8, 3, 'Technical'),
(9, 3, 'Non-Technical');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--
-- Creation: Sep 08, 2016 at 07:43 PM
--


CREATE TABLE IF NOT EXISTS `users` (
  `userID` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `userrole` varchar(100) NOT NULL DEFAULT 'user',
  PRIMARY KEY (`userID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `username`, `password`, `userrole`) VALUES
(1, 'admin@gmail.com', 'admin', 'admin'),
(2, 'lampuser', 'lampuser', 'user'),
(3, 'lamp@gmail.com', 'lamp', 'user'),
(4, 'user@gmail.com', 'user', 'user'),
(5, 'new@gmail.com', 'new', 'user'),
(6, 'priyanka@gmail.com', 'priyanka', 'user'),
(7, 'trial@gmail.com', 'trial', 'user'),
(8, 'user1@gmail.com', 'user1', 'user'),
(9, 'user2@gmail.com', 'user2', 'user'),
(10, 'lamp1@gmail.com', 'lamp1', 'user');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `location`
--
ALTER TABLE `location`
  ADD CONSTRAINT `location_ibfk_con` FOREIGN KEY (`REGION_ID`) REFERENCES `region` (`REGION_ID`);

--
-- Constraints for table `subcategory`
--
ALTER TABLE `subcategory`
  ADD CONSTRAINT `subcategory_ibfk_con` FOREIGN KEY (`CATEGORY_ID`) REFERENCES `category` (`CATEGORY_ID`);
