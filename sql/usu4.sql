-- phpMyAdmin SQL Dump
-- version 3.4.10.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Temps de generació: 07-03-2012 a les 13:16:44
-- Versió del servidor: 5.1.57
-- Versió de PHP : 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de dades: `usu4`
--

-- --------------------------------------------------------

--
-- Estructura de la taula `zk_admin_category`
--

CREATE TABLE IF NOT EXISTS `zk_admin_category` (
  `pn_cid` int(11) NOT NULL AUTO_INCREMENT,
  `pn_name` varchar(32) NOT NULL DEFAULT '',
  `pn_description` varchar(254) NOT NULL DEFAULT '',
  PRIMARY KEY (`pn_cid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Bolcant dades de la taula `zk_admin_category`
--

INSERT INTO `zk_admin_category` (`pn_cid`, `pn_name`, `pn_description`) VALUES
(1, 'Sistema', 'Mòduls de sistema'),
(2, 'Intraweb', 'Mòduls desenvolupats en el marc del projecte Intraweb'),
(4, 'Continguts', 'Mòduls que proporcionen continguts per als usuaris'),
(5, 'Utilitats', 'Mòduls opcionals que no pertanyen ni a continguts ni  a intranet');

-- --------------------------------------------------------

--
-- Estructura de la taula `zk_admin_module`
--

CREATE TABLE IF NOT EXISTS `zk_admin_module` (
  `pn_amid` int(11) NOT NULL AUTO_INCREMENT,
  `pn_mid` int(11) NOT NULL DEFAULT '0',
  `pn_cid` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`pn_amid`),
  KEY `mid_cid` (`pn_mid`,`pn_cid`),
  KEY `mid` (`pn_mid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=714 ;

--
-- Bolcant dades de la taula `zk_admin_module`
--

INSERT INTO `zk_admin_module` (`pn_amid`, `pn_mid`, `pn_cid`) VALUES
(686, 1, 1),
(701, 2, 1),
(684, 3, 1),
(18, 4, 1),
(688, 5, 1),
(22, 6, 1),
(673, 7, 5),
(668, 8, 1),
(15, 9, 2),
(700, 10, 5),
(676, 11, 1),
(677, 12, 1),
(20, 13, 1),
(514, 14, 1),
(5, 15, 1),
(687, 16, 1),
(371, 18, 1),
(683, 19, 1),
(23, 20, 1),
(678, 21, 1),
(681, 22, 5),
(680, 23, 1),
(685, 24, 1),
(13, 25, 4),
(704, 26, 5),
(703, 27, 4),
(212, 34, 5),
(670, 39, 5),
(674, 41, 4),
(559, 42, 4),
(669, 46, 4),
(689, 49, 2),
(706, 50, 2),
(666, 51, 2),
(92, 52, 2),
(667, 53, 2),
(692, 54, 2),
(93, 55, 2),
(693, 56, 2),
(709, 57, 2),
(698, 58, 2),
(710, 59, 2),
(712, 60, 2),
(711, 61, 2),
(690, 66, 2),
(707, 70, 2),
(671, 71, 4),
(708, 72, 5),
(247, 74, 4),
(705, 75, 4),
(206, 76, 4),
(256, 77, 2),
(696, 78, 5),
(587, 80, 5),
(672, 81, 4),
(699, 88, 2),
(691, 89, 2),
(420, 90, 5),
(697, 92, 5),
(702, 93, 2),
(695, 94, 2),
(675, 104, 5),
(682, 106, 1),
(679, 108, 4),
(713, 109, 5),
(694, 113, 2);

-- --------------------------------------------------------

--
-- Estructura de la taula `zk_blocks`
--

CREATE TABLE IF NOT EXISTS `zk_blocks` (
  `pn_bid` int(11) NOT NULL AUTO_INCREMENT,
  `pn_bkey` varchar(255) NOT NULL DEFAULT '',
  `pn_title` varchar(255) NOT NULL DEFAULT '',
  `pn_content` longtext NOT NULL,
  `pn_url` longtext NOT NULL,
  `pn_mid` int(11) NOT NULL DEFAULT '0',
  `pn_filter` longtext NOT NULL,
  `pn_active` tinyint(4) NOT NULL DEFAULT '1',
  `pn_collapsable` int(11) NOT NULL DEFAULT '1',
  `pn_defaultstate` int(11) NOT NULL DEFAULT '1',
  `pn_refresh` int(11) NOT NULL DEFAULT '0',
  `pn_last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `pn_language` varchar(30) NOT NULL DEFAULT '',
  PRIMARY KEY (`pn_bid`),
  KEY `active_idx` (`pn_active`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- Bolcant dades de la taula `zk_blocks`
--

INSERT INTO `zk_blocks` (`pn_bid`, `pn_bkey`, `pn_title`, `pn_content`, `pn_url`, `pn_mid`, `pn_filter`, `pn_active`, `pn_collapsable`, `pn_defaultstate`, `pn_refresh`, `pn_last_update`, `pn_language`) VALUES
(1, 'extmenu', 'Menú principal', 'a:6:{s:14:"displaymodules";i:0;s:10:"stylesheet";s:11:"extmenu.css";s:8:"template";s:24:"blocks_block_extmenu.htm";s:11:"blocktitles";a:3:{s:2:"ca";s:15:"Menú principal";s:2:"en";s:9:"Main menu";s:2:"es";s:15:"Menú principal";}s:5:"links";a:3:{s:2:"en";a:13:{i:0;a:5:{s:5:"image";s:0:"";s:4:"name";s:7:"Agendas";s:3:"url";s:12:"[iw_agendas]";s:5:"title";s:26:"Private and public agendas";s:6:"active";s:1:"1";}i:1;a:5:{s:5:"image";s:0:"";s:4:"name";s:6:"Search";s:3:"url";s:8:"[Search]";s:5:"title";s:21:"Search in the website";s:6:"active";s:1:"1";}i:2;a:5:{s:5:"image";s:0:"";s:4:"name";s:8:"Contents";s:3:"url";s:9:"[content]";s:5:"title";s:12:"Content list";s:6:"active";s:1:"1";}i:3;a:5:{s:5:"image";s:0:"";s:4:"name";s:9:"Downloads";s:3:"url";s:11:"[Downloads]";s:5:"title";s:15:"Go to downloads";s:6:"active";s:1:"1";}i:4;a:5:{s:5:"image";s:0:"";s:4:"name";s:5:"Forms";s:3:"url";s:10:"[iw_forms]";s:5:"title";s:18:"Go to custom forms";s:6:"active";s:1:"1";}i:5;a:5:{s:5:"image";s:0:"";s:4:"name";s:6:"Forums";s:3:"url";s:11:"[iw_forums]";s:5:"title";s:12:"Go to forums";s:6:"active";s:1:"1";}i:6;a:5:{s:5:"image";s:0:"";s:4:"name";s:5:"JClic";s:3:"url";s:10:"[iw_jclic]";s:5:"title";s:16:"JClic activities";s:6:"active";s:1:"1";}i:7;a:5:{s:5:"image";s:0:"";s:4:"name";s:5:"Books";s:3:"url";s:10:"[iw_books]";s:5:"title";s:16:"Go to books list";s:6:"active";s:1:"1";}i:8;a:5:{s:5:"image";s:0:"";s:4:"name";s:5:"Pages";s:3:"url";s:7:"[Pages]";s:5:"title";s:16:"Static web pages";s:6:"active";s:1:"1";}i:9;a:5:{s:5:"image";s:0:"";s:4:"name";s:17:"Quaderns Virtuals";s:3:"url";s:7:"[iw_qv]";s:5:"title";s:23:"Go to Quaderns Virtuals";s:6:"active";s:1:"1";}i:10;a:5:{s:5:"image";s:0:"";s:4:"name";s:8:"Bookings";s:3:"url";s:13:"[iw_bookings]";s:5:"title";s:18:"Go to room booking";s:6:"active";s:1:"1";}i:11;a:5:{s:5:"image";s:0:"";s:4:"name";s:9:"Noteboard";s:3:"url";s:14:"[iw_noteboard]";s:5:"title";s:19:"Go to the noteboard";s:6:"active";s:1:"1";}i:12;a:5:{s:5:"image";s:0:"";s:4:"name";s:5:"Users";s:3:"url";s:10:"[iw_users]";s:5:"title";s:10:"Users list";s:6:"active";s:1:"1";}}s:2:"ca";a:13:{i:0;a:5:{s:5:"image";s:0:"";s:4:"name";s:7:"Agendes";s:3:"url";s:12:"[iw_agendas]";s:5:"title";s:28:"Agendes privada i públiques";s:6:"active";s:1:"1";}i:1;a:5:{s:5:"image";s:0:"";s:4:"name";s:7:"Cerques";s:3:"url";s:8:"[Search]";s:5:"title";s:21:"Cerques a la intranet";s:6:"active";s:1:"1";}i:2;a:5:{s:5:"image";s:0:"";s:4:"name";s:10:"Continguts";s:3:"url";s:9:"[content]";s:5:"title";s:20:"Llista de continguts";s:6:"active";s:1:"1";}i:3;a:5:{s:5:"image";s:0:"";s:4:"name";s:9:"Documents";s:3:"url";s:11:"[Downloads]";s:5:"title";s:26:"Descàrregues de documents";s:6:"active";s:1:"1";}i:4;a:5:{s:5:"image";s:0:"";s:4:"name";s:10:"Formularis";s:3:"url";s:10:"[iw_forms]";s:5:"title";s:25:"Formularis personalitzats";s:6:"active";s:1:"1";}i:5;a:5:{s:5:"image";s:0:"";s:4:"name";s:7:"Fòrums";s:3:"url";s:11:"[iw_forums]";s:5:"title";s:20:"Espais de discussió";s:6:"active";s:1:"1";}i:6;a:5:{s:5:"image";s:0:"";s:4:"name";s:5:"JClic";s:3:"url";s:10:"[iw_jclic]";s:5:"title";s:16:"Activitats JClic";s:6:"active";s:1:"1";}i:7;a:5:{s:5:"image";s:0:"";s:4:"name";s:18:"Llibres i lectures";s:3:"url";s:10:"[iw_books]";s:5:"title";s:18:"Llistat de llibres";s:6:"active";s:1:"1";}i:8;a:5:{s:5:"image";s:0:"";s:4:"name";s:8:"Pàgines";s:3:"url";s:7:"[Pages]";s:5:"title";s:24:"Pàgines web estàtiques";s:6:"active";s:1:"1";}i:9;a:5:{s:5:"image";s:0:"";s:4:"name";s:17:"Quaderns Virtuals";s:3:"url";s:7:"[iw_qv]";s:5:"title";s:26:"Vés als Quaderns Virtuals";s:6:"active";s:1:"1";}i:10;a:5:{s:5:"image";s:0:"";s:4:"name";s:8:"Reserves";s:3:"url";s:13:"[iw_bookings]";s:5:"title";s:26:"Reserves d''espais i equips";s:6:"active";s:1:"1";}i:11;a:5:{s:5:"image";s:0:"";s:4:"name";s:6:"Tauler";s:3:"url";s:14:"[iw_noteboard]";s:5:"title";s:16:"Tauler d''anuncis";s:6:"active";s:1:"1";}i:12;a:5:{s:5:"image";s:0:"";s:4:"name";s:7:"Usuaris";s:3:"url";s:10:"[iw_users]";s:5:"title";s:16:"Llista d''usuaris";s:6:"active";s:1:"1";}}s:2:"es";a:13:{i:0;a:5:{s:5:"image";s:0:"";s:4:"name";s:7:"Agendas";s:3:"url";s:12:"[iw_agendas]";s:5:"title";s:27:"Agendas privada y públicas";s:6:"active";s:1:"1";}i:1;a:5:{s:5:"image";s:0:"";s:4:"name";s:6:"Buscar";s:3:"url";s:8:"[Search]";s:5:"title";s:21:"Buscar en la intranet";s:6:"active";s:1:"1";}i:2;a:5:{s:5:"image";s:0:"";s:4:"name";s:10:"Contenidos";s:3:"url";s:9:"[content]";s:5:"title";s:19:"Lista de contenidos";s:6:"active";s:1:"1";}i:3;a:5:{s:5:"image";s:0:"";s:4:"name";s:9:"Descargas";s:3:"url";s:11:"[Downloads]";s:5:"title";s:23:"Descargas de documentos";s:6:"active";s:1:"1";}i:4;a:5:{s:5:"image";s:0:"";s:4:"name";s:11:"Formularios";s:3:"url";s:10:"[iw_forms]";s:5:"title";s:26:"Formularios personalizados";s:6:"active";s:1:"1";}i:5;a:5:{s:5:"image";s:0:"";s:4:"name";s:7:"Fórums";s:3:"url";s:11:"[iw_forums]";s:5:"title";s:22:"Espacios de discusión";s:6:"active";s:1:"1";}i:6;a:5:{s:5:"image";s:0:"";s:4:"name";s:5:"JClic";s:3:"url";s:10:"[iw_jclic]";s:5:"title";s:17:"Actividades JClic";s:6:"active";s:1:"1";}i:7;a:5:{s:5:"image";s:0:"";s:4:"name";s:17:"Libros y lecturas";s:3:"url";s:10:"[iw_books]";s:5:"title";s:15:"Lista de libros";s:6:"active";s:1:"1";}i:8;a:5:{s:5:"image";s:0:"";s:4:"name";s:8:"Páginas";s:3:"url";s:7:"[Pages]";s:5:"title";s:23:"Páginas web estáticas";s:6:"active";s:1:"1";}i:9;a:5:{s:5:"image";s:0:"";s:4:"name";s:17:"Quaderns Virtuals";s:3:"url";s:7:"[iw_qv]";s:5:"title";s:26:"Ir a los Quaderns Virtuals";s:6:"active";s:1:"1";}i:10;a:5:{s:5:"image";s:0:"";s:4:"name";s:8:"Reservas";s:3:"url";s:13:"[iw_bookings]";s:5:"title";s:30:"Reservas de espacios y equipos";s:6:"active";s:1:"1";}i:11;a:5:{s:5:"image";s:0:"";s:4:"name";s:19:"Tablón de anuncios";s:3:"url";s:14:"[iw_noteboard]";s:5:"title";s:19:"Tablón de anuncios";s:6:"active";s:1:"1";}i:12;a:5:{s:5:"image";s:0:"";s:4:"name";s:8:"Usuarios";s:3:"url";s:10:"[iw_users]";s:5:"title";s:17:"Lista de usuarios";s:6:"active";s:1:"1";}}}s:12:"blockversion";i:1;}', '', 3, 'a:3:{s:4:"type";s:0:"";s:9:"functions";s:0:"";s:10:"customargs";s:0:"";}', 1, 0, 1, 3600, '2010-09-07 11:55:39', ''),
(2, 'thelang', 'Idiomes', 'a:1:{s:9:"languages";a:3:{i:0;s:2:"ca";i:1;s:2:"en";i:2;s:2:"es";}}', '', 3, '', 1, 1, 1, 3600, '2008-09-04 11:45:49', ''),
(3, 'login', 'Entrada d''usuaris', '', '', 12, '', 1, 1, 1, 3600, '2008-09-04 11:45:49', ''),
(5, 'messages', 'Missatges d''administració', '', '', 24, '', 1, 1, 1, 3600, '2008-09-04 11:45:49', ''),
(6, 'online', 'Qui hi ha?', '', '', 12, 'a:3:{s:4:"type";s:0:"";s:9:"functions";s:0:"";s:10:"customargs";s:0:"";}', 1, 0, 1, 3600, '2008-09-09 15:26:52', ''),
(7, 'iwnews', 'Novetats', '', '', 49, 'a:3:{s:4:"type";s:0:"";s:9:"functions";s:0:"";s:10:"customargs";s:0:"";}', 1, 0, 1, 3600, '2008-09-22 13:37:36', ''),
(9, 'calendar', 'Calendari', '', '', 51, 'a:3:{s:4:"type";s:0:"";s:9:"functions";s:0:"";s:10:"customargs";s:0:"";}', 1, 0, 1, 3600, '2008-09-25 09:56:48', ''),
(10, 'next', 'Properes', '', '7', 51, 'a:3:{s:4:"type";s:0:"";s:9:"functions";s:0:"";s:10:"customargs";s:0:"";}', 1, 0, 1, 3600, '2008-09-25 09:57:51', ''),
(11, 'nbheadlines', 'Titulars', '', '', 57, 'a:3:{s:4:"type";s:0:"";s:9:"functions";s:0:"";s:10:"customargs";s:0:"";}', 1, 0, 1, 3600, '2008-09-25 09:59:44', ''),
(12, 'nbtopics', 'Temes del tauler', '', '', 57, 'a:3:{s:4:"type";s:0:"";s:9:"functions";s:0:"";s:10:"customargs";s:0:"";}', 1, 0, 1, 3600, '2008-09-25 10:01:37', ''),
(13, 'myrole', 'El meu rol', '', '', 93, '', 1, 0, 1, 3600, '2008-10-20 11:40:34', ''),
(14, 'jclic', 'JClic', '', '', 94, 'a:3:{s:4:"type";s:0:"";s:9:"functions";s:0:"";s:10:"customargs";s:0:"";}', 1, 0, 1, 3600, '2009-02-03 08:56:00', ''),
(15, 'qvsummary', 'Quaderns Virtuals', '', '', 50, 'a:3:{s:4:"type";s:0:"";s:9:"functions";s:0:"";s:10:"customargs";s:0:"";}', 1, 0, 1, 3600, '2009-02-03 08:56:39', ''),
(16, 'extmenu', 'Menú d''edició', 'a:6:{s:14:"displaymodules";i:0;s:10:"stylesheet";s:11:"extmenu.css";s:8:"template";s:24:"blocks_block_extmenu.htm";s:11:"blocktitles";a:3:{s:2:"en";s:13:"Editor''s menu";s:2:"ca";s:15:"Menú d''edició";s:2:"es";s:17:"Menú de edición";}s:5:"links";a:3:{s:2:"en";a:4:{i:0;a:5:{s:5:"image";s:0:"";s:4:"name";s:7:"Content";s:3:"url";s:34:"index.php?module=content&type=edit";s:5:"title";s:0:"";s:6:"active";s:1:"1";}i:1;a:5:{s:5:"image";s:0:"";s:4:"name";s:9:"Downloads";s:3:"url";s:43:"index.php?module=Downloads&func=newdownload";s:5:"title";s:0:"";s:6:"active";s:1:"1";}i:2;a:5:{s:5:"image";s:0:"";s:4:"name";s:4:"News";s:3:"url";s:30:"index.php?module=News&func=new";s:5:"title";s:0:"";s:6:"active";s:1:"1";}i:3;a:5:{s:5:"image";s:0:"";s:4:"name";s:5:"Pages";s:3:"url";s:42:"index.php?module=Pages&type=admin&func=new";s:5:"title";s:0:"";s:6:"active";s:1:"1";}}s:2:"ca";a:4:{i:0;a:5:{s:5:"image";s:0:"";s:4:"name";s:10:"Continguts";s:3:"url";s:34:"index.php?module=content&type=edit";s:5:"title";s:0:"";s:6:"active";s:1:"1";}i:1;a:5:{s:5:"image";s:0:"";s:4:"name";s:13:"Descàrregues";s:3:"url";s:43:"index.php?module=Downloads&func=newdownload";s:5:"title";s:0:"";s:6:"active";s:1:"1";}i:2;a:5:{s:5:"image";s:0:"";s:4:"name";s:9:"Notícies";s:3:"url";s:30:"index.php?module=News&func=new";s:5:"title";s:0:"";s:6:"active";s:1:"1";}i:3;a:5:{s:5:"image";s:0:"";s:4:"name";s:8:"Pàgines";s:3:"url";s:42:"index.php?module=Pages&type=admin&func=new";s:5:"title";s:0:"";s:6:"active";s:1:"1";}}s:2:"es";a:4:{i:0;a:5:{s:5:"image";s:0:"";s:4:"name";s:10:"Contenidos";s:3:"url";s:34:"index.php?module=content&type=edit";s:5:"title";s:0:"";s:6:"active";s:1:"1";}i:1;a:5:{s:5:"image";s:0:"";s:4:"name";s:9:"Descargas";s:3:"url";s:43:"index.php?module=Downloads&func=newdownload";s:5:"title";s:0:"";s:6:"active";s:1:"1";}i:2;a:5:{s:5:"image";s:0:"";s:4:"name";s:8:"Noticias";s:3:"url";s:30:"index.php?module=News&func=new";s:5:"title";s:0:"";s:6:"active";s:1:"1";}i:3;a:5:{s:5:"image";s:0:"";s:4:"name";s:8:"Páginas";s:3:"url";s:42:"index.php?module=Pages&type=admin&func=new";s:5:"title";s:0:"";s:6:"active";s:1:"1";}}}s:12:"blockversion";i:1;}', '', 3, 'a:3:{s:4:"type";s:0:"";s:9:"functions";s:0:"";s:10:"customargs";s:0:"";}', 1, 0, 1, 3600, '2010-09-07 11:54:51', '');

-- --------------------------------------------------------

--
-- Estructura de la taula `zk_block_placements`
--

CREATE TABLE IF NOT EXISTS `zk_block_placements` (
  `pn_pid` int(11) NOT NULL DEFAULT '0',
  `pn_bid` int(11) NOT NULL DEFAULT '0',
  `pn_order` int(11) NOT NULL DEFAULT '0',
  KEY `bid_pid_idx` (`pn_bid`,`pn_pid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Bolcant dades de la taula `zk_block_placements`
--

INSERT INTO `zk_block_placements` (`pn_pid`, `pn_bid`, `pn_order`) VALUES
(3, 5, 0),
(2, 9, 0),
(2, 10, 1),
(2, 14, 2),
(2, 15, 3),
(2, 11, 4),
(1, 7, 0),
(1, 16, 1),
(1, 1, 2),
(1, 13, 3),
(1, 3, 4),
(1, 12, 5),
(1, 6, 6),
(1, 2, 7);

-- --------------------------------------------------------

--
-- Estructura de la taula `zk_block_positions`
--

CREATE TABLE IF NOT EXISTS `zk_block_positions` (
  `pn_pid` int(11) NOT NULL AUTO_INCREMENT,
  `pn_name` varchar(255) NOT NULL DEFAULT '',
  `pn_description` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`pn_pid`),
  KEY `name_idx` (`pn_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Bolcant dades de la taula `zk_block_positions`
--

INSERT INTO `zk_block_positions` (`pn_pid`, `pn_name`, `pn_description`) VALUES
(1, 'left', 'Blocs de l''esquerra'),
(2, 'right', 'Blocs de la dreta'),
(3, 'center', 'Blocs centrals');

-- --------------------------------------------------------

--
-- Estructura de la taula `zk_categories_category`
--

CREATE TABLE IF NOT EXISTS `zk_categories_category` (
  `cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_parent_id` int(11) NOT NULL DEFAULT '1',
  `cat_is_locked` tinyint(4) NOT NULL DEFAULT '0',
  `cat_is_leaf` tinyint(4) NOT NULL DEFAULT '0',
  `cat_name` varchar(255) NOT NULL DEFAULT '',
  `cat_value` varchar(255) NOT NULL DEFAULT '',
  `cat_sort_value` int(11) NOT NULL DEFAULT '0',
  `cat_display_name` mediumtext,
  `cat_display_desc` mediumtext,
  `cat_path` mediumtext,
  `cat_ipath` varchar(255) NOT NULL DEFAULT '',
  `cat_status` varchar(1) NOT NULL DEFAULT 'A',
  `cat_obj_status` varchar(1) NOT NULL DEFAULT 'A',
  `cat_cr_date` datetime NOT NULL DEFAULT '1970-01-01 00:00:00',
  `cat_cr_uid` int(11) NOT NULL DEFAULT '0',
  `cat_lu_date` datetime NOT NULL DEFAULT '1970-01-01 00:00:00',
  `cat_lu_uid` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`cat_id`),
  KEY `idx_categories_parent` (`cat_parent_id`),
  KEY `idx_categories_is_leaf` (`cat_is_leaf`),
  KEY `idx_categories_name` (`cat_name`),
  KEY `idx_categories_ipath` (`cat_ipath`,`cat_is_leaf`,`cat_status`),
  KEY `idx_categories_status` (`cat_status`),
  KEY `idx_categories_ipath_status` (`cat_ipath`,`cat_status`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10021 ;

--
-- Bolcant dades de la taula `zk_categories_category`
--

INSERT INTO `zk_categories_category` (`cat_id`, `cat_parent_id`, `cat_is_locked`, `cat_is_leaf`, `cat_name`, `cat_value`, `cat_sort_value`, `cat_display_name`, `cat_display_desc`, `cat_path`, `cat_ipath`, `cat_status`, `cat_obj_status`, `cat_cr_date`, `cat_cr_uid`, `cat_lu_date`, `cat_lu_uid`) VALUES
(1, 0, 1, 0, '__SYSTEM__', '', 0, 'a:3:{s:2:"ca";s:5:"Arrel";s:2:"en";s:4:"Root";s:2:"es";s:5:"Raíz";}', 'a:3:{s:2:"ca";s:0:"";s:2:"en";s:0:"";s:2:"es";s:0:"";}', '/__SYSTEM__', '/1', 'A', 'A', '2008-09-04 11:45:52', 0, '2010-09-06 17:19:11', 10),
(2, 1, 0, 0, 'Modules', '', 0, 'a:3:{s:2:"ca";s:7:"Mòduls";s:2:"en";s:7:"Modules";s:2:"es";s:8:"Módulos";}', 'a:3:{s:2:"ca";s:0:"";s:2:"en";s:0:"";s:2:"es";s:0:"";}', '/__SYSTEM__/Modules', '/1/2', 'A', 'A', '2008-09-04 11:45:53', 0, '2010-09-06 17:03:10', 10),
(29, 1, 0, 0, 'Users', '', 0, 'a:3:{s:2:"ca";s:7:"Usuaris";s:2:"en";s:5:"Users";s:2:"es";s:8:"Usuarios";}', 'a:3:{s:2:"ca";s:0:"";s:2:"en";s:0:"";s:2:"es";s:0:"";}', '/__SYSTEM__/Users', '/1/29', 'A', 'A', '2008-09-04 11:45:55', 0, '2010-09-06 17:18:36', 10),
(30, 2, 0, 0, 'Global', '', 0, 'a:3:{s:2:"ca";s:6:"Global";s:2:"en";s:6:"Global";s:2:"es";s:6:"Global";}', 'a:3:{s:2:"ca";s:0:"";s:2:"en";s:0:"";s:2:"es";s:0:"";}', '/__SYSTEM__/Modules/Global', '/1/2/30', 'A', 'A', '2008-09-04 11:45:55', 0, '2010-09-06 17:12:40', 10),
(10000, 2, 0, 0, 'News', '', 0, 'a:3:{s:2:"ca";s:9:"Notícies";s:2:"en";s:4:"News";s:2:"es";s:8:"Noticias";}', 'a:3:{s:2:"ca";s:0:"";s:2:"en";s:0:"";s:2:"es";s:0:"";}', '/__SYSTEM__/Modules/News', '/1/2/10000', 'A', 'A', '2008-09-04 13:25:03', 2, '2010-09-06 17:04:53', 10),
(10001, 30, 0, 1, 'alumnat', '', 10, 'a:3:{s:2:"ca";s:7:"Alumnat";s:2:"en";s:8:"Students";s:2:"es";s:8:"Alumnado";}', 'a:3:{s:2:"ca";s:0:"";s:2:"en";s:0:"";s:2:"es";s:0:"";}', '/__SYSTEM__/Modules/Global/alumnat', '/1/2/30/10001', 'A', 'A', '2008-09-08 12:38:43', 2, '2010-09-06 17:13:05', 10),
(10002, 30, 0, 1, 'professorat', '', 20, 'a:3:{s:2:"ca";s:11:"Professorat";s:2:"en";s:8:"Teachers";s:2:"es";s:11:"Profesorado";}', 'a:3:{s:2:"ca";s:0:"";s:2:"en";s:0:"";s:2:"es";s:0:"";}', '/__SYSTEM__/Modules/Global/professorat', '/1/2/30/10002', 'A', 'A', '2008-09-08 12:39:49', 2, '2010-09-06 17:13:26', 10),
(10003, 30, 0, 1, 'ampa', '', 30, 'a:3:{s:2:"ca";s:4:"AMPA";s:2:"en";s:4:"AMPA";s:2:"es";s:4:"AMPA";}', 'a:3:{s:2:"ca";s:0:"";s:2:"en";s:0:"";s:2:"es";s:0:"";}', '/__SYSTEM__/Modules/Global/ampa', '/1/2/30/10003', 'A', 'A', '2008-09-08 12:40:44', 2, '2010-09-06 17:15:29', 10),
(10004, 30, 0, 1, 'comunitat', '', 40, 'a:3:{s:2:"ca";s:9:"Comunitat";s:2:"en";s:9:"Community";s:2:"es";s:9:"Comunidad";}', 'a:3:{s:2:"ca";s:0:"";s:2:"en";s:0:"";s:2:"es";s:0:"";}', '/__SYSTEM__/Modules/Global/comunitat', '/1/2/30/10004', 'A', 'A', '2008-09-08 12:42:18', 2, '2010-09-06 17:15:10', 10),
(10005, 30, 0, 1, 'informacions', '', 50, 'a:3:{s:2:"ca";s:12:"Informacions";s:2:"en";s:12:"Informations";s:2:"es";s:13:"Informaciones";}', 'a:3:{s:2:"ca";s:0:"";s:2:"en";s:0:"";s:2:"es";s:0:"";}', '/__SYSTEM__/Modules/Global/informacions', '/1/2/30/10005', 'A', 'A', '2008-09-08 12:43:32', 2, '2010-09-06 17:16:18', 10),
(10006, 30, 0, 1, 'noregistrats', '', 60, 'a:3:{s:2:"ca";s:13:"No registrats";s:2:"en";s:12:"Unregistered";s:2:"es";s:14:"No registrados";}', 'a:3:{s:2:"ca";s:0:"";s:2:"en";s:0:"";s:2:"es";s:0:"";}', '/__SYSTEM__/Modules/Global/noregistrats', '/1/2/30/10006', 'A', 'A', '2008-09-08 12:45:17', 2, '2010-09-06 17:16:47', 10),
(10017, 2, 0, 0, 'Pages', '', 0, 'a:3:{s:2:"ca";s:8:"Pàgines";s:2:"en";s:5:"Pages";s:2:"es";s:8:"Páginas";}', 'a:3:{s:2:"ca";s:0:"";s:2:"en";s:0:"";s:2:"es";s:0:"";}', '/__SYSTEM__/Modules/Pages', '/1/2/10017', 'A', 'A', '2008-09-08 17:26:08', 2, '2010-09-06 17:18:07', 10),
(10018, 2, 0, 0, 'Feeds', '', 0, 'a:3:{s:2:"ca";s:18:"Fonts de notícies";s:2:"en";s:10:"News feeds";s:2:"es";s:19:"Fuentes de noticias";}', 'a:3:{s:2:"ca";s:0:"";s:2:"en";s:0:"";s:2:"es";s:0:"";}', '/__SYSTEM__/Modules/Feeds', '/1/2/10018', 'A', 'A', '2008-10-16 12:17:01', 2, '2010-09-06 17:11:25', 10),
(10019, 2, 0, 0, 'Quotes', '', 0, 'a:3:{s:2:"ca";s:21:"Citacions aleatòries";s:2:"en";s:13:"Random quotes";s:2:"es";s:16:"Citas aleatorias";}', 'a:3:{s:2:"ca";s:0:"";s:2:"en";s:0:"";s:2:"es";s:0:"";}', '/__SYSTEM__/Modules/Quotes', '/1/2/10019', 'A', 'A', '2008-10-16 12:20:46', 2, '2010-09-06 17:17:37', 10),
(10020, 2, 0, 0, 'FAQ', '', 0, 'a:3:{s:2:"ca";s:3:"PMF";s:2:"en";s:3:"FAQ";s:2:"es";s:3:"PMF";}', 'a:3:{s:2:"ca";s:0:"";s:2:"en";s:0:"";s:2:"es";s:0:"";}', '/__SYSTEM__/Modules/FAQ', '/1/2/10020', 'A', 'A', '2009-01-07 10:02:29', 2, '2010-09-06 17:12:11', 10);

-- --------------------------------------------------------

--
-- Estructura de la taula `zk_categories_mapmeta`
--

CREATE TABLE IF NOT EXISTS `zk_categories_mapmeta` (
  `cmm_id` int(11) NOT NULL AUTO_INCREMENT,
  `cmm_meta_id` int(11) NOT NULL DEFAULT '0',
  `cmm_category_id` int(11) NOT NULL DEFAULT '0',
  `cmm_obj_status` varchar(1) NOT NULL DEFAULT 'A',
  `cmm_cr_date` datetime NOT NULL DEFAULT '1970-01-01 00:00:00',
  `cmm_cr_uid` int(11) NOT NULL DEFAULT '0',
  `cmm_lu_date` datetime NOT NULL DEFAULT '1970-01-01 00:00:00',
  `cmm_lu_uid` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`cmm_id`),
  KEY `idx_categories_mapmeta` (`cmm_meta_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de la taula `zk_categories_mapobj`
--

CREATE TABLE IF NOT EXISTS `zk_categories_mapobj` (
  `cmo_id` int(11) NOT NULL AUTO_INCREMENT,
  `cmo_modname` varchar(60) NOT NULL DEFAULT '',
  `cmo_table` varchar(60) NOT NULL,
  `cmo_obj_id` int(11) NOT NULL DEFAULT '0',
  `cmo_obj_idcolumn` varchar(60) NOT NULL DEFAULT 'id',
  `cmo_reg_id` int(11) NOT NULL,
  `cmo_category_id` int(11) NOT NULL,
  `cmo_obj_status` varchar(1) NOT NULL DEFAULT 'A',
  `cmo_cr_date` datetime NOT NULL DEFAULT '1970-01-01 00:00:00',
  `cmo_cr_uid` int(11) NOT NULL DEFAULT '0',
  `cmo_lu_date` datetime NOT NULL DEFAULT '1970-01-01 00:00:00',
  `cmo_lu_uid` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`cmo_id`),
  KEY `idx_categories_mapobj` (`cmo_modname`,`cmo_table`,`cmo_obj_id`,`cmo_obj_idcolumn`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Bolcant dades de la taula `zk_categories_mapobj`
--

INSERT INTO `zk_categories_mapobj` (`cmo_id`, `cmo_modname`, `cmo_table`, `cmo_obj_id`, `cmo_obj_idcolumn`, `cmo_reg_id`, `cmo_category_id`, `cmo_obj_status`, `cmo_cr_date`, `cmo_cr_uid`, `cmo_lu_date`, `cmo_lu_uid`) VALUES
(2, 'Feeds', 'feeds', 1, 'fid', 7, 10004, 'A', '2008-11-06 12:36:02', 10, '2008-11-06 12:36:02', 10),
(3, 'Feeds', 'feeds', 2, 'fid', 7, 10004, 'A', '2008-11-06 12:36:35', 10, '2008-11-06 12:36:35', 10),
(4, 'Feeds', 'feeds', 3, 'fid', 7, 10004, 'A', '2008-11-06 12:37:30', 10, '2008-11-06 12:37:30', 10),
(6, 'Feeds', 'feeds', 4, 'fid', 7, 10004, 'A', '2008-11-06 12:40:13', 10, '2008-11-06 12:40:13', 10),
(7, 'News', 'news', 1, 'sid', 1, 10005, 'A', '2009-03-06 13:31:24', 2, '2009-03-06 13:31:24', 2);

-- --------------------------------------------------------

--
-- Estructura de la taula `zk_categories_registry`
--

CREATE TABLE IF NOT EXISTS `zk_categories_registry` (
  `crg_id` int(11) NOT NULL AUTO_INCREMENT,
  `crg_modname` varchar(60) NOT NULL DEFAULT '',
  `crg_table` varchar(60) NOT NULL DEFAULT '',
  `crg_property` varchar(60) NOT NULL DEFAULT '',
  `crg_category_id` int(11) NOT NULL DEFAULT '0',
  `crg_obj_status` varchar(1) NOT NULL DEFAULT 'A',
  `crg_cr_date` datetime NOT NULL DEFAULT '1970-01-01 00:00:00',
  `crg_cr_uid` int(11) NOT NULL DEFAULT '0',
  `crg_lu_date` datetime NOT NULL DEFAULT '1970-01-01 00:00:00',
  `crg_lu_uid` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`crg_id`),
  KEY `idx_categories_registry` (`crg_modname`,`crg_table`,`crg_property`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Bolcant dades de la taula `zk_categories_registry`
--

INSERT INTO `zk_categories_registry` (`crg_id`, `crg_modname`, `crg_table`, `crg_property`, `crg_category_id`, `crg_obj_status`, `crg_cr_date`, `crg_cr_uid`, `crg_lu_date`, `crg_lu_uid`) VALUES
(1, 'News', 'news', 'Main', 30, 'A', '2008-09-04 13:25:03', 2, '2008-09-04 13:25:03', 2),
(2, 'Pages', 'pages', 'Main', 30, 'A', '2008-09-08 17:26:08', 2, '2008-09-08 17:26:08', 2),
(3, 'Content', 'content_page', 'primary', 30, 'A', '2008-09-08 17:51:46', 2, '2008-09-08 17:51:46', 2),
(7, 'Feeds', 'feeds', 'Main', 30, 'A', '2008-10-16 12:17:01', 2, '2008-10-16 12:17:01', 2),
(8, 'Quotes', 'quotes', 'Main', 30, 'A', '2008-10-16 12:20:46', 2, '2008-10-16 12:20:46', 2);

-- --------------------------------------------------------

--
-- Estructura de la taula `zk_content_content`
--

CREATE TABLE IF NOT EXISTS `zk_content_content` (
  `con_id` int(11) NOT NULL AUTO_INCREMENT,
  `con_pageid` int(11) NOT NULL,
  `con_areaindex` int(11) NOT NULL,
  `con_position` int(11) NOT NULL,
  `con_stylepos` varchar(20) NOT NULL DEFAULT 'none',
  `con_stylewidth` varchar(20) NOT NULL DEFAULT '100',
  `con_styleclass` varchar(100) NOT NULL DEFAULT '',
  `con_module` varchar(100) NOT NULL,
  `con_type` varchar(100) NOT NULL,
  `con_data` mediumtext,
  `con_obj_status` varchar(1) NOT NULL DEFAULT 'A',
  `con_cr_date` datetime NOT NULL DEFAULT '1970-01-01 00:00:00',
  `con_cr_uid` int(11) NOT NULL DEFAULT '0',
  `con_lu_date` datetime NOT NULL DEFAULT '1970-01-01 00:00:00',
  `con_lu_uid` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`con_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de la taula `zk_content_history`
--

CREATE TABLE IF NOT EXISTS `zk_content_history` (
  `ch_id` int(11) NOT NULL AUTO_INCREMENT,
  `ch_pageid` int(11) NOT NULL,
  `ch_data` longtext NOT NULL,
  `ch_revisionno` int(11) NOT NULL,
  `ch_action` varchar(255) NOT NULL,
  `ch_date` datetime NOT NULL,
  `ch_ipno` varchar(30) NOT NULL,
  `ch_userid` int(11) NOT NULL,
  PRIMARY KEY (`ch_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de la taula `zk_content_page`
--

CREATE TABLE IF NOT EXISTS `zk_content_page` (
  `page_id` int(11) NOT NULL AUTO_INCREMENT,
  `page_ppid` int(11) NOT NULL DEFAULT '0',
  `page_title` varchar(255) NOT NULL DEFAULT '',
  `page_urlname` varchar(255) NOT NULL DEFAULT '',
  `page_layout` varchar(100) NOT NULL,
  `page_categoryid` int(11) DEFAULT NULL,
  `page_active` tinyint(4) NOT NULL DEFAULT '1',
  `page_activefrom` datetime DEFAULT NULL,
  `page_activeto` datetime DEFAULT NULL,
  `page_inmenu` tinyint(4) NOT NULL DEFAULT '1',
  `page_pos` int(11) NOT NULL,
  `page_level` int(11) NOT NULL,
  `page_setleft` int(11) NOT NULL,
  `page_setright` int(11) NOT NULL,
  `page_obj_status` varchar(1) NOT NULL DEFAULT 'A',
  `page_cr_date` datetime NOT NULL DEFAULT '1970-01-01 00:00:00',
  `page_cr_uid` int(11) NOT NULL DEFAULT '0',
  `page_lu_date` datetime NOT NULL DEFAULT '1970-01-01 00:00:00',
  `page_lu_uid` int(11) NOT NULL DEFAULT '0',
  `page_language` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`page_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de la taula `zk_content_pagecategory`
--

CREATE TABLE IF NOT EXISTS `zk_content_pagecategory` (
  `con_pageid` int(11) NOT NULL,
  `con_categoryid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de la taula `zk_content_searchable`
--

CREATE TABLE IF NOT EXISTS `zk_content_searchable` (
  `search_cid` int(11) NOT NULL,
  `search_text` mediumtext,
  PRIMARY KEY (`search_cid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de la taula `zk_content_translatedcontent`
--

CREATE TABLE IF NOT EXISTS `zk_content_translatedcontent` (
  `transc_cid` int(11) NOT NULL,
  `transc_lang` varchar(10) NOT NULL,
  `transc_data` mediumtext,
  `transc_obj_status` varchar(1) NOT NULL DEFAULT 'A',
  `transc_cr_date` datetime NOT NULL DEFAULT '1970-01-01 00:00:00',
  `transc_cr_uid` int(11) NOT NULL DEFAULT '0',
  `transc_lu_date` datetime NOT NULL DEFAULT '1970-01-01 00:00:00',
  `transc_lu_uid` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de la taula `zk_content_translatedpage`
--

CREATE TABLE IF NOT EXISTS `zk_content_translatedpage` (
  `transp_pid` int(11) NOT NULL,
  `transp_lang` varchar(10) NOT NULL,
  `transp_title` varchar(255) NOT NULL,
  `transp_obj_status` varchar(1) NOT NULL DEFAULT 'A',
  `transp_cr_date` datetime NOT NULL DEFAULT '1970-01-01 00:00:00',
  `transp_cr_uid` int(11) NOT NULL DEFAULT '0',
  `transp_lu_date` datetime NOT NULL DEFAULT '1970-01-01 00:00:00',
  `transp_lu_uid` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de la taula `zk_downloads_categories`
--

CREATE TABLE IF NOT EXISTS `zk_downloads_categories` (
  `pn_cid` int(11) NOT NULL AUTO_INCREMENT,
  `pn_pid` int(11) NOT NULL DEFAULT '0',
  `pn_title` varchar(100) DEFAULT '',
  `pn_description` mediumtext,
  PRIMARY KEY (`pn_cid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Bolcant dades de la taula `zk_downloads_categories`
--

INSERT INTO `zk_downloads_categories` (`pn_cid`, `pn_pid`, `pn_title`, `pn_description`) VALUES
(1, 0, 'Alumnat', 'Espai de fitxers d''interès per a l''alumnat'),
(2, 0, 'Documents de centre', 'Documents de treball per al professorat'),
(3, 0, 'Reunions', 'Reunions del professorat');

-- --------------------------------------------------------

--
-- Estructura de la taula `zk_downloads_downloads`
--

CREATE TABLE IF NOT EXISTS `zk_downloads_downloads` (
  `pn_lid` int(11) NOT NULL AUTO_INCREMENT,
  `pn_cid` int(11) NOT NULL DEFAULT '0',
  `pn_status` smallint(6) NOT NULL DEFAULT '0',
  `pn_update` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `pn_title` varchar(100) NOT NULL DEFAULT '',
  `pn_url` varchar(254) NOT NULL DEFAULT '',
  `pn_filename` mediumtext NOT NULL,
  `pn_description` mediumtext,
  `pn_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `pn_email` varchar(100) NOT NULL DEFAULT '',
  `pn_hits` int(11) NOT NULL DEFAULT '0',
  `pn_submitter` varchar(100) NOT NULL DEFAULT '',
  `pn_filesize` double NOT NULL,
  `pn_version` varchar(20) NOT NULL DEFAULT '',
  `pn_homepage` varchar(200) NOT NULL DEFAULT '',
  `pn_modid` int(11) NOT NULL DEFAULT '0',
  `pn_objectid` varchar(5) NOT NULL DEFAULT '0',
  PRIMARY KEY (`pn_lid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de la taula `zk_downloads_modrequest`
--

CREATE TABLE IF NOT EXISTS `zk_downloads_modrequest` (
  `pn_requestid` int(11) NOT NULL AUTO_INCREMENT,
  `pn_lid` int(11) NOT NULL DEFAULT '0',
  `pn_title` varchar(100) NOT NULL DEFAULT '',
  `pn_description` mediumtext,
  `pn_modifysubmitter` varchar(60) NOT NULL DEFAULT '',
  `pn_email` varchar(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`pn_requestid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de la taula `zk_feeds`
--

CREATE TABLE IF NOT EXISTS `zk_feeds` (
  `pn_fid` int(10) NOT NULL AUTO_INCREMENT,
  `pn_name` varchar(255) NOT NULL DEFAULT '',
  `pn_urltitle` varchar(255) NOT NULL DEFAULT '',
  `pn_url` varchar(255) NOT NULL DEFAULT '',
  `pn_obj_status` varchar(1) NOT NULL DEFAULT 'A',
  `pn_cr_date` datetime NOT NULL DEFAULT '1970-01-01 00:00:00',
  `pn_cr_uid` int(11) NOT NULL DEFAULT '0',
  `pn_lu_date` datetime NOT NULL DEFAULT '1970-01-01 00:00:00',
  `pn_lu_uid` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`pn_fid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Bolcant dades de la taula `zk_feeds`
--

INSERT INTO `zk_feeds` (`pn_fid`, `pn_name`, `pn_urltitle`, `pn_url`, `pn_obj_status`, `pn_cr_date`, `pn_cr_uid`, `pn_lu_date`, `pn_lu_uid`) VALUES
(1, 'Projecte Intraweb', 'Projecte-Intraweb', 'http://phobos.xtec.cat/intraweb/web/index.php?module=News&func=view&theme=rss', 'A', '2008-11-06 12:36:01', 10, '2008-11-06 12:36:01', 10),
(2, 'XTEC', 'XTEC', 'http://www.xtec.cat/rss/rss_xtec.xml', 'A', '2008-11-06 12:36:35', 10, '2008-11-06 12:36:35', 10),
(3, 'Clic', 'Clic', 'http://clic.xtec.cat/db/rss_ca.xml', 'A', '2008-11-06 12:37:30', 10, '2008-11-06 12:37:30', 10),
(4, 'Gencat', 'Gencat', 'http://www.gencat.cat/rss/cat.xml', 'A', '2008-11-06 12:38:44', 10, '2008-11-06 12:40:13', 10);

-- --------------------------------------------------------

--
-- Estructura de la taula `zk_Files`
--

CREATE TABLE IF NOT EXISTS `zk_Files` (
  `fileId` int(11) NOT NULL AUTO_INCREMENT,
  `userId` int(11) NOT NULL DEFAULT '0',
  `diskUse` int(11) NOT NULL DEFAULT '0',
  `obj_status` varchar(1) NOT NULL DEFAULT 'A',
  `cr_date` datetime NOT NULL DEFAULT '1970-01-01 00:00:00',
  `cr_uid` int(11) NOT NULL DEFAULT '0',
  `lu_date` datetime NOT NULL DEFAULT '1970-01-01 00:00:00',
  `lu_uid` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`fileId`),
  KEY `userId` (`userId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de la taula `zk_formcontacts`
--

CREATE TABLE IF NOT EXISTS `zk_formcontacts` (
  `pn_cid` int(11) NOT NULL AUTO_INCREMENT,
  `pn_name` varchar(40) NOT NULL DEFAULT '',
  `pn_email` varchar(80) NOT NULL DEFAULT '',
  `pn_public` tinyint(4) NOT NULL DEFAULT '0',
  `pn_sname` varchar(40) NOT NULL DEFAULT '',
  `pn_semail` varchar(80) NOT NULL DEFAULT '',
  `pn_ssubject` varchar(80) NOT NULL DEFAULT '',
  PRIMARY KEY (`pn_cid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Bolcant dades de la taula `zk_formcontacts`
--

INSERT INTO `zk_formcontacts` (`pn_cid`, `pn_name`, `pn_email`, `pn_public`, `pn_sname`, `pn_semail`, `pn_ssubject`) VALUES
(1, 'Webmaster', 'mostra@exemple.cat', 1, 'Webmaster', 'mostra@exemple.cat', 'Correu electrònic de %s');

-- --------------------------------------------------------

--
-- Estructura de la taula `zk_groups`
--

CREATE TABLE IF NOT EXISTS `zk_groups` (
  `pn_gid` int(11) NOT NULL AUTO_INCREMENT,
  `pn_name` varchar(255) NOT NULL DEFAULT '',
  `pn_gtype` tinyint(4) NOT NULL DEFAULT '0',
  `pn_description` varchar(200) NOT NULL DEFAULT '',
  `pn_prefix` varchar(25) NOT NULL DEFAULT '',
  `pn_state` tinyint(4) NOT NULL DEFAULT '0',
  `pn_nbuser` int(11) NOT NULL DEFAULT '0',
  `pn_nbumax` int(11) NOT NULL DEFAULT '0',
  `pn_link` int(11) NOT NULL DEFAULT '0',
  `pn_uidmaster` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`pn_gid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Bolcant dades de la taula `zk_groups`
--

INSERT INTO `zk_groups` (`pn_gid`, `pn_name`, `pn_gtype`, `pn_description`, `pn_prefix`, `pn_state`, `pn_nbuser`, `pn_nbumax`, `pn_link`, `pn_uidmaster`) VALUES
(1, 'Usuaris', 0, 'Grup per defecte dels usuaris', 'usr', 0, 0, 0, 0, 0),
(2, 'Administradors', 0, 'Grup per defecte dels administradors', 'adm', 0, 0, 0, 0, 0),
(3, 'Alumnat', 0, 'Grup per defecte pels alumnes', '', 0, 0, 0, 0, 0),
(4, 'Professorat', 0, 'Grup per defecte pels mestres i professors', '', 0, 0, 0, 0, 0),
(5, 'Direcció', 0, 'Grup per defecte pels membres de l''equip directiu', '', 0, 0, 0, 0, 0),
(6, 'Famílies', 0, 'Grup per defecte per a les mares i els pares', '', 0, 0, 0, 0, 0),
(7, 'PAS', 0, 'Grup per defecte per al personal d''administració i serveis', '', 0, 0, 0, 0, 0),
(8, 'Editors', 0, 'Els membres d''aquest grup poden crear continguts amb imatges', '', 0, 0, 0, 0, 0),
(9, 'changingRole', 0, 'Grup inicial d''usuaris que poden canviar de grup', '', 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de la taula `zk_group_applications`
--

CREATE TABLE IF NOT EXISTS `zk_group_applications` (
  `pn_app_id` int(11) NOT NULL AUTO_INCREMENT,
  `pn_uid` int(11) NOT NULL DEFAULT '0',
  `pn_gid` int(11) NOT NULL DEFAULT '0',
  `pn_application` longblob,
  `pn_status` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`pn_app_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de la taula `zk_group_membership`
--

CREATE TABLE IF NOT EXISTS `zk_group_membership` (
  `pn_gid` int(11) NOT NULL DEFAULT '0',
  `pn_uid` int(11) NOT NULL DEFAULT '0',
  KEY `gid_uid` (`pn_uid`,`pn_gid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Bolcant dades de la taula `zk_group_membership`
--

INSERT INTO `zk_group_membership` (`pn_gid`, `pn_uid`) VALUES
(1, 1),
(2, 2),
(9, 2),
(1, 3),
(4, 3),
(1, 4),
(4, 4),
(1, 5),
(4, 5),
(1, 6),
(3, 6),
(1, 7),
(3, 7),
(1, 8),
(3, 8),
(1, 9),
(4, 9),
(5, 9),
(2, 10),
(9, 10),
(1, 11),
(8, 11);

-- --------------------------------------------------------

--
-- Estructura de la taula `zk_group_perms`
--

CREATE TABLE IF NOT EXISTS `zk_group_perms` (
  `pn_pid` int(11) NOT NULL AUTO_INCREMENT,
  `pn_gid` int(11) NOT NULL DEFAULT '0',
  `pn_sequence` int(11) NOT NULL DEFAULT '0',
  `pn_realm` int(11) NOT NULL DEFAULT '0',
  `pn_component` varchar(255) NOT NULL DEFAULT '',
  `pn_instance` varchar(255) NOT NULL DEFAULT '',
  `pn_level` int(11) NOT NULL DEFAULT '0',
  `pn_bond` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`pn_pid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=34 ;

--
-- Bolcant dades de la taula `zk_group_perms`
--

INSERT INTO `zk_group_perms` (`pn_pid`, `pn_gid`, `pn_sequence`, `pn_realm`, `pn_component`, `pn_instance`, `pn_level`, `pn_bond`) VALUES
(1, 2, 0, 0, '.*', '.*', 800, 0),
(2, 4, 11, 0, 'iw_qv::', '.*', 600, 0),
(3, 1, 26, 0, '.*', '.*', 300, 0),
(4, 4, 13, 0, 'iw_bookings::', '.*', 600, 0),
(5, 0, 30, 0, '.*', '.*', 200, 0),
(6, 4, 14, 0, 'Downloads::Add', '.*', 600, 0),
(7, 8, 2, 0, 'Content::', '.*', 700, 0),
(8, 3, 19, 0, 'Downloads::Category', '1::', 200, 0),
(10, 4, 15, 0, 'Downloads::Category', '(2|3)::', 200, 0),
(11, 1, 22, 0, 'Downloads::Category', '.*', 0, 0),
(12, 5, 17, 0, 'Downloads::Category', '.*', 200, 0),
(13, 8, 3, 0, 'Pages::', '.*', 700, 0),
(14, 8, 4, 0, 'News::', '.*', 700, 0),
(16, 8, 6, 0, 'Downloads::Add', '.*', 600, 0),
(17, 8, 7, 0, 'Downloads::Category', '.*', 200, 0),
(18, 0, 28, 0, 'Downloads::', '.*', 0, 0),
(19, 0, 29, 0, 'ExtendedMenublock::', '1:3:', 0, 0),
(20, 9, 1, 0, 'iw_myrole::', '::', 800, 0),
(21, 4, 12, 0, 'iw_jclic::', '.*', 600, 0),
(22, 3, 20, 0, 'Categories::Category', '10001::', 200, 0),
(23, 5, 18, 0, 'Categories::Category', '(10001|10002|10003)::', 200, 0),
(24, 4, 16, 0, 'Categories::Category', '(10001|10002)::', 200, 0),
(25, 8, 8, 0, 'Categories::Category', '::', 200, 0),
(26, 6, 21, 0, 'Categories::Category', '(10001|10003)::', 200, 0),
(27, 1, 23, 0, 'Categories::Category', '(10004|10005)::', 200, 0),
(28, 0, 27, 0, 'Categories::Category', '(10005|10006)::', 200, 0),
(29, -1, 24, 0, 'Categories::Category', '::', 0, 0),
(30, -1, 25, 0, 'Categories::', '::', 200, 0),
(31, 8, 9, 0, 'ExtendedMenublock::', '16::', 200, 0),
(32, -1, 10, 0, 'ExtendedMenublock::', '16::', 0, 0),
(33, 8, 5, 0, 'Files::', '::', 600, 0);

-- --------------------------------------------------------

--
-- Estructura de la taula `zk_hooks`
--

CREATE TABLE IF NOT EXISTS `zk_hooks` (
  `pn_id` int(11) NOT NULL AUTO_INCREMENT,
  `pn_object` varchar(64) NOT NULL DEFAULT '',
  `pn_action` varchar(64) NOT NULL DEFAULT '',
  `pn_smodule` varchar(64) NOT NULL DEFAULT '',
  `pn_stype` varchar(64) NOT NULL DEFAULT '',
  `pn_tarea` varchar(64) NOT NULL DEFAULT '',
  `pn_tmodule` varchar(64) NOT NULL DEFAULT '',
  `pn_ttype` varchar(64) NOT NULL DEFAULT '',
  `pn_tfunc` varchar(64) NOT NULL DEFAULT '',
  `pn_sequence` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`pn_id`),
  KEY `smodule` (`pn_smodule`),
  KEY `smodule_tmodule` (`pn_smodule`,`pn_tmodule`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=57 ;

--
-- Bolcant dades de la taula `zk_hooks`
--

INSERT INTO `zk_hooks` (`pn_id`, `pn_object`, `pn_action`, `pn_smodule`, `pn_stype`, `pn_tarea`, `pn_tmodule`, `pn_ttype`, `pn_tfunc`, `pn_sequence`) VALUES
(1, 'item', 'display', '', '', 'GUI', 'Downloads', 'hook', 'show_form', 0),
(2, 'item', 'create', '', '', 'GUI', 'Downloads', 'hook', 'attach_item', 0),
(3, 'item', 'delete', '', '', 'API', 'Downloads', 'hook', 'delete_item', 0),
(4, 'module', 'remove', '', '', 'API', 'Downloads', 'hook', 'delete_module', 0),
(5, 'item', 'display', '', '', 'GUI', 'Downloads', 'hook', 'show_form', 0),
(6, 'item', 'create', '', '', 'GUI', 'Downloads', 'hook', 'attach_item', 0),
(7, 'item', 'delete', '', '', 'API', 'Downloads', 'hook', 'delete_item', 0),
(8, 'module', 'remove', '', '', 'API', 'Downloads', 'hook', 'delete_module', 0),
(9, 'item', 'transform', '', '', 'API', 'bbcode', 'user', 'transform', 0),
(20, 'item', 'transform', 'content', '', 'API', 'bbcode', 'user', 'transform', 0),
(36, 'item', 'transform', '', '', 'API', 'bbsmile', 'user', 'transform', 0),
(37, 'item', 'transform', 'iw_messages', '', 'API', 'bbsmile', 'user', 'transform', 0),
(38, 'item', 'transform', 'iw_forums', '', 'API', 'bbsmile', 'user', 'transform', 0),
(39, 'item', 'display', '', '', 'GUI', 'Downloads', 'hook', 'show_form', 0),
(40, 'item', 'create', '', '', 'GUI', 'Downloads', 'hook', 'attach_item', 0),
(41, 'item', 'delete', '', '', 'API', 'Downloads', 'hook', 'delete_item', 0),
(42, 'module', 'remove', '', '', 'API', 'Downloads', 'hook', 'delete_module', 0),
(43, 'item', 'display', '', '', 'GUI', 'dpCaptcha', 'user', 'view', 0),
(44, 'item', 'transform', '', '', 'API', 'dpCaptcha', 'user', 'verificar', 0),
(45, 'item', 'display', 'iw_forms', '', 'GUI', 'dpCaptcha', 'user', 'view', 0),
(46, 'item', 'transform', 'iw_forms', '', 'API', 'dpCaptcha', 'user', 'verificar', 0),
(47, 'zikula', 'systeminit', '', '', 'GUI', 'scribite', 'user', 'run', 0),
(48, 'zikula', 'systeminit', 'zikula', '', 'GUI', 'scribite', 'user', 'run', 0),
(49, 'zikula', 'systeminit', '', '', 'API', 'Referers', 'user', 'collect', 0),
(50, 'zikula', 'systeminit', 'zikula', '', 'API', 'Referers', 'user', 'collect', 0),
(53, 'item', 'display', '', '', 'GUI', 'Files', 'user', 'Files', 0),
(54, 'item', 'display', '', '', 'GUI', 'Files', 'user', 'Files', 0),
(55, 'zikula', 'systeminit', '', '', 'API', 'IWstats', 'user', 'collect', 0),
(56, 'zikula', 'systeminit', 'zikula', '', 'API', 'IWstats', 'user', 'collect', 0);

-- --------------------------------------------------------

--
-- Estructura de la taula `zk_IWstats`
--

CREATE TABLE IF NOT EXISTS `zk_IWstats` (
  `iw_statsid` int(11) NOT NULL AUTO_INCREMENT,
  `iw_datetime` datetime NOT NULL DEFAULT '1970-01-01 00:00:00',
  `iw_ip` varchar(15) NOT NULL DEFAULT '',
  `iw_moduleid` int(11) NOT NULL DEFAULT '0',
  `iw_params` varchar(255) NOT NULL DEFAULT '',
  `iw_uid` int(11) NOT NULL DEFAULT '0',
  `iw_isadmin` tinyint(1) NOT NULL DEFAULT '0',
  `iw_skippedModule` tinyint(4) NOT NULL DEFAULT '0',
  `iw_skipped` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`iw_statsid`),
  KEY `iw_moduleid` (`iw_moduleid`),
  KEY `iw_uid` (`iw_uid`),
  KEY `iw_ip` (`iw_ip`),
  KEY `iw_isadmin` (`iw_isadmin`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de la taula `zk_IWstats_summary`
--

CREATE TABLE IF NOT EXISTS `zk_IWstats_summary` (
  `iw_summaryid` int(11) NOT NULL AUTO_INCREMENT,
  `iw_datetime` datetime NOT NULL DEFAULT '1970-01-01 00:00:00',
  `iw_nrecords` int(11) NOT NULL DEFAULT '0',
  `iw_registered` int(11) NOT NULL DEFAULT '0',
  `iw_modules` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `iw_skipped` int(11) NOT NULL DEFAULT '0',
  `iw_skippedModule` int(11) NOT NULL DEFAULT '0',
  `iw_isadmin` int(11) NOT NULL DEFAULT '0',
  `iw_users` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `iw_nips` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`iw_summaryid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de la taula `zk_iw_agendas`
--

CREATE TABLE IF NOT EXISTS `zk_iw_agendas` (
  `aid` int(10) NOT NULL AUTO_INCREMENT,
  `usuari` int(10) NOT NULL DEFAULT '0',
  `data` varchar(20) NOT NULL DEFAULT '',
  `completa` tinyint(1) NOT NULL DEFAULT '0',
  `c1` text NOT NULL,
  `c2` text NOT NULL,
  `c3` text NOT NULL,
  `c4` text NOT NULL,
  `c5` text NOT NULL,
  `c6` text NOT NULL,
  `totdia` tinyint(1) NOT NULL DEFAULT '0',
  `tasca` tinyint(1) NOT NULL DEFAULT '0',
  `nivell` tinyint(1) NOT NULL DEFAULT '0',
  `rid` int(10) NOT NULL DEFAULT '0',
  `daid` int(10) NOT NULL DEFAULT '0',
  `nova` text NOT NULL,
  `vcalendar` tinyint(1) NOT NULL DEFAULT '0',
  `dataanota` varchar(20) NOT NULL DEFAULT '',
  `fitxer` varchar(50) NOT NULL DEFAULT '',
  `origen` varchar(50) NOT NULL DEFAULT '',
  `protegida` tinyint(1) NOT NULL DEFAULT '0',
  `origenid` int(10) NOT NULL DEFAULT '0',
  `modified` tinyint(1) NOT NULL DEFAULT '0',
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `deletedByUser` text NOT NULL,
  `completedByUser` text NOT NULL,
  `pn_obj_status` varchar(1) NOT NULL DEFAULT 'A',
  `pn_cr_date` datetime NOT NULL DEFAULT '1970-01-01 00:00:00',
  `pn_cr_uid` int(11) NOT NULL DEFAULT '0',
  `pn_lu_date` datetime NOT NULL DEFAULT '1970-01-01 00:00:00',
  `pn_lu_uid` int(11) NOT NULL DEFAULT '0',
  `gCalendarEventId` varchar(150) NOT NULL DEFAULT '',
  `data1` varchar(20) NOT NULL DEFAULT '',
  PRIMARY KEY (`aid`),
  KEY `usuari` (`usuari`),
  KEY `data` (`data`),
  KEY `rid` (`rid`),
  KEY `daid` (`daid`),
  KEY `origenid` (`origenid`),
  KEY `gCalendarEventId` (`gCalendarEventId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de la taula `zk_iw_agendas_def`
--

CREATE TABLE IF NOT EXISTS `zk_iw_agendas_def` (
  `daid` int(10) NOT NULL AUTO_INCREMENT,
  `nom_agenda` varchar(50) NOT NULL DEFAULT '',
  `descriu` varchar(50) NOT NULL DEFAULT '',
  `c1` varchar(50) NOT NULL DEFAULT '',
  `c2` varchar(50) NOT NULL DEFAULT '',
  `c3` varchar(50) NOT NULL DEFAULT '',
  `c4` varchar(50) NOT NULL DEFAULT '',
  `c5` varchar(50) NOT NULL DEFAULT '',
  `c6` varchar(50) NOT NULL DEFAULT '',
  `tc1` tinyint(1) NOT NULL DEFAULT '0',
  `tc2` tinyint(1) NOT NULL DEFAULT '0',
  `tc3` tinyint(1) NOT NULL DEFAULT '0',
  `tc4` tinyint(1) NOT NULL DEFAULT '0',
  `tc5` tinyint(1) NOT NULL DEFAULT '0',
  `tc6` tinyint(1) NOT NULL DEFAULT '0',
  `op2` varchar(255) NOT NULL DEFAULT '',
  `op3` varchar(255) NOT NULL DEFAULT '',
  `op4` varchar(255) NOT NULL DEFAULT '',
  `op5` varchar(255) NOT NULL DEFAULT '',
  `op6` varchar(255) NOT NULL DEFAULT '',
  `grup` text NOT NULL,
  `resp` text NOT NULL,
  `activa` tinyint(1) NOT NULL DEFAULT '0',
  `adjunts` tinyint(1) NOT NULL DEFAULT '0',
  `protegida` tinyint(1) NOT NULL DEFAULT '0',
  `color` varchar(7) NOT NULL DEFAULT '#FFFFFF',
  `pn_obj_status` varchar(1) NOT NULL DEFAULT 'A',
  `pn_cr_date` datetime NOT NULL DEFAULT '1970-01-01 00:00:00',
  `pn_cr_uid` int(11) NOT NULL DEFAULT '0',
  `pn_lu_date` datetime NOT NULL DEFAULT '1970-01-01 00:00:00',
  `pn_lu_uid` int(11) NOT NULL DEFAULT '0',
  `gCalendarId` varchar(150) NOT NULL DEFAULT '',
  `gAccessLevel` text NOT NULL,
  `gColor` text NOT NULL,
  PRIMARY KEY (`daid`),
  KEY `gCalendarId` (`gCalendarId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Bolcant dades de la taula `zk_iw_agendas_def`
--

INSERT INTO `zk_iw_agendas_def` (`daid`, `nom_agenda`, `descriu`, `c1`, `c2`, `c3`, `c4`, `c5`, `c6`, `tc1`, `tc2`, `tc3`, `tc4`, `tc5`, `tc6`, `op2`, `op3`, `op4`, `op5`, `op6`, `grup`, `resp`, `activa`, `adjunts`, `protegida`, `color`, `pn_obj_status`, `pn_cr_date`, `pn_cr_uid`, `pn_lu_date`, `pn_lu_uid`, `gCalendarId`, `gAccessLevel`, `gColor`) VALUES
(1, 'Reunions', 'Agenda de reunions', 'Motiu de la reunió', 'Assistents', 'Lloc de la reunió', 'Ordre del dia', '', '', 1, 2, 5, 2, 1, 1, '', 'Biblioteca-Sala Professorat-Aula 1-Aula 2', '', '', '', '$$4|1$', '$$2$', 1, 0, 0, '#CC6666', 'A', '2008-09-10 16:42:33', 2, '2008-09-10 16:43:28', 2, '', '', ''),
(2, 'Sortides', 'Informació de les sortides que es fan al centre', 'Grup que va a la sortida', 'Lloc de la sortida', 'Tipus de sortida', '', '', '', 1, 1, 5, 1, 1, 1, '', 'De matí-De tarda-Tot el dia-Diversos dies', '', '', '', '$$4|3$', '$$2$$3$', 1, 0, 0, '#FFFF99', 'A', '2008-09-10 16:45:33', 2, '2008-09-10 16:46:50', 2, '', '', ''),
(3, 'No registrats', 'Agenda accessible pels usuaris no registrats', 'Anotació', 'Informació addicional', '', '', '', '', 2, 2, 1, 1, 1, 1, '', '', '', '', '', '$$-1|1$', '$$2$', 1, 0, 0, '#66FFCC', 'A', '2008-09-17 11:54:55', 2, '2008-09-17 11:56:05', 2, '', '', '');

-- --------------------------------------------------------

--
-- Estructura de la taula `zk_iw_agendas_subs`
--

CREATE TABLE IF NOT EXISTS `zk_iw_agendas_subs` (
  `said` int(10) NOT NULL AUTO_INCREMENT,
  `daid` int(10) NOT NULL DEFAULT '0',
  `uid` int(10) NOT NULL DEFAULT '0',
  `donadabaixa` tinyint(1) NOT NULL DEFAULT '0',
  `llistat` tinyint(1) NOT NULL DEFAULT '-1',
  `avisos` tinyint(1) NOT NULL DEFAULT '0',
  `pn_obj_status` varchar(1) NOT NULL DEFAULT 'A',
  `pn_cr_date` datetime NOT NULL DEFAULT '1970-01-01 00:00:00',
  `pn_cr_uid` int(11) NOT NULL DEFAULT '0',
  `pn_lu_date` datetime NOT NULL DEFAULT '1970-01-01 00:00:00',
  `pn_lu_uid` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`said`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de la taula `zk_iw_bookings`
--

CREATE TABLE IF NOT EXISTS `zk_iw_bookings` (
  `bid` int(10) NOT NULL AUTO_INCREMENT,
  `user` int(10) NOT NULL DEFAULT '0',
  `sid` int(10) NOT NULL DEFAULT '0',
  `start` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `end` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `usrgroup` varchar(30) NOT NULL DEFAULT '',
  `dayofweek` int(1) NOT NULL DEFAULT '0',
  `temp` tinyint(1) NOT NULL DEFAULT '0',
  `cancel` tinyint(1) NOT NULL DEFAULT '0',
  `reason` varchar(255) NOT NULL DEFAULT '',
  `bkey` int(10) NOT NULL DEFAULT '0',
  `pn_obj_status` varchar(1) NOT NULL DEFAULT 'A',
  `pn_cr_date` datetime NOT NULL DEFAULT '1970-01-01 00:00:00',
  `pn_cr_uid` int(11) NOT NULL DEFAULT '0',
  `pn_lu_date` datetime NOT NULL DEFAULT '1970-01-01 00:00:00',
  `pn_lu_uid` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`bid`),
  KEY `sid` (`sid`),
  KEY `start` (`start`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de la taula `zk_iw_bookings_spaces`
--

CREATE TABLE IF NOT EXISTS `zk_iw_bookings_spaces` (
  `sid` int(10) NOT NULL AUTO_INCREMENT,
  `space_name` varchar(100) NOT NULL DEFAULT '',
  `description` varchar(255) NOT NULL DEFAULT '',
  `mdid` int(10) NOT NULL DEFAULT '0',
  `vertical` tinyint(1) NOT NULL DEFAULT '0',
  `color` varchar(7) DEFAULT '#FFFFFF',
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `pn_obj_status` varchar(1) NOT NULL DEFAULT 'A',
  `pn_cr_date` datetime NOT NULL DEFAULT '1970-01-01 00:00:00',
  `pn_cr_uid` int(11) NOT NULL DEFAULT '0',
  `pn_lu_date` datetime NOT NULL DEFAULT '1970-01-01 00:00:00',
  `pn_lu_uid` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`sid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Bolcant dades de la taula `zk_iw_bookings_spaces`
--

INSERT INTO `zk_iw_bookings_spaces` (`sid`, `space_name`, `description`, `mdid`, `vertical`, `color`, `active`, `pn_obj_status`, `pn_cr_date`, `pn_cr_uid`, `pn_lu_date`, `pn_lu_uid`) VALUES
(1, 'Aula d''informàtica 1', 'Aula de la primera planta', 1, 1, '#CCFF66', 1, 'A', '2008-09-10 16:55:16', 2, '2008-09-10 17:13:15', 2),
(2, 'Carro multimèdia', 'Carro amb TV, vídeo i DVD', 2, 1, '#00CCCC', 1, 'A', '2008-09-10 16:56:07', 2, '2008-09-10 17:14:52', 2);

-- --------------------------------------------------------

--
-- Estructura de la taula `zk_iw_books`
--

CREATE TABLE IF NOT EXISTS `zk_iw_books` (
  `pn_tid` int(9) NOT NULL AUTO_INCREMENT,
  `pn_autor` varchar(50) DEFAULT '',
  `pn_titol` varchar(50) DEFAULT '',
  `pn_editorial` varchar(50) DEFAULT '',
  `pn_any_publi` varchar(4) DEFAULT '',
  `pn_isbn` varchar(20) DEFAULT '',
  `pn_codi_mat` varchar(3) DEFAULT '',
  `pn_lectura` tinyint(1) DEFAULT '0',
  `pn_any` varchar(4) DEFAULT '',
  `pn_etapa` varchar(32) DEFAULT '',
  `pn_nivell` char(15) DEFAULT '',
  `pn_avaluacio` char(1) DEFAULT '',
  `pn_optativa` tinyint(1) DEFAULT '0',
  `pn_observacions` varchar(100) DEFAULT '',
  `pn_materials` text,
  `pn_obj_status` varchar(1) NOT NULL DEFAULT 'A',
  `pn_cr_date` datetime NOT NULL DEFAULT '1970-01-01 00:00:00',
  `pn_cr_uid` int(11) NOT NULL DEFAULT '0',
  `pn_lu_date` datetime NOT NULL DEFAULT '1970-01-01 00:00:00',
  `pn_lu_uid` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`pn_tid`),
  KEY `tid` (`pn_tid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de la taula `zk_iw_books_materies`
--

CREATE TABLE IF NOT EXISTS `zk_iw_books_materies` (
  `pn_tid` int(9) NOT NULL AUTO_INCREMENT,
  `pn_codi_mat` varchar(3) DEFAULT '',
  `pn_materia` varchar(50) DEFAULT '',
  `pn_obj_status` varchar(1) NOT NULL DEFAULT 'A',
  `pn_cr_date` datetime NOT NULL DEFAULT '1970-01-01 00:00:00',
  `pn_cr_uid` int(11) NOT NULL DEFAULT '0',
  `pn_lu_date` datetime NOT NULL DEFAULT '1970-01-01 00:00:00',
  `pn_lu_uid` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`pn_tid`),
  UNIQUE KEY `pn_codi_mat` (`pn_codi_mat`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Bolcant dades de la taula `zk_iw_books_materies`
--

INSERT INTO `zk_iw_books_materies` (`pn_tid`, `pn_codi_mat`, `pn_materia`, `pn_obj_status`, `pn_cr_date`, `pn_cr_uid`, `pn_lu_date`, `pn_lu_uid`) VALUES
(1, 'TOT', ' Totes', 'A', '1970-01-01 00:00:00', 0, '1970-01-01 00:00:00', 0);

-- --------------------------------------------------------

--
-- Estructura de la taula `zk_iw_forms`
--

CREATE TABLE IF NOT EXISTS `zk_iw_forms` (
  `iw_fmid` int(10) NOT NULL AUTO_INCREMENT,
  `iw_user` varchar(20) NOT NULL DEFAULT '',
  `iw_observations` text NOT NULL,
  `iw_renote` text NOT NULL,
  `iw_state` tinyint(1) NOT NULL DEFAULT '0',
  `iw_time` varchar(20) NOT NULL DEFAULT '',
  `iw_validate` tinyint(1) NOT NULL DEFAULT '0',
  `iw_fid` int(10) NOT NULL DEFAULT '0',
  `iw_annonimous` tinyint(1) NOT NULL DEFAULT '0',
  `iw_mark` text NOT NULL,
  `iw_deluser` tinyint(1) NOT NULL DEFAULT '0',
  `iw_viewed` text NOT NULL,
  `iw_closed` tinyint(1) NOT NULL DEFAULT '0',
  `iw_publicResponse` tinyint(1) NOT NULL DEFAULT '0',
  `pn_obj_status` varchar(1) NOT NULL DEFAULT 'A',
  `pn_cr_date` datetime NOT NULL DEFAULT '1970-01-01 00:00:00',
  `pn_cr_uid` int(11) NOT NULL DEFAULT '0',
  `pn_lu_date` datetime NOT NULL DEFAULT '1970-01-01 00:00:00',
  `pn_lu_uid` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`iw_fmid`),
  KEY `iw_fid` (`iw_fid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de la taula `zk_iw_forms_cat`
--

CREATE TABLE IF NOT EXISTS `zk_iw_forms_cat` (
  `iw_cid` int(10) NOT NULL AUTO_INCREMENT,
  `catName` varchar(70) NOT NULL DEFAULT '',
  `iw_description` varchar(255) NOT NULL DEFAULT '',
  `pn_obj_status` varchar(1) NOT NULL DEFAULT 'A',
  `pn_cr_date` datetime NOT NULL DEFAULT '1970-01-01 00:00:00',
  `pn_cr_uid` int(11) NOT NULL DEFAULT '0',
  `pn_lu_date` datetime NOT NULL DEFAULT '1970-01-01 00:00:00',
  `pn_lu_uid` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`iw_cid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de la taula `zk_iw_forms_def`
--

CREATE TABLE IF NOT EXISTS `zk_iw_forms_def` (
  `iw_fid` int(10) NOT NULL AUTO_INCREMENT,
  `iw_formName` varchar(70) NOT NULL DEFAULT '',
  `iw_description` varchar(255) NOT NULL DEFAULT '',
  `iw_active` tinyint(1) NOT NULL DEFAULT '0',
  `iw_title` varchar(255) NOT NULL DEFAULT '',
  `iw_new` datetime NOT NULL,
  `iw_cid` int(10) NOT NULL DEFAULT '0',
  `iw_caducity` datetime NOT NULL,
  `iw_annonimous` tinyint(1) NOT NULL DEFAULT '0',
  `iw_unique` tinyint(1) NOT NULL DEFAULT '0',
  `iw_answare` text NOT NULL,
  `iw_characters` int(3) NOT NULL DEFAULT '0',
  `iw_closeableNotes` tinyint(1) NOT NULL DEFAULT '0',
  `iw_closeInsert` tinyint(1) NOT NULL DEFAULT '0',
  `iw_closeableInsert` tinyint(1) NOT NULL DEFAULT '0',
  `iw_unregisterednotusersview` tinyint(1) NOT NULL DEFAULT '1',
  `iw_unregisterednotexport` tinyint(1) NOT NULL DEFAULT '1',
  `iw_publicResponse` tinyint(1) NOT NULL DEFAULT '0',
  `pn_obj_status` varchar(1) NOT NULL DEFAULT 'A',
  `pn_cr_date` datetime NOT NULL DEFAULT '1970-01-01 00:00:00',
  `pn_cr_uid` int(11) NOT NULL DEFAULT '0',
  `pn_lu_date` datetime NOT NULL DEFAULT '1970-01-01 00:00:00',
  `pn_lu_uid` int(11) NOT NULL DEFAULT '0',
  `iw_skin` text NOT NULL,
  `iw_skincss` varchar(150) NOT NULL DEFAULT '',
  `iw_showFormName` tinyint(1) NOT NULL DEFAULT '1',
  `iw_showNotesTitle` tinyint(1) NOT NULL DEFAULT '1',
  `iw_skinForm` text NOT NULL,
  `iw_skinNote` text NOT NULL,
  `iw_expertMode` tinyint(1) NOT NULL DEFAULT '0',
  `iw_skinByTemplate` tinyint(1) NOT NULL DEFAULT '0',
  `iw_skinFormTemplate` varchar(70) NOT NULL DEFAULT 'iw_forms_user_new.htm',
  `iw_skinTemplate` varchar(70) NOT NULL DEFAULT 'iw_forms_user_read.htm',
  `iw_skinNoteTemplate` varchar(70) NOT NULL DEFAULT 'iw_forms_user_read.htm',
  `iw_allowComments` tinyint(1) NOT NULL DEFAULT '0',
  `iw_allowCommentsModerated` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`iw_fid`),
  KEY `iw_active` (`iw_active`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Bolcant dades de la taula `zk_iw_forms_def`
--

INSERT INTO `zk_iw_forms_def` (`iw_fid`, `iw_formName`, `iw_description`, `iw_active`, `iw_title`, `iw_new`, `iw_cid`, `iw_caducity`, `iw_annonimous`, `iw_unique`, `iw_answare`, `iw_characters`, `iw_closeableNotes`, `iw_closeInsert`, `iw_closeableInsert`, `iw_unregisterednotusersview`, `iw_unregisterednotexport`, `iw_publicResponse`, `pn_obj_status`, `pn_cr_date`, `pn_cr_uid`, `pn_lu_date`, `pn_lu_uid`, `iw_skin`, `iw_skincss`, `iw_showFormName`, `iw_showNotesTitle`, `iw_skinForm`, `iw_skinNote`, `iw_expertMode`, `iw_skinByTemplate`, `iw_skinFormTemplate`, `iw_skinTemplate`, `iw_skinNoteTemplate`, `iw_allowComments`, `iw_allowCommentsModerated`) VALUES
(1, 'Guàrdies i substitucions', 'Espai des d''on enviar la feina per a les substitucions', 1, 'Feina per a l''alumnat', '2008-11-21 23:59:00', 0, '0000-00-00 00:00:00', 0, 0, '', 0, 0, 0, 0, 1, 1, 0, 'A', '2008-09-22 17:05:49', 2, '2009-02-24 09:37:06', 2, '', '', 1, 1, '', '', 0, 0, 'iw_forms_user_new.htm', 'iw_forms_user_read.htm', 'iw_forms_user_read.htm', 0, 0),
(2, 'Avaries informàtiques', 'Notificació al coordinador d''informàtica de problemes amb el maquinari o programari informàtic del centre', 1, 'Avaries de l''equipament informàtic', '2008-12-09 23:59:00', 0, '0000-00-00 00:00:00', 0, 0, '', 0, 0, 0, 0, 1, 1, 0, 'A', '2008-09-22 17:19:45', 2, '2008-09-22 17:19:45', 2, '', '', 1, 1, '', '', 0, 0, 'iw_forms_user_new.htm', 'iw_forms_user_read.htm', 'iw_forms_user_read.htm', 0, 0);

-- --------------------------------------------------------

--
-- Estructura de la taula `zk_iw_forms_group`
--

CREATE TABLE IF NOT EXISTS `zk_iw_forms_group` (
  `iw_gfid` int(10) NOT NULL AUTO_INCREMENT,
  `iw_fid` int(10) NOT NULL DEFAULT '0',
  `iw_group` int(10) NOT NULL DEFAULT '0',
  `iw_accessType` tinyint(1) NOT NULL DEFAULT '0',
  `iw_validationNeeded` tinyint(1) NOT NULL DEFAULT '0',
  `pn_obj_status` varchar(1) NOT NULL DEFAULT 'A',
  `pn_cr_date` datetime NOT NULL DEFAULT '1970-01-01 00:00:00',
  `pn_cr_uid` int(11) NOT NULL DEFAULT '0',
  `pn_lu_date` datetime NOT NULL DEFAULT '1970-01-01 00:00:00',
  `pn_lu_uid` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`iw_gfid`),
  KEY `iw_fid` (`iw_fid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Bolcant dades de la taula `zk_iw_forms_group`
--

INSERT INTO `zk_iw_forms_group` (`iw_gfid`, `iw_fid`, `iw_group`, `iw_accessType`, `iw_validationNeeded`, `pn_obj_status`, `pn_cr_date`, `pn_cr_uid`, `pn_lu_date`, `pn_lu_uid`) VALUES
(1, 1, 4, 3, 0, 'A', '2008-09-22 17:12:47', 2, '2008-09-22 17:12:47', 2),
(2, 2, 2, 3, 0, 'A', '2008-09-22 17:24:37', 2, '2008-09-22 17:24:37', 2),
(3, 2, 4, 3, 0, 'A', '2008-09-22 17:25:06', 2, '2008-09-22 17:25:06', 2);

-- --------------------------------------------------------

--
-- Estructura de la taula `zk_iw_forms_note`
--

CREATE TABLE IF NOT EXISTS `zk_iw_forms_note` (
  `iw_fnid` int(10) NOT NULL AUTO_INCREMENT,
  `iw_fmid` int(10) NOT NULL DEFAULT '0',
  `iw_fndid` int(10) NOT NULL DEFAULT '0',
  `iw_content` text NOT NULL,
  `iw_validate` tinyint(1) NOT NULL DEFAULT '0',
  `pn_obj_status` varchar(1) NOT NULL DEFAULT 'A',
  `pn_cr_date` datetime NOT NULL DEFAULT '1970-01-01 00:00:00',
  `pn_cr_uid` int(11) NOT NULL DEFAULT '0',
  `pn_lu_date` datetime NOT NULL DEFAULT '1970-01-01 00:00:00',
  `pn_lu_uid` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`iw_fnid`),
  KEY `iw_fmid` (`iw_fmid`),
  KEY `iw_fndid` (`iw_fndid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de la taula `zk_iw_forms_note_def`
--

CREATE TABLE IF NOT EXISTS `zk_iw_forms_note_def` (
  `iw_fndid` int(10) NOT NULL AUTO_INCREMENT,
  `iw_fid` int(10) NOT NULL DEFAULT '0',
  `iw_fieldType` tinyint(1) NOT NULL DEFAULT '0',
  `iw_required` tinyint(1) NOT NULL DEFAULT '0',
  `iw_description` varchar(255) NOT NULL DEFAULT '',
  `iw_fieldName` text NOT NULL,
  `iw_feedback` tinyint(1) NOT NULL DEFAULT '0',
  `iw_order` int(10) NOT NULL DEFAULT '1000',
  `iw_active` tinyint(1) NOT NULL DEFAULT '0',
  `iw_dependance` varchar(50) NOT NULL DEFAULT '$',
  `iw_rfid` varchar(50) NOT NULL DEFAULT '$',
  `iw_validationNeeded` tinyint(1) NOT NULL DEFAULT '0',
  `iw_notify` tinyint(1) NOT NULL DEFAULT '0',
  `iw_size` varchar(3) NOT NULL DEFAULT '25',
  `iw_cols` varchar(3) NOT NULL DEFAULT '30',
  `iw_rows` varchar(3) NOT NULL DEFAULT '5',
  `iw_editor` tinyint(1) NOT NULL DEFAULT '0',
  `iw_checked` tinyint(1) NOT NULL DEFAULT '0',
  `iw_options` text NOT NULL,
  `iw_calendar` tinyint(1) NOT NULL DEFAULT '0',
  `iw_height` varchar(2) NOT NULL DEFAULT '1',
  `iw_color` varchar(7) NOT NULL DEFAULT '#DDDDDD',
  `iw_colorf` varchar(7) NOT NULL DEFAULT '#FFFFFF',
  `iw_accessType` tinyint(1) NOT NULL DEFAULT '0',
  `iw_editable` tinyint(1) NOT NULL DEFAULT '0',
  `iw_collapse` tinyint(1) NOT NULL DEFAULT '0',
  `iw_publicFile` tinyint(1) NOT NULL DEFAULT '0',
  `iw_help` text NOT NULL,
  `pn_obj_status` varchar(1) NOT NULL DEFAULT 'A',
  `pn_cr_date` datetime NOT NULL DEFAULT '1970-01-01 00:00:00',
  `pn_cr_uid` int(11) NOT NULL DEFAULT '0',
  `pn_lu_date` datetime NOT NULL DEFAULT '1970-01-01 00:00:00',
  `pn_lu_uid` int(11) NOT NULL DEFAULT '0',
  `iw_gid` int(10) NOT NULL DEFAULT '0',
  `iw_searchable` tinyint(1) NOT NULL DEFAULT '0',
  `iw_extensions` varchar(30) NOT NULL DEFAULT '',
  `iw_imgWidth` smallint(4) NOT NULL DEFAULT '0',
  `iw_imgHeight` smallint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`iw_fndid`),
  KEY `iw_fid` (`iw_fid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Bolcant dades de la taula `zk_iw_forms_note_def`
--

INSERT INTO `zk_iw_forms_note_def` (`iw_fndid`, `iw_fid`, `iw_fieldType`, `iw_required`, `iw_description`, `iw_fieldName`, `iw_feedback`, `iw_order`, `iw_active`, `iw_dependance`, `iw_rfid`, `iw_validationNeeded`, `iw_notify`, `iw_size`, `iw_cols`, `iw_rows`, `iw_editor`, `iw_checked`, `iw_options`, `iw_calendar`, `iw_height`, `iw_color`, `iw_colorf`, `iw_accessType`, `iw_editable`, `iw_collapse`, `iw_publicFile`, `iw_help`, `pn_obj_status`, `pn_cr_date`, `pn_cr_uid`, `pn_lu_date`, `pn_lu_uid`, `iw_gid`, `iw_searchable`, `iw_extensions`, `iw_imgWidth`, `iw_imgHeight`) VALUES
(1, 1, 4, 1, 'Data en què s''haurà de cobrir la guàrdia', 'Data', 0, 10, 1, '$', '$', 0, 0, '', '', '', 0, 0, '', 1, '', '', '', 0, 0, 0, 0, '', 'A', '2008-09-22 17:07:24', 2, '2008-09-22 17:12:01', 2, 0, 0, '', 0, 0),
(3, 1, 6, 1, 'Hora en què s''haurà de cobrir la guàrdia', 'Hora', 0, 20, 1, '$', '$', 0, 0, '', '', '', 0, 0, '8.30 a 9.30-9.30 a 10.30-11 a 12-12 a 13-13 a 14-15,15 a 16.15-16.15 a 17.15', 0, '', '', '', 0, 0, 0, 0, '', 'A', '2008-09-22 17:09:19', 2, '2008-09-22 17:12:01', 2, 0, 0, '', 0, 0),
(4, 1, 1, 1, 'Grup-classe', 'Grup', 0, 30, 1, '$', '$', 0, 0, '25', '', '', 0, 0, '', 0, '', '', '', 0, 0, 0, 0, '', 'A', '2008-09-22 17:10:15', 2, '2008-09-22 17:12:01', 2, 0, 0, '', 0, 0),
(5, 1, 7, 0, 'Adjunta un fitxer amb la feina', 'Feina', 0, 40, 1, '$', '$', 0, 0, '', '', '', 0, 0, '', 0, '', '', '', 0, 0, 0, 0, '', 'A', '2008-09-22 17:11:06', 2, '2008-09-22 17:16:33', 2, 0, 0, '', 0, 0),
(6, 1, 2, 0, 'Observacions', 'Observacions', 0, 50, 1, '$', '$', 0, 0, '', '30', '5', 0, 0, '', 0, '', '', '', 0, 0, 0, 0, '', 'A', '2008-09-22 17:12:01', 2, '2008-09-22 17:12:19', 2, 0, 0, '', 0, 0),
(7, 2, 1, 1, 'Lloc on s''ha trobat l''avaria informàtica', 'Lloc on s''ha trobat l''avaria informàtica', 0, 20, 1, '$', '$', 0, 0, '25', '', '', 0, 0, '', 0, '', '', '', 0, 0, 1, 0, '', 'A', '2008-09-22 17:20:30', 2, '2009-02-24 09:38:48', 2, 0, 0, '', 0, 0),
(8, 2, 2, 1, 'Explicació del problema detectat', 'Explicació del problema detectat', 0, 30, 1, '$', '$', 0, 0, '', '50', '5', 0, 0, '', 0, '', '', '', 0, 0, 1, 0, '', 'A', '2008-09-22 17:21:41', 2, '2009-02-24 09:38:48', 2, 0, 0, '', 0, 0),
(9, 2, 4, 1, 'Data en què s''ha detectat l''avaria', 'Data', 0, 40, 1, '$', '$', 0, 0, '', '', '', 0, 0, '', 1, '', '', '', 0, 0, 1, 0, '', 'A', '2008-09-22 17:23:03', 2, '2009-02-24 09:38:48', 2, 0, 0, '', 0, 0),
(10, 2, 5, 1, 'Hora en què s''ha detectat l''avaria', 'Hora', 0, 50, 1, '$', '$', 0, 0, '', '', '', 0, 0, '', 0, '', '', '', 0, 0, 1, 0, '', 'A', '2008-09-22 17:23:58', 2, '2009-02-24 09:38:48', 2, 0, 0, '', 0, 0),
(11, 2, 53, 0, '', 'Prova', 0, 10, 1, '$', '$', 0, 0, '', '', '', 0, 0, '', 0, '', '', '#CC99FF', 0, 0, 1, 0, '', 'A', '2008-09-26 15:50:16', 2, '2009-02-24 09:38:48', 2, 0, 0, '', 0, 0),
(12, 2, 100, 0, '', 'Prova', 0, 60, 1, '$$11$', '$', 0, 0, '', '', '', 0, 0, '', 0, '', '', '#CC99FF', 0, 0, 1, 0, '', 'A', '2008-09-26 15:50:16', 2, '2009-02-24 09:38:48', 2, 0, 0, '', 0, 0);

-- --------------------------------------------------------

--
-- Estructura de la taula `zk_iw_forms_validator`
--

CREATE TABLE IF NOT EXISTS `zk_iw_forms_validator` (
  `iw_rfid` int(10) NOT NULL AUTO_INCREMENT,
  `iw_fid` int(10) NOT NULL DEFAULT '0',
  `iw_validator` int(10) NOT NULL DEFAULT '0',
  `iw_validatorType` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`iw_rfid`),
  KEY `iw_fid` (`iw_fid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de la taula `zk_iw_forums_def`
--

CREATE TABLE IF NOT EXISTS `zk_iw_forums_def` (
  `iw_fid` int(10) NOT NULL AUTO_INCREMENT,
  `iw_nom_forum` varchar(50) NOT NULL DEFAULT '',
  `iw_descriu` varchar(255) NOT NULL DEFAULT '',
  `iw_actiu` tinyint(1) NOT NULL DEFAULT '0',
  `iw_adjunts` tinyint(1) NOT NULL DEFAULT '0',
  `iw_grup` varchar(255) NOT NULL DEFAULT '',
  `iw_mod` varchar(255) NOT NULL DEFAULT '',
  `iw_observacions` varchar(255) NOT NULL DEFAULT '',
  `iw_msgDelTime` varchar(3) NOT NULL DEFAULT '0',
  `iw_msgEditTime` varchar(3) NOT NULL DEFAULT '0',
  `pn_obj_status` varchar(1) NOT NULL DEFAULT 'A',
  `pn_cr_date` datetime NOT NULL DEFAULT '1970-01-01 00:00:00',
  `pn_cr_uid` int(11) NOT NULL DEFAULT '0',
  `pn_lu_date` datetime NOT NULL DEFAULT '1970-01-01 00:00:00',
  `pn_lu_uid` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`iw_fid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Bolcant dades de la taula `zk_iw_forums_def`
--

INSERT INTO `zk_iw_forums_def` (`iw_fid`, `iw_nom_forum`, `iw_descriu`, `iw_actiu`, `iw_adjunts`, `iw_grup`, `iw_mod`, `iw_observacions`, `iw_msgDelTime`, `iw_msgEditTime`, `pn_obj_status`, `pn_cr_date`, `pn_cr_uid`, `pn_lu_date`, `pn_lu_uid`) VALUES
(1, 'Centre', 'Fòrum general de tot el centre', 1, 0, '$$4|2$$3|1$', '$$9$', '', '10', '20', 'A', '2008-09-09 16:48:58', 2, '2008-09-09 16:58:36', 2),
(2, 'Funcionament de la maqueta', 'Espai on preguntar/respondre dubtes relacionats amb el funcionament dels mòduls de la intranet', 1, 0, '$$4|2$', '$$2$', '', '10', '20', 'A', '2008-09-09 16:49:42', 2, '2008-09-09 16:57:12', 2),
(3, 'Professorat', 'Fòrum exclusiu del professorat', 1, 1, '$$4|3$', '$$3$', '', '10', '20', 'A', '2008-09-09 16:50:51', 2, '2008-09-09 16:58:05', 2);

-- --------------------------------------------------------

--
-- Estructura de la taula `zk_iw_forums_msg`
--

CREATE TABLE IF NOT EXISTS `zk_iw_forums_msg` (
  `iw_fmid` int(10) NOT NULL AUTO_INCREMENT,
  `iw_fid` int(10) NOT NULL DEFAULT '0',
  `iw_ftid` int(10) NOT NULL DEFAULT '0',
  `iw_titol` varchar(100) NOT NULL DEFAULT '',
  `iw_usuari` int(10) NOT NULL DEFAULT '0',
  `iw_data` varchar(20) NOT NULL DEFAULT '',
  `iw_missatge` text NOT NULL,
  `iw_adjunt` varchar(255) NOT NULL DEFAULT '',
  `iw_icon` varchar(100) NOT NULL DEFAULT '',
  `iw_llegit` text NOT NULL,
  `iw_marcat` text NOT NULL,
  `iw_idparent` int(10) NOT NULL DEFAULT '0',
  `iw_lastdate` varchar(20) NOT NULL DEFAULT '',
  `pn_obj_status` varchar(1) NOT NULL DEFAULT 'A',
  `pn_cr_date` datetime NOT NULL DEFAULT '1970-01-01 00:00:00',
  `pn_cr_uid` int(11) NOT NULL DEFAULT '0',
  `pn_lu_date` datetime NOT NULL DEFAULT '1970-01-01 00:00:00',
  `pn_lu_uid` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`iw_fmid`),
  KEY `iw_idparent` (`iw_idparent`),
  KEY `iw_ftid` (`iw_ftid`),
  KEY `iw_fid` (`iw_fid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de la taula `zk_iw_forums_temes`
--

CREATE TABLE IF NOT EXISTS `zk_iw_forums_temes` (
  `iw_ftid` int(10) NOT NULL AUTO_INCREMENT,
  `iw_fid` int(10) NOT NULL DEFAULT '0',
  `iw_titol` varchar(100) NOT NULL DEFAULT '',
  `iw_descriu` text NOT NULL,
  `iw_usuari` int(10) NOT NULL DEFAULT '0',
  `iw_data` varchar(20) NOT NULL DEFAULT '',
  `iw_order` int(10) NOT NULL DEFAULT '0',
  `pn_obj_status` varchar(1) NOT NULL DEFAULT 'A',
  `pn_cr_date` datetime NOT NULL DEFAULT '1970-01-01 00:00:00',
  `pn_cr_uid` int(11) NOT NULL DEFAULT '0',
  `pn_lu_date` datetime NOT NULL DEFAULT '1970-01-01 00:00:00',
  `pn_lu_uid` int(11) NOT NULL DEFAULT '0',
  `iw_last_user` int(10) NOT NULL DEFAULT '0',
  `iw_last_time` varchar(20) NOT NULL DEFAULT '',
  PRIMARY KEY (`iw_ftid`),
  KEY `iw_fid` (`iw_fid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de la taula `zk_iw_jclic`
--

CREATE TABLE IF NOT EXISTS `zk_iw_jclic` (
  `iw_jid` int(10) NOT NULL AUTO_INCREMENT,
  `iw_user` int(10) NOT NULL DEFAULT '0',
  `iw_name` varchar(255) NOT NULL DEFAULT '',
  `iw_description` mediumtext NOT NULL,
  `iw_url` varchar(255) NOT NULL DEFAULT '',
  `iw_file` varchar(30) NOT NULL DEFAULT '',
  `iw_skin` varchar(20) NOT NULL DEFAULT '',
  `iw_maxattempts` int(3) NOT NULL DEFAULT '0',
  `iw_width` int(5) NOT NULL DEFAULT '600',
  `iw_height` int(5) NOT NULL DEFAULT '400',
  `iw_scoreToOptain` varchar(5) DEFAULT NULL,
  `iw_solvedToOptain` varchar(5) DEFAULT NULL,
  `iw_active` tinyint(1) NOT NULL DEFAULT '0',
  `iw_date` varchar(20) NOT NULL DEFAULT '',
  `iw_observations` mediumtext NOT NULL,
  `iw_limitDate` varchar(20) NOT NULL DEFAULT '',
  `iw_initDate` varchar(20) NOT NULL DEFAULT '',
  `iw_extended` mediumtext NOT NULL,
  `pn_obj_status` varchar(1) NOT NULL DEFAULT 'A',
  `pn_cr_date` datetime NOT NULL DEFAULT '1970-01-01 00:00:00',
  `pn_cr_uid` int(11) NOT NULL DEFAULT '0',
  `pn_lu_date` datetime NOT NULL DEFAULT '1970-01-01 00:00:00',
  `pn_lu_uid` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`iw_jid`),
  KEY `iw_user` (`iw_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de la taula `zk_iw_jclic_activities`
--

CREATE TABLE IF NOT EXISTS `zk_iw_jclic_activities` (
  `iw_jaid` int(10) NOT NULL AUTO_INCREMENT,
  `iw_session_id` varchar(50) NOT NULL DEFAULT '',
  `iw_activity_id` int(5) NOT NULL DEFAULT '0',
  `iw_activity_name` varchar(50) NOT NULL DEFAULT '',
  `iw_num_actions` int(4) DEFAULT NULL,
  `iw_score` int(4) DEFAULT NULL,
  `iw_activity_solved` tinyint(1) DEFAULT NULL,
  `iw_qualification` int(3) DEFAULT NULL,
  `iw_total_time` int(5) DEFAULT NULL,
  `iw_activity_code` varchar(50) DEFAULT NULL,
  `pn_obj_status` varchar(1) NOT NULL DEFAULT 'A',
  `pn_cr_date` datetime NOT NULL DEFAULT '1970-01-01 00:00:00',
  `pn_cr_uid` int(11) NOT NULL DEFAULT '0',
  `pn_lu_date` datetime NOT NULL DEFAULT '1970-01-01 00:00:00',
  `pn_lu_uid` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`iw_jaid`),
  KEY `iw_session_id` (`iw_session_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de la taula `zk_iw_jclic_groups`
--

CREATE TABLE IF NOT EXISTS `zk_iw_jclic_groups` (
  `iw_jgid` int(10) NOT NULL AUTO_INCREMENT,
  `iw_jid` int(10) NOT NULL DEFAULT '0',
  `iw_group_id` int(10) NOT NULL DEFAULT '0',
  `iw_group_name` varchar(80) NOT NULL DEFAULT '',
  `iw_group_description` varchar(255) NOT NULL DEFAULT '',
  `iw_group_icon` varchar(255) NOT NULL DEFAULT '',
  `iw_group_code` varchar(50) NOT NULL DEFAULT '',
  `iw_group_keywords` varchar(255) NOT NULL DEFAULT '',
  `pn_obj_status` varchar(1) NOT NULL DEFAULT 'A',
  `pn_cr_date` datetime NOT NULL DEFAULT '1970-01-01 00:00:00',
  `pn_cr_uid` int(11) NOT NULL DEFAULT '0',
  `pn_lu_date` datetime NOT NULL DEFAULT '1970-01-01 00:00:00',
  `pn_lu_uid` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`iw_jgid`),
  KEY `iw_jid` (`iw_jid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de la taula `zk_iw_jclic_sessions`
--

CREATE TABLE IF NOT EXISTS `zk_iw_jclic_sessions` (
  `iw_jsid` int(10) NOT NULL AUTO_INCREMENT,
  `iw_jclicid` int(10) NOT NULL DEFAULT '0',
  `iw_session_id` varchar(50) NOT NULL DEFAULT '',
  `iw_user_id` int(10) NOT NULL,
  `iw_session_datetime` datetime NOT NULL,
  `iw_project_name` varchar(100) NOT NULL DEFAULT '',
  `iw_session_key` varchar(50) DEFAULT NULL,
  `iw_session_code` varchar(50) DEFAULT NULL,
  `iw_session_context` varchar(50) DEFAULT NULL,
  `pn_obj_status` varchar(1) NOT NULL DEFAULT 'A',
  `pn_cr_date` datetime NOT NULL DEFAULT '1970-01-01 00:00:00',
  `pn_cr_uid` int(11) NOT NULL DEFAULT '0',
  `pn_lu_date` datetime NOT NULL DEFAULT '1970-01-01 00:00:00',
  `pn_lu_uid` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`iw_jsid`),
  KEY `iw_jclicid` (`iw_jclicid`),
  KEY `iw_session_id` (`iw_session_id`),
  KEY `iw_user_id` (`iw_user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de la taula `zk_iw_jclic_settings`
--

CREATE TABLE IF NOT EXISTS `zk_iw_jclic_settings` (
  `iw_jsid` int(10) NOT NULL AUTO_INCREMENT,
  `iw_setting_key` varchar(255) NOT NULL DEFAULT '',
  `iw_setting_value` varchar(255) NOT NULL DEFAULT '',
  `pn_obj_status` varchar(1) NOT NULL DEFAULT 'A',
  `pn_cr_date` datetime NOT NULL DEFAULT '1970-01-01 00:00:00',
  `pn_cr_uid` int(11) NOT NULL DEFAULT '0',
  `pn_lu_date` datetime NOT NULL DEFAULT '1970-01-01 00:00:00',
  `pn_lu_uid` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`iw_jsid`),
  KEY `iw_setting_key` (`iw_setting_key`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Bolcant dades de la taula `zk_iw_jclic_settings`
--

INSERT INTO `zk_iw_jclic_settings` (`iw_jsid`, `iw_setting_key`, `iw_setting_value`, `pn_obj_status`, `pn_cr_date`, `pn_cr_uid`, `pn_lu_date`, `pn_lu_uid`) VALUES
(1, 'ALLOW_CREATE_GROUPS', 'false', 'A', '2009-01-07 09:30:34', 2, '2009-01-07 09:30:34', 2),
(2, 'ALLOW_CREATE_USERS', 'false', 'A', '2009-01-07 09:30:34', 2, '2009-01-07 09:30:34', 2),
(3, 'SHOW_GROUP_LIST', 'false', 'A', '2009-01-07 09:30:34', 2, '2009-01-07 09:30:34', 2),
(4, 'SHOW_USER_LIST', 'false', 'A', '2009-01-07 09:30:34', 2, '2009-01-07 09:30:34', 2),
(5, 'USER_TABLES', 'true', 'A', '2009-01-07 09:30:35', 2, '2009-01-07 09:30:35', 2),
(6, 'TIME_LAP', '10', 'A', '2009-01-07 09:30:35', 2, '2009-01-07 09:30:35', 2);

-- --------------------------------------------------------

--
-- Estructura de la taula `zk_iw_jclic_users`
--

CREATE TABLE IF NOT EXISTS `zk_iw_jclic_users` (
  `iw_juid` int(10) NOT NULL AUTO_INCREMENT,
  `iw_jid` int(10) NOT NULL DEFAULT '0',
  `iw_user_id` int(10) NOT NULL DEFAULT '0',
  `iw_group_id` int(10) NOT NULL DEFAULT '0',
  `iw_user_name` varchar(80) NOT NULL DEFAULT '',
  `iw_user_pwd` varchar(255) NOT NULL DEFAULT '',
  `iw_user_icon` varchar(255) NOT NULL DEFAULT '',
  `iw_user_code` varchar(50) NOT NULL DEFAULT '',
  `iw_user_keywords` varchar(255) NOT NULL DEFAULT '',
  `iw_observations` mediumtext NOT NULL,
  `iw_renotes` mediumtext NOT NULL,
  `pn_obj_status` varchar(1) NOT NULL DEFAULT 'A',
  `pn_cr_date` datetime NOT NULL DEFAULT '1970-01-01 00:00:00',
  `pn_cr_uid` int(11) NOT NULL DEFAULT '0',
  `pn_lu_date` datetime NOT NULL DEFAULT '1970-01-01 00:00:00',
  `pn_lu_uid` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`iw_juid`),
  KEY `iw_jid` (`iw_jid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de la taula `zk_iw_main`
--

CREATE TABLE IF NOT EXISTS `zk_iw_main` (
  `iw_id` int(11) NOT NULL AUTO_INCREMENT,
  `iw_module` varchar(50) NOT NULL DEFAULT '',
  `iw_name` varchar(50) NOT NULL DEFAULT '',
  `iw_value` text NOT NULL,
  `iw_uid` int(11) NOT NULL DEFAULT '0',
  `iw_lifetime` varchar(20) NOT NULL DEFAULT '0',
  `iw_nult` tinyint(1) NOT NULL DEFAULT '0',
  `pn_obj_status` varchar(1) NOT NULL DEFAULT 'A',
  `pn_cr_date` datetime NOT NULL DEFAULT '1970-01-01 00:00:00',
  `pn_cr_uid` int(11) NOT NULL DEFAULT '0',
  `pn_lu_date` datetime NOT NULL DEFAULT '1970-01-01 00:00:00',
  `pn_lu_uid` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`iw_id`),
  KEY `iw_module` (`iw_module`),
  KEY `iw_name` (`iw_name`),
  KEY `iw_uid` (`iw_uid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de la taula `zk_iw_messages`
--

CREATE TABLE IF NOT EXISTS `zk_iw_messages` (
  `iw_msg_id` int(10) NOT NULL AUTO_INCREMENT,
  `iw_msg_image` varchar(100) NOT NULL DEFAULT '',
  `iw_subject` varchar(100) NOT NULL DEFAULT '',
  `iw_from_userid` int(10) NOT NULL DEFAULT '0',
  `iw_to_userid` int(10) NOT NULL DEFAULT '0',
  `iw_msg_time` varchar(20) NOT NULL DEFAULT '',
  `iw_msg_readtime` varchar(20) NOT NULL DEFAULT '',
  `iw_msg_text` text NOT NULL,
  `iw_read_msg` int(4) NOT NULL DEFAULT '0',
  `iw_del_msg_to` tinyint(4) NOT NULL DEFAULT '0',
  `iw_del_msg_from` tinyint(4) NOT NULL DEFAULT '0',
  `iw_marcat` tinyint(1) NOT NULL DEFAULT '0',
  `iw_reply` text NOT NULL,
  `iw_file1` varchar(100) NOT NULL DEFAULT '',
  `iw_file2` varchar(100) NOT NULL DEFAULT '',
  `iw_file3` varchar(100) NOT NULL DEFAULT '',
  `iw_replied` tinyint(1) NOT NULL DEFAULT '0',
  `pn_obj_status` varchar(1) NOT NULL DEFAULT 'A',
  `pn_cr_date` datetime NOT NULL DEFAULT '1970-01-01 00:00:00',
  `pn_cr_uid` int(11) NOT NULL DEFAULT '0',
  `pn_lu_date` datetime NOT NULL DEFAULT '1970-01-01 00:00:00',
  `pn_lu_uid` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`iw_msg_id`),
  KEY `iw_from_userid` (`iw_from_userid`),
  KEY `iw_to_userid` (`iw_to_userid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de la taula `zk_iw_moodle`
--

CREATE TABLE IF NOT EXISTS `zk_iw_moodle` (
  `iw_mid` int(11) NOT NULL AUTO_INCREMENT,
  `iw_mcid` int(11) NOT NULL DEFAULT '0',
  `iw_uid` int(11) NOT NULL DEFAULT '0',
  `iw_role` int(11) NOT NULL DEFAULT '0',
  `pn_obj_status` varchar(1) NOT NULL DEFAULT 'A',
  `pn_cr_date` datetime NOT NULL DEFAULT '1970-01-01 00:00:00',
  `pn_cr_uid` int(11) NOT NULL DEFAULT '0',
  `pn_lu_date` datetime NOT NULL DEFAULT '1970-01-01 00:00:00',
  `pn_lu_uid` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`iw_mid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de la taula `zk_iw_noteboard`
--

CREATE TABLE IF NOT EXISTS `zk_iw_noteboard` (
  `iw_nid` int(10) NOT NULL AUTO_INCREMENT,
  `iw_data` varchar(15) NOT NULL DEFAULT '',
  `iw_informa` int(10) NOT NULL DEFAULT '0',
  `iw_noticia` text NOT NULL,
  `iw_destinataris` varchar(255) NOT NULL DEFAULT '',
  `iw_mes_info` varchar(255) NOT NULL DEFAULT '',
  `iw_text` varchar(255) NOT NULL DEFAULT '',
  `iw_caduca` varchar(15) NOT NULL DEFAULT '',
  `iw_no_mostrar` text NOT NULL,
  `iw_titular` varchar(255) NOT NULL DEFAULT '',
  `iw_titulin` varchar(15) NOT NULL DEFAULT '',
  `iw_titulout` varchar(15) NOT NULL DEFAULT '',
  `iw_fitxer` varchar(255) NOT NULL DEFAULT '',
  `iw_textfitxer` varchar(255) NOT NULL DEFAULT '',
  `iw_verifica` tinyint(1) NOT NULL DEFAULT '0',
  `iw_admet_comentaris` tinyint(1) NOT NULL DEFAULT '0',
  `iw_ncid` int(10) NOT NULL DEFAULT '0',
  `iw_tid` int(10) NOT NULL DEFAULT '0',
  `iw_marca` text NOT NULL,
  `iw_edited` varchar(15) NOT NULL DEFAULT '',
  `iw_edited_by` int(10) NOT NULL DEFAULT '0',
  `iw_lang` varchar(3) NOT NULL DEFAULT '',
  `iw_public` tinyint(1) NOT NULL DEFAULT '0',
  `iw_sharedFrom` varchar(50) NOT NULL DEFAULT '',
  `iw_literalGroups` varchar(255) NOT NULL DEFAULT '',
  `iw_sharedId` int(10) NOT NULL DEFAULT '0',
  `pn_obj_status` varchar(1) NOT NULL DEFAULT 'A',
  `pn_cr_date` datetime NOT NULL DEFAULT '1970-01-01 00:00:00',
  `pn_cr_uid` int(11) NOT NULL DEFAULT '0',
  `pn_lu_date` datetime NOT NULL DEFAULT '1970-01-01 00:00:00',
  `pn_lu_uid` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`iw_nid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de la taula `zk_iw_noteboard_public`
--

CREATE TABLE IF NOT EXISTS `zk_iw_noteboard_public` (
  `iw_pid` int(10) NOT NULL AUTO_INCREMENT,
  `iw_url` varchar(255) NOT NULL DEFAULT '',
  `iw_descriu` varchar(255) NOT NULL DEFAULT '',
  `iw_name` varchar(255) NOT NULL DEFAULT '',
  `iw_testDate` varchar(20) NOT NULL DEFAULT '',
  `pn_obj_status` varchar(1) NOT NULL DEFAULT 'A',
  `pn_cr_date` datetime NOT NULL DEFAULT '1970-01-01 00:00:00',
  `pn_cr_uid` int(11) NOT NULL DEFAULT '0',
  `pn_lu_date` datetime NOT NULL DEFAULT '1970-01-01 00:00:00',
  `pn_lu_uid` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`iw_pid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de la taula `zk_iw_noteboard_topics`
--

CREATE TABLE IF NOT EXISTS `zk_iw_noteboard_topics` (
  `iw_tid` int(10) NOT NULL AUTO_INCREMENT,
  `iw_nomtema` varchar(100) NOT NULL DEFAULT '',
  `iw_descriu` varchar(255) NOT NULL DEFAULT '',
  `iw_grup` int(10) NOT NULL DEFAULT '0',
  `pn_obj_status` varchar(1) NOT NULL DEFAULT 'A',
  `pn_cr_date` datetime NOT NULL DEFAULT '1970-01-01 00:00:00',
  `pn_cr_uid` int(11) NOT NULL DEFAULT '0',
  `pn_lu_date` datetime NOT NULL DEFAULT '1970-01-01 00:00:00',
  `pn_lu_uid` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`iw_tid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Bolcant dades de la taula `zk_iw_noteboard_topics`
--

INSERT INTO `zk_iw_noteboard_topics` (`iw_tid`, `iw_nomtema`, `iw_descriu`, `iw_grup`, `pn_obj_status`, `pn_cr_date`, `pn_cr_uid`, `pn_lu_date`, `pn_lu_uid`) VALUES
(1, 'Alumnat', 'Tema per a les notes per a l''alumnat', 3, 'A', '2008-09-22 09:45:17', 2, '2008-09-22 09:45:17', 2),
(2, 'Comunitat', 'Tema per a les notes d''interès general', 0, 'A', '2008-09-22 09:58:00', 2, '2008-09-22 09:58:00', 2),
(3, 'Professorat', 'Tema per a les notes per al professorat', 4, 'A', '2008-09-22 09:58:52', 2, '2008-09-22 09:58:52', 2),
(4, 'Editors', 'Tema per a les notes per a les persones que gestionen els continguts', 8, 'A', '2008-09-22 09:59:35', 2, '2008-09-22 09:59:35', 2);

-- --------------------------------------------------------

--
-- Estructura de la taula `zk_iw_qv`
--

CREATE TABLE IF NOT EXISTS `zk_iw_qv` (
  `iw_qvid` int(11) NOT NULL AUTO_INCREMENT,
  `iw_teacher` int(11) NOT NULL,
  `iw_groups` varchar(255) NOT NULL,
  `iw_title` varchar(255) NOT NULL DEFAULT '',
  `iw_description` text NOT NULL,
  `iw_url` varchar(255) NOT NULL DEFAULT '',
  `iw_skin` varchar(20) NOT NULL DEFAULT '',
  `iw_lang` varchar(10) NOT NULL DEFAULT '',
  `iw_maxdeliver` int(3) NOT NULL DEFAULT '-1',
  `iw_showcorrection` int(1) NOT NULL DEFAULT '1',
  `iw_showinteraction` int(1) NOT NULL DEFAULT '1',
  `iw_ordersections` int(1) NOT NULL DEFAULT '0',
  `iw_orderitems` int(1) NOT NULL DEFAULT '0',
  `iw_target` varchar(10) NOT NULL DEFAULT 'blank',
  `iw_width` varchar(10) DEFAULT NULL,
  `iw_height` varchar(10) DEFAULT NULL,
  `iw_active` int(1) NOT NULL DEFAULT '1',
  `iw_observations` text NOT NULL,
  `pn_obj_status` varchar(1) NOT NULL DEFAULT 'A',
  `pn_cr_date` datetime NOT NULL DEFAULT '1970-01-01 00:00:00',
  `pn_cr_uid` int(11) NOT NULL DEFAULT '0',
  `pn_lu_date` datetime NOT NULL DEFAULT '1970-01-01 00:00:00',
  `pn_lu_uid` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`iw_qvid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de la taula `zk_iw_qv_assignments`
--

CREATE TABLE IF NOT EXISTS `zk_iw_qv_assignments` (
  `iw_qvaid` int(11) NOT NULL AUTO_INCREMENT,
  `iw_qvid` int(11) NOT NULL,
  `iw_userid` int(11) NOT NULL,
  `iw_sectionorder` int(10) NOT NULL DEFAULT '0',
  `iw_itemorder` int(10) NOT NULL DEFAULT '0',
  `iw_teachercomments` mediumtext,
  `iw_teacherobservations` mediumtext,
  `pn_obj_status` varchar(1) NOT NULL DEFAULT 'A',
  `pn_cr_date` datetime NOT NULL DEFAULT '1970-01-01 00:00:00',
  `pn_cr_uid` int(11) NOT NULL DEFAULT '0',
  `pn_lu_date` datetime NOT NULL DEFAULT '1970-01-01 00:00:00',
  `pn_lu_uid` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`iw_qvaid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de la taula `zk_iw_qv_messages`
--

CREATE TABLE IF NOT EXISTS `zk_iw_qv_messages` (
  `iw_qvmid` int(11) NOT NULL AUTO_INCREMENT,
  `iw_qvsid` int(11) NOT NULL,
  `iw_itemid` varchar(255) NOT NULL,
  `iw_userid` int(11) NOT NULL,
  `iw_message` mediumtext NOT NULL,
  `pn_obj_status` varchar(1) NOT NULL DEFAULT 'A',
  `pn_cr_date` datetime NOT NULL DEFAULT '1970-01-01 00:00:00',
  `pn_cr_uid` int(11) NOT NULL DEFAULT '0',
  `pn_lu_date` datetime NOT NULL DEFAULT '1970-01-01 00:00:00',
  `pn_lu_uid` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`iw_qvmid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de la taula `zk_iw_qv_messages_read`
--

CREATE TABLE IF NOT EXISTS `zk_iw_qv_messages_read` (
  `iw_qvmrid` int(11) NOT NULL AUTO_INCREMENT,
  `iw_qvmid` int(11) NOT NULL,
  `iw_userid` int(11) NOT NULL,
  `pn_obj_status` varchar(1) NOT NULL DEFAULT 'A',
  `pn_cr_date` datetime NOT NULL DEFAULT '1970-01-01 00:00:00',
  `pn_cr_uid` int(11) NOT NULL DEFAULT '0',
  `pn_lu_date` datetime NOT NULL DEFAULT '1970-01-01 00:00:00',
  `pn_lu_uid` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`iw_qvmrid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de la taula `zk_iw_qv_sections`
--

CREATE TABLE IF NOT EXISTS `zk_iw_qv_sections` (
  `iw_qvsid` int(11) NOT NULL AUTO_INCREMENT,
  `iw_qvaid` int(11) NOT NULL,
  `iw_sectionid` varchar(255) NOT NULL,
  `iw_responses` mediumtext,
  `iw_scores` mediumtext,
  `iw_pendingscores` mediumtext,
  `iw_attempts` int(60) DEFAULT '0',
  `iw_state` int(1) DEFAULT '0',
  `iw_time` varchar(8) DEFAULT '00:00:00',
  `pn_obj_status` varchar(1) NOT NULL DEFAULT 'A',
  `pn_cr_date` datetime NOT NULL DEFAULT '1970-01-01 00:00:00',
  `pn_cr_uid` int(11) NOT NULL DEFAULT '0',
  `pn_lu_date` datetime NOT NULL DEFAULT '1970-01-01 00:00:00',
  `pn_lu_uid` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`iw_qvsid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de la taula `zk_iw_timeframes`
--

CREATE TABLE IF NOT EXISTS `zk_iw_timeframes` (
  `hid` int(10) NOT NULL AUTO_INCREMENT,
  `mdid` int(10) NOT NULL DEFAULT '0',
  `start` time NOT NULL DEFAULT '00:00:00',
  `end` time NOT NULL DEFAULT '00:00:00',
  `descriu` varchar(255) NOT NULL DEFAULT '',
  `pn_obj_status` varchar(1) NOT NULL DEFAULT 'A',
  `pn_cr_date` datetime NOT NULL DEFAULT '1970-01-01 00:00:00',
  `pn_cr_uid` int(11) NOT NULL DEFAULT '0',
  `pn_lu_date` datetime NOT NULL DEFAULT '1970-01-01 00:00:00',
  `pn_lu_uid` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`hid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

--
-- Bolcant dades de la taula `zk_iw_timeframes`
--

INSERT INTO `zk_iw_timeframes` (`hid`, `mdid`, `start`, `end`, `descriu`, `pn_obj_status`, `pn_cr_date`, `pn_cr_uid`, `pn_lu_date`, `pn_lu_uid`) VALUES
(1, 2, '08:00:00', '09:00:00', 'Primera hora', 'A', '2008-09-10 17:00:01', 2, '2008-09-10 17:04:19', 2),
(2, 2, '09:00:00', '10:00:00', 'Segona hora', 'A', '2008-09-10 17:00:20', 2, '2008-09-10 17:04:33', 2),
(3, 2, '10:00:00', '11:00:00', 'Tercera hora', 'A', '2008-09-10 17:00:42', 2, '2008-09-10 17:04:51', 2),
(4, 2, '11:00:00', '11:30:00', 'Pati', 'A', '2008-09-10 17:05:18', 2, '2008-09-10 17:05:38', 2),
(5, 2, '11:30:00', '12:30:00', 'Quarta hora', 'A', '2008-09-10 17:06:01', 2, '2008-09-10 17:06:01', 2),
(6, 2, '12:30:00', '13:30:00', 'Cinquena hora', 'A', '2008-09-10 17:06:23', 2, '2008-09-10 17:06:23', 2),
(7, 2, '13:30:00', '15:30:00', 'Dinar', 'A', '2008-09-10 17:06:49', 2, '2008-09-10 17:06:49', 2),
(8, 2, '15:30:00', '16:30:00', 'Sisena hora', 'A', '2008-09-10 17:07:15', 2, '2008-09-10 17:07:15', 2),
(9, 2, '16:30:00', '17:30:00', 'Setena hora', 'A', '2008-09-10 17:07:36', 2, '2008-09-10 17:07:36', 2),
(10, 1, '09:00:00', '10:00:00', 'Primera hora', 'A', '2008-09-10 17:08:23', 2, '2008-09-10 17:08:23', 2),
(11, 1, '10:00:00', '11:00:00', 'Segona hora', 'A', '2008-09-10 17:08:38', 2, '2008-09-10 17:08:38', 2),
(12, 1, '11:00:00', '11:30:00', 'Pati', 'A', '2008-09-10 17:09:05', 2, '2008-09-10 17:09:05', 2),
(13, 1, '11:30:00', '12:15:00', 'Tercera hora', 'A', '2008-09-10 17:10:16', 2, '2008-09-10 17:10:16', 2),
(14, 1, '12:15:00', '13:00:00', 'Quarta hora', 'A', '2008-09-10 17:10:37', 2, '2008-09-10 17:10:37', 2),
(15, 1, '13:00:00', '15:00:00', 'Dinar', 'A', '2008-09-10 17:10:56', 2, '2008-09-10 17:10:56', 2),
(16, 1, '15:00:00', '15:45:00', 'Cinquena hora', 'A', '2008-09-10 17:12:03', 2, '2008-09-10 17:12:03', 2),
(17, 1, '15:45:00', '16:30:00', 'Sisena hora', 'A', '2008-09-10 17:12:29', 2, '2008-09-10 17:12:29', 2);

-- --------------------------------------------------------

--
-- Estructura de la taula `zk_iw_timeframes_def`
--

CREATE TABLE IF NOT EXISTS `zk_iw_timeframes_def` (
  `mdid` int(10) NOT NULL AUTO_INCREMENT,
  `nom_marc` varchar(50) NOT NULL DEFAULT '',
  `descriu` varchar(255) NOT NULL DEFAULT '',
  `pn_obj_status` varchar(1) NOT NULL DEFAULT 'A',
  `pn_cr_date` datetime NOT NULL DEFAULT '1970-01-01 00:00:00',
  `pn_cr_uid` int(11) NOT NULL DEFAULT '0',
  `pn_lu_date` datetime NOT NULL DEFAULT '1970-01-01 00:00:00',
  `pn_lu_uid` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`mdid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Bolcant dades de la taula `zk_iw_timeframes_def`
--

INSERT INTO `zk_iw_timeframes_def` (`mdid`, `nom_marc`, `descriu`, `pn_obj_status`, `pn_cr_date`, `pn_cr_uid`, `pn_lu_date`, `pn_lu_uid`) VALUES
(1, 'Primària', 'Marc horari de mostra per a primària', 'A', '2008-09-10 16:57:41', 2, '2008-09-10 16:57:41', 2),
(2, 'ESO', 'Marc horari de mostra per a la ESO', 'A', '2008-09-10 16:58:02', 2, '2008-09-10 16:58:02', 2);

-- --------------------------------------------------------

--
-- Estructura de la taula `zk_iw_users`
--

CREATE TABLE IF NOT EXISTS `zk_iw_users` (
  `iw_suid` int(11) NOT NULL AUTO_INCREMENT,
  `iw_uid` int(11) NOT NULL DEFAULT '0',
  `iw_id` varchar(50) NOT NULL DEFAULT '',
  `iw_nom` varchar(25) NOT NULL DEFAULT '',
  `iw_cognom1` varchar(25) NOT NULL DEFAULT '',
  `iw_cognom2` varchar(25) NOT NULL DEFAULT '',
  `iw_naixement` varchar(8) NOT NULL DEFAULT '',
  `iw_accio` tinyint(1) NOT NULL DEFAULT '0',
  `iw_mobile` varchar(30) NOT NULL DEFAULT '',
  `iw_fix` varchar(40) NOT NULL DEFAULT '',
  `iw_parentsName` varchar(150) NOT NULL DEFAULT '',
  `iw_address` varchar(150) NOT NULL DEFAULT '',
  `iw_postal` varchar(150) NOT NULL DEFAULT '',
  `iw_identifyCard` varchar(12) NOT NULL DEFAULT '',
  `iw_refUser` int(11) NOT NULL DEFAULT '0',
  `iw_sendSMS` tinyint(1) NOT NULL DEFAULT '0',
  `iw_active` tinyint(1) NOT NULL DEFAULT '0',
  `zk_obj_status` varchar(1) NOT NULL DEFAULT 'A',
  `zk_cr_date` datetime NOT NULL DEFAULT '1970-01-01 00:00:00',
  `zk_cr_uid` int(11) NOT NULL DEFAULT '0',
  `zk_lu_date` datetime NOT NULL DEFAULT '1970-01-01 00:00:00',
  `zk_lu_uid` int(11) NOT NULL DEFAULT '0',
  `iw_parentsEMail` varchar(30) NOT NULL DEFAULT '',
  `iw_description` mediumtext NOT NULL,
  PRIMARY KEY (`iw_suid`),
  KEY `iw_uid` (`iw_uid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Bolcant dades de la taula `zk_iw_users`
--

INSERT INTO `zk_iw_users` (`iw_suid`, `iw_uid`, `iw_id`, `iw_nom`, `iw_cognom1`, `iw_cognom2`, `iw_naixement`, `iw_accio`, `iw_mobile`, `iw_fix`, `iw_parentsName`, `iw_address`, `iw_postal`, `iw_identifyCard`, `iw_refUser`, `iw_sendSMS`, `iw_active`, `zk_obj_status`, `zk_cr_date`, `zk_cr_uid`, `zk_lu_date`, `zk_lu_uid`, `iw_parentsEMail`, `iw_description`) VALUES
(1, 1, '', 'Usuari/ària anònim', '', '', '', 0, '', '', '', '', '', '', 0, 0, 0, 'A', '1970-01-01 00:00:00', 0, '2008-09-09 16:39:50', 2, '', ''),
(2, 2, '', 'Administrador/a', '', '', '', 0, '', '', '', '', '', '', 0, 0, 0, 'A', '1970-01-01 00:00:00', 0, '2008-09-09 16:39:10', 2, '', ''),
(3, 3, '', 'Professor/a', 'U', '', '', 0, '', '', '', '', '', '', 0, 0, 0, 'A', '1970-01-01 00:00:00', 0, '1970-01-01 00:00:00', 0, '', ''),
(4, 4, '', 'Professor/a', 'Dos', '', '', 0, '', '', '', '', '', '', 0, 0, 0, 'A', '1970-01-01 00:00:00', 0, '1970-01-01 00:00:00', 0, '', ''),
(5, 5, '', 'Professor/a', 'Tres', '', '', 0, '', '', '', '', '', '', 0, 0, 0, 'A', '1970-01-01 00:00:00', 0, '1970-01-01 00:00:00', 0, '', ''),
(6, 6, '', 'Alumne/a', 'U', '', '', 0, '', '', '', '', '', '', 0, 0, 0, 'A', '1970-01-01 00:00:00', 0, '1970-01-01 00:00:00', 0, '', ''),
(7, 7, '', 'Alumne/a', 'Dos', '', '', 0, '', '', '', '', '', '', 0, 0, 0, 'A', '1970-01-01 00:00:00', 0, '1970-01-01 00:00:00', 0, '', ''),
(8, 8, '', 'Alumne/a', 'Tres', '', '', 0, '', '', '', '', '', '', 0, 0, 0, 'A', '1970-01-01 00:00:00', 0, '1970-01-01 00:00:00', 0, '', ''),
(9, 9, '', 'Membre', 'equip', 'directiu', '', 0, '', '', '', '', '', '', 0, 0, 0, 'A', '1970-01-01 00:00:00', 0, '1970-01-01 00:00:00', 0, '', ''),
(10, 10, '', '', '', '', '', 0, '', '', '', '', '', '', 0, 0, 0, 'A', '1970-01-01 00:00:00', 0, '1970-01-01 00:00:00', 0, '', ''),
(11, 11, '', 'Usuari/ària', 'd''Edició', '', '', 0, '', '', '', '', '', '', 0, 0, 0, 'A', '1970-01-01 00:00:00', 0, '1970-01-01 00:00:00', 0, '', '');

-- --------------------------------------------------------

--
-- Estructura de la taula `zk_iw_users_aux`
--

CREATE TABLE IF NOT EXISTS `zk_iw_users_aux` (
  `iw_suid` int(11) NOT NULL AUTO_INCREMENT,
  `iw_uid` int(11) NOT NULL DEFAULT '0',
  `iw_id` varchar(50) NOT NULL DEFAULT '',
  `iw_nom` varchar(25) NOT NULL DEFAULT '',
  `iw_cognom1` varchar(25) NOT NULL DEFAULT '',
  `iw_cognom2` varchar(25) NOT NULL DEFAULT '',
  `iw_naixement` varchar(8) NOT NULL DEFAULT '',
  `iw_accio` tinyint(1) NOT NULL DEFAULT '0',
  `zk_obj_status` varchar(1) NOT NULL DEFAULT 'A',
  `zk_cr_date` datetime NOT NULL DEFAULT '1970-01-01 00:00:00',
  `zk_cr_uid` int(11) NOT NULL DEFAULT '0',
  `zk_lu_date` datetime NOT NULL DEFAULT '1970-01-01 00:00:00',
  `zk_lu_uid` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`iw_suid`),
  KEY `iw_uid` (`iw_uid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de la taula `zk_iw_users_friends`
--

CREATE TABLE IF NOT EXISTS `zk_iw_users_friends` (
  `iw_fid` int(11) NOT NULL AUTO_INCREMENT,
  `iw_uid` int(11) NOT NULL DEFAULT '0',
  `iw_fuid` int(11) NOT NULL DEFAULT '0',
  `zk_obj_status` varchar(1) NOT NULL DEFAULT 'A',
  `zk_cr_date` datetime NOT NULL DEFAULT '1970-01-01 00:00:00',
  `zk_cr_uid` int(11) NOT NULL DEFAULT '0',
  `zk_lu_date` datetime NOT NULL DEFAULT '1970-01-01 00:00:00',
  `zk_lu_uid` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`iw_fid`),
  KEY `iw_uid` (`iw_uid`),
  KEY `iw_fid` (`iw_fid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de la taula `zk_iw_users_import`
--

CREATE TABLE IF NOT EXISTS `zk_iw_users_import` (
  `iw_suid` int(11) NOT NULL AUTO_INCREMENT,
  `iw_uid` int(11) NOT NULL DEFAULT '0',
  `iw_id` varchar(50) NOT NULL DEFAULT '',
  `iw_nom` varchar(25) NOT NULL DEFAULT '',
  `iw_cognom1` varchar(25) NOT NULL DEFAULT '',
  `iw_cognom2` varchar(25) NOT NULL DEFAULT '',
  `iw_naixement` varchar(8) NOT NULL DEFAULT '',
  `iw_accio` tinyint(1) NOT NULL DEFAULT '0',
  `iw_contrasenya` varchar(25) NOT NULL DEFAULT '',
  `iw_login` varchar(25) NOT NULL DEFAULT '',
  `iw_grup` varchar(20) NOT NULL DEFAULT '',
  `zk_obj_status` varchar(1) NOT NULL DEFAULT 'A',
  `zk_cr_date` datetime NOT NULL DEFAULT '1970-01-01 00:00:00',
  `zk_cr_uid` int(11) NOT NULL DEFAULT '0',
  `zk_lu_date` datetime NOT NULL DEFAULT '1970-01-01 00:00:00',
  `zk_lu_uid` int(11) NOT NULL DEFAULT '0',
  `iw_email` varchar(60) NOT NULL DEFAULT '',
  PRIMARY KEY (`iw_suid`),
  KEY `iw_uid` (`iw_uid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de la taula `zk_iw_vhmenu`
--

CREATE TABLE IF NOT EXISTS `zk_iw_vhmenu` (
  `iw_mid` int(11) NOT NULL AUTO_INCREMENT,
  `iw_text` varchar(50) NOT NULL DEFAULT '',
  `iw_url` varchar(255) NOT NULL DEFAULT '',
  `iw_bg_image` varchar(20) NOT NULL DEFAULT '',
  `iw_height` int(3) NOT NULL DEFAULT '25',
  `iw_width` int(3) NOT NULL DEFAULT '125',
  `iw_id_parent` int(11) NOT NULL DEFAULT '0',
  `iw_groups` mediumtext NOT NULL,
  `iw_active` tinyint(1) NOT NULL DEFAULT '0',
  `iw_target` tinyint(1) NOT NULL DEFAULT '0',
  `iw_descriu` mediumtext NOT NULL,
  `iw_iorder` int(11) NOT NULL DEFAULT '0',
  `iw_grafic` tinyint(1) NOT NULL DEFAULT '0',
  `iw_image1` varchar(20) NOT NULL DEFAULT '',
  `iw_image2` varchar(20) NOT NULL DEFAULT '',
  `pn_obj_status` varchar(1) NOT NULL DEFAULT 'A',
  `pn_cr_date` datetime NOT NULL DEFAULT '1970-01-01 00:00:00',
  `pn_cr_uid` int(11) NOT NULL DEFAULT '0',
  `pn_lu_date` datetime NOT NULL DEFAULT '1970-01-01 00:00:00',
  `pn_lu_uid` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`iw_mid`),
  KEY `iw_id_parent` (`iw_id_parent`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=31 ;

--
-- Bolcant dades de la taula `zk_iw_vhmenu`
--

INSERT INTO `zk_iw_vhmenu` (`iw_mid`, `iw_text`, `iw_url`, `iw_bg_image`, `iw_height`, `iw_width`, `iw_id_parent`, `iw_groups`, `iw_active`, `iw_target`, `iw_descriu`, `iw_iorder`, `iw_grafic`, `iw_image1`, `iw_image2`, `pn_obj_status`, `pn_cr_date`, `pn_cr_uid`, `pn_lu_date`, `pn_lu_uid`) VALUES
(1, 'Inici', 'index.php', '', 23, 80, 0, '$$0|0$$-1|0$', 1, 0, 'Càrrega la pàgina d''inici', 2, 0, '', '', 'A', '2008-04-16 21:43:52', 2, '2008-09-10 16:10:30', 2),
(2, 'Administració', 'admin.php', '', 24, 100, 0, '$$2|0$', 1, 0, '', 8, 0, '', '', 'A', '2008-04-16 21:44:17', 2, '2008-06-23 04:51:19', 2),
(3, 'Surt', 'user.php?op=logout', 'surt.gif', 24, 120, 0, '$$0|0$', 1, 0, '', 10, 0, '', '', 'A', '2008-04-16 21:56:57', 2, '2008-06-22 23:20:39', 2),
(4, 'Bústia', 'index.php?module=iw_messages', 'correu.gif', 24, 80, 0, '$$0|0$', 1, 0, '', 6, 0, '', '', 'A', '2008-04-16 22:19:56', 2, '2008-06-22 23:20:39', 2),
(5, 'Agendes', 'index.php?module=iw_agendas&type=admin', '', 24, 120, 10, '$$2|0$', 1, 0, '', 2, 0, '', '', 'A', '2008-04-16 22:28:52', 2, '2010-09-03 15:05:12', 0),
(6, 'Formularis', 'index.php?module=iw_forms&type=admin', '', 24, 120, 10, '$$2|0$', 1, 0, '', 6, 0, '', '', 'A', '2008-04-17 02:17:11', 2, '2008-09-26 14:39:02', 2),
(7, 'Fitxers del lloc', 'index.php?module=Files', '', 24, 120, 10, '$$2|0$', 1, 0, '', 4, 0, '', '', 'A', '2008-04-17 02:21:47', 2, '2010-09-03 15:05:11', 0),
(9, 'Sistema', 'index.php?module=Admin&type=admin&func=adminpanel&acid=1', '', 24, 120, 2, '$$2|0$', 1, 0, '', 6, 0, '', '', 'A', '2008-04-20 12:44:13', 2, '2010-09-03 15:05:11', 0),
(10, 'Mòduls IW', 'index.php?module=Admin&type=admin&func=adminpanel&acid=2', '', 24, 120, 2, '$$2|0$', 1, 0, '', 4, 0, '', '', 'A', '2008-04-20 12:52:32', 2, '2010-09-03 15:05:11', 0),
(11, 'Mòduls', 'index.php?module=Modules&type=admin', '', 24, 120, 9, '$$2|0$', 1, 0, '', 6, 0, '', '', 'A', '2008-04-20 12:54:29', 2, '2010-09-03 15:05:11', 0),
(12, 'Configuració', 'index.php?module=Settings&type=admin', '', 24, 120, 9, '$$2|0$', 1, 0, '', 4, 0, '', '', 'A', '2008-04-20 12:55:57', 2, '2010-09-03 15:05:11', 0),
(13, 'Blocs', 'index.php?module=Blocks&type=admin', '', 24, 120, 9, '$$2|0$', 1, 0, '', 2, 0, '', '', 'A', '2008-04-20 12:57:08', 2, '2010-09-03 15:05:11', 0),
(14, 'Permisos', 'index.php?module=permissions&type=admin&func=view', '', 24, 120, 9, '$$2|0$', 1, 0, '', 8, 0, '', '', 'A', '2008-04-20 12:58:21', 2, '2010-09-03 15:05:12', 0),
(15, 'El meu compte', 'index.php?module=Profile', '', 24, 120, 0, '$$0|0$', 1, 0, '', 4, 0, '', '', 'A', '2008-06-22 23:20:31', 2, '2010-09-03 15:10:13', 0),
(16, 'Menú', 'index.php?module=iw_vhmenu&type=admin', '', 24, 60, 10, '$$2|0$', 1, 0, '', 14, 0, '', '', 'A', '2008-06-23 03:56:11', 2, '2010-09-03 15:05:11', 0),
(17, 'Continguts', 'index.php?module=Admin&type=admin&func=adminpanel&acid=4', '', 24, 120, 2, '$$2|0$', 1, 0, '', 2, 0, '', '', 'A', '2008-06-23 04:00:46', 2, '2010-09-03 15:05:11', 0),
(18, 'Fòrums', 'index.php?module=iw_forums&type=admin', '', 24, 80, 10, '$$2|0$', 1, 0, '', 8, 0, '', '', 'A', '2008-06-23 04:03:15', 2, '2010-09-03 15:05:12', 0),
(19, 'Descàrregues', 'index.php?module=Downloads&type=admin', '', 24, 120, 17, '$$2|0$', 1, 0, 'Documents de descàrrega', 4, 0, '', '', 'A', '2008-06-23 00:00:41', 2, '2008-09-16 15:57:10', 2),
(20, 'Pàgines', 'index.php?module=Pages&type=admin', '', 24, 120, 17, '$$2|0$', 1, 0, '', 8, 0, '', '', 'A', '2008-06-23 00:01:34', 2, '2008-09-16 15:57:10', 2),
(21, 'Notícies', 'index.php?module=News&type=admin', '', 24, 120, 17, '$$2|0$', 1, 0, 'Notícies del portal', 6, 0, '', '', 'A', '2008-06-23 00:03:05', 2, '2010-09-03 15:05:11', 0),
(22, 'Usuaris', 'index.php?module=iw_users&type=admin', '', 24, 120, 10, '$$2|0$', 1, 0, 'Opcions ampliades d''administració dels usuaris', 24, 0, '', '', 'A', '2008-06-24 12:51:20', 2, '2008-09-26 14:39:03', 2),
(23, 'Llibres', 'index.php?module=iw_books&type=admin', '', 24, 150, 10, '$$2|0$', 1, 0, 'Accés d''administració al mòdul de llibres', 12, 0, '', '', 'A', '2008-09-10 16:08:35', 2, '2008-09-26 14:39:02', 2),
(24, 'Reserves', 'index.php?module=iw_bookings&type=admin', '', 23, 150, 10, '$$2|0$', 1, 0, 'Accés d''administració al mòdul de reserves', 20, 0, '', '', 'A', '2008-09-10 16:52:17', 2, '2008-09-26 14:39:03', 2),
(25, 'Tauler', 'index.php?module=iw_noteboard&type=admin', '', 24, 150, 10, '$$2|0$', 1, 0, 'Accés d''administració al mòdul del tauler', 22, 0, '', '', 'A', '2008-09-15 17:27:06', 2, '2008-09-26 14:39:03', 2),
(26, 'Continguts', 'index.php?module=content&type=admin', '', 24, 150, 17, '$$2|0$', 1, 0, 'Administració del mòdul de continguts', 2, 0, '', '', 'A', '2008-09-16 15:57:10', 2, '2010-09-07 11:40:22', 10),
(27, 'Grups', 'index.php?module=iw_groups&type=admin', '', 24, 150, 10, '$$2|0$', 1, 0, 'Accés d''administració al mòdul de grups', 10, 0, '', '', 'A', '2008-09-22 09:34:35', 2, '2008-09-26 14:39:02', 2),
(28, 'Utilitats', 'index.php?module=Admin&type=admin&func=adminpanel&acid=5', '', 24, 150, 2, '$$2|0$', 1, 0, 'Accés a la pestanya d''utilitats del tauler d''administració', 8, 0, '', '', 'A', '2008-09-23 09:09:36', 2, '2010-09-03 15:05:11', 0),
(29, 'Portal', 'index.php?module=iw_webbox&type=admin', '', 24, 150, 10, '$$2|0$', 1, 0, '', 18, 0, '', '', 'A', '2008-09-23 10:10:38', 2, '2008-09-26 14:39:03', 2),
(30, 'Missatges', 'index.php?module=iw_messages&type=admin', '', 24, 150, 10, '$$2|0$', 1, 0, 'Accés d''administració al mòdul de missatges', 16, 0, '', '', 'A', '2008-09-26 14:37:18', 2, '2009-10-05 17:10:09', 10);

-- --------------------------------------------------------

--
-- Estructura de la taula `zk_iw_webbox`
--

CREATE TABLE IF NOT EXISTS `zk_iw_webbox` (
  `iw_pid` int(11) NOT NULL AUTO_INCREMENT,
  `iw_url` varchar(255) NOT NULL DEFAULT '',
  `iw_ref` varchar(10) NOT NULL DEFAULT '',
  `iw_scrolls` tinyint(1) NOT NULL DEFAULT '1',
  `iw_description` varchar(255) NOT NULL DEFAULT '',
  `iw_width` int(11) NOT NULL DEFAULT '100',
  `iw_height` int(11) NOT NULL DEFAULT '600',
  `iw_widthunit` varchar(10) NOT NULL DEFAULT '%',
  `pn_obj_status` varchar(1) NOT NULL DEFAULT 'A',
  `pn_cr_date` datetime NOT NULL DEFAULT '1970-01-01 00:00:00',
  `pn_cr_uid` int(11) NOT NULL DEFAULT '0',
  `pn_lu_date` datetime NOT NULL DEFAULT '1970-01-01 00:00:00',
  `pn_lu_uid` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`iw_pid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de la taula `zk_message`
--

CREATE TABLE IF NOT EXISTS `zk_message` (
  `pn_mid` int(11) NOT NULL AUTO_INCREMENT,
  `pn_title` varchar(100) NOT NULL DEFAULT '',
  `pn_content` longtext NOT NULL,
  `pn_date` int(11) NOT NULL DEFAULT '0',
  `pn_expire` int(11) NOT NULL DEFAULT '0',
  `pn_active` int(11) NOT NULL DEFAULT '1',
  `pn_view` int(11) NOT NULL DEFAULT '1',
  `pn_language` varchar(30) NOT NULL DEFAULT '',
  PRIMARY KEY (`pn_mid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Bolcant dades de la taula `zk_message`
--

INSERT INTO `zk_message` (`pn_mid`, `pn_title`, `pn_content`, `pn_date`, `pn_expire`, `pn_active`, `pn_view`, `pn_language`) VALUES
(1, 'Benvinguts a la Intraweb', '<p>La Intraweb és una intranet orientada al món educatiu basada en el <a href="http://zikula.org">Zikula</a>, un sistema de gestió de continguts segur i estable.\r\n  <br />\r\n</p>\r\n<p>Els usos més destacables de la Intraweb són:\r\n</p>\r\n<ul>\r\n  <li>Com a web pública del centre</li>\r\n  <li>Com a eina de comunicació interpersonal i comunitària\r\n  <br /></li>\r\n  <li>Com a instrument pedagògic</li>\r\n  <li>Com a eina de suport a determinats aspectes de la gestió del centre</li>\r\n</ul>\r\n<p>Esperem que la Intraweb us agradi.\r\n  <br />\r\n  <br /><strong>L''equip de desenvolupament del projecte Intraweb</strong>\r\n</p>\r\n<p><em>Nota: podeu editar o esborrar aquest missatge accedint al tauler d''administració i clicant a l''opció ''Missatges d''administració''</em>\r\n</p>', 1236342167, 0, 1, 1, '');

-- --------------------------------------------------------

--
-- Estructura de la taula `zk_modules`
--

CREATE TABLE IF NOT EXISTS `zk_modules` (
  `pn_id` int(11) NOT NULL AUTO_INCREMENT,
  `pn_name` varchar(64) NOT NULL DEFAULT '',
  `pn_type` tinyint(4) NOT NULL,
  `pn_displayname` varchar(64) NOT NULL DEFAULT '',
  `pn_description` varchar(255) NOT NULL DEFAULT '',
  `pn_regid` int(11) NOT NULL DEFAULT '0',
  `pn_directory` varchar(64) NOT NULL DEFAULT '',
  `pn_version` varchar(10) NOT NULL DEFAULT '0',
  `pn_official` tinyint(4) NOT NULL DEFAULT '0',
  `pn_author` varchar(255) NOT NULL DEFAULT '',
  `pn_contact` varchar(255) NOT NULL DEFAULT '',
  `pn_admin_capable` tinyint(4) NOT NULL DEFAULT '0',
  `pn_user_capable` tinyint(4) NOT NULL DEFAULT '0',
  `pn_state` tinyint(4) NOT NULL DEFAULT '0',
  `pn_credits` varchar(255) NOT NULL DEFAULT '',
  `pn_changelog` varchar(255) NOT NULL DEFAULT '',
  `pn_help` varchar(255) NOT NULL DEFAULT '',
  `pn_license` varchar(255) NOT NULL DEFAULT '',
  `pn_securityschema` text,
  `pn_profile_capable` tinyint(4) NOT NULL DEFAULT '0',
  `pn_message_capable` tinyint(4) NOT NULL DEFAULT '0',
  `pn_url` varchar(64) NOT NULL DEFAULT '',
  PRIMARY KEY (`pn_id`),
  KEY `state` (`pn_state`),
  KEY `mod_state` (`pn_name`,`pn_state`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=114 ;

--
-- Bolcant dades de la taula `zk_modules`
--

INSERT INTO `zk_modules` (`pn_id`, `pn_name`, `pn_type`, `pn_displayname`, `pn_description`, `pn_regid`, `pn_directory`, `pn_version`, `pn_official`, `pn_author`, `pn_contact`, `pn_admin_capable`, `pn_user_capable`, `pn_state`, `pn_credits`, `pn_changelog`, `pn_help`, `pn_license`, `pn_securityschema`, `pn_profile_capable`, `pn_message_capable`, `pn_url`) VALUES
(1, 'Modules', 3, 'Gestor dels mòduls', 'Proporciona suport per a l''ús de mòduls i una interfície per a gestionar-los', 0, 'Modules', '3.6', 1, 'Jim McDonald, Mark West', 'http://www.zikula.org', 1, 0, 3, '', '', '', '', 'a:1:{s:9:"Modules::";s:2:"::";}', 0, 0, 'modules'),
(2, 'pnRender', 3, 'Motor de renderitzat', 'Proporciona un sistema de plantilles basat en el programari Smarty.', 0, 'pnRender', '1.1', 1, 'The Zikula development team', 'http://www.zikula.org/', 1, 0, 3, 'pndocs/credits.txt', 'pndocs/changelog.txt', 'pndocs/help.txt', 'pndocs/license.txt', 'a:1:{s:10:"pnRender::";s:2:"::";}', 0, 0, 'pnrender'),
(3, 'Blocks', 3, 'Gestor dels blocs', 'Interfície de gestió dels blocs', 0, 'Blocks', '3.6', 1, 'Jim McDonald, Mark West', 'http://www.mcdee.net/, http://www.markwest.me.uk/', 1, 1, 3, '', '', '', '', 'a:2:{s:8:"Blocks::";s:30:"Block key:Block title:Block ID";s:16:"Blocks::position";s:26:"Position name::Position ID";}', 0, 0, 'blocksmanager'),
(4, 'Errors', 3, 'Registrador d''errors', 'Proporciona la capacitat de registrar errors al sistema.', 0, 'Errors', '1.1', 1, 'Brian Lindner <Furbo>', 'furbo@sigtauonline.com', 0, 1, 3, 'pndocs/credits.txt', 'pndocs/changelog.txt', 'pndocs/help.txt', 'pndocs/license.txt', 'a:1:{s:8:"Errors::";s:2:"::";}', 0, 0, 'errorlogger'),
(5, 'Permissions', 3, 'Gestor dels permisos', 'Proporciona un sistema de gestió de l''accés a les diferents funcionalitats del lloc web a través de permisos.', 0, 'Permissions', '1.1', 1, 'Jim McDonald, M.Maes', 'http://www.mcdee.net/, http://www.mmaes.com', 1, 0, 3, 'pndocs/credits.txt', 'pndocs/changelog.txt', 'pndocs/install.txt', 'pndocs/license.txt', 'a:1:{s:13:"Permissions::";s:2:"::";}', 0, 0, 'permissions'),
(6, 'Workflow', 3, 'Gestor del diagrama de flux', 'Proporciona un motor de diagrames de flux i una interfície per dissenyar i administrar fluxos consistents en accions i esdeveniments', 0, 'Workflow', '1.1', 1, 'Drak', 'drak@hostnuke.com', 0, 0, 3, 'pndocs/credits.txt', 'pndocs/changelog.txt', 'pndocs/manual.html', 'pndocs/copying.txt', 'a:1:{s:10:"Workflow::";s:2:"::";}', 0, 0, 'workflow'),
(7, 'Mailer', 3, 'Enviament de correu electrònic', 'Proporciona la funcionalitat d''enviament de correu electrònic i una interfície per configurar-lo', 0, 'Mailer', '1.3', 1, 'Mark West', 'http://www.markwest.me.uk/', 1, 0, 3, 'pndocs/credits.txt', 'pndocs/changelog.txt', 'pndocs/help.txt', 'pndocs/license.txt', 'a:1:{s:8:"Mailer::";s:2:"::";}', 0, 0, 'mailer'),
(8, 'SecurityCenter', 3, 'Centre de seguretat', 'Proporciona les funcionalitats de gestió de la seguretat. Registra els intents de hacking i esdeveniments similars i incorpora una interfície gestionar la seguretat.', 0, 'SecurityCenter', '1.3', 1, 'Mark West', 'http://www.markwest.me.uk', 1, 0, 3, 'pndocs/credits.txt', 'pndocs/changelog.txt', 'pndocs/help.txt', 'pndocs/license.txt', 'a:1:{s:16:"SecurityCenter::";s:16:"hackid::hacktime";}', 0, 0, 'centreseguretat'),
(9, 'Header_Footer', 3, 'Gestor de la capçalera i el peu de pàgina', 'Proporciona els fragments de la capçalera i el peu dels entorns visuals heretats i d''altres entorns visuals que no són Xanthia', 0, 'Header_Footer', '1.1', 1, 'Mark West', 'http://www.markwest.me.uk/', 0, 1, 3, 'pndocs/credits.txt', 'pndocs/changelog.txt', 'pndocs/help.txt', 'pndocs/license.txt', 'a:0:{}', 0, 0, 'headerfooter'),
(10, 'Search', 3, 'Motor de cerca del lloc', 'Proporciona un motor de cerca a dins del lloc i una interfície per gestionar els paràmetres de cerca', 0, 'Search', '1.5', 1, 'Patrick Kellum', 'http://www.ctarl-ctarl.com', 1, 1, 3, 'pndocs/credits.txt', 'pndocs/changelog.txt', 'pndocs/install.txt', 'pndocs/license.txt', 'a:1:{s:8:"Search::";s:13:"Module name::";}', 0, 0, 'search'),
(11, 'Theme', 3, 'Gestor d''entorns visuals', 'Proporciona un sistema de plantilles i una interfície per gestionar-les i controlar l''estètica del lloc web', 0, 'Theme', '3.3', 1, 'Mark West', 'http://www.markwest.me.uk/', 1, 1, 3, 'pndocs/credits.txt', 'pndocs/changelog.txt', 'pndocs/help.txt', 'pndocs/license.txt', 'a:1:{s:7:"Theme::";s:12:"Theme name::";}', 0, 0, 'theme'),
(12, 'Users', 3, 'Gestor d''usuaris', 'Proporciona una interfície per configurar i administrar els comptes dels usuaris. Incorpora totes les funcionalitats necessàries, però pot treballar estretament amb el mòdul de perfil.', 0, 'Users', '1.13', 1, 'Xiaoyu Huang, Drak', 'class007@sina.com, drak@zikula.org', 1, 1, 3, 'pndocs/credits.txt', 'pndocs/changelog.txt', 'pndocs/help.txt', 'pndocs/license.txt', 'a:2:{s:7:"Users::";s:14:"Uname::User ID";s:16:"Users::MailUsers";s:2:"::";}', 0, 0, 'users'),
(13, 'pnForm', 3, 'Gestor dels formularis', 'Proporciona un entorn per a la presentació estàndard de formularis', 0, 'pnForm', '1.1', 1, 'The Zikula development team', 'http://www.zikula.org/', 0, 0, 3, 'pndocs/credits.txt', 'pndocs/changelog.txt', 'pndocs/help.txt', 'pndocs/license.txt', 'a:1:{s:10:"pnRender::";s:2:"::";}', 0, 0, 'pnforms'),
(15, 'ObjectData', 3, 'Gestor d''objectes de dades', 'Proporciona un entorn per treballar amb objectes de dades que pot ser utilitzat per altres mòduls', 0, 'ObjectData', '1.03', 0, 'Robert Gasch', 'rgasch@gmail.com', 0, 0, 3, 'docs/credits.txt', 'docs/changelog.txt', 'docs/help.txt', 'docs/license.txt', 'a:1:{s:12:"ObjectData::";s:2:"::";}', 0, 0, 'objectdata'),
(16, 'Settings', 3, 'Gestor dels paràmetres generals', 'Proporciona una interfície des d''on gestionar els paràmetres generals del lloc web', 0, 'Settings', '2.9.1', 1, 'Simon Wunderlin', '', 1, 0, 3, 'pndocs/credits.txt', 'pndocs/changelog.txt', 'pndocs/help.txt', 'pndocs/license.txt', 'a:1:{s:10:"Settings::";s:2:"::";}', 0, 0, 'settings'),
(17, 'AuthPN', 3, 'Gestor d''autentificació', 'Proporciona la capacitat d''utilitzar mòduls de validació que no formen part del nucli', 0, 'AuthPN', '1.1', 1, 'Mark West', 'http://www.markwest.me.uk/', 1, 0, 1, 'pndocs/credits.txt', 'pndocs/changelog.txt', 'pndocs/help.txt', 'pndocs/license.txt', 'a:0:{}', 0, 0, 'authpn'),
(19, 'Admin', 3, 'Gestor del tauler d''administració', 'Proporciona el tauler d''administració i la capacitat de gestionar-lo', 0, 'Admin', '1.8', 1, 'Mark West', 'http://www.markwest.me.uk/', 1, 0, 3, 'pndocs/credits.txt', 'pndocs/changelog.txt', 'pndocs/help.txt', 'pndocs/license.txt', 'a:1:{s:7:"Admin::";s:38:"Admin Category name::Admin Category ID";}', 0, 0, 'adminpanel'),
(20, 'PageLock', 3, 'Gestor del bloqueig de pàgines', 'Proporciona la capacitat de bloquejar pàgines quan s''estan utilitzant', 0, 'PageLock', '1.1', 1, 'Jorn Wildt', 'http://www.elfisk.dk', 0, 0, 3, 'pndocs/credits.txt', 'pndocs/changelog.txt', 'pndocs/install.txt', 'pndocs/license.txt', 'a:1:{s:10:"PageLock::";s:2:"::";}', 0, 0, 'pagelock'),
(21, 'Categories', 3, 'Gestor de categories', 'Proporciona suport per a l''ús de categories de continguts per a altres mòduls i una interfície per administrar aquestes categories', 0, 'Categories', '1.1', 1, 'Robert Gasch', 'rgasch@gmail.com', 1, 1, 3, 'pndocs/credits.txt', 'pndocs/changelog.txt', 'pndocs/help.txt', 'pndocs/license.txt', 'a:1:{s:20:"Categories::Category";s:40:"Category ID:Category Path:Category IPath";}', 0, 0, 'categories'),
(22, 'legal', 2, 'Gestor de la informació legal', 'Proporciona una interfície per gestionar els termes d''ús, la política de privacitat i la declaració d''accessibilitat.', 0, 'legal', '1.3', 1, 'Michael M. Wechsler', 'michael@thelaw.com', 1, 1, 3, 'pndocs/credits.txt', 'pndocs/changelog.txt', 'pndocs/install.txt', 'pndocs/license.txt', 'a:4:{s:7:"legal::";s:2:"::";s:17:"legal::termsofuse";s:2:"::";s:14:"legal::privacy";s:2:"::";s:29:"legal::accessibilitystatement";s:2:"::";}', 0, 0, 'legalmod'),
(23, 'Groups', 3, 'Gestor de grups', 'Proporciona les funcionalitats de grups d''usuaris i una interfície per gestionar-los', 0, 'Groups', '2.3', 1, 'Mark West, Franky Chestnut, Michael Halbook', 'http://www.markwest.me.uk/, http://dev.pnconcept.com, http://www.halbrooktech.com', 1, 1, 3, 'pndocs/credits.txt', 'pndocs/changelog.txt', 'pndocs/help.txt', 'pndocs/license.txt', 'a:1:{s:8:"Groups::";s:10:"Group ID::";}', 0, 0, 'gestorgrups'),
(24, 'Admin_Messages', 3, 'Gestor dels missatges d''administració', 'Proporciona un mitjà per publicar avisos especials dels administradors del lloc', 0, 'Admin_Messages', '2.2', 1, 'Mark West', 'http://www.markwest.me.uk', 1, 0, 3, 'pndocs/credits.txt', 'pndocs/changelog.txt', 'pndocs/help.txt', 'pndocs/license.txt', 'a:1:{s:16:"Admin_Messages::";s:25:"message title::message id";}', 0, 0, 'adminmessages'),
(26, 'Referers', 2, 'Orígens de les visites', 'Mostra les estadístiques dels orígens de les visites', 0, 'Referers', '2.1', 1, 'The Zikula Development Team', 'http://www.zikula.org/', 1, 0, 3, 'pndocs/credits.txt', '', '', '', 'a:1:{s:10:"Referers::";s:2:"::";}', 0, 0, 'HTTP_Referers'),
(27, 'News', 2, 'Notícies publicades', 'Proporciona un sistema d''addició, edició, esborrament i administració de notícies.', 0, 'News', '2.5.2', 1, 'Mark West, Mateo Tibaquira, Erik Spaan', 'http://code.zikula.org/news', 1, 1, 3, 'pndocs/credits.txt', 'pndocs/changelog.txt', 'pndocs/install.txt', 'pndocs/license.txt', 'a:1:{s:6:"News::";s:26:"Contributor ID::Article ID";}', 0, 0, 'news'),
(31, 'AuthLDAP', 2, 'AuthLDAP', 'Autentificació LDAP', 0, 'AuthLDAP', '1.0', 1, 'Mike Goldfinger', 'MikeGoldfinger@linuxmail.org', 1, 0, 1, 'pndocs/credits.txt', 'pndocs/changelog.txt', 'pndocs/help.txt', 'pndocs/license.txt', 'a:0:{}', 0, 0, 'authldap'),
(39, 'Sniffer', 2, 'Detector', 'Detecció del navegador i informació del navegador.', 0, 'Sniffer', '1.2', 1, 'Mark West', 'http://www.zikula.org/', 1, 0, 3, 'pndocs/credits.txt', 'pndocs/CHANGES', '', 'pndocs/LICENSE', 'a:1:{s:9:"Sniffer::";s:2:"::";}', 0, 0, 'sniffer'),
(41, 'Feeds', 2, 'Fonts', 'Lector de fonts de notícies.', 0, 'Feeds', '2.5', 1, 'Mark West', 'http://www.markwest.me.uk/', 1, 1, 3, 'pndocs/credits.txt', 'pndocs/changelog.txt', 'pndocs/help.txt', 'pndocs/license.txt', 'a:1:{s:11:"Feeds::Item";s:28:"Feed item name::Feed item ID";}', 0, 0, 'feeds'),
(43, 'Ephemerids', 2, 'Efemèrides ', 'Proporciona un bloc que mostra un byte d''informació (esdeveniments històrics, cita del dia, etc.) relacionada amb la data actual. Es renova diàriament i incorpora una interfície per tal d''afegir, editar i mantenir efemèrides.', 0, 'Ephemerids', '1.7', 1, 'Mark West', 'http://www.markwest.me.uk', 1, 0, 1, '', '', '', '', 'a:1:{s:12:"Ephemerids::";s:14:"::Ephemerid ID";}', 0, 0, 'ephemerids'),
(45, 'Thumbnail', 2, 'Thumbnail', 'Provides thumbnail generation facilities via userapi functions.', 0, 'Thumbnail', '1.2.1', 0, 'Robert Gasch', 'rgasch@gmail.com', 1, 1, 1, 'pndocs/credits.txt', 'pndocs/changelog.txt', 'pndocs/help.txt', 'pndocs/license.txt', 'a:1:{s:11:"Thumbnail::";s:2:"::";}', 0, 0, 'thumbnail'),
(46, 'Quotes', 2, 'Citacions', 'Mostra citacions aleatòries', 0, 'Quotes', '2.3', 1, 'The Zikula Development Team', 'http://www.zikula.org', 1, 0, 3, 'pndocs/credits.txt', '', '', '', 'a:1:{s:8:"Quotes::";s:21:"Author name::Quote ID";}', 0, 0, 'quotes'),
(49, 'iw_main', 2, 'Intraweb', 'Funcionalitats base utilitzades per la resta de mòduls IW', 0, 'iw_main', '2.0', 0, 'Albert Pérez Monfort & Robert Barrera', 'aperezm@xtec.cat', 1, 1, 3, 'pndocs/credits.txt', 'pndocs/changelog.txt', 'pndocs/help.txt', 'pndocs/license.txt', 'a:1:{s:9:"iw_main::";s:2:"::";}', 0, 0, 'iw_main'),
(50, 'iw_qv', 2, 'Quaderns Virtuals', 'Permet assignar quaderns d''exercicis als usuaris designats', 0, 'iw_qv', '2.0', 0, 'Sara Arjona Téllez', 'sarjona@xtec.cat', 1, 1, 3, 'pndocs/credits.txt', 'pndocs/changelog.txt', 'pndocs/help.txt', 'pndocs/license.txt', 'a:1:{s:7:"iw_qv::";s:2:"::";}', 0, 0, 'iw_qv'),
(51, 'iw_agendas', 2, 'Agendes', 'Permet crear i fer ús d''agendes compartides', 0, 'iw_agendas', '2.0', 0, 'Toni Ginard Lladó i Albert Pérez Monfort', 'aginard @xtec.cat i aperezm@xtec.es', 1, 1, 3, 'pndocs/credits.txt', 'pndocs/changelog.txt', 'pndocs/help.txt', 'pndocs/license.txt', 'a:1:{s:12:"iw_agendas::";s:2:"::";}', 0, 0, 'iw_agendas'),
(53, 'iw_books', 2, 'Books', 'Llibres de text, lectures i materials', 0, 'iw_books', '2.0', 0, 'Jordi Fons', 'jfons@iespfq.cat', 1, 1, 3, 'docs/credits.txt', 'docs/canvis.txt', 'docs/help.txt', 'docs/license.txt', 'a:1:{s:14:"iw_books::Item";s:36:"iw_books item name::iw_books item ID";}', 0, 0, 'Books'),
(54, 'iw_forums', 2, 'IWForums', 'Creació, gestió i ús de fòrums', 0, 'iw_forums', '2.0', 0, 'Albert Pérez Monfort i Toni Ginard Lladó', 'aperez16@xtec.cat, aginard@xtec.cat', 1, 1, 3, 'pndocs/credits.txt', 'pndocs/changelog.txt', 'pndocs/help.txt', 'pndocs/license.txt', 'a:1:{s:11:"iw_forums::";s:2:"::";}', 0, 0, 'iw_forums'),
(56, 'iw_messages', 2, 'IWMissatges', 'Permet enviar missatges privats entre els usuaris', 0, 'iw_messages', '2.0', 0, 'Richard Tirtadji & Albert Pérez Monfort', 'rtirtadji@hotmail.com & aperezm@xtec.es', 1, 1, 3, 'pndocs/credits.txt', 'pndocs/changelog.txt', 'pndocs/help.txt', 'pndocs/license.txt', 'a:1:{s:13:"iw_messages::";s:2:"::";}', 0, 0, 'iw_messages'),
(57, 'iw_noteboard', 2, 'Tauler', 'Permet enviar informacions als usuaris designats', 0, 'iw_noteboard', '2.0', 0, 'Albert Pérez Monfort', 'aperezm@xtec.es', 1, 1, 3, 'pndocs/credits.txt', 'pndocs/changelog.txt', 'pndocs/help.txt', 'pndocs/license.txt', 'a:1:{s:14:"iw_noteboard::";s:2:"::";}', 0, 0, 'iw_noteboard'),
(58, 'iw_timeFrames', 2, 'Marcs horaris', 'Permet definir marcs horaris.', 0, 'iw_timeFrames', '2.0', 0, 'Albert Pérez Monfort & Josep Ferràndiz Farré', 'aperezm@xtec.cat / jferran6@xtec.cat', 1, 0, 3, 'pndocs/credits.txt', 'pndocs/changelog.txt', 'pndocs/help.txt', 'pndocs/license.txt', 'a:1:{s:15:"iw_TimeFrames::";s:2:"::";}', 0, 0, 'iw_timeFrames'),
(59, 'iw_users', 2, 'Usuaris Extra', 'Millora les possibilitats del mòdul d''usuaris', 0, 'iw_users', '2.0', 0, 'Albert Pérez Monfort', 'aperezm@xtec.cat', 1, 1, 3, 'pndocs/credits.txt', 'pndocs/changelog.txt', 'pndocs/help.txt', 'pndocs/license.txt', 'a:1:{s:10:"iw_users::";s:2:"::";}', 0, 0, 'iw_users'),
(60, 'iw_webbox', 2, 'Webbox', 'Carrega pàgines web externes dins del lloc web', 0, 'iw_webbox', '2.0', 0, 'Albert Pérez Monfort (intraweb@xtec.cat)', 'http://phobos.xtec.cat/intraweb', 1, 1, 3, 'pndocs/credits.txt', 'pndocs/changelog.txt', 'pndocs/help.txt', 'pndocs/license.txt', 'a:1:{s:11:"iw_webbox::";s:2:"::";}', 0, 0, 'iw_webbox'),
(61, 'iw_vhmenu', 2, 'VHMenú', 'Proporciona una interfície per administrar un menú Javascript completament personalitzable', 0, 'iw_vhmenu', '2.0', 0, 'Albert Pérez Monfort & Toni Ginard Lladó', 'aperez16@xtec.cat & aginard@xtec.cat', 1, 1, 3, 'pndocs/credits.txt', 'pndocs/changelog.txt', 'pndocs/help.txt', 'pndocs/license.txt', 'a:1:{s:11:"iw_vhmenu::";s:2:"::";}', 0, 0, 'iw_vhmenu'),
(66, 'iw_groups', 2, 'IW Grups', 'Permet crear, modificar i eliminar els grups pels usuaris', 0, 'iw_groups', '2.0', 0, 'Albert Pérez Monfort', 'aperezm@xtec.cat', 1, 0, 3, 'pndocs/credits.txt', 'pndocs/changelog.txt', 'pndocs/help.txt', 'pndocs/license.txt', 'a:1:{s:11:"iw_groups::";s:2:"::";}', 0, 0, 'iw_groups'),
(70, 'iw_bookings', 2, 'Reserves', 'Permet definir espais i equipaments per reservar', 0, 'iw_bookings', '2.0', 0, 'Albert Pérez Monfort & Josep Ferràndiz Farré', 'aperezm@xtec.cat / jferran6@xtec.cat', 1, 1, 3, 'pndocs/credits.txt', 'pndocs/changelog.txt', 'pndocs/help.txt', 'pndocs/license.txt', 'a:1:{s:13:"iw_bookings::";s:2:"::";}', 0, 0, 'iw_bookings'),
(71, 'Downloads', 2, 'Downloads', 'Zikula File Management', 0, 'Downloads', '2.4', 1, 'Sascha Jost', 'http://www.cmods-dev.de', 1, 1, 3, 'pndocs/credits.txt', 'pndocs/changelog.txt', 'pndocs/install.txt', 'pndocs/license.txt', 'a:5:{s:11:"Downloads::";s:2:"::";s:19:"Downloads::Category";s:12:"CategoryID::";s:14:"Downloads::Add";s:2:"::";s:17:"Downloads::Modify";s:4:"ID::";s:15:"Downloads::Item";s:4:"ID::";}', 0, 0, 'Downloads'),
(72, 'scribite', 2, 'scribite!', 'WYSIWYG for Zikula', 0, 'scribite', '4.1', 0, 'sven schomacker aka hilope', 'http://code.zikula.org/scribite/', 1, 1, 3, 'pndocs/credits.txt', 'pndocs/changelog.txt', 'pndocs/scribite!-documentation-eng.pdf', 'pndocs/license.txt', 'a:1:{s:10:"scribite::";s:12:"Modulename::";}', 0, 0, 'scribite'),
(75, 'Pages', 2, 'Pàgines estàtiques', 'Permet gestionar pàgines estàtiques.', 0, 'Pages', '2.4.1', 1, 'The Zikula Development Team', 'http://www.zikula.org/', 1, 1, 3, 'pndocs/credits.txt', 'pndocs/changelog.txt', 'pndocs/install.txt', 'pndocs/license.txt', 'a:2:{s:7:"Pages::";s:18:"Page name::Page ID";s:15:"Pages:category:";s:13:"Category ID::";}', 0, 0, 'pagines'),
(78, 'bbcode', 2, 'Lligam BBCode', 'El BBCode és un lligam de transformació que converteix les etiquetes BBCode en codi HTML', 164, 'bbcode', '2.1', 0, 'BBCode Team', 'http://code.zikula.org/bbcode', 1, 1, 3, 'pndocs/credits.txt', 'pndocs/changelog.txt', 'pndocs/help.txt', 'pndocs/license.txt', 'a:2:{s:23:"bbcode:Modulename:Links";s:2:"::";s:24:"bbcode:Modulename:Emails";s:2:"::";}', 0, 0, 'bbcode'),
(81, 'content', 2, 'Edició de continguts', 'Mòdul de creació de continguts.', 0, 'content', '3.1.0', 0, 'Jorn Wildt', 'http://www.elfisk.dk/', 1, 1, 3, 'pndocs/readme.txt', 'pndocs/changelog.txt', 'pndocs/readme.txt', 'pndocs/license.txt', 'a:4:{s:9:"content::";s:2:"::";s:22:"content:plugins:layout";s:13:"Layout name::";s:23:"content:plugins:content";s:19:"content type name::";s:13:"content:page:";s:2:"::";}', 0, 0, 'contingut'),
(82, 'Ratings', 2, 'Valoracions', 'Valoració d''elements en Zikula.', 0, 'Ratings', '2.2', 1, 'Jim McDonald', 'http://www.mcdee.net/', 1, 1, 1, 'pndocs/credits.txt', 'pndocs/changelog.txt', 'pndocs/help.txt', 'pndocs/license.txt', 'a:1:{s:9:"Ratings::";s:31:"Module name:Rating type:Item ID";}', 0, 0, 'valoracions'),
(83, 'Recommend_Us', 2, 'Recomana''ns', 'Recomana el lloc web/Mòdul d''enviament d''articles.', 0, 'Recommend_Us', '1.2', 1, 'Mark West', 'http://www.markwest.me.uk/', 0, 1, 1, 'pndocs/credits.txt', '', '', '', 'a:1:{s:14:"Recommend us::";s:2:"::";}', 0, 0, 'recomana_ns'),
(84, 'Reviews', 2, 'Sistema d''anàlisi', 'Mòdul d''anàlisis', 0, 'Reviews', '2.4', 1, 'Mark West', 'http://www.markwest.me.uk/', 1, 1, 1, 'pndocs/credits.txt', 'pndocs/changelog.txt', 'pndocs/install.txt', 'pndocs/license.txt', 'a:1:{s:9:"Reviews::";s:22:"Review name::Review ID";}', 0, 0, 'anàlisis'),
(88, 'iw_moodle', 2, 'Moodle', 'Incorpora la validació única entre el Moodle i el Zikula i permet fer inscripcions als cursos', 0, 'iw_moodle', '2.0', 0, 'Albert Pérez Monfort', 'aperezm@xtec.cat', 1, 1, 3, '', '', 'pndocs/readme.txt', 'pndocs/license.txt', 'a:1:{s:11:"iw_moodle::";s:2:"::";}', 0, 0, 'iw_moodle'),
(89, 'iw_forms', 2, 'IWForms', 'Crea formularis a mida per a funcionalitats diverses', 0, 'iw_forms', '2.0', 0, 'Albert Pérez Monfort', 'aperezm@xtec.cats', 1, 1, 3, 'pndocs/credits.txt', 'pndocs/changelog.txt', 'pndocs/help.txt', 'pndocs/license.txt', 'a:1:{s:10:"iw_forms::";s:2:"::";}', 0, 0, 'iw_forms'),
(91, 'PendingContent', 2, 'Contingut en espera', 'Mostra contingut pendent d''aprovació', 0, 'PendingContent', '1.1', 1, 'PendingContent Development Team', 'http://code.zikula.org/pendingcontent/', 1, 0, 1, 'pndocs/credits.txt', 'pndocs/changelog.txt', 'pndocs/help.txt', 'pndocs/license.txt', 'a:1:{s:16:"pendingcontent::";s:2:"::";}', 0, 0, 'contingut en espera'),
(92, 'bbsmile', 2, 'Lligam de BBSmile', 'Lligam amb les emoticones', 163, 'bbsmile', '2.2', 0, 'Frank Schummertz, Dizkus team', 'http://code.zikula.org/bbsmile', 1, 1, 3, 'pndocs/credits.txt', 'pndocs/changelog.txt', 'pndocs/help.txt', 'pndocs/license.txt', 'a:1:{s:9:"bbsmile::";s:2:"::";}', 0, 0, 'bbsmile'),
(93, 'iw_myrole', 2, 'myRole', 'Permet als usuaris registrats canviar de grup en qualsevol moment', 0, 'iw_myrole', '2.0', 0, 'Albert Pérez Monfort & Josep Ferràndiz Farré', 'aperezm@xtec.es & jferran6@xtec.cat', 1, 0, 3, 'pndocs/credits.txt', 'pndocs/changelog.txt', 'pndocs/help.txt', 'pndocs/license.txt', 'a:1:{s:11:"iw_myrole::";s:2:"::";}', 0, 0, 'iw_myrole'),
(94, 'iw_jclic', 2, 'JClic', 'Permet assignar activitats JClic als usuaris designats', 0, 'iw_jclic', '2.0', 0, 'Albert Pérez Monfort', 'aperezm@xtec.es', 1, 1, 3, 'pndocs/credits.txt', 'pndocs/changelog.txt', 'pndocs/help.txt', 'pndocs/license.txt', 'a:1:{s:10:"iw_jclic::";s:2:"::";}', 0, 0, 'iw_jclic'),
(95, 'dpCaptcha', 2, 'Captcha', 'Hook para añadir validaciones por caracteres', 0, 'dpCaptcha', '1.0', 0, 'Germán Zelaya (MrGer)', 'http://www.dev-postnuke.com', 0, 1, 3, 'docs/credits.txt', 'docs/changelog.txt', 'docs/help.txt', 'docs/license.txt', 'a:1:{s:9:"Captcha::";s:27:"module name:objectid:com id";}', 0, 0, 'Captcha'),
(100, 'FAQ', 2, 'PMF', 'Preguntes Més Freqüents', 0, 'FAQ', '2.3.1', 1, 'Mark West', 'http://www.markwest.me.uk/', 1, 1, 1, 'pndocs/credits.txt', 'pndocs/changelog.txt', 'pndocs/help.txt', 'pndocs/license.txt', 'a:1:{s:5:"FAQ::";s:8:"FAQ ID::";}', 0, 0, 'pmf'),
(103, 'MyMap', 2, 'MyMap', 'Geographical maps with routes and markers for everybody', 0, 'MyMap', '1.6', 0, 'Florian Schiessl', 'http://www.ifs-net.de/', 1, 1, 1, 'pndocs/credits.txt', 'pndocs/changelog.txt', 'pndocs/help.txt', 'pndocs/license.txt', 'a:1:{s:7:"MyMap::";s:8:"Map_ID::";}', 0, 0, 'MyMap'),
(104, 'formicula', 2, 'Formicula', 'Eina per crear diferents tipus de formularis de contacte', 0, 'formicula', '2.2', 0, 'Frank Schummertz', 'frank@zikula.org', 1, 1, 3, 'pndocs/credits.txt', 'pndocs/changelog.txt', 'pndocs/eng/manual.htm', 'pndocs/license.txt', 'a:1:{s:11:"formicula::";s:19:"form_id:contact_id:";}', 0, 0, 'formicula'),
(105, 'EZComments', 2, 'Comentaris', 'Permet adjuntar comentaris a tota mena de continguts', 0, 'EZComments', '2.0.0', 0, 'The EZComments Development Team', 'http://code.zikula.org/ezcomments/', 1, 1, 1, 'pndocs/credits.txt', 'pndocs/changelog.txt', 'pndocs/install.txt', 'pndocs/license.txt', 'a:3:{s:12:"EZComments::";s:25:"Module:Item ID:Comment ID";s:21:"EZComments::trackback";s:15:"Module:Item ID:";s:20:"EZComments::pingback";s:15:"Module:Item ID:";}', 0, 0, 'comentaris'),
(106, 'Profile', 2, 'Gestor de perfils', 'Proporciona una interfície per a que els usuaris gestionin la seva informació personal i una altra per a que els administradors configurin les dades del perfil que es mostren. Està lligat al mòdul d''usuaris.', 0, 'Profile', '1.5.2', 1, 'Mateo Tibaquirá, Mark West, Franky Chestnut', 'http://nestormateo.com/, http://www.markwest.me.uk/, http://dev.pnconcept.com/', 1, 1, 3, 'pndocs/credits.txt', 'pndocs/changelog.txt', 'pndocs/help.txt', 'pndocs/license.txt', 'a:5:{s:9:"Profile::";s:2:"::";s:13:"Profile::item";s:56:"DynamicUserData PropertyName::DynamicUserData PropertyID";s:16:"Profile:Members:";s:2:"::";s:22:"Profile:Members:recent";s:2:"::";s:22:"Profile:Members:online";s:2:"::";}', 1, 0, 'perfil'),
(107, 'Web_Links', 2, 'Weblinks', 'Web Links Module', 0, 'Web_Links', '2.0', 0, 'Petzi-Juist', 'http://www.petzi-juist.de/', 1, 1, 1, 'pndocs/credits.txt', 'pndocs/changelog.txt', 'pndocs/install.txt', 'pndocs/license.txt', 'a:2:{s:19:"Web_Links::Category";s:26:"Category name::Category ID";s:15:"Web_Links::Link";s:31:"Category name:Link name:Link ID";}', 0, 0, 'Web_Links'),
(108, 'Files', 2, 'Gestor de fitxers', 'Gestor de fitxers per al Zikula', 0, 'Files', '1.2', 0, 'Albert Perez Monfort , Robert Barrera i Fèlix Casanellas', 'aperezm@xtec.cat', 1, 1, 3, 'pndocs/credits.txt', 'pndocs/changelog.txt', 'pndocs/help.txt', 'pndocs/license.txt', 'a:1:{s:7:"Files::";s:2:"::";}', 0, 0, 'fitxers'),
(109, 'advMailer', 2, 'XTEC Advanced Mailer', 'Amplia les funcionalitats del mòdul Mailer per poder enviar correu electrònic utilitzant el servei web de la XTEC', 0, 'advMailer', '1.0.0', 0, 'Francesc Bassas i Bullich', '', 1, 1, 3, 'pndocs/credits.txt', 'pndocs/changelog.txt', 'pndocs/help.txt', 'pndocs/license.txt', 'a:1:{s:11:"advMailer::";s:2:"::";}', 0, 0, 'advmailer'),
(110, 'Export', 2, 'Exporta', 'Permet exportar mòduls de Zikula d''una instal·lació a una altra', 0, 'Export', '0.1', 0, 'Fèlix Casanellas', 'felix.casanellas@gmail.com', 1, 0, 1, 'pndocs/credits.txt', 'pndocs/changelog.txt', 'pndocs/help.txt', 'pndocs/license.txt', 'a:1:{s:12:"iw_agendas::";s:2:"::";}', 0, 0, 'Exporta'),
(111, 'iw_menu', 2, 'Menu', 'Provides an interface to manage fully customizable menu', 0, 'iw_menu', '1.0', 0, 'Albert Pérez Monfort, Toni Ginard Lladó & Pau Ferrer Ocaña', 'aperez16@xtec.cat, aginard@xtec.cat & pferre22@xtec.cat', 1, 1, 1, 'pndocs/credits.txt', 'pndocs/changelog.txt', 'pndocs/help.txt', 'pndocs/license.txt', 'a:1:{s:9:"iw_menu::";s:2:"::";}', 0, 0, 'iw_menu'),
(112, 'iw_chat', 2, 'IWChat', 'Crea una nova sala de xat', 0, 'iw_chat', '0.1', 0, 'Fèlix Casanellas', 'fcasanel@xtec.cat', 1, 1, 1, 'pndocs/credits.txt', 'pndocs/changelog.txt', 'pndocs/help.txt', 'pndocs/license.txt', 'a:1:{s:9:"iw_chat::";s:2:"::";}', 0, 0, 'iw_chat'),
(113, 'IWstats', 2, 'IWstats', 'Display site statistics', 0, 'IWstats', '0.1', 0, '', '', 1, 0, 3, '', '', '', '', 'a:1:{s:9:"IWstats::";s:2:"::";}', 0, 0, 'iwstats');

-- --------------------------------------------------------

--
-- Estructura de la taula `zk_module_deps`
--

CREATE TABLE IF NOT EXISTS `zk_module_deps` (
  `pn_id` int(11) NOT NULL AUTO_INCREMENT,
  `pn_modid` int(11) NOT NULL DEFAULT '0',
  `pn_modname` varchar(64) NOT NULL DEFAULT '',
  `pn_minversion` varchar(10) NOT NULL DEFAULT '',
  `pn_maxversion` varchar(10) NOT NULL DEFAULT '',
  `pn_status` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`pn_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de la taula `zk_module_vars`
--

CREATE TABLE IF NOT EXISTS `zk_module_vars` (
  `pn_id` int(11) NOT NULL AUTO_INCREMENT,
  `pn_modname` varchar(64) NOT NULL DEFAULT '',
  `pn_name` varchar(64) NOT NULL DEFAULT '',
  `pn_value` longtext,
  PRIMARY KEY (`pn_id`),
  KEY `mod_var` (`pn_modname`,`pn_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=689 ;

--
-- Bolcant dades de la taula `zk_module_vars`
--

INSERT INTO `zk_module_vars` (`pn_id`, `pn_modname`, `pn_name`, `pn_value`) VALUES
(1, 'Modules', 'itemsperpage', 'i:25;'),
(2, '/PNConfig', 'loadlegacy', 'b:0;'),
(3, 'Permissions', 'filter', 'i:1;'),
(4, 'Permissions', 'warnbar', 'i:1;'),
(5, 'Permissions', 'rowview', 'i:20;'),
(6, 'Permissions', 'rowedit', 'i:20;'),
(7, 'Permissions', 'lockadmin', 'i:1;'),
(8, 'Permissions', 'adminid', 'i:1;'),
(9, 'Groups', 'itemsperpage', 'i:25;'),
(10, 'Groups', 'defaultgroup', 's:1:"1";'),
(11, 'Groups', 'mailwarning', 'i:0;'),
(12, 'Groups', 'hideclosed', 'i:0;'),
(13, 'Blocks', 'collapseable', 'i:0;'),
(14, 'Users', 'itemsperpage', 's:2:"25";'),
(15, 'Users', 'reg_allowreg', 's:1:"0";'),
(16, 'Users', 'reg_verifyemail', 's:1:"1";'),
(17, 'Users', 'reg_Illegalusername', 's:87:"root adm linux webmaster admin god administrator administrador nobody anonymous anonimo";'),
(18, 'Users', 'reg_Illegaldomains', 's:0:"";'),
(19, 'Users', 'reg_Illegaluseragents', 's:0:"";'),
(20, 'Users', 'reg_noregreasons', 's:43:"El registre d''usuaris nous està desactivat";'),
(21, 'Users', 'reg_uniemail', 's:1:"1";'),
(22, 'Users', 'reg_notifyemail', 's:0:"";'),
(23, 'Users', 'reg_optitems', 's:1:"0";'),
(24, 'Users', 'userimg', 's:11:"images/menu";'),
(25, 'Users', 'minage', 's:1:"0";'),
(26, 'Users', 'minpass', 's:1:"5";'),
(27, 'Users', 'anonymous', 's:9:"Anònim/a";'),
(28, 'Users', 'savelastlogindate', 's:1:"1";'),
(29, 'Users', 'loginviaoption', 's:1:"0";'),
(30, 'Users', 'moderation', 's:1:"0";'),
(31, 'Users', 'hash_method', 's:3:"md5";'),
(32, 'Users', 'login_redirect', 's:1:"1";'),
(33, 'Users', 'reg_question', 's:0:"";'),
(34, 'Users', 'reg_answer', 's:0:"";'),
(38, 'Theme', 'modulesnocache', 's:0:"";'),
(39, 'Theme', 'enablecache', 'b:0;'),
(40, 'Theme', 'compile_check', 'b:1;'),
(41, 'Theme', 'cache_lifetime', 'i:3600;'),
(42, 'Theme', 'force_compile', 'b:0;'),
(43, 'Theme', 'trimwhitespace', 'b:0;'),
(44, 'Theme', 'makelinks', 'b:0;'),
(45, 'Theme', 'maxsizeforlinks', 'i:30;'),
(46, 'Theme', 'itemsperpage', 'i:25;'),
(47, 'Admin', 'modulesperrow', 'i:3;'),
(48, 'Admin', 'itemsperpage', 'i:15;'),
(49, 'Admin', 'defaultcategory', 's:1:"4";'),
(50, 'Admin', 'modulestylesheet', 's:11:"navtabs.css";'),
(51, 'Admin', 'admingraphic', 's:1:"1";'),
(52, 'Admin', 'startcategory', 's:1:"1";'),
(53, 'Admin', 'ignoreinstallercheck', 'b:0;'),
(54, 'Admin', 'admintheme', 's:0:"";'),
(55, '/PNConfig', 'debug', 's:1:"0";'),
(56, '/PNConfig', 'sitename', 's:18:"Intranet de mostra"'),
(58, '/PNConfig', 'slogan', 's:18:"Intranet de mostra"'),
(59, '/PNConfig', 'metakeywords', 's:95:"zikula, comunitat, portal, programari lliure, gestor de continguts, educació, intraweb, Àgora";'),
(61, '/PNConfig', 'startdate', 's:7:"10/2011"'),
(62, '/PNConfig', 'adminmail', 's:15:"centre@xtec.cat"'),
(63, '/PNConfig', 'Default_Theme', 's:7:"iw_xtec";'),
(64, '/PNConfig', 'anonymous', 's:9:"Anònim/a";'),
(65, '/PNConfig', 'timezone_offset', 's:1:"1";'),
(66, '/PNConfig', 'timezone_server', 's:1:"1";'),
(67, '/PNConfig', 'funtext', 's:1:"1";'),
(68, '/PNConfig', 'reportlevel', 's:1:"0";'),
(69, '/PNConfig', 'startpage', 's:4:"News";'),
(72, '/PNConfig', 'seclevel', 's:4:"High";'),
(73, '/PNConfig', 'secmeddays', 's:1:"7";'),
(74, '/PNConfig', 'secinactivemins', 's:2:"40";'),
(75, '/PNConfig', 'Version_Num', 's:5:"1.2.8";'),
(76, '/PNConfig', 'Version_ID', 's:6:"Zikula";'),
(77, '/PNConfig', 'Version_Sub', 's:6:"forest";'),
(78, '/PNConfig', 'debug_sql', 's:1:"0";'),
(79, '/PNConfig', 'language', 's:3:"cat";'),
(80, '/PNConfig', 'locale', 's:5:"ca_ES";'),
(81, '/PNConfig', 'multilingual', 's:1:"1";'),
(82, '/PNConfig', 'useflags', 's:1:"0";'),
(83, '/PNConfig', 'AllowableHTML', 'a:83:{s:3:"!--";s:1:"2";s:1:"a";s:1:"2";s:4:"abbr";i:0;s:7:"acronym";s:1:"1";s:7:"address";i:0;s:6:"applet";i:0;s:4:"area";i:0;s:1:"b";s:1:"2";s:4:"base";i:0;s:8:"basefont";i:0;s:3:"bdo";i:0;s:3:"big";i:0;s:10:"blockquote";s:1:"2";s:2:"br";s:1:"2";s:6:"button";i:0;s:7:"caption";i:0;s:6:"center";s:1:"2";s:4:"cite";i:0;s:4:"code";i:0;s:3:"col";i:0;s:8:"colgroup";i:0;s:3:"del";i:0;s:3:"dfn";i:0;s:3:"dir";i:0;s:3:"div";s:1:"2";s:2:"dl";i:0;s:2:"dd";i:0;s:2:"dt";i:0;s:2:"em";s:1:"2";s:5:"embed";s:1:"2";s:8:"fieldset";i:0;s:4:"font";s:1:"2";s:4:"form";i:0;s:2:"h1";s:1:"1";s:2:"h2";s:1:"2";s:2:"h3";s:1:"2";s:2:"h4";s:1:"2";s:2:"h5";s:1:"2";s:2:"h6";s:1:"2";s:2:"hr";s:1:"2";s:1:"i";s:1:"2";s:6:"iframe";i:0;s:3:"img";s:1:"2";s:5:"input";i:0;s:3:"ins";i:0;s:3:"kbd";i:0;s:5:"label";i:0;s:6:"legend";i:0;s:2:"li";s:1:"2";s:3:"map";i:0;s:7:"marquee";i:0;s:4:"menu";i:0;s:4:"nobr";i:0;s:6:"object";s:1:"2";s:2:"ol";s:1:"2";s:8:"optgroup";i:0;s:6:"option";i:0;s:1:"p";s:1:"2";s:5:"param";s:1:"2";s:3:"pre";s:1:"2";s:1:"q";i:0;s:1:"s";i:0;s:4:"samp";i:0;s:6:"script";i:0;s:6:"select";i:0;s:5:"small";i:0;s:4:"span";s:1:"2";s:6:"strike";i:0;s:6:"strong";s:1:"2";s:3:"sub";s:1:"1";s:3:"sup";s:1:"1";s:5:"table";s:1:"2";s:5:"tbody";s:1:"2";s:2:"td";s:1:"2";s:8:"textarea";i:0;s:5:"tfoot";s:1:"2";s:2:"th";s:1:"2";s:5:"thead";s:1:"2";s:2:"tr";s:1:"2";s:2:"tt";s:1:"2";s:1:"u";i:0;s:2:"ul";s:1:"2";s:3:"var";i:0;}'),
(84, '/PNConfig', 'theme_change', 's:1:"0";'),
(85, '/PNConfig', 'htmlentities', 's:1:"1";'),
(86, '/PNConfig', 'UseCompression', 's:1:"0";'),
(89, '/PNConfig', 'timezone_info', 'a:38:{i:-12;s:31:"(GMT -12:00 hours) Baker Island";i:-11;s:39:"(GMT -11:00 hours) Midway Island, Samoa";i:-10;s:25:"(GMT -10:00 hours) Hawaii";s:4:"-9.5";s:34:"(GMT -9:30 hours) French Polynesia";i:-9;s:24:"(GMT -9:00 hours) Alaska";i:-8;s:44:"(GMT -8:00 hours) Pacific Time (US & Canada)";i:-7;s:45:"(GMT -7:00 hours) Mountain Time (US & Canada)";i:-6;s:57:"(GMT -6:00 hours) Central Time (US & Canada), Mexico City";i:-5;s:65:"(GMT -5:00 hours) Eastern Time (US & Canada), Bogota, Lima, Quito";i:-4;s:57:"(GMT -4:00 hours) Atlantic Time (Canada), Caracas, La Paz";s:4:"-3.5";s:30:"(GMT -3:30 hours) Newfoundland";i:-3;s:50:"(GMT -3:00 hours) Brazil, Buenos Aires, Georgetown";i:-2;s:30:"(GMT -2:00 hours) Mid-Atlantic";i:-1;s:44:"(GMT -1:00 hours) Azores, Cape Verde Islands";i:0;s:63:"(GMT) Western Europe Time, London, Lisbon, Casablanca, Monrovia";i:1;s:80:"(GMT +1:00 hours) CET (Central Europe Time), Brussels, Copenhagen, Madrid, Paris";i:2;s:70:"(GMT +2:00 hours) EET (Eastern Europe Time), Kaliningrad, South Africa";i:3;s:65:"(GMT +3:00 hours) Baghdad, Kuwait, Riyadh, Moscow, St. Petersburg";s:3:"3.5";s:24:"(GMT +3:30 hours) Tehran";i:4;s:50:"(GMT +4:00 hours) Abu Dhabi, Muscat, Baku, Tbilisi";s:3:"4.5";s:23:"(GMT +4:30 hours) Kabul";i:5;s:60:"(GMT +5:00 hours) Ekaterinburg, Islamabad, Karachi, Tashkent";s:3:"5.5";s:53:"(GMT +5:30 hours) Bombay, Calcutta, Madras, New Delhi";s:4:"5.75";s:27:"(GMT +5:45 hours) Kathmandu";i:6;s:40:"(GMT +6:00 hours) Almaty, Dhaka, Colombo";s:3:"6.5";s:40:"(GMT +6:30 hours) Cocos Islands, Myanmar";i:7;s:41:"(GMT +7:00 hours) Bangkok, Hanoi, Jakarta";i:8;s:81:"(GMT +8:00 hours) Beijing, Perth, Singapore, Hong Kong, Chongqing, Urumqi, Taipei";i:9;s:55:"(GMT +9:00 hours) Tokyo, Seoul, Osaka, Sapporo, Yakutsk";s:3:"9.5";s:34:"(GMT +9:30 hours) Adelaide, Darwin";i:10;s:50:"(GMT +10:00 hours) EAST (East Australian Standard)";s:4:"10.5";s:52:"(GMT +10:30 hours) Lord Howe Island (NSW, Australia)";i:11;s:58:"(GMT +11:00 hours) Magadan, Solomon Islands, New Caledonia";s:4:"11.5";s:33:"(GMT +11:30 hours) Norfolk Island";i:12;s:73:"(GMT +12:00 hours) Auckland, Wellington, Fiji, Kamchatka, Marshall Island";s:5:"12.75";s:34:"(GMT +12:45 hours) Chatham Islands";i:13;s:51:"(GMT +13:00 hours Tonga, Kiribati (Phoenix Islands)";i:14;s:42:"(GMT +14:00 hours) Kiribati (Line Islands)";}'),
(90, '/PNConfig', 'errordisplay', 's:1:"0";'),
(91, '/PNConfig', 'errorlog', 'i:0;'),
(92, '/PNConfig', 'errorlogtype', 'i:0;'),
(93, '/PNConfig', 'errormailto', 's:14:"jo@example.com";'),
(94, '/PNConfig', 'siteoff', 'i:0;'),
(95, '/PNConfig', 'siteoffreason', 's:44:"S''estan duent a terme tasques de manteniment";'),
(96, '/PNConfig', 'starttype', 's:0:"";'),
(97, '/PNConfig', 'startfunc', 's:0:"";'),
(98, '/PNConfig', 'startargs', 's:0:"";'),
(99, '/PNConfig', 'entrypoint', 's:9:"index.php";'),
(100, '/PNConfig', 'secure_domain', 's:0:"";'),
(101, '/PNConfig', 'language_detect', 's:1:"0";'),
(102, '/PNConfig', 'shorturls', 'b:0;'),
(103, '/PNConfig', 'shorturlstype', 's:1:"0";'),
(104, '/PNConfig', 'shorturlsext', 's:4:"html";'),
(105, '/PNConfig', 'shorturlsseparator', 's:1:"-";'),
(106, '/PNConfig', 'shorturlsstripentrypoint', 'b:0;'),
(107, '/PNConfig', 'signcookies', 'i:1;'),
(108, '/PNConfig', 'signingkey', 's:40:"4a895379c6b5a27f4eb949aa0844b8710ff609a3";'),
(109, '/PNConfig', 'sessionipcheck', 'i:0;'),
(110, '/PNConfig', 'keyexpiry', 'i:0;'),
(111, '/PNConfig', 'gc_probability', 'i:100;'),
(112, '/PNConfig', 'anonymoussessions', 'i:1;'),
(113, '/PNConfig', 'sessionstoretofile', 'i:0;'),
(114, '/PNConfig', 'sessionsavepath', 's:0:"";'),
(115, '/PNConfig', 'sessionauthkeyua', 'b:0;'),
(116, '/PNConfig', 'sessionname', 's:6:"ZKSID4"'),
(117, '/PNConfig', 'sessionregenerate', 'b:1;'),
(118, '/PNConfig', 'sessionrandregenerate', 'b:1;'),
(119, '/PNConfig', 'sessionregeneratefreq', 'i:10;'),
(121, 'Admin_Messages', 'itemsperpage', 'i:25;'),
(122, 'Admin_Messages', 'allowsearchinactive', 'b:0;'),
(123, 'SecurityCenter', 'itemsperpage', 's:2:"10";'),
(124, '/PNConfig', 'enableanticracker', 's:1:"1";'),
(125, '/PNConfig', 'emailhackattempt', 's:1:"1";'),
(126, '/PNConfig', 'loghackattempttodb', 's:1:"1";'),
(127, '/PNConfig', 'onlysendsummarybyemail', 's:1:"1";'),
(128, '/PNConfig', 'usehtaccessbans', 'i:1;'),
(129, '/PNConfig', 'filtergetvars', 's:1:"1";'),
(130, '/PNConfig', 'filtercookievars', 's:1:"1";'),
(131, '/PNConfig', 'filterpostvars', 's:1:"1";'),
(132, '/PNConfig', 'filterarrays', 'i:0;'),
(133, '/PNConfig', 'extrapostprotection', 'i:0;'),
(134, '/PNConfig', 'extragetprotection', 'i:0;'),
(135, '/PNConfig', 'checkmultipost', 'i:1;'),
(136, '/PNConfig', 'maxmultipost', 'i:4;'),
(137, '/PNConfig', 'zipcompress', 'i:0;'),
(138, '/PNConfig', 'compresslevel', 'i:9;'),
(139, '/PNConfig', 'cpuloadmonitor', 'i:0;'),
(140, '/PNConfig', 'cpumaxload', 'd:10;'),
(141, '/PNConfig', 'ccisessionpath', 's:0:"";'),
(142, '/PNConfig', 'htaccessfilelocation', 's:9:".htaccess";'),
(143, '/PNConfig', 'nocookiebanthreshold', 'i:10;'),
(144, '/PNConfig', 'nocookiewarningthreshold', 'i:2;'),
(145, '/PNConfig', 'fastaccessbanthreshold', 'i:40;'),
(146, '/PNConfig', 'fastaccesswarnthreshold', 'i:10;'),
(147, '/PNConfig', 'javababble', 'i:0;'),
(148, '/PNConfig', 'javaencrypt', 'i:0;'),
(149, '/PNConfig', 'preservehead', 'i:0;'),
(150, '/PNConfig', 'outputfilter', 's:1:"1";'),
(151, '/PNConfig', 'summarycontent', 's:1179:"Attention site admin of %sitename%.\r\n\r\nOn %date% at %time% the Zikula code has detected that somebody tried to send information to your site that may have been intended as a hack. Do not panic, it may be harmless: maybe this detection was triggered by something you did! Anyway, it was detected and blocked. \r\n\r\nThe suspicious activity was recognized in %filename% on line %linenumber%, and is of the type %type%. \r\n\r\nAdditional information given by the code which detected this: %additionalinfo%.\r\n\r\nBelow you will find a lot of information obtained about this attempt, that may help you to find  what happened and maybe who did it.\r\n\r\n\r\n=====================================\r\nInformation about this user:\r\n=====================================\r\nZikula username:  %username%\r\nRegistered email of this Zikula user: %useremail%\r\nRegistered real name of this Zikula user: %userrealname%\r\nIP numbers: (note: when you are dealing with a real cracker these IP numbers might not be from the actual computer he is working on)\r\n\r\nIP according to HTTP_CLIENT_IP: %httpclientip%\r\nIP according to REMOTE_ADDR: %remoteaddr%\r\nIP according to GetHostByName($REMOTE_ADDR): %gethostbyremoteaddr%";'),
(152, '/PNConfig', 'fullcontent', 's:1363:"=====================================\r\nInformation in the $_REQUEST array\r\n=====================================\r\n%requestarray%\r\n\r\n=====================================\r\nInformation in the $_GET array\r\nThis is about variables that may have been in the URL string or in a ''GET'' type form.\r\n=====================================\r\n%getarray%\r\n\r\n=====================================\r\nInformation in the $_POST array\r\nThis is about visible and invisible form elements.\r\n=====================================\r\n%postarray%\r\n\r\n=====================================\r\nBrowser information\r\n=====================================\r\n%browserinfo%\r\n\r\n=====================================\r\nInformation in the $_SERVER array\r\n=====================================\r\n%serverarray%\r\n\r\n=====================================\r\nInformation in the $_ENV array\r\n=====================================\r\n%envarray%\r\n\r\n=====================================\r\nInformation in the $_COOKIE array\r\n=====================================\r\n%cookiearray%\r\n\r\n=====================================\r\nInformation in the $_FILES array\r\n=====================================\r\n%filearray%\r\n\r\n=====================================\r\nInformation in the $_SESSION array\r\nThis is session info. The variables\r\nstarting with PNSV are Zikula Session Variables.\r\n=====================================\r\n%sessionarray%";'),
(153, 'Categories', 'userrootcat', 's:17:"/__SYSTEM__/Users";'),
(154, 'Categories', 'allowusercatedit', 'i:0;'),
(155, 'Categories', 'autocreateusercat', 'i:0;'),
(156, 'Categories', 'autocreateuserdefaultcat', 'i:0;'),
(157, 'Categories', 'userdefaultcatname', 's:6:"Global";'),
(158, 'legal', 'termsofuse', 'b:1;'),
(159, 'legal', 'privacypolicy', 'b:1;'),
(160, 'legal', 'accessibilitystatement', 'b:1;'),
(161, 'Mailer', 'mailertype', 'i:4;'),
(162, 'Mailer', 'charset', 's:5:"utf-8";'),
(163, 'Mailer', 'encoding', 's:4:"8bit";'),
(164, 'Mailer', 'html', 'b:0;'),
(165, 'Mailer', 'wordwrap', 'i:50;'),
(166, 'Mailer', 'msmailheaders', 'b:0;'),
(167, 'Mailer', 'sendmailpath', 's:18:"/usr/sbin/sendmail";'),
(168, 'Mailer', 'smtpauth', 'b:1;'),
(169, 'Mailer', 'smtpserver', 's:20:"ssl://smtp.gmail.com";'),
(170, 'Mailer', 'smtpport', 'i:465;'),
(171, 'Mailer', 'smtptimeout', 'i:10;'),
(172, 'Mailer', 'smtpusername', 's:17:"a8xxxxxx@xtec.cat";'),
(173, 'Mailer', 'smtppassword', 's:0:"";'),
(174, 'pnRender', 'compile_check', 'b:1;'),
(175, 'pnRender', 'force_compile', 'b:0;'),
(176, 'pnRender', 'cache', 'b:0;'),
(177, 'pnRender', 'expose_template', 'b:0;'),
(178, 'pnRender', 'lifetime', 'i:3600;'),
(179, 'Search', 'itemsperpage', 'i:10;'),
(180, 'Search', 'limitsummary', 'i:255;'),
(181, '/PNConfig', 'log_last_rotate', 'i:1318343775;'),
(185, 'iw_main', 'url', 's:31:"http://phobos.xtec.cat/intraweb";'),
(186, 'iw_main', 'email', 's:17:"intraweb@xtec.cat";'),
(187, 'iw_main', 'documentRoot', 's:31:"/srv/www/agora/zkdata/usu4/data"'),
(188, 'iw_main', 'extensions', 's:39:"odt|ods|odp|zip|pdf|doc|jpg|gif|txt|png";'),
(189, 'iw_main', 'maxsize', 's:7:"1000000";'),
(190, 'iw_main', 'usersvarslife', 's:2:"60";'),
(191, 'iw_main', 'usersPictureFolder', 's:5:"fotos";'),
(192, 'iw_main', 'tempFolder', 's:4:"temp";'),
(193, 'iw_agendas', 'inicicurs', 's:4:"2011";'),
(194, 'iw_agendas', 'calendariescolar', 's:1:"1";'),
(195, 'iw_agendas', 'comentaris', 's:0:"";'),
(196, 'iw_agendas', 'festiussempre', 's:239:"$$0101|Cap d''any$$0601|Reis$$0105|Festa del treball$$2406|Sant Joan$$1508|Mare de Déu d''Agost$$1109|Diada de Catalunya$$1210|El Pilar$$0111|Tots Sants$$0612|Dia de la Constitució$$0812|Immaculada Concepció$$2512|Nadal$$2612|Sant Esteve$";'),
(197, 'iw_agendas', 'altresfestius', 's:62:"$$06042012|Divendres Sant$$09042012|Dilluns de Pasqua Florida$";'),
(198, 'iw_agendas', 'informacions', 's:1:"$";'),
(199, 'iw_agendas', 'periodes', 's:393:"$$0109201111092011|Preparació del curs#99CC00$$1209201105122011|Primer trimestre#99CC99$$0612201122122011|Segon trimestre#99CCFF$$2312201108012012|Vacances de Nadal#993366$$0901201211032012|Segon trimestre#99CCFF$$1203201201042012|Tercer trimestre#FF9966$$0204201209042012|Vacances de Setmana Santa#993366$$1004201222062012|Tercer trimestre#FF9966$$2306201230062012|Tancament del curs#66FFCC$";'),
(201, 'iw_agendas', 'infos', 's:1:"1";'),
(202, 'iw_agendas', 'vista', 'i:-1;'),
(203, 'iw_agendas', 'colors', 's:112:"DBD4A6|555555|FFCC66|FFFFFF|E1EBFF|669ACC|FFFFFF|FFFFFF|FF8484|FFFFFF|DBD4A6|66FF66|3F6F3E|FFFFCC|BBBBBB|000000|";'),
(204, 'iw_agendas', 'maxnotes', 's:3:"300";'),
(205, 'iw_agendas', 'adjuntspersonals', 'N;'),
(206, 'iw_agendas', 'caducadies', 's:2:"30";'),
(207, 'iw_agendas', 'urladjunts', 's:7:"agendes";'),
(208, 'iw_agendas', 'msgUsersRespDefault', 's:130:"Has estat donat d''alta com a responsable a una agenda nova. Podràs accedir a aquesta agenda des del menú.<br><br>L''administrador";'),
(209, 'iw_agendas', 'msgUsersDefault', 's:112:"Has estat donat d''alta a una agenda nova. Podràs accedir a aquesta agenda des del menú.<br><br>L''administrador";'),
(216, 'iw_books', 'itemsperpage', 'i:10;'),
(217, 'iw_books', 'fpdf', 's:25:"modules/iw_books/fpdf153/";'),
(218, 'iw_books', 'any', 's:4:"2008";'),
(219, 'iw_books', 'encap', 's:35:"modules/iw_books/pnimages/encap.jpg";'),
(220, 'iw_books', 'plans', 's:176:"ESO#Educació Secundària Obligatòria|\nBTE#Batxillerat Tecnològic|\nBSO#Batxillerat Social|\nBHU#Batxillerat Humanístic|\nBCI#Batxillerat Científic|\nBAR#Batxillerat Artístic\n";'),
(222, 'iw_books', 'llistar_materials', 's:1:"1";'),
(223, 'iw_books', 'mida_font', 's:2:"11";'),
(224, 'iw_books', 'marca_aigua', 's:1:"0";'),
(225, 'iw_forums', 'urladjunts', 's:6:"forums";'),
(226, 'iw_forums', 'avatarsVisible', 's:1:"1";'),
(230, 'iw_messages', 'groupsCanUpdate', 's:1:"$";'),
(231, 'iw_messages', 'uploadFolder', 's:9:"missatges";'),
(232, 'iw_messages', 'multiMail', 's:1:"$";'),
(233, 'iw_messages', 'limitInBox', 's:2:"50";'),
(234, 'iw_messages', 'limitOutBox', 's:2:"50";'),
(235, 'iw_noteboard', 'grups', 's:16:"$$0$2$3$5$8$4$1$";'),
(236, 'iw_noteboard', 'permisos', 's:38:"$$0-1$2-7$3-3$5-7$8-6$6-3$7-5$4-5$1-1$";'),
(237, 'iw_noteboard', 'marcat', 's:6:"$$4$1$";'),
(238, 'iw_noteboard', 'verifica', 's:9:"$$$3$6$1$";'),
(239, 'iw_noteboard', 'caducitat', 's:2:"30";'),
(240, 'iw_noteboard', 'repperdefecte', 's:1:"1";'),
(241, 'iw_noteboard', 'colorrow1', 's:7:"#FFFFFF";'),
(242, 'iw_noteboard', 'colorrow2', 's:7:"#FFFFDF";'),
(243, 'iw_noteboard', 'colornewrow1', 's:7:"#FFEFD9";'),
(244, 'iw_noteboard', 'colornewrow2', 's:7:"#E7F3FF";'),
(245, 'iw_noteboard', 'attached', 's:6:"tauler";'),
(246, 'iw_noteboard', 'notRegisteredSeeRedactors', 's:1:"1";'),
(247, 'iw_noteboard', 'multiLanguage', 'N;'),
(248, 'iw_noteboard', 'public', 'N;'),
(249, 'iw_noteboard', 'topicsSystem', 'N;'),
(250, 'iw_noteboard', 'publicSharedURL', 's:32:"d63a850d2b927f8c8e9e04a0d6003e40";'),
(251, 'iw_noteboard', 'showSharedURL', 'N;'),
(252, 'iw_qv', 'skins', 's:23:"default,infantil,formal";'),
(253, 'iw_qv', 'langs', 's:8:"ca,es,en";'),
(254, 'iw_qv', 'maxdelivers', 's:15:"-1,1,2,3,4,5,10";'),
(255, 'iw_qv', 'basedisturl', 's:41:"http://clic.xtec.cat/qv_viewer/dist/html/";'),
(256, 'iw_TimeFrames', 'frames', 's:2:"10";'),
(257, 'iw_vhmenu', 'LowBgColor', 's:7:"#efedde";'),
(258, 'iw_vhmenu', 'LowSubBgColor', 's:7:"#efedde";'),
(259, 'iw_vhmenu', 'HighBgColor', 's:7:"#b3cadb";'),
(260, 'iw_vhmenu', 'HighSubBgColor', 's:7:"#b3cadb";'),
(261, 'iw_vhmenu', 'FontLowColor', 's:7:"#000000";'),
(262, 'iw_vhmenu', 'FontSubLowColor', 's:7:"#000000";'),
(263, 'iw_vhmenu', 'FontHighColor', 's:7:"#000000";'),
(264, 'iw_vhmenu', 'FontSubHighColor', 's:7:"#000000";'),
(265, 'iw_vhmenu', 'BorderColor', 's:7:"#ffffff";'),
(266, 'iw_vhmenu', 'BorderSubColor', 's:7:"#ffffff";'),
(267, 'iw_vhmenu', 'BorderWidth', 's:1:"1";'),
(268, 'iw_vhmenu', 'BorderBtwnElmnts', 'i:1;'),
(269, 'iw_vhmenu', 'FontFamily', 's:45:"Tahoma, Verdana, Arial, Helvetica, sans-serif";'),
(270, 'iw_vhmenu', 'FontSize', 's:1:"9";'),
(271, 'iw_vhmenu', 'FontBold', 'i:0;'),
(272, 'iw_vhmenu', 'FontItalic', 'i:0;'),
(273, 'iw_vhmenu', 'MenuTextCentered', 's:6:"center";'),
(274, 'iw_vhmenu', 'MenuCentered', 's:4:"left";'),
(275, 'iw_vhmenu', 'MenuVerticalCentered', 's:3:"top";'),
(276, 'iw_vhmenu', 'ChildOverlap', 's:3:"0.1";'),
(277, 'iw_vhmenu', 'ChildVerticalOverlap', 's:3:"0.1";'),
(278, 'iw_vhmenu', 'StartTop', 's:3:"120";'),
(279, 'iw_vhmenu', 'StartLeft', 's:2:"10";'),
(280, 'iw_vhmenu', 'VerCorrect', 'i:0;'),
(281, 'iw_vhmenu', 'HorCorrect', 'i:0;'),
(282, 'iw_vhmenu', 'LeftPaddng', 's:1:"3";'),
(283, 'iw_vhmenu', 'TopPaddng', 's:1:"2";'),
(284, 'iw_vhmenu', 'FirstLineHorizontal', 's:1:"1";'),
(285, 'iw_vhmenu', 'MenuFramesVertical', 'i:1;'),
(286, 'iw_vhmenu', 'DissapearDelay', 's:4:"1000";'),
(287, 'iw_vhmenu', 'TakeOverBgColor', 'i:1;'),
(288, 'iw_vhmenu', 'FirstLineFrame', 's:5:"navig";'),
(289, 'iw_vhmenu', 'SecLineFrame', 's:5:"space";'),
(290, 'iw_vhmenu', 'DocTargetFrame', 's:5:"space";'),
(291, 'iw_vhmenu', 'TargetLoc', 's:0:"";'),
(292, 'iw_vhmenu', 'HideTop', 'i:0;'),
(293, 'iw_vhmenu', 'MenuWrap', 'i:1;'),
(294, 'iw_vhmenu', 'RightToLeft', 'i:0;'),
(295, 'iw_vhmenu', 'UnfoldsOnClick', 'i:0;'),
(296, 'iw_vhmenu', 'WebMasterCheck', 'i:0;'),
(297, 'iw_vhmenu', 'ShowArrow', 'i:1;'),
(298, 'iw_vhmenu', 'KeepHilite', 'i:1;'),
(299, 'iw_vhmenu', 'height', 's:2:"24";'),
(300, 'iw_vhmenu', 'width', 's:3:"150";'),
(301, 'iw_vhmenu', 'imagedir', 's:4:"menu";'),
(302, 'iw_webbox', 'url', 's:31:"http://phobos.xtec.cat/intraweb";'),
(303, 'iw_webbox', 'width', 's:3:"100";'),
(304, 'iw_webbox', 'height', 's:3:"800";'),
(305, 'iw_webbox', 'scrolls', 's:2:"on";'),
(306, 'iw_webbox', 'widthunit', 's:1:"%";'),
(307, 'News', 'storyhome', 'i:10;'),
(308, 'News', 'storyorder', 'i:0;'),
(309, 'News', 'itemsperpage', 's:2:"25";'),
(310, 'News', 'permalinkformat', 's:36:"%year%/%monthnum%/%day%/%storytitle%";'),
(311, 'News', 'enablecategorization', 'b:1;'),
(327, 'iw_groups', 'grupinici', 's:0:"";'),
(328, 'iw_groups', 'confesb', 's:0:"";'),
(329, 'iw_groups', 'confmou', 's:0:"";'),
(336, 'iw_bookings', 'group', 's:1:"4";'),
(337, 'iw_bookings', 'weeks', 's:1:"2";'),
(338, 'iw_bookings', 'month_panel', 'N;'),
(340, 'iw_bookings', 'eraseold', 's:1:"1";'),
(341, 'iw_bookings', 'showcolors', 's:1:"1";'),
(342, 'iw_noteboard', 'quiverifica', 's:1:"8";'),
(343, 'Categories', 'permissionsall', 'i:0;'),
(344, 'downloads', 'screenshotlink', 's:54:"/srv/www/agora/zkdata/usu4/data/descarregues/captures/"'),
(345, 'downloads', 'upload_folder', 's:45:"/srv/www/agora/zkdata/usu4/data/descarregues/"'),
(346, 'downloads', 'captcha_cache', 's:51:"/srv/www/agora/zkdata/usu4/data/descarregues/cache/"'),
(347, 'downloads', 'perpage', 'i:10;'),
(348, 'downloads', 'newdownloads', 'i:5;'),
(349, 'downloads', 'topdownloads', 'i:5;'),
(350, 'downloads', 'popular', 'i:5;'),
(351, 'downloads', 'ratexdlsamount', 'i:5;'),
(352, 'downloads', 'topxdlsamount', 'i:5;'),
(353, 'downloads', 'lastxdlsamount', 'i:5;'),
(354, 'downloads', 'ratexdlsactive', 's:2:"no";'),
(355, 'downloads', 'topxdlsactive', 's:2:"no";'),
(356, 'downloads', 'lastxdlsactive', 's:2:"no";'),
(357, 'downloads', 'allowupload', 's:3:"yes";'),
(358, 'downloads', 'securedownload', 's:2:"no";'),
(359, 'downloads', 'sizelimit', 's:3:"yes";'),
(360, 'downloads', 'limitsize', 's:4:"5-Mb";'),
(361, 'downloads', 'showscreenshot', 's:3:"yes";'),
(362, 'downloads', 'thumbnailwidth', 'i:100;'),
(363, 'downloads', 'thumbnailheight', 'i:100;'),
(364, 'downloads', 'screenshotmaxsize', 's:4:"2-Mb";'),
(365, 'downloads', 'thumbnailmaxsize', 's:4:"1-Mb";'),
(366, 'downloads', 'limit_extension', 's:3:"yes";'),
(367, 'downloads', 'allowscreenshotupload', 's:3:"yes";'),
(368, 'downloads', 'importfrommod', 'i:0;'),
(371, 'downloads', 'sessionlimit', 's:2:"no";'),
(372, 'downloads', 'sessiondownloadlimit', 's:1:"8";'),
(373, 'downloads', 'captchacharacters', 's:1:"5";'),
(374, 'downloads', 'notifymail', 's:15:"centre@xtec.cat"'),
(375, 'downloads', 'inform_user', 's:2:"no";'),
(376, 'downloads', 'gd', 'i:1;'),
(377, 'downloads', 'allowed_extensions', 's:62:"txt,zip,rar,tar.gz,tar,doc,ppt,pdf,wav,mp3,rtf,odt,ods,odp,xls";'),
(378, 'downloads', 'standard_sortby', 's:5:"title";'),
(379, 'downloads', 'collateral_clause', 's:3:"ASC";'),
(380, 'downloads', 'frontendstyle', 'i:0;'),
(381, 'downloads', 'fulltext', 'i:0;'),
(383, 'scribite', 'editors_path', 's:27:"modules/scribite/pnincludes";'),
(384, 'scribite', 'xinha_language', 's:2:"es";'),
(385, 'scribite', 'xinha_skin', 's:9:"blue-look";'),
(386, 'scribite', 'xinha_barmode', 's:4:"full";'),
(387, 'scribite', 'xinha_width', 's:4:"auto";'),
(388, 'scribite', 'xinha_height', 's:4:"auto";'),
(389, 'scribite', 'xinha_style', 's:42:"modules/scribite/pnconfig/xinha/editor.css";'),
(390, 'scribite', 'xinha_statusbar', 's:1:"1";'),
(391, 'scribite', 'xinha_converturls', 's:1:"0";'),
(392, 'scribite', 'xinha_showloading', 's:1:"1";'),
(393, 'scribite', 'xinha_activeplugins', 's:22:"a:1:{i:0;s:5:"Files";}";'),
(394, 'scribite', 'tinymce_language', 's:2:"en";'),
(395, 'scribite', 'tinymce_style', 's:45:"modules/scribite/pnconfig/tiny_mce/editor.css";'),
(396, 'scribite', 'tinymce_theme', 's:6:"simple";'),
(397, 'scribite', 'tinymce_width', 's:3:"75%";'),
(398, 'scribite', 'tinymce_height', 's:3:"400";'),
(399, 'scribite', 'tinymce_dateformat', 's:8:"%Y-%m-%d";'),
(400, 'scribite', 'tinymce_timeformat', 's:8:"%H:%M:%S";'),
(401, 'scribite', 'tinymce_ask', 'i:0;'),
(402, 'scribite', 'tinymce_mcpuk', 'i:0;'),
(403, 'scribite', 'tinymce_activeplugins', 's:0:"";'),
(404, 'scribite', 'fckeditor_language', 's:2:"en";'),
(405, 'scribite', 'fckeditor_barmode', 's:7:"Default";'),
(406, 'scribite', 'fckeditor_width', 's:3:"500";'),
(407, 'scribite', 'fckeditor_height', 's:3:"400";'),
(408, 'scribite', 'fckeditor_autolang', 'i:1;'),
(409, 'scribite', 'openwysiwyg_barmode', 's:4:"full";'),
(410, 'scribite', 'openwysiwyg_width', 's:3:"400";'),
(411, 'scribite', 'openwysiwyg_height', 's:3:"300";'),
(412, 'scribite', 'nicedit_fullpanel', 'i:0;'),
(413, 'Pages', 'itemsperpage', 'i:25;'),
(414, 'Pages', 'enablecategorization', 'b:1;'),
(415, 'Pages', 'addcategorytitletopermalink', 'b:1;'),
(417, 'scribite', 'DefaultEditor', 's:5:"xinha";'),
(432, 'iw_agendas', 'llegenda', 's:1:"1";'),
(434, 'bbcode', 'quote', 's:91:"<div><h3 class="bbquoteheader">%u</h3><blockquote class="bbquotetext">%t</blockquote></div>";'),
(435, 'bbcode', 'code', 's:75:"<div><h3 class="bbcodeheader">%h</h3><div class="bbcodetext">%c</div></div>";'),
(436, 'bbcode', 'size_tiny', 's:6:"0.75em";'),
(437, 'bbcode', 'size_small', 's:6:"0.85em";'),
(438, 'bbcode', 'size_normal', 's:5:"1.0em";'),
(439, 'bbcode', 'size_large', 's:5:"1.5em";'),
(440, 'bbcode', 'size_huge', 's:5:"2.0em";'),
(441, 'bbcode', 'allow_usersize', 'b:0;'),
(442, 'bbcode', 'allow_usercolor', 'b:0;'),
(443, 'bbcode', 'code_enabled', 'b:1;'),
(444, 'bbcode', 'quote_enabled', 'b:1;'),
(445, 'bbcode', 'color_enabled', 'b:1;'),
(446, 'bbcode', 'size_enabled', 'b:1;'),
(447, 'bbcode', 'lightbox_enabled', 'b:1;'),
(448, 'bbcode', 'lightbox_previewwidth', 'i:200;'),
(449, 'bbcode', 'syntaxhilite', 's:13:"HILITE_GOOGLE";'),
(450, 'bbcode', 'link_shrinksize', 'i:30;'),
(451, 'bbcode', 'spoiler_enabled', 'b:1;'),
(452, 'bbcode', 'spoiler', 's:74:"<div><h3 class="bbcodeheader">%h</h3><div class="bbspoiler">%s</div></div>";'),
(471, 'content', 'shorturlsuffix', 's:5:".html";'),
(472, '/PNConfig', 'nocookiewarnthreshold', 'i:2;'),
(477, 'iw_noteboard', 'sharedName', 'N;'),
(482, 'iw_forms', 'characters', 's:2:"15";'),
(483, 'iw_forms', 'resumeview', 's:1:"0";'),
(484, 'iw_forms', 'newsColor', 's:7:"#EFFFEF";'),
(485, 'iw_forms', 'viewedColor', 's:7:"#FFFFFF";'),
(486, 'iw_forms', 'completedColor', 's:7:"#EFEFEF";'),
(487, 'iw_forms', 'validatedColor', 's:7:"#FFDFDF";'),
(488, 'iw_forms', 'fieldsColor', 's:7:"#E7F3FF";'),
(489, 'iw_forms', 'contentColor', 's:7:"#FFEADF";'),
(490, 'iw_forms', 'attached', 's:10:"formularis";'),
(509, 'bbsmile', 'smiliepath', 's:32:"modules/bbsmile/pnimages/smilies";'),
(510, 'bbsmile', 'activate_auto', 's:1:"0";'),
(511, 'bbsmile', 'remove_inactive', 's:1:"1";'),
(512, 'bbsmile', 'smiliepath_auto', 's:37:"modules/bbsmile/pnimages/smilies_auto";'),
(513, 'downloads', 'cptid', 's:40:"41d9257ecd95b78ada2480ad54aaf44b962eec8b";'),
(515, 'Feeds', 'bold', 'i:0;'),
(516, 'Feeds', 'openinnewwindow', 'i:0;'),
(517, 'Feeds', 'itemsperpage', 'i:10;'),
(518, 'Feeds', 'cachedirectory', 's:5:"feeds";'),
(519, 'Feeds', 'cacheinterval', 'i:180;'),
(520, 'Feeds', 'enablecategorization', 'b:1;'),
(521, 'Quotes', 'itemsperpage', 'i:25;'),
(522, 'Quotes', 'catmapcount', 'i:3;'),
(523, 'Quotes', 'enablecategorization', 'b:1;'),
(524, 'Referers', 'itemsperpage', 'i:25;'),
(525, 'Referers', 'httpref', 'i:0;'),
(526, 'Referers', 'httprefmax', 'i:1000;'),
(530, 'iw_myrole', 'rolegroup', 's:1:"9";'),
(531, 'iw_main', 'publicFolder', 's:6:"public";'),
(532, 'iw_main', 'cronHeaderText', 's:70:"Aquest missatge ha estat enviar de forma automàtica amb les novetats.";'),
(533, 'iw_main', 'cronFooterText', 's:28:"Si us plau no el responguis.";'),
(534, 'iw_main', 'showHideFiles', 's:1:"0";'),
(536, 'iw_forms', 'publicFolder', 's:6:"public";'),
(537, 'iw_bookings', 'weekends', 'N;'),
(538, 'iw_bookings', 'NTPtime', 'N;'),
(539, 'iw_jclic', 'timeLap', 's:1:"5";'),
(540, 'iw_jclic', 'jclicJarBase', 's:31:"http://clic.xtec.cat/dist/jclic";'),
(541, 'iw_jclic', 'jclicUpdatedFiles', 's:5:"jclic";'),
(542, 'iw_jclic', 'groupsProAssign', 's:4:"$$3$";'),
(546, 'downloads', 'torrent', 's:2:"no";'),
(547, 'iw_main', 'allowUserChangeAvatar', 's:1:"1";'),
(548, 'iw_main', 'avatarChangeValidationNeeded', 's:1:"1";'),
(549, 'iw_main', 'URLBase', 's:33:"http://agora/agora/usu4/intranet/";'),
(550, 'iw_main', 'friendsLabel', 's:5:"Amics";'),
(551, 'iw_main', 'friendsSystemAvailable', 'i:1;'),
(552, 'Admin', 'displaynametype', 's:1:"1";'),
(553, '/PNConfig', 'shorturlsdefaultmodule', 's:0:"";'),
(554, '/PNConfig', 'profilemodule', 's:7:"Profile";'),
(555, '/PNConfig', 'messagemodule', 's:0:"";'),
(556, 'scribite', 'yui_type', 's:6:"Simple";'),
(557, 'scribite', 'yui_width', 's:4:"auto";'),
(558, 'scribite', 'yui_height', 's:3:"300";'),
(559, 'scribite', 'yui_dombar', 'b:1;'),
(560, 'scribite', 'yui_animate', 'b:1;'),
(561, 'scribite', 'yui_collapse', 'b:1;'),
(573, 'iw_moodle', 'moodleurl', 's:9:"../moodle"'),
(574, 'iw_moodle', 'newwindow', 'i:0;'),
(575, 'iw_moodle', 'guestuser', 's:5:"guest";'),
(576, 'iw_moodle', 'dbprefix', 's:2:"ml"'),
(577, 'iw_moodle', 'dfl_description', 's:16:"User description";'),
(578, 'iw_moodle', 'dfl_language', 's:7:"ca_utf8"'),
(579, 'iw_moodle', 'dfl_country', 's:2:"ES";'),
(580, 'iw_moodle', 'dfl_city', 's:9:"City name";'),
(581, 'iw_moodle', 'dfl_gtm', 's:2:"99";'),
(582, 'Users', 'idnnames', 's:1:"0";'),
(587, 'iw_noteboard', 'editPrintAfter', 's:2:"30";'),
(593, 'News', 'refereronprint', 's:1:"0";'),
(594, 'News', 'enableattribution', 'b:0;'),
(595, 'News', 'catimagepath', 'b:0;'),
(596, 'News', 'enableajaxedit', 'b:1;'),
(597, 'formicula', 'show_phone', 'b:0;'),
(598, 'formicula', 'show_company', 'b:0;'),
(599, 'formicula', 'show_url', 'b:0;'),
(600, 'formicula', 'show_location', 'b:0;'),
(601, 'formicula', 'show_comment', 'b:0;'),
(602, 'formicula', 'send_user', 'b:1;'),
(603, 'formicula', 'spamcheck', 'b:1;'),
(604, 'formicula', 'upload_dir', 's:6:"pnTemp";'),
(605, 'formicula', 'delete_file', 'b:1;'),
(606, 'formicula', 'default_form', 's:1:"0";'),
(607, 'formicula', 'excludespamcheck', 's:0:"";'),
(611, 'Profile', 'memberslistitemsperpage', 'i:20;'),
(612, 'Profile', 'onlinemembersitemsperpage', 'i:20;'),
(613, 'Profile', 'recentmembersitemsperpage', 'i:10;'),
(614, 'Profile', 'filterunverified', 'i:1;'),
(615, 'scribite', 'xinha_activeplugins', 's:22:"a:1:{i:0;s:5:"Files";}";'),
(617, 'iw_users', 'friendsSystemAvailable', 'i:0;'),
(618, 'iw_users', 'invisibleGroupsInList', 's:10:"$$2$$9$$1$";'),
(619, 'Files', 'folderPath', 's:43:"/dades/eduphp/agora-moodle/zkdata/usu1/data";'),
(620, 'Files', 'usersFolder', 's:5:"users";'),
(621, 'Files', 'showHideFiles', 's:1:"0";'),
(622, 'Files', 'allowedExtensions', 's:63:"odt|ods|odp|zip|pdf|doc|xls|ppt|pps|jpg|gif|txt|png|xml|htm|css";'),
(623, 'Files', 'defaultQuota', 'i:1;'),
(624, 'Files', 'groupsQuota', 's:55:"a:1:{i:0;a:2:{s:3:"gid";s:1:"2";s:5:"quota";s:2:"-1";}}";'),
(625, 'Files', 'filesMaxSize', 's:7:"1000000";'),
(626, 'Files', 'maxWidth', 's:3:"250";'),
(627, 'Files', 'maxHeight', 's:3:"250";'),
(628, 'Files', 'editableExtensions', 's:32:"php,htm,html,htaccess,css,js,tpl";'),
(629, 'Users', 'accountdisplaygraphics', 'i:1;'),
(630, 'Users', 'accountitemsperpage', 'i:25;'),
(631, 'Users', 'accountitemsperrow', 'i:5;'),
(632, 'Users', 'changepassword', 'i:1;'),
(633, 'Users', 'changeemail', 'i:1;'),
(634, 'Users', 'avatarpath', 's:13:"images/avatar";'),
(635, 'Users', 'lowercaseuname', 'i:1;'),
(636, 'Admin', 'moduledescription', 'i:1;'),
(637, '/PNConfig', 'updatelastchecked', '0'),
(638, '/PNConfig', 'updatefrequency', 'i:7;'),
(639, '/PNConfig', 'updateversion', 's:5:"1.2.8";'),
(640, '/PNConfig', 'updatecheck', '1'),
(641, '/PNConfig', 'language_i18n', 's:2:"ca";'),
(642, '/PNConfig', 'language_bc', '0'),
(643, '/PNConfig', 'languageurl', '0'),
(644, '/PNConfig', 'ajaxtimeout', 'i:5000;'),
(645, '/PNConfig', 'permasearch', 's:161:"À,Á,Â,Ã,Å,à,á,â,ã,å,Ò,Ó,Ô,Õ,Ø,ò,ó,ô,õ,ø,È,É,Ê,Ë,è,é,ê,ë,Ç,ç,Ì,Í,Î,Ï,ì,í,î,ï,Ù,Ú,Û,ù,ú,û,ÿ,Ñ,ñ,ß,ä,Ä,ö,Ö,ü,Ü";'),
(646, '/PNConfig', 'permareplace', 's:114:"A,A,A,A,A,a,a,a,a,a,O,O,O,O,O,o,o,o,o,o,E,E,E,E,e,e,e,e,C,c,I,I,I,I,i,i,i,i,U,U,U,u,u,u,y,N,n,ss,ae,Ae,oe,Oe,ue,Ue";'),
(647, 'Theme', 'cssjscombine', 'b:0;'),
(648, 'Theme', 'cssjscompress', 'b:0;'),
(649, 'Theme', 'cssjsminify', 'b:0;'),
(650, 'Theme', 'cssjscombine_lifetime', 'i:3600;'),
(651, 'Feeds', 'multifeedlimit', '0'),
(652, 'Feeds', 'feedsperpage', 'i:10;'),
(653, 'Feeds', 'usingcronjob', '0'),
(654, 'Feeds', 'key', 's:32:"705870a8e9f3cd4eb3995994dbbc0971";'),
(655, 'iw_agendas', 'allowGCalendar', 's:1:"0";'),
(656, 'iw_books', 'nivells', 's:59:"\n1#1r|\n2#2n|\n3#3r|\n4#4t|\n5#5è|\n6#6è|\nA#P3|\nB#P4|\nC#P5";'),
(657, 'News', 'enablemorearticlesincat', 'b:0;'),
(658, 'News', 'morearticlesincat', '0'),
(659, 'News', 'notifyonpending', 'b:0;'),
(660, 'News', 'notifyonpending_fromname', 's:0:"";'),
(661, 'News', 'notifyonpending_fromaddress', 's:0:"";'),
(662, 'News', 'notifyonpending_toname', 's:0:"";'),
(663, 'News', 'notifyonpending_toaddress', 's:0:"";'),
(664, 'News', 'notifyonpending_subject', 's:54:"A News Publisher article has been submitted for review";'),
(665, 'News', 'notifyonpending_html', '1'),
(666, 'News', 'pdflink', 'b:0;'),
(667, 'News', 'pdflink_tcpdfpath', 's:30:"config/classes/tcpdf/tcpdf.php";'),
(668, 'News', 'pdflink_tcpdflang', 's:40:"config/classes/tcpdf/config/lang/eng.php";'),
(669, 'News', 'pdflink_headerlogo', 's:14:"tcpdf_logo.jpg";'),
(670, 'News', 'pdflink_headerlogo_width', 's:2:"30";'),
(671, 'Pages', 'showpermalinkinput', '1'),
(672, 'Profile', 'dudtextdisplaytags', '0'),
(673, 'Profile', 'dudregshow', 'a:14:{i:0;i:1;i:1;i:4;i:2;i:5;i:3;i:6;i:4;i:7;i:5;i:8;i:6;i:9;i:7;i:10;i:8;i:11;i:9;i:12;i:10;i:13;i:11;i:14;i:12;i:15;i:13;i:16;}'),
(674, 'scribite', 'xinha_activeplugins', 's:22:"a:1:{i:0;s:5:"Files";}";'),
(680, 'advMailer', 'enabled', 's:1:"1";'),
(681, 'advMailer', 'idApp', 's:5:"AGORA";'),
(682, 'advMailer', 'replyAddress', 's:15:"centre@xtec.cat";'),
(683, 'advMailer', 'sender', 's:8:"educacio";'),
(684, 'advMailer', 'environment', 's:3:"PRO";'),
(685, 'advMailer', 'contenttype', 's:1:"2";'),
(686, 'advMailer', 'log', 's:0:"";'),
(687, 'advMailer', 'debug', 's:0:"";'),
(688, 'advMailer', 'logpath', 's:0:"";');

-- --------------------------------------------------------

--
-- Estructura de la taula `zk_news`
--

CREATE TABLE IF NOT EXISTS `zk_news` (
  `pn_sid` int(11) NOT NULL AUTO_INCREMENT,
  `pn_title` varchar(255) DEFAULT NULL,
  `pn_urltitle` varchar(255) DEFAULT NULL,
  `pn_hometext` text,
  `pn_bodytext` text,
  `pn_counter` int(11) DEFAULT NULL,
  `pn_contributor` varchar(25) NOT NULL DEFAULT '',
  `pn_notes` text,
  `pn_hideonindex` tinyint(4) NOT NULL DEFAULT '0',
  `pn_language` varchar(30) NOT NULL DEFAULT '',
  `pn_disallowcomments` tinyint(4) NOT NULL DEFAULT '0',
  `pn_format_type` tinyint(4) NOT NULL DEFAULT '0',
  `pn_published_status` tinyint(4) DEFAULT '0',
  `pn_from` datetime DEFAULT NULL,
  `pn_to` datetime DEFAULT NULL,
  `pn_obj_status` varchar(1) NOT NULL DEFAULT 'A',
  `pn_cr_date` datetime NOT NULL DEFAULT '1970-01-01 00:00:00',
  `pn_cr_uid` int(11) NOT NULL DEFAULT '0',
  `pn_lu_date` datetime NOT NULL DEFAULT '1970-01-01 00:00:00',
  `pn_lu_uid` int(11) NOT NULL DEFAULT '0',
  `pn_approver` int(11) NOT NULL DEFAULT '0',
  `pn_weight` tinyint(4) DEFAULT '0',
  PRIMARY KEY (`pn_sid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Bolcant dades de la taula `zk_news`
--

INSERT INTO `zk_news` (`pn_sid`, `pn_title`, `pn_urltitle`, `pn_hometext`, `pn_bodytext`, `pn_counter`, `pn_contributor`, `pn_notes`, `pn_hideonindex`, `pn_language`, `pn_disallowcomments`, `pn_format_type`, `pn_published_status`, `pn_from`, `pn_to`, `pn_obj_status`, `pn_cr_date`, `pn_cr_uid`, `pn_lu_date`, `pn_lu_uid`, `pn_approver`, `pn_weight`) VALUES
(1, 'Pel que fa a aquesta versió de la intranet', 'Pel-que-fa-a-aquesta-versio-de-la-intranet', '<span>\r\n<p>Aquesta maqueta és una versió preliminar d''una intranet de centre. La intranet que heu instal·lat prové de la versió 2.2 de la maqueta muntada sobre la versió 1.2 del Zikula Application Framework.\r\n</p>\r\n<p>Si teniu dubtes sobre el funcionament de la maqueta o voleu fer algun suggeriment, us podeu dirigir a la web de suport: <a href="http://phobos.xtec.cat/intraweb/" target="_blank">http://phobos.xtec.cat/intraweb/</a>.\r\n  <br />\r\n</p> </span>', '', 7, 'admin', '', 0, '', 0, 5, 0, '2008-09-08 17:38:15', NULL, 'A', '2008-09-08 17:38:15', 2, '2009-03-06 13:31:24', 2, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de la taula `zk_objectdata_attributes`
--

CREATE TABLE IF NOT EXISTS `zk_objectdata_attributes` (
  `oba_id` int(11) NOT NULL AUTO_INCREMENT,
  `oba_attribute_name` varchar(80) NOT NULL DEFAULT '',
  `oba_object_id` int(11) NOT NULL DEFAULT '0',
  `oba_object_type` varchar(80) NOT NULL DEFAULT '',
  `oba_value` text,
  `oba_obj_status` varchar(1) NOT NULL DEFAULT 'A',
  `oba_cr_date` datetime NOT NULL DEFAULT '1970-01-01 00:00:00',
  `oba_cr_uid` int(11) NOT NULL DEFAULT '0',
  `oba_lu_date` datetime NOT NULL DEFAULT '1970-01-01 00:00:00',
  `oba_lu_uid` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`oba_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=80 ;

--
-- Bolcant dades de la taula `zk_objectdata_attributes`
--

INSERT INTO `zk_objectdata_attributes` (`oba_id`, `oba_attribute_name`, `oba_object_id`, `oba_object_type`, `oba_value`, `oba_obj_status`, `oba_cr_date`, `oba_cr_uid`, `oba_lu_date`, `oba_lu_uid`) VALUES
(27, 'code', 5, 'categories_category', 'Y', 'A', '2008-09-08 12:51:02', 2, '2008-09-08 12:51:02', 2),
(28, 'code', 6, 'categories_category', 'N', 'A', '2008-09-08 12:51:02', 2, '2008-09-08 12:51:02', 2),
(29, 'code', 24, 'categories_category', 'A', 'A', '2008-09-08 12:51:02', 2, '2008-09-08 12:51:02', 2),
(30, 'code', 13, 'categories_category', 'A', 'A', '2008-09-08 12:51:02', 2, '2008-09-08 12:51:02', 2),
(31, 'code', 28, 'categories_category', 'A', 'A', '2008-09-08 12:51:02', 2, '2008-09-08 12:51:02', 2),
(32, 'code', 12, 'categories_category', 'C', 'A', '2008-09-08 12:51:02', 2, '2008-09-08 12:51:02', 2),
(33, 'code', 18, 'categories_category', 'F', 'A', '2008-09-08 12:51:02', 2, '2008-09-08 12:51:02', 2),
(34, 'code', 25, 'categories_category', 'I', 'A', '2008-09-08 12:51:02', 2, '2008-09-08 12:51:02', 2),
(35, 'code', 17, 'categories_category', 'M', 'A', '2008-09-08 12:51:02', 2, '2008-09-08 12:51:02', 2),
(36, 'code', 14, 'categories_category', 'O', 'A', '2008-09-08 12:51:02', 2, '2008-09-08 12:51:02', 2),
(37, 'code', 11, 'categories_category', 'P', 'A', '2008-09-08 12:51:02', 2, '2008-09-08 12:51:02', 2),
(38, 'code', 27, 'categories_category', 'P', 'A', '2008-09-08 12:51:02', 2, '2008-09-08 12:51:02', 2),
(39, 'code', 15, 'categories_category', 'R', 'A', '2008-09-08 12:51:02', 2, '2008-09-08 12:51:02', 2),
(60, 'topic_image', 10001, 'categories_category', 'images/topics/alumnat.gif', 'A', '2010-09-06 17:13:05', 10, '2010-09-06 17:13:05', 10),
(61, 'topic_image', 10002, 'categories_category', 'images/topics/Docencia.gif', 'A', '2010-09-06 17:13:27', 10, '2010-09-06 17:13:27', 10),
(62, 'topic_image', 10004, 'categories_category', 'images/topics/Comunitat.gif', 'A', '2010-09-06 17:15:10', 10, '2010-09-06 17:15:10', 10),
(63, 'topic_image', 10003, 'categories_category', 'images/topics/ampa.gif', 'A', '2010-09-06 17:15:30', 10, '2010-09-06 17:15:30', 10),
(64, 'topic_image', 10005, 'categories_category', 'images/topics/Noticia.gif', 'A', '2010-09-06 17:16:18', 10, '2010-09-06 17:16:18', 10),
(65, 'topic_image', 10006, 'categories_category', 'images/topics/Noticia.gif', 'A', '2010-09-06 17:16:47', 10, '2010-09-06 17:16:47', 10),
(66, 'realname', 10, 'users', 'Administració XTEC', 'A', '2010-09-06 17:20:24', 10, '2010-09-06 17:20:24', 10),
(67, 'publicemail', 10, 'users', 'agora@xtec.cat', 'A', '2010-09-06 17:20:24', 10, '2010-09-06 17:20:24', 10),
(68, 'url', 10, 'users', '', 'A', '2010-09-06 17:20:24', 10, '2010-09-06 17:20:24', 10),
(69, 'tzoffset', 10, 'users', '1', 'A', '2010-09-06 17:20:24', 10, '2010-09-06 17:20:24', 10),
(70, 'avatar', 10, 'users', 'blank.gif', 'A', '2010-09-06 17:20:24', 10, '2010-09-06 17:20:24', 10),
(71, 'icq', 10, 'users', '', 'A', '2010-09-06 17:20:24', 10, '2010-09-06 17:20:24', 10),
(72, 'aim', 10, 'users', '', 'A', '2010-09-06 17:20:24', 10, '2010-09-06 17:20:24', 10),
(73, 'yim', 10, 'users', '', 'A', '2010-09-06 17:20:24', 10, '2010-09-06 17:20:24', 10),
(74, 'msnm', 10, 'users', '', 'A', '2010-09-06 17:20:24', 10, '2010-09-06 17:20:24', 10),
(75, 'city', 10, 'users', '', 'A', '2010-09-06 17:20:24', 10, '2010-09-06 17:20:24', 10),
(76, 'occupation', 10, 'users', '', 'A', '2010-09-06 17:20:25', 10, '2010-09-06 17:20:25', 10),
(77, 'signature', 10, 'users', '', 'A', '2010-09-06 17:20:25', 10, '2010-09-06 17:20:25', 10),
(78, 'extrainfo', 10, 'users', '', 'A', '2010-09-06 17:20:25', 10, '2010-09-06 17:20:25', 10),
(79, 'interests', 10, 'users', '', 'A', '2010-09-06 17:20:25', 10, '2010-09-06 17:20:25', 10);

-- --------------------------------------------------------

--
-- Estructura de la taula `zk_objectdata_log`
--

CREATE TABLE IF NOT EXISTS `zk_objectdata_log` (
  `obl_id` int(11) NOT NULL AUTO_INCREMENT,
  `obl_object_type` varchar(80) NOT NULL DEFAULT '',
  `obl_object_id` int(11) NOT NULL DEFAULT '0',
  `obl_op` varchar(16) NOT NULL DEFAULT '',
  `obl_diff` mediumtext,
  `obl_obj_status` varchar(1) NOT NULL DEFAULT 'A',
  `obl_cr_date` datetime NOT NULL DEFAULT '1970-01-01 00:00:00',
  `obl_cr_uid` int(11) NOT NULL DEFAULT '0',
  `obl_lu_date` datetime NOT NULL DEFAULT '1970-01-01 00:00:00',
  `obl_lu_uid` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`obl_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de la taula `zk_objectdata_meta`
--

CREATE TABLE IF NOT EXISTS `zk_objectdata_meta` (
  `obm_id` int(11) NOT NULL AUTO_INCREMENT,
  `obm_module` varchar(40) NOT NULL DEFAULT '',
  `obm_table` varchar(40) NOT NULL DEFAULT '',
  `obm_idcolumn` varchar(40) NOT NULL DEFAULT '',
  `obm_obj_id` int(11) NOT NULL DEFAULT '0',
  `obm_permissions` varchar(255) DEFAULT '',
  `obm_dc_title` varchar(80) DEFAULT '',
  `obm_dc_author` varchar(80) DEFAULT '',
  `obm_dc_subject` varchar(255) DEFAULT '',
  `obm_dc_keywords` varchar(128) DEFAULT '',
  `obm_dc_description` varchar(255) DEFAULT '',
  `obm_dc_publisher` varchar(128) DEFAULT '',
  `obm_dc_contributor` varchar(128) DEFAULT '',
  `obm_dc_startdate` datetime DEFAULT '1970-01-01 00:00:00',
  `obm_dc_enddate` datetime DEFAULT '1970-01-01 00:00:00',
  `obm_dc_type` varchar(128) DEFAULT '',
  `obm_dc_format` varchar(128) DEFAULT '',
  `obm_dc_uri` varchar(255) DEFAULT '',
  `obm_dc_source` varchar(128) DEFAULT '',
  `obm_dc_language` varchar(32) DEFAULT '',
  `obm_dc_relation` varchar(255) DEFAULT '',
  `obm_dc_coverage` varchar(64) DEFAULT '',
  `obm_dc_entity` varchar(64) DEFAULT '',
  `obm_dc_comment` varchar(255) DEFAULT '',
  `obm_dc_extra` varchar(255) DEFAULT '',
  `obm_obj_status` varchar(1) NOT NULL DEFAULT 'A',
  `obm_cr_date` datetime NOT NULL DEFAULT '1970-01-01 00:00:00',
  `obm_cr_uid` int(11) NOT NULL DEFAULT '0',
  `obm_lu_date` datetime NOT NULL DEFAULT '1970-01-01 00:00:00',
  `obm_lu_uid` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`obm_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de la taula `zk_pagelock`
--

CREATE TABLE IF NOT EXISTS `zk_pagelock` (
  `plock_id` int(11) NOT NULL AUTO_INCREMENT,
  `plock_name` varchar(100) NOT NULL DEFAULT '',
  `plock_cdate` datetime NOT NULL,
  `plock_edate` datetime NOT NULL,
  `plock_session` varchar(50) NOT NULL,
  `plock_title` varchar(100) NOT NULL,
  `plock_ipno` varchar(30) NOT NULL,
  PRIMARY KEY (`plock_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de la taula `zk_pages`
--

CREATE TABLE IF NOT EXISTS `zk_pages` (
  `pn_pageid` int(11) NOT NULL AUTO_INCREMENT,
  `pn_title` text,
  `pn_urltitle` text,
  `pn_content` text,
  `pn_counter` int(11) NOT NULL DEFAULT '0',
  `pn_displaywrapper` tinyint(4) NOT NULL DEFAULT '1',
  `pn_language` varchar(30) NOT NULL DEFAULT '',
  `pn_obj_status` varchar(1) NOT NULL DEFAULT 'A',
  `pn_cr_date` datetime NOT NULL DEFAULT '1970-01-01 00:00:00',
  `pn_cr_uid` int(11) NOT NULL DEFAULT '0',
  `pn_lu_date` datetime NOT NULL DEFAULT '1970-01-01 00:00:00',
  `pn_lu_uid` int(11) NOT NULL DEFAULT '0',
  `pn_displaytitle` tinyint(4) NOT NULL DEFAULT '1',
  `pn_displaycreated` tinyint(4) NOT NULL DEFAULT '1',
  `pn_displayupdated` tinyint(4) NOT NULL DEFAULT '1',
  `pn_displaytextinfo` tinyint(4) NOT NULL DEFAULT '1',
  `pn_displayprint` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`pn_pageid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de la taula `zk_quotes`
--

CREATE TABLE IF NOT EXISTS `zk_quotes` (
  `pn_qid` int(11) NOT NULL AUTO_INCREMENT,
  `pn_quote` text,
  `pn_author` varchar(150) NOT NULL,
  `pn_obj_status` varchar(1) NOT NULL DEFAULT 'A',
  `pn_cr_date` datetime NOT NULL DEFAULT '1970-01-01 00:00:00',
  `pn_cr_uid` int(11) NOT NULL DEFAULT '0',
  `pn_lu_date` datetime NOT NULL DEFAULT '1970-01-01 00:00:00',
  `pn_lu_uid` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`pn_qid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de la taula `zk_referer`
--

CREATE TABLE IF NOT EXISTS `zk_referer` (
  `pn_rid` int(11) NOT NULL AUTO_INCREMENT,
  `pn_url` varchar(255) NOT NULL DEFAULT '',
  `pn_frequency` int(11) DEFAULT NULL,
  PRIMARY KEY (`pn_rid`),
  KEY `url` (`pn_url`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de la taula `zk_scribite`
--

CREATE TABLE IF NOT EXISTS `zk_scribite` (
  `pn_mid` int(11) NOT NULL AUTO_INCREMENT,
  `pn_modname` varchar(64) NOT NULL DEFAULT '',
  `pn_modfunc` longtext NOT NULL,
  `pn_modareas` longtext NOT NULL,
  `pn_modeditor` varchar(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`pn_mid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=37 ;

--
-- Bolcant dades de la taula `zk_scribite`
--

INSERT INTO `zk_scribite` (`pn_mid`, `pn_modname`, `pn_modfunc`, `pn_modareas`, `pn_modeditor`) VALUES
(1, 'About', 'a:1:{i:0;s:6:"modify";}', 'a:1:{i:0;s:10:"about_info";}', '-'),
(2, 'Admin_Messages', 'a:2:{i:0;s:3:"new";i:1;s:6:"modify";}', 'a:1:{i:0;s:22:"admin_messages_content";}', 'xinha'),
(3, 'Book', 'a:1:{i:0;s:3:"all";}', 'a:1:{i:0;s:7:"content";}', '-'),
(4, 'ContentExpress', 'a:3:{i:0;s:0:"";i:1;s:10:"newcontent";i:2;s:11:"editcontent";}', 'a:1:{i:0;s:4:"text";}', '-'),
(5, 'crpCalendar', 'a:2:{i:0;s:3:"new";i:1;s:6:"modify";}', 'a:1:{i:0;s:22:"crpcalendar_event_text";}', '-'),
(6, 'cotype', 'a:2:{i:0;s:3:"new";i:1;s:4:"edit";}', 'a:1:{i:0;s:4:"text";}', '-'),
(7, 'element', 'a:5:{i:0;s:11:"start_topic";i:1;s:9:"add_topic";i:2;s:10:"edit_topic";i:3;s:10:"view_topic";i:4;s:9:"edit_post";}', 'a:1:{i:0;s:4:"comm";}', '-'),
(8, 'eventia', 'a:2:{i:0;s:3:"new";i:1;s:6:"modify";}', 'a:1:{i:0;s:26:"eventia_course_description";}', '-'),
(9, 'FAQ', 'a:2:{i:0;s:3:"new";i:1;s:6:"modify";}', 'a:1:{i:0;s:9:"faqanswer";}', '-'),
(10, 'htmlpages', 'a:2:{i:0;s:3:"new";i:1;s:6:"modify";}', 'a:1:{i:0;s:17:"htmlpages_content";}', '-'),
(11, 'Mailer', 'a:1:{i:0;s:10:"testconfig";}', 'a:1:{i:0;s:11:"mailer_body";}', '-'),
(12, 'mediashare', 'a:2:{i:0;s:8:"addmedia";i:1;s:8:"edititem";}', 'a:1:{i:0;s:3:"all";}', '-'),
(13, 'News', 'a:2:{i:0;s:3:"new";i:1;s:6:"modify";}', 'a:2:{i:0;s:13:"news_hometext";i:1;s:13:"news_bodytext";}', 'xinha'),
(14, 'PagEd', 'a:1:{i:0;s:3:"all";}', 'a:1:{i:0;s:5:"PagEd";}', '-'),
(15, 'Pages', 'a:2:{i:0;s:3:"new";i:1;s:6:"modify";}', 'a:1:{i:0;s:13:"pages_content";}', 'xinha'),
(16, 'pagesetter', 'a:1:{i:0;s:7:"pubedit";}', 'a:1:{i:0;s:3:"all";}', '-'),
(17, 'PhotoGallery', 'a:2:{i:0;s:11:"editgallery";i:1;s:9:"editphoto";}', 'a:1:{i:0;s:17:"photogallery_desc";}', '-'),
(18, 'pncommerce', 'a:1:{i:0;s:8:"itemedit";}', 'a:1:{i:0;s:15:"ItemDescription";}', '-'),
(19, 'pnForum', 'a:4:{i:0;s:9:"viewtopic";i:1;s:8:"newtopic";i:2;s:8:"editpost";i:3;s:5:"reply";}', 'a:1:{i:0;s:7:"message";}', '-'),
(20, 'pnhelp', 'a:1:{i:0;s:4:"edit";}', 'a:1:{i:0;s:4:"text";}', '-'),
(21, 'pnMessages', 'a:2:{i:0;s:5:"newpm";i:1;s:10:"replyinbox";}', 'a:1:{i:0;s:7:"message";}', '-'),
(22, 'pnWebLog', 'a:2:{i:0;s:10:"addposting";i:1;s:7:"addpage";}', 'a:1:{i:0;s:9:"xinhatext";}', '-'),
(23, 'Profile', 'a:1:{i:0;s:6:"modify";}', 'a:3:{i:0;s:9:"signature";i:1;s:9:"extrainfo";i:2;s:10:"yinterests";}', '-'),
(24, 'PostCalendar', 'a:1:{i:0;s:6:"submit";}', 'a:1:{i:0;s:11:"description";}', '-'),
(25, 'Reviews', 'a:2:{i:0;s:3:"new";i:1;s:6:"modify";}', 'a:1:{i:0;s:14:"reviews_review";}', '-'),
(26, 'ShoppingCart', 'a:1:{i:0;s:3:"all";}', 'a:1:{i:0;s:11:"description";}', '-'),
(27, 'tFAQ', 'a:2:{i:0;s:4:"view";i:1;s:6:"modify";}', 'a:1:{i:0;s:8:"tfanswer";}', '-'),
(28, 'content', 'a:1:{i:0;s:3:"all";}', 'a:1:{i:0;s:4:"text";}', 'xinha'),
(29, 'iw_messages', 'a:1:{i:0;s:7:"compose";}', 'a:1:{i:0;s:8:"intraweb";}', 'xinha'),
(30, 'iw_forums', 'a:3:{i:0;s:8:"nou_tema";i:1;s:7:"nou_msg";i:2;s:8:"edit_msg";}', 'a:1:{i:0;s:8:"intraweb";}', 'xinha'),
(31, 'iw_noteboard', 'a:1:{i:0;s:4:"nova";}', 'a:1:{i:0;s:8:"intraweb";}', 'xinha'),
(32, 'iw_forms', 'a:1:{i:0;s:3:"all";}', 'a:1:{i:0;s:8:"intraweb";}', 'xinha'),
(33, 'Blocks', 'a:1:{i:0;s:6:"modify";}', 'a:1:{i:0;s:14:"blocks_content";}', '-'),
(34, 'Newsletter', 'a:1:{i:0;s:11:"add_message";}', 'a:1:{i:0;s:7:"message";}', '-'),
(35, 'crpVideo', 'a:2:{i:0;s:3:"new";i:1;s:6:"modify";}', 'a:1:{i:0;s:13:"video_content";}', '-'),
(36, 'Web_Links', 'a:3:{i:0;s:8:"linkview";i:1;s:7:"addlink";i:2;s:17:"modifylinkrequest";}', 'a:1:{i:0;s:11:"description";}', '-');

-- --------------------------------------------------------

--
-- Estructura de la taula `zk_sc_anticracker`
--

CREATE TABLE IF NOT EXISTS `zk_sc_anticracker` (
  `pn_hid` int(11) NOT NULL AUTO_INCREMENT,
  `pn_hacktime` varchar(20) DEFAULT NULL,
  `pn_hackfile` varchar(255) DEFAULT '',
  `pn_hackline` int(11) DEFAULT NULL,
  `pn_hacktype` varchar(255) DEFAULT '',
  `pn_hackinfo` longtext,
  `pn_userid` int(11) DEFAULT NULL,
  `pn_browserinfo` longtext,
  `pn_requestarray` longtext,
  `pn_gettarray` longtext,
  `pn_postarray` longtext,
  `pn_serverarray` longtext,
  `pn_envarray` longtext,
  `pn_cookiearray` longtext,
  `pn_filesarray` longtext,
  `pn_sessionarray` longtext,
  PRIMARY KEY (`pn_hid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de la taula `zk_sc_log_event`
--

CREATE TABLE IF NOT EXISTS `zk_sc_log_event` (
  `lge_id` int(11) NOT NULL AUTO_INCREMENT,
  `lge_date` datetime DEFAULT NULL,
  `lge_uid` int(11) DEFAULT NULL,
  `lge_component` varchar(64) DEFAULT NULL,
  `lge_module` varchar(64) DEFAULT NULL,
  `lge_type` varchar(64) DEFAULT NULL,
  `lge_function` varchar(64) DEFAULT NULL,
  `lge_sec_component` varchar(64) DEFAULT NULL,
  `lge_sec_instance` varchar(64) DEFAULT NULL,
  `lge_sec_permission` varchar(64) DEFAULT NULL,
  `lge_message` varchar(255) DEFAULT '',
  PRIMARY KEY (`lge_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de la taula `zk_search_result`
--

CREATE TABLE IF NOT EXISTS `zk_search_result` (
  `sres_id` int(11) NOT NULL AUTO_INCREMENT,
  `sres_title` varchar(255) NOT NULL DEFAULT '',
  `sres_text` longtext,
  `sres_module` varchar(100) DEFAULT NULL,
  `sres_extra` varchar(100) DEFAULT NULL,
  `sres_created` datetime DEFAULT NULL,
  `sres_found` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `sres_sesid` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`sres_id`),
  KEY `title` (`sres_title`),
  KEY `module` (`sres_module`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de la taula `zk_search_stat`
--

CREATE TABLE IF NOT EXISTS `zk_search_stat` (
  `pn_id` int(11) NOT NULL AUTO_INCREMENT,
  `pn_search` varchar(50) NOT NULL DEFAULT '',
  `pn_count` int(11) NOT NULL DEFAULT '0',
  `pn_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`pn_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de la taula `zk_session_info`
--

CREATE TABLE IF NOT EXISTS `zk_session_info` (
  `pn_sessid` varchar(40) NOT NULL DEFAULT '',
  `pn_ipaddr` varchar(32) NOT NULL DEFAULT '',
  `pn_lastused` datetime DEFAULT '1970-01-01 00:00:00',
  `pn_uid` int(11) DEFAULT '0',
  `pn_remember` tinyint(4) NOT NULL DEFAULT '0',
  `pn_vars` longtext NOT NULL,
  PRIMARY KEY (`pn_sessid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de la taula `zk_themes`
--

CREATE TABLE IF NOT EXISTS `zk_themes` (
  `pn_id` int(11) NOT NULL AUTO_INCREMENT,
  `pn_name` varchar(64) NOT NULL DEFAULT '',
  `pn_type` tinyint(4) NOT NULL DEFAULT '0',
  `pn_displayname` varchar(64) NOT NULL DEFAULT '',
  `pn_description` varchar(255) NOT NULL DEFAULT '',
  `pn_regid` int(11) NOT NULL DEFAULT '0',
  `pn_directory` varchar(64) NOT NULL DEFAULT '',
  `pn_version` varchar(10) NOT NULL DEFAULT '0',
  `pn_official` tinyint(4) NOT NULL DEFAULT '0',
  `pn_author` varchar(255) NOT NULL DEFAULT '',
  `pn_contact` varchar(255) NOT NULL DEFAULT '',
  `pn_admin` tinyint(4) NOT NULL DEFAULT '0',
  `pn_user` tinyint(4) NOT NULL DEFAULT '0',
  `pn_system` tinyint(4) NOT NULL DEFAULT '0',
  `pn_state` tinyint(4) NOT NULL DEFAULT '0',
  `pn_credits` varchar(255) NOT NULL DEFAULT '',
  `pn_changelog` varchar(255) NOT NULL DEFAULT '',
  `pn_help` varchar(255) NOT NULL DEFAULT '',
  `pn_license` varchar(255) NOT NULL DEFAULT '',
  `pn_xhtml` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`pn_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=25 ;

--
-- Bolcant dades de la taula `zk_themes`
--

INSERT INTO `zk_themes` (`pn_id`, `pn_name`, `pn_type`, `pn_displayname`, `pn_description`, `pn_regid`, `pn_directory`, `pn_version`, `pn_official`, `pn_author`, `pn_contact`, `pn_admin`, `pn_user`, `pn_system`, `pn_state`, `pn_credits`, `pn_changelog`, `pn_help`, `pn_license`, `pn_xhtml`) VALUES
(2, 'RSS', 3, 'RSS', 'Entorn visual auxiliar per mostrar pàgines en format de font RSS.', 0, 'rss', '1.0', 0, 'Mark West', 'http://www.markwest.me.uk', 0, 0, 1, 1, 'docs/credits.txt', 'docs/changelog.txt', 'docs/help.txt', 'docs/license.txt', 0),
(5, 'Printer', 3, 'Printer', 'Display pages in a printer friendly format', 0, 'Printer', '2.0', 0, 'Mark West', 'http://www.markwest.me.uk', 0, 0, 1, 1, '', '', '', '', 1),
(7, 'Atom', 3, 'Atom', 'L''entorn visual ''Atom'' està dissenyat per mostrar pàgines amb llenguatge Atom.', 0, 'Atom', '1.0', 0, 'Franz Skaaning', 'http://www.lexebus.net/', 0, 0, 1, 1, '', '', '', '', 0),
(11, 'iw_mobile', 3, 'Intraweb mòbil', 'Entorn visual per a la navegació des de dispositius amb pantalles de petites dimensions, tals com PDA o telèfons 3G.', 0, 'iw_mobile', '1', 0, 'Toni Ginard', 'http://phobos.xtec.cat/intraweb/', 0, 1, 0, 1, '', '', '', '', 1),
(12, 'iw_xtec', 3, 'Intraweb xtec', 'Entorn visual desenvolupat per l''equip del projecte Intraweb per al servei ï¿½gora', 0, 'iw_xtec', '1.0', 0, 'Toni Ginard', 'toni.ginard@gmail.com', 1, 1, 1, 1, '', '', '', 'GNU/GPL', 1),
(18, 'iw_bluegrace_agora', 3, 'Intraweb Bluegrace Àgora', 'Entorn visual desenvolupat per l''equip del projecte Intraweb per al servei Àgora-intranets', 0, 'iw_bluegrace_agora', '1.0', 0, 'Toni Ginard', 'toni.ginard@gmail.com', 1, 1, 1, 1, '', '', '', 'GNU/GPL', 1),
(19, 'SeaBreeze', 3, 'SeaBreeze', 'The SeaBreeze theme is a browser-oriented theme, and was updated for the release of Zikula 1.0, with revised colours and new graphics.', 0, 'SeaBreeze', '3.1', 0, 'Carsten Volmer, Vanessa Haakenson, Mark West, Martin Andersen', 'http://www.zikula.org', 0, 1, 0, 1, '', '', '', '', 1),
(20, 'VoodooDolly', 3, 'VoodooDolly', 'The ''Voodoo Dolly'' theme - a conservative but Web 2.0 look and feel, ready to go.', 0, 'voodoodolly', '1.0', 0, 'Mark West, pogy366', 'http://www.markwest.me.uk, http://www.dbfnetwork.info/rayk/index.html', 0, 1, 0, 1, '', '', '', '', 1),
(23, 'andreas08', 3, 'Andreas08', 'The Andreas08 theme is a very good template for light CSS-compatible browser-oriented themes.', 0, 'andreas08', '1.1', 0, 'David Brucas, Mark West, Andreas Viklund', 'http://dbrucas.povpromotions.com, http://www.markwest.me.uk, http://www.andreasviklund.com', 1, 1, 0, 1, '', '', '', '', 1),
(24, 'iw_xtec2', 3, 'Intraweb XTEC2', 'Theme developed by the Intraweb project staff for the Agora service', 0, 'iw_xtec2', '1.0', 0, 'Albert Bachiller, Pau Ferrer', 'pferre22@xtec.cat', 1, 1, 1, 1, '', '', '', 'GNU/GPL', 1);

-- --------------------------------------------------------

--
-- Estructura de la taula `zk_userblocks`
--

CREATE TABLE IF NOT EXISTS `zk_userblocks` (
  `pn_uid` int(11) NOT NULL DEFAULT '0',
  `pn_bid` int(11) NOT NULL DEFAULT '0',
  `pn_active` tinyint(4) NOT NULL DEFAULT '1',
  `pn_last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  KEY `bid_uid_idx` (`pn_uid`,`pn_bid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de la taula `zk_users`
--

CREATE TABLE IF NOT EXISTS `zk_users` (
  `pn_uid` int(11) NOT NULL AUTO_INCREMENT,
  `pn_uname` varchar(25) NOT NULL DEFAULT '',
  `pn_email` varchar(60) NOT NULL DEFAULT '',
  `pn_user_regdate` datetime NOT NULL DEFAULT '1970-01-01 00:00:00',
  `pn_user_viewemail` smallint(6) DEFAULT '0',
  `pn_user_theme` varchar(64) DEFAULT '',
  `pn_pass` varchar(128) NOT NULL DEFAULT '',
  `pn_storynum` int(4) NOT NULL DEFAULT '10',
  `pn_ublockon` tinyint(4) NOT NULL DEFAULT '0',
  `pn_ublock` mediumtext,
  `pn_theme` varchar(255) NOT NULL DEFAULT '',
  `pn_counter` int(11) NOT NULL DEFAULT '0',
  `pn_activated` tinyint(4) NOT NULL DEFAULT '0',
  `pn_lastlogin` datetime NOT NULL DEFAULT '1970-01-01 00:00:00',
  `pn_validfrom` int(11) NOT NULL DEFAULT '0',
  `pn_validuntil` int(11) NOT NULL DEFAULT '0',
  `pn_hash_method` tinyint(4) NOT NULL DEFAULT '8',
  PRIMARY KEY (`pn_uid`),
  KEY `uname` (`pn_uname`),
  KEY `email` (`pn_email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Bolcant dades de la taula `zk_users`
--

INSERT INTO `zk_users` (`pn_uid`, `pn_uname`, `pn_email`, `pn_user_regdate`, `pn_user_viewemail`, `pn_user_theme`, `pn_pass`, `pn_storynum`, `pn_ublockon`, `pn_ublock`, `pn_theme`, `pn_counter`, `pn_activated`, `pn_lastlogin`, `pn_validfrom`, `pn_validuntil`, `pn_hash_method`) VALUES
(1, 'convidat', 'anonim@xtec.cat', '1970-01-01 00:00:00', 0, '', '', 10, 0, '', '', 0, 1, '1970-01-01 00:00:00', 0, 0, 1),
(2, 'admin', 'centre@xtec.cat', '1970-01-01 00:00:00', 0, '', '6142bfd56a583d891f0b1dcdbb2a9ef8', 10, 0, '', '', 0, 1, '1970-01-01 00:00:00', 0, 0, 1),
(3, 'profe1', 'exemple@xtec.cat', '1970-01-01 00:00:00', 0, '', 'aa72459f21421e8027a836f286729868', 10, 0, NULL, '', 0, 1, '1970-01-01 00:00:00', 0, 0, 1),
(4, 'profe2', 'exemple@xtec.cat', '1970-01-01 00:00:00', 0, '', '3ee91f6b0075241c722728c639793364', 10, 0, NULL, '', 0, 1, '1970-01-01 00:00:00', 0, 0, 1),
(5, 'profe3', 'exemple@xtec.cat', '1970-01-01 00:00:00', 0, '', '10d644b3d8776238df17bddf6553bcc2', 10, 0, NULL, '', 0, 1, '1970-01-01 00:00:00', 0, 0, 1),
(6, 'alum1', 'exemple@xtec.cat', '1970-01-01 00:00:00', 0, '', '27982df7ddd984f21422e0c66d59a9ea', 10, 0, NULL, '', 0, 1, '1970-01-01 00:00:00', 0, 0, 1),
(7, 'alum2', 'exemple@xtec.cat', '1970-01-01 00:00:00', 0, '', '9b6d111d0a30225ba56d463a217ea343', 10, 0, NULL, '', 0, 1, '1970-01-01 00:00:00', 0, 0, 1),
(8, 'alum3', 'exemple@xtec.cat', '1970-01-01 00:00:00', 0, '', 'a849cf2d6a5c88212428c543753944bf', 10, 0, NULL, '', 0, 1, '1970-01-01 00:00:00', 0, 0, 1),
(9, 'direccio', 'exemple@xtec.cat', '1970-01-01 00:00:00', 0, '', '9d49079cf135729f5b9f042350745002', 10, 0, NULL, '', 0, 1, '1970-01-01 00:00:00', 0, 0, 1),
(10, 'xtecadmin', 'agora@xtec.cat', '1970-01-01 00:00:00', 0, '', '6142bfd56a583d891f0b1dcdbb2a9ef8', 5, 0, '', '', 0, 1, '1970-01-01 00:00:00', 0, 0, 1),
(11, 'edicio', 'exemple@xtec.cat', '1970-01-01 00:00:00', 0, '', 'de4ecef2a7915a7a64ace0f85976282b', 10, 0, NULL, '', 0, 1, '1970-01-01 00:00:00', 0, 0, 1);

-- --------------------------------------------------------

--
-- Estructura de la taula `zk_users_temp`
--

CREATE TABLE IF NOT EXISTS `zk_users_temp` (
  `pn_tid` int(11) NOT NULL AUTO_INCREMENT,
  `pn_uname` varchar(25) NOT NULL DEFAULT '',
  `pn_email` varchar(60) NOT NULL DEFAULT '',
  `pn_femail` tinyint(4) NOT NULL DEFAULT '0',
  `pn_pass` varchar(128) NOT NULL DEFAULT '',
  `pn_dynamics` longtext NOT NULL,
  `pn_comment` varchar(254) NOT NULL DEFAULT '',
  `pn_type` tinyint(4) NOT NULL DEFAULT '0',
  `pn_tag` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`pn_tid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de la taula `zk_user_property`
--

CREATE TABLE IF NOT EXISTS `zk_user_property` (
  `pn_prop_id` int(11) NOT NULL AUTO_INCREMENT,
  `pn_prop_label` varchar(255) NOT NULL DEFAULT '',
  `pn_prop_dtype` int(11) NOT NULL DEFAULT '0',
  `pn_prop_weight` int(11) NOT NULL DEFAULT '0',
  `pn_prop_validation` text,
  `pn_prop_modname` varchar(64) NOT NULL DEFAULT '',
  `pn_prop_attribute_name` varchar(80) NOT NULL DEFAULT '',
  PRIMARY KEY (`pn_prop_id`),
  KEY `prop_label` (`pn_prop_label`),
  KEY `prop_attr` (`pn_prop_attribute_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- Bolcant dades de la taula `zk_user_property`
--

INSERT INTO `zk_user_property` (`pn_prop_id`, `pn_prop_label`, `pn_prop_dtype`, `pn_prop_weight`, `pn_prop_validation`, `pn_prop_modname`, `pn_prop_attribute_name`) VALUES
(1, '_UREALNAME', 1, 1, 'a:6:{s:8:"requerit";s:1:"0";s:7:"vistper";s:1:"0";s:5:"tipus";s:1:"0";s:13:"llistaopcions";s:0:"";s:4:"nota";s:0:"";s:9:"validacio";s:0:"";}', '', 'realname'),
(4, '_UFAKEMAIL', 1, 3, '', '', 'publicemail'),
(5, '_YOURHOMEPAGE', 1, 4, 'a:6:{s:8:"requerit";s:1:"0";s:7:"vistper";s:1:"0";s:5:"tipus";s:1:"0";s:13:"llistaopcions";s:0:"";s:4:"nota";s:0:"";s:9:"validacio";s:0:"";}', '', 'url'),
(6, '_TIMEZONEOFFSET', 1, 5, 'a:6:{s:8:"requerit";s:1:"0";s:7:"vistper";s:1:"0";s:5:"tipus";s:1:"0";s:13:"llistaopcions";s:0:"";s:4:"nota";s:0:"";s:9:"validacio";s:0:"";}', '', 'tzoffset'),
(7, '_YOURAVATAR', 1, 6, 'a:6:{s:8:"requerit";s:1:"0";s:7:"vistper";s:1:"0";s:5:"tipus";s:1:"0";s:13:"llistaopcions";s:0:"";s:4:"nota";s:0:"";s:9:"validacio";s:0:"";}', '', 'avatar'),
(8, '_YICQ', 1, 7, 'a:6:{s:8:"requerit";s:1:"0";s:7:"vistper";s:1:"0";s:5:"tipus";s:1:"0";s:13:"llistaopcions";s:0:"";s:4:"nota";s:0:"";s:9:"validacio";s:0:"";}', '', 'icq'),
(9, '_YAIM', 1, 8, 'a:6:{s:8:"requerit";s:1:"0";s:7:"vistper";s:1:"0";s:5:"tipus";s:1:"0";s:13:"llistaopcions";s:0:"";s:4:"nota";s:0:"";s:9:"validacio";s:0:"";}', '', 'aim'),
(10, '_YYIM', 1, 9, 'a:6:{s:8:"requerit";s:1:"0";s:7:"vistper";s:1:"0";s:5:"tipus";s:1:"0";s:13:"llistaopcions";s:0:"";s:4:"nota";s:0:"";s:9:"validacio";s:0:"";}', '', 'yim'),
(11, '_YMSNM', 1, 10, 'a:6:{s:8:"requerit";s:1:"0";s:7:"vistper";s:1:"0";s:5:"tipus";s:1:"0";s:13:"llistaopcions";s:0:"";s:4:"nota";s:0:"";s:9:"validacio";s:0:"";}', '', 'msnm'),
(12, '_YLOCATION', 1, 11, 'a:6:{s:8:"requerit";s:1:"0";s:7:"vistper";s:1:"0";s:5:"tipus";s:1:"0";s:13:"llistaopcions";s:0:"";s:4:"nota";s:0:"";s:9:"validacio";s:0:"";}', '', 'city'),
(13, '_YOCCUPATION', 1, 12, 'a:6:{s:8:"requerit";s:1:"0";s:7:"vistper";s:1:"0";s:5:"tipus";s:1:"0";s:13:"llistaopcions";s:0:"";s:4:"nota";s:0:"";s:9:"validacio";s:0:"";}', '', 'occupation'),
(14, '_SIGNATURE', 1, 13, 'a:6:{s:8:"requerit";s:1:"0";s:7:"vistper";s:1:"0";s:5:"tipus";s:1:"0";s:13:"llistaopcions";s:0:"";s:4:"nota";s:0:"";s:9:"validacio";s:0:"";}', '', 'signature'),
(15, '_EXTRAINFO', 1, 14, 'a:6:{s:8:"requerit";s:1:"0";s:7:"vistper";s:1:"0";s:5:"tipus";s:1:"0";s:13:"llistaopcions";s:0:"";s:4:"nota";s:0:"";s:9:"validacio";s:0:"";}', '', 'extrainfo'),
(16, '_YINTERESTS', 1, 15, 'a:6:{s:8:"requerit";s:1:"0";s:7:"vistper";s:1:"0";s:5:"tipus";s:1:"0";s:13:"llistaopcions";s:0:"";s:4:"nota";s:0:"";s:9:"validacio";s:0:"";}', '', 'interests');

-- --------------------------------------------------------

--
-- Estructura de la taula `zk_workflows`
--

CREATE TABLE IF NOT EXISTS `zk_workflows` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `metaid` int(11) NOT NULL DEFAULT '0',
  `module` varchar(255) NOT NULL DEFAULT '',
  `schemaname` varchar(255) NOT NULL DEFAULT '',
  `state` varchar(255) NOT NULL DEFAULT '',
  `type` smallint(6) NOT NULL DEFAULT '1',
  `obj_table` varchar(40) NOT NULL DEFAULT '',
  `obj_idcolumn` varchar(40) NOT NULL DEFAULT '',
  `obj_id` int(11) NOT NULL DEFAULT '0',
  `busy` int(11) NOT NULL DEFAULT '0',
  `debug` longblob,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
