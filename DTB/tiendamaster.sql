-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 31-03-2019 a las 03:51:24
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tiendamaster`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `idcategoria` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`idcategoria`, `nombre`) VALUES
(1, 'PIJAMAS'),
(2, 'ATUENDOS'),
(3, 'CHAMARRAS'),
(4, '65464654'),
(5, 'yuuyuy'),
(6, 'DEPORTIVOS'),
(7, 'BUSOS');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lineas_pedido`
--

CREATE TABLE `lineas_pedido` (
  `idlineas_pedido` int(11) NOT NULL,
  `idpedido` int(11) NOT NULL,
  `idproducto` int(11) NOT NULL,
  `unidades` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `lineas_pedido`
--

INSERT INTO `lineas_pedido` (`idlineas_pedido`, `idpedido`, `idproducto`, `unidades`) VALUES
(2, 2, 29, 2),
(3, 2, 28, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `idpedido` int(11) NOT NULL,
  `idusuario` int(11) NOT NULL,
  `provincia` varchar(255) NOT NULL,
  `localidad` varchar(100) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `coste` float(200,2) NOT NULL,
  `estado` varchar(20) NOT NULL,
  `fecha` date DEFAULT NULL,
  `hora` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`idpedido`, `idusuario`, `provincia`, `localidad`, `direccion`, `coste`, `estado`, `fecha`, `hora`) VALUES
(2, 12, 'djkasjdks', 'jdkajfkds', 'jdljsdlfds', 98.00, 'ready', '2019-03-30', '19:38:37');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `idproducto` int(11) NOT NULL,
  `idcategoria` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `descripcion` text,
  `precio` float(100,2) DEFAULT NULL,
  `stock` int(11) NOT NULL,
  `oferta` varchar(2) DEFAULT NULL,
  `fecha` datetime NOT NULL,
  `imagen` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`idproducto`, `idcategoria`, `nombre`, `descripcion`, `precio`, `stock`, `oferta`, `fecha`, `imagen`) VALUES
(23, 7, 'NUEVO BUSO', 'DSFDF                ', 43.00, 23, NULL, '2019-03-24 00:00:00', 'Captura de pantalla (6).png'),
(24, 7, 'gfdgfdg', '        dfgdfg', 544.00, 54, NULL, '2019-03-24 00:00:00', ''),
(25, 7, 'PRODUCTO 3', 'FSDFSDFSD        ', 543534.00, 43, NULL, '2019-03-24 00:00:00', ''),
(26, 7, 'PRODUCTO 9', 'FDSFDSFSD        ', 1500.00, 43, NULL, '2019-03-24 00:00:00', ''),
(27, 7, 'PRODUCTO ESTAMPADO', '        REWRWERWE', 45.00, 34, NULL, '2019-03-24 00:00:00', 'anchor.png'),
(28, 2, 'MY CAMISA 89', 'DSADSADSA        ', 12.00, 3, NULL, '2019-03-24 00:00:00', 'Dogelin.jpg'),
(29, 7, 'BUSO BUSO', 'FSD        ', 43.00, 43, NULL, '2019-03-24 00:00:00', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idusuario` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellidos` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `rol` varchar(20) DEFAULT NULL,
  `imagen` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idusuario`, `nombre`, `apellidos`, `email`, `password`, `rol`, `imagen`) VALUES
(1, 'KEVIN', 'TAPIA', 'KEVIN', '$2y$04$M8OLWc6kpVxEhnNoAkGfiOXEkA8vnKlM8p..cfxiQHPqXqJqx3kIK', 'user', NULL),
(2, 'ANA', 'FRANK', 'ANA', '$2y$04$/LYFR6ROfTQo4Vo2X7toLed6sCNHj5.b3jPkEbVPiap3IqnHGZQe6', 'user', NULL),
(3, 'PPPEPEP', 'PEPEPEP', 'PPPEPEP', '$2y$04$57OFKMQH17tMX6iAKKoxdu1J89KHtTfQy/BxsXPdKsth2JDJDM2wy', 'user', NULL),
(5, 'NEW', 'NEW', 'NEW', '$2y$04$cbDv/IIRBHYZMx7zWmeW2.Kp.Iq7mwNAr1jkZqAcYMOzDtfHnUO9e', 'user', NULL),
(6, 'pepepepepe', 'pppwpwpwpw', 'pepepepepe', '$2y$04$nVEUKXv5vehSl/qiqocEM.HjeYpZc8EHexgLHTvpQ26Js4w9xQArS', 'user', NULL),
(7, 'gdgdf', 'gfdgffd', 'gdfgfd@lsls.com', '$2y$04$ccCSphPrQaAMsqqKKNTa0ObKpWHR/3Ax28sw6Jfnp2ql3QrNFHavC', 'user', NULL),
(8, 'fdsfsdf', 'sdfsdfsdf', 'fsfsdf454fsdf@ldld.com', '$2y$04$4wENmDUKtWpxcIfQ.0Ty3.P88sYEuqjBzpc1nTBd1uu8hb1ndeVoW', 'user', NULL),
(10, 'paco', 'lopez', 'pacolo@oeoe.com', '$2y$04$qS95bhTRnSXIMU39fiBvquH4i/d48KgdLLLZzAVwuu2iQ4MZRkEqS', 'user', NULL),
(11, 'administrador', 'admin', 'admin@admin.com', '$2y$04$ijsJ8NjeR3VHTLX/ViNgIexQh8flqm7QAREiJwmFL9lTwSitJh9mS', 'admin', NULL),
(12, 'customer', 'customer', 'customer@customer.com', '$2y$04$L4g45s40050QZKK7nuZCC.8UCSeXLUWm.pfwSgofaW0THkku9ZwbC', 'user', NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`idcategoria`);

--
-- Indices de la tabla `lineas_pedido`
--
ALTER TABLE `lineas_pedido`
  ADD PRIMARY KEY (`idlineas_pedido`),
  ADD KEY `lineas_pedido_pedidos_idx` (`idpedido`),
  ADD KEY `lineas_pedido_productos_idx` (`idproducto`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`idpedido`),
  ADD KEY `prdido_usuario_idx` (`idusuario`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`idproducto`),
  ADD KEY `producto_categoria_idx` (`idcategoria`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idusuario`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `idcategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `lineas_pedido`
--
ALTER TABLE `lineas_pedido`
  MODIFY `idlineas_pedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `idpedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `idproducto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `lineas_pedido`
--
ALTER TABLE `lineas_pedido`
  ADD CONSTRAINT `lineas_pedido_pedidos` FOREIGN KEY (`idpedido`) REFERENCES `pedidos` (`idpedido`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `lineas_pedido_productos` FOREIGN KEY (`idproducto`) REFERENCES `productos` (`idproducto`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `pedido_usuario` FOREIGN KEY (`idusuario`) REFERENCES `usuarios` (`idusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `producto_categoria` FOREIGN KEY (`idcategoria`) REFERENCES `categorias` (`idcategoria`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
