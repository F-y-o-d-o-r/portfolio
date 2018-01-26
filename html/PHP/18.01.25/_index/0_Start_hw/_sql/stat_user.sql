-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Янв 20 2018 г., 22:07
-- Версия сервера: 5.5.25
-- Версия PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `stat_user`
--

-- --------------------------------------------------------

--
-- Структура таблицы `day`
--

CREATE TABLE IF NOT EXISTS `day` (
  `id_day` int(2) NOT NULL AUTO_INCREMENT,
  `day` varchar(2) NOT NULL,
  PRIMARY KEY (`id_day`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=32 ;

--
-- Дамп данных таблицы `day`
--

INSERT INTO `day` (`id_day`, `day`) VALUES
(1, '01'),
(2, '02'),
(3, '03'),
(4, '04'),
(5, '05'),
(6, '06'),
(7, '07'),
(8, '08'),
(9, '09'),
(10, '10'),
(11, '11'),
(12, '12'),
(13, '13'),
(14, '14'),
(15, '15'),
(16, '16'),
(17, '17'),
(18, '18'),
(19, '19'),
(20, '20'),
(21, '21'),
(22, '22'),
(23, '23'),
(24, '24'),
(25, '25'),
(26, '26'),
(27, '27'),
(28, '28'),
(29, '29'),
(30, '30'),
(31, '31');

-- --------------------------------------------------------

--
-- Структура таблицы `month`
--

CREATE TABLE IF NOT EXISTS `month` (
  `id_month` int(2) NOT NULL AUTO_INCREMENT,
  `month` varchar(2) NOT NULL,
  PRIMARY KEY (`id_month`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Дамп данных таблицы `month`
--

INSERT INTO `month` (`id_month`, `month`) VALUES
(1, '01'),
(2, '02'),
(3, '03'),
(4, '04'),
(5, '05'),
(6, '06'),
(7, '07'),
(8, '08'),
(9, '09'),
(10, '10'),
(11, '11'),
(12, '12');

-- --------------------------------------------------------

--
-- Структура таблицы `pokup`
--

CREATE TABLE IF NOT EXISTS `pokup` (
  `id_pokup` int(6) NOT NULL AUTO_INCREMENT,
  `id_user` int(6) NOT NULL,
  `id_tovar` int(6) NOT NULL,
  `dat` date NOT NULL,
  PRIMARY KEY (`id_pokup`),
  KEY `id_user` (`id_user`),
  KEY `id_tovar` (`id_tovar`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Дамп данных таблицы `pokup`
--

INSERT INTO `pokup` (`id_pokup`, `id_user`, `id_tovar`, `dat`) VALUES
(1, 1, 1, '2015-01-10'),
(2, 2, 2, '2015-02-03'),
(3, 3, 3, '2015-03-24'),
(4, 3, 4, '2015-03-24'),
(5, 3, 2, '2015-04-04'),
(6, 1, 3, '2017-12-30'),
(7, 1, 4, '2017-12-30');

-- --------------------------------------------------------

--
-- Структура таблицы `pokupki_tmp`
--

CREATE TABLE IF NOT EXISTS `pokupki_tmp` (
  `up` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `tel` varchar(100) NOT NULL,
  `adr` varchar(100) NOT NULL,
  `tov` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `dat` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `pokupki_tmp`
--

INSERT INTO `pokupki_tmp` (`up`, `name`, `tel`, `adr`, `tov`, `image`, `dat`) VALUES
('1/1', 'Анна А.', '(068)365-87-75', 'Чернигов', 'Обувь', 'img/a1.jpg', '2015-01-10'),
('2/2', 'Сергей П.', '(093)874-35-53', 'Киев', 'Брюки', 'img/a2.jpg', '2015-02-03'),
('3/5', 'Дмитрий С.', '(050)976-36-65', 'Одесса', 'Брюки', 'img/a2.jpg', '2015-04-04'),
('1/6', 'Анна А.', '(068)365-87-75', 'Чернигов', 'Куртка', 'img/a3.jpg', '2017-12-30'),
('3/3', 'Дмитрий С.', '(050)976-36-65', 'Одесса', 'Куртка', 'img/a3.jpg', '2015-03-24'),
('1/7', 'Анна А.', '(068)365-87-75', 'Чернигов', 'Рубашка', 'img/a4.jpg', '2017-12-30'),
('3/4', 'Дмитрий С.', '(050)976-36-65', 'Одесса', 'Рубашка', 'img/a4.jpg', '2015-03-24');

-- --------------------------------------------------------

--
-- Структура таблицы `tovar`
--

CREATE TABLE IF NOT EXISTS `tovar` (
  `id_tovar` int(6) NOT NULL AUTO_INCREMENT,
  `tov` varchar(50) NOT NULL,
  `image` varchar(50) NOT NULL,
  PRIMARY KEY (`id_tovar`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Дамп данных таблицы `tovar`
--

INSERT INTO `tovar` (`id_tovar`, `tov`, `image`) VALUES
(1, 'Обувь', 'img/a1.jpg'),
(2, 'Брюки', 'img/a2.jpg'),
(3, 'Куртка', 'img/a3.jpg'),
(4, 'Рубашка', 'img/a4.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(6) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `tel` varchar(25) NOT NULL,
  `adr` varchar(50) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id_user`, `name`, `tel`, `adr`) VALUES
(1, 'Анна А.', '(068)365-87-75', 'Чернигов'),
(2, 'Сергей П.', '(093)874-35-53', 'Киев'),
(3, 'Дмитрий С.', '(050)976-36-65', 'Одесса'),
(4, 'Александр Г.', '(073)0956153', 'Одесса');

-- --------------------------------------------------------

--
-- Структура таблицы `yar`
--

CREATE TABLE IF NOT EXISTS `yar` (
  `id_yar` int(4) NOT NULL AUTO_INCREMENT,
  `yar` varchar(4) NOT NULL,
  PRIMARY KEY (`id_yar`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Дамп данных таблицы `yar`
--

INSERT INTO `yar` (`id_yar`, `yar`) VALUES
(1, '2015'),
(2, '2016'),
(3, '2017'),
(4, '2018'),
(5, '2019'),
(6, '2020');

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `pokup`
--
ALTER TABLE `pokup`
  ADD CONSTRAINT `pokup_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pokup_ibfk_2` FOREIGN KEY (`id_tovar`) REFERENCES `tovar` (`id_tovar`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
