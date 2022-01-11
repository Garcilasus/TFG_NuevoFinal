-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 20-01-2021 a las 14:50:58
-- Versión del servidor: 5.5.43-0ubuntu0.14.04.1
-- Versión de PHP: 5.5.9-1ubuntu4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `2020p_danielg`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulo`
--

CREATE TABLE IF NOT EXISTS `articulo` (
  `titulo` varchar(100) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `foto` varchar(90) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `descripcion` varchar(300) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `cuerpo` mediumtext COLLATE utf8mb4_spanish2_ci NOT NULL,
  `idArticulo` int(5) NOT NULL AUTO_INCREMENT,
  `categoria` varchar(60) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `subcategoria` int(11) DEFAULT NULL,
  `fecha` date NOT NULL,
  PRIMARY KEY (`idArticulo`),
  KEY `categoria` (`categoria`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci AUTO_INCREMENT=20 ;

--
-- Volcado de datos para la tabla `articulo`
--

INSERT INTO `articulo` (`titulo`, `foto`, `descripcion`, `cuerpo`, `idArticulo`, `categoria`, `subcategoria`, `fecha`) VALUES
('titulo de prueba de noticia', 'pruebaArts.jpg', 'Estamos probando qué tal aparece esta pequeña descripción en las noticias', 'seguimos probando la descripcion y cuerpo de las noticias a traves de la base de datos y del PDO. Creemos que vamos por el camino correcto para la codificación de nuestra nueva y moderna página web que dejara anonadados a la gente que nos visite', 1, 'recorrido', NULL, '2020-12-29'),
('titulo de prueba de noticia', 'pruebaArts.jpg', 'Estamos probando qué tal aparece esta pequeña descripción en las noticias', 'seguimos probando la descripcion y cuerpo de las noticias a traves de la base de datos y del PDO. Creemos que vamos por el camino correcto para la codificación de nuestra nueva y moderna página web que dejara anonadados a la gente que nos visite', 2, 'recorrido', NULL, '2020-12-29'),
('titulo de prueba de noticia', 'pruebaArts.jpg', 'Estamos probando qué tal aparece esta pequeña descripción en las noticias', 'seguimos probando la descripcion y cuerpo de las noticias a traves de la base de datos y del PDO. Creemos que vamos por el camino correcto para la codificación de nuestra nueva y moderna página web que dejara anonadados a la gente que nos visite', 3, 'recorrido', NULL, '2020-12-29'),
('titulo de prueba de noticia', 'pruebaArts.jpg', 'Estamos probando qué tal aparece esta pequeña descripción en las noticias', 'seguimos probando la descripcion y cuerpo de las noticias a traves de la base de datos y del PDO. Creemos que vamos por el camino correcto para la codificación de nuestra nueva y moderna página web que dejara anonadados a la gente que nos visite', 4, 'recorrido', NULL, '2020-12-29'),
('	\r\ntitulo de prueba de noticia', 'pruebaArts.jpg', 'Estamos probando qué tal aparece esta pequeña descripción en las noticias', 'seguimos probando la descripcion y cuerpo de las noticias a traves de la base de datos y del PDO. Creemos que vamos por el camino correcto para la codificación de nuestra nueva y moderna página web que dejara anonadados a la gente que nos visite', 5, 'recorrido', NULL, '2020-12-29'),
('	\r\ntitulo de prueba de noticia', 'pruebaArts.jpg', 'Estamos probando qué tal aparece esta pequeña descripción en las noticias', 'seguimos probando la descripcion y cuerpo de las noticias a traves de la base de datos y del PDO. Creemos que vamos por el camino correcto para la codificación de nuestra nueva y moderna página web que dejara anonadados a la gente que nos visite', 6, 'recorrido', NULL, '2020-12-29'),
('	\r\ntitulo de prueba de noticia', 'pruebaArts.jpg', 'Estamos probando qué tal aparece esta pequeña descripción en las noticias', 'seguimos probando la descripcion y cuerpo de las noticias a traves de la base de datos y del PDO. Creemos que vamos por el camino correcto para la codificación de nuestra nueva y moderna página web que dejara anonadados a la gente que nos visite', 7, 'recorrido', NULL, '2020-12-29'),
('	\r\ntitulo de prueba de noticia', 'pruebaArts.jpg', 'Estamos probando qué tal aparece esta pequeña descripción en las noticias', 'seguimos probando la descripcion y cuerpo de las noticias a traves de la base de datos y del PDO. Creemos que vamos por el camino correcto para la codificación de nuestra nueva y moderna página web que dejara anonadados a la gente que nos visite', 8, 'recorrido', NULL, '2020-12-29'),
('	\r\ntitulo de prueba de noticia', 'pruebaArts.jpg', 'Estamos probando qué tal aparece esta pequeña descripción en las noticias', 'seguimos probando la descripcion y cuerpo de las noticias a traves de la base de datos y del PDO. Creemos que vamos por el camino correcto para la codificación de nuestra nueva y moderna página web que dejara anonadados a la gente que nos visite', 9, 'recorrido', NULL, '2020-12-29'),
('	\r\ntitulo de prueba de noticia', 'pruebaArts.jpg', 'Estamos probando qué tal aparece esta pequeña descripción en las noticias', 'seguimos probando la descripcion y cuerpo de las noticias a traves de la base de datos y del PDO. Creemos que vamos por el camino correcto para la codificación de nuestra nueva y moderna página web que dejara anonadados a la gente que nos visite', 10, 'recorrido', NULL, '2020-12-29'),
('	\r\ntitulo de prueba de noticia', 'pruebaArts.jpg', 'Estamos probando qué tal aparece esta pequeña descripción en las noticias', 'seguimos probando la descripcion y cuerpo de las noticias a traves de la base de datos y del PDO. Creemos que vamos por el camino correcto para la codificación de nuestra nueva y moderna página web que dejara anonadados a la gente que nos visite', 11, 'recorrido', NULL, '2020-12-29'),
('	\r\ntitulo de prueba de noticia', 'pruebaArts.jpg', 'Estamos probando qué tal aparece esta pequeña descripción en las noticias', 'seguimos probando la descripcion y cuerpo de las noticias a traves de la base de datos y del PDO. Creemos que vamos por el camino correcto para la codificación de nuestra nueva y moderna página web que dejara anonadados a la gente que nos visite', 12, 'recorrido', NULL, '2020-12-29'),
('	\r\ntitulo de prueba de noticia', 'pruebaArts.jpg', 'Estamos probando qué tal aparece esta pequeña descripción en las noticias', 'seguimos probando la descripcion y cuerpo de las noticias a traves de la base de datos y del PDO. Creemos que vamos por el camino correcto para la codificación de nuestra nueva y moderna página web que dejara anonadados a la gente que nos visite', 13, 'recorrido', NULL, '2020-12-29'),
('	\r\ntitulo de prueba de noticia', 'pruebaArts.jpg', 'Estamos probando qué tal aparece esta pequeña descripción en las noticias', 'seguimos probando la descripcion y cuerpo de las noticias a traves de la base de datos y del PDO. Creemos que vamos por el camino correcto para la codificación de nuestra nueva y moderna página web que dejara anonadados a la gente que nos visite', 14, 'recorrido', NULL, '2020-12-29'),
('	\r\ntitulo de prueba de noticia', 'pruebaArts.jpg', 'Estamos probando qué tal aparece esta pequeña descripción en las noticias', 'seguimos probando la descripcion y cuerpo de las noticias a traves de la base de datos y del PDO. Creemos que vamos por el camino correcto para la codificación de nuestra nueva y moderna página web que dejara anonadados a la gente que nos visite', 15, 'recorrido', NULL, '2020-12-29'),
('	\r\ntitulo de prueba de noticia', 'pruebaArts.jpg', 'Estamos probando qué tal aparece esta pequeña descripción en las noticias', 'seguimos probando la descripcion y cuerpo de las noticias a traves de la base de datos y del PDO. Creemos que vamos por el camino correcto para la codificación de nuestra nueva y moderna página web que dejara anonadados a la gente que nos visite', 16, 'recorrido', NULL, '2020-12-29'),
('	\r\ntitulo de prueba de noticia', 'pruebaArts.jpg', 'Estamos probando qué tal aparece esta pequeña descripción en las noticias', 'seguimos probando la descripcion y cuerpo de las noticias a traves de la base de datos y del PDO. Creemos que vamos por el camino correcto para la codificación de nuestra nueva y moderna página web que dejara anonadados a la gente que nos visite', 17, 'recorrido', NULL, '2020-12-29'),
('titulo de prueba de noticia', 'pruebaArts.jpg', 'Estamos probando qué tal aparece esta pequeña descripción en las noticias', 'seguimos probando la descripcion y cuerpo de las noticias a traves de la base de datos y del PDO. Creemos que vamos por el camino correcto para la codificación de nuestra nueva y moderna página web que dejara anonadados a la gente que nos visite HOLA HOLA', 18, 'curiosidades', NULL, '2021-01-11'),
('Otro titulo de noticia', 'pruebaArts.jpg', 'Una descripción corta para mostrar el nuevo artículo es necesaria', 'Hola, esta es otra noticia creada en el día de ayer para probar el funcionamiento de este apartado, el cual esperemos que sea correcto porque creo que me voy a tirar por el balcón de un momento a otro como no sea así... lo malo de todo eso es que no me mataría porque vivo en un primero!', 19, 'gastronomía', NULL, '2021-01-19');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE IF NOT EXISTS `categorias` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(60) COLLATE utf8mb4_spanish2_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `nombre` (`nombre`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci AUTO_INCREMENT=10 ;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `nombre`) VALUES
(1, 'curiosidades'),
(4, 'evento'),
(6, 'fiestas'),
(5, 'gastronomía'),
(2, 'historia'),
(9, 'paseo'),
(8, 'recorrido'),
(7, 'tour'),
(3, 'visitar');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contacto`
--

CREATE TABLE IF NOT EXISTS `contacto` (
  `idContacto` int(5) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `asunto` tinytext COLLATE utf8mb4_spanish2_ci,
  `correo` varchar(80) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `mensaje` longtext COLLATE utf8mb4_spanish2_ci NOT NULL,
  `fecha` date NOT NULL,
  PRIMARY KEY (`idContacto`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `contacto`
--

INSERT INTO `contacto` (`idContacto`, `nombre`, `asunto`, `correo`, `mensaje`, `fecha`) VALUES
(1, 'Helen la parsera', 'Probando pa ver si furula', 'elenapv91@hotmail.com', 'Hola Parseruco, \n\nMe gustarÃ­a reservar una clase presencial contigo para poner en prÃ¡ctica los conceptos aprendidos durante nuestras clases online de algunos dÃ­as a las 2am. \n\nMe dices con lo que sea. \nUn abrazo y beso desde una ciudad congelada.\n\nHelen', '2021-01-14'),
(2, 'Miguelito', NULL, 'ejemplo@gmail.com', 'esta es una prueba para la visualización de acentos y ñ', '2021-01-14'),
(3, 'hhh', 'otro asunto de prueba', 'dani.garcia.decroly@gmail.com', 'hola, no sÃ© quÃ© estÃ¡ ocurriendo pero no estoy grabando ni las Ã± ni las tildes cuando la codificaciÃ³n estÃ¡ en UTF8 y el cotejamiento de la base de datos estÃ¡ aparentemente correcto y en local me funciona perfectamente', '2021-01-14'),
(4, 'lolaso', 'Sin asunto', 'dani.garcia.decroly@gmail.com', 'Djsjgjdkskgkaslgosxkfjskslglsalkcksndbxkaspgldkdjfkskznxnsndnc', '2021-01-14'),
(5, 'Elena', 'Aquí otra vez', 'elenapv91@hotmail.com', '', '2021-01-19'),
(6, 'lolaso', 'asunto', 'dani.garcia.decroly@gmail.com', '', '2021-01-19'),
(7, 'lolaso', 'Sin asunto', 'dani.garcia.decroly@gmail.com', '', '2021-01-19');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nosotros`
--

CREATE TABLE IF NOT EXISTS `nosotros` (
  `nombre` varchar(20) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `foto` varchar(60) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `idPersona` int(11) NOT NULL AUTO_INCREMENT,
  `ocupacion` varchar(100) COLLATE utf8mb4_spanish2_ci NOT NULL,
  PRIMARY KEY (`idPersona`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `nosotros`
--

INSERT INTO `nosotros` (`nombre`, `foto`, `idPersona`, `ocupacion`) VALUES
('Diego Mazo', 'free-tour-santander-diego', 1, 'Fundador y diseñador gráfico'),
('Fer García', 'free-tour-santander-fer', 2, 'Fundador'),
('Dani García', 'free-tour-santander-dani', 3, 'CEO, webmaster y guía'),
('Luis Gutiérrez', 'free-tour-santander-luis', 4, 'Guía'),
('María Ascorbe', 'free-tour-santander-maria', 5, 'Fotógrafa');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `parking`
--

CREATE TABLE IF NOT EXISTS `parking` (
  `nombre` varchar(50) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `enlace` varchar(60) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `tipo` bit(1) NOT NULL,
  `idParking` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`idParking`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci COMMENT='Para tipo=0 -> parking gratuito; tipo=>1 parking de pago' AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `parking`
--

INSERT INTO `parking` (`nombre`, `enlace`, `tipo`, `idParking`) VALUES
('Parking del Ayuntamiento', 'https://goo.gl/maps/nrD5U14TMcso67e58', b'1', 1),
('Interparking Esperanza', 'https://goo.gl/maps/FVBTDtxMfX4PFHm49', b'1', 2),
('Parking Alfonso XIII', 'https://goo.gl/maps/k7eiQZpc71wgBqdr9', b'1', 3),
('Aparcamiento Calle Alta', 'https://goo.gl/maps/NS2MKLv4ZoFsyg6A6', b'0', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paseos`
--

CREATE TABLE IF NOT EXISTS `paseos` (
  `dia` char(10) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `idDia` tinyint(1) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`idDia`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `paseos`
--

INSERT INTO `paseos` (`dia`, `idDia`) VALUES
('Lunes', 1),
('Martes', 2),
('Miércoles', 3),
('Jueves', 4),
('Viernes', 5),
('Sábado', 6),
('Domingo', 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservas`
--

CREATE TABLE IF NOT EXISTS `reservas` (
  `idReserva` bigint(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `apellidos` varchar(150) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `personas` tinyint(4) NOT NULL,
  `fecha` date NOT NULL,
  `identificador` varchar(20) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `telefono` int(11) NOT NULL,
  `email` varchar(80) COLLATE utf8mb4_spanish2_ci NOT NULL,
  PRIMARY KEY (`idReserva`),
  UNIQUE KEY `identificador` (`identificador`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `reservas`
--

INSERT INTO `reservas` (`idReserva`, `nombre`, `apellidos`, `personas`, `fecha`, `identificador`, `telefono`, `email`) VALUES
(1, 'Daniel', 'García', 5, '2021-01-30', '18012021235351DG5', 693202707, 'dani.garcia.decroly@gmail.com'),
(3, 'Elena', 'Prada', 1, '2021-03-20', '19012021001341EP1', 684121577, 'elenapv91@gmail.com'),
(4, 'Dani', 'García', 4, '2021-01-30', '19012021001620DG4', 693202707, 'dani.garcia.decroly@gmail.com'),
(5, 'Eva', 'Domínguez García', 6, '2021-01-30', '19012021014433ED6', 693202707, 'dani.garcia.decroly@gmail.com');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `articulo`
--
ALTER TABLE `articulo`
  ADD CONSTRAINT `articulo_ibfk_1` FOREIGN KEY (`categoria`) REFERENCES `categorias` (`nombre`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
