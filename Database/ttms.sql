-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 17, 2019 at 01:32 PM
-- Server version: 10.1.40-MariaDB
-- PHP Version: 7.3.5

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ttms`
--
CREATE DATABASE IF NOT EXISTS `ttms` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `ttms`;

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--
-- Creation: Jun 09, 2019 at 07:14 AM
--

DROP TABLE IF EXISTS `admin_login`;
CREATE TABLE IF NOT EXISTS `admin_login` (
  `admin_id` int(10) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `admin_login`:
--

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`admin_id`, `email`, `pass`) VALUES
(1, 'sudheerkancham4@gmail.com', 'sudheer123');

-- --------------------------------------------------------

--
-- Table structure for table `class_table`
--
-- Creation: Jun 09, 2019 at 07:14 AM
--

DROP TABLE IF EXISTS `class_table`;
CREATE TABLE IF NOT EXISTS `class_table` (
  `class_id` int(10) NOT NULL AUTO_INCREMENT,
  `batch_year` int(10) NOT NULL,
  PRIMARY KEY (`class_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `class_table`:
--

--
-- Dumping data for table `class_table`
--

INSERT INTO `class_table` (`class_id`, `batch_year`) VALUES
(1, 2015),
(2, 2016);

-- --------------------------------------------------------

--
-- Table structure for table `course_cataloge`
--
-- Creation: Jun 09, 2019 at 07:14 AM
--

DROP TABLE IF EXISTS `course_cataloge`;
CREATE TABLE IF NOT EXISTS `course_cataloge` (
  `course_id` int(10) NOT NULL AUTO_INCREMENT,
  `course_name` text NOT NULL,
  PRIMARY KEY (`course_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `course_cataloge`:
--

--
-- Dumping data for table `course_cataloge`
--

INSERT INTO `course_cataloge` (`course_id`, `course_name`) VALUES
(1, 'Operating System'),
(2, 'WAD'),
(3, 'Software Consturuction'),
(4, 'ADA'),
(5, 'Stats'),
(6, 'Biology'),
(7, 'Web Technologies'),
(8, 'Project 2'),
(9, 'ICT&S'),
(10, 'M&S'),
(11, 'STT');

-- --------------------------------------------------------

--
-- Table structure for table `course_t_teacher`
--
-- Creation: Jun 09, 2019 at 07:14 AM
--

DROP TABLE IF EXISTS `course_t_teacher`;
CREATE TABLE IF NOT EXISTS `course_t_teacher` (
  `course_t_id` int(10) NOT NULL AUTO_INCREMENT,
  `course_id` int(10) NOT NULL,
  `teacher_id` int(10) NOT NULL,
  PRIMARY KEY (`course_t_id`),
  KEY `course_id` (`course_id`,`teacher_id`),
  KEY `teacher_id` (`teacher_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `course_t_teacher`:
--   `course_id`
--       `course_cataloge` -> `course_id`
--   `teacher_id`
--       `teacher_login` -> `teacher_id`
--

--
-- Dumping data for table `course_t_teacher`
--

INSERT INTO `course_t_teacher` (`course_t_id`, `course_id`, `teacher_id`) VALUES
(1, 1, 1),
(9, 1, 7),
(2, 2, 3),
(3, 3, 2),
(6, 4, 4),
(7, 5, 5),
(8, 6, 6);

-- --------------------------------------------------------

--
-- Table structure for table `day_table`
--
-- Creation: Jun 09, 2019 at 07:14 AM
--

DROP TABLE IF EXISTS `day_table`;
CREATE TABLE IF NOT EXISTS `day_table` (
  `day_id` int(10) NOT NULL AUTO_INCREMENT,
  `day_name` varchar(10) NOT NULL,
  PRIMARY KEY (`day_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `day_table`:
--

--
-- Dumping data for table `day_table`
--

INSERT INTO `day_table` (`day_id`, `day_name`) VALUES
(6, 'Monday'),
(7, 'Tuesday'),
(8, 'Wednesday'),
(9, 'Thrusday'),
(10, 'Friday');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--
-- Creation: Jun 09, 2019 at 07:14 AM
--

DROP TABLE IF EXISTS `message`;
CREATE TABLE IF NOT EXISTS `message` (
  `message_id` int(10) NOT NULL AUTO_INCREMENT,
  `subject` varchar(100) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `template_id` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`message_id`),
  KEY `template_id` (`template_id`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `message`:
--

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`message_id`, `subject`, `description`, `template_id`) VALUES
(16, 'class cancellation of Biology ', '            Dear teacher, your class of Biology of  date:1/1012018 time:3:40 Room:G2 is cancelled and will be held on date:15/1/2018 time:3:40 in Room:G2.          ', 1),
(18, 'About Holiday', '          Hi, teachers i notify that university will remain close from Friday to Monday due to stricke.\r\n          Thanks,\r\n          Regards:Admin.', 0),
(24, 'About Meeting', '          Asalam-o-Alikum <br>\r\n          Mam, Your meeting will be held on Monday 29/jan/2018.<br>\r\n          Thanks,<br>\r\n           Regards:Admin<br>', 0),
(35, 'hello', '          Please come tomorrow with your laptops.', 0),
(37, 'testing123', '          hi i am 123', 0),
(42, 'hello sir', '          your meeting is cancelled.....', 0),
(43, 'class cancellation of ADA', '            Dear students, your class of ADA of  date:11/1/2017 time:9:00-10:30  Room:R208 is cancelled and will be held on date:14/1/2017  time:9:00-10:30  in Room:R206.          ', 2),
(44, 'class', '          vbvbvvbbv', 0),
(45, 'testing', '          hello mam....', 0),
(46, 'test', '          hello bilal ...', 0);

-- --------------------------------------------------------

--
-- Table structure for table `message_student_table`
--
-- Creation: Jun 09, 2019 at 07:14 AM
--

DROP TABLE IF EXISTS `message_student_table`;
CREATE TABLE IF NOT EXISTS `message_student_table` (
  `message_s_rec_id` int(10) NOT NULL AUTO_INCREMENT,
  `course_id` int(10) NOT NULL,
  `message_id` int(10) NOT NULL,
  PRIMARY KEY (`message_s_rec_id`),
  KEY `course_id` (`course_id`,`message_id`),
  KEY `message_id` (`message_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `message_student_table`:
--   `course_id`
--       `course_cataloge` -> `course_id`
--   `message_id`
--       `message` -> `message_id`
--

--
-- Dumping data for table `message_student_table`
--

INSERT INTO `message_student_table` (`message_s_rec_id`, `course_id`, `message_id`) VALUES
(4, 1, 37),
(9, 2, 44),
(2, 3, 35),
(10, 3, 46),
(8, 4, 43);

-- --------------------------------------------------------

--
-- Table structure for table `message_teacher_table`
--
-- Creation: Jun 09, 2019 at 07:14 AM
--

DROP TABLE IF EXISTS `message_teacher_table`;
CREATE TABLE IF NOT EXISTS `message_teacher_table` (
  `message_t_rec_id` int(10) NOT NULL AUTO_INCREMENT,
  `teacher_id` int(10) NOT NULL,
  `message_id` int(10) NOT NULL,
  PRIMARY KEY (`message_t_rec_id`),
  KEY `teacher_id` (`teacher_id`,`message_id`),
  KEY `message_id` (`message_id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `message_teacher_table`:
--   `teacher_id`
--       `teacher_login` -> `teacher_id`
--   `message_id`
--       `message` -> `message_id`
--

--
-- Dumping data for table `message_teacher_table`
--

INSERT INTO `message_teacher_table` (`message_t_rec_id`, `teacher_id`, `message_id`) VALUES
(8, 1, 16),
(10, 1, 18),
(19, 1, 45),
(16, 2, 24),
(18, 4, 42);

-- --------------------------------------------------------

--
-- Table structure for table `offered_c_t_std`
--
-- Creation: Jun 09, 2019 at 07:14 AM
--

DROP TABLE IF EXISTS `offered_c_t_std`;
CREATE TABLE IF NOT EXISTS `offered_c_t_std` (
  `offered_id` int(10) NOT NULL AUTO_INCREMENT,
  `course_id` int(10) NOT NULL,
  `student_id` int(10) NOT NULL,
  PRIMARY KEY (`offered_id`),
  KEY `course_id` (`course_id`),
  KEY `student_id` (`student_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `offered_c_t_std`:
--   `course_id`
--       `course_cataloge` -> `course_id`
--   `student_id`
--       `student_login` -> `std_id`
--

--
-- Dumping data for table `offered_c_t_std`
--

INSERT INTO `offered_c_t_std` (`offered_id`, `course_id`, `student_id`) VALUES
(4, 3, 1),
(5, 1, 1),
(7, 1, 4),
(8, 3, 4),
(10, 4, 3),
(11, 4, 2),
(12, 6, 5);

-- --------------------------------------------------------

--
-- Table structure for table `room_cataloge`
--
-- Creation: Jun 09, 2019 at 07:14 AM
--

DROP TABLE IF EXISTS `room_cataloge`;
CREATE TABLE IF NOT EXISTS `room_cataloge` (
  `room_id` int(10) NOT NULL AUTO_INCREMENT,
  `room_name` varchar(100) NOT NULL,
  PRIMARY KEY (`room_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `room_cataloge`:
--

--
-- Dumping data for table `room_cataloge`
--

INSERT INTO `room_cataloge` (`room_id`, `room_name`) VALUES
(4, 'R203'),
(5, 'R209'),
(9, 'R206'),
(10, 'R208');

-- --------------------------------------------------------

--
-- Table structure for table `semester_table`
--
-- Creation: Jun 09, 2019 at 07:14 AM
--

DROP TABLE IF EXISTS `semester_table`;
CREATE TABLE IF NOT EXISTS `semester_table` (
  `sem_id` int(10) NOT NULL AUTO_INCREMENT,
  `sem_name` varchar(10) NOT NULL,
  PRIMARY KEY (`sem_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `semester_table`:
--

--
-- Dumping data for table `semester_table`
--

INSERT INTO `semester_table` (`sem_id`, `sem_name`) VALUES
(1, '2017S'),
(3, '2017F'),
(4, '2018S'),
(6, '2018F'),
(7, '2000S'),
(8, '2019F'),
(9, '2020S');

-- --------------------------------------------------------

--
-- Table structure for table `student_login`
--
-- Creation: Jun 09, 2019 at 07:14 AM
--

DROP TABLE IF EXISTS `student_login`;
CREATE TABLE IF NOT EXISTS `student_login` (
  `std_id` int(10) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `pass` varchar(10) NOT NULL,
  `class_id` int(11) NOT NULL,
  PRIMARY KEY (`std_id`),
  KEY `class_id` (`class_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `student_login`:
--   `class_id`
--       `class_table` -> `class_id`
--

--
-- Dumping data for table `student_login`
--

INSERT INTO `student_login` (`std_id`, `email`, `pass`, `class_id`) VALUES
(1, 'sudheerreddy@hmail.com', 'sudheer123', 1),
(2, 'chinni@gmial.com', 'sudheer123', 1),
(3, 'kiranmayi@gmail.com', 'sudheer123', 1),
(4, '721121104018@gmail.com', 'sudheer123', 1),
(5, 'sreeramthuraka29@gmail.com', 'sudheer123', 1);

-- --------------------------------------------------------

--
-- Table structure for table `teacher_login`
--
-- Creation: Jun 09, 2019 at 07:14 AM
--

DROP TABLE IF EXISTS `teacher_login`;
CREATE TABLE IF NOT EXISTS `teacher_login` (
  `teacher_id` int(10) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL,
  PRIMARY KEY (`teacher_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `teacher_login`:
--

--
-- Dumping data for table `teacher_login`
--

INSERT INTO `teacher_login` (`teacher_id`, `email`, `pass`) VALUES
(1, 'sr9346335294@gmail.com', 'sudheer123'),
(2, 'sudheerreddy@gmail.com', 'sudheer123'),
(3, 'kalavthi@gmail.com', 'sudheer123'),
(4, 'venky@gmail.com', 'sudheer123'),
(5, 'kiranmayi@gmail.com', 'sudheer123'),
(6, 'pro.ganesh@gmail.com', 'sudheer123'),
(7, 'kotireddy@gmail.com', 'sudheer123');

-- --------------------------------------------------------

--
-- Table structure for table `template`
--
-- Creation: Jun 09, 2019 at 07:14 AM
--

DROP TABLE IF EXISTS `template`;
CREATE TABLE IF NOT EXISTS `template` (
  `temp_id` int(10) NOT NULL AUTO_INCREMENT,
  `temp_desc` varchar(1000) NOT NULL,
  `subject` varchar(100) NOT NULL,
  PRIMARY KEY (`temp_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `template`:
--

--
-- Dumping data for table `template`
--

INSERT INTO `template` (`temp_id`, `temp_desc`, `subject`) VALUES
(1, 'Dear teacher, your class of _____ of  date:____ time:_____ Room:______ is cancelled and will be held on date:_____ time:_____ in Room:_________.', 'class cancellation teacher '),
(2, 'Dear students, your class of _____ of  date:____ time:_____ Room:______ is cancelled and will be held on date:_____ time:_____ in Room:_________.', 'class cancellation student');

-- --------------------------------------------------------

--
-- Table structure for table `time_slot_table`
--
-- Creation: Jun 09, 2019 at 07:14 AM
--

DROP TABLE IF EXISTS `time_slot_table`;
CREATE TABLE IF NOT EXISTS `time_slot_table` (
  `time_id` int(10) NOT NULL AUTO_INCREMENT,
  `time_slot` varchar(100) NOT NULL,
  PRIMARY KEY (`time_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `time_slot_table`:
--

--
-- Dumping data for table `time_slot_table`
--

INSERT INTO `time_slot_table` (`time_id`, `time_slot`) VALUES
(1, '9:05-10:35'),
(2, '10:40-12:10'),
(3, '12:40-2:10'),
(4, '2:15-3:45'),
(5, '4:00-5:30'),
(6, '9:00-11:00'),
(7, '11:00-1:00'),
(8, '1:00-3:00'),
(9, '3:00-5:00');

-- --------------------------------------------------------

--
-- Table structure for table `time_table`
--
-- Creation: Jun 09, 2019 at 07:14 AM
--

DROP TABLE IF EXISTS `time_table`;
CREATE TABLE IF NOT EXISTS `time_table` (
  `lecture_id` int(10) NOT NULL AUTO_INCREMENT,
  `course_id` int(10) NOT NULL,
  `time_id` int(10) NOT NULL,
  `room_id` int(10) NOT NULL,
  `sem_id` int(10) NOT NULL,
  `day_id` int(10) NOT NULL,
  PRIMARY KEY (`lecture_id`),
  KEY `course_id` (`course_id`,`time_id`,`room_id`,`sem_id`,`day_id`),
  KEY `day_id` (`day_id`),
  KEY `room_id` (`room_id`),
  KEY `time_id` (`time_id`),
  KEY `sem_id` (`sem_id`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `time_table`:
--   `course_id`
--       `course_cataloge` -> `course_id`
--   `day_id`
--       `day_table` -> `day_id`
--   `room_id`
--       `room_cataloge` -> `room_id`
--   `time_id`
--       `time_slot_table` -> `time_id`
--   `sem_id`
--       `semester_table` -> `sem_id`
--

--
-- Dumping data for table `time_table`
--

INSERT INTO `time_table` (`lecture_id`, `course_id`, `time_id`, `room_id`, `sem_id`, `day_id`) VALUES
(34, 2, 1, 4, 8, 6),
(33, 2, 1, 9, 7, 9),
(31, 2, 2, 4, 7, 7),
(35, 3, 1, 5, 8, 6),
(32, 3, 3, 4, 7, 6),
(41, 7, 1, 4, 9, 7),
(37, 7, 1, 10, 8, 6),
(42, 8, 2, 5, 9, 7),
(36, 9, 1, 9, 8, 6),
(40, 9, 1, 9, 9, 6),
(39, 10, 1, 5, 9, 6),
(38, 11, 1, 4, 9, 6);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `course_t_teacher`
--
ALTER TABLE `course_t_teacher`
  ADD CONSTRAINT `course_t_teacher_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `course_cataloge` (`course_id`),
  ADD CONSTRAINT `course_t_teacher_ibfk_2` FOREIGN KEY (`teacher_id`) REFERENCES `teacher_login` (`teacher_id`);

--
-- Constraints for table `message_student_table`
--
ALTER TABLE `message_student_table`
  ADD CONSTRAINT `message_student_table_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `course_cataloge` (`course_id`),
  ADD CONSTRAINT `message_student_table_ibfk_2` FOREIGN KEY (`message_id`) REFERENCES `message` (`message_id`);

--
-- Constraints for table `message_teacher_table`
--
ALTER TABLE `message_teacher_table`
  ADD CONSTRAINT `message_teacher_table_ibfk_1` FOREIGN KEY (`teacher_id`) REFERENCES `teacher_login` (`teacher_id`),
  ADD CONSTRAINT `message_teacher_table_ibfk_2` FOREIGN KEY (`message_id`) REFERENCES `message` (`message_id`);

--
-- Constraints for table `offered_c_t_std`
--
ALTER TABLE `offered_c_t_std`
  ADD CONSTRAINT `offered_c_t_std_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `course_cataloge` (`course_id`),
  ADD CONSTRAINT `offered_c_t_std_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `student_login` (`std_id`);

--
-- Constraints for table `student_login`
--
ALTER TABLE `student_login`
  ADD CONSTRAINT `student_login_ibfk_1` FOREIGN KEY (`class_id`) REFERENCES `class_table` (`class_id`);

--
-- Constraints for table `time_table`
--
ALTER TABLE `time_table`
  ADD CONSTRAINT `time_table_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `course_cataloge` (`course_id`),
  ADD CONSTRAINT `time_table_ibfk_2` FOREIGN KEY (`day_id`) REFERENCES `day_table` (`day_id`),
  ADD CONSTRAINT `time_table_ibfk_3` FOREIGN KEY (`room_id`) REFERENCES `room_cataloge` (`room_id`),
  ADD CONSTRAINT `time_table_ibfk_4` FOREIGN KEY (`time_id`) REFERENCES `time_slot_table` (`time_id`),
  ADD CONSTRAINT `time_table_ibfk_5` FOREIGN KEY (`sem_id`) REFERENCES `semester_table` (`sem_id`);


--
-- Metadata
--
USE `phpmyadmin`;

--
-- Metadata for table admin_login
--
-- Error reading data for table phpmyadmin.pma__column_info: #1100 - Table 'pma__column_info' was not locked with LOCK TABLES
-- Error reading data for table phpmyadmin.pma__table_uiprefs: #1100 - Table 'pma__table_uiprefs' was not locked with LOCK TABLES
-- Error reading data for table phpmyadmin.pma__tracking: #1100 - Table 'pma__tracking' was not locked with LOCK TABLES

--
-- Metadata for table class_table
--
-- Error reading data for table phpmyadmin.pma__column_info: #1100 - Table 'pma__column_info' was not locked with LOCK TABLES
-- Error reading data for table phpmyadmin.pma__table_uiprefs: #1100 - Table 'pma__table_uiprefs' was not locked with LOCK TABLES
-- Error reading data for table phpmyadmin.pma__tracking: #1100 - Table 'pma__tracking' was not locked with LOCK TABLES

--
-- Metadata for table course_cataloge
--
-- Error reading data for table phpmyadmin.pma__column_info: #1100 - Table 'pma__column_info' was not locked with LOCK TABLES
-- Error reading data for table phpmyadmin.pma__table_uiprefs: #1100 - Table 'pma__table_uiprefs' was not locked with LOCK TABLES
-- Error reading data for table phpmyadmin.pma__tracking: #1100 - Table 'pma__tracking' was not locked with LOCK TABLES

--
-- Metadata for table course_t_teacher
--
-- Error reading data for table phpmyadmin.pma__column_info: #1100 - Table 'pma__column_info' was not locked with LOCK TABLES
-- Error reading data for table phpmyadmin.pma__table_uiprefs: #1100 - Table 'pma__table_uiprefs' was not locked with LOCK TABLES
-- Error reading data for table phpmyadmin.pma__tracking: #1100 - Table 'pma__tracking' was not locked with LOCK TABLES

--
-- Metadata for table day_table
--
-- Error reading data for table phpmyadmin.pma__column_info: #1100 - Table 'pma__column_info' was not locked with LOCK TABLES
-- Error reading data for table phpmyadmin.pma__table_uiprefs: #1100 - Table 'pma__table_uiprefs' was not locked with LOCK TABLES
-- Error reading data for table phpmyadmin.pma__tracking: #1100 - Table 'pma__tracking' was not locked with LOCK TABLES

--
-- Metadata for table message
--
-- Error reading data for table phpmyadmin.pma__column_info: #1100 - Table 'pma__column_info' was not locked with LOCK TABLES
-- Error reading data for table phpmyadmin.pma__table_uiprefs: #1100 - Table 'pma__table_uiprefs' was not locked with LOCK TABLES
-- Error reading data for table phpmyadmin.pma__tracking: #1100 - Table 'pma__tracking' was not locked with LOCK TABLES

--
-- Metadata for table message_student_table
--
-- Error reading data for table phpmyadmin.pma__column_info: #1100 - Table 'pma__column_info' was not locked with LOCK TABLES
-- Error reading data for table phpmyadmin.pma__table_uiprefs: #1100 - Table 'pma__table_uiprefs' was not locked with LOCK TABLES
-- Error reading data for table phpmyadmin.pma__tracking: #1100 - Table 'pma__tracking' was not locked with LOCK TABLES

--
-- Metadata for table message_teacher_table
--
-- Error reading data for table phpmyadmin.pma__column_info: #1100 - Table 'pma__column_info' was not locked with LOCK TABLES
-- Error reading data for table phpmyadmin.pma__table_uiprefs: #1100 - Table 'pma__table_uiprefs' was not locked with LOCK TABLES
-- Error reading data for table phpmyadmin.pma__tracking: #1100 - Table 'pma__tracking' was not locked with LOCK TABLES

--
-- Metadata for table offered_c_t_std
--
-- Error reading data for table phpmyadmin.pma__column_info: #1100 - Table 'pma__column_info' was not locked with LOCK TABLES
-- Error reading data for table phpmyadmin.pma__table_uiprefs: #1100 - Table 'pma__table_uiprefs' was not locked with LOCK TABLES
-- Error reading data for table phpmyadmin.pma__tracking: #1100 - Table 'pma__tracking' was not locked with LOCK TABLES

--
-- Metadata for table room_cataloge
--
-- Error reading data for table phpmyadmin.pma__column_info: #1100 - Table 'pma__column_info' was not locked with LOCK TABLES
-- Error reading data for table phpmyadmin.pma__table_uiprefs: #1100 - Table 'pma__table_uiprefs' was not locked with LOCK TABLES
-- Error reading data for table phpmyadmin.pma__tracking: #1100 - Table 'pma__tracking' was not locked with LOCK TABLES

--
-- Metadata for table semester_table
--
-- Error reading data for table phpmyadmin.pma__column_info: #1100 - Table 'pma__column_info' was not locked with LOCK TABLES
-- Error reading data for table phpmyadmin.pma__table_uiprefs: #1100 - Table 'pma__table_uiprefs' was not locked with LOCK TABLES
-- Error reading data for table phpmyadmin.pma__tracking: #1100 - Table 'pma__tracking' was not locked with LOCK TABLES

--
-- Metadata for table student_login
--
-- Error reading data for table phpmyadmin.pma__column_info: #1100 - Table 'pma__column_info' was not locked with LOCK TABLES
-- Error reading data for table phpmyadmin.pma__table_uiprefs: #1100 - Table 'pma__table_uiprefs' was not locked with LOCK TABLES
-- Error reading data for table phpmyadmin.pma__tracking: #1100 - Table 'pma__tracking' was not locked with LOCK TABLES

--
-- Metadata for table teacher_login
--
-- Error reading data for table phpmyadmin.pma__column_info: #1100 - Table 'pma__column_info' was not locked with LOCK TABLES
-- Error reading data for table phpmyadmin.pma__table_uiprefs: #1100 - Table 'pma__table_uiprefs' was not locked with LOCK TABLES
-- Error reading data for table phpmyadmin.pma__tracking: #1100 - Table 'pma__tracking' was not locked with LOCK TABLES

--
-- Metadata for table template
--
-- Error reading data for table phpmyadmin.pma__column_info: #1100 - Table 'pma__column_info' was not locked with LOCK TABLES
-- Error reading data for table phpmyadmin.pma__table_uiprefs: #1100 - Table 'pma__table_uiprefs' was not locked with LOCK TABLES
-- Error reading data for table phpmyadmin.pma__tracking: #1100 - Table 'pma__tracking' was not locked with LOCK TABLES

--
-- Metadata for table time_slot_table
--
-- Error reading data for table phpmyadmin.pma__column_info: #1100 - Table 'pma__column_info' was not locked with LOCK TABLES
-- Error reading data for table phpmyadmin.pma__table_uiprefs: #1100 - Table 'pma__table_uiprefs' was not locked with LOCK TABLES
-- Error reading data for table phpmyadmin.pma__tracking: #1100 - Table 'pma__tracking' was not locked with LOCK TABLES

--
-- Metadata for table time_table
--
-- Error reading data for table phpmyadmin.pma__column_info: #1100 - Table 'pma__column_info' was not locked with LOCK TABLES
-- Error reading data for table phpmyadmin.pma__table_uiprefs: #1100 - Table 'pma__table_uiprefs' was not locked with LOCK TABLES
-- Error reading data for table phpmyadmin.pma__tracking: #1100 - Table 'pma__tracking' was not locked with LOCK TABLES

--
-- Metadata for database ttms
--
-- Error reading data for table phpmyadmin.pma__bookmark: #1100 - Table 'pma__bookmark' was not locked with LOCK TABLES
-- Error reading data for table phpmyadmin.pma__relation: #1100 - Table 'pma__relation' was not locked with LOCK TABLES
-- Error reading data for table phpmyadmin.pma__savedsearches: #1100 - Table 'pma__savedsearches' was not locked with LOCK TABLES
-- Error reading data for table phpmyadmin.pma__central_columns: #1100 - Table 'pma__central_columns' was not locked with LOCK TABLES
SET FOREIGN_KEY_CHECKS=1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
