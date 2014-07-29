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
 * Strings for component 'cachestore_file', language 'zh_cn', branch 'MOODLE_26_STABLE'
 *
 * @package   cachestore_file
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['autocreate'] = '自动建立目录';
$string['autocreate_help'] = '若启用，将会自动建立不存在的指定目录。';
$string['path'] = '缓存路径';
$string['path_help'] = '这个目录将用作存放文件的缓存。若留空（默认值），会在Moodledata目录下自动建立。也可以设置在高速磁盘（如内存）上。';
$string['pluginname'] = '文件缓存';
$string['prescan'] = '预先扫描目录';
$string['prescan_help'] = '若启用，第一次使用缓存时会扫描该目录，并与所请求的文件作核对。若你的文件系统速度很慢而造成系统瓶颈时有帮助。';
$string['singledirectory'] = '一个目录存储';
$string['singledirectory_help'] = '若启用，文件（放入缓存的项目）将会存储在一个目录内，而不是被分割成多个目录。<br />启用这一选项将加快文件的互动，但可能会造成文件系统达到极限的风险。<br />只有在下列情况下才开启：<br /> - 你确认缓存的文件数量很少，不会造成文件系统问题。<br /> - 缓存的资料产生代价不高。否则，还是保持默认设置，是你最好的选择。';
