# This file contains a complete database schema for all the 
# tables used by eoicampus module, written in SQL


#
# Table structure for `eoicampus`
#

CREATE TABLE `prefix_eoicampus` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `course` int(10) unsigned NOT NULL default '0',
  `name` varchar(255) NOT NULL default '',
  `description` text,
  `pwlevel` varchar(10),
  `pwid` varchar(50),
  `pwtype` varchar(20),
  PRIMARY KEY  (`id`),
  KEY `course` (`course`)
) COMMENT='Main information about each eoicampus activity';
# --------------------------------------------------------
