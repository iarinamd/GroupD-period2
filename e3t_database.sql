-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: mysql
-- Generation Time: Jan 14, 2023 at 01:08 PM
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

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `date` text NOT NULL,
  `start_time` datetime NOT NULL,
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

(1, 'The Weeknd Concert', '4 October', '2022-12-19 22:35:33', 100, 'Party', 'img/festivals/festival_4.jpg', 'Emmen, Netherlands ', '12346', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', b'1'),
(2, 'Fantastic Friday', '6 January', '2023-01-14 11:22:05', 50, 'Party', 'img/festivals/festival_1.jpg', 'Ommen', '6578', 'This boi sucks', b'0'),
(3, 'Fantastic Friday', '8 May', '2023-01-14 11:22:05', 50, 'Party', 'img/festivals/festival_4.jpg', 'Ommen', '7891', 'This boi sucks', b'0');


-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(129) NOT NULL,
  `usertype` varchar(50) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `password`, `usertype`) VALUES
(1, 'client@gmail.com', '$2y$10$AzRstImtVy8noibHqs6Kfee/bYA/lY13t.T8fT7Xk8O5HLan4btoe', 'user'),
(2, 'admin@gmail.com', '$2y$10$JX9Yx9BPXIKMJ6lPeAUQMuRFKP0enX4QfsO0PAR/Mrrd7wc0SzwhG', 'admin'),
(3, 'talents@gmail.com', '$2y$10$Df5i6gtIGJvXqLl7AM.vZ.zj7o7TQrb.2R1jfmOOXyuW0aBLPAn/S', 'talent');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `review_id` int(255) NOT NULL,
  `id` int(255) NOT NULL,
  `heading` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `review` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
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
(1, 1, '', 'David', '', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'magic_tricks ', 'acrobatics', 'jokes', 0, '', '', 'img/b_2.jpg', '', ''),
(2, 1, 'something@something.com', 'Daniel', 'Bruh', 'Twin brother of the not-as-well-known German actor', 'Acting', 'Actorning', 'Actioning', 25, '$th OCTOBER', 'img/concerts/concert_4.jpg', 'img/concerts/concert_4.jpg', 'img/concerts/concert_4.jpg', 'img/concerts/concert_4.jpg'),
(3, 1, 'something2@something.com', 'XAE A-12', 'Musk', 'Who dis', 'Being born', 'Existing', 'Living', 60, 'Second day', 'img/festivals/festival_4.jpg', 'img/festivals/festival_4.jpg', 'img/festivals/festival_4.jpg', 'img/festivals/festival_4.jpg');

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
-- Dumping data for table `talents_events`
--

INSERT INTO `talents_events` (`talent_id`, `event_id`, `id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 3, 3);

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `event_id` (`event_id`),
  ADD KEY `talent_id` (`talent_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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

--
-- AUTO_INCREMENT for table `talents_events`
--
ALTER TABLE `talents_events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `talents_events`
--
ALTER TABLE `talents_events`
  ADD CONSTRAINT `talents_events_ibfk_1` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`),
  ADD CONSTRAINT `talents_events_ibfk_2` FOREIGN KEY (`talent_id`) REFERENCES `talents` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
