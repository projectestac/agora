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
 * Strings for component 'enrol_mnet', language 'ja', branch 'MOODLE_24_STABLE'
 *
 * @package   enrol_mnet
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['error_multiplehost'] = 'このホストに関して、いくつかのMNet登録プラグインインスタンスがすでに存在しています。1ホストあたり1つのインスタンスのみ、または「すべてのホスト」が許可されます。';
$string['instancename'] = '登録方法名';
$string['instancename_help'] = 'あなたは任意でこのMNet登録メソッドのインスタンスをリネームすることができます。空白にした場合、リモートホストおよびあちらのユーザに割り当てられるロールを含むデフォルトのインスタンス名が使用されます。';
$string['mnet_enrol_description'] = 'このサービスを公開することで、あなたのサーバに作成したコースに対して、 {$a} の管理者は自分の学生を受講登録することができます。

<br />

<ul>
<li>依存関係: あなたは {$a} のSSO (アイデンティティプロバイダ) サービスに<strong>登録</strong>する必要があります。</li>
<li>依存関係: あなたはSSO (サービスプロバイダ) サービスを {$a} に<strong>公開</strong>する必要があります。</li>
</ul>

<br />

このサービスに登録することで、あなたの学生を {$a} のコースに受講登録することができます。

<br />

<ul>
<li>依存関係: あなたはSSO (アイデンティティプロバイダ) サービスを {$a} に<strong>公開</strong>する必要があります。</li>
<li>依存関係: あなたは {$a} のSSO (サービスプロバイダ) サービスに<strong>登録</strong>する必要があります。</li>
</ul>

<br />';
$string['mnet_enrol_name'] = 'リモート登録サービス';
$string['pluginname'] = 'MNetリモート登録';
$string['pluginname_desc'] = 'リモートMNetホストのユーザを私たちのコースに登録できるようにします。';
$string['remotesubscriber'] = 'リモートホスト';
$string['remotesubscriber_help'] = '私たちがリモート登録サービスをすべてのMNetピアに提供する場合、「すべてのホスト」を選択してください。または、このコースを特定のホストのユーザに限定する場合、単一のホストを選択してください。';
$string['remotesubscribersall'] = 'すべてのホスト';
$string['roleforremoteusers'] = 'あちらのユーザのロール';
$string['roleforremoteusers_help'] = '選択されたリモートホストのユーザに割り当てられるロールです。';
