-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Авг 11 2015 г., 21:13
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Дамп данных таблицы `pokup`
--

INSERT INTO `pokup` (`id_pokup`, `id_user`, `id_tovar`, `dat`) VALUES
(1, 1, 1, '2015-01-10'),
(2, 2, 2, '2015-02-03'),
(3, 3, 3, '2015-03-24'),
(4, 3, 4, '2015-03-24'),
(5, 3, 2, '2015-04-04');

-- --------------------------------------------------------

--
-- Структура таблицы `tovar`
--

CREATE TABLE IF NOT EXISTS `tovar` (
  `id_tovar` int(6) NOT NULL AUTO_INCREMENT,
  `tov` varchar(50) NOT NULL,
  PRIMARY KEY (`id_tovar`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Дамп данных таблицы `tovar`
--

INSERT INTO `tovar` (`id_tovar`, `tov`) VALUES
(1, 'Обувь'),
(2, 'Брюки'),
(3, 'Куртка'),
(4, 'Рубашка');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id_user`, `name`, `tel`, `adr`) VALUES
(1, 'Анна А.', '(068)365-87-75', 'Чернигов'),
(2, 'Сергей П.', '(093)874-35-53', 'Киев'),
(3, 'Дмитрий С.', '(050)976-36-65', 'Одесса');

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
