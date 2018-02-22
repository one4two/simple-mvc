-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Фев 22 2018 г., 14:06
-- Версия сервера: 5.5.53-log
-- Версия PHP: 5.6.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `kinoteka`
--

-- --------------------------------------------------------

--
-- Структура таблицы `Countries`
--

CREATE TABLE `Countries` (
  `country_id` int(11) UNSIGNED NOT NULL,
  `country_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `Countries`
--

INSERT INTO `Countries` (`country_id`, `country_name`) VALUES
(6, 'Австралия'),
(5, 'Германия'),
(2, 'Канада'),
(4, 'Китай'),
(1, 'США'),
(3, 'Франция');

-- --------------------------------------------------------

--
-- Структура таблицы `Films`
--

CREATE TABLE `Films` (
  `film_id` int(11) UNSIGNED NOT NULL,
  `film_name` varchar(50) NOT NULL,
  `year` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `Films`
--

INSERT INTO `Films` (`film_id`, `film_name`, `year`) VALUES
(3, 'Матрица', '1999-01-01'),
(4, 'Матрица: Перезагрузка', '2003-01-01'),
(6, 'Малышка на мильйон', '2004-01-01'),
(17, 'Такси', '1998-01-01');

-- --------------------------------------------------------

--
-- Структура таблицы `films_countries`
--

CREATE TABLE `films_countries` (
  `film_country_id` int(11) UNSIGNED NOT NULL,
  `film_id` int(11) UNSIGNED NOT NULL,
  `country_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `films_countries`
--

INSERT INTO `films_countries` (`film_country_id`, `film_id`, `country_id`) VALUES
(5, 3, 1),
(6, 4, 1),
(8, 6, 5),
(18, 3, 6),
(20, 17, 3);

-- --------------------------------------------------------

--
-- Структура таблицы `films_janres`
--

CREATE TABLE `films_janres` (
  `film_janre_id` int(11) UNSIGNED NOT NULL,
  `film_id` int(11) UNSIGNED NOT NULL,
  `janre_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `films_janres`
--

INSERT INTO `films_janres` (`film_janre_id`, `film_id`, `janre_id`) VALUES
(20, 3, 4),
(21, 4, 4),
(22, 4, 4),
(24, 6, 7),
(34, 3, 1),
(36, 17, 5);

-- --------------------------------------------------------

--
-- Структура таблицы `films_producers`
--

CREATE TABLE `films_producers` (
  `film_producer_id` int(11) NOT NULL,
  `film_id` int(11) UNSIGNED NOT NULL,
  `producer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `films_producers`
--

INSERT INTO `films_producers` (`film_producer_id`, `film_id`, `producer_id`) VALUES
(3, 3, 4),
(4, 4, 4),
(7, 6, 3),
(17, 3, 5),
(19, 17, 10);

-- --------------------------------------------------------

--
-- Структура таблицы `Janres`
--

CREATE TABLE `Janres` (
  `janr_id` int(11) UNSIGNED NOT NULL,
  `janr_name` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `Janres`
--

INSERT INTO `Janres` (`janr_id`, `janr_name`) VALUES
(1, 'Боевик'),
(7, 'Драма'),
(5, 'Комедия'),
(8, 'Криминал'),
(6, 'Мелодрамма'),
(3, 'Триллер'),
(2, 'Ужасы'),
(4, 'Фантастика');

-- --------------------------------------------------------

--
-- Структура таблицы `Producers`
--

CREATE TABLE `Producers` (
  `producer_id` int(11) NOT NULL,
  `producer_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `Producers`
--

INSERT INTO `Producers` (`producer_id`, `producer_name`) VALUES
(1, 'Стивен Спилберг'),
(2, 'Квентин Тарантино'),
(3, 'Клинт Иствуд'),
(4, 'Лана Вачовски'),
(5, 'Энди Вачовски'),
(6, 'Стивен Норрингтон'),
(7, 'Гильермо дель Торо'),
(8, 'Дэвид С. Гойер'),
(9, 'Люк Бессон'),
(10, 'Жерар Пирэс');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `Countries`
--
ALTER TABLE `Countries`
  ADD PRIMARY KEY (`country_id`),
  ADD UNIQUE KEY `country_id` (`country_id`),
  ADD UNIQUE KEY `country_name` (`country_name`);

--
-- Индексы таблицы `Films`
--
ALTER TABLE `Films`
  ADD PRIMARY KEY (`film_id`),
  ADD UNIQUE KEY `film_id` (`film_id`),
  ADD KEY `film_id_2` (`film_id`);

--
-- Индексы таблицы `films_countries`
--
ALTER TABLE `films_countries`
  ADD PRIMARY KEY (`film_country_id`),
  ADD KEY `film_id` (`film_id`),
  ADD KEY `country_id` (`country_id`);

--
-- Индексы таблицы `films_janres`
--
ALTER TABLE `films_janres`
  ADD PRIMARY KEY (`film_janre_id`),
  ADD UNIQUE KEY `film_janre_id` (`film_janre_id`),
  ADD KEY `film_id` (`film_id`),
  ADD KEY `janre_id` (`janre_id`);

--
-- Индексы таблицы `films_producers`
--
ALTER TABLE `films_producers`
  ADD PRIMARY KEY (`film_producer_id`),
  ADD KEY `film_id` (`film_id`),
  ADD KEY `producer_id` (`producer_id`);

--
-- Индексы таблицы `Janres`
--
ALTER TABLE `Janres`
  ADD PRIMARY KEY (`janr_id`),
  ADD UNIQUE KEY `janr_id` (`janr_id`),
  ADD UNIQUE KEY `janr_name` (`janr_name`);

--
-- Индексы таблицы `Producers`
--
ALTER TABLE `Producers`
  ADD PRIMARY KEY (`producer_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `Countries`
--
ALTER TABLE `Countries`
  MODIFY `country_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT для таблицы `Films`
--
ALTER TABLE `Films`
  MODIFY `film_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT для таблицы `films_countries`
--
ALTER TABLE `films_countries`
  MODIFY `film_country_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT для таблицы `films_janres`
--
ALTER TABLE `films_janres`
  MODIFY `film_janre_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT для таблицы `films_producers`
--
ALTER TABLE `films_producers`
  MODIFY `film_producer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT для таблицы `Janres`
--
ALTER TABLE `Janres`
  MODIFY `janr_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT для таблицы `Producers`
--
ALTER TABLE `Producers`
  MODIFY `producer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `films_countries`
--
ALTER TABLE `films_countries`
  ADD CONSTRAINT `films_countries_ibfk_1` FOREIGN KEY (`country_id`) REFERENCES `Countries` (`country_id`),
  ADD CONSTRAINT `films_countries_ibfk_2` FOREIGN KEY (`film_id`) REFERENCES `Films` (`film_id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `films_janres`
--
ALTER TABLE `films_janres`
  ADD CONSTRAINT `films_janres_ibfk_2` FOREIGN KEY (`janre_id`) REFERENCES `Janres` (`janr_id`),
  ADD CONSTRAINT `films_janres_ibfk_3` FOREIGN KEY (`film_id`) REFERENCES `Films` (`film_id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `films_producers`
--
ALTER TABLE `films_producers`
  ADD CONSTRAINT `films_producers_ibfk_1` FOREIGN KEY (`producer_id`) REFERENCES `Producers` (`producer_id`),
  ADD CONSTRAINT `films_producers_ibfk_2` FOREIGN KEY (`film_id`) REFERENCES `Films` (`film_id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
