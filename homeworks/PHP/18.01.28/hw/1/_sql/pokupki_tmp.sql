-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Янв 13 2018 г., 21:56
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
('2/2', 'Сергей П.', '(093)874-35-53', 'Киев', 'Брюки', 'img/a2.jpg', '2015-02-03'),
('3/5', 'Дмитрий С.', '(050)976-36-65', 'Одесса', 'Брюки', 'img/a2.jpg', '2015-04-04');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
