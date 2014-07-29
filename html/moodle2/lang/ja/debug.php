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
 * Strings for component 'debug', language 'ja', branch 'MOODLE_26_STABLE'
 *
 * @package   debug
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['authpluginnotfound'] = '認証プラグイン {$a} が見つかりませんでした。';
$string['blocknotexist'] = '{$a} ブロックがありません。';
$string['cannotbenull'] = '{$a} にはnullを使用できません!';
$string['cannotdowngrade'] = '{$a->plugin} を {$a->oldversion} から {$a->newversion} にダウングレードできません。';
$string['cannotfindadmin'] = '管理ユーザが見つかりませんでした!';
$string['cannotinitpage'] = 'ページを完全に初期化できません: 無効 {$a->name} ID {$a->id}';
$string['cannotsetuptable'] = '{$a} テーブルを正常に設定できませんでした!';
$string['codingerror'] = 'コーディングエラーが検出されました。プログラマによって修正される必要があります: {$a}';
$string['configmoodle'] = 'まだMoodleは設定されていません。最初にconfig.phpを編集してください。';
$string['erroroccur'] = '処理中にエラーが発生しました。';
$string['invalidarraysize'] = '{$a} の変数内の配列サイズが正しくありません。';
$string['invalideventdata'] = '正しくないイベントデータが送信されました: {$a}';
$string['invalidparameter'] = '無効なパラメータ値が検出されました。';
$string['invalidresponse'] = '無効な値が検知されました。';
$string['missingconfigversion'] = 'configテーブルにバージョンが含まれていません。申し訳ございません、続けることはできません。';
$string['modulenotexist'] = '{$a} モジュールがありません。';
$string['morethanonerecordinfetch'] = 'fetch() で1レコード以上のレコードが見つかりました!';
$string['mustbeoveride'] = '抽象メソッド {$a} はオーバーライドする必要があります。';
$string['noadminrole'] = 'adminロールが見つかりませんでした。';
$string['noblocks'] = 'ブロックがインストールされていません!';
$string['nocate'] = 'カテゴリがありません!';
$string['nomodules'] = 'モジュールが見つかりません!!';
$string['nopageclass'] = '{$a} がインポートされましたが、ページクラスがありません。';
$string['noreports'] = 'アクセスできるレポートはありません。';
$string['notables'] = 'テーブルがありません!';
$string['phpvaroff'] = 'PHPサーバ変数「 {$a->name} 」をOffにしてください - {$a->link}';
$string['phpvaron'] = 'PHPサーバ変数「 {$a->name} 」がOnにされていません - {$a->link}';
$string['sessionmissing'] = 'セッションに {$a} オブジェクトがありません。';
$string['sqlrelyonobsoletetable'] = 'このSQLは古いテーブル {$a} を参照しています! あなたのコードは開発者により修正される必要があります。';
$string['withoutversion'] = 'メインversion.phpが存在しないか、読めない、または壊れています。';
$string['xmlizeunavailable'] = 'xmlize関数を利用できません。';
