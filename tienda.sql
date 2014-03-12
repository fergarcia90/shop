-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 09-12-2013 a las 17:58:36
-- Versión del servidor: 5.5.27
-- Versión de PHP: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `tienda`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito`
--

CREATE TABLE IF NOT EXISTS `carrito` (
  `id_p` varchar(5) NOT NULL,
  `upc` varchar(10) DEFAULT NULL,
  `marca` varchar(10) DEFAULT NULL,
  `modelo` varchar(10) DEFAULT NULL,
  `procesador` varchar(20) DEFAULT NULL,
  `pulgadas` varchar(15) DEFAULT NULL,
  `memoria` varchar(10) DEFAULT NULL,
  `hd` varchar(10) DEFAULT NULL,
  `precio` int(11) DEFAULT NULL,
  `userId` varchar(10) DEFAULT NULL,
  `id_unico` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_unico`),
  KEY `fk` (`userId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Volcado de datos para la tabla `carrito`
--

INSERT INTO `carrito` (`id_p`, `upc`, `marca`, `modelo`, `procesador`, `pulgadas`, `memoria`, `hd`, `precio`, `userId`, `id_unico`) VALUES
('4', '885903', 'HP', 'Pavilion 1', 'AMD A8', '16"', '8GB', '1TB', 15000, 'fer', 5),
('11', '885910', 'BlackBerry', 'Playbook', 'Nvidia Tegra', '7"', '1GB', '16GB', 3999, 'fer', 6),
('3', '885902', 'HP', 'Pavilion 1', 'AMD A6', '14"', '4GB', '500GB', 10000, 'luis', 7),
('1', '885900', 'Apple', 'MacBook 13', 'Intel Core i5', '13"', '4GB', '500GB', 18000, 'zurdo', 9),
('4', '885903', 'HP', 'Pavilion 1', 'AMD A8', '16"', '8GB', '1TB', 15000, 'zurdo', 10),
('3', '885902', 'HP', 'Pavilion 1', 'AMD A6', '14"', '4GB', '500GB', 10000, 'fer', 11);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE IF NOT EXISTS `producto` (
  `id_p` varchar(5) NOT NULL,
  `upc` varchar(10) DEFAULT NULL,
  `marca` varchar(10) DEFAULT NULL,
  `modelo` varchar(10) DEFAULT NULL,
  `procesador` varchar(20) DEFAULT NULL,
  `pulgadas` varchar(15) DEFAULT NULL,
  `memoria` varchar(10) DEFAULT NULL,
  `hd` varchar(10) DEFAULT NULL,
  `precio` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_p`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id_p`, `upc`, `marca`, `modelo`, `procesador`, `pulgadas`, `memoria`, `hd`, `precio`) VALUES
('1', '885900', 'Apple', 'MacBook 13', 'Intel Core i5', '13"', '4GB', '500GB', 18000),
('10', '885909', 'Acer', 'Iconia A8', 'Nvidia Tegra', '8"', '1GB', '16GB', 2999),
('11', '885910', 'BlackBerry', 'Playbook', 'Nvidia Tegra', '7"', '1GB', '16GB', 3999),
('2', '885901', 'Apple', 'MacBook 15', 'Intel Core i7', '15"', '6GB', '750GB', 21000),
('3', '885902', 'HP', 'Pavilion 1', 'AMD A6', '14"', '4GB', '500GB', 10000),
('4', '885903', 'HP', 'Pavilion 1', 'AMD A8', '16"', '8GB', '1TB', 15000),
('5', '885904', 'Sony', 'Vaio 14', 'Intel Core i3', '14"', '4GB', '500GB', 8000),
('6', '885905', 'Sony', 'Vaio 16', 'Intel Pentium', '16"', '4GB', '500GB', 10000),
('7', '885906', 'Acer', 'Aspire One', 'Intel Core i5', '14"', '4GB', '750GB', 8000),
('8', '885907', 'Asus', 'N-76', 'Intel Core i7', '16"', '6GB', '1TB', 14999),
('9', '885908', 'Apple', 'Ipad', 'A5', '9.1"', '1GB', '16GB', 5999);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_auth_user`
--

CREATE TABLE IF NOT EXISTS `tbl_auth_user` (
  `userId` varchar(10) NOT NULL,
  `user_password` varchar(15) DEFAULT NULL,
  `rol` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`userId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_auth_user`
--

INSERT INTO `tbl_auth_user` (`userId`, `user_password`, `rol`) VALUES
('fer', '12345', 'admin'),
('luis', '123', 'usuario'),
('zurdo', '12345', 'usuario');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD CONSTRAINT `fk` FOREIGN KEY (`userId`) REFERENCES `tbl_auth_user` (`userId`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
