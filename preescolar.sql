-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-12-2024 a las 17:53:01
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
-- Base de datos: `preescolar`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos`
--

CREATE TABLE `alumnos` (
  `id` int(11) NOT NULL,
  `nombres` varchar(255) NOT NULL,
  `apellidos` varchar(255) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `cedula_escolar` varchar(20) NOT NULL,
  `grupo` enum('Maternal','Grupo 1','Grupo 2','Grupo 3') NOT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `lugar_nacimiento` varchar(255) DEFAULT NULL,
  `procede_hogar` enum('si','no') DEFAULT NULL,
  `procede_plantel` enum('si','no') DEFAULT NULL,
  `talla_camisa` varchar(10) DEFAULT NULL,
  `talla_pantalon` varchar(10) DEFAULT NULL,
  `talla_zapato` varchar(10) DEFAULT NULL,
  `peso` decimal(5,2) DEFAULT NULL,
  `altura` decimal(5,2) DEFAULT NULL,
  `tipo_parto` enum('normal','cesarea') DEFAULT NULL,
  `vacunas` text DEFAULT NULL,
  `condicion_fisica` text DEFAULT NULL,
  `direccion_habitacion` text DEFAULT NULL,
  `control_ninos_sanos` enum('si','no') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `alumnos`
--

INSERT INTO `alumnos` (`id`, `nombres`, `apellidos`, `foto`, `cedula_escolar`, `grupo`, `fecha_nacimiento`, `lugar_nacimiento`, `procede_hogar`, `procede_plantel`, `talla_camisa`, `talla_pantalon`, `talla_zapato`, `peso`, `altura`, `tipo_parto`, `vacunas`, `condicion_fisica`, `direccion_habitacion`, `control_ninos_sanos`) VALUES
(1, 'Juancho', 'Pérez', 'uploads/IMG_20230914_000216.jpg', '12345678', 'Grupo 2', '2010-05-15', 'Caracas', 'si', 'si', '10', '32', '8', 30.00, 140.00, 'normal', 'BCG, Polio', 'Buena', 'Calle Falsa 123', 'si'),
(2, 'Juan', 'Pérez', 'uploads/juan_perez.jpg', '12345678', 'Grupo 1', '2010-05-15', 'Caracas', 'si', 'si', '10', '32', '8', 30.00, 140.00, 'normal', 'BCG, Polio', 'Buena', 'Calle Falsa 123', 'si'),
(3, 'Juancho', 'Pérez', 'uploads/juan_perez.jpg', '12345678', 'Grupo 2', '2010-05-15', 'Caracas', 'si', 'si', '10', '32', '8', 30.00, 140.00, 'normal', 'BCG, Polio', 'Buena', 'Calle Falsa 123', 'si');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `madres`
--

CREATE TABLE `madres` (
  `id` int(11) NOT NULL,
  `alumno_id` int(11) DEFAULT NULL,
  `nombres` varchar(255) NOT NULL,
  `apellidos` varchar(255) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `cedula` varchar(20) NOT NULL,
  `telefono` varchar(15) DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `nacionalidad` varchar(50) DEFAULT NULL,
  `estado_civil` varchar(50) DEFAULT NULL,
  `grado_instruccion` varchar(50) DEFAULT NULL,
  `numero_hijos` int(11) DEFAULT NULL,
  `hijos_estudian` int(11) DEFAULT NULL,
  `religion` varchar(50) DEFAULT NULL,
  `vive_con_nino` enum('si','no') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `madres`
--

INSERT INTO `madres` (`id`, `alumno_id`, `nombres`, `apellidos`, `foto`, `cedula`, `telefono`, `fecha_nacimiento`, `nacionalidad`, `estado_civil`, `grado_instruccion`, `numero_hijos`, `hijos_estudian`, `religion`, `vive_con_nino`) VALUES
(1, 1, 'María', 'Gómez', 'uploads/IMG_20230914_190754.jpg', '87654322', '04141234568', '1982-07-25', 'Venezolana', 'Casada', 'Universitario', 2, 1, 'Católica', 'si'),
(2, 2, 'María', 'Gómez', 'uploads/maria_gomez.jpg', '87654322', '04141234568', '1982-07-25', 'Venezolana', 'Casada', 'Universitario', 2, 1, 'Católica', 'si'),
(3, 3, 'María', 'Gómez', 'uploads/maria_gomez.jpg', '87654322', '04141234568', '1982-07-25', 'Venezolana', 'Casada', 'Universitario', 2, 1, 'Católica', 'si');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `padres`
--

CREATE TABLE `padres` (
  `id` int(11) NOT NULL,
  `alumno_id` int(11) DEFAULT NULL,
  `nombres` varchar(255) NOT NULL,
  `apellidos` varchar(255) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `cedula` varchar(20) NOT NULL,
  `telefono` varchar(15) DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `nacionalidad` varchar(50) DEFAULT NULL,
  `estado_civil` varchar(50) DEFAULT NULL,
  `grado_instruccion` varchar(50) DEFAULT NULL,
  `numero_hijos` int(11) DEFAULT NULL,
  `hijos_estudian` int(11) DEFAULT NULL,
  `religion` varchar(50) DEFAULT NULL,
  `vive_con_nino` enum('si','no') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `padres`
--

INSERT INTO `padres` (`id`, `alumno_id`, `nombres`, `apellidos`, `foto`, `cedula`, `telefono`, `fecha_nacimiento`, `nacionalidad`, `estado_civil`, `grado_instruccion`, `numero_hijos`, `hijos_estudian`, `religion`, `vive_con_nino`) VALUES
(1, 1, 'Carlos', 'Pérez', 'uploads/IMG_20230914_103431.jpg', '87654321', '04141234567', '1980-03-20', 'Venezolana', 'Casado', 'Universitario', 2, 1, 'Católica', 'si'),
(2, 2, 'Carlos', 'Pérez', 'uploads/carlos_perez.jpg', '87654321', '04141234567', '1980-03-20', 'Venezolana', 'Casado', 'Universitario', 2, 1, 'Católica', 'si'),
(3, 3, 'Carlos', 'Pérez', 'uploads/carlos_perez.jpg', '87654321', '04141234567', '1980-03-20', 'Venezolana', 'Casado', 'Universitario', 2, 1, 'Católica', 'si');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `representantes`
--

CREATE TABLE `representantes` (
  `id` int(11) NOT NULL,
  `alumno_id` int(11) DEFAULT NULL,
  `nombres` varchar(255) NOT NULL,
  `apellidos` varchar(255) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `cedula` varchar(20) NOT NULL,
  `telefono` varchar(15) DEFAULT NULL,
  `correo` varchar(255) NOT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `nacionalidad` varchar(50) DEFAULT NULL,
  `estado_civil` varchar(50) DEFAULT NULL,
  `grado_instruccion` varchar(50) DEFAULT NULL,
  `numero_hijos` int(11) DEFAULT NULL,
  `hijos_estudian` int(11) DEFAULT NULL,
  `religion` varchar(50) DEFAULT NULL,
  `vive_con_nino` enum('si','no') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `representantes`
--

INSERT INTO `representantes` (`id`, `alumno_id`, `nombres`, `apellidos`, `foto`, `cedula`, `telefono`, `correo`, `fecha_nacimiento`, `nacionalidad`, `estado_civil`, `grado_instruccion`, `numero_hijos`, `hijos_estudian`, `religion`, `vive_con_nino`) VALUES
(1, 1, 'Ana', 'López', 'uploads/IMG_20230914_201200.jpg', '87654323', '04141234569', 'anal@gmail.com', '1975-11-30', 'Venezolana', 'Soltera', 'Universitario', 3, 2, 'Católica', 'no'),
(2, 2, 'Ana', 'López', 'uploads/ana_lopez.jpg', '87654323', '04141234569', '', '1975-11-30', 'Venezolana', 'Soltera', 'Universitario', 3, 2, 'Católica', 'no'),
(3, 3, 'Ana', 'López', 'uploads/ana_lopez.jpg', '87654323', '04141234569', 'Scxorepice@gmail.com', '1975-11-30', 'Venezolana', 'Soltera', 'Universitario', 3, 2, 'Católica', 'no');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `madres`
--
ALTER TABLE `madres`
  ADD PRIMARY KEY (`id`),
  ADD KEY `alumno_id` (`alumno_id`);

--
-- Indices de la tabla `padres`
--
ALTER TABLE `padres`
  ADD PRIMARY KEY (`id`),
  ADD KEY `alumno_id` (`alumno_id`);

--
-- Indices de la tabla `representantes`
--
ALTER TABLE `representantes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `alumno_id` (`alumno_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `madres`
--
ALTER TABLE `madres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `padres`
--
ALTER TABLE `padres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `representantes`
--
ALTER TABLE `representantes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `madres`
--
ALTER TABLE `madres`
  ADD CONSTRAINT `madres_ibfk_1` FOREIGN KEY (`alumno_id`) REFERENCES `alumnos` (`id`);

--
-- Filtros para la tabla `padres`
--
ALTER TABLE `padres`
  ADD CONSTRAINT `padres_ibfk_1` FOREIGN KEY (`alumno_id`) REFERENCES `alumnos` (`id`);

--
-- Filtros para la tabla `representantes`
--
ALTER TABLE `representantes`
  ADD CONSTRAINT `representantes_ibfk_1` FOREIGN KEY (`alumno_id`) REFERENCES `alumnos` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
