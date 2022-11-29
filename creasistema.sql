-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-11-2022 a las 08:46:44
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
-- Base de datos: `creasistema`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cajas`
--

CREATE TABLE `cajas` (
  `ID_caja` int(10) NOT NULL,
  `nombre_caja` varchar(50) NOT NULL,
  `estado` int(10) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cajas`
--

INSERT INTO `cajas` (`ID_caja`, `nombre_caja`, `estado`) VALUES
(1, 'Adminstrativa', 1),
(2, 'General', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `ID` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`ID`, `nombre`, `estado`) VALUES
(1, 'Shampoos', 1),
(2, 'Cremas', 1),
(3, 'Tonico', 1),
(4, 'jaboncitos', 1),
(5, 'Loción ', 1),
(6, 'Cuidado de la cara', 1),
(7, 'nuevecita', 0),
(8, 'diecesita', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `ID` int(11) NOT NULL,
  `telefono` varchar(15) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `paterno_cli` varchar(30) NOT NULL,
  `materno_cli` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `direccion` text NOT NULL,
  `num_dir_cli` varchar(11) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`ID`, `telefono`, `nombre`, `paterno_cli`, `materno_cli`, `email`, `direccion`, `num_dir_cli`, `estado`) VALUES
(1, '123', 'clientesaso', 'rodriguez', 'lopez', 'cli@gmailc', 'calle clienton', '85', 1),
(2, '456', 'goku', 'son', 'uwu', 'asdasd', 'kame', '80', 1),
(3, '789', 'beto', 'amezcua', 'flores', 'jijoasdkasd@giafasf', 'calee lejana', '98', 1),
(4, '3121233211', 'jason', 'Tood', 'Wayne', 'jay@hotmail.com', 'baticueva', '1', 1),
(5, '3165465456', 'Guero', 'Rodriguez', 'nino', 'gueroño@hotmail.com', 'Guerreri', '252', 1),
(6, '6514564', 'Sino', 'kilore', 'plomir', 'losfksof@gulforfr', 'Sin dirección', 'S/N', 1),
(7, '55555555555', 'gfdgfdgfsdg', 'fdgfsdgfgf', 'gsfdgfdgfdg', 'Sin Correo', 'Los olivos', 'S/N', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras`
--

CREATE TABLE `compras` (
  `ID` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `descripcion` text NOT NULL,
  `costo_total` decimal(10,2) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `fecha` date NOT NULL DEFAULT current_timestamp(),
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `compras`
--

INSERT INTO `compras` (`ID`, `cantidad`, `descripcion`, `costo_total`, `id_producto`, `id_usuario`, `fecha`, `estado`) VALUES
(1, 4, 'hhhh', '800.00', 4, 2, '2022-11-20', 1),
(2, 6, 'nueva', '1200.00', 4, 2, '2022-11-20', 1),
(3, 10, 'por qu me lo piden', '800.00', 1, 2, '2022-11-20', 1),
(4, 7, 'arriba', '1400.00', 4, 2, '2022-11-20', 1),
(5, 10, 'baja', '-2000.00', 4, 2, '2022-11-20', 0),
(6, 7, 'baja2', '-1400.00', 4, 2, '2022-11-20', 0),
(7, 300, 'menos ', '-60000.00', 4, 2, '2022-11-20', 0),
(8, 150, 'sumar', '30000.00', 4, 2, '2022-11-20', 1),
(9, 30, 'negativos', '-2400.00', 1, 2, '2022-11-20', 0),
(10, 51, 'hhhhhhhhhhhhhhh', '-10200.00', 4, 2, '2022-11-20', 0),
(11, 100, 'gggg', '20000.00', 4, 2, '2022-11-20', 1),
(12, 100, 'negat', '-20000.00', 4, 2, '2022-11-20', 0),
(13, 10, 'hhhhhhhh', '-500.00', 5, 2, '2022-11-20', 0),
(14, 17, 'lllllllllllllll', '3400.00', 4, 2, '2022-11-20', 1),
(15, 10, 'hhhhhhhhh', '2000.00', 4, 2, '2022-11-20', 1),
(16, 5, 'caducados', '-400.00', 3, 2, '2022-11-20', 0),
(17, 46, 'hyhyhyh', '3680.00', 1, 2, '2022-11-20', 1),
(18, 41, 'ololo sdfdsfdsf', '2050.00', 5, 1, '2022-11-20', 1),
(19, 9, 'hahhaha', '1800.00', 4, 1, '2022-11-21', 1),
(20, 28, 'bloque', '1400.00', 6, 1, '2022-11-21', 1),
(21, 22, 'por la fecha de playa', '1100.00', 6, 1, '2022-11-21', 1),
(22, 9, 'dasdasda', '1800.00', 4, 1, '2022-11-21', 1),
(23, 4, 'asfdsfasdfds', '800.00', 4, 1, '2022-11-21', 1),
(24, 12, 'folio', '2400.00', 4, 1, '2022-11-21', 1),
(25, 12, 'folio', '2400.00', 4, 1, '2022-11-21', 1),
(26, 4, 'dfdsfd', '800.00', 4, 1, '2022-11-21', 1),
(27, 4, 'fsdfsdf', '800.00', 4, 1, '2022-11-21', 1),
(28, 3, 'ddd', '600.00', 4, 1, '2022-11-21', 1),
(29, 2, 'fff', '400.00', 4, 1, '2022-11-21', 1),
(30, 5, 'ffff', '400.00', 1, 1, '2022-11-21', 1),
(31, 99, '090909', '19800.00', 4, 1, '2022-11-21', 1),
(32, 6, 'ffffff', '1200.00', 4, 1, '2022-11-21', 1),
(33, 15, 'loloaas', '750.00', 6, 1, '2022-11-21', 1),
(34, 10, 'por que si ', '2000.00', 4, 1, '2022-11-21', 1),
(35, 3, 'gggg', '600.00', 4, 1, '2022-11-21', 1),
(36, 2, 'hh', '400.00', 4, 1, '2022-11-21', 1),
(37, 3, 'fff', '-600.00', 4, 1, '2022-11-21', 0),
(38, 32, 'ggg', '-6400.00', 4, 1, '2022-11-21', 0),
(39, 70, 'baja por caducidad', '-14000.00', 4, 1, '2022-11-21', 0),
(40, 13, 'ggg', '-2600.00', 4, 1, '2022-11-21', 0),
(41, 5, 'ffff', '1000.00', 4, 1, '2022-11-21', 1),
(42, 8, '8', '1600.00', 4, 1, '2022-11-21', 1),
(43, 5, '55', '1000.00', 4, 1, '2022-11-21', 1),
(44, 88, '88', '17600.00', 4, 1, '2022-11-21', 1),
(45, 5, 'd', '1000.00', 4, 1, '2022-11-21', 1),
(46, 33, '333', '6600.00', 4, 1, '2022-11-21', 1),
(47, 3, '55', '600.00', 4, 1, '2022-11-21', 1),
(48, 4, '55', '-800.00', 4, 1, '2022-11-21', 0),
(49, 3, '33', '600.00', 4, 1, '2022-11-21', 1),
(50, 5, 'cienco', '250.00', 6, 1, '2022-11-21', 1),
(51, 10, 'baja', '-500.00', 6, 1, '2022-11-21', 0),
(52, 15, 'dede', '-3000.00', 4, 1, '2022-11-21', 0),
(53, 3, 'dfrfr', '-600.00', 4, 1, '2022-11-21', 0),
(54, 15, 'bajar', '-3000.00', 4, 1, '2022-11-21', 0),
(55, 2, 'bajitos', '-400.00', 4, 1, '2022-11-21', 0),
(56, 3, 'rretre', '600.00', 4, 1, '2022-11-21', 1),
(57, 33, 'rfr', '6600.00', 4, 1, '2022-11-21', 1),
(58, 34, 'Jabines caducados serecibcrlaraddsajda jdsakfadskfjdsljfakdsljfadlskjflkdsjfldsjfdslfjdsfdsjfkdsflkdsfds fjdlsfkdsjfdskfjdskfjds', '-6800.00', 4, 1, '2022-11-21', 0),
(59, 5, 'lodksaodkasokdoaskdsaokdoaskdoaskodkskdoskdoksdosdofdskofkdsokfsd', '1000.00', 4, 1, '2022-11-21', 1),
(60, 5, 'pppppppppppppppppppppppppppppppppppppppppppppppppppppppppppp', '-1000.00', 4, 1, '2022-11-21', 0),
(61, 50, 'jiasjdoasdjosajodsajdjasodjasojdoasjds', '-10000.00', 4, 1, '2022-11-21', 0),
(62, 5, 'dasdasds', '1000.00', 4, 1, '2022-11-21', 1),
(63, 55, 'usuarios', '-11000.00', 4, 2, '2022-11-21', 0),
(64, 7, 'fsfsdfdsfsdfsdfsdfdfsdfsdf', '1400.00', 4, 2, '2022-11-21', 1),
(65, 55, 'fasdfjoijfijrjfoijrf', '11000.00', 4, 1, '2022-11-21', 1),
(66, 3, 'dasdasd', '600.00', 4, 1, '2022-11-21', 1),
(67, 8, '7878', '1600.00', 4, 1, '2022-11-23', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_temporal_venta`
--

CREATE TABLE `detalle_temporal_venta` (
  `ID_DTV` int(11) NOT NULL,
  `cantidad_dtv` int(11) NOT NULL,
  `precio_dtv` decimal(10,2) NOT NULL,
  `sub_total_dtv` decimal(10,2) NOT NULL,
  `id_producto_dtv` int(11) NOT NULL,
  `id_usuario_dtv` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `detalle_temporal_venta`
--

INSERT INTO `detalle_temporal_venta` (`ID_DTV`, `cantidad_dtv`, `precio_dtv`, `sub_total_dtv`, `id_producto_dtv`, `id_usuario_dtv`) VALUES
(12, 1, '500.00', '500.00', 4, 1),
(18, 3, '50.00', '150.00', 3, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_ventas`
--

CREATE TABLE `detalle_ventas` (
  `ID_DV` int(11) NOT NULL,
  `id_venta` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `sub_total` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `detalle_ventas`
--

INSERT INTO `detalle_ventas` (`ID_DV`, `id_venta`, `id_producto`, `cantidad`, `precio`, `sub_total`) VALUES
(1, 1, 3, 20, '100.00', '2000.00'),
(2, 1, 4, 50, '500.00', '25000.00'),
(3, 1, 1, 10, '100.00', '1000.00'),
(4, 1, 6, 9, '100.00', '900.00'),
(5, 2, 3, 5, '100.00', '500.00'),
(6, 2, 4, 11, '500.00', '5500.00'),
(7, 3, 1, 10, '30.00', '300.00'),
(8, 4, 4, 13, '500.00', '6500.00'),
(9, 5, 3, 2, '50.00', '100.00'),
(10, 5, 4, 5, '500.00', '2500.00'),
(11, 6, 4, 7, '500.00', '3500.00'),
(12, 6, 3, 9, '50.00', '450.00'),
(13, 7, 7, 30, '300.00', '9000.00'),
(14, 8, 3, 10, '50.00', '500.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

CREATE TABLE `empresa` (
  `ID` int(11) NOT NULL,
  `RFC` varchar(20) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `telefono` varchar(15) NOT NULL,
  `direccion` varchar(200) NOT NULL,
  `num_dir_empresa` int(10) NOT NULL,
  `email_empresa` varchar(50) NOT NULL,
  `mensaje` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `empresa`
--

INSERT INTO `empresa` (`ID`, `RFC`, `nombre`, `telefono`, `direccion`, `num_dir_empresa`, `email_empresa`, `mensaje`) VALUES
(1, 'CREA010203UwU', 'Crea Cosmética', '3121122334', 'Av. Constitución', 1200, 'creacosmetica@gmail.com', 'Gracias por su preferencia!!!!');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `formulas`
--

CREATE TABLE `formulas` (
  `ID` int(11) NOT NULL,
  `cantidad` decimal(10,2) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `id_ingrediente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingredientes`
--

CREATE TABLE `ingredientes` (
  `ID` int(11) NOT NULL,
  `codigo` varchar(50) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `cantidad` decimal(10,2) NOT NULL DEFAULT 0.00,
  `id_medida` int(11) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ingredientes`
--

INSERT INTO `ingredientes` (`ID`, `codigo`, `nombre`, `cantidad`, `id_medida`, `estado`) VALUES
(1, '0123', 'Glicerina', '1000.00', 3, 1),
(2, '456', 'Potasio', '500.00', 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medidas`
--

CREATE TABLE `medidas` (
  `ID` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `nombre_corto` varchar(10) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `medidas`
--

INSERT INTO `medidas` (`ID`, `nombre`, `nombre_corto`, `estado`) VALUES
(1, 'Unidad', 'unidad', 1),
(2, 'gramos', 'gr', 1),
(3, 'mililitros', 'ml', 1),
(4, 'kilo', 'kg', 1),
(5, 'Libras', 'lb', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `ID` int(11) NOT NULL,
  `codigo` varchar(15) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `precio_creacion` decimal(10,2) NOT NULL,
  `precio_venta` decimal(10,2) NOT NULL,
  `cantidad` int(11) NOT NULL DEFAULT 0,
  `id_categoria` int(11) NOT NULL,
  `imagen` varchar(50) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`ID`, `codigo`, `nombre`, `precio_creacion`, `precio_venta`, `cantidad`, `id_categoria`, `imagen`, `estado`) VALUES
(1, '1234567', 'Jabon cara grasa', '20.00', '30.00', 46, 4, '', 1),
(2, '4863258', 'Shampoo piojos', '80.00', '100.00', 10, 1, '', 1),
(3, '456877', 'Jabón acné con cianuro', '20.00', '50.00', 26, 4, '', 1),
(4, '24', 'Jabon cara3', '200.00', '500.00', 148, 2, '', 1),
(5, '0525', 'Crema para los hongos de la cola ', '50.00', '100.00', 41, 2, '', 1),
(6, '001', 'bloqueador solar', '50.00', '100.00', 60, 2, '', 1),
(7, '002', 'Jabon anti estres', '250.00', '300.00', -15, 4, '', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `ID_usuario` int(10) NOT NULL,
  `clave_usuario` varchar(10) NOT NULL,
  `nombre_usuario` varchar(100) NOT NULL,
  `paterno_usuario` varchar(11) NOT NULL,
  `materno_usuario` varchar(11) NOT NULL,
  `direccion_usuario` varchar(50) NOT NULL,
  `num_dir` int(10) NOT NULL,
  `telefono_usuario` varchar(15) NOT NULL,
  `email_usuario` varchar(50) NOT NULL,
  `password_usuario` varchar(150) NOT NULL,
  `id_caja` int(10) NOT NULL,
  `estado_usuario` int(10) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`ID_usuario`, `clave_usuario`, `nombre_usuario`, `paterno_usuario`, `materno_usuario`, `direccion_usuario`, `num_dir`, `telefono_usuario`, `email_usuario`, `password_usuario`, `id_caja`, `estado_usuario`) VALUES
(1, 'admin', 'Administrador', 'Crea', 'Cosmetica', 'Constitución', 200, '31245678900', 'admin@gmail.com', '8726bca729a334e7484e7a8f3507ce994741241d701a2d915cdb52be3b612ffb', 1, 1),
(2, 'Chuy2909', 'Jesus Emmanuel', 'MTz', 'Torres', 'Palmas', 99, '3121234567', 'jesus@gmail.com', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5', 2, 1),
(3, 'lolito', 'Lauro', 'plomo', 'palacios', 'goluma', 53, '312558965478', 'lolito@gmail.com', '0b67579a10e1bdf91d85e65414dc38fcab9b973a97ab661a169a0813338ce7bd', 2, 0),
(4, 'bebe29', 'leon', 'bueno', 'tapia', 'villa', 100, '31256988', 'bebe@gmail.com', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 2, 1),
(5, 'alertas', 'alerta', 'fwoeijf', 'owdofoew', 'pfkkfook', 666, '5554', 'fwsfwef', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', 2, 1),
(6, 'alerta2', 'jason', 'Rodriguez', 'nino', 'dasdasdasd', 555, '55555555555', 'lolo@hdasidjasid', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `ID` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_cliente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`ID`, `total`, `fecha`, `id_cliente`) VALUES
(1, '28900.00', '2022-11-24 22:33:06', 0),
(2, '6000.00', '2022-11-24 23:10:06', 0),
(3, '300.00', '2022-11-25 00:53:22', 0),
(4, '6500.00', '2022-11-25 01:37:28', 0),
(5, '2600.00', '2022-11-25 23:35:11', 5),
(6, '3950.00', '2022-11-26 01:14:19', 7),
(7, '9000.00', '2022-11-29 06:41:31', 6),
(8, '500.00', '2022-11-29 07:16:20', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cajas`
--
ALTER TABLE `cajas`
  ADD PRIMARY KEY (`ID_caja`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `compras`
--
ALTER TABLE `compras`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `id_producto` (`id_producto`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `detalle_temporal_venta`
--
ALTER TABLE `detalle_temporal_venta`
  ADD PRIMARY KEY (`ID_DTV`),
  ADD KEY `id_producto_dtv` (`id_producto_dtv`),
  ADD KEY `id_usuario_dtv` (`id_usuario_dtv`);

--
-- Indices de la tabla `detalle_ventas`
--
ALTER TABLE `detalle_ventas`
  ADD PRIMARY KEY (`ID_DV`);

--
-- Indices de la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `formulas`
--
ALTER TABLE `formulas`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `id_producto` (`id_producto`),
  ADD KEY `id_ingrediente` (`id_ingrediente`);

--
-- Indices de la tabla `ingredientes`
--
ALTER TABLE `ingredientes`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `id_medida` (`id_medida`);

--
-- Indices de la tabla `medidas`
--
ALTER TABLE `medidas`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `id_categoria` (`id_categoria`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`ID_usuario`),
  ADD KEY `id_caja` (`id_caja`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cajas`
--
ALTER TABLE `cajas`
  MODIFY `ID_caja` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `compras`
--
ALTER TABLE `compras`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT de la tabla `detalle_temporal_venta`
--
ALTER TABLE `detalle_temporal_venta`
  MODIFY `ID_DTV` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `detalle_ventas`
--
ALTER TABLE `detalle_ventas`
  MODIFY `ID_DV` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `empresa`
--
ALTER TABLE `empresa`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `formulas`
--
ALTER TABLE `formulas`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ingredientes`
--
ALTER TABLE `ingredientes`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `medidas`
--
ALTER TABLE `medidas`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `ID_usuario` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `compras`
--
ALTER TABLE `compras`
  ADD CONSTRAINT `compras_ibfk_1` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`ID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `compras_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`ID_usuario`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `formulas`
--
ALTER TABLE `formulas`
  ADD CONSTRAINT `formulas_ibfk_1` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`ID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `formulas_ibfk_2` FOREIGN KEY (`id_ingrediente`) REFERENCES `ingredientes` (`ID`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `ingredientes`
--
ALTER TABLE `ingredientes`
  ADD CONSTRAINT `ingredientes_ibfk_1` FOREIGN KEY (`id_medida`) REFERENCES `medidas` (`ID`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_2` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`ID`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`id_caja`) REFERENCES `cajas` (`ID_caja`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
