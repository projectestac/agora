<?php

// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Strings for component 'enrol_database', language 'zh_cn', branch 'MOODLE_24_STABLE'
 *
 * @package   enrol_database
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['database:unenrol'] = '移除禁用的用户';
$string['dbencoding'] = '数据库编码';
$string['dbhost'] = '数据库主机';
$string['dbhost_desc'] = '输入数据库服务器IP地址或域名';
$string['dbname'] = '数据库名';
$string['dbpass'] = '数据库密码';
$string['dbsetupsql'] = '数据库设置命令';
$string['dbsetupsql_desc'] = '设置某些数据库的SQL命令。通常用来设置通信编码 — 例如在MySQL和PostgreSQL中：<em>SET NAMES \'utf8\'</em>';
$string['dbsybasequoting'] = '使用sybase引号';
$string['dbsybasequoting_desc'] = 'Sybase风格的单引号转义 — Oracle、MS SQL和其它某些数据库需要。不要在MySQL上使用！';
$string['dbtype'] = '数据库驱动';
$string['dbtype_desc'] = 'ADOdb数据库驱动名，也就是外部数据块引擎的类型。';
$string['dbuser'] = '数据库用户';
$string['debugdb'] = '调试ADOdb';
$string['debugdb_desc'] = '调试ADOdb与外部数据库的连接 — 如登录时显示空白页，就使用此选项。不适用于正式使用的网站！';
$string['defaultcategory'] = '缺省的新课程类别';
$string['defaultcategory_desc'] = '自动创建的课程的缺省类别。当未指定类别id或类别id不存在时使用。';
$string['defaultrole'] = '缺省角色';
$string['defaultrole_desc'] = '如果外部表中未指定其它角色，会缺省分配此角色。';
$string['ignorehiddencourses'] = '忽略隐藏的课程';
$string['ignorehiddencourses_desc'] = '如果启用，用户不会被加入设为学生不可学习的课程。';
$string['localcategoryfield'] = '本地类别字段';
$string['localcoursefield'] = '本地课程字段';
$string['localrolefield'] = '本地角色字段';
$string['localuserfield'] = '本地用户字段';
$string['newcoursecategory'] = '新课程分类字段';
$string['newcoursefullname'] = '新课程的全称字段';
$string['newcourseidnumber'] = '新课程编号字段';
$string['newcourseshortname'] = '新课程简称字段';
$string['newcoursetable'] = '远程新课程数据表';
$string['newcoursetable_desc'] = '指定一个表名，它应该包含所有要自动新建的课程。留空表示不创建任何课程。';
$string['pluginname'] = '外部数据库';
$string['pluginname_desc'] = '您可以使用几乎所有类型的外部数据库控制您的选课。您的外部数据库至少要有一个课程ID字段和一个用户ID字段。它们会和本地课程表和用户表中您选择的字段相匹配。';
$string['remotecoursefield'] = '远程课程字段';
$string['remotecoursefield_desc'] = '用来和课程表匹配的远程表中的字段名。';
$string['remoteenroltable'] = '远程用户选课数据表';
$string['remoteenroltable_desc'] = '指定包含用户选课信息的表名。留空表示不同步任何用户的选课。';
$string['remoterolefield'] = '远程角色字段';
$string['remoterolefield_desc'] = '用来和角色表匹配的远程表中的字段名';
$string['remoteuserfield'] = '远程用户字段';
$string['remoteuserfield_desc'] = '用来和用户表匹配的远程表中的字段名';
$string['settingsheaderdb'] = '外部数据库连接';
$string['settingsheaderlocal'] = '本地字段映射';
$string['settingsheadernewcourses'] = '创建新课程';
$string['settingsheaderremote'] = '同步远程选课';
$string['templatecourse'] = '新课程模板';
$string['templatecourse_desc'] = '可选：自动创建的课程可以从模板课程拷贝设置。在此输入模板课程的简称。';
