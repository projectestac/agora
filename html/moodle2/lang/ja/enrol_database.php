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
 * Strings for component 'enrol_database', language 'ja', branch 'MOODLE_24_STABLE'
 *
 * @package   enrol_database
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['database:unenrol'] = '利用停止ユーザを登録解除する';
$string['dbencoding'] = 'データベースエンコーディング';
$string['dbhost'] = 'データベースホスト';
$string['dbhost_desc'] = 'データベースサーバのIPアドレスまたはホスト名を入力してください。';
$string['dbname'] = 'データベース名';
$string['dbpass'] = 'データベースパスワード';
$string['dbsetupsql'] = 'データベースセットアップコマンド';
$string['dbsetupsql_desc'] = '特別データベース設定のためのSQLコマンドを入力してください。多くの場合、エンコーディングに関する設定が使用されます - 以下、MySQLおよびPostgreSQLの例です: <em>SET NAMES \'utf8\'</em>';
$string['dbsybasequoting'] = 'Sybaseクオートを使用する';
$string['dbsybasequoting_desc'] = 'Sybaseスタイルのシングルクオートエスケープです - Oracle、MS SQLおよび他のデータベースが必要です。MySQLには使用しないでください!';
$string['dbtype'] = 'データベースドライバ';
$string['dbtype_desc'] = 'ADOdbデータベースドライバ名、外部データベースエンジンのタイプです。';
$string['dbuser'] = 'データベースユーザ';
$string['debugdb'] = 'ADOdbをデバッグする';
$string['debugdb_desc'] = '外部データベースへのADOdb接続をデバッグします - ログイン時、空白ページが表示される場合に使用してください。実運用サイトでの使用には適しません!';
$string['defaultcategory'] = '新しいコースのデフォルトカテゴリ';
$string['defaultcategory_desc'] = '自動作成されるコースのためのカテゴリです。 カテゴリIDが指定されない場合、または見つからない場合に使用されます。';
$string['defaultrole'] = 'デフォルトロール';
$string['defaultrole_desc'] = '外部テーブルでロールが指定されていない場合、デフォルトで割り当てられるロールです。';
$string['ignorehiddencourses'] = '非表示のコースを無視する';
$string['ignorehiddencourses_desc'] = '有効にした場合、学生のコース登録が無効にされているコースにユーザは受講登録されません。 ';
$string['localcategoryfield'] = 'ローカルカテゴリフィールド';
$string['localcoursefield'] = 'ローカルコースフィールド';
$string['localrolefield'] = 'ローカルロールフィールド';
$string['localuserfield'] = 'ローカルユーザフィールド';
$string['newcoursecategory'] = '新しいコースカテゴリフィールド';
$string['newcoursefullname'] = '新しいコースフルネームフィールド';
$string['newcourseidnumber'] = '新しいコースIDナンバーフィールド';
$string['newcourseshortname'] = '新しいコース省略名フィールド';
$string['newcoursetable'] = 'リモートの新しいコーステーブル';
$string['newcoursetable_desc'] = '自動的に作成させるコースの一覧を含んだテーブル名を指定してください。空白の場合、コースは作成されません。';
$string['pluginname'] = '外部データベース';
$string['pluginname_desc'] = 'あなたはユーザ登録に (ほとんどの種類の) 外部データベースを使用することができます。あなたの外部データベースにはコースIDおよびユーザIDを含んでいると仮定します。これらのフィールドはあなたが選択したローカルのコーステーブルおよびユーザテーブルのフィールドと比較されます。';
$string['remotecoursefield'] = 'リモートコースフィールド';
$string['remotecoursefield_desc'] = 'コーステーブルのエントリに私たちが合致させるため使用するリモートテーブルのフィールド名です。 ';
$string['remoteenroltable'] = 'リモートユーザ登録テーブル';
$string['remoteenroltable_desc'] = 'ユーザ受講登録の一覧を含んだテーブル名を指定してください。空白の場合、ユーザの受講登録は同期されません。';
$string['remoterolefield'] = 'リモートロールフィールド';
$string['remoterolefield_desc'] = 'ロールテーブルのエントリに私たちが合致させるため使用するリモートテーブルのフィールド名です。 ';
$string['remoteuserfield'] = 'リモートユーザフィールド';
$string['remoteuserfield_desc'] = 'ユーザテーブルのエントリに私たちが合致させるため使用するリモートテーブルのフィールド名です。';
$string['settingsheaderdb'] = '外部データベース接続';
$string['settingsheaderlocal'] = 'ローカルフィールドマッピング';
$string['settingsheadernewcourses'] = '新しいコースの作成';
$string['settingsheaderremote'] = 'リモート登録同期';
$string['templatecourse'] = '新しいコーステンプレート';
$string['templatecourse_desc'] = '任意: 自動作成コースはテンプレートコースから設定をコピーすることができます。テンプレートコースの省略名を入力してください。 ';
