-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Янв 13 2023 г., 16:06
-- Версия сервера: 5.7.39
-- Версия PHP: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `e3t_database`
--

-- --------------------------------------------------------

--
-- Структура таблицы `booking`
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
-- Структура таблицы `events`
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
-- Дамп данных таблицы `events`
--

INSERT INTO `events` (`id`, `name`, `date`, `start_time`, `capacity`, `category`, `photos`, `location`, `zip`, `descriptions`, `hot`) VALUES
(1, 'The Weeknd Concert', '', '2022-12-19 22:35:33', 100, '', 'img/festivals/festival_4.jpg', 'Emmen, Netherlands ', '', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', b'1');

-- --------------------------------------------------------

--
-- Структура таблицы `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `usertype` varchar(50) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `login`
--

INSERT INTO `login` (`id`, `username`, `password`, `usertype`) VALUES
(1, 'client@gmail.com', '123', 'user'),
(2, 'admin@gmail.com', '1234', 'admin'),
(3, 'talents@gmail.com', '12345', 'talent');

-- --------------------------------------------------------

--
-- Структура таблицы `reviews`
--

CREATE TABLE `reviews` (
  `review_id` int(255) NOT NULL,
  `id` int(255) NOT NULL,
  `heading` int(11) NOT NULL,
  `review` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Структура таблицы `talents`
--

CREATE TABLE `talents` (
  `id` int(11) NOT NULL,
  `active` int(1) NOT NULL DEFAULT '1',
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
-- Дамп данных таблицы `talents`
--

INSERT INTO `talents` (`id`, `active`, `email`, `fName`, `lName`, `descriptions`, `speciality_1`, `speciality_2`, `speciality_3`, `phoneNr`, `bday`, `avatar`, `photo1`, `photo2`, `photo3`) VALUES
(1, 1, '', 'David ', '', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'magic_tricks ', 'acrobatics', 'jokes', 0, '', '', 'img/b_2.jpg', '', '');
INSERT INTO `talents` (`id`, `active`, `email`, `fName`, `lName`, `descriptions`, `speciality_1`, `speciality_2`, `speciality_3`, `phoneNr`, `bday`, `avatar`, `photo1`, `photo2`, `photo3`) VALUES (NULL, '1', 'aa@gmail.com', 'Nia', 'Smith', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'something', 'something', 'something', '11111111', '12/02/1999', 'img/b_2.jpg', 'img/b_2.jpg', 'img/b_2.jpg', 'img/b_2.jpg');
INSERT INTO `talents` (`id`, `active`, `email`, `fName`, `lName`, `descriptions`, `speciality_1`, `speciality_2`, `speciality_3`, `phoneNr`, `bday`, `avatar`, `photo1`, `photo2`, `photo3`) VALUES (NULL, '1', 'bb@gmial.com', 'John', 'Smith', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'something', 'something', 'something', '22222', '3/03/2001', ' \r\nimg/b_2.jpg', ' \r\nimg/b_2.jpg', ' \r\nimg/b_2.jpg', ' \r\nimg/b_2.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `talents_events`
--

CREATE TABLE `talents_events` (
  `talent_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`review_id`);

--
-- Индексы таблицы `talents`
--
ALTER TABLE `talents`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `talents_events`
--
ALTER TABLE `talents_events`
  ADD PRIMARY KEY (`talent_id`,`event_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `reviews`
--
ALTER TABLE `reviews`
  MODIFY `review_id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `talents`
--
ALTER TABLE `talents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
