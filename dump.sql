-- phpMyAdmin SQL Dump
-- version 4.6.6deb4
-- https://www.phpmyadmin.net/
--
-- Хост: localhost:3306
-- Время создания: Мар 09 2020 г., 17:25
-- Версия сервера: 10.1.44-MariaDB-0+deb9u1
-- Версия PHP: 7.0.33-0+deb9u6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `CityBase`
--

-- --------------------------------------------------------

--
-- Структура таблицы `city`
--

CREATE TABLE `city` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `lon` double NOT NULL,
  `lat` double NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `city`
--

INSERT INTO `city` (`id`, `name`, `lon`, `lat`, `date`) VALUES
(0, '', 0, 0, '2020-03-07 19:37:28'),
(65, 'Киев', 30.5327345, 50.402017, '2020-03-07 19:42:34'),
(66, 'Львов', 24.012843, 49.83144, '2020-03-07 19:42:51'),
(67, 'Самара', 50.060883, 53.321346, '2020-03-07 19:43:01'),
(68, 'Тольятти', 49.485157, 53.521901, '2020-03-07 19:43:23'),
(69, 'Москва', 37.6469205, 55.7244475, '2020-03-07 19:43:33'),
(70, 'Лондон', -0.0904245, 51.4912455, '2020-03-07 19:43:48'),
(71, 'Париж', 2.347042, 48.8587985, '2020-03-07 19:43:54'),
(74, 'Стамбул', 28.908527, 41.0148655, '2020-03-07 19:45:15'),
(75, 'Абу-Даби', 54.489681, 24.439554, '2020-03-07 19:45:21'),
(76, 'Дубай', 55.220231, 25.0360255, '2020-03-07 19:45:33'),
(77, 'Шанхай', 121.414358, 31.284698, '2020-03-07 19:45:39'),
(78, 'Паль', 1.4740905, 42.543968, '2020-03-07 19:46:59'),
(79, 'Абакан', 91.4270845, 53.683312, '2020-03-07 19:47:28'),
(80, 'Багдад', 44.3819355, 33.2702755, '2020-03-07 19:47:38'),
(81, 'Артём', 132.1932025, 43.375858, '2020-03-07 19:50:11'),
(82, 'Баку', 49.8799445, 40.383925, '2020-03-07 19:50:33'),
(83, 'Вена', 16.376238, 48.2161605, '2020-03-07 19:50:43'),
(84, 'Варшава', 21.061415, 52.2330005, '2020-03-07 19:50:57'),
(85, 'Бишкек', 74.5920005, 42.8796285, '2020-03-07 19:51:08'),
(86, 'Бохтар', 68.780278, 37.838455, '2020-03-07 19:51:28'),
(87, 'Атырау', 51.9294105, 47.1554775, '2020-03-07 19:51:38'),
(88, 'Арамиль', 60.850076, 56.6883505, '2020-03-07 19:51:47');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `city`
--
ALTER TABLE `city`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
