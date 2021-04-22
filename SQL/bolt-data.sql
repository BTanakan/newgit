-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2021 at 02:28 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bolt-data`
--

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE `branch` (
  `branch_id` int(11) NOT NULL,
  `branch_name` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `phone` int(10) NOT NULL,
  `hub_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `sex` char(5) DEFAULT NULL CHECK (`sex` in ('M','F')),
  `province` varchar(255) NOT NULL,
  `postcode` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `user_id`, `firstname`, `lastname`, `phone`, `address`, `sex`, `province`, `postcode`) VALUES
(2, 2, 'Ban', 'Kung', '0821549875', '47/1', 'm', 'Phuket', '81200'),
(3, 3, 'adiw', 'ommoney', '0821541452', '44/5', 'm', 'Phuket', '81200'),
(6, 4, 'non', 'pavid', '0821549871', '44/5', 'm', 'Phuket', '81200');

-- --------------------------------------------------------

--
-- Table structure for table `driver`
--

CREATE TABLE `driver` (
  `driver_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `phone` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `sex` char(5) DEFAULT NULL CHECK (`sex` in ('m','f')),
  `province` varchar(255) NOT NULL,
  `postcode` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `driver`
--

INSERT INTO `driver` (`driver_id`, `user_id`, `firstname`, `lastname`, `phone`, `address`, `sex`, `province`, `postcode`) VALUES
(1, 14, 'ซาโบ้', 'คุง', 898548785, '45/1', NULL, 'satun', '91150'),
(3, NULL, 'มังกี้', 'ลูฟี่', 898548781, '77/1', 'm', 'satun', '91150');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `employpee_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `phone` int(10) NOT NULL,
  `address` varchar(255) NOT NULL,
  `sex` char(5) NOT NULL CHECK (`sex` in ('m','f')),
  `province` varchar(255) NOT NULL,
  `postcode` varchar(255) NOT NULL,
  `employee_role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`employpee_id`, `user_id`, `firstname`, `lastname`, `phone`, `address`, `sex`, `province`, `postcode`, `employee_role`) VALUES
(1, 1, 'meliodas', 'sama', 859568954, '47/1', 'm', 'Phuket', '81200', 'staff');

-- --------------------------------------------------------

--
-- Table structure for table `hub`
--

CREATE TABLE `hub` (
  `hub_id` int(11) NOT NULL,
  `region` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `location_id` int(11) NOT NULL,
  `first_location` varchar(255) NOT NULL,
  `last_location` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `package`
--

CREATE TABLE `package` (
  `packagae_id` int(11) NOT NULL,
  `tacking_id` int(11) DEFAULT NULL,
  `type` varchar(255) NOT NULL,
  `weight` decimal(15,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `receipt`
--

CREATE TABLE `receipt` (
  `receipt_id` int(11) NOT NULL,
  `price` decimal(15,2) NOT NULL,
  `tax` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `receiver`
--

CREATE TABLE `receiver` (
  `receiver_id` int(11) NOT NULL,
  `receiver_name` varchar(255) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `address` varchar(255) NOT NULL,
  `province` varchar(255) NOT NULL,
  `postcode` varchar(255) NOT NULL,
  `tracking_number` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `sender_firstname_lastname` varchar(255) NOT NULL,
  `price` decimal(15,2) NOT NULL,
  `Pickup_Date` timestamp NOT NULL DEFAULT current_timestamp(),
  `region` varchar(255) NOT NULL,
  `driver_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `receiver`
--

INSERT INTO `receiver` (`receiver_id`, `receiver_name`, `phone`, `address`, `province`, `postcode`, `tracking_number`, `status`, `sender_firstname_lastname`, `price`, `Pickup_Date`, `region`, `driver_id`) VALUES
(31, 'สา โบ้', '0895652148', '47/8', 'ท่าเรือ/ท่าแพ/สงขลา', '91152', 'E48549562FF', 'กำลังรอ.', 'ธนาคาร คงไฝ', '120.00', '2021-04-21 19:15:25', 'south', 3),
(32, 'เอส คุง', '0985658475', '88/5', 'ท่าเรือ/ท่าแพ/สตูล', '91150', 'DE5956232154F', 'รอ', 'ธนาคาร คงไฝ', '120.00', '2021-04-21 19:17:33', 'south', 1),
(33, 'คู จัง', '0895547414', '55/5', 'ท่าเรือ/ท่าแพ/สตูล', '91152', 'AD6623565F', 'มาถึงพัทลุงแล้ว', 'ธนาคาร คงไฝ', '555.00', '2021-04-21 19:46:45', 'South', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sender`
--

CREATE TABLE `sender` (
  `sender_id` int(11) NOT NULL,
  `firstname_lastname` varchar(255) NOT NULL,
  `phone` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `district_province` varchar(255) NOT NULL,
  `postcode` varchar(255) NOT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sender`
--

INSERT INTO `sender` (`sender_id`, `firstname_lastname`, `phone`, `address`, `district_province`, `postcode`, `user_id`) VALUES
(6, 'ธนาคาร คงไฝ', 854987541, '47/1', 'ท่าเรือ/ท่าแพ/สตูล', '91150', NULL),
(7, 'ยู โน', 895654874, '47/2', 'ท่าเรือ/ท่าแพ/สตูล', '91151', NULL),
(10, 'สม คุง', 825042579, '47/1', 'ท่าเรือ/ท่าแพ/สตูล', '91151', 1),
(11, 'สม จัง', 895685478, '47/3', 'ท่าเรือ/ท่าแพ/สตูล', '91151', NULL),
(13, 'สมจิต', 846598541, '64/2', 'ท่าเรือ/ท่าแพ/สงขลา', '91151', NULL),
(20, 'อัส ต้า', 747516582, '47/1', 'ท่าเรือ/ท่าแพ/สตูล', '91150', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tracking`
--

CREATE TABLE `tracking` (
  `tracking_id` int(11) NOT NULL,
  `tracking_number` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `password`, `role`) VALUES
(1, 'Meliodas', 'banktv76@gmail.com', '123456', 'employee'),
(2, 'Ban', 'Ban@gmail.com', '123456', 'customer'),
(3, 'adiw', 'adiw@gmail.com', '123456789', 'customer'),
(4, 'non', 'non@gmail.com', '123456', 'customer'),
(5, 'Hana', 'Hana@gmail.com', '1234', 'employee'),
(6, 'Go', 'Go@gmail.com', '1234', 'customer'),
(7, 'towo', 'towo@gmail.com', '1234', 'customer'),
(8, 'vava', 'vav@gmail.com', '1234', 'customer'),
(10, 'lala', 'lala@gmil.com', '1234', 'customer'),
(11, 'tawa', 'tawa@gmail.com', '1234', 'customer'),
(12, 'elish', 'elish@gmail.com', '123456', 'hub'),
(14, 'sabo', 'sabo@gmail.com', '123456', 'delivery');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`branch_id`),
  ADD UNIQUE KEY `branch_name` (`branch_name`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`),
  ADD UNIQUE KEY `phone` (`phone`);

--
-- Indexes for table `driver`
--
ALTER TABLE `driver`
  ADD PRIMARY KEY (`driver_id`),
  ADD UNIQUE KEY `phone` (`phone`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`employpee_id`);

--
-- Indexes for table `hub`
--
ALTER TABLE `hub`
  ADD PRIMARY KEY (`hub_id`),
  ADD UNIQUE KEY `region` (`region`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`location_id`);

--
-- Indexes for table `package`
--
ALTER TABLE `package`
  ADD PRIMARY KEY (`packagae_id`);

--
-- Indexes for table `receipt`
--
ALTER TABLE `receipt`
  ADD PRIMARY KEY (`receipt_id`);

--
-- Indexes for table `receiver`
--
ALTER TABLE `receiver`
  ADD PRIMARY KEY (`receiver_id`),
  ADD UNIQUE KEY `phone` (`phone`),
  ADD UNIQUE KEY `tracking_number` (`tracking_number`),
  ADD KEY `driver_id` (`driver_id`);

--
-- Indexes for table `sender`
--
ALTER TABLE `sender`
  ADD PRIMARY KEY (`sender_id`),
  ADD UNIQUE KEY `phone` (`phone`);

--
-- Indexes for table `tracking`
--
ALTER TABLE `tracking`
  ADD PRIMARY KEY (`tracking_id`),
  ADD UNIQUE KEY `tracking_number` (`tracking_number`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `branch`
--
ALTER TABLE `branch`
  MODIFY `branch_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `driver`
--
ALTER TABLE `driver`
  MODIFY `driver_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `employpee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `hub`
--
ALTER TABLE `hub`
  MODIFY `hub_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `location_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `package`
--
ALTER TABLE `package`
  MODIFY `packagae_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `receipt`
--
ALTER TABLE `receipt`
  MODIFY `receipt_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `receiver`
--
ALTER TABLE `receiver`
  MODIFY `receiver_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `sender`
--
ALTER TABLE `sender`
  MODIFY `sender_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tracking`
--
ALTER TABLE `tracking`
  MODIFY `tracking_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `driver`
--
ALTER TABLE `driver`
  ADD CONSTRAINT `driver_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `receiver`
--
ALTER TABLE `receiver`
  ADD CONSTRAINT `receiver_ibfk_1` FOREIGN KEY (`driver_id`) REFERENCES `driver` (`driver_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
