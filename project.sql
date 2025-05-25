-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 15, 2024 at 06:53 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `area`
--

CREATE TABLE `area` (
  `area_id` int(11) NOT NULL,
  `area_name` varchar(20) NOT NULL,
  `city_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `area`
--

INSERT INTO `area` (`area_id`, `area_name`, `city_id`) VALUES
(1, 'Bapunagar', 1),
(2, 'Nikol', 1),
(3, 'Naroda', 1),
(4, 'Mani-nagar', 1),
(5, 'Krishna-nagar', 1),
(6, 'Saraspur', 1),
(7, 'Hirawadi', 1),
(8, 'Ranip', 1),
(9, 'Paldi', 1),
(10, 'Vasna', 1);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`) VALUES
(5, 'Education'),
(6, 'Healthcare'),
(7, 'Animal Welfare'),
(8, 'Disaster Relief'),
(9, 'Hunger And Poverty'),
(10, 'Environmental Conservation');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `city_id` int(11) NOT NULL,
  `city_name` varchar(20) NOT NULL,
  `state_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`city_id`, `city_name`, `state_id`) VALUES
(1, 'Ahmedabad', 1),
(2, 'Rajkot', 1),
(4, 'Botad', 1);

-- --------------------------------------------------------

--
-- Table structure for table `donation`
--

CREATE TABLE `donation` (
  `d_id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `cat_id` int(11) NOT NULL,
  `d_amount` int(11) NOT NULL,
  `donation_date` date NOT NULL,
  `address` text NOT NULL,
  `city_id` int(11) NOT NULL,
  `area_id` int(11) NOT NULL,
  `status` varchar(30) NOT NULL,
  `user_id` int(11) NOT NULL,
  `contact_name` varchar(50) NOT NULL,
  `contact_number` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `donation`
--

INSERT INTO `donation` (`d_id`, `title`, `description`, `cat_id`, `d_amount`, `donation_date`, `address`, `city_id`, `area_id`, `status`, `user_id`, `contact_name`, `contact_number`) VALUES
(19, 'chetan panara', 'food donation', 9, 10000, '2024-10-23', 'GIRDHARNAGAR , B/H MIRAPARKWATER TANK ,BOTAD', 4, 5, 'success', 25, 'chetan panara', 9428838882),
(20, 'food donation', 'food donate', 5, 200, '2024-10-25', 'GIRDHARNAGAR , B/H MIRAPARKWATER TANK ,BOTAD', 4, 4, 'success', 25, 'chetan panara', 9428838882);

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `e_id` int(11) NOT NULL,
  `title` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` varchar(30) NOT NULL,
  `event_type` varchar(30) NOT NULL,
  `e_limit` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`e_id`, `title`, `description`, `date`, `user_id`, `status`, `event_type`, `e_limit`) VALUES
(17, 'cloths donation', 'cloths money donation', '2024-10-16', 26, 'accept', 'Cloths-Donation', 5000),
(18, 'Education Event', 'Education money donation', '2024-10-18', 26, 'accept', 'Stduent Education', 25000),
(19, 'Healthcare donation', 'Healthcare donation', '2024-10-16', 25, 'accept', 'Healthcare', 10000),
(20, 'Food donations', 'Food donations poor childrens', '2024-10-30', 25, 'accept', 'Hunger-And-Poverty', 5000);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `f_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `rating` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`f_id`, `date`, `user_id`, `comment`, `rating`) VALUES
(21, '2024-10-02', 25, 'nice website for money donations', 5),
(23, '2024-10-02', 26, 'Awsome website...', 3);

-- --------------------------------------------------------

--
-- Table structure for table `inquiry`
--

CREATE TABLE `inquiry` (
  `inq_id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact` bigint(20) NOT NULL,
  `message` varchar(100) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inquiry`
--

INSERT INTO `inquiry` (`inq_id`, `name`, `email`, `contact`, `message`, `date`) VALUES
(1, 'abcc', 'abc@gmail.com', 5566223311, 'how to donate....?', '2023-01-03'),
(2, 'fenil patel', 'fento@gmail.com', 9368521452, 'can i donate  money ....?', '2023-01-03'),
(3, 'Kalpesh patel', 'kalpeshpatel@gmail.com', 5689741230, 'what is process of donation?.....', '2023-01-09'),
(4, 'meenaben shah', 'shahds007@gmail.com', 9687052303, 'What is process to donate a food....', '2023-01-29'),
(5, 'Heena patel', 'heena01@gmao.com', 8865324179, 'what time can take your volunteer for delivering food into ngo...', '2023-03-15'),
(6, 'Kajal Mehta', 'shahkajal@gmail.com', 9714658962, 'i want donate money using my banking application can i make ...?', '2023-03-18'),
(7, 'harsh', 'shh@gmail.com', 7096130665, 'how much money can donate it ...??', '2024-10-02');

-- --------------------------------------------------------

--
-- Table structure for table `money_donation`
--

CREATE TABLE `money_donation` (
  `m_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `event_id` int(11) DEFAULT NULL,
  `amount` varchar(30) NOT NULL,
  `description` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `d_name` varchar(50) NOT NULL,
  `payment_id` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `money_donation`
--

INSERT INTO `money_donation` (`m_id`, `user_id`, `event_id`, `amount`, `description`, `date`, `d_name`, `payment_id`) VALUES
(36, 26, 17, '1000', 'cloths donation', '2024-10-02', 'mayur ', 'pay_P4AKYikpsrwYR6'),
(37, 25, 20, '2000', 'food donations', '2024-10-15', 'chetan panara', 'pay_P9BeGwbGnP5VQY');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`role_id`, `role_name`) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE `state` (
  `state_id` int(11) NOT NULL,
  `state_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`state_id`, `state_name`) VALUES
(1, 'Gujarat');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact` bigint(20) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `dob` date NOT NULL,
  `address` text NOT NULL,
  `city_id` int(11) NOT NULL,
  `area_id` int(11) NOT NULL,
  `image` text NOT NULL,
  `reg_date` date NOT NULL,
  `password` varchar(50) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `name`, `email`, `contact`, `gender`, `dob`, `address`, `city_id`, `area_id`, `image`, `reg_date`, `password`, `role_id`) VALUES
(7, 'admin', 'admin@gmail.com', 885522663, 'Male', '2023-01-10', '1-g,near shriji school,bapunagar', 1, 1, 'WhatsApp Image 2022-11-21 at 7.24.58 PM.jpeg', '2023-01-10', '12345678', 1),
(25, 'chetan panara', 'chetanpanara88@gmail.com', 9428838882, 'Male', '2024-10-25', 'GIRDHARNAGAR , B/H MIRAPARKWATER  ,BOTAD', 1, 2, 'ice.png', '2024-10-02', '123456789', 2),
(26, 'mayur panchal', 'mp@gmail.com', 9864352754, 'Male', '2024-10-04', 'Mumbai', 1, 2, 'ice.png', '2024-10-02', '123456789', 2),
(27, 'Urmi', 'urmi@gmail.com', 7096130665, 'Female', '2024-10-03', 'Surat', 1, 1, 'ice.png', '2024-10-02', '123456789', 2);

-- --------------------------------------------------------

--
-- Table structure for table `volunteer_acceptance`
--

CREATE TABLE `volunteer_acceptance` (
  `v_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `datetime` datetime NOT NULL,
  `status` varchar(30) NOT NULL,
  `d_id` int(11) NOT NULL,
  `description` text NOT NULL,
  `receive_datetime` datetime NOT NULL,
  `receive_message` text NOT NULL,
  `delivery_datetime` datetime NOT NULL,
  `delivery_message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `volunteer_acceptance`
--

INSERT INTO `volunteer_acceptance` (`v_id`, `user_id`, `datetime`, `status`, `d_id`, `description`, `receive_datetime`, `receive_message`, `delivery_datetime`, `delivery_message`) VALUES
(1, 14, '2023-01-29 12:51:55', 'accept', 1, 'i am here in your location i will collect in few hour...', '2023-01-29 12:52:17', ' i will donation there is 4 person meal...', '2023-01-29 12:52:36', 'i delivered 4 person meal into ngo.'),
(2, 15, '2023-01-29 08:11:25', 'accept', 2, 'i will come in evening...', '2023-01-29 08:11:51', 'i will collect 10 person meal...', '2023-01-29 08:12:14', 'i will delivered 10 person meal into ngo.'),
(3, 14, '2023-03-03 09:59:59', 'accept', 4, 'i will be reached at time...', '2023-03-03 10:00:25', 'parcel received successfully...', '2023-03-03 10:00:48', 'parcel delivered successfully...'),
(4, 14, '2023-03-04 12:14:00', 'accept', 3, 'i will be reached at time...', '2023-03-04 12:14:28', 'i will coloect 3 person meal...', '2023-03-04 12:14:43', 'I will delivered 3 persong meal into ngo...'),
(5, 18, '2023-04-07 10:58:46', 'accept', 5, 'I will be reached to collect donation at 11:00 am', '2023-04-07 11:02:05', 'i will receive for 4 person meal for ngo..', '2023-04-07 11:13:05', ' i will delivered food in NGO.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `area`
--
ALTER TABLE `area`
  ADD PRIMARY KEY (`area_id`),
  ADD KEY `city_id` (`city_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`city_id`),
  ADD KEY `state_id` (`state_id`);

--
-- Indexes for table `donation`
--
ALTER TABLE `donation`
  ADD PRIMARY KEY (`d_id`),
  ADD KEY `cat_id` (`cat_id`,`city_id`,`area_id`,`user_id`),
  ADD KEY `area_id` (`area_id`),
  ADD KEY `city_id` (`city_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`e_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`f_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `inquiry`
--
ALTER TABLE `inquiry`
  ADD PRIMARY KEY (`inq_id`);

--
-- Indexes for table `money_donation`
--
ALTER TABLE `money_donation`
  ADD PRIMARY KEY (`m_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `event_id` (`event_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`state_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `area_id` (`area_id`,`city_id`,`role_id`),
  ADD KEY `city_id` (`city_id`),
  ADD KEY `role_id` (`role_id`);

--
-- Indexes for table `volunteer_acceptance`
--
ALTER TABLE `volunteer_acceptance`
  ADD PRIMARY KEY (`v_id`),
  ADD KEY `user_id` (`user_id`,`d_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `area`
--
ALTER TABLE `area`
  MODIFY `area_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `city_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `donation`
--
ALTER TABLE `donation`
  MODIFY `d_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `e_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `f_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `inquiry`
--
ALTER TABLE `inquiry`
  MODIFY `inq_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `money_donation`
--
ALTER TABLE `money_donation`
  MODIFY `m_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `state`
--
ALTER TABLE `state`
  MODIFY `state_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `volunteer_acceptance`
--
ALTER TABLE `volunteer_acceptance`
  MODIFY `v_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `area`
--
ALTER TABLE `area`
  ADD CONSTRAINT `area_ibfk_1` FOREIGN KEY (`city_id`) REFERENCES `city` (`city_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `city`
--
ALTER TABLE `city`
  ADD CONSTRAINT `city_ibfk_1` FOREIGN KEY (`state_id`) REFERENCES `state` (`state_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `donation`
--
ALTER TABLE `donation`
  ADD CONSTRAINT `donation_ibfk_1` FOREIGN KEY (`area_id`) REFERENCES `area` (`area_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `donation_ibfk_2` FOREIGN KEY (`city_id`) REFERENCES `city` (`city_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `donation_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `event`
--
ALTER TABLE `event`
  ADD CONSTRAINT `event_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `money_donation`
--
ALTER TABLE `money_donation`
  ADD CONSTRAINT `money_donation_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`city_id`) REFERENCES `city` (`city_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_ibfk_2` FOREIGN KEY (`area_id`) REFERENCES `area` (`area_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_ibfk_3` FOREIGN KEY (`role_id`) REFERENCES `role` (`role_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
