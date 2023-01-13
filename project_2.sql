-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: mysql
-- Время создания: Янв 13 2023 г., 11:53
-- Версия сервера: 10.9.2-MariaDB-1:10.9.2+maria~ubu2204
-- Версия PHP: 8.0.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `project_2`
--

-- --------------------------------------------------------

--
-- Структура таблицы `events`
--

CREATE TABLE `events` (
  `id` varchar(255) NOT NULL,
  `name` varchar(50) NOT NULL,
  `descriptions` varchar(1000) NOT NULL,
  `location` varchar(50) NOT NULL,
  `start_time` datetime NOT NULL,
  `end_time` datetime NOT NULL,
  `capacity` int(11) NOT NULL,
  `photos` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `events`
--

INSERT INTO `events` (`id`, `name`, `descriptions`, `location`, `start_time`, `end_time`, `capacity`, `photos`) VALUES
('1', 'The Week Concert', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Emmen, Netherlands ', '2022-12-19 22:35:33', '2022-12-19 00:35:33', 100, 'img/b_4.jpg');

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
  `id` int(11) NOT NULL,
  `heading` varchar(20) NOT NULL,
  `review` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `reviews`
--

INSERT INTO `reviews` (`review_id`, `id`, `heading`, `review`) VALUES
(1, 1, 'Great job', 'Wow i really liked the way magic tricks were shown. Awesome talent!'),
(2, 1, 'Wow nice', 'I find this talent best in the world.'),
(3, 1, 'sfrth', 'wprgnipwr'),
(4, 1, 'okjnsfoji', 'sdifnnjnbjidsg'),
(5, 1, 'skdjpfn', 'ojh adf'),
(6, 1, 'sdfgsg', 'sdfgsdg'),
(7, 1, 'okjlkjbadg', 'pinaergjkl'),
(8, 1, 'reh', 'erhtrhhW'),
(9, 1, 'lkjjnkjnsg', 'ljbjpjisdgr'),
(10, 1, 'lkjhbsdf', 'piubdrg'),
(11, 1, 'ljh sdrg', 'ljsdrg'),
(12, 1, 'lhjbsdfojnboiadsf', 'kevhiughivuuivewwehwehqheiehisdoiidsfgiosdfninbwfnbiorntb');

-- --------------------------------------------------------

--
-- Структура таблицы `talents`
--

CREATE TABLE `talents` (
  `id` int(11) NOT NULL,
  `active` int(1) NOT NULL DEFAULT 1,
  `email` varchar(100) NOT NULL,
  `name` varchar(50) NOT NULL,
  `descriptions` varchar(1000) NOT NULL,
  `speciality_1` varchar(50) NOT NULL,
  `speciality_2` varchar(50) NOT NULL,
  `speciality_3` varchar(50) NOT NULL,
  `avatar` varchar(100) NOT NULL,
  `photo1` varchar(100) NOT NULL,
  `photo2` varchar(100) NOT NULL,
  `photo3` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `talents`
--

INSERT INTO `talents` (`id`, `active`, `email`, `name`, `descriptions`, `speciality_1`, `speciality_2`, `speciality_3`, `avatar`, `photo1`, `photo2`, `photo3`) VALUES
(1, 1, 'talents@gmail.com', 'David ', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur ', 'magic_tricks ', 'acrobatics', 'jokes', 'images/b_3.jpg', 'images/b_1.jpg', 'images/b_2.jpg', 'images/b_4.jpg');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `events`
--
ALTER TABLE `events`
  ADD UNIQUE KEY `name` (`name`),
  ADD KEY `id` (`id`);

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
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `reviews`
--
ALTER TABLE `reviews`
  MODIFY `review_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `talents`
--
ALTER TABLE `talents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
