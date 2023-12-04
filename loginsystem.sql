-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 06, 2022 at 07:24 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.30

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
-- Table structure for table `friends`
--

CREATE TABLE `friends` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_one` int(11) NOT NULL,
  `user_two` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `friend_request`
--

CREATE TABLE `friend_request` (
  `id` int(11) NOT NULL,
  `sender` int(11) NOT NULL,
  `receiver` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `assocUsers` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbevents`
--

INSERT INTO `tbevents` (`event_id`, `eventname`, `description`, `date`, `location`, `hashtags`, `eventImage`, `assocUsers`) VALUES
(25, 'Hunting', 'Springbok hunting in the Karoo', '2022-10-21', 'Karoo', 'outdoors, wild, nature', '48950082861_92e9f09f5e_k.jpg', 'jack'),
(27, 'Transformers Movies marathon', 'We gonna be watching all the transformers movies over the day ', '2022-09-08', 'Lichtenburg', 'indoors', '320px-ShockwaveDOTMgamepromo.jpg', 'jack'),
(28, 'rage', 'rageExpo', '2022-09-23', 'Johanesburg', 'LAN, gaming', 'rAge.jpg', 'Thabz'),
(30, 'Frank Casino and friends concert', 'Music performance by Frank Casino and other artists', '2022-09-01', 'CocaCola Dome', 'crowds, music', 'concert.jpg', 'jack'),
(31, 'Local LAN', 'LAN at thabz house', '2022-10-19', 'Lichtenburg', 'indoors, gaming', 'LAN.jpg', 'Thabz');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `create_datetime`, `dateOfBirth`, `fullName`, `contact`, `description`, `location`, `profilePic`) VALUES
(2, 'Thabz', 't@gamail.com', '1234', '2022-08-28 08:25:05', '2022-10-08', 'Thabiso', '06848484', 'I like music events', 'Pretoria', 'fgdfg.jpg'),
(3, 'jack', 'jack@gmail.com', '1234', '2022-08-28 08:26:12', '2022-10-21', 'jacky', '06848484', 'i love eventts', 'ltx', 'd292e7b5b9eeb2e97add052399a308d7.jpg');

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for table `tbevents`
--
ALTER TABLE `tbevents`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
