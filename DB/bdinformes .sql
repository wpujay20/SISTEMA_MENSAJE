-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-07-2020 a las 18:42:04
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bdinformes`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividad`
--

CREATE TABLE `actividad` (
  `id_actividad` int(11) NOT NULL,
  `act_nombre` varchar(40) DEFAULT NULL,
  `id_tipo_act` int(11) DEFAULT NULL,
  `id_rubro` int(11) DEFAULT NULL,
  `id_rubro_productos` int(11) DEFAULT NULL,
  `id_informe` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `area`
--

CREATE TABLE `area` (
  `id_area` int(11) NOT NULL,
  `area_nombre` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `area`
--

INSERT INTO `area` (`id_area`, `area_nombre`) VALUES
(2, 'Calidad'),
(6, 'Innovacion'),
(1, 'Investigacion'),
(3, 'Planificacion'),
(5, 'Responsabilidad Academica'),
(4, 'Responsabilidad Social'),
(7, 'RR.HH');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `colaborador`
--

CREATE TABLE `colaborador` (
  `id_colaborador` int(11) NOT NULL,
  `id_area` int(11) DEFAULT NULL,
  `id_trabajador` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `colaborador`
--

INSERT INTO `colaborador` (`id_colaborador`, `id_area`, `id_trabajador`) VALUES
(1, 1, 3),
(2, 6, 4),
(4, 5, 5),
(5, 7, 7),
(6, 4, 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_informe`
--

CREATE TABLE `detalle_informe` (
  `id_det_inf` int(11) NOT NULL,
  `id_jefe` int(11) DEFAULT NULL,
  `titulo_desc` varchar(20) DEFAULT NULL,
  `desc_det` varchar(50) DEFAULT NULL,
  `asunto_det` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_informe`
--

CREATE TABLE `estado_informe` (
  `id_estado_inf` int(11) NOT NULL,
  `nom_estado_inf` varchar(30) DEFAULT NULL,
  `desc_estado_inf` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `estado_informe`
--

INSERT INTO `estado_informe` (`id_estado_inf`, `nom_estado_inf`, `desc_estado_inf`) VALUES
(1, 'Generado', 'El informe ha sido generado'),
(2, 'Enviado a Jefatura', 'El informe fue enviado al Jefe de Area'),
(3, 'Aprobado por Jefatura', 'El informe fue aprobado por el Jefe de Area'),
(4, 'Enviado a RRHH', 'El informe fue enviado a RRHH'),
(5, 'Archivado', 'El fue revisado y archivado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `informe`
--

CREATE TABLE `informe` (
  `id_informe` int(11) NOT NULL,
  `id_det_inf` int(11) DEFAULT NULL,
  `id_colaborador` int(11) DEFAULT NULL,
  `id_estado_inf` int(11) DEFAULT NULL,
  `id_periodo` int(11) DEFAULT NULL,
  `inf_titulo_col` varchar(80) NOT NULL,
  `inf_descripcion` varchar(10000) DEFAULT NULL,
  `inf_fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jefe`
--

CREATE TABLE `jefe` (
  `id_jefe` int(11) NOT NULL,
  `id_area` int(11) DEFAULT NULL,
  `id_trabajador` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `jefe`
--

INSERT INTO `jefe` (`id_jefe`, `id_area`, `id_trabajador`) VALUES
(1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `periodo`
--

CREATE TABLE `periodo` (
  `id_periodo` int(11) NOT NULL,
  `periodo_ini` varchar(20) NOT NULL,
  `periodo_fin` varchar(20) NOT NULL,
  `periodo_horas` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rubro`
--

CREATE TABLE `rubro` (
  `id_rubro` int(11) NOT NULL,
  `nomb_rubro` varchar(40) DEFAULT NULL,
  `desc_rubro` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `rubro`
--

INSERT INTO `rubro` (`id_rubro`, `nomb_rubro`, `desc_rubro`) VALUES
(1, 'Investigacion', 'proceso intelectual y experimental que comprende un conjunto de métodos aplicados de modo sistemático'),
(2, 'Dictado de Clases', 'Engloba todo lo relacionado a las clases universitarias impartidas por los docentes'),
(3, 'Conferencias', 'formas de comunicación o conversación o intercambio de opiniones y conocimientos entre personas puede ser oral o virtual,? donde se desarrolla una confrontación de ideas'),
(4, 'Asesorias', 'servicio que consiste en bridar información a una persona real o jurídica. Médiate la misma se busca dar un respaldo en un tema que se conoce con gran detalle'),
(5, 'Productos', 'trabajo de carácter científico, habitualmente para obtener el título de doctor en una universidad.'),
(9, 'Evaluacion', 'Consiste en la evaluación de las capacidades de los docentes'),
(15, 'Tecnologias', 'Todo lo relacionado a innovación tecnológica'),
(16, 'Encuestas', 'Esta se encarga del recojo de información de diferentes fuentes de una población especifica');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rubro_productos`
--

CREATE TABLE `rubro_productos` (
  `id_rubro_productos` int(11) NOT NULL,
  `pro_titulo` varchar(50) DEFAULT NULL,
  `pro_autor` varchar(50) DEFAULT NULL,
  `pro_estado` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_actividad`
--

CREATE TABLE `tipo_actividad` (
  `id_tipo_act` int(11) NOT NULL,
  `nomb_tipo_act` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo_actividad`
--

INSERT INTO `tipo_actividad` (`id_tipo_act`, `nomb_tipo_act`) VALUES
(1, 'Actividades Planific'),
(2, 'Actividades Realizad');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_usuario`
--

CREATE TABLE `tipo_usuario` (
  `id_tipo_usu` int(11) NOT NULL,
  `tipo_nombre` varchar(20) DEFAULT NULL,
  `tipo_descripcion` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo_usuario`
--

INSERT INTO `tipo_usuario` (`id_tipo_usu`, `tipo_nombre`, `tipo_descripcion`) VALUES
(1, 'JEFE', 'Usuario encargado de los colaboradores'),
(2, 'COLABORADOR', 'Usuario que redacta los informes'),
(3, 'RR.HH', 'Usuario que archiva los informes convalidados');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trabajador`
--

CREATE TABLE `trabajador` (
  `id_trabajador` int(11) NOT NULL,
  `id_usu` int(11) DEFAULT NULL,
  `nombre` varchar(20) DEFAULT NULL,
  `apellido` varchar(20) DEFAULT NULL,
  `dni` varchar(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `trabajador`
--

INSERT INTO `trabajador` (`id_trabajador`, `id_usu`, `nombre`, `apellido`, `dni`) VALUES
(1, 1, 'Emmanuel', 'Garayar Salvatierra', '75412365'),
(2, 2, 'Wilson', 'Pujay Iglesias', '75632178'),
(3, 3, 'Roy Axel', 'Torres Jurado', '74125631'),
(4, 4, 'Elmer Moises', 'Torres Ferreyra', '75236001'),
(5, 5, 'Jose Carlos', 'Ramirez Lopez', '78963528'),
(6, 6, 'Maria', 'Gutierrez', '74741985'),
(7, 7, 'ALVARO', 'ALVARO', '78965412'),
(8, 8, 'Ramon ', 'Rodriguez Lopez', '74125896');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usu` int(11) NOT NULL,
  `id_tipo_usu` int(11) DEFAULT NULL,
  `usu_nombre` varchar(20) DEFAULT NULL,
  `usu_contra` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usu`, `id_tipo_usu`, `usu_nombre`, `usu_contra`) VALUES
(1, 1, 'EMMAGAR', 'EMMAGAR'),
(2, 3, 'WPUJAY', 'WPUJAY'),
(3, 2, 'TROY', 'TROY'),
(4, 2, 'ETORRES', 'ETORRES'),
(5, 2, 'JCARLOS', 'JCARLOS'),
(6, 3, 'JOSE', 'JOSE'),
(7, 2, 'MGutierrez', 'MGutierrez'),
(8, 2, 'RLOPEZ', 'RLOPEZ');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `actividad`
--
ALTER TABLE `actividad`
  ADD PRIMARY KEY (`id_actividad`),
  ADD KEY `FK8` (`id_tipo_act`),
  ADD KEY `FK9` (`id_rubro`),
  ADD KEY `FK_activivad_informes` (`id_informe`),
  ADD KEY `FK_activivad_rubro_productos` (`id_rubro_productos`);

--
-- Indices de la tabla `area`
--
ALTER TABLE `area`
  ADD PRIMARY KEY (`id_area`),
  ADD UNIQUE KEY `area_nombre` (`area_nombre`);

--
-- Indices de la tabla `colaborador`
--
ALTER TABLE `colaborador`
  ADD PRIMARY KEY (`id_colaborador`),
  ADD KEY `FK20` (`id_area`),
  ADD KEY `FK21` (`id_trabajador`);

--
-- Indices de la tabla `detalle_informe`
--
ALTER TABLE `detalle_informe`
  ADD PRIMARY KEY (`id_det_inf`),
  ADD KEY `FK10` (`id_jefe`);

--
-- Indices de la tabla `estado_informe`
--
ALTER TABLE `estado_informe`
  ADD PRIMARY KEY (`id_estado_inf`);

--
-- Indices de la tabla `informe`
--
ALTER TABLE `informe`
  ADD PRIMARY KEY (`id_informe`),
  ADD KEY `FK11` (`id_det_inf`),
  ADD KEY `FK12` (`id_colaborador`),
  ADD KEY `FK13` (`id_estado_inf`),
  ADD KEY `FK15` (`id_periodo`);

--
-- Indices de la tabla `jefe`
--
ALTER TABLE `jefe`
  ADD PRIMARY KEY (`id_jefe`),
  ADD KEY `FK5` (`id_area`),
  ADD KEY `FK6` (`id_trabajador`);

--
-- Indices de la tabla `periodo`
--
ALTER TABLE `periodo`
  ADD PRIMARY KEY (`id_periodo`);

--
-- Indices de la tabla `rubro`
--
ALTER TABLE `rubro`
  ADD PRIMARY KEY (`id_rubro`),
  ADD UNIQUE KEY `nomb_rubro` (`nomb_rubro`);

--
-- Indices de la tabla `rubro_productos`
--
ALTER TABLE `rubro_productos`
  ADD PRIMARY KEY (`id_rubro_productos`);

--
-- Indices de la tabla `tipo_actividad`
--
ALTER TABLE `tipo_actividad`
  ADD PRIMARY KEY (`id_tipo_act`);

--
-- Indices de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  ADD PRIMARY KEY (`id_tipo_usu`);

--
-- Indices de la tabla `trabajador`
--
ALTER TABLE `trabajador`
  ADD PRIMARY KEY (`id_trabajador`),
  ADD KEY `FK2` (`id_usu`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usu`),
  ADD UNIQUE KEY `usu_nombre` (`usu_nombre`),
  ADD KEY `FK1` (`id_tipo_usu`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `actividad`
--
ALTER TABLE `actividad`
  MODIFY `id_actividad` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `area`
--
ALTER TABLE `area`
  MODIFY `id_area` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `colaborador`
--
ALTER TABLE `colaborador`
  MODIFY `id_colaborador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `detalle_informe`
--
ALTER TABLE `detalle_informe`
  MODIFY `id_det_inf` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `estado_informe`
--
ALTER TABLE `estado_informe`
  MODIFY `id_estado_inf` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `informe`
--
ALTER TABLE `informe`
  MODIFY `id_informe` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `jefe`
--
ALTER TABLE `jefe`
  MODIFY `id_jefe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `periodo`
--
ALTER TABLE `periodo`
  MODIFY `id_periodo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `rubro`
--
ALTER TABLE `rubro`
  MODIFY `id_rubro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `rubro_productos`
--
ALTER TABLE `rubro_productos`
  MODIFY `id_rubro_productos` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipo_actividad`
--
ALTER TABLE `tipo_actividad`
  MODIFY `id_tipo_act` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  MODIFY `id_tipo_usu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `trabajador`
--
ALTER TABLE `trabajador`
  MODIFY `id_trabajador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `actividad`
--
ALTER TABLE `actividad`
  ADD CONSTRAINT `FK8` FOREIGN KEY (`id_tipo_act`) REFERENCES `tipo_actividad` (`id_tipo_act`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK9` FOREIGN KEY (`id_rubro`) REFERENCES `rubro` (`id_rubro`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_activivad_informes` FOREIGN KEY (`id_informe`) REFERENCES `informe` (`id_informe`),
  ADD CONSTRAINT `FK_activivad_rubro_productos` FOREIGN KEY (`id_rubro_productos`) REFERENCES `rubro_productos` (`id_rubro_productos`);

--
-- Filtros para la tabla `colaborador`
--
ALTER TABLE `colaborador`
  ADD CONSTRAINT `FK20` FOREIGN KEY (`id_area`) REFERENCES `area` (`id_area`),
  ADD CONSTRAINT `FK21` FOREIGN KEY (`id_trabajador`) REFERENCES `trabajador` (`id_trabajador`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `detalle_informe`
--
ALTER TABLE `detalle_informe`
  ADD CONSTRAINT `FK10` FOREIGN KEY (`id_jefe`) REFERENCES `jefe` (`id_jefe`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `informe`
--
ALTER TABLE `informe`
  ADD CONSTRAINT `FK11` FOREIGN KEY (`id_det_inf`) REFERENCES `detalle_informe` (`id_det_inf`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK12` FOREIGN KEY (`id_colaborador`) REFERENCES `colaborador` (`id_colaborador`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK13` FOREIGN KEY (`id_estado_inf`) REFERENCES `estado_informe` (`id_estado_inf`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK15` FOREIGN KEY (`id_periodo`) REFERENCES `periodo` (`id_periodo`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `jefe`
--
ALTER TABLE `jefe`
  ADD CONSTRAINT `FK5` FOREIGN KEY (`id_area`) REFERENCES `area` (`id_area`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK6` FOREIGN KEY (`id_trabajador`) REFERENCES `trabajador` (`id_trabajador`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `trabajador`
--
ALTER TABLE `trabajador`
  ADD CONSTRAINT `FK2` FOREIGN KEY (`id_usu`) REFERENCES `usuario` (`id_usu`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `FK1` FOREIGN KEY (`id_tipo_usu`) REFERENCES `tipo_usuario` (`id_tipo_usu`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
