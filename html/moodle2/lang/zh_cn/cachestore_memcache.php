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
 * Strings for component 'cachestore_memcache', language 'zh_cn', branch 'MOODLE_26_STABLE'
 *
 * @package   cachestore_memcache
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['pluginname'] = 'Memcache';
$string['prefix'] = 'Key prefix';
$string['prefix_help'] = '此前缀是用于 memcache 服务器上的所有键名。
*如果这台服务器上只运行着一个Moodle网站，请保留默认值。
*由于密钥长度限制，最多设置5个字符。';
$string['prefixinvalid'] = '无效的前缀。您只能使用A-Z，a-z，0-9和_。';
$string['servers'] = '服务器';
$string['servers_help'] = '在此设置memcache所使用的服务器。
每行定义一个服务器，包含一个服务器地址和选用的端口和权重。
如果沒有提供端口，将使用默认端口（11211）。
例如:
<pre>
server.url.com
ipaddress:port
servername:port:weight
</pre>';
$string['testservers'] = '测试服务器';
$string['testservers_desc'] = '设置用来进行测试的服务器。
设置测试服务器是可以任选的。
每行定义一个服务器，包含一个服务器地址和选用的端口和权重。
如果沒有设置端口，使用默认端口（11211）。';
