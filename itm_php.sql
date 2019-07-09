-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-05-2018 a las 02:24:10
-- Versión del servidor: 10.1.28-MariaDB
-- Versión de PHP: 7.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `itm_php`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autor`
--

CREATE TABLE `autor` (
  `id_autor` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id_categoria` int(11) UNSIGNED NOT NULL,
  `nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id_categoria`, `nombre`) VALUES
(1, 'Desarrollo'),
(2, 'Sql Server'),
(3, 'My sql'),
(4, 'Redes'),
(5, 'IngenierÃ­a');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `creacion_obj`
--

CREATE TABLE `creacion_obj` (
  `autor_id` int(10) UNSIGNED NOT NULL,
  `objecto_id` int(10) UNSIGNED NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `formato`
--

CREATE TABLE `formato` (
  `id_formato` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(80) NOT NULL,
  `extension` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `idioma`
--

CREATE TABLE `idioma` (
  `id_idioma` int(11) UNSIGNED NOT NULL,
  `nombre` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `objecto`
--

CREATE TABLE `objecto` (
  `id_objecto` int(10) UNSIGNED NOT NULL,
  `tema_id` int(10) UNSIGNED NOT NULL,
  `idioma_id` int(10) UNSIGNED NOT NULL,
  `formato_id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(80) NOT NULL,
  `descripcion` varchar(500) NOT NULL,
  `palabra_clave` varchar(80) NOT NULL,
  `entidad` varchar(80) NOT NULL,
  `version` varchar(50) NOT NULL,
  `instalacion` varchar(50) NOT NULL,
  `requerimientos` varchar(100) NOT NULL,
  `contexto_aprendizaje` varchar(100) NOT NULL,
  `nivel_interactividad` varchar(100) NOT NULL,
  `poblacion` varchar(100) NOT NULL,
  `costo` varchar(100) NOT NULL,
  `ruta` varchar(100) NOT NULL,
  `tipo_scorm` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subcategoria`
--

CREATE TABLE `subcategoria` (
  `id_subcategoria` int(10) UNSIGNED NOT NULL,
  `categoria_id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `subcategoria`
--

INSERT INTO `subcategoria` (`id_subcategoria`, `categoria_id`, `nombre`) VALUES
(1, 1, 'PHP Nativo'),
(2, 1, 'Ember JS'),
(3, 1, 'Angular Js '),
(4, 1, 'Java Netbeans'),
(5, 5, 'IngenierÃ­a Software 2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tema`
--

CREATE TABLE `tema` (
  `id_tema` int(10) UNSIGNED NOT NULL,
  `subcategoria_id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(200) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `pass` varchar(1000) DEFAULT NULL,
  `documento` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `username`, `pass`, `documento`) VALUES
(4, 'Juan Manuel Arboleda Velez', '1017216708', 'a1a3f2868e5bc40f08e8cc92b52b74a13c56ab1fd749934e8519a833c52107f8', '1017216708'),
(5, 'Alejo', '121212', '82dc1d507b44ef69c96a18c62c4c7174784f4e4c283fc82b569baf6042dfe09b', '121212'),
(6, 'Manuel', '101010', '4faa32ce261cbd337fcc71b48fd46b4aac18a0668be1dae1aef8bd15e3a46b6e', '101010'),
(7, 'Carlos', '232323', '3a5d2cb79753f62d2d09af926e4307a5cd005705cdb01810353e90c9e2f8d75e', '232323');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `subcategoria`
--
ALTER TABLE `subcategoria`
  ADD PRIMARY KEY (`id_subcategoria`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id_categoria` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `subcategoria`
--
ALTER TABLE `subcategoria`
  MODIFY `id_subcategoria` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
