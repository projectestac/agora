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
 * Strings for component 'cachestore_memcached', language 'zh_cn', branch 'MOODLE_26_STABLE'
 *
 * @package   cachestore_memcached
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['bufferwrites'] = '缓冲区写入';
$string['bufferwrites_help'] = '启用或关闭“I/O缓冲”。启用后会把指令保存到缓冲区，而不是发送。任何检索数据的操作会将缓冲区写入远程连接。退出或关闭连接也将缓冲数据写入远程连接。';
$string['hash'] = 'Hash演算';
$string['hash_crc'] = 'CRC';
$string['hash_default'] = '默认（一次一个）';
$string['hash_fnv1_32'] = 'FNV1_32';
$string['hash_fnv1_64'] = 'FNV1_64';
$string['hash_fnv1a_32'] = 'FNV1A_32';
$string['hash_fnv1a_64'] = 'FNV1A_64';
$string['hash_help'] = '指定用于该项目的Hash演算。每种Hash演算都各有其优缺点，如果不清楚请保持默认值。';
$string['hash_hsieh'] = 'Hsieh';
$string['hash_md5'] = 'MD5';
$string['hash_murmur'] = 'Murmur';
$string['pluginname'] = 'Memcached';
$string['prefix'] = '前缀键';
$string['prefix_help'] = '为你的项目设置专门“域”，使你在一个memcached上建立多个memcached缓存。<be />最多设置16个字符，以确保不会超过最大键长引起问题。';
$string['prefixinvalid'] = '无效的前缀。您只能使用A-Z，a-z，0-9和_。';
$string['serialiser_igbinary'] = 'igbinary系列化';
$string['serialiser_json'] = 'JSON系列化';
$string['serialiser_php'] = '默认PHP系列化';
$string['servers'] = '服务器';
$string['servers_help'] = '在此设置memcached所使用的服务器。
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
$string['usecompression'] = '使用压缩';
