-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-09-2021 a las 15:24:01
-- Versión del servidor: 10.4.18-MariaDB
-- Versión de PHP: 7.3.28

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
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `idcomentarios` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `sexo` char(1) DEFAULT NULL,
  `comentario` text DEFAULT NULL,
  `id_planta` int(11) DEFAULT NULL,
  `estado` char(1) NOT NULL DEFAULT '1',
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `comentarios`
--

INSERT INTO `comentarios` (`idcomentarios`, `nombre`, `sexo`, `comentario`, `id_planta`, `estado`, `fecha`) VALUES
(1, 'Junior Cercado', '1', ' No sólo tiene una colección de orquídeas espectaculares, también una diversidad de plantas y una vista espectacular. ¡Recomendado!', 14, '1', '2021-08-31 22:36:43'),
(2, 'Liseth Mirella', '0', ' No sólo tiene una colección de orquídeas espectaculares, también una diversidad de plantas y una vista espectacular. ¡Recomendado!', 14, '1', '2021-08-31 22:37:16'),
(6, 'Jhon', '1', ' Impresionante la cantidad y variedad de ORQUÍDEA, bromelias y algunas plantas carnívoras, te orientan para poder mantener y conservar las plantas que adquieres, demás te entregan un comprobante para que la autoridad forestal te autorice transportar hasta tu destino, personal muy bien preparado que te orienta el origen de las orquídeas y el tiempo de duraciónsegun sea una híbrida o una planta natural originaria o nativa', 14, '1', '2021-08-31 23:02:02'),
(7, 'Mirella', '0', ' Impresionante la cantidad y variedad de ORQUÍDEA, bromelias y algunas plantas carnívoras', 13, '1', '2021-08-31 23:04:50');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`idcomentarios`),
  ADD KEY `fk_comentarios_planta1_idx` (`id_planta`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `idcomentarios` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD CONSTRAINT `fk_comentarios_planta1` FOREIGN KEY (`id_planta`) REFERENCES `planta` (`idplanta`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
