-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 03, 2021 at 09:57 AM
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
-- Database: `spl2_iit`
--

-- --------------------------------------------------------

--
-- Table structure for table `assign_course`
--

CREATE TABLE `assign_course` (
  `id` int(11) NOT NULL,
  `course_code` varchar(100) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `batch_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assign_course`
--

INSERT INTO `assign_course` (`id`, `course_code`, `teacher_id`, `batch_id`) VALUES
(1, 'CSE 1101', 1, 1),
(2, 'CSE 1102', 2, 1),
(3, 'CSE 1103', 3, 1),
(4, 'STAT 1105', 1, 2),
(5, 'MATH 1107', 2, 2),
(6, 'GE 1109', 1, 3),
(7, 'GE 1111', 2, 3),
(8, 'CSE 1102', 3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `batch`
--

CREATE TABLE `batch` (
  `id` int(11) NOT NULL,
  `batch_name` varchar(25) NOT NULL,
  `session` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `batch`
--

INSERT INTO `batch` (`id`, `batch_name`, `session`) VALUES
(1, '1st Batch', '2017-2018'),
(2, '2nd Batch', '2018-2019'),
(3, '3rd Batch', '2020-2021');

-- --------------------------------------------------------

--
-- Table structure for table `books_catalog`
--

CREATE TABLE `books_catalog` (
  `bk_id` int(11) NOT NULL,
  `isbn_number` varchar(30) NOT NULL,
  `bk_name` varchar(255) NOT NULL,
  `bk_catagory` varchar(255) NOT NULL,
  `bk_author_name` varchar(255) NOT NULL,
  `copies` int(11) NOT NULL,
  `p_copies` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `books_catalog`
--

INSERT INTO `books_catalog` (`bk_id`, `isbn_number`, `bk_name`, `bk_catagory`, `bk_author_name`, `copies`, `p_copies`) VALUES
(1, '', 'Algorithms to Live By: The Computer Science of Human Decisions', 'CSE', 'Brian Christian, Tom Griffiths', 100, 8),
(2, '', 'Introduction to Algorithm ', 'CSE', 'Thomas. H. Cormen', 12, 12),
(6, '', 'Superintelligence: Path, Dangers, Strategies ', 'SE', 'Nick Bostrom', 20, 20),
(7, '', 'Design Patterns: Elements of Reusable objects Oriented Software', 'CSE', 'Erich Gamma, John Vlissides, Richard Helm', 9, 8),
(9, '', 'Codes: The Hidden Language of the Computer Hardware and software ', 'CSE', 'Charles Petzold', 20, 14),
(10, '', 'The Artificial Intelligence: A Modern Approach', 'CSE', ' Stuart Russell', 17, 17),
(11, '', 'The Algorithmic Leader\r\nHow to Be Smart When Machines Are Smarter Than You', 'CSE', 'Mike Walsh', 30, 30),
(12, '', 'Algorithms Illuminated\r\nPart 1: The Basics', 'CSE', 'Tim Roughgarden', 30, 20),
(15, '', 'Barron\'s AP Computer Science A, 8th Edition\r\nwith Bonus Online Tests', 'CSE', 'Roselyn Teukolsky M.S.', 40, 30),
(16, '', 'Security in Computer and Information Sciences', 'SE', 'Erol Gelenbe, Paolo Campegiani, Tadeusz Czachórski, Sokratis K. Katsikas', 10, 0),
(19, '', 'Blockchain Basics\r\nA Non-Technical Introduction in 25 Steps', 'MATH', 'Daniel Drescher', 20, 20),
(20, '', 'Computer Science Distilled\r\nLearn the Art of Solving Computational Problems', 'CSE', 'Wladston Ferreira Filho, Raimondo Pictet', 20, 20),
(21, '', 'Introduction to Artificial Intelligence', 'CSE', 'Mariusz Flasi?ski(', 15, 10),
(22, '', 'Computer Science Principles', 'SE', 'Mr. Kevin P Hare, Pindar Van Arman', 9, 5),
(23, '', 'Robotics for Young Children', 'CSE', 'Ann Gadzikowski', 5, 0),
(24, '', 'Management', 'BBA', 'Stoner, Freeman and Gilbert Jr', 20, 10),
(25, '', 'Industrial Organization Management', 'BBA', 'Sherlekar, Patil, Paranjpe, Chitale', 20, 10);

-- --------------------------------------------------------

--
-- Table structure for table `book_requests`
--

CREATE TABLE `book_requests` (
  `reques_id` int(11) NOT NULL,
  `bk_id` int(11) NOT NULL,
  `bk_name` varchar(255) NOT NULL,
  `request_by` varchar(50) NOT NULL,
  `user_type` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `catagories`
--

CREATE TABLE `catagories` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `catagories`
--

INSERT INTO `catagories` (`cat_id`, `cat_name`, `quantity`) VALUES
(1, 'Math', 10),
(2, 'CSE', 15),
(3, 'BBA', 20),
(4, 'SE', 13);

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `course_name` varchar(100) NOT NULL,
  `course_code` varchar(50) NOT NULL,
  `year` int(11) DEFAULT NULL,
  `term` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `course_name`, `course_code`, `year`, `term`) VALUES
(1, 'Structured Programming', 'CSE 1101 ', 1, 1),
(2, 'Structured Programming Lab', 'CSE 1102 ', 1, 1),
(3, 'Discrete Mathematics', 'CSE 1103 ', 1, 1),
(4, 'Probability & Statistics-1', 'STAT 1105 ', 1, 1),
(5, 'Calculus and Analytical Geometry', 'MATH 1107 ', 1, 1),
(6, 'Soft Skill Communication', 'GE 1109 ', 1, 1),
(7, 'Technology and Society', 'GE 1111 ', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `event_venues`
--

CREATE TABLE `event_venues` (
  `id` int(11) NOT NULL,
  `venue_name` varchar(100) NOT NULL,
  `capacity` int(11) NOT NULL,
  `image_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `extra_class`
--

CREATE TABLE `extra_class` (
  `id` int(11) NOT NULL,
  `routine_id` int(11) NOT NULL,
  `slot_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `issued_books`
--

CREATE TABLE `issued_books` (
  `issued_id` int(11) NOT NULL,
  `bk_id` int(11) NOT NULL,
  `bk_name` varchar(255) NOT NULL,
  `issued_to` varchar(255) NOT NULL,
  `issue_date` date NOT NULL,
  `return_date` date NOT NULL,
  `u_type` varchar(255) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `issued_books`
--

INSERT INTO `issued_books` (`issued_id`, `bk_id`, `bk_name`, `issued_to`, `issue_date`, `return_date`, `u_type`, `status`) VALUES
(54, 20, 'Computer Science Distilled\r\nLearn the Art of Solving Computational Problems', 'Auhidur@gmail.com', '2021-10-03', '2021-11-02', '1', '1'),
(58, 7, 'Design Patterns: Elements of Reusable objects Oriented Software', 'a@gmail.com', '2021-10-03', '2021-11-02', '3', '0'),
(59, 1, 'Algorithms to Live By: The Computer Science of Human Decisions', 'abcd@gmail.com', '2021-10-03', '2021-11-02', '3', '1');

-- --------------------------------------------------------

--
-- Table structure for table `return_books`
--

CREATE TABLE `return_books` (
  `return_id` int(11) NOT NULL,
  `issue_id` int(11) NOT NULL,
  `return_date` date NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `return_books`
--

INSERT INTO `return_books` (`return_id`, `issue_id`, `return_date`, `status`) VALUES
(31, 54, '2021-10-03', 'On Time'),
(32, 59, '2021-10-03', 'On Time');

-- --------------------------------------------------------

--
-- Table structure for table `routine`
--

CREATE TABLE `routine` (
  `id` int(11) NOT NULL,
  `row` int(11) NOT NULL,
  `subrow` int(11) NOT NULL,
  `col` int(11) NOT NULL,
  `slot_id` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `routine`
--

INSERT INTO `routine` (`id`, `row`, `subrow`, `col`, `slot_id`, `status`) VALUES
(40, 2, 2, 2, 1, 0),
(43, 1, 2, 5, 1, 1),
(49, 2, 2, 6, 4, 1),
(50, 1, 3, 2, 2, 1),
(51, 2, 3, 2, 3, 1),
(52, 1, 2, 2, 3, 0),
(61, 2, 1, 5, 6, 1),
(65, 5, 1, 6, 2, 1),
(66, 3, 2, 6, 3, 1),
(68, 1, 2, 6, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `staff_info`
--

CREATE TABLE `staff_info` (
  `id` int(11) NOT NULL,
  `firstname` varchar(25) NOT NULL,
  `lastname` varchar(25) NOT NULL,
  `mobile` varchar(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `designation` varchar(50) NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff_info`
--

INSERT INTO `staff_info` (`id`, `firstname`, `lastname`, `mobile`, `username`, `password`, `designation`, `status`) VALUES
(1, 'Mahfuz', 'Ahmed', '0170234567', 'mahfuz@123gmail.com', '1234', 'Officer', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `student_info`
--

CREATE TABLE `student_info` (
  `id` int(11) NOT NULL,
  `student_roll` varchar(16) NOT NULL,
  `student_name` varchar(48) NOT NULL,
  `student_session` varchar(12) NOT NULL,
  `student_mobile` varchar(14) NOT NULL,
  `username` varchar(45) DEFAULT NULL,
  `password` varchar(45) NOT NULL,
  `student_current_batch` enum('11','12','13','14','15','16') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_info`
--

INSERT INTO `student_info` (`id`, `student_roll`, `student_name`, `student_session`, `student_mobile`, `username`, `password`, `student_current_batch`) VALUES
(1, 'ASH001M', 'Abdullah An Noor', '2017-18', '0171100000001', 'a@gmail.com', '1234', '13'),
(2, 'ASH002M', 'Emran Hossain', '2017-18', '0170000000002', 'ab@gmail.com', '1234', '13'),
(3, 'ASH003M', 'Mahbub Alam', '2017-18', '0170000000003', 'abc@gmail.com', '1234', '13'),
(4, 'ASH004M', 'Fazle Rabbi', '2017-18', '017000000004', 'abcd@gmail.com', '1234', '13'),
(5, 'ASH005M', 'Abrar Hossain ', '2017-18', '0171100000005', 'abcde@gmail.com', '1234', '13');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_info`
--

CREATE TABLE `teacher_info` (
  `id` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `designation` varchar(100) NOT NULL,
  `mobile` varchar(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `shortform` varchar(10) NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher_info`
--

INSERT INTO `teacher_info` (`id`, `firstname`, `lastname`, `designation`, `mobile`, `username`, `password`, `shortform`, `status`) VALUES
(1, 'Auhidur', 'Rahman', 'Director', '1700000012', 'Auhidur@gmail.com', '1234', 'ARS', 'Active'),
(2, 'Iftekhar', 'Iftee', 'Assistant Professor', '1700000013', 'Iftekhar@gmail.com', '1234', 'IAE', 'Active'),
(3, 'Dipok ', 'Chnadra Das', 'Lecturer', '1700000014', 'Dipok@gmail.com', '1234', 'DCD', 'Active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assign_course`
--
ALTER TABLE `assign_course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `batch`
--
ALTER TABLE `batch`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `books_catalog`
--
ALTER TABLE `books_catalog`
  ADD PRIMARY KEY (`bk_id`);

--
-- Indexes for table `book_requests`
--
ALTER TABLE `book_requests`
  ADD PRIMARY KEY (`reques_id`);

--
-- Indexes for table `catagories`
--
ALTER TABLE `catagories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_venues`
--
ALTER TABLE `event_venues`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `extra_class`
--
ALTER TABLE `extra_class`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `issued_books`
--
ALTER TABLE `issued_books`
  ADD PRIMARY KEY (`issued_id`);

--
-- Indexes for table `return_books`
--
ALTER TABLE `return_books`
  ADD PRIMARY KEY (`return_id`);

--
-- Indexes for table `routine`
--
ALTER TABLE `routine`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff_info`
--
ALTER TABLE `staff_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_info`
--
ALTER TABLE `student_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacher_info`
--
ALTER TABLE `teacher_info`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assign_course`
--
ALTER TABLE `assign_course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `batch`
--
ALTER TABLE `batch`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `books_catalog`
--
ALTER TABLE `books_catalog`
  MODIFY `bk_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `book_requests`
--
ALTER TABLE `book_requests`
  MODIFY `reques_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `catagories`
--
ALTER TABLE `catagories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `event_venues`
--
ALTER TABLE `event_venues`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `extra_class`
--
ALTER TABLE `extra_class`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `issued_books`
--
ALTER TABLE `issued_books`
  MODIFY `issued_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `return_books`
--
ALTER TABLE `return_books`
  MODIFY `return_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `routine`
--
ALTER TABLE `routine`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `staff_info`
--
ALTER TABLE `staff_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `student_info`
--
ALTER TABLE `student_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `teacher_info`
--
ALTER TABLE `teacher_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
