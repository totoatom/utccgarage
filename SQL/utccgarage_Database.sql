CREATE DATABASE IF NOT EXISTS `utccgarage` CHARACTER SET UTF8 COLLATE utf8_general_ci;
USE `utccgarage`;

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
(2, 'admin@gmail.com', 'admin', 'admin', '', '', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', '1'),
(14, 'test123@gmail.com', 'aaaa', 'bbbb', '...', '954078649', '123456', '0'),
(15, 'jame123@gmail.com', 'สุชาติ', 'ชาญเชิงศิลปกุล', '...', '954078649', 'a0f16554717283066f18541d1855090adce2464756c999ff2ebd52fc1c6744ac', '0'),
(16, 'jame1234@gmail.com', 'dddd', 'ccccsdasdas', 'dsaasadas', '0954078649', 'a0f16554717283066f18541d1855090adce2464756c999ff2ebd52fc1c6744ac', '0'),
(18, 'jame4058@gmail.com', 'สุชาติ ชาญเชิงศิลปกุล', 'ชาญเชิงศิลปกุล', '...', '0954078649', '123456', '0'),
(19, 'zzz123@gmail.com', 'ABC', 'DDEF', 'DDDDDDD', '789789', '123456', '0'),
(20, 'toto@mail.com', 'tototank.io', '', '', '989898989', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', '0');

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `Invoice_order` int(10) NOT NULL,
  `Invoice_found_problem` varchar(80) DEFAULT NULL,
  `Invoice_cost` float DEFAULT NULL,
  `Invoice_end` varchar(30) NOT NULL DEFAULT '0000-00-00 00:00:00',
  `Invoice_status` varchar(30) DEFAULT NULL,
  `Queue_id` int(10) NOT NULL,
  `Invoice_start` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`Invoice_order`, `Invoice_found_problem`, `Invoice_cost`, `Invoice_end`, `Invoice_status`, `Queue_id`, `Invoice_start`) VALUES
(1, 'อะไหล่เสื่อม', 2500, '2019-05-18 00:00:00', 'ชำระเงินเสร็จสิ้น', 1, '2019-05-09 17:23:31'),
(2, 'แก้ไขไม่ได้ ', 0, '2019-05-18 00:00:00', 'ชำระเงินเสร็จสิ้น', 2, '2019-05-10 12:31:24'),
(3, 'Toyota', 25000, '2019-05-31 00:00:00', 'รอชำระค่าบริการ', 5, '2019-05-14 14:04:40'),
(4, 'อะไหล่เสื่อม', 1350, '2019-05-21', 'ชำระเงินเสร็จสิ้น', 10, '2019-05-14 15:25:29'),
(5, 'กปปปปปป', 0, '2019-05-31', 'รอชำระค่าบริหการ', 9, '2019-05-31 07:02:00'),
(6, 'คลัชแอร์สึก', 3500, '2019-05-22', 'ชำระเงินเสร็จสิ้น', 11, '2019-05-15 03:45:55');

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
  `Queue_end_date` varchar(30) NOT NULL,
  `Queue_Status` varchar(30) DEFAULT NULL,
  `Queue_plate_car` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `queue`
--

INSERT INTO `queue` (`Queue_id_order`, `ID_user`, `Queue_Start`, `Queue_Brand_car`, `Queue_color_car`, `Queue_model_car`, `Queue_problem_car`, `Queue_Mechanic_name`, `Queue_date`, `Queue_end_date`, `Queue_Status`, `Queue_plate_car`) VALUES
(1, 18, '2019-05-14 14:02:48', 'Toyota', 'สีดำ', 'wave 110', ' มีเสียงดังแปลกๆ', 'นายดำ', '2019-05-16 08:00:00', '2019-05-31 11:11:00', 'รอนำรถเข้าตรวจเช็ค', 'กฤ4558'),
(2, 18, '2019-05-09 16:22:37', 'Volvo', 'สีเทา', 'ABC', ' ควันดำ', 'นายดำ', '2019-05-11 05:00:00', '2019-05-11 12:00:00', 'กำลังซ่อม', 'ปป1446'),
(3, 0, '2019-05-14 12:24:52', 'Toyota', 'สีดำ', 'wave 110', ' เครื่องร้อนง่ายมาก', NULL, '2019-05-31 16:11:00', '2019-05-14 19:24:52', 'รอการตรวจสอบ', 'กท1010'),
(4, 19, '2019-05-14 12:43:50', 'Toyota', 'น้ำเงิน', 'wave 110', ' กกกกกกกกกกกกกกกกกกกกกกกกกกกกกกกกก', NULL, '2019-05-30 19:03:00', '2019-05-14 19:37:18', 'รอการตรวจสอบ', 'กท1010'),
(5, 19, '2019-05-14 14:04:25', 'Toyota', 'zzzzz', 'wave 110', ' dddddddddddddddd', 'นายดำ', '2019-05-30 22:01:00', '0000-00-00 00:00:00', 'เสร็จสิ้น', '123456'),
(6, 19, '2019-05-14 14:49:32', 'Chevrolet', 'สีดำเมทัลลิก', 'AABB', 'เครื่องยนต์ร้อนง่ายมากกก', NULL, '0000-00-00 00:00:00', '', 'รอการตรวจสอบ', 'กจ1678'),
(7, 19, '2019-05-14 14:50:53', 'Toyota', '', '', ' ', NULL, '0000-00-00 00:00:00', '', 'รอการตรวจสอบ', ''),
(8, 19, '2019-05-14 14:54:28', 'Ford', 'สีดำ', 'wave 110', ' เสียงท่อดัง', NULL, '2019-05-30 17:00:00', '', 'รอการตรวจสอบ', 'กฤ4558'),
(9, 19, '2019-05-14 14:54:36', 'Toyota', 'กกกก', 'กกกก', ' ', NULL, '0000-00-00 00:00:00', '', 'รอการตรวจสอบ', 'กกกกก'),
(10, 19, '2019-05-14 15:02:27', 'Suzuki', 'น้ำเงิน', 'ZACA', ' ท่อไหม้', 'นายดำ', '2019-05-27 17:00:00', '2019-06-29 10:00', 'เสร็จสิ้น', 'ผธ1212 กรุ'),
(11, 20, '2019-05-15 03:41:17', 'Mercedes-Ben', 'สีดำเมทัลลิก', 'C', 'แอร์ไม่เย็น', 'นายดำ', '2019-05-30 17:00:00', '1970-01-31 13:00', 'เสร็จสิ้น', 'กม1865');

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
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `Invoice_order` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `queue`
--
ALTER TABLE `queue`
  MODIFY `Queue_id_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
