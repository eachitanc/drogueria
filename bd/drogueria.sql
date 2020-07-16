-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-07-2020 a las 04:31:07
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `drogueria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallefactura`
--

CREATE TABLE `detallefactura` (
  `id_fact` int(11) NOT NULL,
  `id_med` varchar(20) COLLATE utf8_bin NOT NULL,
  `cant_med` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `detallefactura`
--

INSERT INTO `detallefactura` (`id_fact`, `id_med`, `cant_med`) VALUES
(145, 'mv_002', 4),
(145, 'mv_008', 3),
(145, 'mv_011', 4),
(146, 'mv_002', 3),
(146, 'mv_003', 1),
(149, 'mv_009', 2),
(149, 'mv_014', 2),
(151, 'mv_002', 2),
(151, 'mv_003', 1),
(153, 'mv_002', 1),
(153, 'mv_003', 3),
(160, 'mv_002', 2),
(162, 'mv_002', 2),
(162, 'mv_004', 5),
(162, 'mv_009', 3),
(162, 'mv_011', 4),
(164, 'mv_002', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

CREATE TABLE `factura` (
  `id_fac` int(11) NOT NULL,
  `id_cliente` varchar(20) COLLATE utf8_bin NOT NULL,
  `fecha_exp` date NOT NULL,
  `total` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `factura`
--

INSERT INTO `factura` (`id_fac`, `id_cliente`, `fecha_exp`, `total`) VALUES
(145, 'hailyn', '2020-07-14', 124250),
(146, 'hailyn', '2020-07-14', 60840),
(149, 'edwin', '2020-07-14', 58866),
(151, 'edwin', '2020-07-14', 48440),
(153, 'edwin', '2020-07-14', 63440),
(160, 'admin', '2020-07-15', 24800),
(162, 'admin', '2020-07-16', 172300),
(164, 'coral', '2020-07-16', 37200),
(166, 'admin', '2020-07-16', NULL),
(167, 'admin', '2020-07-16', NULL),
(168, 'admin', '2020-07-16', NULL),
(169, 'admin', '2020-07-16', NULL),
(170, 'admin', '2020-07-16', NULL),
(171, 'admin', '2020-07-16', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medicamentos`
--

CREATE TABLE `medicamentos` (
  `id_medicamento` varchar(20) COLLATE utf8_bin NOT NULL,
  `nom_medicamento` varchar(100) COLLATE utf8_bin NOT NULL,
  `cant_med_disp` int(11) NOT NULL,
  `val_unitario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `medicamentos`
--

INSERT INTO `medicamentos` (`id_medicamento`, `nom_medicamento`, `cant_med_disp`, `val_unitario`) VALUES
('mv_002', 'ASPIRINA 100MG CAJA X 28 TABLETAS', 5, 12400),
('mv_003', 'VICK VAPORUB UNGUENTO FRASCO X 50 GRAMOS', 5, 13700),
('mv_004', 'TAPABOCA SWINLINE FILTRO HASTA EN 95/100', 10, 15400),
('mv_005', 'ALCOHOL DULCE MARIA 70% X1000ML', 10, 16700),
('mv_006', 'CENTRUM SILVER X 100 TABLETAS', 5, 62400),
('mv_007', 'ENGYSTOL CAJA X 50 TABLETAS', 5, 59350),
('mv_008', 'ALCOHOL OSA ANTISEPTICO X 750ML', 5, 6000),
('mv_009', 'GEL ANTIBACTERIAL ELEMENTAL X 480ML', 7, 12900),
('mv_010', 'GOMAS BENET ZINC + VITAMINA C X 60UND', 10, 18000),
('mv_011', 'VICK PASTILLAS CEREZA REFRESCANTES X 5 SOBRES', 11, 7950),
('mv_012', 'COLAGENO COMPLEX FRASCO X 60 CAPSULAS', 5, 30350),
('mv_013', 'ACEITE ALMENDRAS NATURAL FRESHLY 240ML', 5, 21300),
('mv_014', 'ACETAMINOFEN 500MG CAJA X 100 TABLETAS', 5, 16533),
('mv_015', 'DOLEX ACTIVGEL 500MG X 24 C?PSULAS LIQUIDAS', 10, 25700),
('mv_016', 'METFORMINA 850 MG CAJA X 30 TABLETAS', 10, 10500),
('mv_017', 'GUMIVIT VITAMINA C EN GOMAS X 12 SOBRES', 6, 11500),
('mv_018', 'LOSARTAN 50MG X 30 TABLETAS GENFAR', 6, 14400),
('mv_019', 'AGUA OXIGENADA JGB X 120ML(ANTISEPTICO)', 12, 3900),
('mv_020', 'ALKA-SELTZER ORIGINAL X 14 TABLETAS', 5, 12200),
('mv_021', 'ASPIRINA EFERVESCENTE 500 MG CAJA X 12 TABLETAS', 10, 12550),
('mv_022', 'IVERMECTINA 0.6% GOTAS FRASCO X 5ML', 10, 13900),
('mv_023', 'VITAMIN D3 400IU FRASCO X 100 TABLETAS', 5, 33300),
('mv_024', 'ALGODON JGB POMOS X 100G', 15, 5450),
('mv_025', 'OFERTA SHOT-B MULTIVITAMINICO X 2 CAJAS X 30 CAPSULAS', 5, 41200),
('mv_026', 'CENTRUM WOMEN X 30 TABLETAS', 5, 32400),
('mv_027', 'CENTRUM MEN X 60 TABLETAS', 5, 58900),
('mv_028', 'GUANTES ALFA SAFE LATEX 8 1/2 X 12 PARES', 20, 9750),
('mv_029', 'VALERIANA VALSELED SOLUCION ORAL SEDANTE 60ML', 20, 7300),
('mv_030', 'JERINGA X 20ML.MEDISPO', 20, 500),
('mv_031', 'EMULSION SCOTT FRUTAS TROPICALES X 450ML', 10, 19750),
('mv_032', 'OMEPRAZOL 20MG CAJA X 30 CAPSULAS A.G.', 10, 10350),
('mv_033', 'CALMIDOL MAX CAJA X 6 TABLETAS', 20, 7950),
('mv_034', 'DOXICICLINA 100MG CAJA X 10 TAB WINTHROP', 15, 5850),
('mv_035', 'ISODINE SOLUCION FRASCO X 60 MLT', 17, 9450),
('mv_036', 'BUSCAPINA FEM CAJA X 6 COMPRIMIDOS', 10, 6800);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `usuario` varchar(20) COLLATE utf8_bin NOT NULL,
  `correo` varchar(50) COLLATE utf8_bin NOT NULL,
  `contrasena` varchar(200) COLLATE utf8_bin NOT NULL,
  `tipo` varchar(10) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `usuario`, `correo`, `contrasena`, `tipo`) VALUES
(1, 'admin', 'eachitanc@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'admin'),
(65, 'coral', 'coral@hotmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'cliente'),
(88, 'edwin', 'edwin@yahoo.com', '8cb2237d0679ca88db6464eac60da96345513964', 'admin'),
(94, 'hailyn', 'hailyn@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', 'cliente'),
(96, 'albeiro', 'albeiro@gmail.com', '33750d1b0f657790280636bd7f58f36025f3224d', 'vendedor'),
(97, 'eachitanc', 'eachitansc@gtmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'vendedor'),
(100, 'dayana', 'dayana@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', 'cliente'),
(101, 'silvia', 'silvia@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', 'admin'),
(103, 'david', 'david@hotmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'cliente'),
(104, 'chitan', 'chitan@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'vendedor');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `detallefactura`
--
ALTER TABLE `detallefactura`
  ADD KEY `fkfactura` (`id_fact`),
  ADD KEY `fkmedicamento` (`id_med`);

--
-- Indices de la tabla `factura`
--
ALTER TABLE `factura`
  ADD PRIMARY KEY (`id_fac`),
  ADD KEY `fkusuario` (`id_cliente`);

--
-- Indices de la tabla `medicamentos`
--
ALTER TABLE `medicamentos`
  ADD PRIMARY KEY (`id_medicamento`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `correo` (`correo`),
  ADD UNIQUE KEY `usuario` (`usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `factura`
--
ALTER TABLE `factura`
  MODIFY `id_fac` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=172;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detallefactura`
--
ALTER TABLE `detallefactura`
  ADD CONSTRAINT `fkfactura` FOREIGN KEY (`id_fact`) REFERENCES `factura` (`id_fac`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fkmedicamento` FOREIGN KEY (`id_med`) REFERENCES `medicamentos` (`id_medicamento`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `factura`
--
ALTER TABLE `factura`
  ADD CONSTRAINT `fkusuario` FOREIGN KEY (`id_cliente`) REFERENCES `usuario` (`usuario`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
