-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Versión del servidor: 8.0.17
-- Versión de PHP: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tienda_kasama`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comprobante`
--

CREATE TABLE `comprobante` (
  `idComprobante` int(11) NOT NULL,
  `Fecha` date NOT NULL,
  `Codigo` varchar(15) NOT NULL,
  `MontoTotal` decimal(10,2) NOT NULL,
  `Cliente` varchar(50) DEFAULT NULL,
  `documento` varchar(12) DEFAULT NULL,
  `tipo` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `comprobante`
--

INSERT INTO `comprobante` (`idComprobante`, `Fecha`, `Codigo`, `MontoTotal`, `Cliente`, `documento`, `tipo`) VALUES
(38, '2023-06-25', 'CO-0001', '113.80', '', '', 'B'),
(39, '2023-06-25', 'CO-0002', '113.80', '', '', 'B'),
(40, '2023-06-25', 'CO-0003', '113.80', '', '', 'B'),
(41, '2023-06-25', 'CO-0004', '113.80', '', '', 'B'),
(42, '2023-06-30', 'CO-0005', '113.80', '', '', 'B'),
(43, '2023-06-25', 'CO-0006', '75.40', '', '', 'B'),
(44, '2023-06-25', 'CO-0007', '56.90', 'asfafs', '156161', 'F'),
(45, '2023-06-25', 'CO-0008', '113.80', '', '', 'B'),
(46, '2023-06-25', 'CO-0009', '113.80', '', '', 'B'),
(47, '2023-06-25', 'CO-0010', '113.80', '', '', 'B'),
(48, '2023-06-25', 'CO-0011', '113.80', 'fasfasf', '27435435', 'F'),
(49, '2023-06-25', 'CO-0012', '113.80', 'afas', 'asfa', 'F'),
(50, '2023-06-25', 'CO-0013', '113.80', '', '', 'B'),
(51, '2023-06-25', 'CO-0014', '113.80', 'fasfa', 'asfafsa', 'B'),
(52, '2023-06-25', 'CO-0015', '113.80', '', '', 'B'),
(53, '2023-06-25', 'CO-0016', '113.80', '', '', 'B'),
(54, '2023-06-25', 'CO-0017', '56.90', '', '', 'B'),
(55, '2023-06-26', 'CO-0018', '56.90', 'GAFSA', 'ASFA', 'F'),
(57, '2023-06-31', 'CO-0019', '60.00', '', '', 'B'),
(58, '2023-06-31', 'CO-0020', '60.00', '', '', 'B'),
(59, '2023-06-31', 'CO-0021', '30.00', '', '', 'B'),
(60, '2023-06-31', 'CO-0022', '30.00', '', '', 'B'),
(61, '2023-07-01', 'CO-0023', '60.00', '', '', 'B'),
(62, '2023-07-01', 'CO-0024', '30.00', '', '', 'B'),
(63, '2023-07-01', 'CO-0025', '95.00', '', '', 'B'),
(64, '2023-07-01', 'CO-0026', '95.00', '', '', 'B'),
(65, '2023-07-02', 'CO-0027', '156.00', '', '', 'B');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallecomprobante`
--

CREATE TABLE `detallecomprobante` (
  `id` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `id_comprobante` int(11) NOT NULL,
  `cantidad` float NOT NULL,
  `precioU` decimal(10,2) NOT NULL,
  `envases` int(10) NOT NULL,
  `monto` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `detallecomprobante`
--

INSERT INTO `detallecomprobante` (`id`, `id_producto`, `id_comprobante`, `cantidad`, `precioU`, `envases`, `monto`) VALUES
(9, 4, 38, 2, '18.00', 0, '36.00'),
(10, 3, 38, 3, '12.00', 0, '36.00'),
(11, 2, 38, 2, '20.90', 0, '41.80'),
(12, 4, 39, 2, '18.00', 0, '36.00'),
(13, 3, 39, 3, '12.00', 0, '36.00'),
(14, 2, 39, 2, '20.90', 0, '41.80'),
(15, 4, 40, 2, '18.00', 0, '36.00'),
(16, 3, 40, 3, '12.00', 0, '36.00'),
(17, 2, 40, 2, '20.90', 0, '41.80'),
(18, 4, 41, 2, '18.00', 0, '36.00'),
(19, 3, 41, 3, '12.00', 0, '36.00'),
(20, 2, 41, 2, '20.90', 0, '41.80'),
(21, 4, 42, 2, '18.00', 0, '36.00'),
(22, 3, 42, 3, '12.00', 0, '36.00'),
(23, 2, 42, 2, '20.90', 0, '41.80'),
(24, 4, 43, 1, '18.00', 0, '18.00'),
(25, 3, 43, 1, '12.00', 0, '12.00'),
(26, 2, 43, 1, '20.90', 0, '20.90'),
(27, 1, 43, 1, '4.50', 0, '4.50'),
(28, 5, 43, 1, '20.00', 0, '20.00'),
(29, 4, 44, 1, '18.00', 1, '19.00'),
(30, 3, 44, 1, '12.00', 3, '15.00'),
(31, 2, 44, 1, '20.90', 2, '22.90'),
(32, 4, 45, 2, '18.00', 0, '36.00'),
(33, 3, 45, 3, '12.00', 0, '36.00'),
(34, 2, 45, 2, '20.90', 0, '41.80'),
(35, 4, 46, 2, '18.00', 0, '36.00'),
(36, 3, 46, 3, '12.00', 0, '36.00'),
(37, 2, 46, 2, '20.90', 0, '41.80'),
(38, 4, 47, 2, '18.00', 0, '36.00'),
(39, 3, 47, 3, '12.00', 0, '36.00'),
(40, 2, 47, 2, '20.90', 0, '41.80'),
(41, 4, 48, 2, '18.00', 0, '36.00'),
(42, 3, 48, 3, '12.00', 0, '36.00'),
(43, 2, 48, 2, '20.90', 0, '41.80'),
(44, 4, 49, 2, '18.00', 0, '36.00'),
(45, 3, 49, 3, '12.00', 0, '36.00'),
(46, 2, 49, 2, '20.90', 0, '41.80'),
(47, 4, 50, 2, '18.00', 0, '36.00'),
(48, 3, 50, 3, '12.00', 0, '36.00'),
(49, 2, 50, 2, '20.90', 0, '41.80'),
(50, 4, 51, 2, '18.00', 0, '36.00'),
(51, 3, 51, 3, '12.00', 0, '36.00'),
(52, 2, 51, 2, '20.90', 0, '41.80'),
(53, 4, 52, 2, '18.00', 0, '36.00'),
(54, 3, 52, 3, '12.00', 0, '36.00'),
(55, 2, 52, 2, '20.90', 0, '41.80'),
(56, 4, 53, 2, '18.00', 0, '36.00'),
(57, 3, 53, 3, '12.00', 0, '36.00'),
(58, 2, 53, 2, '20.90', 0, '41.80'),
(59, 4, 54, 1, '18.00', 1, '19.00'),
(60, 3, 54, 1, '12.00', 3, '15.00'),
(61, 2, 54, 1, '20.90', 2, '22.90'),
(62, 4, 55, 1, '18.00', 1, '19.00'),
(63, 3, 55, 1, '12.00', 3, '15.00'),
(64, 2, 55, 1, '20.90', 2, '22.90'),
(65, 4, 57, 1, '18.00', 0, '18.00'),
(66, 3, 57, 1, '12.00', 0, '12.00'),
(67, 2, 57, 1, '30.00', 0, '30.00'),
(68, 4, 58, 1, '18.00', 0, '18.00'),
(69, 3, 58, 1, '12.00', 0, '12.00'),
(70, 2, 58, 1, '30.00', 0, '30.00'),
(71, 3, 59, 1, '12.00', 0, '12.00'),
(72, 4, 59, 1, '18.00', 0, '18.00'),
(73, 3, 60, 1, '12.00', 0, '12.00'),
(74, 4, 60, 1, '18.00', 0, '18.00'),
(75, 4, 61, 1, '18.00', 0, '18.00'),
(76, 3, 61, 1, '12.00', 0, '12.00'),
(77, 2, 61, 1, '30.00', 0, '30.00'),
(78, 3, 62, 1, '12.00', 0, '12.00'),
(79, 4, 62, 1, '18.00', 0, '18.00'),
(80, 4, 63, 5, '18.00', 0, '90.00'),
(81, 1, 63, 5, '1.00', 0, '5.00'),
(82, 4, 64, 5, '18.00', 0, '90.00'),
(83, 1, 64, 5, '1.00', 0, '5.00'),
(84, 3, 65, 13, '12.00', 0, '156.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalleproforma`
--

CREATE TABLE `detalleproforma` (
  `id` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad` float(10,2) NOT NULL,
  `envases` int(11) NOT NULL,
  `monto` decimal(10,2) NOT NULL,
  `id_proforma` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `detalleproforma`
--

INSERT INTO `detalleproforma` (`id`, `id_producto`, `cantidad`, `envases`, `monto`, `id_proforma`) VALUES
(214, 4, 2.00, 0, '36.00', 98),
(215, 3, 3.00, 0, '36.00', 98),
(216, 2, 2.00, 0, '41.80', 98),
(217, 4, 1.00, 0, '18.00', 99),
(218, 3, 1.00, 0, '12.00', 99),
(219, 2, 1.00, 0, '20.90', 99),
(220, 1, 1.00, 0, '4.50', 99),
(221, 5, 1.00, 0, '20.00', 99),
(222, 4, 1.00, 0, '18.00', 100),
(223, 3, 2.00, 0, '24.00', 100),
(224, 2, 3.00, 0, '62.70', 100),
(225, 4, 1.00, 1, '19.00', 101),
(226, 3, 1.00, 3, '15.00', 101),
(227, 2, 1.00, 2, '22.90', 101),
(228, 4, 1.00, 0, '18.00', 102),
(229, 3, 1.00, 0, '12.00', 102),
(230, 1, 1.00, 0, '4.50', 102),
(231, 3, 1.50, 0, '18.00', 103),
(232, 2, 0.50, 0, '10.45', 103),
(233, 4, 1.00, 0, '18.00', 104),
(234, 3, 1.00, 0, '12.00', 104),
(235, 4, 1.00, 0, '18.00', 105),
(236, 3, 1.00, 0, '12.00', 105),
(237, 2, 1.00, 0, '20.90', 105),
(238, 1, 1.00, 0, '4.50', 105),
(239, 5, 1.00, 0, '20.00', 105),
(240, 4, 2.00, 0, '36.00', 106),
(241, 3, 1.00, 0, '12.00', 106),
(242, 2, 1.00, 0, '20.90', 106),
(243, 1, 1.00, 0, '4.50', 106),
(244, 5, 1.00, 0, '20.00', 106),
(245, 3, 12.00, 1, '181.00', 107),
(246, 4, 1.00, 0, '18.00', 107),
(247, 3, 13.00, 0, '156.00', 108),
(248, 3, 1.00, 0, '12.00', 109),
(249, 4, 1.00, 0, '18.00', 109),
(250, 4, 1.00, 0, '18.00', 110),
(251, 3, 1.00, 0, '12.00', 110),
(252, 2, 1.00, 0, '30.00', 110),
(253, 4, 5.00, 0, '90.00', 111),
(254, 1, 5.00, 0, '5.00', 111),
(255, 4, 7.00, 0, '126.00', 112),
(256, 3, 1.00, 0, '12.00', 112);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `privilegios`
--

CREATE TABLE `privilegios` (
  `id` int(11) NOT NULL,
  `label` varchar(50) NOT NULL,
  `path` varchar(300) NOT NULL,
  `image` varchar(70) NOT NULL,
  `modulo` enum('gestion','ventas','caja','reclamo','seguridad') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `privilegios`
--

INSERT INTO `privilegios` (`id`, `label`, `path`, `image`, `modulo`) VALUES
(1, 'Cambiar Password', 'indexCambiarPassword.php', 'cambiarclave.png', 'seguridad'),
(2, 'Gestionar Reclamo', '../moduloReclamo/indexGestionarReclamo.php', 'gestionarReclamo.png', 'reclamo'),
(3, 'Emitir Proforma', '../moduloVentas/indexEmitirProforma.php', 'emitirProforma.png', 'ventas'),
(4, 'Cierre Caja', '../moduloCaja/indexCierreCaja.php', 'cierreCaja.png', 'caja'),
(5, 'Emitir Comprobante', '../moduloVentas/indexEmitirComprobante.php', 'emitir_comprobante.png', 'ventas'),
(8, 'Gestionar Usuarios', '../moduloGestion/indexGestionarUsuario.php', 'gestionarUsuario.png', 'gestion'),
(9, 'Gestionar Producto', '../moduloVentas/indexGestionarProducto.php', 'gestionarProducto.png', 'ventas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id` int(11) NOT NULL,
  `producto` varchar(50) NOT NULL,
  `precioU` double NOT NULL,
  `stock` double NOT NULL,
  `imagen` varchar(50) NOT NULL,
  `categoria` varchar(50) NOT NULL,
  `PrecioEnvase` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id`, `producto`, `precioU`, `stock`, `imagen`, `categoria`, `PrecioEnvase`) VALUES
(1, 'Ron Zacapa', 590, 89, 'ron_zacapa.jpg', 'Rones', 0),
(2, 'Whisky JohnnieWalker BlueLabel', 1285, 12, 'johnnieWalker_blueLabel.jpg', 'Whiskys', 0),
(3, 'Vino Tinto Frontera', 30, 77, 'vino_tinto_frontera.jpg', 'Vinos', 1),
(4, 'JohnnieWalker GoldLabell', 230, 45, 'johnnieWalker_goldLabell.jpg', 'Otros', 0),
(5, 'Ron Medellín Extra', 84, 32, 'ron_medellin.jpg', 'Rones', 1),
(20, 'Vino Pulenta', 65, 56, 'vino_pulenta.jpg', 'Vinos', 0),
(21, 'Whisky Jack Daniel’s Tennessee', 110, 80, 'whisky_tennessee.jpg', 'Whiskys', 0);


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proforma`
--

CREATE TABLE `proforma` (
  `idproforma` int(11) NOT NULL,
  `codigo` varchar(7) NOT NULL,
  `fecha` date NOT NULL,
  `monto_total` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `proforma`
--

INSERT INTO `proforma` (`idproforma`, `codigo`, `fecha`, `monto_total`) VALUES
(98, 'PF-0001', '2023-06-26', '113.80'),
(99, 'PF-0002', '2023-06-26', '75.40'),
(100, 'PF-0003', '2023-06-08', '104.70'),
(101, 'PF-0004', '2023-06-26', '56.90'),
(102, 'PF-0005', '2023-06-25', '34.50'),
(103, 'PF-0006', '2023-06-26', '28.45'),
(104, 'PF-0007', '2023-06-26', '30.00'),
(105, 'PF-0008', '2023-06-26', '75.40'),
(106, 'PF-0009', '2023-06-25', '93.40'),
(107, 'PF-0010', '2023-06-26', '199.00'),
(108, 'PF-0011', '2023-06-30', '156.00'),
(109, 'PF-0012', '2023-06-31', '30.00'),
(110, 'PF-0013', '2023-06-31', '60.00'),
(111, 'PF-0014', '2023-06-31', '95.00'),
(112, 'PF-0015', '2023-07-01', '138.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reclamo`
--

CREATE TABLE `reclamo` (
  `id` int(11) NOT NULL,
  `idComprobante` int(11) NOT NULL,
  `motivo` varchar(200) NOT NULL,
  `estado` varchar(2) NOT NULL,
  `fecha` date NOT NULL,
  `monto` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `reclamo`
--

INSERT INTO `reclamo` (`id`, `idComprobante`, `motivo`, `estado`, `fecha`, `monto`) VALUES
(7, 40, 'f', 'R', '2023-07-20', 50),
(8, 55, 'Falla del producto', 'R', '2023-07-26', 10),
(9, 48, 'asfafsaf', 'R', '2023-07-26', 15),
(10, 51, 'FALLA DEL PRODUCTO', 'R', '2023-07-26', 10),
(11, 45, 'aea', 'R', '2023-08-01', 21);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarioprivilegio`
--

CREATE TABLE `usuarioprivilegio` (
  `idUP` int(11) NOT NULL,
  `idusuario` int(11) NOT NULL,
  `idPrivilegio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarioprivilegio`
--

INSERT INTO `usuarioprivilegio` (`idUP`, `idusuario`, `idPrivilegio`) VALUES
(5, 3, 1),
(6, 3, 4),
(7, 3, 3),
(9, 3, 5),
(10, 3, 2),
(12, 3, 8),
(22, 3, 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idUsuario` int(11) NOT NULL,
  `DNI` int(8) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `apellidoP` varchar(15) NOT NULL,
  `apellidoM` varchar(15) NOT NULL,
  `direccion` varchar(50) NOT NULL,
  `rol` varchar(15) NOT NULL,
  `login` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `preguntaS` varchar(50) NOT NULL,
  `respuestaS` varchar(10) NOT NULL,
  `estado` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idUsuario`, `DNI`, `nombre`, `apellidoP`, `apellidoM`, `direccion`, `rol`, `login`, `password`, `preguntaS`, `respuestaS`, `estado`) VALUES
(3, 74631433, 'Admin', '', '', '', 'Administrador', 'admin', '12345', '¿Cuál es el nombre de tu colegio?', 'prolog', '1'),
(7, 78941234, 'Pepo', '', '', '', 'Vendedor', 'pepo', '12345', '¿Cómo te dicen?', 'pepo', '1');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `comprobante`
--
ALTER TABLE `comprobante`
  ADD PRIMARY KEY (`idComprobante`);

--
-- Indices de la tabla `detallecomprobante`
--
ALTER TABLE `detallecomprobante`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_producto` (`id_producto`),
  ADD KEY `id_comprobante` (`id_comprobante`);

--
-- Indices de la tabla `detalleproforma`
--
ALTER TABLE `detalleproforma`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_proforma` (`id_proforma`),
  ADD KEY `id_producto` (`id_producto`);

--
-- Indices de la tabla `privilegios`
--
ALTER TABLE `privilegios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `proforma`
--
ALTER TABLE `proforma`
  ADD PRIMARY KEY (`idproforma`);

--
-- Indices de la tabla `reclamo`
--
ALTER TABLE `reclamo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idComprobante` (`idComprobante`);

--
-- Indices de la tabla `usuarioprivilegio`
--
ALTER TABLE `usuarioprivilegio`
  ADD PRIMARY KEY (`idUP`),
  ADD KEY `idusuario` (`idusuario`),
  ADD KEY `idPrivilegio` (`idPrivilegio`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idUsuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `comprobante`
--
ALTER TABLE `comprobante`
  MODIFY `idComprobante` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT de la tabla `detallecomprobante`
--
ALTER TABLE `detallecomprobante`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT de la tabla `detalleproforma`
--
ALTER TABLE `detalleproforma`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=257;

--
-- AUTO_INCREMENT de la tabla `privilegios`
--
ALTER TABLE `privilegios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `proforma`
--
ALTER TABLE `proforma`
  MODIFY `idproforma` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT de la tabla `reclamo`
--
ALTER TABLE `reclamo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `usuarioprivilegio`
--
ALTER TABLE `usuarioprivilegio`
  MODIFY `idUP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detallecomprobante`
--
ALTER TABLE `detallecomprobante`
  ADD CONSTRAINT `detallecomprobante_ibfk_1` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `detallecomprobante_ibfk_2` FOREIGN KEY (`id_comprobante`) REFERENCES `comprobante` (`idComprobante`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `detalleproforma`
--
ALTER TABLE `detalleproforma`
  ADD CONSTRAINT `detalleproforma_ibfk_1` FOREIGN KEY (`id_proforma`) REFERENCES `proforma` (`idproforma`) ON UPDATE CASCADE,
  ADD CONSTRAINT `detalleproforma_ibfk_2` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `reclamo`
--
ALTER TABLE `reclamo`
  ADD CONSTRAINT `reclamo_ibfk_1` FOREIGN KEY (`idComprobante`) REFERENCES `comprobante` (`idComprobante`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuarioprivilegio`
--
ALTER TABLE `usuarioprivilegio`
  ADD CONSTRAINT `usuarioprivilegio_ibfk_1` FOREIGN KEY (`idusuario`) REFERENCES `usuarios` (`idUsuario`) ON UPDATE CASCADE,
  ADD CONSTRAINT `usuarioprivilegio_ibfk_2` FOREIGN KEY (`idPrivilegio`) REFERENCES `privilegios` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
