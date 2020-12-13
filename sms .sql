-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 04, 2020 at 11:07 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sms`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendenc`
--

CREATE TABLE `attendenc` (
  `school_reg_no` varchar(20) NOT NULL,
  `staff_reg_no` varchar(20) NOT NULL,
  `attend` varchar(3) NOT NULL,
  `date` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `building`
--

CREATE TABLE `building` (
  `name` varchar(20) NOT NULL,
  `school_Reg_no` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `building`
--

INSERT INTO `building` (`name`, `school_Reg_no`) VALUES
('block1', 'S1277');

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `name` varchar(10) NOT NULL,
  `school_Reg_no` varchar(20) NOT NULL,
  `year` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `class_allocation`
--

CREATE TABLE `class_allocation` (
  `room_no` varchar(20) NOT NULL,
  `building_name` varchar(20) NOT NULL,
  `school_reg_no` varchar(20) NOT NULL,
  `class` varchar(10) NOT NULL,
  `stream` varchar(10) NOT NULL,
  `year` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `inventory_number` varchar(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `type` varchar(20) NOT NULL,
  `specification` varchar(20) NOT NULL,
  `school_reg_no` varchar(20) NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`inventory_number`, `name`, `type`, `specification`, `school_reg_no`, `status`) VALUES
('Ch-46575', 'Chair', 'furniture', 'wood', 'S1277', 'Good'),
('Ch-64688', 'Chair', 'furniture', 'steel', 'S1277', 'Good'),
('Ch-64757', 'Chair', 'furniture', 'wood', 'S1277', 'Good'),
('Cp-34466', 'Computer', 'dell', 'del-354', 'S1277', 'not-good'),
('Cp-465757', 'Computer', 'hp', 'hp-1234', 'S1277', 'Good'),
('Dks-34626', 'Desk', 'furniture', 'wood', 'S1277', 'Good'),
('Dks-35427', 'Desk', 'furniture', 'wood', 'S1277', 'Good'),
('pr-12643', 'printer', 'tool', 'hp', 'S1277', 'good'),
('Tb-35576', 'Table', 'furniture', 'glass', 'S1277', 'bad'),
('Tb-56847', 'Table', 'furniture', 'wood', 'S1277', 'Good'),
('Tb-68645', 'Table', 'furniture', 'plastic', 'S1277', 'Good'),
('Tb/2465', 'Table', 'furniture', 'wood', 'S1277', 'good');

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE `results` (
  `school_reg_no` varchar(20) NOT NULL,
  `student_reg_number` varchar(20) NOT NULL,
  `examination_name` varchar(20) NOT NULL,
  `subject_name` varchar(20) NOT NULL,
  `year` varchar(4) NOT NULL,
  `score` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `no` varchar(20) NOT NULL,
  `building_name` varchar(20) NOT NULL,
  `school_reg_no` varchar(20) NOT NULL,
  `capacity` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`no`, `building_name`, `school_reg_no`, `capacity`) VALUES
('R-120', 'block1', 'S1277', 120);

-- --------------------------------------------------------

--
-- Table structure for table `school`
--

CREATE TABLE `school` (
  `school_reg_no` varchar(20) NOT NULL,
  `school_name` varchar(20) NOT NULL,
  `region` text NOT NULL,
  `district` text NOT NULL,
  `ward` text NOT NULL,
  `logo` varchar(100) NOT NULL DEFAULT 'img/school _logo/default_thumb.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `school`
--

INSERT INTO `school` (`school_reg_no`, `school_name`, `region`, `district`, `ward`, `logo`) VALUES
('S0000', 'admin', 'any', 'any', 'any', 'img/school _logo/default_thumb.png'),
('S1277', 'Jangwani High ', 'Dar es Salaam', 'Ilala', 'upanga', 'img/school_logo/school_logo.png'),
('S2356', 'Benjamin Mkapa', 'Dar es Salaam', 'ilala', 'kariakoo', 'img/school _logo/default_thumb.png');

-- --------------------------------------------------------

--
-- Table structure for table `school_exams`
--

CREATE TABLE `school_exams` (
  `school_reg_no` varchar(20) NOT NULL,
  `exam_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `school_subject`
--

CREATE TABLE `school_subject` (
  `subject_name` varchar(20) NOT NULL,
  `school_Reg_no` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `school_text_books`
--

CREATE TABLE `school_text_books` (
  `id` varchar(20) NOT NULL,
  `school_Reg_no` varchar(20) NOT NULL,
  `name` text NOT NULL,
  `type` text NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `school_text_books`
--

INSERT INTO `school_text_books` (`id`, `school_Reg_no`, `name`, `type`, `status`) VALUES
('art3464', 'S1277', 'phsichal geography ', 'art', 'good');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `reg_no` varchar(20) NOT NULL,
  `first_name` varchar(10) NOT NULL,
  `second_name` varchar(10) NOT NULL,
  `last_name` varchar(10) NOT NULL,
  `school_reg_no` varchar(20) NOT NULL,
  `rank` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL DEFAULT 'e0a8aa81eb1762d529783cf587f6f422',
  `img` varchar(100) DEFAULT 'img/profile_img/images.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`reg_no`, `first_name`, `second_name`, `last_name`, `school_reg_no`, `rank`, `password`, `img`) VALUES
('st12367', 'Erick', 'jackson', 'Endraw', 'S1277', 'headmaster', 'e0a8aa81eb1762d529783cf587f6f422', 'img/profile_img/images.png'),
('st1254', 'john', 'Frank', 'Eddy', 'S2356', 'headmaster', 'e0a8aa81eb1762d529783cf587f6f422', 'img/profile_img/images.png'),
('stf1000', 'frank', 'John', 'Erick', 'S0000', 'admin', 'e0a8aa81eb1762d529783cf587f6f422', 'img/profile_img/images.png'),
('stf12464', 'FREDRICK', 'JOHN', 'Felix', 'S1277', 'resource', 'e0a8aa81eb1762d529783cf587f6f422', 'img/profile_img/stf12464photo-1522075469751-3a6694fb2f61.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `stream`
--

CREATE TABLE `stream` (
  `name` varchar(5) NOT NULL,
  `class_name` varchar(10) NOT NULL,
  `year` varchar(4) NOT NULL,
  `school_reg_no` varchar(20) NOT NULL,
  `class_teacher` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `reg_no` varchar(20) NOT NULL,
  `school_Reg_no` varchar(20) NOT NULL,
  `first_name` varchar(10) NOT NULL,
  `second_name` varchar(10) NOT NULL,
  `last_name` varchar(10) NOT NULL,
  `year_enrolled` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `studies`
--

CREATE TABLE `studies` (
  `school_reg_no` varchar(20) NOT NULL,
  `student_reg_number` varchar(20) NOT NULL,
  `subject_name` varchar(20) NOT NULL,
  `class_name` varchar(10) NOT NULL,
  `year` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `name` varchar(20) NOT NULL,
  `number_of_class_per_week` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `teaches`
--

CREATE TABLE `teaches` (
  `teacher_reg_no` varchar(20) NOT NULL,
  `subject_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendenc`
--
ALTER TABLE `attendenc`
  ADD PRIMARY KEY (`school_reg_no`,`staff_reg_no`,`attend`,`date`),
  ADD KEY `school_reg_no` (`school_reg_no`),
  ADD KEY `staff_reg_no` (`staff_reg_no`);

--
-- Indexes for table `building`
--
ALTER TABLE `building`
  ADD PRIMARY KEY (`name`,`school_Reg_no`),
  ADD KEY `school_Reg_no` (`school_Reg_no`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`name`,`school_Reg_no`,`year`),
  ADD KEY `school_Reg_no` (`school_Reg_no`),
  ADD KEY `school_Reg_no_2` (`school_Reg_no`);

--
-- Indexes for table `class_allocation`
--
ALTER TABLE `class_allocation`
  ADD PRIMARY KEY (`room_no`,`building_name`,`school_reg_no`,`class`,`stream`,`year`),
  ADD KEY `room_no` (`room_no`),
  ADD KEY `building_name` (`building_name`),
  ADD KEY `school_reg_no` (`school_reg_no`),
  ADD KEY `class` (`class`),
  ADD KEY `stream` (`stream`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`inventory_number`,`name`,`type`,`specification`,`school_reg_no`),
  ADD KEY `school_reg_no` (`school_reg_no`);

--
-- Indexes for table `results`
--
ALTER TABLE `results`
  ADD PRIMARY KEY (`school_reg_no`,`student_reg_number`,`examination_name`,`subject_name`,`year`),
  ADD KEY `school_reg_no` (`school_reg_no`),
  ADD KEY `student_reg_number` (`student_reg_number`),
  ADD KEY `subject_name` (`subject_name`),
  ADD KEY `examination_name` (`examination_name`),
  ADD KEY `year` (`year`),
  ADD KEY `examination_name_2` (`examination_name`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`no`,`building_name`,`school_reg_no`),
  ADD KEY `building_name` (`building_name`),
  ADD KEY `school_reg_no` (`school_reg_no`);

--
-- Indexes for table `school`
--
ALTER TABLE `school`
  ADD PRIMARY KEY (`school_reg_no`,`school_name`);

--
-- Indexes for table `school_exams`
--
ALTER TABLE `school_exams`
  ADD PRIMARY KEY (`school_reg_no`,`exam_name`),
  ADD KEY `school_reg_no` (`school_reg_no`),
  ADD KEY `exam_name` (`exam_name`);

--
-- Indexes for table `school_subject`
--
ALTER TABLE `school_subject`
  ADD PRIMARY KEY (`subject_name`,`school_Reg_no`),
  ADD KEY `school_Reg_no` (`school_Reg_no`),
  ADD KEY `subject_name` (`subject_name`);

--
-- Indexes for table `school_text_books`
--
ALTER TABLE `school_text_books`
  ADD PRIMARY KEY (`id`,`school_Reg_no`),
  ADD KEY `school_Reg_no` (`school_Reg_no`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`reg_no`,`first_name`,`second_name`,`last_name`,`school_reg_no`),
  ADD KEY `school_reg_no` (`school_reg_no`);

--
-- Indexes for table `stream`
--
ALTER TABLE `stream`
  ADD PRIMARY KEY (`name`,`class_name`,`year`,`school_reg_no`,`class_teacher`),
  ADD KEY `class_name` (`class_name`),
  ADD KEY `class_name_2` (`class_name`),
  ADD KEY `school_reg_no` (`school_reg_no`),
  ADD KEY `year` (`year`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`reg_no`,`school_Reg_no`,`first_name`,`second_name`,`last_name`,`year_enrolled`),
  ADD KEY `school_Reg_no` (`school_Reg_no`);

--
-- Indexes for table `studies`
--
ALTER TABLE `studies`
  ADD PRIMARY KEY (`school_reg_no`,`student_reg_number`,`subject_name`,`class_name`,`year`),
  ADD KEY `school_reg_no` (`school_reg_no`),
  ADD KEY `student_reg_number` (`student_reg_number`),
  ADD KEY `subject_name` (`subject_name`),
  ADD KEY `class_name` (`class_name`),
  ADD KEY `year` (`year`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `teaches`
--
ALTER TABLE `teaches`
  ADD PRIMARY KEY (`teacher_reg_no`,`subject_name`),
  ADD KEY `teacher_reg_no` (`teacher_reg_no`),
  ADD KEY `subject_name` (`subject_name`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendenc`
--
ALTER TABLE `attendenc`
  ADD CONSTRAINT `attendenc_ibfk_1` FOREIGN KEY (`school_reg_no`) REFERENCES `school` (`school_reg_no`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `attendenc_ibfk_2` FOREIGN KEY (`staff_reg_no`) REFERENCES `staff` (`reg_no`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `building`
--
ALTER TABLE `building`
  ADD CONSTRAINT `building_ibfk_1` FOREIGN KEY (`school_Reg_no`) REFERENCES `school` (`school_reg_no`);

--
-- Constraints for table `class`
--
ALTER TABLE `class`
  ADD CONSTRAINT `class_ibfk_1` FOREIGN KEY (`school_Reg_no`) REFERENCES `school` (`school_reg_no`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `class_allocation`
--
ALTER TABLE `class_allocation`
  ADD CONSTRAINT `class_allocation_ibfk_1` FOREIGN KEY (`building_name`) REFERENCES `building` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `class_allocation_ibfk_2` FOREIGN KEY (`class`) REFERENCES `class` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `class_allocation_ibfk_3` FOREIGN KEY (`room_no`) REFERENCES `room` (`no`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `class_allocation_ibfk_4` FOREIGN KEY (`school_reg_no`) REFERENCES `school` (`school_reg_no`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `class_allocation_ibfk_5` FOREIGN KEY (`stream`) REFERENCES `stream` (`class_name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `inventory`
--
ALTER TABLE `inventory`
  ADD CONSTRAINT `inventory_ibfk_1` FOREIGN KEY (`school_reg_no`) REFERENCES `school` (`school_reg_no`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `results`
--
ALTER TABLE `results`
  ADD CONSTRAINT `results_ibfk_1` FOREIGN KEY (`school_reg_no`) REFERENCES `school` (`school_reg_no`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `results_ibfk_2` FOREIGN KEY (`student_reg_number`) REFERENCES `student` (`school_Reg_no`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `results_ibfk_3` FOREIGN KEY (`subject_name`) REFERENCES `subject` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `results_ibfk_4` FOREIGN KEY (`examination_name`) REFERENCES `school_exams` (`exam_name`);

--
-- Constraints for table `room`
--
ALTER TABLE `room`
  ADD CONSTRAINT `room_ibfk_1` FOREIGN KEY (`school_reg_no`) REFERENCES `school` (`school_reg_no`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `room_ibfk_2` FOREIGN KEY (`building_name`) REFERENCES `building` (`name`);

--
-- Constraints for table `school_exams`
--
ALTER TABLE `school_exams`
  ADD CONSTRAINT `school_exams_ibfk_1` FOREIGN KEY (`school_reg_no`) REFERENCES `school` (`school_reg_no`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `school_subject`
--
ALTER TABLE `school_subject`
  ADD CONSTRAINT `school_subject_ibfk_1` FOREIGN KEY (`school_Reg_no`) REFERENCES `school` (`school_reg_no`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `school_subject_ibfk_2` FOREIGN KEY (`subject_name`) REFERENCES `subject` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `school_text_books`
--
ALTER TABLE `school_text_books`
  ADD CONSTRAINT `school_text_books_ibfk_1` FOREIGN KEY (`school_Reg_no`) REFERENCES `school` (`school_reg_no`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `staff`
--
ALTER TABLE `staff`
  ADD CONSTRAINT `staff_ibfk_1` FOREIGN KEY (`school_reg_no`) REFERENCES `school` (`school_reg_no`);

--
-- Constraints for table `stream`
--
ALTER TABLE `stream`
  ADD CONSTRAINT `stream_ibfk_1` FOREIGN KEY (`class_name`) REFERENCES `class` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `stream_ibfk_2` FOREIGN KEY (`school_reg_no`) REFERENCES `school` (`school_reg_no`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`school_Reg_no`) REFERENCES `school` (`school_reg_no`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `studies`
--
ALTER TABLE `studies`
  ADD CONSTRAINT `studies_ibfk_1` FOREIGN KEY (`class_name`) REFERENCES `class` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `studies_ibfk_2` FOREIGN KEY (`school_reg_no`) REFERENCES `school` (`school_reg_no`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `studies_ibfk_3` FOREIGN KEY (`student_reg_number`) REFERENCES `student` (`reg_no`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `studies_ibfk_4` FOREIGN KEY (`subject_name`) REFERENCES `subject` (`name`);

--
-- Constraints for table `teaches`
--
ALTER TABLE `teaches`
  ADD CONSTRAINT `teaches_ibfk_1` FOREIGN KEY (`teacher_reg_no`) REFERENCES `staff` (`reg_no`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `teaches_ibfk_2` FOREIGN KEY (`subject_name`) REFERENCES `subject` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
