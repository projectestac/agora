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
 * Strings for component 'tool_dbtransfer', language 'zh_cn', branch 'MOODLE_24_STABLE'
 *
 * @package   tool_dbtransfer
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['clidriverlist'] = '合并数据库的可用数据库驱动';
$string['cliheading'] = '数据库合并 - 请确定没有人在数据库合并过程中访问服务器！';
$string['climigrationnotice'] = '数据库合并正在进行中，请耐心等待数据库合并完成和系统管理员更新配置文件和删除 $CFG->dataroot/climaintenance.html 文件。';
$string['convertinglogdisplay'] = '转换日志显示操作';
$string['dbexport'] = '数据导出';
$string['dbtransfer'] = '数据库导出';
$string['enablemaintenance'] = '启用维护模式';
$string['enablemaintenance_help'] = '这个选择在数据库合并过程中和合并过程后启动维护模式，这个选项将会禁止所有用户的访问，直到数据合并完成。请注意，系统管理员必须在updating config.php 配置更新后手动删除 $CFG->dataroot/climaintenance.html 文件来使系统恢复正常配置。';
$string['exportdata'] = '导出数据';
$string['notargetconectexception'] = '抱歉，无法连接目标数据库。';
$string['options'] = '选项';
$string['pluginname'] = '数据库导入';
$string['targetdatabase'] = '目标数据库';
$string['targetdatabasenotempty'] = '目标数据库的表不能使用给定的前缀！';
$string['transferdata'] = '传输数据';
$string['transferdbintro'] = '本脚本将把本数据库所有的数据都传送到另一个数据库服务器。通常用于在不同数据库中合并数据。';
$string['transferdbtoserver'] = '传输 Moodle 数据库到另一台数据库服务器';
$string['transferringdbto'] = '在 {$a->host} 数据库上，将{$a->dbtypefrom}数据库的数据导入到 {$a->dbtype} 数据库上。';
