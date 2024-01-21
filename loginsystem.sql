-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 21, 2024 at 04:09 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `loginsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `event_ratings`
--

CREATE TABLE `event_ratings` (
  `id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `event_ratings`
--

INSERT INTO `event_ratings` (`id`, `event_id`, `user_id`, `rating`) VALUES
(1, 31, 2, 2),
(2, 25, 2, 2),
(3, 28, 2, 3),
(4, 30, 2, 3),
(5, 25, 3, 1),
(6, 31, 3, 3),
(7, 28, 3, 2),
(8, 27, 3, 3),
(9, 31, 7, 1),
(10, 30, 7, 2),
(11, 25, 7, 2),
(12, 30, 3, 2),
(13, 28, 7, 2),
(14, 34, 3, 2),
(15, 32, 3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbevents`
--

CREATE TABLE `tbevents` (
  `event_id` int(11) NOT NULL,
  `eventname` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `location` varchar(100) NOT NULL,
  `hashtags` varchar(100) NOT NULL,
  `eventImage` varchar(100) NOT NULL,
  `assocUsers` varchar(500) NOT NULL,
  `rating` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbevents`
--

INSERT INTO `tbevents` (`event_id`, `eventname`, `description`, `date`, `location`, `hashtags`, `eventImage`, `assocUsers`, `rating`) VALUES
(25, 'Hunting', 'Springbok hunting in the Karoo', '2022-10-21', 'Karoo', 'outdoors, wild, nature', '48950082861_92e9f09f5e_k.jpg', 'jack', 0),
(27, 'Transformers Movies marathon', 'We gonna be watching all the transformers movies over the day ', '2022-09-08', 'Lichtenburg', 'indoors', '320px-ShockwaveDOTMgamepromo.jpg', 'jack', 0),
(28, 'rage', 'rageExpo', '2022-09-23', 'Johanesburg', 'LAN, gaming', 'rAge.jpg', 'Thabz', 0),
(30, 'Frank Casino and friends concert', 'Music performance by Frank Casino and other artists', '2022-09-01', 'CocaCola Dome', 'crowds, music', 'concert.jpg', 'jack', 0),
(31, 'Local LAN', 'LAN at thabz house', '2022-10-19', 'Lichtenburg', 'indoors, gaming', 'LAN.jpg', 'Thabz', 0),
(32, 'paintball', 'paintball showdown', '2024-01-17', 'centurion paintball', 'paintball, outdoors', 'regular_show_black_ops_by_mattbyles-d3h6puq.jpg', 'jill', 0),
(33, 'chips and chill', 'get some slap chips and chill at the park', '2024-01-17', 'Joburg', 'outdoors, food and drink', 'tumblr_pqg3kpbfzi1r78rmho6_1280.jpg', 'jill', 0),
(34, 'chips and chill', 'get some slap chips and chill at the park', '2024-01-17', 'Joburg', 'outdoors, food and drink', 'tumblr_pqg3kpbfzi1r78rmho6_1280.jpg', 'jill', 0),
(35, 'swimming', 'swimming at a friends pool', '2024-01-18', '57 Fourth Ave', 'water, outdoors', 'Backyardpool.jpg', 'jack', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `create_datetime` datetime NOT NULL,
  `dateOfBirth` date NOT NULL,
  `fullName` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `description` varchar(200) NOT NULL,
  `location` varchar(100) NOT NULL,
  `profilePic` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `create_datetime`, `dateOfBirth`, `fullName`, `contact`, `description`, `location`, `profilePic`) VALUES
(2, 'Thabz', 't@gamail.com', '1234', '2022-08-28 08:25:05', '2023-12-07', 'thabzz', '0855555', 'like lan', 'Ltx', 'leandro-franci-inktober2019-001.jpg'),
(3, 'jack', 'jack@gmail.com', '1234', '2022-08-28 08:26:12', '2024-01-05', 'jackylove', '061231234', 'best adc in the world', 'venus', 'd292e7b5b9eeb2e97add052399a308d7.jpg'),
(6, 'test', 't@gamail.com', '1234', '2023-05-30 11:33:23', '0000-00-00', '', '', '', '', ''),
(7, 'tman', 'tman@gmail.co.za', '1234', '2024-01-03 17:25:32', '2024-01-05', 'tman', '0611231234', 'love outdoors', 'Joburg', 'sketch-1563641206341.png'),
(8, 'jill', 'j@gmail.com', '1234', '2024-01-05 06:50:31', '0000-00-00', '', '', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `event_ratings`
--
ALTER TABLE `event_ratings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_rating` (`event_id`,`user_id`);

--
-- Indexes for table `tbevents`
--
ALTER TABLE `tbevents`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `event_ratings`
--
ALTER TABLE `event_ratings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbevents`
--
ALTER TABLE `tbevents`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
