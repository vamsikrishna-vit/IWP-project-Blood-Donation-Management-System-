-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 25, 2019 at 05:05 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `UserName` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `updationDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `UserName`, `Password`, `updationDate`) VALUES
(1, 'admin', '9a252ac539da04bdfee1a520eecd6ba8', '2019-10-20 18:10:47');

-- --------------------------------------------------------

--
-- Table structure for table `blooddonorsinfo`
--

CREATE TABLE `blooddonorsinfo` (
  `id` int(11) NOT NULL,
  `FullName` varchar(100) DEFAULT NULL,
  `MobileNumber` char(11) DEFAULT NULL,
  `EmailId` varchar(100) DEFAULT NULL,
  `Gender` varchar(20) DEFAULT NULL,
  `Age` int(11) DEFAULT NULL,
  `BloodGroup` varchar(20) DEFAULT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `Message` mediumtext,
  `PostingDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blooddonorsinfo`
--

INSERT INTO `blooddonorsinfo` (`id`, `FullName`, `MobileNumber`, `EmailId`, `Gender`, `Age`, `BloodGroup`, `Address`, `Message`, `PostingDate`, `status`) VALUES
(2, 'Subhash', '41241241241', 'dasdasd@dfdsf.com', 'Male', 34, 'AB-', ' fsdfds', 'Contact me when needed', '2018-08-31 20:48:11', 1),
(3, 'Amit trevedi', '42352352352', 'amit@gmail.com', 'Male', 35, 'A-', 'vellore', 'great job guys', '2018-09-01 07:21:21', 1),
(4, 'ajaykumar', '35345435345', 'ajay@gmail.com', 'Female', 26, 'AB-', NULL, ' please make use of it', '2018-09-01 07:21:42', 1),
(5, 'veeren kumar', '8569855244', 'niiii@test.com', 'Male', 32, 'A-', 'vellore', 'hello', '2018-09-01 09:00:18', 1),
(6, 'Ramji', '7013659407', 'ramajatlareddy123456789@gmail.com', 'Female', 19, 'A+', 'Andaman Nicobar', ' I like to donate more', '2018-10-09 18:38:28', 1),
(7, 'Chaitanya', '8754432101', 'chatanya@gmail.com', 'Male', 18, 'O-', 'vit', 'thank you ', '2018-10-10 11:34:32', 1),
(8, 'suraj', '7013659407', 'vamsiyarramsetty111@gmail.com', 'Male', 13, 'A-', 'ddgdf', ' dfds', '2018-11-06 11:46:14', 1),
(27, '', '', '', 'male', 0, 'Abpositive', '', '', '2019-10-20 12:13:11', 1),
(28, '', '', '', 'male', 0, 'Abpositive', '', '', '2019-10-20 12:14:55', 1),
(29, '', '', '', 'male', 0, 'Abpositive', '', '', '2019-10-20 12:15:23', 1),
(30, '', '', '', 'male', 0, 'Abpositive', '', '', '2019-10-20 12:16:23', 1),
(31, '', '', '', 'male', 0, 'Abpositive', '', '', '2019-10-20 12:16:59', 1),
(36, 'Harsh', '9080564715', 'vamsiyarramsetty111@gmail.com', 'male', 23, 'AB+', 'fdgf', '', '2019-10-20 13:01:06', 1),
(37, 'Harsha', '9080564715', 'vamsiyarramsetty111@gmail.com', 'male', 23, 'AB-', 'gdg', '', '2019-10-20 13:03:27', 1),
(38, 'Harsvbvb', '9080564715', 'vamsiyarramsetty111@gmail.com', 'male', 24, 'AB+', 'fdfxcxc', '', '2019-10-20 13:17:28', 1),
(39, 'Harsha', '7981988112', 'harsha111@gmail.com', 'male', 19, 'B+', 'kothhapalem , darsi', '', '2019-10-24 03:48:43', 1);

-- --------------------------------------------------------

--
-- Table structure for table `bloodgroupinfo`
--

CREATE TABLE `bloodgroupinfo` (
  `id` int(11) NOT NULL,
  `BloodGroup` varchar(20) DEFAULT NULL,
  `PostingDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bloodgroupinfo`
--

INSERT INTO `bloodgroupinfo` (`id`, `BloodGroup`, `PostingDate`) VALUES
(1, 'A-', '2018-08-31 20:33:50'),
(2, 'AB-', '2018-08-31 20:34:00'),
(3, 'O-', '2018-08-31 20:34:05'),
(4, 'A-', '2018-08-31 20:34:10'),
(5, 'A+', '2018-08-31 20:34:13'),
(6, 'AB+', '2018-08-31 20:34:18');

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE `contactus` (
  `id` int(11) NOT NULL,
  `Address` tinytext,
  `EmailId` varchar(255) DEFAULT NULL,
  `ContactNo` char(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contactus`
--

INSERT INTO `contactus` (`id`, `Address`, `EmailId`, `ContactNo`) VALUES
(1, 'Test Demo 																							', 'test@test.com', '8585233222');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(11) NOT NULL,
  `PageName` varchar(255) DEFAULT NULL,
  `type` varchar(255) NOT NULL DEFAULT '',
  `detail` longtext NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `PageName`, `type`, `detail`) VALUES
(2, 'Why Become Donor', 'donor', 'Blood is the most precious gift that anyone can give to another person â€” the gift of life. A decision to donate your blood can save a life, or even several if your blood is separated into its components red cells, platelets and plasma which can be used individually for patients with specific conditions.<br><br>\r\n\r\nDouble Red Blood Cells are most needed by patients after significant blood loss through trauma, surgery, or anemia.\r\nPlatelets help prevent uncontrolled bleeding and help patients with cancer, leukemia, and blood disorders. Plasma helps replace lost fluids and other blood products in burn victims, and more.\r\n'),
(3, 'About Us ', 'aboutus', '										The main aim of developing this system is to provide blood to the people who are in need of blood. The number of persons who are in need of blood are increasing in large number day by day. Using this system user can search blood group available in the city and he can also get contact number of the donor who has the same blood group he needs.\r\n\r\n<br><br>In order to help people who are in need of blood, this Online Blood Bank management system can be used effectively for getting the details of available blood groups and user can also get contact number of the blood donors having the same blood group and within the same city. So if the blood group is not available in the blood bank user can request the donor to donate the blood to him and save someone life.\r\n\r\nUsing this bank management system people can register himself or herself who want to donate blood. To register in the system they have to enter their contact information like address mobile number etc.\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `querycontactus`
--

CREATE TABLE `querycontactus` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `EmailId` varchar(120) DEFAULT NULL,
  `ContactNumber` char(11) DEFAULT NULL,
  `Message` longtext,
  `PostingDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `querycontactus`
--

INSERT INTO `querycontactus` (`id`, `name`, `EmailId`, `ContactNumber`, `Message`, `PostingDate`, `status`) VALUES
(7, 'Vamsi Krishna', 'vamsiyarramsetty111@gmail.com', '9080564715', 'hello', '2019-10-23 19:30:00', 1),
(8, 'Harsha', 'harsha@gmail.com', '9080564717', 'hello', '2019-10-23 19:30:23', 1),
(9, 'subhash', 'subhash@gmail.com', '9330564717', 'Add me as donor', '2019-10-23 19:31:17', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blooddonorsinfo`
--
ALTER TABLE `blooddonorsinfo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bloodgroupinfo`
--
ALTER TABLE `bloodgroupinfo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contactus`
--
ALTER TABLE `contactus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `querycontactus`
--
ALTER TABLE `querycontactus`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `blooddonorsinfo`
--
ALTER TABLE `blooddonorsinfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `bloodgroupinfo`
--
ALTER TABLE `bloodgroupinfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `contactus`
--
ALTER TABLE `contactus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `querycontactus`
--
ALTER TABLE `querycontactus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
