-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: mysql
-- Generation Time: Jan 14, 2023 at 10:52 AM
-- Server version: 10.9.2-MariaDB-1:10.9.2+maria~ubu2204
-- PHP Version: 8.0.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e3t_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id` int(11) NOT NULL,
  `talent` text NOT NULL,
  `category` text NOT NULL,
  `date` char(50) NOT NULL,
  `time` char(50) NOT NULL,
  `address` char(50) NOT NULL,
  `zip_code` varchar(10) NOT NULL,
  `description` text NOT NULL,
  `uploaded_files` char(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `talent`, `category`, `date`, `time`, `address`, `zip_code`, `description`, `uploaded_files`) VALUES
(2, 'Scooby-doo', 'Performer', '4 October', '12pm', 'Emmen Netherlands', '12345', 'Scooby dooby doo, where are you?', 'img/a_1.jpg'),
(3, 'Shagy', 'Mistery buster', '6 December', '3pm', 'Minecraft,', '54321', 'Zoinks Scoob', 'img/partytime.jpeg'),
(4, 'Scooby-doo', 'Performer', '4 October', '12pm', 'Emmen Netherlands', '12345', 'Scooby dooby doo, where are you?', 'img/a_1.jpg'),
(5, 'Shagy', 'Mistery buster', '6 December', '3pm', 'Minecraft,', '54321', 'Zoinks Scoob', 'img/partytime.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `date` text NOT NULL,
  `start_time` varchar(30) NOT NULL,
  `capacity` int(11) NOT NULL,
  `category` varchar(255) NOT NULL,
  `photos` varchar(100) NOT NULL,
  `location` varchar(50) NOT NULL,
  `zip` varchar(255) NOT NULL,
  `descriptions` varchar(1000) NOT NULL,
  `hot` bit(1) NOT NULL DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `name`, `date`, `start_time`, `capacity`, `category`, `photos`, `location`, `zip`, `descriptions`, `hot`) VALUES
(1, 'The Weeknd Concert', '4 October', '2022-12-19 22:35:33', 100, 'Concert', 'img/festivals/festival_4.jpg', 'Emmen, Netherlands ', '1234', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', b'1'),
(2, 'Test event', '4 October', '2022-11-19 22:35:00', 400, 'Concert', 'img/concerts/concert_1.jpg', 'Minecraft, Netherlands', '12345', 'THis is a concert, a concert which will happen, maybe', b'0'),
(3, '18th birthday', '12-02-2023', '20:00', 150, 'party', 'img/uploads/Sunny_socks_yellow.jpg', 'emmen center', '1234ab', 'birthday party ', b'0');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `usertype` varchar(50) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `password`, `usertype`) VALUES
(1, 'client@gmail.com', '123', 'user'),
(2, 'admin@gmail.com', '1234', 'admin'),
(3, 'talents@gmail.com', '12345', 'talent');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `review_id` int(255) NOT NULL,
  `id` int(255) NOT NULL,
  `heading` int(11) NOT NULL,
  `review` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `talents`
--

CREATE TABLE `talents` (
  `id` int(11) NOT NULL,
  `active` int(1) NOT NULL DEFAULT 1,
  `email` varchar(255) NOT NULL,
  `fName` varchar(50) NOT NULL,
  `lName` varchar(50) NOT NULL,
  `descriptions` varchar(1000) NOT NULL,
  `speciality_1` varchar(50) NOT NULL,
  `speciality_2` varchar(50) NOT NULL,
  `speciality_3` varchar(50) NOT NULL,
  `phoneNr` int(11) NOT NULL,
  `bday` text NOT NULL,
  `avatar` varchar(100) NOT NULL,
  `photo1` varchar(100) NOT NULL,
  `photo2` varchar(100) NOT NULL,
  `photo3` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `talents`
--

INSERT INTO `talents` (`id`, `active`, `email`, `fName`, `lName`, `descriptions`, `speciality_1`, `speciality_2`, `speciality_3`, `phoneNr`, `bday`, `avatar`, `photo1`, `photo2`, `photo3`) VALUES
(1, 1, 'david.talent@gmail.com', 'David ', 'Saltzpyre', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'magic_tricks ', 'acrobatics', 'jokes', 0, '12 January', 'img/a_1.jpg', 'img/b_2.jpg', 'img/partytime.jpeg', 'img/concerts/concert_5.jpg'),
(2, 1, 'testemail@gmail.com', 'FName', 'LName', 'violinist', 'band', 'musician', 'band', 12345678, '12-05-2003', 'img/uploads/Sunny_socks_yellow.jpg', 'img/uploads/Sunny_socks_yellow.jpg', 'img/uploads/Sunny_socks_yellow.jpg', 'img/uploads/Sunny_socks_yellow.jpg'),
(3, 1, 'aa@gmail.com', 'Nia', 'Smith', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'something', 'something', 'something', 11111111, '12/02/1999', 'img/b_2.jpg', 'img/b_2.jpg', 'img/b_2.jpg', 'img/b_2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `talents_events`
--

CREATE TABLE `talents_events` (
  `talent_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`review_id`);

--
-- Indexes for table `talents`
--
ALTER TABLE `talents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `talents_events`
--
ALTER TABLE `talents_events`
  ADD PRIMARY KEY (`talent_id`,`event_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `review_id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `talents`
--
ALTER TABLE `talents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
