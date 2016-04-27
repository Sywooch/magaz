-- phpMyAdmin SQL Dump
-- version 4.0.10.10
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 27 2016 г., 17:53
-- Версия сервера: 5.6.26
-- Версия PHP: 5.5.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `db_magaz`
--

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id_category` int(11) NOT NULL AUTO_INCREMENT,
  `name_category` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_category`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id_category`, `name_category`) VALUES
(1, 'Phone');

-- --------------------------------------------------------

--
-- Структура таблицы `dependency_orders`
--

CREATE TABLE IF NOT EXISTS `dependency_orders` (
  `id_orders` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `count` tinyint(2) NOT NULL DEFAULT '1',
  KEY `id_orders` (`id_orders`),
  KEY `id_product` (`id_product`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `dependency_product`
--

CREATE TABLE IF NOT EXISTS `dependency_product` (
  `id_product` int(11) NOT NULL,
  `id_category` int(11) NOT NULL,
  KEY `id_category` (`id_category`),
  KEY `id_product` (`id_product`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `dependency_product`
--

INSERT INTO `dependency_product` (`id_product`, `id_category`) VALUES
(4, 1),
(5, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(6, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `id_orders` int(11) NOT NULL AUTO_INCREMENT,
  `name_user` varchar(255) DEFAULT NULL,
  `email_user` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_orders`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

-- --------------------------------------------------------

--
-- Структура таблицы `photo`
--

CREATE TABLE IF NOT EXISTS `photo` (
  `id_product` int(11) NOT NULL,
  `url` varchar(255) NOT NULL,
  KEY `id_product` (`id_product`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `photo`
--

INSERT INTO `photo` (`id_product`, `url`) VALUES
(4, 'web/img/0GQ_a4I06izQslrnyOiGyvrpURrSfX1x.jpg'),
(4, 'web/img/i6rwdIysu6k4TBi2035p2OnU7ayIt-gi.jpg'),
(4, 'web/img/UKK_XtYuj2x4Vo5ppZcgctZacoZ1gu3Z.jpg'),
(5, 'web/img/XkGakAxD1CqhFNayJmD_WygCcC1qqJzw.jpg'),
(5, 'web/img/eDcUH3iLTjF0ht6RkvrtRnhvfT59ws60.jpg'),
(5, 'web/img/f8jpoQizKQUq3pNTR9HYfoJNaam3Vmtt.jpg'),
(5, 'web/img/V7u1i_Gode-hCGYDv5XoqcqzXeSHJ6EB.jpg'),
(6, 'web/img/8W-IKYwFbdEt51IipKtbnzzDiTm6tH1X.jpg'),
(6, 'web/img/RhFvyJ6fZgJ38LV4YBW-U5UMUvEmhl6C.jpg'),
(6, 'web/img/uVy1KcelvavbcfSjB92106vRPAf_JPYy.jpg'),
(7, 'web/img/CvvQLqKIzQCu5L7347XIkJkj6vurzkFz.jpg'),
(7, 'web/img/C0GioWuLpIBQp8bOVq2-1APo4jYBTimV.jpg'),
(7, 'web/img/3hIumLpQXVIHrlMBXyI5b5ut6c51Gzys.jpg'),
(8, 'web/img/gX0rgSesL6H0XdDUyN-HKe9Jd0zKlD-e.jpg'),
(8, 'web/img/e158-CX_-XxN0ursC9tB9lC1OsvvpM-w.jpg'),
(8, 'web/img/-PZxyavSRxmYYQ1DCSTuwjYHJC9n_26x.jpg'),
(8, 'web/img/FW2itbCADd4PEkhrurF5uLL7CPpF-2v6.jpg'),
(9, 'web/img/407gBGqDY7X1tIodBvp6VoKTFGukL8zn.jpg'),
(9, 'web/img/T9YL3a6oSpZ0CrnvelPL9aPBrLnwz-7u.jpg'),
(9, 'web/img/7zcGYfW3Wrd-sF06DVtytOnBuz5L8D7e.jpg'),
(9, 'web/img/lH1SjDnfwPrZuSmmLMYxaSxqEyJ5ejgv.jpg'),
(10, 'web/img/5bw8zTYR-U_G9286o2FzTlcuvGCF7nv6.jpg'),
(10, 'web/img/2Dyd8aTGOXtW78LRfnDmAT0M2WzxZj-S.jpg'),
(10, 'web/img/2SSiCrGdyn3IaPpbL5lkChJHL0NFIOKL.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `id_product` int(11) NOT NULL AUTO_INCREMENT,
  `name_product` varchar(255) DEFAULT NULL,
  `description` text,
  `price` float(11,2) DEFAULT NULL,
  PRIMARY KEY (`id_product`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Дамп данных таблицы `product`
--

INSERT INTO `product` (`id_product`, `name_product`, `description`, `price`) VALUES
(4, 'Lenovo A536 Black', '<p>Диагональ экрана: 5"; </p>\r\n<p>Разрешение экрана: 854x480; </p>\r\n<p>Камера: 5 Mpx; </p>\r\n<p>Количество ядер: 4; </p>\r\n<p>Оперативная память: 1 Гб; </p>\r\n<p>Внутренняя память: 8 Гб;</p>', 2500.00),
(5, 'Apple Iphone 6 Gold', '</p>Диагональ экрана: 4.7"; </p>\r\n</p>Разрешение экрана: 1334x750; </p>\r\n</p>Камера: 12 Mpx; </p>\r\n</p>Количество ядер: 2; </p>\r\n</p>Оперативная память: 2 Гб; </p>\r\n</p>Внутренняя память: 128 Гб;</p>', 32000.00),
(6, 'Asus Zenfone 2', 'Asus', 4500.00),
(7, 'Samsung Edge S6 Black', 'jhhgfhg', 12000.00),
(8, 'HTC ONE M8', 'adasdasda', 8000.00),
(9, 'Huawei P8 Lite', 'adsdasdasd', 7500.00),
(10, 'LG Ray x190 Black', 'adsdsdfsdf', 8000.00);

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `dependency_orders`
--
ALTER TABLE `dependency_orders`
  ADD CONSTRAINT `dependency_orders_ibfk_1` FOREIGN KEY (`id_orders`) REFERENCES `orders` (`id_orders`) ON DELETE CASCADE,
  ADD CONSTRAINT `dependency_orders_ibfk_2` FOREIGN KEY (`id_product`) REFERENCES `product` (`id_product`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `dependency_product`
--
ALTER TABLE `dependency_product`
  ADD CONSTRAINT `dependency_product_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `product` (`id_product`) ON DELETE CASCADE,
  ADD CONSTRAINT `dependency_product_ibfk_2` FOREIGN KEY (`id_category`) REFERENCES `category` (`id_category`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `photo`
--
ALTER TABLE `photo`
  ADD CONSTRAINT `photo_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `product` (`id_product`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
