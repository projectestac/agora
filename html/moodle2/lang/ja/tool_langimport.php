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
 * Strings for component 'tool_langimport', language 'ja', branch 'MOODLE_26_STABLE'
 *
 * @package   tool_langimport
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['install'] = '選択された言語パックをインストールする';
$string['installedlangs'] = 'インストール済み言語パック';
$string['langimport'] = '言語インポートユーティリティ';
$string['langimportdisabled'] = '言語インポート機能は無効にされています。あなたはファイルシステムレベルで言語パックを手動更新する必要があります。手動更新の後、忘れずにストリングキャッシュを消去してください。';
$string['langpackinstalled'] = '言語パック {$a} が正常にインストールされました。';
$string['langpackremoved'] = '言語パックがアンインストールされました。';
$string['langpackupdateskipped'] = '言語パック {$a} の更新がスキップされました。';
$string['langpackuptodate'] = '言語パック {$a} は最新版です。';
$string['langupdatecomplete'] = '言語パックの更新が完了しました。';
$string['missingcfglangotherroot'] = '$CFG->langotherrootの設定値が正しくありません。';
$string['missinglangparent'] = '「 {$a->lang} 」の親言語「 {$a->parent} 」がありません。';
$string['nolangupdateneeded'] = 'すべての言語パックは最新版です。アップデートの必要はありません。';
$string['pluginname'] = '言語パック';
$string['purgestringcaches'] = 'ストリングキャッシュを消去する';
$string['remotelangnotavailable'] = 'Moodleがmoodle.orgに接続できないため、言語パックを自動インストールすることができません。<a href="https://download.moodle.org/langpack/">download.moodle.org/langpack</a>より適切なzipファイルを手動でダウンロードして、{$a} ディレクトリにコピーおよび解凍してください。';
$string['uninstall'] = '選択された言語パックをアンインストールする';
$string['uninstallconfirm'] = 'あなたは言語パック {$a} を完全にアンインストールしようとしています。本当によろしいですか?';
$string['updatelangs'] = 'すべてのインストール済み言語パックを更新する';
