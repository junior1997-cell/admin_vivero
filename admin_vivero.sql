-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-07-2021 a las 03:30:56
-- Versión del servidor: 10.4.19-MariaDB
-- Versión de PHP: 7.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `admin_vivero`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrucel`
--

CREATE TABLE `carrucel` (
  `idcarrucel` int(11) NOT NULL,
  `img` text DEFAULT NULL,
  `categoria` varchar(50) DEFAULT NULL,
  `fecha` timestamp NULL DEFAULT NULL,
  `estado` char(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `idcategoria` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `fecha` timestamp NULL DEFAULT current_timestamp(),
  `estado` char(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `color`
--

CREATE TABLE `color` (
  `idcolor` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `fecha` timestamp NULL DEFAULT current_timestamp(),
  `estado` char(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nosotros`
--

CREATE TABLE `nosotros` (
  `idnosotros` int(11) NOT NULL,
  `mision` text DEFAULT NULL,
  `vision` text DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `img` text DEFAULT NULL,
  `fecha` timestamp NULL DEFAULT current_timestamp(),
  `estado` char(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `planta`
--

CREATE TABLE `planta` (
  `idplanta` int(11) NOT NULL,
  `categoria_idcategoria` int(11) NOT NULL,
  `color_idcolor` int(11) NOT NULL,
  `nombre` text DEFAULT NULL,
  `nombre_cientifico` text DEFAULT NULL,
  `familia` text DEFAULT NULL,
  `apodo` text DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `img` text DEFAULT NULL,
  `fecha` timestamp NULL DEFAULT current_timestamp(),
  `estado` char(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `iduser` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `apellidos` varchar(50) DEFAULT NULL,
  `dni` varchar(9) DEFAULT NULL,
  `direccion` text DEFAULT NULL,
  `celular` varchar(15) DEFAULT NULL,
  `correo` text DEFAULT NULL,
  `img` text DEFAULT NULL,
  `usuario` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `fecha` timestamp NULL DEFAULT NULL,
  `estado` char(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`iduser`, `nombre`, `apellidos`, `dni`, `direccion`, `celular`, `correo`, `img`, `usuario`, `password`, `fecha`, `estado`) VALUES
(1, 'Mirella', 'Huamán Cambizan', '75867666', 'Jr. Los abalodes #213', '932 921 121', 'mirella@upeu.edu.pe', 'prima.jpg', 'mirella', '123', '2021-07-27 19:02:38', '1'),
(2, 'Mirella', 'Huamán Cambizan', '75867666', 'Jr. Los abalodes #213', '932 921 121', 'mirella@upeu.edu.pe', 'prima.jpg', 'mirella', '123', '2021-07-27 19:02:38', '1'),
(3, 'Mirella', 'Huamán Cambizan', '75867666', 'Jr. Los abalodes #213', '932 921 121', 'mirella@upeu.edu.pe', 'prima.jpg', 'mirella', '123', '2021-07-27 19:02:38', '1'),
(4, 'Mirella', 'Huamán Cambizan', '75867666', 'Jr. Los abalodes #213', '932 921 121', 'mirella@upeu.edu.pe', 'prima.jpg', 'mirella', '123', '2021-07-27 19:02:38', '1'),
(5, 'Mirella', 'Huamán Cambizan', '75867666', 'Jr. Los abalodes #213', '932 921 121', 'mirella@upeu.edu.pe', 'prima.jpg', 'mirella', '123', '2021-07-27 19:02:38', '1'),
(6, 'Mirella', 'Huamán Cambizan', '75867666', 'Jr. Los abalodes #213', '932 921 121', 'mirella@upeu.edu.pe', 'prima.jpg', 'mirella', '123', '2021-07-27 19:02:38', '1'),
(7, 'Mirella', 'Huamán Cambizan', '75867666', 'Jr. Los abalodes #213', '932 921 121', 'mirella@upeu.edu.pe', 'prima.jpg', 'mirella', '123', '2021-07-27 19:02:38', '1'),
(8, 'Mirella', 'Huamán Cambizan', '75867666', 'Jr. Los abalodes #213', '932 921 121', 'mirella@upeu.edu.pe', 'prima.jpg', 'mirella', '123', '2021-07-27 19:02:38', '1'),
(9, 'Mirella', 'Huamán Cambizan', '75867666', 'Jr. Los abalodes #213', '932 921 121', 'mirella@upeu.edu.pe', 'prima.jpg', 'mirella', '123', '2021-07-27 19:02:38', '1'),
(10, 'Mirella', 'Huamán Cambizan', '75867666', 'Jr. Los abalodes #213', '932 921 121', 'mirella@upeu.edu.pe', 'prima.jpg', 'mirella', '123', '2021-07-27 19:02:38', '1'),
(11, 'Mirella', 'Huamán Cambizan', '75867666', 'Jr. Los abalodes #213', '932 921 121', 'mirella@upeu.edu.pe', 'prima.jpg', 'mirella', '123', '2021-07-27 19:02:38', '1'),
(12, 'Mirella', 'Huamán Cambizan', '75867666', 'Jr. Los abalodes #213', '932 921 121', 'mirella@upeu.edu.pe', 'prima.jpg', 'mirella', '123', '2021-07-27 19:02:38', '1'),
(13, 'Mirella', 'Huamán Cambizan', '75867666', 'Jr. Los abalodes #213', '932 921 121', 'mirella@upeu.edu.pe', 'prima.jpg', 'mirella', '123', '2021-07-27 19:02:38', '1'),
(14, 'Mirella', 'Huamán Cambizan', '75867666', 'Jr. Los abalodes #213', '932 921 121', 'mirella@upeu.edu.pe', 'prima.jpg', 'mirella', '123', '2021-07-27 19:02:38', '1'),
(15, 'Mirella', 'Huamán Cambizan', '75867666', 'Jr. Los abalodes #213', '932 921 121', 'mirella@upeu.edu.pe', 'prima.jpg', 'mirella', '123', '2021-07-27 19:02:38', '1'),
(16, 'Mirella', 'Huamán Cambizan', '75867666', 'Jr. Los abalodes #213', '932 921 121', 'mirella@upeu.edu.pe', 'prima.jpg', 'mirella', '123', '2021-07-27 19:02:38', '1'),
(17, 'Mirella', 'Huamán Cambizan', '75867666', 'Jr. Los abalodes #213', '932 921 121', 'mirella@upeu.edu.pe', 'prima.jpg', 'mirella', '123', '2021-07-27 19:02:38', '1'),
(18, 'Mirella', 'Huamán Cambizan', '75867666', 'Jr. Los abalodes #213', '932 921 121', 'mirella@upeu.edu.pe', 'prima.jpg', 'mirella', '123', '2021-07-27 19:02:38', '1'),
(19, 'Mirella', 'Huamán Cambizan', '75867666', 'Jr. Los abalodes #213', '932 921 121', 'mirella@upeu.edu.pe', 'prima.jpg', 'mirella', '123', '2021-07-27 19:02:38', '1'),
(20, 'Mirella 20', 'Huamán Cambizan', '75867666', 'Jr. Los abalodes #213', '932 921 121', 'mirella@upeu.edu.pe', 'prima.jpg', 'mirella', '123', '2021-07-27 19:02:38', '1'),
(21, 'Mirella 21', 'Huamán Cambizan', '75867666', 'Jr. Los abalodes #213', '932 921 121', 'mirella@upeu.edu.pe', 'prima.jpg', 'mirella', '123', '2021-07-27 19:02:38', '1'),
(22, 'Mirella 22', 'Huamán Cambizan', '75867666', 'Jr. Los abalodes #213', '932 921 121', 'mirella@upeu.edu.pe', 'prima.jpg', 'mirella', '123', '2021-07-27 19:02:38', '1');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carrucel`
--
ALTER TABLE `carrucel`
  ADD PRIMARY KEY (`idcarrucel`);

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`idcategoria`);

--
-- Indices de la tabla `color`
--
ALTER TABLE `color`
  ADD PRIMARY KEY (`idcolor`);

--
-- Indices de la tabla `nosotros`
--
ALTER TABLE `nosotros`
  ADD PRIMARY KEY (`idnosotros`);

--
-- Indices de la tabla `planta`
--
ALTER TABLE `planta`
  ADD PRIMARY KEY (`idplanta`),
  ADD KEY `fk_planta_categoria_idx` (`categoria_idcategoria`),
  ADD KEY `fk_planta_color1_idx` (`color_idcolor`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`iduser`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `carrucel`
--
ALTER TABLE `carrucel`
  MODIFY `idcarrucel` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `idcategoria` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `color`
--
ALTER TABLE `color`
  MODIFY `idcolor` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `nosotros`
--
ALTER TABLE `nosotros`
  MODIFY `idnosotros` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `planta`
--
ALTER TABLE `planta`
  MODIFY `idplanta` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `planta`
--
ALTER TABLE `planta`
  ADD CONSTRAINT `fk_planta_categoria` FOREIGN KEY (`categoria_idcategoria`) REFERENCES `categoria` (`idcategoria`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_planta_color1` FOREIGN KEY (`color_idcolor`) REFERENCES `color` (`idcolor`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
