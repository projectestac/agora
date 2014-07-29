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
 * Strings for component 'repository_boxnet', language 'ja', branch 'MOODLE_26_STABLE'
 *
 * @package   repository_boxnet
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['apikey'] = 'APIキー';
$string['apiv1migration_message_content'] = '最新のMoodleのアップグレード (2.6, 2.5.3, 2.4.7) の一環として、Boxリポジトリオプラグインは無効にされています。再度有効にするには、ドキュメンテーション ( {$a->docsurl} ) に記載されているとおり、あなたは再設定する必要があります。';
$string['apiv1migration_message_small'] = 'Box APIv1移行ドキュメンテーションで説明されている設定が必要なため、このプラグインは無効にされています。';
$string['apiv1migration_message_subject'] = 'Boxリポジトリプラグインに関する重要情報';
$string['boxnet:view'] = 'Boxリポジトリを表示する';
$string['cannotcreatereference'] = 'Boxのファイルを共有する十分なパーミッションがないため、リファレンスを作成できません。';
$string['clientid'] = 'クライアントID';
$string['clientsecret'] = 'クライアント秘密鍵';
$string['configplugin'] = 'Box設定';
$string['filesourceinfo'] = 'Box ({$a->fullname}): {$a->filename}';
$string['information'] = 'あなたのMoodleサイトに<a href="https://app.box.com/developers/services">Box developer page</a>Box.net開発者ページ</a>よりクライアントIDおよび秘密鍵を取得してください。';
$string['invalidpassword'] = '無効なパスワードです。';
$string['migrationadvised'] = 'あなたはAPIバージョン1のBoxを使用しているようです。古いリファレンスを変換するため、<a href="{$a}">移行ツール</a>を実行しましたか?';
$string['migrationinfo'] = '<p>Boxから提供されている新しいAPIへの移行の一環として、あなたのファイルリファレンスは移行される必要があります。残念ですが、リファレンスシステムはAPI v2との互換性がありません。そのため、私たちはダウンロードして実ファイルに変換する必要があります。</p>
<p>リファレンスの使用およびファイルの大きさにより、移行には<strong>非常に長い時間を要する場合があること</strong>に留意してください。</p>
<p>あなたは下のボタンをクリックして移行ツールを実行することができます。または代わりにCLIスクリプトを実行することもできます: repository/boxnet/cli/migrationv1.php.</p>
<p>詳細に関して、<a href="{$a->docsurl}">こちら</a>をご覧ください。</p>';
$string['migrationtool'] = 'Box APIv1移行ツール';
$string['nullfilelist'] = 'このリポジトリにファイルはありません。';
$string['password'] = 'パスワード';
$string['pluginname'] = 'Box';
$string['pluginname_help'] = 'Boxのリポジトリ';
$string['runthemigrationnow'] = '移行ツールを実行する';
$string['saved'] = 'Boxデータが保存されました。';
$string['shareurl'] = '共有URL';
$string['username'] = 'Boxユーザ名';
$string['warninghttps'] = 'Boxのリポジトリを動作させるには、あなたのウェブサイトがHTTPSを使用している必要があります。';
