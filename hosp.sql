-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 19, 2021 at 10:39 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hosp`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminid` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `usertype` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminid`, `username`, `password`, `status`, `usertype`) VALUES
(1, 'admin', 'admin', 'Active', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `appoinment`
--

CREATE TABLE `appoinment` (
  `appoinmentid` int(11) NOT NULL,
  `appoinmenttype` varchar(50) NOT NULL,
  `patientid` int(50) NOT NULL,
  `roomid` int(50) NOT NULL,
  `departmentid` int(50) NOT NULL,
  `appoinmentdate` varchar(50) NOT NULL,
  `appoinmenttime` varchar(50) NOT NULL,
  `doctorid` int(50) NOT NULL,
  `symptom` varchar(255) NOT NULL,
  `appstatus` varchar(255) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appoinment`
--

INSERT INTO `appoinment` (`appoinmentid`, `appoinmenttype`, `patientid`, `roomid`, `departmentid`, `appoinmentdate`, `appoinmenttime`, `doctorid`, `symptom`, `appstatus`, `status`) VALUES
(1, '', 1, 0, 1, '04/07/2020', '10:00', 1, 'fever', 'Confirm', 'Active'),
(2, '', 2, 0, 1, '07/07/2020', '10:00', 1, 'fever', 'Confirm', 'Active'),
(3, '', 3, 0, 1, '10/07/2020', '10:00', 1, 'fever', 'Confirm', 'Active'),
(4, '', 4, 0, 1, '10/07/2020', '10:15', 1, 'fever', 'Confirm', 'Active'),
(5, '', 1, 0, 1, '10/07/2020', '10:30', 1, 'fever', 'Confirm', 'Active'),
(6, '', 5, 0, 1, '10/07/2020', '10:45', 1, 'fever', 'Confirm', 'Active'),
(7, '', 1, 0, 1, '10/07/2020', '11:00', 1, 'fever', 'Confirm', 'Active'),
(8, '', 1, 0, 1, '11/07/2020', '10:00', 1, 'fever', 'Confirm', 'Active'),
(9, '', 7, 0, 1, '13/07/2020', '10:00', 1, 'fever', 'Pending', 'Active'),
(10, '', 8, 0, 1, '26/07/2020', '06:00', 1, 'fever', 'Confirm', 'Active'),
(11, '', 9, 0, 1, '27/07/2020', '10:00', 1, 'fever', 'Confirm', 'Active'),
(12, '', 10, 0, 1, '27/07/2020', '06:00', 1, 'fever', 'Confirm', 'Active'),
(14, '', 1, 0, 1, '19/05/2021', '12:14', 1, 'fever', 'Pending', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `chart`
--

CREATE TABLE `chart` (
  `chartid` int(50) NOT NULL,
  `month` varchar(50) NOT NULL,
  `patientcount` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chart`
--

INSERT INTO `chart` (`chartid`, `month`, `patientcount`) VALUES
(1, 'jan', '5'),
(2, 'July', '5'),
(3, 'August', '6');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `departmentid` int(50) NOT NULL,
  `departmentname` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`departmentid`, `departmentname`, `description`, `status`) VALUES
(1, 'Children doctor', 'All kinds of disease', 'Active'),
(2, 'ENT Specialist', 'Ear, Nose and Tongue Doctor', 'Active'),
(3, 'Neurologist', 'Related neurons, bones', 'Active'),
(4, 'Surgery', 'Includes plastic surgery, brain and neurology surgery', 'Active'),
(5, 'Pediatrics', 'Pediatrics doctor', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `doctorid` int(50) NOT NULL,
  `doctorname` varchar(255) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `departmentid` int(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `cpassword` varchar(50) NOT NULL,
  `dob` varchar(50) NOT NULL,
  `euniversity` varchar(255) NOT NULL,
  `edegree` varchar(255) NOT NULL,
  `experience` varchar(255) NOT NULL,
  `consultancy_charge` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`doctorid`, `doctorname`, `mobile`, `departmentid`, `email`, `password`, `cpassword`, `dob`, `euniversity`, `edegree`, `experience`, `consultancy_charge`, `address`, `image`, `status`) VALUES
(1, ' Lokesh Kumar Chopra', '9812453678', 1, 'lokesh@gmail.com', 'jkm', 'jkm', '25/06/2020', 'International College of Medical Science', 'MBBS', 'Consultant Gynecologist(7 years)', '700', 'San Fransico', 'doctor-thumb-01.jpg', 'Active'),
(2, 'Divya', '8756332456', 2, 'divya@gmail.com', 'jkm', 'jkm', '25/06/2020', 'International College of Medical Science', 'MBBS', 'Consultant Gynecologist(7 years)', '700', 'San Fransico', 'doctor-thumb-03.jpg', 'Active'),
(3, 'Rashmi', ' 9876543210', 3, 'rashmi@gmail.com', 'jkm', 'jkm', '25/06/2020', 'International College of Medical Science', 'MBBS', 'Consultant Gynecologist(7 years)', '700', '', 'doctor-thumb-05.jpg', 'Active'),
(4, 'chaitra', '8785674654', 4, 'chaitra@gmail.com', 'jkm', 'jkm', '25/06/2020', 'International College of Medical Science', 'MBBS', 'Consultant Gynecologist(7 years)', '700', 'San Fransico', 'doctor-thumb-02.jpg', 'Active'),
(5, ' vidya', ' 986555566', 5, 'vidya@gmail.com', 'jkm', 'jkm', '25/06/2020', 'International College of Medical Science', 'MBBS', 'Consultant Gynecologist(7 years)', '700', 'San Fransico', 'doctor-thumb-07.jpg', 'Active'),
(6, 'kiran', '9812453678', 1, 'kiran@gmail.com', 'jkm', 'jkm', '25/06/2020', 'International College of Medical Science', 'MBBS', 'Consultant Gynecologist(7 years)', '700', 'San Fransico', 'doctor-thumb-05.jpg', 'Active'),
(7, 'Subhi', '9812453678', 1, 'subhi@gmail.com', 'jkm', 'jkm', '25/06/2020', 'International College of Medical Science', 'MBBS', 'Consultant Gynecologist(7 years)', '700', 'San Fransico', 'doctor-thumb-08.jpg', 'Active'),
(8, 'jyoti', '9812453678', 1, 'jyoti@gmail.com', 'jkm', 'jkm', '25/06/2020', 'International College of Medical Science', 'MBBS', 'Consultant Gynecologist(7 years)', '700', 'San Fransico', 'doctor-thumb-10.jpg', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `doctor_timings`
--

CREATE TABLE `doctor_timings` (
  `doctor_timings_id` int(50) NOT NULL,
  `departmentid` int(50) NOT NULL,
  `doctorid` int(50) NOT NULL,
  `date` varchar(255) NOT NULL,
  `morning` varchar(50) NOT NULL,
  `mortime` varchar(50) NOT NULL,
  `evening` varchar(50) NOT NULL,
  `evetime` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctor_timings`
--

INSERT INTO `doctor_timings` (`doctor_timings_id`, `departmentid`, `doctorid`, `date`, `morning`, `mortime`, `evening`, `evetime`, `status`) VALUES
(1, 1, 1, '28/06/2020', 'Morning', '10:00 AM-12:00 PM', 'Evening', '6:00 PM-8:00 PM', 'Active'),
(2, 1, 8, '28/06/2020', 'Morning', '10:15 AM-12:15 PM', 'Evening', '-', 'Active'),
(3, 1, 7, '28/06/2020', 'Morning', '10:00 AM-12:00 PM', 'Evening', '6:15 PM-8:15 PM', 'Active'),
(4, 2, 2, '28/06/2020', 'Morning', '3:00 PM-5:00 PM', 'Evening', '-', 'Active'),
(5, 3, 3, '28/06/2020', 'Morning', '10:00 AM-12:00 PM', 'Evening', '6:00 PM-8:00 PM', 'Active'),
(6, 1, 1, '04/07/2020', 'Morning', '10:00 AM-12:00 PM', 'Evening', '6:00 PM-8:00 PM', 'Active'),
(7, 1, 1, '07/07/2020', 'Morning', '10:00 AM-12:00 PM', 'Evening', '6:00 PM-8:00 PM', 'Active'),
(8, 1, 1, '10/07/2020', 'Morning', '10:00 AM-12:00 PM', 'Evening', '6:00 PM-8:00 PM', 'Active'),
(9, 1, 1, '11/07/2020', 'Morning', '10:00 AM-12:00 PM', 'Evening', '6:00 PM-8:00 PM', 'Active'),
(10, 1, 1, '13/07/2020', 'Morning', '10:00 AM-12:00 PM', 'Evening', '6:00 PM-8:00 PM', 'Active'),
(11, 1, 1, '26/07/2020', 'Morning', '10:00 AM-12:00 PM', 'Evening', '6:00 PM-8:00 PM', 'Active'),
(12, 1, 1, '27/07/2020', 'Morning', '10:00 AM-12:00 PM', 'Evening', '6:00 PM-8:00 PM', 'Active'),
(13, 2, 2, '13/02/2021', 'Morning', '-', 'Evening', '6:42 PM-8:42 PM', 'Active'),
(14, 1, 1, '19/05/2021', 'Morning', '12:14 PM-3:14 PM', 'Evening', '4:15 PM-10:15 PM', 'Active'),
(15, 1, 1, '21/05/2021', 'Morning', '9:11 AM-12:11 PM', 'Evening', '1:11 PM-11:12 PM', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `patientid` int(11) NOT NULL,
  `patientname` varchar(50) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `cpassword` varchar(50) NOT NULL,
  `address` varchar(255) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `dob` varchar(50) NOT NULL,
  `logdate` varchar(255) NOT NULL,
  `logtime` varchar(255) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`patientid`, `patientname`, `mobile`, `email`, `password`, `cpassword`, `address`, `gender`, `dob`, `logdate`, `logtime`, `status`) VALUES
(1, 'jk', '9812453678', 'himangpt786@gmail.com', '1234', '1234', 'San Fransico', 'Male', '10/05/2021', '14/05/2021', '01:10', 'Active'),
(2, 'jk', '9812453678', 'jk@gmail.com', '123', '123', 'San Fransico', 'Male', '11/05/2021', '16/05/2021', '01:02', 'Active'),
(3, '', '', '', '', '', '', '', '', '16-05-2021 23:17', '', ''),
(4, 'jkjkkk', '', 'himangpt7986@gmail.com', 'admin@123', '', '', '', '', '16-05-2021 23:17', '', ''),
(5, 'jkjkkk', '1234567890', 'himangpt7896@gmail.com', 'admin@123', '', '', '', '', '16-05-2021 23:26', '', ''),
(6, 'jkjkkk', '1234567890', 'himangpt79986@gmail.com', 'admin@123', '', '', '', '', '16-05-2021 23:36', '', ''),
(7, 'jkjkkk', '1234567890', 'himangp9t786@gmail.com', 'admin@123', '', '', '', '', '16-05-2021 23:38', '', ''),
(8, 'jk', '9812453678', 'himangpt7386@gmail.com', '1234', '1234', 'San Fransico', 'Male', '03/05/2021', '17/05/2021', '23:47', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `prescription_records`
--

CREATE TABLE `prescription_records` (
  `prescriptionid` int(11) NOT NULL,
  `doctorid` int(50) NOT NULL,
  `patientid` int(50) NOT NULL,
  `appoinmentid` int(50) NOT NULL,
  `prescriptiondate` varchar(255) NOT NULL,
  `symptom` varchar(300) NOT NULL,
  `medicine` varchar(300) NOT NULL,
  `diagnose` varchar(300) NOT NULL,
  `test` varchar(300) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prescription_records`
--

INSERT INTO `prescription_records` (`prescriptionid`, `doctorid`, `patientid`, `appoinmentid`, `prescriptiondate`, `symptom`, `medicine`, `diagnose`, `test`, `status`) VALUES
(1, 1, 1, 1, '07/07/2020', 'fever', 'dolo 500mg (3 times)\r\ndescprin (3 times)', 'fever', 'Blood Test', 'Active'),
(2, 1, 2, 2, '10/07/2020', 'Fever', 'Dolo 500mg (3 times)\r\nDisprin (2 times)\r\nSaradon (2 times)', 'fever', 'Blood test', 'Active'),
(3, 1, 2, 2, '10/07/2020', 'Fever', 'Dolo 500mg (3 times)\r\nDisprin (2 times)\r\nSaradon (2 times)', 'fever', 'Blood test', 'Active'),
(4, 1, 3, 3, '10/07/2020', 'fever', 'dolo (3 times)\r\nsaradon (3 times)\r\ndisprin (3 times)', 'fever', 'Blood Test', 'Active'),
(5, 1, 3, 3, '10/07/2020', 'fever', 'dolo (3 times)\r\nsaradon (3 times)\r\ndisprin (3 times)', 'fever', 'Blood Test', 'Active'),
(6, 1, 3, 3, '10/07/2020', 'fever', 'dolo (3 times)\r\nsaradon (3 times)\r\ndisprin (3 times)', 'fever', 'Blood Test', 'Active'),
(7, 1, 3, 3, '10/07/2020', 'fever', 'dolo (3 times)\r\nsaradon (3 times)\r\ndisprin (3 times)', 'fever', 'Blood Test', 'Active'),
(8, 1, 3, 3, '10/07/0202', 'fever', 'dolo (3 times)\r\nsitrazin (3 times)\r\n', 'fever', 'Blood Test', 'Active'),
(9, 1, 3, 3, '10/07/0202', 'fever', 'dolo (3 times)\r\nsitrazin (3 times)\r\n', 'fever', 'Blood Test', 'Active'),
(10, 1, 3, 3, '10/07/2020', 'jj', 'j', 'j', 'jkj', 'Active'),
(11, 1, 3, 3, '10/07/2020', 'jj', 'j', 'j', 'jkj', 'Active'),
(12, 1, 3, 3, '10/07/2020', 'jj', 'j', 'j', 'jkj', 'Active'),
(13, 1, 3, 3, '10/07/2020', 'jA', 'DHA', 'JCHSI', 'DHSI', 'Active'),
(14, 1, 4, 4, '10/07/2020', 'JK', 'JK', 'JK', 'JK', 'Active'),
(15, 1, 4, 4, '10/07/2020', 'JK', 'JK', 'JK', 'JK', 'Active'),
(16, 1, 4, 4, '10/07/2020', 'hdsj', 'jdj', 'jdjk', 'jdj', 'Active'),
(17, 1, 4, 4, '10/07/2020', 'mxca', 'JCASOJ', 'JSO', 'nms', 'Active'),
(18, 1, 4, 4, '10/07/2020', 'msc', 'kjsw', 'jvos', 'js', 'Active'),
(19, 1, 4, 4, '10/07/2020', 'hjsd', 'jsj', 'jsdj', 'jdj', 'Active'),
(20, 1, 4, 4, '10/07/2020', 'gi', 'HKJ', 'GHJQ', 'BKNQ', 'Active'),
(21, 1, 4, 4, '10/07/2020', 'g', 'g', 'g`', 'f', 'Active'),
(22, 1, 4, 4, '10/07/2020', 'bhh', 'f', 'f', 'f', 'Active'),
(23, 1, 4, 4, '10/07/2020', 'nhjo1', 'g', 'gh', 'gf', 'Active'),
(24, 1, 4, 4, '10/07/2020', 'g', 'f', 'f', 'f', 'Active'),
(25, 1, 4, 4, '10/07/2020', 'nh', 'qhj', 'g', 'fg', 'Active'),
(26, 1, 4, 4, '10/07/2020', 'nh', 'qhj', 'g', 'fg', 'Active'),
(27, 1, 4, 4, '10/07/2020', '', '', '', '', 'Active'),
(28, 1, 4, 4, '10/07/2020', '', '', '', '', 'Active'),
(29, 1, 4, 4, '10/07/2020', '', '', '', '', 'Active'),
(30, 1, 4, 4, '10/07/2020', '', '', '', '', 'Active'),
(31, 1, 4, 4, '10/07/2020', '', '', '', '', 'Active'),
(32, 1, 4, 4, '10/07/2020', '', '', '', '', 'Active'),
(33, 1, 4, 4, '', '', '', '', '', 'Active'),
(34, 1, 4, 4, '10/07/2020', '', '', '', '', 'Active'),
(35, 1, 4, 4, '', '', '', '', '', 'Active'),
(36, 1, 4, 4, '', '', '', '', '', 'Active'),
(37, 1, 4, 4, '', '', '', '', '', 'Active'),
(38, 1, 4, 4, '10/07/2020', '', '', '', '', 'Active'),
(39, 1, 4, 4, '10/07/2020', '', '', '', '', 'Active'),
(40, 1, 4, 4, '', '', '', '', '', 'Active'),
(41, 1, 4, 4, '', '', '', '', '', 'Active'),
(42, 1, 4, 4, '', '', '', '', '', 'Active'),
(43, 1, 4, 4, '', '', '', '', '', 'Active'),
(44, 1, 4, 4, '', '', '', '', '', 'Active'),
(45, 1, 4, 4, '', '', '', '', '', 'Active'),
(46, 1, 4, 4, '', '', '', '', '', 'Active'),
(47, 1, 4, 4, '', '', '', '', '', 'Active'),
(48, 1, 4, 4, '', '', '', '', '', 'Active'),
(49, 1, 4, 4, '', '', '', '', '', 'Active'),
(50, 1, 4, 4, '', '', '', '', '', 'Active'),
(51, 1, 4, 4, '', '', '', '', '', 'Active'),
(52, 1, 4, 4, '', '', '', '', '', 'Active'),
(53, 1, 1, 1, '10/07/2020', '', '', '', '', 'Active'),
(54, 1, 1, 1, '', '', '', '', '', 'Active'),
(55, 1, 1, 1, '', '', '', '', '', 'Active'),
(56, 1, 1, 1, '', '', '', '', '', 'Active'),
(57, 1, 1, 1, '', '', '', '', '', 'Active'),
(58, 1, 1, 1, '10/07/2020', '', '', '', '', 'Active'),
(59, 1, 1, 1, '10/07/2020', '', '', '', '', 'Active'),
(60, 1, 1, 5, '', 'h', 'g', '', '', 'Active'),
(61, 1, 1, 5, '', '', '', '', '', 'Active'),
(62, 1, 1, 5, '', '', '', '', '', 'Active'),
(63, 1, 1, 5, '', '', '', '', '', 'Active'),
(64, 1, 1, 5, '', '', '', '', '', 'Active'),
(65, 1, 1, 5, '', '', '', '', '', 'Active'),
(71, 1, 1, 1, '10/07/2020', 'rrr', '', 'gg', '', 'Active'),
(72, 1, 1, 1, '10/07/2020', 'h', 'g', 'g', '`g', 'Active'),
(73, 1, 1, 1, '', '', '', '', '', 'Active'),
(74, 1, 1, 1, '', '', '', '', '', 'Active'),
(75, 1, 1, 1, '', '', '', '', '', 'Active'),
(76, 1, 1, 1, '', '', '', '', '', 'Active'),
(77, 1, 1, 1, '', '', '', '', '', 'Active'),
(78, 1, 1, 1, '', '', '', '', '', 'Active'),
(79, 1, 1, 1, '', '', '', '', '', 'Active'),
(80, 1, 1, 1, '', '', '', '', '', 'Active'),
(81, 1, 1, 1, '', '', '', '', '', 'Active'),
(82, 1, 1, 1, '10/07/2020', 'hji', 'hj', 'ghh', 'gy', 'Active'),
(83, 1, 1, 8, '11/07/2020', 'lll', 'LLll', 'LL', 'LL', 'Active'),
(84, 1, 8, 10, '26/07/2020', 'fever', 'dolo 3 times', 'fever', 'blood', 'Active'),
(85, 1, 10, 12, '27/07/2020', 'fever', 'gbkjhkk', 'FEVER', 'blood', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userid` int(11) NOT NULL,
  `patientname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `signup_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `otp` varchar(255) NOT NULL,
  `activation_code` varchar(255) NOT NULL,
  `reset_code` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `patientname`, `email`, `mobile`, `password`, `signup_time`, `otp`, `activation_code`, `reset_code`, `status`) VALUES
(2, 'jk', 'himangpt786@gmail.com', '1234567890', '051a9911de7b5bbc610b76f4eda834a0', '2021-06-05 12:47:10', '', 'l08fijgnmak5dh5b2ce', '', 'Active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminid`);

--
-- Indexes for table `appoinment`
--
ALTER TABLE `appoinment`
  ADD PRIMARY KEY (`appoinmentid`);

--
-- Indexes for table `chart`
--
ALTER TABLE `chart`
  ADD PRIMARY KEY (`chartid`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`departmentid`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`doctorid`);

--
-- Indexes for table `doctor_timings`
--
ALTER TABLE `doctor_timings`
  ADD PRIMARY KEY (`doctor_timings_id`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`patientid`);

--
-- Indexes for table `prescription_records`
--
ALTER TABLE `prescription_records`
  ADD PRIMARY KEY (`prescriptionid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `appoinment`
--
ALTER TABLE `appoinment`
  MODIFY `appoinmentid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `chart`
--
ALTER TABLE `chart`
  MODIFY `chartid` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `departmentid` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `doctorid` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `doctor_timings`
--
ALTER TABLE `doctor_timings`
  MODIFY `doctor_timings_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `patientid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `prescription_records`
--
ALTER TABLE `prescription_records`
  MODIFY `prescriptionid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
