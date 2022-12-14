-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-10-2022 a las 07:44:12
-- Versión del servidor: 10.4.25-MariaDB
-- Versión de PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bdservis`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios`
--

CREATE TABLE `servicios` (
  `id` int(10) NOT NULL,
  `cups` varchar(20) NOT NULL,
  `descripcion` varchar(500) NOT NULL,
  `valor` decimal(20,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `servicios`
--

INSERT INTO `servicios` (`id`, `cups`, `descripcion`, `valor`) VALUES
(24, '883522', 'RESONANCIA MAGNÉTICA DE ARTICULACIONES DE MIEMBRO INFERIOR (ESPECÍFICO)', '350775'),
(25, '883210', 'RESONANCIA MAGNÉTICA DE COLUMNA CERVICAL SIMPLE', '457543'),
(26, '883220', 'RESONANCIA MAGNÉTICA DE COLUMNA TORÁCICA SIMPLE', '457543'),
(27, '883440', 'RESONANCIA MAGNÉTICA DE PELVIS SIMPLE', '457543'),
(28, '883230', 'RESONANCIA MAGNÉTICA DE COLUMNA LUMBOSACRA SIMPLE', '457543'),
(29, '883109', 'RESONANCIA MAGNÉTICA DE OIDOS SIMPLE', '457543'),
(30, '883401', 'RESONANCIA MAGNÉTICA DE ABDOMEN', '457543'),
(31, '20030187-10', 'MEDIO DE CONTRASTE PARA RESONANCIA', '180000'),
(32, '998702', 'SOPORTE DE SEDACIÓN PARA CONSULTA O APOYO DIAGNÓSTICO RESONANCIA', '300000'),
(33, '879205', 'TOMOGRAFÍA COMPUTADA DE COLUMNA SEGMENTOS CERVICAL, TORÁCICO, LUMBAR O SACRO, COMPLEMENTO A MIELOGRAFÍA (CADA SEGMENTO)', '112837'),
(34, '879122', 'TOMOGRAFÍA COMPUTADA DE OIDO, PEÑASCO Y CONDUCTO AUDITIVO INTERNO', '133156'),
(35, '883103', 'RESONANCIA MAGNÉTICA DE ÓRBITAS', '457543'),
(36, '879520', 'TOMOGRAFIA AXIAL COMPUTADA DE MIEMBROS INFERIORES Y ARTICULACIONES', '103500'),
(37, '879201', 'TOMOGRAFÍA COMPUTADA DE COLUMNA SEGMENTOS CERVICAL, TORÁCICO, LUMBAR O SACRO, POR CADA NIVEL (TRES ESPACIOS)', '81168'),
(38, '998702-1', 'SOPORTE DE SEDACIÓN PARA CONSULTA O APOYO DIAGNÓSTICO TOMOGRAFIA', '180000'),
(39, '601101', 'BIOPSIA CERRADA DE PROSTATA POR ABORDAJE TRANSRECTAL (ECODIRIGIDA)', '1062500'),
(40, '61100', 'BIOPSIA DE TIROIDES GUIADA POR ECOGRAFIA DE TIROIDES', '937500'),
(41, '881112', 'ECOGRAFÍA CEREBRAL TRANSFONTANELAR CON TRANSDUCTOR DE 7.MHZ O MÁS', '43962');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `servicios`
--
ALTER TABLE `servicios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `servicios`
--
ALTER TABLE `servicios`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
