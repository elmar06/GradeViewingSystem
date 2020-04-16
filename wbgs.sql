-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 16, 2020 at 06:29 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wbgs`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblassign`
--

CREATE TABLE `tblassign` (
  `id` int(11) NOT NULL,
  `subj_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `sy` varchar(20) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblassign`
--

INSERT INTO `tblassign` (`id`, `subj_id`, `teacher_id`, `sy`, `status`) VALUES
(1, 1, 3, 'SY 2020-2021', 1),
(2, 3, 3, 'SY 2020-2021', 1),
(3, 4, 5, 'SY 2020-2021', 1),
(4, 3, 5, 'SY 2020-2021', 1),
(5, 2, 5, 'SY 2020-2021', 1),
(6, 1, 4, 'SY 2020-2021', 1),
(7, 3, 4, 'SY 2020-2021', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbldepartment`
--

CREATE TABLE `tbldepartment` (
  `id` int(11) NOT NULL,
  `dept_code` varchar(20) NOT NULL,
  `dept_desc` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbldepartment`
--

INSERT INTO `tbldepartment` (`id`, `dept_code`, `dept_desc`) VALUES
(1, 'SCS', 'School of Computer Studies'),
(2, 'STE', 'School of Teacher Education'),
(3, 'SLS', 'School of Liberal Studies'),
(4, 'SBS', 'School of Bussiness Studies'),
(5, 'REG', 'School Registrar');

-- --------------------------------------------------------

--
-- Table structure for table `tblenrolled`
--

CREATE TABLE `tblenrolled` (
  `id` int(11) NOT NULL,
  `subj_id` int(11) NOT NULL,
  `student_id` varchar(20) NOT NULL,
  `semester` varchar(20) NOT NULL,
  `enroll_sy` varchar(20) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblenrolled`
--

INSERT INTO `tblenrolled` (`id`, `subj_id`, `student_id`, `semester`, `enroll_sy`, `status`) VALUES
(1, 1, '4', '1st Sem', 'SY 2020-2021', 1),
(2, 4, '3', '1st Sem', 'SY 2020-2021', 1),
(3, 3, '3', '1st Sem', 'SY 2020-2021', 1),
(4, 3, '4', '1st Sem', 'SY 2020-2021', 1),
(5, 3, '6', '1st Sem', 'SY 2020-2021', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblfaculty`
--

CREATE TABLE `tblfaculty` (
  `id` int(11) NOT NULL,
  `user_id` varchar(20) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `access` int(11) NOT NULL,
  `dept_id` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblfaculty`
--

INSERT INTO `tblfaculty` (`id`, `user_id`, `firstname`, `lastname`, `username`, `password`, `access`, `dept_id`, `status`) VALUES
(1, 'DCSC-001', 'Elmar', 'Malazarte', 'elmar.malazarte', 'e10adc3949ba59abbe56e057f20f883e', 1, 1, 1),
(2, 'DSTE-001', 'Paul', 'Boyoyos', 'paul.boyoyos', 'e10adc3949ba59abbe56e057f20f883e', 1, 2, 1),
(3, 'INSTRC0001', 'Marie Fe', 'Yap', 'mariafe.yap', 'e10adc3949ba59abbe56e057f20f883e', 2, 1, 1),
(4, 'INSTRC0003', 'Remegio', 'Ayuda', 'remegio.ayuda', 'e10adc3949ba59abbe56e057f20f883e', 2, 1, 1),
(5, 'INSTRC0004', 'Myra', 'Perez', 'myra.perez', 'e10adc3949ba59abbe56e057f20f883e', 2, 1, 1),
(6, 'INSTRC0005', 'Krystel', 'Ajias', 'krystel.ajias', 'e10adc3949ba59abbe56e057f20f883e', 2, 1, 1),
(7, 'INSTRC0020', 'Danilo', 'Patalinghug', 'danilo.patalinghug', 'e10adc3949ba59abbe56e057f20f883e', 2, 1, 1),
(8, 'REG00001', 'Jan', 'Lim', 'jan.lim', 'e10adc3949ba59abbe56e057f20f883e', 3, 5, 1),
(9, 'INSTRC0006', 'Carlo', 'Espinosa', 'carlo.espinosa', 'e10adc3949ba59abbe56e057f20f883e', 2, 1, 1),
(10, 'INSTRC0007', 'Jeffrey', 'Monilla', 'jeffrey.monilla', 'e10adc3949ba59abbe56e057f20f883e', 2, 3, 1),
(11, 'undefined', 'undefined', 'undefined', 'undefined', 'e10adc3949ba59abbe56e057f20f883e', 0, 0, 1),
(12, 'undefined', 'undefined', 'undefined', 'undefined', 'e10adc3949ba59abbe56e057f20f883e', 0, 0, 1),
(13, 'undefined', 'undefined', 'undefined', 'undefined', 'e10adc3949ba59abbe56e057f20f883e', 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblgrade`
--

CREATE TABLE `tblgrade` (
  `id` int(11) NOT NULL,
  `subj_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `midterm` varchar(20) DEFAULT NULL,
  `final` varchar(20) DEFAULT NULL,
  `sy` varchar(20) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblgrade`
--

INSERT INTO `tblgrade` (`id`, `subj_id`, `student_id`, `midterm`, `final`, `sy`, `status`) VALUES
(1, 1, 4, '3.0', '2.7', 'SY 2020-2021', 1),
(2, 4, 3, '', '', 'SY 2020-2021', 1),
(3, 3, 3, '2.1', '1.2', 'SY 2020-2021', 1),
(4, 3, 4, '1.2', '1.4', 'SY 2020-2021', 1),
(5, 3, 6, '1.1', '1.3', 'SY 2020-2021', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblstudent`
--

CREATE TABLE `tblstudent` (
  `id` int(11) NOT NULL,
  `std_no_id` varchar(15) NOT NULL,
  `std_fn` varchar(50) NOT NULL,
  `std_ln` varchar(50) NOT NULL,
  `std_course` varchar(20) NOT NULL,
  `std_dept` varchar(50) NOT NULL,
  `std_pass` varchar(50) NOT NULL,
  `std_stat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblstudent`
--

INSERT INTO `tblstudent` (`id`, `std_no_id`, `std_fn`, `std_ln`, `std_course`, `std_dept`, `std_pass`, `std_stat`) VALUES
(1, '20-00001', 'Sylvia', 'Boyoyos', 'BSHRM', 'SBS', 'e10adc3949ba59abbe56e057f20f883e', 1),
(2, '20-00002', 'Ronalyn', 'Dawa', 'BSHRM', 'SBS', 'e10adc3949ba59abbe56e057f20f883e', 1),
(3, '20-00003', 'Armand', 'Alvarez', 'BSIT', 'SCS', 'e10adc3949ba59abbe56e057f20f883e', 1),
(4, '20-00004', 'Rovee Paul', 'Bayoyos', 'BSIT', 'SCS', 'e10adc3949ba59abbe56e057f20f883e', 1),
(5, '20-00005', 'Mark Vincent', 'Jayme', 'BSIT', 'SCS', 'e10adc3949ba59abbe56e057f20f883e', 1),
(6, '20-00006', 'Rosyl Ann', 'Bayoyos', 'BSED-English', 'STE', 'e10adc3949ba59abbe56e057f20f883e', 1),
(7, '20-00007', 'Aileen Mariel', 'Fuentes', 'BSBA-FM', 'SBS', 'e10adc3949ba59abbe56e057f20f883e', 1),
(8, '20-00008', 'Aira Marie', 'Fuentes', 'BSBA-FM', 'SBS', 'e10adc3949ba59abbe56e057f20f883e', 1),
(9, '20-00009', 'Ronnel', 'Villacarlos', 'BSIT', 'SCS', 'e10adc3949ba59abbe56e057f20f883e', 1),
(10, '20-00010', 'John Carlo', 'Espinosa', 'BSIT', 'SCS', 'e10adc3949ba59abbe56e057f20f883e', 0),
(11, '21', 'Geno', 'Tangpos', 'BSIT', 'SCS', 'e10adc3949ba59abbe56e057f20f883e', 0),
(12, '20-0012', 'John', 'Doe', 'BSIT', 'SCS', 'e10adc3949ba59abbe56e057f20f883e', 0),
(13, '20-00013', 'Jane', 'Doe', 'BSIT', 'SCS', 'e10adc3949ba59abbe56e057f20f883e', 0),
(14, '20-00014', 'Elmar', 'Malazarte', 'BSIT', 'SCS', 'e10adc3949ba59abbe56e057f20f883e', 1),
(15, '20-00015', 'Carlo', 'Espinosa', 'BSIT', 'SCS', 'e10adc3949ba59abbe56e057f20f883e', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblsubject`
--

CREATE TABLE `tblsubject` (
  `subj_id` int(20) NOT NULL,
  `subj_code` varchar(20) NOT NULL,
  `subj_desc` varchar(50) NOT NULL,
  `subj_time` varchar(20) NOT NULL,
  `subj_day` varchar(20) NOT NULL,
  `subj_sem` varchar(20) NOT NULL,
  `subj_sy` varchar(20) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblsubject`
--

INSERT INTO `tblsubject` (`subj_id`, `subj_code`, `subj_desc`, `subj_time`, `subj_day`, `subj_sem`, `subj_sy`, `status`) VALUES
(1, 'CC 101', 'Introduction to Computing', '2:00pm-3:00pm', 'MWF', '1st sem', 'SY 2020-2021', 1),
(2, 'MATH 1', 'College Algebra', '7:00am-8:00am', 'MWF', '2nd sem', 'SY 2020-2021', 1),
(3, 'IT 106', 'Probability and Statistics', '1:00pm-2:00pm', 'TTH', '1st sem', 'SY 2020-2021', 1),
(4, 'OOPROG', 'Object Oriented Programming', '8:00am-9:00am', 'TTH', '2nd Sem', 'SY 2020-2021', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblassign`
--
ALTER TABLE `tblassign`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbldepartment`
--
ALTER TABLE `tbldepartment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblenrolled`
--
ALTER TABLE `tblenrolled`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblfaculty`
--
ALTER TABLE `tblfaculty`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblgrade`
--
ALTER TABLE `tblgrade`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblstudent`
--
ALTER TABLE `tblstudent`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblsubject`
--
ALTER TABLE `tblsubject`
  ADD PRIMARY KEY (`subj_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblassign`
--
ALTER TABLE `tblassign`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbldepartment`
--
ALTER TABLE `tbldepartment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tblenrolled`
--
ALTER TABLE `tblenrolled`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tblfaculty`
--
ALTER TABLE `tblfaculty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tblgrade`
--
ALTER TABLE `tblgrade`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tblstudent`
--
ALTER TABLE `tblstudent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tblsubject`
--
ALTER TABLE `tblsubject`
  MODIFY `subj_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
