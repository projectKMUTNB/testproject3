-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 16, 2018 at 06:03 PM
-- Server version: 5.7.17-log
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `messs`
--

-- --------------------------------------------------------

--
-- Table structure for table `admintable`
--

CREATE TABLE `admintable` (
  `admin_id` bigint(20) NOT NULL,
  `username` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_id` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admintable`
--

INSERT INTO `admintable` (`admin_id`, `username`, `password`, `status_id`) VALUES
(1, 'admin', 'admin', 1),
(2, 'admin2', 'admin', 2);

-- --------------------------------------------------------

--
-- Table structure for table `apprenticeship`
--

CREATE TABLE `apprenticeship` (
  `ap_id` bigint(20) NOT NULL,
  `student_code` bigint(20) NOT NULL,
  `company_code` bigint(20) NOT NULL,
  `mentor_code` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `choicerecordcompany`
--

CREATE TABLE `choicerecordcompany` (
  `crc_id` bigint(20) NOT NULL,
  `crc_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `mrc_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `choicerecordstudent`
--

CREATE TABLE `choicerecordstudent` (
  `crs_id` bigint(20) NOT NULL,
  `crs_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `mrs_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `company_code` bigint(20) NOT NULL,
  `company_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_email` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_tel` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`company_code`, `company_name`, `company_address`, `company_email`, `company_tel`) VALUES
(100, 'บริษัท 123เกมส์เมอร์ จำกัด มหาชน', 'บ้านเลขที่ 12/3 หมู่ 4 ต.เนินหอม อ.เมือง จ.ปราจีนบุรี', '123gameremail.com', '012-345678'),
(101, 'test', 'test', 'test', '123456789'),
(102, 'test', 'test', 'test', '123456789');

-- --------------------------------------------------------

--
-- Table structure for table `evaluationcompany`
--

CREATE TABLE `evaluationcompany` (
  `ec_id` bigint(20) NOT NULL,
  `company_code` bigint(20) NOT NULL,
  `ec_score` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `evaluationstudent`
--

CREATE TABLE `evaluationstudent` (
  `es_id` bigint(20) NOT NULL,
  `student_code` bigint(20) NOT NULL,
  `es_score` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `location_id` bigint(20) NOT NULL,
  `location_x` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `location_y` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `student_code` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mainrecordcompany`
--

CREATE TABLE `mainrecordcompany` (
  `mrc_id` bigint(20) NOT NULL,
  `mrc_name` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mainrecordstudent`
--

CREATE TABLE `mainrecordstudent` (
  `mrs_id` bigint(20) NOT NULL,
  `mrs_name` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mentor`
--

CREATE TABLE `mentor` (
  `mentor_code` bigint(20) NOT NULL,
  `mentor_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `mentor_surname` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `mentor_tel` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_code` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mentor`
--

INSERT INTO `mentor` (`mentor_code`, `mentor_name`, `mentor_surname`, `mentor_tel`, `company_code`) VALUES
(10001, 'ประยุทธ', 'ใจบ๊องแบ๊ว', '012-3456789', 100);

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `status_id` tinyint(4) NOT NULL,
  `status_name` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`status_id`, `status_name`) VALUES
(1, 'Admintrator'),
(2, 'Secondary Admin'),
(3, 'Teacher'),
(4, 'Student');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `student_code` bigint(13) NOT NULL,
  `student_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `student_surname` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `student_department` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_id` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_code`, `student_name`, `student_surname`, `student_department`, `status_id`) VALUES
(5806021420164, 'ศิวกร', 'มีบุญ', 'ITI', 4),
(5806021420172, 'สมปนาท', 'ไกรสิทธิ์สกุล', 'ITI', 4);

-- --------------------------------------------------------

--
-- Table structure for table `supervision`
--

CREATE TABLE `supervision` (
  `sv_id` bigint(20) NOT NULL,
  `student_code` bigint(20) NOT NULL,
  `teacher_code` bigint(20) NOT NULL,
  `location_id` bigint(20) NOT NULL,
  `sv_date` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `teacher_code` bigint(10) NOT NULL,
  `teacher_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `teacher_surname` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `teacher_position` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `teacher_department` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_id` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`teacher_code`, `teacher_name`, `teacher_surname`, `teacher_position`, `teacher_department`, `status_id`) VALUES
(1001, 'นพเก้า', 'ทองใบ', 'อาจารย์', 'ITI', 3),
(1002, 'วิชญา', 'รุ่นสุวรรณ์', 'อาจารย์', 'ITI', 3),
(1003, 'ยุพิน', 'สรรพคุณ', 'อาจารย์', 'ITI', 3),
(1004, 'นิมิต', 'ศรีคำทา', 'อาจารย์', 'ITI', 3),
(1005, 'นัฎฐพันธ์', 'นาคพงษ์', 'อาจารย์', 'ITI', 3);

-- --------------------------------------------------------

--
-- Table structure for table `travelbill`
--

CREATE TABLE `travelbill` (
  `tb_code` bigint(20) NOT NULL,
  `location_id` bigint(20) NOT NULL COMMENT 'ปลายทาง',
  `departfrom` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'ออกเดินทาง',
  `tb_timego` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tb_timeback` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tb_date` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `vehicle` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `totaldistancego` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `totaldistanceback` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `totalmoney` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admintable`
--
ALTER TABLE `admintable`
  ADD PRIMARY KEY (`admin_id`),
  ADD KEY `status_id` (`status_id`);

--
-- Indexes for table `apprenticeship`
--
ALTER TABLE `apprenticeship`
  ADD PRIMARY KEY (`ap_id`),
  ADD KEY `student_code` (`student_code`),
  ADD KEY `company_code` (`company_code`),
  ADD KEY `mentor_code` (`mentor_code`);

--
-- Indexes for table `choicerecordcompany`
--
ALTER TABLE `choicerecordcompany`
  ADD PRIMARY KEY (`crc_id`),
  ADD KEY `mrc_id` (`mrc_id`);

--
-- Indexes for table `choicerecordstudent`
--
ALTER TABLE `choicerecordstudent`
  ADD PRIMARY KEY (`crs_id`),
  ADD KEY `mrs_id` (`mrs_id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`company_code`);

--
-- Indexes for table `evaluationcompany`
--
ALTER TABLE `evaluationcompany`
  ADD PRIMARY KEY (`ec_id`),
  ADD KEY `company_code` (`company_code`);

--
-- Indexes for table `evaluationstudent`
--
ALTER TABLE `evaluationstudent`
  ADD PRIMARY KEY (`es_id`),
  ADD KEY `student_code` (`student_code`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`location_id`),
  ADD KEY `student_code` (`student_code`);

--
-- Indexes for table `mainrecordcompany`
--
ALTER TABLE `mainrecordcompany`
  ADD PRIMARY KEY (`mrc_id`);

--
-- Indexes for table `mainrecordstudent`
--
ALTER TABLE `mainrecordstudent`
  ADD PRIMARY KEY (`mrs_id`);

--
-- Indexes for table `mentor`
--
ALTER TABLE `mentor`
  ADD PRIMARY KEY (`mentor_code`),
  ADD KEY `company_code` (`company_code`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`status_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_code`),
  ADD KEY `status_id` (`status_id`);

--
-- Indexes for table `supervision`
--
ALTER TABLE `supervision`
  ADD PRIMARY KEY (`sv_id`),
  ADD KEY `student_code` (`student_code`),
  ADD KEY `teacher_code` (`teacher_code`),
  ADD KEY `location_id` (`location_id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`teacher_code`),
  ADD KEY `status_id` (`status_id`);

--
-- Indexes for table `travelbill`
--
ALTER TABLE `travelbill`
  ADD PRIMARY KEY (`tb_code`),
  ADD KEY `location_id` (`location_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admintable`
--
ALTER TABLE `admintable`
  MODIFY `admin_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `apprenticeship`
--
ALTER TABLE `apprenticeship`
  MODIFY `ap_id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `choicerecordcompany`
--
ALTER TABLE `choicerecordcompany`
  MODIFY `crc_id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `choicerecordstudent`
--
ALTER TABLE `choicerecordstudent`
  MODIFY `crs_id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `company_code` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;
--
-- AUTO_INCREMENT for table `evaluationcompany`
--
ALTER TABLE `evaluationcompany`
  MODIFY `ec_id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `evaluationstudent`
--
ALTER TABLE `evaluationstudent`
  MODIFY `es_id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `location_id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `mainrecordcompany`
--
ALTER TABLE `mainrecordcompany`
  MODIFY `mrc_id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `mainrecordstudent`
--
ALTER TABLE `mainrecordstudent`
  MODIFY `mrs_id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `mentor`
--
ALTER TABLE `mentor`
  MODIFY `mentor_code` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10002;
--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `status_id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `student_code` bigint(13) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2147483647;
--
-- AUTO_INCREMENT for table `supervision`
--
ALTER TABLE `supervision`
  MODIFY `sv_id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `teacher_code` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1006;
--
-- AUTO_INCREMENT for table `travelbill`
--
ALTER TABLE `travelbill`
  MODIFY `tb_code` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `admintable`
--
ALTER TABLE `admintable`
  ADD CONSTRAINT `admintable_ibfk_1` FOREIGN KEY (`status_id`) REFERENCES `status` (`status_id`);

--
-- Constraints for table `apprenticeship`
--
ALTER TABLE `apprenticeship`
  ADD CONSTRAINT `apprenticeship_ibfk_1` FOREIGN KEY (`student_code`) REFERENCES `student` (`student_code`),
  ADD CONSTRAINT `apprenticeship_ibfk_2` FOREIGN KEY (`company_code`) REFERENCES `company` (`company_code`),
  ADD CONSTRAINT `apprenticeship_ibfk_3` FOREIGN KEY (`mentor_code`) REFERENCES `mentor` (`mentor_code`);

--
-- Constraints for table `choicerecordcompany`
--
ALTER TABLE `choicerecordcompany`
  ADD CONSTRAINT `choicerecordcompany_ibfk_1` FOREIGN KEY (`mrc_id`) REFERENCES `mainrecordcompany` (`mrc_id`);

--
-- Constraints for table `choicerecordstudent`
--
ALTER TABLE `choicerecordstudent`
  ADD CONSTRAINT `choicerecordstudent_ibfk_1` FOREIGN KEY (`mrs_id`) REFERENCES `mainrecordstudent` (`mrs_id`);

--
-- Constraints for table `evaluationcompany`
--
ALTER TABLE `evaluationcompany`
  ADD CONSTRAINT `evaluationcompany_ibfk_1` FOREIGN KEY (`company_code`) REFERENCES `company` (`company_code`);

--
-- Constraints for table `evaluationstudent`
--
ALTER TABLE `evaluationstudent`
  ADD CONSTRAINT `evaluationstudent_ibfk_1` FOREIGN KEY (`student_code`) REFERENCES `student` (`student_code`);

--
-- Constraints for table `location`
--
ALTER TABLE `location`
  ADD CONSTRAINT `location_ibfk_1` FOREIGN KEY (`student_code`) REFERENCES `student` (`student_code`);

--
-- Constraints for table `mentor`
--
ALTER TABLE `mentor`
  ADD CONSTRAINT `mentor_ibfk_1` FOREIGN KEY (`company_code`) REFERENCES `company` (`company_code`);

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`status_id`) REFERENCES `status` (`status_id`);

--
-- Constraints for table `supervision`
--
ALTER TABLE `supervision`
  ADD CONSTRAINT `supervision_ibfk_1` FOREIGN KEY (`student_code`) REFERENCES `student` (`student_code`),
  ADD CONSTRAINT `supervision_ibfk_2` FOREIGN KEY (`teacher_code`) REFERENCES `teacher` (`teacher_code`),
  ADD CONSTRAINT `supervision_ibfk_3` FOREIGN KEY (`location_id`) REFERENCES `location` (`location_id`);

--
-- Constraints for table `teacher`
--
ALTER TABLE `teacher`
  ADD CONSTRAINT `teacher_ibfk_1` FOREIGN KEY (`status_id`) REFERENCES `status` (`status_id`);

--
-- Constraints for table `travelbill`
--
ALTER TABLE `travelbill`
  ADD CONSTRAINT `travelbill_ibfk_1` FOREIGN KEY (`location_id`) REFERENCES `location` (`location_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
