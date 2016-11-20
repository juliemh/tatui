-- phpMyAdmin SQL Dump
-- version 4.2.12deb2+deb8u2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 18, 2016 at 10:18 PM
-- Server version: 5.5.53-0+deb8u1
-- PHP Version: 5.6.27-0+deb8u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `tatui`
--
CREATE DATABASE IF NOT EXISTS `tatui` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `tatui`;

-- --------------------------------------------------------

--
-- Table structure for table `access_type`
--
-- Creation: Nov 14, 2016 at 08:45 PM
--

DROP TABLE IF EXISTS `access_type`;
CREATE TABLE IF NOT EXISTS `access_type` (
  `user_id` varchar(64) NOT NULL,
  `access_type` varchar(24) NOT NULL,
  `added_by_id` varchar(64) NOT NULL,
  `date_changed` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `access_type`
--

INSERT INTO `access_type` (`user_id`, `access_type`, `added_by_id`, `date_changed`) VALUES
('admin@rmit.edu.au', 'admin', 'admin@rmit.edu.au', NULL),
('john.long@student.rmit.edu.au', 'student', 'admin@rmit.edu.au', '0000-00-00 00:00:00'),
('lecturer@rmit.edu.au', 'admin', 'admin@rmit.edu.au', '2016-11-15 07:28:38'),
('s1234567@student.rmit.edu.au', 'none', 'admin@rmit.edu.au', '0000-00-00 00:00:00'),
('s1348704@student.rmit.edu.au', 'none', 'admin@rmit.edu.au', '0000-00-00 00:00:00'),
('s5555555@student.rmit.edu.au', 'none', 'admin@rmit.edu.au', '0000-00-00 00:00:00'),
('s7482747@student.rmit.edu.au', 'lecturer', 'admin@rmit.edu.au', '2016-11-15 07:28:59'),
('s7744477@student.rmit.edu.au', 'student', 'admin@rmit.edu.au', '0000-00-00 00:00:00'),
('student@student.rmit.edu.au', 'student', 'admin@rmit.edu.au', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `course`
--
-- Creation: Nov 09, 2016 at 07:33 AM
--

DROP TABLE IF EXISTS `course`;
CREATE TABLE IF NOT EXISTS `course` (
  `course_id` varchar(32) NOT NULL,
  `course_name` varchar(32) NOT NULL,
  `course_description` varchar(45) DEFAULT NULL,
  `campus` varchar(32) NOT NULL,
  `study_loading` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_id`, `course_name`, `course_description`, `campus`, `study_loading`) VALUES
('BC', 'Bachelor of Communication', 'Bachelor of Communication', '', NULL),
('BT_FT', 'Bachelor of Technology - Full Ti', 'Bachelor of Technology in computing studies', 'Melbourne', 'Full Time'),
('BT_PT', 'Bachelor of Technology - Part Ti', 'Bachelor of Technology in computing studies', 'Melbourne', 'Full Time');

-- --------------------------------------------------------

--
-- Table structure for table `course_student`
--
-- Creation: Nov 12, 2016 at 09:15 PM
--

DROP TABLE IF EXISTS `course_student`;
CREATE TABLE IF NOT EXISTS `course_student` (
  `course_id` varchar(32) NOT NULL,
  `user_id` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `course_subject`
--
-- Creation: Nov 09, 2016 at 07:33 AM
--

DROP TABLE IF EXISTS `course_subject`;
CREATE TABLE IF NOT EXISTS `course_subject` (
  `course_id` varchar(32) NOT NULL,
  `subject_id` varchar(32) NOT NULL,
  `semester_id` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `course_subject`
--

INSERT INTO `course_subject` (`course_id`, `subject_id`, `semester_id`) VALUES
('BT_FT', 'CPT112', ''),
('BT_FT', 'CPT330', ''),
('ASFDFAS', 'sdf', ''),
('BT_FT', 'cpt111', '');

-- --------------------------------------------------------

--
-- Table structure for table `project`
--
-- Creation: Nov 14, 2016 at 08:46 PM
--

DROP TABLE IF EXISTS `project`;
CREATE TABLE IF NOT EXISTS `project` (
  `project_id` varchar(32) NOT NULL,
  `project_name` varchar(32) DEFAULT NULL,
  `project_desc` varchar(255) DEFAULT NULL,
  `course_id` varchar(32) DEFAULT NULL,
  `subject_id` varchar(32) DEFAULT NULL,
  `start_date` datetime DEFAULT NULL,
  `finish_date` datetime DEFAULT NULL,
  `team_size` int(11) DEFAULT NULL,
  `date_changed` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`project_id`, `project_name`, `project_desc`, `course_id`, `subject_id`, `start_date`, `finish_date`, `team_size`, `date_changed`) VALUES
('ADFS', 'Afsd', '', '', '', '1970-01-01 00:00:00', '1970-01-01 00:00:00', 0, NULL),
('GROUP 10', 'Test Red', '', 'BT_FT', NULL, '2016-11-03 00:00:00', '2016-11-29 00:00:00', 4, NULL),
('GROUP 11', 'Android App Project', '', 'BT_FT', 'CPT330', '2016-11-01 00:00:00', '2016-11-30 00:00:00', 4, NULL),
('GROUP 12', 'Algorithm Team', '', 'BT_FT', 'CPT112', '2016-11-01 00:00:00', '2016-11-02 00:00:00', 4, NULL),
('GROUP 13', 'App Group', '', '', '', '1970-01-01 00:00:00', '1970-01-01 00:00:00', 4, NULL),
('GROUP 4', 'Test Red', '', 'BT_FT', 'CPT112', '2016-11-03 00:00:00', '2016-11-29 00:00:00', 4, NULL),
('GROUP 5', 'Blue Test', '', 'BT_FT', 'CPT330', '2016-11-01 00:00:00', '2016-11-27 00:00:00', 4, NULL),
('GROUP 6', 'Red Test', '', 'BT_FT', 'CPT330', '2016-11-01 00:00:00', '2016-11-27 00:00:00', 4, NULL),
('GROUP 9', 'Team Test', '', 'BT_FT', 'CPT330', '2016-11-02 00:00:00', '2016-11-02 00:00:00', 4, NULL),
('group1_2015', 'Team Allocation Tool', 'A tool that allocates teams based on skill levels', 'BT_FT', 'CPT000', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 10, NULL),
('PRO122', 'Project 122', '', 'BT_FT', 'CPT112', '2016-11-10 00:00:00', '2016-12-16 00:00:00', 4, NULL),
('PRO123', 'Project 123', '', 'BT_FT', 'CPT112', '2016-11-10 00:00:00', '2016-12-16 00:00:00', 4, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `project_skills`
--
-- Creation: Nov 09, 2016 at 07:33 AM
--

DROP TABLE IF EXISTS `project_skills`;
CREATE TABLE IF NOT EXISTS `project_skills` (
  `project_id` varchar(32) NOT NULL,
  `skill_id` varchar(32) DEFAULT NULL,
  `skill_level` varchar(32) DEFAULT NULL,
  `date_added` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `project_skills`
--

INSERT INTO `project_skills` (`project_id`, `skill_id`, `skill_level`, `date_added`) VALUES
('GROUP 10', 'C++', 'beginner', NULL),
('GROUP 4', 'C++', 'beginner', NULL),
('GROUP 5', 'C++', 'beginner', NULL),
('GROUP 6', 'C++', 'beginner', NULL),
('PRO122', 'C++', 'expert', NULL),
('PRO123', 'C++', 'expert', NULL),
('tat', 'C#', '1', NULL),
('GROUP 11', 'CSS3', 'beginner', NULL),
('GROUP 11', 'HTML', 'beginner', NULL),
('GROUP 11', 'PROG123', 'beginner', NULL),
('GROUP 12', 'C++', 'beginner', NULL),
('GROUP 12', 'CSS3', 'expert', NULL),
('ASDF', '1234', 'beginner', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `semester`
--
-- Creation: Nov 15, 2016 at 05:09 AM
--

DROP TABLE IF EXISTS `semester`;
CREATE TABLE IF NOT EXISTS `semester` (
  `semester_id` varchar(32) NOT NULL,
  `start` varchar(32) DEFAULT NULL,
  `finish` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `semester`
--

INSERT INTO `semester` (`semester_id`, `start`, `finish`) VALUES
('FT_1_2016', '29-01-2016', '29-06-2016'),
('FT_2_2016', '04-07-2016', '24-10-2016'),
('PT_1_2016', '29-02-2016', '29-05-2016'),
('PT_2_2016', '30-05-2016', '28-08-2016'),
('PT_3_2016', '29-08-2016', '27-11-2016'),
('PT_4_2016', '28-11-2016', '26-02-2017');

-- --------------------------------------------------------

--
-- Table structure for table `skill_dictionary`
--
-- Creation: Nov 17, 2016 at 07:10 AM
--

DROP TABLE IF EXISTS `skill_dictionary`;
CREATE TABLE IF NOT EXISTS `skill_dictionary` (
`skill_id` int(32) NOT NULL,
  `skill_category` varchar(255) DEFAULT NULL,
  `skill_description` varchar(255) DEFAULT NULL,
  `skill_added_by` varchar(32) DEFAULT NULL,
  `date_changed` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=1266 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `skill_dictionary`
--

INSERT INTO `skill_dictionary` (`skill_id`, `skill_category`, `skill_description`, `skill_added_by`, `date_changed`) VALUES
(1264, 'programming', 'programme', 'admin@test.com', '2016-11-17 07:22:12'),
(1265, 'programming', 'programme', NULL, '2016-11-17 07:22:36');

-- --------------------------------------------------------

--
-- Table structure for table `student_preferences`
--
-- Creation: Nov 15, 2016 at 08:30 PM
--

DROP TABLE IF EXISTS `student_preferences`;
CREATE TABLE IF NOT EXISTS `student_preferences` (
  `user_id` varchar(32) NOT NULL DEFAULT '',
  `project_choice_1` varchar(255) DEFAULT NULL,
  `project_choice_2` varchar(255) DEFAULT NULL,
  `project_choice_3` varchar(255) DEFAULT NULL,
  `project_choice_4` varchar(255) DEFAULT NULL,
  `project_choice_5` varchar(255) DEFAULT NULL,
  `project_choice_6` varchar(255) DEFAULT NULL,
  `project_choice_7` varchar(255) DEFAULT NULL,
  `project_choice_8` varchar(255) DEFAULT NULL,
  `project_choice_9` varchar(255) DEFAULT NULL,
  `project_choice_10` varchar(255) DEFAULT NULL,
  `team_member_choice_1` varchar(64) DEFAULT NULL,
  `team_member_choice_2` varchar(64) DEFAULT NULL,
  `team_member_choice_3` varchar(64) DEFAULT NULL,
  `date_changed` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student_skill`
--
-- Creation: Nov 09, 2016 at 07:33 AM
--

DROP TABLE IF EXISTS `student_skill`;
CREATE TABLE IF NOT EXISTS `student_skill` (
  `user_id` varchar(64) NOT NULL,
  `skill_id` varchar(32) NOT NULL,
  `skilllevel` varchar(32) NOT NULL,
  `date_added` timestamp NULL DEFAULT NULL,
  `date_changed` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `student_skill`
--

INSERT INTO `student_skill` (`user_id`, `skill_id`, `skilllevel`, `date_added`, `date_changed`) VALUES
('1234567@student.rmit.edu.au', 'C#', '1', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--
-- Creation: Nov 09, 2016 at 07:33 AM
--

DROP TABLE IF EXISTS `subject`;
CREATE TABLE IF NOT EXISTS `subject` (
  `subject_id` varchar(32) NOT NULL,
  `subject_name` varchar(32) NOT NULL,
  `subject_description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`subject_id`, `subject_name`, `subject_description`) VALUES
('CPT000', 'Programming in C#', 'Developement of skills to program in C#'),
('cpt111', 'Test subject', 'Test'),
('CPT112', 'User Centered Design', 'Interface Design'),
('CPT330', 'SE Project Management', 'Project Management ');

-- --------------------------------------------------------

--
-- Table structure for table `subject_student`
--
-- Creation: Nov 09, 2016 at 07:33 AM
--

DROP TABLE IF EXISTS `subject_student`;
CREATE TABLE IF NOT EXISTS `subject_student` (
  `user_id` varchar(64) NOT NULL,
  `subject_id` varchar(32) DEFAULT NULL,
  `subject_mark` varchar(32) DEFAULT NULL,
  `semester_id` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--
-- Creation: Nov 14, 2016 at 08:44 PM
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `user_id` varchar(64) NOT NULL,
  `password` varchar(32) NOT NULL,
  `firstname` varchar(32) NOT NULL,
  `lastname` varchar(32) NOT NULL,
  `gender` varchar(1) NOT NULL,
  `location` varchar(32) NOT NULL,
  `date_changed` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `password`, `firstname`, `lastname`, `gender`, `location`, `date_changed`) VALUES
('admin@rmit.edu.au', '582a624e4b289', 'Admin', 'User', 'n', 'Sydney', '2016-11-15 01:18:06'),
('john.long@student.rmit.edu.au', '582a624e63849', 'John', 'Long', 'm', 'Sydney', '2016-11-15 01:18:06'),
('lecturer@rmit.edu.au', '582a624e86b72', 'Lecturer', 'User', 'f', 'Sydney', '2016-11-15 01:18:06'),
('s1234567@student.rmit.edu.au', '582a624ea2b9d', 'Jenny', 'Smith', 'f', 'Sydney', '2016-11-15 01:18:06'),
('s1348704@student.rmit.edu.au', '582a624eb4383', 'Adam', 'Haddem', 'm', 'Sydney', '2016-11-15 01:18:06'),
('s5555555@student.rmit.edu.au', '582a624ec1caa', 'Jane', 'Doe', 'f', 'Sydney', '2016-11-15 01:18:06'),
('s7482747@student.rmit.edu.au', '582a624ed899b', 'Gerry', 'Goon', 'm', 'Sydney', '2016-11-15 01:18:06'),
('s7744477@student.rmit.edu.au', '582a624ee52e3', 'Jane', 'Doe', 'f', 'Sydney', '2016-11-15 01:18:06'),
('student@student.rmit.edu.au', '582a624f0266c', 'Jane', 'Doe', 'f', 'Sydney', '2016-11-15 01:18:07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `access_type`
--
ALTER TABLE `access_type`
 ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
 ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
 ADD PRIMARY KEY (`project_id`);

--
-- Indexes for table `semester`
--
ALTER TABLE `semester`
 ADD PRIMARY KEY (`semester_id`);

--
-- Indexes for table `skill_dictionary`
--
ALTER TABLE `skill_dictionary`
 ADD PRIMARY KEY (`skill_id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
 ADD PRIMARY KEY (`subject_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `skill_dictionary`
--
ALTER TABLE `skill_dictionary`
MODIFY `skill_id` int(32) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1266;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
