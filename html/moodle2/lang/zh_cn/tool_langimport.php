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
 * Strings for component 'tool_langimport', language 'zh_cn', branch 'MOODLE_26_STABLE'
 *
 * @package   tool_langimport
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['install'] = '安装选择的语言包';
$string['installedlangs'] = '安装语言包';
$string['langimport'] = '语言导入工具';
$string['langimportdisabled'] = '语言导入功能已禁用。您必须在文件系统上手工更新语言包。做完后，不要忘记清空字符串缓存。';
$string['langpackinstalled'] = '语言包{$a}安装成功';
$string['langpackremoved'] = '语言包已卸载';
$string['langpackupdateskipped'] = '跳过更新{$a}语言包';
$string['langpackuptodate'] = '{$a}语言包是最新的';
$string['langupdatecomplete'] = '语言包更新成功';
$string['missingcfglangotherroot'] = '未设置配置变量 $CFG->langotherroot';
$string['missinglangparent'] = '缺少语言参数。<em>{$a->lang}</em>的<em>{$a->parent}</em>';
$string['nolangupdateneeded'] = '您的语言包已经是最新的了，不需要升级。';
$string['pluginname'] = '语言包';
$string['purgestringcaches'] = '清除字符串缓存';
$string['remotelangnotavailable'] = '由于 Moodle 无法连接到 download.moodle.org，我们无法自动完成语言包的安装。请从 http://dopwnload.moodle.org 下载相应的 zip 文件，并将它们复制到 {$a} 目录中解压。';
$string['uninstall'] = '卸载选择的语言包';
$string['uninstallconfirm'] = '您准备要完全卸载语言包{$a}，您确定吗？';
$string['updatelangs'] = '更新所有已安装的语言包';
