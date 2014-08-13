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
 * Strings for component 'repository_upload', language 'ru', branch 'MOODLE_26_STABLE'
 *
 * @package   repository_upload
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['configplugin'] = 'Конфигурация модуля загрузки';
$string['pluginname'] = 'Загрузить файл';
$string['pluginname_help'] = 'Загрузить файл в Moodle';
$string['upload_error_cant_write'] = 'Ошибка записи файла на диск.';
$string['upload_error_extension'] = 'Расширение PHP остановило загрузку файла.';
$string['upload_error_form_size'] = 'Размер загружаемого файла превышает значение директивы MAX_FILE_SIZE, указанную в HTML-форме.';
$string['upload_error_ini_size'] = 'Размер загружаемого файла превышает значение директивы upload_max_filesize, указанной в php.ini.';
$string['upload_error_invalid_file'] = 'Файл «{$a}» либо пуст, либо находится в папке. Чтобы загрузить папки, сначала их надо заархивировать в zip.';
$string['upload_error_no_file'] = 'Ни один файл не был загружен.';
$string['upload_error_no_tmp_dir'] = 'Отсутствует временная папка PHP.';
$string['upload_error_partial'] = 'Файл был загружен лишь частично.';
$string['upload:view'] = 'Использовать загрузку файлов в окне выбора файла';
