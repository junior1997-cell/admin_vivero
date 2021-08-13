-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-08-2021 a las 19:39:27
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
  `nombre` text DEFAULT NULL,
  `img` text DEFAULT NULL,
  `fecha` timestamp NULL DEFAULT NULL,
  `estado` char(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `carrucel`
--

INSERT INTO `carrucel` (`idcarrucel`, `nombre`, `img`, `fecha`, `estado`) VALUES
(1, NULL, '2162818116531.mp4', NULL, '1');

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
(1, 'Ornamentales', 'OrnamentalesOrnamentalesOrnamentalesOrnamentalesOrnamentales', '2021-08-02 20:49:07', '1'),
(2, 'Arboles', 'ArbolesArbolesArbolesArbolesArbolesArbolesArbolesArbolesArboles', '2021-08-02 20:49:07', '1'),
(3, 'Flores', 'FloresFloresFloresFloresFloresFloresFloresFloresFloresFloresFlores', '2021-08-02 20:49:42', '1'),
(4, 'Rosas', 'RosasRosasRosasRosas', '2021-08-03 21:11:04', '0');

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
(1, 'naranja', '2021-08-02 20:57:09', '1'),
(2, 'rojo', '2021-08-02 20:57:21', '1'),
(3, 'amarillo', '2021-08-02 20:57:33', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contactanos`
--

CREATE TABLE `contactanos` (
  `idcontactanos` int(11) NOT NULL,
  `direccion` text DEFAULT NULL,
  `coordenadas` text DEFAULT NULL,
  `email` text DEFAULT NULL,
  `telefono` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `contactanos`
--

INSERT INTO `contactanos` (`idcontactanos`, `direccion`, `coordenadas`, `email`, `telefono`) VALUES
(1, 'Jr. Los Mártires Nro. 340', '22201', 'vivero@upeu.edu.pe', '989765321');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_venta`
--

CREATE TABLE `detalle_venta` (
  `iddetalle_venta` int(11) NOT NULL,
  `idplanta` int(11) NOT NULL,
  `idventa` int(11) NOT NULL,
  `cantidad` varchar(45) DEFAULT NULL,
  `precio_venta` decimal(11,2) DEFAULT NULL,
  `descuento` decimal(11,2) DEFAULT NULL
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

--
-- Volcado de datos para la tabla `nosotros`
--

INSERT INTO `nosotros` (`idnosotros`, `mision`, `vision`, `descripcion`, `img`, `nombre`, `objetivos`, `fecha`, `estado`) VALUES
(1, 'Aquí se especifican los  misión del vivero', 'Aquí se especifican los  visión del vivero', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit.\r\n\r\n sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.', NULL, 'VIVERO UPeU', 'Aquí se especifican los objetivos del vivero', '2021-08-02 22:20:55', '1');

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
(1, 'Escritorio', '2021-08-03 00:12:09', '1'),
(2, 'Planta', '2021-08-03 00:12:09', '1'),
(3, 'Institucion', '2021-08-03 00:12:09', '1'),
(4, 'Ventas', '2021-08-03 00:12:09', '1'),
(5, 'Acceso', '2021-08-03 00:12:09', '1'),
(6, 'Carrucel', '2021-08-03 00:12:09', '1'),
(7, 'Consulta Ventas', '2021-08-03 00:12:09', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `idpersona` int(11) NOT NULL,
  `tipo_persona` varchar(20) DEFAULT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `tipo_documento` varchar(20) DEFAULT NULL,
  `num_documento` varchar(20) DEFAULT NULL,
  `direccion` varchar(70) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL
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
  `img_1` text DEFAULT NULL,
  `img_2` text DEFAULT NULL,
  `img_3` text DEFAULT NULL,
  `precio_venta` decimal(11,2) DEFAULT NULL,
  `espcf_cuidado` text DEFAULT NULL,
  `fecha` timestamp NULL DEFAULT current_timestamp(),
  `estado` char(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `planta`
--

INSERT INTO `planta` (`idplanta`, `id_categoria`, `nombre`, `stock`, `nombre_cientifico`, `familia`, `apodo`, `descripcion`, `img_1`, `img_2`, `img_3`, `precio_venta`, `espcf_cuidado`, `fecha`, `estado`) VALUES
(1, 1, 'BEGONIA DE ÁRBOL', 0, 'Begonia x Erythrophylla', 'Begoniaceae', 'Begonias', 'Existen 1500 especies, de las que alrededor de 150, además de casi 10.000 variedades e híbridos, se comercializan para su uso en jardinería. Son oriundas de las regiones tropicales y subtropicales de América. En la actualidad se puede encontrar este arbust', '', '', '12162793814729.png', '0.00', NULL, '2021-08-02 21:02:26', '1'),
(2, 1, 'Choclo Amarillo', 10, 'Pachystachys lutea', 'Acanthaceae', 'Colita de Camarón o Choclo de Oro', 'Es ampliamente cultivada en el mundo por sus numerosas y vistosas inflorescencias. Se caracteriza por presentar tallos delgados, muy ramificados y leñosos. Los tallos (teniendo en cuenta las ramificaciones) pueden alcanzar más de 1.50 metros de altura en e', '', '8162793835224.png', '', '0.00', NULL, '2021-08-02 21:05:52', '1'),
(3, 2, 'CEBRA ORNAMENTAL', 0, 'Aphelandra squarrosa', 'Acanthaceae', 'Planta Cebra', 'Esta planta requiere mucha luz, pero no de forma directa, No florecen a menudo, pero puede ser animada a florecer por la exposición prolongada a la luz todos los días. Los excesos o déficit de agua hará que las hojas inferiores se tornen marrón y se caigan', '6162793852639.png', '', '', '0.00', NULL, '2021-08-02 21:08:45', '1'),
(4, 2, 'POMARROSA', 5, 'Syzygium jambos', 'Myrtaceae', 'perita', 'Árbol frutal de gran poder nutritivo.Puede alcanzar los 10-16 m de altura, pero en cultivo tan sólo 5-6 m, con la corteza grisácea y las ramillas rojizas. Hojas opuestas, subsentadas, recusadas, lanceoladas, muy acuminadas, de 12.5-20 cm. de longitud y 2,5', '13162793866136.png', '', '', '0.00', NULL, '2021-08-02 21:11:00', '1'),
(5, 2, 'PALMERA ABANICO', 13, 'Washingtonia robusta', 'Asparagaceae', 'Palmera Abanico Mexicana', 'Estas palmeras pueden alcanzar los 30 metros de alto y presentan hojas palmeadas (divididas en más de 50 segmentos) de hasta 2 metros de diámetro y con un largo peciolo con espinas en su borde (de color pardo rojizo); al morir las hojas éstas quedan colgan', '16162793884623.png', '', '', '0.00', NULL, '2021-08-02 21:14:06', '1'),
(6, 3, 'ORQUÍDEA DE TIERRA', 32, 'Orchidaceae', 'Asparagaceae', 'Orquídeas', 'Las orquídeas terrestres, o las orquídeas de tierra, son aquellas que crecen en la tierra debido a que sus raíces crecen debajo de ésta, y por ello sus tallos suelen ser más erguidos. De esta manera, obtienen los nutrientes y el agua que', '4162793893729.png', '', '', '0.00', NULL, '2021-08-02 21:15:37', '1'),
(7, 3, 'BUGANVILIAS', 32, 'Bougainvillea', 'Nyctaginaceae', 'Flor de Papel o Papelillo', 'Son enredaderas de porte arbustivo que miden de 1 hasta 12 m de altura, y que crecen en cualquier terreno. Se enredan en otras plantas usando sus afiladas púas que tienen la punta cubierta de una sustancia cerosa negra. Son plantas si', '29162793912218.png', '55162793912279.png', '10162793912230.png', '0.00', NULL, '2021-08-02 21:18:41', '1'),
(8, 3, 'MUSSAENDA', 3, 'Mussaenda philippica', 'Convolvulaceae', 'Moxandra', 'Es un arbusto trepador semidesciduo, con varios tallos, cubierto de hojas opuestas de color verde medio a oscuro, redondeadas a ovadas, de 3 a 6 pulgadas de largo, pubescentes y fuertemente. Alcanza un tamaño de 12 m de altura, se encuentra en la selva de las tierras bajas caducifolia; Las flores tropicales tienen un color crema, amarillo o naranja con una corola roja. Presenta hojas ovadas de color verde intenso, pubescentes e con nervaduras evidentes, largas 8-15 cm.', '13162803316431.webp', '55162793912279.png', '', '0.00', NULL, '2021-08-03 23:26:03', '1'),
(9, 1, 'plantanueva', 32, 'Aphelandra squarrosa', 'Acanthaceae', 'Plantota', 'PlantotaPlantotaPlantotaPlantotaPlantotaPlantotaPlantotaPlantotaPlantotaPlantota', '6162818055526.webp', '', '', '43.00', NULL, '2021-08-05 16:22:34', '1'),
(10, 1, 'LENGUA DE SUEGRA', 32, 'Dracaena trifasciata', 'Sansevieras', 'Sansevieras', 'Plantas caulescentes. Las hojas 1–2 (–6), erectas, linear-lanceoladas, hasta 140 cm de largo y 4–10 cm de ancho, agudas, rígidas, verde oscuro con líneas transversales verde más pálido, los márgenes enteros, verdes o a veces amarillos. La inflorescencia racimosa, ocasionalmente ramificada, de 50–80 cm de largo, no sobrepasando a las hojas, flores 3–8 en fascículos solitarios o agrupados, blanco verdosas, 15–30 mm de largo; tubo del perianto casi de 5 mm de largo, lobos lineares.', '20162878100741.webp', '', '', '20.00', NULL, '2021-08-12 15:10:06', '1'),
(11, 1, 'LENGUA DE SUEGRA', 32, 'Dracaena trifasciata', 'Sansevieras', 'Sansevieras', 'Plantas caulescentes. Las hojas 1–2 (–6), erectas, linear-lanceoladas, hasta 140 cm de largo y 4–10 cm de ancho, agudas, rígidas, verde oscuro con líneas transversales verde más pálido, los márgenes enteros, verdes o a veces amarillos. La inflorescencia racimosa, ocasionalmente ramificada, de 50–80 cm de largo, no sobrepasando a las hojas, flores 3–8 en fascículos solitarios o agrupados, blanco verdosas, 15–30 mm de largo; tubo del perianto casi de 5 mm de largo, lobos lineares.', '19162878101726.webp', '', '', '20.00', NULL, '2021-08-12 15:10:16', '1'),
(12, 1, 'LENGUA DE SUEGRA', 32, 'Dracaena trifasciata', 'Asparagaceae', 'Sansevieras', 'Plantas caulescentes. Las hojas 1–2 (–6), erectas, linear-lanceoladas, hasta 140 cm de largo y 4–10 cm de ancho, agudas, rígidas, verde oscuro con líneas transversales verde más pálido, los márgenes enteros, verdes o a veces amarillos. La inflorescencia racimosa, ocasionalmente ramificada, de 50–80 cm de largo, no sobrepasando a las hojas, flores 3–8 en fascículos solitarios o agrupados, blanco verdosas, 15–30 mm de largo; tubo del perianto casi de 5 mm de largo, lobos lineares.', '8162878107939.webp', '', '', '43.00', NULL, '2021-08-12 15:11:18', '1');

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
(1, 3, 1, '2021-08-04 23:59:08', '1'),
(2, 3, 2, '2021-08-04 23:59:08', '1'),
(3, 3, 3, '2021-08-04 23:59:08', '1'),
(4, 9, 1, '2021-08-05 16:22:34', '1'),
(5, 9, 2, '2021-08-05 16:22:34', '1'),
(6, 9, 3, '2021-08-05 16:22:34', '1'),
(7, 12, 1, '2021-08-12 15:11:19', '1');

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

--
-- Volcado de datos para la tabla `plantaimg`
--

INSERT INTO `plantaimg` (`idplantaimg`, `id_planta`, `img`, `prioridad`, `fecha`, `estado`) VALUES
(1, 1, '12162793814729.png', 'p1', '2021-08-02 21:02:26', '1'),
(2, 2, '8162793835224.png', 'p1', '2021-08-02 21:05:52', '1'),
(3, 3, '6162793852639.png', 'p1', '2021-08-02 21:08:45', '1'),
(4, 4, '13162793866136.png', 'p1', '2021-08-02 21:11:00', '1'),
(5, 5, '16162793884623.png', 'p1', '2021-08-02 21:14:06', '1'),
(6, 6, '4162793893729.png', 'p1', '2021-08-02 21:15:37', '1'),
(7, 7, '10162793912230.png', 'p1', '2021-08-02 21:18:41', '1'),
(8, 7, '55162793912279.png', 's2', '2021-08-02 21:18:41', '1'),
(9, 7, '29162793912218.png', 's2', '2021-08-02 21:18:41', '1'),
(10, 8, '13162803316431.webp', 'p1', '2021-08-03 23:26:03', '1');

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
  `clave` varchar(65) DEFAULT NULL,
  `imagen` text DEFAULT NULL,
  `condicion` char(1) DEFAULT '1',
  `fecha` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idusuario`, `nombre`, `tipo_documento`, `num_documento`, `direccion`, `telefono`, `email`, `cargo`, `login`, `clave`, `imagen`, `condicion`, `fecha`) VALUES
(1, 'admin', NULL, NULL, NULL, NULL, NULL, NULL, 'admin', '123', NULL, '1', '2021-08-02 23:21:44');

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
(16, 1, 1, '2021-08-03 00:15:20'),
(17, 2, 1, '2021-08-03 00:15:20'),
(18, 3, 1, '2021-08-03 00:15:20'),
(19, 4, 1, '2021-08-03 00:15:20'),
(20, 5, 1, '2021-08-03 00:15:20'),
(21, 6, 1, '2021-08-03 00:15:20'),
(22, 7, 1, '2021-08-03 00:15:20');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

CREATE TABLE `venta` (
  `idventa` int(11) NOT NULL,
  `idcliente` int(11) NOT NULL,
  `idusuario` int(11) NOT NULL,
  `tipo_comprobante` varchar(20) DEFAULT NULL,
  `serie_comprobante` varchar(7) DEFAULT NULL,
  `num_comprobante` varchar(10) DEFAULT NULL,
  `fecha_hora` datetime DEFAULT NULL,
  `impuesto` decimal(4,2) DEFAULT NULL,
  `total_venta` decimal(11,2) DEFAULT NULL,
  `estado` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `whatsapp`
--

CREATE TABLE `whatsapp` (
  `idwhatsapp` int(11) NOT NULL,
  `numero` varchar(15) DEFAULT NULL,
  `estado` char(1) DEFAULT '1',
  `fecha` datetime DEFAULT current_timestamp()
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
-- Indices de la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  ADD PRIMARY KEY (`iddetalle_venta`),
  ADD KEY `fk_detalle_venta_planta1_idx` (`idplanta`),
  ADD KEY `fk_detalle_venta_venta1_idx` (`idventa`);

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
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`idpersona`);

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
-- Indices de la tabla `venta`
--
ALTER TABLE `venta`
  ADD PRIMARY KEY (`idventa`),
  ADD KEY `fk_venta_persona1_idx` (`idcliente`),
  ADD KEY `fk_venta_usuario1_idx` (`idusuario`);

--
-- Indices de la tabla `whatsapp`
--
ALTER TABLE `whatsapp`
  ADD PRIMARY KEY (`idwhatsapp`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `carrucel`
--
ALTER TABLE `carrucel`
  MODIFY `idcarrucel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `idcategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `color`
--
ALTER TABLE `color`
  MODIFY `idcolor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `contactanos`
--
ALTER TABLE `contactanos`
  MODIFY `idcontactanos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  MODIFY `iddetalle_venta` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `nosotros`
--
ALTER TABLE `nosotros`
  MODIFY `idnosotros` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `permiso`
--
ALTER TABLE `permiso`
  MODIFY `idpermiso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
  MODIFY `idpersona` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `planta`
--
ALTER TABLE `planta`
  MODIFY `idplanta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `plantacolor`
--
ALTER TABLE `plantacolor`
  MODIFY `idplantacolor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `plantaimg`
--
ALTER TABLE `plantaimg`
  MODIFY `idplantaimg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `usuario_permiso`
--
ALTER TABLE `usuario_permiso`
  MODIFY `idusuario_permiso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `venta`
--
ALTER TABLE `venta`
  MODIFY `idventa` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `whatsapp`
--
ALTER TABLE `whatsapp`
  MODIFY `idwhatsapp` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  ADD CONSTRAINT `fk_detalle_venta_planta1` FOREIGN KEY (`idplanta`) REFERENCES `planta` (`idplanta`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_detalle_venta_venta1` FOREIGN KEY (`idventa`) REFERENCES `venta` (`idventa`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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

--
-- Filtros para la tabla `venta`
--
ALTER TABLE `venta`
  ADD CONSTRAINT `fk_venta_persona1` FOREIGN KEY (`idcliente`) REFERENCES `persona` (`idpersona`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_venta_usuario1` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`idusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
