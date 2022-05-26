-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 16-05-2022 a las 13:30:25
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `dondegrabar`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `localizaciones`
--

CREATE TABLE `localizaciones` (
  `ID` int(5) NOT NULL,
  `nombre` varchar(25) COLLATE utf8_spanish2_ci NOT NULL,
  `descripcion` text COLLATE utf8_spanish2_ci NOT NULL,
  `direccion` text COLLATE utf8_spanish2_ci NOT NULL,
  `fotos` varchar(50) COLLATE utf8_spanish2_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `localizaciones`
--

INSERT INTO `localizaciones` (`ID`, `nombre`, `descripcion`, `direccion`, `fotos`) VALUES
(1, 'Gimnasio Paco', 'Gimnasio local situado en el centro de Pacolandia, cuenta con los servicios generales incluidos luz y agua, vestuarios y pequeño office con maquinas de venta de comida. el local es diafano y el techo mide 3.50m', 'Calle Falsa nº 123 Portugalete, Bizkaia', 'asas'),
(2, 'Teteria Tetas', 'Local soleado con olor a manzanilla', 'Carlos VII numero 7 bajo F', 'asasa'),
(3, 'Ifeoma Barry', 'Sed nec metus facilisis lorem tristique aliquet. Phasellus fermentum', 'Ap #540-4255 Et, Ave', 'Nunc sed orci lobortis augue'),
(4, 'Kevin Hale', 'ante. Nunc', '6251 Metus. St.', 'ipsum dolor sit'),
(5, 'Emery Pickett', 'velit dui, semper et, lacinia vitae, sodales', '4769 Lorem Av.', 'et'),
(6, 'Cade Morris', 'nec, cursus a, enim. Suspendisse', 'Ap #493-9007 Id St.', 'Nunc quis arcu'),
(7, 'August Cotton', 'convallis est, vitae sodales nisi magna sed dui.', '2694 Ligula. Street', 'arcu eu odio tristique pharetra. Quisque ac libero'),
(8, 'Ray Daniels', 'Aliquam vulputate ullamcorper magna. Sed eu', 'P.O. Box 750, 7801 Ut Rd.', 'pulvinar'),
(9, 'Mari Donovan', 'in molestie', '278-1629 Vulputate, Av.', 'dictum ultricies ligula. Nullam enim.'),
(10, 'Iliana Patterson', 'quam quis diam. Pellentesque habitant morbi tristique senectus et netus', '3880 Ipsum Rd.', 'sem. Nulla interdum. Curabitur dictum.'),
(11, 'Claire Maddox', 'In lorem. Donec elementum, lorem ut aliquam iaculis, lacus', '144-3790 Risus. Rd.', 'mollis dui, in sodales'),
(12, 'Guy Haley', 'Sed malesuada augue', 'Ap #389-5640 Ultricies Av.', 'et netus et malesuada fames ac turpis'),
(13, 'Jade Hopkins', 'accumsan convallis, ante lectus', 'Ap #273-2938 Elit, Rd.', 'lectus pede et risus. Quisque libero lacus, varius'),
(14, 'Leo Hunter', 'ornare tortor at', '374-4986 Lacinia. St.', 'justo eu arcu. Morbi sit amet massa. Quisque'),
(15, 'Tiger Walton', 'nisl sem, consequat nec, mollis vitae, posuere at, velit. Cras', 'Ap #515-679 Sociis Av.', 'dui quis accumsan convallis, ante lectus convallis'),
(16, 'Gloria Mccarthy', 'rhoncus. Nullam velit dui, semper et,', 'Ap #786-5524 Aenean Road', 'arcu. Curabitur ut odio'),
(17, 'Hilel Zimmerman', 'natoque penatibus et magnis dis', 'Ap #306-5537 Luctus. Avenue', 'sagittis. Nullam vitae diam.'),
(18, 'Claudia French', 'senectus et netus et malesuada fames', 'Ap #404-3668 Dapibus Road', 'vel quam dignissim pharetra. Nam ac nulla. In tinc'),
(19, 'Eugenia Fuentes', 'mauris id sapien. Cras', 'Ap #955-725 Sapien. Rd.', 'tellus, imperdiet non, vestibulum nec, euismod'),
(20, 'Arden Thompson', 'neque tellus, imperdiet non, vestibulum', 'P.O. Box 640, 1616 Sed Street', 'facilisi. Sed neque. Sed eget lacus. Mauris'),
(21, 'Nehru Merritt', 'scelerisque', '327-601 Erat, Street', 'sapien. Cras dolor dolor, tempus'),
(22, 'Quinlan Good', 'laoreet ipsum. Curabitur consequat, lectus', 'Ap #938-7200 Vestibulum Rd.', 'turpis nec mauris blandit'),
(23, 'prueba', 'asdasdasdasdasd', 'falsa', ''),
(24, 'prueba', 'asdasdasdasdasd', 'falsa', ''),
(25, 'prueba', 'asdasdasdasdasd', 'falsa', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `ID` int(6) NOT NULL,
  `nombre` varchar(25) COLLATE utf8_spanish2_ci NOT NULL,
  `pass` int(25) NOT NULL,
  `tipo` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`ID`, `nombre`, `pass`, `tipo`) VALUES
(1, 'Piter', 1234, 0),
(2, 'Rober', 0, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `localizaciones`
--
ALTER TABLE `localizaciones`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `localizaciones`
--
ALTER TABLE `localizaciones`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `ID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
