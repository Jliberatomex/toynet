-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-08-2018 a las 01:55:16
-- Versión del servidor: 5.7.14
-- Versión de PHP: 7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `toynet`
--
CREATE DATABASE IF NOT EXISTS `toynet` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `toynet`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE `administrador` (
  `id_administrador` int(11) NOT NULL,
  `nombreAdmin` varchar(45) NOT NULL,
  `apellidoP` varchar(45) NOT NULL,
  `apellidoM` varchar(45) NOT NULL,
  `correo` varchar(45) NOT NULL,
  `contrasena` varchar(45) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id_Categoria` int(11) NOT NULL,
  `nombre_Categoria` varchar(45) NOT NULL,
  `descripcion_Categoria` varchar(45) NOT NULL,
  `imagen` varchar(500) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id_Categoria`, `nombre_Categoria`, `descripcion_Categoria`, `imagen`) VALUES
(8, 'Niños', '1-2 Años', 'nino.jpg'),
(9, 'Niñas', '10 Años', 'nina.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `juguete`
--

CREATE TABLE `juguete` (
  `id_Juguete` int(11) NOT NULL,
  `nombre_Juguete` varchar(100) NOT NULL,
  `descripcion_Juguete` varchar(500) NOT NULL,
  `precio` decimal(7,0) NOT NULL,
  `archivo` varchar(500) NOT NULL,
  `id_Marca` varchar(100) NOT NULL,
  `id_Categoria` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `juguete`
--

INSERT INTO `juguete` (`id_Juguete`, `nombre_Juguete`, `descripcion_Juguete`, `precio`, `archivo`, `id_Marca`, `id_Categoria`) VALUES
(1, 'Blue Elephant', 'Instrumento musical Teclado Piano', '150', 'fishesPrice1.PNG', 'Fisher Price', 'Niños'),
(2, 'Primeras Palabras', 'Ocho bloques Primeras palabras para colocar en el lector "mágico" de Perrito', '200', 'fishesPrice2.2.PNG', 'Fisher Price', 'Niños'),
(3, 'Aprende Letras', 'Aprendizaje bilingüe (español e inglés)\r\nCon muchas canciones y melodías\r\nSe desmonta para jugar en el', '250', 'fishesPrice4.1.PNG', 'Fisher Price', 'Niñas'),
(4, 'Iron Man', 'Esta última versión de la armadura de Iron Man,tiene 8 pulgadas de alto', '100', 'hasbro2.1.PNG', 'hasbro', 'Niños'),
(5, 'Fast & Furious', 'Auto a escala, incluye figura accion Toreto', '300', 'mattel2.1.PNG', 'Legosss', 'Niños'),
(6, 'Helados', 'Maquina Helados', '500', 'mialegria1.1.PNG', 'Mi Alegria', 'Niñas'),
(7, 'Operando Minions', 'Usa pinzas para recolectar piezas y ayudar a Dave', '500', 'hasbro5.PNG', 'Mattel', 'Niños'),
(8, 'Adivina Quien', 'El juego de la cara misteriosa', '200', 'hasbro4.PNG', 'Mattel', 'Niños'),
(9, 'Buho Didactico', 'Buho sonajero, incluye pelotas', '600', 'fishesPrice6.1.PNG', 'Fisher Price', 'Bebe'),
(10, 'Doh Vinci', '• 4 proyectos para decorar\r\n• 8 gemas\r\n• 1 Cinta\r\n• 1 estilizador\r\n• 8 tubos Deco Pop\r\n• 1 guía creativa', '1000', 'hasbro1.PNG', 'hasbro', 'Niñas'),
(11, 'Munecas ', 'Trapo', '250', 'nina.jpg', 'Fisher Price', 'Niñas'),
(12, 'perrito', 'peluche', '130', 'perrito.jpg', 'Mega Bloks', 'Niños');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marca`
--

CREATE TABLE `marca` (
  `id_Marca` int(11) NOT NULL,
  `nombreMarca` varchar(45) NOT NULL,
  `descripcionMarca` varchar(45) NOT NULL,
  `imagen` varchar(500) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `marca`
--

INSERT INTO `marca` (`id_Marca`, `nombreMarca`, `descripcionMarca`, `imagen`) VALUES
(20, 'Fisher Price', 'niños y niñas', 'fisher.jpg'),
(19, 'play-doh', 'plastilinas', 'playdoh.jpg'),
(18, 'Nerf', 'Pistolas', 'nerf.jpg'),
(17, 'hasbro', 'Piezas', 'hasbro.jpg'),
(21, 'Lego', 'Piezas', 'legol.jpg'),
(22, 'Mattel', 'Marca Juguete', 'mattel.jpg'),
(24, 'PlaySkool', 'Niños', 'playskool.jpg'),
(25, 'Marvel', 'Figura accion', 'marvel.jpg'),
(26, 'Mega Bloks', 'Bloques', 'mega.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mesa`
--

CREATE TABLE `mesa` (
  `id_mesa` int(11) NOT NULL,
  `nombre_festejado` varchar(45) NOT NULL,
  `fecha_mesa` varchar(45) NOT NULL,
  `id_usuario` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `mesa`
--

INSERT INTO `mesa` (`id_mesa`, `nombre_festejado`, `fecha_mesa`, `id_usuario`) VALUES
(3, 'Pedro', '2019-09-03', 'eduardo@mexico.com'),
(4, 'Juan Hernandez', '2016-09-03', 'lopez@mexico.com'),
(5, 'Juan Carlos', '2018-09-04', 'benny@utn.mx'),
(6, 'Alexander', '2019-09-04', 'sergio@gmail.com'),
(7, 'Mateo', '2018-09-04', 'angela@gmail.com'),
(8, 'Carlos', '2018-09-04', 'montes@gmail.com'),
(9, 'noemi', '2018-08-30', 'avalosnavajulia@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mesa_jug`
--

CREATE TABLE `mesa_jug` (
  `id_detalle` int(11) NOT NULL,
  `id_Juguete` varchar(45) NOT NULL,
  `id_Mesa` varchar(45) DEFAULT NULL,
  `estado` varchar(45) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `mesa_jug`
--

INSERT INTO `mesa_jug` (`id_detalle`, `id_Juguete`, `id_Mesa`, `estado`) VALUES
(34, '', '', 'ACTIVO'),
(33, 'Iron Man', 'lopez@mexico.com', ''),
(32, '', '', 'ACTIVO'),
(31, 'Aprende Letras', 'lopez@mexico.com', ''),
(44, 'Blue Elephant', 'benny@utn.mx', 'ACTIVO'),
(29, '', '', 'ACTIVO'),
(28, 'Primeras Palabras', 'eduardo@mexico.com', ''),
(41, 'Munecas ', 'lopez@mexico.com', 'ACTIVO'),
(26, '', '', 'ACTIVO'),
(25, 'Blue Elephant', 'eduardo@mexico.com', ''),
(24, 'Aprende Letras', 'eduardo@mexico.com', ''),
(35, 'Primeras Palabras', 'lopez@mexico.com', 'ACTIVO'),
(36, 'Blue Elephant', 'eduardo@mexico.com', 'ACTIVO'),
(37, 'Aprende Letras', 'eduardo@mexico.com', 'ACTIVO'),
(38, 'Primeras Palabras', 'eduardo@mexico.com', 'ACTIVO'),
(39, 'Adivina Quien', 'lopez@mexico.com', 'ACTIVO'),
(40, 'Doh Vinci', 'lopez@mexico.com', 'ACTIVO'),
(42, 'Buho Didactico', 'lopez@mexico.com', 'ACTIVO'),
(43, 'Helados', 'eduardo@mexico.com', 'ACTIVO'),
(45, 'Iron Man', 'benny@utn.mx', 'ACTIVO'),
(46, 'Adivina Quien', 'benny@utn.mx', 'ACTIVO'),
(47, 'Aprende Letras', 'sergio@gmail.com', 'ACTIVO'),
(48, 'Iron Man', 'sergio@gmail.com', 'ACTIVO'),
(49, 'Helados', 'sergio@gmail.com', 'ACTIVO'),
(50, 'Iron Man', 'angela@gmail.com', 'ACTIVO'),
(51, 'Fast & Furious', 'angela@gmail.com', 'ACTIVO'),
(52, 'Adivina Quien', 'angela@gmail.com', 'ACTIVO'),
(53, 'perrito', 'angela@gmail.com', 'ACTIVO'),
(54, 'Blue Elephant', 'angela@gmail.com', 'ACTIVO'),
(55, 'Primeras Palabras', 'montes@gmail.com', 'ACTIVO'),
(56, 'Adivina Quien', 'montes@gmail.com', 'ACTIVO'),
(57, 'Helados', 'montes@gmail.com', 'ACTIVO'),
(58, 'Iron Man', 'montes@gmail.com', 'ACTIVO'),
(59, 'Buho Didactico', 'montes@gmail.com', 'ACTIVO'),
(60, 'Adivina Quien', 'avalosnavajulia@gmail.com', 'ACTIVO'),
(61, 'Helados', 'avalosnavajulia@gmail.com', 'ACTIVO'),
(62, 'Doh Vinci', 'avalosnavajulia@gmail.com', 'ACTIVO'),
(63, 'Iron Man', 'avalosnavajulia@gmail.com', 'ACTIVO'),
(65, 'Operando Minions', 'montes@gmail.com', 'ACTIVO'),
(66, 'Operando Minions', 'montes@gmail.com', 'ACTIVO'),
(67, 'Aprende Letras', 'montes@gmail.com', 'ACTIVO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_Usuario` int(11) NOT NULL,
  `nombreUsua` varchar(45) NOT NULL,
  `apellidoP` varchar(45) NOT NULL,
  `apellidoM` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `contrasena` varchar(45) NOT NULL,
  `tipo_usuario` varchar(45) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_Usuario`, `nombreUsua`, `apellidoP`, `apellidoM`, `email`, `contrasena`, `tipo_usuario`) VALUES
(1, 'Josh', 'Liberato', 'Liberato', 'liberato@mexico.com', '123', 'administrador'),
(2, 'Josh', 'Lopez', 'Liberato', 'joshito@gmail.com', '123', 'usuario'),
(3, 'Fernando', 'Olvera', 'Flores', 'fer@utn.com', '123', ''),
(4, 'Eduardo', 'Lopez ', 'Liberato', 'eduardo@mexico.com', '123', 'usuario'),
(6, 'aaa', 'aaa', 'aaa', 'lopez@mexico.com', '123', 'usuario'),
(7, 'Eduardo', 'Benitez', 'Vazquez', 'benny@utn.mx', 'benny', 'usuario'),
(8, 'Sergio', 'Modesto', 'Modesto', 'sergio@gmail.com', 'sergio', 'usuario'),
(9, 'Angela', 'Eustacio', 'Vega', 'angela@gmail.com', 'angela', 'usuario'),
(10, 'viridiana', 'montes', 'garcia', 'montes@gmail.com', '57010762', 'usuario'),
(11, 'julia', 'Avalos', 'Nava', 'avalosnavajulia@gmail.com', '1993', 'usuario');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`id_administrador`);

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id_Categoria`),
  ADD UNIQUE KEY `nombre_Categoria` (`nombre_Categoria`);

--
-- Indices de la tabla `juguete`
--
ALTER TABLE `juguete`
  ADD PRIMARY KEY (`id_Juguete`),
  ADD KEY `fk_juguete_categoria_idx` (`id_Categoria`),
  ADD KEY `fk_juguete_marca1_idx` (`id_Marca`);

--
-- Indices de la tabla `marca`
--
ALTER TABLE `marca`
  ADD PRIMARY KEY (`id_Marca`),
  ADD UNIQUE KEY `nombreMarca` (`nombreMarca`);

--
-- Indices de la tabla `mesa`
--
ALTER TABLE `mesa`
  ADD PRIMARY KEY (`id_mesa`),
  ADD UNIQUE KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `mesa_jug`
--
ALTER TABLE `mesa_jug`
  ADD PRIMARY KEY (`id_detalle`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_Usuario`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administrador`
--
ALTER TABLE `administrador`
  MODIFY `id_administrador` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id_Categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `juguete`
--
ALTER TABLE `juguete`
  MODIFY `id_Juguete` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT de la tabla `marca`
--
ALTER TABLE `marca`
  MODIFY `id_Marca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT de la tabla `mesa`
--
ALTER TABLE `mesa`
  MODIFY `id_mesa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `mesa_jug`
--
ALTER TABLE `mesa_jug`
  MODIFY `id_detalle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_Usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
