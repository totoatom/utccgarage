-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 10, 2019 at 02:34 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.2.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `utccgarage`
--

-- --------------------------------------------------------

--
-- Table structure for table `db_user`
--

CREATE TABLE `db_user` (
  `ID` int(11) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `name` varchar(40) DEFAULT NULL,
  `surname` varchar(40) DEFAULT NULL,
  `address` varchar(150) DEFAULT NULL,
  `phone` varchar(10) DEFAULT NULL,
  `pass` varchar(100) DEFAULT NULL,
  `type` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `db_user`
--

INSERT INTO `db_user` (`ID`, `Email`, `name`, `surname`, `address`, `phone`, `pass`, `type`) VALUES
(1, 'test@gmail.com', 'ประยุท', '1', '1', '1', '1234', '0'),
(2, 'admin@gmail.com', 'admin', 'tsest', 'test', 'test', 'admin', '1'),
(14, 'test123@gmail.com', 'aaaa', 'bbbb', '...', '954078649', '123456', '0'),
(15, 'jame123@gmail.com', 'สุชาติ', 'ชาญเชิงศิลปกุล', '...', '954078649', 'a0f16554717283066f18541d1855090adce2464756c999ff2ebd52fc1c6744ac', '0'),
(16, 'jame1234@gmail.com', 'dddd', 'ccccsdasdas', 'dsaasadas', '0954078649', 'a0f16554717283066f18541d1855090adce2464756c999ff2ebd52fc1c6744ac', '0'),
(18, 'jame4058@gmail.com', 'สุชาติ ชาญเชิงศิลปกุล', 'ชาญเชิงศิลปกุล', '...', '0954078649', '123456', '0');

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `Invoice_order` int(10) NOT NULL,
  `Invoice_found_problem` varchar(80) DEFAULT NULL,
  `Invoice_cost` float DEFAULT NULL,
  `Invoice_end` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `Invoice_status` varchar(30) DEFAULT NULL,
  `Queue_id` int(10) NOT NULL,
  `Invoice_start` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`Invoice_order`, `Invoice_found_problem`, `Invoice_cost`, `Invoice_end`, `Invoice_status`, `Queue_id`, `Invoice_start`) VALUES
(1, 'อะไหล่เสื่อม', 2500, '2019-05-17 17:00:00', 'ชำระเงินเสร็จสิ้น', 1, '2019-05-09 17:23:31'),
(2, 'แก้ไขไม่ได้ ', 0, '2019-05-17 17:00:00', 'ชำระเงินเสร็จสิ้น', 2, '2019-05-10 12:31:24');

-- --------------------------------------------------------

--
-- Table structure for table `queue`
--

CREATE TABLE `queue` (
  `Queue_id_order` int(11) NOT NULL,
  `ID_user` int(10) NOT NULL,
  `Queue_Start` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Queue_Brand_car` varchar(20) DEFAULT NULL,
  `Queue_color_car` varchar(20) NOT NULL,
  `Queue_model_car` varchar(15) NOT NULL,
  `Queue_problem_car` varchar(80) DEFAULT NULL,
  `Queue_Mechanic_name` varchar(40) DEFAULT NULL,
  `Queue_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `Queue_end_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Queue_Status` varchar(30) DEFAULT NULL,
  `Queue_plate_car` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `queue`
--

INSERT INTO `queue` (`Queue_id_order`, `ID_user`, `Queue_Start`, `Queue_Brand_car`, `Queue_color_car`, `Queue_model_car`, `Queue_problem_car`, `Queue_Mechanic_name`, `Queue_date`, `Queue_end_date`, `Queue_Status`, `Queue_plate_car`) VALUES
(1, 18, '2019-05-09 17:24:00', 'Toyota', 'สีดำ', 'wave 110', ' มีเสียงดังแปลกๆ', 'นายแดง', '2019-05-16 08:00:00', '2019-05-16 15:00:00', 'เสร็จสิ้น', 'กฤ4558'),
(2, 18, '2019-05-09 16:22:37', 'Volvo', 'สีเทา', 'ABC', ' ควันดำ', 'นายดำ', '2019-05-11 05:00:00', '2019-05-11 12:00:00', 'กำลังซ่อม', 'ปป1446');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `db_user`
--
ALTER TABLE `db_user`
  ADD PRIMARY KEY (`ID`,`Email`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`Invoice_order`),
  ADD UNIQUE KEY `Invoice_status_2` (`Queue_id`);

--
-- Indexes for table `queue`
--
ALTER TABLE `queue`
  ADD PRIMARY KEY (`Queue_id_order`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `db_user`
--
ALTER TABLE `db_user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `Invoice_order` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `queue`
--
ALTER TABLE `queue`
  MODIFY `Queue_id_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
