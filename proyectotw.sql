-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 30-05-2022 a las 02:16:42
-- Versión del servidor: 8.0.27
-- Versión de PHP: 7.4.26

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

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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

DROP TABLE IF EXISTS `alumno`;
CREATE TABLE IF NOT EXISTS `alumno` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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

DROP TABLE IF EXISTS `chat_dudas`;
CREATE TABLE IF NOT EXISTS `chat_dudas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `mensaje` varchar(1000) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesor`
--

DROP TABLE IF EXISTS `profesor`;
CREATE TABLE IF NOT EXISTS `profesor` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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

DROP TABLE IF EXISTS `solicitud`;
CREATE TABLE IF NOT EXISTS `solicitud` (
  `codigo` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) DEFAULT NULL,
  `matricula` varchar(9) DEFAULT NULL,
  `carrera` varchar(20) DEFAULT NULL,
  `hora_entrada` int DEFAULT NULL,
  `hora_salida` int DEFAULT NULL,
  `nom_equipo` varchar(20) DEFAULT NULL,
  `descripcion` varchar(200) DEFAULT NULL,
  `num_inventario` int DEFAULT NULL,
  `objetivo_prestamo` varchar(200) DEFAULT NULL,
  `materia` varchar(100) DEFAULT NULL,
  `maestro` varchar(100) DEFAULT NULL,
  `fecha` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `solicitud`
--

INSERT INTO `solicitud` (`codigo`, `nombre`, `matricula`, `carrera`, `hora_entrada`, `hora_salida`, `nom_equipo`, `descripcion`, `num_inventario`, `objetivo_prestamo`, `materia`, `maestro`, `fecha`) VALUES
(1, 'Roger Gómez', 's19015422', 'TECO', 12, 13, 'laptop', 'DELL gris', 1, 'proyecto', 'redes', 'Carlos', '29/05/22'),
(2, 'Ruth Mendez', 's19013572', 'TECO', 10, 14, 'laptop', 'HP blanca', 4, 'tarea', 'programacion', 'Ulises', '29/05/22'),
(3, 'Antonio Platas', 's19012859', 'TECO', 9, 11, 'laptop', 'TOSHIBA negra', 3, 'clase', 'inglés', 'Martha', '29/05/22'),
(4, 'Julio Herrera', 's19013385', 'TECO', 11, 13, 'laptop', 'DELL plateada', 3, 'investigacion', 'algebra', 'Juana', '29/05/22'),
(6, 'Carol Pacheco', 's19016419', 'TECO', 12, 14, 'Lap', 'DELL negra', 1, 'Tarea', 'redes', 'Freddy', '29/05/22');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `created_at`) VALUES
(5, 'user9', '$2y$10$r8HljQAs0WaFPhmxn9HLseqndmKObzyFdGGEqa4n6suSOlxjmzjlW', '2022-05-28 00:47:33'),
(6, 'user10', '$2y$10$g35GUYOlw.Jv/wizPdJ1Du/EC/fjIjEnp1P9AhLGigSeusl0p9qQS', '2022-05-28 01:21:57');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
