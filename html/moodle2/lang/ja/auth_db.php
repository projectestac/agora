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
 * Strings for component 'auth_db', language 'ja', branch 'MOODLE_24_STABLE'
 *
 * @package   auth_db
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['auth_dbcantconnect'] = '指定された認証データベースに接続できませんでした ...';
$string['auth_dbchangepasswordurl_key'] = 'パスワード変更URI';
$string['auth_dbdebugauthdb'] = 'ADOdbデバッグ';
$string['auth_dbdebugauthdbhelp'] = '外部データベースへのADOdbデバッグ接続 - ログイン時に空白ページが表示される場合、使用してください。実稼動サイトには適していません。';
$string['auth_dbdeleteuser'] = '削除ユーザ {$a->name} id {$a->id}';
$string['auth_dbdeleteusererror'] = 'ユーザ {$a} の削除中にエラーが発生しました。';
$string['auth_dbdescription'] = 'ここではユーザ名およびパスワードが有効であるか確認するため、外部データベースを使用します。新しいアカウントを作成する場合、他のフィールドの情報がMoodleに複製されます。';
$string['auth_dbextencoding'] = '外部データベースエンコーディング';
$string['auth_dbextencodinghelp'] = '外部データベースで使用されるエンコーディング';
$string['auth_dbextrafields'] = 'これらのフィールドは、任意項目です。あなたは、<b>外部データベースフィールド</b>より、事前に入力されたMoodleユーザフィールドを選択することもできます。<p>空白の場合、デフォルト値が使用されます。</p><p>どちらの場合でも、ユーザはログイン後、すべてのフィールドを編集することができます。</p>';
$string['auth_dbfieldpass'] = 'パスワードを含んだフィールド名';
$string['auth_dbfieldpass_key'] = 'パスワードフィールド';
$string['auth_dbfielduser'] = 'ユーザ名を含んだフィールド名';
$string['auth_dbfielduser_key'] = 'ユーザ名フィールド';
$string['auth_dbhost'] = 'データベースサーバが稼動しているコンピュータです。ODBCを使用している場合、システムDSNエントリを使用してください。';
$string['auth_dbhost_key'] = 'ホスト';
$string['auth_dbinsertuser'] = '登録ユーザ {$a->name} id {$a->id}';
$string['auth_dbinsertuserduplicate'] = 'ユーザ {$a->username} の追加中にエラーが発生しました - このユーザ名のユーザはすでに「 {$a->auth} 」プラグイン経由で作成されています。';
$string['auth_dbinsertusererror'] = 'ユーザ登録エラー {$a}';
$string['auth_dbname'] = 'データベース名です。ODBC DSNを使用している場合、空白のままにしてください。';
$string['auth_dbname_key'] = 'データベース名';
$string['auth_dbpass'] = '上記ユーザ名に合致するパスワード';
$string['auth_dbpass_key'] = 'パスワード';
$string['auth_dbpasstype'] = '<p>パスワードフィールドで使用するフォーマットを指定してください。MD5暗号化はPostNukeのような他の一般的なウェブアプリケーションへの接続に有用です。</p><p>あなたが外部データベースにユーザ名およびメールアドレスを管理させて、Moodleにはパスワードを管理させたい場合、「内部」を使用してください。「内部」を使用する場合、外部データベースのメールアドレスフィールドを提供して、定期的に admin/cron.php および auth/db/cli/sync_users.php を実行してください。Moodleが新しいユーザに仮パスワード含んだメールを送信します。</p>';
$string['auth_dbpasstype_key'] = 'パスワードフォーマット';
$string['auth_dbreviveduser'] = '回復ユーザ {$a->name} id {$a->id}';
$string['auth_dbrevivedusererror'] = 'ユーザ {$a} の回復中にエラーが発生しました。';
$string['auth_dbsetupsql'] = 'SQLセットアップコマンド';
$string['auth_dbsetupsqlhelp'] = '特別データベースセットアップ用のSQLコマンドです。多くの場合、コミュニケーションエンコーディングに使用されます - 例 MySQLおよびPostgreSQL: <em>SET NAMES \'utf8\'</em>';
$string['auth_dbsuspenduser'] = '一時停止ユーザ {$a->name} id {$a->id}';
$string['auth_dbsuspendusererror'] = 'ユーザ {$a} の一時停止中にエラーが発生しました。';
$string['auth_dbsybasequoting'] = 'Sybaseクオートを使用する';
$string['auth_dbsybasequotinghelp'] = 'Sybaseスタイルのシングルクオートエスケープです - Oracle、MS SQLおよび他のデータベースに必要です。MySQLには使用しないでください!';
$string['auth_dbtable'] = 'データベースのテーブル名';
$string['auth_dbtable_key'] = 'テーブル';
$string['auth_dbtype'] = 'データベースタイプ (詳細は、<a href="http://phplens.com/adodb/supported.databases.html" target="_blank">ADOdbドキュメンテーション</a>をご覧ください)';
$string['auth_dbtype_key'] = 'データベース';
$string['auth_dbupdatinguser'] = '更新ユーザ {$a->name} id {$a->id}';
$string['auth_dbuser'] = 'データベースへのリードアクセス用のユーザ名';
$string['auth_dbuser_key'] = 'データベースユーザ';
$string['auth_dbusernotexist'] = '登録されていないユーザを更新できません: {$a}';
$string['auth_dbuserstoadd'] = '追加するユーザエントリ: {$a}';
$string['auth_dbuserstoremove'] = '削除するユーザエントリ: {$a}';
$string['pluginname'] = '外部データベース';
