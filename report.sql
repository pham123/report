-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 12, 2020 at 04:05 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `report`
--

-- --------------------------------------------------------

--
-- Table structure for table `kehoach`
--

CREATE TABLE `kehoach` (
  `KeHoachId` int(6) UNSIGNED NOT NULL,
  `LineId` int(6) DEFAULT NULL,
  `ProductsId` int(6) DEFAULT NULL,
  `KeHoachQty` int(10) DEFAULT NULL,
  `KeHoachCreateDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `KeHoachUpdateDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kehoach`
--

INSERT INTO `kehoach` (`KeHoachId`, `LineId`, `ProductsId`, `KeHoachQty`, `KeHoachCreateDate`, `KeHoachUpdateDate`) VALUES
(1, 1, NULL, 26050, '2019-12-02 06:00:01', '2019-12-02 10:22:17'),
(2, 5, NULL, 20000, '2019-12-02 10:19:19', '2019-12-02 10:19:19'),
(3, 2, NULL, 26050, '2019-12-02 10:23:38', '2019-12-02 10:23:38'),
(4, 1, NULL, 2000, '2019-12-03 04:29:13', '2019-12-03 04:29:13'),
(5, 5, NULL, 5000, '2019-12-13 02:31:47', '2019-12-13 02:31:47'),
(6, 1, NULL, 25600, '2019-12-13 03:23:23', '2019-12-13 03:23:23'),
(7, 2, NULL, 25600, '2019-12-13 03:23:57', '2019-12-13 03:23:57'),
(8, 6, NULL, 156000, '2019-12-13 03:44:17', '2019-12-13 03:44:17'),
(9, 1, NULL, 0, '2020-01-08 07:09:54', '2020-01-08 11:55:18'),
(10, 11, NULL, 25000, '2020-01-08 07:10:46', '2020-01-08 07:10:46'),
(11, 13, NULL, 200000, '2020-01-08 07:12:14', '2020-01-08 07:12:14'),
(12, 12, NULL, 36000, '2020-01-08 07:13:15', '2020-01-08 07:13:15'),
(13, 13, NULL, 200000, '2020-01-09 03:43:01', '2020-01-09 03:51:06'),
(14, 1, NULL, 25000, '2020-01-09 04:01:51', '2020-01-09 04:01:51'),
(15, 11, NULL, 25000, '2020-01-09 04:01:56', '2020-01-09 04:01:56'),
(16, 12, NULL, 36000, '2020-01-09 04:02:15', '2020-01-09 04:02:25'),
(17, 1, NULL, 25000, '2020-01-10 01:20:01', '2020-01-10 01:20:01'),
(18, 13, NULL, 205000, '2020-01-10 01:20:12', '2020-01-10 01:20:12'),
(19, 11, NULL, 25000, '2020-01-10 01:20:19', '2020-01-10 01:20:19'),
(20, 12, NULL, 36800, '2020-01-10 02:10:14', '2020-01-10 02:10:14'),
(21, 1, NULL, 15000, '2020-01-12 04:21:17', '2020-01-12 08:05:58'),
(22, 11, NULL, 15000, '2020-01-12 04:24:20', '2020-01-12 08:06:10'),
(23, 12, NULL, 25000, '2020-01-12 04:24:35', '2020-01-12 09:09:15'),
(24, 13, NULL, 150000, '2020-01-12 04:24:43', '2020-01-12 09:09:03');

-- --------------------------------------------------------

--
-- Table structure for table `lang`
--

CREATE TABLE `lang` (
  `LangId` int(6) UNSIGNED NOT NULL,
  `LangName` varchar(30) NOT NULL,
  `LangVi` varchar(200) DEFAULT NULL,
  `LangEn` varchar(200) DEFAULT NULL,
  `LangCn` varchar(200) DEFAULT NULL,
  `LangKr` varchar(200) DEFAULT NULL,
  `LangOption` int(1) DEFAULT NULL,
  `LangCreateDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `LangUpdateDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lang`
--

INSERT INTO `lang` (`LangId`, `LangName`, `LangVi`, `LangEn`, `LangCn`, `LangKr`, `LangOption`, `LangCreateDate`, `LangUpdateDate`) VALUES
(1, 'Products', 'Sản phẩm', 'Products', 'Products', 'Products', 1, '2019-12-02 04:58:23', '2019-12-02 04:58:23'),
(2, 'EM- TECH VIET NAM VINH', 'EM- TECH VIET NAM VINH', 'EM- TECH VIET NAM VINH', 'EM- TECH VIET NAM VINH', 'EM- TECH VIET NAM VINH', 1, '2019-12-02 04:58:38', '2019-12-03 07:38:45'),
(3, 'EMVV', 'EMVV', 'EMVV', 'EMVV', 'EMVV', 1, '2019-12-02 04:58:38', '2019-12-03 07:39:03'),
(4, 'HomePage', 'Home Page', 'Home Page', 'Home Page', 'Home Page', 1, '2019-12-02 04:58:38', '2019-12-02 04:58:38'),
(5, 'Information', 'Information', 'Information', 'Information', 'Information', 1, '2019-12-02 04:58:38', '2019-12-02 04:58:38'),
(6, 'Profile', 'Profile', 'Profile', 'Profile', 'Profile', 1, '2019-12-02 04:58:38', '2019-12-02 04:58:38'),
(7, 'Settings', 'Settings', 'Settings', 'Settings', 'Settings', 1, '2019-12-02 04:58:38', '2019-12-02 04:58:38'),
(8, 'ActivityLogs', 'Activity Logs', 'Activity Logs', 'Activity Logs', 'Activity Logs', 1, '2019-12-02 04:58:38', '2019-12-02 04:58:38'),
(9, 'Logout', 'Logout', 'Logout', 'Logout', 'Logout', 1, '2019-12-02 04:58:38', '2019-12-02 04:58:38'),
(10, 'Productivity', 'Sản lượng', 'Sản lượng', 'Sản lượng', 'Sản lượng', 1, '2019-12-02 04:58:38', '2019-12-02 04:58:38'),
(11, 'Quantity', 'Quantity', 'Quantity', 'Quantity', 'Quantity', 1, '2019-12-02 04:58:38', '2019-12-02 04:58:38'),
(12, 'Admin', 'Admin', 'Admin', 'Admin', 'Admin', 1, '2019-12-02 04:58:38', '2019-12-02 04:58:38'),
(13, 'AdminSeting', 'Admin Seting', 'Admin Seting', 'Admin Seting', 'Admin Seting', 1, '2019-12-02 04:58:38', '2019-12-02 04:58:38'),
(14, 'Notice', 'Notice', 'Notice', 'Notice', 'Notice', 1, '2019-12-02 04:58:38', '2019-12-02 04:58:38'),
(15, 'Copyright', 'Copyright', 'Copyright', 'Copyright', 'Copyright', 1, '2019-12-02 04:58:38', '2019-12-02 04:58:38'),
(16, 'Home', 'Home', 'Home', 'Home', 'Home', 1, '2019-12-02 04:58:53', '2019-12-02 04:58:53'),
(17, 'Lang', 'Lang', 'Lang', 'Lang', 'Lang', 1, '2019-12-02 04:58:53', '2019-12-02 04:58:53'),
(18, 'Users', 'Users', 'Users', 'Users', 'Users', 1, '2019-12-02 04:58:53', '2019-12-02 04:58:53'),
(19, 'Line', 'Line', 'Line', 'Line', 'Line', 1, '2019-12-02 04:58:53', '2019-12-02 04:58:53'),
(20, 'Company', 'Company', 'Company', 'Company', 'Company', 1, '2019-12-02 04:58:53', '2019-12-02 04:58:53'),
(21, 'CreateNew', 'Create New', 'Create New', 'Create New', 'Create New', 1, '2019-12-02 04:58:56', '2019-12-02 04:58:56'),
(22, 'UsersId', 'Users Id', 'Users Id', 'Users Id', 'Users Id', 1, '2019-12-02 04:58:56', '2019-12-02 04:58:56'),
(23, 'UsersName', 'Users Name', 'Users Name', 'Users Name', 'Users Name', 1, '2019-12-02 04:58:56', '2019-12-02 04:58:56'),
(24, 'UsersFullName', 'Users Full Name', 'Users Full Name', 'Users Full Name', 'Users Full Name', 1, '2019-12-02 04:58:56', '2019-12-02 04:58:56'),
(25, 'UsersPassword', 'Users Password', 'Users Password', 'Users Password', 'Users Password', 1, '2019-12-02 04:58:56', '2019-12-02 04:58:56'),
(26, 'UsersEmail', 'Users Email', 'Users Email', 'Users Email', 'Users Email', 1, '2019-12-02 04:58:56', '2019-12-02 04:58:56'),
(27, 'UsersOption', 'Users Option', 'Users Option', 'Users Option', 'Users Option', 1, '2019-12-02 04:58:56', '2019-12-02 04:58:56'),
(28, 'UsersCreateDate', 'Users Create Date', 'Users Create Date', 'Users Create Date', 'Users Create Date', 1, '2019-12-02 04:58:56', '2019-12-02 04:58:56'),
(29, 'UsersUpdateDate', 'Users Update Date', 'Users Update Date', 'Users Update Date', 'Users Update Date', 1, '2019-12-02 04:58:56', '2019-12-02 04:58:56'),
(30, 'Edit', 'Edit', 'Edit', 'Edit', 'Edit', 1, '2019-12-02 04:58:56', '2019-12-02 04:58:56'),
(31, 'LangId', 'Lang Id', 'Lang Id', 'Lang Id', 'Lang Id', 1, '2019-12-02 04:58:59', '2019-12-02 04:58:59'),
(32, 'LangName', 'Lang Name', 'Lang Name', 'Lang Name', 'Lang Name', 1, '2019-12-02 04:58:59', '2019-12-02 04:58:59'),
(33, 'LangVi', 'Lang Vi', 'Lang Vi', 'Lang Vi', 'Lang Vi', 1, '2019-12-02 04:58:59', '2019-12-02 04:58:59'),
(34, 'LangEn', 'Lang En', 'Lang En', 'Lang En', 'Lang En', 1, '2019-12-02 04:58:59', '2019-12-02 04:58:59'),
(35, 'LangCn', 'Lang Cn', 'Lang Cn', 'Lang Cn', 'Lang Cn', 1, '2019-12-02 04:58:59', '2019-12-02 04:58:59'),
(36, 'LangKr', 'Lang Kr', 'Lang Kr', 'Lang Kr', 'Lang Kr', 1, '2019-12-02 04:58:59', '2019-12-02 04:58:59'),
(37, 'LangOption', 'Lang Option', 'Lang Option', 'Lang Option', 'Lang Option', 1, '2019-12-02 04:58:59', '2019-12-02 04:58:59'),
(38, 'LangCreateDate', 'Lang Create Date', 'Lang Create Date', 'Lang Create Date', 'Lang Create Date', 1, '2019-12-02 04:58:59', '2019-12-02 04:58:59'),
(39, 'LangUpdateDate', 'Lang Update Date', 'Lang Update Date', 'Lang Update Date', 'Lang Update Date', 1, '2019-12-02 04:58:59', '2019-12-02 04:58:59'),
(40, 'LineId', 'Line Id', 'Line Id', 'Line Id', 'Line Id', 1, '2019-12-02 04:59:06', '2019-12-02 04:59:06'),
(41, 'LineName', 'Line Name', 'Line Name', 'Line Name', 'Line Name', 1, '2019-12-02 04:59:06', '2019-12-02 04:59:06'),
(42, 'LineInformation', 'Line Information', 'Line Information', 'Line Information', 'Line Information', 1, '2019-12-02 04:59:06', '2019-12-02 04:59:06'),
(43, 'LineDescription', 'Line Description', 'Line Description', 'Line Description', 'Line Description', 1, '2019-12-02 04:59:06', '2019-12-02 04:59:06'),
(44, 'ProductsName', 'Products Name', 'Products Name', 'Products Name', 'Products Name', 1, '2019-12-02 04:59:06', '2019-12-02 04:59:06'),
(45, 'LineOption', 'Line Option', 'Line Option', 'Line Option', 'Line Option', 1, '2019-12-02 04:59:06', '2019-12-02 04:59:06'),
(46, 'LineCreateDate', 'Line Create Date', 'Line Create Date', 'Line Create Date', 'Line Create Date', 1, '2019-12-02 04:59:06', '2019-12-02 04:59:06'),
(47, 'LineUpdateDate', 'Line Update Date', 'Line Update Date', 'Line Update Date', 'Line Update Date', 1, '2019-12-02 04:59:06', '2019-12-02 04:59:06'),
(48, 'ProductsId', 'Products Id', 'Products Id', 'Products Id', 'Products Id', 1, '2019-12-02 04:59:08', '2019-12-02 04:59:08'),
(49, 'ProductsNumber', 'Products Number', 'Products Number', 'Products Number', 'Products Number', 1, '2019-12-02 04:59:08', '2019-12-02 04:59:08'),
(50, 'ProductsInformation', 'Products Information', 'Products Information', 'Products Information', 'Products Information', 1, '2019-12-02 04:59:08', '2019-12-02 04:59:08'),
(51, 'ProductsDescription', 'Products Description', 'Products Description', 'Products Description', 'Products Description', 1, '2019-12-02 04:59:08', '2019-12-02 04:59:08'),
(52, 'ProductsOption', 'Products Option', 'Products Option', 'Products Option', 'Products Option', 1, '2019-12-02 04:59:08', '2019-12-02 04:59:08'),
(53, 'ProductsCreateDate', 'Products Create Date', 'Products Create Date', 'Products Create Date', 'Products Create Date', 1, '2019-12-02 04:59:08', '2019-12-02 04:59:08'),
(54, 'ProductsUpdateDate', 'Products Update Date', 'Products Update Date', 'Products Update Date', 'Products Update Date', 1, '2019-12-02 04:59:08', '2019-12-02 04:59:08'),
(55, 'Stt', 'Stt', 'Stt', 'Stt', 'Stt', 1, '2019-12-02 04:59:40', '2019-12-02 04:59:40'),
(56, 'Plan', 'Plan', 'Plan', 'Plan', 'Plan', 1, '2019-12-02 04:59:41', '2019-12-02 04:59:41'),
(57, 'Total', 'Total', 'Total', 'Total', 'Total', 1, '2019-12-02 04:59:43', '2019-12-02 04:59:43'),
(58, 'Rate', 'A.Rate', 'A.Rate', 'A.Rate', 'A.Rate', 1, '2019-12-02 04:59:43', '2020-01-12 04:43:20'),
(59, 'Time 1', 'Time 1', 'Time 1', 'Time 1', 'Time 1', 1, '2019-12-02 04:59:43', '2019-12-03 07:40:59'),
(60, 'Time 2', 'Time 2', 'Time 2', 'Time 2', 'Time 2', 1, '2019-12-02 04:59:43', '2019-12-03 07:42:01'),
(61, 'Time 3', 'Time 3', 'Time 3', 'Time 3', 'Time 3', 1, '2019-12-02 04:59:43', '2019-12-03 07:40:22'),
(62, 'Time 4', 'Time 4', 'Time 4', 'Time 4', 'Time 4', 1, '2019-12-02 04:59:43', '2019-12-03 07:42:34'),
(63, 'Time 5', 'Time 5', 'Time 5', 'Time 5', 'Time 5', 1, '2019-12-02 04:59:43', '2019-12-03 07:43:25'),
(64, 'Remark', 'Remark', 'Remark', 'Remark', 'Remark', 1, '2019-12-02 04:59:43', '2019-12-02 04:59:43'),
(65, 'OK', 'OK', 'OK', 'OK', 'OK', 1, '2019-12-02 04:59:43', '2019-12-03 07:41:30'),
(66, 'NG', 'NG', 'NG', 'NG', 'NG', 1, '2019-12-02 04:59:43', '2019-12-03 07:42:57'),
(67, 'TitleReport', 'Title Report', 'EVV REPORT', 'Title Report', 'Title Report', 1, '2019-12-03 04:26:01', '2019-12-03 04:33:40'),
(68, 'Type', 'Type', 'Type', 'Type', 'Type', 1, '2019-12-03 04:26:01', '2019-12-03 04:26:01'),
(69, 'Target', 'Target', 'Target', 'Target', 'Target', 1, '2019-12-03 04:26:01', '2019-12-03 04:26:01'),
(70, 'Actual', 'Actual', 'Actual', 'Actual', 'Actual', 1, '2019-12-03 04:26:01', '2019-12-03 04:26:01'),
(71, 'TargetQuantity', 'Target Quantity', 'Target Quantity', 'Target Quantity', 'Target Quantity', 1, '2019-12-03 04:26:12', '2019-12-03 04:26:12'),
(72, 'TargetQuantityId', 'Target Quantity Id', 'Target Quantity Id', 'Target Quantity Id', 'Target Quantity Id', 1, '2019-12-03 04:26:15', '2019-12-03 04:26:15'),
(73, 'TargetQuantityTimes', 'Target Quantity Times', 'Target Quantity Times', 'Target Quantity Times', 'Target Quantity Times', 1, '2019-12-03 04:26:15', '2019-12-03 04:26:15'),
(74, 'TargetQuantityQty', 'Target Quantity Qty', 'Target Quantity Qty', 'Target Quantity Qty', 'Target Quantity Qty', 1, '2019-12-03 04:26:15', '2019-12-03 04:26:15'),
(75, 'TargetQuantityCreateDate', 'Target Quantity Create Date', 'Target Quantity Create Date', 'Target Quantity Create Date', 'Target Quantity Create Date', 1, '2019-12-03 04:26:15', '2019-12-03 04:26:15'),
(76, 'TargetQuantityUpdateDate', 'Target Quantity Update Date', 'Target Quantity Update Date', 'Target Quantity Update Date', 'Target Quantity Update Date', 1, '2019-12-03 04:26:15', '2019-12-03 04:26:15'),
(77, 'Time1', 'Time1', 'Time1', 'Time1', 'Time1', 1, '2019-12-03 07:42:25', '2020-01-12 04:27:31'),
(78, 'Time2', 'Time2', 'Time2', 'Time2', 'Time2', 1, '2019-12-03 07:42:25', '2020-01-12 04:27:55'),
(79, 'Time3', 'Time3', 'Time3', 'Time3', 'Time3', 1, '2019-12-03 07:42:25', '2020-01-12 04:28:14'),
(80, 'Time4', 'Time4', 'Time4', 'Time4', 'Time4', 1, '2019-12-03 07:45:34', '2020-01-12 04:28:37'),
(81, 'Time5', 'Time5', 'Time5', 'Time5', 'Time5', 1, '2019-12-03 07:45:34', '2020-01-12 04:28:53'),
(82, 'HallaElectronicVina', 'Halla Electronic Vina', 'Halla Electronic Vina', 'Halla Electronic Vina', 'Halla Electronic Vina', 1, '2019-12-03 07:59:20', '2019-12-03 07:59:20'),
(83, 'Hev1', '', '', '', '', 1, '2019-12-03 07:59:20', '2019-12-03 08:37:29'),
(84, 'Report Title', 'Daily Production Status (일일 생산 현황)', 'Daily Production Status (일일 생산 현황)', 'Daily Production Status (일일 생산 현황)', 'Daily Production Status (일일 생산 현황)', 1, '2019-12-03 08:24:03', '2020-01-12 04:31:07'),
(85, 'LastUpdateTime', 'Last Updated Time', 'Last Updated Time', 'Last UpdatedTime', 'Last UpdatedTime', 1, '2019-12-03 08:24:03', '2020-01-12 04:42:27'),
(86, 'Hev', 'Hev', 'EVV', 'Hev', 'Hev', 1, '2019-12-03 08:35:20', '2019-12-03 08:38:53'),
(87, 'ReportTitle', 'Daily Production  Status (일일 생산 현황)', 'Daily Production  Status (일일 생산 현황)', 'Report Title', 'Report Title', 1, '2019-12-13 03:26:57', '2020-01-12 04:35:12'),
(88, 'Times1', 'Time1', 'Time1', 'Time1', 'Time1', 1, '2020-01-12 04:30:06', '2020-01-12 06:08:22'),
(89, 'Times2', 'Time2', 'Time2', 'Time2', 'Time2', 1, '2020-01-12 04:30:06', '2020-01-12 06:06:36'),
(90, 'Times3', 'Time3', 'Time3', 'Time3', 'Time3', 1, '2020-01-12 04:30:06', '2020-01-12 06:07:45'),
(91, 'Times4', 'Time4', 'Time4', 'Time4', 'Time4', 1, '2020-01-12 04:30:06', '2020-01-12 06:06:14'),
(92, 'Times5', 'Time5', 'Time5', 'Time5', 'Time5', 1, '2020-01-12 04:30:06', '2020-01-12 06:05:47'),
(93, 'color1', '#b3ffe6', '#b3ffe6', '#b3ffe6', '#b3ffe6', 1, '2020-01-12 14:46:35', '2020-01-12 14:46:35'),
(94, 'color2', '#b3ffe6', '#b3ffe6', '#b3ffe6', '#b3ffe6', 1, '2020-01-12 14:46:35', '2020-01-12 14:46:35');

-- --------------------------------------------------------

--
-- Table structure for table `line`
--

CREATE TABLE `line` (
  `LineId` int(6) UNSIGNED NOT NULL,
  `LineName` varchar(30) NOT NULL,
  `LineInformation` varchar(100) NOT NULL,
  `LineDescription` varchar(100) NOT NULL,
  `ProductsId` int(6) DEFAULT NULL,
  `LineOption` int(1) DEFAULT NULL,
  `LineCreateDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `LineUpdateDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `line`
--

INSERT INTO `line` (`LineId`, `LineName`, `LineInformation`, `LineDescription`, `ProductsId`, `LineOption`, `LineCreateDate`, `LineUpdateDate`) VALUES
(1, 'Auto 1', 'Auto Line', 'Auto Line', 1, 1, '2020-01-08 06:51:18', '2020-01-08 06:54:55'),
(11, 'Auto 2', 'Auto Line', 'Auto Line', 1, 2, '2020-01-08 06:55:32', '2020-01-08 06:55:32'),
(12, 'Cell Line 4', 'Cell Line', 'Cell Line', 1, 3, '2020-01-08 06:56:31', '2020-01-12 04:44:18'),
(13, 'Upper Line', 'Cell Line', 'Cell Line', 2, 4, '2020-01-08 06:56:58', '2020-01-08 06:56:58');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `ProductsId` int(6) UNSIGNED NOT NULL,
  `ProductsName` varchar(100) NOT NULL,
  `ProductsNumber` varchar(30) NOT NULL,
  `ProductsInformation` varchar(100) NOT NULL,
  `ProductsDescription` varchar(100) NOT NULL,
  `ProductsOption` int(1) DEFAULT NULL,
  `ProductsCreateDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `ProductsUpdateDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`ProductsId`, `ProductsName`, `ProductsNumber`, `ProductsInformation`, `ProductsDescription`, `ProductsOption`, `ProductsCreateDate`, `ProductsUpdateDate`) VALUES
(1, 'LOWER ASSY', 'AS01000075A', 'ACE ', 'ACE ', 1, '2019-12-02 04:58:23', '2019-12-14 06:20:16'),
(2, 'UPPER ASSY', 'AS01000097A', 'ACE ', 'ACE ', 1, '2019-12-02 10:15:04', '2019-12-14 06:20:37');

-- --------------------------------------------------------

--
-- Table structure for table `remark`
--

CREATE TABLE `remark` (
  `RemarkId` int(6) UNSIGNED NOT NULL,
  `LineId` int(6) DEFAULT NULL,
  `ProductsId` int(6) DEFAULT NULL,
  `RemarkContent` varchar(255) DEFAULT NULL,
  `RemarkCreateDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `RemarkUpdateDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `remark`
--

INSERT INTO `remark` (`RemarkId`, `LineId`, `ProductsId`, `RemarkContent`, `RemarkCreateDate`, `RemarkUpdateDate`) VALUES
(1, 1, NULL, '', '2019-12-03 04:29:26', '2019-12-03 07:37:22'),
(2, 5, NULL, 'Time 3: Cutting machine trouble ', '2019-12-13 03:17:02', '2019-12-13 03:17:02'),
(3, 3, NULL, 'No Plan', '2019-12-13 03:22:54', '2019-12-13 03:22:54'),
(4, 4, NULL, 'No Plan', '2019-12-13 03:23:05', '2019-12-13 03:23:05'),
(5, 1, NULL, '', '2020-01-08 11:02:56', '2020-01-08 11:06:56'),
(6, 1, NULL, '', '2020-01-09 06:56:23', '2020-01-09 16:05:37'),
(7, 11, NULL, '', '2020-01-09 06:57:23', '2020-01-09 06:59:13'),
(8, 13, NULL, '', '2020-01-10 01:22:06', '2020-01-10 01:22:19'),
(9, 1, NULL, '', '2020-01-10 01:35:54', '2020-01-10 01:35:57');

-- --------------------------------------------------------

--
-- Table structure for table `sanluong`
--

CREATE TABLE `sanluong` (
  `SanLuongId` int(6) UNSIGNED NOT NULL,
  `LineId` int(6) DEFAULT NULL,
  `ProductsId` int(6) DEFAULT NULL,
  `SanluongQty` int(10) DEFAULT NULL,
  `SanluongType` varchar(10) DEFAULT NULL,
  `SanluongTimes` varchar(10) DEFAULT NULL,
  `SanLuongCreateDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `SanLuongUpdateDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sanluong`
--

INSERT INTO `sanluong` (`SanLuongId`, `LineId`, `ProductsId`, `SanluongQty`, `SanluongType`, `SanluongTimes`, `SanLuongCreateDate`, `SanLuongUpdateDate`) VALUES
(1, 13, NULL, 43320, 'OK', '1', '2020-01-10 03:53:52', '2020-01-10 09:03:57'),
(2, 12, NULL, 7194, 'OK', '1', '2020-01-10 07:09:23', '2020-01-10 07:09:23'),
(3, 12, NULL, 6, 'NG', '1', '2020-01-10 07:09:27', '2020-01-10 07:09:27'),
(4, 12, NULL, 7193, 'OK', '2', '2020-01-10 07:09:53', '2020-01-10 07:09:53'),
(5, 12, NULL, 7, 'NG', '2', '2020-01-10 07:10:01', '2020-01-10 07:10:01'),
(6, 1, NULL, 5030, 'OK', '1', '2020-01-10 07:14:27', '2020-01-10 07:14:27'),
(7, 1, NULL, 10, 'NG', '1', '2020-01-10 07:14:30', '2020-01-10 07:14:30'),
(8, 1, NULL, 5032, 'OK', '2', '2020-01-10 07:14:40', '2020-01-10 07:14:40'),
(9, 1, NULL, 8, 'NG', '2', '2020-01-10 07:14:46', '2020-01-10 07:14:46'),
(10, 11, NULL, 5028, 'OK', '1', '2020-01-10 07:14:57', '2020-01-10 07:14:57'),
(11, 11, NULL, 12, 'NG', '1', '2020-01-10 07:15:00', '2020-01-10 07:15:00'),
(12, 11, NULL, 4627, 'OK', '2', '2020-01-10 07:15:15', '2020-01-10 07:15:15'),
(13, 11, NULL, 13, 'NG', '2', '2020-01-10 07:15:20', '2020-01-10 07:15:20'),
(14, 13, NULL, 43585, 'OK', '2', '2020-01-10 07:15:49', '2020-01-10 09:04:08'),
(15, 12, NULL, 7993, 'OK', '3', '2020-01-10 08:07:02', '2020-01-10 08:07:02'),
(16, 12, NULL, 7, 'NG', '3', '2020-01-10 08:07:04', '2020-01-10 08:07:04'),
(17, 13, NULL, 42559, 'OK', '3', '2020-01-10 08:36:06', '2020-01-10 09:04:17'),
(18, 13, NULL, 20, 'NG', '1', '2020-01-10 09:04:00', '2020-01-10 09:04:00'),
(19, 13, NULL, 24, 'NG', '2', '2020-01-10 09:04:11', '2020-01-10 09:04:11'),
(20, 13, NULL, 20, 'NG', '3', '2020-01-10 09:04:28', '2020-01-10 09:04:28'),
(21, 1, NULL, 5028, 'OK', '3', '2020-01-10 10:23:51', '2020-01-10 10:23:51'),
(22, 1, NULL, 12, 'NG', '3', '2020-01-10 10:23:55', '2020-01-10 10:23:55'),
(23, 11, NULL, 5028, 'OK', '3', '2020-01-10 10:24:04', '2020-01-10 10:24:04'),
(24, 11, NULL, 12, 'NG', '3', '2020-01-10 10:24:06', '2020-01-10 10:24:06'),
(25, 13, NULL, 41600, 'OK', '4', '2020-01-10 11:02:24', '2020-01-10 11:02:24'),
(26, 13, NULL, 21, 'NG', '4', '2020-01-10 11:02:33', '2020-01-10 11:02:33'),
(27, 12, NULL, 6197, 'OK', '4', '2020-01-10 11:16:02', '2020-01-10 11:52:42'),
(28, 12, NULL, 3, 'NG', '4', '2020-01-10 11:51:12', '2020-01-10 11:51:12'),
(29, 12, NULL, 7191, 'OK', '5', '2020-01-10 12:24:44', '2020-01-10 12:24:44'),
(30, 12, NULL, 9, 'NG', '5', '2020-01-10 12:24:47', '2020-01-10 12:24:47'),
(31, 1, NULL, 5036, 'OK', '4', '2020-01-10 12:33:12', '2020-01-10 12:33:12'),
(32, 1, NULL, 4, 'NG', '4', '2020-01-10 12:33:15', '2020-01-10 12:33:15'),
(33, 1, NULL, 5270, 'OK', '5', '2020-01-10 12:33:30', '2020-01-10 12:33:30'),
(34, 1, NULL, 10, 'NG', '5', '2020-01-10 12:33:35', '2020-01-10 12:33:35'),
(35, 11, NULL, 5031, 'OK', '4', '2020-01-10 12:33:51', '2020-01-10 12:33:51'),
(36, 11, NULL, 9, 'NG', '4', '2020-01-10 12:33:53', '2020-01-10 12:33:53'),
(37, 11, NULL, 9, 'NG', '5', '2020-01-10 12:33:58', '2020-01-10 12:33:58'),
(38, 11, NULL, 5271, 'OK', '5', '2020-01-10 12:34:09', '2020-01-10 12:34:09'),
(39, 1, NULL, 0, 'OK', '1', '2020-01-12 04:21:22', '2020-01-12 09:07:58'),
(40, 1, NULL, 0, 'NG', '1', '2020-01-12 04:21:25', '2020-01-12 09:08:00'),
(41, 11, NULL, 0, 'OK', '1', '2020-01-12 04:24:23', '2020-01-12 09:08:02'),
(42, 11, NULL, 0, 'NG', '1', '2020-01-12 04:24:27', '2020-01-12 09:08:04'),
(43, 12, NULL, 0, 'OK', '1', '2020-01-12 04:24:37', '2020-01-12 09:08:33'),
(44, 12, NULL, 0, 'NG', '1', '2020-01-12 04:24:39', '2020-01-12 09:08:35'),
(45, 13, NULL, 0, 'OK', '1', '2020-01-12 04:24:48', '2020-01-12 09:08:38'),
(46, 13, NULL, 0, 'NG', '1', '2020-01-12 04:25:32', '2020-01-12 09:08:40');

-- --------------------------------------------------------

--
-- Table structure for table `targetquantity`
--

CREATE TABLE `targetquantity` (
  `TargetQuantityId` int(6) UNSIGNED NOT NULL,
  `LineId` int(6) DEFAULT NULL,
  `TargetQuantityTimes` int(6) DEFAULT NULL,
  `TargetQuantityQty` int(10) DEFAULT NULL,
  `TargetQuantityCreateDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `TargetQuantityUpdateDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `targetquantity`
--

INSERT INTO `targetquantity` (`TargetQuantityId`, `LineId`, `TargetQuantityTimes`, `TargetQuantityQty`, `TargetQuantityCreateDate`, `TargetQuantityUpdateDate`) VALUES
(1, 6, 1, 39000, '2019-12-03 04:25:55', '2019-12-13 03:21:47'),
(16, 1, 1, 3000, '2020-01-08 06:58:44', '2020-01-12 08:07:44'),
(17, 1, 2, 3000, '2020-01-08 06:59:12', '2020-01-12 08:07:59'),
(18, 1, 3, 3000, '2020-01-08 06:59:24', '2020-01-12 08:08:08'),
(19, 1, 4, 3000, '2020-01-08 06:59:46', '2020-01-12 08:08:17'),
(20, 1, 5, 3000, '2020-01-08 06:59:56', '2020-01-12 08:08:26'),
(21, 11, 1, 3000, '2020-01-08 07:02:19', '2020-01-12 08:08:35'),
(22, 11, 2, 3000, '2020-01-08 07:02:28', '2020-01-12 08:08:42'),
(23, 11, 3, 3000, '2020-01-08 07:02:34', '2020-01-12 08:08:50'),
(24, 11, 4, 3000, '2020-01-08 07:02:39', '2020-01-12 08:08:57'),
(25, 11, 5, 3000, '2020-01-08 07:02:44', '2020-01-12 08:09:05'),
(26, 12, 1, 5000, '2020-01-08 07:02:57', '2020-01-12 09:03:09'),
(27, 12, 2, 5000, '2020-01-08 07:03:03', '2020-01-12 09:03:25'),
(28, 12, 3, 5000, '2020-01-08 07:03:09', '2020-01-12 09:03:39'),
(29, 12, 4, 5000, '2020-01-08 07:03:14', '2020-01-12 09:03:57'),
(30, 12, 5, 5000, '2020-01-08 07:03:19', '2020-01-12 09:04:12'),
(31, 13, 1, 30000, '2020-01-08 07:03:48', '2020-01-12 09:04:48'),
(32, 13, 2, 30000, '2020-01-08 07:03:54', '2020-01-12 09:05:07'),
(33, 13, 3, 30000, '2020-01-08 07:03:59', '2020-01-12 09:05:23'),
(34, 13, 4, 30000, '2020-01-08 07:04:04', '2020-01-12 09:05:34'),
(35, 13, 5, 30000, '2020-01-08 07:04:10', '2020-01-12 09:06:06');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UsersId` int(6) UNSIGNED NOT NULL,
  `UsersName` varchar(30) NOT NULL,
  `UsersFullName` varchar(30) NOT NULL,
  `UsersPassword` varchar(100) NOT NULL,
  `UsersEmail` varchar(50) DEFAULT NULL,
  `UsersOption` int(2) DEFAULT NULL,
  `UsersCreateDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `UsersUpdateDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UsersId`, `UsersName`, `UsersFullName`, `UsersPassword`, `UsersEmail`, `UsersOption`, `UsersCreateDate`, `UsersUpdateDate`) VALUES
(1, 'EMVV ', 'EMVV Report', '81dc9bdb52d04dc20036dbd8313ed055', '', 1, '2019-12-02 04:58:23', '2020-01-08 06:14:32'),
(2, 'SXLR', 'SXLR', '81dc9bdb52d04dc20036dbd8313ed055', 'abc', 2, '2020-01-08 07:08:44', '2020-01-08 07:08:56');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kehoach`
--
ALTER TABLE `kehoach`
  ADD PRIMARY KEY (`KeHoachId`);

--
-- Indexes for table `lang`
--
ALTER TABLE `lang`
  ADD PRIMARY KEY (`LangId`),
  ADD UNIQUE KEY `LangName` (`LangName`);

--
-- Indexes for table `line`
--
ALTER TABLE `line`
  ADD PRIMARY KEY (`LineId`),
  ADD UNIQUE KEY `LineName` (`LineName`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`ProductsId`),
  ADD UNIQUE KEY `ProductsNumber` (`ProductsNumber`);

--
-- Indexes for table `remark`
--
ALTER TABLE `remark`
  ADD PRIMARY KEY (`RemarkId`);

--
-- Indexes for table `sanluong`
--
ALTER TABLE `sanluong`
  ADD PRIMARY KEY (`SanLuongId`);

--
-- Indexes for table `targetquantity`
--
ALTER TABLE `targetquantity`
  ADD PRIMARY KEY (`TargetQuantityId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UsersId`),
  ADD UNIQUE KEY `UsersName` (`UsersName`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kehoach`
--
ALTER TABLE `kehoach`
  MODIFY `KeHoachId` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `lang`
--
ALTER TABLE `lang`
  MODIFY `LangId` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT for table `line`
--
ALTER TABLE `line`
  MODIFY `LineId` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `ProductsId` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `remark`
--
ALTER TABLE `remark`
  MODIFY `RemarkId` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `sanluong`
--
ALTER TABLE `sanluong`
  MODIFY `SanLuongId` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `targetquantity`
--
ALTER TABLE `targetquantity`
  MODIFY `TargetQuantityId` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UsersId` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
