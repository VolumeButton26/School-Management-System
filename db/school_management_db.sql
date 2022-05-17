-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 17, 2022 at 11:08 AM
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
  `Date_posted` datetime NOT NULL,
  `Announcement_content` varchar(8000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `announcements`
--

INSERT INTO `announcements` (`announcement_reference_number`, `Course_number`, `Date_posted`, `Announcement_content`) VALUES
(1, 1, '2022-05-02 22:38:06', 'wahahahah\r\n'),
(2, 1, '2022-05-02 22:38:38', 'There is no class because eidl fitr'),
(3, 2, '2022-05-02 22:39:01', 'practice physics simulations for tomorrow'),
(4, 1, '2022-05-02 22:48:51', 'test annoucnement yahow'),
(5, 2, '2022-05-02 22:49:20', 'lezgoooo'),
(6, 2, '2022-05-07 19:07:56', 'no class tomorrow because sunday'),
(7, 3, '2022-05-09 06:35:58', 'krazy'),
(8, 4, '2022-05-09 06:36:20', 'tomorrow will be neural networks'),
(9, 5, '2022-05-09 06:36:33', 'we will be talking about natural language next week'),
(10, 6, '2022-05-09 21:18:47', 'lets go krazy with pym particles'),
(11, 2, '2022-05-09 22:18:40', 'balda'),
(12, 7, '2022-05-10 20:15:54', 'bones go brrrt'),
(13, 2, '2022-05-10 20:29:06', 'make 3d model'),
(14, 2, '2022-05-10 20:29:11', 'do a flip'),
(15, 2, '2022-05-10 20:29:15', 'deadline on monday'),
(16, 2, '2022-05-10 20:29:21', 'take a break for next week'),
(17, 2, '2022-05-10 20:29:25', 'make a platformer game'),
(18, 2, '2022-05-10 20:29:31', 'do your best'),
(19, 2, '2022-05-11 22:16:20', 'face to face class next school year lets go');

-- --------------------------------------------------------

--
-- Table structure for table `assigned_courses`
--

CREATE TABLE `assigned_courses` (
  `ID_number` varchar(10) NOT NULL,
  `Course_number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `assigned_courses`
--

INSERT INTO `assigned_courses` (`ID_number`, `Course_number`) VALUES
('s1000', 2),
('s1000', 3),
('s1000', 6),
('s1001', 6),
('s1002', 2),
('s1002', 6),
('s1003', 6),
('s1003', 7),
('t1000', 2),
('t1000', 3),
('t1000', 7),
('t1001', 4),
('t1001', 5),
('t1002', 6);

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `Course_number` int(11) NOT NULL,
  `Course_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`Course_number`, `Course_name`) VALUES
(4, 'AI Development'),
(3, 'Applied Math for Games'),
(2, 'Game Programming'),
(7, 'Inverse Kinematics'),
(1, 'Machine Learning'),
(5, 'Natural Language Processing'),
(6, 'Particle Systems');

-- --------------------------------------------------------

--
-- Table structure for table `grading_system_additional`
--

CREATE TABLE `grading_system_additional` (
  `Additional_factor_ID` int(11) NOT NULL,
  `Course_number` int(11) NOT NULL,
  `Additional_factor_name` varchar(50) NOT NULL,
  `Percentage` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `grading_system_main`
--

CREATE TABLE `grading_system_main` (
  `Course_number` int(11) NOT NULL,
  `Assignments_percentage` int(11) NOT NULL,
  `Quizzes_percentage` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `grading_system_main`
--

INSERT INTO `grading_system_main` (`Course_number`, `Assignments_percentage`, `Quizzes_percentage`) VALUES
(1, 60, 40),
(2, 50, 50),
(3, 70, 30),
(4, 80, 20),
(5, 60, 40),
(6, 50, 50),
(7, 60, 40);

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

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`Group_ID`, `Course_number`, `Group_name`, `Group_number`) VALUES
(15, 3, 'Exam', 1),
(16, 3, 'MLE', 1),
(17, 3, 'MLE', 2),
(18, 3, 'MLE', 3),
(19, 3, 'Project', 1),
(20, 3, 'Project', 2),
(21, 3, 'Project', 3),
(22, 2, 'Capstone', 1),
(23, 2, 'Capstone', 2),
(24, 2, 'Capstone', 3),
(25, 2, 'Capstone', 4);

-- --------------------------------------------------------

--
-- Table structure for table `login_information`
--

CREATE TABLE `login_information` (
  `ID_number` varchar(10) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `Role` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login_information`
--

INSERT INTO `login_information` (`ID_number`, `Password`, `Role`) VALUES
('s1000', '123', 'Student'),
('s1001', '456', 'Student'),
('s1002', 'abc', 'Student'),
('s1003', 'asd', 'Student'),
('t1000', 'def', 'Teacher'),
('t1001', 'qwe', 'Teacher'),
('t1002', 'asd', 'Teacher');

-- --------------------------------------------------------

--
-- Table structure for table `modules_assignments`
--

CREATE TABLE `modules_assignments` (
  `Module_ID` int(11) NOT NULL,
  `Content` varchar(8000) NOT NULL,
  `Points` int(11) NOT NULL,
  `Due_date` datetime NOT NULL,
  `No_of_submissions` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `modules_lessons`
--

CREATE TABLE `modules_lessons` (
  `Module_ID` int(11) NOT NULL,
  `Content` varchar(8000) NOT NULL
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
  `Choice` varchar(8000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `modules_quizzes_main`
--

CREATE TABLE `modules_quizzes_main` (
  `Module_ID` int(11) NOT NULL,
  `Content` varchar(8000) NOT NULL,
  `Points` int(11) NOT NULL,
  `Start_date` datetime NOT NULL,
  `Due_date` datetime NOT NULL,
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
  `Question` varchar(8000) NOT NULL,
  `Answer` varchar(8000) NOT NULL
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

--
-- Dumping data for table `student_groups`
--

INSERT INTO `student_groups` (`ID_number`, `Group_ID`) VALUES
('s1000', 15),
('s1000', 16),
('s1000', 22),
('s1002', 22);

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

--
-- Dumping data for table `student_information`
--

INSERT INTO `student_information` (`ID_number`, `Family_name`, `First_name`, `Middle_name`, `Sex`, `Year`, `Program`, `Section`) VALUES
('s1000', 'Stark', 'Anthony', 'Coogler', 'M', '1', 'BSME', '1A'),
('s1001', 'Banner', 'Bruce', 'Willis', 'M', '3', 'BSBio', '3A'),
('s1002', 'Rogers', 'Steve', '', 'M', '5', 'BSPO', '5A'),
('s1003', 'Barton', 'Clint', 'Ronin', 'M', '2', 'BSMM', '2A');

-- --------------------------------------------------------

--
-- Table structure for table `student_modules_assignments`
--

CREATE TABLE `student_modules_assignments` (
  `ID_number` varchar(10) NOT NULL,
  `Module_ID` int(11) NOT NULL,
  `Status` varchar(20) NOT NULL,
  `Score` int(11) NOT NULL,
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
  `Score` int(11) NOT NULL,
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
  `Student_answer` varchar(8000) NOT NULL
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
-- Dumping data for table `teacher_information`
--

INSERT INTO `teacher_information` (`ID_number`, `Family_name`, `First_name`, `Middle_name`) VALUES
('t1000', 'Stark', 'Howard', 'Jarvis'),
('t1001', 'Carter', 'Peggy', 'Linds'),
('t1002', 'Pym', 'Hank', 'Claude');

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
  ADD PRIMARY KEY (`Course_number`),
  ADD UNIQUE KEY `Course_name` (`Course_name`);

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
  MODIFY `announcement_reference_number` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `Course_number` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `grading_system_additional`
--
ALTER TABLE `grading_system_additional`
  MODIFY `Additional_factor_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `Group_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

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
