-- phpMyAdmin SQL Dump
-- version 5.3.0-dev+20221207.ce5ce76a8d
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 24, 2023 at 05:37 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.0.17

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
-- Table structure for table `tm_user`
--

CREATE TABLE `tm_user` (
  `INT_USER_ID` int(11) NOT NULL,
  `CHR_FIRST_NAME` varchar(128) NOT NULL,
  `CHR_LAST_NAME` varchar(128) NOT NULL,
  `CHR_USERNAME` varchar(128) NOT NULL,
  `CHR_EMAIL` varchar(128) NOT NULL,
  `CHR_PASSWORD` varchar(256) NOT NULL,
  `CHR_PROFILE` varchar(128) DEFAULT NULL,
  `INT_IS_ACTIVE` int(1) NOT NULL DEFAULT 1,
  `CHR_DATE_CREATED` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tm_user`
--

INSERT INTO `tm_user` (`INT_USER_ID`, `CHR_FIRST_NAME`, `CHR_LAST_NAME`, `CHR_USERNAME`, `CHR_EMAIL`, `CHR_PASSWORD`, `CHR_PROFILE`, `INT_IS_ACTIVE`, `CHR_DATE_CREATED`) VALUES
(1, 'Gilang', 'Nurdiansyah', 'gilang.p.n', 'rexgilangpn88@gmail.com', 'Gilang123', NULL, 1, '2023-09-21 06:36:54');

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
  `CHR_STATUS` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tt_task`
--

INSERT INTO `tt_task` (`INT_TASK_ID`, `CHR_TASK_TITLE`, `CHR_TASK_DESC`, `CHR_TASK_CATEGORY`, `CHR_TASK_TAG_COLOR`, `INT_USER_ID`, `CHR_CREATED_DATE`, `CHR_MODIFIED_DATE`, `CHR_STATUS`) VALUES
(1, 'Go to the store', 'Buy: egg, milk, chicken breast, peanut butter, whole grain bread, spaghetti sauce, pepperoni and cheese', 'Grocery', 'warning', 1, '2023-09-22 16:58:53', '2023-09-22 16:58:53', 0),
(2, 'Hit the gym', 'Hit the gym at 05:00 PM with Wake. Don\'t forget to bring jump ropes and boxing gloves to also hit random people', 'Sports', 'danger', 1, '2023-09-22 17:00:07', '2023-09-22 17:00:07', 0),
(3, 'Eat healthy', 'Drink 5 liters of water daily, and eat more protein and less carbs. Drink your creatine', 'Health', 'success', 1, '2023-09-22 17:02:29', '2023-09-22 17:02:29', 0),
(6, 'Train Boxing', 'Shadow box for at least 3 minutes 3 rounds, with 20 seconds rest. Train footwork.', 'Boxing', 'primary', 1, '2023-09-23 08:22:52', '2023-09-23 08:22:52', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tm_user`
--
ALTER TABLE `tm_user`
  ADD PRIMARY KEY (`INT_USER_ID`),
  ADD UNIQUE KEY `CHR_USERNAME` (`CHR_USERNAME`);

--
-- Indexes for table `tt_task`
--
ALTER TABLE `tt_task`
  ADD PRIMARY KEY (`INT_TASK_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tm_user`
--
ALTER TABLE `tm_user`
  MODIFY `INT_USER_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tt_task`
--
ALTER TABLE `tt_task`
  MODIFY `INT_TASK_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
