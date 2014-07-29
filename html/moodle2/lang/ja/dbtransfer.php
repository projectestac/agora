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
 * Strings for component 'dbtransfer', language 'ja', branch 'MOODLE_26_STABLE'
 *
 * @package   dbtransfer
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['checkingsourcetables'] = 'ソーステーブル構造のチェック';
$string['copyingtable'] = 'テーブル {$a} のコピー';
$string['copyingtables'] = 'テーブルコンテンツのコピー';
$string['creatingtargettables'] = 'ターゲットデータベースのテーブル作成';
$string['dbexport'] = 'データベースエクスポート';
$string['dbtransfer'] = 'データベース転送';
$string['differenttableexception'] = 'テーブル {$a} の構造が合致しません。';
$string['done'] = '完了';
$string['exportschemaexception'] = '現在のデータベース構造がすべてのinstall.xmlファイルに合致しません。<br /> {$a}';
$string['importschemaexception'] = '現在のデータベース構造がすべてのinstall.xmlファイルに合致しません。<br /> {$a}';
$string['importversionmismatchexception'] = '現在のバージョン {$a->currentver} がエクスポートされたバージョン {$a->schemaver} と合致しません。';
$string['malformedxmlexception'] = '不正なXMLが見つかったため、継続できません。';
$string['tablex'] = 'テーブル {$a}:';
$string['unknowntableexception'] = 'エクスポートファイルに不明なテーブル {$a} が見つかりました。';
