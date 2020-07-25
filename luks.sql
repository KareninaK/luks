-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 25-07-2020 a las 04:42:57
-- Versión del servidor: 10.4.10-MariaDB
-- Versión de PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `luks`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `guias`
--


CREATE TABLE IF NOT EXISTS `guias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(100) NOT NULL,
  `descripcion` varchar(6000) DEFAULT NULL,
  `link` varchar(900) CHARACTER SET utf8 COLLATE utf8_estonian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `guias`
--

INSERT INTO `guias` (`id`, `titulo`, `descripcion`, `link`) VALUES
(1, 'sasdasd', ' asdasd', 'sadasd');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticias`
--


CREATE TABLE IF NOT EXISTS `noticias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `contenido` varchar(21000) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `noticias`
--

INSERT INTO `noticias` (`id`, `contenido`, `fecha`) VALUES
(4, '<p>GDGDFGDFGF</p>\r\n\r\n<p>GFGDFGDF</p>\r\n\r\n<p>GDFGDFGDFG</p>\r\n\r\n<p>DFGDFGDFGDG</p>\r\n', '2020-07-21 17:06:51'),
(5, '<p><iframe allowfullscreen=\"\" frameborder=\"0\" height=\"360\" src=\"https://www.youtube.com/embed/_muUd1O2TEs\" width=\"640\"></iframe></p>\r\n', '2020-07-21 17:13:55'),
(2, '<p>sdfsdfsdfsfdfsdf</p>\r\n', '2020-07-21 16:46:16'),
(3, '<p>dfsdfsdffsdfdf</p>\r\n', '2020-07-21 16:46:20'),
(9, '<p>HGFHFHGFGFHHH</p>\r\n', '2020-07-21 17:19:53'),
(10, '<p>GHFGHHHHFGH</p>\r\n', '2020-07-21 17:19:58'),
(12, '<p>GFHFGHFGHFGHGHHGHFGHFG</p>\r\n', '2020-07-21 17:20:46'),
(26, '<figure class=\"easyimage easyimage-side\"><img alt=\"\" src=\"blob:http://localhost/3f2a981a-faea-484f-88ab-34fe7296c28d\" width=\"1440\" />\r\n<figcaption></figcaption>\r\n</figure>\r\n\r\n<p>iuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuu</p>\r\n', '2020-07-22 02:20:02'),
(14, '<p><iframe allowfullscreen=\"\" frameborder=\"0\" height=\"360\" src=\"https://www.youtube.com/embed/JZ_3WRN0Owg?start=217\" width=\"640\"></iframe></p>\r\n', '2020-07-21 17:49:43'),
(20, '<p>cvhgcghcghchchchc</p>\r\n', '2020-07-21 23:52:26'),
(16, '<p>fsdfdsfsdf</p>\r\n', '2020-07-21 17:55:02'),
(23, '<p>hfghfghfghfgh</p>\r\n', '2020-07-22 02:18:05'),
(24, '<p><font style=\"vertical-align:inherit\"><font style=\"vertical-align:inherit\">gfhfghfghfghfghfghfgh</font></font></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><font style=\"vertical-align:inherit\"><font style=\"vertical-align:inherit\">&quot;&gt;</font></font></p>\r\n', '2020-07-22 02:18:29'),
(25, '<figure class=\"easyimage easyimage-side\"><img alt=\"\" src=\"blob:http://localhost/e9d7915a-d83c-4531-8df4-e6ff61bd61b4\" width=\"720\" />\r\n<figcaption></figcaption>\r\n</figure>\r\n\r\n<p>fghfhfghfghhfghfgh</p>\r\n', '2020-07-22 02:18:51'),
(27, '<figure class=\"easyimage easyimage-full\"><img alt=\"\" src=\"blob:http://localhost/88f270e0-1a7a-4724-ba6b-52b6bdad16f3\" width=\"1440\" />\r\n<figcaption></figcaption>\r\n</figure>\r\n\r\n<p>&nbsp;</p>\r\n', '2020-07-24 19:42:43');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `videos`
--

CREATE TABLE IF NOT EXISTS `videos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(600) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `link` varchar(600) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `videos`
--

INSERT INTO `videos` (`id`, `titulo`, `descripcion`, `link`, `fecha`) VALUES
(3, 'hola', ' como estas?', 'https://www.youtube.com/watch?v=JZ_3WRN0Owg&t=217s', '2020-07-21 04:22:13'),
(6, 'ufa', ' loco que onda con vosghfghfghghhfghfghfdgdfgdfgfdg', 'https://www.youtube.com/watch?v=kGKkUN50R0c', '2020-07-21 04:23:32');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
