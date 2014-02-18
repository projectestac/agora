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
 * Strings for component 'cachestore_memcache', language 'ja', branch 'MOODLE_24_STABLE'
 *
 * @package   cachestore_memcache
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['pluginname'] = 'Memcache';
$string['prefix'] = 'キー接頭辞';
$string['prefix_help'] = 'この接頭辞はmemcacheサーバで使用されるすべてのキー名に使用されます。
* このサーバに1つのインスタンスのみ存在する場合、あなたはこの値をデフォルトのままにすることができます。
* キー長の制限のため、半角5文字の最大長が許可されています。';
$string['prefixinvalid'] = '無効な接頭辞です。あなたは「a-z A-Z 0-9-_」のみ使用することができます。';
$string['servers'] = 'サーバ';
$string['servers_help'] = 'ここではmemcacheアダプタに使用されるサーバを設定します。
サーバは1行に1台のサーバアドレス、任意でポートおよびウェイト値を記述することができます。
ポートが指定されない場合、デフォルトポート (11211) が使用されます。

例:
<pre>
server.url.com
ipaddress:ポート
servername:ポート:ウェイト値
</pre>';
$string['testservers'] = 'テストサーバ';
$string['testservers_desc'] = 'テストサーバは単体テストおよびパフォーマンステストに使用されます。テストサーバの配置は完全に任意です。サーバは1行に1台のサーバアドレス、任意でポートおよびウェイト値を記述することができます。
ポートが指定されない場合、デフォルトポート (11211) が使用されます。';
