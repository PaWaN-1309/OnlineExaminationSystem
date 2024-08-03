-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 12, 2023 at 01:45 PM
-- Server version: 10.5.16-MariaDB
-- PHP Version: 7.3.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id20166045_onlinewebexamination`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `email` varchar(50) NOT NULL,
  `password` varchar(500) NOT NULL,
  `role` varchar(10) DEFAULT 'admin'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`email`, `password`, `role`) VALUES
('head@gmail.com', 'head', 'head');

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

CREATE TABLE `answer` (
  `qid` text NOT NULL,
  `ansid` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `answer`
--

INSERT INTO `answer` (`qid`, `ansid`) VALUES
('644fae2805bde', '644fae2806385'),
('644fae28088f9', '644fae2808da9'),
('644fae280a76f', '644fae280b1cf'),
('644fae280c21c', '644fae280c55a'),
('644fae280d63f', '644fae280d8d3'),
('644fae280ecef', '644fae280ef85'),
('644fae2810349', '644fae2810647'),
('644fae281171d', '644fae2811a48'),
('644fae2812ce3', '644fae2813050'),
('644fae281441f', '644fae281485e'),
('6452830d20d4b', '6452830d21073'),
('6452830d21a54', '6452830d21c6f'),
('6452830d22576', '6452830d268e1'),
('6452830d29cff', '6452830d29f42'),
('6452830d2a84a', '6452830d2a9d4'),
('645414f69c221', '645414f69c80b'),
('645414f69d228', '645414f69d437'),
('645414f69dda7', '645414f69df52'),
('645414f69e9c8', '645414f69ec0b'),
('645414f69f663', '645414f69f86b'),
('645414f6a00c3', '645414f6a027b'),
('645414f6a098a', '645414f6a0b3f'),
('645414f6a1310', '645414f6a146b'),
('645414f6a1c5d', '645414f6a1e33'),
('645414f6a25ff', '645414f6a2785'),
('645414f6a3032', '645414f6a31be'),
('645414f6a3a24', '645414f6a3bd8'),
('64541b4ea798b', '64541b4ea7e0b'),
('64541b4ea8839', '64541b4ea8a47'),
('64541b4ea940d', '64541b4ea95fe'),
('64541b4eaa02f', '64541b4eaa28a'),
('64541b4eaad02', '64541b4eaaec5'),
('64541b4eab7ee', '64541b4eaba54'),
('64541b4eac19c', '64541b4eac2ea'),
('64541b4eaca58', '64541b4eacbd7'),
('64541b4ead1c9', '64541b4ead30b'),
('64541b4ead94e', '64541b4eada86');

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `id` int(11) NOT NULL,
  `from_user` text COLLATE utf8_unicode_ci NOT NULL,
  `sent_at` text COLLATE utf8_unicode_ci NOT NULL,
  `text_message` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`id`, `from_user`, `sent_at`, `text_message`) VALUES
(1, 'Admin', '2023-05-12 02:07:32 pm', 'Hello'),
(2, 'Atharv Bhosale', '2023-05-12 02:38:13 pm', 'Hello');

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `email` varchar(50) NOT NULL,
  `eid` text NOT NULL,
  `score` int(11) NOT NULL,
  `level` int(11) NOT NULL,
  `right` int(11) NOT NULL,
  `wrong` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`email`, `eid`, `score`, `level`, `right`, `wrong`, `date`) VALUES
('co638', '645410d53cbc5', 12, 12, 4, 8, '2023-05-05 03:40:05'),
('co638', '645282d593cbb', 0, 5, 0, 5, '2023-05-05 03:40:33'),
('co638', '644fabc93dbe2', 12, 10, 6, 5, '2023-05-05 03:41:08'),
('co643', '645410d53cbc5', 9, 12, 3, 9, '2023-05-05 03:45:40'),
('co643', '645282d593cbb', 3, 5, 1, 4, '2023-05-05 03:45:55'),
('co643', '644fabc93dbe2', 6, 10, 3, 7, '2023-05-05 03:46:38'),
('co644', '645410d53cbc5', 12, 12, 4, 8, '2023-05-05 03:47:42'),
('co644', '645282d593cbb', 12, 5, 4, 1, '2023-05-05 03:48:07'),
('co644', '645282d593cbb', 12, 5, 4, 1, '2023-05-05 03:48:07'),
('co644', '644fabc93dbe2', 6, 10, 3, 7, '2023-05-05 03:48:34'),
('co633', '645410d53cbc5', 15, 12, 5, 7, '2023-05-05 03:49:37'),
('co645', '645410d53cbc5', 9, 12, 3, 9, '2023-05-05 03:49:42'),
('co645', '645282d593cbb', 0, 5, 0, 5, '2023-05-05 03:49:58'),
('co633', '645282d593cbb', 0, 5, 0, 5, '2023-05-05 03:50:08'),
('co645', '644fabc93dbe2', 0, 10, 0, 13, '2023-05-05 03:50:22'),
('co633', '644fabc93dbe2', 8, 10, 4, 6, '2023-05-05 03:50:40'),
('co646', '645410d53cbc5', 9, 12, 3, 9, '2023-05-05 03:51:50'),
('co646', '645282d593cbb', 12, 5, 4, 1, '2023-05-05 03:52:04'),
('co646', '644fabc93dbe2', 2, 10, 1, 9, '2023-05-05 03:52:26'),
('co646', '644fabc93dbe2', 2, 10, 1, 9, '2023-05-05 03:52:26'),
('co646', '644fabc93dbe2', 2, 10, 1, 9, '2023-05-05 03:52:26'),
('co646', '644fabc93dbe2', 2, 10, 1, 9, '2023-05-05 03:52:26'),
('co647', '645410d53cbc5', 9, 12, 3, 9, '2023-05-05 03:53:34'),
('co647', '645282d593cbb', 12, 5, 4, 1, '2023-05-05 03:53:48'),
('co647', '644fabc93dbe2', 4, 10, 2, 8, '2023-05-05 03:54:17'),
('co648', '645410d53cbc5', 15, 12, 5, 7, '2023-05-05 03:55:14'),
('co648', '645282d593cbb', 12, 5, 4, 1, '2023-05-05 03:55:27'),
('co648', '644fabc93dbe2', 2, 10, 1, 9, '2023-05-05 03:55:50'),
('smoke', '645410d53cbc5', 24, 12, 8, 4, '2023-05-05 05:12:42'),
('smoke', '645282d593cbb', 15, 5, 5, 0, '2023-05-05 05:16:24'),
('smoke', '644fabc93dbe2', 16, 10, 8, 2, '2023-05-05 05:17:40'),
('co627', '645410d53cbc5', 15, 12, 5, 7, '2023-05-05 05:23:49'),
('co627', '645282d593cbb', 0, 5, 0, 5, '2023-05-05 05:24:04'),
('co627', '644fabc93dbe2', 2, 10, 1, 10, '2023-05-05 05:24:30'),
('co629', '645410d53cbc5', 15, 12, 5, 7, '2023-05-05 05:25:23'),
('co629', '645282d593cbb', 3, 5, 1, 5, '2023-05-05 05:25:39'),
('co629', '644fabc93dbe2', 8, 10, 4, 6, '2023-05-05 05:26:04'),
('co630', '645410d53cbc5', 12, 12, 4, 8, '2023-05-05 05:27:06'),
('co630', '645282d593cbb', 0, 5, 0, 5, '2023-05-05 05:27:18'),
('co630', '644fabc93dbe2', 4, 10, 2, 8, '2023-05-05 05:27:42'),
('co631', '645410d53cbc5', 15, 12, 5, 7, '2023-05-05 05:28:48'),
('co631', '645282d593cbb', 3, 5, 1, 4, '2023-05-05 05:29:03'),
('co631', '644fabc93dbe2', 4, 10, 2, 8, '2023-05-05 05:29:26'),
('co632', '645410d53cbc5', 12, 12, 4, 8, '2023-05-05 05:30:56'),
('co632', '645282d593cbb', 3, 5, 1, 4, '2023-05-05 05:31:11'),
('co632', '644fabc93dbe2', 4, 10, 2, 8, '2023-05-05 05:31:36'),
('co636', '645410d53cbc5', 6, 12, 2, 10, '2023-05-05 05:34:07'),
('co636', '645282d593cbb', 6, 5, 2, 3, '2023-05-05 05:34:22'),
('co636', '644fabc93dbe2', 2, 10, 1, 9, '2023-05-05 05:34:43'),
('co656', '645410d53cbc5', 24, 12, 8, 4, '2023-05-05 13:20:29'),
('co603', '645282d593cbb', 0, 5, 0, 6, '2023-05-05 17:09:38'),
('co620', '645410d53cbc5', 0, 12, 0, 12, '2023-05-05 17:30:54'),
('co620', '645282d593cbb', 3, 5, 1, 4, '2023-05-05 17:33:01'),
('co620', '644fabc93dbe2', 0, 10, 0, 10, '2023-05-05 17:34:07'),
('co603', '645410d53cbc5', 12, 12, 4, 8, '2023-05-06 07:28:29'),
('co603', '645601200b270', 4, 2, 2, 0, '2023-05-12 12:40:52');

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE `options` (
  `qid` varchar(50) NOT NULL,
  `option` varchar(5000) NOT NULL,
  `optionid` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `options`
--

INSERT INTO `options` (`qid`, `option`, `optionid`) VALUES
('644fae2805bde', 'Compiled language', '644fae280637e'),
('644fae2805bde', 'Interpreted language', '644fae2806385'),
('644fae2805bde', 'Hybrid language', '644fae2806386'),
('644fae2805bde', 'Machine learning', '644fae2806387'),
('644fae28088f9', 'Python 2.7', '644fae2808da0'),
('644fae28088f9', 'Python 3.6', '644fae2808da7'),
('644fae28088f9', 'Python 3.8', '644fae2808da8'),
('644fae28088f9', 'Python 3.10', '644fae2808da9'),
('644fae280a76f', 'print(\"Hello, World!\")', '644fae280b1cf'),
('644fae280a76f', 'console.log(\"Hello, World!\")', '644fae280b1d1'),
('644fae280a76f', 'echo(\"Hello, World!\")', '644fae280b1d2'),
('644fae280a76f', 'System.out.println(\"Hello, World!\");', '644fae280b1d3'),
('644fae280c21c', 'There is no difference', '644fae280c558'),
('644fae280c21c', 'Single quotes are used for strings with double quotes and vice versa', '644fae280c559'),
('644fae280c21c', 'Double quotes are used for strings with single quotes and vice versa', '644fae280c55a'),
('644fae280c21c', 'Single quotes are used for strings and double quotes are used for numbers', '644fae280c55b'),
('644fae280d63f', 'A reserved keyword', '644fae280d8d1'),
('644fae280d63f', ' A named container for a value', '644fae280d8d3'),
('644fae280d63f', 'A function that returns a value', '644fae280d8d4'),
('644fae280d63f', 'An expression that performs a calculation', '644fae280d8d5'),
('644fae280ecef', 'variable = value', '644fae280ef85'),
('644fae280ecef', 'value = variable', '644fae280ef87'),
('644fae280ecef', 'variable + value', '644fae280ef88'),
('644fae280ecef', ' value + variable', '644fae280ef89'),
('644fae2810349', 'An error message', '644fae2810644'),
('644fae2810349', ' A way to execute code', '644fae2810646'),
('644fae2810349', ' A note to explain code', '644fae2810647'),
('644fae2810349', 'A function that does not return a value', '644fae2810648'),
('644fae281171d', '#', '644fae2811a48'),
('644fae281171d', '//', '644fae2811a4a'),
('644fae281171d', '--', '644fae2811a4b'),
('644fae281171d', '/* */', '644fae2811a4c'),
('644fae2812ce3', '14', '644fae281304d'),
('644fae2812ce3', '11', '644fae2813050'),
('644fae2812ce3', '10', '644fae2813051'),
('644fae2812ce3', '21', '644fae2813052'),
('644fae281441f', ' \"apple pie\"', '644fae281485c'),
('644fae281441f', ' \"applepie\"', '644fae281485e'),
('644fae281441f', ' \"pieapple\"', '644fae281485f'),
('644fae281441f', '\"apppie\"', '644fae2814860'),
('6452830d20d4b', '1', '6452830d21073'),
('6452830d20d4b', '1', '6452830d21074'),
('6452830d20d4b', '1', '6452830d21075'),
('6452830d20d4b', '1', '6452830d21076'),
('6452830d21a54', 'k', '6452830d21c6f'),
('6452830d21a54', 'k', '6452830d21c70'),
('6452830d21a54', 'k', '6452830d21c71'),
('6452830d21a54', 'k', '6452830d21c72'),
('6452830d22576', 's', '6452830d268e1'),
('6452830d22576', 'a', '6452830d268e6'),
('6452830d22576', 's', '6452830d268e7'),
('6452830d22576', 'e', '6452830d268e8'),
('6452830d29cff', 'fsdf', '6452830d29f40'),
('6452830d29cff', 'dfs', '6452830d29f42'),
('6452830d29cff', 'sdfsd', '6452830d29f43'),
('6452830d29cff', 'fsdfs', '6452830d29f44'),
('6452830d2a84a', 'dsgdsf', '6452830d2a9d4'),
('6452830d2a84a', 'fsdsg', '6452830d2a9d6'),
('6452830d2a84a', 'dfsfsf', '6452830d2a9d7'),
('6452830d2a84a', 'dsgsftsr', '6452830d2a9d8'),
('645414f69c221', 'A software application designed to run on a desktop computer', '645414f69c80a'),
('645414f69c221', 'A software application designed to run on a mobile device', '645414f69c80b'),
('645414f69c221', 'A software application designed to run on a server', '645414f69c80c'),
('645414f69c221', 'A software application designed to run on a web browser', '645414f69c80d'),
('645414f69d228', 'iOS', '645414f69d434'),
('645414f69d228', 'Android', '645414f69d435'),
('645414f69d228', 'windows', '645414f69d436'),
('645414f69d228', 'linux', '645414f69d437'),
('645414f69dda7', 'Java', '645414f69df4f'),
('645414f69dda7', 'Swift', '645414f69df50'),
('645414f69dda7', 'Kotlin', '645414f69df51'),
('645414f69dda7', 'All of the Above', '645414f69df52'),
('645414f69e9c8', 'To provide developers with tools and resources for building mobile applications', '645414f69ec0b'),
('645414f69e9c8', 'To allow users to access mobile applications', '645414f69ec0d'),
('645414f69e9c8', 'To provide a platform for mobile advertisements', '645414f69ec0e'),
('645414f69e9c8', ' To optimize the performance of mobile applications', '645414f69ec0f'),
('645414f69f663', 'A user interface for a mobile application', '645414f69f869'),
('645414f69f663', 'A set of tools and protocols for building mobile applications', '645414f69f86a'),
('645414f69f663', 'A program that allows different software applications to communicate with each other', '645414f69f86b'),
('645414f69f663', ' A mobile-specific programming language', '645414f69f86c'),
('645414f6a00c3', 'Native applications are developed using web technologies while hybrid applications are developed using native technologies.', '645414f6a027a'),
('645414f6a00c3', ' Native applications are developed specifically for one platform, while hybrid applications are developed to work on multiple platforms.', '645414f6a027b'),
('645414f6a00c3', 'Native applications are developed using hybrid technologies while hybrid applications are developed using native technologies.', '645414f6a027c'),
('645414f6a00c3', 'There is no difference between native and hybrid mobile applications.', '645414f6a027d'),
('645414f6a098a', 'To provide a platform for users to download and install mobile applications', '645414f6a0b3f'),
('645414f6a098a', ' To provide a platform for developers to sell their mobile applications', '645414f6a0b40'),
('645414f6a098a', 'To provide a platform for mobile advertising', '645414f6a0b41'),
('645414f6a098a', 'All of the above', '645414f6a0b42'),
('645414f6a1310', 'The physical buttons and touch screen used to interact with a mobile device', '645414f6a146a'),
('645414f6a1310', 'The way that information is presented and organized within a mobile application', '645414f6a146b'),
('645414f6a1310', 'The way that a mobile application interacts with a server or database', '645414f6a146c'),
('645414f6a1310', ' The programming code that controls the behavior of a mobile application', '645414f6a146d'),
('645414f6a1c5d', 'The process of breaking a mobile device into smaller components for testing purposes', '645414f6a1e32'),
('645414f6a1c5d', 'The variety of different hardware and software configurations that mobile devices can have', '645414f6a1e33'),
('645414f6a1c5d', 'The process of optimizing a mobile application for a specific mobile device', '645414f6a1e34'),
('645414f6a1c5d', 'The process of making a mobile application available in multiple languages', '645414f6a1e35'),
('645414f6a25ff', 'The process of designing and building a mobile application', '645414f6a2783'),
('645414f6a25ff', 'The process of optimizing a mobile application for a specific mobile device', '645414f6a2784'),
('645414f6a25ff', 'The process of identifying and fixing bugs and other issues in a mobile application', '645414f6a2785'),
('645414f6a25ff', ' The process of making a mobile application available in multiple languages', '645414f6a2786'),
('645414f6a3032', 'A mobile website is designed to be accessed through a mobile browser, while a mobile application is installed on a mobile device.', '645414f6a31be'),
('645414f6a3032', 'A mobile website is a simpler version of a full website, while a mobile application provides more advanced features and functionality.', '645414f6a31bf'),
('645414f6a3032', 'A mobile website can be accessed on any mobile device with a browser, while a mobile application is designed specifically for one or more mobile platforms.', '645414f6a31c0'),
('645414f6a3032', 'All of the above.', '645414f6a31c1'),
('645414f6a3a24', 'To track the number of times a mobile application has been downloaded.', '645414f6a3bd5'),
('645414f6a3a24', ' To monitor the performance of a mobile application.', '645414f6a3bd7'),
('645414f6a3a24', 'To gather data on user behavior within a mobile application.', '645414f6a3bd8'),
('645414f6a3a24', 'All of the above.', '645414f6a3bd9'),
('64541b4ea798b', 'A computer-aided design software used for civil engineering.', '64541b4ea7e09'),
('64541b4ea798b', 'A digital representation of physical and functional characteristics of a building.', '64541b4ea7e0b'),
('64541b4ea798b', 'A technique to reduce environmental impact of construction projects.', '64541b4ea7e0c'),
('64541b4ea798b', 'A method to improve the efficiency of civil engineering project management.', '64541b4ea7e0d'),
('64541b4ea8839', 'To improve site inspections and surveying.', '64541b4ea8a43'),
('64541b4ea8839', 'To enhance worker safety and reduce construction accidents.', '64541b4ea8a45'),
('64541b4ea8839', ' To automate construction site monitoring.', '64541b4ea8a46'),
('64541b4ea8839', 'All of the above.', '64541b4ea8a47'),
('64541b4ea940d', 'A city that uses advanced technology to improve the quality of life of its citizens.', '64541b4ea95fb'),
('64541b4ea940d', 'A city that is environmentally sustainable and energy-efficient.', '64541b4ea95fc'),
('64541b4ea940d', ' A city that has well-developed public transportation and mobility infrastructure.', '64541b4ea95fd'),
('64541b4ea940d', 'All of the above', '64541b4ea95fe'),
('64541b4eaa02f', 'A method to print large-scale structures such as buildings and bridges.', '64541b4eaa287'),
('64541b4eaa02f', 'A technology to print 3D models of construction projects for visualization and planning.', '64541b4eaa288'),
('64541b4eaa02f', ' A process to print small-scale building components for faster and more efficient construction.', '64541b4eaa289'),
('64541b4eaa02f', 'All of the above.', '64541b4eaa28a'),
('64541b4eaad02', 'To improve the durability and strength of construction materials.', '64541b4eaaec4'),
('64541b4eaad02', ' To improve the drainage and filtration of soil and other materials.', '64541b4eaaec5'),
('64541b4eaad02', 'To reduce the environmental impact of construction projects.', '64541b4eaaec6'),
('64541b4eaad02', 'To provide insulation and protect against extreme weather conditions.', '64541b4eaaec7'),
('64541b4eab7ee', 'To visualize and simulate construction projects in a virtual environment.', '64541b4eaba50'),
('64541b4eab7ee', 'To improve communication and collaboration between project stakeholders.', '64541b4eaba52'),
('64541b4eab7ee', 'To train workers on complex construction techniques and procedures.', '64541b4eaba53'),
('64541b4eab7ee', 'All of the above.', '64541b4eaba54'),
('64541b4eac19c', 'A construction method that uses materials and resources that have minimal impact on the environment.', '64541b4eac2e7'),
('64541b4eac19c', 'A construction method that is energy-efficient and reduces waste and pollution.', '64541b4eac2e8'),
('64541b4eac19c', 'A construction method that promotes social responsibility and equity.', '64541b4eac2e9'),
('64541b4eac19c', 'All of the above.', '64541b4eac2ea'),
('64541b4eaca58', 'To reduce construction time and costs by assembling building components off-site.', '64541b4eacbd4'),
('64541b4eaca58', 'To improve the quality and durability of building components.', '64541b4eacbd5'),
('64541b4eaca58', 'To reduce waste and improve sustainability in construction.', '64541b4eacbd6'),
('64541b4eaca58', 'All of the above.', '64541b4eacbd7'),
('64541b4ead1c9', 'Infrastructure that is able to withstand and recover from natural and man-made disasters.', '64541b4ead30b'),
('64541b4ead1c9', ' Infrastructure that is designed to minimize environmental impact.', '64541b4ead30c'),
('64541b4ead1c9', ' Infrastructure that is designed for maximum efficiency and productivity.', '64541b4ead30d'),
('64541b4ead1c9', ' All of the above.', '64541b4ead30e'),
('64541b4ead94e', 'To improve project planning and management by analyzing large amounts of data.', '64541b4eada83'),
('64541b4ead94e', 'To optimize the design and construction process by analyzing data on materials, equipment, and labor.', '64541b4eada84'),
('64541b4ead94e', 'To improve the efficiency and safety of construction sites by monitoring and analyzing data in real-time.', '64541b4eada85'),
('64541b4ead94e', 'All of the above.', '64541b4eada86');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `eid` text NOT NULL,
  `qid` text NOT NULL,
  `qns` text NOT NULL,
  `choice` int(10) NOT NULL,
  `sn` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`eid`, `qid`, `qns`, `choice`, `sn`) VALUES
('644fabc93dbe2', '644fae2805bde', 'What type of language is Python?', 4, 1),
('644fabc93dbe2', '644fae28088f9', 'What is the latest version of Python?', 4, 2),
('644fabc93dbe2', '644fae280a76f', 'What is the command to print \"Hello, World!\" in Python?', 4, 3),
('644fabc93dbe2', '644fae280c21c', 'What is the difference between single and double quotes in Python?', 4, 4),
('644fabc93dbe2', '644fae280d63f', 'What is a variable in Python?', 4, 5),
('644fabc93dbe2', '644fae280ecef', 'How do you assign a value to a variable in Python?', 4, 6),
('644fabc93dbe2', '644fae2810349', 'What is a comment in Python?', 4, 7),
('644fabc93dbe2', '644fae281171d', 'What is the syntax for a single-line comment in Python?', 4, 8),
('644fabc93dbe2', '644fae2812ce3', 'What is the output of the following code: print(3 + 4 * 2)?', 4, 9),
('644fabc93dbe2', '644fae281441f', 'What is the output of the following code: print(\"apple\" + \"pie\")?', 4, 10),
('645282d593cbb', '6452830d20d4b', 'abc', 4, 1),
('645282d593cbb', '6452830d21a54', 'khj', 4, 2),
('645282d593cbb', '6452830d22576', 'cde', 4, 3),
('645282d593cbb', '6452830d29cff', 'asfsdfds', 4, 4),
('645282d593cbb', '6452830d2a84a', 'dsfsdfs', 4, 5),
('645410d53cbc5', '645414f69c221', 'What is a mobile application?', 4, 1),
('645410d53cbc5', '645414f69d228', 'Which of the following is NOT a mobile operating system?', 4, 2),
('645410d53cbc5', '645414f69dda7', 'What programming languages are commonly used for developing mobile applications?', 4, 3),
('645410d53cbc5', '645414f69e9c8', 'What is the purpose of a mobile SDK (Software Development Kit)?', 4, 4),
('645410d53cbc5', '645414f69f663', 'What is a mobile API (Application Programming Interface)?', 4, 5),
('645410d53cbc5', '645414f6a00c3', 'What is the difference between native and hybrid mobile applications?', 4, 6),
('645410d53cbc5', '645414f6a098a', 'What is the purpose of a mobile app store?', 4, 7),
('645410d53cbc5', '645414f6a1310', 'What is a mobile user interface?', 4, 8),
('645410d53cbc5', '645414f6a1c5d', 'What is mobile device fragmentation?', 4, 9),
('645410d53cbc5', '645414f6a25ff', 'What is mobile application testing?', 4, 10),
('645410d53cbc5', '645414f6a3032', 'What is the difference between a mobile website and a mobile application?', 4, 11),
('645410d53cbc5', '645414f6a3a24', 'What is the purpose of mobile app analytics?', 4, 12),
('645419c253537', '64541b4ea798b', 'What is Building Information Modeling (BIM)?', 4, 1),
('645419c253537', '64541b4ea8839', 'What is the purpose of drone technology in civil engineering?', 4, 2),
('645419c253537', '64541b4ea940d', 'What is the concept of \"smart cities\" in civil engineering?', 4, 3),
('645419c253537', '64541b4eaa02f', 'What is 3D printing in civil engineering?', 4, 4),
('645419c253537', '64541b4eaad02', 'What is the purpose of geosynthetics in civil engineering?', 4, 5),
('645419c253537', '64541b4eab7ee', 'What is the purpose of virtual and augmented reality in civil engineering?', 4, 6),
('645419c253537', '64541b4eac19c', 'What is the concept of sustainable construction in civil engineering?', 4, 7),
('645419c253537', '64541b4eaca58', 'What is the purpose of prefabrication in civil engineering?', 4, 8),
('645419c253537', '64541b4ead1c9', 'What is the concept of resilient infrastructure in civil engineering?', 4, 9),
('645419c253537', '64541b4ead94e', 'What is the purpose of big data in civil engineering?', 4, 10);

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

CREATE TABLE `quiz` (
  `eid` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `right` int(11) NOT NULL,
  `wrong` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `test_time` bigint(20) NOT NULL,
  `intro` text NOT NULL,
  `sub_sf` varchar(100) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `teacher_username` varchar(50) DEFAULT NULL,
  `dept_sf` varchar(10) DEFAULT NULL,
  `semester` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `quiz`
--

INSERT INTO `quiz` (`eid`, `title`, `right`, `wrong`, `total`, `test_time`, `intro`, `sub_sf`, `date`, `teacher_username`, `dept_sf`, `semester`) VALUES
('644fabc93dbe2', 'Basics_pwp', 2, 0, 10, 1, 'Covered Questions on Basics of Python.', 'PWP', '2023-05-04 19:23:09', 'pwplog123', 'CO', 6),
('645282d593cbb', 'Chapter_1_PWP', 3, 0, 5, 1, 'abc', 'PWP', '2023-05-04 19:57:41', 'pwplog123', 'CO', 6),
('645410d53cbc5', 'Mad_chapter1', 3, 0, 12, 1, 'Covers Basic concept of MAD .\r\nRead Chapter 1 notes shared in classroom the other day .', 'MAD', '2023-05-04 20:08:53', 'madlog123', 'CO', 6),
('645419c253537', 'Basics_etc', 3, 0, 10, 1, 'Basics of Emerging trends in Civil Engineering', 'ETC', '2023-05-04 20:46:58', 'etclog123', 'CE', 6),
('645601200b270', 'Sample', 2, 0, 2, 1, '.', 'PWP', '2023-05-06 07:26:24', 'pwplog123', 'CO', 6);

-- --------------------------------------------------------

--
-- Table structure for table `rank`
--

CREATE TABLE `rank` (
  `email` varchar(50) NOT NULL,
  `score` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rank`
--

INSERT INTO `rank` (`email`, `score`, `time`) VALUES
('co638', 24, '2023-05-05 03:41:08'),
('co643', 18, '2023-05-05 03:46:38'),
('co644', 30, '2023-05-05 03:48:34'),
('co633', 23, '2023-05-05 03:50:40'),
('co645', 9, '2023-05-05 03:50:22'),
('co646', 23, '2023-05-05 03:52:26'),
('co647', 25, '2023-05-05 03:54:17'),
('co648', 29, '2023-05-05 03:55:50'),
('smoke', 55, '2023-05-05 05:17:40'),
('co627', 17, '2023-05-05 05:24:30'),
('co629', 26, '2023-05-05 05:26:04'),
('co630', 16, '2023-05-05 05:27:42'),
('co631', 22, '2023-05-05 05:29:26'),
('co632', 19, '2023-05-05 05:31:36'),
('co636', 14, '2023-05-05 05:34:43'),
('co656', 24, '2023-05-05 13:20:29'),
('co603', 16, '2023-05-12 12:40:52'),
('co620', 3, '2023-05-05 17:34:07');

-- --------------------------------------------------------

--
-- Table structure for table `student_info`
--

CREATE TABLE `student_info` (
  `dept_sf` varchar(10) DEFAULT NULL,
  `semester` int(11) DEFAULT NULL,
  `stud_roll` varchar(50) DEFAULT NULL,
  `stud_name` varchar(50) DEFAULT NULL,
  `stud_username` varchar(50) NOT NULL,
  `stud_password` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_info`
--

INSERT INTO `student_info` (`dept_sf`, `semester`, `stud_roll`, `stud_name`, `stud_username`, `stud_password`) VALUES
('CE', 6, '3366', 'ADSUL ROHAN MADHUKAR', 'ce672', 'passce672'),
('CO', 4, '4301', 'Raj R. Sharma', 'co401', 'co401'),
('CO', 4, '4302', 'Arnav D. Patil', 'co402', 'co402'),
('CO', 4, '4303', 'Sameer A. Mulla', 'co403', 'co403'),
('CO', 4, '4304', 'Yash N. More', 'co404', 'co404'),
('CO', 4, '4305', 'Rahon P. Kamble', 'co405', 'co405'),
('CO', 6, '3301', 'Pawan D. Malgavi', 'co601', 'passco01'),
('CO', 6, '3302', 'Siddarth R. Suryawanshi', 'co602', 'passco02'),
('CO', 6, '3303', 'Jyoti S. Patil', 'co603', 'passco03'),
('CO', 6, '3304', 'Sachin D. Shinde', 'co604', 'passco04'),
('CO', 6, '3305', 'Om N. Ghode', 'co605', 'passco05'),
('CO', 6, '3306', 'Soham S. Kalolikar ', 'co606', 'passco06'),
('CO', 6, '3307', 'Atharv J. Joundal', 'co607', 'passco07'),
('CO', 6, '3308', 'Omkar R. Ravindra', 'co608', 'passco08'),
('CO', 6, '3309', 'Swapnit A. Sutar', 'co609', 'passco09'),
('CO', 6, '3310', 'Amit B. Katre', 'co610', 'passco10'),
('CO', 6, '3315', 'HUKKERI SADAF ABDULRAZAK', 'co615', 'passco615'),
('CO', 6, '3316', 'PATIL GARGI CHETAN', 'co616', 'passco616'),
('CO', 6, '3317', 'PATIL SAYALI SHIVAJI', 'co617', 'passco617'),
('CO', 6, '3318', 'BHOSALE SRUSHTI SANJAY', 'co618', 'passco618'),
('CO', 6, '3319', 'DESAI SHRUTI UTTAM', 'co620', 'passco620'),
('CO', 6, '3320', 'JOUNDAL ATHARV JANIK', 'co623', 'passco623'),
('CO', 6, '3321', 'KHANDAGALE SHRUTI VISHWAS', 'co624', 'passco624'),
('CO', 6, '3323', 'JOSHI CHAITANYA ANIL', 'co625', 'passco625'),
('CO', 6, '3324', 'KALOLIKAR SOHAM MAKARAND', 'co626', 'passco626'),
('CO', 6, '3325', 'PATIL KSHITIJ KRISHNAT', 'co627', 'passco627'),
('CO', 6, '3327', 'KARANDE DEVRAJ ASHOK', 'co629', 'passco629'),
('CO', 6, '3328', 'DESHPANDE RUDRA RAMESH', 'co630', 'passco630'),
('CO', 6, '3329', 'HEGADE PRITI MAHENDRA', 'co631', 'passco631'),
('CO', 6, '3330', 'PATIL PRANALI SHARAD', 'co632', 'passco632'),
('CO', 6, '3331', 'KAMBLE SMITA ASHOK', 'co633', 'passco633'),
('CO', 6, '3332', 'AUNDHKAR ANUSHKA SHAILENDR', 'co634', 'passco634'),
('CO', 6, '3333', 'PATIL. MANASI RAVASAHEB', 'co635', 'passco635'),
('CO', 6, '3334', 'SHAIKH SAMINA BASHIR', 'co636', 'passco636'),
('CO', 6, '3335', 'CHOUGULE BHAKTI PRAVIN', 'co637', 'passco637'),
('CO', 6, '3336', 'KOLE VEDANTI ANANDA', 'co638', 'passco638'),
('CO', 6, '3337', 'SHAIKH SARTAJ NASIR', 'co643', 'passco643'),
('CO', 6, '3338', 'PATIL VIRAJ DATTATRAYA', 'co644', 'passco644'),
('CO', 6, '3339', 'VISHWAKARMA ANISH AJAY', 'co645', 'passco645'),
('CO', 6, '3340', 'NIKAM RUSHIKESH CHANDRAKAN', 'co646', 'passco646'),
('CO', 6, '3342', 'SHIRGAVE SAMRUDDHI SANDIP', 'co647', 'passco647'),
('CO', 6, '3343', 'KHADE CHAITRALI MARUTI', 'co648', 'passco648'),
('CO', 6, '3344', 'NARKE SIDDHI SADAR', 'co649', 'passco649'),
('CO', 6, '3345', 'SAVANT SANIKA SARJERAO', 'co650', 'passco650'),
('CO', 6, '3346', 'PATIL HARSHVARDHAN SARJERV', 'co651', 'passco651'),
('CO', 6, '3347', 'TORASKAR ATHARV SUNIL', 'co652', 'passco652'),
('CO', 6, '3348', 'PATIL SHANTANU PRAVIN', 'co653', 'passco653'),
('CO', 6, '3349', 'SHRESHTHI ANEESH PRATISH', 'co654', 'passco654'),
('CO', 6, '3350', 'KAMBLE YASH BHAGAVAN', 'co656', 'passco656'),
('CO', 6, '3351', 'PATIL OMKAR RAVINDRA', 'co657', 'passco657'),
('CO', 6, '3352', 'KATRE AMIT BANDU', 'co658', 'passco658'),
('CO', 6, '3353', 'PATIL ADITYA MANOJ', 'co659', 'passco659'),
('CO', 6, '3354', 'JADHAV ANIRUDHA DHANANJAY', 'co660', 'passco660'),
('CO', 6, '3355', 'BHATKANDE SAHIL PRASAD', 'co661', 'passco661'),
('CO', 6, '3356', 'GADKARI SAAD SALIM', 'co662', 'passco662'),
('CO', 6, '3357', 'KAMALAKAR RUTIKA GURUPRASA', 'co663', 'passco663'),
('CO', 6, '3358', 'DESHMUKH DARSHANA AJIT', 'co664', 'passco664'),
('CO', 6, '3359', 'BHINGARDEVE SAHIL VINAYAK', 'co665', 'passco665'),
('CO', 6, '3360', 'VICHARE KOUSHAL VIJAY', 'co666', 'passco666'),
('CO', 6, '3361', 'POWAR ADITYA BALU', 'co667', 'passco667'),
('CO', 6, '3362', 'PATIL PRUTHVIRAJ EKANATH', 'co668', 'passco668'),
('CO', 6, '3363', 'BANNE ANKUSH DATTATRAY', 'co669', 'passco669'),
('CO', 6, '3364', 'RAVINDRA SHETTY SHREYASH', 'co670', 'passco670'),
('CO', 6, '3365', 'KAMBLE ABHAY AMAR', 'co671', 'passco671'),
('CE', 6, '3367', 'MULIK ADIRAJ AJIT', 'co673', 'passco673'),
('CE', 5, '3368', 'RELEKAR SANJANA SANJAY', 'co674', 'passco674'),
('CE', 6, '3369', 'RAJPUT VAISHNAVI RANJEET', 'co675', 'passco675'),
('CO', 6, '3326', 'Atharv Bhosale', 'smoke', 'smoke');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_info`
--

CREATE TABLE `teacher_info` (
  `teacher_name` varchar(200) DEFAULT NULL,
  `teacher_username` varchar(200) NOT NULL,
  `teacher_password` varchar(200) DEFAULT NULL,
  `sub_sf` varchar(10) DEFAULT NULL,
  `dept_sf` varchar(10) DEFAULT NULL,
  `semester` int(10) DEFAULT NULL,
  `role` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teacher_info`
--

INSERT INTO `teacher_info` (`teacher_name`, `teacher_username`, `teacher_password`, `sub_sf`, `dept_sf`, `semester`, `role`) VALUES
('', '', '', '', 'CO', 1, 'admin'),
('Sagar S. Patil', 'acnlog123', 'acnlog1213', 'ACN', 'CO', 5, 'admin'),
('Naveen R. Chaudhary', 'ajplog123', 'ajplog1213', 'AJP', 'CO', 5, 'admin'),
('Aman A. Bagwan', 'etclog123', 'etclog1213', 'ETC', 'CE', 6, 'admin'),
('Arpita A. Kadam', 'madlog123', 'madlog1213', 'MAD', 'CO', 6, 'admin'),
('Sahil S. Joshi', 'mgtlog123', 'mgtlog1213', 'MGT', 'CE', 5, 'admin'),
('Rahul R. Patil', 'pwplog123', 'pwplog1213', 'PWP', 'CO', 6, 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quiz`
--
ALTER TABLE `quiz`
  ADD PRIMARY KEY (`eid`),
  ADD KEY `dept_sf` (`dept_sf`),
  ADD KEY `teacher_username` (`teacher_username`);

--
-- Indexes for table `student_info`
--
ALTER TABLE `student_info`
  ADD PRIMARY KEY (`stud_username`),
  ADD UNIQUE KEY `stud_roll` (`stud_roll`);

--
-- Indexes for table `teacher_info`
--
ALTER TABLE `teacher_info`
  ADD PRIMARY KEY (`teacher_username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
