-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-06-2022 a las 23:53:47
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyectotw`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `created_at`) VALUES
(1, '', '$2y$10$002MoJoV6kIKnjl0OnJK.eyqkwtOSZ8/2Y.YJVvq2mRnSdYlT/KTu', '2022-05-23 21:55:00'),
(3, 'aridai', '$2y$10$KxXbd0THc/WOWAsxfcI4AePSz5BTlHHDUEBDo1iuA1QvrXhKkPaR2', '2022-05-23 21:56:58'),
(4, 'laaris', '$2y$10$Uy2OzoOjETehs5fT3mcgMOzwt11n5TV799KxTqXTLnCErL/vInTOW', '2022-05-23 21:57:14'),
(5, 'user6', '$2y$10$EoTTqypbOsXyAZqyPQFzsOS0VfzRS5i0znmi15bRk2yd49tBsijr.', '2022-05-25 18:20:38');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumno`
--

CREATE TABLE `alumno` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `alumno`
--

INSERT INTO `alumno` (`id`, `username`, `password`, `created_at`) VALUES
(1, 'userA', '$2y$10$eTH8SO3rqxCjs8n2gNbVGukqiDZdWFPSPQe1ii6nvWWUzeuwc8rkK', '2022-05-23 15:53:32'),
(2, 'user2', '123456', '2022-05-24 21:17:02'),
(3, 'user3', '$2y$10$wAgQTIHC/Fbhm40K76yrUepl0nlo4zA.aiME1t4WDKdHRq8ceFNoa', '2022-05-25 18:07:02'),
(7, 'user8', '1234', '2022-05-28 00:44:01'),
(8, 'user11', '$2y$10$d1XNc/A6SmjDKVMx4eP99OltMFFOO0gKsr9GKYO2xHjrYfGwH1tmi', '2022-05-28 01:24:04');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `chat_dudas`
--

CREATE TABLE `chat_dudas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `mensaje` varchar(1000) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `computadora`
--

CREATE TABLE `computadora` (
  `id` int(11) NOT NULL,
  `ip` varchar(50) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `estado` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `computadora`
--

INSERT INTO `computadora` (`id`, `ip`, `nombre`, `estado`) VALUES
(1, '192.168.1.5', 'Computadora 1W', 'Ocupado'),
(2, '192.168.1.2', 'Computadora 2W', 'Disponible'),
(3, '192.168.1.4', 'Computadora 4W', 'Disponible');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesor`
--

CREATE TABLE `profesor` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `profesor`
--

INSERT INTO `profesor` (`id`, `username`, `password`, `created_at`) VALUES
(1, 'ariss', '$2y$10$ffqI.0HdVu.ZohT8yuMBxeWE45gKXPBwM2pFOEESfzs5LiwYN55Oi', '2022-05-23 21:58:54'),
(2, 'user12', '$2y$10$ornto.N8ggr3JLpesKjI3ua5mXKKJNyln2GEo/MbFS1fnyOyTUMLe', '2022-05-28 01:26:47'),
(3, 'usario15', '$2y$10$4hKaqxfM8gG/0KmsrEM4peCq9gHiiNsawCEczzXAWRTT6cda44/v.', '2022-05-29 20:31:15');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitud`
--

CREATE TABLE `solicitud` (
  `codigo` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `matricula` varchar(20) DEFAULT NULL,
  `carrera` varchar(20) DEFAULT NULL,
  `hora_entrada` time(6) DEFAULT NULL,
  `hora_salida` time(6) NOT NULL,
  `nom_equipo` varchar(20) DEFAULT NULL,
  `descripcion` varchar(200) DEFAULT NULL,
  `num_inventario` int(100) DEFAULT NULL,
  `objetivo_prestamo` varchar(200) DEFAULT NULL,
  `materia` varchar(100) DEFAULT NULL,
  `maestro` varchar(100) DEFAULT NULL,
  `fecha` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `solicitud`
--

INSERT INTO `solicitud` (`codigo`, `nombre`, `matricula`, `carrera`, `hora_entrada`, `hora_salida`, `nom_equipo`, `descripcion`, `num_inventario`, `objetivo_prestamo`, `materia`, `maestro`, `fecha`) VALUES
(1, 'Roger Gómez', 's19015422', 'TECO', '00:00:00.000000', '00:00:00.000000', 'laptop', 'DELL gris', 1, 'proyecto', 'redes', 'Carlos', '2029-05-22'),
(2, 'Ruth Mendez', 's19013572', 'TECO', '00:00:00.000000', '00:00:00.000000', 'laptop', 'HP blanca', 4, 'tarea', 'programacion', 'Ulises', '2029-05-22'),
(3, 'Antonio Platas', 's19012859', 'TECO', '00:00:00.000000', '00:00:00.000000', 'laptop', 'TOSHIBA negra', 3, 'clase', 'inglés', 'Martha', '2029-05-22'),
(4, 'Julio Herrera', 's19013385', 'TECO', '00:00:00.000000', '00:00:00.000000', 'laptop', 'DELL plateada', 3, 'investigacion', 'algebra', 'Juana', '2029-05-22'),
(6, 'Carol Pacheco', 's19016419', 'TECO', '00:00:00.000000', '00:00:00.000000', 'Lap', 'DELL negra', 1, 'Tarea', 'redes', 'Freddy', '2029-05-22'),
(14, 'Raquel', 's12323323', 'TECO', '00:00:00.000000', '00:00:00.000000', 'Lap', 'HP NEGRA', 11, 'Tarea', 'Progra', 'carol', '0000-00-00'),
(15, 'Esteban Joaquin', 's632', 'TECO', '05:59:15.000000', '16:20:00.000000', 'Lap', 'REF', 1, 'Tarea', 'Progra', 'carol', '0000-00-00'),
(21, 'Jair', 's12234567', 'TECO', '09:13:28.000000', '16:20:00.000000', 'Lap', 'HP NEGRA', 1, 'Tarea', 'Progra', 'ana', '0000-00-00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `created_at`) VALUES
(5, 'user9', '$2y$10$r8HljQAs0WaFPhmxn9HLseqndmKObzyFdGGEqa4n6suSOlxjmzjlW', '2022-05-28 00:47:33'),
(6, 'user10', '$2y$10$g35GUYOlw.Jv/wizPdJ1Du/EC/fjIjEnp1P9AhLGigSeusl0p9qQS', '2022-05-28 01:21:57');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indices de la tabla `alumno`
--
ALTER TABLE `alumno`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indices de la tabla `chat_dudas`
--
ALTER TABLE `chat_dudas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `computadora`
--
ALTER TABLE `computadora`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `profesor`
--
ALTER TABLE `profesor`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indices de la tabla `solicitud`
--
ALTER TABLE `solicitud`
  ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `alumno`
--
ALTER TABLE `alumno`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `chat_dudas`
--
ALTER TABLE `chat_dudas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `computadora`
--
ALTER TABLE `computadora`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `profesor`
--
ALTER TABLE `profesor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `solicitud`
--
ALTER TABLE `solicitud`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;


