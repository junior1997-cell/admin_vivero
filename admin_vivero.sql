-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 02, 2021 at 04:07 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `admin_vivero`
--

-- --------------------------------------------------------

--
-- Table structure for table `carrucel`
--

CREATE TABLE `carrucel` (
  `idcarrucel` int(11) NOT NULL,
  `nombre` text DEFAULT NULL,
  `img` text DEFAULT NULL,
  `fecha` timestamp NULL DEFAULT NULL,
  `estado` char(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `carrucel`
--

INSERT INTO `carrucel` (`idcarrucel`, `nombre`, `img`, `fecha`, `estado`) VALUES
(1, NULL, '6162932136739.mp4', NULL, '1'),
(2, NULL, '4162932135041.mp4', NULL, '1'),
(3, NULL, '10162932124322.mp4', NULL, '1');

-- --------------------------------------------------------

--
-- Table structure for table `categoria`
--

CREATE TABLE `categoria` (
  `idcategoria` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `fecha` timestamp NULL DEFAULT current_timestamp(),
  `estado` char(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categoria`
--

INSERT INTO `categoria` (`idcategoria`, `nombre`, `descripcion`, `fecha`, `estado`) VALUES
(1, 'Ornamentales', 'Se cultiva y se comercializa con propósitos decorativos por sus características estéticas, como las flores, hojas, perfume o la peculiaridad de su follaje.', '2021-08-02 20:49:07', '1'),
(2, 'Árboles', 'Son aquellas plantas cuya altura supera un determinado límite en la madurez, diferente según las fuentes: dos metros, ​ tres metros, ​​ cinco metros​ o los seis metros.', '2021-08-02 20:49:07', '1'),
(3, 'Flores', 'Las flores normalmente se cultivan al aire libre en viveros, con una protección ligera bajo plásticos o en un invernadero con temperatura controlada.', '2021-08-02 20:49:42', '1'),
(4, 'Rosas', 'Rosas de todos lo colores.', '2021-08-03 21:11:04', '0');

-- --------------------------------------------------------

--
-- Table structure for table `color`
--

CREATE TABLE `color` (
  `idcolor` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `fecha` timestamp NULL DEFAULT current_timestamp(),
  `estado` char(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `color`
--

INSERT INTO `color` (`idcolor`, `nombre`, `fecha`, `estado`) VALUES
(1, 'Naranja', '2021-08-02 20:57:09', '1'),
(2, 'Rojo', '2021-08-02 20:57:21', '1'),
(3, 'Amarillo', '2021-08-02 20:57:33', '1'),
(4, 'Blanco', '2021-08-18 16:02:15', '1'),
(5, 'Violeta', '2021-08-18 16:04:42', '1');

-- --------------------------------------------------------

--
-- Table structure for table `comentarios`
--

CREATE TABLE `comentarios` (
  `id_comentario` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `sexo` char(1) NOT NULL,
  `id_planta` int(11) DEFAULT NULL,
  `comentario` text NOT NULL,
  `estado` int(1) NOT NULL DEFAULT 1,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comentarios`
--

INSERT INTO `comentarios` (`id_comentario`, `nombre`, `sexo`, `id_planta`, `comentario`, `estado`, `fecha`) VALUES
(5, 'UPeU', '1', 1, 'Pueden dejarnos comentarios y recomendaciones', 1, '2021-09-01 15:34:53'),
(6, 'David Requejo Melendres', '0', 1, 'Muy buen diseño de la pagina.', 1, '2021-09-01 16:57:27'),
(15, 'Junior melendrez Huaman', '0', NULL, 'Muy buen diseño de la pagina.', 1, '2021-09-01 17:40:20');

-- --------------------------------------------------------

--
-- Table structure for table `contactanos`
--

CREATE TABLE `contactanos` (
  `idcontactanos` int(11) NOT NULL,
  `direccion` text DEFAULT NULL,
  `coordenadas` text DEFAULT NULL,
  `email` text DEFAULT NULL,
  `telefono` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contactanos`
--

INSERT INTO `contactanos` (`idcontactanos`, `direccion`, `coordenadas`, `email`, `telefono`) VALUES
(1, 'Jr. Los Mártires Nro. 340', '', 'vivero@upeu.edu.pe', '989765321');

-- --------------------------------------------------------

--
-- Table structure for table `detalle_venta`
--

CREATE TABLE `detalle_venta` (
  `iddetalle_venta` int(11) NOT NULL,
  `idplanta` int(11) NOT NULL,
  `idventa` int(11) NOT NULL,
  `cantidad` varchar(45) DEFAULT NULL,
  `precio_venta` decimal(11,2) DEFAULT NULL,
  `descuento` decimal(11,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `detalle_venta`
--

INSERT INTO `detalle_venta` (`iddetalle_venta`, `idplanta`, `idventa`, `cantidad`, `precio_venta`, `descuento`) VALUES
(1, 1, 1, '1', '10.00', '1.00'),
(2, 2, 1, '1', '160.00', '0.00'),
(3, 4, 1, '1', '0.00', '0.00'),
(4, 2, 2, '1', '10.00', '0.00');

-- --------------------------------------------------------

--
-- Table structure for table `nosotros`
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
-- Dumping data for table `nosotros`
--

INSERT INTO `nosotros` (`idnosotros`, `mision`, `vision`, `descripcion`, `img`, `nombre`, `objetivos`, `fecha`, `estado`) VALUES
(1, 'Nuestra misión está orientada a satisfacer los requerimientos de entidades públicas, privadas y público en general, ofreciéndoles productos y servicios  de calidad, en lo que respecta a la venta de plantas, construcción de áreas verdes,  entre otras actividades comprendidas en diseño de jardines.', 'Llegar a convertirnos en un real medio de desarrollo para la producción de plantas para el mercado nacional e internacional, es nuestro principal objetivo. A través de la implementación de novedosas técnicas productivas y comerciales, queremos generar un cambio radical a la experiencia de la compra de plantas.', 'Somos una empresa dedicada para promover una cultura de diseño ecológico mediante la construcción de jardines y espacios urbanos que embellecen nuestro entorno y convierten un lugar en un sitio de gozo y tranquilidad. Somos un equipo capacitado, experimentado y especialista en el embellecimiento de espacios por medio del diseño y mantenimiento de jardines y áreas comunes, venta de plantas, entre otros. Ofrecemos el mejor servicio personalizado por medio de un equipo de trabajo apasionado y comprometido. En Vivero UPeU damos lo mejor de nosotros para la satisfacción total de nuestros clientes. Nos encontramos en la ciudad de Tarapoto.', NULL, 'VIVERO UPeU', 'Aquí se especifican los objetivos del vivero', '2021-08-02 22:20:55', '1');

-- --------------------------------------------------------

--
-- Table structure for table `permiso`
--

CREATE TABLE `permiso` (
  `idpermiso` int(11) NOT NULL,
  `nombre` varchar(30) DEFAULT NULL,
  `fecha` timestamp NULL DEFAULT current_timestamp(),
  `estado` char(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `permiso`
--

INSERT INTO `permiso` (`idpermiso`, `nombre`, `fecha`, `estado`) VALUES
(1, 'Planta', '2021-08-03 00:12:09', '1'),
(2, 'Institucion', '2021-08-03 00:12:09', '1'),
(3, 'Ventas', '2021-08-03 00:12:09', '1'),
(4, 'Acceso', '2021-08-03 00:12:09', '1'),
(5, 'Carrucel', '2021-08-03 00:12:09', '1'),
(6, 'Whatsapp', '2021-08-03 00:12:09', '1');

-- --------------------------------------------------------

--
-- Table structure for table `persona`
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

--
-- Dumping data for table `persona`
--

INSERT INTO `persona` (`idpersona`, `tipo_persona`, `nombre`, `tipo_documento`, `num_documento`, `direccion`, `telefono`, `email`) VALUES
(1, 'Cliente', 'Junior', 'DNI', '76535342', 'S/N', '921305769', 'juniorcercado@upeu.edu.pe'),
(2, 'Cliente', 'pancracio', 'DNI', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `planta`
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
-- Dumping data for table `planta`
--

INSERT INTO `planta` (`idplanta`, `id_categoria`, `nombre`, `stock`, `nombre_cientifico`, `familia`, `apodo`, `descripcion`, `img_1`, `img_2`, `img_3`, `precio_venta`, `espcf_cuidado`, `fecha`, `estado`) VALUES
(1, 1, 'BEGONIA DE ÁRBOL', 10, 'Begonia x Erythrophylla', 'Begoniaceae', 'Begonias', 'Existen 1500 especies, de las que alrededor de 150, además de casi 10.000 variedades e híbridos, se comercializan para su uso en jardinería. Son oriundas de las regiones tropicales y subtropicales de América. En la actualidad se puede encontrar este arbust', '', '', '12162793814729.webp', '15.00', 'Le gusta la humedad ambiental, pero no hay que mojar las hojas ni las flores. Abonaremos cada 15 días en primavera y verano con un abono líquido acompañando al agua de riego. No necesita poda. Por otro lado, se puede multiplican fácilmente por esquejes de tallos o de hoja, aunque perderá la forma de árbol.', '2021-08-02 21:02:26', '1'),
(2, 1, 'Choclo Amarillo', 9, 'Pachystachys lutea', 'Acanthaceae', 'Colita de Camarón o Choclo de Oro', 'Es ampliamente cultivada en el mundo por sus numerosas y vistosas inflorescencias. Se caracteriza por presentar tallos delgados, muy ramificados y leñosos. Los tallos (teniendo en cuenta las ramificaciones) pueden alcanzar más de 1.50 metros de altura en e', '15162938184238.webp', '42162938182479.webp', '', '10.00', 'Iluminación: Esta planta debe ser cultivada en lugares bien iluminados, pero donde el sol no incida directamente durante mucho tiempo, porque se pueden quemar las hojas\r\nTemperatura: Soporta temperaturas de hasta 36° C aunque el rango ideal se encuentra entre los 10 y 20 °C.', '2021-08-02 21:05:52', '1'),
(3, 2, 'CEBRA ORNAMENTAL', 10, 'Aphelandra squarrosa', 'Acanthaceae', 'Planta Cebra', 'Esta planta requiere mucha luz, pero no de forma directa, No florecen a menudo, pero puede ser animada a florecer por la exposición prolongada a la luz todos los días. Los excesos o déficit de agua hará que las hojas inferiores se tornen marrón y se caigan. Requiere de riegos frecuentes de menor volumen, a fin de mantener la humedad del sustrato. La planta florece cuando la temperatura está en un intervalo de 18 hasta 21 °C (65-70°F); y van a sufrir si la temperatura cae por debajo de 15°C (60° F) durante un período prolongado.', '14162938167341.webp', '', '', '10.00', 'Debe situarse en un ambiente muy luminoso, pero alejada del sol directo para evitar quemaduras. El sustrato ha de ser rico en turba ácida, humífero y con excelente drenaje para que los riegos, que han de ser regulares, lo mantengan siempre húmedo pero sin encharcarlo.', '2021-08-02 21:08:45', '1'),
(4, 2, 'POMARROSA', 5, 'Syzygium jambos', 'Myrtaceae', 'perita', 'Árbol frutal de gran poder nutritivo.Puede alcanzar los 10-16 m de altura, pero en cultivo tan sólo 5-6 m, con la corteza grisácea y las ramillas rojizas. Hojas opuestas, subsentadas, recusadas, lanceoladas, muy acuminadas, de 12.5-20 cm. de longitud y 2,5', '13162793866136.webp', '', '', '10.00', 'La pomarrosa le va muy bien estar a pleno sol o a media sombra, aunque es tolerante a la sombra. En cuanto al terreno, requiere suelos fértiles, ligeros y con materia orgánica. Al crecer en suelos erosionados, puede desarrollarse lentamente con pocos nutrientes', '2021-08-02 21:11:00', '1'),
(5, 2, 'PALMERA ABANICO', 13, 'Washingtonia robusta', 'Asparagaceae', 'Palmera Abanico Mexicana', 'Estas palmeras pueden alcanzar los 30 metros de alto y presentan hojas palmeadas (divididas en más de 50 segmentos) de hasta 2 metros de diámetro y con un largo peciolo con espinas en su borde (de color pardo rojizo); al morir las hojas éstas quedan colgan', '16162793884623.webp', '', '', '10.00', 'Regar frecuentemente durante la primavera y el verano sin encharcar nunca el suelo; reducir los riegos el resto del año. Es resistente a la sequía y algo más resistente a la humedad que la Washingtonia filifera. Abonar con compost o con humus en otoño. Son palmeras resistentes a plagas y enfermedades.', '2021-08-02 21:14:06', '1'),
(6, 3, 'ORQUÍDEA DE TIERRA', 12, 'Orchidaceae', 'Asparagaceae', 'Orquídeas', 'Las orquídeas terrestres, o las orquídeas de tierra, son aquellas que crecen en la tierra debido a que sus raíces crecen debajo de ésta, y por ello sus tallos suelen ser más erguidos. De esta manera, obtienen los nutrientes y el agua que', '4162793893729.webp', '', '', '10.00', 'Durante la temporada de crecimiento, el riego regular es una necesidad para inducir el desarrollo máximo de flores. Sin embargo, tienes que dejar que la capa superior del sustrato se seque entre riegos. En la naturaleza, estas plantas prosperan bien con altos niveles de humedad y suelo húmedo.', '2021-08-02 21:15:37', '1'),
(7, 3, 'BUGANVILIAS', 32, 'Bougainvillea', 'Nyctaginaceae', 'Flor de Papel o Papelillo', 'Son enredaderas de porte arbustivo que miden de 1 hasta 12 m de altura, y que crecen en cualquier terreno. Se enredan en otras plantas usando sus afiladas púas que tienen la punta cubierta de una sustancia cerosa negra. Son plantas si', '29162793912218.webp', '55162793912279.webp', '10162793912230.webp', '10.00', '', '2021-08-02 21:18:41', '1'),
(8, 3, 'PERUANITA', 3, '', '', '', 'PERUANITA', '11162938094031.webp', '55162793912279.webp', '', '10.00', '', '2021-08-03 23:26:03', '1'),
(9, 1, 'MUSSAENDA', 2, 'Mussaenda philippica', 'Convolvulaceae', 'Moxandra', 'Es un arbusto trepador semidesciduo, con varios tallos, cubierto de hojas opuestas de color verde medio a oscuro, redondeadas a ovadas, de 3 a 6 pulgadas de largo, pubescentes y fuertemente. Alcanza un tamaño de 12 m de altura, se encuentra en la selva de las tierras bajas caducifolia; Las flores tropicales tienen un color crema, amarillo o naranja con una corola roja. Presenta hojas ovadas de color verde intenso, pubescentes e con nervaduras evidentes, largas 8-15 cm.', '6162818055526.webp', '', '', '13.00', 'La mussaenda prefieren estar a pleno sol, aunque el sol fuerte del medio día la puede quemar en situaciones extremas. Le gustan los suelos con materia orgánica moderada y buen drenaje.', '2021-08-05 16:22:34', '1'),
(10, 1, 'CROTOS ENANOS', 32, 'Codiaeum', 'Euphorbiaceae', 'Croton', 'Sus hojas son de disposición alterna, pecioladas, persistentes, coráceas; su coloración es variable, dentro de un rango del verde al rojizo, con tonos amarillos también. Dicha coloración suele seguir pautas: las hay moteadas y listadas. La forma foliar es variable, aunque suele oscilar entre linear a lobulada, con una lámina cambada y los márgenes ondulados. Las flores, como en el resto de representantes de la familia Euphorbiaceae, están agrupadas en ciatios; por lo demás, son poco llamativas, careciendo de interés ornamental.', '1162938725138.webp', '', '', '20.00', 'Debe ser un lugar muy bien iluminado pero que no reciba la luz del sol de forma directa, así que no conviene que esté justo en una ventana. Temperatura: lo ideal es que esté en ambientes que no bajen de los 16ºC ni superen los 25.', '2021-08-12 15:10:06', '1'),
(11, 1, 'FAROLITO CHINO', 32, 'Abutilon pictum', 'Malvaceae', 'Farolito Japonés', 'Es un arbusto perenne comúnmente de 1 a 3 m de altura, pero puede llegar hasta los 5 m. El diámetro de la planta puede llegar hasta los 3 m. Las hojas son deciduas, de color verde profundo, manchadas de amarillo, un tamaño de 5 a 15 cm de largo y 3 a 5 (raramente 7) lóbulos. Las flores son amarillas a rojas, con venaciones rojo oscuras. Presentan 5 pétalos de 2 a 4 cm de largo. Florece prolongadamente entre la primavera y el otoño.', '7162938016428.webp', '', '', '20.00', 'Asegúrese de que no se seque el compuesto en verano y abónala mensualmetne con un fertilizante líquido equilibrado para prolongar la floración. En invierno, cuando la planta esté bajo techo, reduzca el riego y aplica un fertilizante granulado de liberación lenta a principios de primavera.', '2021-08-12 15:10:16', '1'),
(12, 1, 'LENGUA DE SUEGRA', 10, 'Dracaena trifasciata', 'Asparagaceae', 'Sansevieras', 'Plantas caulescentes. Las hojas 1–2 (–6), erectas, linear-lanceoladas, hasta 140 cm de largo y 4–10 cm de ancho, agudas, rígidas, verde oscuro con líneas transversales verde más pálido, los márgenes enteros, verdes o a veces amarillos. La inflorescencia racimosa, ocasionalmente ramificada, de 50–80 cm de largo, no sobrepasando a las hojas, flores 3–8 en fascículos solitarios o agrupados, blanco verdosas, 15–30 mm de largo; tubo del perianto casi de 5 mm de largo, lobos lineares.', '15162937927328.webp', '', '', '13.00', 'Entre ellos se encuentran estar en un lugar donde pueda recibir luz solar, un ambiente templado y una hidratación cuando la tierra de la planta se encuentra seca.', '2021-08-12 15:11:18', '1'),
(13, 1, 'IXORA', 11, 'Ixora coccinea', 'Rubiaceae', 'Cruz de Malta o Coralillo', 'Es un pequeño arbusto con numerosas flores de pequeño tamaño que permanecen formando umbelas compuestas durante casi todo el año. Es originaria de Asia, específicamente del sur de la India y de Sri Lanka y es muy empleada en jardinería. Entre las más de 400 especies del género Ixora. Forma plantas ramificadas que alcanzan alrededor de 1 m o más de altura, hasta un máximo de más de 3 m en algunas variedades, con numerosos racimos de flores con un aspecto redondeado y que se extienden a veces con un diámetro que puede sobrepasar la altura.', '13162937983340.webp', '48162937983377.webp', '23162888604918.webp', '12.00', 'La Ixora durante el período primavera-verano tiene que ser abundantemente regada, haciendo de modo que el terreno siempre quede húmedo, no empapado. Durante los demás períodos asegúrese sólo de que el terreno no se seca completamente pero siempre está ligeramente húmedo.', '2021-08-13 20:17:24', '1'),
(14, 1, 'Cucardas', 6, 'Hibiscus', 'Malvaceae', 'Hibiscos', 'Esta especie forma un arbusto o árbol pequeño de entre 2 a 5 m de altura. Las hojas, de color verde brillante, color amarillo-dorado en otoño. Sus hojas son pecioladas, anchas, entre ovadas a lanceoladas con bordes dentados irregularmente. Las flores son grandes, con cinco pétalos -en las variedades sencillas- de 6 a 12 cm de largo.', '4162930948626.webp', '59162937902366.webp', '3116293790239.webp', '10.00', 'El riego debe ser abundante durante el verano, época de floración, procurando mantener el suelo siempre húmedo. Es importante evitar encharcamientos con un buen drenaje. En invierno apenas necesita agua. Si se cultiva en interior, hay que pulverizar las hojas regularmente para crear un ambiente húmedo.', '2021-08-16 15:36:47', '1'),
(15, 1, 'Bromelias', 10, 'Erythrophylla', 'Begoniaceae', 'Bromelia', 'Es un género tropical americano de plantas de la familia Bromeliaceae, aunque comúnmente se llama con el mismo nombre a plantas de otros géneros de la misma familia. Sus flores tienen un cáliz muy profundo.', NULL, NULL, NULL, '15.00', 'La Bromelia es una planta fuerte y muy fácil que le dará mucho placer durante 3 a 6 meses. Dé a la Bromelia un lugar con abundante la luz (¡no a pleno sol!) y déle agua regularmente (verter en el cáliz de la planta) y estará contenta. Agregar abono para plantas a su agua no es necesario.', '2021-08-19 03:51:36', '1'),
(16, 3, 'TREPADORA CON FLOR MORADA', 12, 'Ipomoea purpurea', 'Convolvulaceae', 'Campanilla Morada', 'Como todas las campanillas, la planta se enreda por sí misma en estructuras, creciendo a una altura de 2 a 3 m de altura. Las hojas tienen forma de corazón y los tallos tienen vellosidades y también setas rígidas patentes. Las Flores son de forma de trompetilla, predominando los colores azul, púrpura y blanco de unos 3 a 6 cm de diámetro.', '5162938241240.webp', '', '', '10.00', 'Las plantas trepadoras sirven para crear ambientes selváticos y frondosos y ofrecen un toque de intimidad aislando nuestro jardín del ruido y el calor. Si no tienes mucho espacio, puedes aprovechar las paredes y llenarlas de flores.', '2021-08-19 14:13:32', '1'),
(17, 3, 'RUELLIA SIMPLEX', 12, 'Ruellia angustifolia', 'Arecaceae', 'Campanita', 'Ruellia simplex es una especie perenne que llega a crecer hasta 0,90 m de altura, formando colonias de tallos con hojas en forma de lanza que 15 a 30 cm y 0,5 0,75 cm de ancho. Las flores en forma de trompeta son de azul metálico a púrpura, con cinco pétalos, y de 7,6 cm de ancho. Hay una variedad enana que de solo 0,30 m de altura.', '6162938263834.webp', '', '', '12.00', 'La Ruellia debe ser trasplantada cada dos/tres años. Use un sustrato rico en materia orgánica con añadidura de un poco de arena gruesa para favorecer el drenaje del agua de riego porque no tolera los encharcamientos', '2021-08-19 14:17:17', '1'),
(18, 1, 'PAPELILLO CASPI ORNAMENTAL', 12, '', '', '', 'Sin descripción', '2162938278125.webp', '', '', '20.00', 'Sin especificaciones y cuidado', '2021-08-19 14:19:40', '1'),
(19, 2, 'ÁRBOL DE LA VIDA', 12, '', '', '', 'Sin descripción', '15162938318522.webp', '', '', '22.00', 'Sim especificaciones', '2021-08-19 14:21:15', '1'),
(20, 2, 'PALMERA REAL', 12, 'Roystonea regia', 'Arecaceae', 'Palmera Rey', 'Es una especie de palma cuya altura, elegancia y fácil cultivo la ha convertido en una de los árboles utilizados como ornamental más común en el mundo. Es también el más simbólico de los campos de Cuba, donde es reconocido como árbol nacional. El epíteto específico «regia» viene del latín rēgia y significa &amp;quot;real&amp;quot; (del Rey)', '1162938342032.webp', '49162938391469.webp', '', '12.00', 'La Palma real necesita una exposición de pleno sol y climas cálidos. Es una planta tropical que no resiste las heladas ni el frío por debajo de los 8 ºC. El suelo deberá drenar muy bien y contener bastante materia orgánica. La plantación es mejor hacerla durante la primera mitad de la primavera.', '2021-08-19 14:30:20', '1'),
(21, 2, 'PALMERA HAWAIANA', 12, 'Chrysalidocarpus lutescens', 'Arecaceae', 'Palmeras o Palmas', 'Palmera de varios tallos. Se denomina también palmera amarilla por el tono verde amarillento de sus hojas. Puede llegar a medir 6 m.', '5162938418129.webp', '', '', '12.00', 'Secesitan bastante agua (si es templada y no calcárea, mucho mejor); deben regarse una o dos veces por semana durante los meses de actividad vegetativa y cada 15-30 días cuando están en reposo. Lo mejor es esperar a que se seque un poco (no del todo) el sustrato antes de volver a regar.', '2021-08-19 14:43:01', '1'),
(22, 2, 'PALMERA AMERICANA', 12, '', '', '', 'Sin descripción', '0162938615541.webp', '', '', '10.00', 'Sin especificaciones', '2021-08-19 15:15:54', '1'),
(23, 2, 'PALMERA CICA', 12, 'Cycas revoluta', 'Cycadaceae', 'Falsa Palmera', 'Es un arbusto trepador semidesciduo, con varios tallos, cubierto de hojas opuestas de color verde medio a oscuro, redondeadas a ovadas, de 3 a 6 pulgadas de largo, pubescentes y fuertemente. Alcanza un tamaño de 12 m de altura, se encuentra en la selva de las tierras bajas caducifolia; Las flores tropicales tienen un color crema, amarillo o naranja con una corola roja. Presenta hojas ovadas de color verde intenso, pubescentes e con nervaduras evidentes, largas 8-15 cm.', '0162938658531.webp', '49162938658567.webp', '', '12.00', 'Características: hojas muy grandes, de hasta 2 metros. Es una planta de crecimiento muy lento pero muy longeva.\r\nCuidados: no abonar en exceso, regarla cada 10 o 15 días y ponerla en un lugar soleado pero sin sol directo', '2021-08-19 15:23:04', '1'),
(24, 1, 'LENGUA DE SUEGRA PUNTA AGUDA', 12, '', '', '', 'Sin Descripción', '17162938678421.webp', '', '', '12.00', 'Sin Especificaciones', '2021-08-19 15:26:24', '1'),
(25, 1, 'PURPURINA', 12, 'Tradescantia pallida', 'Commelinaceae', 'Amor de Hombre', 'Su nombre común procede obviamente del color púrpura de sus hojas. Es una plata vivaz con un porte rastrero de 1 metro de diámetro. Lo más normal es que no pase los 30 cm de altura ya que posee tallos que no son demasiado fuertes. Para hacer que crezca saludablemente y lo más larga posible debemos apoyarla sobre la pared o alguna otra estructura para que vaya creciendo. Cuando florece, lo hace con flores pequeñas que suelen tener solamente 1 cm de diámetro.', '18162938692125.webp', '', '', '12.00', 'Aunque sus cuidados son muy sencillos, incluso admite la sequía, no es recomendable para lugares con heladas o temperaturas inferiores a los -3ºC. Si la tenemos en maceta, tenemos que dejar secar la capa superior del sustrato entre riego y riego. Un exceso de agua puede hacer que se pudra.', '2021-08-19 15:28:40', '1'),
(26, 3, 'CUBRESUELOS', 12, 'Aptenia cordifolia', 'Aizoáceas', 'Cuna de Niño', 'El Rosal cubresuelos también denominado como Rosales tapizantes, Rosal de paisaje o Rosas paisajista, son un grupo de híbridos de rosas modernas de jardín de rosales rastreros, que crecen desparramados por el suelo y cubriendo literalmente el suelo con poca envergadura.', '3162938703829.webp', '', '', '12.00', 'La Lantana rastrera necesita una exposición de sol directo o de sombra ligera. No le gusta el frío y puede morir con las heladas. No es exigente con el tipo de suelo siempre que esté bien drenado y que contenga materia orgánica. En caso de trasplante es mejor hacerlo a principios de la primavera.', '2021-08-19 15:30:37', '1'),
(27, 1, 'CROTOS', 12, 'Codiaeum', 'Euphorbiaceae', 'Croton', 'Sus hojas son de disposición alterna, pecioladas, persistentes, coráceas; su coloración es variable, dentro de un rango del verde al rojizo, con tonos amarillos también. Dicha coloración suele seguir pautas: las hay moteadas y listadas. La forma foliar es variable, aunque suele oscilar entre linear a lobulada, con una lámina cambada y los márgenes ondulados. Las flores, como en el resto de representantes de la familia Euphorbiaceae, están agrupadas en ciatios; por lo demás, son poco llamativas, careciendo de interés ornamental.', '6162938744634.webp', '', '', '12.00', 'Debe ser un lugar muy bien iluminado pero que no reciba la luz del sol de forma directa, así que no conviene que esté justo en una ventana. Temperatura: lo ideal es que esté en ambientes que no bajen de los 16ºC ni superen los 25.', '2021-08-19 15:37:26', '1'),
(28, 1, 'BEGONIA RASTRERA', 12, 'Begonia x Erythrophylla', 'Begoniaceae', 'Begonias', 'Existen 1500 especies, de las que alrededor de 150, además de casi 10.000 variedades e híbridos, se comercializan para su uso en jardinería. Son oriundas de las regiones tropicales y subtropicales de América. En la actualidad se puede encontrar este arbusto en regiones tropicales y subtropicales de todo el mundo. Son plantas terrestres (a veces epífitas) herbáceas, algunas de porte semiarbustivo o incluso pequeños árboles y otras trepadoras, perennes excepto en climas fríos, es el aérea donde la planta muere. Las flores son muy diversas tanto en forma y tamaño como en color.', '12162938776930.webp', '', '', '12.00', 'Todo tipo de begonia necesita humedad, tanto en el suelo como en el ambiente. Si el clima es seco, podemos ayudar pulverizando agua cerca de sus hojas. Otra forma de crear una entorno más húmedo es poner varias plantas juntas.', '2021-08-19 15:42:49', '1');

-- --------------------------------------------------------

--
-- Table structure for table `plantacolor`
--

CREATE TABLE `plantacolor` (
  `idplantacolor` int(11) NOT NULL,
  `id_planta` int(11) NOT NULL,
  `id_color` int(11) NOT NULL,
  `fecha` timestamp NULL DEFAULT current_timestamp(),
  `estado` char(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `plantacolor`
--

INSERT INTO `plantacolor` (`idplantacolor`, `id_planta`, `id_color`, `fecha`, `estado`) VALUES
(45, 15, 1, '2021-08-19 03:51:36', '1'),
(46, 15, 3, '2021-08-19 03:51:36', '1'),
(47, 15, 4, '2021-08-19 03:51:36', '1'),
(48, 15, 5, '2021-08-19 03:51:36', '1'),
(49, 7, 1, '2021-08-19 13:28:43', '1'),
(50, 7, 2, '2021-08-19 13:28:43', '1'),
(51, 7, 3, '2021-08-19 13:28:43', '1'),
(52, 7, 4, '2021-08-19 13:28:43', '1'),
(53, 7, 5, '2021-08-19 13:28:43', '1'),
(54, 13, 1, '2021-08-19 13:30:32', '1'),
(55, 13, 3, '2021-08-19 13:30:32', '1'),
(61, 17, 5, '2021-08-19 14:17:17', '1'),
(62, 14, 1, '2021-08-19 14:40:07', '1'),
(63, 14, 2, '2021-08-19 14:40:07', '1'),
(64, 14, 3, '2021-08-19 14:40:07', '1'),
(65, 14, 4, '2021-08-19 14:40:07', '1'),
(66, 14, 5, '2021-08-19 14:40:07', '1');

-- --------------------------------------------------------

--
-- Table structure for table `plantaimg`
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
-- Dumping data for table `plantaimg`
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
-- Table structure for table `usuario`
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
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`idusuario`, `nombre`, `tipo_documento`, `num_documento`, `direccion`, `telefono`, `email`, `cargo`, `login`, `clave`, `imagen`, `condicion`, `fecha`) VALUES
(1, 'admin', 'DNI', '76535342', 'S/N', '921305769', 'jdbcracks@gmail.com', 'administrador', 'admin', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', '1628885189.png', '1', '2021-08-02 23:21:44');

-- --------------------------------------------------------

--
-- Table structure for table `usuario_permiso`
--

CREATE TABLE `usuario_permiso` (
  `idusuario_permiso` int(11) NOT NULL,
  `idpermiso` int(11) NOT NULL,
  `idusuario` int(11) NOT NULL,
  `fecha` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `usuario_permiso`
--

INSERT INTO `usuario_permiso` (`idusuario_permiso`, `idpermiso`, `idusuario`, `fecha`) VALUES
(23, 1, 1, '2021-08-13 20:06:28'),
(24, 2, 1, '2021-08-13 20:06:28'),
(25, 3, 1, '2021-08-13 20:06:28'),
(26, 4, 1, '2021-08-13 20:06:28'),
(27, 5, 1, '2021-08-13 20:06:28'),
(28, 6, 1, '2021-08-13 20:06:28');

-- --------------------------------------------------------

--
-- Table structure for table `venta`
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

--
-- Dumping data for table `venta`
--

INSERT INTO `venta` (`idventa`, `idcliente`, `idusuario`, `tipo_comprobante`, `serie_comprobante`, `num_comprobante`, `fecha_hora`, `impuesto`, `total_venta`, `estado`) VALUES
(1, 1, 1, 'Boleta', '12345', '123454', '2021-08-13 00:00:00', '0.00', '169.00', 'Aceptado'),
(2, 2, 1, 'Boleta', '1', '2', '2021-08-18 00:00:00', '0.00', '10.00', 'Aceptado');

-- --------------------------------------------------------

--
-- Table structure for table `whatsapp`
--

CREATE TABLE `whatsapp` (
  `idwhatsapp` int(11) NOT NULL,
  `numero` varchar(15) DEFAULT NULL,
  `nombre` varchar(15) NOT NULL,
  `estado` char(1) DEFAULT '1',
  `fecha` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `whatsapp`
--

INSERT INTO `whatsapp` (`idwhatsapp`, `numero`, `nombre`, `estado`, `fecha`) VALUES
(1, '921487276', 'Junior', '1', '2021-08-13 14:59:30'),
(2, '916711593', 'Ing Laban', '1', '2021-08-16 11:46:25'),
(3, '981796620', 'Lisset', '1', '2021-08-16 12:00:56'),
(4, '921487276', 'Junior', '1', '2021-08-18 08:14:59');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carrucel`
--
ALTER TABLE `carrucel`
  ADD PRIMARY KEY (`idcarrucel`);

--
-- Indexes for table `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`idcategoria`);

--
-- Indexes for table `color`
--
ALTER TABLE `color`
  ADD PRIMARY KEY (`idcolor`);

--
-- Indexes for table `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id_comentario`);

--
-- Indexes for table `contactanos`
--
ALTER TABLE `contactanos`
  ADD PRIMARY KEY (`idcontactanos`);

--
-- Indexes for table `detalle_venta`
--
ALTER TABLE `detalle_venta`
  ADD PRIMARY KEY (`iddetalle_venta`),
  ADD KEY `fk_detalle_venta_planta1_idx` (`idplanta`),
  ADD KEY `fk_detalle_venta_venta1_idx` (`idventa`);

--
-- Indexes for table `nosotros`
--
ALTER TABLE `nosotros`
  ADD PRIMARY KEY (`idnosotros`);

--
-- Indexes for table `permiso`
--
ALTER TABLE `permiso`
  ADD PRIMARY KEY (`idpermiso`);

--
-- Indexes for table `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`idpersona`);

--
-- Indexes for table `planta`
--
ALTER TABLE `planta`
  ADD PRIMARY KEY (`idplanta`),
  ADD KEY `fk_planta_categoria_idx` (`id_categoria`);

--
-- Indexes for table `plantacolor`
--
ALTER TABLE `plantacolor`
  ADD PRIMARY KEY (`idplantacolor`),
  ADD KEY `fk_plantacolor_planta1_idx` (`id_planta`),
  ADD KEY `fk_plantacolor_color1_idx` (`id_color`);

--
-- Indexes for table `plantaimg`
--
ALTER TABLE `plantaimg`
  ADD PRIMARY KEY (`idplantaimg`),
  ADD KEY `fk_plantaimg_planta1_idx` (`id_planta`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idusuario`);

--
-- Indexes for table `usuario_permiso`
--
ALTER TABLE `usuario_permiso`
  ADD PRIMARY KEY (`idusuario_permiso`),
  ADD KEY `fk_usuario_permiso_permiso1_idx` (`idpermiso`),
  ADD KEY `fk_usuario_permiso_usuario1_idx` (`idusuario`);

--
-- Indexes for table `venta`
--
ALTER TABLE `venta`
  ADD PRIMARY KEY (`idventa`),
  ADD KEY `fk_venta_persona1_idx` (`idcliente`),
  ADD KEY `fk_venta_usuario1_idx` (`idusuario`);

--
-- Indexes for table `whatsapp`
--
ALTER TABLE `whatsapp`
  ADD PRIMARY KEY (`idwhatsapp`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carrucel`
--
ALTER TABLE `carrucel`
  MODIFY `idcarrucel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `categoria`
--
ALTER TABLE `categoria`
  MODIFY `idcategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `color`
--
ALTER TABLE `color`
  MODIFY `idcolor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id_comentario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `contactanos`
--
ALTER TABLE `contactanos`
  MODIFY `idcontactanos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `detalle_venta`
--
ALTER TABLE `detalle_venta`
  MODIFY `iddetalle_venta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `nosotros`
--
ALTER TABLE `nosotros`
  MODIFY `idnosotros` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `permiso`
--
ALTER TABLE `permiso`
  MODIFY `idpermiso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `persona`
--
ALTER TABLE `persona`
  MODIFY `idpersona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `planta`
--
ALTER TABLE `planta`
  MODIFY `idplanta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `plantacolor`
--
ALTER TABLE `plantacolor`
  MODIFY `idplantacolor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `plantaimg`
--
ALTER TABLE `plantaimg`
  MODIFY `idplantaimg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `usuario_permiso`
--
ALTER TABLE `usuario_permiso`
  MODIFY `idusuario_permiso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `venta`
--
ALTER TABLE `venta`
  MODIFY `idventa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `whatsapp`
--
ALTER TABLE `whatsapp`
  MODIFY `idwhatsapp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detalle_venta`
--
ALTER TABLE `detalle_venta`
  ADD CONSTRAINT `fk_detalle_venta_planta1` FOREIGN KEY (`idplanta`) REFERENCES `planta` (`idplanta`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_detalle_venta_venta1` FOREIGN KEY (`idventa`) REFERENCES `venta` (`idventa`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `planta`
--
ALTER TABLE `planta`
  ADD CONSTRAINT `fk_planta_categoria` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`idcategoria`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `plantacolor`
--
ALTER TABLE `plantacolor`
  ADD CONSTRAINT `fk_plantacolor_color1` FOREIGN KEY (`id_color`) REFERENCES `color` (`idcolor`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_plantacolor_planta1` FOREIGN KEY (`id_planta`) REFERENCES `planta` (`idplanta`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `plantaimg`
--
ALTER TABLE `plantaimg`
  ADD CONSTRAINT `fk_plantaimg_planta1` FOREIGN KEY (`id_planta`) REFERENCES `planta` (`idplanta`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `usuario_permiso`
--
ALTER TABLE `usuario_permiso`
  ADD CONSTRAINT `fk_usuario_permiso_permiso1` FOREIGN KEY (`idpermiso`) REFERENCES `permiso` (`idpermiso`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_usuario_permiso_usuario1` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`idusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `venta`
--
ALTER TABLE `venta`
  ADD CONSTRAINT `fk_venta_persona1` FOREIGN KEY (`idcliente`) REFERENCES `persona` (`idpersona`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_venta_usuario1` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`idusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
