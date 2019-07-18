-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-07-2019 a las 16:39:24
-- Versión del servidor: 10.1.40-MariaDB
-- Versión de PHP: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `neoranking2`
--
CREATE DATABASE IF NOT EXISTS `neoranking2` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `neoranking2`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `documento`
--

CREATE TABLE `documento` (
  `iddocumento` int(11) NOT NULL,
  `idestudiante` int(11) NOT NULL,
  `tipodocumento` varchar(25) DEFAULT NULL,
  `documento` varchar(120) DEFAULT NULL,
  `descripcion` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiante`
--

CREATE TABLE `estudiante` (
  `idestudiante` int(11) NOT NULL,
  `nombre` varchar(35) NOT NULL,
  `apellidos` varchar(35) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `telefono` varchar(9) NOT NULL,
  `email` varchar(45) NOT NULL,
  `direccion` varchar(60) NOT NULL,
  `anio` int(4) NOT NULL,
  `seccion` varchar(25) NOT NULL,
  `centro_escolar` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `estudiante`
--

INSERT INTO `estudiante` (`idestudiante`, `nombre`, `apellidos`, `fecha_nacimiento`, `telefono`, `email`, `direccion`, `anio`, `seccion`, `centro_escolar`) VALUES
(1, 'Esperanza', 'Dueñas', '2019-06-26', '61720438', 'da13002@gmail.com', 'Santa Ana', 2019, 'B', 'INSA'),
(2, 'Jonathan', 'Ramirez', '2019-06-10', '77101357', 'jonathan@jojo.com', 'Santa ana', 2018, '1B', 'INSA'),
(3, 'Juan', 'Perez', '2019-06-10', '2145-7895', 'coreo@gmail.com', 'Santa Ana', 2018, '1B', 'INSA'),
(13, 'Francisco Javier', 'Flores Perez', '2019-07-08', '77101357', 'test@test.com', 'Santa ana', 2017, 'A', 'INSA'),
(14, 'Fernando Vidal', 'Gonzalez', '2019-07-04', '64784512', 'test@test.com', 'santa ana', 2018, 'B', 'INSA'),
(15, 'Iris Molina ', 'Vega', '2019-06-26', '61720438', 'test@test.com', 'Santa ana', 2019, '1B', 'INSA'),
(16, 'Lola Alvarez ', 'Esteban', '2019-06-10', '61479878', 'test@test.com', 'Santa ana', 2018, 'A', 'INSA'),
(17, 'Nayara ', 'Ruiz Vidal', '2019-06-26', '61720438', 'da13002@gmail.com', 'Santa Ana', 2019, 'B', 'INSA'),
(18, 'Joaquín ', 'Serra Esteban', '2019-06-10', '77101357', 'jonathan@jojo.com', 'Santa ana', 2018, '1B', 'INSA'),
(19, 'Jordi ', 'Rodriguez Blanco', '2019-06-10', '2145-7895', 'coreo@gmail.com', 'Santa Ana', 2018, '1B', 'INSA'),
(20, 'Paola Fuentes ', 'Gutierrez', '2019-07-08', '77101357', 'test@test.com', 'Santa ana', 2017, 'A', 'INSA'),
(21, 'Cristian', ' Rovira Benitez', '2019-07-04', '64784512', 'test@test.com', 'santa ana', 2018, 'B', 'INSA'),
(22, 'Raquel ', 'Dominguez', '2019-06-26', '61720438', 'test@test.com', 'Santa ana', 2019, '1B', 'INSA'),
(23, 'Marta ', 'Hidalgo Cano', '2019-06-10', '61479878', 'test@test.com', 'Santa ana', 2018, 'A', 'INSA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materia`
--

CREATE TABLE `materia` (
  `idmateria` int(11) NOT NULL,
  `idtipo` int(11) NOT NULL,
  `materia` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `materia`
--

INSERT INTO `materia` (`idmateria`, `idtipo`, `materia`) VALUES
(1, 1, 'Computación CCGk'),
(2, 1, 'Ingles'),
(3, 1, 'Matematica'),
(4, 1, 'Valores'),
(5, 1, 'Formacion Lingüistica'),
(6, 2, 'Matematica'),
(7, 2, 'Lenguaje y Literatura'),
(8, 2, 'Sociales'),
(9, 2, 'Ciencias');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nota`
--

CREATE TABLE `nota` (
  `idnota` int(11) NOT NULL,
  `idestudiante` int(11) NOT NULL,
  `idmateria` int(11) NOT NULL,
  `nota_p1` decimal(4,2) NOT NULL,
  `nota_p2` decimal(4,2) NOT NULL,
  `nota_p3` decimal(4,2) NOT NULL,
  `nota_p4` decimal(4,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `nota`
--

INSERT INTO `nota` (`idnota`, `idestudiante`, `idmateria`, `nota_p1`, `nota_p2`, `nota_p3`, `nota_p4`) VALUES
(1, 14, 1, '10.00', '10.00', '10.00', '10.00'),
(2, 14, 2, '0.00', '0.00', '0.00', '0.00'),
(4, 14, 4, '7.00', '6.00', '8.00', '9.00'),
(5, 14, 5, '10.00', '10.00', '10.00', '10.00'),
(6, 14, 6, '9.50', '9.50', '9.50', '8.00'),
(7, 14, 7, '8.00', '9.00', '7.00', '6.20'),
(8, 14, 8, '9.00', '7.00', '10.00', '10.00'),
(9, 14, 9, '8.00', '6.00', '7.00', '10.00'),
(10, 2, 1, '9.00', '7.00', '5.00', '4.00'),
(11, 2, 2, '6.00', '4.00', '7.00', '8.00'),
(13, 2, 4, '6.00', '7.00', '6.00', '1.00'),
(14, 2, 5, '9.00', '7.00', '8.00', '7.00'),
(15, 2, 6, '7.00', '5.00', '6.00', '4.00'),
(16, 2, 7, '9.00', '9.00', '9.00', '9.00'),
(17, 2, 8, '6.00', '9.00', '7.00', '8.00'),
(18, 2, 9, '10.00', '10.00', '10.00', '10.00'),
(24, 13, 1, '10.00', '10.00', '10.00', '10.00'),
(25, 13, 2, '8.00', '8.00', '8.00', '8.00'),
(27, 13, 4, '7.00', '7.00', '7.00', '7.00'),
(29, 13, 5, '7.00', '8.50', '7.30', '8.60'),
(30, 13, 6, '8.00', '8.00', '7.00', '5.00'),
(31, 13, 7, '7.00', '8.00', '8.00', '9.00'),
(32, 13, 8, '9.00', '7.00', '10.00', '10.00'),
(33, 1, 9, '10.00', '9.00', '10.00', '10.00'),
(34, 15, 1, '10.00', '8.00', '8.00', '9.00'),
(35, 15, 2, '7.00', '9.00', '9.00', '7.50'),
(37, 15, 4, '7.00', '6.00', '8.00', '9.00'),
(38, 15, 5, '10.00', '10.00', '10.00', '10.00'),
(39, 15, 6, '9.50', '9.50', '9.50', '8.00'),
(40, 15, 7, '8.00', '9.00', '7.00', '6.20'),
(41, 15, 8, '9.00', '7.00', '10.00', '10.00'),
(42, 15, 9, '8.00', '6.00', '7.00', '10.00'),
(43, 16, 1, '10.00', '10.00', '0.00', '10.00'),
(44, 16, 2, '10.00', '10.00', '10.00', '10.00'),
(46, 16, 4, '10.00', '10.00', '10.00', '10.00'),
(47, 16, 5, '10.00', '10.00', '10.00', '10.00'),
(48, 16, 6, '0.00', '0.00', '0.00', '0.00'),
(49, 16, 7, '10.00', '10.00', '10.00', '10.00'),
(50, 16, 8, '10.00', '10.00', '10.00', '10.00'),
(51, 16, 9, '10.00', '10.00', '10.00', '10.00'),
(52, 14, 4, '10.00', '10.00', '10.00', '10.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reporteap`
--

CREATE TABLE `reporteap` (
  `idreporteap` int(11) NOT NULL,
  `idestudiante` int(11) NOT NULL,
  `idtipo` int(11) NOT NULL,
  `anio` int(4) NOT NULL,
  `seccion` varchar(45) NOT NULL,
  `nota` decimal(4,2) NOT NULL,
  `observaciones` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo`
--

CREATE TABLE `tipo` (
  `idtipo` int(11) NOT NULL,
  `tipo` varchar(45) NOT NULL,
  `descripcion` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo`
--

INSERT INTO `tipo` (`idtipo`, `tipo`, `descripcion`) VALUES
(1, 'CCGK', 'Materias impartidas en el proyecto oportunida'),
(2, 'Centro Escolar', 'Materias impartidas por el ministerio de educ'),
(6, 'Certificaciones', 'Evaluaciones dentro del proyecto Oportunidade');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idusuario` int(11) NOT NULL,
  `nombre` varchar(120) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `apellido` varchar(120) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `rol` char(1) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(60) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idusuario`, `nombre`, `apellido`, `rol`, `email`, `password`) VALUES
(1, 'Esperanza', 'Dueñas', 'A', 'da13002@ues.edu.sv', '$2y$10$ieu0IunJp6YiRJU4tuAmA.qUuYkDezTxcdLlLy/1ninqqrw3iMVTe');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `documento`
--
ALTER TABLE `documento`
  ADD PRIMARY KEY (`iddocumento`),
  ADD KEY `idestudiante` (`idestudiante`);

--
-- Indices de la tabla `estudiante`
--
ALTER TABLE `estudiante`
  ADD PRIMARY KEY (`idestudiante`);

--
-- Indices de la tabla `materia`
--
ALTER TABLE `materia`
  ADD PRIMARY KEY (`idmateria`),
  ADD KEY `idtipo` (`idtipo`);

--
-- Indices de la tabla `nota`
--
ALTER TABLE `nota`
  ADD PRIMARY KEY (`idnota`),
  ADD KEY `idestudiante` (`idestudiante`),
  ADD KEY `idmateria` (`idmateria`);

--
-- Indices de la tabla `reporteap`
--
ALTER TABLE `reporteap`
  ADD PRIMARY KEY (`idreporteap`),
  ADD KEY `idestudiante` (`idestudiante`),
  ADD KEY `idtipo` (`idtipo`);

--
-- Indices de la tabla `tipo`
--
ALTER TABLE `tipo`
  ADD PRIMARY KEY (`idtipo`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idusuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `documento`
--
ALTER TABLE `documento`
  MODIFY `iddocumento` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `estudiante`
--
ALTER TABLE `estudiante`
  MODIFY `idestudiante` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `materia`
--
ALTER TABLE `materia`
  MODIFY `idmateria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `nota`
--
ALTER TABLE `nota`
  MODIFY `idnota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT de la tabla `reporteap`
--
ALTER TABLE `reporteap`
  MODIFY `idreporteap` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipo`
--
ALTER TABLE `tipo`
  MODIFY `idtipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `documento`
--
ALTER TABLE `documento`
  ADD CONSTRAINT `documento_ibfk_1` FOREIGN KEY (`idestudiante`) REFERENCES `estudiante` (`idestudiante`);

--
-- Filtros para la tabla `materia`
--
ALTER TABLE `materia`
  ADD CONSTRAINT `materia_ibfk_1` FOREIGN KEY (`idtipo`) REFERENCES `tipo` (`idtipo`);

--
-- Filtros para la tabla `nota`
--
ALTER TABLE `nota`
  ADD CONSTRAINT `nota_ibfk_1` FOREIGN KEY (`idestudiante`) REFERENCES `estudiante` (`idestudiante`),
  ADD CONSTRAINT `nota_ibfk_2` FOREIGN KEY (`idmateria`) REFERENCES `materia` (`idmateria`);

--
-- Filtros para la tabla `reporteap`
--
ALTER TABLE `reporteap`
  ADD CONSTRAINT `reporteap_ibfk_1` FOREIGN KEY (`idestudiante`) REFERENCES `estudiante` (`idestudiante`),
  ADD CONSTRAINT `reporteap_ibfk_2` FOREIGN KEY (`idtipo`) REFERENCES `tipo` (`idtipo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
