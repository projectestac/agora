-- phpMyAdmin SQL Dump
-- version 3.4.3.2
-- http://www.phpmyadmin.net
--
-- Servidor: pdb-int:3308
-- Temps de generació: 05-04-2016 a les 12:16:54
-- Versió del servidor: 5.5.38
-- Versió de PHP : 5.4.16

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de dades: `usu6`
--

-- --------------------------------------------------------

--
-- Estructura de la taula `wp_bp_activity`
--

CREATE TABLE `wp_bp_activity` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
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
  `is_spam` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `date_recorded` (`date_recorded`),
  KEY `user_id` (`user_id`),
  KEY `item_id` (`item_id`),
  KEY `secondary_item_id` (`secondary_item_id`),
  KEY `component` (`component`),
  KEY `type` (`type`),
  KEY `mptt_left` (`mptt_left`),
  KEY `mptt_right` (`mptt_right`),
  KEY `hide_sitewide` (`hide_sitewide`),
  KEY `is_spam` (`is_spam`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=43 ;

--
-- Bolcant dades de la taula `wp_bp_activity`
--

INSERT INTO `wp_bp_activity` (`id`, `user_id`, `component`, `type`, `action`, `content`, `primary_link`, `item_id`, `secondary_item_id`, `date_recorded`, `hide_sitewide`, `mptt_left`, `mptt_right`, `is_spam`) VALUES
(1, 2, 'members', 'last_activity', '', '', '', 0, NULL, '2016-04-05 09:55:18', 0, 0, 0, 0),
(2, 1, 'members', 'last_activity', '', '', '', 0, NULL, '2014-12-01 12:15:41', 0, 0, 0, 0),
(4, 1, 'groups', 'activity_update', '<a href="http://pwc-int.educacio.intranet/agora/masterpri/membres/admin/" title="admin">admin</a> ha fet una actualització al node <a href="http://pwc-int.educacio.intranet/agora/masterpri/nodes/educacio-emocional/">Educació emocional</a>', 'Hola noders, bon dia! Avui us portem un vídeo molt xulo sobre com fer espai als altres: \n\nhttps://www.youtube.com/watch?v=LAOICItn3MM', 'http://pwc-int.educacio.intranet/agora/masterpri/membres/admin/', 1, 0, '2014-09-22 16:45:52', 0, 0, 0, 0),
(6, 1, 'groups', 'activity_update', '<a href="http://pwc-int.educacio.intranet/agora/masterpri/membres/admin/" title="admin">admin</a> ha fet una actualització al node <a href="http://pwc-int.educacio.intranet/agora/masterpri/nodes/mestres-1124779421/">Mestres</a>', 'Hola companys, us comparteixo un vídeo sobre educació emocional que em va agradar molt!\n\nhttps://www.youtube.com/watch?v=PQE4WqQSOcQ', 'http://pwc-int.educacio.intranet/agora/masterpri/membres/admin/', 2, 0, '2014-09-22 16:52:17', 1, 0, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de la taula `wp_bp_activity_meta`
--

CREATE TABLE `wp_bp_activity_meta` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `activity_id` bigint(20) NOT NULL,
  `meta_key` varchar(255) DEFAULT NULL,
  `meta_value` longtext,
  PRIMARY KEY (`id`),
  KEY `activity_id` (`activity_id`),
  KEY `meta_key` (`meta_key`(191))
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Bolcant dades de la taula `wp_bp_activity_meta`
--

INSERT INTO `wp_bp_activity_meta` (`id`, `activity_id`, `meta_key`, `meta_value`) VALUES
(1, 4, '_oembed_f53b3de240959214172fa71fad6db8c8', '<iframe width="500" height="281" src="https://www.youtube.com/embed/LAOICItn3MM?feature=oembed" frameborder="0" allowfullscreen></iframe>'),
(2, 6, '_oembed_9a9cd4314ec5c6c352acee421db4e1c2', '<iframe width="500" height="281" src="https://www.youtube.com/embed/PQE4WqQSOcQ?feature=oembed" frameborder="0" allowfullscreen></iframe>');

-- --------------------------------------------------------

--
-- Estructura de la taula `wp_bp_friends`
--

CREATE TABLE `wp_bp_friends` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `initiator_user_id` bigint(20) NOT NULL,
  `friend_user_id` bigint(20) NOT NULL,
  `is_confirmed` tinyint(1) DEFAULT '0',
  `is_limited` tinyint(1) DEFAULT '0',
  `date_created` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `initiator_user_id` (`initiator_user_id`),
  KEY `friend_user_id` (`friend_user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de la taula `wp_bp_groups`
--

CREATE TABLE `wp_bp_groups` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `creator_id` bigint(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `slug` varchar(200) NOT NULL,
  `description` longtext NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'public',
  `enable_forum` tinyint(1) NOT NULL DEFAULT '1',
  `date_created` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `creator_id` (`creator_id`),
  KEY `status` (`status`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Bolcant dades de la taula `wp_bp_groups`
--

INSERT INTO `wp_bp_groups` (`id`, `creator_id`, `name`, `slug`, `description`, `status`, `enable_forum`, `date_created`) VALUES
(1, 1, 'Educació emocional', 'educacio-emocional', 'Node sobre educació emocional', 'public', 0, '2014-09-22 16:44:12'),
(2, 1, 'Mestres', 'mestres-1124779421', 'Node dels mestres', 'private', 0, '2014-09-22 16:50:08');

-- --------------------------------------------------------

--
-- Estructura de la taula `wp_bp_groups_groupmeta`
--

CREATE TABLE `wp_bp_groups_groupmeta` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `group_id` bigint(20) NOT NULL,
  `meta_key` varchar(255) DEFAULT NULL,
  `meta_value` longtext,
  PRIMARY KEY (`id`),
  KEY `group_id` (`group_id`),
  KEY `meta_key` (`meta_key`(191))
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Bolcant dades de la taula `wp_bp_groups_groupmeta`
--

INSERT INTO `wp_bp_groups_groupmeta` (`id`, `group_id`, `meta_key`, `meta_value`) VALUES
(1, 1, 'total_member_count', '1'),
(2, 1, 'last_activity', '2014-09-22 16:45:52'),
(3, 1, 'ass_default_subscription', 'dig'),
(4, 1, 'ass_subscribed_users', 'a:1:{i:2;s:3:"dig";}'),
(5, 1, 'invite_status', 'admins'),
(6, 1, 'bp-docs', 'a:1:{s:10:"can-create";s:6:"member";}'),
(7, 2, 'total_member_count', '1'),
(8, 2, 'last_activity', '2016-01-21 18:33:08'),
(9, 2, 'ass_default_subscription', 'dig'),
(10, 2, 'ass_subscribed_users', 'a:1:{i:2;s:3:"dig";}'),
(11, 2, 'invite_status', 'admins');

-- --------------------------------------------------------

--
-- Estructura de la taula `wp_bp_groups_members`
--

CREATE TABLE `wp_bp_groups_members` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
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
  `invite_sent` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `group_id` (`group_id`),
  KEY `is_admin` (`is_admin`),
  KEY `is_mod` (`is_mod`),
  KEY `user_id` (`user_id`),
  KEY `inviter_id` (`inviter_id`),
  KEY `is_confirmed` (`is_confirmed`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Bolcant dades de la taula `wp_bp_groups_members`
--

INSERT INTO `wp_bp_groups_members` (`id`, `group_id`, `user_id`, `inviter_id`, `is_admin`, `is_mod`, `user_title`, `date_modified`, `comments`, `is_confirmed`, `is_banned`, `invite_sent`) VALUES
(1, 1, 1, 0, 1, 0, 'Administrador/a del node', '2014-09-22 16:44:05', '', 1, 0, 0),
(2, 2, 1, 0, 1, 0, 'Administrador/a del node', '2014-09-22 16:49:49', '', 1, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de la taula `wp_bp_messages_messages`
--

CREATE TABLE `wp_bp_messages_messages` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `thread_id` bigint(20) NOT NULL,
  `sender_id` bigint(20) NOT NULL,
  `subject` varchar(200) NOT NULL,
  `message` longtext NOT NULL,
  `date_sent` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sender_id` (`sender_id`),
  KEY `thread_id` (`thread_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de la taula `wp_bp_messages_meta`
--

CREATE TABLE `wp_bp_messages_meta` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `message_id` bigint(20) NOT NULL,
  `meta_key` varchar(255) DEFAULT NULL,
  `meta_value` longtext,
  PRIMARY KEY (`id`),
  KEY `message_id` (`message_id`),
  KEY `meta_key` (`meta_key`(191))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de la taula `wp_bp_messages_notices`
--

CREATE TABLE `wp_bp_messages_notices` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `subject` varchar(200) NOT NULL,
  `message` longtext NOT NULL,
  `date_sent` datetime NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `is_active` (`is_active`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de la taula `wp_bp_messages_recipients`
--

CREATE TABLE `wp_bp_messages_recipients` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) NOT NULL,
  `thread_id` bigint(20) NOT NULL,
  `unread_count` int(10) NOT NULL DEFAULT '0',
  `sender_only` tinyint(1) NOT NULL DEFAULT '0',
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `thread_id` (`thread_id`),
  KEY `is_deleted` (`is_deleted`),
  KEY `sender_only` (`sender_only`),
  KEY `unread_count` (`unread_count`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de la taula `wp_bp_mod_contents`
--

CREATE TABLE `wp_bp_mod_contents` (
  `content_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `item_type` varchar(42) NOT NULL DEFAULT '',
  `item_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `item_id2` bigint(20) unsigned NOT NULL DEFAULT '0',
  `item_author` bigint(20) unsigned NOT NULL DEFAULT '0',
  `item_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `item_url` varchar(250) NOT NULL DEFAULT '',
  `status` enum('new','warned','ignored','moderated','edited','deleted') NOT NULL DEFAULT 'new',
  PRIMARY KEY (`content_id`),
  KEY `item_type` (`item_type`),
  KEY `item_id` (`item_id`),
  KEY `item_id2` (`item_id2`),
  KEY `item_author` (`item_author`),
  KEY `item_date` (`item_date`),
  KEY `status` (`status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de la taula `wp_bp_mod_flags`
--

CREATE TABLE `wp_bp_mod_flags` (
  `flag_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `content_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `reporter_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`flag_id`),
  KEY `content_id` (`content_id`),
  KEY `reporter_id` (`reporter_id`),
  KEY `date` (`date`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de la taula `wp_bp_notifications`
--

CREATE TABLE `wp_bp_notifications` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) NOT NULL,
  `item_id` bigint(20) NOT NULL,
  `secondary_item_id` bigint(20) DEFAULT NULL,
  `component_name` varchar(75) NOT NULL,
  `component_action` varchar(75) NOT NULL,
  `date_notified` datetime NOT NULL,
  `is_new` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `item_id` (`item_id`),
  KEY `secondary_item_id` (`secondary_item_id`),
  KEY `user_id` (`user_id`),
  KEY `is_new` (`is_new`),
  KEY `component_name` (`component_name`),
  KEY `component_action` (`component_action`),
  KEY `useritem` (`user_id`,`is_new`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de la taula `wp_bp_notifications_meta`
--

CREATE TABLE `wp_bp_notifications_meta` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `notification_id` bigint(20) NOT NULL,
  `meta_key` varchar(255) DEFAULT NULL,
  `meta_value` longtext,
  PRIMARY KEY (`id`),
  KEY `notification_id` (`notification_id`),
  KEY `meta_key` (`meta_key`(191))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de la taula `wp_bp_xprofile_data`
--

CREATE TABLE `wp_bp_xprofile_data` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `field_id` bigint(20) unsigned NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `value` longtext NOT NULL,
  `last_updated` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `field_id` (`field_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Bolcant dades de la taula `wp_bp_xprofile_data`
--

INSERT INTO `wp_bp_xprofile_data` (`id`, `field_id`, `user_id`, `value`, `last_updated`) VALUES
(1, 1, 2, 'xtecadmin', '2015-10-27 10:48:34'),
(2, 1, 1, 'admin', '2016-03-29 11:39:20');

-- --------------------------------------------------------

--
-- Estructura de la taula `wp_bp_xprofile_fields`
--

CREATE TABLE `wp_bp_xprofile_fields` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
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
  `can_delete` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `group_id` (`group_id`),
  KEY `parent_id` (`parent_id`),
  KEY `field_order` (`field_order`),
  KEY `can_delete` (`can_delete`),
  KEY `is_required` (`is_required`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Bolcant dades de la taula `wp_bp_xprofile_fields`
--

INSERT INTO `wp_bp_xprofile_fields` (`id`, `group_id`, `parent_id`, `type`, `name`, `description`, `is_required`, `is_default_option`, `field_order`, `option_order`, `order_by`, `can_delete`) VALUES
(1, 1, 0, 'textbox', 'Name', '', 1, 0, 0, 0, '', 0);

-- --------------------------------------------------------

--
-- Estructura de la taula `wp_bp_xprofile_groups`
--

CREATE TABLE `wp_bp_xprofile_groups` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `description` mediumtext NOT NULL,
  `group_order` bigint(20) NOT NULL DEFAULT '0',
  `can_delete` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `can_delete` (`can_delete`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Bolcant dades de la taula `wp_bp_xprofile_groups`
--

INSERT INTO `wp_bp_xprofile_groups` (`id`, `name`, `description`, `group_order`, `can_delete`) VALUES
(1, 'Base', '', 0, 0);

-- --------------------------------------------------------

--
-- Estructura de la taula `wp_bp_xprofile_meta`
--

CREATE TABLE `wp_bp_xprofile_meta` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `object_id` bigint(20) NOT NULL,
  `object_type` varchar(150) NOT NULL,
  `meta_key` varchar(255) DEFAULT NULL,
  `meta_value` longtext,
  PRIMARY KEY (`id`),
  KEY `object_id` (`object_id`),
  KEY `meta_key` (`meta_key`(191))
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de la taula `wp_commentmeta`
--

CREATE TABLE `wp_commentmeta` (
  `meta_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `comment_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `meta_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_value` longtext COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`meta_id`),
  KEY `comment_id` (`comment_id`),
  KEY `meta_key` (`meta_key`(191))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de la taula `wp_comments`
--

CREATE TABLE `wp_comments` (
  `comment_ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
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
  `user_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`comment_ID`),
  KEY `comment_post_ID` (`comment_post_ID`),
  KEY `comment_approved_date_gmt` (`comment_approved`,`comment_date_gmt`),
  KEY `comment_date_gmt` (`comment_date_gmt`),
  KEY `comment_parent` (`comment_parent`),
  KEY `comment_author_email` (`comment_author_email`(10))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de la taula `wp_es_deliverreport`
--

CREATE TABLE `wp_es_deliverreport` (
  `es_deliver_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `es_deliver_sentguid` varchar(255) NOT NULL,
  `es_deliver_emailid` int(10) unsigned NOT NULL,
  `es_deliver_emailmail` varchar(255) NOT NULL,
  `es_deliver_sentdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `es_deliver_status` varchar(25) NOT NULL,
  `es_deliver_viewdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `es_deliver_sentstatus` varchar(25) NOT NULL DEFAULT 'Sent',
  `es_deliver_senttype` varchar(25) NOT NULL DEFAULT 'Instant Mail',
  PRIMARY KEY (`es_deliver_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de la taula `wp_es_emaillist`
--

CREATE TABLE `wp_es_emaillist` (
  `es_email_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `es_email_name` varchar(255) NOT NULL,
  `es_email_mail` varchar(255) NOT NULL,
  `es_email_status` varchar(25) NOT NULL DEFAULT 'Unconfirmed',
  `es_email_created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `es_email_viewcount` varchar(100) NOT NULL,
  `es_email_group` varchar(255) NOT NULL DEFAULT 'Portada',
  `es_email_guid` varchar(255) NOT NULL,
  PRIMARY KEY (`es_email_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Bolcant dades de la taula `wp_es_emaillist`
--

INSERT INTO `wp_es_emaillist` (`es_email_id`, `es_email_name`, `es_email_mail`, `es_email_status`, `es_email_created`, `es_email_viewcount`, `es_email_group`, `es_email_guid`) VALUES
(1, 'Admin', 'a8000006@xtec.cat', 'Confirmed', '2016-04-05 11:55:56', '0', 'Portada', 'nyboat-nrdukw-uwebnv-vkjqxt-gyfatk'),
(2, 'Example', 'a.example@example.com', 'Confirmed', '2016-04-05 11:55:56', '0', 'Portada', 'qukxzw-dsqhfw-owsudr-ewtomp-tupaex');

-- --------------------------------------------------------

--
-- Estructura de la taula `wp_es_notification`
--

CREATE TABLE `wp_es_notification` (
  `es_note_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `es_note_cat` text,
  `es_note_group` varchar(255) NOT NULL,
  `es_note_templ` int(10) unsigned NOT NULL,
  `es_note_status` varchar(10) NOT NULL DEFAULT 'Enable',
  PRIMARY KEY (`es_note_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Bolcant dades de la taula `wp_es_notification`
--

INSERT INTO `wp_es_notification` (`es_note_id`, `es_note_cat`, `es_note_group`, `es_note_templ`, `es_note_status`) VALUES
(1, '##Portada## ', 'Portada', 1, 'Enable');

-- --------------------------------------------------------

--
-- Estructura de la taula `wp_es_pluginconfig`
--

CREATE TABLE `wp_es_pluginconfig` (
  `es_c_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `es_c_fromname` varchar(255) NOT NULL,
  `es_c_fromemail` varchar(255) NOT NULL,
  `es_c_mailtype` varchar(255) NOT NULL,
  `es_c_adminmailoption` varchar(255) NOT NULL,
  `es_c_adminemail` varchar(255) NOT NULL,
  `es_c_adminmailsubject` varchar(255) NOT NULL,
  `es_c_adminmailcontant` text,
  `es_c_usermailoption` varchar(255) NOT NULL,
  `es_c_usermailsubject` varchar(255) NOT NULL,
  `es_c_usermailcontant` text,
  `es_c_optinoption` varchar(255) NOT NULL,
  `es_c_optinsubject` varchar(255) NOT NULL,
  `es_c_optincontent` text,
  `es_c_optinlink` varchar(255) NOT NULL,
  `es_c_unsublink` varchar(255) NOT NULL,
  `es_c_unsubtext` text,
  `es_c_unsubhtml` text,
  `es_c_subhtml` text,
  `es_c_message1` text,
  `es_c_message2` text,
  PRIMARY KEY (`es_c_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Bolcant dades de la taula `wp_es_pluginconfig`
--

INSERT INTO `wp_es_pluginconfig` (`es_c_id`, `es_c_fromname`, `es_c_fromemail`, `es_c_mailtype`, `es_c_adminmailoption`, `es_c_adminemail`, `es_c_adminmailsubject`, `es_c_adminmailcontant`, `es_c_usermailoption`, `es_c_usermailsubject`, `es_c_usermailcontant`, `es_c_optinoption`, `es_c_optinsubject`, `es_c_optincontent`, `es_c_optinlink`, `es_c_unsublink`, `es_c_unsubtext`, `es_c_unsubhtml`, `es_c_subhtml`, `es_c_message1`, `es_c_message2`) VALUES
(1, 'Admin', 'a8000006@xtec.cat', 'WP HTML MAIL', 'YES', 'a8000006@xtec.cat', 'Escola L&#039;Arany Subscripci&oacute; nova de correu', 'Hola Administrador, \r\n\r\n Hem rebut una sol·licitud de subscripci&oacute; d''aquesta adre&ccedil;a de correu electr&ograve;nic per rebre els articles del nostre lloc web. \r\n\r\n Correu electr&ograve;nic : ###EMAIL### \r\n Nom : ###NAME### \r\n\r\nGr&agrave;cies\r\nEscola L&#039;Arany', 'YES', 'Escola L&#039;Arany Benvingut al nostre butlletí', 'Hola ###NAME###, \r\n\r\n Hem rebut una sol·licitud de subscripci&oacute; d''aquesta adre&ccedil;a de correu electr&ograve;nic per rebre el bullet&iacute; del nostre lloc web.\r\n\r\nGr&agrave;cies\r\nEscola L&#039;Arany', 'Double Opt In', 'Escola L&#039;Arany confirmeu la subscripció', 'Hola ###NAME###,\r\n\r\n Hem rebut una petici&oacute; de subscripci&oacute; d''aquesta adre&ccedil;a de correu electr&ograve;nic. Confirmeu <a href=''###LINK###''>fent clic aqu&iacute;</a>. Si no podeu fer clic a l''enlla&ccedil; anterior, si us plau, utilitzeu l''URL seg&uuml;ent.\r\n\r\n ###LINK### \r\n\r\nGr&agrave;cies\r\nEscola L&#039;Arany', 'http://pwc-int.educacio.intranet/agora/masterpri/?es=optin&db=###DBID###&email=###EMAIL###&guid=###GUID###', 'http://pwc-int.educacio.intranet/agora/masterpri/?es=unsubscribe&db=###DBID###&email=###EMAIL###&guid=###GUID###', 'Si no esteu interessats en rebre correus des de Escola L&#039;Arany <a href=''###LINK###''>feu clic aqu&iacute;</a> per donar-vos de baixa', 'Gr&agrave;cies, heu estat donat de baixa amb &egrave;xit. Ja no haur&iacute;eu de rebre not&iacute;cies nostres.', 'Gr&agrave;cies, heu estat subscrit amb &egrave;xit al nostre butllet&iacute; de not&iacute;cies.', 'Vaja... Aquesta subscripci&oacute; no s''ha pogut completar, ho sentim. L''adre&ccedil;a de correu electr&ograve;nic est&agrave; bloquejada o ja est&agrave; subscrita. Gr&agrave;cies.', 'Vaja... Estem tenint algun error t&egrave;cnic. Torneu-ho a provar o contacteu amb l''administrador.');

-- --------------------------------------------------------

--
-- Estructura de la taula `wp_es_sentdetails`
--

CREATE TABLE `wp_es_sentdetails` (
  `es_sent_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `es_sent_guid` varchar(255) NOT NULL,
  `es_sent_qstring` varchar(255) NOT NULL,
  `es_sent_source` varchar(255) NOT NULL,
  `es_sent_starttime` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `es_sent_endtime` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `es_sent_count` int(10) unsigned NOT NULL,
  `es_sent_preview` text,
  `es_sent_status` varchar(25) NOT NULL DEFAULT 'Sent',
  `es_sent_type` varchar(25) NOT NULL DEFAULT 'Instant Mail',
  `es_sent_subject` varchar(255) NOT NULL,
  PRIMARY KEY (`es_sent_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de la taula `wp_es_templatetable`
--

CREATE TABLE `wp_es_templatetable` (
  `es_templ_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `es_templ_heading` varchar(255) NOT NULL,
  `es_templ_body` text,
  `es_templ_status` varchar(25) NOT NULL DEFAULT 'Published',
  `es_email_type` varchar(100) NOT NULL DEFAULT 'Static Template',
  PRIMARY KEY (`es_templ_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Bolcant dades de la taula `wp_es_templatetable`
--

INSERT INTO `wp_es_templatetable` (`es_templ_id`, `es_templ_heading`, `es_templ_body`, `es_templ_status`, `es_email_type`) VALUES
(1, 'S''ha publicat un article nou:  ###POSTTITLE###', 'Hola ###NAME###,\r\n\r\nHem publicat un article nou al nostre lloc web. ###POSTTITLE###\r\n###POSTDESC###\r\nPodeu veure l''últim article a ###POSTLINK###\r\nHeu rebut aquest correu perquè vau demanar que se us notifiqués la publicació d''articles nous\r\n\r\nGràcies i salutacions\r\nAdmin', 'Published', 'Dynamic Template'),
(2, 'Notificació d''article nou ###POSTTITLE###', 'Hola ###EMAIL###,\r\n\r\nHem publicat un article nou al nostre lloc web. ###POSTTITLE###\r\n###POSTIMAGE###\r\n###POSTFULL###\r\nPodeu veure l''últim article a ###POSTLINK###\r\nHeu rebut aquest correu perquè vau demanar que se us notifiqués la publicació d''articles nous\r\n\r\nGràcies i salutacions\r\nAdmin', 'Published', 'Dynamic Template'),
(3, 'Butlletí Hola Món', '<strong style="color: #990000"> Subscriptors de correu</strong><p>\r\n							L\\''extensió subscripcions de correu de correu té diferents opcions per enviar butlletins als subscriptors.\r\n							Té una pàgina separada amb un editor HTML per crear	un butlletí amb aquest format.\r\n							L\\''extensió disposa d\\''opcions per enviar correus de notificació als subscriptors quan es publiquen articles nous al lloc web. També té una pàgina per poder afegir i eliminar les categories a les que s\\''enviaran les notificacions.\r\n							Utilitzant les opcions de l\\''extensió d\\''importació i exportació els administradors podran importar fàcilment els usuaris registrats.\r\n						</p> <strong style="color: #990000">Característiques de l''extensió</strong><ol> <li>Correu de notificació als subscriptors quan es publiquin articles nous.</li> <li>Giny de subscripció</li><li>Correu de subscripció amb confirmació per correu i subscripció simple per facilitar la subscripció.</li> <li>Notificació per correu electrònic a l\\''administrador quan els usuaris es subscriguin (Opcional)</li> <li>Correu de benvinguda automàtic als subscriptors (Opcional).</li> <li>Enllaç per donar-se de baixa del correu.</li> <li>Importació / Exportació dels correus dels subscriptors.</li> <li>Editor d\\''HTML per redactar el butlletí.</li> </ol> <strong>Gràcies i salutacions</strong><br>Admin', 'Published', 'Static Template');

-- --------------------------------------------------------

--
-- Estructura de la taula `wp_links`
--

CREATE TABLE `wp_links` (
  `link_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
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
  `link_rss` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`link_id`),
  KEY `link_visible` (`link_visible`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de la taula `wp_options`
--

CREATE TABLE `wp_options` (
  `option_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `option_name` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `option_value` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `autoload` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'yes',
  PRIMARY KEY (`option_id`),
  UNIQUE KEY `option_name` (`option_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=2187 ;

--
-- Bolcant dades de la taula `wp_options`
--

INSERT INTO `wp_options` (`option_id`, `option_name`, `option_value`, `autoload`) VALUES
(1, 'siteurl', 'http://pwc-int.educacio.intranet/agora/masterpri', 'yes'),
(2, 'blogname', 'Escola L&#039;Arany', 'yes'),
(3, 'blogdescription', 'Web en construcció', 'yes'),
(4, 'users_can_register', '0', 'yes'),
(5, 'admin_email', 'a8000006@xtec.cat', 'yes'),
(6, 'start_of_week', '1', 'yes'),
(7, 'use_balanceTags', '0', 'yes'),
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
(19, 'default_ping_status', 'open', 'yes'),
(20, 'default_pingback_flag', '1', 'yes'),
(21, 'posts_per_page', '10', 'yes'),
(22, 'date_format', 'j \\d\\e F \\d\\e Y', 'yes'),
(23, 'time_format', 'G:i', 'yes'),
(24, 'links_updated_date_format', 'j \\d\\e F \\d\\e Y G:i', 'yes'),
(25, 'comment_moderation', '0', 'yes'),
(26, 'moderation_notify', '1', 'yes'),
(27, 'permalink_structure', '/%category%/%postname%/', 'yes'),
(28, 'gzipcompression', '0', 'yes'),
(29, 'hack_file', '0', 'yes'),
(30, 'blog_charset', 'UTF-8', 'yes'),
(31, 'moderation_keys', '', 'no'),
(32, 'active_plugins', 'a:29:{i:0;s:25:"add-to-any/add-to-any.php";i:1;s:42:"bbpress-enable-tinymce-visual-tab/init.php";i:2;s:19:"bbpress/bbpress.php";i:3;s:37:"blogger-importer/blogger-importer.php";i:4;s:29:"bp-moderation/bpModLoader.php";i:5;s:33:"buddypress-activity-plus/bpfb.php";i:6;s:26:"buddypress-docs/loader.php";i:7;s:64:"buddypress-group-email-subscription/bp-activity-subscription.php";i:8;s:34:"buddypress-like/bp-like-loader.php";i:9;s:24:"buddypress/bp-loader.php";i:10;s:39:"email-subscribers/email-subscribers.php";i:11;s:41:"enllacos-educatius/enllacos-educatius.php";i:12;s:43:"google-analyticator/google-analyticator.php";i:13;s:49:"google-calendar-events/google-calendar-events.php";i:14;s:27:"grup-classe/grup_classe.php";i:15;s:31:"invite-anyone/invite-anyone.php";i:16;s:69:"pending-submission-notifications/pending-submission-notifications.php";i:17;s:27:"private-bp-pages/loader.php";i:18;s:21:"raw-html/raw_html.php";i:19;s:25:"slideshare/slideshare.php";i:20;s:44:"slideshow-jquery-image-gallery/slideshow.php";i:21;s:27:"socialmedia/socialmedia.php";i:22;s:37:"tinymce-advanced/tinymce-advanced.php";i:23;s:71:"widget-visibility-without-jetpack/widget-visibility-without-jetpack.php";i:24;s:41:"wordpress-importer/wordpress-importer.php";i:25;s:42:"wordpress-social-login/wp-social-login.php";i:26;s:29:"wp-recaptcha/wp-recaptcha.php";i:27;s:23:"xtec-mail/xtec-mail.php";i:28;s:25:"xtec-stats/xtec-stats.php";}', 'yes'),
(33, 'home', 'http://pwc-int.educacio.intranet/agora/masterpri', 'yes'),
(34, 'category_base', '/categoria', 'yes'),
(35, 'ping_sites', 'http://rpc.pingomatic.com/', 'yes'),
(36, 'advanced_edit', '0', 'yes'),
(37, 'comment_max_links', '2', 'yes'),
(38, 'gmt_offset', '1', 'yes'),
(39, 'default_email_category', '1', 'yes'),
(40, 'recently_edited', '', 'no'),
(41, 'template', 'reactor', 'yes'),
(42, 'stylesheet', 'reactor-primaria-1', 'yes'),
(43, 'comment_whitelist', '1', 'yes'),
(44, 'blacklist_keys', '', 'no'),
(45, 'comment_registration', '0', 'yes'),
(46, 'html_type', 'text/html', 'yes'),
(47, 'use_trackback', '0', 'yes'),
(48, 'default_role', 'contributor', 'yes'),
(49, 'db_version', '31536', 'yes'),
(50, 'uploads_use_yearmonth_folders', '1', 'yes'),
(51, 'upload_path', '', 'yes'),
(52, 'blog_public', '1', 'yes'),
(53, 'default_link_category', '2', 'yes'),
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
(70, 'close_comments_for_old_posts', '0', 'yes'),
(71, 'close_comments_days_old', '14', 'yes'),
(72, 'thread_comments', '1', 'yes'),
(73, 'thread_comments_depth', '5', 'yes'),
(74, 'page_comments', '0', 'yes'),
(75, 'comments_per_page', '50', 'yes'),
(76, 'default_comments_page', 'newest', 'yes'),
(77, 'comment_order', 'asc', 'yes'),
(78, 'sticky_posts', 'a:0:{}', 'yes'),
(79, 'widget_categories', 'a:2:{s:12:"_multiwidget";i:1;i:1;a:0:{}}', 'yes'),
(80, 'widget_text', 'a:6:{i:1;a:0:{}i:3;a:4:{s:5:"title";s:10:"Benvinguts";s:4:"text";s:226:"En aquesta pàgina podeu trobar tota la informació referent a l''AMPA del centre.\r\n\r\nPer contactar amb l''AMPA: \r\n\r\n<strong>Correu electrònic:</strong>\r\ncorreuampa@elnostrecentre.cat\r\n\r\n<strong>Telèfon:</strong>\r\n123 45 67 89";s:6:"filter";b:1;s:10:"conditions";a:2:{s:6:"action";s:4:"show";s:5:"rules";a:1:{i:0;a:2:{s:5:"major";s:8:"category";s:5:"minor";s:1:"7";}}}}i:4;a:4:{s:5:"title";s:5:"Ginys";s:4:"text";s:615:"<p>En aquesta barra lateral hi podeu posar tots els ginys que considereu necessaris. Els ginys es poden modificar, afegir o treure de la barra lateral des de la secció <strong>Aparença - Ginys</strong> del Tauler.</p>\r\n<p>Quan afegiu un giny a la barra, aquest es mostra per defecte a totes les pàgines de categoria. Si voleu que aparegui només en una categoria determinada, canvieu els paràmetres de "Visibilitat" fent clic al botó que trobareu a la part inferior de les propietats del giny.</p>\r\n<p><a href=http://agora.xtec.cat/moodle/moodle/mod/glossary/view.php?id=1302&mode=entry&hook=1941>Ajuda</a></p>";s:6:"filter";b:0;s:10:"conditions";a:2:{s:6:"action";s:4:"show";s:5:"rules";a:1:{i:0;a:2:{s:5:"major";s:8:"category";s:5:"minor";s:0:"";}}}}i:5;a:3:{s:5:"title";s:0:"";s:4:"text";s:425:"<a class="twitter-timeline" href="https://twitter.com/escolalarany" data-widget-id="514020442797903872">Tuits de @escolalarany</a>\r\n<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?''http'':''https'';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>";s:6:"filter";b:0;}s:12:"_multiwidget";i:1;i:7;a:4:{s:5:"title";s:18:"Menú de documents";s:4:"text";s:185:"Aquí podeu afegir un menú personalitzat amb enllaços a documents interns i externs, etiquetes de documents etc. A la visibilitat del giny, heu de posar: Pàgina / Index de Documents.";s:6:"filter";b:1;s:10:"conditions";a:2:{s:6:"action";s:4:"show";s:5:"rules";a:2:{i:0;a:2:{s:5:"major";s:4:"page";s:5:"minor";s:10:"docs-index";}i:1;a:2:{s:5:"major";s:4:"page";s:5:"minor";s:16:"post_type-bp_doc";}}}}}', 'yes'),
(81, 'widget_rss', 'a:2:{i:1;a:0:{}s:12:"_multiwidget";i:1;}', 'yes'),
(82, 'uninstall_plugins', 'a:0:{}', 'no'),
(83, 'timezone_string', '', 'yes'),
(84, 'page_for_posts', '0', 'yes'),
(85, 'page_on_front', '9', 'yes'),
(86, 'default_post_format', '0', 'yes'),
(87, 'link_manager_enabled', '0', 'yes'),
(88, 'initial_db_version', '27916', 'yes'),
(89, 'wp_user_roles', 'a:10:{s:13:"administrator";a:2:{s:4:"name";s:13:"Administrator";s:12:"capabilities";a:65:{s:13:"switch_themes";b:1;s:11:"edit_themes";b:1;s:16:"activate_plugins";b:1;s:12:"edit_plugins";b:1;s:10:"edit_users";b:1;s:10:"edit_files";b:1;s:14:"manage_options";b:1;s:17:"moderate_comments";b:1;s:17:"manage_categories";b:1;s:12:"manage_links";b:1;s:12:"upload_files";b:1;s:6:"import";b:1;s:15:"unfiltered_html";b:1;s:10:"edit_posts";b:1;s:17:"edit_others_posts";b:1;s:20:"edit_published_posts";b:1;s:13:"publish_posts";b:1;s:10:"edit_pages";b:1;s:4:"read";b:1;s:8:"level_10";b:1;s:7:"level_9";b:1;s:7:"level_8";b:1;s:7:"level_7";b:1;s:7:"level_6";b:1;s:7:"level_5";b:1;s:7:"level_4";b:1;s:7:"level_3";b:1;s:7:"level_2";b:1;s:7:"level_1";b:1;s:7:"level_0";b:1;s:17:"edit_others_pages";b:1;s:20:"edit_published_pages";b:1;s:13:"publish_pages";b:1;s:12:"delete_pages";b:1;s:19:"delete_others_pages";b:1;s:22:"delete_published_pages";b:1;s:12:"delete_posts";b:1;s:19:"delete_others_posts";b:1;s:22:"delete_published_posts";b:1;s:20:"delete_private_posts";b:1;s:18:"edit_private_posts";b:1;s:18:"read_private_posts";b:1;s:20:"delete_private_pages";b:1;s:18:"edit_private_pages";b:1;s:18:"read_private_pages";b:1;s:12:"delete_users";b:1;s:12:"create_users";b:1;s:17:"unfiltered_upload";b:1;s:14:"edit_dashboard";b:1;s:14:"update_plugins";b:1;s:14:"delete_plugins";b:1;s:15:"install_plugins";b:1;s:13:"update_themes";b:1;s:14:"install_themes";b:1;s:11:"update_core";b:1;s:10:"list_users";b:1;s:12:"remove_users";b:1;s:9:"add_users";b:1;s:13:"promote_users";b:1;s:18:"edit_theme_options";b:1;s:13:"delete_themes";b:1;s:6:"export";b:1;s:45:"slideshow-jquery-image-gallery-add-slideshows";b:1;s:46:"slideshow-jquery-image-gallery-edit-slideshows";b:1;s:48:"slideshow-jquery-image-gallery-delete-slideshows";b:1;}}s:6:"editor";a:2:{s:4:"name";s:6:"Editor";s:12:"capabilities";a:37:{s:17:"moderate_comments";b:1;s:17:"manage_categories";b:1;s:12:"manage_links";b:1;s:12:"upload_files";b:1;s:15:"unfiltered_html";b:1;s:10:"edit_posts";b:1;s:17:"edit_others_posts";b:1;s:20:"edit_published_posts";b:1;s:13:"publish_posts";b:1;s:10:"edit_pages";b:1;s:4:"read";b:1;s:7:"level_7";b:1;s:7:"level_6";b:1;s:7:"level_5";b:1;s:7:"level_4";b:1;s:7:"level_3";b:1;s:7:"level_2";b:1;s:7:"level_1";b:1;s:7:"level_0";b:1;s:17:"edit_others_pages";b:1;s:20:"edit_published_pages";b:1;s:13:"publish_pages";b:1;s:12:"delete_pages";b:1;s:19:"delete_others_pages";b:1;s:22:"delete_published_pages";b:1;s:12:"delete_posts";b:1;s:19:"delete_others_posts";b:1;s:22:"delete_published_posts";b:1;s:20:"delete_private_posts";b:1;s:18:"edit_private_posts";b:1;s:18:"read_private_posts";b:1;s:20:"delete_private_pages";b:1;s:18:"edit_private_pages";b:1;s:18:"read_private_pages";b:1;s:45:"slideshow-jquery-image-gallery-add-slideshows";b:1;s:46:"slideshow-jquery-image-gallery-edit-slideshows";b:1;s:48:"slideshow-jquery-image-gallery-delete-slideshows";b:1;}}s:6:"author";a:2:{s:4:"name";s:6:"Author";s:12:"capabilities";a:13:{s:12:"upload_files";b:1;s:10:"edit_posts";b:1;s:20:"edit_published_posts";b:1;s:13:"publish_posts";b:1;s:4:"read";b:1;s:7:"level_2";b:1;s:7:"level_1";b:1;s:7:"level_0";b:1;s:12:"delete_posts";b:1;s:22:"delete_published_posts";b:1;s:45:"slideshow-jquery-image-gallery-add-slideshows";b:1;s:46:"slideshow-jquery-image-gallery-edit-slideshows";b:1;s:48:"slideshow-jquery-image-gallery-delete-slideshows";b:1;}}s:11:"contributor";a:2:{s:4:"name";s:11:"Contributor";s:12:"capabilities";a:6:{s:10:"edit_posts";b:1;s:4:"read";b:1;s:7:"level_1";b:1;s:7:"level_0";b:1;s:12:"delete_posts";b:1;s:12:"upload_files";b:1;}}s:10:"subscriber";a:2:{s:4:"name";s:10:"Subscriber";s:12:"capabilities";a:2:{s:4:"read";b:1;s:7:"level_0";b:1;}}s:13:"bbp_keymaster";a:2:{s:4:"name";s:9:"Keymaster";s:12:"capabilities";a:29:{s:9:"keep_gate";b:1;s:8:"spectate";b:1;s:11:"participate";b:1;s:8:"moderate";b:1;s:8:"throttle";b:1;s:10:"view_trash";b:1;s:14:"publish_forums";b:1;s:11:"edit_forums";b:1;s:18:"edit_others_forums";b:1;s:13:"delete_forums";b:1;s:20:"delete_others_forums";b:1;s:19:"read_private_forums";b:1;s:18:"read_hidden_forums";b:1;s:14:"publish_topics";b:1;s:11:"edit_topics";b:1;s:18:"edit_others_topics";b:1;s:13:"delete_topics";b:1;s:20:"delete_others_topics";b:1;s:19:"read_private_topics";b:1;s:15:"publish_replies";b:1;s:12:"edit_replies";b:1;s:19:"edit_others_replies";b:1;s:14:"delete_replies";b:1;s:21:"delete_others_replies";b:1;s:20:"read_private_replies";b:1;s:17:"manage_topic_tags";b:1;s:15:"edit_topic_tags";b:1;s:17:"delete_topic_tags";b:1;s:17:"assign_topic_tags";b:1;}}s:13:"bbp_spectator";a:2:{s:4:"name";s:9:"Spectator";s:12:"capabilities";a:1:{s:8:"spectate";b:1;}}s:11:"bbp_blocked";a:2:{s:4:"name";s:7:"Blocked";s:12:"capabilities";a:28:{s:8:"spectate";b:0;s:11:"participate";b:0;s:8:"moderate";b:0;s:8:"throttle";b:0;s:10:"view_trash";b:0;s:14:"publish_forums";b:0;s:11:"edit_forums";b:0;s:18:"edit_others_forums";b:0;s:13:"delete_forums";b:0;s:20:"delete_others_forums";b:0;s:19:"read_private_forums";b:0;s:18:"read_hidden_forums";b:0;s:14:"publish_topics";b:0;s:11:"edit_topics";b:0;s:18:"edit_others_topics";b:0;s:13:"delete_topics";b:0;s:20:"delete_others_topics";b:0;s:19:"read_private_topics";b:0;s:15:"publish_replies";b:0;s:12:"edit_replies";b:0;s:19:"edit_others_replies";b:0;s:14:"delete_replies";b:0;s:21:"delete_others_replies";b:0;s:20:"read_private_replies";b:0;s:17:"manage_topic_tags";b:0;s:15:"edit_topic_tags";b:0;s:17:"delete_topic_tags";b:0;s:17:"assign_topic_tags";b:0;}}s:13:"bbp_moderator";a:2:{s:4:"name";s:9:"Moderator";s:12:"capabilities";a:25:{s:8:"spectate";b:1;s:11:"participate";b:1;s:8:"moderate";b:1;s:8:"throttle";b:1;s:10:"view_trash";b:1;s:14:"publish_forums";b:1;s:11:"edit_forums";b:1;s:19:"read_private_forums";b:1;s:18:"read_hidden_forums";b:1;s:14:"publish_topics";b:1;s:11:"edit_topics";b:1;s:18:"edit_others_topics";b:1;s:13:"delete_topics";b:1;s:20:"delete_others_topics";b:1;s:19:"read_private_topics";b:1;s:15:"publish_replies";b:1;s:12:"edit_replies";b:1;s:19:"edit_others_replies";b:1;s:14:"delete_replies";b:1;s:21:"delete_others_replies";b:1;s:20:"read_private_replies";b:1;s:17:"manage_topic_tags";b:1;s:15:"edit_topic_tags";b:1;s:17:"delete_topic_tags";b:1;s:17:"assign_topic_tags";b:1;}}s:15:"bbp_participant";a:2:{s:4:"name";s:11:"Participant";s:12:"capabilities";a:8:{s:8:"spectate";b:1;s:11:"participate";b:1;s:19:"read_private_forums";b:1;s:14:"publish_topics";b:1;s:11:"edit_topics";b:1;s:15:"publish_replies";b:1;s:12:"edit_replies";b:1;s:17:"assign_topic_tags";b:1;}}}', 'yes'),
(90, 'widget_search', 'a:2:{i:2;a:1:{s:5:"title";s:0:"";}s:12:"_multiwidget";i:1;}', 'yes'),
(91, 'widget_recent-posts', 'a:2:{i:2;a:4:{s:5:"title";s:0:"";s:6:"number";i:5;s:7:"exclude";s:0:"";s:10:"conditions";a:2:{s:6:"action";s:4:"show";s:5:"rules";a:1:{i:0;a:2:{s:5:"major";s:4:"page";s:5:"minor";s:14:"post_type-post";}}}}s:12:"_multiwidget";i:1;}', 'yes'),
(92, 'widget_recent-comments', 'a:2:{i:2;a:3:{s:5:"title";s:0:"";s:6:"number";i:5;s:10:"conditions";a:2:{s:6:"action";s:4:"show";s:5:"rules";a:1:{i:0;a:2:{s:5:"major";s:4:"page";s:5:"minor";s:14:"post_type-post";}}}}s:12:"_multiwidget";i:1;}', 'yes'),
(93, 'widget_archives', 'a:2:{i:2;a:4:{s:5:"title";s:0:"";s:5:"count";i:0;s:8:"dropdown";i:0;s:10:"conditions";a:2:{s:6:"action";s:4:"show";s:5:"rules";a:1:{i:0;a:2:{s:5:"major";s:4:"page";s:5:"minor";s:14:"post_type-post";}}}}s:12:"_multiwidget";i:1;}', 'yes'),
(94, 'widget_meta', 'a:2:{i:2;a:1:{s:5:"title";s:0:"";}s:12:"_multiwidget";i:1;}', 'yes'),
(95, 'sidebars_widgets', 'a:8:{s:19:"wp_inactive_widgets";a:4:{i:0;s:18:"bp_groups_widget-2";i:1;s:18:"bp_groups_widget-5";i:2;s:18:"bp_groups_widget-7";i:3;s:32:"bp_core_recently_active_widget-4";}s:9:"categoria";a:14:{i:0;s:10:"nav_menu-2";i:1;s:10:"nav_menu-3";i:2;s:6:"text-3";i:3;s:20:"grup_classe_widget-5";i:4;s:20:"grup_classe_widget-6";i:5;s:20:"grup_classe_widget-7";i:6;s:20:"grup_classe_widget-8";i:7;s:20:"grup_classe_widget-9";i:8;s:21:"grup_classe_widget-10";i:9;s:20:"grup_classe_widget-2";i:10;s:20:"grup_classe_widget-3";i:11;s:20:"grup_classe_widget-4";i:12;s:6:"text-4";i:13;s:13:"xtec_widget-3";}s:7:"sidebar";a:9:{i:0;s:10:"nav_menu-5";i:1;s:17:"slideshowwidget-2";i:2;s:18:"bp_groups_widget-4";i:3;s:32:"bp_core_recently_active_widget-2";i:4;s:14:"recent-posts-2";i:5;s:17:"recent-comments-2";i:6;s:11:"tag_cloud-2";i:7;s:10:"archives-2";i:8;s:6:"text-7";}s:9:"sidebar-2";a:0:{}s:17:"sidebar-frontpage";a:4:{i:0;s:20:"logo_centre_widget-2";i:1;s:12:"gce_widget-2";i:2;s:6:"text-5";i:3;s:13:"xtec_widget-2";}s:19:"sidebar-frontpage-2";a:0:{}s:14:"sidebar-footer";a:2:{i:0;s:20:"socialmedia_widget-2";i:1;s:20:"logo_centre_widget-3";}s:13:"array_version";i:3;}', 'yes'),
(96, 'cron', 'a:7:{i:1459857292;a:1:{s:16:"wp_version_check";a:1:{s:32:"40cd750bba9870f18aada2478b24840a";a:2:{s:8:"schedule";b:0;s:4:"args";a:0:{}}}}i:1459862122;a:1:{s:12:"remove_stats";a:1:{s:32:"40cd750bba9870f18aada2478b24840a";a:3:{s:8:"schedule";s:5:"daily";s:4:"args";a:0:{}s:8:"interval";i:86400;}}}i:1459868826;a:1:{s:30:"wp_scheduled_auto_draft_delete";a:1:{s:32:"40cd750bba9870f18aada2478b24840a";a:3:{s:8:"schedule";s:5:"daily";s:4:"args";a:0:{}s:8:"interval";i:86400;}}}i:1459890649;a:3:{s:16:"wp_version_check";a:1:{s:32:"40cd750bba9870f18aada2478b24840a";a:3:{s:8:"schedule";s:10:"twicedaily";s:4:"args";a:0:{}s:8:"interval";i:43200;}}s:17:"wp_update_plugins";a:1:{s:32:"40cd750bba9870f18aada2478b24840a";a:3:{s:8:"schedule";s:10:"twicedaily";s:4:"args";a:0:{}s:8:"interval";i:43200;}}s:16:"wp_update_themes";a:1:{s:32:"40cd750bba9870f18aada2478b24840a";a:3:{s:8:"schedule";s:10:"twicedaily";s:4:"args";a:0:{}s:8:"interval";i:43200;}}}i:1459911600;a:1:{s:16:"ass_digest_event";a:1:{s:32:"40cd750bba9870f18aada2478b24840a";a:3:{s:8:"schedule";s:5:"daily";s:4:"args";a:0:{}s:8:"interval";i:86400;}}}i:1459933860;a:1:{s:19:"wp_scheduled_delete";a:1:{s:32:"40cd750bba9870f18aada2478b24840a";a:3:{s:8:"schedule";s:5:"daily";s:4:"args";a:0:{}s:8:"interval";i:86400;}}}s:7:"version";i:2;}', 'yes'),
(99, '_site_transient_update_plugins', 'O:8:"stdClass":5:{s:12:"last_checked";i:1459850150;s:7:"checked";a:33:{s:25:"add-to-any/add-to-any.php";s:5:"1.6.6";s:19:"bbpress/bbpress.php";s:5:"2.5.8";s:42:"bbpress-enable-tinymce-visual-tab/init.php";s:5:"1.0.1";s:37:"blogger-importer/blogger-importer.php";s:3:"0.9";s:24:"buddypress/bp-loader.php";s:5:"2.4.3";s:33:"buddypress-activity-plus/bpfb.php";s:5:"1.6.2";s:26:"buddypress-docs/loader.php";s:5:"1.8.8";s:64:"buddypress-group-email-subscription/bp-activity-subscription.php";s:5:"3.5.1";s:34:"buddypress-like/bp-like-loader.php";s:5:"0.2.0";s:29:"bp-moderation/bpModLoader.php";s:5:"0.1.7";s:39:"email-subscribers/email-subscribers.php";s:5:"2.9.2";s:41:"enllacos-educatius/enllacos-educatius.php";s:3:"1.0";s:43:"google-analyticator/google-analyticator.php";s:7:"6.4.9.6";s:49:"google-calendar-events/google-calendar-events.php";s:5:"2.2.5";s:27:"grup-classe/grup_classe.php";s:3:"1.0";s:67:"import-users-from-csv-with-meta/import-users-from-csv-with-meta.php";s:3:"1.2";s:39:"intranet-importer/intranet-importer.php";s:3:"1.0";s:31:"invite-anyone/invite-anyone.php";s:5:"1.3.9";s:69:"pending-submission-notifications/pending-submission-notifications.php";s:3:"1.0";s:27:"private-bp-pages/loader.php";s:3:"1.3";s:21:"raw-html/raw_html.php";s:6:"1.4.15";s:25:"slideshare/slideshare.php";s:5:"1.9.1";s:44:"slideshow-jquery-image-gallery/slideshow.php";s:5:"2.3.1";s:27:"socialmedia/socialmedia.php";s:3:"1.0";s:37:"tinymce-advanced/tinymce-advanced.php";s:5:"4.1.1";s:71:"widget-visibility-without-jetpack/widget-visibility-without-jetpack.php";s:3:"0.4";s:41:"wordpress-importer/wordpress-importer.php";s:5:"0.6.1";s:41:"wordpress-php-info/wordpress-php-info.php";s:5:"14.12";s:42:"wordpress-social-login/wp-social-login.php";s:5:"2.2.3";s:29:"wp-recaptcha/wp-recaptcha.php";s:3:"4.1";s:35:"xtec-ldap-login/xtec-ldap-login.php";s:3:"2.1";s:23:"xtec-mail/xtec-mail.php";s:3:"3.0";s:25:"xtec-stats/xtec-stats.php";s:3:"1.0";}s:8:"response";a:13:{s:25:"add-to-any/add-to-any.php";O:8:"stdClass":6:{s:2:"id";s:3:"429";s:4:"slug";s:10:"add-to-any";s:6:"plugin";s:25:"add-to-any/add-to-any.php";s:11:"new_version";s:6:"1.6.14";s:3:"url";s:41:"https://wordpress.org/plugins/add-to-any/";s:7:"package";s:60:"https://downloads.wordpress.org/plugin/add-to-any.1.6.14.zip";}s:24:"buddypress/bp-loader.php";O:8:"stdClass":7:{s:2:"id";s:4:"7756";s:4:"slug";s:10:"buddypress";s:6:"plugin";s:24:"buddypress/bp-loader.php";s:11:"new_version";s:5:"2.5.2";s:3:"url";s:41:"https://wordpress.org/plugins/buddypress/";s:7:"package";s:59:"https://downloads.wordpress.org/plugin/buddypress.2.5.2.zip";s:14:"upgrade_notice";s:57:"See: https://codex.buddypress.org/releases/version-2-5-2/";}s:33:"buddypress-activity-plus/bpfb.php";O:8:"stdClass":6:{s:2:"id";s:5:"22781";s:4:"slug";s:24:"buddypress-activity-plus";s:6:"plugin";s:33:"buddypress-activity-plus/bpfb.php";s:11:"new_version";s:5:"1.6.4";s:3:"url";s:55:"https://wordpress.org/plugins/buddypress-activity-plus/";s:7:"package";s:73:"https://downloads.wordpress.org/plugin/buddypress-activity-plus.1.6.4.zip";}s:26:"buddypress-docs/loader.php";O:8:"stdClass":6:{s:2:"id";s:5:"20975";s:4:"slug";s:15:"buddypress-docs";s:6:"plugin";s:26:"buddypress-docs/loader.php";s:11:"new_version";s:5:"1.9.0";s:3:"url";s:46:"https://wordpress.org/plugins/buddypress-docs/";s:7:"package";s:64:"https://downloads.wordpress.org/plugin/buddypress-docs.1.9.0.zip";}s:64:"buddypress-group-email-subscription/bp-activity-subscription.php";O:8:"stdClass":6:{s:2:"id";s:5:"13692";s:4:"slug";s:35:"buddypress-group-email-subscription";s:6:"plugin";s:64:"buddypress-group-email-subscription/bp-activity-subscription.php";s:11:"new_version";s:5:"3.6.0";s:3:"url";s:66:"https://wordpress.org/plugins/buddypress-group-email-subscription/";s:7:"package";s:84:"https://downloads.wordpress.org/plugin/buddypress-group-email-subscription.3.6.0.zip";}s:34:"buddypress-like/bp-like-loader.php";O:8:"stdClass":6:{s:2:"id";s:5:"13151";s:4:"slug";s:15:"buddypress-like";s:6:"plugin";s:34:"buddypress-like/bp-like-loader.php";s:11:"new_version";s:5:"0.3.0";s:3:"url";s:46:"https://wordpress.org/plugins/buddypress-like/";s:7:"package";s:58:"https://downloads.wordpress.org/plugin/buddypress-like.zip";}s:39:"email-subscribers/email-subscribers.php";O:8:"stdClass":7:{s:2:"id";s:5:"50170";s:4:"slug";s:17:"email-subscribers";s:6:"plugin";s:39:"email-subscribers/email-subscribers.php";s:11:"new_version";s:5:"3.1.2";s:3:"url";s:48:"https://wordpress.org/plugins/email-subscribers/";s:7:"package";s:66:"https://downloads.wordpress.org/plugin/email-subscribers.3.1.2.zip";s:14:"upgrade_notice";s:300:"New: You can now include Unsubscribe link in Welcome Email (Email Subscribers v3.1.2+)\nNew: Welcome Page on activating Email Subscribers\nFix: Shortcode not showing error messages upon user subscription\nFix: Show full sized featured image when using ###POSTIMAGE### shortlink\nFix: Can&#039;t edit sett";}s:43:"google-analyticator/google-analyticator.php";O:8:"stdClass":6:{s:2:"id";s:3:"130";s:4:"slug";s:19:"google-analyticator";s:6:"plugin";s:43:"google-analyticator/google-analyticator.php";s:11:"new_version";s:7:"6.4.9.7";s:3:"url";s:50:"https://wordpress.org/plugins/google-analyticator/";s:7:"package";s:70:"https://downloads.wordpress.org/plugin/google-analyticator.6.4.9.7.zip";}s:49:"google-calendar-events/google-calendar-events.php";O:8:"stdClass":6:{s:2:"id";s:5:"15794";s:4:"slug";s:22:"google-calendar-events";s:6:"plugin";s:49:"google-calendar-events/google-calendar-events.php";s:11:"new_version";s:6:"3.0.16";s:3:"url";s:53:"https://wordpress.org/plugins/google-calendar-events/";s:7:"package";s:72:"https://downloads.wordpress.org/plugin/google-calendar-events.3.0.16.zip";}s:67:"import-users-from-csv-with-meta/import-users-from-csv-with-meta.php";O:8:"stdClass":6:{s:2:"id";s:5:"51873";s:4:"slug";s:31:"import-users-from-csv-with-meta";s:6:"plugin";s:67:"import-users-from-csv-with-meta/import-users-from-csv-with-meta.php";s:11:"new_version";s:7:"1.8.7.2";s:3:"url";s:62:"https://wordpress.org/plugins/import-users-from-csv-with-meta/";s:7:"package";s:74:"https://downloads.wordpress.org/plugin/import-users-from-csv-with-meta.zip";}s:21:"raw-html/raw_html.php";O:8:"stdClass":6:{s:2:"id";s:4:"1416";s:4:"slug";s:8:"raw-html";s:6:"plugin";s:21:"raw-html/raw_html.php";s:11:"new_version";s:6:"1.4.16";s:3:"url";s:39:"https://wordpress.org/plugins/raw-html/";s:7:"package";s:58:"https://downloads.wordpress.org/plugin/raw-html.1.4.16.zip";}s:71:"widget-visibility-without-jetpack/widget-visibility-without-jetpack.php";O:8:"stdClass":6:{s:2:"id";s:5:"44147";s:4:"slug";s:33:"widget-visibility-without-jetpack";s:6:"plugin";s:71:"widget-visibility-without-jetpack/widget-visibility-without-jetpack.php";s:11:"new_version";s:3:"1.0";s:3:"url";s:64:"https://wordpress.org/plugins/widget-visibility-without-jetpack/";s:7:"package";s:76:"https://downloads.wordpress.org/plugin/widget-visibility-without-jetpack.zip";}s:42:"wordpress-social-login/wp-social-login.php";O:8:"stdClass":6:{s:2:"id";s:5:"27354";s:4:"slug";s:22:"wordpress-social-login";s:6:"plugin";s:42:"wordpress-social-login/wp-social-login.php";s:11:"new_version";s:5:"2.3.0";s:3:"url";s:53:"https://wordpress.org/plugins/wordpress-social-login/";s:7:"package";s:65:"https://downloads.wordpress.org/plugin/wordpress-social-login.zip";}}s:12:"translations";a:6:{i:0;a:7:{s:4:"type";s:6:"plugin";s:4:"slug";s:7:"bbpress";s:8:"language";s:2:"ca";s:7:"version";s:5:"2.5.8";s:7:"updated";s:19:"2015-11-27 13:54:28";s:7:"package";s:71:"https://downloads.wordpress.org/translation/plugin/bbpress/2.5.8/ca.zip";s:10:"autoupdate";b:1;}i:1;a:7:{s:4:"type";s:6:"plugin";s:4:"slug";s:16:"blogger-importer";s:8:"language";s:2:"ca";s:7:"version";s:3:"0.9";s:7:"updated";s:19:"2015-11-27 11:11:44";s:7:"package";s:78:"https://downloads.wordpress.org/translation/plugin/blogger-importer/0.9/ca.zip";s:10:"autoupdate";b:1;}i:2;a:7:{s:4:"type";s:6:"plugin";s:4:"slug";s:10:"buddypress";s:8:"language";s:2:"ca";s:7:"version";s:5:"2.4.3";s:7:"updated";s:19:"2016-01-18 11:33:09";s:7:"package";s:74:"https://downloads.wordpress.org/translation/plugin/buddypress/2.4.3/ca.zip";s:10:"autoupdate";b:1;}i:3;a:7:{s:4:"type";s:6:"plugin";s:4:"slug";s:19:"google-analyticator";s:8:"language";s:2:"ca";s:7:"version";s:7:"6.4.9.6";s:7:"updated";s:19:"2015-11-25 08:49:50";s:7:"package";s:85:"https://downloads.wordpress.org/translation/plugin/google-analyticator/6.4.9.6/ca.zip";s:10:"autoupdate";b:1;}i:4;a:7:{s:4:"type";s:6:"plugin";s:4:"slug";s:30:"slideshow-jquery-image-gallery";s:8:"language";s:2:"ca";s:7:"version";s:5:"2.3.1";s:7:"updated";s:19:"2015-11-24 16:19:09";s:7:"package";s:94:"https://downloads.wordpress.org/translation/plugin/slideshow-jquery-image-gallery/2.3.1/ca.zip";s:10:"autoupdate";b:1;}i:5;a:7:{s:4:"type";s:6:"plugin";s:4:"slug";s:18:"wordpress-importer";s:8:"language";s:2:"ca";s:7:"version";s:5:"0.6.1";s:7:"updated";s:19:"2015-11-27 11:09:26";s:7:"package";s:82:"https://downloads.wordpress.org/translation/plugin/wordpress-importer/0.6.1/ca.zip";s:10:"autoupdate";b:1;}}s:9:"no_update";a:12:{s:19:"bbpress/bbpress.php";O:8:"stdClass":6:{s:2:"id";s:5:"11780";s:4:"slug";s:7:"bbpress";s:6:"plugin";s:19:"bbpress/bbpress.php";s:11:"new_version";s:5:"2.5.8";s:3:"url";s:38:"https://wordpress.org/plugins/bbpress/";s:7:"package";s:56:"https://downloads.wordpress.org/plugin/bbpress.2.5.8.zip";}s:42:"bbpress-enable-tinymce-visual-tab/init.php";O:8:"stdClass":6:{s:2:"id";s:5:"40515";s:4:"slug";s:33:"bbpress-enable-tinymce-visual-tab";s:6:"plugin";s:42:"bbpress-enable-tinymce-visual-tab/init.php";s:11:"new_version";s:5:"1.0.1";s:3:"url";s:64:"https://wordpress.org/plugins/bbpress-enable-tinymce-visual-tab/";s:7:"package";s:76:"https://downloads.wordpress.org/plugin/bbpress-enable-tinymce-visual-tab.zip";}s:37:"blogger-importer/blogger-importer.php";O:8:"stdClass":6:{s:2:"id";s:5:"14987";s:4:"slug";s:16:"blogger-importer";s:6:"plugin";s:37:"blogger-importer/blogger-importer.php";s:11:"new_version";s:3:"0.9";s:3:"url";s:47:"https://wordpress.org/plugins/blogger-importer/";s:7:"package";s:63:"https://downloads.wordpress.org/plugin/blogger-importer.0.9.zip";}s:29:"bp-moderation/bpModLoader.php";O:8:"stdClass":7:{s:2:"id";s:5:"14585";s:4:"slug";s:13:"bp-moderation";s:6:"plugin";s:29:"bp-moderation/bpModLoader.php";s:11:"new_version";s:5:"0.1.7";s:3:"url";s:44:"https://wordpress.org/plugins/bp-moderation/";s:7:"package";s:62:"https://downloads.wordpress.org/plugin/bp-moderation.0.1.7.zip";s:14:"upgrade_notice";s:62:"Requires PHP 5.3\nModeration page has now a top-level menu item";}s:31:"invite-anyone/invite-anyone.php";O:8:"stdClass":6:{s:2:"id";s:5:"11875";s:4:"slug";s:13:"invite-anyone";s:6:"plugin";s:31:"invite-anyone/invite-anyone.php";s:11:"new_version";s:5:"1.3.9";s:3:"url";s:44:"https://wordpress.org/plugins/invite-anyone/";s:7:"package";s:62:"https://downloads.wordpress.org/plugin/invite-anyone.1.3.9.zip";}s:69:"pending-submission-notifications/pending-submission-notifications.php";O:8:"stdClass":6:{s:2:"id";s:5:"50559";s:4:"slug";s:32:"pending-submission-notifications";s:6:"plugin";s:69:"pending-submission-notifications/pending-submission-notifications.php";s:11:"new_version";s:3:"1.0";s:3:"url";s:63:"https://wordpress.org/plugins/pending-submission-notifications/";s:7:"package";s:75:"https://downloads.wordpress.org/plugin/pending-submission-notifications.zip";}s:25:"slideshare/slideshare.php";O:8:"stdClass":6:{s:2:"id";s:4:"1569";s:4:"slug";s:10:"slideshare";s:6:"plugin";s:25:"slideshare/slideshare.php";s:11:"new_version";s:5:"1.9.1";s:3:"url";s:41:"https://wordpress.org/plugins/slideshare/";s:7:"package";s:59:"https://downloads.wordpress.org/plugin/slideshare.1.9.1.zip";}s:44:"slideshow-jquery-image-gallery/slideshow.php";O:8:"stdClass":6:{s:2:"id";s:5:"31854";s:4:"slug";s:30:"slideshow-jquery-image-gallery";s:6:"plugin";s:44:"slideshow-jquery-image-gallery/slideshow.php";s:11:"new_version";s:5:"2.3.1";s:3:"url";s:61:"https://wordpress.org/plugins/slideshow-jquery-image-gallery/";s:7:"package";s:73:"https://downloads.wordpress.org/plugin/slideshow-jquery-image-gallery.zip";}s:37:"tinymce-advanced/tinymce-advanced.php";O:8:"stdClass":6:{s:2:"id";s:3:"731";s:4:"slug";s:16:"tinymce-advanced";s:6:"plugin";s:37:"tinymce-advanced/tinymce-advanced.php";s:11:"new_version";s:5:"4.2.8";s:3:"url";s:47:"https://wordpress.org/plugins/tinymce-advanced/";s:7:"package";s:65:"https://downloads.wordpress.org/plugin/tinymce-advanced.4.2.8.zip";}s:41:"wordpress-importer/wordpress-importer.php";O:8:"stdClass":6:{s:2:"id";s:5:"14975";s:4:"slug";s:18:"wordpress-importer";s:6:"plugin";s:41:"wordpress-importer/wordpress-importer.php";s:11:"new_version";s:5:"0.6.1";s:3:"url";s:49:"https://wordpress.org/plugins/wordpress-importer/";s:7:"package";s:67:"https://downloads.wordpress.org/plugin/wordpress-importer.0.6.1.zip";}s:41:"wordpress-php-info/wordpress-php-info.php";O:8:"stdClass":6:{s:2:"id";s:4:"6362";s:4:"slug";s:18:"wordpress-php-info";s:6:"plugin";s:41:"wordpress-php-info/wordpress-php-info.php";s:11:"new_version";s:4:"14.2";s:3:"url";s:49:"https://wordpress.org/plugins/wordpress-php-info/";s:7:"package";s:61:"https://downloads.wordpress.org/plugin/wordpress-php-info.zip";}s:29:"wp-recaptcha/wp-recaptcha.php";O:8:"stdClass":6:{s:2:"id";s:4:"3488";s:4:"slug";s:12:"wp-recaptcha";s:6:"plugin";s:29:"wp-recaptcha/wp-recaptcha.php";s:11:"new_version";s:3:"4.1";s:3:"url";s:43:"https://wordpress.org/plugins/wp-recaptcha/";s:7:"package";s:59:"https://downloads.wordpress.org/plugin/wp-recaptcha.4.1.zip";}}}', 'yes'),
(102, '_site_transient_update_themes', 'O:8:"stdClass":4:{s:12:"last_checked";i:1459850094;s:7:"checked";a:1:{s:18:"reactor-primaria-1";s:5:"1.0.0";}s:8:"response";a:0:{}s:12:"translations";a:0:{}}', 'yes'),
(119, 'recently_activated', 'a:0:{}', 'yes'),
(122, '_bbp_private_forums', 'a:0:{}', 'yes'),
(123, '_bbp_hidden_forums', 'a:0:{}', 'yes'),
(124, '_bbp_db_version', '250', 'yes'),
(125, 'bp-deactivated-components', 'a:0:{}', 'yes'),
(126, 'bb-config-location', '/dades/agora/html/wordpress/bb-config.php', 'yes'),
(127, 'bp-xprofile-base-group-name', 'Base', 'yes'),
(128, 'bp-xprofile-fullname-field-name', 'Name', 'yes'),
(129, 'bp-blogs-first-install', '', 'yes'),
(130, 'bp-disable-profile-sync', '0', 'yes'),
(131, 'hide-loggedout-adminbar', '0', 'yes'),
(132, 'bp-disable-avatar-uploads', '0', 'yes'),
(133, 'bp-disable-account-deletion', '1', 'yes'),
(134, 'bp-disable-blogforum-comments', '1', 'yes'),
(135, '_bp_theme_package_id', 'legacy', 'yes'),
(136, 'bp_restrict_group_creation', '1', 'yes'),
(137, '_bp_enable_akismet', '1', 'yes'),
(138, '_bp_enable_heartbeat_refresh', '1', 'yes'),
(139, '_bp_force_buddybar', '', 'yes'),
(140, '_bp_retain_bp_default', '', 'yes'),
(141, 'widget_bp_core_login_widget', 'a:2:{i:1;a:0:{}s:12:"_multiwidget";i:1;}', 'yes'),
(142, 'widget_bp_core_members_widget', 'a:3:{i:1;a:0:{}s:12:"_multiwidget";i:1;i:3;a:0:{}}', 'yes'),
(143, 'widget_bp_core_whos_online_widget', 'a:2:{i:1;a:0:{}s:12:"_multiwidget";i:1;}', 'yes'),
(144, 'widget_bp_core_recently_active_widget', 'a:4:{i:1;a:0:{}i:2;a:3:{s:5:"title";s:17:"Han entrat fa poc";s:11:"max_members";s:2:"50";s:10:"conditions";a:2:{s:6:"action";s:4:"show";s:5:"rules";a:1:{i:0;a:2:{s:5:"major";s:4:"page";s:5:"minor";s:1:"5";}}}}s:12:"_multiwidget";i:1;i:4;a:0:{}}', 'yes'),
(145, 'widget_bp_groups_widget', 'a:5:{i:2;a:5:{s:5:"title";s:5:"Nodes";s:10:"max_groups";s:2:"16";s:13:"group_default";s:6:"active";s:10:"link_title";b:1;s:10:"conditions";a:2:{s:6:"action";s:4:"show";s:5:"rules";a:3:{i:0;a:2:{s:5:"major";s:4:"page";s:5:"minor";s:1:"5";}i:1;a:2:{s:5:"major";s:4:"page";s:5:"minor";s:3:"141";}i:2;a:2:{s:5:"major";s:4:"page";s:5:"minor";s:1:"6";}}}}i:4;a:5:{s:5:"title";s:5:"Nodes";s:10:"max_groups";s:1:"5";s:13:"group_default";s:6:"active";s:10:"link_title";b:1;s:10:"conditions";a:2:{s:6:"action";s:4:"show";s:5:"rules";a:5:{i:0;a:2:{s:5:"major";s:4:"page";s:5:"minor";s:3:"141";}i:1;a:2:{s:5:"major";s:4:"page";s:5:"minor";s:1:"6";}i:2;a:2:{s:5:"major";s:4:"page";s:5:"minor";s:8:"activity";}i:3;a:2:{s:5:"major";s:4:"page";s:5:"minor";s:5:"group";}i:4;a:2:{s:5:"major";s:4:"page";s:5:"minor";s:6:"member";}}}}i:5;a:5:{s:5:"title";s:5:"Nodes";s:10:"max_groups";s:1:"5";s:13:"group_default";s:6:"active";s:10:"link_title";b:0;s:10:"conditions";a:2:{s:6:"action";s:4:"show";s:5:"rules";a:1:{i:0;a:2:{s:5:"major";s:4:"page";s:5:"minor";s:3:"141";}}}}s:12:"_multiwidget";i:1;i:7;a:4:{s:5:"title";s:5:"Nodes";s:10:"max_groups";s:1:"5";s:13:"group_default";s:6:"active";s:10:"link_title";b:0;}}', 'yes'),
(146, 'widget_bp_messages_sitewide_notices_widget', '', 'yes'),
(151, 'registration', '0', 'yes'),
(152, 'bp-active-components', 'a:8:{s:8:"xprofile";s:1:"1";s:8:"settings";s:1:"1";s:7:"friends";s:1:"1";s:8:"messages";s:1:"1";s:8:"activity";s:1:"1";s:13:"notifications";s:1:"1";s:6:"groups";s:1:"1";s:7:"members";s:1:"1";}', 'yes'),
(153, 'bp-pages', 'a:5:{s:7:"members";i:6;s:8:"activity";i:5;s:6:"groups";i:141;s:8:"register";i:440;s:8:"activate";i:436;}', 'yes'),
(154, '_bp_db_version', '10071', 'yes'),
(156, 'bp_docs_attachment_protection', '1', 'yes'),
(157, 'ass_digest_time', 'a:2:{s:5:"hours";s:2:"05";s:7:"minutes";s:2:"00";}', 'yes'),
(158, 'ass_weekly_digest', '4', 'yes'),
(159, 'bp_like_db_version', '24', 'yes'),
(160, 'bp_like_settings', 'a:8:{s:17:"likers_visibility";N;s:23:"post_to_activity_stream";s:1:"1";s:12:"show_excerpt";N;s:14:"excerpt_length";s:3:"140";s:12:"text_strings";a:29:{s:4:"like";a:2:{s:7:"default";s:8:"M''agrada";s:6:"custom";s:33:"<i class="fa fa-thumbs-o-up"></i>";}s:6:"unlike";a:2:{s:7:"default";s:11:"No m''agrada";s:6:"custom";s:31:"<i class="fa fa-thumbs-up"></i>";}s:14:"like_this_item";a:2:{s:7:"default";s:34:"Indica que aquest element m''agrada";s:6:"custom";s:14:"Like this item";}s:16:"unlike_this_item";a:2:{s:7:"default";s:37:"Indica que aquest element no m''agrada";s:6:"custom";s:16:"Unlike this item";}s:10:"view_likes";a:2:{s:7:"default";s:21:"Mostra els "m''agrada"";s:6:"custom";s:10:"View likes";}s:10:"hide_likes";a:2:{s:7:"default";s:20:"Amaga els "M''agrada"";s:6:"custom";s:10:"Hide likes";}s:19:"show_activity_likes";a:2:{s:7:"default";s:9:"Activitat";s:6:"custom";s:14:"Activity Likes";}s:19:"show_blogpost_likes";a:2:{s:7:"default";s:31:""M''agrada" d''enviaments de blog";s:6:"custom";s:15:"Blog Post Likes";}s:17:"must_be_logged_in";a:2:{s:7:"default";s:46:"Has d''estar validat per poder dir que t''agrada";s:6:"custom";s:42:"Sorry, you must be logged in to like that.";}s:25:"record_activity_likes_own";a:2:{s:7:"default";s:74:"A %user% li ha agradat la seva pròpia <a href="%permalink%">activitat</a>";s:6:"custom";s:57:"%user% liked their own <a href="%permalink%">activity</a>";}s:24:"record_activity_likes_an";a:2:{s:7:"default";s:62:"A %user% li ha agradat una <a href="%permalink%">activitat</a>";s:6:"custom";s:50:"%user% liked an <a href="%permalink%">activity</a>";}s:27:"record_activity_likes_users";a:2:{s:7:"default";s:72:"A %user% li ha agradat l''<a href="%permalink%">activitat</a> de %author%";s:6:"custom";s:58:"%user% liked %author%''s <a href="%permalink%">activity</a>";}s:34:"record_activity_likes_own_blogpost";a:2:{s:7:"default";s:88:"A %user% li ha agradat el seu propi enviament al blog, <a href="%permalink%">%title%</a>";s:6:"custom";s:67:"%user% liked their own blog post, <a href="%permalink%">%title%</a>";}s:32:"record_activity_likes_a_blogpost";a:2:{s:7:"default";s:78:"A %user% li ha agradat un enviament al blog, <a href="%permalink%">%title%</a>";s:6:"custom";s:60:"%user% liked an blog post, <a href="%permalink%">%title%</a>";}s:36:"record_activity_likes_users_blogpost";a:2:{s:7:"default";s:89:"A %user% li ha agradat l''enviament de %author% al blog, <a href="%permalink%">%title%</a>";s:6:"custom";s:68:"%user% liked %author%''s blog post, <a href="%permalink%">%title%</a>";}s:18:"get_likes_no_likes";a:2:{s:7:"default";s:29:"Ningú ha clicat a "M''agrada"";s:6:"custom";s:22:"Nobody likes this yet.";}s:20:"get_likes_only_liker";a:2:{s:7:"default";s:47:"Ets l''única persona que ha clicat a "M''agrada"";s:6:"custom";s:46:"You are the only person who likes this so far.";}s:26:"get_likes_you_and_singular";a:2:{s:7:"default";s:40:"A tu i a %count% altra persona us agrada";s:6:"custom";s:39:"You and %count% other person like this.";}s:24:"get_likes_you_and_plural";a:2:{s:7:"default";s:40:"A tu i a %count% persones més us agrada";s:6:"custom";s:38:"You and %count% other people like this";}s:31:"get_likes_count_people_singular";a:2:{s:7:"default";s:33:"A %count% persona li agrada això";s:6:"custom";s:26:"%count% person likes this.";}s:29:"get_likes_count_people_plural";a:2:{s:7:"default";s:35:"A %count% persones els agrada això";s:6:"custom";s:25:"%count% people like this.";}s:29:"get_likes_and_people_singular";a:2:{s:7:"default";s:34:"i a %count% persona més us agrada";s:6:"custom";s:35:"and %count% other person like this.";}s:27:"get_likes_and_people_plural";a:2:{s:7:"default";s:35:"i a %count% persones més us agrada";s:6:"custom";s:35:"and %count% other people like this.";}s:20:"get_likes_likes_this";a:2:{s:7:"default";s:13:"li ha agradat";s:6:"custom";s:11:"liked this.";}s:19:"get_likes_like_this";a:2:{s:7:"default";s:9:"li agrada";s:6:"custom";s:10:"like this.";}s:37:"get_likes_no_friends_you_and_singular";a:2:{s:7:"default";s:87:"Cap dels teus amics ha clicat a "M''agrada", però tu i %count% altra persona ho heu fet";s:6:"custom";s:74:"None of your friends like this yet, but you and %count% other person does.";}s:35:"get_likes_no_friends_you_and_plural";a:2:{s:7:"default";s:87:"Cap dels teus amics ha clicat a "M''agrada", però tu i %count% persones més ho heu fet";s:6:"custom";s:72:"None of your friends like this yet, but you and %count% other people do.";}s:29:"get_likes_no_friends_singular";a:2:{s:7:"default";s:75:"Cap dels teus amics ha clicat a "M''agrada", però %count% persona ho ha fet";s:6:"custom";s:66:"None of your friends like this yet, but %count% other person does.";}s:27:"get_likes_no_friends_plural";a:2:{s:7:"default";s:77:"Cap dels teus amics ha clicat a "M''agrada", però %count% persones ho han fet";s:6:"custom";s:64:"None of your friends like this yet, but %count% other people do.";}}s:13:"translate_nag";N;s:14:"name_or_avatar";N;s:17:"remove_fav_button";N;}', 'yes'),
(161, 'bp_moderation_options', 'a:6:{s:14:"unflagged_text";s:9:"Inadequat";s:12:"flagged_text";s:16:"No és inadequat";s:12:"active_types";a:1:{s:16:"activity_comment";s:2:"on";}s:17:"warning_threshold";i:5;s:15:"warning_forward";s:17:"a8000006@xtec.cat";s:15:"warning_message";s:297:"Several user reported one of your content as inappropriate.\r\nYou can see the content in the page: %CONTENTURL%.\r\nYou posted this content with the account "%AUTHORNAME%".\r\n\r\nA community moderator will soon review and moderate this content if necessary.\r\n--------------------\r\n[%SITENAME%] %SITEURL%";}', 'yes'),
(162, 'bp_moderation_db_version', '-100', 'yes'),
(163, 'gce_version', '2.2.5', 'yes'),
(164, 'gce_options', 'a:1:{i:1;a:28:{s:2:"id";i:1;s:5:"title";s:0:"";s:3:"url";s:78:"http://www.google.com/calendar/feeds/inslarany%40ies-sabadell.cat/public/basic";s:13:"retrieve_from";s:5:"today";s:19:"retrieve_from_value";i:0;s:14:"retrieve_until";s:3:"any";s:20:"retrieve_until_value";i:0;s:10:"max_events";i:25;s:11:"date_format";s:0:"";s:11:"time_format";s:0:"";s:8:"timezone";s:7:"default";s:14:"cache_duration";i:300;s:12:"multiple_day";s:4:"true";s:13:"display_start";s:4:"time";s:11:"display_end";s:9:"time-date";s:16:"display_location";N;s:12:"display_desc";N;s:12:"display_link";s:2:"on";s:18:"display_start_text";s:7:"Starts:";s:16:"display_end_text";s:5:"Ends:";s:21:"display_location_text";s:9:"Location:";s:17:"display_desc_text";s:12:"Description:";s:18:"display_desc_limit";s:0:"";s:17:"display_link_text";s:12:"More details";s:19:"display_link_target";N;s:17:"display_separator";s:2:", ";s:11:"use_builder";s:4:"true";s:7:"builder";s:451:"<div class="gce-list-event gce-tooltip-event">[event-title]</div>\r\n[if-not-all-day]\r\n[if-single-day]<div><span>Quan:</span> [start-time]-[end-time]</div>[/if-single-day]\r\n[/if-not-all-day]\r\n[if-multi-day]<div>Del [start-date] fins el [end-date]</div>[/if-multi-day]\r\n[if-location]<div><span>On:</span> [location]</div>[/if-location]\r\n[if-description]<div>[description]</div>[/if-description]\r\n<div>[link newwindow="true"]Més detalls...[/link]</div>\r\n";}}', 'yes'),
(165, 'gce_general', 'a:7:{s:10:"stylesheet";s:0:"";s:10:"javascript";b:0;s:7:"loading";s:12:"Carregant...";s:5:"error";s:65:"El calendari no està disponible, torna a provar en uns minuts...";s:6:"fields";b:1;s:14:"old_stylesheet";b:0;s:13:"save_settings";b:1;}', 'yes'),
(166, 'invite_anyone', 'a:22:{s:11:"max_invites";i:5;s:23:"allow_email_invitations";s:3:"all";s:23:"message_is_customizable";s:3:"yes";s:23:"subject_is_customizable";s:2:"no";s:28:"can_send_group_invites_email";s:3:"yes";s:24:"bypass_registration_lock";s:3:"yes";s:7:"version";s:5:"1.3.1";s:23:"email_visibility_toggle";s:8:"no_limit";s:18:"email_since_toggle";b:0;s:10:"days_since";s:1:"0";s:17:"email_role_toggle";s:3:"yes";s:12:"minimum_role";s:13:"Administrator";s:22:"email_blacklist_toggle";b:0;s:15:"email_blacklist";s:0:"";s:23:"group_invites_can_admin";s:6:"anyone";s:29:"group_invites_can_group_admin";s:6:"anyone";s:27:"group_invites_can_group_mod";s:6:"anyone";s:30:"group_invites_can_group_member";s:5:"noone";s:32:"group_invites_enable_create_step";s:3:"yes";s:19:"cloudsponge_enabled";s:3:"off";s:26:"email_limit_invites_toggle";b:0;s:22:"limit_invites_per_user";s:2:"10";}', 'yes'),
(167, 'invite_anyone_db_version', '1.3.9', 'yes'),
(168, 'slideshow-plugin-updated-from-v1-x-x-to-v2-0-1', 'updated', 'yes'),
(169, 'slideshow-plugin-updated-from-v2-to-v2-1-20', 'updated', 'yes'),
(170, 'slideshow-jquery-image-gallery-updated-from-v2-1-20-to-v2-1-22', 'updated', 'yes'),
(171, 'slideshow-jquery-image-gallery-updated-from-v2-1-20-to-v2-1-23', 'updated', 'yes'),
(172, 'slideshow-jquery-image-gallery-updated-from-v2-1-23-to-v2-2-0', 'updated', 'yes'),
(173, 'slideshow-jquery-image-gallery-updated-from-v2-2-0-to-v2-2-8', 'updated', 'yes'),
(174, 'slideshow-jquery-image-gallery-updated-from-v2-2-8-to-v2-2-12', 'updated', 'yes'),
(175, 'slideshow-jquery-image-gallery-updated-from-v2-2-12-to-v2-2-16', 'updated', 'yes'),
(176, 'slideshow-jquery-image-gallery-updated-from-v2-2-16-to-v2-2-17', 'updated', 'yes'),
(177, 'slideshow-jquery-image-gallery-updated-from-v2-2-17-to-v2-2-20', 'updated', 'yes'),
(178, 'slideshow-jquery-image-gallery-plugin-version', '2.3.1', 'yes'),
(179, 'social_articles_options', 'a:6:{s:13:"post_per_page";s:2:"10";s:14:"excerpt_length";s:2:"30";s:8:"workflow";s:8:"approval";s:16:"bp_notifications";s:4:"true";s:20:"allow_author_adition";s:4:"true";s:21:"allow_author_deletion";s:4:"true";}', 'yes'),
(181, 'wsl_database_migration_version', '4', 'yes'),
(182, 'wsl_components_core_enabled', '1', 'yes'),
(183, 'wsl_components_networks_enabled', '1', 'yes'),
(184, 'wsl_components_login-widget_enabled', '1', 'yes'),
(185, 'wsl_components_bouncer_enabled', '1', 'yes'),
(186, 'wsl_components_diagnostics_enabled', '1', 'yes'),
(187, 'wsl_settings_welcome_panel_enabled', '', 'yes'),
(188, 'wsl_settings_redirect_url', 'http://pwc-int.educacio.intranet/agora/masterpri', 'yes'),
(189, 'wsl_settings_connect_with_label', 'Connect with:', 'yes'),
(190, 'wsl_settings_use_popup', '2', 'yes'),
(191, 'wsl_settings_widget_display', '1', 'yes'),
(192, 'wsl_settings_authentication_widget_css', '#wp-social-login-connect-with {font-weight: bold;}\n#wp-social-login-connect-options {padding:10px;}\n#wp-social-login-connect-options a {text-decoration: none;}\n#wp-social-login-connect-options img {border:0 none;}\n.wsl_connect_with_provider {}', 'yes'),
(193, 'wsl_settings_bouncer_registration_enabled', '1', 'yes'),
(194, 'wsl_settings_bouncer_authentication_enabled', '1', 'yes'),
(195, 'wsl_settings_bouncer_linking_accounts_enabled', '2', 'yes'),
(196, 'wsl_settings_bouncer_profile_completion_require_email', '2', 'yes'),
(197, 'wsl_settings_bouncer_profile_completion_change_email', '2', 'yes'),
(198, 'wsl_settings_bouncer_profile_completion_change_username', '2', 'yes'),
(199, 'wsl_settings_bouncer_profile_completion_text_notice', 'Almost there, we just need to check a couple of things', 'yes'),
(200, 'wsl_settings_bouncer_profile_completion_text_submit_button', 'Continue', 'yes'),
(201, 'wsl_settings_bouncer_profile_completion_text_email', 'E-mail', 'yes'),
(202, 'wsl_settings_bouncer_profile_completion_text_username', 'Username', 'yes'),
(203, 'wsl_settings_bouncer_profile_completion_text_email_invalid', 'E-mail is not valid!', 'yes'),
(204, 'wsl_settings_bouncer_profile_completion_text_username_invalid', 'Username is not valid!', 'yes'),
(205, 'wsl_settings_bouncer_profile_completion_text_email_exists', 'That E-mail is already registered!', 'yes'),
(206, 'wsl_settings_bouncer_profile_completion_text_username_exists', 'That Username is already registered!', 'yes'),
(207, 'wsl_settings_bouncer_profile_completion_text_connected_with', 'You are now connected via', 'yes'),
(208, 'wsl_settings_bouncer_new_users_moderation_level', '1', 'yes'),
(209, 'wsl_settings_bouncer_new_users_membership_default_role', 'default', 'yes'),
(210, 'wsl_settings_bouncer_new_users_restrict_domain_enabled', '2', 'yes'),
(211, 'wsl_settings_bouncer_new_users_restrict_domain_text_bounce', 'Bouncer says no.', 'yes'),
(212, 'wsl_settings_bouncer_new_users_restrict_email_enabled', '2', 'yes'),
(213, 'wsl_settings_bouncer_new_users_restrict_email_text_bounce', 'Bouncer say he refuses.', 'yes'),
(214, 'wsl_settings_bouncer_new_users_restrict_profile_enabled', '2', 'yes'),
(215, 'wsl_settings_bouncer_new_users_restrict_profile_text_bounce', 'Bouncer say only Mundo can go where he pleases!', 'yes'),
(216, 'wsl_settings_contacts_import_facebook', '2', 'yes'),
(217, 'wsl_settings_contacts_import_google', '2', 'yes'),
(218, 'wsl_settings_contacts_import_twitter', '2', 'yes'),
(219, 'wsl_settings_contacts_import_live', '2', 'yes'),
(220, 'wsl_settings_contacts_import_linkedin', '2', 'yes'),
(221, 'wsl_settings_Google_enabled', '0', 'yes'),
(222, 'wsl_settings_Moodle_enabled', '0', 'yes'),
(224, 'xtec_mail_idapp', 'AGORA', 'yes'),
(225, 'xtec_mail_replyto', 'agora-noreply@xtec.cat', 'yes'),
(226, 'xtec_mail_sender', 'educacio', 'yes'),
(227, 'xtec_mail_log', '0', 'yes'),
(228, 'xtec_mail_debug', '0', 'yes'),
(229, 'xtec_mail_logpath', '', 'yes'),
(233, 'current_theme', 'NODES', 'yes'),
(234, 'theme_mods_reactor-primaria-1', 'a:2:{i:0;b:0;s:18:"nav_menu_locations";a:1:{s:9:"main-menu";i:6;}}', 'yes'),
(235, 'theme_switched', '', 'yes'),
(237, 'widget_pages', 'a:2:{i:1;a:0:{}s:12:"_multiwidget";i:1;}', 'yes'),
(238, 'widget_calendar', 'a:2:{i:1;a:0:{}s:12:"_multiwidget";i:1;}', 'yes'),
(239, 'widget_tag_cloud', 'a:3:{i:1;a:0:{}i:2;a:3:{s:5:"title";s:0:"";s:8:"taxonomy";s:8:"post_tag";s:10:"conditions";a:2:{s:6:"action";s:4:"show";s:5:"rules";a:1:{i:0;a:2:{s:5:"major";s:4:"page";s:5:"minor";s:14:"post_type-post";}}}}s:12:"_multiwidget";i:1;}', 'yes'),
(240, 'widget_nav_menu', 'a:5:{i:1;a:0:{}i:2;a:3:{s:5:"title";s:15:"Blogs de classe";s:8:"nav_menu";i:2;s:10:"conditions";a:2:{s:6:"action";s:4:"show";s:5:"rules";a:1:{i:0;a:2:{s:5:"major";s:8:"category";s:5:"minor";s:1:"2";}}}}i:3;a:3:{s:5:"title";s:15:"Blogs de classe";s:8:"nav_menu";i:5;s:10:"conditions";a:2:{s:6:"action";s:4:"show";s:5:"rules";a:1:{i:0;a:2:{s:5:"major";s:8:"category";s:5:"minor";s:1:"5";}}}}s:12:"_multiwidget";i:1;i:5;a:2:{s:8:"nav_menu";i:21;s:10:"conditions";a:2:{s:6:"action";s:4:"show";s:5:"rules";a:5:{i:0;a:2:{s:5:"major";s:4:"page";s:5:"minor";s:8:"activity";}i:1;a:2:{s:5:"major";s:4:"page";s:5:"minor";s:5:"group";}i:2;a:2:{s:5:"major";s:4:"page";s:5:"minor";s:6:"member";}i:3;a:2:{s:5:"major";s:4:"page";s:5:"minor";s:1:"6";}i:4;a:2:{s:5:"major";s:4:"page";s:5:"minor";s:3:"141";}}}}}', 'yes'),
(241, 'widget_bbp_login_widget', 'a:2:{i:1;a:0:{}s:12:"_multiwidget";i:1;}', 'yes'),
(242, 'widget_bbp_views_widget', 'a:2:{i:1;a:0:{}s:12:"_multiwidget";i:1;}', 'yes'),
(243, 'widget_bbp_search_widget', 'a:2:{i:1;a:0:{}s:12:"_multiwidget";i:1;}', 'yes'),
(244, 'widget_bbp_forums_widget', 'a:2:{i:1;a:0:{}s:12:"_multiwidget";i:1;}', 'yes'),
(245, 'widget_bbp_topics_widget', 'a:2:{i:1;a:0:{}s:12:"_multiwidget";i:1;}', 'yes'),
(246, 'widget_bbp_replies_widget', 'a:2:{i:1;a:0:{}s:12:"_multiwidget";i:1;}', 'yes'),
(247, 'widget_bbp_stats_widget', 'a:2:{i:1;a:0:{}s:12:"_multiwidget";i:1;}', 'yes');
INSERT INTO `wp_options` (`option_id`, `option_name`, `option_value`, `autoload`) VALUES
(248, 'widget_gce_widget', 'a:3:{i:1;a:0:{}i:2;a:14:{s:5:"title";s:0:"";s:2:"id";s:3:"145";s:12:"display_type";s:4:"grid";s:10:"max_events";i:0;s:5:"order";s:3:"asc";s:13:"display_title";b:0;s:18:"display_title_text";s:17:"Esdeveniments del";s:6:"paging";i:1;s:12:"list_max_num";s:1:"7";s:15:"list_max_length";s:4:"days";s:21:"list_start_offset_num";s:1:"0";s:27:"list_start_offset_direction";s:4:"back";s:12:"per_page_num";s:1:"7";s:15:"events_per_page";s:4:"days";}s:12:"_multiwidget";i:1;}', 'yes'),
(249, 'widget_slideshowwidget', 'a:3:{i:1;a:0:{}i:2;a:3:{s:5:"title";s:9:"Destacats";s:11:"slideshowId";s:3:"140";s:10:"conditions";a:2:{s:6:"action";s:4:"show";s:5:"rules";a:1:{i:0;a:2:{s:5:"major";s:4:"page";s:5:"minor";s:1:"5";}}}}s:12:"_multiwidget";i:1;}', 'yes'),
(250, 'widget_invite-anyone-widget', 'a:2:{i:1;a:0:{}s:12:"_multiwidget";i:1;}', 'yes'),
(251, 'widget_xtec_widget', 'a:4:{i:1;a:0:{}i:2;a:21:{s:5:"title";s:0:"";s:11:"ensenyament";s:2:"on";s:4:"xtec";s:2:"on";s:6:"edu365";s:2:"on";s:4:"edu3";s:2:"on";s:12:"xarxa-docent";s:0:"";s:10:"alexandria";s:0:"";s:6:"linkat";s:0:"";s:5:"jclic";s:0:"";s:5:"merli";s:0:"";s:3:"arc";s:0:"";s:7:"odissea";s:0:"";s:4:"ampa";s:0:"";s:12:"escola-verda";s:0:"";s:4:"atri";s:0:"";s:4:"saga";s:0:"";s:14:"familia-escola";s:0:"";s:15:"internet-segura";s:0:"";s:6:"moodle";s:0:"";s:8:"ampa_url";s:53:"http://pwc-int.educacio.intranet/agora/masterpri/ampa";s:16:"escola-verda_url";s:127:"http://mediambient.gencat.cat/ca/05_ambits_dactuacio/educacio_i_sostenibilitat/educacio_per_a_la_sostenibilitat/escoles_verdes/";}i:3;a:13:{s:5:"title";s:19:"Enllaços educatius";s:11:"ensenyament";s:2:"on";s:4:"xtec";s:2:"on";s:6:"edu365";s:2:"on";s:4:"edu3";s:2:"on";s:12:"xarxa-docent";s:0:"";s:10:"alexandria";s:0:"";s:6:"linkat";s:0:"";s:5:"jclic";s:0:"";s:5:"merli";s:0:"";s:4:"atri";s:0:"";s:4:"saga";s:0:"";s:15:"internet-segura";s:0:"";}s:12:"_multiwidget";i:1;}', 'yes'),
(252, 'widget_logo_centre_widget', 'a:4:{i:1;a:0:{}i:2;a:1:{s:5:"title";s:0:"";}i:3;a:1:{s:5:"title";s:0:"";}s:12:"_multiwidget";i:1;}', 'yes'),
(253, 'reactor_options', 'a:22:{s:15:"tamany_font_nom";s:5:"2.5vw";s:16:"imatge_capcalera";s:0:"";s:8:"carrusel";s:3:"103";s:10:"logo_image";s:96:"http://pwc-int.educacio.intranet/agora/masterpri/wp-content/uploads/usu6/2014/09/logo-escola.png";s:16:"nomCanonicCentre";s:18:"Escola Josep Arany";s:14:"direccioCentre";s:21:"Plaça de la Vila, 14";s:8:"cpCentre";s:21:"01234 Abella de Xerta";s:9:"telCentre";s:10:"12 345 678";s:10:"googleMaps";s:25:"https://goo.gl/maps/GTGDy";s:11:"emailCentre";s:64:"http://pwc-int.educacio.intranet/agora/masterpri/lescola/on-som/";s:13:"paleta_colors";s:12:"taronja-verd";s:14:"frontpage_page";s:1:"9";s:23:"frontpage_post_category";s:1:"4";s:16:"frontpage_layout";s:4:"2c-l";s:26:"frontpage_posts_per_fila_1";s:2:"33";s:26:"frontpage_posts_per_fila_2";s:1:"2";s:26:"frontpage_posts_per_fila_n";s:1:"2";s:22:"frontpage_number_posts";s:2:"20";s:21:"frontpage_link_titles";b:1;s:13:"post_readmore";s:14:"Llegeix més»";s:13:"favicon_image";s:0:"";s:11:"logo_inline";b:1;}', 'yes'),
(254, 'icones_capcalera', '', 'yes'),
(281, 'tadv_settings', 'a:6:{s:7:"options";s:15:"menubar,advlist";s:9:"toolbar_1";s:117:"bold,italic,blockquote,bullist,numlist,alignleft,aligncenter,alignright,link,unlink,table,fullscreen,undo,redo,wp_adv";s:9:"toolbar_2";s:121:"formatselect,alignjustify,strikethrough,outdent,indent,pastetext,removeformat,charmap,wp_more,emoticons,forecolor,wp_help";s:9:"toolbar_3";s:0:"";s:9:"toolbar_4";s:0:"";s:7:"plugins";s:107:"anchor,code,insertdatetime,nonbreaking,print,searchreplace,table,visualblocks,visualchars,emoticons,advlist";}', 'yes'),
(282, 'tadv_admin_settings', 'a:1:{s:7:"options";a:0:{}}', 'yes'),
(283, 'tadv_version', '4000', 'yes'),
(306, 'nav_menu_options', 'a:2:{i:0;b:0;s:8:"auto_add";a:0:{}}', 'yes'),
(312, 'category_8', 'a:1:{s:13:"articles_fila";s:0:"";}', 'yes'),
(367, 'my_option_name', 'a:13:{s:6:"icon11";s:14:"format-gallery";s:11:"link_icon11";s:110:"https://picasaweb.google.com/104252377742684144682/ExempleDeGaleriaDeFotosDeLEscola?authuser=0&feat=directlink";s:12:"title_icon11";s:5:"FOTOS";s:6:"icon12";s:6:"groups";s:11:"link_icon12";s:64:"http://pwc-int.educacio.intranet/agora/masterpri/categoria/ampa/";s:12:"title_icon12";s:4:"AMPA";s:6:"icon21";s:6:"carrot";s:11:"link_icon21";s:74:"http://pwc-int.educacio.intranet/agora/masterpri/serveis/menjador-escolar/";s:12:"title_icon21";s:8:"MENJADOR";s:6:"icon22";s:11:"format-chat";s:11:"link_icon22";s:58:"http://pwc-int.educacio.intranet/agora/masterpri/activitat";s:12:"title_icon22";s:5:"NODES";s:14:"show_text_icon";s:2:"si";}', 'yes'),
(443, '_transient_bp_active_member_count', '2', 'yes'),
(446, 'bpfb', 'a:5:{s:5:"theme";s:3:"new";s:9:"alignment";s:4:"left";s:12:"oembed_width";i:450;s:20:"thumbnail_size_width";i:450;s:21:"thumbnail_size_height";i:450;}', 'yes'),
(458, 'bphelp-my-redirect-slug', 'wp-login.php', 'yes'),
(595, 'widget_bp_core_friends_widget', 'a:2:{i:1;a:0:{}s:12:"_multiwidget";i:1;}', 'yes'),
(619, 'gce_settings_general', 'a:2:{s:13:"save_settings";i:1;s:14:"always_enqueue";i:1;}', 'yes'),
(622, 'gce_cpt_setup', '1', 'yes'),
(671, 'ga_version', '6.4.7.3', 'yes'),
(672, 'ga_status', 'disabled', 'yes'),
(673, 'ga_disable_gasites', 'disabled', 'yes'),
(674, 'ga_analytic_snippet', 'enabled', 'yes'),
(675, 'ga_uid', 'UA-XXXXXXXX-X', 'yes'),
(676, 'ga_admin_status', 'enabled', 'yes'),
(677, 'ga_admin_disable_DimentionIndex', '', 'yes'),
(678, 'ga_admin_disable', 'remove', 'yes'),
(679, 'ga_admin_role', 'a:1:{i:0;s:13:"administrator";}', 'yes'),
(680, 'ga_dashboard_role', 'a:1:{i:0;s:13:"administrator";}', 'yes'),
(681, 'key_ga_show_ad', '1', 'yes'),
(682, 'ga_adsense', '', 'yes'),
(683, 'ga_extra', '', 'yes'),
(684, 'ga_extra_after', '', 'yes'),
(685, 'ga_event', 'enabled', 'yes'),
(686, 'ga_outbound', 'enabled', 'yes'),
(687, 'ga_outbound_prefix', 'outgoing', 'yes'),
(688, 'ga_enhanced_link_attr', 'disabled', 'yes'),
(689, 'ga_downloads', '', 'yes'),
(690, 'ga_downloads_prefix', 'download', 'yes'),
(691, 'ga_widgets', 'enabled', 'yes'),
(692, 'ga_annon', '', 'yes'),
(693, 'ga_defaults', 'yes', 'yes'),
(694, 'ga_google_token', '', 'yes'),
(777, 'widget_socialmedia_widget', 'a:3:{i:1;a:0:{}i:2;a:21:{s:5:"title";s:12:"Segueix-nos!";s:4:"mida";s:7:"fa-2-5x";s:11:"twitter_url";s:20:"twitter de la escola";s:12:"facebook_url";s:21:"facebook de la escola";s:15:"google-plus_url";s:0:"";s:11:"youtube_url";s:20:"youtube de la escola";s:9:"vimeo_url";s:0:"";s:10:"picasa_url";s:0:"";s:10:"flickr_url";s:0:"";s:13:"pinterest_url";s:0:"";s:13:"instagram_url";s:0:"";s:10:"tumblr_url";s:0:"";s:14:"soundcloud_url";s:0:"";s:11:"dropbox_url";s:0:"";s:7:"rss_url";s:53:"http://pwc-int.educacio.intranet/agora/masterpri/feed";s:9:"email_url";s:0:"";s:10:"moodle_url";s:0:"";s:14:"xarxanodes_url";s:58:"http://pwc-int.educacio.intranet/agora/masterpri/activitat";s:8:"docs_url";s:0:"";s:9:"fotos_url";s:0:"";s:9:"video_url";s:0:"";}s:12:"_multiwidget";i:1;}', 'yes'),
(787, 'category_10', 'a:1:{s:13:"articles_fila";s:0:"";}', 'yes'),
(791, 'category_11', 'a:1:{s:13:"articles_fila";s:0:"";}', 'yes'),
(793, 'category_12', 'a:1:{s:13:"articles_fila";s:0:"";}', 'yes'),
(837, '_transient_random_seed', '9acd3dd08455c93b222b4cc2f0cb3a63', 'yes'),
(840, 'WPLANG', 'ca', 'yes'),
(841, 'db_upgraded', '', 'yes'),
(843, 'wsl_settings_Google_app_scope', 'profile https://www.googleapis.com/auth/plus.profile.emails.read', 'yes'),
(848, 'widget_grup_classe_widget', 'a:10:{i:2;a:12:{s:5:"title";s:13:"El blog de P3";s:12:"id_calendari";s:3:"145";s:13:"nom_calendari";s:6:"Agenda";s:14:"calendari_grid";b:1;s:14:"calendari_list";b:0;s:9:"nom_tutor";s:15:"Nom del tutor/a";s:11:"email_tutor";s:21:"tutor.p3@escarany.cat";s:15:"horari_families";s:15:"dl. 00:00-00:00";s:8:"nav_menu";s:2:"20";s:9:"text_open";s:106:"<img src=http://pwc-int.educacio.intranet/agora/masterpri/wp-content/uploads/usu6/2015/01/foto-classe.png>";s:10:"text_close";s:71:"Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum";s:10:"conditions";a:2:{s:6:"action";s:4:"show";s:5:"rules";a:1:{i:0;a:2:{s:5:"major";s:8:"category";s:5:"minor";s:1:"3";}}}}i:3;a:12:{s:5:"title";s:13:"El blog de P4";s:12:"id_calendari";s:3:"145";s:13:"nom_calendari";s:6:"Agenda";s:14:"calendari_grid";b:1;s:14:"calendari_list";b:0;s:9:"nom_tutor";s:15:"Nom del tutor/a";s:11:"email_tutor";s:21:"tutor.p4@escarany.cat";s:15:"horari_families";s:15:"dl. 00:00-00:00";s:8:"nav_menu";s:2:"20";s:9:"text_open";s:106:"<img src=http://pwc-int.educacio.intranet/agora/masterpri/wp-content/uploads/usu6/2015/01/foto-classe.png>";s:10:"text_close";s:71:"Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum";s:10:"conditions";a:2:{s:6:"action";s:4:"show";s:5:"rules";a:1:{i:0;a:2:{s:5:"major";s:8:"category";s:5:"minor";s:1:"8";}}}}i:4;a:12:{s:5:"title";s:13:"El blog de P5";s:12:"id_calendari";s:3:"145";s:13:"nom_calendari";s:6:"Agenda";s:14:"calendari_grid";b:1;s:14:"calendari_list";b:0;s:9:"nom_tutor";s:15:"Nom del tutor/a";s:11:"email_tutor";s:21:"tutor.p5@escarany.cat";s:15:"horari_families";s:15:"dl. 00:00-00:00";s:8:"nav_menu";s:2:"20";s:9:"text_open";s:106:"<img src=http://pwc-int.educacio.intranet/agora/masterpri/wp-content/uploads/usu6/2015/01/foto-classe.png>";s:10:"text_close";s:71:"Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum";s:10:"conditions";a:2:{s:6:"action";s:4:"show";s:5:"rules";a:1:{i:0;a:2:{s:5:"major";s:8:"category";s:5:"minor";s:1:"9";}}}}i:5;a:12:{s:5:"title";s:10:"Blog de 1r";s:12:"id_calendari";s:3:"145";s:13:"nom_calendari";s:6:"Agenda";s:14:"calendari_grid";b:1;s:14:"calendari_list";b:0;s:9:"nom_tutor";s:15:"Nom del tutor/a";s:11:"email_tutor";s:21:"tutor.1r@escarany.cat";s:15:"horari_families";s:15:"dl. 00:00-00:00";s:8:"nav_menu";s:2:"20";s:9:"text_open";s:106:"<img src=http://pwc-int.educacio.intranet/agora/masterpri/wp-content/uploads/usu6/2015/01/foto-classe.png>";s:10:"text_close";s:71:"Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum";s:10:"conditions";a:2:{s:6:"action";s:4:"show";s:5:"rules";a:1:{i:0;a:2:{s:5:"major";s:8:"category";s:5:"minor";s:2:"10";}}}}i:6;a:12:{s:5:"title";s:10:"Blog de 2n";s:12:"id_calendari";s:3:"145";s:13:"nom_calendari";s:0:"";s:14:"calendari_grid";b:1;s:14:"calendari_list";b:0;s:9:"nom_tutor";s:15:"Nom del tutor/a";s:11:"email_tutor";s:21:"tutor.2n@escarany.cat";s:15:"horari_families";s:15:"dl. 00:00-00:00";s:8:"nav_menu";s:2:"20";s:9:"text_open";s:106:"<img src=http://pwc-int.educacio.intranet/agora/masterpri/wp-content/uploads/usu6/2015/01/foto-classe.png>";s:10:"text_close";s:71:"Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum";s:10:"conditions";a:2:{s:6:"action";s:4:"show";s:5:"rules";a:1:{i:0;a:2:{s:5:"major";s:8:"category";s:5:"minor";s:2:"11";}}}}i:7;a:12:{s:5:"title";s:10:"Blog de 3r";s:12:"id_calendari";s:3:"145";s:13:"nom_calendari";s:6:"Agenda";s:14:"calendari_grid";b:1;s:14:"calendari_list";b:0;s:9:"nom_tutor";s:15:"Nom del tutor/a";s:11:"email_tutor";s:21:"tutor.3r@escarany.cat";s:15:"horari_families";s:15:"dl. 00:00-00:00";s:8:"nav_menu";s:2:"20";s:9:"text_open";s:106:"<img src=http://pwc-int.educacio.intranet/agora/masterpri/wp-content/uploads/usu6/2015/01/foto-classe.png>";s:10:"text_close";s:71:"Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum";s:10:"conditions";a:2:{s:6:"action";s:4:"show";s:5:"rules";a:1:{i:0;a:2:{s:5:"major";s:8:"category";s:5:"minor";s:2:"12";}}}}i:8;a:12:{s:5:"title";s:10:"Blog de 4t";s:12:"id_calendari";s:3:"145";s:13:"nom_calendari";s:6:"Agenda";s:14:"calendari_grid";b:1;s:14:"calendari_list";b:0;s:9:"nom_tutor";s:15:"Nom del tutor/a";s:11:"email_tutor";s:21:"tutor.4t@escarany.cat";s:15:"horari_families";s:15:"dl. 00:00-00:00";s:8:"nav_menu";s:2:"20";s:9:"text_open";s:106:"<img src=http://pwc-int.educacio.intranet/agora/masterpri/wp-content/uploads/usu6/2015/01/foto-classe.png>";s:10:"text_close";s:71:"Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum";s:10:"conditions";a:2:{s:6:"action";s:4:"show";s:5:"rules";a:1:{i:0;a:2:{s:5:"major";s:8:"category";s:5:"minor";s:2:"13";}}}}i:9;a:12:{s:5:"title";s:11:"Blog de 5è";s:12:"id_calendari";s:3:"145";s:13:"nom_calendari";s:6:"Agenda";s:14:"calendari_grid";b:1;s:14:"calendari_list";b:0;s:9:"nom_tutor";s:15:"Nom del tutor/a";s:11:"email_tutor";s:21:"tutor.5e@escarany.cat";s:15:"horari_families";s:15:"dl. 00:00-00:00";s:8:"nav_menu";s:2:"20";s:9:"text_open";s:106:"<img src=http://pwc-int.educacio.intranet/agora/masterpri/wp-content/uploads/usu6/2015/01/foto-classe.png>";s:10:"text_close";s:71:"Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum";s:10:"conditions";a:2:{s:6:"action";s:4:"show";s:5:"rules";a:1:{i:0;a:2:{s:5:"major";s:8:"category";s:5:"minor";s:2:"14";}}}}i:10;a:12:{s:5:"title";s:11:"Blog de 6è";s:12:"id_calendari";s:3:"145";s:13:"nom_calendari";s:6:"Agenda";s:14:"calendari_grid";b:1;s:14:"calendari_list";b:0;s:9:"nom_tutor";s:15:"Nom del tutor/a";s:11:"email_tutor";s:21:"tutor.6e@escarany.cat";s:15:"horari_families";s:15:"dl. 00:00-00:00";s:8:"nav_menu";s:2:"20";s:9:"text_open";s:106:"<img src=http://pwc-int.educacio.intranet/agora/masterpri/wp-content/uploads/usu6/2015/01/foto-classe.png>";s:10:"text_close";s:71:"Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum";s:10:"conditions";a:2:{s:6:"action";s:4:"show";s:5:"rules";a:1:{i:0;a:2:{s:5:"major";s:8:"category";s:5:"minor";s:2:"15";}}}}s:12:"_multiwidget";i:1;}', 'yes'),
(857, 'bpfb_plugin', 'a:1:{s:9:"installed";i:1;}', 'yes'),
(930, 'wsl_components_users_enabled', '1', 'yes'),
(957, 'bp_disable_blogforum_comments', '1', 'yes'),
(1339, 'wsl_settings_Google_app_id', '', 'yes'),
(1340, 'wsl_settings_Google_app_secret', '', 'yes'),
(1341, 'wsl_settings_Moodle_app_id', '', 'yes'),
(1342, 'wsl_settings_Moodle_app_secret', '', 'yes'),
(1343, 'wsl_settings_Moodle_url', '', 'yes'),
(1408, 'gce_upgrade_has_run', '1', 'yes'),
(1461, 'widget_xtec_stats_widget', 'a:2:{i:1;a:0:{}s:12:"_multiwidget";i:1;}', 'yes'),
(1555, 'addtoany_options', 'a:33:{s:8:"position";s:6:"bottom";s:30:"display_in_posts_on_front_page";s:2:"-1";s:33:"display_in_posts_on_archive_pages";s:1:"1";s:19:"display_in_excerpts";s:2:"-1";s:16:"display_in_posts";s:1:"1";s:16:"display_in_pages";s:1:"1";s:15:"display_in_feed";s:2:"-1";s:10:"show_title";s:2:"-1";s:7:"onclick";s:2:"-1";s:9:"icon_size";s:2:"32";s:6:"button";s:10:"A2A_SVG_32";s:13:"button_custom";s:0:"";s:6:"header";s:0:"";s:23:"additional_js_variables";s:0:"";s:12:"custom_icons";s:2:"-1";s:16:"custom_icons_url";s:1:"/";s:17:"custom_icons_type";s:3:"png";s:10:"inline_css";s:1:"1";s:5:"cache";s:2:"-1";s:20:"display_in_cpt_forum";s:2:"-1";s:20:"display_in_cpt_topic";s:2:"-1";s:20:"display_in_cpt_reply";s:2:"-1";s:21:"display_in_cpt_bp_doc";s:2:"-1";s:23:"display_in_cpt_gce_feed";s:2:"-1";s:11:"button_text";s:10:"Comparteix";s:24:"special_facebook_options";a:1:{s:10:"show_count";s:2:"-1";}s:23:"special_twitter_options";a:1:{s:10:"show_count";s:2:"-1";}s:15:"active_services";a:3:{i:0;s:8:"facebook";i:1;s:7:"twitter";i:2;s:11:"google_plus";}s:29:"special_facebook_like_options";a:1:{s:4:"verb";s:4:"like";}s:29:"special_twitter_tweet_options";a:1:{s:10:"show_count";s:2:"-1";}s:30:"special_google_plusone_options";a:1:{s:10:"show_count";s:2:"-1";}s:33:"special_google_plus_share_options";a:1:{s:10:"show_count";s:2:"-1";}s:29:"special_pinterest_pin_options";a:1:{s:10:"show_count";s:2:"-1";}}', 'yes'),
(1562, 'nodesbox_name', 'Escola L&#039;Arany', 'yes'),
(1572, 'widget_a2a_follow_widget', 'a:2:{i:1;a:0:{}s:12:"_multiwidget";i:1;}', 'yes'),
(1573, 'widget_a2a_share_save_widget', 'a:2:{i:1;a:0:{}s:12:"_multiwidget";i:1;}', 'yes'),
(1627, 'common_css', '', 'yes'),
(1674, 'recaptcha_options', 'a:5:{s:8:"site_key";s:40:"6LcgQgsAAAAAAMZKqiYEDAhniHIY0hXC-MMVM6Rs";s:6:"secret";s:40:"6LcgQgsAAAAAAMAOLB0yfxPACo0e60sKD5ksV_hP";s:14:"comments_theme";s:8:"standard";s:18:"recaptcha_language";s:2:"ca";s:17:"no_response_error";s:58:"<strong>ERROR</strong>: Please fill in the reCAPTCHA form.";}', 'yes'),
(1732, 'category_children', 'a:2:{i:2;a:3:{i:0;i:3;i:1;i:8;i:2;i:9;}i:5;a:6:{i:0;i:10;i:1;i:11;i:2;i:12;i:3;i:13;i:4;i:14;i:5;i:15;}}', 'yes'),
(1735, 'bp_docs_associated_item_children', 'a:0:{}', 'yes'),
(1767, 'bp-disable-group-cover-image-uploads', '1', 'yes'),
(1768, 'bp-disable-cover-image-uploads', '1', 'yes'),
(1769, 'ga_analyticator_global_notification', '1', 'yes'),
(1771, 'xtec-stats-visits', '0', 'yes'),
(1772, 'xtec-stats-include-admin', 'on', 'yes'),
(1789, '_site_transient_timeout_browser_d948747e92bfb96c69b16a42c46527bd', '1456147929', 'yes'),
(1790, '_site_transient_browser_d948747e92bfb96c69b16a42c46527bd', 'a:9:{s:8:"platform";s:5:"Linux";s:4:"name";s:6:"Chrome";s:7:"version";s:12:"39.0.1132.47";s:10:"update_url";s:28:"http://www.google.com/chrome";s:7:"img_src";s:49:"http://s.wordpress.org/images/browsers/chrome.png";s:11:"img_src_ssl";s:48:"https://wordpress.org/images/browsers/chrome.png";s:15:"current_version";s:2:"18";s:7:"upgrade";b:0;s:8:"insecure";b:0;}', 'yes'),
(1811, '_site_transient_update_core', 'O:8:"stdClass":4:{s:7:"updates";a:4:{i:0;O:8:"stdClass":10:{s:8:"response";s:7:"upgrade";s:8:"download";s:62:"https://downloads.wordpress.org/release/ca/wordpress-4.4.2.zip";s:6:"locale";s:2:"ca";s:8:"packages";O:8:"stdClass":5:{s:4:"full";s:62:"https://downloads.wordpress.org/release/ca/wordpress-4.4.2.zip";s:10:"no_content";b:0;s:11:"new_bundled";b:0;s:7:"partial";b:0;s:8:"rollback";b:0;}s:7:"current";s:5:"4.4.2";s:7:"version";s:5:"4.4.2";s:11:"php_version";s:5:"5.2.4";s:13:"mysql_version";s:3:"5.0";s:11:"new_bundled";s:3:"4.4";s:15:"partial_version";s:0:"";}i:1;O:8:"stdClass":10:{s:8:"response";s:7:"upgrade";s:8:"download";s:59:"https://downloads.wordpress.org/release/wordpress-4.4.2.zip";s:6:"locale";s:5:"en_US";s:8:"packages";O:8:"stdClass":5:{s:4:"full";s:59:"https://downloads.wordpress.org/release/wordpress-4.4.2.zip";s:10:"no_content";s:70:"https://downloads.wordpress.org/release/wordpress-4.4.2-no-content.zip";s:11:"new_bundled";s:71:"https://downloads.wordpress.org/release/wordpress-4.4.2-new-bundled.zip";s:7:"partial";b:0;s:8:"rollback";b:0;}s:7:"current";s:5:"4.4.2";s:7:"version";s:5:"4.4.2";s:11:"php_version";s:5:"5.2.4";s:13:"mysql_version";s:3:"5.0";s:11:"new_bundled";s:3:"4.4";s:15:"partial_version";s:0:"";}i:2;O:8:"stdClass":11:{s:8:"response";s:10:"autoupdate";s:8:"download";s:59:"https://downloads.wordpress.org/release/wordpress-4.4.2.zip";s:6:"locale";s:5:"en_US";s:8:"packages";O:8:"stdClass":5:{s:4:"full";s:59:"https://downloads.wordpress.org/release/wordpress-4.4.2.zip";s:10:"no_content";s:70:"https://downloads.wordpress.org/release/wordpress-4.4.2-no-content.zip";s:11:"new_bundled";s:71:"https://downloads.wordpress.org/release/wordpress-4.4.2-new-bundled.zip";s:7:"partial";b:0;s:8:"rollback";b:0;}s:7:"current";s:5:"4.4.2";s:7:"version";s:5:"4.4.2";s:11:"php_version";s:5:"5.2.4";s:13:"mysql_version";s:3:"5.0";s:11:"new_bundled";s:3:"4.4";s:15:"partial_version";s:0:"";s:9:"new_files";s:1:"1";}i:3;O:8:"stdClass":11:{s:8:"response";s:10:"autoupdate";s:8:"download";s:59:"https://downloads.wordpress.org/release/wordpress-4.3.3.zip";s:6:"locale";s:5:"en_US";s:8:"packages";O:8:"stdClass":5:{s:4:"full";s:59:"https://downloads.wordpress.org/release/wordpress-4.3.3.zip";s:10:"no_content";s:70:"https://downloads.wordpress.org/release/wordpress-4.3.3-no-content.zip";s:11:"new_bundled";s:71:"https://downloads.wordpress.org/release/wordpress-4.3.3-new-bundled.zip";s:7:"partial";b:0;s:8:"rollback";b:0;}s:7:"current";s:5:"4.3.3";s:7:"version";s:5:"4.3.3";s:11:"php_version";s:5:"5.2.4";s:13:"mysql_version";s:3:"5.0";s:11:"new_bundled";s:3:"4.4";s:15:"partial_version";s:0:"";s:9:"new_files";s:1:"1";}}s:12:"last_checked";i:1459850092;s:15:"version_checked";s:5:"4.2.7";s:12:"translations";a:1:{i:0;a:7:{s:4:"type";s:4:"core";s:4:"slug";s:7:"default";s:8:"language";s:5:"es_ES";s:7:"version";s:5:"4.2.7";s:7:"updated";s:19:"2015-10-01 16:04:19";s:7:"package";s:64:"https://downloads.wordpress.org/translation/core/4.2.7/es_ES.zip";s:10:"autoupdate";b:1;}}}', 'yes'),
(1821, 'can_compress_scripts', '1', 'yes'),
(1822, '_transient_timeout_plugin_slugs', '1459936565', 'no'),
(1823, '_transient_plugin_slugs', 'a:33:{i:0;s:25:"add-to-any/add-to-any.php";i:1;s:19:"bbpress/bbpress.php";i:2;s:42:"bbpress-enable-tinymce-visual-tab/init.php";i:3;s:37:"blogger-importer/blogger-importer.php";i:4;s:24:"buddypress/bp-loader.php";i:5;s:33:"buddypress-activity-plus/bpfb.php";i:6;s:26:"buddypress-docs/loader.php";i:7;s:64:"buddypress-group-email-subscription/bp-activity-subscription.php";i:8;s:34:"buddypress-like/bp-like-loader.php";i:9;s:29:"bp-moderation/bpModLoader.php";i:10;s:39:"email-subscribers/email-subscribers.php";i:11;s:41:"enllacos-educatius/enllacos-educatius.php";i:12;s:43:"google-analyticator/google-analyticator.php";i:13;s:49:"google-calendar-events/google-calendar-events.php";i:14;s:27:"grup-classe/grup_classe.php";i:15;s:67:"import-users-from-csv-with-meta/import-users-from-csv-with-meta.php";i:16;s:39:"intranet-importer/intranet-importer.php";i:17;s:31:"invite-anyone/invite-anyone.php";i:18;s:69:"pending-submission-notifications/pending-submission-notifications.php";i:19;s:27:"private-bp-pages/loader.php";i:20;s:21:"raw-html/raw_html.php";i:21;s:25:"slideshare/slideshare.php";i:22;s:44:"slideshow-jquery-image-gallery/slideshow.php";i:23;s:27:"socialmedia/socialmedia.php";i:24;s:37:"tinymce-advanced/tinymce-advanced.php";i:25;s:71:"widget-visibility-without-jetpack/widget-visibility-without-jetpack.php";i:26;s:41:"wordpress-importer/wordpress-importer.php";i:27;s:41:"wordpress-php-info/wordpress-php-info.php";i:28;s:42:"wordpress-social-login/wp-social-login.php";i:29;s:29:"wp-recaptcha/wp-recaptcha.php";i:30;s:35:"xtec-ldap-login/xtec-ldap-login.php";i:31;s:23:"xtec-mail/xtec-mail.php";i:32;s:25:"xtec-stats/xtec-stats.php";}', 'no'),
(1829, '_site_transient_timeout_browser_b491c722b1d92b627dcec4ac38d05d0d', '1456959565', 'yes'),
(1830, '_site_transient_browser_b491c722b1d92b627dcec4ac38d05d0d', 'a:9:{s:8:"platform";s:5:"Linux";s:4:"name";s:7:"Firefox";s:7:"version";s:4:"44.0";s:10:"update_url";s:23:"http://www.firefox.com/";s:7:"img_src";s:50:"http://s.wordpress.org/images/browsers/firefox.png";s:11:"img_src_ssl";s:49:"https://wordpress.org/images/browsers/firefox.png";s:15:"current_version";s:2:"16";s:7:"upgrade";b:0;s:8:"insecure";b:0;}', 'yes'),
(1835, '_bbp_edit_lock', '30', 'yes'),
(1836, '_bbp_throttle_time', '10', 'yes'),
(1837, '_bbp_allow_anonymous', '0', 'yes'),
(1838, '_bbp_allow_global_access', '1', 'yes'),
(1839, '_bbp_default_role', 'bbp_participant', 'yes'),
(1840, '_bbp_allow_revisions', '1', 'yes'),
(1841, '_bbp_enable_favorites', '1', 'yes'),
(1842, '_bbp_enable_subscriptions', '1', 'yes'),
(1843, '_bbp_allow_topic_tags', '1', 'yes'),
(1844, '_bbp_allow_search', '1', 'yes'),
(1845, '_bbp_use_wp_editor', '1', 'yes'),
(1846, '_bbp_use_autoembed', '1', 'yes'),
(1847, '_bbp_thread_replies_depth', '3', 'yes'),
(1848, '_bbp_allow_threaded_replies', '1', 'yes'),
(1849, '_bbp_topics_per_page', '15', 'yes'),
(1850, '_bbp_replies_per_page', '15', 'yes'),
(1851, '_bbp_topics_per_rss_page', '25', 'yes'),
(1852, '_bbp_replies_per_rss_page', '25', 'yes'),
(1853, '_bbp_root_slug', 'forums', 'yes'),
(1854, '_bbp_include_root', '1', 'yes'),
(1855, '_bbp_show_on_root', 'forums', 'yes'),
(1856, '_bbp_forum_slug', 'forum', 'yes'),
(1857, '_bbp_topic_slug', 'topic', 'yes'),
(1858, '_bbp_topic_tag_slug', 'topic-tag', 'yes'),
(1859, '_bbp_view_slug', 'view', 'yes'),
(1860, '_bbp_reply_slug', 'reply', 'yes'),
(1861, '_bbp_search_slug', 'search', 'yes'),
(1862, '_bbp_user_slug', 'users', 'yes'),
(1863, '_bbp_topic_archive_slug', 'topics', 'yes'),
(1864, '_bbp_reply_archive_slug', 'replies', 'yes'),
(1865, '_bbp_user_favs_slug', 'favorites', 'yes'),
(1866, '_bbp_user_subs_slug', 'subscriptions', 'yes'),
(1867, '_bbp_enable_group_forums', '1', 'yes'),
(1868, '_bbp_group_forums_root_id', '0', 'yes'),
(1869, 'ja_bbpress_tinymce_full', '0', 'yes'),
(1870, 'ja_bbpress_tinymce_media', '1', 'yes'),
(1873, 'rewrite_rules', 'a:237:{s:14:"docs/create/?$";s:52:"index.php?post_type=bp_doc&name=$matches[1]&create=1";s:17:"docs/my-groups/?$";s:55:"index.php?post_type=bp_doc&name=$matches[1]&my-groups=1";s:20:"docs/([^/]+)/edit/?$";s:50:"index.php?post_type=bp_doc&name=$matches[1]&edit=1";s:23:"docs/([^/]+)/history/?$";s:53:"index.php?post_type=bp_doc&name=$matches[1]&history=1";s:22:"docs/([^/]+)/delete/?$";s:53:"index.php?post_type=bp_doc&name=$matches[1]&history=1";s:23:"docs/([^/]+)/untrash/?$";s:53:"index.php?post_type=bp_doc&name=$matches[1]&untrash=1";s:33:"docs/([^/]+)/unlink-from-group/?$";s:63:"index.php?post_type=bp_doc&name=$matches[1]&unlink-from-group=1";s:9:"forums/?$";s:25:"index.php?post_type=forum";s:39:"forums/feed/(feed|rdf|rss|rss2|atom)/?$";s:42:"index.php?post_type=forum&feed=$matches[1]";s:34:"forums/(feed|rdf|rss|rss2|atom)/?$";s:42:"index.php?post_type=forum&feed=$matches[1]";s:26:"forums/page/([0-9]{1,})/?$";s:43:"index.php?post_type=forum&paged=$matches[1]";s:9:"topics/?$";s:25:"index.php?post_type=topic";s:39:"topics/feed/(feed|rdf|rss|rss2|atom)/?$";s:42:"index.php?post_type=topic&feed=$matches[1]";s:34:"topics/(feed|rdf|rss|rss2|atom)/?$";s:42:"index.php?post_type=topic&feed=$matches[1]";s:26:"topics/page/([0-9]{1,})/?$";s:43:"index.php?post_type=topic&paged=$matches[1]";s:28:"forums/forum/([^/]+)/edit/?$";s:34:"index.php?forum=$matches[1]&edit=1";s:28:"forums/topic/([^/]+)/edit/?$";s:34:"index.php?topic=$matches[1]&edit=1";s:28:"forums/reply/([^/]+)/edit/?$";s:34:"index.php?reply=$matches[1]&edit=1";s:32:"forums/topic-tag/([^/]+)/edit/?$";s:38:"index.php?topic-tag=$matches[1]&edit=1";s:48:"forums/users/([^/]+)/topics/page/?([0-9]{1,})/?$";s:59:"index.php?bbp_user=$matches[1]&bbp_tops=1&paged=$matches[2]";s:49:"forums/users/([^/]+)/replies/page/?([0-9]{1,})/?$";s:59:"index.php?bbp_user=$matches[1]&bbp_reps=1&paged=$matches[2]";s:51:"forums/users/([^/]+)/favorites/page/?([0-9]{1,})/?$";s:59:"index.php?bbp_user=$matches[1]&bbp_favs=1&paged=$matches[2]";s:55:"forums/users/([^/]+)/subscriptions/page/?([0-9]{1,})/?$";s:59:"index.php?bbp_user=$matches[1]&bbp_subs=1&paged=$matches[2]";s:30:"forums/users/([^/]+)/topics/?$";s:41:"index.php?bbp_user=$matches[1]&bbp_tops=1";s:31:"forums/users/([^/]+)/replies/?$";s:41:"index.php?bbp_user=$matches[1]&bbp_reps=1";s:33:"forums/users/([^/]+)/favorites/?$";s:41:"index.php?bbp_user=$matches[1]&bbp_favs=1";s:37:"forums/users/([^/]+)/subscriptions/?$";s:41:"index.php?bbp_user=$matches[1]&bbp_subs=1";s:28:"forums/users/([^/]+)/edit/?$";s:37:"index.php?bbp_user=$matches[1]&edit=1";s:23:"forums/users/([^/]+)/?$";s:30:"index.php?bbp_user=$matches[1]";s:40:"forums/view/([^/]+)/page/?([0-9]{1,})/?$";s:48:"index.php?bbp_view=$matches[1]&paged=$matches[2]";s:27:"forums/view/([^/]+)/feed/?$";s:47:"index.php?bbp_view=$matches[1]&feed=$matches[2]";s:22:"forums/view/([^/]+)/?$";s:30:"index.php?bbp_view=$matches[1]";s:34:"forums/search/page/?([0-9]{1,})/?$";s:27:"index.php?paged=$matches[1]";s:16:"forums/search/?$";s:20:"index.php?bbp_search";s:7:"docs/?$";s:26:"index.php?post_type=bp_doc";s:37:"docs/feed/(feed|rdf|rss|rss2|atom)/?$";s:43:"index.php?post_type=bp_doc&feed=$matches[1]";s:32:"docs/(feed|rdf|rss|rss2|atom)/?$";s:43:"index.php?post_type=bp_doc&feed=$matches[1]";s:24:"docs/page/([0-9]{1,})/?$";s:44:"index.php?post_type=bp_doc&paged=$matches[1]";s:12:"slideshow/?$";s:29:"index.php?post_type=slideshow";s:42:"slideshow/feed/(feed|rdf|rss|rss2|atom)/?$";s:46:"index.php?post_type=slideshow&feed=$matches[1]";s:37:"slideshow/(feed|rdf|rss|rss2|atom)/?$";s:46:"index.php?post_type=slideshow&feed=$matches[1]";s:29:"slideshow/page/([0-9]{1,})/?$";s:47:"index.php?post_type=slideshow&paged=$matches[1]";s:48:"categoria/(.+?)/feed/(feed|rdf|rss|rss2|atom)/?$";s:52:"index.php?category_name=$matches[1]&feed=$matches[2]";s:43:"categoria/(.+?)/(feed|rdf|rss|rss2|atom)/?$";s:52:"index.php?category_name=$matches[1]&feed=$matches[2]";s:36:"categoria/(.+?)/page/?([0-9]{1,})/?$";s:53:"index.php?category_name=$matches[1]&paged=$matches[2]";s:18:"categoria/(.+?)/?$";s:35:"index.php?category_name=$matches[1]";s:44:"tag/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:42:"index.php?tag=$matches[1]&feed=$matches[2]";s:39:"tag/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:42:"index.php?tag=$matches[1]&feed=$matches[2]";s:32:"tag/([^/]+)/page/?([0-9]{1,})/?$";s:43:"index.php?tag=$matches[1]&paged=$matches[2]";s:14:"tag/([^/]+)/?$";s:25:"index.php?tag=$matches[1]";s:45:"type/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:50:"index.php?post_format=$matches[1]&feed=$matches[2]";s:40:"type/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:50:"index.php?post_format=$matches[1]&feed=$matches[2]";s:33:"type/([^/]+)/page/?([0-9]{1,})/?$";s:51:"index.php?post_format=$matches[1]&paged=$matches[2]";s:15:"type/([^/]+)/?$";s:33:"index.php?post_format=$matches[1]";s:38:"forums/forum/.+?/attachment/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:48:"forums/forum/.+?/attachment/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:68:"forums/forum/.+?/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:63:"forums/forum/.+?/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:63:"forums/forum/.+?/attachment/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:31:"forums/forum/(.+?)/trackback/?$";s:32:"index.php?forum=$matches[1]&tb=1";s:51:"forums/forum/(.+?)/feed/(feed|rdf|rss|rss2|atom)/?$";s:44:"index.php?forum=$matches[1]&feed=$matches[2]";s:46:"forums/forum/(.+?)/(feed|rdf|rss|rss2|atom)/?$";s:44:"index.php?forum=$matches[1]&feed=$matches[2]";s:39:"forums/forum/(.+?)/page/?([0-9]{1,})/?$";s:45:"index.php?forum=$matches[1]&paged=$matches[2]";s:46:"forums/forum/(.+?)/comment-page-([0-9]{1,})/?$";s:45:"index.php?forum=$matches[1]&cpage=$matches[2]";s:31:"forums/forum/(.+?)(/[0-9]+)?/?$";s:44:"index.php?forum=$matches[1]&page=$matches[2]";s:40:"forums/topic/[^/]+/attachment/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:50:"forums/topic/[^/]+/attachment/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:70:"forums/topic/[^/]+/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:65:"forums/topic/[^/]+/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:65:"forums/topic/[^/]+/attachment/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:33:"forums/topic/([^/]+)/trackback/?$";s:32:"index.php?topic=$matches[1]&tb=1";s:53:"forums/topic/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:44:"index.php?topic=$matches[1]&feed=$matches[2]";s:48:"forums/topic/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:44:"index.php?topic=$matches[1]&feed=$matches[2]";s:41:"forums/topic/([^/]+)/page/?([0-9]{1,})/?$";s:45:"index.php?topic=$matches[1]&paged=$matches[2]";s:48:"forums/topic/([^/]+)/comment-page-([0-9]{1,})/?$";s:45:"index.php?topic=$matches[1]&cpage=$matches[2]";s:33:"forums/topic/([^/]+)(/[0-9]+)?/?$";s:44:"index.php?topic=$matches[1]&page=$matches[2]";s:29:"forums/topic/[^/]+/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:39:"forums/topic/[^/]+/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:59:"forums/topic/[^/]+/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:54:"forums/topic/[^/]+/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:54:"forums/topic/[^/]+/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:40:"forums/reply/[^/]+/attachment/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:50:"forums/reply/[^/]+/attachment/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:70:"forums/reply/[^/]+/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:65:"forums/reply/[^/]+/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:65:"forums/reply/[^/]+/attachment/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:33:"forums/reply/([^/]+)/trackback/?$";s:32:"index.php?reply=$matches[1]&tb=1";s:41:"forums/reply/([^/]+)/page/?([0-9]{1,})/?$";s:45:"index.php?reply=$matches[1]&paged=$matches[2]";s:48:"forums/reply/([^/]+)/comment-page-([0-9]{1,})/?$";s:45:"index.php?reply=$matches[1]&cpage=$matches[2]";s:33:"forums/reply/([^/]+)(/[0-9]+)?/?$";s:44:"index.php?reply=$matches[1]&page=$matches[2]";s:29:"forums/reply/[^/]+/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:39:"forums/reply/[^/]+/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:59:"forums/reply/[^/]+/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:54:"forums/reply/[^/]+/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:54:"forums/reply/[^/]+/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:57:"forums/topic-tag/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:48:"index.php?topic-tag=$matches[1]&feed=$matches[2]";s:52:"forums/topic-tag/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:48:"index.php?topic-tag=$matches[1]&feed=$matches[2]";s:45:"forums/topic-tag/([^/]+)/page/?([0-9]{1,})/?$";s:49:"index.php?topic-tag=$matches[1]&paged=$matches[2]";s:27:"forums/topic-tag/([^/]+)/?$";s:31:"index.php?topic-tag=$matches[1]";s:42:"forums/search/([^/]+)/page/?([0-9]{1,})/?$";s:50:"index.php?bbp_search=$matches[1]&paged=$matches[2]";s:24:"forums/search/([^/]+)/?$";s:32:"index.php?bbp_search=$matches[1]";s:38:"ia_invites/[^/]+/attachment/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:48:"ia_invites/[^/]+/attachment/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:68:"ia_invites/[^/]+/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:63:"ia_invites/[^/]+/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:63:"ia_invites/[^/]+/attachment/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:31:"ia_invites/([^/]+)/trackback/?$";s:37:"index.php?ia_invites=$matches[1]&tb=1";s:39:"ia_invites/([^/]+)/page/?([0-9]{1,})/?$";s:50:"index.php?ia_invites=$matches[1]&paged=$matches[2]";s:46:"ia_invites/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?ia_invites=$matches[1]&cpage=$matches[2]";s:31:"ia_invites/([^/]+)(/[0-9]+)?/?$";s:49:"index.php?ia_invites=$matches[1]&page=$matches[2]";s:27:"ia_invites/[^/]+/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:37:"ia_invites/[^/]+/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:57:"ia_invites/[^/]+/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:52:"ia_invites/[^/]+/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:52:"ia_invites/[^/]+/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:52:"ia_invitees/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:50:"index.php?ia_invitees=$matches[1]&feed=$matches[2]";s:47:"ia_invitees/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:50:"index.php?ia_invitees=$matches[1]&feed=$matches[2]";s:40:"ia_invitees/([^/]+)/page/?([0-9]{1,})/?$";s:51:"index.php?ia_invitees=$matches[1]&paged=$matches[2]";s:22:"ia_invitees/([^/]+)/?$";s:33:"index.php?ia_invitees=$matches[1]";s:58:"ia_invited_groups/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:56:"index.php?ia_invited_groups=$matches[1]&feed=$matches[2]";s:53:"ia_invited_groups/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:56:"index.php?ia_invited_groups=$matches[1]&feed=$matches[2]";s:46:"ia_invited_groups/([^/]+)/page/?([0-9]{1,})/?$";s:57:"index.php?ia_invited_groups=$matches[1]&paged=$matches[2]";s:28:"ia_invited_groups/([^/]+)/?$";s:39:"index.php?ia_invited_groups=$matches[1]";s:55:"bp_member_type/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:53:"index.php?bp_member_type=$matches[1]&feed=$matches[2]";s:50:"bp_member_type/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:53:"index.php?bp_member_type=$matches[1]&feed=$matches[2]";s:43:"bp_member_type/([^/]+)/page/?([0-9]{1,})/?$";s:54:"index.php?bp_member_type=$matches[1]&paged=$matches[2]";s:25:"bp_member_type/([^/]+)/?$";s:36:"index.php?bp_member_type=$matches[1]";s:30:"docs/.+?/attachment/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:40:"docs/.+?/attachment/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:60:"docs/.+?/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:55:"docs/.+?/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:55:"docs/.+?/attachment/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:23:"docs/(.+?)/trackback/?$";s:33:"index.php?bp_doc=$matches[1]&tb=1";s:43:"docs/(.+?)/feed/(feed|rdf|rss|rss2|atom)/?$";s:45:"index.php?bp_doc=$matches[1]&feed=$matches[2]";s:38:"docs/(.+?)/(feed|rdf|rss|rss2|atom)/?$";s:45:"index.php?bp_doc=$matches[1]&feed=$matches[2]";s:31:"docs/(.+?)/page/?([0-9]{1,})/?$";s:46:"index.php?bp_doc=$matches[1]&paged=$matches[2]";s:38:"docs/(.+?)/comment-page-([0-9]{1,})/?$";s:46:"index.php?bp_doc=$matches[1]&cpage=$matches[2]";s:23:"docs/(.+?)(/[0-9]+)?/?$";s:45:"index.php?bp_doc=$matches[1]&page=$matches[2]";s:45:"item/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:50:"index.php?bp_docs_tag=$matches[1]&feed=$matches[2]";s:40:"item/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:50:"index.php?bp_docs_tag=$matches[1]&feed=$matches[2]";s:33:"item/([^/]+)/page/?([0-9]{1,})/?$";s:51:"index.php?bp_docs_tag=$matches[1]&paged=$matches[2]";s:15:"item/([^/]+)/?$";s:33:"index.php?bp_docs_tag=$matches[1]";s:55:"bp_docs_access/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:67:"index.php?taxonomy=bp_docs_access&term=$matches[1]&feed=$matches[2]";s:50:"bp_docs_access/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:67:"index.php?taxonomy=bp_docs_access&term=$matches[1]&feed=$matches[2]";s:43:"bp_docs_access/([^/]+)/page/?([0-9]{1,})/?$";s:68:"index.php?taxonomy=bp_docs_access&term=$matches[1]&paged=$matches[2]";s:25:"bp_docs_access/([^/]+)/?$";s:50:"index.php?taxonomy=bp_docs_access&term=$matches[1]";s:37:"slideshow/[^/]+/attachment/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:47:"slideshow/[^/]+/attachment/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:67:"slideshow/[^/]+/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:62:"slideshow/[^/]+/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:62:"slideshow/[^/]+/attachment/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:30:"slideshow/([^/]+)/trackback/?$";s:36:"index.php?slideshow=$matches[1]&tb=1";s:50:"slideshow/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:48:"index.php?slideshow=$matches[1]&feed=$matches[2]";s:45:"slideshow/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:48:"index.php?slideshow=$matches[1]&feed=$matches[2]";s:38:"slideshow/([^/]+)/page/?([0-9]{1,})/?$";s:49:"index.php?slideshow=$matches[1]&paged=$matches[2]";s:45:"slideshow/([^/]+)/comment-page-([0-9]{1,})/?$";s:49:"index.php?slideshow=$matches[1]&cpage=$matches[2]";s:30:"slideshow/([^/]+)(/[0-9]+)?/?$";s:48:"index.php?slideshow=$matches[1]&page=$matches[2]";s:26:"slideshow/[^/]+/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:36:"slideshow/[^/]+/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:56:"slideshow/[^/]+/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:51:"slideshow/[^/]+/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:51:"slideshow/[^/]+/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:36:"gce_feed/[^/]+/attachment/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:46:"gce_feed/[^/]+/attachment/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:66:"gce_feed/[^/]+/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:61:"gce_feed/[^/]+/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:61:"gce_feed/[^/]+/attachment/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:29:"gce_feed/([^/]+)/trackback/?$";s:35:"index.php?gce_feed=$matches[1]&tb=1";s:37:"gce_feed/([^/]+)/page/?([0-9]{1,})/?$";s:48:"index.php?gce_feed=$matches[1]&paged=$matches[2]";s:44:"gce_feed/([^/]+)/comment-page-([0-9]{1,})/?$";s:48:"index.php?gce_feed=$matches[1]&cpage=$matches[2]";s:29:"gce_feed/([^/]+)(/[0-9]+)?/?$";s:47:"index.php?gce_feed=$matches[1]&page=$matches[2]";s:25:"gce_feed/[^/]+/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:35:"gce_feed/[^/]+/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:55:"gce_feed/[^/]+/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:50:"gce_feed/[^/]+/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:50:"gce_feed/[^/]+/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:48:".*wp-(atom|rdf|rss|rss2|feed|commentsrss2)\\.php$";s:18:"index.php?feed=old";s:20:".*wp-app\\.php(/.*)?$";s:19:"index.php?error=403";s:18:".*wp-register.php$";s:23:"index.php?register=true";s:32:"feed/(feed|rdf|rss|rss2|atom)/?$";s:27:"index.php?&feed=$matches[1]";s:27:"(feed|rdf|rss|rss2|atom)/?$";s:27:"index.php?&feed=$matches[1]";s:20:"page/?([0-9]{1,})/?$";s:28:"index.php?&paged=$matches[1]";s:27:"comment-page-([0-9]{1,})/?$";s:38:"index.php?&page_id=9&cpage=$matches[1]";s:41:"comments/feed/(feed|rdf|rss|rss2|atom)/?$";s:42:"index.php?&feed=$matches[1]&withcomments=1";s:36:"comments/(feed|rdf|rss|rss2|atom)/?$";s:42:"index.php?&feed=$matches[1]&withcomments=1";s:44:"search/(.+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:40:"index.php?s=$matches[1]&feed=$matches[2]";s:39:"search/(.+)/(feed|rdf|rss|rss2|atom)/?$";s:40:"index.php?s=$matches[1]&feed=$matches[2]";s:32:"search/(.+)/page/?([0-9]{1,})/?$";s:41:"index.php?s=$matches[1]&paged=$matches[2]";s:14:"search/(.+)/?$";s:23:"index.php?s=$matches[1]";s:47:"author/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:50:"index.php?author_name=$matches[1]&feed=$matches[2]";s:42:"author/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:50:"index.php?author_name=$matches[1]&feed=$matches[2]";s:35:"author/([^/]+)/page/?([0-9]{1,})/?$";s:51:"index.php?author_name=$matches[1]&paged=$matches[2]";s:17:"author/([^/]+)/?$";s:33:"index.php?author_name=$matches[1]";s:69:"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/feed/(feed|rdf|rss|rss2|atom)/?$";s:80:"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&feed=$matches[4]";s:64:"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/(feed|rdf|rss|rss2|atom)/?$";s:80:"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&feed=$matches[4]";s:57:"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/page/?([0-9]{1,})/?$";s:81:"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&paged=$matches[4]";s:39:"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/?$";s:63:"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]";s:56:"([0-9]{4})/([0-9]{1,2})/feed/(feed|rdf|rss|rss2|atom)/?$";s:64:"index.php?year=$matches[1]&monthnum=$matches[2]&feed=$matches[3]";s:51:"([0-9]{4})/([0-9]{1,2})/(feed|rdf|rss|rss2|atom)/?$";s:64:"index.php?year=$matches[1]&monthnum=$matches[2]&feed=$matches[3]";s:44:"([0-9]{4})/([0-9]{1,2})/page/?([0-9]{1,})/?$";s:65:"index.php?year=$matches[1]&monthnum=$matches[2]&paged=$matches[3]";s:26:"([0-9]{4})/([0-9]{1,2})/?$";s:47:"index.php?year=$matches[1]&monthnum=$matches[2]";s:43:"([0-9]{4})/feed/(feed|rdf|rss|rss2|atom)/?$";s:43:"index.php?year=$matches[1]&feed=$matches[2]";s:38:"([0-9]{4})/(feed|rdf|rss|rss2|atom)/?$";s:43:"index.php?year=$matches[1]&feed=$matches[2]";s:31:"([0-9]{4})/page/?([0-9]{1,})/?$";s:44:"index.php?year=$matches[1]&paged=$matches[2]";s:13:"([0-9]{4})/?$";s:26:"index.php?year=$matches[1]";s:27:".?.+?/attachment/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:37:".?.+?/attachment/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:57:".?.+?/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:52:".?.+?/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:52:".?.+?/attachment/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:20:"(.?.+?)/trackback/?$";s:35:"index.php?pagename=$matches[1]&tb=1";s:40:"(.?.+?)/feed/(feed|rdf|rss|rss2|atom)/?$";s:47:"index.php?pagename=$matches[1]&feed=$matches[2]";s:35:"(.?.+?)/(feed|rdf|rss|rss2|atom)/?$";s:47:"index.php?pagename=$matches[1]&feed=$matches[2]";s:28:"(.?.+?)/page/?([0-9]{1,})/?$";s:48:"index.php?pagename=$matches[1]&paged=$matches[2]";s:35:"(.?.+?)/comment-page-([0-9]{1,})/?$";s:48:"index.php?pagename=$matches[1]&cpage=$matches[2]";s:20:"(.?.+?)(/[0-9]+)?/?$";s:47:"index.php?pagename=$matches[1]&page=$matches[2]";s:31:".+?/[^/]+/attachment/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:41:".+?/[^/]+/attachment/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:61:".+?/[^/]+/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:56:".+?/[^/]+/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:56:".+?/[^/]+/attachment/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:26:"(.+?)/([^/]+)/trackback/?$";s:57:"index.php?category_name=$matches[1]&name=$matches[2]&tb=1";s:46:"(.+?)/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:69:"index.php?category_name=$matches[1]&name=$matches[2]&feed=$matches[3]";s:41:"(.+?)/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:69:"index.php?category_name=$matches[1]&name=$matches[2]&feed=$matches[3]";s:34:"(.+?)/([^/]+)/page/?([0-9]{1,})/?$";s:70:"index.php?category_name=$matches[1]&name=$matches[2]&paged=$matches[3]";s:41:"(.+?)/([^/]+)/comment-page-([0-9]{1,})/?$";s:70:"index.php?category_name=$matches[1]&name=$matches[2]&cpage=$matches[3]";s:26:"(.+?)/([^/]+)(/[0-9]+)?/?$";s:69:"index.php?category_name=$matches[1]&name=$matches[2]&page=$matches[3]";s:20:".+?/[^/]+/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:30:".+?/[^/]+/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:50:".+?/[^/]+/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:45:".+?/[^/]+/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:45:".+?/[^/]+/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:38:"(.+?)/feed/(feed|rdf|rss|rss2|atom)/?$";s:52:"index.php?category_name=$matches[1]&feed=$matches[2]";s:33:"(.+?)/(feed|rdf|rss|rss2|atom)/?$";s:52:"index.php?category_name=$matches[1]&feed=$matches[2]";s:26:"(.+?)/page/?([0-9]{1,})/?$";s:53:"index.php?category_name=$matches[1]&paged=$matches[2]";s:33:"(.+?)/comment-page-([0-9]{1,})/?$";s:53:"index.php?category_name=$matches[1]&cpage=$matches[2]";s:8:"(.+?)/?$";s:35:"index.php?category_name=$matches[1]";}', 'yes'),
(2064, '_site_transient_timeout_browser_ba66035174a362f0da1cefa47695b0dd', '1459856343', 'yes'),
(2065, '_site_transient_browser_ba66035174a362f0da1cefa47695b0dd', 'a:9:{s:8:"platform";s:5:"Linux";s:4:"name";s:7:"Firefox";s:7:"version";s:4:"45.0";s:10:"update_url";s:23:"http://www.firefox.com/";s:7:"img_src";s:50:"http://s.wordpress.org/images/browsers/firefox.png";s:11:"img_src_ssl";s:49:"https://wordpress.org/images/browsers/firefox.png";s:15:"current_version";s:2:"16";s:7:"upgrade";b:0;s:8:"insecure";b:0;}', 'yes'),
(2178, '_transient_timeout_gce_feed_145', '1459850392', 'no'),
(2179, '_transient_gce_feed_145', 'a:0:{}', 'no'),
(2180, '_site_transient_timeout_theme_roots', '1459851893', 'yes'),
(2181, '_site_transient_theme_roots', 'a:3:{s:18:"reactor-primaria-1";s:7:"/themes";s:25:"reactor-serveis-educatius";s:7:"/themes";s:7:"reactor";s:7:"/themes";}', 'yes'),
(2182, '_transient_timeout_feed_399a5712149df56f3495904f4224b5e2', '1459893344', 'no');
INSERT INTO `wp_options` (`option_id`, `option_name`, `option_value`, `autoload`) VALUES
(2183, '_transient_feed_399a5712149df56f3495904f4224b5e2', 'a:4:{s:5:"child";a:1:{s:0:"";a:1:{s:3:"rss";a:1:{i:0;a:6:{s:4:"data";s:3:"\n\n\n";s:7:"attribs";a:1:{s:0:"";a:1:{s:7:"version";s:3:"2.0";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:1:{s:0:"";a:1:{s:7:"channel";a:1:{i:0;a:6:{s:4:"data";s:49:"\n	\n	\n	\n	\n	\n	\n	\n	\n	\n	\n		\n		\n		\n		\n		\n		\n		\n		\n		\n	";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:3:{s:0:"";a:6:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:16:"NODES » Portada";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:27:"http://agora.xtec.cat/nodes";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:26:"Una web per \nal teu centre";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:13:"lastBuildDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Sat, 26 Mar 2016 10:27:02 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:8:"language";a:1:{i:0;a:5:{s:4:"data";s:2:"ca";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"item";a:10:{i:0;a:6:{s:4:"data";s:42:"\n		\n		\n		\n		\n		\n				\n\n		\n		\n				\n			\n		\n		";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:5:{s:0:"";a:7:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:22:"Mostra de nodes actius";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:59:"http://agora.xtec.cat/nodes/portada/mostra-de-nodes-actius/";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:8:"comments";a:1:{i:0;a:5:{s:4:"data";s:68:"http://agora.xtec.cat/nodes/portada/mostra-de-nodes-actius/#comments";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Tue, 31 Mar 2015 19:25:50 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:8:"category";a:1:{i:0;a:5:{s:4:"data";s:7:"Portada";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:35:"http://agora.xtec.cat/nodes/?p=1191";s:7:"attribs";a:1:{s:0:"";a:1:{s:11:"isPermaLink";s:5:"false";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:1345:"\r\n	\r\n\r\n					\r\n		\r\n		\r\n\r\n			\r\n				\r\n					<a href="http://agora.xtec.cat/escolarambletadelclot/" target="_blank" >						\r\n					</a>					\r\n						<a href="http://agora.xtec.cat/escolarambletadelclot/" target="_blank" >Escola Rambleta del Clot (Barcelona)</a>											\r\n				\r\n\r\n						\r\n				\r\n					<a href="http://agora.xtec.cat/ieslasedeta/" target="_blank" >						\r\n					</a>					\r\n						<a href="http://agora.xtec.cat/ieslasedeta/" target="_blank" >Institut La sedeta (Barcelona)</a>											\r\n				\r\n\r\n						\r\n				\r\n					<a href="http://agora.xtec.cat/ceipalbirka/" target="_self" >						\r\n					</a>					\r\n						<a href="http://agora.xtec.cat/ceipalbirka/" target="_self" >Escola Albirka (Arbeca)</a>											\r\n				\r\n\r\n						\r\n				\r\n					<a href="http://agora.xtec.cat/ceipprovencals/" target="_blank" >						\r\n					</a>					\r\n						<a href="http://agora.xtec.cat/ceipprovencals/" target="_blank" >Escola Provençals (Barcelona)</a>											\r\n				\r\n\r\n						\r\n				\r\n					<a href="http://agora.xtec.cat/escjoanmaragall/" target="_blank" >						\r\n					</a>					\r\n						<a href="http://agora.xtec.cat/escjoanmaragall/" target="_blank" >Escola Joan Maragall (Lleida)</a>											\r\n				\r\n\r\n						\r\n				\r\n					<a&#8230;  <a href="http://agora.xtec.cat/nodes/portada/mostra-de-nodes-actius/" title="Read Mostra de nodes actius">Llegeix més»</a>";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:9:"xtecadmin";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:40:"http://purl.org/rss/1.0/modules/content/";a:1:{s:7:"encoded";a:1:{i:0;a:5:{s:4:"data";s:22525:"\r\n	<div class="slideshow_container slideshow_container_style-light" style=" " data-slideshow-id="1193" data-style-name="style-light" data-style-version="2.3.1" >\r\n\r\n					<div class="slideshow_loading_icon"></div>\r\n		\r\n		<div class="slideshow_content" style="display: none;">\r\n\r\n			<div class="slideshow_view">\r\n				<div class="slideshow_slide slideshow_slide_image">\r\n					<a href="http://agora.xtec.cat/escolarambletadelclot/" target="_blank" >						<img src="http://agora.xtec.cat/nodes/wp-content/uploads/usu135/2015/02/Selecció_971.png" alt="Escola Rambleta del Clot (Barcelona)" width="1263" height="912" />\r\n					</a>					<div class="slideshow_description_box slideshow_transparent">\r\n						<div class="slideshow_title"><a href="http://agora.xtec.cat/escolarambletadelclot/" target="_blank" >Escola Rambleta del Clot (Barcelona)</a></div>											</div>\r\n				</div>\r\n\r\n						<div style="clear: both;"></div></div><div class="slideshow_view">\r\n				<div class="slideshow_slide slideshow_slide_image">\r\n					<a href="http://agora.xtec.cat/ieslasedeta/" target="_blank" >						<img src="http://agora.xtec.cat/nodes/wp-content/uploads/usu135/2015/10/Selecció_999427.png" alt="Institut La sedeta (Barcelona)" width="1250" height="890" />\r\n					</a>					<div class="slideshow_description_box slideshow_transparent">\r\n						<div class="slideshow_title"><a href="http://agora.xtec.cat/ieslasedeta/" target="_blank" >Institut La sedeta (Barcelona)</a></div>											</div>\r\n				</div>\r\n\r\n						<div style="clear: both;"></div></div><div class="slideshow_view">\r\n				<div class="slideshow_slide slideshow_slide_image">\r\n					<a href="http://agora.xtec.cat/ceipalbirka/" target="_self" >						<img src="http://agora.xtec.cat/nodes/wp-content/uploads/usu135/2015/10/Selecció_999429.png" alt="Escola Albirka (Arbeca)" width="1251" height="889" />\r\n					</a>					<div class="slideshow_description_box slideshow_transparent">\r\n						<div class="slideshow_title"><a href="http://agora.xtec.cat/ceipalbirka/" target="_self" >Escola Albirka (Arbeca)</a></div>											</div>\r\n				</div>\r\n\r\n						<div style="clear: both;"></div></div><div class="slideshow_view">\r\n				<div class="slideshow_slide slideshow_slide_image">\r\n					<a href="http://agora.xtec.cat/ceipprovencals/" target="_blank" >						<img src="http://agora.xtec.cat/nodes/wp-content/uploads/usu135/2015/10/Selecció_999415.png" alt="Escola Provençals (Barcelona)" width="1251" height="892" />\r\n					</a>					<div class="slideshow_description_box slideshow_transparent">\r\n						<div class="slideshow_title"><a href="http://agora.xtec.cat/ceipprovencals/" target="_blank" >Escola Provençals (Barcelona)</a></div>											</div>\r\n				</div>\r\n\r\n						<div style="clear: both;"></div></div><div class="slideshow_view">\r\n				<div class="slideshow_slide slideshow_slide_image">\r\n					<a href="http://agora.xtec.cat/escjoanmaragall/" target="_blank" >						<img src="http://agora.xtec.cat/nodes/wp-content/uploads/usu135/2015/04/Selecció_999108.png" alt="Escola Joan Maragall (Lleida)" width="1265" height="913" />\r\n					</a>					<div class="slideshow_description_box slideshow_transparent">\r\n						<div class="slideshow_title"><a href="http://agora.xtec.cat/escjoanmaragall/" target="_blank" >Escola Joan Maragall (Lleida)</a></div>											</div>\r\n				</div>\r\n\r\n						<div style="clear: both;"></div></div><div class="slideshow_view">\r\n				<div class="slideshow_slide slideshow_slide_image">\r\n					<a href="http://agora.xtec.cat/ceipcastelldecalafell/" target="_blank" >						<img src="http://agora.xtec.cat/nodes/wp-content/uploads/usu135/2015/10/Selecció_999428.png" alt="Escola Castell de Calafell (Calafell)" width="1251" height="890" />\r\n					</a>					<div class="slideshow_description_box slideshow_transparent">\r\n						<div class="slideshow_title"><a href="http://agora.xtec.cat/ceipcastelldecalafell/" target="_blank" >Escola Castell de Calafell (Calafell)</a></div>											</div>\r\n				</div>\r\n\r\n						<div style="clear: both;"></div></div><div class="slideshow_view">\r\n				<div class="slideshow_slide slideshow_slide_image">\r\n					<a href="http://agora.xtec.cat/insjoandaustria/" target="_self" >						<img src="http://agora.xtec.cat/nodes/wp-content/uploads/usu135/2015/11/Selecció_999073.png" alt="Institut Joan d''Àustria (Barcelona)" width="1253" height="920" />\r\n					</a>					<div class="slideshow_description_box slideshow_transparent">\r\n						<div class="slideshow_title"><a href="http://agora.xtec.cat/insjoandaustria/" target="_self" >Institut Joan d''Àustria (Barcelona)</a></div>											</div>\r\n				</div>\r\n\r\n						<div style="clear: both;"></div></div><div class="slideshow_view">\r\n				<div class="slideshow_slide slideshow_slide_image">\r\n					<a href="http://agora.xtec.cat/iesm-jmzafra/" target="_self" >						<img src="http://agora.xtec.cat/nodes/wp-content/uploads/usu135/2015/10/Selecció_999404.png" alt="Institut Juan Manuel Zafra (Barcelona)" width="1261" height="909" />\r\n					</a>					<div class="slideshow_description_box slideshow_transparent">\r\n						<div class="slideshow_title"><a href="http://agora.xtec.cat/iesm-jmzafra/" target="_self" >Institut Juan Manuel Zafra (Barcelona)</a></div>											</div>\r\n				</div>\r\n\r\n						<div style="clear: both;"></div></div><div class="slideshow_view">\r\n				<div class="slideshow_slide slideshow_slide_image">\r\n					<a href="http://agora.xtec.cat/iesreguissol/" target="_blank" >						<img src="http://agora.xtec.cat/nodes/wp-content/uploads/usu135/2015/10/Selecció_999397.png" alt="Institut Reguissol (Sta.Maria de Palau Tordera)" width="1262" height="911" />\r\n					</a>					<div class="slideshow_description_box slideshow_transparent">\r\n						<div class="slideshow_title"><a href="http://agora.xtec.cat/iesreguissol/" target="_blank" >Institut Reguissol (Sta.Maria de Palau Tordera)</a></div>											</div>\r\n				</div>\r\n\r\n						<div style="clear: both;"></div></div><div class="slideshow_view">\r\n				<div class="slideshow_slide slideshow_slide_image">\r\n					<a href="http://agora.xtec.cat/sinriells/" target="_blank" >						<img src="http://agora.xtec.cat/nodes/wp-content/uploads/usu135/2015/10/Selecció_999433.png" alt="El Bruc (Riells i Viabrea)" width="1258" height="893" />\r\n					</a>					<div class="slideshow_description_box slideshow_transparent">\r\n						<div class="slideshow_title"><a href="http://agora.xtec.cat/sinriells/" target="_blank" >El Bruc (Riells i Viabrea)</a></div>											</div>\r\n				</div>\r\n\r\n						<div style="clear: both;"></div></div><div class="slideshow_view">\r\n				<div class="slideshow_slide slideshow_slide_image">\r\n					<a href="http://agora.xtec.cat/ceipsantjordi-massanet/" target="_blank" >						<img src="http://agora.xtec.cat/nodes/wp-content/uploads/usu135/2015/10/Selecció_999424.png" alt="Escola Sant Jordi (Maçanet de la Selva)" width="1250" height="893" />\r\n					</a>					<div class="slideshow_description_box slideshow_transparent">\r\n						<div class="slideshow_title"><a href="http://agora.xtec.cat/ceipsantjordi-massanet/" target="_blank" >Escola Sant Jordi (Maçanet de la Selva)</a></div>											</div>\r\n				</div>\r\n\r\n						<div style="clear: both;"></div></div><div class="slideshow_view">\r\n				<div class="slideshow_slide slideshow_slide_image">\r\n					<a href="http://agora.xtec.cat/escolalafont/" target="_blank" >						<img src="http://agora.xtec.cat/nodes/wp-content/uploads/usu135/2015/10/Selecció_999412.png" alt="Escola La Font (Manresa)" width="1261" height="908" />\r\n					</a>					<div class="slideshow_description_box slideshow_transparent">\r\n						<div class="slideshow_title"><a href="http://agora.xtec.cat/escolalafont/" target="_blank" >Escola La Font (Manresa)</a></div>											</div>\r\n				</div>\r\n\r\n						<div style="clear: both;"></div></div><div class="slideshow_view">\r\n				<div class="slideshow_slide slideshow_slide_image">\r\n					<a href="http://agora.xtec.cat/escolacharlesdarwin/" target="_blank" >						<img src="http://agora.xtec.cat/nodes/wp-content/uploads/usu135/2015/04/Selecció_999111.png" alt="Escola Charles Darwin (El Prat de Llobregat)" width="1263" height="908" />\r\n					</a>					<div class="slideshow_description_box slideshow_transparent">\r\n						<div class="slideshow_title"><a href="http://agora.xtec.cat/escolacharlesdarwin/" target="_blank" >Escola Charles Darwin (El Prat de Llobregat)</a></div>											</div>\r\n				</div>\r\n\r\n						<div style="clear: both;"></div></div><div class="slideshow_view">\r\n				<div class="slideshow_slide slideshow_slide_image">\r\n					<a href="https://agora.xtec.cat/insllicamunt2/" target="_self" >						<img src="http://agora.xtec.cat/nodes/wp-content/uploads/usu135/2015/10/Selecció_999423.png" alt="El far d''Hipàtia (Lliçà d''Amunt)" width="1252" height="890" />\r\n					</a>					<div class="slideshow_description_box slideshow_transparent">\r\n						<div class="slideshow_title"><a href="https://agora.xtec.cat/insllicamunt2/" target="_self" >El far d''Hipàtia (Lliçà d''Amunt)</a></div>											</div>\r\n				</div>\r\n\r\n						<div style="clear: both;"></div></div><div class="slideshow_view">\r\n				<div class="slideshow_slide slideshow_slide_image">\r\n					<a href="http://agora.xtec.cat/escolaforndanells/" target="_blank" >						<img src="http://agora.xtec.cat/nodes/wp-content/uploads/usu135/2015/04/Selecció_999110.png" alt="Escola Forn d''Anells (Fornells de la Selva)" width="1265" height="915" />\r\n					</a>					<div class="slideshow_description_box slideshow_transparent">\r\n						<div class="slideshow_title"><a href="http://agora.xtec.cat/escolaforndanells/" target="_blank" >Escola Forn d''Anells (Fornells de la Selva)</a></div>											</div>\r\n				</div>\r\n\r\n						<div style="clear: both;"></div></div><div class="slideshow_view">\r\n				<div class="slideshow_slide slideshow_slide_image">\r\n					<a href="http://agora.xtec.cat/escolapablopicasso/" target="_blank" >						<img src="http://agora.xtec.cat/nodes/wp-content/uploads/usu135/2015/04/Selecció_999093.png" alt="Escola Pablo Picasso (Barberà del Vallès)" width="1259" height="914" />\r\n					</a>					<div class="slideshow_description_box slideshow_transparent">\r\n						<div class="slideshow_title"><a href="http://agora.xtec.cat/escolapablopicasso/" target="_blank" >Escola Pablo Picasso (Barberà del Vallès)</a></div>											</div>\r\n				</div>\r\n\r\n						<div style="clear: both;"></div></div><div class="slideshow_view">\r\n				<div class="slideshow_slide slideshow_slide_image">\r\n					<a href="http://agora.xtec.cat/escolajmciurana" target="_blank" >						<img src="http://agora.xtec.cat/nodes/wp-content/uploads/usu135/2015/11/Selecció_999069.png" alt="Escola Josep Maria Ciurana (Sant Boi de Ll.)" width="1253" height="917" />\r\n					</a>					<div class="slideshow_description_box slideshow_transparent">\r\n						<div class="slideshow_title"><a href="http://agora.xtec.cat/escolajmciurana" target="_blank" >Escola Josep Maria Ciurana (Sant Boi de Ll.)</a></div>											</div>\r\n				</div>\r\n\r\n						<div style="clear: both;"></div></div><div class="slideshow_view">\r\n				<div class="slideshow_slide slideshow_slide_image">\r\n					<a href="http://agora.xtec.cat/inssobreques/" target="_blank" >						<img src="http://agora.xtec.cat/nodes/wp-content/uploads/usu135/2015/03/Selecció_999038.png" alt="Institut Santiago Sobrequés i Vidal (Girona)" width="1251" height="890" />\r\n					</a>					<div class="slideshow_description_box slideshow_transparent">\r\n						<div class="slideshow_title"><a href="http://agora.xtec.cat/inssobreques/" target="_blank" >Institut Santiago Sobrequés i Vidal (Girona)</a></div>											</div>\r\n				</div>\r\n\r\n						<div style="clear: both;"></div></div><div class="slideshow_view">\r\n				<div class="slideshow_slide slideshow_slide_image">\r\n					<a href="http://agora.xtec.cat/iesmolidelavila/" target="_blank" >						<img src="http://agora.xtec.cat/nodes/wp-content/uploads/usu135/2015/11/Selecció_999070.png" alt="Institut Molí de la Vila (Capellades)" width="1254" height="920" />\r\n					</a>					<div class="slideshow_description_box slideshow_transparent">\r\n						<div class="slideshow_title"><a href="http://agora.xtec.cat/iesmolidelavila/" target="_blank" >Institut Molí de la Vila (Capellades)</a></div>											</div>\r\n				</div>\r\n\r\n						<div style="clear: both;"></div></div><div class="slideshow_view">\r\n				<div class="slideshow_slide slideshow_slide_image">\r\n					<a href="http://agora.xtec.cat/ceip-lesroquesblaves/" target="_self" >						<img src="http://agora.xtec.cat/nodes/wp-content/uploads/usu135/2015/04/Selecció_999113.png" alt="Escola Les Roques blanques (Esparraguera)" width="1263" height="908" />\r\n					</a>					<div class="slideshow_description_box slideshow_transparent">\r\n						<div class="slideshow_title"><a href="http://agora.xtec.cat/ceip-lesroquesblaves/" target="_self" >Escola Les Roques blanques (Esparraguera)</a></div>											</div>\r\n				</div>\r\n\r\n						<div style="clear: both;"></div></div><div class="slideshow_view">\r\n				<div class="slideshow_slide slideshow_slide_image">\r\n					<a href="http://agora.xtec.cat/ies-brugulat/" target="_self" >						<img src="http://agora.xtec.cat/nodes/wp-content/uploads/usu135/2015/10/Selecció_999434.png" alt="Institut Josep Brugulat (Banyoles)" width="1254" height="894" />\r\n					</a>					<div class="slideshow_description_box slideshow_transparent">\r\n						<div class="slideshow_title"><a href="http://agora.xtec.cat/ies-brugulat/" target="_self" >Institut Josep Brugulat (Banyoles)</a></div>											</div>\r\n				</div>\r\n\r\n						<div style="clear: both;"></div></div><div class="slideshow_view">\r\n				<div class="slideshow_slide slideshow_slide_image">\r\n					<a href="http://agora.xtec.cat/sesserradenoet/" target="_blank" >						<img src="http://agora.xtec.cat/nodes/wp-content/uploads/usu135/2015/01/serranoet.png" alt="SI Serra de Noet (Berga)" width="1011" height="777" />\r\n					</a>					<div class="slideshow_description_box slideshow_transparent">\r\n						<div class="slideshow_title"><a href="http://agora.xtec.cat/sesserradenoet/" target="_blank" >SI Serra de Noet (Berga)</a></div>											</div>\r\n				</div>\r\n\r\n						<div style="clear: both;"></div></div><div class="slideshow_view">\r\n				<div class="slideshow_slide slideshow_slide_image">\r\n					<a href="http://agora.xtec.cat/ieaoriolmartorell/" target="_blank" >						<img src="http://agora.xtec.cat/nodes/wp-content/uploads/usu135/2015/03/Selecció_999030.png" alt="IEA Oriol Martorell (Barcelona)" width="1251" height="892" />\r\n					</a>					<div class="slideshow_description_box slideshow_transparent">\r\n						<div class="slideshow_title"><a href="http://agora.xtec.cat/ieaoriolmartorell/" target="_blank" >IEA Oriol Martorell (Barcelona)</a></div>											</div>\r\n				</div>\r\n\r\n						<div style="clear: both;"></div></div><div class="slideshow_view">\r\n				<div class="slideshow_slide slideshow_slide_image">\r\n					<a href="http://agora.xtec.cat/insnoudegirona/" target="_self" >						<img src="http://agora.xtec.cat/nodes/wp-content/uploads/usu135/2015/01/nougirona.png" alt="Institut Nou de Girona (Girona)" width="1011" height="777" />\r\n					</a>					<div class="slideshow_description_box slideshow_transparent">\r\n						<div class="slideshow_title"><a href="http://agora.xtec.cat/insnoudegirona/" target="_self" >Institut Nou de Girona (Girona)</a></div>											</div>\r\n				</div>\r\n\r\n						<div style="clear: both;"></div></div><div class="slideshow_view">\r\n				<div class="slideshow_slide slideshow_slide_image">\r\n					<a href="http://agora.xtec.cat/ceip-batea/" target="_blank" >						<img src="http://agora.xtec.cat/nodes/wp-content/uploads/usu135/2015/01/batea.png" alt="Institut-Escola Mare de Déu del Portal (Batea)" width="1009" height="776" />\r\n					</a>					<div class="slideshow_description_box slideshow_transparent">\r\n						<div class="slideshow_title"><a href="http://agora.xtec.cat/ceip-batea/" target="_blank" >Institut-Escola Mare de Déu del Portal (Batea)</a></div>											</div>\r\n				</div>\r\n\r\n						<div style="clear: both;"></div></div><div class="slideshow_view">\r\n				<div class="slideshow_slide slideshow_slide_image">\r\n					<a href="http://agora.xtec.cat/inssantandreu/" target="_self" >						<img src="http://agora.xtec.cat/nodes/wp-content/uploads/usu135/2015/01/santandreu.png" alt="Institut Sant Andreu (Sant Andreu de la Barca)" width="1011" height="778" />\r\n					</a>					<div class="slideshow_description_box slideshow_transparent">\r\n						<div class="slideshow_title"><a href="http://agora.xtec.cat/inssantandreu/" target="_self" >Institut Sant Andreu (Sant Andreu de la Barca)</a></div>											</div>\r\n				</div>\r\n\r\n						<div style="clear: both;"></div></div><div class="slideshow_view">\r\n				<div class="slideshow_slide slideshow_slide_image">\r\n					<a href="http://agora.xtec.cat/ceip-collaso/" target="_blank" >						<img src="http://agora.xtec.cat/nodes/wp-content/uploads/usu135/2015/01/collasoigil.png" alt="Escola Collaso i Gil (Barcelona)" width="1010" height="780" />\r\n					</a>					<div class="slideshow_description_box slideshow_transparent">\r\n						<div class="slideshow_title"><a href="http://agora.xtec.cat/ceip-collaso/" target="_blank" >Escola Collaso i Gil (Barcelona)</a></div>											</div>\r\n				</div>\r\n\r\n						<div style="clear: both;"></div></div><div class="slideshow_view">\r\n				<div class="slideshow_slide slideshow_slide_image">\r\n					<a href="http://agora.xtec.cat/ceip-mcinto-verdaguer/" target="_blank" >						<img src="http://agora.xtec.cat/nodes/wp-content/uploads/usu135/2015/01/jacintverdaguer.png" alt="Escola Mossèn Jacint Verdaguer (Barcelona)" width="1011" height="767" />\r\n					</a>					<div class="slideshow_description_box slideshow_transparent">\r\n						<div class="slideshow_title"><a href="http://agora.xtec.cat/ceip-mcinto-verdaguer/" target="_blank" >Escola Mossèn Jacint Verdaguer (Barcelona)</a></div>											</div>\r\n				</div>\r\n\r\n						<div style="clear: both;"></div></div><div class="slideshow_view">\r\n				<div class="slideshow_slide slideshow_slide_image">\r\n					<a href="http://agora.xtec.cat/ceipstamargarida/" target="_blank" >						<img src="http://agora.xtec.cat/nodes/wp-content/uploads/usu135/2015/01/santamargarida.png" alt="Escola Santa Margarida (Quart)" width="1140" height="779" />\r\n					</a>					<div class="slideshow_description_box slideshow_transparent">\r\n						<div class="slideshow_title"><a href="http://agora.xtec.cat/ceipstamargarida/" target="_blank" >Escola Santa Margarida (Quart)</a></div>											</div>\r\n				</div>\r\n\r\n						<div style="clear: both;"></div></div><div class="slideshow_view">\r\n				<div class="slideshow_slide slideshow_slide_image">\r\n					<a href="http://agora.xtec.cat/insmontserratcolomer/" target="_blank" >						<img src="http://agora.xtec.cat/nodes/wp-content/uploads/usu135/2015/01/montserratcolomer.png" alt="Institut Montserrat Colomer (Sant Esteve Sesrovires)" width="1136" height="731" />\r\n					</a>					<div class="slideshow_description_box slideshow_transparent">\r\n						<div class="slideshow_title"><a href="http://agora.xtec.cat/insmontserratcolomer/" target="_blank" >Institut Montserrat Colomer (Sant Esteve Sesrovires)</a></div>											</div>\r\n				</div>\r\n\r\n						<div style="clear: both;"></div></div><div class="slideshow_view">\r\n				<div class="slideshow_slide slideshow_slide_image">\r\n					<a href="http://agora.xtec.cat/iespviana/" target="_blank" >						<img src="http://agora.xtec.cat/nodes/wp-content/uploads/usu135/2015/01/princepviana.png" alt="Institut Princep de Viana (Barcelona)" width="1137" height="777" />\r\n					</a>					<div class="slideshow_description_box slideshow_transparent">\r\n						<div class="slideshow_title"><a href="http://agora.xtec.cat/iespviana/" target="_blank" >Institut Princep de Viana (Barcelona)</a></div>											</div>\r\n				</div>\r\n\r\n						<div style="clear: both;"></div></div><div class="slideshow_view">\r\n				<div class="slideshow_slide slideshow_slide_image">\r\n					<a href="http://agora.xtec.cat/insmontserratcolomer/" target="_blank" >						<img src="http://agora.xtec.cat/nodes/wp-content/uploads/usu135/2015/11/Selecció_999060.png" alt="Institut Montserrat Colomer (Sant Esteve Sesrovires)" width="1254" height="917" />\r\n					</a>					<div class="slideshow_description_box slideshow_transparent">\r\n						<div class="slideshow_title"><a href="http://agora.xtec.cat/insmontserratcolomer/" target="_blank" >Institut Montserrat Colomer (Sant Esteve Sesrovires)</a></div>											</div>\r\n				</div>\r\n\r\n						<div style="clear: both;"></div></div><div class="slideshow_view">\r\n				<div class="slideshow_slide slideshow_slide_image">\r\n					<a href="http://agora.xtec.cat/ceip-turocanmates/" target="_blank" >						<img src="http://agora.xtec.cat/nodes/wp-content/uploads/usu135/2015/01/turomates.png" alt="Escola de Turó de Can Mates (Sant Cugat del Vallès)" width="1138" height="779" />\r\n					</a>					<div class="slideshow_description_box slideshow_transparent">\r\n						<div class="slideshow_title"><a href="http://agora.xtec.cat/ceip-turocanmates/" target="_blank" >Escola de Turó de Can Mates (Sant Cugat del Vallès)</a></div>											</div>\r\n				</div>\r\n\r\n						<div style="clear: both;"></div></div><div class="slideshow_view">\r\n				<div class="slideshow_slide slideshow_slide_image">\r\n					<a href="http://agora.xtec.cat/sinscardener/" target="_blank" >						<img src="http://agora.xtec.cat/nodes/wp-content/uploads/usu135/2015/01/sinscardener.png" alt="SES Cardener (Sant Joan de Vilatorrada)" width="1137" height="777" />\r\n					</a>					<div class="slideshow_description_box slideshow_transparent">\r\n						<div class="slideshow_title"><a href="http://agora.xtec.cat/sinscardener/" target="_blank" >SES Cardener (Sant Joan de Vilatorrada)</a></div>											</div>\r\n				</div>\r\n\r\n						<div style="clear: both;"></div></div>\r\n		</div>\r\n\r\n		<div class="slideshow_controlPanel slideshow_transparent" style="display: none;"><ul><li class="slideshow_togglePlay" data-play-text="Visualitza" data-pause-text="Pausa"></li></ul></div>\r\n\r\n		<div class="slideshow_button slideshow_previous slideshow_transparent" role="button" data-previous-text="Anterior" style="display: none;"></div>\r\n		<div class="slideshow_button slideshow_next slideshow_transparent" role="button" data-next-text="Següent" style="display: none;"></div>\r\n\r\n		<div class="slideshow_pagination" style="display: none;" data-go-to-text="Vés a la diapositiva"><div class="slideshow_pagination_center"></div></div>\r\n\r\n		<!-- WordPress Slideshow Version 2.3.1 -->\r\n\r\n			</div>\r\n\r\n\n";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:36:"http://wellformedweb.org/CommentAPI/";a:1:{s:10:"commentRss";a:1:{i:0;a:5:{s:4:"data";s:64:"http://agora.xtec.cat/nodes/portada/mostra-de-nodes-actius/feed/";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:38:"http://purl.org/rss/1.0/modules/slash/";a:1:{s:8:"comments";a:1:{i:0;a:5:{s:4:"data";s:1:"0";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:1;a:6:{s:4:"data";s:45:"\n		\n		\n		\n		\n		\n				\n		\n\n		\n		\n				\n			\n		\n		";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:5:{s:0:"";a:7:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:39:"Voleu renovar la web del vostre centre?";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:48:"http://agora.xtec.cat/nodes/portada/renovar-web/";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:8:"comments";a:1:{i:0;a:5:{s:4:"data";s:57:"http://agora.xtec.cat/nodes/portada/renovar-web/#comments";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Sat, 21 Feb 2015 03:50:40 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:8:"category";a:2:{i:0;a:5:{s:4:"data";s:17:"Característiques";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}i:1;a:5:{s:4:"data";s:7:"Portada";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:34:"http://agora.xtec.cat/nodes/?p=810";s:7:"attribs";a:1:{s:0:"";a:1:{s:11:"isPermaLink";s:5:"false";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:574:"<img width="150" height="150" src="http://agora.xtec.cat/nodes/wp-content/uploads/usu135/2014/12/rocket4-150x150.png" class="attachment-thumbnail wp-post-image" alt="rocket" />Si sou un centre educatiu públic o concertat de Catalunya podeu demanar Nodes.\nMés de <a href="http://agora.xtec.cat/nodes/centres-amb-nodes/" target="_blank">900</a> centres ja ho han fet.\n<a class="button alert" style="border-radius: 5px; background-color: #c42300; color: white !important;" href="http://agora.xtec.cat/moodle/moodle/mod/book/view.php?id=1981" target="_blank">Activa Nodes</a>\n";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:9:"xtecadmin";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:40:"http://purl.org/rss/1.0/modules/content/";a:1:{s:7:"encoded";a:1:{i:0;a:5:{s:4:"data";s:822:"<img width="150" height="150" src="http://agora.xtec.cat/nodes/wp-content/uploads/usu135/2014/12/rocket4-150x150.png" class="attachment-thumbnail wp-post-image" alt="rocket" /><p style="text-align: left;"><img class="aligncenter" src="http://agora.xtec.cat/nodes/wp-content/uploads/usu135/2014/12/rocket4-300x150.png" alt="" width="300" height="150" />Si sou un centre educatiu públic o concertat de Catalunya podeu demanar Nodes.</p>\n<p style="text-align: left;">Més de <a href="http://agora.xtec.cat/nodes/centres-amb-nodes/" target="_blank">900</a> centres ja ho han fet.</p>\n<p style="text-align: center;"><a class="button alert" style="border-radius: 5px; background-color: #c42300; color: white !important;" href="http://agora.xtec.cat/moodle/moodle/mod/book/view.php?id=1981" target="_blank">Activa Nodes</a></p>\n";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:36:"http://wellformedweb.org/CommentAPI/";a:1:{s:10:"commentRss";a:1:{i:0;a:5:{s:4:"data";s:53:"http://agora.xtec.cat/nodes/portada/renovar-web/feed/";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:38:"http://purl.org/rss/1.0/modules/slash/";a:1:{s:8:"comments";a:1:{i:0;a:5:{s:4:"data";s:1:"0";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:2;a:6:{s:4:"data";s:42:"\n		\n		\n		\n		\n		\n				\n\n		\n		\n				\n			\n		\n		";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:5:{s:0:"";a:7:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:14:"Què és Nodes";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:51:"http://agora.xtec.cat/nodes/portada/que-es-nodes-2/";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:8:"comments";a:1:{i:0;a:5:{s:4:"data";s:60:"http://agora.xtec.cat/nodes/portada/que-es-nodes-2/#comments";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Tue, 23 Dec 2014 12:15:16 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:8:"category";a:1:{i:0;a:5:{s:4:"data";s:7:"Portada";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:35:"http://agora.xtec.cat/nodes/?p=2737";s:7:"attribs";a:1:{s:0:"";a:1:{s:11:"isPermaLink";s:5:"false";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:3:"\n\n\n";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:9:"xtecadmin";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:40:"http://purl.org/rss/1.0/modules/content/";a:1:{s:7:"encoded";a:1:{i:0;a:5:{s:4:"data";s:272:"<div style="text-align:center">\n<iframe src="https://docs.google.com/presentation/d/1YsETkjeN1ad33OVSZL1IlBB2vBoN4i2UW4uoX5o9m60/embed?start=false&amp;loop=false&amp;delayms=3000" width="600" height="479" frameborder="0" allowfullscreen="allowfullscreen"></iframe>\n</div>\n";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:36:"http://wellformedweb.org/CommentAPI/";a:1:{s:10:"commentRss";a:1:{i:0;a:5:{s:4:"data";s:56:"http://agora.xtec.cat/nodes/portada/que-es-nodes-2/feed/";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:38:"http://purl.org/rss/1.0/modules/slash/";a:1:{s:8:"comments";a:1:{i:0;a:5:{s:4:"data";s:1:"0";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:3;a:6:{s:4:"data";s:45:"\n		\n		\n		\n		\n		\n				\n		\n\n		\n		\n				\n			\n		\n		";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:5:{s:0:"";a:7:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:13:"Molt flexible";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:55:"http://agora.xtec.cat/nodes/portada/multiples-esquemes/";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:8:"comments";a:1:{i:0;a:5:{s:4:"data";s:64:"http://agora.xtec.cat/nodes/portada/multiples-esquemes/#comments";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Tue, 23 Dec 2014 11:58:56 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:8:"category";a:2:{i:0;a:5:{s:4:"data";s:17:"Característiques";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}i:1;a:5:{s:4:"data";s:7:"Portada";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:34:"http://agora.xtec.cat/nodes/?p=776";s:7:"attribs";a:1:{s:0:"";a:1:{s:11:"isPermaLink";s:5:"false";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:525:"<img width="150" height="133" src="http://agora.xtec.cat/nodes/wp-content/uploads/usu135/2014/12/layout1-150x133.png" class="attachment-thumbnail wp-post-image" alt="layout" />NODES permet presentar la informació de manera molt flexible. Hi ha múltiples combinacions per mostrar els articles amb la mida i l''ordre que necessiteu. Amb barra de ginys lateral dreta, esquerra, totes dues o sense cap barra.&#8230;  <a href="http://agora.xtec.cat/nodes/portada/multiples-esquemes/" title="Read Molt flexible">Llegeix més»</a>";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:9:"xtecadmin";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:40:"http://purl.org/rss/1.0/modules/content/";a:1:{s:7:"encoded";a:1:{i:0;a:5:{s:4:"data";s:1280:"<img width="150" height="133" src="http://agora.xtec.cat/nodes/wp-content/uploads/usu135/2014/12/layout1-150x133.png" class="attachment-thumbnail wp-post-image" alt="layout" /><p>NODES permet presentar la informació de manera molt flexible. Hi ha múltiples combinacions per mostrar els articles amb la mida i l&#8217;ordre que necessiteu. Amb barra de ginys lateral dreta, esquerra, totes dues o sense cap barra.</p>\n<p><strong>Combinacions possibles de visualització d&#8217;articles</strong></p>\n<ul>\n<li>1 article per fila</li>\n<li>2 articles per fila (mateixa mida)</li>\n<li>2 articles per fila (el primer article ocupa 1/3 i el segon 2/3)</li>\n<li>2 articles per fila (el primer article ocupa 2/3 i el segon 1/3)</li>\n<li>3 articles per fila</li>\n<li>4 articles per fila</li>\n</ul>\n<p>És possible definir quants articles es visualitzen de manera independent per:</p>\n<ul>\n<li>Fila 1</li>\n<li>Fila 2</li>\n<li>Resta de files</li>\n</ul>\n<p><strong>Configuracions de barres de ginys possibles</strong></p>\n<p><a href="http://agora.xtec.cat/nodes/wp-content/uploads/usu135/2014/12/esquemes.png"><img class="alignnone size-full wp-image-846" src="http://agora.xtec.cat/nodes/wp-content/uploads/usu135/2014/12/esquemes.png" alt="esquemes" width="567" height="424" /></a></p>\n";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:36:"http://wellformedweb.org/CommentAPI/";a:1:{s:10:"commentRss";a:1:{i:0;a:5:{s:4:"data";s:60:"http://agora.xtec.cat/nodes/portada/multiples-esquemes/feed/";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:38:"http://purl.org/rss/1.0/modules/slash/";a:1:{s:8:"comments";a:1:{i:0;a:5:{s:4:"data";s:1:"0";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:4;a:6:{s:4:"data";s:45:"\n		\n		\n		\n		\n		\n				\n		\n\n		\n		\n				\n			\n		\n		";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:5:{s:0:"";a:7:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:17:"Allotjat a Àgora";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:55:"http://agora.xtec.cat/nodes/portada/allotjat-a-agora-2/";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:8:"comments";a:1:{i:0;a:5:{s:4:"data";s:64:"http://agora.xtec.cat/nodes/portada/allotjat-a-agora-2/#comments";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Mon, 22 Dec 2014 18:05:28 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:8:"category";a:2:{i:0;a:5:{s:4:"data";s:17:"Característiques";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}i:1;a:5:{s:4:"data";s:7:"Portada";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:34:"http://agora.xtec.cat/nodes/?p=804";s:7:"attribs";a:1:{s:0:"";a:1:{s:11:"isPermaLink";s:5:"false";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:470:"<img width="150" height="133" src="http://agora.xtec.cat/nodes/wp-content/uploads/usu135/2014/12/cloud4-150x133.png" class="attachment-thumbnail wp-post-image" alt="cloud" />El servei està allotjat a <a style="color: #c42300 !important;" href="http://agora.xtec.cat/">Àgora</a>, que garanteix programari actualitzat, còpies de seguretat diàries, alta disponibilitat i suport personalitzat. El centre educatiu no ha de realitzar cap tasca tècnica de manteniment.\n\n";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:9:"xtecadmin";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:40:"http://purl.org/rss/1.0/modules/content/";a:1:{s:7:"encoded";a:1:{i:0;a:5:{s:4:"data";s:528:"<img width="150" height="133" src="http://agora.xtec.cat/nodes/wp-content/uploads/usu135/2014/12/cloud4-150x133.png" class="attachment-thumbnail wp-post-image" alt="cloud" /><p style="color: #444444;">El servei està allotjat a <a style="color: #c42300 !important;" href="http://agora.xtec.cat/">Àgora</a>, que garanteix programari actualitzat, còpies de seguretat diàries, alta disponibilitat i suport personalitzat. El centre educatiu no ha de realitzar cap tasca tècnica de manteniment.</p>\n<p style="color: #444444;">\n";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:36:"http://wellformedweb.org/CommentAPI/";a:1:{s:10:"commentRss";a:1:{i:0;a:5:{s:4:"data";s:60:"http://agora.xtec.cat/nodes/portada/allotjat-a-agora-2/feed/";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:38:"http://purl.org/rss/1.0/modules/slash/";a:1:{s:8:"comments";a:1:{i:0;a:5:{s:4:"data";s:1:"0";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:5;a:6:{s:4:"data";s:45:"\n		\n		\n		\n		\n		\n				\n		\n\n		\n		\n				\n			\n		\n		";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:5:{s:0:"";a:7:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:6:"Social";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:61:"http://agora.xtec.cat/nodes/portada/amb-xarxa-social-inclosa/";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:8:"comments";a:1:{i:0;a:5:{s:4:"data";s:70:"http://agora.xtec.cat/nodes/portada/amb-xarxa-social-inclosa/#comments";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Mon, 22 Dec 2014 12:21:41 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:8:"category";a:2:{i:0;a:5:{s:4:"data";s:17:"Característiques";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}i:1;a:5:{s:4:"data";s:7:"Portada";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:34:"http://agora.xtec.cat/nodes/?p=799";s:7:"attribs";a:1:{s:0:"";a:1:{s:11:"isPermaLink";s:5:"false";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:485:"<img width="150" height="133" src="http://agora.xtec.cat/nodes/wp-content/uploads/usu135/2014/12/network-150x133.png" class="attachment-thumbnail wp-post-image" alt="network" />NODES inclou un entorn segur i controlat que permet als alumnes apendre què és una xarxa social i com fer-ne un bon ús. Un espai transversal on compartir aficions, interessos i projectes&#8230;  <a href="http://agora.xtec.cat/nodes/portada/amb-xarxa-social-inclosa/" title="Read Social">Llegeix més»</a>";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:9:"xtecadmin";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:40:"http://purl.org/rss/1.0/modules/content/";a:1:{s:7:"encoded";a:1:{i:0;a:5:{s:4:"data";s:4573:"<img width="150" height="133" src="http://agora.xtec.cat/nodes/wp-content/uploads/usu135/2014/12/network-150x133.png" class="attachment-thumbnail wp-post-image" alt="network" /><p>Nodes incorpora les extensions <strong>BuddyPress</strong> i <strong>BBPress</strong> (Fòrums) que permeten implementar una xarxa social amb el control, la privacitat i la seguretat necessàries. La xarxa està formada bàsicament pel <strong>Mur general</strong> i els <strong>nodes</strong>:</p>\n<ul>\n<li>El<strong> Mur general:</strong> qualsevol usuari/ària pot escriure un comentari, o adjuntar una imatge o un vídeo de manera molt senzilla.</li>\n</ul>\n<p><a href="http://agora.xtec.cat/nodes/wp-content/uploads/usu135/2014/01/Selecció_999001.png"><img class="aligncenter wp-image-1268" src="http://agora.xtec.cat/nodes/wp-content/uploads/usu135/2014/01/Selecció_999001.png" alt="Selecció_999(001)" width="689" height="470" /></a></p>\n<ul>\n<li>Els<strong> nodes:</strong> espais on el usuaris s&#8217;agrupen per interessos, aficions, projectes&#8230; Cada node té el seu propi mur, un fòrum i un repositori de documents. Els nodes poden ser espais públics (per a tots els membres previament validats a la xarxa), privats (requereix validació extra) o ocults.</li>\n</ul>\n<p><a href="http://agora.xtec.cat/nodes/wp-content/uploads/usu135/2014/01/Selecció_999006.png"><img class="aligncenter wp-image-1267 " src="http://agora.xtec.cat/nodes/wp-content/uploads/usu135/2014/01/Selecció_999006.png" alt="Selecció_999(006)" width="288" height="385" /></a>Exemples de nodes reals: Professorat, Videojocs, Club de lectura, Notícies sobre la natura, Comissió TAC, Tutoria sobre RRR (Reducció, Reciclatge, Reutilització), Cinema, Papiroflèxia, Grup-classe d&#8217;ESO 1D, Tutoria educació emocional, Música, Fotografia, Grup-classe ESO 2A, Grup-classe ESO 1A, Intercanvi de llibres, Reptes del laberint, Futbol, Mondo internet, Dibuix, Goma eva (manualitats).</p>\n<p><a href="http://agora.xtec.cat/nodes/wp-content/uploads/usu135/2014/01/Selecció_999007.png"><img class="aligncenter wp-image-1269" src="http://agora.xtec.cat/nodes/wp-content/uploads/usu135/2014/01/Selecció_999007.png" alt="Selecció_999(007)" width="615" height="579" /></a></p>\n<p style="text-align: center;"> <em>Exemple de mur del node &#8220;Club de Lectura&#8221;</em></p>\n<h4>Transversal</h4>\n<p>La xarxa permet una veritable comunicació transversal entre l&#8217;alumnat de diferents classes, cursos i nivells, agrupant-se atenent a projectes, aficions i interessos.</p>\n<h4>Eina de tutoria</h4>\n<p>Es pot crear un node per cada tema de tutoria que es vulgui tractar en profunditat durant un trimestre o tot el curs. Els propis alumnes poden ser els encarregats de gestionar i mantenir el node, afegint-hi contingut cada setmana i obrint converses de reflexió. Si el node es públic, tot el que es publica es replica al mur general, de manera que tot el centre pot veure l&#8217;activitat que s&#8217;està fent en aquella tutoria.</p>\n<p><a href="http://agora.xtec.cat/nodes/wp-content/uploads/usu135/2014/01/Selecció_999010.png"><img class="aligncenter wp-image-1274 " src="http://agora.xtec.cat/nodes/wp-content/uploads/usu135/2014/01/Selecció_999010.png" alt="Selecció_999(010)" width="653" height="935" /></a></p>\n<p style="text-align: center;"><em>Node de reducció, reutilització i reciclatge, creat des de la tutoria de 2n d&#8217;ESO<br />\n</em></p>\n<h4>Intranet pel professorat</h4>\n<p>Simplement amb la creació d&#8217;un node, el professorat pot disposar d&#8217;un espai privat on iniciar converses (Mur), desenvolupar temes en profunditat (Fòrums) i compartir documents (Docs). Els nodes permeten diferents tipus de subscripció. D&#8217;aquesta manera, el docent pot triar, segons la subscripció, el flux d&#8217;informació que vol rebre.</p>\n<p><a href="http://agora.xtec.cat/nodes/wp-content/uploads/usu135/2014/01/Selecció_999008.png"><img class="aligncenter wp-image-1272" src="http://agora.xtec.cat/nodes/wp-content/uploads/usu135/2014/01/Selecció_999008.png" alt="Selecció_999(008)" width="631" height="657" /></a></p>\n<p style="text-align: center;"><em>Mur del node professorat</em></p>\n<p><a href="http://agora.xtec.cat/nodes/wp-content/uploads/usu135/2014/01/Selecció_999009.png"><img class="aligncenter wp-image-1273" src="http://agora.xtec.cat/nodes/wp-content/uploads/usu135/2014/01/Selecció_999009.png" alt="Selecció_999(009)" width="658" height="405" /></a></p>\n<p style="text-align: center;"><em>Apartat de documents associat al node </em></p>\n";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:36:"http://wellformedweb.org/CommentAPI/";a:1:{s:10:"commentRss";a:1:{i:0;a:5:{s:4:"data";s:66:"http://agora.xtec.cat/nodes/portada/amb-xarxa-social-inclosa/feed/";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:38:"http://purl.org/rss/1.0/modules/slash/";a:1:{s:8:"comments";a:1:{i:0;a:5:{s:4:"data";s:1:"0";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:6;a:6:{s:4:"data";s:45:"\n		\n		\n		\n		\n		\n				\n		\n\n		\n		\n				\n			\n		\n		";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:5:{s:0:"";a:7:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:13:"Autenticació";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:69:"http://agora.xtec.cat/nodes/portada/autenticacio-amb-moodle-i-google/";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:8:"comments";a:1:{i:0;a:5:{s:4:"data";s:78:"http://agora.xtec.cat/nodes/portada/autenticacio-amb-moodle-i-google/#comments";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Mon, 22 Dec 2014 11:57:51 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:8:"category";a:2:{i:0;a:5:{s:4:"data";s:17:"Característiques";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}i:1;a:5:{s:4:"data";s:7:"Portada";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:34:"http://agora.xtec.cat/nodes/?p=793";s:7:"attribs";a:1:{s:0:"";a:1:{s:11:"isPermaLink";s:5:"false";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:687:"<img width="150" height="133" src="http://agora.xtec.cat/nodes/wp-content/uploads/usu135/2014/12/user1-150x133.png" class="attachment-thumbnail wp-post-image" alt="user" />Per entrar a la part privada de NODES, els usuaris poden autenticar-se fent servir l&#8217;usuari del Moodle d&#8217;Àgora del centre o l&#8217;usuari de Google (si el centre disposa de <a title="enllaç a Google Apps for education" href="https://www.google.com/intx/es/work/apps/education/" target="_blank">Google Apps for Education</a>). No és necessari donar-los d&#8217;alta&#8230;  <a href="http://agora.xtec.cat/nodes/portada/autenticacio-amb-moodle-i-google/" title="Read Autenticació">Llegeix més»</a>";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:9:"xtecadmin";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:40:"http://purl.org/rss/1.0/modules/content/";a:1:{s:7:"encoded";a:1:{i:0;a:5:{s:4:"data";s:762:"<img width="150" height="133" src="http://agora.xtec.cat/nodes/wp-content/uploads/usu135/2014/12/user1-150x133.png" class="attachment-thumbnail wp-post-image" alt="user" /><p>Per entrar a la part privada de NODES, els usuaris poden autenticar-se fent servir l&#8217;usuari del Moodle d&#8217;Àgora del centre o l&#8217;usuari de Google (si el centre disposa de <a title="enllaç a Google Apps for education" href="https://www.google.com/intx/es/work/apps/education/" target="_blank">Google Apps for Education</a>). No és necessari donar-los d&#8217;alta de nou.</p>\n<p>Més informació a la guia ràpida:</p>\n<ul>\n<li><a title="enllaç a guia ràpida" href="http://agora.xtec.cat/nodes/guia-rapida/7-gestiona-els-usuaris/">Gestió dels usuaris</a></li>\n</ul>\n";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:36:"http://wellformedweb.org/CommentAPI/";a:1:{s:10:"commentRss";a:1:{i:0;a:5:{s:4:"data";s:74:"http://agora.xtec.cat/nodes/portada/autenticacio-amb-moodle-i-google/feed/";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:38:"http://purl.org/rss/1.0/modules/slash/";a:1:{s:8:"comments";a:1:{i:0;a:5:{s:4:"data";s:1:"0";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:7;a:6:{s:4:"data";s:45:"\n		\n		\n		\n		\n		\n				\n		\n\n		\n		\n				\n			\n		\n		";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:5:{s:0:"";a:7:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:8:"Carrusel";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:45:"http://agora.xtec.cat/nodes/portada/carrusel/";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:8:"comments";a:1:{i:0;a:5:{s:4:"data";s:54:"http://agora.xtec.cat/nodes/portada/carrusel/#comments";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Mon, 22 Dec 2014 05:15:45 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:8:"category";a:2:{i:0;a:5:{s:4:"data";s:17:"Característiques";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}i:1;a:5:{s:4:"data";s:7:"Portada";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:34:"http://agora.xtec.cat/nodes/?p=755";s:7:"attribs";a:1:{s:0:"";a:1:{s:11:"isPermaLink";s:5:"false";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:491:"<img width="150" height="133" src="http://agora.xtec.cat/nodes/wp-content/uploads/usu135/2014/12/carrusel1-150x133.png" class="attachment-thumbnail wp-post-image" alt="carrusel" />NODES inclou Carrusel, un sistema de presentació de diapositives molt flexible i potent. Les fotografies es poden carregar directament des de Picasa o Google+ Fotos. Compatible amb els dispositius mòbils.&#8230;  <a href="http://agora.xtec.cat/nodes/portada/carrusel/" title="Read Carrusel">Llegeix més»</a>";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:9:"xtecadmin";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:40:"http://purl.org/rss/1.0/modules/content/";a:1:{s:7:"encoded";a:1:{i:0;a:5:{s:4:"data";s:4377:"<img width="150" height="133" src="http://agora.xtec.cat/nodes/wp-content/uploads/usu135/2014/12/carrusel1-150x133.png" class="attachment-thumbnail wp-post-image" alt="carrusel" /><p>NODES inclou l&#8217;extensió <strong>Carrusel</strong>, un sistema de presentació de diapositives molt flexible i potent. Les diapositives poden ser fotografies, vídeos o textos. Les fotografies es poden carregar directament des de Picasa o Google+ Fotos. Compatible amb els dispositius mòbils.</p>\n<p>Exemple:</p>\n\r\n	<div class="slideshow_container slideshow_container_style-dark" style="height: 500px; " data-slideshow-id="688" data-style-name="style-dark" data-style-version="2.3.1" >\r\n\r\n					<div class="slideshow_loading_icon"></div>\r\n		\r\n		<div class="slideshow_content" style="display: none;">\r\n\r\n			<div class="slideshow_view">\r\n				<div class="slideshow_slide slideshow_slide_image">\r\n											<img src="http://agora.xtec.cat/nodes/wp-content/uploads/usu135/2014/11/12.jpg" alt="12" width="800" height="600" />\r\n										<div class="slideshow_description_box slideshow_transparent">\r\n						<div class="slideshow_title">12</div>											</div>\r\n				</div>\r\n\r\n						<div style="clear: both;"></div></div><div class="slideshow_view">\r\n				<div class="slideshow_slide slideshow_slide_image">\r\n											<img src="http://agora.xtec.cat/nodes/wp-content/uploads/usu135/2014/11/13.jpg" alt="13" width="800" height="600" />\r\n										<div class="slideshow_description_box slideshow_transparent">\r\n						<div class="slideshow_title">13</div>											</div>\r\n				</div>\r\n\r\n						<div style="clear: both;"></div></div><div class="slideshow_view">\r\n				<div class="slideshow_slide slideshow_slide_image">\r\n											<img src="http://agora.xtec.cat/nodes/wp-content/uploads/usu135/2014/11/14.jpg" alt="14" width="800" height="600" />\r\n										<div class="slideshow_description_box slideshow_transparent">\r\n						<div class="slideshow_title">14</div>											</div>\r\n				</div>\r\n\r\n						<div style="clear: both;"></div></div><div class="slideshow_view">\r\n				<div class="slideshow_slide slideshow_slide_image">\r\n											<img src="http://agora.xtec.cat/nodes/wp-content/uploads/usu135/2014/11/15.jpg" alt="15" width="800" height="600" />\r\n										<div class="slideshow_description_box slideshow_transparent">\r\n						<div class="slideshow_title">15</div>											</div>\r\n				</div>\r\n\r\n						<div style="clear: both;"></div></div><div class="slideshow_view">\r\n				<div class="slideshow_slide slideshow_slide_image">\r\n											<img src="http://agora.xtec.cat/nodes/wp-content/uploads/usu135/2014/11/16.jpg" alt="16" width="800" height="600" />\r\n										<div class="slideshow_description_box slideshow_transparent">\r\n						<div class="slideshow_title">16</div>											</div>\r\n				</div>\r\n\r\n						<div style="clear: both;"></div></div><div class="slideshow_view">\r\n				<div class="slideshow_slide slideshow_slide_image">\r\n											<img src="http://agora.xtec.cat/nodes/wp-content/uploads/usu135/2014/11/17.jpg" alt="17" width="800" height="600" />\r\n										<div class="slideshow_description_box slideshow_transparent">\r\n						<div class="slideshow_title">17</div>											</div>\r\n				</div>\r\n\r\n						<div style="clear: both;"></div></div><div class="slideshow_view">\r\n				<div class="slideshow_slide slideshow_slide_image">\r\n											<img src="http://agora.xtec.cat/nodes/wp-content/uploads/usu135/2014/11/18.jpg" alt="18" width="800" height="600" />\r\n										<div class="slideshow_description_box slideshow_transparent">\r\n						<div class="slideshow_title">18</div>											</div>\r\n				</div>\r\n\r\n						<div style="clear: both;"></div></div>\r\n		</div>\r\n\r\n		<div class="slideshow_controlPanel slideshow_transparent" style="display: none;"><ul><li class="slideshow_togglePlay" data-play-text="Visualitza" data-pause-text="Pausa"></li></ul></div>\r\n\r\n		<div class="slideshow_button slideshow_previous slideshow_transparent" role="button" data-previous-text="Anterior" style="display: none;"></div>\r\n		<div class="slideshow_button slideshow_next slideshow_transparent" role="button" data-next-text="Següent" style="display: none;"></div>\r\n\r\n		<div class="slideshow_pagination" style="display: none;" data-go-to-text="Vés a la diapositiva"><div class="slideshow_pagination_center"></div></div>\r\n\r\n		<!-- WordPress Slideshow Version 2.3.1 -->\r\n\r\n			</div>\r\n\r\n\n";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:36:"http://wellformedweb.org/CommentAPI/";a:1:{s:10:"commentRss";a:1:{i:0;a:5:{s:4:"data";s:50:"http://agora.xtec.cat/nodes/portada/carrusel/feed/";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:38:"http://purl.org/rss/1.0/modules/slash/";a:1:{s:8:"comments";a:1:{i:0;a:5:{s:4:"data";s:1:"0";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:8;a:6:{s:4:"data";s:45:"\n		\n		\n		\n		\n		\n				\n		\n\n		\n		\n				\n			\n		\n		";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:5:{s:0:"";a:7:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:17:"Calendaris Google";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:54:"http://agora.xtec.cat/nodes/portada/calendaris-google/";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:8:"comments";a:1:{i:0;a:5:{s:4:"data";s:63:"http://agora.xtec.cat/nodes/portada/calendaris-google/#comments";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Mon, 22 Dec 2014 05:14:46 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:8:"category";a:2:{i:0;a:5:{s:4:"data";s:17:"Característiques";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}i:1;a:5:{s:4:"data";s:7:"Portada";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:34:"http://agora.xtec.cat/nodes/?p=761";s:7:"attribs";a:1:{s:0:"";a:1:{s:11:"isPermaLink";s:5:"false";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:477:"<img width="150" height="133" src="http://agora.xtec.cat/nodes/wp-content/uploads/usu135/2014/12/calendari2-150x133.png" class="attachment-thumbnail wp-post-image" alt="calendari" />NODES inclou l&#8217;extensió <a title="enllaç al plugin" href="https://wordpress.org/plugins/google-calendar-events/" target="_blank">Google Calendar Events</a>, que permet visualitzar els vostres calendaris Google de manera òptima. Una bona eina que pot servir com a agenda d&#8217;aula.\n";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:9:"xtecadmin";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:40:"http://purl.org/rss/1.0/modules/content/";a:1:{s:7:"encoded";a:1:{i:0;a:5:{s:4:"data";s:493:"<img width="150" height="133" src="http://agora.xtec.cat/nodes/wp-content/uploads/usu135/2014/12/calendari2-150x133.png" class="attachment-thumbnail wp-post-image" alt="calendari" /><p>NODES inclou l&#8217;extensió <em><a title="enllaç al plugin" href="https://wordpress.org/plugins/google-calendar-events/" target="_blank">Google Calendar Events</a></em>, que permet visualitzar els vostres calendaris Google de manera òptima. Una bona eina que pot servir com a agenda d&#8217;aula.</p>\n";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:36:"http://wellformedweb.org/CommentAPI/";a:1:{s:10:"commentRss";a:1:{i:0;a:5:{s:4:"data";s:59:"http://agora.xtec.cat/nodes/portada/calendaris-google/feed/";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:38:"http://purl.org/rss/1.0/modules/slash/";a:1:{s:8:"comments";a:1:{i:0;a:5:{s:4:"data";s:1:"0";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:9;a:6:{s:4:"data";s:45:"\n		\n		\n		\n		\n		\n				\n		\n\n		\n		\n				\n			\n		\n		";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:5:{s:0:"";a:7:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:17:"Ginys específics";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:61:"http://agora.xtec.cat/nodes/portada/giny-denllacos-educatius/";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:8:"comments";a:1:{i:0;a:5:{s:4:"data";s:70:"http://agora.xtec.cat/nodes/portada/giny-denllacos-educatius/#comments";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Mon, 22 Dec 2014 04:40:57 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:8:"category";a:2:{i:0;a:5:{s:4:"data";s:17:"Característiques";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}i:1;a:5:{s:4:"data";s:7:"Portada";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:34:"http://agora.xtec.cat/nodes/?p=786";s:7:"attribs";a:1:{s:0:"";a:1:{s:11:"isPermaLink";s:5:"false";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:564:"<img width="150" height="133" src="http://agora.xtec.cat/nodes/wp-content/uploads/usu135/2014/12/puzzle2-150x133.png" class="attachment-thumbnail wp-post-image" alt="puzzle" />NODES inclou diversos ginys que s''han desenvolupat pensant en els centres educatius. Un giny per identificar el centre, un giny amb una graella d''enllaços de la comunitat educativa (XTEC, Edu365, Edu3, Xarxa docent, ATRI, JClic...) i un giny de Grup classe.&#8230;  <a href="http://agora.xtec.cat/nodes/portada/giny-denllacos-educatius/" title="Read Ginys específics">Llegeix més»</a>";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:9:"xtecadmin";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:40:"http://purl.org/rss/1.0/modules/content/";a:1:{s:7:"encoded";a:1:{i:0;a:5:{s:4:"data";s:3616:"<img width="150" height="133" src="http://agora.xtec.cat/nodes/wp-content/uploads/usu135/2014/12/puzzle2-150x133.png" class="attachment-thumbnail wp-post-image" alt="puzzle" /><p><strong>NODES</strong> inclou diversos ginys desenvolupats pensant en els centres educatius.</p>\n<h4>Giny d&#8217;identificació del centre</h4>\n<p>Afegeix el logotip i les dades del centre de manera molt senzilla.</p>\n<p>Composició horitzontal:</p>\n<p><a href="http://agora.xtec.cat/nodes/wp-content/uploads/usu135/2014/12/Selecció_903.png"><img class="alignnone size-full wp-image-1073" src="http://agora.xtec.cat/nodes/wp-content/uploads/usu135/2014/12/Selecció_903.png" alt="Selecció_903" width="280" height="144" /></a></p>\n<p>Composició vertical:</p>\n<p><a href="http://agora.xtec.cat/nodes/wp-content/uploads/usu135/2014/12/Selecció_904.png"><img class="alignnone size-full wp-image-1074" src="http://agora.xtec.cat/nodes/wp-content/uploads/usu135/2014/12/Selecció_904.png" alt="Selecció_904" width="177" height="300" /></a></p>\n<p>Configuració:</p>\n<p><a href="http://agora.xtec.cat/nodes/wp-content/uploads/usu135/2014/12/Selecció_905.png"><img class="alignnone size-full wp-image-1075" style="border: 1px solid #ddd;" src="http://agora.xtec.cat/nodes/wp-content/uploads/usu135/2014/12/Selecció_905.png" alt="Selecció_905" width="280" height="724" /></a></p>\n<h4>Giny d&#8217;enllaços educatius</h4>\n<p>Permet incorporar de manera molt fàcil els principals enllaços de la comunitat educativa:</p>\n<p><a href="http://agora.xtec.cat/nodes/wp-content/uploads/usu135/2014/12/ginyeducatiu1.png"><img class="alignnone size-full wp-image-913" style="border: 1px solid #ddd;" src="http://agora.xtec.cat/nodes/wp-content/uploads/usu135/2014/12/ginyeducatiu1.png" alt="ginyeducatiu" width="306" height="241" /></a></p>\n<ul>\n<li><strong>Departament d&#8217;Ensenyament:</strong> Pàgina del Departament d&#8217;Ensenyament</li>\n<li><strong>Xtec:</strong> Recursos educatius</li>\n<li><strong>Edu365:</strong> Recursos educatius</li>\n<li><strong>Edu3:</strong> Vídeos educatius</li>\n<li><strong>Xarxa docent:</strong> Xarxa de suport amb més de 10.000 docents inscrits</li>\n<li><strong>Alexandria:</strong> Cursos Moodle i activitats PDI per descarregar</li>\n<li><strong>Linkat:</strong> Linux pels centres educatius</li>\n<li><strong>JClic:</strong> Activitats JClic</li>\n<li><strong>Merlí:</strong> Catàleg/Cercador de recursos XTEC</li>\n<li><strong>ARC:</strong> Aplicació de recursos al Currículum</li>\n<li><strong>Odissea:</strong> Entorn virtual de formació per a docents</li>\n<li><strong>AMPA:</strong> L&#8217;associació de Mares i Pares d&#8217;alumnes del centre</li>\n<li><strong>Escola verda:</strong> Projectes a favor del medi ambient</li>\n<li><strong>ATRI:</strong> Portal</li>\n<li><strong>SAGA:</strong> Sistema d&#8217;Administració i Gestió Acadèmica</li>\n<li><strong>Familia i Escola:</strong> Pàgina amb consells i recursos per les famílies</li>\n<li><strong>Internet Segura:</strong> Recursos per utilitzar Internet de manera segura</li>\n<li><strong>Moodle:</strong> Aula virtual del vostre centre</li>\n</ul>\n<h4>El giny Grup classe</h4>\n<p>Aquest giny permet incloure informació sobre el vostre grup classe. Ideal pel blog de classe.</p>\n<p><a href="http://agora.xtec.cat/nodes/wp-content/uploads/usu135/2014/12/giny-grup-classe.png"><img class="size-full wp-image-1070 alignleft" style="border: 1px solid #ddd;" src="http://agora.xtec.cat/nodes/wp-content/uploads/usu135/2014/12/giny-grup-classe.png" alt="giny-grup-classe" width="584" height="850" /></a></p>\n<p>&nbsp;</p>\n<p>&nbsp;</p>\n";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:36:"http://wellformedweb.org/CommentAPI/";a:1:{s:10:"commentRss";a:1:{i:0;a:5:{s:4:"data";s:66:"http://agora.xtec.cat/nodes/portada/giny-denllacos-educatius/feed/";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:38:"http://purl.org/rss/1.0/modules/slash/";a:1:{s:8:"comments";a:1:{i:0;a:5:{s:4:"data";s:1:"0";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}}}s:27:"http://www.w3.org/2005/Atom";a:1:{s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:0:"";s:7:"attribs";a:1:{s:0:"";a:3:{s:4:"href";s:51:"http://agora.xtec.cat/nodes/categoria/portada/feed/";s:3:"rel";s:4:"self";s:4:"type";s:19:"application/rss+xml";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:44:"http://purl.org/rss/1.0/modules/syndication/";a:2:{s:12:"updatePeriod";a:1:{i:0;a:5:{s:4:"data";s:6:"hourly";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:15:"updateFrequency";a:1:{i:0;a:5:{s:4:"data";s:1:"1";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}}}}}}}}s:4:"type";i:128;s:7:"headers";a:10:{s:4:"date";s:29:"Tue, 05 Apr 2016 09:55:44 GMT";s:6:"server";s:28:"Apache/2.2.15 (CentOS) DAV/2";s:7:"expires";s:29:"Thu, 19 Nov 1981 08:52:00 GMT";s:13:"cache-control";s:62:"no-store, no-cache, must-revalidate, post-check=0, pre-check=0";s:6:"pragma";s:8:"no-cache";s:10:"x-pingback";s:38:"http://agora.xtec.cat/nodes/xmlrpc.php";s:13:"last-modified";s:29:"Sat, 26 Mar 2016 10:27:02 GMT";s:4:"etag";s:34:""9a1ce8ff19e02bfb005aa6ac0ffcec71"";s:10:"connection";s:5:"close";s:12:"content-type";s:23:"text/xml; charset=UTF-8";}s:5:"build";s:14:"20160309093002";}', 'no');
INSERT INTO `wp_options` (`option_id`, `option_name`, `option_value`, `autoload`) VALUES
(2184, '_transient_timeout_feed_mod_399a5712149df56f3495904f4224b5e2', '1459893344', 'no'),
(2185, '_transient_feed_mod_399a5712149df56f3495904f4224b5e2', '1459850144', 'no'),
(2186, 'email-subscribers', '2.9', 'yes');

-- --------------------------------------------------------

--
-- Estructura de la taula `wp_postmeta`
--

CREATE TABLE `wp_postmeta` (
  `meta_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `post_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `meta_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_value` longtext COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`meta_id`),
  KEY `post_id` (`post_id`),
  KEY `meta_key` (`meta_key`(191))
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=1203 ;

--
-- Bolcant dades de la taula `wp_postmeta`
--

INSERT INTO `wp_postmeta` (`meta_id`, `post_id`, `meta_key`, `meta_value`) VALUES
(1, 2, '_wp_page_template', 'default'),
(2, 7, '_edit_lock', '1445936724:2'),
(3, 7, '_edit_last', '2'),
(4, 7, '_wp_page_template', 'page-templates/front-page.php'),
(5, 9, '_edit_lock', '1445936729:2'),
(6, 9, '_edit_last', '2'),
(7, 9, '_wp_page_template', 'page-templates/front-page.php'),
(8, 11, '_wp_attached_file', '2014/09/logo-escola.png'),
(9, 11, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:131;s:6:"height";i:131;s:4:"file";s:23:"2014/09/logo-escola.png";s:5:"sizes";a:0:{}s:10:"image_meta";a:10:{s:8:"aperture";i:0;s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";i:0;s:9:"copyright";s:0:"";s:12:"focal_length";i:0;s:3:"iso";i:0;s:13:"shutter_speed";i:0;s:5:"title";s:0:"";}}'),
(13, 13, '_edit_lock', '1445936464:2'),
(14, 13, '_edit_last', '2'),
(20, 13, '_amaga_titol', ''),
(21, 13, '_amaga_metadata', ''),
(22, 13, '_bloc_html', 'on'),
(31, 18, '_edit_lock', '1445936402:2'),
(32, 18, '_edit_last', '2'),
(38, 18, '_amaga_titol', ''),
(39, 18, '_amaga_metadata', ''),
(40, 18, '_bloc_html', 'on'),
(43, 22, '_edit_lock', '1445936658:2'),
(44, 22, '_edit_last', '2'),
(45, 22, '_wp_page_template', 'page-templates/side-menu.php'),
(46, 24, '_edit_lock', '1445936663:2'),
(47, 24, '_edit_last', '2'),
(48, 24, '_wp_page_template', 'page-templates/side-menu.php'),
(49, 26, '_edit_lock', '1445936672:2'),
(50, 26, '_edit_last', '2'),
(51, 26, '_wp_page_template', 'page-templates/side-menu.php'),
(52, 28, '_edit_lock', '1445936679:2'),
(53, 28, '_edit_last', '2'),
(54, 28, '_wp_page_template', 'page-templates/side-menu.php'),
(55, 30, '_edit_lock', '1445936686:2'),
(56, 30, '_edit_last', '2'),
(57, 30, '_wp_page_template', 'page-templates/side-menu.php'),
(58, 32, '_edit_lock', '1445936693:2'),
(59, 32, '_edit_last', '2'),
(60, 32, '_wp_page_template', 'page-templates/side-menu.php'),
(61, 34, '_edit_lock', '1445936699:2'),
(62, 34, '_edit_last', '2'),
(63, 34, '_wp_page_template', 'page-templates/side-menu.php'),
(64, 36, '_edit_lock', '1445936704:2'),
(65, 36, '_edit_last', '2'),
(66, 36, '_wp_page_template', 'page-templates/side-menu.php'),
(67, 38, '_edit_lock', '1445936708:2'),
(68, 38, '_edit_last', '2'),
(69, 38, '_wp_page_template', 'page-templates/side-menu.php'),
(205, 55, '_menu_item_type', 'post_type'),
(206, 55, '_menu_item_menu_item_parent', '0'),
(207, 55, '_menu_item_object_id', '22'),
(208, 55, '_menu_item_object', 'page'),
(209, 55, '_menu_item_target', ''),
(210, 55, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(211, 55, '_menu_item_xfn', ''),
(212, 55, '_menu_item_url', ''),
(214, 56, '_menu_item_type', 'post_type'),
(215, 56, '_menu_item_menu_item_parent', '55'),
(216, 56, '_menu_item_object_id', '38'),
(217, 56, '_menu_item_object', 'page'),
(218, 56, '_menu_item_target', ''),
(219, 56, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(220, 56, '_menu_item_xfn', ''),
(221, 56, '_menu_item_url', ''),
(223, 57, '_menu_item_type', 'post_type'),
(224, 57, '_menu_item_menu_item_parent', '55'),
(225, 57, '_menu_item_object_id', '36'),
(226, 57, '_menu_item_object', 'page'),
(227, 57, '_menu_item_target', ''),
(228, 57, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(229, 57, '_menu_item_xfn', ''),
(230, 57, '_menu_item_url', ''),
(232, 58, '_menu_item_type', 'post_type'),
(233, 58, '_menu_item_menu_item_parent', '55'),
(234, 58, '_menu_item_object_id', '34'),
(235, 58, '_menu_item_object', 'page'),
(236, 58, '_menu_item_target', ''),
(237, 58, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(238, 58, '_menu_item_xfn', ''),
(239, 58, '_menu_item_url', ''),
(241, 59, '_menu_item_type', 'post_type'),
(242, 59, '_menu_item_menu_item_parent', '55'),
(243, 59, '_menu_item_object_id', '32'),
(244, 59, '_menu_item_object', 'page'),
(245, 59, '_menu_item_target', ''),
(246, 59, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(247, 59, '_menu_item_xfn', ''),
(248, 59, '_menu_item_url', ''),
(250, 60, '_menu_item_type', 'post_type'),
(251, 60, '_menu_item_menu_item_parent', '55'),
(252, 60, '_menu_item_object_id', '30'),
(253, 60, '_menu_item_object', 'page'),
(254, 60, '_menu_item_target', ''),
(255, 60, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(256, 60, '_menu_item_xfn', ''),
(257, 60, '_menu_item_url', ''),
(259, 61, '_menu_item_type', 'post_type'),
(260, 61, '_menu_item_menu_item_parent', '55'),
(261, 61, '_menu_item_object_id', '28'),
(262, 61, '_menu_item_object', 'page'),
(263, 61, '_menu_item_target', ''),
(264, 61, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(265, 61, '_menu_item_xfn', ''),
(266, 61, '_menu_item_url', ''),
(268, 62, '_menu_item_type', 'post_type'),
(269, 62, '_menu_item_menu_item_parent', '55'),
(270, 62, '_menu_item_object_id', '26'),
(271, 62, '_menu_item_object', 'page'),
(272, 62, '_menu_item_target', ''),
(273, 62, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(274, 62, '_menu_item_xfn', ''),
(275, 62, '_menu_item_url', ''),
(277, 63, '_menu_item_type', 'post_type'),
(278, 63, '_menu_item_menu_item_parent', '55'),
(279, 63, '_menu_item_object_id', '24'),
(280, 63, '_menu_item_object', 'page'),
(281, 63, '_menu_item_target', ''),
(282, 63, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(283, 63, '_menu_item_xfn', ''),
(284, 63, '_menu_item_url', ''),
(286, 64, '_edit_lock', '1445936733:2'),
(287, 64, '_edit_last', '2'),
(288, 64, '_wp_page_template', 'page-templates/side-menu.php'),
(289, 66, '_edit_lock', '1445936737:2'),
(290, 66, '_edit_last', '2'),
(291, 66, '_wp_page_template', 'page-templates/side-menu.php'),
(292, 69, '_menu_item_type', 'post_type'),
(293, 69, '_menu_item_menu_item_parent', '0'),
(294, 69, '_menu_item_object_id', '66'),
(295, 69, '_menu_item_object', 'page'),
(296, 69, '_menu_item_target', ''),
(297, 69, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(298, 69, '_menu_item_xfn', ''),
(299, 69, '_menu_item_url', ''),
(301, 70, '_menu_item_type', 'post_type'),
(302, 70, '_menu_item_menu_item_parent', '0'),
(303, 70, '_menu_item_object_id', '64'),
(304, 70, '_menu_item_object', 'page'),
(305, 70, '_menu_item_target', ''),
(306, 70, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(307, 70, '_menu_item_xfn', ''),
(308, 70, '_menu_item_url', ''),
(310, 71, '_edit_lock', '1445936742:2'),
(311, 71, '_edit_last', '2'),
(312, 71, '_wp_page_template', 'page-templates/side-menu.php'),
(313, 73, '_edit_lock', '1445936753:2'),
(314, 73, '_edit_last', '2'),
(315, 73, '_wp_page_template', 'page-templates/side-menu.php'),
(316, 75, '_menu_item_type', 'post_type'),
(317, 75, '_menu_item_menu_item_parent', '69'),
(318, 75, '_menu_item_object_id', '73'),
(319, 75, '_menu_item_object', 'page'),
(320, 75, '_menu_item_target', ''),
(321, 75, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(322, 75, '_menu_item_xfn', ''),
(323, 75, '_menu_item_url', ''),
(325, 76, '_menu_item_type', 'post_type'),
(326, 76, '_menu_item_menu_item_parent', '69'),
(327, 76, '_menu_item_object_id', '71'),
(328, 76, '_menu_item_object', 'page'),
(329, 76, '_menu_item_target', ''),
(330, 76, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(331, 76, '_menu_item_xfn', ''),
(332, 76, '_menu_item_url', ''),
(334, 77, '_edit_lock', '1445936746:2'),
(335, 77, '_edit_last', '2'),
(336, 77, '_wp_page_template', 'page-templates/side-menu.php'),
(337, 79, '_menu_item_type', 'post_type'),
(338, 79, '_menu_item_menu_item_parent', '69'),
(339, 79, '_menu_item_object_id', '77'),
(340, 79, '_menu_item_object', 'page'),
(341, 79, '_menu_item_target', ''),
(342, 79, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(343, 79, '_menu_item_xfn', ''),
(344, 79, '_menu_item_url', ''),
(346, 80, '_edit_lock', '1445936757:2'),
(347, 80, '_edit_last', '2'),
(348, 80, '_wp_page_template', 'page-templates/side-menu.php'),
(349, 82, '_edit_lock', '1445936761:2'),
(350, 82, '_edit_last', '2'),
(351, 82, '_wp_page_template', 'page-templates/side-menu.php'),
(352, 84, '_edit_lock', '1445936765:2'),
(353, 84, '_edit_last', '2'),
(354, 84, '_wp_page_template', 'page-templates/side-menu.php'),
(355, 86, '_menu_item_type', 'taxonomy'),
(356, 86, '_menu_item_menu_item_parent', '0'),
(357, 86, '_menu_item_object_id', '7'),
(358, 86, '_menu_item_object', 'category'),
(359, 86, '_menu_item_target', ''),
(360, 86, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(361, 86, '_menu_item_xfn', ''),
(362, 86, '_menu_item_url', ''),
(364, 87, '_edit_lock', '1445936719:2'),
(365, 87, '_edit_last', '2'),
(366, 87, '_wp_page_template', 'page-templates/side-menu.php'),
(367, 89, '_menu_item_type', 'post_type'),
(368, 89, '_menu_item_menu_item_parent', '69'),
(369, 89, '_menu_item_object_id', '84'),
(370, 89, '_menu_item_object', 'page'),
(371, 89, '_menu_item_target', ''),
(372, 89, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(373, 89, '_menu_item_xfn', ''),
(374, 89, '_menu_item_url', ''),
(376, 90, '_menu_item_type', 'post_type'),
(377, 90, '_menu_item_menu_item_parent', '69'),
(378, 90, '_menu_item_object_id', '82'),
(379, 90, '_menu_item_object', 'page'),
(380, 90, '_menu_item_target', ''),
(381, 90, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(382, 90, '_menu_item_xfn', ''),
(383, 90, '_menu_item_url', ''),
(385, 91, '_menu_item_type', 'post_type'),
(386, 91, '_menu_item_menu_item_parent', '69'),
(387, 91, '_menu_item_object_id', '80'),
(388, 91, '_menu_item_object', 'page'),
(389, 91, '_menu_item_target', ''),
(390, 91, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(391, 91, '_menu_item_xfn', ''),
(392, 91, '_menu_item_url', ''),
(394, 92, '_menu_item_type', 'post_type'),
(395, 92, '_menu_item_menu_item_parent', '0'),
(396, 92, '_menu_item_object_id', '87'),
(397, 92, '_menu_item_object', 'page'),
(398, 92, '_menu_item_target', ''),
(399, 92, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(400, 92, '_menu_item_xfn', ''),
(401, 92, '_menu_item_url', ''),
(403, 93, '_menu_item_type', 'taxonomy'),
(404, 93, '_menu_item_menu_item_parent', '148'),
(405, 93, '_menu_item_object_id', '3'),
(406, 93, '_menu_item_object', 'category'),
(407, 93, '_menu_item_target', ''),
(408, 93, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(409, 93, '_menu_item_xfn', ''),
(410, 93, '_menu_item_url', ''),
(412, 94, '_menu_item_type', 'taxonomy'),
(413, 94, '_menu_item_menu_item_parent', '148'),
(414, 94, '_menu_item_object_id', '8'),
(415, 94, '_menu_item_object', 'category'),
(416, 94, '_menu_item_target', ''),
(417, 94, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(418, 94, '_menu_item_xfn', ''),
(419, 94, '_menu_item_url', ''),
(421, 95, '_menu_item_type', 'taxonomy'),
(422, 95, '_menu_item_menu_item_parent', '148'),
(423, 95, '_menu_item_object_id', '9'),
(424, 95, '_menu_item_object', 'category'),
(425, 95, '_menu_item_target', ''),
(426, 95, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(427, 95, '_menu_item_xfn', ''),
(428, 95, '_menu_item_url', ''),
(430, 96, '_menu_item_type', 'taxonomy'),
(431, 96, '_menu_item_menu_item_parent', '149'),
(432, 96, '_menu_item_object_id', '10'),
(433, 96, '_menu_item_object', 'category'),
(434, 96, '_menu_item_target', ''),
(435, 96, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(436, 96, '_menu_item_xfn', ''),
(437, 96, '_menu_item_url', ''),
(439, 97, '_menu_item_type', 'taxonomy'),
(440, 97, '_menu_item_menu_item_parent', '149'),
(441, 97, '_menu_item_object_id', '11'),
(442, 97, '_menu_item_object', 'category'),
(443, 97, '_menu_item_target', ''),
(444, 97, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(445, 97, '_menu_item_xfn', ''),
(446, 97, '_menu_item_url', ''),
(448, 98, '_menu_item_type', 'taxonomy'),
(449, 98, '_menu_item_menu_item_parent', '149'),
(450, 98, '_menu_item_object_id', '12'),
(451, 98, '_menu_item_object', 'category'),
(452, 98, '_menu_item_target', ''),
(453, 98, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(454, 98, '_menu_item_xfn', ''),
(455, 98, '_menu_item_url', ''),
(457, 99, '_menu_item_type', 'taxonomy'),
(458, 99, '_menu_item_menu_item_parent', '149'),
(459, 99, '_menu_item_object_id', '13'),
(460, 99, '_menu_item_object', 'category'),
(461, 99, '_menu_item_target', ''),
(462, 99, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(463, 99, '_menu_item_xfn', ''),
(464, 99, '_menu_item_url', ''),
(466, 100, '_menu_item_type', 'taxonomy'),
(467, 100, '_menu_item_menu_item_parent', '149'),
(468, 100, '_menu_item_object_id', '14'),
(469, 100, '_menu_item_object', 'category'),
(470, 100, '_menu_item_target', ''),
(471, 100, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(472, 100, '_menu_item_xfn', ''),
(473, 100, '_menu_item_url', ''),
(475, 101, '_menu_item_type', 'taxonomy'),
(476, 101, '_menu_item_menu_item_parent', '149'),
(477, 101, '_menu_item_object_id', '15'),
(478, 101, '_menu_item_object', 'category'),
(479, 101, '_menu_item_target', ''),
(480, 101, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(481, 101, '_menu_item_xfn', ''),
(482, 101, '_menu_item_url', ''),
(484, 102, '_wp_attached_file', '2014/09/exemple1b.png'),
(485, 102, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:350;s:6:"height";i:250;s:4:"file";s:21:"2014/09/exemple1b.png";s:5:"sizes";a:4:{s:9:"thumbnail";a:4:{s:4:"file";s:21:"exemple1b-150x150.png";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}s:6:"medium";a:4:{s:4:"file";s:21:"exemple1b-300x214.png";s:5:"width";i:300;s:6:"height";i:214;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-300";a:4:{s:4:"file";s:21:"exemple1b-300x250.png";s:5:"width";i:300;s:6:"height";i:250;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-200";a:4:{s:4:"file";s:21:"exemple1b-200x150.png";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}}s:10:"image_meta";a:10:{s:8:"aperture";i:0;s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";i:0;s:9:"copyright";s:0:"";s:12:"focal_length";i:0;s:3:"iso";i:0;s:13:"shutter_speed";i:0;s:5:"title";s:0:"";}}'),
(489, 103, '_edit_lock', '1411387354:2'),
(490, 103, '_edit_last', '2'),
(496, 103, 'settings', 'a:26:{s:9:"animation";s:5:"slide";s:10:"slideSpeed";s:1:"1";s:16:"descriptionSpeed";s:3:"0.4";s:13:"intervalSpeed";s:3:"300";s:13:"slidesPerView";s:1:"1";s:8:"maxWidth";s:1:"0";s:11:"aspectRatio";s:3:"3:1";s:6:"height";s:3:"179";s:14:"imageBehaviour";s:4:"crop";s:15:"showDescription";s:5:"false";s:15:"hideDescription";s:4:"true";s:27:"preserveSlideshowDimensions";s:5:"false";s:20:"enableResponsiveness";s:4:"true";s:4:"play";s:5:"false";s:4:"loop";s:4:"true";s:12:"pauseOnHover";s:4:"true";s:12:"controllable";s:4:"true";s:21:"hideNavigationButtons";s:4:"true";s:14:"showPagination";s:5:"false";s:14:"hidePagination";s:4:"true";s:12:"controlPanel";s:5:"false";s:16:"hideControlPanel";s:4:"true";s:15:"waitUntilLoaded";s:4:"true";s:15:"showLoadingIcon";s:4:"true";s:6:"random";s:4:"true";s:11:"avoidFilter";s:4:"true";}'),
(497, 103, 'styleSettings', 'a:1:{s:5:"style";s:15:"style-light.css";}'),
(498, 103, 'slides', 'a:3:{i:1;a:9:{s:17:"titleElementTagID";s:1:"0";s:5:"title";s:35:"Il·lustració per Albert Bachiller";s:23:"descriptionElementTagID";s:1:"0";s:11:"description";s:0:"";s:3:"url";s:22:"http://www.jurjur.org/";s:9:"urlTarget";s:5:"_self";s:15:"alternativeText";s:35:"Il·lustració per Albert Bachiller";s:4:"type";s:10:"attachment";s:6:"postId";s:3:"133";}i:2;a:9:{s:17:"titleElementTagID";s:1:"0";s:5:"title";s:22:"Photo by Nick Amoscato";s:23:"descriptionElementTagID";s:1:"0";s:11:"description";s:0:"";s:3:"url";s:50:"https://www.flickr.com/photos/namoscato/8297366194";s:9:"urlTarget";s:5:"_self";s:15:"alternativeText";s:22:"Photo by Nick Amoscato";s:4:"type";s:10:"attachment";s:6:"postId";s:3:"112";}i:3;a:9:{s:17:"titleElementTagID";s:1:"0";s:5:"title";s:6:"classe";s:23:"descriptionElementTagID";s:1:"0";s:11:"description";s:0:"";s:3:"url";s:88:"http://upload.wikimedia.org/wikipedia/commons/6/68/Boxwood_PS_kindergarten_classroom.jpg";s:9:"urlTarget";s:5:"_self";s:15:"alternativeText";s:62:"By ChinaFlag (Own work) [Public domain], via Wikimedia Commons";s:4:"type";s:10:"attachment";s:6:"postId";s:3:"131";}}'),
(501, 106, '_wp_attached_file', '2014/09/joan_turu.png'),
(502, 106, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:640;s:6:"height";i:218;s:4:"file";s:21:"2014/09/joan_turu.png";s:5:"sizes";a:4:{s:9:"thumbnail";a:4:{s:4:"file";s:21:"joan_turu-150x150.png";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}s:6:"medium";a:4:{s:4:"file";s:21:"joan_turu-300x102.png";s:5:"width";i:300;s:6:"height";i:102;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-300";a:4:{s:4:"file";s:21:"joan_turu-300x218.png";s:5:"width";i:300;s:6:"height";i:218;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-200";a:4:{s:4:"file";s:21:"joan_turu-200x150.png";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}}s:10:"image_meta";a:10:{s:8:"aperture";i:0;s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";i:0;s:9:"copyright";s:0:"";s:12:"focal_length";i:0;s:3:"iso";i:0;s:13:"shutter_speed";i:0;s:5:"title";s:0:"";}}'),
(503, 107, '_wp_attached_file', '2014/09/nens2.png'),
(504, 107, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:393;s:6:"height";i:258;s:4:"file";s:17:"2014/09/nens2.png";s:5:"sizes";a:4:{s:9:"thumbnail";a:4:{s:4:"file";s:17:"nens2-150x150.png";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}s:6:"medium";a:4:{s:4:"file";s:17:"nens2-300x196.png";s:5:"width";i:300;s:6:"height";i:196;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-300";a:4:{s:4:"file";s:17:"nens2-300x250.png";s:5:"width";i:300;s:6:"height";i:250;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-200";a:4:{s:4:"file";s:17:"nens2-200x150.png";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}}s:10:"image_meta";a:10:{s:8:"aperture";i:0;s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";i:0;s:9:"copyright";s:0:"";s:12:"focal_length";i:0;s:3:"iso";i:0;s:13:"shutter_speed";i:0;s:5:"title";s:0:"";}}'),
(508, 108, '_wp_attached_file', '2014/09/nensescola1.jpg'),
(509, 108, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:400;s:6:"height";i:265;s:4:"file";s:23:"2014/09/nensescola1.jpg";s:5:"sizes";a:4:{s:9:"thumbnail";a:4:{s:4:"file";s:23:"nensescola1-150x150.jpg";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:10:"image/jpeg";}s:6:"medium";a:4:{s:4:"file";s:23:"nensescola1-300x198.jpg";s:5:"width";i:300;s:6:"height";i:198;s:9:"mime-type";s:10:"image/jpeg";}s:9:"thumb-300";a:4:{s:4:"file";s:23:"nensescola1-300x250.jpg";s:5:"width";i:300;s:6:"height";i:250;s:9:"mime-type";s:10:"image/jpeg";}s:9:"thumb-200";a:4:{s:4:"file";s:23:"nensescola1-200x150.jpg";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:10:"image/jpeg";}}s:10:"image_meta";a:10:{s:8:"aperture";i:0;s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";i:0;s:9:"copyright";s:0:"";s:12:"focal_length";i:0;s:3:"iso";i:0;s:13:"shutter_speed";i:0;s:5:"title";s:0:"";}}'),
(529, 112, '_wp_attached_file', '2014/09/Photo-by-Nick-Amoscato.jpg'),
(530, 112, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:638;s:6:"height";i:215;s:4:"file";s:34:"2014/09/Photo-by-Nick-Amoscato.jpg";s:5:"sizes";a:4:{s:9:"thumbnail";a:4:{s:4:"file";s:34:"Photo-by-Nick-Amoscato-150x150.jpg";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:10:"image/jpeg";}s:6:"medium";a:4:{s:4:"file";s:34:"Photo-by-Nick-Amoscato-300x101.jpg";s:5:"width";i:300;s:6:"height";i:101;s:9:"mime-type";s:10:"image/jpeg";}s:9:"thumb-300";a:4:{s:4:"file";s:34:"Photo-by-Nick-Amoscato-300x215.jpg";s:5:"width";i:300;s:6:"height";i:215;s:9:"mime-type";s:10:"image/jpeg";}s:9:"thumb-200";a:4:{s:4:"file";s:34:"Photo-by-Nick-Amoscato-200x150.jpg";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:10:"image/jpeg";}}s:10:"image_meta";a:10:{s:8:"aperture";i:0;s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";i:0;s:9:"copyright";s:0:"";s:12:"focal_length";i:0;s:3:"iso";i:0;s:13:"shutter_speed";i:0;s:5:"title";s:0:"";}}'),
(531, 112, '_wp_attachment_image_alt', 'Photo by Nick Amoscato'),
(532, 113, '_edit_lock', '1438070927:2'),
(533, 113, '_edit_last', '2'),
(536, 113, '_amaga_titol', ''),
(537, 113, '_amaga_metadata', ''),
(538, 113, '_bloc_html', 'on'),
(539, 115, '_edit_lock', '1438070198:2'),
(540, 115, '_edit_last', '2'),
(543, 115, '_amaga_titol', ''),
(544, 115, '_amaga_metadata', ''),
(545, 115, '_bloc_html', ''),
(550, 118, '_edit_lock', '1438070184:2'),
(551, 118, '_edit_last', '2'),
(554, 118, '_amaga_titol', ''),
(555, 118, '_amaga_metadata', ''),
(556, 118, '_bloc_html', 'on'),
(557, 120, '_edit_lock', '1438070182:2'),
(558, 120, '_edit_last', '1'),
(561, 120, '_amaga_titol', ''),
(562, 120, '_amaga_metadata', ''),
(563, 120, '_bloc_html', ''),
(573, 125, '_edit_lock', '1411139960:1'),
(574, 125, '_edit_last', '1'),
(575, 125, 'settings', 'a:26:{s:9:"animation";s:5:"slide";s:10:"slideSpeed";s:1:"1";s:16:"descriptionSpeed";s:3:"0.4";s:13:"intervalSpeed";s:1:"5";s:13:"slidesPerView";s:1:"1";s:8:"maxWidth";s:1:"0";s:11:"aspectRatio";s:3:"3:1";s:6:"height";s:3:"200";s:14:"imageBehaviour";s:4:"crop";s:15:"showDescription";s:4:"true";s:15:"hideDescription";s:4:"true";s:27:"preserveSlideshowDimensions";s:5:"false";s:20:"enableResponsiveness";s:4:"true";s:4:"play";s:4:"true";s:4:"loop";s:4:"true";s:12:"pauseOnHover";s:4:"true";s:12:"controllable";s:4:"true";s:21:"hideNavigationButtons";s:5:"false";s:14:"showPagination";s:4:"true";s:14:"hidePagination";s:4:"true";s:12:"controlPanel";s:5:"false";s:16:"hideControlPanel";s:4:"true";s:15:"waitUntilLoaded";s:4:"true";s:15:"showLoadingIcon";s:4:"true";s:6:"random";s:5:"false";s:11:"avoidFilter";s:4:"true";}'),
(576, 125, 'styleSettings', 'a:1:{s:5:"style";s:15:"style-light.css";}'),
(577, 125, 'slides', 'a:6:{i:1;a:9:{s:17:"titleElementTagID";s:1:"0";s:5:"title";s:8:"Imatge 1";s:23:"descriptionElementTagID";s:1:"0";s:11:"description";s:20:"Descripció imatge 1";s:3:"url";s:0:"";s:9:"urlTarget";s:5:"_self";s:15:"alternativeText";s:0:"";s:4:"type";s:10:"attachment";s:6:"postId";s:3:"128";}i:2;a:9:{s:17:"titleElementTagID";s:1:"0";s:5:"title";s:6:"Text 1";s:23:"descriptionElementTagID";s:1:"0";s:11:"description";s:54:"Els carrusels poden incloure imatges, vídeos i textos";s:9:"textColor";s:7:"#ffffff";s:5:"color";s:7:"#1e73be";s:3:"url";s:0:"";s:9:"urlTarget";s:5:"_self";s:4:"type";s:4:"text";}i:3;a:9:{s:17:"titleElementTagID";s:1:"0";s:5:"title";s:8:"Imatge 2";s:23:"descriptionElementTagID";s:1:"0";s:11:"description";s:20:"Descripció imatge 2";s:3:"url";s:0:"";s:9:"urlTarget";s:5:"_self";s:15:"alternativeText";s:0:"";s:4:"type";s:10:"attachment";s:6:"postId";s:3:"127";}i:4;a:3:{s:7:"videoId";s:11:"ygwGTiGFGi0";s:17:"showRelatedVideos";s:5:"false";s:4:"type";s:5:"video";}i:5;a:9:{s:17:"titleElementTagID";s:1:"0";s:5:"title";s:8:"Imatge 3";s:23:"descriptionElementTagID";s:1:"0";s:11:"description";s:20:"Descripció imatge 3";s:3:"url";s:0:"";s:9:"urlTarget";s:5:"_self";s:15:"alternativeText";s:0:"";s:4:"type";s:10:"attachment";s:6:"postId";s:3:"126";}i:6;a:9:{s:17:"titleElementTagID";s:1:"0";s:5:"title";s:8:"Imatge 4";s:23:"descriptionElementTagID";s:1:"0";s:11:"description";s:20:"Descripció imatge 4";s:3:"url";s:0:"";s:9:"urlTarget";s:5:"_self";s:15:"alternativeText";s:0:"";s:4:"type";s:10:"attachment";s:6:"postId";s:3:"102";}}'),
(578, 126, '_wp_attached_file', '2014/09/exemple3.png'),
(579, 126, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:800;s:6:"height";i:600;s:4:"file";s:20:"2014/09/exemple3.png";s:5:"sizes";a:4:{s:9:"thumbnail";a:4:{s:4:"file";s:20:"exemple3-150x150.png";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}s:6:"medium";a:4:{s:4:"file";s:20:"exemple3-300x225.png";s:5:"width";i:300;s:6:"height";i:225;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-300";a:4:{s:4:"file";s:20:"exemple3-300x250.png";s:5:"width";i:300;s:6:"height";i:250;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-200";a:4:{s:4:"file";s:20:"exemple3-200x150.png";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}}s:10:"image_meta";a:10:{s:8:"aperture";i:0;s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";i:0;s:9:"copyright";s:0:"";s:12:"focal_length";i:0;s:3:"iso";i:0;s:13:"shutter_speed";i:0;s:5:"title";s:0:"";}}'),
(580, 127, '_wp_attached_file', '2014/09/imatge_recurs1.png'),
(581, 127, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:180;s:6:"height";i:90;s:4:"file";s:26:"2014/09/imatge_recurs1.png";s:5:"sizes";a:1:{s:9:"thumbnail";a:4:{s:4:"file";s:25:"imatge_recurs1-150x90.png";s:5:"width";i:150;s:6:"height";i:90;s:9:"mime-type";s:9:"image/png";}}s:10:"image_meta";a:10:{s:8:"aperture";i:0;s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";i:0;s:9:"copyright";s:0:"";s:12:"focal_length";i:0;s:3:"iso";i:0;s:13:"shutter_speed";i:0;s:5:"title";s:0:"";}}'),
(582, 128, '_wp_attached_file', '2014/09/exemple3b.png'),
(583, 128, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:800;s:6:"height";i:600;s:4:"file";s:21:"2014/09/exemple3b.png";s:5:"sizes";a:4:{s:9:"thumbnail";a:4:{s:4:"file";s:21:"exemple3b-150x150.png";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}s:6:"medium";a:4:{s:4:"file";s:21:"exemple3b-300x225.png";s:5:"width";i:300;s:6:"height";i:225;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-300";a:4:{s:4:"file";s:21:"exemple3b-300x250.png";s:5:"width";i:300;s:6:"height";i:250;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-200";a:4:{s:4:"file";s:21:"exemple3b-200x150.png";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}}s:10:"image_meta";a:10:{s:8:"aperture";i:0;s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";i:0;s:9:"copyright";s:0:"";s:12:"focal_length";i:0;s:3:"iso";i:0;s:13:"shutter_speed";i:0;s:5:"title";s:0:"";}}'),
(588, 115, '_thumbnail_id', '107'),
(593, 107, '_edit_lock', '1411378617:2'),
(594, 131, '_wp_attached_file', '2014/09/classe.png'),
(595, 131, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:1194;s:6:"height";i:427;s:4:"file";s:18:"2014/09/classe.png";s:5:"sizes";a:5:{s:9:"thumbnail";a:4:{s:4:"file";s:18:"classe-150x150.png";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}s:6:"medium";a:4:{s:4:"file";s:18:"classe-300x107.png";s:5:"width";i:300;s:6:"height";i:107;s:9:"mime-type";s:9:"image/png";}s:5:"large";a:4:{s:4:"file";s:19:"classe-1024x366.png";s:5:"width";i:1024;s:6:"height";i:366;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-300";a:4:{s:4:"file";s:18:"classe-300x250.png";s:5:"width";i:300;s:6:"height";i:250;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-200";a:4:{s:4:"file";s:18:"classe-200x150.png";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}}s:10:"image_meta";a:10:{s:8:"aperture";i:0;s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";i:0;s:9:"copyright";s:0:"";s:12:"focal_length";i:0;s:3:"iso";i:0;s:13:"shutter_speed";i:0;s:5:"title";s:0:"";}}'),
(596, 131, '_wp_attachment_image_alt', 'By ChinaFlag (Own work) [Public domain], via Wikimedia Commons'),
(605, 5, '_edit_lock', '1445936651:2'),
(609, 133, '_wp_attached_file', '2014/09/albertbachiller.png'),
(610, 133, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:1244;s:6:"height";i:269;s:4:"file";s:27:"2014/09/albertbachiller.png";s:5:"sizes";a:5:{s:9:"thumbnail";a:4:{s:4:"file";s:27:"albertbachiller-150x150.png";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}s:6:"medium";a:4:{s:4:"file";s:26:"albertbachiller-300x64.png";s:5:"width";i:300;s:6:"height";i:64;s:9:"mime-type";s:9:"image/png";}s:5:"large";a:4:{s:4:"file";s:28:"albertbachiller-1024x221.png";s:5:"width";i:1024;s:6:"height";i:221;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-300";a:4:{s:4:"file";s:27:"albertbachiller-300x250.png";s:5:"width";i:300;s:6:"height";i:250;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-200";a:4:{s:4:"file";s:27:"albertbachiller-200x150.png";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}}s:10:"image_meta";a:10:{s:8:"aperture";i:0;s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";i:0;s:9:"copyright";s:0:"";s:12:"focal_length";i:0;s:3:"iso";i:0;s:13:"shutter_speed";i:0;s:5:"title";s:0:"";}}'),
(611, 133, '_wp_attachment_image_alt', 'Il·lustració per Albert Bachiller'),
(623, 139, '_wp_attached_file', '2014/09/screeshot.png'),
(624, 139, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:524;s:6:"height";i:392;s:4:"file";s:21:"2014/09/screeshot.png";s:5:"sizes";a:4:{s:9:"thumbnail";a:4:{s:4:"file";s:21:"screeshot-150x150.png";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}s:6:"medium";a:4:{s:4:"file";s:21:"screeshot-300x224.png";s:5:"width";i:300;s:6:"height";i:224;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-300";a:4:{s:4:"file";s:21:"screeshot-300x250.png";s:5:"width";i:300;s:6:"height";i:250;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-200";a:4:{s:4:"file";s:21:"screeshot-200x150.png";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}}s:10:"image_meta";a:10:{s:8:"aperture";i:0;s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";i:0;s:9:"copyright";s:0:"";s:12:"focal_length";i:0;s:3:"iso";i:0;s:13:"shutter_speed";i:0;s:5:"title";s:0:"";}}'),
(625, 140, '_edit_lock', '1411402131:2'),
(626, 140, '_edit_last', '2'),
(627, 140, 'settings', 'a:26:{s:9:"animation";s:5:"slide";s:10:"slideSpeed";s:1:"1";s:16:"descriptionSpeed";s:3:"0.4";s:13:"intervalSpeed";s:2:"20";s:13:"slidesPerView";s:1:"1";s:8:"maxWidth";s:1:"0";s:11:"aspectRatio";s:3:"3:1";s:6:"height";s:3:"200";s:14:"imageBehaviour";s:4:"crop";s:15:"showDescription";s:4:"true";s:15:"hideDescription";s:4:"true";s:27:"preserveSlideshowDimensions";s:5:"false";s:20:"enableResponsiveness";s:4:"true";s:4:"play";s:4:"true";s:4:"loop";s:4:"true";s:12:"pauseOnHover";s:4:"true";s:12:"controllable";s:4:"true";s:21:"hideNavigationButtons";s:5:"false";s:14:"showPagination";s:4:"true";s:14:"hidePagination";s:4:"true";s:12:"controlPanel";s:5:"false";s:16:"hideControlPanel";s:4:"true";s:15:"waitUntilLoaded";s:4:"true";s:15:"showLoadingIcon";s:4:"true";s:6:"random";s:5:"false";s:11:"avoidFilter";s:4:"true";}'),
(628, 140, 'styleSettings', 'a:1:{s:5:"style";s:15:"style-light.css";}'),
(629, 140, 'slides', 'a:1:{i:1;a:9:{s:17:"titleElementTagID";s:1:"0";s:5:"title";s:9:"screeshot";s:23:"descriptionElementTagID";s:1:"0";s:11:"description";s:0:"";s:3:"url";s:0:"";s:9:"urlTarget";s:5:"_self";s:15:"alternativeText";s:0:"";s:4:"type";s:10:"attachment";s:6:"postId";s:3:"139";}}'),
(642, 13, '_oembed_a47471043cf1f80e92ecf21d41f541f0', '<iframe width="500" height="400" scrolling="no" frameborder="no" src="https://w.soundcloud.com/player/?visual=true&url=http%3A%2F%2Fapi.soundcloud.com%2Ftracks%2F138433301&show_artwork=true&maxwidth=500&maxheight=750"></iframe>'),
(647, 142, '_edit_lock', '1411407406:1'),
(648, 142, '_edit_last', '1'),
(649, 142, 'settings', 'a:26:{s:9:"animation";s:5:"slide";s:10:"slideSpeed";s:1:"1";s:16:"descriptionSpeed";s:3:"0.4";s:13:"intervalSpeed";s:2:"10";s:13:"slidesPerView";s:1:"2";s:8:"maxWidth";s:1:"0";s:11:"aspectRatio";s:3:"3:1";s:6:"height";s:3:"200";s:14:"imageBehaviour";s:4:"crop";s:15:"showDescription";s:4:"true";s:15:"hideDescription";s:4:"true";s:27:"preserveSlideshowDimensions";s:5:"false";s:20:"enableResponsiveness";s:4:"true";s:4:"play";s:4:"true";s:4:"loop";s:4:"true";s:12:"pauseOnHover";s:4:"true";s:12:"controllable";s:4:"true";s:21:"hideNavigationButtons";s:5:"false";s:14:"showPagination";s:4:"true";s:14:"hidePagination";s:4:"true";s:12:"controlPanel";s:5:"false";s:16:"hideControlPanel";s:4:"true";s:15:"waitUntilLoaded";s:4:"true";s:15:"showLoadingIcon";s:4:"true";s:6:"random";s:5:"false";s:11:"avoidFilter";s:4:"true";}'),
(650, 142, 'styleSettings', 'a:1:{s:5:"style";s:15:"style-light.css";}'),
(651, 142, 'slides', 'a:3:{i:1;a:9:{s:17:"titleElementTagID";s:1:"0";s:5:"title";s:8:"Imatge 1";s:23:"descriptionElementTagID";s:1:"0";s:11:"description";s:0:"";s:3:"url";s:0:"";s:9:"urlTarget";s:5:"_self";s:15:"alternativeText";s:0:"";s:4:"type";s:10:"attachment";s:6:"postId";s:3:"102";}i:2;a:9:{s:17:"titleElementTagID";s:1:"0";s:5:"title";s:8:"Imatge 2";s:23:"descriptionElementTagID";s:1:"0";s:11:"description";s:0:"";s:3:"url";s:0:"";s:9:"urlTarget";s:5:"_self";s:15:"alternativeText";s:0:"";s:4:"type";s:10:"attachment";s:6:"postId";s:3:"126";}i:3;a:9:{s:17:"titleElementTagID";s:1:"0";s:5:"title";s:8:"Imatge 3";s:23:"descriptionElementTagID";s:1:"0";s:11:"description";s:0:"";s:3:"url";s:0:"";s:9:"urlTarget";s:5:"_self";s:15:"alternativeText";s:0:"";s:4:"type";s:10:"attachment";s:6:"postId";s:3:"128";}}'),
(666, 145, 'gce_feed_url', 'xtec.cat_d8jr0i0n3n9patiiq361c5oicc@group.calendar.google.com'),
(667, 145, 'gce_retrieve_from', 'today'),
(668, 145, 'gce_retrieve_until', 'end_time'),
(669, 145, 'gce_retrieve_max', '25'),
(672, 145, 'gce_cache', '300'),
(673, 145, 'gce_multi_day_events', '1'),
(674, 145, 'gce_display_mode', 'grid'),
(677, 145, 'old_gce_id', '1'),
(679, 145, 'gce_expand_recurring', '1'),
(680, 145, 'gce_paging', '1'),
(681, 145, 'gce_list_max_num', '7'),
(682, 145, 'gce_list_max_length', 'days'),
(684, 145, 'gce_list_start_offset_direction', 'back'),
(690, 145, 'gce_feed_start', 'months'),
(691, 145, 'gce_feed_start_interval', 'months'),
(692, 145, 'gce_feed_end', 'years'),
(693, 145, 'gce_feed_end_interval', 'years'),
(704, 145, '_edit_lock', '1433408164:2'),
(705, 145, '_edit_last', '2'),
(706, 145, 'gce_display_start', 'none'),
(707, 145, 'gce_display_end', 'none'),
(709, 145, 'gce_widget_paging_interval', '604800'),
(728, 148, '_menu_item_type', 'taxonomy'),
(729, 148, '_menu_item_menu_item_parent', '92'),
(730, 148, '_menu_item_object_id', '2'),
(731, 148, '_menu_item_object', 'category'),
(732, 148, '_menu_item_target', ''),
(733, 148, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(734, 148, '_menu_item_xfn', ''),
(735, 148, '_menu_item_url', ''),
(737, 149, '_menu_item_type', 'taxonomy'),
(738, 149, '_menu_item_menu_item_parent', '92'),
(739, 149, '_menu_item_object_id', '5'),
(740, 149, '_menu_item_object', 'category'),
(741, 149, '_menu_item_target', ''),
(742, 149, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(743, 149, '_menu_item_xfn', ''),
(744, 149, '_menu_item_url', ''),
(749, 150, '_menu_item_type', 'custom'),
(750, 150, '_menu_item_menu_item_parent', '0'),
(751, 150, '_menu_item_object_id', '150'),
(752, 150, '_menu_item_object', 'custom'),
(753, 150, '_menu_item_target', ''),
(754, 150, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(755, 150, '_menu_item_xfn', ''),
(756, 150, '_menu_item_url', '#'),
(758, 151, '_menu_item_type', 'custom'),
(759, 151, '_menu_item_menu_item_parent', '0'),
(760, 151, '_menu_item_object_id', '151'),
(761, 151, '_menu_item_object', 'custom'),
(762, 151, '_menu_item_target', ''),
(763, 151, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(764, 151, '_menu_item_xfn', ''),
(765, 151, '_menu_item_url', '#'),
(767, 152, '_menu_item_type', 'custom'),
(768, 152, '_menu_item_menu_item_parent', '0'),
(769, 152, '_menu_item_object_id', '152'),
(770, 152, '_menu_item_object', 'custom'),
(771, 152, '_menu_item_target', ''),
(772, 152, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(773, 152, '_menu_item_xfn', ''),
(774, 152, '_menu_item_url', '#'),
(776, 153, '_menu_item_type', 'custom'),
(777, 153, '_menu_item_menu_item_parent', '0'),
(778, 153, '_menu_item_object_id', '153'),
(779, 153, '_menu_item_object', 'custom'),
(780, 153, '_menu_item_target', ''),
(781, 153, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(782, 153, '_menu_item_xfn', ''),
(783, 153, '_menu_item_url', '#'),
(785, 154, '_menu_item_type', 'custom'),
(786, 154, '_menu_item_menu_item_parent', '0'),
(787, 154, '_menu_item_object_id', '154'),
(788, 154, '_menu_item_object', 'custom'),
(789, 154, '_menu_item_target', ''),
(790, 154, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(791, 154, '_menu_item_xfn', ''),
(792, 154, '_menu_item_url', '#'),
(794, 155, '_menu_item_type', 'custom'),
(795, 155, '_menu_item_menu_item_parent', '0'),
(796, 155, '_menu_item_object_id', '155'),
(797, 155, '_menu_item_object', 'custom'),
(798, 155, '_menu_item_target', ''),
(799, 155, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(800, 155, '_menu_item_xfn', ''),
(801, 155, '_menu_item_url', '#'),
(803, 156, '_wp_attached_file', '2015/01/foto-classe.png'),
(804, 156, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:640;s:6:"height";i:469;s:4:"file";s:23:"2015/01/foto-classe.png";s:5:"sizes";a:4:{s:9:"thumbnail";a:4:{s:4:"file";s:23:"foto-classe-150x150.png";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}s:6:"medium";a:4:{s:4:"file";s:23:"foto-classe-300x219.png";s:5:"width";i:300;s:6:"height";i:219;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-300";a:4:{s:4:"file";s:23:"foto-classe-300x250.png";s:5:"width";i:300;s:6:"height";i:250;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-200";a:4:{s:4:"file";s:23:"foto-classe-200x150.png";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}}s:10:"image_meta";a:11:{s:8:"aperture";i:0;s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";i:0;s:9:"copyright";s:0:"";s:12:"focal_length";i:0;s:3:"iso";i:0;s:13:"shutter_speed";i:0;s:5:"title";s:0:"";s:11:"orientation";i:0;}}'),
(809, 157, '_menu_item_type', 'taxonomy'),
(810, 157, '_menu_item_menu_item_parent', '0'),
(811, 157, '_menu_item_object_id', '8'),
(812, 157, '_menu_item_object', 'category'),
(813, 157, '_menu_item_target', ''),
(814, 157, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(815, 157, '_menu_item_xfn', ''),
(816, 157, '_menu_item_url', ''),
(818, 158, '_menu_item_type', 'taxonomy'),
(819, 158, '_menu_item_menu_item_parent', '0'),
(820, 158, '_menu_item_object_id', '3'),
(821, 158, '_menu_item_object', 'category'),
(822, 158, '_menu_item_target', ''),
(823, 158, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(824, 158, '_menu_item_xfn', ''),
(825, 158, '_menu_item_url', ''),
(827, 159, '_menu_item_type', 'taxonomy'),
(828, 159, '_menu_item_menu_item_parent', '0'),
(829, 159, '_menu_item_object_id', '9'),
(830, 159, '_menu_item_object', 'category'),
(831, 159, '_menu_item_target', ''),
(832, 159, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(833, 159, '_menu_item_xfn', ''),
(834, 159, '_menu_item_url', ''),
(836, 160, '_menu_item_type', 'taxonomy'),
(837, 160, '_menu_item_menu_item_parent', '0'),
(838, 160, '_menu_item_object_id', '10'),
(839, 160, '_menu_item_object', 'category'),
(840, 160, '_menu_item_target', ''),
(841, 160, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(842, 160, '_menu_item_xfn', ''),
(843, 160, '_menu_item_url', ''),
(845, 161, '_menu_item_type', 'taxonomy'),
(846, 161, '_menu_item_menu_item_parent', '0'),
(847, 161, '_menu_item_object_id', '11'),
(848, 161, '_menu_item_object', 'category'),
(849, 161, '_menu_item_target', ''),
(850, 161, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(851, 161, '_menu_item_xfn', ''),
(852, 161, '_menu_item_url', ''),
(854, 162, '_menu_item_type', 'taxonomy'),
(855, 162, '_menu_item_menu_item_parent', '0'),
(856, 162, '_menu_item_object_id', '13'),
(857, 162, '_menu_item_object', 'category'),
(858, 162, '_menu_item_target', ''),
(859, 162, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(860, 162, '_menu_item_xfn', ''),
(861, 162, '_menu_item_url', ''),
(863, 163, '_menu_item_type', 'taxonomy'),
(864, 163, '_menu_item_menu_item_parent', '0'),
(865, 163, '_menu_item_object_id', '12'),
(866, 163, '_menu_item_object', 'category'),
(867, 163, '_menu_item_target', ''),
(868, 163, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(869, 163, '_menu_item_xfn', ''),
(870, 163, '_menu_item_url', ''),
(872, 164, '_menu_item_type', 'taxonomy'),
(873, 164, '_menu_item_menu_item_parent', '0'),
(874, 164, '_menu_item_object_id', '14'),
(875, 164, '_menu_item_object', 'category'),
(876, 164, '_menu_item_target', ''),
(877, 164, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(878, 164, '_menu_item_xfn', ''),
(879, 164, '_menu_item_url', ''),
(881, 165, '_menu_item_type', 'taxonomy'),
(882, 165, '_menu_item_menu_item_parent', '0'),
(883, 165, '_menu_item_object_id', '15'),
(884, 165, '_menu_item_object', 'category'),
(885, 165, '_menu_item_target', ''),
(886, 165, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(887, 165, '_menu_item_xfn', ''),
(888, 165, '_menu_item_url', ''),
(893, 38, '_template_layout', '2c-l'),
(918, 145, 'gce_paging_widget', '1'),
(919, 145, 'gce_per_page_num', '7'),
(920, 145, 'gce_events_per_page', 'days'),
(921, 145, 'gce_feed_start_num', 'months'),
(922, 145, 'gce_feed_end_num', 'years'),
(923, 145, 'gce_show_tooltips', '1'),
(926, 18, '_original_size', ''),
(927, 18, '_entry_icon', 'noicon'),
(930, 13, '_original_size', ''),
(931, 13, '_entry_icon', 'noicon'),
(932, 13, '_oembed_time_a47471043cf1f80e92ecf21d41f541f0', '1445936568'),
(933, 6, '_edit_lock', '1445936714:2'),
(934, 141, '_edit_lock', '1445936637:2'),
(935, 2, '_edit_lock', '1438070564:2'),
(936, 2, '_edit_last', '2'),
(937, 2, '_template_layout', '2c-l'),
(938, 71, '_template_layout', '2c-l'),
(939, 173, '_menu_item_type', 'post_type'),
(940, 173, '_menu_item_menu_item_parent', '0'),
(941, 173, '_menu_item_object_id', '5'),
(942, 173, '_menu_item_object', 'page'),
(943, 173, '_menu_item_target', ''),
(944, 173, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(945, 173, '_menu_item_xfn', ''),
(946, 173, '_menu_item_url', ''),
(948, 174, '_menu_item_type', 'post_type'),
(949, 174, '_menu_item_menu_item_parent', '0'),
(950, 174, '_menu_item_object_id', '6'),
(951, 174, '_menu_item_object', 'page'),
(952, 174, '_menu_item_target', ''),
(953, 174, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(954, 174, '_menu_item_xfn', ''),
(955, 174, '_menu_item_url', ''),
(957, 175, '_menu_item_type', 'post_type'),
(958, 175, '_menu_item_menu_item_parent', '0'),
(959, 175, '_menu_item_object_id', '141'),
(960, 175, '_menu_item_object', 'page'),
(961, 175, '_menu_item_target', ''),
(962, 175, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(963, 175, '_menu_item_xfn', ''),
(964, 175, '_menu_item_url', ''),
(970, 141, '_edit_last', '2'),
(971, 5, '_edit_last', '2'),
(972, 6, '_edit_last', '2'),
(975, 292, 'bp_docs_last_editor', '2'),
(976, 292, 'bp_docs_settings', 'a:5:{s:4:"read";s:13:"group-members";s:4:"edit";s:13:"group-members";s:13:"read_comments";s:13:"group-members";s:13:"post_comments";s:13:"group-members";s:12:"view_history";s:13:"group-members";}'),
(977, 292, 'bp_docs_revision_count', '3'),
(981, 297, 'bp_docs_last_editor', '2'),
(982, 297, 'bp_docs_settings', 'a:5:{s:4:"read";s:13:"group-members";s:4:"edit";s:13:"group-members";s:13:"read_comments";s:13:"group-members";s:13:"post_comments";s:13:"group-members";s:12:"view_history";s:13:"group-members";}'),
(983, 297, 'bp_docs_revision_count', '2'),
(988, 302, 'bp_docs_last_editor', '2'),
(989, 302, 'bp_docs_settings', 'a:5:{s:4:"read";s:13:"group-members";s:4:"edit";s:13:"group-members";s:13:"read_comments";s:13:"group-members";s:13:"post_comments";s:13:"group-members";s:12:"view_history";s:13:"group-members";}'),
(990, 302, 'bp_docs_revision_count', '3'),
(991, 304, 'bp_docs_last_editor', '2'),
(992, 304, 'bp_docs_settings', 'a:5:{s:4:"read";s:13:"group-members";s:4:"edit";s:13:"group-members";s:13:"read_comments";s:13:"group-members";s:13:"post_comments";s:13:"group-members";s:12:"view_history";s:13:"group-members";}'),
(993, 304, 'bp_docs_revision_count', '4'),
(997, 308, 'bp_docs_last_editor', '2'),
(998, 308, 'bp_docs_settings', 'a:5:{s:4:"read";s:13:"group-members";s:4:"edit";s:13:"group-members";s:13:"read_comments";s:13:"group-members";s:13:"post_comments";s:13:"group-members";s:12:"view_history";s:13:"group-members";}'),
(999, 308, 'bp_docs_revision_count', '4'),
(1000, 312, 'bp_docs_last_editor', '2'),
(1001, 312, 'bp_docs_settings', 'a:5:{s:4:"read";s:13:"group-members";s:4:"edit";s:13:"group-members";s:13:"read_comments";s:13:"group-members";s:13:"post_comments";s:13:"group-members";s:12:"view_history";s:13:"group-members";}'),
(1002, 312, 'bp_docs_revision_count', '2'),
(1003, 314, 'bp_docs_last_editor', '2'),
(1004, 314, 'bp_docs_settings', 'a:5:{s:4:"read";s:13:"group-members";s:4:"edit";s:13:"group-members";s:13:"read_comments";s:13:"group-members";s:13:"post_comments";s:13:"group-members";s:12:"view_history";s:13:"group-members";}'),
(1005, 314, 'bp_docs_revision_count', '2'),
(1006, 317, 'bp_docs_last_editor', '2'),
(1007, 317, 'bp_docs_settings', 'a:5:{s:4:"read";s:13:"group-members";s:4:"edit";s:13:"group-members";s:13:"read_comments";s:13:"group-members";s:13:"post_comments";s:13:"group-members";s:12:"view_history";s:13:"group-members";}'),
(1008, 317, 'bp_docs_revision_count', '3'),
(1009, 318, 'bp_docs_last_editor', '2'),
(1010, 318, 'bp_docs_settings', 'a:5:{s:4:"read";s:13:"group-members";s:4:"edit";s:13:"group-members";s:13:"read_comments";s:13:"group-members";s:13:"post_comments";s:13:"group-members";s:12:"view_history";s:13:"group-members";}'),
(1011, 318, 'bp_docs_revision_count', '2'),
(1013, 320, 'bp_docs_last_editor', '2'),
(1014, 320, 'bp_docs_settings', 'a:5:{s:4:"read";s:13:"group-members";s:4:"edit";s:13:"group-members";s:13:"read_comments";s:13:"group-members";s:13:"post_comments";s:13:"group-members";s:12:"view_history";s:13:"group-members";}'),
(1015, 320, 'bp_docs_revision_count', '2'),
(1016, 323, 'bp_docs_last_editor', '2'),
(1017, 323, 'bp_docs_settings', 'a:5:{s:4:"read";s:13:"group-members";s:4:"edit";s:13:"group-members";s:13:"read_comments";s:13:"group-members";s:13:"post_comments";s:13:"group-members";s:12:"view_history";s:13:"group-members";}'),
(1018, 323, 'bp_docs_revision_count', '4'),
(1019, 326, 'bp_docs_last_editor', '2'),
(1020, 326, 'bp_docs_settings', 'a:5:{s:4:"read";s:13:"group-members";s:4:"edit";s:13:"group-members";s:13:"read_comments";s:13:"group-members";s:13:"post_comments";s:13:"group-members";s:12:"view_history";s:13:"group-members";}'),
(1021, 326, 'bp_docs_revision_count', '2'),
(1022, 328, 'bp_docs_last_editor', '2'),
(1023, 328, 'bp_docs_settings', 'a:5:{s:4:"read";s:13:"group-members";s:4:"edit";s:13:"group-members";s:13:"read_comments";s:13:"group-members";s:13:"post_comments";s:13:"group-members";s:12:"view_history";s:13:"group-members";}'),
(1024, 328, 'bp_docs_revision_count', '3'),
(1025, 330, 'bp_docs_last_editor', '2'),
(1026, 330, 'bp_docs_settings', 'a:5:{s:4:"read";s:13:"group-members";s:4:"edit";s:13:"group-members";s:13:"read_comments";s:13:"group-members";s:13:"post_comments";s:13:"group-members";s:12:"view_history";s:13:"group-members";}'),
(1027, 330, 'bp_docs_revision_count', '2'),
(1028, 332, 'bp_docs_last_editor', '2'),
(1029, 332, 'bp_docs_settings', 'a:5:{s:4:"read";s:13:"group-members";s:4:"edit";s:13:"group-members";s:13:"read_comments";s:13:"group-members";s:13:"post_comments";s:13:"group-members";s:12:"view_history";s:13:"group-members";}'),
(1030, 332, 'bp_docs_revision_count', '2'),
(1031, 334, 'bp_docs_last_editor', '2'),
(1032, 334, 'bp_docs_settings', 'a:5:{s:4:"read";s:13:"group-members";s:4:"edit";s:13:"group-members";s:13:"read_comments";s:13:"group-members";s:13:"post_comments";s:13:"group-members";s:12:"view_history";s:13:"group-members";}'),
(1033, 334, 'bp_docs_revision_count', '2'),
(1034, 336, 'bp_docs_last_editor', '1'),
(1035, 336, 'bp_docs_settings', 'a:5:{s:4:"read";s:6:"anyone";s:4:"edit";s:8:"loggedin";s:13:"read_comments";s:6:"anyone";s:13:"post_comments";s:8:"loggedin";s:12:"view_history";s:6:"anyone";}'),
(1036, 336, 'bp_docs_revision_count', '1'),
(1037, 338, 'bp_docs_last_editor', '1'),
(1038, 338, 'bp_docs_settings', 'a:5:{s:4:"read";s:6:"anyone";s:4:"edit";s:8:"loggedin";s:13:"read_comments";s:6:"anyone";s:13:"post_comments";s:8:"loggedin";s:12:"view_history";s:6:"anyone";}'),
(1039, 338, 'bp_docs_revision_count', '1'),
(1040, 339, 'bp_docs_last_editor', '2'),
(1041, 339, 'bp_docs_settings', 'a:5:{s:4:"read";s:13:"group-members";s:4:"edit";s:13:"group-members";s:13:"read_comments";s:13:"group-members";s:13:"post_comments";s:13:"group-members";s:12:"view_history";s:13:"group-members";}'),
(1042, 339, 'bp_docs_revision_count', '3'),
(1049, 348, 'bp_docs_last_editor', '2'),
(1050, 348, 'bp_docs_settings', 'a:5:{s:4:"read";s:13:"group-members";s:4:"edit";s:13:"group-members";s:13:"read_comments";s:13:"group-members";s:13:"post_comments";s:13:"group-members";s:12:"view_history";s:13:"group-members";}'),
(1051, 348, 'bp_docs_revision_count', '2'),
(1052, 350, 'bp_docs_last_editor', '2'),
(1053, 350, 'bp_docs_settings', 'a:5:{s:4:"read";s:13:"group-members";s:4:"edit";s:13:"group-members";s:13:"read_comments";s:13:"group-members";s:13:"post_comments";s:13:"group-members";s:12:"view_history";s:13:"group-members";}'),
(1054, 350, 'bp_docs_revision_count', '2'),
(1055, 352, 'bp_docs_last_editor', '2'),
(1056, 352, 'bp_docs_settings', 'a:5:{s:4:"read";s:13:"group-members";s:4:"edit";s:13:"group-members";s:13:"read_comments";s:13:"group-members";s:13:"post_comments";s:13:"group-members";s:12:"view_history";s:13:"group-members";}'),
(1057, 352, 'bp_docs_revision_count', '2'),
(1058, 354, 'bp_docs_last_editor', '2'),
(1059, 354, 'bp_docs_settings', 'a:5:{s:4:"read";s:13:"group-members";s:4:"edit";s:13:"group-members";s:13:"read_comments";s:13:"group-members";s:13:"post_comments";s:13:"group-members";s:12:"view_history";s:13:"group-members";}'),
(1060, 354, 'bp_docs_revision_count', '6'),
(1061, 356, 'bp_docs_last_editor', '2'),
(1062, 356, 'bp_docs_settings', 'a:5:{s:4:"read";s:13:"group-members";s:4:"edit";s:13:"group-members";s:13:"read_comments";s:13:"group-members";s:13:"post_comments";s:13:"group-members";s:12:"view_history";s:13:"group-members";}'),
(1063, 356, 'bp_docs_revision_count', '5'),
(1064, 358, 'bp_docs_last_editor', '2'),
(1065, 358, 'bp_docs_settings', 'a:5:{s:4:"read";s:13:"group-members";s:4:"edit";s:13:"group-members";s:13:"read_comments";s:13:"group-members";s:13:"post_comments";s:13:"group-members";s:12:"view_history";s:13:"group-members";}'),
(1066, 358, 'bp_docs_revision_count', '7'),
(1067, 360, 'bp_docs_last_editor', '2'),
(1068, 360, 'bp_docs_settings', 'a:5:{s:4:"read";s:13:"group-members";s:4:"edit";s:13:"group-members";s:13:"read_comments";s:13:"group-members";s:13:"post_comments";s:13:"group-members";s:12:"view_history";s:13:"group-members";}'),
(1069, 360, 'bp_docs_revision_count', '5'),
(1070, 362, 'bp_docs_last_editor', '2'),
(1071, 362, 'bp_docs_settings', 'a:5:{s:4:"read";s:13:"group-members";s:4:"edit";s:13:"group-members";s:13:"read_comments";s:13:"group-members";s:13:"post_comments";s:13:"group-members";s:12:"view_history";s:13:"group-members";}'),
(1072, 362, 'bp_docs_revision_count', '3'),
(1073, 364, 'bp_docs_last_editor', '2'),
(1074, 364, 'bp_docs_settings', 'a:5:{s:4:"read";s:13:"group-members";s:4:"edit";s:13:"group-members";s:13:"read_comments";s:13:"group-members";s:13:"post_comments";s:13:"group-members";s:12:"view_history";s:13:"group-members";}'),
(1075, 364, 'bp_docs_revision_count', '4'),
(1076, 366, 'bp_docs_last_editor', '2'),
(1077, 366, 'bp_docs_settings', 'a:5:{s:4:"read";s:13:"group-members";s:4:"edit";s:13:"group-members";s:13:"read_comments";s:13:"group-members";s:13:"post_comments";s:13:"group-members";s:12:"view_history";s:13:"group-members";}'),
(1078, 366, 'bp_docs_revision_count', '2'),
(1085, 379, 'bp_docs_last_editor', '2');
INSERT INTO `wp_postmeta` (`meta_id`, `post_id`, `meta_key`, `meta_value`) VALUES
(1086, 379, 'bp_docs_settings', 'a:5:{s:4:"read";s:13:"group-members";s:4:"edit";s:13:"group-members";s:13:"read_comments";s:13:"group-members";s:13:"post_comments";s:13:"group-members";s:12:"view_history";s:13:"group-members";}'),
(1087, 379, 'bp_docs_revision_count', '10'),
(1088, 379, '_edit_last', '1'),
(1090, 383, 'bp_docs_last_editor', '2'),
(1091, 383, 'bp_docs_settings', 'a:5:{s:4:"read";s:13:"group-members";s:4:"edit";s:13:"group-members";s:13:"read_comments";s:13:"group-members";s:13:"post_comments";s:13:"group-members";s:12:"view_history";s:13:"group-members";}'),
(1092, 383, 'bp_docs_revision_count', '2'),
(1093, 385, 'bp_docs_last_editor', '2'),
(1094, 385, 'bp_docs_settings', 'a:5:{s:4:"read";s:13:"group-members";s:4:"edit";s:13:"group-members";s:13:"read_comments";s:13:"group-members";s:13:"post_comments";s:13:"group-members";s:12:"view_history";s:13:"group-members";}'),
(1095, 385, 'bp_docs_revision_count', '3'),
(1096, 387, 'bp_docs_last_editor', '2'),
(1097, 387, 'bp_docs_settings', 'a:5:{s:4:"read";s:13:"group-members";s:4:"edit";s:13:"group-members";s:13:"read_comments";s:13:"group-members";s:13:"post_comments";s:13:"group-members";s:12:"view_history";s:13:"group-members";}'),
(1098, 387, 'bp_docs_revision_count', '13'),
(1121, 391, 'bp_docs_last_editor', '2'),
(1122, 391, 'bp_docs_settings', 'a:5:{s:4:"read";s:13:"group-members";s:4:"edit";s:13:"group-members";s:13:"read_comments";s:13:"group-members";s:13:"post_comments";s:13:"group-members";s:12:"view_history";s:13:"group-members";}'),
(1123, 391, 'bp_docs_revision_count', '4'),
(1124, 391, '_edit_last', '1'),
(1143, 387, '_bp_docs_last_pinged', '1453400833:2'),
(1144, 385, '_bp_docs_last_pinged', '1453400836:2'),
(1145, 383, '_bp_docs_last_pinged', '1453400838:2'),
(1172, 432, 'bp_docs_last_editor', '2'),
(1173, 432, 'bp_docs_settings', 'a:5:{s:4:"read";s:6:"anyone";s:4:"edit";s:7:"creator";s:13:"read_comments";s:6:"anyone";s:13:"post_comments";s:8:"loggedin";s:12:"view_history";s:6:"anyone";}'),
(1174, 432, 'bp_docs_revision_count', '2'),
(1176, 435, '_menu_item_type', 'custom'),
(1177, 435, '_menu_item_menu_item_parent', '55'),
(1178, 435, '_menu_item_object_id', '435'),
(1179, 435, '_menu_item_object', 'custom'),
(1180, 435, '_menu_item_target', ''),
(1181, 435, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(1182, 435, '_menu_item_xfn', ''),
(1183, 435, '_menu_item_url', 'http://pwc-int.educacio.intranet/agora/masterpri/docs'),
(1185, 292, '_edit_lock', '1453808277:2'),
(1186, 436, '_edit_last', '1'),
(1187, 436, '_wp_page_template', 'default'),
(1188, 436, '_template_layout', '2c-l'),
(1189, 436, '_edit_lock', '1459252171:2'),
(1190, 436, 'sharing_disabled', '1'),
(1198, 440, '_edit_last', '2'),
(1199, 440, '_wp_page_template', 'default'),
(1200, 440, '_template_layout', '2c-l'),
(1201, 440, '_edit_lock', '1459252163:2'),
(1202, 440, 'sharing_disabled', '1');

-- --------------------------------------------------------

--
-- Estructura de la taula `wp_posts`
--

CREATE TABLE `wp_posts` (
  `ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `post_author` bigint(20) unsigned NOT NULL DEFAULT '0',
  `post_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_date_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_excerpt` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'publish',
  `comment_status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'open',
  `ping_status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'open',
  `post_password` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
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
  `comment_count` bigint(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`),
  KEY `type_status_date` (`post_type`,`post_status`,`post_date`,`ID`),
  KEY `post_parent` (`post_parent`),
  KEY `post_author` (`post_author`),
  KEY `post_name` (`post_name`(191))
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=442 ;

--
-- Bolcant dades de la taula `wp_posts`
--

INSERT INTO `wp_posts` (`ID`, `post_author`, `post_date`, `post_date_gmt`, `post_content`, `post_title`, `post_excerpt`, `post_status`, `comment_status`, `ping_status`, `post_password`, `post_name`, `to_ping`, `pinged`, `post_modified`, `post_modified_gmt`, `post_content_filtered`, `post_parent`, `guid`, `menu_order`, `post_type`, `post_mime_type`, `comment_count`) VALUES
(2, 1, '2014-09-12 11:10:47', '2014-09-12 09:10:47', 'Aquesta és una pàgina d''exemple. És diferent d''una entrada del blog perquè romandrà sempre al mateix lloc i es mostrarà al menú de navegació de la pàgina web (a molts temes). La majoria de gent comença amb una pàgina quant a que els presenta als visitants potencials de la pàgina web. Podria ser quelcom com això:\r\n\r\n<blockquote>Hola a tothom! Treballo de missatger en bicicleta de dia, sóc un aspirant a actor de nit, i aquest és el meu bloc. Visc a Barcelona, tinc un gos meravellós que es diu Pep, i m''agraden les calçotades (i quedar atrapat per la pluja.)</blockquote>\r\n\r\n... o potser això:\r\n<blockquote>La companyia Enginys XYZ es va fundar el 1971, i ha proveït al públic d''enginys de qualitat des de llavors. Ubicada a Gotham City, XYZ dóna treball a més de 2.000 persones i fa tot tipus de coses impressionants per a la comunitat de Gotham.</blockquote>\r\n\r\nCom a blogaire nou o nova del WordPress, hauríeu d''anar al <a href="http://pwc-int.educacio.intranet/agora/masterpri/wp-admin/">tauler</a> per suprimir aquesta pàgina i crear-ne de noves amb el vostre contingut. A passar-ho bé!', 'Pàgina d''exemple', '', 'publish', 'closed', 'closed', '', 'pagina-exemple', '', '', '2015-07-28 09:04:04', '2015-07-28 08:04:04', '', 0, 'http://pwc-int.educacio.intranet/agora/masterpri/?page_id=2', 0, 'page', '', 0),
(5, 1, '2014-09-12 09:30:30', '2014-09-12 08:30:30', '', 'Activitat', '', 'publish', 'closed', 'closed', '', 'activitat', '', '', '2015-10-27 10:04:11', '2015-10-27 09:04:11', '', 0, 'http://pwc-int.educacio.intranet/agora/masterpri/?page_id=5', 0, 'page', '', 0),
(6, 1, '2014-09-12 09:30:30', '2014-09-12 08:30:30', '', 'Membres', '', 'publish', 'closed', 'closed', '', 'membres', '', '', '2015-10-27 10:05:14', '2015-10-27 09:05:14', '', 0, 'http://pwc-int.educacio.intranet/agora/masterpri/?page_id=6', 0, 'page', '', 0),
(7, 1, '2014-09-17 15:07:41', '2014-09-17 14:07:41', 'Pàgina mare de les pàgines d''inici', 'Pàgines d''inici', '', 'publish', 'closed', 'closed', '', 'pagines-dinici', '', '', '2015-10-27 10:05:24', '2015-10-27 09:05:24', '', 0, 'http://pwc-int.educacio.intranet/agora/masterpri/?page_id=7', 0, 'page', '', 0),
(8, 1, '2014-09-17 15:07:41', '2014-09-17 15:07:41', 'Pàgina mare de les pàgines d''inici', 'Pàgines d''inici', '', 'inherit', 'open', 'open', '', '7-revision-v1', '', '', '2014-09-17 15:07:41', '2014-09-17 15:07:41', '', 7, 'http://pwc-int.educacio.intranet/agora/masterpri/2014/09/7-revision-v1/', 0, 'revision', '', 0),
(9, 1, '2014-09-17 15:08:18', '2014-09-17 14:08:18', '', 'Pagina d''inici buida', '', 'publish', 'closed', 'closed', '', 'pagina-dinici-buida', '', '', '2015-10-27 10:05:29', '2015-10-27 09:05:29', '', 7, 'http://pwc-int.educacio.intranet/agora/masterpri/?page_id=9', 0, 'page', '', 0),
(10, 1, '2014-09-17 15:08:18', '2014-09-17 15:08:18', '', 'Pagina d''inici buida', '', 'inherit', 'open', 'open', '', '9-revision-v1', '', '', '2014-09-17 15:08:18', '2014-09-17 15:08:18', '', 9, 'http://pwc-int.educacio.intranet/agora/masterpri/2014/09/9-revision-v1/', 0, 'revision', '', 0),
(11, 1, '2014-09-18 10:50:51', '2014-09-18 10:50:51', '', 'logo-escola', '', 'inherit', 'open', 'open', '', 'logo-escola', '', '', '2014-09-18 10:50:51', '2014-09-18 10:50:51', '', 0, 'http://pwc-int.educacio.intranet/agora/masterpri/wp-content/uploads/usu6/2014/09/logo-escola.png', 0, 'attachment', 'image/png', 0),
(13, 1, '2014-09-18 11:49:40', '2014-09-18 11:49:40', 'https://soundcloud.com/institut-sabadell/sophie-message\r\n\r\nUn exemple de fitxer d''àudio disponible directament des de la targeta resum. Dins de l''article, a la caixa "Paràmetres", heu de marcar la casella "Mostra el contingut sencer".', 'Notícia 1', '', 'publish', 'open', 'open', '', 'noticia', '', '', '2015-10-27 10:02:45', '2015-10-27 09:02:45', '', 0, 'http://pwc-int.educacio.intranet/agora/masterpri/?p=13', 0, 'post', '', 0),
(17, 1, '2014-09-18 11:51:31', '2014-09-18 11:51:31', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean erat dolor, aliquet vitae ligula suscipit, bibendum malesuada augue. Aliquam sollicitudin elementum neque non ornare. Nam varius varius elementum. Vivamus placerat consectetur dolor eget ornare. Nam semper id ipsum condimentum laoreet. Proin sollicitudin elit ut ligula hendrerit, et hendrerit ante condimentum. Aliquam suscipit feugiat velit, at vehicula lorem pharetra quis.', 'Notícia 1', '', 'inherit', 'open', 'open', '', '13-revision-v1', '', '', '2014-09-18 11:51:31', '2014-09-18 11:51:31', '', 13, 'http://pwc-int.educacio.intranet/agora/masterpri/2014/09/13-revision-v1/', 0, 'revision', '', 0),
(18, 1, '2014-09-18 11:58:18', '2014-09-18 11:58:18', '<iframe src="//www.youtube.com/embed/ygwGTiGFGi0?rel=0" width="560" height="315" frameborder="0" allowfullscreen="allowfullscreen"></iframe>\r\n\r\nUn exemple de vídeo disponible directament des de la targeta resum. Dins de l’article, a la caixa “Paràmetres”, heu de marcar la casella “Mostra el contingut sencer”.', 'Notícia 2', '', 'publish', 'open', 'open', '', 'noticia-2', '', '', '2015-10-27 10:02:23', '2015-10-27 09:02:23', '', 0, 'http://pwc-int.educacio.intranet/agora/masterpri/?p=18', 0, 'post', '', 0),
(22, 1, '2014-09-18 12:19:57', '2014-09-18 11:19:57', 'Aquesta secció pot contenir totes les pàgines necessàries per a oferir una descripció general de l''escola: ubicació, història, instal·lacions, equip docent, consell escolar, pla de qualitat, calendari, salut, informacions pràctiques, normativa...\r\n\r\nEn la maqueta inicial s''inclouen algunes d''aquestes pàgines amb contingut simulat. L''administrador/a pot editar-les, eliminar-les o crear-ne de noves des del tauler. És important que a la caixa <em>Atributs</em> de les pàgines hi consti com a <em>pare/mare</em> la pàgina "<em>L''escola</em>", i que tinguin seleccionada la plantilla "<em>Menú lateral</em>".', 'L''escola', '', 'publish', 'closed', 'closed', '', 'lescola', '', '', '2015-10-27 10:04:18', '2015-10-27 09:04:18', '', 0, 'http://pwc-int.educacio.intranet/agora/masterpri/?page_id=22', 0, 'page', '', 0),
(23, 1, '2014-09-18 12:19:57', '2014-09-18 12:19:57', 'Aquesta secció pot contenir totes les pàgines necessàries per a oferir una descripció general de l''escola: ubicació, història, instal·lacions, equip docent, consell escolar, pla de qualitat, calendari, salut, informacions pràctiques, normativa...\r\n\r\nEn la maqueta inicial s''inclouen algunes d''aquestes pàgines amb contingut simulat. L''administrador/a pot editar-les, eliminar-les o crear-ne de noves des del tauler. És important que a la caixa <em>Atributs</em> de les pàgines hi consti com a <em>pare/mare</em> la pàgina "<em>L''escola</em>", i que tinguin seleccionada la plantilla "<em>Menú lateral</em>".', 'L''escola', '', 'inherit', 'open', 'open', '', '22-revision-v1', '', '', '2014-09-18 12:19:57', '2014-09-18 12:19:57', '', 22, 'http://pwc-int.educacio.intranet/agora/masterpri/2014/09/22-revision-v1/', 0, 'revision', '', 0),
(24, 1, '2014-09-18 12:23:15', '2014-09-18 11:23:15', '<p style="color: #666666;"><strong>Escola l''Arany</strong>\r\nPlaça de la Vila, 14\r\n01234 Abella de Xerta</p>\r\nTel. 901 234 567\r\nescolalarany@xtec.cat\r\n\r\n<iframe style="border: 0;" src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d95122.2542300733!2d1.53775!3d41.837547!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sca!2sus!4v1410948001907" width="600" height="450" frameborder="0"></iframe>\r\n\r\n<strong>Com arribar-hi:</strong>\r\n\r\n<strong>Tren:</strong> Estació Abella centre de la línia 1\r\n<strong>Bus:</strong> Línies L3 i L5\r\n\r\n&nbsp;', 'On som', '', 'publish', 'closed', 'closed', '', 'on-som', '', '', '2015-10-27 10:04:23', '2015-10-27 09:04:23', '', 22, 'http://pwc-int.educacio.intranet/agora/masterpri/?page_id=24', 10, 'page', '', 0),
(25, 1, '2014-09-18 12:23:15', '2014-09-18 12:23:15', '<p style="color: #666666;"><strong>Escola l''Arany</strong>\r\nPlaça de la Vila, 14\r\n01234 Abella de Xerta</p>\r\nTel. 901 234 567\r\nescolalarany@xtec.cat\r\n\r\n<iframe style="border: 0;" src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d95122.2542300733!2d1.53775!3d41.837547!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sca!2sus!4v1410948001907" width="600" height="450" frameborder="0"></iframe>\r\n\r\n<strong>Com arribar-hi:</strong>\r\n\r\n<strong>Tren:</strong> Estació Abella centre de la línia 1\r\n<strong>Bus:</strong> Línies L3 i L5\r\n\r\n&nbsp;', 'On som', '', 'inherit', 'open', 'open', '', '24-revision-v1', '', '', '2014-09-18 12:23:15', '2014-09-18 12:23:15', '', 24, 'http://pwc-int.educacio.intranet/agora/masterpri/2014/09/24-revision-v1/', 0, 'revision', '', 0),
(26, 1, '2014-09-18 12:24:32', '2014-09-18 11:24:32', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla facilisis vestibulum massa, ac porta dolor venenatis sit amet. Maecenas vel convallis nibh. Donec ut sem non arcu egestas viverra. Nam viverra ut eros id porttitor. Aliquam erat volutpat. Vivamus turpis magna, commodo quis ipsum sed, elementum maximus dui. Nam vulputate purus massa, in condimentum justo mattis ut. Sed efficitur finibus quam. Vestibulum ac dignissim purus. Cras placerat orci enim, eget volutpat enim ultricies non. Donec non diam sit amet nunc consequat faucibus eu ac arcu. Aliquam tempor at quam at porttitor. Vestibulum commodo mattis ligula, et viverra lectus mattis vitae. Donec luctus finibus purus non eleifend. Curabitur sit amet libero nunc.\r\n\r\nVestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec auctor justo id tincidunt viverra. Suspendisse potenti. Suspendisse tempor tristique lacus, sit amet imperdiet tellus porta et. Sed enim elit, ultricies vitae porta eu, dignissim ac felis. Nulla lacinia ligula suscipit consectetur vehicula. Nullam varius, nulla id facilisis tincidunt, massa lacus tincidunt velit, vitae bibendum urna nisl a arcu. Nullam tincidunt venenatis libero eu efficitur.\r\n\r\nCurabitur eget scelerisque nibh, in viverra libero. Vestibulum iaculis congue nisl ut eleifend. Fusce ultricies diam nec lobortis fringilla. Suspendisse tincidunt posuere lectus, a porttitor sem consequat ac. Pellentesque eget feugiat orci. Vivamus semper imperdiet mi a sodales. Sed posuere semper lobortis. Maecenas ut est consequat, luctus ipsum posuere, posuere tortor. Donec dictum lacus orci.\r\n\r\nNullam nunc justo, consequat non pretium id, rutrum id nisl. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Duis quis consectetur nulla. Curabitur pretium sollicitudin orci vitae egestas. Nulla facilisi. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec condimentum nibh mattis neque tempus eleifend.', 'Història', '', 'publish', 'closed', 'closed', '', 'historia', '', '', '2015-10-27 10:04:32', '2015-10-27 09:04:32', '', 22, 'http://pwc-int.educacio.intranet/agora/masterpri/?page_id=26', 20, 'page', '', 0),
(27, 1, '2014-09-18 12:24:32', '2014-09-18 12:24:32', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla facilisis vestibulum massa, ac porta dolor venenatis sit amet. Maecenas vel convallis nibh. Donec ut sem non arcu egestas viverra. Nam viverra ut eros id porttitor. Aliquam erat volutpat. Vivamus turpis magna, commodo quis ipsum sed, elementum maximus dui. Nam vulputate purus massa, in condimentum justo mattis ut. Sed efficitur finibus quam. Vestibulum ac dignissim purus. Cras placerat orci enim, eget volutpat enim ultricies non. Donec non diam sit amet nunc consequat faucibus eu ac arcu. Aliquam tempor at quam at porttitor. Vestibulum commodo mattis ligula, et viverra lectus mattis vitae. Donec luctus finibus purus non eleifend. Curabitur sit amet libero nunc.\r\n\r\nVestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec auctor justo id tincidunt viverra. Suspendisse potenti. Suspendisse tempor tristique lacus, sit amet imperdiet tellus porta et. Sed enim elit, ultricies vitae porta eu, dignissim ac felis. Nulla lacinia ligula suscipit consectetur vehicula. Nullam varius, nulla id facilisis tincidunt, massa lacus tincidunt velit, vitae bibendum urna nisl a arcu. Nullam tincidunt venenatis libero eu efficitur.\r\n\r\nCurabitur eget scelerisque nibh, in viverra libero. Vestibulum iaculis congue nisl ut eleifend. Fusce ultricies diam nec lobortis fringilla. Suspendisse tincidunt posuere lectus, a porttitor sem consequat ac. Pellentesque eget feugiat orci. Vivamus semper imperdiet mi a sodales. Sed posuere semper lobortis. Maecenas ut est consequat, luctus ipsum posuere, posuere tortor. Donec dictum lacus orci.\r\n\r\nNullam nunc justo, consequat non pretium id, rutrum id nisl. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Duis quis consectetur nulla. Curabitur pretium sollicitudin orci vitae egestas. Nulla facilisi. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec condimentum nibh mattis neque tempus eleifend.', 'Història', '', 'inherit', 'open', 'open', '', '26-revision-v1', '', '', '2014-09-18 12:24:32', '2014-09-18 12:24:32', '', 26, 'http://pwc-int.educacio.intranet/agora/masterpri/2014/09/26-revision-v1/', 0, 'revision', '', 0),
(28, 1, '2014-09-18 12:29:35', '2014-09-18 11:29:35', '<p style="color: #444444;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed nisl quam, lobortis et interdum finibus, aliquam eget ligula. Donec nec ex et leo ultrices dignissim. Suspendisse quis tortor porta, rhoncus velit sit amet, convallis est. In lobortis dignissim convallis. Integer faucibus urna at magna mattis, id accumsan lacus posuere. Quisque vitae ipsum erat. Cras varius placerat justo. Vivamus maximus finibus hendrerit. Nullam accumsan quam pulvinar odio sollicitudin feugiat. Praesent vehicula dolor mauris, in semper risus gravida quis.</p>\r\n<p style="color: #444444;">Cras vitae porta turpis. Proin pharetra ac lacus in tempor. Vestibulum ullamcorper neque quis elit faucibus, at sodales est pretium. Suspendisse ac mauris in enim eleifend porttitor. Sed quis dolor laoreet, eleifend diam non, tincidunt nisl. Nulla sed venenatis eros. Ut non neque cursus, condimentum leo consequat, tempus ligula. Nulla vel orci sed sapien tincidunt fermentum.</p>', 'Consell escolar', '', 'publish', 'closed', 'closed', '', 'consell-escolar', '', '', '2015-10-27 10:04:39', '2015-10-27 09:04:39', '', 22, 'http://pwc-int.educacio.intranet/agora/masterpri/?page_id=28', 30, 'page', '', 0),
(29, 1, '2014-09-18 12:29:35', '2014-09-18 12:29:35', '<p style="color: #444444;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed nisl quam, lobortis et interdum finibus, aliquam eget ligula. Donec nec ex et leo ultrices dignissim. Suspendisse quis tortor porta, rhoncus velit sit amet, convallis est. In lobortis dignissim convallis. Integer faucibus urna at magna mattis, id accumsan lacus posuere. Quisque vitae ipsum erat. Cras varius placerat justo. Vivamus maximus finibus hendrerit. Nullam accumsan quam pulvinar odio sollicitudin feugiat. Praesent vehicula dolor mauris, in semper risus gravida quis.</p>\r\n<p style="color: #444444;">Cras vitae porta turpis. Proin pharetra ac lacus in tempor. Vestibulum ullamcorper neque quis elit faucibus, at sodales est pretium. Suspendisse ac mauris in enim eleifend porttitor. Sed quis dolor laoreet, eleifend diam non, tincidunt nisl. Nulla sed venenatis eros. Ut non neque cursus, condimentum leo consequat, tempus ligula. Nulla vel orci sed sapien tincidunt fermentum.</p>', 'Consell escolar', '', 'inherit', 'open', 'open', '', '28-revision-v1', '', '', '2014-09-18 12:29:35', '2014-09-18 12:29:35', '', 28, 'http://pwc-int.educacio.intranet/agora/masterpri/2014/09/28-revision-v1/', 0, 'revision', '', 0),
(30, 1, '2014-09-18 12:30:23', '2014-09-18 11:30:23', 'Sed quis dolor laoreet, eleifend diam non, tincidunt nisl. Nulla sed venenatis eros. Ut non neque cursus, condimentum leo consequat, tempus ligula. Nulla vel orci sed sapien tincidunt fermentum.\r\n\r\n[slideshow_deploy id=''142'']\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce in feugiat urna, a sagittis nisl. Proin fringilla turpis sed orci ultricies commodo. Morbi ac magna pulvinar lacus feugiat placerat non eu urna. Mauris laoreet nisi tellus, vel vehicula erat ornare mollis. Pellentesque justo erat, maximus a varius vitae, suscipit vel augue. Vivamus mattis sed metus sit amet auctor. Curabitur vel enim enim. Cras cursus leo lorem, ac dictum nibh bibendum non. Maecenas ac mauris felis. Phasellus euismod luctus augue ac vehicula. Sed dignissim libero vitae consequat luctus. Maecenas quis ornare tellus. Aliquam erat volutpat.', 'Instal·lacions', '', 'publish', 'closed', 'closed', '', 'instal%c2%b7lacions', '', '', '2015-10-27 10:04:46', '2015-10-27 09:04:46', '', 22, 'http://pwc-int.educacio.intranet/agora/masterpri/?page_id=30', 40, 'page', '', 0),
(31, 1, '2014-09-18 12:30:23', '2014-09-18 12:30:23', 'Sed quis dolor laoreet, eleifend diam non, tincidunt nisl. Nulla sed venenatis eros. Ut non neque cursus, condimentum leo consequat, tempus ligula. Nulla vel orci sed sapien tincidunt fermentum.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce in feugiat urna, a sagittis nisl. Proin fringilla turpis sed orci ultricies commodo. Morbi ac magna pulvinar lacus feugiat placerat non eu urna. Mauris laoreet nisi tellus, vel vehicula erat ornare mollis. Pellentesque justo erat, maximus a varius vitae, suscipit vel augue. Vivamus mattis sed metus sit amet auctor. Curabitur vel enim enim. Cras cursus leo lorem, ac dictum nibh bibendum non. Maecenas ac mauris felis. Phasellus euismod luctus augue ac vehicula. Sed dignissim libero vitae consequat luctus. Maecenas quis ornare tellus. Aliquam erat volutpat.', 'Instal·lacions', '', 'inherit', 'open', 'open', '', '30-revision-v1', '', '', '2014-09-18 12:30:23', '2014-09-18 12:30:23', '', 30, 'http://pwc-int.educacio.intranet/agora/masterpri/2014/09/30-revision-v1/', 0, 'revision', '', 0),
(32, 1, '2014-09-18 12:31:33', '2014-09-18 11:31:33', '<h4><strong>Inici de curs:</strong></h4>\r\n15 de setembre de 2014\r\n<h4><strong>Vacances:</strong></h4>\r\nDel 24 de desembre de 2014 al 7 de gener de 2015  (ambdós inclosos)\r\n\r\nDel 28 de març al 6 d’abril de 2015 (ambdós inclosos)\r\n\r\nA partir del 20 de juny de 2015\r\n<h4><strong>Dies festius de lliure disposició:</strong></h4>\r\n3 de novembre de 2014\r\n\r\n16 de febrer de 2015\r\n\r\n22 de maig de 2015\r\n<h4><strong>Jornada compactada:</strong></h4>\r\n23 de desembre de 2014 i del 8 al 19 de juny de   2015 (ambdós inclosos)\r\n\r\nL’<b>horari lectiu</b> del centre és de 9 a 12,30 h i de 15,00 a 16,30 h per a tots els alumnes del centre. El dia 20 de desembre de 2013 i a partir del 9 de juny de 2014 es realitza horari compactat de 9 a 13h. (Els alumnes que utilitzen el servei de menjador surten a les 15:00h.)\r\n\r\nPer als alumnes que inicien l’escolarització a P3 s’organitza un breu període d’adaptació que suposa una certa modificació dels horaris dels dos primers dies de classe, i que es fa saber a les famílies en les reunions prèvies corresponents.', 'Calendari del curs', '', 'publish', 'closed', 'closed', '', 'calendari-del-curs', '', '', '2015-10-27 10:04:53', '2015-10-27 09:04:53', '', 22, 'http://pwc-int.educacio.intranet/agora/masterpri/?page_id=32', 50, 'page', '', 0),
(33, 1, '2014-09-18 12:31:33', '2014-09-18 12:31:33', '<h4><strong>Inici de curs:</strong></h4>\r\n15 de setembre de 2014\r\n<h4><strong>Vacances:</strong></h4>\r\nDel 24 de desembre de 2014 al 7 de gener de 2015  (ambdós inclosos)\r\n\r\nDel 28 de març al 6 d’abril de 2015 (ambdós inclosos)\r\n\r\nA partir del 20 de juny de 2015\r\n<h4><strong>Dies festius de lliure disposició:</strong></h4>\r\n3 de novembre de 2014\r\n\r\n16 de febrer de 2015\r\n\r\n22 de maig de 2015\r\n<h4><strong>Jornada compactada:</strong></h4>\r\n23 de desembre de 2014 i del 8 al 19 de juny de   2015 (ambdós inclosos)\r\n\r\nL’<b>horari lectiu</b> del centre és de 9 a 12,30 h i de 15,00 a 16,30 h per a tots els alumnes del centre. El dia 20 de desembre de 2013 i a partir del 9 de juny de 2014 es realitza horari compactat de 9 a 13h. (Els alumnes que utilitzen el servei de menjador surten a les 15:00h.)\r\n\r\nPer als alumnes que inicien l’escolarització a P3 s’organitza un breu període d’adaptació que suposa una certa modificació dels horaris dels dos primers dies de classe, i que es fa saber a les famílies en les reunions prèvies corresponents.', 'Calendari del curs', '', 'inherit', 'open', 'open', '', '32-revision-v1', '', '', '2014-09-18 12:31:33', '2014-09-18 12:31:33', '', 32, 'http://pwc-int.educacio.intranet/agora/masterpri/2014/09/32-revision-v1/', 0, 'revision', '', 0),
(34, 1, '2014-09-18 12:32:18', '2014-09-18 11:32:18', '<p style="color: #444444;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed nisl quam, lobortis et interdum finibus, aliquam eget ligula. Donec nec ex et leo ultrices dignissim. Suspendisse quis tortor porta, rhoncus velit sit amet, convallis est. In lobortis dignissim convallis. Integer faucibus urna at magna mattis, id accumsan lacus posuere. Quisque vitae ipsum erat. Cras varius placerat justo. Vivamus maximus finibus hendrerit. Nullam accumsan quam pulvinar odio sollicitudin feugiat. Praesent vehicula dolor mauris, in semper risus gravida quis.</p>\r\n<p style="color: #444444;">Cras vitae porta turpis. Proin pharetra ac lacus in tempor. Vestibulum ullamcorper neque quis elit faucibus, at sodales est pretium. Suspendisse ac mauris in enim eleifend porttitor. Sed quis dolor laoreet, eleifend diam non, tincidunt nisl. Nulla sed venenatis eros. Ut non neque cursus, condimentum leo consequat, tempus ligula. Nulla vel orci sed sapien tincidunt fermentum.</p>\r\n<p style="color: #444444;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce in feugiat urna, a sagittis nisl. Proin fringilla turpis sed orci ultricies commodo. Morbi ac magna pulvinar lacus feugiat placerat non eu urna. Mauris laoreet nisi tellus, vel vehicula erat ornare mollis. Pellentesque justo erat, maximus a varius vitae, suscipit vel augue. Vivamus mattis sed metus sit amet auctor. Curabitur vel enim enim. Cras cursus leo lorem, ac dictum nibh bibendum non. Maecenas ac mauris felis. Phasellus euismod luctus augue ac vehicula. Sed dignissim libero vitae consequat luctus. Maecenas quis ornare tellus. Aliquam erat volutpat.</p>', 'Oferta educativa', '', 'publish', 'closed', 'closed', '', 'oferta-educativa', '', '', '2015-10-27 10:04:59', '2015-10-27 09:04:59', '', 22, 'http://pwc-int.educacio.intranet/agora/masterpri/?page_id=34', 60, 'page', '', 0),
(35, 1, '2014-09-18 12:32:18', '2014-09-18 12:32:18', '<p style="color: #444444;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed nisl quam, lobortis et interdum finibus, aliquam eget ligula. Donec nec ex et leo ultrices dignissim. Suspendisse quis tortor porta, rhoncus velit sit amet, convallis est. In lobortis dignissim convallis. Integer faucibus urna at magna mattis, id accumsan lacus posuere. Quisque vitae ipsum erat. Cras varius placerat justo. Vivamus maximus finibus hendrerit. Nullam accumsan quam pulvinar odio sollicitudin feugiat. Praesent vehicula dolor mauris, in semper risus gravida quis.</p>\r\n<p style="color: #444444;">Cras vitae porta turpis. Proin pharetra ac lacus in tempor. Vestibulum ullamcorper neque quis elit faucibus, at sodales est pretium. Suspendisse ac mauris in enim eleifend porttitor. Sed quis dolor laoreet, eleifend diam non, tincidunt nisl. Nulla sed venenatis eros. Ut non neque cursus, condimentum leo consequat, tempus ligula. Nulla vel orci sed sapien tincidunt fermentum.</p>\r\n<p style="color: #444444;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce in feugiat urna, a sagittis nisl. Proin fringilla turpis sed orci ultricies commodo. Morbi ac magna pulvinar lacus feugiat placerat non eu urna. Mauris laoreet nisi tellus, vel vehicula erat ornare mollis. Pellentesque justo erat, maximus a varius vitae, suscipit vel augue. Vivamus mattis sed metus sit amet auctor. Curabitur vel enim enim. Cras cursus leo lorem, ac dictum nibh bibendum non. Maecenas ac mauris felis. Phasellus euismod luctus augue ac vehicula. Sed dignissim libero vitae consequat luctus. Maecenas quis ornare tellus. Aliquam erat volutpat.</p>', 'Oferta educativa', '', 'inherit', 'open', 'open', '', '34-revision-v1', '', '', '2014-09-18 12:32:18', '2014-09-18 12:32:18', '', 34, 'http://pwc-int.educacio.intranet/agora/masterpri/2014/09/34-revision-v1/', 0, 'revision', '', 0),
(36, 1, '2014-09-18 12:33:11', '2014-09-18 11:33:11', 'Descripció i enumeració del material escolar que els alumnes i famílies necessitaran per al nivell educatiu corresponent, és recomanable diferenciar les diferents tipologies de material escolar necessari (llibres de text, lectures, dispositius digitals, material de taller, de dibuix…)', 'Material escolar', '', 'publish', 'closed', 'closed', '', 'material-escolar', '', '', '2015-10-27 10:05:04', '2015-10-27 09:05:04', '', 22, 'http://pwc-int.educacio.intranet/agora/masterpri/?page_id=36', 70, 'page', '', 0),
(37, 1, '2014-09-18 12:33:11', '2014-09-18 12:33:11', 'A la descripció i enumeració del material escolar que els alumnes i  famílies necessitaran per al nivell educatiu corresponent, és recomanable diferenciar les diferents tipologies de material escolar necessari (llibres de text, lectures, dispositius digitals, material de taller, de dibuix…)', 'Material escolar', '', 'inherit', 'open', 'open', '', '36-revision-v1', '', '', '2014-09-18 12:33:11', '2014-09-18 12:33:11', '', 36, 'http://pwc-int.educacio.intranet/agora/masterpri/2014/09/36-revision-v1/', 0, 'revision', '', 0),
(38, 1, '2014-09-18 12:34:08', '2014-09-18 11:34:08', 'El caràcter d''aquesta pàgina ha de ser bàsicament informatiu. En aquesta secció cal fer una referència directa a qüestions de salut que afectin directament als alumnes del centre. Es pot categoritzar la informació, per exemple, entre <strong>medicaments</strong>, <strong>al·lèrgies</strong> i <strong>paràsits</strong>.\r\n\r\n&nbsp;\r\n\r\n&nbsp;\r\n\r\n&nbsp;\r\n\r\n&nbsp;\r\n\r\n&nbsp;', 'Salut', '', 'publish', 'closed', 'closed', '', 'salut', '', '', '2015-10-27 10:05:08', '2015-10-27 09:05:08', '', 22, 'http://pwc-int.educacio.intranet/agora/masterpri/?page_id=38', 80, 'page', '', 0),
(39, 1, '2014-09-18 12:34:08', '2014-09-18 12:34:08', 'El caràcter d''aquesta pàgina ha de ser bàsicament informatiu. En aquesta secció cal fer una referència directa a qüestions de salut que afectin directament als alumnes del centre. Es pot categoritzar la informació, per exemple, entre <strong>medicaments</strong>, <strong>al·lèrgies</strong> i <strong>paràsits</strong>.', 'Salut', '', 'inherit', 'open', 'open', '', '38-revision-v1', '', '', '2014-09-18 12:34:08', '2014-09-18 12:34:08', '', 38, 'http://pwc-int.educacio.intranet/agora/masterpri/2014/09/38-revision-v1/', 0, 'revision', '', 0),
(55, 1, '2014-09-18 12:36:37', '2014-09-18 12:36:37', '', 'L''escola', '', 'publish', 'open', 'open', '', 'lescola-2', '', '', '2016-01-21 19:42:18', '2016-01-21 18:42:18', '', 0, 'http://pwc-int.educacio.intranet/agora/masterpri/?p=55', 1, 'nav_menu_item', '', 0),
(56, 1, '2014-09-18 12:36:37', '2014-09-18 12:36:37', ' ', '', '', 'publish', 'open', 'open', '', '56', '', '', '2016-01-21 19:42:18', '2016-01-21 18:42:18', '', 22, 'http://pwc-int.educacio.intranet/agora/masterpri/?p=56', 9, 'nav_menu_item', '', 0),
(57, 1, '2014-09-18 12:36:37', '2014-09-18 12:36:37', ' ', '', '', 'publish', 'open', 'open', '', '57', '', '', '2016-01-21 19:42:18', '2016-01-21 18:42:18', '', 22, 'http://pwc-int.educacio.intranet/agora/masterpri/?p=57', 8, 'nav_menu_item', '', 0),
(58, 1, '2014-09-18 12:36:37', '2014-09-18 12:36:37', ' ', '', '', 'publish', 'open', 'open', '', '58', '', '', '2016-01-21 19:42:18', '2016-01-21 18:42:18', '', 22, 'http://pwc-int.educacio.intranet/agora/masterpri/?p=58', 7, 'nav_menu_item', '', 0),
(59, 1, '2014-09-18 12:36:37', '2014-09-18 12:36:37', ' ', '', '', 'publish', 'open', 'open', '', '59', '', '', '2016-01-21 19:42:18', '2016-01-21 18:42:18', '', 22, 'http://pwc-int.educacio.intranet/agora/masterpri/?p=59', 6, 'nav_menu_item', '', 0),
(60, 1, '2014-09-18 12:36:37', '2014-09-18 12:36:37', ' ', '', '', 'publish', 'open', 'open', '', '60', '', '', '2016-01-21 19:42:18', '2016-01-21 18:42:18', '', 22, 'http://pwc-int.educacio.intranet/agora/masterpri/?p=60', 5, 'nav_menu_item', '', 0),
(61, 1, '2014-09-18 12:36:37', '2014-09-18 12:36:37', ' ', '', '', 'publish', 'open', 'open', '', '61', '', '', '2016-01-21 19:42:18', '2016-01-21 18:42:18', '', 22, 'http://pwc-int.educacio.intranet/agora/masterpri/?p=61', 4, 'nav_menu_item', '', 0),
(62, 1, '2014-09-18 12:36:37', '2014-09-18 12:36:37', ' ', '', '', 'publish', 'open', 'open', '', '62', '', '', '2016-01-21 19:42:18', '2016-01-21 18:42:18', '', 22, 'http://pwc-int.educacio.intranet/agora/masterpri/?p=62', 3, 'nav_menu_item', '', 0),
(63, 1, '2014-09-18 12:36:37', '2014-09-18 12:36:37', ' ', '', '', 'publish', 'open', 'open', '', '63', '', '', '2016-01-21 19:42:18', '2016-01-21 18:42:18', '', 22, 'http://pwc-int.educacio.intranet/agora/masterpri/?p=63', 2, 'nav_menu_item', '', 0),
(64, 1, '2014-09-18 12:39:08', '2014-09-18 11:39:08', 'En aquesta secció cada centre pot crear les pàgines necessàries per a descriure el seu projecte educatiu. D''acord amb la <a title="Article 91 LEC" href="http://www20.gencat.cat/portal/site/portaljuridic/menuitem.d15a4e5dfb99396dc366ec10b0c0e1a0/?vgnextoid=b85297b5a87d6210VgnVCM1000000b0c1e0aRCRD&amp;vgnextchannel=b85297b5a87d6210VgnVCM1000000b0c1e0aRCRD&amp;vgnextfmt=default&amp;action=fitxa&amp;portalId=1&amp;documentId=480169&amp;newLang=ca_ES#fragment-1182442" target="_blank">Llei d''Educació de Catalunya</a>, el projecte educatiu incorpora el caràcter propi del centre i ha de contenir com a mínim els elements següents:\r\n<ul>\r\n	<li>Criteris d''ordenació pedagògica, prioritats i plantejaments educatius, procediments d''inclusió i altres actuacions que caracteritzen el centre.</li>\r\n	<li>Indicadors de progrés.</li>\r\n	<li>Concreció i desenvolupament dels currículums.</li>\r\n	<li>Criteris que defineixen l''estructura organitzativa.</li>\r\n	<li>Projecte lingüístic.</li>\r\n	<li>Caràcter propi del centre, si n''hi ha.</li>\r\n</ul>\r\nEs poden incloure també en aquesta secció altres documents més específics que també formen part del projecte educatiu, com ara: Projecte de convivència, Pla TAC, Pla d''acollida, Projecte d''escola i família, Comunitat d''aprenentatge, etc.\r\n\r\nTambé pot ser interessant fer referència a altres projectes i activitats, com ara: Escola verda, Ràdio a l''escola, Art a l''escola, Cinema en curs, Taller de robòtica, Aprenentatge integrat de Continguts i Llengües Estrangeres (AICLE), Revista de l''escola, Agenda 21, Hort, Patis oberts...\r\n\r\nDonada la diversitat de seccions possibles, s''ha cregut oportú no crear cap pàgina específica en la maqueta inicial, deixant a criteri del centre la decisió sobre la millor manera d''estructurar la descripció del seu projecte educatiu. En crear els apartats és important que la caixa <em>Atributs de la pàgina</em> tingui com a pare/mare “<em>Projecte educatiu</em>“, i que se seleccioni com a plantilla l''opció “<em>Menú lateral</em>“.', 'Projecte educatiu', '', 'publish', 'closed', 'closed', '', 'projecte-educatiu', '', '', '2015-10-27 10:05:33', '2015-10-27 09:05:33', '', 0, 'http://pwc-int.educacio.intranet/agora/masterpri/?page_id=64', 0, 'page', '', 0),
(65, 1, '2014-09-18 12:39:08', '2014-09-18 12:39:08', 'En aquesta secció cada centre pot crear les pàgines necessàries per a descriure el seu projecte educatiu. D''acord amb la <a title="Article 91 LEC" href="http://www20.gencat.cat/portal/site/portaljuridic/menuitem.d15a4e5dfb99396dc366ec10b0c0e1a0/?vgnextoid=b85297b5a87d6210VgnVCM1000000b0c1e0aRCRD&amp;vgnextchannel=b85297b5a87d6210VgnVCM1000000b0c1e0aRCRD&amp;vgnextfmt=default&amp;action=fitxa&amp;portalId=1&amp;documentId=480169&amp;newLang=ca_ES#fragment-1182442" target="_blank">Llei d''Educació de Catalunya</a>, el projecte educatiu incorpora el caràcter propi del centre i ha de contenir com a mínim els elements següents:\r\n<ul>\r\n	<li>Criteris d''ordenació pedagògica, prioritats i plantejaments educatius, procediments d''inclusió i altres actuacions que caracteritzen el centre.</li>\r\n	<li>Indicadors de progrés.</li>\r\n	<li>Concreció i desenvolupament dels currículums.</li>\r\n	<li>Criteris que defineixen l''estructura organitzativa.</li>\r\n	<li>Projecte lingüístic.</li>\r\n	<li>Caràcter propi del centre, si n''hi ha.</li>\r\n</ul>\r\nEs poden incloure també en aquesta secció altres documents més específics que també formen part del projecte educatiu, com ara: Projecte de convivència, Pla TAC, Pla d''acollida, Projecte d''escola i família, Comunitat d''aprenentatge, etc.\r\n\r\nTambé pot ser interessant fer referència a altres projectes i activitats, com ara: Escola verda, Ràdio a l''escola, Art a l''escola, Cinema en curs, Taller de robòtica, Aprenentatge integrat de Continguts i Llengües Estrangeres (AICLE), Revista de l''escola, Agenda 21, Hort, Patis oberts...\r\n\r\nDonada la diversitat de seccions possibles, s''ha cregut oportú no crear cap pàgina específica en la maqueta inicial, deixant a criteri del centre la decisió sobre la millor manera d''estructurar la descripció del seu projecte educatiu. En crear els apartats és important que la caixa <em>Atributs de la pàgina</em> tingui com a pare/mare “<em>Projecte educatiu</em>“, i que es seleccioni com a plantilla l''opció “<em>Menú lateral</em>“.', 'Projecte educatiu', '', 'inherit', 'open', 'open', '', '64-revision-v1', '', '', '2014-09-18 12:39:08', '2014-09-18 12:39:08', '', 64, 'http://pwc-int.educacio.intranet/agora/masterpri/2014/09/64-revision-v1/', 0, 'revision', '', 0),
(66, 1, '2014-09-18 12:40:47', '2014-09-18 11:40:47', 'Secció que ha d''informar a les famílies dels serveis que ofereix el centre. La missió educativa no es limita a l''eix curricular, per això és imprescindible que aquest apartat del web estigui en un primer nivell de navegació. És recomanable que s''introdueixi informació relacionada amb:\r\n<ul>\r\n<li>el menjador escolar</li>\r\n<li>l''acollida</li>\r\n<li>el transport escolar</li>\r\n<li>el casal d''estiu</li>\r\n<li>les activitats extraescolars</li>\r\n<li>altres serveis digitals (en cas que el centre compti amb altres serveis digitals en línia com ara Moodle, blogs, tutoria o gestió acadèmica, aplicacions mòbils...)</li>\r\n</ul>', 'Serveis', '', 'publish', 'closed', 'closed', '', 'serveis', '', '', '2015-10-27 10:05:37', '2015-10-27 09:05:37', '', 0, 'http://pwc-int.educacio.intranet/agora/masterpri/?page_id=66', 0, 'page', '', 0),
(67, 1, '2014-09-18 12:40:47', '2014-09-18 12:40:47', 'Secció que ha d''informar a les famílies dels serveis que ofereix el centre. La missió educativa no es limita a l''eix curricular, per això és imprescindible que aquest apartat del web estigui en un primer nivell de navegació. És recomanable que s''introdueixi informació relacionada amb:\r\n&lt;ul&gt;\r\n&lt;li&gt;el menjador escolar&lt;/li&gt;\r\n&lt;li&gt;l''acollida&lt;/li&gt;\r\n&lt;li&gt;el transport escolar&lt;/li&gt;\r\n&lt;li&gt;el casal d''estiu&lt;/li&gt;\r\n&lt;li&gt;les activitats extraescolars&lt;/li&gt;\r\n&lt;li&gt;altres serveis digitals (en cas que el centre compti amb altres serveis digitals en línia com ara Moodle, blogs, tutoria o gestió acadèmica, aplicacions mòbils...)&lt;/li&gt;\r\n&lt;/ul&gt;', 'Serveis', '', 'inherit', 'open', 'open', '', '66-revision-v1', '', '', '2014-09-18 12:40:47', '2014-09-18 12:40:47', '', 66, 'http://pwc-int.educacio.intranet/agora/masterpri/2014/09/66-revision-v1/', 0, 'revision', '', 0),
(68, 1, '2014-09-18 12:40:58', '2014-09-18 12:40:58', 'Secció que ha d''informar a les famílies dels serveis que ofereix el centre. La missió educativa no es limita a l''eix curricular, per això és imprescindible que aquest apartat del web estigui en un primer nivell de navegació. És recomanable que s''introdueixi informació relacionada amb:\r\n<ul>\r\n<li>el menjador escolar</li>\r\n<li>l''acollida</li>\r\n<li>el transport escolar</li>\r\n<li>el casal d''estiu</li>\r\n<li>les activitats extraescolars</li>\r\n<li>altres serveis digitals (en cas que el centre compti amb altres serveis digitals en línia com ara Moodle, blogs, tutoria o gestió acadèmica, aplicacions mòbils...)</li>\r\n</ul>', 'Serveis', '', 'inherit', 'open', 'open', '', '66-revision-v1', '', '', '2014-09-18 12:40:58', '2014-09-18 12:40:58', '', 66, 'http://pwc-int.educacio.intranet/agora/masterpri/2014/09/66-revision-v1/', 0, 'revision', '', 0),
(69, 1, '2014-09-18 12:41:37', '2014-09-18 12:41:37', ' ', '', '', 'publish', 'open', 'open', '', '69', '', '', '2016-01-21 19:42:19', '2016-01-21 18:42:19', '', 0, 'http://pwc-int.educacio.intranet/agora/masterpri/?p=69', 24, 'nav_menu_item', '', 0),
(70, 1, '2014-09-18 12:41:37', '2014-09-18 12:41:37', ' ', '', '', 'publish', 'open', 'open', '', '70', '', '', '2016-01-21 19:42:18', '2016-01-21 18:42:18', '', 0, 'http://pwc-int.educacio.intranet/agora/masterpri/?p=70', 11, 'nav_menu_item', '', 0),
(71, 1, '2014-09-18 12:44:56', '2014-09-18 11:44:56', 'L''oferta de <strong>serveis digitals</strong> constitueix un element molt important de l''engranatge d''un centre educatiu.\r\n\r\nEn aquesta pàgina es poden referenciar altres serveis en línia que ofereix l''escola com ara Moodle, blogs externs, aplicacions de tutoria o gestió acadèmica, aplicacions mòbils, etc.\r\n\r\nSi el centre posa en funcionament la <strong>xarxa Nodes</strong>, aquest pot ser un bon lloc per referenciar els principals grups i activitats que s''hi duen a terme.', 'Serveis digitals', '', 'publish', 'closed', 'closed', '', 'serveis-digitals', '', '', '2015-10-27 10:05:42', '2015-10-27 09:05:42', '', 66, 'http://pwc-int.educacio.intranet/agora/masterpri/?page_id=71', 10, 'page', '', 0),
(72, 1, '2014-09-18 12:44:56', '2014-09-18 12:44:56', 'L''oferta de <strong>serveis digitals</strong> constitueix un element molt important de l''engranatge d''un centre educatiu.\r\n\r\nEn aquesta pàgina es poden referenciar altres serveis en línia que ofereix l''escola com ara Moodle, blocs externs, aplicacions de tutoria o gestió acadèmica, aplicacions mòbils, etc.\r\n\r\nSi el centre posa en funcionament la <strong>xarxa Nodes</strong>, aquest pot ser un bon lloc per referenciar els principals grups i activitats que s''hi duen a terme.', 'Serveis digitals', '', 'inherit', 'open', 'open', '', '71-revision-v1', '', '', '2014-09-18 12:44:56', '2014-09-18 12:44:56', '', 71, 'http://pwc-int.educacio.intranet/agora/masterpri/2014/09/71-revision-v1/', 0, 'revision', '', 0),
(73, 1, '2014-09-18 14:01:51', '2014-09-18 13:01:51', '<ul>\r\n	<li>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>\r\n	<li>Vivamus nec turpis viverra, vehicula tellus pellentesque, euismod urna.</li>\r\n	<li>Vivamus cursus neque eu erat bibendum, non ultrices enim dignissim.</li>\r\n	<li>Pellentesque consectetur lectus sit amet libero aliquam tincidunt.</li>\r\n	<li>Morbi eu purus vel mi dignissim volutpat eget nec est.</li>\r\n</ul>\r\n<ul>\r\n	<li>Curabitur vulputate purus nec orci suscipit viverra.</li>\r\n	<li>Phasellus vel lorem sit amet arcu posuere pellentesque.</li>\r\n	<li>Nam non tortor in turpis vestibulum ullamcorper id ut risus.</li>\r\n	<li>Suspendisse laoreet orci ac sodales varius.</li>\r\n	<li>Mauris laoreet eros et est hendrerit placerat.</li>\r\n</ul>', 'Menjador escolar', '', 'publish', 'closed', 'closed', '', 'menjador-escolar', '', '', '2015-10-27 10:05:53', '2015-10-27 09:05:53', '', 66, 'http://pwc-int.educacio.intranet/agora/masterpri/?page_id=73', 30, 'page', '', 0),
(74, 1, '2014-09-18 14:01:51', '2014-09-18 14:01:51', '<ul>\r\n	<li>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>\r\n	<li>Vivamus nec turpis viverra, vehicula tellus pellentesque, euismod urna.</li>\r\n	<li>Vivamus cursus neque eu erat bibendum, non ultrices enim dignissim.</li>\r\n	<li>Pellentesque consectetur lectus sit amet libero aliquam tincidunt.</li>\r\n	<li>Morbi eu purus vel mi dignissim volutpat eget nec est.</li>\r\n</ul>\r\n<ul>\r\n	<li>Curabitur vulputate purus nec orci suscipit viverra.</li>\r\n	<li>Phasellus vel lorem sit amet arcu posuere pellentesque.</li>\r\n	<li>Nam non tortor in turpis vestibulum ullamcorper id ut risus.</li>\r\n	<li>Suspendisse laoreet orci ac sodales varius.</li>\r\n	<li>Mauris laoreet eros et est hendrerit placerat.</li>\r\n</ul>', 'Menjador escolar', '', 'inherit', 'open', 'open', '', '73-revision-v1', '', '', '2014-09-18 14:01:51', '2014-09-18 14:01:51', '', 73, 'http://pwc-int.educacio.intranet/agora/masterpri/2014/09/73-revision-v1/', 0, 'revision', '', 0),
(75, 1, '2014-09-18 14:08:22', '2014-09-18 14:08:22', ' ', '', '', 'publish', 'open', 'open', '', '75', '', '', '2016-01-21 19:42:19', '2016-01-21 18:42:19', '', 66, 'http://pwc-int.educacio.intranet/agora/masterpri/?p=75', 27, 'nav_menu_item', '', 0),
(76, 1, '2014-09-18 14:08:22', '2014-09-18 14:08:22', ' ', '', '', 'publish', 'open', 'open', '', '76', '', '', '2016-01-21 19:42:19', '2016-01-21 18:42:19', '', 66, 'http://pwc-int.educacio.intranet/agora/masterpri/?p=76', 25, 'nav_menu_item', '', 0),
(77, 1, '2014-09-18 14:05:08', '2014-09-18 13:05:08', '<p style="color: #666666;">Ma quande lingues coalesce, li grammatica del resultant lingue es plu simplic e regulari quam ti del coalescent lingues. Li nov lingua franca va esser plu simplic e regulari quam li existent Europan lingues. It va esser tam simplic quam Occidental in fact, it va esser Occidental.</p>\r\n<p style="color: #666666;">A un Angleso it va semblar un simplificat Angles, quam un skeptic Cambridge amico dit me que Occidental es. Li Europan lingues es membres del sam familie. Lor separat existentie es un myth. Por scientie, musica, sport etc, litot Europa usa li sam vocabular. Li lingues differe solmen in li grammatica, li pronunciation e li plu commun vocabules. Omnicos directe al desirabilite de un nov lingua franca: On refusa continuar payar custosi traductores. At solmen va esser necessi far uniform grammatica, pronunciation e plu sommun paroles.</p>', 'Acollida', '', 'publish', 'closed', 'closed', '', 'acollida', '', '', '2015-10-27 10:05:46', '2015-10-27 09:05:46', '', 66, 'http://pwc-int.educacio.intranet/agora/masterpri/?page_id=77', 20, 'page', '', 0),
(78, 1, '2014-09-18 14:05:08', '2014-09-18 14:05:08', '<p style="color: #666666;">Ma quande lingues coalesce, li grammatica del resultant lingue es plu simplic e regulari quam ti del coalescent lingues. Li nov lingua franca va esser plu simplic e regulari quam li existent Europan lingues. It va esser tam simplic quam Occidental in fact, it va esser Occidental.</p>\r\n<p style="color: #666666;">A un Angleso it va semblar un simplificat Angles, quam un skeptic Cambridge amico dit me que Occidental es. Li Europan lingues es membres del sam familie. Lor separat existentie es un myth. Por scientie, musica, sport etc, litot Europa usa li sam vocabular. Li lingues differe solmen in li grammatica, li pronunciation e li plu commun vocabules. Omnicos directe al desirabilite de un nov lingua franca: On refusa continuar payar custosi traductores. At solmen va esser necessi far uniform grammatica, pronunciation e plu sommun paroles.</p>', 'Acollida', '', 'inherit', 'open', 'open', '', '77-revision-v1', '', '', '2014-09-18 14:05:08', '2014-09-18 14:05:08', '', 77, 'http://pwc-int.educacio.intranet/agora/masterpri/2014/09/77-revision-v1/', 0, 'revision', '', 0),
(79, 1, '2014-09-18 14:08:42', '2014-09-18 14:08:42', ' ', '', '', 'publish', 'open', 'open', '', '79', '', '', '2016-01-21 19:42:19', '2016-01-21 18:42:19', '', 66, 'http://pwc-int.educacio.intranet/agora/masterpri/?p=79', 26, 'nav_menu_item', '', 0),
(80, 1, '2014-09-18 14:09:48', '2014-09-18 13:09:48', '<p style="color: #666666;">Ma quande lingues coalesce, li grammatica del resultant lingue es plu simplic e regulari quam ti del coalescent lingues. Li nov lingua franca va esser plu simplic e regulari quam li existent Europan lingues. It va esser tam simplic quam Occidental in fact, it va esser Occidental.</p>\r\n<p style="color: #666666;">A un Angleso it va semblar un simplificat Angles, quam un skeptic Cambridge amico dit me que Occidental es. Li Europan lingues es membres del sam familie. Lor separat existentie es un myth. Por scientie, musica, sport etc, litot Europa usa li sam vocabular. Li lingues differe solmen in li grammatica, li pronunciation e li plu commun vocabules. Omnicos directe al desirabilite de un nov lingua franca: On refusa continuar payar custosi traductores. At solmen va esser necessi far uniform grammatica, pronunciation e plu sommun paroles.</p>', 'Transport Escolar', '', 'publish', 'closed', 'closed', '', 'transport-escolar', '', '', '2015-10-27 10:05:57', '2015-10-27 09:05:57', '', 66, 'http://pwc-int.educacio.intranet/agora/masterpri/?page_id=80', 40, 'page', '', 0),
(81, 1, '2014-09-18 14:09:48', '2014-09-18 14:09:48', '<p style="color: #666666;">Ma quande lingues coalesce, li grammatica del resultant lingue es plu simplic e regulari quam ti del coalescent lingues. Li nov lingua franca va esser plu simplic e regulari quam li existent Europan lingues. It va esser tam simplic quam Occidental in fact, it va esser Occidental.</p>\r\n<p style="color: #666666;">A un Angleso it va semblar un simplificat Angles, quam un skeptic Cambridge amico dit me que Occidental es. Li Europan lingues es membres del sam familie. Lor separat existentie es un myth. Por scientie, musica, sport etc, litot Europa usa li sam vocabular. Li lingues differe solmen in li grammatica, li pronunciation e li plu commun vocabules. Omnicos directe al desirabilite de un nov lingua franca: On refusa continuar payar custosi traductores. At solmen va esser necessi far uniform grammatica, pronunciation e plu sommun paroles.</p>', 'Transport Escolar', '', 'inherit', 'open', 'open', '', '80-revision-v1', '', '', '2014-09-18 14:09:48', '2014-09-18 14:09:48', '', 80, 'http://pwc-int.educacio.intranet/agora/masterpri/2014/09/80-revision-v1/', 0, 'revision', '', 0),
(82, 1, '2014-09-18 14:10:51', '2014-09-18 13:10:51', '<p style="color: #444444;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed nisl quam, lobortis et interdum finibus, aliquam eget ligula. Donec nec ex et leo ultrices dignissim. Suspendisse quis tortor porta, rhoncus velit sit amet, convallis est. In lobortis dignissim convallis. Integer faucibus urna at magna mattis, id accumsan lacus posuere. Quisque vitae ipsum erat. Cras varius placerat justo. Vivamus maximus finibus hendrerit. Nullam accumsan quam pulvinar odio sollicitudin feugiat. Praesent vehicula dolor mauris, in semper risus gravida quis.</p>\r\n<p style="color: #444444;">Cras vitae porta turpis. Proin pharetra ac lacus in tempor. Vestibulum ullamcorper neque quis elit faucibus, at sodales est pretium. Suspendisse ac mauris in enim eleifend porttitor. Sed quis dolor laoreet, eleifend diam non, tincidunt nisl. Nulla sed venenatis eros. Ut non neque cursus, condimentum leo consequat, tempus ligula. Nulla vel orci sed sapien tincidunt fermentum.</p>', 'Casal d''estiu', '', 'publish', 'closed', 'closed', '', 'casal-destiu', '', '', '2015-10-27 10:06:01', '2015-10-27 09:06:01', '', 66, 'http://pwc-int.educacio.intranet/agora/masterpri/?page_id=82', 50, 'page', '', 0),
(83, 1, '2014-09-18 14:10:51', '2014-09-18 14:10:51', '<p style="color: #444444;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed nisl quam, lobortis et interdum finibus, aliquam eget ligula. Donec nec ex et leo ultrices dignissim. Suspendisse quis tortor porta, rhoncus velit sit amet, convallis est. In lobortis dignissim convallis. Integer faucibus urna at magna mattis, id accumsan lacus posuere. Quisque vitae ipsum erat. Cras varius placerat justo. Vivamus maximus finibus hendrerit. Nullam accumsan quam pulvinar odio sollicitudin feugiat. Praesent vehicula dolor mauris, in semper risus gravida quis.</p>\r\n<p style="color: #444444;">Cras vitae porta turpis. Proin pharetra ac lacus in tempor. Vestibulum ullamcorper neque quis elit faucibus, at sodales est pretium. Suspendisse ac mauris in enim eleifend porttitor. Sed quis dolor laoreet, eleifend diam non, tincidunt nisl. Nulla sed venenatis eros. Ut non neque cursus, condimentum leo consequat, tempus ligula. Nulla vel orci sed sapien tincidunt fermentum.</p>', 'Casal d''estiu', '', 'inherit', 'open', 'open', '', '82-revision-v1', '', '', '2014-09-18 14:10:51', '2014-09-18 14:10:51', '', 82, 'http://pwc-int.educacio.intranet/agora/masterpri/2014/09/82-revision-v1/', 0, 'revision', '', 0);
INSERT INTO `wp_posts` (`ID`, `post_author`, `post_date`, `post_date_gmt`, `post_content`, `post_title`, `post_excerpt`, `post_status`, `comment_status`, `ping_status`, `post_password`, `post_name`, `to_ping`, `pinged`, `post_modified`, `post_modified_gmt`, `post_content_filtered`, `post_parent`, `guid`, `menu_order`, `post_type`, `post_mime_type`, `comment_count`) VALUES
(84, 1, '2014-09-18 14:11:31', '2014-09-18 13:11:31', '<p style="color: #444444;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed nisl quam, lobortis et interdum finibus, aliquam eget ligula. Donec nec ex et leo ultrices dignissim. Suspendisse quis tortor porta, rhoncus velit sit amet, convallis est. In lobortis dignissim convallis. Integer faucibus urna at magna mattis, id accumsan lacus posuere. Quisque vitae ipsum erat. Cras varius placerat justo. Vivamus maximus finibus hendrerit. Nullam accumsan quam pulvinar odio sollicitudin feugiat. Praesent vehicula dolor mauris, in semper risus gravida quis.</p>\r\n<p style="color: #444444;">Cras vitae porta turpis. Proin pharetra ac lacus in tempor. Vestibulum ullamcorper neque quis elit faucibus, at sodales est pretium. Suspendisse ac mauris in enim eleifend porttitor. Sed quis dolor laoreet, eleifend diam non, tincidunt nisl. Nulla sed venenatis eros. Ut non neque cursus, condimentum leo consequat, tempus ligula. Nulla vel orci sed sapien tincidunt fermentum.</p>', 'Activitats extraescolars', '', 'publish', 'closed', 'closed', '', 'activitats-extraescolars', '', '', '2015-10-27 10:06:05', '2015-10-27 09:06:05', '', 66, 'http://pwc-int.educacio.intranet/agora/masterpri/?page_id=84', 60, 'page', '', 0),
(85, 1, '2014-09-18 14:11:31', '2014-09-18 14:11:31', '<p style="color: #444444;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed nisl quam, lobortis et interdum finibus, aliquam eget ligula. Donec nec ex et leo ultrices dignissim. Suspendisse quis tortor porta, rhoncus velit sit amet, convallis est. In lobortis dignissim convallis. Integer faucibus urna at magna mattis, id accumsan lacus posuere. Quisque vitae ipsum erat. Cras varius placerat justo. Vivamus maximus finibus hendrerit. Nullam accumsan quam pulvinar odio sollicitudin feugiat. Praesent vehicula dolor mauris, in semper risus gravida quis.</p>\r\n<p style="color: #444444;">Cras vitae porta turpis. Proin pharetra ac lacus in tempor. Vestibulum ullamcorper neque quis elit faucibus, at sodales est pretium. Suspendisse ac mauris in enim eleifend porttitor. Sed quis dolor laoreet, eleifend diam non, tincidunt nisl. Nulla sed venenatis eros. Ut non neque cursus, condimentum leo consequat, tempus ligula. Nulla vel orci sed sapien tincidunt fermentum.</p>', 'Activitats extraescolars', '', 'inherit', 'open', 'open', '', '84-revision-v1', '', '', '2014-09-18 14:11:31', '2014-09-18 14:11:31', '', 84, 'http://pwc-int.educacio.intranet/agora/masterpri/2014/09/84-revision-v1/', 0, 'revision', '', 0),
(86, 1, '2014-09-18 14:19:53', '2014-09-18 14:19:53', ' ', '', '', 'publish', 'open', 'open', '', '86', '', '', '2016-01-21 19:42:19', '2016-01-21 18:42:19', '', 0, 'http://pwc-int.educacio.intranet/agora/masterpri/?p=86', 31, 'nav_menu_item', '', 0),
(87, 1, '2014-09-18 14:28:12', '2014-09-18 13:28:12', 'De P3 a 6è cada nivell té una pàgina pròpia, que es creen mitjançant les categories.\r\n\r\nLes categories es defineixen des del menú de les entrades del blog. Paral·lelament als nivells també es poden definir més categories.\r\n\r\nJa estan definides les categories: Educació infantil, P3, P4, P5, Educació primària, 1r curs, 2n curs, 3r curs, 4t curs, 5è curs, 6è curs.', 'Nivells', '', 'publish', 'closed', 'closed', '', 'nivells', '', '', '2015-10-27 10:05:19', '2015-10-27 09:05:19', '', 0, 'http://pwc-int.educacio.intranet/agora/masterpri/?page_id=87', 0, 'page', '', 0),
(88, 1, '2014-09-18 14:28:12', '2014-09-18 14:28:12', 'De P3 a 6è cada nivell té una pàgina pròpia, que es creen mitjançant les categories.\r\n\r\nLes categories es defineixen des del menú de les entrades del blog. Paral·lelament als nivells també es poden definir més categories.\r\n\r\nEstan ja definides les categories: Educació infantil, P3, P4, P5, Educació primària, 1r. curs, 2n. curs, 3r. curs, 4t. curs, 5è. curs, 6à. curs.', 'Nivells', '', 'inherit', 'open', 'open', '', '87-revision-v1', '', '', '2014-09-18 14:28:12', '2014-09-18 14:28:12', '', 87, 'http://pwc-int.educacio.intranet/agora/masterpri/2014/09/87-revision-v1/', 0, 'revision', '', 0),
(89, 1, '2014-09-18 14:29:22', '2014-09-18 14:29:22', ' ', '', '', 'publish', 'open', 'open', '', '89', '', '', '2016-01-21 19:42:19', '2016-01-21 18:42:19', '', 66, 'http://pwc-int.educacio.intranet/agora/masterpri/?p=89', 30, 'nav_menu_item', '', 0),
(90, 1, '2014-09-18 14:29:22', '2014-09-18 14:29:22', '', 'Casal d''estiu', '', 'publish', 'open', 'open', '', 'casal-destiu', '', '', '2016-01-21 19:42:19', '2016-01-21 18:42:19', '', 66, 'http://pwc-int.educacio.intranet/agora/masterpri/?p=90', 29, 'nav_menu_item', '', 0),
(91, 1, '2014-09-18 14:29:22', '2014-09-18 14:29:22', ' ', '', '', 'publish', 'open', 'open', '', '91', '', '', '2016-01-21 19:42:19', '2016-01-21 18:42:19', '', 66, 'http://pwc-int.educacio.intranet/agora/masterpri/?p=91', 28, 'nav_menu_item', '', 0),
(92, 1, '2014-09-18 14:29:22', '2014-09-18 14:29:22', ' ', '', '', 'publish', 'open', 'open', '', '92', '', '', '2016-01-21 19:42:18', '2016-01-21 18:42:18', '', 0, 'http://pwc-int.educacio.intranet/agora/masterpri/?p=92', 12, 'nav_menu_item', '', 0),
(93, 1, '2014-09-18 14:30:17', '2014-09-18 14:30:17', ' ', '', '', 'publish', 'open', 'open', '', '93', '', '', '2016-01-21 19:42:18', '2016-01-21 18:42:18', '', 2, 'http://pwc-int.educacio.intranet/agora/masterpri/?p=93', 14, 'nav_menu_item', '', 0),
(94, 1, '2014-09-18 14:30:17', '2014-09-18 14:30:17', ' ', '', '', 'publish', 'open', 'open', '', '94', '', '', '2016-01-21 19:42:18', '2016-01-21 18:42:18', '', 2, 'http://pwc-int.educacio.intranet/agora/masterpri/?p=94', 15, 'nav_menu_item', '', 0),
(95, 1, '2014-09-18 14:30:17', '2014-09-18 14:30:17', ' ', '', '', 'publish', 'open', 'open', '', '95', '', '', '2016-01-21 19:42:18', '2016-01-21 18:42:18', '', 2, 'http://pwc-int.educacio.intranet/agora/masterpri/?p=95', 16, 'nav_menu_item', '', 0),
(96, 1, '2014-09-18 14:30:17', '2014-09-18 14:30:17', ' ', '', '', 'publish', 'open', 'open', '', '96', '', '', '2016-01-21 19:42:18', '2016-01-21 18:42:18', '', 5, 'http://pwc-int.educacio.intranet/agora/masterpri/?p=96', 18, 'nav_menu_item', '', 0),
(97, 1, '2014-09-18 14:30:17', '2014-09-18 14:30:17', ' ', '', '', 'publish', 'open', 'open', '', '97', '', '', '2016-01-21 19:42:18', '2016-01-21 18:42:18', '', 5, 'http://pwc-int.educacio.intranet/agora/masterpri/?p=97', 19, 'nav_menu_item', '', 0),
(98, 1, '2014-09-18 14:30:17', '2014-09-18 14:30:17', ' ', '', '', 'publish', 'open', 'open', '', '98', '', '', '2016-01-21 19:42:18', '2016-01-21 18:42:18', '', 5, 'http://pwc-int.educacio.intranet/agora/masterpri/?p=98', 20, 'nav_menu_item', '', 0),
(99, 1, '2014-09-18 14:30:17', '2014-09-18 14:30:17', ' ', '', '', 'publish', 'open', 'open', '', '99', '', '', '2016-01-21 19:42:18', '2016-01-21 18:42:18', '', 5, 'http://pwc-int.educacio.intranet/agora/masterpri/?p=99', 21, 'nav_menu_item', '', 0),
(100, 1, '2014-09-18 14:30:17', '2014-09-18 14:30:17', ' ', '', '', 'publish', 'open', 'open', '', '100', '', '', '2016-01-21 19:42:18', '2016-01-21 18:42:18', '', 5, 'http://pwc-int.educacio.intranet/agora/masterpri/?p=100', 22, 'nav_menu_item', '', 0),
(101, 1, '2014-09-18 14:30:17', '2014-09-18 14:30:17', ' ', '', '', 'publish', 'open', 'open', '', '101', '', '', '2016-01-21 19:42:19', '2016-01-21 18:42:19', '', 5, 'http://pwc-int.educacio.intranet/agora/masterpri/?p=101', 23, 'nav_menu_item', '', 0),
(102, 1, '2014-09-18 15:29:22', '2014-09-18 15:29:22', '', 'exemple1b', '', 'inherit', 'open', 'open', '', 'exemple1b', '', '', '2014-09-18 15:29:22', '2014-09-18 15:29:22', '', 18, 'http://pwc-int.educacio.intranet/agora/masterpri/wp-content/uploads/usu6/2014/09/exemple1b.png', 0, 'attachment', 'image/png', 0),
(103, 1, '2014-09-18 16:32:01', '2014-09-18 16:32:01', '', 'Capçalera', '', 'publish', 'closed', 'closed', '', 'capcalera', '', '', '2014-09-22 12:04:54', '2014-09-22 12:04:54', '', 0, 'http://pwc-int.educacio.intranet/agora/masterpri/?post_type=slideshow&#038;p=103', 0, 'slideshow', '', 0),
(106, 1, '2014-09-18 16:39:33', '2014-09-18 16:39:33', '', 'joan_turu', '', 'inherit', 'open', 'open', '', 'joan_turu', '', '', '2014-09-18 16:39:33', '2014-09-18 16:39:33', '', 0, 'http://pwc-int.educacio.intranet/agora/masterpri/wp-content/uploads/usu6/2014/09/joan_turu.png', 0, 'attachment', 'image/png', 0),
(107, 1, '2014-09-18 17:01:30', '2014-09-18 17:01:30', '', 'nens2', '', 'inherit', 'open', 'open', '', 'nens2', '', '', '2014-09-18 17:01:30', '2014-09-18 17:01:30', '', 13, 'http://pwc-int.educacio.intranet/agora/masterpri/wp-content/uploads/usu6/2014/09/nens2.png', 0, 'attachment', 'image/png', 0),
(108, 1, '2014-09-18 17:02:00', '2014-09-18 17:02:00', '', 'nensescola1', '', 'inherit', 'open', 'open', '', 'nensescola1', '', '', '2014-09-18 17:02:00', '2014-09-18 17:02:00', '', 18, 'http://pwc-int.educacio.intranet/agora/masterpri/wp-content/uploads/usu6/2014/09/nensescola1.jpg', 0, 'attachment', 'image/jpeg', 0),
(112, 1, '2014-09-19 11:11:44', '2014-09-19 11:11:44', '', 'Photo by Nick Amoscato', '', 'inherit', 'open', 'open', '', 'photo-by-nick-amoscato', '', '', '2014-09-19 11:11:44', '2014-09-19 11:11:44', '', 0, 'http://pwc-int.educacio.intranet/agora/masterpri/wp-content/uploads/usu6/2014/09/Photo-by-Nick-Amoscato.jpg', 0, 'attachment', 'image/jpeg', 0),
(113, 1, '2014-09-19 11:51:13', '2014-09-19 11:51:13', '[slideshow_deploy id=''125'']\r\n\r\n<span style="color: #444444;">Nam semper id ipsum condimentum laoreet. Proin sollicitudin elit ut ligula hendrerit, et hendrerit ante condimentum. Aliquam suscipit feugiat velit, at vehicula lorem pharetra quis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean erat dolor, aliquet vitae ligula suscipit, bibendum malesuada augue.</span>', 'Notícia 3', '', 'publish', 'open', 'open', '', 'noticia-3', '', '', '2014-09-22 16:36:32', '2014-09-22 16:36:32', '', 0, 'http://pwc-int.educacio.intranet/agora/masterpri/?p=113', 0, 'post', '', 0),
(114, 1, '2014-09-19 11:51:13', '2014-09-19 11:51:13', '<span style="color: #444444;">Nam semper id ipsum condimentum laoreet. Proin sollicitudin elit ut ligula hendrerit, et hendrerit ante condimentum. Aliquam suscipit feugiat velit, at vehicula lorem pharetra quis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean erat dolor, aliquet vitae ligula suscipit, bibendum malesuada augue.</span>', 'Notícia 3', '', 'inherit', 'open', 'open', '', '113-revision-v1', '', '', '2014-09-19 11:51:13', '2014-09-19 11:51:13', '', 113, 'http://pwc-int.educacio.intranet/agora/masterpri/2014/09/113-revision-v1/', 0, 'revision', '', 0),
(115, 1, '2014-09-19 11:51:44', '2014-09-19 11:51:44', '<span style="color: #444444;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean erat dolor, aliquet vitae ligula suscipit, bibendum malesuada augue. Nam semper id ipsum condimentum laoreet. Proin sollicitudin elit ut ligula hendrerit, et hendrerit ante condimentum. Aliquam suscipit feugiat velit, at vehicula lorem pharetra quis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean erat dolor, aliquet vitae ligula suscipit, bibendum malesuada augue.</span>', 'Notícia 4', '', 'publish', 'open', 'open', '', 'noticia-5', '', '', '2014-09-22 16:36:07', '2014-09-22 16:36:07', '', 0, 'http://pwc-int.educacio.intranet/agora/masterpri/?p=115', 0, 'post', '', 0),
(116, 1, '2014-09-19 11:51:44', '2014-09-19 11:51:44', '<span style="color: #444444;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean erat dolor, aliquet vitae ligula suscipit, bibendum malesuada augue. Nam semper id ipsum condimentum laoreet. Proin sollicitudin elit ut ligula hendrerit, et hendrerit ante condimentum. Aliquam suscipit feugiat velit, at vehicula lorem pharetra quis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean erat dolor, aliquet vitae ligula suscipit, bibendum malesuada augue.</span>', 'Notícia 5', '', 'inherit', 'open', 'open', '', '115-revision-v1', '', '', '2014-09-19 11:51:44', '2014-09-19 11:51:44', '', 115, 'http://pwc-int.educacio.intranet/agora/masterpri/2014/09/115-revision-v1/', 0, 'revision', '', 0),
(117, 1, '2014-09-19 11:52:08', '2014-09-19 11:52:08', '<span style="color: #444444;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean erat dolor, aliquet vitae ligula suscipit, bibendum malesuada augue. Nam semper id ipsum condimentum laoreet. Proin sollicitudin elit ut ligula hendrerit, et hendrerit ante condimentum. Aliquam suscipit feugiat velit, at vehicula lorem pharetra quis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean erat dolor, aliquet vitae ligula suscipit, bibendum malesuada augue.</span>', 'Notícia 4', '', 'inherit', 'open', 'open', '', '115-revision-v1', '', '', '2014-09-19 11:52:08', '2014-09-19 11:52:08', '', 115, 'http://pwc-int.educacio.intranet/agora/masterpri/2014/09/115-revision-v1/', 0, 'revision', '', 0),
(118, 1, '2014-09-19 11:53:11', '2014-09-19 11:53:11', '<iframe src="//player.vimeo.com/video/98712736?title=0&amp;byline=0&amp;portrait=0&amp;color=ff9933" width="550" height="309" frameborder="0" allowfullscreen="allowfullscreen"></iframe>', 'Notícia 5', '', 'publish', 'open', 'open', '', 'noticia-5-2', '', '', '2014-09-22 16:37:30', '2014-09-22 16:37:30', '', 0, 'http://pwc-int.educacio.intranet/agora/masterpri/?p=118', 0, 'post', '', 0),
(119, 1, '2014-09-19 11:53:11', '2014-09-19 11:53:11', '<span style="color: #444444;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean erat dolor, aliquet vitae ligula suscipit, bibendum malesuada augue. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean erat dolor, aliquet vitae ligula suscipit, bibendum malesuada augue. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean erat dolor, aliquet vitae ligula suscipit, bibendum malesuada augue.</span>', 'Notícia 5', '', 'inherit', 'open', 'open', '', '118-revision-v1', '', '', '2014-09-19 11:53:11', '2014-09-19 11:53:11', '', 118, 'http://pwc-int.educacio.intranet/agora/masterpri/2014/09/118-revision-v1/', 0, 'revision', '', 0),
(120, 1, '2014-09-19 11:53:39', '2014-09-19 11:53:39', '<span style="color: #444444;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean erat dolor, aliquet vitae ligula suscipit, bibendum malesuada augue. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean erat dolor, aliquet vitae ligula suscipit, bibendum malesuada augue. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean erat dolor, aliquet vitae ligula suscipit, bibendum malesuada augue.</span>', 'Notícia 6', '', 'publish', 'open', 'open', '', 'noticia-6', '', '', '2014-09-22 16:36:07', '2014-09-22 16:36:07', '', 0, 'http://pwc-int.educacio.intranet/agora/masterpri/?p=120', 0, 'post', '', 0),
(121, 1, '2014-09-19 11:53:39', '2014-09-19 11:53:39', '<span style="color: #444444;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean erat dolor, aliquet vitae ligula suscipit, bibendum malesuada augue. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean erat dolor, aliquet vitae ligula suscipit, bibendum malesuada augue. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean erat dolor, aliquet vitae ligula suscipit, bibendum malesuada augue.</span>', 'Notícia 6', '', 'inherit', 'open', 'open', '', '120-revision-v1', '', '', '2014-09-19 11:53:39', '2014-09-19 11:53:39', '', 120, 'http://pwc-int.educacio.intranet/agora/masterpri/2014/09/120-revision-v1/', 0, 'revision', '', 0),
(122, 1, '2014-09-19 11:55:07', '2014-09-19 11:55:07', '<iframe src="//player.vimeo.com/video/98712736?title=0&amp;byline=0&amp;portrait=0&amp;color=e835af" width="550" height="309" frameborder="0" allowfullscreen="allowfullscreen"></iframe>', 'Notícia 5', '', 'inherit', 'open', 'open', '', '118-revision-v1', '', '', '2014-09-19 11:55:07', '2014-09-19 11:55:07', '', 118, 'http://pwc-int.educacio.intranet/agora/masterpri/2014/09/118-revision-v1/', 0, 'revision', '', 0),
(123, 1, '2014-09-19 11:59:09', '2014-09-19 11:59:09', 'https://soundcloud.com/institut-sabadell/sophie-message\r\n\r\nUn exemple de fitxer d''audio disponible directament des de la targeta resum. Dins de l''article, a la caixa "Paràmetres", heu de marcar la casella "Mostra el contingut sencer".', 'Notícia 1', '', 'inherit', 'open', 'open', '', '13-revision-v1', '', '', '2014-09-19 11:59:09', '2014-09-19 11:59:09', '', 13, 'http://pwc-int.educacio.intranet/agora/masterpri/2014/09/13-revision-v1/', 0, 'revision', '', 0),
(124, 1, '2014-09-19 12:01:27', '2014-09-19 12:01:27', '<iframe width="560" height="315" src="//www.youtube.com/embed/ygwGTiGFGi0?rel=0" frameborder="0" allowfullscreen></iframe> \r\n\r\nUn exemple de video disponible directament des de la targeta resum. Dins de l’article, a la caixa “Paràmetres”, heu de marcar la casella “Mostra el contingut sencer”', 'Notícia 2', '', 'inherit', 'open', 'open', '', '18-revision-v1', '', '', '2014-09-19 12:01:27', '2014-09-19 12:01:27', '', 18, 'http://pwc-int.educacio.intranet/agora/masterpri/2014/09/18-revision-v1/', 0, 'revision', '', 0),
(125, 1, '2014-09-19 15:17:52', '2014-09-19 15:17:52', '', 'Exemple', '', 'publish', 'closed', 'closed', '', 'exemple', '', '', '2014-09-19 15:21:39', '2014-09-19 15:21:39', '', 0, 'http://pwc-int.educacio.intranet/agora/masterpri/?post_type=slideshow&#038;p=125', 0, 'slideshow', '', 0),
(126, 1, '2014-09-19 15:18:28', '2014-09-19 15:18:28', '', 'exemple3', '', 'inherit', 'open', 'open', '', 'exemple3', '', '', '2014-09-19 15:18:28', '2014-09-19 15:18:28', '', 0, 'http://pwc-int.educacio.intranet/agora/masterpri/wp-content/uploads/usu6/2014/09/exemple3.png', 0, 'attachment', 'image/png', 0),
(127, 1, '2014-09-19 15:18:40', '2014-09-19 15:18:40', '', 'imatge_recurs1', '', 'inherit', 'open', 'open', '', 'imatge_recurs1', '', '', '2014-09-19 15:18:40', '2014-09-19 15:18:40', '', 0, 'http://pwc-int.educacio.intranet/agora/masterpri/wp-content/uploads/usu6/2014/09/imatge_recurs1.png', 0, 'attachment', 'image/png', 0),
(128, 1, '2014-09-19 15:18:53', '2014-09-19 15:18:53', '', 'exemple3b', '', 'inherit', 'open', 'open', '', 'exemple3b', '', '', '2014-09-19 15:18:53', '2014-09-19 15:18:53', '', 0, 'http://pwc-int.educacio.intranet/agora/masterpri/wp-content/uploads/usu6/2014/09/exemple3b.png', 0, 'attachment', 'image/png', 0),
(129, 1, '2014-09-19 15:22:04', '2014-09-19 15:22:04', '[slideshow_deploy id=''125'']\r\n\r\n<span style="color: #444444;">Nam semper id ipsum condimentum laoreet. Proin sollicitudin elit ut ligula hendrerit, et hendrerit ante condimentum. Aliquam suscipit feugiat velit, at vehicula lorem pharetra quis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean erat dolor, aliquet vitae ligula suscipit, bibendum malesuada augue.</span>', 'Notícia 3', '', 'inherit', 'open', 'open', '', '113-revision-v1', '', '', '2014-09-19 15:22:04', '2014-09-19 15:22:04', '', 113, 'http://pwc-int.educacio.intranet/agora/masterpri/2014/09/113-revision-v1/', 0, 'revision', '', 0),
(130, 1, '2014-09-19 15:26:19', '2014-09-19 15:26:19', '<iframe src="//player.vimeo.com/video/98712736?title=0&amp;byline=0&amp;portrait=0&amp;color=ff9933" width="550" height="309" frameborder="0" allowfullscreen="allowfullscreen"></iframe>', 'Notícia 5', '', 'inherit', 'open', 'open', '', '118-revision-v1', '', '', '2014-09-19 15:26:19', '2014-09-19 15:26:19', '', 118, 'http://pwc-int.educacio.intranet/agora/masterpri/2014/09/118-revision-v1/', 0, 'revision', '', 0),
(131, 1, '2014-09-22 09:46:48', '2014-09-22 09:46:48', '', 'classe', '', 'inherit', 'open', 'open', '', 'classe', '', '', '2014-09-22 09:46:48', '2014-09-22 09:46:48', '', 0, 'http://pwc-int.educacio.intranet/agora/masterpri/wp-content/uploads/usu6/2014/09/classe.png', 0, 'attachment', 'image/png', 0),
(133, 1, '2014-09-22 10:56:17', '2014-09-22 10:56:17', '', 'albertbachiller', '', 'inherit', 'open', 'open', '', 'albertbachiller', '', '', '2014-09-22 10:56:17', '2014-09-22 10:56:17', '', 0, 'http://pwc-int.educacio.intranet/agora/masterpri/wp-content/uploads/usu6/2014/09/albertbachiller.png', 0, 'attachment', 'image/png', 0),
(134, 1, '2014-09-22 10:57:18', '2014-09-22 10:57:18', 'En aquesta secció cada centre pot crear les pàgines necessàries per a descriure el seu projecte educatiu. D''acord amb la <a title="Article 91 LEC" href="http://www20.gencat.cat/portal/site/portaljuridic/menuitem.d15a4e5dfb99396dc366ec10b0c0e1a0/?vgnextoid=b85297b5a87d6210VgnVCM1000000b0c1e0aRCRD&amp;vgnextchannel=b85297b5a87d6210VgnVCM1000000b0c1e0aRCRD&amp;vgnextfmt=default&amp;action=fitxa&amp;portalId=1&amp;documentId=480169&amp;newLang=ca_ES#fragment-1182442" target="_blank">Llei d''Educació de Catalunya</a>, el projecte educatiu incorpora el caràcter propi del centre i ha de contenir com a mínim els elements següents:\r\n<ul>\r\n	<li>Criteris d''ordenació pedagògica, prioritats i plantejaments educatius, procediments d''inclusió i altres actuacions que caracteritzen el centre.</li>\r\n	<li>Indicadors de progrés.</li>\r\n	<li>Concreció i desenvolupament dels currículums.</li>\r\n	<li>Criteris que defineixen l''estructura organitzativa.</li>\r\n	<li>Projecte lingüístic.</li>\r\n	<li>Caràcter propi del centre, si n''hi ha.</li>\r\n</ul>\r\nEs poden incloure també en aquesta secció altres documents més específics que també formen part del projecte educatiu, com ara: Projecte de convivència, Pla TAC, Pla d''acollida, Projecte d''escola i família, Comunitat d''aprenentatge, etc.\r\n\r\nTambé pot ser interessant fer referència a altres projectes i activitats, com ara: Escola verda, Ràdio a l''escola, Art a l''escola, Cinema en curs, Taller de robòtica, Aprenentatge integrat de Continguts i Llengües Estrangeres (AICLE), Revista de l''escola, Agenda 21, Hort, Patis oberts...\r\n\r\nDonada la diversitat de seccions possibles, s''ha cregut oportú no crear cap pàgina específica en la maqueta inicial, deixant a criteri del centre la decisió sobre la millor manera d''estructurar la descripció del seu projecte educatiu. En crear els apartats és important que la caixa <em>Atributs de la pàgina</em> tingui com a pare/mare “<em>Projecte educatiu</em>“, i que se seleccioni com a plantilla l''opció “<em>Menú lateral</em>“.', 'Projecte educatiu', '', 'inherit', 'open', 'open', '', '64-revision-v1', '', '', '2014-09-22 10:57:18', '2014-09-22 10:57:18', '', 64, 'http://pwc-int.educacio.intranet/agora/masterpri/general/64-revision-v1/', 0, 'revision', '', 0),
(135, 1, '2014-09-22 11:10:14', '2014-09-22 11:10:14', '<iframe src="//www.youtube.com/embed/ygwGTiGFGi0?rel=0" width="560" height="315" frameborder="0" allowfullscreen="allowfullscreen"></iframe>\r\n\r\nUn exemple de video disponible directament des de la targeta resum. Dins de l’article, a la caixa “Paràmetres”, heu de marcar la casella “Mostra el contingut sencer”', 'Notícia 2', '', 'inherit', 'open', 'open', '', '18-revision-v1', '', '', '2014-09-22 11:10:14', '2014-09-22 11:10:14', '', 18, 'http://pwc-int.educacio.intranet/agora/masterpri/general/18-revision-v1/', 0, 'revision', '', 0),
(136, 1, '2014-09-22 11:22:40', '2014-09-22 11:22:40', 'Descripció i enumeració del material escolar que els alumnes i famílies necessitaran per al nivell educatiu corresponent, és recomanable diferenciar les diferents tipologies de material escolar necessari (llibres de text, lectures, dispositius digitals, material de taller, de dibuix…)', 'Material escolar', '', 'inherit', 'open', 'open', '', '36-revision-v1', '', '', '2014-09-22 11:22:40', '2014-09-22 11:22:40', '', 36, 'http://pwc-int.educacio.intranet/agora/masterpri/general/36-revision-v1/', 0, 'revision', '', 0),
(137, 1, '2014-09-22 11:26:00', '2014-09-22 11:26:00', 'De P3 a 6è cada nivell té una pàgina pròpia, que es creen mitjançant les categories.\r\n\r\nLes categories es defineixen des del menú de les entrades del blog. Paral·lelament als nivells també es poden definir més categories.\r\n\r\nJa estan definides les categories: Educació infantil, P3, P4, P5, Educació primària, 1r. curs, 2n. curs, 3r. curs, 4t. curs, 5è. curs, 6è. curs.', 'Nivells', '', 'inherit', 'open', 'open', '', '87-revision-v1', '', '', '2014-09-22 11:26:00', '2014-09-22 11:26:00', '', 87, 'http://pwc-int.educacio.intranet/agora/masterpri/general/87-revision-v1/', 0, 'revision', '', 0),
(138, 1, '2014-09-22 11:26:38', '2014-09-22 11:26:38', 'De P3 a 6è cada nivell té una pàgina pròpia, que es creen mitjançant les categories.\r\n\r\nLes categories es defineixen des del menú de les entrades del blog. Paral·lelament als nivells també es poden definir més categories.\r\n\r\nJa estan definides les categories: Educació infantil, P3, P4, P5, Educació primària, 1r curs, 2n curs, 3r curs, 4t curs, 5è curs, 6è curs.', 'Nivells', '', 'inherit', 'open', 'open', '', '87-revision-v1', '', '', '2014-09-22 11:26:38', '2014-09-22 11:26:38', '', 87, 'http://pwc-int.educacio.intranet/agora/masterpri/general/87-revision-v1/', 0, 'revision', '', 0),
(139, 1, '2014-09-22 16:10:33', '2014-09-22 16:10:33', '', 'screeshot', '', 'inherit', 'open', 'open', '', 'screeshot', '', '', '2014-09-22 16:10:33', '2014-09-22 16:10:33', '', 0, 'http://pwc-int.educacio.intranet/agora/masterpri/wp-content/uploads/usu6/2014/09/screeshot.png', 0, 'attachment', 'image/png', 0),
(140, 1, '2014-09-22 16:11:11', '2014-09-22 16:11:11', '', 'Destacat Nodes', '', 'publish', 'closed', 'closed', '', 'destacat-nodes', '', '', '2014-09-22 16:11:11', '2014-09-22 16:11:11', '', 0, 'http://pwc-int.educacio.intranet/agora/masterpri/?post_type=slideshow&#038;p=140', 0, 'slideshow', '', 0),
(141, 1, '2014-09-22 16:15:19', '2014-09-22 15:15:19', '', 'Nodes', '', 'publish', 'closed', 'closed', '', 'nodes', '', '', '2015-10-27 10:03:57', '2015-10-27 09:03:57', '', 0, 'http://pwc-int.educacio.intranet/agora/masterpri/nodes/', 0, 'page', '', 0),
(142, 1, '2014-09-22 17:09:16', '2014-09-22 17:09:16', '', 'Instal·lacions', '', 'publish', 'closed', 'closed', '', 'instal%c2%b7lacions', '', '', '2014-09-22 17:10:07', '2014-09-22 17:10:07', '', 0, 'http://pwc-int.educacio.intranet/agora/masterpri/?post_type=slideshow&#038;p=142', 0, 'slideshow', '', 0),
(143, 1, '2014-09-22 17:09:36', '2014-09-22 17:09:36', 'Sed quis dolor laoreet, eleifend diam non, tincidunt nisl. Nulla sed venenatis eros. Ut non neque cursus, condimentum leo consequat, tempus ligula. Nulla vel orci sed sapien tincidunt fermentum.\r\n\r\n[slideshow_deploy id=''142'']\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce in feugiat urna, a sagittis nisl. Proin fringilla turpis sed orci ultricies commodo. Morbi ac magna pulvinar lacus feugiat placerat non eu urna. Mauris laoreet nisi tellus, vel vehicula erat ornare mollis. Pellentesque justo erat, maximus a varius vitae, suscipit vel augue. Vivamus mattis sed metus sit amet auctor. Curabitur vel enim enim. Cras cursus leo lorem, ac dictum nibh bibendum non. Maecenas ac mauris felis. Phasellus euismod luctus augue ac vehicula. Sed dignissim libero vitae consequat luctus. Maecenas quis ornare tellus. Aliquam erat volutpat.', 'Instal·lacions', '', 'inherit', 'open', 'open', '', '30-revision-v1', '', '', '2014-09-22 17:09:36', '2014-09-22 17:09:36', '', 30, 'http://pwc-int.educacio.intranet/agora/masterpri/general/30-revision-v1/', 0, 'revision', '', 0),
(145, 1, '2014-10-07 05:43:59', '2014-10-07 05:43:59', '<div class="gce-list-event gce-tooltip-event">[event-title]</div>\r\n[if-not-all-day]\r\n[if-single-day]\r\n<div>Quan: [start-time]-[end-time]</div>\r\n[/if-single-day]\r\n[/if-not-all-day]\r\n[if-multi-day]\r\n<div>Del [start-date] fins el [end-date]</div>\r\n[/if-multi-day]\r\n[if-location]\r\n<div>On: [location]</div>\r\n[/if-location]\r\n[if-description]\r\n<div>[description]</div>\r\n[/if-description]\r\n<div>[link newwindow="true"]Més detalls...[/link]</div>', 'Calendari d''exemple', '', 'publish', 'closed', 'closed', '', '145', '', '', '2015-01-26 11:38:35', '2015-01-26 10:38:35', '', 0, 'http://pwc-int.educacio.intranet/agora/masterpri/gce_feed/145/', 0, 'gce_feed', '', 0),
(148, 1, '2014-12-01 12:44:32', '2014-12-01 11:44:32', ' ', '', '', 'publish', 'open', 'open', '', '148', '', '', '2016-01-21 19:42:18', '2016-01-21 18:42:18', '', 0, 'http://pwc-int.educacio.intranet/agora/masterpri/?p=148', 13, 'nav_menu_item', '', 0),
(149, 1, '2014-12-01 12:44:33', '2014-12-01 11:44:33', ' ', '', '', 'publish', 'open', 'open', '', '149', '', '', '2016-01-21 19:42:18', '2016-01-21 18:42:18', '', 0, 'http://pwc-int.educacio.intranet/agora/masterpri/?p=149', 17, 'nav_menu_item', '', 0),
(150, 1, '2015-01-26 11:57:41', '2015-01-26 10:57:41', '', 'Document 1', '', 'publish', 'open', 'open', '', 'document-1', '', '', '2015-01-26 11:57:54', '2015-01-26 10:57:54', '', 0, 'http://pwc-int.educacio.intranet/agora/masterpri/?p=150', 1, 'nav_menu_item', '', 0),
(151, 1, '2015-01-26 11:57:41', '2015-01-26 10:57:41', '', 'Document 2', '', 'publish', 'open', 'open', '', 'document-2', '', '', '2015-01-26 11:57:54', '2015-01-26 10:57:54', '', 0, 'http://pwc-int.educacio.intranet/agora/masterpri/?p=151', 2, 'nav_menu_item', '', 0),
(152, 1, '2015-01-26 11:57:41', '2015-01-26 10:57:41', '', 'Aplicació 1', '', 'publish', 'open', 'open', '', 'aplicacio-1', '', '', '2015-01-26 11:57:54', '2015-01-26 10:57:54', '', 0, 'http://pwc-int.educacio.intranet/agora/masterpri/?p=152', 3, 'nav_menu_item', '', 0),
(153, 1, '2015-01-26 11:57:41', '2015-01-26 10:57:41', '', 'Aplicació 2', '', 'publish', 'open', 'open', '', 'aplicacio-2', '', '', '2015-01-26 11:57:54', '2015-01-26 10:57:54', '', 0, 'http://pwc-int.educacio.intranet/agora/masterpri/?p=153', 4, 'nav_menu_item', '', 0),
(154, 1, '2015-01-26 11:57:41', '2015-01-26 10:57:41', '', 'Web 1', '', 'publish', 'open', 'open', '', 'web-1', '', '', '2015-01-26 11:57:54', '2015-01-26 10:57:54', '', 0, 'http://pwc-int.educacio.intranet/agora/masterpri/?p=154', 5, 'nav_menu_item', '', 0),
(155, 1, '2015-01-26 11:57:41', '2015-01-26 10:57:41', '', 'Web 2', '', 'publish', 'open', 'open', '', 'web-2', '', '', '2015-01-26 11:57:54', '2015-01-26 10:57:54', '', 0, 'http://pwc-int.educacio.intranet/agora/masterpri/?p=155', 6, 'nav_menu_item', '', 0),
(156, 1, '2015-01-26 11:59:04', '2015-01-26 10:59:04', '', 'foto-classe', '', 'inherit', 'open', 'open', '', 'foto-classe', '', '', '2015-01-26 11:59:04', '2015-01-26 10:59:04', '', 0, 'http://pwc-int.educacio.intranet/agora/masterpri/wp-content/uploads/usu6/2015/01/foto-classe.png', 0, 'attachment', 'image/png', 0),
(157, 1, '2015-01-27 14:32:41', '2015-01-27 13:32:41', ' ', '', '', 'publish', 'open', 'open', '', '157', '', '', '2015-01-27 14:32:41', '2015-01-27 13:32:41', '', 2, 'http://pwc-int.educacio.intranet/agora/masterpri/?p=157', 2, 'nav_menu_item', '', 0),
(158, 1, '2015-01-27 14:32:41', '2015-01-27 13:32:41', ' ', '', '', 'publish', 'open', 'open', '', '158', '', '', '2015-01-27 14:32:41', '2015-01-27 13:32:41', '', 2, 'http://pwc-int.educacio.intranet/agora/masterpri/?p=158', 1, 'nav_menu_item', '', 0),
(159, 1, '2015-01-27 14:32:41', '2015-01-27 13:32:41', ' ', '', '', 'publish', 'open', 'open', '', '159', '', '', '2015-01-27 14:32:41', '2015-01-27 13:32:41', '', 2, 'http://pwc-int.educacio.intranet/agora/masterpri/?p=159', 3, 'nav_menu_item', '', 0),
(160, 1, '2015-01-27 14:35:05', '2015-01-27 13:35:05', ' ', '', '', 'publish', 'open', 'open', '', '160', '', '', '2015-01-27 14:35:11', '2015-01-27 13:35:11', '', 5, 'http://pwc-int.educacio.intranet/agora/masterpri/?p=160', 1, 'nav_menu_item', '', 0),
(161, 1, '2015-01-27 14:35:05', '2015-01-27 13:35:05', ' ', '', '', 'publish', 'open', 'open', '', '161', '', '', '2015-01-27 14:35:11', '2015-01-27 13:35:11', '', 5, 'http://pwc-int.educacio.intranet/agora/masterpri/?p=161', 2, 'nav_menu_item', '', 0),
(162, 1, '2015-01-27 14:35:05', '2015-01-27 13:35:05', ' ', '', '', 'publish', 'open', 'open', '', '162', '', '', '2015-01-27 14:35:11', '2015-01-27 13:35:11', '', 5, 'http://pwc-int.educacio.intranet/agora/masterpri/?p=162', 4, 'nav_menu_item', '', 0),
(163, 1, '2015-01-27 14:35:05', '2015-01-27 13:35:05', ' ', '', '', 'publish', 'open', 'open', '', '163', '', '', '2015-01-27 14:35:11', '2015-01-27 13:35:11', '', 5, 'http://pwc-int.educacio.intranet/agora/masterpri/?p=163', 3, 'nav_menu_item', '', 0),
(164, 1, '2015-01-27 14:35:05', '2015-01-27 13:35:05', ' ', '', '', 'publish', 'open', 'open', '', '164', '', '', '2015-01-27 14:35:11', '2015-01-27 13:35:11', '', 5, 'http://pwc-int.educacio.intranet/agora/masterpri/?p=164', 5, 'nav_menu_item', '', 0),
(165, 1, '2015-01-27 14:35:05', '2015-01-27 13:35:05', ' ', '', '', 'publish', 'open', 'open', '', '165', '', '', '2015-01-27 14:35:11', '2015-01-27 13:35:11', '', 5, 'http://pwc-int.educacio.intranet/agora/masterpri/?p=165', 6, 'nav_menu_item', '', 0),
(166, 1, '2015-01-27 15:41:50', '2015-01-27 14:41:50', 'El caràcter d''aquesta pàgina ha de ser bàsicament informatiu. En aquesta secció cal fer una referència directa a qüestions de salut que afectin directament als alumnes del centre. Es pot categoritzar la informació, per exemple, entre <strong>medicaments</strong>, <strong>al·lèrgies</strong> i <strong>paràsits</strong>.\r\n\r\n&nbsp;\r\n\r\n&nbsp;\r\n\r\n&nbsp;\r\n\r\n&nbsp;\r\n\r\n&nbsp;', 'Salut', '', 'inherit', 'open', 'open', '', '38-revision-v1', '', '', '2015-01-27 15:41:50', '2015-01-27 14:41:50', '', 38, 'http://pwc-int.educacio.intranet/agora/masterpri/general/38-revision-v1/', 0, 'revision', '', 0),
(168, 1, '2015-07-28 08:59:19', '2015-07-28 07:59:19', '<iframe src="//www.youtube.com/embed/ygwGTiGFGi0?rel=0" width="560" height="315" frameborder="0" allowfullscreen="allowfullscreen"></iframe>\r\n\r\nUn exemple de vídeo disponible directament des de la targeta resum. Dins de l’article, a la caixa “Paràmetres”, heu de marcar la casella “Mostra el contingut sencer”.', 'Notícia 2', '', 'inherit', 'open', 'open', '', '18-revision-v1', '', '', '2015-07-28 08:59:19', '2015-07-28 07:59:19', '', 18, 'http://pwc-int.educacio.intranet/agora/masterpri/general/18-revision-v1/', 0, 'revision', '', 0),
(169, 1, '2015-07-28 08:59:29', '2015-07-28 07:59:29', 'https://soundcloud.com/institut-sabadell/sophie-message\r\n\r\nUn exemple de fitxer d''àudio disponible directament des de la targeta resum. Dins de l''article, a la caixa "Paràmetres", heu de marcar la casella "Mostra el contingut sencer".', 'Notícia 1', '', 'inherit', 'open', 'open', '', '13-revision-v1', '', '', '2015-07-28 08:59:29', '2015-07-28 07:59:29', '', 13, 'http://pwc-int.educacio.intranet/agora/masterpri/general/13-revision-v1/', 0, 'revision', '', 0),
(170, 1, '2015-07-28 09:04:04', '2015-07-28 08:04:04', 'Aquesta és una pàgina d''exemple. És diferent d''una entrada del blog perquè romandrà sempre al mateix lloc i es mostrarà al menú de navegació de la pàgina web (a molts temes). La majoria de gent comença amb una pàgina quant a que els presenta als visitants potencials de la pàgina web. Podria ser quelcom com això:\r\n\r\n<blockquote>Hola a tothom! Treballo de missatger en bicicleta de dia, sóc un aspirant a actor de nit, i aquest és el meu bloc. Visc a Barcelona, tinc un gos meravellós que es diu Pep, i m''agraden les calçotades (i quedar atrapat per la pluja.)</blockquote>\r\n\r\n... o potser això:\r\n<blockquote>La companyia Enginys XYZ es va fundar el 1971, i ha proveït al públic d''enginys de qualitat des de llavors. Ubicada a Gotham City, XYZ dóna treball a més de 2.000 persones i fa tot tipus de coses impressionants per a la comunitat de Gotham.</blockquote>\r\n\r\nCom a blogaire nou o nova del WordPress, hauríeu d''anar al <a href="http://pwc-int.educacio.intranet/agora/masterpri/wp-admin/">tauler</a> per suprimir aquesta pàgina i crear-ne de noves amb el vostre contingut. A passar-ho bé!', 'Pàgina d''exemple', '', 'inherit', 'open', 'open', '', '2-revision-v1', '', '', '2015-07-28 09:04:04', '2015-07-28 08:04:04', '', 2, 'http://pwc-int.educacio.intranet/agora/masterpri/general/2-revision-v1/', 0, 'revision', '', 0),
(171, 1, '2015-07-28 09:05:00', '2015-07-28 08:05:00', 'L''oferta de <strong>serveis digitals</strong> constitueix un element molt important de l''engranatge d''un centre educatiu.\r\n\r\nEn aquesta pàgina es poden referenciar altres serveis en línia que ofereix l''escola com ara Moodle, blogs externs, aplicacions de tutoria o gestió acadèmica, aplicacions mòbils, etc.\r\n\r\nSi el centre posa en funcionament la <strong>xarxa Nodes</strong>, aquest pot ser un bon lloc per referenciar els principals grups i activitats que s''hi duen a terme.', 'Serveis digitals', '', 'inherit', 'open', 'open', '', '71-revision-v1', '', '', '2015-07-28 09:05:00', '2015-07-28 08:05:00', '', 71, 'http://pwc-int.educacio.intranet/agora/masterpri/general/71-revision-v1/', 0, 'revision', '', 0),
(172, 1, '2015-07-28 09:05:39', '2015-07-28 08:05:39', '<p style="color: #666666;">Ma quande lingues coalesce, li grammatica del resultant lingue es plu simplic e regulari quam ti del coalescent lingues. Li nov lingua franca va esser plu simplic e regulari quam li existent Europan lingues. It va esser tam simplic quam Occidental in fact, it va esser Occidental.</p>\n<p style="color: #666666;">A un Angleso it va semblar un simplificat Angles, quam un skeptic Cambridge amico dit me que Occidental es. Li Europan lingues es membres del sam familie. Lor separat existentie es un myth. Por scientie, musica, sport etc, litot Europa usa li sam vocabular. Li lingues differe solmen in li grammatica, li pronunciation e li plu commun vocabules. Omnicos directe al desirabilite de un nov lingua franca: On refusa continuar payar custosi traductores. At solmen va esser necessi far uniform grammatica, pronunciation e plu sommun paroles.</p>', 'Transport Escolar', '', 'inherit', 'open', 'open', '', '80-autosave-v1', '', '', '2015-07-28 09:05:39', '2015-07-28 08:05:39', '', 80, 'http://pwc-int.educacio.intranet/agora/masterpri/general/80-autosave-v1/', 0, 'revision', '', 0),
(173, 1, '2015-10-09 13:29:15', '2015-10-09 12:29:15', '', 'Mur general', '', 'publish', 'open', 'open', '', 'mur-general', '', '', '2015-10-09 13:29:15', '2015-10-09 12:29:15', '', 0, 'http://pwc-int.educacio.intranet/agora/masterpri/?p=173', 1, 'nav_menu_item', '', 0),
(174, 1, '2015-10-09 13:29:15', '2015-10-09 12:29:15', ' ', '', '', 'publish', 'open', 'open', '', '174', '', '', '2015-10-09 13:29:15', '2015-10-09 12:29:15', '', 0, 'http://pwc-int.educacio.intranet/agora/masterpri/?p=174', 3, 'nav_menu_item', '', 0),
(175, 1, '2015-10-09 13:29:15', '2015-10-09 12:29:15', ' ', '', '', 'publish', 'open', 'open', '', '175', '', '', '2015-10-09 13:29:15', '2015-10-09 12:29:15', '', 0, 'http://pwc-int.educacio.intranet/agora/masterpri/?p=175', 2, 'nav_menu_item', '', 0),
(176, 1, '2015-10-27 10:03:57', '2015-10-27 09:03:57', '', 'Nodes', '', 'inherit', 'open', 'open', '', '141-revision-v1', '', '', '2015-10-27 10:03:57', '2015-10-27 09:03:57', '', 141, 'http://pwc-int.educacio.intranet/agora/masterpri/general/141-revision-v1/', 0, 'revision', '', 0),
(177, 1, '2015-10-27 10:04:11', '2015-10-27 09:04:11', '', 'Activitat', '', 'inherit', 'open', 'open', '', '5-revision-v1', '', '', '2015-10-27 10:04:11', '2015-10-27 09:04:11', '', 5, 'http://pwc-int.educacio.intranet/agora/masterpri/general/5-revision-v1/', 0, 'revision', '', 0),
(178, 1, '2015-10-27 10:05:14', '2015-10-27 09:05:14', '', 'Membres', '', 'inherit', 'open', 'open', '', '6-revision-v1', '', '', '2015-10-27 10:05:14', '2015-10-27 09:05:14', '', 6, 'http://pwc-int.educacio.intranet/agora/masterpri/general/6-revision-v1/', 0, 'revision', '', 0),
(292, 1, '2016-01-21 09:53:14', '2016-01-21 08:53:14', 'Autorització relativa als alumnes: ús d''imatges, publicació de dades de caràcter personal i de material que elaboren (menors de 14 anys)\r\n\r\n<a href="http://xtec.cat/monografics/nodes/links.html?id=imatge_menors_14" target="_blank">Enllaç al document</a>', 'Autorització drets d’imatge, dades i materials (menors de 14 anys)', '', 'publish', 'open', 'open', '', 'autoritzacio-drets-dimatge-dades-i-materials-menors-de-14-anys', '', '', '2016-01-21 19:33:08', '2016-01-21 18:33:08', '', 0, 'http://pwc-int.educacio.intranet/agora/masterpri/docs/', 0, 'bp_doc', '', 0),
(297, 1, '2016-01-21 09:59:27', '2016-01-21 08:59:27', 'Autorització relativa als alumnes de menys de 14 anys: ús de serveis i recursos digitals per treballar a l''aula.\r\n\r\n<a href="http://xtec.cat/monografics/nodes/links.html?id=serveis_menors_14">Enllaç al document</a>', 'Autorització ús de serveis i recursos digitals a l’aula (menors de 14 anys)', '', 'publish', 'open', 'open', '', 'autoritzacio-us-de-serveis-i-recursos-digitals-a-laula-menors-de-14-anys', '', '', '2016-01-21 19:33:01', '2016-01-21 18:33:01', '', 0, 'http://pwc-int.educacio.intranet/agora/masterpri/docs/', 0, 'bp_doc', '', 0),
(302, 1, '2016-01-21 10:07:15', '2016-01-21 09:07:15', '<a href="http://xtec.cat/monografics/nodes/links.html?id=paracetamol" target="_blank">Enllaç al document</a>', 'Autorització per a l’administració del paracetamol', '', 'publish', 'open', 'open', '', 'autoritzacio-per-a-ladministracio-del-paracetamol', '', '', '2016-01-21 19:32:54', '2016-01-21 18:32:54', '', 0, 'http://pwc-int.educacio.intranet/agora/masterpri/docs/', 0, 'bp_doc', '', 0),
(304, 1, '2016-01-21 10:13:32', '2016-01-21 09:13:32', 'Declaració responsable justificativa d’absència per motius de salut d’assistència a consulta mèdica. Personal docent.\r\n\r\n<a href="http://xtec.cat/monografics/nodes/links.html?id=consulta_metge" target="_blank">Enllaç al document</a>', 'Justificant d’absència per motius de salut o consulta mèdica', '', 'publish', 'open', 'open', '', 'justificant-dabsencia-per-motius-de-salut-o-consulta-medica', '', '', '2016-01-21 19:32:46', '2016-01-21 18:32:46', '', 0, 'http://pwc-int.educacio.intranet/agora/masterpri/docs/', 0, 'bp_doc', '', 0),
(308, 1, '2016-01-21 10:22:39', '2016-01-21 09:22:39', '<ul>\r\n	<li>Llicència per estudis (sense retribució). Màxim: un curs escolar</li>\r\n	<li>Llicència per assumptes propis</li>\r\n	<li>Llicència per accident laboral</li>\r\n	<li>Llicència per incapacitat temporal per malaltia comuna i risc durant l’embaràs</li>\r\n</ul>\r\n<a href="http://xtec.cat/monografics/nodes/links.html?id=llicencia" target="_blank">Enllaç al document</a>\r\n\r\n&nbsp;', 'Sol·licitud de llicència', '', 'publish', 'open', 'open', '', 'sol%c2%b7licitud-de-llicencia', '', '', '2016-01-21 19:32:38', '2016-01-21 18:32:38', '', 0, 'http://pwc-int.educacio.intranet/agora/masterpri/docs/', 0, 'bp_doc', '', 0),
(312, 1, '2016-01-21 10:26:50', '2016-01-21 09:26:50', '<a href="http://xtec.cat/monografics/nodes/links.html?id=jurada_permisos_llicencies" target="_blank">Enllaç al document</a>', 'Declaració jurada o promesa per sol·licitar permisos i llicències', '', 'publish', 'open', 'open', '', 'declaracio-jurada-o-promesa-per-sol%c2%b7licitar-permisos-i-llicencies', '', '', '2016-01-21 19:32:30', '2016-01-21 18:32:30', '', 0, 'http://pwc-int.educacio.intranet/agora/masterpri/docs/', 0, 'bp_doc', '', 0),
(314, 1, '2016-01-21 10:30:24', '2016-01-21 09:30:24', '<a href="http://xtec.cat/monografics/nodes/links.html?id=reduccio_cura_fills" target="_blank">Enllaç al document</a>', 'Sol·licitud de reducció de jornada per tenir cura d’un fill o filla', '', 'publish', 'open', 'open', '', 'sol%c2%b7licitud-de-reduccio-de-jornada-per-tenir-cura-dun-fill-o-filla', '', '', '2016-01-21 19:32:16', '2016-01-21 18:32:16', '', 0, 'http://pwc-int.educacio.intranet/agora/masterpri/docs/', 0, 'bp_doc', '', 0),
(317, 1, '2016-01-21 12:14:13', '2016-01-21 11:14:13', 'Sol·licitud de compatibilitat per a activitats públiques i/o privades\r\n<a style="line-height: 1.5;" href="http://xtec.cat/monografics/nodes/links.html?id=compatibilitat" target="_blank">Enllaç al document</a>', 'Sol·licitud de Compatibilitat', '', 'publish', 'open', 'open', '', 'sol%c2%b7licitud-de-compatibilitat', '', '', '2016-01-21 19:31:54', '2016-01-21 18:31:54', '', 0, 'http://pwc-int.educacio.intranet/agora/masterpri/docs/', 0, 'bp_doc', '', 0),
(318, 1, '2016-01-21 12:08:22', '2016-01-21 11:08:22', '<a href="http://xtec.cat/monografics/nodes/links.html?id=triennis" target="_blank">Enllaç al document</a>', 'Sol·licitud de reconeixement de triennis', '', 'publish', 'open', 'open', '', 'sol%c2%b7licitud-de-reconeixement-de-triennis', '', '', '2016-01-21 19:32:09', '2016-01-21 18:32:09', '', 0, 'http://pwc-int.educacio.intranet/agora/masterpri/docs/', 0, 'bp_doc', '', 0),
(320, 1, '2016-01-21 12:11:38', '2016-01-21 11:11:38', 'Sol·licitud de reconeixement d’estadi de promoció docent\r\n\r\n<a href="http://xtec.cat/monografics/nodes/links.html?id=promocio">Enllaç al document</a>', 'Sol·licitud de reconeixement d’estadi de promoció docent', '', 'publish', 'open', 'open', '', 'sol%c2%b7licitud-de-reconeixement-destadi-de-promocio-docent', '', '', '2016-01-21 19:32:01', '2016-01-21 18:32:01', '', 0, 'http://pwc-int.educacio.intranet/agora/masterpri/docs/', 0, 'bp_doc', '', 0),
(323, 1, '2016-01-21 12:17:45', '2016-01-21 11:17:45', '<ul>\r\n	<li>Ordre del dia</li>\r\n	<li>Desenvolupament de la sessió</li>\r\n	<li>Acords</li>\r\n	<li>Temes pendents</li>\r\n</ul>\r\n<a href="http://xtec.cat/monografics/nodes/links.html?id=acta_reunio" target="_blank">Enllaç al document</a>', 'Model d’acta de reunió', '', 'publish', 'open', 'open', '', 'model-dacta-de-reunio', '', '', '2016-01-21 19:31:47', '2016-01-21 18:31:47', '', 0, 'http://pwc-int.educacio.intranet/agora/masterpri/docs/', 0, 'bp_doc', '', 0),
(326, 1, '2016-01-21 12:20:11', '2016-01-21 11:20:11', '<a href="http://xtec.cat/monografics/nodes/links.html?id=declaracio_jurada" target="_blank">Enllaç al document</a>', 'Declaració jurada', '', 'publish', 'open', 'open', '', 'declaracio-jurada', '', '', '2016-01-21 19:31:40', '2016-01-21 18:31:40', '', 0, 'http://pwc-int.educacio.intranet/agora/masterpri/docs/', 0, 'bp_doc', '', 0),
(328, 1, '2016-01-21 12:22:12', '2016-01-21 11:22:12', '<a href="http://xtec.cat/monografics/nodes/links.html?id=solicitud" target="_blank">Enllaç al document</a>', 'Sol·licitud (genèrica)', '', 'publish', 'open', 'open', '', 'sol%c2%b7licitud-generica', '', '', '2016-01-21 19:31:33', '2016-01-21 18:31:33', '', 0, 'http://pwc-int.educacio.intranet/agora/masterpri/docs/', 0, 'bp_doc', '', 0),
(330, 1, '2016-01-21 12:23:59', '2016-01-21 11:23:59', 'Model de certificat\r\n\r\n<a href="http://xtec.cat/monografics/nodes/links.html?id=certificat" target="_blank">Enllaç al document</a>', 'Certificat', '', 'publish', 'open', 'open', '', 'certificat', '', '', '2016-01-21 19:31:26', '2016-01-21 18:31:26', '', 0, 'http://pwc-int.educacio.intranet/agora/masterpri/docs/', 0, 'bp_doc', '', 0),
(332, 1, '2016-01-21 12:25:21', '2016-01-21 11:25:21', '<a href="http://xtec.cat/monografics/nodes/links.html?id=reunio_ordinaria" target="_blank">Enllaç al document</a>', 'Model de Reunió ordinaria', '', 'publish', 'open', 'open', '', 'model-de-reunio-ordinaria', '', '', '2016-01-21 19:31:20', '2016-01-21 18:31:20', '', 0, 'http://pwc-int.educacio.intranet/agora/masterpri/docs/', 0, 'bp_doc', '', 0),
(334, 1, '2016-01-21 12:32:44', '2016-01-21 11:32:44', 'Model reunió extraordinària\r\n\r\n<a href="http://xtec.cat/monografics/nodes/links.html?id=reunio_extraordinaria" target="_blank">Enllaç al document</a>', 'Reunió extraordinària', '', 'publish', 'open', 'open', '', 'reunio-extraordinaria', '', '', '2016-01-21 19:31:10', '2016-01-21 18:31:10', '', 0, 'http://pwc-int.educacio.intranet/agora/masterpri/docs/', 0, 'bp_doc', '', 0),
(336, 1, '2016-01-21 13:05:40', '2016-01-21 12:05:40', 'Sol·licitud de control de glucosa als alumnes amb diabetis i autorització de l’administració d’insulina\n\n<a href="http://xtec.cat/monografics/nodes/links.html?id=control_diabetes" target="_blank">Enllaç al document</a>', 'Sol·licitud de control de glucosa i administració d’insulina', '', 'publish', 'open', 'open', '', 'sol%c2%b7licitud-de-control-de-glucosa-i-administracio-dinsulina', '', '', '2016-01-21 13:05:40', '2016-01-21 12:05:40', '', 0, 'http://pwc-int.educacio.intranet/agora/masterpri/docs/', 0, 'bp_doc', '', 0),
(338, 1, '2016-01-21 13:08:02', '2016-01-21 12:08:02', '<a href="http://xtec.cat/monografics/nodes/links.html?id=administracio_insulina" target="_blank">Enllaç al document</a>', 'Sol·licitud i autorització d’administració de glucagó als alumnes amb diabetis', '', 'publish', 'open', 'open', '', 'sol%c2%b7licitud-i-autoritzacio-dadministracio-de-glucago-als-alumnes-amb-diabetis', '', '', '2016-01-21 13:08:02', '2016-01-21 12:08:02', '', 0, 'http://pwc-int.educacio.intranet/agora/masterpri/docs/', 0, 'bp_doc', '', 0),
(339, 1, '2016-01-21 13:08:37', '2016-01-21 12:08:37', '<a href="http://xtec.cat/monografics/nodes/links.html?id=orientacions_compromis" target="_blank">Enllaç al document</a>', 'Orientacions per elaborar la carta de compromís', '', 'publish', 'open', 'open', '', 'orientacions-per-elaborar-la-carta-de-compromis', '', '', '2016-01-21 19:31:02', '2016-01-21 18:31:02', '', 0, 'http://pwc-int.educacio.intranet/agora/masterpri/docs/', 0, 'bp_doc', '', 0),
(348, 1, '2016-01-21 13:15:18', '2016-01-21 12:15:18', '<a href="http://xtec.cat/monografics/nodes/links.html?id=programacions_recursos" target="_blank">Enllaç al document</a>', 'Programacions i recursos didàctics', '', 'publish', 'open', 'open', '', 'programacions-i-recursos-didactics', '', '', '2016-01-21 19:30:53', '2016-01-21 18:30:53', '', 0, 'http://pwc-int.educacio.intranet/agora/masterpri/docs/', 0, 'bp_doc', '', 0);
INSERT INTO `wp_posts` (`ID`, `post_author`, `post_date`, `post_date_gmt`, `post_content`, `post_title`, `post_excerpt`, `post_status`, `comment_status`, `ping_status`, `post_password`, `post_name`, `to_ping`, `pinged`, `post_modified`, `post_modified_gmt`, `post_content_filtered`, `post_parent`, `guid`, `menu_order`, `post_type`, `post_mime_type`, `comment_count`) VALUES
(350, 1, '2016-01-21 13:16:21', '2016-01-21 12:16:21', '<a href="http://xtec.cat/monografics/nodes/links.html?id=convivencia" target="_blank">Enllaç al document</a>', 'Convivència i clima escolar', '', 'publish', 'open', 'open', '', 'convivencia-i-clima-escolar', '', '', '2016-01-21 19:30:45', '2016-01-21 18:30:45', '', 0, 'http://pwc-int.educacio.intranet/agora/masterpri/docs/', 0, 'bp_doc', '', 0),
(352, 1, '2016-01-21 13:17:24', '2016-01-21 12:17:24', '<a href="http://xtec.cat/monografics/nodes/links.html?id=docs_gestio" target="_blank">Enllaç al document</a>', 'Documents de gestió de centre', '', 'publish', 'open', 'open', '', 'documents-de-gestio-de-centre', '', '', '2016-01-21 19:30:38', '2016-01-21 18:30:38', '', 0, 'http://pwc-int.educacio.intranet/agora/masterpri/docs/', 0, 'bp_doc', '', 0),
(354, 1, '2016-01-21 13:18:28', '2016-01-21 12:18:28', 'Documents per a l''organització i la gestió dels centres\r\n\r\n<a href="http://xtec.cat/monografics/nodes/links.html?id=docs_tac" target="_blank">Enllaç al document</a>', 'Tecnologies per a l’aprenentatge i el coneixement', '', 'publish', 'open', 'open', '', 'tecnologies-per-a-laprenentatge-i-el-coneixement', '', '', '2016-01-21 19:30:29', '2016-01-21 18:30:29', '', 387, 'http://pwc-int.educacio.intranet/agora/masterpri/docs/', 0, 'bp_doc', '', 0),
(356, 1, '2016-01-21 13:19:20', '2016-01-21 12:19:20', '<a href="http://xtec.cat/monografics/nodes/links.html?id=innovacio" target="_blank">Enllaç al document</a>', 'Innovació pedagògica', '', 'publish', 'open', 'open', '', 'innovacio-pedagogica', '', '', '2016-01-21 19:30:09', '2016-01-21 18:30:09', '', 387, 'http://pwc-int.educacio.intranet/agora/masterpri/docs/', 0, 'bp_doc', '', 0),
(358, 1, '2016-01-21 13:20:28', '2016-01-21 12:20:28', 'Objectius prioritaris del sistema educatiu i projecte educatiu de centre\r\n\r\n<a href="http://xtec.cat/monografics/nodes/links.html?id=objectius_prioritaris" target="_blank">Enllaç al document</a>', 'Orientacions projecte educatiu de centre', '', 'publish', 'open', 'open', '', 'projecte-educatiu-de-centre', '', '', '2016-01-21 19:29:05', '2016-01-21 18:29:05', '', 387, 'http://pwc-int.educacio.intranet/agora/masterpri/docs/', 0, 'bp_doc', '', 0),
(360, 1, '2016-01-21 13:21:29', '2016-01-21 12:21:29', '<a href="http://xtec.cat/monografics/nodes/links.html?id=participacio_comunitat" target="_blank">Enllaç al document</a>', 'Participació de la comunitat educativa', '', 'publish', 'open', 'open', '', 'participacio-de-la-comunitat-educativa', '', '', '2016-01-21 19:28:56', '2016-01-21 18:28:56', '', 387, 'http://pwc-int.educacio.intranet/agora/masterpri/docs/', 0, 'bp_doc', '', 0),
(362, 1, '2016-01-21 13:22:40', '2016-01-21 12:22:40', '<a href="http://xtec.cat/monografics/nodes/links.html?id=projecte_llinguistic" target="_blank">Enllaç al document</a>', 'El projecte lingüístic', '', 'publish', 'open', 'open', '', 'el-projecte-linguistic', '', '', '2016-01-21 19:28:49', '2016-01-21 18:28:49', '', 0, 'http://pwc-int.educacio.intranet/agora/masterpri/docs/', 0, 'bp_doc', '', 0),
(364, 1, '2016-01-21 13:23:43', '2016-01-21 12:23:43', '<a href="http://xtec.cat/monografics/nodes/links.html?id=avaluacio_centre" target="_blank">Enllaç al document</a>', 'Avaluació de centre', '', 'publish', 'open', 'open', '', 'avaluacio-de-centre', '', '', '2016-01-21 19:28:27', '2016-01-21 18:28:27', '', 387, 'http://pwc-int.educacio.intranet/agora/masterpri/docs/', 0, 'bp_doc', '', 0),
(366, 1, '2016-01-21 13:55:35', '2016-01-21 12:55:35', '<a href="http://xtec.cat/monografics/nodes/links.html?id=doc_centre" target="_blank">Enllaç al document</a>', 'Document genèric de centre', '', 'publish', 'open', 'open', '', 'document-generic-de-centre', '', '', '2016-01-21 19:28:13', '2016-01-21 18:28:13', '', 0, 'http://pwc-int.educacio.intranet/agora/masterpri/docs/', 0, 'bp_doc', '', 0),
(379, 1, '2016-01-21 16:13:07', '2016-01-21 15:13:07', '<a href="http://xtec.cat/monografics/nodes/links.html?id=docs_administratius" target="_blank">Pàgina de referència</a> del portal de centres (Departament d''Ensenyament)\r\nRequereix validació amb usuari XTEC.\r\n<div class="elemento">\r\n<h4></h4>\r\n<div style="text-align: justify;">\r\n\r\nIndex dels documents que trobareu, de cada document administratiu, plantilles, esquemes, exemples, l''explicació de la seva estructura i la legislació que cal aplicar-hi.\r\n\r\n</div>\r\n</div>\r\n<div class="elistado">\r\n<h3></h3>\r\n<strong>Acta de reunió</strong> Document mitjançant el qual es deixa constància de les incidències, les deliberacions i els acords d’un òrgan col·legiat.\r\n\r\n</div>\r\n<div class="elistado">\r\n<h3></h3>\r\n<strong>Certificat</strong> Document amb què es dóna fe pública i per escrit d’alguna circumstància, fet o actuació.\r\n\r\n</div>\r\n<div class="elistado">\r\n<h3></h3>\r\n<strong>Comunicat intern </strong>Document no oficial amb què es fa arribar informació diversa a les unitats o al personal d’un organisme.\r\n\r\n</div>\r\n<div class="elistado">\r\n<h3></h3>\r\n<strong>Contracte i conveni</strong> Document en què es recull l’acord de voluntats entre diferents persones o institucions per fer o no fer una determinada cosa.\r\n\r\n</div>\r\n<div class="elistado">\r\n<h3></h3>\r\n<strong>Convocatòria de reunió</strong> Document per mitjà del qual se sol·licita l’assistència d’una persona a una sessió d’un òrgan col·legiat.\r\n\r\n</div>\r\n<div class="elistado">\r\n<h3></h3>\r\n<strong>Currículum </strong>Document en què es detallen el conjunt de les dades personals i els mèrits acadèmics i professionals d’una persona.\r\n\r\n</div>\r\n<div class="elistado">\r\n<h3></h3>\r\n<strong>Declaració jurada</strong> Document amb què es manifesta sota jurament o promesa un fet o esdeveniment.\r\n\r\n</div>\r\n<div class="elistado">\r\n<h3></h3>\r\n<strong>Diligència</strong> Document mitjançant el qual l’Administració fa constar internament l’execució d’un fet o una actuació determinada.\r\n\r\n</div>\r\n<div class="elistado">\r\n<h3></h3>\r\n<strong>Edicte</strong> Document que s’utilitza per acomplir una disposició legal, per citar algú o per anunciar la celebració d’un acte.\r\n\r\n</div>\r\n<div class="elistado">\r\n<h3></h3>\r\n<strong>Informe</strong> Document per mitjà del qual s’exposen tots els elements tècnics i jurídics relatius a un assumpte que cal tenir en compte per resoldre un procediment.\r\n\r\n</div>\r\n<div class="elistado">\r\n<h3></h3>\r\n<strong>Invitació </strong>Document amb què es convida algú a un acte públic.\r\n\r\n</div>\r\n<div class="elistado">\r\n<h3></h3>\r\n<strong>Ofici extern</strong> Document monotemàtic amb què l’Administració comunica continguts relacionats amb la tramitació d’un expedient a altres òrgans de l’Administració o bé als ciutadans.\r\n\r\n</div>\r\n<div class="elistado">\r\n<h3></h3>\r\n<strong>Ofici intern</strong> Document monotemàtic que utilitza l’Administració per establir comunicació entre els diferents òrgans administratius.\r\n\r\n</div>\r\n<div class="elistado">\r\n<h3></h3>\r\n<strong>Plec de clàusules administratives</strong> Document en què es recullen les bases i els referents necessaris abans de la formulació de determinats contractes.\r\n\r\n</div>\r\n<div class="elistado">\r\n<h3></h3>\r\n<strong>Recurs</strong> Document per mitjà del qual una persona expressa la seva disconformitat amb una resolució administrativa.\r\n\r\n</div>\r\n<div class="elistado">\r\n<h3></h3>\r\n<strong>Resolució</strong> Document per mitjà del qual es presenta la decisió d’un òrgan administratiu quan finalitza el procediment administratiu.\r\n\r\n</div>\r\n<div class="elistado">\r\n<h3></h3>\r\n<strong>Saluda</strong> Document de caràcter protocol·lari amb què es trameten agraïments, felicitacions, etc.\r\n\r\n</div>\r\n<div class="elistado">\r\n<h3></h3>\r\n<strong>Sol·licitud</strong> Document per mitjà del qual l’administrat demana a l’Administració alguna cosa referent a una matèria de tramitació reglada.\r\n\r\n</div>', 'Documents administratius', '', 'publish', 'open', 'open', '', 'documents-administratius', '', '', '2016-01-21 19:27:49', '2016-01-21 18:27:49', '', 0, 'http://pwc-int.educacio.intranet/agora/masterpri/docs/', 0, 'bp_doc', '', 0),
(383, 1, '2016-01-21 16:17:21', '2016-01-21 15:17:21', '<a href="http://xtec.cat/monografics/nodes/links.html?id=competencies_basiques" target="_blank">Pàgina de referència</a> al portal de centres (Departament d''Ensenyament)', 'Competències bàsiques', '', 'publish', 'open', 'open', '', 'competencies-basiques', '', '', '2016-01-21 19:26:42', '2016-01-21 18:26:42', '', 0, 'http://pwc-int.educacio.intranet/agora/masterpri/docs/', 0, 'bp_doc', '', 0),
(385, 1, '2016-01-21 16:22:17', '2016-01-21 15:22:17', 'Consells i orientacions d''estil.\r\n<a href="http://educacio.gencat.cat/documents/IPCrecursos/Plantilles/Guia_Estil_Departament.pdf" target="_blank">Enllaç al document</a>', 'Guia d’estil del Departament d’Ensenyament', '', 'publish', 'open', 'open', '', 'guia-destil-del-departament-densenyament', '', '', '2016-01-21 19:26:22', '2016-01-21 18:26:22', '', 0, 'http://pwc-int.educacio.intranet/agora/masterpri/docs/', 0, 'bp_doc', '', 0),
(387, 1, '2016-01-21 16:30:37', '2016-01-21 15:30:37', '<a href="http://xtec.cat/monografics/nodes/links.html?id=docs_ges_centre" target="_blank">Pàgina de referència</a> amb cercador de documents per la organització i la gestió d''un centre. Requereix validació amb usuari XTEC. Index dels documents que podeu trobar:\r\n<table border="1" summary="" width="90%" cellspacing="1" cellpadding="1" align="center">\r\n<tbody>\r\n<tr>\r\n<td class="estil1" style="text-align: center;"><strong>Projecte educatiu de centre</strong></td>\r\n<td class="estil1" style="text-align: center;"><strong>Currículum</strong></td>\r\n<td class="estil1" style="text-align: center;"><strong>Organització del centre</strong></td>\r\n<td class="estil1" style="text-align: center;"><strong>Gestió del centre</strong></td>\r\n</tr>\r\n<tr>\r\n<td class="estil2">Avaluació de centre</td>\r\n<td class="estil2">Cicles de formació professional LOGSE i LOE. Cursos per a l''accés a grau mitjà i a grau superior</td>\r\n<td class="estil2">Escoles rurals i zones escolars rurals</td>\r\n<td class="estil2">Actuacions del centre en diversos supòsits</td>\r\n</tr>\r\n<tr>\r\n<td class="estil2" bgcolor="#eeeeee">Convivència i clima escolar</td>\r\n<td class="estil2" bgcolor="#eeeeee">Cicles esportius LOGSE i LOE</td>\r\n<td class="estil2" bgcolor="#eeeeee">Organització de les llars d''infants</td>\r\n<td class="estil2" bgcolor="#eeeeee">Aspectes específics amb relació als alumnes dels centres d''adults</td>\r\n</tr>\r\n<tr>\r\n<td class="estil2">Documents de gestió del centre</td>\r\n<td class="estil2">Concreció i desenvolupament del currículum de l''educació infantil i primària</td>\r\n<td class="estil2">Organització del temps escolar</td>\r\n<td class="estil2">Assegurances i assistència jurídica al personal</td>\r\n</tr>\r\n<tr>\r\n<td class="estil2" bgcolor="#eeeeee">El tractament i l''ús de les llengües al sistema educatiu. El projecte lingüístic</td>\r\n<td class="estil2" bgcolor="#eeeeee">Concreció i desenvolupament del currículum del batxillerat</td>\r\n<td class="estil2" bgcolor="#eeeeee">Òrgans unipersonals de direcció i de coordinació</td>\r\n<td class="estil2" bgcolor="#eeeeee">Formació del personal dels centres educatius</td>\r\n</tr>\r\n<tr>\r\n<td class="estil2">Innovació pedagògica</td>\r\n<td class="estil2">Concreció i desenvolupament del currículum de l''ESO</td>\r\n<td class="estil2">Personal d''administració i serveis i professionals d''atenció educativa</td>\r\n<td class="estil2">Gestió del personal d''administració i serveis i dels professionals d''atenció educativa</td>\r\n</tr>\r\n<tr>\r\n<td class="estil2" bgcolor="#eeeeee">Objectius prioritaris del sistema educatiu i projecte educatiu de centre</td>\r\n<td class="estil2" bgcolor="#eeeeee">Coordinació entre l''educació primària i l''educació secundària obligatòria</td>\r\n<td class="estil2" bgcolor="#eeeeee">Personal docent</td>\r\n<td class="estil2" bgcolor="#eeeeee">Gestió del personal de les llars d''infants</td>\r\n</tr>\r\n<tr>\r\n<td class="estil2">Participació de la comunitat educativa</td>\r\n<td class="estil2">Currículum del primer cicle de l''educació infantil</td>\r\n<td class="estil2"></td>\r\n<td class="estil2">Gestió del personal docent</td>\r\n</tr>\r\n<tr>\r\n<td class="estil2" bgcolor="#eeeeee">Tecnologies per a l''aprenentatge i el coneixement</td>\r\n<td class="estil2" bgcolor="#eeeeee">Currículum dels ensenyaments d''idiomes</td>\r\n<td class="estil2" bgcolor="#eeeeee"></td>\r\n<td class="estil2" bgcolor="#eeeeee">Gestió econòmica, acadèmica i administrativa del centre</td>\r\n</tr>\r\n<tr>\r\n<td class="estil2"></td>\r\n<td class="estil2">Ensenyaments artístics superiors</td>\r\n<td class="estil2"></td>\r\n<td class="estil2">Protecció de dades personals, ús d''imatges, propietat intel·lectual, Internet i correu electrònic</td>\r\n</tr>\r\n<tr>\r\n<td class="estil2" bgcolor="#eeeeee"></td>\r\n<td class="estil2" bgcolor="#eeeeee">Ensenyament de la religió</td>\r\n<td class="estil2" bgcolor="#eeeeee"></td>\r\n<td class="estil2" bgcolor="#eeeeee">Recollida de dades. Registre d''alumnes (RALC), indicadors i Estadística de l''ensenyament</td>\r\n</tr>\r\n<tr>\r\n<td class="estil2"></td>\r\n<td class="estil2">Ensenyaments  de dansa de grau professional</td>\r\n<td class="estil2"></td>\r\n<td class="estil2">Seguretat i salut</td>\r\n</tr>\r\n<tr>\r\n<td class="estil2" bgcolor="#eeeeee"></td>\r\n<td class="estil2" bgcolor="#eeeeee">Ensenyaments  de música de grau professional</td>\r\n<td class="estil2" bgcolor="#eeeeee"></td>\r\n<td class="estil2" bgcolor="#eeeeee">Situacions específiques dels alumnes</td>\r\n</tr>\r\n<tr>\r\n<td class="estil2"></td>\r\n<td class="estil2">Ensenyaments en els centres d’adults</td>\r\n<td class="estil2"></td>\r\n<td class="estil2">Ús social dels centres</td>\r\n</tr>\r\n<tr>\r\n<td class="estil2" bgcolor="#eeeeee"></td>\r\n<td class="estil2" bgcolor="#eeeeee">Ensenyaments professionals d''arts plàstiques i disseny: aspectes curriculars</td>\r\n<td class="estil2" bgcolor="#eeeeee"></td>\r\n<td class="estil2" bgcolor="#eeeeee"></td>\r\n</tr>\r\n<tr>\r\n<td class="estil2"></td>\r\n<td class="estil2">Formació professional dual</td>\r\n<td class="estil2"></td>\r\n<td class="estil2"></td>\r\n</tr>\r\n<tr>\r\n<td class="estil2" bgcolor="#eeeeee"></td>\r\n<td class="estil2" bgcolor="#eeeeee">L''educació bàsica als centres d''educació especial</td>\r\n<td class="estil2" bgcolor="#eeeeee"></td>\r\n<td class="estil2" bgcolor="#eeeeee"></td>\r\n</tr>\r\n<tr>\r\n<td class="estil2"></td>\r\n<td class="estil2">Orientació educativa i acció tutorial a l''ESO</td>\r\n<td class="estil2"></td>\r\n<td class="estil2"></td>\r\n</tr>\r\n<tr>\r\n<td class="estil2" bgcolor="#eeeeee"></td>\r\n<td class="estil2" bgcolor="#eeeeee">Programacions i recursos didàctics</td>\r\n<td class="estil2" bgcolor="#eeeeee"></td>\r\n<td class="estil2" bgcolor="#eeeeee"></td>\r\n</tr>\r\n<tr>\r\n<td class="estil2" bgcolor="#ffffff"></td>\r\n<td class="estil2" bgcolor="#ffffff">Programes de formació i inserció:desenvolupament i aplicació</td>\r\n<td class="estil2" bgcolor="#ffffff"></td>\r\n<td class="estil2" bgcolor="#ffffff"></td>\r\n</tr>\r\n<tr>\r\n<td class="estil2" bgcolor="#eeeeee"></td>\r\n<td class="estil2" bgcolor="#eeeeee">Simultaneïtat d''estudis d''ESO o de batxillerat amb estudis de dansa</td>\r\n<td class="estil2" bgcolor="#eeeeee"></td>\r\n<td class="estil2" bgcolor="#eeeeee"></td>\r\n</tr>\r\n<tr>\r\n<td class="estil2"></td>\r\n<td class="estil2">Simultaneïtat d''estudis d''ESO o de batxillerat amb estudis de música</td>\r\n<td class="estil2"></td>\r\n<td class="estil2"></td>\r\n</tr>\r\n</tbody>\r\n</table>', 'Documents de organització i gestió de centre', '', 'publish', 'open', 'open', '', 'document-de-organitzacio-i-gestio-de-centre', '', '', '2016-01-21 19:25:29', '2016-01-21 18:25:29', '', 0, 'http://pwc-int.educacio.intranet/agora/masterpri/docs/', 0, 'bp_doc', '', 0),
(391, 1, '2016-01-21 16:51:03', '2016-01-21 15:51:03', '<a href="http://xtec.cat/monografics/nodes/links.html?id=cataleg_models" target="_blank">Pàgina de referència</a> (Pot requerir validació XTEC)\r\n\r\n\r\n<table border="1" width="100%" rules="cols" cellspacing="1" cellpadding="1">\r\n<tbody>\r\n<tr>\r\n<td bgcolor="#cc0000" width="43%"><strong><span style="color: #ffffff;">Gestió i documentació acadèmica</span></strong></td>\r\n<td></td>\r\n<td bgcolor="#cc0000" width="43%"><strong><span style="color: #ffffff;">Gestió administrativa</span></strong></td>\r\n</tr>\r\n<tr>\r\n<td bgcolor="#eeeeee">Primer cicle d''educació infantil (llars d''infants) <a title="Vés a Primer cicle d''educació infantil (Llars d''infants)" href="http://educacio.gencat.cat/portal/page/portal/EducacioIntranet/Inici/PortalCentres/PCCatalegModels/Llars%20d%27infants?_template=/EducacioIntranet/IDE_ITEM_PLACEHOLDER"><strong>[+]</strong></a></td>\r\n<td width="4%"></td>\r\n<td bgcolor="#eeeeee" width="43%">Certificats <a title="Vés als Models" href="http://educacio.gencat.cat/portal/page/portal/EducacioIntranet/Inici/PortalCentres/PCCatalegModels/Certificats?_template=/EducacioIntranet/IDE_ITEM_PLACEHOLDER"><strong>[+]</strong></a></td>\r\n</tr>\r\n<tr>\r\n<td>Segon cicle d''educació infantil <a title="Vés a Segon cicle d''educació infantil" href="http://educacio.gencat.cat/portal/page/portal/EducacioIntranet/Inici/PortalCentres/PCCatalegModels/Segon%20cicle%20d%27educaci%F3%20infantil?_template=/EducacioIntranet/IDE_ITEM_PLACEHOLDER"><strong>[+]</strong></a></td>\r\n<td width="4%"></td>\r\n<td width="43%">Proves per completar els estudis d''ESO <a title="Vés al Models" href="http://educacio.gencat.cat/portal/page/portal/EducacioIntranet/Inici/PortalCentres/PCCatalegModels/Proves%20anuals%20per%20completar%20els%20ensenyaments%20d%27ESO?_template=/EducacioIntranet/IDE_ITEM_PLACEHOLDER"><strong>[+]</strong></a></td>\r\n</tr>\r\n<tr>\r\n<td bgcolor="#eeeeee">Educació primària<a title="Vés a Educació primària" href="http://educacio.gencat.cat/portal/page/portal/EducacioIntranet/Inici/PortalCentres/PCCatalegModels/Educaci%F3%20prim%E0ria?_template=/EducacioIntranet/IDE_ITEM_PLACEHOLDER"><strong>[+]</strong></a></td>\r\n<td></td>\r\n<td bgcolor="#eeeeee">Protecció de dades personals <a href="http://educacio.gencat.cat/portal/page/portal/EducacioIntranet/Inici/PortalCentres/PCCatalegModels/Protecci%F3%20de%20dades%20personals?_template=/EducacioIntranet/IDE_ITEM_PLACEHOLDER"><strong>[+]</strong></a></td>\r\n</tr>\r\n<tr>\r\n<td>Educació secundària obligatòria <a title="Vés a Educació secundària obligatòria" href="http://educacio.gencat.cat/portal/page/portal/EducacioIntranet/Inici/PortalCentres/PCCatalegModels/Educaci%F3%20secund%E0ria%20obligat%F2ria?_template=/EducacioIntranet/IDE_ITEM_PLACEHOLDER"><strong>[+]</strong></a></td>\r\n<td></td>\r\n<td>Simultaneïtat d''estudis amb música i dansa <a title="Vés als Models" href="http://educacio.gencat.cat/portal/page/portal/EducacioIntranet/Inici/PortalCentres/PCCatalegModels/Simultane%EFtat%20d%27estudis%20amb%20m%FAsica%20o%20dansa?_template=/EducacioIntranet/IDE_ITEM_PLACEHOLDER"><strong>[+]</strong></a></td>\r\n</tr>\r\n<tr>\r\n<td bgcolor="#eeeeee">Batxillerat <a title="Vés a Batxillerat" href="http://educacio.gencat.cat/portal/page/portal/EducacioIntranet/Inici/PortalCentres/PCCatalegModels/Batxillerat?_template=/EducacioIntranet/IDE_ITEM_PLACEHOLDER"><strong>[+]</strong></a></td>\r\n<td></td>\r\n<td bgcolor="#eeeeee">Títols (sol·licituds, homologació,etc.) <a title="Vés als Models" href="http://educacio.gencat.cat/portal/page/portal/EducacioIntranet/Inici/PortalCentres/PCCatalegModels/DC1CC70C18363E38E04400144F0D5CC2?_template=/EducacioIntranet/IDE_ITEM_PLACEHOLDER"><strong>[+]</strong></a></td>\r\n</tr>\r\n<tr>\r\n<td>Formació Professional <a title="Vés als Models" href="http://educacio.gencat.cat/portal/page/portal/EducacioIntranet/Inici/PortalCentres/PCCatalegModels/Formaci%F3%20professional?_template=/EducacioIntranet/IDE_ITEM_PLACEHOLDER"><strong>[+]</strong></a></td>\r\n<td></td>\r\n<td>Preinscripció i matrícula <a title="Vés a Preinscripció i matrícula" href="http://educacio.gencat.cat/portal/page/portal/EducacioIntranet/Inici/PortalCentres/PCCatalegModels/Preinscripci%F3?_template=/EducacioIntranet/IDE_ITEM_PLACEHOLDER"><strong>[+]</strong></a></td>\r\n</tr>\r\n<tr>\r\n<td bgcolor="#eeeeee">Programes de formació i inserció <a title="Vés a Programes de formació i inserció" href="http://educacio.gencat.cat/portal/page/portal/EducacioIntranet/Inici/PortalCentres/PCCatalegModels/Programes%20de%20formaci%F3%20i%20inserci%F3?_template=/EducacioIntranet/IDE_ITEM_PLACEHOLDER"><strong>[+]</strong></a></td>\r\n<td></td>\r\n<td bgcolor="#eeeeee">Convocatòries centres <a href="http://educacio.gencat.cat/portal/page/portal/EducacioIntranet/Inici/PortalCentres/PCCatalegModels/Projecte%20de%20qualitat%20i%20millora%20cont%EDnua?_template=/EducacioIntranet/IDE_ITEM_PLACEHOLDER"><strong>[+]</strong></a></td>\r\n</tr>\r\n<tr>\r\n<td>Ensenyaments artístics <a title="Vés a Ensenyaments artístics" href="http://educacio.gencat.cat/portal/page/portal/EducacioIntranet/Inici/PortalCentres/PCCatalegModels/Ensenyaments%20art%EDstics?_template=/EducacioIntranet/IDE_ITEM_PLACEHOLDER"><strong>[+]</strong></a></td>\r\n<td></td>\r\n<td></td>\r\n</tr>\r\n<tr>\r\n<td bgcolor="#eeeeee">Ensenyaments esportius <a title="Vés als Models" href="http://educacio.gencat.cat/portal/page/portal/EducacioIntranet/Inici/PortalCentres/PCCatalegModels/Ensenyaments%20esportius?_template=/EducacioIntranet/IDE_ITEM_PLACEHOLDER"><strong>[+]</strong></a></td>\r\n<td></td>\r\n<td bgcolor="#cc0000"><span style="color: #ffffff;"><strong>Personal de centres\r\n</strong></span></td>\r\n</tr>\r\n<tr>\r\n<td>Ensenyaments d''idiomes <a title="Vés als Models" href="http://educacio.gencat.cat/portal/page/portal/EducacioIntranet/Inici/PortalCentres/PCCatalegModels/Ensenyaments%20d%27idiomes?_template=/EducacioIntranet/IDE_ITEM_PLACEHOLDER"><strong>[+]</strong></a></td>\r\n<td></td>\r\n<td>Gestió del personal <a title="Vés a Gestió de personal docent" href="http://educacio.gencat.cat/portal/page/portal/EducacioIntranet/Inici/PortalCentres/PCCatalegModels/Gesti%F3%20de%20personal%20docent?_template=/EducacioIntranet/IDE_ITEM_PLACEHOLDER"><strong>[+]</strong></a></td>\r\n</tr>\r\n<tr>\r\n<td bgcolor="#eeeeee">Educació d''adults <a title="Vés a Educació d''adults" href="http://educacio.gencat.cat/portal/page/portal/EducacioIntranet/Inici/PortalCentres/PCCatalegModels/Educaci%F3%20d%27adults?_template=/EducacioIntranet/IDE_ITEM_PLACEHOLDER"><strong>[+]</strong></a></td>\r\n<td></td>\r\n<td bgcolor="#eeeeee">Tràmits del personal docent <a title="Vés a Assistència del personal docent i sol·licituds" href="http://educacio.gencat.cat/portal/page/portal/EducacioIntranet/Inici/PortalCentres/PCCatalegModels/Assist%E8ncia%20del%20professorat?_template=/EducacioIntranet/IDE_ITEM_PLACEHOLDER"><strong>[+]</strong></a></td>\r\n</tr>\r\n<tr>\r\n<td>Programes de qualificació professional inicial (PQPI) <a title="Vés a Programes de qualificació professional inicial" href="http://educacio.gencat.cat/portal/page/portal/EducacioIntranet/Inici/PortalCentres/PCCatalegModels/Programes%20de%20qualificaci%F3%20professional%20inicial?_template=/EducacioIntranet/IDE_ITEM_PLACEHOLDER"><strong>[+]</strong></a></td>\r\n<td></td>\r\n<td>Tràmits PAS i professionals d''atenció educativa <a title="Vés a Gestió de personal docent" href="http://educacio.gencat.cat/portal/page/portal/EducacioIntranet/Inici/PortalCentres/PCCatalegModels/Tr%E0mits%20del%20PAS?_template=/EducacioIntranet/IDE_ITEM_PLACEHOLDER"><strong>[+]</strong></a></td>\r\n</tr>\r\n<tr>\r\n<td bgcolor="#eeeeee"></td>\r\n<td></td>\r\n<td bgcolor="#eeeeee">Convocatòries de personal docent <a title="Vés a Convocatòries de personal" href="http://educacio.gencat.cat/portal/page/portal/EducacioIntranet/Inici/PortalCentres/PCCatalegModels/Convocat%F2ries%20de%20personal?_template=/EducacioIntranet/IDE_ITEM_PLACEHOLDER"><strong>[+]</strong></a></td>\r\n</tr>\r\n<tr>\r\n<td bgcolor="#cc0000"><span style="color: #ffffff;"><strong>Ajuts i serveis\r\n</strong></span></td>\r\n<td></td>\r\n<td>Plantilles i provisió de llocs docents <a title="Vés a Plantilles i provisió de llocs" href="http://educacio.gencat.cat/portal/page/portal/EducacioIntranet/Inici/PortalCentres/PCCatalegModels/Convocat%F2ries%20de%20personal1?_template=/EducacioIntranet/IDE_ITEM_PLACEHOLDER"><strong>[+]</strong></a></td>\r\n</tr>\r\n<tr>\r\n<td bgcolor="#eeeeee">Ajuts i beques <a title="Vés a Models" href="http://educacio.gencat.cat/portal/page/portal/EducacioIntranet/Inici/PortalCentres/PCCatalegModels/Beques%20i%20ajuts?_template=/EducacioIntranet/IDE_ITEM_PLACEHOLDER"><strong>[+]</strong></a></td>\r\n<td></td>\r\n<td bgcolor="#eeeeee">Professors de religió <a title="Vés a Professors de religió" href="http://educacio.gencat.cat/portal/page/portal/EducacioIntranet/Inici/PortalCentres/PCCatalegModels/Plantilles%20i%20provisi%F3%20de%20llocs?_template=/EducacioIntranet/IDE_ITEM_PLACEHOLDER"><strong>[+] </strong></a></td>\r\n</tr>\r\n<tr>\r\n<td>Atenció educativa domiciliària <a title="Vés als Models" href="http://educacio.gencat.cat/portal/page/portal/EducacioIntranet/Inici/PortalCentres/PCCatalegModels/Atenci%F3%20domicili%E0ria?_template=/EducacioIntranet/IDE_ITEM_PLACEHOLDER"><strong>[+]</strong></a></td>\r\n<td></td>\r\n<td>Prevenció de riscos laborals <a title="Vés a Prevenció de riscos laborals" href="http://educacio.gencat.cat/portal/page/portal/EducacioIntranet/Inici/PortalCentres/PCCatalegModels/Prevenci%F3%20de%20riscos%20laborals?_template=/EducacioIntranet/IDE_ITEM_PLACEHOLDER"><strong>[+] </strong></a></td>\r\n</tr>\r\n<tr>\r\n<td bgcolor="#eeeeee">Ensenyaments professionals <a title="Vés als Models" href="http://educacio.gencat.cat/portal/page/portal/EducacioIntranet/Inici/PortalCentres/PCCatalegModels/Estades%20formatives?_template=/EducacioIntranet/IDE_ITEM_PLACEHOLDER"><strong>[+]</strong></a></td>\r\n<td></td>\r\n<td bgcolor="#eeeeee"></td>\r\n</tr>\r\n<tr>\r\n<td>Subvencions <strong>[+]</strong></td>\r\n<td></td>\r\n<td bgcolor="#cc0000"><span style="color: #ffffff;"><strong>Equipaments</strong></span></td>\r\n</tr>\r\n<tr>\r\n<td bgcolor="#eeeeee">Transport escolar <a title="Vés als Models" href="http://educacio.gencat.cat/portal/page/portal/EducacioIntranet/Inici/PortalCentres/PCCatalegModels/Transport%20escolar?_template=/EducacioIntranet/IDE_ITEM_PLACEHOLDER"><strong>[+]</strong></a></td>\r\n<td></td>\r\n<td bgcolor="#eeeeee">Gestió de les TIC <a title="Vés als Models" href="http://educacio.gencat.cat/portal/page/portal/EducacioIntranet/Inici/PortalCentres/PCCatalegModels/Gsti%F3%20de%20les%20TIC?_template=/EducacioIntranet/IDE_ITEM_PLACEHOLDER"><strong>[+]</strong></a></td>\r\n</tr>\r\n<tr>\r\n<td bgcolor="#cc0000"><span style="color: #ffffff;"><strong>Eleccions al consell escolar\r\n</strong></span></td>\r\n<td></td>\r\n<td>Gestió de les instal·lacions <a title="Vés als Models" href="http://educacio.gencat.cat/portal/page/portal/EducacioIntranet/Inici/PortalCentres/PCCatalegModels/Gesti%F3%20de%20les%20instal%B7lacions?_template=/EducacioIntranet/IDE_ITEM_PLACEHOLDER"><strong>[+]</strong></a></td>\r\n</tr>\r\n<tr>\r\n<td bgcolor="#eeeeee">Models del procediment <a title="Vés als Models" href="http://educacio.gencat.cat/portal/page/portal/EducacioIntranet/Inici/PortalCentres/PCCatalegModels/Eleccions%20als%20consell%20escolars?_template=/EducacioIntranet/IDE_ITEM_PLACEHOLDER"><strong>[+]</strong></a></td>\r\n<td></td>\r\n<td bgcolor="#eeeeee"></td>\r\n</tr>\r\n<tr>\r\n<td></td>\r\n<td></td>\r\n<td bgcolor="#cc0000"><span style="color: #ffffff;"><strong>Gestió econòmica </strong></span></td>\r\n</tr>\r\n<tr>\r\n<td bgcolor="#cc0000"><span style="color: #ffffff;"><strong>Seguretat i salut\r\n</strong></span></td>\r\n<td></td>\r\n<td>Pressupost i altres <a title="Vés als Models" href="http://educacio.gencat.cat/portal/page/portal/EducacioIntranet/Inici/PortalCentres/PCCatalegModels/Pressupost%20i%20altres?_template=/EducacioIntranet/IDE_ITEM_PLACEHOLDER"><strong>[+]</strong></a></td>\r\n</tr>\r\n<tr>\r\n<td bgcolor="#eeeeee">Autoritzacions  <a title="Vés als Models" href="http://educacio.gencat.cat/portal/page/portal/EducacioIntranet/Inici/PortalCentres/PCCatalegModels/Autoritzacions?_template=/EducacioIntranet/IDE_ITEM_PLACEHOLDER"><strong>[+]</strong></a></td>\r\n<td></td>\r\n<td bgcolor="#eeeeee">Devolucions de taxes <a title="Vés a Devolució de taxes" href="http://educacio.gencat.cat/portal/page/portal/EducacioIntranet/Inici/PortalCentres/PCCatalegModels/T%EDtols%20acad%E8mics1?_template=/EducacioIntranet/IDE_ITEM_PLACEHOLDER"><strong>[+]</strong></a></td>\r\n</tr>\r\n<tr>\r\n<td></td>\r\n<td></td>\r\n<td bgcolor="#ffffff"></td>\r\n</tr>\r\n<tr>\r\n<td bgcolor="#cc0000"><span style="color: #ffffff;"><strong>Gestió de serveis d''FP</strong></span></td>\r\n<td></td>\r\n<td bgcolor="#cc0000"><span style="color: #ffffff;"><strong>Contractació</strong></span></td>\r\n</tr>\r\n<tr>\r\n<td bgcolor="#eeeeee">Models del procediment <a title="Vés als Models" href="http://educacio.gencat.cat/portal/page/portal/EducacioIntranet/Inici/PortalCentres/PCCatalegModels/Models%20del%20procediment?_template=/EducacioIntranet/IDE_ITEM_PLACEHOLDER"><strong>[+]</strong></a></td>\r\n<td></td>\r\n<td bgcolor="#eeeeee">Contracte menor <a title="Vés als Contracte menor" href="http://educacio.gencat.cat/portal/page/portal/EducacioIntranet/Inici/PortalCentres/PCCatalegModels/Contractes%20menors?_template=/EducacioIntranet/IDE_ITEM_PLACEHOLDER"><strong>[+]</strong></a></td>\r\n</tr>\r\n<tr>\r\n<td></td>\r\n<td></td>\r\n<td>Contracte negociat <a title="Vés als Contracte menor" href="http://educacio.gencat.cat/portal/page/portal/EducacioIntranet/Inici/PortalCentres/PCCatalegModels/Contracte%20negociat?_template=/EducacioIntranet/IDE_ITEM_PLACEHOLDER"><strong>[+]</strong></a></td>\r\n</tr>\r\n<tr>\r\n<td bgcolor="#eeeeee"></td>\r\n<td></td>\r\n<td bgcolor="#eeeeee">Contracte obert <a title="Vés als Contracte menor" href="http://educacio.gencat.cat/portal/page/portal/EducacioIntranet/Inici/PortalCentres/PCCatalegModels/Contracte%20obert?_template=/EducacioIntranet/IDE_ITEM_PLACEHOLDER"><strong>[+]</strong></a></td>\r\n</tr>\r\n</tbody>\r\n</table>', 'Catàleg de models', '', 'publish', 'open', 'open', '', 'cataleg-de-models', '', '', '2016-01-21 19:25:12', '2016-01-21 18:25:12', '', 0, 'http://pwc-int.educacio.intranet/agora/masterpri/docs/', 0, 'bp_doc', '', 0),
(399, 1, '2016-01-21 16:51:03', '2016-01-21 15:51:03', '<a href="http://xtec.cat/monografics/nodes/links.html?id=cataleg_models" target="_blank">Pàgina de referència</a> (Pot requerir validació XTEC)\n\n\n<table border="1" width="100%" rules="cols" cellspacing="1" cellpadding="1">\n<tbody>\n<tr>\n<td bgcolor="#cc0000" width="43%"><strong><span style="color: #ffffff;">Gestió i documentació acadèmica</span></strong></td>\n<td></td>\n<td bgcolor="#cc0000" width="43%"><strong><span style="color: #ffffff;">Gestió administrativa</span></strong></td>\n</tr>\n<tr>\n<td bgcolor="#eeeeee">Primer cicle d''educació infantil (llars d''infants) <a title="Vés a Primer cicle d''educació infantil (Llars d''infants)" href="http://educacio.gencat.cat/portal/page/portal/EducacioIntranet/Inici/PortalCentres/PCCatalegModels/Llars%20d%27infants?_template=/EducacioIntranet/IDE_ITEM_PLACEHOLDER"><strong>[+]</strong></a></td>\n<td width="4%"></td>\n<td bgcolor="#eeeeee" width="43%">Certificats <a title="Vés als Models" href="http://educacio.gencat.cat/portal/page/portal/EducacioIntranet/Inici/PortalCentres/PCCatalegModels/Certificats?_template=/EducacioIntranet/IDE_ITEM_PLACEHOLDER"><strong>[+]</strong></a></td>\n</tr>\n<tr>\n<td>Segon cicle d''educació infantil <a title="Vés a Segon cicle d''educació infantil" href="http://educacio.gencat.cat/portal/page/portal/EducacioIntranet/Inici/PortalCentres/PCCatalegModels/Segon%20cicle%20d%27educaci%F3%20infantil?_template=/EducacioIntranet/IDE_ITEM_PLACEHOLDER"><strong>[+]</strong></a></td>\n<td width="4%"></td>\n<td width="43%">Proves per completar els estudis d''ESO <a title="Vés al Models" href="http://educacio.gencat.cat/portal/page/portal/EducacioIntranet/Inici/PortalCentres/PCCatalegModels/Proves%20anuals%20per%20completar%20els%20ensenyaments%20d%27ESO?_template=/EducacioIntranet/IDE_ITEM_PLACEHOLDER"><strong>[+]</strong></a></td>\n</tr>\n<tr>\n<td bgcolor="#eeeeee">Educació primària<a title="Vés a Educació primària" href="http://educacio.gencat.cat/portal/page/portal/EducacioIntranet/Inici/PortalCentres/PCCatalegModels/Educaci%F3%20prim%E0ria?_template=/EducacioIntranet/IDE_ITEM_PLACEHOLDER"><strong>[+]</strong></a></td>\n<td></td>\n<td bgcolor="#eeeeee">Protecció de dades personals <a href="http://educacio.gencat.cat/portal/page/portal/EducacioIntranet/Inici/PortalCentres/PCCatalegModels/Protecci%F3%20de%20dades%20personals?_template=/EducacioIntranet/IDE_ITEM_PLACEHOLDER"><strong>[+]</strong></a></td>\n</tr>\n<tr>\n<td>Educació secundària obligatòria <a title="Vés a Educació secundària obligatòria" href="http://educacio.gencat.cat/portal/page/portal/EducacioIntranet/Inici/PortalCentres/PCCatalegModels/Educaci%F3%20secund%E0ria%20obligat%F2ria?_template=/EducacioIntranet/IDE_ITEM_PLACEHOLDER"><strong>[+]</strong></a></td>\n<td></td>\n<td>Simultaneïtat d''estudis amb música i dansa <a title="Vés als Models" href="http://educacio.gencat.cat/portal/page/portal/EducacioIntranet/Inici/PortalCentres/PCCatalegModels/Simultane%EFtat%20d%27estudis%20amb%20m%FAsica%20o%20dansa?_template=/EducacioIntranet/IDE_ITEM_PLACEHOLDER"><strong>[+]</strong></a></td>\n</tr>\n<tr>\n<td bgcolor="#eeeeee">Batxillerat <a title="Vés a Batxillerat" href="http://educacio.gencat.cat/portal/page/portal/EducacioIntranet/Inici/PortalCentres/PCCatalegModels/Batxillerat?_template=/EducacioIntranet/IDE_ITEM_PLACEHOLDER"><strong>[+]</strong></a></td>\n<td></td>\n<td bgcolor="#eeeeee">Títols (sol·licituds, homologació,etc.) <a title="Vés als Models" href="http://educacio.gencat.cat/portal/page/portal/EducacioIntranet/Inici/PortalCentres/PCCatalegModels/DC1CC70C18363E38E04400144F0D5CC2?_template=/EducacioIntranet/IDE_ITEM_PLACEHOLDER"><strong>[+]</strong></a></td>\n</tr>\n<tr>\n<td>Formació Professional <a title="Vés als Models" href="http://educacio.gencat.cat/portal/page/portal/EducacioIntranet/Inici/PortalCentres/PCCatalegModels/Formaci%F3%20professional?_template=/EducacioIntranet/IDE_ITEM_PLACEHOLDER"><strong>[+]</strong></a></td>\n<td></td>\n<td>Preinscripció i matrícula <a title="Vés a Preinscripció i matrícula" href="http://educacio.gencat.cat/portal/page/portal/EducacioIntranet/Inici/PortalCentres/PCCatalegModels/Preinscripci%F3?_template=/EducacioIntranet/IDE_ITEM_PLACEHOLDER"><strong>[+]</strong></a></td>\n</tr>\n<tr>\n<td bgcolor="#eeeeee">Programes de formació i inserció <a title="Vés a Programes de formació i inserció" href="http://educacio.gencat.cat/portal/page/portal/EducacioIntranet/Inici/PortalCentres/PCCatalegModels/Programes%20de%20formaci%F3%20i%20inserci%F3?_template=/EducacioIntranet/IDE_ITEM_PLACEHOLDER"><strong>[+]</strong></a></td>\n<td></td>\n<td bgcolor="#eeeeee">Convocatòries centres <a href="http://educacio.gencat.cat/portal/page/portal/EducacioIntranet/Inici/PortalCentres/PCCatalegModels/Projecte%20de%20qualitat%20i%20millora%20cont%EDnua?_template=/EducacioIntranet/IDE_ITEM_PLACEHOLDER"><strong>[+]</strong></a></td>\n</tr>\n<tr>\n<td>Ensenyaments artístics <a title="Vés a Ensenyaments artístics" href="http://educacio.gencat.cat/portal/page/portal/EducacioIntranet/Inici/PortalCentres/PCCatalegModels/Ensenyaments%20art%EDstics?_template=/EducacioIntranet/IDE_ITEM_PLACEHOLDER"><strong>[+]</strong></a></td>\n<td></td>\n<td></td>\n</tr>\n<tr>\n<td bgcolor="#eeeeee">Ensenyaments esportius <a title="Vés als Models" href="http://educacio.gencat.cat/portal/page/portal/EducacioIntranet/Inici/PortalCentres/PCCatalegModels/Ensenyaments%20esportius?_template=/EducacioIntranet/IDE_ITEM_PLACEHOLDER"><strong>[+]</strong></a></td>\n<td></td>\n<td bgcolor="#cc0000"><span style="color: #ffffff;"><strong>Personal de centres\n</strong></span></td>\n</tr>\n<tr>\n<td>Ensenyaments d''idiomes <a title="Vés als Models" href="http://educacio.gencat.cat/portal/page/portal/EducacioIntranet/Inici/PortalCentres/PCCatalegModels/Ensenyaments%20d%27idiomes?_template=/EducacioIntranet/IDE_ITEM_PLACEHOLDER"><strong>[+]</strong></a></td>\n<td></td>\n<td>Gestió del personal <a title="Vés a Gestió de personal docent" href="http://educacio.gencat.cat/portal/page/portal/EducacioIntranet/Inici/PortalCentres/PCCatalegModels/Gesti%F3%20de%20personal%20docent?_template=/EducacioIntranet/IDE_ITEM_PLACEHOLDER"><strong>[+]</strong></a></td>\n</tr>\n<tr>\n<td bgcolor="#eeeeee">Educació d''adults <a title="Vés a Educació d''adults" href="http://educacio.gencat.cat/portal/page/portal/EducacioIntranet/Inici/PortalCentres/PCCatalegModels/Educaci%F3%20d%27adults?_template=/EducacioIntranet/IDE_ITEM_PLACEHOLDER"><strong>[+]</strong></a></td>\n<td></td>\n<td bgcolor="#eeeeee">Tràmits del personal docent <a title="Vés a Assistència del personal docent i sol·licituds" href="http://educacio.gencat.cat/portal/page/portal/EducacioIntranet/Inici/PortalCentres/PCCatalegModels/Assist%E8ncia%20del%20professorat?_template=/EducacioIntranet/IDE_ITEM_PLACEHOLDER"><strong>[+]</strong></a></td>\n</tr>\n<tr>\n<td>Programes de qualificació professional inicial (PQPI) <a title="Vés a Programes de qualificació professional inicial" href="http://educacio.gencat.cat/portal/page/portal/EducacioIntranet/Inici/PortalCentres/PCCatalegModels/Programes%20de%20qualificaci%F3%20professional%20inicial?_template=/EducacioIntranet/IDE_ITEM_PLACEHOLDER"><strong>[+]</strong></a></td>\n<td></td>\n<td>Tràmits PAS i professionals d''atenció educativa <a title="Vés a Gestió de personal docent" href="http://educacio.gencat.cat/portal/page/portal/EducacioIntranet/Inici/PortalCentres/PCCatalegModels/Tr%E0mits%20del%20PAS?_template=/EducacioIntranet/IDE_ITEM_PLACEHOLDER"><strong>[+]</strong></a></td>\n</tr>\n<tr>\n<td bgcolor="#eeeeee"></td>\n<td></td>\n<td bgcolor="#eeeeee">Convocatòries de personal docent <a title="Vés a Convocatòries de personal" href="http://educacio.gencat.cat/portal/page/portal/EducacioIntranet/Inici/PortalCentres/PCCatalegModels/Convocat%F2ries%20de%20personal?_template=/EducacioIntranet/IDE_ITEM_PLACEHOLDER"><strong>[+]</strong></a></td>\n</tr>\n<tr>\n<td bgcolor="#cc0000"><span style="color: #ffffff;"><strong>Ajuts i serveis\n</strong></span></td>\n<td></td>\n<td>Plantilles i provisió de llocs docents <a title="Vés a Plantilles i provisió de llocs" href="http://educacio.gencat.cat/portal/page/portal/EducacioIntranet/Inici/PortalCentres/PCCatalegModels/Convocat%F2ries%20de%20personal1?_template=/EducacioIntranet/IDE_ITEM_PLACEHOLDER"><strong>[+]</strong></a></td>\n</tr>\n<tr>\n<td bgcolor="#eeeeee">Ajuts i beques <a title="Vés a Models" href="http://educacio.gencat.cat/portal/page/portal/EducacioIntranet/Inici/PortalCentres/PCCatalegModels/Beques%20i%20ajuts?_template=/EducacioIntranet/IDE_ITEM_PLACEHOLDER"><strong>[+]</strong></a></td>\n<td></td>\n<td bgcolor="#eeeeee">Professors de religió <a title="Vés a Professors de religió" href="http://educacio.gencat.cat/portal/page/portal/EducacioIntranet/Inici/PortalCentres/PCCatalegModels/Plantilles%20i%20provisi%F3%20de%20llocs?_template=/EducacioIntranet/IDE_ITEM_PLACEHOLDER"><strong>[+] </strong></a></td>\n</tr>\n<tr>\n<td>Atenció educativa domiciliària <a title="Vés als Models" href="http://educacio.gencat.cat/portal/page/portal/EducacioIntranet/Inici/PortalCentres/PCCatalegModels/Atenci%F3%20domicili%E0ria?_template=/EducacioIntranet/IDE_ITEM_PLACEHOLDER"><strong>[+]</strong></a></td>\n<td></td>\n<td>Prevenció de riscos laborals <a title="Vés a Prevenció de riscos laborals" href="http://educacio.gencat.cat/portal/page/portal/EducacioIntranet/Inici/PortalCentres/PCCatalegModels/Prevenci%F3%20de%20riscos%20laborals?_template=/EducacioIntranet/IDE_ITEM_PLACEHOLDER"><strong>[+] </strong></a></td>\n</tr>\n<tr>\n<td bgcolor="#eeeeee">Ensenyaments professionals <a title="Vés als Models" href="http://educacio.gencat.cat/portal/page/portal/EducacioIntranet/Inici/PortalCentres/PCCatalegModels/Estades%20formatives?_template=/EducacioIntranet/IDE_ITEM_PLACEHOLDER"><strong>[+]</strong></a></td>\n<td></td>\n<td bgcolor="#eeeeee"></td>\n</tr>\n<tr>\n<td>Subvencions <strong>[+]</strong></td>\n<td></td>\n<td bgcolor="#cc0000"><span style="color: #ffffff;"><strong>Equipaments</strong></span></td>\n</tr>\n<tr>\n<td bgcolor="#eeeeee">Transport escolar <a title="Vés als Models" href="http://educacio.gencat.cat/portal/page/portal/EducacioIntranet/Inici/PortalCentres/PCCatalegModels/Transport%20escolar?_template=/EducacioIntranet/IDE_ITEM_PLACEHOLDER"><strong>[+]</strong></a></td>\n<td></td>\n<td bgcolor="#eeeeee">Gestió de les TIC <a title="Vés als Models" href="http://educacio.gencat.cat/portal/page/portal/EducacioIntranet/Inici/PortalCentres/PCCatalegModels/Gsti%F3%20de%20les%20TIC?_template=/EducacioIntranet/IDE_ITEM_PLACEHOLDER"><strong>[+]</strong></a></td>\n</tr>\n<tr>\n<td bgcolor="#cc0000"><span style="color: #ffffff;"><strong>Eleccions al consell escolar\n</strong></span></td>\n<td></td>\n<td>Gestió de les instal·lacions <a title="Vés als Models" href="http://educacio.gencat.cat/portal/page/portal/EducacioIntranet/Inici/PortalCentres/PCCatalegModels/Gesti%F3%20de%20les%20instal%B7lacions?_template=/EducacioIntranet/IDE_ITEM_PLACEHOLDER"><strong>[+]</strong></a></td>\n</tr>\n<tr>\n<td bgcolor="#eeeeee">Models del procediment <a title="Vés als Models" href="http://educacio.gencat.cat/portal/page/portal/EducacioIntranet/Inici/PortalCentres/PCCatalegModels/Eleccions%20als%20consell%20escolars?_template=/EducacioIntranet/IDE_ITEM_PLACEHOLDER"><strong>[+]</strong></a></td>\n<td></td>\n<td bgcolor="#eeeeee"></td>\n</tr>\n<tr>\n<td></td>\n<td></td>\n<td bgcolor="#cc0000"><span style="color: #ffffff;"><strong>Gestió econòmica </strong></span></td>\n</tr>\n<tr>\n<td bgcolor="#cc0000"><span style="color: #ffffff;"><strong>Seguretat i salut\n</strong></span></td>\n<td></td>\n<td>Pressupost i altres <a title="Vés als Models" href="http://educacio.gencat.cat/portal/page/portal/EducacioIntranet/Inici/PortalCentres/PCCatalegModels/Pressupost%20i%20altres?_template=/EducacioIntranet/IDE_ITEM_PLACEHOLDER"><strong>[+]</strong></a></td>\n</tr>\n<tr>\n<td bgcolor="#eeeeee">Autoritzacions  <a title="Vés als Models" href="http://educacio.gencat.cat/portal/page/portal/EducacioIntranet/Inici/PortalCentres/PCCatalegModels/Autoritzacions?_template=/EducacioIntranet/IDE_ITEM_PLACEHOLDER"><strong>[+]</strong></a></td>\n<td></td>\n<td bgcolor="#eeeeee">Devolucions de taxes <a title="Vés a Devolució de taxes" href="http://educacio.gencat.cat/portal/page/portal/EducacioIntranet/Inici/PortalCentres/PCCatalegModels/T%EDtols%20acad%E8mics1?_template=/EducacioIntranet/IDE_ITEM_PLACEHOLDER"><strong>[+]</strong></a></td>\n</tr>\n<tr>\n<td></td>\n<td></td>\n<td bgcolor="#ffffff"></td>\n</tr>\n<tr>\n<td bgcolor="#cc0000"><span style="color: #ffffff;"><strong>Gestió de serveis d''FP</strong></span></td>\n<td></td>\n<td bgcolor="#cc0000"><span style="color: #ffffff;"><strong>Contractació</strong></span></td>\n</tr>\n<tr>\n<td bgcolor="#eeeeee">Models del procediment <a title="Vés als Models" href="http://educacio.gencat.cat/portal/page/portal/EducacioIntranet/Inici/PortalCentres/PCCatalegModels/Models%20del%20procediment?_template=/EducacioIntranet/IDE_ITEM_PLACEHOLDER"><strong>[+]</strong></a></td>\n<td></td>\n<td bgcolor="#eeeeee">Contracte menor <a title="Vés als Contracte menor" href="http://educacio.gencat.cat/portal/page/portal/EducacioIntranet/Inici/PortalCentres/PCCatalegModels/Contractes%20menors?_template=/EducacioIntranet/IDE_ITEM_PLACEHOLDER"><strong>[+]</strong></a></td>\n</tr>\n<tr>\n<td></td>\n<td></td>\n<td>Contracte negociat <a title="Vés als Contracte menor" href="http://educacio.gencat.cat/portal/page/portal/EducacioIntranet/Inici/PortalCentres/PCCatalegModels/Contracte%20negociat?_template=/EducacioIntranet/IDE_ITEM_PLACEHOLDER"><strong>[+]</strong></a></td>\n</tr>\n<tr>\n<td bgcolor="#eeeeee"></td>\n<td></td>\n<td bgcolor="#eeeeee">Contracte obert <a title="Vés als Contracte menor" href="http://educacio.gencat.cat/portal/page/portal/EducacioIntranet/Inici/PortalCentres/PCCatalegModels/Contracte%20obert?_template=/EducacioIntranet/IDE_ITEM_PLACEHOLDER"><strong>[+]</strong></a></td>\n</tr>\n</tbody>\n</table>', 'Catàleg de models', '', 'inherit', 'open', 'open', '', '391-revision-v1', '', '', '2016-01-21 16:51:03', '2016-01-21 15:51:03', '', 391, 'http://pwc-int.educacio.intranet/agora/masterpri/general/391-revision-v1/', 0, 'revision', '', 0);
INSERT INTO `wp_posts` (`ID`, `post_author`, `post_date`, `post_date_gmt`, `post_content`, `post_title`, `post_excerpt`, `post_status`, `comment_status`, `ping_status`, `post_password`, `post_name`, `to_ping`, `pinged`, `post_modified`, `post_modified_gmt`, `post_content_filtered`, `post_parent`, `guid`, `menu_order`, `post_type`, `post_mime_type`, `comment_count`) VALUES
(400, 1, '2016-01-21 16:30:37', '2016-01-21 15:30:37', '<a href="http://xtec.cat/monografics/nodes/links.html?id=docs_ges_centre" target="_blank">Pàgina de referència</a> amb cercador de documents per la organització i la gestió d''un centre. Requereix validació amb usuari XTEC. Index dels documents que podeu trobar:\n<table border="1" summary="" width="90%" cellspacing="1" cellpadding="1" align="center">\n<tbody>\n<tr>\n<td class="estil1" style="text-align: center;"><strong>Projecte educatiu de centre</strong></td>\n<td class="estil1" style="text-align: center;"><strong>Currículum</strong></td>\n<td class="estil1" style="text-align: center;"><strong>Organització del centre</strong></td>\n<td class="estil1" style="text-align: center;"><strong>Gestió del centre</strong></td>\n</tr>\n<tr>\n<td class="estil2">Avaluació de centre</td>\n<td class="estil2">Cicles de formació professional LOGSE i LOE. Cursos per a l''accés a grau mitjà i a grau superior</td>\n<td class="estil2">Escoles rurals i zones escolars rurals</td>\n<td class="estil2">Actuacions del centre en diversos supòsits</td>\n</tr>\n<tr>\n<td class="estil2" bgcolor="#eeeeee">Convivència i clima escolar</td>\n<td class="estil2" bgcolor="#eeeeee">Cicles esportius LOGSE i LOE</td>\n<td class="estil2" bgcolor="#eeeeee">Organització de les llars d''infants</td>\n<td class="estil2" bgcolor="#eeeeee">Aspectes específics amb relació als alumnes dels centres d''adults</td>\n</tr>\n<tr>\n<td class="estil2">Documents de gestió del centre</td>\n<td class="estil2">Concreció i desenvolupament del currículum de l''educació infantil i primària</td>\n<td class="estil2">Organització del temps escolar</td>\n<td class="estil2">Assegurances i assistència jurídica al personal</td>\n</tr>\n<tr>\n<td class="estil2" bgcolor="#eeeeee">El tractament i l''ús de les llengües al sistema educatiu. El projecte lingüístic</td>\n<td class="estil2" bgcolor="#eeeeee">Concreció i desenvolupament del currículum del batxillerat</td>\n<td class="estil2" bgcolor="#eeeeee">Òrgans unipersonals de direcció i de coordinació</td>\n<td class="estil2" bgcolor="#eeeeee">Formació del personal dels centres educatius</td>\n</tr>\n<tr>\n<td class="estil2">Innovació pedagògica</td>\n<td class="estil2">Concreció i desenvolupament del currículum de l''ESO</td>\n<td class="estil2">Personal d''administració i serveis i professionals d''atenció educativa</td>\n<td class="estil2">Gestió del personal d''administració i serveis i dels professionals d''atenció educativa</td>\n</tr>\n<tr>\n<td class="estil2" bgcolor="#eeeeee">Objectius prioritaris del sistema educatiu i projecte educatiu de centre</td>\n<td class="estil2" bgcolor="#eeeeee">Coordinació entre l''educació primària i l''educació secundària obligatòria</td>\n<td class="estil2" bgcolor="#eeeeee">Personal docent</td>\n<td class="estil2" bgcolor="#eeeeee">Gestió del personal de les llars d''infants</td>\n</tr>\n<tr>\n<td class="estil2">Participació de la comunitat educativa</td>\n<td class="estil2">Currículum del primer cicle de l''educació infantil</td>\n<td class="estil2"></td>\n<td class="estil2">Gestió del personal docent</td>\n</tr>\n<tr>\n<td class="estil2" bgcolor="#eeeeee">Tecnologies per a l''aprenentatge i el coneixement</td>\n<td class="estil2" bgcolor="#eeeeee">Currículum dels ensenyaments d''idiomes</td>\n<td class="estil2" bgcolor="#eeeeee"></td>\n<td class="estil2" bgcolor="#eeeeee">Gestió econòmica, acadèmica i administrativa del centre</td>\n</tr>\n<tr>\n<td class="estil2"></td>\n<td class="estil2">Ensenyaments artístics superiors</td>\n<td class="estil2"></td>\n<td class="estil2">Protecció de dades personals, ús d''imatges, propietat intel·lectual, Internet i correu electrònic</td>\n</tr>\n<tr>\n<td class="estil2" bgcolor="#eeeeee"></td>\n<td class="estil2" bgcolor="#eeeeee">Ensenyament de la religió</td>\n<td class="estil2" bgcolor="#eeeeee"></td>\n<td class="estil2" bgcolor="#eeeeee">Recollida de dades. Registre d''alumnes (RALC), indicadors i Estadística de l''ensenyament</td>\n</tr>\n<tr>\n<td class="estil2"></td>\n<td class="estil2">Ensenyaments  de dansa de grau professional</td>\n<td class="estil2"></td>\n<td class="estil2">Seguretat i salut</td>\n</tr>\n<tr>\n<td class="estil2" bgcolor="#eeeeee"></td>\n<td class="estil2" bgcolor="#eeeeee">Ensenyaments  de música de grau professional</td>\n<td class="estil2" bgcolor="#eeeeee"></td>\n<td class="estil2" bgcolor="#eeeeee">Situacions específiques dels alumnes</td>\n</tr>\n<tr>\n<td class="estil2"></td>\n<td class="estil2">Ensenyaments en els centres d’adults</td>\n<td class="estil2"></td>\n<td class="estil2">Ús social dels centres</td>\n</tr>\n<tr>\n<td class="estil2" bgcolor="#eeeeee"></td>\n<td class="estil2" bgcolor="#eeeeee">Ensenyaments professionals d''arts plàstiques i disseny: aspectes curriculars</td>\n<td class="estil2" bgcolor="#eeeeee"></td>\n<td class="estil2" bgcolor="#eeeeee"></td>\n</tr>\n<tr>\n<td class="estil2"></td>\n<td class="estil2">Formació professional dual</td>\n<td class="estil2"></td>\n<td class="estil2"></td>\n</tr>\n<tr>\n<td class="estil2" bgcolor="#eeeeee"></td>\n<td class="estil2" bgcolor="#eeeeee">L''educació bàsica als centres d''educació especial</td>\n<td class="estil2" bgcolor="#eeeeee"></td>\n<td class="estil2" bgcolor="#eeeeee"></td>\n</tr>\n<tr>\n<td class="estil2"></td>\n<td class="estil2">Orientació educativa i acció tutorial a l''ESO</td>\n<td class="estil2"></td>\n<td class="estil2"></td>\n</tr>\n<tr>\n<td class="estil2" bgcolor="#eeeeee"></td>\n<td class="estil2" bgcolor="#eeeeee">Programacions i recursos didàctics</td>\n<td class="estil2" bgcolor="#eeeeee"></td>\n<td class="estil2" bgcolor="#eeeeee"></td>\n</tr>\n<tr>\n<td class="estil2" bgcolor="#ffffff"></td>\n<td class="estil2" bgcolor="#ffffff">Programes de formació i inserció:desenvolupament i aplicació</td>\n<td class="estil2" bgcolor="#ffffff"></td>\n<td class="estil2" bgcolor="#ffffff"></td>\n</tr>\n<tr>\n<td class="estil2" bgcolor="#eeeeee"></td>\n<td class="estil2" bgcolor="#eeeeee">Simultaneïtat d''estudis d''ESO o de batxillerat amb estudis de dansa</td>\n<td class="estil2" bgcolor="#eeeeee"></td>\n<td class="estil2" bgcolor="#eeeeee"></td>\n</tr>\n<tr>\n<td class="estil2"></td>\n<td class="estil2">Simultaneïtat d''estudis d''ESO o de batxillerat amb estudis de música</td>\n<td class="estil2"></td>\n<td class="estil2"></td>\n</tr>\n</tbody>\n</table>', 'Documents de organització i gestió de centre', '', 'inherit', 'open', 'open', '', '387-revision-v1', '', '', '2016-01-21 16:30:37', '2016-01-21 15:30:37', '', 387, 'http://pwc-int.educacio.intranet/agora/masterpri/general/387-revision-v1/', 0, 'revision', '', 0),
(401, 1, '2016-01-21 16:22:17', '2016-01-21 15:22:17', 'Consells i orientacions d''estil.\n<a href="http://educacio.gencat.cat/documents/IPCrecursos/Plantilles/Guia_Estil_Departament.pdf" target="_blank">Enllaç al document</a>', 'Guia d’estil del Departament d’Ensenyament', '', 'inherit', 'open', 'open', '', '385-revision-v1', '', '', '2016-01-21 16:22:17', '2016-01-21 15:22:17', '', 385, 'http://pwc-int.educacio.intranet/agora/masterpri/general/385-revision-v1/', 0, 'revision', '', 0),
(402, 1, '2016-01-21 16:17:21', '2016-01-21 15:17:21', '<a href="http://xtec.cat/monografics/nodes/links.html?id=competencies_basiques" target="_blank">Pàgina de referència</a> al portal de centres (Departament d''Ensenyament)', 'Competències bàsiques', '', 'inherit', 'open', 'open', '', '383-revision-v1', '', '', '2016-01-21 16:17:21', '2016-01-21 15:17:21', '', 383, 'http://pwc-int.educacio.intranet/agora/masterpri/general/383-revision-v1/', 0, 'revision', '', 0),
(403, 1, '2016-01-21 16:13:07', '2016-01-21 15:13:07', '<a href="http://xtec.cat/monografics/nodes/links.html?id=docs_administratius" target="_blank">Pàgina de referència</a> del portal de centres (Departament d''Ensenyament)\nRequereix validació amb usuari XTEC.\n<div class="elemento">\n<h4></h4>\n<div style="text-align: justify;">\n\nIndex dels documents que trobareu, de cada document administratiu, plantilles, esquemes, exemples, l''explicació de la seva estructura i la legislació que cal aplicar-hi.\n\n</div>\n</div>\n<div class="elistado">\n<h3></h3>\n<strong>Acta de reunió</strong> Document mitjançant el qual es deixa constància de les incidències, les deliberacions i els acords d’un òrgan col·legiat.\n\n</div>\n<div class="elistado">\n<h3></h3>\n<strong>Certificat</strong> Document amb què es dóna fe pública i per escrit d’alguna circumstància, fet o actuació.\n\n</div>\n<div class="elistado">\n<h3></h3>\n<strong>Comunicat intern </strong>Document no oficial amb què es fa arribar informació diversa a les unitats o al personal d’un organisme.\n\n</div>\n<div class="elistado">\n<h3></h3>\n<strong>Contracte i conveni</strong> Document en què es recull l’acord de voluntats entre diferents persones o institucions per fer o no fer una determinada cosa.\n\n</div>\n<div class="elistado">\n<h3></h3>\n<strong>Convocatòria de reunió</strong> Document per mitjà del qual se sol·licita l’assistència d’una persona a una sessió d’un òrgan col·legiat.\n\n</div>\n<div class="elistado">\n<h3></h3>\n<strong>Currículum </strong>Document en què es detallen el conjunt de les dades personals i els mèrits acadèmics i professionals d’una persona.\n\n</div>\n<div class="elistado">\n<h3></h3>\n<strong>Declaració jurada</strong> Document amb què es manifesta sota jurament o promesa un fet o esdeveniment.\n\n</div>\n<div class="elistado">\n<h3></h3>\n<strong>Diligència</strong> Document mitjançant el qual l’Administració fa constar internament l’execució d’un fet o una actuació determinada.\n\n</div>\n<div class="elistado">\n<h3></h3>\n<strong>Edicte</strong> Document que s’utilitza per acomplir una disposició legal, per citar algú o per anunciar la celebració d’un acte.\n\n</div>\n<div class="elistado">\n<h3></h3>\n<strong>Informe</strong> Document per mitjà del qual s’exposen tots els elements tècnics i jurídics relatius a un assumpte que cal tenir en compte per resoldre un procediment.\n\n</div>\n<div class="elistado">\n<h3></h3>\n<strong>Invitació </strong>Document amb què es convida algú a un acte públic.\n\n</div>\n<div class="elistado">\n<h3></h3>\n<strong>Ofici extern</strong> Document monotemàtic amb què l’Administració comunica continguts relacionats amb la tramitació d’un expedient a altres òrgans de l’Administració o bé als ciutadans.\n\n</div>\n<div class="elistado">\n<h3></h3>\n<strong>Ofici intern</strong> Document monotemàtic que utilitza l’Administració per establir comunicació entre els diferents òrgans administratius.\n\n</div>\n<div class="elistado">\n<h3></h3>\n<strong>Plec de clàusules administratives</strong> Document en què es recullen les bases i els referents necessaris abans de la formulació de determinats contractes.\n\n</div>\n<div class="elistado">\n<h3></h3>\n<strong>Recurs</strong> Document per mitjà del qual una persona expressa la seva disconformitat amb una resolució administrativa.\n\n</div>\n<div class="elistado">\n<h3></h3>\n<strong>Resolució</strong> Document per mitjà del qual es presenta la decisió d’un òrgan administratiu quan finalitza el procediment administratiu.\n\n</div>\n<div class="elistado">\n<h3></h3>\n<strong>Saluda</strong> Document de caràcter protocol·lari amb què es trameten agraïments, felicitacions, etc.\n\n</div>\n<div class="elistado">\n<h3></h3>\n<strong>Sol·licitud</strong> Document per mitjà del qual l’administrat demana a l’Administració alguna cosa referent a una matèria de tramitació reglada.\n\n</div>', 'Documents administratius', '', 'inherit', 'open', 'open', '', '379-revision-v1', '', '', '2016-01-21 16:13:07', '2016-01-21 15:13:07', '', 379, 'http://pwc-int.educacio.intranet/agora/masterpri/general/379-revision-v1/', 0, 'revision', '', 0),
(404, 1, '2016-01-21 13:55:35', '2016-01-21 12:55:35', '<a href="http://xtec.cat/monografics/nodes/links.html?id=doc_centre" target="_blank">Enllaç al document</a>', 'Document genèric de centre', '', 'inherit', 'open', 'open', '', '366-revision-v1', '', '', '2016-01-21 13:55:35', '2016-01-21 12:55:35', '', 366, 'http://pwc-int.educacio.intranet/agora/masterpri/general/366-revision-v1/', 0, 'revision', '', 0),
(405, 1, '2016-01-21 13:23:43', '2016-01-21 12:23:43', '<a href="http://xtec.cat/monografics/nodes/links.html?id=avaluacio_centre" target="_blank">Enllaç al document</a>', 'Avaluació de centre', '', 'inherit', 'open', 'open', '', '364-revision-v1', '', '', '2016-01-21 13:23:43', '2016-01-21 12:23:43', '', 364, 'http://pwc-int.educacio.intranet/agora/masterpri/general/364-revision-v1/', 0, 'revision', '', 0),
(406, 1, '2016-01-21 13:22:40', '2016-01-21 12:22:40', '<a href="http://xtec.cat/monografics/nodes/links.html?id=projecte_llinguistic" target="_blank">Enllaç al document</a>', 'El projecte lingüístic', '', 'inherit', 'open', 'open', '', '362-revision-v1', '', '', '2016-01-21 13:22:40', '2016-01-21 12:22:40', '', 362, 'http://pwc-int.educacio.intranet/agora/masterpri/general/362-revision-v1/', 0, 'revision', '', 0),
(407, 1, '2016-01-21 13:21:29', '2016-01-21 12:21:29', '<a href="http://xtec.cat/monografics/nodes/links.html?id=participacio_comunitat" target="_blank">Enllaç al document</a>', 'Participació de la comunitat educativa', '', 'inherit', 'open', 'open', '', '360-revision-v1', '', '', '2016-01-21 13:21:29', '2016-01-21 12:21:29', '', 360, 'http://pwc-int.educacio.intranet/agora/masterpri/general/360-revision-v1/', 0, 'revision', '', 0),
(408, 1, '2016-01-21 13:20:28', '2016-01-21 12:20:28', 'Objectius prioritaris del sistema educatiu i projecte educatiu de centre\n\n<a href="http://xtec.cat/monografics/nodes/links.html?id=objectius_prioritaris" target="_blank">Enllaç al document</a>', 'Orientacions projecte educatiu de centre', '', 'inherit', 'open', 'open', '', '358-revision-v1', '', '', '2016-01-21 13:20:28', '2016-01-21 12:20:28', '', 358, 'http://pwc-int.educacio.intranet/agora/masterpri/general/358-revision-v1/', 0, 'revision', '', 0),
(409, 1, '2016-01-21 13:19:20', '2016-01-21 12:19:20', '<a href="http://xtec.cat/monografics/nodes/links.html?id=innovacio" target="_blank">Enllaç al document</a>', 'Innovació pedagògica', '', 'inherit', 'open', 'open', '', '356-revision-v1', '', '', '2016-01-21 13:19:20', '2016-01-21 12:19:20', '', 356, 'http://pwc-int.educacio.intranet/agora/masterpri/general/356-revision-v1/', 0, 'revision', '', 0),
(410, 1, '2016-01-21 13:18:28', '2016-01-21 12:18:28', 'Documents per a l''organització i la gestió dels centres\n\n<a href="http://xtec.cat/monografics/nodes/links.html?id=docs_tac" target="_blank">Enllaç al document</a>', 'Tecnologies per a l’aprenentatge i el coneixement', '', 'inherit', 'open', 'open', '', '354-revision-v1', '', '', '2016-01-21 13:18:28', '2016-01-21 12:18:28', '', 354, 'http://pwc-int.educacio.intranet/agora/masterpri/general/354-revision-v1/', 0, 'revision', '', 0),
(411, 1, '2016-01-21 13:17:24', '2016-01-21 12:17:24', '<a href="http://xtec.cat/monografics/nodes/links.html?id=docs_gestio" target="_blank">Enllaç al document</a>', 'Documents de gestió de centre', '', 'inherit', 'open', 'open', '', '352-revision-v1', '', '', '2016-01-21 13:17:24', '2016-01-21 12:17:24', '', 352, 'http://pwc-int.educacio.intranet/agora/masterpri/general/352-revision-v1/', 0, 'revision', '', 0),
(412, 1, '2016-01-21 13:16:21', '2016-01-21 12:16:21', '<a href="http://xtec.cat/monografics/nodes/links.html?id=convivencia" target="_blank">Enllaç al document</a>', 'Convivència i clima escolar', '', 'inherit', 'open', 'open', '', '350-revision-v1', '', '', '2016-01-21 13:16:21', '2016-01-21 12:16:21', '', 350, 'http://pwc-int.educacio.intranet/agora/masterpri/general/350-revision-v1/', 0, 'revision', '', 0),
(413, 1, '2016-01-21 13:15:18', '2016-01-21 12:15:18', '<a href="http://xtec.cat/monografics/nodes/links.html?id=programacions_recursos" target="_blank">Enllaç al document</a>', 'Programacions i recursos didàctics', '', 'inherit', 'open', 'open', '', '348-revision-v1', '', '', '2016-01-21 13:15:18', '2016-01-21 12:15:18', '', 348, 'http://pwc-int.educacio.intranet/agora/masterpri/general/348-revision-v1/', 0, 'revision', '', 0),
(414, 1, '2016-01-21 13:08:37', '2016-01-21 12:08:37', '<a href="http://xtec.cat/monografics/nodes/links.html?id=orientacions_compromis" target="_blank">Enllaç al document</a>', 'Orientacions per elaborar la carta de compromís', '', 'inherit', 'open', 'open', '', '339-revision-v1', '', '', '2016-01-21 13:08:37', '2016-01-21 12:08:37', '', 339, 'http://pwc-int.educacio.intranet/agora/masterpri/general/339-revision-v1/', 0, 'revision', '', 0),
(415, 1, '2016-01-21 12:32:44', '2016-01-21 11:32:44', 'Model reunió extraordinària\n\n<a href="http://xtec.cat/monografics/nodes/links.html?id=reunio_extraordinaria" target="_blank">Enllaç al document</a>', 'Reunió extraordinària', '', 'inherit', 'open', 'open', '', '334-revision-v1', '', '', '2016-01-21 12:32:44', '2016-01-21 11:32:44', '', 334, 'http://pwc-int.educacio.intranet/agora/masterpri/general/334-revision-v1/', 0, 'revision', '', 0),
(416, 1, '2016-01-21 12:25:21', '2016-01-21 11:25:21', '<a href="http://xtec.cat/monografics/nodes/links.html?id=reunio_ordinaria" target="_blank">Enllaç al document</a>', 'Model de Reunió ordinaria', '', 'inherit', 'open', 'open', '', '332-revision-v1', '', '', '2016-01-21 12:25:21', '2016-01-21 11:25:21', '', 332, 'http://pwc-int.educacio.intranet/agora/masterpri/general/332-revision-v1/', 0, 'revision', '', 0),
(417, 1, '2016-01-21 12:23:59', '2016-01-21 11:23:59', 'Model de certificat\n\n<a href="http://xtec.cat/monografics/nodes/links.html?id=certificat" target="_blank">Enllaç al document</a>', 'Certificat', '', 'inherit', 'open', 'open', '', '330-revision-v1', '', '', '2016-01-21 12:23:59', '2016-01-21 11:23:59', '', 330, 'http://pwc-int.educacio.intranet/agora/masterpri/general/330-revision-v1/', 0, 'revision', '', 0),
(418, 1, '2016-01-21 12:22:12', '2016-01-21 11:22:12', '<a href="http://xtec.cat/monografics/nodes/links.html?id=solicitud" target="_blank">Enllaç al document</a>', 'Sol·licitud (genèrica)', '', 'inherit', 'open', 'open', '', '328-revision-v1', '', '', '2016-01-21 12:22:12', '2016-01-21 11:22:12', '', 328, 'http://pwc-int.educacio.intranet/agora/masterpri/general/328-revision-v1/', 0, 'revision', '', 0),
(419, 1, '2016-01-21 12:20:11', '2016-01-21 11:20:11', '<a href="http://xtec.cat/monografics/nodes/links.html?id=declaracio_jurada" target="_blank">Enllaç al document</a>', 'Declaració jurada', '', 'inherit', 'open', 'open', '', '326-revision-v1', '', '', '2016-01-21 12:20:11', '2016-01-21 11:20:11', '', 326, 'http://pwc-int.educacio.intranet/agora/masterpri/general/326-revision-v1/', 0, 'revision', '', 0),
(420, 1, '2016-01-21 12:17:45', '2016-01-21 11:17:45', '<ul>\n	<li>Ordre del dia</li>\n	<li>Desenvolupament de la sessió</li>\n	<li>Acords</li>\n	<li>Temes pendents</li>\n</ul>\n<a href="http://xtec.cat/monografics/nodes/links.html?id=acta_reunio" target="_blank">Enllaç al document</a>', 'Model d’acta de reunió', '', 'inherit', 'open', 'open', '', '323-revision-v1', '', '', '2016-01-21 12:17:45', '2016-01-21 11:17:45', '', 323, 'http://pwc-int.educacio.intranet/agora/masterpri/general/323-revision-v1/', 0, 'revision', '', 0),
(421, 1, '2016-01-21 12:14:13', '2016-01-21 11:14:13', 'Sol·licitud de compatibilitat per a activitats públiques i/o privades\n<a style="line-height: 1.5;" href="http://xtec.cat/monografics/nodes/links.html?id=compatibilitat" target="_blank">Enllaç al document</a>', 'Sol·licitud de Compatibilitat', '', 'inherit', 'open', 'open', '', '317-revision-v1', '', '', '2016-01-21 12:14:13', '2016-01-21 11:14:13', '', 317, 'http://pwc-int.educacio.intranet/agora/masterpri/general/317-revision-v1/', 0, 'revision', '', 0),
(422, 1, '2016-01-21 12:11:38', '2016-01-21 11:11:38', 'Sol·licitud de reconeixement d’estadi de promoció docent\n\n<a href="http://xtec.cat/monografics/nodes/links.html?id=promocio">Enllaç al document</a>', 'Sol·licitud de reconeixement d’estadi de promoció docent', '', 'inherit', 'open', 'open', '', '320-revision-v1', '', '', '2016-01-21 12:11:38', '2016-01-21 11:11:38', '', 320, 'http://pwc-int.educacio.intranet/agora/masterpri/general/320-revision-v1/', 0, 'revision', '', 0),
(423, 1, '2016-01-21 12:08:22', '2016-01-21 11:08:22', '<a href="http://xtec.cat/monografics/nodes/links.html?id=triennis" target="_blank">Enllaç al document</a>', 'Sol·licitud de reconeixement de triennis', '', 'inherit', 'open', 'open', '', '318-revision-v1', '', '', '2016-01-21 12:08:22', '2016-01-21 11:08:22', '', 318, 'http://pwc-int.educacio.intranet/agora/masterpri/general/318-revision-v1/', 0, 'revision', '', 0),
(424, 1, '2016-01-21 10:30:24', '2016-01-21 09:30:24', '<a href="http://xtec.cat/monografics/nodes/links.html?id=reduccio_cura_fills" target="_blank">Enllaç al document</a>', 'Sol·licitud de reducció de jornada per tenir cura d’un fill o filla', '', 'inherit', 'open', 'open', '', '314-revision-v1', '', '', '2016-01-21 10:30:24', '2016-01-21 09:30:24', '', 314, 'http://pwc-int.educacio.intranet/agora/masterpri/general/314-revision-v1/', 0, 'revision', '', 0),
(425, 1, '2016-01-21 10:26:50', '2016-01-21 09:26:50', '<a href="http://xtec.cat/monografics/nodes/links.html?id=jurada_permisos_llicencies" target="_blank">Enllaç al document</a>', 'Declaració jurada o promesa per sol·licitar permisos i llicències', '', 'inherit', 'open', 'open', '', '312-revision-v1', '', '', '2016-01-21 10:26:50', '2016-01-21 09:26:50', '', 312, 'http://pwc-int.educacio.intranet/agora/masterpri/general/312-revision-v1/', 0, 'revision', '', 0),
(426, 1, '2016-01-21 10:22:39', '2016-01-21 09:22:39', '<ul>\n	<li>Llicència per estudis (sense retribució). Màxim: un curs escolar</li>\n	<li>Llicència per assumptes propis</li>\n	<li>Llicència per accident laboral</li>\n	<li>Llicència per incapacitat temporal per malaltia comuna i risc durant l’embaràs</li>\n</ul>\n<a href="http://xtec.cat/monografics/nodes/links.html?id=llicencia" target="_blank">Enllaç al document</a>\n\n&nbsp;', 'Sol·licitud de llicència', '', 'inherit', 'open', 'open', '', '308-revision-v1', '', '', '2016-01-21 10:22:39', '2016-01-21 09:22:39', '', 308, 'http://pwc-int.educacio.intranet/agora/masterpri/general/308-revision-v1/', 0, 'revision', '', 0),
(427, 1, '2016-01-21 10:13:32', '2016-01-21 09:13:32', 'Declaració responsable justificativa d’absència per motius de salut d’assistència a consulta mèdica. Personal docent.\n\n<a href="http://xtec.cat/monografics/nodes/links.html?id=consulta_metge" target="_blank">Enllaç al document</a>', 'Justificant d’absència per motius de salut o consulta mèdica', '', 'inherit', 'open', 'open', '', '304-revision-v1', '', '', '2016-01-21 10:13:32', '2016-01-21 09:13:32', '', 304, 'http://pwc-int.educacio.intranet/agora/masterpri/general/304-revision-v1/', 0, 'revision', '', 0),
(428, 1, '2016-01-21 10:07:15', '2016-01-21 09:07:15', '<a href="http://xtec.cat/monografics/nodes/links.html?id=paracetamol" target="_blank">Enllaç al document</a>', 'Autorització per a l’administració del paracetamol', '', 'inherit', 'open', 'open', '', '302-revision-v1', '', '', '2016-01-21 10:07:15', '2016-01-21 09:07:15', '', 302, 'http://pwc-int.educacio.intranet/agora/masterpri/general/302-revision-v1/', 0, 'revision', '', 0),
(429, 1, '2016-01-21 09:59:27', '2016-01-21 08:59:27', 'Autorització relativa als alumnes de menys de 14 anys: ús de serveis i recursos digitals per treballar a l''aula.\n\n<a href="http://xtec.cat/monografics/nodes/links.html?id=serveis_menors_14">Enllaç al document</a>', 'Autorització ús de serveis i recursos digitals a l''aula (menors de 14 anys)', '', 'inherit', 'open', 'open', '', '297-revision-v1', '', '', '2016-01-21 09:59:27', '2016-01-21 08:59:27', '', 297, 'http://pwc-int.educacio.intranet/agora/masterpri/general/297-revision-v1/', 0, 'revision', '', 0),
(430, 1, '2016-01-21 19:33:01', '2016-01-21 18:33:01', 'Autorització relativa als alumnes de menys de 14 anys: ús de serveis i recursos digitals per treballar a l''aula.\r\n\r\n<a href="http://xtec.cat/monografics/nodes/links.html?id=serveis_menors_14">Enllaç al document</a>', 'Autorització ús de serveis i recursos digitals a l’aula (menors de 14 anys)', '', 'inherit', 'open', 'open', '', '297-revision-v1', '', '', '2016-01-21 19:33:01', '2016-01-21 18:33:01', '', 297, 'http://pwc-int.educacio.intranet/agora/masterpri/general/297-revision-v1/', 0, 'revision', '', 0),
(431, 1, '2016-01-21 09:53:14', '2016-01-21 08:53:14', 'Autorització relativa als alumnes: ús d''imatges, publicació de dades de caràcter personal i de material que elaboren (menors de 14 anys)\n\n<a href="http://xtec.cat/monografics/nodes/links.html?id=imatge_menors_14" target="_blank">Enllaç al document</a>', 'Autorització drets d’imatge, dades i materials (menors de 14 anys)', '', 'inherit', 'open', 'open', '', '292-revision-v1', '', '', '2016-01-21 09:53:14', '2016-01-21 08:53:14', '', 292, 'http://pwc-int.educacio.intranet/agora/masterpri/general/292-revision-v1/', 0, 'revision', '', 0),
(432, 1, '2016-01-21 19:36:16', '2016-01-21 18:36:16', '<a href="http://xtec.cat/monografics/nodes/links.html?id=comunicacio_diabetes" target="_blank">Enllaç al document</a>', 'Comunicació de l’escolarització d’un infant amb diabetis al centre d’atenció primària (CAP)', '', 'publish', 'open', 'open', '', 'comunicacio-de-lescolaritzacio-dun-infant-amb-diabetis-al-centre-datencio-primaria-cap', '', '', '2016-01-21 19:38:15', '2016-01-21 18:38:15', '', 0, 'http://pwc-int.educacio.intranet/agora/masterpri/docs/', 0, 'bp_doc', '', 0),
(433, 1, '2016-01-21 19:36:16', '2016-01-21 18:36:16', '', 'Comunicació de l’escolarització d’un infant amb diabetis al centre d’atenció primària (CAP)', '', 'inherit', 'open', 'open', '', '432-revision-v1', '', '', '2016-01-21 19:36:16', '2016-01-21 18:36:16', '', 432, 'https://pwc-int.educacio.intranet/agora/masterpri/general/432-revision-v1/', 0, 'revision', '', 0),
(434, 1, '2016-01-21 19:38:15', '2016-01-21 18:38:15', '<a href="http://xtec.cat/monografics/nodes/links.html?id=comunicacio_diabetes" target="_blank">Enllaç al document</a>', 'Comunicació de l’escolarització d’un infant amb diabetis al centre d’atenció primària (CAP)', '', 'inherit', 'open', 'open', '', '432-revision-v1', '', '', '2016-01-21 19:38:15', '2016-01-21 18:38:15', '', 432, 'https://pwc-int.educacio.intranet/agora/masterpri/general/432-revision-v1/', 0, 'revision', '', 0),
(435, 1, '2016-01-21 19:41:40', '2016-01-21 18:41:40', '', 'Documents', '', 'publish', 'open', 'open', '', 'documents', '', '', '2016-01-21 19:42:18', '2016-01-21 18:42:18', '', 0, 'http://pwc-int.educacio.intranet/agora/masterpri/?p=435', 10, 'nav_menu_item', '', 0),
(436, 1, '2016-03-29 12:39:43', '2016-03-29 11:39:43', '', 'Activa', '', 'publish', 'closed', 'closed', '', 'activa', '', '', '2016-03-29 12:39:49', '2016-03-29 11:39:49', '', 0, 'http://pwc-int.educacio.intranet/agora/masterpri/?page_id=436', 0, 'page', '', 0),
(437, 1, '2016-03-29 12:39:43', '2016-03-29 11:39:43', '', 'Activa', '', 'inherit', 'open', 'open', '', '436-revision-v1', '', '', '2016-03-29 12:39:43', '2016-03-29 11:39:43', '', 436, 'http://pwc-int.educacio.intranet/agora/masterpri/general/436-revision-v1/', 0, 'revision', '', 0),
(440, 1, '2016-03-29 12:42:09', '2016-03-29 11:42:09', '', 'Registre', '', 'publish', 'closed', 'closed', '', 'registre', '', '', '2016-03-29 12:51:43', '2016-03-29 11:51:43', '', 0, 'http://pwc-int.educacio.intranet/agora/masterpri/?page_id=440', 0, 'page', '', 0),
(441, 1, '2016-03-29 12:42:09', '2016-03-29 11:42:09', '', 'Registre', '', 'inherit', 'open', 'open', '', '440-revision-v1', '', '', '2016-03-29 12:42:09', '2016-03-29 11:42:09', '', 440, 'http://pwc-int.educacio.intranet/agora/masterpri/general/440-revision-v1/', 0, 'revision', '', 0);

-- --------------------------------------------------------

--
-- Estructura de la taula `wp_signups`
--

CREATE TABLE `wp_signups` (
  `signup_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `domain` varchar(200) NOT NULL DEFAULT '',
  `path` varchar(100) NOT NULL DEFAULT '',
  `title` longtext NOT NULL,
  `user_login` varchar(60) NOT NULL DEFAULT '',
  `user_email` varchar(100) NOT NULL DEFAULT '',
  `registered` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `activated` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `activation_key` varchar(50) NOT NULL DEFAULT '',
  `meta` longtext,
  PRIMARY KEY (`signup_id`),
  KEY `activation_key` (`activation_key`),
  KEY `user_email` (`user_email`),
  KEY `user_login_email` (`user_login`,`user_email`),
  KEY `domain_path` (`domain`,`path`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de la taula `wp_stats`
--

CREATE TABLE `wp_stats` (
  `stat_id` int(11) NOT NULL AUTO_INCREMENT,
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
  PRIMARY KEY (`stat_id`),
  KEY `uid` (`uid`),
  KEY `ip` (`ip`),
  KEY `ipForward` (`ipForward`),
  KEY `ipClient` (`ipClient`),
  KEY `userAgent` (`userAgent`),
  KEY `isadmin` (`isadmin`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de la taula `wp_terms`
--

CREATE TABLE `wp_terms` (
  `term_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `slug` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `term_group` bigint(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`term_id`),
  KEY `name` (`name`(191)),
  KEY `slug` (`slug`(191))
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=35 ;

--
-- Bolcant dades de la taula `wp_terms`
--

INSERT INTO `wp_terms` (`term_id`, `name`, `slug`, `term_group`) VALUES
(1, 'General', 'general', 0),
(2, 'Infantil', 'infantil', 0),
(3, 'P3', 'p3', 0),
(4, 'Portada', 'portada', 0),
(5, 'Primària', 'primaria', 0),
(6, 'Menú principal', 'menu-principal', 0),
(7, 'AMPA', 'ampa', 0),
(8, 'P4', 'p4', 0),
(9, 'P5', 'p5', 0),
(10, '1r', '1r', 0),
(11, '2n', '2n', 0),
(12, '3r', '3r', 0),
(13, '4t', '4t', 0),
(14, '5è', '5e', 0),
(15, '6è', '6e', 0),
(16, 'Sortides', 'sortides', 0),
(17, 'Plàstica', 'plastica', 0),
(18, 'Psicomotricitat', 'psicomotricitat', 0),
(19, 'Audiovisuals', 'audiovisuals', 0),
(20, 'Menú exemple', 'menu-exemple', 0),
(21, 'MenuNodes', 'menunodes', 0),
(22, 'autoritzacions', 'autoritzacions', 0),
(23, 'bp_docs_access_anyone', 'bp_docs_access_anyone', 0),
(24, 'LOPD', 'lopd', 0),
(25, 'secretaria', 'secretaria', 0),
(26, 'salut', 'salut', 0),
(27, 'bp_docs_access_group_member_1', 'bp_docs_access_group_member_1', 0),
(28, 'Professorat', 'bp_docs_associated_group_1', 0),
(29, 'orientació', 'orientacio', 0),
(30, 'actes', 'actes', 0),
(31, 'organització i gestió del centre', 'organitzacio-i-gestio-del-centre', 0),
(32, 'Fotografia', 'bp_docs_associated_group_17', 0),
(33, 'Mestres', 'bp_docs_associated_group_2', 0),
(34, 'bp_docs_access_group_member_2', 'bp_docs_access_group_member_2', 0);

-- --------------------------------------------------------

--
-- Estructura de la taula `wp_term_relationships`
--

CREATE TABLE `wp_term_relationships` (
  `object_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `term_taxonomy_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `term_order` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`object_id`,`term_taxonomy_id`),
  KEY `term_taxonomy_id` (`term_taxonomy_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Bolcant dades de la taula `wp_term_relationships`
--

INSERT INTO `wp_term_relationships` (`object_id`, `term_taxonomy_id`, `term_order`) VALUES
(13, 3, 0),
(13, 4, 0),
(13, 8, 0),
(13, 11, 0),
(13, 13, 0),
(13, 15, 0),
(13, 19, 0),
(18, 4, 0),
(18, 7, 0),
(18, 8, 0),
(18, 10, 0),
(18, 11, 0),
(18, 12, 0),
(18, 13, 0),
(18, 14, 0),
(18, 17, 0),
(18, 18, 0),
(55, 6, 0),
(56, 6, 0),
(57, 6, 0),
(58, 6, 0),
(59, 6, 0),
(60, 6, 0),
(61, 6, 0),
(62, 6, 0),
(63, 6, 0),
(69, 6, 0),
(70, 6, 0),
(75, 6, 0),
(76, 6, 0),
(79, 6, 0),
(86, 6, 0),
(89, 6, 0),
(90, 6, 0),
(91, 6, 0),
(92, 6, 0),
(93, 6, 0),
(94, 6, 0),
(95, 6, 0),
(96, 6, 0),
(97, 6, 0),
(98, 6, 0),
(99, 6, 0),
(100, 6, 0),
(101, 6, 0),
(113, 4, 0),
(113, 5, 0),
(113, 7, 0),
(113, 8, 0),
(113, 9, 0),
(113, 13, 0),
(113, 14, 0),
(113, 15, 0),
(113, 17, 0),
(113, 18, 0),
(115, 3, 0),
(115, 4, 0),
(115, 8, 0),
(115, 9, 0),
(115, 10, 0),
(115, 16, 0),
(118, 4, 0),
(118, 10, 0),
(118, 11, 0),
(118, 12, 0),
(118, 13, 0),
(118, 16, 0),
(118, 19, 0),
(120, 4, 0),
(120, 10, 0),
(120, 11, 0),
(120, 16, 0),
(148, 6, 0),
(149, 6, 0),
(150, 20, 0),
(151, 20, 0),
(152, 20, 0),
(153, 20, 0),
(154, 20, 0),
(155, 20, 0),
(157, 21, 0),
(158, 21, 0),
(159, 21, 0),
(160, 22, 0),
(161, 22, 0),
(162, 22, 0),
(163, 22, 0),
(164, 22, 0),
(165, 22, 0),
(173, 23, 0),
(174, 23, 0),
(175, 23, 0),
(292, 24, 0),
(292, 26, 0),
(292, 27, 0),
(292, 35, 0),
(292, 36, 0),
(297, 24, 0),
(297, 26, 0),
(297, 27, 0),
(297, 35, 0),
(297, 36, 0),
(302, 24, 0),
(302, 27, 0),
(302, 28, 0),
(302, 35, 0),
(302, 36, 0),
(304, 28, 0),
(304, 35, 0),
(304, 36, 0),
(308, 35, 0),
(308, 36, 0),
(312, 35, 0),
(312, 36, 0),
(314, 35, 0),
(314, 36, 0),
(317, 35, 0),
(317, 36, 0),
(318, 35, 0),
(318, 36, 0),
(320, 35, 0),
(320, 36, 0),
(323, 32, 0),
(323, 35, 0),
(323, 36, 0),
(326, 35, 0),
(326, 36, 0),
(328, 35, 0),
(328, 36, 0),
(330, 35, 0),
(330, 36, 0),
(332, 35, 0),
(332, 36, 0),
(334, 35, 0),
(334, 36, 0),
(336, 25, 0),
(336, 27, 0),
(336, 28, 0),
(338, 25, 0),
(338, 27, 0),
(338, 28, 0),
(339, 35, 0),
(339, 36, 0),
(348, 35, 0),
(348, 36, 0),
(350, 35, 0),
(350, 36, 0),
(352, 35, 0),
(352, 36, 0),
(354, 33, 0),
(354, 35, 0),
(354, 36, 0),
(356, 33, 0),
(356, 35, 0),
(356, 36, 0),
(358, 33, 0),
(358, 35, 0),
(358, 36, 0),
(360, 33, 0),
(360, 35, 0),
(360, 36, 0),
(362, 35, 0),
(362, 36, 0),
(364, 33, 0),
(364, 35, 0),
(364, 36, 0),
(366, 35, 0),
(366, 36, 0),
(379, 35, 0),
(379, 36, 0),
(383, 35, 0),
(383, 36, 0),
(385, 35, 0),
(385, 36, 0),
(387, 33, 0),
(387, 35, 0),
(387, 36, 0),
(391, 35, 0),
(391, 36, 0),
(432, 25, 0),
(432, 27, 0),
(432, 28, 0),
(435, 6, 0);

-- --------------------------------------------------------

--
-- Estructura de la taula `wp_term_taxonomy`
--

CREATE TABLE `wp_term_taxonomy` (
  `term_taxonomy_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `term_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `taxonomy` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent` bigint(20) unsigned NOT NULL DEFAULT '0',
  `count` bigint(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`term_taxonomy_id`),
  UNIQUE KEY `term_id_taxonomy` (`term_id`,`taxonomy`),
  KEY `taxonomy` (`taxonomy`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=37 ;

--
-- Bolcant dades de la taula `wp_term_taxonomy`
--

INSERT INTO `wp_term_taxonomy` (`term_taxonomy_id`, `term_id`, `taxonomy`, `description`, `parent`, `count`) VALUES
(1, 1, 'category', '', 0, 0),
(2, 2, 'category', '', 0, 0),
(3, 3, 'category', '', 2, 2),
(4, 4, 'category', '', 0, 6),
(5, 5, 'category', '', 0, 1),
(6, 6, 'nav_menu', '', 0, 31),
(7, 7, 'category', '', 0, 2),
(8, 8, 'category', '', 2, 4),
(9, 9, 'category', '', 2, 2),
(10, 10, 'category', '', 5, 4),
(11, 11, 'category', '', 5, 4),
(12, 12, 'category', '', 5, 2),
(13, 13, 'category', '', 5, 4),
(14, 14, 'category', '', 5, 2),
(15, 15, 'category', '', 5, 2),
(16, 16, 'post_tag', '', 0, 3),
(17, 17, 'post_tag', '', 0, 2),
(18, 18, 'post_tag', '', 0, 2),
(19, 19, 'post_tag', '', 0, 2),
(20, 20, 'nav_menu', '', 0, 6),
(21, 2, 'nav_menu', '', 0, 3),
(22, 5, 'nav_menu', '', 0, 6),
(23, 21, 'nav_menu', '', 0, 3),
(24, 22, 'bp_docs_tag', '', 0, 3),
(25, 23, 'bp_docs_access', '', 0, 3),
(26, 24, 'bp_docs_tag', '', 0, 2),
(27, 25, 'bp_docs_tag', '', 0, 6),
(28, 26, 'bp_docs_tag', '', 0, 5),
(29, 27, 'bp_docs_access', '', 0, 0),
(30, 28, 'bp_docs_associated_item', '', 0, 0),
(31, 29, 'bp_docs_tag', '', 0, 0),
(32, 30, 'bp_docs_tag', '', 0, 1),
(33, 31, 'bp_docs_tag', '', 0, 6),
(34, 32, 'bp_docs_associated_item', '', 0, 0),
(35, 33, 'bp_docs_associated_item', 'Document associat a group Mestres', 0, 32),
(36, 34, 'bp_docs_access', '', 0, 32);

-- --------------------------------------------------------

--
-- Estructura de la taula `wp_usermeta`
--

CREATE TABLE `wp_usermeta` (
  `umeta_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `meta_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_value` longtext COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`umeta_id`),
  KEY `user_id` (`user_id`),
  KEY `meta_key` (`meta_key`(191))
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=79 ;

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
(26, 2, 'dismissed_wp_pointers', 'wp350_media,wp360_revisions,wp360_locks,wp390_widgets,wp410_dfw,addtoany_settings_pointer'),
(27, 2, 'wp_dashboard_quick_press_last_post_id', '4'),
(28, 2, 'last_activity', '2016-04-05 09:55:18'),
(29, 1, 'last_activity', '2014-12-01 12:15:41'),
(30, 2, 'wp_user-settings', 'editor=tinymce&libraryContent=browse&widgets_access=off'),
(31, 2, 'wp_user-settings-time', '1453401582'),
(35, 2, 'screen_layout_post', '2'),
(36, 2, 'managenav-menuscolumnshidden', 'a:4:{i:0;s:11:"link-target";i:1;s:11:"css-classes";i:2;s:3:"xfn";i:3;s:11:"description";}'),
(37, 2, 'metaboxhidden_nav-menus', 'a:11:{i:0;s:23:"add-buddypress-nav-menu";i:1;s:8:"add-post";i:2;s:9:"add-forum";i:3;s:10:"add-bp_doc";i:4;s:12:"add-post_tag";i:5;s:15:"add-post_format";i:6;s:15:"add-ia_invitees";i:7;s:21:"add-ia_invited_groups";i:8;s:27:"add-bp_docs_associated_item";i:9;s:18:"add-bp_docs_access";i:10;s:15:"add-bp_docs_tag";}'),
(38, 2, 'nav_menu_recently_edited', '5'),
(39, 2, 'show_welcome_panel', '1'),
(40, 2, 'meta-box-order_dashboard', 'a:4:{s:6:"normal";s:19:"dashboard_right_now";s:4:"side";s:18:"dashboard_activity";s:7:"column3";s:0:"";s:7:"column4";s:0:"";}'),
(41, 2, 'closedpostboxes_slideshow', 'a:0:{}'),
(42, 2, 'metaboxhidden_slideshow', 'a:1:{i:3;s:7:"slugdiv";}'),
(43, 2, 'meta-box-order_slideshow', 'a:3:{s:4:"side";s:26:"submitdiv,slides-list,,,,,";s:6:"normal";s:34:"information,slugdiv,style,settings";s:8:"advanced";s:0:"";}'),
(44, 2, 'screen_layout_slideshow', '2'),
(46, 1, 'screen_layout_post', '2'),
(47, 1, 'wp_user-settings', 'editor=tinymce&libraryContent=browse'),
(48, 1, 'wp_user-settings-time', '1411383268'),
(49, 1, 'closedpostboxes_slideshow', 'a:0:{}'),
(50, 1, 'metaboxhidden_slideshow', 'a:1:{i:3;s:7:"slugdiv";}'),
(53, 2, 'total_group_count', '2'),
(54, 2, 'ass_digest_items', 'a:1:{s:3:"dig";a:0:{}}'),
(55, 1, 'nav_menu_recently_edited', '6'),
(56, 1, 'managenav-menuscolumnshidden', 'a:4:{i:0;s:11:"link-target";i:1;s:11:"css-classes";i:2;s:3:"xfn";i:3;s:11:"description";}'),
(57, 1, 'metaboxhidden_nav-menus', 'a:12:{i:0;s:23:"add-buddypress-nav-menu";i:1;s:8:"add-post";i:2;s:9:"add-forum";i:3;s:10:"add-bp_doc";i:4;s:12:"add-gce_feed";i:5;s:12:"add-post_tag";i:6;s:15:"add-post_format";i:7;s:15:"add-ia_invitees";i:8;s:21:"add-ia_invited_groups";i:9;s:27:"add-bp_docs_associated_item";i:10;s:18:"add-bp_docs_access";i:11;s:15:"add-bp_docs_tag";}'),
(60, 2, 'meta-box-order_post', 'a:3:{s:4:"side";s:56:"submitdiv,postimagediv,postexcerpt,metabox1,tagsdiv-post";s:6:"normal";s:11:"categorydiv";s:8:"advanced";s:0:"";}'),
(61, 2, 'metaboxhidden_post', 'a:5:{i:0;s:12:"revisionsdiv";i:1;s:16:"commentstatusdiv";i:2;s:11:"commentsdiv";i:3;s:7:"slugdiv";i:4;s:9:"authordiv";}'),
(62, 2, 'meta-box-order_page', 'a:3:{s:4:"side";s:23:"submitdiv,pageparentdiv";s:6:"normal";s:16:"commentstatusdiv";s:8:"advanced";s:0:"";}'),
(63, 2, 'metaboxhidden_page', 'a:5:{i:0;s:9:"authordiv";i:1;s:11:"commentsdiv";i:2;s:16:"commentstatusdiv";i:3;s:12:"revisionsdiv";i:4;s:7:"slugdiv";}'),
(64, 2, 'closedpostboxes_page', 'a:1:{i:0;s:11:"layout_meta";}'),
(68, 2, 'closedpostboxes_post', 'a:0:{}'),
(69, 2, 'bp_liked_activities', 'a:0:{}'),
(70, 2, 'bp_docs_count', '1'),
(73, 1, 'meta-box-order_page', 'a:3:{s:4:"side";s:23:"submitdiv,pageparentdiv";s:6:"normal";s:16:"commentstatusdiv";s:8:"advanced";s:0:"";}'),
(74, 1, 'metaboxhidden_page', 'a:5:{i:0;s:9:"authordiv";i:1;s:11:"commentsdiv";i:2;s:16:"commentstatusdiv";i:3;s:12:"revisionsdiv";i:4;s:7:"slugdiv";}'),
(75, 1, 'closedpostboxes_page', 'a:1:{i:0;s:11:"layout_meta";}'),
(78, 2, 'session_tokens', 'a:1:{s:64:"3043d0515c1da27bfdb76aa581d9c3335ea9e41f504a5978de3271d152829f7f";a:4:{s:10:"expiration";i:1460022918;s:2:"ip";s:11:"10.155.7.35";s:2:"ua";s:76:"Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:45.0) Gecko/20100101 Firefox/45.0";s:5:"login";i:1459850118;}}');

-- --------------------------------------------------------

--
-- Estructura de la taula `wp_users`
--

CREATE TABLE `wp_users` (
  `ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_login` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_pass` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_nicename` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_url` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_registered` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `user_activation_key` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_status` int(11) NOT NULL DEFAULT '0',
  `display_name` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`ID`),
  KEY `user_login_key` (`user_login`),
  KEY `user_nicename` (`user_nicename`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=3 ;

--
-- Bolcant dades de la taula `wp_users`
--

INSERT INTO `wp_users` (`ID`, `user_login`, `user_pass`, `user_nicename`, `user_email`, `user_url`, `user_registered`, `user_activation_key`, `user_status`, `display_name`) VALUES
(1, 'admin', '', 'admin', 'a8000006@xtec.cat', '', '2014-09-12 09:10:47', '', 0, 'admin'),
(2, 'xtecadmin', '', 'xtecadmin', 'agora@xtec.invalid', '', '2014-09-12 09:26:41', '', 0, 'xtecadmin');

-- --------------------------------------------------------

--
-- Estructura de la taula `wp_wsluserscontacts`
--

CREATE TABLE `wp_wsluserscontacts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `provider` varchar(50) NOT NULL,
  `identifier` varchar(255) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `profile_url` varchar(255) NOT NULL,
  `photo_url` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de la taula `wp_wslusersprofiles`
--

CREATE TABLE `wp_wslusersprofiles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `zip` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
