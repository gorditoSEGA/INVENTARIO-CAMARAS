-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-02-2026 a las 20:06:29
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `camaras_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `camaras`
--

CREATE TABLE `camaras` (
  `id_camara` int(11) NOT NULL,
  `marca` varchar(50) DEFAULT NULL,
  `modelo` varchar(50) DEFAULT NULL,
  `ubicacion` varchar(100) DEFAULT NULL,
  `tipo` varchar(20) DEFAULT NULL,
  `resolucion` varchar(20) DEFAULT NULL,
  `nro_serie` varchar(50) DEFAULT NULL,
  `fecha_instalacion` date DEFAULT NULL,
  `ip` varchar(50) DEFAULT NULL,
  `id_ubicacion` int(11) DEFAULT NULL,
  `observaciones` text DEFAULT NULL,
  `stock` int(11) DEFAULT 0,
  `stock actual` int(11) DEFAULT 0,
  `stock_actual` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `camaras`
--

INSERT INTO `camaras` (`id_camara`, `marca`, `modelo`, `ubicacion`, `tipo`, `resolucion`, `nro_serie`, `fecha_instalacion`, `ip`, `id_ubicacion`, `observaciones`, `stock`, `stock actual`, `stock_actual`) VALUES
(13, 'HIKVISION', 'DS-2TD2138-35/QY(O-STD)', 'j3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 15, 0, 3),
(14, 'HIKVISION', 'DS-2TD2138-25/QY(O-STD)', '-', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 30, 0, 10),
(15, 'HIKVISION', 'DS-2TD2138-15/QY(O-STD)(B)', '-', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 0, 2),
(16, 'HIKVISION', 'DS-2CD2646G2-IZS(2.8-12mm)(C)(O-STD', '-', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 50, 0, 24),
(17, 'HIKVISION', 'DS-2DF8225IX-AEL(O-STD)(T5)', '-', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 0, 1),
(18, 'HIKVISION', 'DS-2DF8A442IXS-AELY(O-STD)(T5)', '-', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8, 0, 0),
(19, 'HIKVISION', 'DS-9632NI-M8(STD)', '-', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 10, 0, 7),
(20, 'HIKVISION', 'DS-9664NI-M16(STD)', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 0, 4),
(21, 'HIKVISION', 'DS-PA0103-A', '-', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 11, 0, 0),
(22, 'HIKVISION', 'DS-2CE16D0T-VFIR3F', '-', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 6, 0, 3),
(23, 'HIKVISION', 'DS-2CE16C0T-IT5F', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 0, 1),
(24, 'HIKVISION', 'DS-2CD2023G2-I', '-', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 16, 0, 0),
(25, 'HIKVISION', 'DS-2CD2666G2-IZS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, 0, 4),
(26, 'HIKVISION', 'DS-2CD1327G0-L', '-', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0),
(27, 'HIKVISION', 'DVR DS-7216HGHI-K1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 1),
(28, 'HIKVISION', 'DS-7204HGHI-M1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 1),
(29, 'HIKVISION', 'DS7208HQHI-K1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 1),
(30, 'HIKVISION', 'DS-E04HGHI-B', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 1),
(31, 'HIKVISION', 'DS-7608NI-Q2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 1),
(32, 'HIKVISION', 'DS-2CD2T25FWD-I8', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 1),
(33, 'HIKVISION', 'DS-2CD1023G0E-I', '-', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 6, 0, 0),
(34, 'HIKVISION', 'DS-2CE16D0T-EXIPF', '-', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 23, 0, 0),
(35, 'HIKVISION', 'DS-2CD2T23G2-4I', '-', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 1),
(36, 'HIKVISION', 'DS-2CD1123G0E-I', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8, 0, 2),
(37, 'HIKVISION', 'iDS-7732NXI-I4/X©-NVR 32 CH ', 'SEPARADAS PARA EL CANTON(TECSER)', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 0, 2),
(38, 'HIKVISION', 'DS-2TD2138-10/QY-BULLET', 'SEPARADAS PARA VILLA MARIA(DPYM)', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 0, 5),
(39, 'HIKVISION', 'DS-3T0306P-4 PUERTOS POE', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 1),
(40, 'POLARIS', 'UPSK-XION800 INTERACTIVA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 12, 0, 4),
(41, 'POLARIS', 'UPSK-TX-A3000 3KVA ON LINE', '-', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0),
(42, 'POLARIS', 'UPSK-TX-A2000 ON LINE TOWER', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 1),
(43, 'HIKVISION', 'DS-2DF8A442IXS-AELY(O-STD)', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 1),
(44, 'HIKVISION', 'DS-3E1526P-EI/M-24 PUERTOS', '-', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, 0, 0),
(45, 'HIKMICROM', 'HM-TD2638-25/G0/T1Y', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 0, 2),
(46, 'HIKMICROM', 'HM-TD2638-35/G0/T1Y', '-', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 16, 0, 8),
(47, 'HIKVISION', 'DS-PWA32-KS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 1),
(48, 'HIKVISION', 'DS-3E2528(B)', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 1),
(49, 'HIKVISION', 'DS-2TD2628-7-QA', '-', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 0, 3),
(50, 'DAHUA', 'DH-IPC-HDW2449TP-S-IL-0360B', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 6, 0, 6),
(51, 'HUAWEI', 'IPC6225-VRZ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 1),
(52, 'HIKVISION', 'DS-2TD2638-10/QA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 10, 0, 9),
(53, 'DAHUA', 'DH-IPC-HDW5241TMP-ASE-0280B', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 6, 0, 6),
(54, 'DAHUA', 'DH-CS4228-24GT-240', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 0, 2),
(55, 'HIKMICROM', 'HM-TD2638-25/G0/T1Y', 'sas', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8, 0, 7),
(56, '-', 'DH-IS4420-16GT-240', 'J4(SEPARADA OLIVOS)', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 60, 0, 45),
(57, '-', 'F48S2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 86, 0, 81),
(58, '-', 'DH-IS4410-6GT-120', '-', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 69, 0, 69),
(59, '-', 'DH-IS4210-8GT-120', '-', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8, 0, 8),
(60, 'HIKVISION', 'DS-2CD2646G2-IZS(2.8-12mm)(C)(O-STD)', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 223, 0, 113),
(62, 'HIKVISION', 'DS-3E1510P-EI', 'DEPO (LOS OLIVOS)', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, 0, 4),
(63, 'HIKVISION', 'DS-3E1510P-SI', 'DEPO (LOS OLIVOS)', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 11, 0, 11),
(64, 'HIKVISION', 'DS-QAZ1325G1T', 'DEPO (LOS OLIVOS)', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 12, 0, 12),
(65, 'ZURICH', 'NWR99008', 'DEPO (LOS OLIVOS)', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 9, 0, 9),
(66, 'ZURICH', 'FILTRO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 18, 0, 18),
(67, 'HIKVISION', 'DS-QAZ1325G1T', 'Estancia Villa María (Depo)', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 25, 0, 25),
(68, 'HIKVISION', 'DS-3E1510P-SI', 'Estancia Villa María (Depo)', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 29, 0, 29);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id_cliente` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `telefono` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `direccion` varchar(150) DEFAULT NULL,
  `observaciones` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mantenimientos`
--

CREATE TABLE `mantenimientos` (
  `id_mantenimiento` int(11) NOT NULL,
  `id_camara` int(11) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `tecnico` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `salidas`
--

CREATE TABLE `salidas` (
  `id_salida` int(11) NOT NULL,
  `id_camara` int(11) NOT NULL,
  `tecnico` varchar(100) DEFAULT NULL,
  `obra` varchar(100) DEFAULT NULL,
  `salida` varchar(50) DEFAULT NULL,
  `numero_serie` varchar(100) DEFAULT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `salidas`
--

INSERT INTO `salidas` (`id_salida`, `id_camara`, `tecnico`, `obra`, `salida`, `numero_serie`, `cantidad`) VALUES
(40, 13, '-', 'CANTON 16/07/24', NULL, '-', 1),
(41, 13, '-', 'SAN ROQUE 26/09/24', NULL, '-', 3),
(42, 13, '-', 'LA COLINA 04/11/24', NULL, '-', 3),
(44, 13, 'CRISTIAN LUCCA', 'LA CHELTONIA 1/7/2025', NULL, '-', 3),
(45, 13, 'PACHE', '26/09/25', NULL, '-', 2),
(47, 13, 'JOSE BENITEZ', '1/10/25', NULL, '-', 1),
(52, 15, '-', 'SAN ROQUE 26/09/24', NULL, '-', 1),
(53, 15, '-', 'SAN ROQUE 07/10/24', NULL, '-', 2),
(61, 18, '-', 'NAUDIR 07/02/25', NULL, '-', 1),
(62, 19, '-', 'SAN ROQUE 24/09/24', NULL, '-', 1),
(63, 19, 'CRISTIAN LUCCA', 'LA CHELTONIA 1/7/25', NULL, '-', 1),
(64, 19, '-', 'CANTON 11/11/24', NULL, '-', 1),
(72, 26, '-', 'LA COLINA 3/4/25', NULL, '-', 1),
(73, 41, '-', 'MINISTRO DE SEGURIDAD', NULL, '-', 1),
(75, 56, '-', 'CONSULTATIO 29/01/26', NULL, '-', 10),
(76, 57, '-', 'CONSULTATIO 14/01/26', NULL, '-', 3),
(77, 57, '-', 'CONSULTATIO 14/01/26', NULL, '-', 2),
(78, 56, '-', 'CONSULTATIO 14/01/26', NULL, '-', 3),
(79, 56, '-', 'CONSULTATIO 14/01/26', NULL, '-', 2),
(80, 55, '-', 'LA COLINA 12/12/25', NULL, '-', 1),
(81, 13, '-', 'EL NAUDIR 07/02/25', NULL, '-', 2),
(82, 13, '-', 'ABRIL SUR 12/11/25', NULL, '-', 3),
(83, 14, '-', 'LA RANITA CLUB DE CAMPO 13/06/24', NULL, '-', 1),
(84, 14, '-', 'SAN ROQUE 24/09/24', NULL, '-', 4),
(85, 14, '-', 'BARRIO SAN ROQUE 26/09/24', NULL, '-', 5),
(86, 14, '-', 'LA RANITA 23/06/25', NULL, '-', 3),
(87, 14, '-', 'LA RANITA 26/6/25', NULL, '-', 6),
(88, 14, '-', 'LA CHELTONIA 01/07/25', NULL, '-', 1),
(91, 16, '-', 'SAN ROQUE 4/10/24', NULL, '-', 1),
(92, 16, '-', 'EL CANTON 24/02/25', NULL, '-', 1),
(93, 16, '-', 'EL CANTON 31/03/25', NULL, '-', 3),
(94, 16, '-', 'LA CHELTONIA 12/05/25', NULL, '-', 1),
(95, 16, '-', 'EL CANTON 13/05/25', NULL, '-', 1),
(96, 16, '-', 'LA CHELTONIA 01/07/25', NULL, '-', 11),
(97, 16, '-', 'LA CHELTONIA 07/07/25', NULL, '-', 2),
(98, 16, '-', 'LA CHELTONIA 14/07/25', NULL, '-', 2),
(99, 16, '-', 'VENADO TUERTO 13/10/25', NULL, '-', 1),
(100, 16, '-', 'EL CANTON 29/12/25', NULL, '-', 3),
(101, 17, 'PACHE', 'NORTBELL 26/9/25', NULL, '-', 2),
(102, 17, 'JOSE BENITEZ', 'NORTBELL 1/10/25', NULL, '-', 2),
(104, 18, '-', 'LA CHELTONIA 01/07/25', NULL, '-', 3),
(105, 18, '-', 'CONSULTATIO 12/12/25', NULL, '-', 4),
(109, 21, '-', 'LA COLINA 12/07/24', NULL, '-', 5),
(110, 21, '-', '1 LA OLINA 02/10/24', NULL, '-', 1),
(111, 21, '-', 'GMH INTELIGENCIA Y TECNOLOGIA SRL 8/11/24', NULL, '-', 3),
(113, 21, '-', 'LA COLINA 27/6/24', NULL, '-', 2),
(114, 22, '-', 'TIENDA SAN JUAN (MENDOZA) 1/10/25', NULL, '-', 1),
(115, 22, '-', 'GUSTAVO', NULL, '-', 2),
(116, 24, '-', 'CANTON 5/5/24', NULL, '-', 3),
(117, 24, '-', 'LA RANITA 24/5/24', NULL, '-', 1),
(118, 24, '-', 'BARRIO SAN ROQUE', NULL, '-', 1),
(119, 24, 'CLAUDIO ROLANDO', 'RICARDO DOWER 21/3/25', NULL, '-', 5),
(121, 24, 'FRANCO PACHE', 'FINCA SARMIENTO', NULL, '-', 6),
(124, 34, '-', 'CANTON 22/1/25', NULL, '-', 2),
(126, 34, '-', 'WUNDERMAN 27/10/25', NULL, '-', 1),
(128, 34, '-', 'LA COLINA 25/11/25', NULL, '-', 1),
(129, 34, '-', 'MARTIN GASTALDI 29/12/25', NULL, '-', 1),
(130, 34, 'KEVIN CARMONA', 'J.WOLF 8/8/25', NULL, '-', 8),
(131, 34, '-', 'WUNDERMAN 17/07/25', NULL, '-', 5),
(132, 34, '-', '21/8/24', NULL, '-', 5),
(133, 44, '-', 'LA VIZKACHA 21/03/25', NULL, '-', 1),
(134, 44, '-', 'LA RANITA 17/06/25', NULL, '-', 1),
(135, 44, '-', 'OFICINA', NULL, '-', 1),
(136, 49, '-', 'LA COLINA 06/10/25', NULL, '-', 1),
(137, 49, 'PACHE', 'NORTHBELL ', NULL, '-', 1),
(138, 60, '-', 'CONSULTATIO 07/01/26', NULL, '-', 79),
(139, 60, '-', 'CONSULTATIO 12/12/25', NULL, '-', 31),
(140, 46, '-', 'NORTHBELL 26/09/25', NULL, '-', 2),
(141, 46, '-', 'NORTHBELL  01/10/25', NULL, '-', 3),
(142, 46, '-', 'LA COLINA 24/10/25', NULL, '-', 1),
(143, 46, '-', 'ABRIL SUR 12/11/25', NULL, '-', 2),
(144, 23, '-', 'MARTIN GASTALDI', NULL, '-', 1),
(148, 33, '-', 'JWOLF', NULL, '', 2),
(149, 33, '-', 'USO OFICINA', NULL, '-', 4),
(150, 36, '-', 'MARTIN GASTALDI 9/2/26', NULL, '-', 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `telefonia`
--

CREATE TABLE `telefonia` (
  `id_telefono` int(11) NOT NULL,
  `marca` varchar(100) NOT NULL,
  `modelo` varchar(100) NOT NULL,
  `imei` varchar(50) DEFAULT NULL,
  `linea` varchar(50) DEFAULT NULL,
  `ubicacion` varchar(100) DEFAULT NULL,
  `stock` int(11) NOT NULL,
  `stock_actual` int(11) NOT NULL,
  `fecha_alta` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `telefonia`
--

INSERT INTO `telefonia` (`id_telefono`, `marca`, `modelo`, `imei`, `linea`, `ubicacion`, `stock`, `stock_actual`, `fecha_alta`) VALUES
(2, '-', '-', '-', '-', '-', 1, 1, '2026-02-02 19:36:46'),
(3, '-', '-', '-', '-', '-', 1, 1, '2026-02-02 20:01:43'),
(4, '-', '-', '-', '-', '-', 13233, 1, '2026-02-02 20:06:51'),
(5, '-', '-', '-', '-', '-', 33252, 1, '2026-02-02 20:07:02');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ubicaciones`
--

CREATE TABLE `ubicaciones` (
  `id_ubicacion` int(11) NOT NULL,
  `id_cliente` int(11) DEFAULT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `direccion` varchar(150) DEFAULT NULL,
  `descripcion` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `camaras`
--
ALTER TABLE `camaras`
  ADD PRIMARY KEY (`id_camara`),
  ADD KEY `id_ubicacion` (`id_ubicacion`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Indices de la tabla `mantenimientos`
--
ALTER TABLE `mantenimientos`
  ADD PRIMARY KEY (`id_mantenimiento`),
  ADD KEY `id_camara` (`id_camara`);

--
-- Indices de la tabla `salidas`
--
ALTER TABLE `salidas`
  ADD PRIMARY KEY (`id_salida`),
  ADD KEY `id_camara` (`id_camara`);

--
-- Indices de la tabla `telefonia`
--
ALTER TABLE `telefonia`
  ADD PRIMARY KEY (`id_telefono`);

--
-- Indices de la tabla `ubicaciones`
--
ALTER TABLE `ubicaciones`
  ADD PRIMARY KEY (`id_ubicacion`),
  ADD KEY `id_cliente` (`id_cliente`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `camaras`
--
ALTER TABLE `camaras`
  MODIFY `id_camara` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `mantenimientos`
--
ALTER TABLE `mantenimientos`
  MODIFY `id_mantenimiento` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `salidas`
--
ALTER TABLE `salidas`
  MODIFY `id_salida` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=151;

--
-- AUTO_INCREMENT de la tabla `telefonia`
--
ALTER TABLE `telefonia`
  MODIFY `id_telefono` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `ubicaciones`
--
ALTER TABLE `ubicaciones`
  MODIFY `id_ubicacion` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `camaras`
--
ALTER TABLE `camaras`
  ADD CONSTRAINT `camaras_ibfk_1` FOREIGN KEY (`id_ubicacion`) REFERENCES `ubicaciones` (`id_ubicacion`);

--
-- Filtros para la tabla `mantenimientos`
--
ALTER TABLE `mantenimientos`
  ADD CONSTRAINT `mantenimientos_ibfk_1` FOREIGN KEY (`id_camara`) REFERENCES `camaras` (`id_camara`);

--
-- Filtros para la tabla `salidas`
--
ALTER TABLE `salidas`
  ADD CONSTRAINT `salidas_ibfk_1` FOREIGN KEY (`id_camara`) REFERENCES `camaras` (`id_camara`);

--
-- Filtros para la tabla `ubicaciones`
--
ALTER TABLE `ubicaciones`
  ADD CONSTRAINT `ubicaciones_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id_cliente`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
