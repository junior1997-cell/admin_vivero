-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-08-2021 a las 22:24:16
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
  `descripcion` text DEFAULT NULL,
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
-- Estructura de tabla para la tabla `contactanos`
--

CREATE TABLE `contactanos` (
  `idcontactanos` int(11) NOT NULL,
  `direccion` text DEFAULT NULL,
  `coordenadas` text DEFAULT NULL,
  `email` text DEFAULT NULL
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
  `nombre` text DEFAULT NULL,
  `objetivos` text DEFAULT NULL,
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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `planta`
--

CREATE TABLE `planta` (
  `idplanta` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `nombre` text DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  `nombre_cientifico` text DEFAULT NULL,
  `familia` text DEFAULT NULL,
  `apodo` text DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `fecha` timestamp NULL DEFAULT current_timestamp(),
  `estado` char(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plantacolor`
--

CREATE TABLE `plantacolor` (
  `idplantacolor` int(11) NOT NULL,
  `id_planta` int(11) NOT NULL,
  `id_color` int(11) NOT NULL,
  `fecha` timestamp NULL DEFAULT current_timestamp(),
  `estado` char(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plantaimg`
--

CREATE TABLE `plantaimg` (
  `idplantaimg` int(11) NOT NULL,
  `id_planta` int(11) NOT NULL,
  `img` text DEFAULT NULL,
  `prioridad` varchar(3) DEFAULT NULL,
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
-- Indices de la tabla `contactanos`
--
ALTER TABLE `contactanos`
  ADD PRIMARY KEY (`idcontactanos`);

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
  ADD KEY `fk_planta_categoria_idx` (`id_categoria`);

--
-- Indices de la tabla `plantacolor`
--
ALTER TABLE `plantacolor`
  ADD PRIMARY KEY (`idplantacolor`),
  ADD KEY `fk_plantacolor_planta1_idx` (`id_planta`),
  ADD KEY `fk_plantacolor_color1_idx` (`id_color`);

--
-- Indices de la tabla `plantaimg`
--
ALTER TABLE `plantaimg`
  ADD PRIMARY KEY (`idplantaimg`),
  ADD KEY `fk_plantaimg_planta1_idx` (`id_planta`);

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
-- AUTO_INCREMENT de la tabla `contactanos`
--
ALTER TABLE `contactanos`
  MODIFY `idcontactanos` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `nosotros`
--
ALTER TABLE `nosotros`
  MODIFY `idnosotros` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `permiso`
--
ALTER TABLE `permiso`
  MODIFY `idpermiso` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `planta`
--
ALTER TABLE `planta`
  MODIFY `idplanta` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `plantacolor`
--
ALTER TABLE `plantacolor`
  MODIFY `idplantacolor` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `plantaimg`
--
ALTER TABLE `plantaimg`
  MODIFY `idplantaimg` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuario_permiso`
--
ALTER TABLE `usuario_permiso`
  MODIFY `idusuario_permiso` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `planta`
--
ALTER TABLE `planta`
  ADD CONSTRAINT `fk_planta_categoria` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`idcategoria`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `plantacolor`
--
ALTER TABLE `plantacolor`
  ADD CONSTRAINT `fk_plantacolor_color1` FOREIGN KEY (`id_color`) REFERENCES `color` (`idcolor`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_plantacolor_planta1` FOREIGN KEY (`id_planta`) REFERENCES `planta` (`idplanta`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `plantaimg`
--
ALTER TABLE `plantaimg`
  ADD CONSTRAINT `fk_plantaimg_planta1` FOREIGN KEY (`id_planta`) REFERENCES `planta` (`idplanta`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
