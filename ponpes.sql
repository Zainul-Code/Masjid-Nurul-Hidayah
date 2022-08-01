-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 21, 2022 at 09:44 PM
-- Server version: 5.7.38-log
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ponpes`
--

-- --------------------------------------------------------

--
-- Table structure for table `cms_aboutus`
--

CREATE TABLE `cms_aboutus` (
  `id` int(11) NOT NULL,
  `about` varchar(2000) DEFAULT NULL,
  `vision` varchar(1000) DEFAULT NULL,
  `mission` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cms_aboutus`
--

INSERT INTO `cms_aboutus` (`id`, `about`, `vision`, `mission`) VALUES
(1, 'sadadf', '1.saassasasas\r\n1. sasasasasas', 'sdfdsfdsfsdf');

-- --------------------------------------------------------

--
-- Table structure for table `cms_admin`
--

CREATE TABLE `cms_admin` (
  `id` int(11) NOT NULL,
  `date_time` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `added_by` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cms_admin`
--

INSERT INTO `cms_admin` (`id`, `date_time`, `username`, `password`, `added_by`) VALUES
(10, '2022-06-11 01:03:46 ', 'muhammadirfani340@gmail.com', 'mirfani340', 'admin'),
(11, '2022-07-21 10:54:05 ', 'admin', 'admin340', 'muhammadirfani340@gmail.com'),
(12, '2022-07-21 11:43:48 ', 'dimyatimaulana@gmail.com', 'alanalan10', 'muhammadirfani340@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `cms_category`
--

CREATE TABLE `cms_category` (
  `cat_id` int(11) NOT NULL,
  `cat_datetime` date NOT NULL,
  `cat_name` varchar(50) NOT NULL,
  `cat_creator` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cms_category`
--

INSERT INTO `cms_category` (`cat_id`, `cat_datetime`, `cat_name`, `cat_creator`) VALUES
(28, '2022-06-12', 'Akhirhusannah', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `cms_post`
--

CREATE TABLE `cms_post` (
  `post_id` int(11) NOT NULL,
  `post_date_time` date NOT NULL,
  `title` varchar(50) NOT NULL,
  `category` varchar(50) NOT NULL,
  `author` varchar(50) NOT NULL,
  `image` varchar(500) NOT NULL,
  `post` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cms_post`
--

INSERT INTO `cms_post` (`post_id`, `post_date_time`, `title`, `category`, `author`, `image`, `post`) VALUES
(16, '2022-06-12', 'Test', 'Akhirhusannah', 'admin', 'CloudsConvert_maxresdefault-1654401489.jpg', 'Test'),
(17, '2022-07-18', 'test2', 'Akhirhusannah', 'muhammadirfani340@gmail.com', 'img (22).webp', 'asasasasasasasasasas'),
(19, '2022-07-18', 'Test4', 'Akhirhusannah', 'muhammadirfani340@gmail.com', 'img (22).webp', 'Lorem ipsum dono ametmerter'),
(20, '2022-07-18', 'Test5', 'Akhirhusannah', 'muhammadirfani340@gmail.com', 'img (22).webp', 'Test5'),
(21, '2022-07-18', 'test6', 'Akhirhusannah', 'muhammadirfani340@gmail.com', 'img (22).webp', 'Test6'),
(22, '2022-07-18', 'Nuruljadid Event ', 'Akhirhusannah', 'muhammadirfani340@gmail.com', 'event_Akhirussanah_1.jpeg', 'Lorem Nurul');

-- --------------------------------------------------------

--
-- Table structure for table `cms_ppdb`
--

CREATE TABLE `cms_ppdb` (
  `id` int(1) NOT NULL,
  `googleSpreadsheetEmbedLink` text NOT NULL,
  `googleFormsEmbedLink` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cms_ppdb`
--

INSERT INTO `cms_ppdb` (`id`, `googleSpreadsheetEmbedLink`, `googleFormsEmbedLink`) VALUES
(1, 'https://docs.google.com/spreadsheets/d/e/2PACX-1vRrZFDzl_iFzckXiG58YtxXjugDg8nOcuDP2stTb4-k_Wg-CCn6cajtkufwRhDUIbN-ci5j0Y-p94Ck/pubhtml\r\n', 'https://forms.gle/iXpZ58XDVKE2Qpyu9');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `date_time` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `comment` varchar(1000) NOT NULL,
  `status` varchar(50) NOT NULL,
  `approve_by` varchar(50) DEFAULT NULL,
  `post_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cms_aboutus`
--
ALTER TABLE `cms_aboutus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_admin`
--
ALTER TABLE `cms_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_category`
--
ALTER TABLE `cms_category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `cms_post`
--
ALTER TABLE `cms_post`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `cms_ppdb`
--
ALTER TABLE `cms_ppdb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cms_aboutus`
--
ALTER TABLE `cms_aboutus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cms_admin`
--
ALTER TABLE `cms_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `cms_category`
--
ALTER TABLE `cms_category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `cms_post`
--
ALTER TABLE `cms_post`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `cms_ppdb`
--
ALTER TABLE `cms_ppdb`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
