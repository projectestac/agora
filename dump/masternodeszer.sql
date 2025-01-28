-- phpMyAdmin SQL Dump
-- version 4.2.13.3
-- http://www.phpmyadmin.net
--
-- Host: pdb-int:3308
-- Generation Time: 18-10-2019 a les 12:55:26
-- Versió del servidor: 5.6.35-log
-- PHP Version: 7.0.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `usu10`
--

-- --------------------------------------------------------

--
-- Estructura de la taula `wp_bpges_queued_items`
--

CREATE TABLE IF NOT EXISTS `wp_bpges_queued_items` (
`id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `group_id` bigint(20) NOT NULL,
  `activity_id` bigint(20) NOT NULL,
  `type` varchar(75) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_recorded` datetime NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de la taula `wp_bpges_subscriptions`
--

CREATE TABLE IF NOT EXISTS `wp_bpges_subscriptions` (
`id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `group_id` bigint(20) NOT NULL,
  `type` varchar(75) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Bolcant dades de la taula `wp_bpges_subscriptions`
--

INSERT INTO `wp_bpges_subscriptions` (`id`, `user_id`, `group_id`, `type`) VALUES
(1, 1, 1, 'dig'),
(2, 1, 2, 'dig'),
(3, 1, 3, 'dig'),
(4, 1, 4, 'dig'),
(5, 1, 5, 'dig'),
(6, 1, 6, 'dig'),
(7, 1, 7, 'dig'),
(8, 1, 8, 'dig'),
(9, 1, 9, 'dig'),
(10, 1, 10, 'dig'),
(11, 1, 11, 'dig'),
(12, 1, 12, 'dig'),
(13, 1, 13, 'dig'),
(14, 1, 14, 'dig'),
(15, 1, 15, 'dig'),
(16, 1, 16, 'dig'),
(17, 1, 17, 'dig'),
(18, 1, 18, 'dig'),
(19, 1, 19, 'dig'),
(20, 2, 20, 'dig'),
(21, 2, 21, 'dig'),
(22, 2, 22, 'dig');

-- --------------------------------------------------------

--
-- Estructura de la taula `wp_bp_activity`
--

CREATE TABLE IF NOT EXISTS `wp_bp_activity` (
`id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `component` varchar(75) NOT NULL,
  `type` varchar(75) NOT NULL,
  `action` text NOT NULL,
  `content` longtext NOT NULL,
  `primary_link` text NOT NULL,
  `item_id` bigint(20) NOT NULL,
  `secondary_item_id` bigint(20) DEFAULT NULL,
  `date_recorded` datetime NOT NULL,
  `hide_sitewide` tinyint(1) DEFAULT '0',
  `mptt_left` int(11) NOT NULL DEFAULT '0',
  `mptt_right` int(11) NOT NULL DEFAULT '0',
  `is_spam` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=utf8;

--
-- Bolcant dades de la taula `wp_bp_activity`
--

INSERT INTO `wp_bp_activity` (`id`, `user_id`, `component`, `type`, `action`, `content`, `primary_link`, `item_id`, `secondary_item_id`, `date_recorded`, `hide_sitewide`, `mptt_left`, `mptt_right`, `is_spam`) VALUES
(1, 2, 'members', 'last_activity', '', '', '', 0, NULL, '2019-05-13 12:46:13', 0, 0, 0, 0),
(3, 1, 'groups', 'created_group', '<a href="https://pwc-int.educacio.intranet/agora/masterzer/membres/admin/" title="admin">admin</a> ha creat el node <a href="https://pwc-int.educacio.intranet/agora/masterzer/nodes/dep-ciencies/">Dep. Ciències</a>', '', 'https://pwc-int.educacio.intranet/agora/masterzer/membres/admin/', 2, 0, '2014-09-18 17:21:36', 1, 0, 0, 0),
(4, 1, 'groups', 'created_group', '<a href="https://pwc-int.educacio.intranet/agora/masterzer/membres/admin/" title="admin">admin</a> ha creat el node <a href="https://pwc-int.educacio.intranet/agora/masterzer/nodes/dep-socials/">Dep. Socials</a>', '', 'https://pwc-int.educacio.intranet/agora/masterzer/membres/admin/', 3, 0, '2014-09-18 17:40:59', 1, 0, 0, 0),
(5, 1, 'groups', 'activity_update', '<a href="https://pwc-int.educacio.intranet/agora/masterzer/membres/admin/" title="admin">admin</a> ha fet una actualització al node <a href="https://pwc-int.educacio.intranet/agora/masterzer/nodes/dep-socials/">Dep. Socials</a>', 'Primer missatge al mur del Departament de Socials. ', 'https://pwc-int.educacio.intranet/agora/masterzer/membres/admin/', 3, 0, '2014-09-19 09:36:09', 1, 0, 0, 0),
(6, 1, 'members', 'last_activity', '', '', '', 0, NULL, '2016-11-25 11:06:31', 0, 0, 0, 0),
(8, 1, 'groups', 'joined_group', '<a href="https://pwc-int.educacio.intranet/agora/masterzer/membres/admin/" title="admin">admin</a> s''ha afegit al node <a href="https://pwc-int.educacio.intranet/agora/masterzer/nodes/dep-socials/">Dep. Socials</a>', '', 'https://pwc-int.educacio.intranet/agora/masterzer/membres/xtecadmin/', 3, 0, '2014-09-19 10:03:51', 1, 0, 0, 0),
(9, 1, 'groups', 'joined_group', '<a href="https://pwc-int.educacio.intranet/agora/masterzer/membres/admin/" title="admin">admin</a> s''ha afegit al node <a href="https://pwc-int.educacio.intranet/agora/masterzer/nodes/dep-ciencies/">Dep. Ciències</a>', '', 'https://pwc-int.educacio.intranet/agora/masterzer/membres/xtecadmin/', 2, 0, '2014-09-19 10:04:43', 1, 0, 0, 0),
(11, 1, 'groups', 'activity_update', '<a href="https://pwc-int.educacio.intranet/agora/masterzer/membres/admin/" title="admin">admin</a> ha fet una actualització al node <a href="https://pwc-int.educacio.intranet/agora/masterzer/nodes/dep-ciencies/">Dep. Ciències</a>', 'Primer missatge al mur del departament de ciències ', 'https://pwc-int.educacio.intranet/agora/masterzer/membres/admin/', 2, 0, '2014-09-19 16:13:07', 1, 0, 0, 0),
(12, 1, 'groups', 'activity_update', '<a href="https://pwc-int.educacio.intranet/agora/masterzer/membres/admin/" title="admin">admin</a> ha fet una actualització al node <a href="https://pwc-int.educacio.intranet/agora/masterzer/nodes/professorat/">Professorat</a>', 'Primer missatge al mur del professorat\n', 'https://pwc-int.educacio.intranet/agora/masterzer/membres/admin/', 1, 0, '2014-09-19 16:13:26', 1, 0, 0, 0),
(13, 1, 'groups', 'created_group', '<a href="https://pwc-int.educacio.intranet/agora/masterzer/membres/admin/" title="admin">admin</a> ha creat el node <a href="https://pwc-int.educacio.intranet/agora/masterzer/nodes/tecnologia/">Tecnologia</a>', '', 'https://pwc-int.educacio.intranet/agora/masterzer/membres/admin/', 4, 0, '2014-09-19 16:17:04', 1, 0, 0, 0),
(14, 1, 'groups', 'created_group', '<a href="https://pwc-int.educacio.intranet/agora/masterzer/membres/admin/" title="admin">admin</a> ha creat el node <a href="https://pwc-int.educacio.intranet/agora/masterzer/nodes/dep-matematiques/">Dep. Matemàtiques</a>', '', 'https://pwc-int.educacio.intranet/agora/masterzer/membres/admin/', 5, 0, '2014-09-19 16:19:50', 1, 0, 0, 0),
(15, 1, 'groups', 'activity_update', '<a href="https://pwc-int.educacio.intranet/agora/masterzer/membres/admin/" title="admin">admin</a> ha fet una actualització al node <a href="https://pwc-int.educacio.intranet/agora/masterzer/nodes/dep-matematiques/">Dep. Matemàtiques</a>', 'Primer missatge en el departament de Matemàtiques', 'https://pwc-int.educacio.intranet/agora/masterzer/membres/admin/', 5, 0, '2014-09-19 16:23:40', 1, 0, 0, 0),
(16, 1, 'groups', 'created_group', '<a href="https://pwc-int.educacio.intranet/agora/masterzer/membres/admin/" title="admin">admin</a> ha creat el node <a href="https://pwc-int.educacio.intranet/agora/masterzer/nodes/dep-catala-989465410/">Dep. Català</a>', '', 'https://pwc-int.educacio.intranet/agora/masterzer/membres/admin/', 6, 0, '2014-09-19 16:27:08', 1, 0, 0, 0),
(17, 1, 'groups', 'created_group', '<a href="https://pwc-int.educacio.intranet/agora/masterzer/membres/admin/" title="admin">admin</a> ha creat el node <a href="https://pwc-int.educacio.intranet/agora/masterzer/nodes/dep-castella/">Dep. Castellà</a>', '', 'https://pwc-int.educacio.intranet/agora/masterzer/membres/admin/', 7, 0, '2014-09-19 16:29:52', 1, 0, 0, 0),
(18, 1, 'groups', 'created_group', '<a href="https://pwc-int.educacio.intranet/agora/masterzer/membres/admin/" title="admin">admin</a> ha creat el node <a href="https://pwc-int.educacio.intranet/agora/masterzer/nodes/dep-llengues-estrangeres/">Dep. Llengües estrangeres</a>', '', 'https://pwc-int.educacio.intranet/agora/masterzer/membres/admin/', 8, 0, '2014-09-19 16:31:58', 1, 0, 0, 0),
(19, 1, 'groups', 'created_group', '<a href="https://pwc-int.educacio.intranet/agora/masterzer/membres/admin/" title="admin">admin</a> ha creat el node <a href="https://pwc-int.educacio.intranet/agora/masterzer/nodes/dep-educacio-fisica/">Dep. Educació Física</a>', '', 'https://pwc-int.educacio.intranet/agora/masterzer/membres/admin/', 9, 0, '2014-09-19 16:36:06', 1, 0, 0, 0),
(20, 1, 'groups', 'activity_update', '<a href="https://pwc-int.educacio.intranet/agora/masterzer/membres/admin/" title="admin">admin</a> ha fet una actualització al node <a href="https://pwc-int.educacio.intranet/agora/masterzer/nodes/dep-educacio-fisica/">Dep. Educació Física</a>', 'Primer missatge en el mur del departament d''''Educació Física', 'https://pwc-int.educacio.intranet/agora/masterzer/membres/admin/', 9, 0, '2014-09-19 16:36:27', 1, 0, 0, 0),
(21, 1, 'groups', 'created_group', '<a href="https://pwc-int.educacio.intranet/agora/masterzer/membres/admin/" title="admin">admin</a> ha creat el node <a href="https://pwc-int.educacio.intranet/agora/masterzer/nodes/dep-visual-i-plastica-1766120807/">Dep. Visual i Plàstica</a>', '', 'https://pwc-int.educacio.intranet/agora/masterzer/membres/admin/', 10, 0, '2014-09-19 16:40:20', 1, 0, 0, 0),
(22, 1, 'groups', 'created_group', '<a href="https://pwc-int.educacio.intranet/agora/masterzer/membres/admin/" title="admin">admin</a> ha creat el node <a href="https://pwc-int.educacio.intranet/agora/masterzer/nodes/dep-musica/">Dep. Música</a>', '', 'https://pwc-int.educacio.intranet/agora/masterzer/membres/admin/', 11, 0, '2014-09-19 16:48:34', 1, 0, 0, 0),
(23, 1, 'groups', 'created_group', '<a href="https://pwc-int.educacio.intranet/agora/masterzer/membres/admin/" title="admin">admin</a> ha creat el node <a href="https://pwc-int.educacio.intranet/agora/masterzer/nodes/dep-orientacio/">Dep. Orientació</a>', '', 'https://pwc-int.educacio.intranet/agora/masterzer/membres/admin/', 12, 0, '2014-09-19 16:54:30', 1, 0, 0, 0),
(24, 1, 'groups', 'created_group', '<a href="https://pwc-int.educacio.intranet/agora/masterzer/membres/admin/" title="admin">admin</a> ha creat el node <a href="https://pwc-int.educacio.intranet/agora/masterzer/nodes/dep-informatica/">Dep. Informàtica</a>', '', 'https://pwc-int.educacio.intranet/agora/masterzer/membres/admin/', 13, 0, '2014-09-19 17:01:17', 1, 0, 0, 0),
(34, 1, 'groups', 'activity_update', '<a href="https://pwc-int.educacio.intranet/agora/masterzer/membres/admin/" title="admin">admin</a> ha fet una actualització al node <a href="https://pwc-int.educacio.intranet/agora/masterzer/nodes/educacio-emocional/">Educació emocional</a>', 'Un gran vídeo per reflexionar...\n\nhttps://www.youtube.com/watch?v=wSNYYThX5-g', 'https://pwc-int.educacio.intranet/agora/masterzer/membres/admin/', 14, 0, '2014-09-22 14:36:27', 0, 0, 0, 0),
(35, 1, 'groups', 'bbp_topic_create', '<a href="https://pwc-int.educacio.intranet/agora/masterzer/membres/admin/" rel="nofollow">admin</a> ha començat <a href="https://pwc-int.educacio.intranet/agora/masterzer/nodes/professorat/forum/topic/programa-redes-sobre-educacio-emocional/">Programa Redes sobre educació emocional</a> tema en el fòrum <a href="https://pwc-int.educacio.intranet/agora/masterzer/nodes/professorat/forum/">Professorat</a>', 'Programa Redes sobre l''educació emocional. Molt interessant. Per reflexionar.\n\n\n\n<span><img src="http://img.irtve.es/css/rtve.commons/rtve.header.footer/i/logoRTVEes.png" alt="" /></span> <a title="El aprendizaje social y emocional" href="http://www.rtve.es/alacarta/videos/redes/redes-aprendizaje-social-20130526-2130-169/1839588/"><strong>El aprendizaje social y emocional</strong></a>\n', 'https://pwc-int.educacio.intranet/agora/masterzer/nodes/professorat/forum/topic/programa-redes-sobre-educacio-emocional/', 1, 206, '2014-09-22 14:40:28', 1, 0, 0, 0),
(36, 1, 'groups', 'bbp_topic_create', '<a href="https://pwc-int.educacio.intranet/agora/masterzer/membres/admin/" rel="nofollow">admin</a> ha començat <a href="https://pwc-int.educacio.intranet/agora/masterzer/nodes/professorat/forum/topic/indefensio-apresa/">Indefensió apresa</a> tema en el fòrum <a href="https://pwc-int.educacio.intranet/agora/masterzer/nodes/professorat/forum/">Professorat</a>', 'Un dels objectius de la xarxa Nodes és oferir espais perquè els alumnes es pugin expressar fora de l''aula. Pot ser una eina molt útil especialment pels alumnes que no destaquen pels seus resultats acadèmics i que tenen una baixa autoestima derivada d''una indefensió apresa a l''aula.\n\n', 'https://pwc-int.educacio.intranet/agora/masterzer/nodes/professorat/forum/topic/indefensio-apresa/', 1, 207, '2014-09-22 14:46:13', 1, 0, 0, 0),
(38, 1, 'groups', 'activity_update', '<a href="https://pwc-int.educacio.intranet/agora/masterzer/membres/admin/" title="admin">admin</a> ha fet una actualització al node <a href="https://pwc-int.educacio.intranet/agora/masterzer/nodes/rrr-reduccio-reutilitzacio-i-reciclatge/">RRR – Reducció, Reutilització i Reciclatge</a>', '\n[bpfb_images]\n1_0-44155900-1411397838_koalarrr.jpg\n[/bpfb_images]', 'https://pwc-int.educacio.intranet/agora/masterzer/membres/admin/', 18, 0, '2014-09-22 14:57:18', 0, 0, 0, 0),
(39, 1, 'groups', 'created_group', '<a href="https://pwc-int.educacio.intranet/agora/masterzer/membres/admin/" title="admin">admin</a> ha creat el node <a href="https://pwc-int.educacio.intranet/agora/masterzer/nodes/papiroflexia/">Papiroflexia</a>', '', 'https://pwc-int.educacio.intranet/agora/masterzer/membres/admin/', 19, 0, '2014-09-22 15:08:11', 0, 0, 0, 0),
(40, 1, 'groups', 'bbp_topic_create', '<a href="https://pwc-int.educacio.intranet/agora/masterzer/membres/admin/" rel="nofollow">admin</a> ha començat <a href="https://pwc-int.educacio.intranet/agora/masterzer/nodes/papiroflexia/forum/topic/figura-n-1-la-granota/">Figura n.1: La granota </a> tema en el fòrum <a href="https://pwc-int.educacio.intranet/agora/masterzer/nodes/papiroflexia/forum/">Papiroflexia</a>', 'Hola Noders! Qui s''apunta a fer la granota? Aquí teniu les instruccions:\r\n\r\n[caption id="" align="alignnone" width="700"]<img src="https://pwc-int.educacio.intranet/agora/masterzer/wp-content/uploads/usu10/2014/09/granota.png" alt="Instruccions Granota" width="700" height="495" /> Instruccions Granota[/caption]', 'https://pwc-int.educacio.intranet/agora/masterzer/nodes/papiroflexia/forum/topic/figura-n-1-la-granota/', 19, 211, '2014-09-22 15:11:13', 0, 0, 0, 0),
(41, 1, 'groups', 'activity_update', '<a href="https://pwc-int.educacio.intranet/agora/masterzer/membres/admin/" title="admin">admin</a> ha fet una actualització al node <a href="https://pwc-int.educacio.intranet/agora/masterzer/nodes/papiroflexia/">Papiroflexia</a>', 'Pengeu les vostres fotos amb la granota feta!', 'https://pwc-int.educacio.intranet/agora/masterzer/membres/admin/', 19, 0, '2014-09-22 15:12:07', 0, 0, 0, 0),
(43, 1, 'groups', 'activity_update', '<a href="https://pwc-int.educacio.intranet/agora/masterzer/membres/admin/" title="admin">admin</a> ha fet una actualització al node <a href="https://pwc-int.educacio.intranet/agora/masterzer/nodes/cinema/">Cinema</a>', 'Hola Noders! Avui des del node de cinema volem compartir un curtmetratge molt xulo, ple de fantasia.\n\nhttps://www.youtube.com/watch?v=p-yPn2FxxJw', 'https://pwc-int.educacio.intranet/agora/masterzer/membres/admin/', 15, 0, '2014-09-22 15:33:34', 0, 0, 0, 0),
(45, 1, 'groups', 'activity_update', '<a href="https://pwc-int.educacio.intranet/agora/masterzer/membres/admin/" title="admin">admin</a> ha fet una actualització al node <a href="https://pwc-int.educacio.intranet/agora/masterzer/nodes/fotografia/">Fotografia</a>', 'Una foto que vaig fer a Menorca, que us suggereix? \n[bpfb_images]\n1_0-42209200-1411400780_menorca_jmeler.jpg\n[/bpfb_images]', 'https://pwc-int.educacio.intranet/agora/masterzer/membres/admin/', 17, 0, '2014-09-22 15:46:20', 0, 0, 0, 0),
(47, 1, 'groups', 'activity_update', '<a href="https://pwc-int.educacio.intranet/agora/masterzer/membres/admin/" title="admin">admin</a> ha fet una actualització al node <a href="https://pwc-int.educacio.intranet/agora/masterzer/nodes/educacio-emocional/">Educació emocional</a>', 'Bon dia Noders! Avui us compartim un inquietant curtmetratge que ens ha de fer reflexionar sobre l’individualisme… és molt xulo… i fins i tot va guanyar un Oscar!\n\nhttps://www.youtube.com/watch?v=pRUGRPKRAWs', 'https://pwc-int.educacio.intranet/agora/masterzer/membres/admin/', 14, 0, '2014-09-22 15:59:20', 0, 0, 0, 0),
(48, 1, 'groups', 'bbp_topic_create', '<a href="https://pwc-int.educacio.intranet/agora/masterzer/membres/admin/" rel="nofollow">admin</a> ha començat <a href="https://pwc-int.educacio.intranet/agora/masterzer/nodes/professorat/forum/topic/documental-sobre-educacio-emocional/">Documental sobre educació Emocional</a> tema en el fòrum <a href="https://pwc-int.educacio.intranet/agora/masterzer/nodes/professorat/forum/">Professorat</a>', 'Molt recomanable:\nhttps://www.youtube.com/watch?v=PQE4WqQSOcQ', 'https://pwc-int.educacio.intranet/agora/masterzer/nodes/professorat/forum/topic/documental-sobre-educacio-emocional/', 1, 216, '2014-09-22 16:54:13', 1, 0, 0, 0),
(50, 1, 'groups', 'bp_doc_edited', '<a href="https://pwc-int.educacio.intranet/agora/masterzer/membres/admin/" title="admin">admin</a> edited the doc <a href="https://pwc-int.educacio.intranet/agora/masterzer/docs/document-a-google-drive/">Document a Google Drive</a> in the group <a href="https://pwc-int.educacio.intranet/agora/masterzer/nodes/professorat/">Professorat</a>', '', 'https://pwc-int.educacio.intranet/agora/masterzer/docs/document-a-google-drive/', 1, 230, '2014-10-23 15:07:51', 1, 0, 0, 0),
(52, 1, 'groups', 'bp_doc_created', '<a href="https://pwc-int.educacio.intranet/agora/masterzer/membres/admin/" title="admin">admin</a> created the doc <a href="https://pwc-int.educacio.intranet/agora/masterzer/docs/professorat-2/">Professorat</a> in the group <a href="https://pwc-int.educacio.intranet/agora/masterzer/nodes/professorat/">Professorat</a>', '', 'https://pwc-int.educacio.intranet/agora/masterzer/docs/professorat-2/', 1, 236, '2014-10-23 15:14:55', 1, 0, 0, 0),
(54, 1, 'groups', 'bp_doc_edited', '<a href="https://pwc-int.educacio.intranet/agora/masterzer/membres/admin/" title="admin">admin</a> edited the doc <a href="https://pwc-int.educacio.intranet/agora/masterzer/docs/document-a-google-drive/">Document a Google Drive</a> in the group <a href="https://pwc-int.educacio.intranet/agora/masterzer/nodes/professorat/">Professorat</a>', '', 'https://pwc-int.educacio.intranet/agora/masterzer/docs/document-a-google-drive/', 1, 230, '2014-10-23 15:15:49', 1, 0, 0, 0),
(55, 1, 'groups', 'bp_doc_edited', '<a href="https://pwc-int.educacio.intranet/agora/masterzer/membres/admin/" title="admin">admin</a> ha editat el document <a href="https://pwc-int.educacio.intranet/agora/masterzer/docs/exemple-foto-com-a-document/">Exemple foto com a document</a> al node <a href="https://pwc-int.educacio.intranet/agora/masterzer/nodes/fotografia/">Fotografia</a>', '', 'https://pwc-int.educacio.intranet/agora/masterzer/docs/exemple-foto-com-a-document/', 17, 238, '2015-07-21 07:35:33', 0, 0, 0, 0),
(56, 1, 'groups', 'created_group', '<a href="https://pwc-int.educacio.intranet/agora/masterzer/membres/admin/" title="admin">admin</a> ha creat el node <a href="https://pwc-int.educacio.intranet/agora/masterzer/nodes/escola-alfa/">Escola Alfa</a>', '', 'https://pwc-int.educacio.intranet/agora/masterzer/membres/admin/', 20, 0, '2015-07-24 14:53:28', 1, 0, 0, 0),
(57, 1, 'groups', 'created_group', '<a href="https://pwc-int.educacio.intranet/agora/masterzer/membres/admin/" title="admin">admin</a> ha creat el node <a href="https://pwc-int.educacio.intranet/agora/masterzer/nodes/escola-beta/">Escola Beta</a>', '', 'https://pwc-int.educacio.intranet/agora/masterzer/membres/admin/', 21, 0, '2015-07-24 14:54:59', 1, 0, 0, 0),
(58, 1, 'groups', 'created_group', '<a href="https://pwc-int.educacio.intranet/agora/masterzer/membres/admin/" title="admin">admin</a> ha creat el node <a href="https://pwc-int.educacio.intranet/agora/masterzer/nodes/escola-gamma/">Escola Gamma</a>', '', 'https://pwc-int.educacio.intranet/agora/masterzer/membres/admin/', 22, 0, '2015-07-24 14:55:57', 1, 0, 0, 0),
(59, 1, 'groups', 'created_group', '<a href="https://pwc-int.educacio.intranet/agora/masterzer/membres/admin/" title="admin">admin</a> ha creat el node <a href="https://pwc-int.educacio.intranet/agora/masterzer/nodes/escola-epsilon/">Escola Epsilon</a>', '', 'https://pwc-int.educacio.intranet/agora/masterzer/membres/admin/', 23, 0, '2015-07-24 14:59:17', 1, 0, 0, 0),
(60, 2, 'activity', 'activity_update', '<a href="https://pwc-int.educacio.intranet/agora/masterzer/membres/xtecadmin/" title="xtecadmin">xtecadmin</a> ha publicat una actualització', '\n[bpfb_images]\n2_0-70382500-1466151622_vision.png\n[/bpfb_images]', 'https://pwc-int.educacio.intranet/agora/masterzer/membres/xtecadmin/', 0, 0, '2016-06-17 08:20:22', 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de la taula `wp_bp_activity_meta`
--

CREATE TABLE IF NOT EXISTS `wp_bp_activity_meta` (
`id` bigint(20) NOT NULL,
  `activity_id` bigint(20) NOT NULL,
  `meta_key` varchar(255) DEFAULT NULL,
  `meta_value` longtext
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Bolcant dades de la taula `wp_bp_activity_meta`
--

INSERT INTO `wp_bp_activity_meta` (`id`, `activity_id`, `meta_key`, `meta_value`) VALUES
(5, 34, '_oembed_d82c712e85b3a7c1789399a52e78e1fa', '<iframe width="500" height="281" src="https://www.youtube.com/embed/wSNYYThX5-g?feature=oembed" frameborder="0" allowfullscreen></iframe>'),
(6, 38, 'bpfb_blog_id', '1'),
(8, 43, '_oembed_dfc4a898350643977de05cbcbb0c3694', '<iframe width="500" height="281" src="https://www.youtube.com/embed/p-yPn2FxxJw?feature=oembed" frameborder="0" allowfullscreen></iframe>'),
(10, 45, 'bpfb_blog_id', '1'),
(12, 47, '_oembed_e1f6f3206fbb446ab592be1d774601f3', '<iframe width="500" height="375" src="https://www.youtube.com/embed/pRUGRPKRAWs?feature=oembed" frameborder="0" allowfullscreen></iframe>'),
(13, 48, '_oembed_9a9cd4314ec5c6c352acee421db4e1c2', '<iframe width="500" height="281" src="https://www.youtube.com/embed/PQE4WqQSOcQ?feature=oembed" frameborder="0" allowfullscreen></iframe>'),
(14, 60, 'bpfb_blog_id', '1');

-- --------------------------------------------------------

--
-- Estructura de la taula `wp_bp_friends`
--

CREATE TABLE IF NOT EXISTS `wp_bp_friends` (
`id` bigint(20) NOT NULL,
  `initiator_user_id` bigint(20) NOT NULL,
  `friend_user_id` bigint(20) NOT NULL,
  `is_confirmed` tinyint(1) DEFAULT '0',
  `is_limited` tinyint(1) DEFAULT '0',
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de la taula `wp_bp_groups`
--

CREATE TABLE IF NOT EXISTS `wp_bp_groups` (
`id` bigint(20) NOT NULL,
  `creator_id` bigint(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `slug` varchar(200) NOT NULL,
  `description` longtext NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'public',
  `enable_forum` tinyint(1) NOT NULL DEFAULT '1',
  `date_created` datetime NOT NULL,
  `parent_id` bigint(20) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

--
-- Bolcant dades de la taula `wp_bp_groups`
--

INSERT INTO `wp_bp_groups` (`id`, `creator_id`, `name`, `slug`, `description`, `status`, `enable_forum`, `date_created`, `parent_id`) VALUES
(1, 1, 'Professorat', 'professorat', 'Node de professorat', 'private', 1, '2014-09-18 17:16:51', 0),
(2, 1, 'Dep. Ciències', 'dep-ciencies', 'Node del Departament de Ciències Naturals (professorat)', 'private', 1, '2014-09-18 17:20:58', 0),
(3, 1, 'Dep. Socials', 'dep-socials', 'Node del departament de ciències socials (professorat)', 'private', 1, '2014-09-18 17:40:09', 0),
(4, 1, 'Dep. Tecnologia', 'tecnologia', 'Node del departament de Tecnologia (professorat)', 'private', 1, '2014-09-19 16:16:18', 0),
(5, 1, 'Dep. Matemàtiques', 'dep-matematiques', 'Node del departament de Matemàtiques', 'private', 1, '2014-09-19 16:19:12', 0),
(6, 1, 'Dep. Català', 'dep-catala-989465410', 'Node del departament de Llengua catalana i literatura (professorat)', 'private', 1, '2014-09-19 16:26:32', 0),
(7, 1, 'Dep. Castellà', 'dep-castella', 'Node del departament de Llengua castellana i literatura (professorat)', 'private', 1, '2014-09-19 16:28:58', 0),
(8, 1, 'Dep. Llengües estrangeres', 'dep-llengues-estrangeres', 'Node del departament de Llengües estrangeres (professorat)', 'private', 1, '2014-09-19 16:31:18', 0),
(9, 1, 'Dep. Educació Física', 'dep-educacio-fisica', 'Node del departament d''''Educació Física (professorat)', 'private', 1, '2014-09-19 16:33:28', 0),
(10, 1, 'Dep. Visual i Plàstica', 'dep-visual-i-plastica-1766120807', 'Node del departament de Visual i Plàstica (professorat)', 'private', 1, '2014-09-19 16:39:38', 0),
(11, 1, 'Dep. Música', 'dep-musica', 'Node del departament de música (professorat)', 'private', 1, '2014-09-19 16:45:33', 0),
(12, 1, 'Dep. Orientació', 'dep-orientacio', 'Node del departament d''''Orientació (professorat)', 'private', 1, '2014-09-19 16:50:02', 0),
(13, 1, 'Dep. Informàtica', 'dep-informatica', 'Node del departament d''''Informàtica (professorat)', 'private', 1, '2014-09-19 17:00:44', 0),
(14, 1, 'Educació emocional', 'educacio-emocional', 'Node dedicat a l''''educació emocional', 'public', 1, '2014-09-22 14:12:19', 0),
(15, 1, 'Cinema', 'cinema', 'Node dels aficionats al cinema', 'public', 1, '2014-09-22 14:20:19', 0),
(16, 1, 'Música', 'musica', 'Node per comentar i compartir la música que més ens agrada', 'public', 0, '2014-09-22 14:27:18', 0),
(17, 1, 'Fotografia', 'fotografia', 'Node dels aficionats a la fotografia', 'public', 1, '2014-09-22 14:31:48', 0),
(18, 1, 'RRR – Reducció, Reutilització i Reciclatge', 'rrr-reduccio-reutilitzacio-i-reciclatge', 'Node de recerca i conscienciació sobre\r\nla REDUCCIÓ,\r\nla REUTILITZACIÓ i\r\nel RECICLATGE DE RESIDUS (RRR)', 'public', 0, '2014-09-22 14:52:34', 0),
(19, 1, 'Papiroflexia', 'papiroflexia', 'Node d''''aficionats a la papiroflexia', 'public', 1, '2014-09-22 15:06:34', 0),
(20, 1, 'Escola Alfa', 'escola-alfa', 'Node de l\\''escola Alfa', 'private', 1, '2015-07-24 14:53:10', 0),
(21, 1, 'Escola Beta', 'escola-beta', 'Node de la escola Beta', 'private', 1, '2015-07-24 14:54:46', 0),
(22, 1, 'Escola Gamma', 'escola-gamma', 'Node de la escola Gamma', 'private', 1, '2015-07-24 14:55:44', 0),
(23, 1, 'Escola Epsilon', 'escola-epsilon', 'Node de l\\''escola Epsilon', 'private', 1, '2015-07-24 14:58:42', 0);

-- --------------------------------------------------------

--
-- Estructura de la taula `wp_bp_groups_groupmeta`
--

CREATE TABLE IF NOT EXISTS `wp_bp_groups_groupmeta` (
`id` bigint(20) NOT NULL,
  `group_id` bigint(20) NOT NULL,
  `meta_key` varchar(255) DEFAULT NULL,
  `meta_value` longtext
) ENGINE=InnoDB AUTO_INCREMENT=158 DEFAULT CHARSET=utf8;

--
-- Bolcant dades de la taula `wp_bp_groups_groupmeta`
--

INSERT INTO `wp_bp_groups_groupmeta` (`id`, `group_id`, `meta_key`, `meta_value`) VALUES
(1, 1, 'total_member_count', '1'),
(2, 1, 'last_activity', '2014-10-23 15:18:51'),
(3, 1, 'ass_default_subscription', 'dig'),
(4, 1, 'ass_subscribed_users', 'a:1:{i:1;s:3:"dig";}'),
(5, 1, 'invite_status', 'mods'),
(6, 1, 'forum_id', 'a:1:{i:0;i:112;}'),
(7, 1, '_bbp_forum_enabled_112', '1'),
(8, 2, 'total_member_count', '1'),
(9, 2, 'last_activity', '2014-09-19 16:13:07'),
(10, 2, 'ass_default_subscription', 'dig'),
(11, 2, 'ass_subscribed_users', 'a:1:{i:1;s:3:"dig";}'),
(12, 2, 'invite_status', 'admins'),
(13, 2, 'forum_id', 'a:1:{i:0;i:113;}'),
(14, 2, '_bbp_forum_enabled_113', '1'),
(15, 3, 'total_member_count', '1'),
(16, 3, 'last_activity', '2014-09-19 10:04:23'),
(17, 3, 'ass_default_subscription', 'dig'),
(18, 3, 'ass_subscribed_users', 'a:1:{i:1;s:3:"dig";}'),
(19, 3, 'invite_status', 'admins'),
(20, 3, 'forum_id', 'a:1:{i:0;i:115;}'),
(21, 3, '_bbp_forum_enabled_115', '1'),
(22, 4, 'total_member_count', '1'),
(23, 4, 'last_activity', '2014-09-19 16:16:18'),
(24, 4, 'ass_default_subscription', 'dig'),
(25, 4, 'ass_subscribed_users', 'a:1:{i:1;s:3:"dig";}'),
(26, 4, 'invite_status', 'admins'),
(27, 4, 'forum_id', 'a:1:{i:0;i:170;}'),
(28, 4, '_bbp_forum_enabled_170', '1'),
(29, 5, 'total_member_count', '1'),
(30, 5, 'last_activity', '2014-09-19 16:23:40'),
(31, 5, 'ass_default_subscription', 'dig'),
(32, 5, 'ass_subscribed_users', 'a:1:{i:1;s:3:"dig";}'),
(33, 5, 'invite_status', 'admins'),
(34, 5, 'forum_id', 'a:1:{i:0;i:171;}'),
(35, 5, '_bbp_forum_enabled_171', '1'),
(36, 6, 'total_member_count', '1'),
(37, 6, 'last_activity', '2014-09-19 16:26:32'),
(38, 6, 'ass_default_subscription', 'dig'),
(39, 6, 'ass_subscribed_users', 'a:1:{i:1;s:3:"dig";}'),
(40, 6, 'invite_status', 'admins'),
(41, 6, 'forum_id', 'a:1:{i:0;i:172;}'),
(42, 6, '_bbp_forum_enabled_172', '1'),
(43, 7, 'total_member_count', '1'),
(44, 7, 'last_activity', '2014-09-19 16:28:58'),
(45, 7, 'ass_default_subscription', 'dig'),
(46, 7, 'ass_subscribed_users', 'a:1:{i:1;s:3:"dig";}'),
(47, 7, 'invite_status', 'admins'),
(48, 7, 'forum_id', 'a:1:{i:0;i:173;}'),
(49, 7, '_bbp_forum_enabled_173', '1'),
(50, 8, 'total_member_count', '1'),
(51, 8, 'last_activity', '2014-09-19 16:31:18'),
(52, 8, 'ass_default_subscription', 'dig'),
(53, 8, 'ass_subscribed_users', 'a:1:{i:1;s:3:"dig";}'),
(54, 8, 'invite_status', 'admins'),
(55, 8, 'forum_id', 'a:1:{i:0;i:174;}'),
(56, 8, '_bbp_forum_enabled_174', '1'),
(57, 9, 'total_member_count', '1'),
(58, 9, 'last_activity', '2014-09-19 16:36:27'),
(59, 9, 'ass_default_subscription', 'dig'),
(60, 9, 'ass_subscribed_users', 'a:1:{i:1;s:3:"dig";}'),
(61, 9, 'invite_status', 'admins'),
(62, 9, 'forum_id', 'a:1:{i:0;i:175;}'),
(63, 9, '_bbp_forum_enabled_175', '1'),
(64, 10, 'total_member_count', '1'),
(65, 10, 'last_activity', '2014-09-19 16:39:38'),
(66, 10, 'ass_default_subscription', 'dig'),
(67, 10, 'ass_subscribed_users', 'a:1:{i:1;s:3:"dig";}'),
(68, 10, 'invite_status', 'admins'),
(69, 10, 'forum_id', 'a:1:{i:0;i:176;}'),
(70, 10, '_bbp_forum_enabled_176', '1'),
(71, 11, 'total_member_count', '1'),
(72, 11, 'last_activity', '2014-10-09 11:11:33'),
(73, 11, 'ass_default_subscription', 'dig'),
(74, 11, 'ass_subscribed_users', 'a:1:{i:1;s:3:"dig";}'),
(75, 11, 'invite_status', 'admins'),
(76, 11, 'forum_id', 'a:1:{i:0;i:177;}'),
(77, 11, '_bbp_forum_enabled_177', '1'),
(78, 12, 'total_member_count', '1'),
(79, 12, 'last_activity', '2014-09-19 16:50:02'),
(80, 12, 'ass_default_subscription', 'dig'),
(81, 12, 'ass_subscribed_users', 'a:1:{i:1;s:3:"dig";}'),
(82, 12, 'invite_status', 'admins'),
(83, 12, 'forum_id', 'a:1:{i:0;i:178;}'),
(84, 12, '_bbp_forum_enabled_178', '1'),
(85, 13, 'total_member_count', '1'),
(86, 13, 'last_activity', '2014-09-19 17:00:44'),
(87, 13, 'ass_default_subscription', 'dig'),
(88, 13, 'ass_subscribed_users', 'a:1:{i:1;s:3:"dig";}'),
(89, 13, 'invite_status', 'admins'),
(90, 13, 'forum_id', 'a:1:{i:0;i:179;}'),
(91, 13, '_bbp_forum_enabled_179', '1'),
(92, 14, 'total_member_count', '1'),
(93, 14, 'last_activity', '2014-09-22 15:59:20'),
(94, 14, 'ass_default_subscription', 'dig'),
(95, 14, 'ass_subscribed_users', 'a:1:{i:1;s:3:"dig";}'),
(96, 14, 'invite_status', 'admins'),
(97, 14, 'forum_id', 'a:1:{i:0;i:203;}'),
(98, 14, '_bbp_forum_enabled_203', '1'),
(99, 15, 'total_member_count', '1'),
(100, 15, 'last_activity', '2014-09-22 15:33:34'),
(101, 15, 'ass_default_subscription', 'dig'),
(102, 15, 'ass_subscribed_users', 'a:1:{i:1;s:3:"dig";}'),
(103, 15, 'invite_status', 'members'),
(104, 15, 'forum_id', 'a:1:{i:0;i:204;}'),
(105, 15, '_bbp_forum_enabled_204', '1'),
(106, 15, 'bp-docs', 'a:1:{s:10:"can-create";s:6:"member";}'),
(107, 16, 'total_member_count', '1'),
(108, 16, 'last_activity', '2014-09-22 14:29:34'),
(109, 16, 'ass_default_subscription', 'dig'),
(110, 16, 'ass_subscribed_users', 'a:1:{i:1;s:3:"dig";}'),
(111, 16, 'invite_status', 'admins'),
(112, 16, 'bp-docs', 'a:1:{s:10:"can-create";s:6:"member";}'),
(113, 17, 'total_member_count', '1'),
(114, 17, 'last_activity', '2015-07-21 07:35:33'),
(115, 17, 'ass_default_subscription', 'dig'),
(116, 17, 'ass_subscribed_users', 'a:1:{i:1;s:3:"dig";}'),
(117, 17, 'invite_status', 'admins'),
(118, 17, 'forum_id', 'a:1:{i:0;i:205;}'),
(119, 17, '_bbp_forum_enabled_205', '1'),
(120, 18, 'total_member_count', '1'),
(121, 18, 'last_activity', '2014-09-22 14:57:18'),
(122, 18, 'ass_default_subscription', 'dig'),
(123, 18, 'ass_subscribed_users', 'a:1:{i:1;s:3:"dig";}'),
(124, 18, 'invite_status', 'admins'),
(125, 19, 'total_member_count', '1'),
(126, 19, 'last_activity', '2014-09-22 15:12:07'),
(127, 19, 'ass_default_subscription', 'dig'),
(128, 19, 'ass_subscribed_users', 'a:1:{i:1;s:3:"dig";}'),
(129, 19, 'invite_status', 'admins'),
(130, 19, 'forum_id', 'a:1:{i:0;i:209;}'),
(131, 19, '_bbp_forum_enabled_209', '1'),
(132, 20, 'total_member_count', '1'),
(133, 20, 'last_activity', '2015-07-24 14:53:10'),
(134, 20, 'ass_default_subscription', 'dig'),
(135, 20, 'ass_subscribed_users', 'a:1:{i:2;s:3:"dig";}'),
(136, 20, 'invite_status', 'members'),
(137, 20, 'forum_id', 'a:1:{i:0;i:451;}'),
(138, 20, '_bbp_forum_enabled_451', '1'),
(139, 21, 'total_member_count', '1'),
(140, 21, 'last_activity', '2015-07-24 14:54:46'),
(141, 21, 'ass_default_subscription', 'dig'),
(142, 21, 'ass_subscribed_users', 'a:1:{i:2;s:3:"dig";}'),
(143, 21, 'invite_status', 'members'),
(144, 21, 'forum_id', 'a:1:{i:0;i:452;}'),
(145, 21, '_bbp_forum_enabled_452', '1'),
(146, 22, 'total_member_count', '1'),
(147, 22, 'last_activity', '2015-07-24 14:55:44'),
(148, 22, 'ass_default_subscription', 'dig'),
(149, 22, 'ass_subscribed_users', 'a:1:{i:2;s:3:"dig";}'),
(150, 22, 'invite_status', 'members'),
(151, 22, 'forum_id', 'a:1:{i:0;i:453;}'),
(152, 22, '_bbp_forum_enabled_453', '1'),
(153, 23, 'total_member_count', '1'),
(154, 23, 'last_activity', '2015-07-24 14:58:42'),
(155, 23, 'invite_status', 'members'),
(156, 23, 'forum_id', 'a:1:{i:0;i:454;}'),
(157, 23, '_bbp_forum_enabled_454', '1');

-- --------------------------------------------------------

--
-- Estructura de la taula `wp_bp_groups_members`
--

CREATE TABLE IF NOT EXISTS `wp_bp_groups_members` (
`id` bigint(20) NOT NULL,
  `group_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `inviter_id` bigint(20) NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  `is_mod` tinyint(1) NOT NULL DEFAULT '0',
  `user_title` varchar(100) NOT NULL,
  `date_modified` datetime NOT NULL,
  `comments` longtext NOT NULL,
  `is_confirmed` tinyint(1) NOT NULL DEFAULT '0',
  `is_banned` tinyint(1) NOT NULL DEFAULT '0',
  `invite_sent` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;

--
-- Bolcant dades de la taula `wp_bp_groups_members`
--

INSERT INTO `wp_bp_groups_members` (`id`, `group_id`, `user_id`, `inviter_id`, `is_admin`, `is_mod`, `user_title`, `date_modified`, `comments`, `is_confirmed`, `is_banned`, `invite_sent`) VALUES
(5, 3, 1, 0, 1, 0, 'Administrador/a del node', '2014-09-19 10:03:51', '', 1, 0, 0),
(6, 2, 1, 0, 1, 0, 'Administrador/a del node', '2014-09-19 10:04:43', '', 1, 0, 0),
(7, 1, 1, 0, 1, 0, 'Administrador/a del node', '2014-09-19 10:05:22', '', 1, 0, 0),
(8, 4, 1, 0, 1, 0, 'Administrador/a del node', '2014-09-19 16:14:59', '', 1, 0, 0),
(9, 5, 1, 0, 1, 0, 'Administrador/a del node', '2014-09-19 16:19:03', '', 1, 0, 0),
(10, 6, 1, 0, 1, 0, 'Administrador/a del node', '2014-09-19 16:26:06', '', 1, 0, 0),
(11, 7, 1, 0, 1, 0, 'Administrador/a del node', '2014-09-19 16:28:46', '', 1, 0, 0),
(12, 8, 1, 0, 1, 0, 'Administrador/a del node', '2014-09-19 16:31:09', '', 1, 0, 0),
(13, 9, 1, 0, 1, 0, 'Administrador/a del node', '2014-09-19 16:33:19', '', 1, 0, 0),
(14, 10, 1, 0, 1, 0, 'Administrador/a del node', '2014-09-19 16:39:17', '', 1, 0, 0),
(15, 11, 1, 0, 1, 0, 'Administrador/a del node', '2014-09-19 16:45:25', '', 1, 0, 0),
(16, 12, 1, 0, 1, 0, 'Administrador/a del node', '2014-09-19 16:49:53', '', 1, 0, 0),
(17, 13, 1, 0, 1, 0, 'Administrador/a del node', '2014-09-19 17:00:30', '', 1, 0, 0),
(19, 14, 1, 0, 1, 0, 'Administrador/a del node', '2014-09-22 14:13:54', '', 1, 0, 0),
(20, 15, 1, 0, 1, 0, 'Administrador/a del node', '2014-09-22 14:20:08', '', 1, 0, 0),
(21, 16, 1, 0, 1, 0, 'Administrador/a del node', '2014-09-22 14:27:10', '', 1, 0, 0),
(22, 17, 1, 0, 1, 0, 'Administrador/a del node', '2014-09-22 14:31:15', '', 1, 0, 0),
(23, 18, 1, 0, 1, 0, 'Administrador/a del node', '2014-09-22 14:52:27', '', 1, 0, 0),
(24, 19, 1, 0, 1, 0, 'Administrador/a del node', '2014-09-22 15:06:22', '', 1, 0, 0),
(25, 20, 1, 0, 1, 0, 'Administrador/a del node', '2015-07-24 14:53:01', '', 1, 0, 0),
(26, 21, 1, 0, 1, 0, 'Administrador/a del node', '2015-07-24 14:54:37', '', 1, 0, 0),
(27, 22, 1, 0, 1, 0, 'Administrador/a del node', '2015-07-24 14:55:35', '', 1, 0, 0),
(28, 23, 1, 0, 1, 0, 'Administrador/a del node', '2015-07-24 14:58:35', '', 1, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de la taula `wp_bp_messages_messages`
--

CREATE TABLE IF NOT EXISTS `wp_bp_messages_messages` (
`id` bigint(20) NOT NULL,
  `thread_id` bigint(20) NOT NULL,
  `sender_id` bigint(20) NOT NULL,
  `subject` varchar(200) NOT NULL,
  `message` longtext NOT NULL,
  `date_sent` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de la taula `wp_bp_messages_meta`
--

CREATE TABLE IF NOT EXISTS `wp_bp_messages_meta` (
`id` bigint(20) NOT NULL,
  `message_id` bigint(20) NOT NULL,
  `meta_key` varchar(255) DEFAULT NULL,
  `meta_value` longtext
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de la taula `wp_bp_messages_notices`
--

CREATE TABLE IF NOT EXISTS `wp_bp_messages_notices` (
`id` bigint(20) NOT NULL,
  `subject` varchar(200) NOT NULL,
  `message` longtext NOT NULL,
  `date_sent` datetime NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de la taula `wp_bp_messages_recipients`
--

CREATE TABLE IF NOT EXISTS `wp_bp_messages_recipients` (
`id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `thread_id` bigint(20) NOT NULL,
  `unread_count` int(10) NOT NULL DEFAULT '0',
  `sender_only` tinyint(1) NOT NULL DEFAULT '0',
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de la taula `wp_bp_mod_contents`
--

CREATE TABLE IF NOT EXISTS `wp_bp_mod_contents` (
`content_id` bigint(20) unsigned NOT NULL,
  `item_type` varchar(42) NOT NULL DEFAULT '',
  `item_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `item_id2` bigint(20) unsigned NOT NULL DEFAULT '0',
  `item_author` bigint(20) unsigned NOT NULL DEFAULT '0',
  `item_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `item_url` varchar(250) NOT NULL DEFAULT '',
  `status` enum('new','warned','ignored','moderated','edited','deleted') NOT NULL DEFAULT 'new'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de la taula `wp_bp_mod_flags`
--

CREATE TABLE IF NOT EXISTS `wp_bp_mod_flags` (
`flag_id` bigint(20) unsigned NOT NULL,
  `content_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `reporter_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de la taula `wp_bp_notifications`
--

CREATE TABLE IF NOT EXISTS `wp_bp_notifications` (
`id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `item_id` bigint(20) NOT NULL,
  `secondary_item_id` bigint(20) DEFAULT NULL,
  `component_name` varchar(75) NOT NULL,
  `component_action` varchar(75) NOT NULL,
  `date_notified` datetime NOT NULL,
  `is_new` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de la taula `wp_bp_notifications_meta`
--

CREATE TABLE IF NOT EXISTS `wp_bp_notifications_meta` (
`id` bigint(20) NOT NULL,
  `notification_id` bigint(20) NOT NULL,
  `meta_key` varchar(255) DEFAULT NULL,
  `meta_value` longtext
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de la taula `wp_bp_xprofile_data`
--

CREATE TABLE IF NOT EXISTS `wp_bp_xprofile_data` (
`id` bigint(20) unsigned NOT NULL,
  `field_id` bigint(20) unsigned NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `value` longtext NOT NULL,
  `last_updated` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Bolcant dades de la taula `wp_bp_xprofile_data`
--

INSERT INTO `wp_bp_xprofile_data` (`id`, `field_id`, `user_id`, `value`, `last_updated`) VALUES
(1, 1, 2, 'xtecadmin', '2015-10-27 10:47:47'),
(2, 1, 1, 'admin', '2016-03-29 11:48:22');

-- --------------------------------------------------------

--
-- Estructura de la taula `wp_bp_xprofile_fields`
--

CREATE TABLE IF NOT EXISTS `wp_bp_xprofile_fields` (
`id` bigint(20) unsigned NOT NULL,
  `group_id` bigint(20) unsigned NOT NULL,
  `parent_id` bigint(20) unsigned NOT NULL,
  `type` varchar(150) NOT NULL,
  `name` varchar(150) NOT NULL,
  `description` longtext NOT NULL,
  `is_required` tinyint(1) NOT NULL DEFAULT '0',
  `is_default_option` tinyint(1) NOT NULL DEFAULT '0',
  `field_order` bigint(20) NOT NULL DEFAULT '0',
  `option_order` bigint(20) NOT NULL DEFAULT '0',
  `order_by` varchar(15) NOT NULL DEFAULT '',
  `can_delete` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Bolcant dades de la taula `wp_bp_xprofile_fields`
--

INSERT INTO `wp_bp_xprofile_fields` (`id`, `group_id`, `parent_id`, `type`, `name`, `description`, `is_required`, `is_default_option`, `field_order`, `option_order`, `order_by`, `can_delete`) VALUES
(1, 1, 0, 'textbox', 'Name', '', 1, 0, 0, 0, '', 0);

-- --------------------------------------------------------

--
-- Estructura de la taula `wp_bp_xprofile_groups`
--

CREATE TABLE IF NOT EXISTS `wp_bp_xprofile_groups` (
`id` bigint(20) unsigned NOT NULL,
  `name` varchar(150) NOT NULL,
  `description` mediumtext NOT NULL,
  `group_order` bigint(20) NOT NULL DEFAULT '0',
  `can_delete` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Bolcant dades de la taula `wp_bp_xprofile_groups`
--

INSERT INTO `wp_bp_xprofile_groups` (`id`, `name`, `description`, `group_order`, `can_delete`) VALUES
(1, 'Base', '', 0, 0);

-- --------------------------------------------------------

--
-- Estructura de la taula `wp_bp_xprofile_meta`
--

CREATE TABLE IF NOT EXISTS `wp_bp_xprofile_meta` (
`id` bigint(20) NOT NULL,
  `object_id` bigint(20) NOT NULL,
  `object_type` varchar(150) NOT NULL,
  `meta_key` varchar(255) DEFAULT NULL,
  `meta_value` longtext
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de la taula `wp_commentmeta`
--

CREATE TABLE IF NOT EXISTS `wp_commentmeta` (
`meta_id` bigint(20) unsigned NOT NULL,
  `comment_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `meta_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_value` longtext COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de la taula `wp_comments`
--

CREATE TABLE IF NOT EXISTS `wp_comments` (
`comment_ID` bigint(20) unsigned NOT NULL,
  `comment_post_ID` bigint(20) unsigned NOT NULL DEFAULT '0',
  `comment_author` tinytext COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment_author_email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `comment_author_url` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `comment_author_IP` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `comment_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `comment_date_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `comment_content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment_karma` int(11) NOT NULL DEFAULT '0',
  `comment_approved` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `comment_agent` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `comment_type` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `comment_parent` bigint(20) unsigned NOT NULL DEFAULT '0',
  `user_id` bigint(20) unsigned NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de la taula `wp_ig_blocked_emails`
--

CREATE TABLE IF NOT EXISTS `wp_ig_blocked_emails` (
  `id` int(10) NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ip` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de la taula `wp_ig_campaigns`
--

CREATE TABLE IF NOT EXISTS `wp_ig_campaigns` (
`id` int(10) NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `from_name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `from_email` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reply_to_name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reply_to_email` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sequence_ids` text COLLATE utf8mb4_unicode_ci,
  `categories` text COLLATE utf8mb4_unicode_ci,
  `list_ids` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `base_template_id` int(10) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Bolcant dades de la taula `wp_ig_campaigns`
--

INSERT INTO `wp_ig_campaigns` (`id`, `slug`, `name`, `type`, `from_name`, `from_email`, `reply_to_name`, `reply_to_email`, `sequence_ids`, `categories`, `list_ids`, `base_template_id`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'sha-publicat-un-article-nou-posttitle', 'S''ha publicat un article nou:  {{POSTTITLE}}', 'post_notification', 'Admin', 'a8000006@xtec.cat', 'Admin', 'a8000006@xtec.cat', '', '####Portada## ##', '1', 459, 1, '2019-05-13 07:44:20', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de la taula `wp_ig_contacts`
--

CREATE TABLE IF NOT EXISTS `wp_ig_contacts` (
`id` int(10) NOT NULL,
  `wp_user_id` int(10) NOT NULL DEFAULT '0',
  `first_name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `source` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `form_id` int(10) NOT NULL DEFAULT '0',
  `status` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unsubscribed` tinyint(1) NOT NULL DEFAULT '0',
  `hash` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `is_verified` tinyint(1) DEFAULT '0',
  `is_disposable` tinyint(1) DEFAULT '0',
  `is_rolebased` tinyint(1) DEFAULT '0',
  `is_webmail` tinyint(1) DEFAULT '0',
  `is_deliverable` tinyint(1) DEFAULT '0',
  `is_sendsafely` tinyint(1) DEFAULT '0',
  `meta` longtext CHARACTER SET utf8
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Bolcant dades de la taula `wp_ig_contacts`
--

INSERT INTO `wp_ig_contacts` (`id`, `wp_user_id`, `first_name`, `last_name`, `email`, `source`, `form_id`, `status`, `unsubscribed`, `hash`, `created_at`, `updated_at`, `is_verified`, `is_disposable`, `is_rolebased`, `is_webmail`, `is_deliverable`, `is_sendsafely`, `meta`) VALUES
(1, 1, 'a8000010@xtec.cat', '', 'a8000010@xtec.cat', 'admin', 0, 'verified', 0, 'mluqjh-qdfplw-bxslea-lwcdnq-xwgtuo', '2019-05-13 07:43:31', '0000-00-00 00:00:00', 1, 0, 0, 0, 1, 1, '');

-- --------------------------------------------------------

--
-- Estructura de la taula `wp_ig_contacts_ips`
--

CREATE TABLE IF NOT EXISTS `wp_ig_contacts_ips` (
  `ip` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de la taula `wp_ig_forms`
--

CREATE TABLE IF NOT EXISTS `wp_ig_forms` (
`id` int(10) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `body` longtext COLLATE utf8mb4_unicode_ci,
  `settings` longtext COLLATE utf8mb4_unicode_ci,
  `styles` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `af_id` int(10) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Bolcant dades de la taula `wp_ig_forms`
--

INSERT INTO `wp_ig_forms` (`id`, `name`, `body`, `settings`, `styles`, `created_at`, `updated_at`, `deleted_at`, `af_id`) VALUES
(1, 'Widget - Subscripció de correu', 'a:4:{i:0;a:5:{s:4:"type";s:4:"text";s:4:"name";s:4:"Name";s:2:"id";s:4:"name";s:6:"params";a:3:{s:5:"label";s:4:"Name";s:4:"show";b:1;s:8:"required";b:0;}s:8:"position";i:1;}i:1;a:5:{s:4:"type";s:4:"text";s:4:"name";s:5:"Email";s:2:"id";s:5:"email";s:6:"params";a:3:{s:5:"label";s:5:"Email";s:4:"show";b:1;s:8:"required";b:1;}s:8:"position";i:2;}i:2;a:5:{s:4:"type";s:8:"checkbox";s:4:"name";s:5:"Lists";s:2:"id";s:5:"lists";s:6:"params";a:4:{s:5:"label";s:5:"Lists";s:4:"show";b:0;s:8:"required";b:1;s:6:"values";a:1:{i:0;s:1:"1";}}s:8:"position";i:3;}i:3;a:5:{s:4:"type";s:6:"submit";s:4:"name";s:6:"submit";s:2:"id";s:6:"submit";s:6:"params";a:2:{s:5:"label";s:6:"Submit";s:4:"show";b:1;}s:8:"position";i:4;}}', 'a:2:{s:5:"lists";a:1:{i:0;s:1:"1";}s:4:"desc";s:35:"T''avisarem si hi ha notícies noves";}', NULL, '2019-05-13 07:44:20', NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Estructura de la taula `wp_ig_lists`
--

CREATE TABLE IF NOT EXISTS `wp_ig_lists` (
`id` int(10) NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Bolcant dades de la taula `wp_ig_lists`
--

INSERT INTO `wp_ig_lists` (`id`, `slug`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'portada', 'Portada', '2019-05-13 07:44:20', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de la taula `wp_ig_lists_contacts`
--

CREATE TABLE IF NOT EXISTS `wp_ig_lists_contacts` (
`id` int(10) NOT NULL,
  `list_id` int(10) NOT NULL,
  `contact_id` int(10) NOT NULL,
  `status` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `optin_type` tinyint(4) NOT NULL,
  `subscribed_at` datetime DEFAULT NULL,
  `subscribed_ip` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unsubscribed_at` datetime DEFAULT NULL,
  `unsubscribed_ip` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Bolcant dades de la taula `wp_ig_lists_contacts`
--

INSERT INTO `wp_ig_lists_contacts` (`id`, `list_id`, `contact_id`, `status`, `optin_type`, `subscribed_at`, `subscribed_ip`, `unsubscribed_at`, `unsubscribed_ip`) VALUES
(1, 1, 1, 'subscribed', 2, '2016-04-05 11:55:56', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de la taula `wp_ig_mailing_queue`
--

CREATE TABLE IF NOT EXISTS `wp_ig_mailing_queue` (
`id` int(10) NOT NULL,
  `hash` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `campaign_id` int(10) NOT NULL DEFAULT '0',
  `subject` text COLLATE utf8mb4_unicode_ci,
  `body` longtext COLLATE utf8mb4_unicode_ci,
  `count` int(10) unsigned NOT NULL DEFAULT '0',
  `status` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_at` datetime DEFAULT NULL,
  `finish_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de la taula `wp_ig_sending_queue`
--

CREATE TABLE IF NOT EXISTS `wp_ig_sending_queue` (
`id` int(10) NOT NULL,
  `mailing_queue_id` int(10) NOT NULL DEFAULT '0',
  `mailing_queue_hash` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `campaign_id` int(10) NOT NULL DEFAULT '0',
  `contact_id` int(10) NOT NULL DEFAULT '0',
  `contact_hash` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `links` longtext COLLATE utf8mb4_unicode_ci,
  `opened` int(1) DEFAULT NULL,
  `sent_at` datetime DEFAULT NULL,
  `opened_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de la taula `wp_links`
--

CREATE TABLE IF NOT EXISTS `wp_links` (
`link_id` bigint(20) unsigned NOT NULL,
  `link_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `link_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `link_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `link_target` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `link_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `link_visible` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Y',
  `link_owner` bigint(20) unsigned NOT NULL DEFAULT '1',
  `link_rating` int(11) NOT NULL DEFAULT '0',
  `link_updated` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `link_rel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `link_notes` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `link_rss` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de la taula `wp_options`
--

CREATE TABLE IF NOT EXISTS `wp_options` (
`option_id` bigint(20) unsigned NOT NULL,
  `option_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `option_value` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `autoload` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'yes'
) ENGINE=InnoDB AUTO_INCREMENT=9655 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Bolcant dades de la taula `wp_options`
--

INSERT INTO `wp_options` (`option_id`, `option_name`, `option_value`, `autoload`) VALUES
(1, 'siteurl', 'https://pwc-int.educacio.intranet/agora/masterzer', 'yes'),
(2, 'blogname', 'ZER L&#039;Arany', 'yes'),
(3, 'blogdescription', 'Localitat 1Localitat 2Localitat 3Localitat 4', 'yes'),
(4, 'users_can_register', '0', 'yes'),
(5, 'admin_email', 'a8000010@xtec.cat', 'yes'),
(6, 'start_of_week', '1', 'yes'),
(7, 'use_balanceTags', '', 'yes'),
(8, 'use_smilies', '1', 'yes'),
(9, 'require_name_email', '1', 'yes'),
(10, 'comments_notify', '1', 'yes'),
(11, 'posts_per_rss', '10', 'yes'),
(12, 'rss_use_excerpt', '0', 'yes'),
(13, 'mailserver_url', 'mail.example.com', 'yes'),
(14, 'mailserver_login', 'login@example.com', 'yes'),
(15, 'mailserver_pass', 'password', 'yes'),
(16, 'mailserver_port', '110', 'yes'),
(17, 'default_category', '1', 'yes'),
(18, 'default_comment_status', 'open', 'yes'),
(19, 'default_ping_status', 'closed', 'yes'),
(20, 'default_pingback_flag', '', 'yes'),
(21, 'posts_per_page', '10', 'yes'),
(22, 'date_format', 'd/m/Y', 'yes'),
(23, 'time_format', 'G:i', 'yes'),
(24, 'links_updated_date_format', 'j \\d\\e F \\d\\e Y G:i', 'yes'),
(25, 'comment_moderation', '', 'yes'),
(26, 'moderation_notify', '1', 'yes'),
(27, 'permalink_structure', '/%category%/%postname%/', 'yes'),
(29, 'hack_file', '0', 'yes'),
(30, 'blog_charset', 'UTF-8', 'yes'),
(31, 'moderation_keys', '', 'no'),
(32, 'active_plugins', 'a:33:{i:0;s:25:"add-to-any/add-to-any.php";i:1;s:42:"bbpress-enable-tinymce-visual-tab/init.php";i:2;s:19:"bbpress/bbpress.php";i:3;s:37:"blogger-importer/blogger-importer.php";i:4;s:33:"buddypress-activity-plus/bpfb.php";i:5;s:26:"buddypress-docs/loader.php";i:6;s:64:"buddypress-group-email-subscription/bp-activity-subscription.php";i:7;s:34:"buddypress-like/bp-like-loader.php";i:8;s:24:"buddypress/bp-loader.php";i:9;s:39:"disable-gutenberg/disable-gutenberg.php";i:10;s:39:"email-subscribers/email-subscribers.php";i:11;s:41:"enllacos-educatius/enllacos-educatius.php";i:12;s:43:"google-analyticator/google-analyticator.php";i:13;s:49:"google-calendar-events/google-calendar-events.php";i:14;s:27:"grup-classe/grup_classe.php";i:15;s:67:"import-users-from-csv-with-meta/import-users-from-csv-with-meta.php";i:16;s:31:"invite-anyone/invite-anyone.php";i:17;s:69:"pending-submission-notifications/pending-submission-notifications.php";i:18;s:27:"private-bp-pages/loader.php";i:19;s:25:"slideshare/slideshare.php";i:20;s:44:"slideshow-jquery-image-gallery/slideshow.php";i:21;s:27:"socialmedia/socialmedia.php";i:22;s:30:"table-of-contents-plus/toc.php";i:23;s:37:"tinymce-advanced/tinymce-advanced.php";i:24;s:71:"widget-visibility-without-jetpack/widget-visibility-without-jetpack.php";i:25;s:41:"wordpress-importer/wordpress-importer.php";i:26;s:42:"wordpress-social-login/wp-social-login.php";i:27;s:33:"wordpress-telegram/wptelegram.php";i:28;s:29:"wp-recaptcha/wp-recaptcha.php";i:29;s:29:"xtec-booking/xtec-booking.php";i:30;s:35:"xtec-ldap-login/xtec-ldap-login.php";i:31;s:23:"xtec-mail/xtec-mail.php";i:32;s:25:"xtec-stats/xtec-stats.php";}', 'yes'),
(33, 'home', 'https://pwc-int.educacio.intranet/agora/masterzer', 'yes'),
(34, 'category_base', '/categoria', 'yes'),
(35, 'ping_sites', 'http://rpc.pingomatic.com/', 'yes'),
(37, 'comment_max_links', '3', 'yes'),
(38, 'gmt_offset', '', 'yes'),
(39, 'default_email_category', '1', 'yes'),
(40, 'recently_edited', '', 'no'),
(41, 'template', 'reactor', 'yes'),
(42, 'stylesheet', 'reactor-primaria-1', 'yes'),
(43, 'comment_whitelist', '1', 'yes'),
(44, 'blacklist_keys', '', 'no'),
(45, 'comment_registration', '', 'yes'),
(46, 'html_type', 'text/html', 'yes'),
(47, 'use_trackback', '0', 'yes'),
(48, 'default_role', 'subscriber', 'yes'),
(49, 'db_version', '44719', 'yes'),
(50, 'uploads_use_yearmonth_folders', '1', 'yes'),
(51, 'upload_path', '', 'yes'),
(52, 'blog_public', '1', 'yes'),
(53, 'default_link_category', '0', 'yes'),
(54, 'show_on_front', 'posts', 'yes'),
(55, 'tag_base', '', 'yes'),
(56, 'show_avatars', '1', 'yes'),
(57, 'avatar_rating', 'G', 'yes'),
(58, 'upload_url_path', '', 'yes'),
(59, 'thumbnail_size_w', '150', 'yes'),
(60, 'thumbnail_size_h', '150', 'yes'),
(61, 'thumbnail_crop', '1', 'yes'),
(62, 'medium_size_w', '300', 'yes'),
(63, 'medium_size_h', '300', 'yes'),
(64, 'avatar_default', 'mystery', 'yes'),
(65, 'large_size_w', '1024', 'yes'),
(66, 'large_size_h', '1024', 'yes'),
(67, 'image_default_link_type', 'file', 'yes'),
(68, 'image_default_size', '', 'yes'),
(69, 'image_default_align', '', 'yes'),
(70, 'close_comments_for_old_posts', '', 'yes'),
(71, 'close_comments_days_old', '14', 'yes'),
(72, 'thread_comments', '1', 'yes'),
(73, 'thread_comments_depth', '5', 'yes'),
(74, 'page_comments', '', 'yes'),
(75, 'comments_per_page', '50', 'yes'),
(76, 'default_comments_page', 'newest', 'yes'),
(77, 'comment_order', 'asc', 'yes'),
(78, 'sticky_posts', 'a:0:{}', 'yes'),
(79, 'widget_categories', 'a:2:{s:12:"_multiwidget";i:1;i:1;a:0:{}}', 'yes'),
(80, 'widget_text', 'a:12:{i:1;a:0:{}i:2;a:4:{s:5:"title";s:0:"";s:4:"text";s:431:"<a class="twitter-timeline" href="https://twitter.com/institut_larany" data-widget-id="512216549814333440">Tuits de @institut_larany</a>\r\n<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?''http'':''https'';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>";s:6:"filter";b:0;s:10:"conditions";a:2:{s:6:"action";s:4:"show";s:5:"rules";a:4:{i:0;a:2:{s:5:"major";s:8:"category";s:5:"minor";s:2:"59";}i:1;a:2:{s:5:"major";s:8:"category";s:5:"minor";s:2:"68";}i:2;a:2:{s:5:"major";s:8:"category";s:5:"minor";s:2:"70";}i:3;a:2:{s:5:"major";s:8:"category";s:5:"minor";s:2:"69";}}}}i:3;a:4:{s:5:"title";s:15:"Blog de l''AMPA ";s:4:"text";s:324:"Aquí podeu trobar les últimes noticies de l''AMPA.\r\n\r\nPer contactar amb l''AMPA: \r\n\r\n<strong>Email:</strong>\r\nampa@zer-larany.cat\r\n\r\n<strong>Telèfon:</strong>\r\n123 45 67 89\r\n\r\nSi voleu saber qui forma part de l''AMPA i les seves funcions feu clic <a href="https://pwc-int.educacio.intranet/agora/masterzer/ampa/">aquí</a>. ";s:6:"filter";b:1;s:10:"conditions";a:2:{s:6:"action";s:4:"show";s:5:"rules";a:4:{i:0;a:2:{s:5:"major";s:8:"category";s:5:"minor";s:2:"31";}i:1;a:2:{s:5:"major";s:8:"category";s:5:"minor";s:2:"78";}i:2;a:2:{s:5:"major";s:8:"category";s:5:"minor";s:2:"77";}i:3;a:2:{s:5:"major";s:8:"category";s:5:"minor";s:2:"76";}}}}i:19;a:3:{s:5:"title";s:0:"";s:4:"text";s:0:"";s:6:"filter";b:0;}i:21;a:4:{s:5:"title";s:0:"";s:4:"text";s:145:"<i class="fa fa-file-text-o fa-5x"></i>\r\n\r\nAquí podeu trobar els documents normatius i de referència comuns a totes les escoles de la ZER. \r\n\r\n";s:6:"filter";b:1;s:10:"conditions";a:2:{s:6:"action";s:4:"show";s:5:"rules";a:1:{i:0;a:2:{s:5:"major";s:4:"page";s:5:"minor";s:10:"docs-index";}}}}i:22;a:4:{s:5:"title";s:0:"";s:4:"text";s:274:"<div style="text-align:center">\r\n<img width=100px src=https://pwc-int.educacio.intranet/agora/masterzer/wp-content/uploads/usu10/2015/07/Selecció_999374.png>\r\n\r\n<strong>Escola Alfa</strong>\r\nPlaça de la Vila, 14\r\n01234 Abella de Xerta \r\n<strong>12 345 678</strong>\r\n</div>";s:6:"filter";b:1;s:10:"conditions";a:2:{s:6:"action";s:4:"show";s:5:"rules";a:1:{i:0;a:2:{s:5:"major";s:8:"category";s:5:"minor";s:2:"59";}}}}i:23;a:4:{s:5:"title";s:0:"";s:4:"text";s:274:"<div style="text-align:center">\r\n<img width=100px src=https://pwc-int.educacio.intranet/agora/masterzer/wp-content/uploads/usu10/2015/07/Selecció_999371.png>\r\n\r\n<strong>Escola Beta</strong>\r\nPlaça de la Vila, 14\r\n01234 Abella de Xerta \r\n<strong>12 345 678</strong>\r\n</div>";s:6:"filter";b:1;s:10:"conditions";a:2:{s:6:"action";s:4:"show";s:5:"rules";a:1:{i:0;a:2:{s:5:"major";s:8:"category";s:5:"minor";s:2:"68";}}}}i:24;a:4:{s:5:"title";s:0:"";s:4:"text";s:275:"<div style="text-align:center">\r\n<img width=100px src=https://pwc-int.educacio.intranet/agora/masterzer/wp-content/uploads/usu10/2015/07/Selecció_999373.png>\r\n\r\n<strong>Escola Gamma</strong>\r\nPlaça de la Vila, 14\r\n01234 Abella de Xerta \r\n<strong>12 345 678</strong>\r\n</div>";s:6:"filter";b:1;s:10:"conditions";a:2:{s:6:"action";s:4:"show";s:5:"rules";a:1:{i:0;a:2:{s:5:"major";s:8:"category";s:5:"minor";s:2:"69";}}}}i:25;a:4:{s:5:"title";s:0:"";s:4:"text";s:277:"<div style="text-align:center">\r\n<img width=100px src=https://pwc-int.educacio.intranet/agora/masterzer/wp-content/uploads/usu10/2015/07/Selecció_999372.png>\r\n\r\n<strong>Escola Epsilon</strong>\r\nPlaça de la Vila, 14\r\n01234 Abella de Xerta \r\n<strong>12 345 678</strong>\r\n</div>";s:6:"filter";b:1;s:10:"conditions";a:2:{s:6:"action";s:4:"show";s:5:"rules";a:1:{i:0;a:2:{s:5:"major";s:8:"category";s:5:"minor";s:2:"70";}}}}i:26;a:4:{s:5:"title";s:5:"Ginys";s:4:"text";s:159:"Podeu personalitzar aquesta barra amb els ginys que vulgueu. Podeu triar quins ginys es poden veure a cada categoria amb el botó Visibilitat (al peu del giny)";s:6:"filter";b:1;s:10:"conditions";a:2:{s:6:"action";s:4:"hide";s:5:"rules";a:4:{i:0;a:2:{s:5:"major";s:8:"category";s:5:"minor";s:2:"59";}i:1;a:2:{s:5:"major";s:8:"category";s:5:"minor";s:2:"68";}i:2;a:2:{s:5:"major";s:8:"category";s:5:"minor";s:2:"70";}i:3;a:2:{s:5:"major";s:8:"category";s:5:"minor";s:2:"69";}}}}s:12:"_multiwidget";i:1;i:28;a:0:{}}', 'yes'),
(81, 'widget_rss', 'a:2:{i:1;a:0:{}s:12:"_multiwidget";i:1;}', 'yes'),
(82, 'uninstall_plugins', 'a:0:{}', 'no'),
(83, 'timezone_string', 'Europe/Madrid', 'yes'),
(84, 'page_for_posts', '0', 'yes'),
(85, 'page_on_front', '0', 'yes'),
(86, 'default_post_format', '0', 'yes'),
(87, 'link_manager_enabled', '0', 'yes'),
(88, 'initial_db_version', '27916', 'yes'),
(89, 'wp_user_roles', 'a:11:{s:13:"administrator";a:2:{s:4:"name";s:13:"Administrator";s:12:"capabilities";a:70:{s:13:"switch_themes";b:1;s:11:"edit_themes";b:1;s:16:"activate_plugins";b:1;s:12:"edit_plugins";b:1;s:10:"edit_users";b:1;s:10:"edit_files";b:1;s:14:"manage_options";b:1;s:17:"moderate_comments";b:1;s:17:"manage_categories";b:1;s:12:"manage_links";b:1;s:12:"upload_files";b:1;s:6:"import";b:1;s:15:"unfiltered_html";b:1;s:10:"edit_posts";b:1;s:17:"edit_others_posts";b:1;s:20:"edit_published_posts";b:1;s:13:"publish_posts";b:1;s:10:"edit_pages";b:1;s:4:"read";b:1;s:8:"level_10";b:1;s:7:"level_9";b:1;s:7:"level_8";b:1;s:7:"level_7";b:1;s:7:"level_6";b:1;s:7:"level_5";b:1;s:7:"level_4";b:1;s:7:"level_3";b:1;s:7:"level_2";b:1;s:7:"level_1";b:1;s:7:"level_0";b:1;s:17:"edit_others_pages";b:1;s:20:"edit_published_pages";b:1;s:13:"publish_pages";b:1;s:12:"delete_pages";b:1;s:19:"delete_others_pages";b:1;s:22:"delete_published_pages";b:1;s:12:"delete_posts";b:1;s:19:"delete_others_posts";b:1;s:22:"delete_published_posts";b:1;s:20:"delete_private_posts";b:1;s:18:"edit_private_posts";b:1;s:18:"read_private_posts";b:1;s:20:"delete_private_pages";b:1;s:18:"edit_private_pages";b:1;s:18:"read_private_pages";b:1;s:12:"delete_users";b:1;s:12:"create_users";b:1;s:17:"unfiltered_upload";b:1;s:14:"edit_dashboard";b:1;s:14:"update_plugins";b:1;s:14:"delete_plugins";b:1;s:15:"install_plugins";b:1;s:13:"update_themes";b:1;s:14:"install_themes";b:1;s:11:"update_core";b:1;s:10:"list_users";b:1;s:12:"remove_users";b:1;s:13:"promote_users";b:1;s:18:"edit_theme_options";b:1;s:13:"delete_themes";b:1;s:6:"export";b:1;s:45:"slideshow-jquery-image-gallery-add-slideshows";b:1;s:46:"slideshow-jquery-image-gallery-edit-slideshows";b:1;s:48:"slideshow-jquery-image-gallery-delete-slideshows";b:1;s:19:"edit_posts_bookings";b:1;s:21:"delete_posts_bookings";b:1;s:21:"delete_pages_bookings";b:1;s:22:"publish_posts_bookings";b:1;s:29:"edit_published_posts_bookings";b:1;s:31:"delete_published_posts_bookings";b:1;}}s:6:"editor";a:2:{s:4:"name";s:6:"Editor";s:12:"capabilities";a:43:{s:17:"moderate_comments";b:1;s:17:"manage_categories";b:1;s:12:"manage_links";b:1;s:12:"upload_files";b:1;s:15:"unfiltered_html";b:1;s:10:"edit_posts";b:1;s:17:"edit_others_posts";b:1;s:20:"edit_published_posts";b:1;s:13:"publish_posts";b:1;s:10:"edit_pages";b:1;s:4:"read";b:1;s:7:"level_7";b:1;s:7:"level_6";b:1;s:7:"level_5";b:1;s:7:"level_4";b:1;s:7:"level_3";b:1;s:7:"level_2";b:1;s:7:"level_1";b:1;s:7:"level_0";b:1;s:17:"edit_others_pages";b:1;s:20:"edit_published_pages";b:1;s:13:"publish_pages";b:1;s:12:"delete_pages";b:1;s:19:"delete_others_pages";b:1;s:22:"delete_published_pages";b:1;s:12:"delete_posts";b:1;s:19:"delete_others_posts";b:1;s:22:"delete_published_posts";b:1;s:20:"delete_private_posts";b:1;s:18:"edit_private_posts";b:1;s:18:"read_private_posts";b:1;s:20:"delete_private_pages";b:1;s:18:"edit_private_pages";b:1;s:18:"read_private_pages";b:1;s:45:"slideshow-jquery-image-gallery-add-slideshows";b:1;s:46:"slideshow-jquery-image-gallery-edit-slideshows";b:1;s:48:"slideshow-jquery-image-gallery-delete-slideshows";b:1;s:19:"edit_posts_bookings";b:1;s:21:"delete_posts_bookings";b:1;s:21:"delete_pages_bookings";b:1;s:22:"publish_posts_bookings";b:1;s:29:"edit_published_posts_bookings";b:1;s:31:"delete_published_posts_bookings";b:1;}}s:6:"author";a:2:{s:4:"name";s:6:"Author";s:12:"capabilities";a:20:{s:12:"upload_files";b:1;s:10:"edit_posts";b:1;s:20:"edit_published_posts";b:1;s:13:"publish_posts";b:1;s:4:"read";b:1;s:7:"level_2";b:1;s:7:"level_1";b:1;s:7:"level_0";b:1;s:12:"delete_posts";b:1;s:22:"delete_published_posts";b:1;s:45:"slideshow-jquery-image-gallery-add-slideshows";b:1;s:46:"slideshow-jquery-image-gallery-edit-slideshows";b:1;s:48:"slideshow-jquery-image-gallery-delete-slideshows";b:1;s:21:"delete_pages_bookings";b:1;s:19:"edit_posts_bookings";b:1;s:21:"delete_posts_bookings";b:1;s:22:"publish_posts_bookings";b:1;s:12:"delete_pages";b:1;s:29:"edit_published_posts_bookings";b:1;s:31:"delete_published_posts_bookings";b:1;}}s:11:"contributor";a:2:{s:4:"name";s:11:"Contributor";s:12:"capabilities";a:8:{s:10:"edit_posts";b:1;s:4:"read";b:1;s:7:"level_1";b:1;s:7:"level_0";b:1;s:12:"delete_posts";b:1;s:12:"upload_files";b:1;s:21:"delete_pages_bookings";b:1;s:12:"delete_pages";b:1;}}s:10:"subscriber";a:2:{s:4:"name";s:10:"Subscriber";s:12:"capabilities";a:2:{s:4:"read";b:1;s:7:"level_0";b:1;}}s:13:"bbp_keymaster";a:2:{s:4:"name";s:9:"Keymaster";s:12:"capabilities";a:29:{s:9:"keep_gate";b:1;s:8:"spectate";b:1;s:11:"participate";b:1;s:8:"moderate";b:1;s:8:"throttle";b:1;s:10:"view_trash";b:1;s:14:"publish_forums";b:1;s:11:"edit_forums";b:1;s:18:"edit_others_forums";b:1;s:13:"delete_forums";b:1;s:20:"delete_others_forums";b:1;s:19:"read_private_forums";b:1;s:18:"read_hidden_forums";b:1;s:14:"publish_topics";b:1;s:11:"edit_topics";b:1;s:18:"edit_others_topics";b:1;s:13:"delete_topics";b:1;s:20:"delete_others_topics";b:1;s:19:"read_private_topics";b:1;s:15:"publish_replies";b:1;s:12:"edit_replies";b:1;s:19:"edit_others_replies";b:1;s:14:"delete_replies";b:1;s:21:"delete_others_replies";b:1;s:20:"read_private_replies";b:1;s:17:"manage_topic_tags";b:1;s:15:"edit_topic_tags";b:1;s:17:"delete_topic_tags";b:1;s:17:"assign_topic_tags";b:1;}}s:13:"bbp_spectator";a:2:{s:4:"name";s:9:"Spectator";s:12:"capabilities";a:1:{s:8:"spectate";b:1;}}s:11:"bbp_blocked";a:2:{s:4:"name";s:7:"Blocked";s:12:"capabilities";a:28:{s:8:"spectate";b:0;s:11:"participate";b:0;s:8:"moderate";b:0;s:8:"throttle";b:0;s:10:"view_trash";b:0;s:14:"publish_forums";b:0;s:11:"edit_forums";b:0;s:18:"edit_others_forums";b:0;s:13:"delete_forums";b:0;s:20:"delete_others_forums";b:0;s:19:"read_private_forums";b:0;s:18:"read_hidden_forums";b:0;s:14:"publish_topics";b:0;s:11:"edit_topics";b:0;s:18:"edit_others_topics";b:0;s:13:"delete_topics";b:0;s:20:"delete_others_topics";b:0;s:19:"read_private_topics";b:0;s:15:"publish_replies";b:0;s:12:"edit_replies";b:0;s:19:"edit_others_replies";b:0;s:14:"delete_replies";b:0;s:21:"delete_others_replies";b:0;s:20:"read_private_replies";b:0;s:17:"manage_topic_tags";b:0;s:15:"edit_topic_tags";b:0;s:17:"delete_topic_tags";b:0;s:17:"assign_topic_tags";b:0;}}s:13:"bbp_moderator";a:2:{s:4:"name";s:9:"Moderator";s:12:"capabilities";a:25:{s:8:"spectate";b:1;s:11:"participate";b:1;s:8:"moderate";b:1;s:8:"throttle";b:1;s:10:"view_trash";b:1;s:14:"publish_forums";b:1;s:11:"edit_forums";b:1;s:19:"read_private_forums";b:1;s:18:"read_hidden_forums";b:1;s:14:"publish_topics";b:1;s:11:"edit_topics";b:1;s:18:"edit_others_topics";b:1;s:13:"delete_topics";b:1;s:20:"delete_others_topics";b:1;s:19:"read_private_topics";b:1;s:15:"publish_replies";b:1;s:12:"edit_replies";b:1;s:19:"edit_others_replies";b:1;s:14:"delete_replies";b:1;s:21:"delete_others_replies";b:1;s:20:"read_private_replies";b:1;s:17:"manage_topic_tags";b:1;s:15:"edit_topic_tags";b:1;s:17:"delete_topic_tags";b:1;s:17:"assign_topic_tags";b:1;}}s:15:"bbp_participant";a:2:{s:4:"name";s:11:"Participant";s:12:"capabilities";a:8:{s:8:"spectate";b:1;s:11:"participate";b:1;s:19:"read_private_forums";b:1;s:14:"publish_topics";b:1;s:11:"edit_topics";b:1;s:15:"publish_replies";b:1;s:12:"edit_replies";b:1;s:17:"assign_topic_tags";b:1;}}s:12:"xtec_teacher";a:2:{s:4:"name";s:9:"Professor";s:12:"capabilities";a:13:{s:10:"edit_posts";b:1;s:4:"read";b:1;s:7:"level_1";b:1;s:7:"level_0";b:1;s:12:"delete_posts";b:1;s:12:"upload_files";b:1;s:12:"delete_pages";b:1;s:21:"delete_pages_bookings";b:1;s:19:"edit_posts_bookings";b:1;s:21:"delete_posts_bookings";b:1;s:22:"publish_posts_bookings";b:1;s:29:"edit_published_posts_bookings";b:1;s:31:"delete_published_posts_bookings";b:1;}}}', 'yes'),
(90, 'widget_search', 'a:2:{i:2;a:1:{s:5:"title";s:0:"";}s:12:"_multiwidget";i:1;}', 'yes'),
(91, 'widget_recent-posts', 'a:2:{i:2;a:4:{s:5:"title";s:16:"Articles recents";s:6:"number";i:5;s:7:"exclude";s:0:"";s:10:"conditions";a:2:{s:6:"action";s:4:"show";s:5:"rules";a:1:{i:0;a:2:{s:5:"major";s:4:"page";s:5:"minor";s:14:"post_type-post";}}}}s:12:"_multiwidget";i:1;}', 'yes'),
(92, 'widget_recent-comments', 'a:2:{i:2;a:3:{s:5:"title";s:18:"Comentaris recents";s:6:"number";i:5;s:10:"conditions";a:2:{s:6:"action";s:4:"show";s:5:"rules";a:1:{i:0;a:2:{s:5:"major";s:4:"page";s:5:"minor";s:14:"post_type-post";}}}}s:12:"_multiwidget";i:1;}', 'yes'),
(93, 'widget_archives', 'a:2:{i:2;a:4:{s:5:"title";s:0:"";s:5:"count";i:0;s:8:"dropdown";i:0;s:10:"conditions";a:2:{s:6:"action";s:4:"show";s:5:"rules";a:1:{i:0;a:2:{s:5:"major";s:4:"page";s:5:"minor";s:14:"post_type-post";}}}}s:12:"_multiwidget";i:1;}', 'yes'),
(94, 'widget_meta', 'a:2:{i:2;a:1:{s:5:"title";s:0:"";}s:12:"_multiwidget";i:1;}', 'yes'),
(95, 'sidebars_widgets', 'a:8:{s:19:"wp_inactive_widgets";a:0:{}s:9:"categoria";a:12:{i:0;s:7:"text-22";i:1;s:7:"text-23";i:2;s:7:"text-24";i:3;s:7:"text-25";i:4;s:12:"gce_widget-3";i:5;s:12:"gce_widget-4";i:6;s:12:"gce_widget-5";i:7;s:12:"gce_widget-6";i:8;s:6:"text-3";i:9;s:6:"text-2";i:10;s:7:"text-26";i:11;s:13:"xtec_widget-7";}s:7:"sidebar";a:10:{i:0;s:11:"nav_menu-10";i:1;s:17:"slideshowwidget-2";i:2;s:18:"bp_groups_widget-2";i:3;s:14:"recent-posts-2";i:4;s:17:"recent-comments-2";i:5;s:11:"tag_cloud-3";i:6;s:10:"archives-2";i:7;s:32:"bp_core_recently_active_widget-2";i:8;s:10:"nav_menu-6";i:9;s:7:"text-21";}s:9:"sidebar-2";a:0:{}s:17:"sidebar-frontpage";a:5:{i:0;s:20:"logo_centre_widget-2";i:1;s:12:"gce_widget-2";i:2;s:10:"nav_menu-8";i:3;s:13:"xtec_widget-6";i:4;s:19:"email-subscribers-2";}s:19:"sidebar-frontpage-2";a:0:{}s:14:"sidebar-footer";a:2:{i:0;s:7:"text-19";i:1;s:20:"logo_centre_widget-3";}s:13:"array_version";i:3;}', 'yes'),
(96, 'cron', 'a:7:{i:1537436620;a:3:{s:17:"wp_update_plugins";a:1:{s:32:"40cd750bba9870f18aada2478b24840a";a:3:{s:8:"schedule";s:10:"twicedaily";s:4:"args";a:0:{}s:8:"interval";i:43200;}}s:16:"wp_update_themes";a:1:{s:32:"40cd750bba9870f18aada2478b24840a";a:3:{s:8:"schedule";s:10:"twicedaily";s:4:"args";a:0:{}s:8:"interval";i:43200;}}s:16:"wp_version_check";a:1:{s:32:"40cd750bba9870f18aada2478b24840a";a:3:{s:8:"schedule";s:10:"twicedaily";s:4:"args";a:0:{}s:8:"interval";i:43200;}}}i:1537436626;a:1:{s:19:"wp_scheduled_delete";a:1:{s:32:"40cd750bba9870f18aada2478b24840a";a:3:{s:8:"schedule";s:5:"daily";s:4:"args";a:0:{}s:8:"interval";i:86400;}}}i:1537438363;a:1:{s:30:"wp_scheduled_auto_draft_delete";a:1:{s:32:"40cd750bba9870f18aada2478b24840a";a:3:{s:8:"schedule";s:5:"daily";s:4:"args";a:0:{}s:8:"interval";i:86400;}}}i:1537457650;a:1:{s:12:"remove_stats";a:1:{s:32:"40cd750bba9870f18aada2478b24840a";a:3:{s:8:"schedule";s:5:"daily";s:4:"args";a:0:{}s:8:"interval";i:86400;}}}i:1557733411;a:2:{s:34:"wp_privacy_delete_old_export_files";a:1:{s:32:"40cd750bba9870f18aada2478b24840a";a:3:{s:8:"schedule";s:6:"hourly";s:4:"args";a:0:{}s:8:"interval";i:3600;}}s:23:"ig_es_cron_fifteen_mins";a:1:{s:32:"cf0e8a89d4f4ec181b9babdf67a42e58";a:3:{s:8:"schedule";s:27:"ig_es_fifteen_mins_interval";s:4:"args";a:2:{i:0;s:4:"cron";i:1;s:34:"mrawnz-hgjsat-azgrpv-rwajym-zqgrmf";}s:8:"interval";i:900;}}}i:1557744426;a:1:{s:25:"delete_expired_transients";a:1:{s:32:"40cd750bba9870f18aada2478b24840a";a:3:{s:8:"schedule";s:5:"daily";s:4:"args";a:0:{}s:8:"interval";i:86400;}}}s:7:"version";i:2;}', 'yes'),
(118, 'recently_activated', 'a:0:{}', 'yes'),
(123, '_bbp_db_version', '250', 'yes'),
(124, 'bp-deactivated-components', 'a:0:{}', 'yes'),
(125, 'bb-config-location', '/dades/agora/html/wordpress/bb-config.php', 'yes'),
(126, 'bp-xprofile-base-group-name', 'Base', 'yes'),
(127, 'bp-xprofile-fullname-field-name', 'Name', 'yes'),
(128, 'bp-blogs-first-install', '', 'yes'),
(129, 'bp-disable-profile-sync', '0', 'yes'),
(130, 'hide-loggedout-adminbar', '0', 'yes'),
(131, 'bp-disable-avatar-uploads', '0', 'yes'),
(132, 'bp-disable-account-deletion', '1', 'yes'),
(133, 'bp-disable-blogforum-comments', '1', 'yes'),
(134, '_bp_theme_package_id', 'legacy', 'yes'),
(135, 'bp_restrict_group_creation', '1', 'yes'),
(136, '_bp_enable_akismet', '1', 'yes'),
(137, '_bp_enable_heartbeat_refresh', '1', 'yes'),
(138, '_bp_force_buddybar', '', 'yes'),
(139, '_bp_retain_bp_default', '', 'yes'),
(140, 'widget_bp_core_login_widget', 'a:2:{i:1;a:0:{}s:12:"_multiwidget";i:1;}', 'yes'),
(141, 'widget_bp_core_members_widget', 'a:2:{i:1;a:0:{}s:12:"_multiwidget";i:1;}', 'yes'),
(142, 'widget_bp_core_whos_online_widget', 'a:2:{i:1;a:0:{}s:12:"_multiwidget";i:1;}', 'yes'),
(143, 'widget_bp_core_recently_active_widget', 'a:3:{i:1;a:0:{}i:2;a:3:{s:5:"title";s:17:"Han entrat fa poc";s:11:"max_members";s:2:"50";s:10:"conditions";a:2:{s:6:"action";s:4:"show";s:5:"rules";a:1:{i:0;a:2:{s:5:"major";s:4:"page";s:5:"minor";s:1:"5";}}}}s:12:"_multiwidget";i:1;}', 'yes'),
(144, 'widget_bp_groups_widget', 'a:3:{i:1;a:0:{}i:2;a:5:{s:5:"title";s:5:"Nodes";s:10:"max_groups";s:2:"16";s:13:"group_default";s:6:"active";s:10:"link_title";b:1;s:10:"conditions";a:2:{s:6:"action";s:4:"show";s:5:"rules";a:5:{i:0;a:2:{s:5:"major";s:4:"page";s:5:"minor";s:2:"16";}i:1;a:2:{s:5:"major";s:4:"page";s:5:"minor";s:1:"6";}i:2;a:2:{s:5:"major";s:4:"page";s:5:"minor";s:8:"activity";}i:3;a:2:{s:5:"major";s:4:"page";s:5:"minor";s:5:"group";}i:4;a:2:{s:5:"major";s:4:"page";s:5:"minor";s:6:"member";}}}}s:12:"_multiwidget";i:1;}', 'yes'),
(145, 'widget_bp_messages_sitewide_notices_widget', '', 'yes'),
(150, 'registration', '0', 'yes'),
(151, 'bp-active-components', 'a:8:{s:8:"xprofile";s:1:"1";s:8:"settings";s:1:"1";s:7:"friends";s:1:"1";s:8:"messages";s:1:"1";s:8:"activity";s:1:"1";s:13:"notifications";s:1:"1";s:6:"groups";s:1:"1";s:7:"members";s:1:"1";}', 'yes'),
(152, 'bp-pages', 'a:5:{s:7:"members";i:6;s:8:"activity";i:5;s:6:"groups";i:16;s:8:"register";i:570;s:8:"activate";i:568;}', 'yes'),
(153, '_bp_db_version', '11105', 'yes'),
(157, 'bp_docs_attachment_protection', '1', 'yes'),
(158, 'ass_digest_time', 'a:2:{s:5:"hours";s:2:"05";s:7:"minutes";s:2:"00";}', 'yes'),
(159, 'ass_weekly_digest', '4', 'yes'),
(160, 'bp_like_db_version', '43', 'yes'),
(161, 'bp_like_settings', 'a:8:{s:17:"likers_visibility";N;s:23:"post_to_activity_stream";N;s:12:"show_excerpt";N;s:14:"excerpt_length";s:3:"140";s:12:"text_strings";a:29:{s:4:"like";a:2:{s:7:"default";s:8:"M''agrada";s:6:"custom";s:33:"<i class="fa fa-thumbs-o-up"></i>";}s:6:"unlike";a:2:{s:7:"default";s:11:"No m''agrada";s:6:"custom";s:31:"<i class="fa fa-thumbs-up"></i>";}s:14:"like_this_item";a:2:{s:7:"default";s:34:"Indica que aquest element m''agrada";s:6:"custom";s:34:"Indica que aquest element m''agrada";}s:16:"unlike_this_item";a:2:{s:7:"default";s:37:"Indica que aquest element no m''agrada";s:6:"custom";s:37:"Indica que aquest element no m''agrada";}s:10:"view_likes";a:2:{s:7:"default";s:19:"Mostra els m''agrada";s:6:"custom";s:19:"Mostra els m''agrada";}s:10:"hide_likes";a:2:{s:7:"default";s:18:"Amaga els m''agrada";s:6:"custom";s:18:"Amaga els m''agrada";}s:12:"update_likes";a:2:{s:7:"default";s:23:"Actualitza els m''agrada";s:6:"custom";s:23:"Actualitza els m''agrada";}s:19:"show_blogpost_likes";a:2:{s:7:"default";s:31:""M''agrada" d''enviaments de blog";s:6:"custom";s:31:""M''agrada" d''enviaments de blog";}s:17:"must_be_logged_in";a:2:{s:7:"default";s:53:"Heu d''estar autenticats per poder fer clic a m''agrada";s:6:"custom";s:53:"Heu d''estar autenticats per poder fer clic a m''agrada";}s:25:"record_activity_likes_own";a:2:{s:7:"default";s:79:"A %user% li ha agradat la seva pròpia <a href="%permalink%">actualització</a>";s:6:"custom";s:79:"A %user% li ha agradat la seva pròpia <a href="%permalink%">actualització</a>";}s:24:"record_activity_likes_an";a:2:{s:7:"default";s:67:"A %user% li ha agradat una <a href="%permalink%">actualització</a>";s:6:"custom";s:67:"A %user% li ha agradat una <a href="%permalink%">actualització</a>";}s:27:"record_activity_likes_users";a:2:{s:7:"default";s:90:"A %user% li ha agradat l''entrada de %author%'' al blog <a href="%permalink%">actualitza</a>";s:6:"custom";s:90:"A %user% li ha agradat l''entrada de %author%'' al blog <a href="%permalink%">actualitza</a>";}s:34:"record_activity_likes_own_blogpost";a:2:{s:7:"default";s:88:"A %user% li ha agradat el seu propi enviament al blog, <a href="%permalink%">%title%</a>";s:6:"custom";s:88:"A %user% li ha agradat el seu propi enviament al blog, <a href="%permalink%">%title%</a>";}s:32:"record_activity_likes_a_blogpost";a:2:{s:7:"default";s:78:"A %user% li ha agradat un enviament al blog, <a href="%permalink%">%title%</a>";s:6:"custom";s:78:"A %user% li ha agradat un enviament al blog, <a href="%permalink%">%title%</a>";}s:36:"record_activity_likes_users_blogpost";a:2:{s:7:"default";s:89:"A %user% li ha agradat l''enviament de %author% al blog, <a href="%permalink%">%title%</a>";s:6:"custom";s:89:"A %user% li ha agradat l''enviament de %author% al blog, <a href="%permalink%">%title%</a>";}s:20:"get_likes_only_liker";a:2:{s:7:"default";s:13:"T''ha agradat.";s:6:"custom";s:13:"T''ha agradat.";}s:26:"get_likes_you_and_singular";a:2:{s:7:"default";s:41:"A tu i a %count% altra persona us agrada.";s:6:"custom";s:41:"A tu i a %count% altra persona us agrada.";}s:26:"you_and_username_like_this";a:2:{s:7:"default";s:22:"A tu i a %s us agrada.";s:6:"custom";s:22:"A tu i a %s us agrada.";}s:24:"get_likes_you_and_plural";a:2:{s:7:"default";s:41:"A tu i a %count% persones més us agrada.";s:6:"custom";s:41:"A tu i a %count% persones més us agrada.";}s:31:"get_likes_count_people_singular";a:2:{s:7:"default";s:36:"%count% persona li ha agradat això.";s:6:"custom";s:36:"%count% persona li ha agradat això.";}s:29:"get_likes_count_people_plural";a:2:{s:7:"default";s:38:"%count% persones els ha agradat això.";s:6:"custom";s:38:"%count% persones els ha agradat això.";}s:29:"get_likes_and_people_singular";a:2:{s:7:"default";s:38:"i %count% persona li ha agradat això.";s:6:"custom";s:38:"i %count% persona li ha agradat això.";}s:27:"get_likes_and_people_plural";a:2:{s:7:"default";s:40:"i %count% persones els ha agradat això.";s:6:"custom";s:40:"i %count% persones els ha agradat això.";}s:13:"two_like_this";a:2:{s:7:"default";s:25:"%s i %s els agrada això.";s:6:"custom";s:25:"%s i %s els agrada això.";}s:14:"one_likes_this";a:2:{s:7:"default";s:20:"%s els agrada això.";s:6:"custom";s:20:"%s els agrada això.";}s:37:"get_likes_no_friends_you_and_singular";a:2:{s:7:"default";s:86:"Cap dels teus amics ha clicat a m''agrada, però tu i %count% altra persona ho heu fet.";s:6:"custom";s:86:"Cap dels teus amics ha clicat a m''agrada, però tu i %count% altra persona ho heu fet.";}s:35:"get_likes_no_friends_you_and_plural";a:2:{s:7:"default";s:86:"Cap dels teus amics ha clicat a m''agrada, però tu i %count% persones més ho heu fet.";s:6:"custom";s:86:"Cap dels teus amics ha clicat a m''agrada, però tu i %count% persones més ho heu fet.";}s:29:"get_likes_no_friends_singular";a:2:{s:7:"default";s:74:"Cap dels teus amics ha clicat a m''agrada, però %count% persona ho ha fet.";s:6:"custom";s:74:"Cap dels teus amics ha clicat a m''agrada, però %count% persona ho ha fet.";}s:27:"get_likes_no_friends_plural";a:2:{s:7:"default";s:76:"Cap dels teus amics ha clicat a m''agrada, però %count% persones ho han fet.";s:6:"custom";s:76:"Cap dels teus amics ha clicat a m''agrada, però %count% persones ho han fet.";}}s:13:"translate_nag";N;s:14:"name_or_avatar";N;s:17:"remove_fav_button";N;}', 'yes'),
(162, 'bp_moderation_options', 'a:6:{s:14:"unflagged_text";s:9:"Inadequat";s:12:"flagged_text";s:16:"No és inadequat";s:12:"active_types";a:1:{s:16:"activity_comment";s:2:"on";}s:17:"warning_threshold";i:5;s:15:"warning_forward";s:17:"a8000007@xtec.cat";s:15:"warning_message";s:297:"Several user reported one of your content as inappropriate.\r\nYou can see the content in the page: %CONTENTURL%.\r\nYou posted this content with the account "%AUTHORNAME%".\r\n\r\nA community moderator will soon review and moderate this content if necessary.\r\n--------------------\r\n[%SITENAME%] %SITEURL%";}', 'yes'),
(163, 'bp_moderation_db_version', '-100', 'yes'),
(166, 'gce_general', 'a:7:{s:10:"stylesheet";s:0:"";s:10:"javascript";b:0;s:7:"loading";s:12:"Carregant...";s:5:"error";s:40:"Calendari no disponible en aquest moment";s:6:"fields";b:1;s:14:"old_stylesheet";b:0;s:13:"save_settings";b:1;}', 'yes'),
(167, 'invite_anyone', 'a:22:{s:11:"max_invites";i:5;s:23:"allow_email_invitations";s:3:"all";s:23:"message_is_customizable";s:3:"yes";s:23:"subject_is_customizable";s:2:"no";s:28:"can_send_group_invites_email";s:3:"yes";s:24:"bypass_registration_lock";s:3:"yes";s:7:"version";s:5:"1.4.0";s:23:"email_visibility_toggle";s:7:"nolimit";s:18:"email_since_toggle";s:2:"no";s:10:"days_since";i:0;s:17:"email_role_toggle";s:2:"no";s:12:"minimum_role";s:10:"subscriber";s:22:"email_blacklist_toggle";s:2:"no";s:15:"email_blacklist";s:0:"";s:23:"group_invites_can_admin";s:6:"anyone";s:29:"group_invites_can_group_admin";s:6:"anyone";s:27:"group_invites_can_group_mod";s:6:"anyone";s:30:"group_invites_can_group_member";s:6:"anyone";s:32:"group_invites_enable_create_step";s:3:"yes";s:19:"cloudsponge_enabled";s:3:"off";s:26:"email_limit_invites_toggle";s:2:"no";s:22:"limit_invites_per_user";i:10;}', 'yes'),
(168, 'invite_anyone_db_version', '1.4.0', 'yes'),
(169, 'slideshow-plugin-updated-from-v1-x-x-to-v2-0-1', 'updated', 'yes'),
(170, 'slideshow-plugin-updated-from-v2-to-v2-1-20', 'updated', 'yes'),
(171, 'slideshow-jquery-image-gallery-updated-from-v2-1-20-to-v2-1-22', 'updated', 'yes'),
(172, 'slideshow-jquery-image-gallery-updated-from-v2-1-20-to-v2-1-23', 'updated', 'yes'),
(173, 'slideshow-jquery-image-gallery-updated-from-v2-1-23-to-v2-2-0', 'updated', 'yes'),
(174, 'slideshow-jquery-image-gallery-updated-from-v2-2-0-to-v2-2-8', 'updated', 'yes'),
(175, 'slideshow-jquery-image-gallery-updated-from-v2-2-8-to-v2-2-12', 'updated', 'yes'),
(176, 'slideshow-jquery-image-gallery-updated-from-v2-2-12-to-v2-2-16', 'updated', 'yes'),
(177, 'slideshow-jquery-image-gallery-updated-from-v2-2-16-to-v2-2-17', 'updated', 'yes'),
(178, 'slideshow-jquery-image-gallery-updated-from-v2-2-17-to-v2-2-20', 'updated', 'yes'),
(179, 'slideshow-jquery-image-gallery-plugin-version', '2.3.1', 'yes'),
(180, 'social_articles_options', 'a:6:{s:13:"post_per_page";s:2:"10";s:14:"excerpt_length";s:2:"30";s:8:"workflow";s:8:"approval";s:16:"bp_notifications";s:4:"true";s:20:"allow_author_adition";s:4:"true";s:21:"allow_author_deletion";s:4:"true";}', 'yes'),
(182, 'wsl_database_migration_version', '4', 'yes'),
(183, 'wsl_components_core_enabled', '1', 'yes'),
(184, 'wsl_components_networks_enabled', '1', 'yes'),
(185, 'wsl_components_login-widget_enabled', '1', 'yes'),
(186, 'wsl_components_bouncer_enabled', '1', 'yes'),
(187, 'wsl_components_diagnostics_enabled', '1', 'yes'),
(188, 'wsl_settings_welcome_panel_enabled', '', 'yes'),
(189, 'wsl_settings_redirect_url', 'https://pwc-int.educacio.intranet/agora/masterzer', 'yes'),
(190, 'wsl_settings_connect_with_label', 'Connect with:', 'yes'),
(191, 'wsl_settings_use_popup', '2', 'yes'),
(192, 'wsl_settings_widget_display', '1', 'yes'),
(193, 'wsl_settings_authentication_widget_css', '#wp-social-login-connect-with {font-weight: bold;}\n#wp-social-login-connect-options {padding:10px;}\n#wp-social-login-connect-options a {text-decoration: none;}\n#wp-social-login-connect-options img {border:0 none;}\n.wsl_connect_with_provider {}', 'yes'),
(194, 'wsl_settings_bouncer_registration_enabled', '1', 'yes'),
(195, 'wsl_settings_bouncer_authentication_enabled', '1', 'yes'),
(196, 'wsl_settings_bouncer_linking_accounts_enabled', '2', 'yes'),
(197, 'wsl_settings_bouncer_profile_completion_require_email', '2', 'yes'),
(198, 'wsl_settings_bouncer_profile_completion_change_email', '2', 'yes'),
(199, 'wsl_settings_bouncer_profile_completion_change_username', '2', 'yes'),
(200, 'wsl_settings_bouncer_profile_completion_text_notice', 'Almost there, we just need to check a couple of things', 'yes'),
(201, 'wsl_settings_bouncer_profile_completion_text_submit_button', 'Continue', 'yes'),
(202, 'wsl_settings_bouncer_profile_completion_text_email', 'E-mail', 'yes'),
(203, 'wsl_settings_bouncer_profile_completion_text_username', 'Username', 'yes'),
(204, 'wsl_settings_bouncer_profile_completion_text_email_invalid', 'E-mail is not valid!', 'yes'),
(205, 'wsl_settings_bouncer_profile_completion_text_username_invalid', 'Username is not valid!', 'yes'),
(206, 'wsl_settings_bouncer_profile_completion_text_email_exists', 'That E-mail is already registered!', 'yes'),
(207, 'wsl_settings_bouncer_profile_completion_text_username_exists', 'That Username is already registered!', 'yes'),
(208, 'wsl_settings_bouncer_profile_completion_text_connected_with', 'You are now connected via', 'yes'),
(209, 'wsl_settings_bouncer_new_users_moderation_level', '1', 'yes'),
(210, 'wsl_settings_bouncer_new_users_membership_default_role', 'default', 'yes'),
(211, 'wsl_settings_bouncer_new_users_restrict_domain_enabled', '2', 'yes'),
(212, 'wsl_settings_bouncer_new_users_restrict_domain_text_bounce', 'Bouncer says no.', 'yes'),
(213, 'wsl_settings_bouncer_new_users_restrict_email_enabled', '2', 'yes'),
(214, 'wsl_settings_bouncer_new_users_restrict_email_text_bounce', 'Bouncer say he refuses.', 'yes'),
(215, 'wsl_settings_bouncer_new_users_restrict_profile_enabled', '2', 'yes'),
(216, 'wsl_settings_bouncer_new_users_restrict_profile_text_bounce', 'Bouncer say only Mundo can go where he pleases!', 'yes'),
(217, 'wsl_settings_contacts_import_facebook', '2', 'yes'),
(218, 'wsl_settings_contacts_import_google', '2', 'yes'),
(219, 'wsl_settings_contacts_import_twitter', '2', 'yes'),
(220, 'wsl_settings_contacts_import_live', '2', 'yes'),
(221, 'wsl_settings_contacts_import_linkedin', '2', 'yes'),
(222, 'wsl_settings_Google_enabled', '0', 'yes'),
(223, 'wsl_settings_Moodle_enabled', '0', 'yes'),
(225, 'xtec_mail_idapp', 'AGORA', 'yes'),
(226, 'xtec_mail_replyto', 'agora-noreply@xtec.cat', 'yes'),
(227, 'xtec_mail_sender', 'educacio', 'yes'),
(228, 'xtec_mail_log', '0', 'yes'),
(229, 'xtec_mail_debug', '0', 'yes'),
(230, 'xtec_mail_logpath', '', 'yes'),
(231, 'theme_mods_twentyfourteen', 'a:1:{s:16:"sidebars_widgets";a:2:{s:4:"time";i:1410515298;s:4:"data";a:4:{s:19:"wp_inactive_widgets";a:0:{}s:9:"sidebar-1";a:6:{i:0;s:8:"search-2";i:1;s:14:"recent-posts-2";i:2;s:17:"recent-comments-2";i:3;s:10:"archives-2";i:4;s:12:"categories-2";i:5;s:6:"meta-2";}s:9:"sidebar-2";a:0:{}s:9:"sidebar-3";a:0:{}}}}', 'yes'),
(232, 'current_theme', 'NODES', 'yes'),
(233, 'theme_mods_reactor-primaria-1', 'a:3:{i:0;b:0;s:18:"nav_menu_locations";a:1:{s:9:"main-menu";i:2;}s:18:"custom_css_post_id";i:-1;}', 'yes'),
(234, 'theme_switched', '', 'yes'),
(236, 'widget_pages', 'a:2:{i:1;a:0:{}s:12:"_multiwidget";i:1;}', 'yes'),
(237, 'widget_calendar', 'a:2:{i:1;a:0:{}s:12:"_multiwidget";i:1;}', 'yes'),
(238, 'widget_tag_cloud', 'a:3:{i:1;a:0:{}i:3;a:3:{s:5:"title";s:0:"";s:8:"taxonomy";s:8:"post_tag";s:10:"conditions";a:2:{s:6:"action";s:4:"show";s:5:"rules";a:1:{i:0;a:2:{s:5:"major";s:4:"page";s:5:"minor";s:14:"post_type-post";}}}}s:12:"_multiwidget";i:1;}', 'yes'),
(239, 'widget_nav_menu', 'a:5:{i:1;a:0:{}i:6;a:3:{s:5:"title";s:15:"Blocs de nivell";s:8:"nav_menu";i:32;s:10:"conditions";a:2:{s:6:"action";s:4:"show";s:5:"rules";a:1:{i:0;a:2:{s:5:"major";s:4:"page";s:5:"minor";s:3:"195";}}}}i:8;a:2:{s:5:"title";s:5:"Blogs";s:8:"nav_menu";i:90;}s:12:"_multiwidget";i:1;i:10;a:2:{s:8:"nav_menu";i:91;s:10:"conditions";a:2:{s:6:"action";s:4:"show";s:5:"rules";a:6:{i:0;a:2:{s:5:"major";s:4:"page";s:5:"minor";s:8:"activity";}i:1;a:2:{s:5:"major";s:4:"page";s:5:"minor";s:5:"group";}i:2;a:2:{s:5:"major";s:4:"page";s:5:"minor";s:6:"member";}i:3;a:2:{s:5:"major";s:4:"page";s:5:"minor";s:1:"6";}i:4;a:2:{s:5:"major";s:4:"page";s:5:"minor";s:2:"16";}i:5;a:2:{s:5:"major";s:4:"page";s:5:"minor";s:12:"Carregant...";}}}}}', 'yes'),
(240, 'widget_bbp_login_widget', 'a:2:{i:1;a:0:{}s:12:"_multiwidget";i:1;}', 'yes'),
(241, 'widget_bbp_views_widget', 'a:2:{i:1;a:0:{}s:12:"_multiwidget";i:1;}', 'yes'),
(242, 'widget_bbp_search_widget', 'a:2:{i:1;a:0:{}s:12:"_multiwidget";i:1;}', 'yes'),
(243, 'widget_bbp_forums_widget', 'a:2:{i:1;a:0:{}s:12:"_multiwidget";i:1;}', 'yes'),
(244, 'widget_bbp_topics_widget', 'a:2:{i:1;a:0:{}s:12:"_multiwidget";i:1;}', 'yes'),
(245, 'widget_bbp_replies_widget', 'a:2:{i:1;a:0:{}s:12:"_multiwidget";i:1;}', 'yes'),
(246, 'widget_bbp_stats_widget', 'a:2:{i:1;a:0:{}s:12:"_multiwidget";i:1;}', 'yes'),
(247, 'widget_gce_widget', 'a:6:{i:2;a:2:{s:5:"title";s:0:"";s:11:"calendar_id";i:224;}i:3;a:3:{s:5:"title";s:0:"";s:11:"calendar_id";i:514;s:10:"conditions";a:2:{s:6:"action";s:4:"show";s:5:"rules";a:1:{i:0;a:3:{s:5:"major";s:8:"category";s:5:"minor";s:2:"59";s:12:"has_children";b:0;}}}}i:4;a:3:{s:5:"title";s:0:"";s:11:"calendar_id";i:515;s:10:"conditions";a:2:{s:6:"action";s:4:"show";s:5:"rules";a:1:{i:0;a:3:{s:5:"major";s:8:"category";s:5:"minor";s:2:"68";s:12:"has_children";b:0;}}}}i:5;a:3:{s:5:"title";s:0:"";s:11:"calendar_id";i:516;s:10:"conditions";a:2:{s:6:"action";s:4:"show";s:5:"rules";a:1:{i:0;a:3:{s:5:"major";s:8:"category";s:5:"minor";s:2:"69";s:12:"has_children";b:0;}}}}i:6;a:3:{s:5:"title";s:0:"";s:11:"calendar_id";i:517;s:10:"conditions";a:2:{s:6:"action";s:4:"show";s:5:"rules";a:1:{i:0;a:3:{s:5:"major";s:8:"category";s:5:"minor";s:2:"70";s:12:"has_children";b:0;}}}}s:12:"_multiwidget";i:1;}', 'yes'),
(248, 'widget_slideshowwidget', 'a:3:{i:1;a:0:{}i:2;a:3:{s:5:"title";s:8:"Destacat";s:11:"slideshowId";s:3:"202";s:10:"conditions";a:2:{s:6:"action";s:4:"show";s:5:"rules";a:1:{i:0;a:2:{s:5:"major";s:4:"page";s:5:"minor";s:1:"5";}}}}s:12:"_multiwidget";i:1;}', 'yes'),
(249, 'widget_invite-anyone-widget', 'a:2:{i:1;a:0:{}s:12:"_multiwidget";i:1;}', 'yes'),
(250, 'widget_xtec_widget', 'a:6:{i:1;a:0:{}i:2;a:21:{s:5:"title";s:0:"";s:11:"ensenyament";s:2:"on";s:4:"xtec";s:2:"on";s:6:"edu365";s:2:"on";s:4:"edu3";s:2:"on";s:12:"xarxa-docent";s:0:"";s:10:"alexandria";s:0:"";s:6:"linkat";s:0:"";s:5:"jclic";s:0:"";s:5:"merli";s:0:"";s:3:"arc";s:0:"";s:7:"odissea";s:0:"";s:4:"ampa";s:0:"";s:12:"escola-verda";s:0:"";s:4:"atri";s:0:"";s:4:"saga";s:0:"";s:14:"familia-escola";s:0:"";s:15:"internet-segura";s:0:"";s:6:"moodle";s:0:"";s:8:"ampa_url";s:54:"https://pwc-int.educacio.intranet/agora/masterzer/ampa";s:16:"escola-verda_url";s:127:"http://mediambient.gencat.cat/ca/05_ambits_dactuacio/educacio_i_sostenibilitat/educacio_per_a_la_sostenibilitat/escoles_verdes/";}i:4;a:27:{s:5:"title";s:19:"Enllaços educatius";s:11:"ensenyament";s:2:"on";s:4:"xtec";s:2:"on";s:6:"edu365";s:2:"on";s:4:"edu3";s:2:"on";s:12:"xarxa-docent";s:2:"on";s:6:"ateneu";s:0:"";s:10:"alexandria";s:0:"";s:6:"linkat";s:0:"";s:5:"jclic";s:2:"on";s:5:"merli";s:0:"";s:3:"arc";s:2:"on";s:7:"odissea";s:0:"";s:4:"ampa";s:2:"on";s:12:"escola-verda";s:2:"on";s:4:"atri";s:0:"";s:4:"saga";s:0:"";s:14:"familia-escola";s:2:"on";s:15:"internet-segura";s:0:"";s:6:"moodle";s:2:"on";s:12:"portalcentre";s:0:"";s:8:"intraweb";s:0:"";s:7:"epergam";s:0:"";s:10:"lamevaxtec";s:2:"on";s:8:"ampa_url";s:59:"https://pwc-int.educacio.intranet/agora/masterzer/zer/ampa/";s:16:"escola-verda_url";s:44:"http://www.gencat.cat/mediamb/escolesverdes/";s:10:"moodle_url";s:56:"https://pwc-int.educacio.intranet/agora/masterzer/moodle";}i:6;a:27:{s:5:"title";s:19:"Enllaços educatius";s:11:"ensenyament";s:2:"on";s:4:"xtec";s:2:"on";s:6:"edu365";s:2:"on";s:4:"edu3";s:2:"on";s:12:"xarxa-docent";s:2:"on";s:6:"ateneu";s:0:"";s:10:"alexandria";s:0:"";s:6:"linkat";s:0:"";s:5:"jclic";s:2:"on";s:5:"merli";s:0:"";s:3:"arc";s:0:"";s:7:"odissea";s:0:"";s:4:"ampa";s:0:"";s:12:"escola-verda";s:2:"on";s:4:"atri";s:0:"";s:4:"saga";s:0:"";s:14:"familia-escola";s:2:"on";s:15:"internet-segura";s:0:"";s:6:"moodle";s:0:"";s:12:"portalcentre";s:0:"";s:8:"intraweb";s:0:"";s:7:"epergam";s:0:"";s:10:"lamevaxtec";s:0:"";s:8:"ampa_url";s:54:"https://pwc-int.educacio.intranet/agora/masterzer/ampa";s:16:"escola-verda_url";s:44:"http://www.gencat.cat/mediamb/escolesverdes/";s:10:"moodle_url";s:56:"https://pwc-int.educacio.intranet/agora/masterzer/moodle";}i:7;a:28:{s:5:"title";s:19:"Enllaços educatius";s:11:"ensenyament";s:0:"";s:4:"xtec";s:0:"";s:6:"edu365";s:2:"on";s:4:"edu3";s:2:"on";s:12:"xarxa-docent";s:0:"";s:6:"ateneu";s:0:"";s:10:"alexandria";s:0:"";s:6:"linkat";s:0:"";s:5:"jclic";s:2:"on";s:5:"merli";s:0:"";s:3:"arc";s:2:"on";s:7:"odissea";s:0:"";s:4:"ampa";s:0:"";s:12:"escola-verda";s:0:"";s:4:"atri";s:0:"";s:4:"saga";s:0:"";s:14:"familia-escola";s:0:"";s:15:"internet-segura";s:0:"";s:6:"moodle";s:0:"";s:12:"portalcentre";s:0:"";s:8:"intraweb";s:0:"";s:7:"epergam";s:0:"";s:10:"lamevaxtec";s:0:"";s:8:"ampa_url";s:54:"https://pwc-int.educacio.intranet/agora/masterzer/ampa";s:16:"escola-verda_url";s:44:"http://www.gencat.cat/mediamb/escolesverdes/";s:10:"moodle_url";s:56:"https://pwc-int.educacio.intranet/agora/masterzer/moodle";s:10:"conditions";a:2:{s:6:"action";s:4:"show";s:5:"rules";a:4:{i:0;a:2:{s:5:"major";s:8:"category";s:5:"minor";s:2:"59";}i:1;a:2:{s:5:"major";s:8:"category";s:5:"minor";s:2:"68";}i:2;a:2:{s:5:"major";s:8:"category";s:5:"minor";s:2:"70";}i:3;a:2:{s:5:"major";s:8:"category";s:5:"minor";s:2:"69";}}}}s:12:"_multiwidget";i:1;}', 'yes'),
(251, 'widget_logo_centre_widget', 'a:4:{i:1;a:0:{}i:2;a:1:{s:5:"title";s:0:"";}i:3;a:1:{s:5:"title";s:0:"";}s:12:"_multiwidget";i:1;}', 'yes'),
(252, 'reactor_options', 'a:23:{s:15:"tamany_font_nom";s:5:"2.5vw";s:16:"imatge_capcalera";s:0:"";s:8:"carrusel";s:3:"107";s:10:"logo_image";s:99:"https://pwc-int.educacio.intranet/agora/masterzer/wp-content/uploads/usu10/2014/09/logo-centre1.png";s:16:"nomCanonicCentre";s:15:"ZER Josep Arany";s:14:"direccioCentre";s:21:"Plaça de la Vila, 14";s:8:"cpCentre";s:21:"01234 Abella de Xerta";s:9:"telCentre";s:10:"12 345 678";s:10:"googleMaps";s:60:"https://www.google.com/maps/@41.605896,1.723144,10z?hl=ca-ES";s:13:"paleta_colors";s:5:"verds";s:14:"frontpage_page";s:1:"7";s:23:"frontpage_post_category";s:2:"29";s:16:"frontpage_layout";s:4:"2c-l";s:26:"frontpage_posts_per_fila_1";s:2:"33";s:26:"frontpage_posts_per_fila_2";s:1:"2";s:26:"frontpage_posts_per_fila_n";s:1:"2";s:22:"frontpage_number_posts";s:2:"15";s:21:"frontpage_link_titles";b:1;s:13:"post_readmore";s:14:"Llegeix més»";s:13:"favicon_image";s:0:"";s:11:"logo_inline";b:1;s:14:"contacteCentre";s:61:"https://pwc-int.educacio.intranet/agora/masterzer/zer/on-som/";s:12:"correuCentre";s:0:"";}', 'yes'),
(253, 'icones_capcalera', '', 'yes'),
(256, 'tadv_settings', 'a:6:{s:7:"options";s:15:"menubar,advlist";s:9:"toolbar_1";s:117:"bold,italic,blockquote,bullist,numlist,alignleft,aligncenter,alignright,link,unlink,table,fullscreen,undo,redo,wp_adv";s:9:"toolbar_2";s:121:"formatselect,alignjustify,strikethrough,outdent,indent,pastetext,removeformat,charmap,wp_more,emoticons,forecolor,wp_help";s:9:"toolbar_3";s:0:"";s:9:"toolbar_4";s:0:"";s:7:"plugins";s:107:"anchor,code,insertdatetime,nonbreaking,print,searchreplace,table,visualblocks,visualchars,emoticons,advlist";}', 'yes'),
(257, 'tadv_admin_settings', 'a:1:{s:7:"options";a:0:{}}', 'yes'),
(258, 'tadv_version', '4000', 'yes'),
(290, 'my_option_name', 'a:13:{s:6:"icon11";s:5:"clock";s:11:"link_icon11";s:32:"Programa de gestió de l''alumnat";s:12:"title_icon11";s:7:"Tutoria";s:6:"icon12";s:18:"welcome-learn-more";s:11:"link_icon12";s:25:"adreça moodle del centre";s:12:"title_icon12";s:6:"MOODLE";s:6:"icon21";s:8:"calendar";s:11:"link_icon21";s:73:"https://pwc-int.educacio.intranet/agora/masterzer/zer/calendari-del-curs/";s:12:"title_icon21";s:6:"AGENDA";s:6:"icon22";s:11:"format-chat";s:11:"link_icon22";s:59:"https://pwc-int.educacio.intranet/agora/masterzer/activitat";s:12:"title_icon22";s:5:"NODES";s:14:"show_text_icon";s:2:"si";}', 'yes'),
(308, 'widget_bp_core_friends_widget', 'a:2:{i:1;a:0:{}s:12:"_multiwidget";i:1;}', 'yes'),
(353, 'nav_menu_options', 'a:2:{i:0;b:0;s:8:"auto_add";a:0:{}}', 'yes'),
(484, 'bpfb', 'a:5:{s:5:"theme";s:3:"new";s:9:"alignment";s:4:"left";s:12:"oembed_width";i:450;s:20:"thumbnail_size_width";i:450;s:21:"thumbnail_size_height";i:450;}', 'yes'),
(745, 'bphelp-my-redirect-slug', 'wp-login.php', 'yes'),
(947, 'gce_settings_general', 'a:2:{s:13:"save_settings";i:1;s:14:"always_enqueue";i:1;}', 'yes'),
(950, 'gce_cpt_setup', '1', 'yes'),
(1027, 'bp-docs-slug', 'docs', 'yes'),
(1028, 'bp-docs-excerpt-length', '0', 'yes'),
(1029, 'bp-docs-user-tab-name', 'Documents', 'yes'),
(1030, 'bp-docs-tab-name', 'Documents', 'yes'),
(1031, 'bp-docs-enable-attachments', 'yes', 'yes'),
(1040, 'bp_docs_associated_item_children', 'a:0:{}', 'yes'),
(1105, 'ga_version', '6.4.7.3', 'yes'),
(1106, 'ga_status', 'disabled', 'yes'),
(1107, 'ga_disable_gasites', 'disabled', 'yes'),
(1108, 'ga_analytic_snippet', 'enabled', 'yes'),
(1109, 'ga_uid', 'UA-XXXXXXXX-X', 'yes'),
(1110, 'ga_admin_status', 'enabled', 'yes'),
(1111, 'ga_admin_disable_DimentionIndex', '', 'yes'),
(1112, 'ga_admin_disable', 'remove', 'yes'),
(1113, 'ga_admin_role', 'a:1:{i:0;s:13:"administrator";}', 'yes'),
(1114, 'ga_dashboard_role', 'a:1:{i:0;s:13:"administrator";}', 'yes'),
(1115, 'key_ga_show_ad', '1', 'yes'),
(1116, 'ga_adsense', '', 'yes'),
(1117, 'ga_extra', '', 'yes'),
(1118, 'ga_extra_after', '', 'yes'),
(1119, 'ga_event', 'enabled', 'yes'),
(1120, 'ga_outbound', 'enabled', 'yes'),
(1121, 'ga_outbound_prefix', 'outgoing', 'yes'),
(1122, 'ga_enhanced_link_attr', 'disabled', 'yes'),
(1123, 'ga_downloads', '', 'yes'),
(1124, 'ga_downloads_prefix', 'download', 'yes'),
(1125, 'ga_widgets', 'enabled', 'yes'),
(1126, 'ga_annon', '', 'yes'),
(1127, 'ga_defaults', 'yes', 'yes'),
(1128, 'ga_google_token', '', 'yes'),
(1145, 'widget_socialmedia_widget', 'a:3:{i:1;a:0:{}i:2;a:21:{s:5:"title";s:12:"Segueix-nos!";s:4:"mida";s:7:"fa-2-5x";s:11:"twitter_url";s:16:"twitter institut";s:12:"facebook_url";s:17:"facebook institut";s:15:"google-plus_url";s:0:"";s:11:"youtube_url";s:16:"youtube institut";s:9:"vimeo_url";s:0:"";s:10:"picasa_url";s:0:"";s:10:"flickr_url";s:0:"";s:13:"pinterest_url";s:0:"";s:13:"instagram_url";s:0:"";s:10:"tumblr_url";s:0:"";s:14:"soundcloud_url";s:0:"";s:11:"dropbox_url";s:0:"";s:7:"rss_url";s:54:"https://pwc-int.educacio.intranet/agora/masterzer/feed";s:9:"email_url";s:0:"";s:10:"moodle_url";s:0:"";s:14:"xarxanodes_url";s:0:"";s:8:"docs_url";s:0:"";s:9:"fotos_url";s:0:"";s:9:"video_url";s:0:"";}s:12:"_multiwidget";i:1;}', 'yes'),
(1177, 'wsl_settings_Google_app_scope', 'profile https://www.googleapis.com/auth/plus.profile.emails.read', 'yes'),
(1280, 'WPLANG', 'ca', 'yes'),
(1281, 'db_upgraded', '', 'yes'),
(1294, 'widget_grup_classe_widget', 'a:1:{s:12:"_multiwidget";i:1;}', 'yes'),
(1342, 'bpfb_plugin', 'a:1:{s:9:"installed";i:1;}', 'yes'),
(1416, 'wsl_components_users_enabled', '1', 'yes'),
(1461, 'bp_disable_blogforum_comments', '1', 'yes'),
(1501, 'wsl_settings_Google_app_id', '', 'yes'),
(1502, 'wsl_settings_Google_app_secret', '', 'yes'),
(1503, 'wsl_settings_Moodle_app_id', '', 'yes'),
(1504, 'wsl_settings_Moodle_app_secret', '', 'yes'),
(1505, 'wsl_settings_Moodle_url', '', 'yes'),
(1661, 'category_58', 'a:1:{s:13:"articles_fila";s:0:"";}', 'yes'),
(1757, 'category_31', 'a:1:{s:13:"articles_fila";s:0:"";}', 'yes'),
(1759, 'category_76', 'a:1:{s:13:"articles_fila";s:0:"";}', 'yes'),
(1784, '_bbp_private_forums', 'a:17:{i:0;i:454;i:1;i:453;i:2;i:452;i:3;i:451;i:4;i:179;i:5;i:178;i:6;i:177;i:7;i:176;i:8;i:175;i:9;i:174;i:10;i:173;i:11;i:172;i:12;i:171;i:13;i:170;i:14;i:115;i:15;i:113;i:16;i:112;}', 'yes'),
(1785, '_bbp_hidden_forums', 'a:17:{i:0;i:454;i:1;i:453;i:2;i:452;i:3;i:451;i:4;i:179;i:5;i:178;i:6;i:177;i:7;i:176;i:8;i:175;i:9;i:174;i:10;i:173;i:11;i:172;i:12;i:171;i:13;i:170;i:14;i:115;i:15;i:113;i:16;i:112;}', 'yes'),
(1799, 'category_children', 'a:4:{i:59;a:10:{i:0;i:58;i:1;i:60;i:2;i:61;i:3;i:62;i:4;i:63;i:5;i:64;i:6;i:65;i:7;i:66;i:8;i:67;i:9;i:76;}i:68;a:6:{i:0;i:71;i:1;i:72;i:2;i:73;i:3;i:74;i:4;i:75;i:5;i:77;}i:69;a:6:{i:0;i:78;i:1;i:85;i:2;i:86;i:3;i:87;i:4;i:88;i:5;i:89;}i:70;a:6:{i:0;i:79;i:1;i:80;i:2;i:81;i:3;i:82;i:4;i:83;i:5;i:84;}}', 'yes'),
(2000, 'nodesbox_name', 'ZER L&#039;Arany', 'yes');
INSERT INTO `wp_options` (`option_id`, `option_name`, `option_value`, `autoload`) VALUES
(2001, 'addtoany_options', 'a:33:{s:8:"position";s:6:"bottom";s:30:"display_in_posts_on_front_page";s:2:"-1";s:33:"display_in_posts_on_archive_pages";s:1:"1";s:19:"display_in_excerpts";s:2:"-1";s:16:"display_in_posts";s:1:"1";s:16:"display_in_pages";s:1:"1";s:15:"display_in_feed";s:2:"-1";s:10:"show_title";s:2:"-1";s:7:"onclick";s:2:"-1";s:9:"icon_size";s:2:"25";s:6:"button";s:4:"NONE";s:13:"button_custom";s:0:"";s:6:"header";s:0:"";s:23:"additional_js_variables";s:0:"";s:12:"custom_icons";s:2:"-1";s:16:"custom_icons_url";s:1:"/";s:17:"custom_icons_type";s:3:"png";s:10:"inline_css";s:1:"1";s:5:"cache";s:2:"-1";s:20:"display_in_cpt_forum";s:2:"-1";s:20:"display_in_cpt_topic";s:2:"-1";s:20:"display_in_cpt_reply";s:2:"-1";s:21:"display_in_cpt_bp_doc";s:2:"-1";s:23:"display_in_cpt_gce_feed";s:2:"-1";s:11:"button_text";s:10:"Comparteix";s:24:"special_facebook_options";a:1:{s:10:"show_count";s:2:"-1";}s:23:"special_twitter_options";a:1:{s:10:"show_count";s:2:"-1";}s:15:"active_services";a:4:{i:0;s:8:"facebook";i:1;s:7:"twitter";i:2;s:8:"whatsapp";i:3;s:12:"google_gmail";}s:29:"special_facebook_like_options";a:1:{s:4:"verb";s:4:"like";}s:29:"special_twitter_tweet_options";a:1:{s:10:"show_count";s:2:"-1";}s:30:"special_google_plusone_options";a:1:{s:10:"show_count";s:2:"-1";}s:33:"special_google_plus_share_options";a:1:{s:10:"show_count";s:2:"-1";}s:29:"special_pinterest_pin_options";a:1:{s:10:"show_count";s:2:"-1";}}', 'yes'),
(2010, 'widget_a2a_follow_widget', 'a:2:{i:1;a:0:{}s:12:"_multiwidget";i:1;}', 'yes'),
(2011, 'widget_a2a_share_save_widget', 'a:2:{i:1;a:0:{}s:12:"_multiwidget";i:1;}', 'yes'),
(2030, 'common_css', '', 'yes'),
(2084, 'recaptcha_options', 'a:5:{s:8:"site_key";s:40:"6LddJgoTAAAAAFCT6LwNkKU2YR2qNMG7fQgIXse8";s:6:"secret";s:40:"6LddJgoTAAAAAKs-yBghGgTZmAB1oPLQlldWYKAh";s:14:"comments_theme";s:8:"standard";s:18:"recaptcha_language";s:2:"ca";s:17:"no_response_error";s:58:"<strong>ERROR</strong>: Please fill in the reCAPTCHA form.";}', 'yes'),
(2110, 'widget_xtec_stats_widget', 'a:2:{i:1;a:0:{}s:12:"_multiwidget";i:1;}', 'yes'),
(2131, 'bp-disable-group-cover-image-uploads', '1', 'yes'),
(2132, 'bp-disable-cover-image-uploads', '1', 'yes'),
(2133, 'ga_analyticator_global_notification', '1', 'yes'),
(2135, 'xtec-stats-visits', '0', 'yes'),
(2136, 'xtec-stats-include-admin', 'on', 'yes'),
(2170, '_bbp_edit_lock', '30', 'yes'),
(2171, '_bbp_throttle_time', '10', 'yes'),
(2172, '_bbp_allow_anonymous', '0', 'yes'),
(2173, '_bbp_allow_global_access', '1', 'yes'),
(2174, '_bbp_default_role', 'bbp_participant', 'yes'),
(2175, '_bbp_allow_revisions', '1', 'yes'),
(2176, '_bbp_enable_favorites', '1', 'yes'),
(2177, '_bbp_enable_subscriptions', '1', 'yes'),
(2178, '_bbp_allow_topic_tags', '1', 'yes'),
(2179, '_bbp_allow_search', '1', 'yes'),
(2180, '_bbp_use_wp_editor', '1', 'yes'),
(2181, '_bbp_use_autoembed', '1', 'yes'),
(2182, '_bbp_thread_replies_depth', '3', 'yes'),
(2183, '_bbp_allow_threaded_replies', '1', 'yes'),
(2184, '_bbp_topics_per_page', '15', 'yes'),
(2185, '_bbp_replies_per_page', '15', 'yes'),
(2186, '_bbp_topics_per_rss_page', '25', 'yes'),
(2187, '_bbp_replies_per_rss_page', '25', 'yes'),
(2188, '_bbp_root_slug', 'forums', 'yes'),
(2189, '_bbp_include_root', '1', 'yes'),
(2190, '_bbp_show_on_root', 'forums', 'yes'),
(2191, '_bbp_forum_slug', 'forum', 'yes'),
(2192, '_bbp_topic_slug', 'topic', 'yes'),
(2193, '_bbp_topic_tag_slug', 'topic-tag', 'yes'),
(2194, '_bbp_view_slug', 'view', 'yes'),
(2195, '_bbp_reply_slug', 'reply', 'yes'),
(2196, '_bbp_search_slug', 'search', 'yes'),
(2197, '_bbp_user_slug', 'users', 'yes'),
(2198, '_bbp_topic_archive_slug', 'topics', 'yes'),
(2199, '_bbp_reply_archive_slug', 'replies', 'yes'),
(2200, '_bbp_user_favs_slug', 'favorites', 'yes'),
(2201, '_bbp_user_subs_slug', 'subscriptions', 'yes'),
(2202, '_bbp_enable_group_forums', '1', 'yes'),
(2203, '_bbp_group_forums_root_id', '0', 'yes'),
(2204, 'ja_bbpress_tinymce_full', '0', 'yes'),
(2205, 'ja_bbpress_tinymce_media', '1', 'yes'),
(2446, 'email-subscribers', '2.9', 'yes'),
(2800, 'widget_email-subscribers', 'a:2:{i:2;a:4:{s:8:"es_title";s:22:"Subscripció de correu";s:7:"es_desc";s:35:"T''avisarem si hi ha notícies noves";s:7:"es_name";s:3:"YES";s:8:"es_group";s:7:"Portada";}s:12:"_multiwidget";i:1;}', 'yes'),
(2801, 'finished_splitting_shared_terms', '1', 'yes'),
(2802, 'site_icon', '0', 'yes'),
(2803, 'medium_large_size_w', '768', 'yes'),
(2804, 'medium_large_size_h', '0', 'yes'),
(2847, 'rewrite_rules', 'a:396:{s:14:"docs/create/?$";s:52:"index.php?post_type=bp_doc&name=$matches[1]&create=1";s:34:"docs/my-groups/page/([0-9]{1,})/?$";s:56:"index.php?post_type=bp_doc&my-groups=1&paged=$matches[1]";s:17:"docs/my-groups/?$";s:55:"index.php?post_type=bp_doc&name=$matches[1]&my-groups=1";s:20:"docs/([^/]+)/edit/?$";s:50:"index.php?post_type=bp_doc&name=$matches[1]&edit=1";s:23:"docs/([^/]+)/history/?$";s:53:"index.php?post_type=bp_doc&name=$matches[1]&history=1";s:22:"docs/([^/]+)/delete/?$";s:53:"index.php?post_type=bp_doc&name=$matches[1]&history=1";s:23:"docs/([^/]+)/untrash/?$";s:53:"index.php?post_type=bp_doc&name=$matches[1]&untrash=1";s:33:"docs/([^/]+)/unlink-from-group/?$";s:63:"index.php?post_type=bp_doc&name=$matches[1]&unlink-from-group=1";s:9:"forums/?$";s:25:"index.php?post_type=forum";s:39:"forums/feed/(feed|rdf|rss|rss2|atom)/?$";s:42:"index.php?post_type=forum&feed=$matches[1]";s:34:"forums/(feed|rdf|rss|rss2|atom)/?$";s:42:"index.php?post_type=forum&feed=$matches[1]";s:26:"forums/page/([0-9]{1,})/?$";s:43:"index.php?post_type=forum&paged=$matches[1]";s:9:"topics/?$";s:25:"index.php?post_type=topic";s:39:"topics/feed/(feed|rdf|rss|rss2|atom)/?$";s:42:"index.php?post_type=topic&feed=$matches[1]";s:34:"topics/(feed|rdf|rss|rss2|atom)/?$";s:42:"index.php?post_type=topic&feed=$matches[1]";s:26:"topics/page/([0-9]{1,})/?$";s:43:"index.php?post_type=topic&paged=$matches[1]";s:28:"forums/forum/([^/]+)/edit/?$";s:34:"index.php?forum=$matches[1]&edit=1";s:28:"forums/topic/([^/]+)/edit/?$";s:34:"index.php?topic=$matches[1]&edit=1";s:28:"forums/reply/([^/]+)/edit/?$";s:34:"index.php?reply=$matches[1]&edit=1";s:32:"forums/topic-tag/([^/]+)/edit/?$";s:38:"index.php?topic-tag=$matches[1]&edit=1";s:48:"forums/users/([^/]+)/topics/page/?([0-9]{1,})/?$";s:59:"index.php?bbp_user=$matches[1]&bbp_tops=1&paged=$matches[2]";s:49:"forums/users/([^/]+)/replies/page/?([0-9]{1,})/?$";s:59:"index.php?bbp_user=$matches[1]&bbp_reps=1&paged=$matches[2]";s:51:"forums/users/([^/]+)/favorites/page/?([0-9]{1,})/?$";s:59:"index.php?bbp_user=$matches[1]&bbp_favs=1&paged=$matches[2]";s:55:"forums/users/([^/]+)/subscriptions/page/?([0-9]{1,})/?$";s:59:"index.php?bbp_user=$matches[1]&bbp_subs=1&paged=$matches[2]";s:30:"forums/users/([^/]+)/topics/?$";s:41:"index.php?bbp_user=$matches[1]&bbp_tops=1";s:31:"forums/users/([^/]+)/replies/?$";s:41:"index.php?bbp_user=$matches[1]&bbp_reps=1";s:33:"forums/users/([^/]+)/favorites/?$";s:41:"index.php?bbp_user=$matches[1]&bbp_favs=1";s:37:"forums/users/([^/]+)/subscriptions/?$";s:41:"index.php?bbp_user=$matches[1]&bbp_subs=1";s:28:"forums/users/([^/]+)/edit/?$";s:37:"index.php?bbp_user=$matches[1]&edit=1";s:23:"forums/users/([^/]+)/?$";s:30:"index.php?bbp_user=$matches[1]";s:40:"forums/view/([^/]+)/page/?([0-9]{1,})/?$";s:48:"index.php?bbp_view=$matches[1]&paged=$matches[2]";s:27:"forums/view/([^/]+)/feed/?$";s:47:"index.php?bbp_view=$matches[1]&feed=$matches[2]";s:22:"forums/view/([^/]+)/?$";s:30:"index.php?bbp_view=$matches[1]";s:34:"forums/search/page/?([0-9]{1,})/?$";s:27:"index.php?paged=$matches[1]";s:16:"forums/search/?$";s:20:"index.php?bbp_search";s:11:"^wp-json/?$";s:22:"index.php?rest_route=/";s:14:"^wp-json/(.*)?";s:33:"index.php?rest_route=/$matches[1]";s:21:"^index.php/wp-json/?$";s:22:"index.php?rest_route=/";s:24:"^index.php/wp-json/(.*)?";s:33:"index.php?rest_route=/$matches[1]";s:7:"docs/?$";s:26:"index.php?post_type=bp_doc";s:37:"docs/feed/(feed|rdf|rss|rss2|atom)/?$";s:43:"index.php?post_type=bp_doc&feed=$matches[1]";s:32:"docs/(feed|rdf|rss|rss2|atom)/?$";s:43:"index.php?post_type=bp_doc&feed=$matches[1]";s:24:"docs/page/([0-9]{1,})/?$";s:44:"index.php?post_type=bp_doc&paged=$matches[1]";s:12:"slideshow/?$";s:29:"index.php?post_type=slideshow";s:42:"slideshow/feed/(feed|rdf|rss|rss2|atom)/?$";s:46:"index.php?post_type=slideshow&feed=$matches[1]";s:37:"slideshow/(feed|rdf|rss|rss2|atom)/?$";s:46:"index.php?post_type=slideshow&feed=$matches[1]";s:29:"slideshow/page/([0-9]{1,})/?$";s:47:"index.php?post_type=slideshow&paged=$matches[1]";s:48:"categoria/(.+?)/feed/(feed|rdf|rss|rss2|atom)/?$";s:52:"index.php?category_name=$matches[1]&feed=$matches[2]";s:43:"categoria/(.+?)/(feed|rdf|rss|rss2|atom)/?$";s:52:"index.php?category_name=$matches[1]&feed=$matches[2]";s:24:"categoria/(.+?)/embed/?$";s:46:"index.php?category_name=$matches[1]&embed=true";s:36:"categoria/(.+?)/page/?([0-9]{1,})/?$";s:53:"index.php?category_name=$matches[1]&paged=$matches[2]";s:18:"categoria/(.+?)/?$";s:35:"index.php?category_name=$matches[1]";s:44:"tag/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:42:"index.php?tag=$matches[1]&feed=$matches[2]";s:39:"tag/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:42:"index.php?tag=$matches[1]&feed=$matches[2]";s:20:"tag/([^/]+)/embed/?$";s:36:"index.php?tag=$matches[1]&embed=true";s:32:"tag/([^/]+)/page/?([0-9]{1,})/?$";s:43:"index.php?tag=$matches[1]&paged=$matches[2]";s:14:"tag/([^/]+)/?$";s:25:"index.php?tag=$matches[1]";s:45:"type/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:50:"index.php?post_format=$matches[1]&feed=$matches[2]";s:40:"type/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:50:"index.php?post_format=$matches[1]&feed=$matches[2]";s:21:"type/([^/]+)/embed/?$";s:44:"index.php?post_format=$matches[1]&embed=true";s:33:"type/([^/]+)/page/?([0-9]{1,})/?$";s:51:"index.php?post_format=$matches[1]&paged=$matches[2]";s:15:"type/([^/]+)/?$";s:33:"index.php?post_format=$matches[1]";s:38:"forums/forum/.+?/attachment/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:48:"forums/forum/.+?/attachment/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:68:"forums/forum/.+?/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:63:"forums/forum/.+?/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:63:"forums/forum/.+?/attachment/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:44:"forums/forum/.+?/attachment/([^/]+)/embed/?$";s:43:"index.php?attachment=$matches[1]&embed=true";s:27:"forums/forum/(.+?)/embed/?$";s:38:"index.php?forum=$matches[1]&embed=true";s:31:"forums/forum/(.+?)/trackback/?$";s:32:"index.php?forum=$matches[1]&tb=1";s:51:"forums/forum/(.+?)/feed/(feed|rdf|rss|rss2|atom)/?$";s:44:"index.php?forum=$matches[1]&feed=$matches[2]";s:46:"forums/forum/(.+?)/(feed|rdf|rss|rss2|atom)/?$";s:44:"index.php?forum=$matches[1]&feed=$matches[2]";s:39:"forums/forum/(.+?)/page/?([0-9]{1,})/?$";s:45:"index.php?forum=$matches[1]&paged=$matches[2]";s:46:"forums/forum/(.+?)/comment-page-([0-9]{1,})/?$";s:45:"index.php?forum=$matches[1]&cpage=$matches[2]";s:35:"forums/forum/(.+?)(?:/([0-9]+))?/?$";s:44:"index.php?forum=$matches[1]&page=$matches[2]";s:40:"forums/topic/[^/]+/attachment/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:50:"forums/topic/[^/]+/attachment/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:70:"forums/topic/[^/]+/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:65:"forums/topic/[^/]+/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:65:"forums/topic/[^/]+/attachment/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:46:"forums/topic/[^/]+/attachment/([^/]+)/embed/?$";s:43:"index.php?attachment=$matches[1]&embed=true";s:29:"forums/topic/([^/]+)/embed/?$";s:38:"index.php?topic=$matches[1]&embed=true";s:33:"forums/topic/([^/]+)/trackback/?$";s:32:"index.php?topic=$matches[1]&tb=1";s:53:"forums/topic/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:44:"index.php?topic=$matches[1]&feed=$matches[2]";s:48:"forums/topic/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:44:"index.php?topic=$matches[1]&feed=$matches[2]";s:41:"forums/topic/([^/]+)/page/?([0-9]{1,})/?$";s:45:"index.php?topic=$matches[1]&paged=$matches[2]";s:48:"forums/topic/([^/]+)/comment-page-([0-9]{1,})/?$";s:45:"index.php?topic=$matches[1]&cpage=$matches[2]";s:37:"forums/topic/([^/]+)(?:/([0-9]+))?/?$";s:44:"index.php?topic=$matches[1]&page=$matches[2]";s:29:"forums/topic/[^/]+/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:39:"forums/topic/[^/]+/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:59:"forums/topic/[^/]+/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:54:"forums/topic/[^/]+/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:54:"forums/topic/[^/]+/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:35:"forums/topic/[^/]+/([^/]+)/embed/?$";s:43:"index.php?attachment=$matches[1]&embed=true";s:40:"forums/reply/[^/]+/attachment/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:50:"forums/reply/[^/]+/attachment/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:70:"forums/reply/[^/]+/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:65:"forums/reply/[^/]+/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:65:"forums/reply/[^/]+/attachment/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:46:"forums/reply/[^/]+/attachment/([^/]+)/embed/?$";s:43:"index.php?attachment=$matches[1]&embed=true";s:29:"forums/reply/([^/]+)/embed/?$";s:38:"index.php?reply=$matches[1]&embed=true";s:33:"forums/reply/([^/]+)/trackback/?$";s:32:"index.php?reply=$matches[1]&tb=1";s:41:"forums/reply/([^/]+)/page/?([0-9]{1,})/?$";s:45:"index.php?reply=$matches[1]&paged=$matches[2]";s:48:"forums/reply/([^/]+)/comment-page-([0-9]{1,})/?$";s:45:"index.php?reply=$matches[1]&cpage=$matches[2]";s:37:"forums/reply/([^/]+)(?:/([0-9]+))?/?$";s:44:"index.php?reply=$matches[1]&page=$matches[2]";s:29:"forums/reply/[^/]+/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:39:"forums/reply/[^/]+/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:59:"forums/reply/[^/]+/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:54:"forums/reply/[^/]+/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:54:"forums/reply/[^/]+/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:35:"forums/reply/[^/]+/([^/]+)/embed/?$";s:43:"index.php?attachment=$matches[1]&embed=true";s:57:"forums/topic-tag/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:48:"index.php?topic-tag=$matches[1]&feed=$matches[2]";s:52:"forums/topic-tag/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:48:"index.php?topic-tag=$matches[1]&feed=$matches[2]";s:33:"forums/topic-tag/([^/]+)/embed/?$";s:42:"index.php?topic-tag=$matches[1]&embed=true";s:45:"forums/topic-tag/([^/]+)/page/?([0-9]{1,})/?$";s:49:"index.php?topic-tag=$matches[1]&paged=$matches[2]";s:27:"forums/topic-tag/([^/]+)/?$";s:31:"index.php?topic-tag=$matches[1]";s:42:"forums/search/([^/]+)/page/?([0-9]{1,})/?$";s:50:"index.php?bbp_search=$matches[1]&paged=$matches[2]";s:24:"forums/search/([^/]+)/?$";s:32:"index.php?bbp_search=$matches[1]";s:38:"ia_invites/[^/]+/attachment/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:48:"ia_invites/[^/]+/attachment/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:68:"ia_invites/[^/]+/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:63:"ia_invites/[^/]+/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:63:"ia_invites/[^/]+/attachment/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:44:"ia_invites/[^/]+/attachment/([^/]+)/embed/?$";s:43:"index.php?attachment=$matches[1]&embed=true";s:27:"ia_invites/([^/]+)/embed/?$";s:43:"index.php?ia_invites=$matches[1]&embed=true";s:31:"ia_invites/([^/]+)/trackback/?$";s:37:"index.php?ia_invites=$matches[1]&tb=1";s:39:"ia_invites/([^/]+)/page/?([0-9]{1,})/?$";s:50:"index.php?ia_invites=$matches[1]&paged=$matches[2]";s:46:"ia_invites/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?ia_invites=$matches[1]&cpage=$matches[2]";s:35:"ia_invites/([^/]+)(?:/([0-9]+))?/?$";s:49:"index.php?ia_invites=$matches[1]&page=$matches[2]";s:27:"ia_invites/[^/]+/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:37:"ia_invites/[^/]+/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:57:"ia_invites/[^/]+/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:52:"ia_invites/[^/]+/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:52:"ia_invites/[^/]+/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:33:"ia_invites/[^/]+/([^/]+)/embed/?$";s:43:"index.php?attachment=$matches[1]&embed=true";s:52:"ia_invitees/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:50:"index.php?ia_invitees=$matches[1]&feed=$matches[2]";s:47:"ia_invitees/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:50:"index.php?ia_invitees=$matches[1]&feed=$matches[2]";s:28:"ia_invitees/([^/]+)/embed/?$";s:44:"index.php?ia_invitees=$matches[1]&embed=true";s:40:"ia_invitees/([^/]+)/page/?([0-9]{1,})/?$";s:51:"index.php?ia_invitees=$matches[1]&paged=$matches[2]";s:22:"ia_invitees/([^/]+)/?$";s:33:"index.php?ia_invitees=$matches[1]";s:58:"ia_invited_groups/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:56:"index.php?ia_invited_groups=$matches[1]&feed=$matches[2]";s:53:"ia_invited_groups/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:56:"index.php?ia_invited_groups=$matches[1]&feed=$matches[2]";s:34:"ia_invited_groups/([^/]+)/embed/?$";s:50:"index.php?ia_invited_groups=$matches[1]&embed=true";s:46:"ia_invited_groups/([^/]+)/page/?([0-9]{1,})/?$";s:57:"index.php?ia_invited_groups=$matches[1]&paged=$matches[2]";s:28:"ia_invited_groups/([^/]+)/?$";s:39:"index.php?ia_invited_groups=$matches[1]";s:54:"calendar_feed/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:52:"index.php?calendar_feed=$matches[1]&feed=$matches[2]";s:49:"calendar_feed/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:52:"index.php?calendar_feed=$matches[1]&feed=$matches[2]";s:30:"calendar_feed/([^/]+)/embed/?$";s:46:"index.php?calendar_feed=$matches[1]&embed=true";s:42:"calendar_feed/([^/]+)/page/?([0-9]{1,})/?$";s:53:"index.php?calendar_feed=$matches[1]&paged=$matches[2]";s:24:"calendar_feed/([^/]+)/?$";s:35:"index.php?calendar_feed=$matches[1]";s:54:"calendar_type/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:52:"index.php?calendar_type=$matches[1]&feed=$matches[2]";s:49:"calendar_type/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:52:"index.php?calendar_type=$matches[1]&feed=$matches[2]";s:30:"calendar_type/([^/]+)/embed/?$";s:46:"index.php?calendar_type=$matches[1]&embed=true";s:42:"calendar_type/([^/]+)/page/?([0-9]{1,})/?$";s:53:"index.php?calendar_type=$matches[1]&paged=$matches[2]";s:24:"calendar_type/([^/]+)/?$";s:35:"index.php?calendar_type=$matches[1]";s:58:"calendar_category/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:56:"index.php?calendar_category=$matches[1]&feed=$matches[2]";s:53:"calendar_category/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:56:"index.php?calendar_category=$matches[1]&feed=$matches[2]";s:34:"calendar_category/([^/]+)/embed/?$";s:50:"index.php?calendar_category=$matches[1]&embed=true";s:46:"calendar_category/([^/]+)/page/?([0-9]{1,})/?$";s:57:"index.php?calendar_category=$matches[1]&paged=$matches[2]";s:28:"calendar_category/([^/]+)/?$";s:39:"index.php?calendar_category=$matches[1]";s:36:"calendar/[^/]+/attachment/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:46:"calendar/[^/]+/attachment/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:66:"calendar/[^/]+/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:61:"calendar/[^/]+/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:61:"calendar/[^/]+/attachment/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:42:"calendar/[^/]+/attachment/([^/]+)/embed/?$";s:43:"index.php?attachment=$matches[1]&embed=true";s:25:"calendar/([^/]+)/embed/?$";s:41:"index.php?calendar=$matches[1]&embed=true";s:29:"calendar/([^/]+)/trackback/?$";s:35:"index.php?calendar=$matches[1]&tb=1";s:37:"calendar/([^/]+)/page/?([0-9]{1,})/?$";s:48:"index.php?calendar=$matches[1]&paged=$matches[2]";s:44:"calendar/([^/]+)/comment-page-([0-9]{1,})/?$";s:48:"index.php?calendar=$matches[1]&cpage=$matches[2]";s:33:"calendar/([^/]+)(?:/([0-9]+))?/?$";s:47:"index.php?calendar=$matches[1]&page=$matches[2]";s:25:"calendar/[^/]+/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:35:"calendar/[^/]+/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:55:"calendar/[^/]+/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:50:"calendar/[^/]+/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:50:"calendar/[^/]+/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:31:"calendar/[^/]+/([^/]+)/embed/?$";s:43:"index.php?attachment=$matches[1]&embed=true";s:39:"xtec_report/[^/]+/attachment/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:49:"xtec_report/[^/]+/attachment/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:69:"xtec_report/[^/]+/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:64:"xtec_report/[^/]+/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:64:"xtec_report/[^/]+/attachment/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:45:"xtec_report/[^/]+/attachment/([^/]+)/embed/?$";s:43:"index.php?attachment=$matches[1]&embed=true";s:28:"xtec_report/([^/]+)/embed/?$";s:44:"index.php?xtec_report=$matches[1]&embed=true";s:32:"xtec_report/([^/]+)/trackback/?$";s:38:"index.php?xtec_report=$matches[1]&tb=1";s:40:"xtec_report/([^/]+)/page/?([0-9]{1,})/?$";s:51:"index.php?xtec_report=$matches[1]&paged=$matches[2]";s:47:"xtec_report/([^/]+)/comment-page-([0-9]{1,})/?$";s:51:"index.php?xtec_report=$matches[1]&cpage=$matches[2]";s:36:"xtec_report/([^/]+)(?:/([0-9]+))?/?$";s:50:"index.php?xtec_report=$matches[1]&page=$matches[2]";s:28:"xtec_report/[^/]+/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:38:"xtec_report/[^/]+/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:58:"xtec_report/[^/]+/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:53:"xtec_report/[^/]+/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:53:"xtec_report/[^/]+/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:34:"xtec_report/[^/]+/([^/]+)/embed/?$";s:43:"index.php?attachment=$matches[1]&embed=true";s:55:"bp_member_type/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:53:"index.php?bp_member_type=$matches[1]&feed=$matches[2]";s:50:"bp_member_type/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:53:"index.php?bp_member_type=$matches[1]&feed=$matches[2]";s:31:"bp_member_type/([^/]+)/embed/?$";s:47:"index.php?bp_member_type=$matches[1]&embed=true";s:43:"bp_member_type/([^/]+)/page/?([0-9]{1,})/?$";s:54:"index.php?bp_member_type=$matches[1]&paged=$matches[2]";s:25:"bp_member_type/([^/]+)/?$";s:36:"index.php?bp_member_type=$matches[1]";s:54:"bp_group_type/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:52:"index.php?bp_group_type=$matches[1]&feed=$matches[2]";s:49:"bp_group_type/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:52:"index.php?bp_group_type=$matches[1]&feed=$matches[2]";s:30:"bp_group_type/([^/]+)/embed/?$";s:46:"index.php?bp_group_type=$matches[1]&embed=true";s:42:"bp_group_type/([^/]+)/page/?([0-9]{1,})/?$";s:53:"index.php?bp_group_type=$matches[1]&paged=$matches[2]";s:24:"bp_group_type/([^/]+)/?$";s:35:"index.php?bp_group_type=$matches[1]";s:30:"docs/.+?/attachment/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:40:"docs/.+?/attachment/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:60:"docs/.+?/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:55:"docs/.+?/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:55:"docs/.+?/attachment/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:36:"docs/.+?/attachment/([^/]+)/embed/?$";s:43:"index.php?attachment=$matches[1]&embed=true";s:19:"docs/(.+?)/embed/?$";s:39:"index.php?bp_doc=$matches[1]&embed=true";s:23:"docs/(.+?)/trackback/?$";s:33:"index.php?bp_doc=$matches[1]&tb=1";s:43:"docs/(.+?)/feed/(feed|rdf|rss|rss2|atom)/?$";s:45:"index.php?bp_doc=$matches[1]&feed=$matches[2]";s:38:"docs/(.+?)/(feed|rdf|rss|rss2|atom)/?$";s:45:"index.php?bp_doc=$matches[1]&feed=$matches[2]";s:31:"docs/(.+?)/page/?([0-9]{1,})/?$";s:46:"index.php?bp_doc=$matches[1]&paged=$matches[2]";s:38:"docs/(.+?)/comment-page-([0-9]{1,})/?$";s:46:"index.php?bp_doc=$matches[1]&cpage=$matches[2]";s:27:"docs/(.+?)(?:/([0-9]+))?/?$";s:45:"index.php?bp_doc=$matches[1]&page=$matches[2]";s:45:"item/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:50:"index.php?bp_docs_tag=$matches[1]&feed=$matches[2]";s:40:"item/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:50:"index.php?bp_docs_tag=$matches[1]&feed=$matches[2]";s:21:"item/([^/]+)/embed/?$";s:44:"index.php?bp_docs_tag=$matches[1]&embed=true";s:33:"item/([^/]+)/page/?([0-9]{1,})/?$";s:51:"index.php?bp_docs_tag=$matches[1]&paged=$matches[2]";s:15:"item/([^/]+)/?$";s:33:"index.php?bp_docs_tag=$matches[1]";s:55:"bp_docs_access/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:67:"index.php?taxonomy=bp_docs_access&term=$matches[1]&feed=$matches[2]";s:50:"bp_docs_access/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:67:"index.php?taxonomy=bp_docs_access&term=$matches[1]&feed=$matches[2]";s:31:"bp_docs_access/([^/]+)/embed/?$";s:61:"index.php?taxonomy=bp_docs_access&term=$matches[1]&embed=true";s:43:"bp_docs_access/([^/]+)/page/?([0-9]{1,})/?$";s:68:"index.php?taxonomy=bp_docs_access&term=$matches[1]&paged=$matches[2]";s:25:"bp_docs_access/([^/]+)/?$";s:50:"index.php?taxonomy=bp_docs_access&term=$matches[1]";s:63:"bp_docs_comment_access/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:75:"index.php?taxonomy=bp_docs_comment_access&term=$matches[1]&feed=$matches[2]";s:58:"bp_docs_comment_access/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:75:"index.php?taxonomy=bp_docs_comment_access&term=$matches[1]&feed=$matches[2]";s:39:"bp_docs_comment_access/([^/]+)/embed/?$";s:69:"index.php?taxonomy=bp_docs_comment_access&term=$matches[1]&embed=true";s:51:"bp_docs_comment_access/([^/]+)/page/?([0-9]{1,})/?$";s:76:"index.php?taxonomy=bp_docs_comment_access&term=$matches[1]&paged=$matches[2]";s:33:"bp_docs_comment_access/([^/]+)/?$";s:58:"index.php?taxonomy=bp_docs_comment_access&term=$matches[1]";s:40:"bp_docs_folder/.+?/attachment/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:50:"bp_docs_folder/.+?/attachment/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:70:"bp_docs_folder/.+?/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:65:"bp_docs_folder/.+?/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:65:"bp_docs_folder/.+?/attachment/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:46:"bp_docs_folder/.+?/attachment/([^/]+)/embed/?$";s:43:"index.php?attachment=$matches[1]&embed=true";s:29:"bp_docs_folder/(.+?)/embed/?$";s:47:"index.php?bp_docs_folder=$matches[1]&embed=true";s:33:"bp_docs_folder/(.+?)/trackback/?$";s:41:"index.php?bp_docs_folder=$matches[1]&tb=1";s:41:"bp_docs_folder/(.+?)/page/?([0-9]{1,})/?$";s:54:"index.php?bp_docs_folder=$matches[1]&paged=$matches[2]";s:48:"bp_docs_folder/(.+?)/comment-page-([0-9]{1,})/?$";s:54:"index.php?bp_docs_folder=$matches[1]&cpage=$matches[2]";s:37:"bp_docs_folder/(.+?)(?:/([0-9]+))?/?$";s:53:"index.php?bp_docs_folder=$matches[1]&page=$matches[2]";s:62:"bp_docs_doc_in_folder/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:60:"index.php?bp_docs_doc_in_folder=$matches[1]&feed=$matches[2]";s:57:"bp_docs_doc_in_folder/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:60:"index.php?bp_docs_doc_in_folder=$matches[1]&feed=$matches[2]";s:38:"bp_docs_doc_in_folder/([^/]+)/embed/?$";s:54:"index.php?bp_docs_doc_in_folder=$matches[1]&embed=true";s:50:"bp_docs_doc_in_folder/([^/]+)/page/?([0-9]{1,})/?$";s:61:"index.php?bp_docs_doc_in_folder=$matches[1]&paged=$matches[2]";s:32:"bp_docs_doc_in_folder/([^/]+)/?$";s:43:"index.php?bp_docs_doc_in_folder=$matches[1]";s:63:"bp_docs_folder_in_user/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:61:"index.php?bp_docs_folder_in_user=$matches[1]&feed=$matches[2]";s:58:"bp_docs_folder_in_user/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:61:"index.php?bp_docs_folder_in_user=$matches[1]&feed=$matches[2]";s:39:"bp_docs_folder_in_user/([^/]+)/embed/?$";s:55:"index.php?bp_docs_folder_in_user=$matches[1]&embed=true";s:51:"bp_docs_folder_in_user/([^/]+)/page/?([0-9]{1,})/?$";s:62:"index.php?bp_docs_folder_in_user=$matches[1]&paged=$matches[2]";s:33:"bp_docs_folder_in_user/([^/]+)/?$";s:44:"index.php?bp_docs_folder_in_user=$matches[1]";s:64:"bp_docs_folder_in_group/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:62:"index.php?bp_docs_folder_in_group=$matches[1]&feed=$matches[2]";s:59:"bp_docs_folder_in_group/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:62:"index.php?bp_docs_folder_in_group=$matches[1]&feed=$matches[2]";s:40:"bp_docs_folder_in_group/([^/]+)/embed/?$";s:56:"index.php?bp_docs_folder_in_group=$matches[1]&embed=true";s:52:"bp_docs_folder_in_group/([^/]+)/page/?([0-9]{1,})/?$";s:63:"index.php?bp_docs_folder_in_group=$matches[1]&paged=$matches[2]";s:34:"bp_docs_folder_in_group/([^/]+)/?$";s:45:"index.php?bp_docs_folder_in_group=$matches[1]";s:39:"es_template/[^/]+/attachment/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:49:"es_template/[^/]+/attachment/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:69:"es_template/[^/]+/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:64:"es_template/[^/]+/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:64:"es_template/[^/]+/attachment/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:45:"es_template/[^/]+/attachment/([^/]+)/embed/?$";s:43:"index.php?attachment=$matches[1]&embed=true";s:28:"es_template/([^/]+)/embed/?$";s:44:"index.php?es_template=$matches[1]&embed=true";s:32:"es_template/([^/]+)/trackback/?$";s:38:"index.php?es_template=$matches[1]&tb=1";s:40:"es_template/([^/]+)/page/?([0-9]{1,})/?$";s:51:"index.php?es_template=$matches[1]&paged=$matches[2]";s:47:"es_template/([^/]+)/comment-page-([0-9]{1,})/?$";s:51:"index.php?es_template=$matches[1]&cpage=$matches[2]";s:36:"es_template/([^/]+)(?:/([0-9]+))?/?$";s:50:"index.php?es_template=$matches[1]&page=$matches[2]";s:28:"es_template/[^/]+/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:38:"es_template/[^/]+/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:58:"es_template/[^/]+/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:53:"es_template/[^/]+/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:53:"es_template/[^/]+/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:34:"es_template/[^/]+/([^/]+)/embed/?$";s:43:"index.php?attachment=$matches[1]&embed=true";s:35:"slideshow/.+?/attachment/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:45:"slideshow/.+?/attachment/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:65:"slideshow/.+?/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:60:"slideshow/.+?/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:60:"slideshow/.+?/attachment/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:41:"slideshow/.+?/attachment/([^/]+)/embed/?$";s:43:"index.php?attachment=$matches[1]&embed=true";s:24:"slideshow/(.+?)/embed/?$";s:42:"index.php?slideshow=$matches[1]&embed=true";s:28:"slideshow/(.+?)/trackback/?$";s:36:"index.php?slideshow=$matches[1]&tb=1";s:48:"slideshow/(.+?)/feed/(feed|rdf|rss|rss2|atom)/?$";s:48:"index.php?slideshow=$matches[1]&feed=$matches[2]";s:43:"slideshow/(.+?)/(feed|rdf|rss|rss2|atom)/?$";s:48:"index.php?slideshow=$matches[1]&feed=$matches[2]";s:36:"slideshow/(.+?)/page/?([0-9]{1,})/?$";s:49:"index.php?slideshow=$matches[1]&paged=$matches[2]";s:43:"slideshow/(.+?)/comment-page-([0-9]{1,})/?$";s:49:"index.php?slideshow=$matches[1]&cpage=$matches[2]";s:32:"slideshow/(.+?)(?:/([0-9]+))?/?$";s:48:"index.php?slideshow=$matches[1]&page=$matches[2]";s:44:"calendar_booking/[^/]+/attachment/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:54:"calendar_booking/[^/]+/attachment/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:74:"calendar_booking/[^/]+/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:69:"calendar_booking/[^/]+/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:69:"calendar_booking/[^/]+/attachment/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:50:"calendar_booking/[^/]+/attachment/([^/]+)/embed/?$";s:43:"index.php?attachment=$matches[1]&embed=true";s:33:"calendar_booking/([^/]+)/embed/?$";s:49:"index.php?calendar_booking=$matches[1]&embed=true";s:37:"calendar_booking/([^/]+)/trackback/?$";s:43:"index.php?calendar_booking=$matches[1]&tb=1";s:45:"calendar_booking/([^/]+)/page/?([0-9]{1,})/?$";s:56:"index.php?calendar_booking=$matches[1]&paged=$matches[2]";s:52:"calendar_booking/([^/]+)/comment-page-([0-9]{1,})/?$";s:56:"index.php?calendar_booking=$matches[1]&cpage=$matches[2]";s:41:"calendar_booking/([^/]+)(?:/([0-9]+))?/?$";s:55:"index.php?calendar_booking=$matches[1]&page=$matches[2]";s:33:"calendar_booking/[^/]+/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:43:"calendar_booking/[^/]+/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:63:"calendar_booking/[^/]+/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:58:"calendar_booking/[^/]+/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:58:"calendar_booking/[^/]+/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:39:"calendar_booking/[^/]+/([^/]+)/embed/?$";s:43:"index.php?attachment=$matches[1]&embed=true";s:46:"calendar_resources/[^/]+/attachment/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:56:"calendar_resources/[^/]+/attachment/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:76:"calendar_resources/[^/]+/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:71:"calendar_resources/[^/]+/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:71:"calendar_resources/[^/]+/attachment/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:52:"calendar_resources/[^/]+/attachment/([^/]+)/embed/?$";s:43:"index.php?attachment=$matches[1]&embed=true";s:35:"calendar_resources/([^/]+)/embed/?$";s:51:"index.php?calendar_resources=$matches[1]&embed=true";s:39:"calendar_resources/([^/]+)/trackback/?$";s:45:"index.php?calendar_resources=$matches[1]&tb=1";s:47:"calendar_resources/([^/]+)/page/?([0-9]{1,})/?$";s:58:"index.php?calendar_resources=$matches[1]&paged=$matches[2]";s:54:"calendar_resources/([^/]+)/comment-page-([0-9]{1,})/?$";s:58:"index.php?calendar_resources=$matches[1]&cpage=$matches[2]";s:43:"calendar_resources/([^/]+)(?:/([0-9]+))?/?$";s:57:"index.php?calendar_resources=$matches[1]&page=$matches[2]";s:35:"calendar_resources/[^/]+/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:45:"calendar_resources/[^/]+/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:65:"calendar_resources/[^/]+/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:60:"calendar_resources/[^/]+/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:60:"calendar_resources/[^/]+/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:41:"calendar_resources/[^/]+/([^/]+)/embed/?$";s:43:"index.php?attachment=$matches[1]&embed=true";s:48:".*wp-(atom|rdf|rss|rss2|feed|commentsrss2)\\.php$";s:18:"index.php?feed=old";s:20:".*wp-app\\.php(/.*)?$";s:19:"index.php?error=403";s:18:".*wp-register.php$";s:23:"index.php?register=true";s:32:"feed/(feed|rdf|rss|rss2|atom)/?$";s:27:"index.php?&feed=$matches[1]";s:27:"(feed|rdf|rss|rss2|atom)/?$";s:27:"index.php?&feed=$matches[1]";s:8:"embed/?$";s:21:"index.php?&embed=true";s:20:"page/?([0-9]{1,})/?$";s:28:"index.php?&paged=$matches[1]";s:27:"comment-page-([0-9]{1,})/?$";s:38:"index.php?&page_id=7&cpage=$matches[1]";s:41:"comments/feed/(feed|rdf|rss|rss2|atom)/?$";s:42:"index.php?&feed=$matches[1]&withcomments=1";s:36:"comments/(feed|rdf|rss|rss2|atom)/?$";s:42:"index.php?&feed=$matches[1]&withcomments=1";s:17:"comments/embed/?$";s:21:"index.php?&embed=true";s:44:"search/(.+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:40:"index.php?s=$matches[1]&feed=$matches[2]";s:39:"search/(.+)/(feed|rdf|rss|rss2|atom)/?$";s:40:"index.php?s=$matches[1]&feed=$matches[2]";s:20:"search/(.+)/embed/?$";s:34:"index.php?s=$matches[1]&embed=true";s:32:"search/(.+)/page/?([0-9]{1,})/?$";s:41:"index.php?s=$matches[1]&paged=$matches[2]";s:14:"search/(.+)/?$";s:23:"index.php?s=$matches[1]";s:47:"author/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:50:"index.php?author_name=$matches[1]&feed=$matches[2]";s:42:"author/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:50:"index.php?author_name=$matches[1]&feed=$matches[2]";s:23:"author/([^/]+)/embed/?$";s:44:"index.php?author_name=$matches[1]&embed=true";s:35:"author/([^/]+)/page/?([0-9]{1,})/?$";s:51:"index.php?author_name=$matches[1]&paged=$matches[2]";s:17:"author/([^/]+)/?$";s:33:"index.php?author_name=$matches[1]";s:69:"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/feed/(feed|rdf|rss|rss2|atom)/?$";s:80:"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&feed=$matches[4]";s:64:"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/(feed|rdf|rss|rss2|atom)/?$";s:80:"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&feed=$matches[4]";s:45:"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/embed/?$";s:74:"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&embed=true";s:57:"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/page/?([0-9]{1,})/?$";s:81:"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&paged=$matches[4]";s:39:"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/?$";s:63:"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]";s:56:"([0-9]{4})/([0-9]{1,2})/feed/(feed|rdf|rss|rss2|atom)/?$";s:64:"index.php?year=$matches[1]&monthnum=$matches[2]&feed=$matches[3]";s:51:"([0-9]{4})/([0-9]{1,2})/(feed|rdf|rss|rss2|atom)/?$";s:64:"index.php?year=$matches[1]&monthnum=$matches[2]&feed=$matches[3]";s:32:"([0-9]{4})/([0-9]{1,2})/embed/?$";s:58:"index.php?year=$matches[1]&monthnum=$matches[2]&embed=true";s:44:"([0-9]{4})/([0-9]{1,2})/page/?([0-9]{1,})/?$";s:65:"index.php?year=$matches[1]&monthnum=$matches[2]&paged=$matches[3]";s:26:"([0-9]{4})/([0-9]{1,2})/?$";s:47:"index.php?year=$matches[1]&monthnum=$matches[2]";s:43:"([0-9]{4})/feed/(feed|rdf|rss|rss2|atom)/?$";s:43:"index.php?year=$matches[1]&feed=$matches[2]";s:38:"([0-9]{4})/(feed|rdf|rss|rss2|atom)/?$";s:43:"index.php?year=$matches[1]&feed=$matches[2]";s:19:"([0-9]{4})/embed/?$";s:37:"index.php?year=$matches[1]&embed=true";s:31:"([0-9]{4})/page/?([0-9]{1,})/?$";s:44:"index.php?year=$matches[1]&paged=$matches[2]";s:13:"([0-9]{4})/?$";s:26:"index.php?year=$matches[1]";s:27:".?.+?/attachment/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:37:".?.+?/attachment/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:57:".?.+?/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:52:".?.+?/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:52:".?.+?/attachment/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:33:".?.+?/attachment/([^/]+)/embed/?$";s:43:"index.php?attachment=$matches[1]&embed=true";s:16:"(.?.+?)/embed/?$";s:41:"index.php?pagename=$matches[1]&embed=true";s:20:"(.?.+?)/trackback/?$";s:35:"index.php?pagename=$matches[1]&tb=1";s:40:"(.?.+?)/feed/(feed|rdf|rss|rss2|atom)/?$";s:47:"index.php?pagename=$matches[1]&feed=$matches[2]";s:35:"(.?.+?)/(feed|rdf|rss|rss2|atom)/?$";s:47:"index.php?pagename=$matches[1]&feed=$matches[2]";s:28:"(.?.+?)/page/?([0-9]{1,})/?$";s:48:"index.php?pagename=$matches[1]&paged=$matches[2]";s:35:"(.?.+?)/comment-page-([0-9]{1,})/?$";s:48:"index.php?pagename=$matches[1]&cpage=$matches[2]";s:24:"(.?.+?)(?:/([0-9]+))?/?$";s:47:"index.php?pagename=$matches[1]&page=$matches[2]";s:31:".+?/[^/]+/attachment/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:41:".+?/[^/]+/attachment/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:61:".+?/[^/]+/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:56:".+?/[^/]+/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:56:".+?/[^/]+/attachment/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:37:".+?/[^/]+/attachment/([^/]+)/embed/?$";s:43:"index.php?attachment=$matches[1]&embed=true";s:22:"(.+?)/([^/]+)/embed/?$";s:63:"index.php?category_name=$matches[1]&name=$matches[2]&embed=true";s:26:"(.+?)/([^/]+)/trackback/?$";s:57:"index.php?category_name=$matches[1]&name=$matches[2]&tb=1";s:46:"(.+?)/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:69:"index.php?category_name=$matches[1]&name=$matches[2]&feed=$matches[3]";s:41:"(.+?)/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:69:"index.php?category_name=$matches[1]&name=$matches[2]&feed=$matches[3]";s:34:"(.+?)/([^/]+)/page/?([0-9]{1,})/?$";s:70:"index.php?category_name=$matches[1]&name=$matches[2]&paged=$matches[3]";s:41:"(.+?)/([^/]+)/comment-page-([0-9]{1,})/?$";s:70:"index.php?category_name=$matches[1]&name=$matches[2]&cpage=$matches[3]";s:30:"(.+?)/([^/]+)(?:/([0-9]+))?/?$";s:69:"index.php?category_name=$matches[1]&name=$matches[2]&page=$matches[3]";s:20:".+?/[^/]+/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:30:".+?/[^/]+/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:50:".+?/[^/]+/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:45:".+?/[^/]+/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:45:".+?/[^/]+/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:26:".+?/[^/]+/([^/]+)/embed/?$";s:43:"index.php?attachment=$matches[1]&embed=true";s:38:"(.+?)/feed/(feed|rdf|rss|rss2|atom)/?$";s:52:"index.php?category_name=$matches[1]&feed=$matches[2]";s:33:"(.+?)/(feed|rdf|rss|rss2|atom)/?$";s:52:"index.php?category_name=$matches[1]&feed=$matches[2]";s:14:"(.+?)/embed/?$";s:46:"index.php?category_name=$matches[1]&embed=true";s:26:"(.+?)/page/?([0-9]{1,})/?$";s:53:"index.php?category_name=$matches[1]&paged=$matches[2]";s:33:"(.+?)/comment-page-([0-9]{1,})/?$";s:53:"index.php?category_name=$matches[1]&cpage=$matches[2]";s:8:"(.+?)/?$";s:35:"index.php?category_name=$matches[1]";}', 'yes'),
(2848, 'widget_widget_recent_bp_docs', 'a:2:{i:1;a:0:{}s:12:"_multiwidget";i:1;}', 'yes'),
(3111, 'bp-plugin-enabled-post-home', '1', 'yes'),
(3606, 'calendar_feed_children', 'a:0:{}', 'yes'),
(3607, 'calendar_type_children', 'a:0:{}', 'yes'),
(3608, 'simple-calendar_settings_feeds', 'a:1:{s:6:"google";a:1:{s:7:"api_key";s:0:"";}}', 'yes'),
(3609, 'simple-calendar_settings_advanced', 'a:1:{s:6:"assets";a:1:{s:11:"disable_css";s:0:"";}}', 'yes'),
(3614, 'simple-calendar_version', '3.1.9', 'yes'),
(3636, 'simple-calendar_admin_notices', 'a:0:{}', 'yes'),
(3651, 'calendar_category_children', 'a:0:{}', 'yes'),
(4628, 'bp-emails-unsubscribe-salt', 'ZW0mZEB7fV5uMCxgMDJYJmdSYT1qRVpBa2RqYVI/Z0xdIXpHSm0uYHs6eFg+XkluUHF1cjtnRzQ/OlhHbFdVJQ==', 'yes'),
(4629, '_bp_ignore_deprecated_code', '', 'yes'),
(5559, 'widget_toc-widget', 'a:1:{s:12:"_multiwidget";i:1;}', 'yes'),
(9190, 'widget_media_audio', 'a:1:{s:12:"_multiwidget";i:1;}', 'yes'),
(9191, 'widget_media_image', 'a:1:{s:12:"_multiwidget";i:1;}', 'yes'),
(9192, 'widget_media_gallery', 'a:1:{s:12:"_multiwidget";i:1;}', 'yes'),
(9193, 'widget_media_video', 'a:1:{s:12:"_multiwidget";i:1;}', 'yes'),
(9194, 'widget_custom_html', 'a:1:{s:12:"_multiwidget";i:1;}', 'yes'),
(9538, 'wptelegram_ver', '2.0.9', 'yes'),
(9539, 'widget_email-subscribers-form', 'a:1:{s:12:"_multiwidget";i:1;}', 'yes'),
(9542, 'ig_es_from_name', 'ZER L&#039;Arany', 'no'),
(9543, 'ig_es_from_email', 'a8000010@xtec.cat', 'no'),
(9544, 'ig_es_admin_new_contact_email_subject', 'One more contact joins our tribe!', 'no'),
(9545, 'ig_es_admin_new_contact_email_content', 'Hi,\r\n\r\nYour friendly Email Subscribers notification bot here!\r\n\r\n{{NAME}} ({{EMAIL}}) joined our tribe just now.\r\n\r\nWhich list/s? {{LIST}}\r\n\r\nIf you know this person, or if they are an influencer, you may want to reach out to them personally!\r\n\r\nLater...', 'no'),
(9546, 'ig_es_admin_emails', 'a8000010@xtec.cat', 'no'),
(9547, 'ig_es_confirmation_mail_subject', 'Thanks!', 'no'),
(9548, 'ig_es_confirmation_mail_content', 'Hi {{NAME}},\r\n\r\nJust one more step before we share the awesomeness from {{SITENAME}}!\r\n\r\nPlease confirm your subscription by clicking on this link:\r\n\r\n{{LINK}}\r\n\r\nThanks!', 'no'),
(9549, 'ig_es_enable_welcome_email', 'yes', 'no'),
(9550, 'ig_es_welcome_email_subject', 'Welcome to {{SITENAME}}', 'no'),
(9551, 'ig_es_welcome_email_content', 'Hi {{NAME}},\r\n\r\nJust wanted to send you a quick note...\r\n\r\nThank you for joining the awesome {{SITENAME}} tribe.\r\n\r\nOnly valuable emails from me, promise!\r\n\r\nThanks!', 'no'),
(9552, 'ig_es_enable_cron_admin_email', 'Hi Admin,\r\n\r\nCron URL has been triggered successfully on {{DATE}} for the email ''{{SUBJECT}}''. And it sent email to {{COUNT}} recipient(s).\r\n\r\nBest,\r\nZER L&#039;Arany', 'no'),
(9553, 'ig_es_cron_admin_email', 'Hi Admin,\r\n\r\nCron URL has been triggered successfully on {{DATE}} for the email ''{{SUBJECT}}''. And it sent email to {{COUNT}} recipient(s).\r\n\r\nBest,\r\nZER L&#039;Arany', 'no'),
(9554, 'ig_es_cronurl', 'https://pwc-int.educacio.intranet/agora/masterzer/?es=cron&guid=mrawnz-hgjsat-azgrpv-rwajym-zqgrmf', 'no'),
(9555, 'ig_es_hourly_email_send_limit', '300', 'no'),
(9556, 'ig_es_sent_report_subject', 'Your email has been sent', 'no'),
(9557, 'ig_es_sent_report_content', 'Hi Admin,\n\nEmail has been sent successfully to {{COUNT}} email(s). Please find the details below:\n\nUnique ID: {{UNIQUE}}\nStart Time: {{STARTTIME}}\nEnd Time: {{ENDTIME}}\nFor more information, login to your dashboard and go to Reports menu in Email Subscribers.\n\nThank You.', 'no'),
(9558, 'ig_es_unsubscribe_link', 'https://pwc-int.educacio.intranet/agora/masterzer/?es=unsubscribe&db={{DBID}}&email={{EMAIL}}&guid={{GUID}}', 'no'),
(9559, 'ig_es_optin_link', 'https://pwc-int.educacio.intranet/agora/masterzer/?es=optin&db={{DBID}}&email={{EMAIL}}&guid={{GUID}}', 'no'),
(9560, 'ig_es_unsubscribe_link_content', 'I''d be sad to see you go. But if you want to, you can unsubscribe from here: {{UNSUBSCRIBE-LINK}}', 'no'),
(9561, 'ig_es_email_type', 'wp_mail_html', 'no'),
(9562, 'ig_es_notify_admin', 'no', 'no'),
(9563, 'ig_es_optin_type', 'double_opt_in', 'no'),
(9564, 'ig_es_subscription_error_messsage', 'Hmm.. Something''s amiss..\r\n\r\nCould not complete your request. That email address  is probably already subscribed. Or worse blocked!!\r\n\r\nPlease try again after some time - or contact us if the problem persists.\r\n\r\n', 'no'),
(9565, 'ig_es_subscription_success_message', 'You have been successfully subscribed.', 'no'),
(9566, 'ig_es_unsubscribe_error_message', 'Urrgh.. Something''s wrong..\r\n\r\nAre you sure that email address is on our file? There was some problem in completing your request.\r\n\r\nPlease try again after some time - or contact us if the problem persists.\r\n\r\n', 'no'),
(9567, 'ig_es_unsubscribe_success_message', '<h2>Unsubscribed.</h2><p>You will no longer hear from us. ☹️ Sorry to see you go!</p>', 'no'),
(9568, 'ig_es_post_image_size', 'thumbnail', 'no');
INSERT INTO `wp_options` (`option_id`, `option_name`, `option_value`, `autoload`) VALUES
(9570, 'ig_es_current_version_date_details', '', 'no'),
(9571, 'ig_es_enable_captcha', '', 'no'),
(9572, 'ig_es_roles_and_capabilities', '', 'no'),
(9573, 'ig_es_sample_data_imported', 'no', 'no'),
(9574, 'ig_es_default_subscriber_imported', 'no', 'no'),
(9575, 'ig_es_set_widget', '', 'no'),
(9576, 'ig_es_sync_wp_users', '', 'no'),
(9577, 'ig_es_blocked_domains', 'mail.ru', 'no'),
(9578, 'ig_es_db_version', '4.0.9', 'yes'),
(9581, 'ig_admin_notices', 'a:0:{}', 'yes'),
(9586, 'wp_page_for_privacy_policy', '0', 'yes'),
(9587, 'show_comments_cookies_opt_in', '1', 'yes'),
(9593, '_ges_installed_before_39', '1', 'yes'),
(9594, '_ges_39_subscriptions_table_created', '1', 'yes'),
(9595, '_ges_39_queued_items_table_created', '1', 'yes'),
(9596, '_ges_revision_date', '2019-03-20 16:00 UTC', 'yes'),
(9606, 'can_compress_scripts', '1', 'no'),
(9607, '_ges_39_subscriptions_migrated', '1', 'yes'),
(9609, '_ges_39_digest_queue_migrated', '1', 'yes'),
(9612, 'acui_columns', 'a:0:{}', 'yes'),
(9613, 'acui_mail_subject', 'Benvinguts a ZER L&#039;Arany', 'yes'),
(9614, 'acui_mail_body', 'Benvinguts,<br/>Les vostres dades per iniciar sessió en aquest lloc són:<br/><ul><li>Adreça d''inici de sessió (URL): **loginurl**</li><li>Nom d''usuari= **username**</li><li>Password = **password**</li></ul>', 'yes'),
(9615, 'acui_mail_template_id', '0', 'yes'),
(9616, 'acui_mail_attachment_id', '0', 'yes'),
(9617, 'acui_enable_email_templates', '', 'yes'),
(9618, 'acui_cron_activated', '', 'yes'),
(9619, 'acui_cron_send_mail', '', 'yes'),
(9620, 'acui_cron_send_mail_updated', '', 'yes'),
(9621, 'acui_cron_delete_users', '', 'yes'),
(9622, 'acui_cron_delete_users_assign_posts', '0', 'yes'),
(9623, 'acui_cron_change_role_not_present', '', 'yes'),
(9624, 'acui_cron_change_role_not_present_role', '0', 'yes'),
(9625, 'acui_cron_path_to_file', '', 'yes'),
(9626, 'acui_cron_path_to_move', '', 'yes'),
(9627, 'acui_cron_path_to_move_auto_rename', '', 'yes'),
(9628, 'acui_cron_period', '', 'yes'),
(9629, 'acui_cron_role', '', 'yes'),
(9630, 'acui_cron_update_roles_existing_users', '', 'yes'),
(9631, 'acui_cron_log', '', 'yes'),
(9632, 'acui_cron_allow_multiple_accounts', 'not_allowed', 'yes'),
(9633, 'acui_frontend_send_mail', '', 'yes'),
(9634, 'acui_frontend_send_mail_updated', '', 'yes'),
(9635, 'acui_frontend_delete_users', '', 'yes'),
(9636, 'acui_frontend_delete_users_assign_posts', '0', 'yes'),
(9637, 'acui_frontend_change_role_not_present', '', 'yes'),
(9638, 'acui_frontend_change_role_not_present_role', '0', 'yes'),
(9639, 'acui_frontend_role', '', 'yes'),
(9640, 'acui_manually_send_mail', '', 'yes'),
(9641, 'acui_manually_send_mail_updated', '', 'yes'),
(9642, 'acui_automatic_wordpress_email', '', 'yes'),
(9643, 'acui_show_profile_fields', '', 'yes'),
(9644, 'acui_settings', 'wordpress', 'yes'),
(9645, 'acui_mail_from', '', 'yes'),
(9646, 'acui_mail_from_name', '', 'yes'),
(9647, 'acui_mailer', 'smtp', 'yes'),
(9648, 'acui_mail_set_return_path', 'false', 'yes'),
(9649, 'acui_smtp_host', 'localhost', 'yes'),
(9650, 'acui_smtp_port', '25', 'yes'),
(9651, 'acui_smtp_ssl', 'none', 'yes'),
(9652, 'acui_smtp_auth', '', 'yes'),
(9653, 'acui_smtp_user', '', 'yes'),
(9654, 'acui_smtp_pass', '', 'yes');

-- --------------------------------------------------------

--
-- Estructura de la taula `wp_postmeta`
--

CREATE TABLE IF NOT EXISTS `wp_postmeta` (
`meta_id` bigint(20) unsigned NOT NULL,
  `post_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `meta_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_value` longtext COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB AUTO_INCREMENT=3082 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Bolcant dades de la taula `wp_postmeta`
--

INSERT INTO `wp_postmeta` (`meta_id`, `post_id`, `meta_key`, `meta_value`) VALUES
(2, 7, '_edit_lock', '1437993882:2'),
(3, 7, '_edit_last', '2'),
(4, 7, '_wp_page_template', 'page-templates/front-page.php'),
(5, 7, '_rawhtml_settings', '0,0,0,0'),
(6, 7, '_template_layout', '2c-l'),
(30, 19, '_edit_lock', '1437994237:2'),
(31, 19, '_edit_last', '2'),
(32, 19, '_wp_page_template', 'page-templates/side-menu.php'),
(33, 21, '_edit_lock', '1437994066:2'),
(34, 21, '_edit_last', '2'),
(35, 21, '_wp_page_template', 'page-templates/side-menu.php'),
(36, 25, '_menu_item_type', 'post_type'),
(37, 25, '_menu_item_menu_item_parent', '0'),
(38, 25, '_menu_item_object_id', '19'),
(39, 25, '_menu_item_object', 'page'),
(40, 25, '_menu_item_target', ''),
(41, 25, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(42, 25, '_menu_item_xfn', ''),
(43, 25, '_menu_item_url', ''),
(45, 26, '_menu_item_type', 'post_type'),
(46, 26, '_menu_item_menu_item_parent', '25'),
(47, 26, '_menu_item_object_id', '21'),
(48, 26, '_menu_item_object', 'page'),
(49, 26, '_menu_item_target', ''),
(50, 26, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(51, 26, '_menu_item_xfn', ''),
(52, 26, '_menu_item_url', ''),
(68, 31, '_edit_lock', '1411129484:1'),
(69, 31, '_edit_last', '2'),
(70, 31, 'settings', 'a:26:{s:9:"animation";s:5:"slide";s:10:"slideSpeed";s:1:"1";s:16:"descriptionSpeed";s:3:"0.4";s:13:"intervalSpeed";s:1:"8";s:13:"slidesPerView";s:1:"1";s:8:"maxWidth";s:1:"0";s:11:"aspectRatio";s:3:"3:1";s:6:"height";s:3:"200";s:14:"imageBehaviour";s:4:"crop";s:15:"showDescription";s:4:"true";s:15:"hideDescription";s:4:"true";s:27:"preserveSlideshowDimensions";s:5:"false";s:20:"enableResponsiveness";s:4:"true";s:4:"play";s:4:"true";s:4:"loop";s:4:"true";s:12:"pauseOnHover";s:4:"true";s:12:"controllable";s:4:"true";s:21:"hideNavigationButtons";s:5:"false";s:14:"showPagination";s:4:"true";s:14:"hidePagination";s:4:"true";s:12:"controlPanel";s:5:"false";s:16:"hideControlPanel";s:4:"true";s:15:"waitUntilLoaded";s:4:"true";s:15:"showLoadingIcon";s:4:"true";s:6:"random";s:5:"false";s:11:"avoidFilter";s:4:"true";}'),
(71, 31, 'styleSettings', 'a:1:{s:5:"style";s:15:"style-light.css";}'),
(72, 31, 'slides', 'a:3:{i:1;a:9:{s:17:"titleElementTagID";s:1:"0";s:5:"title";s:7:"Gimnàs";s:23:"descriptionElementTagID";s:1:"0";s:11:"description";s:16:"Breu descripció";s:3:"url";s:0:"";s:9:"urlTarget";s:5:"_self";s:15:"alternativeText";s:0:"";s:4:"type";s:10:"attachment";s:6:"postId";s:2:"36";}i:2;a:9:{s:17:"titleElementTagID";s:1:"0";s:5:"title";s:17:"Aules polivalents";s:23:"descriptionElementTagID";s:1:"0";s:11:"description";s:16:"Breu descripció";s:3:"url";s:0:"";s:9:"urlTarget";s:5:"_self";s:15:"alternativeText";s:0:"";s:4:"type";s:10:"attachment";s:6:"postId";s:2:"33";}i:3;a:9:{s:17:"titleElementTagID";s:1:"0";s:5:"title";s:12:"Sala d''actes";s:23:"descriptionElementTagID";s:1:"0";s:11:"description";s:0:"";s:3:"url";s:0:"";s:9:"urlTarget";s:5:"_self";s:15:"alternativeText";s:0:"";s:4:"type";s:10:"attachment";s:6:"postId";s:2:"35";}}'),
(74, 32, '_wp_attached_file', '2014/09/exemple1.png'),
(75, 32, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:350;s:6:"height";i:250;s:4:"file";s:20:"2014/09/exemple1.png";s:5:"sizes";a:4:{s:9:"thumbnail";a:4:{s:4:"file";s:20:"exemple1-150x150.png";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}s:6:"medium";a:4:{s:4:"file";s:20:"exemple1-300x214.png";s:5:"width";i:300;s:6:"height";i:214;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-300";a:4:{s:4:"file";s:20:"exemple1-300x250.png";s:5:"width";i:300;s:6:"height";i:250;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-200";a:4:{s:4:"file";s:20:"exemple1-200x150.png";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}}s:10:"image_meta";a:10:{s:8:"aperture";i:0;s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";i:0;s:9:"copyright";s:0:"";s:12:"focal_length";i:0;s:3:"iso";i:0;s:13:"shutter_speed";i:0;s:5:"title";s:0:"";}}'),
(76, 33, '_wp_attached_file', '2014/09/exemple1b.png'),
(77, 33, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:350;s:6:"height";i:250;s:4:"file";s:21:"2014/09/exemple1b.png";s:5:"sizes";a:4:{s:9:"thumbnail";a:4:{s:4:"file";s:21:"exemple1b-150x150.png";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}s:6:"medium";a:4:{s:4:"file";s:21:"exemple1b-300x214.png";s:5:"width";i:300;s:6:"height";i:214;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-300";a:4:{s:4:"file";s:21:"exemple1b-300x250.png";s:5:"width";i:300;s:6:"height";i:250;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-200";a:4:{s:4:"file";s:21:"exemple1b-200x150.png";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}}s:10:"image_meta";a:10:{s:8:"aperture";i:0;s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";i:0;s:9:"copyright";s:0:"";s:12:"focal_length";i:0;s:3:"iso";i:0;s:13:"shutter_speed";i:0;s:5:"title";s:0:"";}}'),
(78, 34, '_wp_attached_file', '2014/09/exemple2b.png'),
(79, 34, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:180;s:6:"height";i:90;s:4:"file";s:21:"2014/09/exemple2b.png";s:5:"sizes";a:1:{s:9:"thumbnail";a:4:{s:4:"file";s:20:"exemple2b-150x90.png";s:5:"width";i:150;s:6:"height";i:90;s:9:"mime-type";s:9:"image/png";}}s:10:"image_meta";a:10:{s:8:"aperture";i:0;s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";i:0;s:9:"copyright";s:0:"";s:12:"focal_length";i:0;s:3:"iso";i:0;s:13:"shutter_speed";i:0;s:5:"title";s:0:"";}}'),
(80, 35, '_wp_attached_file', '2014/09/exemple3.png'),
(81, 35, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:800;s:6:"height";i:600;s:4:"file";s:20:"2014/09/exemple3.png";s:5:"sizes";a:4:{s:9:"thumbnail";a:4:{s:4:"file";s:20:"exemple3-150x150.png";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}s:6:"medium";a:4:{s:4:"file";s:20:"exemple3-300x225.png";s:5:"width";i:300;s:6:"height";i:225;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-300";a:4:{s:4:"file";s:20:"exemple3-300x250.png";s:5:"width";i:300;s:6:"height";i:250;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-200";a:4:{s:4:"file";s:20:"exemple3-200x150.png";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}}s:10:"image_meta";a:10:{s:8:"aperture";i:0;s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";i:0;s:9:"copyright";s:0:"";s:12:"focal_length";i:0;s:3:"iso";i:0;s:13:"shutter_speed";i:0;s:5:"title";s:0:"";}}'),
(82, 36, '_wp_attached_file', '2014/09/exemple3b.png'),
(83, 36, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:800;s:6:"height";i:600;s:4:"file";s:21:"2014/09/exemple3b.png";s:5:"sizes";a:4:{s:9:"thumbnail";a:4:{s:4:"file";s:21:"exemple3b-150x150.png";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}s:6:"medium";a:4:{s:4:"file";s:21:"exemple3b-300x225.png";s:5:"width";i:300;s:6:"height";i:225;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-300";a:4:{s:4:"file";s:21:"exemple3b-300x250.png";s:5:"width";i:300;s:6:"height";i:250;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-200";a:4:{s:4:"file";s:21:"exemple3b-200x150.png";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}}s:10:"image_meta";a:10:{s:8:"aperture";i:0;s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";i:0;s:9:"copyright";s:0:"";s:12:"focal_length";i:0;s:3:"iso";i:0;s:13:"shutter_speed";i:0;s:5:"title";s:0:"";}}'),
(84, 37, '_wp_attached_file', '2014/09/exemple2.png'),
(85, 37, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:180;s:6:"height";i:90;s:4:"file";s:20:"2014/09/exemple2.png";s:5:"sizes";a:1:{s:9:"thumbnail";a:4:{s:4:"file";s:19:"exemple2-150x90.png";s:5:"width";i:150;s:6:"height";i:90;s:9:"mime-type";s:9:"image/png";}}s:10:"image_meta";a:10:{s:8:"aperture";i:0;s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";i:0;s:9:"copyright";s:0:"";s:12:"focal_length";i:0;s:3:"iso";i:0;s:13:"shutter_speed";i:0;s:5:"title";s:0:"";}}'),
(98, 43, '_edit_lock', '1437997638:2'),
(99, 43, '_edit_last', '2'),
(100, 43, '_wp_page_template', 'page-templates/side-menu.php'),
(101, 45, '_menu_item_type', 'post_type'),
(102, 45, '_menu_item_menu_item_parent', '25'),
(103, 45, '_menu_item_object_id', '43'),
(104, 45, '_menu_item_object', 'page'),
(105, 45, '_menu_item_target', ''),
(106, 45, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(107, 45, '_menu_item_xfn', ''),
(108, 45, '_menu_item_url', ''),
(134, 52, '_edit_lock', '1474447675:2'),
(135, 52, '_edit_last', '2'),
(136, 52, '_wp_page_template', 'page-templates/side-menu.php'),
(137, 54, '_menu_item_type', 'post_type'),
(138, 54, '_menu_item_menu_item_parent', '25'),
(139, 54, '_menu_item_object_id', '52'),
(140, 54, '_menu_item_object', 'page'),
(141, 54, '_menu_item_target', ''),
(142, 54, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(143, 54, '_menu_item_xfn', ''),
(144, 54, '_menu_item_url', ''),
(149, 57, '_edit_lock', '1437994064:2'),
(150, 57, '_edit_last', '2'),
(151, 57, '_wp_page_template', 'page-templates/side-menu.php'),
(152, 59, '_menu_item_type', 'post_type'),
(153, 59, '_menu_item_menu_item_parent', '25'),
(154, 59, '_menu_item_object_id', '57'),
(155, 59, '_menu_item_object', 'page'),
(156, 59, '_menu_item_target', ''),
(157, 59, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(158, 59, '_menu_item_xfn', ''),
(159, 59, '_menu_item_url', ''),
(164, 63, '_edit_lock', '1437994557:2'),
(165, 63, '_edit_last', '2'),
(166, 63, '_wp_page_template', 'page-templates/side-menu.php'),
(263, 88, '_wp_attached_file', '2014/09/logo-centre1.png'),
(264, 88, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:131;s:6:"height";i:131;s:4:"file";s:24:"2014/09/logo-centre1.png";s:5:"sizes";a:0:{}s:10:"image_meta";a:10:{s:8:"aperture";i:0;s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";i:0;s:9:"copyright";s:0:"";s:12:"focal_length";i:0;s:3:"iso";i:0;s:13:"shutter_speed";i:0;s:5:"title";s:0:"";}}'),
(406, 107, '_edit_lock', '1438594842:2'),
(407, 107, '_edit_last', '2'),
(410, 107, 'settings', 'a:26:{s:9:"animation";s:5:"slide";s:10:"slideSpeed";s:1:"1";s:16:"descriptionSpeed";s:3:"0.4";s:13:"intervalSpeed";s:3:"300";s:13:"slidesPerView";s:1:"2";s:8:"maxWidth";s:1:"0";s:11:"aspectRatio";s:3:"3:1";s:6:"height";s:3:"179";s:14:"imageBehaviour";s:4:"crop";s:15:"showDescription";s:5:"false";s:15:"hideDescription";s:4:"true";s:27:"preserveSlideshowDimensions";s:5:"false";s:20:"enableResponsiveness";s:4:"true";s:4:"play";s:5:"false";s:4:"loop";s:4:"true";s:12:"pauseOnHover";s:4:"true";s:12:"controllable";s:4:"true";s:21:"hideNavigationButtons";s:4:"true";s:14:"showPagination";s:5:"false";s:14:"hidePagination";s:4:"true";s:12:"controlPanel";s:5:"false";s:16:"hideControlPanel";s:4:"true";s:15:"waitUntilLoaded";s:4:"true";s:15:"showLoadingIcon";s:4:"true";s:6:"random";s:4:"true";s:11:"avoidFilter";s:4:"true";}'),
(411, 107, 'styleSettings', 'a:1:{s:5:"style";s:15:"style-light.css";}'),
(412, 107, 'slides', 'a:4:{i:1;a:9:{s:17:"titleElementTagID";s:1:"0";s:5:"title";s:11:"Escola Alfa";s:23:"descriptionElementTagID";s:1:"0";s:11:"description";s:0:"";s:3:"url";s:62:"https://pwc-int.educacio.intranet/agora/masterzer/escola-alfa/";s:9:"urlTarget";s:5:"_self";s:15:"alternativeText";s:0:"";s:4:"type";s:10:"attachment";s:6:"postId";s:3:"422";}i:2;a:9:{s:17:"titleElementTagID";s:1:"0";s:5:"title";s:12:"Escola Gamma";s:23:"descriptionElementTagID";s:1:"0";s:11:"description";s:0:"";s:3:"url";s:63:"https://pwc-int.educacio.intranet/agora/masterzer/escola-gamma/";s:9:"urlTarget";s:5:"_self";s:15:"alternativeText";s:0:"";s:4:"type";s:10:"attachment";s:6:"postId";s:3:"424";}i:3;a:9:{s:17:"titleElementTagID";s:1:"0";s:5:"title";s:11:"Escola Beta";s:23:"descriptionElementTagID";s:1:"0";s:11:"description";s:0:"";s:3:"url";s:62:"https://pwc-int.educacio.intranet/agora/masterzer/escola-beta/";s:9:"urlTarget";s:5:"_self";s:15:"alternativeText";s:0:"";s:4:"type";s:10:"attachment";s:6:"postId";s:3:"423";}i:4;a:9:{s:17:"titleElementTagID";s:1:"0";s:5:"title";s:14:"Escola Epsilon";s:23:"descriptionElementTagID";s:1:"0";s:11:"description";s:0:"";s:3:"url";s:65:"https://pwc-int.educacio.intranet/agora/masterzer/escola-epsilon/";s:9:"urlTarget";s:5:"_self";s:15:"alternativeText";s:0:"";s:4:"type";s:10:"attachment";s:6:"postId";s:3:"425";}}'),
(416, 109, '_edit_lock', '1437999130:2'),
(417, 109, '_edit_last', '2'),
(421, 109, '_amaga_titol', ''),
(422, 109, '_amaga_metadata', ''),
(423, 109, '_bloc_html', 'on'),
(426, 112, '_bbp_reply_count', '0'),
(427, 112, '_bbp_topic_count', '3'),
(428, 112, '_bbp_topic_count_hidden', '0'),
(429, 112, '_bbp_total_reply_count', '0'),
(430, 112, '_bbp_total_topic_count', '3'),
(431, 112, '_bbp_last_topic_id', '216'),
(432, 112, '_bbp_last_reply_id', '216'),
(433, 112, '_bbp_last_active_id', '216'),
(434, 112, '_bbp_last_active_time', '2014-09-22 16:54:13'),
(435, 112, '_bbp_forum_subforum_count', '0'),
(436, 112, '_bbp_group_ids', 'a:1:{i:0;i:1;}'),
(437, 113, '_bbp_reply_count', '0'),
(438, 113, '_bbp_topic_count', '0'),
(439, 113, '_bbp_topic_count_hidden', '0'),
(440, 113, '_bbp_total_reply_count', '0'),
(441, 113, '_bbp_total_topic_count', '0'),
(442, 113, '_bbp_last_topic_id', '0'),
(443, 113, '_bbp_last_reply_id', '0'),
(444, 113, '_bbp_last_active_id', '0'),
(445, 113, '_bbp_last_active_time', '0'),
(446, 113, '_bbp_forum_subforum_count', '0'),
(447, 113, '_bbp_group_ids', 'a:1:{i:0;i:2;}'),
(448, 114, '_wp_attached_file', '2014/09/aulasec.png'),
(449, 114, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:1124;s:6:"height";i:329;s:4:"file";s:19:"2014/09/aulasec.png";s:5:"sizes";a:5:{s:9:"thumbnail";a:4:{s:4:"file";s:19:"aulasec-150x150.png";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}s:6:"medium";a:4:{s:4:"file";s:18:"aulasec-300x87.png";s:5:"width";i:300;s:6:"height";i:87;s:9:"mime-type";s:9:"image/png";}s:5:"large";a:4:{s:4:"file";s:20:"aulasec-1024x299.png";s:5:"width";i:1024;s:6:"height";i:299;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-300";a:4:{s:4:"file";s:19:"aulasec-300x250.png";s:5:"width";i:300;s:6:"height";i:250;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-200";a:4:{s:4:"file";s:19:"aulasec-200x150.png";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}}s:10:"image_meta";a:10:{s:8:"aperture";i:0;s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";i:0;s:9:"copyright";s:0:"";s:12:"focal_length";i:0;s:3:"iso";i:0;s:13:"shutter_speed";i:0;s:5:"title";s:0:"";}}'),
(450, 115, '_bbp_reply_count', '0'),
(451, 115, '_bbp_topic_count', '0'),
(452, 115, '_bbp_topic_count_hidden', '0'),
(453, 115, '_bbp_total_reply_count', '0'),
(454, 115, '_bbp_total_topic_count', '0'),
(455, 115, '_bbp_last_topic_id', '0'),
(456, 115, '_bbp_last_reply_id', '0'),
(457, 115, '_bbp_last_active_id', '0'),
(458, 115, '_bbp_last_active_time', '0'),
(459, 115, '_bbp_forum_subforum_count', '0'),
(460, 115, '_bbp_group_ids', 'a:1:{i:0;i:3;}'),
(471, 120, '_edit_lock', '1437998676:2'),
(472, 120, '_edit_last', '2'),
(475, 120, '_amaga_titol', ''),
(476, 120, '_amaga_metadata', ''),
(477, 120, '_bloc_html', 'on'),
(491, 127, '_edit_lock', '1437998676:2'),
(492, 127, '_edit_last', '2'),
(495, 127, '_amaga_titol', ''),
(496, 127, '_amaga_metadata', ''),
(497, 127, '_bloc_html', 'on'),
(498, 129, '_edit_lock', '1437998673:2'),
(499, 129, '_edit_last', '2'),
(502, 129, '_amaga_titol', ''),
(503, 129, '_amaga_metadata', ''),
(504, 129, '_bloc_html', ''),
(509, 131, '_wp_attached_file', '2014/09/primersauxilis.jpg'),
(510, 131, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:800;s:6:"height";i:600;s:4:"file";s:26:"2014/09/primersauxilis.jpg";s:5:"sizes";a:4:{s:9:"thumbnail";a:4:{s:4:"file";s:26:"primersauxilis-150x150.jpg";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:10:"image/jpeg";}s:6:"medium";a:4:{s:4:"file";s:26:"primersauxilis-300x225.jpg";s:5:"width";i:300;s:6:"height";i:225;s:9:"mime-type";s:10:"image/jpeg";}s:9:"thumb-300";a:4:{s:4:"file";s:26:"primersauxilis-300x250.jpg";s:5:"width";i:300;s:6:"height";i:250;s:9:"mime-type";s:10:"image/jpeg";}s:9:"thumb-200";a:4:{s:4:"file";s:26:"primersauxilis-200x150.jpg";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:10:"image/jpeg";}}s:10:"image_meta";a:10:{s:8:"aperture";i:0;s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";i:0;s:9:"copyright";s:0:"";s:12:"focal_length";i:0;s:3:"iso";i:0;s:13:"shutter_speed";i:0;s:5:"title";s:0:"";}}'),
(520, 134, '_edit_lock', '1437998719:2'),
(521, 134, '_edit_last', '2'),
(524, 134, '_amaga_titol', ''),
(525, 134, '_amaga_metadata', ''),
(526, 134, '_bloc_html', ''),
(529, 137, '_edit_lock', '1437998672:2'),
(530, 137, '_edit_last', '2'),
(533, 137, '_amaga_titol', ''),
(534, 137, '_amaga_metadata', ''),
(535, 137, '_bloc_html', ''),
(540, 141, '_wp_attached_file', '2014/09/cicles.png'),
(541, 141, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:796;s:6:"height";i:302;s:4:"file";s:18:"2014/09/cicles.png";s:5:"sizes";a:4:{s:9:"thumbnail";a:4:{s:4:"file";s:18:"cicles-150x150.png";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}s:6:"medium";a:4:{s:4:"file";s:18:"cicles-300x113.png";s:5:"width";i:300;s:6:"height";i:113;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-300";a:4:{s:4:"file";s:18:"cicles-300x250.png";s:5:"width";i:300;s:6:"height";i:250;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-200";a:4:{s:4:"file";s:18:"cicles-200x150.png";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}}s:10:"image_meta";a:10:{s:8:"aperture";i:0;s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";i:0;s:9:"copyright";s:0:"";s:12:"focal_length";i:0;s:3:"iso";i:0;s:13:"shutter_speed";i:0;s:5:"title";s:0:"";}}'),
(542, 129, '_thumbnail_id', '141'),
(570, 146, '_wp_attached_file', '2014/09/gimnas.png'),
(571, 146, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:876;s:6:"height";i:275;s:4:"file";s:18:"2014/09/gimnas.png";s:5:"sizes";a:4:{s:9:"thumbnail";a:4:{s:4:"file";s:18:"gimnas-150x150.png";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}s:6:"medium";a:4:{s:4:"file";s:17:"gimnas-300x94.png";s:5:"width";i:300;s:6:"height";i:94;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-300";a:4:{s:4:"file";s:18:"gimnas-300x250.png";s:5:"width";i:300;s:6:"height";i:250;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-200";a:4:{s:4:"file";s:18:"gimnas-200x150.png";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}}s:10:"image_meta";a:10:{s:8:"aperture";i:0;s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";i:0;s:9:"copyright";s:0:"";s:12:"focal_length";i:0;s:3:"iso";i:0;s:13:"shutter_speed";i:0;s:5:"title";s:0:"";}}'),
(581, 148, '_edit_lock', '1438355333:2'),
(582, 148, '_edit_last', '1'),
(583, 148, 'settings', 'a:26:{s:9:"animation";s:5:"slide";s:10:"slideSpeed";s:1:"1";s:16:"descriptionSpeed";s:3:"0.4";s:13:"intervalSpeed";s:1:"8";s:13:"slidesPerView";s:1:"1";s:8:"maxWidth";s:1:"0";s:11:"aspectRatio";s:3:"3:1";s:6:"height";s:3:"250";s:14:"imageBehaviour";s:4:"crop";s:15:"showDescription";s:4:"true";s:15:"hideDescription";s:4:"true";s:27:"preserveSlideshowDimensions";s:5:"false";s:20:"enableResponsiveness";s:4:"true";s:4:"play";s:4:"true";s:4:"loop";s:4:"true";s:12:"pauseOnHover";s:4:"true";s:12:"controllable";s:4:"true";s:21:"hideNavigationButtons";s:5:"false";s:14:"showPagination";s:4:"true";s:14:"hidePagination";s:4:"true";s:12:"controlPanel";s:5:"false";s:16:"hideControlPanel";s:4:"true";s:15:"waitUntilLoaded";s:4:"true";s:15:"showLoadingIcon";s:4:"true";s:6:"random";s:5:"false";s:11:"avoidFilter";s:4:"true";}'),
(584, 148, 'styleSettings', 'a:1:{s:5:"style";s:15:"style-light.css";}'),
(585, 148, 'slides', 'a:6:{i:1;a:9:{s:17:"titleElementTagID";s:1:"0";s:5:"title";s:8:"imatge 1";s:23:"descriptionElementTagID";s:1:"0";s:11:"description";s:20:"descripció imatge 1";s:3:"url";s:0:"";s:9:"urlTarget";s:5:"_self";s:15:"alternativeText";s:0:"";s:4:"type";s:10:"attachment";s:6:"postId";s:2:"32";}i:2;a:9:{s:17:"titleElementTagID";s:1:"0";s:5:"title";s:6:"Text 1";s:23:"descriptionElementTagID";s:1:"0";s:11:"description";s:54:"Els carrusels poden incloure imatges, vídeos i textos";s:9:"textColor";s:7:"#ffffff";s:5:"color";s:7:"#1e73be";s:3:"url";s:0:"";s:9:"urlTarget";s:5:"_self";s:4:"type";s:4:"text";}i:3;a:9:{s:17:"titleElementTagID";s:1:"0";s:5:"title";s:8:"Imatge 5";s:23:"descriptionElementTagID";s:1:"0";s:11:"description";s:20:"Descripció Imatge 5";s:3:"url";s:0:"";s:9:"urlTarget";s:5:"_self";s:15:"alternativeText";s:0:"";s:4:"type";s:10:"attachment";s:6:"postId";s:2:"36";}i:4;a:3:{s:7:"videoId";s:11:"ygwGTiGFGi0";s:17:"showRelatedVideos";s:5:"false";s:4:"type";s:5:"video";}i:5;a:9:{s:17:"titleElementTagID";s:1:"0";s:5:"title";s:6:"Text 2";s:23:"descriptionElementTagID";s:1:"0";s:11:"description";s:18:"Descripció Text 2";s:9:"textColor";s:7:"#ffffff";s:5:"color";s:7:"#dd3333";s:3:"url";s:0:"";s:9:"urlTarget";s:5:"_self";s:4:"type";s:4:"text";}i:6;a:9:{s:17:"titleElementTagID";s:1:"0";s:5:"title";s:8:"Imatge 4";s:23:"descriptionElementTagID";s:1:"0";s:11:"description";s:20:"Descripció Imatge 4";s:3:"url";s:0:"";s:9:"urlTarget";s:5:"_self";s:15:"alternativeText";s:0:"";s:4:"type";s:10:"attachment";s:6:"postId";s:2:"35";}}'),
(594, 146, '_edit_lock', '1411134657:1'),
(595, 146, '_wp_attachment_image_alt', 'Photo by Anna Armstrong'),
(596, 146, '_edit_last', '1'),
(607, 154, '_wp_attached_file', '2014/09/Xesc_Arbona.png'),
(608, 154, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:772;s:6:"height";i:222;s:4:"file";s:23:"2014/09/Xesc_Arbona.png";s:5:"sizes";a:4:{s:9:"thumbnail";a:4:{s:4:"file";s:23:"Xesc_Arbona-150x150.png";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}s:6:"medium";a:4:{s:4:"file";s:22:"Xesc_Arbona-300x86.png";s:5:"width";i:300;s:6:"height";i:86;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-300";a:4:{s:4:"file";s:23:"Xesc_Arbona-300x222.png";s:5:"width";i:300;s:6:"height";i:222;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-200";a:4:{s:4:"file";s:23:"Xesc_Arbona-200x150.png";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}}s:10:"image_meta";a:10:{s:8:"aperture";i:0;s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";i:0;s:9:"copyright";s:0:"";s:12:"focal_length";i:0;s:3:"iso";i:0;s:13:"shutter_speed";i:0;s:5:"title";s:0:"";}}'),
(609, 154, '_edit_lock', '1411137527:1'),
(610, 154, '_wp_attachment_image_alt', 'Photo by Xesc Arbona'),
(611, 154, '_edit_last', '1'),
(632, 161, '_edit_lock', '1438089325:2'),
(633, 161, '_edit_last', '2'),
(636, 161, '_amaga_titol', ''),
(637, 161, '_amaga_metadata', ''),
(638, 161, '_bloc_html', 'on'),
(639, 163, '_edit_lock', '1437998671:2'),
(640, 163, '_edit_last', '2'),
(643, 163, '_amaga_titol', ''),
(644, 163, '_amaga_metadata', ''),
(645, 163, '_bloc_html', ''),
(656, 137, '_thumbnail_id', '131'),
(659, 168, '_wp_attached_file', '2014/09/classe.png'),
(660, 168, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:800;s:6:"height";i:261;s:4:"file";s:18:"2014/09/classe.png";s:5:"sizes";a:4:{s:9:"thumbnail";a:4:{s:4:"file";s:18:"classe-150x150.png";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}s:6:"medium";a:4:{s:4:"file";s:17:"classe-300x97.png";s:5:"width";i:300;s:6:"height";i:97;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-300";a:4:{s:4:"file";s:18:"classe-300x250.png";s:5:"width";i:300;s:6:"height";i:250;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-200";a:4:{s:4:"file";s:18:"classe-200x150.png";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}}s:10:"image_meta";a:10:{s:8:"aperture";i:0;s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";i:0;s:9:"copyright";s:0:"";s:12:"focal_length";i:0;s:3:"iso";i:0;s:13:"shutter_speed";i:0;s:5:"title";s:0:"";}}'),
(661, 134, '_thumbnail_id', '168'),
(664, 170, '_bbp_reply_count', '0'),
(665, 170, '_bbp_topic_count', '0'),
(666, 170, '_bbp_topic_count_hidden', '0'),
(667, 170, '_bbp_total_reply_count', '0'),
(668, 170, '_bbp_total_topic_count', '0'),
(669, 170, '_bbp_last_topic_id', '0'),
(670, 170, '_bbp_last_reply_id', '0'),
(671, 170, '_bbp_last_active_id', '0'),
(672, 170, '_bbp_last_active_time', '0'),
(673, 170, '_bbp_forum_subforum_count', '0'),
(674, 170, '_bbp_group_ids', 'a:1:{i:0;i:4;}'),
(675, 171, '_bbp_reply_count', '0'),
(676, 171, '_bbp_topic_count', '0'),
(677, 171, '_bbp_topic_count_hidden', '0'),
(678, 171, '_bbp_total_reply_count', '0'),
(679, 171, '_bbp_total_topic_count', '0'),
(680, 171, '_bbp_last_topic_id', '0'),
(681, 171, '_bbp_last_reply_id', '0'),
(682, 171, '_bbp_last_active_id', '0'),
(683, 171, '_bbp_last_active_time', '0'),
(684, 171, '_bbp_forum_subforum_count', '0'),
(685, 171, '_bbp_group_ids', 'a:1:{i:0;i:5;}'),
(686, 172, '_bbp_reply_count', '0'),
(687, 172, '_bbp_topic_count', '0'),
(688, 172, '_bbp_topic_count_hidden', '0'),
(689, 172, '_bbp_total_reply_count', '0'),
(690, 172, '_bbp_total_topic_count', '0'),
(691, 172, '_bbp_last_topic_id', '0'),
(692, 172, '_bbp_last_reply_id', '0'),
(693, 172, '_bbp_last_active_id', '0'),
(694, 172, '_bbp_last_active_time', '0'),
(695, 172, '_bbp_forum_subforum_count', '0'),
(696, 172, '_bbp_group_ids', 'a:1:{i:0;i:6;}'),
(697, 173, '_bbp_reply_count', '0'),
(698, 173, '_bbp_topic_count', '0'),
(699, 173, '_bbp_topic_count_hidden', '0'),
(700, 173, '_bbp_total_reply_count', '0'),
(701, 173, '_bbp_total_topic_count', '0'),
(702, 173, '_bbp_last_topic_id', '0'),
(703, 173, '_bbp_last_reply_id', '0'),
(704, 173, '_bbp_last_active_id', '0'),
(705, 173, '_bbp_last_active_time', '0'),
(706, 173, '_bbp_forum_subforum_count', '0'),
(707, 173, '_bbp_group_ids', 'a:1:{i:0;i:7;}'),
(708, 174, '_bbp_reply_count', '0'),
(709, 174, '_bbp_topic_count', '0'),
(710, 174, '_bbp_topic_count_hidden', '0'),
(711, 174, '_bbp_total_reply_count', '0'),
(712, 174, '_bbp_total_topic_count', '0'),
(713, 174, '_bbp_last_topic_id', '0'),
(714, 174, '_bbp_last_reply_id', '0'),
(715, 174, '_bbp_last_active_id', '0'),
(716, 174, '_bbp_last_active_time', '0'),
(717, 174, '_bbp_forum_subforum_count', '0'),
(718, 174, '_bbp_group_ids', 'a:1:{i:0;i:8;}'),
(719, 175, '_bbp_reply_count', '0'),
(720, 175, '_bbp_topic_count', '0'),
(721, 175, '_bbp_topic_count_hidden', '0'),
(722, 175, '_bbp_total_reply_count', '0'),
(723, 175, '_bbp_total_topic_count', '0'),
(724, 175, '_bbp_last_topic_id', '0'),
(725, 175, '_bbp_last_reply_id', '0'),
(726, 175, '_bbp_last_active_id', '0'),
(727, 175, '_bbp_last_active_time', '0'),
(728, 175, '_bbp_forum_subforum_count', '0'),
(729, 175, '_bbp_group_ids', 'a:1:{i:0;i:9;}'),
(730, 176, '_bbp_reply_count', '0'),
(731, 176, '_bbp_topic_count', '0'),
(732, 176, '_bbp_topic_count_hidden', '0'),
(733, 176, '_bbp_total_reply_count', '0'),
(734, 176, '_bbp_total_topic_count', '0'),
(735, 176, '_bbp_last_topic_id', '0'),
(736, 176, '_bbp_last_reply_id', '0'),
(737, 176, '_bbp_last_active_id', '0'),
(738, 176, '_bbp_last_active_time', '0'),
(739, 176, '_bbp_forum_subforum_count', '0'),
(740, 176, '_bbp_group_ids', 'a:1:{i:0;i:10;}'),
(741, 177, '_bbp_reply_count', '0'),
(742, 177, '_bbp_topic_count', '0'),
(743, 177, '_bbp_topic_count_hidden', '0'),
(744, 177, '_bbp_total_reply_count', '0'),
(745, 177, '_bbp_total_topic_count', '0'),
(746, 177, '_bbp_last_topic_id', '0'),
(747, 177, '_bbp_last_reply_id', '0'),
(748, 177, '_bbp_last_active_id', '0'),
(749, 177, '_bbp_last_active_time', '0'),
(750, 177, '_bbp_forum_subforum_count', '0'),
(751, 177, '_bbp_group_ids', 'a:1:{i:0;i:11;}'),
(752, 178, '_bbp_reply_count', '0'),
(753, 178, '_bbp_topic_count', '0'),
(754, 178, '_bbp_topic_count_hidden', '0'),
(755, 178, '_bbp_total_reply_count', '0'),
(756, 178, '_bbp_total_topic_count', '0'),
(757, 178, '_bbp_last_topic_id', '0'),
(758, 178, '_bbp_last_reply_id', '0'),
(759, 178, '_bbp_last_active_id', '0'),
(760, 178, '_bbp_last_active_time', '0'),
(761, 178, '_bbp_forum_subforum_count', '0'),
(762, 178, '_bbp_group_ids', 'a:1:{i:0;i:12;}'),
(763, 179, '_bbp_reply_count', '0'),
(764, 179, '_bbp_topic_count', '0'),
(765, 179, '_bbp_topic_count_hidden', '0'),
(766, 179, '_bbp_total_reply_count', '0'),
(767, 179, '_bbp_total_topic_count', '0'),
(768, 179, '_bbp_last_topic_id', '0'),
(769, 179, '_bbp_last_reply_id', '0'),
(770, 179, '_bbp_last_active_id', '0'),
(771, 179, '_bbp_last_active_time', '0'),
(772, 179, '_bbp_forum_subforum_count', '0'),
(773, 179, '_bbp_group_ids', 'a:1:{i:0;i:13;}'),
(804, 184, '_edit_lock', '1465892484:2'),
(805, 184, '_edit_last', '2'),
(806, 185, '_wp_attached_file', '2014/09/ampa.png'),
(807, 185, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:315;s:6:"height";i:126;s:4:"file";s:16:"2014/09/ampa.png";s:5:"sizes";a:4:{s:9:"thumbnail";a:4:{s:4:"file";s:16:"ampa-150x126.png";s:5:"width";i:150;s:6:"height";i:126;s:9:"mime-type";s:9:"image/png";}s:6:"medium";a:4:{s:4:"file";s:16:"ampa-300x120.png";s:5:"width";i:300;s:6:"height";i:120;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-300";a:4:{s:4:"file";s:16:"ampa-300x126.png";s:5:"width";i:300;s:6:"height";i:126;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-200";a:4:{s:4:"file";s:16:"ampa-200x126.png";s:5:"width";i:200;s:6:"height";i:126;s:9:"mime-type";s:9:"image/png";}}s:10:"image_meta";a:10:{s:8:"aperture";i:0;s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";i:0;s:9:"copyright";s:0:"";s:12:"focal_length";i:0;s:3:"iso";i:0;s:13:"shutter_speed";i:0;s:5:"title";s:0:"";}}'),
(811, 184, '_amaga_titol', ''),
(812, 184, '_amaga_metadata', ''),
(813, 184, '_bloc_html', ''),
(897, 202, '_edit_lock', '1438355437:2'),
(898, 202, '_edit_last', '1'),
(899, 203, '_bbp_reply_count', '0'),
(900, 203, '_bbp_topic_count', '0'),
(901, 203, '_bbp_topic_count_hidden', '0'),
(902, 203, '_bbp_total_reply_count', '0'),
(903, 203, '_bbp_total_topic_count', '0'),
(904, 203, '_bbp_last_topic_id', '0'),
(905, 203, '_bbp_last_reply_id', '0'),
(906, 203, '_bbp_last_active_id', '0'),
(907, 203, '_bbp_last_active_time', '0'),
(908, 203, '_bbp_forum_subforum_count', '0'),
(909, 203, '_bbp_group_ids', 'a:1:{i:0;i:14;}'),
(910, 204, '_bbp_reply_count', '0'),
(911, 204, '_bbp_topic_count', '0'),
(912, 204, '_bbp_topic_count_hidden', '0'),
(913, 204, '_bbp_total_reply_count', '0'),
(914, 204, '_bbp_total_topic_count', '0'),
(915, 204, '_bbp_last_topic_id', '0'),
(916, 204, '_bbp_last_reply_id', '0'),
(917, 204, '_bbp_last_active_id', '0'),
(918, 204, '_bbp_last_active_time', '0'),
(919, 204, '_bbp_forum_subforum_count', '0'),
(920, 204, '_bbp_group_ids', 'a:1:{i:0;i:15;}'),
(921, 205, '_bbp_reply_count', '0'),
(922, 205, '_bbp_topic_count', '0'),
(923, 205, '_bbp_topic_count_hidden', '0'),
(924, 205, '_bbp_total_reply_count', '0'),
(925, 205, '_bbp_total_topic_count', '0'),
(926, 205, '_bbp_last_topic_id', '0'),
(927, 205, '_bbp_last_reply_id', '0'),
(928, 205, '_bbp_last_active_id', '0'),
(929, 205, '_bbp_last_active_time', '0'),
(930, 205, '_bbp_forum_subforum_count', '0'),
(931, 205, '_bbp_group_ids', 'a:1:{i:0;i:17;}'),
(932, 206, '_bbp_forum_id', '112'),
(933, 206, '_bbp_topic_id', '206'),
(934, 206, '_bbp_author_ip', '10.155.7.35'),
(935, 206, '_bbp_last_active_id', '206'),
(936, 206, '_bbp_last_active_time', '2014-09-22 14:40:28'),
(937, 206, '_bbp_reply_count', '0'),
(938, 206, '_bbp_reply_count_hidden', '0'),
(939, 206, '_bbp_voice_count', '1'),
(940, 206, '_bbp_activity_id', '35'),
(941, 207, '_bbp_forum_id', '112'),
(942, 207, '_bbp_topic_id', '207'),
(943, 207, '_bbp_author_ip', '10.155.7.35'),
(944, 207, '_bbp_last_active_id', '207'),
(945, 207, '_bbp_last_active_time', '2014-09-22 14:46:13'),
(946, 207, '_bbp_reply_count', '0'),
(947, 207, '_bbp_reply_count_hidden', '0'),
(948, 207, '_bbp_voice_count', '1'),
(949, 207, '_bbp_activity_id', '36'),
(952, 202, 'settings', 'a:26:{s:9:"animation";s:5:"slide";s:10:"slideSpeed";s:1:"1";s:16:"descriptionSpeed";s:3:"0.4";s:13:"intervalSpeed";s:2:"20";s:13:"slidesPerView";s:1:"1";s:8:"maxWidth";s:1:"0";s:11:"aspectRatio";s:3:"3:1";s:6:"height";s:3:"200";s:14:"imageBehaviour";s:7:"natural";s:15:"showDescription";s:4:"true";s:15:"hideDescription";s:4:"true";s:27:"preserveSlideshowDimensions";s:5:"false";s:20:"enableResponsiveness";s:4:"true";s:4:"play";s:4:"true";s:4:"loop";s:4:"true";s:12:"pauseOnHover";s:4:"true";s:12:"controllable";s:4:"true";s:21:"hideNavigationButtons";s:5:"false";s:14:"showPagination";s:4:"true";s:14:"hidePagination";s:4:"true";s:12:"controlPanel";s:5:"false";s:16:"hideControlPanel";s:4:"true";s:15:"waitUntilLoaded";s:4:"true";s:15:"showLoadingIcon";s:4:"true";s:6:"random";s:5:"false";s:11:"avoidFilter";s:4:"true";}'),
(953, 202, 'styleSettings', 'a:1:{s:5:"style";s:15:"style-light.css";}'),
(954, 202, 'slides', 'a:2:{i:1;a:9:{s:17:"titleElementTagID";s:1:"0";s:5:"title";s:9:"screeshot";s:23:"descriptionElementTagID";s:1:"0";s:11:"description";s:0:"";s:3:"url";s:0:"";s:9:"urlTarget";s:5:"_self";s:15:"alternativeText";s:0:"";s:4:"type";s:10:"attachment";s:6:"postId";s:3:"215";}i:2;a:3:{s:7:"videoId";s:11:"wSNYYThX5-g";s:17:"showRelatedVideos";s:5:"false";s:4:"type";s:5:"video";}}'),
(955, 209, '_bbp_reply_count', '0'),
(956, 209, '_bbp_topic_count', '1'),
(957, 209, '_bbp_topic_count_hidden', '0'),
(958, 209, '_bbp_total_reply_count', '0'),
(959, 209, '_bbp_total_topic_count', '1'),
(960, 209, '_bbp_last_topic_id', '211'),
(961, 209, '_bbp_last_reply_id', '211'),
(962, 209, '_bbp_last_active_id', '211'),
(963, 209, '_bbp_last_active_time', '2014-09-22 15:11:13'),
(964, 209, '_bbp_forum_subforum_count', '0'),
(965, 209, '_bbp_group_ids', 'a:1:{i:0;i:19;}'),
(966, 210, '_wp_attached_file', '2014/09/granota.png'),
(967, 210, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:1193;s:6:"height";i:843;s:4:"file";s:19:"2014/09/granota.png";s:5:"sizes";a:5:{s:9:"thumbnail";a:4:{s:4:"file";s:19:"granota-150x150.png";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}s:6:"medium";a:4:{s:4:"file";s:19:"granota-300x211.png";s:5:"width";i:300;s:6:"height";i:211;s:9:"mime-type";s:9:"image/png";}s:5:"large";a:4:{s:4:"file";s:20:"granota-1024x723.png";s:5:"width";i:1024;s:6:"height";i:723;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-300";a:4:{s:4:"file";s:19:"granota-300x250.png";s:5:"width";i:300;s:6:"height";i:250;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-200";a:4:{s:4:"file";s:19:"granota-200x150.png";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}}s:10:"image_meta";a:10:{s:8:"aperture";i:0;s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";i:0;s:9:"copyright";s:0:"";s:12:"focal_length";i:0;s:3:"iso";i:0;s:13:"shutter_speed";i:0;s:5:"title";s:0:"";}}'),
(968, 210, '_edit_lock', '1411398724:1'),
(969, 210, '_edit_last', '1'),
(970, 211, '_bbp_forum_id', '209'),
(971, 211, '_bbp_topic_id', '211'),
(972, 211, '_bbp_author_ip', '10.155.7.35'),
(973, 211, '_bbp_last_active_id', '211'),
(974, 211, '_bbp_last_active_time', '2014-09-22 15:11:13'),
(975, 211, '_bbp_reply_count', '0'),
(976, 211, '_bbp_reply_count_hidden', '0'),
(977, 211, '_bbp_voice_count', '1'),
(978, 211, '_bbp_activity_id', '40'),
(979, 206, '_bbp_revision_log', 'a:1:{i:212;a:2:{s:6:"author";i:1;s:6:"reason";s:0:"";}}'),
(985, 215, '_wp_attached_file', '2014/09/screeshot.png'),
(986, 215, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:524;s:6:"height";i:392;s:4:"file";s:21:"2014/09/screeshot.png";s:5:"sizes";a:4:{s:9:"thumbnail";a:4:{s:4:"file";s:21:"screeshot-150x150.png";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}s:6:"medium";a:4:{s:4:"file";s:21:"screeshot-300x224.png";s:5:"width";i:300;s:6:"height";i:224;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-300";a:4:{s:4:"file";s:21:"screeshot-300x250.png";s:5:"width";i:300;s:6:"height";i:250;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-200";a:4:{s:4:"file";s:21:"screeshot-200x150.png";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}}s:10:"image_meta";a:10:{s:8:"aperture";i:0;s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";i:0;s:9:"copyright";s:0:"";s:12:"focal_length";i:0;s:3:"iso";i:0;s:13:"shutter_speed";i:0;s:5:"title";s:0:"";}}'),
(1006, 109, '_oembed_a47471043cf1f80e92ecf21d41f541f0', '<iframe width="500" height="400" scrolling="no" frameborder="no" src="https://w.soundcloud.com/player/?visual=true&url=http%3A%2F%2Fapi.soundcloud.com%2Ftracks%2F138433301&show_artwork=true&maxwidth=500&maxheight=750"></iframe>'),
(1009, 216, '_bbp_forum_id', '112'),
(1010, 216, '_bbp_topic_id', '216'),
(1011, 216, '_bbp_author_ip', '10.155.7.35'),
(1012, 216, '_bbp_last_active_id', '216'),
(1013, 216, '_bbp_last_active_time', '2014-09-22 16:54:13'),
(1014, 216, '_bbp_reply_count', '0'),
(1015, 216, '_bbp_reply_count_hidden', '0'),
(1016, 216, '_bbp_voice_count', '1'),
(1017, 216, '_bbp_activity_id', '48'),
(1018, 216, '_oembed_6ab50d819e70167d5d59205f6272368c', '<iframe width="500" height="281" src="https://www.youtube.com/embed/PQE4WqQSOcQ?feature=oembed" frameborder="0" allowfullscreen></iframe>'),
(1022, 224, 'gce_retrieve_max', '25'),
(1030, 224, 'old_gce_id', '1'),
(1088, 25, 'gce_retrieve_max', '25'),
(1089, 26, 'gce_retrieve_max', '25'),
(1092, 45, 'gce_retrieve_max', '25'),
(1095, 54, 'gce_retrieve_max', '25'),
(1096, 59, 'gce_retrieve_max', '25'),
(1119, 230, 'gce_retrieve_max', '25'),
(1120, 230, 'bp_docs_last_editor', '2'),
(1121, 230, 'bp_docs_settings', 'a:5:{s:4:"read";s:13:"group-members";s:4:"edit";s:13:"group-members";s:13:"read_comments";s:13:"group-members";s:13:"post_comments";s:13:"group-members";s:12:"view_history";s:13:"group-members";}'),
(1122, 230, 'bp_docs_revision_count', '3'),
(1125, 233, 'gce_retrieve_max', '25'),
(1126, 234, '_wp_attached_file', 'bp-attachments/233/Exemple.docx'),
(1127, 233, 'bp_docs_last_editor', '2'),
(1128, 233, 'bp_docs_settings', 'a:5:{s:4:"read";s:6:"anyone";s:4:"edit";s:7:"creator";s:13:"read_comments";s:6:"anyone";s:13:"post_comments";s:8:"loggedin";s:12:"view_history";s:6:"anyone";}'),
(1129, 233, 'bp_docs_revision_count', '2'),
(1130, 236, 'gce_retrieve_max', '25'),
(1131, 236, 'bp_docs_last_editor', '2'),
(1132, 236, 'bp_docs_settings', 'a:5:{s:4:"read";s:13:"group-members";s:4:"edit";s:13:"group-members";s:13:"read_comments";s:13:"group-members";s:13:"post_comments";s:13:"group-members";s:12:"view_history";s:13:"group-members";}'),
(1133, 236, 'bp_docs_revision_count', '1'),
(1137, 238, 'gce_retrieve_max', '25'),
(1138, 239, '_wp_attached_file', 'bp-attachments/238/Selecció_713.png'),
(1139, 239, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:310;s:6:"height";i:126;s:4:"file";s:36:"bp-attachments/238/Selecció_713.png";s:5:"sizes";a:4:{s:9:"thumbnail";a:4:{s:4:"file";s:25:"Selecció_713-150x126.png";s:5:"width";i:150;s:6:"height";i:126;s:9:"mime-type";s:9:"image/png";}s:6:"medium";a:4:{s:4:"file";s:25:"Selecció_713-300x121.png";s:5:"width";i:300;s:6:"height";i:121;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-300";a:4:{s:4:"file";s:25:"Selecció_713-300x126.png";s:5:"width";i:300;s:6:"height";i:126;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-200";a:4:{s:4:"file";s:25:"Selecció_713-200x126.png";s:5:"width";i:200;s:6:"height";i:126;s:9:"mime-type";s:9:"image/png";}}s:10:"image_meta";a:10:{s:8:"aperture";i:0;s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";i:0;s:9:"copyright";s:0:"";s:12:"focal_length";i:0;s:3:"iso";i:0;s:13:"shutter_speed";i:0;s:5:"title";s:0:"";}}'),
(1140, 238, 'bp_docs_last_editor', '2'),
(1141, 238, 'bp_docs_settings', 'a:5:{s:4:"read";s:6:"anyone";s:4:"edit";s:13:"group-members";s:13:"read_comments";s:6:"anyone";s:13:"post_comments";s:8:"loggedin";s:12:"view_history";s:6:"anyone";}'),
(1142, 238, 'bp_docs_revision_count', '2'),
(1151, 224, 'gce_list_max_num', '7'),
(1152, 224, 'gce_list_max_length', 'days'),
(1160, 224, 'gce_feed_start_interval', 'months'),
(1162, 224, 'gce_feed_end_interval', 'years'),
(1163, 224, 'gce_widget_paging_interval', '604800'),
(1164, 224, 'gce_paging_widget', '1'),
(1165, 52, '_template_layout', '2c-l'),
(1170, 224, '_edit_lock', '1474025231:2'),
(1171, 224, '_edit_last', '2'),
(1222, 248, 'gce_list_max_num', '7'),
(1223, 248, 'gce_list_max_length', 'days'),
(1226, 248, 'gce_feed_start_interval', 'months'),
(1228, 248, 'gce_feed_end_interval', 'years'),
(1238, 248, '_edit_lock', '1474025477:2'),
(1239, 248, '_edit_last', '2'),
(1243, 248, 'gce_widget_paging_interval', ''),
(1244, 249, '_menu_item_type', 'custom'),
(1245, 249, '_menu_item_menu_item_parent', '0'),
(1246, 249, '_menu_item_object_id', '249'),
(1247, 249, '_menu_item_object', 'custom'),
(1248, 249, '_menu_item_target', ''),
(1249, 249, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(1250, 249, '_menu_item_xfn', ''),
(1251, 249, '_menu_item_url', '#'),
(1253, 250, '_menu_item_type', 'custom'),
(1254, 250, '_menu_item_menu_item_parent', '0'),
(1255, 250, '_menu_item_object_id', '250'),
(1256, 250, '_menu_item_object', 'custom'),
(1257, 250, '_menu_item_target', ''),
(1258, 250, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(1259, 250, '_menu_item_xfn', ''),
(1260, 250, '_menu_item_url', '#'),
(1262, 251, '_menu_item_type', 'custom'),
(1263, 251, '_menu_item_menu_item_parent', '0'),
(1264, 251, '_menu_item_object_id', '251'),
(1265, 251, '_menu_item_object', 'custom'),
(1266, 251, '_menu_item_target', ''),
(1267, 251, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(1268, 251, '_menu_item_xfn', ''),
(1269, 251, '_menu_item_url', '#'),
(1271, 252, '_menu_item_type', 'custom'),
(1272, 252, '_menu_item_menu_item_parent', '0'),
(1273, 252, '_menu_item_object_id', '252'),
(1274, 252, '_menu_item_object', 'custom'),
(1275, 252, '_menu_item_target', ''),
(1276, 252, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(1277, 252, '_menu_item_xfn', ''),
(1278, 252, '_menu_item_url', '#'),
(1280, 253, '_menu_item_type', 'custom'),
(1281, 253, '_menu_item_menu_item_parent', '0'),
(1282, 253, '_menu_item_object_id', '253'),
(1283, 253, '_menu_item_object', 'custom'),
(1284, 253, '_menu_item_target', ''),
(1285, 253, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(1286, 253, '_menu_item_xfn', ''),
(1287, 253, '_menu_item_url', '#'),
(1289, 254, '_menu_item_type', 'custom'),
(1290, 254, '_menu_item_menu_item_parent', '0'),
(1291, 254, '_menu_item_object_id', '254'),
(1292, 254, '_menu_item_object', 'custom'),
(1293, 254, '_menu_item_target', ''),
(1294, 254, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(1295, 254, '_menu_item_xfn', ''),
(1296, 254, '_menu_item_url', '#'),
(1298, 255, '_wp_attached_file', '2015/01/foto-classe.png'),
(1299, 255, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:640;s:6:"height";i:469;s:4:"file";s:23:"2015/01/foto-classe.png";s:5:"sizes";a:4:{s:9:"thumbnail";a:4:{s:4:"file";s:23:"foto-classe-150x150.png";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}s:6:"medium";a:4:{s:4:"file";s:23:"foto-classe-300x219.png";s:5:"width";i:300;s:6:"height";i:219;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-300";a:4:{s:4:"file";s:23:"foto-classe-300x250.png";s:5:"width";i:300;s:6:"height";i:250;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-200";a:4:{s:4:"file";s:23:"foto-classe-200x150.png";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}}s:10:"image_meta";a:11:{s:8:"aperture";i:0;s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";i:0;s:9:"copyright";s:0:"";s:12:"focal_length";i:0;s:3:"iso";i:0;s:13:"shutter_speed";i:0;s:5:"title";s:0:"";s:11:"orientation";i:0;}}'),
(1310, 19, '_template_layout', '2c-l'),
(1311, 258, '_edit_lock', '1445937026:2'),
(1312, 258, '_edit_last', '2'),
(1313, 258, '_wp_page_template', 'page-templates/side-menu.php'),
(1314, 258, '_template_layout', '2c-l'),
(1331, 261, '_edit_lock', '1445936822:2'),
(1332, 261, '_edit_last', '2'),
(1333, 261, '_wp_page_template', 'page-templates/side-menu.php'),
(1334, 261, '_template_layout', '2c-l'),
(1335, 264, '_edit_lock', '1445936818:2'),
(1336, 264, '_edit_last', '2'),
(1337, 264, '_wp_page_template', 'page-templates/side-menu.php'),
(1338, 264, '_template_layout', '2c-l'),
(1339, 266, '_edit_lock', '1445936849:2'),
(1340, 266, '_edit_last', '2'),
(1341, 266, '_wp_page_template', 'page-templates/side-menu.php'),
(1342, 266, '_template_layout', '2c-l'),
(1343, 268, '_edit_lock', '1445936925:2'),
(1344, 268, '_edit_last', '2'),
(1345, 268, '_wp_page_template', 'page-templates/side-menu.php'),
(1346, 268, '_template_layout', '2c-l'),
(1347, 270, '_edit_lock', '1445936884:2'),
(1348, 270, '_edit_last', '2'),
(1349, 270, '_wp_page_template', 'page-templates/side-menu.php'),
(1350, 270, '_template_layout', '2c-l'),
(1351, 272, '_edit_lock', '1445936853:2'),
(1352, 272, '_edit_last', '2'),
(1353, 272, '_wp_page_template', 'page-templates/side-menu.php'),
(1354, 272, '_template_layout', '2c-l'),
(1355, 21, '_template_layout', '2c-l'),
(1356, 276, '_edit_lock', '1445936826:2'),
(1357, 276, '_edit_last', '2'),
(1358, 276, '_wp_page_template', 'page-templates/side-menu.php'),
(1359, 276, '_template_layout', '2c-l'),
(1360, 281, '_edit_lock', '1445936895:2'),
(1361, 281, '_edit_last', '2'),
(1362, 283, '_edit_lock', '1445936858:2'),
(1363, 283, '_edit_last', '2'),
(1364, 283, '_wp_page_template', 'page-templates/side-menu.php'),
(1365, 283, '_template_layout', '2c-l'),
(1366, 57, '_template_layout', '2c-l'),
(1368, 287, '_menu_item_type', 'post_type'),
(1369, 287, '_menu_item_menu_item_parent', '0'),
(1370, 287, '_menu_item_object_id', '270'),
(1371, 287, '_menu_item_object', 'page'),
(1372, 287, '_menu_item_target', ''),
(1373, 287, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(1374, 287, '_menu_item_xfn', ''),
(1375, 287, '_menu_item_url', ''),
(1377, 288, '_menu_item_type', 'post_type'),
(1378, 288, '_menu_item_menu_item_parent', '0'),
(1379, 288, '_menu_item_object_id', '268'),
(1380, 288, '_menu_item_object', 'page'),
(1381, 288, '_menu_item_target', ''),
(1382, 288, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(1383, 288, '_menu_item_xfn', ''),
(1384, 288, '_menu_item_url', ''),
(1386, 289, '_menu_item_type', 'post_type'),
(1387, 289, '_menu_item_menu_item_parent', '0'),
(1388, 289, '_menu_item_object_id', '266'),
(1389, 289, '_menu_item_object', 'page'),
(1390, 289, '_menu_item_target', ''),
(1391, 289, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(1392, 289, '_menu_item_xfn', ''),
(1393, 289, '_menu_item_url', ''),
(1395, 290, '_menu_item_type', 'post_type'),
(1396, 290, '_menu_item_menu_item_parent', '0'),
(1397, 290, '_menu_item_object_id', '264'),
(1398, 290, '_menu_item_object', 'page'),
(1399, 290, '_menu_item_target', ''),
(1400, 290, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(1401, 290, '_menu_item_xfn', ''),
(1402, 290, '_menu_item_url', ''),
(1404, 291, '_menu_item_type', 'post_type'),
(1405, 291, '_menu_item_menu_item_parent', '289'),
(1406, 291, '_menu_item_object_id', '283'),
(1407, 291, '_menu_item_object', 'page'),
(1408, 291, '_menu_item_target', ''),
(1409, 291, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(1410, 291, '_menu_item_xfn', ''),
(1411, 291, '_menu_item_url', ''),
(1413, 292, '_menu_item_type', 'post_type'),
(1414, 292, '_menu_item_menu_item_parent', '290'),
(1415, 292, '_menu_item_object_id', '276'),
(1416, 292, '_menu_item_object', 'page'),
(1417, 292, '_menu_item_target', ''),
(1418, 292, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(1419, 292, '_menu_item_xfn', ''),
(1420, 292, '_menu_item_url', ''),
(1422, 293, '_menu_item_type', 'post_type'),
(1423, 293, '_menu_item_menu_item_parent', '290'),
(1424, 293, '_menu_item_object_id', '261'),
(1425, 293, '_menu_item_object', 'page'),
(1426, 293, '_menu_item_target', ''),
(1427, 293, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(1428, 293, '_menu_item_xfn', ''),
(1429, 293, '_menu_item_url', ''),
(1431, 294, '_menu_item_type', 'post_type'),
(1432, 294, '_menu_item_menu_item_parent', '289'),
(1433, 294, '_menu_item_object_id', '272'),
(1434, 294, '_menu_item_object', 'page'),
(1435, 294, '_menu_item_target', ''),
(1436, 294, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(1437, 294, '_menu_item_xfn', ''),
(1438, 294, '_menu_item_url', ''),
(1440, 281, '_wp_page_template', 'page-templates/side-menu.php'),
(1441, 281, '_template_layout', '2c-l'),
(1442, 296, '_menu_item_type', 'post_type'),
(1443, 296, '_menu_item_menu_item_parent', '25'),
(1444, 296, '_menu_item_object_id', '258'),
(1445, 296, '_menu_item_object', 'page'),
(1446, 296, '_menu_item_target', ''),
(1447, 296, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(1448, 296, '_menu_item_xfn', ''),
(1449, 296, '_menu_item_url', ''),
(1451, 297, '_edit_lock', '1445937032:2'),
(1452, 297, '_edit_last', '2'),
(1453, 297, '_wp_page_template', 'page-templates/side-menu.php'),
(1454, 297, '_template_layout', '2c-l'),
(1455, 300, '_edit_lock', '1445937035:2'),
(1456, 300, '_edit_last', '2'),
(1457, 300, '_wp_page_template', 'page-templates/side-menu.php'),
(1458, 300, '_template_layout', '2c-l'),
(1459, 303, '_edit_lock', '1445937039:2'),
(1460, 303, '_edit_last', '2'),
(1461, 303, '_wp_page_template', 'page-templates/side-menu.php'),
(1462, 303, '_template_layout', '2c-l'),
(1463, 305, '_edit_lock', '1445937043:2'),
(1464, 305, '_edit_last', '2'),
(1465, 305, '_wp_page_template', 'page-templates/side-menu.php'),
(1466, 305, '_template_layout', '2c-l'),
(1467, 307, '_edit_lock', '1445937047:2'),
(1468, 307, '_edit_last', '2'),
(1469, 307, '_wp_page_template', 'page-templates/side-menu.php'),
(1470, 307, '_template_layout', '2c-l'),
(1471, 309, '_menu_item_type', 'post_type'),
(1472, 309, '_menu_item_menu_item_parent', '25'),
(1473, 309, '_menu_item_object_id', '297'),
(1474, 309, '_menu_item_object', 'page'),
(1475, 309, '_menu_item_target', ''),
(1476, 309, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(1477, 309, '_menu_item_xfn', ''),
(1478, 309, '_menu_item_url', ''),
(1480, 310, '_menu_item_type', 'post_type'),
(1481, 310, '_menu_item_menu_item_parent', '309'),
(1482, 310, '_menu_item_object_id', '300'),
(1483, 310, '_menu_item_object', 'page'),
(1484, 310, '_menu_item_target', ''),
(1485, 310, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(1486, 310, '_menu_item_xfn', ''),
(1487, 310, '_menu_item_url', ''),
(1489, 311, '_menu_item_type', 'post_type'),
(1490, 311, '_menu_item_menu_item_parent', '309'),
(1491, 311, '_menu_item_object_id', '303'),
(1492, 311, '_menu_item_object', 'page'),
(1493, 311, '_menu_item_target', ''),
(1494, 311, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(1495, 311, '_menu_item_xfn', ''),
(1496, 311, '_menu_item_url', ''),
(1498, 312, '_menu_item_type', 'post_type'),
(1499, 312, '_menu_item_menu_item_parent', '309'),
(1500, 312, '_menu_item_object_id', '305'),
(1501, 312, '_menu_item_object', 'page'),
(1502, 312, '_menu_item_target', ''),
(1503, 312, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(1504, 312, '_menu_item_xfn', ''),
(1505, 312, '_menu_item_url', ''),
(1507, 313, '_menu_item_type', 'post_type'),
(1508, 313, '_menu_item_menu_item_parent', '309'),
(1509, 313, '_menu_item_object_id', '307'),
(1510, 313, '_menu_item_object', 'page'),
(1511, 313, '_menu_item_target', ''),
(1512, 313, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(1513, 313, '_menu_item_xfn', ''),
(1514, 313, '_menu_item_url', ''),
(1516, 314, '_menu_item_type', 'custom'),
(1517, 314, '_menu_item_menu_item_parent', '25'),
(1518, 314, '_menu_item_object_id', '314');
INSERT INTO `wp_postmeta` (`meta_id`, `post_id`, `meta_key`, `meta_value`) VALUES
(1519, 314, '_menu_item_object', 'custom'),
(1520, 314, '_menu_item_target', ''),
(1521, 314, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(1522, 314, '_menu_item_xfn', ''),
(1523, 314, '_menu_item_url', 'https://pwc-int.educacio.intranet/agora/masterzer/docs'),
(1526, 316, '_menu_item_type', 'post_type'),
(1527, 316, '_menu_item_menu_item_parent', '25'),
(1528, 316, '_menu_item_object_id', '63'),
(1529, 316, '_menu_item_object', 'page'),
(1530, 316, '_menu_item_target', ''),
(1531, 316, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(1532, 316, '_menu_item_xfn', ''),
(1533, 316, '_menu_item_url', ''),
(1535, 317, '_edit_lock', '1445936829:2'),
(1536, 317, '_edit_last', '2'),
(1537, 317, '_wp_page_template', 'page-templates/side-menu.php'),
(1538, 317, '_template_layout', '2c-l'),
(1539, 319, '_edit_lock', '1445936862:2'),
(1540, 319, '_edit_last', '2'),
(1541, 319, '_wp_page_template', 'page-templates/side-menu.php'),
(1542, 319, '_template_layout', '2c-l'),
(1543, 321, '_edit_lock', '1445936940:2'),
(1544, 321, '_edit_last', '2'),
(1545, 321, '_wp_page_template', 'page-templates/side-menu.php'),
(1546, 321, '_template_layout', '2c-l'),
(1547, 323, '_edit_lock', '1445936905:2'),
(1548, 323, '_edit_last', '2'),
(1549, 323, '_wp_page_template', 'page-templates/side-menu.php'),
(1550, 323, '_template_layout', '2c-l'),
(1551, 328, '_menu_item_type', 'post_type'),
(1552, 328, '_menu_item_menu_item_parent', '287'),
(1553, 328, '_menu_item_object_id', '323'),
(1554, 328, '_menu_item_object', 'page'),
(1555, 328, '_menu_item_target', ''),
(1556, 328, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(1557, 328, '_menu_item_xfn', ''),
(1558, 328, '_menu_item_url', ''),
(1569, 330, '_menu_item_type', 'post_type'),
(1570, 330, '_menu_item_menu_item_parent', '288'),
(1571, 330, '_menu_item_object_id', '321'),
(1572, 330, '_menu_item_object', 'page'),
(1573, 330, '_menu_item_target', ''),
(1574, 330, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(1575, 330, '_menu_item_xfn', ''),
(1576, 330, '_menu_item_url', ''),
(1578, 331, '_menu_item_type', 'post_type'),
(1579, 331, '_menu_item_menu_item_parent', '290'),
(1580, 331, '_menu_item_object_id', '317'),
(1581, 331, '_menu_item_object', 'page'),
(1582, 331, '_menu_item_target', ''),
(1583, 331, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(1584, 331, '_menu_item_xfn', ''),
(1585, 331, '_menu_item_url', ''),
(1587, 332, '_menu_item_type', 'post_type'),
(1588, 332, '_menu_item_menu_item_parent', '289'),
(1589, 332, '_menu_item_object_id', '319'),
(1590, 332, '_menu_item_object', 'page'),
(1591, 332, '_menu_item_target', ''),
(1592, 332, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(1593, 332, '_menu_item_xfn', ''),
(1594, 332, '_menu_item_url', ''),
(1596, 333, '_edit_lock', '1474025798:2'),
(1597, 333, '_edit_last', '2'),
(1598, 333, '_wp_page_template', 'page-templates/side-menu.php'),
(1599, 333, '_template_layout', '2c-l'),
(1600, 335, '_edit_lock', '1474025794:2'),
(1601, 335, '_edit_last', '2'),
(1602, 335, '_wp_page_template', 'page-templates/side-menu.php'),
(1603, 335, '_template_layout', '2c-l'),
(1604, 337, '_menu_item_type', 'post_type'),
(1605, 337, '_menu_item_menu_item_parent', '289'),
(1606, 337, '_menu_item_object_id', '335'),
(1607, 337, '_menu_item_object', 'page'),
(1608, 337, '_menu_item_target', ''),
(1609, 337, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(1610, 337, '_menu_item_xfn', ''),
(1611, 337, '_menu_item_url', ''),
(1613, 338, '_menu_item_type', 'post_type'),
(1614, 338, '_menu_item_menu_item_parent', '290'),
(1615, 338, '_menu_item_object_id', '333'),
(1616, 338, '_menu_item_object', 'page'),
(1617, 338, '_menu_item_target', ''),
(1618, 338, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(1619, 338, '_menu_item_xfn', ''),
(1620, 338, '_menu_item_url', ''),
(1631, 340, '_menu_item_type', 'taxonomy'),
(1632, 340, '_menu_item_menu_item_parent', '357'),
(1633, 340, '_menu_item_object_id', '58'),
(1634, 340, '_menu_item_object', 'category'),
(1635, 340, '_menu_item_target', ''),
(1636, 340, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(1637, 340, '_menu_item_xfn', ''),
(1638, 340, '_menu_item_url', ''),
(1640, 341, '_menu_item_type', 'taxonomy'),
(1641, 341, '_menu_item_menu_item_parent', '357'),
(1642, 341, '_menu_item_object_id', '60'),
(1643, 341, '_menu_item_object', 'category'),
(1644, 341, '_menu_item_target', ''),
(1645, 341, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(1646, 341, '_menu_item_xfn', ''),
(1647, 341, '_menu_item_url', ''),
(1649, 342, '_menu_item_type', 'taxonomy'),
(1650, 342, '_menu_item_menu_item_parent', '357'),
(1651, 342, '_menu_item_object_id', '61'),
(1652, 342, '_menu_item_object', 'category'),
(1653, 342, '_menu_item_target', ''),
(1654, 342, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(1655, 342, '_menu_item_xfn', ''),
(1656, 342, '_menu_item_url', ''),
(1658, 343, '_menu_item_type', 'taxonomy'),
(1659, 343, '_menu_item_menu_item_parent', '357'),
(1660, 343, '_menu_item_object_id', '62'),
(1661, 343, '_menu_item_object', 'category'),
(1662, 343, '_menu_item_target', ''),
(1663, 343, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(1664, 343, '_menu_item_xfn', ''),
(1665, 343, '_menu_item_url', ''),
(1667, 344, '_menu_item_type', 'taxonomy'),
(1668, 344, '_menu_item_menu_item_parent', '357'),
(1669, 344, '_menu_item_object_id', '63'),
(1670, 344, '_menu_item_object', 'category'),
(1671, 344, '_menu_item_target', ''),
(1672, 344, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(1673, 344, '_menu_item_xfn', ''),
(1674, 344, '_menu_item_url', ''),
(1676, 345, '_menu_item_type', 'taxonomy'),
(1677, 345, '_menu_item_menu_item_parent', '357'),
(1678, 345, '_menu_item_object_id', '64'),
(1679, 345, '_menu_item_object', 'category'),
(1680, 345, '_menu_item_target', ''),
(1681, 345, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(1682, 345, '_menu_item_xfn', ''),
(1683, 345, '_menu_item_url', ''),
(1685, 346, '_menu_item_type', 'taxonomy'),
(1686, 346, '_menu_item_menu_item_parent', '357'),
(1687, 346, '_menu_item_object_id', '65'),
(1688, 346, '_menu_item_object', 'category'),
(1689, 346, '_menu_item_target', ''),
(1690, 346, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(1691, 346, '_menu_item_xfn', ''),
(1692, 346, '_menu_item_url', ''),
(1694, 347, '_menu_item_type', 'taxonomy'),
(1695, 347, '_menu_item_menu_item_parent', '357'),
(1696, 347, '_menu_item_object_id', '66'),
(1697, 347, '_menu_item_object', 'category'),
(1698, 347, '_menu_item_target', ''),
(1699, 347, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(1700, 347, '_menu_item_xfn', ''),
(1701, 347, '_menu_item_url', ''),
(1703, 348, '_menu_item_type', 'taxonomy'),
(1704, 348, '_menu_item_menu_item_parent', '357'),
(1705, 348, '_menu_item_object_id', '67'),
(1706, 348, '_menu_item_object', 'category'),
(1707, 348, '_menu_item_target', ''),
(1708, 348, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(1709, 348, '_menu_item_xfn', ''),
(1710, 348, '_menu_item_url', ''),
(1712, 349, '_edit_lock', '1445936841:2'),
(1713, 349, '_edit_last', '2'),
(1714, 349, '_wp_page_template', 'page-templates/side-menu.php'),
(1715, 349, '_template_layout', '2c-l'),
(1725, 353, '_menu_item_type', 'post_type'),
(1726, 353, '_menu_item_menu_item_parent', '290'),
(1727, 353, '_menu_item_object_id', '349'),
(1728, 353, '_menu_item_object', 'page'),
(1729, 353, '_menu_item_target', ''),
(1730, 353, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(1731, 353, '_menu_item_xfn', ''),
(1732, 353, '_menu_item_url', ''),
(1734, 354, '_edit_lock', '1445936838:2'),
(1735, 354, '_edit_last', '2'),
(1736, 354, '_wp_page_template', 'page-templates/side-menu.php'),
(1737, 354, '_template_layout', '2c-l'),
(1738, 357, '_menu_item_type', 'post_type'),
(1739, 357, '_menu_item_menu_item_parent', '290'),
(1740, 357, '_menu_item_object_id', '354'),
(1741, 357, '_menu_item_object', 'page'),
(1742, 357, '_menu_item_target', ''),
(1743, 357, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(1744, 357, '_menu_item_xfn', ''),
(1745, 357, '_menu_item_url', ''),
(1747, 359, '_edit_lock', '1445936871:2'),
(1748, 359, '_edit_last', '2'),
(1749, 359, '_wp_page_template', 'page-templates/side-menu.php'),
(1750, 359, '_template_layout', '2c-l'),
(1751, 361, '_menu_item_type', 'post_type'),
(1752, 361, '_menu_item_menu_item_parent', '289'),
(1753, 361, '_menu_item_object_id', '359'),
(1754, 361, '_menu_item_object', 'page'),
(1755, 361, '_menu_item_target', ''),
(1756, 361, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(1757, 361, '_menu_item_xfn', ''),
(1758, 361, '_menu_item_url', ''),
(1805, 367, '_edit_lock', '1445936889:2'),
(1806, 367, '_edit_last', '2'),
(1807, 367, '_oembed_98860623bfe6a5baf7c3c6a95a9a76d7', '{{unknown}}'),
(1808, 367, '_oembed_d986750e14cb83d64807f102e7c977c1', '{{unknown}}'),
(1809, 368, '_menu_item_type', 'taxonomy'),
(1810, 368, '_menu_item_menu_item_parent', '361'),
(1811, 368, '_menu_item_object_id', '73'),
(1812, 368, '_menu_item_object', 'category'),
(1813, 368, '_menu_item_target', ''),
(1814, 368, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(1815, 368, '_menu_item_xfn', ''),
(1816, 368, '_menu_item_url', ''),
(1818, 369, '_menu_item_type', 'taxonomy'),
(1819, 369, '_menu_item_menu_item_parent', '361'),
(1820, 369, '_menu_item_object_id', '74'),
(1821, 369, '_menu_item_object', 'category'),
(1822, 369, '_menu_item_target', ''),
(1823, 369, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(1824, 369, '_menu_item_xfn', ''),
(1825, 369, '_menu_item_url', ''),
(1827, 370, '_menu_item_type', 'taxonomy'),
(1828, 370, '_menu_item_menu_item_parent', '361'),
(1829, 370, '_menu_item_object_id', '75'),
(1830, 370, '_menu_item_object', 'category'),
(1831, 370, '_menu_item_target', ''),
(1832, 370, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(1833, 370, '_menu_item_xfn', ''),
(1834, 370, '_menu_item_url', ''),
(1836, 371, '_menu_item_type', 'taxonomy'),
(1837, 371, '_menu_item_menu_item_parent', '361'),
(1838, 371, '_menu_item_object_id', '71'),
(1839, 371, '_menu_item_object', 'category'),
(1840, 371, '_menu_item_target', ''),
(1841, 371, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(1842, 371, '_menu_item_xfn', ''),
(1843, 371, '_menu_item_url', ''),
(1845, 372, '_menu_item_type', 'taxonomy'),
(1846, 372, '_menu_item_menu_item_parent', '361'),
(1847, 372, '_menu_item_object_id', '72'),
(1848, 372, '_menu_item_object', 'category'),
(1849, 372, '_menu_item_target', ''),
(1850, 372, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(1851, 372, '_menu_item_xfn', ''),
(1852, 372, '_menu_item_url', ''),
(1899, 378, '_menu_item_type', 'taxonomy'),
(1900, 378, '_menu_item_menu_item_parent', '387'),
(1901, 378, '_menu_item_object_id', '84'),
(1902, 378, '_menu_item_object', 'category'),
(1903, 378, '_menu_item_target', ''),
(1904, 378, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(1905, 378, '_menu_item_xfn', ''),
(1906, 378, '_menu_item_url', ''),
(1908, 379, '_menu_item_type', 'taxonomy'),
(1909, 379, '_menu_item_menu_item_parent', '387'),
(1910, 379, '_menu_item_object_id', '82'),
(1911, 379, '_menu_item_object', 'category'),
(1912, 379, '_menu_item_target', ''),
(1913, 379, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(1914, 379, '_menu_item_xfn', ''),
(1915, 379, '_menu_item_url', ''),
(1917, 380, '_menu_item_type', 'taxonomy'),
(1918, 380, '_menu_item_menu_item_parent', '387'),
(1919, 380, '_menu_item_object_id', '83'),
(1920, 380, '_menu_item_object', 'category'),
(1921, 380, '_menu_item_target', ''),
(1922, 380, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(1923, 380, '_menu_item_xfn', ''),
(1924, 380, '_menu_item_url', ''),
(1926, 381, '_menu_item_type', 'taxonomy'),
(1927, 381, '_menu_item_menu_item_parent', '387'),
(1928, 381, '_menu_item_object_id', '80'),
(1929, 381, '_menu_item_object', 'category'),
(1930, 381, '_menu_item_target', ''),
(1931, 381, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(1932, 381, '_menu_item_xfn', ''),
(1933, 381, '_menu_item_url', ''),
(1935, 382, '_menu_item_type', 'taxonomy'),
(1936, 382, '_menu_item_menu_item_parent', '387'),
(1937, 382, '_menu_item_object_id', '81'),
(1938, 382, '_menu_item_object', 'category'),
(1939, 382, '_menu_item_target', ''),
(1940, 382, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(1941, 382, '_menu_item_xfn', ''),
(1942, 382, '_menu_item_url', ''),
(1944, 383, '_edit_lock', '1445936914:2'),
(1945, 383, '_edit_last', '2'),
(1946, 383, '_wp_page_template', 'page-templates/side-menu.php'),
(1947, 383, '_template_layout', '2c-l'),
(1948, 385, '_edit_lock', '1445936947:2'),
(1949, 385, '_edit_last', '2'),
(1950, 385, '_wp_page_template', 'page-templates/side-menu.php'),
(1951, 385, '_template_layout', '2c-l'),
(1952, 387, '_menu_item_type', 'post_type'),
(1953, 387, '_menu_item_menu_item_parent', '287'),
(1954, 387, '_menu_item_object_id', '383'),
(1955, 387, '_menu_item_object', 'page'),
(1956, 387, '_menu_item_target', ''),
(1957, 387, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(1958, 387, '_menu_item_xfn', ''),
(1959, 387, '_menu_item_url', ''),
(1961, 367, '_wp_page_template', 'page-templates/side-menu.php'),
(1962, 367, '_template_layout', '2c-l'),
(1967, 391, '_menu_item_type', 'post_type'),
(1968, 391, '_menu_item_menu_item_parent', '287'),
(1969, 391, '_menu_item_object_id', '367'),
(1970, 391, '_menu_item_object', 'page'),
(1971, 391, '_menu_item_target', ''),
(1972, 391, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(1973, 391, '_menu_item_xfn', ''),
(1974, 391, '_menu_item_url', ''),
(1976, 392, '_menu_item_type', 'post_type'),
(1977, 392, '_menu_item_menu_item_parent', '287'),
(1978, 392, '_menu_item_object_id', '281'),
(1979, 392, '_menu_item_object', 'page'),
(1980, 392, '_menu_item_target', ''),
(1981, 392, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(1982, 392, '_menu_item_xfn', ''),
(1983, 392, '_menu_item_url', ''),
(1985, 393, '_edit_lock', '1474543146:2'),
(1986, 393, '_edit_last', '2'),
(1987, 393, '_wp_page_template', 'page-templates/side-menu.php'),
(1988, 393, '_template_layout', '2c-l'),
(1989, 395, '_menu_item_type', 'post_type'),
(1990, 395, '_menu_item_menu_item_parent', '287'),
(1991, 395, '_menu_item_object_id', '393'),
(1992, 395, '_menu_item_object', 'page'),
(1993, 395, '_menu_item_target', ''),
(1994, 395, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(1995, 395, '_menu_item_xfn', ''),
(1996, 395, '_menu_item_url', ''),
(1998, 396, '_edit_lock', '1445936932:2'),
(1999, 396, '_edit_last', '2'),
(2000, 396, '_wp_page_template', 'page-templates/side-menu.php'),
(2001, 396, '_template_layout', '2c-l'),
(2002, 398, '_edit_lock', '1445936937:2'),
(2003, 398, '_edit_last', '2'),
(2004, 398, '_wp_page_template', 'page-templates/side-menu.php'),
(2005, 398, '_template_layout', '2c-l'),
(2006, 400, '_edit_lock', '1474026020:2'),
(2007, 400, '_edit_last', '2'),
(2008, 400, '_wp_page_template', 'page-templates/side-menu.php'),
(2009, 400, '_template_layout', '2c-l'),
(2010, 402, '_menu_item_type', 'post_type'),
(2011, 402, '_menu_item_menu_item_parent', '288'),
(2012, 402, '_menu_item_object_id', '385'),
(2013, 402, '_menu_item_object', 'page'),
(2014, 402, '_menu_item_target', ''),
(2015, 402, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(2016, 402, '_menu_item_xfn', ''),
(2017, 402, '_menu_item_url', ''),
(2019, 403, '_menu_item_type', 'post_type'),
(2020, 403, '_menu_item_menu_item_parent', '288'),
(2021, 403, '_menu_item_object_id', '396'),
(2022, 403, '_menu_item_object', 'page'),
(2023, 403, '_menu_item_target', ''),
(2024, 403, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(2025, 403, '_menu_item_xfn', ''),
(2026, 403, '_menu_item_url', ''),
(2028, 404, '_menu_item_type', 'post_type'),
(2029, 404, '_menu_item_menu_item_parent', '288'),
(2030, 404, '_menu_item_object_id', '398'),
(2031, 404, '_menu_item_object', 'page'),
(2032, 404, '_menu_item_target', ''),
(2033, 404, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(2034, 404, '_menu_item_xfn', ''),
(2035, 404, '_menu_item_url', ''),
(2037, 405, '_menu_item_type', 'post_type'),
(2038, 405, '_menu_item_menu_item_parent', '288'),
(2039, 405, '_menu_item_object_id', '400'),
(2040, 405, '_menu_item_object', 'page'),
(2041, 405, '_menu_item_target', ''),
(2042, 405, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(2043, 405, '_menu_item_xfn', ''),
(2044, 405, '_menu_item_url', ''),
(2046, 406, '_menu_item_type', 'taxonomy'),
(2047, 406, '_menu_item_menu_item_parent', '402'),
(2048, 406, '_menu_item_object_id', '87'),
(2049, 406, '_menu_item_object', 'category'),
(2050, 406, '_menu_item_target', ''),
(2051, 406, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(2052, 406, '_menu_item_xfn', ''),
(2053, 406, '_menu_item_url', ''),
(2055, 407, '_menu_item_type', 'taxonomy'),
(2056, 407, '_menu_item_menu_item_parent', '402'),
(2057, 407, '_menu_item_object_id', '88'),
(2058, 407, '_menu_item_object', 'category'),
(2059, 407, '_menu_item_target', ''),
(2060, 407, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(2061, 407, '_menu_item_xfn', ''),
(2062, 407, '_menu_item_url', ''),
(2064, 408, '_menu_item_type', 'taxonomy'),
(2065, 408, '_menu_item_menu_item_parent', '402'),
(2066, 408, '_menu_item_object_id', '89'),
(2067, 408, '_menu_item_object', 'category'),
(2068, 408, '_menu_item_target', ''),
(2069, 408, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(2070, 408, '_menu_item_xfn', ''),
(2071, 408, '_menu_item_url', ''),
(2073, 409, '_menu_item_type', 'taxonomy'),
(2074, 409, '_menu_item_menu_item_parent', '402'),
(2075, 409, '_menu_item_object_id', '85'),
(2076, 409, '_menu_item_object', 'category'),
(2077, 409, '_menu_item_target', ''),
(2078, 409, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(2079, 409, '_menu_item_xfn', ''),
(2080, 409, '_menu_item_url', ''),
(2082, 410, '_menu_item_type', 'taxonomy'),
(2083, 410, '_menu_item_menu_item_parent', '402'),
(2084, 410, '_menu_item_object_id', '86'),
(2085, 410, '_menu_item_object', 'category'),
(2086, 410, '_menu_item_target', ''),
(2087, 410, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(2088, 410, '_menu_item_xfn', ''),
(2089, 410, '_menu_item_url', ''),
(2091, 411, '_edit_lock', '1445936875:2'),
(2092, 411, '_edit_last', '2'),
(2093, 411, '_wp_page_template', 'page-templates/side-menu.php'),
(2094, 411, '_template_layout', '2c-l'),
(2095, 414, '_edit_lock', '1445936918:2'),
(2096, 414, '_edit_last', '2'),
(2097, 414, '_wp_page_template', 'page-templates/side-menu.php'),
(2098, 414, '_template_layout', '2c-l'),
(2099, 417, '_edit_lock', '1445937012:2'),
(2100, 417, '_edit_last', '2'),
(2101, 417, '_wp_page_template', 'page-templates/side-menu.php'),
(2102, 417, '_template_layout', '2c-l'),
(2103, 419, '_menu_item_type', 'post_type'),
(2104, 419, '_menu_item_menu_item_parent', '289'),
(2105, 419, '_menu_item_object_id', '411'),
(2106, 419, '_menu_item_object', 'page'),
(2107, 419, '_menu_item_target', ''),
(2108, 419, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(2109, 419, '_menu_item_xfn', ''),
(2110, 419, '_menu_item_url', ''),
(2112, 420, '_menu_item_type', 'post_type'),
(2113, 420, '_menu_item_menu_item_parent', '288'),
(2114, 420, '_menu_item_object_id', '417'),
(2115, 420, '_menu_item_object', 'page'),
(2116, 420, '_menu_item_target', ''),
(2117, 420, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(2118, 420, '_menu_item_xfn', ''),
(2119, 420, '_menu_item_url', ''),
(2121, 421, '_menu_item_type', 'post_type'),
(2122, 421, '_menu_item_menu_item_parent', '287'),
(2123, 421, '_menu_item_object_id', '414'),
(2124, 421, '_menu_item_object', 'page'),
(2125, 421, '_menu_item_target', ''),
(2126, 421, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(2127, 421, '_menu_item_xfn', ''),
(2128, 421, '_menu_item_url', ''),
(2130, 422, '_wp_attached_file', '2015/07/zer1.jpg'),
(2131, 422, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:700;s:6:"height";i:525;s:4:"file";s:16:"2015/07/zer1.jpg";s:5:"sizes";a:4:{s:9:"thumbnail";a:4:{s:4:"file";s:16:"zer1-150x150.jpg";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:10:"image/jpeg";}s:6:"medium";a:4:{s:4:"file";s:16:"zer1-300x225.jpg";s:5:"width";i:300;s:6:"height";i:225;s:9:"mime-type";s:10:"image/jpeg";}s:9:"thumb-300";a:4:{s:4:"file";s:16:"zer1-300x250.jpg";s:5:"width";i:300;s:6:"height";i:250;s:9:"mime-type";s:10:"image/jpeg";}s:9:"thumb-200";a:4:{s:4:"file";s:16:"zer1-200x150.jpg";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:10:"image/jpeg";}}s:10:"image_meta";a:11:{s:8:"aperture";i:0;s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";i:0;s:9:"copyright";s:0:"";s:12:"focal_length";i:0;s:3:"iso";i:0;s:13:"shutter_speed";i:0;s:5:"title";s:0:"";s:11:"orientation";i:0;}}'),
(2132, 423, '_wp_attached_file', '2015/07/zer1.png'),
(2133, 423, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:630;s:6:"height";i:315;s:4:"file";s:16:"2015/07/zer1.png";s:5:"sizes";a:4:{s:9:"thumbnail";a:4:{s:4:"file";s:16:"zer1-150x150.png";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}s:6:"medium";a:4:{s:4:"file";s:16:"zer1-300x150.png";s:5:"width";i:300;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-300";a:4:{s:4:"file";s:16:"zer1-300x250.png";s:5:"width";i:300;s:6:"height";i:250;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-200";a:4:{s:4:"file";s:16:"zer1-200x150.png";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}}s:10:"image_meta";a:11:{s:8:"aperture";i:0;s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";i:0;s:9:"copyright";s:0:"";s:12:"focal_length";i:0;s:3:"iso";i:0;s:13:"shutter_speed";i:0;s:5:"title";s:0:"";s:11:"orientation";i:0;}}'),
(2134, 107, 'picasa_album', ''),
(2135, 107, 'googlephotos_album', ''),
(2136, 424, '_wp_attached_file', '2015/07/zer4.jpg'),
(2137, 424, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:887;s:6:"height";i:444;s:4:"file";s:16:"2015/07/zer4.jpg";s:5:"sizes";a:4:{s:9:"thumbnail";a:4:{s:4:"file";s:16:"zer4-150x150.jpg";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:10:"image/jpeg";}s:6:"medium";a:4:{s:4:"file";s:16:"zer4-300x150.jpg";s:5:"width";i:300;s:6:"height";i:150;s:9:"mime-type";s:10:"image/jpeg";}s:9:"thumb-300";a:4:{s:4:"file";s:16:"zer4-300x250.jpg";s:5:"width";i:300;s:6:"height";i:250;s:9:"mime-type";s:10:"image/jpeg";}s:9:"thumb-200";a:4:{s:4:"file";s:16:"zer4-200x150.jpg";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:10:"image/jpeg";}}s:10:"image_meta";a:11:{s:8:"aperture";i:0;s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";i:0;s:9:"copyright";s:0:"";s:12:"focal_length";i:0;s:3:"iso";i:0;s:13:"shutter_speed";i:0;s:5:"title";s:0:"";s:11:"orientation";i:0;}}'),
(2138, 425, '_wp_attached_file', '2015/07/zer5.jpg'),
(2139, 425, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:874;s:6:"height";i:459;s:4:"file";s:16:"2015/07/zer5.jpg";s:5:"sizes";a:4:{s:9:"thumbnail";a:4:{s:4:"file";s:16:"zer5-150x150.jpg";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:10:"image/jpeg";}s:6:"medium";a:4:{s:4:"file";s:16:"zer5-300x158.jpg";s:5:"width";i:300;s:6:"height";i:158;s:9:"mime-type";s:10:"image/jpeg";}s:9:"thumb-300";a:4:{s:4:"file";s:16:"zer5-300x250.jpg";s:5:"width";i:300;s:6:"height";i:250;s:9:"mime-type";s:10:"image/jpeg";}s:9:"thumb-200";a:4:{s:4:"file";s:16:"zer5-200x150.jpg";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:10:"image/jpeg";}}s:10:"image_meta";a:11:{s:8:"aperture";i:0;s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";i:0;s:9:"copyright";s:0:"";s:12:"focal_length";i:0;s:3:"iso";i:0;s:13:"shutter_speed";i:0;s:5:"title";s:0:"";s:11:"orientation";i:0;}}'),
(2140, 426, '_edit_lock', '1445936846:2'),
(2141, 426, '_edit_last', '2'),
(2142, 426, '_oembed_6e8a3467e8b5c0a80f5931070f88ebf4', '{{unknown}}'),
(2143, 426, '_oembed_8552a48f2f80b771e145ac1b61fb8168', '{{unknown}}'),
(2144, 426, '_wp_page_template', 'page-templates/side-menu.php'),
(2145, 426, '_template_layout', '2c-l'),
(2155, 184, '_thumbnail_id', '33'),
(2158, 184, '_original_size', ''),
(2159, 184, '_entry_icon', 'noicon'),
(2160, 435, '_edit_lock', '1445936879:2'),
(2161, 435, '_edit_last', '2'),
(2162, 435, '_wp_page_template', 'page-templates/side-menu.php'),
(2163, 435, '_template_layout', '2c-l'),
(2166, 43, '_template_layout', '2c-l'),
(2167, 63, '_template_layout', '2c-l'),
(2178, 440, '_edit_lock', '1445937055:2'),
(2179, 440, '_edit_last', '2'),
(2180, 440, '_wp_page_template', 'page-templates/side-menu.php'),
(2181, 440, '_template_layout', '2c-l'),
(2182, 442, '_menu_item_type', 'post_type'),
(2183, 442, '_menu_item_menu_item_parent', '25'),
(2184, 442, '_menu_item_object_id', '440'),
(2185, 442, '_menu_item_object', 'page'),
(2186, 442, '_menu_item_target', ''),
(2187, 442, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(2188, 442, '_menu_item_xfn', ''),
(2189, 442, '_menu_item_url', ''),
(2204, 448, '_edit_lock', '1445937051:2'),
(2205, 448, '_edit_last', '2'),
(2206, 448, '_wp_page_template', 'page-templates/side-menu.php'),
(2207, 448, '_template_layout', '2c-l'),
(2208, 451, '_bbp_reply_count', '0'),
(2209, 451, '_bbp_topic_count', '0'),
(2210, 451, '_bbp_topic_count_hidden', '0'),
(2211, 451, '_bbp_total_reply_count', '0'),
(2212, 451, '_bbp_total_topic_count', '0'),
(2213, 451, '_bbp_last_topic_id', '0'),
(2214, 451, '_bbp_last_reply_id', '0'),
(2215, 451, '_bbp_last_active_id', '0'),
(2216, 451, '_bbp_last_active_time', '0'),
(2217, 451, '_bbp_forum_subforum_count', '0'),
(2218, 451, '_bbp_group_ids', 'a:1:{i:0;i:20;}'),
(2219, 452, '_bbp_reply_count', '0'),
(2220, 452, '_bbp_topic_count', '0'),
(2221, 452, '_bbp_topic_count_hidden', '0'),
(2222, 452, '_bbp_total_reply_count', '0'),
(2223, 452, '_bbp_total_topic_count', '0'),
(2224, 452, '_bbp_last_topic_id', '0'),
(2225, 452, '_bbp_last_reply_id', '0'),
(2226, 452, '_bbp_last_active_id', '0'),
(2227, 452, '_bbp_last_active_time', '0'),
(2228, 452, '_bbp_forum_subforum_count', '0'),
(2229, 452, '_bbp_group_ids', 'a:1:{i:0;i:21;}'),
(2230, 453, '_bbp_reply_count', '0'),
(2231, 453, '_bbp_topic_count', '0'),
(2232, 453, '_bbp_topic_count_hidden', '0'),
(2233, 453, '_bbp_total_reply_count', '0'),
(2234, 453, '_bbp_total_topic_count', '0'),
(2235, 453, '_bbp_last_topic_id', '0'),
(2236, 453, '_bbp_last_reply_id', '0'),
(2237, 453, '_bbp_last_active_id', '0'),
(2238, 453, '_bbp_last_active_time', '0'),
(2239, 453, '_bbp_forum_subforum_count', '0'),
(2240, 453, '_bbp_group_ids', 'a:1:{i:0;i:22;}'),
(2241, 454, '_bbp_reply_count', '0'),
(2242, 454, '_bbp_topic_count', '0'),
(2243, 454, '_bbp_topic_count_hidden', '0'),
(2244, 454, '_bbp_total_reply_count', '0'),
(2245, 454, '_bbp_total_topic_count', '0'),
(2246, 454, '_bbp_last_topic_id', '0'),
(2247, 454, '_bbp_last_reply_id', '0'),
(2248, 454, '_bbp_last_active_id', '0'),
(2249, 454, '_bbp_last_active_time', '0'),
(2250, 454, '_bbp_forum_subforum_count', '0'),
(2251, 454, '_bbp_group_ids', 'a:1:{i:0;i:23;}'),
(2252, 478, '_menu_item_type', 'post_type'),
(2253, 478, '_menu_item_menu_item_parent', '290'),
(2254, 478, '_menu_item_object_id', '426'),
(2255, 478, '_menu_item_object', 'page'),
(2256, 478, '_menu_item_target', ''),
(2257, 478, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(2258, 478, '_menu_item_xfn', ''),
(2259, 478, '_menu_item_url', ''),
(2261, 494, '_edit_lock', '1445937017:2'),
(2262, 494, '_edit_last', '2'),
(2263, 494, '_wp_page_template', 'page-templates/side-menu.php'),
(2264, 494, '_template_layout', '2c-l'),
(2265, 498, '_edit_lock', '1445936922:2'),
(2266, 498, '_edit_last', '2'),
(2267, 498, '_wp_page_template', 'page-templates/side-menu.php'),
(2268, 498, '_template_layout', '2c-l'),
(2269, 501, '_menu_item_type', 'post_type'),
(2270, 501, '_menu_item_menu_item_parent', '289'),
(2271, 501, '_menu_item_object_id', '435'),
(2272, 501, '_menu_item_object', 'page'),
(2273, 501, '_menu_item_target', ''),
(2274, 501, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(2275, 501, '_menu_item_xfn', ''),
(2276, 501, '_menu_item_url', ''),
(2287, 503, '_menu_item_type', 'post_type'),
(2288, 503, '_menu_item_menu_item_parent', '287'),
(2289, 503, '_menu_item_object_id', '498'),
(2290, 503, '_menu_item_object', 'page'),
(2291, 503, '_menu_item_target', ''),
(2292, 503, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(2293, 503, '_menu_item_xfn', ''),
(2294, 503, '_menu_item_url', ''),
(2296, 505, '_menu_item_type', 'post_type'),
(2297, 505, '_menu_item_menu_item_parent', '288'),
(2298, 505, '_menu_item_object_id', '494'),
(2299, 505, '_menu_item_object', 'page'),
(2300, 505, '_menu_item_target', ''),
(2301, 505, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(2302, 505, '_menu_item_xfn', ''),
(2303, 505, '_menu_item_url', ''),
(2307, 163, '_original_size', ''),
(2308, 163, '_entry_icon', 'noicon'),
(2311, 161, '_original_size', ''),
(2312, 161, '_entry_icon', 'noicon'),
(2317, 506, '_menu_item_type', 'taxonomy'),
(2318, 506, '_menu_item_menu_item_parent', '0'),
(2319, 506, '_menu_item_object_id', '59'),
(2320, 506, '_menu_item_object', 'category'),
(2321, 506, '_menu_item_target', ''),
(2322, 506, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(2323, 506, '_menu_item_xfn', ''),
(2324, 506, '_menu_item_url', ''),
(2326, 507, '_menu_item_type', 'taxonomy'),
(2327, 507, '_menu_item_menu_item_parent', '0'),
(2328, 507, '_menu_item_object_id', '68'),
(2329, 507, '_menu_item_object', 'category'),
(2330, 507, '_menu_item_target', ''),
(2331, 507, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(2332, 507, '_menu_item_xfn', ''),
(2333, 507, '_menu_item_url', ''),
(2335, 508, '_menu_item_type', 'taxonomy'),
(2336, 508, '_menu_item_menu_item_parent', '0'),
(2337, 508, '_menu_item_object_id', '70'),
(2338, 508, '_menu_item_object', 'category'),
(2339, 508, '_menu_item_target', ''),
(2340, 508, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(2341, 508, '_menu_item_xfn', ''),
(2342, 508, '_menu_item_url', ''),
(2344, 509, '_menu_item_type', 'taxonomy'),
(2345, 509, '_menu_item_menu_item_parent', '0'),
(2346, 509, '_menu_item_object_id', '69'),
(2347, 509, '_menu_item_object', 'category'),
(2348, 509, '_menu_item_target', ''),
(2349, 509, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(2350, 509, '_menu_item_xfn', ''),
(2351, 509, '_menu_item_url', ''),
(2355, 137, '_original_size', ''),
(2356, 137, '_entry_icon', 'noicon'),
(2363, 134, '_original_size', ''),
(2364, 134, '_entry_icon', 'noicon'),
(2367, 129, '_original_size', ''),
(2368, 129, '_entry_icon', 'noicon'),
(2371, 127, '_original_size', ''),
(2372, 127, '_entry_icon', 'noicon'),
(2377, 109, '_original_size', ''),
(2378, 109, '_entry_icon', 'noicon'),
(2379, 109, '_oembed_time_a47471043cf1f80e92ecf21d41f541f0', '1437992453'),
(2382, 120, '_original_size', ''),
(2383, 120, '_entry_icon', 'noicon'),
(2388, 510, '_wp_attached_file', '2015/07/Selecció_999373.png'),
(2389, 510, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:257;s:6:"height";i:255;s:4:"file";s:28:"2015/07/Selecció_999373.png";s:5:"sizes";a:3:{s:9:"thumbnail";a:4:{s:4:"file";s:28:"Selecció_999373-150x150.png";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-300";a:4:{s:4:"file";s:28:"Selecció_999373-257x250.png";s:5:"width";i:257;s:6:"height";i:250;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-200";a:4:{s:4:"file";s:28:"Selecció_999373-200x150.png";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}}s:10:"image_meta";a:11:{s:8:"aperture";i:0;s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";i:0;s:9:"copyright";s:0:"";s:12:"focal_length";i:0;s:3:"iso";i:0;s:13:"shutter_speed";i:0;s:5:"title";s:0:"";s:11:"orientation";i:0;}}'),
(2390, 511, '_wp_attached_file', '2015/07/Selecció_999372.png'),
(2391, 511, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:258;s:6:"height";i:252;s:4:"file";s:28:"2015/07/Selecció_999372.png";s:5:"sizes";a:3:{s:9:"thumbnail";a:4:{s:4:"file";s:28:"Selecció_999372-150x150.png";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-300";a:4:{s:4:"file";s:28:"Selecció_999372-258x250.png";s:5:"width";i:258;s:6:"height";i:250;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-200";a:4:{s:4:"file";s:28:"Selecció_999372-200x150.png";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}}s:10:"image_meta";a:11:{s:8:"aperture";i:0;s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";i:0;s:9:"copyright";s:0:"";s:12:"focal_length";i:0;s:3:"iso";i:0;s:13:"shutter_speed";i:0;s:5:"title";s:0:"";s:11:"orientation";i:0;}}'),
(2392, 512, '_wp_attached_file', '2015/07/Selecció_999371.png'),
(2393, 512, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:252;s:6:"height";i:250;s:4:"file";s:28:"2015/07/Selecció_999371.png";s:5:"sizes";a:3:{s:9:"thumbnail";a:4:{s:4:"file";s:28:"Selecció_999371-150x150.png";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-300";a:4:{s:4:"file";s:28:"Selecció_999371-252x250.png";s:5:"width";i:252;s:6:"height";i:250;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-200";a:4:{s:4:"file";s:28:"Selecció_999371-200x150.png";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}}s:10:"image_meta";a:11:{s:8:"aperture";i:0;s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";i:0;s:9:"copyright";s:0:"";s:12:"focal_length";i:0;s:3:"iso";i:0;s:13:"shutter_speed";i:0;s:5:"title";s:0:"";s:11:"orientation";i:0;}}'),
(2394, 513, '_wp_attached_file', '2015/07/Selecció_999374.png'),
(2395, 513, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:258;s:6:"height";i:263;s:4:"file";s:28:"2015/07/Selecció_999374.png";s:5:"sizes";a:3:{s:9:"thumbnail";a:4:{s:4:"file";s:28:"Selecció_999374-150x150.png";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-300";a:4:{s:4:"file";s:28:"Selecció_999374-258x250.png";s:5:"width";i:258;s:6:"height";i:250;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-200";a:4:{s:4:"file";s:28:"Selecció_999374-200x150.png";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}}s:10:"image_meta";a:11:{s:8:"aperture";i:0;s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";i:0;s:9:"copyright";s:0:"";s:12:"focal_length";i:0;s:3:"iso";i:0;s:13:"shutter_speed";i:0;s:5:"title";s:0:"";s:11:"orientation";i:0;}}'),
(2416, 514, '_edit_lock', '1437756549:2'),
(2417, 514, '_edit_last', '2'),
(2448, 515, '_edit_lock', '1437756570:2'),
(2449, 515, '_edit_last', '2'),
(2480, 516, '_edit_lock', '1437756595:2'),
(2481, 516, '_edit_last', '2'),
(2512, 517, '_edit_lock', '1437756617:2'),
(2513, 517, '_edit_last', '2'),
(2524, 514, 'gce_paging_widget', '1'),
(2525, 514, 'gce_widget_paging_interval', '604800'),
(2526, 515, 'gce_paging_widget', '1'),
(2527, 515, 'gce_widget_paging_interval', '604800'),
(2528, 516, 'gce_paging_widget', '1'),
(2529, 516, 'gce_widget_paging_interval', '604800'),
(2530, 517, 'gce_paging_widget', '1'),
(2531, 517, 'gce_widget_paging_interval', '604800'),
(2542, 5, '_edit_lock', '1437992567:2'),
(2543, 6, '_edit_lock', '1437993882:2'),
(2544, 16, '_edit_lock', '1437993883:2'),
(2553, 554, '_edit_lock', '1474450682:2'),
(2554, 554, '_edit_last', '2'),
(2555, 554, '_wp_page_template', 'default'),
(2556, 554, '_template_layout', '2c-l'),
(2558, 565, '_menu_item_type', 'post_type'),
(2559, 565, '_menu_item_menu_item_parent', '0'),
(2560, 565, '_menu_item_object_id', '5'),
(2561, 565, '_menu_item_object', 'page'),
(2562, 565, '_menu_item_target', ''),
(2563, 565, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(2564, 565, '_menu_item_xfn', ''),
(2565, 565, '_menu_item_url', ''),
(2567, 566, '_menu_item_type', 'post_type'),
(2568, 566, '_menu_item_menu_item_parent', '0'),
(2569, 566, '_menu_item_object_id', '6'),
(2570, 566, '_menu_item_object', 'page'),
(2571, 566, '_menu_item_target', ''),
(2572, 566, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(2573, 566, '_menu_item_xfn', ''),
(2574, 566, '_menu_item_url', ''),
(2576, 567, '_menu_item_type', 'post_type'),
(2577, 567, '_menu_item_menu_item_parent', '0'),
(2578, 567, '_menu_item_object_id', '16'),
(2579, 567, '_menu_item_object', 'page'),
(2580, 567, '_menu_item_target', ''),
(2581, 567, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(2582, 567, '_menu_item_xfn', ''),
(2583, 567, '_menu_item_url', ''),
(2584, 568, '_edit_lock', '1459252211:2'),
(2585, 568, '_edit_last', '1'),
(2586, 568, '_wp_page_template', 'default'),
(2587, 568, 'sharing_disabled', '1'),
(2588, 568, '_template_layout', '2c-l'),
(2589, 570, '_edit_lock', '1459252226:2'),
(2590, 570, '_edit_last', '1'),
(2591, 570, '_wp_page_template', 'default'),
(2592, 570, 'sharing_disabled', '1'),
(2593, 570, '_template_layout', '2c-l'),
(2594, 517, '_calendar_view', 'a:1:{s:16:"default-calendar";s:4:"grid";}'),
(2595, 517, '_default_calendar_list_range_type', 'daily'),
(2596, 517, '_default_calendar_list_range_span', '7'),
(2597, 517, '_calendar_begins', 'today'),
(2598, 517, '_feed_earliest_event_date', 'months_before'),
(2599, 517, '_feed_earliest_event_date_range', '1'),
(2600, 517, '_feed_latest_event_date', 'years_after'),
(2601, 517, '_feed_latest_event_date_range', '2'),
(2602, 517, '_default_calendar_event_bubble_trigger', 'hover'),
(2603, 517, '_default_calendar_expand_multi_day_events', 'no'),
(2604, 517, '_google_calendar_id', 'eHRlYy5jYXRfZDhqcjBpMG4zbjlwYXRpaXEzNjFjNW9pY2NAZ3JvdXAuY2FsZW5kYXIuZ29vZ2xlLmNvbQ=='),
(2605, 517, '_google_events_max_results', '2500'),
(2606, 517, '_google_events_recurring', 'show'),
(2607, 517, '_calendar_date_format_setting', 'use_site'),
(2608, 517, '_calendar_time_format_setting', 'use_site'),
(2609, 517, '_calendar_datetime_separator', '@'),
(2610, 517, '_calendar_week_starts_on_setting', 'use_site'),
(2611, 517, '_feed_cache_user_unit', '60'),
(2612, 517, '_feed_cache_user_amount', '5'),
(2613, 517, '_feed_cache', '300'),
(2614, 517, '_calendar_version', '3.1.2'),
(2615, 516, '_calendar_view', 'a:1:{s:16:"default-calendar";s:4:"grid";}'),
(2616, 516, '_default_calendar_list_range_type', 'daily'),
(2617, 516, '_default_calendar_list_range_span', '7'),
(2618, 516, '_calendar_begins', 'today'),
(2619, 516, '_feed_earliest_event_date', 'months_before'),
(2620, 516, '_feed_earliest_event_date_range', '1'),
(2621, 516, '_feed_latest_event_date', 'years_after'),
(2622, 516, '_feed_latest_event_date_range', '2'),
(2623, 516, '_default_calendar_event_bubble_trigger', 'hover'),
(2624, 516, '_default_calendar_expand_multi_day_events', 'no'),
(2625, 516, '_google_calendar_id', 'eHRlYy5jYXRfZDhqcjBpMG4zbjlwYXRpaXEzNjFjNW9pY2NAZ3JvdXAuY2FsZW5kYXIuZ29vZ2xlLmNvbQ=='),
(2626, 516, '_google_events_max_results', '2500'),
(2627, 516, '_google_events_recurring', 'show'),
(2628, 516, '_calendar_date_format_setting', 'use_site'),
(2629, 516, '_calendar_time_format_setting', 'use_site'),
(2630, 516, '_calendar_datetime_separator', '@'),
(2631, 516, '_calendar_week_starts_on_setting', 'use_site'),
(2632, 516, '_feed_cache_user_unit', '60'),
(2633, 516, '_feed_cache_user_amount', '5'),
(2634, 516, '_feed_cache', '300'),
(2635, 516, '_calendar_version', '3.1.2'),
(2636, 515, '_calendar_view', 'a:1:{s:16:"default-calendar";s:4:"grid";}'),
(2637, 515, '_default_calendar_list_range_type', 'daily'),
(2638, 515, '_default_calendar_list_range_span', '7'),
(2639, 515, '_calendar_begins', 'today'),
(2640, 515, '_feed_earliest_event_date', 'months_before'),
(2641, 515, '_feed_earliest_event_date_range', '1'),
(2642, 515, '_feed_latest_event_date', 'years_after'),
(2643, 515, '_feed_latest_event_date_range', '2'),
(2644, 515, '_default_calendar_event_bubble_trigger', 'hover'),
(2645, 515, '_default_calendar_expand_multi_day_events', 'no'),
(2646, 515, '_google_calendar_id', 'eHRlYy5jYXRfZDhqcjBpMG4zbjlwYXRpaXEzNjFjNW9pY2NAZ3JvdXAuY2FsZW5kYXIuZ29vZ2xlLmNvbQ=='),
(2647, 515, '_google_events_max_results', '2500'),
(2648, 515, '_google_events_recurring', 'show'),
(2649, 515, '_calendar_date_format_setting', 'use_site'),
(2650, 515, '_calendar_time_format_setting', 'use_site'),
(2651, 515, '_calendar_datetime_separator', '@'),
(2652, 515, '_calendar_week_starts_on_setting', 'use_site'),
(2653, 515, '_feed_cache_user_unit', '60'),
(2654, 515, '_feed_cache_user_amount', '5'),
(2655, 515, '_feed_cache', '300'),
(2656, 515, '_calendar_version', '3.1.2'),
(2657, 514, '_calendar_view', 'a:1:{s:16:"default-calendar";s:4:"grid";}'),
(2658, 514, '_default_calendar_list_range_type', 'daily'),
(2659, 514, '_default_calendar_list_range_span', '7'),
(2660, 514, '_calendar_begins', 'today'),
(2661, 514, '_feed_earliest_event_date', 'months_before'),
(2662, 514, '_feed_earliest_event_date_range', '1'),
(2663, 514, '_feed_latest_event_date', 'years_after'),
(2664, 514, '_feed_latest_event_date_range', '2'),
(2665, 514, '_default_calendar_event_bubble_trigger', 'hover'),
(2666, 514, '_default_calendar_expand_multi_day_events', 'no'),
(2667, 514, '_google_calendar_id', 'eHRlYy5jYXRfZDhqcjBpMG4zbjlwYXRpaXEzNjFjNW9pY2NAZ3JvdXAuY2FsZW5kYXIuZ29vZ2xlLmNvbQ=='),
(2668, 514, '_google_events_max_results', '2500'),
(2669, 514, '_google_events_recurring', 'show'),
(2670, 514, '_calendar_date_format_setting', 'use_site'),
(2671, 514, '_calendar_time_format_setting', 'use_site'),
(2672, 514, '_calendar_datetime_separator', '@'),
(2673, 514, '_calendar_week_starts_on_setting', 'use_site'),
(2674, 514, '_feed_cache_user_unit', '60'),
(2675, 514, '_feed_cache_user_amount', '5'),
(2676, 514, '_feed_cache', '300'),
(2677, 514, '_calendar_version', '3.1.2'),
(2678, 248, '_calendar_view', 'a:1:{s:16:"default-calendar";s:4:"list";}'),
(2679, 248, '_default_calendar_list_range_type', 'daily'),
(2680, 248, '_default_calendar_list_range_span', '7'),
(2681, 248, '_calendar_begins', 'today'),
(2682, 248, '_feed_earliest_event_date', 'months_before'),
(2683, 248, '_feed_earliest_event_date_range', '1'),
(2684, 248, '_feed_latest_event_date', 'years_after'),
(2685, 248, '_feed_latest_event_date_range', '1'),
(2686, 248, '_default_calendar_event_bubble_trigger', 'hover'),
(2687, 248, '_default_calendar_expand_multi_day_events', 'no'),
(2688, 248, '_google_calendar_id', 'eHRlYy5jYXRfZDhqcjBpMG4zbjlwYXRpaXEzNjFjNW9pY2NAZ3JvdXAuY2FsZW5kYXIuZ29vZ2xlLmNvbQ=='),
(2689, 248, '_google_events_max_results', '2500'),
(2690, 248, '_google_events_recurring', 'show'),
(2691, 248, '_calendar_date_format_setting', 'use_site'),
(2692, 248, '_calendar_time_format_setting', 'use_site'),
(2693, 248, '_calendar_datetime_separator', '@'),
(2694, 248, '_calendar_week_starts_on_setting', 'use_site'),
(2695, 248, '_feed_cache_user_unit', '3600'),
(2696, 248, '_feed_cache_user_amount', '1'),
(2697, 248, '_feed_cache', '3600'),
(2698, 248, '_calendar_version', '3.1.2'),
(2699, 224, '_calendar_view', 'a:1:{s:16:"default-calendar";s:4:"grid";}'),
(2700, 224, '_default_calendar_list_range_type', 'daily'),
(2701, 224, '_default_calendar_list_range_span', '7'),
(2702, 224, '_calendar_begins', 'today'),
(2703, 224, '_feed_earliest_event_date', 'months_before'),
(2704, 224, '_feed_earliest_event_date_range', '1'),
(2705, 224, '_feed_latest_event_date', 'years_after'),
(2706, 224, '_feed_latest_event_date_range', '1'),
(2707, 224, '_default_calendar_event_bubble_trigger', 'hover'),
(2708, 224, '_default_calendar_expand_multi_day_events', 'yes'),
(2709, 224, '_google_calendar_id', 'eHRlYy5jYXRfZDhqcjBpMG4zbjlwYXRpaXEzNjFjNW9pY2NAZ3JvdXAuY2FsZW5kYXIuZ29vZ2xlLmNvbQ=='),
(2710, 224, '_google_events_max_results', '2500'),
(2711, 224, '_google_events_recurring', 'show'),
(2712, 224, '_calendar_date_format_setting', 'use_site'),
(2713, 224, '_calendar_time_format_setting', 'use_site'),
(2714, 224, '_calendar_datetime_separator', '@'),
(2715, 224, '_calendar_week_starts_on_setting', 'use_site'),
(2716, 224, '_feed_cache_user_unit', '60'),
(2717, 224, '_feed_cache_user_amount', '5'),
(2718, 224, '_feed_cache', '300'),
(2719, 224, '_calendar_version', '3.1.2'),
(2720, 517, '_calendar_begins_nth', '1'),
(2721, 517, '_calendar_begins_custom_date', ''),
(2722, 517, '_calendar_is_static', 'no'),
(2723, 517, '_no_events_message', ''),
(2724, 517, '_event_formatting', 'preserve_linebreaks'),
(2725, 517, '_poweredby', 'no'),
(2726, 517, '_feed_timezone_setting', 'use_site'),
(2727, 517, '_feed_timezone', 'Europe/Madrid'),
(2728, 517, '_calendar_date_format', 'l, d F Y'),
(2729, 517, '_calendar_date_format_php', 'd/m/Y'),
(2730, 517, '_calendar_time_format', 'G:i a'),
(2731, 517, '_calendar_time_format_php', 'G:i'),
(2732, 517, '_calendar_week_starts_on', '0'),
(2733, 517, '_google_events_search_query', ''),
(2734, 517, '_grouped_calendars_source', 'ids'),
(2735, 517, '_grouped_calendars_ids', ''),
(2736, 517, '_grouped_calendars_category', ''),
(2737, 517, '_default_calendar_style_theme', 'light'),
(2738, 517, '_default_calendar_style_today', '#1e73be'),
(2739, 517, '_default_calendar_style_days_events', '#000000'),
(2740, 517, '_default_calendar_list_header', 'no'),
(2741, 517, '_default_calendar_compact_list', 'no'),
(2742, 517, '_default_calendar_limit_visible_events', 'no'),
(2743, 517, '_default_calendar_visible_events', '3'),
(2744, 517, '_default_calendar_trim_titles', 'no'),
(2745, 517, '_default_calendar_trim_titles_chars', '20'),
(2746, 516, '_calendar_begins_nth', '1'),
(2747, 516, '_calendar_begins_custom_date', ''),
(2748, 516, '_calendar_is_static', 'no'),
(2749, 516, '_no_events_message', ''),
(2750, 516, '_event_formatting', 'preserve_linebreaks'),
(2751, 516, '_poweredby', 'no'),
(2752, 516, '_feed_timezone_setting', 'use_site'),
(2753, 516, '_feed_timezone', 'Europe/Madrid'),
(2754, 516, '_calendar_date_format', 'l, d F Y'),
(2755, 516, '_calendar_date_format_php', 'd/m/Y'),
(2756, 516, '_calendar_time_format', 'G:i a'),
(2757, 516, '_calendar_time_format_php', 'G:i'),
(2758, 516, '_calendar_week_starts_on', '0'),
(2759, 516, '_google_events_search_query', ''),
(2760, 516, '_grouped_calendars_source', 'ids'),
(2761, 516, '_grouped_calendars_ids', ''),
(2762, 516, '_grouped_calendars_category', ''),
(2763, 516, '_default_calendar_style_theme', 'light'),
(2764, 516, '_default_calendar_style_today', '#1e73be'),
(2765, 516, '_default_calendar_style_days_events', '#000000'),
(2766, 516, '_default_calendar_list_header', 'no'),
(2767, 516, '_default_calendar_compact_list', 'no'),
(2768, 516, '_default_calendar_limit_visible_events', 'no'),
(2769, 516, '_default_calendar_visible_events', '3'),
(2770, 516, '_default_calendar_trim_titles', 'no'),
(2771, 516, '_default_calendar_trim_titles_chars', '20'),
(2772, 515, '_calendar_begins_nth', '1'),
(2773, 515, '_calendar_begins_custom_date', ''),
(2774, 515, '_calendar_is_static', 'no'),
(2775, 515, '_no_events_message', ''),
(2776, 515, '_event_formatting', 'preserve_linebreaks'),
(2777, 515, '_poweredby', 'no'),
(2778, 515, '_feed_timezone_setting', 'use_site'),
(2779, 515, '_feed_timezone', 'Europe/Madrid'),
(2780, 515, '_calendar_date_format', 'l, d F Y'),
(2781, 515, '_calendar_date_format_php', 'd/m/Y'),
(2782, 515, '_calendar_time_format', 'G:i a'),
(2783, 515, '_calendar_time_format_php', 'G:i'),
(2784, 515, '_calendar_week_starts_on', '0'),
(2785, 515, '_google_events_search_query', ''),
(2786, 515, '_grouped_calendars_source', 'ids'),
(2787, 515, '_grouped_calendars_ids', ''),
(2788, 515, '_grouped_calendars_category', ''),
(2789, 515, '_default_calendar_style_theme', 'light'),
(2790, 515, '_default_calendar_style_today', '#1e73be'),
(2791, 515, '_default_calendar_style_days_events', '#000000'),
(2792, 515, '_default_calendar_list_header', 'no'),
(2793, 515, '_default_calendar_compact_list', 'no'),
(2794, 515, '_default_calendar_limit_visible_events', 'no'),
(2795, 515, '_default_calendar_visible_events', '3'),
(2796, 515, '_default_calendar_trim_titles', 'no'),
(2797, 515, '_default_calendar_trim_titles_chars', '20'),
(2798, 514, '_calendar_begins_nth', '1'),
(2799, 514, '_calendar_begins_custom_date', ''),
(2800, 514, '_calendar_is_static', 'no'),
(2801, 514, '_no_events_message', ''),
(2802, 514, '_event_formatting', 'preserve_linebreaks'),
(2803, 514, '_poweredby', 'no'),
(2804, 514, '_feed_timezone_setting', 'use_site'),
(2805, 514, '_feed_timezone', 'Europe/Madrid'),
(2806, 514, '_calendar_date_format', 'l, d F Y'),
(2807, 514, '_calendar_date_format_php', 'd/m/Y'),
(2808, 514, '_calendar_time_format', 'G:i a'),
(2809, 514, '_calendar_time_format_php', 'G:i'),
(2810, 514, '_calendar_week_starts_on', '0'),
(2811, 514, '_google_events_search_query', ''),
(2812, 514, '_grouped_calendars_source', 'ids'),
(2813, 514, '_grouped_calendars_ids', ''),
(2814, 514, '_grouped_calendars_category', ''),
(2815, 514, '_default_calendar_style_theme', 'light'),
(2816, 514, '_default_calendar_style_today', '#1e73be'),
(2817, 514, '_default_calendar_style_days_events', '#000000'),
(2818, 514, '_default_calendar_list_header', 'no'),
(2819, 514, '_default_calendar_compact_list', 'no'),
(2820, 514, '_default_calendar_limit_visible_events', 'no'),
(2821, 514, '_default_calendar_visible_events', '3'),
(2822, 514, '_default_calendar_trim_titles', 'no'),
(2823, 514, '_default_calendar_trim_titles_chars', '20'),
(2824, 248, '_calendar_begins_nth', '1'),
(2825, 248, '_calendar_begins_custom_date', ''),
(2826, 248, '_calendar_is_static', 'no'),
(2827, 248, '_no_events_message', ''),
(2828, 248, '_event_formatting', 'preserve_linebreaks'),
(2829, 248, '_poweredby', 'no'),
(2830, 248, '_feed_timezone_setting', 'use_site'),
(2831, 248, '_feed_timezone', 'Europe/Madrid'),
(2832, 248, '_calendar_date_format', 'l, d F Y'),
(2833, 248, '_calendar_date_format_php', 'd/m/Y'),
(2834, 248, '_calendar_time_format', 'G:i a'),
(2835, 248, '_calendar_time_format_php', 'G:i'),
(2836, 248, '_calendar_week_starts_on', '0'),
(2837, 248, '_google_events_search_query', ''),
(2838, 248, '_grouped_calendars_source', 'ids'),
(2839, 248, '_grouped_calendars_ids', ''),
(2840, 248, '_grouped_calendars_category', ''),
(2841, 248, '_default_calendar_style_theme', 'light'),
(2842, 248, '_default_calendar_style_today', '#1e73be'),
(2843, 248, '_default_calendar_style_days_events', '#000000'),
(2844, 248, '_default_calendar_list_header', 'no'),
(2845, 248, '_default_calendar_compact_list', 'no'),
(2846, 248, '_default_calendar_limit_visible_events', 'no'),
(2847, 248, '_default_calendar_visible_events', '3'),
(2848, 248, '_default_calendar_trim_titles', 'no'),
(2849, 248, '_default_calendar_trim_titles_chars', '20'),
(2850, 224, '_calendar_begins_nth', '1'),
(2851, 224, '_calendar_begins_custom_date', ''),
(2852, 224, '_calendar_is_static', 'no'),
(2853, 224, '_no_events_message', ''),
(2854, 224, '_event_formatting', 'preserve_linebreaks'),
(2855, 224, '_poweredby', 'no'),
(2856, 224, '_feed_timezone_setting', 'use_site'),
(2857, 224, '_feed_timezone', 'Europe/Madrid'),
(2858, 224, '_calendar_date_format', 'l, d F Y'),
(2859, 224, '_calendar_date_format_php', 'd/m/Y'),
(2860, 224, '_calendar_time_format', 'G:i a'),
(2861, 224, '_calendar_time_format_php', 'G:i'),
(2862, 224, '_calendar_week_starts_on', '0'),
(2863, 224, '_google_events_search_query', ''),
(2864, 224, '_grouped_calendars_source', 'ids'),
(2865, 224, '_grouped_calendars_ids', ''),
(2866, 224, '_grouped_calendars_category', ''),
(2867, 224, '_default_calendar_style_theme', 'light'),
(2868, 224, '_default_calendar_style_today', '#1e73be'),
(2869, 224, '_default_calendar_style_days_events', '#000000'),
(2870, 224, '_default_calendar_list_header', 'no'),
(2871, 224, '_default_calendar_compact_list', 'no'),
(2872, 224, '_default_calendar_limit_visible_events', 'no'),
(2873, 224, '_default_calendar_visible_events', '3'),
(2874, 224, '_default_calendar_trim_titles', 'no'),
(2875, 224, '_default_calendar_trim_titles_chars', '20'),
(2876, 593, '_edit_lock', '1474025526:2'),
(2877, 593, '_edit_last', '2'),
(2878, 593, 'gce_paging_widget', '1'),
(2879, 593, 'gce_widget_paging_interval', '604800'),
(2880, 593, '_calendar_view', 'a:1:{s:16:"default-calendar";s:4:"list";}'),
(2881, 593, '_default_calendar_list_range_type', 'daily'),
(2882, 593, '_default_calendar_list_range_span', '7'),
(2883, 593, '_calendar_begins', 'today'),
(2884, 593, '_feed_earliest_event_date', 'months_before');
INSERT INTO `wp_postmeta` (`meta_id`, `post_id`, `meta_key`, `meta_value`) VALUES
(2885, 593, '_feed_earliest_event_date_range', '1'),
(2886, 593, '_feed_latest_event_date', 'years_after'),
(2887, 593, '_feed_latest_event_date_range', '2'),
(2888, 593, '_default_calendar_event_bubble_trigger', 'hover'),
(2889, 593, '_default_calendar_expand_multi_day_events', 'no'),
(2890, 593, '_google_calendar_id', 'eHRlYy5jYXRfZDhqcjBpMG4zbjlwYXRpaXEzNjFjNW9pY2NAZ3JvdXAuY2FsZW5kYXIuZ29vZ2xlLmNvbQ=='),
(2891, 593, '_google_events_max_results', '2500'),
(2892, 593, '_google_events_recurring', 'show'),
(2893, 593, '_calendar_date_format_setting', 'use_site'),
(2894, 593, '_calendar_time_format_setting', 'use_site'),
(2895, 593, '_calendar_datetime_separator', '@'),
(2896, 593, '_calendar_week_starts_on_setting', 'use_site'),
(2897, 593, '_feed_cache_user_unit', '60'),
(2898, 593, '_feed_cache_user_amount', '5'),
(2899, 593, '_feed_cache', '300'),
(2900, 593, '_calendar_version', '3.1.2'),
(2901, 593, '_calendar_begins_nth', '1'),
(2902, 593, '_calendar_begins_custom_date', ''),
(2903, 593, '_calendar_is_static', 'no'),
(2904, 593, '_no_events_message', ''),
(2905, 593, '_event_formatting', 'preserve_linebreaks'),
(2906, 593, '_poweredby', 'no'),
(2907, 593, '_feed_timezone_setting', 'use_site'),
(2908, 593, '_feed_timezone', 'Europe/Madrid'),
(2909, 593, '_calendar_date_format', 'l, d F Y'),
(2910, 593, '_calendar_date_format_php', 'd/m/Y'),
(2911, 593, '_calendar_time_format', 'G:i a'),
(2912, 593, '_calendar_time_format_php', 'G:i'),
(2913, 593, '_calendar_week_starts_on', '0'),
(2914, 593, '_google_events_search_query', ''),
(2915, 593, '_grouped_calendars_source', 'ids'),
(2916, 593, '_grouped_calendars_ids', ''),
(2917, 593, '_grouped_calendars_category', ''),
(2918, 593, '_default_calendar_style_theme', 'light'),
(2919, 593, '_default_calendar_style_today', '#1e73be'),
(2920, 593, '_default_calendar_style_days_events', '#000000'),
(2921, 593, '_default_calendar_list_header', 'no'),
(2922, 593, '_default_calendar_compact_list', 'no'),
(2923, 593, '_default_calendar_limit_visible_events', 'no'),
(2924, 593, '_default_calendar_visible_events', '3'),
(2925, 593, '_default_calendar_trim_titles', 'no'),
(2926, 593, '_default_calendar_trim_titles_chars', '20'),
(2927, 594, '_edit_lock', '1474025608:2'),
(2928, 594, '_edit_last', '2'),
(2929, 594, 'gce_paging_widget', '1'),
(2930, 594, 'gce_widget_paging_interval', '604800'),
(2931, 594, '_calendar_view', 'a:1:{s:16:"default-calendar";s:4:"list";}'),
(2932, 594, '_default_calendar_list_range_type', 'daily'),
(2933, 594, '_default_calendar_list_range_span', '7'),
(2934, 594, '_calendar_begins', 'today'),
(2935, 594, '_feed_earliest_event_date', 'months_before'),
(2936, 594, '_feed_earliest_event_date_range', '1'),
(2937, 594, '_feed_latest_event_date', 'years_after'),
(2938, 594, '_feed_latest_event_date_range', '2'),
(2939, 594, '_default_calendar_event_bubble_trigger', 'hover'),
(2940, 594, '_default_calendar_expand_multi_day_events', 'no'),
(2941, 594, '_google_calendar_id', 'eHRlYy5jYXRfZDhqcjBpMG4zbjlwYXRpaXEzNjFjNW9pY2NAZ3JvdXAuY2FsZW5kYXIuZ29vZ2xlLmNvbQ=='),
(2942, 594, '_google_events_max_results', '2500'),
(2943, 594, '_google_events_recurring', 'show'),
(2944, 594, '_calendar_date_format_setting', 'use_site'),
(2945, 594, '_calendar_time_format_setting', 'use_site'),
(2946, 594, '_calendar_datetime_separator', '@'),
(2947, 594, '_calendar_week_starts_on_setting', 'use_site'),
(2948, 594, '_feed_cache_user_unit', '60'),
(2949, 594, '_feed_cache_user_amount', '5'),
(2950, 594, '_feed_cache', '300'),
(2951, 594, '_calendar_version', '3.1.2'),
(2952, 594, '_calendar_begins_nth', '1'),
(2953, 594, '_calendar_begins_custom_date', ''),
(2954, 594, '_calendar_is_static', 'no'),
(2955, 594, '_no_events_message', ''),
(2956, 594, '_event_formatting', 'preserve_linebreaks'),
(2957, 594, '_poweredby', 'no'),
(2958, 594, '_feed_timezone_setting', 'use_site'),
(2959, 594, '_feed_timezone', 'Europe/Madrid'),
(2960, 594, '_calendar_date_format', 'l, d F Y'),
(2961, 594, '_calendar_date_format_php', 'd/m/Y'),
(2962, 594, '_calendar_time_format', 'G:i a'),
(2963, 594, '_calendar_time_format_php', 'G:i'),
(2964, 594, '_calendar_week_starts_on', '0'),
(2965, 594, '_google_events_search_query', ''),
(2966, 594, '_grouped_calendars_source', 'ids'),
(2967, 594, '_grouped_calendars_ids', ''),
(2968, 594, '_grouped_calendars_category', ''),
(2969, 594, '_default_calendar_style_theme', 'light'),
(2970, 594, '_default_calendar_style_today', '#1e73be'),
(2971, 594, '_default_calendar_style_days_events', '#000000'),
(2972, 594, '_default_calendar_list_header', 'no'),
(2973, 594, '_default_calendar_compact_list', 'no'),
(2974, 594, '_default_calendar_limit_visible_events', 'no'),
(2975, 594, '_default_calendar_visible_events', '3'),
(2976, 594, '_default_calendar_trim_titles', 'no'),
(2977, 594, '_default_calendar_trim_titles_chars', '20'),
(2978, 595, '_edit_lock', '1474026030:2'),
(2979, 595, '_edit_last', '2'),
(2980, 595, 'gce_paging_widget', '1'),
(2981, 595, 'gce_widget_paging_interval', '604800'),
(2982, 595, '_calendar_view', 'a:1:{s:16:"default-calendar";s:4:"list";}'),
(2983, 595, '_default_calendar_list_range_type', 'daily'),
(2984, 595, '_default_calendar_list_range_span', '7'),
(2985, 595, '_calendar_begins', 'today'),
(2986, 595, '_feed_earliest_event_date', 'months_before'),
(2987, 595, '_feed_earliest_event_date_range', '1'),
(2988, 595, '_feed_latest_event_date', 'years_after'),
(2989, 595, '_feed_latest_event_date_range', '2'),
(2990, 595, '_default_calendar_event_bubble_trigger', 'hover'),
(2991, 595, '_default_calendar_expand_multi_day_events', 'no'),
(2992, 595, '_google_calendar_id', 'eHRlYy5jYXRfZDhqcjBpMG4zbjlwYXRpaXEzNjFjNW9pY2NAZ3JvdXAuY2FsZW5kYXIuZ29vZ2xlLmNvbQ=='),
(2993, 595, '_google_events_max_results', '2500'),
(2994, 595, '_google_events_recurring', 'show'),
(2995, 595, '_calendar_date_format_setting', 'use_site'),
(2996, 595, '_calendar_time_format_setting', 'use_site'),
(2997, 595, '_calendar_datetime_separator', '@'),
(2998, 595, '_calendar_week_starts_on_setting', 'use_site'),
(2999, 595, '_feed_cache_user_unit', '60'),
(3000, 595, '_feed_cache_user_amount', '5'),
(3001, 595, '_feed_cache', '300'),
(3002, 595, '_calendar_version', '3.1.2'),
(3003, 595, '_calendar_begins_nth', '1'),
(3004, 595, '_calendar_begins_custom_date', ''),
(3005, 595, '_calendar_is_static', 'no'),
(3006, 595, '_no_events_message', ''),
(3007, 595, '_event_formatting', 'preserve_linebreaks'),
(3008, 595, '_poweredby', 'no'),
(3009, 595, '_feed_timezone_setting', 'use_site'),
(3010, 595, '_feed_timezone', 'Europe/Madrid'),
(3011, 595, '_calendar_date_format', 'l, d F Y'),
(3012, 595, '_calendar_date_format_php', 'd/m/Y'),
(3013, 595, '_calendar_time_format', 'G:i a'),
(3014, 595, '_calendar_time_format_php', 'G:i'),
(3015, 595, '_calendar_week_starts_on', '0'),
(3016, 595, '_google_events_search_query', ''),
(3017, 595, '_grouped_calendars_source', 'ids'),
(3018, 595, '_grouped_calendars_ids', ''),
(3019, 595, '_grouped_calendars_category', ''),
(3020, 595, '_default_calendar_style_theme', 'light'),
(3021, 595, '_default_calendar_style_today', '#1e73be'),
(3022, 595, '_default_calendar_style_days_events', '#000000'),
(3023, 595, '_default_calendar_list_header', 'no'),
(3024, 595, '_default_calendar_compact_list', 'no'),
(3025, 595, '_default_calendar_limit_visible_events', 'no'),
(3026, 595, '_default_calendar_visible_events', '3'),
(3027, 595, '_default_calendar_trim_titles', 'no'),
(3028, 595, '_default_calendar_trim_titles_chars', '20'),
(3029, 596, '_edit_lock', '1474543226:2'),
(3030, 596, '_edit_last', '2'),
(3031, 596, 'gce_paging_widget', '1'),
(3032, 596, 'gce_widget_paging_interval', '604800'),
(3033, 596, '_calendar_view', 'a:1:{s:16:"default-calendar";s:4:"list";}'),
(3034, 596, '_default_calendar_list_range_type', 'daily'),
(3035, 596, '_default_calendar_list_range_span', '7'),
(3036, 596, '_calendar_begins', 'today'),
(3037, 596, '_feed_earliest_event_date', 'months_before'),
(3038, 596, '_feed_earliest_event_date_range', '1'),
(3039, 596, '_feed_latest_event_date', 'years_after'),
(3040, 596, '_feed_latest_event_date_range', '2'),
(3041, 596, '_default_calendar_event_bubble_trigger', 'hover'),
(3042, 596, '_default_calendar_expand_multi_day_events', 'no'),
(3043, 596, '_google_calendar_id', 'eHRlYy5jYXRfZDhqcjBpMG4zbjlwYXRpaXEzNjFjNW9pY2NAZ3JvdXAuY2FsZW5kYXIuZ29vZ2xlLmNvbQ=='),
(3044, 596, '_google_events_max_results', '2500'),
(3045, 596, '_google_events_recurring', 'show'),
(3046, 596, '_calendar_date_format_setting', 'use_site'),
(3047, 596, '_calendar_time_format_setting', 'use_site'),
(3048, 596, '_calendar_datetime_separator', '@'),
(3049, 596, '_calendar_week_starts_on_setting', 'use_site'),
(3050, 596, '_feed_cache_user_unit', '60'),
(3051, 596, '_feed_cache_user_amount', '5'),
(3052, 596, '_feed_cache', '300'),
(3053, 596, '_calendar_version', '3.1.2'),
(3054, 596, '_calendar_begins_nth', '1'),
(3055, 596, '_calendar_begins_custom_date', ''),
(3056, 596, '_calendar_is_static', 'no'),
(3057, 596, '_no_events_message', ''),
(3058, 596, '_event_formatting', 'preserve_linebreaks'),
(3059, 596, '_poweredby', 'no'),
(3060, 596, '_feed_timezone_setting', 'use_site'),
(3061, 596, '_feed_timezone', 'Europe/Madrid'),
(3062, 596, '_calendar_date_format', 'l, d F Y'),
(3063, 596, '_calendar_date_format_php', 'd/m/Y'),
(3064, 596, '_calendar_time_format', 'G:i a'),
(3065, 596, '_calendar_time_format_php', 'G:i'),
(3066, 596, '_calendar_week_starts_on', '0'),
(3067, 596, '_google_events_search_query', ''),
(3068, 596, '_grouped_calendars_source', 'ids'),
(3069, 596, '_grouped_calendars_ids', ''),
(3070, 596, '_grouped_calendars_category', ''),
(3071, 596, '_default_calendar_style_theme', 'light'),
(3072, 596, '_default_calendar_style_today', '#1e73be'),
(3073, 596, '_default_calendar_style_days_events', '#000000'),
(3074, 596, '_default_calendar_list_header', 'no'),
(3075, 596, '_default_calendar_compact_list', 'no'),
(3076, 596, '_default_calendar_limit_visible_events', 'no'),
(3077, 596, '_default_calendar_visible_events', '3'),
(3078, 596, '_default_calendar_trim_titles', 'no'),
(3079, 596, '_default_calendar_trim_titles_chars', '20'),
(3080, 597, 'es_template_type', 'newsletter'),
(3081, 598, 'es_template_type', 'post_notification');

-- --------------------------------------------------------

--
-- Estructura de la taula `wp_posts`
--

CREATE TABLE IF NOT EXISTS `wp_posts` (
`ID` bigint(20) unsigned NOT NULL,
  `post_author` bigint(20) unsigned NOT NULL DEFAULT '0',
  `post_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_date_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_excerpt` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'publish',
  `comment_status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'open',
  `ping_status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'open',
  `post_password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `post_name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `to_ping` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `pinged` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_modified_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_content_filtered` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_parent` bigint(20) unsigned NOT NULL DEFAULT '0',
  `guid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `menu_order` int(11) NOT NULL DEFAULT '0',
  `post_type` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'post',
  `post_mime_type` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `comment_count` bigint(20) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=604 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Bolcant dades de la taula `wp_posts`
--

INSERT INTO `wp_posts` (`ID`, `post_author`, `post_date`, `post_date_gmt`, `post_content`, `post_title`, `post_excerpt`, `post_status`, `comment_status`, `ping_status`, `post_password`, `post_name`, `to_ping`, `pinged`, `post_modified`, `post_modified_gmt`, `post_content_filtered`, `post_parent`, `guid`, `menu_order`, `post_type`, `post_mime_type`, `comment_count`) VALUES
(5, 1, '2014-09-12 09:46:02', '2014-09-12 09:46:02', '', 'Activitat a tot el lloc web', '', 'publish', 'closed', 'closed', '', 'activitat', '', '', '2017-01-17 11:31:48', '2017-01-17 10:31:48', '', 0, 'https://pwc-int.educacio.intranet/agora/masterzer/?page_id=5', 0, 'page', '', 0),
(6, 1, '2014-09-12 09:46:02', '2014-09-12 09:46:02', '', 'Membres', '', 'publish', 'closed', 'closed', '', 'membres', '', '', '2014-09-22 14:13:29', '2014-09-22 14:13:29', '', 0, 'https://pwc-int.educacio.intranet/agora/masterzer/?page_id=6', 0, 'page', '', 0),
(7, 1, '2014-09-12 10:14:31', '2014-09-12 10:14:31', '', 'Inici', '', 'publish', 'closed', 'closed', '', 'inici', '', '', '2015-07-20 13:01:16', '2015-07-20 12:01:16', '', 0, 'https://pwc-int.educacio.intranet/agora/masterzer/?page_id=7', 0, 'page', '', 0),
(16, 1, '2014-09-12 12:40:45', '2014-09-12 12:40:45', '', 'Nodes', '', 'publish', 'closed', 'closed', '', 'nodes', '', '', '2014-09-22 14:13:29', '2014-09-22 14:13:29', '', 0, 'https://pwc-int.educacio.intranet/agora/masterzer/nodes/', 0, 'page', '', 0),
(19, 1, '2014-09-17 14:56:56', '2014-09-17 14:56:56', '<p style="color: #444444;">Aquesta secció pot contenir totes les pàgines necessàries per a oferir una descripció general de la ZER: ubicació, història, instal·lacions, equip docent, consell escolar, pla de qualitat, calendari, salut, informacions pràctiques, normativa…</p>\r\n<p style="color: #444444;">En la maqueta inicial s’inclouen algunes d’aquestes pàgines amb contingut simulat. L’administrador/a pot editar-les, eliminar-les o crear-ne de noves des del tauler. És important que a la caixa <em>Atributs de la pàgina</em> hi consti com a <em>pare/mare</em> la pàgina “<em>ZER</em>“, i que tinguin seleccionada la plantilla “<em>Menú lateral</em>“.</p>', 'ZER', '', 'publish', 'closed', 'closed', '', 'zer', '', '', '2015-07-27 11:47:44', '2015-07-27 10:47:44', '', 0, 'https://pwc-int.educacio.intranet/agora/masterzer/?page_id=19', 0, 'page', '', 0),
(21, 1, '2014-09-17 16:14:14', '2014-09-17 16:14:14', '<p style="color: #666666;"><strong>ZER l''Arany</strong>\r\nPlaça de la Vila, 14\r\n01234 Abella de Xerta\r\n<a href="mailto:bustia@zer-larany.cat">bustia@zer-larany.cat</a></p>\r\n<iframe style="border: 0;" src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d95122.2542300733!2d1.53775!3d41.837547!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sca!2sus!4v1410948001907" width="600" height="450" frameborder="0"></iframe>\r\n\r\n<strong>Com arribar-hi:\r\n</strong>\r\n<ul>\r\n	<li>En tren: Estació Abella centre de la línia 1</li>\r\n	<li>En bus: Línies L3 i L5</li>\r\n</ul>\r\n<strong>Escoles adscrites a la ZER\r\n</strong>\r\n<ul>\r\n	<li>Escola Alfa</li>\r\n	<li>Escola Beta</li>\r\n	<li>Escola Gamma</li>\r\n	<li>Escola Epsilon</li>\r\n</ul>\r\n&nbsp;', 'On som', '', 'publish', 'closed', 'closed', '', 'on-som', '', '', '2015-07-27 11:49:51', '2015-07-27 10:49:51', '', 19, 'https://pwc-int.educacio.intranet/agora/masterzer/?page_id=21', 10, 'page', '', 0),
(25, 1, '2014-09-17 16:17:37', '2014-09-17 16:17:37', ' ', '', '', 'publish', 'open', 'open', '', 'linstitut', '', '', '2015-07-31 16:19:51', '2015-07-31 15:19:51', '', 0, 'https://pwc-int.educacio.intranet/agora/masterzer/?p=25', 1, 'nav_menu_item', '', 0),
(26, 1, '2014-09-17 16:17:37', '2014-09-17 16:17:37', ' ', '', '', 'publish', 'open', 'open', '', '26', '', '', '2015-07-31 16:19:51', '2015-07-31 15:19:51', '', 19, 'https://pwc-int.educacio.intranet/agora/masterzer/?p=26', 3, 'nav_menu_item', '', 0),
(31, 1, '2014-09-17 16:26:18', '2014-09-17 16:26:18', '', 'Instal·lacions', '', 'publish', 'closed', 'closed', '', 'instal%c2%b7lacions', '', '', '2014-09-17 16:34:13', '2014-09-17 16:34:13', '', 0, 'https://pwc-int.educacio.intranet/agora/masterzer/?post_type=slideshow&#038;p=31', 0, 'slideshow', '', 0),
(32, 1, '2014-09-17 16:29:37', '2014-09-17 16:29:37', '', 'exemple1', '', 'inherit', 'open', 'open', '', 'exemple1', '', '', '2014-09-17 16:29:37', '2014-09-17 16:29:37', '', 0, 'https://pwc-int.educacio.intranet/agora/masterzer/wp-content/uploads/usu10/2014/09/exemple1.png', 0, 'attachment', 'image/png', 0),
(33, 1, '2014-09-17 16:29:38', '2014-09-17 16:29:38', '', 'exemple1b', '', 'inherit', 'open', 'open', '', 'exemple1b', '', '', '2014-09-17 16:29:38', '2014-09-17 16:29:38', '', 19, 'https://pwc-int.educacio.intranet/agora/masterzer/wp-content/uploads/usu10/2014/09/exemple1b.png', 0, 'attachment', 'image/png', 0),
(34, 1, '2014-09-17 16:29:39', '2014-09-17 16:29:39', '', 'exemple2b', '', 'inherit', 'open', 'open', '', 'exemple2b', '', '', '2014-09-17 16:29:39', '2014-09-17 16:29:39', '', 0, 'https://pwc-int.educacio.intranet/agora/masterzer/wp-content/uploads/usu10/2014/09/exemple2b.png', 0, 'attachment', 'image/png', 0),
(35, 1, '2014-09-17 16:29:40', '2014-09-17 16:29:40', '', 'exemple3', '', 'inherit', 'open', 'open', '', 'exemple3', '', '', '2014-09-17 16:29:40', '2014-09-17 16:29:40', '', 0, 'https://pwc-int.educacio.intranet/agora/masterzer/wp-content/uploads/usu10/2014/09/exemple3.png', 0, 'attachment', 'image/png', 0),
(36, 1, '2014-09-17 16:29:41', '2014-09-17 16:29:41', '', 'exemple3b', '', 'inherit', 'open', 'open', '', 'exemple3b', '', '', '2014-09-17 16:29:41', '2014-09-17 16:29:41', '', 0, 'https://pwc-int.educacio.intranet/agora/masterzer/wp-content/uploads/usu10/2014/09/exemple3b.png', 0, 'attachment', 'image/png', 0),
(37, 1, '2014-09-17 16:31:11', '2014-09-17 16:31:11', '', 'exemple2', '', 'inherit', 'open', 'open', '', 'exemple2', '', '', '2014-09-17 16:31:11', '2014-09-17 16:31:11', '', 0, 'https://pwc-int.educacio.intranet/agora/masterzer/wp-content/uploads/usu10/2014/09/exemple2.png', 0, 'attachment', 'image/png', 0),
(43, 1, '2014-09-17 16:45:07', '2014-09-17 16:45:07', 'El consell escolar del centre és l’òrgan col·legiat de participació de la comunitat escolar en el govern del centre. Corresponen al consell escolar les funcions establertes a la Llei 12/2009, de 10 de juliol, d’educació.\r\n<h4>Composició del consell escolar</h4>\r\n<ul>\r\n	<li>President: &lt;Nom&gt;</li>\r\n	<li>Cap d’Estudis: &lt;Nom&gt;</li>\r\n	<li>Secretari: &lt;Nom&gt;</li>\r\n	<li>Mestres del Claustre: &lt;Noms&gt;</li>\r\n	<li>Representants dels Pares/Mares: &lt;Noms&gt;</li>\r\n	<li>Representant de l’AMPA: &lt;Nom&gt;</li>\r\n	<li>Representant del personal no docent (PAS): &lt;Nom&gt;</li>\r\n	<li>Representant de l’Ajuntament: &lt;Nom&gt;</li>\r\n</ul>\r\n<h4>Funcions del consell escolar dels centres públics</h4>\r\n<ol>\r\n	<li>Aprovar el projecte educatiu i les modificacions corresponents per una majoria de tres cinquenes parts dels membres.</li>\r\n	<li>Aprovar la programació general anual del centre i avaluar-ne el desenvolupament i els resultats.</li>\r\n	<li>Aprovar les propostes d’acords de co-responsabilitat, convenis i altres acords de col·col·laboració del centre amb entitats o institucions.</li>\r\n	<li>Aprovar les normes d’organització i funcionament i les modificacions corresponents.</li>\r\n	<li>Aprovar la carta de compromís educatiu.</li>\r\n	<li>Aprovar el pressupost del centre i el rendiment de comptes.</li>\r\n	<li>Intervenir en el procediment d’admissió d’alumnes.</li>\r\n	<li>Participar en el procediment de selecció i en la proposta de cessament del director o directora.</li>\r\n	<li>Intervenir en la resolució dels conflictes i, si escau, revisar les sancions als alumnes.</li>\r\n	<li>Aprovar les directrius per a la programació d’activitats escolars complementàries i d’activitats extraescolars, i avaluar-ne el desenvolupament.</li>\r\n	<li>Participar en les anàlisis i les avaluacions del funcionament general del centre i conèixer l’evolució del rendiment escolar.</li>\r\n	<li>Aprovar els criteris de col·laboració amb altres centres i amb l’entorn.</li>\r\n	<li>Qualsevol altra que li sigui atribuïda per les normes legals o reglamentàries.</li>\r\n</ol>', 'Consell escolar', '', 'publish', 'closed', 'closed', '', 'consell-escolar', '', '', '2015-07-27 12:49:37', '2015-07-27 11:49:37', '', 19, 'https://pwc-int.educacio.intranet/agora/masterzer/?page_id=43', 60, 'page', '', 0),
(45, 1, '2014-09-17 16:45:56', '2014-09-17 16:45:56', ' ', '', '', 'publish', 'open', 'open', '', '45', '', '', '2015-07-31 16:19:51', '2015-07-31 15:19:51', '', 19, 'https://pwc-int.educacio.intranet/agora/masterzer/?p=45', 11, 'nav_menu_item', '', 0),
(52, 1, '2014-09-17 16:58:07', '2014-09-17 16:58:07', 'Calendari de trobades, activitats, tallers, etc. comú a totes les escoles. També podeu incloure les festivitats (per preveure quan la ZER romandrà tancada).\r\n\r\n[calendar id="224"]\r\n<h5>Agenda en format llista</h5>\r\n[calendar id="248"]', 'Agenda', '', 'publish', 'closed', 'closed', '', 'agenda', '', '', '2016-09-21 10:50:14', '2016-09-21 08:50:14', '', 19, 'https://pwc-int.educacio.intranet/agora/masterzer/?page_id=52', 50, 'page', '', 0),
(54, 1, '2014-09-17 16:58:24', '2014-09-17 16:58:24', ' ', '', '', 'publish', 'open', 'open', '', '54', '', '', '2015-07-31 16:19:51', '2015-07-31 15:19:51', '', 19, 'https://pwc-int.educacio.intranet/agora/masterzer/?p=54', 10, 'nav_menu_item', '', 0),
(57, 1, '2014-09-17 17:01:07', '2014-09-17 17:01:07', 'En aquesta secció cada centre pot crear les pàgines necessàries per a descriure el seu projecte educatiu. D''acord amb la <a title="Article 91 LEC" href="http://www20.gencat.cat/portal/site/portaljuridic/menuitem.d15a4e5dfb99396dc366ec10b0c0e1a0/?vgnextoid=b85297b5a87d6210VgnVCM1000000b0c1e0aRCRD&amp;vgnextchannel=b85297b5a87d6210VgnVCM1000000b0c1e0aRCRD&amp;vgnextfmt=default&amp;action=fitxa&amp;portalId=1&amp;documentId=480169&amp;newLang=ca_ES#fragment-1182442" target="_blank">Llei d''Educació de Catalunya</a>, el projecte educatiu incorpora el caràcter propi del centre i ha de contenir com a mínim els elements següents:\r\n<ul>\r\n	<li>Criteris d''ordenació pedagògica, prioritats i plantejaments educatius, procediments d''inclusió i altres actuacions que caracteritzen el centre.</li>\r\n	<li>Indicadors de progrés.</li>\r\n	<li>Concreció i desenvolupament dels currículums.</li>\r\n	<li>Criteris que defineixen l''estructura organitzativa.</li>\r\n	<li>Projecte lingüístic.</li>\r\n	<li>Caràcter propi del centre, si n''hi ha.</li>\r\n</ul>\r\nEs pot incloure també en aquesta secció informació sobre les unitats i serveis especialitzats del centre (USEE, Aula d''Acollida, Aula Oberta, PIM...) així com altres documents que també formen part del projecte educatiu com ara: Projecte de Convivència, Pla d''Acció Tutorial, Pla TAC, Plans d''Acollida, Projecte d''Escola i Família, Comunitats d''Aprenentatge, etc.\r\n\r\nTambé pot ser interessant fer referència a altres projectes i activitats que es duen a terme a l''escola, com ara: Escola verda, Educació per a la salut, Mobilitza''t amb la Informàtica, Pla de reutilització de llibres de text, Programes Erasmus+, Aprenentatge servei, Aprenentatge integrat de Continguts i Llengües Estrangeres (AICLE), Revista de l''institut, Agenda 21...\r\n\r\nDonada la diversitat de seccions possibles, s''ha cregut oportú no crear cap pàgina específica en la maqueta inicial, deixant a criteri del centre la decisió sobre la millor manera d''estructurar la descripció del seu projecte educatiu. En crear els apartats és important que la caixa <em>Atributs de la pàgina</em> tingui com a pare/mare “<em>Projecte educatiu</em>“, i que se seleccioni com a plantilla l''opció “<em>Menú lateral</em>“.', 'Projecte educatiu', '', 'publish', 'closed', 'closed', '', 'projecte-educatiu', '', '', '2015-07-24 15:22:52', '2015-07-24 14:22:52', '', 19, 'https://pwc-int.educacio.intranet/agora/masterzer/?page_id=57', 30, 'page', '', 0),
(59, 1, '2014-09-17 17:01:47', '2014-09-17 17:01:47', ' ', '', '', 'publish', 'open', 'open', '', '59', '', '', '2015-07-31 16:19:51', '2015-07-31 15:19:51', '', 19, 'https://pwc-int.educacio.intranet/agora/masterzer/?p=59', 4, 'nav_menu_item', '', 0),
(63, 1, '2014-09-18 10:06:31', '2014-09-18 10:06:31', '<p style="color: #444444;">Secció amb els serveis comuns que ofereix la ZER a les escoles que en formen part.</p>', 'Serveis', '', 'publish', 'closed', 'closed', '', 'serveis', '', '', '2015-07-27 11:56:01', '2015-07-27 10:56:01', '', 19, 'https://pwc-int.educacio.intranet/agora/masterzer/?page_id=63', 80, 'page', '', 0),
(88, 1, '2014-09-18 10:45:31', '2014-09-18 10:45:31', '', 'logo-centre', '', 'inherit', 'open', 'open', '', 'logo-centre-2', '', '', '2014-09-18 10:45:31', '2014-09-18 10:45:31', '', 0, 'https://pwc-int.educacio.intranet/agora/masterzer/wp-content/uploads/usu10/2014/09/logo-centre1.png', 0, 'attachment', 'image/png', 0),
(107, 1, '2014-09-18 16:34:30', '2014-09-18 16:34:30', '', 'Capçalera', '', 'publish', 'closed', 'closed', '', 'capcalera-2', '', '', '2015-07-24 16:31:58', '2015-07-24 15:31:58', '', 0, 'https://pwc-int.educacio.intranet/agora/masterzer/?post_type=slideshow&#038;p=107', 0, 'slideshow', '', 0),
(109, 1, '2014-09-18 16:42:56', '2014-09-18 16:42:56', 'https://soundcloud.com/institut-sabadell/sophie-message\r\n\r\nUn exemple de fitxer d''àudio disponible directament des de la targeta resum. Dins de l''article, a la caixa "Paràmetres", heu de marcar la casella "Mostra el contingut sencer".', 'Notícia 1', '', 'publish', 'open', 'open', '', 'noticia-1', '', '', '2015-07-27 13:10:21', '2015-07-27 12:10:21', '', 0, 'https://pwc-int.educacio.intranet/agora/masterzer/?p=109', 0, 'post', '', 0),
(112, 1, '2014-09-18 17:16:55', '2014-09-18 17:16:55', 'Node de professorat', 'Professorat', '', 'private', 'closed', 'open', '', 'professorat', '', '', '2014-09-18 17:16:55', '2014-09-18 17:16:55', '', 0, 'https://pwc-int.educacio.intranet/agora/masterzer/forums/forum/professorat', 0, 'forum', '', 0),
(113, 1, '2014-09-18 17:21:02', '2014-09-18 17:21:02', 'Node del Departament de Ciències Naturals', 'Dep. Ciències', '', 'private', 'closed', 'open', '', 'dep-ciencies', '', '', '2014-09-18 17:21:02', '2014-09-18 17:21:02', '', 0, 'https://pwc-int.educacio.intranet/agora/masterzer/forums/forum/dep-ciencies', 0, 'forum', '', 0),
(114, 1, '2014-09-18 17:37:19', '2014-09-18 17:37:19', '', 'aulasec', '', 'inherit', 'open', 'open', '', 'aulasec', '', '', '2014-09-18 17:37:19', '2014-09-18 17:37:19', '', 0, 'https://pwc-int.educacio.intranet/agora/masterzer/wp-content/uploads/usu10/2014/09/aulasec.png', 0, 'attachment', 'image/png', 0),
(115, 1, '2014-09-18 17:40:29', '2014-09-18 17:40:29', 'Node del departament de ciències socials (professorat)', 'Dep. Socials', '', 'private', 'closed', 'open', '', 'dep-socials', '', '', '2014-09-18 17:40:29', '2014-09-18 17:40:29', '', 0, 'https://pwc-int.educacio.intranet/agora/masterzer/forums/forum/dep-socials', 0, 'forum', '', 0),
(120, 1, '2014-09-19 09:24:00', '2014-09-19 09:24:00', '<iframe src="//www.youtube.com/embed/ygwGTiGFGi0?rel=0" width="560" height="315" frameborder="0" allowfullscreen="allowfullscreen"></iframe>\r\n\r\nUn exemple de vídeo disponible directament des de la targeta resum. Dins de l’article, a la caixa “Paràmetres”, heu de marcar la casella “Mostra el contingut sencer”.', 'Notícia 2', '', 'publish', 'open', 'open', '', 'noticia-2', '', '', '2015-07-27 11:21:08', '2015-07-27 10:21:08', '', 0, 'https://pwc-int.educacio.intranet/agora/masterzer/?p=120', 0, 'post', '', 0),
(127, 1, '2014-09-19 10:31:19', '2014-09-19 10:31:19', '[slideshow_deploy id=''148'']\r\n\r\nExemple de Carrusel disponible directament a la targeta resum. Els carrusels permeten incloure imatges, vídeos i textos. Marqueu "Mostra el contingut sencer" a la caixa de "Paràmetres" perquè es mostri directament.', 'Notícia 3', '', 'publish', 'open', 'open', '', 'noticia-3', '', '', '2015-07-27 11:20:01', '2015-07-27 10:20:01', '', 0, 'https://pwc-int.educacio.intranet/agora/masterzer/?p=127', 0, 'post', '', 0),
(129, 1, '2014-09-19 10:37:29', '2014-09-19 10:37:29', '<span style="color: #444444;">Nam semper id ipsum condimentum laoreet. Proin sollicitudin elit ut ligula hendrerit, et hendrerit ante condimentum. Aliquam suscipit feugiat velit, at vehicula lorem pharetra quis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean erat dolor, aliquet vitae ligula suscipit, bibendum malesuada augue.</span>', 'Notícia 4', '', 'publish', 'open', 'open', '', 'noticia-4', '', '', '2015-07-24 17:23:14', '2015-07-24 16:23:14', '', 0, 'https://pwc-int.educacio.intranet/agora/masterzer/?p=129', 0, 'post', '', 0),
(131, 1, '2014-09-19 10:42:18', '2014-09-19 10:42:18', '', 'primersauxilis', '', 'inherit', 'open', 'open', '', 'primersauxilis', '', '', '2014-09-19 10:42:18', '2014-09-19 10:42:18', '', 120, 'https://pwc-int.educacio.intranet/agora/masterzer/wp-content/uploads/usu10/2014/09/primersauxilis.jpg', 0, 'attachment', 'image/jpeg', 0),
(134, 1, '2014-09-19 10:45:22', '2014-09-19 10:45:22', '<span style="color: #444444;">Nam semper id ipsum condimentum laoreet. Proin sollicitudin elit ut ligula hendrerit, et hendrerit ante condimentum. Aliquam suscipit feugiat velit, at vehicula lorem pharetra quis. Nam semper id ipsum condimentum laoreet. Proin sollicitudin elit ut ligula hendrerit, et hendrerit ante condimentum. Aliquam suscipit feugiat velit, at vehicula lorem pharetra quis.</span>', 'Notícia 5', '', 'publish', 'open', 'open', '', 'noticia-5', '', '', '2015-07-27 13:07:35', '2015-07-27 12:07:35', '', 0, 'https://pwc-int.educacio.intranet/agora/masterzer/?p=134', 0, 'post', '', 0),
(137, 1, '2014-09-19 10:46:03', '2014-09-19 10:46:03', '<span style="color: #444444;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean erat dolor, aliquet vitae ligula suscipit, bibendum malesuada augue. Nam semper id ipsum condimentum laoreet. Proin sollicitudin elit ut ligula hendrerit, et hendrerit ante condimentum. Aliquam suscipit feugiat velit, at vehicula lorem pharetra quis.</span>', 'Notícia 6', '', 'publish', 'open', 'open', '', 'noticia-6', '', '', '2015-07-24 17:21:48', '2015-07-24 16:21:48', '', 0, 'https://pwc-int.educacio.intranet/agora/masterzer/?p=137', 0, 'post', '', 0),
(141, 1, '2014-09-19 11:18:24', '2014-09-19 11:18:24', '', 'cicles', '', 'inherit', 'open', 'open', '', 'cicles', '', '', '2014-09-19 11:18:24', '2014-09-19 11:18:24', '', 129, 'https://pwc-int.educacio.intranet/agora/masterzer/wp-content/uploads/usu10/2014/09/cicles.png', 0, 'attachment', 'image/png', 0),
(146, 1, '2014-09-19 12:05:27', '2014-09-19 12:05:27', '', 'gimnas', '', 'inherit', 'open', 'open', '', 'gimnas', '', '', '2014-09-19 12:05:27', '2014-09-19 12:05:27', '', 0, 'https://pwc-int.educacio.intranet/agora/masterzer/wp-content/uploads/usu10/2014/09/gimnas.png', 0, 'attachment', 'image/png', 0),
(148, 1, '2014-09-19 12:30:14', '2014-09-19 12:30:14', '', 'Exemple ', '', 'publish', 'closed', 'closed', '', 'exemple', '', '', '2014-09-19 16:08:04', '2014-09-19 16:08:04', '', 0, 'https://pwc-int.educacio.intranet/agora/masterzer/?post_type=slideshow&#038;p=148', 0, 'slideshow', '', 0),
(154, 1, '2014-09-19 14:40:48', '2014-09-19 14:40:48', '', 'Xesc_Arbona', '', 'inherit', 'open', 'open', '', 'xesc_arbona', '', '', '2014-09-19 14:40:48', '2014-09-19 14:40:48', '', 0, 'https://pwc-int.educacio.intranet/agora/masterzer/wp-content/uploads/usu10/2014/09/Xesc_Arbona.png', 0, 'attachment', 'image/png', 0),
(161, 1, '2014-09-19 16:00:03', '2014-09-19 16:00:03', '<iframe src="//player.vimeo.com/video/88231031?title=0&amp;byline=0&amp;portrait=0" width="550" height="310" frameborder="0" allowfullscreen="allowfullscreen"></iframe>', 'Notícia 7', '', 'publish', 'open', 'open', '', 'noticia-7', '', '', '2015-07-28 14:16:48', '2015-07-28 13:16:48', '', 0, 'https://pwc-int.educacio.intranet/agora/masterzer/?p=161', 0, 'post', '', 0),
(163, 1, '2014-09-19 16:00:33', '2014-09-19 16:00:33', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean erat dolor, aliquet vitae ligula suscipit, bibendum malesuada augue. Nam semper id ipsum condimentum laoreet. Proin sollicitudin elit ut ligula hendrerit, et hendrerit ante condimentum. Aliquam suscipit feugiat velit, at vehicula lorem pharetra quis.', 'Notícia 8', '', 'publish', 'open', 'open', '', 'noticia-8', '', '', '2015-07-24 17:28:38', '2015-07-24 16:28:38', '', 0, 'https://pwc-int.educacio.intranet/agora/masterzer/?p=163', 0, 'post', '', 0),
(168, 1, '2014-09-19 16:04:34', '2014-09-19 16:04:34', '', 'classe', '', 'inherit', 'open', 'open', '', 'classe', '', '', '2014-09-19 16:04:34', '2014-09-19 16:04:34', '', 134, 'https://pwc-int.educacio.intranet/agora/masterzer/wp-content/uploads/usu10/2014/09/classe.png', 0, 'attachment', 'image/png', 0),
(170, 1, '2014-09-19 16:16:22', '2014-09-19 16:16:22', 'Node del departament de Tecnologia (professorat)', 'Tecnologia', '', 'private', 'closed', 'open', '', 'tecnologia', '', '', '2014-09-19 16:16:22', '2014-09-19 16:16:22', '', 0, 'https://pwc-int.educacio.intranet/agora/masterzer/forums/forum/tecnologia', 0, 'forum', '', 0),
(171, 1, '2014-09-19 16:19:15', '2014-09-19 16:19:15', 'Node del departament de Matemàtiques', 'Dep. Matemàtiques', '', 'private', 'closed', 'open', '', 'dep-matematiques', '', '', '2014-09-19 16:19:15', '2014-09-19 16:19:15', '', 0, 'https://pwc-int.educacio.intranet/agora/masterzer/forums/forum/dep-matematiques', 0, 'forum', '', 0),
(172, 1, '2014-09-19 16:26:36', '2014-09-19 16:26:36', 'Node del departament de Llengua catalana i literatura (professorat)', 'Dep. Català', '', 'private', 'closed', 'open', '', 'dep-catala', '', '', '2014-09-19 16:26:36', '2014-09-19 16:26:36', '', 0, 'https://pwc-int.educacio.intranet/agora/masterzer/forums/forum/dep-catala', 0, 'forum', '', 0),
(173, 1, '2014-09-19 16:29:03', '2014-09-19 16:29:03', 'Node del departament de Llengua castellana i literatura (professorat)', 'Dep. Castellà', '', 'private', 'closed', 'open', '', 'dep-castella', '', '', '2014-09-19 16:29:03', '2014-09-19 16:29:03', '', 0, 'https://pwc-int.educacio.intranet/agora/masterzer/forums/forum/dep-castella', 0, 'forum', '', 0),
(174, 1, '2014-09-19 16:31:22', '2014-09-19 16:31:22', 'Node del departament de Llengües estrangeres (professorat)', 'Dep. Llengües estrangeres', '', 'private', 'closed', 'open', '', 'dep-llengues-estrangeres', '', '', '2014-09-19 16:31:22', '2014-09-19 16:31:22', '', 0, 'https://pwc-int.educacio.intranet/agora/masterzer/forums/forum/dep-llengues-estrangeres', 0, 'forum', '', 0),
(175, 1, '2014-09-19 16:33:32', '2014-09-19 16:33:32', 'Node del departament d&#039;Educació Física (professorat)', 'Dep. Educació Física', '', 'private', 'closed', 'open', '', 'dep-educacio-fisica', '', '', '2014-09-19 16:33:32', '2014-09-19 16:33:32', '', 0, 'https://pwc-int.educacio.intranet/agora/masterzer/forums/forum/dep-educacio-fisica', 0, 'forum', '', 0),
(176, 1, '2014-09-19 16:39:42', '2014-09-19 16:39:42', 'Node del departament de Visual i Plàstica (professorat)', 'Dep. Visual i Plàstica', '', 'private', 'closed', 'open', '', 'dep-visual-i-plastica', '', '', '2014-09-19 16:39:42', '2014-09-19 16:39:42', '', 0, 'https://pwc-int.educacio.intranet/agora/masterzer/forums/forum/dep-visual-i-plastica', 0, 'forum', '', 0),
(177, 1, '2014-09-19 16:45:37', '2014-09-19 16:45:37', 'Node del departament de música (professorat)', 'Dep. Música', '', 'private', 'closed', 'open', '', 'dep-musica', '', '', '2014-09-19 16:45:37', '2014-09-19 16:45:37', '', 0, 'https://pwc-int.educacio.intranet/agora/masterzer/forums/forum/dep-musica', 0, 'forum', '', 0),
(178, 1, '2014-09-19 16:50:06', '2014-09-19 16:50:06', 'Node del departament d&#039;Orientació (professorat)', 'Dep. Orientació', '', 'private', 'closed', 'open', '', 'dep-orientacio', '', '', '2014-09-19 16:50:06', '2014-09-19 16:50:06', '', 0, 'https://pwc-int.educacio.intranet/agora/masterzer/forums/forum/dep-orientacio', 0, 'forum', '', 0),
(179, 1, '2014-09-19 17:00:49', '2014-09-19 17:00:49', 'Node del departament d&#039;Informàtica (professorat)', 'Dep. Informàtica', '', 'private', 'closed', 'open', '', 'dep-informatica', '', '', '2014-09-19 17:00:49', '2014-09-19 17:00:49', '', 0, 'https://pwc-int.educacio.intranet/agora/masterzer/forums/forum/dep-informatica', 0, 'forum', '', 0),
(184, 1, '2014-09-22 10:13:08', '2014-09-22 10:13:08', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean erat dolor, aliquet vitae ligula suscipit, bibendum malesuada augue. Nam semper id ipsum condimentum laoreet. Proin sollicitudin elit ut ligula hendrerit, et hendrerit ante condimentum.', 'Notícia 9', '', 'publish', 'open', 'open', '', 'noticia-9', '', '', '2015-10-27 10:01:53', '2015-10-27 09:01:53', '', 0, 'https://pwc-int.educacio.intranet/agora/masterzer/?p=184', 0, 'post', '', 0),
(185, 1, '2014-09-22 10:13:06', '2014-09-22 10:13:06', '', 'ampa', '', 'inherit', 'open', 'open', '', 'ampa-2', '', '', '2014-09-22 10:13:06', '2014-09-22 10:13:06', '', 184, 'https://pwc-int.educacio.intranet/agora/masterzer/wp-content/uploads/usu10/2014/09/ampa.png', 0, 'attachment', 'image/png', 0),
(202, 1, '2014-09-22 15:03:12', '2014-09-22 15:03:12', '', 'Destacat Nodes', '', 'publish', 'closed', 'closed', '', 'destacat-nodes', '', '', '2014-09-22 16:02:46', '2014-09-22 16:02:46', '', 0, 'https://pwc-int.educacio.intranet/agora/masterzer/?post_type=slideshow&#038;p=202', 0, 'slideshow', '', 0),
(203, 1, '2014-09-22 14:12:23', '2014-09-22 14:12:23', 'Node dedicat a l&#039;educació emocional', 'Educació emocional', '', 'publish', 'closed', 'open', '', 'educacio-emocional', '', '', '2014-09-22 14:12:23', '2014-09-22 14:12:23', '', 0, 'https://pwc-int.educacio.intranet/agora/masterzer/forums/forum/educacio-emocional', 0, 'forum', '', 0),
(204, 1, '2014-09-22 14:20:24', '2014-09-22 14:20:24', 'Node dels aficionats al cinema', 'Cinema', '', 'publish', 'closed', 'open', '', 'cinema', '', '', '2014-09-22 14:20:24', '2014-09-22 14:20:24', '', 0, 'https://pwc-int.educacio.intranet/agora/masterzer/forums/forum/cinema', 0, 'forum', '', 0),
(205, 1, '2014-09-22 14:31:55', '2014-09-22 14:31:55', 'Node dels aficionats a la fotografia', 'Fotografia', '', 'publish', 'closed', 'open', '', 'fotografia', '', '', '2014-09-22 14:31:55', '2014-09-22 14:31:55', '', 0, 'https://pwc-int.educacio.intranet/agora/masterzer/forums/forum/fotografia', 0, 'forum', '', 0),
(206, 1, '2014-09-22 14:40:28', '2014-09-22 14:40:28', 'Programa Redes sobre l''educació emocional. Molt interessant. Per reflexionar.\n<div style="width: 100%; padding-top: 64%; position: relative; border-bottom: 1px solid #aaa; display: inline-block; background: rgba(255,255,255,0.9);">\n\n<iframe style="width: 100%; height: 90%; position: absolute; left: 0; top: 0; overflow: hidden;" src="http://www.rtve.es/drmn/embed/video/1839588" name="El aprendizaje social y emocional" width="320" height="240" frameborder="0" scrolling="no"></iframe>\n<div style="position: absolute; bottom: 0; left: 0; font-family: arial,helvetica,sans-serif; font-size: 12px; line-height: 1.833; display: inline-block; padding: 5px 0 5px 10px;"><span style="float: left; margin-right: 10px;"><img style="height: 20px; width: auto; background: transparent; padding: 0; margin: 0;" src="http://img.irtve.es/css/rtve.commons/rtve.header.footer/i/logoRTVEes.png" alt="" /></span> <a style="color: #333; font-weight: bold;" title="El aprendizaje social y emocional" href="http://www.rtve.es/alacarta/videos/redes/redes-aprendizaje-social-20130526-2130-169/1839588/"><strong>El aprendizaje social y emocional</strong></a></div>\n</div>', 'Programa Redes sobre educació emocional', '', 'publish', 'closed', 'open', '', 'programa-redes-sobre-educacio-emocional', '', '', '2014-09-22 15:30:57', '2014-09-22 15:30:57', '', 112, 'https://pwc-int.educacio.intranet/agora/masterzer/forums/topic/programa-redes-sobre-educacio-emocional', 0, 'topic', '', 0),
(207, 1, '2014-09-22 14:46:13', '2014-09-22 14:46:13', 'Un dels objectius de la xarxa Nodes és oferir espais perquè els alumnes es pugin expressar fora de l''aula. Pot ser una eina molt útil especialment pels alumnes que no destaquen pels seus resultats acadèmics i que tenen una baixa autoestima derivada d''una indefensió apresa a l''aula.\n\n<iframe src="http://www.youtube.com/embed/OtB6RTJVqPM" height="350" width="425" frameborder="0"></iframe>', 'Indefensió apresa', '', 'publish', 'closed', 'open', '', 'indefensio-apresa', '', '', '2014-09-22 14:46:13', '2014-09-22 14:46:13', '', 112, 'https://pwc-int.educacio.intranet/agora/masterzer/forums/topic/indefensio-apresa', 0, 'topic', '', 0),
(209, 1, '2014-09-22 15:06:43', '2014-09-22 15:06:43', 'Node d&#039;aficionats a la papiroflexia', 'Papiroflexia', '', 'publish', 'closed', 'open', '', 'papiroflexia', '', '', '2014-09-22 15:06:43', '2014-09-22 15:06:43', '', 0, 'https://pwc-int.educacio.intranet/agora/masterzer/forums/forum/papiroflexia', 0, 'forum', '', 0),
(210, 1, '2014-09-22 15:10:09', '2014-09-22 15:10:09', '', 'granota', '', 'inherit', 'open', 'open', '', 'granota', '', '', '2014-09-22 15:10:09', '2014-09-22 15:10:09', '', 0, 'https://pwc-int.educacio.intranet/agora/masterzer/wp-content/uploads/usu10/2014/09/granota.png', 0, 'attachment', 'image/png', 0),
(211, 1, '2014-09-22 15:11:13', '2014-09-22 15:11:13', 'Hola Noders! Qui s''apunta a fer la granota? Aquí teniu les instruccions:\n\n[caption id="" align="alignnone" width="700"]<img src="https://pwc-int.educacio.intranet/agora/masterzer/wp-content/uploads/usu10/2014/09/granota.png" alt="Instruccions Granota" width="700" height="495" /> Instruccions Granota[/caption]', 'Figura n.1: La granota ', '', 'publish', 'closed', 'open', '', 'figura-n-1-la-granota', '', '', '2014-09-22 15:11:13', '2014-09-22 15:11:13', '', 209, 'https://pwc-int.educacio.intranet/agora/masterzer/forums/topic/figura-n-1-la-granota', 0, 'topic', '', 0),
(215, 1, '2014-09-22 16:02:36', '2014-09-22 16:02:36', '', 'screeshot', '', 'inherit', 'open', 'open', '', 'screeshot', '', '', '2014-09-22 16:02:36', '2014-09-22 16:02:36', '', 0, 'https://pwc-int.educacio.intranet/agora/masterzer/wp-content/uploads/usu10/2014/09/screeshot.png', 0, 'attachment', 'image/png', 0),
(216, 1, '2014-09-22 16:54:13', '2014-09-22 16:54:13', 'Molt recomanable:\nhttps://www.youtube.com/watch?v=PQE4WqQSOcQ', 'Documental sobre educació Emocional', '', 'publish', 'closed', 'open', '', 'documental-sobre-educacio-emocional', '', '', '2014-09-22 16:54:13', '2014-09-22 16:54:13', '', 112, 'https://pwc-int.educacio.intranet/agora/masterzer/forums/topic/documental-sobre-educacio-emocional', 0, 'topic', '', 0),
(224, 1, '2014-10-07 05:44:15', '2014-10-07 05:44:15', '<strong>[title]</strong><br />[when]<br />[location]<br /><div>[description]</div><br />[link newwindow="yes"]Més detalls...[/link]', 'Calendari general ZER', '', 'publish', 'closed', 'closed', '', 'institut-larany', '', '', '2016-09-20 11:51:20', '2016-09-20 09:51:20', '', 0, 'https://pwc-int.educacio.intranet/agora/masterzer/gce_feed/institut-larany', 0, 'calendar', '', 0),
(230, 1, '2014-10-23 15:06:56', '2014-10-23 15:06:56', 'Exemple de document a Google Drive:\r\n\r\n<a href="https://docs.google.com/document/d/1incKJCmJfQvcjtnKReUQW_6Pu9F_QBf0fWpaxgp0ODs/edit?usp=sharing">https://docs.google.com/document/d/1incKJCmJfQvcjtnKReUQW_6Pu9F_QBf0fWpaxgp0ODs/edit?usp=sharing</a>', 'Document a Google Drive', '', 'publish', 'open', 'open', '', 'document-a-google-drive', '', '', '2014-10-23 15:18:51', '2014-10-23 15:18:51', '', 0, 'https://pwc-int.educacio.intranet/agora/masterzer/docs/', 0, 'bp_doc', '', 0),
(233, 1, '2014-10-23 15:11:21', '2014-10-23 15:11:21', 'Exemple de document ofimàtic (públic)', 'Document ofimàtic', '', 'publish', 'open', 'open', '', 'document-ofimatic', '', '', '2014-10-23 15:18:51', '2014-10-23 15:18:51', '', 0, 'https://pwc-int.educacio.intranet/agora/masterzer/docs/', 0, 'bp_doc', '', 0),
(234, 1, '2014-10-23 15:10:34', '2014-10-23 15:10:34', '', 'Exemple', '', 'inherit', 'open', 'open', '', 'exemple-2', '', '', '2014-10-23 15:10:34', '2014-10-23 15:10:34', '', 233, 'https://pwc-int.educacio.intranet/agora/masterzer/wp-content/uploads/usu10/bp-attachments/233/Exemple.docx', 0, 'attachment', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 0),
(236, 1, '2014-10-23 15:14:55', '2014-10-23 15:14:55', '', 'Professorat', '', 'trash', 'open', 'open', '', 'professorat-2', '', '', '2014-10-23 15:18:51', '2014-10-23 15:18:51', '', 0, 'https://pwc-int.educacio.intranet/agora/masterzer/docs/', 0, 'bp_doc', '', 0),
(238, 1, '2014-10-23 15:46:00', '2014-10-23 15:46:00', 'Exemple de document com a fotografia', 'Exemple foto com a document', '', 'publish', 'open', 'open', '', 'exemple-foto-com-a-document', '', '', '2015-07-21 08:35:33', '2015-07-21 07:35:33', '', 0, 'https://pwc-int.educacio.intranet/agora/masterzer/docs/', 0, 'bp_doc', '', 0),
(239, 1, '2014-10-23 15:44:32', '2014-10-23 15:44:32', '', 'Selecció_713', '', 'inherit', 'open', 'open', '', 'seleccio_713', '', '', '2014-10-23 15:44:32', '2014-10-23 15:44:32', '', 238, 'https://pwc-int.educacio.intranet/agora/masterzer/wp-content/uploads/usu10/bp-attachments/238/Selecció_713.png', 0, 'attachment', 'image/png', 0),
(248, 1, '2015-01-23 12:14:15', '2015-01-23 11:14:15', '<strong>[title]</strong><br />[when]<br />[location]<br /><div>[description]</div><br />[link newwindow="yes"]Més detalls...[/link]', 'Agenda general ZER', '', 'publish', 'closed', 'closed', '', 'agenda-dexemple', '', '', '2016-09-20 11:51:20', '2016-09-20 09:51:20', '', 0, 'https://pwc-int.educacio.intranet/agora/masterzer/?post_type=gce_feed&#038;p=248', 0, 'calendar', '', 0),
(249, 1, '2015-01-23 12:20:56', '2015-01-23 11:20:56', '', 'Document 1', '', 'publish', 'open', 'open', '', 'document-1', '', '', '2015-01-23 12:20:56', '2015-01-23 11:20:56', '', 0, 'https://pwc-int.educacio.intranet/agora/masterzer/?p=249', 1, 'nav_menu_item', '', 0),
(250, 1, '2015-01-23 12:20:56', '2015-01-23 11:20:56', '', 'Document 2', '', 'publish', 'open', 'open', '', 'document-2', '', '', '2015-01-23 12:20:56', '2015-01-23 11:20:56', '', 0, 'https://pwc-int.educacio.intranet/agora/masterzer/?p=250', 2, 'nav_menu_item', '', 0),
(251, 1, '2015-01-23 12:20:56', '2015-01-23 11:20:56', '', 'Aplicació 1', '', 'publish', 'open', 'open', '', 'aplicacio-1', '', '', '2015-01-23 12:20:56', '2015-01-23 11:20:56', '', 0, 'https://pwc-int.educacio.intranet/agora/masterzer/?p=251', 3, 'nav_menu_item', '', 0),
(252, 1, '2015-01-23 12:20:56', '2015-01-23 11:20:56', '', 'Web 1', '', 'publish', 'open', 'open', '', 'web-1', '', '', '2015-01-23 12:20:56', '2015-01-23 11:20:56', '', 0, 'https://pwc-int.educacio.intranet/agora/masterzer/?p=252', 5, 'nav_menu_item', '', 0),
(253, 1, '2015-01-23 12:20:56', '2015-01-23 11:20:56', '', 'Aplicació 2', '', 'publish', 'open', 'open', '', 'aplicacio-2', '', '', '2015-01-23 12:20:56', '2015-01-23 11:20:56', '', 0, 'https://pwc-int.educacio.intranet/agora/masterzer/?p=253', 4, 'nav_menu_item', '', 0),
(254, 1, '2015-01-23 12:20:56', '2015-01-23 11:20:56', '', 'Web 2', '', 'publish', 'open', 'open', '', 'web-2', '', '', '2015-01-23 12:20:56', '2015-01-23 11:20:56', '', 0, 'https://pwc-int.educacio.intranet/agora/masterzer/?p=254', 6, 'nav_menu_item', '', 0),
(255, 1, '2015-01-23 12:50:03', '2015-01-23 11:50:03', '', 'foto-classe', '', 'inherit', 'open', 'open', '', 'foto-classe', '', '', '2015-01-23 12:50:03', '2015-01-23 11:50:03', '', 0, 'https://pwc-int.educacio.intranet/agora/masterzer/wp-content/uploads/usu10/2015/01/foto-classe.png', 0, 'attachment', 'image/png', 0),
(258, 1, '2015-07-20 12:40:06', '2015-07-20 11:40:06', 'Les zones escolars rurals (ZER) són institucions escolars de caràcter públic formades per l’agrupació de centres d''educació infantil i primària que es constitueixen amb la finalitat d’oferir el servei d’ensenyament en condicions de major qualitat en zones de baixa demografia escolar.\r\n<blockquote>L’Escola Rural, l’escola de les tres “P”: Petita, de Poble i Pública, és una escola arrelada al territori, que dóna vida al municipi, que a vegades n’és el pal de paller i/o dinamitzadora d’una part de la vida que el poble genera, que aglutina activitats, persones, i que és motiu de trobada i aprenentatge</blockquote>\r\nLa zona escolar rural té consideració de centre educatiu únic amb les característiques i els efectes que es determinen en el <a href="http://dogc.gencat.cat/ca/pdogc_canals_interns/pdogc_resultats_fitxa/?documentId=545262&amp;language=ca_ES&amp;action=fitxa" target="_blank">Decret 102/2010, de 3 d’agost d’autonomia dels centres educatius</a>, sense perjudici de respectar la identitat jurídica de cadascuna de les escoles que la integren.\r\n\r\nCada ZER té un projecte educatiu per a tots els centres que la integren i les mateixes normes d’organització i funcionament i la mateixa programació general anual, que ha de respectar la singularitat de cadascuna de les escoles.\r\n\r\nEn aquest apartat hi podeu incloure:\r\n<ul>\r\n	<li>Funcions de la ZER</li>\r\n	<li>Història</li>\r\n	<li>Organigrama</li>\r\n	<li>Galeria fotogràfica (recomanat Carrusel amb Picasa)</li>\r\n</ul>', 'Qui som', '', 'publish', 'closed', 'closed', '', 'qui-som', '', '', '2015-10-27 10:10:26', '2015-10-27 09:10:26', '', 19, 'https://pwc-int.educacio.intranet/agora/masterzer/?page_id=258', 0, 'page', '', 0),
(261, 1, '2015-07-20 13:05:00', '2015-07-20 12:05:00', 'En aquesta secció podeu incloure:\r\n<ul>\r\n	<li>Breu descripció de l''escola (nombre de grups, alumnes etc.)</li>\r\n	<li>Història</li>\r\n	<li>Organigrama</li>\r\n	<li>Galeria de fotografies (recomanat Carrusel amb Picasa)</li>\r\n</ul>\r\n&nbsp;', 'Qui som', '', 'publish', 'closed', 'closed', '', 'qui-som', '', '', '2015-10-27 10:07:02', '2015-10-27 09:07:02', '', 264, 'https://pwc-int.educacio.intranet/agora/masterzer/?page_id=261', 10, 'page', '', 0),
(264, 1, '2015-07-20 13:06:26', '2015-07-20 12:06:26', 'En aquesta secció podeu incloure:\r\n<ul>\r\n	<li>Benvinguda, presentació o breu descripció de l''escola</li>\r\n	<li>Imatge o galeria d''imatges representatives</li>\r\n</ul>\r\n<p style="padding-left: 30px;"><a href="https://pwc-int.educacio.intranet/agora/masterzer/wp-content/uploads/usu10/2015/07/zer4.jpg"><img class="alignnone size-medium wp-image-424" src="https://pwc-int.educacio.intranet/agora/masterzer/wp-content/uploads/usu10/2015/07/zer4-300x150.jpg" alt="Escola Gamma" width="300" height="150" /></a></p>\r\n\r\n<ul>\r\n	<li>Enllaç al <a href="https://pwc-int.educacio.intranet/agora/masterzer/categoria/escola-alfa/">blog</a> de l''escola</li>\r\n</ul>\r\n&nbsp;', 'Escola Alfa', '', 'publish', 'closed', 'closed', '', 'escola-alfa', '', '', '2015-10-27 10:06:58', '2015-10-27 09:06:58', '', 0, 'https://pwc-int.educacio.intranet/agora/masterzer/?page_id=264', 0, 'page', '', 0),
(266, 1, '2015-07-20 13:08:55', '2015-07-20 12:08:55', 'En aquesta secció hi podeu incloure:\r\n<ul>\r\n	<li>Benvinguda, presentació o breu descripció de l''escola</li>\r\n	<li>Imatge o galeria d''imatges representatives</li>\r\n</ul>\r\n<p style="padding-left: 30px;"><a href="https://pwc-int.educacio.intranet/agora/masterzer/wp-content/uploads/usu10/2015/07/zer5.jpg"><img class="alignnone size-medium wp-image-425" src="https://pwc-int.educacio.intranet/agora/masterzer/wp-content/uploads/usu10/2015/07/zer5-300x158.jpg" alt="zer5" width="300" height="158" /></a></p>\r\n\r\n<ul>\r\n	<li>Enllaç al <a href="https://pwc-int.educacio.intranet/agora/masterzer/categoria/escola-beta/">blog</a> de l''escola</li>\r\n</ul>\r\n&nbsp;', 'Escola Beta', '', 'publish', 'closed', 'closed', '', 'escola-beta', '', '', '2015-10-27 10:07:29', '2015-10-27 09:07:29', '', 0, 'https://pwc-int.educacio.intranet/agora/masterzer/?page_id=266', 0, 'page', '', 0),
(268, 1, '2015-07-20 13:09:24', '2015-07-20 12:09:24', 'En aquesta secció podeu incloure:\r\n<ul>\r\n	<li>Benvinguda, presentació o breu descripció de l''escola</li>\r\n	<li>Imatge o galeria d''imatges representatives</li>\r\n</ul>\r\n<p style="padding-left: 30px;"><a href="https://pwc-int.educacio.intranet/agora/masterzer/wp-content/uploads/usu10/2015/07/zer1.jpg"><img class="alignnone size-medium wp-image-422" src="https://pwc-int.educacio.intranet/agora/masterzer/wp-content/uploads/usu10/2015/07/zer1-300x225.jpg" alt="zer1" width="300" height="225" /></a></p>\r\n\r\n<ul>\r\n	<li>Enllaç al <a href="https://pwc-int.educacio.intranet/agora/masterzer/categoria/escola-gamma/">blog</a> de l''escola</li>\r\n</ul>\r\n&nbsp;', 'Escola Gamma', '', 'publish', 'closed', 'closed', '', 'escola-gamma', '', '', '2015-10-27 10:08:45', '2015-10-27 09:08:45', '', 0, 'https://pwc-int.educacio.intranet/agora/masterzer/?page_id=268', 0, 'page', '', 0),
(270, 1, '2015-07-20 13:09:47', '2015-07-20 12:09:47', 'En aquesta secció hi podeu incloure:\r\n<ul>\r\n	<li>Benvinguda, presentació o breu descripció de l''escola</li>\r\n	<li>Imatge o galeria d''imatges representatives</li>\r\n</ul>\r\n<p style="padding-left: 30px;"><a href="https://pwc-int.educacio.intranet/agora/masterzer/wp-content/uploads/usu10/2015/07/zer1.png"><img class="alignnone size-medium wp-image-423" src="https://pwc-int.educacio.intranet/agora/masterzer/wp-content/uploads/usu10/2015/07/zer1-300x150.png" alt="zer1" width="300" height="150" /></a></p>\r\n\r\n<ul>\r\n	<li>Enllaç al <a href="https://pwc-int.educacio.intranet/agora/masterzer/categoria/escola-epsilon/">blog</a> de l''escola</li>\r\n</ul>\r\n&nbsp;', 'Escola Epsilon', '', 'publish', 'closed', 'closed', '', 'escola-epsilon', '', '', '2015-10-27 10:08:04', '2015-10-27 09:08:04', '', 0, 'https://pwc-int.educacio.intranet/agora/masterzer/?page_id=270', 0, 'page', '', 0),
(272, 1, '2015-07-20 13:10:37', '2015-07-20 12:10:37', 'En aquesta secció hi podeu incloure:\r\n<ul>\r\n	<li>Breu descripció de l''escola (nombre de grups, alumnes etc.)</li>\r\n	<li>Història</li>\r\n	<li>Organigrama</li>\r\n	<li>Galeria de fotografies (recomanat Carrusel amb Picasa)</li>\r\n</ul>\r\n&nbsp;', 'Qui som', '', 'publish', 'closed', 'closed', '', 'qui-som', '', '', '2015-10-27 10:07:33', '2015-10-27 09:07:33', '', 266, 'https://pwc-int.educacio.intranet/agora/masterzer/?page_id=272', 10, 'page', '', 0),
(276, 1, '2015-07-20 13:18:17', '2015-07-20 12:18:17', '<p style="color: #666666;"><strong>Escola Alfa</strong>\r\nPlaça de la Vila, 14\r\n01234 Abella de Xerta\r\n<a href="mailto:bustia@esc-alfa.cat">bustia@esc-alfa.cat</a></p>\r\n<iframe style="border: 0;" src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d95122.2542300733!2d1.53775!3d41.837547!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sca!2sus!4v1410948001907" width="600" height="450" frameborder="0"></iframe>\r\n\r\n<strong>Com arribar-hi:\r\n</strong>\r\n<ul>\r\n	<li>En tren: Estació Abella centre de la línia 1</li>\r\n	<li>En bus: Línies L3 i L5</li>\r\n</ul>\r\n&nbsp;', 'On som', '', 'publish', 'closed', 'closed', '', 'on-som', '', '', '2015-10-27 10:07:06', '2015-10-27 09:07:06', '', 264, 'https://pwc-int.educacio.intranet/agora/masterzer/?page_id=276', 20, 'page', '', 0),
(281, 1, '2015-07-20 13:38:45', '2015-07-20 12:38:45', '<p style="color: #666666;"><strong>Escola Espsilon</strong>\r\nPlaça de la Vila, 14\r\n01234 Abella de Xerta\r\n<a href="mailto:bustia@esc-epsilon.cat">bustia@esc-epsilon.cat</a></p>\r\n<iframe style="border: 0;" src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d95122.2542300733!2d1.53775!3d41.837547!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sca!2sus!4v1410948001907" width="600" height="450" frameborder="0"></iframe>\r\n\r\n<strong>Com arribar-hi:\r\n</strong>\r\n<ul>\r\n	<li>En tren: Estació Abella centre de la línia 1</li>\r\n	<li>En bus: Línies L3 i L5</li>\r\n</ul>\r\n&nbsp;', 'On som', '', 'publish', 'closed', 'closed', '', 'on-som', '', '', '2015-10-27 10:08:15', '2015-10-27 09:08:15', '', 270, 'https://pwc-int.educacio.intranet/agora/masterzer/?page_id=281', 30, 'page', '', 0),
(283, 1, '2015-07-20 13:25:33', '2015-07-20 12:25:33', '<p style="color: #666666;"><strong>Escola Beta</strong>\r\nPlaça de la Vila, 14\r\n01234 Abella de Xerta\r\n<a href="mailto:bustia@esc-beta.cat">bustia@esc-beta.cat</a></p>\r\n<iframe style="border: 0;" src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d95122.2542300733!2d1.53775!3d41.837547!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sca!2sus!4v1410948001907" width="600" height="450" frameborder="0"></iframe>\r\n\r\n<strong>Com arribar-hi:\r\n</strong>\r\n<ul>\r\n	<li>En tren: Estació Abella centre de la línia 1</li>\r\n	<li>En bus: Línies L3 i L5</li>\r\n</ul>\r\n&nbsp;', 'On som', '', 'publish', 'closed', 'closed', '', 'on-som', '', '', '2015-10-27 10:07:38', '2015-10-27 09:07:38', '', 266, 'https://pwc-int.educacio.intranet/agora/masterzer/?page_id=283', 20, 'page', '', 0),
(287, 1, '2015-07-20 13:35:06', '2015-07-20 12:35:06', ' ', '', '', 'publish', 'open', 'open', '', '287', '', '', '2015-07-31 16:19:52', '2015-07-31 15:19:52', '', 0, 'https://pwc-int.educacio.intranet/agora/masterzer/?p=287', 58, 'nav_menu_item', '', 0),
(288, 1, '2015-07-20 13:35:06', '2015-07-20 12:35:06', ' ', '', '', 'publish', 'open', 'open', '', '288', '', '', '2015-07-31 16:19:52', '2015-07-31 15:19:52', '', 0, 'https://pwc-int.educacio.intranet/agora/masterzer/?p=288', 45, 'nav_menu_item', '', 0),
(289, 1, '2015-07-20 13:35:06', '2015-07-20 12:35:06', ' ', '', '', 'publish', 'open', 'open', '', '289', '', '', '2015-07-31 16:19:52', '2015-07-31 15:19:52', '', 0, 'https://pwc-int.educacio.intranet/agora/masterzer/?p=289', 32, 'nav_menu_item', '', 0),
(290, 1, '2015-07-20 13:35:06', '2015-07-20 12:35:06', ' ', '', '', 'publish', 'open', 'open', '', '290', '', '', '2015-07-31 16:19:51', '2015-07-31 15:19:51', '', 0, 'https://pwc-int.educacio.intranet/agora/masterzer/?p=290', 15, 'nav_menu_item', '', 0),
(291, 1, '2015-07-20 13:35:06', '2015-07-20 12:35:06', ' ', '', '', 'publish', 'open', 'open', '', '291', '', '', '2015-07-31 16:19:52', '2015-07-31 15:19:52', '', 266, 'https://pwc-int.educacio.intranet/agora/masterzer/?p=291', 34, 'nav_menu_item', '', 0),
(292, 1, '2015-07-20 13:35:06', '2015-07-20 12:35:06', ' ', '', '', 'publish', 'open', 'open', '', '292', '', '', '2015-07-31 16:19:51', '2015-07-31 15:19:51', '', 264, 'https://pwc-int.educacio.intranet/agora/masterzer/?p=292', 17, 'nav_menu_item', '', 0),
(293, 1, '2015-07-20 13:35:06', '2015-07-20 12:35:06', ' ', '', '', 'publish', 'open', 'open', '', '293', '', '', '2015-07-31 16:19:51', '2015-07-31 15:19:51', '', 264, 'https://pwc-int.educacio.intranet/agora/masterzer/?p=293', 16, 'nav_menu_item', '', 0),
(294, 1, '2015-07-20 13:35:06', '2015-07-20 12:35:06', ' ', '', '', 'publish', 'open', 'open', '', '294', '', '', '2015-07-31 16:19:52', '2015-07-31 15:19:52', '', 266, 'https://pwc-int.educacio.intranet/agora/masterzer/?p=294', 33, 'nav_menu_item', '', 0),
(296, 1, '2015-07-20 13:40:45', '2015-07-20 12:40:45', ' ', '', '', 'publish', 'open', 'open', '', '296', '', '', '2015-07-31 16:19:51', '2015-07-31 15:19:51', '', 19, 'https://pwc-int.educacio.intranet/agora/masterzer/?p=296', 2, 'nav_menu_item', '', 0),
(297, 1, '2015-07-20 13:42:10', '2015-07-20 12:42:10', 'En aquesta secció podeu descriure les activitats i projectes significatius que s''han impulsat o dinamitzat des de la ZER.', 'Què fem', '', 'publish', 'closed', 'closed', '', 'que-fem', '', '', '2015-10-27 10:10:32', '2015-10-27 09:10:32', '', 19, 'https://pwc-int.educacio.intranet/agora/masterzer/?page_id=297', 40, 'page', '', 0),
(300, 1, '2015-07-20 13:43:11', '2015-07-20 12:43:11', 'Sed rutrum augue ante, vel tempor ante dictum et. Nam auctor urna massa, a viverra nibh tempor venenatis. Curabitur quis nibh neque. Suspendisse vitae urna eleifend, luctus erat at, efficitur ante. Proin dui lectus, bibendum eu feugiat vel, ultrices eu metus. Donec convallis feugiat aliquet. Proin auctor efficitur varius. Nunc odio tellus, ultricies ut vehicula eleifend, tristique eget nisi. Duis eu rutrum diam. Sed at ultricies velit, et ultricies enim. Cras non tortor non nibh mollis rutrum. Fusce egestas mollis nisi, sit amet aliquam risus iaculis quis. Sed lacinia lacus sapien, vel vehicula eros elementum quis. Sed sit amet nunc sed nulla semper bibendum nec et lectus. Curabitur eget aliquet sem. Praesent quis turpis velit.', 'Activitat 1', '', 'publish', 'closed', 'closed', '', 'activitat-1', '', '', '2015-10-27 10:10:35', '2015-10-27 09:10:35', '', 297, 'https://pwc-int.educacio.intranet/agora/masterzer/?page_id=300', 10, 'page', '', 0),
(303, 1, '2015-07-20 13:43:37', '2015-07-20 12:43:37', 'Sed rutrum augue ante, vel tempor ante dictum et. Nam auctor urna massa, a viverra nibh tempor venenatis. Curabitur quis nibh neque. Suspendisse vitae urna eleifend, luctus erat at, efficitur ante. Proin dui lectus, bibendum eu feugiat vel, ultrices eu metus. Donec convallis feugiat aliquet. Proin auctor efficitur varius. Nunc odio tellus, ultricies ut vehicula eleifend, tristique eget nisi. Duis eu rutrum diam. Sed at ultricies velit, et ultricies enim. Cras non tortor non nibh mollis rutrum. Fusce egestas mollis nisi, sit amet aliquam risus iaculis quis. Sed lacinia lacus sapien, vel vehicula eros elementum quis. Sed sit amet nunc sed nulla semper bibendum nec et lectus. Curabitur eget aliquet sem. Praesent quis turpis velit.', 'Activitat 2', '', 'publish', 'closed', 'closed', '', 'activitat-2', '', '', '2015-10-27 10:10:39', '2015-10-27 09:10:39', '', 297, 'https://pwc-int.educacio.intranet/agora/masterzer/?page_id=303', 20, 'page', '', 0);
INSERT INTO `wp_posts` (`ID`, `post_author`, `post_date`, `post_date_gmt`, `post_content`, `post_title`, `post_excerpt`, `post_status`, `comment_status`, `ping_status`, `post_password`, `post_name`, `to_ping`, `pinged`, `post_modified`, `post_modified_gmt`, `post_content_filtered`, `post_parent`, `guid`, `menu_order`, `post_type`, `post_mime_type`, `comment_count`) VALUES
(305, 1, '2015-07-20 13:44:02', '2015-07-20 12:44:02', 'Sed rutrum augue ante, vel tempor ante dictum et. Nam auctor urna massa, a viverra nibh tempor venenatis. Curabitur quis nibh neque. Suspendisse vitae urna eleifend, luctus erat at, efficitur ante. Proin dui lectus, bibendum eu feugiat vel, ultrices eu metus. Donec convallis feugiat aliquet. Proin auctor efficitur varius. Nunc odio tellus, ultricies ut vehicula eleifend, tristique eget nisi. Duis eu rutrum diam. Sed at ultricies velit, et ultricies enim. Cras non tortor non nibh mollis rutrum. Fusce egestas mollis nisi, sit amet aliquam risus iaculis quis. Sed lacinia lacus sapien, vel vehicula eros elementum quis. Sed sit amet nunc sed nulla semper bibendum nec et lectus. Curabitur eget aliquet sem. Praesent quis turpis velit.', 'Projecte 1', '', 'publish', 'closed', 'closed', '', 'projecte-1', '', '', '2015-10-27 10:10:43', '2015-10-27 09:10:43', '', 297, 'https://pwc-int.educacio.intranet/agora/masterzer/?page_id=305', 30, 'page', '', 0),
(307, 1, '2015-07-20 13:44:32', '2015-07-20 12:44:32', 'Sed rutrum augue ante, vel tempor ante dictum et. Nam auctor urna massa, a viverra nibh tempor venenatis. Curabitur quis nibh neque. Suspendisse vitae urna eleifend, luctus erat at, efficitur ante. Proin dui lectus, bibendum eu feugiat vel, ultrices eu metus. Donec convallis feugiat aliquet. Proin auctor efficitur varius. Nunc odio tellus, ultricies ut vehicula eleifend, tristique eget nisi. Duis eu rutrum diam. Sed at ultricies velit, et ultricies enim. Cras non tortor non nibh mollis rutrum. Fusce egestas mollis nisi, sit amet aliquam risus iaculis quis. Sed lacinia lacus sapien, vel vehicula eros elementum quis. Sed sit amet nunc sed nulla semper bibendum nec et lectus. Curabitur eget aliquet sem. Praesent quis turpis velit.', 'Projecte 2', '', 'publish', 'closed', 'closed', '', 'projecte-2', '', '', '2015-10-27 10:10:47', '2015-10-27 09:10:47', '', 297, 'https://pwc-int.educacio.intranet/agora/masterzer/?page_id=307', 40, 'page', '', 0),
(309, 1, '2015-07-20 13:46:11', '2015-07-20 12:46:11', ' ', '', '', 'publish', 'open', 'open', '', '309', '', '', '2015-07-31 16:19:51', '2015-07-31 15:19:51', '', 19, 'https://pwc-int.educacio.intranet/agora/masterzer/?p=309', 5, 'nav_menu_item', '', 0),
(310, 1, '2015-07-20 13:46:11', '2015-07-20 12:46:11', ' ', '', '', 'publish', 'open', 'open', '', '310', '', '', '2015-07-31 16:19:51', '2015-07-31 15:19:51', '', 297, 'https://pwc-int.educacio.intranet/agora/masterzer/?p=310', 6, 'nav_menu_item', '', 0),
(311, 1, '2015-07-20 13:46:11', '2015-07-20 12:46:11', ' ', '', '', 'publish', 'open', 'open', '', '311', '', '', '2015-07-31 16:19:51', '2015-07-31 15:19:51', '', 297, 'https://pwc-int.educacio.intranet/agora/masterzer/?p=311', 7, 'nav_menu_item', '', 0),
(312, 1, '2015-07-20 13:46:11', '2015-07-20 12:46:11', ' ', '', '', 'publish', 'open', 'open', '', '312', '', '', '2015-07-31 16:19:51', '2015-07-31 15:19:51', '', 297, 'https://pwc-int.educacio.intranet/agora/masterzer/?p=312', 8, 'nav_menu_item', '', 0),
(313, 1, '2015-07-20 13:46:11', '2015-07-20 12:46:11', ' ', '', '', 'publish', 'open', 'open', '', '313', '', '', '2015-07-31 16:19:51', '2015-07-31 15:19:51', '', 297, 'https://pwc-int.educacio.intranet/agora/masterzer/?p=313', 9, 'nav_menu_item', '', 0),
(314, 1, '2015-07-21 08:14:42', '2015-07-21 07:14:42', '', 'Documents', '', 'publish', 'open', 'open', '', 'documents', '', '', '2015-07-31 16:19:51', '2015-07-31 15:19:51', '', 0, 'https://pwc-int.educacio.intranet/agora/masterzer/?p=314', 12, 'nav_menu_item', '', 0),
(316, 1, '2015-07-21 08:39:25', '2015-07-21 07:39:25', ' ', '', '', 'publish', 'open', 'open', '', '316', '', '', '2015-07-31 16:19:51', '2015-07-31 15:19:51', '', 19, 'https://pwc-int.educacio.intranet/agora/masterzer/?p=316', 13, 'nav_menu_item', '', 0),
(317, 1, '2015-07-21 08:41:17', '2015-07-21 07:41:17', 'En aquesta secció cada centre pot crear les pàgines necessàries per a descriure el seu projecte educatiu. D''acord amb la <a title="Article 91 LEC" href="http://www20.gencat.cat/portal/site/portaljuridic/menuitem.d15a4e5dfb99396dc366ec10b0c0e1a0/?vgnextoid=b85297b5a87d6210VgnVCM1000000b0c1e0aRCRD&amp;vgnextchannel=b85297b5a87d6210VgnVCM1000000b0c1e0aRCRD&amp;vgnextfmt=default&amp;action=fitxa&amp;portalId=1&amp;documentId=480169&amp;newLang=ca_ES#fragment-1182442" target="_blank">Llei d''Educació de Catalunya</a>, el projecte educatiu incorpora el caràcter propi del centre i ha de contenir com a mínim els elements següents:\r\n<ul>\r\n	<li>Criteris d''ordenació pedagògica, prioritats i plantejaments educatius, procediments d''inclusió i altres actuacions que caracteritzen el centre.</li>\r\n	<li>Indicadors de progrés.</li>\r\n	<li>Concreció i desenvolupament dels currículums.</li>\r\n	<li>Criteris que defineixen l''estructura organitzativa.</li>\r\n	<li>Projecte lingüístic.</li>\r\n	<li>Caràcter propi del centre, si n''hi ha.</li>\r\n</ul>\r\nEs pot incloure també en aquesta secció informació sobre les unitats i serveis especialitzats del centre (USEE, Aula d''Acollida, Aula Oberta, PIM...) així com altres documents que també formen part del projecte educatiu com ara: Projecte de Convivència, Pla d''Acció Tutorial, Pla TAC, Plans d''Acollida, Projecte d''Escola i Família, Comunitats d''Aprenentatge, etc.\r\n\r\nTambé pot ser interessant fer referència a altres projectes i activitats que es duen a terme a l''escola, com ara: Escola verda, Educació per a la salut, Mobilitza''t amb la Informàtica, Pla de reutilització de llibres de text, Programes Erasmus+, Aprenentatge servei, Aprenentatge integrat de Continguts i Llengües Estrangeres (AICLE), Revista de l''institut, Agenda 21...\r\n\r\nDonada la diversitat de seccions possibles, s''ha cregut oportú no crear cap pàgina específica en la maqueta inicial, deixant a criteri del centre la decisió sobre la millor manera d''estructurar la descripció del seu projecte educatiu. En crear els apartats és important que la caixa <em>Atributs de la pàgina</em> tingui com a pare/mare “<em>Projecte educatiu</em>“, i que se seleccioni com a plantilla l''opció “<em>Menú lateral</em>“.', 'Projecte educatiu', '', 'publish', 'closed', 'closed', '', 'projecte-educatiu', '', '', '2015-10-27 10:07:09', '2015-10-27 09:07:09', '', 264, 'https://pwc-int.educacio.intranet/agora/masterzer/?page_id=317', 30, 'page', '', 0),
(319, 1, '2015-07-21 08:43:34', '2015-07-21 07:43:34', 'En aquesta secció cada centre pot crear les pàgines necessàries per a descriure el seu projecte educatiu. D''acord amb la <a title="Article 91 LEC" href="http://www20.gencat.cat/portal/site/portaljuridic/menuitem.d15a4e5dfb99396dc366ec10b0c0e1a0/?vgnextoid=b85297b5a87d6210VgnVCM1000000b0c1e0aRCRD&amp;vgnextchannel=b85297b5a87d6210VgnVCM1000000b0c1e0aRCRD&amp;vgnextfmt=default&amp;action=fitxa&amp;portalId=1&amp;documentId=480169&amp;newLang=ca_ES#fragment-1182442" target="_blank">Llei d''Educació de Catalunya</a>, el projecte educatiu incorpora el caràcter propi del centre i ha de contenir com a mínim els elements següents:\r\n<ul>\r\n	<li>Criteris d''ordenació pedagògica, prioritats i plantejaments educatius, procediments d''inclusió i altres actuacions que caracteritzen el centre.</li>\r\n	<li>Indicadors de progrés.</li>\r\n	<li>Concreció i desenvolupament dels currículums.</li>\r\n	<li>Criteris que defineixen l''estructura organitzativa.</li>\r\n	<li>Projecte lingüístic.</li>\r\n	<li>Caràcter propi del centre, si n''hi ha.</li>\r\n</ul>\r\nEs pot incloure també en aquesta secció informació sobre les unitats i serveis especialitzats del centre (USEE, Aula d''Acollida, Aula Oberta, PIM...) així com altres documents que també formen part del projecte educatiu com ara: Projecte de Convivència, Pla d''Acció Tutorial, Pla TAC, Plans d''Acollida, Projecte d''Escola i Família, Comunitats d''Aprenentatge, etc.\r\n\r\nTambé pot ser interessant fer referència a altres projectes i activitats que es duen a terme a l''escola, com ara: Escola verda, Educació per a la salut, Mobilitza''t amb la Informàtica, Pla de reutilització de llibres de text, Programes Erasmus+, Aprenentatge servei, Aprenentatge integrat de Continguts i Llengües Estrangeres (AICLE), Revista de l''institut, Agenda 21...\r\n\r\nDonada la diversitat de seccions possibles, s''ha cregut oportú no crear cap pàgina específica en la maqueta inicial, deixant a criteri del centre la decisió sobre la millor manera d''estructurar la descripció del seu projecte educatiu. En crear els apartats és important que la caixa <em>Atributs de la pàgina</em> tingui com a pare/mare “<em>Projecte educatiu</em>“, i que se seleccioni com a plantilla l''opció “<em>Menú lateral</em>“.', 'Projecte educatiu', '', 'publish', 'closed', 'closed', '', 'projecte-educatiu', '', '', '2015-10-27 10:07:42', '2015-10-27 09:07:42', '', 266, 'https://pwc-int.educacio.intranet/agora/masterzer/?page_id=319', 30, 'page', '', 0),
(321, 1, '2015-07-21 08:44:10', '2015-07-21 07:44:10', 'En aquesta secció cada centre pot crear les pàgines necessàries per a descriure el seu projecte educatiu. D''acord amb la <a title="Article 91 LEC" href="http://www20.gencat.cat/portal/site/portaljuridic/menuitem.d15a4e5dfb99396dc366ec10b0c0e1a0/?vgnextoid=b85297b5a87d6210VgnVCM1000000b0c1e0aRCRD&amp;vgnextchannel=b85297b5a87d6210VgnVCM1000000b0c1e0aRCRD&amp;vgnextfmt=default&amp;action=fitxa&amp;portalId=1&amp;documentId=480169&amp;newLang=ca_ES#fragment-1182442" target="_blank">Llei d''Educació de Catalunya</a>, el projecte educatiu incorpora el caràcter propi del centre i ha de contenir com a mínim els elements següents:\r\n<ul>\r\n	<li>Criteris d''ordenació pedagògica, prioritats i plantejaments educatius, procediments d''inclusió i altres actuacions que caracteritzen el centre</li>\r\n	<li>Indicadors de progrés</li>\r\n	<li>Concreció i desenvolupament dels currículums</li>\r\n	<li>Criteris que defineixen l''estructura organitzativa</li>\r\n	<li>Projecte lingüístic</li>\r\n	<li>Caràcter propi del centre, si n''hi ha</li>\r\n</ul>\r\nEs pot incloure també en aquesta secció informació sobre les unitats i serveis especialitzats del centre (USEE, Aula d''Acollida, Aula Oberta, PIM...) així com altres documents que també formen part del projecte educatiu com ara: Projecte de Convivència, Pla d''Acció Tutorial, Pla TAC, Plans d''Acollida, Projecte d''Escola i Família, Comunitats d''Aprenentatge, etc.\r\n\r\nTambé pot ser interessant fer referència a altres projectes i activitats que es duen a terme a l''escola, com ara: Escola verda, Educació per a la salut, Mobilitza''t amb la Informàtica, Pla de reutilització de llibres de text, Programes Erasmus+, Aprenentatge servei, Aprenentatge integrat de Continguts i Llengües Estrangeres (AICLE), Revista de l''institut, Agenda 21...\r\n\r\nDonada la diversitat de seccions possibles, s''ha cregut oportú no crear cap pàgina específica en la maqueta inicial, deixant a criteri del centre la decisió sobre la millor manera d''estructurar la descripció del seu projecte educatiu. En crear els apartats és important que la caixa <em>Atributs de la pàgina</em> tingui com a pare/mare “<em>Projecte educatiu</em>“, i que se seleccioni com a plantilla l''opció “<em>Menú lateral</em>“.', 'Projecte educatiu', '', 'publish', 'closed', 'closed', '', 'projecte-educatiu', '', '', '2015-10-27 10:09:00', '2015-10-27 09:09:00', '', 268, 'https://pwc-int.educacio.intranet/agora/masterzer/?page_id=321', 30, 'page', '', 0),
(323, 1, '2015-07-21 08:47:10', '2015-07-21 07:47:10', 'En aquesta secció cada centre pot crear les pàgines necessàries per a descriure el seu projecte educatiu. D''acord amb la <a title="Article 91 LEC" href="http://www20.gencat.cat/portal/site/portaljuridic/menuitem.d15a4e5dfb99396dc366ec10b0c0e1a0/?vgnextoid=b85297b5a87d6210VgnVCM1000000b0c1e0aRCRD&amp;vgnextchannel=b85297b5a87d6210VgnVCM1000000b0c1e0aRCRD&amp;vgnextfmt=default&amp;action=fitxa&amp;portalId=1&amp;documentId=480169&amp;newLang=ca_ES#fragment-1182442" target="_blank">Llei d''Educació de Catalunya</a>, el projecte educatiu incorpora el caràcter propi del centre i ha de contenir com a mínim els elements següents:\r\n<ul>\r\n	<li>Criteris d''ordenació pedagògica, prioritats i plantejaments educatius, procediments d''inclusió i altres actuacions que caracteritzen el centre</li>\r\n	<li>Indicadors de progrés</li>\r\n	<li>Concreció i desenvolupament dels currículums</li>\r\n	<li>Criteris que defineixen l''estructura organitzativa</li>\r\n	<li>Projecte lingüístic</li>\r\n	<li>Caràcter propi del centre, si n''hi ha</li>\r\n</ul>\r\nEs pot incloure també en aquesta secció informació sobre les unitats i serveis especialitzats del centre (USEE, Aula d''Acollida, Aula Oberta, PIM...) així com altres documents que també formen part del projecte educatiu com ara: Projecte de Convivència, Pla d''Acció Tutorial, Pla TAC, Plans d''Acollida, Projecte d''Escola i Família, Comunitats d''Aprenentatge, etc.\r\n\r\nTambé pot ser interessant fer referència a altres projectes i activitats que es duen a terme a l''escola, com ara: Escola verda, Educació per a la salut, Mobilitza''t amb la Informàtica, Pla de reutilització de llibres de text, Programes Erasmus+, Aprenentatge servei, Aprenentatge integrat de Continguts i Llengües Estrangeres (AICLE), Revista de l''institut, Agenda 21...\r\n\r\nDonada la diversitat de seccions possibles, s''ha cregut oportú no crear cap pàgina específica en la maqueta inicial, deixant a criteri del centre la decisió sobre la millor manera d''estructurar la descripció del seu projecte educatiu. En crear els apartats és important que la caixa <em>Atributs de la pàgina</em> tingui com a pare/mare “<em>Projecte educatiu</em>“, i que se seleccioni com a plantilla l''opció “<em>Menú lateral</em>“.', 'Projecte educatiu', '', 'publish', 'closed', 'closed', '', 'projecte-educatiu', '', '', '2015-10-27 10:08:25', '2015-10-27 09:08:25', '', 270, 'https://pwc-int.educacio.intranet/agora/masterzer/?page_id=323', 30, 'page', '', 0),
(328, 1, '2015-07-21 09:15:35', '2015-07-21 08:15:35', ' ', '', '', 'publish', 'open', 'open', '', '328', '', '', '2015-07-31 16:19:52', '2015-07-31 15:19:52', '', 270, 'https://pwc-int.educacio.intranet/agora/masterzer/?p=328', 61, 'nav_menu_item', '', 0),
(330, 1, '2015-07-21 09:15:35', '2015-07-21 08:15:35', ' ', '', '', 'publish', 'open', 'open', '', '330', '', '', '2015-07-31 16:19:52', '2015-07-31 15:19:52', '', 268, 'https://pwc-int.educacio.intranet/agora/masterzer/?p=330', 48, 'nav_menu_item', '', 0),
(331, 1, '2015-07-21 09:21:18', '2015-07-21 08:21:18', ' ', '', '', 'publish', 'open', 'open', '', '331', '', '', '2015-07-31 16:19:51', '2015-07-31 15:19:51', '', 264, 'https://pwc-int.educacio.intranet/agora/masterzer/?p=331', 18, 'nav_menu_item', '', 0),
(332, 1, '2015-07-21 09:21:18', '2015-07-21 08:21:18', ' ', '', '', 'publish', 'open', 'open', '', '332', '', '', '2015-07-31 16:19:52', '2015-07-31 15:19:52', '', 266, 'https://pwc-int.educacio.intranet/agora/masterzer/?p=332', 35, 'nav_menu_item', '', 0),
(333, 1, '2015-07-21 10:24:15', '2015-07-21 09:24:15', 'Calendari amb els esdeveniments, festes, tasques etc.\r\n\r\n[calendar id="514"]\r\n<h5>Agenda en format llista</h5>\r\n[calendar id="593"]', 'Calendari escolar', '', 'publish', 'closed', 'closed', '', 'calendari-escolar', '', '', '2016-09-16 13:38:54', '2016-09-16 11:38:54', '', 264, 'https://pwc-int.educacio.intranet/agora/masterzer/?page_id=333', 40, 'page', '', 0),
(335, 1, '2015-07-21 10:24:38', '2015-07-21 09:24:38', 'Calendari amb els esdeveniments, festes, tasques etc.\r\n\r\n[calendar id="515"]\r\n<h5>Agenda en format llista</h5>\r\n[calendar id="594"]', 'Calendari escolar', '', 'publish', 'closed', 'closed', '', 'calendari-escolar', '', '', '2016-09-16 13:37:26', '2016-09-16 11:37:26', '', 266, 'https://pwc-int.educacio.intranet/agora/masterzer/?page_id=335', 40, 'page', '', 0),
(337, 1, '2015-07-21 15:18:59', '2015-07-21 14:18:59', ' ', '', '', 'publish', 'open', 'open', '', '337', '', '', '2015-07-31 16:19:52', '2015-07-31 15:19:52', '', 266, 'https://pwc-int.educacio.intranet/agora/masterzer/?p=337', 36, 'nav_menu_item', '', 0),
(338, 1, '2015-07-21 15:18:58', '2015-07-21 14:18:58', ' ', '', '', 'publish', 'open', 'open', '', '338', '', '', '2015-07-31 16:19:51', '2015-07-31 15:19:51', '', 264, 'https://pwc-int.educacio.intranet/agora/masterzer/?p=338', 19, 'nav_menu_item', '', 0),
(340, 1, '2015-07-21 15:41:54', '2015-07-21 14:41:54', ' ', '', '', 'publish', 'open', 'open', '', '340', '', '', '2015-07-31 16:19:51', '2015-07-31 15:19:51', '', 59, 'https://pwc-int.educacio.intranet/agora/masterzer/?p=340', 21, 'nav_menu_item', '', 0),
(341, 1, '2015-07-21 15:41:54', '2015-07-21 14:41:54', ' ', '', '', 'publish', 'open', 'open', '', '341', '', '', '2015-07-31 16:19:51', '2015-07-31 15:19:51', '', 59, 'https://pwc-int.educacio.intranet/agora/masterzer/?p=341', 22, 'nav_menu_item', '', 0),
(342, 1, '2015-07-21 15:41:54', '2015-07-21 14:41:54', ' ', '', '', 'publish', 'open', 'open', '', '342', '', '', '2015-07-31 16:19:51', '2015-07-31 15:19:51', '', 59, 'https://pwc-int.educacio.intranet/agora/masterzer/?p=342', 23, 'nav_menu_item', '', 0),
(343, 1, '2015-07-21 15:41:54', '2015-07-21 14:41:54', ' ', '', '', 'publish', 'open', 'open', '', '343', '', '', '2015-07-31 16:19:51', '2015-07-31 15:19:51', '', 59, 'https://pwc-int.educacio.intranet/agora/masterzer/?p=343', 24, 'nav_menu_item', '', 0),
(344, 1, '2015-07-21 15:41:54', '2015-07-21 14:41:54', ' ', '', '', 'publish', 'open', 'open', '', '344', '', '', '2015-07-31 16:19:51', '2015-07-31 15:19:51', '', 59, 'https://pwc-int.educacio.intranet/agora/masterzer/?p=344', 25, 'nav_menu_item', '', 0),
(345, 1, '2015-07-21 15:41:54', '2015-07-21 14:41:54', ' ', '', '', 'publish', 'open', 'open', '', '345', '', '', '2015-07-31 16:19:51', '2015-07-31 15:19:51', '', 59, 'https://pwc-int.educacio.intranet/agora/masterzer/?p=345', 26, 'nav_menu_item', '', 0),
(346, 1, '2015-07-21 15:41:54', '2015-07-21 14:41:54', ' ', '', '', 'publish', 'open', 'open', '', '346', '', '', '2015-07-31 16:19:51', '2015-07-31 15:19:51', '', 59, 'https://pwc-int.educacio.intranet/agora/masterzer/?p=346', 27, 'nav_menu_item', '', 0),
(347, 1, '2015-07-21 15:41:54', '2015-07-21 14:41:54', ' ', '', '', 'publish', 'open', 'open', '', '347', '', '', '2015-07-31 16:19:51', '2015-07-31 15:19:51', '', 59, 'https://pwc-int.educacio.intranet/agora/masterzer/?p=347', 28, 'nav_menu_item', '', 0),
(348, 1, '2015-07-21 15:41:54', '2015-07-21 14:41:54', ' ', '', '', 'publish', 'open', 'open', '', '348', '', '', '2015-07-31 16:19:51', '2015-07-31 15:19:51', '', 59, 'https://pwc-int.educacio.intranet/agora/masterzer/?p=348', 29, 'nav_menu_item', '', 0),
(349, 1, '2015-07-21 15:43:29', '2015-07-21 14:43:29', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi nulla enim, placerat id metus vitae, vulputate luctus mi. Fusce lacinia risus ut nunc viverra, vel auctor mauris suscipit. Ut ipsum turpis, faucibus et lectus et, porttitor eleifend metus. Sed ornare, mi in mattis volutpat, ipsum lorem rutrum lorem, vel luctus mauris nisi sit amet tortor. Donec ac consectetur sem. Ut convallis tellus in tortor tempor, id bibendum enim maximus. Cras eu ullamcorper nisi. Cras blandit consectetur augue sit amet consectetur.', 'Transport escolar', '', 'publish', 'closed', 'closed', '', 'transport-escolar', '', '', '2015-10-27 10:07:21', '2015-10-27 09:07:21', '', 264, 'https://pwc-int.educacio.intranet/agora/masterzer/?page_id=349', 60, 'page', '', 0),
(353, 1, '2015-07-21 15:45:56', '2015-07-21 14:45:56', '', 'Transport', '', 'publish', 'open', 'open', '', '353', '', '', '2015-07-31 16:19:51', '2015-07-31 15:19:51', '', 264, 'https://pwc-int.educacio.intranet/agora/masterzer/?p=353', 30, 'nav_menu_item', '', 0),
(354, 1, '2015-07-21 15:55:03', '2015-07-21 14:55:03', 'Descripció dels grups d''alumnes. Nombre, distribució etc.\r\n<h4>Blogs</h4>\r\n<ul>\r\n	<li><a href="https://pwc-int.educacio.intranet/agora/masterzer/categoria/escola-alfa/p3/">P3</a></li>\r\n	<li><a href="https://pwc-int.educacio.intranet/agora/masterzer/categoria/escola-alfa/p4/">P4</a></li>\r\n	<li><a href="https://pwc-int.educacio.intranet/agora/masterzer/categoria/escola-alfa/p5/">P5</a></li>\r\n	<li><a href="https://pwc-int.educacio.intranet/agora/masterzer/categoria/escola-alfa/1r/">1r</a></li>\r\n	<li><a href="https://pwc-int.educacio.intranet/agora/masterzer/categoria/escola-alfa/2n/">2n</a></li>\r\n	<li><a href="https://pwc-int.educacio.intranet/agora/masterzer/categoria/escola-alfa/3r">3r</a></li>\r\n	<li><a href="https://pwc-int.educacio.intranet/agora/masterzer/categoria/escola-alfa/4t">4t</a></li>\r\n	<li><a href="https://pwc-int.educacio.intranet/agora/masterzer/categoria/escola-alfa/5e">5è</a></li>\r\n	<li><a href="https://pwc-int.educacio.intranet/agora/masterzer/categoria/escola-alfa/6e">6è</a></li>\r\n</ul>', 'Grups', '', 'publish', 'closed', 'closed', '', 'grups', '', '', '2015-10-27 10:07:18', '2015-10-27 09:07:18', '', 264, 'https://pwc-int.educacio.intranet/agora/masterzer/?page_id=354', 50, 'page', '', 0),
(357, 1, '2015-07-21 16:03:02', '2015-07-21 15:03:02', ' ', '', '', 'publish', 'open', 'open', '', '357', '', '', '2015-07-31 16:19:51', '2015-07-31 15:19:51', '', 264, 'https://pwc-int.educacio.intranet/agora/masterzer/?p=357', 20, 'nav_menu_item', '', 0),
(359, 1, '2015-07-23 09:21:21', '2015-07-23 08:21:21', 'Descripció dels grups d''alumnes. Nombre, distribució etc.\r\n<h4>Blogs</h4>\r\n<ul>\r\n	<li><a href="https://pwc-int.educacio.intranet/agora/masterzer/categoria/escola-beta/p3-p4/">P3 - P4</a></li>\r\n	<li><a href="https://pwc-int.educacio.intranet/agora/masterzer/categoria/escola-beta/p5-1r">P5 - 1r</a></li>\r\n	<li><a href="https://pwc-int.educacio.intranet/agora/masterzer/categoria/escola-beta/2n-3r/">2n - 3r</a></li>\r\n	<li><a href="https://pwc-int.educacio.intranet/agora/masterzer/categoria/escola-beta/4t-5e/">4t - 5è</a></li>\r\n	<li><a href="https://pwc-int.educacio.intranet/agora/masterzer/categoria/escola-beta/6e">6è</a></li>\r\n</ul>', 'Grups', '', 'publish', 'closed', 'closed', '', 'grups', '', '', '2015-10-27 10:07:51', '2015-10-27 09:07:51', '', 266, 'https://pwc-int.educacio.intranet/agora/masterzer/?page_id=359', 50, 'page', '', 0),
(361, 1, '2015-07-23 09:21:58', '2015-07-23 08:21:58', ' ', '', '', 'publish', 'open', 'open', '', '361', '', '', '2015-07-31 16:19:52', '2015-07-31 15:19:52', '', 266, 'https://pwc-int.educacio.intranet/agora/masterzer/?p=361', 37, 'nav_menu_item', '', 0),
(367, 1, '2015-07-23 15:21:30', '2015-07-23 14:21:30', 'En aquesta secció hi podeu incloure:\r\n<ul>\r\n	<li>Breu descripció de l''escola (nombre de grups, alumnes etc.)</li>\r\n	<li>Història</li>\r\n	<li>Organigrama</li>\r\n	<li>Galeria de fotografies (recomanat Carrusel amb Picasa)</li>\r\n</ul>\r\n&nbsp;', 'Qui som', '', 'publish', 'closed', 'closed', '', 'qui-som', '', '', '2015-10-27 10:08:09', '2015-10-27 09:08:09', '', 270, 'https://pwc-int.educacio.intranet/agora/masterzer/?page_id=367', 10, 'page', '', 0),
(368, 1, '2015-07-23 13:33:03', '2015-07-23 12:33:03', ' ', '', '', 'publish', 'open', 'open', '', '368', '', '', '2015-07-31 16:19:52', '2015-07-31 15:19:52', '', 68, 'https://pwc-int.educacio.intranet/agora/masterzer/?p=368', 40, 'nav_menu_item', '', 0),
(369, 1, '2015-07-23 13:33:03', '2015-07-23 12:33:03', ' ', '', '', 'publish', 'open', 'open', '', '369', '', '', '2015-07-31 16:19:52', '2015-07-31 15:19:52', '', 68, 'https://pwc-int.educacio.intranet/agora/masterzer/?p=369', 41, 'nav_menu_item', '', 0),
(370, 1, '2015-07-23 13:33:03', '2015-07-23 12:33:03', ' ', '', '', 'publish', 'open', 'open', '', '370', '', '', '2015-07-31 16:19:52', '2015-07-31 15:19:52', '', 68, 'https://pwc-int.educacio.intranet/agora/masterzer/?p=370', 42, 'nav_menu_item', '', 0),
(371, 1, '2015-07-23 13:33:03', '2015-07-23 12:33:03', ' ', '', '', 'publish', 'open', 'open', '', '371', '', '', '2015-07-31 16:19:52', '2015-07-31 15:19:52', '', 68, 'https://pwc-int.educacio.intranet/agora/masterzer/?p=371', 38, 'nav_menu_item', '', 0),
(372, 1, '2015-07-23 13:33:03', '2015-07-23 12:33:03', ' ', '', '', 'publish', 'open', 'open', '', '372', '', '', '2015-07-31 16:19:52', '2015-07-31 15:19:52', '', 68, 'https://pwc-int.educacio.intranet/agora/masterzer/?p=372', 39, 'nav_menu_item', '', 0),
(378, 1, '2015-07-23 13:43:46', '2015-07-23 12:43:46', ' ', '', '', 'publish', 'open', 'open', '', '378', '', '', '2015-07-31 16:19:52', '2015-07-31 15:19:52', '', 70, 'https://pwc-int.educacio.intranet/agora/masterzer/?p=378', 68, 'nav_menu_item', '', 0),
(379, 1, '2015-07-23 13:52:32', '2015-07-23 12:52:32', ' ', '', '', 'publish', 'open', 'open', '', '379', '', '', '2015-07-31 16:19:52', '2015-07-31 15:19:52', '', 70, 'https://pwc-int.educacio.intranet/agora/masterzer/?p=379', 66, 'nav_menu_item', '', 0),
(380, 1, '2015-07-23 13:52:32', '2015-07-23 12:52:32', ' ', '', '', 'publish', 'open', 'open', '', '380', '', '', '2015-07-31 16:19:52', '2015-07-31 15:19:52', '', 70, 'https://pwc-int.educacio.intranet/agora/masterzer/?p=380', 67, 'nav_menu_item', '', 0),
(381, 1, '2015-07-23 13:52:32', '2015-07-23 12:52:32', ' ', '', '', 'publish', 'open', 'open', '', '381', '', '', '2015-07-31 16:19:52', '2015-07-31 15:19:52', '', 70, 'https://pwc-int.educacio.intranet/agora/masterzer/?p=381', 64, 'nav_menu_item', '', 0),
(382, 1, '2015-07-23 13:52:32', '2015-07-23 12:52:32', ' ', '', '', 'publish', 'open', 'open', '', '382', '', '', '2015-07-31 16:19:52', '2015-07-31 15:19:52', '', 70, 'https://pwc-int.educacio.intranet/agora/masterzer/?p=382', 65, 'nav_menu_item', '', 0),
(383, 1, '2015-07-23 15:09:04', '2015-07-23 14:09:04', 'Phasellus ac diam sem. Etiam ut finibus quam. Sed quam felis, maximus vitae mollis id, tristique non dui. Nullam nisl libero, commodo at laoreet id, condimentum ac sapien. Vivamus suscipit neque id nulla vestibulum, et efficitur lectus tristique. Ut quis ipsum laoreet, consequat ipsum non, tincidunt ipsum. Etiam volutpat cursus faucibus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Donec a porta justo, sit amet venenatis diam. Ut eget ullamcorper leo, nec rhoncus ex. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vivamus porttitor mauris nec justo scelerisque, posuere dapibus ligula molestie. Curabitur in metus quam.', 'Grups', '', 'publish', 'closed', 'closed', '', 'grups', '', '', '2015-10-27 10:08:34', '2015-10-27 09:08:34', '', 270, 'https://pwc-int.educacio.intranet/agora/masterzer/?page_id=383', 50, 'page', '', 0),
(385, 1, '2015-07-23 15:09:46', '2015-07-23 14:09:46', 'Descripció dels grups d''alumnes. Nombre, distribució etc.\r\n<h4>Blogs</h4>\r\n<ul>\r\n	<li><a href="https://pwc-int.educacio.intranet/agora/masterzer/categoria/escola-gamma/p3-p4/">P3 - P4</a></li>\r\n	<li><a href="https://pwc-int.educacio.intranet/agora/masterzer/categoria/escola-gamma/p5-1r">P5 - 1r</a></li>\r\n	<li><a href="https://pwc-int.educacio.intranet/agora/masterzer/categoria/escola-gamma/2n-3r/">2n - 3r</a></li>\r\n	<li><a href="https://pwc-int.educacio.intranet/agora/masterzer/categoria/escola-gamma/4t-5e/">4t - 5è</a></li>\r\n	<li><a href="https://pwc-int.educacio.intranet/agora/masterzer/categoria/escola-gamma/6e">6è</a></li>\r\n</ul>', 'Grups', '', 'publish', 'closed', 'closed', '', 'grups', '', '', '2015-10-27 10:09:07', '2015-10-27 09:09:07', '', 268, 'https://pwc-int.educacio.intranet/agora/masterzer/?page_id=385', 50, 'page', '', 0),
(387, 1, '2015-07-23 15:13:59', '2015-07-23 14:13:59', ' ', '', '', 'publish', 'open', 'open', '', '387', '', '', '2015-07-31 16:19:52', '2015-07-31 15:19:52', '', 270, 'https://pwc-int.educacio.intranet/agora/masterzer/?p=387', 63, 'nav_menu_item', '', 0),
(391, 1, '2015-07-23 15:23:48', '2015-07-23 14:23:48', ' ', '', '', 'publish', 'open', 'open', '', '391', '', '', '2015-07-31 16:19:52', '2015-07-31 15:19:52', '', 270, 'https://pwc-int.educacio.intranet/agora/masterzer/?p=391', 59, 'nav_menu_item', '', 0),
(392, 1, '2015-07-23 15:23:48', '2015-07-23 14:23:48', ' ', '', '', 'publish', 'open', 'open', '', '392', '', '', '2015-07-31 16:19:52', '2015-07-31 15:19:52', '', 270, 'https://pwc-int.educacio.intranet/agora/masterzer/?p=392', 60, 'nav_menu_item', '', 0),
(393, 1, '2015-07-23 15:24:36', '2015-07-23 14:24:36', 'Calendari amb els esdeveniments, festes, tasques etc.\r\n\r\n[calendar id="517"]\r\n<h5>Agenda en format llista</h5>\r\n[calendar id="596"]', 'Calendari escolar', '', 'publish', 'closed', 'closed', '', 'calendari-escolar', '', '', '2016-09-16 13:41:07', '2016-09-16 11:41:07', '', 270, 'https://pwc-int.educacio.intranet/agora/masterzer/?page_id=393', 40, 'page', '', 0),
(395, 1, '2015-07-23 15:25:08', '2015-07-23 14:25:08', ' ', '', '', 'publish', 'open', 'open', '', '395', '', '', '2015-07-31 16:19:52', '2015-07-31 15:19:52', '', 270, 'https://pwc-int.educacio.intranet/agora/masterzer/?p=395', 62, 'nav_menu_item', '', 0),
(396, 1, '2015-07-23 15:26:30', '2015-07-23 14:26:30', 'En aquesta secció hi podeu incloure:\r\n<ul>\r\n	<li>Breu descripció de l''escola (nombre de grups, alumnes etc.)</li>\r\n	<li>Història</li>\r\n	<li>Organigrama</li>\r\n	<li>Galeria de fotografies (recomanat Carrusel amb Picasa)</li>\r\n</ul>\r\n&nbsp;', 'Qui som', '', 'publish', 'closed', 'closed', '', 'qui-som', '', '', '2015-10-27 10:08:52', '2015-10-27 09:08:52', '', 268, 'https://pwc-int.educacio.intranet/agora/masterzer/?page_id=396', 10, 'page', '', 0),
(398, 1, '2015-07-23 15:26:52', '2015-07-23 14:26:52', '<p style="color: #666666;"><strong>Escola Beta</strong>\r\nPlaça de la Vila, 14\r\n01234 Abella de Xerta\r\n<a href="mailto:bustia@esc-gamma.cat">bustia@esc-gamma.cat</a></p>\r\n<iframe style="border: 0;" src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d95122.2542300733!2d1.53775!3d41.837547!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sca!2sus!4v1410948001907" width="600" height="450" frameborder="0"></iframe>\r\n\r\n<strong>Com arribar-hi:\r\n</strong>\r\n<ul>\r\n	<li>En tren: Estació Abella centre de la línia 1</li>\r\n	<li>En bus: Línies L3 i L5</li>\r\n</ul>\r\n&nbsp;', 'On som', '', 'publish', 'closed', 'closed', '', 'on-som', '', '', '2015-10-27 10:08:57', '2015-10-27 09:08:57', '', 268, 'https://pwc-int.educacio.intranet/agora/masterzer/?page_id=398', 20, 'page', '', 0),
(400, 1, '2015-07-23 15:27:41', '2015-07-23 14:27:41', 'Calendari amb els esdeveniments, festes, tasques etc.\r\n\r\n[calendar id="516"]\r\n<h5>Agenda en format llista</h5>\r\n[calendar id="595"]', 'Calendari escolar', '', 'publish', 'closed', 'closed', '', 'calendari-escolar', '', '', '2016-09-16 13:39:53', '2016-09-16 11:39:53', '', 268, 'https://pwc-int.educacio.intranet/agora/masterzer/?page_id=400', 40, 'page', '', 0),
(402, 1, '2015-07-23 15:30:10', '2015-07-23 14:30:10', ' ', '', '', 'publish', 'open', 'open', '', '402', '', '', '2015-07-31 16:19:52', '2015-07-31 15:19:52', '', 268, 'https://pwc-int.educacio.intranet/agora/masterzer/?p=402', 50, 'nav_menu_item', '', 0),
(403, 1, '2015-07-23 15:30:09', '2015-07-23 14:30:09', ' ', '', '', 'publish', 'open', 'open', '', '403', '', '', '2015-07-31 16:19:52', '2015-07-31 15:19:52', '', 268, 'https://pwc-int.educacio.intranet/agora/masterzer/?p=403', 46, 'nav_menu_item', '', 0),
(404, 1, '2015-07-23 15:30:09', '2015-07-23 14:30:09', ' ', '', '', 'publish', 'open', 'open', '', '404', '', '', '2015-07-31 16:19:52', '2015-07-31 15:19:52', '', 268, 'https://pwc-int.educacio.intranet/agora/masterzer/?p=404', 47, 'nav_menu_item', '', 0),
(405, 1, '2015-07-23 15:30:09', '2015-07-23 14:30:09', ' ', '', '', 'publish', 'open', 'open', '', '405', '', '', '2015-07-31 16:19:52', '2015-07-31 15:19:52', '', 268, 'https://pwc-int.educacio.intranet/agora/masterzer/?p=405', 49, 'nav_menu_item', '', 0),
(406, 1, '2015-07-23 15:34:21', '2015-07-23 14:34:21', ' ', '', '', 'publish', 'open', 'open', '', '406', '', '', '2015-07-31 16:19:52', '2015-07-31 15:19:52', '', 69, 'https://pwc-int.educacio.intranet/agora/masterzer/?p=406', 53, 'nav_menu_item', '', 0),
(407, 1, '2015-07-23 15:34:21', '2015-07-23 14:34:21', ' ', '', '', 'publish', 'open', 'open', '', '407', '', '', '2015-07-31 16:19:52', '2015-07-31 15:19:52', '', 69, 'https://pwc-int.educacio.intranet/agora/masterzer/?p=407', 54, 'nav_menu_item', '', 0),
(408, 1, '2015-07-23 15:34:21', '2015-07-23 14:34:21', ' ', '', '', 'publish', 'open', 'open', '', '408', '', '', '2015-07-31 16:19:52', '2015-07-31 15:19:52', '', 69, 'https://pwc-int.educacio.intranet/agora/masterzer/?p=408', 55, 'nav_menu_item', '', 0),
(409, 1, '2015-07-23 15:34:21', '2015-07-23 14:34:21', ' ', '', '', 'publish', 'open', 'open', '', '409', '', '', '2015-07-31 16:19:52', '2015-07-31 15:19:52', '', 69, 'https://pwc-int.educacio.intranet/agora/masterzer/?p=409', 51, 'nav_menu_item', '', 0),
(410, 1, '2015-07-23 15:34:21', '2015-07-23 14:34:21', ' ', '', '', 'publish', 'open', 'open', '', '410', '', '', '2015-07-31 16:19:52', '2015-07-31 15:19:52', '', 69, 'https://pwc-int.educacio.intranet/agora/masterzer/?p=410', 52, 'nav_menu_item', '', 0),
(411, 1, '2015-07-23 15:36:01', '2015-07-23 14:36:01', 'Phasellus ac diam sem. Etiam ut finibus quam. Sed quam felis, maximus vitae mollis id, tristique non dui. Nullam nisl libero, commodo at laoreet id, condimentum ac sapien. Vivamus suscipit neque id nulla vestibulum, et efficitur lectus tristique. Ut quis ipsum laoreet, consequat ipsum non, tincidunt ipsum. Etiam volutpat cursus faucibus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Donec a porta justo, sit amet venenatis diam. Ut eget ullamcorper leo, nec rhoncus ex. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vivamus porttitor mauris nec justo scelerisque, posuere dapibus ligula molestie. Curabitur in metus quam.', 'Transport escolar', '', 'publish', 'closed', 'closed', '', 'transport-escolar', '', '', '2015-10-27 10:07:55', '2015-10-27 09:07:55', '', 266, 'https://pwc-int.educacio.intranet/agora/masterzer/?page_id=411', 60, 'page', '', 0),
(414, 1, '2015-07-23 15:36:38', '2015-07-23 14:36:38', 'Phasellus ac diam sem. Etiam ut finibus quam. Sed quam felis, maximus vitae mollis id, tristique non dui. Nullam nisl libero, commodo at laoreet id, condimentum ac sapien. Vivamus suscipit neque id nulla vestibulum, et efficitur lectus tristique. Ut quis ipsum laoreet, consequat ipsum non, tincidunt ipsum. Etiam volutpat cursus faucibus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Donec a porta justo, sit amet venenatis diam. Ut eget ullamcorper leo, nec rhoncus ex. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vivamus porttitor mauris nec justo scelerisque, posuere dapibus ligula molestie. Curabitur in metus quam.', 'Transport escolar', '', 'publish', 'closed', 'closed', '', 'transport-escolar', '', '', '2015-10-27 10:08:38', '2015-10-27 09:08:38', '', 270, 'https://pwc-int.educacio.intranet/agora/masterzer/?page_id=414', 60, 'page', '', 0),
(417, 1, '2015-07-23 15:37:28', '2015-07-23 14:37:28', 'Phasellus ac diam sem. Etiam ut finibus quam. Sed quam felis, maximus vitae mollis id, tristique non dui. Nullam nisl libero, commodo at laoreet id, condimentum ac sapien. Vivamus suscipit neque id nulla vestibulum, et efficitur lectus tristique. Ut quis ipsum laoreet, consequat ipsum non, tincidunt ipsum. Etiam volutpat cursus faucibus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Donec a porta justo, sit amet venenatis diam. Ut eget ullamcorper leo, nec rhoncus ex. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vivamus porttitor mauris nec justo scelerisque, posuere dapibus ligula molestie. Curabitur in metus quam.', 'Transport escolar', '', 'publish', 'closed', 'closed', '', 'transport-escolar', '', '', '2015-10-27 10:10:12', '2015-10-27 09:10:12', '', 268, 'https://pwc-int.educacio.intranet/agora/masterzer/?page_id=417', 60, 'page', '', 0),
(419, 1, '2015-07-23 15:38:30', '2015-07-23 14:38:30', '', 'Transport', '', 'publish', 'open', 'open', '', '419', '', '', '2015-07-31 16:19:52', '2015-07-31 15:19:52', '', 266, 'https://pwc-int.educacio.intranet/agora/masterzer/?p=419', 43, 'nav_menu_item', '', 0),
(420, 1, '2015-07-23 15:39:07', '2015-07-23 14:39:07', '', 'Transport', '', 'publish', 'open', 'open', '', '420', '', '', '2015-07-31 16:19:52', '2015-07-31 15:19:52', '', 268, 'https://pwc-int.educacio.intranet/agora/masterzer/?p=420', 56, 'nav_menu_item', '', 0),
(421, 1, '2015-07-23 15:51:37', '2015-07-23 14:51:37', '', 'Transport', '', 'publish', 'open', 'open', '', '421', '', '', '2015-07-31 16:19:52', '2015-07-31 15:19:52', '', 270, 'https://pwc-int.educacio.intranet/agora/masterzer/?p=421', 69, 'nav_menu_item', '', 0),
(422, 1, '2015-07-24 14:25:59', '2015-07-24 13:25:59', '', 'zer1', '', 'inherit', 'open', 'open', '', 'zer1', '', '', '2015-07-24 16:42:56', '2015-07-24 15:42:56', '', 268, 'https://pwc-int.educacio.intranet/agora/masterzer/wp-content/uploads/usu10/2015/07/zer1.jpg', 0, 'attachment', 'image/jpeg', 0),
(423, 1, '2015-07-24 14:27:07', '2015-07-24 13:27:07', '', 'zer1', '', 'inherit', 'open', 'open', '', 'zer1-2', '', '', '2015-07-24 16:44:00', '2015-07-24 15:44:00', '', 270, 'https://pwc-int.educacio.intranet/agora/masterzer/wp-content/uploads/usu10/2015/07/zer1.png', 0, 'attachment', 'image/png', 0),
(424, 1, '2015-07-24 14:27:45', '2015-07-24 13:27:45', '', 'Escola Gamma', '', 'inherit', 'open', 'open', '', 'zer4', '', '', '2015-07-24 16:41:38', '2015-07-24 15:41:38', '', 264, 'https://pwc-int.educacio.intranet/agora/masterzer/wp-content/uploads/usu10/2015/07/zer4.jpg', 0, 'attachment', 'image/jpeg', 0),
(425, 1, '2015-07-24 14:28:33', '2015-07-24 13:28:33', '', 'zer5', '', 'inherit', 'open', 'open', '', 'zer5', '', '', '2015-07-24 16:38:07', '2015-07-24 15:38:07', '', 266, 'https://pwc-int.educacio.intranet/agora/masterzer/wp-content/uploads/usu10/2015/07/zer5.jpg', 0, 'attachment', 'image/jpeg', 0),
(426, 1, '2015-07-24 14:45:35', '2015-07-24 13:45:35', '<strong>Pots veure les últimes notícies de l''AMPA de l''escola Alfa <a href="https://pwc-int.educacio.intranet/agora/masterzer/categoria/escola-alfa/ampa-escola-alfa/">aquí</a>.</strong>\r\n\r\nL’AMPA és l’entitat que agrupa a les mares i els pares d’alumnes de l’Escola per a la defensa dels seus interessos en tot allò que fa referència a l’educació dels nens i nenes i col·labora en el funcionament del centre.\r\nÉs una entitat constituïda com associació sense ànim de lucre. Està regulada per uns estatuts i s’organitza a través de: La Junta Directiva i l’Assemblea General.\r\nL''objectiu fonamental de l''AMPA és contribuir a la millora de la qualitat de l''ensenyament que reben els nostres fills i filles.\r\n\r\n<a href="https://pwc-int.educacio.intranet/agora/masterzer/wp-content/uploads/usu10/2014/09/ampa.png"><img class=" size-medium wp-image-185 aligncenter" src="https://pwc-int.educacio.intranet/agora/masterzer/wp-content/uploads/usu10/2014/09/ampa-300x120.png" alt="ampa" width="300" height="120" /></a>\r\n\r\nAlgunes de les tasques que es fan són:\r\n<ul>\r\n	<li>Promoure la participació de pares i mares dels alumnes: Castanyada, Xocolatada per Nadal, Jocs Florals, Festa Setmana Cultural, Colla Gegantera…</li>\r\n	<li>Promoure la representació i la participació dels pares i mares dels alumnes en el Consell Escolar.</li>\r\n	<li>Col·labora en les activitats educatives, organitza i gestiona les activitats extraescolars i el menjador de l’Escola.</li>\r\n	<li>Venda de roba i llibres de text.</li>\r\n	<li>Col·labora en el Projecte per a la Reutilització i Socialització de llibres.</li>\r\n	<li>Ajuda al finançament d’aquelles activitats o equipaments que el centre necessita: Festa de l’Escola, Biblioteca d’Anglès, samarretes per als Jocs Esportius i Fem dansa, l’autocar per participar a la Cantània, un mirall per fer ball, projecte de robòtica, etc.</li>\r\n</ul>\r\n<h6>Qui és de l’AMPA?</h6>\r\nL’Associació està formada per les famílies que s’han inscrit com a sòcies. L’actual Junta està formada per:\r\n<ul>\r\n	<li>Presidència: &lt;Nom&gt;</li>\r\n	<li>Vicepresidència: &lt;Nom&gt;</li>\r\n	<li>Secretaria:&lt;Nom&gt;</li>\r\n	<li>Tresoreria:&lt;Nom&gt;</li>\r\n</ul>\r\nA més, hi ha els vocals que formen diferents grups de treball.\r\nLa quota, que es paga per família, és de &lt;Preu&gt;€.\r\n<h6>Horari d’atenció de l’AMPA</h6>\r\n<ul>\r\n	<li>Dilluns i dimecres de 00h. a 00h.</li>\r\n	<li>Dimarts i dijous de 00h. a 00h.</li>\r\n</ul>\r\n<h6>Contactar</h6>\r\n<ul>\r\n	<li>Telèfon: 123 456 78</li>\r\n	<li>Correu electrònic: ampa@esc-alfa.cat</li>\r\n</ul>', 'AMPA', '', 'publish', 'closed', 'closed', '', 'ampa', '', '', '2015-10-27 10:07:26', '2015-10-27 09:07:26', '', 264, 'https://pwc-int.educacio.intranet/agora/masterzer/?page_id=426', 70, 'page', '', 0),
(435, 1, '2015-07-24 15:14:37', '2015-07-24 14:14:37', '<strong>Pots veure les últimes notícies de l''AMPA de l''escola Beta <a href="https://pwc-int.educacio.intranet/agora/masterzer/categoria/escola-beta/ampa-escola-beta/">aquí</a>.</strong>\r\n\r\nL’AMPA és l’entitat que agrupa a les mares i els pares d’alumnes de l’Escola per a la defensa dels seus interessos en tot allò que fa referència a l’educació dels nens i nenes i col·labora en el funcionament del centre.\r\nÉs una entitat constituïda com associació sense ànim de lucre. Està regulada per uns estatuts i s’organitza a través de: La Junta Directiva i l’Assemblea General.\r\nL''objectiu fonamental de l''AMPA és contribuir a la millora de la qualitat de l''ensenyament que reben els nostres fills i filles.\r\n\r\n<a href="https://pwc-int.educacio.intranet/agora/masterzer/wp-content/uploads/usu10/2014/09/ampa.png"><img class=" size-medium wp-image-185 aligncenter" src="https://pwc-int.educacio.intranet/agora/masterzer/wp-content/uploads/usu10/2014/09/ampa-300x120.png" alt="ampa" width="300" height="120" /></a>\r\n\r\nAlgunes de les tasques que es fan són:\r\n<ul>\r\n	<li>Promoure la participació de pares i mares dels alumnes: Castanyada, Xocolatada per Nadal, Jocs Florals, Festa Setmana Cultural, Colla Gegantera…</li>\r\n	<li>Promoure la representació i la participació dels pares i mares dels alumnes en el Consell Escolar.</li>\r\n	<li>Col·labora en les activitats educatives, organitza i gestiona les activitats extraescolars i el menjador de l’Escola.</li>\r\n	<li>Venda de roba i llibres de text.</li>\r\n	<li>Col·labora en el Projecte per a la Reutilització i Socialització de llibres.</li>\r\n	<li>Ajuda al finançament d’aquelles activitats o equipaments que el centre necessita: Festa de l’Escola, Biblioteca d’Anglès, samarretes per als Jocs Esportius i Fem dansa, l’autocar per participar a la Cantània, un mirall per fer ball, projecte de robòtica, etc.</li>\r\n</ul>\r\n<h6>Qui és de l’AMPA?</h6>\r\nL’Associació està formada per les famílies que s’han inscrit com a sòcies. L’actual Junta està formada per:\r\n<ul>\r\n	<li>Presidència: &lt;Nom&gt;</li>\r\n	<li>Vicepresidència: &lt;Nom&gt;</li>\r\n	<li>Secretaria:&lt;Nom&gt;</li>\r\n	<li>Tresoreria:&lt;Nom&gt;</li>\r\n</ul>\r\nA més, hi ha els vocals que formen diferents grups de treball.\r\nLa quota, que es paga per família, és de &lt;Preu&gt;€.\r\n<h6>Horari d’atenció de l’AMPA</h6>\r\n<ul>\r\n	<li>Dilluns i dimecres de 00h. a 00h.</li>\r\n	<li>Dimarts i dijous de 00h. a 00h.</li>\r\n</ul>\r\n<h6>Contactar</h6>\r\n<ul>\r\n	<li>Telèfon: 123 456 78</li>\r\n	<li>Correu electrònic: ampa@esc-beta.cat</li>\r\n</ul>', 'AMPA', '', 'publish', 'closed', 'closed', '', 'ampa', '', '', '2015-10-27 10:07:59', '2015-10-27 09:07:59', '', 266, 'https://pwc-int.educacio.intranet/agora/masterzer/?page_id=435', 70, 'page', '', 0),
(440, 1, '2015-07-24 15:31:14', '2015-07-24 14:31:14', '<span style="color: #ff0000;">Aquest apartat només s''ha d''incloure si les escoles formen part d''una AMPA comuna. En aquest cas, s''haurien de treure els elements AMPA de cadascuna de les escoles que formen part de la ZER.</span>\r\n\r\n<strong>Pots veure les últimes notícies de l''AMPA  <a href="https://pwc-int.educacio.intranet/agora/masterzer/categoria/ampa/">aquí</a>.</strong>\r\n\r\nL’AMPA és l’entitat que agrupa a les mares i els pares d’alumnes de l’Escola per a la defensa dels seus interessos en tot allò que fa referència a l’educació dels nens i nenes i col·labora en el funcionament del centre.\r\nÉs una entitat constituïda com associació sense ànim de lucre. Està regulada per uns estatuts i s’organitza a través de: La Junta Directiva i l’Assemblea General.\r\nL''objectiu fonamental de l''AMPA és contribuir a la millora de la qualitat de l''ensenyament que reben els nostres fills i filles.\r\n\r\n<a href="https://pwc-int.educacio.intranet/agora/masterzer/wp-content/uploads/usu10/2014/09/ampa.png"><img class=" size-medium wp-image-185 aligncenter" src="https://pwc-int.educacio.intranet/agora/masterzer/wp-content/uploads/usu10/2014/09/ampa-300x120.png" alt="ampa" width="300" height="120" /></a>\r\n\r\nAlgunes de les tasques que es fan són:\r\n<ul>\r\n	<li>Promoure la participació de pares i mares dels alumnes: Castanyada, Xocolatada per Nadal, Jocs Florals, Festa Setmana Cultural, Colla Gegantera…</li>\r\n	<li>Promoure la representació i la participació dels pares i mares dels alumnes en el Consell Escolar.</li>\r\n	<li>Col·labora en les activitats educatives, organitza i gestiona les activitats extraescolars i el menjador de l’Escola.</li>\r\n	<li>Venda de roba i llibres de text.</li>\r\n	<li>Col·labora en el Projecte per a la Reutilització i Socialització de llibres.</li>\r\n	<li>Ajuda al finançament d’aquelles activitats o equipaments que el centre necessita: Festa de l’Escola, Biblioteca d’Anglès, samarretes per als Jocs Esportius i Fem dansa, l’autocar per participar a la Cantània, un mirall per fer ball, projecte de robòtica, etc.</li>\r\n</ul>\r\n<h6>Qui és de l’AMPA?</h6>\r\nL’Associació està formada per les famílies que s’han inscrit com a sòcies. L’actual Junta està formada per:\r\n<ul>\r\n	<li>Presidència: &lt;Nom&gt;</li>\r\n	<li>Vicepresidència: &lt;Nom&gt;</li>\r\n	<li>Secretaria:&lt;Nom&gt;</li>\r\n	<li>Tresoreria:&lt;Nom&gt;</li>\r\n</ul>\r\nA més, hi ha els vocals que formen diferents grups de treball.\r\nLa quota, que es paga per família, és de &lt;Preu&gt;€.\r\n<h6>Horari d’atenció de l’AMPA</h6>\r\n<ul>\r\n	<li>Dilluns i dimecres de 00h. a 00h.</li>\r\n	<li>Dimarts i dijous de 00h. a 00h.</li>\r\n</ul>\r\n<h6>Contactar</h6>\r\n<ul>\r\n	<li>Telèfon: 123 456 78</li>\r\n	<li>Correu electrònic: ampa@zer-larany.cat</li>\r\n</ul>', 'AMPA', '', 'publish', 'closed', 'closed', '', 'ampa', '', '', '2015-10-27 10:10:55', '2015-10-27 09:10:55', '', 19, 'https://pwc-int.educacio.intranet/agora/masterzer/?page_id=440', 90, 'page', '', 0),
(442, 1, '2015-07-24 15:32:22', '2015-07-24 14:32:22', ' ', '', '', 'publish', 'open', 'open', '', '442', '', '', '2015-07-31 16:19:51', '2015-07-31 15:19:51', '', 19, 'https://pwc-int.educacio.intranet/agora/masterzer/?p=442', 14, 'nav_menu_item', '', 0),
(448, 1, '2015-07-24 15:50:21', '2015-07-24 14:50:21', 'En aquesta secció podeu enllaçar els documents més significatius relacionat amb les escoles de la ZER.\r\n<ul>\r\n	<li><a href="#" target="_blank">Document 1</a></li>\r\n	<li><a href="#" target="_blank">Document 2</a></li>\r\n	<li><a href="#" target="_blank">Document 3</a></li>\r\n	<li><a href="https://pwc-int.educacio.intranet/agora/masterzer/docs/">Llista completa de documents</a></li>\r\n</ul>', 'Documents', '', 'publish', 'closed', 'closed', '', 'documents', '', '', '2015-10-27 10:10:51', '2015-10-27 09:10:51', '', 19, 'https://pwc-int.educacio.intranet/agora/masterzer/?page_id=448', 70, 'page', '', 0),
(451, 1, '2015-07-24 15:53:14', '2015-07-24 14:53:14', 'Node de l&#039;escola Alfa', 'Escola Alfa', '', 'private', 'closed', 'open', '', 'escola-alfa', '', '', '2015-07-24 15:53:14', '2015-07-24 14:53:14', '', 0, 'https://pwc-int.educacio.intranet/agora/masterzer/forums/forum/escola-alfa/', 0, 'forum', '', 0),
(452, 1, '2015-07-24 15:54:48', '2015-07-24 14:54:48', 'Node de la escola Beta', 'Escola Beta', '', 'private', 'closed', 'open', '', 'escola-beta', '', '', '2015-07-24 15:54:48', '2015-07-24 14:54:48', '', 0, 'https://pwc-int.educacio.intranet/agora/masterzer/forums/forum/escola-beta/', 0, 'forum', '', 0),
(453, 1, '2015-07-24 15:55:47', '2015-07-24 14:55:47', 'Node de la escola Gamma', 'Escola Gamma', '', 'private', 'closed', 'open', '', 'escola-gamma', '', '', '2015-07-24 15:55:47', '2015-07-24 14:55:47', '', 0, 'https://pwc-int.educacio.intranet/agora/masterzer/forums/forum/escola-gamma/', 0, 'forum', '', 0),
(454, 1, '2015-07-24 15:58:45', '2015-07-24 14:58:45', 'Node de l&#039;escola Epsilon', 'Escola Epsilon', '', 'private', 'closed', 'open', '', 'escola-epsilon', '', '', '2015-07-24 15:58:45', '2015-07-24 14:58:45', '', 0, 'https://pwc-int.educacio.intranet/agora/masterzer/forums/forum/escola-epsilon/', 0, 'forum', '', 0);
INSERT INTO `wp_posts` (`ID`, `post_author`, `post_date`, `post_date_gmt`, `post_content`, `post_title`, `post_excerpt`, `post_status`, `comment_status`, `ping_status`, `post_password`, `post_name`, `to_ping`, `pinged`, `post_modified`, `post_modified_gmt`, `post_content_filtered`, `post_parent`, `guid`, `menu_order`, `post_type`, `post_mime_type`, `comment_count`) VALUES
(478, 1, '2015-07-24 16:34:56', '2015-07-24 15:34:56', ' ', '', '', 'publish', 'open', 'open', '', '478', '', '', '2015-07-31 16:19:51', '2015-07-31 15:19:51', '', 264, 'https://pwc-int.educacio.intranet/agora/masterzer/?p=478', 31, 'nav_menu_item', '', 0),
(494, 1, '2015-07-24 17:06:00', '2015-07-24 16:06:00', '<strong>Pots veure les últimes notícies de l''AMPA de l''escola Gamma <a href="https://pwc-int.educacio.intranet/agora/masterzer/categoria/escola-gamma/ampa-escola-gamma/">aquí</a>.</strong>\r\n\r\nL’AMPA és l’entitat que agrupa a les mares i els pares d’alumnes de l’Escola per a la defensa dels seus interessos en tot allò que fa referència a l’educació dels nens i nenes i col·labora en el funcionament del centre.\r\nÉs una entitat constituïda com associació sense ànim de lucre. Està regulada per uns estatuts i s’organitza a través de: La Junta Directiva i l’Assemblea General.\r\nL''objectiu fonamental de l''AMPA és contribuir a la millora de la qualitat de l''ensenyament que reben els nostres fills i filles.\r\n\r\n<a href="https://pwc-int.educacio.intranet/agora/masterzer/wp-content/uploads/usu10/2014/09/ampa.png"><img class=" size-medium wp-image-185 aligncenter" src="https://pwc-int.educacio.intranet/agora/masterzer/wp-content/uploads/usu10/2014/09/ampa-300x120.png" alt="ampa" width="300" height="120" /></a>\r\n\r\nAlgunes de les tasques que es fan són:\r\n<ul>\r\n	<li>Promoure la participació de pares i mares dels alumnes: Castanyada, Xocolatada per Nadal, Jocs Florals, Festa Setmana Cultural, Colla Gegantera…</li>\r\n	<li>Promoure la representació i la participació dels pares i mares dels alumnes en el Consell Escolar.</li>\r\n	<li>Col·labora en les activitats educatives, organitza i gestiona les activitats extraescolars i el menjador de l’Escola.</li>\r\n	<li>Venda de roba i llibres de text.</li>\r\n	<li>Col·labora en el Projecte per a la Reutilització i Socialització de llibres.</li>\r\n	<li>Ajuda al finançament d’aquelles activitats o equipaments que el centre necessita: Festa de l’Escola, Biblioteca d’Anglès, samarretes per als Jocs Esportius i Fem dansa, l’autocar per participar a la Cantània, un mirall per fer ball, projecte de robòtica, etc.</li>\r\n</ul>\r\n<h6>Qui és de l’AMPA?</h6>\r\nL’Associació està formada per les famílies que s’han inscrit com a sòcies. L’actual Junta està formada per:\r\n<ul>\r\n	<li>Presidència: &lt;Nom&gt;</li>\r\n	<li>Vicepresidència: &lt;Nom&gt;</li>\r\n	<li>Secretaria:&lt;Nom&gt;</li>\r\n	<li>Tresoreria:&lt;Nom&gt;</li>\r\n</ul>\r\nA més, hi ha els vocals que formen diferents grups de treball.\r\nLa quota, que es paga per família, és de &lt;Preu&gt;€.\r\n<h6>Horari d’atenció de l’AMPA</h6>\r\n<ul>\r\n	<li>Dilluns i dimecres de 00h. a 00h.</li>\r\n	<li>Dimarts i dijous de 00h. a 00h.</li>\r\n</ul>\r\n<h6>Contactar</h6>\r\n<ul>\r\n	<li>Telèfon: 123 456 78</li>\r\n	<li>Correu electrònic: ampa@esc-alfa.cat</li>\r\n</ul>', 'AMPA', '', 'publish', 'closed', 'closed', '', 'ampa', '', '', '2015-10-27 10:10:17', '2015-10-27 09:10:17', '', 268, 'https://pwc-int.educacio.intranet/agora/masterzer/?page_id=494', 70, 'page', '', 0),
(498, 1, '2015-07-24 17:07:28', '2015-07-24 16:07:28', '<strong>Pots veure les últimes notícies de l''AMPA de l''escola Epsilon <a href="https://pwc-int.educacio.intranet/agora/masterzer/categoria/escola-epsilon/ampa-escola-epsilon">aquí</a>.</strong>\r\n\r\nL’AMPA és l’entitat que agrupa a les mares i els pares d’alumnes de l’Escola per a la defensa dels seus interessos en tot allò que fa referència a l’educació dels nens i nenes i col·labora en el funcionament del centre.\r\nÉs una entitat constituïda com associació sense ànim de lucre. Està regulada per uns estatuts i s’organitza a través de: La Junta Directiva i l’Assemblea General.\r\nL''objectiu fonamental de l''AMPA és contribuir a la millora de la qualitat de l''ensenyament que reben els nostres fills i filles.\r\n\r\n<a href="https://pwc-int.educacio.intranet/agora/masterzer/wp-content/uploads/usu10/2014/09/ampa.png"><img class=" size-medium wp-image-185 aligncenter" src="https://pwc-int.educacio.intranet/agora/masterzer/wp-content/uploads/usu10/2014/09/ampa-300x120.png" alt="ampa" width="300" height="120" /></a>\r\n\r\nAlgunes de les tasques que es fan són:\r\n<ul>\r\n	<li>Promoure la participació de pares i mares dels alumnes: Castanyada, Xocolatada per Nadal, Jocs Florals, Festa Setmana Cultural, Colla Gegantera…</li>\r\n	<li>Promoure la representació i la participació dels pares i mares dels alumnes en el Consell Escolar.</li>\r\n	<li>Col·labora en les activitats educatives, organitza i gestiona les activitats extraescolars i el menjador de l’Escola.</li>\r\n	<li>Venda de roba i llibres de text.</li>\r\n	<li>Col·labora en el Projecte per a la Reutilització i Socialització de llibres.</li>\r\n	<li>Ajuda al finançament d’aquelles activitats o equipaments que el centre necessita: Festa de l’Escola, Biblioteca d’Anglès, samarretes per als Jocs Esportius i Fem dansa, l’autocar per participar a la Cantània, un mirall per fer ball, projecte de robòtica, etc.</li>\r\n</ul>\r\n<h6>Qui és de l’AMPA?</h6>\r\nL’Associació està formada per les famílies que s’han inscrit com a sòcies. L’actual Junta està formada per:\r\n<ul>\r\n	<li>Presidència: &lt;Nom&gt;</li>\r\n	<li>Vicepresidència: &lt;Nom&gt;</li>\r\n	<li>Secretaria:&lt;Nom&gt;</li>\r\n	<li>Tresoreria:&lt;Nom&gt;</li>\r\n</ul>\r\nA més, hi ha els vocals que formen diferents grups de treball.\r\nLa quota, que es paga per família, és de &lt;Preu&gt;€.\r\n<h6>Horari d’atenció de l’AMPA</h6>\r\n<ul>\r\n	<li>Dilluns i dimecres de 00h. a 00h.</li>\r\n	<li>Dimarts i dijous de 00h. a 00h.</li>\r\n</ul>\r\n<h6>Contactar</h6>\r\n<ul>\r\n	<li>Telèfon: 123 456 78</li>\r\n	<li>Correu electrònic: ampa@esc-epsilon.cat</li>\r\n</ul>', 'AMPA', '', 'publish', 'closed', 'closed', '', 'ampa', '', '', '2015-10-27 10:08:42', '2015-10-27 09:08:42', '', 270, 'https://pwc-int.educacio.intranet/agora/masterzer/?page_id=498', 70, 'page', '', 0),
(501, 1, '2015-07-24 17:09:07', '2015-07-24 16:09:07', ' ', '', '', 'publish', 'open', 'open', '', '501', '', '', '2015-07-31 16:19:52', '2015-07-31 15:19:52', '', 266, 'https://pwc-int.educacio.intranet/agora/masterzer/?p=501', 44, 'nav_menu_item', '', 0),
(503, 1, '2015-07-24 17:10:15', '2015-07-24 16:10:15', ' ', '', '', 'publish', 'open', 'open', '', '503', '', '', '2015-07-31 16:19:52', '2015-07-31 15:19:52', '', 270, 'https://pwc-int.educacio.intranet/agora/masterzer/?p=503', 70, 'nav_menu_item', '', 0),
(505, 1, '2015-07-24 17:12:28', '2015-07-24 16:12:28', ' ', '', '', 'publish', 'open', 'open', '', '505', '', '', '2015-07-31 16:19:52', '2015-07-31 15:19:52', '', 268, 'https://pwc-int.educacio.intranet/agora/masterzer/?p=505', 57, 'nav_menu_item', '', 0),
(506, 1, '2015-07-24 17:17:48', '2015-07-24 16:17:48', ' ', '', '', 'publish', 'open', 'open', '', '506', '', '', '2015-07-24 17:17:52', '2015-07-24 16:17:52', '', 0, 'https://pwc-int.educacio.intranet/agora/masterzer/?p=506', 1, 'nav_menu_item', '', 0),
(507, 1, '2015-07-24 17:17:48', '2015-07-24 16:17:48', ' ', '', '', 'publish', 'open', 'open', '', '507', '', '', '2015-07-24 17:17:52', '2015-07-24 16:17:52', '', 0, 'https://pwc-int.educacio.intranet/agora/masterzer/?p=507', 2, 'nav_menu_item', '', 0),
(508, 1, '2015-07-24 17:17:48', '2015-07-24 16:17:48', ' ', '', '', 'publish', 'open', 'open', '', '508', '', '', '2015-07-24 17:17:52', '2015-07-24 16:17:52', '', 0, 'https://pwc-int.educacio.intranet/agora/masterzer/?p=508', 4, 'nav_menu_item', '', 0),
(509, 1, '2015-07-24 17:17:48', '2015-07-24 16:17:48', ' ', '', '', 'publish', 'open', 'open', '', '509', '', '', '2015-07-24 17:17:52', '2015-07-24 16:17:52', '', 0, 'https://pwc-int.educacio.intranet/agora/masterzer/?p=509', 3, 'nav_menu_item', '', 0),
(510, 1, '2015-07-24 17:38:50', '2015-07-24 16:38:50', '', 'Selecció_999(373)', '', 'inherit', 'open', 'open', '', 'seleccio_999373', '', '', '2015-07-24 17:38:50', '2015-07-24 16:38:50', '', 0, 'https://pwc-int.educacio.intranet/agora/masterzer/wp-content/uploads/usu10/2015/07/Selecció_999373.png', 0, 'attachment', 'image/png', 0),
(511, 1, '2015-07-24 17:38:50', '2015-07-24 16:38:50', '', 'Selecció_999(372)', '', 'inherit', 'open', 'open', '', 'seleccio_999372', '', '', '2015-07-24 17:38:50', '2015-07-24 16:38:50', '', 0, 'https://pwc-int.educacio.intranet/agora/masterzer/wp-content/uploads/usu10/2015/07/Selecció_999372.png', 0, 'attachment', 'image/png', 0),
(512, 1, '2015-07-24 17:38:51', '2015-07-24 16:38:51', '', 'Selecció_999(371)', '', 'inherit', 'open', 'open', '', 'seleccio_999371', '', '', '2015-07-24 17:38:51', '2015-07-24 16:38:51', '', 0, 'https://pwc-int.educacio.intranet/agora/masterzer/wp-content/uploads/usu10/2015/07/Selecció_999371.png', 0, 'attachment', 'image/png', 0),
(513, 1, '2015-07-24 17:39:47', '2015-07-24 16:39:47', '', 'Selecció_999(374)', '', 'inherit', 'open', 'open', '', 'seleccio_999374', '', '', '2015-07-24 17:39:47', '2015-07-24 16:39:47', '', 0, 'https://pwc-int.educacio.intranet/agora/masterzer/wp-content/uploads/usu10/2015/07/Selecció_999374.png', 0, 'attachment', 'image/png', 0),
(514, 1, '2015-07-24 17:51:28', '2015-07-24 16:51:28', '<strong>[title]</strong><br />[when]<br />[location]<br /><div>[description]</div><br />[link newwindow="yes"]Més detalls...[/link]', 'Calendari Escola Alfa', '', 'publish', 'closed', 'closed', '', 'calendari-escola-alfa', '', '', '2016-09-20 11:51:20', '2016-09-20 09:51:20', '', 0, 'https://pwc-int.educacio.intranet/agora/masterzer/?post_type=gce_feed&#038;p=514', 0, 'calendar', '', 0),
(515, 1, '2015-07-24 17:51:48', '2015-07-24 16:51:48', '<strong>[title]</strong><br />[when]<br />[location]<br /><div>[description]</div><br />[link newwindow="yes"]Més detalls...[/link]', 'Calendari Escola Beta', '', 'publish', 'closed', 'closed', '', 'calendari-escola-beta', '', '', '2016-09-20 11:51:20', '2016-09-20 09:51:20', '', 0, 'https://pwc-int.educacio.intranet/agora/masterzer/?post_type=gce_feed&#038;p=515', 0, 'calendar', '', 0),
(516, 1, '2015-07-24 17:52:04', '2015-07-24 16:52:04', '<strong>[title]</strong><br />[when]<br />[location]<br /><div>[description]</div><br />[link newwindow="yes"]Més detalls...[/link]', 'Calendari Escola Gamma', '', 'publish', 'closed', 'closed', '', 'calendari-escola-gamma', '', '', '2016-09-20 11:51:19', '2016-09-20 09:51:19', '', 0, 'https://pwc-int.educacio.intranet/agora/masterzer/?post_type=gce_feed&#038;p=516', 0, 'calendar', '', 0),
(517, 1, '2015-07-24 17:52:34', '2015-07-24 16:52:34', '<strong>[title]</strong><br />[when]<br />[location]<br /><div>[description]</div><br />[link newwindow="yes"]Més detalls...[/link]', 'Calendari Escola Epsilon', '', 'publish', 'closed', 'closed', '', 'calendari-escola-epsilon', '', '', '2016-09-20 11:51:19', '2016-09-20 09:51:19', '', 0, 'https://pwc-int.educacio.intranet/agora/masterzer/?post_type=gce_feed&#038;p=517', 0, 'calendar', '', 0),
(554, 1, '2015-07-28 14:19:51', '2015-07-28 13:19:51', 'Calendari amb els esdeveniments, festes, tasques etc.\r\n\r\n[calendar id="224"]\r\n<h5>Agenda en format llista</h5>\r\n[calendar id="248"]', 'Calendari escolar', '', 'publish', 'closed', 'closed', '', 'calendari-del-curs', '', '', '2016-09-21 11:40:02', '2016-09-21 09:40:02', '', 19, 'https://pwc-int.educacio.intranet/agora/masterzer/?page_id=554', 0, 'page', '', 0),
(565, 1, '2015-10-09 13:41:19', '2015-10-09 12:41:19', '', 'Mur general', '', 'publish', 'open', 'open', '', 'mur-general', '', '', '2015-10-09 13:41:19', '2015-10-09 12:41:19', '', 0, 'https://pwc-int.educacio.intranet/agora/masterzer/?p=565', 1, 'nav_menu_item', '', 0),
(566, 1, '2015-10-09 13:41:19', '2015-10-09 12:41:19', ' ', '', '', 'publish', 'open', 'open', '', '566', '', '', '2015-10-09 13:41:19', '2015-10-09 12:41:19', '', 0, 'https://pwc-int.educacio.intranet/agora/masterzer/?p=566', 3, 'nav_menu_item', '', 0),
(567, 1, '2015-10-09 13:41:19', '2015-10-09 12:41:19', ' ', '', '', 'publish', 'open', 'open', '', '567', '', '', '2015-10-09 13:41:19', '2015-10-09 12:41:19', '', 0, 'https://pwc-int.educacio.intranet/agora/masterzer/?p=567', 2, 'nav_menu_item', '', 0),
(568, 1, '2016-03-29 12:48:51', '2016-03-29 11:48:51', '', 'Activa', '', 'publish', 'closed', 'closed', '', 'activa', '', '', '2016-03-29 12:48:51', '2016-03-29 11:48:51', '', 0, 'https://pwc-int.educacio.intranet/agora/masterzer/?page_id=568', 0, 'page', '', 0),
(570, 1, '2016-03-29 12:49:02', '2016-03-29 11:49:02', '', 'Registre', '', 'publish', 'closed', 'closed', '', 'registre', '', '', '2016-03-29 12:49:02', '2016-03-29 11:49:02', '', 0, 'https://pwc-int.educacio.intranet/agora/masterzer/?page_id=570', 0, 'page', '', 0),
(576, 1, '2016-07-04 11:32:17', '2016-07-04 10:32:17', '{{poster.name}} replied to one of your updates:\n\n<blockquote>&quot;{{usermessage}}&quot;</blockquote>\n\n<a href="{{{thread.url}}}">Go to the discussion</a> to reply or catch up on the conversation.', '[{{{site.name}}}] {{poster.name}} replied to one of your updates', '{{poster.name}} replied to one of your updates:\n\n"{{usermessage}}"\n\nGo to the discussion to reply or catch up on the conversation: {{{thread.url}}}', 'publish', 'closed', 'closed', '', 'site-name-poster-name-replied-to-one-of-your-updates', '', '', '2016-07-04 11:32:17', '2016-07-04 10:32:17', '', 0, 'https://pwc-int.educacio.intranet/agora/masterzer/general/site-name-poster-name-replied-to-one-of-your-updates/', 0, 'bp-email', '', 0),
(577, 1, '2016-07-04 11:32:17', '2016-07-04 10:32:17', '{{poster.name}} replied to one of your comments:\n\n<blockquote>&quot;{{usermessage}}&quot;</blockquote>\n\n<a href="{{{thread.url}}}">Go to the discussion</a> to reply or catch up on the conversation.', '[{{{site.name}}}] {{poster.name}} replied to one of your comments', '{{poster.name}} replied to one of your comments:\n\n"{{usermessage}}"\n\nGo to the discussion to reply or catch up on the conversation: {{{thread.url}}}', 'publish', 'closed', 'closed', '', 'site-name-poster-name-replied-to-one-of-your-comments', '', '', '2016-07-04 11:32:17', '2016-07-04 10:32:17', '', 0, 'https://pwc-int.educacio.intranet/agora/masterzer/general/site-name-poster-name-replied-to-one-of-your-comments/', 0, 'bp-email', '', 0),
(578, 1, '2016-07-04 11:32:17', '2016-07-04 10:32:17', '{{poster.name}} mentioned you in a status update:\n\n<blockquote>&quot;{{usermessage}}&quot;</blockquote>\n\n<a href="{{{mentioned.url}}}">Go to the discussion</a> to reply or catch up on the conversation.', '[{{{site.name}}}] {{poster.name}} mentioned you in a status update', '{{poster.name}} mentioned you in a status update:\n\n"{{usermessage}}"\n\nGo to the discussion to reply or catch up on the conversation: {{{mentioned.url}}}', 'publish', 'closed', 'closed', '', 'site-name-poster-name-mentioned-you-in-a-status-update', '', '', '2016-07-04 11:32:17', '2016-07-04 10:32:17', '', 0, 'https://pwc-int.educacio.intranet/agora/masterzer/general/site-name-poster-name-mentioned-you-in-a-status-update/', 0, 'bp-email', '', 0),
(579, 1, '2016-07-04 11:32:17', '2016-07-04 10:32:17', '{{poster.name}} mentioned you in the group "{{group.name}}":\n\n<blockquote>&quot;{{usermessage}}&quot;</blockquote>\n\n<a href="{{{mentioned.url}}}">Go to the discussion</a> to reply or catch up on the conversation.', '[{{{site.name}}}] {{poster.name}} mentioned you in an update', '{{poster.name}} mentioned you in the group "{{group.name}}":\n\n"{{usermessage}}"\n\nGo to the discussion to reply or catch up on the conversation: {{{mentioned.url}}}', 'publish', 'closed', 'closed', '', 'site-name-poster-name-mentioned-you-in-an-update', '', '', '2016-07-04 11:32:17', '2016-07-04 10:32:17', '', 0, 'https://pwc-int.educacio.intranet/agora/masterzer/general/site-name-poster-name-mentioned-you-in-an-update/', 0, 'bp-email', '', 0),
(580, 1, '2016-07-04 11:32:17', '2016-07-04 10:32:17', 'Thanks for registering!\n\nTo complete the activation of your account, go to the following link: <a href="{{{activate.url}}}">{{{activate.url}}}</a>', '[{{{site.name}}}] Activate your account', 'Thanks for registering!\n\nTo complete the activation of your account, go to the following link: {{{activate.url}}}', 'publish', 'closed', 'closed', '', 'site-name-activate-your-account', '', '', '2016-07-04 11:32:17', '2016-07-04 10:32:17', '', 0, 'https://pwc-int.educacio.intranet/agora/masterzer/general/site-name-activate-your-account/', 0, 'bp-email', '', 0),
(581, 1, '2016-07-04 11:32:18', '2016-07-04 10:32:18', 'Thanks for registering!\n\nTo complete the activation of your account and site, go to the following link: <a href="{{{activate-site.url}}}">{{{activate-site.url}}}</a>.\n\nAfter you activate, you can visit your site at <a href="{{{user-site.url}}}">{{{user-site.url}}}</a>.', '[{{{site.name}}}] Activate {{{user-site.url}}}', 'Thanks for registering!\n\nTo complete the activation of your account and site, go to the following link: {{{activate-site.url}}}\n\nAfter you activate, you can visit your site at {{{user-site.url}}}.', 'publish', 'closed', 'closed', '', 'site-name-activate-user-site-url', '', '', '2016-07-04 11:32:18', '2016-07-04 10:32:18', '', 0, 'https://pwc-int.educacio.intranet/agora/masterzer/general/site-name-activate-user-site-url/', 0, 'bp-email', '', 0),
(582, 1, '2016-07-04 11:32:18', '2016-07-04 10:32:18', '<a href="{{{initiator.url}}}">{{initiator.name}}</a> wants to add you as a friend.\n\nTo accept this request and manage all of your pending requests, visit: <a href="{{{friend-requests.url}}}">{{{friend-requests.url}}}</a>', '[{{{site.name}}}] New friendship request from {{initiator.name}}', '{{initiator.name}} wants to add you as a friend.\n\nTo accept this request and manage all of your pending requests, visit: {{{friend-requests.url}}}\n\nTo view {{initiator.name}}''s profile, visit: {{{initiator.url}}}', 'publish', 'closed', 'closed', '', 'site-name-new-friendship-request-from-initiator-name', '', '', '2016-07-04 11:32:18', '2016-07-04 10:32:18', '', 0, 'https://pwc-int.educacio.intranet/agora/masterzer/general/site-name-new-friendship-request-from-initiator-name/', 0, 'bp-email', '', 0),
(583, 1, '2016-07-04 11:32:18', '2016-07-04 10:32:18', '<a href="{{{friendship.url}}}">{{friend.name}}</a> accepted your friend request.', '[{{{site.name}}}] {{friend.name}} accepted your friendship request', '{{friend.name}} accepted your friend request.\n\nTo learn more about them, visit their profile: {{{friendship.url}}}', 'publish', 'closed', 'closed', '', 'site-name-friend-name-accepted-your-friendship-request', '', '', '2016-07-04 11:32:18', '2016-07-04 10:32:18', '', 0, 'https://pwc-int.educacio.intranet/agora/masterzer/general/site-name-friend-name-accepted-your-friendship-request/', 0, 'bp-email', '', 0),
(584, 1, '2016-07-04 11:32:18', '2016-07-04 10:32:18', 'Group details for the group &quot;<a href="{{{group.url}}}">{{group.name}}</a>&quot; were updated:\n<blockquote>{{changed_text}}</blockquote>', '[{{{site.name}}}] Group details updated', 'Group details for the group &quot;{{group.name}}&quot; were updated:\n\n{{changed_text}}\n\nTo view the group, visit: {{{group.url}}}', 'publish', 'closed', 'closed', '', 'site-name-group-details-updated', '', '', '2016-07-04 11:32:18', '2016-07-04 10:32:18', '', 0, 'https://pwc-int.educacio.intranet/agora/masterzer/general/site-name-group-details-updated/', 0, 'bp-email', '', 0),
(585, 1, '2016-07-04 11:32:18', '2016-07-04 10:32:18', '<a href="{{{inviter.url}}}">{{inviter.name}}</a> has invited you to join the group: &quot;{{group.name}}&quot;.\n<a href="{{{invites.url}}}">Go here to accept your invitation</a> or <a href="{{{group.url}}}">visit the group</a> to learn more.', '[{{{site.name}}}] You have an invitation to the group: "{{group.name}}"', '{{inviter.name}} has invited you to join the group: &quot;{{group.name}}&quot;.\n\nTo accept your invitation, visit: {{{invites.url}}}\n\nTo learn more about the group, visit {{{group.url}}}.\nTo view {{inviter.name}}''s profile, visit: {{{inviter.url}}}', 'publish', 'closed', 'closed', '', 'site-name-you-have-an-invitation-to-the-group-group-name', '', '', '2016-07-04 11:32:18', '2016-07-04 10:32:18', '', 0, 'https://pwc-int.educacio.intranet/agora/masterzer/general/site-name-you-have-an-invitation-to-the-group-group-name/', 0, 'bp-email', '', 0),
(586, 1, '2016-07-04 11:32:18', '2016-07-04 10:32:18', 'You have been promoted to <b>{{promoted_to}}</b> in the group &quot;<a href="{{{group.url}}}">{{group.name}}</a>&quot;.', '[{{{site.name}}}] You have been promoted in the group: "{{group.name}}"', 'You have been promoted to {{promoted_to}} in the group: &quot;{{group.name}}&quot;.\n\nTo visit the group, go to: {{{group.url}}}', 'publish', 'closed', 'closed', '', 'site-name-you-have-been-promoted-in-the-group-group-name', '', '', '2016-07-04 11:32:18', '2016-07-04 10:32:18', '', 0, 'https://pwc-int.educacio.intranet/agora/masterzer/general/site-name-you-have-been-promoted-in-the-group-group-name/', 0, 'bp-email', '', 0),
(587, 1, '2016-07-04 11:32:18', '2016-07-04 10:32:18', '<a href="{{{profile.url}}}">{{requesting-user.name}}</a> wants to join the group &quot;{{group.name}}&quot;. As you are an administrator of this group, you must either accept or reject the membership request.\n\n<a href="{{{group-requests.url}}}">Go here to manage this</a> and all other pending requests.', '[{{{site.name}}}] Membership request for group: {{group.name}}', '{{requesting-user.name}} wants to join the group &quot;{{group.name}}&quot;. As you are the administrator of this group, you must either accept or reject the membership request.\n\nTo manage this and all other pending requests, visit: {{{group-requests.url}}}\n\nTo view {{requesting-user.name}}''s profile, visit: {{{profile.url}}}', 'publish', 'closed', 'closed', '', 'site-name-membership-request-for-group-group-name', '', '', '2016-07-04 11:32:18', '2016-07-04 10:32:18', '', 0, 'https://pwc-int.educacio.intranet/agora/masterzer/general/site-name-membership-request-for-group-group-name/', 0, 'bp-email', '', 0),
(588, 1, '2016-07-04 11:32:18', '2016-07-04 10:32:18', '{{sender.name}} sent you a new message: &quot;{{usersubject}}&quot;\n\n<blockquote>&quot;{{usermessage}}&quot;</blockquote>\n\n<a href="{{{message.url}}}">Go to the discussion</a> to reply or catch up on the conversation.', '[{{{site.name}}}] New message from {{sender.name}}', '{{sender.name}} sent you a new message: &quot;{{usersubject}}&quot;\n\n&quot;{{usermessage}}&quot;\n\nGo to the discussion to reply or catch up on the conversation: {{{message.url}}}', 'publish', 'closed', 'closed', '', 'site-name-new-message-from-sender-name', '', '', '2016-07-04 11:32:18', '2016-07-04 10:32:18', '', 0, 'https://pwc-int.educacio.intranet/agora/masterzer/general/site-name-new-message-from-sender-name/', 0, 'bp-email', '', 0),
(589, 1, '2016-07-04 11:32:18', '2016-07-04 10:32:18', 'You recently changed the email address associated with your account on {{site.name}}. If this is correct, <a href="{{{verify.url}}}">go here to confirm the change</a>.\n\nOtherwise, you can safely ignore and delete this email if you have changed your mind, or if you think you have received this email in error.', '[{{{site.name}}}] Verify your new email address', 'You recently changed the email address associated with your account on {{site.name}}. If this is correct, go to the following link to confirm the change: {{{verify.url}}}\n\nOtherwise, you can safely ignore and delete this email if you have changed your mind, or if you think you have received this email in error.', 'publish', 'closed', 'closed', '', 'site-name-verify-your-new-email-address', '', '', '2016-07-04 11:32:18', '2016-07-04 10:32:18', '', 0, 'https://pwc-int.educacio.intranet/agora/masterzer/general/site-name-verify-your-new-email-address/', 0, 'bp-email', '', 0),
(590, 1, '2016-07-04 11:32:18', '2016-07-04 10:32:18', 'Your membership request for the group &quot;<a href="{{{group.url}}}">{{group.name}}</a>&quot; has been accepted.', '[{{{site.name}}}] Membership request for group "{{group.name}}" accepted', 'Your membership request for the group &quot;{{group.name}}&quot; has been accepted.\n\nTo view the group, visit: {{{group.url}}}', 'publish', 'closed', 'closed', '', 'site-name-membership-request-for-group-group-name-accepted', '', '', '2016-07-04 11:32:18', '2016-07-04 10:32:18', '', 0, 'https://pwc-int.educacio.intranet/agora/masterzer/general/site-name-membership-request-for-group-group-name-accepted/', 0, 'bp-email', '', 0),
(591, 1, '2016-07-04 11:32:18', '2016-07-04 10:32:18', 'Your membership request for the group &quot;<a href="{{{group.url}}}">{{group.name}}</a>&quot; has been rejected.', '[{{{site.name}}}] Membership request for group "{{group.name}}" rejected', 'Your membership request for the group &quot;{{group.name}}&quot; has been rejected.\n\nTo request membership again, visit: {{{group.url}}}', 'publish', 'closed', 'closed', '', 'site-name-membership-request-for-group-group-name-rejected', '', '', '2016-07-04 11:32:18', '2016-07-04 10:32:18', '', 0, 'https://pwc-int.educacio.intranet/agora/masterzer/general/site-name-membership-request-for-group-group-name-rejected/', 0, 'bp-email', '', 0),
(593, 1, '2015-07-24 17:51:28', '2015-07-24 15:51:28', '<strong>[title]</strong><br />[when]<br />[location]<br /><div>[description]</div><br />[link newwindow="yes"]Més detalls...[/link]', 'Agenda Escola Alfa', '', 'publish', 'closed', 'closed', '', 'calendari-escola-alfa-2', '', '', '2016-09-20 11:51:20', '2016-09-20 09:51:20', '', 0, 'https://pwc-int.educacio.intranet/agora/masterzer/calendar/calendari-escola-alfa-2/', 0, 'calendar', '', 0),
(594, 1, '2015-07-24 17:51:48', '2015-07-24 16:51:48', '<strong>[title]</strong><br />[when]<br />[location]<br /><div>[description]</div><br />[link newwindow="yes"]Més detalls...[/link]', 'Agenda Escola Beta', '', 'publish', 'closed', 'closed', '', 'calendari-escola-beta-2', '', '', '2016-09-20 11:51:20', '2016-09-20 09:51:20', '', 0, 'https://pwc-int.educacio.intranet/agora/masterzer/calendar/calendari-escola-beta-2/', 0, 'calendar', '', 0),
(595, 1, '2015-07-24 17:52:04', '2015-07-24 16:52:04', '<strong>[title]</strong><br />[when]<br />[location]<br /><div>[description]</div><br />[link newwindow="yes"]Més detalls...[/link]', 'Agenda Escola Gamma', '', 'publish', 'closed', 'closed', '', 'calendari-escola-gamma-2', '', '', '2016-09-20 11:51:19', '2016-09-20 09:51:19', '', 0, 'https://pwc-int.educacio.intranet/agora/masterzer/calendar/calendari-escola-gamma-2/', 0, 'calendar', '', 0),
(596, 1, '2015-07-24 17:52:34', '2015-07-24 16:52:34', '<strong>[title]</strong>\r\n[when]\r\n[location]\r\n<div>[description]</div>\r\n[link newwindow="yes"]Més detalls...[/link]', 'Agenda Escola Epsilon', '', 'publish', 'closed', 'closed', '', 'calendari-escola-epsilon-2', '', '', '2016-09-22 13:21:22', '2016-09-22 11:21:22', '', 0, 'https://pwc-int.educacio.intranet/agora/masterzer/calendar/calendari-escola-epsilon-2/', 0, 'calendar', '', 0),
(597, 0, '2019-05-13 09:43:31', '2019-05-13 07:43:31', '<strong style="color: #990000">What can you achieve using Email Subscribers?</strong><p>Add subscription forms on website, send HTML newsletters &amp; automatically notify subscribers about new blog posts once it is published. You can also Import or Export subscribers from any list to Email Subscribers.</p> <strong style="color: #990000">Plugin Features</strong><ol> <li>Send notification emails to subscribers when new blog posts are published.</li> <li>Subscribe form available with 3 options to setup.</li> <li>Double Opt-In and Single Opt-In support.</li> <li>Email notification to admin when a new user signs up (Optional).</li> <li>Automatic welcome email to subscriber.</li> <li>Auto add unsubscribe link in the email.</li> <li>Import/Export subscriber emails to migrate to any lists.</li> <li>Default WordPress editor to create emails.</li> </ol> <strong>Thanks &amp; Regards,</strong><br>Admin', 'Welcome To Email Subscribers', '', 'publish', 'closed', 'closed', '', 'welcome-to-email-subscribers', '', '', '2019-05-13 09:43:31', '2019-05-13 07:43:31', '', 0, 'https://pwc-int.educacio.intranet/agora/masterzer/general/welcome-to-email-subscribers/', 0, 'es_template', '', 0),
(598, 0, '2019-05-13 09:43:31', '2019-05-13 07:43:31', 'Hello {{NAME}},\r\n\r\nWe have published a new blog article on our website : {{POSTTITLE}}\r\n{{POSTIMAGE}}\r\n\r\nYou can view it from this link : {{POSTLINK}}\r\n\r\nThanks &amp; Regards,\r\nAdmin\r\n\r\nYou received this email because in the past you have provided us your email address : {{EMAIL}} to receive notifications when new updates are posted.', 'New Post Published - {{POSTTITLE}}', '', 'publish', 'closed', 'closed', '', 'new-post-published-posttitle', '', '', '2019-05-13 09:43:31', '2019-05-13 07:43:31', '', 0, 'https://pwc-int.educacio.intranet/agora/masterzer/general/new-post-published-posttitle/', 0, 'es_template', '', 0),
(599, 0, '2019-05-13 09:43:31', '2019-05-13 07:43:31', '{{{ia.content}}}<br /><hr><a href="{{{ia.accept_url}}}">Accepteu o rebutgeu aquesta invitació</a> &middot; <a href="{{{ia.opt_out_url}}}">Desactiveu les invitacions futures</a>', '[{{{site.name}}}] {{{ia.subject}}}', '{{{ia.content_plaintext}}}', 'publish', 'closed', 'closed', '', 'site-name-ia-subject', '', '', '2019-05-13 09:43:31', '2019-05-13 07:43:31', '', 0, 'https://pwc-int.educacio.intranet/agora/masterzer/general/site-name-ia-subject/', 0, 'bp-email', '', 0),
(600, 2, '2019-05-13 12:47:09', '2019-05-13 10:47:09', '{{{ges.action}}}:\n\n<blockquote>{{{usermessage}}}</blockquote>\n&ndash;\n<a href="{{{thread.url}}}">Ves a la discussió</a> per respondre o posar-se al dia de la conversa.\n{{{ges.email-setting-description}}}', '[{{{site.name}}}] {{{ges.subject}}}', '{{{ges.action}}}:\n\n"{{{usermessage}}}"\n\nVes a la discussió per respondre o posar-te al dia de la conversa:\n{{{thread.url}}}\n\n----\n\n{{{ges.email-setting-description}}}\n\n{{{ges.email-setting-links}}}', 'publish', 'closed', 'closed', '', 'site-name-ges-subject', '', '', '2019-05-13 12:47:09', '2019-05-13 10:47:09', '', 0, 'https://pwc-int.educacio.intranet/agora/masterzer/general/site-name-ges-subject/', 0, 'bp-email', '', 0),
(601, 2, '2019-05-13 12:47:09', '2019-05-13 10:47:09', '{{{ges.digest-summary}}}{{{usermessage}}}\n&ndash;\nHeu rebut aquest missatge perquè esteu subscrit per rebre el resum de l''activitat en algun dels vostres grups a {{site.name}}.', '[{{{site.name}}}] {{{ges.subject}}}', '{{{ges.digest-summary}}}\n\n{{{usermessage}}}\n\n----\n\nHeu rebut aquest missatge perquè esteu subscrit per rebre el resum de l''activitat en algun dels vostres grups a {{{site.name}}}.\n\nPer desactivar aquestes notificacions per grup, inicieu sessió i [visiteu la pàgina dels vostres grups]({{{ges.settings-link}}}) on podreu gestionar la configuració del correu per cada grup.', 'publish', 'closed', 'closed', '', 'site-name-ges-subject-2', '', '', '2019-05-13 12:47:09', '2019-05-13 10:47:09', '', 0, 'https://pwc-int.educacio.intranet/agora/masterzer/general/site-name-ges-subject-2/', 0, 'bp-email', '', 0),
(602, 2, '2019-05-13 12:47:09', '2019-05-13 10:47:09', 'Aquesta és una notificació del grup {{{group.link}}}:\n\n{{{usermessage}}}\n\n&ndash;\n<strong>Tingueu en compte:</strong> les notificacions d''administració s''envien a tothom del node i no es poden deshabilitar.\nSi creieu que el servei s''està utilitzant malament contacteu amb l''administrador del lloc web.', '[{{{site.name}}}] {{{ges.subject}}} - del node "{{{group.name}}}"', 'Aquesta és una notificació del grup "{{{group.name}}}":\n\n"{{{usermessage}}}"\n\n----\n\nTingueu en compte: les notificacions d''administració s''envien a tothom del node i no es poden deshabilitar.\n\nSi creieu que el servei s''està utilitzant malament contacteu amb l''administrador del lloc web.\n\nVisiteu la pàgina d''inici del node en aquest enllaç:\n{{{group.url}}}', 'publish', 'closed', 'closed', '', 'site-name-ges-subject-del-node-group-name', '', '', '2019-05-13 12:47:09', '2019-05-13 10:47:09', '', 0, 'https://pwc-int.educacio.intranet/agora/masterzer/general/site-name-ges-subject-del-node-group-name/', 0, 'bp-email', '', 0),
(603, 2, '2019-05-13 12:47:09', '2019-05-13 10:47:09', '{{{usermessage}}}', '[{{{site.name}}}] {{{ges.subject}}}', '{{{usermessage}}}', 'publish', 'closed', 'closed', '', 'site-name-ges-subject-3', '', '', '2019-05-13 12:47:09', '2019-05-13 10:47:09', '', 0, 'https://pwc-int.educacio.intranet/agora/masterzer/general/site-name-ges-subject-3/', 0, 'bp-email', '', 0);

-- --------------------------------------------------------

--
-- Estructura de la taula `wp_signups`
--

CREATE TABLE IF NOT EXISTS `wp_signups` (
`signup_id` bigint(20) NOT NULL,
  `domain` varchar(200) NOT NULL DEFAULT '',
  `path` varchar(100) NOT NULL DEFAULT '',
  `title` longtext NOT NULL,
  `user_login` varchar(60) NOT NULL DEFAULT '',
  `user_email` varchar(100) NOT NULL DEFAULT '',
  `registered` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `activated` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `activation_key` varchar(50) NOT NULL DEFAULT '',
  `meta` longtext
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de la taula `wp_stats`
--

CREATE TABLE IF NOT EXISTS `wp_stats` (
`stat_id` int(11) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT '1970-01-01 00:00:00',
  `ip` varchar(15) NOT NULL,
  `ipForward` varchar(15) NOT NULL,
  `ipClient` varchar(15) NOT NULL,
  `userAgent` varchar(255) NOT NULL,
  `uri` varchar(255) NOT NULL,
  `uid` int(11) NOT NULL DEFAULT '0',
  `isadmin` tinyint(4) NOT NULL DEFAULT '0',
  `username` varchar(60) NOT NULL,
  `email` varchar(100) NOT NULL,
  `content` longtext
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de la taula `wp_termmeta`
--

CREATE TABLE IF NOT EXISTS `wp_termmeta` (
`meta_id` bigint(20) unsigned NOT NULL,
  `term_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `meta_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_value` longtext COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de la taula `wp_terms`
--

CREATE TABLE IF NOT EXISTS `wp_terms` (
`term_id` bigint(20) unsigned NOT NULL,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `slug` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `term_group` bigint(10) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=115 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Bolcant dades de la taula `wp_terms`
--

INSERT INTO `wp_terms` (`term_id`, `name`, `slug`, `term_group`) VALUES
(1, 'General', 'general', 0),
(2, 'Menú principal', 'menu-principal', 0),
(4, 'ESO 1', 'eso-1', 0),
(5, 'ESO 2', 'eso-2', 0),
(6, 'ESO 3', 'eso-3', 0),
(7, 'ESO 4', 'eso-4', 0),
(29, 'Portada', 'portada', 0),
(31, 'AMPA', 'ampa', 0),
(32, 'Estudis', 'estudis', 0),
(33, 'educació emocional', 'educacio-emocional', 0),
(34, 'papiroflexia', 'papiroflexia', 0),
(35, 'granota', 'granota', 0),
(36, 'nivel senzill', 'nivel-senzill', 0),
(37, 'Audiovisuals', 'audiovisuals', 0),
(38, 'Sant Jordi', 'sant-jordi', 0),
(39, 'Sortides', 'sortides', 0),
(40, 'Teatre', 'teatre', 0),
(41, 'Matemàtiques', 'matematiques', 0),
(42, 'Anglès', 'angles', 0),
(43, 'Expressió oral', 'expressio-oral', 0),
(44, 'Xerrades', 'xerrades', 0),
(45, 'Salut', 'salut', 0),
(46, 'Professorat', 'bp_docs_associated_group_1', 0),
(47, 'bp_docs_access_anyone', 'bp_docs_access_anyone', 0),
(48, 'Actes', 'actes', 0),
(49, 'Claustre', 'claustre', 0),
(50, '2014-15', '2014-15', 0),
(51, 'bp_docs_access_group_member_1', 'bp_docs_access_group_member_1', 0),
(52, 'acords', 'acords', 0),
(53, 'Fotografia', 'bp_docs_associated_group_17', 0),
(54, 'Imatges aula', 'imatges-aula', 0),
(55, 'Menú exemple', 'menu-exemple', 0),
(56, 'Entorn', 'entorn', 0),
(57, 'projecte A', 'projecte-a', 0),
(58, 'P3', 'p3', 0),
(59, 'Escola Alfa', 'escola-alfa', 0),
(60, 'P4', 'p4', 0),
(61, 'P5', 'p5', 0),
(62, '1r', '1r', 0),
(63, '2n', '2n', 0),
(64, '3r', '3r', 0),
(65, '4t', '4t', 0),
(66, '5è', '5e', 0),
(67, '6è', '6e', 0),
(68, 'Escola Beta', 'escola-beta', 0),
(69, 'Escola Gamma', 'escola-gamma', 0),
(70, 'Escola Epsilon', 'escola-epsilon', 0),
(71, 'P3-P4', 'p3-p4', 0),
(72, 'P5-1r', 'p5-1r', 0),
(73, '2n-3r', '2n-3r', 0),
(74, '4t-5è', '4t-5e', 0),
(75, '6è', '6e-escola-beta', 0),
(76, 'AMPA', 'ampa-escola-alfa', 0),
(77, 'AMPA', 'ampa-escola-beta', 0),
(78, 'AMPA', 'ampa-escola-gamma', 0),
(79, 'AMPA', 'ampa-escola-epsilon', 0),
(80, 'P3-P4', 'p3-p4-escola-epsilon', 0),
(81, 'P5-1r', 'p5-1r-escola-epsilon', 0),
(82, '2n-3r', '2n-3r-escola-epsilon', 0),
(83, '4t-5è', '4t-5e-escola-epsilon', 0),
(84, '6è', '6e-escola-epsilon', 0),
(85, 'P3-P4', 'p3-p4-escola-gamma', 0),
(86, 'P5-1r', 'p5-1r-escola-gamma', 0),
(87, '2n-3r', '2n-3r-escola-gamma', 0),
(88, '4t-5è', '4t-5e-escola-gamma', 0),
(89, '6è', '6e-escola-gamma', 0),
(90, 'Blogs', 'blogs', 0),
(91, 'MenuNodes', 'menunodes', 0),
(92, 'activity-comment', 'activity-comment', 0),
(93, 'activity-comment-author', 'activity-comment-author', 0),
(94, 'activity-at-message', 'activity-at-message', 0),
(95, 'groups-at-message', 'groups-at-message', 0),
(96, 'core-user-registration', 'core-user-registration', 0),
(97, 'core-user-registration-with-blog', 'core-user-registration-with-blog', 0),
(98, 'friends-request', 'friends-request', 0),
(99, 'friends-request-accepted', 'friends-request-accepted', 0),
(100, 'groups-details-updated', 'groups-details-updated', 0),
(101, 'groups-invitation', 'groups-invitation', 0),
(102, 'groups-member-promoted', 'groups-member-promoted', 0),
(103, 'groups-membership-request', 'groups-membership-request', 0),
(104, 'messages-unread', 'messages-unread', 0),
(105, 'settings-verify-email-change', 'settings-verify-email-change', 0),
(106, 'groups-membership-request-accepted', 'groups-membership-request-accepted', 0),
(107, 'groups-membership-request-rejected', 'groups-membership-request-rejected', 0),
(108, 'google', 'google', 0),
(109, 'default-calendar', 'default-calendar', 0),
(110, 'invite-anyone-invitation', 'invite-anyone-invitation', 0),
(111, 'bp-ges-single', 'bp-ges-single', 0),
(112, 'bp-ges-digest', 'bp-ges-digest', 0),
(113, 'bp-ges-notice', 'bp-ges-notice', 0),
(114, 'bp-ges-welcome', 'bp-ges-welcome', 0);

-- --------------------------------------------------------

--
-- Estructura de la taula `wp_term_relationships`
--

CREATE TABLE IF NOT EXISTS `wp_term_relationships` (
  `object_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `term_taxonomy_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `term_order` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Bolcant dades de la taula `wp_term_relationships`
--

INSERT INTO `wp_term_relationships` (`object_id`, `term_taxonomy_id`, `term_order`) VALUES
(25, 2, 0),
(26, 2, 0),
(45, 2, 0),
(54, 2, 0),
(59, 2, 0),
(109, 33, 0),
(109, 35, 0),
(109, 41, 0),
(109, 42, 0),
(109, 63, 0),
(109, 66, 0),
(109, 67, 0),
(109, 68, 0),
(109, 69, 0),
(109, 70, 0),
(109, 71, 0),
(109, 72, 0),
(109, 73, 0),
(109, 74, 0),
(109, 75, 0),
(109, 79, 0),
(109, 84, 0),
(109, 85, 0),
(109, 89, 0),
(120, 33, 0),
(120, 35, 0),
(120, 43, 0),
(120, 44, 0),
(120, 72, 0),
(120, 73, 0),
(120, 74, 0),
(127, 33, 0),
(127, 35, 0),
(127, 43, 0),
(127, 44, 0),
(127, 63, 0),
(127, 72, 0),
(127, 73, 0),
(127, 82, 0),
(127, 89, 0),
(127, 90, 0),
(129, 33, 0),
(129, 41, 0),
(129, 42, 0),
(129, 73, 0),
(129, 82, 0),
(129, 89, 0),
(129, 91, 0),
(129, 92, 0),
(134, 33, 0),
(134, 35, 0),
(134, 41, 0),
(134, 42, 0),
(134, 62, 0),
(134, 63, 0),
(134, 64, 0),
(134, 65, 0),
(134, 74, 0),
(134, 84, 0),
(134, 85, 0),
(137, 33, 0),
(137, 35, 0),
(137, 48, 0),
(137, 49, 0),
(137, 72, 0),
(137, 74, 0),
(137, 77, 0),
(137, 78, 0),
(161, 33, 0),
(161, 45, 0),
(161, 72, 0),
(161, 76, 0),
(161, 77, 0),
(161, 81, 0),
(161, 86, 0),
(161, 87, 0),
(161, 88, 0),
(161, 93, 0),
(163, 33, 0),
(163, 46, 0),
(163, 47, 0),
(184, 35, 0),
(184, 46, 0),
(184, 47, 0),
(206, 37, 0),
(207, 37, 0),
(211, 38, 0),
(211, 39, 0),
(211, 40, 0),
(216, 37, 0),
(224, 112, 0),
(224, 113, 0),
(230, 50, 0),
(230, 52, 0),
(230, 53, 0),
(230, 54, 0),
(230, 55, 0),
(233, 51, 0),
(233, 53, 0),
(233, 54, 0),
(233, 56, 0),
(236, 50, 0),
(236, 55, 0),
(238, 51, 0),
(238, 57, 0),
(238, 60, 0),
(238, 61, 0),
(248, 112, 0),
(248, 113, 0),
(249, 59, 0),
(250, 59, 0),
(251, 59, 0),
(252, 59, 0),
(253, 59, 0),
(254, 59, 0),
(287, 2, 0),
(288, 2, 0),
(289, 2, 0),
(290, 2, 0),
(291, 2, 0),
(292, 2, 0),
(293, 2, 0),
(294, 2, 0),
(296, 2, 0),
(309, 2, 0),
(310, 2, 0),
(311, 2, 0),
(312, 2, 0),
(313, 2, 0),
(314, 2, 0),
(316, 2, 0),
(328, 2, 0),
(330, 2, 0),
(331, 2, 0),
(332, 2, 0),
(337, 2, 0),
(338, 2, 0),
(340, 2, 0),
(341, 2, 0),
(342, 2, 0),
(343, 2, 0),
(344, 2, 0),
(345, 2, 0),
(346, 2, 0),
(347, 2, 0),
(348, 2, 0),
(353, 2, 0),
(357, 2, 0),
(361, 2, 0),
(368, 2, 0),
(369, 2, 0),
(370, 2, 0),
(371, 2, 0),
(372, 2, 0),
(378, 2, 0),
(379, 2, 0),
(380, 2, 0),
(381, 2, 0),
(382, 2, 0),
(387, 2, 0),
(391, 2, 0),
(392, 2, 0),
(395, 2, 0),
(402, 2, 0),
(403, 2, 0),
(404, 2, 0),
(405, 2, 0),
(406, 2, 0),
(407, 2, 0),
(408, 2, 0),
(409, 2, 0),
(410, 2, 0),
(419, 2, 0),
(420, 2, 0),
(421, 2, 0),
(442, 2, 0),
(478, 2, 0),
(501, 2, 0),
(503, 2, 0),
(505, 2, 0),
(506, 94, 0),
(507, 94, 0),
(508, 94, 0),
(509, 94, 0),
(514, 112, 0),
(514, 113, 0),
(515, 112, 0),
(515, 113, 0),
(516, 112, 0),
(516, 113, 0),
(517, 112, 0),
(517, 113, 0),
(565, 95, 0),
(566, 95, 0),
(567, 95, 0),
(576, 96, 0),
(577, 97, 0),
(578, 98, 0),
(579, 99, 0),
(580, 100, 0),
(581, 101, 0),
(582, 102, 0),
(583, 103, 0),
(584, 104, 0),
(585, 105, 0),
(586, 106, 0),
(587, 107, 0),
(588, 108, 0),
(589, 109, 0),
(590, 110, 0),
(591, 111, 0),
(593, 112, 0),
(593, 113, 0),
(594, 112, 0),
(594, 113, 0),
(595, 112, 0),
(595, 113, 0),
(596, 112, 0),
(596, 113, 0),
(599, 114, 0),
(600, 115, 0),
(601, 116, 0),
(602, 117, 0),
(603, 118, 0);

-- --------------------------------------------------------

--
-- Estructura de la taula `wp_term_taxonomy`
--

CREATE TABLE IF NOT EXISTS `wp_term_taxonomy` (
`term_taxonomy_id` bigint(20) unsigned NOT NULL,
  `term_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `taxonomy` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent` bigint(20) unsigned NOT NULL DEFAULT '0',
  `count` bigint(20) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=119 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Bolcant dades de la taula `wp_term_taxonomy`
--

INSERT INTO `wp_term_taxonomy` (`term_taxonomy_id`, `term_id`, `taxonomy`, `description`, `parent`, `count`) VALUES
(1, 1, 'category', '', 0, 0),
(2, 2, 'nav_menu', '', 0, 70),
(9, 4, 'nav_menu', '', 0, 0),
(10, 5, 'nav_menu', '', 0, 0),
(11, 6, 'nav_menu', '', 0, 0),
(12, 7, 'nav_menu', '', 0, 0),
(33, 29, 'category', '', 0, 8),
(35, 31, 'category', '', 0, 6),
(36, 32, 'nav_menu', '', 0, 0),
(37, 33, 'topic-tag', '', 0, 3),
(38, 34, 'topic-tag', '', 0, 1),
(39, 35, 'topic-tag', '', 0, 1),
(40, 36, 'topic-tag', '', 0, 1),
(41, 37, 'post_tag', '', 0, 3),
(42, 38, 'post_tag', '', 0, 3),
(43, 39, 'post_tag', '', 0, 2),
(44, 40, 'post_tag', '', 0, 2),
(45, 41, 'post_tag', '', 0, 1),
(46, 42, 'post_tag', '', 0, 2),
(47, 43, 'post_tag', '', 0, 2),
(48, 44, 'post_tag', '', 0, 1),
(49, 45, 'post_tag', '', 0, 1),
(50, 46, 'bp_docs_associated_item', 'Docs associated with the group Professorat', 0, 1),
(51, 47, 'bp_docs_access', '', 0, 2),
(52, 48, 'bp_docs_tag', '', 0, 1),
(53, 49, 'bp_docs_tag', '', 0, 2),
(54, 50, 'bp_docs_tag', '', 0, 2),
(55, 51, 'bp_docs_access', '', 0, 1),
(56, 52, 'bp_docs_tag', '', 0, 1),
(57, 53, 'bp_docs_associated_item', 'Docs associated with the group Fotografia', 0, 1),
(58, 54, 'bp_docs_tag', '', 0, 0),
(59, 55, 'nav_menu', '', 0, 6),
(60, 56, 'bp_docs_tag', '', 0, 1),
(61, 57, 'bp_docs_tag', '', 0, 1),
(62, 58, 'category', '', 59, 1),
(63, 59, 'category', '', 0, 3),
(64, 60, 'category', '', 59, 1),
(65, 61, 'category', '', 59, 1),
(66, 62, 'category', '', 59, 1),
(67, 63, 'category', '', 59, 1),
(68, 64, 'category', '', 59, 1),
(69, 65, 'category', '', 59, 1),
(70, 66, 'category', '', 59, 1),
(71, 67, 'category', '', 59, 1),
(72, 68, 'category', '', 0, 5),
(73, 69, 'category', '', 0, 4),
(74, 70, 'category', '', 0, 4),
(75, 71, 'category', '', 68, 1),
(76, 72, 'category', '', 68, 1),
(77, 73, 'category', '', 68, 2),
(78, 74, 'category', '', 68, 1),
(79, 75, 'category', '', 68, 1),
(80, 76, 'category', '', 59, 0),
(81, 77, 'category', '', 68, 1),
(82, 78, 'category', '', 69, 2),
(83, 79, 'category', '', 70, 0),
(84, 80, 'category', '', 70, 2),
(85, 81, 'category', '', 70, 2),
(86, 82, 'category', '', 70, 1),
(87, 83, 'category', '', 70, 1),
(88, 84, 'category', '', 70, 1),
(89, 85, 'category', '', 69, 3),
(90, 86, 'category', '', 69, 1),
(91, 87, 'category', '', 69, 1),
(92, 88, 'category', '', 69, 1),
(93, 89, 'category', '', 69, 1),
(94, 90, 'nav_menu', '', 0, 4),
(95, 91, 'nav_menu', '', 0, 3),
(96, 92, 'bp-email-type', 'A member has replied to an activity update that the recipient posted.', 0, 0),
(97, 93, 'bp-email-type', 'A member has replied to a comment on an activity update that the recipient posted.', 0, 0),
(98, 94, 'bp-email-type', 'Recipient was mentioned in an activity update.', 0, 0),
(99, 95, 'bp-email-type', 'Recipient was mentioned in a group activity update.', 0, 0),
(100, 96, 'bp-email-type', 'Recipient has registered for an account.', 0, 0),
(101, 97, 'bp-email-type', 'Recipient has registered for an account and site.', 0, 0),
(102, 98, 'bp-email-type', 'A member has sent a friend request to the recipient.', 0, 0),
(103, 99, 'bp-email-type', 'Recipient has had a friend request accepted by a member.', 0, 0),
(104, 100, 'bp-email-type', 'A group''s details were updated.', 0, 0),
(105, 101, 'bp-email-type', 'A member has sent a group invitation to the recipient.', 0, 0),
(106, 102, 'bp-email-type', 'Recipient''s status within a group has changed.', 0, 0),
(107, 103, 'bp-email-type', 'A member has requested permission to join a group.', 0, 0),
(108, 104, 'bp-email-type', 'Recipient has received a private message.', 0, 0),
(109, 105, 'bp-email-type', 'Recipient has changed their email address.', 0, 0),
(110, 106, 'bp-email-type', 'Recipient had requested to join a group, which was accepted.', 0, 0),
(111, 107, 'bp-email-type', 'Recipient had requested to join a group, which was rejected.', 0, 0),
(112, 108, 'calendar_feed', '', 0, 10),
(113, 109, 'calendar_type', '', 0, 10),
(114, 110, 'bp-email-type', 'Es convida un usuari a unir-se al lloc per correu electrònic. Utilitzat pel connector Invite Anyone.', 0, 0),
(115, 111, 'bp-email-type', 'Un membre ha creat una activitat grupal. Utilitzat pel connector de Subscripció de correu electrònic del node durant enviaments immediats.', 0, 0),
(116, 112, 'bp-email-type', 'S''ha enviat un correu de resum a un membre. Utilitzat pel connector de Subscripció de correu electrònic del node durant els enviaments de resums diaris o setmanals.', 0, 0),
(117, 113, 'bp-email-type', 'L''administrador del node ha enviat una notificació a tots els membres del grup. Utilitzat pel connector de Subscripció de correu electrònic del node.', 0, 0),
(118, 114, 'bp-email-type', 'S''ha enviat un correu de benvinguda als nous membres del node. Utilitzat pel connector de Subscripció de correu electrònic del node.', 0, 0);

-- --------------------------------------------------------

--
-- Estructura de la taula `wp_usermeta`
--

CREATE TABLE IF NOT EXISTS `wp_usermeta` (
`umeta_id` bigint(20) unsigned NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `meta_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_value` longtext COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB AUTO_INCREMENT=94 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Bolcant dades de la taula `wp_usermeta`
--

INSERT INTO `wp_usermeta` (`umeta_id`, `user_id`, `meta_key`, `meta_value`) VALUES
(1, 1, 'first_name', ''),
(2, 1, 'last_name', ''),
(3, 1, 'nickname', 'admin'),
(4, 1, 'description', ''),
(5, 1, 'rich_editing', 'true'),
(6, 1, 'comment_shortcuts', 'false'),
(7, 1, 'admin_color', 'fresh'),
(8, 1, 'use_ssl', '0'),
(9, 1, 'show_admin_bar_front', 'true'),
(10, 1, 'wp_capabilities', 'a:2:{s:13:"administrator";b:1;s:13:"bbp_keymaster";b:1;}'),
(11, 1, 'wp_user_level', '10'),
(12, 1, 'dismissed_wp_pointers', 'wp350_media,wp360_revisions,wp360_locks,wp390_widgets'),
(13, 1, 'show_welcome_panel', '1'),
(14, 1, 'wp_dashboard_quick_press_last_post_id', '3'),
(15, 2, 'first_name', ''),
(16, 2, 'last_name', ''),
(17, 2, 'nickname', 'xtecadmin'),
(18, 2, 'description', ''),
(19, 2, 'rich_editing', 'true'),
(20, 2, 'comment_shortcuts', 'false'),
(21, 2, 'admin_color', 'sunrise'),
(22, 2, 'use_ssl', '0'),
(23, 2, 'show_admin_bar_front', 'true'),
(24, 2, 'wp_capabilities', 'a:2:{s:13:"administrator";b:1;s:13:"bbp_keymaster";b:1;}'),
(25, 2, 'wp_user_level', '10'),
(26, 2, 'dismissed_wp_pointers', 'wp350_media,wp360_revisions,wp360_locks,wp390_widgets,wp410_dfw'),
(27, 2, 'wp_dashboard_quick_press_last_post_id', '4'),
(28, 2, 'last_activity', '2019-05-13 12:46:13'),
(29, 2, 'closedpostboxes_slideshow', 'a:0:{}'),
(30, 2, 'metaboxhidden_slideshow', 'a:1:{i:3;s:7:"slugdiv";}'),
(31, 2, 'managenav-menuscolumnshidden', 'a:4:{i:0;s:11:"link-target";i:1;s:11:"css-classes";i:2;s:3:"xfn";i:3;s:11:"description";}'),
(32, 2, 'metaboxhidden_nav-menus', 'a:11:{i:0;s:23:"add-buddypress-nav-menu";i:1;s:8:"add-post";i:2;s:9:"add-forum";i:3;s:10:"add-bp_doc";i:4;s:12:"add-post_tag";i:5;s:15:"add-post_format";i:6;s:15:"add-ia_invitees";i:7;s:21:"add-ia_invited_groups";i:8;s:27:"add-bp_docs_associated_item";i:9;s:18:"add-bp_docs_access";i:10;s:15:"add-bp_docs_tag";}'),
(33, 2, 'nav_menu_recently_edited', '91'),
(34, 2, 'closedpostboxes_dashboard', 'a:0:{}'),
(35, 2, 'metaboxhidden_dashboard', 'a:0:{}'),
(36, 2, 'meta-box-order_dashboard', 'a:4:{s:6:"normal";s:43:"dashboard_right_now,bbp-dashboard-right-now";s:4:"side";s:58:"dashboard_quick_press,dashboard_activity,dashboard_primary";s:7:"column3";s:0:"";s:7:"column4";s:0:"";}'),
(39, 2, 'show_welcome_panel', '1'),
(40, 2, 'wp_user-settings', 'editor=tinymce&libraryContent=browse&hidetb=1&wplink=1'),
(41, 2, 'wp_user-settings-time', '1438001813'),
(43, 2, 'screen_layout_post', '2'),
(46, 2, 'total_group_count', '4'),
(47, 2, 'ass_digest_items', 'a:1:{s:3:"dig";a:1:{i:3;a:1:{i:0;i:5;}}}'),
(48, 1, 'last_activity', '2016-11-25 11:06:31'),
(49, 1, 'total_group_count', '19'),
(51, 1, 'screen_layout_post', '2'),
(52, 1, 'wp_user-settings', 'libraryContent=browse&editor=html'),
(53, 1, 'wp_user-settings-time', '1411406040'),
(56, 1, 'nav_menu_recently_edited', '2'),
(57, 1, 'managenav-menuscolumnshidden', 'a:4:{i:0;s:11:"link-target";i:1;s:11:"css-classes";i:2;s:3:"xfn";i:3;s:11:"description";}'),
(58, 1, 'metaboxhidden_nav-menus', 'a:11:{i:0;s:23:"add-buddypress-nav-menu";i:1;s:8:"add-post";i:2;s:9:"add-forum";i:3;s:10:"add-bp_doc";i:4;s:12:"add-post_tag";i:5;s:15:"add-post_format";i:6;s:15:"add-ia_invitees";i:7;s:21:"add-ia_invited_groups";i:8;s:27:"add-bp_docs_associated_item";i:9;s:18:"add-bp_docs_access";i:10;s:15:"add-bp_docs_tag";}'),
(59, 1, 'closedpostboxes_slideshow', 'a:0:{}'),
(60, 1, 'metaboxhidden_slideshow', 'a:1:{i:3;s:7:"slugdiv";}'),
(61, 1, 'meta-box-order_dashboard', 'a:4:{s:6:"normal";s:19:"dashboard_right_now";s:4:"side";s:18:"dashboard_activity";s:7:"column3";s:0:"";s:7:"column4";s:0:"";}'),
(62, 1, 'meta-box-order_slideshow', 'a:3:{s:4:"side";s:27:"submitdiv,slides-list,,,,,,";s:6:"normal";s:34:"information,slugdiv,style,settings";s:8:"advanced";s:0:"";}'),
(63, 1, 'screen_layout_slideshow', '2'),
(64, 1, 'ass_digest_items', 'a:1:{s:3:"dig";a:10:{i:2;a:1:{i:0;i:11;}i:1;a:5:{i:0;i:12;i:1;i:49;i:2;i:50;i:3;i:52;i:4;i:54;}i:5;a:1:{i:0;i:15;}i:9;a:1:{i:0;i:20;}i:14;a:4:{i:0;i:27;i:1;i:34;i:2;i:44;i:3;i:47;}i:15;a:2:{i:0;i:29;i:1;i:43;}i:16;a:1:{i:0;i:31;}i:17;a:5:{i:0;i:33;i:1;i:42;i:2;i:45;i:3;i:55;i:4;i:55;}i:18;a:1:{i:0;i:38;}i:19;a:1:{i:0;i:41;}}}'),
(66, 2, 'closedpostboxes_gce_feed', 'a:1:{i:0;s:21:"gce_feed_sidebar_help";}'),
(67, 2, 'metaboxhidden_gce_feed', 'a:1:{i:0;s:7:"slugdiv";}'),
(68, 1, 'closedpostboxes_gce_feed', 'a:0:{}'),
(69, 1, 'metaboxhidden_gce_feed', 'a:2:{i:0;s:24:"gce_display_options_meta";i:1;s:7:"slugdiv";}'),
(70, 2, 'bp_docs_count', '4'),
(73, 2, 'meta-box-order_page', 'a:3:{s:4:"side";s:23:"submitdiv,pageparentdiv";s:6:"normal";s:16:"commentstatusdiv";s:8:"advanced";s:0:"";}'),
(74, 2, 'metaboxhidden_page', 'a:5:{i:0;s:9:"authordiv";i:1;s:11:"commentsdiv";i:2;s:16:"commentstatusdiv";i:3;s:12:"revisionsdiv";i:4;s:7:"slugdiv";}'),
(75, 2, 'closedpostboxes_page', 'a:1:{i:0;s:11:"layout_meta";}'),
(76, 2, 'meta-box-order_post', 'a:3:{s:4:"side";s:66:"submitdiv,postimagediv,postexcerpt,formatdiv,metabox1,tagsdiv-post";s:6:"normal";s:11:"categorydiv";s:8:"advanced";s:0:"";}'),
(77, 2, 'metaboxhidden_post', 'a:4:{i:0;s:16:"commentstatusdiv";i:1;s:11:"commentsdiv";i:2;s:7:"slugdiv";i:3;s:9:"authordiv";}'),
(79, 2, 'closedpostboxes_post', 'a:0:{}'),
(85, 1, 'meta-box-order_page', 'a:3:{s:4:"side";s:23:"submitdiv,pageparentdiv";s:6:"normal";s:16:"commentstatusdiv";s:8:"advanced";s:0:"";}'),
(86, 1, 'metaboxhidden_page', 'a:5:{i:0;s:9:"authordiv";i:1;s:11:"commentsdiv";i:2;s:16:"commentstatusdiv";i:3;s:12:"revisionsdiv";i:4;s:7:"slugdiv";}'),
(87, 1, 'closedpostboxes_page', 'a:1:{i:0;s:11:"layout_meta";}'),
(88, 2, 'session_tokens', 'a:1:{s:64:"e56e59a37e0b4d9413041c4ad2028ea77f6f311b84164c4072638eb3ba6aa4d2";a:4:{s:10:"expiration";i:1557917173;s:2:"ip";s:11:"10.155.7.35";s:2:"ua";s:76:"Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:66.0) Gecko/20100101 Firefox/66.0";s:5:"login";i:1557744373;}}'),
(90, 2, 'bp_latest_update', 'a:2:{s:2:"id";i:60;s:7:"content";s:64:"\n[bpfb_images]\n2_0-70382500-1466151622_vision.png\n[/bpfb_images]";}'),
(91, 1, 'session_tokens', 'a:1:{s:64:"33132fe5e5e216038d1b5ab74ca1507ba885b5a73140b4e33b71869f296646e8";a:4:{s:10:"expiration";i:1480244790;s:2:"ip";s:11:"10.155.7.35";s:2:"ua";s:76:"Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:50.0) Gecko/20100101 Firefox/50.0";s:5:"login";i:1480071990;}}');

-- --------------------------------------------------------

--
-- Estructura de la taula `wp_users`
--

CREATE TABLE IF NOT EXISTS `wp_users` (
`ID` bigint(20) unsigned NOT NULL,
  `user_login` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_pass` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_nicename` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_url` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_registered` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `user_activation_key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_status` int(11) NOT NULL DEFAULT '0',
  `display_name` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Bolcant dades de la taula `wp_users`
--

INSERT INTO `wp_users` (`ID`, `user_login`, `user_pass`, `user_nicename`, `user_email`, `user_url`, `user_registered`, `user_activation_key`, `user_status`, `display_name`) VALUES
(1, 'admin', '', 'admin', 'a8000010@xtec.cat', '', '2014-09-12 09:43:38', '', 0, 'admin'),
(2, 'xtecadmin', '', 'xtecadmin', 'agora@xtec.invalid', '', '2014-09-12 09:45:10', '', 0, 'xtecadmin');

-- --------------------------------------------------------

--
-- Estructura de la taula `wp_wsluserscontacts`
--

CREATE TABLE IF NOT EXISTS `wp_wsluserscontacts` (
`id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `provider` varchar(50) NOT NULL,
  `identifier` varchar(255) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `profile_url` varchar(255) NOT NULL,
  `photo_url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de la taula `wp_wslusersprofiles`
--

CREATE TABLE IF NOT EXISTS `wp_wslusersprofiles` (
`id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `provider` varchar(255) NOT NULL,
  `object_sha` varchar(255) NOT NULL COMMENT 'to check if hybridauth user profile object has changed from last time, if yes we update the user profile here ',
  `identifier` varchar(255) NOT NULL,
  `profileurl` varchar(255) NOT NULL,
  `websiteurl` varchar(255) NOT NULL,
  `photourl` varchar(255) NOT NULL,
  `displayname` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `language` varchar(255) NOT NULL,
  `age` varchar(255) NOT NULL,
  `birthday` varchar(255) NOT NULL,
  `birthmonth` varchar(255) NOT NULL,
  `birthyear` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `emailverified` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `region` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `zip` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `wp_bpges_queued_items`
--
ALTER TABLE `wp_bpges_queued_items`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `user_group_activity_type` (`user_id`,`group_id`,`activity_id`,`type`), ADD KEY `user_id` (`user_id`), ADD KEY `group_id` (`group_id`), ADD KEY `activity_id` (`activity_id`), ADD KEY `user_group_type_date` (`user_id`,`type`,`date_recorded`);

--
-- Indexes for table `wp_bpges_subscriptions`
--
ALTER TABLE `wp_bpges_subscriptions`
 ADD PRIMARY KEY (`id`), ADD KEY `user_id` (`user_id`), ADD KEY `group_id` (`group_id`), ADD KEY `user_type` (`user_id`,`type`);

--
-- Indexes for table `wp_bp_activity`
--
ALTER TABLE `wp_bp_activity`
 ADD PRIMARY KEY (`id`), ADD KEY `date_recorded` (`date_recorded`), ADD KEY `user_id` (`user_id`), ADD KEY `item_id` (`item_id`), ADD KEY `secondary_item_id` (`secondary_item_id`), ADD KEY `component` (`component`), ADD KEY `type` (`type`), ADD KEY `mptt_left` (`mptt_left`), ADD KEY `mptt_right` (`mptt_right`), ADD KEY `hide_sitewide` (`hide_sitewide`), ADD KEY `is_spam` (`is_spam`);

--
-- Indexes for table `wp_bp_activity_meta`
--
ALTER TABLE `wp_bp_activity_meta`
 ADD PRIMARY KEY (`id`), ADD KEY `activity_id` (`activity_id`), ADD KEY `meta_key` (`meta_key`(191));

--
-- Indexes for table `wp_bp_friends`
--
ALTER TABLE `wp_bp_friends`
 ADD PRIMARY KEY (`id`), ADD KEY `initiator_user_id` (`initiator_user_id`), ADD KEY `friend_user_id` (`friend_user_id`);

--
-- Indexes for table `wp_bp_groups`
--
ALTER TABLE `wp_bp_groups`
 ADD PRIMARY KEY (`id`), ADD KEY `creator_id` (`creator_id`), ADD KEY `status` (`status`), ADD KEY `parent_id` (`parent_id`);

--
-- Indexes for table `wp_bp_groups_groupmeta`
--
ALTER TABLE `wp_bp_groups_groupmeta`
 ADD PRIMARY KEY (`id`), ADD KEY `group_id` (`group_id`), ADD KEY `meta_key` (`meta_key`(191));

--
-- Indexes for table `wp_bp_groups_members`
--
ALTER TABLE `wp_bp_groups_members`
 ADD PRIMARY KEY (`id`), ADD KEY `group_id` (`group_id`), ADD KEY `is_admin` (`is_admin`), ADD KEY `is_mod` (`is_mod`), ADD KEY `user_id` (`user_id`), ADD KEY `inviter_id` (`inviter_id`), ADD KEY `is_confirmed` (`is_confirmed`);

--
-- Indexes for table `wp_bp_messages_messages`
--
ALTER TABLE `wp_bp_messages_messages`
 ADD PRIMARY KEY (`id`), ADD KEY `sender_id` (`sender_id`), ADD KEY `thread_id` (`thread_id`);

--
-- Indexes for table `wp_bp_messages_meta`
--
ALTER TABLE `wp_bp_messages_meta`
 ADD PRIMARY KEY (`id`), ADD KEY `message_id` (`message_id`), ADD KEY `meta_key` (`meta_key`(191));

--
-- Indexes for table `wp_bp_messages_notices`
--
ALTER TABLE `wp_bp_messages_notices`
 ADD PRIMARY KEY (`id`), ADD KEY `is_active` (`is_active`);

--
-- Indexes for table `wp_bp_messages_recipients`
--
ALTER TABLE `wp_bp_messages_recipients`
 ADD PRIMARY KEY (`id`), ADD KEY `user_id` (`user_id`), ADD KEY `thread_id` (`thread_id`), ADD KEY `is_deleted` (`is_deleted`), ADD KEY `sender_only` (`sender_only`), ADD KEY `unread_count` (`unread_count`);

--
-- Indexes for table `wp_bp_mod_contents`
--
ALTER TABLE `wp_bp_mod_contents`
 ADD PRIMARY KEY (`content_id`), ADD KEY `item_type` (`item_type`), ADD KEY `item_id` (`item_id`), ADD KEY `item_id2` (`item_id2`), ADD KEY `item_author` (`item_author`), ADD KEY `item_date` (`item_date`), ADD KEY `status` (`status`);

--
-- Indexes for table `wp_bp_mod_flags`
--
ALTER TABLE `wp_bp_mod_flags`
 ADD PRIMARY KEY (`flag_id`), ADD KEY `content_id` (`content_id`), ADD KEY `reporter_id` (`reporter_id`), ADD KEY `date` (`date`);

--
-- Indexes for table `wp_bp_notifications`
--
ALTER TABLE `wp_bp_notifications`
 ADD PRIMARY KEY (`id`), ADD KEY `item_id` (`item_id`), ADD KEY `secondary_item_id` (`secondary_item_id`), ADD KEY `user_id` (`user_id`), ADD KEY `is_new` (`is_new`), ADD KEY `component_name` (`component_name`), ADD KEY `component_action` (`component_action`), ADD KEY `useritem` (`user_id`,`is_new`);

--
-- Indexes for table `wp_bp_notifications_meta`
--
ALTER TABLE `wp_bp_notifications_meta`
 ADD PRIMARY KEY (`id`), ADD KEY `notification_id` (`notification_id`), ADD KEY `meta_key` (`meta_key`(191));

--
-- Indexes for table `wp_bp_xprofile_data`
--
ALTER TABLE `wp_bp_xprofile_data`
 ADD PRIMARY KEY (`id`), ADD KEY `field_id` (`field_id`), ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `wp_bp_xprofile_fields`
--
ALTER TABLE `wp_bp_xprofile_fields`
 ADD PRIMARY KEY (`id`), ADD KEY `group_id` (`group_id`), ADD KEY `parent_id` (`parent_id`), ADD KEY `field_order` (`field_order`), ADD KEY `can_delete` (`can_delete`), ADD KEY `is_required` (`is_required`);

--
-- Indexes for table `wp_bp_xprofile_groups`
--
ALTER TABLE `wp_bp_xprofile_groups`
 ADD PRIMARY KEY (`id`), ADD KEY `can_delete` (`can_delete`);

--
-- Indexes for table `wp_bp_xprofile_meta`
--
ALTER TABLE `wp_bp_xprofile_meta`
 ADD PRIMARY KEY (`id`), ADD KEY `object_id` (`object_id`), ADD KEY `meta_key` (`meta_key`(191));

--
-- Indexes for table `wp_commentmeta`
--
ALTER TABLE `wp_commentmeta`
 ADD PRIMARY KEY (`meta_id`), ADD KEY `comment_id` (`comment_id`), ADD KEY `meta_key` (`meta_key`(191));

--
-- Indexes for table `wp_comments`
--
ALTER TABLE `wp_comments`
 ADD PRIMARY KEY (`comment_ID`), ADD KEY `comment_post_ID` (`comment_post_ID`), ADD KEY `comment_approved_date_gmt` (`comment_approved`,`comment_date_gmt`), ADD KEY `comment_date_gmt` (`comment_date_gmt`), ADD KEY `comment_parent` (`comment_parent`), ADD KEY `comment_author_email` (`comment_author_email`(10));

--
-- Indexes for table `wp_ig_blocked_emails`
--
ALTER TABLE `wp_ig_blocked_emails`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wp_ig_campaigns`
--
ALTER TABLE `wp_ig_campaigns`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wp_ig_contacts`
--
ALTER TABLE `wp_ig_contacts`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wp_ig_contacts_ips`
--
ALTER TABLE `wp_ig_contacts_ips`
 ADD PRIMARY KEY (`created_on`,`ip`), ADD KEY `ip` (`ip`);

--
-- Indexes for table `wp_ig_forms`
--
ALTER TABLE `wp_ig_forms`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wp_ig_lists`
--
ALTER TABLE `wp_ig_lists`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wp_ig_lists_contacts`
--
ALTER TABLE `wp_ig_lists_contacts`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wp_ig_mailing_queue`
--
ALTER TABLE `wp_ig_mailing_queue`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wp_ig_sending_queue`
--
ALTER TABLE `wp_ig_sending_queue`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wp_links`
--
ALTER TABLE `wp_links`
 ADD PRIMARY KEY (`link_id`), ADD KEY `link_visible` (`link_visible`);

--
-- Indexes for table `wp_options`
--
ALTER TABLE `wp_options`
 ADD PRIMARY KEY (`option_id`), ADD UNIQUE KEY `option_name` (`option_name`);

--
-- Indexes for table `wp_postmeta`
--
ALTER TABLE `wp_postmeta`
 ADD PRIMARY KEY (`meta_id`), ADD KEY `post_id` (`post_id`), ADD KEY `meta_key` (`meta_key`(191));

--
-- Indexes for table `wp_posts`
--
ALTER TABLE `wp_posts`
 ADD PRIMARY KEY (`ID`), ADD KEY `type_status_date` (`post_type`,`post_status`,`post_date`,`ID`), ADD KEY `post_parent` (`post_parent`), ADD KEY `post_author` (`post_author`), ADD KEY `post_name` (`post_name`(191));

--
-- Indexes for table `wp_signups`
--
ALTER TABLE `wp_signups`
 ADD PRIMARY KEY (`signup_id`), ADD KEY `activation_key` (`activation_key`), ADD KEY `user_email` (`user_email`), ADD KEY `user_login_email` (`user_login`,`user_email`), ADD KEY `domain_path` (`domain`,`path`);

--
-- Indexes for table `wp_stats`
--
ALTER TABLE `wp_stats`
 ADD PRIMARY KEY (`stat_id`), ADD KEY `uid` (`uid`), ADD KEY `ip` (`ip`), ADD KEY `ipForward` (`ipForward`), ADD KEY `ipClient` (`ipClient`), ADD KEY `userAgent` (`userAgent`), ADD KEY `isadmin` (`isadmin`);

--
-- Indexes for table `wp_termmeta`
--
ALTER TABLE `wp_termmeta`
 ADD PRIMARY KEY (`meta_id`), ADD KEY `term_id` (`term_id`), ADD KEY `meta_key` (`meta_key`(191));

--
-- Indexes for table `wp_terms`
--
ALTER TABLE `wp_terms`
 ADD PRIMARY KEY (`term_id`), ADD KEY `name` (`name`(191)), ADD KEY `slug` (`slug`(191));

--
-- Indexes for table `wp_term_relationships`
--
ALTER TABLE `wp_term_relationships`
 ADD PRIMARY KEY (`object_id`,`term_taxonomy_id`), ADD KEY `term_taxonomy_id` (`term_taxonomy_id`);

--
-- Indexes for table `wp_term_taxonomy`
--
ALTER TABLE `wp_term_taxonomy`
 ADD PRIMARY KEY (`term_taxonomy_id`), ADD UNIQUE KEY `term_id_taxonomy` (`term_id`,`taxonomy`), ADD KEY `taxonomy` (`taxonomy`);

--
-- Indexes for table `wp_usermeta`
--
ALTER TABLE `wp_usermeta`
 ADD PRIMARY KEY (`umeta_id`), ADD KEY `user_id` (`user_id`), ADD KEY `meta_key` (`meta_key`(191));

--
-- Indexes for table `wp_users`
--
ALTER TABLE `wp_users`
 ADD PRIMARY KEY (`ID`), ADD KEY `user_login_key` (`user_login`), ADD KEY `user_nicename` (`user_nicename`), ADD KEY `user_email` (`user_email`);

--
-- Indexes for table `wp_wsluserscontacts`
--
ALTER TABLE `wp_wsluserscontacts`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wp_wslusersprofiles`
--
ALTER TABLE `wp_wslusersprofiles`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `wp_bpges_queued_items`
--
ALTER TABLE `wp_bpges_queued_items`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `wp_bpges_subscriptions`
--
ALTER TABLE `wp_bpges_subscriptions`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `wp_bp_activity`
--
ALTER TABLE `wp_bp_activity`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=61;
--
-- AUTO_INCREMENT for table `wp_bp_activity_meta`
--
ALTER TABLE `wp_bp_activity_meta`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `wp_bp_friends`
--
ALTER TABLE `wp_bp_friends`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `wp_bp_groups`
--
ALTER TABLE `wp_bp_groups`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `wp_bp_groups_groupmeta`
--
ALTER TABLE `wp_bp_groups_groupmeta`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=158;
--
-- AUTO_INCREMENT for table `wp_bp_groups_members`
--
ALTER TABLE `wp_bp_groups_members`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `wp_bp_messages_messages`
--
ALTER TABLE `wp_bp_messages_messages`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `wp_bp_messages_meta`
--
ALTER TABLE `wp_bp_messages_meta`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `wp_bp_messages_notices`
--
ALTER TABLE `wp_bp_messages_notices`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `wp_bp_messages_recipients`
--
ALTER TABLE `wp_bp_messages_recipients`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `wp_bp_mod_contents`
--
ALTER TABLE `wp_bp_mod_contents`
MODIFY `content_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `wp_bp_mod_flags`
--
ALTER TABLE `wp_bp_mod_flags`
MODIFY `flag_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `wp_bp_notifications`
--
ALTER TABLE `wp_bp_notifications`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `wp_bp_notifications_meta`
--
ALTER TABLE `wp_bp_notifications_meta`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `wp_bp_xprofile_data`
--
ALTER TABLE `wp_bp_xprofile_data`
MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `wp_bp_xprofile_fields`
--
ALTER TABLE `wp_bp_xprofile_fields`
MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `wp_bp_xprofile_groups`
--
ALTER TABLE `wp_bp_xprofile_groups`
MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `wp_bp_xprofile_meta`
--
ALTER TABLE `wp_bp_xprofile_meta`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `wp_commentmeta`
--
ALTER TABLE `wp_commentmeta`
MODIFY `meta_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `wp_comments`
--
ALTER TABLE `wp_comments`
MODIFY `comment_ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `wp_ig_campaigns`
--
ALTER TABLE `wp_ig_campaigns`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `wp_ig_contacts`
--
ALTER TABLE `wp_ig_contacts`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `wp_ig_forms`
--
ALTER TABLE `wp_ig_forms`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `wp_ig_lists`
--
ALTER TABLE `wp_ig_lists`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `wp_ig_lists_contacts`
--
ALTER TABLE `wp_ig_lists_contacts`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `wp_ig_mailing_queue`
--
ALTER TABLE `wp_ig_mailing_queue`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `wp_ig_sending_queue`
--
ALTER TABLE `wp_ig_sending_queue`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `wp_links`
--
ALTER TABLE `wp_links`
MODIFY `link_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `wp_options`
--
ALTER TABLE `wp_options`
MODIFY `option_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9655;
--
-- AUTO_INCREMENT for table `wp_postmeta`
--
ALTER TABLE `wp_postmeta`
MODIFY `meta_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3082;
--
-- AUTO_INCREMENT for table `wp_posts`
--
ALTER TABLE `wp_posts`
MODIFY `ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=604;
--
-- AUTO_INCREMENT for table `wp_signups`
--
ALTER TABLE `wp_signups`
MODIFY `signup_id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `wp_stats`
--
ALTER TABLE `wp_stats`
MODIFY `stat_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `wp_termmeta`
--
ALTER TABLE `wp_termmeta`
MODIFY `meta_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `wp_terms`
--
ALTER TABLE `wp_terms`
MODIFY `term_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=115;
--
-- AUTO_INCREMENT for table `wp_term_taxonomy`
--
ALTER TABLE `wp_term_taxonomy`
MODIFY `term_taxonomy_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=119;
--
-- AUTO_INCREMENT for table `wp_usermeta`
--
ALTER TABLE `wp_usermeta`
MODIFY `umeta_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=94;
--
-- AUTO_INCREMENT for table `wp_users`
--
ALTER TABLE `wp_users`
MODIFY `ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `wp_wsluserscontacts`
--
ALTER TABLE `wp_wsluserscontacts`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `wp_wslusersprofiles`
--
ALTER TABLE `wp_wslusersprofiles`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
