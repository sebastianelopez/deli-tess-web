-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-05-2021 a las 00:03:33
-- Versión del servidor: 10.4.13-MariaDB
-- Versión de PHP: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `delitess`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Todos'),
(2, 'Pizza'),
(3, 'Hamburguesas'),
(4, 'Bebidas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `creationDate` datetime NOT NULL,
  `modificationDate` datetime NOT NULL,
  `comment` varchar(200) NOT NULL,
  `rank` int(11) DEFAULT NULL,
  `Product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `comment`
--

INSERT INTO `comment` (`id`, `creationDate`, `modificationDate`, `comment`, `rank`, `Product_id`) VALUES
(1, '2021-05-02 15:32:21', '2021-05-02 15:32:21', 'Muy rica la pizza, lo recomiendo!', 5, 1),
(2, '2021-05-02 15:32:21', '2021-05-02 15:32:21', 'Un espectaculo!', 5, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `creationDate` datetime NOT NULL,
  `modificationDate` datetime NOT NULL,
  `name` varchar(45) NOT NULL,
  `price` varchar(45) NOT NULL,
  `imageUrl` varchar(100) NOT NULL,
  `description` varchar(200) NOT NULL,
  `idCategory` int(11) NOT NULL,
  `idRestaurant` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `product`
--

INSERT INTO `product` (`id`, `creationDate`, `modificationDate`, `name`, `price`, `imageUrl`, `description`, `idCategory`, `idRestaurant`) VALUES
(1, '2021-05-02 15:10:11', '2021-05-02 15:10:11', 'Lincoln XXL', '$960', './dbimg/pizzamuzzarela.jpg', 'Mozzarella(con sasa de tomate hells)', 2, 1),
(2, '2021-05-02 15:20:21', '2021-05-02 15:20:21', 'Burger doble', '$650', './dbimg/hamburguesa-clasica.jpg', '2 carnes 120g, queso cheddar, panceta y huevo, con papas fritas', 3, 2),
(3, '2021-05-03 15:20:21', '2021-05-03 15:20:21', 'Coca Cola 500ml', '$60', './dbimg/cocacola.jpg', 'Bebida cola de 500ml', 4, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `restaurant`
--

CREATE TABLE `restaurant` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `restaurant`
--

INSERT INTO `restaurant` (`id`, `name`) VALUES
(1, 'Hells Pizza'),
(2, 'Birra Bar'),
(3, 'Full Escabio');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `email` varchar(100) NOT NULL,
  `permissionLevel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `permissionLevel`) VALUES
(1, 'Santi Calvi', 'santicalvi@mail.com', 1),
(2, 'Seba López', 'sebalopez@mail.com', 1),
(3, 'Tomi Cabral', 'tomich@mail.com', 1),
(4, 'Eze Medina', 'ezemedina@mail.com', 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `restaurant`
--
ALTER TABLE `restaurant`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
