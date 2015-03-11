-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Temps de generació: 18-02-2015 a les 17:32:49
-- Versió del servidor: 5.5.41
-- Versió de PHP : 5.4.37-1+deb.sury.org~precise+1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de dades: `usu1`
--

-- --------------------------------------------------------

--
-- Estructura de la taula `admin_category`
--

CREATE TABLE IF NOT EXISTS `admin_category` (
  `cid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  `description` varchar(254) NOT NULL,
  `sortorder` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`cid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Bolcant dades de la taula `admin_category`
--

INSERT INTO `admin_category` (`cid`, `name`, `description`, `sortorder`) VALUES
(1, 'Sistema', 'Mòduls de sistema', 1),
(2, 'Usuaris', 'Mòduls relacionats amb la gestió d''usuaris', 2),
(4, 'Continguts', 'Mòduls que proporcionen continguts per als usuaris', 0),
(5, 'Utilitats', 'Mòduls opcionals que no pertanyen ni a continguts ni  a intranet', 3);

-- --------------------------------------------------------

--
-- Estructura de la taula `admin_module`
--

CREATE TABLE IF NOT EXISTS `admin_module` (
  `amid` int(11) NOT NULL AUTO_INCREMENT,
  `mid` int(11) NOT NULL DEFAULT '0',
  `cid` int(11) NOT NULL DEFAULT '0',
  `sortorder` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`amid`),
  KEY `mid_cid` (`mid`,`cid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=716 ;

--
-- Bolcant dades de la taula `admin_module`
--

INSERT INTO `admin_module` (`amid`, `mid`, `cid`, `sortorder`) VALUES
(666, 51, 4, 50),
(667, 53, 5, 60),
(668, 8, 1, 30),
(669, 46, 4, 100),
(672, 81, 4, 30),
(673, 7, 5, 70),
(675, 104, 5, 50),
(676, 11, 1, 70),
(677, 12, 2, 10),
(678, 21, 1, 80),
(679, 108, 1, 90),
(680, 23, 2, 20),
(682, 106, 2, 50),
(683, 19, 1, 100),
(684, 3, 1, 40),
(685, 24, 1, 110),
(686, 1, 1, 50),
(687, 16, 1, 10),
(688, 5, 2, 40),
(689, 49, 1, 20),
(691, 89, 5, 40),
(692, 54, 4, 60),
(693, 56, 2, 70),
(694, 113, 5, 90),
(695, 94, 4, 80),
(698, 58, 5, 20),
(700, 10, 5, 110),
(702, 93, 2, 60),
(703, 27, 4, 10),
(705, 75, 4, 20),
(706, 50, 4, 90),
(707, 70, 5, 10),
(708, 72, 5, 30),
(709, 57, 4, 40),
(710, 59, 2, 30),
(711, 61, 1, 60),
(712, 60, 5, 100),
(714, 114, 4, 70),
(715, 115, 5, 80);

-- --------------------------------------------------------

--
-- Estructura de la taula `blocks`
--

CREATE TABLE IF NOT EXISTS `blocks` (
  `bid` int(11) NOT NULL AUTO_INCREMENT,
  `bkey` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` longtext NOT NULL,
  `url` longtext NOT NULL,
  `mid` int(11) NOT NULL DEFAULT '0',
  `filter` longtext NOT NULL,
  `active` tinyint(4) NOT NULL DEFAULT '1',
  `collapsable` int(11) NOT NULL DEFAULT '1',
  `defaultstate` int(11) NOT NULL DEFAULT '1',
  `refresh` int(11) NOT NULL DEFAULT '0',
  `last_update` datetime NOT NULL,
  `language` varchar(30) NOT NULL,
  `description` longtext NOT NULL,
  PRIMARY KEY (`bid`),
  KEY `active_idx` (`active`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- Bolcant dades de la taula `blocks`
--

INSERT INTO `blocks` (`bid`, `bkey`, `title`, `content`, `url`, `mid`, `filter`, `active`, `collapsable`, `defaultstate`, `refresh`, `last_update`, `language`, `description`) VALUES
(1, 'Extmenu', 'Menú principal', 'a:6:{s:14:"displaymodules";s:1:"0";s:10:"stylesheet";s:11:"extmenu.css";s:8:"template";s:24:"blocks_block_extmenu.tpl";s:11:"blocktitles";a:3:{s:2:"ca";s:15:"Menú principal";s:2:"en";s:9:"Main menu";s:2:"es";s:15:"Menú principal";}s:5:"links";a:3:{s:2:"en";a:13:{i:0;a:5:{s:5:"image";s:0:"";s:4:"name";s:7:"Agendas";s:3:"url";s:26:"index.php?module=IWagendas";s:5:"title";s:26:"Private and public agendas";s:6:"active";s:1:"1";}i:1;a:5:{s:5:"image";s:0:"";s:4:"name";s:6:"Search";s:3:"url";s:23:"index.php?module=Search";s:5:"title";s:21:"Search in the website";s:6:"active";s:1:"1";}i:2;a:5:{s:5:"image";s:0:"";s:4:"name";s:8:"Contents";s:3:"url";s:24:"index.php?module=content";s:5:"title";s:12:"Content list";s:6:"active";s:1:"1";}i:3;a:5:{s:5:"image";s:0:"";s:4:"name";s:12:"IWdocmanager";s:3:"url";s:29:"index.php?module=IWdocmanager";s:5:"title";s:15:"Go to downloads";s:6:"active";s:1:"1";}i:4;a:5:{s:5:"image";s:0:"";s:4:"name";s:5:"Forms";s:3:"url";s:24:"index.php?module=IWforms";s:5:"title";s:18:"Go to custom forms";s:6:"active";s:1:"1";}i:5;a:5:{s:5:"image";s:0:"";s:4:"name";s:6:"Forums";s:3:"url";s:25:"index.php?module=IWforums";s:5:"title";s:12:"Go to forums";s:6:"active";s:1:"1";}i:6;a:5:{s:5:"image";s:0:"";s:4:"name";s:5:"JClic";s:3:"url";s:24:"index.php?module=IWjclic";s:5:"title";s:16:"JClic activities";s:6:"active";s:1:"1";}i:7;a:5:{s:5:"image";s:0:"";s:4:"name";s:5:"Books";s:3:"url";s:24:"index.php?module=IWbooks";s:5:"title";s:16:"Go to books list";s:6:"active";s:1:"1";}i:8;a:5:{s:5:"image";s:0:"";s:4:"name";s:5:"Pages";s:3:"url";s:22:"index.php?module=Pages";s:5:"title";s:16:"Static web pages";s:6:"active";s:1:"1";}i:9;a:5:{s:5:"image";s:0:"";s:4:"name";s:17:"Quaderns Virtuals";s:3:"url";s:21:"index.php?module=IWqv";s:5:"title";s:23:"Go to Quaderns Virtuals";s:6:"active";s:1:"1";}i:10;a:5:{s:5:"image";s:0:"";s:4:"name";s:8:"Bookings";s:3:"url";s:27:"index.php?module=IWbookings";s:5:"title";s:18:"Go to room booking";s:6:"active";s:1:"1";}i:11;a:5:{s:5:"image";s:0:"";s:4:"name";s:9:"Noteboard";s:3:"url";s:28:"index.php?module=IWnoteboard";s:5:"title";s:19:"Go to the noteboard";s:6:"active";s:1:"1";}i:12;a:5:{s:5:"image";s:0:"";s:4:"name";s:5:"Users";s:3:"url";s:24:"index.php?module=IWusers";s:5:"title";s:10:"Users list";s:6:"active";s:1:"1";}}s:2:"ca";a:13:{i:0;a:5:{s:5:"image";s:0:"";s:4:"name";s:7:"Agendes";s:3:"url";s:26:"index.php?module=IWagendas";s:5:"title";s:28:"Agendes privada i públiques";s:6:"active";s:1:"1";}i:1;a:5:{s:5:"image";s:0:"";s:4:"name";s:7:"Cerques";s:3:"url";s:23:"index.php?module=Search";s:5:"title";s:21:"Cerques a la intranet";s:6:"active";s:1:"1";}i:2;a:5:{s:5:"image";s:0:"";s:4:"name";s:10:"Continguts";s:3:"url";s:24:"index.php?module=content";s:5:"title";s:20:"Llista de continguts";s:6:"active";s:1:"1";}i:3;a:5:{s:5:"image";s:0:"";s:4:"name";s:9:"Documents";s:3:"url";s:29:"index.php?module=IWdocmanager";s:5:"title";s:26:"Descàrregues de documents";s:6:"active";s:1:"1";}i:4;a:5:{s:5:"image";s:0:"";s:4:"name";s:10:"Formularis";s:3:"url";s:24:"index.php?module=IWforms";s:5:"title";s:25:"Formularis personalitzats";s:6:"active";s:1:"1";}i:5;a:5:{s:5:"image";s:0:"";s:4:"name";s:7:"Fòrums";s:3:"url";s:25:"index.php?module=IWforums";s:5:"title";s:20:"Espais de discussió";s:6:"active";s:1:"1";}i:6;a:5:{s:5:"image";s:0:"";s:4:"name";s:5:"JClic";s:3:"url";s:24:"index.php?module=IWjclic";s:5:"title";s:16:"Activitats JClic";s:6:"active";s:1:"1";}i:7;a:5:{s:5:"image";s:0:"";s:4:"name";s:18:"Llibres i lectures";s:3:"url";s:24:"index.php?module=IWbooks";s:5:"title";s:18:"Llistat de llibres";s:6:"active";s:1:"1";}i:8;a:5:{s:5:"image";s:0:"";s:4:"name";s:8:"Pàgines";s:3:"url";s:22:"index.php?module=Pages";s:5:"title";s:24:"Pàgines web estàtiques";s:6:"active";s:1:"1";}i:9;a:5:{s:5:"image";s:0:"";s:4:"name";s:17:"Quaderns Virtuals";s:3:"url";s:21:"index.php?module=IWqv";s:5:"title";s:26:"Vés als Quaderns Virtuals";s:6:"active";s:1:"1";}i:10;a:5:{s:5:"image";s:0:"";s:4:"name";s:8:"Reserves";s:3:"url";s:27:"index.php?module=IWbookings";s:5:"title";s:26:"Reserves d''espais i equips";s:6:"active";s:1:"1";}i:11;a:5:{s:5:"image";s:0:"";s:4:"name";s:6:"Tauler";s:3:"url";s:28:"index.php?module=IWnoteboard";s:5:"title";s:16:"Tauler d''anuncis";s:6:"active";s:1:"1";}i:12;a:5:{s:5:"image";s:0:"";s:4:"name";s:7:"Usuaris";s:3:"url";s:24:"index.php?module=IWusers";s:5:"title";s:16:"Llista d''usuaris";s:6:"active";s:1:"1";}}s:2:"es";a:13:{i:0;a:5:{s:5:"image";s:0:"";s:4:"name";s:7:"Agendas";s:3:"url";s:26:"index.php?module=IWagendas";s:5:"title";s:27:"Agendas privada y públicas";s:6:"active";s:1:"1";}i:1;a:5:{s:5:"image";s:0:"";s:4:"name";s:6:"Buscar";s:3:"url";s:23:"index.php?module=Search";s:5:"title";s:21:"Buscar en la intranet";s:6:"active";s:1:"1";}i:2;a:5:{s:5:"image";s:0:"";s:4:"name";s:10:"Contenidos";s:3:"url";s:24:"index.php?module=content";s:5:"title";s:19:"Lista de contenidos";s:6:"active";s:1:"1";}i:3;a:5:{s:5:"image";s:0:"";s:4:"name";s:9:"Descargas";s:3:"url";s:29:"index.php?module=IWdocmanager";s:5:"title";s:23:"Descargas de documentos";s:6:"active";s:1:"1";}i:4;a:5:{s:5:"image";s:0:"";s:4:"name";s:11:"Formularios";s:3:"url";s:24:"index.php?module=IWforms";s:5:"title";s:26:"Formularios personalizados";s:6:"active";s:1:"1";}i:5;a:5:{s:5:"image";s:0:"";s:4:"name";s:7:"Fórums";s:3:"url";s:25:"index.php?module=IWforums";s:5:"title";s:22:"Espacios de discusión";s:6:"active";s:1:"1";}i:6;a:5:{s:5:"image";s:0:"";s:4:"name";s:5:"JClic";s:3:"url";s:24:"index.php?module=IWjclic";s:5:"title";s:17:"Actividades JClic";s:6:"active";s:1:"1";}i:7;a:5:{s:5:"image";s:0:"";s:4:"name";s:17:"Libros y lecturas";s:3:"url";s:24:"index.php?module=IWbooks";s:5:"title";s:15:"Lista de libros";s:6:"active";s:1:"1";}i:8;a:5:{s:5:"image";s:0:"";s:4:"name";s:8:"Páginas";s:3:"url";s:22:"index.php?module=Pages";s:5:"title";s:23:"Páginas web estáticas";s:6:"active";s:1:"1";}i:9;a:5:{s:5:"image";s:0:"";s:4:"name";s:17:"Quaderns Virtuals";s:3:"url";s:21:"index.php?module=IWqv";s:5:"title";s:26:"Ir a los Quaderns Virtuals";s:6:"active";s:1:"1";}i:10;a:5:{s:5:"image";s:0:"";s:4:"name";s:8:"Reservas";s:3:"url";s:27:"index.php?module=IWbookings";s:5:"title";s:30:"Reservas de espacios y equipos";s:6:"active";s:1:"1";}i:11;a:5:{s:5:"image";s:0:"";s:4:"name";s:19:"Tablón de anuncios";s:3:"url";s:28:"index.php?module=IWnoteboard";s:5:"title";s:19:"Tablón de anuncios";s:6:"active";s:1:"1";}i:12;a:5:{s:5:"image";s:0:"";s:4:"name";s:8:"Usuarios";s:3:"url";s:24:"index.php?module=IWusers";s:5:"title";s:17:"Lista de usuarios";s:6:"active";s:1:"1";}}}s:12:"blockversion";s:1:"1";}', '', 3, 'a:0:{}', 1, 0, 1, 3600, '2013-11-19 17:23:58', '', ''),
(2, 'Lang', 'Idiomes', 'a:1:{s:9:"languages";a:3:{i:0;s:2:"ca";i:1;s:2:"en";i:2;s:2:"es";}}', '', 3, 'a:0:{}', 0, 1, 1, 3600, '2013-11-19 17:23:58', '', ''),
(3, 'Login', 'Entrada d''usuaris', '', '', 12, 'a:0:{}', 1, 1, 1, 3600, '2013-11-19 17:23:58', '', ''),
(5, 'Messages', 'Missatges d''administració', '', '', 24, 'a:0:{}', 1, 1, 1, 3600, '2013-11-19 17:23:58', '', ''),
(6, 'Online', 'Qui hi ha?', '', '', 12, 'a:0:{}', 1, 0, 1, 3600, '2013-11-19 17:23:58', '', ''),
(7, 'IWnews', 'Novetats', '', '', 49, 'a:0:{}', 1, 0, 1, 3600, '2013-11-19 17:23:58', '', ''),
(9, 'Calendar', 'Calendari', '', '', 51, 'a:0:{}', 1, 0, 1, 3600, '2013-11-19 17:23:58', '', ''),
(10, 'Next', 'Properes', '', '7', 51, 'a:0:{}', 1, 0, 1, 3600, '2013-11-19 17:23:58', '', ''),
(11, 'Nbheadlines', 'Titulars', '', '', 57, 'a:0:{}', 1, 0, 1, 3600, '2013-11-19 17:23:58', '', ''),
(12, 'Nbtopics', 'Temes del tauler', '', '', 57, 'a:0:{}', 1, 0, 1, 3600, '2013-11-19 17:23:58', '', ''),
(13, 'Myrole', 'El meu rol', '', '', 93, 'a:0:{}', 1, 0, 1, 3600, '2013-11-19 17:23:58', '', ''),
(14, 'Jclic', 'JClic', '', '', 94, 'a:0:{}', 1, 0, 1, 3600, '2013-11-19 17:23:58', '', ''),
(15, 'Qvsummary', 'Quaderns Virtuals', '', '', 50, 'a:0:{}', 1, 0, 1, 3600, '2013-11-19 17:23:58', '', ''),
(16, 'Extmenu', 'Menú d''edició', 'a:6:{s:14:"displaymodules";i:0;s:10:"stylesheet";s:11:"extmenu.css";s:8:"template";s:24:"blocks_block_extmenu.tpl";s:11:"blocktitles";a:2:{s:2:"en";s:13:"Editor''s menu";s:2:"ca";s:15:"Menú d''edició";}s:5:"links";a:2:{s:2:"en";a:4:{i:0;a:7:{s:5:"image";s:0:"";s:4:"name";s:7:"Content";s:3:"url";s:23:"{content:admin:newPage}";s:5:"title";s:0:"";s:6:"active";s:1:"1";s:8:"parentid";N;s:11:"haschildren";b:0;}i:1;a:7:{s:5:"image";s:0:"";s:4:"name";s:9:"Downloads";s:3:"url";s:26:"{IWdocmanager:user:newDoc}";s:5:"title";s:0:"";s:6:"active";s:1:"1";s:8:"parentid";N;s:11:"haschildren";b:0;}i:2;a:7:{s:5:"image";s:0:"";s:4:"name";s:4:"News";s:3:"url";s:19:"{News:user:newitem}";s:5:"title";s:0:"";s:6:"active";s:1:"1";s:8:"parentid";N;s:11:"haschildren";b:0;}i:3;a:7:{s:5:"image";s:0:"";s:4:"name";s:5:"Pages";s:3:"url";s:21:"{Pages:admin:newitem}";s:5:"title";s:0:"";s:6:"active";s:1:"1";s:8:"parentid";N;s:11:"haschildren";b:0;}}s:2:"ca";a:4:{i:0;a:7:{s:5:"image";s:0:"";s:4:"name";s:10:"Continguts";s:3:"url";s:23:"{content:admin:newPage}";s:5:"title";s:0:"";s:6:"active";s:1:"1";s:8:"parentid";N;s:11:"haschildren";b:0;}i:1;a:7:{s:5:"image";s:0:"";s:4:"name";s:9:"Documents";s:3:"url";s:26:"{IWdocmanager:user:newDoc}";s:5:"title";s:0:"";s:6:"active";s:1:"1";s:8:"parentid";N;s:11:"haschildren";b:0;}i:2;a:7:{s:5:"image";s:0:"";s:4:"name";s:9:"Notícies";s:3:"url";s:19:"{News:user:newitem}";s:5:"title";s:0:"";s:6:"active";s:1:"1";s:8:"parentid";N;s:11:"haschildren";b:0;}i:3;a:7:{s:5:"image";s:0:"";s:4:"name";s:8:"Pàgines";s:3:"url";s:21:"{Pages:admin:newitem}";s:5:"title";s:0:"";s:6:"active";s:1:"1";s:8:"parentid";N;s:11:"haschildren";b:0;}}}s:12:"blockversion";i:1;}', '', 3, 'a:0:{}', 1, 0, 1, 3600, '2013-11-19 18:09:36', '', '');

-- --------------------------------------------------------

--
-- Estructura de la taula `block_placements`
--

CREATE TABLE IF NOT EXISTS `block_placements` (
  `pid` int(11) NOT NULL DEFAULT '0',
  `bid` int(11) NOT NULL DEFAULT '0',
  `sortorder` int(11) NOT NULL DEFAULT '0',
  KEY `bid_pid_idx` (`bid`,`pid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Bolcant dades de la taula `block_placements`
--

INSERT INTO `block_placements` (`pid`, `bid`, `sortorder`) VALUES
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
-- Estructura de la taula `block_positions`
--

CREATE TABLE IF NOT EXISTS `block_positions` (
  `pid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`pid`),
  KEY `name_idx` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Bolcant dades de la taula `block_positions`
--

INSERT INTO `block_positions` (`pid`, `name`, `description`) VALUES
(1, 'left', 'Blocs de l''esquerra'),
(2, 'right', 'Blocs de la dreta'),
(3, 'center', 'Blocs centrals');

-- --------------------------------------------------------

--
-- Estructura de la taula `categories_category`
--

CREATE TABLE IF NOT EXISTS `categories_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL DEFAULT '1',
  `is_locked` tinyint(4) NOT NULL DEFAULT '0',
  `is_leaf` tinyint(4) NOT NULL DEFAULT '0',
  `name` varchar(255) NOT NULL DEFAULT '',
  `value` varchar(255) NOT NULL DEFAULT '',
  `sort_value` int(11) NOT NULL DEFAULT '0',
  `display_name` text,
  `display_desc` text,
  `path` text,
  `ipath` varchar(255) NOT NULL DEFAULT '',
  `status` varchar(1) NOT NULL DEFAULT 'A',
  `obj_status` varchar(1) NOT NULL DEFAULT 'A',
  `cr_date` datetime NOT NULL DEFAULT '1970-01-01 00:00:00',
  `cr_uid` int(11) NOT NULL DEFAULT '0',
  `lu_date` datetime NOT NULL DEFAULT '1970-01-01 00:00:00',
  `lu_uid` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_categories_parent` (`parent_id`),
  KEY `idx_categories_is_leaf` (`is_leaf`),
  KEY `idx_categories_name` (`name`),
  KEY `idx_categories_ipath` (`ipath`,`is_leaf`,`status`),
  KEY `idx_categories_status` (`status`),
  KEY `idx_categories_ipath_status` (`ipath`,`status`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10021 ;

--
-- Bolcant dades de la taula `categories_category`
--

INSERT INTO `categories_category` (`id`, `parent_id`, `is_locked`, `is_leaf`, `name`, `value`, `sort_value`, `display_name`, `display_desc`, `path`, `ipath`, `status`, `obj_status`, `cr_date`, `cr_uid`, `lu_date`, `lu_uid`) VALUES
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
-- Estructura de la taula `categories_mapmeta`
--

CREATE TABLE IF NOT EXISTS `categories_mapmeta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `meta_id` int(11) NOT NULL DEFAULT '0',
  `category_id` int(11) NOT NULL DEFAULT '0',
  `obj_status` varchar(1) NOT NULL DEFAULT 'A',
  `cr_date` datetime NOT NULL DEFAULT '1970-01-01 00:00:00',
  `cr_uid` int(11) NOT NULL DEFAULT '0',
  `lu_date` datetime NOT NULL DEFAULT '1970-01-01 00:00:00',
  `lu_uid` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_categories_mapmeta` (`meta_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de la taula `categories_mapobj`
--

CREATE TABLE IF NOT EXISTS `categories_mapobj` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `modname` varchar(60) NOT NULL DEFAULT '',
  `tablename` varchar(60) NOT NULL,
  `obj_id` int(11) NOT NULL DEFAULT '0',
  `obj_idcolumn` varchar(60) NOT NULL DEFAULT 'id',
  `reg_id` int(11) NOT NULL DEFAULT '0',
  `category_id` int(11) NOT NULL DEFAULT '0',
  `obj_status` varchar(1) NOT NULL DEFAULT 'A',
  `cr_date` datetime NOT NULL DEFAULT '1970-01-01 00:00:00',
  `cr_uid` int(11) NOT NULL DEFAULT '0',
  `lu_date` datetime NOT NULL DEFAULT '1970-01-01 00:00:00',
  `lu_uid` int(11) NOT NULL DEFAULT '0',
  `reg_property` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_categories_mapobj` (`modname`,`tablename`,`obj_id`,`obj_idcolumn`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Bolcant dades de la taula `categories_mapobj`
--

INSERT INTO `categories_mapobj` (`id`, `modname`, `tablename`, `obj_id`, `obj_idcolumn`, `reg_id`, `category_id`, `obj_status`, `cr_date`, `cr_uid`, `lu_date`, `lu_uid`, `reg_property`) VALUES
(8, 'News', 'news', 1, 'sid', 1, 10005, 'A', '2013-11-19 17:35:09', 10, '2013-11-19 17:35:09', 10, NULL);

-- --------------------------------------------------------

--
-- Estructura de la taula `categories_registry`
--

CREATE TABLE IF NOT EXISTS `categories_registry` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `modname` varchar(60) NOT NULL DEFAULT '',
  `tablename` varchar(60) NOT NULL DEFAULT '',
  `property` varchar(60) NOT NULL DEFAULT '',
  `category_id` int(11) NOT NULL DEFAULT '0',
  `obj_status` varchar(1) NOT NULL DEFAULT 'A',
  `cr_date` datetime NOT NULL DEFAULT '1970-01-01 00:00:00',
  `cr_uid` int(11) NOT NULL DEFAULT '0',
  `lu_date` datetime NOT NULL DEFAULT '1970-01-01 00:00:00',
  `lu_uid` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_categories_registry` (`modname`,`tablename`,`property`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Bolcant dades de la taula `categories_registry`
--

INSERT INTO `categories_registry` (`id`, `modname`, `tablename`, `property`, `category_id`, `obj_status`, `cr_date`, `cr_uid`, `lu_date`, `lu_uid`) VALUES
(1, 'News', 'news', 'Main', 30, 'A', '2008-09-04 13:25:03', 2, '2008-09-04 13:25:03', 2),
(2, 'Pages', 'pages', 'Main', 30, 'A', '2008-09-08 17:26:08', 2, '2008-09-08 17:26:08', 2),
(3, 'Content', 'content_page', 'primary', 30, 'A', '2008-09-08 17:51:46', 2, '2008-09-08 17:51:46', 2),
(8, 'Quotes', 'quotes', 'Main', 30, 'A', '2008-10-16 12:20:46', 2, '2008-10-16 12:20:46', 2);

-- --------------------------------------------------------

--
-- Estructura de la taula `content_content`
--

CREATE TABLE IF NOT EXISTS `content_content` (
  `con_id` int(11) NOT NULL AUTO_INCREMENT,
  `con_pageid` int(11) NOT NULL DEFAULT '0',
  `con_areaindex` int(11) NOT NULL DEFAULT '0',
  `con_position` int(11) NOT NULL DEFAULT '0',
  `con_stylepos` varchar(20) NOT NULL DEFAULT 'none',
  `con_stylewidth` varchar(20) NOT NULL DEFAULT 'wauto',
  `con_styleclass` varchar(100) NOT NULL,
  `con_module` varchar(100) NOT NULL,
  `con_type` varchar(100) NOT NULL,
  `con_data` longtext,
  `con_obj_status` varchar(1) NOT NULL DEFAULT 'A',
  `con_cr_date` datetime NOT NULL DEFAULT '1970-01-01 00:00:00',
  `con_cr_uid` int(11) NOT NULL DEFAULT '0',
  `con_lu_date` datetime NOT NULL DEFAULT '1970-01-01 00:00:00',
  `con_lu_uid` int(11) NOT NULL DEFAULT '0',
  `con_active` tinyint(4) NOT NULL DEFAULT '1',
  `con_visiblefor` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`con_id`),
  KEY `pageActive` (`con_pageid`,`con_active`),
  KEY `pagePosition` (`con_pageid`,`con_areaindex`,`con_position`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de la taula `content_history`
--

CREATE TABLE IF NOT EXISTS `content_history` (
  `ch_id` int(11) NOT NULL AUTO_INCREMENT,
  `ch_pageid` int(11) NOT NULL DEFAULT '0',
  `ch_data` longtext NOT NULL,
  `ch_revisionno` int(11) NOT NULL DEFAULT '0',
  `ch_action` varchar(255) NOT NULL,
  `ch_date` datetime NOT NULL,
  `ch_ipno` varchar(30) NOT NULL,
  `ch_userid` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ch_id`),
  KEY `entry` (`ch_pageid`,`ch_revisionno`),
  KEY `action` (`ch_action`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de la taula `content_page`
--

CREATE TABLE IF NOT EXISTS `content_page` (
  `page_id` int(11) NOT NULL AUTO_INCREMENT,
  `page_ppid` int(11) NOT NULL DEFAULT '0',
  `page_title` varchar(255) NOT NULL,
  `page_urlname` varchar(255) NOT NULL,
  `page_layout` varchar(100) NOT NULL,
  `page_categoryid` int(11) DEFAULT '0',
  `page_active` tinyint(4) NOT NULL DEFAULT '1',
  `page_activefrom` datetime DEFAULT NULL,
  `page_activeto` datetime DEFAULT NULL,
  `page_inmenu` tinyint(4) NOT NULL DEFAULT '1',
  `page_pos` int(11) NOT NULL DEFAULT '0',
  `page_level` int(11) NOT NULL DEFAULT '0',
  `page_setleft` int(11) NOT NULL DEFAULT '0',
  `page_setright` int(11) NOT NULL DEFAULT '0',
  `page_obj_status` varchar(1) NOT NULL DEFAULT 'A',
  `page_cr_date` datetime NOT NULL DEFAULT '1970-01-01 00:00:00',
  `page_cr_uid` int(11) NOT NULL DEFAULT '0',
  `page_lu_date` datetime NOT NULL DEFAULT '1970-01-01 00:00:00',
  `page_lu_uid` int(11) NOT NULL DEFAULT '0',
  `page_language` varchar(10) DEFAULT NULL,
  `page_showtitle` tinyint(4) NOT NULL DEFAULT '1',
  `page_metadescription` longtext NOT NULL,
  `page_metakeywords` longtext NOT NULL,
  `page_nohooks` tinyint(4) NOT NULL DEFAULT '0',
  `page_views` int(11) DEFAULT '0',
  `page_optString1` varchar(255) NOT NULL,
  `page_optString2` varchar(255) NOT NULL,
  `page_optText` longtext NOT NULL,
  PRIMARY KEY (`page_id`),
  KEY `parentPageId` (`page_ppid`,`page_pos`),
  KEY `leftright` (`page_setleft`,`page_setright`),
  KEY `categoryId` (`page_categoryid`),
  KEY `urlname` (`page_urlname`,`page_ppid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de la taula `content_pagecategory`
--

CREATE TABLE IF NOT EXISTS `content_pagecategory` (
  `con_pageid` int(11) NOT NULL,
  `con_categoryid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de la taula `content_searchable`
--

CREATE TABLE IF NOT EXISTS `content_searchable` (
  `search_cid` int(11) NOT NULL,
  `search_text` mediumtext,
  PRIMARY KEY (`search_cid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de la taula `content_translatedcontent`
--

CREATE TABLE IF NOT EXISTS `content_translatedcontent` (
  `transc_cid` int(11) NOT NULL DEFAULT '0',
  `transc_lang` varchar(10) NOT NULL,
  `transc_data` longtext,
  `transc_obj_status` varchar(1) NOT NULL DEFAULT 'A',
  `transc_cr_date` datetime NOT NULL DEFAULT '1970-01-01 00:00:00',
  `transc_cr_uid` int(11) NOT NULL DEFAULT '0',
  `transc_lu_date` datetime NOT NULL DEFAULT '1970-01-01 00:00:00',
  `transc_lu_uid` int(11) NOT NULL DEFAULT '0',
  KEY `entry` (`transc_cid`,`transc_lang`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de la taula `content_translatedpage`
--

CREATE TABLE IF NOT EXISTS `content_translatedpage` (
  `transp_pid` int(11) NOT NULL DEFAULT '0',
  `transp_lang` varchar(10) NOT NULL,
  `transp_title` varchar(255) NOT NULL,
  `transp_obj_status` varchar(1) NOT NULL DEFAULT 'A',
  `transp_cr_date` datetime NOT NULL DEFAULT '1970-01-01 00:00:00',
  `transp_cr_uid` int(11) NOT NULL DEFAULT '0',
  `transp_lu_date` datetime NOT NULL DEFAULT '1970-01-01 00:00:00',
  `transp_lu_uid` int(11) NOT NULL DEFAULT '0',
  `transp_metadescription` longtext NOT NULL,
  `transp_metakeywords` longtext NOT NULL,
  KEY `entry` (`transp_pid`,`transp_lang`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de la taula `Files`
--

CREATE TABLE IF NOT EXISTS `Files` (
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Bolcant dades de la taula `Files`
--

INSERT INTO `Files` (`fileId`, `userId`, `diskUse`, `obj_status`, `cr_date`, `cr_uid`, `lu_date`, `lu_uid`) VALUES
(1, 10, 153423, 'A', '1970-01-01 00:00:00', 0, '1970-01-01 00:00:00', 0);

-- --------------------------------------------------------

--
-- Estructura de la taula `formcontacts`
--

CREATE TABLE IF NOT EXISTS `formcontacts` (
  `pn_cid` int(11) NOT NULL AUTO_INCREMENT,
  `pn_name` varchar(40) NOT NULL,
  `pn_email` varchar(80) NOT NULL,
  `pn_public` tinyint(4) NOT NULL DEFAULT '0',
  `pn_sname` varchar(40) NOT NULL,
  `pn_semail` varchar(80) NOT NULL,
  `pn_ssubject` varchar(80) NOT NULL,
  PRIMARY KEY (`pn_cid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Bolcant dades de la taula `formcontacts`
--

INSERT INTO `formcontacts` (`pn_cid`, `pn_name`, `pn_email`, `pn_public`, `pn_sname`, `pn_semail`, `pn_ssubject`) VALUES
(1, 'Webmaster', 'mostra@exemple.cat', 1, 'Webmaster', 'mostra@exemple.cat', 'Correu electrònic de %s');

-- --------------------------------------------------------

--
-- Estructura de la taula `formsubmits`
--

CREATE TABLE IF NOT EXISTS `formsubmits` (
  `pn_sid` int(11) NOT NULL AUTO_INCREMENT,
  `pn_form` int(11) NOT NULL,
  `pn_cid` int(11) NOT NULL,
  `pn_ip` varchar(255) NOT NULL,
  `pn_host` varchar(255) NOT NULL,
  `pn_name` varchar(255) NOT NULL,
  `pn_email` varchar(255) NOT NULL,
  `pn_phone` varchar(255) NOT NULL,
  `pn_company` varchar(255) NOT NULL,
  `pn_url` varchar(255) NOT NULL,
  `pn_location` varchar(255) NOT NULL,
  `pn_comment` longtext NOT NULL,
  `pn_customdata` longtext NOT NULL,
  `pn_obj_status` varchar(1) NOT NULL DEFAULT 'A',
  `pn_cr_date` datetime NOT NULL DEFAULT '1970-01-01 00:00:00',
  `pn_cr_uid` int(11) NOT NULL DEFAULT '0',
  `pn_lu_date` datetime NOT NULL DEFAULT '1970-01-01 00:00:00',
  `pn_lu_uid` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`pn_sid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de la taula `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `gid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `gtype` tinyint(4) NOT NULL DEFAULT '0',
  `description` varchar(200) NOT NULL,
  `prefix` varchar(25) NOT NULL,
  `state` tinyint(4) NOT NULL DEFAULT '0',
  `nbuser` int(11) NOT NULL DEFAULT '0',
  `nbumax` int(11) NOT NULL DEFAULT '0',
  `link` int(11) NOT NULL DEFAULT '0',
  `uidmaster` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`gid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Bolcant dades de la taula `groups`
--

INSERT INTO `groups` (`gid`, `name`, `gtype`, `description`, `prefix`, `state`, `nbuser`, `nbumax`, `link`, `uidmaster`) VALUES
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
-- Estructura de la taula `group_applications`
--

CREATE TABLE IF NOT EXISTS `group_applications` (
  `app_id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL DEFAULT '0',
  `gid` int(11) NOT NULL DEFAULT '0',
  `application` longtext NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`app_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de la taula `group_membership`
--

CREATE TABLE IF NOT EXISTS `group_membership` (
  `gid` int(11) NOT NULL DEFAULT '0',
  `uid` int(11) NOT NULL DEFAULT '0',
  KEY `gid_uid` (`uid`,`gid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Bolcant dades de la taula `group_membership`
--

INSERT INTO `group_membership` (`gid`, `uid`) VALUES
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
-- Estructura de la taula `group_perms`
--

CREATE TABLE IF NOT EXISTS `group_perms` (
  `pid` int(11) NOT NULL AUTO_INCREMENT,
  `gid` int(11) NOT NULL DEFAULT '0',
  `sequence` int(11) NOT NULL DEFAULT '0',
  `realm` int(11) NOT NULL DEFAULT '0',
  `component` varchar(255) NOT NULL,
  `instance` varchar(255) NOT NULL,
  `level` int(11) NOT NULL DEFAULT '0',
  `bond` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`pid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=36 ;

--
-- Bolcant dades de la taula `group_perms`
--

INSERT INTO `group_perms` (`pid`, `gid`, `sequence`, `realm`, `component`, `instance`, `level`, `bond`) VALUES
(1, 2, 0, 0, '.*', '.*', 800, 0),
(2, 4, 10, 0, 'IWqv::', '.*', 600, 0),
(3, 1, 21, 0, '.*', '.*', 300, 0),
(4, 4, 12, 0, 'IWbookings::', '.*', 600, 0),
(5, 0, 25, 0, '.*', '.*', 200, 0),
(7, 8, 2, 0, 'Content::', '.*', 700, 0),
(13, 8, 3, 0, 'Pages::', '.*', 700, 0),
(14, 8, 4, 0, 'News::', '.*', 700, 0),
(18, 0, 23, 0, 'IWdocmanager::', '.*', 0, 0),
(19, 0, 24, 0, 'ExtendedMenublock::', '1:3:', 0, 0),
(20, 9, 1, 0, 'IWmyrole::', '::', 800, 0),
(21, 4, 11, 0, 'IWjclic::', '.*', 600, 0),
(22, 3, 15, 0, 'Categories::Category', '10001::', 200, 0),
(23, 5, 14, 0, 'Categories::Category', '(10001|10002|10003)::', 200, 0),
(24, 4, 13, 0, 'Categories::Category', '(10001|10002)::', 200, 0),
(25, 8, 7, 0, 'Categories::Category', '::', 200, 0),
(26, 6, 16, 0, 'Categories::Category', '(10001|10003)::', 200, 0),
(27, 1, 17, 0, 'Categories::Category', '(10004|10005)::', 200, 0),
(28, 0, 22, 0, 'Categories::Category', '(10005|10006)::', 200, 0),
(29, -1, 18, 0, 'Categories::Category', '::', 0, 0),
(30, -1, 19, 0, 'Categories::', '::', 200, 0),
(31, 8, 8, 0, 'ExtendedMenublock::', '16::', 200, 0),
(32, -1, 9, 0, 'ExtendedMenublock::', '16::', 0, 0),
(33, 8, 5, 0, 'Files::', '::', 600, 0),
(34, 1, 20, 0, 'News::', '.*', 200, 0),
(35, 8, 6, 0, 'IWdocmanager::', '.*', 700, 0);

-- --------------------------------------------------------

--
-- Estructura de la taula `hooks`
--

CREATE TABLE IF NOT EXISTS `hooks` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `object` varchar(64) NOT NULL,
  `action` varchar(64) NOT NULL,
  `smodule` varchar(64) NOT NULL,
  `stype` varchar(64) NOT NULL,
  `tarea` varchar(64) NOT NULL,
  `tmodule` varchar(64) NOT NULL,
  `ttype` varchar(64) NOT NULL,
  `tfunc` varchar(64) NOT NULL,
  `sequence` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `smodule` (`smodule`),
  KEY `smodule_tmodule` (`smodule`,`tmodule`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de la taula `hook_area`
--

CREATE TABLE IF NOT EXISTS `hook_area` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `owner` varchar(40) NOT NULL,
  `subowner` varchar(40) DEFAULT NULL,
  `areatype` varchar(1) NOT NULL,
  `category` varchar(20) NOT NULL,
  `areaname` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `areaidx` (`areaname`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

--
-- Bolcant dades de la taula `hook_area`
--

INSERT INTO `hook_area` (`id`, `owner`, `subowner`, `areatype`, `category`, `areaname`) VALUES
(1, 'Users', NULL, 's', 'ui_hooks', 'subscriber.users.ui_hooks.user'),
(2, 'Users', NULL, 's', 'ui_hooks', 'subscriber.users.ui_hooks.registration'),
(3, 'Users', NULL, 's', 'ui_hooks', 'subscriber.users.ui_hooks.login_screen'),
(4, 'Users', NULL, 's', 'ui_hooks', 'subscriber.users.ui_hooks.login_block'),
(7, 'Formicula', NULL, 's', 'ui_hooks', 'subscriber.formicula.ui_hooks.forms'),
(8, 'News', NULL, 's', 'ui_hooks', 'subscriber.news.ui_hooks.articles'),
(9, 'News', NULL, 's', 'filter_hooks', 'subscriber.news.filter_hooks.articles'),
(10, 'Pages', NULL, 's', 'ui_hooks', 'subscriber.pages.ui_hooks.pages'),
(11, 'Pages', NULL, 's', 'filter_hooks', 'subscriber.pages.filter_hooks.pagesfilter'),
(12, 'Blocks', NULL, 's', 'ui_hooks', 'subscriber.blocks.ui_hooks.htmlblock.content'),
(13, 'Content', NULL, 's', 'ui_hooks', 'subscriber.content.ui_hooks.htmlcontenttype'),
(14, 'Content', NULL, 's', 'ui_hooks', 'subscriber.content.ui_hooks.pages'),
(15, 'Content', NULL, 's', 'filter_hooks', 'subscriber.content.filter_hooks.htmlcontenttype'),
(16, 'IWforms', NULL, 's', 'ui_hooks', 'subscriber.iwforms.ui_hooks.iwforms'),
(17, 'IWforums', NULL, 's', 'ui_hooks', 'subscriber.IWforums.ui_hooks.IWforums'),
(18, 'IWmessages', NULL, 's', 'ui_hooks', 'subscriber.iwmessages.ui_hooks.iwmessages'),
(19, 'IWnoteboard', NULL, 's', 'ui_hooks', 'subscriber.iwnoteboard.ui_hooks.iwnoteboard'),
(20, 'Scribite', NULL, 'p', 'ui_hooks', 'provider.scribite.ui_hooks.editor');

-- --------------------------------------------------------

--
-- Estructura de la taula `hook_binding`
--

CREATE TABLE IF NOT EXISTS `hook_binding` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sowner` varchar(40) NOT NULL,
  `subsowner` varchar(40) DEFAULT NULL,
  `powner` varchar(40) NOT NULL,
  `subpowner` varchar(40) DEFAULT NULL,
  `sareaid` int(11) NOT NULL,
  `pareaid` int(11) NOT NULL,
  `category` varchar(20) NOT NULL,
  `sortorder` smallint(6) NOT NULL DEFAULT '999',
  PRIMARY KEY (`id`),
  KEY `sortidx` (`sareaid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Bolcant dades de la taula `hook_binding`
--

INSERT INTO `hook_binding` (`id`, `sowner`, `subsowner`, `powner`, `subpowner`, `sareaid`, `pareaid`, `category`, `sortorder`) VALUES
(1, 'News', NULL, 'Scribite', NULL, 8, 20, 'ui_hooks', 999),
(2, 'IWnoteboard', NULL, 'Scribite', NULL, 19, 20, 'ui_hooks', 999),
(3, 'IWmessages', NULL, 'Scribite', NULL, 18, 20, 'ui_hooks', 999),
(4, 'IWforms', NULL, 'Scribite', NULL, 16, 20, 'ui_hooks', 999),
(5, 'Pages', NULL, 'Scribite', NULL, 10, 20, 'ui_hooks', 999),
(6, 'Content', NULL, 'Scribite', NULL, 13, 20, 'ui_hooks', 999),
(7, 'Content', NULL, 'Scribite', NULL, 14, 20, 'ui_hooks', 999),
(8, 'IWforums', NULL, 'Scribite', NULL, 17, 20, 'ui_hooks', 999);

-- --------------------------------------------------------

--
-- Estructura de la taula `hook_provider`
--

CREATE TABLE IF NOT EXISTS `hook_provider` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `owner` varchar(40) NOT NULL,
  `subowner` varchar(40) DEFAULT NULL,
  `pareaid` int(11) NOT NULL,
  `hooktype` varchar(20) NOT NULL,
  `category` varchar(20) NOT NULL,
  `classname` varchar(60) NOT NULL,
  `method` varchar(20) NOT NULL,
  `serviceid` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nameidx` (`pareaid`,`hooktype`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Bolcant dades de la taula `hook_provider`
--

INSERT INTO `hook_provider` (`id`, `owner`, `subowner`, `pareaid`, `hooktype`, `category`, `classname`, `method`, `serviceid`) VALUES
(1, 'Scribite', NULL, 20, 'form_edit', 'ui_hooks', 'Scribite_HookHandlers', 'uiEdit', 'scribite.editor');

-- --------------------------------------------------------

--
-- Estructura de la taula `hook_runtime`
--

CREATE TABLE IF NOT EXISTS `hook_runtime` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sowner` varchar(40) NOT NULL,
  `subsowner` varchar(40) DEFAULT NULL,
  `powner` varchar(40) NOT NULL,
  `subpowner` varchar(40) DEFAULT NULL,
  `sareaid` int(11) NOT NULL,
  `pareaid` int(11) NOT NULL,
  `eventname` varchar(100) NOT NULL,
  `classname` varchar(60) NOT NULL,
  `method` varchar(20) NOT NULL,
  `serviceid` varchar(60) DEFAULT NULL,
  `priority` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Bolcant dades de la taula `hook_runtime`
--

INSERT INTO `hook_runtime` (`id`, `sowner`, `subsowner`, `powner`, `subpowner`, `sareaid`, `pareaid`, `eventname`, `classname`, `method`, `serviceid`, `priority`) VALUES
(1, 'News', NULL, 'Scribite', NULL, 8, 20, 'news.ui_hooks.articles.form_edit', 'Scribite_HookHandlers', 'uiEdit', 'scribite.editor', 10),
(2, 'IWnoteboard', NULL, 'Scribite', NULL, 19, 20, 'iwnoteboard.ui_hooks.iwnoteboard.form_edit', 'Scribite_HookHandlers', 'uiEdit', 'scribite.editor', 10),
(3, 'IWmessages', NULL, 'Scribite', NULL, 18, 20, 'iwmessages.ui_hooks.iwmessages.form_edit', 'Scribite_HookHandlers', 'uiEdit', 'scribite.editor', 10),
(4, 'IWforms', NULL, 'Scribite', NULL, 16, 20, 'iwforms.ui_hooks.iwforms.form_edit', 'Scribite_HookHandlers', 'uiEdit', 'scribite.editor', 10),
(5, 'Pages', NULL, 'Scribite', NULL, 10, 20, 'pages.ui_hooks.pages.form_edit', 'Scribite_HookHandlers', 'uiEdit', 'scribite.editor', 10),
(6, 'Content', NULL, 'Scribite', NULL, 13, 20, 'content.ui_hooks.htmlcontenttype.form_edit', 'Scribite_HookHandlers', 'uiEdit', 'scribite.editor', 10),
(7, 'IWforums', NULL, 'Scribite', NULL, 17, 20, 'IWforums.ui_hooks.IWforums.form_edit', 'Scribite_HookHandlers', 'uiEdit', 'scribite.editor', 10);

-- --------------------------------------------------------

--
-- Estructura de la taula `hook_subscriber`
--

CREATE TABLE IF NOT EXISTS `hook_subscriber` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `owner` varchar(40) NOT NULL,
  `subowner` varchar(40) DEFAULT NULL,
  `sareaid` int(11) NOT NULL,
  `hooktype` varchar(20) NOT NULL,
  `category` varchar(20) NOT NULL,
  `eventname` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `myindex` (`eventname`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=67 ;

--
-- Bolcant dades de la taula `hook_subscriber`
--

INSERT INTO `hook_subscriber` (`id`, `owner`, `subowner`, `sareaid`, `hooktype`, `category`, `eventname`) VALUES
(1, 'Users', NULL, 1, 'display_view', 'ui_hooks', 'users.ui_hooks.user.display_view'),
(2, 'Users', NULL, 1, 'form_edit', 'ui_hooks', 'users.ui_hooks.user.form_edit'),
(3, 'Users', NULL, 1, 'validate_edit', 'ui_hooks', 'users.ui_hooks.user.validate_edit'),
(4, 'Users', NULL, 1, 'process_edit', 'ui_hooks', 'users.ui_hooks.user.process_edit'),
(5, 'Users', NULL, 1, 'form_delete', 'ui_hooks', 'users.ui_hooks.user.form_delete'),
(6, 'Users', NULL, 1, 'validate_delete', 'ui_hooks', 'users.ui_hooks.user.validate_delete'),
(7, 'Users', NULL, 1, 'process_delete', 'ui_hooks', 'users.ui_hooks.user.process_delete'),
(8, 'Users', NULL, 2, 'display_view', 'ui_hooks', 'users.ui_hooks.registration.display_view'),
(9, 'Users', NULL, 2, 'form_edit', 'ui_hooks', 'users.ui_hooks.registration.form_edit'),
(10, 'Users', NULL, 2, 'validate_edit', 'ui_hooks', 'users.ui_hooks.registration.validate_edit'),
(11, 'Users', NULL, 2, 'process_edit', 'ui_hooks', 'users.ui_hooks.registration.process_edit'),
(12, 'Users', NULL, 2, 'form_delete', 'ui_hooks', 'users.ui_hooks.registration.form_delete'),
(13, 'Users', NULL, 2, 'validate_delete', 'ui_hooks', 'users.ui_hooks.registration.validate_delete'),
(14, 'Users', NULL, 2, 'process_delete', 'ui_hooks', 'users.ui_hooks.registration.process_delete'),
(15, 'Users', NULL, 3, 'form_edit', 'ui_hooks', 'users.ui_hooks.login_screen.form_edit'),
(16, 'Users', NULL, 3, 'validate_edit', 'ui_hooks', 'users.ui_hooks.login_screen.validate_edit'),
(17, 'Users', NULL, 3, 'process_edit', 'ui_hooks', 'users.ui_hooks.login_screen.process_edit'),
(18, 'Users', NULL, 4, 'form_edit', 'ui_hooks', 'users.ui_hooks.login_block.form_edit'),
(19, 'Users', NULL, 4, 'validate_edit', 'ui_hooks', 'users.ui_hooks.login_block.validate_edit'),
(20, 'Users', NULL, 4, 'process_edit', 'ui_hooks', 'users.ui_hooks.login_block.process_edit'),
(29, 'Formicula', NULL, 7, 'form_edit', 'ui_hooks', 'formicula.ui_hooks.forms.form_edit'),
(30, 'Formicula', NULL, 7, 'validate_edit', 'ui_hooks', 'formicula.ui_hooks.forms.validate_edit'),
(31, 'News', NULL, 8, 'display_view', 'ui_hooks', 'news.ui_hooks.articles.display_view'),
(32, 'News', NULL, 8, 'form_edit', 'ui_hooks', 'news.ui_hooks.articles.form_edit'),
(33, 'News', NULL, 8, 'form_delete', 'ui_hooks', 'news.ui_hooks.articles.form_delete'),
(34, 'News', NULL, 8, 'validate_edit', 'ui_hooks', 'news.ui_hooks.articles.validate_edit'),
(35, 'News', NULL, 8, 'validate_delete', 'ui_hooks', 'news.ui_hooks.articles.validate_delete'),
(36, 'News', NULL, 8, 'process_edit', 'ui_hooks', 'news.ui_hooks.articles.process_edit'),
(37, 'News', NULL, 8, 'process_delete', 'ui_hooks', 'news.ui_hooks.articles.process_delete'),
(38, 'News', NULL, 9, 'filter', 'filter_hooks', 'news.filter_hooks.articles.filter'),
(39, 'Pages', NULL, 10, 'display_view', 'ui_hooks', 'pages.ui_hooks.pages.display_view'),
(40, 'Pages', NULL, 10, 'form_edit', 'ui_hooks', 'pages.ui_hooks.pages.form_edit'),
(41, 'Pages', NULL, 10, 'form_delete', 'ui_hooks', 'pages.ui_hooks.pages.form_delete'),
(42, 'Pages', NULL, 10, 'validate_edit', 'ui_hooks', 'pages.ui_hooks.pages.validate_edit'),
(43, 'Pages', NULL, 10, 'validate_delete', 'ui_hooks', 'pages.ui_hooks.pages.validate_delete'),
(44, 'Pages', NULL, 10, 'process_edit', 'ui_hooks', 'pages.ui_hooks.pages.process_edit'),
(45, 'Pages', NULL, 10, 'process_delete', 'ui_hooks', 'pages.ui_hooks.pages.process_delete'),
(46, 'Pages', NULL, 11, 'filter', 'filter_hooks', 'pages.filter_hooks.pages.filter'),
(47, 'Blocks', NULL, 12, 'form_edit', 'ui_hooks', 'blocks.ui_hooks.htmlblock.content.form_edit'),
(48, 'Content', NULL, 13, 'display_view', 'ui_hooks', 'content.ui_hooks.htmlcontenttype.display_view'),
(49, 'Content', NULL, 13, 'form_edit', 'ui_hooks', 'content.ui_hooks.htmlcontenttype.form_edit'),
(50, 'Content', NULL, 13, 'form_delete', 'ui_hooks', 'content.ui_hooks.htmlcontenttype.form_delete'),
(51, 'Content', NULL, 13, 'validate_edit', 'ui_hooks', 'content.ui_hooks.htmlcontenttype.validate_edit'),
(52, 'Content', NULL, 13, 'validate_delete', 'ui_hooks', 'content.ui_hooks.htmlcontenttype.validate_delete'),
(53, 'Content', NULL, 13, 'process_edit', 'ui_hooks', 'content.ui_hooks.htmlcontenttype.process_edit'),
(54, 'Content', NULL, 13, 'process_delete', 'ui_hooks', 'content.ui_hooks.htmlcontenttype.process_delete'),
(55, 'Content', NULL, 14, 'display_view', 'ui_hooks', 'content.ui_hooks.pages.display_view'),
(56, 'Content', NULL, 14, 'form_edit', 'ui_hooks', 'content.ui_hooks.pages.form_edit'),
(57, 'Content', NULL, 14, 'form_delete', 'ui_hooks', 'content.ui_hooks.pages.form_delete'),
(58, 'Content', NULL, 14, 'validate_edit', 'ui_hooks', 'content.ui_hooks.pages.validate_edit'),
(59, 'Content', NULL, 14, 'validate_delete', 'ui_hooks', 'content.ui_hooks.pages.validate_delete'),
(60, 'Content', NULL, 14, 'process_edit', 'ui_hooks', 'content.ui_hooks.pages.process_edit'),
(61, 'Content', NULL, 14, 'process_delete', 'ui_hooks', 'content.ui_hooks.pages.process_delete'),
(62, 'Content', NULL, 15, 'filter', 'filter_hooks', 'content.filter_hooks.htmlcontenttype.filter'),
(63, 'IWforms', NULL, 16, 'form_edit', 'ui_hooks', 'iwforms.ui_hooks.iwforms.form_edit'),
(64, 'IWforums', NULL, 17, 'form_edit', 'ui_hooks', 'IWforums.ui_hooks.IWforums.form_edit'),
(65, 'IWmessages', NULL, 18, 'form_edit', 'ui_hooks', 'iwmessages.ui_hooks.iwmessages.form_edit'),
(66, 'IWnoteboard', NULL, 19, 'form_edit', 'ui_hooks', 'iwnoteboard.ui_hooks.iwnoteboard.form_edit');

-- --------------------------------------------------------

--
-- Estructura de la taula `IWagendas`
--

CREATE TABLE IF NOT EXISTS `IWagendas` (
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
-- Estructura de la taula `IWagendas_definition`
--

CREATE TABLE IF NOT EXISTS `IWagendas_definition` (
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
-- Bolcant dades de la taula `IWagendas_definition`
--

INSERT INTO `IWagendas_definition` (`daid`, `nom_agenda`, `descriu`, `c1`, `c2`, `c3`, `c4`, `c5`, `c6`, `tc1`, `tc2`, `tc3`, `tc4`, `tc5`, `tc6`, `op2`, `op3`, `op4`, `op5`, `op6`, `grup`, `resp`, `activa`, `adjunts`, `protegida`, `color`, `pn_obj_status`, `pn_cr_date`, `pn_cr_uid`, `pn_lu_date`, `pn_lu_uid`, `gCalendarId`, `gAccessLevel`, `gColor`) VALUES
(1, 'Reunions', 'Agenda de reunions', 'Motiu de la reunió', 'Assistents', 'Lloc de la reunió', 'Ordre del dia', '', '', 1, 2, 5, 2, 1, 1, '', 'Biblioteca-Sala Professorat-Aula 1-Aula 2', '', '', '', '$$4|1$', '$$2$', 1, 0, 0, '#CC6666', 'A', '2008-09-10 16:42:33', 2, '2008-09-10 16:43:28', 2, '', '', ''),
(2, 'Sortides', 'Informació de les sortides que es fan al centre', 'Grup que va a la sortida', 'Lloc de la sortida', 'Tipus de sortida', '', '', '', 1, 1, 5, 1, 1, 1, '', 'De matí-De tarda-Tot el dia-Diversos dies', '', '', '', '$$4|3$', '$$2$$3$', 1, 0, 0, '#FFFF99', 'A', '2008-09-10 16:45:33', 2, '2008-09-10 16:46:50', 2, '', '', ''),
(3, 'No registrats', 'Agenda accessible pels usuaris no registrats', 'Anotació', 'Informació addicional', '', '', '', '', 2, 2, 1, 1, 1, 1, '', '', '', '', '', '$$-1|1$', '$$2$', 1, 0, 0, '#66FFCC', 'A', '2008-09-17 11:54:55', 2, '2008-09-17 11:56:05', 2, '', '', '');

-- --------------------------------------------------------

--
-- Estructura de la taula `IWagendas_subs`
--

CREATE TABLE IF NOT EXISTS `IWagendas_subs` (
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Bolcant dades de la taula `IWagendas_subs`
--

INSERT INTO `IWagendas_subs` (`said`, `daid`, `uid`, `donadabaixa`, `llistat`, `avisos`, `pn_obj_status`, `pn_cr_date`, `pn_cr_uid`, `pn_lu_date`, `pn_lu_uid`) VALUES
(1, 0, 10, 0, 0, 0, 'A', '2013-11-19 18:10:29', 10, '2013-11-21 14:02:52', 10);

-- --------------------------------------------------------

--
-- Estructura de la taula `IWbookings`
--

CREATE TABLE IF NOT EXISTS `IWbookings` (
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
-- Estructura de la taula `IWbookings_spaces`
--

CREATE TABLE IF NOT EXISTS `IWbookings_spaces` (
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
-- Bolcant dades de la taula `IWbookings_spaces`
--

INSERT INTO `IWbookings_spaces` (`sid`, `space_name`, `description`, `mdid`, `vertical`, `color`, `active`, `pn_obj_status`, `pn_cr_date`, `pn_cr_uid`, `pn_lu_date`, `pn_lu_uid`) VALUES
(1, 'Aula d''informàtica 1', 'Aula de la primera planta', 1, 1, '#CCFF66', 1, 'A', '2008-09-10 16:55:16', 2, '2008-09-10 17:13:15', 2),
(2, 'Carro multimèdia', 'Carro amb TV, vídeo i DVD', 2, 1, '#00CCCC', 1, 'A', '2008-09-10 16:56:07', 2, '2008-09-10 17:14:52', 2);

-- --------------------------------------------------------

--
-- Estructura de la taula `IWbooks`
--

CREATE TABLE IF NOT EXISTS `IWbooks` (
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
-- Estructura de la taula `IWbooks_materies`
--

CREATE TABLE IF NOT EXISTS `IWbooks_materies` (
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
-- Bolcant dades de la taula `IWbooks_materies`
--

INSERT INTO `IWbooks_materies` (`pn_tid`, `pn_codi_mat`, `pn_materia`, `pn_obj_status`, `pn_cr_date`, `pn_cr_uid`, `pn_lu_date`, `pn_lu_uid`) VALUES
(1, 'TOT', ' Totes', 'A', '1970-01-01 00:00:00', 0, '1970-01-01 00:00:00', 0);

-- --------------------------------------------------------

--
-- Estructura de la taula `IWdocmanager`
--

CREATE TABLE IF NOT EXISTS `IWdocmanager` (
  `documentId` int(11) NOT NULL AUTO_INCREMENT,
  `categoryId` int(11) NOT NULL DEFAULT '0',
  `fileName` varchar(10) NOT NULL,
  `description` longtext NOT NULL,
  `filesize` varchar(10) NOT NULL,
  `author` int(11) NOT NULL DEFAULT '0',
  `nClicks` int(11) NOT NULL DEFAULT '0',
  `validated` int(11) NOT NULL DEFAULT '0',
  `pn_obj_status` varchar(1) NOT NULL DEFAULT 'A',
  `pn_cr_date` datetime NOT NULL DEFAULT '1970-01-01 00:00:00',
  `pn_cr_uid` int(11) NOT NULL DEFAULT '0',
  `pn_lu_date` datetime NOT NULL DEFAULT '1970-01-01 00:00:00',
  `pn_lu_uid` int(11) NOT NULL DEFAULT '0',
  `version` varchar(30) NOT NULL DEFAULT '',
  `documentName` varchar(200) NOT NULL DEFAULT '',
  `authorName` varchar(100) NOT NULL DEFAULT '',
  `documentLink` varchar(200) NOT NULL DEFAULT '',
  `fileOriginalName` varchar(100) NOT NULL DEFAULT '',
  `versioned` int(11) NOT NULL DEFAULT '0',
  `versionFrom` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`documentId`),
  KEY `author` (`author`),
  KEY `categoryId` (`categoryId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de la taula `IWdocmanager_categories`
--

CREATE TABLE IF NOT EXISTS `IWdocmanager_categories` (
  `categoryId` int(11) NOT NULL AUTO_INCREMENT,
  `categoryName` varchar(200) NOT NULL,
  `description` longtext NOT NULL,
  `groups` text NOT NULL,
  `nDocuments` int(11) NOT NULL DEFAULT '0',
  `pn_obj_status` varchar(1) NOT NULL DEFAULT 'A',
  `pn_cr_date` datetime NOT NULL DEFAULT '1970-01-01 00:00:00',
  `pn_cr_uid` int(11) NOT NULL DEFAULT '0',
  `pn_lu_date` datetime NOT NULL DEFAULT '1970-01-01 00:00:00',
  `pn_lu_uid` int(11) NOT NULL DEFAULT '0',
  `active` tinyint(4) NOT NULL DEFAULT '0',
  `parentId` int(11) NOT NULL DEFAULT '0',
  `nDocumentsNV` int(11) NOT NULL DEFAULT '0',
  `groupsAdd` text NOT NULL,
  PRIMARY KEY (`categoryId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Bolcant dades de la taula `IWdocmanager_categories`
--

INSERT INTO `IWdocmanager_categories` (`categoryId`, `categoryName`, `description`, `groups`, `nDocuments`, `pn_obj_status`, `pn_cr_date`, `pn_cr_uid`, `pn_lu_date`, `pn_lu_uid`, `active`, `parentId`, `nDocumentsNV`, `groupsAdd`) VALUES
(1, 'Alumnat', 'Espai de fitxers d''interès per a l''alumnat', 'a:0:{}', 0, 'A', '1970-01-01 00:00:00', 0, '2013-11-19 17:25:21', 10, 1, 0, 0, 'a:0:{}'),
(2, 'Documents de centre', 'Documents de treball per al professorat', 'a:0:{}', 0, 'A', '1970-01-01 00:00:00', 0, '2013-11-19 17:25:21', 10, 1, 0, 0, 'a:0:{}'),
(3, 'Reunions', 'Reunions del professorat', 'a:0:{}', 0, 'A', '1970-01-01 00:00:00', 0, '2013-11-19 17:25:21', 10, 1, 0, 0, 'a:0:{}');

-- --------------------------------------------------------

--
-- Estructura de la taula `IWforms`
--

CREATE TABLE IF NOT EXISTS `IWforms` (
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
-- Estructura de la taula `IWforms_cat`
--

CREATE TABLE IF NOT EXISTS `IWforms_cat` (
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
-- Estructura de la taula `IWforms_definition`
--

CREATE TABLE IF NOT EXISTS `IWforms_definition` (
  `iw_fid` int(11) NOT NULL AUTO_INCREMENT,
  `iw_formName` varchar(70) NOT NULL,
  `iw_description` varchar(255) NOT NULL,
  `iw_active` tinyint(4) NOT NULL DEFAULT '0',
  `iw_title` varchar(255) NOT NULL,
  `iw_new` datetime NOT NULL,
  `iw_cid` int(11) NOT NULL DEFAULT '0',
  `iw_caducity` datetime NOT NULL,
  `iw_annonimous` tinyint(4) NOT NULL DEFAULT '0',
  `iw_unique` tinyint(4) NOT NULL DEFAULT '0',
  `iw_answare` longtext NOT NULL,
  `iw_characters` mediumint(9) NOT NULL DEFAULT '0',
  `iw_closeableNotes` tinyint(4) NOT NULL DEFAULT '0',
  `iw_closeInsert` tinyint(4) NOT NULL DEFAULT '0',
  `iw_closeableInsert` tinyint(4) NOT NULL DEFAULT '0',
  `iw_unregisterednotusersview` tinyint(4) NOT NULL DEFAULT '1',
  `iw_unregisterednotexport` tinyint(4) NOT NULL DEFAULT '1',
  `iw_publicResponse` tinyint(4) NOT NULL DEFAULT '0',
  `pn_obj_status` varchar(1) NOT NULL DEFAULT 'A',
  `pn_cr_date` datetime NOT NULL DEFAULT '1970-01-01 00:00:00',
  `pn_cr_uid` int(11) NOT NULL DEFAULT '0',
  `pn_lu_date` datetime NOT NULL DEFAULT '1970-01-01 00:00:00',
  `pn_lu_uid` int(11) NOT NULL DEFAULT '0',
  `iw_skin` longtext NOT NULL,
  `iw_skincss` varchar(150) NOT NULL,
  `iw_showFormName` tinyint(4) NOT NULL DEFAULT '1',
  `iw_showNotesTitle` tinyint(4) NOT NULL DEFAULT '1',
  `iw_skinForm` longtext NOT NULL,
  `iw_skinNote` longtext NOT NULL,
  `iw_expertMode` tinyint(4) NOT NULL DEFAULT '0',
  `iw_skinByTemplate` tinyint(4) NOT NULL DEFAULT '0',
  `iw_skinFormTemplate` varchar(70) NOT NULL DEFAULT 'IWforms_user_new.tpl',
  `iw_skinTemplate` varchar(70) NOT NULL DEFAULT 'IWforms_user_read.tpl',
  `iw_skinNoteTemplate` varchar(70) NOT NULL DEFAULT 'IWforms_user_read.tpl',
  `iw_allowComments` tinyint(4) NOT NULL DEFAULT '0',
  `iw_allowCommentsModerated` tinyint(4) NOT NULL DEFAULT '0',
  `iw_returnURL` varchar(150) NOT NULL,
  `iw_filesFolder` varchar(25) NOT NULL,
  `iw_lang` varchar(2) NOT NULL,
  `iw_defaultNumberOfNotes` tinyint(4) NOT NULL DEFAULT '0',
  `iw_defaultOrderForNotes` tinyint(4) NOT NULL DEFAULT '0',
  `iw_orderFormField` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`iw_fid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Bolcant dades de la taula `IWforms_definition`
--

INSERT INTO `IWforms_definition` (`iw_fid`, `iw_formName`, `iw_description`, `iw_active`, `iw_title`, `iw_new`, `iw_cid`, `iw_caducity`, `iw_annonimous`, `iw_unique`, `iw_answare`, `iw_characters`, `iw_closeableNotes`, `iw_closeInsert`, `iw_closeableInsert`, `iw_unregisterednotusersview`, `iw_unregisterednotexport`, `iw_publicResponse`, `pn_obj_status`, `pn_cr_date`, `pn_cr_uid`, `pn_lu_date`, `pn_lu_uid`, `iw_skin`, `iw_skincss`, `iw_showFormName`, `iw_showNotesTitle`, `iw_skinForm`, `iw_skinNote`, `iw_expertMode`, `iw_skinByTemplate`, `iw_skinFormTemplate`, `iw_skinTemplate`, `iw_skinNoteTemplate`, `iw_allowComments`, `iw_allowCommentsModerated`, `iw_returnURL`, `iw_filesFolder`, `iw_lang`, `iw_defaultNumberOfNotes`, `iw_defaultOrderForNotes`, `iw_orderFormField`) VALUES
(1, 'Guàrdies i substitucions', 'Espai des d''on enviar la feina per a les substitucions', 1, 'Feina per a l''alumnat', '2008-11-21 23:59:00', 0, '0000-00-00 00:00:00', 0, 0, '', 0, 0, 0, 0, 1, 1, 0, 'A', '2008-09-22 17:05:49', 2, '2009-02-24 09:37:06', 2, '', '', 1, 1, '', '', 0, 0, 'IWforms_user_new.htm', 'IWforms_user_read.htm', 'IWforms_user_read.htm', 0, 0, '', '', '', 0, 0, 0),
(2, 'Avaries informàtiques', 'Notificació al coordinador d''informàtica de problemes amb el maquinari o programari informàtic del centre', 1, 'Avaries de l''equipament informàtic', '2008-12-09 23:59:00', 0, '0000-00-00 00:00:00', 0, 0, '', 0, 0, 0, 0, 1, 1, 0, 'A', '2008-09-22 17:19:45', 2, '2008-09-22 17:19:45', 2, '', '', 1, 1, '', '', 0, 0, 'IWforms_user_new.htm', 'IWforms_user_read.htm', 'IWforms_user_read.htm', 0, 0, '', '', '', 0, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de la taula `IWforms_group`
--

CREATE TABLE IF NOT EXISTS `IWforms_group` (
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
-- Bolcant dades de la taula `IWforms_group`
--

INSERT INTO `IWforms_group` (`iw_gfid`, `iw_fid`, `iw_group`, `iw_accessType`, `iw_validationNeeded`, `pn_obj_status`, `pn_cr_date`, `pn_cr_uid`, `pn_lu_date`, `pn_lu_uid`) VALUES
(1, 1, 4, 3, 0, 'A', '2008-09-22 17:12:47', 2, '2008-09-22 17:12:47', 2),
(2, 2, 2, 3, 0, 'A', '2008-09-22 17:24:37', 2, '2008-09-22 17:24:37', 2),
(3, 2, 4, 3, 0, 'A', '2008-09-22 17:25:06', 2, '2008-09-22 17:25:06', 2);

-- --------------------------------------------------------

--
-- Estructura de la taula `IWforms_note`
--

CREATE TABLE IF NOT EXISTS `IWforms_note` (
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
-- Estructura de la taula `IWforms_note_definition`
--

CREATE TABLE IF NOT EXISTS `IWforms_note_definition` (
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
-- Bolcant dades de la taula `IWforms_note_definition`
--

INSERT INTO `IWforms_note_definition` (`iw_fndid`, `iw_fid`, `iw_fieldType`, `iw_required`, `iw_description`, `iw_fieldName`, `iw_feedback`, `iw_order`, `iw_active`, `iw_dependance`, `iw_rfid`, `iw_validationNeeded`, `iw_notify`, `iw_size`, `iw_cols`, `iw_rows`, `iw_editor`, `iw_checked`, `iw_options`, `iw_calendar`, `iw_height`, `iw_color`, `iw_colorf`, `iw_accessType`, `iw_editable`, `iw_collapse`, `iw_publicFile`, `iw_help`, `pn_obj_status`, `pn_cr_date`, `pn_cr_uid`, `pn_lu_date`, `pn_lu_uid`, `iw_gid`, `iw_searchable`, `iw_extensions`, `iw_imgWidth`, `iw_imgHeight`) VALUES
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
-- Estructura de la taula `IWforms_validator`
--

CREATE TABLE IF NOT EXISTS `IWforms_validator` (
  `iw_rfid` int(10) NOT NULL AUTO_INCREMENT,
  `iw_fid` int(10) NOT NULL DEFAULT '0',
  `iw_validator` int(10) NOT NULL DEFAULT '0',
  `iw_validatorType` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`iw_rfid`),
  KEY `iw_fid` (`iw_fid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de la taula `IWforums_definition`
--

CREATE TABLE IF NOT EXISTS `IWforums_definition` (
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
  `longDescriu` longtext NOT NULL,
  PRIMARY KEY (`iw_fid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Bolcant dades de la taula `IWforums_definition`
--

INSERT INTO `IWforums_definition` (`iw_fid`, `iw_nom_forum`, `iw_descriu`, `iw_actiu`, `iw_adjunts`, `iw_grup`, `iw_mod`, `iw_observacions`, `iw_msgDelTime`, `iw_msgEditTime`, `pn_obj_status`, `pn_cr_date`, `pn_cr_uid`, `pn_lu_date`, `pn_lu_uid`, `longDescriu`) VALUES
(1, 'Centre', 'Fòrum general de tot el centre', 1, 0, '$$4|2$$3|1$', '$$9$', '', '10', '20', 'A', '2008-09-09 16:48:58', 2, '2008-09-09 16:58:36', 2, ''),
(2, 'Funcionament de la maqueta', 'Espai on preguntar/respondre dubtes relacionats amb el funcionament dels mòduls de la intranet', 1, 0, '$$4|2$', '$$2$', '', '10', '20', 'A', '2008-09-09 16:49:42', 2, '2008-09-09 16:57:12', 2, ''),
(3, 'Professorat', 'Fòrum exclusiu del professorat', 1, 1, '$$4|3$', '$$3$', '', '10', '20', 'A', '2008-09-09 16:50:51', 2, '2008-09-09 16:58:05', 2, '');

-- --------------------------------------------------------

--
-- Estructura de la taula `IWforums_msg`
--

CREATE TABLE IF NOT EXISTS `IWforums_msg` (
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
  `iw_onTop` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`iw_fmid`),
  KEY `iw_idparent` (`iw_idparent`),
  KEY `iw_ftid` (`iw_ftid`),
  KEY `iw_fid` (`iw_fid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de la taula `IWforums_temes`
--

CREATE TABLE IF NOT EXISTS `IWforums_temes` (
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
-- Estructura de la taula `IWjclic`
--

CREATE TABLE IF NOT EXISTS `IWjclic` (
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
-- Estructura de la taula `IWjclic_activities`
--

CREATE TABLE IF NOT EXISTS `IWjclic_activities` (
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
-- Estructura de la taula `IWjclic_groups`
--

CREATE TABLE IF NOT EXISTS `IWjclic_groups` (
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
-- Estructura de la taula `IWjclic_sessions`
--

CREATE TABLE IF NOT EXISTS `IWjclic_sessions` (
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
-- Estructura de la taula `IWjclic_settings`
--

CREATE TABLE IF NOT EXISTS `IWjclic_settings` (
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
-- Bolcant dades de la taula `IWjclic_settings`
--

INSERT INTO `IWjclic_settings` (`iw_jsid`, `iw_setting_key`, `iw_setting_value`, `pn_obj_status`, `pn_cr_date`, `pn_cr_uid`, `pn_lu_date`, `pn_lu_uid`) VALUES
(1, 'ALLOW_CREATE_GROUPS', 'false', 'A', '2009-01-07 09:30:34', 2, '2009-01-07 09:30:34', 2),
(2, 'ALLOW_CREATE_USERS', 'false', 'A', '2009-01-07 09:30:34', 2, '2009-01-07 09:30:34', 2),
(3, 'SHOW_GROUP_LIST', 'false', 'A', '2009-01-07 09:30:34', 2, '2009-01-07 09:30:34', 2),
(4, 'SHOW_USER_LIST', 'false', 'A', '2009-01-07 09:30:34', 2, '2009-01-07 09:30:34', 2),
(5, 'USER_TABLES', 'true', 'A', '2009-01-07 09:30:35', 2, '2009-01-07 09:30:35', 2),
(6, 'TIME_LAP', '10', 'A', '2009-01-07 09:30:35', 2, '2009-01-07 09:30:35', 2);

-- --------------------------------------------------------

--
-- Estructura de la taula `IWjclic_users`
--

CREATE TABLE IF NOT EXISTS `IWjclic_users` (
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
-- Estructura de la taula `IWmain`
--

CREATE TABLE IF NOT EXISTS `IWmain` (
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Bolcant dades de la taula `IWmain`
--

INSERT INTO `IWmain` (`iw_id`, `iw_module`, `iw_name`, `iw_value`, `iw_uid`, `iw_lifetime`, `iw_nult`, `pn_obj_status`, `pn_cr_date`, `pn_cr_uid`, `pn_lu_date`, `pn_lu_uid`) VALUES
(1, 'IWmain_block_news', 'news', '<!---fo--->\n<!---/fo--->\n<!---fu--->\n<!---/fu--->\n<!---fu--->\n<!---/fu--->\n', 2, '1424277725', 1, 'A', '2015-02-18 17:28:22', 2, '2015-02-18 17:31:27', 2),
(2, 'IWmain_block_flagged', 'flagged', '', 2, '1424277625', 1, 'A', '2015-02-18 17:28:22', 2, '2015-02-18 17:31:27', 2),
(3, 'IWnoteboard', 'nbtopics', '<div style="padding-left: 10px;">\n    <a href="index.php?module=Tauler&amp;type=user&amp;func=main&amp;tema=2">Comunitat</a>\n</div>\n<div style="height: 20px">&nbsp;</div>', 2, '1424278902', 1, 'A', '2015-02-18 17:28:22', 2, '2015-02-18 17:31:27', 2),
(4, 'IWagendas', 'calendar', '\n<script type="text/javascript">\n    <!-- overLIB configuration -->\n    ol_fgcolor = "lightyellow";\n    ol_bgcolor = "#FFFFFF";\n    ol_textcolor = "#000000";\n    ol_capcolor = "#e7e7e7";\n    ol_closecolor = "#000000";\n    ol_textfont = "Verdana,Arial,Helvetica";\n    ol_captionfont = "Verdana,Arial,Helvetica";\n    ol_captionsize = 2;\n    ol_textsize = 2;\n    ol_border = 2;\n    ol_width = 350;\n    ol_offsetx = 10;\n    ol_offsety = 10;\n    ol_sticky = 0;\n    ol_close = "Tanca";\n    ol_closeclick = 0;\n    ol_autostatus = 2;\n    ol_snapx = 0;\n    ol_snapy = 0;\n    ol_fixx = -1;\n    ol_fixy = -1;\n    ol_background = "";\n    ol_fgbackground = "";\n    ol_bgbackground = "";\n    ol_padxl = 1;\n    ol_padxr = 1;\n    ol_padyt = 1;\n    ol_padyb = 1;\n    ol_capicon = "";\n    ol_hauto = 1;\n    ol_vauto = 1;\n    if (document.getElementById(''overDiv'')==null) {\n        document.writeln(''<div id="overDiv" style="position:absolute; top:0px; left:0px; visibility:hidden; z-index:1000;"></div>'');\n    }\n</script>\n\n\n\n<div id="calendarContent">\n    \n<table cellpadding="0" style="width:100%; border: 2px solid #FFFFFF; background-color:#E1EBFF">\n        <tr>\n        <td align="center" bgcolor="#DBD4A6" colspan="7">\n            <a href="javascript:calendarBlockMonth(1,2015)">\n                <img src="/usu1/intranet/modules/IWagendas/images/mesmenys.gif" alt="Mes anterior" title="Mes anterior" width="19" height="10" />\n            </a>\n            <a href="index.php?module=IWagendas&amp;type=user&amp;func=main&amp;mes=2&amp;any=2015" style="color:#555555">\n                <strong>Febrer&nbsp;2015</strong>\n            </a>\n            <a href="javascript:calendarBlockMonth(3,2015)">\n                <img src="/usu1/intranet/modules/IWagendas/images/mesmes.gif" alt="Mes següent" title="Mes següent" width="19" height="10" />\n            </a>\n        </td>\n    </tr>\n        <tr>\n     <!-- Header with the name of the day abbreviated -->\n        <td style="color:#FFFFFF; background:#FFCC66; text-align:center;">Dl</td>\n     <!-- Header with the name of the day abbreviated -->\n        <td style="color:#FFFFFF; background:#FFCC66; text-align:center;">Dm</td>\n     <!-- Header with the name of the day abbreviated -->\n        <td style="color:#FFFFFF; background:#FFCC66; text-align:center;">Dc</td>\n     <!-- Header with the name of the day abbreviated -->\n        <td style="color:#FFFFFF; background:#FFCC66; text-align:center;">Dj</td>\n     <!-- Header with the name of the day abbreviated -->\n        <td style="color:#FFFFFF; background:#FFCC66; text-align:center;">Dv</td>\n     <!-- Header with the name of the day abbreviated -->\n        <td style="color:#FFFFFF; background:#FFCC66; text-align:center;">Ds</td>\n     <!-- Header with the name of the day abbreviated -->\n        <td style="color:#FFFFFF; background:#FFCC66; text-align:center;">Dg</td>\n        </tr>\n        <tr>\n              \n                             <td style="width:14.27%; text-align:center;">&nbsp;</td><td style="width:14.27%; text-align:center;">&nbsp;</td><td style="width:14.27%; text-align:center;">&nbsp;</td><td style="width:14.27%; text-align:center;">&nbsp;</td><td style="width:14.27%; text-align:center;">&nbsp;</td><td style="width:14.27%; text-align:center;">&nbsp;</td>            \n            \n                            <td style="width:14.27%; background:#FF8484; text-align:center;" onmouseout="nd();" onmouseover="overlib(''No hi ha cap anotació en aquesta data<br />'', CAPTION, ''Diumenge&nbsp;&nbsp;1/02/2015'', BGCOLOR, ''#316ac5'', TIMEOUT, 100000, DELAY, 200, WIDTH, 200)">\n                    <span style="color:#FFFFFF;"><a href="index.php?module=IWagendas&amp;type=user&amp;func=main&amp;mes=2&amp;any=2015&amp;daid=0&amp;dia=1">1</a></span>\n                </td>\n                                  \n            \n                             </tr><tr>\n            \n                            <td style="width:14.27%; background:#FFFFFF; text-align:center;" onmouseout="nd();" onmouseover="overlib(''No hi ha cap anotació en aquesta data<br />'', CAPTION, ''Dilluns&nbsp;&nbsp;2/02/2015'', BGCOLOR, ''#316ac5'', TIMEOUT, 100000, DELAY, 200, WIDTH, 200)">\n                    <span style="color:#;"><a href="index.php?module=IWagendas&amp;type=user&amp;func=main&amp;mes=2&amp;any=2015&amp;daid=0&amp;dia=2">2</a></span>\n                </td>\n                                  \n            \n            \n                            <td style="width:14.27%; background:#FFFFFF; text-align:center;" onmouseout="nd();" onmouseover="overlib(''No hi ha cap anotació en aquesta data<br />'', CAPTION, ''Dimarts&nbsp;&nbsp;3/02/2015'', BGCOLOR, ''#316ac5'', TIMEOUT, 100000, DELAY, 200, WIDTH, 200)">\n                    <span style="color:#;"><a href="index.php?module=IWagendas&amp;type=user&amp;func=main&amp;mes=2&amp;any=2015&amp;daid=0&amp;dia=3">3</a></span>\n                </td>\n                                  \n            \n            \n                            <td style="width:14.27%; background:#FFFFFF; text-align:center;" onmouseout="nd();" onmouseover="overlib(''No hi ha cap anotació en aquesta data<br />'', CAPTION, ''Dimecres&nbsp;&nbsp;4/02/2015'', BGCOLOR, ''#316ac5'', TIMEOUT, 100000, DELAY, 200, WIDTH, 200)">\n                    <span style="color:#;"><a href="index.php?module=IWagendas&amp;type=user&amp;func=main&amp;mes=2&amp;any=2015&amp;daid=0&amp;dia=4">4</a></span>\n                </td>\n                                  \n            \n            \n                            <td style="width:14.27%; background:#FFFFFF; text-align:center;" onmouseout="nd();" onmouseover="overlib(''No hi ha cap anotació en aquesta data<br />'', CAPTION, ''Dijous&nbsp;&nbsp;5/02/2015'', BGCOLOR, ''#316ac5'', TIMEOUT, 100000, DELAY, 200, WIDTH, 200)">\n                    <span style="color:#;"><a href="index.php?module=IWagendas&amp;type=user&amp;func=main&amp;mes=2&amp;any=2015&amp;daid=0&amp;dia=5">5</a></span>\n                </td>\n                                  \n            \n            \n                            <td style="width:14.27%; background:#FFFFFF; text-align:center;" onmouseout="nd();" onmouseover="overlib(''No hi ha cap anotació en aquesta data<br />'', CAPTION, ''Divendres&nbsp;&nbsp;6/02/2015'', BGCOLOR, ''#316ac5'', TIMEOUT, 100000, DELAY, 200, WIDTH, 200)">\n                    <span style="color:#;"><a href="index.php?module=IWagendas&amp;type=user&amp;func=main&amp;mes=2&amp;any=2015&amp;daid=0&amp;dia=6">6</a></span>\n                </td>\n                                  \n            \n            \n                            <td style="width:14.27%; background:#FF8484; text-align:center;" onmouseout="nd();" onmouseover="overlib(''No hi ha cap anotació en aquesta data<br />'', CAPTION, ''Dissabte&nbsp;&nbsp;7/02/2015'', BGCOLOR, ''#316ac5'', TIMEOUT, 100000, DELAY, 200, WIDTH, 200)">\n                    <span style="color:#FFFFFF;"><a href="index.php?module=IWagendas&amp;type=user&amp;func=main&amp;mes=2&amp;any=2015&amp;daid=0&amp;dia=7">7</a></span>\n                </td>\n                                  \n            \n            \n                            <td style="width:14.27%; background:#FF8484; text-align:center;" onmouseout="nd();" onmouseover="overlib(''No hi ha cap anotació en aquesta data<br />'', CAPTION, ''Diumenge&nbsp;&nbsp;8/02/2015'', BGCOLOR, ''#316ac5'', TIMEOUT, 100000, DELAY, 200, WIDTH, 200)">\n                    <span style="color:#FFFFFF;"><a href="index.php?module=IWagendas&amp;type=user&amp;func=main&amp;mes=2&amp;any=2015&amp;daid=0&amp;dia=8">8</a></span>\n                </td>\n                                  \n            \n                             </tr><tr>\n            \n                            <td style="width:14.27%; background:#FFFFFF; text-align:center;" onmouseout="nd();" onmouseover="overlib(''No hi ha cap anotació en aquesta data<br />'', CAPTION, ''Dilluns&nbsp;&nbsp;9/02/2015'', BGCOLOR, ''#316ac5'', TIMEOUT, 100000, DELAY, 200, WIDTH, 200)">\n                    <span style="color:#;"><a href="index.php?module=IWagendas&amp;type=user&amp;func=main&amp;mes=2&amp;any=2015&amp;daid=0&amp;dia=9">9</a></span>\n                </td>\n                                  \n            \n            \n                            <td style="width:14.27%; background:#FFFFFF; text-align:center;" onmouseout="nd();" onmouseover="overlib(''No hi ha cap anotació en aquesta data<br />'', CAPTION, ''Dimarts&nbsp;&nbsp;10/02/2015'', BGCOLOR, ''#316ac5'', TIMEOUT, 100000, DELAY, 200, WIDTH, 200)">\n                    <span style="color:#;"><a href="index.php?module=IWagendas&amp;type=user&amp;func=main&amp;mes=2&amp;any=2015&amp;daid=0&amp;dia=10">10</a></span>\n                </td>\n                                  \n            \n            \n                            <td style="width:14.27%; background:#FFFFFF; text-align:center;" onmouseout="nd();" onmouseover="overlib(''No hi ha cap anotació en aquesta data<br />'', CAPTION, ''Dimecres&nbsp;&nbsp;11/02/2015'', BGCOLOR, ''#316ac5'', TIMEOUT, 100000, DELAY, 200, WIDTH, 200)">\n                    <span style="color:#;"><a href="index.php?module=IWagendas&amp;type=user&amp;func=main&amp;mes=2&amp;any=2015&amp;daid=0&amp;dia=11">11</a></span>\n                </td>\n                                  \n            \n            \n                            <td style="width:14.27%; background:#FFFFFF; text-align:center;" onmouseout="nd();" onmouseover="overlib(''No hi ha cap anotació en aquesta data<br />'', CAPTION, ''Dijous&nbsp;&nbsp;12/02/2015'', BGCOLOR, ''#316ac5'', TIMEOUT, 100000, DELAY, 200, WIDTH, 200)">\n                    <span style="color:#;"><a href="index.php?module=IWagendas&amp;type=user&amp;func=main&amp;mes=2&amp;any=2015&amp;daid=0&amp;dia=12">12</a></span>\n                </td>\n                                  \n            \n            \n                            <td style="width:14.27%; background:#FFFFFF; text-align:center;" onmouseout="nd();" onmouseover="overlib(''No hi ha cap anotació en aquesta data<br />'', CAPTION, ''Divendres&nbsp;&nbsp;13/02/2015'', BGCOLOR, ''#316ac5'', TIMEOUT, 100000, DELAY, 200, WIDTH, 200)">\n                    <span style="color:#;"><a href="index.php?module=IWagendas&amp;type=user&amp;func=main&amp;mes=2&amp;any=2015&amp;daid=0&amp;dia=13">13</a></span>\n                </td>\n                                  \n            \n            \n                            <td style="width:14.27%; background:#FF8484; text-align:center;" onmouseout="nd();" onmouseover="overlib(''No hi ha cap anotació en aquesta data<br />'', CAPTION, ''Dissabte&nbsp;&nbsp;14/02/2015'', BGCOLOR, ''#316ac5'', TIMEOUT, 100000, DELAY, 200, WIDTH, 200)">\n                    <span style="color:#FFFFFF;"><a href="index.php?module=IWagendas&amp;type=user&amp;func=main&amp;mes=2&amp;any=2015&amp;daid=0&amp;dia=14">14</a></span>\n                </td>\n                                  \n            \n            \n                            <td style="width:14.27%; background:#FF8484; text-align:center;" onmouseout="nd();" onmouseover="overlib(''No hi ha cap anotació en aquesta data<br />'', CAPTION, ''Diumenge&nbsp;&nbsp;15/02/2015'', BGCOLOR, ''#316ac5'', TIMEOUT, 100000, DELAY, 200, WIDTH, 200)">\n                    <span style="color:#FFFFFF;"><a href="index.php?module=IWagendas&amp;type=user&amp;func=main&amp;mes=2&amp;any=2015&amp;daid=0&amp;dia=15">15</a></span>\n                </td>\n                                  \n            \n                             </tr><tr>\n            \n                            <td style="width:14.27%; background:#FFFFFF; text-align:center;" onmouseout="nd();" onmouseover="overlib(''No hi ha cap anotació en aquesta data<br />'', CAPTION, ''Dilluns&nbsp;&nbsp;16/02/2015'', BGCOLOR, ''#316ac5'', TIMEOUT, 100000, DELAY, 200, WIDTH, 200)">\n                    <span style="color:#;"><a href="index.php?module=IWagendas&amp;type=user&amp;func=main&amp;mes=2&amp;any=2015&amp;daid=0&amp;dia=16">16</a></span>\n                </td>\n                                  \n            \n            \n                            <td style="width:14.27%; background:#FFFFFF; text-align:center;" onmouseout="nd();" onmouseover="overlib(''No hi ha cap anotació en aquesta data<br />'', CAPTION, ''Dimarts&nbsp;&nbsp;17/02/2015'', BGCOLOR, ''#316ac5'', TIMEOUT, 100000, DELAY, 200, WIDTH, 200)">\n                    <span style="color:#;"><a href="index.php?module=IWagendas&amp;type=user&amp;func=main&amp;mes=2&amp;any=2015&amp;daid=0&amp;dia=17">17</a></span>\n                </td>\n                                  \n            \n            \n                            <td style="width:14.27%; background:#DBD4A6; text-align:center;" onmouseout="nd();" onmouseover="overlib(''No hi ha cap anotació en aquesta data<br />'', CAPTION, ''Dimecres&nbsp;&nbsp;18/02/2015'', BGCOLOR, ''#316ac5'', TIMEOUT, 100000, DELAY, 200, WIDTH, 200)">\n                    <span style="color:#;"><a href="index.php?module=IWagendas&amp;type=user&amp;func=main&amp;mes=2&amp;any=2015&amp;daid=0&amp;dia=18">18</a></span>\n                </td>\n                                  \n            \n            \n                            <td style="width:14.27%; background:#FFFFFF; text-align:center;" onmouseout="nd();" onmouseover="overlib(''No hi ha cap anotació en aquesta data<br />'', CAPTION, ''Dijous&nbsp;&nbsp;19/02/2015'', BGCOLOR, ''#316ac5'', TIMEOUT, 100000, DELAY, 200, WIDTH, 200)">\n                    <span style="color:#;"><a href="index.php?module=IWagendas&amp;type=user&amp;func=main&amp;mes=2&amp;any=2015&amp;daid=0&amp;dia=19">19</a></span>\n                </td>\n                                  \n            \n            \n                            <td style="width:14.27%; background:#FFFFFF; text-align:center;" onmouseout="nd();" onmouseover="overlib(''No hi ha cap anotació en aquesta data<br />'', CAPTION, ''Divendres&nbsp;&nbsp;20/02/2015'', BGCOLOR, ''#316ac5'', TIMEOUT, 100000, DELAY, 200, WIDTH, 200)">\n                    <span style="color:#;"><a href="index.php?module=IWagendas&amp;type=user&amp;func=main&amp;mes=2&amp;any=2015&amp;daid=0&amp;dia=20">20</a></span>\n                </td>\n                                  \n            \n            \n                            <td style="width:14.27%; background:#FF8484; text-align:center;" onmouseout="nd();" onmouseover="overlib(''No hi ha cap anotació en aquesta data<br />'', CAPTION, ''Dissabte&nbsp;&nbsp;21/02/2015'', BGCOLOR, ''#316ac5'', TIMEOUT, 100000, DELAY, 200, WIDTH, 200)">\n                    <span style="color:#FFFFFF;"><a href="index.php?module=IWagendas&amp;type=user&amp;func=main&amp;mes=2&amp;any=2015&amp;daid=0&amp;dia=21">21</a></span>\n                </td>\n                                  \n            \n            \n                            <td style="width:14.27%; background:#FF8484; text-align:center;" onmouseout="nd();" onmouseover="overlib(''No hi ha cap anotació en aquesta data<br />'', CAPTION, ''Diumenge&nbsp;&nbsp;22/02/2015'', BGCOLOR, ''#316ac5'', TIMEOUT, 100000, DELAY, 200, WIDTH, 200)">\n                    <span style="color:#FFFFFF;"><a href="index.php?module=IWagendas&amp;type=user&amp;func=main&amp;mes=2&amp;any=2015&amp;daid=0&amp;dia=22">22</a></span>\n                </td>\n                                  \n            \n                             </tr><tr>\n            \n                            <td style="width:14.27%; background:#FFFFFF; text-align:center;" onmouseout="nd();" onmouseover="overlib(''No hi ha cap anotació en aquesta data<br />'', CAPTION, ''Dilluns&nbsp;&nbsp;23/02/2015'', BGCOLOR, ''#316ac5'', TIMEOUT, 100000, DELAY, 200, WIDTH, 200)">\n                    <span style="color:#;"><a href="index.php?module=IWagendas&amp;type=user&amp;func=main&amp;mes=2&amp;any=2015&amp;daid=0&amp;dia=23">23</a></span>\n                </td>\n                                  \n            \n            \n                            <td style="width:14.27%; background:#FFFFFF; text-align:center;" onmouseout="nd();" onmouseover="overlib(''No hi ha cap anotació en aquesta data<br />'', CAPTION, ''Dimarts&nbsp;&nbsp;24/02/2015'', BGCOLOR, ''#316ac5'', TIMEOUT, 100000, DELAY, 200, WIDTH, 200)">\n                    <span style="color:#;"><a href="index.php?module=IWagendas&amp;type=user&amp;func=main&amp;mes=2&amp;any=2015&amp;daid=0&amp;dia=24">24</a></span>\n                </td>\n                                  \n            \n            \n                            <td style="width:14.27%; background:#FFFFFF; text-align:center;" onmouseout="nd();" onmouseover="overlib(''No hi ha cap anotació en aquesta data<br />'', CAPTION, ''Dimecres&nbsp;&nbsp;25/02/2015'', BGCOLOR, ''#316ac5'', TIMEOUT, 100000, DELAY, 200, WIDTH, 200)">\n                    <span style="color:#;"><a href="index.php?module=IWagendas&amp;type=user&amp;func=main&amp;mes=2&amp;any=2015&amp;daid=0&amp;dia=25">25</a></span>\n                </td>\n                                  \n            \n            \n                            <td style="width:14.27%; background:#FFFFFF; text-align:center;" onmouseout="nd();" onmouseover="overlib(''No hi ha cap anotació en aquesta data<br />'', CAPTION, ''Dijous&nbsp;&nbsp;26/02/2015'', BGCOLOR, ''#316ac5'', TIMEOUT, 100000, DELAY, 200, WIDTH, 200)">\n                    <span style="color:#;"><a href="index.php?module=IWagendas&amp;type=user&amp;func=main&amp;mes=2&amp;any=2015&amp;daid=0&amp;dia=26">26</a></span>\n                </td>\n                                  \n            \n            \n                            <td style="width:14.27%; background:#FFFFFF; text-align:center;" onmouseout="nd();" onmouseover="overlib(''No hi ha cap anotació en aquesta data<br />'', CAPTION, ''Divendres&nbsp;&nbsp;27/02/2015'', BGCOLOR, ''#316ac5'', TIMEOUT, 100000, DELAY, 200, WIDTH, 200)">\n                    <span style="color:#;"><a href="index.php?module=IWagendas&amp;type=user&amp;func=main&amp;mes=2&amp;any=2015&amp;daid=0&amp;dia=27">27</a></span>\n                </td>\n                                  \n            \n            \n                            <td style="width:14.27%; background:#FF8484; text-align:center;" onmouseout="nd();" onmouseover="overlib(''No hi ha cap anotació en aquesta data<br />'', CAPTION, ''Dissabte&nbsp;&nbsp;28/02/2015'', BGCOLOR, ''#316ac5'', TIMEOUT, 100000, DELAY, 200, WIDTH, 200)">\n                    <span style="color:#FFFFFF;"><a href="index.php?module=IWagendas&amp;type=user&amp;func=main&amp;mes=2&amp;any=2015&amp;daid=0&amp;dia=28">28</a></span>\n                </td>\n                            </tr>\n</table></div>', 2, '1424277787', 0, 'A', '2015-02-18 17:28:23', 2, '2015-02-18 17:31:27', 2),
(5, 'IWagendas', 'month', '0', 2, '1429461087', 0, 'A', '2015-02-18 17:28:23', 2, '2015-02-18 17:31:27', 2),
(6, 'IWagendas', 'next', '<script type="text/javascript">\n\n    //Translucent scroller- By Dynamic Drive\n    //For full source code and more DHTML scripts, visit http://www.dynamicdrive.com\n    //This credit MUST stay intact for use\n\n    var scroller_width=''95%''\n    var scroller_height=''80px''\n    var bgcolor=''lightyellow''\n    var pause=3000 //SET PAUSE BETWEEN SLIDE (3000=3 seconds)\n\n    var scrollercontent=new Array()\n\n    \n    var id=0\n    scrollercontent[id]=''No tens anotacions a l&acute;agenda per als propers 7  days''\n    \n\n    ////NO need to edit beyond here/////////////\n\n    var ie4=document.all\n    var dom=document.getElementById&&navigator.userAgent.indexOf("Opera")==-1\n\n    if (ie4||dom)\n        document.write(''<div style="position:relative;width:''+scroller_width+'';height:''+scroller_height+'';overflow:hidden"><div id="canvas0" style="position:absolute;background-color:''+bgcolor+'';width:''+scroller_width+'';height:''+scroller_height+'';top:''+scroller_height+'';filter:alpha(opacity=20);-moz-opacity:0.2; padding: 5px;"></div><div id="canvas1" style="position:absolute;background-color:''+bgcolor+'';width:''+scroller_width+'';height:''+scroller_height+'';top:''+scroller_height+'';filter:alpha(opacity=20);-moz-opacity:0.2; padding: 5px;"></div></div>'')\n    else if (document.layers) {\n        document.write(''<ilayer id=tickernsmain visibility=hide width=''+scroller_width+'' height=''+scroller_height+'' bgColor=''+bgcolor+''><layer id=tickernssub width=''+scroller_width+'' height=''+scroller_height+'' left=0 top=0>''+scrollercontent[0]+''</layer></ilayer>'')\n    }\n\n    var curpos=scroller_height*(1)\n    var degree=10\n    var curcanvas="canvas0"\n    var curindex=0\n    var nextindex=1\n\n    function moveslide(){\n        if (curpos>0) {\n            curpos=Math.max(curpos-degree,0)\n            tempobj.style.top=curpos+"px"\n        } else {\n            clearInterval(dropslide)\n            if (crossobj.filters)\n                crossobj.filters.alpha.opacity=100\n            else if (crossobj.style.MozOpacity)\n                crossobj.style.MozOpacity=1\n            nextcanvas=(curcanvas=="canvas0")? "canvas0" : "canvas1"\n            tempobj=ie4? eval("document.all."+nextcanvas) : document.getElementById(nextcanvas)\n            tempobj.innerHTML=scrollercontent[curindex]\n            nextindex=(nextindex<scrollercontent.length-1)? nextindex+1 : 0\n            setTimeout("rotateslide()",pause)\n        }\n    }\n\n    function rotateslide() {\n        if (ie4||dom){\n            resetit(curcanvas)\n            crossobj=tempobj=ie4? eval("document.all."+curcanvas) : document.getElementById(curcanvas)\n            crossobj.style.zIndex++\n            if (crossobj.filters)\n                document.all.canvas0.filters.alpha.opacity=document.all.canvas1.filters.alpha.opacity=20\n            else if (crossobj.style.MozOpacity)\n                document.getElementById("canvas0").style.MozOpacity=document.getElementById("canvas1").style.MozOpacity=0.2\n            var temp=''setInterval("moveslide()",50)''\n            dropslide=eval(temp)\n            curcanvas=(curcanvas=="canvas0")? "canvas1" : "canvas0"\n        }\n        else if (document.layers){\n            crossobj.document.write(scrollercontent[curindex])\n            crossobj.document.close()\n        }\n        curindex=(curindex<scrollercontent.length-1)? curindex+1 : 0\n    }\n\n    function resetit(what){\n        curpos=parseInt(scroller_height)*(1)\n        var crossobj=ie4? eval("document.all."+what) : document.getElementById(what)\n        crossobj.style.top=curpos+"px"\n    }\n\n    function startit(){\n        crossobj=ie4? eval("document.all."+curcanvas) : dom? document.getElementById(curcanvas) : document.tickernsmain.document.tickernssub\n        if (ie4||dom){\n            crossobj.innerHTML=scrollercontent[curindex]\n            rotateslide()\n            crossobj.onclick=new Function("window.open(''index.php?module=IWagendas'',''_parent'')");\n        }else{\n            document.tickernsmain.visibility=''show''\n            curindex++\n            setInterval("rotateslide()",pause)\n        }\n    }\n\n    // if (ie4||dom||document.layers)\n    // window.onload=startit\n    if (ie4||dom||document.layers) startit();\n\n</script>\n\n<div class="iwagendas-block-next">\n    En els propers 7 dies\n</div>', 2, '1424277603', 1, 'A', '2015-02-18 17:28:23', 2, '2015-02-18 17:31:27', 2),
(7, 'IWjclic', 'jclicBlock', '\n\nNo tens accés a cap activitat Jclic\n', 2, '1424277853', 1, 'A', '2015-02-18 17:28:23', 2, '2015-02-18 17:31:27', 2),
(8, 'IWqv', 'qvsummary', '', 2, '1424278903', 0, 'A', '1970-01-01 00:00:00', 0, '1970-01-01 00:00:00', 0),
(9, 'IWvhmenu', 'userMenu', '<script type="text/javascript">\n		// HV Menu by Ger Versluis (http://www.burmees.nl/)\n		// Submitted to Dynamic Drive (http://www.dynamicdrive.com)\n		// Visit http://www.dynamicdrive.com for this script and more\n		function Go(){ return; }\n		var NoOffFirstLineMenus=5;		// Number of first level items\n		var LowBgColor=''#efedde'';						// Background color when mouse is not over\n		var LowSubBgColor=''#efedde'';					// Background color when mouse is not over on subs\n		var HighBgColor=''#b3cadb'';						// Background color when mouse is over\n		var HighSubBgColor=''#b3cadb'';				// Background color when mouse is over on subs\n		var FontLowColor=''#000000'';					// Font color when mouse is not over\n		var FontSubLowColor=''#000000'';				// Font color subs when mouse is not over\n		var FontHighColor=''#000000'';					// Font color when mouse is over\n		var FontSubHighColor=''#000000'';			// Font color subs when mouse is over\n		var BorderColor=''#ffffff'';						// Border color\n		var BorderSubColor=''#ffffff'';				// Border color for subs\n		var BorderWidth=1;						// Border width\n		var BorderBtwnElmnts=1;				// Border between elements 1 or 0\n		var FontFamily=''Tahoma, Verdana, Arial, Helvetica, sans-serif'';						// Font family menu items\n		var FontSize=9;								// Font size menu items\n		var FontBold=0;								// Bold menu items 1 or 0\n		var FontItalic=0;							// Italic menu items 1 or 0\n		var MenuTextCentered=''center'';			// Item text position ''left'', ''center'' or ''right''\n		var MenuCentered=''left'';					// Menu horizontal position ''left'', ''center'' or ''right''\n		var MenuVerticalCentered=''top'';	// Menu vertical position ''top'', ''middle'',''bottom'' or static\n		var ChildOverlap=0.1;						// horizontal overlap child/ parent\n		var ChildVerticalOverlap=0.1;		// vertical overlap child/ parent\n		var StartTop=130;								// Menu offset x coordinate\n		var StartLeft=10;							// Menu offset y coordinate\n		var VerCorrect=0;							// Multiple frames y correction\n		var HorCorrect=0;							// Multiple frames x correction\n		var LeftPaddng=3;							// Left padding\n		var TopPaddng=0;							// Top padding\n		var FirstLineHorizontal=1;		// SET TO 1 FOR HORIZONTAL MENU, 0 FOR VERTICAL\n		var MenuFramesVertical=1;			// Frames in cols or rows 1 or 0\n		var DissapearDelay=1000;					// delay before menu folds in\n		var TakeOverBgColor=1;				// Menu frame takes over background color subitem frame\n		var FirstLineFrame=''navig'';				// Frame where first level appears\n		var SecLineFrame=''space'';					// Frame where sub levels appear\n		var DocTargetFrame=''space'';				// Frame where target documents appear\n		var TargetLoc='''';							// span id for relative positioning\n		var HideTop=0;								// Hide first level when loading new document 1 or 0\n		var MenuWrap=1;								// enables/ disables menu wrap 1 or 0\n		var RightToLeft=0;						// enables/ disables right to left unfold 1 or 0\n		var UnfoldsOnClick=0;					// Level 1 unfolds onclick/ onmouseover\n		var WebMasterCheck=0;					// menu tree checking on or off 1 or 0\n		var ShowArrow=1;							// Uses arrow gifs when 1\n		var KeepHilite=1;							// Keep selected path highligthed\n		var Arrws=[''modules/IWvhmenu/images/tri.gif'',5,10,''modules/IWvhmenu/images/tridown.gif'',10,5,''modules/IWvhmenu/images/trileft.gif'',5,10];	// Arrow source, width and height\n		\n		function BeforeStart(){return}\n		function AfterBuild(){return}\n		function BeforeFirstOpen(){return}\n		function AfterCloseAll(){return}\nMenu1=new Array("Inici", "index.php", "", 0, 23, 70);\nMenu2=new Array("El meu compte", "user.php", "", 0, 24, 120);\nMenu3=new Array("Bústia", "index.php?module=IWmessages", "", 0, 24, 80);\nMenu4=new Array("Administració", "admin.php", "", 4, 24, 120);\nMenu4_1=new Array("Continguts", "index.php?module=Admin&type=admin&func=adminpanel&acid=4", "", 7, 24, 120);\nMenu4_1_1=new Array("Notícies", "index.php?module=News&type=admin", "", 0, 24, 120);\nMenu4_1_2=new Array("Pàgines simples", "index.php?module=Pages&type=admin", "", 0, 24, 120);\nMenu4_1_3=new Array("Tauler", "index.php?module=IWnoteboard&type=admin", "", 0, 24, 150);\nMenu4_1_4=new Array("Agendes", "index.php?module=IWagendas&type=admin", "", 0, 24, 120);\nMenu4_1_5=new Array("Fòrums", "index.php?module=IWforums&type=admin", "", 0, 24, 80);\nMenu4_1_6=new Array("Documents", "index.php?module=IWdocmanager&type=admin&func=viewCategories", "", 0, 24, 120);\nMenu4_1_7=new Array("Més opcions", "index.php?module=adminpanel&type=admin&func=adminpanel&acid=4", "", 0, 24, 150);\nMenu4_2=new Array("Sistema", "index.php?module=Admin&type=admin&func=adminpanel&acid=1", "", 6, 24, 120);\nMenu4_2_1=new Array("Paràm.Generals", "index.php?module=Settings&type=admin", "", 0, 24, 120);\nMenu4_2_2=new Array("Seguretat", "index.php?module=SecurityCenter&type=admin&func=main", "", 0, 24, 150);\nMenu4_2_3=new Array("Blocs", "index.php?module=Blocks&type=admin", "", 0, 24, 120);\nMenu4_2_4=new Array("Mòduls", "index.php?module=Extensions&type=admin", "", 0, 24, 120);\nMenu4_2_5=new Array("Fitxers del lloc", "index.php?module=Files", "", 0, 24, 120);\nMenu4_2_6=new Array("Més opcions", "index.php?module=adminpanel&type=admin&func=adminpanel&acid=1", "", 0, 24, 150);\nMenu4_3=new Array("Usuaris", "index.php?module=Admin&type=admin&func=adminpanel&acid=2", "", 4, 24, 120);\nMenu4_3_1=new Array("Usuaris", "index.php?module=IWusers&type=admin", "", 0, 24, 120);\nMenu4_3_2=new Array("Grups", "index.php?module=Groups&type=admin", "", 0, 24, 150);\nMenu4_3_3=new Array("Permisos", "index.php?module=permissions&type=admin&func=view", "", 0, 24, 120);\nMenu4_3_4=new Array("Més opcions", "index.php?module=adminpanel&type=admin&func=adminpanel&acid=2", "", 0, 24, 150);\nMenu4_4=new Array("Utilitats", "index.php?module=Admin&type=admin&func=adminpanel&acid=5", "", 4, 24, 150);\nMenu4_4_1=new Array("Reserves", "index.php?module=IWbookings&type=admin", "", 0, 23, 150);\nMenu4_4_2=new Array("Formularis", "index.php?module=IWforms&type=admin", "", 0, 24, 120);\nMenu4_4_3=new Array("Llibres", "index.php?module=IWbooks&type=admin", "", 0, 24, 150);\nMenu4_4_4=new Array("Més opcions", "index.php?module=adminpanel&type=admin&func=adminpanel&acid=5", "", 0, 24, 150);\nMenu5=new Array("Surt", "index.php?module=users&type=user&func=logout", "", 0, 24, 70);\n</script>\n<script type="text/javascript" src="modules/IWvhmenu/javascript/menu_com.js"></script>\n', 2, '1424277503', 1, 'A', '1970-01-01 00:00:00', 0, '2015-02-18 17:31:25', 2),
(10, 'IWmain_block_news', 'have_news', '0', 2, '1429461087', 0, 'A', '2015-02-18 17:30:25', 2, '2015-02-18 17:31:27', 2),
(11, 'IWmain_block_flagged', 'have_flags', '0', 2, '1429461087', 0, 'A', '2015-02-18 17:30:25', 2, '2015-02-18 17:31:27', 2);

-- --------------------------------------------------------

--
-- Estructura de la taula `IWmain_logs`
--

CREATE TABLE IF NOT EXISTS `IWmain_logs` (
  `iw_logId` int(11) NOT NULL AUTO_INCREMENT,
  `iw_moduleName` varchar(25) NOT NULL,
  `iw_actionType` tinyint(4) NOT NULL DEFAULT '0',
  `iw_visible` tinyint(4) NOT NULL DEFAULT '0',
  `iw_actionText` varchar(255) NOT NULL,
  `iw_logIp` varchar(15) NOT NULL,
  `iw_indexName` varchar(15) NOT NULL,
  `iw_indexValue` int(11) NOT NULL DEFAULT '0',
  `iw_indexName1` varchar(15) NOT NULL,
  `iw_indexValue1` int(11) NOT NULL DEFAULT '0',
  `iw_error` tinyint(4) NOT NULL DEFAULT '0',
  `obj_status` varchar(1) NOT NULL DEFAULT 'A',
  `cr_date` datetime NOT NULL DEFAULT '1970-01-01 00:00:00',
  `cr_uid` int(11) NOT NULL DEFAULT '0',
  `lu_date` datetime NOT NULL DEFAULT '1970-01-01 00:00:00',
  `lu_uid` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`iw_logId`),
  KEY `iw_moduleName` (`iw_moduleName`),
  KEY `iw_visible` (`iw_visible`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de la taula `IWmessages`
--

CREATE TABLE IF NOT EXISTS `IWmessages` (
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
-- Estructura de la taula `IWnoteboard`
--

CREATE TABLE IF NOT EXISTS `IWnoteboard` (
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
  `iw_literalGroups` varchar(255) NOT NULL DEFAULT '',
  `pn_obj_status` varchar(1) NOT NULL DEFAULT 'A',
  `pn_cr_date` datetime NOT NULL DEFAULT '1970-01-01 00:00:00',
  `pn_cr_uid` int(11) NOT NULL DEFAULT '0',
  `pn_lu_date` datetime NOT NULL DEFAULT '1970-01-01 00:00:00',
  `pn_lu_uid` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`iw_nid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de la taula `IWnoteboard_topics`
--

CREATE TABLE IF NOT EXISTS `IWnoteboard_topics` (
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
-- Bolcant dades de la taula `IWnoteboard_topics`
--

INSERT INTO `IWnoteboard_topics` (`iw_tid`, `iw_nomtema`, `iw_descriu`, `iw_grup`, `pn_obj_status`, `pn_cr_date`, `pn_cr_uid`, `pn_lu_date`, `pn_lu_uid`) VALUES
(1, 'Alumnat', 'Tema per a les notes per a l''alumnat', 3, 'A', '2008-09-22 09:45:17', 2, '2008-09-22 09:45:17', 2),
(2, 'Comunitat', 'Tema per a les notes d''interès general', 0, 'A', '2008-09-22 09:58:00', 2, '2008-09-22 09:58:00', 2),
(3, 'Professorat', 'Tema per a les notes per al professorat', 4, 'A', '2008-09-22 09:58:52', 2, '2008-09-22 09:58:52', 2),
(4, 'Editors', 'Tema per a les notes per a les persones que gestionen els continguts', 8, 'A', '2008-09-22 09:59:35', 2, '2008-09-22 09:59:35', 2);

-- --------------------------------------------------------

--
-- Estructura de la taula `IWqv`
--

CREATE TABLE IF NOT EXISTS `IWqv` (
  `iw_qvid` int(11) NOT NULL AUTO_INCREMENT,
  `iw_teacher` int(11) NOT NULL,
  `iw_groups` varchar(255) NOT NULL,
  `iw_title` varchar(255) NOT NULL,
  `iw_description` longtext NOT NULL,
  `iw_url` varchar(255) NOT NULL,
  `iw_skin` varchar(20) NOT NULL,
  `iw_lang` varchar(10) NOT NULL,
  `iw_maxdeliver` int(11) NOT NULL DEFAULT '-1',
  `iw_showcorrection` int(11) NOT NULL DEFAULT '1',
  `iw_showinteraction` int(11) NOT NULL DEFAULT '1',
  `iw_ordersections` int(11) NOT NULL DEFAULT '0',
  `iw_orderitems` int(11) NOT NULL DEFAULT '0',
  `iw_target` varchar(10) NOT NULL DEFAULT 'blank',
  `iw_width` varchar(10) DEFAULT NULL,
  `iw_height` varchar(10) DEFAULT NULL,
  `iw_active` int(11) NOT NULL DEFAULT '1',
  `iw_observations` longtext NOT NULL,
  `pn_obj_status` varchar(1) NOT NULL DEFAULT 'A',
  `pn_cr_date` datetime NOT NULL DEFAULT '1970-01-01 00:00:00',
  `pn_cr_uid` int(11) NOT NULL DEFAULT '0',
  `pn_lu_date` datetime NOT NULL DEFAULT '1970-01-01 00:00:00',
  `pn_lu_uid` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`iw_qvid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de la taula `IWqv_assignments`
--

CREATE TABLE IF NOT EXISTS `IWqv_assignments` (
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
-- Estructura de la taula `IWqv_messages`
--

CREATE TABLE IF NOT EXISTS `IWqv_messages` (
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
-- Estructura de la taula `IWqv_messages_read`
--

CREATE TABLE IF NOT EXISTS `IWqv_messages_read` (
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
-- Estructura de la taula `IWqv_sections`
--

CREATE TABLE IF NOT EXISTS `IWqv_sections` (
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
-- Estructura de la taula `IWstats`
--

CREATE TABLE IF NOT EXISTS `IWstats` (
  `iw_statsid` int(11) NOT NULL AUTO_INCREMENT,
  `iw_datetime` datetime NOT NULL DEFAULT '1970-01-01 00:00:00',
  `iw_ip` varchar(15) NOT NULL,
  `iw_moduleid` int(11) NOT NULL DEFAULT '0',
  `iw_params` varchar(255) NOT NULL,
  `iw_uid` int(11) NOT NULL DEFAULT '0',
  `iw_isadmin` tinyint(4) NOT NULL DEFAULT '0',
  `iw_skippedModule` tinyint(4) NOT NULL DEFAULT '0',
  `iw_skipped` tinyint(4) NOT NULL DEFAULT '0',
  `iw_summarised` tinyint(4) NOT NULL DEFAULT '0',
  `iw_ipForward` varchar(15) NOT NULL,
  `iw_ipClient` varchar(15) NOT NULL,
  `iw_userAgent` varchar(255) NOT NULL,
  PRIMARY KEY (`iw_statsid`),
  KEY `iw_ipForward` (`iw_ipForward`),
  KEY `iw_ipClient` (`iw_ipClient`),
  KEY `iw_userAgent` (`iw_userAgent`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Bolcant dades de la taula `IWstats`
--

INSERT INTO `IWstats` (`iw_statsid`, `iw_datetime`, `iw_ip`, `iw_moduleid`, `iw_params`, `iw_uid`, `iw_isadmin`, `iw_skippedModule`, `iw_skipped`, `iw_summarised`, `iw_ipForward`, `iw_ipClient`, `iw_userAgent`) VALUES
(1, '2015-02-18 17:28:18', '192.168.33.1', 27, 'ccentre=usu1', 2, 1, 0, 0, 0, '', '', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/40.0.2214.111 Safari/537.36'),
(2, '2015-02-18 17:30:21', '192.168.33.1', 27, 'ccentre=usu1&module=Not%C3%ADcies&type=admin&func=view', 2, 1, 0, 0, 0, '', '', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/40.0.2214.111 Safari/537.36'),
(3, '2015-02-18 17:30:30', '192.168.33.1', 1, 'ccentre=usu1&module=Extensions&type=admin', 2, 1, 0, 0, 0, '', '', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/40.0.2214.111 Safari/537.36'),
(4, '2015-02-18 17:30:30', '192.168.33.1', 1, 'ccentre=usu1&module=extensions&type=admin&func=view', 2, 1, 0, 0, 0, '', '', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/40.0.2214.111 Safari/537.36'),
(5, '2015-02-18 17:31:16', '192.168.33.1', 0, 'ccentre=usu1', 2, 1, 0, 0, 0, '', '', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/40.0.2214.111 Safari/537.36'),
(6, '2015-02-18 17:31:23', '192.168.33.1', 1, 'ccentre=usu1&module=extensions&type=admin&func=view', 2, 1, 0, 0, 0, '', '', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/40.0.2214.111 Safari/537.36'),
(7, '2015-02-18 17:31:26', '192.168.33.1', 27, 'ccentre=usu1', 2, 1, 0, 0, 0, '', '', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/40.0.2214.111 Safari/537.36');

-- --------------------------------------------------------

--
-- Estructura de la taula `IWstats_summary`
--

CREATE TABLE IF NOT EXISTS `IWstats_summary` (
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
-- Estructura de la taula `IWtimeframes`
--

CREATE TABLE IF NOT EXISTS `IWtimeframes` (
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
-- Bolcant dades de la taula `IWtimeframes`
--

INSERT INTO `IWtimeframes` (`hid`, `mdid`, `start`, `end`, `descriu`, `pn_obj_status`, `pn_cr_date`, `pn_cr_uid`, `pn_lu_date`, `pn_lu_uid`) VALUES
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
-- Estructura de la taula `IWtimeframes_definition`
--

CREATE TABLE IF NOT EXISTS `IWtimeframes_definition` (
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
-- Bolcant dades de la taula `IWtimeframes_definition`
--

INSERT INTO `IWtimeframes_definition` (`mdid`, `nom_marc`, `descriu`, `pn_obj_status`, `pn_cr_date`, `pn_cr_uid`, `pn_lu_date`, `pn_lu_uid`) VALUES
(1, 'Primària', 'Marc horari de mostra per a primària', 'A', '2008-09-10 16:57:41', 2, '2008-09-10 16:57:41', 2),
(2, 'ESO', 'Marc horari de mostra per a la ESO', 'A', '2008-09-10 16:58:02', 2, '2008-09-10 16:58:02', 2);

-- --------------------------------------------------------

--
-- Estructura de la taula `IWusers`
--

CREATE TABLE IF NOT EXISTS `IWusers` (
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
  `iw_description` mediumtext NOT NULL,
  `iw_avatar` varchar(50) NOT NULL,
  `iw_newavatar` varchar(50) NOT NULL,
  `iw_sex` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`iw_suid`),
  KEY `iw_uid` (`iw_uid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Bolcant dades de la taula `IWusers`
--

INSERT INTO `IWusers` (`iw_suid`, `iw_uid`, `iw_id`, `iw_nom`, `iw_cognom1`, `iw_cognom2`, `iw_naixement`, `iw_accio`, `zk_obj_status`, `zk_cr_date`, `zk_cr_uid`, `zk_lu_date`, `zk_lu_uid`, `iw_description`, `iw_avatar`, `iw_newavatar`, `iw_sex`) VALUES
(1, 1, '', 'Usuari/ària anònim', '', '', '', 0, 'A', '1970-01-01 00:00:00', 0, '2008-09-09 16:39:50', 2, '', '', '', 0),
(2, 2, '', 'Administrador/a', '', '', '', 0, 'A', '1970-01-01 00:00:00', 0, '2008-09-09 16:39:10', 2, '', '', '', 0),
(3, 3, '', 'Professor/a', 'U', '', '', 0, 'A', '1970-01-01 00:00:00', 0, '1970-01-01 00:00:00', 0, '', '', '', 0),
(4, 4, '', 'Professor/a', 'Dos', '', '', 0, 'A', '1970-01-01 00:00:00', 0, '1970-01-01 00:00:00', 0, '', '', '', 0),
(5, 5, '', 'Professor/a', 'Tres', '', '', 0, 'A', '1970-01-01 00:00:00', 0, '1970-01-01 00:00:00', 0, '', '', '', 0),
(6, 6, '', 'Alumne/a', 'U', '', '', 0, 'A', '1970-01-01 00:00:00', 0, '1970-01-01 00:00:00', 0, '', '', '', 0),
(7, 7, '', 'Alumne/a', 'Dos', '', '', 0, 'A', '1970-01-01 00:00:00', 0, '1970-01-01 00:00:00', 0, '', '', '', 0),
(8, 8, '', 'Alumne/a', 'Tres', '', '', 0, 'A', '1970-01-01 00:00:00', 0, '1970-01-01 00:00:00', 0, '', '', '', 0),
(9, 9, '', 'Membre', 'equip', 'directiu', '', 0, 'A', '1970-01-01 00:00:00', 0, '1970-01-01 00:00:00', 0, '', '', '', 0),
(10, 10, '', '', '', '', '', 0, 'A', '1970-01-01 00:00:00', 0, '1970-01-01 00:00:00', 0, '', '', '', 0),
(11, 11, '', 'Usuari/ària', 'd''Edició', '', '', 0, 'A', '1970-01-01 00:00:00', 0, '1970-01-01 00:00:00', 0, '', '', '', 0);

-- --------------------------------------------------------

--
-- Estructura de la taula `IWusers_friends`
--

CREATE TABLE IF NOT EXISTS `IWusers_friends` (
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
-- Estructura de la taula `IWvhmenu`
--

CREATE TABLE IF NOT EXISTS `IWvhmenu` (
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=38 ;

--
-- Bolcant dades de la taula `IWvhmenu`
--

INSERT INTO `IWvhmenu` (`iw_mid`, `iw_text`, `iw_url`, `iw_bg_image`, `iw_height`, `iw_width`, `iw_id_parent`, `iw_groups`, `iw_active`, `iw_target`, `iw_descriu`, `iw_iorder`, `iw_grafic`, `iw_image1`, `iw_image2`, `pn_obj_status`, `pn_cr_date`, `pn_cr_uid`, `pn_lu_date`, `pn_lu_uid`) VALUES
(1, 'Inici', 'index.php', '', 23, 70, 0, '$$0|0$$-1|0$', 1, 0, 'Càrrega la pàgina d''inici', 4, 0, '', '', 'A', '2008-04-16 21:43:52', 2, '2014-03-04 13:30:21', 2),
(2, 'Administració', 'admin.php', '', 24, 120, 0, '$$2|0$', 1, 0, '', 10, 0, '', '', 'A', '2008-04-16 21:44:17', 2, '2014-03-04 13:30:21', 2),
(3, 'Surt', 'index.php?module=users&type=user&func=logout', 'surt.gif', 24, 70, 0, '$$0|0$', 1, 0, '', 12, 0, '', '', 'A', '2008-04-16 21:56:57', 2, '2014-03-04 13:30:21', 2),
(4, 'Bústia', 'index.php?module=IWmessages', 'correu.gif', 24, 80, 0, '$$0|0$', 1, 0, '', 8, 0, '', '', 'A', '2008-04-16 22:19:56', 2, '2014-03-04 13:30:21', 2),
(5, 'Agendes', 'index.php?module=IWagendas&type=admin', '', 24, 120, 17, '$$2|0$', 1, 0, '', 10, 0, '', '', 'A', '2008-04-16 22:28:52', 2, '2014-03-04 13:16:31', 2),
(6, 'Formularis', 'index.php?module=IWforms&type=admin', '', 24, 120, 28, '$$2|0$', 1, 0, '', 4, 0, '', '', 'A', '2008-04-17 02:17:11', 2, '2014-03-04 13:31:19', 2),
(7, 'Fitxers del lloc', 'index.php?module=Files', '', 24, 120, 9, '$$2|0$', 1, 0, '', 12, 0, '', '', 'A', '2008-04-17 02:21:47', 2, '2014-03-04 13:26:07', 2),
(9, 'Sistema', 'index.php?module=Admin&type=admin&func=adminpanel&acid=1', '', 24, 120, 2, '$$2|0$', 1, 0, '', 4, 0, '', '', 'A', '2008-04-20 12:44:13', 2, '2014-03-04 12:59:25', 2),
(10, 'Usuaris', 'index.php?module=Admin&type=admin&func=adminpanel&acid=2', '', 24, 120, 2, '$$2|0$', 1, 0, '', 6, 0, '', '', 'A', '2008-04-20 12:52:32', 2, '2014-03-04 12:59:25', 2),
(11, 'Mòduls', 'index.php?module=Extensions&type=admin', '', 24, 120, 9, '$$2|0$', 1, 0, '', 8, 0, '', '', 'A', '2008-04-20 12:54:29', 2, '2014-03-04 13:26:07', 2),
(12, 'Paràm.Generals', 'index.php?module=Settings&type=admin', '', 24, 120, 9, '$$2|0$', 1, 0, '', 2, 0, '', '', 'A', '2008-04-20 12:55:57', 2, '2014-03-04 13:26:07', 2),
(13, 'Blocs', 'index.php?module=Blocks&type=admin', '', 24, 120, 9, '$$2|0$', 1, 0, '', 6, 0, '', '', 'A', '2008-04-20 12:57:08', 2, '2014-03-04 13:26:07', 2),
(14, 'Permisos', 'index.php?module=permissions&type=admin&func=view', '', 24, 120, 10, '$$2|0$', 1, 0, '', 6, 0, '', '', 'A', '2008-04-20 12:58:21', 2, '2014-03-04 13:29:16', 2),
(15, 'El meu compte', 'user.php', '', 24, 120, 0, '$$0|0$', 1, 0, '', 6, 0, '', '', 'A', '2008-06-22 23:20:31', 2, '2014-03-04 13:30:21', 2),
(17, 'Continguts', 'index.php?module=Admin&type=admin&func=adminpanel&acid=4', '', 24, 120, 2, '$$2|0$', 1, 0, '', 2, 0, '', '', 'A', '2008-06-23 04:00:46', 2, '2014-03-04 12:59:25', 2),
(18, 'Fòrums', 'index.php?module=IWforums&type=admin', '', 24, 80, 17, '$$2|0$', 1, 0, '', 12, 0, '', '', 'A', '2008-06-23 04:03:15', 2, '2014-03-04 13:16:31', 2),
(19, 'Documents', 'index.php?module=IWdocmanager&type=admin&func=viewCategories', '', 24, 120, 17, '$$2|0$', 1, 0, 'Documents de descàrrega', 14, 0, '', '', 'A', '2008-06-23 00:00:41', 2, '2014-03-04 13:16:31', 2),
(20, 'Pàgines simples', 'index.php?module=Pages&type=admin', '', 24, 120, 17, '$$2|0$', 1, 0, '', 4, 0, '', '', 'A', '2008-06-23 00:01:34', 2, '2014-03-04 13:16:31', 2),
(21, 'Notícies', 'index.php?module=News&type=admin', '', 24, 120, 17, '$$2|0$', 1, 0, 'Notícies del portal', 2, 0, '', '', 'A', '2008-06-23 00:03:05', 2, '2014-03-04 13:16:31', 2),
(22, 'Usuaris', 'index.php?module=IWusers&type=admin', '', 24, 120, 10, '$$2|0$', 1, 0, 'Opcions ampliades d''administració dels usuaris', 2, 0, '', '', 'A', '2008-06-24 12:51:20', 2, '2014-03-04 13:29:15', 2),
(23, 'Llibres', 'index.php?module=IWbooks&type=admin', '', 24, 150, 28, '$$2|0$', 1, 0, 'Accés d''administració al mòdul de llibres', 6, 0, '', '', 'A', '2008-09-10 16:08:35', 2, '2014-03-04 13:31:19', 2),
(24, 'Reserves', 'index.php?module=IWbookings&type=admin', '', 23, 150, 28, '$$2|0$', 1, 0, 'Accés d''administració al mòdul de reserves', 2, 0, '', '', 'A', '2008-09-10 16:52:17', 2, '2014-03-04 13:31:19', 2),
(25, 'Tauler', 'index.php?module=IWnoteboard&type=admin', '', 24, 150, 17, '$$2|0$', 1, 0, 'Accés d''administració al mòdul del tauler', 8, 0, '', '', 'A', '2008-09-15 17:27:06', 2, '2014-03-04 13:16:31', 2),
(27, 'Grups', 'index.php?module=Groups&type=admin', '', 24, 150, 10, '$$2|0$', 1, 0, 'Accés d''administració al mòdul de grups', 4, 0, '', '', 'A', '2008-09-22 09:34:35', 2, '2014-03-04 13:29:16', 2),
(28, 'Utilitats', 'index.php?module=Admin&type=admin&func=adminpanel&acid=5', '', 24, 150, 2, '$$2|0$', 1, 0, 'Accés a la pestanya d''utilitats del tauler d''administració', 8, 0, '', '', 'A', '2008-09-23 09:09:36', 2, '2014-03-04 12:59:25', 2),
(31, 'Seguretat', 'index.php?module=SecurityCenter&type=admin&func=main', '', 24, 150, 9, '$$2|0$', 1, 0, '', 4, 0, '', '', 'A', '2014-03-04 13:12:10', 2, '2014-03-04 13:26:07', 2),
(32, 'Més opcions', 'index.php?module=adminpanel&type=admin&func=adminpanel&acid=4', '', 24, 150, 17, '$$2|0$', 1, 0, '', 16, 0, '', '', 'A', '2014-03-04 13:15:14', 2, '2014-03-04 13:16:31', 2),
(35, 'Més opcions', 'index.php?module=adminpanel&type=admin&func=adminpanel&acid=1', '', 24, 150, 9, '$$2|0$', 1, 0, '', 14, 0, '', '', 'A', '2014-03-04 13:24:59', 2, '2014-03-04 13:26:07', 2),
(36, 'Més opcions', 'index.php?module=adminpanel&type=admin&func=adminpanel&acid=2', '', 24, 150, 10, '$$2|0$', 1, 0, '', 10, 0, '', '', 'A', '2014-03-04 13:27:34', 2, '2014-03-04 13:29:16', 2),
(37, 'Més opcions', 'index.php?module=adminpanel&type=admin&func=adminpanel&acid=5', '', 24, 150, 28, '$$2|0$', 1, 0, '', 10, 0, '', '', 'A', '2014-03-04 13:30:20', 2, '2014-03-04 13:31:19', 2);

-- --------------------------------------------------------

--
-- Estructura de la taula `IWwebbox`
--

CREATE TABLE IF NOT EXISTS `IWwebbox` (
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
-- Estructura de la taula `message`
--

CREATE TABLE IF NOT EXISTS `message` (
  `mid` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL DEFAULT '',
  `content` longtext NOT NULL,
  `date` int(11) NOT NULL DEFAULT '0',
  `expire` int(11) NOT NULL DEFAULT '0',
  `active` int(11) NOT NULL DEFAULT '1',
  `view` int(11) NOT NULL DEFAULT '1',
  `language` varchar(30) NOT NULL DEFAULT '',
  PRIMARY KEY (`mid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Bolcant dades de la taula `message`
--

INSERT INTO `message` (`mid`, `title`, `content`, `date`, `expire`, `active`, `view`, `language`) VALUES
(1, 'Benvinguts a la Intraweb', '<p>La Intraweb és una intranet orientada al món educatiu basada en el <a href="http://zikula.org">Zikula</a>, un sistema de gestió de continguts segur i estable.\r\n  <br />\r\n</p>\r\n<p>Els usos més destacables de la Intraweb són:\r\n</p>\r\n<ul>\r\n  <li>Com a web pública del centre</li>\r\n  <li>Com a eina de comunicació interpersonal i comunitària\r\n  <br /></li>\r\n  <li>Com a instrument pedagògic</li>\r\n  <li>Com a eina de suport a determinats aspectes de la gestió del centre</li>\r\n</ul>\r\n<p>Esperem que la Intraweb us agradi.\r\n  <br />\r\n  <br /><strong>L''equip de desenvolupament del projecte Intraweb</strong>\r\n</p>\r\n<p><em>Nota: podeu editar o esborrar aquest missatge accedint al tauler d''administració i clicant a l''opció ''Missatges d''administració''</em>\r\n</p>', 1236342167, 0, 1, 1, '');

-- --------------------------------------------------------

--
-- Estructura de la taula `modules`
--

CREATE TABLE IF NOT EXISTS `modules` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
  `type` tinyint(4) NOT NULL DEFAULT '0',
  `displayname` varchar(64) NOT NULL,
  `description` varchar(255) NOT NULL,
  `regid` int(11) NOT NULL DEFAULT '0',
  `directory` varchar(64) NOT NULL,
  `version` varchar(10) NOT NULL DEFAULT '0',
  `official` tinyint(4) NOT NULL DEFAULT '0',
  `author` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `admin_capable` tinyint(4) NOT NULL DEFAULT '0',
  `user_capable` tinyint(4) NOT NULL DEFAULT '0',
  `state` smallint(6) NOT NULL DEFAULT '0',
  `credits` varchar(255) NOT NULL,
  `changelog` varchar(255) NOT NULL,
  `help` varchar(255) NOT NULL,
  `license` varchar(255) NOT NULL,
  `securityschema` longtext NOT NULL,
  `profile_capable` tinyint(4) NOT NULL DEFAULT '0',
  `message_capable` tinyint(4) NOT NULL DEFAULT '0',
  `url` varchar(64) NOT NULL,
  `capabilities` longtext NOT NULL,
  `core_min` varchar(9) NOT NULL,
  `core_max` varchar(9) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `state` (`state`),
  KEY `mod_state` (`name`,`state`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=120 ;

--
-- Bolcant dades de la taula `modules`
--

INSERT INTO `modules` (`id`, `name`, `type`, `displayname`, `description`, `regid`, `directory`, `version`, `official`, `author`, `contact`, `admin_capable`, `user_capable`, `state`, `credits`, `changelog`, `help`, `license`, `securityschema`, `profile_capable`, `message_capable`, `url`, `capabilities`, `core_min`, `core_max`) VALUES
(1, 'Extensions', 3, 'Mòduls', 'Gestioneu els vostres mòduls i connectors.', 0, 'Extensions', '3.7.10', 1, 'Jim McDonald, Mark West', 'http://www.zikula.org', 1, 0, 3, '', '', '', '', 'a:1:{s:12:"Extensions::";s:2:"::";}', 0, 0, 'extensions', 'a:1:{s:5:"admin";a:1:{s:7:"version";s:3:"1.0";}}', '', ''),
(3, 'Blocks', 3, 'Blocs', 'Administració dels blocs i la seva posició.', 0, 'Blocks', '3.8.2', 1, 'Jim McDonald, Mark West', 'http://www.mcdee.net/, http://www.markwest.me.uk/', 1, 1, 3, '', '', '', '', 'a:4:{s:8:"Blocks::";s:30:"Block key:Block title:Block ID";s:16:"Blocks::position";s:26:"Position name::Position ID";s:23:"Menutree:menutreeblock:";s:26:"Block ID:Link Name:Link ID";s:19:"ExtendedMenublock::";s:17:"Block ID:Link ID:";}', 0, 0, 'blocs', 'a:3:{s:15:"hook_subscriber";a:1:{s:7:"enabled";b:1;}s:5:"admin";a:1:{s:7:"version";s:3:"1.0";}s:4:"user";a:1:{s:7:"version";s:3:"1.0";}}', '', ''),
(4, 'Errors', 3, 'Errors', 'Mòdul de visualització d''errors.', 0, 'Errors', '1.1.1', 1, 'Brian Lindner <Furbo>', 'furbo@sigtauonline.com', 0, 1, 3, 'pndocs/credits.txt', 'pndocs/changelog.txt', 'pndocs/help.txt', 'pndocs/license.txt', 'a:1:{s:8:"Errors::";s:2:"::";}', 0, 0, 'errors', 'a:1:{s:4:"user";a:1:{s:7:"version";s:3:"1.0";}}', '', ''),
(5, 'Permissions', 3, 'Permisos', 'Gestió dels permisos d''usuari/ària.', 0, 'Permissions', '1.1.1', 1, 'Jim McDonald, M.Maes', 'http://www.mcdee.net/, http://www.mmaes.com', 1, 0, 3, 'pndocs/credits.txt', 'pndocs/changelog.txt', 'pndocs/install.txt', 'pndocs/license.txt', 'a:1:{s:13:"Permissions::";s:2:"::";}', 0, 0, 'permisos', 'a:1:{s:5:"admin";a:1:{s:7:"version";s:3:"1.0";}}', '', ''),
(7, 'Mailer', 3, 'Mailer', 'El mòdul Mailer, proporciona un API de correu i l''administració de la configuració del correu.', 0, 'Mailer', '1.3.2', 1, 'Mark West', 'http://www.markwest.me.uk/', 1, 0, 3, 'pndocs/credits.txt', 'pndocs/changelog.txt', 'pndocs/help.txt', 'pndocs/license.txt', 'a:1:{s:8:"Mailer::";s:2:"::";}', 0, 0, 'mailer', 'a:1:{s:5:"admin";a:1:{s:7:"version";s:3:"1.0";}}', '', ''),
(8, 'SecurityCenter', 3, 'Seguretat', 'Administració i configuració de la seguretat del lloc.', 0, 'SecurityCenter', '1.4.4', 1, 'Mark West', 'http://www.markwest.me.uk', 1, 0, 3, 'pndocs/credits.txt', 'pndocs/changelog.txt', 'pndocs/help.txt', 'pndocs/license.txt', 'a:1:{s:16:"SecurityCenter::";s:2:"::";}', 0, 0, 'centredeseguretat', 'a:1:{s:5:"admin";a:1:{s:7:"version";s:3:"1.0";}}', '', ''),
(10, 'Search', 3, 'Motor de cerca', 'Paràmetres del cercador intern del lloc.', 0, 'Search', '1.5.2', 1, 'Patrick Kellum', 'http://www.ctarl-ctarl.com', 1, 1, 3, 'pndocs/credits.txt', 'pndocs/changelog.txt', 'pndocs/install.txt', 'pndocs/license.txt', 'a:1:{s:8:"Search::";s:13:"Module name::";}', 0, 0, 'cerca', 'a:2:{s:5:"admin";a:1:{s:7:"version";s:3:"1.0";}s:4:"user";a:1:{s:7:"version";s:3:"1.0";}}', '', ''),
(11, 'Theme', 3, 'Entorns visuals', 'Mòdul d''entorns visuals per a la gestió de l''aspecte del lloc, el renderitzat de les plantilles i la memòria cau.', 0, 'Theme', '3.4.2', 1, 'Mark West', 'http://www.markwest.me.uk/', 1, 1, 3, 'pndocs/credits.txt', 'pndocs/changelog.txt', 'pndocs/help.txt', 'pndocs/license.txt', 'a:1:{s:7:"Theme::";s:12:"Theme name::";}', 0, 0, 'entorn visual', 'a:2:{s:5:"admin";a:1:{s:7:"version";s:3:"1.0";}s:4:"user";a:1:{s:7:"version";s:3:"1.0";}}', '', ''),
(12, 'Users', 3, 'Usuaris', 'Proporciona una interfície per configurar i administrar els comptes dels usuaris. Incorpora totes les funcionalitats necessàries, però pot treballar estretament amb el mòdul de perfil.', 0, 'Users', '2.2.0', 1, 'Xiaoyu Huang, Drak', 'class007@sina.com, drak@zikula.org', 1, 1, 3, 'pndocs/credits.txt', 'pndocs/changelog.txt', 'pndocs/help.txt', 'pndocs/license.txt', 'a:2:{s:7:"Users::";s:14:"Uname::User ID";s:16:"Users::MailUsers";s:2:"::";}', 0, 0, 'usuaris', 'a:4:{s:14:"authentication";a:1:{s:7:"version";s:3:"1.0";}s:15:"hook_subscriber";a:1:{s:7:"enabled";b:1;}s:5:"admin";a:1:{s:7:"version";s:3:"1.0";}s:4:"user";a:1:{s:7:"version";s:3:"1.0";}}', '1.3.0', ''),
(16, 'Settings', 3, 'Paràmetres generals', 'Interfície de configuració general del lloc.', 0, 'Settings', '2.9.7', 1, 'Simon Wunderlin', '', 1, 0, 3, 'pndocs/credits.txt', 'pndocs/changelog.txt', 'pndocs/help.txt', 'pndocs/license.txt', 'a:1:{s:10:"Settings::";s:2:"::";}', 0, 0, 'Paràmetres', 'a:1:{s:5:"admin";a:1:{s:7:"version";s:3:"1.0";}}', '', ''),
(19, 'Admin', 3, 'Tauler d''administració', 'Gestió del propi tauler d''administració.', 0, 'Admin', '1.9.1', 1, 'Mark West', 'http://www.markwest.me.uk/', 1, 0, 3, 'pndocs/credits.txt', 'pndocs/changelog.txt', 'pndocs/help.txt', 'pndocs/license.txt', 'a:1:{s:7:"Admin::";s:38:"Admin Category name::Admin Category ID";}', 0, 0, 'adminpanel', 'a:1:{s:5:"admin";a:1:{s:7:"version";s:3:"1.0";}}', '', ''),
(20, 'PageLock', 3, 'Gestor del bloqueig de pàgines', 'Proporciona la capacitat de bloquejar pàgines quan s''estan utilitzant.', 0, 'PageLock', '1.1.1', 1, 'Jorn Wildt', 'http://www.elfisk.dk', 0, 0, 3, 'pndocs/credits.txt', 'pndocs/changelog.txt', 'pndocs/install.txt', 'pndocs/license.txt', 'a:1:{s:10:"PageLock::";s:2:"::";}', 0, 0, 'pagelock', 'a:0:{}', '', ''),
(21, 'Categories', 3, 'Categories', 'Categoria d''administració.', 0, 'Categories', '1.2.1', 1, 'Robert Gasch', 'rgasch@gmail.com', 1, 1, 3, 'pndocs/credits.txt', 'pndocs/changelog.txt', 'pndocs/help.txt', 'pndocs/license.txt', 'a:1:{s:20:"Categories::Category";s:40:"Category ID:Category Path:Category IPath";}', 0, 0, 'categories', 'a:2:{s:5:"admin";a:1:{s:7:"version";s:3:"1.0";}s:4:"user";a:1:{s:7:"version";s:3:"1.0";}}', '', ''),
(23, 'Groups', 3, 'Grups', 'Mòdul d''administració de grups d''usuaris', 0, 'Groups', '2.3.2', 1, 'Mark West, Franky Chestnut, Michael Halbook', 'http://www.markwest.me.uk/, http://dev.pnconcept.com, http://www.halbrooktech.com', 1, 1, 3, 'pndocs/credits.txt', 'pndocs/changelog.txt', 'pndocs/help.txt', 'pndocs/license.txt', 'a:1:{s:8:"Groups::";s:10:"Group ID::";}', 0, 0, 'grups', 'a:2:{s:5:"admin";a:1:{s:7:"version";s:3:"1.0";}s:4:"user";a:1:{s:7:"version";s:3:"1.0";}}', '', ''),
(24, 'AdminMessages', 2, 'Publicació d''avisos', 'Proporciona un sistema per publicar, editar i programar anuncis especials creats per l''administrador/a de l''espai web.', 0, 'AdminMessages', '2.2.0', 1, 'Mark West', 'http://www.markwest.me.uk', 1, 0, 3, 'pndocs/credits.txt', 'pndocs/changelog.txt', 'pndocs/help.txt', 'pndocs/license.txt', 'a:1:{s:15:"AdminMessages::";s:25:"message title::message id";}', 0, 0, 'Publicació d''avisos', 'a:1:{s:5:"admin";a:1:{s:7:"version";s:3:"1.0";}}', '', ''),
(27, 'News', 2, 'Notícies', 'Proporciona un sistema d''addició, edició, esborrament i administració de notícies.', 0, 'News', '3.0.0', 1, 'Mark West, Mateo Tibaquira, Erik Spaan', 'http://code.zikula.org/news', 1, 1, 3, 'pndocs/credits.txt', 'pndocs/changelog.txt', 'pndocs/install.txt', 'pndocs/license.txt', 'a:3:{s:6:"News::";s:26:"Contributor ID::Article ID";s:19:"News:pictureupload:";s:2:"::";s:24:"News:publicationdetails:";s:2:"::";}', 0, 0, 'Notícies', 'a:3:{s:15:"hook_subscriber";a:1:{s:7:"enabled";b:1;}s:5:"admin";a:1:{s:7:"version";s:3:"1.0";}s:4:"user";a:1:{s:7:"version";s:3:"1.0";}}', '1.3.0', ''),
(31, 'AuthLDAP', 2, 'AuthLDAP', 'Permet validar usuaris XTEC per LDAP', 0, 'AuthLDAP', '1.0.1', 1, 'Mike Goldfinger', 'MikeGoldfinger@linuxmail.org', 1, 0, 1, 'pndocs/credits.txt', 'pndocs/changelog.txt', 'pndocs/help.txt', 'pndocs/license.txt', 'a:1:{s:10:"AuthLDAP::";s:2:"::";}', 0, 0, 'AuthLDAP', 'a:1:{s:5:"admin";a:1:{s:7:"version";s:3:"1.0";}}', '', ''),
(43, 'Ephemerids', 2, 'Efemèrides ', 'Proporciona un bloc que mostra un byte d''informació (esdeveniments històrics, cita del dia, etc.) relacionada amb la data actual. Es renova diàriament i incorpora una interfície per tal d''afegir, editar i mantenir efemèrides.', 0, 'Ephemerids', '1.8.0', 1, 'Mark West', 'http://www.markwest.me.uk', 1, 0, 1, '', '', '', '', 'a:1:{s:12:"Ephemerids::";s:14:"::Ephemerid ID";}', 0, 0, 'Efemèrides', 'a:1:{s:5:"admin";a:1:{s:7:"version";s:3:"1.0";}}', '', ''),
(46, 'Quotes', 2, 'Cites', 'Permet administrar i mostrar cites o reflexions amb suport per a categories.', 0, 'Quotes', '3.0.0', 1, 'The Zikula Development Team', 'http://www.zikula.org', 1, 0, 3, 'pndocs/credits.txt', '', '', '', 'a:1:{s:8:"Quotes::";s:21:"Author name::Quote ID";}', 0, 0, 'cites', 'a:1:{s:5:"admin";a:1:{s:7:"version";s:3:"1.0";}}', '1.3.0', ''),
(49, 'IWmain', 2, 'Paràmetres IW', 'Paràmetres comuns als mòduls IW (tipus d''arxius permesos, captcha, cron)', 0, 'IWmain', '3.0.0', 0, 'Albert Pérez Monfort & Robert Barrera', 'aperezm@xtec.cat', 1, 1, 3, 'pndocs/credits.txt', 'pndocs/changelog.txt', 'pndocs/help.txt', 'pndocs/license.txt', 'a:1:{s:8:"IWmain::";s:2:"::";}', 0, 0, 'IWmain', 'a:2:{s:5:"admin";a:1:{s:7:"version";s:3:"1.0";}s:4:"user";a:1:{s:7:"version";s:3:"1.0";}}', '', ''),
(50, 'IWqv', 2, 'Quaderns virtuals', 'Permet assignar quaderns d''exercicis als usuaris designats.', 0, 'IWqv', '3.0.0', 0, 'Sara Arjona Téllez', 'sarjona@xtec.cat', 1, 1, 3, 'pndocs/credits.txt', 'pndocs/changelog.txt', 'pndocs/help.txt', 'pndocs/license.txt', 'a:1:{s:6:"IWqv::";s:2:"::";}', 0, 0, 'Quaderns virtuals', 'a:2:{s:5:"admin";a:1:{s:7:"version";s:3:"1.0";}s:4:"user";a:1:{s:7:"version";s:3:"1.0";}}', '', ''),
(51, 'IWagendas', 2, 'Agendes', 'Permet crear i fer ús d''agendes compartides.', 0, 'IWagendas', '3.0.0', 0, 'Toni Ginard Lladó i Albert Pérez Monfort', 'aginard @xtec.cat i aperezm@xtec.es', 1, 1, 3, 'pndocs/credits.txt', 'pndocs/changelog.txt', 'pndocs/help.txt', 'pndocs/license.txt', 'a:1:{s:11:"IWagendas::";s:2:"::";}', 0, 0, 'IWagendas', 'a:2:{s:5:"admin";a:1:{s:7:"version";s:3:"1.0";}s:4:"user";a:1:{s:7:"version";s:3:"1.0";}}', '', ''),
(53, 'IWbooks', 2, 'Llibres', 'Llibres de text, lectures i materials', 0, 'IWbooks', '3.0.0', 0, 'Jordi Fons', 'jfons@iespfq.cat', 1, 1, 3, 'docs/credits.txt', 'docs/canvis.txt', 'docs/help.txt', 'docs/license.txt', 'a:1:{s:13:"IWbooks::Item";s:34:"IWbooks item name::IWbooks item ID";}', 0, 0, 'IWbooks', 'a:2:{s:5:"admin";a:1:{s:7:"version";s:3:"1.0";}s:4:"user";a:1:{s:7:"version";s:3:"1.0";}}', '', ''),
(54, 'IWforums', 2, 'Fòrums', 'Creació, gestió i ús de fòrums', 0, 'IWforums', '3.0.1', 0, 'Albert Pérez Monfort i Toni Ginard Lladó', 'aperez16@xtec.cat, aginard@xtec.cat', 1, 1, 3, 'pndocs/credits.txt', 'pndocs/changelog.txt', 'pndocs/help.txt', 'pndocs/license.txt', 'a:1:{s:10:"IWforums::";s:2:"::";}', 0, 0, 'Fòrums', 'a:3:{s:15:"hook_subscriber";a:1:{s:7:"enabled";b:1;}s:5:"admin";a:1:{s:7:"version";s:3:"1.0";}s:4:"user";a:1:{s:7:"version";s:3:"1.0";}}', '', ''),
(56, 'IWmessages', 2, 'Missatges interns', 'Permet enviar missatges interns entre els usuaris', 0, 'IWmessages', '3.0.1', 0, 'Richard Tirtadji & Albert Pérez Monfort', 'rtirtadji@hotmail.com & aperezm@xtec.es', 1, 1, 3, 'pndocs/credits.txt', 'pndocs/changelog.txt', 'pndocs/help.txt', 'pndocs/license.txt', 'a:1:{s:12:"IWmessages::";s:2:"::";}', 0, 0, 'IWmessages', 'a:3:{s:15:"hook_subscriber";a:1:{s:7:"enabled";b:1;}s:5:"admin";a:1:{s:7:"version";s:3:"1.0";}s:4:"user";a:1:{s:7:"version";s:3:"1.0";}}', '', ''),
(57, 'IWnoteboard', 2, 'Tauler', 'Permet enviar informacions als usuaris designats', 0, 'IWnoteboard', '3.0.1', 0, 'Albert Pérez Monfort', 'aperezm@xtec.es', 1, 1, 3, 'pndocs/credits.txt', 'pndocs/changelog.txt', 'pndocs/help.txt', 'pndocs/license.txt', 'a:1:{s:13:"IWnoteboard::";s:2:"::";}', 0, 0, 'Tauler', 'a:3:{s:15:"hook_subscriber";a:1:{s:7:"enabled";b:1;}s:5:"admin";a:1:{s:7:"version";s:3:"1.0";}s:4:"user";a:1:{s:7:"version";s:3:"1.0";}}', '', ''),
(58, 'IWtimeframes', 2, 'Marcs horaris', 'Permet definir marcs horaris.', 0, 'IWtimeframes', '3.0.0', 0, 'Albert Pérez Monfort & Josep Ferràndiz Farré', 'aperezm@xtec.cat / jferran6@xtec.cat', 1, 0, 3, 'pndocs/credits.txt', 'pndocs/changelog.txt', 'pndocs/help.txt', 'pndocs/license.txt', 'a:1:{s:14:"IWtimeframes::";s:2:"::";}', 0, 0, 'IWtimeframes', 'a:1:{s:5:"admin";a:1:{s:7:"version";s:3:"1.0";}}', '', ''),
(59, 'IWusers', 2, 'Usuaris-grups', 'Assignació multiple d''usuaris i grups. Configuració de l''Avatar. ', 0, 'IWusers', '3.0.0', 0, 'Albert Pérez Monfort', 'aperezm@xtec.cat', 1, 1, 3, 'pndocs/credits.txt', 'pndocs/changelog.txt', 'pndocs/help.txt', 'pndocs/license.txt', 'a:1:{s:9:"IWusers::";s:2:"::";}', 0, 0, 'Usuaris-grups', 'a:2:{s:5:"admin";a:1:{s:7:"version";s:3:"1.0";}s:4:"user";a:1:{s:7:"version";s:3:"1.0";}}', '', ''),
(60, 'IWwebbox', 2, 'Webbox', 'Show external web sites into the site.', 0, 'IWwebbox', '3.0.0', 0, 'Albert Pérez Monfort (intraweb@xtec.cat)', 'http://phobos.xtec.cat/intraweb', 1, 1, 3, 'pndocs/credits.txt', 'pndocs/changelog.txt', 'pndocs/help.txt', 'pndocs/license.txt', 'a:1:{s:10:"IWwebbox::";s:2:"::";}', 0, 0, 'IWwebbox', 'a:2:{s:5:"admin";a:1:{s:7:"version";s:3:"1.0";}s:4:"user";a:1:{s:7:"version";s:3:"1.0";}}', '', ''),
(61, 'IWvhmenu', 2, 'Menú horitzontal', 'Proporciona una interfície per administrar un menú Javascript completament personalitzable.', 0, 'IWvhmenu', '3.0.0', 0, 'Albert Pérez Monfort & Toni Ginard Lladó', 'aperez16@xtec.cat & aginard@xtec.cat', 1, 1, 3, 'pndocs/credits.txt', 'pndocs/changelog.txt', 'pndocs/help.txt', 'pndocs/license.txt', 'a:1:{s:10:"IWvhmenu::";s:2:"::";}', 0, 0, 'Menú horitzontal', 'a:2:{s:5:"admin";a:1:{s:7:"version";s:3:"1.0";}s:4:"user";a:1:{s:7:"version";s:3:"1.0";}}', '', ''),
(70, 'IWbookings', 2, 'Reserves', 'Permet definir espais i equipaments per reservar.', 0, 'IWbookings', '3.0.0', 0, 'Albert Pérez Monfort & Josep Ferràndiz Farré', 'aperezm@xtec.cat / jferran6@xtec.cat', 1, 1, 3, 'pndocs/credits.txt', 'pndocs/changelog.txt', 'pndocs/help.txt', 'pndocs/license.txt', 'a:1:{s:12:"IWbookings::";s:2:"::";}', 0, 0, 'Reserves', 'a:2:{s:5:"admin";a:1:{s:7:"version";s:3:"1.0";}s:4:"user";a:1:{s:7:"version";s:3:"1.0";}}', '', ''),
(72, 'Scribite', 2, 'Scribite', 'Editors visuals per al Zikula', 0, 'Scribite', '5.0.0', 0, 'sven schomacker aka hilope', 'http://code.zikula.org/scribite/', 1, 1, 3, 'pndocs/credits.txt', 'pndocs/changelog.txt', 'pndocs/scribite!-documentation-eng.pdf', 'pndocs/license.txt', 'a:1:{s:10:"Scribite::";s:12:"Modulename::";}', 0, 0, 'scribite', 'a:2:{s:13:"hook_provider";a:1:{s:7:"enabled";b:1;}s:5:"admin";a:1:{s:7:"version";s:3:"1.0";}}', '1.3.5', '1.4.99'),
(75, 'Pages', 2, 'Pàgines simples', 'Permet gestionar pàgines d''estructura simple', 0, 'Pages', '2.5.1', 1, 'The Zikula Development Team', 'http://www.zikula.org/', 1, 1, 3, 'pndocs/credits.txt', 'pndocs/changelog.txt', 'pndocs/install.txt', 'pndocs/license.txt', 'a:2:{s:7:"Pages::";s:18:"Page name::Page ID";s:15:"Pages:category:";s:13:"Category ID::";}', 0, 0, 'pages', 'a:3:{s:15:"hook_subscriber";a:1:{s:7:"enabled";b:1;}s:5:"admin";a:1:{s:7:"version";s:3:"1.0";}s:4:"user";a:1:{s:7:"version";s:3:"1.0";}}', '1.3.0', '1.3.99'),
(81, 'Content', 2, 'Pàgines avançades', 'Permet crear pàgines d''estructura complexa, amb varies columnes e inserir blocs i mòduls de la intraweb', 0, 'Content', '4.1.1', 0, 'Jorn Wildt', 'http://www.elfisk.dk/', 1, 1, 3, 'pndocs/readme.txt', 'pndocs/changelog.txt', 'pndocs/readme.txt', 'pndocs/license.txt', 'a:4:{s:9:"Content::";s:2:"::";s:22:"Content:plugins:layout";s:13:"Layout name::";s:23:"Content:plugins:content";s:19:"Content type name::";s:13:"Content:page:";s:9:"Page id::";}', 0, 0, 'contingut', 'a:3:{s:15:"hook_subscriber";a:1:{s:7:"enabled";b:1;}s:5:"admin";a:1:{s:7:"version";s:3:"1.0";}s:4:"user";a:1:{s:7:"version";s:3:"1.0";}}', '1.3.0', '1.3.99'),
(89, 'IWforms', 2, 'Formularis', 'Creació, gestió i ús de formularis.', 0, 'IWforms', '3.0.2', 0, 'Albert Pérez Monfort', 'aperezm@xtec.cats', 1, 1, 3, 'pndocs/credits.txt', 'pndocs/changelog.txt', 'pndocs/help.txt', 'pndocs/license.txt', 'a:1:{s:9:"IWforms::";s:2:"::";}', 0, 0, 'Formularis', 'a:3:{s:15:"hook_subscriber";a:1:{s:7:"enabled";b:1;}s:5:"admin";a:1:{s:7:"version";s:3:"1.0";}s:4:"user";a:1:{s:7:"version";s:3:"1.0";}}', '', ''),
(93, 'IWmyrole', 2, 'Canvia Rol', 'Permet als usuaris registrats canviar de grup en qualsevol moment', 0, 'IWmyrole', '3.0.0', 0, 'Albert Pérez Monfort & Josep Ferràndiz Farré', 'aperezm@xtec.es & jferran6@xtec.cat', 1, 0, 3, 'pndocs/credits.txt', 'pndocs/changelog.txt', 'pndocs/help.txt', 'pndocs/license.txt', 'a:1:{s:10:"IWmyrole::";s:2:"::";}', 0, 0, 'Canvia Rol', 'a:1:{s:5:"admin";a:1:{s:7:"version";s:3:"1.0";}}', '', ''),
(94, 'IWjclic', 2, 'JClic', 'Assignació d''activitats JClic', 0, 'IWjclic', '3.0.0', 0, 'Albert Pérez Monfort', 'aperezm@xtec.es', 1, 1, 3, 'pndocs/credits.txt', 'pndocs/changelog.txt', 'pndocs/help.txt', 'pndocs/license.txt', 'a:1:{s:9:"IWjclic::";s:2:"::";}', 0, 0, 'JClic', 'a:2:{s:5:"admin";a:1:{s:7:"version";s:3:"1.0";}s:4:"user";a:1:{s:7:"version";s:3:"1.0";}}', '', ''),
(100, 'FAQ', 2, 'FAQ', 'Frequently Asked Questions', 0, 'FAQ', '2.3.3', 1, 'Mark West', 'http://www.markwest.me.uk/', 1, 1, 1, 'pndocs/credits.txt', 'pndocs/changelog.txt', 'pndocs/help.txt', 'pndocs/license.txt', 'a:1:{s:5:"FAQ::";s:8:"FAQ ID::";}', 0, 0, 'faq', 'a:3:{s:15:"hook_subscriber";a:1:{s:7:"enabled";b:1;}s:5:"admin";a:1:{s:7:"version";s:3:"1.0";}s:4:"user";a:1:{s:7:"version";s:3:"1.0";}}', '1.3.0', '1.3.99'),
(104, 'Formicula', 2, 'Formularis de contacte', 'Eina per crear diferents tipus de formularis de contacte', 0, 'Formicula', '3.0.0', 0, 'Frank Schummertz', 'frank@zikula.org', 1, 1, 3, 'pndocs/credits.txt', 'pndocs/changelog.txt', 'pndocs/eng/manual.htm', 'pndocs/license.txt', 'a:1:{s:11:"Formicula::";s:19:"form_id:contact_id:";}', 0, 0, 'formicula', 'a:3:{s:15:"hook_subscriber";a:1:{s:7:"enabled";b:1;}s:5:"admin";a:1:{s:7:"version";s:3:"1.0";}s:4:"user";a:1:{s:7:"version";s:3:"1.0";}}', '1.3.0', ''),
(105, 'EZComments', 2, 'Comentaris', 'Permet adjuntar comentaris a tota mena de continguts', 0, 'EZComments', '3.0.0', 0, 'The EZComments Development Team', 'http://code.zikula.org/ezcomments/', 1, 1, 1, 'pndocs/credits.txt', 'pndocs/changelog.txt', 'pndocs/install.txt', 'pndocs/license.txt', 'a:3:{s:12:"EZComments::";s:25:"Module:Item ID:Comment ID";s:21:"EZComments::trackback";s:15:"Module:Item ID:";s:20:"EZComments::pingback";s:15:"Module:Item ID:";}', 0, 0, 'comentaris', 'a:4:{s:13:"hook_provider";a:1:{s:7:"enabled";b:1;}s:15:"hook_subscriber";a:1:{s:7:"enabled";b:1;}s:5:"admin";a:1:{s:7:"version";s:3:"1.0";}s:4:"user";a:1:{s:7:"version";s:3:"1.0";}}', '1.3.0', ''),
(106, 'Profile', 2, 'Perfils', 'Proporciona un tauler de control del compte personal per a cada usuari/ària registrat, una interfície per administrar els elements d''informació personal i una funcionalitat per a llistes d''usuaris registrats. Treballa estretament amb el mòdul d''usuaris.', 0, 'Profile', '1.6.1', 1, 'Mateo Tibaquirá, Mark West, Franky Chestnut', 'http://nestormateo.com/, http://www.markwest.me.uk/, http://dev.pnconcept.com/', 1, 1, 3, 'pndocs/credits.txt', 'pndocs/changelog.txt', 'pndocs/help.txt', 'pndocs/license.txt', 'a:6:{s:9:"Profile::";s:2:"::";s:13:"Profile::view";s:2:"::";s:13:"Profile::item";s:56:"DynamicUserData PropertyName::DynamicUserData PropertyID";s:16:"Profile:Members:";s:2:"::";s:22:"Profile:Members:recent";s:2:"::";s:22:"Profile:Members:online";s:2:"::";}', 1, 0, 'perfil', 'a:3:{s:7:"profile";a:1:{s:7:"version";s:3:"1.0";}s:5:"admin";a:1:{s:7:"version";s:3:"1.0";}s:4:"user";a:1:{s:7:"version";s:3:"1.0";}}', '1.3.0', '1.3.99'),
(107, 'Weblinks', 2, 'Weblinks', 'Weblinks Module', 0, 'Weblinks', '3.0.0', 0, 'Petzi-Juist', 'http://www.petzi-juist.de/', 1, 1, 1, 'pndocs/credits.txt', 'pndocs/changelog.txt', 'pndocs/install.txt', 'pndocs/license.txt', 'a:2:{s:18:"Weblinks::Category";s:26:"Category name::Category ID";s:14:"Weblinks::Link";s:2:"::";}', 0, 0, 'weblinks', 'a:3:{s:15:"hook_subscriber";a:1:{s:7:"enabled";b:1;}s:5:"admin";a:1:{s:7:"version";s:3:"1.0";}s:4:"user";a:1:{s:7:"version";s:3:"1.0";}}', '1.3.0', '1.3.99'),
(108, 'Files', 2, 'Fitxers del lloc', 'Gestió de fitxers per a llocs Zikula', 0, 'Files', '1.0.2', 0, 'Albert Perez Monfort , Robert Barrera i Fèlix Casanellas', 'aperezm@xtec.cat', 1, 1, 3, 'pndocs/credits.txt', 'pndocs/changelog.txt', 'pndocs/help.txt', 'pndocs/license.txt', 'a:1:{s:7:"Files::";s:2:"::";}', 0, 0, 'fitxers', 'a:2:{s:5:"admin";a:1:{s:7:"version";s:3:"1.0";}s:4:"user";a:1:{s:7:"version";s:3:"1.0";}}', '1.3.0', '1.3.99'),
(111, 'IWmenu', 2, 'IWmenu', 'Provides an interface to manage fully customizable menu.', 0, 'IWmenu', '3.0.2', 0, 'Albert Pérez Monfort, Toni Ginard Lladó & Pau Ferrer Ocaña', 'aperez16@xtec.cat, aginard@xtec.cat & pferre22@xtec.cat', 1, 1, 1, 'pndocs/credits.txt', 'pndocs/changelog.txt', 'pndocs/help.txt', 'pndocs/license.txt', 'a:1:{s:8:"IWmenu::";s:2:"::";}', 0, 0, 'IWmenu', 'a:2:{s:5:"admin";a:1:{s:7:"version";s:3:"1.0";}s:4:"user";a:1:{s:7:"version";s:3:"1.0";}}', '', ''),
(113, 'IWstats', 2, 'Estadístiques', 'Mòdul d''estadístiques.', 0, 'IWstats', '3.0.1', 0, '', '', 1, 0, 3, '', '', '', '', 'a:1:{s:9:"IWstats::";s:2:"::";}', 0, 0, 'IWstats', 'a:1:{s:5:"admin";a:1:{s:7:"version";s:3:"1.0";}}', '', ''),
(114, 'IWdocmanager', 2, 'Documents', 'Mòdul de gestió documental i control de versions.', 0, 'IWdocmanager', '1.0.0', 0, '', '', 0, 0, 3, '', '', '', '', 'a:1:{s:14:"IWdocmanager::";s:2:"::";}', 0, 0, 'documents', 'a:2:{s:5:"admin";a:1:{s:7:"version";s:3:"1.0";}s:4:"user";a:1:{s:7:"version";s:3:"1.0";}}', '1.3.0', '1.3.99'),
(115, 'XtecMailer', 2, 'Mailer XTEC', 'Amplia les funcionalitats del mòdul Mailer per poder enviar correu electrònic utilitzant el servei web de la XTEC', 0, 'XtecMailer', '1.0.0', 0, '', '', 0, 0, 3, '', '', '', '', 'a:1:{s:12:"XtecMailer::";s:2:"::";}', 0, 0, 'XtecMailer', 'a:1:{s:5:"admin";a:1:{s:7:"version";s:3:"1.0";}}', '', ''),
(116, 'IWmoodle', 2, 'IWmoodle', 'Integration of Moodle2 into Zikula.', 0, 'IWmoodle', '3.0.0', 0, '', '', 0, 0, 1, '', '', '', '', 'a:1:{s:10:"IWmoodle::";s:2:"::";}', 0, 0, 'IWmoodle', 'a:2:{s:5:"admin";a:1:{s:7:"version";s:3:"1.0";}s:4:"user";a:1:{s:7:"version";s:3:"1.0";}}', '', ''),
(117, 'Legal', 2, 'Legal info manager', 'Provides an interface for managing the site''s legal documents.', 0, 'Legal', '2.0.1', 0, '', '', 0, 0, 1, '', '', '', '', 'a:8:{s:7:"Legal::";s:2:"::";s:18:"Legal::legalnotice";s:2:"::";s:17:"Legal::termsofuse";s:2:"::";s:20:"Legal::privacypolicy";s:2:"::";s:16:"Legal::agepolicy";s:2:"::";s:29:"Legal::accessibilitystatement";s:2:"::";s:30:"Legal::cancellationrightpolicy";s:2:"::";s:22:"Legal::tradeconditions";s:2:"::";}', 0, 0, 'legalmod', 'a:2:{s:5:"admin";a:1:{s:7:"version";s:3:"1.0";}s:4:"user";a:1:{s:7:"version";s:3:"1.0";}}', '1.3.0', '1.3.99'),
(118, 'Feeds', 2, 'Feeds', 'The Feeds module provides a feed reader to your website.', 0, 'Feeds', '2.6.0', 0, '', '', 0, 0, 1, '', '', '', '', 'a:1:{s:11:"Feeds::Item";s:28:"Feed item name::Feed item ID";}', 0, 0, 'feeds', 'a:2:{s:5:"admin";a:1:{s:7:"version";s:3:"1.0";}s:4:"user";a:1:{s:7:"version";s:3:"1.0";}}', '', ''),
(119, 'IWgroups', 2, 'IWgroups', 'Allow the creation, edition and removing of user groups.', 0, 'IWgroups', '3.0.0', 0, '', '', 0, 0, 1, '', '', '', '', 'a:1:{s:10:"IWgroups::";s:2:"::";}', 0, 0, 'IWgroups', 'a:1:{s:5:"admin";a:1:{s:7:"version";s:3:"1.0";}}', '', '');

-- --------------------------------------------------------

--
-- Estructura de la taula `module_deps`
--

CREATE TABLE IF NOT EXISTS `module_deps` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `modid` int(11) NOT NULL DEFAULT '0',
  `modname` varchar(64) NOT NULL,
  `minversion` varchar(10) NOT NULL,
  `maxversion` varchar(10) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=114 ;

--
-- Bolcant dades de la taula `module_deps`
--

INSERT INTO `module_deps` (`id`, `modid`, `modname`, `minversion`, `maxversion`, `status`) VALUES
(107, 3, 'Scribite', '5.0.0', '', 2),
(108, 81, 'Scribite', '5.0.0', '', 2),
(109, 105, 'Akismet', '2.0', '', 2),
(110, 54, 'IWmain', '3.0.0', '', 1),
(111, 27, 'Scribite', '4.2.1', '', 2),
(112, 27, 'EZComments', '3.0.1', '', 2),
(113, 75, 'Scribite', '4.2.1', '', 2);

-- --------------------------------------------------------

--
-- Estructura de la taula `module_vars`
--

CREATE TABLE IF NOT EXISTS `module_vars` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `modname` varchar(64) NOT NULL,
  `name` varchar(64) NOT NULL,
  `value` longtext,
  PRIMARY KEY (`id`),
  KEY `mod_var` (`modname`,`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=706 ;

--
-- Bolcant dades de la taula `module_vars`
--

INSERT INTO `module_vars` (`id`, `modname`, `name`, `value`) VALUES
(2, 'ZConfig', 'shorturlsdefaultmodule', 's:0:"";'),
(3, 'ZConfig', 'profilemodule', 's:7:"Profile";'),
(4, 'ZConfig', 'messagemodule', 's:0:"";'),
(5, 'ZConfig', 'debug', 's:1:"0";'),
(6, 'ZConfig', 'sitename', 's:18:"Intranet de mostra"'),
(7, 'ZConfig', 'slogan', 's:0:"";'),
(8, 'ZConfig', 'metakeywords', 's:90:"centre educatiu, zikula, educació, intraweb, Àgora, comunitat, portal, programari lliure";'),
(9, 'ZConfig', 'startdate', 's:7:"03/2014";'),
(10, 'ZConfig', 'adminmail', 's:15:"centre@xtec.cat"'),
(11, 'ZConfig', 'Default_Theme', 's:7:"IWxtec2";'),
(12, 'ZConfig', 'anonymous', 's:9:"Anònim/a";'),
(13, 'ZConfig', 'timezone_offset', 's:1:"1";'),
(14, 'ZConfig', 'timezone_server', 's:1:"1";'),
(15, 'ZConfig', 'funtext', 's:1:"1";'),
(16, 'ZConfig', 'reportlevel', 's:1:"0";'),
(17, 'ZConfig', 'startpage', 's:4:"News";'),
(18, 'ZConfig', 'seclevel', 's:4:"High";'),
(19, 'ZConfig', 'secmeddays', 'i:7;'),
(20, 'ZConfig', 'secinactivemins', 'i:40;'),
(21, 'ZConfig', 'Version_Num', 's:5:"1.3.9";'),
(22, 'ZConfig', 'Version_ID', 's:6:"Zikula";'),
(23, 'ZConfig', 'Version_Sub', 's:3:"vai";'),
(24, 'ZConfig', 'debug_sql', 's:1:"0";'),
(25, 'ZConfig', 'language', 's:3:"cat";'),
(26, 'ZConfig', 'locale', 's:5:"ca_ES";'),
(27, 'ZConfig', 'multilingual', 's:1:"0";'),
(28, 'ZConfig', 'useflags', 's:1:"0";'),
(29, 'ZConfig', 'AllowableHTML', 'a:110:{s:3:"!--";i:2;s:1:"a";i:2;s:4:"abbr";i:0;s:7:"acronym";i:1;s:7:"address";i:0;s:6:"applet";i:0;s:4:"area";i:0;s:7:"article";i:0;s:5:"aside";i:0;s:5:"audio";i:2;s:1:"b";i:2;s:4:"base";i:0;s:8:"basefont";i:0;s:3:"bdo";i:0;s:3:"big";i:0;s:10:"blockquote";i:2;s:2:"br";i:2;s:6:"button";i:0;s:6:"canvas";i:0;s:7:"caption";i:0;s:6:"center";i:2;s:4:"cite";i:0;s:4:"code";i:0;s:3:"col";i:0;s:8:"colgroup";i:0;s:7:"command";i:0;s:8:"datalist";i:0;s:2:"dd";i:0;s:3:"del";i:0;s:7:"details";i:0;s:3:"dfn";i:0;s:3:"dir";i:0;s:3:"div";i:2;s:2:"dl";i:0;s:2:"dt";i:0;s:2:"em";i:2;s:5:"embed";i:2;s:8:"fieldset";i:0;s:10:"figcaption";i:0;s:6:"figure";i:0;s:4:"font";i:2;s:6:"footer";i:0;s:4:"form";i:0;s:2:"h1";i:1;s:2:"h2";i:2;s:2:"h3";i:2;s:2:"h4";i:2;s:2:"h5";i:2;s:2:"h6";i:2;s:6:"header";i:0;s:6:"hgroup";i:0;s:2:"hr";i:2;s:1:"i";i:2;s:6:"iframe";i:2;s:3:"img";i:2;s:5:"input";i:0;s:3:"ins";i:0;s:6:"keygen";i:0;s:3:"kbd";i:0;s:5:"label";i:0;s:6:"legend";i:0;s:2:"li";i:2;s:3:"map";i:0;s:4:"mark";i:0;s:4:"menu";i:0;s:7:"marquee";i:0;s:5:"meter";i:0;s:3:"nav";i:0;s:4:"nobr";i:0;s:6:"object";i:2;s:2:"ol";i:2;s:8:"optgroup";i:0;s:6:"option";i:0;s:6:"output";i:0;s:1:"p";i:2;s:5:"param";i:2;s:3:"pre";i:2;s:8:"progress";i:0;s:1:"q";i:0;s:2:"rp";i:0;s:2:"rt";i:0;s:4:"ruby";i:0;s:1:"s";i:0;s:4:"samp";i:0;s:6:"script";i:0;s:7:"section";i:0;s:6:"select";i:0;s:5:"small";i:0;s:6:"source";i:0;s:4:"span";i:2;s:6:"strike";i:0;s:6:"strong";i:2;s:3:"sub";i:1;s:7:"summary";i:0;s:3:"sup";i:1;s:5:"table";i:2;s:5:"tbody";i:2;s:2:"td";i:2;s:8:"textarea";i:0;s:5:"tfoot";i:2;s:2:"th";i:2;s:5:"thead";i:2;s:4:"time";i:0;s:2:"tr";i:2;s:2:"tt";i:2;s:1:"u";i:0;s:2:"ul";i:2;s:3:"var";i:0;s:5:"video";i:2;s:3:"wbr";i:0;}'),
(30, 'ZConfig', 'theme_change', 's:1:"0";'),
(31, 'ZConfig', 'htmlentities', 's:1:"1";'),
(32, 'ZConfig', 'UseCompression', 's:1:"0";'),
(34, 'ZConfig', 'errordisplay', 's:1:"0";'),
(35, 'ZConfig', 'errorlog', 'i:0;'),
(36, 'ZConfig', 'errorlogtype', 'i:0;'),
(37, 'ZConfig', 'errormailto', 's:14:"jo@example.com";'),
(38, 'ZConfig', 'siteoff', 'i:0;'),
(39, 'ZConfig', 'siteoffreason', 's:44:"S''estan duent a terme tasques de manteniment";'),
(40, 'ZConfig', 'starttype', 's:4:"user";'),
(41, 'ZConfig', 'startfunc', 's:4:"view";'),
(42, 'ZConfig', 'startargs', 's:16:"displayonindex=1";'),
(43, 'ZConfig', 'entrypoint', 's:9:"index.php";'),
(44, 'ZConfig', 'secure_domain', 's:0:"";'),
(45, 'ZConfig', 'language_detect', 's:1:"0";'),
(46, 'ZConfig', 'shorturls', 'b:0;'),
(47, 'ZConfig', 'shorturlstype', 's:1:"0";'),
(49, 'ZConfig', 'shorturlsseparator', 's:1:"-";'),
(50, 'ZConfig', 'shorturlsstripentrypoint', 'b:0;'),
(51, 'ZConfig', 'signcookies', 'i:1;'),
(52, 'ZConfig', 'signingkey', 's:40:"4a895379c6b5a27f4eb949aa0844b8710ff609a3";'),
(53, 'ZConfig', 'sessionipcheck', 'i:0;'),
(54, 'ZConfig', 'keyexpiry', 'i:0;'),
(55, 'ZConfig', 'gc_probability', 'i:100;'),
(56, 'ZConfig', 'anonymoussessions', 'i:1;'),
(57, 'ZConfig', 'sessionstoretofile', 'i:0;'),
(58, 'ZConfig', 'sessionsavepath', 's:0:"";'),
(59, 'ZConfig', 'sessionauthkeyua', 'i:0;'),
(60, 'ZConfig', 'sessionname', 's:8:"Intraweb";'),
(61, 'ZConfig', 'sessionregenerate', 'i:1;'),
(62, 'ZConfig', 'sessionrandregenerate', 'i:1;'),
(63, 'ZConfig', 'sessionregeneratefreq', 'i:10;'),
(64, 'ZConfig', 'enableanticracker', 's:1:"1";'),
(65, 'ZConfig', 'emailhackattempt', 's:1:"1";'),
(66, 'ZConfig', 'updatelastchecked', 'i:1424277023;'),
(67, 'ZConfig', 'loghackattempttodb', 's:1:"1";'),
(68, 'ZConfig', 'updatefrequency', 'i:7;'),
(69, 'ZConfig', 'onlysendsummarybyemail', 's:1:"1";'),
(70, 'ZConfig', 'updateversion', 's:5:"1.3.8";'),
(71, 'ZConfig', 'usehtaccessbans', 'i:1;'),
(72, 'ZConfig', 'updatecheck', 'i:1;'),
(73, 'ZConfig', 'filtergetvars', 's:1:"1";'),
(74, 'ZConfig', 'language_i18n', 's:2:"ca";'),
(75, 'ZConfig', 'filtercookievars', 's:1:"1";'),
(77, 'ZConfig', 'filterpostvars', 's:1:"1";'),
(78, 'ZConfig', 'languageurl', 's:1:"0";'),
(79, 'ZConfig', 'filterarrays', 'i:0;'),
(80, 'ZConfig', 'ajaxtimeout', 'i:5000;'),
(81, 'ZConfig', 'extrapostprotection', 'i:0;'),
(82, 'ZConfig', 'permasearch', 's:161:"À,Á,Â,Ã,Å,à,á,â,ã,å,Ò,Ó,Ô,Õ,Ø,ò,ó,ô,õ,ø,È,É,Ê,Ë,è,é,ê,ë,Ç,ç,Ì,Í,Î,Ï,ì,í,î,ï,Ù,Ú,Û,ù,ú,û,ÿ,Ñ,ñ,ß,ä,Ä,ö,Ö,ü,Ü";'),
(83, 'ZConfig', 'extragetprotection', 'i:0;'),
(84, 'ZConfig', 'permareplace', 's:114:"A,A,A,A,A,a,a,a,a,a,O,O,O,O,O,o,o,o,o,o,E,E,E,E,e,e,e,e,C,c,I,I,I,I,i,i,i,i,U,U,U,u,u,u,y,N,n,ss,ae,Ae,oe,Oe,ue,Ue";'),
(85, 'ZConfig', 'checkmultipost', 'i:1;'),
(86, 'ZConfig', 'maxmultipost', 'i:4;'),
(87, 'ZConfig', 'zipcompress', 'i:0;'),
(88, 'ZConfig', 'compresslevel', 'i:9;'),
(89, 'ZConfig', 'cpuloadmonitor', 'i:0;'),
(90, 'ZConfig', 'cpumaxload', 'd:10;'),
(91, 'ZConfig', 'ccisessionpath', 's:0:"";'),
(92, 'ZConfig', 'htaccessfilelocation', 's:9:".htaccess";'),
(93, 'ZConfig', 'nocookiebanthreshold', 'i:10;'),
(94, 'ZConfig', 'nocookiewarningthreshold', 'i:2;'),
(95, 'ZConfig', 'fastaccessbanthreshold', 'i:40;'),
(96, 'ZConfig', 'fastaccesswarnthreshold', 'i:10;'),
(97, 'ZConfig', 'javababble', 'i:0;'),
(98, 'ZConfig', 'javaencrypt', 'i:0;'),
(99, 'ZConfig', 'preservehead', 'i:0;'),
(100, 'ZConfig', 'outputfilter', 's:1:"1";'),
(101, 'ZConfig', 'summarycontent', 's:1179:"Attention site admin of %sitename%.\r\n\r\nOn %date% at %time% the Zikula code has detected that somebody tried to send information to your site that may have been intended as a hack. Do not panic, it may be harmless: maybe this detection was triggered by something you did! Anyway, it was detected and blocked. \r\n\r\nThe suspicious activity was recognized in %filename% on line %linenumber%, and is of the type %type%. \r\n\r\nAdditional information given by the code which detected this: %additionalinfo%.\r\n\r\nBelow you will find a lot of information obtained about this attempt, that may help you to find  what happened and maybe who did it.\r\n\r\n\r\n=====================================\r\nInformation about this user:\r\n=====================================\r\nZikula username:  %username%\r\nRegistered email of this Zikula user: %useremail%\r\nRegistered real name of this Zikula user: %userrealname%\r\nIP numbers: (note: when you are dealing with a real cracker these IP numbers might not be from the actual computer he is working on)\r\n\r\nIP according to HTTP_CLIENT_IP: %httpclientip%\r\nIP according to REMOTE_ADDR: %remoteaddr%\r\nIP according to GetHostByName($REMOTE_ADDR): %gethostbyremoteaddr%";'),
(102, 'ZConfig', 'fullcontent', 's:1363:"=====================================\r\nInformation in the $_REQUEST array\r\n=====================================\r\n%requestarray%\r\n\r\n=====================================\r\nInformation in the $_GET array\r\nThis is about variables that may have been in the URL string or in a ''GET'' type form.\r\n=====================================\r\n%getarray%\r\n\r\n=====================================\r\nInformation in the $_POST array\r\nThis is about visible and invisible form elements.\r\n=====================================\r\n%postarray%\r\n\r\n=====================================\r\nBrowser information\r\n=====================================\r\n%browserinfo%\r\n\r\n=====================================\r\nInformation in the $_SERVER array\r\n=====================================\r\n%serverarray%\r\n\r\n=====================================\r\nInformation in the $_ENV array\r\n=====================================\r\n%envarray%\r\n\r\n=====================================\r\nInformation in the $_COOKIE array\r\n=====================================\r\n%cookiearray%\r\n\r\n=====================================\r\nInformation in the $_FILES array\r\n=====================================\r\n%filearray%\r\n\r\n=====================================\r\nInformation in the $_SESSION array\r\nThis is session info. The variables\r\nstarting with PNSV are Zikula Session Variables.\r\n=====================================\r\n%sessionarray%";'),
(103, 'ZConfig', 'log_last_rotate', 'i:1318343775;'),
(104, 'ZConfig', 'nocookiewarnthreshold', 'i:2;'),
(105, 'Admin', 'displaynametype', 's:1:"1";'),
(106, 'Admin', 'modulesperrow', 's:1:"3";'),
(107, 'Admin', 'itemsperpage', 's:2:"15";'),
(108, 'Admin', 'defaultcategory', 's:1:"4";'),
(109, 'Admin', 'modulestylesheet', 's:11:"navtabs.css";'),
(110, 'Admin', 'admingraphic', 's:1:"1";'),
(111, 'Admin', 'startcategory', 's:1:"1";'),
(112, 'Admin', 'ignoreinstallercheck', 'b:0;'),
(113, 'Admin', 'admintheme', 's:0:"";'),
(114, 'Admin', 'moduledescription', 'i:1;'),
(115, 'Blocks', 'collapseable', 'i:0;'),
(116, 'Categories', 'permissionsall', 'i:0;'),
(117, 'Categories', 'userrootcat', 's:17:"/__SYSTEM__/Users";'),
(118, 'Categories', 'allowusercatedit', 'i:0;'),
(119, 'Categories', 'autocreateusercat', 'i:0;'),
(120, 'Categories', 'autocreateuserdefaultcat', 'i:0;'),
(121, 'Categories', 'userdefaultcatname', 's:6:"Global";'),
(122, 'Content', 'shorturlsuffix', 's:5:".html";'),
(172, 'Files', 'usersFolder', 's:5:"users";'),
(173, 'Files', 'showHideFiles', 's:1:"0";'),
(174, 'Files', 'allowedExtensions', 's:63:"odt,ods,odp,zip,pdf,doc,xls,ppt,pps,jpg,gif,txt,png,xml,htm,css";'),
(175, 'Files', 'defaultQuota', 's:1:"1";'),
(176, 'Files', 'groupsQuota', 's:55:"a:1:{i:0;a:2:{s:3:"gid";s:1:"2";s:5:"quota";s:2:"-1";}}";'),
(177, 'Files', 'filesMaxSize', 's:8:"10000000";'),
(178, 'Files', 'maxWidth', 's:3:"250";'),
(179, 'Files', 'maxHeight', 's:3:"250";'),
(180, 'Files', 'editableExtensions', 's:32:"php,htm,html,htaccess,css,js,tpl";'),
(181, 'Formicula', 'show_phone', 'b:0;'),
(182, 'Formicula', 'show_company', 'b:0;'),
(183, 'Formicula', 'show_url', 'b:0;'),
(184, 'Formicula', 'show_location', 'b:0;'),
(185, 'Formicula', 'show_comment', 'b:0;'),
(186, 'Formicula', 'send_user', 'b:1;'),
(187, 'Formicula', 'spamcheck', 'b:1;'),
(188, 'Formicula', 'upload_dir', 'N;'),
(189, 'Formicula', 'delete_file', 'b:1;'),
(190, 'Formicula', 'default_form', 's:1:"0";'),
(191, 'Formicula', 'excludespamcheck', 's:0:"";'),
(192, 'Groups', 'itemsperpage', 'i:25;'),
(193, 'Groups', 'defaultgroup', 's:1:"1";'),
(194, 'Groups', 'mailwarning', 'i:0;'),
(195, 'Groups', 'hideclosed', 'i:0;'),
(196, 'IWagendas', 'allowGCalendar', 's:1:"0";'),
(197, 'IWagendas', 'llegenda', 's:1:"1";'),
(198, 'IWagendas', 'inicicurs', 's:4:"2013";'),
(199, 'IWagendas', 'calendariescolar', 's:1:"1";'),
(200, 'IWagendas', 'comentaris', 's:0:"";'),
(201, 'IWagendas', 'festiussempre', 's:239:"$$0101|Cap d''any$$0601|Reis$$0105|Festa del treball$$2406|Sant Joan$$1508|Mare de Déu d''Agost$$1109|Diada de Catalunya$$1210|El Pilar$$0111|Tots Sants$$0612|Dia de la Constitució$$0812|Immaculada Concepció$$2512|Nadal$$2612|Sant Esteve$";'),
(202, 'IWagendas', 'altresfestius', 's:62:"$$06042012|Divendres Sant$$09042012|Dilluns de Pasqua Florida$";'),
(203, 'IWagendas', 'informacions', 's:1:"$";'),
(204, 'IWagendas', 'periodes', 's:393:"$$0109201111092011|Preparació del curs#99CC00$$1209201105122011|Primer trimestre#99CC99$$0612201122122011|Segon trimestre#99CCFF$$2312201108012012|Vacances de Nadal#993366$$0901201211032012|Segon trimestre#99CCFF$$1203201201042012|Tercer trimestre#FF9966$$0204201209042012|Vacances de Setmana Santa#993366$$1004201222062012|Tercer trimestre#FF9966$$2306201230062012|Tancament del curs#66FFCC$";'),
(205, 'IWagendas', 'infos', 's:1:"1";'),
(206, 'IWagendas', 'vista', 'i:-1;'),
(207, 'IWagendas', 'colors', 's:112:"DBD4A6|555555|FFCC66|FFFFFF|E1EBFF|669ACC|FFFFFF|FFFFFF|FF8484|FFFFFF|DBD4A6|66FF66|3F6F3E|FFFFCC|BBBBBB|000000|";'),
(208, 'IWagendas', 'maxnotes', 's:3:"300";'),
(209, 'IWagendas', 'adjuntspersonals', 'N;'),
(210, 'IWagendas', 'caducadies', 's:2:"30";'),
(211, 'IWagendas', 'urladjunts', 's:7:"agendes";'),
(212, 'IWagendas', 'msgUsersRespDefault', 's:130:"Has estat donat d''alta com a responsable a una agenda nova. Podràs accedir a aquesta agenda des del menú.<br><br>L''administrador";'),
(213, 'IWagendas', 'msgUsersDefault', 's:112:"Has estat donat d''alta a una agenda nova. Podràs accedir a aquesta agenda des del menú.<br><br>L''administrador";'),
(214, 'IWbookings', 'weekends', 'N;'),
(215, 'IWbookings', 'NTPtime', 'N;'),
(216, 'IWbookings', 'group', 's:1:"4";'),
(217, 'IWbookings', 'weeks', 's:1:"2";'),
(218, 'IWbookings', 'month_panel', 'N;'),
(219, 'IWbookings', 'eraseold', 's:1:"1";'),
(220, 'IWbookings', 'showcolors', 's:1:"1";'),
(221, 'IWbooks', 'nivells', 's:0:"";'),
(222, 'IWbooks', 'itemsperpage', 's:2:"10";'),
(223, 'IWbooks', 'fpdf', 's:24:"modules/IWbooks/fpdf153/";'),
(224, 'IWbooks', 'any', 's:4:"2013";'),
(225, 'IWbooks', 'encap', 's:17:"llibres/encap.jpg";'),
(226, 'IWbooks', 'plans', 's:182:"ESO#Educació Secundària Obligatòria|\r\nBTE#Batxillerat Tecnològic|\r\nBSO#Batxillerat Social|\r\nBHU#Batxillerat Humanístic|\r\nBCI#Batxillerat Científic|\r\nBAR#Batxillerat Artístic\r\n";'),
(227, 'IWbooks', 'llistar_materials', 's:1:"1";'),
(228, 'IWbooks', 'mida_font', 's:2:"11";'),
(229, 'IWbooks', 'marca_aigua', 'i:0;'),
(230, 'IWforms', 'publicFolder', 's:18:"formularis/public/";'),
(231, 'IWforms', 'characters', 's:2:"15";'),
(232, 'IWforms', 'resumeview', 's:1:"0";'),
(233, 'IWforms', 'newsColor', 's:7:"#EFFFEF";'),
(234, 'IWforms', 'viewedColor', 's:7:"#FFFFFF";'),
(235, 'IWforms', 'completedColor', 's:7:"#EFEFEF";'),
(236, 'IWforms', 'validatedColor', 's:7:"#FFDFDF";'),
(237, 'IWforms', 'fieldsColor', 's:7:"#E7F3FF";'),
(238, 'IWforms', 'contentColor', 's:7:"#FFEADF";'),
(239, 'IWforms', 'attached', 's:10:"formularis";'),
(240, 'IWforums', 'urladjunts', 's:6:"forums";'),
(241, 'IWforums', 'avatarsVisible', 's:1:"1";'),
(242, 'IWjclic', 'timeLap', 's:1:"5";'),
(243, 'IWjclic', 'jclicJarBase', 's:31:"http://clic.xtec.cat/dist/jclic";'),
(244, 'IWjclic', 'jclicUpdatedFiles', 's:5:"jclic";'),
(245, 'IWjclic', 'groupsProAssign', 's:4:"$$3$";'),
(246, 'IWmain', 'publicFolder', 's:6:"public";'),
(247, 'IWmain', 'cronHeaderText', 's:70:"Aquest missatge ha estat enviar de forma automàtica amb les novetats.";'),
(248, 'IWmain', 'cronFooterText', 's:28:"Si us plau no el responguis.";'),
(249, 'IWmain', 'showHideFiles', 's:1:"0";'),
(250, 'IWmain', 'allowUserChangeAvatar', 's:1:"1";'),
(251, 'IWmain', 'avatarChangeValidationNeeded', 's:1:"1";'),
(252, 'IWmain', 'URLBase', 's:30:"http://agora-vm/usu1/intranet/";'),
(253, 'IWmain', 'friendsLabel', 's:5:"Amics";'),
(254, 'IWmain', 'friendsSystemAvailable', 'i:1;'),
(255, 'IWmain', 'url', 's:22:"http://agora.xtec.cat/";'),
(256, 'IWmain', 'email', 's:17:"intraweb@xtec.cat";'),
(257, 'IWmain', 'documentRoot', 's:31:"/srv/www/agora/zkdata/usu1/data";'),
(258, 'IWmain', 'extensions', 's:39:"odt|ods|odp|zip|pdf|doc|jpg|gif|txt|png";'),
(259, 'IWmain', 'maxsize', 's:7:"1000000";'),
(260, 'IWmain', 'usersvarslife', 's:2:"60";'),
(261, 'IWmain', 'usersPictureFolder', 's:5:"fotos";'),
(262, 'IWmain', 'tempFolder', 's:4:"temp";'),
(263, 'IWmessages', 'groupsCanUpdate', 's:1:"$";'),
(264, 'IWmessages', 'uploadFolder', 's:9:"missatges";'),
(265, 'IWmessages', 'multiMail', 's:10:"$$2|0-0|0$";'),
(266, 'IWmessages', 'limitInBox', 's:2:"50";'),
(267, 'IWmessages', 'limitOutBox', 's:2:"50";'),
(268, 'IWmoodle', 'moodleurl', 's:9:"../moodle";'),
(269, 'IWmoodle', 'newwindow', 'i:0;'),
(270, 'IWmoodle', 'guestuser', 's:5:"guest";'),
(271, 'IWmoodle', 'dbprefix', 's:2:"m2";'),
(272, 'IWmoodle', 'dfl_description', 's:16:"User description";'),
(273, 'IWmoodle', 'dfl_language', 's:2:"ca";'),
(274, 'IWmoodle', 'dfl_country', 's:2:"ES";'),
(275, 'IWmoodle', 'dfl_city', 's:9:"City name";'),
(276, 'IWmoodle', 'dfl_gtm', 's:2:"99";'),
(277, 'IWmyrole', 'rolegroup', 's:1:"9";'),
(278, 'IWnoteboard', 'editPrintAfter', 's:2:"30";'),
(279, 'IWnoteboard', 'quiverifica', 's:1:"8";'),
(280, 'IWnoteboard', 'sharedName', 'N;'),
(281, 'IWnoteboard', 'grups', 's:16:"$$0$2$3$5$8$4$1$";'),
(282, 'IWnoteboard', 'permisos', 's:38:"$$0-1$2-7$3-3$5-7$8-6$6-3$7-5$4-5$1-1$";'),
(283, 'IWnoteboard', 'marcat', 's:6:"$$4$1$";'),
(284, 'IWnoteboard', 'verifica', 's:9:"$$$3$6$1$";'),
(285, 'IWnoteboard', 'caducitat', 's:2:"30";'),
(286, 'IWnoteboard', 'repperdefecte', 's:1:"1";'),
(287, 'IWnoteboard', 'colorrow1', 's:7:"#FFFFFF";'),
(288, 'IWnoteboard', 'colorrow2', 's:7:"#FFFFDF";'),
(289, 'IWnoteboard', 'colornewrow1', 's:7:"#FFEFD9";'),
(290, 'IWnoteboard', 'colornewrow2', 's:7:"#E7F3FF";'),
(291, 'IWnoteboard', 'attached', 's:6:"tauler";'),
(292, 'IWnoteboard', 'notRegisteredSeeRedactors', 's:1:"1";'),
(293, 'IWnoteboard', 'multiLanguage', 'N;'),
(294, 'IWnoteboard', 'public', 'N;'),
(295, 'IWnoteboard', 'topicsSystem', 'N;'),
(296, 'IWnoteboard', 'publicSharedURL', 's:32:"d63a850d2b927f8c8e9e04a0d6003e40";'),
(297, 'IWnoteboard', 'showSharedURL', 'N;'),
(298, 'IWqv', 'skins', 's:23:"default,infantil,formal";'),
(299, 'IWqv', 'langs', 's:8:"ca,es,en";'),
(300, 'IWqv', 'maxdelivers', 's:15:"-1,1,2,3,4,5,10";'),
(301, 'IWqv', 'basedisturl', 's:41:"http://clic.xtec.cat/qv_viewer/dist/html/";'),
(302, 'IWTimeFrames', 'frames', 's:2:"10";'),
(303, 'IWusers', 'friendsSystemAvailable', 'i:0;'),
(304, 'IWusers', 'invisibleGroupsInList', 's:10:"$$2$$9$$1$";'),
(305, 'IWvhmenu', 'LowBgColor', 's:7:"#efedde";'),
(306, 'IWvhmenu', 'LowSubBgColor', 's:7:"#efedde";'),
(307, 'IWvhmenu', 'HighBgColor', 's:7:"#b3cadb";'),
(308, 'IWvhmenu', 'HighSubBgColor', 's:7:"#b3cadb";'),
(309, 'IWvhmenu', 'FontLowColor', 's:7:"#000000";'),
(310, 'IWvhmenu', 'FontSubLowColor', 's:7:"#000000";'),
(311, 'IWvhmenu', 'FontHighColor', 's:7:"#000000";'),
(312, 'IWvhmenu', 'FontSubHighColor', 's:7:"#000000";'),
(313, 'IWvhmenu', 'BorderColor', 's:7:"#ffffff";'),
(314, 'IWvhmenu', 'BorderSubColor', 's:7:"#ffffff";'),
(315, 'IWvhmenu', 'BorderWidth', 's:1:"1";'),
(316, 'IWvhmenu', 'BorderBtwnElmnts', 'i:1;'),
(317, 'IWvhmenu', 'FontFamily', 's:45:"Tahoma, Verdana, Arial, Helvetica, sans-serif";'),
(318, 'IWvhmenu', 'FontSize', 's:1:"9";'),
(319, 'IWvhmenu', 'FontBold', 'i:0;'),
(320, 'IWvhmenu', 'FontItalic', 'i:0;'),
(321, 'IWvhmenu', 'MenuTextCentered', 's:6:"center";'),
(322, 'IWvhmenu', 'MenuCentered', 's:4:"left";'),
(323, 'IWvhmenu', 'MenuVerticalCentered', 's:3:"top";'),
(324, 'IWvhmenu', 'ChildOverlap', 's:3:"0.1";'),
(325, 'IWvhmenu', 'ChildVerticalOverlap', 's:3:"0.1";'),
(326, 'IWvhmenu', 'StartTop', 's:3:"130";'),
(327, 'IWvhmenu', 'StartLeft', 's:2:"10";'),
(328, 'IWvhmenu', 'VerCorrect', 'i:0;'),
(329, 'IWvhmenu', 'HorCorrect', 'i:0;'),
(330, 'IWvhmenu', 'LeftPaddng', 's:1:"3";'),
(331, 'IWvhmenu', 'TopPaddng', 's:1:"0";'),
(332, 'IWvhmenu', 'FirstLineHorizontal', 's:1:"1";'),
(333, 'IWvhmenu', 'MenuFramesVertical', 'i:1;'),
(334, 'IWvhmenu', 'DissapearDelay', 's:4:"1000";'),
(335, 'IWvhmenu', 'TakeOverBgColor', 'i:1;'),
(336, 'IWvhmenu', 'FirstLineFrame', 's:5:"navig";'),
(337, 'IWvhmenu', 'SecLineFrame', 's:5:"space";'),
(338, 'IWvhmenu', 'DocTargetFrame', 's:5:"space";'),
(339, 'IWvhmenu', 'TargetLoc', 's:0:"";'),
(340, 'IWvhmenu', 'HideTop', 'i:0;'),
(341, 'IWvhmenu', 'MenuWrap', 'i:1;'),
(342, 'IWvhmenu', 'RightToLeft', 'i:0;'),
(343, 'IWvhmenu', 'UnfoldsOnClick', 'i:0;'),
(344, 'IWvhmenu', 'WebMasterCheck', 'i:0;'),
(345, 'IWvhmenu', 'ShowArrow', 'i:1;'),
(346, 'IWvhmenu', 'KeepHilite', 'i:1;'),
(347, 'IWvhmenu', 'height', 's:2:"24";'),
(348, 'IWvhmenu', 'width', 's:3:"150";'),
(349, 'IWvhmenu', 'imagedir', 's:4:"menu";'),
(350, 'IWwebbox', 'url', 's:22:"http://agora.xtec.cat/";'),
(351, 'IWwebbox', 'width', 's:3:"100";'),
(352, 'IWwebbox', 'height', 's:3:"800";'),
(353, 'IWwebbox', 'scrolls', 's:2:"on";'),
(354, 'IWwebbox', 'widthunit', 's:1:"%";'),
(358, 'Mailer', 'mailertype', 'i:4;'),
(359, 'Mailer', 'charset', 's:5:"utf-8";'),
(360, 'Mailer', 'encoding', 's:4:"8bit";'),
(361, 'Mailer', 'html', 'b:0;'),
(362, 'Mailer', 'wordwrap', 'i:50;'),
(363, 'Mailer', 'msmailheaders', 'b:0;'),
(364, 'Mailer', 'sendmailpath', 's:18:"/usr/sbin/sendmail";'),
(365, 'Mailer', 'smtpauth', 'b:1;'),
(366, 'Mailer', 'smtpserver', 's:20:"ssl://smtp.gmail.com";'),
(367, 'Mailer', 'smtpport', 'i:465;'),
(368, 'Mailer', 'smtptimeout', 'i:10;'),
(369, 'Mailer', 'smtpusername', 's:17:"a8xxxxxx@xtec.cat";'),
(370, 'Mailer', 'smtppassword', 's:0:"";'),
(371, 'Extensions', 'itemsperpage', 'i:25;'),
(372, 'News', 'storyhome', 'i:10;'),
(373, 'News', 'storyorder', 'i:0;'),
(374, 'News', 'itemsperpage', 's:2:"25";'),
(375, 'News', 'permalinkformat', 's:38:"%year%/%monthnum%/%day%/%articletitle%";'),
(376, 'News', 'enablecategorization', 'b:1;'),
(377, 'News', 'refereronprint', 's:1:"0";'),
(378, 'News', 'enableattribution', 'b:0;'),
(379, 'News', 'catimagepath', 'b:0;'),
(380, 'News', 'enableajaxedit', 'b:1;'),
(381, 'News', 'enablemorearticlesincat', 'b:0;'),
(382, 'News', 'morearticlesincat', 's:1:"0";'),
(383, 'News', 'notifyonpending', 'b:0;'),
(384, 'News', 'notifyonpending_fromname', 's:0:"";'),
(385, 'News', 'notifyonpending_fromaddress', 's:0:"";'),
(386, 'News', 'notifyonpending_toname', 's:0:"";'),
(387, 'News', 'notifyonpending_toaddress', 's:0:"";'),
(388, 'News', 'notifyonpending_subject', 's:54:"A News Publisher article has been submitted for review";'),
(389, 'News', 'notifyonpending_html', 's:1:"1";'),
(390, 'News', 'pdflink', 'b:0;'),
(393, 'News', 'pdflink_headerlogo', 's:14:"tcpdf_logo.jpg";'),
(394, 'News', 'pdflink_headerlogo_width', 's:2:"30";'),
(395, 'Pages', 'itemsperpage', 'i:25;'),
(396, 'Pages', 'enablecategorization', 'b:1;'),
(397, 'Pages', 'addcategorytitletopermalink', 'b:1;'),
(398, 'Pages', 'showpermalinkinput', 's:1:"1";'),
(399, 'Permissions', 'filter', 'i:1;'),
(400, 'Permissions', 'warnbar', 'i:1;'),
(401, 'Permissions', 'rowview', 'i:20;'),
(402, 'Permissions', 'rowedit', 'i:20;'),
(403, 'Permissions', 'lockadmin', 'i:1;'),
(404, 'Permissions', 'adminid', 'i:1;'),
(410, 'Profile', 'memberslistitemsperpage', 'i:20;'),
(411, 'Profile', 'onlinemembersitemsperpage', 'i:20;'),
(412, 'Profile', 'recentmembersitemsperpage', 'i:10;'),
(413, 'Profile', 'filterunverified', 'i:1;'),
(416, 'Quotes', 'itemsperpage', 'i:25;'),
(417, 'Quotes', 'catmapcount', 'i:3;'),
(418, 'Quotes', 'enablecategorization', 'b:1;'),
(419, 'Scribite', 'yui_type', 's:6:"Simple";'),
(420, 'Scribite', 'yui_width', 's:4:"auto";'),
(421, 'Scribite', 'yui_height', 's:3:"300";'),
(422, 'Scribite', 'yui_dombar', 'b:1;'),
(423, 'Scribite', 'yui_animate', 'b:1;'),
(424, 'Scribite', 'yui_collapse', 'b:1;'),
(425, 'Scribite', 'xinha_activeplugins', 's:22:"a:1:{i:0;s:5:"Files";}";'),
(426, 'Scribite', 'editors_path', 's:25:"modules/Scribite/includes";'),
(427, 'Scribite', 'xinha_language', 's:2:"es";'),
(428, 'Scribite', 'xinha_skin', 's:9:"blue-look";'),
(429, 'Scribite', 'xinha_barmode', 's:4:"full";'),
(430, 'Scribite', 'xinha_width', 's:4:"auto";'),
(431, 'Scribite', 'xinha_height', 's:4:"auto";'),
(432, 'Scribite', 'xinha_style', 's:39:"modules/Scribite/style/xinha/editor.css";'),
(433, 'Scribite', 'xinha_statusbar', 's:1:"1";'),
(434, 'Scribite', 'xinha_converturls', 's:1:"0";'),
(435, 'Scribite', 'xinha_showloading', 's:1:"1";'),
(436, 'Scribite', 'tinymce_language', 's:2:"en";'),
(437, 'Scribite', 'tinymce_style', 's:45:"modules/scribite/pnconfig/tiny_mce/editor.css";'),
(438, 'Scribite', 'tinymce_theme', 's:6:"simple";'),
(439, 'Scribite', 'tinymce_width', 's:3:"75%";'),
(440, 'Scribite', 'tinymce_height', 's:3:"400";'),
(441, 'Scribite', 'tinymce_dateformat', 's:8:"%Y-%m-%d";'),
(442, 'Scribite', 'tinymce_timeformat', 's:8:"%H:%M:%S";'),
(443, 'Scribite', 'tinymce_ask', 'i:0;'),
(444, 'Scribite', 'tinymce_mcpuk', 'i:0;'),
(445, 'Scribite', 'tinymce_activeplugins', 's:0:"";'),
(449, 'Scribite', 'fckeditor_height', 's:3:"400";'),
(451, 'Scribite', 'openwysiwyg_barmode', 's:4:"full";'),
(452, 'Scribite', 'openwysiwyg_width', 's:3:"400";'),
(453, 'Scribite', 'openwysiwyg_height', 's:3:"300";'),
(454, 'Scribite', 'nicedit_fullpanel', 'i:0;'),
(455, 'Scribite', 'DefaultEditor', 's:7:"TinyMce"'),
(456, 'Search', 'itemsperpage', 'i:10;'),
(457, 'Search', 'limitsummary', 'i:255;'),
(458, 'SecurityCenter', 'itemsperpage', 's:2:"10";'),
(459, 'Theme', 'modulesnocache', 's:0:"";'),
(460, 'Theme', 'enablecache', 'b:0;'),
(461, 'Theme', 'compile_check', 'b:1;'),
(462, 'Theme', 'cache_lifetime', 'i:3600;'),
(463, 'Theme', 'force_compile', 'b:0;'),
(464, 'Theme', 'trimwhitespace', 'b:0;'),
(465, 'Theme', 'makelinks', 'b:0;'),
(466, 'Theme', 'maxsizeforlinks', 'i:30;'),
(467, 'Theme', 'itemsperpage', 'i:25;'),
(468, 'Theme', 'cssjscombine', 'b:0;'),
(469, 'Theme', 'cssjscompress', 'b:0;'),
(470, 'Theme', 'cssjsminify', 'b:0;'),
(471, 'Theme', 'cssjscombine_lifetime', 'i:3600;'),
(472, 'Users', 'itemsperpage', 's:2:"25";'),
(473, 'Users', 'reg_allowreg', 's:1:"0";'),
(474, 'Users', 'reg_verifyemail', 'i:2;'),
(475, 'Users', 'reg_Illegalusername', 's:97:"root, adm, linux, webmaster, admin, god, administrator, administrador, nobody, anonymous, anonimo";'),
(476, 'Users', 'reg_Illegaldomains', 's:0:"";'),
(477, 'Users', 'reg_Illegaluseragents', 's:0:"";'),
(478, 'Users', 'reg_noregreasons', 's:43:"El registre d''usuaris nous està desactivat";'),
(479, 'Users', 'reg_uniemail', 's:1:"1";'),
(480, 'Users', 'reg_notifyemail', 's:0:"";'),
(482, 'Users', 'userimg', 's:11:"images/menu";'),
(484, 'Users', 'minpass', 's:1:"5";'),
(485, 'Users', 'anonymous', 's:9:"Anònim/a";'),
(487, 'Users', 'loginviaoption', 's:1:"0";'),
(488, 'Users', 'moderation', 's:1:"0";'),
(489, 'Users', 'hash_method', 's:3:"md5";'),
(490, 'Users', 'login_redirect', 's:1:"1";'),
(491, 'Users', 'reg_question', 's:0:"";'),
(492, 'Users', 'reg_answer', 's:0:"";'),
(494, 'Users', 'accountdisplaygraphics', 'i:1;'),
(495, 'Users', 'accountitemsperpage', 'i:25;'),
(496, 'Users', 'accountitemsperrow', 'i:5;'),
(498, 'Users', 'changeemail', 'i:1;'),
(499, 'Users', 'avatarpath', 's:13:"images/avatar";'),
(501, '/Plugin', 'systemplugin.simplepie', 'a:2:{s:5:"state";i:1;s:7:"version";s:5:"1.2.1";}'),
(502, 'IWdocmanager', 'documentsFolder', 's:12:"descarregues";'),
(503, 'IWdocmanager', 'notifyMail', 's:0:"";'),
(504, 'IWdocmanager', 'editTime', 's:2:"30";'),
(505, 'IWdocmanager', 'deleteTime', 's:2:"20";'),
(506, 'XtecMailer', 'enabled', 'i:1;'),
(507, 'XtecMailer', 'idApp', 's:5:"AGORA";'),
(508, 'XtecMailer', 'replyAddress', 's:15:"centre@xtec.cat"'),
(509, 'XtecMailer', 'sender', 's:8:"educacio";'),
(510, 'XtecMailer', 'environment', 's:3:"PRO";'),
(511, 'XtecMailer', 'contenttype', 'i:2;'),
(512, 'XtecMailer', 'log', 'i:0;'),
(513, 'XtecMailer', 'debug', 'i:0;'),
(514, 'XtecMailer', 'logpath', 's:0:"";'),
(515, '/EventHandlers', 'XtecMailer', 'a:1:{i:0;a:3:{s:9:"eventname";s:29:"module.mailer.api.sendmessage";s:8:"callable";a:2:{i:0;s:20:"XtecMailer_Listeners";i:1;s:8:"sendMail";}s:6:"weight";i:10;}}'),
(516, 'Categories', 'EntityCategorySubclasses', 'a:0:{}'),
(517, '/EventHandlers', 'Extensions', 'a:2:{i:0;a:3:{s:9:"eventname";s:27:"controller.method_not_found";s:8:"callable";a:2:{i:0;s:17:"Extensions_HookUI";i:1;s:5:"hooks";}s:6:"weight";i:10;}i:1;a:3:{s:9:"eventname";s:27:"controller.method_not_found";s:8:"callable";a:2:{i:0;s:17:"Extensions_HookUI";i:1;s:14:"moduleservices";}s:6:"weight";i:10;}}'),
(518, 'ZConfig', 'idnnames', 'b:1;'),
(520, '/EventHandlers', 'Users', 'a:4:{i:0;a:3:{s:9:"eventname";s:19:"get.pending_content";s:8:"callable";a:2:{i:0;s:29:"Users_Listener_PendingContent";i:1;s:22:"pendingContentListener";}s:6:"weight";i:10;}i:1;a:3:{s:9:"eventname";s:15:"user.login.veto";s:8:"callable";a:2:{i:0;s:35:"Users_Listener_ForcedPasswordChange";i:1;s:28:"forcedPasswordChangeListener";}s:6:"weight";i:10;}i:2;a:3:{s:9:"eventname";s:21:"user.logout.succeeded";s:8:"callable";a:2:{i:0;s:34:"Users_Listener_ClearUsersNamespace";i:1;s:27:"clearUsersNamespaceListener";}s:6:"weight";i:10;}i:3;a:3:{s:9:"eventname";s:25:"frontcontroller.exception";s:8:"callable";a:2:{i:0;s:34:"Users_Listener_ClearUsersNamespace";i:1;s:27:"clearUsersNamespaceListener";}s:6:"weight";i:10;}}'),
(521, 'Users', 'chgemail_expiredays', 'i:0;'),
(522, 'Users', 'chgpass_expiredays', 'i:0;'),
(523, 'Users', 'reg_expiredays', 'i:0;'),
(524, 'Users', 'allowgravatars', 'b:1;'),
(525, 'Users', 'gravatarimage', 's:12:"gravatar.gif";'),
(526, 'Users', 'login_displayapproval', 'b:0;'),
(527, 'Users', 'login_displaydelete', 'b:0;'),
(528, 'Users', 'login_displayinactive', 'b:0;'),
(529, 'Users', 'login_displayverify', 'b:0;'),
(530, 'Users', 'use_password_strength_meter', 'b:0;'),
(531, 'Users', 'moderation_order', 'i:0;'),
(532, 'Users', 'reg_autologin', 'b:0;'),
(533, 'Groups', 'primaryadmingroup', 'i:2;'),
(534, 'Theme', 'render_cache', 'b:0;'),
(535, 'Theme', 'render_compile_check', 'b:1;'),
(536, 'Theme', 'render_expose_template', 'b:0;'),
(537, 'Theme', 'render_force_compile', 'b:0;'),
(538, 'Theme', 'render_lifetime', 'i:3600;'),
(539, 'Theme', 'enable_mobile_theme', 'b:0;'),
(540, 'ZConfig', 'defaultpagetitle', 's:12:"Nom del lloc";'),
(541, 'ZConfig', 'defaultmetadescription', 's:20:"Descripció del lloc";'),
(542, 'ZConfig', 'useids', 'b:0;'),
(543, 'ZConfig', 'idsmail', 'b:0;'),
(544, 'ZConfig', 'idsrulepath', 's:32:"config/phpids_zikula_default.xml";'),
(545, 'ZConfig', 'idssoftblock', 'b:1;'),
(546, 'ZConfig', 'idsfilter', 's:3:"xml";'),
(547, 'ZConfig', 'idsimpactthresholdone', 'i:1;'),
(548, 'ZConfig', 'idsimpactthresholdtwo', 'i:10;'),
(549, 'ZConfig', 'idsimpactthresholdthree', 'i:25;'),
(550, 'ZConfig', 'idsimpactthresholdfour', 'i:75;'),
(551, 'ZConfig', 'idsimpactmode', 'i:1;'),
(552, 'ZConfig', 'idshtmlfields', 'a:1:{i:0;s:14:"POST.__wysiwyg";}'),
(553, 'ZConfig', 'idsjsonfields', 'a:1:{i:0;s:15:"POST.__jsondata";}'),
(554, 'ZConfig', 'idsexceptions', 'a:12:{i:0;s:10:"GET.__utmz";i:1;s:10:"GET.__utmc";i:2;s:18:"REQUEST.linksorder";i:3;s:15:"POST.linksorder";i:4;s:19:"REQUEST.fullcontent";i:5;s:16:"POST.fullcontent";i:6;s:22:"REQUEST.summarycontent";i:7;s:19:"POST.summarycontent";i:8;s:19:"REQUEST.filter.page";i:9;s:16:"POST.filter.page";i:10;s:20:"REQUEST.filter.value";i:11;s:17:"POST.filter.value";}'),
(555, 'SecurityCenter', 'htmlpurifierConfig', 's:3914:"a:10:{s:4:"Attr";a:15:{s:14:"AllowedClasses";N;s:19:"AllowedFrameTargets";a:0:{}s:10:"AllowedRel";a:3:{s:8:"nofollow";b:1;s:11:"imageviewer";b:1;s:8:"lightbox";b:1;}s:10:"AllowedRev";a:0:{}s:13:"ClassUseCDATA";N;s:15:"DefaultImageAlt";N;s:19:"DefaultInvalidImage";s:0:"";s:22:"DefaultInvalidImageAlt";s:13:"Invalid image";s:14:"DefaultTextDir";s:3:"ltr";s:8:"EnableID";b:0;s:16:"ForbiddenClasses";a:0:{}s:11:"IDBlacklist";a:0:{}s:17:"IDBlacklistRegexp";N;s:8:"IDPrefix";s:0:"";s:13:"IDPrefixLocal";s:0:"";}s:10:"AutoFormat";a:10:{s:13:"AutoParagraph";b:0;s:6:"Custom";a:0:{}s:14:"DisplayLinkURI";b:0;s:7:"Linkify";b:0;s:22:"PurifierLinkify.DocURL";s:3:"#%s";s:15:"PurifierLinkify";b:0;s:33:"RemoveEmpty.RemoveNbsp.Exceptions";a:2:{s:2:"td";b:1;s:2:"th";b:1;}s:22:"RemoveEmpty.RemoveNbsp";b:0;s:11:"RemoveEmpty";b:0;s:28:"RemoveSpansWithoutAttributes";b:0;}s:3:"CSS";a:9:{s:14:"AllowImportant";b:0;s:11:"AllowTricky";b:0;s:12:"AllowedFonts";N;s:17:"AllowedProperties";N;s:13:"DefinitionRev";i:1;s:19:"ForbiddenProperties";a:0:{}s:12:"MaxImgLength";s:6:"1200px";s:11:"Proprietary";b:0;s:7:"Trusted";b:0;}s:5:"Cache";a:3:{s:14:"DefinitionImpl";s:10:"Serializer";s:14:"SerializerPath";N;s:21:"SerializerPermissions";i:493;}s:4:"Core";a:17:{s:17:"AggressivelyFixLt";b:1;s:13:"CollectErrors";b:0;s:13:"ColorKeywords";a:17:{s:6:"maroon";s:7:"#800000";s:3:"red";s:7:"#FF0000";s:6:"orange";s:7:"#FFA500";s:6:"yellow";s:7:"#FFFF00";s:5:"olive";s:7:"#808000";s:6:"purple";s:7:"#800080";s:7:"fuchsia";s:7:"#FF00FF";s:5:"white";s:7:"#FFFFFF";s:4:"lime";s:7:"#00FF00";s:5:"green";s:7:"#008000";s:4:"navy";s:7:"#000080";s:4:"blue";s:7:"#0000FF";s:4:"aqua";s:7:"#00FFFF";s:4:"teal";s:7:"#008080";s:5:"black";s:7:"#000000";s:6:"silver";s:7:"#C0C0C0";s:4:"gray";s:7:"#808080";}s:25:"ConvertDocumentToFragment";b:1;s:31:"DirectLexLineNumberSyncInterval";i:0;s:8:"Encoding";s:5:"utf-8";s:21:"EscapeInvalidChildren";b:0;s:17:"EscapeInvalidTags";b:0;s:24:"EscapeNonASCIICharacters";b:0;s:14:"HiddenElements";a:2:{s:6:"script";b:1;s:5:"style";b:1;}s:8:"Language";s:2:"en";s:9:"LexerImpl";N;s:19:"MaintainLineNumbers";N;s:17:"NormalizeNewlines";b:1;s:16:"RemoveInvalidImg";b:1;s:28:"RemoveProcessingInstructions";b:0;s:20:"RemoveScriptContents";N;}s:6:"Filter";a:6:{s:6:"Custom";a:0:{}s:27:"ExtractStyleBlocks.Escaping";b:1;s:24:"ExtractStyleBlocks.Scope";N;s:27:"ExtractStyleBlocks.TidyImpl";N;s:18:"ExtractStyleBlocks";b:0;s:7:"YouTube";b:0;}s:4:"HTML";a:26:{s:7:"Allowed";N;s:17:"AllowedAttributes";N;s:15:"AllowedElements";N;s:14:"AllowedModules";N;s:18:"Attr.Name.UseCDATA";b:0;s:12:"BlockWrapper";s:1:"p";s:11:"CoreModules";a:7:{s:9:"Structure";b:1;s:4:"Text";b:1;s:9:"Hypertext";b:1;s:4:"List";b:1;s:22:"NonXMLCommonAttributes";b:1;s:19:"XMLCommonAttributes";b:1;s:16:"CommonAttributes";b:1;}s:13:"CustomDoctype";N;s:12:"DefinitionID";N;s:13:"DefinitionRev";i:1;s:7:"Doctype";N;s:20:"FlashAllowFullScreen";b:0;s:19:"ForbiddenAttributes";a:0:{}s:17:"ForbiddenElements";a:0:{}s:12:"MaxImgLength";i:1200;s:8:"Nofollow";b:0;s:6:"Parent";s:3:"div";s:11:"Proprietary";b:0;s:9:"SafeEmbed";b:1;s:10:"SafeObject";b:1;s:6:"Strict";b:0;s:7:"TidyAdd";a:0:{}s:9:"TidyLevel";s:6:"medium";s:10:"TidyRemove";a:0:{}s:7:"Trusted";b:0;s:5:"XHTML";b:1;}s:6:"Output";a:6:{s:21:"CommentScriptContents";b:1;s:12:"FixInnerHTML";b:1;s:11:"FlashCompat";b:1;s:7:"Newline";N;s:8:"SortAttr";b:0;s:10:"TidyFormat";b:0;}s:4:"Test";a:1:{s:12:"ForceNoIconv";b:0;}s:3:"URI";a:16:{s:14:"AllowedSchemes";a:6:{s:4:"http";b:1;s:5:"https";b:1;s:6:"mailto";b:1;s:3:"ftp";b:1;s:4:"nntp";b:1;s:4:"news";b:1;}s:4:"Base";N;s:13:"DefaultScheme";s:4:"http";s:12:"DefinitionID";N;s:13:"DefinitionRev";i:1;s:7:"Disable";b:0;s:15:"DisableExternal";b:0;s:24:"DisableExternalResources";b:0;s:16:"DisableResources";b:0;s:4:"Host";N;s:13:"HostBlacklist";a:0:{}s:12:"MakeAbsolute";b:0;s:5:"Munge";N;s:14:"MungeResources";b:0;s:14:"MungeSecretKey";N;s:22:"OverrideAllowedSchemes";b:1;}}";'),
(556, 'ZConfig', 'sessioncsrftokenonetime', 'i:0;'),
(557, 'Content', 'categoryUsage', 's:1:"1";'),
(558, 'Content', 'categoryPropPrimary', 's:7:"primary";'),
(559, 'Content', 'categoryPropSecondary', 's:7:"primary";'),
(560, 'Content', 'newPageState', 's:1:"1";'),
(561, 'Content', 'countViews', 's:1:"0";'),
(562, 'Content', 'enableRawPlugin', 'b:0;'),
(563, '/EventHandlers', 'Content', 'a:1:{i:0;a:3:{s:9:"eventname";s:23:"module.content.gettypes";s:8:"callable";a:2:{i:0;s:12:"Content_Util";i:1;s:8:"getTypes";}s:6:"weight";i:10;}}'),
(564, 'Formicula', 'store_data', 'b:0;'),
(565, 'Formicula', 'store_data_forms', 's:0:"";'),
(566, '/EventHandlers', 'Formicula', 'a:1:{i:0;a:3:{s:9:"eventname";s:23:"module.content.gettypes";s:8:"callable";a:2:{i:0;s:18:"Formicula_Handlers";i:1;s:8:"getTypes";}s:6:"weight";i:10;}}'),
(567, 'IWforums', 'smiliesActive', 'i:1;'),
(568, 'IWmessages', 'dissableSuggest', 's:1:"0";'),
(569, 'IWmessages', 'smiliesActive', 'i:0;'),
(570, 'IWmyrole', 'groupsNotChangeable', 's:0:"";'),
(571, 'IWnoteboard', 'shipHeadersLines', 's:1:"0";'),
(572, 'IWnoteboard', 'notifyNewEntriesByMail', 's:1:"0";'),
(573, 'IWnoteboard', 'notifyNewCommentsByMail', 's:1:"1";'),
(574, 'IWnoteboard', 'commentCheckedByDefault', 's:1:"1";'),
(575, 'IWnoteboard', 'smallAvatars', 's:1:"0";'),
(576, '/EventHandlers', 'IWstats', 'a:1:{i:0;a:3:{s:9:"eventname";s:13:"core.postinit";s:8:"callable";a:2:{i:0;s:17:"IWstats_Listeners";i:1;s:8:"coreinit";}s:6:"weight";i:10;}}'),
(577, 'IWusers', 'usersCanManageName', 'i:0;'),
(578, 'IWusers', 'allowUserChangeAvatar', 's:1:"1";'),
(579, 'IWusers', 'allowUserSetTheirSex', 's:1:"0";'),
(580, 'IWusers', 'allowUserDescribeTheirSelves', 's:1:"1";'),
(581, 'IWusers', 'avatarChangeValidationNeeded', 's:1:"1";'),
(582, 'IWusers', 'usersPictureFolder', 's:5:"fotos";'),
(596, 'News', 'picupload_enabled', 'b:0;'),
(597, 'News', 'picupload_allowext', 's:13:"jpg, gif, png";'),
(598, 'News', 'picupload_index_float', 's:4:"left";'),
(599, 'News', 'picupload_article_float', 's:4:"left";'),
(600, 'News', 'picupload_maxfilesize', 's:6:"500000";'),
(601, 'News', 'picupload_maxpictures', 's:1:"3";'),
(602, 'News', 'picupload_sizing', 's:1:"0";'),
(603, 'News', 'picupload_picmaxwidth', 's:3:"600";'),
(604, 'News', 'picupload_picmaxheight', 's:3:"600";'),
(605, 'News', 'picupload_thumbmaxwidth', 's:3:"150";'),
(606, 'News', 'picupload_thumbmaxheight', 's:3:"150";'),
(607, 'News', 'picupload_thumb2maxwidth', 's:3:"200";'),
(608, 'News', 'picupload_thumb2maxheight', 's:3:"200";'),
(609, 'News', 'picupload_uploaddir', 's:21:"images/news_picupload";'),
(610, 'News', 'enablecategorybasedpermissions', 'b:1;'),
(611, 'News', 'enabledescriptionvar', 'b:0;'),
(612, 'News', 'descriptionvarchars', 'i:250;'),
(613, '/EventHandlers', 'News', 'a:2:{i:0;a:3:{s:9:"eventname";s:19:"get.pending_content";s:8:"callable";a:2:{i:0;s:13:"News_Handlers";i:1;s:14:"pendingContent";}s:6:"weight";i:10;}i:1;a:3:{s:9:"eventname";s:23:"module.content.gettypes";s:8:"callable";a:2:{i:0;s:13:"News_Handlers";i:1;s:8:"getTypes";}s:6:"weight";i:10;}}'),
(614, 'News', 'itemsperadminpage', 'i:15;'),
(615, 'News', 'pdflink_enablecache', 'b:1;'),
(616, 'Pages', 'def_displaywrapper', 'b:1;'),
(617, 'Pages', 'def_displaytitle', 'b:1;'),
(618, 'Pages', 'def_displaycreated', 'b:1;'),
(619, 'Pages', 'def_displayupdated', 'b:1;'),
(620, 'Pages', 'def_displaytextinfo', 'b:1;'),
(621, 'Pages', 'def_displayprint', 'b:1;'),
(622, '/EventHandlers', 'Profile', 'a:1:{i:0;a:1:{s:9:"classname";s:31:"Profile_Listener_UsersUiHandler";}}'),
(623, 'Scribite', 'nicedit_xhtml', 'i:1;'),
(624, 'Scribite', 'ckeditor_language', 's:2:"en";'),
(625, 'Scribite', 'ckeditor_barmode', 's:4:"Full";'),
(626, 'Scribite', 'ckeditor_maxheight', 's:3:"400";'),
(628, 'Scribite', 'markitup_width', 's:3:"65%";'),
(629, 'Scribite', 'markitup_height', 's:5:"400px";'),
(630, 'Scribite', 'xinha_style_dynamiccss', 's:43:"modules/Scribite/style/xinha/DynamicCSS.css";'),
(631, 'Scribite', 'xinha_style_stylist', 's:40:"modules/Scribite/style/xinha/stylist.css";'),
(632, 'Scribite', 'ckeditor_style_editor', 's:43:"modules/Scribite/style/ckeditor/content.css";'),
(633, 'Scribite', 'ckeditor_skin', 's:4:"kama";'),
(634, 'systemplugin.imagine', 'version', 's:5:"1.0.0";'),
(635, 'systemplugin.imagine', 'thumb_dir', 's:20:"systemplugin.imagine";'),
(636, 'systemplugin.imagine', 'thumb_auto_cleanup', 'b:0;'),
(637, 'systemplugin.imagine', 'presets', 'a:1:{s:7:"default";C:27:"SystemPlugin_Imagine_Preset":178:{x:i:2;a:7:{s:5:"width";i:100;s:6:"height";i:100;s:4:"mode";N;s:9:"extension";N;s:8:"__module";N;s:9:"__imagine";N;s:16:"__transformation";N;};m:a:1:{s:7:"\0*\0name";s:7:"default";}}}'),
(638, 'IWMessages', 'uploadFolder', 's:9:"missatges";'),
(639, 'IWMessages', 'limitInBox', 's:2:"50";'),
(640, 'IWMessages', 'limitOutBox', 's:2:"50";'),
(641, 'IWMessages', 'dissableSuggest', 'N;'),
(642, 'ZConfig', 'pagetitle', 's:11:"%pagetitle%";'),
(643, 'IWbooks', 'darrer_nivell', 'N;'),
(644, 'Content', 'pageinfoLocation', 's:3:"top";'),
(645, 'Content', 'overrideTitle', 'b:1;'),
(646, 'Files', 'scribite_v4', 'b:0;'),
(647, 'Files', 'scribite_v5', 'b:1;'),
(648, 'Files', 'scribite_v4_name', 's:8:"Scribite";'),
(649, 'Files', 'scribite_v5_name', 's:8:"Scribite";'),
(650, 'IWforums', 'restyledTheme', 's:1:"1";'),
(651, '/Plugin', 'moduleplugin.scribite.aloha', 'a:2:{s:5:"state";i:1;s:7:"version";s:5:"1.0.0";}'),
(652, 'moduleplugin.scribite.ckeditor', 'barmode', 's:8:"Standard";'),
(653, 'moduleplugin.scribite.ckeditor', 'height', 's:3:"200";'),
(654, 'moduleplugin.scribite.ckeditor', 'resizemode', 's:6:"resize";'),
(655, 'moduleplugin.scribite.ckeditor', 'resizeminheight', 's:3:"250";'),
(656, 'moduleplugin.scribite.ckeditor', 'resizemaxheight', 's:4:"3000";'),
(657, 'moduleplugin.scribite.ckeditor', 'growminheight', 's:3:"200";'),
(658, 'moduleplugin.scribite.ckeditor', 'growmaxheight', 's:3:"400";'),
(659, 'moduleplugin.scribite.ckeditor', 'style_editor', 's:52:"modules/Scribite/plugins/CKEditor/style/contents.css";'),
(660, 'moduleplugin.scribite.ckeditor', 'skin', 's:5:"moono";'),
(661, 'moduleplugin.scribite.ckeditor', 'uicolor', 's:7:"#D3D3D3";'),
(662, 'moduleplugin.scribite.ckeditor', 'langmode', 's:6:"zklang";'),
(663, 'moduleplugin.scribite.ckeditor', 'entermode', 's:16:"CKEDITOR.ENTER_P";'),
(664, 'moduleplugin.scribite.ckeditor', 'shiftentermode', 's:17:"CKEDITOR.ENTER_BR";'),
(665, 'moduleplugin.scribite.ckeditor', 'extraplugins', 's:0:"";'),
(666, 'moduleplugin.scribite.ckeditor', 'filemanagerpath', 's:0:"";'),
(667, '/Plugin', 'moduleplugin.scribite.ckeditor', 'a:2:{s:5:"state";i:1;s:7:"version";s:5:"4.4.0";}'),
(668, 'moduleplugin.scribite.markitup', 'width', 's:3:"99%";'),
(669, 'moduleplugin.scribite.markitup', 'height', 's:5:"400px";'),
(670, '/Plugin', 'moduleplugin.scribite.markitup', 'a:2:{s:5:"state";i:1;s:7:"version";s:6:"1.1.13";}'),
(671, 'moduleplugin.scribite.nicedit', 'fullpanel', 'i:0;'),
(672, 'moduleplugin.scribite.nicedit', 'xhtml', 'i:0;'),
(673, '/Plugin', 'moduleplugin.scribite.nicedit', 'a:2:{s:5:"state";i:1;s:7:"version";s:6:"0.9.24";}'),
(674, 'moduleplugin.scribite.tinymce', 'language', 's:2:"en";'),
(675, 'moduleplugin.scribite.tinymce', 'style', 's:48:"modules/Scribite/plugins/TinyMce/style/style.css";'),
(676, 'moduleplugin.scribite.tinymce', 'theme', 's:6:"modern";'),
(677, 'moduleplugin.scribite.tinymce', 'width', 's:4:"100%";'),
(678, 'moduleplugin.scribite.tinymce', 'height', 's:5:"400px";'),
(679, 'moduleplugin.scribite.tinymce', 'dateformat', 's:8:"%Y-%m-%d";'),
(680, 'moduleplugin.scribite.tinymce', 'timeformat', 's:8:"%H:%M:%S";'),
(681, 'moduleplugin.scribite.tinymce', 'activeplugins', 'a:11:{i:0;s:4:"link";i:1;s:13:"searchreplace";i:2;s:7:"preview";i:3;s:14:"insertdatetime";i:4;s:9:"wordcount";i:5;s:10:"autoresize";i:6;s:10:"fullscreen";i:7;s:5:"print";i:8;s:8:"fullpage";i:9;s:4:"code";i:10;s:5:"files";}'),
(682, '/Plugin', 'moduleplugin.scribite.tinymce', 'a:2:{s:5:"state";i:1;s:7:"version";s:6:"4.0.26";}'),
(683, '/Plugin', 'moduleplugin.scribite.wymeditor', 'a:2:{s:5:"state";i:1;s:7:"version";s:8:"1.0.0-b5";}'),
(684, '/Plugin', 'moduleplugin.scribite.wysihtml5', 'a:2:{s:5:"state";i:1;s:7:"version";s:5:"0.3.0";}'),
(685, 'moduleplugin.scribite.xinha', 'language', 's:2:"en";'),
(686, 'moduleplugin.scribite.xinha', 'skin', 's:9:"blue-look";'),
(687, 'moduleplugin.scribite.xinha', 'barmode', 's:7:"reduced";'),
(688, 'moduleplugin.scribite.xinha', 'width', 's:4:"auto";'),
(689, 'moduleplugin.scribite.xinha', 'height', 's:4:"auto";'),
(690, 'moduleplugin.scribite.xinha', 'style', 's:47:"modules/Scribite/Plugins/Xinha/style/editor.css";'),
(691, 'moduleplugin.scribite.xinha', 'style_dynamiccss', 's:51:"modules/Scribite/Plugins/Xinha/style/DynamicCSS.css";'),
(692, 'moduleplugin.scribite.xinha', 'style_stylist', 's:48:"modules/Scribite/Plugins/Xinha/style/stylist.css";'),
(693, 'moduleplugin.scribite.xinha', 'statusbar', 'i:1;'),
(694, 'moduleplugin.scribite.xinha', 'converturls', 'i:1;'),
(695, 'moduleplugin.scribite.xinha', 'showloading', 'i:1;'),
(696, 'moduleplugin.scribite.xinha', 'useEFM', 'b:0;'),
(697, 'moduleplugin.scribite.xinha', 'activeplugins', 'a:2:{i:0;s:7:"GetHtml";i:1;s:12:"SmartReplace";}'),
(698, '/Plugin', 'moduleplugin.scribite.xinha', 'a:2:{s:5:"state";i:1;s:7:"version";s:6:"0.96.1";}'),
(699, 'moduleplugin.scribite.yui', 'toolbartype', 's:6:"Simple";'),
(700, 'moduleplugin.scribite.yui', 'width', 's:4:"auto";'),
(701, 'moduleplugin.scribite.yui', 'height', 's:5:"300px";'),
(702, 'moduleplugin.scribite.yui', 'dombar', 'b:1;'),
(703, 'moduleplugin.scribite.yui', 'animate', 'b:1;'),
(704, 'moduleplugin.scribite.yui', 'collapse', 'b:1;'),
(705, '/Plugin', 'moduleplugin.scribite.yui', 'a:2:{s:5:"state";i:1;s:7:"version";s:5:"2.9.0";}');

-- --------------------------------------------------------

--
-- Estructura de la taula `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `sid` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `urltitle` varchar(255) DEFAULT NULL,
  `hometext` longtext NOT NULL,
  `bodytext` longtext NOT NULL,
  `counter` int(11) DEFAULT '0',
  `contributor` varchar(25) NOT NULL,
  `notes` longtext NOT NULL,
  `displayonindex` tinyint(4) NOT NULL DEFAULT '0',
  `language` varchar(30) NOT NULL,
  `allowcomments` tinyint(4) NOT NULL DEFAULT '0',
  `format_type` tinyint(4) NOT NULL DEFAULT '0',
  `published_status` tinyint(4) DEFAULT '0',
  `ffrom` datetime DEFAULT NULL,
  `tto` datetime DEFAULT NULL,
  `obj_status` varchar(1) NOT NULL DEFAULT 'A',
  `cr_date` datetime NOT NULL DEFAULT '1970-01-01 00:00:00',
  `cr_uid` int(11) NOT NULL DEFAULT '0',
  `lu_date` datetime NOT NULL DEFAULT '1970-01-01 00:00:00',
  `lu_uid` int(11) NOT NULL DEFAULT '0',
  `approver` int(11) DEFAULT '0',
  `weight` tinyint(4) DEFAULT '0',
  `pictures` int(11) DEFAULT '0',
  PRIMARY KEY (`sid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Bolcant dades de la taula `news`
--

INSERT INTO `news` (`sid`, `title`, `urltitle`, `hometext`, `bodytext`, `counter`, `contributor`, `notes`, `displayonindex`, `language`, `allowcomments`, `format_type`, `published_status`, `ffrom`, `tto`, `obj_status`, `cr_date`, `cr_uid`, `lu_date`, `lu_uid`, `approver`, `weight`, `pictures`) VALUES
(1, 'Pel que fa a aquesta versió de la intranet', 'Pel-que-fa-a-aquesta-versio-de-la-intranet', '<span> \r\n    <p>La Intraweb és un espai web que pot realitzar funcions pròpies de web de centre i d''intranet privada. Aquesta Intraweb està construïda utilitzant la versió 3.0 de la maqueta que té com a base la versió 1.3 del <em>Zikula Application Framework</em>.\r\n</p> \r\n    <p>Si teniu dubtes sobre el funcionament de la maqueta o si voleu fer algun suggeriment o comentari, us podeu dirigir a la web de suport: <a target="_blank" href=".xtec.cat/">http://agora.xtec.cat/</a>.\r\n  <br /> </p> </span>', '', 8, 'admin', '', 1, '', 1, 5, 0, '2008-09-08 17:38:15', NULL, 'A', '2008-09-08 17:38:15', 2, '2013-11-19 17:35:09', 10, 0, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de la taula `objectdata_attributes`
--

CREATE TABLE IF NOT EXISTS `objectdata_attributes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `attribute_name` varchar(80) NOT NULL,
  `object_id` int(11) NOT NULL DEFAULT '0',
  `object_type` varchar(80) NOT NULL,
  `value` longtext NOT NULL,
  `obj_status` varchar(1) NOT NULL DEFAULT 'A',
  `cr_date` datetime NOT NULL DEFAULT '1970-01-01 00:00:00',
  `cr_uid` int(11) NOT NULL DEFAULT '0',
  `lu_date` datetime NOT NULL DEFAULT '1970-01-01 00:00:00',
  `lu_uid` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `object_type` (`object_type`),
  KEY `object_id` (`object_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=112 ;

--
-- Bolcant dades de la taula `objectdata_attributes`
--

INSERT INTO `objectdata_attributes` (`id`, `attribute_name`, `object_id`, `object_type`, `value`, `obj_status`, `cr_date`, `cr_uid`, `lu_date`, `lu_uid`) VALUES
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
(80, '_Legal_termsOfUseAccepted', 3, 'users', '2013-11-19T16:25:10+0000', 'A', '2013-11-19 17:25:10', 10, '2013-11-19 17:25:10', 10),
(81, '_Legal_privacyPolicyAccepted', 3, 'users', '2013-11-19T16:25:10+0000', 'A', '2013-11-19 17:25:10', 10, '2013-11-19 17:25:10', 10),
(82, '_Legal_termsOfUseAccepted', 4, 'users', '2013-11-19T16:25:10+0000', 'A', '2013-11-19 17:25:10', 10, '2013-11-19 17:25:10', 10),
(83, '_Legal_privacyPolicyAccepted', 4, 'users', '2013-11-19T16:25:10+0000', 'A', '2013-11-19 17:25:10', 10, '2013-11-19 17:25:10', 10),
(84, '_Legal_termsOfUseAccepted', 5, 'users', '2013-11-19T16:25:10+0000', 'A', '2013-11-19 17:25:10', 10, '2013-11-19 17:25:10', 10),
(85, '_Legal_privacyPolicyAccepted', 5, 'users', '2013-11-19T16:25:10+0000', 'A', '2013-11-19 17:25:10', 10, '2013-11-19 17:25:10', 10),
(86, '_Legal_termsOfUseAccepted', 6, 'users', '2013-11-19T16:25:10+0000', 'A', '2013-11-19 17:25:10', 10, '2013-11-19 17:25:10', 10),
(87, '_Legal_privacyPolicyAccepted', 6, 'users', '2013-11-19T16:25:10+0000', 'A', '2013-11-19 17:25:10', 10, '2013-11-19 17:25:10', 10),
(88, '_Legal_termsOfUseAccepted', 7, 'users', '2013-11-19T16:25:10+0000', 'A', '2013-11-19 17:25:10', 10, '2013-11-19 17:25:10', 10),
(89, '_Legal_privacyPolicyAccepted', 7, 'users', '2013-11-19T16:25:10+0000', 'A', '2013-11-19 17:25:10', 10, '2013-11-19 17:25:10', 10),
(90, '_Legal_termsOfUseAccepted', 8, 'users', '2013-11-19T16:25:10+0000', 'A', '2013-11-19 17:25:10', 10, '2013-11-19 17:25:10', 10),
(91, '_Legal_privacyPolicyAccepted', 8, 'users', '2013-11-19T16:25:10+0000', 'A', '2013-11-19 17:25:11', 10, '2013-11-19 17:25:11', 10),
(92, '_Legal_termsOfUseAccepted', 9, 'users', '2013-11-19T16:25:10+0000', 'A', '2013-11-19 17:25:11', 10, '2013-11-19 17:25:11', 10),
(93, '_Legal_privacyPolicyAccepted', 9, 'users', '2013-11-19T16:25:10+0000', 'A', '2013-11-19 17:25:11', 10, '2013-11-19 17:25:11', 10),
(94, 'realname', 10, 'users', 'Administració XTEC', 'A', '2013-11-19 17:25:11', 10, '2013-11-19 17:25:11', 10),
(95, 'publicemail', 10, 'users', 'agora@xtec.cat', 'A', '2013-11-19 17:25:11', 10, '2013-11-19 17:25:11', 10),
(96, 'url', 10, 'users', '', 'A', '2013-11-19 17:25:11', 10, '2013-11-19 17:25:11', 10),
(97, 'tzoffset', 10, 'users', '1', 'A', '2013-11-19 17:25:11', 10, '2013-11-19 17:25:11', 10),
(98, 'avatar', 10, 'users', 'blank.gif', 'A', '2013-11-19 17:25:11', 10, '2013-11-19 17:25:11', 10),
(99, 'icq', 10, 'users', '', 'A', '2013-11-19 17:25:11', 10, '2013-11-19 17:25:11', 10),
(100, 'aim', 10, 'users', '', 'A', '2013-11-19 17:25:11', 10, '2013-11-19 17:25:11', 10),
(101, 'yim', 10, 'users', '', 'A', '2013-11-19 17:25:11', 10, '2013-11-19 17:25:11', 10),
(102, 'msnm', 10, 'users', '', 'A', '2013-11-19 17:25:11', 10, '2013-11-19 17:25:11', 10),
(103, 'city', 10, 'users', '', 'A', '2013-11-19 17:25:11', 10, '2013-11-19 17:25:11', 10),
(104, 'occupation', 10, 'users', '', 'A', '2013-11-19 17:25:11', 10, '2013-11-19 17:25:11', 10),
(105, 'signature', 10, 'users', '', 'A', '2013-11-19 17:25:11', 10, '2013-11-19 17:25:11', 10),
(106, 'extrainfo', 10, 'users', '', 'A', '2013-11-19 17:25:11', 10, '2013-11-19 17:25:11', 10),
(107, 'interests', 10, 'users', '', 'A', '2013-11-19 17:25:11', 10, '2013-11-19 17:25:11', 10),
(108, '_Legal_termsOfUseAccepted', 10, 'users', '2013-11-19T16:25:10+0000', 'A', '2013-11-19 17:25:11', 10, '2013-11-19 17:25:11', 10),
(109, '_Legal_privacyPolicyAccepted', 10, 'users', '2013-11-19T16:25:10+0000', 'A', '2013-11-19 17:25:11', 10, '2013-11-19 17:25:11', 10),
(110, '_Legal_termsOfUseAccepted', 11, 'users', '2013-11-19T16:25:10+0000', 'A', '2013-11-19 17:25:11', 10, '2013-11-19 17:25:11', 10),
(111, '_Legal_privacyPolicyAccepted', 11, 'users', '2013-11-19T16:25:10+0000', 'A', '2013-11-19 17:25:11', 10, '2013-11-19 17:25:11', 10);

-- --------------------------------------------------------

--
-- Estructura de la taula `objectdata_log`
--

CREATE TABLE IF NOT EXISTS `objectdata_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `object_type` varchar(80) NOT NULL DEFAULT '',
  `object_id` int(11) NOT NULL DEFAULT '0',
  `op` varchar(16) NOT NULL DEFAULT '',
  `diff` text,
  `obj_status` varchar(1) NOT NULL DEFAULT 'A',
  `cr_date` datetime NOT NULL DEFAULT '1970-01-01 00:00:00',
  `cr_uid` int(11) NOT NULL DEFAULT '0',
  `lu_date` datetime NOT NULL DEFAULT '1970-01-01 00:00:00',
  `lu_uid` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de la taula `objectdata_meta`
--

CREATE TABLE IF NOT EXISTS `objectdata_meta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `module` varchar(40) NOT NULL DEFAULT '',
  `tablename` varchar(40) NOT NULL DEFAULT '',
  `idcolumn` varchar(40) NOT NULL DEFAULT '',
  `obj_id` int(11) NOT NULL DEFAULT '0',
  `permissions` varchar(255) DEFAULT NULL,
  `dc_title` varchar(80) DEFAULT NULL,
  `dc_author` varchar(80) DEFAULT NULL,
  `dc_subject` varchar(255) DEFAULT NULL,
  `dc_keywords` varchar(128) DEFAULT NULL,
  `dc_description` varchar(255) DEFAULT NULL,
  `dc_publisher` varchar(128) DEFAULT NULL,
  `dc_contributor` varchar(128) DEFAULT NULL,
  `dc_startdate` datetime DEFAULT '1970-01-01 00:00:00',
  `dc_enddate` datetime DEFAULT '1970-01-01 00:00:00',
  `dc_type` varchar(128) DEFAULT NULL,
  `dc_format` varchar(128) DEFAULT NULL,
  `dc_uri` varchar(255) DEFAULT NULL,
  `dc_source` varchar(128) DEFAULT NULL,
  `dc_language` varchar(32) DEFAULT NULL,
  `dc_relation` varchar(255) DEFAULT NULL,
  `dc_coverage` varchar(64) DEFAULT NULL,
  `dc_entity` varchar(64) DEFAULT NULL,
  `dc_comment` varchar(255) DEFAULT NULL,
  `dc_extra` varchar(255) DEFAULT NULL,
  `obj_status` varchar(1) NOT NULL DEFAULT 'A',
  `cr_date` datetime NOT NULL DEFAULT '1970-01-01 00:00:00',
  `cr_uid` int(11) NOT NULL DEFAULT '0',
  `lu_date` datetime NOT NULL DEFAULT '1970-01-01 00:00:00',
  `lu_uid` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de la taula `pagelock`
--

CREATE TABLE IF NOT EXISTS `pagelock` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `cdate` datetime NOT NULL,
  `edate` datetime NOT NULL,
  `session` varchar(50) NOT NULL,
  `title` varchar(100) NOT NULL,
  `ipno` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de la taula `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
  `pageid` int(11) NOT NULL AUTO_INCREMENT,
  `title` longtext NOT NULL,
  `urltitle` longtext NOT NULL,
  `content` longtext NOT NULL,
  `counter` int(11) NOT NULL DEFAULT '0',
  `displaywrapper` tinyint(4) NOT NULL DEFAULT '1',
  `language` varchar(30) NOT NULL,
  `obj_status` varchar(1) NOT NULL DEFAULT 'A',
  `cr_date` datetime NOT NULL DEFAULT '1970-01-01 00:00:00',
  `cr_uid` int(11) NOT NULL DEFAULT '0',
  `lu_date` datetime NOT NULL DEFAULT '1970-01-01 00:00:00',
  `lu_uid` int(11) NOT NULL DEFAULT '0',
  `displaytitle` tinyint(4) NOT NULL DEFAULT '1',
  `displaycreated` tinyint(4) NOT NULL DEFAULT '1',
  `displayupdated` tinyint(4) NOT NULL DEFAULT '1',
  `displaytextinfo` tinyint(4) NOT NULL DEFAULT '1',
  `displayprint` tinyint(4) NOT NULL DEFAULT '1',
  `metadescription` longtext NOT NULL,
  `metakeywords` longtext NOT NULL,
  PRIMARY KEY (`pageid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de la taula `quotes`
--

CREATE TABLE IF NOT EXISTS `quotes` (
  `qid` int(11) NOT NULL AUTO_INCREMENT,
  `quote` longtext,
  `author` varchar(150) NOT NULL,
  `obj_status` varchar(1) NOT NULL DEFAULT 'A',
  `cr_date` datetime NOT NULL DEFAULT '1970-01-01 00:00:00',
  `cr_uid` int(11) NOT NULL DEFAULT '0',
  `lu_date` datetime NOT NULL DEFAULT '1970-01-01 00:00:00',
  `lu_uid` int(11) NOT NULL DEFAULT '0',
  `status` tinyint(4) DEFAULT '1',
  PRIMARY KEY (`qid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de la taula `sc_intrusion`
--

CREATE TABLE IF NOT EXISTS `sc_intrusion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `tag` varchar(40) DEFAULT NULL,
  `value` longtext NOT NULL,
  `page` longtext NOT NULL,
  `uid` int(11) DEFAULT NULL,
  `ip` varchar(40) NOT NULL,
  `impact` int(11) NOT NULL DEFAULT '0',
  `filters` longtext NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de la taula `search_result`
--

CREATE TABLE IF NOT EXISTS `search_result` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `text` longtext,
  `module` varchar(100) DEFAULT NULL,
  `extra` varchar(100) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `found` datetime DEFAULT NULL,
  `sesid` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `title` (`title`),
  KEY `module` (`module`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de la taula `search_stat`
--

CREATE TABLE IF NOT EXISTS `search_stat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `search` varchar(50) NOT NULL,
  `scount` int(11) NOT NULL DEFAULT '0',
  `date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de la taula `session_info`
--

CREATE TABLE IF NOT EXISTS `session_info` (
  `sessid` varchar(40) NOT NULL,
  `ipaddr` varchar(32) NOT NULL,
  `lastused` datetime DEFAULT '1970-01-01 00:00:00',
  `uid` int(11) DEFAULT '0',
  `remember` tinyint(4) NOT NULL DEFAULT '0',
  `vars` longtext NOT NULL,
  PRIMARY KEY (`sessid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Bolcant dades de la taula `session_info`
--

INSERT INTO `session_info` (`sessid`, `ipaddr`, `lastused`, `uid`, `remember`, `vars`) VALUES
('54li3p2sn25d3vlninq435ca4aeblb6e', 'b44aab0625ab749bf5a23cce99d45b6d', '2015-02-18 17:31:27', 2, 0, '/|a:7:{s:4:"rand";a:0:{}s:9:"useragent";s:40:"354110d6a48a3a85c04316c953fc6947b34e8a8b";s:3:"uid";s:1:"2";s:7:"_tokens";a:3:{s:23:"54e4be20494c47.74699595";a:2:{s:5:"token";s:92:"NTRlNGJlMjA0OTRjNDcuNzQ2OTk1OTU6NTFiNDU2YmFkZDBkNDgzMDk3NTg5NzUwMjM4YmU4ZjM6MTQyNDI3NzAyNA==";s:9:"timestamp";i:1424277024;}s:23:"54e4be279036b9.25339269";a:2:{s:5:"token";s:92:"NTRlNGJlMjc5MDM2YjkuMjUzMzkyNjk6Yjc3YzI2OTk1MzM3MmYzYzY3NWU3OTIwZDFkNDQxZDE6MTQyNDI3NzAzMQ==";s:9:"timestamp";i:1424277031;}s:23:"54e4be5be7bcd6.39199839";a:2:{s:5:"token";s:92:"NTRlNGJlNWJlN2JjZDYuMzkxOTk4Mzk6YWU0ZGVmMjg2MjRlYWJjYzgzZjY0N2EwODI3MmMwNWU6MTQyNDI3NzA4Mw==";s:9:"timestamp";i:1424277083;}}s:5:"state";N;s:4:"sort";s:4:"name";s:7:"sortdir";s:3:"ASC";}_zikula_messages|a:2:{s:6:"status";a:0:{}s:5:"error";a:0:{}}Zikula_Users|a:1:{s:21:"authentication_method";a:2:{s:7:"modname";s:5:"Users";s:6:"method";s:5:"uname";}}iwSecure|s:0:"";');

-- --------------------------------------------------------

--
-- Estructura de la taula `themes`
--

CREATE TABLE IF NOT EXISTS `themes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
  `type` tinyint(4) NOT NULL DEFAULT '0',
  `displayname` varchar(64) NOT NULL,
  `description` varchar(255) NOT NULL,
  `regid` int(11) NOT NULL DEFAULT '0',
  `directory` varchar(64) NOT NULL,
  `version` varchar(10) NOT NULL DEFAULT '0',
  `official` tinyint(4) NOT NULL DEFAULT '0',
  `author` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `admin` tinyint(4) NOT NULL DEFAULT '0',
  `user` tinyint(4) NOT NULL DEFAULT '0',
  `system` tinyint(4) NOT NULL DEFAULT '0',
  `state` tinyint(4) NOT NULL DEFAULT '0',
  `credits` varchar(255) NOT NULL,
  `changelog` varchar(255) NOT NULL,
  `help` varchar(255) NOT NULL,
  `license` varchar(255) NOT NULL,
  `xhtml` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=26 ;

--
-- Bolcant dades de la taula `themes`
--

INSERT INTO `themes` (`id`, `name`, `type`, `displayname`, `description`, `regid`, `directory`, `version`, `official`, `author`, `contact`, `admin`, `user`, `system`, `state`, `credits`, `changelog`, `help`, `license`, `xhtml`) VALUES
(2, 'RSS', 3, 'RSS', 'The RSS theme is an auxiliary theme designed specially for outputting pages as an RSS feed.', 0, 'RSS', '1.0', 0, 'Mark West', '', 0, 0, 1, 1, 'docs/credits.txt', 'docs/changelog.txt', 'docs/help.txt', 'docs/license.txt', 0),
(5, 'Printer', 3, 'Impressora', 'L''entorn visual Printer és un entorn visual auxiliar dissenyat per mostrar les pàgines en un format adequat per a la impressió', 0, 'Printer', '2.0', 0, 'Mark West', '', 0, 0, 1, 1, '', '', '', '', 1),
(7, 'Atom', 3, 'Àtom', 'Entorn visual auxiliar que genera pàgines en el format de sindicació Atom.', 0, 'Atom', '1.0', 0, 'Franz Skaaning', '', 0, 0, 1, 1, '', '', '', '', 0),
(12, 'IWxtec', 3, 'Intraweb xtec', 'Entorn visual desenvolupat per l''equip del projecte Intraweb per al servei Àgora', 0, 'IWxtec', '1.0', 0, 'Toni Ginard', 'toni.ginard@gmail.com', 1, 1, 1, 1, '', '', '', 'GNU/GPL', 1),
(18, 'IWbluegraceAgora', 3, 'Intraweb Bluegrace Àgora', 'Entorn visual desenvolupat per l''equip del projecte Intraweb per al servei Àgora-intranets', 0, 'IWbluegraceAgora', '1.0', 0, 'Toni Ginard', 'toni.ginard@gmail.com', 1, 1, 1, 1, '', '', '', 'GNU/GPL', 1),
(19, 'SeaBreeze', 3, 'SeaBreeze', 'L''entorn visual SeaBreeze es va refer completament pel Zikula 1.0, amb nous colors i imatges.', 0, 'SeaBreeze', '3.2', 0, 'Carsten Volmer, Vanessa Haakenson, Mark West, Martin Andersen', '', 0, 1, 0, 1, '', '', '', '', 1),
(23, 'Andreas08', 3, 'Andreas08', 'Based on the theme Andreas08 by Andreas Viklund and extended for Zikula with the CSS Framework ''fluid960gs''.', 0, 'Andreas08', '2.0', 0, 'David Brucas, Mark West, Andreas Viklund', '', 1, 1, 0, 1, '', '', '', '', 1),
(24, 'IWxtec2', 3, 'Intraweb XTEC2', 'Theme developed by the Intraweb project staff for the Agora service', 0, 'IWxtec2', '1.0', 0, 'Albert Bachiller, Pau Ferrer', 'pferre22@xtec.cat', 1, 1, 1, 1, '', '', '', 'GNU/GPL', 1),
(25, 'Mobile', 3, 'Mobile', 'The mobile theme is an auxiliary theme designed specially for outputting pages in a mobile-friendly format.', 0, 'Mobile', '1.0', 0, '', '', 0, 0, 1, 1, '', '', '', '', 1);

-- --------------------------------------------------------

--
-- Estructura de la taula `userblocks`
--

CREATE TABLE IF NOT EXISTS `userblocks` (
  `uid` int(11) NOT NULL DEFAULT '0',
  `bid` int(11) NOT NULL DEFAULT '0',
  `active` tinyint(4) NOT NULL DEFAULT '1',
  `last_update` datetime DEFAULT NULL,
  KEY `bid_uid_idx` (`uid`,`bid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de la taula `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `uname` varchar(25) NOT NULL,
  `email` varchar(60) NOT NULL,
  `user_regdate` datetime NOT NULL DEFAULT '1970-01-01 00:00:00',
  `pass` varchar(138) NOT NULL,
  `ublockon` tinyint(4) NOT NULL DEFAULT '0',
  `ublock` longtext NOT NULL,
  `theme` varchar(255) NOT NULL,
  `activated` smallint(6) NOT NULL DEFAULT '0',
  `lastlogin` datetime NOT NULL DEFAULT '1970-01-01 00:00:00',
  `passreminder` varchar(255) NOT NULL,
  `approved_date` datetime NOT NULL DEFAULT '1970-01-01 00:00:00',
  `approved_by` int(11) NOT NULL DEFAULT '0',
  `tz` varchar(30) NOT NULL,
  `locale` varchar(5) NOT NULL,
  PRIMARY KEY (`uid`),
  KEY `uname` (`uname`),
  KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Bolcant dades de la taula `users`
--

INSERT INTO `users` (`uid`, `uname`, `email`, `user_regdate`, `pass`, `ublockon`, `ublock`, `theme`, `activated`, `lastlogin`, `passreminder`, `approved_date`, `approved_by`, `tz`, `locale`) VALUES
(1, 'convidat', 'anonim@xtec.invalid', '1970-01-01 00:00:00', '', 0, '', '', 1, '1970-01-01 00:00:00', '', '1970-01-01 00:00:00', 0, '', ''),
(2, 'admin', 'centre@xtec.invalid', '2013-11-19 16:25:10', '1$$6142bfd56a583d891f0b1dcdbb2a9ef8', 0, '', '', 1, '2015-02-18 16:28:14', '', '2013-11-19 16:25:10', 2, '', ''),
(3, 'profe1', 'exemple@xtec.invalid', '2013-11-19 16:25:10', '1$$6142bfd56a583d891f0b1dcdbb2a9ef8', 0, '', '', 1, '1970-01-01 00:00:00', '', '2013-11-19 16:25:10', 2, '', ''),
(4, 'profe2', 'exemple@xtec.invalid', '2013-11-19 16:25:10', '1$$6142bfd56a583d891f0b1dcdbb2a9ef8', 0, '', '', 1, '1970-01-01 00:00:00', '', '2013-11-19 16:25:10', 2, '', ''),
(5, 'profe3', 'exemple@xtec.invalid', '2013-11-19 16:25:10', '1$$6142bfd56a583d891f0b1dcdbb2a9ef8', 0, '', '', 1, '1970-01-01 00:00:00', '', '2013-11-19 16:25:10', 2, '', ''),
(6, 'alum1', 'exemple@xtec.invalid', '2013-11-19 16:25:10', '1$$6142bfd56a583d891f0b1dcdbb2a9ef8', 0, '', '', 1, '2013-11-19 16:46:31', '', '2013-11-19 16:25:10', 2, '', ''),
(7, 'alum2', 'exemple@xtec.invalid', '2013-11-19 16:25:10', '1$$6142bfd56a583d891f0b1dcdbb2a9ef8', 0, '', '', 1, '1970-01-01 00:00:00', '', '2013-11-19 16:25:10', 2, '', ''),
(8, 'alum3', 'exemple@xtec.invalid', '2013-11-19 16:25:10', '1$$6142bfd56a583d891f0b1dcdbb2a9ef8', 0, '', '', 1, '1970-01-01 00:00:00', '', '2013-11-19 16:25:10', 2, '', ''),
(9, 'direccio', 'exemple@xtec.invalid', '2013-11-19 16:25:10', '1$$6142bfd56a583d891f0b1dcdbb2a9ef8', 0, '', '', 1, '1970-01-01 00:00:00', '', '2013-11-19 16:25:10', 2, '', ''),
(10, 'xtecadmin', 'agora@xtec.invalid', '2013-11-19 16:25:10', '1$$6142bfd56a583d891f0b1dcdbb2a9ef8', 0, '', '', 1, '2013-11-21 12:50:07', '', '2013-11-19 16:25:10', 2, '', ''),
(11, 'edicio', 'exemple@xtec.invalid', '2013-11-19 16:25:10', '1$$6142bfd56a583d891f0b1dcdbb2a9ef8', 0, '', '', 1, '2013-11-19 16:59:02', '', '2013-11-19 16:25:10', 2, '', '');

-- --------------------------------------------------------

--
-- Estructura de la taula `users_verifychg`
--

CREATE TABLE IF NOT EXISTS `users_verifychg` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `changetype` tinyint(4) NOT NULL DEFAULT '0',
  `uid` int(11) NOT NULL DEFAULT '0',
  `newemail` varchar(60) NOT NULL,
  `verifycode` varchar(138) NOT NULL,
  `created_dt` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de la taula `user_property`
--

CREATE TABLE IF NOT EXISTS `user_property` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `label` varchar(255) NOT NULL,
  `dtype` int(11) NOT NULL DEFAULT '0',
  `weight` int(11) NOT NULL DEFAULT '0',
  `validation` longtext,
  `modname` varchar(64) NOT NULL,
  `attributename` varchar(80) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `prop_label` (`label`),
  KEY `prop_attr` (`attributename`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- Bolcant dades de la taula `user_property`
--

INSERT INTO `user_property` (`id`, `label`, `dtype`, `weight`, `validation`, `modname`, `attributename`) VALUES
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
-- Estructura de la taula `workflows`
--

CREATE TABLE IF NOT EXISTS `workflows` (
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
  `debug` longtext,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
