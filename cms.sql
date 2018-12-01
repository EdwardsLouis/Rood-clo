-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-12-2018 a las 20:30:15
-- Versión del servidor: 10.1.30-MariaDB
-- Versión de PHP: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cms`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articles`
--

CREATE TABLE `articles` (
  `article_id` int(11) NOT NULL,
  `article_title` varchar(255) NOT NULL,
  `article_content` text NOT NULL,
  `article_timestamp` int(11) NOT NULL,
  `article_img` varchar(255) NOT NULL,
  `article_categoria` varchar(255) NOT NULL,
  `article_tallas` varchar(255) NOT NULL,
  `article_precio` int(11) NOT NULL,
  `article_genero` varchar(255) NOT NULL,
  `article_cantidad` int(11) NOT NULL,
  `article_sku` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `articles`
--

INSERT INTO `articles` (`article_id`, `article_title`, `article_content`, `article_timestamp`, `article_img`, `article_categoria`, `article_tallas`, `article_precio`, `article_genero`, `article_cantidad`, `article_sku`) VALUES
(2, 'qqwerty', 'fghjkl', 1538666111, 'ataud.png', 'Playera', 'xS', 4567, 'Mujer', 234567, '5678'),
(3, 'qwer', 'dfghjklÃ±', 1538667118, 'antilope.png', 'Playera', 'xS', 23456, 'Mujer', 34567, '3456789'),
(4, 'wertyuiop', 'rujikl,', 1538667141, 'gruÃ±osito.png', 'Playera', 'xS', 34567890, 'Mujer', 4567890, '456780'),
(5, 'qwe', '123', 1539131418, 'roodlogo.png', 'Playera', 'L', 123, 'Unisex', 123, '123'),
(6, '123', '123', 1539131434, 'antilope.png', 'Gorra', 'M', 123, 'Hombre', 123, '123'),
(7, '123', '123', 1539131450, 'gruÃ±osito.png', 'Sudadera', 'xL', 123, 'Mujer', 123, '123'),
(8, 'asd', '123', 1539131567, 'roodlogo.png', 'Sudadera', 'S', 123, 'Mujer', 123, '123'),
(9, '123', '123', 1539131584, 'antilope.png', 'Gorra', 'S', 123, 'Mujer', 23, '123'),
(10, 'qweqweq', '123', 1539131594, 'ataud.png', 'Sudadera', 'M', 123, 'Mujer', 123, '123'),
(11, 'prueba', 'qwe1<br />\r\n', 1543642676, 'ataud.png', 'Playera', 'xS', 12, 'Mujer', 123, 'q123');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `banners`
--

CREATE TABLE `banners` (
  `banner_id` int(11) NOT NULL,
  `banner_slider` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `banners`
--

INSERT INTO `banners` (`banner_id`, `banner_slider`) VALUES
(1, 'banner3.jpg'),
(2, 'banner2.jpg'),
(3, 'banner1.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `boletin`
--

CREATE TABLE `boletin` (
  `boletin_id` int(11) NOT NULL,
  `boletin_correo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `boletin`
--

INSERT INTO `boletin` (`boletin_id`, `boletin_correo`) VALUES
(1, 'asdfghj@sdfghjk.com'),
(2, 'asdfghj@sdfghjk.com'),
(3, 'asdfghj@sdfghjk.com'),
(4, 'asdfghj@sdfghjk.com'),
(5, 'asdfghj@sdfghjk.com'),
(6, 'asdfghj@sdfghjk.com'),
(7, 'asdfghj@sdfghjk.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hm`
--

CREATE TABLE `hm` (
  `hm_id` int(11) NOT NULL,
  `hm_mujer` varchar(255) NOT NULL,
  `hm_hombre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `hm`
--

INSERT INTO `hm` (`hm_id`, `hm_mujer`, `hm_hombre`) VALUES
(1, 'mujer.jpg', 'hombre.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_password`) VALUES
(1, 'admin', '5f4dcc3b5aa765d61d8327deb882cf99');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`article_id`);

--
-- Indices de la tabla `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`banner_id`);

--
-- Indices de la tabla `boletin`
--
ALTER TABLE `boletin`
  ADD PRIMARY KEY (`boletin_id`);

--
-- Indices de la tabla `hm`
--
ALTER TABLE `hm`
  ADD PRIMARY KEY (`hm_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `articles`
--
ALTER TABLE `articles`
  MODIFY `article_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `banners`
--
ALTER TABLE `banners`
  MODIFY `banner_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `boletin`
--
ALTER TABLE `boletin`
  MODIFY `boletin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `hm`
--
ALTER TABLE `hm`
  MODIFY `hm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
