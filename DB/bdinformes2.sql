-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-07-2020 a las 20:11:42
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.3

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

--
-- Volcado de datos para la tabla `actividad`
--

INSERT INTO `actividad` (`id_actividad`, `act_nombre`, `id_tipo_act`, `id_rubro`, `id_rubro_productos`, `id_informe`) VALUES
(53, 'BOTOS', 1, 9, NULL, 20),
(56, 'Segundo sprint', 1, 9, NULL, 21),
(67, 'Mejorado123456678', 2, 5, 28, 28),
(79, 'ASDASDASD', 2, 1, NULL, 30),
(80, 'asdwsd', 2, 15, NULL, 30),
(81, 'asdasd', 2, 5, 33, 30),
(148, 'asdasd', 1, 1, NULL, 21),
(149, 'asdasd', 1, 5, 44, 21),
(159, 'hola pruebita', 2, 5, 46, 39),
(160, 'feliz', 2, 1, NULL, 39),
(161, 'Conteo por Soles', 2, 16, NULL, 40),
(162, 'Sustentación Tesis', 2, 5, 47, 40),
(163, 'Prueba psicológica', 1, 16, NULL, 41),
(164, 'Sustentación de tesis', 1, 5, 48, 41),
(165, 'actividad 1', 2, 15, NULL, 42),
(166, 'actividad 1.1', 2, 3, NULL, 42),
(167, 'Tesis para obtener el grado Magister', 2, 5, 49, 42),
(168, 'actividad 1.112', 2, 2, NULL, 40),
(169, 'tesis', 2, 5, 50, 40),
(170, 'tesis doctorado', 2, 5, 51, 40),
(181, 'asdasd', 2, 5, 52, 47),
(182, 'actividad 1', 2, 1, NULL, 47),
(202, 'dddd', 2, 1, NULL, 52),
(203, 'ss', 2, 5, 57, 52),
(218, 'WILSON', 2, 4, NULL, 55),
(220, 'wilson123', 2, 4, NULL, 55),
(221, 'hola', 2, 9, NULL, 28),
(222, 'hola', 2, 2, NULL, 28),
(223, '1111', 2, 3, NULL, 28),
(224, 'actividad 1', 2, 1, NULL, 56),
(225, 'ASDASD', 2, 9, NULL, 56),
(226, 'actividad 11', 2, 5, 65, 56),
(227, 'actividad 2', 2, 9, NULL, 57),
(228, '', 2, 5, 66, 57),
(229, 'ajax', 1, 4, NULL, 58),
(230, 'actividad 12', 1, 5, 67, 58);

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
(6, 4, 8),
(7, 1, 9),
(8, 7, 10),
(9, 1, 11),
(10, 1, 12),
(11, 1, 13);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_informe`
--

CREATE TABLE `detalle_informe` (
  `id_det_inf` int(11) NOT NULL,
  `id_jefe` int(11) DEFAULT NULL,
  `titulo_desc` varchar(250) DEFAULT NULL,
  `desc_det` varchar(250) DEFAULT NULL,
  `asunto_det` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `detalle_informe`
--

INSERT INTO `detalle_informe` (`id_det_inf`, `id_jefe`, `titulo_desc`, `desc_det`, `asunto_det`) VALUES
(1, 1, 'prueba', '1234\r\n123\r\n123\r\n123\r\n123                          ', 'prueba RR.HH'),
(2, 1, 'descrición ', 'asdasd\r\nasdasd                       \r\n           ', 'prueba RR.HHsss'),
(3, 1, 'PROBANDO', 'ASDASDASD                            \r\n           ', 'URGENTE'),
(4, 1, 'prueba111111111', 'fasnfailsu lwohanvlgbvnoawjsgn aowshbgo sdag\r\ndf\r\n', 'urgente!!'),
(5, 1, 'pruebita', 'prueba                            \r\n              ', 'pruebita'),
(6, 1, 'Informe Completo de ', 'Señor RR.HH le envío los informes que están correg', 'Presente de adjuntos'),
(7, 1, 'Informe del área de investigación', 'este informe ya está revisado, solicito que se archive.\r\n                        ', 'URGENTE'),
(8, 1, 'Wilson Probando envío reporte a RR.HH', 'asfasodnfaisudf', 'Prueba'),
(9, 1, 'convalidación de Informes', 'informes Correctos', 'importante');

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
  `inf_titulo_col` varchar(100) NOT NULL,
  `inf_descripcion` text DEFAULT NULL,
  `inf_fecha` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `informe`
--

INSERT INTO `informe` (`id_informe`, `id_det_inf`, `id_colaborador`, `id_estado_inf`, `id_periodo`, `inf_titulo_col`, `inf_descripcion`, `inf_fecha`) VALUES
(20, NULL, 7, 1, 20, 'NUEVOONFORME', 'ÑOLDAFBNASLJDFA\r\nSDFADF', '2020-07-16 23:01:11'),
(21, 7, 1, 4, 21, 'Presentación Previa del proyecto MDS', 'Emmanuel que ahsn ehco\"EW\"                               ', '2020-07-17 01:17:11'),
(28, NULL, 1, 1, 28, 'Edción completa', '                                            aefsdsdfsdf                                                                                                                                                                                                                                                                  ', '2020-07-17 02:12:39'),
(30, NULL, 8, 1, 30, 'prueba211', 'aaa         ', '2020-07-17 02:34:38'),
(39, NULL, 1, 1, 39, 'ACTUALIZADO', 'asdasdasd                                                                ', '2020-07-17 15:50:41'),
(40, 8, 10, 4, 40, 'Revisión de la contabilización de salarios', '                                            EL informe de salarios se ha realizado para \r\nsaber cuánto es el saldo que los colaboradores\r\nvan a recibir en su gratificación   \r\nse ha añadido nuevos rubros                                     ', '2020-07-17 16:53:02'),
(41, 8, 11, 4, 41, 'Creatividad', 'Se ha hacho un recuento de los resultados que se ha realizado en un salón\r\npara ver cuanta creatividad tienen.', '2020-07-17 16:57:02'),
(42, 8, 9, 4, 42, 'Revisión de proyectos Scrum', 'Revisión de proyectos...', '2020-07-17 17:01:55'),
(47, NULL, 1, 1, 47, 'rrrr', 'asdasd', '2020-07-17 21:11:59'),
(52, NULL, 1, 1, 52, 'ee', 'asdasd', '2020-07-17 22:58:26'),
(55, NULL, 1, 1, 55, 'asdas', 'asdas', '2020-07-18 16:12:56'),
(56, 9, 10, 4, 56, 'opppp', 'modificado                      ', '2020-07-20 15:04:14'),
(57, 9, 11, 4, 57, 'informe prueba a modificar', 'Redacción de informe', '2020-07-20 15:07:29'),
(58, NULL, 10, 1, 58, 'wdefasdf', 'hola informemde redacción', '2020-07-23 17:53:56');

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
  `periodo_ini` varchar(50) NOT NULL,
  `periodo_fin` varchar(50) NOT NULL,
  `periodo_horas` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `periodo`
--

INSERT INTO `periodo` (`id_periodo`, `periodo_ini`, `periodo_fin`, `periodo_horas`) VALUES
(1, '2020-07-01', '2020-07-08', '4'),
(2, '2020-07-01', '2020-07-08', '4'),
(3, '2020-07-01', '2020-07-06', '6'),
(4, '2020-07-02', '2020-07-09', '6'),
(5, '2020-07-16', '2020-07-16', '12'),
(6, '2020-07-01', '2020-07-08', '4'),
(7, '2020-07-05', '2020-07-14', '6'),
(8, '2020-07-08', '2020-07-09', '10'),
(9, '2020-07-08', '2020-07-09', '10'),
(10, '2020-07-16', '2020-07-17', '4'),
(11, '2020-07-01', '2020-07-04', '15'),
(12, '2020-07-12', '2020-07-12', '3'),
(13, '2020-07-06', '2020-07-07', '1'),
(14, '2020-07-10', '2020-07-12', '5'),
(15, '2020-07-05', '2020-07-06', '2'),
(16, '2020-07-09', '2020-07-10', '111'),
(17, '2020-07-16', '2020-07-16', '16'),
(18, '2020-07-16', '2020-07-16', '25'),
(19, '2020-07-02', '2020-07-03', '5'),
(20, '2020-07-09', '2020-07-10', '6'),
(21, '2020-07-01', '2020-07-03', '4'),
(22, '2020-07-02', '2020-07-04', '5'),
(23, '2020-07-02', '2020-07-04', '4'),
(24, '2020-07-02', '2020-07-04', '6'),
(25, '2020-07-02', '2020-07-04', '4'),
(26, '2020-07-11', '2020-07-11', '1'),
(27, '2020-07-02', '2020-07-04', '6'),
(28, '2020-07-11', '2020-07-16', '6'),
(29, '2020-07-14', '2020-07-16', '35'),
(30, '2020-07-10', '2020-07-17', '6'),
(31, '2020-07-02', '2020-07-17', '6'),
(32, '2020-07-09', '2020-07-15', '6'),
(33, '2020-07-16', '2020-07-15', '6'),
(34, '2020-07-10', '2020-07-17', '6'),
(35, '2020-07-02', '2020-07-08', '4'),
(36, '2020-07-03', '2020-07-09', '4'),
(37, '2020-07-03', '2020-07-04', '6'),
(38, '2020-07-10', '2020-07-08', '5'),
(39, '2020-07-07', '2020-07-07', '6'),
(40, '2020-07-09', '2020-07-10', '5'),
(41, '2020-07-11', '2020-07-12', '6'),
(42, '2020-07-16', '2020-07-16', '15'),
(43, '2020-07-02', '2020-07-04', '6'),
(44, '2020-07-03', '2020-07-02', '6'),
(45, '2020-07-02', '2020-07-08', '6'),
(46, '2020-07-01', '2020-07-03', '4'),
(47, '2020-07-17', '2020-07-17', '6'),
(48, '2020-07-05', '2020-07-06', '6'),
(49, '2020-07-08', '2020-07-09', '5'),
(50, '2020-07-10', '2020-07-11', '6'),
(51, '2020-07-10', '2020-07-11', '6'),
(52, '2020-07-09', '2020-07-11', '6'),
(53, '2020-07-03', '2020-07-04', '6'),
(54, '2020-07-02', '2020-07-11', '6'),
(55, '2020-07-09', '2020-07-08', '4'),
(56, '2020-07-08', '2020-07-10', '5'),
(57, '2020-07-16', '2020-07-17', '6'),
(58, '2020-07-22', '2020-07-23', '5');

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

--
-- Volcado de datos para la tabla `rubro_productos`
--

INSERT INTO `rubro_productos` (`id_rubro_productos`, `pro_titulo`, `pro_autor`, `pro_estado`) VALUES
(1, 'web ventas delivery', 'Juan Peres', 'publicado'),
(4, 'Gestión de Pedidos', 'MArc', 'rechazado'),
(6, 'probando acti2', 'Wilson', 'aceptado'),
(7, 'Arquitectura Empresarial con Togaf', 'José Mendoza', 'aceptado'),
(9, 'web ventas delivery Version10', 'wilson|', 'aceptado'),
(10, 'modal', 'modal autor', 'aceptado'),
(11, 'modal', 'modal autor', 'aceptado'),
(12, 'agregagar desde edicion', 'asdasd', 'publicado'),
(22, 'asdasd', 'asd', 'archivado'),
(23, 'sdfsdfsdf', 'sdfsdf', 'archivado'),
(25, 'TESIS', 'JOSE', 'archivado'),
(26, 'web ventas delivery6516', 'JULIO', 'aceptado'),
(28, 'hola', 'hola', 'publicado'),
(29, 'Sistema de Gestión de Informes Para la Universidad', 'Emmaunel-Wilson-Elmer-Roy', 'revisión'),
(31, 'aaaa', 'aaa', 'aceptado'),
(32, 'eee', 'ee', 'publicado'),
(33, 'ss', 'ss', 'archivado'),
(44, 'asdasd', 'asdasd', 'rechazado'),
(46, 'funcional', 'EWER', 'aceptado'),
(47, 'Diseño de Arquitectura Empresarial Usando el marco', 'Juan Molina Mendoza', 'aceptado'),
(48, 'Demostración de que la motivación en los alumnos p', 'Carmen suarez c.', 'aceptado'),
(49, 'Sistema de Gestión de Informes Para la Universidad', 'Marco Antonio', 'aceptado'),
(50, 'Software', 'José Mendoza', 'archivado'),
(51, 'web ventas delivery', 'jose', 'archivado'),
(52, 'asdasd', 'asdas', 'publicado'),
(53, 'aaaa', 'eeee', 'aceptado'),
(57, 'ss', 'ss', 'aceptado'),
(65, '11', '11', 'rechazado'),
(66, 'web ventas delivery1222223', 'José Mendoza', 'archivado'),
(67, 'prieba', 'asdasd', 'publicado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_actividad`
--

CREATE TABLE `tipo_actividad` (
  `id_tipo_act` int(11) NOT NULL,
  `nomb_tipo_act` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo_actividad`
--

INSERT INTO `tipo_actividad` (`id_tipo_act`, `nomb_tipo_act`) VALUES
(1, 'Actividades Planificadas'),
(2, 'Actividades Realizadas');

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
(8, 8, 'Ramon ', 'Rodriguez Lopez', '74125896'),
(9, 56, 'juan', 'Perez Cotrina', '96969856'),
(10, 57, 'ALex', 'Azanza', '12345678'),
(11, 58, 'elmer', 'Torres', '78963254'),
(12, 59, 'emma', 'alvarez', '96985896'),
(13, 60, 'pedro', 'perez', '98969858');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usu` int(11) NOT NULL,
  `id_tipo_usu` int(11) DEFAULT NULL,
  `usu_nombre` varchar(20) DEFAULT NULL,
  `usu_contra` varchar(20) DEFAULT NULL,
  `estado` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usu`, `id_tipo_usu`, `usu_nombre`, `usu_contra`, `estado`) VALUES
(1, 1, 'EMMAGAR', 'EMMAGAR', 'habilitado'),
(2, 3, 'WPUJAY', 'WPUJAY', 'habilitado'),
(3, 2, 'TROY', 'TROY', 'habilitado'),
(4, 2, 'ETORRES', 'ETORRES', 'habilitado'),
(5, 2, 'JCARLOS', 'JCARLOS', 'habilitado'),
(6, 1, 'maria', 'maria', 'habilitado'),
(7, 2, 'MGutierrez', 'MGutierrez', 'habilitado'),
(8, 2, 'RLOPEZ', 'RLOPEZ', 'habilitado'),
(56, 2, 'juan', 'JUAN123', 'habilitado'),
(57, 2, 'alex', 'alex123', 'habilitado'),
(58, 2, 'Elmer123', 'elmer123', 'habilitado'),
(59, 2, 'emma', 'emmaemma', 'habilitado'),
(60, 2, 'pedro', 'pedropedro', 'habilitado');

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
  MODIFY `id_actividad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=232;

--
-- AUTO_INCREMENT de la tabla `area`
--
ALTER TABLE `area`
  MODIFY `id_area` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `colaborador`
--
ALTER TABLE `colaborador`
  MODIFY `id_colaborador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `detalle_informe`
--
ALTER TABLE `detalle_informe`
  MODIFY `id_det_inf` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `estado_informe`
--
ALTER TABLE `estado_informe`
  MODIFY `id_estado_inf` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `informe`
--
ALTER TABLE `informe`
  MODIFY `id_informe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT de la tabla `jefe`
--
ALTER TABLE `jefe`
  MODIFY `id_jefe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `periodo`
--
ALTER TABLE `periodo`
  MODIFY `id_periodo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT de la tabla `rubro`
--
ALTER TABLE `rubro`
  MODIFY `id_rubro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `rubro_productos`
--
ALTER TABLE `rubro_productos`
  MODIFY `id_rubro_productos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

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
  MODIFY `id_trabajador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `actividad`
--
ALTER TABLE `actividad`
  ADD CONSTRAINT `FK8` FOREIGN KEY (`id_tipo_act`) REFERENCES `tipo_actividad` (`id_tipo_act`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK9` FOREIGN KEY (`id_rubro`) REFERENCES `rubro` (`id_rubro`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_activivad_informes` FOREIGN KEY (`id_informe`) REFERENCES `informe` (`id_informe`) ON DELETE CASCADE ON UPDATE CASCADE,
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
  ADD CONSTRAINT `FK11` FOREIGN KEY (`id_det_inf`) REFERENCES `detalle_informe` (`id_det_inf`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK12` FOREIGN KEY (`id_colaborador`) REFERENCES `colaborador` (`id_colaborador`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK13` FOREIGN KEY (`id_estado_inf`) REFERENCES `estado_informe` (`id_estado_inf`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK15` FOREIGN KEY (`id_periodo`) REFERENCES `periodo` (`id_periodo`) ON DELETE CASCADE ON UPDATE CASCADE;

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
