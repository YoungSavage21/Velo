-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 02, 2024 at 01:53 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project-baby`
--

-- --------------------------------------------------------

--
-- Table structure for table `tm_country`
--

CREATE TABLE `tm_country` (
  `CHR_COUNTRY_ID` int(11) NOT NULL,
  `CHR_COUNTRY_NAME` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tm_country`
--

INSERT INTO `tm_country` (`CHR_COUNTRY_ID`, `CHR_COUNTRY_NAME`) VALUES
(1, 'Australia'),
(2, 'Bangladesh'),
(3, 'Belarus'),
(4, 'Brazil'),
(5, 'Canada'),
(6, 'China'),
(7, 'France'),
(8, 'Germany'),
(9, 'India'),
(10, 'Indonesia'),
(11, 'Israel'),
(12, 'Italy'),
(13, 'Japan'),
(14, 'Korea, Republic of'),
(15, 'Mexico'),
(16, 'Philippines'),
(17, 'Russian Federation'),
(18, 'South Africa'),
(19, 'Thailand'),
(20, 'Turkey'),
(21, 'Ukraine'),
(22, 'United Arab Emirates'),
(23, 'United Kingdom'),
(24, 'United States');

-- --------------------------------------------------------

--
-- Table structure for table `tm_user`
--

CREATE TABLE `tm_user` (
  `INT_USER_ID` int(11) NOT NULL,
  `CHR_FIRST_NAME` varchar(128) NOT NULL,
  `CHR_LAST_NAME` varchar(128) NOT NULL,
  `CHR_USERNAME` varchar(128) NOT NULL,
  `CHR_EMAIL` varchar(128) NOT NULL,
  `CHR_PASSWORD` varchar(256) NOT NULL,
  `CHR_PROFILE_PIC` varchar(128) NOT NULL DEFAULT 'default.png',
  `CHR_PHONE_NUM` varchar(128) NOT NULL DEFAULT '857 1234 5678',
  `CHR_COUNTRY` int(11) NOT NULL DEFAULT 10,
  `INT_IS_ACTIVE` int(1) NOT NULL DEFAULT 1,
  `CHR_DATE_CREATED` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tm_user`
--

INSERT INTO `tm_user` (`INT_USER_ID`, `CHR_FIRST_NAME`, `CHR_LAST_NAME`, `CHR_USERNAME`, `CHR_EMAIL`, `CHR_PASSWORD`, `CHR_PROFILE_PIC`, `CHR_PHONE_NUM`, `CHR_COUNTRY`, `INT_IS_ACTIVE`, `CHR_DATE_CREATED`) VALUES
(1, 'Gilang', 'Nurdiansyah', 'gilang.p.n', 'rexgilangpn88@gmail.com', 'Gilang123', 'Profile_Pic.png', '857 4321 5678', 1, 1, '2023-09-21 06:36:54'),
(5, 'Meilani', 'Putri', 'shmzeui', 'meilani@gmail.com', 'Mei12345', 'default.png', '857 1234 5678', 10, 1, '2023-10-10 07:57:49'),
(6, 'Ardiansyah', 'Muhammad', 'me.ardsh', 'ardiansyah@gmail.com', 'Ardi12345', 'test_image1.jpg', '857 1234 5678', 10, 1, '2023-12-15 09:25:18'),
(7, 'Shehnaz', 'Nazyma Nabilah', 'shehnazyma', 'shehnaz@gmail.com', 'Senas123', 'WhatsApp_Image_2023-12-22_at_3.34.14_PM.jpeg', '857 1234 5678', 10, 1, '2023-12-29 07:05:12');

-- --------------------------------------------------------

--
-- Table structure for table `tt_collaborate`
--

CREATE TABLE `tt_collaborate` (
  `INT_ID` int(11) NOT NULL,
  `INT_USER_ID` int(11) NOT NULL,
  `INT_TASK_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tt_collaborate`
--

INSERT INTO `tt_collaborate` (`INT_ID`, `INT_USER_ID`, `INT_TASK_ID`) VALUES
(40, 1, 3),
(41, 1, 8),
(42, 1, 9),
(43, 1, 6),
(44, 1, 7),
(90, 1, 2),
(91, 5, 2),
(103, 1, 51),
(104, 6, 51),
(105, 5, 51),
(116, 1, 43),
(117, 6, 43),
(118, 5, 43),
(121, 6, 53),
(122, 6, 54),
(127, 6, 55),
(132, 6, 52),
(133, 1, 52),
(136, 1, 56),
(139, 7, 57),
(140, 1, 57),
(141, 1, 42),
(142, 6, 42),
(143, 5, 42),
(156, 1, 39),
(157, 6, 39);

-- --------------------------------------------------------

--
-- Table structure for table `tt_task`
--

CREATE TABLE `tt_task` (
  `INT_TASK_ID` int(11) NOT NULL,
  `CHR_TASK_TITLE` varchar(128) NOT NULL,
  `CHR_TASK_DESC` varchar(256) NOT NULL,
  `CHR_TASK_CATEGORY` varchar(128) NOT NULL,
  `CHR_TASK_TAG_COLOR` varchar(128) NOT NULL,
  `INT_USER_ID` int(11) NOT NULL,
  `CHR_CREATED_DATE` timestamp NOT NULL DEFAULT current_timestamp(),
  `CHR_MODIFIED_DATE` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `CHR_STATUS` int(11) NOT NULL DEFAULT 0,
  `CHR_IMAGE` varchar(256) NOT NULL,
  `DAT_DUE_DATE` datetime NOT NULL DEFAULT current_timestamp(),
  `INT_CREATED_BY` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tt_task`
--

INSERT INTO `tt_task` (`INT_TASK_ID`, `CHR_TASK_TITLE`, `CHR_TASK_DESC`, `CHR_TASK_CATEGORY`, `CHR_TASK_TAG_COLOR`, `INT_USER_ID`, `CHR_CREATED_DATE`, `CHR_MODIFIED_DATE`, `CHR_STATUS`, `CHR_IMAGE`, `DAT_DUE_DATE`, `INT_CREATED_BY`) VALUES
(1, 'Go to the store', 'Buy: egg, milk, chicken breast, peanut butter, whole grain bread, spaghetti sauce, pepperoni and cheese', 'Grocery', 'warning', 1, '2023-09-22 16:58:53', '2023-12-27 07:45:12', 2, '', '2023-12-14 16:32:00', 1),
(2, 'Hit the gym', 'Hit the gym at 05:00 PM with Wake. Don\'t forget to bring jump ropes and boxing gloves to also hit random people', 'Sports', 'danger', 1, '2023-09-22 17:00:07', '2023-12-29 07:24:53', 1, '', '2023-12-14 13:29:00', 1),
(10, 'Add Select2 to forms', 'Add Select2 plugins to the Add Task forms to make the forms look prettier', 'Frontend', 'danger', 1, '2023-09-25 08:15:32', '2023-12-14 08:18:46', 1, '', '2023-12-14 13:29:41', 1),
(11, 'Add account page', 'Add account page where user can check their information and detail', 'Backend', 'warning', 1, '2023-09-25 08:20:40', '2023-12-14 08:18:49', 0, '', '2023-12-14 13:29:41', 1),
(13, 'Read a book', 'Spend an hour reading the latest novel you borrowed from the library.', 'Reading', 'danger', 1, '2023-09-25 09:14:26', '2023-12-14 08:18:53', 2, '', '2023-12-14 13:29:41', 1),
(14, 'Pay the bills', 'Pay the electricity and internet bills online before the due date.', 'Reminder', 'success', 1, '2023-09-25 09:15:08', '2023-12-15 03:51:20', 0, '', '2023-12-14 13:29:41', 1),
(15, 'Study', 'Prepare for the upcoming history exam by reviewing lecture notes and reading the textbook.', 'Study', 'danger', 1, '2023-09-25 09:15:50', '2023-12-19 06:39:55', 2, '', '2023-12-14 13:29:41', 1),
(17, 'Write in journal', 'Spend some quiet time reflecting on your day and write in your journal.', 'Self Improvement', 'success', 1, '2023-09-25 09:17:52', '2023-12-14 08:19:02', 0, '', '2023-12-14 13:29:41', 1),
(19, 'Plan Vacation', 'Start researching and planning your next vacation destination and activities.', 'Planning', 'success', 1, '2023-09-25 09:18:53', '2023-12-14 08:19:05', 1, '', '2023-12-14 13:29:41', 1),
(20, 'Upgrade Layout', 'Make the layout better cause it currently look like shit', 'Frontend', 'primary', 1, '2023-09-26 07:09:40', '2023-12-14 08:19:07', 0, '', '2023-12-14 13:29:41', 1),
(21, 'Make Board responsive', 'Make it responsive blud', '123', 'danger', 1, '2023-09-26 08:17:34', '2023-12-14 08:19:10', 0, '', '2023-12-14 13:29:41', 1),
(26, 'Create edit feature', 'Create an edit feature', 'Development', 'info', 5, '2023-12-13 06:29:35', '2023-12-14 08:19:18', 1, '', '2023-12-14 13:29:41', 5),
(27, 'Zoom Meeting', 'Test', 'Info', 'info', 5, '2023-12-13 06:29:56', '2023-12-14 08:19:20', 1, '', '2023-12-14 13:29:41', 5),
(28, 'Write Article', 'test', 'Writing', 'primary', 5, '2023-12-13 06:30:26', '2023-12-14 08:19:23', 0, '', '2023-12-14 13:29:41', 5),
(29, 'Hit the gym', 'Gym', 'Reminder', 'warning', 5, '2023-12-13 06:30:48', '2023-12-14 08:19:25', 3, '', '2023-12-14 13:29:41', 5),
(30, 'Fix Bug 1.2.1.1', '', 'Bug Fix', 'danger', 5, '2023-12-13 06:31:16', '2023-12-14 08:19:27', 0, '', '2023-12-14 13:29:41', 5),
(31, 'Plan Vacation', '', 'Planning', 'success', 5, '2023-12-13 06:32:03', '2023-12-14 08:19:29', 3, '', '2023-12-14 13:29:41', 5),
(32, 'Workout', 'Hit 100 weighted push up, 100 pull up. 5 x 5', 'Sports', 'secondary', 5, '2023-12-14 06:00:29', '2023-12-14 08:26:44', 1, '', '2023-12-14 13:29:41', 5),
(39, 'Fix Diagram', 'Fix Diagram', 'To Do', 'warning', 1, '2023-12-14 08:14:30', '2023-12-29 07:46:58', 2, 'class_diagram.jpg', '2023-12-14 15:14:00', 1),
(40, 'Fix Activity Diagram', 'Fix Activity Diagram', 'Reminder', 'secondary', 5, '2023-12-14 08:15:04', '2023-12-14 09:11:28', 2, 'activity_diagram.jpg', '2023-12-14 15:14:00', 5),
(41, 'Decorate Room', 'Decorate Room', 'Planning', 'success', 5, '2023-12-14 08:15:23', '2023-12-14 08:26:40', 1, 'test_image.jpg', '2023-12-14 15:15:00', 5),
(42, 'Decorate Room', 'Decorate Room', 'Planning', 'warning', 1, '2023-12-15 08:12:06', '2023-12-29 07:41:50', 1, 'test_image.jpg', '2023-12-16 15:04:00', 1),
(46, 'Assigned add button is not aligned', '', '', 'success', 6, '2023-12-15 10:02:13', '2023-12-15 10:02:13', 0, '', '2023-12-15 17:01:00', 6),
(47, 'Delete feature', '', '', 'success', 6, '2023-12-15 10:02:23', '2023-12-15 10:02:23', 0, '', '2023-12-15 17:02:00', 6),
(48, 'Edit feature', '', '', 'success', 6, '2023-12-15 10:02:29', '2023-12-15 10:02:29', 0, '', '2023-12-15 17:02:00', 6),
(56, 'Call out my name', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corrupti deleniti ea facilis ipsam eius tempore soluta, enim perspiciatis voluptas impedit delectus deserunt officia odit maiores ratione similique dicta iste! Vel.\r\n', 'Reminder', 'primary', 1, '2023-12-28 06:08:28', '2023-12-29 07:24:55', 2, '', '2023-12-28 13:07:00', 1),
(57, 'Watch The Boy and The Heron', 'Watch with Gilang', 'Event', 'primary', 1, '2023-12-29 07:11:18', '2023-12-29 07:24:39', 0, 'MV5BZjE1MzJlNjYtNDI3ZS00MzRkLTlhMDYtNDU5YWU3YTI3Yzg0XkEyXkFqcGdeQXVyMTUzMTg2ODkz__V1_.jpg', '2023-12-29 14:08:00', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tm_country`
--
ALTER TABLE `tm_country`
  ADD PRIMARY KEY (`CHR_COUNTRY_ID`);

--
-- Indexes for table `tm_user`
--
ALTER TABLE `tm_user`
  ADD PRIMARY KEY (`INT_USER_ID`),
  ADD UNIQUE KEY `CHR_USERNAME` (`CHR_USERNAME`);

--
-- Indexes for table `tt_collaborate`
--
ALTER TABLE `tt_collaborate`
  ADD PRIMARY KEY (`INT_ID`);

--
-- Indexes for table `tt_task`
--
ALTER TABLE `tt_task`
  ADD PRIMARY KEY (`INT_TASK_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tm_country`
--
ALTER TABLE `tm_country`
  MODIFY `CHR_COUNTRY_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tm_user`
--
ALTER TABLE `tm_user`
  MODIFY `INT_USER_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tt_collaborate`
--
ALTER TABLE `tt_collaborate`
  MODIFY `INT_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=158;

--
-- AUTO_INCREMENT for table `tt_task`
--
ALTER TABLE `tt_task`
  MODIFY `INT_TASK_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
