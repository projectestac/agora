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
 * Strings for component 'enrol_meta', language 'ja', branch 'MOODLE_26_STABLE'
 *
 * @package   enrol_meta
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['linkedcourse'] = 'コースにリンクする';
$string['meta:config'] = 'メタ登録インスタンスを設定する';
$string['meta:selectaslinked'] = 'メタリンクされるコースを選択する';
$string['meta:unenrol'] = '一時停止ユーザを登録解除する';
$string['nosyncroleids'] = '同期しないロール';
$string['nosyncroleids_desc'] = 'デフォルトでは、すべてのコースレベルのロールは親コースから子コースに同期されます。ここで選択されたロールは同期処理に含まれることはありません。同期に使用できるロールは次のcron実行時に更新されます。';
$string['pluginname'] = 'コースメタリンク';
$string['pluginname_desc'] = 'コースメタリンク登録プラグインでは2つの異なるコース間で受講登録およびロールを同期します。';
$string['syncall'] = 'すべての登録ユーザを同期する';
$string['syncall_desc'] = 'この設定を有効にした場合、親コースにロールがないユーザすべても登録されます。無効にした場合、少なくとも1つの同期ロールが割り当てられているユーザのみ、子コースに登録されます。';
