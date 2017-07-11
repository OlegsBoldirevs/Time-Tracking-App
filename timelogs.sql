-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 11, 2017 at 11:05 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `timelogs`
--

-- --------------------------------------------------------

--
-- Table structure for table `timelogsapp`
--

CREATE TABLE `timelogsapp` (
  `lid` int(11) NOT NULL,
  `description` text NOT NULL,
  `time` text NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `timelogsapp`
--

INSERT INTO `timelogsapp` (`lid`, `description`, `time`, `date`) VALUES
(217, 'made a dinner', '30min', '2017-07-08 16:09:55'),
(218, 'learning new stuff', '2h', '2017-07-11 16:10:11'),
(219, 'playing video games', '3h 30min', '2017-07-11 16:10:23'),
(220, 'did nothing', '1h', '2017-05-16 16:10:42'),
(221, 'Bath', '10min', '2017-07-07 16:10:52'),
(222, 'Went to shop', '1h 30min', '2017-07-10 16:11:04'),
(223, 'Sleep', '1h 30min', '2017-07-07 16:11:16'),
(224, 'listening music', '20min', '2017-07-06 16:11:39'),
(226, 'test', '2', '2017-02-06 18:00:03'),
(228, 'music', '20min', '2017-07-06 18:27:21'),
(229, 'improving style', '15min', '2017-07-11 20:11:41'),
(230, 'eating', '30min', '2017-07-08 20:12:35'),
(231, 'watching movie', '2h', '2017-07-11 20:18:21'),
(232, 'fixed a problem', '1h', '2017-07-11 23:59:07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `timelogsapp`
--
ALTER TABLE `timelogsapp`
  ADD PRIMARY KEY (`lid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `timelogsapp`
--
ALTER TABLE `timelogsapp`
  MODIFY `lid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=233;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
