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
 * Strings for component 'repository_upload', language 'ja', branch 'MOODLE_24_STABLE'
 *
 * @package   repository_upload
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['configplugin'] = 'アップロードプラグインの設定';
$string['pluginname'] = 'ファイルをアップロードする';
$string['pluginname_help'] = 'ファイルをMoodleにアップロードする';
$string['upload_error_cant_write'] = 'ディスクへのファイル書き込みに失敗しました。';
$string['upload_error_extension'] = 'ファイルアップロードに関して、PHP実行が停止しました。';
$string['upload_error_form_size'] = 'アップロードファイルがHTMLフォームで指定されているMAX_FILE_SIZEディレクティブを超えました。';
$string['upload_error_ini_size'] = 'アップロードファイルがphp.iniのupload_max_filesizeディレクティブを超えました。';
$string['upload_error_invalid_file'] = 'ファイル「 {$a} 」は空またはフォルダです。フォルダをアップロードするには、最初にZIP圧縮してください。';
$string['upload_error_no_file'] = 'ファイルはアップロードされませんでした。';
$string['upload_error_no_tmp_dir'] = 'PHPの一時フォルダがありません。';
$string['upload_error_partial'] = 'ファイルは部分的にアップロードされました。';
$string['upload:view'] = 'ファイルピッカのアップロードを使用する';
