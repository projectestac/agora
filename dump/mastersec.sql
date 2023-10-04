-- phpMyAdmin SQL Dump
-- version 4.2.13.3
-- http://www.phpmyadmin.net
--
-- Host: pdb-int:3308
-- Generation Time: 18-10-2019 a les 12:54:45
-- Versió del servidor: 5.6.35-log
-- PHP Version: 7.0.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `usu7`
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
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(19, 1, 19, 'dig');

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
) ENGINE=InnoDB AUTO_INCREMENT=151 DEFAULT CHARSET=utf8;

--
-- Bolcant dades de la taula `wp_bp_activity`
--

INSERT INTO `wp_bp_activity` (`id`, `user_id`, `component`, `type`, `action`, `content`, `primary_link`, `item_id`, `secondary_item_id`, `date_recorded`, `hide_sitewide`, `mptt_left`, `mptt_right`, `is_spam`) VALUES
(1, 2, 'members', 'last_activity', '', '', '', 0, NULL, '2019-05-13 12:44:25', 0, 0, 0, 0),
(3, 1, 'groups', 'created_group', '<a href="https://pwc-int.educacio.intranet/agora/mastersec/membres/admin/" title="admin">admin</a> ha creat el node <a href="https://pwc-int.educacio.intranet/agora/mastersec/nodes/dep-ciencies/">Dep. Ciències</a>', '', 'https://pwc-int.educacio.intranet/agora/mastersec/membres/admin/', 2, 0, '2014-09-18 17:21:36', 1, 0, 0, 0),
(4, 1, 'groups', 'created_group', '<a href="https://pwc-int.educacio.intranet/agora/mastersec/membres/admin/" title="admin">admin</a> ha creat el node <a href="https://pwc-int.educacio.intranet/agora/mastersec/nodes/dep-socials/">Dep. Socials</a>', '', 'https://pwc-int.educacio.intranet/agora/mastersec/membres/admin/', 3, 0, '2014-09-18 17:40:59', 1, 0, 0, 0),
(5, 1, 'groups', 'activity_update', '<a href="https://pwc-int.educacio.intranet/agora/mastersec/membres/admin/" title="admin">admin</a> ha fet una actualització al node <a href="https://pwc-int.educacio.intranet/agora/mastersec/nodes/dep-socials/">Dep. Socials</a>', 'Primer missatge al mur del Departament de Socials. ', 'https://pwc-int.educacio.intranet/agora/mastersec/membres/admin/', 3, 0, '2014-09-19 09:36:09', 1, 0, 0, 0),
(6, 1, 'members', 'last_activity', '', '', '', 0, NULL, '2017-03-24 12:41:15', 0, 0, 0, 0),
(8, 1, 'groups', 'joined_group', '<a href="https://pwc-int.educacio.intranet/agora/mastersec/membres/admin/" title="admin">admin</a> s''ha afegit al node <a href="https://pwc-int.educacio.intranet/agora/mastersec/nodes/dep-socials/">Dep. Socials</a>', '', 'https://pwc-int.educacio.intranet/agora/mastersec/membres/xtecadmin/', 3, 0, '2014-09-19 10:03:51', 1, 0, 0, 0),
(9, 1, 'groups', 'joined_group', '<a href="https://pwc-int.educacio.intranet/agora/mastersec/membres/admin/" title="admin">admin</a> s''ha afegit al node <a href="https://pwc-int.educacio.intranet/agora/mastersec/nodes/dep-ciencies/">Dep. Ciències</a>', '', 'https://pwc-int.educacio.intranet/agora/mastersec/membres/xtecadmin/', 2, 0, '2014-09-19 10:04:43', 1, 0, 0, 0),
(11, 1, 'groups', 'activity_update', '<a href="https://pwc-int.educacio.intranet/agora/mastersec/membres/admin/" title="admin">admin</a> ha fet una actualització al node <a href="https://pwc-int.educacio.intranet/agora/mastersec/nodes/dep-ciencies/">Dep. Ciències</a>', 'Primer missatge al mur del departament de ciències ', 'https://pwc-int.educacio.intranet/agora/mastersec/membres/admin/', 2, 0, '2014-09-19 16:13:07', 1, 0, 0, 0),
(12, 1, 'groups', 'activity_update', '<a href="https://pwc-int.educacio.intranet/agora/mastersec/membres/admin/" title="admin">admin</a> ha fet una actualització al node <a href="https://pwc-int.educacio.intranet/agora/mastersec/nodes/professorat/">Professorat</a>', 'Primer missatge al mur del professorat\n', 'https://pwc-int.educacio.intranet/agora/mastersec/membres/admin/', 1, 0, '2014-09-19 16:13:26', 1, 0, 0, 0),
(13, 1, 'groups', 'created_group', '<a href="https://pwc-int.educacio.intranet/agora/mastersec/membres/admin/" title="admin">admin</a> ha creat el node <a href="https://pwc-int.educacio.intranet/agora/mastersec/nodes/tecnologia/">Tecnologia</a>', '', 'https://pwc-int.educacio.intranet/agora/mastersec/membres/admin/', 4, 0, '2014-09-19 16:17:04', 1, 0, 0, 0),
(14, 1, 'groups', 'created_group', '<a href="https://pwc-int.educacio.intranet/agora/mastersec/membres/admin/" title="admin">admin</a> ha creat el node <a href="https://pwc-int.educacio.intranet/agora/mastersec/nodes/dep-matematiques/">Dep. Matemàtiques</a>', '', 'https://pwc-int.educacio.intranet/agora/mastersec/membres/admin/', 5, 0, '2014-09-19 16:19:50', 1, 0, 0, 0),
(15, 1, 'groups', 'activity_update', '<a href="https://pwc-int.educacio.intranet/agora/mastersec/membres/admin/" title="admin">admin</a> ha fet una actualització al node <a href="https://pwc-int.educacio.intranet/agora/mastersec/nodes/dep-matematiques/">Dep. Matemàtiques</a>', 'Primer missatge en el departament de Matemàtiques', 'https://pwc-int.educacio.intranet/agora/mastersec/membres/admin/', 5, 0, '2014-09-19 16:23:40', 1, 0, 0, 0),
(16, 1, 'groups', 'created_group', '<a href="https://pwc-int.educacio.intranet/agora/mastersec/membres/admin/" title="admin">admin</a> ha creat el node <a href="https://pwc-int.educacio.intranet/agora/mastersec/nodes/dep-catala-989465410/">Dep. Català</a>', '', 'https://pwc-int.educacio.intranet/agora/mastersec/membres/admin/', 6, 0, '2014-09-19 16:27:08', 1, 0, 0, 0),
(17, 1, 'groups', 'created_group', '<a href="https://pwc-int.educacio.intranet/agora/mastersec/membres/admin/" title="admin">admin</a> ha creat el node <a href="https://pwc-int.educacio.intranet/agora/mastersec/nodes/dep-castella/">Dep. Castellà</a>', '', 'https://pwc-int.educacio.intranet/agora/mastersec/membres/admin/', 7, 0, '2014-09-19 16:29:52', 1, 0, 0, 0),
(18, 1, 'groups', 'created_group', '<a href="https://pwc-int.educacio.intranet/agora/mastersec/membres/admin/" title="admin">admin</a> ha creat el node <a href="https://pwc-int.educacio.intranet/agora/mastersec/nodes/dep-llengues-estrangeres/">Dep. Llengües estrangeres</a>', '', 'https://pwc-int.educacio.intranet/agora/mastersec/membres/admin/', 8, 0, '2014-09-19 16:31:58', 1, 0, 0, 0),
(19, 1, 'groups', 'created_group', '<a href="https://pwc-int.educacio.intranet/agora/mastersec/membres/admin/" title="admin">admin</a> ha creat el node <a href="https://pwc-int.educacio.intranet/agora/mastersec/nodes/dep-educacio-fisica/">Dep. Educació Física</a>', '', 'https://pwc-int.educacio.intranet/agora/mastersec/membres/admin/', 9, 0, '2014-09-19 16:36:06', 1, 0, 0, 0),
(20, 1, 'groups', 'activity_update', '<a href="https://pwc-int.educacio.intranet/agora/mastersec/membres/admin/" title="admin">admin</a> ha fet una actualització al node <a href="https://pwc-int.educacio.intranet/agora/mastersec/nodes/dep-educacio-fisica/">Dep. Educació Física</a>', 'Primer missatge en el mur del departament d''''Educació Física', 'https://pwc-int.educacio.intranet/agora/mastersec/membres/admin/', 9, 0, '2014-09-19 16:36:27', 1, 0, 0, 0),
(21, 1, 'groups', 'created_group', '<a href="https://pwc-int.educacio.intranet/agora/mastersec/membres/admin/" title="admin">admin</a> ha creat el node <a href="https://pwc-int.educacio.intranet/agora/mastersec/nodes/dep-visual-i-plastica-1766120807/">Dep. Visual i Plàstica</a>', '', 'https://pwc-int.educacio.intranet/agora/mastersec/membres/admin/', 10, 0, '2014-09-19 16:40:20', 1, 0, 0, 0),
(22, 1, 'groups', 'created_group', '<a href="https://pwc-int.educacio.intranet/agora/mastersec/membres/admin/" title="admin">admin</a> ha creat el node <a href="https://pwc-int.educacio.intranet/agora/mastersec/nodes/dep-musica/">Dep. Música</a>', '', 'https://pwc-int.educacio.intranet/agora/mastersec/membres/admin/', 11, 0, '2014-09-19 16:48:34', 1, 0, 0, 0),
(23, 1, 'groups', 'created_group', '<a href="https://pwc-int.educacio.intranet/agora/mastersec/membres/admin/" title="admin">admin</a> ha creat el node <a href="https://pwc-int.educacio.intranet/agora/mastersec/nodes/dep-orientacio/">Dep. Orientació</a>', '', 'https://pwc-int.educacio.intranet/agora/mastersec/membres/admin/', 12, 0, '2014-09-19 16:54:30', 1, 0, 0, 0),
(24, 1, 'groups', 'created_group', '<a href="https://pwc-int.educacio.intranet/agora/mastersec/membres/admin/" title="admin">admin</a> ha creat el node <a href="https://pwc-int.educacio.intranet/agora/mastersec/nodes/dep-informatica/">Dep. Informàtica</a>', '', 'https://pwc-int.educacio.intranet/agora/mastersec/membres/admin/', 13, 0, '2014-09-19 17:01:17', 1, 0, 0, 0),
(34, 1, 'groups', 'activity_update', '<a href="https://pwc-int.educacio.intranet/agora/mastersec/membres/admin/" title="admin">admin</a> ha fet una actualització al node <a href="https://pwc-int.educacio.intranet/agora/mastersec/nodes/educacio-emocional/">Educació emocional</a>', 'Un gran vídeo per reflexionar...\n\nhttps://www.youtube.com/watch?v=wSNYYThX5-g', 'https://pwc-int.educacio.intranet/agora/mastersec/membres/admin/', 14, 0, '2014-09-22 14:36:27', 0, 0, 0, 0),
(35, 1, 'groups', 'bbp_topic_create', '<a href="https://pwc-int.educacio.intranet/agora/mastersec/membres/admin/" rel="nofollow">admin</a> ha començat <a href="https://pwc-int.educacio.intranet/agora/mastersec/nodes/professorat/forum/topic/programa-redes-sobre-educacio-emocional/">Programa Redes sobre educació emocional</a> tema en el fòrum <a href="https://pwc-int.educacio.intranet/agora/mastersec/nodes/professorat/forum/">Professorat</a>', 'Programa Redes sobre l''educació emocional. Molt interessant. Per reflexionar.\n\n\n\n<span><img src="http://img.irtve.es/css/rtve.commons/rtve.header.footer/i/logoRTVEes.png" alt="" /></span> <a title="El aprendizaje social y emocional" href="http://www.rtve.es/alacarta/videos/redes/redes-aprendizaje-social-20130526-2130-169/1839588/"><strong>El aprendizaje social y emocional</strong></a>\n', 'https://pwc-int.educacio.intranet/agora/mastersec/nodes/professorat/forum/topic/programa-redes-sobre-educacio-emocional/', 1, 206, '2014-09-22 14:40:28', 1, 0, 0, 0),
(36, 1, 'groups', 'bbp_topic_create', '<a href="https://pwc-int.educacio.intranet/agora/mastersec/membres/admin/" rel="nofollow">admin</a> ha començat <a href="https://pwc-int.educacio.intranet/agora/mastersec/nodes/professorat/forum/topic/indefensio-apresa/">Indefensió apresa</a> tema en el fòrum <a href="https://pwc-int.educacio.intranet/agora/mastersec/nodes/professorat/forum/">Professorat</a>', 'Un dels objectius de la xarxa Nodes és oferir espais perquè els alumnes es pugin expressar fora de l''aula. Pot ser una eina molt útil especialment pels alumnes que no destaquen pels seus resultats acadèmics i que tenen una baixa autoestima derivada d''una indefensió apresa a l''aula.\n\n', 'https://pwc-int.educacio.intranet/agora/mastersec/nodes/professorat/forum/topic/indefensio-apresa/', 1, 207, '2014-09-22 14:46:13', 1, 0, 0, 0),
(38, 1, 'groups', 'activity_update', '<a href="https://pwc-int.educacio.intranet/agora/mastersec/membres/admin/" title="admin">admin</a> ha fet una actualització al node <a href="https://pwc-int.educacio.intranet/agora/mastersec/nodes/rrr-reduccio-reutilitzacio-i-reciclatge/">RRR – Reducció, Reutilització i Reciclatge</a>', '\n[bpfb_images]\n1_0-44155900-1411397838_koalarrr.jpg\n[/bpfb_images]', 'https://pwc-int.educacio.intranet/agora/mastersec/membres/admin/', 18, 0, '2014-09-22 14:57:18', 0, 0, 0, 0),
(39, 1, 'groups', 'created_group', '<a href="https://pwc-int.educacio.intranet/agora/mastersec/membres/admin/" title="admin">admin</a> ha creat el node <a href="https://pwc-int.educacio.intranet/agora/mastersec/nodes/papiroflexia/">Papiroflexia</a>', '', 'https://pwc-int.educacio.intranet/agora/mastersec/membres/admin/', 19, 0, '2014-09-22 15:08:11', 0, 0, 0, 0),
(40, 1, 'groups', 'bbp_topic_create', '<a href="https://pwc-int.educacio.intranet/agora/mastersec/membres/admin/" rel="nofollow">admin</a> ha començat <a href="https://pwc-int.educacio.intranet/agora/mastersec/nodes/papiroflexia/forum/topic/figura-n-1-la-granota/">Figura n.1: La granota </a> tema en el fòrum <a href="https://pwc-int.educacio.intranet/agora/mastersec/nodes/papiroflexia/forum/">Papiroflexia</a>', 'Hola Noders! Qui s''apunta a fer la granota? Aquí teniu les instruccions:\n\n[caption id="" align="alignnone" width="700"]<img src="https://pwc-int.educacio.intranet/agora/mastersec/wp-content/uploads/usu7/2014/09/granota.png" alt="Instruccions Granota" width="700" height="495" /> Instruccions Granota[/caption]', 'https://pwc-int.educacio.intranet/agora/mastersec/nodes/papiroflexia/forum/topic/figura-n-1-la-granota/', 19, 211, '2014-09-22 15:11:13', 0, 0, 0, 0),
(41, 1, 'groups', 'activity_update', '<a href="https://pwc-int.educacio.intranet/agora/mastersec/membres/admin/" title="admin">admin</a> ha fet una actualització al node <a href="https://pwc-int.educacio.intranet/agora/mastersec/nodes/papiroflexia/">Papiroflexia</a>', 'Pengeu les vostres fotos amb la granota feta!', 'https://pwc-int.educacio.intranet/agora/mastersec/membres/admin/', 19, 0, '2014-09-22 15:12:07', 0, 0, 0, 0),
(43, 1, 'groups', 'activity_update', '<a href="https://pwc-int.educacio.intranet/agora/mastersec/membres/admin/" title="admin">admin</a> ha fet una actualització al node <a href="https://pwc-int.educacio.intranet/agora/mastersec/nodes/cinema/">Cinema</a>', 'Hola Noders! Avui des del node de cinema volem compartir un curtmetratge molt xulo, ple de fantasia.\n\nhttps://www.youtube.com/watch?v=p-yPn2FxxJw', 'https://pwc-int.educacio.intranet/agora/mastersec/membres/admin/', 15, 0, '2014-09-22 15:33:34', 0, 0, 0, 0),
(45, 1, 'groups', 'activity_update', '<a href="https://pwc-int.educacio.intranet/agora/mastersec/membres/admin/" title="admin">admin</a> ha fet una actualització al node <a href="https://pwc-int.educacio.intranet/agora/mastersec/nodes/fotografia/">Fotografia</a>', 'Una foto que vaig fer a Menorca, que us suggereix? \n[bpfb_images]\n1_0-42209200-1411400780_menorca_jmeler.jpg\n[/bpfb_images]', 'https://pwc-int.educacio.intranet/agora/mastersec/membres/admin/', 17, 0, '2014-09-22 15:46:20', 0, 0, 0, 0),
(47, 1, 'groups', 'activity_update', '<a href="https://pwc-int.educacio.intranet/agora/mastersec/membres/admin/" title="admin">admin</a> ha fet una actualització al node <a href="https://pwc-int.educacio.intranet/agora/mastersec/nodes/educacio-emocional/">Educació emocional</a>', 'Bon dia Noders! Avui us compartim un inquietant curtmetratge que ens ha de fer reflexionar sobre l’individualisme… és molt xulo… i fins i tot va guanyar un Oscar!\n\nhttps://www.youtube.com/watch?v=pRUGRPKRAWs', 'https://pwc-int.educacio.intranet/agora/mastersec/membres/admin/', 14, 0, '2014-09-22 15:59:20', 0, 0, 0, 0),
(48, 1, 'groups', 'bbp_topic_create', '<a href="https://pwc-int.educacio.intranet/agora/mastersec/membres/admin/" rel="nofollow">admin</a> ha començat <a href="https://pwc-int.educacio.intranet/agora/mastersec/nodes/professorat/forum/topic/documental-sobre-educacio-emocional/">Documental sobre educació Emocional</a> tema en el fòrum <a href="https://pwc-int.educacio.intranet/agora/mastersec/nodes/professorat/forum/">Professorat</a>', 'Molt recomanable:\nhttps://www.youtube.com/watch?v=PQE4WqQSOcQ', 'https://pwc-int.educacio.intranet/agora/mastersec/nodes/professorat/forum/topic/documental-sobre-educacio-emocional/', 1, 216, '2014-09-22 16:54:13', 1, 0, 0, 0),
(59, 1, 'bp_docs', 'bp_doc_created', '<a href="https://pwc-int.educacio.intranet/agora/mastersec/membres/admin/" title="admin">admin</a> ha creat el document <a href="https://pwc-int.educacio.intranet/agora/mastersec/docs/autoritzacio-drets-dimatge-dades-i-materials-menors-de-14-anys/">Autorització drets d''imatge, dades i materials (menors de 14 anys)</a>', '', 'https://pwc-int.educacio.intranet/agora/mastersec/docs/autoritzacio-drets-dimatge-dades-i-materials-menors-de-14-anys/', 0, 292, '2016-01-21 08:53:14', 0, 0, 0, 0),
(60, 1, 'bp_docs', 'bp_doc_created', '<a href="https://pwc-int.educacio.intranet/agora/mastersec/membres/admin/" title="admin">admin</a> ha creat el document <a href="https://pwc-int.educacio.intranet/agora/mastersec/docs/autoritzacio-drets-dimatge-dades-i-materials-majors-de-14-anys/">Autorització drets d’imatge, dades i materials (majors de 14 anys)</a>', '', 'https://pwc-int.educacio.intranet/agora/mastersec/docs/autoritzacio-drets-dimatge-dades-i-materials-majors-de-14-anys/', 0, 295, '2016-01-21 08:55:49', 0, 0, 0, 0),
(61, 1, 'bp_docs', 'bp_doc_created', '<a href="https://pwc-int.educacio.intranet/agora/mastersec/membres/admin/" title="admin">admin</a> ha creat el document <a href="https://pwc-int.educacio.intranet/agora/mastersec/docs/autoritzacio-us-de-serveis-i-recursos-digitals-a-laula-menors-de-14-anys/">Autorització ús de serveis i recursos digitals a l''aula (menors de 14 anys)</a>', '', 'https://pwc-int.educacio.intranet/agora/mastersec/docs/autoritzacio-us-de-serveis-i-recursos-digitals-a-laula-menors-de-14-anys/', 0, 297, '2016-01-21 08:59:27', 0, 0, 0, 0),
(62, 1, 'bp_docs', 'bp_doc_edited', '<a href="https://pwc-int.educacio.intranet/agora/mastersec/membres/admin/" title="admin">admin</a> ha editat el document <a href="https://pwc-int.educacio.intranet/agora/mastersec/docs/autoritzacio-drets-dimatge-dades-i-materials-majors-de-14-anys/">Autorització drets d’imatge, dades i materials (majors de 14 anys)</a>', '', 'https://pwc-int.educacio.intranet/agora/mastersec/docs/autoritzacio-drets-dimatge-dades-i-materials-majors-de-14-anys/', 0, 295, '2016-01-21 08:59:48', 0, 0, 0, 0),
(63, 1, 'bp_docs', 'bp_doc_edited', '<a href="https://pwc-int.educacio.intranet/agora/mastersec/membres/admin/" title="admin">admin</a> ha editat el document <a href="https://pwc-int.educacio.intranet/agora/mastersec/docs/autoritzacio-drets-dimatge-dades-i-materials-menors-de-14-anys/">Autorització drets d’imatge, dades i materials (menors de 14 anys)</a>', '', 'https://pwc-int.educacio.intranet/agora/mastersec/docs/autoritzacio-drets-dimatge-dades-i-materials-menors-de-14-anys/', 0, 292, '2016-01-21 09:01:29', 0, 0, 0, 0),
(64, 1, 'bp_docs', 'bp_doc_created', '<a href="https://pwc-int.educacio.intranet/agora/mastersec/membres/admin/" title="admin">admin</a> ha creat el document <a href="https://pwc-int.educacio.intranet/agora/mastersec/docs/autoritzacio-us-de-serveis-i-recursos-digitals-a-laula-majors-de-14-anys/">Autorització ús de serveis i recursos digitals a l’aula (majors de 14 anys)</a>', '', 'https://pwc-int.educacio.intranet/agora/mastersec/docs/autoritzacio-us-de-serveis-i-recursos-digitals-a-laula-majors-de-14-anys/', 0, 300, '2016-01-21 09:03:28', 0, 0, 0, 0),
(65, 1, 'bp_docs', 'bp_doc_created', '<a href="https://pwc-int.educacio.intranet/agora/mastersec/membres/admin/" title="admin">admin</a> ha creat el document <a href="https://pwc-int.educacio.intranet/agora/mastersec/docs/autoritzacio-per-a-ladministracio-del-paracetamol/">Autorització per a l''administració del paracetamol</a>', '', 'https://pwc-int.educacio.intranet/agora/mastersec/docs/autoritzacio-per-a-ladministracio-del-paracetamol/', 0, 302, '2016-01-21 09:07:15', 0, 0, 0, 0),
(66, 1, 'bp_docs', 'bp_doc_created', '<a href="https://pwc-int.educacio.intranet/agora/mastersec/membres/admin/" title="admin">admin</a> ha creat el document <a href="https://pwc-int.educacio.intranet/agora/mastersec/docs/justificant-dabsencia-per-motius-de-salut-o-consulta-medica/">Justificant d''absència per motius de salut o consulta mèdica</a>', '', 'https://pwc-int.educacio.intranet/agora/mastersec/docs/justificant-dabsencia-per-motius-de-salut-o-consulta-medica/', 0, 304, '2016-01-21 09:13:32', 0, 0, 0, 0),
(67, 1, 'bp_docs', 'bp_doc_edited', '<a href="https://pwc-int.educacio.intranet/agora/mastersec/membres/admin/" title="admin">admin</a> ha editat el document <a href="https://pwc-int.educacio.intranet/agora/mastersec/docs/autoritzacio-per-a-ladministracio-del-paracetamol/">Autorització per a l’administració del paracetamol</a>', '', 'https://pwc-int.educacio.intranet/agora/mastersec/docs/autoritzacio-per-a-ladministracio-del-paracetamol/', 0, 302, '2016-01-21 09:14:08', 0, 0, 0, 0),
(75, 1, 'bp_docs', 'bp_doc_created', '<a href="https://pwc-int.educacio.intranet/agora/mastersec/membres/admin/" title="admin">admin</a> ha creat el document <a href="https://pwc-int.educacio.intranet/agora/mastersec/docs/sol%c2%b7licitud-de-cursar-materies-de-batxillerat-a-ioc/">Sol·licitud de cursar matèries de batxillerat a IOC</a>', '', 'https://pwc-int.educacio.intranet/agora/mastersec/docs/sol%c2%b7licitud-de-cursar-materies-de-batxillerat-a-ioc/', 0, 307, '2016-01-21 10:48:31', 0, 0, 0, 0),
(76, 1, 'bp_docs', 'bp_doc_edited', '<a href="https://pwc-int.educacio.intranet/agora/mastersec/membres/admin/" title="admin">admin</a> ha editat el document <a href="https://pwc-int.educacio.intranet/agora/mastersec/docs/sol%c2%b7licitud-de-cursar-materies-de-batxillerat-a-ioc/">Sol·licitud de cursar matèries de batxillerat a IOC</a>', '', 'https://pwc-int.educacio.intranet/agora/mastersec/docs/sol%c2%b7licitud-de-cursar-materies-de-batxillerat-a-ioc/', 0, 307, '2016-01-21 10:48:55', 0, 0, 0, 0),
(83, 1, 'bp_docs', 'bp_doc_created', '<a href="https://pwc-int.educacio.intranet/agora/mastersec/membres/admin/" title="admin">admin</a> ha creat el document <a href="https://pwc-int.educacio.intranet/agora/mastersec/docs/sol%c2%b7licitud-generica/">Sol·licitud (genèrica)</a>', '', 'https://pwc-int.educacio.intranet/agora/mastersec/docs/sol%c2%b7licitud-generica/', 0, 328, '2016-01-21 11:22:12', 0, 0, 0, 0),
(88, 1, 'bp_docs', 'bp_doc_created', '<a href="https://pwc-int.educacio.intranet/agora/mastersec/membres/admin/" title="admin">admin</a> ha creat el document <a href="https://pwc-int.educacio.intranet/agora/mastersec/docs/sol%c2%b7licitud-de-control-de-glucosa-i-administracio-dinsulina/">Sol·licitud de control de glucosa i administració d’insulina</a>', '', 'https://pwc-int.educacio.intranet/agora/mastersec/docs/sol%c2%b7licitud-de-control-de-glucosa-i-administracio-dinsulina/', 0, 336, '2016-01-21 12:05:41', 0, 0, 0, 0),
(89, 1, 'bp_docs', 'bp_doc_created', '<a href="https://pwc-int.educacio.intranet/agora/mastersec/membres/admin/" title="admin">admin</a> ha creat el document <a href="https://pwc-int.educacio.intranet/agora/mastersec/docs/sol%c2%b7licitud-i-autoritzacio-dadministracio-de-glucago-als-alumnes-amb-diabetis/">Sol·licitud i autorització d’administració de glucagó als alumnes amb diabetis</a>', '', 'https://pwc-int.educacio.intranet/agora/mastersec/docs/sol%c2%b7licitud-i-autoritzacio-dadministracio-de-glucago-als-alumnes-amb-diabetis/', 0, 338, '2016-01-21 12:08:02', 0, 0, 0, 0),
(90, 1, 'bp_docs', 'bp_doc_created', '<a href="https://pwc-int.educacio.intranet/agora/mastersec/membres/admin/" title="admin">admin</a> ha creat el document <a href="https://pwc-int.educacio.intranet/agora/mastersec/docs/orientacions-per-elaborar-la-carta-de-compromis/">Orientacions per elaborar la carta de compromís</a>', '', 'https://pwc-int.educacio.intranet/agora/mastersec/docs/orientacions-per-elaborar-la-carta-de-compromis/', 0, 339, '2016-01-21 12:08:38', 0, 0, 0, 0),
(100, 1, 'bp_docs', 'bp_doc_created', '<a href="https://pwc-int.educacio.intranet/agora/mastersec/membres/admin/" title="admin">admin</a> ha creat el document <a href="https://pwc-int.educacio.intranet/agora/mastersec/docs/participacio-de-la-comunitat-educativa/">Participació de la comunitat educativa</a>', '', 'https://pwc-int.educacio.intranet/agora/mastersec/docs/participacio-de-la-comunitat-educativa/', 0, 360, '2016-01-21 12:21:29', 0, 0, 0, 0),
(104, 1, 'bp_docs', 'bp_doc_created', '<a href="https://pwc-int.educacio.intranet/agora/mastersec/membres/admin/" title="admin">admin</a> ha creat el document <a href="https://pwc-int.educacio.intranet/agora/mastersec/docs/sol%c2%b7licitud-de-titol-academic-i-professional-no-universitari/">Sol·licitud de títol acadèmic i professional no universitari</a>', '', 'https://pwc-int.educacio.intranet/agora/mastersec/docs/sol%c2%b7licitud-de-titol-academic-i-professional-no-universitari/', 0, 368, '2016-01-21 13:02:19', 0, 0, 0, 0),
(105, 1, 'bp_docs', 'bp_doc_created', '<a href="https://pwc-int.educacio.intranet/agora/mastersec/membres/admin/" title="admin">admin</a> ha creat el document <a href="https://pwc-int.educacio.intranet/agora/mastersec/docs/sol%c2%b7licitud-de-duplicat-de-titol-academic-i-professional-no-universitari/">Sol·licitud de duplicat de títol acadèmic i professional no universitari</a>', '', 'https://pwc-int.educacio.intranet/agora/mastersec/docs/sol%c2%b7licitud-de-duplicat-de-titol-academic-i-professional-no-universitari/', 0, 370, '2016-01-21 13:04:12', 0, 0, 0, 0),
(113, 1, 'bp_docs', 'bp_doc_edited', '<a href="https://pwc-int.educacio.intranet/agora/mastersec/membres/admin/" title="admin">admin</a> ha editat el document <a href="https://pwc-int.educacio.intranet/agora/mastersec/docs/participacio-de-la-comunitat-educativa/">Participació de la comunitat educativa</a>', '', 'https://pwc-int.educacio.intranet/agora/mastersec/docs/participacio-de-la-comunitat-educativa/', 0, 360, '2016-01-21 14:03:53', 0, 0, 0, 0),
(118, 1, 'bp_docs', 'bp_doc_created', '<a href="https://pwc-int.educacio.intranet/agora/mastersec/membres/admin/" title="admin">admin</a> ha creat el document <a href="https://pwc-int.educacio.intranet/agora/mastersec/docs/documents-administratius/">Documents administratius</a>', '', 'https://pwc-int.educacio.intranet/agora/mastersec/docs/documents-administratius/', 0, 379, '2016-01-21 15:13:07', 0, 0, 0, 0),
(119, 1, 'bp_docs', 'bp_doc_edited', '<a href="https://pwc-int.educacio.intranet/agora/mastersec/membres/admin/" title="admin">admin</a> ha editat el document <a href="https://pwc-int.educacio.intranet/agora/mastersec/docs/documents-administratius/">Documents administratius</a>', '', 'https://pwc-int.educacio.intranet/agora/mastersec/docs/documents-administratius/', 0, 379, '2016-01-21 15:13:29', 0, 0, 0, 0),
(120, 1, 'bp_docs', 'bp_doc_edited', '<a href="https://pwc-int.educacio.intranet/agora/mastersec/membres/admin/" title="admin">admin</a> ha editat el document <a href="https://pwc-int.educacio.intranet/agora/mastersec/docs/documents-administratius/">Documents administratius</a>', '', 'https://pwc-int.educacio.intranet/agora/mastersec/docs/documents-administratius/', 0, 379, '2016-01-21 15:13:46', 0, 0, 0, 0),
(123, 1, 'bp_docs', 'bp_doc_created', '<a href="https://pwc-int.educacio.intranet/agora/mastersec/membres/admin/" title="admin">admin</a> ha creat el document <a href="https://pwc-int.educacio.intranet/agora/mastersec/docs/document-de-organitzacio-i-gestio-de-centre/">Document de organització i gestió de centre</a>', '', 'https://pwc-int.educacio.intranet/agora/mastersec/docs/document-de-organitzacio-i-gestio-de-centre/', 0, 387, '2016-01-21 15:30:37', 0, 0, 0, 0),
(124, 1, 'bp_docs', 'bp_doc_edited', '<a href="https://pwc-int.educacio.intranet/agora/mastersec/membres/admin/" title="admin">admin</a> ha editat el document <a href="https://pwc-int.educacio.intranet/agora/mastersec/docs/document-de-organitzacio-i-gestio-de-centre/">Document de organització i gestió de centre</a>', '', 'https://pwc-int.educacio.intranet/agora/mastersec/docs/document-de-organitzacio-i-gestio-de-centre/', 0, 387, '2016-01-21 15:30:54', 0, 0, 0, 0),
(125, 1, 'bp_docs', 'bp_doc_edited', '<a href="https://pwc-int.educacio.intranet/agora/mastersec/membres/admin/" title="admin">admin</a> ha editat el document <a href="https://pwc-int.educacio.intranet/agora/mastersec/docs/document-de-organitzacio-i-gestio-de-centre/">Documents de organització i gestió de centre</a>', '', 'https://pwc-int.educacio.intranet/agora/mastersec/docs/document-de-organitzacio-i-gestio-de-centre/', 0, 387, '2016-01-21 15:31:24', 0, 0, 0, 0),
(135, 1, 'bp_docs', 'bp_doc_edited', '<a href="https://pwc-int.educacio.intranet/agora/mastersec/membres/admin/" title="admin">admin</a> ha editat el document <a href="https://pwc-int.educacio.intranet/agora/mastersec/docs/documents-administratius/">Documents administratius</a>', '', 'https://pwc-int.educacio.intranet/agora/mastersec/docs/documents-administratius/', 0, 379, '2016-01-21 15:46:33', 0, 0, 0, 0),
(137, 1, 'bp_docs', 'bp_doc_created', '<a href="https://pwc-int.educacio.intranet/agora/mastersec/membres/admin/" title="admin">admin</a> ha creat el document <a href="https://pwc-int.educacio.intranet/agora/mastersec/docs/cataleg-de-models/">Catàleg de models</a>', '', 'https://pwc-int.educacio.intranet/agora/mastersec/docs/cataleg-de-models/', 0, 391, '2016-01-21 15:51:03', 0, 0, 0, 0),
(139, 1, 'bp_docs', 'bp_doc_edited', '<a href="https://pwc-int.educacio.intranet/agora/mastersec/membres/admin/" title="admin">admin</a> ha editat el document <a href="https://pwc-int.educacio.intranet/agora/mastersec/docs/cataleg-de-models/">Catàleg de models</a>', '', 'https://pwc-int.educacio.intranet/agora/mastersec/docs/cataleg-de-models/', 0, 391, '2016-01-21 15:56:22', 0, 0, 0, 0),
(141, 1, 'bp_docs', 'bp_doc_edited', '<a href="https://pwc-int.educacio.intranet/agora/mastersec/membres/admin/" title="admin">admin</a> ha editat el document <a href="https://pwc-int.educacio.intranet/agora/mastersec/docs/documents-administratius/">Documents administratius</a>', '', 'https://pwc-int.educacio.intranet/agora/mastersec/docs/documents-administratius/', 0, 379, '2016-01-21 17:01:29', 0, 0, 0, 0),
(148, 1, 'bp_docs', 'bp_doc_edited', '<a href="https://pwc-int.educacio.intranet/agora/mastersec/membres/admin/" title="admin">admin</a> ha editat el document <a href="https://pwc-int.educacio.intranet/agora/mastersec/docs/documents-administratius/">Documents administratius</a>', '', 'https://pwc-int.educacio.intranet/agora/mastersec/docs/documents-administratius/', 0, 379, '2016-01-21 17:48:53', 0, 0, 0, 0),
(149, 1, 'bp_docs', 'bp_doc_edited', '<a href="https://pwc-int.educacio.intranet/agora/mastersec/membres/admin/" title="admin">admin</a> ha editat el document <a href="https://pwc-int.educacio.intranet/agora/mastersec/docs/documents-administratius/">Documents administratius</a>', '', 'https://pwc-int.educacio.intranet/agora/mastersec/docs/documents-administratius/', 0, 379, '2016-01-21 17:49:38', 0, 0, 0, 0),
(150, 1, 'bp_docs', 'bp_doc_edited', '<a href="https://pwc-int.educacio.intranet/agora/mastersec/membres/admin/" title="admin">admin</a> ha editat el document <a href="https://pwc-int.educacio.intranet/agora/mastersec/docs/documents-administratius/">Documents administratius</a>', '', 'https://pwc-int.educacio.intranet/agora/mastersec/docs/documents-administratius/', 0, 379, '2016-01-21 17:57:06', 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de la taula `wp_bp_activity_meta`
--

CREATE TABLE IF NOT EXISTS `wp_bp_activity_meta` (
`id` bigint(20) NOT NULL,
  `activity_id` bigint(20) NOT NULL,
  `meta_key` varchar(255) DEFAULT NULL,
  `meta_value` longtext
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Bolcant dades de la taula `wp_bp_activity_meta`
--

INSERT INTO `wp_bp_activity_meta` (`id`, `activity_id`, `meta_key`, `meta_value`) VALUES
(5, 34, '_oembed_d82c712e85b3a7c1789399a52e78e1fa', '<iframe width="500" height="281" src="https://www.youtube.com/embed/wSNYYThX5-g?feature=oembed" frameborder="0" allowfullscreen></iframe>'),
(6, 38, 'bpfb_blog_id', '1'),
(8, 43, '_oembed_dfc4a898350643977de05cbcbb0c3694', '<iframe width="500" height="281" src="https://www.youtube.com/embed/p-yPn2FxxJw?feature=oembed" frameborder="0" allowfullscreen></iframe>'),
(10, 45, 'bpfb_blog_id', '1'),
(12, 47, '_oembed_e1f6f3206fbb446ab592be1d774601f3', '<iframe width="500" height="375" src="https://www.youtube.com/embed/pRUGRPKRAWs?feature=oembed" frameborder="0" allowfullscreen></iframe>'),
(13, 48, '_oembed_9a9cd4314ec5c6c352acee421db4e1c2', '<iframe width="500" height="281" src="https://www.youtube.com/embed/PQE4WqQSOcQ?feature=oembed" frameborder="0" allowfullscreen></iframe>');

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
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

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
(19, 1, 'Papiroflexia', 'papiroflexia', 'Node d''''aficionats a la papiroflexia', 'public', 1, '2014-09-22 15:06:34', 0);

-- --------------------------------------------------------

--
-- Estructura de la taula `wp_bp_groups_groupmeta`
--

CREATE TABLE IF NOT EXISTS `wp_bp_groups_groupmeta` (
`id` bigint(20) NOT NULL,
  `group_id` bigint(20) NOT NULL,
  `meta_key` varchar(255) DEFAULT NULL,
  `meta_value` longtext
) ENGINE=InnoDB AUTO_INCREMENT=151 DEFAULT CHARSET=utf8;

--
-- Bolcant dades de la taula `wp_bp_groups_groupmeta`
--

INSERT INTO `wp_bp_groups_groupmeta` (`id`, `group_id`, `meta_key`, `meta_value`) VALUES
(1, 1, 'total_member_count', '1'),
(2, 1, 'last_activity', '2016-01-21 18:14:38'),
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
(100, 15, 'last_activity', '2016-06-01 13:41:16'),
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
(114, 17, 'last_activity', '2016-01-21 08:43:52'),
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
(131, 19, '_bbp_forum_enabled_209', '1');

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
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

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
(24, 19, 1, 0, 1, 0, 'Administrador/a del node', '2014-09-22 15:06:22', '', 1, 0, 0);

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
) ENGINE=InnoDB AUTO_INCREMENT=76 DEFAULT CHARSET=utf8;

--
-- Bolcant dades de la taula `wp_bp_notifications`
--

INSERT INTO `wp_bp_notifications` (`id`, `user_id`, `item_id`, `secondary_item_id`, `component_name`, `component_action`, `date_notified`, `is_new`) VALUES
(72, 1, 163, -1, 'social_articles', 'new_article163', '2014-11-18 12:06:46', 1),
(73, 1, 163, -1, 'social_articles', 'new_article163', '2014-11-18 12:07:23', 1),
(74, 1, 163, -1, 'social_articles', 'new_article163', '2014-12-01 12:22:10', 1),
(75, 1, 163, -1, 'social_articles', 'new_article163', '2015-02-24 11:45:24', 1);

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
(1, 1, 2, 'xtecadmin', '2015-10-27 10:48:13'),
(2, 1, 1, 'admin', '2016-03-29 11:44:01');

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
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Bolcant dades de la taula `wp_ig_campaigns`
--

INSERT INTO `wp_ig_campaigns` (`id`, `slug`, `name`, `type`, `from_name`, `from_email`, `reply_to_name`, `reply_to_email`, `sequence_ids`, `categories`, `list_ids`, `base_template_id`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'posttitle', '{{POSTTITLE}}', 'post_notification', 'Admin', 'a8000007@xtec.cat', 'Admin', 'a8000007@xtec.cat', '', '####Portada## ##', '1', 469, 1, '2019-05-13 07:44:10', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'posttitle-2', '{{POSTTITLE}}', 'post_notification', 'Admin', 'a8000007@xtec.cat', 'Admin', 'a8000007@xtec.cat', '', '## ##ESO 1## ## ##ESO 1A## ##', '0', 470, 1, '2019-05-13 07:44:10', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'posttitle-3', '{{POSTTITLE}}', 'post_notification', 'Admin', 'a8000007@xtec.cat', 'Admin', 'a8000007@xtec.cat', '', '## ##ESO 1## ## ##ESO 1B## ##', '0', 471, 1, '2019-05-13 07:44:10', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'posttitle-4', '{{POSTTITLE}}', 'post_notification', 'Admin', 'a8000007@xtec.cat', 'Admin', 'a8000007@xtec.cat', '', '## ##ESO 1## ## ##ESO 1C## ##', '0', 472, 1, '2019-05-13 07:44:10', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'posttitle-5', '{{POSTTITLE}}', 'post_notification', 'Admin', 'a8000007@xtec.cat', 'Admin', 'a8000007@xtec.cat', '', '## ##ESO 2## ## ##ESO 2A## ##', '0', 473, 1, '2019-05-13 07:44:10', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'posttitle-6', '{{POSTTITLE}}', 'post_notification', 'Admin', 'a8000007@xtec.cat', 'Admin', 'a8000007@xtec.cat', '', '## ##ESO 2## ## ##ESO 2B## ##', '0', 474, 1, '2019-05-13 07:44:10', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 'posttitle-7', '{{POSTTITLE}}', 'post_notification', 'Admin', 'a8000007@xtec.cat', 'Admin', 'a8000007@xtec.cat', '', '## ##ESO 2## ## ##ESO 2C## ##', '0', 475, 1, '2019-05-13 07:44:10', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 'posttitle-8', '{{POSTTITLE}}', 'post_notification', 'Admin', 'a8000007@xtec.cat', 'Admin', 'a8000007@xtec.cat', '', '## ##ESO 3## ## ##ESO 3A## ##', '0', 476, 1, '2019-05-13 07:44:10', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 'posttitle-9', '{{POSTTITLE}}', 'post_notification', 'Admin', 'a8000007@xtec.cat', 'Admin', 'a8000007@xtec.cat', '', '## ##ESO 3## ## ##ESO 3B## ##', '0', 477, 1, '2019-05-13 07:44:10', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 'posttitle-10', '{{POSTTITLE}}', 'post_notification', 'Admin', 'a8000007@xtec.cat', 'Admin', 'a8000007@xtec.cat', '', '## ##ESO 3## ## ##ESO 3C## ##', '0', 478, 1, '2019-05-13 07:44:10', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 'posttitle-11', '{{POSTTITLE}}', 'post_notification', 'Admin', 'a8000007@xtec.cat', 'Admin', 'a8000007@xtec.cat', '', '## ##ESO 4## ## ##ESO 4A## ##', '0', 479, 1, '2019-05-13 07:44:10', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 'posttitle-12', '{{POSTTITLE}}', 'post_notification', 'Admin', 'a8000007@xtec.cat', 'Admin', 'a8000007@xtec.cat', '', '## ##ESO 4## ## ##ESO 4B## ##', '0', 480, 1, '2019-05-13 07:44:10', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, 'posttitle-13', '{{POSTTITLE}}', 'post_notification', 'Admin', 'a8000007@xtec.cat', 'Admin', 'a8000007@xtec.cat', '', '## ##ESO 4## ## ##ESO 4C## ##', '0', 481, 1, '2019-05-13 07:44:10', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

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
(1, 0, 'Admin', '', 'a8000007@xtec.cat', 'Migrated', 0, 'verified', 0, 'kzqoru-vnfzdi-suewbi-wmsvbl-trluda', '2016-04-05 11:56:30', '2019-05-13 07:44:10', 1, 0, 0, 0, 1, 1, '');

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
(1, 'Widget - Subscripció de correu', 'a:4:{i:0;a:5:{s:4:"type";s:4:"text";s:4:"name";s:4:"Name";s:2:"id";s:4:"name";s:6:"params";a:3:{s:5:"label";s:4:"Name";s:4:"show";b:1;s:8:"required";b:0;}s:8:"position";i:1;}i:1;a:5:{s:4:"type";s:4:"text";s:4:"name";s:5:"Email";s:2:"id";s:5:"email";s:6:"params";a:3:{s:5:"label";s:5:"Email";s:4:"show";b:1;s:8:"required";b:1;}s:8:"position";i:2;}i:2;a:5:{s:4:"type";s:8:"checkbox";s:4:"name";s:5:"Lists";s:2:"id";s:5:"lists";s:6:"params";a:4:{s:5:"label";s:5:"Lists";s:4:"show";b:0;s:8:"required";b:1;s:6:"values";a:1:{i:0;s:1:"1";}}s:8:"position";i:3;}i:3;a:5:{s:4:"type";s:6:"submit";s:4:"name";s:6:"submit";s:2:"id";s:6:"submit";s:6:"params";a:2:{s:5:"label";s:6:"Submit";s:4:"show";b:1;}s:8:"position";i:4;}}', 'a:2:{s:5:"lists";a:1:{i:0;s:1:"1";}s:4:"desc";s:35:"T''avisarem si hi ha notícies noves";}', NULL, '2019-05-13 07:44:10', NULL, NULL, 0);

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
(1, 'portada', 'Portada', '2019-05-13 07:44:10', NULL, NULL);

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
(1, 1, 1, 'subscribed', 2, '2016-04-05 11:56:30', NULL, NULL, NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=10369 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Bolcant dades de la taula `wp_options`
--

INSERT INTO `wp_options` (`option_id`, `option_name`, `option_value`, `autoload`) VALUES
(1, 'siteurl', 'https://pwc-int.educacio.intranet/agora/mastersec', 'yes'),
(2, 'blogname', 'Institut L&#039;Arany', 'yes'),
(3, 'blogdescription', 'Web en construcció', 'yes'),
(4, 'users_can_register', '0', 'yes'),
(5, 'admin_email', 'a8000007@xtec.cat', 'yes'),
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
(33, 'home', 'https://pwc-int.educacio.intranet/agora/mastersec', 'yes'),
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
(48, 'default_role', 'contributor', 'yes'),
(49, 'db_version', '44719', 'yes'),
(50, 'uploads_use_yearmonth_folders', '1', 'yes'),
(51, 'upload_path', '', 'yes'),
(52, 'blog_public', '1', 'yes'),
(53, 'default_link_category', '0', 'yes'),
(54, 'show_on_front', 'page', 'yes'),
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
(80, 'widget_text', 'a:13:{i:1;a:0:{}i:2;a:3:{s:5:"title";s:0:"";s:4:"text";s:431:"<a class="twitter-timeline" href="https://twitter.com/institut_larany" data-widget-id="512216549814333440">Tuits de @institut_larany</a>\r\n<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?''http'':''https'';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>";s:6:"filter";b:0;}i:3;a:4:{s:5:"title";s:11:"Benvinguts ";s:4:"text";s:232:"En aquest pàgina podeu trobar tota la informació referent a l''AMPA del nostre centre.\r\n\r\nPer contactar amb l''AMPA: \r\n\r\n<strong>Correu electrònic:</strong>\r\ncorreuampa@elnostrecentre.cat\r\n\r\n<strong>Telèfon:</strong>\r\n123 45 67 89";s:6:"filter";b:1;s:10:"conditions";a:2:{s:6:"action";s:4:"show";s:5:"rules";a:1:{i:0;a:2:{s:5:"major";s:8:"category";s:5:"minor";s:2:"31";}}}}i:17;a:4:{s:5:"title";s:17:"Dades de contacte";s:4:"text";s:501:"<span  class="dashicons dashicons-admin-users"></span> Nom del coordinador \r\n<span class="dashicons dashicons-email-alt"></span><a href=mailto:coor.cicles@elvostrecentre> coor.cicles@elvostrecentre</a>\r\n<span class="dashicons dashicons-testimonial"></span> Atenció a les famílies: dilluns 00-00\r\n\r\n<span  class="dashicons dashicons-admin-users"></span> Nom del coordinador FCT \r\n<span class="dashicons dashicons-email-alt"></span><a href=mailto:coor.FCT@elvostrecentre> coor.FCT@elvostrecentre</a>\r\n";s:6:"filter";b:1;s:10:"conditions";a:2:{s:6:"action";s:4:"show";s:5:"rules";a:1:{i:0;a:2:{s:5:"major";s:8:"category";s:5:"minor";s:2:"30";}}}}i:19;a:3:{s:5:"title";s:0:"";s:4:"text";s:0:"";s:6:"filter";b:0;}s:12:"_multiwidget";i:1;i:21;a:3:{s:5:"title";s:0:"";s:4:"text";s:0:"";s:6:"filter";b:0;}i:25;a:4:{s:5:"title";s:0:"";s:4:"text";s:185:"Aquí podeu afegir un menú personalitzat amb enllaços a documents interns i externs, etiquetes de documents etc. A la visibilitat del giny, heu de posar: Pàgina / Index de Documents.";s:6:"filter";b:1;s:10:"conditions";a:2:{s:6:"action";s:4:"show";s:5:"rules";a:1:{i:0;a:2:{s:5:"major";s:4:"page";s:5:"minor";s:10:"docs-index";}}}}i:27;a:0:{}i:29;a:4:{s:5:"title";s:0:"";s:4:"text";s:152:"<img src="https://pwc-int.educacio.intranet/agora/mastersec/wp-content/uploads/usu7/2017/03/Agrupat-01.png" title="Il·lustració de Yurko  Blagojevic">";s:6:"filter";b:0;s:10:"conditions";a:2:{s:6:"action";s:4:"show";s:5:"rules";a:1:{i:0;a:3:{s:5:"major";s:8:"category";s:5:"minor";s:1:"4";s:12:"has_children";b:0;}}}}i:31;a:4:{s:5:"title";s:0:"";s:4:"text";s:152:"<img src="https://pwc-int.educacio.intranet/agora/mastersec/wp-content/uploads/usu7/2017/03/Agrupat-02.png" title="Il·lustració de Yurko  Blagojevic">";s:6:"filter";b:0;s:10:"conditions";a:2:{s:6:"action";s:4:"show";s:5:"rules";a:1:{i:0;a:3:{s:5:"major";s:8:"category";s:5:"minor";s:1:"5";s:12:"has_children";b:0;}}}}i:33;a:4:{s:5:"title";s:0:"";s:4:"text";s:151:"<img src="https://pwc-int.educacio.intranet/agora/mastersec/wp-content/uploads/usu7/2017/03/Agrupat-03.png" title="Il·lustració de Yurko Blagojevic">";s:6:"filter";b:0;s:10:"conditions";a:2:{s:6:"action";s:4:"show";s:5:"rules";a:1:{i:0;a:3:{s:5:"major";s:8:"category";s:5:"minor";s:1:"6";s:12:"has_children";b:0;}}}}i:35;a:4:{s:5:"title";s:0:"";s:4:"text";s:152:"<img src="https://pwc-int.educacio.intranet/agora/mastersec/wp-content/uploads/usu7/2017/03/Agrupat-04.png"  title="Il·lustració de Yurko Blagojevic">";s:6:"filter";b:0;s:10:"conditions";a:2:{s:6:"action";s:4:"show";s:5:"rules";a:1:{i:0;a:3:{s:5:"major";s:8:"category";s:5:"minor";s:1:"7";s:12:"has_children";b:0;}}}}}', 'yes'),
(81, 'widget_rss', 'a:2:{i:1;a:0:{}s:12:"_multiwidget";i:1;}', 'yes'),
(82, 'uninstall_plugins', 'a:0:{}', 'no'),
(83, 'timezone_string', 'Europe/Madrid', 'yes'),
(84, 'page_for_posts', '0', 'yes'),
(85, 'page_on_front', '9', 'yes'),
(86, 'default_post_format', '0', 'yes'),
(87, 'link_manager_enabled', '0', 'yes'),
(88, 'initial_db_version', '27916', 'yes'),
(89, 'wp_user_roles', 'a:11:{s:13:"administrator";a:2:{s:4:"name";s:13:"Administrator";s:12:"capabilities";a:70:{s:13:"switch_themes";b:1;s:11:"edit_themes";b:1;s:16:"activate_plugins";b:1;s:12:"edit_plugins";b:1;s:10:"edit_users";b:1;s:10:"edit_files";b:1;s:14:"manage_options";b:1;s:17:"moderate_comments";b:1;s:17:"manage_categories";b:1;s:12:"manage_links";b:1;s:12:"upload_files";b:1;s:6:"import";b:1;s:15:"unfiltered_html";b:1;s:10:"edit_posts";b:1;s:17:"edit_others_posts";b:1;s:20:"edit_published_posts";b:1;s:13:"publish_posts";b:1;s:10:"edit_pages";b:1;s:4:"read";b:1;s:8:"level_10";b:1;s:7:"level_9";b:1;s:7:"level_8";b:1;s:7:"level_7";b:1;s:7:"level_6";b:1;s:7:"level_5";b:1;s:7:"level_4";b:1;s:7:"level_3";b:1;s:7:"level_2";b:1;s:7:"level_1";b:1;s:7:"level_0";b:1;s:17:"edit_others_pages";b:1;s:20:"edit_published_pages";b:1;s:13:"publish_pages";b:1;s:12:"delete_pages";b:1;s:19:"delete_others_pages";b:1;s:22:"delete_published_pages";b:1;s:12:"delete_posts";b:1;s:19:"delete_others_posts";b:1;s:22:"delete_published_posts";b:1;s:20:"delete_private_posts";b:1;s:18:"edit_private_posts";b:1;s:18:"read_private_posts";b:1;s:20:"delete_private_pages";b:1;s:18:"edit_private_pages";b:1;s:18:"read_private_pages";b:1;s:12:"delete_users";b:1;s:12:"create_users";b:1;s:17:"unfiltered_upload";b:1;s:14:"edit_dashboard";b:1;s:14:"update_plugins";b:1;s:14:"delete_plugins";b:1;s:15:"install_plugins";b:1;s:13:"update_themes";b:1;s:14:"install_themes";b:1;s:11:"update_core";b:1;s:10:"list_users";b:1;s:12:"remove_users";b:1;s:13:"promote_users";b:1;s:18:"edit_theme_options";b:1;s:13:"delete_themes";b:1;s:6:"export";b:1;s:45:"slideshow-jquery-image-gallery-add-slideshows";b:1;s:46:"slideshow-jquery-image-gallery-edit-slideshows";b:1;s:48:"slideshow-jquery-image-gallery-delete-slideshows";b:1;s:19:"edit_posts_bookings";b:1;s:21:"delete_posts_bookings";b:1;s:21:"delete_pages_bookings";b:1;s:22:"publish_posts_bookings";b:1;s:29:"edit_published_posts_bookings";b:1;s:31:"delete_published_posts_bookings";b:1;}}s:6:"editor";a:2:{s:4:"name";s:6:"Editor";s:12:"capabilities";a:43:{s:17:"moderate_comments";b:1;s:17:"manage_categories";b:1;s:12:"manage_links";b:1;s:12:"upload_files";b:1;s:15:"unfiltered_html";b:1;s:10:"edit_posts";b:1;s:17:"edit_others_posts";b:1;s:20:"edit_published_posts";b:1;s:13:"publish_posts";b:1;s:10:"edit_pages";b:1;s:4:"read";b:1;s:7:"level_7";b:1;s:7:"level_6";b:1;s:7:"level_5";b:1;s:7:"level_4";b:1;s:7:"level_3";b:1;s:7:"level_2";b:1;s:7:"level_1";b:1;s:7:"level_0";b:1;s:17:"edit_others_pages";b:1;s:20:"edit_published_pages";b:1;s:13:"publish_pages";b:1;s:12:"delete_pages";b:1;s:19:"delete_others_pages";b:1;s:22:"delete_published_pages";b:1;s:12:"delete_posts";b:1;s:19:"delete_others_posts";b:1;s:22:"delete_published_posts";b:1;s:20:"delete_private_posts";b:1;s:18:"edit_private_posts";b:1;s:18:"read_private_posts";b:1;s:20:"delete_private_pages";b:1;s:18:"edit_private_pages";b:1;s:18:"read_private_pages";b:1;s:45:"slideshow-jquery-image-gallery-add-slideshows";b:1;s:46:"slideshow-jquery-image-gallery-edit-slideshows";b:1;s:48:"slideshow-jquery-image-gallery-delete-slideshows";b:1;s:19:"edit_posts_bookings";b:1;s:21:"delete_posts_bookings";b:1;s:21:"delete_pages_bookings";b:1;s:22:"publish_posts_bookings";b:1;s:29:"edit_published_posts_bookings";b:1;s:31:"delete_published_posts_bookings";b:1;}}s:6:"author";a:2:{s:4:"name";s:6:"Author";s:12:"capabilities";a:20:{s:12:"upload_files";b:1;s:10:"edit_posts";b:1;s:20:"edit_published_posts";b:1;s:13:"publish_posts";b:1;s:4:"read";b:1;s:7:"level_2";b:1;s:7:"level_1";b:1;s:7:"level_0";b:1;s:12:"delete_posts";b:1;s:22:"delete_published_posts";b:1;s:45:"slideshow-jquery-image-gallery-add-slideshows";b:1;s:46:"slideshow-jquery-image-gallery-edit-slideshows";b:1;s:48:"slideshow-jquery-image-gallery-delete-slideshows";b:1;s:21:"delete_pages_bookings";b:1;s:19:"edit_posts_bookings";b:1;s:21:"delete_posts_bookings";b:1;s:22:"publish_posts_bookings";b:1;s:12:"delete_pages";b:1;s:29:"edit_published_posts_bookings";b:1;s:31:"delete_published_posts_bookings";b:1;}}s:11:"contributor";a:2:{s:4:"name";s:11:"Contributor";s:12:"capabilities";a:8:{s:10:"edit_posts";b:1;s:4:"read";b:1;s:7:"level_1";b:1;s:7:"level_0";b:1;s:12:"delete_posts";b:1;s:12:"upload_files";b:1;s:21:"delete_pages_bookings";b:1;s:12:"delete_pages";b:1;}}s:10:"subscriber";a:2:{s:4:"name";s:10:"Subscriber";s:12:"capabilities";a:2:{s:4:"read";b:1;s:7:"level_0";b:1;}}s:13:"bbp_keymaster";a:2:{s:4:"name";s:9:"Keymaster";s:12:"capabilities";a:29:{s:9:"keep_gate";b:1;s:8:"spectate";b:1;s:11:"participate";b:1;s:8:"moderate";b:1;s:8:"throttle";b:1;s:10:"view_trash";b:1;s:14:"publish_forums";b:1;s:11:"edit_forums";b:1;s:18:"edit_others_forums";b:1;s:13:"delete_forums";b:1;s:20:"delete_others_forums";b:1;s:19:"read_private_forums";b:1;s:18:"read_hidden_forums";b:1;s:14:"publish_topics";b:1;s:11:"edit_topics";b:1;s:18:"edit_others_topics";b:1;s:13:"delete_topics";b:1;s:20:"delete_others_topics";b:1;s:19:"read_private_topics";b:1;s:15:"publish_replies";b:1;s:12:"edit_replies";b:1;s:19:"edit_others_replies";b:1;s:14:"delete_replies";b:1;s:21:"delete_others_replies";b:1;s:20:"read_private_replies";b:1;s:17:"manage_topic_tags";b:1;s:15:"edit_topic_tags";b:1;s:17:"delete_topic_tags";b:1;s:17:"assign_topic_tags";b:1;}}s:13:"bbp_spectator";a:2:{s:4:"name";s:9:"Spectator";s:12:"capabilities";a:1:{s:8:"spectate";b:1;}}s:11:"bbp_blocked";a:2:{s:4:"name";s:7:"Blocked";s:12:"capabilities";a:28:{s:8:"spectate";b:0;s:11:"participate";b:0;s:8:"moderate";b:0;s:8:"throttle";b:0;s:10:"view_trash";b:0;s:14:"publish_forums";b:0;s:11:"edit_forums";b:0;s:18:"edit_others_forums";b:0;s:13:"delete_forums";b:0;s:20:"delete_others_forums";b:0;s:19:"read_private_forums";b:0;s:18:"read_hidden_forums";b:0;s:14:"publish_topics";b:0;s:11:"edit_topics";b:0;s:18:"edit_others_topics";b:0;s:13:"delete_topics";b:0;s:20:"delete_others_topics";b:0;s:19:"read_private_topics";b:0;s:15:"publish_replies";b:0;s:12:"edit_replies";b:0;s:19:"edit_others_replies";b:0;s:14:"delete_replies";b:0;s:21:"delete_others_replies";b:0;s:20:"read_private_replies";b:0;s:17:"manage_topic_tags";b:0;s:15:"edit_topic_tags";b:0;s:17:"delete_topic_tags";b:0;s:17:"assign_topic_tags";b:0;}}s:13:"bbp_moderator";a:2:{s:4:"name";s:9:"Moderator";s:12:"capabilities";a:25:{s:8:"spectate";b:1;s:11:"participate";b:1;s:8:"moderate";b:1;s:8:"throttle";b:1;s:10:"view_trash";b:1;s:14:"publish_forums";b:1;s:11:"edit_forums";b:1;s:19:"read_private_forums";b:1;s:18:"read_hidden_forums";b:1;s:14:"publish_topics";b:1;s:11:"edit_topics";b:1;s:18:"edit_others_topics";b:1;s:13:"delete_topics";b:1;s:20:"delete_others_topics";b:1;s:19:"read_private_topics";b:1;s:15:"publish_replies";b:1;s:12:"edit_replies";b:1;s:19:"edit_others_replies";b:1;s:14:"delete_replies";b:1;s:21:"delete_others_replies";b:1;s:20:"read_private_replies";b:1;s:17:"manage_topic_tags";b:1;s:15:"edit_topic_tags";b:1;s:17:"delete_topic_tags";b:1;s:17:"assign_topic_tags";b:1;}}s:15:"bbp_participant";a:2:{s:4:"name";s:11:"Participant";s:12:"capabilities";a:8:{s:8:"spectate";b:1;s:11:"participate";b:1;s:19:"read_private_forums";b:1;s:14:"publish_topics";b:1;s:11:"edit_topics";b:1;s:15:"publish_replies";b:1;s:12:"edit_replies";b:1;s:17:"assign_topic_tags";b:1;}}s:12:"xtec_teacher";a:2:{s:4:"name";s:9:"Professor";s:12:"capabilities";a:13:{s:10:"edit_posts";b:1;s:4:"read";b:1;s:7:"level_1";b:1;s:7:"level_0";b:1;s:12:"delete_posts";b:1;s:12:"upload_files";b:1;s:12:"delete_pages";b:1;s:21:"delete_pages_bookings";b:1;s:19:"edit_posts_bookings";b:1;s:21:"delete_posts_bookings";b:1;s:22:"publish_posts_bookings";b:1;s:29:"edit_published_posts_bookings";b:1;s:31:"delete_published_posts_bookings";b:1;}}}', 'yes'),
(90, 'widget_search', 'a:2:{i:2;a:1:{s:5:"title";s:0:"";}s:12:"_multiwidget";i:1;}', 'yes'),
(91, 'widget_recent-posts', 'a:2:{i:2;a:4:{s:5:"title";s:16:"Articles recents";s:6:"number";i:5;s:7:"exclude";s:0:"";s:10:"conditions";a:2:{s:6:"action";s:4:"show";s:5:"rules";a:1:{i:0;a:2:{s:5:"major";s:4:"page";s:5:"minor";s:14:"post_type-post";}}}}s:12:"_multiwidget";i:1;}', 'yes'),
(92, 'widget_recent-comments', 'a:2:{i:2;a:3:{s:5:"title";s:18:"Comentaris recents";s:6:"number";i:5;s:10:"conditions";a:2:{s:6:"action";s:4:"show";s:5:"rules";a:1:{i:0;a:2:{s:5:"major";s:4:"page";s:5:"minor";s:14:"post_type-post";}}}}s:12:"_multiwidget";i:1;}', 'yes'),
(93, 'widget_archives', 'a:2:{i:2;a:4:{s:5:"title";s:0:"";s:5:"count";i:0;s:8:"dropdown";i:0;s:10:"conditions";a:2:{s:6:"action";s:4:"show";s:5:"rules";a:1:{i:0;a:2:{s:5:"major";s:4:"page";s:5:"minor";s:14:"post_type-post";}}}}s:12:"_multiwidget";i:1;}', 'yes'),
(94, 'widget_meta', 'a:2:{i:2;a:1:{s:5:"title";s:0:"";}s:12:"_multiwidget";i:1;}', 'yes'),
(95, 'sidebars_widgets', 'a:8:{s:19:"wp_inactive_widgets";a:0:{}s:9:"categoria";a:23:{i:0;s:10:"nav_menu-2";i:1;s:7:"text-29";i:2;s:10:"nav_menu-3";i:3;s:7:"text-31";i:4;s:10:"nav_menu-4";i:5;s:7:"text-33";i:6;s:10:"nav_menu-5";i:7;s:7:"text-35";i:8;s:6:"text-3";i:9;s:20:"grup_classe_widget-2";i:10;s:20:"grup_classe_widget-3";i:11;s:20:"grup_classe_widget-4";i:12;s:20:"grup_classe_widget-5";i:13;s:20:"grup_classe_widget-6";i:14;s:20:"grup_classe_widget-7";i:15;s:20:"grup_classe_widget-9";i:16;s:21:"grup_classe_widget-10";i:17;s:21:"grup_classe_widget-11";i:18;s:21:"grup_classe_widget-12";i:19;s:21:"grup_classe_widget-13";i:20;s:21:"grup_classe_widget-14";i:21;s:20:"grup_classe_widget-8";i:22;s:7:"text-17";}s:7:"sidebar";a:12:{i:0;s:10:"nav_menu-8";i:1;s:17:"slideshowwidget-2";i:2;s:18:"bp_groups_widget-2";i:3;s:14:"recent-posts-2";i:4;s:17:"recent-comments-2";i:5;s:11:"tag_cloud-3";i:6;s:10:"archives-2";i:7;s:32:"bp_core_recently_active_widget-2";i:8;s:10:"nav_menu-6";i:9;s:7:"text-25";i:10;s:11:"nav_menu-10";i:11;s:7:"text-27";}s:9:"sidebar-2";a:0:{}s:17:"sidebar-frontpage";a:5:{i:0;s:20:"logo_centre_widget-2";i:1;s:12:"gce_widget-2";i:2;s:6:"text-2";i:3;s:13:"xtec_widget-2";i:4;s:24:"email-subscribers-form-3";}s:19:"sidebar-frontpage-2";a:0:{}s:14:"sidebar-footer";a:3:{i:0;s:20:"socialmedia_widget-2";i:1;s:7:"text-19";i:2;s:20:"logo_centre_widget-3";}s:13:"array_version";i:3;}', 'yes'),
(96, 'cron', 'a:7:{i:1537436620;a:3:{s:17:"wp_update_plugins";a:1:{s:32:"40cd750bba9870f18aada2478b24840a";a:3:{s:8:"schedule";s:10:"twicedaily";s:4:"args";a:0:{}s:8:"interval";i:43200;}}s:16:"wp_update_themes";a:1:{s:32:"40cd750bba9870f18aada2478b24840a";a:3:{s:8:"schedule";s:10:"twicedaily";s:4:"args";a:0:{}s:8:"interval";i:43200;}}s:16:"wp_version_check";a:1:{s:32:"40cd750bba9870f18aada2478b24840a";a:3:{s:8:"schedule";s:10:"twicedaily";s:4:"args";a:0:{}s:8:"interval";i:43200;}}}i:1537436626;a:1:{s:19:"wp_scheduled_delete";a:1:{s:32:"40cd750bba9870f18aada2478b24840a";a:3:{s:8:"schedule";s:5:"daily";s:4:"args";a:0:{}s:8:"interval";i:86400;}}}i:1537438363;a:1:{s:30:"wp_scheduled_auto_draft_delete";a:1:{s:32:"40cd750bba9870f18aada2478b24840a";a:3:{s:8:"schedule";s:5:"daily";s:4:"args";a:0:{}s:8:"interval";i:86400;}}}i:1537457645;a:1:{s:12:"remove_stats";a:1:{s:32:"40cd750bba9870f18aada2478b24840a";a:3:{s:8:"schedule";s:5:"daily";s:4:"args";a:0:{}s:8:"interval";i:86400;}}}i:1557733449;a:2:{s:34:"wp_privacy_delete_old_export_files";a:1:{s:32:"40cd750bba9870f18aada2478b24840a";a:3:{s:8:"schedule";s:6:"hourly";s:4:"args";a:0:{}s:8:"interval";i:3600;}}s:23:"ig_es_cron_fifteen_mins";a:1:{s:32:"5ac46d732acfbb36c3d4056d1cbf41dd";a:3:{s:8:"schedule";s:27:"ig_es_fifteen_mins_interval";s:4:"args";a:2:{i:0;s:4:"cron";i:1;s:34:"wuxjvg-fagnuh-txjhpv-cwbpmz-lafyox";}s:8:"interval";i:900;}}}i:1557744280;a:1:{s:25:"delete_expired_transients";a:1:{s:32:"40cd750bba9870f18aada2478b24840a";a:3:{s:8:"schedule";s:5:"daily";s:4:"args";a:0:{}s:8:"interval";i:86400;}}}s:7:"version";i:2;}', 'yes'),
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
(143, 'widget_bp_core_recently_active_widget', 'a:3:{i:1;a:0:{}i:2;a:3:{s:5:"title";s:17:"Han entrat fa poc";s:11:"max_members";s:0:"";s:10:"conditions";a:2:{s:6:"action";s:4:"show";s:5:"rules";a:1:{i:0;a:2:{s:5:"major";s:4:"page";s:5:"minor";s:8:"activity";}}}}s:12:"_multiwidget";i:1;}', 'yes'),
(144, 'widget_bp_groups_widget', 'a:3:{i:1;a:0:{}i:2;a:5:{s:5:"title";s:5:"Nodes";s:10:"max_groups";s:2:"16";s:13:"group_default";s:6:"active";s:10:"link_title";b:1;s:10:"conditions";a:2:{s:6:"action";s:4:"show";s:5:"rules";a:5:{i:0;a:2:{s:5:"major";s:4:"page";s:5:"minor";s:1:"5";}i:1;a:2:{s:5:"major";s:4:"page";s:5:"minor";s:5:"group";}i:2;a:2:{s:5:"major";s:4:"page";s:5:"minor";s:6:"member";}i:3;a:2:{s:5:"major";s:4:"page";s:5:"minor";s:2:"16";}i:4;a:2:{s:5:"major";s:4:"page";s:5:"minor";s:1:"6";}}}}s:12:"_multiwidget";i:1;}', 'yes'),
(145, 'widget_bp_messages_sitewide_notices_widget', '', 'yes'),
(150, 'registration', '0', 'yes'),
(151, 'bp-active-components', 'a:8:{s:8:"xprofile";s:1:"1";s:8:"settings";s:1:"1";s:7:"friends";s:1:"1";s:8:"messages";s:1:"1";s:8:"activity";s:1:"1";s:13:"notifications";s:1:"1";s:6:"groups";s:1:"1";s:7:"members";s:1:"1";}', 'yes'),
(152, 'bp-pages', 'a:5:{s:7:"members";i:6;s:8:"activity";i:5;s:6:"groups";i:16;s:8:"register";i:426;s:8:"activate";i:424;}', 'yes'),
(153, '_bp_db_version', '11105', 'yes'),
(157, 'bp_docs_attachment_protection', '1', 'yes'),
(158, 'ass_digest_time', 'a:2:{s:5:"hours";s:2:"05";s:7:"minutes";s:2:"00";}', 'yes'),
(159, 'ass_weekly_digest', '4', 'yes'),
(160, 'bp_like_db_version', '43', 'yes'),
(161, 'bp_like_settings', 'a:8:{s:17:"likers_visibility";N;s:23:"post_to_activity_stream";N;s:12:"show_excerpt";N;s:14:"excerpt_length";s:3:"140";s:12:"text_strings";a:29:{s:4:"like";a:2:{s:7:"default";s:8:"M''agrada";s:6:"custom";s:33:"<i class="fa fa-thumbs-o-up"></i>";}s:6:"unlike";a:2:{s:7:"default";s:11:"No m''agrada";s:6:"custom";s:31:"<i class="fa fa-thumbs-up"></i>";}s:14:"like_this_item";a:2:{s:7:"default";s:34:"Indica que aquest element m''agrada";s:6:"custom";s:34:"Indica que aquest element m''agrada";}s:16:"unlike_this_item";a:2:{s:7:"default";s:37:"Indica que aquest element no m''agrada";s:6:"custom";s:37:"Indica que aquest element no m''agrada";}s:10:"view_likes";a:2:{s:7:"default";s:19:"Mostra els m''agrada";s:6:"custom";s:19:"Mostra els m''agrada";}s:10:"hide_likes";a:2:{s:7:"default";s:18:"Amaga els m''agrada";s:6:"custom";s:18:"Amaga els m''agrada";}s:12:"update_likes";a:2:{s:7:"default";s:23:"Actualitza els m''agrada";s:6:"custom";s:23:"Actualitza els m''agrada";}s:19:"show_blogpost_likes";a:2:{s:7:"default";s:31:""M''agrada" d''enviaments de blog";s:6:"custom";s:31:""M''agrada" d''enviaments de blog";}s:17:"must_be_logged_in";a:2:{s:7:"default";s:53:"Heu d''estar autenticats per poder fer clic a m''agrada";s:6:"custom";s:53:"Heu d''estar autenticats per poder fer clic a m''agrada";}s:25:"record_activity_likes_own";a:2:{s:7:"default";s:79:"A %user% li ha agradat la seva pròpia <a href="%permalink%">actualització</a>";s:6:"custom";s:79:"A %user% li ha agradat la seva pròpia <a href="%permalink%">actualització</a>";}s:24:"record_activity_likes_an";a:2:{s:7:"default";s:67:"A %user% li ha agradat una <a href="%permalink%">actualització</a>";s:6:"custom";s:67:"A %user% li ha agradat una <a href="%permalink%">actualització</a>";}s:27:"record_activity_likes_users";a:2:{s:7:"default";s:90:"A %user% li ha agradat l''entrada de %author%'' al blog <a href="%permalink%">actualitza</a>";s:6:"custom";s:90:"A %user% li ha agradat l''entrada de %author%'' al blog <a href="%permalink%">actualitza</a>";}s:34:"record_activity_likes_own_blogpost";a:2:{s:7:"default";s:88:"A %user% li ha agradat el seu propi enviament al blog, <a href="%permalink%">%title%</a>";s:6:"custom";s:88:"A %user% li ha agradat el seu propi enviament al blog, <a href="%permalink%">%title%</a>";}s:32:"record_activity_likes_a_blogpost";a:2:{s:7:"default";s:78:"A %user% li ha agradat un enviament al blog, <a href="%permalink%">%title%</a>";s:6:"custom";s:78:"A %user% li ha agradat un enviament al blog, <a href="%permalink%">%title%</a>";}s:36:"record_activity_likes_users_blogpost";a:2:{s:7:"default";s:89:"A %user% li ha agradat l''enviament de %author% al blog, <a href="%permalink%">%title%</a>";s:6:"custom";s:89:"A %user% li ha agradat l''enviament de %author% al blog, <a href="%permalink%">%title%</a>";}s:20:"get_likes_only_liker";a:2:{s:7:"default";s:13:"T''ha agradat.";s:6:"custom";s:13:"T''ha agradat.";}s:26:"get_likes_you_and_singular";a:2:{s:7:"default";s:41:"A tu i a %count% altra persona us agrada.";s:6:"custom";s:41:"A tu i a %count% altra persona us agrada.";}s:26:"you_and_username_like_this";a:2:{s:7:"default";s:22:"A tu i a %s us agrada.";s:6:"custom";s:22:"A tu i a %s us agrada.";}s:24:"get_likes_you_and_plural";a:2:{s:7:"default";s:41:"A tu i a %count% persones més us agrada.";s:6:"custom";s:41:"A tu i a %count% persones més us agrada.";}s:31:"get_likes_count_people_singular";a:2:{s:7:"default";s:36:"%count% persona li ha agradat això.";s:6:"custom";s:36:"%count% persona li ha agradat això.";}s:29:"get_likes_count_people_plural";a:2:{s:7:"default";s:38:"%count% persones els ha agradat això.";s:6:"custom";s:38:"%count% persones els ha agradat això.";}s:29:"get_likes_and_people_singular";a:2:{s:7:"default";s:38:"i %count% persona li ha agradat això.";s:6:"custom";s:38:"i %count% persona li ha agradat això.";}s:27:"get_likes_and_people_plural";a:2:{s:7:"default";s:40:"i %count% persones els ha agradat això.";s:6:"custom";s:40:"i %count% persones els ha agradat això.";}s:13:"two_like_this";a:2:{s:7:"default";s:25:"%s i %s els agrada això.";s:6:"custom";s:25:"%s i %s els agrada això.";}s:14:"one_likes_this";a:2:{s:7:"default";s:20:"%s els agrada això.";s:6:"custom";s:20:"%s els agrada això.";}s:37:"get_likes_no_friends_you_and_singular";a:2:{s:7:"default";s:86:"Cap dels teus amics ha clicat a m''agrada, però tu i %count% altra persona ho heu fet.";s:6:"custom";s:86:"Cap dels teus amics ha clicat a m''agrada, però tu i %count% altra persona ho heu fet.";}s:35:"get_likes_no_friends_you_and_plural";a:2:{s:7:"default";s:86:"Cap dels teus amics ha clicat a m''agrada, però tu i %count% persones més ho heu fet.";s:6:"custom";s:86:"Cap dels teus amics ha clicat a m''agrada, però tu i %count% persones més ho heu fet.";}s:29:"get_likes_no_friends_singular";a:2:{s:7:"default";s:74:"Cap dels teus amics ha clicat a m''agrada, però %count% persona ho ha fet.";s:6:"custom";s:74:"Cap dels teus amics ha clicat a m''agrada, però %count% persona ho ha fet.";}s:27:"get_likes_no_friends_plural";a:2:{s:7:"default";s:76:"Cap dels teus amics ha clicat a m''agrada, però %count% persones ho han fet.";s:6:"custom";s:76:"Cap dels teus amics ha clicat a m''agrada, però %count% persones ho han fet.";}}s:13:"translate_nag";N;s:14:"name_or_avatar";N;s:17:"remove_fav_button";N;}', 'yes'),
(162, 'bp_moderation_options', 'a:6:{s:14:"unflagged_text";s:9:"Inadequat";s:12:"flagged_text";s:16:"No és inadequat";s:12:"active_types";a:1:{s:16:"activity_comment";s:2:"on";}s:17:"warning_threshold";i:5;s:15:"warning_forward";s:17:"a8000007@xtec.cat";s:15:"warning_message";s:297:"Several user reported one of your content as inappropriate.\r\nYou can see the content in the page: %CONTENTURL%.\r\nYou posted this content with the account "%AUTHORNAME%".\r\n\r\nA community moderator will soon review and moderate this content if necessary.\r\n--------------------\r\n[%SITENAME%] %SITEURL%";}', 'yes'),
(163, 'bp_moderation_db_version', '-100', 'yes'),
(166, 'gce_general', 'a:7:{s:10:"stylesheet";s:0:"";s:10:"javascript";b:0;s:7:"loading";s:12:"Carregant...";s:5:"error";s:40:"Calendari no disponible en aquest moment";s:6:"fields";b:1;s:14:"old_stylesheet";b:0;s:13:"save_settings";b:1;}', 'yes'),
(167, 'invite_anyone', 'a:22:{s:11:"max_invites";i:5;s:23:"allow_email_invitations";s:3:"all";s:23:"message_is_customizable";s:3:"yes";s:23:"subject_is_customizable";s:2:"no";s:28:"can_send_group_invites_email";s:3:"yes";s:24:"bypass_registration_lock";s:3:"yes";s:7:"version";s:5:"1.4.0";s:23:"email_visibility_toggle";s:5:"limit";s:18:"email_since_toggle";b:0;s:10:"days_since";s:1:"0";s:17:"email_role_toggle";s:3:"yes";s:12:"minimum_role";s:13:"Administrator";s:22:"email_blacklist_toggle";b:0;s:15:"email_blacklist";s:0:"";s:23:"group_invites_can_admin";s:6:"anyone";s:29:"group_invites_can_group_admin";s:6:"anyone";s:27:"group_invites_can_group_mod";s:6:"anyone";s:30:"group_invites_can_group_member";s:5:"noone";s:32:"group_invites_enable_create_step";s:3:"yes";s:19:"cloudsponge_enabled";s:3:"off";s:26:"email_limit_invites_toggle";b:0;s:22:"limit_invites_per_user";s:2:"10";}', 'yes'),
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
(188, 'wsl_settings_welcome_panel_enabled', '1', 'yes'),
(189, 'wsl_settings_redirect_url', 'http://pwc-int.educacio.intranet/agora/mastersec', 'yes'),
(190, 'wsl_settings_connect_with_label', 'Entra amb:', 'yes'),
(191, 'wsl_settings_use_popup', '2', 'yes'),
(192, 'wsl_settings_widget_display', '1', 'yes'),
(193, 'wsl_settings_authentication_widget_css', '#wp-social-login-connect-with {font-weight: bold;}\r\n#wp-social-login-connect-options {padding:10px;}\r\n#wp-social-login-connect-options a {text-decoration: none;}\r\n#wp-social-login-connect-options img {border:0 none;}\r\n.wsl_connect_with_provider {}', 'yes'),
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
(212, 'wsl_settings_bouncer_new_users_restrict_domain_text_bounce', 'El domini de la vostra adreça de correu electrònic no està autoritzat a entrar', 'yes'),
(213, 'wsl_settings_bouncer_new_users_restrict_email_enabled', '2', 'yes'),
(214, 'wsl_settings_bouncer_new_users_restrict_email_text_bounce', 'No teniu autorització per entrar (no esteu a la llista d''admesos)', 'yes'),
(215, 'wsl_settings_bouncer_new_users_restrict_profile_enabled', '2', 'yes'),
(216, 'wsl_settings_bouncer_new_users_restrict_profile_text_bounce', '', 'yes'),
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
(239, 'widget_nav_menu', 'a:9:{i:1;a:0:{}i:2;a:3:{s:5:"title";s:11:"Blogs de 1r";s:8:"nav_menu";i:70;s:10:"conditions";a:2:{s:6:"action";s:4:"show";s:5:"rules";a:2:{i:0;a:3:{s:5:"major";s:8:"category";s:5:"minor";s:1:"4";s:12:"has_children";b:0;}i:1;a:3:{s:5:"major";s:8:"category";s:5:"minor";s:1:"3";s:12:"has_children";b:0;}}}}i:3;a:3:{s:5:"title";s:11:"Blogs de 2n";s:8:"nav_menu";i:71;s:10:"conditions";a:2:{s:6:"action";s:4:"show";s:5:"rules";a:2:{i:0;a:3:{s:5:"major";s:8:"category";s:5:"minor";s:1:"3";s:12:"has_children";b:0;}i:1;a:3:{s:5:"major";s:8:"category";s:5:"minor";s:1:"5";s:12:"has_children";b:0;}}}}i:4;a:3:{s:5:"title";s:11:"Blogs de 3r";s:8:"nav_menu";i:72;s:10:"conditions";a:2:{s:6:"action";s:4:"show";s:5:"rules";a:2:{i:0;a:3:{s:5:"major";s:8:"category";s:5:"minor";s:1:"3";s:12:"has_children";b:0;}i:1;a:3:{s:5:"major";s:8:"category";s:5:"minor";s:1:"6";s:12:"has_children";b:0;}}}}i:5;a:3:{s:5:"title";s:11:"Blogs de 4t";s:8:"nav_menu";i:73;s:10:"conditions";a:2:{s:6:"action";s:4:"show";s:5:"rules";a:2:{i:0;a:3:{s:5:"major";s:8:"category";s:5:"minor";s:1:"3";s:12:"has_children";b:0;}i:1;a:3:{s:5:"major";s:8:"category";s:5:"minor";s:1:"7";s:12:"has_children";b:0;}}}}i:6;a:3:{s:5:"title";s:15:"Blocs de nivell";s:8:"nav_menu";i:32;s:10:"conditions";a:2:{s:6:"action";s:4:"show";s:5:"rules";a:1:{i:0;a:2:{s:5:"major";s:4:"page";s:5:"minor";s:3:"195";}}}}s:12:"_multiwidget";i:1;i:8;a:2:{s:8:"nav_menu";i:61;s:10:"conditions";a:2:{s:6:"action";s:4:"show";s:5:"rules";a:6:{i:0;a:2:{s:5:"major";s:4:"page";s:5:"minor";s:1:"5";}i:1;a:2:{s:5:"major";s:4:"page";s:5:"minor";s:5:"group";}i:2;a:2:{s:5:"major";s:4:"page";s:5:"minor";s:6:"member";}i:3;a:2:{s:5:"major";s:4:"page";s:5:"minor";s:2:"16";}i:4;a:2:{s:5:"major";s:4:"page";s:5:"minor";s:5:"front";}i:5;a:2:{s:5:"major";s:4:"page";s:5:"minor";s:1:"6";}}}}i:10;a:3:{s:5:"title";s:9:"Documents";s:8:"nav_menu";i:68;s:10:"conditions";a:2:{s:6:"action";s:4:"show";s:5:"rules";a:2:{i:0;a:2:{s:5:"major";s:4:"page";s:5:"minor";s:16:"post_type-bp_doc";}i:1;a:2:{s:5:"major";s:4:"page";s:5:"minor";s:10:"docs-index";}}}}}', 'yes'),
(240, 'widget_bbp_login_widget', 'a:2:{i:1;a:0:{}s:12:"_multiwidget";i:1;}', 'yes'),
(241, 'widget_bbp_views_widget', 'a:2:{i:1;a:0:{}s:12:"_multiwidget";i:1;}', 'yes'),
(242, 'widget_bbp_search_widget', 'a:2:{i:1;a:0:{}s:12:"_multiwidget";i:1;}', 'yes'),
(243, 'widget_bbp_forums_widget', 'a:2:{i:1;a:0:{}s:12:"_multiwidget";i:1;}', 'yes'),
(244, 'widget_bbp_topics_widget', 'a:2:{i:1;a:0:{}s:12:"_multiwidget";i:1;}', 'yes'),
(245, 'widget_bbp_replies_widget', 'a:2:{i:1;a:0:{}s:12:"_multiwidget";i:1;}', 'yes'),
(246, 'widget_bbp_stats_widget', 'a:2:{i:1;a:0:{}s:12:"_multiwidget";i:1;}', 'yes'),
(247, 'widget_gce_widget', 'a:2:{i:2;a:2:{s:5:"title";s:0:"";s:11:"calendar_id";i:224;}s:12:"_multiwidget";i:1;}', 'yes'),
(248, 'widget_slideshowwidget', 'a:3:{i:1;a:0:{}i:2;a:3:{s:5:"title";s:8:"Destacat";s:11:"slideshowId";s:3:"202";s:10:"conditions";a:2:{s:6:"action";s:4:"show";s:5:"rules";a:2:{i:0;a:3:{s:5:"major";s:4:"page";s:5:"minor";s:1:"5";s:12:"has_children";b:0;}i:1;a:3:{s:5:"major";s:4:"page";s:5:"minor";s:8:"activity";s:12:"has_children";b:0;}}}}s:12:"_multiwidget";i:1;}', 'yes'),
(249, 'widget_invite-anyone-widget', 'a:2:{i:1;a:0:{}s:12:"_multiwidget";i:1;}', 'yes'),
(250, 'widget_xtec_widget', 'a:3:{i:1;a:0:{}i:2;a:21:{s:5:"title";s:0:"";s:11:"ensenyament";s:2:"on";s:4:"xtec";s:2:"on";s:6:"edu365";s:2:"on";s:4:"edu3";s:2:"on";s:12:"xarxa-docent";s:0:"";s:10:"alexandria";s:0:"";s:6:"linkat";s:0:"";s:5:"jclic";s:0:"";s:5:"merli";s:0:"";s:3:"arc";s:0:"";s:7:"odissea";s:0:"";s:4:"ampa";s:0:"";s:12:"escola-verda";s:0:"";s:4:"atri";s:0:"";s:4:"saga";s:0:"";s:14:"familia-escola";s:0:"";s:15:"internet-segura";s:0:"";s:6:"moodle";s:0:"";s:8:"ampa_url";s:53:"http://pwc-int.educacio.intranet/agora/mastersec/ampa";s:16:"escola-verda_url";s:127:"http://mediambient.gencat.cat/ca/05_ambits_dactuacio/educacio_i_sostenibilitat/educacio_per_a_la_sostenibilitat/escoles_verdes/";}s:12:"_multiwidget";i:1;}', 'yes'),
(251, 'widget_logo_centre_widget', 'a:4:{i:1;a:0:{}i:2;a:1:{s:5:"title";s:0:"";}i:3;a:1:{s:5:"title";s:0:"";}s:12:"_multiwidget";i:1;}', 'yes'),
(252, 'reactor_options', 'a:23:{s:15:"tamany_font_nom";s:5:"2.5vw";s:16:"imatge_capcalera";s:0:"";s:8:"carrusel";s:3:"107";s:10:"logo_image";s:97:"http://pwc-int.educacio.intranet/agora/mastersec/wp-content/uploads/usu7/2014/09/logo-centre1.png";s:16:"nomCanonicCentre";s:20:"Institut Josep Arany";s:14:"direccioCentre";s:21:"Plaça de la Vila, 14";s:8:"cpCentre";s:21:"01234 Abella de Xerta";s:9:"telCentre";s:10:"12 345 678";s:10:"googleMaps";s:60:"https://www.google.com/maps/@41.605896,1.723144,10z?hl=ca-ES";s:13:"paleta_colors";s:5:"blaus";s:14:"frontpage_page";s:1:"9";s:23:"frontpage_post_category";s:2:"29";s:16:"frontpage_layout";s:4:"2c-l";s:26:"frontpage_posts_per_fila_1";s:2:"33";s:26:"frontpage_posts_per_fila_2";s:1:"2";s:26:"frontpage_posts_per_fila_n";s:1:"2";s:22:"frontpage_number_posts";s:2:"15";s:21:"frontpage_link_titles";b:1;s:13:"post_readmore";s:14:"Llegeix més»";s:13:"favicon_image";s:0:"";s:11:"logo_inline";b:1;s:14:"contacteCentre";s:65:"http://pwc-int.educacio.intranet/agora/mastersec/linstitut/on-som";s:12:"correuCentre";s:0:"";}', 'yes'),
(253, 'icones_capcalera', '', 'yes'),
(256, 'tadv_settings', 'a:6:{s:7:"options";s:15:"menubar,advlist";s:9:"toolbar_1";s:117:"bold,italic,blockquote,bullist,numlist,alignleft,aligncenter,alignright,link,unlink,table,fullscreen,undo,redo,wp_adv";s:9:"toolbar_2";s:121:"formatselect,alignjustify,strikethrough,outdent,indent,pastetext,removeformat,charmap,wp_more,emoticons,forecolor,wp_help";s:9:"toolbar_3";s:0:"";s:9:"toolbar_4";s:0:"";s:7:"plugins";s:107:"anchor,code,insertdatetime,nonbreaking,print,searchreplace,table,visualblocks,visualchars,emoticons,advlist";}', 'yes'),
(257, 'tadv_admin_settings', 'a:1:{s:7:"options";a:0:{}}', 'yes'),
(258, 'tadv_version', '4000', 'yes'),
(290, 'my_option_name', 'a:13:{s:6:"icon11";s:5:"clock";s:11:"link_icon11";s:43:"Aplicació de gestió de l''alumnat (faltes)";s:12:"title_icon11";s:7:"tutoria";s:6:"icon12";s:18:"welcome-learn-more";s:11:"link_icon12";s:25:"adreça moodle del centre";s:12:"title_icon12";s:6:"MOODLE";s:6:"icon21";s:8:"calendar";s:11:"link_icon21";s:77:"http://pwc-int.educacio.intranet/agora/mastersec/linstitut/calendari-del-curs";s:12:"title_icon21";s:6:"AGENDA";s:6:"icon22";s:11:"format-chat";s:11:"link_icon22";s:58:"http://pwc-int.educacio.intranet/agora/mastersec/activitat";s:12:"title_icon22";s:5:"NODES";s:14:"show_text_icon";s:2:"si";}', 'yes'),
(308, 'widget_bp_core_friends_widget', 'a:2:{i:1;a:0:{}s:12:"_multiwidget";i:1;}', 'yes'),
(353, 'nav_menu_options', 'a:2:{i:0;b:0;s:8:"auto_add";a:0:{}}', 'yes'),
(484, 'bpfb', 'a:5:{s:5:"theme";s:3:"new";s:9:"alignment";s:4:"left";s:12:"oembed_width";i:450;s:20:"thumbnail_size_width";i:450;s:21:"thumbnail_size_height";i:450;}', 'yes'),
(745, 'bphelp-my-redirect-slug', 'wp-login.php', 'yes'),
(947, 'gce_settings_general', 'a:2:{s:13:"save_settings";i:1;s:14:"always_enqueue";i:1;}', 'yes'),
(950, 'gce_cpt_setup', '1', 'yes'),
(975, '_bbp_private_forums', 'a:13:{i:0;s:3:"179";i:1;s:3:"178";i:2;s:3:"177";i:3;s:3:"176";i:4;s:3:"175";i:5;s:3:"174";i:6;s:3:"173";i:7;s:3:"172";i:8;s:3:"171";i:9;s:3:"170";i:10;s:3:"115";i:11;s:3:"113";i:12;s:3:"112";}', 'yes'),
(976, '_bbp_hidden_forums', 'a:13:{i:0;s:3:"179";i:1;s:3:"178";i:2;s:3:"177";i:3;s:3:"176";i:4;s:3:"175";i:5;s:3:"174";i:6;s:3:"173";i:7;s:3:"172";i:8;s:3:"171";i:9;s:3:"170";i:10;s:3:"115";i:11;s:3:"113";i:12;s:3:"112";}', 'yes'),
(1027, 'bp-docs-slug', 'docs', 'yes'),
(1028, 'bp-docs-excerpt-length', '30', 'yes'),
(1029, 'bp-docs-user-tab-name', 'Documents', 'yes'),
(1030, 'bp-docs-tab-name', 'Documents', 'yes'),
(1031, 'bp-docs-enable-attachments', 'yes', 'yes'),
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
(1145, 'widget_socialmedia_widget', 'a:3:{i:1;a:0:{}i:2;a:21:{s:5:"title";s:12:"Segueix-nos!";s:4:"mida";s:7:"fa-2-5x";s:11:"twitter_url";s:16:"twitter institut";s:12:"facebook_url";s:17:"facebook institut";s:15:"google-plus_url";s:0:"";s:11:"youtube_url";s:16:"youtube institut";s:9:"vimeo_url";s:0:"";s:10:"picasa_url";s:0:"";s:10:"flickr_url";s:0:"";s:13:"pinterest_url";s:0:"";s:13:"instagram_url";s:0:"";s:10:"tumblr_url";s:0:"";s:14:"soundcloud_url";s:0:"";s:11:"dropbox_url";s:0:"";s:7:"rss_url";s:53:"http://pwc-int.educacio.intranet/agora/mastersec/feed";s:9:"email_url";s:0:"";s:10:"moodle_url";s:0:"";s:14:"xarxanodes_url";s:0:"";s:8:"docs_url";s:0:"";s:9:"fotos_url";s:0:"";s:9:"video_url";s:0:"";}s:12:"_multiwidget";i:1;}', 'yes'),
(1177, 'wsl_settings_Google_app_scope', 'profile https://www.googleapis.com/auth/plus.profile.emails.read', 'yes'),
(1280, 'WPLANG', 'ca', 'yes'),
(1281, 'db_upgraded', '', 'yes');
INSERT INTO `wp_options` (`option_id`, `option_name`, `option_value`, `autoload`) VALUES
(1294, 'widget_grup_classe_widget', 'a:14:{i:2;a:13:{s:5:"title";s:13:"El blog de 1A";s:12:"id_calendari";s:3:"224";s:13:"nom_calendari";s:6:"Agenda";s:14:"calendari_grid";b:1;s:14:"calendari_list";b:0;s:9:"nom_tutor";s:11:"Nom tutor/a";s:11:"email_tutor";s:24:"tutor.eso1a@insarany.cat";s:15:"horari_families";s:15:"dl. 00:00-00:00";s:8:"nav_menu";s:2:"55";s:9:"text_open";s:106:"<img src=http://pwc-int.educacio.intranet/agora/mastersec/wp-content/uploads/usu7/2015/01/foto-classe.png>";s:10:"text_close";s:71:"Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum";s:10:"conditions";a:2:{s:6:"action";s:4:"show";s:5:"rules";a:1:{i:0;a:3:{s:5:"major";s:8:"category";s:5:"minor";s:1:"9";s:12:"has_children";b:0;}}}s:13:"es_note_group";s:6:"ESO 1A";}i:3;a:13:{s:5:"title";s:13:"El blog de 1B";s:12:"id_calendari";s:3:"224";s:13:"nom_calendari";s:6:"Agenda";s:14:"calendari_grid";b:1;s:14:"calendari_list";b:0;s:9:"nom_tutor";s:15:"Nom del tutor/a";s:11:"email_tutor";s:24:"tutor.eso1b@insarany.cat";s:15:"horari_families";s:15:"dl. 00:00-00:00";s:8:"nav_menu";s:2:"55";s:9:"text_open";s:106:"<img src=http://pwc-int.educacio.intranet/agora/mastersec/wp-content/uploads/usu7/2015/01/foto-classe.png>";s:10:"text_close";s:71:"Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum";s:10:"conditions";a:2:{s:6:"action";s:4:"show";s:5:"rules";a:1:{i:0;a:3:{s:5:"major";s:8:"category";s:5:"minor";s:2:"10";s:12:"has_children";b:0;}}}s:13:"es_note_group";s:6:"ESO 1B";}i:4;a:13:{s:5:"title";s:13:"El blog de 1C";s:12:"id_calendari";s:3:"224";s:13:"nom_calendari";s:6:"Agenda";s:14:"calendari_grid";b:1;s:14:"calendari_list";b:0;s:9:"nom_tutor";s:11:"Nom tutor/a";s:11:"email_tutor";s:24:"tutor.eso1c@insarany.cat";s:15:"horari_families";s:15:"dl. 00:00-00:00";s:8:"nav_menu";s:2:"55";s:9:"text_open";s:106:"<img src=http://pwc-int.educacio.intranet/agora/mastersec/wp-content/uploads/usu7/2015/01/foto-classe.png>";s:10:"text_close";s:71:"Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum";s:10:"conditions";a:2:{s:6:"action";s:4:"show";s:5:"rules";a:1:{i:0;a:3:{s:5:"major";s:8:"category";s:5:"minor";s:2:"11";s:12:"has_children";b:0;}}}s:13:"es_note_group";s:6:"ESO 1C";}i:5;a:13:{s:5:"title";s:13:"El blog de 2A";s:12:"id_calendari";s:3:"224";s:13:"nom_calendari";s:6:"Agenda";s:14:"calendari_grid";b:1;s:14:"calendari_list";b:0;s:9:"nom_tutor";s:15:"Nom del tutor/a";s:11:"email_tutor";s:24:"tutor.eso2a@insarany.cat";s:15:"horari_families";s:15:"dl. 00:00-00:00";s:8:"nav_menu";s:2:"55";s:9:"text_open";s:106:"<img src=http://pwc-int.educacio.intranet/agora/mastersec/wp-content/uploads/usu7/2015/01/foto-classe.png>";s:10:"text_close";s:71:"Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum";s:10:"conditions";a:2:{s:6:"action";s:4:"show";s:5:"rules";a:1:{i:0;a:3:{s:5:"major";s:8:"category";s:5:"minor";s:2:"14";s:12:"has_children";b:0;}}}s:13:"es_note_group";s:6:"ESO 2A";}i:6;a:13:{s:5:"title";s:13:"El blog de 2B";s:12:"id_calendari";s:3:"224";s:13:"nom_calendari";s:6:"Agenda";s:14:"calendari_grid";b:1;s:14:"calendari_list";b:0;s:9:"nom_tutor";s:15:"Nom del tutor/a";s:11:"email_tutor";s:24:"tutor.eso2b@insarany.cat";s:15:"horari_families";s:15:"dl. 00:00-00:00";s:8:"nav_menu";s:2:"55";s:9:"text_open";s:106:"<img src=http://pwc-int.educacio.intranet/agora/mastersec/wp-content/uploads/usu7/2015/01/foto-classe.png>";s:10:"text_close";s:71:"Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum";s:10:"conditions";a:2:{s:6:"action";s:4:"show";s:5:"rules";a:1:{i:0;a:3:{s:5:"major";s:8:"category";s:5:"minor";s:2:"15";s:12:"has_children";b:0;}}}s:13:"es_note_group";s:6:"ESO 2B";}i:7;a:13:{s:5:"title";s:13:"El blog de 2C";s:12:"id_calendari";s:3:"224";s:13:"nom_calendari";s:6:"Agenda";s:14:"calendari_grid";b:1;s:14:"calendari_list";b:0;s:9:"nom_tutor";s:14:"Nom de tutor/a";s:11:"email_tutor";s:24:"tutor.eso2c@insarany.cat";s:15:"horari_families";s:15:"dl. 00:00-00:00";s:8:"nav_menu";s:2:"55";s:9:"text_open";s:106:"<img src=http://pwc-int.educacio.intranet/agora/mastersec/wp-content/uploads/usu7/2015/01/foto-classe.png>";s:10:"text_close";s:71:"Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum";s:10:"conditions";a:2:{s:6:"action";s:4:"show";s:5:"rules";a:1:{i:0;a:3:{s:5:"major";s:8:"category";s:5:"minor";s:2:"16";s:12:"has_children";b:0;}}}s:13:"es_note_group";s:6:"ESO 2C";}i:8;a:13:{s:5:"title";s:16:"El blog de Batxi";s:12:"id_calendari";s:3:"224";s:13:"nom_calendari";s:6:"Agenda";s:14:"calendari_grid";b:1;s:14:"calendari_list";b:0;s:9:"nom_tutor";s:15:"Nom del tutor/a";s:11:"email_tutor";s:30:"tutor.batxillerat@insarany.cat";s:15:"horari_families";s:15:"dj. 16:00-18:00";s:8:"nav_menu";s:2:"55";s:9:"text_open";s:106:"<img src=http://pwc-int.educacio.intranet/agora/mastersec/wp-content/uploads/usu7/2015/01/foto-classe.png>";s:10:"text_close";s:71:"Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum";s:10:"conditions";a:2:{s:6:"action";s:4:"show";s:5:"rules";a:1:{i:0;a:3:{s:5:"major";s:8:"category";s:5:"minor";s:1:"8";s:12:"has_children";b:0;}}}s:13:"es_note_group";s:1:"0";}i:9;a:13:{s:5:"title";s:13:"El blog de 3A";s:12:"id_calendari";s:3:"224";s:13:"nom_calendari";s:6:"Agenda";s:14:"calendari_grid";b:1;s:14:"calendari_list";b:0;s:9:"nom_tutor";s:15:"Nom del tutor/a";s:11:"email_tutor";s:24:"tutor.eso3a@insarany.cat";s:15:"horari_families";s:15:"dl. 00:00-00:00";s:8:"nav_menu";s:2:"55";s:9:"text_open";s:106:"<img src=http://pwc-int.educacio.intranet/agora/mastersec/wp-content/uploads/usu7/2015/01/foto-classe.png>";s:10:"text_close";s:71:"Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum";s:10:"conditions";a:2:{s:6:"action";s:4:"show";s:5:"rules";a:1:{i:0;a:3:{s:5:"major";s:8:"category";s:5:"minor";s:2:"19";s:12:"has_children";b:0;}}}s:13:"es_note_group";s:6:"ESO 3A";}i:10;a:13:{s:5:"title";s:13:"El blog de 3B";s:12:"id_calendari";s:3:"224";s:13:"nom_calendari";s:6:"Agenda";s:14:"calendari_grid";b:1;s:14:"calendari_list";b:0;s:9:"nom_tutor";s:15:"Nom del tutor/a";s:11:"email_tutor";s:24:"tutor.eso3b@insarany.cat";s:15:"horari_families";s:15:"dm. 00:00-00:00";s:8:"nav_menu";s:2:"55";s:9:"text_open";s:106:"<img src=http://pwc-int.educacio.intranet/agora/mastersec/wp-content/uploads/usu7/2015/01/foto-classe.png>";s:10:"text_close";s:71:"Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum";s:10:"conditions";a:2:{s:6:"action";s:4:"show";s:5:"rules";a:1:{i:0;a:3:{s:5:"major";s:8:"category";s:5:"minor";s:2:"20";s:12:"has_children";b:0;}}}s:13:"es_note_group";s:6:"ESO 3B";}i:11;a:13:{s:5:"title";s:13:"El blog de 3C";s:12:"id_calendari";s:3:"224";s:13:"nom_calendari";s:6:"Agenda";s:14:"calendari_grid";b:1;s:14:"calendari_list";b:0;s:9:"nom_tutor";s:15:"Nom del tutor/a";s:11:"email_tutor";s:24:"tutor.eso3c@insarany.cat";s:15:"horari_families";s:15:"dl. 00:00-00:00";s:8:"nav_menu";s:2:"55";s:9:"text_open";s:106:"<img src=http://pwc-int.educacio.intranet/agora/mastersec/wp-content/uploads/usu7/2015/01/foto-classe.png>";s:10:"text_close";s:71:"Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum";s:10:"conditions";a:2:{s:6:"action";s:4:"show";s:5:"rules";a:1:{i:0;a:3:{s:5:"major";s:8:"category";s:5:"minor";s:2:"21";s:12:"has_children";b:0;}}}s:13:"es_note_group";s:6:"ESO 3C";}i:12;a:13:{s:5:"title";s:13:"El blog de 4A";s:12:"id_calendari";s:3:"224";s:13:"nom_calendari";s:6:"Agenda";s:14:"calendari_grid";b:1;s:14:"calendari_list";b:0;s:9:"nom_tutor";s:15:"Nom del tutor/a";s:11:"email_tutor";s:24:"tutor.eso4a@insarany.cat";s:15:"horari_families";s:15:"dc. 00:00-00:00";s:8:"nav_menu";s:2:"55";s:9:"text_open";s:106:"<img src=http://pwc-int.educacio.intranet/agora/mastersec/wp-content/uploads/usu7/2015/01/foto-classe.png>";s:10:"text_close";s:71:"Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum";s:10:"conditions";a:2:{s:6:"action";s:4:"show";s:5:"rules";a:1:{i:0;a:3:{s:5:"major";s:8:"category";s:5:"minor";s:2:"24";s:12:"has_children";b:0;}}}s:13:"es_note_group";s:6:"ESO 4A";}i:13;a:13:{s:5:"title";s:13:"El blog de 4B";s:12:"id_calendari";s:3:"224";s:13:"nom_calendari";s:6:"Agenda";s:14:"calendari_grid";b:1;s:14:"calendari_list";b:0;s:9:"nom_tutor";s:15:"Nom del tutor/a";s:11:"email_tutor";s:24:"tutor.eso4b@insarany.cat";s:15:"horari_families";s:15:"dl. 00:00-00:00";s:8:"nav_menu";s:2:"55";s:9:"text_open";s:106:"<img src=http://pwc-int.educacio.intranet/agora/mastersec/wp-content/uploads/usu7/2015/01/foto-classe.png>";s:10:"text_close";s:71:"Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum";s:10:"conditions";a:2:{s:6:"action";s:4:"show";s:5:"rules";a:1:{i:0;a:3:{s:5:"major";s:8:"category";s:5:"minor";s:2:"25";s:12:"has_children";b:0;}}}s:13:"es_note_group";s:6:"ESO 4B";}i:14;a:13:{s:5:"title";s:13:"El blog de 4C";s:12:"id_calendari";s:3:"224";s:13:"nom_calendari";s:6:"Agenda";s:14:"calendari_grid";b:1;s:14:"calendari_list";b:0;s:9:"nom_tutor";s:15:"Nom del tutor/a";s:11:"email_tutor";s:24:"tutor.eso4c@insarany.cat";s:15:"horari_families";s:15:"dl. 00:00-00:00";s:8:"nav_menu";s:2:"55";s:9:"text_open";s:106:"<img src=http://pwc-int.educacio.intranet/agora/mastersec/wp-content/uploads/usu7/2015/01/foto-classe.png>";s:10:"text_close";s:71:"Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum";s:10:"conditions";a:2:{s:6:"action";s:4:"show";s:5:"rules";a:1:{i:0;a:3:{s:5:"major";s:8:"category";s:5:"minor";s:2:"26";s:12:"has_children";b:0;}}}s:13:"es_note_group";s:6:"ESO 4C";}s:12:"_multiwidget";i:1;}', 'yes'),
(1342, 'bpfb_plugin', 'a:1:{s:9:"installed";i:1;}', 'yes'),
(1416, 'wsl_components_users_enabled', '1', 'yes'),
(1439, 'bp_disable_blogforum_comments', '1', 'yes'),
(1662, 'wsl_settings_Google_app_id', '', 'yes'),
(1663, 'wsl_settings_Google_app_secret', '', 'yes'),
(1664, 'wsl_settings_Moodle_app_id', '', 'yes'),
(1665, 'wsl_settings_Moodle_app_secret', '', 'yes'),
(1666, 'wsl_settings_Moodle_url', '', 'yes'),
(1837, 'widget_xtec_stats_widget', 'a:2:{i:1;a:0:{}s:12:"_multiwidget";i:1;}', 'yes'),
(2283, 'addtoany_options', 'a:33:{s:8:"position";s:6:"bottom";s:30:"display_in_posts_on_front_page";s:2:"-1";s:33:"display_in_posts_on_archive_pages";s:1:"1";s:19:"display_in_excerpts";s:2:"-1";s:16:"display_in_posts";s:1:"1";s:16:"display_in_pages";s:1:"1";s:15:"display_in_feed";s:2:"-1";s:10:"show_title";s:2:"-1";s:7:"onclick";s:2:"-1";s:9:"icon_size";s:2:"25";s:6:"button";s:4:"NONE";s:13:"button_custom";s:0:"";s:6:"header";s:0:"";s:23:"additional_js_variables";s:0:"";s:12:"custom_icons";s:2:"-1";s:16:"custom_icons_url";s:1:"/";s:17:"custom_icons_type";s:3:"png";s:10:"inline_css";s:1:"1";s:5:"cache";s:2:"-1";s:20:"display_in_cpt_forum";s:2:"-1";s:20:"display_in_cpt_topic";s:2:"-1";s:20:"display_in_cpt_reply";s:2:"-1";s:21:"display_in_cpt_bp_doc";s:2:"-1";s:23:"display_in_cpt_gce_feed";s:2:"-1";s:11:"button_text";s:10:"Comparteix";s:24:"special_facebook_options";a:1:{s:10:"show_count";s:2:"-1";}s:23:"special_twitter_options";a:1:{s:10:"show_count";s:2:"-1";}s:15:"active_services";a:4:{i:0;s:8:"facebook";i:1;s:7:"twitter";i:2;s:8:"whatsapp";i:3;s:12:"google_gmail";}s:29:"special_facebook_like_options";a:1:{s:4:"verb";s:4:"like";}s:29:"special_twitter_tweet_options";a:1:{s:10:"show_count";s:2:"-1";}s:30:"special_google_plusone_options";a:1:{s:10:"show_count";s:2:"-1";}s:33:"special_google_plus_share_options";a:1:{s:10:"show_count";s:2:"-1";}s:29:"special_pinterest_pin_options";a:1:{s:10:"show_count";s:2:"-1";}}', 'yes'),
(2307, 'nodesbox_name', 'Institut L&#039;Arany', 'yes'),
(2427, 'widget_a2a_follow_widget', 'a:2:{i:1;a:0:{}s:12:"_multiwidget";i:1;}', 'yes'),
(2428, 'widget_a2a_share_save_widget', 'a:2:{i:1;a:0:{}s:12:"_multiwidget";i:1;}', 'yes'),
(2434, 'common_css', '', 'yes'),
(2476, 'recaptcha_options', 'a:5:{s:8:"site_key";s:40:"6LddJgoTAAAAAFCT6LwNkKU2YR2qNMG7fQgIXse8";s:6:"secret";s:40:"6LddJgoTAAAAAKs-yBghGgTZmAB1oPLQlldWYKAh";s:14:"comments_theme";s:8:"standard";s:18:"recaptcha_language";s:2:"ca";s:17:"no_response_error";s:58:"<strong>ERROR</strong>: Please fill in the reCAPTCHA form.";}', 'yes'),
(2618, 'bp-disable-group-cover-image-uploads', '1', 'yes'),
(2619, 'bp-disable-cover-image-uploads', '1', 'yes'),
(2620, 'ga_analyticator_global_notification', '1', 'yes'),
(2622, 'xtec-stats-visits', '0', 'yes'),
(2623, 'xtec-stats-include-admin', 'on', 'yes'),
(2666, '_bbp_edit_lock', '30', 'yes'),
(2667, '_bbp_throttle_time', '10', 'yes'),
(2668, '_bbp_allow_anonymous', '0', 'yes'),
(2669, '_bbp_allow_global_access', '1', 'yes'),
(2670, '_bbp_default_role', 'bbp_participant', 'yes'),
(2671, '_bbp_allow_revisions', '1', 'yes'),
(2672, '_bbp_enable_favorites', '1', 'yes'),
(2673, '_bbp_enable_subscriptions', '1', 'yes'),
(2674, '_bbp_allow_topic_tags', '1', 'yes'),
(2675, '_bbp_allow_search', '1', 'yes'),
(2676, '_bbp_use_wp_editor', '1', 'yes'),
(2677, '_bbp_use_autoembed', '1', 'yes'),
(2678, '_bbp_thread_replies_depth', '3', 'yes'),
(2679, '_bbp_allow_threaded_replies', '1', 'yes'),
(2680, '_bbp_topics_per_page', '15', 'yes'),
(2681, '_bbp_replies_per_page', '15', 'yes'),
(2682, '_bbp_topics_per_rss_page', '25', 'yes'),
(2683, '_bbp_replies_per_rss_page', '25', 'yes'),
(2684, '_bbp_root_slug', 'forums', 'yes'),
(2685, '_bbp_include_root', '1', 'yes'),
(2686, '_bbp_show_on_root', 'forums', 'yes'),
(2687, '_bbp_forum_slug', 'forum', 'yes'),
(2688, '_bbp_topic_slug', 'topic', 'yes'),
(2689, '_bbp_topic_tag_slug', 'topic-tag', 'yes'),
(2690, '_bbp_view_slug', 'view', 'yes'),
(2691, '_bbp_reply_slug', 'reply', 'yes'),
(2692, '_bbp_search_slug', 'search', 'yes'),
(2693, '_bbp_user_slug', 'users', 'yes'),
(2694, '_bbp_topic_archive_slug', 'topics', 'yes'),
(2695, '_bbp_reply_archive_slug', 'replies', 'yes'),
(2696, '_bbp_user_favs_slug', 'favorites', 'yes'),
(2697, '_bbp_user_subs_slug', 'subscriptions', 'yes'),
(2698, '_bbp_enable_group_forums', '1', 'yes'),
(2699, '_bbp_group_forums_root_id', '0', 'yes'),
(2700, 'ja_bbpress_tinymce_full', '0', 'yes'),
(2701, 'ja_bbpress_tinymce_media', '1', 'yes'),
(2985, 'email-subscribers', '2.9', 'yes'),
(2993, 'widget_email-subscribers', 'a:3:{i:1;a:0:{}i:3;a:4:{s:8:"es_title";s:22:"Subscripció de correu";s:7:"es_desc";s:35:"T''avisarem si hi ha notícies noves";s:7:"es_name";s:3:"YES";s:8:"es_group";s:7:"Portada";}s:12:"_multiwidget";i:1;}', 'yes'),
(3412, 'finished_splitting_shared_terms', '1', 'yes'),
(3413, 'site_icon', '0', 'yes'),
(3414, 'medium_large_size_w', '768', 'yes'),
(3415, 'medium_large_size_h', '0', 'yes'),
(3421, 'category_children', 'a:5:{i:3;a:4:{i:0;i:4;i:1;i:5;i:2;i:6;i:3;i:7;}i:4;a:3:{i:0;i:9;i:1;i:10;i:2;i:11;}i:5;a:3:{i:0;i:14;i:1;i:15;i:2;i:16;}i:6;a:3:{i:0;i:19;i:1;i:20;i:2;i:21;}i:7;a:3:{i:0;i:24;i:1;i:25;i:2;i:26;}}', 'yes'),
(3422, '_split_terms', 'a:4:{i:4;a:1:{s:8:"nav_menu";i:70;}i:5;a:1:{s:8:"nav_menu";i:71;}i:6;a:1:{s:8:"nav_menu";i:72;}i:7;a:1:{s:8:"nav_menu";i:73;}}', 'yes');
INSERT INTO `wp_options` (`option_id`, `option_name`, `option_value`, `autoload`) VALUES
(3437, 'rewrite_rules', 'a:396:{s:14:"docs/create/?$";s:52:"index.php?post_type=bp_doc&name=$matches[1]&create=1";s:34:"docs/my-groups/page/([0-9]{1,})/?$";s:56:"index.php?post_type=bp_doc&my-groups=1&paged=$matches[1]";s:17:"docs/my-groups/?$";s:55:"index.php?post_type=bp_doc&name=$matches[1]&my-groups=1";s:20:"docs/([^/]+)/edit/?$";s:50:"index.php?post_type=bp_doc&name=$matches[1]&edit=1";s:23:"docs/([^/]+)/history/?$";s:53:"index.php?post_type=bp_doc&name=$matches[1]&history=1";s:22:"docs/([^/]+)/delete/?$";s:53:"index.php?post_type=bp_doc&name=$matches[1]&history=1";s:23:"docs/([^/]+)/untrash/?$";s:53:"index.php?post_type=bp_doc&name=$matches[1]&untrash=1";s:33:"docs/([^/]+)/unlink-from-group/?$";s:63:"index.php?post_type=bp_doc&name=$matches[1]&unlink-from-group=1";s:9:"forums/?$";s:25:"index.php?post_type=forum";s:39:"forums/feed/(feed|rdf|rss|rss2|atom)/?$";s:42:"index.php?post_type=forum&feed=$matches[1]";s:34:"forums/(feed|rdf|rss|rss2|atom)/?$";s:42:"index.php?post_type=forum&feed=$matches[1]";s:26:"forums/page/([0-9]{1,})/?$";s:43:"index.php?post_type=forum&paged=$matches[1]";s:9:"topics/?$";s:25:"index.php?post_type=topic";s:39:"topics/feed/(feed|rdf|rss|rss2|atom)/?$";s:42:"index.php?post_type=topic&feed=$matches[1]";s:34:"topics/(feed|rdf|rss|rss2|atom)/?$";s:42:"index.php?post_type=topic&feed=$matches[1]";s:26:"topics/page/([0-9]{1,})/?$";s:43:"index.php?post_type=topic&paged=$matches[1]";s:28:"forums/forum/([^/]+)/edit/?$";s:34:"index.php?forum=$matches[1]&edit=1";s:28:"forums/topic/([^/]+)/edit/?$";s:34:"index.php?topic=$matches[1]&edit=1";s:28:"forums/reply/([^/]+)/edit/?$";s:34:"index.php?reply=$matches[1]&edit=1";s:32:"forums/topic-tag/([^/]+)/edit/?$";s:38:"index.php?topic-tag=$matches[1]&edit=1";s:48:"forums/users/([^/]+)/topics/page/?([0-9]{1,})/?$";s:59:"index.php?bbp_user=$matches[1]&bbp_tops=1&paged=$matches[2]";s:49:"forums/users/([^/]+)/replies/page/?([0-9]{1,})/?$";s:59:"index.php?bbp_user=$matches[1]&bbp_reps=1&paged=$matches[2]";s:51:"forums/users/([^/]+)/favorites/page/?([0-9]{1,})/?$";s:59:"index.php?bbp_user=$matches[1]&bbp_favs=1&paged=$matches[2]";s:55:"forums/users/([^/]+)/subscriptions/page/?([0-9]{1,})/?$";s:59:"index.php?bbp_user=$matches[1]&bbp_subs=1&paged=$matches[2]";s:30:"forums/users/([^/]+)/topics/?$";s:41:"index.php?bbp_user=$matches[1]&bbp_tops=1";s:31:"forums/users/([^/]+)/replies/?$";s:41:"index.php?bbp_user=$matches[1]&bbp_reps=1";s:33:"forums/users/([^/]+)/favorites/?$";s:41:"index.php?bbp_user=$matches[1]&bbp_favs=1";s:37:"forums/users/([^/]+)/subscriptions/?$";s:41:"index.php?bbp_user=$matches[1]&bbp_subs=1";s:28:"forums/users/([^/]+)/edit/?$";s:37:"index.php?bbp_user=$matches[1]&edit=1";s:23:"forums/users/([^/]+)/?$";s:30:"index.php?bbp_user=$matches[1]";s:40:"forums/view/([^/]+)/page/?([0-9]{1,})/?$";s:48:"index.php?bbp_view=$matches[1]&paged=$matches[2]";s:27:"forums/view/([^/]+)/feed/?$";s:47:"index.php?bbp_view=$matches[1]&feed=$matches[2]";s:22:"forums/view/([^/]+)/?$";s:30:"index.php?bbp_view=$matches[1]";s:34:"forums/search/page/?([0-9]{1,})/?$";s:27:"index.php?paged=$matches[1]";s:16:"forums/search/?$";s:20:"index.php?bbp_search";s:11:"^wp-json/?$";s:22:"index.php?rest_route=/";s:14:"^wp-json/(.*)?";s:33:"index.php?rest_route=/$matches[1]";s:21:"^index.php/wp-json/?$";s:22:"index.php?rest_route=/";s:24:"^index.php/wp-json/(.*)?";s:33:"index.php?rest_route=/$matches[1]";s:7:"docs/?$";s:26:"index.php?post_type=bp_doc";s:37:"docs/feed/(feed|rdf|rss|rss2|atom)/?$";s:43:"index.php?post_type=bp_doc&feed=$matches[1]";s:32:"docs/(feed|rdf|rss|rss2|atom)/?$";s:43:"index.php?post_type=bp_doc&feed=$matches[1]";s:24:"docs/page/([0-9]{1,})/?$";s:44:"index.php?post_type=bp_doc&paged=$matches[1]";s:12:"slideshow/?$";s:29:"index.php?post_type=slideshow";s:42:"slideshow/feed/(feed|rdf|rss|rss2|atom)/?$";s:46:"index.php?post_type=slideshow&feed=$matches[1]";s:37:"slideshow/(feed|rdf|rss|rss2|atom)/?$";s:46:"index.php?post_type=slideshow&feed=$matches[1]";s:29:"slideshow/page/([0-9]{1,})/?$";s:47:"index.php?post_type=slideshow&paged=$matches[1]";s:48:"categoria/(.+?)/feed/(feed|rdf|rss|rss2|atom)/?$";s:52:"index.php?category_name=$matches[1]&feed=$matches[2]";s:43:"categoria/(.+?)/(feed|rdf|rss|rss2|atom)/?$";s:52:"index.php?category_name=$matches[1]&feed=$matches[2]";s:24:"categoria/(.+?)/embed/?$";s:46:"index.php?category_name=$matches[1]&embed=true";s:36:"categoria/(.+?)/page/?([0-9]{1,})/?$";s:53:"index.php?category_name=$matches[1]&paged=$matches[2]";s:18:"categoria/(.+?)/?$";s:35:"index.php?category_name=$matches[1]";s:44:"tag/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:42:"index.php?tag=$matches[1]&feed=$matches[2]";s:39:"tag/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:42:"index.php?tag=$matches[1]&feed=$matches[2]";s:20:"tag/([^/]+)/embed/?$";s:36:"index.php?tag=$matches[1]&embed=true";s:32:"tag/([^/]+)/page/?([0-9]{1,})/?$";s:43:"index.php?tag=$matches[1]&paged=$matches[2]";s:14:"tag/([^/]+)/?$";s:25:"index.php?tag=$matches[1]";s:45:"type/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:50:"index.php?post_format=$matches[1]&feed=$matches[2]";s:40:"type/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:50:"index.php?post_format=$matches[1]&feed=$matches[2]";s:21:"type/([^/]+)/embed/?$";s:44:"index.php?post_format=$matches[1]&embed=true";s:33:"type/([^/]+)/page/?([0-9]{1,})/?$";s:51:"index.php?post_format=$matches[1]&paged=$matches[2]";s:15:"type/([^/]+)/?$";s:33:"index.php?post_format=$matches[1]";s:38:"forums/forum/.+?/attachment/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:48:"forums/forum/.+?/attachment/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:68:"forums/forum/.+?/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:63:"forums/forum/.+?/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:63:"forums/forum/.+?/attachment/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:44:"forums/forum/.+?/attachment/([^/]+)/embed/?$";s:43:"index.php?attachment=$matches[1]&embed=true";s:27:"forums/forum/(.+?)/embed/?$";s:38:"index.php?forum=$matches[1]&embed=true";s:31:"forums/forum/(.+?)/trackback/?$";s:32:"index.php?forum=$matches[1]&tb=1";s:51:"forums/forum/(.+?)/feed/(feed|rdf|rss|rss2|atom)/?$";s:44:"index.php?forum=$matches[1]&feed=$matches[2]";s:46:"forums/forum/(.+?)/(feed|rdf|rss|rss2|atom)/?$";s:44:"index.php?forum=$matches[1]&feed=$matches[2]";s:39:"forums/forum/(.+?)/page/?([0-9]{1,})/?$";s:45:"index.php?forum=$matches[1]&paged=$matches[2]";s:46:"forums/forum/(.+?)/comment-page-([0-9]{1,})/?$";s:45:"index.php?forum=$matches[1]&cpage=$matches[2]";s:35:"forums/forum/(.+?)(?:/([0-9]+))?/?$";s:44:"index.php?forum=$matches[1]&page=$matches[2]";s:40:"forums/topic/[^/]+/attachment/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:50:"forums/topic/[^/]+/attachment/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:70:"forums/topic/[^/]+/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:65:"forums/topic/[^/]+/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:65:"forums/topic/[^/]+/attachment/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:46:"forums/topic/[^/]+/attachment/([^/]+)/embed/?$";s:43:"index.php?attachment=$matches[1]&embed=true";s:29:"forums/topic/([^/]+)/embed/?$";s:38:"index.php?topic=$matches[1]&embed=true";s:33:"forums/topic/([^/]+)/trackback/?$";s:32:"index.php?topic=$matches[1]&tb=1";s:53:"forums/topic/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:44:"index.php?topic=$matches[1]&feed=$matches[2]";s:48:"forums/topic/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:44:"index.php?topic=$matches[1]&feed=$matches[2]";s:41:"forums/topic/([^/]+)/page/?([0-9]{1,})/?$";s:45:"index.php?topic=$matches[1]&paged=$matches[2]";s:48:"forums/topic/([^/]+)/comment-page-([0-9]{1,})/?$";s:45:"index.php?topic=$matches[1]&cpage=$matches[2]";s:37:"forums/topic/([^/]+)(?:/([0-9]+))?/?$";s:44:"index.php?topic=$matches[1]&page=$matches[2]";s:29:"forums/topic/[^/]+/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:39:"forums/topic/[^/]+/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:59:"forums/topic/[^/]+/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:54:"forums/topic/[^/]+/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:54:"forums/topic/[^/]+/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:35:"forums/topic/[^/]+/([^/]+)/embed/?$";s:43:"index.php?attachment=$matches[1]&embed=true";s:40:"forums/reply/[^/]+/attachment/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:50:"forums/reply/[^/]+/attachment/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:70:"forums/reply/[^/]+/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:65:"forums/reply/[^/]+/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:65:"forums/reply/[^/]+/attachment/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:46:"forums/reply/[^/]+/attachment/([^/]+)/embed/?$";s:43:"index.php?attachment=$matches[1]&embed=true";s:29:"forums/reply/([^/]+)/embed/?$";s:38:"index.php?reply=$matches[1]&embed=true";s:33:"forums/reply/([^/]+)/trackback/?$";s:32:"index.php?reply=$matches[1]&tb=1";s:41:"forums/reply/([^/]+)/page/?([0-9]{1,})/?$";s:45:"index.php?reply=$matches[1]&paged=$matches[2]";s:48:"forums/reply/([^/]+)/comment-page-([0-9]{1,})/?$";s:45:"index.php?reply=$matches[1]&cpage=$matches[2]";s:37:"forums/reply/([^/]+)(?:/([0-9]+))?/?$";s:44:"index.php?reply=$matches[1]&page=$matches[2]";s:29:"forums/reply/[^/]+/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:39:"forums/reply/[^/]+/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:59:"forums/reply/[^/]+/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:54:"forums/reply/[^/]+/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:54:"forums/reply/[^/]+/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:35:"forums/reply/[^/]+/([^/]+)/embed/?$";s:43:"index.php?attachment=$matches[1]&embed=true";s:57:"forums/topic-tag/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:48:"index.php?topic-tag=$matches[1]&feed=$matches[2]";s:52:"forums/topic-tag/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:48:"index.php?topic-tag=$matches[1]&feed=$matches[2]";s:33:"forums/topic-tag/([^/]+)/embed/?$";s:42:"index.php?topic-tag=$matches[1]&embed=true";s:45:"forums/topic-tag/([^/]+)/page/?([0-9]{1,})/?$";s:49:"index.php?topic-tag=$matches[1]&paged=$matches[2]";s:27:"forums/topic-tag/([^/]+)/?$";s:31:"index.php?topic-tag=$matches[1]";s:42:"forums/search/([^/]+)/page/?([0-9]{1,})/?$";s:50:"index.php?bbp_search=$matches[1]&paged=$matches[2]";s:24:"forums/search/([^/]+)/?$";s:32:"index.php?bbp_search=$matches[1]";s:38:"ia_invites/[^/]+/attachment/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:48:"ia_invites/[^/]+/attachment/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:68:"ia_invites/[^/]+/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:63:"ia_invites/[^/]+/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:63:"ia_invites/[^/]+/attachment/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:44:"ia_invites/[^/]+/attachment/([^/]+)/embed/?$";s:43:"index.php?attachment=$matches[1]&embed=true";s:27:"ia_invites/([^/]+)/embed/?$";s:43:"index.php?ia_invites=$matches[1]&embed=true";s:31:"ia_invites/([^/]+)/trackback/?$";s:37:"index.php?ia_invites=$matches[1]&tb=1";s:39:"ia_invites/([^/]+)/page/?([0-9]{1,})/?$";s:50:"index.php?ia_invites=$matches[1]&paged=$matches[2]";s:46:"ia_invites/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?ia_invites=$matches[1]&cpage=$matches[2]";s:35:"ia_invites/([^/]+)(?:/([0-9]+))?/?$";s:49:"index.php?ia_invites=$matches[1]&page=$matches[2]";s:27:"ia_invites/[^/]+/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:37:"ia_invites/[^/]+/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:57:"ia_invites/[^/]+/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:52:"ia_invites/[^/]+/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:52:"ia_invites/[^/]+/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:33:"ia_invites/[^/]+/([^/]+)/embed/?$";s:43:"index.php?attachment=$matches[1]&embed=true";s:52:"ia_invitees/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:50:"index.php?ia_invitees=$matches[1]&feed=$matches[2]";s:47:"ia_invitees/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:50:"index.php?ia_invitees=$matches[1]&feed=$matches[2]";s:28:"ia_invitees/([^/]+)/embed/?$";s:44:"index.php?ia_invitees=$matches[1]&embed=true";s:40:"ia_invitees/([^/]+)/page/?([0-9]{1,})/?$";s:51:"index.php?ia_invitees=$matches[1]&paged=$matches[2]";s:22:"ia_invitees/([^/]+)/?$";s:33:"index.php?ia_invitees=$matches[1]";s:58:"ia_invited_groups/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:56:"index.php?ia_invited_groups=$matches[1]&feed=$matches[2]";s:53:"ia_invited_groups/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:56:"index.php?ia_invited_groups=$matches[1]&feed=$matches[2]";s:34:"ia_invited_groups/([^/]+)/embed/?$";s:50:"index.php?ia_invited_groups=$matches[1]&embed=true";s:46:"ia_invited_groups/([^/]+)/page/?([0-9]{1,})/?$";s:57:"index.php?ia_invited_groups=$matches[1]&paged=$matches[2]";s:28:"ia_invited_groups/([^/]+)/?$";s:39:"index.php?ia_invited_groups=$matches[1]";s:54:"calendar_feed/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:52:"index.php?calendar_feed=$matches[1]&feed=$matches[2]";s:49:"calendar_feed/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:52:"index.php?calendar_feed=$matches[1]&feed=$matches[2]";s:30:"calendar_feed/([^/]+)/embed/?$";s:46:"index.php?calendar_feed=$matches[1]&embed=true";s:42:"calendar_feed/([^/]+)/page/?([0-9]{1,})/?$";s:53:"index.php?calendar_feed=$matches[1]&paged=$matches[2]";s:24:"calendar_feed/([^/]+)/?$";s:35:"index.php?calendar_feed=$matches[1]";s:54:"calendar_type/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:52:"index.php?calendar_type=$matches[1]&feed=$matches[2]";s:49:"calendar_type/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:52:"index.php?calendar_type=$matches[1]&feed=$matches[2]";s:30:"calendar_type/([^/]+)/embed/?$";s:46:"index.php?calendar_type=$matches[1]&embed=true";s:42:"calendar_type/([^/]+)/page/?([0-9]{1,})/?$";s:53:"index.php?calendar_type=$matches[1]&paged=$matches[2]";s:24:"calendar_type/([^/]+)/?$";s:35:"index.php?calendar_type=$matches[1]";s:58:"calendar_category/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:56:"index.php?calendar_category=$matches[1]&feed=$matches[2]";s:53:"calendar_category/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:56:"index.php?calendar_category=$matches[1]&feed=$matches[2]";s:34:"calendar_category/([^/]+)/embed/?$";s:50:"index.php?calendar_category=$matches[1]&embed=true";s:46:"calendar_category/([^/]+)/page/?([0-9]{1,})/?$";s:57:"index.php?calendar_category=$matches[1]&paged=$matches[2]";s:28:"calendar_category/([^/]+)/?$";s:39:"index.php?calendar_category=$matches[1]";s:36:"calendar/[^/]+/attachment/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:46:"calendar/[^/]+/attachment/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:66:"calendar/[^/]+/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:61:"calendar/[^/]+/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:61:"calendar/[^/]+/attachment/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:42:"calendar/[^/]+/attachment/([^/]+)/embed/?$";s:43:"index.php?attachment=$matches[1]&embed=true";s:25:"calendar/([^/]+)/embed/?$";s:41:"index.php?calendar=$matches[1]&embed=true";s:29:"calendar/([^/]+)/trackback/?$";s:35:"index.php?calendar=$matches[1]&tb=1";s:37:"calendar/([^/]+)/page/?([0-9]{1,})/?$";s:48:"index.php?calendar=$matches[1]&paged=$matches[2]";s:44:"calendar/([^/]+)/comment-page-([0-9]{1,})/?$";s:48:"index.php?calendar=$matches[1]&cpage=$matches[2]";s:33:"calendar/([^/]+)(?:/([0-9]+))?/?$";s:47:"index.php?calendar=$matches[1]&page=$matches[2]";s:25:"calendar/[^/]+/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:35:"calendar/[^/]+/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:55:"calendar/[^/]+/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:50:"calendar/[^/]+/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:50:"calendar/[^/]+/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:31:"calendar/[^/]+/([^/]+)/embed/?$";s:43:"index.php?attachment=$matches[1]&embed=true";s:39:"xtec_report/[^/]+/attachment/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:49:"xtec_report/[^/]+/attachment/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:69:"xtec_report/[^/]+/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:64:"xtec_report/[^/]+/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:64:"xtec_report/[^/]+/attachment/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:45:"xtec_report/[^/]+/attachment/([^/]+)/embed/?$";s:43:"index.php?attachment=$matches[1]&embed=true";s:28:"xtec_report/([^/]+)/embed/?$";s:44:"index.php?xtec_report=$matches[1]&embed=true";s:32:"xtec_report/([^/]+)/trackback/?$";s:38:"index.php?xtec_report=$matches[1]&tb=1";s:40:"xtec_report/([^/]+)/page/?([0-9]{1,})/?$";s:51:"index.php?xtec_report=$matches[1]&paged=$matches[2]";s:47:"xtec_report/([^/]+)/comment-page-([0-9]{1,})/?$";s:51:"index.php?xtec_report=$matches[1]&cpage=$matches[2]";s:36:"xtec_report/([^/]+)(?:/([0-9]+))?/?$";s:50:"index.php?xtec_report=$matches[1]&page=$matches[2]";s:28:"xtec_report/[^/]+/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:38:"xtec_report/[^/]+/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:58:"xtec_report/[^/]+/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:53:"xtec_report/[^/]+/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:53:"xtec_report/[^/]+/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:34:"xtec_report/[^/]+/([^/]+)/embed/?$";s:43:"index.php?attachment=$matches[1]&embed=true";s:55:"bp_member_type/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:53:"index.php?bp_member_type=$matches[1]&feed=$matches[2]";s:50:"bp_member_type/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:53:"index.php?bp_member_type=$matches[1]&feed=$matches[2]";s:31:"bp_member_type/([^/]+)/embed/?$";s:47:"index.php?bp_member_type=$matches[1]&embed=true";s:43:"bp_member_type/([^/]+)/page/?([0-9]{1,})/?$";s:54:"index.php?bp_member_type=$matches[1]&paged=$matches[2]";s:25:"bp_member_type/([^/]+)/?$";s:36:"index.php?bp_member_type=$matches[1]";s:54:"bp_group_type/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:52:"index.php?bp_group_type=$matches[1]&feed=$matches[2]";s:49:"bp_group_type/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:52:"index.php?bp_group_type=$matches[1]&feed=$matches[2]";s:30:"bp_group_type/([^/]+)/embed/?$";s:46:"index.php?bp_group_type=$matches[1]&embed=true";s:42:"bp_group_type/([^/]+)/page/?([0-9]{1,})/?$";s:53:"index.php?bp_group_type=$matches[1]&paged=$matches[2]";s:24:"bp_group_type/([^/]+)/?$";s:35:"index.php?bp_group_type=$matches[1]";s:30:"docs/.+?/attachment/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:40:"docs/.+?/attachment/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:60:"docs/.+?/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:55:"docs/.+?/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:55:"docs/.+?/attachment/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:36:"docs/.+?/attachment/([^/]+)/embed/?$";s:43:"index.php?attachment=$matches[1]&embed=true";s:19:"docs/(.+?)/embed/?$";s:39:"index.php?bp_doc=$matches[1]&embed=true";s:23:"docs/(.+?)/trackback/?$";s:33:"index.php?bp_doc=$matches[1]&tb=1";s:43:"docs/(.+?)/feed/(feed|rdf|rss|rss2|atom)/?$";s:45:"index.php?bp_doc=$matches[1]&feed=$matches[2]";s:38:"docs/(.+?)/(feed|rdf|rss|rss2|atom)/?$";s:45:"index.php?bp_doc=$matches[1]&feed=$matches[2]";s:31:"docs/(.+?)/page/?([0-9]{1,})/?$";s:46:"index.php?bp_doc=$matches[1]&paged=$matches[2]";s:38:"docs/(.+?)/comment-page-([0-9]{1,})/?$";s:46:"index.php?bp_doc=$matches[1]&cpage=$matches[2]";s:27:"docs/(.+?)(?:/([0-9]+))?/?$";s:45:"index.php?bp_doc=$matches[1]&page=$matches[2]";s:45:"item/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:50:"index.php?bp_docs_tag=$matches[1]&feed=$matches[2]";s:40:"item/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:50:"index.php?bp_docs_tag=$matches[1]&feed=$matches[2]";s:21:"item/([^/]+)/embed/?$";s:44:"index.php?bp_docs_tag=$matches[1]&embed=true";s:33:"item/([^/]+)/page/?([0-9]{1,})/?$";s:51:"index.php?bp_docs_tag=$matches[1]&paged=$matches[2]";s:15:"item/([^/]+)/?$";s:33:"index.php?bp_docs_tag=$matches[1]";s:55:"bp_docs_access/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:67:"index.php?taxonomy=bp_docs_access&term=$matches[1]&feed=$matches[2]";s:50:"bp_docs_access/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:67:"index.php?taxonomy=bp_docs_access&term=$matches[1]&feed=$matches[2]";s:31:"bp_docs_access/([^/]+)/embed/?$";s:61:"index.php?taxonomy=bp_docs_access&term=$matches[1]&embed=true";s:43:"bp_docs_access/([^/]+)/page/?([0-9]{1,})/?$";s:68:"index.php?taxonomy=bp_docs_access&term=$matches[1]&paged=$matches[2]";s:25:"bp_docs_access/([^/]+)/?$";s:50:"index.php?taxonomy=bp_docs_access&term=$matches[1]";s:63:"bp_docs_comment_access/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:75:"index.php?taxonomy=bp_docs_comment_access&term=$matches[1]&feed=$matches[2]";s:58:"bp_docs_comment_access/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:75:"index.php?taxonomy=bp_docs_comment_access&term=$matches[1]&feed=$matches[2]";s:39:"bp_docs_comment_access/([^/]+)/embed/?$";s:69:"index.php?taxonomy=bp_docs_comment_access&term=$matches[1]&embed=true";s:51:"bp_docs_comment_access/([^/]+)/page/?([0-9]{1,})/?$";s:76:"index.php?taxonomy=bp_docs_comment_access&term=$matches[1]&paged=$matches[2]";s:33:"bp_docs_comment_access/([^/]+)/?$";s:58:"index.php?taxonomy=bp_docs_comment_access&term=$matches[1]";s:40:"bp_docs_folder/.+?/attachment/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:50:"bp_docs_folder/.+?/attachment/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:70:"bp_docs_folder/.+?/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:65:"bp_docs_folder/.+?/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:65:"bp_docs_folder/.+?/attachment/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:46:"bp_docs_folder/.+?/attachment/([^/]+)/embed/?$";s:43:"index.php?attachment=$matches[1]&embed=true";s:29:"bp_docs_folder/(.+?)/embed/?$";s:47:"index.php?bp_docs_folder=$matches[1]&embed=true";s:33:"bp_docs_folder/(.+?)/trackback/?$";s:41:"index.php?bp_docs_folder=$matches[1]&tb=1";s:41:"bp_docs_folder/(.+?)/page/?([0-9]{1,})/?$";s:54:"index.php?bp_docs_folder=$matches[1]&paged=$matches[2]";s:48:"bp_docs_folder/(.+?)/comment-page-([0-9]{1,})/?$";s:54:"index.php?bp_docs_folder=$matches[1]&cpage=$matches[2]";s:37:"bp_docs_folder/(.+?)(?:/([0-9]+))?/?$";s:53:"index.php?bp_docs_folder=$matches[1]&page=$matches[2]";s:62:"bp_docs_doc_in_folder/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:60:"index.php?bp_docs_doc_in_folder=$matches[1]&feed=$matches[2]";s:57:"bp_docs_doc_in_folder/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:60:"index.php?bp_docs_doc_in_folder=$matches[1]&feed=$matches[2]";s:38:"bp_docs_doc_in_folder/([^/]+)/embed/?$";s:54:"index.php?bp_docs_doc_in_folder=$matches[1]&embed=true";s:50:"bp_docs_doc_in_folder/([^/]+)/page/?([0-9]{1,})/?$";s:61:"index.php?bp_docs_doc_in_folder=$matches[1]&paged=$matches[2]";s:32:"bp_docs_doc_in_folder/([^/]+)/?$";s:43:"index.php?bp_docs_doc_in_folder=$matches[1]";s:63:"bp_docs_folder_in_user/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:61:"index.php?bp_docs_folder_in_user=$matches[1]&feed=$matches[2]";s:58:"bp_docs_folder_in_user/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:61:"index.php?bp_docs_folder_in_user=$matches[1]&feed=$matches[2]";s:39:"bp_docs_folder_in_user/([^/]+)/embed/?$";s:55:"index.php?bp_docs_folder_in_user=$matches[1]&embed=true";s:51:"bp_docs_folder_in_user/([^/]+)/page/?([0-9]{1,})/?$";s:62:"index.php?bp_docs_folder_in_user=$matches[1]&paged=$matches[2]";s:33:"bp_docs_folder_in_user/([^/]+)/?$";s:44:"index.php?bp_docs_folder_in_user=$matches[1]";s:64:"bp_docs_folder_in_group/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:62:"index.php?bp_docs_folder_in_group=$matches[1]&feed=$matches[2]";s:59:"bp_docs_folder_in_group/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:62:"index.php?bp_docs_folder_in_group=$matches[1]&feed=$matches[2]";s:40:"bp_docs_folder_in_group/([^/]+)/embed/?$";s:56:"index.php?bp_docs_folder_in_group=$matches[1]&embed=true";s:52:"bp_docs_folder_in_group/([^/]+)/page/?([0-9]{1,})/?$";s:63:"index.php?bp_docs_folder_in_group=$matches[1]&paged=$matches[2]";s:34:"bp_docs_folder_in_group/([^/]+)/?$";s:45:"index.php?bp_docs_folder_in_group=$matches[1]";s:39:"es_template/[^/]+/attachment/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:49:"es_template/[^/]+/attachment/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:69:"es_template/[^/]+/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:64:"es_template/[^/]+/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:64:"es_template/[^/]+/attachment/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:45:"es_template/[^/]+/attachment/([^/]+)/embed/?$";s:43:"index.php?attachment=$matches[1]&embed=true";s:28:"es_template/([^/]+)/embed/?$";s:44:"index.php?es_template=$matches[1]&embed=true";s:32:"es_template/([^/]+)/trackback/?$";s:38:"index.php?es_template=$matches[1]&tb=1";s:40:"es_template/([^/]+)/page/?([0-9]{1,})/?$";s:51:"index.php?es_template=$matches[1]&paged=$matches[2]";s:47:"es_template/([^/]+)/comment-page-([0-9]{1,})/?$";s:51:"index.php?es_template=$matches[1]&cpage=$matches[2]";s:36:"es_template/([^/]+)(?:/([0-9]+))?/?$";s:50:"index.php?es_template=$matches[1]&page=$matches[2]";s:28:"es_template/[^/]+/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:38:"es_template/[^/]+/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:58:"es_template/[^/]+/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:53:"es_template/[^/]+/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:53:"es_template/[^/]+/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:34:"es_template/[^/]+/([^/]+)/embed/?$";s:43:"index.php?attachment=$matches[1]&embed=true";s:35:"slideshow/.+?/attachment/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:45:"slideshow/.+?/attachment/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:65:"slideshow/.+?/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:60:"slideshow/.+?/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:60:"slideshow/.+?/attachment/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:41:"slideshow/.+?/attachment/([^/]+)/embed/?$";s:43:"index.php?attachment=$matches[1]&embed=true";s:24:"slideshow/(.+?)/embed/?$";s:42:"index.php?slideshow=$matches[1]&embed=true";s:28:"slideshow/(.+?)/trackback/?$";s:36:"index.php?slideshow=$matches[1]&tb=1";s:48:"slideshow/(.+?)/feed/(feed|rdf|rss|rss2|atom)/?$";s:48:"index.php?slideshow=$matches[1]&feed=$matches[2]";s:43:"slideshow/(.+?)/(feed|rdf|rss|rss2|atom)/?$";s:48:"index.php?slideshow=$matches[1]&feed=$matches[2]";s:36:"slideshow/(.+?)/page/?([0-9]{1,})/?$";s:49:"index.php?slideshow=$matches[1]&paged=$matches[2]";s:43:"slideshow/(.+?)/comment-page-([0-9]{1,})/?$";s:49:"index.php?slideshow=$matches[1]&cpage=$matches[2]";s:32:"slideshow/(.+?)(?:/([0-9]+))?/?$";s:48:"index.php?slideshow=$matches[1]&page=$matches[2]";s:44:"calendar_booking/[^/]+/attachment/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:54:"calendar_booking/[^/]+/attachment/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:74:"calendar_booking/[^/]+/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:69:"calendar_booking/[^/]+/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:69:"calendar_booking/[^/]+/attachment/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:50:"calendar_booking/[^/]+/attachment/([^/]+)/embed/?$";s:43:"index.php?attachment=$matches[1]&embed=true";s:33:"calendar_booking/([^/]+)/embed/?$";s:49:"index.php?calendar_booking=$matches[1]&embed=true";s:37:"calendar_booking/([^/]+)/trackback/?$";s:43:"index.php?calendar_booking=$matches[1]&tb=1";s:45:"calendar_booking/([^/]+)/page/?([0-9]{1,})/?$";s:56:"index.php?calendar_booking=$matches[1]&paged=$matches[2]";s:52:"calendar_booking/([^/]+)/comment-page-([0-9]{1,})/?$";s:56:"index.php?calendar_booking=$matches[1]&cpage=$matches[2]";s:41:"calendar_booking/([^/]+)(?:/([0-9]+))?/?$";s:55:"index.php?calendar_booking=$matches[1]&page=$matches[2]";s:33:"calendar_booking/[^/]+/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:43:"calendar_booking/[^/]+/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:63:"calendar_booking/[^/]+/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:58:"calendar_booking/[^/]+/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:58:"calendar_booking/[^/]+/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:39:"calendar_booking/[^/]+/([^/]+)/embed/?$";s:43:"index.php?attachment=$matches[1]&embed=true";s:46:"calendar_resources/[^/]+/attachment/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:56:"calendar_resources/[^/]+/attachment/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:76:"calendar_resources/[^/]+/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:71:"calendar_resources/[^/]+/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:71:"calendar_resources/[^/]+/attachment/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:52:"calendar_resources/[^/]+/attachment/([^/]+)/embed/?$";s:43:"index.php?attachment=$matches[1]&embed=true";s:35:"calendar_resources/([^/]+)/embed/?$";s:51:"index.php?calendar_resources=$matches[1]&embed=true";s:39:"calendar_resources/([^/]+)/trackback/?$";s:45:"index.php?calendar_resources=$matches[1]&tb=1";s:47:"calendar_resources/([^/]+)/page/?([0-9]{1,})/?$";s:58:"index.php?calendar_resources=$matches[1]&paged=$matches[2]";s:54:"calendar_resources/([^/]+)/comment-page-([0-9]{1,})/?$";s:58:"index.php?calendar_resources=$matches[1]&cpage=$matches[2]";s:43:"calendar_resources/([^/]+)(?:/([0-9]+))?/?$";s:57:"index.php?calendar_resources=$matches[1]&page=$matches[2]";s:35:"calendar_resources/[^/]+/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:45:"calendar_resources/[^/]+/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:65:"calendar_resources/[^/]+/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:60:"calendar_resources/[^/]+/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:60:"calendar_resources/[^/]+/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:41:"calendar_resources/[^/]+/([^/]+)/embed/?$";s:43:"index.php?attachment=$matches[1]&embed=true";s:48:".*wp-(atom|rdf|rss|rss2|feed|commentsrss2)\\.php$";s:18:"index.php?feed=old";s:20:".*wp-app\\.php(/.*)?$";s:19:"index.php?error=403";s:18:".*wp-register.php$";s:23:"index.php?register=true";s:32:"feed/(feed|rdf|rss|rss2|atom)/?$";s:27:"index.php?&feed=$matches[1]";s:27:"(feed|rdf|rss|rss2|atom)/?$";s:27:"index.php?&feed=$matches[1]";s:8:"embed/?$";s:21:"index.php?&embed=true";s:20:"page/?([0-9]{1,})/?$";s:28:"index.php?&paged=$matches[1]";s:27:"comment-page-([0-9]{1,})/?$";s:38:"index.php?&page_id=9&cpage=$matches[1]";s:41:"comments/feed/(feed|rdf|rss|rss2|atom)/?$";s:42:"index.php?&feed=$matches[1]&withcomments=1";s:36:"comments/(feed|rdf|rss|rss2|atom)/?$";s:42:"index.php?&feed=$matches[1]&withcomments=1";s:17:"comments/embed/?$";s:21:"index.php?&embed=true";s:44:"search/(.+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:40:"index.php?s=$matches[1]&feed=$matches[2]";s:39:"search/(.+)/(feed|rdf|rss|rss2|atom)/?$";s:40:"index.php?s=$matches[1]&feed=$matches[2]";s:20:"search/(.+)/embed/?$";s:34:"index.php?s=$matches[1]&embed=true";s:32:"search/(.+)/page/?([0-9]{1,})/?$";s:41:"index.php?s=$matches[1]&paged=$matches[2]";s:14:"search/(.+)/?$";s:23:"index.php?s=$matches[1]";s:47:"author/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:50:"index.php?author_name=$matches[1]&feed=$matches[2]";s:42:"author/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:50:"index.php?author_name=$matches[1]&feed=$matches[2]";s:23:"author/([^/]+)/embed/?$";s:44:"index.php?author_name=$matches[1]&embed=true";s:35:"author/([^/]+)/page/?([0-9]{1,})/?$";s:51:"index.php?author_name=$matches[1]&paged=$matches[2]";s:17:"author/([^/]+)/?$";s:33:"index.php?author_name=$matches[1]";s:69:"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/feed/(feed|rdf|rss|rss2|atom)/?$";s:80:"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&feed=$matches[4]";s:64:"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/(feed|rdf|rss|rss2|atom)/?$";s:80:"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&feed=$matches[4]";s:45:"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/embed/?$";s:74:"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&embed=true";s:57:"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/page/?([0-9]{1,})/?$";s:81:"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&paged=$matches[4]";s:39:"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/?$";s:63:"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]";s:56:"([0-9]{4})/([0-9]{1,2})/feed/(feed|rdf|rss|rss2|atom)/?$";s:64:"index.php?year=$matches[1]&monthnum=$matches[2]&feed=$matches[3]";s:51:"([0-9]{4})/([0-9]{1,2})/(feed|rdf|rss|rss2|atom)/?$";s:64:"index.php?year=$matches[1]&monthnum=$matches[2]&feed=$matches[3]";s:32:"([0-9]{4})/([0-9]{1,2})/embed/?$";s:58:"index.php?year=$matches[1]&monthnum=$matches[2]&embed=true";s:44:"([0-9]{4})/([0-9]{1,2})/page/?([0-9]{1,})/?$";s:65:"index.php?year=$matches[1]&monthnum=$matches[2]&paged=$matches[3]";s:26:"([0-9]{4})/([0-9]{1,2})/?$";s:47:"index.php?year=$matches[1]&monthnum=$matches[2]";s:43:"([0-9]{4})/feed/(feed|rdf|rss|rss2|atom)/?$";s:43:"index.php?year=$matches[1]&feed=$matches[2]";s:38:"([0-9]{4})/(feed|rdf|rss|rss2|atom)/?$";s:43:"index.php?year=$matches[1]&feed=$matches[2]";s:19:"([0-9]{4})/embed/?$";s:37:"index.php?year=$matches[1]&embed=true";s:31:"([0-9]{4})/page/?([0-9]{1,})/?$";s:44:"index.php?year=$matches[1]&paged=$matches[2]";s:13:"([0-9]{4})/?$";s:26:"index.php?year=$matches[1]";s:27:".?.+?/attachment/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:37:".?.+?/attachment/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:57:".?.+?/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:52:".?.+?/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:52:".?.+?/attachment/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:33:".?.+?/attachment/([^/]+)/embed/?$";s:43:"index.php?attachment=$matches[1]&embed=true";s:16:"(.?.+?)/embed/?$";s:41:"index.php?pagename=$matches[1]&embed=true";s:20:"(.?.+?)/trackback/?$";s:35:"index.php?pagename=$matches[1]&tb=1";s:40:"(.?.+?)/feed/(feed|rdf|rss|rss2|atom)/?$";s:47:"index.php?pagename=$matches[1]&feed=$matches[2]";s:35:"(.?.+?)/(feed|rdf|rss|rss2|atom)/?$";s:47:"index.php?pagename=$matches[1]&feed=$matches[2]";s:28:"(.?.+?)/page/?([0-9]{1,})/?$";s:48:"index.php?pagename=$matches[1]&paged=$matches[2]";s:35:"(.?.+?)/comment-page-([0-9]{1,})/?$";s:48:"index.php?pagename=$matches[1]&cpage=$matches[2]";s:24:"(.?.+?)(?:/([0-9]+))?/?$";s:47:"index.php?pagename=$matches[1]&page=$matches[2]";s:31:".+?/[^/]+/attachment/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:41:".+?/[^/]+/attachment/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:61:".+?/[^/]+/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:56:".+?/[^/]+/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:56:".+?/[^/]+/attachment/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:37:".+?/[^/]+/attachment/([^/]+)/embed/?$";s:43:"index.php?attachment=$matches[1]&embed=true";s:22:"(.+?)/([^/]+)/embed/?$";s:63:"index.php?category_name=$matches[1]&name=$matches[2]&embed=true";s:26:"(.+?)/([^/]+)/trackback/?$";s:57:"index.php?category_name=$matches[1]&name=$matches[2]&tb=1";s:46:"(.+?)/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:69:"index.php?category_name=$matches[1]&name=$matches[2]&feed=$matches[3]";s:41:"(.+?)/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:69:"index.php?category_name=$matches[1]&name=$matches[2]&feed=$matches[3]";s:34:"(.+?)/([^/]+)/page/?([0-9]{1,})/?$";s:70:"index.php?category_name=$matches[1]&name=$matches[2]&paged=$matches[3]";s:41:"(.+?)/([^/]+)/comment-page-([0-9]{1,})/?$";s:70:"index.php?category_name=$matches[1]&name=$matches[2]&cpage=$matches[3]";s:30:"(.+?)/([^/]+)(?:/([0-9]+))?/?$";s:69:"index.php?category_name=$matches[1]&name=$matches[2]&page=$matches[3]";s:20:".+?/[^/]+/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:30:".+?/[^/]+/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:50:".+?/[^/]+/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:45:".+?/[^/]+/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:45:".+?/[^/]+/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:26:".+?/[^/]+/([^/]+)/embed/?$";s:43:"index.php?attachment=$matches[1]&embed=true";s:38:"(.+?)/feed/(feed|rdf|rss|rss2|atom)/?$";s:52:"index.php?category_name=$matches[1]&feed=$matches[2]";s:33:"(.+?)/(feed|rdf|rss|rss2|atom)/?$";s:52:"index.php?category_name=$matches[1]&feed=$matches[2]";s:14:"(.+?)/embed/?$";s:46:"index.php?category_name=$matches[1]&embed=true";s:26:"(.+?)/page/?([0-9]{1,})/?$";s:53:"index.php?category_name=$matches[1]&paged=$matches[2]";s:33:"(.+?)/comment-page-([0-9]{1,})/?$";s:53:"index.php?category_name=$matches[1]&cpage=$matches[2]";s:8:"(.+?)/?$";s:35:"index.php?category_name=$matches[1]";}', 'yes'),
(3456, 'widget_widget_recent_bp_docs', 'a:2:{i:1;a:0:{}s:12:"_multiwidget";i:1;}', 'yes'),
(3572, 'bp_docs_associated_item_children', 'a:0:{}', 'yes'),
(3854, 'bp-plugin-enabled-post-home', '1', 'yes'),
(4333, 'calendar_feed_children', 'a:0:{}', 'yes'),
(4334, 'calendar_type_children', 'a:0:{}', 'yes'),
(4335, 'simple-calendar_settings_feeds', 'a:1:{s:6:"google";a:1:{s:7:"api_key";s:0:"";}}', 'yes'),
(4336, 'simple-calendar_settings_advanced', 'a:1:{s:6:"assets";a:1:{s:11:"disable_css";s:0:"";}}', 'yes'),
(4343, 'simple-calendar_version', '3.1.9', 'yes'),
(4346, 'calendar_category_children', 'a:0:{}', 'yes'),
(4347, 'simple-calendar_admin_notices', 'a:0:{}', 'yes'),
(4356, 'gce_version', '2.2.5', 'yes'),
(4357, 'gce_upgrade_has_run', '1', 'yes'),
(5195, 'bp-emails-unsubscribe-salt', 'ND9VZlpOSjpVTFMkKExWWkhjLlZ4a1Z6bmwwbTtZZF4lYmRZOkczTXlEKm5GTXhnLV8uXUVsQFk+MytzezFRRQ==', 'yes'),
(5196, '_bp_ignore_deprecated_code', '', 'yes'),
(6215, 'widget_toc-widget', 'a:1:{s:12:"_multiwidget";i:1;}', 'yes'),
(6547, 'current_sa_email_subscribers_db_version', '3.2', 'yes'),
(6556, 'toc-options', 'a:43:{s:15:"fragment_prefix";s:1:"i";s:8:"position";i:2;s:5:"start";i:4;s:17:"show_heading_text";b:1;s:12:"heading_text";s:10:"Continguts";s:22:"auto_insert_post_types";a:1:{i:0;s:4:"page";}s:14:"show_heirarchy";b:1;s:12:"ordered_list";b:0;s:13:"smooth_scroll";b:1;s:20:"smooth_scroll_offset";i:40;s:10:"visibility";b:0;s:15:"visibility_show";s:4:"show";s:15:"visibility_hide";s:4:"hide";s:26:"visibility_hide_by_default";b:0;s:5:"width";s:4:"Auto";s:12:"width_custom";d:275;s:18:"width_custom_units";s:2:"px";s:8:"wrapping";i:2;s:9:"font_size";d:95;s:15:"font_size_units";s:1:"%";s:5:"theme";i:1;s:24:"custom_background_colour";s:7:"#f9f9f9";s:20:"custom_border_colour";s:7:"#aaaaaa";s:19:"custom_title_colour";s:1:"#";s:19:"custom_links_colour";s:1:"#";s:25:"custom_links_hover_colour";s:1:"#";s:27:"custom_links_visited_colour";s:1:"#";s:9:"lowercase";b:0;s:9:"hyphenate";b:0;s:14:"bullet_spacing";b:0;s:16:"include_homepage";b:0;s:11:"exclude_css";b:0;s:7:"exclude";s:0:"";s:14:"heading_levels";a:6:{i:0;s:1:"1";i:1;s:1:"2";i:2;s:1:"3";i:3;s:1:"4";i:4;s:1:"5";i:5;s:1:"6";}s:13:"restrict_path";s:6:"/docs/";s:19:"css_container_class";s:0:"";s:25:"sitemap_show_page_listing";b:1;s:29:"sitemap_show_category_listing";b:1;s:20:"sitemap_heading_type";i:3;s:13:"sitemap_pages";s:5:"Pages";s:18:"sitemap_categories";s:10:"Categories";s:23:"show_toc_in_widget_only";b:0;s:34:"show_toc_in_widget_only_post_types";a:1:{i:0;s:4:"page";}}', 'yes'),
(9869, 'widget_media_audio', 'a:1:{s:12:"_multiwidget";i:1;}', 'yes'),
(9870, 'widget_media_image', 'a:1:{s:12:"_multiwidget";i:1;}', 'yes'),
(9871, 'widget_media_gallery', 'a:1:{s:12:"_multiwidget";i:1;}', 'yes'),
(9872, 'widget_media_video', 'a:1:{s:12:"_multiwidget";i:1;}', 'yes'),
(9873, 'widget_custom_html', 'a:1:{s:12:"_multiwidget";i:1;}', 'yes'),
(10217, 'wptelegram_ver', '2.0.9', 'yes'),
(10218, 'widget_email-subscribers-form', 'a:3:{i:1;a:0:{}i:3;a:2:{s:5:"title";s:22:"Subscripció de correu";s:7:"form_id";i:1;}s:12:"_multiwidget";i:1;}', 'yes'),
(10222, 'ig_es_cronurl', 'https://pwc-int.educacio.intranet/agora/mastersec?es=cron&guid=wuxjvg-fagnuh-txjhpv-cwbpmz-lafyox', 'yes'),
(10225, 'ig_admin_notices', 'a:0:{}', 'yes'),
(10228, 'ig_es_sync_wp_users', 's:4:"b:0;";', 'yes'),
(10230, 'ig_es_320_db_updated_at', '2019-05-13 07:44:09', 'no'),
(10232, 'ig_es_327_db_updated_at', '2019-05-13 07:44:10', 'no'),
(10233, 'ig_es_sentreport', 'Hola Administrador,\n\nEl missatge ha estat enviat amb èxit a {{COUNT}} de correu electrònic(s). Trobareu els detalls a continuació.\n\nId únic: {{UNIQUE}} \nHora d''inici: {{STARTTIME}} \nHora de finalització: {{ENDTIME}} \nPer a més informació, accediu al tauler i aneu al menú de Correus enviats a subscriptors. \n\nGràcies \nwww.gopiplus.com \n', 'yes'),
(10234, 'ig_es_sentreport_subject', 'Butlletí Informe enviament', 'yes'),
(10235, 'ig_es_fromname', 'Admin', 'yes'),
(10236, 'ig_es_fromemail', 'a8000007@xtec.cat', 'yes'),
(10237, 'ig_es_emailtype', 'WP HTML MAIL', 'yes'),
(10238, 'ig_es_notifyadmin', 'YES', 'yes'),
(10239, 'ig_es_adminemail', 'a8000007@xtec.cat', 'yes'),
(10240, 'ig_es_admin_new_sub_subject', 'Institut L&#039;Arany Subscripci&oacute; nova de correu', 'yes'),
(10241, 'ig_es_admin_new_sub_content', 'Hola Administrador, \r\n\r\n Hem rebut una sol·licitud de subscripci&oacute; d''aquesta adre&ccedil;a de correu electr&ograve;nic per rebre els articles del nostre lloc web. \r\n\r\n Correu electr&ograve;nic : {{EMAIL}} \r\n Nom : {{NAME}} \r\n\r\nGr&agrave;cies\r\nInstitut L&#039;Arany', 'yes'),
(10242, 'ig_es_welcomeemail', 'YES', 'yes'),
(10243, 'ig_es_welcomesubject', 'Institut L&#039;Arany Benvingut al nostre butlletí', 'yes'),
(10244, 'ig_es_welcomecontent', 'Hola {{NAME}}, \r\n\r\n Hem rebut una sol·licitud de subscripci&oacute; d''aquesta adre&ccedil;a de correu electr&ograve;nic per rebre el bullet&iacute; del nostre lloc web.\r\n\r\nGr&agrave;cies\r\nInstitut L&#039;Arany', 'yes'),
(10245, 'ig_es_optintype', 'Double Opt In', 'yes'),
(10246, 'ig_es_confirmsubject', 'Institut L&#039;Arany confirmeu la subscripció', 'yes'),
(10247, 'ig_es_confirmcontent', 'Hola {{NAME}},\r\n\r\n Hem rebut una petici&oacute; de subscripci&oacute; d''aquesta adre&ccedil;a de correu electr&ograve;nic. Confirmeu <a href=''{{LINK}}''>fent clic aqu&iacute;</a>. Si no podeu fer clic a l''enlla&ccedil; anterior, si us plau, utilitzeu l''URL seg&uuml;ent.\r\n\r\n {{LINK}} \r\n\r\nGr&agrave;cies\r\nInstitut L&#039;Arany', 'yes'),
(10248, 'ig_es_optinlink', 'http://pwc-int.educacio.intranet/agora/mastersec/?es=optin&db={{DBID}}&email={{EMAIL}}&guid={{GUID}}', 'yes'),
(10249, 'ig_es_unsublink', 'http://pwc-int.educacio.intranet/agora/mastersec/?es=unsubscribe&db={{DBID}}&email={{EMAIL}}&guid={{GUID}}', 'yes'),
(10250, 'ig_es_unsubcontent', 'Si no esteu interessats en rebre correus des de Institut L&#039;Arany <a href=''{{LINK}}''>feu clic aqu&iacute;</a> per donar-vos de baixa', 'yes'),
(10251, 'ig_es_unsubtext', 'Gr&agrave;cies, heu estat donat de baixa amb &egrave;xit. Ja no haur&iacute;eu de rebre not&iacute;cies nostres.', 'yes'),
(10252, 'ig_es_successmsg', 'Gr&agrave;cies, heu estat subscrit amb &egrave;xit al nostre butllet&iacute; de not&iacute;cies.', 'yes'),
(10253, 'ig_es_suberror', 'Vaja... Aquesta subscripci&oacute; no s''ha pogut completar, ho sentim. L''adre&ccedil;a de correu electr&ograve;nic est&agrave; bloquejada o ja est&agrave; subscrita. Gr&agrave;cies.', 'yes'),
(10254, 'ig_es_unsuberror', 'Vaja... Estem tenint algun error t&egrave;cnic. Torneu-ho a provar o contacteu amb l''administrador.', 'yes'),
(10256, 'ig_es_330_db_updated_at', '2019-05-13 07:44:10', 'no'),
(10258, 'es_template_migration_done', 'yes', 'yes'),
(10260, 'ig_es_340_db_updated_at', '2019-05-13 07:44:10', 'no'),
(10262, 'ig_es_3516_db_updated_at', '2019-05-13 07:44:10', 'no'),
(10263, 'ig_es_from_name', 'Admin', 'yes'),
(10264, 'ig_es_from_email', 'a8000007@xtec.cat', 'yes'),
(10265, 'ig_es_admin_new_contact_email_subject', 'Institut L&#039;Arany Subscripci&oacute; nova de correu', 'yes'),
(10266, 'ig_es_admin_new_contact_email_content', 'Hola Administrador, \r\n\r\n Hem rebut una sol·licitud de subscripci&oacute; d''aquesta adre&ccedil;a de correu electr&ograve;nic per rebre els articles del nostre lloc web. \r\n\r\n Correu electr&ograve;nic : {{EMAIL}} \r\n Nom : {{NAME}} \r\n\r\nGr&agrave;cies\r\nInstitut L&#039;Arany', 'yes'),
(10267, 'ig_es_admin_emails', 'a8000007@xtec.cat', 'yes'),
(10268, 'ig_es_confirmation_mail_subject', 'Institut L&#039;Arany confirmeu la subscripció', 'yes'),
(10269, 'ig_es_confirmation_mail_content', 'Hola {{NAME}},\r\n\r\n Hem rebut una petici&oacute; de subscripci&oacute; d''aquesta adre&ccedil;a de correu electr&ograve;nic. Confirmeu <a href=''{{LINK}}''>fent clic aqu&iacute;</a>. Si no podeu fer clic a l''enlla&ccedil; anterior, si us plau, utilitzeu l''URL seg&uuml;ent.\r\n\r\n {{LINK}} \r\n\r\nGr&agrave;cies\r\nInstitut L&#039;Arany', 'yes'),
(10270, 'ig_es_enable_welcome_email', 'yes', 'yes'),
(10271, 'ig_es_welcome_email_subject', 'Institut L&#039;Arany Benvingut al nostre butlletí', 'yes'),
(10272, 'ig_es_welcome_email_content', 'Hola {{NAME}}, \r\n\r\n Hem rebut una sol·licitud de subscripci&oacute; d''aquesta adre&ccedil;a de correu electr&ograve;nic per rebre el bullet&iacute; del nostre lloc web.\r\n\r\nGr&agrave;cies\r\nInstitut L&#039;Arany', 'yes'),
(10273, 'ig_es_sent_report_subject', 'Butlletí Informe enviament', 'yes'),
(10274, 'ig_es_sent_report_content', 'Hola Administrador,\n\nEl missatge ha estat enviat amb èxit a {{COUNT}} de correu electrònic(s). Trobareu els detalls a continuació.\n\nId únic: {{UNIQUE}} \nHora d''inici: {{STARTTIME}} \nHora de finalització: {{ENDTIME}} \nPer a més informació, accediu al tauler i aneu al menú de Correus enviats a subscriptors. \n\nGràcies \nwww.gopiplus.com \n', 'yes'),
(10275, 'ig_es_unsubscribe_link', 'http://pwc-int.educacio.intranet/agora/mastersec/?es=unsubscribe&db={{DBID}}&email={{EMAIL}}&guid={{GUID}}', 'yes'),
(10276, 'ig_es_optin_link', 'http://pwc-int.educacio.intranet/agora/mastersec/?es=optin&db={{DBID}}&email={{EMAIL}}&guid={{GUID}}', 'yes'),
(10277, 'ig_es_unsubscribe_link_content', 'Si no esteu interessats en rebre correus des de Institut L&#039;Arany <a href=''{{LINK}}''>feu clic aqu&iacute;</a> per donar-vos de baixa', 'yes'),
(10278, 'ig_es_email_type', 'wp_html_mail', 'yes');
INSERT INTO `wp_options` (`option_id`, `option_name`, `option_value`, `autoload`) VALUES
(10279, 'ig_es_notify_admin', 'yes', 'yes'),
(10280, 'ig_es_optin_type', 'double_opt_in', 'yes'),
(10281, 'ig_es_subscription_error_messsage', 'Vaja... Aquesta subscripci&oacute; no s''ha pogut completar, ho sentim. L''adre&ccedil;a de correu electr&ograve;nic est&agrave; bloquejada o ja est&agrave; subscrita. Gr&agrave;cies.', 'yes'),
(10282, 'ig_es_subscription_success_message', 'Gr&agrave;cies, heu estat subscrit amb &egrave;xit al nostre butllet&iacute; de not&iacute;cies.', 'yes'),
(10283, 'ig_es_unsubscribe_error_message', 'Vaja... Estem tenint algun error t&egrave;cnic. Torneu-ho a provar o contacteu amb l''administrador.', 'yes'),
(10284, 'ig_es_unsubscribe_success_message', 'Gr&agrave;cies, heu estat donat de baixa amb &egrave;xit. Ja no haur&iacute;eu de rebre not&iacute;cies nostres.', 'yes'),
(10286, 'ig_es_400_db_updated_at', '2019-05-13 07:44:10', 'no'),
(10288, 'ig_es_401_db_updated_at', '2019-05-13 07:44:10', 'no'),
(10290, 'ig_es_402_db_updated_at', '2019-05-13 07:44:10', 'no'),
(10292, 'ig_es_403_db_updated_at', '2019-05-13 07:44:10', 'no'),
(10294, 'ig_es_405_db_updated_at', '2019-05-13 07:44:10', 'no'),
(10295, 'ig_es_db_version', '4.0.9', 'yes'),
(10300, 'wp_page_for_privacy_policy', '0', 'yes'),
(10301, 'show_comments_cookies_opt_in', '1', 'yes'),
(10307, '_ges_installed_before_39', '1', 'yes'),
(10308, '_ges_39_subscriptions_table_created', '1', 'yes'),
(10309, '_ges_39_queued_items_table_created', '1', 'yes'),
(10310, '_ges_revision_date', '2019-03-20 16:00 UTC', 'yes'),
(10320, 'can_compress_scripts', '1', 'no'),
(10321, '_ges_39_subscriptions_migrated', '1', 'yes'),
(10323, '_ges_39_digest_queue_migrated', '1', 'yes'),
(10326, 'acui_columns', 'a:0:{}', 'yes'),
(10327, 'acui_mail_subject', 'Benvinguts a Institut L&#039;Arany', 'yes'),
(10328, 'acui_mail_body', 'Benvinguts,<br/>Les vostres dades per iniciar sessió en aquest lloc són:<br/><ul><li>Adreça d''inici de sessió (URL): **loginurl**</li><li>Nom d''usuari= **username**</li><li>Password = **password**</li></ul>', 'yes'),
(10329, 'acui_mail_template_id', '0', 'yes'),
(10330, 'acui_mail_attachment_id', '0', 'yes'),
(10331, 'acui_enable_email_templates', '', 'yes'),
(10332, 'acui_cron_activated', '', 'yes'),
(10333, 'acui_cron_send_mail', '', 'yes'),
(10334, 'acui_cron_send_mail_updated', '', 'yes'),
(10335, 'acui_cron_delete_users', '', 'yes'),
(10336, 'acui_cron_delete_users_assign_posts', '0', 'yes'),
(10337, 'acui_cron_change_role_not_present', '', 'yes'),
(10338, 'acui_cron_change_role_not_present_role', '0', 'yes'),
(10339, 'acui_cron_path_to_file', '', 'yes'),
(10340, 'acui_cron_path_to_move', '', 'yes'),
(10341, 'acui_cron_path_to_move_auto_rename', '', 'yes'),
(10342, 'acui_cron_period', '', 'yes'),
(10343, 'acui_cron_role', '', 'yes'),
(10344, 'acui_cron_update_roles_existing_users', '', 'yes'),
(10345, 'acui_cron_log', '', 'yes'),
(10346, 'acui_cron_allow_multiple_accounts', 'not_allowed', 'yes'),
(10347, 'acui_frontend_send_mail', '', 'yes'),
(10348, 'acui_frontend_send_mail_updated', '', 'yes'),
(10349, 'acui_frontend_delete_users', '', 'yes'),
(10350, 'acui_frontend_delete_users_assign_posts', '0', 'yes'),
(10351, 'acui_frontend_change_role_not_present', '', 'yes'),
(10352, 'acui_frontend_change_role_not_present_role', '0', 'yes'),
(10353, 'acui_frontend_role', '', 'yes'),
(10354, 'acui_manually_send_mail', '', 'yes'),
(10355, 'acui_manually_send_mail_updated', '', 'yes'),
(10356, 'acui_automatic_wordpress_email', '', 'yes'),
(10357, 'acui_show_profile_fields', '', 'yes'),
(10358, 'acui_settings', 'wordpress', 'yes'),
(10359, 'acui_mail_from', '', 'yes'),
(10360, 'acui_mail_from_name', '', 'yes'),
(10361, 'acui_mailer', 'smtp', 'yes'),
(10362, 'acui_mail_set_return_path', 'false', 'yes'),
(10363, 'acui_smtp_host', 'localhost', 'yes'),
(10364, 'acui_smtp_port', '25', 'yes'),
(10365, 'acui_smtp_ssl', 'none', 'yes'),
(10366, 'acui_smtp_auth', '', 'yes'),
(10367, 'acui_smtp_user', '', 'yes'),
(10368, 'acui_smtp_pass', '', 'yes');

-- --------------------------------------------------------

--
-- Estructura de la taula `wp_postmeta`
--

CREATE TABLE IF NOT EXISTS `wp_postmeta` (
`meta_id` bigint(20) unsigned NOT NULL,
  `post_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `meta_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_value` longtext COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB AUTO_INCREMENT=1993 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Bolcant dades de la taula `wp_postmeta`
--

INSERT INTO `wp_postmeta` (`meta_id`, `post_id`, `meta_key`, `meta_value`) VALUES
(2, 7, '_edit_lock', '1438071219:2'),
(3, 7, '_edit_last', '2'),
(4, 7, '_wp_page_template', 'default'),
(5, 7, '_rawhtml_settings', '0,0,0,0'),
(6, 7, '_template_layout', '2c-l'),
(7, 9, '_edit_lock', '1438071225:2'),
(8, 9, '_edit_last', '2'),
(9, 9, '_wp_page_template', 'page-templates/front-page.php'),
(10, 9, '_rawhtml_settings', '0,0,0,0'),
(11, 9, '_template_layout', '2c-l'),
(16, 13, '_edit_lock', '1438071222:2'),
(17, 13, '_edit_last', '2'),
(18, 13, '_wp_page_template', 'page-templates/front-page.php'),
(19, 13, '_rawhtml_settings', '0,0,0,0'),
(20, 13, '_template_layout', '2c-l'),
(30, 19, '_edit_lock', '1438071111:2'),
(31, 19, '_edit_last', '2'),
(32, 19, '_wp_page_template', 'page-templates/side-menu.php'),
(33, 21, '_edit_lock', '1438071154:2'),
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
(54, 27, '_edit_lock', '1438071165:2'),
(55, 27, '_edit_last', '2'),
(58, 27, '_wp_page_template', 'page-templates/side-menu.php'),
(59, 30, '_menu_item_type', 'post_type'),
(60, 30, '_menu_item_menu_item_parent', '25'),
(61, 30, '_menu_item_object_id', '27'),
(62, 30, '_menu_item_object', 'page'),
(63, 30, '_menu_item_target', ''),
(64, 30, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(65, 30, '_menu_item_xfn', ''),
(66, 30, '_menu_item_url', ''),
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
(86, 39, '_edit_lock', '1438071171:2'),
(87, 39, '_edit_last', '2'),
(88, 39, '_wp_page_template', 'page-templates/side-menu.php'),
(89, 41, '_menu_item_type', 'post_type'),
(90, 41, '_menu_item_menu_item_parent', '25'),
(91, 41, '_menu_item_object_id', '39'),
(92, 41, '_menu_item_object', 'page'),
(93, 41, '_menu_item_target', ''),
(94, 41, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(95, 41, '_menu_item_xfn', ''),
(96, 41, '_menu_item_url', ''),
(98, 43, '_edit_lock', '1438071271:2'),
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
(110, 46, '_edit_lock', '1438071205:2'),
(111, 46, '_edit_last', '2'),
(112, 46, '_wp_page_template', 'page-templates/side-menu.php'),
(113, 48, '_menu_item_type', 'post_type'),
(114, 48, '_menu_item_menu_item_parent', '25'),
(115, 48, '_menu_item_object_id', '46'),
(116, 48, '_menu_item_object', 'page'),
(117, 48, '_menu_item_target', ''),
(118, 48, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(119, 48, '_menu_item_xfn', ''),
(120, 48, '_menu_item_url', ''),
(122, 49, '_edit_lock', '1438071211:2'),
(123, 49, '_edit_last', '2'),
(124, 49, '_wp_page_template', 'page-templates/side-menu.php'),
(125, 51, '_menu_item_type', 'post_type'),
(126, 51, '_menu_item_menu_item_parent', '25'),
(127, 51, '_menu_item_object_id', '49'),
(128, 51, '_menu_item_object', 'page'),
(129, 51, '_menu_item_target', ''),
(130, 51, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(131, 51, '_menu_item_xfn', ''),
(132, 51, '_menu_item_url', ''),
(134, 52, '_edit_lock', '1474448004:2'),
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
(146, 55, '_edit_lock', '1438071215:2'),
(147, 55, '_edit_last', '2'),
(148, 55, '_wp_page_template', 'page-templates/side-menu.php'),
(149, 57, '_edit_lock', '1438071237:2'),
(150, 57, '_edit_last', '1'),
(151, 57, '_wp_page_template', 'page-templates/side-menu.php'),
(152, 59, '_menu_item_type', 'post_type'),
(153, 59, '_menu_item_menu_item_parent', '0'),
(154, 59, '_menu_item_object_id', '57'),
(155, 59, '_menu_item_object', 'page'),
(156, 59, '_menu_item_target', ''),
(157, 59, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(158, 59, '_menu_item_xfn', ''),
(159, 59, '_menu_item_url', ''),
(164, 63, '_edit_lock', '1438071289:2'),
(165, 63, '_edit_last', '2'),
(166, 63, '_wp_page_template', 'page-templates/side-menu.php'),
(167, 65, '_edit_lock', '1438071264:2'),
(168, 65, '_edit_last', '2'),
(169, 65, '_wp_page_template', 'page-templates/side-menu.php'),
(170, 67, '_edit_lock', '1445936793:2'),
(171, 67, '_edit_last', '2'),
(172, 67, '_wp_page_template', 'page-templates/side-menu.php'),
(173, 69, '_edit_lock', '1445936797:2'),
(174, 69, '_edit_last', '2'),
(175, 69, '_wp_page_template', 'page-templates/side-menu.php'),
(176, 71, '_menu_item_type', 'post_type'),
(177, 71, '_menu_item_menu_item_parent', '74'),
(178, 71, '_menu_item_object_id', '69'),
(179, 71, '_menu_item_object', 'page'),
(180, 71, '_menu_item_target', ''),
(181, 71, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(182, 71, '_menu_item_xfn', ''),
(183, 71, '_menu_item_url', ''),
(185, 72, '_menu_item_type', 'post_type'),
(186, 72, '_menu_item_menu_item_parent', '74'),
(187, 72, '_menu_item_object_id', '67'),
(188, 72, '_menu_item_object', 'page'),
(189, 72, '_menu_item_target', ''),
(190, 72, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(191, 72, '_menu_item_xfn', ''),
(192, 72, '_menu_item_url', ''),
(194, 73, '_menu_item_type', 'post_type'),
(195, 73, '_menu_item_menu_item_parent', '74'),
(196, 73, '_menu_item_object_id', '65'),
(197, 73, '_menu_item_object', 'page'),
(198, 73, '_menu_item_target', ''),
(199, 73, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(200, 73, '_menu_item_xfn', ''),
(201, 73, '_menu_item_url', ''),
(203, 74, '_menu_item_type', 'post_type'),
(204, 74, '_menu_item_menu_item_parent', '0'),
(205, 74, '_menu_item_object_id', '63'),
(206, 74, '_menu_item_object', 'page'),
(207, 74, '_menu_item_target', ''),
(208, 74, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(209, 74, '_menu_item_xfn', ''),
(210, 74, '_menu_item_url', ''),
(212, 75, '_edit_lock', '1445936800:2'),
(213, 75, '_edit_last', '2'),
(214, 75, '_wp_page_template', 'page-templates/side-menu.php'),
(215, 77, '_edit_lock', '1445936804:2'),
(216, 77, '_edit_last', '2'),
(217, 77, '_wp_page_template', 'page-templates/side-menu.php'),
(218, 79, '_menu_item_type', 'post_type'),
(219, 79, '_menu_item_menu_item_parent', '74'),
(220, 79, '_menu_item_object_id', '77'),
(221, 79, '_menu_item_object', 'page'),
(222, 79, '_menu_item_target', ''),
(223, 79, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(224, 79, '_menu_item_xfn', ''),
(225, 79, '_menu_item_url', ''),
(227, 80, '_menu_item_type', 'post_type'),
(228, 80, '_menu_item_menu_item_parent', '74'),
(229, 80, '_menu_item_object_id', '75'),
(230, 80, '_menu_item_object', 'page'),
(231, 80, '_menu_item_target', ''),
(232, 80, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(233, 80, '_menu_item_xfn', ''),
(234, 80, '_menu_item_url', ''),
(236, 81, '_edit_lock', '1453400257:1'),
(237, 81, '_edit_last', '1'),
(238, 81, '_wp_page_template', 'default'),
(252, 86, '_menu_item_type', 'post_type'),
(253, 86, '_menu_item_menu_item_parent', '0'),
(254, 86, '_menu_item_object_id', '81'),
(255, 86, '_menu_item_object', 'page'),
(256, 86, '_menu_item_target', ''),
(257, 86, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(258, 86, '_menu_item_xfn', ''),
(259, 86, '_menu_item_url', ''),
(263, 88, '_wp_attached_file', '2014/09/logo-centre1.png'),
(264, 88, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:131;s:6:"height";i:131;s:4:"file";s:24:"2014/09/logo-centre1.png";s:5:"sizes";a:0:{}s:10:"image_meta";a:10:{s:8:"aperture";i:0;s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";i:0;s:9:"copyright";s:0:"";s:12:"focal_length";i:0;s:3:"iso";i:0;s:13:"shutter_speed";i:0;s:5:"title";s:0:"";}}'),
(274, 90, '_menu_item_type', 'taxonomy'),
(275, 90, '_menu_item_menu_item_parent', '197'),
(276, 90, '_menu_item_object_id', '3'),
(277, 90, '_menu_item_object', 'category'),
(278, 90, '_menu_item_target', ''),
(279, 90, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(280, 90, '_menu_item_xfn', ''),
(281, 90, '_menu_item_url', ''),
(283, 91, '_menu_item_type', 'taxonomy'),
(284, 91, '_menu_item_menu_item_parent', '197'),
(285, 91, '_menu_item_object_id', '8'),
(286, 91, '_menu_item_object', 'category'),
(287, 91, '_menu_item_target', ''),
(288, 91, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(289, 91, '_menu_item_xfn', ''),
(290, 91, '_menu_item_url', ''),
(292, 92, '_menu_item_type', 'taxonomy'),
(293, 92, '_menu_item_menu_item_parent', '0'),
(294, 92, '_menu_item_object_id', '9'),
(295, 92, '_menu_item_object', 'category'),
(296, 92, '_menu_item_target', ''),
(297, 92, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(298, 92, '_menu_item_xfn', ''),
(299, 92, '_menu_item_url', ''),
(301, 93, '_menu_item_type', 'taxonomy'),
(302, 93, '_menu_item_menu_item_parent', '0'),
(303, 93, '_menu_item_object_id', '10'),
(304, 93, '_menu_item_object', 'category'),
(305, 93, '_menu_item_target', ''),
(306, 93, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(307, 93, '_menu_item_xfn', ''),
(308, 93, '_menu_item_url', ''),
(310, 94, '_menu_item_type', 'taxonomy'),
(311, 94, '_menu_item_menu_item_parent', '0'),
(312, 94, '_menu_item_object_id', '11'),
(313, 94, '_menu_item_object', 'category'),
(314, 94, '_menu_item_target', ''),
(315, 94, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(316, 94, '_menu_item_xfn', ''),
(317, 94, '_menu_item_url', ''),
(319, 95, '_menu_item_type', 'taxonomy'),
(320, 95, '_menu_item_menu_item_parent', '0'),
(321, 95, '_menu_item_object_id', '14'),
(322, 95, '_menu_item_object', 'category'),
(323, 95, '_menu_item_target', ''),
(324, 95, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(325, 95, '_menu_item_xfn', ''),
(326, 95, '_menu_item_url', ''),
(328, 96, '_menu_item_type', 'taxonomy'),
(329, 96, '_menu_item_menu_item_parent', '0'),
(330, 96, '_menu_item_object_id', '15'),
(331, 96, '_menu_item_object', 'category'),
(332, 96, '_menu_item_target', ''),
(333, 96, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(334, 96, '_menu_item_xfn', ''),
(335, 96, '_menu_item_url', ''),
(337, 97, '_menu_item_type', 'taxonomy'),
(338, 97, '_menu_item_menu_item_parent', '0'),
(339, 97, '_menu_item_object_id', '16'),
(340, 97, '_menu_item_object', 'category'),
(341, 97, '_menu_item_target', ''),
(342, 97, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(343, 97, '_menu_item_xfn', ''),
(344, 97, '_menu_item_url', ''),
(346, 98, '_menu_item_type', 'taxonomy'),
(347, 98, '_menu_item_menu_item_parent', '0'),
(348, 98, '_menu_item_object_id', '19'),
(349, 98, '_menu_item_object', 'category'),
(350, 98, '_menu_item_target', ''),
(351, 98, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(352, 98, '_menu_item_xfn', ''),
(353, 98, '_menu_item_url', ''),
(355, 99, '_menu_item_type', 'taxonomy'),
(356, 99, '_menu_item_menu_item_parent', '0'),
(357, 99, '_menu_item_object_id', '20'),
(358, 99, '_menu_item_object', 'category'),
(359, 99, '_menu_item_target', ''),
(360, 99, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(361, 99, '_menu_item_xfn', ''),
(362, 99, '_menu_item_url', ''),
(364, 100, '_menu_item_type', 'taxonomy'),
(365, 100, '_menu_item_menu_item_parent', '0'),
(366, 100, '_menu_item_object_id', '21'),
(367, 100, '_menu_item_object', 'category'),
(368, 100, '_menu_item_target', ''),
(369, 100, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(370, 100, '_menu_item_xfn', ''),
(371, 100, '_menu_item_url', ''),
(373, 101, '_menu_item_type', 'taxonomy'),
(374, 101, '_menu_item_menu_item_parent', '0'),
(375, 101, '_menu_item_object_id', '24'),
(376, 101, '_menu_item_object', 'category'),
(377, 101, '_menu_item_target', ''),
(378, 101, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(379, 101, '_menu_item_xfn', ''),
(380, 101, '_menu_item_url', ''),
(382, 102, '_menu_item_type', 'taxonomy'),
(383, 102, '_menu_item_menu_item_parent', '0'),
(384, 102, '_menu_item_object_id', '25'),
(385, 102, '_menu_item_object', 'category'),
(386, 102, '_menu_item_target', ''),
(387, 102, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(388, 102, '_menu_item_xfn', ''),
(389, 102, '_menu_item_url', ''),
(391, 103, '_menu_item_type', 'taxonomy'),
(392, 103, '_menu_item_menu_item_parent', '0'),
(393, 103, '_menu_item_object_id', '26'),
(394, 103, '_menu_item_object', 'category'),
(395, 103, '_menu_item_target', ''),
(396, 103, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(397, 103, '_menu_item_xfn', ''),
(398, 103, '_menu_item_url', ''),
(406, 107, '_edit_lock', '1411387910:2'),
(407, 107, '_edit_last', '2'),
(410, 107, 'settings', 'a:26:{s:9:"animation";s:5:"slide";s:10:"slideSpeed";s:1:"1";s:16:"descriptionSpeed";s:3:"0.4";s:13:"intervalSpeed";s:3:"300";s:13:"slidesPerView";s:1:"1";s:8:"maxWidth";s:1:"0";s:11:"aspectRatio";s:3:"3:1";s:6:"height";s:3:"179";s:14:"imageBehaviour";s:4:"crop";s:15:"showDescription";s:5:"false";s:15:"hideDescription";s:4:"true";s:27:"preserveSlideshowDimensions";s:5:"false";s:20:"enableResponsiveness";s:4:"true";s:4:"play";s:5:"false";s:4:"loop";s:4:"true";s:12:"pauseOnHover";s:4:"true";s:12:"controllable";s:4:"true";s:21:"hideNavigationButtons";s:4:"true";s:14:"showPagination";s:5:"false";s:14:"hidePagination";s:4:"true";s:12:"controlPanel";s:5:"false";s:16:"hideControlPanel";s:4:"true";s:15:"waitUntilLoaded";s:4:"true";s:15:"showLoadingIcon";s:4:"true";s:6:"random";s:4:"true";s:11:"avoidFilter";s:4:"true";}'),
(411, 107, 'styleSettings', 'a:1:{s:5:"style";s:15:"style-light.css";}'),
(412, 107, 'slides', 'a:3:{i:1;a:9:{s:17:"titleElementTagID";s:1:"0";s:5:"title";s:20:"Photo by Xesc Arbona";s:23:"descriptionElementTagID";s:1:"0";s:11:"description";s:0:"";s:3:"url";s:45:"https://www.flickr.com/photos/xesc/3438756855";s:9:"urlTarget";s:6:"_blank";s:15:"alternativeText";s:20:"Photo by Xesc Arbona";s:4:"type";s:10:"attachment";s:6:"postId";s:3:"154";}i:2;a:9:{s:17:"titleElementTagID";s:1:"0";s:5:"title";s:6:"gimnas";s:23:"descriptionElementTagID";s:1:"0";s:11:"description";s:0:"";s:3:"url";s:54:"https://www.flickr.com/photos/french-disko/5543931621/";s:9:"urlTarget";s:6:"_blank";s:15:"alternativeText";s:23:"Photo by Anna Armstrong";s:4:"type";s:10:"attachment";s:6:"postId";s:3:"146";}i:3;a:9:{s:17:"titleElementTagID";s:1:"0";s:5:"title";s:0:"";s:23:"descriptionElementTagID";s:1:"0";s:11:"description";s:0:"";s:3:"url";s:95:"http://simple.wikipedia.org/wiki/Primary_school#mediaviewer/File:Heiwa_elementary_school_18.jpg";s:9:"urlTarget";s:6:"_blank";s:15:"alternativeText";s:14:"Photo by Halfd";s:4:"type";s:10:"attachment";s:6:"postId";s:3:"114";}}'),
(416, 109, '_edit_lock', '1438070965:2'),
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
(471, 120, '_edit_lock', '1438072672:2'),
(472, 120, '_edit_last', '2'),
(475, 120, '_amaga_titol', ''),
(476, 120, '_amaga_metadata', ''),
(477, 120, '_bloc_html', 'on'),
(491, 127, '_edit_lock', '1438070912:2'),
(492, 127, '_edit_last', '2'),
(495, 127, '_amaga_titol', ''),
(496, 127, '_amaga_metadata', ''),
(497, 127, '_bloc_html', 'on'),
(498, 129, '_edit_lock', '1438070863:2'),
(499, 129, '_edit_last', '1'),
(502, 129, '_amaga_titol', ''),
(503, 129, '_amaga_metadata', ''),
(504, 129, '_bloc_html', ''),
(509, 131, '_wp_attached_file', '2014/09/primersauxilis.jpg'),
(510, 131, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:800;s:6:"height";i:600;s:4:"file";s:26:"2014/09/primersauxilis.jpg";s:5:"sizes";a:4:{s:9:"thumbnail";a:4:{s:4:"file";s:26:"primersauxilis-150x150.jpg";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:10:"image/jpeg";}s:6:"medium";a:4:{s:4:"file";s:26:"primersauxilis-300x225.jpg";s:5:"width";i:300;s:6:"height";i:225;s:9:"mime-type";s:10:"image/jpeg";}s:9:"thumb-300";a:4:{s:4:"file";s:26:"primersauxilis-300x250.jpg";s:5:"width";i:300;s:6:"height";i:250;s:9:"mime-type";s:10:"image/jpeg";}s:9:"thumb-200";a:4:{s:4:"file";s:26:"primersauxilis-200x150.jpg";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:10:"image/jpeg";}}s:10:"image_meta";a:10:{s:8:"aperture";i:0;s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";i:0;s:9:"copyright";s:0:"";s:12:"focal_length";i:0;s:3:"iso";i:0;s:13:"shutter_speed";i:0;s:5:"title";s:0:"";}}'),
(520, 134, '_edit_lock', '1444145891:2'),
(521, 134, '_edit_last', '2'),
(524, 134, '_amaga_titol', ''),
(525, 134, '_amaga_metadata', ''),
(526, 134, '_bloc_html', ''),
(529, 137, '_edit_lock', '1438070854:2'),
(530, 137, '_edit_last', '1'),
(533, 137, '_amaga_titol', ''),
(534, 137, '_amaga_metadata', ''),
(535, 137, '_bloc_html', ''),
(540, 141, '_wp_attached_file', '2014/09/cicles.png'),
(541, 141, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:796;s:6:"height";i:302;s:4:"file";s:18:"2014/09/cicles.png";s:5:"sizes";a:4:{s:9:"thumbnail";a:4:{s:4:"file";s:18:"cicles-150x150.png";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}s:6:"medium";a:4:{s:4:"file";s:18:"cicles-300x113.png";s:5:"width";i:300;s:6:"height";i:113;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-300";a:4:{s:4:"file";s:18:"cicles-300x250.png";s:5:"width";i:300;s:6:"height";i:250;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-200";a:4:{s:4:"file";s:18:"cicles-200x150.png";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}}s:10:"image_meta";a:10:{s:8:"aperture";i:0;s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";i:0;s:9:"copyright";s:0:"";s:12:"focal_length";i:0;s:3:"iso";i:0;s:13:"shutter_speed";i:0;s:5:"title";s:0:"";}}'),
(542, 129, '_thumbnail_id', '141'),
(552, 143, '_menu_item_type', 'taxonomy'),
(553, 143, '_menu_item_menu_item_parent', '197'),
(554, 143, '_menu_item_object_id', '30'),
(555, 143, '_menu_item_object', 'category'),
(556, 143, '_menu_item_target', ''),
(557, 143, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(558, 143, '_menu_item_xfn', ''),
(559, 143, '_menu_item_url', ''),
(570, 146, '_wp_attached_file', '2014/09/gimnas.png'),
(571, 146, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:876;s:6:"height";i:275;s:4:"file";s:18:"2014/09/gimnas.png";s:5:"sizes";a:4:{s:9:"thumbnail";a:4:{s:4:"file";s:18:"gimnas-150x150.png";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}s:6:"medium";a:4:{s:4:"file";s:17:"gimnas-300x94.png";s:5:"width";i:300;s:6:"height";i:94;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-300";a:4:{s:4:"file";s:18:"gimnas-300x250.png";s:5:"width";i:300;s:6:"height";i:250;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-200";a:4:{s:4:"file";s:18:"gimnas-200x150.png";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}}s:10:"image_meta";a:10:{s:8:"aperture";i:0;s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";i:0;s:9:"copyright";s:0:"";s:12:"focal_length";i:0;s:3:"iso";i:0;s:13:"shutter_speed";i:0;s:5:"title";s:0:"";}}'),
(581, 148, '_edit_lock', '1411142743:1'),
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
(632, 161, '_edit_lock', '1438070851:2'),
(633, 161, '_edit_last', '1'),
(636, 161, '_amaga_titol', ''),
(637, 161, '_amaga_metadata', ''),
(638, 161, '_bloc_html', 'on'),
(639, 163, '_edit_lock', '1438070846:2'),
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
(787, 183, '_menu_item_type', 'taxonomy'),
(788, 183, '_menu_item_menu_item_parent', '0'),
(789, 183, '_menu_item_object_id', '31'),
(790, 183, '_menu_item_object', 'category'),
(791, 183, '_menu_item_target', ''),
(792, 183, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(793, 183, '_menu_item_xfn', ''),
(794, 183, '_menu_item_url', ''),
(804, 184, '_edit_lock', '1445936422:2'),
(805, 184, '_edit_last', '2'),
(806, 185, '_wp_attached_file', '2014/09/ampa.png'),
(807, 185, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:315;s:6:"height";i:126;s:4:"file";s:16:"2014/09/ampa.png";s:5:"sizes";a:4:{s:9:"thumbnail";a:4:{s:4:"file";s:16:"ampa-150x126.png";s:5:"width";i:150;s:6:"height";i:126;s:9:"mime-type";s:9:"image/png";}s:6:"medium";a:4:{s:4:"file";s:16:"ampa-300x120.png";s:5:"width";i:300;s:6:"height";i:120;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-300";a:4:{s:4:"file";s:16:"ampa-300x126.png";s:5:"width";i:300;s:6:"height";i:126;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-200";a:4:{s:4:"file";s:16:"ampa-200x126.png";s:5:"width";i:200;s:6:"height";i:126;s:9:"mime-type";s:9:"image/png";}}s:10:"image_meta";a:10:{s:8:"aperture";i:0;s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";i:0;s:9:"copyright";s:0:"";s:12:"focal_length";i:0;s:3:"iso";i:0;s:13:"shutter_speed";i:0;s:5:"title";s:0:"";}}'),
(808, 184, '_thumbnail_id', '185'),
(811, 184, '_amaga_titol', ''),
(812, 184, '_amaga_metadata', ''),
(813, 184, '_bloc_html', ''),
(814, 188, '_menu_item_type', 'taxonomy'),
(815, 188, '_menu_item_menu_item_parent', '0'),
(816, 188, '_menu_item_object_id', '8'),
(817, 188, '_menu_item_object', 'category'),
(818, 188, '_menu_item_target', ''),
(819, 188, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(820, 188, '_menu_item_xfn', ''),
(821, 188, '_menu_item_url', ''),
(823, 189, '_menu_item_type', 'taxonomy'),
(824, 189, '_menu_item_menu_item_parent', '0'),
(825, 189, '_menu_item_object_id', '30'),
(826, 189, '_menu_item_object', 'category'),
(827, 189, '_menu_item_target', ''),
(828, 189, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(829, 189, '_menu_item_xfn', ''),
(830, 189, '_menu_item_url', ''),
(832, 190, '_menu_item_type', 'taxonomy'),
(833, 190, '_menu_item_menu_item_parent', '0'),
(834, 190, '_menu_item_object_id', '3'),
(835, 190, '_menu_item_object', 'category'),
(836, 190, '_menu_item_target', ''),
(837, 190, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(838, 190, '_menu_item_xfn', ''),
(839, 190, '_menu_item_url', ''),
(841, 191, '_menu_item_type', 'taxonomy'),
(842, 191, '_menu_item_menu_item_parent', '190'),
(843, 191, '_menu_item_object_id', '4'),
(844, 191, '_menu_item_object', 'category'),
(845, 191, '_menu_item_target', ''),
(846, 191, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(847, 191, '_menu_item_xfn', ''),
(848, 191, '_menu_item_url', ''),
(850, 192, '_menu_item_type', 'taxonomy'),
(851, 192, '_menu_item_menu_item_parent', '190'),
(852, 192, '_menu_item_object_id', '5'),
(853, 192, '_menu_item_object', 'category'),
(854, 192, '_menu_item_target', ''),
(855, 192, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(856, 192, '_menu_item_xfn', ''),
(857, 192, '_menu_item_url', ''),
(859, 193, '_menu_item_type', 'taxonomy'),
(860, 193, '_menu_item_menu_item_parent', '190'),
(861, 193, '_menu_item_object_id', '6'),
(862, 193, '_menu_item_object', 'category'),
(863, 193, '_menu_item_target', ''),
(864, 193, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(865, 193, '_menu_item_xfn', ''),
(866, 193, '_menu_item_url', ''),
(868, 194, '_menu_item_type', 'taxonomy'),
(869, 194, '_menu_item_menu_item_parent', '190'),
(870, 194, '_menu_item_object_id', '7'),
(871, 194, '_menu_item_object', 'category'),
(872, 194, '_menu_item_target', ''),
(873, 194, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(874, 194, '_menu_item_xfn', ''),
(875, 194, '_menu_item_url', ''),
(879, 195, '_edit_lock', '1438071156:2'),
(880, 195, '_edit_last', '2'),
(881, 195, '_wp_page_template', 'default'),
(882, 197, '_menu_item_type', 'post_type'),
(883, 197, '_menu_item_menu_item_parent', '0'),
(884, 197, '_menu_item_object_id', '195'),
(885, 197, '_menu_item_object', 'page'),
(886, 197, '_menu_item_target', ''),
(887, 197, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(888, 197, '_menu_item_xfn', ''),
(889, 197, '_menu_item_url', ''),
(897, 202, '_edit_lock', '1444398364:1'),
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
(954, 202, 'slides', 'a:3:{i:1;a:9:{s:17:"titleElementTagID";s:1:"0";s:5:"title";s:9:"screeshot";s:23:"descriptionElementTagID";s:1:"0";s:11:"description";s:0:"";s:3:"url";s:0:"";s:9:"urlTarget";s:5:"_self";s:15:"alternativeText";s:0:"";s:4:"type";s:10:"attachment";s:6:"postId";s:3:"215";}i:2;a:9:{s:17:"titleElementTagID";s:1:"0";s:5:"title";s:0:"";s:23:"descriptionElementTagID";s:1:"0";s:11:"description";s:94:"<br><br>\r\nAquí podeu posar els missatges, vídeos o fotos destacades que vagin sortint al mur";s:9:"textColor";s:7:"#ffffff";s:5:"color";s:7:"#1e73be";s:3:"url";s:0:"";s:9:"urlTarget";s:5:"_self";s:4:"type";s:4:"text";}i:3;a:3:{s:7:"videoId";s:11:"wSNYYThX5-g";s:17:"showRelatedVideos";s:5:"false";s:4:"type";s:5:"video";}}'),
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
(1078, 228, 'gce_retrieve_max', '25'),
(1079, 228, '_menu_item_type', 'post_type'),
(1080, 228, '_menu_item_menu_item_parent', '74'),
(1081, 228, '_menu_item_object_id', '5'),
(1082, 228, '_menu_item_object', 'page'),
(1083, 228, '_menu_item_target', ''),
(1084, 228, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(1085, 228, '_menu_item_xfn', ''),
(1086, 228, '_menu_item_url', ''),
(1088, 25, 'gce_retrieve_max', '25'),
(1089, 26, 'gce_retrieve_max', '25'),
(1090, 30, 'gce_retrieve_max', '25'),
(1091, 41, 'gce_retrieve_max', '25'),
(1092, 45, 'gce_retrieve_max', '25'),
(1093, 48, 'gce_retrieve_max', '25'),
(1094, 51, 'gce_retrieve_max', '25');
INSERT INTO `wp_postmeta` (`meta_id`, `post_id`, `meta_key`, `meta_value`) VALUES
(1095, 54, 'gce_retrieve_max', '25'),
(1096, 59, 'gce_retrieve_max', '25'),
(1097, 197, 'gce_retrieve_max', '25'),
(1098, 90, 'gce_retrieve_max', '25'),
(1099, 91, 'gce_retrieve_max', '25'),
(1100, 143, 'gce_retrieve_max', '25'),
(1101, 74, 'gce_retrieve_max', '25'),
(1102, 73, 'gce_retrieve_max', '25'),
(1103, 72, 'gce_retrieve_max', '25'),
(1104, 71, 'gce_retrieve_max', '25'),
(1105, 80, 'gce_retrieve_max', '25'),
(1106, 79, 'gce_retrieve_max', '25'),
(1107, 86, 'gce_retrieve_max', '25'),
(1108, 183, 'gce_retrieve_max', '25'),
(1109, 229, 'gce_retrieve_max', '25'),
(1110, 229, '_menu_item_type', 'custom'),
(1111, 229, '_menu_item_menu_item_parent', '74'),
(1112, 229, '_menu_item_object_id', '229'),
(1113, 229, '_menu_item_object', 'custom'),
(1114, 229, '_menu_item_target', ''),
(1115, 229, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(1116, 229, '_menu_item_xfn', ''),
(1117, 229, '_menu_item_url', 'http://pwc-int.educacio.intranet/agora/mastersec/docs'),
(1126, 234, '_wp_attached_file', 'bp-attachments/233/Exemple.docx'),
(1138, 239, '_wp_attached_file', 'bp-attachments/238/Selecció_713.png'),
(1139, 239, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:310;s:6:"height";i:126;s:4:"file";s:36:"bp-attachments/238/Selecció_713.png";s:5:"sizes";a:4:{s:9:"thumbnail";a:4:{s:4:"file";s:25:"Selecció_713-150x126.png";s:5:"width";i:150;s:6:"height";i:126;s:9:"mime-type";s:9:"image/png";}s:6:"medium";a:4:{s:4:"file";s:25:"Selecció_713-300x121.png";s:5:"width";i:300;s:6:"height";i:121;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-300";a:4:{s:4:"file";s:25:"Selecció_713-300x126.png";s:5:"width";i:300;s:6:"height";i:126;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-200";a:4:{s:4:"file";s:25:"Selecció_713-200x126.png";s:5:"width";i:200;s:6:"height";i:126;s:9:"mime-type";s:9:"image/png";}}s:10:"image_meta";a:10:{s:8:"aperture";i:0;s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";i:0;s:9:"copyright";s:0:"";s:12:"focal_length";i:0;s:3:"iso";i:0;s:13:"shutter_speed";i:0;s:5:"title";s:0:"";}}'),
(1151, 224, 'gce_list_max_num', '7'),
(1152, 224, 'gce_list_max_length', 'days'),
(1160, 224, 'gce_feed_start_interval', 'months'),
(1162, 224, 'gce_feed_end_interval', 'years'),
(1163, 224, 'gce_widget_paging_interval', '604800'),
(1164, 224, 'gce_paging_widget', '1'),
(1165, 52, '_template_layout', '2c-l'),
(1170, 224, '_edit_lock', '1474028859:2'),
(1171, 224, '_edit_last', '2'),
(1177, 244, '_menu_item_type', 'taxonomy'),
(1178, 244, '_menu_item_menu_item_parent', '90'),
(1179, 244, '_menu_item_object_id', '4'),
(1180, 244, '_menu_item_object', 'category'),
(1181, 244, '_menu_item_target', ''),
(1182, 244, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(1183, 244, '_menu_item_xfn', ''),
(1184, 244, '_menu_item_url', ''),
(1186, 245, '_menu_item_type', 'taxonomy'),
(1187, 245, '_menu_item_menu_item_parent', '90'),
(1188, 245, '_menu_item_object_id', '5'),
(1189, 245, '_menu_item_object', 'category'),
(1190, 245, '_menu_item_target', ''),
(1191, 245, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(1192, 245, '_menu_item_xfn', ''),
(1193, 245, '_menu_item_url', ''),
(1195, 246, '_menu_item_type', 'taxonomy'),
(1196, 246, '_menu_item_menu_item_parent', '90'),
(1197, 246, '_menu_item_object_id', '6'),
(1198, 246, '_menu_item_object', 'category'),
(1199, 246, '_menu_item_target', ''),
(1200, 246, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(1201, 246, '_menu_item_xfn', ''),
(1202, 246, '_menu_item_url', ''),
(1204, 247, '_menu_item_type', 'taxonomy'),
(1205, 247, '_menu_item_menu_item_parent', '90'),
(1206, 247, '_menu_item_object_id', '7'),
(1207, 247, '_menu_item_object', 'category'),
(1208, 247, '_menu_item_target', ''),
(1209, 247, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(1210, 247, '_menu_item_xfn', ''),
(1211, 247, '_menu_item_url', ''),
(1222, 248, 'gce_list_max_num', '7'),
(1223, 248, 'gce_list_max_length', 'days'),
(1226, 248, 'gce_feed_start_interval', 'months'),
(1228, 248, 'gce_feed_end_interval', 'years'),
(1238, 248, '_edit_lock', '1474024770:2'),
(1239, 248, '_edit_last', '2'),
(1243, 248, 'gce_widget_paging_interval', NULL),
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
(1302, 163, '_original_size', ''),
(1303, 163, '_entry_icon', 'noicon'),
(1304, 163, 'notification_already_sent', '1'),
(1317, 248, 'gce_paging_widget', '1'),
(1365, 127, '_original_size', ''),
(1366, 127, '_entry_icon', 'noicon'),
(1369, 109, '_original_size', ''),
(1370, 109, '_entry_icon', 'noicon'),
(1371, 109, '_oembed_time_a47471043cf1f80e92ecf21d41f541f0', '1438071105'),
(1372, 5, '_edit_lock', '1438071038:2'),
(1373, 6, '_edit_lock', '1438071217:2'),
(1374, 16, '_edit_lock', '1438071218:2'),
(1375, 195, '_template_layout', '2c-l'),
(1376, 21, '_template_layout', '2c-l'),
(1377, 43, '_template_layout', '2c-l'),
(1380, 120, '_original_size', ''),
(1381, 120, '_entry_icon', 'noicon'),
(1413, 134, '_original_size', ''),
(1414, 134, '_entry_icon', 'noicon'),
(1415, 202, 'picasa_album', ''),
(1416, 202, 'googlephotos_album', ''),
(1417, 289, '_menu_item_type', 'post_type'),
(1418, 289, '_menu_item_menu_item_parent', '0'),
(1419, 289, '_menu_item_object_id', '5'),
(1420, 289, '_menu_item_object', 'page'),
(1421, 289, '_menu_item_target', ''),
(1422, 289, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(1423, 289, '_menu_item_xfn', ''),
(1424, 289, '_menu_item_url', ''),
(1426, 290, '_menu_item_type', 'post_type'),
(1427, 290, '_menu_item_menu_item_parent', '0'),
(1428, 290, '_menu_item_object_id', '6'),
(1429, 290, '_menu_item_object', 'page'),
(1430, 290, '_menu_item_target', ''),
(1431, 290, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(1432, 290, '_menu_item_xfn', ''),
(1433, 290, '_menu_item_url', ''),
(1435, 291, '_menu_item_type', 'post_type'),
(1436, 291, '_menu_item_menu_item_parent', '0'),
(1437, 291, '_menu_item_object_id', '16'),
(1438, 291, '_menu_item_object', 'page'),
(1439, 291, '_menu_item_target', ''),
(1440, 291, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(1441, 291, '_menu_item_xfn', ''),
(1442, 291, '_menu_item_url', ''),
(1446, 184, '_original_size', ''),
(1447, 184, '_entry_icon', 'noicon'),
(1452, 292, 'bp_docs_last_editor', '1'),
(1453, 292, 'bp_docs_settings', 'a:5:{s:4:"read";s:6:"anyone";s:4:"edit";s:7:"creator";s:13:"read_comments";s:6:"anyone";s:13:"post_comments";s:8:"loggedin";s:12:"view_history";s:6:"anyone";}'),
(1454, 292, 'bp_docs_revision_count', '2'),
(1455, 295, 'bp_docs_last_editor', '1'),
(1456, 295, 'bp_docs_settings', 'a:5:{s:4:"read";s:6:"anyone";s:4:"edit";s:8:"loggedin";s:13:"read_comments";s:6:"anyone";s:13:"post_comments";s:8:"loggedin";s:12:"view_history";s:6:"anyone";}'),
(1457, 295, 'bp_docs_revision_count', '2'),
(1458, 297, 'bp_docs_last_editor', '1'),
(1459, 297, 'bp_docs_settings', 'a:5:{s:4:"read";s:6:"anyone";s:4:"edit";s:8:"loggedin";s:13:"read_comments";s:6:"anyone";s:13:"post_comments";s:8:"loggedin";s:12:"view_history";s:6:"anyone";}'),
(1460, 297, 'bp_docs_revision_count', '1'),
(1464, 300, 'bp_docs_last_editor', '1'),
(1465, 300, 'bp_docs_settings', 'a:5:{s:4:"read";s:6:"anyone";s:4:"edit";s:8:"loggedin";s:13:"read_comments";s:6:"anyone";s:13:"post_comments";s:8:"loggedin";s:12:"view_history";s:6:"anyone";}'),
(1466, 300, 'bp_docs_revision_count', '1'),
(1467, 302, 'bp_docs_last_editor', '1'),
(1468, 302, 'bp_docs_settings', 'a:5:{s:4:"read";s:6:"anyone";s:4:"edit";s:8:"loggedin";s:13:"read_comments";s:6:"anyone";s:13:"post_comments";s:8:"loggedin";s:12:"view_history";s:6:"anyone";}'),
(1469, 302, 'bp_docs_revision_count', '2'),
(1470, 304, 'bp_docs_last_editor', '1'),
(1471, 304, 'bp_docs_settings', 'a:5:{s:4:"read";s:13:"group-members";s:4:"edit";s:13:"group-members";s:13:"read_comments";s:13:"group-members";s:13:"post_comments";s:13:"group-members";s:12:"view_history";s:13:"group-members";}'),
(1472, 304, 'bp_docs_revision_count', '3'),
(1474, 308, 'bp_docs_last_editor', '1'),
(1475, 308, 'bp_docs_settings', 'a:5:{s:4:"read";s:13:"group-members";s:4:"edit";s:7:"creator";s:13:"read_comments";s:13:"group-members";s:13:"post_comments";s:13:"group-members";s:12:"view_history";s:13:"group-members";}'),
(1476, 308, 'bp_docs_revision_count', '3'),
(1481, 312, 'bp_docs_last_editor', '1'),
(1482, 312, 'bp_docs_settings', 'a:5:{s:4:"read";s:13:"group-members";s:4:"edit";s:13:"group-members";s:13:"read_comments";s:13:"group-members";s:13:"post_comments";s:13:"group-members";s:12:"view_history";s:13:"group-members";}'),
(1483, 312, 'bp_docs_revision_count', '1'),
(1484, 314, 'bp_docs_last_editor', '1'),
(1485, 314, 'bp_docs_settings', 'a:5:{s:4:"read";s:13:"group-members";s:4:"edit";s:13:"group-members";s:13:"read_comments";s:13:"group-members";s:13:"post_comments";s:13:"group-members";s:12:"view_history";s:13:"group-members";}'),
(1486, 314, 'bp_docs_revision_count', '1'),
(1487, 307, 'bp_docs_last_editor', '1'),
(1488, 307, 'bp_docs_settings', 'a:5:{s:4:"read";s:6:"anyone";s:4:"edit";s:8:"loggedin";s:13:"read_comments";s:6:"anyone";s:13:"post_comments";s:8:"loggedin";s:12:"view_history";s:6:"anyone";}'),
(1489, 307, 'bp_docs_revision_count', '2'),
(1491, 297, '_bp_docs_last_pinged', '1453373908:1'),
(1492, 318, 'bp_docs_last_editor', '1'),
(1493, 318, 'bp_docs_settings', 'a:5:{s:4:"read";s:13:"group-members";s:4:"edit";s:13:"group-members";s:13:"read_comments";s:13:"group-members";s:13:"post_comments";s:13:"group-members";s:12:"view_history";s:13:"group-members";}'),
(1494, 318, 'bp_docs_revision_count', '1'),
(1495, 318, '_bp_docs_last_pinged', '1453378249:1'),
(1496, 320, 'bp_docs_last_editor', '1'),
(1497, 320, 'bp_docs_settings', 'a:5:{s:4:"read";s:13:"group-members";s:4:"edit";s:13:"group-members";s:13:"read_comments";s:13:"group-members";s:13:"post_comments";s:13:"group-members";s:12:"view_history";s:13:"group-members";}'),
(1498, 320, 'bp_docs_revision_count', '1'),
(1499, 317, 'bp_docs_last_editor', '1'),
(1500, 317, 'bp_docs_settings', 'a:5:{s:4:"read";s:13:"group-members";s:4:"edit";s:13:"group-members";s:13:"read_comments";s:13:"group-members";s:13:"post_comments";s:13:"group-members";s:12:"view_history";s:13:"group-members";}'),
(1501, 317, 'bp_docs_revision_count', '2'),
(1502, 323, 'bp_docs_last_editor', '1'),
(1503, 323, 'bp_docs_settings', 'a:5:{s:4:"read";s:13:"group-members";s:4:"edit";s:13:"group-members";s:13:"read_comments";s:13:"group-members";s:13:"post_comments";s:13:"group-members";s:12:"view_history";s:13:"group-members";}'),
(1504, 323, 'bp_docs_revision_count', '3'),
(1506, 326, 'bp_docs_last_editor', '1'),
(1507, 326, 'bp_docs_settings', 'a:5:{s:4:"read";s:13:"group-members";s:4:"edit";s:13:"group-members";s:13:"read_comments";s:13:"group-members";s:13:"post_comments";s:13:"group-members";s:12:"view_history";s:13:"group-members";}'),
(1508, 326, 'bp_docs_revision_count', '1'),
(1509, 328, 'bp_docs_last_editor', '1'),
(1510, 328, 'bp_docs_settings', 'a:5:{s:4:"read";s:13:"group-members";s:4:"edit";s:13:"group-members";s:13:"read_comments";s:13:"group-members";s:13:"post_comments";s:13:"group-members";s:12:"view_history";s:13:"group-members";}'),
(1511, 328, 'bp_docs_revision_count', '2'),
(1513, 330, 'bp_docs_last_editor', '1'),
(1514, 330, 'bp_docs_settings', 'a:5:{s:4:"read";s:13:"group-members";s:4:"edit";s:13:"group-members";s:13:"read_comments";s:13:"group-members";s:13:"post_comments";s:13:"group-members";s:12:"view_history";s:13:"group-members";}'),
(1515, 330, 'bp_docs_revision_count', '1'),
(1516, 332, 'bp_docs_last_editor', '1'),
(1517, 332, 'bp_docs_settings', 'a:5:{s:4:"read";s:13:"group-members";s:4:"edit";s:13:"group-members";s:13:"read_comments";s:13:"group-members";s:13:"post_comments";s:13:"group-members";s:12:"view_history";s:13:"group-members";}'),
(1518, 332, 'bp_docs_revision_count', '1'),
(1519, 334, 'bp_docs_last_editor', '1'),
(1520, 334, 'bp_docs_settings', 'a:5:{s:4:"read";s:13:"group-members";s:4:"edit";s:13:"group-members";s:13:"read_comments";s:13:"group-members";s:13:"post_comments";s:13:"group-members";s:12:"view_history";s:13:"group-members";}'),
(1521, 334, 'bp_docs_revision_count', '1'),
(1522, 336, 'bp_docs_last_editor', '1'),
(1523, 336, 'bp_docs_settings', 'a:5:{s:4:"read";s:6:"anyone";s:4:"edit";s:8:"loggedin";s:13:"read_comments";s:6:"anyone";s:13:"post_comments";s:8:"loggedin";s:12:"view_history";s:6:"anyone";}'),
(1524, 336, 'bp_docs_revision_count', '1'),
(1525, 338, 'bp_docs_last_editor', '1'),
(1526, 338, 'bp_docs_settings', 'a:5:{s:4:"read";s:6:"anyone";s:4:"edit";s:8:"loggedin";s:13:"read_comments";s:6:"anyone";s:13:"post_comments";s:8:"loggedin";s:12:"view_history";s:6:"anyone";}'),
(1527, 338, 'bp_docs_revision_count', '1'),
(1528, 339, 'bp_docs_last_editor', '1'),
(1529, 339, 'bp_docs_settings', 'a:5:{s:4:"read";s:13:"group-members";s:4:"edit";s:13:"group-members";s:13:"read_comments";s:13:"group-members";s:13:"post_comments";s:13:"group-members";s:12:"view_history";s:13:"group-members";}'),
(1530, 339, 'bp_docs_revision_count', '2'),
(1534, 343, 'bp_docs_last_editor', '1'),
(1535, 343, 'bp_docs_settings', 'a:5:{s:4:"read";s:13:"group-members";s:4:"edit";s:13:"group-members";s:13:"read_comments";s:13:"group-members";s:13:"post_comments";s:13:"group-members";s:12:"view_history";s:13:"group-members";}'),
(1536, 343, 'bp_docs_revision_count', '1'),
(1537, 346, 'bp_docs_last_editor', '1'),
(1538, 346, 'bp_docs_settings', 'a:5:{s:4:"read";s:13:"group-members";s:4:"edit";s:13:"group-members";s:13:"read_comments";s:13:"group-members";s:13:"post_comments";s:13:"group-members";s:12:"view_history";s:13:"group-members";}'),
(1539, 346, 'bp_docs_revision_count', '1'),
(1540, 348, 'bp_docs_last_editor', '1'),
(1541, 348, 'bp_docs_settings', 'a:5:{s:4:"read";s:13:"group-members";s:4:"edit";s:13:"group-members";s:13:"read_comments";s:13:"group-members";s:13:"post_comments";s:13:"group-members";s:12:"view_history";s:13:"group-members";}'),
(1542, 348, 'bp_docs_revision_count', '1'),
(1543, 350, 'bp_docs_last_editor', '1'),
(1544, 350, 'bp_docs_settings', 'a:5:{s:4:"read";s:13:"group-members";s:4:"edit";s:13:"group-members";s:13:"read_comments";s:13:"group-members";s:13:"post_comments";s:13:"group-members";s:12:"view_history";s:13:"group-members";}'),
(1545, 350, 'bp_docs_revision_count', '1'),
(1546, 352, 'bp_docs_last_editor', '1'),
(1547, 352, 'bp_docs_settings', 'a:5:{s:4:"read";s:13:"group-members";s:4:"edit";s:13:"group-members";s:13:"read_comments";s:13:"group-members";s:13:"post_comments";s:13:"group-members";s:12:"view_history";s:13:"group-members";}'),
(1548, 352, 'bp_docs_revision_count', '1'),
(1549, 354, 'bp_docs_last_editor', '1'),
(1550, 354, 'bp_docs_settings', 'a:5:{s:4:"read";s:13:"group-members";s:4:"edit";s:13:"group-members";s:13:"read_comments";s:13:"group-members";s:13:"post_comments";s:13:"group-members";s:12:"view_history";s:13:"group-members";}'),
(1551, 354, 'bp_docs_revision_count', '5'),
(1552, 356, 'bp_docs_last_editor', '1'),
(1553, 356, 'bp_docs_settings', 'a:5:{s:4:"read";s:13:"group-members";s:4:"edit";s:13:"group-members";s:13:"read_comments";s:13:"group-members";s:13:"post_comments";s:13:"group-members";s:12:"view_history";s:13:"group-members";}'),
(1554, 356, 'bp_docs_revision_count', '4'),
(1555, 358, 'bp_docs_last_editor', '1'),
(1556, 358, 'bp_docs_settings', 'a:5:{s:4:"read";s:13:"group-members";s:4:"edit";s:13:"group-members";s:13:"read_comments";s:13:"group-members";s:13:"post_comments";s:13:"group-members";s:12:"view_history";s:13:"group-members";}'),
(1557, 358, 'bp_docs_revision_count', '6'),
(1558, 360, 'bp_docs_last_editor', '1'),
(1559, 360, 'bp_docs_settings', 'a:5:{s:4:"read";s:13:"group-members";s:4:"edit";s:13:"group-members";s:13:"read_comments";s:13:"group-members";s:13:"post_comments";s:13:"group-members";s:12:"view_history";s:13:"group-members";}'),
(1560, 360, 'bp_docs_revision_count', '4'),
(1561, 362, 'bp_docs_last_editor', '1'),
(1562, 362, 'bp_docs_settings', 'a:5:{s:4:"read";s:13:"group-members";s:4:"edit";s:13:"group-members";s:13:"read_comments";s:13:"group-members";s:13:"post_comments";s:13:"group-members";s:12:"view_history";s:13:"group-members";}'),
(1563, 362, 'bp_docs_revision_count', '1'),
(1564, 364, 'bp_docs_last_editor', '1'),
(1565, 364, 'bp_docs_settings', 'a:5:{s:4:"read";s:13:"group-members";s:4:"edit";s:13:"group-members";s:13:"read_comments";s:13:"group-members";s:13:"post_comments";s:13:"group-members";s:12:"view_history";s:13:"group-members";}'),
(1566, 364, 'bp_docs_revision_count', '3'),
(1567, 366, 'bp_docs_last_editor', '1'),
(1568, 366, 'bp_docs_settings', 'a:5:{s:4:"read";s:13:"group-members";s:4:"edit";s:13:"group-members";s:13:"read_comments";s:13:"group-members";s:13:"post_comments";s:13:"group-members";s:12:"view_history";s:13:"group-members";}'),
(1569, 366, 'bp_docs_revision_count', '1'),
(1570, 368, 'bp_docs_last_editor', '1'),
(1571, 368, 'bp_docs_settings', 'a:5:{s:4:"read";s:6:"anyone";s:4:"edit";s:8:"loggedin";s:13:"read_comments";s:6:"anyone";s:13:"post_comments";s:8:"loggedin";s:12:"view_history";s:6:"anyone";}'),
(1572, 368, 'bp_docs_revision_count', '1'),
(1573, 370, 'bp_docs_last_editor', '1'),
(1574, 370, 'bp_docs_settings', 'a:5:{s:4:"read";s:6:"anyone";s:4:"edit";s:8:"loggedin";s:13:"read_comments";s:6:"anyone";s:13:"post_comments";s:8:"loggedin";s:12:"view_history";s:6:"anyone";}'),
(1575, 370, 'bp_docs_revision_count', '1'),
(1589, 379, 'bp_docs_last_editor', '1'),
(1590, 379, 'bp_docs_settings', 'a:5:{s:4:"read";s:13:"group-members";s:4:"edit";s:7:"creator";s:13:"read_comments";s:13:"group-members";s:13:"post_comments";s:13:"group-members";s:12:"view_history";s:13:"group-members";}'),
(1591, 379, 'bp_docs_revision_count', '9'),
(1595, 383, 'bp_docs_last_editor', '1'),
(1596, 383, 'bp_docs_settings', 'a:5:{s:4:"read";s:13:"group-members";s:4:"edit";s:13:"group-members";s:13:"read_comments";s:13:"group-members";s:13:"post_comments";s:13:"group-members";s:12:"view_history";s:13:"group-members";}'),
(1597, 383, 'bp_docs_revision_count', '1'),
(1598, 385, 'bp_docs_last_editor', '1'),
(1599, 385, 'bp_docs_settings', 'a:5:{s:4:"read";s:13:"group-members";s:4:"edit";s:13:"group-members";s:13:"read_comments";s:13:"group-members";s:13:"post_comments";s:13:"group-members";s:12:"view_history";s:13:"group-members";}'),
(1600, 385, 'bp_docs_revision_count', '2'),
(1602, 387, 'bp_docs_last_editor', '1'),
(1603, 387, 'bp_docs_settings', 'a:5:{s:4:"read";s:13:"group-members";s:4:"edit";s:13:"group-members";s:13:"read_comments";s:13:"group-members";s:13:"post_comments";s:13:"group-members";s:12:"view_history";s:13:"group-members";}'),
(1604, 387, 'bp_docs_revision_count', '12'),
(1619, 391, 'bp_docs_last_editor', '1'),
(1620, 391, 'bp_docs_settings', 'a:5:{s:4:"read";s:13:"group-members";s:4:"edit";s:13:"group-members";s:13:"read_comments";s:13:"group-members";s:13:"post_comments";s:13:"group-members";s:12:"view_history";s:13:"group-members";}'),
(1621, 391, 'bp_docs_revision_count', '3'),
(1623, 391, '_edit_last', '1'),
(1626, 396, '_menu_item_type', 'custom'),
(1627, 396, '_menu_item_menu_item_parent', '0'),
(1628, 396, '_menu_item_object_id', '396'),
(1629, 396, '_menu_item_object', 'custom'),
(1630, 396, '_menu_item_target', ''),
(1631, 396, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(1632, 396, '_menu_item_xfn', ''),
(1633, 396, '_menu_item_url', 'http://pwc-int.educacio.intranet/agora/mastersec/docs/cataleg-de-models/'),
(1635, 397, '_menu_item_type', 'custom'),
(1636, 397, '_menu_item_menu_item_parent', '0'),
(1637, 397, '_menu_item_object_id', '397'),
(1638, 397, '_menu_item_object', 'custom'),
(1639, 397, '_menu_item_target', ''),
(1640, 397, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(1641, 397, '_menu_item_xfn', ''),
(1642, 397, '_menu_item_url', 'http://pwc-int.educacio.intranet/agora/mastersec/docs/?bpd_tag=Organitzaci%C3%B3+i+gesti%C3%B3+del+centre'),
(1644, 398, '_menu_item_type', 'custom'),
(1645, 398, '_menu_item_menu_item_parent', '0'),
(1646, 398, '_menu_item_object_id', '398'),
(1647, 398, '_menu_item_object', 'custom'),
(1648, 398, '_menu_item_target', ''),
(1649, 398, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(1650, 398, '_menu_item_xfn', ''),
(1651, 398, '_menu_item_url', 'http://pwc-int.educacio.intranet/agora/mastersec/docs/documents-administratius/'),
(1653, 399, '_menu_item_type', 'custom'),
(1654, 399, '_menu_item_menu_item_parent', '0'),
(1655, 399, '_menu_item_object_id', '399'),
(1656, 399, '_menu_item_object', 'custom'),
(1657, 399, '_menu_item_target', ''),
(1658, 399, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(1659, 399, '_menu_item_xfn', ''),
(1660, 399, '_menu_item_url', '#'),
(1662, 400, '_menu_item_type', 'custom'),
(1663, 400, '_menu_item_menu_item_parent', '0'),
(1664, 400, '_menu_item_object_id', '400'),
(1665, 400, '_menu_item_object', 'custom'),
(1666, 400, '_menu_item_target', ''),
(1667, 400, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(1668, 400, '_menu_item_xfn', ''),
(1669, 400, '_menu_item_url', '#'),
(1671, 401, '_menu_item_type', 'custom'),
(1672, 401, '_menu_item_menu_item_parent', '0'),
(1673, 401, '_menu_item_object_id', '401'),
(1674, 401, '_menu_item_object', 'custom'),
(1675, 401, '_menu_item_target', ''),
(1676, 401, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(1677, 401, '_menu_item_xfn', ''),
(1678, 401, '_menu_item_url', '#'),
(1680, 402, '_menu_item_type', 'custom'),
(1681, 402, '_menu_item_menu_item_parent', '399'),
(1682, 402, '_menu_item_object_id', '402'),
(1683, 402, '_menu_item_object', 'custom'),
(1684, 402, '_menu_item_target', ''),
(1685, 402, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(1686, 402, '_menu_item_xfn', ''),
(1687, 402, '_menu_item_url', '#'),
(1689, 403, '_menu_item_type', 'custom'),
(1690, 403, '_menu_item_menu_item_parent', '399'),
(1691, 403, '_menu_item_object_id', '403'),
(1692, 403, '_menu_item_object', 'custom'),
(1693, 403, '_menu_item_target', ''),
(1694, 403, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(1695, 403, '_menu_item_xfn', ''),
(1696, 403, '_menu_item_url', '#'),
(1698, 404, '_menu_item_type', 'custom'),
(1699, 404, '_menu_item_menu_item_parent', '399'),
(1700, 404, '_menu_item_object_id', '404'),
(1701, 404, '_menu_item_object', 'custom'),
(1702, 404, '_menu_item_target', ''),
(1703, 404, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(1704, 404, '_menu_item_xfn', ''),
(1705, 404, '_menu_item_url', '#'),
(1707, 405, '_menu_item_type', 'custom'),
(1708, 405, '_menu_item_menu_item_parent', '399'),
(1709, 405, '_menu_item_object_id', '405'),
(1710, 405, '_menu_item_object', 'custom'),
(1711, 405, '_menu_item_target', ''),
(1712, 405, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(1713, 405, '_menu_item_xfn', ''),
(1714, 405, '_menu_item_url', '#'),
(1716, 406, '_menu_item_type', 'custom'),
(1717, 406, '_menu_item_menu_item_parent', '0'),
(1718, 406, '_menu_item_object_id', '406'),
(1719, 406, '_menu_item_object', 'custom'),
(1720, 406, '_menu_item_target', ''),
(1721, 406, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(1722, 406, '_menu_item_xfn', ''),
(1723, 406, '_menu_item_url', '#'),
(1725, 407, '_menu_item_type', 'custom'),
(1726, 407, '_menu_item_menu_item_parent', '0'),
(1727, 407, '_menu_item_object_id', '407'),
(1728, 407, '_menu_item_object', 'custom'),
(1729, 407, '_menu_item_target', ''),
(1730, 407, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(1731, 407, '_menu_item_xfn', ''),
(1732, 407, '_menu_item_url', '#'),
(1734, 408, '_menu_item_type', 'custom'),
(1735, 408, '_menu_item_menu_item_parent', '407'),
(1736, 408, '_menu_item_object_id', '408'),
(1737, 408, '_menu_item_object', 'custom'),
(1738, 408, '_menu_item_target', ''),
(1739, 408, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(1740, 408, '_menu_item_xfn', ''),
(1741, 408, '_menu_item_url', '#'),
(1743, 409, '_menu_item_type', 'custom'),
(1744, 409, '_menu_item_menu_item_parent', '407'),
(1745, 409, '_menu_item_object_id', '409'),
(1746, 409, '_menu_item_object', 'custom'),
(1747, 409, '_menu_item_target', ''),
(1748, 409, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(1749, 409, '_menu_item_xfn', ''),
(1750, 409, '_menu_item_url', '#'),
(1752, 410, '_menu_item_type', 'custom'),
(1753, 410, '_menu_item_menu_item_parent', '407'),
(1754, 410, '_menu_item_object_id', '410'),
(1755, 410, '_menu_item_object', 'custom'),
(1756, 410, '_menu_item_target', ''),
(1757, 410, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(1758, 410, '_menu_item_xfn', ''),
(1759, 410, '_menu_item_url', '#'),
(1763, 379, '_edit_last', '1'),
(1784, 379, '_bp_docs_last_pinged', '1453400079:1'),
(1785, 81, '_template_layout', '2c-l'),
(1790, 424, '_edit_last', '1'),
(1791, 424, '_wp_page_template', 'default'),
(1792, 424, '_template_layout', '2c-l'),
(1793, 424, '_edit_lock', '1459252176:2'),
(1794, 426, '_edit_lock', '1459252189:2'),
(1795, 426, '_edit_last', '1'),
(1796, 426, '_wp_page_template', 'default'),
(1797, 426, 'sharing_disabled', '1'),
(1798, 426, '_template_layout', '2c-l'),
(1799, 424, 'sharing_disabled', '1'),
(1800, 428, '_menu_item_type', 'post_type'),
(1801, 428, '_menu_item_menu_item_parent', '25'),
(1802, 428, '_menu_item_object_id', '55'),
(1803, 428, '_menu_item_object', 'page'),
(1804, 428, '_menu_item_target', ''),
(1805, 428, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(1806, 428, '_menu_item_xfn', ''),
(1807, 428, '_menu_item_url', ''),
(1858, 248, '_calendar_view', 'a:1:{s:16:"default-calendar";s:4:"list";}'),
(1859, 248, '_default_calendar_list_range_type', 'daily'),
(1860, 248, '_default_calendar_list_range_span', '7'),
(1861, 248, '_calendar_begins', 'today'),
(1862, 248, '_feed_earliest_event_date', 'months_before'),
(1863, 248, '_feed_earliest_event_date_range', '1'),
(1864, 248, '_feed_latest_event_date', 'years_after'),
(1865, 248, '_feed_latest_event_date_range', '1'),
(1866, 248, '_default_calendar_event_bubble_trigger', 'hover'),
(1867, 248, '_default_calendar_expand_multi_day_events', 'no'),
(1868, 248, '_google_calendar_id', 'eHRlYy5jYXRfZDhqcjBpMG4zbjlwYXRpaXEzNjFjNW9pY2NAZ3JvdXAuY2FsZW5kYXIuZ29vZ2xlLmNvbQ=='),
(1869, 248, '_google_events_max_results', '2500'),
(1870, 248, '_google_events_recurring', 'show'),
(1871, 248, '_calendar_date_format_setting', 'use_site'),
(1872, 248, '_calendar_time_format_setting', 'use_site'),
(1873, 248, '_calendar_datetime_separator', '@'),
(1874, 248, '_calendar_week_starts_on_setting', 'use_site'),
(1875, 248, '_feed_cache_user_unit', '3600'),
(1876, 248, '_feed_cache_user_amount', '1'),
(1877, 248, '_feed_cache', '3600'),
(1878, 248, '_calendar_version', '3.1.2'),
(1879, 224, '_calendar_view', 'a:1:{s:16:"default-calendar";s:4:"grid";}'),
(1880, 224, '_default_calendar_list_range_type', 'daily'),
(1881, 224, '_default_calendar_list_range_span', '7'),
(1882, 224, '_calendar_begins', 'today'),
(1883, 224, '_feed_earliest_event_date', 'months_before'),
(1884, 224, '_feed_earliest_event_date_range', '1'),
(1885, 224, '_feed_latest_event_date', 'years_after'),
(1886, 224, '_feed_latest_event_date_range', '1'),
(1887, 224, '_default_calendar_event_bubble_trigger', 'hover'),
(1888, 224, '_default_calendar_expand_multi_day_events', 'yes'),
(1889, 224, '_google_calendar_id', 'eHRlYy5jYXRfZDhqcjBpMG4zbjlwYXRpaXEzNjFjNW9pY2NAZ3JvdXAuY2FsZW5kYXIuZ29vZ2xlLmNvbQ=='),
(1890, 224, '_google_events_max_results', '2500'),
(1891, 224, '_google_events_recurring', 'show'),
(1892, 224, '_calendar_date_format_setting', 'use_site'),
(1893, 224, '_calendar_time_format_setting', 'use_site'),
(1894, 224, '_calendar_datetime_separator', '@'),
(1895, 224, '_calendar_week_starts_on_setting', 'use_site'),
(1896, 224, '_feed_cache_user_unit', '60'),
(1897, 224, '_feed_cache_user_amount', '5'),
(1898, 224, '_feed_cache', '300'),
(1899, 224, '_calendar_version', '3.1.2'),
(1900, 248, '_calendar_begins_nth', '1'),
(1901, 248, '_calendar_begins_custom_date', ''),
(1902, 248, '_calendar_is_static', 'no'),
(1903, 248, '_no_events_message', ''),
(1904, 248, '_event_formatting', 'preserve_linebreaks'),
(1905, 248, '_poweredby', 'no'),
(1906, 248, '_feed_timezone_setting', 'use_site'),
(1907, 248, '_feed_timezone', 'Europe/Madrid'),
(1908, 248, '_calendar_date_format', 'l, d F Y'),
(1909, 248, '_calendar_date_format_php', 'd/m/Y'),
(1910, 248, '_calendar_time_format', 'G:i a'),
(1911, 248, '_calendar_time_format_php', 'G:i'),
(1912, 248, '_calendar_week_starts_on', '0'),
(1913, 248, '_google_events_search_query', ''),
(1914, 248, '_grouped_calendars_source', 'ids'),
(1915, 248, '_grouped_calendars_ids', ''),
(1916, 248, '_grouped_calendars_category', ''),
(1917, 248, '_default_calendar_style_theme', 'light'),
(1918, 248, '_default_calendar_style_today', '#1e73be'),
(1919, 248, '_default_calendar_style_days_events', '#000000'),
(1920, 248, '_default_calendar_list_header', 'no'),
(1921, 248, '_default_calendar_compact_list', 'no'),
(1922, 248, '_default_calendar_limit_visible_events', 'no'),
(1923, 248, '_default_calendar_visible_events', '3'),
(1924, 248, '_default_calendar_trim_titles', 'no'),
(1925, 248, '_default_calendar_trim_titles_chars', '20'),
(1926, 224, '_calendar_begins_nth', '1'),
(1927, 224, '_calendar_begins_custom_date', ''),
(1928, 224, '_calendar_is_static', 'no'),
(1929, 224, '_no_events_message', ''),
(1930, 224, '_event_formatting', 'preserve_linebreaks'),
(1931, 224, '_poweredby', 'no'),
(1932, 224, '_feed_timezone_setting', 'use_site'),
(1933, 224, '_feed_timezone', 'Europe/Madrid'),
(1934, 224, '_calendar_date_format', 'l, d F Y'),
(1935, 224, '_calendar_date_format_php', 'd/m/Y'),
(1936, 224, '_calendar_time_format', 'G:i a'),
(1937, 224, '_calendar_time_format_php', 'G:i'),
(1938, 224, '_calendar_week_starts_on', '0'),
(1939, 224, '_google_events_search_query', ''),
(1940, 224, '_grouped_calendars_source', 'ids'),
(1941, 224, '_grouped_calendars_ids', ''),
(1942, 224, '_grouped_calendars_category', ''),
(1943, 224, '_default_calendar_style_theme', 'light'),
(1944, 224, '_default_calendar_style_today', '#1e73be'),
(1945, 224, '_default_calendar_style_days_events', '#000000'),
(1946, 224, '_default_calendar_list_header', 'no'),
(1947, 224, '_default_calendar_compact_list', 'no'),
(1948, 224, '_default_calendar_limit_visible_events', 'no'),
(1949, 224, '_default_calendar_visible_events', '3'),
(1950, 224, '_default_calendar_trim_titles', 'no'),
(1951, 224, '_default_calendar_trim_titles_chars', '20'),
(1952, 455, '_wp_attached_file', '2017/03/Agrupat-03.png'),
(1953, 455, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:1667;s:6:"height";i:1667;s:4:"file";s:22:"2017/03/Agrupat-03.png";s:5:"sizes";a:6:{s:9:"thumbnail";a:4:{s:4:"file";s:22:"Agrupat-03-150x150.png";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}s:6:"medium";a:4:{s:4:"file";s:22:"Agrupat-03-300x300.png";s:5:"width";i:300;s:6:"height";i:300;s:9:"mime-type";s:9:"image/png";}s:12:"medium_large";a:4:{s:4:"file";s:22:"Agrupat-03-768x768.png";s:5:"width";i:768;s:6:"height";i:768;s:9:"mime-type";s:9:"image/png";}s:5:"large";a:4:{s:4:"file";s:24:"Agrupat-03-1024x1024.png";s:5:"width";i:1024;s:6:"height";i:1024;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-300";a:4:{s:4:"file";s:22:"Agrupat-03-300x250.png";s:5:"width";i:300;s:6:"height";i:250;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-200";a:4:{s:4:"file";s:22:"Agrupat-03-200x150.png";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}}s:10:"image_meta";a:12:{s:8:"aperture";s:1:"0";s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";s:1:"0";s:9:"copyright";s:0:"";s:12:"focal_length";s:1:"0";s:3:"iso";s:1:"0";s:13:"shutter_speed";s:1:"0";s:5:"title";s:0:"";s:11:"orientation";s:1:"0";s:8:"keywords";a:0:{}}}'),
(1954, 456, '_wp_attached_file', '2017/03/Agrupat-06.png'),
(1955, 456, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:1667;s:6:"height";i:1667;s:4:"file";s:22:"2017/03/Agrupat-06.png";s:5:"sizes";a:6:{s:9:"thumbnail";a:4:{s:4:"file";s:22:"Agrupat-06-150x150.png";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}s:6:"medium";a:4:{s:4:"file";s:22:"Agrupat-06-300x300.png";s:5:"width";i:300;s:6:"height";i:300;s:9:"mime-type";s:9:"image/png";}s:12:"medium_large";a:4:{s:4:"file";s:22:"Agrupat-06-768x768.png";s:5:"width";i:768;s:6:"height";i:768;s:9:"mime-type";s:9:"image/png";}s:5:"large";a:4:{s:4:"file";s:24:"Agrupat-06-1024x1024.png";s:5:"width";i:1024;s:6:"height";i:1024;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-300";a:4:{s:4:"file";s:22:"Agrupat-06-300x250.png";s:5:"width";i:300;s:6:"height";i:250;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-200";a:4:{s:4:"file";s:22:"Agrupat-06-200x150.png";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}}s:10:"image_meta";a:12:{s:8:"aperture";s:1:"0";s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";s:1:"0";s:9:"copyright";s:0:"";s:12:"focal_length";s:1:"0";s:3:"iso";s:1:"0";s:13:"shutter_speed";s:1:"0";s:5:"title";s:0:"";s:11:"orientation";s:1:"0";s:8:"keywords";a:0:{}}}'),
(1956, 457, '_wp_attached_file', '2017/03/Agrupat-01.png'),
(1957, 457, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:1667;s:6:"height";i:1667;s:4:"file";s:22:"2017/03/Agrupat-01.png";s:5:"sizes";a:6:{s:9:"thumbnail";a:4:{s:4:"file";s:22:"Agrupat-01-150x150.png";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}s:6:"medium";a:4:{s:4:"file";s:22:"Agrupat-01-300x300.png";s:5:"width";i:300;s:6:"height";i:300;s:9:"mime-type";s:9:"image/png";}s:12:"medium_large";a:4:{s:4:"file";s:22:"Agrupat-01-768x768.png";s:5:"width";i:768;s:6:"height";i:768;s:9:"mime-type";s:9:"image/png";}s:5:"large";a:4:{s:4:"file";s:24:"Agrupat-01-1024x1024.png";s:5:"width";i:1024;s:6:"height";i:1024;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-300";a:4:{s:4:"file";s:22:"Agrupat-01-300x250.png";s:5:"width";i:300;s:6:"height";i:250;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-200";a:4:{s:4:"file";s:22:"Agrupat-01-200x150.png";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}}s:10:"image_meta";a:12:{s:8:"aperture";s:1:"0";s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";s:1:"0";s:9:"copyright";s:0:"";s:12:"focal_length";s:1:"0";s:3:"iso";s:1:"0";s:13:"shutter_speed";s:1:"0";s:5:"title";s:0:"";s:11:"orientation";s:1:"0";s:8:"keywords";a:0:{}}}'),
(1958, 458, '_wp_attached_file', '2017/03/Agrupat-02.png'),
(1959, 458, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:1667;s:6:"height";i:1667;s:4:"file";s:22:"2017/03/Agrupat-02.png";s:5:"sizes";a:6:{s:9:"thumbnail";a:4:{s:4:"file";s:22:"Agrupat-02-150x150.png";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}s:6:"medium";a:4:{s:4:"file";s:22:"Agrupat-02-300x300.png";s:5:"width";i:300;s:6:"height";i:300;s:9:"mime-type";s:9:"image/png";}s:12:"medium_large";a:4:{s:4:"file";s:22:"Agrupat-02-768x768.png";s:5:"width";i:768;s:6:"height";i:768;s:9:"mime-type";s:9:"image/png";}s:5:"large";a:4:{s:4:"file";s:24:"Agrupat-02-1024x1024.png";s:5:"width";i:1024;s:6:"height";i:1024;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-300";a:4:{s:4:"file";s:22:"Agrupat-02-300x250.png";s:5:"width";i:300;s:6:"height";i:250;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-200";a:4:{s:4:"file";s:22:"Agrupat-02-200x150.png";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}}s:10:"image_meta";a:12:{s:8:"aperture";s:1:"0";s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";s:1:"0";s:9:"copyright";s:0:"";s:12:"focal_length";s:1:"0";s:3:"iso";s:1:"0";s:13:"shutter_speed";s:1:"0";s:5:"title";s:0:"";s:11:"orientation";s:1:"0";s:8:"keywords";a:0:{}}}'),
(1960, 459, '_wp_attached_file', '2017/03/Agrupat-04.png'),
(1961, 459, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:1667;s:6:"height";i:1667;s:4:"file";s:22:"2017/03/Agrupat-04.png";s:5:"sizes";a:6:{s:9:"thumbnail";a:4:{s:4:"file";s:22:"Agrupat-04-150x150.png";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}s:6:"medium";a:4:{s:4:"file";s:22:"Agrupat-04-300x300.png";s:5:"width";i:300;s:6:"height";i:300;s:9:"mime-type";s:9:"image/png";}s:12:"medium_large";a:4:{s:4:"file";s:22:"Agrupat-04-768x768.png";s:5:"width";i:768;s:6:"height";i:768;s:9:"mime-type";s:9:"image/png";}s:5:"large";a:4:{s:4:"file";s:24:"Agrupat-04-1024x1024.png";s:5:"width";i:1024;s:6:"height";i:1024;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-300";a:4:{s:4:"file";s:22:"Agrupat-04-300x250.png";s:5:"width";i:300;s:6:"height";i:250;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-200";a:4:{s:4:"file";s:22:"Agrupat-04-200x150.png";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}}s:10:"image_meta";a:12:{s:8:"aperture";s:1:"0";s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";s:1:"0";s:9:"copyright";s:0:"";s:12:"focal_length";s:1:"0";s:3:"iso";s:1:"0";s:13:"shutter_speed";s:1:"0";s:5:"title";s:0:"";s:11:"orientation";s:1:"0";s:8:"keywords";a:0:{}}}'),
(1962, 460, '_wp_attached_file', '2017/03/Agrupat-12.png'),
(1963, 460, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:1667;s:6:"height";i:1667;s:4:"file";s:22:"2017/03/Agrupat-12.png";s:5:"sizes";a:6:{s:9:"thumbnail";a:4:{s:4:"file";s:22:"Agrupat-12-150x150.png";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}s:6:"medium";a:4:{s:4:"file";s:22:"Agrupat-12-300x300.png";s:5:"width";i:300;s:6:"height";i:300;s:9:"mime-type";s:9:"image/png";}s:12:"medium_large";a:4:{s:4:"file";s:22:"Agrupat-12-768x768.png";s:5:"width";i:768;s:6:"height";i:768;s:9:"mime-type";s:9:"image/png";}s:5:"large";a:4:{s:4:"file";s:24:"Agrupat-12-1024x1024.png";s:5:"width";i:1024;s:6:"height";i:1024;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-300";a:4:{s:4:"file";s:22:"Agrupat-12-300x250.png";s:5:"width";i:300;s:6:"height";i:250;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-200";a:4:{s:4:"file";s:22:"Agrupat-12-200x150.png";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}}s:10:"image_meta";a:12:{s:8:"aperture";s:1:"0";s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";s:1:"0";s:9:"copyright";s:0:"";s:12:"focal_length";s:1:"0";s:3:"iso";s:1:"0";s:13:"shutter_speed";s:1:"0";s:5:"title";s:0:"";s:11:"orientation";s:1:"0";s:8:"keywords";a:0:{}}}'),
(1964, 461, '_wp_attached_file', '2017/03/Agrupat-11-1.png'),
(1965, 461, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:1667;s:6:"height";i:1667;s:4:"file";s:24:"2017/03/Agrupat-11-1.png";s:5:"sizes";a:6:{s:9:"thumbnail";a:4:{s:4:"file";s:24:"Agrupat-11-1-150x150.png";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}s:6:"medium";a:4:{s:4:"file";s:24:"Agrupat-11-1-300x300.png";s:5:"width";i:300;s:6:"height";i:300;s:9:"mime-type";s:9:"image/png";}s:12:"medium_large";a:4:{s:4:"file";s:24:"Agrupat-11-1-768x768.png";s:5:"width";i:768;s:6:"height";i:768;s:9:"mime-type";s:9:"image/png";}s:5:"large";a:4:{s:4:"file";s:26:"Agrupat-11-1-1024x1024.png";s:5:"width";i:1024;s:6:"height";i:1024;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-300";a:4:{s:4:"file";s:24:"Agrupat-11-1-300x250.png";s:5:"width";i:300;s:6:"height";i:250;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-200";a:4:{s:4:"file";s:24:"Agrupat-11-1-200x150.png";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}}s:10:"image_meta";a:12:{s:8:"aperture";s:1:"0";s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";s:1:"0";s:9:"copyright";s:0:"";s:12:"focal_length";s:1:"0";s:3:"iso";s:1:"0";s:13:"shutter_speed";s:1:"0";s:5:"title";s:0:"";s:11:"orientation";s:1:"0";s:8:"keywords";a:0:{}}}'),
(1966, 462, '_wp_attached_file', '2017/03/Agrupat-10-2.png'),
(1967, 462, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:1667;s:6:"height";i:1667;s:4:"file";s:24:"2017/03/Agrupat-10-2.png";s:5:"sizes";a:6:{s:9:"thumbnail";a:4:{s:4:"file";s:24:"Agrupat-10-2-150x150.png";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}s:6:"medium";a:4:{s:4:"file";s:24:"Agrupat-10-2-300x300.png";s:5:"width";i:300;s:6:"height";i:300;s:9:"mime-type";s:9:"image/png";}s:12:"medium_large";a:4:{s:4:"file";s:24:"Agrupat-10-2-768x768.png";s:5:"width";i:768;s:6:"height";i:768;s:9:"mime-type";s:9:"image/png";}s:5:"large";a:4:{s:4:"file";s:26:"Agrupat-10-2-1024x1024.png";s:5:"width";i:1024;s:6:"height";i:1024;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-300";a:4:{s:4:"file";s:24:"Agrupat-10-2-300x250.png";s:5:"width";i:300;s:6:"height";i:250;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-200";a:4:{s:4:"file";s:24:"Agrupat-10-2-200x150.png";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}}s:10:"image_meta";a:12:{s:8:"aperture";s:1:"0";s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";s:1:"0";s:9:"copyright";s:0:"";s:12:"focal_length";s:1:"0";s:3:"iso";s:1:"0";s:13:"shutter_speed";s:1:"0";s:5:"title";s:0:"";s:11:"orientation";s:1:"0";s:8:"keywords";a:0:{}}}'),
(1968, 463, '_wp_attached_file', '2017/03/Agrupat-09-1.png'),
(1969, 463, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:1667;s:6:"height";i:1667;s:4:"file";s:24:"2017/03/Agrupat-09-1.png";s:5:"sizes";a:6:{s:9:"thumbnail";a:4:{s:4:"file";s:24:"Agrupat-09-1-150x150.png";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}s:6:"medium";a:4:{s:4:"file";s:24:"Agrupat-09-1-300x300.png";s:5:"width";i:300;s:6:"height";i:300;s:9:"mime-type";s:9:"image/png";}s:12:"medium_large";a:4:{s:4:"file";s:24:"Agrupat-09-1-768x768.png";s:5:"width";i:768;s:6:"height";i:768;s:9:"mime-type";s:9:"image/png";}s:5:"large";a:4:{s:4:"file";s:26:"Agrupat-09-1-1024x1024.png";s:5:"width";i:1024;s:6:"height";i:1024;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-300";a:4:{s:4:"file";s:24:"Agrupat-09-1-300x250.png";s:5:"width";i:300;s:6:"height";i:250;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-200";a:4:{s:4:"file";s:24:"Agrupat-09-1-200x150.png";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}}s:10:"image_meta";a:12:{s:8:"aperture";s:1:"0";s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";s:1:"0";s:9:"copyright";s:0:"";s:12:"focal_length";s:1:"0";s:3:"iso";s:1:"0";s:13:"shutter_speed";s:1:"0";s:5:"title";s:0:"";s:11:"orientation";s:1:"0";s:8:"keywords";a:0:{}}}'),
(1970, 464, '_wp_attached_file', '2017/03/Agrupat-08-1.png'),
(1971, 464, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:1667;s:6:"height";i:1667;s:4:"file";s:24:"2017/03/Agrupat-08-1.png";s:5:"sizes";a:6:{s:9:"thumbnail";a:4:{s:4:"file";s:24:"Agrupat-08-1-150x150.png";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}s:6:"medium";a:4:{s:4:"file";s:24:"Agrupat-08-1-300x300.png";s:5:"width";i:300;s:6:"height";i:300;s:9:"mime-type";s:9:"image/png";}s:12:"medium_large";a:4:{s:4:"file";s:24:"Agrupat-08-1-768x768.png";s:5:"width";i:768;s:6:"height";i:768;s:9:"mime-type";s:9:"image/png";}s:5:"large";a:4:{s:4:"file";s:26:"Agrupat-08-1-1024x1024.png";s:5:"width";i:1024;s:6:"height";i:1024;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-300";a:4:{s:4:"file";s:24:"Agrupat-08-1-300x250.png";s:5:"width";i:300;s:6:"height";i:250;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-200";a:4:{s:4:"file";s:24:"Agrupat-08-1-200x150.png";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}}s:10:"image_meta";a:12:{s:8:"aperture";s:1:"0";s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";s:1:"0";s:9:"copyright";s:0:"";s:12:"focal_length";s:1:"0";s:3:"iso";s:1:"0";s:13:"shutter_speed";s:1:"0";s:5:"title";s:0:"";s:11:"orientation";s:1:"0";s:8:"keywords";a:0:{}}}'),
(1972, 465, '_wp_attached_file', '2017/03/Agrupat-07-1.png'),
(1973, 465, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:1667;s:6:"height";i:1667;s:4:"file";s:24:"2017/03/Agrupat-07-1.png";s:5:"sizes";a:6:{s:9:"thumbnail";a:4:{s:4:"file";s:24:"Agrupat-07-1-150x150.png";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}s:6:"medium";a:4:{s:4:"file";s:24:"Agrupat-07-1-300x300.png";s:5:"width";i:300;s:6:"height";i:300;s:9:"mime-type";s:9:"image/png";}s:12:"medium_large";a:4:{s:4:"file";s:24:"Agrupat-07-1-768x768.png";s:5:"width";i:768;s:6:"height";i:768;s:9:"mime-type";s:9:"image/png";}s:5:"large";a:4:{s:4:"file";s:26:"Agrupat-07-1-1024x1024.png";s:5:"width";i:1024;s:6:"height";i:1024;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-300";a:4:{s:4:"file";s:24:"Agrupat-07-1-300x250.png";s:5:"width";i:300;s:6:"height";i:250;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-200";a:4:{s:4:"file";s:24:"Agrupat-07-1-200x150.png";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}}s:10:"image_meta";a:12:{s:8:"aperture";s:1:"0";s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";s:1:"0";s:9:"copyright";s:0:"";s:12:"focal_length";s:1:"0";s:3:"iso";s:1:"0";s:13:"shutter_speed";s:1:"0";s:5:"title";s:0:"";s:11:"orientation";s:1:"0";s:8:"keywords";a:0:{}}}'),
(1974, 466, '_wp_attached_file', '2017/03/Agrupat-06-2.png'),
(1975, 466, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:1667;s:6:"height";i:1667;s:4:"file";s:24:"2017/03/Agrupat-06-2.png";s:5:"sizes";a:6:{s:9:"thumbnail";a:4:{s:4:"file";s:24:"Agrupat-06-2-150x150.png";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}s:6:"medium";a:4:{s:4:"file";s:24:"Agrupat-06-2-300x300.png";s:5:"width";i:300;s:6:"height";i:300;s:9:"mime-type";s:9:"image/png";}s:12:"medium_large";a:4:{s:4:"file";s:24:"Agrupat-06-2-768x768.png";s:5:"width";i:768;s:6:"height";i:768;s:9:"mime-type";s:9:"image/png";}s:5:"large";a:4:{s:4:"file";s:26:"Agrupat-06-2-1024x1024.png";s:5:"width";i:1024;s:6:"height";i:1024;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-300";a:4:{s:4:"file";s:24:"Agrupat-06-2-300x250.png";s:5:"width";i:300;s:6:"height";i:250;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-200";a:4:{s:4:"file";s:24:"Agrupat-06-2-200x150.png";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}}s:10:"image_meta";a:12:{s:8:"aperture";s:1:"0";s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";s:1:"0";s:9:"copyright";s:0:"";s:12:"focal_length";s:1:"0";s:3:"iso";s:1:"0";s:13:"shutter_speed";s:1:"0";s:5:"title";s:0:"";s:11:"orientation";s:1:"0";s:8:"keywords";a:0:{}}}'),
(1976, 467, '_wp_attached_file', '2017/03/Agrupat-05-1.png'),
(1977, 467, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:1667;s:6:"height";i:1667;s:4:"file";s:24:"2017/03/Agrupat-05-1.png";s:5:"sizes";a:6:{s:9:"thumbnail";a:4:{s:4:"file";s:24:"Agrupat-05-1-150x150.png";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}s:6:"medium";a:4:{s:4:"file";s:24:"Agrupat-05-1-300x300.png";s:5:"width";i:300;s:6:"height";i:300;s:9:"mime-type";s:9:"image/png";}s:12:"medium_large";a:4:{s:4:"file";s:24:"Agrupat-05-1-768x768.png";s:5:"width";i:768;s:6:"height";i:768;s:9:"mime-type";s:9:"image/png";}s:5:"large";a:4:{s:4:"file";s:26:"Agrupat-05-1-1024x1024.png";s:5:"width";i:1024;s:6:"height";i:1024;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-300";a:4:{s:4:"file";s:24:"Agrupat-05-1-300x250.png";s:5:"width";i:300;s:6:"height";i:250;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-200";a:4:{s:4:"file";s:24:"Agrupat-05-1-200x150.png";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}}s:10:"image_meta";a:12:{s:8:"aperture";s:1:"0";s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";s:1:"0";s:9:"copyright";s:0:"";s:12:"focal_length";s:1:"0";s:3:"iso";s:1:"0";s:13:"shutter_speed";s:1:"0";s:5:"title";s:0:"";s:11:"orientation";s:1:"0";s:8:"keywords";a:0:{}}}'),
(1978, 469, 'es_template_type', 'post_notification'),
(1979, 470, 'es_template_type', 'post_notification'),
(1980, 471, 'es_template_type', 'post_notification'),
(1981, 472, 'es_template_type', 'post_notification'),
(1982, 473, 'es_template_type', 'post_notification'),
(1983, 474, 'es_template_type', 'post_notification'),
(1984, 475, 'es_template_type', 'post_notification'),
(1985, 476, 'es_template_type', 'post_notification'),
(1986, 477, 'es_template_type', 'post_notification'),
(1987, 478, 'es_template_type', 'post_notification'),
(1988, 479, 'es_template_type', 'post_notification'),
(1989, 480, 'es_template_type', 'post_notification'),
(1990, 481, 'es_template_type', 'post_notification'),
(1991, 482, 'es_template_type', 'post_notification');
INSERT INTO `wp_postmeta` (`meta_id`, `post_id`, `meta_key`, `meta_value`) VALUES
(1992, 483, 'es_template_type', 'Newsletter');

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
) ENGINE=InnoDB AUTO_INCREMENT=488 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Bolcant dades de la taula `wp_posts`
--

INSERT INTO `wp_posts` (`ID`, `post_author`, `post_date`, `post_date_gmt`, `post_content`, `post_title`, `post_excerpt`, `post_status`, `comment_status`, `ping_status`, `post_password`, `post_name`, `to_ping`, `pinged`, `post_modified`, `post_modified_gmt`, `post_content_filtered`, `post_parent`, `guid`, `menu_order`, `post_type`, `post_mime_type`, `comment_count`) VALUES
(5, 1, '2014-09-12 09:46:02', '2014-09-12 09:46:02', '', 'Activitat a tot el lloc web', '', 'publish', 'closed', 'closed', '', 'activitat', '', '', '2017-01-17 11:33:18', '2017-01-17 10:33:18', '', 0, 'http://pwc-int.educacio.intranet/agora/mastersec/?page_id=5', 0, 'page', '', 0),
(6, 1, '2014-09-12 09:46:02', '2014-09-12 09:46:02', '', 'Membres', '', 'publish', 'closed', 'closed', '', 'membres', '', '', '2014-09-22 14:13:29', '2014-09-22 14:13:29', '', 0, 'http://pwc-int.educacio.intranet/agora/mastersec/?page_id=6', 0, 'page', '', 0),
(7, 1, '2014-09-12 10:14:31', '2014-09-12 10:14:31', '', 'Pàgines d''inici', '', 'publish', 'closed', 'closed', '', 'pagines-dinici', '', '', '2014-09-22 14:13:29', '2014-09-22 14:13:29', '', 0, 'http://pwc-int.educacio.intranet/agora/mastersec/?page_id=7', 0, 'page', '', 0),
(9, 1, '2014-09-12 10:15:01', '2014-09-12 10:15:01', '', 'Inici', '', 'publish', 'closed', 'closed', '', 'pagina-dinici-buida', '', '', '2014-09-22 14:13:29', '2014-09-22 14:13:29', '', 7, 'http://pwc-int.educacio.intranet/agora/mastersec/?page_id=9', 0, 'page', '', 0),
(13, 1, '2014-09-12 11:05:02', '2014-09-12 11:05:02', 'Pàgina d''avís', 'Avís', '', 'publish', 'closed', 'closed', '', 'avis', '', '', '2014-09-22 14:13:29', '2014-09-22 14:13:29', '', 7, 'http://pwc-int.educacio.intranet/agora/mastersec/?page_id=13', 0, 'page', '', 0),
(16, 1, '2014-09-12 12:40:45', '2014-09-12 12:40:45', '', 'Nodes', '', 'publish', 'closed', 'closed', '', 'nodes', '', '', '2014-09-22 14:13:29', '2014-09-22 14:13:29', '', 0, 'http://pwc-int.educacio.intranet/agora/mastersec/nodes/', 0, 'page', '', 0),
(19, 1, '2014-09-17 14:56:56', '2014-09-17 14:56:56', '<p style="color: #444444;">Aquesta secció pot contenir totes les pàgines necessàries per a oferir una descripció general de l’institut: ubicació, història, instal·lacions, equip docent, consell escolar, pla de qualitat, calendari, salut, informacions pràctiques, normativa…</p>\r\n<p style="color: #444444;">En la maqueta inicial s’inclouen algunes d’aquestes pàgines amb contingut simulat. L’administrador/a pot editar-les, eliminar-les o crear-ne de noves des del tauler. És important que a la caixa <em>Atributs de la pàgina</em> hi consti com a <em>pare/mare</em> la pàgina “<em>L’institut</em>“, i que tinguin seleccionada la plantilla “<em>Menú lateral</em>“.</p>', 'L''institut', '', 'publish', 'closed', 'closed', '', 'linstitut', '', '', '2014-09-22 14:13:29', '2014-09-22 14:13:29', '', 0, 'http://pwc-int.educacio.intranet/agora/mastersec/?page_id=19', 0, 'page', '', 0),
(21, 1, '2014-09-17 16:14:14', '2014-09-17 16:14:14', '<p style="color: #666666;"><strong>Institut l''Arany</strong>\r\nPlaça de la Vila, 14\r\n01234 Abella de Xerta</p>\r\n<iframe style="border: 0;" src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d95122.2542300733!2d1.53775!3d41.837547!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sca!2sus!4v1410948001907" width="600" height="450" frameborder="0"></iframe>\r\n\r\n<strong>Com arribar-hi:\r\n</strong>\r\n<ul>\r\n	<li>Per tren: Estació Abella centre de la línia 1</li>\r\n	<li>Per bus: Línies L3 i L5</li>\r\n</ul>\r\n<strong>Escoles adscrites a l''institut:\r\n</strong>Escola L''Arany, Escola La Ribera, Escola El Sol, Col·legi Primavera\r\n\r\n<strong>Correus electrònics de contacte</strong>\r\n\r\n<strong style="font-size: medium; font-family: inherit; line-height: 1.6;">Centre</strong>\r\n<ul>\r\n	<li><span style="font-size: medium;">Bustia General: <a href="mailto:bustia@ins-larany.cat">bustia@ins-larany.cat</a></span></li>\r\n	<li><span style="font-size: medium;">Director: <a href="mailto:direccio@ins-larany.cat">direccio@ins-larany.cat</a></span></li>\r\n	<li>Cap d''Estudis ESO i Batxillerat: <a href="mailto:direccio@ins-larany.cat">cap.estudis.esobatx@ins-larany.cat\r\n</a></li>\r\n	<li>Cap d''Estudis Cicles: <span style="color: #008080;">cap.estudis.cicles@ins-larany.cat</span></li>\r\n	<li>Coordinador Pedagògic: <span style="color: #008080;">coor.pedagogic@ins-larany.cat</span></li>\r\n	<li>Secretari: <span style="color: #008080;">secretari@ins-larany.cat</span></li>\r\n</ul>\r\n<span style="font-size: medium;"><strong>ESO Tutors</strong></span>\r\n<ul>\r\n	<li><span style="font-size: medium;">Tutor 1r ESO A: <a href="mailto:tutor.eso1a@ins-larany.cat">tutor.eso1a@ins-larany.cat</a></span></li>\r\n	<li><span style="font-size: medium;">Tutor 1r ESO B: <a href="mailto:tutor.eso1b@ins-larany.cat">tutor.eso1b@ins-larany.cat</a></span></li>\r\n	<li><span style="font-size: medium;">Tutor 1r ESO C: <a href="mailto:tutor.eso1c@ins-larany.cat">tutor.eso1c@ins-larany.cat</a></span></li>\r\n	<li><span style="font-size: medium;">Tutor 1r ESO D: <a href="mailto:tutor.eso1d@ins-larany.cat">tutor.eso1d@ins-larany.cat</a></span></li>\r\n	<li><span style="font-size: medium;">Tutor 1r ESO E: <a href="mailto:tutor.eso1e@ins-larany.cat">tutor.eso1e@ins-larany.cat</a></span></li>\r\n</ul>\r\n<ul>\r\n	<li><span style="font-size: medium;">Tutor 2n ESO A: <a href="mailto:tutor.eso2a@ins-larany.cat">tutor.eso2a@ins-larany.cat</a></span></li>\r\n	<li><span style="font-size: medium;">Tutor 2n ESO B: <a href="mailto:tutor.eso2b@ins-larany.cat">tutor.eso2b@ins-larany.cat</a></span></li>\r\n	<li><span style="font-size: medium;">Tutor 2n ESO C: <a href="mailto:tutor.eso2c@ins-larany.cat">tutor.eso2c@ins-larany.cat</a></span></li>\r\n	<li><span style="font-size: medium;">Tutor 2n ESO D: <a href="mailto:tutor.eso2d@ins-larany.cat">tutor.eso2d@ins-larany.cat</a></span></li>\r\n	<li><span style="font-size: medium;">Tutor 2n ESO E: <a href="mailto:tutor.eso2e@ins-larany.cat">tutor.eso2e@ins-larany.cat</a></span></li>\r\n</ul>\r\n<ul>\r\n	<li><span style="font-size: medium;">Tutor 3r ESO A: <a href="mailto:tutor.eso3a@ins-larany.cat">tutor.eso3a@ins-larany.cat</a></span></li>\r\n	<li><span style="font-size: medium;">Tutor 3r ESO B: <a href="mailto:tutor.eso3b@ins-larany.cat">tutor.eso3b@ins-larany.cat</a></span></li>\r\n	<li><span style="font-size: medium;">Tutor 3r ESO C: <a href="mailto:tutor.eso3c@ins-larany.cat">tutor.eso3c@ins-larany.cat</a></span></li>\r\n	<li><span style="font-size: medium;">Tutor 3r ESO D: <a href="mailto:tutor.eso3d@ins-larany.cat">tutor.eso3d@ins-larany.cat</a></span></li>\r\n	<li><span style="font-size: medium;">Tutor 3r ESO E: <a href="mailto:tutor.eso3e@ins-larany.cat">tutor.eso3e@ins-larany.cat</a></span></li>\r\n</ul>\r\n<ul>\r\n	<li><span style="font-size: medium;">Tutor 4t ESO A: <a href="mailto:tutor.eso4a@ins-larany.cat">tutor.eso4a@ins-larany.cat</a></span></li>\r\n	<li><span style="font-size: medium;">Tutor 4t ESO B: <a href="mailto:tutor.eso4b@ins-larany.cat">tutor.eso4b@ins-larany.cat</a></span></li>\r\n	<li><span style="font-size: medium;">Tutor 4t ESO C: <a href="mailto:tutor.eso4c@ins-larany.cat">tutor.eso4c@ins-larany.cat</a></span></li>\r\n	<li><span style="font-size: medium;">Tutor 4t ESO D: <a href="mailto:tutor.eso4d@ins-larany.cat">tutor.eso4d@ins-larany.cat</a></span></li>\r\n	<li><span style="font-size: medium;">Tutor 4t ESO E: <a href="mailto:tutor.eso4e@ins-larany.cat">tutor.eso4e@ins-larany.cat</a></span></li>\r\n</ul>\r\n<span style="font-size: medium;"><strong>ESO Coordinadors</strong></span>\r\n<ul>\r\n	<li><span style="font-size: medium;">Coordinació 1r ESO: <a href="mailto:coor.eso1@ins-larany.cat">coor.eso1@ins-larany.cat</a></span></li>\r\n	<li><span style="font-size: medium;">Coordinació 2n ESO: <a href="mailto:coor.eso2@ins-larany.cat">coor.eso2@ins-larany.cat</a></span></li>\r\n	<li><span style="font-size: medium;">Coordinació 3r ESO: <a href="mailto:coor.eso3@ins-larany.cat">coor.eso3@ins-larany.cat</a></span></li>\r\n	<li><span style="font-size: medium;">Coordinació 4t ESO: <a href="mailto:coor.eso4@ins-larany.cat">coor.eso4@ins-larany.cat</a></span></li>\r\n</ul>\r\n<span style="font-size: medium;"><strong>BATXILLERAT</strong></span>\r\n<ul>\r\n	<li><span style="font-size: medium;">Tutor 1r Batxillerat A: <a href="mailto:tutor.eso2a@ins-larany.cat">tutor.batx1a@ins-larany.cat</a></span></li>\r\n	<li><span style="font-size: medium;">Tutor 1r Batxillerat B: <a href="mailto:tutor.eso2b@ins-larany.cat">tutor.batx1b@ins-larany.cat</a></span></li>\r\n</ul>\r\n<ul>\r\n	<li><span style="font-size: medium;">Tutor 2n Batxillerat A: <a href="mailto:tutor.eso2c@ins-larany.cat">tutor.batx2a@ins-larany.cat</a></span></li>\r\n	<li><span style="font-size: medium;">Tutor 2n Batxillerat B: <a href="mailto:tutor.eso2d@ins-larany.cat">tutor.batx2b@ins-larany.cat</a></span></li>\r\n</ul>\r\n<ul>\r\n	<li><span style="font-size: medium;">Coordinació Batxillerat: <a href="mailto:coor.batxillerat@ins-larany.cat">coor.batxillerat@ins-larany.cat</a></span></li>\r\n</ul>\r\n<span style="font-size: medium;"><strong>CICLES FORMATIUS</strong></span>\r\n<ul>\r\n	<li><span style="font-size: medium;">Tutor 1r Grau mitjà SMX A: <a href="mailto:tutor.eso2a@ins-larany.cat">tutor.smx1a@ins-larany.cat</a></span></li>\r\n	<li><span style="font-size: medium;">Tutor 1r Grau mitjà SMX B: <a href="mailto:tutor.eso2a@ins-larany.cat">tutor.smx1b@ins-larany.cat</a></span></li>\r\n	<li><span style="font-size: medium;">Tutor 1r Grau mitjà SMX C: <a href="mailto:tutor.eso2a@ins-larany.cat">tutor.smx1c@ins-larany.cat</a></span></li>\r\n	<li><span style="font-size: medium;">Tutor 1r Grau mitjà SMX D: <a href="mailto:tutor.eso2a@ins-larany.cat">tutor.smx1d@ins-larany.cat</a></span></li>\r\n	<li><span style="font-size: medium;">Tutor 1r Grau mitjà SMX E: <a href="mailto:tutor.eso2a@ins-larany.cat">tutor.smx1e@ins-larany.cat</a></span></li>\r\n</ul>\r\n<ul>\r\n	<li><span style="font-size: medium;">Tutor 2n Grau mitjà SMX A: <a href="mailto:tutor.eso2a@ins-larany.cat">tutor.smx2a@ins-larany.cat</a></span></li>\r\n	<li><span style="font-size: medium;">Tutor 2n Grau mitjà SMX B: <a href="mailto:tutor.eso2a@ins-larany.cat">tutor.smx2b@ins-larany.cat</a></span></li>\r\n	<li><span style="font-size: medium;">Tutor 2n Grau mitjà SMX C: <a href="mailto:tutor.eso2a@ins-larany.cat">tutor.smx2c@ins-larany.cat</a></span></li>\r\n</ul>\r\n<ul>\r\n	<li><span style="font-size: medium;">Coordinació Grau mitjà: <a href="mailto:coor.graumitja@ins-larany.cat">coor.graumitja@ins-larany.cat</a></span></li>\r\n	<li><span style="font-size: medium;">Coordinació Grau superior: <a href="mailto:coor.grausuperior@ins-larany.cat">coor.grausuperior@ins-larany.cat</a></span></li>\r\n</ul>\r\n<span style="font-size: medium;"><strong>DEPARTAMENTS</strong></span>\r\n<ul>\r\n	<li><span style="font-size: medium;">Cap de departament Orientació: <a href="mailto:cap.orientacio@ins-larany.cat">cap.orientacio@ins-larany.cat</a></span></li>\r\n	<li><span style="font-size: medium;">Cap de departament Català: <a href="mailto:cap.catala@ins-larany.cat">cap.catala@ins-larany.cat</a></span></li>\r\n	<li><span style="font-size: medium;">Cap de departament Castella: <a href="mailto:cap.castella@ins-larany.cat">cap.castella@ins-larany.cat</a></span></li>\r\n	<li><span style="font-size: medium;">Cap de departament Llengües estrangeres: <a href="mailto:cap.idiomes@ins-larany.cat">cap.idiomes@ins-larany.cat</a></span></li>\r\n	<li><span style="font-size: medium;">Cap de departament Matemàtiques: <a href="mailto:cap.mates@ins-larany.cat">cap.matematiques@ins-larany.cat</a></span></li>\r\n	<li><span style="font-size: medium;">Cap de departament Ciències: <a href="mailto:cap.ciencies@ins-larany.cat">cap.ciencies@ins-larany.cat</a></span></li>\r\n	<li><span style="font-size: medium;">Cap de departament Socials: <a href="mailto:cap.socials@ins-larany.cat">cap.socials@ins-larany.cat</a></span></li>\r\n	<li><span style="font-size: medium;">Cap de departament Tecnologia: <a href="mailto:cap.tecno@ins-larany.cat">cap.tecnologia@ins-larany.cat</a></span></li>\r\n	<li><span style="font-size: medium;">Cap de departament Educació Física: <a href="mailto:cap.educaciofisica@ins-larany.cat">cap.educaciofisica@ins-larany.cat</a></span></li>\r\n	<li><span style="font-size: medium;">Cap de departament Educació Visual i Plàstica: <a href="mailto:cap.plastica@ins-larany.cat">cap.plastica@ins-larany.cat</a></span></li>\r\n	<li><span style="font-size: medium;">Cap de departament Música: <a href="mailto:cap.musica@ins-larany.cat">cap.musica@ins-larany.cat</a></span></li>\r\n	<li><span style="font-size: medium;">Cap de departament Informàtica: <a href="mailto:cap.informatica@ins-larany.cat">cap.informatica@ins-larany.cat</a></span></li>\r\n</ul>\r\n<span style="font-size: medium;"><strong>ALTRES CONTACTES:</strong></span>\r\n<ul>\r\n	<li><span style="font-size: medium;">Coordinació FP (FCT, Formació en centres de Treball): <a href="mailto:coor.fp@ins-larany.cat">coor.fp@ins-larany.cat</a></span></li>\r\n	<li><span style="font-size: medium;">Coordinació Llengua, interculturalitat i cohesió social del centre: <a href="mailto:lic@ins-larany.cat">lic@ins-larany.cat</a></span></li>\r\n	<li><span style="font-size: medium;">Riscos laborals: <a href="mailto:riscos.laborals@ins-larany.cat">riscos.laborals@ins-larany.cat</a></span></li>\r\n	<li><span style="font-size: medium;">Coordinació informàtica: <a href="mailto:coor.informatica@ins-larany.cat">coor.informatica@ins-larany.cat</a></span></li>\r\n	<li><span style="font-size: medium;">Webmaster, responsable taller: <a href="mailto:webmaster@ins-larany.cat">webmaster@ins-larany.cat</a></span></li>\r\n	<li><span style="font-size: medium;">Self-Access: <a href="mailto:self.access@ins-larany.cat">self.access@ins-larany.cat</a></span></li>\r\n</ul>', 'On som', '', 'publish', 'closed', 'closed', '', 'on-som', '', '', '2015-07-28 09:14:51', '2015-07-28 08:14:51', '', 19, 'http://pwc-int.educacio.intranet/agora/mastersec/?page_id=21', 10, 'page', '', 0),
(25, 1, '2014-09-17 16:17:37', '2014-09-17 16:17:37', '', 'L''Institut', '', 'publish', 'open', 'closed', '', 'linstitut', '', '', '2016-05-27 10:27:18', '2016-05-27 09:27:18', '', 0, 'http://pwc-int.educacio.intranet/agora/mastersec/?p=25', 1, 'nav_menu_item', '', 0),
(26, 1, '2014-09-17 16:17:37', '2014-09-17 16:17:37', ' ', '', '', 'publish', 'open', 'closed', '', '26', '', '', '2016-05-27 10:27:18', '2016-05-27 09:27:18', '', 19, 'http://pwc-int.educacio.intranet/agora/mastersec/?p=26', 2, 'nav_menu_item', '', 0),
(27, 1, '2014-09-17 16:24:03', '2014-09-17 16:24:03', 'Li Europan lingues es membres del sam familie. Lor separat existentie es un myth. Por scientie, musica, sport etc, litot Europa usa li sam vocabular. Li lingues differe solmen in li grammatica, li pronunciation e li plu commun vocabules.\r\n\r\nOmnicos directe al desirabilite de un nov lingua franca: On refusa continuar payar custosi traductores. At solmen va esser necessi far uniform grammatica, pronunciation e plu sommun paroles. Ma quande lingues coalesce, li grammatica del resultant lingue es plu simplic e regulari quam ti del coalescent lingues.\r\n\r\n<a href="http://pwc-int.educacio.intranet/agora/mastersec/wp-content/uploads/usu7/2014/09/exemple1b.png"><img class="size-medium wp-image-33 aligncenter" src="http://pwc-int.educacio.intranet/agora/mastersec/wp-content/uploads/usu7/2014/09/exemple1b-300x214.png" alt="exemple1b" width="300" height="214" /></a>\r\n\r\n&nbsp;\r\n\r\nLi nov lingua franca va esser plu simplic e regulari quam li existent Europan lingues. It va esser tam simplic quam Occidental in fact, it va esser Occidental. A un Angleso it va semblar un simplificat Angles, quam un skeptic Cambridge amico dit me que Occidental es. Li Europan lingues es membres del sam familie.\r\n\r\nLor separat existentie es un myth. Por scientie, musica, sport etc, litot Europa usa li sam vocabular. Li lingues differe solmen in li grammatica, li pronunciation e li plu commun vocabules. Omnicos directe al desirabilite de un nov lingua franca: On refusa continuar payar custosi traductores.\r\n\r\nAt solmen va esser necessi far uniform grammatica, pronunciation e plu sommun paroles. Ma quande lingues coalesce, li grammatica del resultant lingue es plu simplic e regulari quam ti del coalescent lingues. Li nov lingua franca va esser plu simplic e regulari quam li existent Europan lingues. It va esser tam simplic quam Occidental in fact, it va esser Occidental.\r\n\r\nA un Angleso it va semblar un simplificat Angles, quam un skeptic Cambridge amico dit me que Occidental es. Li Europan lingues es membres del sam familie. Lor separat existentie es un myth. Por scientie, musica, sport etc, litot Europa usa li sam vocabular. Li lingues differe solmen in li grammatica, li pronunciation e li plu commun vocabules.\r\n\r\nOmnicos directe al desirabilite de un nov lingua franca: On refusa continuar payar custosi traductores. At solmen va esser necessi far uniform grammatica, pronunciation e plu sommun paroles. Ma quande lingues coalesce, li grammatica del resultant lingue es plu simplic e regulari quam ti del coalescent lingues. Li nov lingua franca va esser plu simplic e regulari quam li existent Europan lingues. It va esser tam simplic quam Occidental in fact, it va esser Occidental. A un Angleso it va semblar un simplificat Angles, quam un skeptic Cambridge amico dit me que Occidental es. Li', 'Història', '', 'publish', 'closed', 'closed', '', 'historia', '', '', '2014-09-22 14:13:29', '2014-09-22 14:13:29', '', 19, 'http://pwc-int.educacio.intranet/agora/mastersec/?page_id=27', 20, 'page', '', 0),
(30, 1, '2014-09-17 16:24:51', '2014-09-17 16:24:51', ' ', '', '', 'publish', 'open', 'closed', '', '30', '', '', '2016-05-27 10:27:18', '2016-05-27 09:27:18', '', 19, 'http://pwc-int.educacio.intranet/agora/mastersec/?p=30', 3, 'nav_menu_item', '', 0),
(31, 1, '2014-09-17 16:26:18', '2014-09-17 16:26:18', '', 'Instal·lacions', '', 'publish', 'closed', 'closed', '', 'instal%c2%b7lacions', '', '', '2014-09-17 16:34:13', '2014-09-17 16:34:13', '', 0, 'http://pwc-int.educacio.intranet/agora/mastersec/?post_type=slideshow&#038;p=31', 0, 'slideshow', '', 0),
(32, 1, '2014-09-17 16:29:37', '2014-09-17 16:29:37', '', 'exemple1', '', 'inherit', 'open', 'open', '', 'exemple1', '', '', '2014-09-17 16:29:37', '2014-09-17 16:29:37', '', 0, 'http://pwc-int.educacio.intranet/agora/mastersec/wp-content/uploads/usu7/2014/09/exemple1.png', 0, 'attachment', 'image/png', 0),
(33, 1, '2014-09-17 16:29:38', '2014-09-17 16:29:38', '', 'exemple1b', '', 'inherit', 'open', 'open', '', 'exemple1b', '', '', '2014-09-17 16:29:38', '2014-09-17 16:29:38', '', 27, 'http://pwc-int.educacio.intranet/agora/mastersec/wp-content/uploads/usu7/2014/09/exemple1b.png', 0, 'attachment', 'image/png', 0),
(34, 1, '2014-09-17 16:29:39', '2014-09-17 16:29:39', '', 'exemple2b', '', 'inherit', 'open', 'open', '', 'exemple2b', '', '', '2014-09-17 16:29:39', '2014-09-17 16:29:39', '', 0, 'http://pwc-int.educacio.intranet/agora/mastersec/wp-content/uploads/usu7/2014/09/exemple2b.png', 0, 'attachment', 'image/png', 0),
(35, 1, '2014-09-17 16:29:40', '2014-09-17 16:29:40', '', 'exemple3', '', 'inherit', 'open', 'open', '', 'exemple3', '', '', '2014-09-17 16:29:40', '2014-09-17 16:29:40', '', 0, 'http://pwc-int.educacio.intranet/agora/mastersec/wp-content/uploads/usu7/2014/09/exemple3.png', 0, 'attachment', 'image/png', 0),
(36, 1, '2014-09-17 16:29:41', '2014-09-17 16:29:41', '', 'exemple3b', '', 'inherit', 'open', 'open', '', 'exemple3b', '', '', '2014-09-17 16:29:41', '2014-09-17 16:29:41', '', 0, 'http://pwc-int.educacio.intranet/agora/mastersec/wp-content/uploads/usu7/2014/09/exemple3b.png', 0, 'attachment', 'image/png', 0),
(37, 1, '2014-09-17 16:31:11', '2014-09-17 16:31:11', '', 'exemple2', '', 'inherit', 'open', 'open', '', 'exemple2', '', '', '2014-09-17 16:31:11', '2014-09-17 16:31:11', '', 0, 'http://pwc-int.educacio.intranet/agora/mastersec/wp-content/uploads/usu7/2014/09/exemple2.png', 0, 'attachment', 'image/png', 0),
(39, 1, '2014-09-17 16:36:44', '2014-09-17 16:36:44', '[slideshow_deploy id=''31'']\r\n\r\n&nbsp;\r\n\r\nLi Europan lingues es membres del sam familie. Lor separat existentie es un myth. Por scientie, musica, sport etc, litot Europa usa li sam vocabular.\r\n\r\nLi lingues differe solmen in li grammatica, li pronunciation e li plu commun vocabules. Omnicos directe al desirabilite de un nov lingua franca: On refusa continuar payar custosi traductores.\r\n\r\nA un Angleso it va semblar un simplificat Angles, quam un skeptic Cambridge amico dit me que Occidental es. Li Europan lingues es membres del sam familie. Lor separat existentie es un myth.\r\n\r\nMa quande lingues coalesce, li grammatica del resultant lingue es plu simplic e regulari quam ti del coalescent lingues. Li nov lingua franca va esser plu simplic e regulari quam li existent Europan lingues.', 'Instal·lacions', '', 'publish', 'closed', 'closed', '', 'instal%c2%b7lacions', '', '', '2014-09-22 14:13:29', '2014-09-22 14:13:29', '', 19, 'http://pwc-int.educacio.intranet/agora/mastersec/?page_id=39', 30, 'page', '', 0),
(41, 1, '2014-09-17 16:37:28', '2014-09-17 16:37:28', ' ', '', '', 'publish', 'open', 'closed', '', '41', '', '', '2016-05-27 10:27:18', '2016-05-27 09:27:18', '', 19, 'http://pwc-int.educacio.intranet/agora/mastersec/?p=41', 4, 'nav_menu_item', '', 0),
(43, 1, '2014-09-17 16:45:07', '2014-09-17 16:45:07', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent sed cursus odio, id tristique justo. Nullam facilisis ultrices diam vitae rutrum. Donec sed tincidunt nunc. Proin condimentum diam at purus porta, sit amet vulputate ligula luctus. Donec cursus ligula et lectus feugiat, quis ultricies nibh molestie. Ut molestie augue augue, quis dignissim velit scelerisque sit amet. Suspendisse orci arcu, pharetra eu ultrices rutrum, gravida nec eros. Nunc laoreet consectetur hendrerit.\r\n\r\nNullam porta molestie mi, id euismod tortor accumsan sit amet. Maecenas accumsan nulla sapien, id pretium diam pharetra vitae. Praesent suscipit id leo at suscipit. Nunc dignissim tortor non ligula feugiat, nec pulvinar ligula efficitur. Cras et nulla consequat nibh iaculis mattis. Duis et libero nisi. Praesent pulvinar malesuada ante, at rutrum lectus posuere quis. Phasellus vel pellentesque libero. Phasellus lacus elit, facilisis vitae neque ac, pulvinar convallis arcu. Proin facilisis placerat elit. Fusce a varius odio. Praesent suscipit, augue et porta consectetur, quam risus eleifend nibh, at imperdiet dui orci id tortor. Vestibulum faucibus non est ac eleifend. Fusce vitae ante et nunc interdum dictum. Donec mattis sit amet erat non mollis.\r\n\r\nEs pot fer referència a l''<a title="Definició de consell escolar (gencat)" href="http://www20.gencat.cat/portal/site/ensenyament/menuitem.75e1c94eb5dd9e184ed22010b0c0e1a0/?vgnextoid=f6c263fddc7e9310VgnVCM1000008d0c1e0aRCRD&amp;vgnextchannel=f6c263fddc7e9310VgnVCM1000008d0c1e0aRCRD" target="_blank">enllaç</a> següent.', 'Consell escolar', '', 'publish', 'closed', 'closed', '', 'consell-escolar', '', '', '2015-07-28 09:16:52', '2015-07-28 08:16:52', '', 19, 'http://pwc-int.educacio.intranet/agora/mastersec/?page_id=43', 40, 'page', '', 0),
(45, 1, '2014-09-17 16:45:56', '2014-09-17 16:45:56', ' ', '', '', 'publish', 'open', 'closed', '', '45', '', '', '2016-05-27 10:27:18', '2016-05-27 09:27:18', '', 19, 'http://pwc-int.educacio.intranet/agora/mastersec/?p=45', 5, 'nav_menu_item', '', 0),
(46, 1, '2014-09-17 16:53:45', '2014-09-17 16:53:45', 'En aquesta secció, els centres educatius publiquen la informació relativa a la seva organització interna. Es recomana que els centres educatius dissenyin el nivell d''exhaustivitat de la informació publicada. Serà convenient que en el seu plantejament singular, els centres vertebrin el contingut tenint en compte els següents aspectes:\r\n<ul>\r\n	<li>direcció</li>\r\n	<li>coordinacions de cicle</li>\r\n	<li>departaments (experimentals, matemàtiques, tecnologia, llengües, música, visual i plàstica, educació física, socials, orientació acadèmica,...)</li>\r\n	<li>tutories</li>\r\n	<li>consell escolar</li>\r\n	<li>PAS</li>\r\n</ul>', 'Organigrama', '', 'publish', 'closed', 'closed', '', 'organigrama', '', '', '2014-09-22 14:13:29', '2014-09-22 14:13:29', '', 19, 'http://pwc-int.educacio.intranet/agora/mastersec/?page_id=46', 50, 'page', '', 0),
(48, 1, '2014-09-17 16:56:04', '2014-09-17 16:56:04', ' ', '', '', 'publish', 'open', 'closed', '', '48', '', '', '2016-05-27 10:27:18', '2016-05-27 09:27:18', '', 19, 'http://pwc-int.educacio.intranet/agora/mastersec/?p=48', 6, 'nav_menu_item', '', 0),
(49, 1, '2014-09-17 16:55:55', '2014-09-17 16:55:55', 'Li Europan lingues es membres del sam familie. Lor separat existentie es un myth. Por scientie, musica, sport etc, litot Europa usa li sam vocabular. Li lingues differe solmen in li grammatica, li pronunciation e li plu commun vocabules. Omnicos directe al desirabilite de un nov lingua franca: On refusa continuar payar custosi traductores. At solmen va esser necessi far uniform grammatica, pronunciation e plu sommun paroles. Ma quande lingues coalesce, li grammatica del resultant lingue es plu simplic e regulari quam ti del coalescent lingues.\r\n<ul>\r\n	<li>Li nov lingua franca va esser plu simplic e regulari quam li existent Europan lingues. It va esser tam simplic quam Occidental in fact, it va esser Occidental.</li>\r\n	<li>A un Angleso it va semblar un simplificat Angles, quam un skeptic Cambridge amico dit me que Occidental es. Li Europan lingues es membres del sam familie. Lor separat existentie es un myth. Por scientie, musica, sport etc, litot Europa usa li sam vocabular. Li lingues differe solmen in li grammatica, li pronunciation e li plu commun vocabules.</li>\r\n	<li>Omnicos directe al desirabilite de un nov lingua franca: On refusa continuar payar custosi traductores. At solmen va esser necessi far uniform grammatica, pronunciation e plu sommun paroles.</li>\r\n	<li>Ma quande lingues coalesce, li grammatica del resultant lingue es plu simplic e regulari quam ti del coalescent lingues. Li nov lingua franca va esser plu simplic e regulari quam li existent Europan lingues.</li>\r\n	<li>It va esser tam simplic quam Occidental in fact, it va esser Occidental. A un Angleso it va semblar un simplificat Angles, quam un skeptic Cambridge amico dit me que Occidental es. Li Europan lingues es membres del sam familie. Lor separat existentie es un myth. Por scientie, musica, sport etc, litot Europa usa li sam vocabular. Li lingues differe solmen in li grammatica, li pronunciation</li>\r\n</ul>', 'Normes i funcionament', '', 'publish', 'closed', 'closed', '', 'normes-dorganitzacio-i-funcionament', '', '', '2014-09-22 14:13:29', '2014-09-22 14:13:29', '', 19, 'http://pwc-int.educacio.intranet/agora/mastersec/?page_id=49', 60, 'page', '', 0),
(51, 1, '2014-09-17 16:56:20', '2014-09-17 16:56:20', ' ', '', '', 'publish', 'open', 'closed', '', 'normes-i-funcionament', '', '', '2016-05-27 10:27:18', '2016-05-27 09:27:18', '', 19, 'http://pwc-int.educacio.intranet/agora/mastersec/?p=51', 7, 'nav_menu_item', '', 0),
(52, 1, '2014-09-17 16:58:07', '2014-09-17 16:58:07', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum varius orci eget dui fringilla, et porta velit accumsan. Aenean ullamcorper maximus arcu, vel tempus metus egestas non. Integer sed malesuada elit, sit amet venenatis dui.\r\n<div style="width: 50%; float: left; padding: 2px;">[calendar id="248"]</div>\r\n<div style="width: 50%; float: left; padding: 2px;">[calendar id="224"]</div>', 'Calendari del curs', '', 'publish', 'closed', 'closed', '', 'calendari-del-curs', '', '', '2016-09-21 10:53:23', '2016-09-21 08:53:23', '', 19, 'http://pwc-int.educacio.intranet/agora/mastersec/?page_id=52', 70, 'page', '', 0),
(54, 1, '2014-09-17 16:58:24', '2014-09-17 16:58:24', ' ', '', '', 'publish', 'open', 'closed', '', '54', '', '', '2016-05-27 10:27:18', '2016-05-27 09:27:18', '', 19, 'http://pwc-int.educacio.intranet/agora/mastersec/?p=54', 8, 'nav_menu_item', '', 0),
(55, 1, '2014-09-17 16:59:49', '2014-09-17 16:59:49', 'Li Europan lingues es membres del sam familie. Lor separat existentie es un myth. Por scientie, musica, sport etc, litot Europa usa li sam vocabular. Li lingues differe solmen in li grammatica, li pronunciation e li plu commun vocabules. Omnicos directe al desirabilite de un nov lingua franca: On refusa continuar payar custosi traductores.', 'Horaris', '', 'publish', 'closed', 'closed', '', 'horaris', '', '', '2014-09-22 14:13:29', '2014-09-22 14:13:29', '', 19, 'http://pwc-int.educacio.intranet/agora/mastersec/?page_id=55', 80, 'page', '', 0),
(57, 1, '2014-09-17 17:01:07', '2014-09-17 17:01:07', 'En aquesta secció cada centre pot crear les pàgines necessàries per a descriure el seu projecte educatiu. D''acord amb la <a title="Article 91 LEC" href="http://www20.gencat.cat/portal/site/portaljuridic/menuitem.d15a4e5dfb99396dc366ec10b0c0e1a0/?vgnextoid=b85297b5a87d6210VgnVCM1000000b0c1e0aRCRD&amp;vgnextchannel=b85297b5a87d6210VgnVCM1000000b0c1e0aRCRD&amp;vgnextfmt=default&amp;action=fitxa&amp;portalId=1&amp;documentId=480169&amp;newLang=ca_ES#fragment-1182442" target="_blank">Llei d''Educació de Catalunya</a>, el projecte educatiu incorpora el caràcter propi del centre i ha de contenir com a mínim els elements següents:\r\n<ul>\r\n	<li>Criteris d''ordenació pedagògica, prioritats i plantejaments educatius, procediments d''inclusió i altres actuacions que caracteritzen el centre.</li>\r\n	<li>Indicadors de progrés.</li>\r\n	<li>Concreció i desenvolupament dels currículums.</li>\r\n	<li>Criteris que defineixen l''estructura organitzativa.</li>\r\n	<li>Projecte lingüístic.</li>\r\n	<li>Caràcter propi del centre, si n''hi ha.</li>\r\n</ul>\r\nEs pot incloure també en aquesta secció informació sobre les unitats i serveis especialitzats del centre (USEE, Aula d''Acollida, Aula Oberta, PIM...) així com altres documents que també formen part del projecte educatiu com ara: Projecte de Convivència, Pla d''Acció Tutorial, Pla TAC, Plans d''Acollida, Projecte d''Escola i Família, Comunitats d''Aprenentatge, etc.\r\n\r\nTambé pot ser interessant fer referència a altres projectes i activitats que es duen a terme a l''escola, com ara: Escola verda, Educació per a la salut, Mobilitza''t amb la Informàtica, Pla de reutilització de llibres de text, Programes Erasmus+, Aprenentatge servei, Aprenentatge integrat de Continguts i Llengües Estrangeres (AICLE), Revista de l''institut, Agenda 21...\r\n\r\nDonada la diversitat de seccions possibles, s''ha cregut oportú no crear cap pàgina específica en la maqueta inicial, deixant a criteri del centre la decisió sobre la millor manera d''estructurar la descripció del seu projecte educatiu. En crear els apartats és important que la caixa <em>Atributs de la pàgina</em> tingui com a pare/mare “<em>Projecte educatiu</em>“, i que se seleccioni com a plantilla l''opció “<em>Menú lateral</em>“.', 'Projecte educatiu', '', 'publish', 'closed', 'closed', '', 'projecte-educatiu', '', '', '2014-09-22 14:13:29', '2014-09-22 14:13:29', '', 0, 'http://pwc-int.educacio.intranet/agora/mastersec/?page_id=57', 0, 'page', '', 0),
(59, 1, '2014-09-17 17:01:47', '2014-09-17 17:01:47', ' ', '', '', 'publish', 'open', 'closed', '', '59', '', '', '2016-05-27 10:27:18', '2016-05-27 09:27:18', '', 0, 'http://pwc-int.educacio.intranet/agora/mastersec/?p=59', 10, 'nav_menu_item', '', 0),
(63, 1, '2014-09-18 10:06:31', '2014-09-18 10:06:31', '<p style="color: #444444;">Secció que ha d’informar a les famílies dels serveis que ofereix el centre. La missió educativa no es limita a l’eix curricular, per això és imprescindible que aquest apartat del web estigui en un primer nivell de navegació. És recomanable que s’introdueixi informació relacionada amb:</p>\r\n\r\n<ul style="color: #444444;">\r\n	<li>serveis digitals (en cas que el centre compti amb serveis digitals en línia com ara Moodle, blogs, tutoria o gestió acadèmica, aplicacions mòbils…)</li>\r\n	<li>el menjador escolar</li>\r\n	<li>l’acollida</li>\r\n	<li>el transport escolar</li>\r\n	<li>el casal d’estiu</li>\r\n	<li>les activitats extraescolars</li>\r\n</ul>', 'Serveis', '', 'publish', 'closed', 'closed', '', 'serveis', '', '', '2014-09-22 14:13:29', '2014-09-22 14:13:29', '', 0, 'http://pwc-int.educacio.intranet/agora/mastersec/?page_id=63', 0, 'page', '', 0),
(65, 1, '2014-09-18 10:12:22', '2014-09-18 10:12:22', '<p style="color: #444444;">L’oferta de <strong>serveis digitals</strong> constitueix un element molt important de l’engranatge d’un centre educatiu.</p>\r\n<p style="color: #444444;">En aquesta pàgina es poden referenciar altres serveis en línia que ofereix l’escola com ara Moodle, blocs externs, aplicacions de tutoria o gestió acadèmica, aplicacions mòbils, etc.</p>\r\n<p style="color: #444444;">Si el centre posa en funcionament la <strong>xarxa Nodes</strong>, aquest pot ser un bon lloc per referenciar els principals grups i activitats que s’hi duen a terme.</p>', 'Serveis digitals', '', 'publish', 'closed', 'closed', '', 'serveis-digitals', '', '', '2014-09-22 14:13:29', '2014-09-22 14:13:29', '', 63, 'http://pwc-int.educacio.intranet/agora/mastersec/?page_id=65', 10, 'page', '', 0),
(67, 1, '2014-09-18 10:14:18', '2014-09-18 09:14:18', '<p style="color: #444444;"><span style="color: #444444;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean erat dolor, aliquet vitae ligula suscipit, bibendum malesuada augue. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean erat dolor, aliquet vitae ligula suscipit, bibendum malesuada augue.</span></p>\r\n<p style="color: #444444;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean erat dolor, aliquet vitae ligula suscipit, bibendum malesuada augue. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean erat dolor, aliquet vitae ligula suscipit, bibendum malesuada augue.</p>', 'Acollida', '', 'publish', 'closed', 'closed', '', 'acollida', '', '', '2015-10-27 10:06:32', '2015-10-27 09:06:32', '', 63, 'http://pwc-int.educacio.intranet/agora/mastersec/?page_id=67', 20, 'page', '', 0),
(69, 1, '2014-09-18 10:15:07', '2014-09-18 09:15:07', '<p style="color: #000000;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent sed cursus odio, id tristique justo. Nullam facilisis ultrices diam vitae rutrum. Donec sed tincidunt nunc. Proin condimentum diam at purus porta, sit amet vulputate ligula luctus. Donec cursus ligula et lectus feugiat, quis ultricies nibh molestie. Ut molestie augue augue, quis dignissim velit scelerisque sit amet. Suspendisse orci arcu, pharetra eu ultrices rutrum, gravida nec eros. Nunc laoreet consectetur hendrerit.</p>\r\n<p style="color: #000000;">Nullam porta molestie mi, id euismod tortor accumsan sit amet. Maecenas accumsan nulla sapien, id pretium diam pharetra vitae. Praesent suscipit id leo at suscipit. Nunc dignissim tortor non ligula feugiat, nec pulvinar ligula efficitur. Cras et nulla consequat nibh iaculis mattis. Duis et libero nisi. Praesent pulvinar malesuada ante, at rutrum lectus posuere quis. Phasellus vel pellentesque libero. Phasellus lacus elit, facilisis vitae neque ac, pulvinar convallis arcu. Proin facilisis placerat elit. Fusce a varius odio. Praesent suscipit, augue et porta consectetur, quam risus eleifend nibh, at imperdiet dui orci id tortor. Vestibulum faucibus non est ac eleifend. Fusce vitae ante et nunc interdum dictum. Donec mattis sit amet erat non mollis.</p>', 'Menjador escolar', '', 'publish', 'closed', 'closed', '', 'menjador-escolar', '', '', '2015-10-27 10:06:37', '2015-10-27 09:06:37', '', 63, 'http://pwc-int.educacio.intranet/agora/mastersec/?page_id=69', 20, 'page', '', 0),
(71, 1, '2014-09-18 10:15:50', '2014-09-18 10:15:50', ' ', '', '', 'publish', 'open', 'closed', '', '71', '', '', '2016-05-27 10:27:19', '2016-05-27 09:27:19', '', 63, 'http://pwc-int.educacio.intranet/agora/mastersec/?p=71', 23, 'nav_menu_item', '', 0),
(72, 1, '2014-09-18 10:15:50', '2014-09-18 10:15:50', ' ', '', '', 'publish', 'open', 'closed', '', '72', '', '', '2016-05-27 10:27:19', '2016-05-27 09:27:19', '', 63, 'http://pwc-int.educacio.intranet/agora/mastersec/?p=72', 22, 'nav_menu_item', '', 0),
(73, 1, '2014-09-18 10:15:50', '2014-09-18 10:15:50', ' ', '', '', 'publish', 'open', 'closed', '', '73', '', '', '2016-05-27 10:27:19', '2016-05-27 09:27:19', '', 63, 'http://pwc-int.educacio.intranet/agora/mastersec/?p=73', 20, 'nav_menu_item', '', 0),
(74, 1, '2014-09-18 10:16:18', '2014-09-18 10:16:18', ' ', '', '', 'publish', 'open', 'closed', '', '74', '', '', '2016-05-27 10:27:19', '2016-05-27 09:27:19', '', 0, 'http://pwc-int.educacio.intranet/agora/mastersec/?p=74', 19, 'nav_menu_item', '', 0),
(75, 1, '2014-09-18 10:21:02', '2014-09-18 09:21:02', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent sed cursus odio, id tristique justo. Nullam facilisis ultrices diam vitae rutrum. Donec sed tincidunt nunc. Proin condimentum diam at purus porta, sit amet vulputate ligula luctus. Donec cursus ligula et lectus feugiat, quis ultricies nibh molestie. Ut molestie augue augue, quis dignissim velit scelerisque sit amet. Suspendisse orci arcu, pharetra eu ultrices rutrum, gravida nec eros. Nunc laoreet consectetur hendrerit.\r\n\r\nNullam porta molestie mi, id euismod tortor accumsan sit amet. Maecenas accumsan nulla sapien, id pretium diam pharetra vitae. Praesent suscipit id leo at suscipit. Nunc dignissim tortor non ligula feugiat, nec pulvinar ligula efficitur. Cras et nulla consequat nibh iaculis mattis. Duis et libero nisi. Praesent pulvinar malesuada ante, at rutrum lectus posuere quis. Phasellus vel pellentesque libero. Phasellus lacus elit, facilisis vitae neque ac, pulvinar convallis arcu. Proin facilisis placerat elit. Fusce a varius odio. Praesent suscipit, augue et porta consectetur, quam risus eleifend nibh, at imperdiet dui orci id tortor. Vestibulum faucibus non est ac eleifend. Fusce vitae ante et nunc interdum dictum. Donec mattis sit amet erat non mollis.', 'Activitats extraescolars', '', 'publish', 'closed', 'closed', '', 'activitats-extraescolars', '', '', '2015-10-27 10:06:40', '2015-10-27 09:06:40', '', 63, 'http://pwc-int.educacio.intranet/agora/mastersec/?page_id=75', 40, 'page', '', 0),
(77, 1, '2014-09-18 10:29:25', '2014-09-18 09:29:25', '<p style="color: #000000;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent sed cursus odio, id tristique justo. Nullam facilisis ultrices diam vitae rutrum. Donec sed tincidunt nunc. Proin condimentum diam at purus porta, sit amet vulputate ligula luctus. Donec cursus ligula et lectus feugiat, quis ultricies nibh molestie. Ut molestie augue augue, quis dignissim velit scelerisque sit amet. Suspendisse orci arcu, pharetra eu ultrices rutrum, gravida nec eros. Nunc laoreet consectetur hendrerit.</p>\r\n<p style="color: #000000;">Nullam porta molestie mi, id euismod tortor accumsan sit amet. Maecenas accumsan nulla sapien, id pretium diam pharetra vitae. Praesent suscipit id leo at suscipit. Nunc dignissim tortor non ligula feugiat, nec pulvinar ligula efficitur. Cras et nulla consequat nibh iaculis mattis. Duis et libero nisi. Praesent pulvinar malesuada ante, at rutrum lectus posuere quis. Phasellus vel pellentesque libero. Phasellus lacus elit, facilisis vitae neque ac, pulvinar convallis arcu. Proin facilisis placerat elit. Fusce a varius odio. Praesent suscipit, augue et porta consectetur, quam risus eleifend nibh, at imperdiet dui orci id tortor. Vestibulum faucibus non est ac eleifend. Fusce vitae ante et nunc interdum dictum. Donec mattis sit amet erat non mollis.</p>', 'Transport escolar', '', 'publish', 'closed', 'closed', '', 'transport-escolar', '', '', '2015-10-27 10:06:44', '2015-10-27 09:06:44', '', 63, 'http://pwc-int.educacio.intranet/agora/mastersec/?page_id=77', 50, 'page', '', 0),
(79, 1, '2014-09-18 10:31:24', '2014-09-18 10:31:24', ' ', '', '', 'publish', 'open', 'closed', '', '79', '', '', '2016-05-27 10:27:19', '2016-05-27 09:27:19', '', 63, 'http://pwc-int.educacio.intranet/agora/mastersec/?p=79', 25, 'nav_menu_item', '', 0),
(80, 1, '2014-09-18 10:31:24', '2014-09-18 10:31:24', ' ', '', '', 'publish', 'open', 'closed', '', '80', '', '', '2016-05-27 10:27:19', '2016-05-27 09:27:19', '', 63, 'http://pwc-int.educacio.intranet/agora/mastersec/?p=80', 24, 'nav_menu_item', '', 0),
(81, 1, '2014-09-18 10:38:05', '2014-09-18 10:38:05', 'En els centres d''ensenyament secundari, la secreraria és l''agent de gestió administrativa visible, per tant, és bàsic que la seva presència a la web sigui un dels elements de navegació principals. És important que la informació s''exposi de forma clara, a fi de facilitar la usabilitat de l''espai. La informació d''aquesta secció hauria d''incloure:\r\n<ul>\r\n	<li>Horari d''atenció</li>\r\n	<li>Tràmits (sol·licitud de certificats...)</li>\r\n	<li>Preinscripció i Matrícula</li>\r\n	<li><a href="http://pwc-int.educacio.intranet/agora/mastersec/docs/?bpd_tag=secretaria">Documents</a> (autorització de sortides, ús de serveis digitals, etc.)</li>\r\n	<li>Beques i ajuts</li>\r\n	<li>Proves d''accés als cicles formatius</li>\r\n	<li>etc.</li>\r\n</ul>\r\n&nbsp;', 'Secretaria', '', 'publish', 'closed', 'closed', '', 'secretaria', '', '', '2016-01-21 19:19:59', '2016-01-21 18:19:59', '', 0, 'http://pwc-int.educacio.intranet/agora/mastersec/?page_id=81', 0, 'page', '', 0),
(86, 1, '2014-09-18 10:44:06', '2014-09-18 10:44:06', ' ', '', '', 'publish', 'open', 'closed', '', '86', '', '', '2016-05-27 10:27:19', '2016-05-27 09:27:19', '', 0, 'http://pwc-int.educacio.intranet/agora/mastersec/?p=86', 27, 'nav_menu_item', '', 0),
(88, 1, '2014-09-18 10:45:31', '2014-09-18 10:45:31', '', 'logo-centre', '', 'inherit', 'open', 'open', '', 'logo-centre-2', '', '', '2014-09-18 10:45:31', '2014-09-18 10:45:31', '', 0, 'http://pwc-int.educacio.intranet/agora/mastersec/wp-content/uploads/usu7/2014/09/logo-centre1.png', 0, 'attachment', 'image/png', 0),
(90, 1, '2014-09-18 10:54:10', '2014-09-18 10:54:10', ' ', '', '', 'publish', 'open', 'closed', '', '90', '', '', '2016-05-27 10:27:18', '2016-05-27 09:27:18', '', 0, 'http://pwc-int.educacio.intranet/agora/mastersec/?p=90', 12, 'nav_menu_item', '', 0),
(91, 1, '2014-09-18 10:56:19', '2014-09-18 10:56:19', ' ', '', '', 'publish', 'open', 'closed', '', '91', '', '', '2016-05-27 10:27:19', '2016-05-27 09:27:19', '', 0, 'http://pwc-int.educacio.intranet/agora/mastersec/?p=91', 17, 'nav_menu_item', '', 0),
(92, 1, '2014-09-18 15:02:24', '2014-09-18 15:02:24', ' ', '', '', 'publish', 'open', 'open', '', '92', '', '', '2014-09-18 15:02:24', '2014-09-18 15:02:24', '', 4, 'http://pwc-int.educacio.intranet/agora/mastersec/?p=92', 1, 'nav_menu_item', '', 0),
(93, 1, '2014-09-18 15:02:24', '2014-09-18 15:02:24', ' ', '', '', 'publish', 'open', 'open', '', '93', '', '', '2014-09-18 15:02:24', '2014-09-18 15:02:24', '', 4, 'http://pwc-int.educacio.intranet/agora/mastersec/?p=93', 2, 'nav_menu_item', '', 0),
(94, 1, '2014-09-18 15:02:24', '2014-09-18 15:02:24', ' ', '', '', 'publish', 'open', 'open', '', '94', '', '', '2014-09-18 15:02:24', '2014-09-18 15:02:24', '', 4, 'http://pwc-int.educacio.intranet/agora/mastersec/?p=94', 3, 'nav_menu_item', '', 0),
(95, 1, '2014-09-18 15:02:46', '2014-09-18 15:02:46', ' ', '', '', 'publish', 'open', 'open', '', '95', '', '', '2014-09-18 15:02:46', '2014-09-18 15:02:46', '', 5, 'http://pwc-int.educacio.intranet/agora/mastersec/?p=95', 1, 'nav_menu_item', '', 0),
(96, 1, '2014-09-18 15:02:46', '2014-09-18 15:02:46', ' ', '', '', 'publish', 'open', 'open', '', '96', '', '', '2014-09-18 15:02:46', '2014-09-18 15:02:46', '', 5, 'http://pwc-int.educacio.intranet/agora/mastersec/?p=96', 2, 'nav_menu_item', '', 0),
(97, 1, '2014-09-18 15:02:46', '2014-09-18 15:02:46', ' ', '', '', 'publish', 'open', 'open', '', '97', '', '', '2014-09-18 15:02:46', '2014-09-18 15:02:46', '', 5, 'http://pwc-int.educacio.intranet/agora/mastersec/?p=97', 3, 'nav_menu_item', '', 0),
(98, 1, '2014-09-18 15:03:05', '2014-09-18 15:03:05', ' ', '', '', 'publish', 'open', 'open', '', '98', '', '', '2014-09-18 15:03:05', '2014-09-18 15:03:05', '', 6, 'http://pwc-int.educacio.intranet/agora/mastersec/?p=98', 1, 'nav_menu_item', '', 0),
(99, 1, '2014-09-18 15:03:05', '2014-09-18 15:03:05', ' ', '', '', 'publish', 'open', 'open', '', '99', '', '', '2014-09-18 15:03:05', '2014-09-18 15:03:05', '', 6, 'http://pwc-int.educacio.intranet/agora/mastersec/?p=99', 2, 'nav_menu_item', '', 0),
(100, 1, '2014-09-18 15:03:05', '2014-09-18 15:03:05', ' ', '', '', 'publish', 'open', 'open', '', '100', '', '', '2014-09-18 15:03:05', '2014-09-18 15:03:05', '', 6, 'http://pwc-int.educacio.intranet/agora/mastersec/?p=100', 3, 'nav_menu_item', '', 0),
(101, 1, '2014-09-18 15:03:37', '2014-09-18 15:03:37', ' ', '', '', 'publish', 'open', 'open', '', '101', '', '', '2014-09-18 15:03:37', '2014-09-18 15:03:37', '', 7, 'http://pwc-int.educacio.intranet/agora/mastersec/?p=101', 1, 'nav_menu_item', '', 0),
(102, 1, '2014-09-18 15:03:37', '2014-09-18 15:03:37', ' ', '', '', 'publish', 'open', 'open', '', '102', '', '', '2014-09-18 15:03:37', '2014-09-18 15:03:37', '', 7, 'http://pwc-int.educacio.intranet/agora/mastersec/?p=102', 2, 'nav_menu_item', '', 0),
(103, 1, '2014-09-18 15:03:37', '2014-09-18 15:03:37', ' ', '', '', 'publish', 'open', 'open', '', '103', '', '', '2014-09-18 15:03:37', '2014-09-18 15:03:37', '', 7, 'http://pwc-int.educacio.intranet/agora/mastersec/?p=103', 3, 'nav_menu_item', '', 0),
(107, 1, '2014-09-18 16:34:30', '2014-09-18 16:34:30', '', 'Capçalera', '', 'publish', 'closed', 'closed', '', 'capcalera-2', '', '', '2014-09-22 12:06:07', '2014-09-22 12:06:07', '', 0, 'http://pwc-int.educacio.intranet/agora/mastersec/?post_type=slideshow&#038;p=107', 0, 'slideshow', '', 0),
(109, 1, '2014-09-18 16:42:56', '2014-09-18 16:42:56', 'https://soundcloud.com/institut-sabadell/sophie-message\r\n\r\nUn exemple de fitxer d''àudio disponible directament des de la targeta resum. Dins de l''article, a la caixa "Paràmetres", heu de marcar la casella "Mostra el contingut sencer".', 'Notícia 1', '', 'publish', 'open', 'open', '', 'noticia-1', '', '', '2015-07-28 09:11:41', '2015-07-28 08:11:41', '', 0, 'http://pwc-int.educacio.intranet/agora/mastersec/?p=109', 0, 'post', '', 0),
(112, 1, '2014-09-18 17:16:55', '2014-09-18 17:16:55', 'Node de professorat', 'Professorat', '', 'private', 'closed', 'open', '', 'professorat', '', '', '2014-09-18 17:16:55', '2014-09-18 17:16:55', '', 0, 'http://pwc-int.educacio.intranet/agora/mastersec/forums/forum/professorat', 0, 'forum', '', 0),
(113, 1, '2014-09-18 17:21:02', '2014-09-18 17:21:02', 'Node del Departament de Ciències Naturals', 'Dep. Ciències', '', 'private', 'closed', 'open', '', 'dep-ciencies', '', '', '2014-09-18 17:21:02', '2014-09-18 17:21:02', '', 0, 'http://pwc-int.educacio.intranet/agora/mastersec/forums/forum/dep-ciencies', 0, 'forum', '', 0),
(114, 1, '2014-09-18 17:37:19', '2014-09-18 17:37:19', '', 'aulasec', '', 'inherit', 'open', 'open', '', 'aulasec', '', '', '2014-09-18 17:37:19', '2014-09-18 17:37:19', '', 0, 'http://pwc-int.educacio.intranet/agora/mastersec/wp-content/uploads/usu7/2014/09/aulasec.png', 0, 'attachment', 'image/png', 0),
(115, 1, '2014-09-18 17:40:29', '2014-09-18 17:40:29', 'Node del departament de ciències socials (professorat)', 'Dep. Socials', '', 'private', 'closed', 'open', '', 'dep-socials', '', '', '2014-09-18 17:40:29', '2014-09-18 17:40:29', '', 0, 'http://pwc-int.educacio.intranet/agora/mastersec/forums/forum/dep-socials', 0, 'forum', '', 0),
(120, 1, '2014-09-19 09:24:00', '2014-09-19 09:24:00', '<iframe src="//www.youtube.com/embed/ygwGTiGFGi0?rel=0" width="560" height="315" frameborder="0" allowfullscreen="allowfullscreen"></iframe>\r\n\r\nUn exemple de vídeo disponible directament des de la targeta resum. Dins de l’article, a la caixa “Paràmetres”, heu de marcar la casella “Mostra el contingut sencer”.', 'Notícia 2', '', 'publish', 'open', 'open', '', 'noticia-2', '', '', '2015-07-28 09:40:09', '2015-07-28 08:40:09', '', 0, 'http://pwc-int.educacio.intranet/agora/mastersec/?p=120', 0, 'post', '', 0),
(127, 1, '2014-09-19 10:31:19', '2014-09-19 10:31:19', '[slideshow_deploy id=''148'']\r\n\r\nExemple de Carrusel disponible directament a la targeta resum. Els carrusels permeten incloure imatges, vídeos i textos. Marqueu "Mostra el contingut sencer" a la caixa de "Paràmetres" perquè es mostri directament.', 'Notícia 3', '', 'publish', 'open', 'open', '', 'noticia-3', '', '', '2015-07-28 09:10:40', '2015-07-28 08:10:40', '', 0, 'http://pwc-int.educacio.intranet/agora/mastersec/?p=127', 0, 'post', '', 0),
(129, 1, '2014-09-19 10:37:29', '2014-09-19 10:37:29', '<span style="color: #444444;">Nam semper id ipsum condimentum laoreet. Proin sollicitudin elit ut ligula hendrerit, et hendrerit ante condimentum. Aliquam suscipit feugiat velit, at vehicula lorem pharetra quis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean erat dolor, aliquet vitae ligula suscipit, bibendum malesuada augue.</span>', 'Notícia 4', '', 'publish', 'open', 'open', '', 'noticia-4', '', '', '2014-09-22 16:21:10', '2014-09-22 16:21:10', '', 0, 'http://pwc-int.educacio.intranet/agora/mastersec/?p=129', 0, 'post', '', 0),
(131, 1, '2014-09-19 10:42:18', '2014-09-19 10:42:18', '', 'primersauxilis', '', 'inherit', 'open', 'open', '', 'primersauxilis', '', '', '2014-09-19 10:42:18', '2014-09-19 10:42:18', '', 120, 'http://pwc-int.educacio.intranet/agora/mastersec/wp-content/uploads/usu7/2014/09/primersauxilis.jpg', 0, 'attachment', 'image/jpeg', 0);
INSERT INTO `wp_posts` (`ID`, `post_author`, `post_date`, `post_date_gmt`, `post_content`, `post_title`, `post_excerpt`, `post_status`, `comment_status`, `ping_status`, `post_password`, `post_name`, `to_ping`, `pinged`, `post_modified`, `post_modified_gmt`, `post_content_filtered`, `post_parent`, `guid`, `menu_order`, `post_type`, `post_mime_type`, `comment_count`) VALUES
(134, 1, '2014-09-19 10:45:22', '2014-09-19 10:45:22', '<span style="color: #444444;">Nam semper id ipsum condimentum laoreet. Proin sollicitudin elit ut ligula hendrerit, et hendrerit ante condimentum. Aliquam suscipit feugiat velit, at vehicula lorem pharetra quis. Nam semper id ipsum condimentum laoreet. Proin sollicitudin elit ut ligula hendrerit, et hendrerit ante condimentum. Aliquam suscipit feugiat velit, at vehicula lorem pharetra quis.</span>\r\n\r\n<a href="http://pwc-int.educacio.intranet/agora/mastersec/wp-content/uploads/usu7/bp-attachments/238/Selecció_713.png"><img src="http://pwc-int.educacio.intranet/agora/mastersec/wp-content/uploads/usu7/bp-attachments/238/Selecció_713.png" alt="Selecció_713" width="310" height="126" class="alignnone size-full wp-image-239" /></a>', 'Notícia 5', '', 'publish', 'open', 'open', '', 'noticia-5', '', '', '2015-10-06 16:40:33', '2015-10-06 15:40:33', '', 0, 'http://pwc-int.educacio.intranet/agora/mastersec/?p=134', 0, 'post', '', 0),
(137, 1, '2014-09-19 10:46:03', '2014-09-19 10:46:03', '<span style="color: #444444;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean erat dolor, aliquet vitae ligula suscipit, bibendum malesuada augue. Nam semper id ipsum condimentum laoreet. Proin sollicitudin elit ut ligula hendrerit, et hendrerit ante condimentum. Aliquam suscipit feugiat velit, at vehicula lorem pharetra quis.</span>', 'Notícia 6', '', 'publish', 'open', 'open', '', 'noticia-6', '', '', '2014-09-22 16:23:35', '2014-09-22 16:23:35', '', 0, 'http://pwc-int.educacio.intranet/agora/mastersec/?p=137', 0, 'post', '', 0),
(141, 1, '2014-09-19 11:18:24', '2014-09-19 11:18:24', '', 'cicles', '', 'inherit', 'open', 'open', '', 'cicles', '', '', '2014-09-19 11:18:24', '2014-09-19 11:18:24', '', 129, 'http://pwc-int.educacio.intranet/agora/mastersec/wp-content/uploads/usu7/2014/09/cicles.png', 0, 'attachment', 'image/png', 0),
(143, 1, '2014-09-19 11:29:14', '2014-09-19 11:29:14', ' ', '', '', 'publish', 'open', 'closed', '', '143', '', '', '2016-05-27 10:27:19', '2016-05-27 09:27:19', '', 0, 'http://pwc-int.educacio.intranet/agora/mastersec/?p=143', 18, 'nav_menu_item', '', 0),
(146, 1, '2014-09-19 12:05:27', '2014-09-19 12:05:27', '', 'gimnas', '', 'inherit', 'open', 'open', '', 'gimnas', '', '', '2014-09-19 12:05:27', '2014-09-19 12:05:27', '', 0, 'http://pwc-int.educacio.intranet/agora/mastersec/wp-content/uploads/usu7/2014/09/gimnas.png', 0, 'attachment', 'image/png', 0),
(148, 1, '2014-09-19 12:30:14', '2014-09-19 12:30:14', '', 'Exemple ', '', 'publish', 'closed', 'closed', '', 'exemple', '', '', '2014-09-19 16:08:04', '2014-09-19 16:08:04', '', 0, 'http://pwc-int.educacio.intranet/agora/mastersec/?post_type=slideshow&#038;p=148', 0, 'slideshow', '', 0),
(154, 1, '2014-09-19 14:40:48', '2014-09-19 14:40:48', '', 'Xesc_Arbona', '', 'inherit', 'open', 'open', '', 'xesc_arbona', '', '', '2014-09-19 14:40:48', '2014-09-19 14:40:48', '', 0, 'http://pwc-int.educacio.intranet/agora/mastersec/wp-content/uploads/usu7/2014/09/Xesc_Arbona.png', 0, 'attachment', 'image/png', 0),
(161, 1, '2014-09-19 16:00:03', '2014-09-19 16:00:03', '<iframe src="//player.vimeo.com/video/88231031?title=0&amp;byline=0&amp;portrait=0" width="550" height="310" frameborder="0" allowfullscreen="allowfullscreen"></iframe>', 'Notícia 7 ', '', 'publish', 'open', 'open', '', 'noticia-7', '', '', '2014-09-22 16:22:05', '2014-09-22 16:22:05', '', 0, 'http://pwc-int.educacio.intranet/agora/mastersec/?p=161', 0, 'post', '', 0),
(163, 1, '2014-09-19 16:00:33', '2014-09-19 16:00:33', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean erat dolor, aliquet vitae ligula suscipit, bibendum malesuada augue. Nam semper id ipsum condimentum laoreet. Proin sollicitudin elit ut ligula hendrerit, et hendrerit ante condimentum. Aliquam suscipit feugiat velit, at vehicula lorem pharetra quis.', 'Notícia 8', '', 'publish', 'open', 'open', '', 'noticia-8', '', '', '2015-02-24 12:45:43', '2015-02-24 11:45:43', '', 0, 'http://pwc-int.educacio.intranet/agora/mastersec/?p=163', 0, 'post', '', 0),
(168, 1, '2014-09-19 16:04:34', '2014-09-19 16:04:34', '', 'classe', '', 'inherit', 'open', 'open', '', 'classe', '', '', '2014-09-19 16:04:34', '2014-09-19 16:04:34', '', 134, 'http://pwc-int.educacio.intranet/agora/mastersec/wp-content/uploads/usu7/2014/09/classe.png', 0, 'attachment', 'image/png', 0),
(170, 1, '2014-09-19 16:16:22', '2014-09-19 16:16:22', 'Node del departament de Tecnologia (professorat)', 'Tecnologia', '', 'private', 'closed', 'open', '', 'tecnologia', '', '', '2014-09-19 16:16:22', '2014-09-19 16:16:22', '', 0, 'http://pwc-int.educacio.intranet/agora/mastersec/forums/forum/tecnologia', 0, 'forum', '', 0),
(171, 1, '2014-09-19 16:19:15', '2014-09-19 16:19:15', 'Node del departament de Matemàtiques', 'Dep. Matemàtiques', '', 'private', 'closed', 'open', '', 'dep-matematiques', '', '', '2014-09-19 16:19:15', '2014-09-19 16:19:15', '', 0, 'http://pwc-int.educacio.intranet/agora/mastersec/forums/forum/dep-matematiques', 0, 'forum', '', 0),
(172, 1, '2014-09-19 16:26:36', '2014-09-19 16:26:36', 'Node del departament de Llengua catalana i literatura (professorat)', 'Dep. Català', '', 'private', 'closed', 'open', '', 'dep-catala', '', '', '2014-09-19 16:26:36', '2014-09-19 16:26:36', '', 0, 'http://pwc-int.educacio.intranet/agora/mastersec/forums/forum/dep-catala', 0, 'forum', '', 0),
(173, 1, '2014-09-19 16:29:03', '2014-09-19 16:29:03', 'Node del departament de Llengua castellana i literatura (professorat)', 'Dep. Castellà', '', 'private', 'closed', 'open', '', 'dep-castella', '', '', '2014-09-19 16:29:03', '2014-09-19 16:29:03', '', 0, 'http://pwc-int.educacio.intranet/agora/mastersec/forums/forum/dep-castella', 0, 'forum', '', 0),
(174, 1, '2014-09-19 16:31:22', '2014-09-19 16:31:22', 'Node del departament de Llengües estrangeres (professorat)', 'Dep. Llengües estrangeres', '', 'private', 'closed', 'open', '', 'dep-llengues-estrangeres', '', '', '2014-09-19 16:31:22', '2014-09-19 16:31:22', '', 0, 'http://pwc-int.educacio.intranet/agora/mastersec/forums/forum/dep-llengues-estrangeres', 0, 'forum', '', 0),
(175, 1, '2014-09-19 16:33:32', '2014-09-19 16:33:32', 'Node del departament d&#039;Educació Física (professorat)', 'Dep. Educació Física', '', 'private', 'closed', 'open', '', 'dep-educacio-fisica', '', '', '2014-09-19 16:33:32', '2014-09-19 16:33:32', '', 0, 'http://pwc-int.educacio.intranet/agora/mastersec/forums/forum/dep-educacio-fisica', 0, 'forum', '', 0),
(176, 1, '2014-09-19 16:39:42', '2014-09-19 16:39:42', 'Node del departament de Visual i Plàstica (professorat)', 'Dep. Visual i Plàstica', '', 'private', 'closed', 'open', '', 'dep-visual-i-plastica', '', '', '2014-09-19 16:39:42', '2014-09-19 16:39:42', '', 0, 'http://pwc-int.educacio.intranet/agora/mastersec/forums/forum/dep-visual-i-plastica', 0, 'forum', '', 0),
(177, 1, '2014-09-19 16:45:37', '2014-09-19 16:45:37', 'Node del departament de música (professorat)', 'Dep. Música', '', 'private', 'closed', 'open', '', 'dep-musica', '', '', '2014-09-19 16:45:37', '2014-09-19 16:45:37', '', 0, 'http://pwc-int.educacio.intranet/agora/mastersec/forums/forum/dep-musica', 0, 'forum', '', 0),
(178, 1, '2014-09-19 16:50:06', '2014-09-19 16:50:06', 'Node del departament d&#039;Orientació (professorat)', 'Dep. Orientació', '', 'private', 'closed', 'open', '', 'dep-orientacio', '', '', '2014-09-19 16:50:06', '2014-09-19 16:50:06', '', 0, 'http://pwc-int.educacio.intranet/agora/mastersec/forums/forum/dep-orientacio', 0, 'forum', '', 0),
(179, 1, '2014-09-19 17:00:49', '2014-09-19 17:00:49', 'Node del departament d&#039;Informàtica (professorat)', 'Dep. Informàtica', '', 'private', 'closed', 'open', '', 'dep-informatica', '', '', '2014-09-19 17:00:49', '2014-09-19 17:00:49', '', 0, 'http://pwc-int.educacio.intranet/agora/mastersec/forums/forum/dep-informatica', 0, 'forum', '', 0),
(183, 1, '2014-09-22 10:08:57', '2014-09-22 10:08:57', ' ', '', '', 'publish', 'open', 'closed', '', '183', '', '', '2016-05-27 10:27:19', '2016-05-27 09:27:19', '', 0, 'http://pwc-int.educacio.intranet/agora/mastersec/?p=183', 28, 'nav_menu_item', '', 0),
(184, 1, '2014-09-22 10:13:08', '2014-09-22 10:13:08', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean erat dolor, aliquet vitae ligula suscipit, bibendum malesuada augue. Nam semper id ipsum condimentum laoreet. Proin sollicitudin elit ut ligula hendrerit, et hendrerit ante condimentum.', 'Notícia 9', '', 'publish', 'open', 'open', '', 'noticia-9', '', '', '2015-10-27 10:02:08', '2015-10-27 09:02:08', '', 0, 'http://pwc-int.educacio.intranet/agora/mastersec/?p=184', 0, 'post', '', 0),
(185, 1, '2014-09-22 10:13:06', '2014-09-22 10:13:06', '', 'ampa', '', 'inherit', 'open', 'open', '', 'ampa-2', '', '', '2014-09-22 10:13:06', '2014-09-22 10:13:06', '', 184, 'http://pwc-int.educacio.intranet/agora/mastersec/wp-content/uploads/usu7/2014/09/ampa.png', 0, 'attachment', 'image/png', 0),
(188, 1, '2014-09-22 10:36:20', '2014-09-22 10:36:20', ' ', '', '', 'publish', 'open', 'open', '', '188', '', '', '2014-09-22 10:36:20', '2014-09-22 10:36:20', '', 0, 'http://pwc-int.educacio.intranet/agora/mastersec/?p=188', 6, 'nav_menu_item', '', 0),
(189, 1, '2014-09-22 10:36:20', '2014-09-22 10:36:20', ' ', '', '', 'publish', 'open', 'open', '', '189', '', '', '2014-09-22 10:36:20', '2014-09-22 10:36:20', '', 0, 'http://pwc-int.educacio.intranet/agora/mastersec/?p=189', 7, 'nav_menu_item', '', 0),
(190, 1, '2014-09-22 10:36:20', '2014-09-22 10:36:20', ' ', '', '', 'publish', 'open', 'open', '', '190', '', '', '2014-09-22 10:36:20', '2014-09-22 10:36:20', '', 0, 'http://pwc-int.educacio.intranet/agora/mastersec/?p=190', 1, 'nav_menu_item', '', 0),
(191, 1, '2014-09-22 10:36:20', '2014-09-22 10:36:20', ' ', '', '', 'publish', 'open', 'open', '', '191', '', '', '2014-09-22 10:36:20', '2014-09-22 10:36:20', '', 3, 'http://pwc-int.educacio.intranet/agora/mastersec/?p=191', 2, 'nav_menu_item', '', 0),
(192, 1, '2014-09-22 10:36:20', '2014-09-22 10:36:20', ' ', '', '', 'publish', 'open', 'open', '', '192', '', '', '2014-09-22 10:36:20', '2014-09-22 10:36:20', '', 3, 'http://pwc-int.educacio.intranet/agora/mastersec/?p=192', 3, 'nav_menu_item', '', 0),
(193, 1, '2014-09-22 10:36:20', '2014-09-22 10:36:20', ' ', '', '', 'publish', 'open', 'open', '', '193', '', '', '2014-09-22 10:36:20', '2014-09-22 10:36:20', '', 3, 'http://pwc-int.educacio.intranet/agora/mastersec/?p=193', 4, 'nav_menu_item', '', 0),
(194, 1, '2014-09-22 10:36:20', '2014-09-22 10:36:20', ' ', '', '', 'publish', 'open', 'open', '', '194', '', '', '2014-09-22 10:36:20', '2014-09-22 10:36:20', '', 3, 'http://pwc-int.educacio.intranet/agora/mastersec/?p=194', 5, 'nav_menu_item', '', 0),
(195, 1, '2014-09-22 10:39:39', '2014-09-22 10:39:39', 'A l''espai d''<strong>oferta formativa</strong>, és important incloure la informació específica per a cadascuna de les etapes o cicles educatius que ofereix el centre. En els corresponents nivells es podrà introduir la informació relativa a:\r\n<ul>\r\n	<li>llibres de text i lectures obligatòries</li>\r\n	<li>crèdits</li>\r\n	<li>matèries optatives</li>\r\n	<li>crèdit de síntesi</li>\r\n	<li>treball de recerca</li>\r\n	<li>viatge d''estudis</li>\r\n	<li>exemples d''exàmens</li>\r\n	<li>itineraris universitaris</li>\r\n	<li>pràctiques a empreses (FCT)</li>\r\n	<li>projectes de mobilitat</li>\r\n	<li>mesures flexibilitzadores: servei d''assessorament, servei de reconeixement acadèmic, formació dual,...</li>\r\n	<li>cursos específics i de preparació</li>\r\n</ul>\r\n<p style="color: #444444;">Cadascun dels cicles o etapes educatives té un espai propi, que es crea mitjançant les categories, sense necessitat de crear una "Pàgina" nova. Les categories es defineixen des del menú de les entrades del blog. Paral·lelament als cicles o etapes educatives també es poden definir més categories i, d''aquesta manera afegir pàgines al nivell de navegació d''"Oferta formativa".</p>\r\n\r\n<header class="entry-header" style="color: #444444;">\r\n<h1 class="entry-title" style="font-weight: 400; color: #087eb6;">ESO</h1>\r\n</header>\r\n<div class="entry-content" style="color: #444444;">\r\n<ul>\r\n	<li>llibres de text i lectures obligatòries</li>\r\n	<li>crèdits</li>\r\n	<li>matèries optatives</li>\r\n	<li>sol·licitud afiliació SS</li>\r\n	<li>servei comunitari</li>\r\n	<li>crèdit de síntesi</li>\r\n	<li>treball de recerca</li>\r\n	<li>viatge d’estudis</li>\r\n</ul>\r\n<header class="entry-header">\r\n<h1 class="entry-title" style="font-weight: 400; color: #087eb6;">Batxillerat</h1>\r\n</header>\r\n<div class="entry-content">\r\n<ul>\r\n	<li>llibres de text i lectures obligatòries</li>\r\n	<li>PAU (notes de tall, calendari, ponderacions, exemples exàmens, itineraris universitaris,…)</li>\r\n</ul>\r\n</div>\r\n</div>\r\n<header class="entry-header" style="color: #444444;">\r\n<h1 class="entry-title" style="font-weight: 400; color: #087eb6;">CFGM</h1>\r\n</header>\r\n<div class="entry-content" style="color: #444444;">\r\n<ul>\r\n	<li>pràctiques a empreses (FCT)</li>\r\n	<li>projectes de mobilitat</li>\r\n	<li>mesures flexibilitzadores: servei d’assessorament, servei de reconeixement acadèmic, formació dual,…</li>\r\n</ul>\r\n<header class="entry-header">\r\n<h1 class="entry-title" style="font-weight: 400; color: #087eb6;">CFGS</h1>\r\n</header>\r\n<div class="entry-content">\r\n<ul>\r\n	<li>pràctiques a empreses (FCT)</li>\r\n	<li>projectes de mobilitat</li>\r\n	<li>mesures flexibilitzadores: servei d’assessorament, servei de reconeixement acadèmic, formació dual</li>\r\n</ul>\r\n</div>\r\n</div>', 'Estudis', '', 'publish', 'closed', 'closed', '', 'estudis', '', '', '2015-07-28 09:14:01', '2015-07-28 08:14:01', '', 0, 'http://pwc-int.educacio.intranet/agora/mastersec/?page_id=195', 0, 'page', '', 0),
(197, 1, '2014-09-22 10:40:20', '2014-09-22 10:40:20', ' ', '', '', 'publish', 'open', 'closed', '', '197', '', '', '2016-05-27 10:27:18', '2016-05-27 09:27:18', '', 0, 'http://pwc-int.educacio.intranet/agora/mastersec/?p=197', 11, 'nav_menu_item', '', 0),
(202, 1, '2014-09-22 15:03:12', '2014-09-22 15:03:12', '', 'Destacat Nodes', '', 'publish', 'closed', 'closed', '', 'destacat-nodes', '', '', '2015-10-09 12:57:53', '2015-10-09 11:57:53', '', 0, 'http://pwc-int.educacio.intranet/agora/mastersec/?post_type=slideshow&#038;p=202', 0, 'slideshow', '', 0),
(203, 1, '2014-09-22 14:12:23', '2014-09-22 14:12:23', 'Node dedicat a l&#039;educació emocional', 'Educació emocional', '', 'publish', 'closed', 'open', '', 'educacio-emocional', '', '', '2014-09-22 14:12:23', '2014-09-22 14:12:23', '', 0, 'http://pwc-int.educacio.intranet/agora/mastersec/forums/forum/educacio-emocional', 0, 'forum', '', 0),
(204, 1, '2014-09-22 14:20:24', '2014-09-22 14:20:24', 'Node dels aficionats al cinema', 'Cinema', '', 'publish', 'closed', 'open', '', 'cinema', '', '', '2014-09-22 14:20:24', '2014-09-22 14:20:24', '', 0, 'http://pwc-int.educacio.intranet/agora/mastersec/forums/forum/cinema', 0, 'forum', '', 0),
(205, 1, '2014-09-22 14:31:55', '2014-09-22 14:31:55', 'Node dels aficionats a la fotografia', 'Fotografia', '', 'publish', 'closed', 'open', '', 'fotografia', '', '', '2014-09-22 14:31:55', '2014-09-22 14:31:55', '', 0, 'http://pwc-int.educacio.intranet/agora/mastersec/forums/forum/fotografia', 0, 'forum', '', 0),
(206, 1, '2014-09-22 14:40:28', '2014-09-22 14:40:28', 'Programa Redes sobre l''educació emocional. Molt interessant. Per reflexionar.\n<div style="width: 100%; padding-top: 64%; position: relative; border-bottom: 1px solid #aaa; display: inline-block; background: rgba(255,255,255,0.9);">\n\n<iframe style="width: 100%; height: 90%; position: absolute; left: 0; top: 0; overflow: hidden;" src="http://www.rtve.es/drmn/embed/video/1839588" name="El aprendizaje social y emocional" width="320" height="240" frameborder="0" scrolling="no"></iframe>\n<div style="position: absolute; bottom: 0; left: 0; font-family: arial,helvetica,sans-serif; font-size: 12px; line-height: 1.833; display: inline-block; padding: 5px 0 5px 10px;"><span style="float: left; margin-right: 10px;"><img style="height: 20px; width: auto; background: transparent; padding: 0; margin: 0;" src="http://img.irtve.es/css/rtve.commons/rtve.header.footer/i/logoRTVEes.png" alt="" /></span> <a style="color: #333; font-weight: bold;" title="El aprendizaje social y emocional" href="http://www.rtve.es/alacarta/videos/redes/redes-aprendizaje-social-20130526-2130-169/1839588/"><strong>El aprendizaje social y emocional</strong></a></div>\n</div>', 'Programa Redes sobre educació emocional', '', 'publish', 'closed', 'open', '', 'programa-redes-sobre-educacio-emocional', '', '', '2014-09-22 15:30:57', '2014-09-22 15:30:57', '', 112, 'http://pwc-int.educacio.intranet/agora/mastersec/forums/topic/programa-redes-sobre-educacio-emocional', 0, 'topic', '', 0),
(207, 1, '2014-09-22 14:46:13', '2014-09-22 14:46:13', 'Un dels objectius de la xarxa Nodes és oferir espais perquè els alumnes es pugin expressar fora de l''aula. Pot ser una eina molt útil especialment pels alumnes que no destaquen pels seus resultats acadèmics i que tenen una baixa autoestima derivada d''una indefensió apresa a l''aula.\n\n<iframe src="http://www.youtube.com/embed/OtB6RTJVqPM" height="350" width="425" frameborder="0"></iframe>', 'Indefensió apresa', '', 'publish', 'closed', 'open', '', 'indefensio-apresa', '', '', '2014-09-22 14:46:13', '2014-09-22 14:46:13', '', 112, 'http://pwc-int.educacio.intranet/agora/mastersec/forums/topic/indefensio-apresa', 0, 'topic', '', 0),
(209, 1, '2014-09-22 15:06:43', '2014-09-22 15:06:43', 'Node d&#039;aficionats a la papiroflexia', 'Papiroflexia', '', 'publish', 'closed', 'open', '', 'papiroflexia', '', '', '2014-09-22 15:06:43', '2014-09-22 15:06:43', '', 0, 'http://pwc-int.educacio.intranet/agora/mastersec/forums/forum/papiroflexia', 0, 'forum', '', 0),
(210, 1, '2014-09-22 15:10:09', '2014-09-22 15:10:09', '', 'granota', '', 'inherit', 'open', 'open', '', 'granota', '', '', '2014-09-22 15:10:09', '2014-09-22 15:10:09', '', 0, 'http://pwc-int.educacio.intranet/agora/mastersec/wp-content/uploads/usu7/2014/09/granota.png', 0, 'attachment', 'image/png', 0),
(211, 1, '2014-09-22 15:11:13', '2014-09-22 15:11:13', 'Hola Noders! Qui s''apunta a fer la granota? Aquí teniu les instruccions:\n\n[caption id="" align="alignnone" width="700"]<img src="http://pwc-int.educacio.intranet/agora/mastersec/wp-content/uploads/usu7/2014/09/granota.png" alt="Instruccions Granota" width="700" height="495" /> Instruccions Granota[/caption]', 'Figura n.1: La granota ', '', 'publish', 'closed', 'open', '', 'figura-n-1-la-granota', '', '', '2014-09-22 15:11:13', '2014-09-22 15:11:13', '', 209, 'http://pwc-int.educacio.intranet/agora/mastersec/forums/topic/figura-n-1-la-granota', 0, 'topic', '', 0),
(215, 1, '2014-09-22 16:02:36', '2014-09-22 16:02:36', '', 'screeshot', '', 'inherit', 'open', 'open', '', 'screeshot', '', '', '2014-09-22 16:02:36', '2014-09-22 16:02:36', '', 0, 'http://pwc-int.educacio.intranet/agora/mastersec/wp-content/uploads/usu7/2014/09/screeshot.png', 0, 'attachment', 'image/png', 0),
(216, 1, '2014-09-22 16:54:13', '2014-09-22 16:54:13', 'Molt recomanable:\nhttps://www.youtube.com/watch?v=PQE4WqQSOcQ', 'Documental sobre educació Emocional', '', 'publish', 'closed', 'open', '', 'documental-sobre-educacio-emocional', '', '', '2014-09-22 16:54:13', '2014-09-22 16:54:13', '', 112, 'http://pwc-int.educacio.intranet/agora/mastersec/forums/topic/documental-sobre-educacio-emocional', 0, 'topic', '', 0),
(224, 1, '2014-10-07 05:44:15', '2014-10-07 05:44:15', '<strong>[title]</strong><br />[when]<br />[location]<br /><div>[description]</div><br />[link newwindow="yes"]Més detalls...[/link]', 'Institut L''Arany', '', 'publish', 'closed', 'closed', '', 'institut-larany', '', '', '2016-09-20 11:51:15', '2016-09-20 09:51:15', '', 0, 'http://pwc-int.educacio.intranet/agora/mastersec/gce_feed/institut-larany', 0, 'calendar', '', 0),
(228, 1, '2014-10-23 15:01:21', '2014-10-23 15:01:21', '', 'Xarxa Nodes', '', 'publish', 'open', 'closed', '', 'xarxa-nodes', '', '', '2016-05-27 10:27:19', '2016-05-27 09:27:19', '', 0, 'http://pwc-int.educacio.intranet/agora/mastersec/?p=228', 26, 'nav_menu_item', '', 0),
(229, 1, '2014-10-23 15:02:40', '2014-10-23 15:02:40', '', 'Documents', '', 'publish', 'open', 'closed', '', 'documents', '', '', '2016-05-27 10:27:19', '2016-05-27 09:27:19', '', 0, 'http://pwc-int.educacio.intranet/agora/mastersec/?p=229', 21, 'nav_menu_item', '', 0),
(234, 1, '2014-10-23 15:10:34', '2014-10-23 15:10:34', '', 'Exemple', '', 'inherit', 'open', 'open', '', 'exemple-2', '', '', '2014-10-23 15:10:34', '2014-10-23 15:10:34', '', 0, 'http://pwc-int.educacio.intranet/agora/mastersec/wp-content/uploads/usu7/bp-attachments/233/Exemple.docx', 0, 'attachment', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 0),
(239, 1, '2014-10-23 15:44:32', '2014-10-23 15:44:32', '', 'Selecció_713', '', 'inherit', 'open', 'open', '', 'seleccio_713', '', '', '2014-10-23 15:44:32', '2014-10-23 15:44:32', '', 0, 'http://pwc-int.educacio.intranet/agora/mastersec/wp-content/uploads/usu7/bp-attachments/238/Selecció_713.png', 0, 'attachment', 'image/png', 0),
(244, 1, '2014-12-01 12:39:12', '2014-12-01 11:39:12', ' ', '', '', 'publish', 'open', 'closed', '', '244', '', '', '2016-05-27 10:27:19', '2016-05-27 09:27:19', '', 3, 'http://pwc-int.educacio.intranet/agora/mastersec/?p=244', 13, 'nav_menu_item', '', 0),
(245, 1, '2014-12-01 12:39:12', '2014-12-01 11:39:12', ' ', '', '', 'publish', 'open', 'closed', '', '245', '', '', '2016-05-27 10:27:19', '2016-05-27 09:27:19', '', 3, 'http://pwc-int.educacio.intranet/agora/mastersec/?p=245', 14, 'nav_menu_item', '', 0),
(246, 1, '2014-12-01 12:39:12', '2014-12-01 11:39:12', ' ', '', '', 'publish', 'open', 'closed', '', '246', '', '', '2016-05-27 10:27:19', '2016-05-27 09:27:19', '', 3, 'http://pwc-int.educacio.intranet/agora/mastersec/?p=246', 15, 'nav_menu_item', '', 0),
(247, 1, '2014-12-01 12:39:12', '2014-12-01 11:39:12', ' ', '', '', 'publish', 'open', 'closed', '', '247', '', '', '2016-05-27 10:27:19', '2016-05-27 09:27:19', '', 3, 'http://pwc-int.educacio.intranet/agora/mastersec/?p=247', 16, 'nav_menu_item', '', 0),
(248, 1, '2015-01-23 12:14:15', '2015-01-23 11:14:15', '<strong>[title]</strong><br />[when]<br />[location]<br /><div>[description]</div><br />[link newwindow="yes"]Més detalls...[/link]', 'Agenda d''exemple', '', 'publish', 'closed', 'closed', '', 'agenda-dexemple', '', '', '2016-09-20 11:51:15', '2016-09-20 09:51:15', '', 0, 'http://pwc-int.educacio.intranet/agora/mastersec/?post_type=gce_feed&#038;p=248', 0, 'calendar', '', 0),
(249, 1, '2015-01-23 12:20:56', '2015-01-23 11:20:56', '', 'Document 1', '', 'publish', 'open', 'open', '', 'document-1', '', '', '2015-01-23 12:20:56', '2015-01-23 11:20:56', '', 0, 'http://pwc-int.educacio.intranet/agora/mastersec/?p=249', 1, 'nav_menu_item', '', 0),
(250, 1, '2015-01-23 12:20:56', '2015-01-23 11:20:56', '', 'Document 2', '', 'publish', 'open', 'open', '', 'document-2', '', '', '2015-01-23 12:20:56', '2015-01-23 11:20:56', '', 0, 'http://pwc-int.educacio.intranet/agora/mastersec/?p=250', 2, 'nav_menu_item', '', 0),
(251, 1, '2015-01-23 12:20:56', '2015-01-23 11:20:56', '', 'Aplicació 1', '', 'publish', 'open', 'open', '', 'aplicacio-1', '', '', '2015-01-23 12:20:56', '2015-01-23 11:20:56', '', 0, 'http://pwc-int.educacio.intranet/agora/mastersec/?p=251', 3, 'nav_menu_item', '', 0),
(252, 1, '2015-01-23 12:20:56', '2015-01-23 11:20:56', '', 'Web 1', '', 'publish', 'open', 'open', '', 'web-1', '', '', '2015-01-23 12:20:56', '2015-01-23 11:20:56', '', 0, 'http://pwc-int.educacio.intranet/agora/mastersec/?p=252', 5, 'nav_menu_item', '', 0),
(253, 1, '2015-01-23 12:20:56', '2015-01-23 11:20:56', '', 'Aplicació 2', '', 'publish', 'open', 'open', '', 'aplicacio-2', '', '', '2015-01-23 12:20:56', '2015-01-23 11:20:56', '', 0, 'http://pwc-int.educacio.intranet/agora/mastersec/?p=253', 4, 'nav_menu_item', '', 0),
(254, 1, '2015-01-23 12:20:56', '2015-01-23 11:20:56', '', 'Web 2', '', 'publish', 'open', 'open', '', 'web-2', '', '', '2015-01-23 12:20:56', '2015-01-23 11:20:56', '', 0, 'http://pwc-int.educacio.intranet/agora/mastersec/?p=254', 6, 'nav_menu_item', '', 0),
(255, 1, '2015-01-23 12:50:03', '2015-01-23 11:50:03', '', 'foto-classe', '', 'inherit', 'open', 'open', '', 'foto-classe', '', '', '2015-01-23 12:50:03', '2015-01-23 11:50:03', '', 0, 'http://pwc-int.educacio.intranet/agora/mastersec/wp-content/uploads/usu7/2015/01/foto-classe.png', 0, 'attachment', 'image/png', 0),
(289, 1, '2015-10-09 13:38:33', '2015-10-09 12:38:33', '', 'Mur general', '', 'publish', 'open', 'open', '', '289', '', '', '2015-10-09 13:39:09', '2015-10-09 12:39:09', '', 0, 'http://pwc-int.educacio.intranet/agora/mastersec/?p=289', 1, 'nav_menu_item', '', 0),
(290, 1, '2015-10-09 13:38:33', '2015-10-09 12:38:33', ' ', '', '', 'publish', 'open', 'open', '', '290', '', '', '2015-10-09 13:39:09', '2015-10-09 12:39:09', '', 0, 'http://pwc-int.educacio.intranet/agora/mastersec/?p=290', 3, 'nav_menu_item', '', 0),
(291, 1, '2015-10-09 13:38:33', '2015-10-09 12:38:33', ' ', '', '', 'publish', 'open', 'open', '', '291', '', '', '2015-10-09 13:39:09', '2015-10-09 12:39:09', '', 0, 'http://pwc-int.educacio.intranet/agora/mastersec/?p=291', 2, 'nav_menu_item', '', 0),
(292, 1, '2016-01-21 09:53:14', '2016-01-21 08:53:14', 'Autorització relativa als alumnes: ús d''imatges, publicació de dades de caràcter personal i de material que elaboren (menors de 14 anys)\r\n\r\n<a href="http://xtec.cat/monografics/nodes/links.html?id=imatge_menors_14" target="_blank">Enllaç al document</a>', 'Autorització drets d’imatge, dades i materials (menors de 14 anys)', '', 'publish', 'open', 'open', '', 'autoritzacio-drets-dimatge-dades-i-materials-menors-de-14-anys', '', '', '2016-01-21 19:17:00', '2016-01-21 18:17:00', '', 0, 'http://pwc-int.educacio.intranet/agora/mastersec/docs/', 0, 'bp_doc', '', 0),
(295, 1, '2016-01-21 09:55:49', '2016-01-21 08:55:49', 'Autorització relativa als alumnes: ús d’imatges, publicació de dades de caràcter personal i de material que elaboren (majors de 14 anys)\r\n\r\n<a href="http://xtec.cat/monografics/nodes/links.html?id=imatge_majors_14">Enllaç al document</a>', 'Autorització drets d’imatge, dades i materials (majors de 14 anys)', '', 'publish', 'open', 'open', '', 'autoritzacio-drets-dimatge-dades-i-materials-majors-de-14-anys', '', '', '2016-01-21 19:17:00', '2016-01-21 18:17:00', '', 0, 'http://pwc-int.educacio.intranet/agora/mastersec/docs/', 0, 'bp_doc', '', 0),
(297, 1, '2016-01-21 09:59:27', '2016-01-21 08:59:27', 'Autorització relativa als alumnes de menys de 14 anys: ús de serveis i recursos digitals per treballar a l''aula.\r\n\r\n<a href="http://xtec.cat/monografics/nodes/links.html?id=serveis_menors_14">Enllaç al document</a>', 'Autorització ús de serveis i recursos digitals a l''aula (menors de 14 anys)', '', 'publish', 'open', 'open', '', 'autoritzacio-us-de-serveis-i-recursos-digitals-a-laula-menors-de-14-anys', '', '', '2016-01-21 19:17:00', '2016-01-21 18:17:00', '', 0, 'http://pwc-int.educacio.intranet/agora/mastersec/docs/', 0, 'bp_doc', '', 0),
(300, 1, '2016-01-21 10:03:28', '2016-01-21 09:03:28', 'Autorització relativa als alumnes de majors de 14 anys <strong>però menors d''edat</strong>: ús de serveis i recursos digitals per treballar a l’aula.\r\n\r\n<a href="http://xtec.cat/monografics/nodes/links.html?id=serveis_majors_14" target="_blank">Enllaç al document</a>', 'Autorització ús de serveis i recursos digitals a l’aula (majors de 14 anys)', '', 'publish', 'open', 'open', '', 'autoritzacio-us-de-serveis-i-recursos-digitals-a-laula-majors-de-14-anys', '', '', '2016-01-21 19:17:00', '2016-01-21 18:17:00', '', 0, 'http://pwc-int.educacio.intranet/agora/mastersec/docs/', 0, 'bp_doc', '', 0),
(302, 1, '2016-01-21 10:07:15', '2016-01-21 09:07:15', '<a href="http://xtec.cat/monografics/nodes/links.html?id=paracetamol" target="_blank">Enllaç al document</a>', 'Autorització per a l’administració del paracetamol', '', 'publish', 'open', 'open', '', 'autoritzacio-per-a-ladministracio-del-paracetamol', '', '', '2016-01-21 19:17:00', '2016-01-21 18:17:00', '', 0, 'http://pwc-int.educacio.intranet/agora/mastersec/docs/', 0, 'bp_doc', '', 0),
(304, 1, '2016-01-21 10:13:32', '2016-01-21 09:13:32', 'Declaració responsable justificativa d’absència per motius de salut d’assistència a consulta mèdica. Personal docent.\r\n\r\n<a href="http://xtec.cat/monografics/nodes/links.html?id=consulta_metge" target="_blank">Enllaç al document</a>', 'Justificant d’absència per motius de salut o consulta mèdica', '', 'publish', 'open', 'open', '', 'justificant-dabsencia-per-motius-de-salut-o-consulta-medica', '', '', '2016-01-21 10:24:39', '2016-01-21 09:24:39', '', 0, 'http://pwc-int.educacio.intranet/agora/mastersec/docs/', 0, 'bp_doc', '', 0),
(307, 1, '2016-01-21 11:48:31', '2016-01-21 10:48:31', 'Sol·licitud de cursar matèries de batxillerat a l’Institut Obert de Catalunya.\r\n\r\n<a href="http://xtec.cat/monografics/nodes/links.html?id=ioc" target="_blank">Enllaç al document</a>', 'Sol·licitud de cursar matèries de batxillerat a IOC', '', 'publish', 'open', 'open', '', 'sol%c2%b7licitud-de-cursar-materies-de-batxillerat-a-ioc', '', '', '2016-01-21 19:17:47', '2016-01-21 18:17:47', '', 0, 'http://pwc-int.educacio.intranet/agora/mastersec/docs/', 0, 'bp_doc', '', 0),
(308, 1, '2016-01-21 10:22:39', '2016-01-21 09:22:39', '<ul>\r\n	<li>Llicència per estudis (sense retribució). Màxim: un curs escolar</li>\r\n	<li>Llicència per assumptes propis</li>\r\n	<li>Llicència per accident laboral</li>\r\n	<li>Llicència per incapacitat temporal per malaltia comuna i risc durant l’embaràs</li>\r\n</ul>\r\n<a href="http://xtec.cat/monografics/nodes/links.html?id=llicencia" target="_blank">Enllaç al document</a>\r\n\r\n&nbsp;', 'Sol·licitud de llicència', '', 'publish', 'open', 'open', '', 'sol%c2%b7licitud-de-llicencia', '', '', '2016-01-21 10:24:26', '2016-01-21 09:24:26', '', 0, 'http://pwc-int.educacio.intranet/agora/mastersec/docs/', 0, 'bp_doc', '', 0),
(312, 1, '2016-01-21 10:26:50', '2016-01-21 09:26:50', '<a href="http://xtec.cat/monografics/nodes/links.html?id=jurada_permisos_llicencies" target="_blank">Enllaç al document</a>', 'Declaració jurada o promesa per sol·licitar permisos i llicències', '', 'publish', 'open', 'open', '', 'declaracio-jurada-o-promesa-per-sol%c2%b7licitar-permisos-i-llicencies', '', '', '2016-01-21 10:26:50', '2016-01-21 09:26:50', '', 0, 'http://pwc-int.educacio.intranet/agora/mastersec/docs/', 0, 'bp_doc', '', 0),
(314, 1, '2016-01-21 10:30:24', '2016-01-21 09:30:24', '<a href="http://xtec.cat/monografics/nodes/links.html?id=reduccio_cura_fills" target="_blank">Enllaç al document</a>', 'Sol·licitud de reducció de jornada per tenir cura d’un fill o filla', '', 'publish', 'open', 'open', '', 'sol%c2%b7licitud-de-reduccio-de-jornada-per-tenir-cura-dun-fill-o-filla', '', '', '2016-01-21 10:30:25', '2016-01-21 09:30:25', '', 0, 'http://pwc-int.educacio.intranet/agora/mastersec/docs/', 0, 'bp_doc', '', 0),
(317, 1, '2016-01-21 12:14:13', '2016-01-21 11:14:13', 'Sol·licitud de compatibilitat per a activitats públiques i/o privades\r\n<a style="line-height: 1.5;" href="http://xtec.cat/monografics/nodes/links.html?id=compatibilitat" target="_blank">Enllaç al document</a>', 'Sol·licitud de Compatibilitat', '', 'publish', 'open', 'open', '', 'sol%c2%b7licitud-de-compatibilitat', '', '', '2016-01-21 14:06:04', '2016-01-21 13:06:04', '', 0, 'http://pwc-int.educacio.intranet/agora/mastersec/docs/', 0, 'bp_doc', '', 0),
(318, 1, '2016-01-21 12:08:22', '2016-01-21 11:08:22', '<a href="http://xtec.cat/monografics/nodes/links.html?id=triennis" target="_blank">Enllaç al document</a>', 'Sol·licitud de reconeixement de triennis', '', 'publish', 'open', 'open', '', 'sol%c2%b7licitud-de-reconeixement-de-triennis', '', '', '2016-01-21 12:08:22', '2016-01-21 11:08:22', '', 0, 'http://pwc-int.educacio.intranet/agora/mastersec/docs/', 0, 'bp_doc', '', 0),
(320, 1, '2016-01-21 12:11:38', '2016-01-21 11:11:38', 'Sol·licitud de reconeixement d’estadi de promoció docent\r\n\r\n<a href="http://xtec.cat/monografics/nodes/links.html?id=promocio">Enllaç al document</a>', 'Sol·licitud de reconeixement d’estadi de promoció docent', '', 'publish', 'open', 'open', '', 'sol%c2%b7licitud-de-reconeixement-destadi-de-promocio-docent', '', '', '2016-01-21 12:11:39', '2016-01-21 11:11:39', '', 0, 'http://pwc-int.educacio.intranet/agora/mastersec/docs/', 0, 'bp_doc', '', 0),
(323, 1, '2016-01-21 12:17:45', '2016-01-21 11:17:45', '<ul>\r\n	<li>Ordre del dia</li>\r\n	<li>Desenvolupament de la sessió</li>\r\n	<li>Acords</li>\r\n	<li>Temes pendents</li>\r\n</ul>\r\n<a href="http://xtec.cat/monografics/nodes/links.html?id=acta_reunio" target="_blank">Enllaç al document</a>', 'Model d’acta de reunió', '', 'publish', 'open', 'open', '', 'model-dacta-de-reunio', '', '', '2016-01-21 15:01:02', '2016-01-21 14:01:02', '', 0, 'http://pwc-int.educacio.intranet/agora/mastersec/docs/', 0, 'bp_doc', '', 0),
(326, 1, '2016-01-21 12:20:11', '2016-01-21 11:20:11', '<a href="http://xtec.cat/monografics/nodes/links.html?id=declaracio_jurada" target="_blank">Enllaç al document</a>', 'Declaració jurada', '', 'publish', 'open', 'open', '', 'declaracio-jurada', '', '', '2016-01-21 12:20:11', '2016-01-21 11:20:11', '', 0, 'http://pwc-int.educacio.intranet/agora/mastersec/docs/', 0, 'bp_doc', '', 0),
(328, 1, '2016-01-21 12:22:12', '2016-01-21 11:22:12', '<a href="http://xtec.cat/monografics/nodes/links.html?id=solicitud" target="_blank">Enllaç al document</a>', 'Sol·licitud (genèrica)', '', 'publish', 'open', 'open', '', 'sol%c2%b7licitud-generica', '', '', '2016-01-21 12:22:34', '2016-01-21 11:22:34', '', 0, 'http://pwc-int.educacio.intranet/agora/mastersec/docs/', 0, 'bp_doc', '', 0),
(330, 1, '2016-01-21 12:23:59', '2016-01-21 11:23:59', 'Model de certificat\r\n\r\n<a href="http://xtec.cat/monografics/nodes/links.html?id=certificat" target="_blank">Enllaç al document</a>', 'Certificat', '', 'publish', 'open', 'open', '', 'certificat', '', '', '2016-01-21 12:23:59', '2016-01-21 11:23:59', '', 0, 'http://pwc-int.educacio.intranet/agora/mastersec/docs/', 0, 'bp_doc', '', 0),
(332, 1, '2016-01-21 12:25:21', '2016-01-21 11:25:21', '<a href="http://xtec.cat/monografics/nodes/links.html?id=reunio_ordinaria" target="_blank">Enllaç al document</a>', 'Model de Reunió ordinaria', '', 'publish', 'open', 'open', '', 'model-de-reunio-ordinaria', '', '', '2016-01-21 12:25:21', '2016-01-21 11:25:21', '', 0, 'http://pwc-int.educacio.intranet/agora/mastersec/docs/', 0, 'bp_doc', '', 0),
(334, 1, '2016-01-21 12:32:44', '2016-01-21 11:32:44', 'Model reunió extraordinària\r\n\r\n<a href="http://xtec.cat/monografics/nodes/links.html?id=reunio_extraordinaria" target="_blank">Enllaç al document</a>', 'Reunió extraordinària', '', 'publish', 'open', 'open', '', 'reunio-extraordinaria', '', '', '2016-01-21 12:32:44', '2016-01-21 11:32:44', '', 0, 'http://pwc-int.educacio.intranet/agora/mastersec/docs/', 0, 'bp_doc', '', 0),
(336, 1, '2016-01-21 13:05:40', '2016-01-21 12:05:40', 'Sol·licitud de control de glucosa als alumnes amb diabetis i autorització de l’administració d’insulina\r\n\r\n<a href="http://xtec.cat/monografics/nodes/links.html?id=control_diabetes" target="_blank">Enllaç al document</a>', 'Sol·licitud de control de glucosa i administració d’insulina', '', 'publish', 'open', 'open', '', 'sol%c2%b7licitud-de-control-de-glucosa-i-administracio-dinsulina', '', '', '2016-01-21 19:17:47', '2016-01-21 18:17:47', '', 0, 'http://pwc-int.educacio.intranet/agora/mastersec/docs/', 0, 'bp_doc', '', 0),
(338, 1, '2016-01-21 13:08:02', '2016-01-21 12:08:02', '<a href="http://xtec.cat/monografics/nodes/links.html?id=administracio_insulina" target="_blank">Enllaç al document</a>', 'Sol·licitud i autorització d’administració de glucagó als alumnes amb diabetis', '', 'publish', 'open', 'open', '', 'sol%c2%b7licitud-i-autoritzacio-dadministracio-de-glucago-als-alumnes-amb-diabetis', '', '', '2016-01-21 19:18:08', '2016-01-21 18:18:08', '', 0, 'http://pwc-int.educacio.intranet/agora/mastersec/docs/', 0, 'bp_doc', '', 0),
(339, 1, '2016-01-21 13:08:37', '2016-01-21 12:08:37', '<a href="http://xtec.cat/monografics/nodes/links.html?id=orientacions_compromis" target="_blank">Enllaç al document</a>', 'Orientacions per elaborar la carta de compromís', '', 'publish', 'open', 'open', '', 'orientacions-per-elaborar-la-carta-de-compromis', '', '', '2016-01-21 19:13:50', '2016-01-21 18:13:50', '', 0, 'http://pwc-int.educacio.intranet/agora/mastersec/docs/', 0, 'bp_doc', '', 0),
(343, 1, '2016-01-21 13:12:09', '2016-01-21 12:12:09', '<a href="http://xtec.cat/monografics/nodes/links.html?id=curriculum_eso" target="_blank">Enllaç al document</a>', 'Desenvolupament del currículum de l''ESO', '', 'publish', 'open', 'open', '', 'desenvolupament-del-curriculum-de-leso', '', '', '2016-01-21 13:12:10', '2016-01-21 12:12:10', '', 0, 'http://pwc-int.educacio.intranet/agora/mastersec/docs/', 0, 'bp_doc', '', 0),
(346, 1, '2016-01-21 13:14:03', '2016-01-21 12:14:03', '<a href="http://xtec.cat/monografics/nodes/links.html?id=curriculum_batxillerat" target="_blank">Enllaç al document</a>', 'Desenvolupament del currículum de Batxillerat', '', 'publish', 'open', 'open', '', 'desenvolupament-del-curriculum-de-batxillerat', '', '', '2016-01-21 13:14:03', '2016-01-21 12:14:03', '', 0, 'http://pwc-int.educacio.intranet/agora/mastersec/docs/', 0, 'bp_doc', '', 0),
(348, 1, '2016-01-21 13:15:18', '2016-01-21 12:15:18', '<a href="http://xtec.cat/monografics/nodes/links.html?id=programacions_recursos" target="_blank">Enllaç al document</a>', 'Programacions i recursos didàctics', '', 'publish', 'open', 'open', '', 'programacions-i-recursos-didactics', '', '', '2016-01-21 13:15:18', '2016-01-21 12:15:18', '', 0, 'http://pwc-int.educacio.intranet/agora/mastersec/docs/', 0, 'bp_doc', '', 0),
(350, 1, '2016-01-21 13:16:21', '2016-01-21 12:16:21', '<a href="http://xtec.cat/monografics/nodes/links.html?id=convivencia" target="_blank">Enllaç al document</a>', 'Convivència i clima escolar', '', 'publish', 'open', 'open', '', 'convivencia-i-clima-escolar', '', '', '2016-01-21 13:16:22', '2016-01-21 12:16:22', '', 0, 'http://pwc-int.educacio.intranet/agora/mastersec/docs/', 0, 'bp_doc', '', 0),
(352, 1, '2016-01-21 13:17:24', '2016-01-21 12:17:24', '<a href="http://xtec.cat/monografics/nodes/links.html?id=docs_gestio" target="_blank">Enllaç al document</a>', 'Documents de gestió de centre', '', 'publish', 'open', 'open', '', 'documents-de-gestio-de-centre', '', '', '2016-01-21 13:17:24', '2016-01-21 12:17:24', '', 0, 'http://pwc-int.educacio.intranet/agora/mastersec/docs/', 0, 'bp_doc', '', 0),
(354, 1, '2016-01-21 13:18:28', '2016-01-21 12:18:28', 'Documents per a l''organització i la gestió dels centres\r\n\r\n<a href="http://xtec.cat/monografics/nodes/links.html?id=docs_tac" target="_blank">Enllaç al document</a>', 'Tecnologies per a l’aprenentatge i el coneixement', '', 'publish', 'open', 'open', '', 'tecnologies-per-a-laprenentatge-i-el-coneixement', '', '', '2016-01-21 16:35:06', '2016-01-21 15:35:06', '', 387, 'http://pwc-int.educacio.intranet/agora/mastersec/docs/', 0, 'bp_doc', '', 0),
(356, 1, '2016-01-21 13:19:20', '2016-01-21 12:19:20', '<a href="http://xtec.cat/monografics/nodes/links.html?id=innovacio" target="_blank">Enllaç al document</a>', 'Innovació pedagògica', '', 'publish', 'open', 'open', '', 'innovacio-pedagogica', '', '', '2016-01-21 16:34:04', '2016-01-21 15:34:04', '', 387, 'http://pwc-int.educacio.intranet/agora/mastersec/docs/', 0, 'bp_doc', '', 0),
(358, 1, '2016-01-21 13:20:28', '2016-01-21 12:20:28', 'Objectius prioritaris del sistema educatiu i projecte educatiu de centre\r\n\r\n<a href="http://xtec.cat/monografics/nodes/links.html?id=objectius_prioritaris" target="_blank">Enllaç al document</a>', 'Orientacions projecte educatiu de centre', '', 'publish', 'open', 'open', '', 'projecte-educatiu-de-centre', '', '', '2016-01-21 16:34:33', '2016-01-21 15:34:33', '', 387, 'http://pwc-int.educacio.intranet/agora/mastersec/docs/', 0, 'bp_doc', '', 0),
(360, 1, '2016-01-21 13:21:29', '2016-01-21 12:21:29', '<a href="http://xtec.cat/monografics/nodes/links.html?id=participacio_comunitat" target="_blank">Enllaç al document</a>', 'Participació de la comunitat educativa', '', 'publish', 'open', 'open', '', 'participacio-de-la-comunitat-educativa', '', '', '2016-01-21 16:33:12', '2016-01-21 15:33:12', '', 387, 'http://pwc-int.educacio.intranet/agora/mastersec/docs/', 0, 'bp_doc', '', 0),
(362, 1, '2016-01-21 13:22:40', '2016-01-21 12:22:40', '<a href="http://xtec.cat/monografics/nodes/links.html?id=projecte_llinguistic" target="_blank">Enllaç al document</a>', 'El projecte lingüístic', '', 'publish', 'open', 'open', '', 'el-projecte-linguistic', '', '', '2016-01-21 13:22:40', '2016-01-21 12:22:40', '', 0, 'http://pwc-int.educacio.intranet/agora/mastersec/docs/', 0, 'bp_doc', '', 0),
(364, 1, '2016-01-21 13:23:43', '2016-01-21 12:23:43', '<a href="http://xtec.cat/monografics/nodes/links.html?id=avaluacio_centre" target="_blank">Enllaç al document</a>', 'Avaluació de centre', '', 'publish', 'open', 'open', '', 'avaluacio-de-centre', '', '', '2016-01-21 16:34:51', '2016-01-21 15:34:51', '', 387, 'http://pwc-int.educacio.intranet/agora/mastersec/docs/', 0, 'bp_doc', '', 0),
(366, 1, '2016-01-21 13:55:35', '2016-01-21 12:55:35', '<a href="http://xtec.cat/monografics/nodes/links.html?id=doc_centre" target="_blank">Enllaç al document</a>', 'Document genèric de centre', '', 'publish', 'open', 'open', '', 'document-generic-de-centre', '', '', '2016-01-21 13:55:36', '2016-01-21 12:55:36', '', 0, 'http://pwc-int.educacio.intranet/agora/mastersec/docs/', 0, 'bp_doc', '', 0),
(368, 1, '2016-01-21 14:02:19', '2016-01-21 13:02:19', '<a href="http://xtec.cat/monografics/nodes/links.html?id=solicitut_titol" target="_blank">Enllaç al document</a>', 'Sol·licitud de títol acadèmic i professional no universitari', '', 'publish', 'open', 'open', '', 'sol%c2%b7licitud-de-titol-academic-i-professional-no-universitari', '', '', '2016-01-21 19:18:07', '2016-01-21 18:18:07', '', 0, 'http://pwc-int.educacio.intranet/agora/mastersec/docs/', 0, 'bp_doc', '', 0),
(370, 1, '2016-01-21 14:04:12', '2016-01-21 13:04:12', '<a href="http://xtec.cat/monografics/nodes/links.html?id=duplicat_titol" target="_blank">Enllaç al document</a>', 'Sol·licitud de duplicat de títol acadèmic i professional no universitari', '', 'publish', 'open', 'open', '', 'sol%c2%b7licitud-de-duplicat-de-titol-academic-i-professional-no-universitari', '', '', '2016-01-21 19:17:47', '2016-01-21 18:17:47', '', 0, 'http://pwc-int.educacio.intranet/agora/mastersec/docs/', 0, 'bp_doc', '', 0),
(379, 1, '2016-01-21 16:13:07', '2016-01-21 15:13:07', '<a href="http://xtec.cat/monografics/nodes/links.html?id=docs_administratius" target="_blank">Pàgina de referència</a> del portal de centres (Departament d''Ensenyament)\r\nRequereix validació amb usuari XTEC.\r\n<div class="elemento">\r\n<h4></h4>\r\n<div style="text-align: justify;">\r\n\r\nIndex dels documents que trobareu, de cada document administratiu, plantilles, esquemes, exemples, l''explicació de la seva estructura i la legislació que cal aplicar-hi.\r\n\r\n</div>\r\n</div>\r\n<div class="elistado">\r\n<h3></h3>\r\n<strong>Acta de reunió</strong> Document mitjançant el qual es deixa constància de les incidències, les deliberacions i els acords d’un òrgan col·legiat.\r\n\r\n</div>\r\n<div class="elistado">\r\n<h3></h3>\r\n<strong>Certificat</strong> Document amb què es dóna fe pública i per escrit d’alguna circumstància, fet o actuació.\r\n\r\n</div>\r\n<div class="elistado">\r\n<h3></h3>\r\n<strong>Comunicat intern </strong>Document no oficial amb què es fa arribar informació diversa a les unitats o al personal d’un organisme.\r\n\r\n</div>\r\n<div class="elistado">\r\n<h3></h3>\r\n<strong>Contracte i conveni</strong> Document en què es recull l’acord de voluntats entre diferents persones o institucions per fer o no fer una determinada cosa.\r\n\r\n</div>\r\n<div class="elistado">\r\n<h3></h3>\r\n<strong>Convocatòria de reunió</strong> Document per mitjà del qual se sol·licita l’assistència d’una persona a una sessió d’un òrgan col·legiat.\r\n\r\n</div>\r\n<div class="elistado">\r\n<h3></h3>\r\n<strong>Currículum </strong>Document en què es detallen el conjunt de les dades personals i els mèrits acadèmics i professionals d’una persona.\r\n\r\n</div>\r\n<div class="elistado">\r\n<h3></h3>\r\n<strong>Declaració jurada</strong> Document amb què es manifesta sota jurament o promesa un fet o esdeveniment.\r\n\r\n</div>\r\n<div class="elistado">\r\n<h3></h3>\r\n<strong>Diligència</strong> Document mitjançant el qual l’Administració fa constar internament l’execució d’un fet o una actuació determinada.\r\n\r\n</div>\r\n<div class="elistado">\r\n<h3></h3>\r\n<strong>Edicte</strong> Document que s’utilitza per acomplir una disposició legal, per citar algú o per anunciar la celebració d’un acte.\r\n\r\n</div>\r\n<div class="elistado">\r\n<h3></h3>\r\n<strong>Informe</strong> Document per mitjà del qual s’exposen tots els elements tècnics i jurídics relatius a un assumpte que cal tenir en compte per resoldre un procediment.\r\n\r\n</div>\r\n<div class="elistado">\r\n<h3></h3>\r\n<strong>Invitació </strong>Document amb què es convida algú a un acte públic.\r\n\r\n</div>\r\n<div class="elistado">\r\n<h3></h3>\r\n<strong>Ofici extern</strong> Document monotemàtic amb què l’Administració comunica continguts relacionats amb la tramitació d’un expedient a altres òrgans de l’Administració o bé als ciutadans.\r\n\r\n</div>\r\n<div class="elistado">\r\n<h3></h3>\r\n<strong>Ofici intern</strong> Document monotemàtic que utilitza l’Administració per establir comunicació entre els diferents òrgans administratius.\r\n\r\n</div>\r\n<div class="elistado">\r\n<h3></h3>\r\n<strong>Plec de clàusules administratives</strong> Document en què es recullen les bases i els referents necessaris abans de la formulació de determinats contractes.\r\n\r\n</div>\r\n<div class="elistado">\r\n<h3></h3>\r\n<strong>Recurs</strong> Document per mitjà del qual una persona expressa la seva disconformitat amb una resolució administrativa.\r\n\r\n</div>\r\n<div class="elistado">\r\n<h3></h3>\r\n<strong>Resolució</strong> Document per mitjà del qual es presenta la decisió d’un òrgan administratiu quan finalitza el procediment administratiu.\r\n\r\n</div>\r\n<div class="elistado">\r\n<h3></h3>\r\n<strong>Saluda</strong> Document de caràcter protocol·lari amb què es trameten agraïments, felicitacions, etc.\r\n\r\n</div>\r\n<div class="elistado">\r\n<h3></h3>\r\n<strong>Sol·licitud</strong> Document per mitjà del qual l’administrat demana a l’Administració alguna cosa referent a una matèria de tramitació reglada.\r\n\r\n</div>', 'Documents administratius', '', 'publish', 'open', 'open', '', 'documents-administratius', '', '', '2016-01-21 19:14:38', '2016-01-21 18:14:38', '', 0, 'http://pwc-int.educacio.intranet/agora/mastersec/docs/', 0, 'bp_doc', '', 0),
(383, 1, '2016-01-21 16:17:21', '2016-01-21 15:17:21', '<a href="http://xtec.cat/monografics/nodes/links.html?id=competencies_basiques" target="_blank">Pàgina de referència</a> al portal de centres (Departament d''Ensenyament)', 'Competències bàsiques', '', 'publish', 'open', 'open', '', 'competencies-basiques', '', '', '2016-01-21 16:17:21', '2016-01-21 15:17:21', '', 0, 'http://pwc-int.educacio.intranet/agora/mastersec/docs/', 0, 'bp_doc', '', 0),
(385, 1, '2016-01-21 16:22:17', '2016-01-21 15:22:17', 'Consells i orientacions d''estil.\r\n<a href="http://educacio.gencat.cat/documents/IPCrecursos/Plantilles/Guia_Estil_Departament.pdf" target="_blank">Enllaç al document</a>', 'Guia d’estil del Departament d’Ensenyament', '', 'publish', 'open', 'open', '', 'guia-destil-del-departament-densenyament', '', '', '2016-01-21 16:53:58', '2016-01-21 15:53:58', '', 0, 'http://pwc-int.educacio.intranet/agora/mastersec/docs/', 0, 'bp_doc', '', 0);
INSERT INTO `wp_posts` (`ID`, `post_author`, `post_date`, `post_date_gmt`, `post_content`, `post_title`, `post_excerpt`, `post_status`, `comment_status`, `ping_status`, `post_password`, `post_name`, `to_ping`, `pinged`, `post_modified`, `post_modified_gmt`, `post_content_filtered`, `post_parent`, `guid`, `menu_order`, `post_type`, `post_mime_type`, `comment_count`) VALUES
(387, 1, '2016-01-21 16:30:37', '2016-01-21 15:30:37', '<a href="http://xtec.cat/monografics/nodes/links.html?id=docs_ges_centre" target="_blank">Pàgina de referència</a> amb cercador de documents per la organització i la gestió d''un centre. Requereix validació amb usuari XTEC. Index dels documents que podeu trobar:\r\n<table border="1" summary="" width="90%" cellspacing="1" cellpadding="1" align="center">\r\n<tbody>\r\n<tr>\r\n<td class="estil1" style="text-align: center;"><strong>Projecte educatiu de centre</strong></td>\r\n<td class="estil1" style="text-align: center;"><strong>Currículum</strong></td>\r\n<td class="estil1" style="text-align: center;"><strong>Organització del centre</strong></td>\r\n<td class="estil1" style="text-align: center;"><strong>Gestió del centre</strong></td>\r\n</tr>\r\n<tr>\r\n<td class="estil2">Avaluació de centre</td>\r\n<td class="estil2">Cicles de formació professional LOGSE i LOE. Cursos per a l''accés a grau mitjà i a grau superior</td>\r\n<td class="estil2">Escoles rurals i zones escolars rurals</td>\r\n<td class="estil2">Actuacions del centre en diversos supòsits</td>\r\n</tr>\r\n<tr>\r\n<td class="estil2" bgcolor="#eeeeee">Convivència i clima escolar</td>\r\n<td class="estil2" bgcolor="#eeeeee">Cicles esportius LOGSE i LOE</td>\r\n<td class="estil2" bgcolor="#eeeeee">Organització de les llars d''infants</td>\r\n<td class="estil2" bgcolor="#eeeeee">Aspectes específics amb relació als alumnes dels centres d''adults</td>\r\n</tr>\r\n<tr>\r\n<td class="estil2">Documents de gestió del centre</td>\r\n<td class="estil2">Concreció i desenvolupament del currículum de l''educació infantil i primària</td>\r\n<td class="estil2">Organització del temps escolar</td>\r\n<td class="estil2">Assegurances i assistència jurídica al personal</td>\r\n</tr>\r\n<tr>\r\n<td class="estil2" bgcolor="#eeeeee">El tractament i l''ús de les llengües al sistema educatiu. El projecte lingüístic</td>\r\n<td class="estil2" bgcolor="#eeeeee">Concreció i desenvolupament del currículum del batxillerat</td>\r\n<td class="estil2" bgcolor="#eeeeee">Òrgans unipersonals de direcció i de coordinació</td>\r\n<td class="estil2" bgcolor="#eeeeee">Formació del personal dels centres educatius</td>\r\n</tr>\r\n<tr>\r\n<td class="estil2">Innovació pedagògica</td>\r\n<td class="estil2">Concreció i desenvolupament del currículum de l''ESO</td>\r\n<td class="estil2">Personal d''administració i serveis i professionals d''atenció educativa</td>\r\n<td class="estil2">Gestió del personal d''administració i serveis i dels professionals d''atenció educativa</td>\r\n</tr>\r\n<tr>\r\n<td class="estil2" bgcolor="#eeeeee">Objectius prioritaris del sistema educatiu i projecte educatiu de centre</td>\r\n<td class="estil2" bgcolor="#eeeeee">Coordinació entre l''educació primària i l''educació secundària obligatòria</td>\r\n<td class="estil2" bgcolor="#eeeeee">Personal docent</td>\r\n<td class="estil2" bgcolor="#eeeeee">Gestió del personal de les llars d''infants</td>\r\n</tr>\r\n<tr>\r\n<td class="estil2">Participació de la comunitat educativa</td>\r\n<td class="estil2">Currículum del primer cicle de l''educació infantil</td>\r\n<td class="estil2"></td>\r\n<td class="estil2">Gestió del personal docent</td>\r\n</tr>\r\n<tr>\r\n<td class="estil2" bgcolor="#eeeeee">Tecnologies per a l''aprenentatge i el coneixement</td>\r\n<td class="estil2" bgcolor="#eeeeee">Currículum dels ensenyaments d''idiomes</td>\r\n<td class="estil2" bgcolor="#eeeeee"></td>\r\n<td class="estil2" bgcolor="#eeeeee">Gestió econòmica, acadèmica i administrativa del centre</td>\r\n</tr>\r\n<tr>\r\n<td class="estil2"></td>\r\n<td class="estil2">Ensenyaments artístics superiors</td>\r\n<td class="estil2"></td>\r\n<td class="estil2">Protecció de dades personals, ús d''imatges, propietat intel·lectual, Internet i correu electrònic</td>\r\n</tr>\r\n<tr>\r\n<td class="estil2" bgcolor="#eeeeee"></td>\r\n<td class="estil2" bgcolor="#eeeeee">Ensenyament de la religió</td>\r\n<td class="estil2" bgcolor="#eeeeee"></td>\r\n<td class="estil2" bgcolor="#eeeeee">Recollida de dades. Registre d''alumnes (RALC), indicadors i Estadística de l''ensenyament</td>\r\n</tr>\r\n<tr>\r\n<td class="estil2"></td>\r\n<td class="estil2">Ensenyaments  de dansa de grau professional</td>\r\n<td class="estil2"></td>\r\n<td class="estil2">Seguretat i salut</td>\r\n</tr>\r\n<tr>\r\n<td class="estil2" bgcolor="#eeeeee"></td>\r\n<td class="estil2" bgcolor="#eeeeee">Ensenyaments  de música de grau professional</td>\r\n<td class="estil2" bgcolor="#eeeeee"></td>\r\n<td class="estil2" bgcolor="#eeeeee">Situacions específiques dels alumnes</td>\r\n</tr>\r\n<tr>\r\n<td class="estil2"></td>\r\n<td class="estil2">Ensenyaments en els centres d’adults</td>\r\n<td class="estil2"></td>\r\n<td class="estil2">Ús social dels centres</td>\r\n</tr>\r\n<tr>\r\n<td class="estil2" bgcolor="#eeeeee"></td>\r\n<td class="estil2" bgcolor="#eeeeee">Ensenyaments professionals d''arts plàstiques i disseny: aspectes curriculars</td>\r\n<td class="estil2" bgcolor="#eeeeee"></td>\r\n<td class="estil2" bgcolor="#eeeeee"></td>\r\n</tr>\r\n<tr>\r\n<td class="estil2"></td>\r\n<td class="estil2">Formació professional dual</td>\r\n<td class="estil2"></td>\r\n<td class="estil2"></td>\r\n</tr>\r\n<tr>\r\n<td class="estil2" bgcolor="#eeeeee"></td>\r\n<td class="estil2" bgcolor="#eeeeee">L''educació bàsica als centres d''educació especial</td>\r\n<td class="estil2" bgcolor="#eeeeee"></td>\r\n<td class="estil2" bgcolor="#eeeeee"></td>\r\n</tr>\r\n<tr>\r\n<td class="estil2"></td>\r\n<td class="estil2">Orientació educativa i acció tutorial a l''ESO</td>\r\n<td class="estil2"></td>\r\n<td class="estil2"></td>\r\n</tr>\r\n<tr>\r\n<td class="estil2" bgcolor="#eeeeee"></td>\r\n<td class="estil2" bgcolor="#eeeeee">Programacions i recursos didàctics</td>\r\n<td class="estil2" bgcolor="#eeeeee"></td>\r\n<td class="estil2" bgcolor="#eeeeee"></td>\r\n</tr>\r\n<tr>\r\n<td class="estil2" bgcolor="#ffffff"></td>\r\n<td class="estil2" bgcolor="#ffffff">Programes de formació i inserció:desenvolupament i aplicació</td>\r\n<td class="estil2" bgcolor="#ffffff"></td>\r\n<td class="estil2" bgcolor="#ffffff"></td>\r\n</tr>\r\n<tr>\r\n<td class="estil2" bgcolor="#eeeeee"></td>\r\n<td class="estil2" bgcolor="#eeeeee">Simultaneïtat d''estudis d''ESO o de batxillerat amb estudis de dansa</td>\r\n<td class="estil2" bgcolor="#eeeeee"></td>\r\n<td class="estil2" bgcolor="#eeeeee"></td>\r\n</tr>\r\n<tr>\r\n<td class="estil2"></td>\r\n<td class="estil2">Simultaneïtat d''estudis d''ESO o de batxillerat amb estudis de música</td>\r\n<td class="estil2"></td>\r\n<td class="estil2"></td>\r\n</tr>\r\n</tbody>\r\n</table>', 'Documents de organització i gestió de centre', '', 'publish', 'open', 'open', '', 'document-de-organitzacio-i-gestio-de-centre', '', '', '2016-01-21 18:44:56', '2016-01-21 17:44:56', '', 0, 'http://pwc-int.educacio.intranet/agora/mastersec/docs/', 0, 'bp_doc', '', 0),
(391, 1, '2016-01-21 16:51:03', '2016-01-21 15:51:03', '<a href="http://xtec.cat/monografics/nodes/links.html?id=cataleg_models" target="_blank">Pàgina de referència</a> (Pot requerir validació XTEC)\r\n\r\n\r\n<table border="1" width="100%" rules="cols" cellspacing="1" cellpadding="1">\r\n<tbody>\r\n<tr>\r\n<td bgcolor="#cc0000" width="43%"><strong><span style="color: #ffffff;">Gestió i documentació acadèmica</span></strong></td>\r\n<td></td>\r\n<td bgcolor="#cc0000" width="43%"><strong><span style="color: #ffffff;">Gestió administrativa</span></strong></td>\r\n</tr>\r\n<tr>\r\n<td bgcolor="#eeeeee">Primer cicle d''educació infantil (llars d''infants) <a title="Vés a Primer cicle d''educació infantil (Llars d''infants)" href="http://educacio.gencat.cat/portal/page/portal/EducacioIntranet/Inici/PortalCentres/PCCatalegModels/Llars%20d%27infants?_template=/EducacioIntranet/IDE_ITEM_PLACEHOLDER"><strong>[+]</strong></a></td>\r\n<td width="4%"></td>\r\n<td bgcolor="#eeeeee" width="43%">Certificats <a title="Vés als Models" href="http://educacio.gencat.cat/portal/page/portal/EducacioIntranet/Inici/PortalCentres/PCCatalegModels/Certificats?_template=/EducacioIntranet/IDE_ITEM_PLACEHOLDER"><strong>[+]</strong></a></td>\r\n</tr>\r\n<tr>\r\n<td>Segon cicle d''educació infantil <a title="Vés a Segon cicle d''educació infantil" href="http://educacio.gencat.cat/portal/page/portal/EducacioIntranet/Inici/PortalCentres/PCCatalegModels/Segon%20cicle%20d%27educaci%F3%20infantil?_template=/EducacioIntranet/IDE_ITEM_PLACEHOLDER"><strong>[+]</strong></a></td>\r\n<td width="4%"></td>\r\n<td width="43%">Proves per completar els estudis d''ESO <a title="Vés al Models" href="http://educacio.gencat.cat/portal/page/portal/EducacioIntranet/Inici/PortalCentres/PCCatalegModels/Proves%20anuals%20per%20completar%20els%20ensenyaments%20d%27ESO?_template=/EducacioIntranet/IDE_ITEM_PLACEHOLDER"><strong>[+]</strong></a></td>\r\n</tr>\r\n<tr>\r\n<td bgcolor="#eeeeee">Educació primària<a title="Vés a Educació primària" href="http://educacio.gencat.cat/portal/page/portal/EducacioIntranet/Inici/PortalCentres/PCCatalegModels/Educaci%F3%20prim%E0ria?_template=/EducacioIntranet/IDE_ITEM_PLACEHOLDER"><strong>[+]</strong></a></td>\r\n<td></td>\r\n<td bgcolor="#eeeeee">Protecció de dades personals <a href="http://educacio.gencat.cat/portal/page/portal/EducacioIntranet/Inici/PortalCentres/PCCatalegModels/Protecci%F3%20de%20dades%20personals?_template=/EducacioIntranet/IDE_ITEM_PLACEHOLDER"><strong>[+]</strong></a></td>\r\n</tr>\r\n<tr>\r\n<td>Educació secundària obligatòria <a title="Vés a Educació secundària obligatòria" href="http://educacio.gencat.cat/portal/page/portal/EducacioIntranet/Inici/PortalCentres/PCCatalegModels/Educaci%F3%20secund%E0ria%20obligat%F2ria?_template=/EducacioIntranet/IDE_ITEM_PLACEHOLDER"><strong>[+]</strong></a></td>\r\n<td></td>\r\n<td>Simultaneïtat d''estudis amb música i dansa <a title="Vés als Models" href="http://educacio.gencat.cat/portal/page/portal/EducacioIntranet/Inici/PortalCentres/PCCatalegModels/Simultane%EFtat%20d%27estudis%20amb%20m%FAsica%20o%20dansa?_template=/EducacioIntranet/IDE_ITEM_PLACEHOLDER"><strong>[+]</strong></a></td>\r\n</tr>\r\n<tr>\r\n<td bgcolor="#eeeeee">Batxillerat <a title="Vés a Batxillerat" href="http://educacio.gencat.cat/portal/page/portal/EducacioIntranet/Inici/PortalCentres/PCCatalegModels/Batxillerat?_template=/EducacioIntranet/IDE_ITEM_PLACEHOLDER"><strong>[+]</strong></a></td>\r\n<td></td>\r\n<td bgcolor="#eeeeee">Títols (sol·licituds, homologació,etc.) <a title="Vés als Models" href="http://educacio.gencat.cat/portal/page/portal/EducacioIntranet/Inici/PortalCentres/PCCatalegModels/DC1CC70C18363E38E04400144F0D5CC2?_template=/EducacioIntranet/IDE_ITEM_PLACEHOLDER"><strong>[+]</strong></a></td>\r\n</tr>\r\n<tr>\r\n<td>Formació Professional <a title="Vés als Models" href="http://educacio.gencat.cat/portal/page/portal/EducacioIntranet/Inici/PortalCentres/PCCatalegModels/Formaci%F3%20professional?_template=/EducacioIntranet/IDE_ITEM_PLACEHOLDER"><strong>[+]</strong></a></td>\r\n<td></td>\r\n<td>Preinscripció i matrícula <a title="Vés a Preinscripció i matrícula" href="http://educacio.gencat.cat/portal/page/portal/EducacioIntranet/Inici/PortalCentres/PCCatalegModels/Preinscripci%F3?_template=/EducacioIntranet/IDE_ITEM_PLACEHOLDER"><strong>[+]</strong></a></td>\r\n</tr>\r\n<tr>\r\n<td bgcolor="#eeeeee">Programes de formació i inserció <a title="Vés a Programes de formació i inserció" href="http://educacio.gencat.cat/portal/page/portal/EducacioIntranet/Inici/PortalCentres/PCCatalegModels/Programes%20de%20formaci%F3%20i%20inserci%F3?_template=/EducacioIntranet/IDE_ITEM_PLACEHOLDER"><strong>[+]</strong></a></td>\r\n<td></td>\r\n<td bgcolor="#eeeeee">Convocatòries centres <a href="http://educacio.gencat.cat/portal/page/portal/EducacioIntranet/Inici/PortalCentres/PCCatalegModels/Projecte%20de%20qualitat%20i%20millora%20cont%EDnua?_template=/EducacioIntranet/IDE_ITEM_PLACEHOLDER"><strong>[+]</strong></a></td>\r\n</tr>\r\n<tr>\r\n<td>Ensenyaments artístics <a title="Vés a Ensenyaments artístics" href="http://educacio.gencat.cat/portal/page/portal/EducacioIntranet/Inici/PortalCentres/PCCatalegModels/Ensenyaments%20art%EDstics?_template=/EducacioIntranet/IDE_ITEM_PLACEHOLDER"><strong>[+]</strong></a></td>\r\n<td></td>\r\n<td></td>\r\n</tr>\r\n<tr>\r\n<td bgcolor="#eeeeee">Ensenyaments esportius <a title="Vés als Models" href="http://educacio.gencat.cat/portal/page/portal/EducacioIntranet/Inici/PortalCentres/PCCatalegModels/Ensenyaments%20esportius?_template=/EducacioIntranet/IDE_ITEM_PLACEHOLDER"><strong>[+]</strong></a></td>\r\n<td></td>\r\n<td bgcolor="#cc0000"><span style="color: #ffffff;"><strong>Personal de centres\r\n</strong></span></td>\r\n</tr>\r\n<tr>\r\n<td>Ensenyaments d''idiomes <a title="Vés als Models" href="http://educacio.gencat.cat/portal/page/portal/EducacioIntranet/Inici/PortalCentres/PCCatalegModels/Ensenyaments%20d%27idiomes?_template=/EducacioIntranet/IDE_ITEM_PLACEHOLDER"><strong>[+]</strong></a></td>\r\n<td></td>\r\n<td>Gestió del personal <a title="Vés a Gestió de personal docent" href="http://educacio.gencat.cat/portal/page/portal/EducacioIntranet/Inici/PortalCentres/PCCatalegModels/Gesti%F3%20de%20personal%20docent?_template=/EducacioIntranet/IDE_ITEM_PLACEHOLDER"><strong>[+]</strong></a></td>\r\n</tr>\r\n<tr>\r\n<td bgcolor="#eeeeee">Educació d''adults <a title="Vés a Educació d''adults" href="http://educacio.gencat.cat/portal/page/portal/EducacioIntranet/Inici/PortalCentres/PCCatalegModels/Educaci%F3%20d%27adults?_template=/EducacioIntranet/IDE_ITEM_PLACEHOLDER"><strong>[+]</strong></a></td>\r\n<td></td>\r\n<td bgcolor="#eeeeee">Tràmits del personal docent <a title="Vés a Assistència del personal docent i sol·licituds" href="http://educacio.gencat.cat/portal/page/portal/EducacioIntranet/Inici/PortalCentres/PCCatalegModels/Assist%E8ncia%20del%20professorat?_template=/EducacioIntranet/IDE_ITEM_PLACEHOLDER"><strong>[+]</strong></a></td>\r\n</tr>\r\n<tr>\r\n<td>Programes de qualificació professional inicial (PQPI) <a title="Vés a Programes de qualificació professional inicial" href="http://educacio.gencat.cat/portal/page/portal/EducacioIntranet/Inici/PortalCentres/PCCatalegModels/Programes%20de%20qualificaci%F3%20professional%20inicial?_template=/EducacioIntranet/IDE_ITEM_PLACEHOLDER"><strong>[+]</strong></a></td>\r\n<td></td>\r\n<td>Tràmits PAS i professionals d''atenció educativa <a title="Vés a Gestió de personal docent" href="http://educacio.gencat.cat/portal/page/portal/EducacioIntranet/Inici/PortalCentres/PCCatalegModels/Tr%E0mits%20del%20PAS?_template=/EducacioIntranet/IDE_ITEM_PLACEHOLDER"><strong>[+]</strong></a></td>\r\n</tr>\r\n<tr>\r\n<td bgcolor="#eeeeee"></td>\r\n<td></td>\r\n<td bgcolor="#eeeeee">Convocatòries de personal docent <a title="Vés a Convocatòries de personal" href="http://educacio.gencat.cat/portal/page/portal/EducacioIntranet/Inici/PortalCentres/PCCatalegModels/Convocat%F2ries%20de%20personal?_template=/EducacioIntranet/IDE_ITEM_PLACEHOLDER"><strong>[+]</strong></a></td>\r\n</tr>\r\n<tr>\r\n<td bgcolor="#cc0000"><span style="color: #ffffff;"><strong>Ajuts i serveis\r\n</strong></span></td>\r\n<td></td>\r\n<td>Plantilles i provisió de llocs docents <a title="Vés a Plantilles i provisió de llocs" href="http://educacio.gencat.cat/portal/page/portal/EducacioIntranet/Inici/PortalCentres/PCCatalegModels/Convocat%F2ries%20de%20personal1?_template=/EducacioIntranet/IDE_ITEM_PLACEHOLDER"><strong>[+]</strong></a></td>\r\n</tr>\r\n<tr>\r\n<td bgcolor="#eeeeee">Ajuts i beques <a title="Vés a Models" href="http://educacio.gencat.cat/portal/page/portal/EducacioIntranet/Inici/PortalCentres/PCCatalegModels/Beques%20i%20ajuts?_template=/EducacioIntranet/IDE_ITEM_PLACEHOLDER"><strong>[+]</strong></a></td>\r\n<td></td>\r\n<td bgcolor="#eeeeee">Professors de religió <a title="Vés a Professors de religió" href="http://educacio.gencat.cat/portal/page/portal/EducacioIntranet/Inici/PortalCentres/PCCatalegModels/Plantilles%20i%20provisi%F3%20de%20llocs?_template=/EducacioIntranet/IDE_ITEM_PLACEHOLDER"><strong>[+] </strong></a></td>\r\n</tr>\r\n<tr>\r\n<td>Atenció educativa domiciliària <a title="Vés als Models" href="http://educacio.gencat.cat/portal/page/portal/EducacioIntranet/Inici/PortalCentres/PCCatalegModels/Atenci%F3%20domicili%E0ria?_template=/EducacioIntranet/IDE_ITEM_PLACEHOLDER"><strong>[+]</strong></a></td>\r\n<td></td>\r\n<td>Prevenció de riscos laborals <a title="Vés a Prevenció de riscos laborals" href="http://educacio.gencat.cat/portal/page/portal/EducacioIntranet/Inici/PortalCentres/PCCatalegModels/Prevenci%F3%20de%20riscos%20laborals?_template=/EducacioIntranet/IDE_ITEM_PLACEHOLDER"><strong>[+] </strong></a></td>\r\n</tr>\r\n<tr>\r\n<td bgcolor="#eeeeee">Ensenyaments professionals <a title="Vés als Models" href="http://educacio.gencat.cat/portal/page/portal/EducacioIntranet/Inici/PortalCentres/PCCatalegModels/Estades%20formatives?_template=/EducacioIntranet/IDE_ITEM_PLACEHOLDER"><strong>[+]</strong></a></td>\r\n<td></td>\r\n<td bgcolor="#eeeeee"></td>\r\n</tr>\r\n<tr>\r\n<td>Subvencions <strong>[+]</strong></td>\r\n<td></td>\r\n<td bgcolor="#cc0000"><span style="color: #ffffff;"><strong>Equipaments</strong></span></td>\r\n</tr>\r\n<tr>\r\n<td bgcolor="#eeeeee">Transport escolar <a title="Vés als Models" href="http://educacio.gencat.cat/portal/page/portal/EducacioIntranet/Inici/PortalCentres/PCCatalegModels/Transport%20escolar?_template=/EducacioIntranet/IDE_ITEM_PLACEHOLDER"><strong>[+]</strong></a></td>\r\n<td></td>\r\n<td bgcolor="#eeeeee">Gestió de les TIC <a title="Vés als Models" href="http://educacio.gencat.cat/portal/page/portal/EducacioIntranet/Inici/PortalCentres/PCCatalegModels/Gsti%F3%20de%20les%20TIC?_template=/EducacioIntranet/IDE_ITEM_PLACEHOLDER"><strong>[+]</strong></a></td>\r\n</tr>\r\n<tr>\r\n<td bgcolor="#cc0000"><span style="color: #ffffff;"><strong>Eleccions al consell escolar\r\n</strong></span></td>\r\n<td></td>\r\n<td>Gestió de les instal·lacions <a title="Vés als Models" href="http://educacio.gencat.cat/portal/page/portal/EducacioIntranet/Inici/PortalCentres/PCCatalegModels/Gesti%F3%20de%20les%20instal%B7lacions?_template=/EducacioIntranet/IDE_ITEM_PLACEHOLDER"><strong>[+]</strong></a></td>\r\n</tr>\r\n<tr>\r\n<td bgcolor="#eeeeee">Models del procediment <a title="Vés als Models" href="http://educacio.gencat.cat/portal/page/portal/EducacioIntranet/Inici/PortalCentres/PCCatalegModels/Eleccions%20als%20consell%20escolars?_template=/EducacioIntranet/IDE_ITEM_PLACEHOLDER"><strong>[+]</strong></a></td>\r\n<td></td>\r\n<td bgcolor="#eeeeee"></td>\r\n</tr>\r\n<tr>\r\n<td></td>\r\n<td></td>\r\n<td bgcolor="#cc0000"><span style="color: #ffffff;"><strong>Gestió econòmica </strong></span></td>\r\n</tr>\r\n<tr>\r\n<td bgcolor="#cc0000"><span style="color: #ffffff;"><strong>Seguretat i salut\r\n</strong></span></td>\r\n<td></td>\r\n<td>Pressupost i altres <a title="Vés als Models" href="http://educacio.gencat.cat/portal/page/portal/EducacioIntranet/Inici/PortalCentres/PCCatalegModels/Pressupost%20i%20altres?_template=/EducacioIntranet/IDE_ITEM_PLACEHOLDER"><strong>[+]</strong></a></td>\r\n</tr>\r\n<tr>\r\n<td bgcolor="#eeeeee">Autoritzacions  <a title="Vés als Models" href="http://educacio.gencat.cat/portal/page/portal/EducacioIntranet/Inici/PortalCentres/PCCatalegModels/Autoritzacions?_template=/EducacioIntranet/IDE_ITEM_PLACEHOLDER"><strong>[+]</strong></a></td>\r\n<td></td>\r\n<td bgcolor="#eeeeee">Devolucions de taxes <a title="Vés a Devolució de taxes" href="http://educacio.gencat.cat/portal/page/portal/EducacioIntranet/Inici/PortalCentres/PCCatalegModels/T%EDtols%20acad%E8mics1?_template=/EducacioIntranet/IDE_ITEM_PLACEHOLDER"><strong>[+]</strong></a></td>\r\n</tr>\r\n<tr>\r\n<td></td>\r\n<td></td>\r\n<td bgcolor="#ffffff"></td>\r\n</tr>\r\n<tr>\r\n<td bgcolor="#cc0000"><span style="color: #ffffff;"><strong>Gestió de serveis d''FP</strong></span></td>\r\n<td></td>\r\n<td bgcolor="#cc0000"><span style="color: #ffffff;"><strong>Contractació</strong></span></td>\r\n</tr>\r\n<tr>\r\n<td bgcolor="#eeeeee">Models del procediment <a title="Vés als Models" href="http://educacio.gencat.cat/portal/page/portal/EducacioIntranet/Inici/PortalCentres/PCCatalegModels/Models%20del%20procediment?_template=/EducacioIntranet/IDE_ITEM_PLACEHOLDER"><strong>[+]</strong></a></td>\r\n<td></td>\r\n<td bgcolor="#eeeeee">Contracte menor <a title="Vés als Contracte menor" href="http://educacio.gencat.cat/portal/page/portal/EducacioIntranet/Inici/PortalCentres/PCCatalegModels/Contractes%20menors?_template=/EducacioIntranet/IDE_ITEM_PLACEHOLDER"><strong>[+]</strong></a></td>\r\n</tr>\r\n<tr>\r\n<td></td>\r\n<td></td>\r\n<td>Contracte negociat <a title="Vés als Contracte menor" href="http://educacio.gencat.cat/portal/page/portal/EducacioIntranet/Inici/PortalCentres/PCCatalegModels/Contracte%20negociat?_template=/EducacioIntranet/IDE_ITEM_PLACEHOLDER"><strong>[+]</strong></a></td>\r\n</tr>\r\n<tr>\r\n<td bgcolor="#eeeeee"></td>\r\n<td></td>\r\n<td bgcolor="#eeeeee">Contracte obert <a title="Vés als Contracte menor" href="http://educacio.gencat.cat/portal/page/portal/EducacioIntranet/Inici/PortalCentres/PCCatalegModels/Contracte%20obert?_template=/EducacioIntranet/IDE_ITEM_PLACEHOLDER"><strong>[+]</strong></a></td>\r\n</tr>\r\n</tbody>\r\n</table>', 'Catàleg de models', '', 'publish', 'open', 'open', '', 'cataleg-de-models', '', '', '2016-01-21 16:57:10', '2016-01-21 15:57:10', '', 0, 'http://pwc-int.educacio.intranet/agora/mastersec/docs/', 0, 'bp_doc', '', 0),
(396, 1, '2016-01-21 17:00:36', '2016-01-21 16:00:36', '', 'Catàleg de models', '', 'publish', 'open', 'open', '', 'cataleg-de-models', '', '', '2016-01-21 19:07:55', '2016-01-21 18:07:55', '', 0, 'http://pwc-int.educacio.intranet/agora/mastersec/?p=396', 2, 'nav_menu_item', '', 0),
(397, 1, '2016-01-21 17:53:37', '2016-01-21 16:53:37', '', 'Organització i gestió de centre', '', 'publish', 'open', 'open', '', 'organitzacio-i-gestio-de-centre', '', '', '2016-01-21 19:07:55', '2016-01-21 18:07:55', '', 0, 'http://pwc-int.educacio.intranet/agora/mastersec/?p=397', 1, 'nav_menu_item', '', 0),
(398, 1, '2016-01-21 17:53:37', '2016-01-21 16:53:37', '', 'Documents administratius', '', 'publish', 'open', 'open', '', 'documents-administratius', '', '', '2016-01-21 19:07:55', '2016-01-21 18:07:55', '', 0, 'http://pwc-int.educacio.intranet/agora/mastersec/?p=398', 3, 'nav_menu_item', '', 0),
(399, 1, '2016-01-21 17:53:37', '2016-01-21 16:53:37', '', 'ESO', '', 'publish', 'open', 'open', '', 'eso', '', '', '2016-01-21 19:07:56', '2016-01-21 18:07:56', '', 0, 'http://pwc-int.educacio.intranet/agora/mastersec/?p=399', 5, 'nav_menu_item', '', 0),
(400, 1, '2016-01-21 17:53:37', '2016-01-21 16:53:37', '', 'Batxillerat', '', 'publish', 'open', 'open', '', 'batxillerat', '', '', '2016-01-21 19:07:56', '2016-01-21 18:07:56', '', 0, 'http://pwc-int.educacio.intranet/agora/mastersec/?p=400', 10, 'nav_menu_item', '', 0),
(401, 1, '2016-01-21 17:53:37', '2016-01-21 16:53:37', '', 'Equips docents', '', 'publish', 'open', 'open', '', 'equips-docents', '', '', '2016-01-21 19:07:55', '2016-01-21 18:07:55', '', 0, 'http://pwc-int.educacio.intranet/agora/mastersec/?p=401', 4, 'nav_menu_item', '', 0),
(402, 1, '2016-01-21 17:53:37', '2016-01-21 16:53:37', '', 'ESO 1', '', 'publish', 'open', 'open', '', 'eso-1', '', '', '2016-01-21 19:07:56', '2016-01-21 18:07:56', '', 0, 'http://pwc-int.educacio.intranet/agora/mastersec/?p=402', 6, 'nav_menu_item', '', 0),
(403, 1, '2016-01-21 17:53:37', '2016-01-21 16:53:37', '', 'ESO 2', '', 'publish', 'open', 'open', '', 'eso-2', '', '', '2016-01-21 19:07:56', '2016-01-21 18:07:56', '', 0, 'http://pwc-int.educacio.intranet/agora/mastersec/?p=403', 7, 'nav_menu_item', '', 0),
(404, 1, '2016-01-21 17:53:37', '2016-01-21 16:53:37', '', 'ESO 3', '', 'publish', 'open', 'open', '', 'eso-3', '', '', '2016-01-21 19:07:56', '2016-01-21 18:07:56', '', 0, 'http://pwc-int.educacio.intranet/agora/mastersec/?p=404', 8, 'nav_menu_item', '', 0),
(405, 1, '2016-01-21 17:53:37', '2016-01-21 16:53:37', '', 'ESO 4', '', 'publish', 'open', 'open', '', 'eso-4', '', '', '2016-01-21 19:07:56', '2016-01-21 18:07:56', '', 0, 'http://pwc-int.educacio.intranet/agora/mastersec/?p=405', 9, 'nav_menu_item', '', 0),
(406, 1, '2016-01-21 17:55:02', '2016-01-21 16:55:02', '', 'Cicles formatius', '', 'publish', 'open', 'open', '', 'cicles-formatius', '', '', '2016-01-21 19:07:56', '2016-01-21 18:07:56', '', 0, 'http://pwc-int.educacio.intranet/agora/mastersec/?p=406', 11, 'nav_menu_item', '', 0),
(407, 1, '2016-01-21 17:59:07', '2016-01-21 16:59:07', '', 'Departaments didàctics', '', 'publish', 'open', 'open', '', 'departaments-didactics', '', '', '2016-01-21 19:07:56', '2016-01-21 18:07:56', '', 0, 'http://pwc-int.educacio.intranet/agora/mastersec/?p=407', 12, 'nav_menu_item', '', 0),
(408, 1, '2016-01-21 17:59:07', '2016-01-21 16:59:07', '', 'Dep. Matemàtiques', '', 'publish', 'open', 'open', '', 'dep-matematiques', '', '', '2016-01-21 19:07:56', '2016-01-21 18:07:56', '', 0, 'http://pwc-int.educacio.intranet/agora/mastersec/?p=408', 13, 'nav_menu_item', '', 0),
(409, 1, '2016-01-21 17:59:07', '2016-01-21 16:59:07', '', 'Dep. Català', '', 'publish', 'open', 'open', '', 'dep-catala', '', '', '2016-01-21 19:07:56', '2016-01-21 18:07:56', '', 0, 'http://pwc-int.educacio.intranet/agora/mastersec/?p=409', 14, 'nav_menu_item', '', 0),
(410, 1, '2016-01-21 17:59:07', '2016-01-21 16:59:07', '', 'Dep. Tecnologia', '', 'publish', 'open', 'open', '', 'dep-tecnologia', '', '', '2016-01-21 19:07:56', '2016-01-21 18:07:56', '', 0, 'http://pwc-int.educacio.intranet/agora/mastersec/?p=410', 15, 'nav_menu_item', '', 0),
(424, 1, '2016-03-29 12:44:32', '2016-03-29 11:44:32', '', 'Activa', '', 'publish', 'closed', 'closed', '', 'activa', '', '', '2016-03-29 12:44:56', '2016-03-29 11:44:56', '', 0, 'http://pwc-int.educacio.intranet/agora/mastersec/?page_id=424', 0, 'page', '', 0),
(426, 1, '2016-03-29 12:44:43', '2016-03-29 11:44:43', '', 'Registre', '', 'publish', 'closed', 'closed', '', 'registre', '', '', '2016-03-29 12:44:43', '2016-03-29 11:44:43', '', 0, 'http://pwc-int.educacio.intranet/agora/mastersec/?page_id=426', 0, 'page', '', 0),
(428, 1, '2016-05-27 10:27:18', '2016-05-27 09:27:18', ' ', '', '', 'publish', 'closed', 'closed', '', '428', '', '', '2016-05-27 10:27:18', '2016-05-27 09:27:18', '', 19, 'http://pwc-int.educacio.intranet/agora/mastersec/?p=428', 9, 'nav_menu_item', '', 0),
(435, 1, '2016-07-04 11:32:24', '2016-07-04 10:32:24', '{{poster.name}} replied to one of your updates:\n\n<blockquote>&quot;{{usermessage}}&quot;</blockquote>\n\n<a href="{{{thread.url}}}">Go to the discussion</a> to reply or catch up on the conversation.', '[{{{site.name}}}] {{poster.name}} replied to one of your updates', '{{poster.name}} replied to one of your updates:\n\n"{{usermessage}}"\n\nGo to the discussion to reply or catch up on the conversation: {{{thread.url}}}', 'publish', 'closed', 'closed', '', 'site-name-poster-name-replied-to-one-of-your-updates', '', '', '2016-07-04 11:32:24', '2016-07-04 10:32:24', '', 0, 'http://pwc-int.educacio.intranet/agora/mastersec/general/site-name-poster-name-replied-to-one-of-your-updates/', 0, 'bp-email', '', 0),
(436, 1, '2016-07-04 11:32:24', '2016-07-04 10:32:24', '{{poster.name}} replied to one of your comments:\n\n<blockquote>&quot;{{usermessage}}&quot;</blockquote>\n\n<a href="{{{thread.url}}}">Go to the discussion</a> to reply or catch up on the conversation.', '[{{{site.name}}}] {{poster.name}} replied to one of your comments', '{{poster.name}} replied to one of your comments:\n\n"{{usermessage}}"\n\nGo to the discussion to reply or catch up on the conversation: {{{thread.url}}}', 'publish', 'closed', 'closed', '', 'site-name-poster-name-replied-to-one-of-your-comments', '', '', '2016-07-04 11:32:24', '2016-07-04 10:32:24', '', 0, 'http://pwc-int.educacio.intranet/agora/mastersec/general/site-name-poster-name-replied-to-one-of-your-comments/', 0, 'bp-email', '', 0),
(437, 1, '2016-07-04 11:32:24', '2016-07-04 10:32:24', '{{poster.name}} mentioned you in a status update:\n\n<blockquote>&quot;{{usermessage}}&quot;</blockquote>\n\n<a href="{{{mentioned.url}}}">Go to the discussion</a> to reply or catch up on the conversation.', '[{{{site.name}}}] {{poster.name}} mentioned you in a status update', '{{poster.name}} mentioned you in a status update:\n\n"{{usermessage}}"\n\nGo to the discussion to reply or catch up on the conversation: {{{mentioned.url}}}', 'publish', 'closed', 'closed', '', 'site-name-poster-name-mentioned-you-in-a-status-update', '', '', '2016-07-04 11:32:24', '2016-07-04 10:32:24', '', 0, 'http://pwc-int.educacio.intranet/agora/mastersec/general/site-name-poster-name-mentioned-you-in-a-status-update/', 0, 'bp-email', '', 0),
(438, 1, '2016-07-04 11:32:24', '2016-07-04 10:32:24', '{{poster.name}} mentioned you in the group "{{group.name}}":\n\n<blockquote>&quot;{{usermessage}}&quot;</blockquote>\n\n<a href="{{{mentioned.url}}}">Go to the discussion</a> to reply or catch up on the conversation.', '[{{{site.name}}}] {{poster.name}} mentioned you in an update', '{{poster.name}} mentioned you in the group "{{group.name}}":\n\n"{{usermessage}}"\n\nGo to the discussion to reply or catch up on the conversation: {{{mentioned.url}}}', 'publish', 'closed', 'closed', '', 'site-name-poster-name-mentioned-you-in-an-update', '', '', '2016-07-04 11:32:24', '2016-07-04 10:32:24', '', 0, 'http://pwc-int.educacio.intranet/agora/mastersec/general/site-name-poster-name-mentioned-you-in-an-update/', 0, 'bp-email', '', 0),
(439, 1, '2016-07-04 11:32:24', '2016-07-04 10:32:24', 'Thanks for registering!\n\nTo complete the activation of your account, go to the following link: <a href="{{{activate.url}}}">{{{activate.url}}}</a>', '[{{{site.name}}}] Activate your account', 'Thanks for registering!\n\nTo complete the activation of your account, go to the following link: {{{activate.url}}}', 'publish', 'closed', 'closed', '', 'site-name-activate-your-account', '', '', '2016-07-04 11:32:24', '2016-07-04 10:32:24', '', 0, 'http://pwc-int.educacio.intranet/agora/mastersec/general/site-name-activate-your-account/', 0, 'bp-email', '', 0),
(440, 1, '2016-07-04 11:32:24', '2016-07-04 10:32:24', 'Thanks for registering!\n\nTo complete the activation of your account and site, go to the following link: <a href="{{{activate-site.url}}}">{{{activate-site.url}}}</a>.\n\nAfter you activate, you can visit your site at <a href="{{{user-site.url}}}">{{{user-site.url}}}</a>.', '[{{{site.name}}}] Activate {{{user-site.url}}}', 'Thanks for registering!\n\nTo complete the activation of your account and site, go to the following link: {{{activate-site.url}}}\n\nAfter you activate, you can visit your site at {{{user-site.url}}}.', 'publish', 'closed', 'closed', '', 'site-name-activate-user-site-url', '', '', '2016-07-04 11:32:24', '2016-07-04 10:32:24', '', 0, 'http://pwc-int.educacio.intranet/agora/mastersec/general/site-name-activate-user-site-url/', 0, 'bp-email', '', 0),
(441, 1, '2016-07-04 11:32:24', '2016-07-04 10:32:24', '<a href="{{{initiator.url}}}">{{initiator.name}}</a> wants to add you as a friend.\n\nTo accept this request and manage all of your pending requests, visit: <a href="{{{friend-requests.url}}}">{{{friend-requests.url}}}</a>', '[{{{site.name}}}] New friendship request from {{initiator.name}}', '{{initiator.name}} wants to add you as a friend.\n\nTo accept this request and manage all of your pending requests, visit: {{{friend-requests.url}}}\n\nTo view {{initiator.name}}''s profile, visit: {{{initiator.url}}}', 'publish', 'closed', 'closed', '', 'site-name-new-friendship-request-from-initiator-name', '', '', '2016-07-04 11:32:24', '2016-07-04 10:32:24', '', 0, 'http://pwc-int.educacio.intranet/agora/mastersec/general/site-name-new-friendship-request-from-initiator-name/', 0, 'bp-email', '', 0),
(442, 1, '2016-07-04 11:32:24', '2016-07-04 10:32:24', '<a href="{{{friendship.url}}}">{{friend.name}}</a> accepted your friend request.', '[{{{site.name}}}] {{friend.name}} accepted your friendship request', '{{friend.name}} accepted your friend request.\n\nTo learn more about them, visit their profile: {{{friendship.url}}}', 'publish', 'closed', 'closed', '', 'site-name-friend-name-accepted-your-friendship-request', '', '', '2016-07-04 11:32:24', '2016-07-04 10:32:24', '', 0, 'http://pwc-int.educacio.intranet/agora/mastersec/general/site-name-friend-name-accepted-your-friendship-request/', 0, 'bp-email', '', 0),
(443, 1, '2016-07-04 11:32:24', '2016-07-04 10:32:24', 'Group details for the group &quot;<a href="{{{group.url}}}">{{group.name}}</a>&quot; were updated:\n<blockquote>{{changed_text}}</blockquote>', '[{{{site.name}}}] Group details updated', 'Group details for the group &quot;{{group.name}}&quot; were updated:\n\n{{changed_text}}\n\nTo view the group, visit: {{{group.url}}}', 'publish', 'closed', 'closed', '', 'site-name-group-details-updated', '', '', '2016-07-04 11:32:24', '2016-07-04 10:32:24', '', 0, 'http://pwc-int.educacio.intranet/agora/mastersec/general/site-name-group-details-updated/', 0, 'bp-email', '', 0),
(444, 1, '2016-07-04 11:32:24', '2016-07-04 10:32:24', '<a href="{{{inviter.url}}}">{{inviter.name}}</a> has invited you to join the group: &quot;{{group.name}}&quot;.\n<a href="{{{invites.url}}}">Go here to accept your invitation</a> or <a href="{{{group.url}}}">visit the group</a> to learn more.', '[{{{site.name}}}] You have an invitation to the group: "{{group.name}}"', '{{inviter.name}} has invited you to join the group: &quot;{{group.name}}&quot;.\n\nTo accept your invitation, visit: {{{invites.url}}}\n\nTo learn more about the group, visit {{{group.url}}}.\nTo view {{inviter.name}}''s profile, visit: {{{inviter.url}}}', 'publish', 'closed', 'closed', '', 'site-name-you-have-an-invitation-to-the-group-group-name', '', '', '2016-07-04 11:32:24', '2016-07-04 10:32:24', '', 0, 'http://pwc-int.educacio.intranet/agora/mastersec/general/site-name-you-have-an-invitation-to-the-group-group-name/', 0, 'bp-email', '', 0),
(445, 1, '2016-07-04 11:32:24', '2016-07-04 10:32:24', 'You have been promoted to <b>{{promoted_to}}</b> in the group &quot;<a href="{{{group.url}}}">{{group.name}}</a>&quot;.', '[{{{site.name}}}] You have been promoted in the group: "{{group.name}}"', 'You have been promoted to {{promoted_to}} in the group: &quot;{{group.name}}&quot;.\n\nTo visit the group, go to: {{{group.url}}}', 'publish', 'closed', 'closed', '', 'site-name-you-have-been-promoted-in-the-group-group-name', '', '', '2016-07-04 11:32:24', '2016-07-04 10:32:24', '', 0, 'http://pwc-int.educacio.intranet/agora/mastersec/general/site-name-you-have-been-promoted-in-the-group-group-name/', 0, 'bp-email', '', 0),
(446, 1, '2016-07-04 11:32:24', '2016-07-04 10:32:24', '<a href="{{{profile.url}}}">{{requesting-user.name}}</a> wants to join the group &quot;{{group.name}}&quot;. As you are an administrator of this group, you must either accept or reject the membership request.\n\n<a href="{{{group-requests.url}}}">Go here to manage this</a> and all other pending requests.', '[{{{site.name}}}] Membership request for group: {{group.name}}', '{{requesting-user.name}} wants to join the group &quot;{{group.name}}&quot;. As you are the administrator of this group, you must either accept or reject the membership request.\n\nTo manage this and all other pending requests, visit: {{{group-requests.url}}}\n\nTo view {{requesting-user.name}}''s profile, visit: {{{profile.url}}}', 'publish', 'closed', 'closed', '', 'site-name-membership-request-for-group-group-name', '', '', '2016-07-04 11:32:24', '2016-07-04 10:32:24', '', 0, 'http://pwc-int.educacio.intranet/agora/mastersec/general/site-name-membership-request-for-group-group-name/', 0, 'bp-email', '', 0),
(447, 1, '2016-07-04 11:32:24', '2016-07-04 10:32:24', '{{sender.name}} sent you a new message: &quot;{{usersubject}}&quot;\n\n<blockquote>&quot;{{usermessage}}&quot;</blockquote>\n\n<a href="{{{message.url}}}">Go to the discussion</a> to reply or catch up on the conversation.', '[{{{site.name}}}] New message from {{sender.name}}', '{{sender.name}} sent you a new message: &quot;{{usersubject}}&quot;\n\n&quot;{{usermessage}}&quot;\n\nGo to the discussion to reply or catch up on the conversation: {{{message.url}}}', 'publish', 'closed', 'closed', '', 'site-name-new-message-from-sender-name', '', '', '2016-07-04 11:32:24', '2016-07-04 10:32:24', '', 0, 'http://pwc-int.educacio.intranet/agora/mastersec/general/site-name-new-message-from-sender-name/', 0, 'bp-email', '', 0),
(448, 1, '2016-07-04 11:32:24', '2016-07-04 10:32:24', 'You recently changed the email address associated with your account on {{site.name}}. If this is correct, <a href="{{{verify.url}}}">go here to confirm the change</a>.\n\nOtherwise, you can safely ignore and delete this email if you have changed your mind, or if you think you have received this email in error.', '[{{{site.name}}}] Verify your new email address', 'You recently changed the email address associated with your account on {{site.name}}. If this is correct, go to the following link to confirm the change: {{{verify.url}}}\n\nOtherwise, you can safely ignore and delete this email if you have changed your mind, or if you think you have received this email in error.', 'publish', 'closed', 'closed', '', 'site-name-verify-your-new-email-address', '', '', '2016-07-04 11:32:24', '2016-07-04 10:32:24', '', 0, 'http://pwc-int.educacio.intranet/agora/mastersec/general/site-name-verify-your-new-email-address/', 0, 'bp-email', '', 0),
(449, 1, '2016-07-04 11:32:24', '2016-07-04 10:32:24', 'Your membership request for the group &quot;<a href="{{{group.url}}}">{{group.name}}</a>&quot; has been accepted.', '[{{{site.name}}}] Membership request for group "{{group.name}}" accepted', 'Your membership request for the group &quot;{{group.name}}&quot; has been accepted.\n\nTo view the group, visit: {{{group.url}}}', 'publish', 'closed', 'closed', '', 'site-name-membership-request-for-group-group-name-accepted', '', '', '2016-07-04 11:32:24', '2016-07-04 10:32:24', '', 0, 'http://pwc-int.educacio.intranet/agora/mastersec/general/site-name-membership-request-for-group-group-name-accepted/', 0, 'bp-email', '', 0),
(450, 1, '2016-07-04 11:32:24', '2016-07-04 10:32:24', 'Your membership request for the group &quot;<a href="{{{group.url}}}">{{group.name}}</a>&quot; has been rejected.', '[{{{site.name}}}] Membership request for group "{{group.name}}" rejected', 'Your membership request for the group &quot;{{group.name}}&quot; has been rejected.\n\nTo request membership again, visit: {{{group.url}}}', 'publish', 'closed', 'closed', '', 'site-name-membership-request-for-group-group-name-rejected', '', '', '2016-07-04 11:32:24', '2016-07-04 10:32:24', '', 0, 'http://pwc-int.educacio.intranet/agora/mastersec/general/site-name-membership-request-for-group-group-name-rejected/', 0, 'bp-email', '', 0),
(455, 1, '2017-03-24 10:56:14', '2017-03-24 09:56:14', '', 'agrupat-03', '', 'inherit', 'open', 'closed', '', 'agrupat-03', '', '', '2017-03-24 10:56:14', '2017-03-24 09:56:14', '', 0, 'http://pwc-int.educacio.intranet/agora/mastersec/wp-content/uploads/usu7/2017/03/Agrupat-03.png', 0, 'attachment', 'image/png', 0),
(456, 1, '2017-03-24 10:56:30', '2017-03-24 09:56:30', '', 'agrupat-06', '', 'inherit', 'open', 'closed', '', 'agrupat-06', '', '', '2017-03-24 10:56:30', '2017-03-24 09:56:30', '', 0, 'http://pwc-int.educacio.intranet/agora/mastersec/wp-content/uploads/usu7/2017/03/Agrupat-06.png', 0, 'attachment', 'image/png', 0),
(457, 1, '2017-03-24 10:56:44', '2017-03-24 09:56:44', '', 'agrupat-01', '', 'inherit', 'open', 'closed', '', 'agrupat-01', '', '', '2017-03-24 10:56:44', '2017-03-24 09:56:44', '', 0, 'http://pwc-int.educacio.intranet/agora/mastersec/wp-content/uploads/usu7/2017/03/Agrupat-01.png', 0, 'attachment', 'image/png', 0),
(458, 1, '2017-03-24 10:57:15', '2017-03-24 09:57:15', '', 'agrupat-02', '', 'inherit', 'open', 'closed', '', 'agrupat-02', '', '', '2017-03-24 10:57:15', '2017-03-24 09:57:15', '', 0, 'http://pwc-int.educacio.intranet/agora/mastersec/wp-content/uploads/usu7/2017/03/Agrupat-02.png', 0, 'attachment', 'image/png', 0),
(459, 1, '2017-03-24 11:55:07', '2017-03-24 10:55:07', '', 'agrupat-04', '', 'inherit', 'open', 'closed', '', 'agrupat-04', '', '', '2017-03-24 11:55:07', '2017-03-24 10:55:07', '', 0, 'http://pwc-int.educacio.intranet/agora/mastersec/wp-content/uploads/usu7/2017/03/Agrupat-04.png', 0, 'attachment', 'image/png', 0),
(460, 1, '2017-03-24 11:59:40', '2017-03-24 10:59:40', '', 'agrupat-12', '', 'inherit', 'open', 'closed', '', 'agrupat-12', '', '', '2017-03-24 11:59:40', '2017-03-24 10:59:40', '', 0, 'http://pwc-int.educacio.intranet/agora/mastersec/wp-content/uploads/usu7/2017/03/Agrupat-12.png', 0, 'attachment', 'image/png', 0),
(461, 1, '2017-03-24 11:59:42', '2017-03-24 10:59:42', '', 'agrupat-11-1', '', 'inherit', 'open', 'closed', '', 'agrupat-11-1', '', '', '2017-03-24 11:59:42', '2017-03-24 10:59:42', '', 0, 'http://pwc-int.educacio.intranet/agora/mastersec/wp-content/uploads/usu7/2017/03/Agrupat-11-1.png', 0, 'attachment', 'image/png', 0),
(462, 1, '2017-03-24 11:59:44', '2017-03-24 10:59:44', '', 'agrupat-10-2', '', 'inherit', 'open', 'closed', '', 'agrupat-10-2', '', '', '2017-03-24 11:59:44', '2017-03-24 10:59:44', '', 0, 'http://pwc-int.educacio.intranet/agora/mastersec/wp-content/uploads/usu7/2017/03/Agrupat-10-2.png', 0, 'attachment', 'image/png', 0),
(463, 1, '2017-03-24 11:59:46', '2017-03-24 10:59:46', '', 'agrupat-09-1', '', 'inherit', 'open', 'closed', '', 'agrupat-09-1', '', '', '2017-03-24 11:59:46', '2017-03-24 10:59:46', '', 0, 'http://pwc-int.educacio.intranet/agora/mastersec/wp-content/uploads/usu7/2017/03/Agrupat-09-1.png', 0, 'attachment', 'image/png', 0),
(464, 1, '2017-03-24 11:59:48', '2017-03-24 10:59:48', '', 'agrupat-08-1', '', 'inherit', 'open', 'closed', '', 'agrupat-08-1', '', '', '2017-03-24 11:59:48', '2017-03-24 10:59:48', '', 0, 'http://pwc-int.educacio.intranet/agora/mastersec/wp-content/uploads/usu7/2017/03/Agrupat-08-1.png', 0, 'attachment', 'image/png', 0),
(465, 1, '2017-03-24 11:59:50', '2017-03-24 10:59:50', '', 'agrupat-07-1', '', 'inherit', 'open', 'closed', '', 'agrupat-07-1', '', '', '2017-03-24 11:59:50', '2017-03-24 10:59:50', '', 0, 'http://pwc-int.educacio.intranet/agora/mastersec/wp-content/uploads/usu7/2017/03/Agrupat-07-1.png', 0, 'attachment', 'image/png', 0),
(466, 1, '2017-03-24 11:59:53', '2017-03-24 10:59:53', '', 'agrupat-06-2', '', 'inherit', 'open', 'closed', '', 'agrupat-06-2', '', '', '2017-03-24 11:59:53', '2017-03-24 10:59:53', '', 0, 'http://pwc-int.educacio.intranet/agora/mastersec/wp-content/uploads/usu7/2017/03/Agrupat-06-2.png', 0, 'attachment', 'image/png', 0),
(467, 1, '2017-03-24 11:59:55', '2017-03-24 10:59:55', '', 'agrupat-05-1', '', 'inherit', 'open', 'closed', '', 'agrupat-05-1', '', '', '2017-03-24 11:59:55', '2017-03-24 10:59:55', '', 0, 'http://pwc-int.educacio.intranet/agora/mastersec/wp-content/uploads/usu7/2017/03/Agrupat-05-1.png', 0, 'attachment', 'image/png', 0),
(468, 0, '2019-05-13 09:44:08', '2019-05-13 07:44:08', '{{{ia.content}}}<br /><hr><a href="{{{ia.accept_url}}}">Accepteu o rebutgeu aquesta invitació</a> &middot; <a href="{{{ia.opt_out_url}}}">Desactiveu les invitacions futures</a>', '[{{{site.name}}}] {{{ia.subject}}}', '{{{ia.content_plaintext}}}', 'publish', 'closed', 'closed', '', 'site-name-ia-subject', '', '', '2019-05-13 09:44:08', '2019-05-13 07:44:08', '', 0, 'https://pwc-int.educacio.intranet/agora/mastersec/general/site-name-ia-subject/', 0, 'bp-email', '', 0),
(469, 0, '2019-05-13 09:44:10', '2019-05-13 07:44:10', 'Hola {{NAME}},\r\n\r\nHem publicat un article nou al nostre lloc web. \r\n\r\n{{POSTTITLE}}\r\n{{POSTDESC}}\r\n\r\nPodeu veure l''article i els comentaris associats a {{POSTLINK}}\r\nHeu rebut aquest correu perquè vau demanar que se us notifiqués la publicació d''articles nous\r\n\r\n', '{{POSTTITLE}}', '', 'publish', 'closed', 'closed', '', 'posttitle', '', '', '2019-05-13 09:44:10', '2019-05-13 07:44:10', '', 0, 'http://pwc-int.educacio.intranet/agora/mastersec/es_template/posttitle/', 0, 'es_template', '', 0),
(470, 0, '2019-05-13 09:44:10', '2019-05-13 07:44:10', 'Hola {{NAME}},\r\n\r\nHem publicat un article nou al nostre lloc web. \r\n\r\n{{POSTTITLE}}\r\n{{POSTDESC}}\r\n\r\nPodeu veure l''article i els comentaris associats a {{POSTLINK}}\r\nHeu rebut aquest correu perquè vau demanar que se us notifiqués la publicació d''articles nous\r\n\r\n', '{{POSTTITLE}}', '', 'publish', 'closed', 'closed', '', 'posttitle-2', '', '', '2019-05-13 09:44:10', '2019-05-13 07:44:10', '', 0, 'http://pwc-int.educacio.intranet/agora/mastersec/es_template/posttitle-2/', 0, 'es_template', '', 0),
(471, 0, '2019-05-13 09:44:10', '2019-05-13 07:44:10', 'Hola {{NAME}},\r\n\r\nHem publicat un article nou al nostre lloc web. \r\n\r\n{{POSTTITLE}}\r\n{{POSTDESC}}\r\n\r\nPodeu veure l''article i els comentaris associats a {{POSTLINK}}\r\nHeu rebut aquest correu perquè vau demanar que se us notifiqués la publicació d''articles nous\r\n\r\n', '{{POSTTITLE}}', '', 'publish', 'closed', 'closed', '', 'posttitle-3', '', '', '2019-05-13 09:44:10', '2019-05-13 07:44:10', '', 0, 'http://pwc-int.educacio.intranet/agora/mastersec/es_template/posttitle-3/', 0, 'es_template', '', 0),
(472, 0, '2019-05-13 09:44:10', '2019-05-13 07:44:10', 'Hola {{NAME}},\r\n\r\nHem publicat un article nou al nostre lloc web. \r\n\r\n{{POSTTITLE}}\r\n{{POSTDESC}}\r\n\r\nPodeu veure l''article i els comentaris associats a {{POSTLINK}}\r\nHeu rebut aquest correu perquè vau demanar que se us notifiqués la publicació d''articles nous\r\n\r\n', '{{POSTTITLE}}', '', 'publish', 'closed', 'closed', '', 'posttitle-4', '', '', '2019-05-13 09:44:10', '2019-05-13 07:44:10', '', 0, 'http://pwc-int.educacio.intranet/agora/mastersec/es_template/posttitle-4/', 0, 'es_template', '', 0),
(473, 0, '2019-05-13 09:44:10', '2019-05-13 07:44:10', 'Hola {{NAME}},\r\n\r\nHem publicat un article nou al nostre lloc web. \r\n\r\n{{POSTTITLE}}\r\n{{POSTDESC}}\r\n\r\nPodeu veure l''article i els comentaris associats a {{POSTLINK}}\r\nHeu rebut aquest correu perquè vau demanar que se us notifiqués la publicació d''articles nous\r\n\r\n', '{{POSTTITLE}}', '', 'publish', 'closed', 'closed', '', 'posttitle-5', '', '', '2019-05-13 09:44:10', '2019-05-13 07:44:10', '', 0, 'http://pwc-int.educacio.intranet/agora/mastersec/es_template/posttitle-5/', 0, 'es_template', '', 0),
(474, 0, '2019-05-13 09:44:10', '2019-05-13 07:44:10', 'Hola {{NAME}},\r\n\r\nHem publicat un article nou al nostre lloc web. \r\n\r\n{{POSTTITLE}}\r\n{{POSTDESC}}\r\n\r\nPodeu veure l''article i els comentaris associats a {{POSTLINK}}\r\nHeu rebut aquest correu perquè vau demanar que se us notifiqués la publicació d''articles nous\r\n\r\n', '{{POSTTITLE}}', '', 'publish', 'closed', 'closed', '', 'posttitle-6', '', '', '2019-05-13 09:44:10', '2019-05-13 07:44:10', '', 0, 'http://pwc-int.educacio.intranet/agora/mastersec/es_template/posttitle-6/', 0, 'es_template', '', 0),
(475, 0, '2019-05-13 09:44:10', '2019-05-13 07:44:10', 'Hola {{NAME}},\r\n\r\nHem publicat un article nou al nostre lloc web. \r\n\r\n{{POSTTITLE}}\r\n{{POSTDESC}}\r\n\r\nPodeu veure l''article i els comentaris associats a {{POSTLINK}}\r\nHeu rebut aquest correu perquè vau demanar que se us notifiqués la publicació d''articles nous\r\n\r\n', '{{POSTTITLE}}', '', 'publish', 'closed', 'closed', '', 'posttitle-7', '', '', '2019-05-13 09:44:10', '2019-05-13 07:44:10', '', 0, 'http://pwc-int.educacio.intranet/agora/mastersec/es_template/posttitle-7/', 0, 'es_template', '', 0),
(476, 0, '2019-05-13 09:44:10', '2019-05-13 07:44:10', 'Hola {{NAME}},\r\n\r\nHem publicat un article nou al nostre lloc web. \r\n\r\n{{POSTTITLE}}\r\n{{POSTDESC}}\r\n\r\nPodeu veure l''article i els comentaris associats a {{POSTLINK}}\r\nHeu rebut aquest correu perquè vau demanar que se us notifiqués la publicació d''articles nous\r\n\r\n', '{{POSTTITLE}}', '', 'publish', 'closed', 'closed', '', 'posttitle-8', '', '', '2019-05-13 09:44:10', '2019-05-13 07:44:10', '', 0, 'http://pwc-int.educacio.intranet/agora/mastersec/es_template/posttitle-8/', 0, 'es_template', '', 0),
(477, 0, '2019-05-13 09:44:10', '2019-05-13 07:44:10', 'Hola {{NAME}},\r\n\r\nHem publicat un article nou al nostre lloc web. \r\n\r\n{{POSTTITLE}}\r\n{{POSTDESC}}\r\n\r\nPodeu veure l''article i els comentaris associats a {{POSTLINK}}\r\nHeu rebut aquest correu perquè vau demanar que se us notifiqués la publicació d''articles nous\r\n\r\n', '{{POSTTITLE}}', '', 'publish', 'closed', 'closed', '', 'posttitle-9', '', '', '2019-05-13 09:44:10', '2019-05-13 07:44:10', '', 0, 'http://pwc-int.educacio.intranet/agora/mastersec/es_template/posttitle-9/', 0, 'es_template', '', 0),
(478, 0, '2019-05-13 09:44:10', '2019-05-13 07:44:10', 'Hola {{NAME}},\r\n\r\nHem publicat un article nou al nostre lloc web. \r\n\r\n{{POSTTITLE}}\r\n{{POSTDESC}}\r\n\r\nPodeu veure l''article i els comentaris associats a {{POSTLINK}}\r\nHeu rebut aquest correu perquè vau demanar que se us notifiqués la publicació d''articles nous\r\n\r\n', '{{POSTTITLE}}', '', 'publish', 'closed', 'closed', '', 'posttitle-10', '', '', '2019-05-13 09:44:10', '2019-05-13 07:44:10', '', 0, 'http://pwc-int.educacio.intranet/agora/mastersec/es_template/posttitle-10/', 0, 'es_template', '', 0);
INSERT INTO `wp_posts` (`ID`, `post_author`, `post_date`, `post_date_gmt`, `post_content`, `post_title`, `post_excerpt`, `post_status`, `comment_status`, `ping_status`, `post_password`, `post_name`, `to_ping`, `pinged`, `post_modified`, `post_modified_gmt`, `post_content_filtered`, `post_parent`, `guid`, `menu_order`, `post_type`, `post_mime_type`, `comment_count`) VALUES
(479, 0, '2019-05-13 09:44:10', '2019-05-13 07:44:10', 'Hola {{NAME}},\r\n\r\nHem publicat un article nou al nostre lloc web. \r\n\r\n{{POSTTITLE}}\r\n{{POSTDESC}}\r\n\r\nPodeu veure l''article i els comentaris associats a {{POSTLINK}}\r\nHeu rebut aquest correu perquè vau demanar que se us notifiqués la publicació d''articles nous\r\n\r\n', '{{POSTTITLE}}', '', 'publish', 'closed', 'closed', '', 'posttitle-11', '', '', '2019-05-13 09:44:10', '2019-05-13 07:44:10', '', 0, 'http://pwc-int.educacio.intranet/agora/mastersec/es_template/posttitle-11/', 0, 'es_template', '', 0),
(480, 0, '2019-05-13 09:44:10', '2019-05-13 07:44:10', 'Hola {{NAME}},\r\n\r\nHem publicat un article nou al nostre lloc web. \r\n\r\n{{POSTTITLE}}\r\n{{POSTDESC}}\r\n\r\nPodeu veure l''article i els comentaris associats a {{POSTLINK}}\r\nHeu rebut aquest correu perquè vau demanar que se us notifiqués la publicació d''articles nous\r\n\r\n', '{{POSTTITLE}}', '', 'publish', 'closed', 'closed', '', 'posttitle-12', '', '', '2019-05-13 09:44:10', '2019-05-13 07:44:10', '', 0, 'http://pwc-int.educacio.intranet/agora/mastersec/es_template/posttitle-12/', 0, 'es_template', '', 0),
(481, 0, '2019-05-13 09:44:10', '2019-05-13 07:44:10', 'Hola {{NAME}},\r\n\r\nHem publicat un article nou al nostre lloc web. \r\n\r\n{{POSTTITLE}}\r\n{{POSTDESC}}\r\n\r\nPodeu veure l''article i els comentaris associats a {{POSTLINK}}\r\nHeu rebut aquest correu perquè vau demanar que se us notifiqués la publicació d''articles nous\r\n\r\n', '{{POSTTITLE}}', '', 'publish', 'closed', 'closed', '', 'posttitle-13', '', '', '2019-05-13 09:44:10', '2019-05-13 07:44:10', '', 0, 'http://pwc-int.educacio.intranet/agora/mastersec/es_template/posttitle-13/', 0, 'es_template', '', 0),
(482, 0, '2019-05-13 09:44:10', '2019-05-13 07:44:10', 'Hola {{EMAIL}},\r\n\r\nHem publicat un article nou al nostre lloc web. {{POSTTITLE}}\r\n{{POSTIMAGE}}\r\n{{POSTFULL}}\r\nPodeu veure l''últim article a {{POSTLINK}}\r\nHeu rebut aquest correu perquè vau demanar que se us notifiqués la publicació d''articles nous\r\n\r\nGràcies i salutacions\r\nAdmin', 'Notificació d''article nou {{POSTTITLE}}', '', 'publish', 'closed', 'closed', '', 'notificacio-darticle-nou-posttitle', '', '', '2019-05-13 09:44:10', '2019-05-13 07:44:10', '', 0, 'http://pwc-int.educacio.intranet/agora/mastersec/es_template/notificacio-darticle-nou-posttitle/', 0, 'es_template', '', 0),
(483, 0, '2019-05-13 09:44:10', '2019-05-13 07:44:10', '<strong style="color: #990000"> Subscriptors de correu</strong>\r\n\r\nL''extensió subscripcions de correu de correu té diferents opcions per enviar butlletins als subscriptors.\r\nTé una pàgina separada amb un editor HTML per crear un butlletí amb aquest format.\r\nL''extensió disposa d''opcions per enviar correus de notificació als subscriptors quan es publiquen articles nous al lloc web. També té una pàgina per poder afegir i eliminar les categories a les que s''enviaran les notificacions.\r\nUtilitzant les opcions de l''extensió d''importació i exportació els administradors podran importar fàcilment els usuaris registrats.\r\n\r\n<strong style="color: #990000">Característiques de l''extensió</strong>\r\n<ol>\r\n	<li>Correu de notificació als subscriptors quan es publiquin articles nous.</li>\r\n	<li>Giny de subscripció</li>\r\n	<li>Correu de subscripció amb confirmació per correu i subscripció simple per facilitar la subscripció.</li>\r\n	<li>Notificació per correu electrònic a l''administrador quan els usuaris es subscriguin (Opcional)</li>\r\n	<li>Correu de benvinguda automàtic als subscriptors (Opcional).</li>\r\n	<li>Enllaç per donar-se de baixa del correu.</li>\r\n	<li>Importació / Exportació dels correus dels subscriptors.</li>\r\n	<li>Editor d''HTML per redactar el butlletí.</li>\r\n</ol>\r\n<strong>Gràcies i salutacions</strong>\r\nAdmin', 'Butlletí d''exemple', '', 'publish', 'closed', 'closed', '', 'butlleti-dexemple', '', '', '2019-05-13 09:44:10', '2019-05-13 07:44:10', '', 0, 'http://pwc-int.educacio.intranet/agora/mastersec/es_template/butlleti-dexemple/', 0, 'es_template', '', 0),
(484, 2, '2019-05-13 12:44:42', '2019-05-13 10:44:42', '{{{ges.action}}}:\n\n<blockquote>{{{usermessage}}}</blockquote>\n&ndash;\n<a href="{{{thread.url}}}">Ves a la discussió</a> per respondre o posar-se al dia de la conversa.\n{{{ges.email-setting-description}}}', '[{{{site.name}}}] {{{ges.subject}}}', '{{{ges.action}}}:\n\n"{{{usermessage}}}"\n\nVes a la discussió per respondre o posar-te al dia de la conversa:\n{{{thread.url}}}\n\n----\n\n{{{ges.email-setting-description}}}\n\n{{{ges.email-setting-links}}}', 'publish', 'closed', 'closed', '', 'site-name-ges-subject', '', '', '2019-05-13 12:44:42', '2019-05-13 10:44:42', '', 0, 'http://pwc-int.educacio.intranet/agora/mastersec/general/site-name-ges-subject/', 0, 'bp-email', '', 0),
(485, 2, '2019-05-13 12:44:42', '2019-05-13 10:44:42', '{{{ges.digest-summary}}}{{{usermessage}}}\n&ndash;\nHeu rebut aquest missatge perquè esteu subscrit per rebre el resum de l''activitat en algun dels vostres grups a {{site.name}}.', '[{{{site.name}}}] {{{ges.subject}}}', '{{{ges.digest-summary}}}\n\n{{{usermessage}}}\n\n----\n\nHeu rebut aquest missatge perquè esteu subscrit per rebre el resum de l''activitat en algun dels vostres grups a {{{site.name}}}.\n\nPer desactivar aquestes notificacions per grup, inicieu sessió i [visiteu la pàgina dels vostres grups]({{{ges.settings-link}}}) on podreu gestionar la configuració del correu per cada grup.', 'publish', 'closed', 'closed', '', 'site-name-ges-subject-2', '', '', '2019-05-13 12:44:42', '2019-05-13 10:44:42', '', 0, 'http://pwc-int.educacio.intranet/agora/mastersec/general/site-name-ges-subject-2/', 0, 'bp-email', '', 0),
(486, 2, '2019-05-13 12:44:42', '2019-05-13 10:44:42', 'Aquesta és una notificació del grup {{{group.link}}}:\n\n{{{usermessage}}}\n\n&ndash;\n<strong>Tingueu en compte:</strong> les notificacions d''administració s''envien a tothom del node i no es poden deshabilitar.\nSi creieu que el servei s''està utilitzant malament contacteu amb l''administrador del lloc web.', '[{{{site.name}}}] {{{ges.subject}}} - del node "{{{group.name}}}"', 'Aquesta és una notificació del grup "{{{group.name}}}":\n\n"{{{usermessage}}}"\n\n----\n\nTingueu en compte: les notificacions d''administració s''envien a tothom del node i no es poden deshabilitar.\n\nSi creieu que el servei s''està utilitzant malament contacteu amb l''administrador del lloc web.\n\nVisiteu la pàgina d''inici del node en aquest enllaç:\n{{{group.url}}}', 'publish', 'closed', 'closed', '', 'site-name-ges-subject-del-node-group-name', '', '', '2019-05-13 12:44:42', '2019-05-13 10:44:42', '', 0, 'http://pwc-int.educacio.intranet/agora/mastersec/general/site-name-ges-subject-del-node-group-name/', 0, 'bp-email', '', 0),
(487, 2, '2019-05-13 12:44:42', '2019-05-13 10:44:42', '{{{usermessage}}}', '[{{{site.name}}}] {{{ges.subject}}}', '{{{usermessage}}}', 'publish', 'closed', 'closed', '', 'site-name-ges-subject-3', '', '', '2019-05-13 12:44:42', '2019-05-13 10:44:42', '', 0, 'http://pwc-int.educacio.intranet/agora/mastersec/general/site-name-ges-subject-3/', 0, 'bp-email', '', 0);

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
) ENGINE=InnoDB AUTO_INCREMENT=104 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Bolcant dades de la taula `wp_terms`
--

INSERT INTO `wp_terms` (`term_id`, `name`, `slug`, `term_group`) VALUES
(1, 'General', 'general', 0),
(2, 'Menú principal', 'menu-principal', 0),
(3, 'ESO', 'eso', 0),
(4, 'ESO 1', 'eso-1', 0),
(5, 'ESO 2', 'eso-2', 0),
(6, 'ESO 3', 'eso-3', 0),
(7, 'ESO 4', 'eso-4', 0),
(8, 'Batxillerat', 'batxillerat', 0),
(9, 'ESO 1A', 'eso-1a', 0),
(10, 'ESO 1B', 'eso-1b', 0),
(11, 'ESO 1C', 'eso-1c', 0),
(14, 'ESO 2A', 'eso-2a', 0),
(15, 'ESO 2B', 'eso-2b', 0),
(16, 'ESO 2C', 'eso-2c', 0),
(19, 'ESO 3A', 'eso-3a', 0),
(20, 'ESO 3B', 'eso-3b', 0),
(21, 'ESO 3C', 'eso-3c', 0),
(24, 'ESO 4A', 'eso-4a', 0),
(25, 'ESO 4B', 'eso-4b', 0),
(26, 'ESO 4C', 'eso-4c', 0),
(29, 'Portada', 'portada', 0),
(30, 'Cicles Formatius', 'cicles-formatius', 0),
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
(48, 'actes', 'actes', 0),
(51, 'bp_docs_access_group_member_1', 'bp_docs_access_group_member_1', 0),
(53, 'Fotografia', 'bp_docs_associated_group_17', 0),
(55, 'Menú exemple', 'menu-exemple', 0),
(56, 'Escola verda', 'escola-verda', 0),
(57, 'Expressió escrita', 'expressio-escrita', 0),
(58, 'Tallers', 'tallers', 0),
(61, 'MenuNodes', 'menunodes', 0),
(62, 'LOPD', 'lopd', 0),
(63, 'autoritzacions', 'autoritzacions', 0),
(64, 'salut', 'salut', 0),
(66, 'orientació', 'orientacio', 0),
(67, 'organització i gestió del centre', 'organitzacio-i-gestio-del-centre', 0),
(68, 'Menú documents', 'menu-documents', 0),
(69, 'secretaria', 'secretaria', 0),
(70, 'ESO 1', 'eso-1', 0),
(71, 'ESO 2', 'eso-2', 0),
(72, 'ESO 3', 'eso-3', 0),
(73, 'ESO 4', 'eso-4', 0),
(74, 'Cinema', 'bp_docs_associated_group_15', 0),
(75, 'etiqueta a', 'etiqueta-a', 0),
(76, 'etiqueta b', 'etiqueta-b', 0),
(77, 'bp_docs_folder_in_group_15', 'bp_docs_folder_in_group_15', 0),
(78, 'bp_docs_doc_in_folder_432', 'bp_docs_doc_in_folder_432', 0),
(79, 'bp_docs_doc_in_folder_433', 'bp_docs_doc_in_folder_433', 0),
(80, 'bp_docs_doc_in_folder_434', 'bp_docs_doc_in_folder_434', 0),
(81, 'activity-comment', 'activity-comment', 0),
(82, 'activity-comment-author', 'activity-comment-author', 0),
(83, 'activity-at-message', 'activity-at-message', 0),
(84, 'groups-at-message', 'groups-at-message', 0),
(85, 'core-user-registration', 'core-user-registration', 0),
(86, 'core-user-registration-with-blog', 'core-user-registration-with-blog', 0),
(87, 'friends-request', 'friends-request', 0),
(88, 'friends-request-accepted', 'friends-request-accepted', 0),
(89, 'groups-details-updated', 'groups-details-updated', 0),
(90, 'groups-invitation', 'groups-invitation', 0),
(91, 'groups-member-promoted', 'groups-member-promoted', 0),
(92, 'groups-membership-request', 'groups-membership-request', 0),
(93, 'messages-unread', 'messages-unread', 0),
(94, 'settings-verify-email-change', 'settings-verify-email-change', 0),
(95, 'groups-membership-request-accepted', 'groups-membership-request-accepted', 0),
(96, 'groups-membership-request-rejected', 'groups-membership-request-rejected', 0),
(97, 'google', 'google', 0),
(98, 'default-calendar', 'default-calendar', 0),
(99, 'invite-anyone-invitation', 'invite-anyone-invitation', 0),
(100, 'bp-ges-single', 'bp-ges-single', 0),
(101, 'bp-ges-digest', 'bp-ges-digest', 0),
(102, 'bp-ges-notice', 'bp-ges-notice', 0),
(103, 'bp-ges-welcome', 'bp-ges-welcome', 0);

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
(30, 2, 0),
(41, 2, 0),
(45, 2, 0),
(48, 2, 0),
(51, 2, 0),
(54, 2, 0),
(59, 2, 0),
(71, 2, 0),
(72, 2, 0),
(73, 2, 0),
(74, 2, 0),
(79, 2, 0),
(80, 2, 0),
(86, 2, 0),
(90, 2, 0),
(91, 2, 0),
(92, 9, 0),
(93, 9, 0),
(94, 9, 0),
(95, 10, 0),
(96, 10, 0),
(97, 10, 0),
(98, 11, 0),
(99, 11, 0),
(100, 11, 0),
(101, 12, 0),
(102, 12, 0),
(103, 12, 0),
(109, 3, 0),
(109, 4, 0),
(109, 5, 0),
(109, 6, 0),
(109, 7, 0),
(109, 8, 0),
(109, 13, 0),
(109, 14, 0),
(109, 15, 0),
(109, 18, 0),
(109, 19, 0),
(109, 20, 0),
(109, 23, 0),
(109, 24, 0),
(109, 25, 0),
(109, 28, 0),
(109, 29, 0),
(109, 30, 0),
(109, 33, 0),
(109, 41, 0),
(109, 42, 0),
(120, 4, 0),
(120, 13, 0),
(120, 14, 0),
(120, 15, 0),
(120, 33, 0),
(120, 34, 0),
(120, 35, 0),
(120, 43, 0),
(120, 44, 0),
(127, 4, 0),
(127, 5, 0),
(127, 6, 0),
(127, 8, 0),
(127, 19, 0),
(127, 20, 0),
(127, 29, 0),
(127, 30, 0),
(127, 33, 0),
(127, 35, 0),
(127, 43, 0),
(127, 44, 0),
(129, 33, 0),
(129, 34, 0),
(129, 41, 0),
(129, 42, 0),
(134, 6, 0),
(134, 23, 0),
(134, 24, 0),
(134, 25, 0),
(134, 33, 0),
(134, 35, 0),
(134, 41, 0),
(134, 42, 0),
(137, 8, 0),
(137, 18, 0),
(137, 28, 0),
(137, 33, 0),
(137, 35, 0),
(137, 48, 0),
(137, 49, 0),
(143, 2, 0),
(161, 4, 0),
(161, 5, 0),
(161, 33, 0),
(161, 45, 0),
(163, 6, 0),
(163, 7, 0),
(163, 33, 0),
(163, 46, 0),
(163, 47, 0),
(183, 2, 0),
(184, 35, 0),
(184, 46, 0),
(184, 47, 0),
(188, 36, 0),
(189, 36, 0),
(190, 36, 0),
(191, 36, 0),
(192, 36, 0),
(193, 36, 0),
(194, 36, 0),
(197, 2, 0),
(206, 37, 0),
(207, 37, 0),
(211, 38, 0),
(211, 39, 0),
(211, 40, 0),
(216, 37, 0),
(224, 97, 0),
(224, 98, 0),
(228, 2, 0),
(229, 2, 0),
(244, 2, 0),
(245, 2, 0),
(246, 2, 0),
(247, 2, 0),
(248, 97, 0),
(248, 98, 0),
(249, 59, 0),
(250, 59, 0),
(251, 59, 0),
(252, 59, 0),
(253, 59, 0),
(254, 59, 0),
(289, 65, 0),
(290, 65, 0),
(291, 65, 0),
(292, 51, 0),
(292, 66, 0),
(292, 67, 0),
(292, 73, 0),
(295, 51, 0),
(295, 66, 0),
(295, 67, 0),
(295, 73, 0),
(297, 51, 0),
(297, 66, 0),
(297, 67, 0),
(297, 73, 0),
(300, 51, 0),
(300, 66, 0),
(300, 67, 0),
(300, 73, 0),
(302, 51, 0),
(302, 67, 0),
(302, 68, 0),
(302, 73, 0),
(304, 50, 0),
(304, 55, 0),
(304, 68, 0),
(307, 51, 0),
(307, 70, 0),
(307, 73, 0),
(308, 50, 0),
(308, 55, 0),
(312, 50, 0),
(312, 55, 0),
(314, 50, 0),
(314, 55, 0),
(317, 50, 0),
(317, 55, 0),
(318, 50, 0),
(318, 55, 0),
(320, 50, 0),
(320, 55, 0),
(323, 50, 0),
(323, 52, 0),
(323, 55, 0),
(326, 50, 0),
(326, 55, 0),
(328, 50, 0),
(328, 55, 0),
(330, 50, 0),
(330, 55, 0),
(332, 50, 0),
(332, 55, 0),
(334, 50, 0),
(334, 55, 0),
(336, 51, 0),
(336, 68, 0),
(336, 73, 0),
(338, 51, 0),
(338, 68, 0),
(338, 73, 0),
(339, 50, 0),
(339, 55, 0),
(343, 50, 0),
(343, 55, 0),
(346, 50, 0),
(346, 55, 0),
(348, 50, 0),
(348, 55, 0),
(350, 50, 0),
(350, 55, 0),
(352, 50, 0),
(352, 55, 0),
(354, 50, 0),
(354, 55, 0),
(354, 71, 0),
(356, 50, 0),
(356, 55, 0),
(356, 71, 0),
(358, 50, 0),
(358, 55, 0),
(358, 71, 0),
(360, 50, 0),
(360, 55, 0),
(360, 71, 0),
(362, 50, 0),
(362, 55, 0),
(364, 50, 0),
(364, 55, 0),
(364, 71, 0),
(366, 50, 0),
(366, 55, 0),
(368, 51, 0),
(368, 73, 0),
(370, 51, 0),
(370, 73, 0),
(379, 50, 0),
(379, 55, 0),
(383, 50, 0),
(383, 55, 0),
(385, 50, 0),
(385, 55, 0),
(387, 50, 0),
(387, 55, 0),
(387, 71, 0),
(391, 50, 0),
(391, 55, 0),
(396, 72, 0),
(397, 72, 0),
(398, 72, 0),
(399, 72, 0),
(400, 72, 0),
(401, 72, 0),
(402, 72, 0),
(403, 72, 0),
(404, 72, 0),
(405, 72, 0),
(406, 72, 0),
(407, 72, 0),
(408, 72, 0),
(409, 72, 0),
(410, 72, 0),
(428, 2, 0),
(435, 81, 0),
(436, 82, 0),
(437, 83, 0),
(438, 84, 0),
(439, 85, 0),
(440, 86, 0),
(441, 87, 0),
(442, 88, 0),
(443, 89, 0),
(444, 90, 0),
(445, 91, 0),
(446, 92, 0),
(447, 93, 0),
(448, 94, 0),
(449, 95, 0),
(450, 96, 0),
(468, 99, 0),
(484, 100, 0),
(485, 101, 0),
(486, 102, 0),
(487, 103, 0);

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
) ENGINE=InnoDB AUTO_INCREMENT=104 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Bolcant dades de la taula `wp_term_taxonomy`
--

INSERT INTO `wp_term_taxonomy` (`term_taxonomy_id`, `term_id`, `taxonomy`, `description`, `parent`, `count`) VALUES
(1, 1, 'category', '', 0, 0),
(2, 2, 'nav_menu', '', 0, 28),
(3, 3, 'category', '', 0, 1),
(4, 4, 'category', '', 3, 4),
(5, 5, 'category', '', 3, 3),
(6, 6, 'category', '', 3, 4),
(7, 7, 'category', '', 3, 2),
(8, 8, 'category', '', 0, 3),
(9, 70, 'nav_menu', '', 0, 3),
(10, 71, 'nav_menu', '', 0, 3),
(11, 72, 'nav_menu', '', 0, 3),
(12, 73, 'nav_menu', '', 0, 3),
(13, 9, 'category', '', 4, 2),
(14, 10, 'category', '', 4, 2),
(15, 11, 'category', '', 4, 2),
(18, 14, 'category', '', 5, 2),
(19, 15, 'category', '', 5, 2),
(20, 16, 'category', '', 5, 2),
(23, 19, 'category', '', 6, 2),
(24, 20, 'category', '', 6, 2),
(25, 21, 'category', '', 6, 2),
(28, 24, 'category', '', 7, 2),
(29, 25, 'category', '', 7, 2),
(30, 26, 'category', '', 7, 2),
(33, 29, 'category', '', 0, 8),
(34, 30, 'category', '', 0, 2),
(35, 31, 'category', '', 0, 5),
(36, 32, 'nav_menu', '', 0, 7),
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
(50, 46, 'bp_docs_associated_item', 'Docs associated with the group Professorat', 0, 31),
(51, 47, 'bp_docs_access', '', 0, 10),
(52, 48, 'bp_docs_tag', '', 0, 1),
(55, 51, 'bp_docs_access', '', 0, 31),
(57, 53, 'bp_docs_associated_item', 'Docs associated with the group Fotografia', 0, 0),
(59, 55, 'nav_menu', '', 0, 6),
(60, 56, 'post_tag', '', 0, 0),
(61, 57, 'post_tag', '', 0, 0),
(62, 58, 'post_tag', '', 0, 0),
(65, 61, 'nav_menu', '', 0, 3),
(66, 62, 'bp_docs_tag', '', 0, 4),
(67, 63, 'bp_docs_tag', '', 0, 5),
(68, 64, 'bp_docs_tag', '', 0, 4),
(70, 66, 'bp_docs_tag', '', 0, 1),
(71, 67, 'bp_docs_tag', '', 0, 6),
(72, 68, 'nav_menu', '', 0, 15),
(73, 69, 'bp_docs_tag', '', 0, 10),
(74, 74, 'bp_docs_associated_item', 'Document associat a group Cinema', 0, 0),
(75, 75, 'bp_docs_tag', '', 0, 0),
(76, 76, 'bp_docs_tag', '', 0, 0),
(77, 77, 'bp_docs_folder_in_group', '', 0, 0),
(78, 78, 'bp_docs_doc_in_folder', '', 0, 0),
(79, 79, 'bp_docs_doc_in_folder', '', 0, 0),
(80, 80, 'bp_docs_doc_in_folder', '', 0, 0),
(81, 81, 'bp-email-type', 'A member has replied to an activity update that the recipient posted.', 0, 0),
(82, 82, 'bp-email-type', 'A member has replied to a comment on an activity update that the recipient posted.', 0, 0),
(83, 83, 'bp-email-type', 'Recipient was mentioned in an activity update.', 0, 0),
(84, 84, 'bp-email-type', 'Recipient was mentioned in a group activity update.', 0, 0),
(85, 85, 'bp-email-type', 'Recipient has registered for an account.', 0, 0),
(86, 86, 'bp-email-type', 'Recipient has registered for an account and site.', 0, 0),
(87, 87, 'bp-email-type', 'A member has sent a friend request to the recipient.', 0, 0),
(88, 88, 'bp-email-type', 'Recipient has had a friend request accepted by a member.', 0, 0),
(89, 89, 'bp-email-type', 'A group''s details were updated.', 0, 0),
(90, 90, 'bp-email-type', 'A member has sent a group invitation to the recipient.', 0, 0),
(91, 91, 'bp-email-type', 'Recipient''s status within a group has changed.', 0, 0),
(92, 92, 'bp-email-type', 'A member has requested permission to join a group.', 0, 0),
(93, 93, 'bp-email-type', 'Recipient has received a private message.', 0, 0),
(94, 94, 'bp-email-type', 'Recipient has changed their email address.', 0, 0),
(95, 95, 'bp-email-type', 'Recipient had requested to join a group, which was accepted.', 0, 0),
(96, 96, 'bp-email-type', 'Recipient had requested to join a group, which was rejected.', 0, 0),
(97, 97, 'calendar_feed', '', 0, 2),
(98, 98, 'calendar_type', '', 0, 2),
(99, 99, 'bp-email-type', 'Es convida un usuari a unir-se al lloc per correu electrònic. Utilitzat pel connector Invite Anyone.', 0, 0),
(100, 100, 'bp-email-type', 'Un membre ha creat una activitat grupal. Utilitzat pel connector de Subscripció de correu electrònic del node durant enviaments immediats.', 0, 0),
(101, 101, 'bp-email-type', 'S''ha enviat un correu de resum a un membre. Utilitzat pel connector de Subscripció de correu electrònic del node durant els enviaments de resums diaris o setmanals.', 0, 0),
(102, 102, 'bp-email-type', 'L''administrador del node ha enviat una notificació a tots els membres del grup. Utilitzat pel connector de Subscripció de correu electrònic del node.', 0, 0),
(103, 103, 'bp-email-type', 'S''ha enviat un correu de benvinguda als nous membres del node. Utilitzat pel connector de Subscripció de correu electrònic del node.', 0, 0);

-- --------------------------------------------------------

--
-- Estructura de la taula `wp_usermeta`
--

CREATE TABLE IF NOT EXISTS `wp_usermeta` (
`umeta_id` bigint(20) unsigned NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `meta_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_value` longtext COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB AUTO_INCREMENT=185 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(12, 1, 'dismissed_wp_pointers', 'wp350_media,wp360_revisions,wp360_locks,wp390_widgets,wp410_dfw'),
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
(26, 2, 'dismissed_wp_pointers', 'wp350_media,wp360_revisions,wp360_locks,wp390_widgets,wp410_dfw,addtoany_settings_pointer,wp496_privacy'),
(27, 2, 'wp_dashboard_quick_press_last_post_id', '4'),
(28, 2, 'last_activity', '2019-05-13 12:44:25'),
(29, 2, 'closedpostboxes_slideshow', 'a:1:{i:2;s:5:"style";}'),
(30, 2, 'metaboxhidden_slideshow', 'a:2:{i:3;s:7:"slugdiv";i:4;s:5:"style";}'),
(31, 2, 'managenav-menuscolumnshidden', 'a:4:{i:0;s:11:"link-target";i:1;s:11:"css-classes";i:2;s:3:"xfn";i:3;s:11:"description";}'),
(32, 2, 'metaboxhidden_nav-menus', 'a:11:{i:0;s:23:"add-buddypress-nav-menu";i:1;s:8:"add-post";i:2;s:9:"add-forum";i:3;s:10:"add-bp_doc";i:4;s:12:"add-post_tag";i:5;s:15:"add-post_format";i:6;s:15:"add-ia_invitees";i:7;s:21:"add-ia_invited_groups";i:8;s:27:"add-bp_docs_associated_item";i:9;s:18:"add-bp_docs_access";i:10;s:15:"add-bp_docs_tag";}'),
(33, 2, 'nav_menu_recently_edited', '60'),
(34, 2, 'closedpostboxes_dashboard', 'a:0:{}'),
(35, 2, 'metaboxhidden_dashboard', 'a:0:{}'),
(36, 2, 'meta-box-order_dashboard', 'a:4:{s:6:"normal";s:43:"dashboard_right_now,bbp-dashboard-right-now";s:4:"side";s:58:"dashboard_quick_press,dashboard_activity,dashboard_primary";s:7:"column3";s:0:"";s:7:"column4";s:0:"";}'),
(39, 2, 'show_welcome_panel', '1'),
(40, 2, 'wp_user-settings', 'editor=tinymce&libraryContent=browse&hidetb=1'),
(41, 2, 'wp_user-settings-time', '1445255953'),
(43, 2, 'screen_layout_post', '2'),
(46, 2, 'total_group_count', '0'),
(47, 2, 'ass_digest_items', 'a:1:{s:3:"dig";a:1:{i:3;a:1:{i:0;i:5;}}}'),
(48, 1, 'last_activity', '2017-03-24 12:41:15'),
(49, 1, 'total_group_count', '19'),
(51, 1, 'screen_layout_post', '2'),
(52, 1, 'wp_user-settings', 'editor=tinymce&hidetb=1&libraryContent=browse'),
(53, 1, 'wp_user-settings-time', '1490349360'),
(56, 1, 'nav_menu_recently_edited', '2'),
(57, 1, 'managenav-menuscolumnshidden', 'a:4:{i:0;s:11:"link-target";i:1;s:11:"css-classes";i:2;s:3:"xfn";i:3;s:11:"description";}'),
(58, 1, 'metaboxhidden_nav-menus', 'a:11:{i:0;s:23:"add-buddypress-nav-menu";i:1;s:8:"add-post";i:2;s:9:"add-forum";i:3;s:10:"add-bp_doc";i:4;s:12:"add-post_tag";i:5;s:15:"add-post_format";i:6;s:15:"add-ia_invitees";i:7;s:21:"add-ia_invited_groups";i:8;s:27:"add-bp_docs_associated_item";i:9;s:18:"add-bp_docs_access";i:10;s:15:"add-bp_docs_tag";}'),
(59, 1, 'closedpostboxes_slideshow', 'a:0:{}'),
(60, 1, 'metaboxhidden_slideshow', 'a:1:{i:3;s:7:"slugdiv";}'),
(61, 1, 'meta-box-order_dashboard', 'a:4:{s:6:"normal";s:19:"dashboard_right_now";s:4:"side";s:18:"dashboard_activity";s:7:"column3";s:0:"";s:7:"column4";s:0:"";}'),
(62, 1, 'meta-box-order_slideshow', 'a:3:{s:4:"side";s:27:"submitdiv,slides-list,,,,,,";s:6:"normal";s:34:"information,slugdiv,style,settings";s:8:"advanced";s:0:"";}'),
(63, 1, 'screen_layout_slideshow', '2'),
(64, 1, 'ass_digest_items', 'a:1:{s:3:"dig";a:10:{i:2;a:1:{i:0;i:11;}i:1;a:66:{i:0;i:12;i:1;i:49;i:2;i:50;i:3;i:52;i:4;i:54;i:5;i:68;i:6;i:69;i:7;i:70;i:8;i:71;i:9;i:72;i:10;i:73;i:11;i:74;i:12;i:77;i:13;i:78;i:14;i:79;i:15;i:80;i:16;i:81;i:17;i:82;i:18;i:84;i:19;i:85;i:20;i:86;i:21;i:87;i:22;i:92;i:23;i:93;i:24;i:94;i:25;i:95;i:26;i:96;i:27;i:97;i:28;i:98;i:29;i:99;i:30;i:101;i:31;i:102;i:32;i:103;i:33;i:106;i:34;i:107;i:35;i:108;i:36;i:109;i:37;i:110;i:38;i:111;i:39;i:112;i:40;i:114;i:41;i:115;i:42;i:116;i:43;i:117;i:44;i:121;i:45;i:122;i:46;i:126;i:47;i:127;i:48;i:128;i:49;i:129;i:50;i:130;i:51;i:131;i:52;i:132;i:53;i:133;i:54;i:134;i:55;i:136;i:56;i:138;i:57;i:140;i:58;i:142;i:59;i:143;i:60;i:144;i:61;i:145;i:62;i:146;i:63;i:147;i:64;i:151;i:65;i:152;}i:5;a:1:{i:0;i:15;}i:9;a:1:{i:0;i:20;}i:14;a:4:{i:0;i:27;i:1;i:34;i:2;i:44;i:3;i:47;}i:15;a:3:{i:0;i:29;i:1;i:43;i:2;i:151;}i:16;a:1:{i:0;i:31;}i:17;a:4:{i:0;i:33;i:1;i:42;i:2;i:45;i:3;i:55;}i:18;a:1:{i:0;i:38;}i:19;a:1:{i:0;i:41;}}}'),
(66, 2, 'closedpostboxes_gce_feed', 'a:1:{i:0;s:21:"gce_feed_sidebar_help";}'),
(67, 2, 'metaboxhidden_gce_feed', 'a:1:{i:0;s:7:"slugdiv";}'),
(68, 1, 'closedpostboxes_gce_feed', 'a:0:{}'),
(69, 1, 'metaboxhidden_gce_feed', 'a:2:{i:0;s:24:"gce_display_options_meta";i:1;s:7:"slugdiv";}'),
(70, 2, 'bp_docs_count', '4'),
(73, 2, 'meta-box-order_post', 'a:3:{s:4:"side";s:66:"submitdiv,postimagediv,postexcerpt,formatdiv,metabox1,tagsdiv-post";s:6:"normal";s:11:"categorydiv";s:8:"advanced";s:0:"";}'),
(74, 2, 'metaboxhidden_post', 'a:5:{i:0;s:12:"revisionsdiv";i:1;s:16:"commentstatusdiv";i:2;s:11:"commentsdiv";i:3;s:7:"slugdiv";i:4;s:9:"authordiv";}'),
(75, 2, 'meta-box-order_page', 'a:3:{s:4:"side";s:23:"submitdiv,pageparentdiv";s:6:"normal";s:16:"commentstatusdiv";s:8:"advanced";s:0:"";}'),
(76, 2, 'metaboxhidden_page', 'a:5:{i:0;s:9:"authordiv";i:1;s:11:"commentsdiv";i:2;s:16:"commentstatusdiv";i:3;s:12:"revisionsdiv";i:4;s:7:"slugdiv";}'),
(77, 2, 'closedpostboxes_page', 'a:1:{i:0;s:11:"layout_meta";}'),
(168, 2, 'closedpostboxes_post', 'a:0:{}'),
(169, 2, 'bp_liked_activities', 'a:0:{}'),
(170, 1, 'bp_docs_count', '0'),
(171, 1, 'meta-box-order_page', 'a:3:{s:4:"side";s:23:"submitdiv,pageparentdiv";s:6:"normal";s:16:"commentstatusdiv";s:8:"advanced";s:0:"";}'),
(172, 1, 'metaboxhidden_page', 'a:5:{i:0;s:9:"authordiv";i:1;s:11:"commentsdiv";i:2;s:16:"commentstatusdiv";i:3;s:12:"revisionsdiv";i:4;s:7:"slugdiv";}'),
(173, 1, 'closedpostboxes_page', 'a:1:{i:0;s:11:"layout_meta";}'),
(178, 1, 'session_tokens', 'a:1:{s:64:"5dce2a44717ba9bfae444473082ef52a9ca941d3c0d1d36d4dbfa4fc9b0f6429";a:4:{s:10:"expiration";i:1490522165;s:2:"ip";s:11:"10.155.7.35";s:2:"ua";s:104:"Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/50.0.2661.75 Safari/537.36";s:5:"login";i:1490349365;}}'),
(182, 2, 'session_tokens', 'a:1:{s:64:"1f4a50fe2b86ac707cb58614039fa984341152da2dc9a414ad7ff9bb9abb7a22";a:4:{s:10:"expiration";i:1557917065;s:2:"ip";s:11:"10.155.7.35";s:2:"ua";s:76:"Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:66.0) Gecko/20100101 Firefox/66.0";s:5:"login";i:1557744265;}}');

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
(1, 'admin', '$P$BPDg3.K.06muqx2mhrbR6QClCbE3ih/', 'admin', 'a8000007@xtec.cat', '', '2014-09-12 09:43:38', '', 0, 'admin'),
(2, 'xtecadmin', '$P$B8EPtIrw72D/qDzZwskkR7DcphmR3l.', 'xtecadmin', 'agora@xtec.invalid', '', '2014-09-12 09:45:10', '', 0, 'xtecadmin');

-- --------------------------------------------------------

--
-- Estructura de la taula `wp_wsluserscontacts`
--

CREATE TABLE IF NOT EXISTS `wp_wsluserscontacts` (
`id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `provider` varchar(50) NOT NULL,
  `identifier` varchar(255) NOT NULL,
  `full_name` varchar(150) NOT NULL,
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
  `provider` varchar(50) NOT NULL,
  `object_sha` varchar(45) NOT NULL,
  `identifier` varchar(255) NOT NULL,
  `profileurl` varchar(255) NOT NULL,
  `websiteurl` varchar(255) NOT NULL,
  `photourl` varchar(255) NOT NULL,
  `displayname` varchar(150) NOT NULL,
  `description` varchar(255) NOT NULL,
  `firstname` varchar(150) NOT NULL,
  `lastname` varchar(150) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `language` varchar(20) NOT NULL,
  `age` varchar(10) NOT NULL,
  `birthday` int(11) NOT NULL,
  `birthmonth` int(11) NOT NULL,
  `birthyear` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `emailverified` varchar(255) NOT NULL,
  `phone` varchar(75) NOT NULL,
  `address` varchar(255) NOT NULL,
  `country` varchar(75) NOT NULL,
  `region` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `zip` varchar(25) NOT NULL
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
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `id` (`id`), ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `wp_wslusersprofiles`
--
ALTER TABLE `wp_wslusersprofiles`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `id` (`id`), ADD KEY `user_id` (`user_id`), ADD KEY `provider` (`provider`);

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
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `wp_bp_activity`
--
ALTER TABLE `wp_bp_activity`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=151;
--
-- AUTO_INCREMENT for table `wp_bp_activity_meta`
--
ALTER TABLE `wp_bp_activity_meta`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `wp_bp_friends`
--
ALTER TABLE `wp_bp_friends`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `wp_bp_groups`
--
ALTER TABLE `wp_bp_groups`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `wp_bp_groups_groupmeta`
--
ALTER TABLE `wp_bp_groups_groupmeta`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=151;
--
-- AUTO_INCREMENT for table `wp_bp_groups_members`
--
ALTER TABLE `wp_bp_groups_members`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
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
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=76;
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
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
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
MODIFY `option_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10369;
--
-- AUTO_INCREMENT for table `wp_postmeta`
--
ALTER TABLE `wp_postmeta`
MODIFY `meta_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1993;
--
-- AUTO_INCREMENT for table `wp_posts`
--
ALTER TABLE `wp_posts`
MODIFY `ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=488;
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
MODIFY `term_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=104;
--
-- AUTO_INCREMENT for table `wp_term_taxonomy`
--
ALTER TABLE `wp_term_taxonomy`
MODIFY `term_taxonomy_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=104;
--
-- AUTO_INCREMENT for table `wp_usermeta`
--
ALTER TABLE `wp_usermeta`
MODIFY `umeta_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=185;
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
