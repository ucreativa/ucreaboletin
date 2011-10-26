-- phpMyAdmin SQL Dump
-- version 3.4.3.2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 19-09-2011 a las 12:27:32
-- Versión del servidor: 5.1.54
-- Versión de PHP: 5.3.5-1ubuntu7.2

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `bd_ucreanewsrh`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_blogs`
--

CREATE TABLE IF NOT EXISTS `tbl_blogs` (
  `blog_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_fk` bigint(20) NOT NULL,
  `blog_name` varchar(64) NOT NULL,
  `blog_title` varchar(128) NOT NULL,
  `blog_description` varchar(256) NOT NULL,
  `blog_status` varchar(1) NOT NULL,
  `blog_created` date NOT NULL,
  PRIMARY KEY (`blog_id`),
  KEY `user_fk` (`user_fk`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_comments`
--

CREATE TABLE IF NOT EXISTS `tbl_comments` (
  `comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_fk` bigint(20) NOT NULL,
  `comment_text` text NOT NULL,
  `comment_status` varchar(1) NOT NULL,
  `comment_created` date NOT NULL,
  `comment_modified` date NOT NULL,
  PRIMARY KEY (`comment_id`),
  KEY `user_fk` (`user_fk`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_entries`
--

CREATE TABLE IF NOT EXISTS `tbl_entries` (
  `entries_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_fk` bigint(20) NOT NULL,
  `entrie_title` varchar(128) NOT NULL,
  `entrie_text` text NOT NULL,
  `entrie_status` varchar(1) NOT NULL,
  `entrie_created` date NOT NULL,
  `entrie_modified` date NOT NULL,
  PRIMARY KEY (`entries_id`),
  KEY `user_fk` (`user_fk`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_files`
--

CREATE TABLE IF NOT EXISTS `tbl_files` (
  `file_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `file_name` varchar(64) NOT NULL,
  `file_description` varchar(256) NOT NULL,
  `file_author` varchar(64) NOT NULL,
  `file_date` date NOT NULL,
  `file_type` varchar(16) NOT NULL,
  `file_first` varchar(1) NOT NULL DEFAULT 'N',
  `file_status` varchar(1) NOT NULL DEFAULT 'A',
  `file_created` date NOT NULL,
  `file_modified` date NOT NULL,
  PRIMARY KEY (`file_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_files_entries`
--

CREATE TABLE IF NOT EXISTS `tbl_files_entries` (
  `file_entrie_id` int(11) NOT NULL AUTO_INCREMENT,
  `file_fk` bigint(20) NOT NULL,
  `entrie_fk` bigint(20) NOT NULL,
  PRIMARY KEY (`file_entrie_id`),
  KEY `file_fk` (`file_fk`),
  KEY `entrie_fk` (`entrie_fk`),
  KEY `file_fk_2` (`file_fk`),
  KEY `entrie_fk_2` (`entrie_fk`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_tags`
--

CREATE TABLE IF NOT EXISTS `tbl_tags` (
  `tag_id` int(11) NOT NULL AUTO_INCREMENT,
  `tag_name` varchar(64) NOT NULL,
  `tag_status` varchar(1) NOT NULL DEFAULT 'A',
  `tag_created` date NOT NULL,
  `tag_modified` date NOT NULL,
  PRIMARY KEY (`tag_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_tags_entries`
--

CREATE TABLE IF NOT EXISTS `tbl_tags_entries` (
  `tag_entrie_id` int(11) NOT NULL AUTO_INCREMENT,
  `tag_fk` int(11) NOT NULL,
  `entrie_fk` bigint(20) NOT NULL,
  PRIMARY KEY (`tag_entrie_id`),
  KEY `tag_fk` (`tag_fk`),
  KEY `entrie_fk` (`entrie_fk`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_users`
--

CREATE TABLE IF NOT EXISTS `tbl_users` (
  `user_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(32) NOT NULL,
  `user_password` varchar(32) NOT NULL,
  `user_group_fk` int(11) NOT NULL,
  `user_info` varchar(128) DEFAULT NULL,
  `user_email` varchar(128) NOT NULL,
  `user_status` varchar(1) NOT NULL,
  `user_created` date NOT NULL,
  `user_modified` date NOT NULL,
  UNIQUE KEY `user_id` (`user_id`),
  UNIQUE KEY `user_name` (`user_name`),
  KEY `user_group_fk` (`user_group_fk`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `tbl_users`
--

INSERT INTO `tbl_users` (`user_id`, `user_name`, `user_password`, `user_group_fk`, `user_info`, `user_email`, `user_status`, `user_created`, `user_modified`) VALUES
(1, 'adminrh', '202cb962ac59075b964b07152d234b70', 1, 'administrador', 'info@default.com', 'A', '2011-09-19', '2011-09-19');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_users_groups`
--

CREATE TABLE IF NOT EXISTS `tbl_users_groups` (
  `user_group_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_group_name` varchar(32) NOT NULL,
  `user_group_acces` varchar(128) NOT NULL,
  `user_group_info` varchar(128) NOT NULL,
  `user_group_status` varchar(1) NOT NULL DEFAULT '1',
  `user_group_created` date NOT NULL,
  `user_group_modified` date NOT NULL,
  PRIMARY KEY (`user_group_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `tbl_users_groups`
--

INSERT INTO `tbl_users_groups` (`user_group_id`, `user_group_name`, `user_group_acces`, `user_group_info`, `user_group_status`, `user_group_created`, `user_group_modified`) VALUES
(1, 'ADMINISTRADOR', '[]', 'Grupo Administrador', '1', '2011-09-19', '2011-09-19');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tbl_blogs`
--
ALTER TABLE `tbl_blogs`
  ADD CONSTRAINT `tbl_blogs_ibfk_1` FOREIGN KEY (`user_fk`) REFERENCES `tbl_users` (`user_id`);

--
-- Filtros para la tabla `tbl_comments`
--
ALTER TABLE `tbl_comments`
  ADD CONSTRAINT `tbl_comments_ibfk_1` FOREIGN KEY (`user_fk`) REFERENCES `tbl_users` (`user_id`);

--
-- Filtros para la tabla `tbl_entries`
--
ALTER TABLE `tbl_entries`
  ADD CONSTRAINT `tbl_entries_ibfk_1` FOREIGN KEY (`user_fk`) REFERENCES `tbl_users` (`user_id`);

--
-- Filtros para la tabla `tbl_files_entries`
--
ALTER TABLE `tbl_files_entries`
  ADD CONSTRAINT `tbl_files_entries_ibfk_2` FOREIGN KEY (`entrie_fk`) REFERENCES `tbl_entries` (`entries_id`),
  ADD CONSTRAINT `tbl_files_entries_ibfk_1` FOREIGN KEY (`file_fk`) REFERENCES `tbl_files` (`file_id`);

--
-- Filtros para la tabla `tbl_tags_entries`
--
ALTER TABLE `tbl_tags_entries`
  ADD CONSTRAINT `tbl_tags_entries_ibfk_2` FOREIGN KEY (`entrie_fk`) REFERENCES `tbl_entries` (`entries_id`),
  ADD CONSTRAINT `tbl_tags_entries_ibfk_1` FOREIGN KEY (`tag_fk`) REFERENCES `tbl_tags` (`tag_id`);

--
-- Filtros para la tabla `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD CONSTRAINT `tbl_users_ibfk_1` FOREIGN KEY (`user_group_fk`) REFERENCES `tbl_users_groups` (`user_group_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
