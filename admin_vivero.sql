-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-07-2021 a las 01:45:18
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
-- Estructura de tabla para la tabla `permiso`
--

CREATE TABLE `permiso` (
  `idpermiso` int(11) NOT NULL,
  `nombre` varchar(30) DEFAULT NULL,
  `fecha` timestamp NULL DEFAULT current_timestamp(),
  `estado` char(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `permiso`
--

INSERT INTO `permiso` (`idpermiso`, `nombre`, `fecha`, `estado`) VALUES
(1, 'Escritorio', '2021-07-28 23:00:00', '1'),
(2, 'Almacen', '2021-07-28 23:00:00', '1'),
(3, 'Compras', '2021-07-28 23:00:00', '1'),
(4, 'Ventas', '2021-07-28 23:00:00', '1'),
(5, 'Acceso', '2021-07-28 23:00:00', '1'),
(6, 'Consulta Compras', '2021-07-28 23:00:00', '1'),
(7, 'Consulta Ventas', '2021-07-28 23:00:00', '1');

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
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idusuario` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `tipo_documento` varchar(50) DEFAULT NULL,
  `num_documento` varchar(9) DEFAULT NULL,
  `direccion` text DEFAULT NULL,
  `telefono` varchar(15) DEFAULT NULL,
  `email` text DEFAULT NULL,
  `cargo` text DEFAULT NULL,
  `login` varchar(50) DEFAULT NULL,
  `clave` varchar(50) DEFAULT NULL,
  `imagen` text DEFAULT NULL,
  `condicion` char(1) DEFAULT '1',
  `fecha` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idusuario`, `nombre`, `tipo_documento`, `num_documento`, `direccion`, `telefono`, `email`, `cargo`, `login`, `clave`, `imagen`, `condicion`, `fecha`) VALUES
(1, 'Mirella Huamana Camizan', '12345678', '75867666', 'Jr. Los abalodes #213', '932 921 121', 'mirella@upeu.edu.pe', 'prima.jpg', 'admin', '123', 'prima.jpg', '1', '2021-07-28 17:44:10'),
(2, 'Mirella', 'Huamán Cambizan', '75867666', 'Jr. Los abalodes #213', '932 921 121', 'mirella@upeu.edu.pe', 'prima.jpg', 'mirella', '123', 'prima.jpg', '1', '2021-07-28 17:44:10'),
(3, 'Mirella', 'Huamán Cambizan', '75867666', 'Jr. Los abalodes #213', '932 921 121', 'mirella@upeu.edu.pe', 'prima.jpg', 'mirella', '123', 'prima.jpg', '1', '2021-07-28 17:44:10'),
(60, 'aaaaaaaaaaaaa', 'aaaaaaaaaaaa', '', 'aaaaaaaaaa', 'aaaaaaaa', 'aaaaaaaaaa', '', 'aaaaaaaaa', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e99', 'prima.jpg', '1', '2021-07-28 17:44:10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_permiso`
--

CREATE TABLE `usuario_permiso` (
  `idusuario_permiso` int(11) NOT NULL,
  `idpermiso` int(11) NOT NULL,
  `idusuario` int(11) NOT NULL,
  `fecha` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario_permiso`
--

INSERT INTO `usuario_permiso` (`idusuario_permiso`, `idpermiso`, `idusuario`, `fecha`) VALUES
(1, 1, 1, '2021-07-28 23:05:25'),
(2, 2, 1, '2021-07-28 23:05:25'),
(3, 3, 1, '2021-07-28 23:05:25'),
(4, 4, 1, '2021-07-28 23:05:25'),
(5, 5, 1, '2021-07-28 23:05:25'),
(6, 6, 1, '2021-07-28 23:05:25'),
(7, 7, 1, '2021-07-28 23:05:25');

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
-- Indices de la tabla `permiso`
--
ALTER TABLE `permiso`
  ADD PRIMARY KEY (`idpermiso`);

--
-- Indices de la tabla `planta`
--
ALTER TABLE `planta`
  ADD PRIMARY KEY (`idplanta`),
  ADD KEY `fk_planta_categoria_idx` (`categoria_idcategoria`),
  ADD KEY `fk_planta_color1_idx` (`color_idcolor`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idusuario`);

--
-- Indices de la tabla `usuario_permiso`
--
ALTER TABLE `usuario_permiso`
  ADD PRIMARY KEY (`idusuario_permiso`),
  ADD KEY `fk_usuario_permiso_permiso1_idx` (`idpermiso`),
  ADD KEY `fk_usuario_permiso_usuario1_idx` (`idusuario`);

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
-- AUTO_INCREMENT de la tabla `permiso`
--
ALTER TABLE `permiso`
  MODIFY `idpermiso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `planta`
--
ALTER TABLE `planta`
  MODIFY `idplanta` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT de la tabla `usuario_permiso`
--
ALTER TABLE `usuario_permiso`
  MODIFY `idusuario_permiso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `planta`
--
ALTER TABLE `planta`
  ADD CONSTRAINT `fk_planta_categoria` FOREIGN KEY (`categoria_idcategoria`) REFERENCES `categoria` (`idcategoria`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_planta_color1` FOREIGN KEY (`color_idcolor`) REFERENCES `color` (`idcolor`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuario_permiso`
--
ALTER TABLE `usuario_permiso`
  ADD CONSTRAINT `fk_usuario_permiso_permiso1` FOREIGN KEY (`idpermiso`) REFERENCES `permiso` (`idpermiso`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_usuario_permiso_usuario1` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`idusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
