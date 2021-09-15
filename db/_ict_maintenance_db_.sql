-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 16, 2021 at 08:47 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ict_maintenance_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `division_section`
--

CREATE TABLE `division_section` (
  `id` int(11) NOT NULL,
  `division_name` varchar(50) DEFAULT NULL,
  `section_name` varchar(100) DEFAULT NULL,
  `date_added` datetime DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `division_section`
--

INSERT INTO `division_section` (`id`, `division_name`, `section_name`, `date_added`, `date_updated`) VALUES
(1, 'MSD', 'Personnel Section', '2021-08-03 10:30:28', '2021-08-03 10:33:37'),
(2, 'MSD', 'Human Resource Development unit', '2021-08-03 10:30:28', '2021-08-03 13:03:27'),
(3, 'LHSD', 'Non-comm Disease Cluster', '2021-08-03 10:30:28', '2021-08-03 13:02:19'),
(4, 'LHSD', 'Family Health Cluster', '2021-08-03 10:30:28', '2021-08-03 13:01:53'),
(6, 'MSD', 'Accounting Section', '2021-08-03 13:01:22', '2021-08-03 13:01:22'),
(7, 'MSD', 'Assistant Regional Directors Office - ARD', '2021-08-03 13:03:58', '2021-08-03 13:03:58'),
(8, 'MSD', 'Auditors Office', '2021-08-03 13:08:22', '2021-08-03 13:08:22'),
(9, 'MSD', 'BAC section', '2021-08-03 13:08:38', '2021-08-03 13:08:38'),
(10, 'MSD', 'Budget Section', '2021-08-03 13:08:51', '2021-08-03 13:08:51'),
(11, 'MSD', 'Cashier Section', '2021-08-03 13:09:02', '2021-08-03 13:09:02'),
(12, 'MSD', 'Chief Administrative Office', '2021-08-03 13:09:20', '2021-08-03 13:09:20'),
(13, 'MSD', 'Cold Room', '2021-08-03 13:09:37', '2021-08-03 13:09:37'),
(14, 'MSD', 'General Services', '2021-08-03 13:09:51', '2021-08-03 13:09:51'),
(15, 'MSD', 'Health & Promotion Office - HEPO', '2021-08-03 13:10:19', '2021-08-03 13:10:19'),
(16, 'MSD', 'ICT Unit', '2021-08-03 13:10:40', '2021-08-03 13:10:40'),
(17, 'MSD', 'Legal Office', '2021-08-03 13:10:49', '2021-08-03 13:10:49'),
(18, 'MSD', 'Library Section', '2021-08-03 13:11:03', '2021-08-03 13:11:23'),
(19, 'MSD', 'Planning Unit', '2021-08-03 13:12:18', '2021-08-03 13:12:18'),
(20, 'MSD', 'Procurement Unit', '2021-08-03 13:12:36', '2021-08-03 13:12:36'),
(21, 'MSD', 'Record Section', '2021-08-03 13:12:49', '2021-08-03 13:12:49'),
(22, 'MSD', 'Regional Directors Office - RD', '2021-08-03 13:13:27', '2021-08-03 13:13:27'),
(23, 'MSD', 'Supervising Administrative Office - SAO', '2021-08-03 13:13:43', '2021-08-03 13:13:43'),
(24, 'MSD', 'Supply Unit', '2021-08-03 13:13:55', '2021-08-03 13:13:55'),
(25, 'LHSD', 'Chief LHSD Office', '2021-08-03 13:14:14', '2021-08-03 13:14:14'),
(26, 'LHSD', 'Envi. and Occp. Health Cluster - EOH', '2021-08-03 13:14:39', '2021-08-03 13:14:39'),
(27, 'LHSD', 'Health Emergency Management Staff - HEMS', '2021-08-03 13:15:29', '2021-08-03 13:15:29'),
(28, 'LHSD', 'Health Facility Development Unit - HFDU', '2021-08-03 13:15:51', '2021-08-03 13:15:51'),
(29, 'LHSD', 'Health Facility Enhancement Program - HFEP', '2021-08-03 13:16:11', '2021-08-03 13:16:11'),
(30, 'LHSD', 'Health Information, Research and Development Section', '2021-08-03 13:16:45', '2021-08-03 13:16:45'),
(31, 'LHSD', 'Health System Development - HSD', '2021-08-03 13:17:07', '2021-08-03 13:17:07'),
(32, 'LHSD', 'Infectious Disease Cluster', '2021-08-03 13:17:27', '2021-08-03 13:17:27'),
(33, 'LHSD', 'Mosquito Borne', '2021-08-03 13:17:42', '2021-08-03 13:17:42'),
(34, 'LHSD', 'National Immunization Program - NIP', '2021-08-03 13:17:57', '2021-08-03 13:17:57'),
(35, 'LHSD', 'National Tuberculosis Program', '2021-08-03 13:18:12', '2021-08-03 13:18:12'),
(36, 'LHSD', 'National Voluntary Blood Services Program - NVBSP', '2021-08-03 13:18:44', '2021-08-03 13:18:44'),
(37, 'LHSD', 'Office of Strategy Management OSM & ISO QMS', '2021-08-03 13:19:21', '2021-08-03 13:19:21'),
(38, 'LHSD', 'Regional Epidemiology Surveillance Unit - RESU', '2021-08-03 13:19:43', '2021-08-03 13:19:43');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `ict_property_code` varchar(50) DEFAULT NULL,
  `serial_no` varchar(50) DEFAULT NULL,
  `type` varchar(30) DEFAULT NULL,
  `brand` varchar(30) DEFAULT NULL,
  `brief_specs` varchar(50) DEFAULT NULL,
  `date_acquired` varchar(20) DEFAULT NULL,
  `acquisition` varchar(20) DEFAULT NULL,
  `enduser` varchar(60) DEFAULT NULL,
  `division` varchar(50) DEFAULT NULL,
  `section` varchar(100) DEFAULT NULL,
  `status` varchar(150) DEFAULT NULL,
  `reason` varchar(100) DEFAULT NULL,
  `action` varchar(150) DEFAULT NULL,
  `date_of_changestatus` varchar(20) DEFAULT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `ict_property_code`, `serial_no`, `type`, `brand`, `brief_specs`, `date_acquired`, `acquisition`, `enduser`, `division`, `section`, `status`, `reason`, `action`, `date_of_changestatus`, `date_added`, `date_updated`) VALUES
(41, 'CHD12-ICT-MSD-PRI-001', '123', 'Printer', 'HP', 'P1002', '2021-07-09', 'Purchased', 'Tina Banas', 'MSD', 'Personnel Section', 'Active', '', NULL, NULL, '2021-07-09 21:56:59', '2021-08-08 21:37:31'),
(42, 'CHD12-ICT-MSD-DPC-002', '12345', 'Desktop', 'Acer', 'i9', '2021-07-09', 'Purchased', 'Alma', 'LHSD', 'Family Health Cluster', 'Active', 'Ayos pala ang pc', 'Working again', '2021-08-03', '2021-07-09 21:57:36', '2021-08-13 16:27:53'),
(43, 'CHD12-ICT-MSD-NBK-003', '12345', 'Laptop/Notebook', 'Dell', 'Ryzen 10', '2021-07-09', 'Purchased', 'Edwin', 'MSD', 'Non-comm Disease Cluster', 'Active', '', NULL, NULL, '2021-07-09 21:58:19', '2021-08-08 21:36:03'),
(44, 'CHD12-ICT-MSD-DPC-006', '1234567', 'Desktop', 'Asus', 'Ryzen 3', '2021-07-09', 'Purchased', 'Garizaldy', 'LHSD', 'Family Health Cluster', 'Active', '', NULL, NULL, '2021-07-09 21:59:31', '2021-08-08 21:36:19'),
(46, 'CHD12-ICT-MSD-DPC-003', '1234567', 'Desktop', 'Acer', 'i3', '2021-07-17', 'Purchased', 'Ronnie', 'LHSD', 'Family Health Cluster', 'Active', '', NULL, NULL, '2021-07-17 21:09:21', '2021-08-08 21:37:18'),
(47, 'CHD12-ICT-MSD-PRI-002', '123456789', 'Printer', 'HP', 'Canon 123', '2021-07-17', 'Purchased', 'Sarah', 'LHSD', 'Non-comm Disease Cluster', 'Active', '', NULL, NULL, '2021-07-17 21:11:25', '2021-08-08 21:37:23'),
(48, 'CHD12-ICT-MSD-DPC-004', '098765', 'Desktop', 'Acer', 'i7', '2021-07-17', 'Purchased', 'Joice', 'LHSD', 'Family Health Cluster', 'Active', '', NULL, NULL, '2021-07-17 21:12:07', '2021-08-08 21:36:23'),
(49, 'CHD12-ICT-MSD-DPC-005', '1234567', 'Desktop', 'HP', 'i9', '2021-07-17', 'Purchased', 'Mike', 'LHSD', 'Human Resource Development unit', 'Active', '', NULL, NULL, '2021-07-17 21:29:50', '2021-08-08 21:37:05'),
(51, 'CHD12-ICT-MSD-PRI-003', '003', 'Printer', 'Asus', 'Ryzen 3 apu', '2021-07-18', 'Purchased', 'Josmar', 'LHSD', 'Non-comm Disease Cluster', 'Active', '', NULL, NULL, '2021-07-18 11:47:20', '2021-08-08 21:36:29'),
(52, 'CHD12-ICT-MSD-PRI-004', '12345', 'Printer', 'Acer', 'i3', '2021-07-18', 'Purchased', 'Moc', 'MSD', 'Personnel Section', 'Active', '', NULL, NULL, '2021-07-18 11:47:58', '2021-08-08 21:37:13'),
(53, 'CHD12-ICT-MSD-PRI-005', '123123', 'Printer', 'Acer', 'i5', '2021-07-18', 'Purchased', 'Kim', 'LHSD', 'Family Health Cluster', 'Active', '', NULL, NULL, '2021-07-18 11:50:43', '2021-08-08 21:36:33'),
(54, 'CHD12-ICT-MSD-PRI-006', '12312345', 'Printer', 'Epson', 'l120', '2021-07-18', 'Purchased', 'Diane', 'LHSD', 'Family Health Cluster', 'Inactive', 'Lipat na may ari', 'Transferred to PDOHO', '2021-08-03', '2021-07-18 11:53:27', '2021-08-08 21:36:14'),
(55, 'CHD12-ICT-MSD-PRI-008', '12341234', 'Printer', 'Epson', 'l220', '2021-07-18', 'Purchased', 'Donna', 'MSD', 'Human Resource Development unit', 'Active', '', NULL, NULL, '2021-07-18 12:08:53', '2021-08-13 16:22:52'),
(56, 'CHD12-ICT-MSD-PRI-007', '9876543210321', 'Printer', 'Acer', 'Ryzen 5', '2021-08-02', 'Purchased', 'Mel', 'MSD', 'Non-comm Disease Cluster', 'Active', '', NULL, NULL, '2021-08-02 14:07:52', '2021-08-08 21:36:54');

-- --------------------------------------------------------

--
-- Table structure for table `employees_signature`
--

CREATE TABLE `employees_signature` (
  `id` int(11) NOT NULL,
  `mr_id` int(11) NOT NULL,
  `signature` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employees_signature`
--

INSERT INTO `employees_signature` (`id`, `mr_id`, `signature`) VALUES
(82, 1, 'Alma1.png'),
(83, 2, 'Alma2.png'),
(84, 4, 'Jomar4.png'),
(85, 5, 'Diane5.png'),
(87, 6, 'Donna6.png'),
(89, 3, 'Edwin3.png'),
(90, 7, 'Edwin7.png');

-- --------------------------------------------------------

--
-- Table structure for table `maintenance_record`
--

CREATE TABLE `maintenance_record` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `tasks` varchar(150) DEFAULT NULL,
  `date` varchar(20) DEFAULT NULL,
  `action_taken` varchar(20) DEFAULT NULL,
  `doneby` varchar(50) DEFAULT NULL,
  `affirmedby` text DEFAULT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `maintenance_record`
--

INSERT INTO `maintenance_record` (`id`, `employee_id`, `tasks`, `date`, `action_taken`, `doneby`, `affirmedby`, `date_added`, `date_updated`) VALUES
(1, 42, 'Update os, Update office', '2021-07-09', 'Preventive', 'Kenny Marañon', 'Alma', '2021-07-09 22:07:55', '2021-08-11 15:47:24'),
(2, 42, 'Update os', '2021-07-09', 'Preventive', 'John Phillip', 'Alma', '2021-07-09 22:08:13', '2021-08-11 15:47:29'),
(3, 43, 'Update os, Update office, Install apps', '2021-07-09', 'Preventive', 'Victor', 'Edwin', '2021-07-09 22:08:39', '2021-07-09 22:08:39'),
(4, 42, 'Checkdisk', '2021-08-02', 'Preventive', 'Victor', 'Jomar', '2021-08-02 15:04:26', '2021-08-02 15:04:26'),
(5, 54, 'Format', '2021-08-11', 'Preventive', 'Victor', 'Diane', '2021-08-02 15:04:57', '2021-08-11 14:10:52'),
(6, 55, 'Checkdisk', '2021-08-06', 'Preventive', 'Victor', 'Donna', '2021-08-06 12:07:49', '2021-08-11 14:53:32'),
(7, 43, 'Update os, Update office, Install apps', '2021-08-09', 'Preventive', 'Victor', 'Edwin', '2021-08-09 00:04:51', '2021-08-09 00:04:51'),
(8, 44, 'Update os, Update office', '2021-08-09', 'Preventive', 'Victor', 'Garizaldy', '2021-08-09 00:08:22', '2021-08-09 00:08:22'),
(9, 42, 'Format', '2021-08-11', 'Preventive', 'Kenny Marañon', '', '2021-08-11 15:47:12', '2021-08-11 15:47:12');

-- --------------------------------------------------------

--
-- Table structure for table `replaced_parts`
--

CREATE TABLE `replaced_parts` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `parts` varchar(150) DEFAULT NULL,
  `date` varchar(30) DEFAULT NULL,
  `doneby` varchar(30) DEFAULT NULL,
  `affirmedby` varchar(30) DEFAULT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `replaced_parts`
--

INSERT INTO `replaced_parts` (`id`, `employee_id`, `parts`, `date`, `doneby`, `affirmedby`, `date_added`) VALUES
(1, 42, 'Hard drive and ram', '2021-07-11', 'Ken', 'Alma', '2021-07-11 11:28:10'),
(3, 42, 'Hard drive and ram and monitor', '2021-07-11', 'Ken', 'Alma', '2021-07-11 11:42:01');

-- --------------------------------------------------------

--
-- Table structure for table `status_log`
--

CREATE TABLE `status_log` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `status` varchar(30) DEFAULT NULL,
  `date` varchar(30) DEFAULT NULL,
  `action` varchar(50) DEFAULT NULL,
  `reason` varchar(155) DEFAULT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `status_log`
--

INSERT INTO `status_log` (`id`, `employee_id`, `status`, `date`, `action`, `reason`, `date_added`) VALUES
(1, 42, 'Inactive', '2021-07-18', 'Transferred to PDOHO', 'Lipat may ari', '2021-07-18 18:13:07'),
(2, 42, 'Active', '2021-07-18', 'Working again', 'Gana na ulit', '2021-07-18 18:13:40'),
(3, 54, 'Inactive', '2021-08-03', 'Transferred to PDOHO', 'Lipat na may ari', '2021-08-03 08:19:30'),
(4, 42, 'Inactive', '2021-08-03', 'Returned to supply', 'Sira na ang pc', '2021-08-03 14:14:39'),
(5, 42, 'Active', '2021-08-03', 'Working again', 'Ayos pala ang pc', '2021-08-03 14:15:00');

-- --------------------------------------------------------

--
-- Table structure for table `task_taandcor`
--

CREATE TABLE `task_taandcor` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` varchar(30) DEFAULT NULL,
  `division` varchar(60) DEFAULT NULL,
  `section` varchar(60) DEFAULT NULL,
  `personnel` varchar(30) DEFAULT NULL,
  `itpersonnel` varchar(30) DEFAULT NULL,
  `task_request` varchar(150) DEFAULT NULL,
  `action_taken` varchar(150) DEFAULT NULL,
  `task_type` varchar(15) DEFAULT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `task_taandcor`
--

INSERT INTO `task_taandcor` (`id`, `user_id`, `date`, `division`, `section`, `personnel`, `itpersonnel`, `task_request`, `action_taken`, `task_type`, `date_added`, `date_updated`) VALUES
(5, 25, '2021-07-19', 'LHSD', 'Non-com', 'Cherry Yee', 'John Phillip', 'No internet connection', 'dns release and renew ', 'TA', '2021-07-19 22:59:09', '2021-08-03 08:44:39'),
(7, 24, '2021-07-22', 'LHSD', 'Personnel Section', 'Tina Banas', 'Victor', 'Not working speaker', 'restart the speaker', 'TA', '2021-07-22 12:37:21', '2021-08-08 21:35:03'),
(8, 24, '2021-07-26', 'MSD', 'Personnel Section', 'Tina banas', 'Victor', 'Webex', 'reinstall webex', 'TA', '2021-07-26 09:41:38', '2021-08-08 21:34:58'),
(9, 25, '2021-07-27', 'MSD', 'Personnel Section', 'Tina banas', 'John Phillip', 'Webex', 'reinstall webex', 'TA', '2021-07-27 08:49:26', '2021-08-03 13:47:49'),
(10, 25, '2021-07-27', 'LHSD', 'Family planning', 'Bong', 'John Phillip', 'Printer not working', 'resintall printer', 'Corrective', '2021-07-27 08:50:34', '2021-07-27 08:50:34'),
(11, 24, '2021-07-28', 'MSD', 'Human Resource Development unit', 'Edwin Gulle', 'Victor', 'On and off system unit', 'Apply thermal paste', 'Corrective', '2021-07-28 15:54:46', '2021-08-08 21:32:46'),
(12, 24, '2021-07-28', 'LHSD', 'Family Health Cluster', 'Roneth', 'Victor', 'Error printer', 'Reset printer', 'Corrective', '2021-07-28 15:57:05', '2021-08-08 21:33:33'),
(13, 24, '2021-07-28', 'MSD', 'Personnel Section', 'Janeth', 'Victor', 'Paper Jam', 'Remove the paper', 'Corrective', '2021-07-28 16:04:37', '2021-08-08 21:34:53'),
(14, 24, '2021-07-29', 'MSD', 'Personnel Section', 'Janeth', 'Victor', 'Setup webex', 'Setup webex in montañer', 'TA', '2021-07-28 16:05:20', '2021-08-08 21:32:41'),
(35, 28, '2021-08-02', 'MSD', 'HRDU', 'Cherry Yee', 'Kenny Marañon', 'Join zoom meeting', 'Setup zoom', 'TA', '2021-08-02 15:03:40', '2021-08-02 16:44:43'),
(36, 28, '2021-08-02', 'MSD', 'HRDU', 'Cherry Yee', 'Kenny Marañon', 'Webex', 'setup webex', 'TA', '2021-08-02 16:53:33', '2021-08-03 08:47:09'),
(37, 28, '2021-08-02', 'MSD', 'Personnel', 'Alma Buagas', 'Kenny Marañon', 'No interner', 'release and renew dns', 'Corrective', '2021-08-02 16:56:27', '2021-08-02 16:56:40'),
(38, 25, '2021-08-02', 'LHSD', 'Non-com', 'Garizaldy Epistola', 'John Phillip', 'Join zoom meeting', 'Setup join meeting', 'Corrective', '2021-08-02 16:57:25', '2021-08-03 08:43:20'),
(39, 25, '2021-08-03', 'MSD', 'Personnel Section', 'Cherry Yee', 'John Phillip', 'Edit RD video', 'Edit video of RD', 'TA', '2021-08-03 13:34:32', '2021-08-03 13:34:32'),
(40, 29, '2021-08-03', 'MSD', 'Planning Unit', 'Tina banas', 'Michael Zingapan', 'Join Webex', 'setup webex', 'TA', '2021-08-03 15:06:54', '2021-08-03 15:06:54');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `fullname` varchar(50) DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(25) DEFAULT NULL,
  `access` varchar(15) DEFAULT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `fullname`, `username`, `password`, `access`, `date_added`, `date_updated`) VALUES
(24, 'Victor', 'admin', 'admin', 'User', '2021-07-05 12:58:27', '2021-08-11 14:18:27'),
(25, 'John Phillip', 'admin1', 'admin1', 'User', '2021-07-05 12:59:05', '2021-07-05 12:59:05'),
(26, 'asd', 'asd', 'asd', 'Admin', '2021-07-05 15:10:32', '2021-07-05 15:10:32'),
(28, 'Kenny Marañon', 'admin2', 'admin2', 'User', '2021-07-28 16:18:52', '2021-07-28 16:18:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `division_section`
--
ALTER TABLE `division_section`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees_signature`
--
ALTER TABLE `employees_signature`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `maintenance_record`
--
ALTER TABLE `maintenance_record`
  ADD PRIMARY KEY (`id`),
  ADD KEY `maintenance_record_ibfk_1` (`employee_id`);

--
-- Indexes for table `replaced_parts`
--
ALTER TABLE `replaced_parts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status_log`
--
ALTER TABLE `status_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `task_taandcor`
--
ALTER TABLE `task_taandcor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `division_section`
--
ALTER TABLE `division_section`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `employees_signature`
--
ALTER TABLE `employees_signature`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `maintenance_record`
--
ALTER TABLE `maintenance_record`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `replaced_parts`
--
ALTER TABLE `replaced_parts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `status_log`
--
ALTER TABLE `status_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `task_taandcor`
--
ALTER TABLE `task_taandcor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `maintenance_record`
--
ALTER TABLE `maintenance_record`
  ADD CONSTRAINT `maintenance_record_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
