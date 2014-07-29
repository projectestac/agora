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
 * Strings for component 'tool_dbtransfer', language 'ja', branch 'MOODLE_26_STABLE'
 *
 * @package   tool_dbtransfer
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['clidriverlist'] = '移行に利用できるデータベースドライバ';
$string['cliheading'] = 'データベース移行 - 移行中、誰もサーバにアクセスしていないことを確認してください!';
$string['climigrationnotice'] = 'データベース移行処理中です。移行が完了後、サーバ管理者が設定を更新および「 $CFG->dataroot/climaintenance.html 」ファイルを削除するまでお待ちください。';
$string['convertinglogdisplay'] = '移行ログ表示動作';
$string['dbexport'] = 'データベースエクスポート';
$string['dbtransfer'] = 'データベース移行';
$string['enablemaintenance'] = 'メンテナンスモードを有効にする';
$string['enablemaintenance_help'] = 'このオプションを有効にした場合、データベース移行中および移行後にメンテナンスモードが有効にされます。これにより、移行が完了するまですべてのユーザによるアクセスを防ぐことができます。サイト管理者は通常動作を再開させるため、config.phpを更新した後に「 $CFG->dataroot/climaintenance.html 」ファイルを手動削除する必要があることに留意してください。';
$string['exportdata'] = 'データをエクスポートする';
$string['notargetconectexception'] = '申し訳ございません、ターゲットデータベースに接続できません。';
$string['options'] = 'オプション';
$string['pluginname'] = 'データベースの転送';
$string['targetdatabase'] = 'ターゲットデータベース';
$string['targetdatabasenotempty'] = 'ターゲットデータベースには指定された接頭辞のテーブルを含むことはできません!';
$string['transferdata'] = 'データを転送する';
$string['transferdbintro'] = 'このスクリプトはデータベースのコンテンツすべてを別のデータベースサーバに転送します。主にデータを異なるデータベースタイプに移行する場合に使用します。';
$string['transferdbtoserver'] = 'このMoodleデータベースを別のサーバに転送する';
$string['transferringdbto'] = 'この {$a->dbtypefrom} データベースを {$a->dbtype} データベース {データベース名: $a->dbname} - ホスト: {$a->dbhost} ) に転送する';
