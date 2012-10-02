# This file contains a complete database schema for all the 
# tables used by qv module, written in SQL


#
# Table structure for `qv`
#

CREATE TABLE `prefix_qv` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `course` int(10) unsigned NOT NULL default '0',
  `name` varchar(255) NOT NULL default '',
  `description` text,
  `assessmenturl` varchar(255) NOT NULL default '',
  `skin` varchar(20) NOT NULL default '',
  `assessmentlang` varchar(10) NOT NULL default 'ca',
  `maxdeliver` int(3) NOT NULL default '-1',
  `showcorrection` int(1) unsigned NOT NULL default '1',
  `showinteraction` int(1) unsigned NOT NULL default '1',
  `ordersections` int(1) unsigned default '0',
  `orderitems` int(1) unsigned default '0',
  `target` varchar(10) NOT NULL default 'descself',
  `maxgrade` decimal(10,0) unsigned default NULL,
  `width` varchar(10) default NULL,
  `height` varchar(10) default NULL,
  PRIMARY KEY  (`id`),
  KEY `course` (`course`)
) COMMENT='Main information about each assessment';
# --------------------------------------------------------

#
# Table structure for `qv_assignments`
#

CREATE TABLE `prefix_qv_assignments` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `qvid` int(10) unsigned NOT NULL default '0',
  `userid` int(10) unsigned NOT NULL default '0',
  `sectionorder` int(10) unsigned default '0',
  `itemorder` int(10) unsigned default '0',
  `idnumber` varchar(100) default '',
  PRIMARY KEY  (`id`),
  KEY `userid` (`userid`),
  KEY `qvid` (`qvid`),
  KEY `idnumber` (`idnumber`)
) COMMENT='Stores user assignments for each course';
# --------------------------------------------------------

#
# Table structure for `qv_sections`
#

CREATE TABLE `prefix_qv_sections` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `assignmentid` int(10) unsigned NOT NULL default '0',
  `sectionid` varchar(255) default NULL,
  `responses` text,
  `scores` text,
  `pending_scores` text,
  `attempts` tinyint(6) default '0',
  `state` tinyint(1) default '0' COMMENT '-1 no_iniciat;0 iniciat; 1 lliurat;2 corregit',
  `time` char(8) default "00:00:00" NOT NULL,
  PRIMARY KEY  (`id`)
) COMMENT='Stores all user assignment sections';
# --------------------------------------------------------

# 
# Table structure for `qv_messages`
# 

CREATE TABLE `prefix_qv_messages` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `sid` int(10) unsigned NOT NULL default '0',
  `itemid` varchar(255) NOT NULL default '',
  `userid` int(10) unsigned NOT NULL,
  `created` int(10) default NULL,
  `message` text,
  PRIMARY KEY  (`id`)
) COMMENT='Stores user messages for each assignment';
# --------------------------------------------------------


# 
# Table structure for `qv_messages_red`
# 

CREATE TABLE `prefix_qv_messages_read` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `sid` int(10) unsigned NOT NULL default '0',
  `userid` int(10) unsigned NOT NULL default '0',
  `timereaded` int(10) unsigned default NULL,
  PRIMARY KEY  (`id`)
) COMMENT='Stores user control access to messages';
# --------------------------------------------------------



#INSERT INTO `prefix_log_display` VALUES ('qv', 'assessments', 'qv', 'name');
#INSERT INTO `prefix_log_display` VALUES ('qv', 'close', 'qv', 'name');
#INSERT INTO `prefix_log_display` VALUES ('qv', 'display', 'qv', 'name');
#INSERT INTO `prefix_log_display` VALUES ('qv', 'resubmit', 'qv', 'name');
#INSERT INTO `prefix_log_display` VALUES ('qv', 'set up', 'qv', 'name');
#INSERT INTO `prefix_log_display` VALUES ('qv', 'submissions', 'qv', 'name');
#INSERT INTO `prefix_log_display` VALUES ('qv', 'view', 'qv', 'name');
#INSERT INTO `prefix_log_display` VALUES ('qv', 'update', 'qv', 'name');
