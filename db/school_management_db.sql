-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 26, 2022 at 04:16 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `school_management_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--

CREATE TABLE `announcements` (
  `announcement_reference_number` int(11) NOT NULL,
  `Course_number` int(11) NOT NULL,
  `Date_posted` date NOT NULL,
  `Time_posted` time NOT NULL,
  `Year_posted` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `assigned_courses`
--

CREATE TABLE `assigned_courses` (
  `ID_number` varchar(10) NOT NULL,
  `Course_number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `Course_number` int(11) NOT NULL,
  `Course_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `grading_system_additional`
--

CREATE TABLE `grading_system_additional` (
  `Additional_factor_ID` int(11) NOT NULL,
  `Course_number` int(11) NOT NULL,
  `Additional_factor_name` varchar(50) NOT NULL,
  `Percentage` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `grading_system_main`
--

CREATE TABLE `grading_system_main` (
  `Course_number` int(11) NOT NULL,
  `Assignments_percentage` decimal(10,2) NOT NULL,
  `Quizzes_percentage` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `Group_ID` int(11) NOT NULL,
  `Course_number` int(11) NOT NULL,
  `Group_name` varchar(50) NOT NULL,
  `Group_number` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `login_information`
--

CREATE TABLE `login_information` (
  `ID_number` varchar(10) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `Role` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `modules_assignments`
--

CREATE TABLE `modules_assignments` (
  `Module_ID` int(11) NOT NULL,
  `Content` varchar(50) NOT NULL,
  `Points` decimal(10,2) NOT NULL,
  `Due_date` datetime NOT NULL,
  `Due_year` year(4) NOT NULL,
  `No_of_submissions` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `modules_lessons`
--

CREATE TABLE `modules_lessons` (
  `Module_ID` int(11) NOT NULL,
  `Content` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `modules_main`
--

CREATE TABLE `modules_main` (
  `Module_ID` int(11) NOT NULL,
  `Course_number` int(11) NOT NULL,
  `Module_number` varchar(10) NOT NULL,
  `Module_name` varchar(50) NOT NULL,
  `Module_type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `modules_quizzes_choices`
--

CREATE TABLE `modules_quizzes_choices` (
  `Choice_ID` int(11) NOT NULL,
  `Question_ID` int(11) NOT NULL,
  `Choice` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `modules_quizzes_main`
--

CREATE TABLE `modules_quizzes_main` (
  `Module_ID` int(11) NOT NULL,
  `Content` varchar(50) NOT NULL,
  `Points` decimal(10,2) NOT NULL,
  `Start_date` datetime NOT NULL,
  `Start_year` year(4) NOT NULL,
  `Due_date` datetime NOT NULL,
  `Due_year` year(4) NOT NULL,
  `Time_limit` time NOT NULL,
  `No_of_tries` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `modules_quizzes_questions`
--

CREATE TABLE `modules_quizzes_questions` (
  `Question_ID` int(11) NOT NULL,
  `Module_ID` int(11) NOT NULL,
  `Question` varchar(50) NOT NULL,
  `Answer` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `student_grades_additional`
--

CREATE TABLE `student_grades_additional` (
  `ID_number` varchar(10) NOT NULL,
  `Course_number` int(11) NOT NULL,
  `Additional_factor_ID` int(11) NOT NULL,
  `Grade` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `student_grades_main`
--

CREATE TABLE `student_grades_main` (
  `ID_number` varchar(10) NOT NULL,
  `Course_number` int(11) NOT NULL,
  `Assignments_grade` int(11) NOT NULL,
  `Quizzes_grade` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `student_groups`
--

CREATE TABLE `student_groups` (
  `ID_number` varchar(10) NOT NULL,
  `Group_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `student_information`
--

CREATE TABLE `student_information` (
  `ID_number` varchar(10) NOT NULL,
  `Family_name` varchar(50) NOT NULL,
  `First_name` varchar(50) NOT NULL,
  `Middle_name` varchar(50) NOT NULL,
  `Sex` varchar(1) NOT NULL,
  `Year` varchar(2) NOT NULL,
  `Program` varchar(50) NOT NULL,
  `Section` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `student_modules_assignments`
--

CREATE TABLE `student_modules_assignments` (
  `ID_number` varchar(10) NOT NULL,
  `Module_ID` int(11) NOT NULL,
  `Status` varchar(20) NOT NULL,
  `Score` decimal(10,2) NOT NULL,
  `Submission_date` datetime NOT NULL,
  `No_of_submissions` int(11) NOT NULL,
  `Student_answer` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `student_modules_lessons`
--

CREATE TABLE `student_modules_lessons` (
  `ID_number` varchar(10) NOT NULL,
  `Module_ID` int(11) NOT NULL,
  `Status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `student_modules_quizzes`
--

CREATE TABLE `student_modules_quizzes` (
  `ID_number` varchar(10) NOT NULL,
  `Module_ID` int(11) NOT NULL,
  `Status` varchar(20) NOT NULL,
  `Score` decimal(10,2) NOT NULL,
  `Submission_date` datetime NOT NULL,
  `No_of_tries` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `student_modules_quiz_answers`
--

CREATE TABLE `student_modules_quiz_answers` (
  `ID_number` varchar(10) NOT NULL,
  `Question_ID` int(11) NOT NULL,
  `Module_ID` int(11) NOT NULL,
  `Student_answer` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `teacher_information`
--

CREATE TABLE `teacher_information` (
  `ID_number` varchar(10) NOT NULL,
  `Family_name` varchar(50) NOT NULL,
  `First_name` varchar(50) NOT NULL,
  `Middle_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `announcements`
--
ALTER TABLE `announcements`
  ADD PRIMARY KEY (`announcement_reference_number`);

--
-- Indexes for table `assigned_courses`
--
ALTER TABLE `assigned_courses`
  ADD PRIMARY KEY (`ID_number`,`Course_number`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`Course_number`);

--
-- Indexes for table `grading_system_additional`
--
ALTER TABLE `grading_system_additional`
  ADD PRIMARY KEY (`Additional_factor_ID`);

--
-- Indexes for table `grading_system_main`
--
ALTER TABLE `grading_system_main`
  ADD PRIMARY KEY (`Course_number`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`Group_ID`);

--
-- Indexes for table `login_information`
--
ALTER TABLE `login_information`
  ADD PRIMARY KEY (`ID_number`);

--
-- Indexes for table `modules_assignments`
--
ALTER TABLE `modules_assignments`
  ADD PRIMARY KEY (`Module_ID`);

--
-- Indexes for table `modules_lessons`
--
ALTER TABLE `modules_lessons`
  ADD PRIMARY KEY (`Module_ID`);

--
-- Indexes for table `modules_main`
--
ALTER TABLE `modules_main`
  ADD PRIMARY KEY (`Module_ID`);

--
-- Indexes for table `modules_quizzes_choices`
--
ALTER TABLE `modules_quizzes_choices`
  ADD PRIMARY KEY (`Choice_ID`);

--
-- Indexes for table `modules_quizzes_main`
--
ALTER TABLE `modules_quizzes_main`
  ADD PRIMARY KEY (`Module_ID`);

--
-- Indexes for table `modules_quizzes_questions`
--
ALTER TABLE `modules_quizzes_questions`
  ADD PRIMARY KEY (`Question_ID`);

--
-- Indexes for table `student_grades_additional`
--
ALTER TABLE `student_grades_additional`
  ADD PRIMARY KEY (`ID_number`,`Course_number`,`Additional_factor_ID`);

--
-- Indexes for table `student_grades_main`
--
ALTER TABLE `student_grades_main`
  ADD PRIMARY KEY (`ID_number`,`Course_number`);

--
-- Indexes for table `student_groups`
--
ALTER TABLE `student_groups`
  ADD PRIMARY KEY (`ID_number`,`Group_ID`);

--
-- Indexes for table `student_information`
--
ALTER TABLE `student_information`
  ADD PRIMARY KEY (`ID_number`);

--
-- Indexes for table `student_modules_assignments`
--
ALTER TABLE `student_modules_assignments`
  ADD PRIMARY KEY (`ID_number`,`Module_ID`);

--
-- Indexes for table `student_modules_lessons`
--
ALTER TABLE `student_modules_lessons`
  ADD PRIMARY KEY (`ID_number`,`Module_ID`);

--
-- Indexes for table `student_modules_quizzes`
--
ALTER TABLE `student_modules_quizzes`
  ADD PRIMARY KEY (`ID_number`,`Module_ID`);

--
-- Indexes for table `student_modules_quiz_answers`
--
ALTER TABLE `student_modules_quiz_answers`
  ADD PRIMARY KEY (`ID_number`);

--
-- Indexes for table `teacher_information`
--
ALTER TABLE `teacher_information`
  ADD PRIMARY KEY (`ID_number`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `announcements`
--
ALTER TABLE `announcements`
  MODIFY `announcement_reference_number` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `Course_number` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `grading_system_additional`
--
ALTER TABLE `grading_system_additional`
  MODIFY `Additional_factor_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `Group_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `modules_main`
--
ALTER TABLE `modules_main`
  MODIFY `Module_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `modules_quizzes_choices`
--
ALTER TABLE `modules_quizzes_choices`
  MODIFY `Choice_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `modules_quizzes_questions`
--
ALTER TABLE `modules_quizzes_questions`
  MODIFY `Question_ID` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
