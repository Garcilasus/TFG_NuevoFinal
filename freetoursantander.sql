-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-01-2022 a las 15:33:52
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `freetoursantander`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulo`
--

CREATE TABLE `articulo` (
  `titulo` varchar(100) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `foto` varchar(90) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `descripcion` varchar(300) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `cuerpo` mediumtext COLLATE utf8mb4_spanish2_ci NOT NULL,
  `idArticulo` int(5) NOT NULL,
  `categoria` varchar(60) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `subcategoria` int(11) DEFAULT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

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
('	\r\ntitulo de prueba de noticia', 'pruebaArts.jpg', 'Estamos probando qué tal aparece esta pequeña descripción en las noticias', 'seguimos probando la descripcion y cuerpo de las noticias a traves de la base de datos y del PDO. Creemos que vamos por el camino correcto para la codificación de nuestra nueva y moderna página web que dejara anonadados a la gente que nos visite HOLA HOLA', 17, 'recorrido', NULL, '2020-12-29'),
('titulo de prueba de noticia', 'pruebaArts.jpg', 'Estamos probando qué tal aparece esta pequeña descripción en las noticias', 'seguimos probando la descripcion y cuerpo de las noticias a traves de la base de datos y del PDO. Creemos que vamos por el camino correcto para la codificación de nuestra nueva y moderna página web que dejara anonadados a la gente que nos visite', 18, 'curiosidades', NULL, '2021-01-11');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignacion`
--

CREATE TABLE `asignacion` (
  `id` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `idGuia` int(11) NOT NULL,
  `publico` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` tinyint(4) NOT NULL,
  `nombre` varchar(60) COLLATE utf8mb4_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

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

CREATE TABLE `contacto` (
  `idContacto` int(5) NOT NULL,
  `nombre` varchar(50) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `asunto` tinytext COLLATE utf8mb4_spanish2_ci,
  `correo` varchar(80) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `mensaje` longtext COLLATE utf8mb4_spanish2_ci NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `contacto`
--

INSERT INTO `contacto` (`idContacto`, `nombre`, `asunto`, `correo`, `mensaje`, `fecha`) VALUES
(1, 'Nombre de prueba', 'mi asunto de prueba', 'correo@gmail.com', 'hola necesito introducir 20 caracteres por lo menos para enviar este mensaje y sea atendido por vosotros', '2021-01-14'),
(2, 'Nombre de prueba', 'miAsunto', 'correo@gmail.com', 'hola necesito introducir 20 caracteres por lo menos para enviar este mensaje y sea atendido por vosotros', '2021-01-14'),
(3, 'lolaso', 'ghgfh', 'dani.garcia.decroly@gmail.com', 'hfghgggggggggggggggggggggggggggggg', '2021-01-14'),
(4, 'lolaso', 'holaholaholita', 'dani.garcia.decroly@gmail.com', 'ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff', '2021-01-14'),
(5, 'lolaso', 'Sin asunto', 'dani.garcia.decroly@gmail.com', 'llllllllllllllllllllllllllllllllllllllllllllllllllllllllllll', '2021-01-14'),
(6, 'lolaso', 'que paisa', 'dani.garcia.decroly@gmail.com', 'hola hola a ver si aquÃ­ se muestran los malditos acentos y las Ã±', '2021-01-14'),
(7, 'Fernando garcia', 'asuntito', 'dani.garcia.decroly@gmail.com', 'qué estás diciendo eñoñado', '2021-01-14'),
(8, 'Daniel', 'Necesito ayuda', 'dani.garcia.decroly@gmail.com', 'holaooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooo', '2021-01-18'),
(9, 'lolaso', 'Sin asunto', 'dani.garcia.decroly@gmail.com', '', '2021-01-19'),
(10, 'lolaso', 'Sin asunto', 'dani.garcia.decroly@gmail.com', '', '2021-01-19'),
(11, 'Joserra', 'DUDA PELUDA', 'dani.garcia.decroly@gmail.com', 'GYUUKYGKJGHKYUGYUGUYGIUYHIUOHILUHKUGKHYGBKUHBKUJBKHVKHUJBUJHBHJVHJ', '2021-03-24');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nosotros`
--

CREATE TABLE `nosotros` (
  `nombre` varchar(20) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `foto` varchar(60) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `idPersona` int(11) NOT NULL,
  `ocupacion` varchar(100) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `guia` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `nosotros`
--

INSERT INTO `nosotros` (`nombre`, `foto`, `idPersona`, `ocupacion`, `email`, `guia`) VALUES
('Diego Mazo', 'free-tour-santander-diego.jpg', 1, 'Fundador y diseñador gráfico', '', b'0'),
('Fer García', 'free-tour-santander-fer.jpg', 2, 'Fundador y profesor', '', b'1'),
('Dani García', 'free-tour-santander-dani.jpg', 3, 'CEO, webmaster y guía', 'danigarci1994@gmail.com', b'1'),
('María Ascorbe', 'free-tour-santander-maria.jpg', 5, 'Psicóloga y fotógrafa', '', b'0'),
('Luis Gutiérrez', 'free-tour-santander-luis.jpg', 20, 'Guía', 'lgbordas93@gmail.com', b'1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `parking`
--

CREATE TABLE `parking` (
  `nombre` varchar(50) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `enlace` varchar(60) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `tipo` bit(1) NOT NULL,
  `idParking` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci COMMENT='Para tipo=0 -> parking gratuito; tipo=>1 parking de pago';

--
-- Volcado de datos para la tabla `parking`
--

INSERT INTO `parking` (`nombre`, `enlace`, `tipo`, `idParking`) VALUES
('parking ayuntamiento', 'https://goo.gl/maps/nrD5U14TMcso67e58', b'1', 1),
('Interparking Esperanza', 'https://goo.gl/maps/FVBTDtxMfX4PFHm49', b'1', 2),
('Parking Alfonso XIII', 'https://goo.gl/maps/k7eiQZpc71wgBqdr9', b'1', 3),
('Aparcamiento Calle Alta', 'https://goo.gl/maps/NS2MKLv4ZoFsyg6A6', b'0', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paseos`
--

CREATE TABLE `paseos` (
  `dia` char(10) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `idDia` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

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

CREATE TABLE `reservas` (
  `idReserva` bigint(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `apellidos` varchar(150) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `personas` tinyint(4) NOT NULL,
  `fecha` date NOT NULL,
  `identificador` varchar(20) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `telefono` int(11) NOT NULL,
  `email` varchar(80) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `asignado` bit(1) NOT NULL,
  `impartido` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `reservas`
--

INSERT INTO `reservas` (`idReserva`, `nombre`, `apellidos`, `personas`, `fecha`, `identificador`, `telefono`, `email`, `asignado`, `impartido`) VALUES
(1, 'Daniel', 'Garcia ibañez', 6, '2021-01-23', '129592949592', 693202707, 'danigarci1994@gmail.com', b'0', NULL),
(2, '?', '?', 0, '0000-00-00', '?', 0, '?', b'0', NULL),
(6, 'María', 'Prada Cruz', 4, '2021-01-30', '17012021212942MP4', 0, 'mariaprada@ejemplo.com', b'0', NULL),
(11, 'Daniel', 'Ibáñez', 3, '2021-01-30', '17012021215930DI3', 0, 'dani.garcia.decroly@gmail.com', b'0', NULL),
(15, 'Josefina', 'Ceballos Brey', 3, '2021-03-27', '17012021222913JC3', 647044174, 'josefa69@gmail.com', b'0', NULL),
(16, 'Daniel', 'García Ib', 4, '2021-01-30', '17012021233236DG4', 693202707, 'danigarci1994@gmail.com', b'0', NULL),
(22, 'Elena', 'Nito del Bosque', 8, '2021-01-30', '17012021234406EN8', 693202707, 'danigarci1994@gmail.com', b'0', NULL),
(23, 'Garci', 'Lasus', 5, '2021-04-03', '22032021124319GP5', 693202707, 'dani.garcia.decroly@gmail.com', b'0', NULL),
(25, 'Lorena', 'Benito Martín', 6, '2021-03-27', '24032021200439LB6', 666666666, 'lorenabm@gmail.com', b'0', NULL),
(26, 'lorena', 'benito martin', 5, '2021-03-27', '24032021200622lb5', 666666666, 'lorenabmtrabajo@gmail.com', b'0', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `usuario` varchar(50) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `privilegio` varchar(50) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `superUser` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `password`, `privilegio`, `superUser`) VALUES
(1, 'administrador', '$2y$11$VXVe6.l2FbI8KqSyyJzsGeNEKDNIjaWABnAGaOT8snQLRYqcR5I7i', 'admin', b'1'),
(3, 'emilio', '$2y$11$RwxIDCzjjvgJIax6apKNJur3u.XX.aFt0yyjWvf3ifpWYp.mvJ.ya', 'admin', b'0'),
(4, 'pepe', '$2y$11$v/hBuI6LxfENaHK2V9cMBOtgxUWRyufmKLrfI91iTckhiWt/1R6ya', 'admin', b'0'),
(5, 'joselu', '$2y$11$1yNfn8X6OWnmtfcakadscO5Bu03wlorQAu2H3I2.pBEoQXt9LnMhC', 'editor', b'0');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `articulo`
--
ALTER TABLE `articulo`
  ADD PRIMARY KEY (`idArticulo`),
  ADD KEY `categoria` (`categoria`);

--
-- Indices de la tabla `asignacion`
--
ALTER TABLE `asignacion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nombre` (`nombre`);

--
-- Indices de la tabla `contacto`
--
ALTER TABLE `contacto`
  ADD PRIMARY KEY (`idContacto`);

--
-- Indices de la tabla `nosotros`
--
ALTER TABLE `nosotros`
  ADD PRIMARY KEY (`idPersona`);

--
-- Indices de la tabla `parking`
--
ALTER TABLE `parking`
  ADD PRIMARY KEY (`idParking`);

--
-- Indices de la tabla `paseos`
--
ALTER TABLE `paseos`
  ADD PRIMARY KEY (`idDia`);

--
-- Indices de la tabla `reservas`
--
ALTER TABLE `reservas`
  ADD PRIMARY KEY (`idReserva`),
  ADD UNIQUE KEY `identificador` (`identificador`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `articulo`
--
ALTER TABLE `articulo`
  MODIFY `idArticulo` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `asignacion`
--
ALTER TABLE `asignacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `contacto`
--
ALTER TABLE `contacto`
  MODIFY `idContacto` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `nosotros`
--
ALTER TABLE `nosotros`
  MODIFY `idPersona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `parking`
--
ALTER TABLE `parking`
  MODIFY `idParking` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `paseos`
--
ALTER TABLE `paseos`
  MODIFY `idDia` tinyint(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `reservas`
--
ALTER TABLE `reservas`
  MODIFY `idReserva` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `articulo`
--
ALTER TABLE `articulo`
  ADD CONSTRAINT `articulo_ibfk_1` FOREIGN KEY (`categoria`) REFERENCES `categorias` (`nombre`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
