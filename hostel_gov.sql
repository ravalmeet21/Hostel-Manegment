-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 15, 2023 at 06:46 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hostel_gov`
--

-- --------------------------------------------------------

--
-- Table structure for table `emp_details`
--

CREATE TABLE `emp_details` (
  `emp_id` int(11) NOT NULL,
  `emp_name` varchar(30) NOT NULL,
  `emp_email` varchar(30) NOT NULL,
  `emp_pno` int(10) NOT NULL,
  `emp_address` varchar(50) NOT NULL,
  `emp_pen_salary` int(10) NOT NULL,
  `emp_giv_salary` int(10) NOT NULL,
  `emp_joining_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `emp_details`
--

INSERT INTO `emp_details` (`emp_id`, `emp_name`, `emp_email`, `emp_pno`, `emp_address`, `emp_pen_salary`, `emp_giv_salary`, `emp_joining_date`) VALUES
(1, 'Rajan D\'Souza', 'rajan@gmail.com', 2147483647, 'royal care, changa', 20000, 30000, '2020-01-01'),
(2, 'Dinesh patel', 'dinesh@gmail.com', 2147483647, 'bilimora, navsari', 10000, 20000, '2023-10-10'),
(3, 'Sneh patel', 'Sneh@gmail.com', 2147483647, 'sky building, nadiad', 20000, 10000, '2023-02-22');

-- --------------------------------------------------------

--
-- Table structure for table `st_details`
--

CREATE TABLE `st_details` (
  `st_id` int(10) NOT NULL,
  `st_name` varchar(30) NOT NULL,
  `st_email` varchar(30) NOT NULL,
  `st_pno` int(10) NOT NULL,
  `st_address` text NOT NULL,
  `st_room` int(5) NOT NULL,
  `st_res_fees` int(10) NOT NULL,
  `st_pen_fees` int(10) NOT NULL,
  `st_joining_data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `st_details`
--

INSERT INTO `st_details` (`st_id`, `st_name`, `st_email`, `st_pno`, `st_address`, `st_room`, `st_res_fees`, `st_pen_fees`, `st_joining_data`) VALUES
(1, 'Jay Bhagat', 'jambu@gmail.com', 2147483647, 'shridip hostel', 235, 2000, 300000, '2021-02-14'),
(2, 'kush vadhaiya', 'kusu@gmail.com', 1234567890, 'vidya nagar, gujarat', 222, 2000, 50000, '2023-10-08'),
(3, 'vansh patel', 'devloper@amazon.com', 2147483647, 'ossion leb, office, unja', 100, 500, 200000, '2020-01-01'),
(4, 'veer rana', 'veer@gmail.com', 58465896, 'royal care, changa', 100, 0, 200000, '2023-10-10'),
(5, 'karan patel', 'karan@gmail.com', 2147483647, 'morbi', 217, 40000, 45000, '2023-10-03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `emp_details`
--
ALTER TABLE `emp_details`
  ADD PRIMARY KEY (`emp_id`);

--
-- Indexes for table `st_details`
--
ALTER TABLE `st_details`
  ADD PRIMARY KEY (`st_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `emp_details`
--
ALTER TABLE `emp_details`
  MODIFY `emp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `st_details`
--
ALTER TABLE `st_details`
  MODIFY `st_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
