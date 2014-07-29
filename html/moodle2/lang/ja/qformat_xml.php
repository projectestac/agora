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
 * Strings for component 'qformat_xml', language 'ja', branch 'MOODLE_26_STABLE'
 *
 * @package   qformat_xml
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['invalidxml'] = '無効なXMLファイルです - ストリングが必要です (CDATAを使用しますか?)';
$string['pluginname'] = 'Moodle XMLフォーマット';
$string['pluginname_help'] = 'これは小テスト活動で使用する問題をインポートおよびエクスポートするためのMoodle独自フォーマットです。';
$string['truefalseimporterror'] = '<b>警告</b>: ○/×問題「 {$a->questiontext} 」を正しくインポートすることができませんでした。正解が「○」「×」のどちらか明確ではありません。正解が「 {$a->answer} 」であるとして問題がインポートされました。これが正しくない場合、あなたは問題を編集する必要があります。';
$string['unsupportedexport'] = 'XMLエクスポートでは問題タイプ {$a} がサポートされていません。';
$string['xmlimportnoname'] = 'XMLファイル内の問題名がありません。';
$string['xmlimportnoquestion'] = 'XMLファイル内の問題テキストがありません。';
$string['xmltypeunsupported'] = '問題タイプ {$a} はXMLインポートでサポートされていません。';
