-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-07-2021 a las 14:45:39
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

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`idcategoria`, `nombre`, `descripcion`, `fecha`, `estado`) VALUES
(1, 'ornamnetal', 'bonnita', '2021-07-29 02:42:23', '1'),
(2, 'arboles', 'eee', '2021-07-29 05:35:10', '1');

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

--
-- Volcado de datos para la tabla `color`
--

INSERT INTO `color` (`idcolor`, `nombre`, `fecha`, `estado`) VALUES
(1, 'rojo', '2021-07-29 02:38:26', '1'),
(2, 'verde', '2021-07-29 02:38:33', '1'),
(3, 'amarillo', '2021-07-29 02:39:15', '1'),
(4, 'rosado', '2021-07-29 02:39:24', '1'),
(5, 'anaranjado', '2021-07-29 04:09:01', '1'),
(6, 'fuccia', '2021-07-29 04:09:07', '1');

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
  `id_categoria` int(11) NOT NULL,
  `nombre` text DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  `nombre_cientifico` text DEFAULT NULL,
  `familia` text DEFAULT NULL,
  `apodo` text DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `img` text DEFAULT NULL,
  `fecha` timestamp NULL DEFAULT current_timestamp(),
  `estado` char(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `planta`
--

INSERT INTO `planta` (`idplanta`, `id_categoria`, `nombre`, `stock`, `nombre_cientifico`, `familia`, `apodo`, `descripcion`, `img`, `fecha`, `estado`) VALUES
(11, 1, '', 0, '', '', '', '', '', '2021-07-29 06:09:06', '1'),
(12, 1, '', 0, '', '', '', '', '', '2021-07-29 06:09:47', '1'),
(24, 1, '', 0, '', '', '', '', '', '2021-07-29 07:14:45', '1'),
(25, 1, '', 0, '', '', '', '', '', '2021-07-29 07:16:45', '1'),
(26, 1, '', 0, '', '', '', '', '', '2021-07-29 07:19:13', '1'),
(27, 1, '', 0, '', '', '', '', '', '2021-07-29 07:19:21', '1'),
(28, 2, '', 0, '', '', '', '', '', '2021-07-29 07:19:36', '1'),
(29, 1, '', 0, '', '', '', '', '', '2021-07-29 07:20:27', '1'),
(30, 1, '', 0, '', '', '', '', '', '2021-07-29 07:20:58', '1'),
(31, 2, 'rosa', 2, 'rositis drimater', 'rositis', 'tropida', '', '', '2021-07-29 07:26:36', '1'),
(32, 2, 'rosa', 2, 'rositis drimater', 'rositis', 'tropida', '', '', '2021-07-29 07:27:01', '1'),
(33, 2, 'rosa', 2, 'rositis drimater', 'rositis', 'tropida', '', '', '2021-07-29 07:27:07', '1'),
(34, 2, 'rosa', 21, 'rositis drimater', 'rositis', 'tropida', 'soy chivoooo', '', '2021-07-29 07:28:41', '1'),
(35, 1, 'rosa', 0, '', '', '', '', '', '2021-07-29 07:31:37', '1'),
(36, 1, '', 0, '', '', '', '', '', '2021-07-29 07:31:57', '1'),
(37, 1, '', 0, '', '', '', '', '', '2021-07-29 07:32:23', '1'),
(38, 1, '', 0, '', '', '', '', '', '2021-07-29 07:34:37', '1'),
(39, 1, '', 0, '', '', '', '', '', '2021-07-29 07:35:23', '1');

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

--
-- Volcado de datos para la tabla `plantacolor`
--

INSERT INTO `plantacolor` (`idplantacolor`, `id_planta`, `id_color`, `fecha`, `estado`) VALUES
(2, 35, 1, '2021-07-29 07:31:37', '1'),
(3, 35, 2, '2021-07-29 07:31:38', '1'),
(4, 35, 4, '2021-07-29 07:31:38', '1'),
(5, 35, 5, '2021-07-29 07:31:38', '1'),
(6, 35, 6, '2021-07-29 07:31:38', '1'),
(7, 36, 1, '2021-07-29 07:31:57', '1'),
(8, 36, 2, '2021-07-29 07:31:57', '1'),
(9, 36, 4, '2021-07-29 07:31:57', '1'),
(10, 36, 5, '2021-07-29 07:31:57', '1'),
(11, 36, 6, '2021-07-29 07:31:57', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plantaimg`
--

CREATE TABLE `plantaimg` (
  `idplantaimg` int(11) NOT NULL,
  `id_planta` int(11) NOT NULL,
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
(1, 'Mirella Huamana Camizan', '12345678', '75867666', 'Jr. Los abalodes #213', '932 921 121', 'mirella@upeu.edu.pe', 'ADMINISTRADORA', 'admin', '123', 'mirella.jpg', '1', '2021-07-28 17:44:10'),
(2, 'Mirella', 'Huamán Cambizan', '75867666', 'Jr. Los abalodes #213', '932 921 121', 'mirella@upeu.edu.pe', 'mirella.jpg', 'mirella', '123', 'prima.jpg', '1', '2021-07-28 17:44:10'),
(3, 'Mirella', 'Huamán Cambizan', '75867666', 'Jr. Los abalodes #213', '932 921 121', 'mirella@upeu.edu.pe', 'mirella.jpg', 'mirella', '123', 'prima.jpg', '1', '2021-07-28 17:44:10'),
(60, 'aaaaaaaaaaaaa', 'aaaaaaaaaaaa', '', 'aaaaaaaaaa', 'aaaaaaaa', 'aaaaaaaaaa', '', 'aaaaaaaaa', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e99', 'prima.jpg', '1', '2021-07-28 17:44:10'),
(61, 'aaa', 'DNI', 'aaaaa', '', '', '', '', 'aaaaa', 'f2aca93b80cae681221f0445fa4e2cae8a1f9f8fa1e1741d96', '', '1', '2021-07-29 06:11:01');

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
(7, 7, 1, '2021-07-28 23:05:25'),
(8, 1, 61, '2021-07-29 06:11:01'),
(9, 2, 61, '2021-07-29 06:11:01'),
(10, 3, 61, '2021-07-29 06:11:01'),
(11, 4, 61, '2021-07-29 06:11:02'),
(12, 5, 61, '2021-07-29 06:11:02'),
(13, 6, 61, '2021-07-29 06:11:02'),
(14, 7, 61, '2021-07-29 06:11:02');

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
  MODIFY `idcategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `color`
--
ALTER TABLE `color`
  MODIFY `idcolor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
  MODIFY `idplanta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT de la tabla `plantacolor`
--
ALTER TABLE `plantacolor`
  MODIFY `idplantacolor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `plantaimg`
--
ALTER TABLE `plantaimg`
  MODIFY `idplantaimg` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT de la tabla `usuario_permiso`
--
ALTER TABLE `usuario_permiso`
  MODIFY `idusuario_permiso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

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
